<?php
include("includes/connection.php");
if (!isset($_SESSION['lawyer_email'])) {
    header('Location:lawyerLogin.php');
} 
 $id=$_GET['upid'];
 
$sql="SELECT * FROM `add_case` WHERE `add_case_id`='$id' ";
$run=mysqli_query($conn,$sql);
$fet1=mysqli_fetch_array($run);


include('includes/header.php'); 





?>



<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div>
                                <!-- <i class="bx bxs-user me-1 font-22 text-primary"></i>
                                     -->
                            </div>
                            <h5 class="mb-0 text-primary">Update Case</h5>
                        </div>
                        <hr>
                        <form id="data" class="row g-3">
                            
                        <input type="hidden" name="add_case_id" value="<?php echo $fet1['add_case_id'];?>" class="form-control" id="inputpetitioner">
                        <div class="col-md-4">
                                <label for="inputclientname" class="form-label">Client Name</label>
                                <select id="inputclientname" name="clientname" class="form-select  clientname">
                                    <option value="">Select</option>
                                    <?php
                                //    $lawyerid=$_SESSION['lawyer_id'];
                                $lawyer_key = $_SESSION['lawyer_id'];
                            if ($_SESSION['user'] == 'USER') {
                                                            
                            
                            $sql1 = "SELECT * FROM `lawyer_user_access` WHERE `user_access_id`= '$lawyer_key'";
                              $result1 = mysqli_query($conn, $sql1);
                              $row = mysqli_fetch_assoc($result1);
                              $lawyer_key=$row['lawer_key'];
                                                                
                                                                }

                                    $sql="SELECT * FROM client WHERE lawyer_id='$lawyer_key' and is_assign=1";
                                    $run=mysqli_query($conn,$sql);
                                    while ($fet=mysqli_fetch_array($run)) {
                                        ?>
                                    <option value="<?php echo $fet{'client_id'};  ?>">
                                        <?php echo $fet{'client_name'};  ?></option>
                                    <?php
                                    }
                                    ?>


                                </select>
                            </div>


                            <div class="col-md-4">
                                <label for="inputcnic" class="form-label">Cnic</label>
                                <select id="inputcnic" name="cnic" class="form-select cnic">

                                    <option> Select Cnic</option>



                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="inputclientmobile" class="form-label">Client mobile</label>
                                <select id="inputclientmobile" name="clientmobile" class="form-select clientmobile">

                                    <option> Select Client Mobile</option>



                                </select>
                            </div>
                            <h2 align="center">Case Information</h2>
                            <hr>
                            <!-- <div class="col-md-6">
										<label for="inputState" class="form-label">Party Name</label>
										<select id="inputState" class="form-select">
											<option selected>Choose...</option>
											<option>Petitioner</option>
											<option>Respondent</option>
										</select>
									</div> -->
                                    <h4 align="center">Party Information</h4>
                                    <hr>
                            <div class="col-md-6">
                                <label for="inputpetitioner" class="form-label">Petitioner Name</label>
                                <input type="text" name="petitioner" value="<?php echo $fet1['petitioner_name'];?>" class="form-control" id="inputpetitioner">
                            </div>
                            <div class="col-md-6">
                                <label for="Advocate Name" class="form-label">Advocate Name</label>
                                <input type="text" class="form-control" value="<?php echo $fet1['p_advocate_name'];?>" name="petitioner_advocate"
                                    placeholder="Petitioner Advocate" id="Advocate Name">
                            </div>
                            <div class="col-md-6">
                                <label for="inputRespondent" class="form-label">Respondent Name</label>
                                <input type="text" class="form-control"  name="respondent" value="<?php echo $fet1['respondent_name'];?>" id="inputRespondent">
                            </div>
                            <div class="col-md-6">
                                <label for="Respondent Advocate" class="form-label">Advocate Name</label>
                                <input type="text" class="form-control" name="respondent_advocate" value="<?php echo $fet1['r_advocate_name'];?>" 
                                    placeholder="Respondent Advocate" id="Respondent Advocate">
                            </div>


                            <h4 align="center">Area</h4>
                            <hr>

                            <div class="col-md-4">
                                <label for="inputProvince" class="form-label">Province</label>
                                <select id="inputProvince" name="province" class="form-select  province">
                                    <option value="">Select Province</option>
                                    <?php
