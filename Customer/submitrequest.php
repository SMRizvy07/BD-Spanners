<?php 
define('TITLE', 'Submit Request');
define('PAGE', 'submitrequest');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if ($_SESSION['is_login']) {
    $rEmail = $_SESSION['rEmail'];
} else {
   echo "<script> location.href='customerlogin.php'</script>";
}

if(isset($_REQUEST['submitrequest'])){
  //check empty fields
  if(($_REQUEST['requestinfo'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['customername'] == "") || ($_REQUEST['customeradd1'] == "") || ($_REQUEST['customeradd2'] == "") ||($_REQUEST['customercity'] == "") 
  || ($_REQUEST['customerstate'] == "") || ($_REQUEST['customerzip'] == "") || ($_REQUEST['customeremail'] == "") || ($_REQUEST['customermobile'] == "") || ($_REQUEST['requestdate'] == "")){
    $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>All Fields are Required</div>";
  } else {
    $rinfo = $_REQUEST['requestinfo'];
    $rdesc = $_REQUEST['requestdesc'];
    $rname = $_REQUEST['customername'];
    $radd1 = $_REQUEST['customeradd1'];
    $radd2 = $_REQUEST['customeradd2'];
    $rcity = $_REQUEST['customercity'];
    $rstate = $_REQUEST['customerstate'];
    $rzip = $_REQUEST['customerzip'];
    $remail = $_REQUEST['customeremail'];
    $rmobile = $_REQUEST['customermobile'];
    $rdate = $_REQUEST['requestdate'];
    $sql = "INSERT INTO submitrequest_tb(request_info, request_desc, customer_name, customer_add1, customer_add2, customer_city, customer_state, customer_zip, customer_email, customer_mobile, request_date)VALUES('$rinfo', 
    '$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rdate')";
    if($conn->query($sql) == TRUE){
      $genid = mysqli_insert_id($conn);
      $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Request Successfully Submited</div>";
      $_SESSION['myid'] = $genid;
      echo "<script> location.href='submitrequestsuccess.php'</script>";
    } else {
      $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Submit Request Failed</div>";
    }
  }
}

?>

<!-- start submit request 2nd column -->
<div class="col-sm-9 col-md-10 mt-5">
 <form class="mx-5" action="" method="POST">
  <div class="form-group">
   <label for="inputRequestinfo">Request Info</label>
   <input type="text" class="form-control" id="inputRequestinfo" placeholder="Request Info" name="requestinfo">
  </div>
  <div class="form-group">
   <label for="inputRequestDescription">Description</label>
   <input type="text" class="form-control" id="inputRequestDescription" placeholder="Write Description" name="requestdesc">
  </div>
  <div class="form-group">
   <label for="inputName">Name</label>
   <input type="text" class="form-control" id="inputName" placeholder="Name" name="customername">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
     <label for="inputAddress">Address Line 1</label>
     <input type="text" class="form-control" id="inputAddress" placeholder="Exmp: House 24/7" name="customeradd1">
    </div>
    <div class="form-group col-md-6">
     <label for="inputAddress2">Address Line 2</label>
     <input type="text" class="form-control" id="inputAddress2" placeholder="Exmp: Dhanmondi West" name="customeradd2">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
     <label for="inputCity">City</label>
     <input type="text" class="form-control" id="inputCity" name="customercity">
    </div>
    <div class="form-group col-md-4">
     <label for="inputState">State</label>
     <input type="text" class="form-control" id="inputState" name="customerstate">
    </div>
    <div class="form-group col-md-2">
     <label for="inputZip">Zip</label>
     <input type="text" class="form-control" id="inputZip" name="customerzip" onkeypress="isInputNumber(event)">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
     <label for="inputEmail">Email</label>
     <input type="email" class="form-control" id="inputEmail" name="customeremail">
    </div>
    <div class="form-group col-md-2">
     <label for="inputMobile">Mobile</label>
     <input type="text" class="form-control" id="inputMobile" name="customermobile" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group col-md-2">
     <label for="inputDate">Date</label>
     <input type="date" class="form-control" id="inputDate" name="requestdate">
    </div>
  </div>
  <button type="submit" class="btn btn-danger" name="submitrequest">Submit</button>
  <button type="reset" class="btn btn-secondary">Reset</button>

 </form>
 <?php 
  if(isset($msg)){echo $msg;}
 ?>
</div><!-- end submit request 2nd column -->
<!-- only number for input fields -->
<script>
  function isInputNumber(evt){
   var ch = String.fromCharCode(evt.which);
   if(!(/[0-9]/.test(ch))){
     evt.preventDefault()
   }
 }
</script>

<?php 
include('includes/footer.php');
?>