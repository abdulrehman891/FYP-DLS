<?php

include('./includes/connection.php');

if (!isset($_SESSION['lawyer_email'])) {
    header('Location:lawyerLogin.php');
} 


// if (empty($_SESSION['admin_email'])) {
//     header('Location:admin_login.php');
// }





include('./includes/header.php');
?>


<body>
    <!--wrapper-->
    <div class="wrapper">
        <?php
        // include('./includes/sidebar.php');
        ?>
        <!--end sidebar wrapper -->
        <!--start header -->
        <?php
        // include('./includes/navbar.php')
        ?>
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Forms</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Form Layouts</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <div class="btn">
                            <a href="./view_role.php" type="button" class="btn btn-primary">View</a>

                        </div>
                    </div>
                </div>
                <!--end breadcrumb-->
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <h6 class="mb-0 text-uppercase">Role Form</h6>
                        <hr />
                        <div class="card border-top border-0 border-4 border-primary">
                            <div class="card-body p-5">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                    </div>
                                    <h5 class="mb-0 text-primary">User Role</h5>
                                </div>
                                <hr>
                                <form id="data">
                                    <div class="row g-3">



                                        <div style="margin: 0px auto;" class="col-md-8 mt-2">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" placeholder="Enter Name...." name="uname"
                                                class="form-control" id="name">
                                        </div>
                                        <div style="margin: 0px auto;" class="col-md-8 mt-2">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="uemail" class="form-control" id="email">
                                        </div>
                                        <div style="margin: 0px auto;" class="col-md-8 mt-2">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="upass" class="form-control" id="password">
                                        </div>
                                        <div style="margin: 0px auto;" class="col-md-8 mt-2">
                                            <label for="cpass" class="form-label">Conferm password</label>
                                            <input type="php" name="ucpass" class="form-control" id="cpass">
                                        </div>
                                        <div style="margin: 0px auto;" class="col-md-8 mt-2">
                                            <label for="role" class="form-label">Select Role </label>
                                            <select class="inp form-control" name="urole" id="role">
                                                <option value="">Select Access</option>
                                                <?php
                                            $lawyer_id=$_SESSION['lawyer_id'];
                                                $sql="SELECT * FROM `user_manegment_role_access` WHERE `lawyer_key`='$lawyer_id'";
                                                $run=mysqli_query($conn,$sql);
                                                while ($fet=mysqli_fetch_array($run)) {
                                                    ?>

                                                <option value="<?php echo $fet['r_id'] ; ?>">
                                                    <?php echo $fet['name'] ; ?></option>
                                                <?php
                                            }
                                                
                                                ?>
                                            </select>

                                        </div>
                                        <div style="margin: 0px auto;" class="col-md-8 mt-5">
                                            <button type="submit" id="sub" name="sub"
                                                class="form-control btn btn-primary mb-3 px-5">Add</button>
                                        </div>

                                    </div>
                                </form>

                                <!--  -->

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
    <!--end page wrapper -->
    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
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

    <script src="./includes/JQUERY/jquery.js"></script>

    <?php
    include('./includes/footer.php')
    ?>
    <script>
    $(document).on("click", "#sub", function(g) {
        g.preventDefault();
        var formdata = new FormData(data);
        

        $.ajax({
            url: "./ajax/add_user_access.php",
            type: "POST",
            contentType: false,
            processData: false,
            data: formdata,
            success: function(responce) {
                

                if (responce == 1) {
                    Swal.fire({
                        toast: true,
                        icon: 'warning',
                        title: 'Plz fill all fields',
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
                } else if (responce == 2) {

                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: 'User roll has been added',
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
                    $('form').trigger("reset");
                } else if (responce == 3) {
                    Swal.fire({
                        toast: true,
                        icon: 'warning',
                        title: 'User roll has not been added',
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
    })
    </script>