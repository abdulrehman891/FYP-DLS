<?php
include('../includes/connection.php');
echo $rid=mysqli_real_escape_string($conn,$_POST['rid']);
echo $lid=mysqli_real_escape_string($conn,$_POST['lid']);
echo $name=mysqli_real_escape_string($conn,$_POST['rname']);
echo $access=mysqli_real_escape_string($conn,$_POST['access']);
// @$lawyer=mysqli_real_escape_string($conn,$_POST['lawyer']);
@$lawyer="";
@$clients=mysqli_real_escape_string($conn,$_POST['clients']);
@$case=mysqli_real_escape_string($conn,$_POST['case']);
@$appoinment=mysqli_real_escape_string($conn,$_POST['appoinment']);
@$team_member=mysqli_real_escape_string($conn,$_POST['team_member']);
@$tasks=mysqli_real_escape_string($conn,$_POST['tasks']);
@$setting=mysqli_real_escape_string($conn,$_POST['setting']);
@$user=mysqli_real_escape_string($conn,$_POST['user']);

 
 if($name=="" || $access==""){
     echo 1;
 }
 else{
    $update="UPDATE `user_manegment_role_access` SET `lawyer_key`='$lid',`name`='$name',`access`='$access',`lawyer`='$lawyer',`client`='$clients',`casee`='$case',`appoinment`='$appoinment',`team_member`='$team_member',`task`='$tasks',`setting`='$setting',`user`='$user' WHERE `r_id`='$rid'";
    $run1=mysqli_query($conn,$update);
    if ($run1) {
        echo 2;
        
    } else {
        echo 3;
    }
 }
    


?>