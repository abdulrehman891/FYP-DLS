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
									<h5 class="mb-0 text-primary">Add New Appointment</h5>
								</div>
								<hr>
								<form class="row g-3">
									
									<div class="col-md-6" id="clientName">
										<label for="clientName" class="form-label">Client Name <span class="text-danger">*</span></label>
										<select name="clientName" id="clientName" class="form-select">
											<option value="" selected>Select Client</option>
											<option value="Rana Kamran">Rana Muhammad Kamran</option>
											<option value="Abdul Rahman">Abdul Rahman</option>
										</select>
									</div>
									<div class="col-md-6">
										<label for="clientEmail" class="form-label">Client Email <span class="text-danger"> *</span></label>
										<input type="email" class="form-control" name="clientEmail" id="clientEmail">
									</div>
									<div class="col-md-6">
										<label for="inputMobileNo" class="form-label">Mobile No <span class="text-danger">*</span></label>
										<input type="text" class="form-control" id="inputMobileNo">
									</div>
									<div class="col-md-3">
										<label for="inputDate" class="form-label">Date <span class="text-danger">*</span></label>
										<input type="date" class="form-control" id="inputDate">
									</div>
									<div class="col-md-3">
										<label for="inputTime" class="form-label">Time <span class="text-danger">*</span></label>
										<input type="time" class="form-control" id="inputTime">
									</div>
									<div class="col-12">
										<label for="inputNote" class="form-label">Note</label>
										<textarea class="form-control" id="inputNote" placeholder="Note..." rows="2"></textarea>
									</div>
									<div class="col-12">
										<button type="submit" class="btn btn-primary px-5">Save</button>
										<a href="appointments.php" class="btn btn-secondary px-5">Back</a>
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

<script>
	// New Client and Existing Client 
	// $(function () {
	// 	$('#existingClient').attr("class", "d-none");

	// 	$('[name = "type"]').on("change", function(){
	// 		var value = $(this).val();
	// 		if(value == "exists"){
	// 			$('#newClient').attr("class", "d-none");
	// 			$('#existingClient').attr("class", "d-block");
	// 		}else{
	// 			$('#existingClient').attr("class", "d-none");
	// 			$('#newClient').attr("class", "d-block");
	// 		}
	// 	});
	// });
</script>