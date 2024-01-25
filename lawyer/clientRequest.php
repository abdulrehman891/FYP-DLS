<?php include('includes/connection.php'); 

if (!isset($_SESSION['lawyer_email'])) {
  header('Location:lawyerLogin.php');
} 

?>
<?php include('includes/header.php'); ?>





<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0 text-uppercase">Clients Requests</h6>
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
                <th>User ID</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Address</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>


            <?php
            // Select Requested Users
            $lawyer_key = $_SESSION['lawyer_id'];
            if ($_SESSION['user'] == 'USER') {
                                            
            
            $sql1 = "SELECT * FROM `lawyer_user_access` WHERE `user_access_id`= '$lawyer_key'";
              $result1 = mysqli_query($conn, $sql1);
              $row = mysqli_fetch_assoc($result1);
              $lawyer_key=$row['lawer_key'];
              
            }
            $sql = "SELECT * FROM client WHERE lawyer_id = $lawyer_key AND is_assign = 0 ";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){

            
            ?>

              <tr>
                <td scope="row"><?php echo $row ['client_id'] ?></td>
                <td><?php echo $row['client_name'] ?></td>
                <td><?php echo $row['client_mobile'] ?></td>
                <td><?php echo $row['client_email'] ?></td>
                <td><?php echo $row['client_address'] ?></td>
                <td><?php echo $row['client_description'] ?></td>
           

                <td>
                  <div class="dropdown">
                    <a
                      class="text-first"
                      type="button"
                      id="dropdownMenuButton1"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                      <i class="fa fa-ellipsis-h" style="font-size: 19px"></i>
                    </a>
                    <ul
                      class="dropdown-menu shadow animated--fade-in"
                      aria-labelledby="dropdownMenuButton1"
                    >
                    <li>
            <a class="dropdown-item accept" data-id2="<?php echo $row['client_id']; ?>">
                <i class="fa-solid fa-check"></i>
                Accept
            </a>
        </li>
        <li>
            <a class="dropdown-item delete" data-id="<?php echo $row['client_id']; ?>">
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
<!--end page wrapper -->

<?php include('includes/footer.php'); ?>
<script>


// //////Accept Client Request//////////////
$(document).on('click', '.accept', function() {
     
            var tid = $(this).data("id2");          
            var msg = this;

            $.ajax({
                url: './ajax/accept_client_request.php',
                type: 'POST',
                data: {
                    id: tid
                },
                
                success: function(result) {

                    if (result == 1) {
                        Swal.fire({
                            toast: true,
                            icon: 'success',
                            title: 'Client request has been accepted',
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
                       Swal.fire ({
                            toast: true,
                            icon: 'warning',
                            title: 'Client request has not been accepted',
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
                         Swal.fire ({
                            toast: true,
                            icon: 'warning',
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
                url: './ajax/delete_client_request.php',
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
                            title: 'Client request been deleted',
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
                      Swal.fire({
                            toast: true,
                            icon: 'warning',
                            title: 'Client request not been deleted',
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
