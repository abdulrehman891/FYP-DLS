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
            <h6 class="mb-0 text-uppercase">Appointments</h6>
            <a href="addAppointment.php" class="d-none d-sm-inline-block shadow-sm">
                <button class="btn btn-sm btn-dark">
                    <i class="fas fa-plus fa-fw"></i>
                    Add Appointment
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
                                <th>No</th>
                                <th>Client Name</th>
                                <th>Mobile</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
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
            $sql = "SELECT * FROM appointment WHERE lawyer_id = '$lawyer_key'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
            ?>

                            <tr>
                                <td scope="row"><?php echo $row['appointment_id']; ?></td>
                                <td><?php echo $row['client_name']; ?></td>
                                <td><?php echo $row['client_mobile_no']; ?></td>
                                <td><?php echo $row['appointment_date']; ?></td>
                                <td><?php echo $row['appointment_time']; ?></td>
                                <td>


                                                            <?php 
                                        // Setting Appointment Status complete if date passed 
                                        $appointmentId = $row['appointment_id'];
                                        if($row['appointment_date'] < date('Y-m-d') && $row['appointment_status'] != -1){
                                          $sql = "UPDATE appointment SET appointment_status = 1 WHERE appointment_id = '$appointmentId'";
                                          mysqli_query($conn, $sql);
                                        }
                                      ?>

                                                            <?php 
                                        if($row['appointment_status'] == -1){
                                          echo '<span class="badge rounded-pill bg-danger">Canceled</span></td>';
                                        }
                                        elseif($row['appointment_status'] == 0){
                                          echo '<span class="badge rounded-pill bg-info">In Progress</span></td>';
                                        } else{
                                          echo '<span class="badge rounded-pill bg-success">Completed</span></td>';
                                        }
                                        
                                        ?>
                                </td>

                                <td>
                                    <div class="dropdown">
                                        <a class="text-first" type="button" id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h" style="font-size: 19px"></i>
                                        </a>
                                        <ul class="dropdown-menu shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuButton1">



                                            <li
                                                class="<?php if($row['appointment_status'] == 0 || $row['appointment_status'] == 1) echo 'd-none' ?>">
                                                <a class="dropdown-item"
                                                    href="https://wa.me/<?php echo $row['client_mobile_no'] ?>?text=*Appointment%20Scheduled%20On*%0ADate : *<?php echo $row['appointment_date'] ?>* Time : *<?php echo $row['appointment_time'] ?>* has%20been%20*Canceled*" target="_blank">
                                                    <i class="fas fa-bell"></i>
                                                    Notify
                                                </a>
                                            </li>



                                            <li
                                                class="<?php if($row['appointment_status'] == -1 || $row['appointment_status'] == 1) echo 'd-none' ?>">
                                                <a class="dropdown-item"
                                                    href="https://wa.me/<?php echo $row['client_mobile_no'] ?>?text=*Next%20Appointment*%0ADate : *<?php echo $row['appointment_date'] ?>* Time : *<?php echo $row['appointment_time'] ?>*%0A%0A Note: %0A *<?php echo $row['appointment_note'] ?>*" target="_blank">
                                                    <i class="fas fa-bell"></i>
                                                    Notify
                                                </a>
                                            </li>

                                            <li
                                                class="<?php if($row['appointment_status'] == -1 || $row['appointment_status'] == 1) echo 'd-none' ?>">
                                                <a class="dropdown-item cancel"
                                                    data-id2="<?php echo $row['appointment_id']; ?>"><i class="fa-solid fa-xmark"></i>
                                                        Cancel
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="dropdown-item delete"
                                                    data-id="<?php echo $row['appointment_id']; ?>"><i
                                                        class="fas fa-trash"></i>
                                                    Delete
                                                </a>

                                            </li>

                                            <!-- <li>
                                                <form action="" method="get">
                                                    <input type="hidden" name="appointmentId"
                                                        value="<?php echo $row['appointment_id'] ?>">

                                                    <button type="submit" name="delete" class="dropdown-item">
                                                        <i class="fas fa-trash"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </li> -->

                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>

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

  // //////Cancel Appointment//////////////
$(document).on('click', '.cancel', function() {
     
     var tid2 = $(this).data("id2");          
     var msg = this;

     $.ajax({
         url: './ajax/cancel_appointment.php',
         type: 'POST',
         data: {
             id2: tid2
         },
         
         success: function(result) {

             if (result == 1) {
                 Swal.fire({
                     toast: true,
                     icon: 'success',
                     title: 'Client request has been canceled',
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
                //  $(msg).closest("tr").fadeOut();
               load();
                 
             } else if (result == 2) {
                Swal.fire ({
                     toast: true,
                     icon: 'warning',
                     title: 'Client request has not been canceled',
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


});



function load()
{
setTimeout("window.open('./appointments.php','_self');", 3000);
}


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
                url: './ajax/delete_appoinment.php',
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
                            title: 'Appointment has been deleted',
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
                            title: 'Appointment has not been deleted',
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
