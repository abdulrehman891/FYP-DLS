<?php
include('../includes/connection.php');


   $cAppoinment=mysqli_real_escape_string($conn,$_POST['appoinment']);
   $cName=mysqli_real_escape_string($conn,$_POST['cname']);
    $cMobile=mysqli_real_escape_string($conn,$_POST['cmobile']);
    $cDate=mysqli_real_escape_string($conn,$_POST['cdate']);
   $cTime=mysqli_real_escape_string($conn,$_POST['ctime']);
   $cNote=mysqli_real_escape_string($conn,$_POST['cnote']);
 
   $sql="INSERT INTO `appoinment`( `app_client`, `app_client_name`, `app_mobile`, `app_date`, `app_time`, `app_note`) VALUES ('$cAppoinment','$cName','$cMobile','$cDate','$cTime','$cNote')";
 $run=mysqli_query($conn,$sql);
 if($run){
   echo 1;
 }
 else{
 echo 2 ;
}

?>