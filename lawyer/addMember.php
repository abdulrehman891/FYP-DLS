<?php include('includes/header.php'); ?>


<?php 
// Save button Clicked
if(isset($_REQUEST['save'])){
	$lawyerId = $_SESSION['lawyer_id'];
	$memberName = $_REQUEST['memberName'];
	$memberCity = $_REQUEST['memberCity'];
	$memberState = $_REQUEST['memberState'];
	$memberRole = $_REQUEST['memberRole'];
	$memberMobileNo = $_REQUEST['memberMobileNo'];
	$memberEmail = $_REQUEST['memberEmail'];
	$memberPassword = $_REQUEST['memberPassword'];
	$memberAddress = $_REQUEST['memberAddress'];
	$memberImage = $_FILES['memberImage']['name'];


	// Checking Empty Fields
	if($memberName == "" || $memberCity == "" || $memberState == "" || $memberRole == "" || $memberMobileNo == "" || $memberEmail == "" ||  $memberPassword == "" || $memberAddress == "" ||  $memberImage == ""){
		$msg = '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
		<strong>Please!</strong> Fill All Fields.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>';
	}


	elseif(mysqli_num_rows(mysqli_query($conn, $sql = "SELECT * FROM member WHERE member_email = '$memberEmail'")) == 1){
		$msg = '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
		<strong>Sorry!</strong> This member already registered with this email.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>';	
		
	}

	else {
		// Insert data
		$sql = "INSERT INTO member(lawyer_id , member_name , member_city, member_state, member_role, member_mobile_no, member_email, member_password, member_address, member_image) VALUES ('$lawyerId', '$memberName', '$memberCity', '$memberState', '$memberRole', '$memberMobileNo', '$memberEmail', '$memberPassword', '$memberAddress', '$memberImage')";

		$result = mysqli_query($conn, $sql);
		if($result){
			move_uploaded_file($_FILES['memberImage']['tmp_name'] , 'assets/images/members/' . $memberImage);
			$msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
			<strong>Congrats!</strong> New Member has been added.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		  </div>';
		}else{
			$msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Congrats!</strong> New Member has been added.
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
									<div>
                                        <!-- <i class="bx bxs-user me-1 font-22 text-primary"></i>
                                     -->
									</div>
									<h5 class="mb-0 text-dark">Add New Member</h5>
								</div>
								<hr>



								<?php if(isset($msg)) echo $msg; ?>


								
								<form class="row g-3" method="POST" enctype="multipart/form-data">
									<div class="col-md-6">
										<label for="memberName" class="form-label">Full Name <span class="text-danger">*</span></label>
										<input type="text" class="form-control" id="memberName" name="memberName">
									</div>

									<div class="col-md-6">
										<label for="memberCity" class="form-label">City <span class="text-danger">*</span></label>
										<input type="text" class="form-control" id="memberCity" name="memberCity">
									</div>

									<div class="col-md-6">
										<label for="memberState" class="form-label">State <span class="text-danger">*</span></label>
										<select id="memberState" name="memberState" class="form-select">
											<option value="None" selected>Choose State</option>
											<option value="Punjab">Punjab</option>
											<option value="Sindh">Sindh</option>
											<option value="Balochistan">Balochistan</option>
											<option value="KPK">KPK</option>
											<option value="Fedral Area">Fedral Area</option>
										</select>
									</div>

									<div class="col-md-6">
										<label for="memberRole" class="form-label">Role <span class="text-danger">*</span></label>
										<select id="memberRole" name="memberRole" class="form-select">
											<option value="None" selected>Choose Role</option>



											<?php
											$lawyerId = $_SESSION['lawyer_id'];
											$sql = "SELECT * FROM role WHERE lawyer_id = '$lawyerId'";
											$result = mysqli_query($conn, $sql);
											while($row = mysqli_fetch_assoc($result)){
											?>

											<option value="<?php echo $row['role_name'] ?>"><?php echo $row['role_name'] ?></option>

											<?php } ?>

										</select>
									</div>

									<div class="col-md-3">
										<label for="memberMobileNo" class="form-label">Mobile No. <span class="text-danger">*</span></label>
										<input type="text" class="form-control" id="memberMobileNo" name="memberMobileNo">
									</div>

									<div class="col-md-5">
										<label for="memberEmail" class="form-label">Email <span class="text-danger">*</span></label>
										<input type="email" class="form-control" id="memberEmail" name="memberEmail">
									</div>

									<div class="col-md-4">
										<label for="memberPassword" class="form-label">Password <span class="text-danger">*</span></label>
										<input type="password" class="form-control" id="memberPassword" value="12345678" name="memberPassword">
									</div>
									

									<div class="col-12">
										<label for="memberAddress" class="form-label">Address <span class="text-danger">*</span></label>
										<textarea class="form-control" name="memberAddress" id="memberAddress" placeholder="Address..." rows="3"></textarea>
									</div>




									<div class="col-md-12">
										<label for="memberImage" class="form-label">Upload Image</label>
										<input class="form-control" type="file" id="memberImage" name="memberImage" onchange="preview()">
										<img id="frame" src="" class="rounded img-fluid" />
									</div>
									<div class="col-12">
										<button type="submit" name="save" class="btn btn-outline-dark px-5">Save</button>
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

