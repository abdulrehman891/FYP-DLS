<?php
  include("./includes/connection.php");  
  if (!isset($_SESSION['lawyer_email'])) {
    header('Location:lawyerLogin.php');
} 

//   if (empty($_SESSION['admin_email'])) {
//     header('Location:./index.php');
// }
include('./includes/header.php');
?>


<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <?php
	// include('./includes/sidebar.php');
	?>
        <!--end sidebar wrapper -->
        <!--start header -->
        <?php
        // include('./includes/navbar.php');
        ?>
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    

                </div>
                <!--end breadcrumb-->


                <h6 class="mb-0 text-uppercase">User Role</h6>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Access</th>
                                        <th>Action</th>
                                        

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $lawyer_id=$_SESSION['lawyer_id'];
                                $sql="SELECT * FROM `user_manegment_role_access` WHERE `lawyer_key`='$lawyer_id' ";
                                $run=mysqli_query($conn,$sql);
 
                                while ($fet=mysqli_fetch_array($run)) {
	?>
                                    <tr>
                                        <td><?php echo $fet['name']; ?></td>
                                        <td><?php echo $fet['access']; ?></td>
                                        <td>
                                    <div class="dropdown">
                                        <a class="text-first" type="button" id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h" style="font-size: 19px"></i>
                                        </a>
                                        <ul class="dropdown-menu shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a type="button" class="dropdown-item" href="./update_user_role.php?upid=<?php echo $fet['r_id']; ?>">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a type="button" class="dropdown-item dell" data-id="<?php echo $fet['r_id']; ?>">
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
                                <tfoot>
                                   
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">Copyright © 2021. All right reserved.</p>
        </footer>
    </div>
    <!--end wrapper-->
    <!--start switcher-->
    <?php
	// include('./includes/themecustom.php');
	?>
    <!--end switcher-->
    <!-- Bootstrap JS -->
    <?php
include('./includes/footer.php')
	?>
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>
    <script>
    $(document).ready(function() {
        var table = $('#example2').DataTable({
            lengthChange: false,
            "dom": 'Bfrtip',
            "buttons": [ {  
                    extend: 'copy',  
                    className: 'btn rounded-0',  
                    text: '<i class="fas fa-copy"></i> Copy'  
                }, 
               
                {  
                    extend: 'excel',  
                    className: 'btn rounded-0',  
                    text: '<i class="fas fa-file-excel"></i> Excel'  
                },  
                {  
                    extend: 'pdf',  
                    className: 'btn rounded-0',  
                    text: '<i class="fas fa-file-pdf"></i> Pdf'  
                },  
                {  
                    extend: 'csv',  
                    className: 'btn rounded-0',  
                    text: '<i class="fas fa-file-csv"></i> CSV'  
                },  
                {  
                    extend: 'print',  
                    className: 'btn rounded-0',  
                    text: '<i class="fas fa-print"></i> Print'  
                }  
            ]
        });

        table.buttons().container()
            .appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
    </script>




    <script>
   
   

    // ///////DELETE////////
    $(document).on('click', '.dell', function() {
        


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
                    url: './ajax/delete_user_role.php',
                    type:'POST',
                    data: {
                        id: tid
                    },
                    success: function(result) {
                        

                        if (result == 1) {
                            Swal.fire({
                                toast: true,
                                icon: 'success',
                                title: 'Role has been deleted',
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
                            $(msg).closest("tr").fadeOut();
                        } else if (result == 2) {
                            ({
                                toast: true,
                                icon: 'warning',
                                title: 'Role has not been deleted',
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
                            alert("Error");
                        }

                    }
                });
            }
        })
    });
    </script>
    <!--app JS-->