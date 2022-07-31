<?php 
include('../includes/dbConnection.php');


$rateValue = $_REQUEST['rateValue'];
$lawyerId = $_REQUEST['lawyerId'];

// Getting Existing Rating
$sql = "SELECT * FROM lawyer WHERE lawyer_id = '$lawyerId'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$rateValue = $rateValue + $row['rate_value'];
$rateTime =  $row['rate_time'] + 1;


// Updating Rating
$sql = "UPDATE lawyer SET rate_value = '$rateValue' , rate_time = '$rateTime' WHERE lawyer_id = '$lawyerId'";
$result = mysqli_query($conn, $sql);
if($result){
    echo 1;
} else {
    0;
}

?>