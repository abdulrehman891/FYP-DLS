<?php 

include('includes/connection.php');

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
                <div class="card border-top border-0 border-4 border-dark">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0 text-dark">UPDATE PROVINCE</h5>
                        </div>
                        <hr>
                        <?php
                        $id=$_GET['upid'];
                        $sql1="SELECT * FROM province WHERE `pro_id`='$id'";
                        $run1=mysqli_query($conn,$sql1);
                        $fet1=mysqli_fetch_array($run1); 
                        ?>

                        <form class="row g-3" id="data">
                            <input type="hidden" class="form-control" name="pro_id" value="<?php echo $fet1['pro_id'];?>">
                           


                            <div class="col-md-12">
                                <label for="inputpolice station" class="form-label">Province <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="province"
                                    value="<?php echo $fet1['province'];?>" id="inputpolice station">
                            </div>

                            <div class="col-12">

                                <button type="submit" id="upda" class="btn btn-dark px-5">Update</button>
                                <a href="province.php" class="btn btn-secondary px-5">Back</a>
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
            url: "./ajax/update_province.php",
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
                    });
                } else if (res == 2) {
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: 'Province has been Updated',
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

                } else if (res == 3) {
                    Swal.fire({
                        toast: true,
                        icon: 'warning',
                        title: 'Province has not been Updated',
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
</script>