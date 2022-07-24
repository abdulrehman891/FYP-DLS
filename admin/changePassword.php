
<!-- Header Start -->
<?php
include('includes/header.php');?>

<!-- Header End -->

<?php 
if(isset($_REQUEST['change'])){
	$adminId = $_SESSION['admin_id'];
	$newPassword = $_REQUEST['newPassword'];
	$confirmNewPassword = $_REQUEST['confirmNewPassword'];

	// Checking empty Fileds
	if($newPassword == "" || $confirmNewPassword == ""){
		$msg = '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
		<strong>Password Cannot be Empty</strong>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>';

	}

	elseif($newPassword != $confirmNewPassword){
		$msg = '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
		<strong>Password doesnt match</strong>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>';
	} 
	else{
		$sql = "UPDATE admin SET admin_password = '$newPassword' WHERE admin_id = '$adminId'";
		$result = mysqli_query($conn, $sql);
		if($result){
			$msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
			<strong>Password Changes Successfully</strong>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';			

		}
	}

}
?>




		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

				
				<div class="container">

				

					<div class="main-body">
						<div class="row">
							<div class="col-lg-6">
								<div class="card p-3">
									<h4 class="text-center mb-3">Admin Change Password</h4>

									<?php
									$adminId = $_SESSION['admin_id'];
									$result = mysqli_query($conn, "SELECT * FROM admin WHERE admin_id = '$adminId'");
									$row = mysqli_fetch_assoc($result);
									?>

									<form action="" method="get">
										<div class="mb-3">
											<label for="userEmail" class="form-label">Email address</label>
											<input type="email" class="form-control" name="userEmail" id="userEmail" value="<?php echo $row['admin_email'] ?>" readonly>
										</div>

										<div class="mb-3">
											<label for="newPassword" class="form-label">New Password</label>
											<input type="text" class="form-control" name="newPassword" id="newPassword" value="">
										</div>

										<div class="mb-3">
											<label for="confirmNewPassword" class="form-label">Confirm New Password</label>
											<input type="text" class="form-control" name="confirmNewPassword" id="confirmNewPassword" value="">
										</div>

										<button type="submit" name="change" class="btn btn-dark">Change</button>

										<br><br>

										<?php if(isset($msg)) echo $msg; ?>
										

									</form>
								</div>
							</div>
		
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end page wrapper -->
		

<!-- Footer Start -->
<?php
include('includes/footer.php');
?>

<!-- Footer End -->