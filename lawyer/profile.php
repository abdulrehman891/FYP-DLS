<?php include('includes/header.php'); ?>


<?php

// if save button clicked
if(isset($_REQUEST['save'])){
    $lawyerFirstName=mysqli_real_escape_string($conn,$_POST['lawyerFirstName']);
	$lawyerLastName=mysqli_real_escape_string($conn,$_POST['lawyerLastName']);
	$lawyerEducation=mysqli_real_escape_string($conn,$_POST['lawyerEducation']);
	// $lawyerSpec=mysqli_real_escape_string($conn,$_POST['lawyerSpec']);
	$lawyerExperience=mysqli_real_escape_string($conn,$_POST['lawyerExperience']);
    $lawyerEmail = $_SESSION['lawyer_email'];
	$lawyerPassword=mysqli_real_escape_string($conn,$_POST['lawyerPassword']);
	$lawyerLawFirmName=mysqli_real_escape_string($conn,$_POST['lawyerLawFirmName']);
	$lawyerPhone=mysqli_real_escape_string($conn,$_POST['lawyerPhone']);
	$lawyerDescription=mysqli_real_escape_string($conn,$_POST['lawyerDescription']);
	$lawyerAddress=mysqli_real_escape_string($conn,$_POST['lawyerAddress']);
	// $lawyerImage=$_FILES['lawyerImage']['name'];






    // if any empty field
	if ($lawyerFirstName == "" || $lawyerLastName == "" || $lawyerEducation == "" || $lawyerExperience == "" ||  $lawyerPassword == "" ||  $lawyerDescription == "" || $lawyerPhone==""|| $lawyerAddress == "") {

        $msg = '<div class="col-12">
                    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                    <strong>Please!</strong> Fill All Fields.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>';

	}
    else{
        // Update Data
        
        $sql = "UPDATE lawyer SET lawyer_fname = '$lawyerFirstName' , lawyer_lname = '$lawyerLastName', lawyer_edu = '$lawyerEducation', lawyer_exp = '$lawyerExperience', lawyer_lfname = '$lawyerLawFirmName', lawyer_pass = '$lawyerPassword', lawyer_phone = '$lawyerPhone', lawyer_description = '$lawyerDescription', lawyer_address= '$lawyerAddress' WHERE lawyer_email = '$lawyerEmail' ";
        $result = mysqli_query($conn, $sql);
        if($result){
            $msg = '<div class="col-12">
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>Changes!</strong> Saved!.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>';
        }
    }
}



// IF update (Social Media) button clicked
if(isset($_REQUEST['update'])){
    $lawyerTwitter = $_REQUEST['lawyerTwitter'];
    $lawyerFacebook = $_REQUEST['lawyerFacebook'];
    $lawyerInstagram = $_REQUEST['lawyerInstagram'];

    $sql = "UPDATE lawyer SET lawyer_twitter = '$lawyerTwitter', lawyer_facebook = '$lawyerFacebook', lawyer_instagram = '$lawyerInstagram' WHERE lawyer_email = '$lawyerEmail' ";
    $result = mysqli_query($conn, $sql);
    if($result){
        $msg = '<div class="col-12">
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>Congratulation!</strong> Social Media Updated Successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>';
        
    }
}



// Show data
$lawyerEmail = $_SESSION['lawyer_email'];
$sql = "SELECT * FROM lawyer WHERE lawyer_email = '$lawyerEmail' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!-- start page wrapper -->



<div class="page-wrapper">
    <div class="page-content">
        <div class="container">


            <?php if(isset($msg)){ echo $msg;} ?>


            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="assets/images/lawyers/<?php echo $row['lawyer_image'] ?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                    <div class="mt-3">
                                        <h4><?php echo $row['lawyer_fname']. ' '. $row['lawyer_lname'] ?></h4>
                                        <p class="text-secondary mb-1"><?php echo $row['lawyer_spec'] ?></p>
                                        <p class="text-muted font-size-sm"><?php echo $row['lawyer_address'] ?></p>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg> Email</h6>
                                        <span class="text-secondary"><?php echo $row['lawyer_email'] ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"> <i class="fab fa-whatsapp-square fa-lg fa-fw"></i> Whatsapp</h6>
                                        <span class="text-secondary"><?php echo $row['lawyer_phone'] ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                                        <span class="text-secondary"><?php echo $row['lawyer_twitter'] ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                                        <span class="text-secondary"><?php echo $row['lawyer_instagram'] ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                                        <span class="text-secondary"><?php echo $row['lawyer_facebook'] ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-center">Update Social Media</h5>
                                        <hr class="">
                                        <form action="" method="post">

                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" value="<?php echo $row['lawyer_twitter'] ?>" name="lawyerTwitter" id="lawyerTwitter" placeholder="Twitter">
                                                <label for="floatingInput">Twitter</label>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" value="<?php echo $row['lawyer_facebook'] ?>" name="lawyerFacebook" id="lawyerFacebook" placeholder="Facebook">
                                                <label for="floatingInput">Facebook</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" value="<?php echo $row['lawyer_instagram'] ?>" name="lawyerInstagram" id="lawyerInstagram" placeholder="Instagram">
                                                <label for="floatingInput">Instagram</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary" name="update">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">First Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="lawyerFirstName" class="form-control" value="<?php echo $row['lawyer_fname'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Last Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="lawyerLastName"  class="form-control" value="<?php echo $row['lawyer_lname'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Education</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="lawyerEducation"  class="form-control" value="<?php echo $row['lawyer_edu'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Experience</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="lawyerExperience" class="form-control" value="<?php echo $row['lawyer_exp'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Law Firm</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text"  name="lawyerLawFirmName" class="form-control" value="<?php echo $row['lawyer_lfname'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">License No</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="lawyerLicense"  class="form-control" value="<?php echo $row['lawyer_license'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="email" name="lawyerEmail"  class="form-control" value="<?php echo $row['lawyer_email'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="lawyerPassword"  class="form-control" value="<?php echo $row['lawyer_pass'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="lawyerPhone"  class="form-control" value="<?php echo $row['lawyer_phone'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Desciption</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="lawyerDescription"  class="form-control" value="<?php echo $row['lawyer_description'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="lawyerAddress"  class="form-control" value="<?php echo $row['lawyer_address'] ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <button type="submit" name="save" class="btn btn-primary px-4" >Save Changes </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- end page wrapper -->

<?php include('includes/footer.php'); ?>
