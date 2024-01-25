<?php include('includes/connection.php');

if (!isset($_SESSION['lawyer_email'])) {
    header('Location:lawyerLogin.php');
} 


                               


include('includes/header.php'); 

?>





<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div style="margin: 60px auto;" class="row">
            <div class="col-xl-9 mx-auto">
                <div class="card border-top border-0 border-4 border-dark">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-center">
                            
                        </div>
                        <h5 class="mb-0 text-dark">Role Addition</h5>
                    </div>
                    <hr>
                    <?php

$id=$_GET['upid'];
$sq="SELECT * FROM `user_manegment_role_access` WHERE `r_id`='$id'";
$ru=mysqli_query($conn,$sq);
$fe=mysqli_fetch_array($ru);
?>
                    <form id="data">
                        <div class="row g-3">



                            <div style="margin: 0px auto;" class="col-md-8 mt-2">

                                <input type="hidden" name="rid" value="<?php echo $fe['r_id'];?>" class="form-control"
                                    id="roll">
                                <input type="hidden" name="lid" value="<?php echo $fe['lawyer_key'];?>"
                                    class="form-control" id="roll">


                                <label for="roll" class="form-label">Name</label>
                                <input type="text" placeholder="Enter Name...." name="rname"
                                    value="<?php echo $fe['name'];?>" class="form-control" id="roll">
                            </div>
                            <div style="margin: 0px auto;" class="col-md-8 mt-2">
                                <label for="" class="form-label">Select Access </label>
                                <select class="inp form-control" name="access" value="<?php echo $fe['access'];?>"
                                    onchange="show();" name="raccess" id="access">
                                    <option value="">Select Access</option>
                                    <option value="all">All</option>
                                    <option value="custom">Custom</option>

                                </select>

                            </div>
                            <div style="margin: 0px auto;display:none;" class="col-md-8 mt-2" id="custom_field">

                                <input type="checkbox" name="lawyer" value="lawyer">Lawyer
                                <br><input type="checkbox" name="clients" value="<?php echo $fe['client'];?>">Clients
                                <br><input type="checkbox" name="case" value="<?php echo $fe['casee'];?>">Case
                                <br><input type="checkbox" name="appoinment" value="<?php echo $fe['appoinment'];?>">Appoinment
                                <br><input type="checkbox" name="team_member" value="<?php echo $fe['team_member'];?>">Team Member
                                <br><input type="checkbox" name="tasks" value="<?php echo $fe['task'];?>">Tasks
                                <br><input type="checkbox" name="setting" value="<?php echo $fe['setting'];?>">Setting
                                <br><input type="checkbox" name="user" value="<?php echo $fe['user'];?>">User
                                <!-- <br><input type="checkbox" name="user" value="user">User
                                            <br> -->

                            </div>
                            <div style="margin: 20px 135px;" class="col-12" >
                             
                             <button type="submit" id="upda" class="btn btn-dark px-5">Update</button>
                             <a href="view_role.php" class="btn btn-secondary px-5">Back</a>
                         </div>

                        </div>
                    </form>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <!--  -->
                    <script>
                    function show() {
                        var access = document.getElementById("access");
                        var custom = document.getElementById("custom_field");
                        custom.style.display = access.value == "custom" ?
                            `block` : `none`;
                    }
                    </script>
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
$(document).ready(function() {
    $("#upda").on("click", function(g) {
        g.preventDefault();
        alert("ok");
        var formdata = new FormData(data);
        alert(data);
        $.ajax({

            url: "./ajax/update_user_role.php",
            type: "POST",
            contentType: false,
            processData: false,
            data: formdata,
            success: function(res) {
                alert(res);
                alert(res);
                if (res == 1) {
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

                } else if (res == 2) {
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: 'Roll has been Updated',
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
                    window.location = "./view_role.php";
                    // header("Location:./view_role.php");
                } else if (res == 3) {
                    Swal.fire({
                        toast: true,
                        icon: 'warning',
                        title: 'Roll has not been Updated',
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
})
</script>