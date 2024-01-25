<?php
include('../includes/connection.php');
 $case_id=mysqli_real_escape_string($conn,$_POST['add_case_id']);


 $lawyer_key = $_SESSION['lawyer_id'];
 if ($_SESSION['user'] == 'USER') {
                                 
 
 $sql1 = "SELECT * FROM `lawyer_user_access` WHERE `user_access_id`= '$lawyer_key'";
   $result1 = mysqli_query($conn, $sql1);
   $row = mysqli_fetch_assoc($result1);
   $lawyer_key=$row['lawer_key'];
   
 }
 $cnic=mysqli_real_escape_string($conn,$_POST['cnic']);
 $clientname=mysqli_real_escape_string($conn,$_POST['clientname']);
 $clientmobile=mysqli_real_escape_string($conn,$_POST['clientmobile']);
 $petitioner=mysqli_real_escape_string($conn,$_POST['petitioner']);
 $petitioner_advocate=mysqli_real_escape_string($conn,$_POST['petitioner_advocate']);
 $respondent=mysqli_real_escape_string($conn,$_POST['respondent']);
 $respondent_advocate=mysqli_real_escape_string($conn,$_POST['respondent_advocate']);
 $province=mysqli_real_escape_string($conn,$_POST['province']);
 $district=mysqli_real_escape_string($conn,$_POST['district']);
 $tehsil=mysqli_real_escape_string($conn,$_POST['tehsil']);
 $court=mysqli_real_escape_string($conn,$_POST['court']);
 $court_type=mysqli_real_escape_string($conn,$_POST['court_type']);
 $court_name=mysqli_real_escape_string($conn,$_POST['court_name']);
$judge=mysqli_real_escape_string($conn,$_POST['judge']);
 $case=mysqli_real_escape_string($conn,$_POST['case']);
 $casecategory=mysqli_real_escape_string($conn,$_POST['casecategory']);
 $casesubcategory=mysqli_real_escape_string($conn,$_POST['casesubcategory']);
 $case_no=mysqli_real_escape_string($conn,$_POST['case_no']);
 $case_date=mysqli_real_escape_string($conn,$_POST['case_date']);
 $cnr=mysqli_real_escape_string($conn,$_POST['cnr']);
 $registration_date=mysqli_real_escape_string($conn,$_POST['registration_date']);
 $police_station=mysqli_real_escape_string($conn,$_POST['police_station']);
 $fir_number=mysqli_real_escape_string($conn,$_POST['fir_number']);
 $fir_date=mysqli_real_escape_string($conn,$_POST['fir_date']);
 $file_no=mysqli_real_escape_string($conn,$_POST['file_no']);
 $file_date=mysqli_real_escape_string($conn,$_POST['file_date']);
  $act=mysqli_real_escape_string($conn,$_POST['act']);
 $under_section=mysqli_real_escape_string($conn,$_POST['under_section']);
 $last_date=mysqli_real_escape_string($conn,$_POST['last_date']);
 $Next_date=mysqli_real_escape_string($conn,$_POST['Next_date']);
 $purpose=mysqli_real_escape_string($conn,$_POST['purpose']);


 if ($cnic=="" || $clientname=="" || $clientmobile=="" || $petitioner=="" || $petitioner_advocate=="" || $respondent=="" || $respondent_advocate=="" || $province=="" || $district=="" || $tehsil=="" || $court=="" || $court_type=="" || $court_name=="" || $judge=="" || $case=="" || $casecategory=="" || $casesubcategory=="" || $case_no=="" || $case_date=="" || $cnr=="" || $registration_date=="" || $police_station=="" || $fir_number=="" || $fir_date=="" || $file_no=="" || $file_date=="" || $act=="" || $under_section=="" || $last_date=="" ||$Next_date=="" || $purpose=="") {

    echo 1;
}
else {
    $update="UPDATE `add_case` SET `la_id`='$lawyer_key',`cnic`='$cnic',`client_name`='$clientname',`client_mobile`='$clientmobile',`petitioner_name`='$petitioner',`p_advocate_name`='$petitioner_advocate',`respondent_name`='$respondent',`r_advocate_name`='$respondent_advocate',`province`='$province',`district`='$district',`tehsil`='$tehsil',`court`='$court',`court_type`='$court_type',`court_name`='$court_name',`judge`='$judge',`case_tye`='$case',`case_category`='$casecategory',`case_sub_category`='$casesubcategory',`case_number`='$case_no',`case_date`='$case_date',`cnr`='$cnr',`registration_date`='$registration_date',`police_station`='$police_station',`fir_number`='$fir_number',`fir_date`='$fir_date',`file_number`='$file_no',`file_date`='$file_date',`act`='$act',`under_section`='$under_section',`last_date`='$last_date',`next_date`='$Next_date',`purpose_of_hearing`='$purpose' WHERE `add_case_id`='$case_id'";


$run2=mysqli_query($conn,$update);
if ($run2){
    echo 2;
}
else{
    echo 3;
}
}


?>