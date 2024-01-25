<?php
include('../includes/connection.php');
$c_id=mysqli_real_escape_string($conn,$_POST['c_id']);
$province=mysqli_real_escape_string($conn,$_POST['province']);
 $district=mysqli_real_escape_string($conn,$_POST['district']);
 $tehsil=mysqli_real_escape_string($conn,$_POST['tehsil']);
 $court=mysqli_real_escape_string($conn,$_POST['court']);
 $court_type=mysqli_real_escape_string($conn,$_POST['court_type']);  
   $court_name=mysqli_real_escape_string($conn,$_POST['court_name']);

if ($province=="" || $district=="" || $district=="" || $tehsil=="" || $court=="" || $court_type=="" || $court_name=="") {
    echo 1;
}
else {
    $update="UPDATE `court_name` SET `cn_province`='$province',`cn_district`='$district',`tehsil_id`='$tehsil',`cn_court`='$court',`cn_courttype`='$court_type',`court_name`='$court_name' WHERE `c_id`='$c_id'";
$run2=mysqli_query($conn,$update);
if ($run2){
    echo 2;
}
else{
    echo 3;
}
}
?>

