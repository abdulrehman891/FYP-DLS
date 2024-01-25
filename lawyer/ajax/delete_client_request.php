<?php
include('../includes/connection.php');
$id=$_POST['id'];
// $sql="SELECT * FROM act WHERE act_id='$id' ";
// $run=mysqli_query($conn,$sql);
// $fet=mysqli_fetch_array($run);
    $lawyer_key = $_SESSION['lawyer_id'];
    if ($_SESSION['user'] == 'USER') {
                                            
            
      $sql1 = "SELECT * FROM `lawyer_user_access` WHERE `user_access_id`= '$lawyer_key'";
        $result1 = mysqli_query($conn, $sql1);
        $row = mysqli_fetch_assoc($result1);
        $lawyer_key=$row['lawer_key'];
        
      }
  
    $sql = "DELETE FROM client WHERE lawyer_id = '$lawyer_key' and client_id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
      echo 1;
      
    } else {
      echo 2;
  
    }
  
  
  

  

?>
