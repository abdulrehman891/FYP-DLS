
<!-- Header Start -->
<?php
include('includes/header.php');?>

<!-- Header End -->

<?php 
// Feedback Button Clicked
if(isset($_REQUEST['feedback'])){
	$userId = $_SESSION['user_id'];
	$feedbackMessage = $_REQUEST['feedbackMessage'];

	// Checking empty Fileds
	if($feedbackMessage == ""){
		$msg = '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
		<strong>Please Write Something!!!</strong>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>';

	}

	else{

		$sql = "INSERT INTO feedback(feedback_message, user_id) VALUES ('$feedbackMessage', '$userId')";
		$result = mysqli_query($conn, $sql);
		if($result){
			$msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
			<strong>Thank You!</strong> Your Valuable Feedback has been added.
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
									<!-- <h4 class="text-center mb-3">Change Password</h4> -->

									<?php
									$userId = $_SESSION['user_id'];
									$result = mysqli_query($conn, "SELECT * FROM user WHERE user_id = '$userId'");
									$row = mysqli_fetch_assoc($result);
									?>

									<form action="" method="get">
										<div class="mb-3">
											<label for="feedbackMessage" class="form-label">Enter Your Feedback</label>
											<textarea class="form-control" name="feedbackMessage" id="feedbackMessage" rows="3"></textarea>
										</div>


										<button type="submit" name="feedback" class="btn btn-dark">Feedback</button>

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