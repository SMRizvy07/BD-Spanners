<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="css/bootstrap.min.css">

 <!-- Font Awesome CSS -->
 <link rel="stylesheet" href="css/all.min.css">

 <!-- Google Font -->
 <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

 <!-- Custom CSS -->
 <link rel="stylesheet" href="css/custom.css">

    <title>BD Spanners</title>
</head>
<body>
   <!-- Start Navigation -->
 <nav class="navbar navbar-expand-sm navbar-dark bg-secondary pl-5 fixed-top">
  <a href="index.php" class="navbar-brand">BD Spanners</a>
  <span class="navbar-text">We are happy to serve you</span>
  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
    <span class="navbar-toggler-icon"></span>  
  </button>
  <div class="collapse navbar-collapse" id="myMenu">
      <ul class="navbar-nav pl-5 custom-nav">
          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="#services" class="nav-link">Services</a></li>
          <li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>
          <li class="nav-item"><a href="Customer/customerlogin.php" class="nav-link">Login</a></li>
          <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>

      </ul>
  </div>

 </nav>
   <!-- End Navigation -->

   <!-- start header jumbotron -->
  <header class="jumbotron back-image" style="background-image: url(Images/Banner2.jpg);">
   <div class="myclass mainheading">
     <h1 class="text-uppercase text-secondary font-weight-bold">Greetings</h1>
     <p class="font-italic">BD Spanners at your service</p>
     <a href="Customer/customerlogin.php" class="btn btn-dark mr-4">Login</a>
     <a href="#registration" class="btn btn-info mr-4">Sign Up</a>
   </div>
  </header> <!-- End header jumbotron -->

   <!-- start intro container-->
   <div class="container">
     <div class="jumbotron">
       <h3 class="text-center">About Us</h3>
       <p>
         BD Spanner is the most trusted partner for your home services or maintenance in Bangladesh. 
         This is the leading chain of multi-brand Electronics and Electrical service workshops 
         offering wide array of services. We mainly focus on enhancing your uses experience by offering
         world-class Electronic Appliances maintenance services. Our sole mission is "To provide
         Electronic Appliances care services to keep the devices fit and healthy and customers happy
         and smiles". With well-equipped Electronic Appliances service centres and fully trained mechanics, 
         we provide quality services with excellent packages that are designed for you.
       </p>
     </div>
   </div><!-- end intro container-->
<!-- start services section -->
<div class="container text-center border-bottom" id="services">
  <h2>Our Services</h2>
  <div class="row mt-4">
    <div class="col-sm-4 mb-4">
     <a href="#"><i class="fab fa-creative-commons-share fa-8x text-info"></i></a>
     <h4 class="mt-4">Electronics Appliances</h4>
    </div>
    <div class="col-sm-4 mb-4">
     <a href="#"><i class="fas fa-sliders-h fa-8x text-success"></i></a>
     <h4 class="mt-4">Maintenance</h4>
    </div>
    <div class="col-sm-4 mb-4">
     <a href="#"><i class="fas fa-toolbox fa-8x text-muted"></i></a>
     <h4 class="mt-4">Repair</h4>
    </div>
  </div>
</div>
<!-- end services section -->

<!-- start registration form -->
<?php include('userRegistration.php') ?>
<!-- End registration form -->

<!-- start Customer reveiw -->
<div class="jumbotron bg-secondary">
  <div class="container">
    <h2 class="text-center text-white">Customer Reviews</h2>
    <div class="row mt-5">

      <!-- 1st clmn -->
      <div class="col-lg-3 col-sm-6">
        <div class="card shadow-lg mb-2">
          <div class="card-body text-center">
            <img src="images/avatar1.jpg" class="img-fluid" 
            style="border-radius:100px;" alt="avt1">
            <h4 class="card-title">Sawban</h4>
            <p class="card-text">I am totally satisfied about this company. 
              They are very helpful.
            </p>
          </div>
        </div>
      </div>

      <!-- 2nd clmn -->
      <div class="col-lg-3 col-sm-6">
        <div class="card shadow-lg mb-2">
          <div class="card-body text-center">
            <img src="images/avatar2.jpg" class="img-fluid" 
            style="border-radius:100px;" alt="avt2">
            <h4 class="card-title">Proma</h4>
            <p class="card-text">I am very satisfied. 
              They are very helpful and useful. They are like professional 
            </p>
          </div>
        </div>
      </div>

      <!-- 3rd clmn -->
      <div class="col-lg-3 col-sm-6">
        <div class="card shadow-lg mb-2">
          <div class="card-body text-center">
            <img src="images/avatar3.jpg" class="img-fluid" 
            style="border-radius:100px;" alt="avt3">
            <h4 class="card-title">Javeed</h4>
            <p class="card-text">This company is very good at their work. 
              They are professional.
            </p>
          </div>
        </div>
      </div>

      <!-- 4th clmn -->
      <div class="col-lg-3 col-sm-6">
        <div class="card shadow-lg mb-2">
          <div class="card-body text-center">
            <img src="images/avatar4.jpg" class="img-fluid" 
            style="border-radius:100px;" alt="avt4">
            <h4 class="card-title">Nourin</h4>
            <p class="card-text">This company is very satisfing. 
              They are very helpful and useful.
            </p>
          </div>
        </div>
      </div><!-- end Customer reveiw -->

    </div>
  </div>
</div>

      <!-- start Contact us -->
      <div class="container" id="contact">
        <h2 class="text-center mb-4">Contact Us</h2>
        <div class="row">
          <!-- 1st clmn -->
          <?php include('contactform.php') ?>
          <!-- end 1st clmn -->

        <!-- start 2nd clmn -->
        <div class="col-md-4 text-center">
          <strong>Headquarter:</strong><br>
          BD Spanners ltd,<br>
          Road 7/a, Dhanmondi,<br>
          Dhaka, Bangladesh<br>
          Phone: +88000000000<br>
          <a href="#" target="_blank">www.bdspanners.com</a>
          <br> <br>
          <strong>Savar Branch:</strong><br>
          BD Spanners ltd,<br>
          Road 12/14, Radio coloni,<br>
          Dhaka, Bangladesh<br>
          Phone: +88000000000<br>
          <a href="#" target="_blank">www.bdspanners.com</a>

        </div><!-- end 2nd clmn -->
        </div>
      </div><!-- end Contact us -->

      <!-- start footer -->
      <footer class="container-fluid bg-dark mt-5 text-white">
        <div class="container">
          <div class="row py-3">

            <!-- 1st clmn -->
            <div class="col-md-6">
              <span class="pr-2">Follow Us :</span>
              <a href="#" target="_blank" class="pr-2 fi-color">
                <i class="fab fa-facebook-f"></i></a>
                <a href="#" target="_blank" class="pr-2 fi-color">
                <i class="fab fa-twitter"></i></a>
                <a href="#" target="_blank" class="pr-2 fi-color">
                <i class="fab fa-youtube"></i></a>
                <a href="#" target="_blank" class="pr-2 fi-color">
                <i class="fab fa-google-plus-g"></i></a>
            </div><!-- end 1st clmn -->

            <!-- start 2nd clmn -->
            <div class="col-md-6 text-right">
              <small>Designed by SM Rabby Hasan &copy; 2020</small>
              <small class="ml-2"><a href="Admin/login.php">Admin Login</a></small>

            </div><!-- end 2nd clmn -->

          </div>

        </div>

      </footer>
      <!-- end footer -->

   <!-- javascript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>

</body>
</html>