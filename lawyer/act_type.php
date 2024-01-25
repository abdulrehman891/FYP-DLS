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
            <h6 class="mb-0 text-uppercase">Act</h6>
            <a href="#" class="d-none d-sm-inline-block shadow-sm" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                <button class="btn btn-sm btn-dark">
                    <i class="fas fa-plus"></i>
                    Add Act
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
                            
                                <th>Act</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php


$sql="SELECT * FROM act"; 
$run=mysqli_query($conn,$sql);

while ($fet=mysqli_fetch_array($run)) {
    ?>
    <tr>
   
    <td><?php echo $fet["act"]; ?></td>
    <td>
        <div class="dropdown">
            <a class="text-first" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-ellipsis-h" style="font-size: 19px"></i>
            </a>
            <ul class="dropdown-menu shadow animated--fade-in"
                aria-labelledby="dropdownMenuButton1">
                <li>
                    <a class="dropdown-item" href="./update_act.php?upid=<?php echo $fet['act_id']; ?>">
                        <i class="fas fa-pencil-alt"></i>
                        Edit
                    </a>
                </li>
                <li>
                    <a class="dropdown-item delete" data-id="<?php echo $fet['act_id']; ?>">
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
                <h5 class="modal-title" id="exampleModalLabel">Add act</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="data">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="inputAct" class="form-label">Act <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="act" id="inputAct">
                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="Add" id="subm" class="btn btn-dark"></button>
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



<?php include('./includes/footer.php'); ?>
<script>



// /////ADD////////
$("#subm").on("click", function(g) {
    g.preventDefault();
    // alert("ok");
    var formdata = new FormData(data);
    $.ajax({
        url: "./ajax/add_Act.php",
        method: "POST",
        contentType: false,
        processData: false,
        data: formdata,
        success: function(res) {
            if (res == 1) {
                Swal.fire({
                    toast: true,
                    icon: 'success',
                    title: 'Act has been added',
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
                    title: 'Act has not been added',
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
});




// //////DELETE//////////////
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
                url: './ajax/delete_Act.php',
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
                            title: 'Act has been deleted',
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
                            title: 'Act has not been deleted',
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
</script>