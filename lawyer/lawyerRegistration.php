<?php
include("includes/connection.php");

?>


<?php

if (isset($_POST['submit'])) {
	$lawyerFirstName=mysqli_real_escape_string($conn,$_POST['lawyerFirstName']);
	$lawyerLastName=mysqli_real_escape_string($conn,$_POST['lawyerLastName']);
	$lawyerEdu=mysqli_real_escape_string($conn,$_POST['lawyerEdu']);
	if(isset($_POST['lawyerSpec'])) 
    {
         $lawyerSpec = $_POST['lawyerSpec'];
    }else{
        $lawyerSpec = "Nothing";
    };
	// $lawyerSpec=mysqli_real_escape_string($conn,$_POST['lawyerSpec']);
	$lawyerExperience=mysqli_real_escape_string($conn,$_POST['lawyerExperience']);
	$lawyerLawFirmName=mysqli_real_escape_string($conn,$_POST['lawyerLawFirmName']);
	$lawyerEmail=mysqli_real_escape_string($conn,$_POST['lawyerEmail']);
	$lawyerPassword=mysqli_real_escape_string($conn,$_POST['lawyerPassword']);
	$lawyerPhone=mysqli_real_escape_string($conn,$_POST['lawyerPhone']);
	$lawyerLicense=mysqli_real_escape_string($conn,$_POST['lawyerLicense']);
	$lawyerDescription=mysqli_real_escape_string($conn,$_POST['lawyerDescription']);
	$lawyerAddress=mysqli_real_escape_string($conn,$_POST['lawyerAddress']);
	$lawyerImage=$_FILES['lawyerImage']['name'];






    // if any empty field
	if ($lawyerFirstName == "" || $lawyerLastName == "" || $lawyerEdu == "" || $lawyerSpec == "" || $lawyerExperience == "" || $lawyerEmail == "" || $lawyerPassword == "" || $lawyerLicense == "" ||  $lawyerDescription == "" || $lawyerPhone==""|| $lawyerAddress == "" || $lawyerImage == "") {

        $msg = '<div class="col-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Please!</strong> Fill All Fields.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>';

	}





    // If lawyer already register AND approved by Admin
    elseif(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM lawyer WHERE lawyer_email = '$lawyerEmail' OR lawyer_license = '$lawyerLicense' AND lawyer_status = 1 ")) == 1){
        $msg = '<div class="col-12">
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                    You are already registered with this Email or License Number. <br> <strong>Please go to Sign in page</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>';
    }









    // If lawyer already register AND Not approved by Admin
    elseif(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM lawyer WHERE lawyer_email = '$lawyerEmail' OR lawyer_license = '$lawyerLicense' AND lawyer_status = 0 ")) == 1){
        $msg = '<div class="col-12">
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                    You are already registered but please wait for <strong>Admin Approval</strong>.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>';
    }







    // If lawyer dismissed by Admin
    elseif(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM lawyer WHERE lawyer_email = '$lawyerEmail' OR lawyer_license = '$lawyerLicense' AND lawyer_status = 2 ")) == 1){
        $msg = '<div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Fake Account!</storng> You cannot join us again.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>';
    }




    // Insert Data
	else{

    $sql = "INSERT INTO lawyer (lawyer_fname, lawyer_lname, lawyer_edu, lawyer_spec, lawyer_exp, lawyer_lfname, lawyer_phone, lawyer_description, lawyer_address, lawyer_image, lawyer_email, lawyer_pass, lawyer_license, lawyer_status) VALUES ('$lawyerFirstName' , '$lawyerLastName' , '$lawyerEdu' , '$lawyerSpec' , '$lawyerExperience' , '$lawyerLawFirmName' , '$lawyerPhone' , '$lawyerDescription' , '$lawyerAddress','$lawyerImage','$lawyerEmail','$lawyerPassword', '$lawyerLicense', 0)";

	$result = mysqli_query($conn, $sql);

    move_uploaded_file($_FILES['lawyerImage']['tmp_name'], "assets/images/lawyers/" . $lawyerImage);
	if($result){
        $msg = '<div class="col-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Thanks!</strong> For Joining <strong>DLS</strong> You will be registered after approved by Admin.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>';
	}

    // if sql not run correctly
	else {

        $msg = '<div class="col-12">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Please!</strong> Try again later, System is not responding.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>';

	    }
	}
	
}

?>

