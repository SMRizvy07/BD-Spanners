<?php
define('TITLE', 'Update Customer');
define('PAGE', 'requester');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
} else{
  echo "<script> location.href='login.php'</script>";
}
if(isset($_REQUEST['reqsubmit'])){
    if(($_REQUEST['c_name'] == "") || ($_REQUEST['c_email'] == "") || ($_REQUEST['c_password'] == "")){
     $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
    } else {
      $rname = $_REQUEST['c_name'];
      $rEmail = $_REQUEST['c_email'];
      $rPassword = $_REQUEST['c_password'];
      $sql = "INSERT INTO customerlogin_tb (c_name, c_email, c_password) VALUES ('$rname', '$rEmail', '$rPassword')";
      if($conn->query($sql) == TRUE){
       $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Added Successfully </div>';
      } else {
       $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Add </div>';
      }
    }
}
?>
<!-- Start 2nd Column -->
<div class="col-sm-6 mt-5  mx-3 jumbotron">
  <h3 class="text-center">Add New Customer</h3>
  <form action="" method="POST">
    <div class="form-group">
      <label for="c_name">Name</label>
      <input type="text" class="form-control" id="c_name" name="c_name">
    </div>
    <div class="form-group">
      <label for="c_email">Email</label>
      <input type="email" class="form-control" id="c_email" name="c_email">
    </div>
    <div class="form-group">
      <label for="c_password">Password</label>
      <input type="password" class="form-control" id="c_password" name="c_password">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="reqsubmit" name="reqsubmit">Submit</button>
      <a href="requester.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>
<?php include('includes/footer.php') ?>