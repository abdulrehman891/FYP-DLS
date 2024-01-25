<?php 
include('includes/connection.php'); 


if (!isset($_SESSION['lawyer_email'])) {
    header('Location:lawyerLogin.php');
} 
include('includes/header.php'); ?>


<?php
// addCient Clicked
if(isset($_REQUEST['update'])){

	$clientId = $_REQUEST['clientId'];
	$lawyerId = $_SESSION['lawyer_id'];

	$clientName = $_REQUEST['clientName'];
	$clientCnic = $_REQUEST['clientCnic'];
	$clientGender = $_REQUEST['clientGender'];
	$clientEmail = $_REQUEST['clientEmail'];
	// $clientPassword = $_REQUEST['clientPassword'];
	$clientMobile = $_REQUEST['clientMobile'];
	$clientAddress = $_REQUEST['clientAddress'];
	$clientCity = $_REQUEST['clientCity'];
	$clientState = $_REQUEST['clientState'];
	$clientDescription = $_REQUEST['clientDescription'];
	$clientReferenceName = $_REQUEST['clientReferenceName'];
	$clientReferenceNo = $_REQUEST['clientReferenceNo'];

	// Update data
	$sql = "UPDATE client  SET client_name = '$clientName',client_cnic = '$clientCnic', client_gender= '$clientGender', client_email = '$clientEmail', client_mobile = '$clientMobile', client_address = '$clientAddress', client_city = '$clientCity', client_state = '$clientState',client_description= '$clientDescription', client_reference_name = '$clientReferenceName' , client_reference_no = '$clientReferenceNo' WHERE client_id = '$clientId' AND lawyer_id = '$lawyerId' ";

	if(mysqli_query($conn, $sql)){
		$msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
			<strong>Okaay!</strong> Changes Saved!.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		  </div>';	
		  
		} else {
		$msg = '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
			<strong>Sorry!</strong> System is busy!.
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
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Add New Client</h5>
                        </div>
                        <hr>


                        <?php if(isset($msg)) echo $msg; ?>

                        <?php 
								
								
								$clientId = $_REQUEST['clientId'];
								$sql = "SELECT * FROM client WHERE client_id = '$clientId'";
								$result = mysqli_query($conn, $sql);
								$row = mysqli_fetch_assoc($result);
								?>
                        <form class="row g-3">
						<input type="hidden" name="clientId" value="<?php echo $row['client_id'] ?>">
                            <div class="col-md-4">
                                <label for="clientName" class="form-label">Full Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="clientName" id="clientName"
                                    value="<?php echo $row['client_name'] ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="clientCnic" class="form-label">Cnic <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="clientCnic" id="clientCnic" value="<?php echo $row['client_cnic'] ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="clientGender" class="form-label">Gender <span
                                        class="text-danger">*</span></label>
                                <select id="clientGender" name="clientGender" class="form-select">
                                    <option selected>Choose...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>

                                </select>
                            </div>
                            <!-- <div class="col-md-4">
										<label for="clientGender">Gender <span class="text-danger">*</span></label><br>

										<input type="radio" name="clientGender" id="genderM" value="Male" checked="" required/> &nbsp;&nbsp;Male:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
										<input type="radio" name="clientGender" id="genderF" value="Female"/>&nbsp;&nbsp;Female
									</div> -->
                            <div class="col-md-4">
                                <label for="clientMobile" class="form-label">Mobile No. <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="clientMobile" id="clientMobile" value="<?php echo $row['client_mobile'] ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="clientReferenceName" class="form-label">Reference Name</label>
                                <input type="text" class="form-control" name="clientReferenceName"
                                    id="clientReferenceName" value="<?php echo $row['client_reference_name'] ?>">
                            </div>

                            <div class="col-md-4">
                                <label for="clientReferenceNo" class="form-label">Reference No</label>
                                <input type="text" class="form-control" name="clientReferenceNo" id="clientReferenceNo" value="<?php echo $row['client_reference_no'] ?>">
                            </div>

                            <div class="col-md-4">
                                <label for="clientEmail" class="form-label">Email <span
                                        class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="clientEmail" id="clientEmail" value="<?php echo $row['client_email'] ?>" readonly>
                            </div>

                            <!-- <div class="col-md-6">
                                <label for="clientPassword" class="form-label">Password <span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="clientPassword" id="clientPassword">
                            </div> -->
                            <div class="col-md-4">
                                <label for="clientState" class="form-label">State <span
                                        class="text-danger">*</span></label>
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

                            <div class="col-md-4">
                                <label for="clientCity" class="form-label">District<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="clientCity" id="clientCity" value="<?php echo $row['client_city'] ?>">
                            </div>
                            <div class="col-12">
                                <label for="clientAddress" class="form-label">Address <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" name="clientAddress" id="inputAddress"
                                    placeholder="Address..." rows="3"><?php echo $row['client_address'] ?></textarea>
                            </div>


							<div class="col-12">
                                <label for="clientDescription" class="form-label">Description <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" name="clientDescription" id="inputDescription"
                                    placeholder="Description..." rows="3"><?php echo $row['client_description'] ?></textarea>
                            </div>


                            <div class="col-12">
							<button type="submit" name="update" class="btn btn-primary px-5">Save Changes</button>
										<a href="<?php echo 'javascript:history.go(-1)' ?>" class="btn btn-secondary px-5">Back</a>
									</div>
                            </div>
                        </form>
                        <!-- <form class="row g-3">
									<div class="col-md-12">
										<label for="clientName" class="form-label">Full Name <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="clientName" id="clientName" value="<?php echo $row['client_name'] ?>">
									</div>
						
									<div class="col-md-4">
										<label for="clientGender">Gender <span class="text-danger">*</span></label><br>

										<input type="radio" name="clientGender" id="genderM" value="Male" checked="" required/> &nbsp;&nbsp;Male:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
										<input type="radio" name="clientGender" id="genderF" value="Female"/>&nbsp;&nbsp;Female
									</div>

									<div class="col-md-5">
										<label for="clientEmail" class="form-label">Email <span class="text-danger">*</span></label>
										<input type="email" class="form-control" name="clientEmail" id="clientEmail" value="<?php echo $row['client_email'] ?>">
									</div>

									<div class="col-md-3">
										<label for="clientMobile" class="form-label">Mobile No. <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="clientMobile" id="clientMobile" value="<?php echo $row['client_mobile'] ?>">
									</div>

									<div class="col-12">
										<label for="clientAddress" class="form-label">Address <span class="text-danger">*</span></label>
										<textarea class="form-control" name="clientAddress"  id="inputAddress" placeholder="Address..." rows="3"><?php echo $row['client_address'] ?></textarea>
									</div>

									<div class="col-md-6">
										<label for="clientCity" class="form-label">City <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="clientCity" value="<?php echo $row['client_city'] ?>" id="clientCity">
									</div>

									<div class="col-md-6">
										<label for="clientState" class="form-label">State <span class="text-danger">*</span></label>
										<select id="clientState" name="clientState" class="form-select">
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
										<label for="clientReferenceName" class="form-label">Reference Name</label>
										<input type="text" class="form-control" name="clientReferenceName" id="clientReferenceName">
									</div>

									<div class="col-md-6">
										<label for="clientReferenceNo" class="form-label">Reference No</label>
										<input type="text" class="form-control" name="clientReferenceNo" id="clientReferenceNo">
									</div>

									<input type="hidden" name="clientId" value="<?php echo $row['client_id'] ?>">

									<div class="col-12">
										<button type="submit" name="update" class="btn btn-primary px-5">Save Changes</button>
										<a href="<?php echo 'javascript:history.go(-1)' ?>" class="btn btn-secondary px-5">Back</a>
									</div>
								</form> -->
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</div>
<!--end page wrapper -->





<?php include('includes/footer.php'); ?>