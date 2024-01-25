<?php
include('../includes/connection.php');

   $province=mysqli_real_escape_string($conn,$_POST['province']);
  
 
   $sql="INSERT INTO `province`(`province`) VALUES ('$province')";
 $run=mysqli_query($conn,$sql);
 if($run){
   echo 1;
 }
 else{
 echo 2 ;
}

?>