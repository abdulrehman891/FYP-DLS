<?php
include("../includes/connection.php");
$lawer_id=$_SESSION['lawyer_id'];
 $name=mysqli_real_escape_string($conn,$_POST['name']);
 $access=mysqli_real_escape_string($conn,$_POST['access']);
 @$lawyer=mysqli_real_escape_string($conn,$_POST['lawyer']);
 @$clients=mysqli_real_escape_string($conn,$_POST['clients']);
 @$case=mysqli_real_escape_string($conn,$_POST['case']);
 @$appoinment=mysqli_real_escape_string($conn,$_POST['appoinment']);
 @$team_member=mysqli_real_escape_string($conn,$_POST['team_member']);
 @$tasks=mysqli_real_escape_string($conn,$_POST['tasks']);
 @$setting=mysqli_real_escape_string($conn,$_POST['setting']);
 @$user=mysqli_real_escape_string($conn,$_POST['user']);
//  @$user=mysqli_real_escape_string($conn,$_POST['user']);

if ($name == "" || $access == "") {
    echo 1;
} else {

    $sql1="INSERT INTO `user_manegment_role_access`(`lawyer_key`,`name`, `access`, `lawyer`, `client`, `casee`, `appoinment`, `team_member`, `task`, `setting`, `user`) VALUES ('$lawer_id','$name','$access','$lawyer','$clients','$case','$appoinment','$team_member','$tasks','$setting','$user')";
    $run1=mysqli_query($conn,$sql1);
    
    if ($run1) {
        echo 2;
    } else {
        echo 3;
    }
}


?>