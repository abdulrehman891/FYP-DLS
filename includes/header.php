<?php
include('dbConnection.php');
if(!isset($_SESSION)){
  session_start();
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Testimonial CSS Plugin -->
    <link rel="stylesheet" href="assets/plugins/owl-carousel/owl.carousel.min.css">

    <title><?php echo TITLE; ?></title>
    <link rel="icon" type="image/x-icon" href="assets/logo/logo1.png">
</head>
<body>


    <!-- Navbar Start -->
    <nav class="navbar custom-nav navbar-expand-md fixed-top navbar-dark px-5 py-3">
        <div class="container-fluid">
            <a class="navbar-brand ms-5 " href="index.php"><img width="120px" src="assets/logo/logo2.png" alt="" srcset=""></a>          
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto me-5">
              <li class="nav-item">
                <a class="nav-link <?php if(PAGE == 'Home') echo 'active'; ?>" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if(PAGE == 'Practice Areas') echo 'active'; ?>" href="practices.php">Practice Areas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if(PAGE == 'Services') echo 'active'; ?>" href="services.php">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if(PAGE == 'Lawyers') echo 'active'; ?>" href="lawyers.php">Lawyers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if(PAGE == 'About Us') echo 'active'; ?>" href="about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if(PAGE == 'Contact Us') echo 'active'; ?>" href="contact.php">Contact Us</a>
              </li>

              <?php
              if(isset($_SESSION['user_email'])){
              ?>
              <li class="nav-item">
                <a class="nav-link" href="user/index.php">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="userLogout.php">Logout</a>
              </li>
                <?php } ?>

            </ul>
          </div>
        </div>
      </nav>
    <!-- Navbar End -->



