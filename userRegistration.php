<?php
include('dbconnection.php');
if(isset($_REQUEST['rSignup'])){
  // Checking empty field
    if(($_REQUEST['rName'] == "") || ($_REQUEST["rEmail"] == "") || ($_REQUEST['rPassword'] == "") ){
        $regmsg = '<div class="alert alert-warning mt-2" role="alert">Every Field is Required</div>';
    } else{
      //email already registered
      $sql = "SELECT c_email FROM customerlogin_tb WHERE c_email ='".$_REQUEST['rEmail']."'";
      $result = $conn->query($sql);
      if($result->num_rows==1){
        $regmsg = '<div class="alert alert-warning mt-2" role="alert">This Email ID is Already Registered</div>';
      }else{
        //assigning user values to variables
    $rName = $_REQUEST['rName'];
    $rEmail = $_REQUEST['rEmail'];
    $rPassword = $_REQUEST['rPassword'];
    $sql = "INSERT INTO customerlogin_tb(c_name, c_email, c_password) VALUES('$rName', '$rEmail', '$rPassword')";
      if($conn->query($sql) == TRUE){
      $regmsg = '<div class="alert alert-success mt-2" role="alert">Account Created Successfully</div>';
    } else{
      $regmsg = '<div class="alert alert-danger mt-2" role="alert">Sorry, Unable to Create Account</div>';
    }
    }
}
}
?>

<!-- start registration form -->
<div class="container pt-5" id="registration">
  <h2 class="text-center">Create Account</h2>
  <div class="roe mt-4 mb-4">
    <div class="col-md-6 offset-md-3">
     <form action="" class="shadow-lg p-4" method="POST">
       <div class="form-group">
         <i class="fas fa-user"></i> <label for="name" class="font-weight-bold pl-2">Name</label>
         <input type="text" class="form-control" placeholder="Name" name="rName">
       </div>
       <div class="form-group">
         <i class="fas fa-envelope"></i> <label for="email" class="font-weight-bold pl-2">Email</label>
         <input type="email" class="form-control" placeholder="Email" name="rEmail">
         <small class="form-text">Your information is safe with us</small>
       </div>
       <div class="form-group">
         <i class="fas fa-key"></i> <label for="pass" class="font-weight-bold pl-2">New Password</label>
         <input type="password" class="form-control" placeholder="Password" name="rPassword">
       </div>
       <button type="submit" class="btn btn-success mt-5 btn-block 
       shadow-sm font-weight-bold" name="rSignup">Sign Up</button>
       <em style="font-size:10px;">Note - By clicking Sign Up, you agree to our Terms & Data Policy</em>
     <?php if(isset($regmsg)) {echo $regmsg;} ?>
    </form>
    </div>
  </div>
</div><!-- End registration form -->