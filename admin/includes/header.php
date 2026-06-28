<?php

if(!(isset($_SESSION))){
	session_start();
}

// User must login to access dashboard
if(!isset($_SESSION['admin_email'])){
	header('Location:login.php');
}


include('connection.php');

?>
<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/rocker/demo/vertical/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Feb 2022 14:09:32 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<!-- <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" /> -->
	<link rel="icon" href="../assets/logo/logo1.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<link rel="stylesheet" href="assets/plugins/loader/loader.css">
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<!-- Fontawesome v6 -->
	<!-- Custom CSS -->
	<link rel="stylesheet" href="../assets/css/custom.css">
	<link rel="stylesheet" href="../assets/css/all.min.css">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css" />
	<link rel="stylesheet" href="assets/css/semi-dark.css" />
	<link rel="stylesheet" href="assets/css/header-colors.css" />

	



	<title><?php echo TITLE ?></title>
</head>

<body>


<!-- Loader Start-->
<div class="loader-icon"></div>
<!-- Loader End-->



	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper Start -->


		<?php
        include('sidebar.php');
        ?>

		<!--end sidebar wrapper End-->


		<!-- Nav Start -->
        <?php 
        include('nav.php');
        ?>
		<!-- Nav End -->