include('./includes/connection.php');
$sql1="SELECT * FROM province";
$run1=mysqli_query($conn,$sql1);
while ($fet=mysqli_fetch_array($run1)) {
	?>
                                    <option value="<?php echo $fet['pro_id'];  ?>"> <?php echo $fet['province'];   ?>
                                    </option>
                                    <?php
}
?>


                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="inputDistrict" class="form-label">District</label>
                                <select id="inputDistrict" name="district" class="form-select district">

                                    <option> Select District</option>



                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="inputtehsil" class="form-label">Tehsil</label>
                                <select id="inputtehsil" name="tehsil" class="form-select tehsil">

                                    <option> Select Tehsil</option>



                                </select>
                            </div>
                            <h5 align="center">Court</h5>
                            <hr>
                            <div class="col-md-6">
                                <label for="inputCourt" class="form-label">Court</label>
                                <select id="inputCourt" name="court" class="form-select court">

                                    <option> Select Court</option>



                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputCourtType" class="form-label">Court Type</label>
                                <select id="inputCourtType" name="court_type" class="form-select court_type">
                                    <option> Select Court Type</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputCourtName" class="form-label">Court Name</label>
                                <select id="inputCourtName" name="court_name" class="form-select court_name">

                                    <option> Select Court Name</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputJudge" class="form-label">Judge</label>
                                <input tupe="text" id="inputJudge" name="judge" value="<?php echo $fet1['judge'];?>" class="form-control">
                                    
                            </div>
                            <h5 align="center">Case</h5>
                            <hr>
                            <div class="col-md-4">
                                <label for="inputCase" class="form-label">Case</label>
                                <select id="inputCase" name="case" class="form-select case">
                                    <option value="">Select Case</option>
                                    <?php
include('./includes/connection.php');
$sql6="SELECT * FROM `case_type`";
$run6=mysqli_query($conn,$sql6);
while ($fet=mysqli_fetch_array($run6)) {
	?>
                                    <option value="<?php echo $fet['case_id'];  ?>"> <?php echo $fet['case_type'];  ?>
                                    </option>
                                    <?php
}
?>


                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="inputCasecategory" class="form-label">Case category</label>
                                <select id="inputCasecategory" name="casecategory" class="form-select  casecategory">
                                    <option value="">Select Case category</option>

                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="inputCasesubcategory" class="form-label">Case sub category</label>
                                <select id="inputCasesubcategory" name="casesubcategory"
                                    class="form-select casesubcategory">
                                    <option value="">Select Case Sub category</option>

                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputCaseNumber" class="form-label">Case Number</label>
                                <input type="text" name="case_no" value="<?php echo $fet1['case_number'];?>"  class="form-control" id="inputCaseNumber">
                            </div>
                            <div class="col-md-6">
                                <label for="inputCaseDate" class="form-label">Case Date</label>
                                <input type="date" name="case_date" value="<?php echo $fet1['case_date'];?>"  class="form-control" id="inputCaseDate">
                            </div>

                            <h5 align="center">Registration</h5>
                            <hr>



                            <div class="col-md-6">
                                <label for="inputCNR" class="form-label">CNR/Referance Number</label>
                                <input type="text" name="cnr" value="<?php echo $fet1['cnr'];?>" class="form-control" id="inputCNR">
                            </div>
                            <div class="col-md-6">
                                <label for="inputRegistrationDate" class="form-label">Registration Date</label>
                                <input type="date" class="form-control" value="<?php echo $fet1['registration_date'];?>" name="registration_date"
                                    id="inputRegistrationDate">
                            </div>
                            <h5 align="center">FIR Number</h5>
                            <hr>
                            <div class="col-md-4">
                                <label for="inputPoliceStation" class="form-label">Police Station</label>
                                <select id="inputPoliceStation" name="police_station"
                                    class="form-select  police_station">
                                    <option value="">Select Police Station</option>

                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="inputFIRNumber" class="form-label">FIR Number</label>
                                <input type="text" name="fir_number" value="<?php echo $fet1['fir_number'];?>" class="form-control" id="inputFIRNumber">
                            </div>
                            <div class="col-md-4">
                                <label for="inputFIRYear" class="form-label">FIR Year</label>
                                <input type="date" name="fir_date" value="<?php echo $fet1['fir_date'];?>" class="form-control" id="inputFIRYear">
                            </div>
                            <h5 align="center">Filing Number</h5>
                            <hr>

                            <div class="col-md-6">
                                <label for="inputFileNumber" class="form-label">File Number</label>
                                <input type="text" name="file_no" value="<?php echo $fet1['file_number'];?>" class="form-control" id="inputFileNumber">
                            </div>
                            <div class="col-md-6">
                                <label for="inputFileDate" class="form-label">File Date</label>
                                <input type="date" name="file_date" value="<?php echo $fet1['file_date'];?>" class="form-control" id="inputFileDate">
                            </div>

                            <h5 align="center">ACT</h5>
                            <hr>
                            <div class="col-md-6">
                                <label for="inputActType" class="form-label">Act Type</label>
                                <select id="inputActType" name="act" class="form-select">
                                    <?php
