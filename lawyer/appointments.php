<?php include('includes/header.php'); ?>

<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0 text-uppercase">Appointments</h6>
      <a href="addAppointment.php" class="d-none d-sm-inline-block shadow-sm">
        <button class="btn btn-sm btn-primary">
          <i class="fas fa-plus"></i>
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
                      <li>
                        <a class="dropdown-item" href="#">
                          <i class="fas fa-eye"></i>
                          view
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">
                          <i class="fas fa-pencil-alt"></i>
                          edit
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">
                          <i class="fas fa-trash"></i>
                          delete
                        </a>
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
