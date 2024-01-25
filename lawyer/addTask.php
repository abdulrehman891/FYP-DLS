<?php 
include('includes/connection.php');
if (!isset($_SESSION['lawyer_email'])) {
    header('Location:lawyerLogin.php');
} 
include('includes/header.php');
 ?>



<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <div class="card border-top border-0 border-4 border-dark">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0 text-dark">Add New Task</h5>
                        </div>
                        <hr>
                        <form id="data" class="row g-3">
                            <div class="col-md-12">
                                <label for="taskSubject" class="form-label">Subject <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="taskSubject" id="taskSubject">
                            </div>
                            <div class="col-md-6">
                                <label for="taskStartDate" class="form-label">Start Date <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="taskStartDate" id="taskStartDate"
                                    value="">
                            </div>
                            <div class="col-md-6">
                                <label for="taskDeadline" class="form-label">Deadline <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="taskDeadline" id="taskDeadline">
                            </div>

                            <div class="col-md-6">
                                <label for="taskStatus" class="form-label">Status <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" name="taskStatus" id="taskStatus"
                                    aria-label="Default select example">
                                    <option value="" selected>Select Status</option>
                                    <option value="0">In Progress</option>
                                    <option value="1">Completed</option>
                                    <option value="-1">Deffered</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="taskPriority" class="form-label">Priority <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" name="taskPriority" id="taskPriority"
                                    aria-label="Default select example">
                                    <option value="" selected>Select Priority</option>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                    <option value="urgent">Urgent</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="taskAssignTo" class="form-label">Assign To <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" name="taskAssignTo" id="taskAssignTo"
                                    aria-label="Default select example">
                                    <option value="" selected> Select Member</option>
                                    <?php
									  $lawyer_key = $_SESSION['lawyer_id'];
									  if ($_SESSION['user'] == 'USER') {
																	  
									  
									  $sql1 = "SELECT * FROM `lawyer_user_access` WHERE `user_access_id`= '$lawyer_key'";
										$result1 = mysqli_query($conn, $sql1);
										$row = mysqli_fetch_assoc($result1);
										$lawyer_key=$row['lawer_key'];
										
									  }
		  
 $sql2 = "SELECT * FROM member WHERE `lawyer_id`='$lawyer_key'";
 $result2 = mysqli_query($conn, $sql2);

 while($row = mysqli_fetch_assoc($result2)){
	 ?>

                                    <option value="<?php  echo $row['member_name']; ?>">
                                        <?php  echo $row['member_name']; ?></option>
                                    <?php
 }
 ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="clientName" class="form-label">Client Name <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" name="clientName" id="clientName"
                                    aria-label="Default select example">
                                    <option value="" selected>Select Client</option>
                                    <?php

$sql2 = "SELECT * FROM client WHERE `lawyer_id`='$lawyer_key'";
$result2 = mysqli_query($conn, $sql2);

while($row = mysqli_fetch_assoc($result2)){
	?>

                                    <option value="<?php  echo $row['client_name']; ?>">
                                        <?php  echo $row['client_name']; ?></option>
                                    <?php
											}
											?>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="inputDescription" class="form-label">Description <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" name="taskDescription" id="inputDescription"
                                    placeholder="Enter Detail/Description..." rows="3"></textarea>
                            </div>

                            <div class="col-12">
                                <button type="submit" id="insert" class="btn btn-outline-dark  px-5">Assign</button>
                                <a href="tasks.php" class="btn btn-secondary px-5">Back</a>
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
$(document).ready(function() {
    $("#insert").on("click", function(g) {
        g.preventDefault();
        var formdata = new FormData(data);
        $.ajax({
            url: "./ajax/add_task.php",
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
                        title: 'Task has been assigned',
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
                        title: 'Task has not been assigned',
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
})
</script>