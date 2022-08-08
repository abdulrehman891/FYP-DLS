<?php 

include('../includes/connection.php');


$clientName = $_REQUEST['clientName'];

$sql = "SELECT * FROM client WHERE client_name = '$clientName' LIMIT 1";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

echo json_encode($data);





?>