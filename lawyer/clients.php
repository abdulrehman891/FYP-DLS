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
            <h6 class="mb-0 text-uppercase">Clients</h6>
            <!-- <a href="addClient.php" class="d-none d-sm-inline-block shadow-sm">
        <button class="btn btn-sm btn-primary">
          <i class="fas fa-plus"></i>
          Add Client
        </button>
      </a> -->
        </div>
        <hr />




        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered example2">
                        <thead>
                            <tr>

                                <th>Client Name</th>
                                <th>Client Cnic</th>
                                <th>Client Gender</th>
                                <th>Client Mobile</th>
                                <th>Reference Name</th>
                                <th>Reference Mobile</th>
                                <th>Client Email</th>
                                <th>Client State</th>
                                <th>Client District</th>
                                <th>Client Address</th>
                                <th>Client Description</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $lawyer_key = $_SESSION['lawyer_id'];
                            if ($_SESSION['user'] == 'USER') {
                                                            
                            
                            $sql1 = "SELECT * FROM `lawyer_user_access` WHERE `user_access_id`= '$lawyer_key'";
                              $result1 = mysqli_query($conn, $sql1);
                              $row = mysqli_fetch_assoc($result1);
                              $lawyer_key=$row['lawer_key'];
                              
                            }


                              $sql2 = "SELECT * FROM client WHERE lawyer_id = '$lawyer_key' AND is_assign = 1";
                              $result2 = mysqli_query($conn, $sql2);
                             
                              while($row = mysqli_fetch_assoc($result2)){
                                  ?>



                            <tr>

                                <td> <?php echo $row["client_name"]; ?> </td>
                                <td> <?php echo $row["client_cnic"]; ?> </td>
                                <td> <?php echo $row["client_gender"]; ?> </td>
                                <td><a href="https://wa.me/ <?php echo $row["client_mobile"]; ?> ">
                                        <?php echo $row["client_mobile"]; ?> </a>
                                </td>
                                <td> <?php echo $row["client_reference_name"]; ?> </td>
                                <td> <?php echo $row["client_reference_no"]; ?> </td>
                                <td> <?php echo $row["client_email"]; ?> </td>
                                <td> <?php echo $row["client_state"]; ?> </td>
                                <td> <?php echo $row["client_city"]; ?> </td>
                                <td> <?php echo $row["client_address"]; ?> </td>
                                <td> <?php echo $row["client_description"]; ?> </td>
                                <td> <?php echo $row["date_created"]; ?> </td>

                                <td>
                                    <div class="dropdown">
                                        <a class="text-first" type="button" id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h" style="font-size: 19px"></i>
                                        </a>
                                        <ul class="dropdown-menu shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuButton1">

                                            <li>
                                                <a class="dropdown-item"
                                                    href="update_client.php?upid=<?php echo $row['client_id']; ?>"><i class="fas fa-pencil-alt"></i>
                                                        Edit
                                                </a>



                                            <li>
                                                <a class="dropdown-item delete"
                                                    data-id="<?php echo $row['client_id']; ?>"><i
                                                        class="fas fa-trash"></i>
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
<!--end page wrapper -->

<?php include('includes/footer.php'); ?>


<script>
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
                url: './ajax/delete_clientajax.php',
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
                            title: 'Client record has been deleted',
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
                            title: 'Client record has not been deleted',
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