<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/rocker/demo/vertical/authentication-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Feb 2022 14:09:35 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title>Lawyer Registration</title>
</head>

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                    <div class="col mx-auto">
                        <div class="my-4 text-center">
                            <!-- <img src="assets/images/logo-img.png" width="180" alt="" /> -->
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="">Lawyer Sign Up</h3>
                                        <p>Already have an account? <a href="lawyerLogin.php" class="text-secondary">Sign in here</a>
                                        </p>
                                    </div>


                                    <?php
                                    if(isset($msg)){
                                        echo $msg;
                                    }
                                    ?>

                                    <!-- Remove Signup with Facebook or Gmail -->
                                    <!-- <div class="d-grid">
                                        <a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span
                                                class="d-flex justify-content-center align-items-center">
                                                <img class="me-2" src="assets/images/icons/search.svg" width="16"
                                                    alt="Image Description">
                                                <span>Sign Up with Google</span>
                                            </span>
                                        </a> <a href="javascript:;" class="btn btn-facebook"><i
                                                class="bx bxl-facebook"></i>Sign Up with Facebook</a>
                                    </div> -->
                                    
                                    <div class="login-separater text-center mb-4"> <span>SIGN UP WITH EMAIL</span>
                                        <hr />
                                    </div>
                                    <div class="form-body">
                                        <form class="row g-3" method="POST" enctype="multipart/form-data">
                                            <div class="col-sm-6">
                                                <label for="lawyerFirstName" class="form-label">First Name <span class="text-danger">*</span>  </label>
                                                <input type="text" name="lawyerFirstName" class="form-control" id="lawyerFirstName"
                                                    placeholder="Abdul">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="lawyerLastName" class="form-label">Last Name <span class="text-danger">*</span></label>
                                                <input type="text" name="lawyerLastName" class="form-control" id="lawyerLastName"
                                                    placeholder="Rehman">
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="lawyerEdu" class="form-label">Education <span class="text-danger">*</span></label>
                                                <input type="text" name="lawyerEdu" class="form-control" id="lawyerEdu"
                                                    placeholder="LLB , LLM or any other">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="lawyerSpec" class="form-label">Specialization <span class="text-danger">*</span></label>
                                                <!-- <input type="text" name="lawyerSpec" class="form-control" id="lawyerSpec"
                                                    placeholder="Criminal lawyer"> -->
                                                    <div class="mb-3">
                                                      <select class="form-select" name="lawyerSpec" id="lawyerSpec">
                                                        <option value="Not Selected" disabled selected>Select Specialization </option>
                                                        <option value="Business Lawyer">Business Lawyer</option>
                                                        <option value="Constitutional lawyer">Constitutional lawyer</option>
                                                        <option value="Family lawyer">Family lawyer</option>
                                                        <option value="Intellectual property lawyer">Intellectual property lawyer</option>
                                                        <option value="Property Lawyer">Property Lawyer</option>
                                                        <option value="Public Interest Lawyer">Public Interest Lawyer</option>
                                                        <option value="Civil Rights Lawyer">Civil Rights Lawyer</option>
                                                      </select>
                                                    </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="lawyerExperience" class="form-label">Experience(in years) <span class="text-danger">*</span></label>
                                                <input type="text" name="lawyerExperience" class="form-control" id="lawyerExperience"
                                                    placeholder="5-Years">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="lawyerLawFirmName" class="form-label">Law Firm Name</label>
                                                <input type="text" name="lawyerLawFirmName" class="form-control" id="lawyerLawFirmName"
                                                    placeholder="Firm name">
                                            </div>

                                            <div class="col-12">
                                                <label for="lawyerEmail" class="form-label">Email Address <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" name="lawyerEmail" id="lawyerEmail"
                                                    placeholder="example@user.com">
                                            </div>
                                            <div class="col-12">
                                                <label for="lawyerPassword" class="form-label">Password <span class="text-danger">*</span></label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0"
                                                        name="lawyerPassword" id="lawyerPassword" value="12345678"
                                                        placeholder="Enter Password"> <a href="javascript:;"
                                                        class="input-group-text bg-transparent"><i
                                                            class='bx bx-hide'></i></a>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <label for="lawyerPhone" class="form-label">Phone No. <span class="text-danger">*</span></label>
                                                <input type="text" name="lawyerPhone" class="form-control" id="lawyerPhone"
                                                    placeholder="+9230265680">
                                            </div>

                                            <div class="col-6">
                                                <label for="lawyerLicense" class="form-label">License No. <span class="text-danger">*</span></label>
                                                <input type="text" name="lawyerLicense" class="form-control" id="lawyerLicense"
                                                    placeholder="65667">
                                            </div>
                                            
                                            <div class="col-12">
                                                <label for="lawyerDescription" class="form-label">Description <span class="text-danger">*</span></label>
                                                <textarea class="form-control" name="lawyerDescription" id="lawyerDescription"
                                                    placeholder="10 - 20 words about youself that attract client to You.." cols="150" rows="2"></textarea>
                                            </div>

                                            <div class="col-12">
                                                <label for="lawyerAddress" class="form-label">Address <span class="text-danger">*</span></label>
                                                <textarea class="form-control" name="lawyerAddress" id="lawyerAddress"
                                                    placeholder="" cols="30" rows="2"></textarea>
                                            </div>
                                            

                                            <div class="col-12">
                                                <label for="lawyerImage" class="form-label">Upload Image <span class="text-danger">*</span></label>
                                                <input type="file" class="form-control" name="lawyerImage" id="lawyerImage">
                                            </div>
                                            
<!--                                             
                                            <div class="col-12">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="lcond"
                                                        id="codition" value="agree">
                                                    <label class="form-check-label" for="codition">I read and agree to
                                                        Terms & Conditions</label>
                                                </div>
                                            </div> -->
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" name="submit" class="btn btn-dark"><i
                                                            class='bx bx-user'></i>Sign up</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--Password show & hide js -->
    <script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
    });
    </script>
    <!--app JS-->
    <script src="assets/js/app.js"></script>
</body>



</html>