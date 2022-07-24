<?php include('includes/header.php'); ?>

<?php 
// Assign Button Clicked
if(isset($_REQUEST['assign'])){
	$lawyerId = $_SESSION['lawyer_id'];
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
	// Insert Data
	$sql = "INSERT INTO task (task_subject , task_start_date, task_deadline, task_status, task_priority, task_assign_to, client_name, task_description, lawyer_id) VALUES('$taskSubject', '$taskStartDate', '$taskDeadline', '$taskStatus', '$taskPriority', '$taskAssignTo', '$clientName', '$taskDescription', '$lawyerId')";
	$result = mysqli_query($conn, $sql);
	if($result){
		$msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
		<strong>Congrats!</strong> Task has been assigned successfully.
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
									<h5 class="mb-0 text-dark">Add New Task</h5>
								</div>
								<hr>


								<?php if(isset($msg)) echo $msg; ?>

								<form class="row g-3">
									<div class="col-md-12">
										<label for="taskSubject" class="form-label">Subject <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="taskSubject" id="taskSubject">
									</div>
									<div class="col-md-6">
										<label for="taskStartDate" class="form-label">Start Date <span class="text-danger">*</span></label>
										<input type="date" class="form-control" name="taskStartDate" id="taskStartDate" value="">
									</div>
									<div class="col-md-6">
										<label for="taskDeadline" class="form-label">Deadline <span class="text-danger">*</span></label>
										<input type="date" class="form-control" name="taskDeadline" id="taskDeadline">
									</div>

                                    <div class="col-md-6">
                                        <label for="taskStatus" class="form-label">Status <span class="text-danger">*</span></label>
                                        <select class="form-select" name="taskStatus" id="taskStatus" aria-label="Default select example">
                                            <option value="" selected>Select Status</option>
                                            <option value="0">In Progress</option>
                                            <option value="1">Completed</option>
                                            <option value="-1">Deffered</option>
                                        </select>
                                    </div>
									
                                    <div class="col-md-6">
                                        <label for="taskPriority" class="form-label">Priority <span class="text-danger">*</span></label>
                                        <select class="form-select" name="taskPriority" id="taskPriority" aria-label="Default select example">
                                            <option value="" selected>Select Priority</option>
                                            <option value="low">Low</option>
                                            <option value="medium">Medium</option>
                                            <option value="high">High</option>
                                            <option value="urgent">Urgent</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="taskAssignTo" class="form-label">Assign To <span class="text-danger">*</span></label>
                                        <select class="form-select" name="taskAssignTo" id="taskAssignTo" aria-label="Default select example">
                                            <option value="" selected></option>
                                            <option value="arslan">Arslan Naeem</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="clientName" class="form-label">Client Name <span class="text-danger">*</span></label>
                                        <select class="form-select" name="clientName" id="clientName" aria-label="Default select example">
                                            <option value="" selected></option>
                                            <option value="Rana Kamran">Rana Kamran</option>
                                        </select>
                                    </div>
									<div class="col-12">
										<label for="inputDescription" class="form-label">Description <span class="text-danger">*</span></label>
										<textarea class="form-control" name="taskDescription" id="inputDescription" placeholder="Enter Detail/Description..." rows="3"></textarea>
									</div>
								
									<div class="col-12">
										<button type="submit" name="assign" class="btn btn-outline-dark px-5">Assign</button>
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