<?php include('includes/header.php'); ?>

<?php
// Save button Clicked
if(isset($_REQUEST['save'])){
	$lawyerId = $_SESSION['lawyer_id'];
	$clientName = $_REQUEST['clientName'];
	$clientEmail = $_REQUEST['clientEmail'];
	$clientMobileNo = $_REQUEST['clientMobileNo'];
	$appointmentDate = $_REQUEST['appointmentDate'];
	$appointmentTime = $_REQUEST['appointmentTime'];
	$appointmentNote = $_REQUEST['appointmentNote'];

	// Checking Empty Fileds 
	if($clientName == "" || $clientEmail == "" || $clientMobileNo == "" || $appointmentDate == "" || $appointmentTime == "" || $appointmentNote == "" ){
		$msg = '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
		<strong>Please!</strong> Fill All Fields.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>';
	}
	
	// Inserting Data
	$sql = "INSERT INTO appointment(client_name, lawyer_id, client_email, client_mobile_no, appointment_date, appointment_time, appointment_note) VALUES ('$clientName', '$lawyerId', '$clientEmail', '$clientMobileNo', '$appointmentDate', '$appointmentTime', '$appointmentNote')";
	$result = mysqli_query($conn, $sql);
	if($result){
		$msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
		<strong>Success!</strong> Appointment Added Successfully.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>';

	}

}
?>



<!--start page wrapper -->
<div class="page-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-xl-9 mx-auto">
						<div class="card border-top border-0 border-4">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div>
                                        <!-- <i class="bx bxs-user me-1 font-22 text-primary"></i>
                                     -->
									</div>
									<h5 class="mb-0 text-dark">Add New Appointment</h5>
								</div>
								<hr>

								<?php
								if(isset($msg)) echo $msg;
								?>

								<form method="POST" class="row g-3">
									
									<div class="col-md-6" id="clientName">
										<label for="clientName" class="form-label">Client Name <span class="text-danger">*</span></label>
										<select name="clientName" id="clientName" class="form-select">
											<option value="" selected>Select Client</option>

											<?php
											$lawyerId = $_SESSION['lawyer_id'];
											$sql = "SELECT * FROM client WHERE lawyer_id = '$lawyerId'";
											$result = mysqli_query($conn, $sql);
											while($row = mysqli_fetch_assoc($result)){
											?>

											<option value="<?php echo $row['client_name'] ?>"><?php echo $row['client_name'] ?></option>
											

											<?php } ?>


										</select>
									</div>
									<div class="col-md-6">
										<label for="clientEmail" class="form-label">Client Email <span class="text-danger"> *</span></label>
										<input type="email" class="form-control" name="clientEmail" id="clientEmail">
									</div>
									<div class="col-md-6">
										<label for="clientMobileNo" class="form-label">Mobile No <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="clientMobileNo" id="clientMobileNo">
									</div>
									<div class="col-md-3">
										<label for="appointmentDate" class="form-label">Date <span class="text-danger">*</span></label>
										<input type="date" name="appointmentDate" class="form-control" id="appointmentDate">
									</div>
									<div class="col-md-3">
										<label for="appointmentTime" class="form-label">Time <span class="text-danger">*</span></label>
										<input type="time" name="appointmentTime" class="form-control" id="appointmentTime">
									</div>
									<div class="col-12">
										<label for="appointmentNote" class="form-label">Note</label>
										<textarea class="form-control" name="appointmentNote" id="appointmentNote" placeholder="Note..." rows="2"></textarea>
									</div>
									<div class="col-12">
										<button type="submit" name="save" class="btn btn-outline-dark px-5">Save</button>
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