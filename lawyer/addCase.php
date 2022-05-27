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
									<h5 class="mb-0 text-primary">Add New Case</h5>
								</div>
								<hr>
								<form class="row g-3">
									<div class="col-md-6">
										<label for="inputFirstName" class="form-label">First Name</label>
										<input type="email" class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-6">
										<label for="inputLastName" class="form-label">Last Name</label>
										<input type="password" class="form-control" id="inputLastName">
									</div>
									<div class="col-md-6">
										<label for="inputEmail" class="form-label">Email</label>
										<input type="email" class="form-control" id="inputEmail">
									</div>
									<div class="col-md-6">
										<label for="inputPassword" class="form-label">Password</label>
										<input type="password" class="form-control" id="inputPassword">
									</div>
									<div class="col-12">
										<label for="inputAddress" class="form-label">Address</label>
										<textarea class="form-control" id="inputAddress" placeholder="Address..." rows="3"></textarea>
									</div>
									<div class="col-12">
										<label for="inputAddress2" class="form-label">Address 2</label>
										<textarea class="form-control" id="inputAddress2" placeholder="Address 2..." rows="3"></textarea>
									</div>
									<div class="col-md-6">
										<label for="inputCity" class="form-label">City</label>
										<input type="text" class="form-control" id="inputCity">
									</div>
									<div class="col-md-4">
										<label for="inputState" class="form-label">State</label>
										<select id="inputState" class="form-select">
											<option selected>Choose...</option>
											<option>...</option>
										</select>
									</div>
									<div class="col-md-2">
										<label for="inputZip" class="form-label">Zip</label>
										<input type="text" class="form-control" id="inputZip">
									</div>
									<div class="col-12">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" id="gridCheck">
											<label class="form-check-label" for="gridCheck">Check me out</label>
										</div>
									</div>
									<div class="col-12">
										<button type="submit" class="btn btn-primary px-5">Register</button>
										<a href="cases.php" class="btn btn-secondary px-5">Back</a>
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