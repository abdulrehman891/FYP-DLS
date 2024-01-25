<?php 
include('../includes/connection.php');
// Update Button Clicked
$lawyer_key = $_SESSION['lawyer_id'];
		if ($_SESSION['user'] == 'USER') {
																		

		$sql1 = "SELECT * FROM `lawyer_user_access` WHERE `user_access_id`= '$lawyer_key'";
	    $result1 = mysqli_query($conn, $sql1);
		$row = mysqli_fetch_assoc($result1);
		$lawyer_key=$row['lawer_key'];
	}

	// $lawyerId = $_SESSION['lawyer_id'];
	$taskId = $_POST['taskid'];
	$taskSubject = $_POST['taskSubject'];
	$taskStartDate = $_POST['taskStartDate'];
	$taskDeadline = $_POST['taskDeadline'];
	$taskStatus = $_POST['taskStatus'];
	$taskPriority = $_POST['taskPriority'];
	$taskAssignTo = $_POST['taskAssignTo'];
	$clientName = $_POST['clientName'];
	$taskDescription = $_POST['taskDescription'];

	// Checking Empty Fields 
	if($taskSubject == "" || $taskStartDate == "" || $taskDeadline == "" || $taskStatus == "" || $taskPriority == "" || $taskAssignTo == "" || $clientName == "" || $taskDescription == ""){
		echo 1;
	}
	
	else{
	// Update Data
	$sql = "UPDATE task SET task_subject = '$taskSubject' , task_start_date = '$taskStartDate', task_deadline = '$taskDeadline', task_status = '$taskStatus', task_priority = '$taskPriority', task_assign_to = '$taskAssignTo', client_name = '$clientName', task_description = '$taskDescription', lawyer_id = '$lawyer_key' WHERE task_id = '$taskId' ";
	$result = mysqli_query($conn, $sql);
	if($result){
		echo 2;

	}
    else {
        echo 3;
    }
		
	
}
?>
