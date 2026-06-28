
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
					   <a href="#" class='text-first'>
						   <div class="card radius-10 border-start border-0 border-3 border-info">
							  <div class="card-body">
							  <div class="d-flex align-items-center">
								  <div>
									  <p class="mb-0 text-secondary">Clients</p>
									  <h4 class="my-1 text-info">
									  <?php
											$sql = "SELECT * FROM client";
											$result = mysqli_query($conn, $sql);
											echo mysqli_num_rows($result);
										?>
									  </h4>
									  <p class="mb-0 font-13">Total Clients on DLS</p>
								  </div>
								  <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class="fas fa-users"></i>
								  </div>
							  </div>
							  </div>
						  </div>

					   </a>
					</div>
				   <div class="col">
					   <a href="lawyers.php" class="text-first">
						   <div class="card radius-10 border-start border-0 border-3 border-danger">
							  <div class="card-body">
								  <div class="d-flex align-items-center">
									  <div>
										  <p class="mb-0 text-secondary">Lawyers</p>
										  <h4 class="my-1 text-danger">5</h4>
										  <p class="mb-0 font-13">Total Lawyers on DLS</p>
									  </div>
									  <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class="fas fa-user-graduate "></i>
									  </div>
								  </div>
							  </div>
						   </div>
					   </a>
				  </div>
				  <div class="col">
					<a href="requests.php" class="text-first">
						<div class="card radius-10 border-start border-0 border-3 border-success">
						   <div class="card-body">
							   <div class="d-flex align-items-center">
								   <div>
									   <p class="mb-0 text-secondary">Requests</p>
									   <h4 class="my-1 text-success">
									   <?php
												$sql = "SELECT * FROM lawyer WHERE lawyer_status = 0 ";
												$result = mysqli_query($conn, $sql);
												echo mysqli_num_rows($result);
												?>
									   </h4>
									   <p class="mb-0 font-13">New Lawyers</p>
								   </div>
								   <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class="fas fa-hand-paper    "></i>
								   </div>
							   </div>
						   </div>
						</div>

					</a>
				  </div>
				  <div class="col">
					  <a href="userQueries.php" class="text-first">

						  <div class="card radius-10 border-start border-0 border-3 border-warning">
							 <div class="card-body">
								 <div class="d-flex align-items-center">
									 <div>
										 <p class="mb-0 text-secondary">Queries</p>
										 <h4 class="my-1 text-warning">
										 <?php
												$sql = "SELECT * FROM query WHERE replied = 0";
												$result = mysqli_query($conn, $sql);
												echo mysqli_num_rows($result);
												?>
										 </h4>
										 <p class="mb-0 font-13">Unreplied Queries</p>
									 </div>
									 <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class="fas fa-reply-all    "></i>
									 </div>
								 </div>
							 </div>
						  </div>
					  </a>
				  </div> 
				</div><!--end row-->


				<!-- Top Rated Lawyers Start -->
				<div class="card radius-10">
                         <div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Top Rated Lawyers</h6>
								</div>
							</div>
						 <div class="table-responsive">
						   <table class="table align-middle mb-0">
							<thead class="table-light">
								<tr>
								<th>Lawyer ID</th>
								<th>Lawyer Name</th>
								<th>Stars</th>
								<th>Rating</th>
								<th>Position</th>
								<th>Joining Date</th>
								<th>Action</th>
								</tr>
							 </thead>
							 <tbody>

							 <?php
							 $sql = "SELECT * FROM lawyer ORDER BY average_rate DESC LIMIT 5";
							 $result = mysqli_query($conn, $sql);
							 $position = 1;
							 while($row = mysqli_fetch_assoc($result)){

							
							 ?>

								<tr>
									<td><?php echo $row['lawyer_id'] ?></td>
									<td><?php echo $row['lawyer_fname'] . ' ' . $row['lawyer_lname'] ?></td>
									<td>
										<i class="fas fa-star <?php if($row['average_rate'] == 5 || $row['average_rate'] == 4 || $row['average_rate'] == 3 || $row['average_rate'] == 2 || $row['average_rate'] == 1) echo 'checked' ?>"></i>
										<i class="fas fa-star <?php if($row['average_rate'] == 5 || $row['average_rate'] == 4 || $row['average_rate'] == 3 || $row['average_rate'] == 2) echo 'checked' ?>"></i>
										<i class="fas fa-star <?php if($row['average_rate'] == 5 || $row['average_rate'] == 4 || $row['average_rate'] == 3) echo 'checked' ?>"></i>
										<i class="fas fa-star <?php if($row['average_rate'] == 5 || $row['average_rate'] == 4) echo 'checked' ?>"></i>
										<i class="fas fa-star <?php if($row['average_rate'] == 5) echo 'checked' ?>"></i>
									</td>
									<td><?php echo '<span class="display-6">' .$row['average_rate'] . '</span>' . '/5' ?></td>
									<td><?php echo $position ?></td>
									<td><?php echo $row['Created_at'] ?></td>
									<td>
										<div class="dropdown ms-auto">
											<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
											</a>
											<ul class="dropdown-menu" style="">
												<li><a class="dropdown-item" href="https://wa.me/3020006566"><i class="fa-brands fa-whatsapp"></i> Whatsapp</a>
												</li>
												<li><a class="dropdown-item" href="mailto:<?php echo $row['lawyer_email'] ?>"><i class="fas fa-envelope-open fa-xs"></i> Email</a>
												</li>
											</ul>
										</div>
									</td>
								</tr>


								<?php $position++; } ?>
				
							 	
						    </tbody>
						  </table>
						  </div>
						 </div>
					</div>
				<!-- Top Rated Lawyers End -->

			

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