include('./includes/connection.php');
$sql10="SELECT * FROM `act`";
$run10=mysqli_query($conn,$sql10);
while ($fet=mysqli_fetch_array($run10)) {
	?>
                                    <option value="<?php echo $fet['act_id'];  ?>"> <?php echo $fet['act'];  ?></option>
                                    <?php
}
?>

                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="inputUnderSection" class="form-label">Under Section</label>
                                <input type="text" name="under_section" value="<?php echo $fet1['under_section'];?>" class="form-control" id="inputUnderSection">
                            </div>

                            <h5 align="center">Case Hearing</h5>
                            <hr>
                            <div class="col-md-4">
                                <label for="inputLastDate" class="form-label">Last Date</label>
                                <input type="date" name="last_date" value="<?php echo $fet1['last_date'];?>" class="form-control"  id="inputLastDate">
                            </div>
                            <div class="col-md-4">
                                <label for="inputNextDate" class="form-label">Next Date</label>
                                <input type="date" name="Next_date" value="<?php echo $fet1['next_date'];?>" class="form-control" id="inputNextDate">
                            </div>
                            <div class="col-md-4">
                                <label for="inputPurposeOfHearing" class="form-label">Purpose Of Hearing</label>
                                <input type="text" name="purpose" value="<?php echo $fet1['purpose_of_hearing'];?>" class="form-control" id="inputPurposeOfHearing">
                            </div>

                            <div class="col-12">
                                <button type="submit" id="upda" class="btn btn-primary px-5">Save changes</button>
                                <a href="cases.php" class="btn btn-secondary px-5">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</div>
<!--end page wrapper -->





<?php include('includes/footer.php'); ?>


<script>








// //////////UPDATE//////////////
   
