<?php

include('../includes/connection.php'); 
// IF accept button clicked

   
$id=$_POST['id2'];
$lawyer_key = $_SESSION['lawyer_id'];
if ($_SESSION['user'] == 'USER') {
                                        
        
  $sql1 = "SELECT * FROM `lawyer_user_access` WHERE `user_access_id`= '$lawyer_key'";
    $result1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result1);
    $lawyer_key=$row['lawer_key'];
    
  }


  $sql = "UPDATE appointment SET appointment_status = -1 WHERE lawyer_id='$lawyer_key' and appointment_id = '$id' ";
  $result =  mysqli_query($conn, $sql);

  if($result){
    echo 1; 
    
  }
  else{
    echo 2;
  }

  