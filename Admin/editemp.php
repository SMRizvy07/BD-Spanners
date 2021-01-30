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
if(isset($_REQUEST['empupdate'])){
    if(($_REQUEST['emp_name'] == "") || ($_REQUEST['emp_city'] == "") || ($_REQUEST['emp_mobile'] == "") || ($_REQUEST['emp_email'] == "")){
     $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
    } else {
      $eId = $_REQUEST['emp_id'];
      $eName = $_REQUEST['emp_name'];
      $eCity = $_REQUEST['emp_city'];
      $eMobile = $_REQUEST['emp_mobile'];
      $eEmail = $_REQUEST['emp_email'];
    $sql = "UPDATE technician_tb SET emp_name = '$eName', emp_city = '$eCity', emp_mobile = '$eMobile', emp_email = '$eEmail' WHERE emp_id = '$eId'";
      if($conn->query($sql) == TRUE){
       $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
      } else {
       $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
      }
    }
    }
   ?>
  <div class="col-sm-6 mt-5  mx-3 jumbotron">
    <h3 class="text-center">Update Technician Details</h3>
    <?php
   if(isset($_REQUEST['edit'])){
    $sql = "SELECT * FROM technician_tb WHERE emp_id = {$_REQUEST['id']}";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   }
   ?>
    <form action="" method="POST">
      <div class="form-group">
        <label for="emp_id">Emp ID</label>
        <input type="text" class="form-control" id="emp_id" name="emp_id" value="<?php if(isset($row['emp_id'])) {echo $row['emp_id']; }?>"
          readonly>
      </div>
      <div class="form-group">
        <label for="emp_name">Name</label>
        <input type="text" class="form-control" id="emp_name" name="emp_name" value="<?php if(isset($row['emp_name'])) {echo $row['emp_name']; }?>">
      </div>
      <div class="form-group">
        <label for="emp_city">City</label>
        <input type="text" class="form-control" id="emp_city" name="emp_city" value="<?php if(isset($row['emp_city'])) {echo $row['emp_city']; }?>">
      </div>
      <div class="form-group">
        <label for="emp_mobile">Mobile</label>
        <input type="text" class="form-control" id="emp_mobile" name="emp_mobile" value="<?php if(isset($row['emp_mobile'])) {echo $row['emp_mobile']; }?>"
          onkeypress="isInputNumber(event)">
      </div>
      <div class="form-group">
        <label for="emp_email">Email</label>
        <input type="email" class="form-control" id="emp_email" name="emp_email" value="<?php if(isset($row['emp_email'])) {echo $row['emp_email']; }?>">
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-danger" id="empupdate" name="empupdate">Update</button>
        <a href="technician.php" class="btn btn-secondary">Close</a>
      </div>
      <?php if(isset($msg)) {echo $msg; } ?>
    </form>
  </div>
  <!-- Only Number for input fields -->
  <script>
    function isInputNumber(evt) {
      var ch = String.fromCharCode(evt.which);
      if (!(/[0-9]/.test(ch))) {
        evt.preventDefault();
      }
    }
  </script>

<?php include('includes/footer.php') ?>