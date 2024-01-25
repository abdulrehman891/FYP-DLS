<?php
include('../includes/connection.php');
 $cFname=mysqli_real_escape_string($conn,$_POST['cFname']);
 $cLname=mysqli_real_escape_string($conn,$_POST['cLname']);
  $cGender=mysqli_real_escape_string($conn,$_POST['cGender']);
  $cEmail=mysqli_real_escape_string($conn,$_POST['cEmail']);
 $cMobile=mysqli_real_escape_string($conn,$_POST['cMobile']);
 $cAddress=mysqli_real_escape_string($conn,$_POST['cAddress']);
 $cCity=mysqli_real_escape_string($conn,$_POST['cCity']); 
 $cState=mysqli_real_escape_string($conn,$_POST['cState']); 
 $cRname=mysqli_real_escape_string($conn,$_POST['cRname']);
 $cRno=mysqli_real_escape_string($conn,$_POST['cRno']);
 $cImage=$_FILES['cImage']['name'];

  $sql="INSERT INTO `client`( `client_fname`, `client_lname`, `client_gender`, `client_email`, `client_phone`, `client_addresss`, `client_city`, `client_state`, `client_rname`, `client_rno`,`client_image`) VALUES ('$cFname','$cLname','$cGender','$cEmail','$cMobile','$cAddress','$cCity','$cState','$cRname','$cRno','$cImage')";
  
$run=mysqli_query($conn,$sql);
move_uploaded_file($_FILES['cImage']['tmp_name'],"../image/".$cImage);
if($run){
  
  echo 1;
}
else{
  echo 2;
}

 ?>