$(document).ready(function() {
    $("#upda").on("click", function(g) {
        g.preventDefault();
        var formdata = new FormData(data);   
        
        $.ajax({
            url: "./ajax/update_client_case.php",
            method: "POST",
            contentType: false,
            processData: false,
            data: formdata,
            success: function(res) {
                
                if (res == 1) {
                    Swal.fire({
                        toast: true,
                        icon: 'warning',
                        title: 'Please fill all fields',
                        animation: false,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal
                                .stopTimer)
                            toast.addEventListener('mouseleave', Swal
                                .resumeTimer)

                        }
                    })
                } else if (res == 2) {
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: 'Client case has been Updated',
                        animation: false,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal
                                .stopTimer)
                            toast.addEventListener('mouseleave', Swal
                                .resumeTimer)

                        }
                    })
                    $('form').trigger("reset");
                    // window.location.href = "./case_sub_category.php";
                } else if (res == 3) {
                    Swal.fire({
                        toast: true,
                        icon: 'warning',
                        title: 'Client case has not been Updated',
                        animation: false,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal
                                .stopTimer)
                            toast.addEventListener('mouseleave', Swal
                                .resumeTimer)

                        }
                    })
                } else {
                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: 'System error!',
                        animation: false,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal
                                .stopTimer)
                            toast.addEventListener('mouseleave', Swal
                                .resumeTimer)

                        }
                    })
                }
            }
        })


        
        
    })
})





// //////CNIC/////////

$('.clientname').on("change", function() {
    var value = $(this).val();
    

    $.ajax({
        url: "./ajax/dropdowns_add_case_cnic.php",
        method: "POST",
        data: {
            d_id: value
        },
        success: function(res) {
            // alert(res);
            $('.cnic').html(res);
        }
    })
})

//////MOBILE/////
$('.cnic').on("change", function() {
    var value = $(this).val();
    

    $.ajax({
        url: "./ajax/dropdowns_add_case_cnic.php",
        method: "POST",
        data: {
            d_id2: value
        },
        success: function(res) {
            // alert(res);
            $('.clientmobile').html(res);
        }
    })
})



// ///////////
$('.province').on("change", function() {
    var value = $(this).val();

    $.ajax({
        url: "./ajax/dropdowns_add_case.php",
        method: "POST",
        data: {
            d_id: value
        },
        success: function(res) {

            $('.district').html(res);
        }
    })

})


// ///////////

$('.district').on("change", function() {
    var value2 = $(this).val();


    $.ajax({
        url: "./ajax/dropdowns_add_case.php",
        method: "POST",
        data: {
            d_id2: value2
        },
        success: function(res) {

            $('.tehsil').html(res);
        }
    })

})
// ///////////

$('.tehsil').on("change", function() {
    var value3 = $(this).val();


    $.ajax({
        url: "./ajax/dropdowns_add_case.php",
        method: "POST",
        data: {
            d_id3: value3
        },
        success: function(res) {

            $('.court').html(res);
        }
    })

})



// ///////////

$('.court').on("change", function() {
    var value4 = $(this).val();


    $.ajax({
        url: "./ajax/dropdowns_add_case.php",
        method: "POST",
        data: {
            d_id4: value4
        },
        success: function(res) {

            $('.court_type').html(res);
        }
    })

})

// ///////////

$('.court_type').on("change", function() {
    var value8 = $(this).val();


    $.ajax({
        url: "./ajax/dropdowns_add_case.php",
        method: "POST",
        data: {
            d_id8: value8
        },
        success: function(res) {

            $('.court_name').html(res);
        }
    })

})

// ///////////

$('.tehsil').on("change", function() {
    var value5 = $(this).val();


    $.ajax({
        url: "./ajax/dropdowns_add_case.php",
        method: "POST",
        data: {
            d_id5: value5
        },
        success: function(res) {

            $('.police_station').html(res);
        }
    })

})

// ///////////

$('.case').on("change", function() {
    var value6 = $(this).val();
    

    $.ajax({
        url: "./ajax/dropdowns_add_case.php",
        method: "POST",
        data: {
            d_id6: value6
        },
        success: function(res) {

            $('.casecategory').html(res);
        }
    })

})
// ///////////

$('.casecategory').on("change", function() {
    var value7 = $(this).val();
    

    $.ajax({
        url: "./ajax/dropdowns_add_case.php",
        method: "POST",
        data: {
            d_id7: value7
        },
        success: function(res) {

            $('.casesubcategory').html(res);
        }
    })

})
</script>