<?php
define('TITLE', 'Update Technician');
define('PAGE', 'technician');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
} else{
  echo "<script> location.href='login.php'</script>";
}
if(isset($_REQUEST['empsubmit'])){
    if(($_REQUEST['emp_name'] == "") || ($_REQUEST['emp_city'] == "") || ($_REQUEST['emp_mobile'] == "") || ($_REQUEST['emp_email'] == "")){
     $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
    } else {
      $eName = $_REQUEST['emp_name'];
      $eCity = $_REQUEST['emp_city'];
      $eMobile = $_REQUEST['emp_mobile'];
      $eEmail = $_REQUEST['emp_email'];
      $sql = "INSERT INTO technician_tb (emp_name, emp_city, emp_mobile, emp_email) VALUES ('$eName', '$eCity', '$eMobile', '$eEmail')";
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
  <h3 class="text-center">Add New Technician</h3>
  <form action="" method="POST">
    <div class="form-group">
      <label for="emp_name">Name</label>
      <input type="text" class="form-control" id="emp_name" name="emp_name">
    </div>
    <div class="form-group">
      <label for="emp_city">City</label>
      <input type="text" class="form-control" id="emp_city" name="emp_city">
    </div>
    <div class="form-group">
      <label for="emp_mobile">Mobile</label>
      <input type="text" class="form-control" id="emp_mobile" name="emp_mobile" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="emp_email">Email</label>
      <input type="email" class="form-control" id="emp_email" name="emp_email">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="empsubmit" name="empsubmit">Submit</button>
      <a href="technician.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>
<script>
  function isInputNumber(evt){
   var ch = String.fromCharCode(evt.which);
   if(!(/[0-9]/.test(ch))){
     evt.preventDefault()
   }
 }
</script>
<?php include('includes/footer.php') ?>