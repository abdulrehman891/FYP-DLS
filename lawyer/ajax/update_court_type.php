<?php
include('../includes/connection.php');
$co_id=mysqli_real_escape_string($conn,$_POST['co_id']);
$province=mysqli_real_escape_string($conn,$_POST['province']);
 $district=mysqli_real_escape_string($conn,$_POST['district']);
 $tehsil=mysqli_real_escape_string($conn,$_POST['tehsil']);
 $court=mysqli_real_escape_string($conn,$_POST['court']);
 $court_type=mysqli_real_escape_string($conn,$_POST['court_type']);  
   

if ($province=="" || $district=="" || $tehsil=="" || $court=="" || $court_type=="") {
    echo 1;
}
else {
    $update="UPDATE `court_type` SET `province_c_type`='$province',`district_c_type`='$district',`tehsil_id`='$tehsil',`court_id`='$court',`cotype`='$court_type' WHERE `coid`='$co_id'";
$run2=mysqli_query($conn,$update);
if ($run2){
    echo 2;
}
else{
    echo 3;
}
}
?>

