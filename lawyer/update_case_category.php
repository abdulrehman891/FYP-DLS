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
                            <h5 class="mb-0 text-dark">UPDATE CASE CATEGORY</h5>
                        </div>
                        <hr>
                        <?php
                        $id=$_GET['upid'];
                        $sql="SELECT * FROM `case_category` WHERE `case_id`='$id'"; 
                        $run=mysqli_query($conn,$sql);
                        $fet1=mysqli_fetch_array($run); 
                        ?>

                        <form class="row g-3" id="data">
                        <input type="hidden" class="form-control" name="case_id" value="<?php echo $fet1['case_id'];?>">
						<div class="col-md-12">
                            <label for="inputcasetype" class="form-label">Case Type</label>
                            <select id="inputcasetype" name="casetype" class="form-select">
                                <option value="">Select Case type</option>
                                <?php

$sql1="SELECT * FROM case_type";
$run1=mysqli_query($conn,$sql1);
while ($fet=mysqli_fetch_array($run1)) {
	?>
                                <option value="<?php echo $fet{'case_id'};  ?>"> <?php echo $fet{'case_type'};  ?>
                                </option>
                                <?php
}
?>


                            </select>
                        </div>
                        

                        <div class="col-md-12">
                            <label for="inputcasecategory" class="form-label">Case Category <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="casecategory" value="<?php echo $fet1['case_category'];?>" class="form-control" id="inputcasecategory">
                        </div>

                            <div class="col-12">
                             
                                <button type="submit" id="upda" class="btn btn-dark px-5">Update</button>
                                <a href="case_category.php" class="btn btn-secondary px-5">Back</a>
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
            url: "./ajax/update_case_category.php",
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
                } 
                else if (res == 2) {
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: 'Case category has been Updated',
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
                        title: 'Case category has not been Updated',
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