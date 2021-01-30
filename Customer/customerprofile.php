<?php
 define('TITLE', 'Customer Profile');
 define('PAGE', 'customerprofile');
 include('includes/header.php');
 include('../dbconnection.php');
 session_start();
 if ($_SESSION['is_login']) {
     $rEmail = $_SESSION['rEmail'];
 } else {
    echo "<script> location.href='customerlogin.php'</script>";
 }
 $sql = "SELECT c_name, c_email FROM customerlogin_tb WHERE c_email = '$rEmail'";
 $result = $conn->query($sql);
 if($result->num_rows == 1){
   $row = $result->fetch_assoc();  
   $rName = $row['c_name'];
 }

 if(isset($_REQUEST['nameupdate'])){
     if($_REQUEST['rName'] == ""){
        $passmsg = '<div class="alert alert-warning col-sm-6 mt-2" role="alert">Fill Every Fields</div>';
     } else{
        $rName = $_REQUEST['rName'];
        $sql = "Update customerlogin_tb SET c_name = '$rName' WHERE c_email='$rEmail'";
        if($conn->query($sql) == True){
            $passmsg = '<div class="alert alert-success col-sm-6 mt-2" role="alert">Udpdated Successfully</div>';
        } else{
            $passmsg = '<div class="alert alert-warning col-sm-6 mt-2" role="alert">Udpdated Failed</div>';
        }
    }
 }
?>

      <!-- profile area start -->
      <div class="col-sm-6 mt-5">
       <form action="" method="POST" class="mx-5">
        <div class="form-group">
        <label for="rEmail">Email</label><input type="email" class="form-control" name="rEmail" id="rEmail" value="<?php echo $rEmail ?>" readonly>
        </div>
        <div class="form-group">
        <label for="rName">Name</label><input type="text" class="form-control" name="rName" id="rName" value="<?php echo $rName ?>">
        </div>
        <button type="submit" class="btn btn-danger" name="nameupdate">Update</button>
        <?php if(isset($passmsg)) {echo $passmsg;} ?>
       </form>
      </div><!-- profile area end -->

<?php 
include('includes/footer.php');
?>