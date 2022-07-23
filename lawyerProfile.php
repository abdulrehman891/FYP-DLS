
<?php 
define("TITLE", "Lawyers");
define("PAGE", "Lawyers");
include('includes/header.php'); 

// Starting Session
if(!isset($_SESSION)){
    session_start();
}

// Visit only if User login
if(!isset($_SESSION['user_email'])){
    header('Location: user/login.php');
}
?>



<?php 

// Hire button Clicked
if(isset($_REQUEST['hire'])){
    $userId = $_REQUEST['userId'];
    $lawyerId = $_REQUEST['lawyerId'];

    $sql = "SELECT * FROM user WHERE user_id = '$userId'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $userName = $row['user_name'];
    $userMobile = $row['user_mobile'];
    $userEmail = $row['user_email'];
    $userAddress = $row['user_address'];
    $userDescription = $row['user_description'];

    $sql = "INSERT INTO client(client_id , lawyer_id , client_name, client_email, client_mobile, client_address, client_description) VALUES ('$userId', '$lawyerId', '$userName', '$userEmail', '$userMobile', '$userAddress', '$userDescription')";
    $result = mysqli_query($conn, $sql);

    $msg = '<div class="alert alert-info alert-dismissible fade show text-center" role="alert">
    <strong>Thanks!</strong> Your Request has been sent to specified lawyer.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    

}


// Show Profle data
$lawyerEmail = $_REQUEST['lawyerEmail'];
$sql = "SELECT * FROM lawyer WHERE lawyer_email = '$lawyerEmail' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


?>

    <!-- Banner Start -->
    <div class="bg-first w-100 d-flex align-items-center justify-content-center" style="min-height: 250px;">

        <div class="img-overl"></div>

        <h1 class="text-white display-3"><strong><?php echo $row['lawyer_fname']. ' '. $row['lawyer_lname'] ?></strong>'s Profile</h1>

    </div>
    <!-- Banner End -->

    <!-- Lawyer Profile Start -->
    <div class="container-fluid p-5">

    
<!-- start page wrapper -->



<div class="page-wrapper">
    <div class="page-content">
        <div class="container">


            <?php if(isset($msg)){ echo $msg;} ?>


            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="assets/images/lawyers/<?php echo $row['lawyer_image'] ?>" alt="Admin" class="rounded-circle p-1" width="110">
                                    <div class="mt-3">
                                        <h4><?php echo $row['lawyer_fname']. ' '. $row['lawyer_lname'] ?></h4>
                                        <p class="text-secondary mb-1"><?php echo $row['lawyer_spec'] ?></p>
                                        <p class="text-muted font-size-sm"><?php echo $row['lawyer_address'] ?></p>
                                        <a href="https://wa.me/3020006566?" class="btn btn-grey">Message</a>
                                        <a href="tel:+923020006566" class="btn btn-outline-dark">Call</a>
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
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-dark"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                                        <span class="text-secondary"><?php echo $row['lawyer_twitter'] ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-dark"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                                        <span class="text-secondary"><?php echo $row['lawyer_instagram'] ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-dark"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                                        <span class="text-secondary"><?php echo $row['lawyer_facebook'] ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-8">
                        <div class="card shadow p-3">
                            <div class="card-body">
                                <form action="" method="post" class="">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class=" mb-0">Lawyer Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="lawyerFirstName" class="form-control-plaintext" value="<?php echo $row['lawyer_fname']. ' ' . $row['lawyer_lname']  ?>" readonly readonly>
                                        </div>
                                    </div> <hr class="">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Education</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="lawyerEducation"  class="form-control-plaintext" value="<?php echo $row['lawyer_edu'] ?>" readonly>
                                        </div>
                                    </div> <hr>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Specialization</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="lawyerSpecialization"  class="form-control-plaintext" value="<?php echo $row['lawyer_spec'] ?>" readonly>
                                        </div>
                                    </div> <hr>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Experience</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="lawyerExperience" class="form-control-plaintext" value="<?php echo $row['lawyer_exp'] ?>" readonly>
                                        </div>
                                    </div> <hr>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Law Firm</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text"  name="lawyerLawFirmName" class="form-control-plaintext" value="<?php echo $row['lawyer_lfname'] ?>" readonly>
                                        </div>
                                    </div> <hr>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">License No</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="lawyerLicense"  class="form-control-plaintext" value="<?php echo $row['lawyer_license'] ?>" readonly>
                                        </div>
                                    </div> <hr>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="lawyerPhone"  class="form-control-plaintext" value="<?php echo $row['lawyer_phone'] ?>" readonly>
                                        </div>
                                    </div> <hr>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="lawyerAddress"  class="form-control-plaintext" value="<?php echo $row['lawyer_address'] ?>" readonly>
                                        </div>
                                    </div> <hr>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Desciption</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control-plaintext" name="lawyerDescription" id="lawyerDescription" cols="150" rows="2"  readonly><?php echo $row['lawyer_description'] ?></textarea>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <a href="<?php echo 'javascript:history.go(-1)' ?>"  name="back" class="btn btn-dark px-4" >Back</a>
                                            
                                            
                                            <input type="hidden" name="userId" value="<?php echo $_SESSION['user_id'] ?>">
                                            <input type="hidden" name="lawyerId" value="<?php echo $row['lawyer_id'] ?>">


                                            <button type="submit" name="hire" class="btn btn-outline-dark px-4" 
                                            
                                            <?php
                                            $lawyerId = $row['lawyer_id'];
                                            $userId = $_REQUEST['userId'];
                                            $sql = "SELECT * FROM client WHERE client_id = '$userId' AND lawyer_id = '$lawyerId' ";
                                            $result = mysqli_query($conn, $sql);
                                            if(mysqli_num_rows($result) == 1){
                                                echo "disabled";
                                            }
                                            ?>

                                            
                                            > Hire<?php if(mysqli_num_rows($result) == 1){
                                                echo "d"; }?> </button>
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

         
    </div>
    <!-- Lawyer Profile End -->

<?php 

include('includes/footer.php'); ?>