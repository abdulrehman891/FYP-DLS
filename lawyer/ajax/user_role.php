<?php
include("../includes/connection.php");
  $uname=mysqli_real_escape_string($conn,$_POST['uname']);
  $uemail=mysqli_real_escape_string($conn,$_POST['uemail']);
  $urole=mysqli_real_escape_string($conn,$_POST['urole']);
  $upass=mysqli_real_escape_string($conn,$_POST['upass']);
 
 
if ($uname == "" || $uemail == "" || $upass == "" || $urole == "") {
    echo 1;
} else {

    $sql1="INSERT INTO `admin`(`admin_name`, `admin_email`, `admin_status`, `admin_password`) VALUES ('$uname','$uemail','$urole','$upass')";
    $run1=mysqli_query($conn,$sql1);
    
    if ($run1) {
        echo 2;
    } else {
        echo 3;
    }
}


?>