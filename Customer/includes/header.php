
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="../css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">

    <title><?php echo TITLE ?></title>
</head>
<body>
<!-- top navbar -->
<nav class="navbar navbar-dark fixed-top bg-secondary flex-md-nowrap p-0 shadow"><a class="navbar-brand col-sm-3 col-md-2 mr-0" href="customerprofile.php">BD Spanners</a></nav>
   <!-- container -->
    <div class="container-fluid" style="margin-top:40px;">
     <div class="row"><!-- start row -->
     <!-- side bar -->
      <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
       <div class="sidebar-sticky">
        <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'customerprofile')
        {echo 'active';} ?>" href="customerprofile.php"><i class="fas fa-user"></i>Profile</a></li>
        <li class="nav-item"><a class="nav-link <?php if(PAGE ==
        'submitrequest'){echo 'active';} ?>" href="submitrequest.php"><i class="fab fa-accessible-icon"></i>Submit Request</a></li>
        <li class="nav-item"><a class="nav-link <?php if(PAGE ==
        'checkstetus'){echo 'active';} ?>" href="checkstetus.php"><i class="fas fa-align-center"></i>Check Status</a></li>
        <li class="nav-item"><a class="nav-link <?php if(PAGE ==
        'changepassword'){echo 'active';} ?>" href="changepassword.php"><i class="fas fa-key"></i>Change Password</a></li>
        <li class="nav-item"><a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
        </ul>
       </div>
      </nav><!-- side bar end --> 