<?php
include('../includes/connection.php');
$id=$_POST['id'];
$sql="SELECT * FROM court_name WHERE c_id='$id' ";
$run=mysqli_query($conn,$sql);
$fet=mysqli_fetch_array($run);
$sql2="DELETE FROM court_name WHERE c_id='$id'";
$run2=mysqli_query($conn,$sql2);
if($run2){
         echo 1;
     
    //  header('Location:../client.php');
}
else {

    echo 2;
}
    





?>