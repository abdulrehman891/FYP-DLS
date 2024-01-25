<?php
include('../includes/connection.php');
    $rid=$_POST['id'];
    $sql="DELETE FROM `user_manegment_role_access` WHERE r_id='$rid'";
    $run=mysqli_query($conn,$sql);
    if ($run) {
        echo 1;
    }
    else {
        echo 2;
    }
?>