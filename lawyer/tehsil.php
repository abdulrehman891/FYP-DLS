
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
            <h6 class="mb-0 text-uppercase">Tehsil</h6>
            <a href="addCourtType.php" class="d-none d-sm-inline-block shadow-sm" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                <button class="btn btn-sm btn-dark">
                    <i class="fas fa-plus"></i>
                    Add Tehsil
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
                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

include('../includes/connection.php');

$sql="SELECT * FROM `tehsil` INNER JOIN `province` ON `tehsil`.th_province=`province`.pro_id INNER JOIN `district` ON `tehsil`.th_district=`district`.dc_id "; 
$run=mysqli_query($conn,$sql);
$output="";
while ($fet=mysqli_fetch_array($run)) {
    ?>
    
    <tr>
                              
    <td><?php echo $fet["province"]; ?></td>
    <td><?php echo $fet["district"]; ?></td>
    <td><?php echo $fet["th_name"]; ?></td>
                                
                                
                                <td>
                                    <div class="dropdown">
                                        <a class="text-first" type="button" id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h" style="font-size: 19px"></i>
                                        </a>
                                        <ul class="dropdown-menu shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a type="button" class="dropdown-item " href="update_tehsil.php?upid=<?php echo $fet['th_id']; ?>">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a type="button" class="dropdown-item delete" data-id="<?php echo $fet['th_id']; ?>">
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







<!-- Modal Start-->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tehsil</h5>
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
                            <label for="inputdistrict" class="form-label">District</label>
                            <select id="inputdistrict" name="district" class="form-select district">

                                <option value=""> Select District</option>

                            </select>
                        </div>
                      
                        <div class="col-md-12">
                            <label for="inputTehsil" class="form-label">Add Tehsil<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="tehsil" id="inputTehsil">
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
<!-- Modal End-->








<!--end page wrapper -->

<?php include('includes/footer.php'); ?>


<script>

// //////INSERT///////////

$(document).ready(function() {
    $("#subm").on("click", function(g) {
        g.preventDefault();
        var formdata = new FormData(data);
       
        $.ajax({
            url: "./ajax/add_tehsil_ajax.php",
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
                            title: 'Tehsil has been added',
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
                            title: 'Tehsil has not been added',
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

});


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
                url: './ajax/delete_tehsil.php',
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
                            title: 'Tehsil been deleted',
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
                    } else if(result == 2) {
                        ({
                            toast: true,
                            icon: 'warning',
                            title: 'Tehsil not been deleted',
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
                    }
                    else{
                        alert("Error");
                    }

                }
            });
        }
    })
   })



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