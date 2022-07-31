<?php 
define('TITLE', 'Appointments');
include('includes/header.php'); ?>


<?php 
// DELETE Button Clicked
if(isset($_REQUEST['delete'])){
  $appointmentId = $_REQUEST['appointmentId'];
  $sql = "DELETE FROM appointment WHERE appointment_id='$appointmentId'";
  $result = mysqli_query($conn, $sql);
  if($result){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Okaay!</strong> Appointment has been deleted.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';  
  }
}

// IF Cancel Button clicked
if(isset($_REQUEST['cancel'])){
  $appointmentId = $_REQUEST['appointmentId'];
  $sql = "UPDATE appointment SET appointment_status = -1 WHERE appointment_id = '$appointmentId' ";
  $result = mysqli_query($conn, $sql);
  if($result){
      $msg =  '
      <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
          <strong >Okay!</strong> Appointment has been Canceled!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
  }
}




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


    <?php
    if(isset($msg)) echo $msg;
    ?>

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
            $lawyerId = $_SESSION['lawyer_id'];
            $sql = "SELECT * FROM appointment WHERE lawyer_id = '$lawyerId'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
            ?>

              <tr>
                <td scope="row"><?php echo $row['appointment_id'] ?></td>
                <td><?php echo $row['client_name'] ?></td>
                <td><?php echo $row['client_mobile_no'] ?></td>
                <td><?php echo $row['appointment_date'] ?></td>
                <td><?php echo $row['appointment_time'] ?></td>
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
                                        


                      <li class="<?php if($row['appointment_status'] == 0 || $row['appointment_status'] == 1) echo 'd-none' ?>">
                        <a class="dropdown-item" href="https://wa.me/<?php echo $row['client_mobile_no'] ?>?text=*Appointment%20Scheduled%20On*%0ADate : *<?php echo $row['appointment_date'] ?>* Time : *<?php echo $row['appointment_time'] ?>* has%20been%20*Canceled*">
                          <i class="fas fa-bell"></i>
                          Notify
                        </a>
                      </li>



                      <li class="<?php if($row['appointment_status'] == -1 || $row['appointment_status'] == 1) echo 'd-none' ?>">
                        <a class="dropdown-item" href="https://wa.me/<?php echo $row['client_mobile_no'] ?>?text=*Next%20Appointment*%0ADate : *<?php echo $row['appointment_date'] ?>* Time : *<?php echo $row['appointment_time'] ?>*%0A%0A Note: %0A *<?php echo $row['appointment_note'] ?>*">
                          <i class="fas fa-bell"></i>
                          Notify
                        </a>
                      </li>

                      <li class="<?php if($row['appointment_status'] == -1 || $row['appointment_status'] == 1) echo 'd-none' ?>">
                        <form action="" method="get">
                          <input type="hidden" name="appointmentId" value="<?php echo $row['appointment_id'] ?>">

                          <button type="submit" name="cancel" class="dropdown-item">
                          <i class="fa-solid fa-xmark"></i>
                            Cancel
                          </button>
                        </form>
                      </li>


                      <li>
                        <form action="" method="get">
                          <input type="hidden" name="appointmentId" value="<?php echo $row['appointment_id'] ?>">

                          <button type="submit" name="delete" class="dropdown-item">
                            <i class="fas fa-trash"></i>
                            Delete
                          </button>
                        </form>
                      </li>

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
