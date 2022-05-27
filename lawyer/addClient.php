<?php include('includes/header.php'); ?>



<!--start page wrapper -->
<div class="page-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-xl-9 mx-auto">
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-user me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Add New Client</h5>
								</div>
								<hr>
								<form class="row g-3">
									<div class="col-md-6">
										<label for="inputFirstName" class="form-label">First Name <span class="text-danger">*</span></label>
										<input type="email" class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-6">
										<label for="inputLastName" class="form-label">Last Name <span class="text-danger">*</span></label>
										<input type="password" class="form-control" id="inputLastName">
									</div>
									<div class="col-md-4">
										<label for="fullname">Gender <span class="text-danger">*</span></label><br>

										<input type="radio" name="gender" id="genderM" value="Male" checked="" required/> &nbsp;&nbsp;Male:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
										<input type="radio" name="gender" id="genderF" value="Female"/>&nbsp;&nbsp;Female
									</div>
									<div class="col-md-5">
										<label for="inputEmail" class="form-label">Email <span class="text-danger">*</span></label>
										<input type="email" class="form-control" id="inputEmail">
									</div>
									<div class="col-md-3">
										<label for="inputMobileNo" class="form-label">Mobile No <span class="text-danger">*</span></label>
										<input type="text" class="form-control" id="inputPassword">
									</div>
									<div class="col-12">
										<label for="inputAddress" class="form-label">Address <span class="text-danger">*</span></label>
										<textarea class="form-control" id="inputAddress" placeholder="Address..." rows="3"></textarea>
									</div>
									<div class="col-md-6">
										<label for="inputCity" class="form-label">City <span class="text-danger">*</span></label>
										<input type="text" class="form-control" id="inputCity">
									</div>
									<div class="col-md-6">
										<label for="inputState" class="form-label">State <span class="text-danger">*</span></label>
										<select id="inputState" class="form-select">
											<option selected>Choose...</option>
											<option>Punjab</option>
											<option>Sindh</option>
											<option>Balochistan</option>
											<option>KPK</option>
											<option>Fedral Area</option>
											<option>Azad Kashmir</option>
										</select>
									</div>
									<div class="col-md-6">
										<label for="inputReferenceName" class="form-label">Reference Name</label>
										<input type="text" class="form-control" id="inputReferenceName">
									</div>
									<div class="col-md-6">
										<label for="inputReferenceNo" class="form-label">Reference No</label>
										<input type="text" class="form-control" id="inputReferenceNo">
									</div>

									<div class="col-12">
										<button type="submit" class="btn btn-primary px-5">Register</button>
										<a href="clients.php" class="btn btn-secondary px-5">Back</a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
		<!--end page wrapper -->





<?php include('includes/footer.php'); ?>