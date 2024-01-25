<?php
include('../includes/connection.php');
 $case_sub_id=mysqli_real_escape_string($conn,$_POST['case_sub_id']);
 $casetype=mysqli_real_escape_string($conn,$_POST['casetype']);
 $casecategory=mysqli_real_escape_string($conn,$_POST['casecategory']);
 $casesubcategory=mysqli_real_escape_string($conn,$_POST['casesubcategory']);

if ($casetype=="" || $casecategory=="" || $casesubcategory=="") {
    echo 1;
}
else {
    $sql="UPDATE `view_sub_category` SET `idcase_type`='$casetype',`idcase_cate`='$casecategory',`sub_category`='$casesubcategory' WHERE `case_sub_id`='$case_sub_id'";
  
    $run=mysqli_query($conn,$sql);
    if($run){
      
      echo 2;
    }
    else{
      echo 3;
    }
}
 

 ?>