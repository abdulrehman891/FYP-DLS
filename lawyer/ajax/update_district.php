<?php
include('../includes/connection.php');
$dc_id=mysqli_real_escape_string($conn,$_POST['dc_id']);
$province=mysqli_real_escape_string($conn,$_POST['province']);
$district=mysqli_real_escape_string($conn,$_POST['district']);


if ($province=="" || $district=="" ) {
    echo 1;
}
else {
    $update="UPDATE `district` SET `province_id`='$province',`district`='$district' WHERE `dc_id`='$dc_id'";
$run2=mysqli_query($conn,$update);
if ($run2){
    echo 2;
}
else{
    echo 3;
}
}
?>

