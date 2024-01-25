<?php
include('../includes/connection.php');
$province=mysqli_real_escape_string($conn,$_POST['province']);
   $district=mysqli_real_escape_string($conn,$_POST['district']);
  
 
   $sql="INSERT INTO `district`( `province_id`, `district`) VALUES ('$province','$district')";
 $run=mysqli_query($conn,$sql);
 if($run){
   echo 1;
 }
 else{
 echo 2 ;
}

?>