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
                            <h5 class="mb-0 text-dark">Update Court Type</h5>
                        </div>
                        <hr>
                        <?php
                        $id=$_GET['upid'];
                        $sql="SELECT * FROM `court_type` WHERE `coid`='$id'"; 
                        $run=mysqli_query($conn,$sql);
                        $fet1=mysqli_fetch_array($run); 
                        ?>

                        <form class="row g-3" id="data">
                        <input type="hidden" class="form-control" name="co_id" value="<?php echo $fet1['coid'];?>">
						<div class="col-md-12">
                            <label for="inputProvince" class="form-label">Province</label>
                            <select id="inputProvince" name="province" class="form-select  province">
                                <option value="">Select Province</option>
                                <?php

$sql1="SELECT * FROM province";
$run1=mysqli_query($conn,$sql1);
while ($fet=mysqli_fetch_array($run1)) {
	?>
                                <option value="<?php echo $fet{'pro_id'};  ?>"> <?php echo $fet{'province'};  ?>
                                </option>
                                <?php
}
?>


                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="inputdistrict" class="form-label">District</label>
                            <select id="inputdistrict" name="district" class="form-select district">

                                <option value=""> Select District</option>

                            </select>
                        </div>
                        
                        <div class="col-md-12">
                            <label for="inputtehsil" class="form-label">Tehsil</label>
                            <select id="inputtehsil" name="tehsil" class="form-select tehsil">

                                <option value=""> Select Tehsil</option>

                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="inputProvince" class="form-label">Court</label>
                            <select id="inputProvince" name="court" class="form-select court">

                                <option value=""> Select Court</option>

                            </select>
                        </div>

                      
                        <div class="col-md-12">
                            <label for="inputCourt Name" class="form-label">Court Type <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="court_type" value="<?php echo $fet1['cotype'];?>" id="inputCourt Name">
                        </div>

                            <div class="col-12">
                             
                                <button type="submit" id="upda" class="btn btn-dark px-5">Update</button>
                                <a href="courtType.php" class="btn btn-secondary px-5">Back</a>
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
            url: "./ajax/update_court_type.php",
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
                        title: 'Court type has been Updated',
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
                        title: 'Court type has not been Updated',
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




// ONCHANG DROPDOWN VALUE




$('.province').on("change", function() {
    var value1 = $(this).val();

    $.ajax({
        url: "./ajax/dropdown_court_type.php",
        method: "POST",
        data: {
            d_id1: value1
        },
        success: function(res) {

            $('.district').html(res);
        }
    })

})
$('.district').on("change", function() {
    var value2 = $(this).val();

    $.ajax({
        url: "./ajax/dropdown_court_type.php",
        method: "POST",
        data: {
            d_id2: value2
        },
        success: function(res) {

            $('.tehsil').html(res);
        }
    })

})

$('.tehsil').on("change", function() {
    var value3 = $(this).val();

    $.ajax({
        url: "./ajax/dropdown_court_type.php",
        method: "POST",
        data: {
            d_id3: value3
        },
        success: function(res) {

            $('.court').html(res);
        }
    })

});

</script>