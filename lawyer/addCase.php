<?php 
define('TITLE', 'Add Case');
include('includes/header.php'); ?>



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
								<form class="">
									<!-- Client Details Part -->
									<div class="row mb-5">
										<h3 class="text-center">Client Detail</h3>
										<div class="col-md-6">
											<label for="inputClient" class="form-label">Client <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="inputClient">
										</div>
										<div class="col-md-6">
											
<br><br>
		<div class="form-check form-check-inline">
			<input type="radio" class="form-check-input" id="petitioner" name="optradio" value="petitioner" checked>Petitioner
			<label class="form-check-label" for="petitioner"></label>
		</div>

		<div class="form-check form-check-inline">
			<input type="radio" class="form-check-input" id="respondent" name="optradio" value="respondent">Respondent
			<label class="form-check-label" for="respondent"></label>
		</div>





										</div>

											<div class="col-md-6 respondent">
												<label for="inputRespondentName" class="form-label">Respondent Name <span class="text-danger">*</span></label>
												<input type="text" class="form-control" id="inputRespondentName">
											</div>
											<div class="col-md-6 respondent">
												<label for="inputRespondentAdvocate" class="form-label">Respondent Advocate <span class="text-danger">*</span></label>
												<input type="text" class="form-control" id="inputRespondentAdvocate">
											</div>

									

										<div class="col-md-6 petitioner">
											<label for="inputPetitionerName" class="form-label">Petitioner Name <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="inputPetitionerName">
										</div>
										<div class="col-md-6 petitioner">
											<label for="inputPetitionerAdvocate" class="form-label">Petitioner Advocate <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="inputPetitionerAdvocate">
										</div>



									<!-- Case Detail Part -->

									<div class="row my-5"><hr>
										<h3 class="text-center">Case Detail</h2>

										<div class="col-md-6">
											<label for="inputCaseNumber" class="form-label">Case Nummber <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="inputCaseNumber">
										</div>
										<div class="col-md-3">
											<div class="mb-3">
											  <label for="inputCaseType" class="form-label">Case Type</label>
											  <select class="form-select" name="inputCaseType" id="inputCaseType">
												<option selected disabled>Choose...</option>
												<option>Murder</option>
												<option>Snapping</option>
											  </select>
											</div>								
										</div>
										<div class="col-md-3">
											<div class="mb-3">
											  <label for="inputCaseType" class="form-label">Case Sub Type</label>
											  <select class="form-select" name="inputCaseType" id="inputCaseType">
												<option selected disabled>Choose...</option>
												<option>Murder</option>
												<option>Snapping</option>
											  </select>
											</div>								
										</div>
										<div class="col-md-6">
											<div class="mb-3">
											  <label for="inputStageOfCase" class="form-label">Stage of Case</label>
											  <select class="form-select" name="inputStageOfCase" id="inputStageOfCase">
												<option selected disabled>Choose...</option>
												<option>Closed</option>
												<option>On-Trial</option>
												<option>Pending</option>
											  </select>
											</div>								
										</div>
										<div class="col-md-6">
											<br><br>
																						
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="high" id="high" value="high" checked>
												<label class="form-check-label" for="high">High</label>
											  </div>
											  <div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="high" id="medium" value="medium">
												<label class="form-check-label" for="medium">Medium</label>
											  </div>
											  <div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="high" id="low" value="low">
												<label class="form-check-label" for="low">low</label>
											  </div>
										</div>
										<div class="col-md-6">
											<label for="inputAct" class="form-label">Act</label>
											<input type="text" class="form-control" id="inputAct">
										</div>
										<div class="col-md-3">
											<label for="inputFilingNumber" class="form-label">Filing Number</label>
											<input type="text" class="form-control" id="inputFilingNumber">
										</div>
										<div class="col-md-3">
											<label for="inputFilingDate" class="form-label">Filing Date</label>
											<input type="date" class="form-control" id="inputFilingDate">
										</div>
										<div class="col-md-6">
											<label for="inputFirstHiringDate" class="form-label">First Hiring Date</label>
											<input type="date" class="form-control" id="inputFirstHiringDate">
										</div>
										<div class="col-md-6">
											<label for="inputCNR" class="form-label">CNR Number</label>
											<input type="text" class="form-control" id="inputCNR" name="inputCNR">
										</div>
										<div class="col-12">
											<label for="inputDescription" class="form-label">Description</label>
											<textarea class="form-control" id="inputDescription" placeholder="Description..." rows="3"></textarea>
										</div>
										
									</div>


									<!-- FIR Detail -->

									<div class="row my-5"><hr>
										<h3 class="text-center">FIR Detail</h2>

										<div class="col-md-12">
											<label for="inputPoliceStation" class="form-label">Police Station</label>
											<input type="text" class="form-control" id="inputPoliceStation">
										</div>
										<div class="col-md-6">
											<label for="inputFIRNumber" class="form-label">FIR Number</label>
											<input type="text" class="form-control" id="inputFIRNumber">
										</div>
										<div class="col-md-6">
											<label for="inputFIRDate" class="form-label">FIR Date</label>
											<input type="date" class="form-control" id="inputFIRDate">
										</div>
										
									</div>



									<!-- Court Detail Section -->

									<div class="row my-5"><hr>
										<h3 class="text-center">Court Detail</h2>

										<div class="col-md-6">
											<label for="inputCourtNumber" class="form-label">Court No</label>
											<input type="text" class="form-control" id="inputCourtNumber">
										</div>
										<div class="col-md-6">
											<div class="mb-3">
											  <label for="inputCourtType" class="form-label">Court Type</label>
											  <select class="form-select" name="inputCourtType" id="inputCourtType">
												<option selected disabled>Choose...</option>
												<option>Supereme Court</option>
												<option>High Court</option>
												<option>Session Court</option>
												<option>Labour Court</option>
											  </select>
											</div>										
										</div>
										<div class="col-md-6">
											<div class="mb-3">
											  <label for="inputCourtType" class="form-label">Court</label>
											  <select class="form-select" name="inputCourtType" id="inputCourtType">
												<option selected disabled>Choose...</option>
												<option>Lahore Branch</option>
												<option>Peshawar Branch</option>
												<option>Islamabad Branch</option>
											  </select>
											</div>										
										</div>
										<div class="col-md-6">
											<label for="inputJudgeName" class="form-label">Judge Name</label>
											<input type="text" class="form-control" id="inputJudgeName">
										</div>
										<div class="col-12">
											<label for="inputRemarks" class="form-label">Remarks</label>
											<textarea class="form-control" id="inputRemarks" placeholder="Remarks..." rows="3"></textarea>
										</div>
									</div>

									<!-- Task Assign Section -->

									<div class="row my-5"><hr>
										<h3 class="text-center">Task Assign</h2>

										<div class="col-md-4">
											<div class="mb-3">
											  <label for="inputUser" class="form-label">User</label>
											  <select class="form-select" name="inputUser" id="inputUser">
												<option selected disabled>Choose...</option>
												<option>Arslan Naeem</option>
												<option>Mr Tahir</option>
												<option>Hanzla Rahman</option>
											  </select>
											</div>										
										</div>
										<div class="col-md-8">
											<label for="inputWork" class="form-label">Work</label>
											<input type="text" class="form-control" id="inputWork">
										</div>
									</div>
									<div class="col-12 d-flex justify-content-end">
										<button type="submit" name="submit" class="btn btn-primary px-5">Save</button>
										<a href="cases.php" class="btn btn-secondary px-5 ms-2">Back</a>
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
		
			$('.respondent').hide();
			$('[name = "optradio"]').on('change', function(){
				var val = $(this).val();
				if(val == "respondent"){
					$('.respondent').show();
					$('.petitioner').hide();
				} else {
					$('.respondent').hide();
					$('.petitioner').show();
					
				}
			});

		
		</script>