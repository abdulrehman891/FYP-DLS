<?php 

include('../includes/connection.php');

$caseTypeId = $_REQUEST['caseTypeId'];
$caseTypeName = $_REQUEST['caseTypeName'];

$sql = "UPDATE casetype SET case_type_name = '$caseTypeName' WHERE case_type_id = '$caseTypeId'";
$result = mysqli_query($conn, $sql);
if($result){
    echo 1;
}else {
    0;
}

?>