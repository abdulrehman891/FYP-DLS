<?php
include('../includes/connection.php');
$po_id=mysqli_real_escape_string($conn,$_POST['po_id']);
$province=mysqli_real_escape_string($conn,$_POST['province']);
$district=mysqli_real_escape_string($conn,$_POST['district']);
$tehsil=mysqli_real_escape_string($conn,$_POST['tehsil']);
$policestation=mysqli_real_escape_string($conn,$_POST['policestation']);
if ($province=="" || $district=="" || $district=="" || $tehsil=="" || $policestation=="" ) {
    echo 1;
}
else {
    $update="UPDATE `police_station` SET `province_id`='$province',`district_id`='$district',`tehsil_id`='$tehsil',`policestation`='$policestation' WHERE `po_id`='$po_id'";
$run2=mysqli_query($conn,$update);
if ($run2){
    echo 2;
}
else{
    echo 3;
}
}
?>

