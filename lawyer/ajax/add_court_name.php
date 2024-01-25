<?php
include('../includes/connection.php');
$province=mysqli_real_escape_string($conn,$_POST['province']);
 $district=mysqli_real_escape_string($conn,$_POST['district']);
 $tehsil=mysqli_real_escape_string($conn,$_POST['tehsil']);
 $court=mysqli_real_escape_string($conn,$_POST['court']);
 $court_type=mysqli_real_escape_string($conn,$_POST['court_type']);  
   $court_name=mysqli_real_escape_string($conn,$_POST['court_name']);
  
 
   $sql="INSERT INTO `court_name`(`cn_province`, `cn_district`,`tehsil_id`,`cn_court`, `cn_courttype`, `court_name`) VALUES ('$province','$district','$tehsil','$court','$court_type','$court_name')";
 $run=mysqli_query($conn,$sql);
 if($run){
   echo 1;
 }
 else{
 echo 2 ;
}

?>