<?php
include('../includes/connection.php');
$id=$_POST['id'];
$lawyer_key = $_SESSION['lawyer_id'];
if ($_SESSION['user'] == 'USER') {
                                

$sql1 = "SELECT * FROM `lawyer_user_access` WHERE `user_access_id`= '$lawyer_key'";
  $result1 = mysqli_query($conn, $sql1);
  $row = mysqli_fetch_assoc($result1);
  $lawyer_key=$row['lawer_key'];
  
}
$sql="SELECT * FROM client WHERE lawyer_id = '$lawyer_key' and client_id='$id'";
$run=mysqli_query($conn,$sql);
$fet=mysqli_fetch_array($run);
$sql2="DELETE FROM client WHERE lawyer_id = '$lawyer_key' and client_id='$id'";
$run2=mysqli_query($conn,$sql2);
if($run2){
         echo 1;
     
    //  header('Location:../client.php');
}
else {

    echo 2;
}
    





?>