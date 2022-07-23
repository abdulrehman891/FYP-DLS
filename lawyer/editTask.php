<?php include('includes/header.php'); ?>

<?php 
// Update Button Clicked
if(isset($_REQUEST['update'])){
	$lawyerId = $_SESSION['lawyer_id'];
	$taskId = $_REQUEST['taskId'];
	$taskSubject = $_REQUEST['taskSubject'];
	$taskStartDate = $_REQUEST['taskStartDate'];
	$taskDeadline = $_REQUEST['taskDeadline'];
	$taskStatus = $_REQUEST['taskStatus'];
	$taskPriority = $_REQUEST['taskPriority'];
	$taskAssignTo = $_REQUEST['taskAssignTo'];
	$clientName = $_REQUEST['clientName'];
	$taskDescription = $_REQUEST['taskDescription'];

	// Checking Empty Fields 
	if($taskSubject == "" || $taskStartDate == "" || $taskDeadline == "" || $taskStatus == "" || $taskPriority == "" || $taskAssignTo == "" || $clientName == "" || $taskDescription == ""){
		$msg = '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
		<strong>Please!</strong> Fill all fields.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>';
	}
	
	else{
	// Update Data
	$sql = "UPDATE task SET task_subject = '$taskSubject' , task_start_date = '$taskStartDate', task_deadline = '$taskDeadline', task_status = '$taskStatus', task_priority = '$taskPriority', task_assign_to = '$taskAssignTo', client_name = '$clientName', task_description = '$taskDescription', lawyer_id = '$lawyerId' WHERE task_id = '$taskId' ";
	$result = mysqli_query($conn, $sql);
	if($result){
		$msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
		<strong>Update!</strong> Task has been Updated successfully.
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
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<h5 class="mb-0 text-primary">Update Task</h5>
								</div>
								<hr>


								<?php if(isset($msg)) echo $msg; ?>



								<?php
									$taskId = $_REQUEST['taskId'];
							
									$sql = "SELECT * FROM task WHERE task_id = '$taskId'";
									$result = mysqli_query($conn, $sql);
									$row = mysqli_fetch_assoc($result);
								
								?>

								<form class="row g-3">
									<div class="col-md-12">
										<label for="taskSubject" class="form-label">Subject <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="taskSubject" id="taskSubject" value="<?php echo $row['task_subject']?>">
									</div>
									<div class="col-md-6">
										<label for="taskStartDate" class="form-label">Start Date <span class="text-danger">*</span></label>
										<input type="date" class="form-control" name="taskStartDate" id="taskStartDate" value="<?php echo $row['task_start_date']?>">
									</div>
									<div class="col-md-6">
										<label for="taskDeadline" class="form-label">Deadline <span class="text-danger">*</span></label>
										<input type="date" class="form-control" name="taskDeadline" id="taskDeadline" value="<?php echo $row['task_deadline']?>">
									</div>

                                    <div class="col-md-6">
                                        <label for="taskStatus" class="form-label">Status <span class="text-danger">*</span></label>
                                        <select class="form-select" name="taskStatus" id="taskStatus" value="<?php echo $row['task_status']?>" aria-label="Default select example">
                                            <option value="" selected>Select Status</option>
                                            <option value="0">In Progress</option>
                                            <option value="1">Completed</option>
                                            <option value="-1">Deffered</option>
                                        </select>
                                    </div>
									
                                    <div class="col-md-6">
                                        <label for="taskPriority" class="form-label">Priority <span class="text-danger">*</span></label>
                                        <select class="form-select" name="taskPriority" id="taskPriority" value="<?php echo $row['task_priority']?>" aria-label="Default select example">
                                            <option value="" selected>Select Priority</option>
                                            <option value="low">Low</option>
                                            <option value="medium">Medium</option>
                                            <option value="high">High</option>
                                            <option value="urgent">Urgent</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="taskAssignTo" class="form-label">Assign To <span class="text-danger">*</span></label>
                                        <select class="form-select" name="taskAssignTo" id="taskAssignTo" value="<?php echo $row['task_assign_to']?>" aria-label="Default select example">
                                            <option value="" selected></option>
                                            <option value="arslan">Arslan Naeem</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="clientName" class="form-label">Client Name <span class="text-danger">*</span></label>
                                        <select class="form-select" name="clientName" id="clientName" value="<?php echo $row['client_name']?>" aria-label="Default select example">
                                            <option value="" selected></option>
                                            <option value="Rana Kamran">Rana Kamran</option>
                                        </select>
                                    </div>
									<div class="col-12">
										<label for="taskDescription" class="form-label">Description <span class="text-danger">*</span></label>
										<textarea class="form-control" name="taskDescription"  id="taskDescription" placeholder="Enter Detail/Description..." rows="3"><?php echo $row['task_description']?></textarea>
									</div>
								
									<div class="col-12">
										<input type="hidden" name="taskId" value="<?php echo $row['task_id'] ?>">
										<button type="submit" name="update" class="btn btn-primary px-5">Update</button>
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