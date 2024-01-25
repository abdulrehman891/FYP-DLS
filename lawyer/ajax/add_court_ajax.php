<?php
include('../includes/connection.php');

  
$province=mysqli_real_escape_string($conn,$_POST['province']);
$district=mysqli_real_escape_string($conn,$_POST['district']);
$tehsil=mysqli_real_escape_string($conn,$_POST['tehsil']);
   $court=mysqli_real_escape_string($conn,$_POST['court']);
  
 
   $sql="INSERT INTO `court`(`province_cou`, `district_cou`,`tehsil_id`, `cou_name`) VALUES ('$province','$district','$tehsil','$court')";
 $run=mysqli_query($conn,$sql);
 if($run){
   echo 1;
 }
 else{
 echo 2 ;
}

?>