<?php
include('../includes/connection.php');
 $casetype=mysqli_real_escape_string($conn,$_POST['casetype']);
 $casecategory=mysqli_real_escape_string($conn,$_POST['casecategory']);
 $casesubcategory=mysqli_real_escape_string($conn,$_POST['casesubcategory']);


  $sql="INSERT INTO `view_sub_category`(`idcase_type`, `idcase_cate`, `sub_category`) VALUES ('$casetype','$casecategory','$casesubcategory')";
  
$run=mysqli_query($conn,$sql);
if($run){
  
  echo 1;
}
else{
  echo 2;
}

 ?>