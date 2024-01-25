<?php
include('../includes/connection.php');
 $casetype=mysqli_real_escape_string($conn,$_POST['casetype']);
 $casecategory=mysqli_real_escape_string($conn,$_POST['casecategory']);


  $sql="INSERT INTO `case_category`(`casetype`,`case_category`) VALUES ('$casetype','$casecategory')";
  
$run=mysqli_query($conn,$sql);
if($run){
  
  echo 1;
}
else{
  echo 2;
}

 ?>