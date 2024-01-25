<?php
include('../includes/connection.php')


?>
<?php
// add Cient Clicked

    $clientid=mysqli_real_escape_string($conn,$_POST['clientid']);



	$lawyer_key = $_SESSION['lawyer_id'];
	if ($_SESSION['user'] == 'USER') {
									

	$sql1 = "SELECT * FROM `lawyer_user_access` WHERE `user_access_id`= '$lawyer_key'";
	$result1 = mysqli_query($conn, $sql1);
	$row = mysqli_fetch_assoc($result1);
	$lawyer_key=$row['lawer_key'];
	
	}

	// $lawyer_key = $_SESSION['lawyer_id'];
	$clientName = $_REQUEST['clientName'];
	$clientCnic = $_REQUEST['clientCnic'];
	$clientGender = $_REQUEST['clientGender'];
	$clientEmail = $_REQUEST['clientEmail'];
	// $clientPassword = $_REQUEST['clientPassword'];
	$clientMobile = $_REQUEST['clientMobile'];
	$clientAddress = $_REQUEST['clientAddress'];
	$district = $_REQUEST['district'];
	$clientState = $_REQUEST['clientState'];
	$clientReferenceName = $_REQUEST['clientReferenceName'];
	$clientReferenceNo = $_REQUEST['clientReferenceNo'];
	$clientDescription = $_REQUEST['clientDescription'];
	// $date = $_REQUEST['date'];

	// Checking Empty Fields
	if($clientName == "" || $clientCnic == "" || $clientGender == "" || $clientEmail == "" || $clientMobile == "" || $clientAddress == "" || $district == "" || $clientState == "" || $clientDescription==""){
		echo 1;
	} else {
		// Update Data
		$sql = "UPDATE `client` SET `lawyer_id`='$lawyer_key',`client_name`='$clientName',`client_cnic`='$clientCnic',`client_gender`='$clientGender',`client_email`='$clientEmail',`client_mobile`='$clientMobile',`client_address`='$clientAddress',`client_city`='$district',`client_state`='$clientState',`client_description`='$clientDescription',`client_reference_name`='$clientReferenceName',`client_reference_no`='$clientReferenceNo'  WHERE `lawyer_id`='$lawyer_key' and `client_id`='$clientid'";

		$result = mysqli_query($conn, $sql);
		if($result){
			echo 2;			
		}
        else{
            echo 3;
        }
	}

?>