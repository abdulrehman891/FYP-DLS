<?php
include('../includes/connection.php');
 $case_id=mysqli_real_escape_string($conn,$_POST['case_id']);
 $casetype=mysqli_real_escape_string($conn,$_POST['casetype']);
 $casecategory=mysqli_real_escape_string($conn,$_POST['casecategory']);
 

if ($casetype=="" || $casecategory=="") {
    echo 1;
}
else {
    $sql="UPDATE `case_category` SET `casetype`='$casetype',`case_category`='$casecategory' WHERE `case_id`='$case_id'";
  
    $run=mysqli_query($conn,$sql);
    if($run){
      
      echo 2;
    }
    else{
      echo 3;
    }
}
 

 ?>