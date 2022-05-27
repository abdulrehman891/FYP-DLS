<?php include('includes/header.php'); ?>



<!--start page wrapper -->
<div class="page-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-xl-9 mx-auto">
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div>
                                        <!-- <i class="bx bxs-user me-1 font-22 text-primary"></i>
                                     -->
									</div>
									<h5 class="mb-0 text-primary">Add New Member</h5>
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
									<div class="col-md-6">
										<label for="inputEmail" class="form-label">Email <span class="text-danger">*</span></label>
										<input type="email" class="form-control" id="inputEmail">
									</div>
									<div class="col-md-6">
										<label for="inputMobileNo" class="form-label">Mobile No <span class="text-danger">*</span></label>
										<input type="text" class="form-control" id="inputMobileNo">
									</div>

									<div class="col-12">
										<label for="inputAddress" class="form-label">Address <span class="text-danger">*</span></label>
										<textarea class="form-control" id="inputAddress" placeholder="Address..." rows="3"></textarea>
									</div>


									<div class="col-md-6">
										<label for="inputPassword" class="form-label">Password <span class="text-danger">*</span></label>
										<input type="password" class="form-control" id="inputPassword">
									</div>
									<div class="col-md-6">
										<label for="inputConfirmPassword" class="form-label">Confirm Password <span class="text-danger">*</span></label>
										<input type="password" class="form-control" id="inputConfirmPassword">
									</div>
									<div class="col-md-6">
										<label for="inputCity" class="form-label">City <span class="text-danger">*</span></label>
										<input type="text" class="form-control" id="inputCity">
									</div>
									<div class="col-md-4">
										<label for="inputState" class="form-label">State <span class="text-danger">*</span></label>
										<select id="inputState" class="form-select">
											<option selected>Choose State</option>
											<option>Punjab</option>
											<option>Sindh</option>
											<option>Balochistan</option>
											<option>KPK</option>
											<option>Fedral Area</option>
										</select>
									</div>
									<div class="col-md-2">
										<label for="inputRole" class="form-label">Role <span class="text-danger">*</span></label>
										<select id="inputRole" class="form-select">
											<option selected>Choose Role</option>
											<option>Helper</option>
											<option>Assistant</option>
										</select>
									</div>
									<div class="col-md-12">
										<label for="Image" class="form-label">Upload Image</label>
										<input class="form-control" type="file" id="formFile" onchange="preview()">
										<img id="frame" src="" class="rounded img-fluid" />
									</div>
									<div class="col-12">
										<button type="submit" class="btn btn-primary px-5">Add</button>
										<a href="members.php" class="btn btn-secondary px-5">Back</a>
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

