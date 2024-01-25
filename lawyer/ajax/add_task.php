<?php
include('../includes/connection.php');

 $lawyer_key = $_SESSION['lawyer_id'];
if ($_SESSION['user'] == 'USER') {
                                

 $sql1 = "SELECT * FROM `lawyer_user_access` WHERE `user_access_id`= '$lawyer_key'";
  $result1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_assoc($result1);
  $lawyer_key=$row1['lawer_key'];
  
}
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
	// Insert Data
	$sql = "INSERT INTO `task` (`task_subject` , `task_start_date`, `task_deadline`, `task_status`, `task_priority`, `task_assign_to`, `client_name`, `task_description`, `lawyer_id`) VALUES('$taskSubject', '$taskStartDate', '$taskDeadline', '$taskStatus', '$taskPriority', '$taskAssignTo', '$clientName', '$taskDescription', '$lawyer_key')";
	$result = mysqli_query($conn, $sql);
	if($result){
		echo 2;

	}
    else {
        echo 3;
    }
		
	}

?>