<?php
include("../includes/connection.php");
  $lawyer_id=$_SESSION['lawyer_id'];
  $uname=mysqli_real_escape_string($conn,$_POST['uname']);
  $uemail=mysqli_real_escape_string($conn,$_POST['uemail']);
  $upass=mysqli_real_escape_string($conn,$_POST['upass']);
  $urole=mysqli_real_escape_string($conn,$_POST['urole']);
 
 
if ($uname == "" || $uemail == "" || $upass == "" || $urole == "") {
    echo 1;
} else {

    $sql1="INSERT INTO `lawyer_user_access`(`lawer_key`,`user_access_name`, `user_access_email`, `user_access_status`, `user_access_password`,`user`) VALUES ('$lawyer_id','$uname','$uemail','$urole','$upass', 'USER')";
    $run1=mysqli_query($conn,$sql1);
    
    if ($run1) {
        echo 2;
    } else {
        echo 3;
    }
}


?>