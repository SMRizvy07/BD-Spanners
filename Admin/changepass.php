<?php
define('TITLE', 'Change Password');
define('PAGE', 'changepass');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
} else{
  echo "<script> location.href='login.php'</script>";
}
$aEmail = $_SESSION['aEmail'];
if(isset($_REQUEST['passupdate'])){
    if($_REQUEST['aPassword'] == ""){
        $passmsg = '<div class="alert alert-warning col-sm-6 mt-2">Fill All Fields</div>';
    } else {
$aPass = $_REQUEST['aPassword'];
$sql = "UPDATE adminlogin_tb SET a_password = '$aPass' WHERE a_email = '$aEmail'";
if($conn->query($sql) == True){
    $passmsg = '<div class="alert alert-success col-sm-6 mt-2">Successfully Updated</div>'; 
} else{
    $passmsg = '<div class="alert alert-danger col-sm-6 mt-2">Update Failed</div>';
  }
 }
}
?>
<!-- start change pass 2nd column -->
<div class="col-sm-6 col-md-6">
 <form class="mt-5 mx-5" action="" method="POST">
  <div class="form-group">
   <label for="inputEmail">Email</label>
   <input type="email" class="form-control" id="inputEmail" value="<?php echo $aEmail; ?>" readonly>
  </div>
  <div class="form-group">
   <label for="inputnewpassword">New Password</label>
   <input type="password" class="form-control" id="inputnewpassword" placeholder="New Password" name="aPassword">
  </div>
  <button type="submit" class="btn btn-danger mr-4 mt-4" name="passupdate">Update</button>
  <button type="reset" class="btn btn-secondary mt-4">Reset</button>
  <?php if(isset($passmsg)) {echo $passmsg;} ?>
 </form>
</div><!-- end change pass form 2nd column -->
?>
<?php include('includes/footer.php') ?>