<?php include('includes/header.php'); ?>



<?php

// Show Profle data
$lawyerId = $_REQUEST['lawyer_id'];
$sql = "SELECT * FROM lawyer WHERE lawyer_id = '$lawyerId' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);




// If approve Clicked - start
// if(isset($_REQUEST['approve'])){
//     // SQL 
//     // $lawyer_id = $_REQUEST['lawyer_id'];
//     $sql = "UPDATE lawyer SET lawyer_status = 1 WHERE lawyer_id = '$lawyerId'";
//     $result = mysqli_query($conn, $sql);
//     if($result){
//         header('Location: javascript:history.go(-1)');
//         $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
//         <strong >Congratulation!</strong> Handshake Successful!
//         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//         </div>';
//     }
//     else{
//         $msg = '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
//         <strong >Ohh!</strong> System is not responding!
//         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//         </div>';
//     }
// }

// If approve Clicked - end

// if delete clicked - start

if(isset($_REQUEST['delete'])){
    $lawyer_id = $_REQUEST['lawyer_id'];
    $sql = "DELETE FROM lawyer WHERE lawyer_id = $lawyer_id ";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('Location: requests.php');
        $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong >Request Lawyer!</strong> has been deleted!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    } else {
        $msg = '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        <strong >Unable!</strong> to delete, System is not responding!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}

// if delete clicked - end



?>







    
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
                                <form action="" method="GET" class="">
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
                                            <a href="<?php echo 'javascript:history.go(-1)'?> "  name="back" class="btn btn-dark px-4" >Back</a>
                                            <!-- <button type="submit" name="approve" class="btn btn-outline-dark px-4 <?php if($row['lawyer_status'] == 1) echo 'd-none' ?>" >Approve </button> -->
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
