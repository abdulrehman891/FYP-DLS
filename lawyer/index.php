
<!-- Header Start -->
<?php
define('TITLE', 'Dashboard');
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
									  <h4 class="my-1 text-info">
										<?php
										$lawyerId = $_SESSION['lawyer_id'];
										$sql = "SELECT * FROM client WHERE lawyer_id = '$lawyerId' AND is_assign = 1";
										$result = mysqli_query($conn, $sql);
										echo mysqli_num_rows($result);
										?>
									  </h4>
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
					   <a href="clientRequest.php" class="text-first">
						   <div class="card radius-10 border-start border-0 border-3 border-danger">
							  <div class="card-body">
								  <div class="d-flex align-items-center">
									  <div>
										  <p class="mb-0 text-secondary">Requests</p>
										  <h4 class="my-1 text-danger">
										  <?php
											$lawyerId = $_SESSION['lawyer_id'];
											$sql = "SELECT * FROM client WHERE lawyer_id = '$lawyerId' AND is_assign = 0";
											$result = mysqli_query($conn, $sql);
											echo mysqli_num_rows($result);
											?>
										  </h4>
										  <p class="mb-0 font-13">New Clients</p>
									  </div>
									  <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class="fas fa-hand-paper"></i>
									  </div>
								  </div>
							  </div>
						   </div>
					   </a>
				  </div>
				  <div class="col">
					<a href="appointments.php" class="text-first">
						<div class="card radius-10 border-start border-0 border-3 border-success">
						   <div class="card-body">
							   <div class="d-flex align-items-center">
								   <div>
									   <p class="mb-0 text-secondary">Appointment</p>
									   <h4 class="my-1 text-success">
									   <?php
												$lawyerId = $_SESSION['lawyer_id'];
												$date = date("Y-m-d");
												$sql = "SELECT * FROM appointment WHERE lawyer_id = '$lawyerId' AND appointment_date = '$date' AND appointment_status = 0";
												$result = mysqli_query($conn, $sql);
												echo mysqli_num_rows($result);
												?>
									   </h4>
									   <p class="mb-0 font-13">Today's Appointment</p>
								   </div>
								   <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class="fas fa-calendar    "></i>
								   </div>
							   </div>
						   </div>
						</div>
					</a>
				  </div>
				  <div class="col">
					  <a href="cases.php" class="text-first">

						  <div class="card radius-10 border-start border-0 border-3 border-warning">
							 <div class="card-body">
								 <div class="d-flex align-items-center">
									 <div>
										 <p class="mb-0 text-secondary">Cases</p>
										 <h4 class="my-1 text-warning">6</h4>
										 <p class="mb-0 font-13">Total Cases</p>
									 </div>
									 <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class="fas fa-gavel    "></i>
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




<!-- Modal Start-->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Next Date</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="get">
          <div class="row">
            <div class="col-md-12 mb-3">
              <label for="inputNextDate" class="form-label">Next Date <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="inputNextDate">
            </div>
			<div class="col-md-12">
				<div class="mb-3">
				  <label for="inputRemarks" class="form-label">Remarks <span class="text-danger">*</span></label>
				  <textarea class="form-control" name="inputRemarks" id="inputRemarks" rows="3"></textarea>
				</div>
			</div>
            <div class="modal-footer">
              <input type="submit" value="Add" class="btn btn-primary"></button>
              <input type="submit" value="Close" class="btn btn-secondary" data-bs-dismiss="modal"></button>
            </div>

          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<!-- Modal End-->




		<!--end page wrapper -->
		

<!-- Footer Start -->
<?php
include('includes/footer.php');
?>

<!-- Footer End -->