<?php
include('../includes/connection.php');

   $judge=mysqli_real_escape_string($conn,$_POST['judge']);
  
 
   $sql="INSERT INTO `judge`(`judge_name`) VALUES ('$judge')";
 $run=mysqli_query($conn,$sql);
 if($run){
   echo 1;
 }
 else{
 echo 2 ;
}

?>