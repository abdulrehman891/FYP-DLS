<?php
include('../includes/connection.php');
$lawyer_key= $_SESSION['lawyer_id'];
$user="";
if ($_SESSION['user'] == 'USER') {
																			 
	$user=$lawyer_key;										 
	$sql1 = "SELECT * FROM `lawyer_user_access` WHERE `user_access_id`= '$lawyer_key'";
	  $result1 = mysqli_query($conn, $sql1);
	  $row = mysqli_fetch_assoc($result1);
	  $lawyer_key=$row['lawer_key'];
	  
	}
	// echo $lawyer_key;
	// echo $lawyer;
    
	$clientName = $_REQUEST['clientName'];
	$clientEmail = $_REQUEST['clientEmail'];
	$clientMobileNo = $_REQUEST['clientMobileNo'];
	$appointmentDate = $_REQUEST['appointmentDate'];
	$appointmentTime = $_REQUEST['appointmentTime'];
	$appointmentNote = $_REQUEST['appointmentNote'];

	// Checking Empty Fileds 
	if($clientName=="" || $clientEmail=="" || $clientMobileNo=="" || $appointmentDate=="" || $appointmentTime=="" || $appointmentNote=="" ){
		echo 1;
	}
	else {
		// Inserting Data
	$sql = "INSERT INTO `appointment`(`client_name`, `lawyer_id`,`user_id`, `client_email`, `client_mobile_no`, `appointment_date`, `appointment_time`, `appointment_note`) VALUES ('$clientName', '$lawyer_key','$user', '$clientEmail', '$clientMobileNo', '$appointmentDate', '$appointmentTime', '$appointmentNote')";
	$result = mysqli_query($conn, $sql);
	if($result){
		echo 2;

	}
	else {
		echo 3;
	}

	}
	
	

?>