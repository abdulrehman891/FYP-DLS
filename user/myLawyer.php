
<!-- Header Start -->
<?php
include('includes/header.php');?>

<!-- Header End -->





		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

				
				<div class="container">


					<div class="main-body">
						<div class="row d-flex " id="myDIV">

						<?php
						$userId = $_SESSION['user_id'];
						$sql = "SELECT * FROM client WHERE client_id =  '$userId'";
						$result = mysqli_query($conn, $sql);
						while($row = mysqli_fetch_assoc($result)){

							$lawyerId = $row['lawyer_id'];
							$sql = "SELECT * FROM lawyer WHERE lawyer_id = '$lawyerId'";
							$result1 = mysqli_query($conn, $sql);
							$row1 = mysqli_fetch_assoc($result1);

					
						?>

							<div class="col-md-4 my-4 mycard">
								<div mx-auto="" class="card mx-auto" style="width: 18rem;">
									<img src="../lawyer/assets/images/lawyers/<?php echo $row1['lawyer_image'] ?>" class="card-img-top" alt="...">
									<div class="card-body">
										<h5 class="card-title"><?php echo $row1['lawyer_fname'] . " " . $row1['lawyer_lname'] ?></h5>
										<p class="text-muted"><?php echo $row1['lawyer_spec'] ?></p>
										<p class="card-text"><?php echo $row1['lawyer_description'] ?> </p>
									</div>

									<div class="card-footer">
									
										<form action="../lawyerProfile.php" method="get" class="d-flex flex-row justify-content-between">

										<a href="https://wa.me/3020006566" class="btn btn-outline-dark">Message</a>

											<input type="hidden" name="userId" value="<?php echo $_SESSION['user_id'] ?>">
											<input type="hidden" name="lawyerId" value="<?php echo $row1['lawyer_id'] ?>">
											<input type="hidden" name="lawyerEmail" value="<?php echo $row1['lawyer_email'] ?>">
											<button type="submit" class="btn btn-grey ">Profile</button>
										</form>
						
									</div>
								</div>
							</div>

							<?php } ?>



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