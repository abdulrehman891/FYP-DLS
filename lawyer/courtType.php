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
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0 text-uppercase">Court Types</h6>
            <a class="d-none d-sm-inline-block shadow-sm" data-bs-toggle="modal" data-bs-target="#Add_Court_Type">
                <button class="btn btn-sm btn-dark">
                    <i class="fas fa-plus"></i>
                    Add Court Type
                </button>
            </a>
        </div>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered example2">
                        <thead>
                            <tr>

                                <th>Province</th>
                                <th>District</th>
                                <th>Tehsil</th>
                                <th>Court</th>
                                <th>Court Type</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php


$sql="SELECT * FROM court_type INNER JOIN province ON `court_type`.province_c_type=`province`.pro_id INNER JOIN district ON `court_type`.district_c_type=`district`.dc_id INNER JOIN tehsil ON `court_type`.tehsil_id=`tehsil`.th_id INNER JOIN court ON `court_type`.court_id=`court`.cou_id "; 
$run=mysqli_query($conn,$sql);

while ($fet=mysqli_fetch_array($run)) {
    ?>
                            <tr>
                                <td><?php echo $fet["province"]; ?></td>
                                <td><?php echo $fet["district"]; ?></td>
                                <td><?php echo $fet["th_name"]; ?></td>
                                <td><?php echo $fet["cou_name"]; ?></td>
                                <td><?php echo $fet["cotype"]; ?></td>


                                <td>
                                    <div class="dropdown">
                                        <a class="text-first" type="button" id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h" style="font-size: 19px"></i>
                                        </a>
                                        <ul class="dropdown-menu shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a type="button" class="dropdown-item "
                                                    
                                                    href="update_court_type.php?upid=<?php echo $fet['coid']; ?>">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a type="button" class="dropdown-item delete" data-id="<?php echo $fet['coid']; ?>">
                                                    <i class="fas fa-trash"></i>
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <?php
}
?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>







<!-- Add_Court_Type Start-->

<div class="modal fade" id="Add_Court_Type" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Court</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="data">
                    <div class="row">
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
                            <label for="inputProvince" class="form-label">District</label>
                            <select id="inputProvince" name="district" class="form-select district">

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
                            <label for="inputCourtType" class="form-label">Add Court Type<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="ctype" id="inputCourtType">
                        </div>
                        <div class="modal-footer">
                            <input type="submit" id="subm" value="Add" class="btn btn-dark"></button>
                            <input type="submit" value="Close" class="btn btn-secondary"
                                data-bs-dismiss="modal"></button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Add_Court_Type End-->

<!--end page wrapper -->

<?php include('includes/footer.php'); ?>

<script>

// //////INSERT///////////

$(document).ready(function() {
    $("#subm").on("click", function(g) {
        g.preventDefault();
        var formdata = new FormData(data);
        alert(formdata);
        $.ajax({
            url: "./ajax/court_typeajax.php",
            method: "POST",
            contentType: false,
            processData: false,
            data: formdata,
            success: function(res) {
                // alert(res);

                if (res == 1) {
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: 'Court type has been added',
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
                    // window.location.href = "./addClient.php";
                } else if (res == 2) {
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: 'Court type has not been added',
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
                    alert("error");
                }
            }

        })
    })

})


// //////DELETE///////

$(document).on('click', '.delete', function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var tid = $(this).data("id");
            var msg = this;

            $.ajax({
                url: './ajax/delete_court_type.php',
                type: 'POST',
                data: {
                    id: tid
                },
                // data: {
                //     key: 'delpos',
                //     delid: id,
                // },
                success: function(result) {

                    if (result == 1) {
                        Swal.fire({
                            toast: true,
                            icon: 'success',
                            title: 'Record has been deleted',
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
                        $(msg).closest("tr").fadeOut();
                    } else if (result == 2) {
                        ({
                            toast: true,
                            icon: 'warning',
                            title: 'Record has not been deleted',
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
                        // Swal.fire(
                        //     'Warning!',
                        //     'Your file has not been deleted.',
                        //     'warning'
                        // )
                    } else {
                        alert("Error");
                    }

                }
            });
        }
    })
})



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