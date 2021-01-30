<?php 
define('TITLE', 'Change Password');
define('PAGE', 'changepassword');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if ($_SESSION['is_login']) {
    $rEmail = $_SESSION['rEmail'];
} else {
   echo "<script> location.href='customerlogin.php'</script>";
}
$rEmail = $_SESSION['rEmail'];
if(isset($_REQUEST['passupdate'])){
    if($_REQUEST['rPassword'] == ""){
        $passmsg = '<div class="alert alert-warning col-sm-6 mt-2">Fill All Fields</div>';
    } else {
$rPass = $_REQUEST['rPassword'];
$sql = "UPDATE customerlogin_tb SET c_password = '$rPass' WHERE c_email = '$rEmail'";
if($conn->query($sql) == True){
    $passmsg = '<div class="alert alert-success col-sm-6 mt-2">Successfully Updated</div>'; 
} else{
    $passmsg = '<div class="alert alert-danger col-sm-6 mt-2">Update Failed</div>';
  }
 }
}
?>
<!-- start change pass form 2nd column -->
<div class="col-sm-6 col-md-6">
 <form class="mt-5 mx-5" action="" method="POST">
  <div class="form-group">
   <label for="inputEmail">Email</label>
   <input type="email" class="form-control" id="inputEmail" value="<?php echo $rEmail; ?>" readonly>
  </div>
  <div class="form-group">
   <label for="inputnewpassword">New Password</label>
   <input type="password" class="form-control" id="inputnewpassword" placeholder="New Password" name="rPassword">
  </div>
  <button type="submit" class="btn btn-danger mr-4 mt-4" name="passupdate">Update</button>
  <button type="reset" class="btn btn-secondary mt-4">Reset</button>
  <?php if(isset($passmsg)) {echo $passmsg;} ?>
 </form>
</div><!-- end change pass form 2nd column -->

<?php 
include('includes/footer.php');
?>