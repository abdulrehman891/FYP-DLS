<?php
define('TITLE', 'Lawyer Login');
include("includes/connection.php");

if(isset($_REQUEST['signin'])){

	$lawyerEmail = $_REQUEST['email'];
	$lawyerPassword = $_REQUEST['password'];


	// if any field is empty
	if($lawyerEmail == "" || $lawyerPassword == ""){
		$msg = '<div class="col-12">
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong>Please!</strong> Fill All Fields.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		</div>';


	} 
	
	

	// If lawyer already register AND Not approved by Admin
	elseif(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM lawyer WHERE lawyer_email = '$lawyerEmail' AND lawyer_status = 0 ")) == 1){
		$msg = '<div class="col-12">
					<div class="alert alert-info alert-dismissible fade show" role="alert">
					You are already registered but please wait for <strong>Admin Approval</strong>.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				</div>';
	}




	// If lawyer dismissed by Admin
	elseif(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM lawyer WHERE lawyer_email = '$lawyerEmail' AND lawyer_status = 2 ")) == 1){
		$msg = '<div class="col-12">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Fake Account!</storng> You cannot join us again.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				</div>';
	}
	
	
	
	
	
	else {
		$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
		$password = mysqli_real_escape_string($conn, $_REQUEST['password']);

		$sql = "SELECT * FROM lawyer WHERE lawyer_email = '$email' AND lawyer_pass = '$password'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);

		// Login Successful
		if(mysqli_num_rows($result) == 1){
			$_SESSION['lawyer_id'] = $row['lawyer_id'];
			$_SESSION['lawyer_email'] = $email;
			header('Location:index.php');
		}
		// Wrong Email or Password
		$msg = '<div class="col-12">
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Wrong!</strong> Email or Password.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		</div>';

	}
}



?>






<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/rocker/demo/vertical/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Feb 2022 14:09:33 GMT -->
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
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title><?php echo TITLE ?></title>
</head>

<?php

if(isset($_POST['sub'])){
 echo$email=mysqli_real_escape_string($conn,$_POST['email']);
 echo$pass=mysqli_real_escape_string($conn,$_POST['password']);
 
 $sql="SELECT * FROM `login` WHERE lemail='$email' and lpass='$pass'";
 $run=mysqli_query($conn,$sql);	
 $fet=mysqli_fetch_array($run);
 
 if($fet['lstatus']=='lawyer' || $fet['lstatus']=='admin' ){

   $_SESSION['lemail']=$email;
   header('Location:index.php');
 }
   else{
	?>
	<script>
		alert("Your email or password is incorrect!")
	</script>
	
	<?php
   }
 
 }
 ?>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="mt-4 text-center">
							<!-- <img src="assets/images/logo-img.png" width="180" alt="" /> -->
							
						</div>
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Lawyer Sign in</h3>
										<p>Don't have an account yet? <a href="lawyerRegistration.php" class="text-secondary">Sign up here</a>
										</p>
									</div>

									<!-- Remove Login by Facebook or Gmail -->
									<!-- <div class="d-grid">
										<a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span class="d-flex justify-content-center align-items-center">
                          <img class="me-2" src="assets/images/icons/search.svg" width="16" alt="Image Description">
                          <span>Sign in with Google</span>
											</span>
										</a> <a href="javascript:;" class="btn btn-facebook"><i class="bx bxl-facebook"></i>Sign in with Facebook</a>
									</div> -->


									<?php
									if(isset($msg)) {echo $msg;}
									if(isset($_SESSION['msg'])){
										echo $_SESSION['msg'];
										unset($_SESSION['msg']);
									}
									?>


									<div class="login-separater text-center mb-4"> <span>SIGN IN WITH EMAIL</span>
										<hr/>
									</div>
									<div class="form-body">
										<form class="row g-3" method="POST">
											<div class="col-12">
												<label for="email" class="form-label">Email Address</label>
												<input type="email" name="email" class="form-control" class="email" id="email" placeholder="Email Address">
											</div>
											<div class="col-12">
												<label for="password" class="form-label">Enter Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" name="password" id="password"  placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<!-- <div class="col-md-6">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
													<label class="form-check-label" for="flexSwitchCheckChecked" >Remember Me</label>
												</div>
											</div> -->
											<div class="col-md-12 text-end">	<a href="forgetPassword.php" class="text-secondary">Forgot Password ?</a>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" name="signin" class="btn btn-dark"><i class="bx bxs-lock-open"></i>Sign in
												</button>
												</div>
											</div>											
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>
</html>