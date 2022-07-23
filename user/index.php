
<!-- Header Start -->
<?php
include('includes/header.php');?>

<!-- Header End -->

<?php 
// Update Clicked
if(isset($_REQUEST['update'])){
	$userId = $_SESSION['user_id'];
	$userName = $_REQUEST['userName'];
	$userEmail = $_REQUEST['userEmail'];
	$userMobile = $_REQUEST['userMobile'];
	$userAddress = $_REQUEST['userAddress'];
	$userDescription = $_REQUEST['userDescription'];
	$userImage = $_FILES['userImage']['name'];

	$sql = "UPDATE user SET user_name = '$userName' , user_email = '$userEmail', user_mobile = '$userMobile', user_address = '$userAddress', user_description = '$userDescription', user_image = '$userImage' WHERE user_id = '$userId' ";
	$result = mysqli_query($conn, $sql);
	if($result){

		// Saving image
		move_uploaded_file($_FILES['userImage']['tmp_name'], "assets/images/users/" . $userImage);

		$msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
		<strong>Update!</strong> Profile Updated Successfully.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>';
	}
}
?>






		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

				
				<div class="container">

				<?php if(isset($msg)) echo $msg ?>



				<?php 
				$userEmail = $_SESSION['user_email'];
				$sql = "SELECT * FROM user WHERE user_email = '$userEmail'";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
				?>

					<div class="main-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
											<img src="assets/images/users/<?php echo $row['user_image'] ?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
											<div class="mt-3">
												<h4><?php echo $row['user_name'] ?></h4>
												<p class="text-secondary mb-1"><?php echo $row['user_address'] ?></p>
												<p class="text-muted font-size-sm"><?php echo $row['user_description'] ?></p>
											</div>
										</div>
										<hr class="my-4" />
										
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">
										<form action="" method="post" enctype="multipart/form-data">
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Full Name</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="userName" value="<?php echo $row['user_name']?>" />
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Email</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="userEmail" value="<?php echo $row['user_email'] ?>" readonly/>
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Mobile</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="userMobile" value="<?php echo $row['user_mobile'] ?>" />
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Address</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="userAddress" value="<?php echo $row['user_address'] ?>" />
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Description</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="userDescription" value="<?php echo $row['user_description'] ?>" />
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Upload Image</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="file" class="form-control" name="userImage" />
												</div>
											</div>
											<div class="row">
												<div class="col-sm-3"></div>
												<div class="col-sm-9 text-secondary">
													<input type="submit" name="update" class="btn btn-primary px-4" value="Update" />
												</div>
											</div>
										</form>
									</div>
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