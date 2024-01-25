<?php include('includes/connection.php');

if (!isset($_SESSION['lawyer_email'])) {
    header('Location:lawyerLogin.php');
} 


                               


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
                            <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Update Client</h5>
                        </div>
                        <hr>
                        <?php
$clientid = $_GET['upid'];

$lawyer_key = $_SESSION['lawyer_id'];
if ($_SESSION['user'] == 'USER') {
                                

$sql1 = "SELECT * FROM `lawyer_user_access` WHERE `user_access_id`= '$lawyer_key'";
$result1 = mysqli_query($conn, $sql1);
$row = mysqli_fetch_assoc($result1);
$lawyer_key=$row['lawer_key'];

}

 $sql = "SELECT * FROM client WHERE `lawyer_id`='$lawyer_key' and client_id = $clientid";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_array($result);
?>

                        <form class="row g-3" id="data">
                            <input type="hidden" class="form-control" name="clientid"
                                value="<?php echo $row['client_id'];?>" id="clientid">
                            <div class="col-md-4">
                                <label for="clientName" class="form-label">Full Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="clientName"
                                    value="<?php echo $row['client_name'];?>" id="clientName">
                            </div>
                            <div class="col-md-4">
                                <label for="clientCnic" class="form-label">Cnic <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="clientCnic"
                                    value="<?php echo $row['client_cnic'];?>" id="clientCnic" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="clientGender" class="form-label">Gender <span
                                        class="text-danger">*</span></label>
                                <select id="clientGender" name="clientGender" class="form-select">
                                    <option selected>Choose...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>

                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="clientMobile" class="form-label">Mobile No. <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="clientMobile"
                                    value="<?php echo $row['client_mobile'];?>" id="clientMobile">
                            </div>
                            <div class="col-md-4">
                                <label for="clientReferenceName" class="form-label">Reference Name</label>
                                <input type="text" class="form-control" name="clientReferenceName"
                                    value="<?php echo $row['client_reference_name'];?>" id="clientReferenceName">
                            </div>

                            <div class="col-md-4">
                                <label for="clientReferenceNo" class="form-label">Reference No</label>
                                <input type="text" class="form-control" name="clientReferenceNo"
                                    value="<?php echo $row['client_reference_no'];?>" id="clientReferenceNo">
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <label for="clientEmail" class="form-label">Email <span
                                        class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="clientEmail"
                                    value="<?php echo $row['client_email'];?>" id="clientEmail" readonly>
                            </div>
                            <div class="col-md-2"></div>

                            <!-- <div class="col-md-6">
										<label for="clientPassword" class="form-label">Password <span class="text-danger">*</span></label>
										<input type="password" class="form-control" name="clientPassword" id="clientPassword" >
									</div> -->
                            <div class="col-md-6">

                                <label for="clientState" class="form-label">State <span
                                        class="text-danger">*</span></label>
                                <select id="clientState" name="clientState" class="form-select province">
                                    <option selected>Select</option>
                                    <?php
                        $sql="SELECT * FROM province"; 
                        $run=mysqli_query($conn,$sql);


                                while ($fet=mysqli_fetch_array($run)) {
                                    ?>
                                    <option value="<?php echo $fet['pro_id'];  ?>"><?php echo $fet['province'];  ?>
                                    </option>

                                    <?php
                                }
                                ?>

                                </select>
                            </div>

                            <div class="col-md-6">
                            <label for="inputdistrict" class="form-label">District</label>
                            <select id="inputdistrict" name="district" class="form-select district">

                                <option value=""> Select District</option>

                            </select>
                        </div>
                            <div class="col-12">
                                <label for="clientAddress" class="form-label">Address <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" name="clientAddress" value="" id="inputAddress"
                                    placeholder="Address..." rows="3"><?php echo $row['client_address'];?></textarea>
                            </div>

                            <div class="col-12">
                                <label for="clientDescription" class="form-label">Description <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" name="clientDescription" value="" id="inputDescription"
                                    placeholder="Description..."
                                    rows="3"><?php echo $row['client_description'];?></textarea>
                            </div>

                            <input type="hidden" class="form-control" name="date"
                                value="<?php echo $row['date_created'];?>" id="clientid">



                            <div class="col-12">
                                <button type="submit" id="upda" class="btn btn-primary px-5">Upadate</button>
                                <a href="<?php echo 'javascript:history.go(-1)' ?>"
                                    class="btn btn-secondary px-5">Back</a>
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
            url: "./ajax/update_client.php",
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
                        title: 'Client has been Updated',
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
                        title: 'Client has not been Updated',
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
        });


        
        
    })
});





////////////    // 
   $('.province').on("change", function() {
    var value = $(this).val();
    $.ajax({
        url: "./ajax/dropdown_tehsil.php",
        method: "POST",
        data: {
            d_id: value
        },
        success: function(res) {
            
            $('.district').html(res);
        }
    })

})
</script>