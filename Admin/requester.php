<?php
define('TITLE', 'Requester');
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
<div class="col-sm-9 col-md-10 mt-5 text-center">
 <p class="bg-dark text-white p-2">List of Customers</p>
 <?php 
   $sql = "SELECT * FROM customerlogin_tb";
   $result = $conn->query($sql);
   if($result->num_rows > 0){
     echo '<table class="table">';
      echo '<thead>';
       echo '<tr>';
       echo '<th scope="col">Reqester ID</th>';
       echo '<th scope="col">Name</th>';
       echo '<th scope="col">Email</th>';
       echo '<th scope="col">Action</th>';
       echo '</tr>';
      echo '</thead>';
      echo '<tbody>';
      while ($row = $result->fetch_assoc()){
        echo '<tr>';
        echo '<td>'.$row["c_login_id"].'</td>';
        echo '<td>'.$row["c_name"].'</td>';
        echo '<td>'.$row["c_email"].'</td>';
        echo '<td>';
         echo '<form action="editreq.php" method="POST" class="d-inline mr-2">';
          echo '<input type="hidden" name="id" value='.$row["c_login_id"].'><button class="btn btn-info mr-2" name="edit" value="Edit" type="submit"><i class="fas fa-pen"></i></button>';
         echo '</form>';
         echo '<form action="" method="POST" class="d-inline mr-2">';
         echo '<input type="hidden" name="id" value='.$row["c_login_id"].'><button class="btn btn-danger" name="delete" value="Delete" type="submit"><i class="far fa-trash-alt"></i></button>';
        echo '</form>';
         echo '</td>';
        echo '</tr>';
      }
      echo '</tbody>';
     echo '</table>';
   } else{
     echo '0 Results';
   }
 ?>
</div>
<?php 
if(isset($_REQUEST['delete'])){
  $sql = "DELETE FROM customerlogin_tb WHERE c_login_id = {$_REQUEST['id']}";
  if($conn->query($sql) == TRUE){
    echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
} else {
    echo 'Unable to Delete Data';
}
}
?>
  </div><!-- end row -->
  <div class="float-right">
<a href="insertreq.php" class="btn btn-danger mr-3"><i class="fas fa-plus fa-2x"></i></a>
</div>
   </div><!-- container -->

    <!-- javascript -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>
</html>