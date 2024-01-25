<?php
include('../includes/connection.php');

  
 $province=mysqli_real_escape_string($conn,$_POST['province']);
 $district=mysqli_real_escape_string($conn,$_POST['district']);
    $tehsil=mysqli_real_escape_string($conn,$_POST['tehsil']);
  
 
   $sql="INSERT INTO `tehsil`(`th_province`, `th_district`, `th_name`) VALUES ('$province','$district','$tehsil')";
 $run=mysqli_query($conn,$sql);
 if($run){
   echo 1;
 }
 else{
 echo 2 ;
}

?>