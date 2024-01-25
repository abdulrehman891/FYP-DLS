<?php
include('../includes/connection.php')

// $id=$_POST['upid'];


$cotype=mysqli_real_escape_string($conn,$_POST['cotype']);
$update="UPDATE court_type SET `cotype`='$cotype'";
$run2=mysqli_query($conn,$run2);
if ($run2){
    echo 1;
}
else{
    echo 2;
}
?>

