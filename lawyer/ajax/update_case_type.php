<?php
include('../includes/connection.php');
 $case_id=mysqli_real_escape_string($conn,$_POST['case_id']);
 $casetype=mysqli_real_escape_string($conn,$_POST['casetype']);
 
 

if ($casetype=="") {
    echo 1;
}
else {
    $sql="UPDATE `case_type` SET `case_type`='$casetype' WHERE `case_id`='$case_id'";
  
    $run=mysqli_query($conn,$sql);
    if($run){
      
      echo 2;
    }
    else{
      echo 3;
    }
}
 

 ?>