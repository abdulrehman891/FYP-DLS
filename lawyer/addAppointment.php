<?php

include('includes/connection.php'); 
include('includes/header.php'); 
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

								

								<form id="data" class="row g-3">
									
									<div class="col-md-6" id="clientName">
										<label for="clientName" class="form-label">Client Name <span class="text-danger">*</span></label>
										<select name="clientName" id="clientName" class="form-select">
											<option value="" selected>Select Client</option>

											<?php
											 $lawyer_key = $_SESSION['lawyer_id'];
                                             if ($_SESSION['user'] == 'USER') {
                                                                             
                                             
                                             $sql1 = "SELECT * FROM `lawyer_user_access` WHERE `user_access_id`= '$lawyer_key'";
                                               $result1 = mysqli_query($conn, $sql1);
                                               $row = mysqli_fetch_assoc($result1);
                                               $lawyer_key=$row['lawer_key'];
                                               
                                             }
											 
											$sql = "SELECT * FROM client WHERE lawyer_id = '$lawyer_key'";
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
										<button type="submit" id="insert" name="save" class="btn btn-outline-dark px-5">Save</button>
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


// //////INSERT///////////


  $(document).ready(function(){
    $("#insert").on("click", function(g) {
    
    g.preventDefault();
    var formdata = new FormData(data);
    

    $.ajax({
        url: "./ajax/add_appointment.php",
        method: "POST",
        contentType: false,
        processData: false,
        data: formdata,
        success: function(res) {
        

        
        if (res == 1) {
                    Swal.fire({
                        toast: true,
                        icon: 'warning',
                        title: 'Please fill all fields',
                        animation: false,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal
                                .stopTimer)
                            toast.addEventListener('mouseleave', Swal
                                .resumeTimer)

                        }
                    })
                } else if (res == 2) {
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: 'Appointment has been added',
                        animation: false,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal
                                .stopTimer)
                            toast.addEventListener('mouseleave', Swal
                                .resumeTimer)

                        }
                    })
                    $('form').trigger("reset");
                    // window.location.href = "./case_sub_category.php";
                } else if (res == 3) {
                    Swal.fire({
                        toast: true,
                        icon: 'warning',
                        title: 'Appointment has not been added',
                        animation: false,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal
                                .stopTimer)
                            toast.addEventListener('mouseleave', Swal
                                .resumeTimer)

                        }
                    })
                } else {
                    Swal.fire({
                        toast: true,
                        icon: 'warning',
                        title: 'System error',
                        animation: false,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal
                                .stopTimer)
                            toast.addEventListener('mouseleave', Swal
                                .resumeTimer)

                        }
                    })
                }

           
        }

    })
})
  });







</script>








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