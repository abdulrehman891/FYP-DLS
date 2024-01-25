<?php 

include('../includes/connection.php');
$lawyer_key = $_SESSION['lawyer_id'];
											 if ($_SESSION['user'] == 'USER') {
																			 
											 
											 $sql1 = "SELECT * FROM `lawyer_user_access` WHERE `user_access_id`= '$lawyer_key'";
											   $result1 = mysqli_query($conn, $sql1);
											   $row = mysqli_fetch_assoc($result1);
											   $lawyer_key=$row['lawer_key'];
											   
											 }
	// $lawyerId = $_SESSION['lawyer_id'];
	$memberName = $_REQUEST['memberName'];
	$memberCity = $_REQUEST['district'];
	$memberState = $_REQUEST['province'];
	$memberRole = $_REQUEST['memberRole'];
	$memberMobileNo = $_REQUEST['memberMobileNo'];
	$memberEmail = $_REQUEST['memberEmail'];
	// $memberPassword = $_REQUEST['memberPassword'];
	$memberAddress = $_REQUEST['memberAddress'];
	// $memberImage = $_FILES['memberImage']['name'];


	// Checking Empty Fields
	if($memberName == "" || $memberCity == "" || $memberState == "" || $memberRole == "" || $memberMobileNo == "" || $memberEmail == "" ||  $memberAddress == ""){
		echo 1;
	}


	elseif(mysqli_num_rows(mysqli_query($conn, $sql = "SELECT * FROM member WHERE member_email = '$memberEmail'")) == 1){
		echo 2;
		
	}

	else {
		// Insert data
		$sql = "INSERT INTO member(lawyer_id , member_name , member_city, member_state, member_role, member_mobile_no, member_email, member_address) VALUES ('$lawyer_key', '$memberName', '$memberCity', '$memberState', '$memberRole', '$memberMobileNo', '$memberEmail',  '$memberAddress')";

		$result = mysqli_query($conn, $sql);
		if($result){
			
			echo 3;
		}else{
			echo 4;
            

		}

	}

?>