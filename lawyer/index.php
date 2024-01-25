
<!-- Header Start -->
<?php
include('includes/connection.php');


if (!isset($_SESSION['lawyer_email'])) {
    header('Location:lawyerLogin.php');
} 
include('includes/header.php');


?>

<!-- Header End -->



		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                   <div class="col">
					   <a href="clients.php" class='text-first'>
						   <div class="card radius-10 border-start border-0 border-3 border-info">
							  <div class="card-body">
							  <div class="d-flex align-items-center">
								  <div>
									  <p class="mb-0 text-secondary">Clients</p>
									  <h4 class="my-1 text-info">48</h4>
									  <p class="mb-0 font-13">Total Clients</p>
								  </div>
								  <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class="fas fa-users"></i>
								  </div>
							  </div>
							  </div>
						  </div>

					   </a>
					</div>
				   <div class="col">
					   <a href="cases.php">
						   <div class="card radius-10 border-start border-0 border-3 border-danger">
							  <div class="card-body">
								  <div class="d-flex align-items-center">
									  <div>
										  <p class="mb-0 text-secondary">Cases</p>
										  <h4 class="my-1 text-danger">5</h4>
										  <p class="mb-0 font-13">Total Cases</p>
									  </div>
									  <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class="fas fa-gavel"></i>
									  </div>
								  </div>
							  </div>
						   </div>
					   </a>
				  </div>
				  <div class="col">
					<div class="card radius-10 border-start border-0 border-3 border-success">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Important</p>
								   <h4 class="my-1 text-success">5</h4>
								   <p class="mb-0 font-13">Total Important Cases</p>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class="fas fa-star "></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
					  <a href="cases.php#acases">

						  <div class="card radius-10 border-start border-0 border-3 border-warning">
							 <div class="card-body">
								 <div class="d-flex align-items-center">
									 <div>
										 <p class="mb-0 text-secondary">Archieved</p>
										 <h4 class="my-1 text-warning">6</h4>
										 <p class="mb-0 font-13">Total Completed Cases</p>
									 </div>
									 <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class="fas fa-file-archive"></i>
									 </div>
								 </div>
							 </div>
						  </div>
					  </a>
				  </div> 
				</div><!--end row-->

					<!-- Calendar Start -->
				<div class="row shadow bg-white p-3 mb-4">
					<div class="row d-flex justify-content-between">
						<div id="calendar"></div>
					</div> 				
				</div>
				<!--Calendar end-->

			

			</div>
		</div>





		<!--end page wrapper -->
		

<!-- Footer Start -->
<?php
include('includes/footer.php');
?>

<!-- Footer End -->