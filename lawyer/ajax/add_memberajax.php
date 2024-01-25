<?php
include('../includes/connection.php');


   
   $mFname=mysqli_real_escape_string($conn,$_POST['mFname']);
   $mLname=mysqli_real_escape_string($conn,$_POST['mLname']);
   $mEmail=mysqli_real_escape_string($conn,$_POST['mEmail']);
   $mMobile=mysqli_real_escape_string($conn,$_POST['mMobile']);
   $mAddress=mysqli_real_escape_string($conn,$_POST['mAddress']);
   $mPassword=mysqli_real_escape_string($conn,$_POST['mPassword']);
   $mCpassword=mysqli_real_escape_string($conn,$_POST['mCpassword']);
   $mCity=mysqli_real_escape_string($conn,$_POST['mCity']);
   $mState=mysqli_real_escape_string($conn,$_POST['mState']); 
   $mRole=mysqli_real_escape_string($conn,$_POST['mRole']);
   $mImage=$_FILES['file']['name'];
   
   $sql="INSERT INTO `member`(`mem_fname`, `mem_lname`, `mem_email`, `mem_mobile`, `mem_address`, `mem_password`, `mem_cpassword`, `mem_city`, `mem_state`, `mem_role`, `mem_image`) VALUES ('$mFname',' $mLname','$mEmail','$mMobile','$mAddress','$mPassword','$mCpassword','$mCity','$mState','$mRole','$mImage')";
   move_uploaded_file(['file']['tmp_name'],);
 $run=mysqli_query($conn,$sql);

 if($run){
   echo 1;
 }
 else{
 echo 2 ;
}

?>