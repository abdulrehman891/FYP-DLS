<?php include('includes/header.php'); ?>


<?php
// add Cient Clicked
if(isset($_REQUEST['addClient'])){
	$lawyerId = $_SESSION['lawyer_id'];
	$clientName = $_REQUEST['clientName'];
	$clientGender = $_REQUEST['clientGender'];
	$clientEmail = $_REQUEST['clientEmail'];
	$clientMobile = $_REQUEST['clientMobile'];
	$clientAddress = $_REQUEST['clientAddress'];
	$clientCity = $_REQUEST['clientCity'];
	$clientState = $_REQUEST['clientState'];
	$clientReferenceName = $_REQUEST['clientReferenceName'];
	$clientReferenceNo = $_REQUEST['clientReferenceNo'];

	// Checking Empty Fields
	if($clientName == "" || $clientGender == "" || $clientEmail == "" || $clientMobile == "" || $clientAddress == "" || $clientCity == "" || $clientState == ""){
		$msg = '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
		<strong>Please!</strong> Fill All Fields.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>';
	} else {
		// Insert Data
		$sql = "INSERT INTO client(lawyer_id , client_name , client_gender, client_email, client_mobile, client_address, client_city, client_state, client_reference_name, client_reference_no, is_assign) VALUES ('$lawyerId', '$clientName', '$clientGender', '$clientEmail', '$clientMobile', '$clientAddress', '$clientCity', '$clientState', '$clientReferenceName', '$clientReferenceNo', 1)";

		$result = mysqli_query($conn, $sql);
		if($result){
			$msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
		<strong>Congratulations!</strong> New Client Has been Added Successfully!.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>';			
		}
	}
}
?>


<!--start page wrapper -->
<div class="page-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-xl-9 mx-auto">
						<div class="card border-top border-0 border-4 border-dark">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-user me-1 font-22 text-dark"></i>
									</div>
									<h5 class="mb-0 text-dark">Add New Client</h5>
								</div>
								<hr>


								<?php if(isset($msg)) echo $msg; ?>

								<?php
								// $clientId = $_REQUEST['clientId'];
								// $sql = "SELECT * FROM client WHERE client_id = $clientId";
								// $result = mysqli_query($conn, $sql);
								// $row = mysqli_fetch_assoc($result);
								?> 

								<form class="row g-3">
									<div class="col-md-12">
										<label for="clientName" class="form-label">Full Name <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="clientName" id="clientName">
									</div>
						
									<div class="col-md-4">
										<label for="clientGender">Gender <span class="text-danger">*</span></label><br>

										<input type="radio" name="clientGender" id="genderM" value="Male" checked="" required/> &nbsp;&nbsp;Male:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
										<input type="radio" name="clientGender" id="genderF" value="Female"/>&nbsp;&nbsp;Female
									</div>

									<div class="col-md-5">
										<label for="clientEmail" class="form-label">Email <span class="text-danger">*</span></label>
										<input type="email" class="form-control" name="clientEmail" id="clientEmail" >
									</div>

									<div class="col-md-3">
										<label for="clientMobile" class="form-label">Mobile No. <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="clientMobile" id="clientMobile">
									</div>

									<div class="col-12">
										<label for="clientAddress" class="form-label">Address <span class="text-danger">*</span></label>
										<textarea class="form-control" name="clientAddress"  id="inputAddress" placeholder="Address..." rows="3"></textarea>
									</div>

									<div class="col-md-6">
										<label for="clientCity" class="form-label">City <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="clientCity" id="clientCity">
									</div>

									<div class="col-md-6">
										<label for="clientState" class="form-label">State <span class="text-danger">*</span></label>
										<select id="clientState" name="clientState" class="form-select">
											<option selected>Choose...</option>
											<option value="Punjab">Punjab</option>
											<option value="Sindh">Sindh</option>
											<option value="Balochistan">Balochistan</option>
											<option value="KPK">KPK</option>
											<option value="Fedral Area">Fedral Area</option>
											<option value="Azad Kashmir">Azad Kashmir</option>
										</select>
									</div>

									<div class="col-md-6">
										<label for="clientReferenceName" class="form-label">Reference Name</label>
										<input type="text" class="form-control" name="clientReferenceName" id="clientReferenceName">
									</div>

									<div class="col-md-6">
										<label for="clientReferenceNo" class="form-label">Reference No</label>
										<input type="text" class="form-control" name="clientReferenceNo" id="clientReferenceNo">
									</div>

									<div class="col-12">
										<button type="submit" name="addClient" class="btn btn-outline-dark px-5">Add Client</button>
										<a href="<?php echo 'javascript:history.go(-1)' ?>" class="btn btn-secondary px-5">Back</a>
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