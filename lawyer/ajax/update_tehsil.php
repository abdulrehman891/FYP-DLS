<?php
include('../includes/connection.php');
$th_id=mysqli_real_escape_string($conn,$_POST['th_id']);
$province=mysqli_real_escape_string($conn,$_POST['province']);
$district=mysqli_real_escape_string($conn,$_POST['district']);
$th_name=mysqli_real_escape_string($conn,$_POST['th_name']);

if ($province=="" || $district=="" || $district=="" || $th_name==""  ) {
    echo 1;
}
else {
    $update="UPDATE `tehsil` SET `th_province`='$province',`th_district`='$district',`th_name`='$th_name' WHERE `th_id`='$th_id'";
$run2=mysqli_query($conn,$update);
if ($run2){
    echo 2;
}
else{
    echo 3;
}
}
?>

