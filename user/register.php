<?php
include("includes/connection.php");

?>


<?php

if (isset($_POST['submit'])) {
	$userName=mysqli_real_escape_string($conn,$_POST['userName']);
	$userCnic=mysqli_real_escape_string($conn,$_POST['userCnic']);
	$userGender=mysqli_real_escape_string($conn,$_POST['userGender']);
    $userMobile=mysqli_real_escape_string($conn,$_POST['userMobile']);
    $userReferenceName=mysqli_real_escape_string($conn,$_POST['userReferenceName']);
    $userReferenceNo=mysqli_real_escape_string($conn,$_POST['userReferenceNo']);
    $userEmail=mysqli_real_escape_string($conn,$_POST['userEmail']);
    $userPassword=mysqli_real_escape_string($conn,$_POST['userPassword']);
    $userState=mysqli_real_escape_string($conn,$_POST['userState']);
    $userDistrict=mysqli_real_escape_string($conn,$_POST['userDistrict']);
    $userAddress=mysqli_real_escape_string($conn,$_POST['userAddress']);
    $userDescription=mysqli_real_escape_string($conn,$_POST['userDescription']);
    $image=$_FILES['image']['name'];
	

    // if any empty field
	if ($userName == "" || $userCnic == "" || $userGender == "" || $userEmail == "" || $userPassword == "" ||$userMobile == "" || $userAddress == "" || $userDistrict == "" || $userState == "") {

        $msg = '<div class="col-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Please!</strong> Fill All Fields.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>';

	}




    // If User already register
    elseif(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE user_email = '$userEmail' ")) == 1){
        $msg = '<div class="col-12">
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                    You are already registered with this Email. Please go to <strong>Login</strong> Page
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>';
    }








    // Insert Data
	else{
        move_uploaded_file($_FILES['image']['tmp_name'], "./assets/images/users/$image");
    $sql = "INSERT INTO `user`(`user_name`, `user_cnic`, `user_gender`, `user_mobile`, `user_r_name`, `user_r_number`, `user_email`, `user_password`, `user_state`, `user_district`, `user_address`, `user_description`,`user_image`) VALUES ('$userName','$userCnic','$userGender','$userMobile','$userReferenceName','$userReferenceNo','$userEmail','$userPassword','$userState','$userDistrict','$userAddress','$userDescription','$image')";

	$result = mysqli_query($conn, $sql);
    
	if($result){
        $msg = '<div class="col-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Thanks!</strong> For Joining <strong>DLS</strong> Please login Now.
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
    <title>User Registration</title>
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
                                        <h3 class="">New User Registration</h3>
                                        <p>Already have an account? <a href="login.php" class="text-secondary">Login
                                                here</a>
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
                                            <div class="col-md-4">
                                                <label for="userName" class="form-label">Full Name <span
                                                        class="text-danger">*</span> </label>
                                                <input type="text" name="userName" class="form-control" id="userName">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="userCnic" class="form-label">Cnic <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="userCnic" id="userCnic">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="userGender" class="form-label">Gender <span
                                                        class="text-danger">*</span></label>
                                                <select id="userGender" name="userGender" class="form-select">
                                                    <option selected>Choose...</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>

                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="userMobile" class="form-label">Moible No. <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="userMobile" class="form-control"
                                                    id="userMobile" placeholder="+923001234567">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="userReferenceName" class="form-label">Reference Name</label>
                                                <input type="text" class="form-control" name="userReferenceName"
                                                    id="userReferenceName">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="userReferenceNo" class="form-label">Reference No</label>
                                                <input type="text" class="form-control" name="userReferenceNo"
                                                    id="userReferenceNo">
                                            </div>
                                            <div class="col-6">
                                                <label for="userEmail" class="form-label">Email Address <span
                                                        class="text-danger">*</span></label>
                                                <input type="email" class="form-control" name="userEmail" id="userEmail"
                                                    placeholder="example@user.com">
                                            </div>

                                            <div class="col-6">
                                                <label for="userPassword" class="form-label">Password <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0"
                                                        name="userPassword" id="userPassword"
                                                        placeholder="Enter Password"> <a href="javascript:;"
                                                        class="input-group-text bg-transparent"><i
                                                            class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="userState" class="form-label">State <span
                                                        class="text-danger">*</span></label>
                                                <select id="userState" name="userState" class="form-select">
                                                    <option selected>Choose...</option>
                                                    <option value="Punjab">Punjab</option>
                                                    <option value="Sindh">Sindh</option>
                                                    <option value="Balochistan">Balochistan</option>
                                                    <option value="KPK">KPK</option>
                                                    <option value="Fedral Area">Fedral Area</option>
                                                    <option value="Azad Kashmir">Azad Kashmir</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="userDistrict" class="form-label">District<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="userDistrict"
                                                    id="userDistrict">
                                            </div>
                                            <div class="col-12">
                                                <label for="userAddress" class="form-label">Address <span
                                                        class="text-danger">*</span></label>
                                                <textarea class="form-control" name="userAddress" id="userAddress"
                                                    cols="30" rows="2"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <label for="userDescription" class="form-label">Description <span
                                                        class="text-danger">*</span></label>
                                                <textarea class="form-control" name="userDescription"
                                                    id="userDescription"
                                                    placeholder="Write few words about your case..." cols="150"
                                                    rows="2"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <label for="userDescription" class="form-label">Client Image <span
                                                        class="text-danger">*</span></label>
                                                        <input type="file" name="image" >
                                              
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