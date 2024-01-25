<?php
include('../includes/connection.php');

   $province=mysqli_real_escape_string($conn,$_POST['province']);
   $district=mysqli_real_escape_string($conn,$_POST['district']);
   $tehsil=mysqli_real_escape_string($conn,$_POST['tehsil']);
   $policestation=mysqli_real_escape_string($conn,$_POST['policestation']);
  
 
   $sql="INSERT INTO `police_station`(`province_id`, `district_id`,`tehsil_id`,`policestation`) VALUES ('$province','$district','$tehsil','$policestation')";
 $run=mysqli_query($conn,$sql);
 if($run){
   echo 1;
 }
 else{
 echo 2 ;
}

?>