<?php 
define('TITLE', 'Forget Password');
include('includes/connection.php');

if(isset($_REQUEST['submit'])){
	$email = $_REQUEST['email'];

	// Checking Empty Field 
	if($email == ""){
		$msg = '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		
			<strong>Please</strong> Enter Email.
		</div>';
		
	}
	
	// if email already exist
	elseif(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE user_email = '$email'")) < 1){
		$msg = '<div class="alert alert-info alert-dismissible fade show text-center" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		
			<strong>You Are Not Registered</strong> 
		</div>';

	}
	else {

		// Updating Token Attribute
		$token = bin2hex(random_bytes(15));
		$sql = "UPDATE user SET token = '$token' WHERE user_email = '$email'";
		mysqli_query($conn, $sql);


		// Sending Email
		$to_email = $email;
		$subject = "Password Reset Link";
		$body = "Hi, Please click here to Reset your password http://localhost/fyp-dls/user/resetPassword.php?token=$token";
		$headers = "From: anasmakki255@gmail.com";



      if (mail($to_email, $subject, $body, $headers)) {
          $msg  = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          
            <strong>Password Reset!</strong> link has been sent to your email.
          </div>';
          
        } else {
    
          $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          
            <strong>Please ensure you have internet connection!!!</strong>
          </div>';
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
		<div class="authentication-forgot d-flex align-items-center justify-content-center">
			<div class="card forgot-box">
				<div class="card-body">
					<div class="p-4 rounded  border">
						<div class="text-center">
							<img src="../lawyer/assets/images/icons/forget.png" width="120" alt="">
						</div>
						<h4 class="mt-5 font-weight-bold">Forgot Password?</h4>
						<p class="text-muted">Enter your registered email ID to reset the password</p>
						<form action="" method="get">
							<div class="my-4">
								<label class="form-label">Email id</label>
								<input type="text" name="email" class="form-control form-control-lg" placeholder="example@user.com">
							</div>
							<div class="d-grid gap-2">
								<button type="submit" name="submit" class="btn btn-dark btn-lg">Send</button> <a href="login.php" class="btn btn-light btn-lg"><i class="bx bx-arrow-back me-1"></i>Back to Login</a>
	
								
							</div>
						</form>
						<?php if(isset($msg)) echo $msg; 
						if(isset($_SESSION['msg'])){
							echo $_SESSION['msg'];
							unset($_SESSION['msg']);
						}
						?>
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