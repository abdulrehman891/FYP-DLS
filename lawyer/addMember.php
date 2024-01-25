<?php include('includes/connection.php'); 
if (!isset($_SESSION['lawyer_email'])) {
    header('Location:lawyerLogin.php');
} 
 include('includes/header.php'); ?>



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

                        <form class="row g-3" id="data">
                            <div class="col-md-6">
                                <label for="memberName" class="form-label">Full Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="memberName" name="memberName">
                            </div>

                            <div class="col-md-6">
                                <label for="inputProvince" class="form-label">Province</label>
                                <select id="inputProvince" name="province" class="form-select  province">
                                    <option value="">Select Province</option>
                                    <?php

									$sql1="SELECT * FROM province";
									$run1=mysqli_query($conn,$sql1);
									while ($fet=mysqli_fetch_array($run1)) {
										?>
                                    <option value="<?php echo $fet{'pro_id'};  ?>"> <?php echo $fet{'province'};  ?>
                                    </option>
									<?php
										}
										?>


                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputdistrict" class="form-label">District</label>
                                <select id="inputdistrict" name="district" class="form-select district">

                                    <option value=""> Select District</option>

                                </select>
                            </div>




                            <div class="col-md-6">
                                <label for="memberRole" class="form-label">Role <span
                                        class="text-danger">*</span></label>
                                <select id="memberRole" name="memberRole" class="form-select">
                                    <option value="None" selected>Choose Role</option>



                                    <?php
											 $lawyer_key = $_SESSION['lawyer_id'];
											 if ($_SESSION['user'] == 'USER') {
																			 
											 
											 $sql1 = "SELECT * FROM `lawyer_user_access` WHERE `user_access_id`= '$lawyer_key'";
											   $result1 = mysqli_query($conn, $sql1);
											   $row = mysqli_fetch_assoc($result1);
											   $lawyer_key=$row['lawer_key'];
											   
											 }
											$sql = "SELECT * FROM `role` WHERE lawyer_id = '$lawyer_key'";
											$result = mysqli_query($conn, $sql);
											while($row = mysqli_fetch_assoc($result)){
											?>

                                    <option value="<?php echo $row['role_name'] ?>"><?php echo $row['role_name'] ?>
                                    </option>

                                    <?php } ?>

                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="memberMobileNo" class="form-label">Mobile No. <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="memberMobileNo" name="memberMobileNo">
                            </div>

                            <div class="col-md-6">
                                <label for="memberEmail" class="form-label">Email <span
                                        class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="memberEmail" name="memberEmail">
                            </div>




                            <div class="col-12">
                                <label for="memberAddress" class="form-label">Address <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" name="memberAddress" id="memberAddress"
                                    placeholder="Address..." rows="3"></textarea>
                            </div>





                            <div class="col-12">
                                <button type="submit" id="insert" name="save" class="btn btn-outline-dark px-5">Save</button>
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

<script>


// //////INSERT///////////

$(document).ready(function() {
    $("#insert").on("click", function(g) {
        g.preventDefault();
        var formdata = new FormData(data);
      
        $.ajax({
            url: "./ajax/add_member.php",
            method: "POST",
            contentType: false,
            processData: false,
            data: formdata,
            success: function(res) {
                // alert(res);
				if (res == 1) {
                    Swal.fire({
                        toast: true,
                            icon: 'warning',
                            title: 'Please fill all fields!',
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
                else if (res == 2) {
                    Swal.fire({
                        toast: true,
                            icon: 'warning',
                            title: 'Account has already registered!',
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
					else if (res == 3) {
                    Swal.fire({
                        toast: true,
                            icon: 'success',
                            title: 'Member has been added',
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
                    // window.location.href = "./addClient.php";
                } else if (res == 4) {
                    Swal.fire({
                        toast: true,
                            icon: 'success',
                            title: 'Member has not been added',
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












$('.province').on("change", function() {
    var value = $(this).val();
    $.ajax({
        url: "./ajax/dropdown_tehsil.php",
        method: "POST",
        data: {
            d_id: value
        },
        success: function(res) {

            $('.district').html(res);
        }
    })

})
</script>