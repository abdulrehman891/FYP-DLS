<?php
include('../includes/connection.php');


   $act=mysqli_real_escape_string($conn,$_POST['act']);
  
 
   $sql="INSERT INTO `act`(`act`) VALUES ('$act')";
 $run=mysqli_query($conn,$sql);
 if($run){
   echo 1;
 }
 else{
 echo 2 ;
}

?>