<?php 

include('includes/connection.php');

if (!isset($_SESSION['lawyer_email'])) {
    header('Location:lawyerLogin.php');
} 

include('includes/header.php');
 ?>

<?php 
// Update Button Clicked
// if(isset($_REQUEST['update'])){
// 	$lawyerId = $_SESSION['lawyer_id'];
// 	$taskId = $_REQUEST['taskId'];
// 	$taskSubject = $_REQUEST['taskSubject'];
// 	$taskStartDate = $_REQUEST['taskStartDate'];
// 	$taskDeadline = $_REQUEST['taskDeadline'];
// 	$taskStatus = $_REQUEST['taskStatus'];
// 	$taskPriority = $_REQUEST['taskPriority'];
// 	$taskAssignTo = $_REQUEST['taskAssignTo'];
// 	$clientName = $_REQUEST['clientName'];
// 	$taskDescription = $_REQUEST['taskDescription'];

// 	// Checking Empty Fields 
// 	if($taskSubject == "" || $taskStartDate == "" || $taskDeadline == "" || $taskStatus == "" || $taskPriority == "" || $taskAssignTo == "" || $clientName == "" || $taskDescription == ""){
// 		$msg = '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
// 		<strong>Please!</strong> Fill all fields.
// 		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
// 	  </div>';
// 	}
	
// 	else{
// 	// Update Data
// 	$sql = "UPDATE task SET task_subject = '$taskSubject' , task_start_date = '$taskStartDate', task_deadline = '$taskDeadline', task_status = '$taskStatus', task_priority = '$taskPriority', task_assign_to = '$taskAssignTo', client_name = '$clientName', task_description = '$taskDescription', lawyer_id = '$lawyerId' WHERE task_id = '$taskId' ";
// 	$result = mysqli_query($conn, $sql);
// 	if($result){
// 		$msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
// 		<strong>Update!</strong> Task has been Updated successfully.
// 		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
// 	  </div>';

// 	}
		
// 	}
// }
?>



<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0 text-primary">Update Task</h5>
                        </div>
                        <hr>


                        <?php 
								
								// if(isset($msg)) echo $msg; 
								?>



                        <?php
									// $taskId = $_REQUEST['taskId'];
									$id = $_GET['upid'];

										$lawyer_key = $_SESSION['lawyer_id'];
										if ($_SESSION['user'] == 'USER') {
																		

										$sql1 = "SELECT * FROM `lawyer_user_access` WHERE `user_access_id`= '$lawyer_key'";
										$result1 = mysqli_query($conn, $sql1);
										$row = mysqli_fetch_assoc($result1);
										$lawyer_key=$row['lawer_key'];
										}
							
									$sql = "SELECT * FROM task WHERE `lawyer_id`='$lawyer_key' and task_id = '$id'";
									$result1 = mysqli_query($conn, $sql);
									$row1 = mysqli_fetch_assoc($result1);
								
								?>

                        <form class="row g-3" id="data">
						<input type="hidden" class="form-control" name="taskid" id="taskSubject"
                                    value="<?php echo $row1['task_id']?>">
                            <div class="col-md-12">
                                <label for="taskSubject" class="form-label">Subject <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="taskSubject" id="taskSubject"
                                    value="<?php echo $row1['task_subject']?>">
                            </div>
                            <div class="col-md-6">
                                <label for="taskStartDate" class="form-label">Start Date <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="taskStartDate" id="taskStartDate"
                                    value="<?php echo $row1['task_start_date']?>">
                            </div>
                            <div class="col-md-6">
                                <label for="taskDeadline" class="form-label">Deadline <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="taskDeadline" id="taskDeadline"
                                    value="<?php echo $row1['task_deadline']?>">
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
                                <label for="taskDescription" class="form-label">Description <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" name="taskDescription" id="taskDescription"
                                    placeholder="Enter Detail/Description..." 
                                    rows="3"> <?php echo $row1['task_description'];?></textarea>
                            </div>

                            <div class="col-12">
                             
                                <button type="submit" id="upda" class="btn btn-primary px-5">Update</button>
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
// //////////UPDATE//////////////

$(document).ready(function() {
    $("#upda").on("click", function(g) {

        g.preventDefault();
        var formdata = new FormData(data);
alert(formdata);

        $.ajax({
            url: "./ajax/update_task.php",
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
                        title: 'Client has been Updated',
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
                        title: 'Client has not been Updated',
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
                        icon: 'error',
                        title: 'System error!',
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
        });




    })
});
</script>