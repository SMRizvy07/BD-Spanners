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
?>
<!-- start 2nd column -->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
<h3 class="text-center">Update Requester Details</h3>
<?php 
if(isset($_REQUEST['edit'])){
    $sql = "SELECT * FROM customerlogin_tb WHERE c_login_id = {$_REQUEST['id']}" ;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
if(isset($_REQUEST['requpdate'])){
    if(($_REQUEST['c_login_id'] == "") || ($_REQUEST['c_name'] == "") || ($_REQUEST["c_email"] =="")){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Please Fill All Fields</div>';
    } else{
        $rid = $_REQUEST['c_login_id'];
        $rname = $_REQUEST['c_name'];
        $remail = $_REQUEST['c_email'];
        $sql = "UPDATE customerlogin_tb SET c_login_id = '$rid', c_name = '$rname', c_email = '$remail' WHERE c_login_id = '$rid'";
        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Update Successful</div>';
        } else{
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Update Failed</div>';
        }
    }
}
?>
<form action="" method="POST">
 <div class="form-group">
  <label for="c_login_id">Requester ID</label>
  <input type="text" class="form-control" name="c_login_id" id="c_login_id" Value="<?php if(isset($row['c_login_id'])){echo $row['c_login_id'];} ?>" readonly>
 </div>
 <div class="form-group">
  <label for="c_name">Name</label>
  <input type="text" class="form-control" name="c_name" id="c_name" Value="<?php if(isset($row['c_name'])){echo $row['c_name'];} ?>">
 </div>
 <div class="form-group">
  <label for="c_email">Email</label>
  <input type="email" class="form-control" name="c_email" id="c_email" Value="<?php if(isset($row['c_email'])){echo $row['c_email'];} ?>">
 </div>
 <div class="text-center">
  <button type="submit" class="btn btn-info mr-2" id="requpdate" name="requpdate">Update</button>
  <a href="requester.php" class="btn btn-secondary">Close</a>
 </div>
 <?php if(isset($msg)){echo $msg;} ?>
</form>
</div><!-- end 2nd column -->

<?php include('includes/footer.php') ?>