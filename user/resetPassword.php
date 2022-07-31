<?php 
define('TITLE', 'Reset Password');
include('includes/connection.php');



$token = $_REQUEST['token'];
// Checking token Exist or not
$sql = "SELECT * FROM user WHERE token = '$token'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) < 1){
	$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			
				<strong>Reset Link</strong> has been expired!.
			</div>';
			header('Location:forgetPassword.php');

}


if(isset($_REQUEST['change'])){
	$newPassword = mysqli_real_escape_string($conn, $_REQUEST['newPassword']);
	$confirmPassword = mysqli_real_escape_string($conn, $_REQUEST['confirmPassword']);

	// Checking Empty Fileds
	if($newPassword == "" || $confirmPassword == ""){
		$msg = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		
			<strong>Please</strong> Fill All Fields
		</div>';
		
	}
	
	// Checking if Password is same
	elseif($newPassword != $confirmPassword){
		$msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		
			<strong>Passwords</strong> are different.
		</div>';
		
	}
	
	// Udpating Password
	else {
		$sql = "UPDATE user SET user_password = '$newPassword' WHERE token = '$token'";
		$result = mysqli_query($conn, $sql);
		if($result){
			$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			
				<strong>Password</strong> Updated Successfully!.
			</div>';
			header('Location:login.php');
		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			
				<strong>token</strong> Expired!.
			</div>';
			header('Location:login.php');

		}

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
	<title><?php echo TITLE; ?></title>
</head>


<body class="bg-forget">
	<!--wrapper-->
	

    <div class="wrapper">
		<div class="authentication-reset-password d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card">
						<div class="row g-0">
							<div class="col-lg-5 border-end">
								<div class="card-body">
									<div class="p-5">
										<div class="text-start">
											<!-- <img src="assets/images/logo-img.png" width="180" alt=""> -->
											<img src="../assets/logo/logo_jpg.jpg" width="180" alt="">
										</div>
										<h4 class="mt-5 font-weight-bold">Genrate New Password</h4>
										<p class="text-success">We received your reset password request. Please enter your new password!</p>

										<?php if(isset($msg)) echo $msg ?>

										<form action="" method="POST">
											<div class="mb-3 mt-5">
												<label class="form-label">New Password</label>
												<input type="text" name="newPassword" class="form-control" placeholder="Enter new password">
											</div>
											<div class="mb-3">
												<label class="form-label">Confirm Password</label>
												<input type="text" name="confirmPassword" class="form-control" placeholder="Confirm password">
											</div>
											<div class="d-grid gap-2">
												<button type="submit" name="change" class="btn btn-dark">Change Password</button> <a href="login.php" class="btn btn-light"><i class="bx bx-arrow-back mr-1"></i>Back to Login</a>
											</div>
										</form>

									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<img src="../lawyer/assets/images/login-images/forgot-password-frent-img.jpg" class="card-img login-img h-100" alt="...">
							</div>
						</div>
					</div>
				</div>
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