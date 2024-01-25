<?php
include('../includes/connection.php');
$court_id=mysqli_real_escape_string($conn,$_POST['court_id']);
$province=mysqli_real_escape_string($conn,$_POST['province']);
 $district=mysqli_real_escape_string($conn,$_POST['district']);
 $tehsil=mysqli_real_escape_string($conn,$_POST['tehsil']);
 $court=mysqli_real_escape_string($conn,$_POST['court']);
   
   

if ($province=="" || $district=="" || $tehsil=="" || $court=="") {
    echo 1;
}
else {
    $update="UPDATE `court` SET `province_cou`='$province',`district_cou`='$district',`tehsil_id`='$tehsil',`cou_name`='$court' WHERE `cou_id`='$court_id'";
$run2=mysqli_query($conn,$update);
if ($run2){
    echo 2;
}
else{
    echo 3;
}
}
?>

