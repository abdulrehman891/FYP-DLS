<?php
include('../includes/connection.php');

 $province=mysqli_real_escape_string($conn,$_POST['province']);
 $district=mysqli_real_escape_string($conn,$_POST['district']);
 $tehsil=mysqli_real_escape_string($conn,$_POST['tehsil']);
 $court=mysqli_real_escape_string($conn,$_POST['court']);
 $ctype=mysqli_real_escape_string($conn,$_POST['ctype']);


  $sql="INSERT INTO `court_type`(`province_c_type`,`district_c_type`,`tehsil_id`,`court_id`,`cotype`) VALUES ('$province','$district','$tehsil','$court','$ctype')";
  
$run=mysqli_query($conn,$sql);
if($run){
  
  echo 1;
}
else{
  echo 2;
}

 ?>