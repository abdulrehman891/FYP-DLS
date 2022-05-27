
<!-- Header Start -->
<?php
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

				<!-- Appointment Dashboard -->
				<div class="row shadow bg-white p-3 mb-4">
					<div class="row d-flex justify-content-between">
						<div class="col-auto">
							<h4>Appointment</h4>
						</div>
						<div class="col-auto">
							<div class="input-group mb-3">
								<span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar"></i></span>
								<input type="text" class="form-control" value="14-04-2022"  aria-describedby="basic-addon1">
							</div>
						</div>
					</div> <hr>
					<div class="row">
					<table id="example2" class="table table-striped table-bordered example2">
						<thead class="">
							<tr>
							<th>No</th>
							<th>Client Name</th>
							<th>Date</th>
							<th>Time</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<td scope="row">2</td>
							<td>
								Mr Abrar
							</td>
							<td>
								14-05-2022
							</td>
							<td>
								5:53 AM
							</td>

							</tr>
						</tbody>
						</table>
					</div>
				</div><!--Appointement Dashboard end row-->


				<!-- OnBoard Dashboard -->
				<div class="row shadow bg-white p-3">
					<div class="row d-flex justify-content-between">
						<div class="col-auto">
							<h4>Case Board</h4>
						</div>
						<div class="col-auto">
							<div class="input-group mb-3">
								<span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar"></i></span>
								<input type="text" class="form-control" value="14-04-2022"  aria-describedby="basic-addon1">
							</div>
						</div>
					</div> <hr>
					<div class="row">
						<table id="example2" class="table table-striped table-bordered example2">
						<thead class="">
							<tr>
							<th>No</th>
							<th>Case No</th>
							<th>Case</th>
							<th>Next Date</th>
							<th>Status</th>
							<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<td scope="row">1</td>
							<td>
								58939 <br>
								Murder
							</td>
							<td>
								Rana Kamran <br>
								<b>VS</b> <br>
								Mr Saim
							</td>
							<td>
								15-02-2022
							</td>
							<td>Pending</td>

							<td>
								<a href="#" style="color:black;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-calendar"></i> Next Date</a>
							</td>
							</tr>
						</tbody>
						</table>
					</div>
				</div><!--OnBoard Dashboard end row-->

			

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