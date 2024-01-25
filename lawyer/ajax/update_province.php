<?php
include('../includes/connection.php');
$pro_id=mysqli_real_escape_string($conn,$_POST['pro_id']);
$province=mysqli_real_escape_string($conn,$_POST['province']);



if ($province=="") {
    echo 1;
}
else {
    $update="UPDATE `province` SET `province`='$province' WHERE `pro_id`='$pro_id'";
$run2=mysqli_query($conn,$update);
if ($run2){
    echo 2;
}
else{
    echo 3;
}
}
?>

