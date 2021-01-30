<?php
if(session_id() == ''){
    session_start();
}
if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
} else{
  echo "<script> location.href='login.php'</script>";
}
if(isset($_REQUEST['view'])) {
 $sql = "SELECT * FROM submitrequest_tb WHERE request_id = {$_REQUEST['id']}"; 
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
}
if(isset($_REQUEST['close'])){
    $sql = "DELETE FROM submitrequest_tb WHERE request_id = {$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo '<meta http-equiv="refresh" content= "0;URL=?closed" />';
    } else {
        echo "Unable to Delete";
    }
}
if(isset($_REQUEST['assign'])){
    if(($_REQUEST['request_id'] == "") || ($_REQUEST['request_info'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['customername'] == "") 
    || ($_REQUEST['address1'] == "") || ($_REQUEST['address2'] == "") || ($_REQUEST['customercity'] == "") || ($_REQUEST['customerstate'] == "") 
    || ($_REQUEST['customerzip'] == "") || ($_REQUEST['customeremail'] == "") || ($_REQUEST['customermobile'] == "") ||($_REQUEST['assigntech'] == "") 
    || ($_REQUEST['inputdate'] == "")){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    } else {
        $rid = $_REQUEST['request_id'];
        $rinfo = $_REQUEST['request_info'];
        $rdesc = $_REQUEST['requestdesc'];
        $rname = $_REQUEST['customername'];
        $radd1 = $_REQUEST['address1'];
        $radd2 = $_REQUEST['address2'];
        $rcity = $_REQUEST['customercity'];
        $rstate = $_REQUEST['customerstate'];
        $rzip = $_REQUEST['customerzip'];
        $remail = $_REQUEST['customeremail'];
        $rmobile = $_REQUEST['customermobile'];
        $rassigntech = $_REQUEST['assigntech'];
        $rdate = $_REQUEST['inputdate'];
        $sql = "INSERT INTO assignwork_tb (request_id, request_info, request_desc, customer_name, customer_add1, customer_add2, 
        customer_city, customer_state, customer_zip, customer_email, customer_mobile, assign_tech, assign_date) VALUES ('$rid', '$rinfo', '$rdesc', 
        '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rassigntech', '$rdate')";
        if($conn->query($sql) == TRUE){
        $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Assigned Successfully</div>';
        } else {
        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Error Assigning</div>';
        }
    }
}
?>

<div class="col-sm-5 mt-5 jumbotron"><!-- start assigned work 3rd column -->
<form action="" method="POST">
 <h5 class="text-center">Assign Work Order Request</h5> 
  <div class="form-group">
   <label for="request_id">Request ID</label>
   <input type="text" class="form-control" id="request_id" name="request_id" value="<?php if(isset($row['request_id']))echo $row['request_id']; ?>" readonly>
  </div>
  <div class="form-group">
   <label for="request_info">Request Info</label>
   <input type="text" class="form-control" id="request_info" name="request_info" value="<?php if(isset($row['request_info']))echo $row['request_info']; ?>">
  </div>
  <div class="form-group">
   <label for="requestdesc">Description</label>
   <input type="text" class="form-control" id="requestdesc" name="requestdesc" value="<?php if(isset($row['request_desc']))echo $row['request_desc']; ?>">
  </div>
  <div class="form-group">
   <label for="customername">Name</label>
   <input type="text" class="form-control" id="customername" name="customername" value="<?php if(isset($row['customer_name']))echo $row['customer_name']; ?>">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
     <label for="address1">Address Line 1</label>
     <input type="text" class="form-control" id="address1" name="address1" value="<?php if(isset($row['customer_add1']))echo $row['customer_add1']; ?>">
    </div>
    <div class="form-group col-md-6">
     <label for="address2">Address Line 2</label>
     <input type="text" class="form-control" id="address2" name="address2" value="<?php if(isset($row['customer_add2']))echo $row['customer_add2']; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
     <label for="customercity">City</label>
     <input type="text" class="form-control" id="customercity" name="customercity" value="<?php if(isset($row['customer_city']))echo $row['customer_city']; ?>">
    </div>
    <div class="form-group col-md-4">
     <label for="customerstate">State</label>
     <input type="text" class="form-control" id="customerstate" name="customerstate" value="<?php if(isset($row['customer_state']))echo $row['customer_state']; ?>">
    </div>
    <div class="form-group col-md-4">
     <label for="customerzip">Zip</label>
     <input type="text" class="form-control" id="customerzip" name="customerzip" value="<?php if(isset($row['customer_zip']))echo $row['customer_zip']; ?>" onkeypress="isInputNumber(event)">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-8">
     <label for="customeremail">Email</label>
     <input type="email" class="form-control" id="customeremail" name="customeremail" value="<?php if(isset($row['customer_email']))echo $row['customer_email']; ?>">
    </div>
    <div class="form-group col-md-4">
     <label for="customermobile">Mobile</label>
     <input type="text" class="form-control" id="customermobile" name="customermobile" value="<?php if(isset($row['customer_mobile']))echo $row['customer_mobile']; ?>" onkeypress="isInputNumber(event)">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
     <label for="assigntech">Assign to Technician</label>
     <input type="text" class="form-control" id="assigntech" name="assigntech">
    </div>
    <div class="form-group col-md-6">
     <label for="inputdate">Date</label>
     <input type="date" class="form-control" id="inputdate" name="inputdate">
    </div>
  </div>
  <div class="float-right">
  <button type="submit" class="btn btn-success" name="assign">Assign</button>
  <button type="reset" class="btn btn-secondary">Reset</button>
  </div>

 </form>
 <?php if(isset($msg)){echo $msg;} ?>
</div><!-- end assigned work 3rd column -->
<script>
  function isInputNumber(evt){
   var ch = String.fromCharCode(evt.which);
   if(!(/[0-9]/.test(ch))){
     evt.preventDefault()
   }
 }
</script>