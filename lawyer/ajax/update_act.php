<?php
include('../includes/connection.php');
$act_id=mysqli_real_escape_string($conn,$_POST['act_id']);
$act=mysqli_real_escape_string($conn,$_POST['act']);
if ($act=="") {
    echo 1;
}
else {
    $update="UPDATE `act` SET `act`='$act' WHERE `act_id`='$act_id'";
$run2=mysqli_query($conn,$update);
if ($run2){
    echo 2;
}
else{
    echo 3;
}
}
?>

