<?php

// DELETE Button Clicked
include('../includes/connection.php');
  $memberId = $_POST['id'];
  $sql = "DELETE FROM member WHERE member_id='$memberId'";
  $result = mysqli_query($conn, $sql);
  if($result){
   echo 1;

  }
  else{
      echo 2;
  }

?>