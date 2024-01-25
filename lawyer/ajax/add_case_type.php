<?php
include('../includes/connection.php');
 $casetype=mysqli_real_escape_string($conn,$_POST['casetype']);


  $sql="INSERT INTO `case_type`(`case_type`) VALUES (' $casetype')";
  
$run=mysqli_query($conn,$sql);
if($run){
  
  echo 1;
}
else{
  echo 2;
}

 ?>