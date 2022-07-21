<?php include('includes/header.php'); ?>



<?php
// IF Approve clicked
if(isset($_REQUEST['approve'])){
    $lawyerId = $_REQUEST['lawyer_id'];
    $sql = "UPDATE lawyer SET lawyer_status = 1 WHERE lawyer_id = '$lawyerId' ";
    $result = mysqli_query($conn, $sql);
    if($result){
        $msg =  '
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong >Congratulation!</strong> Lawyer has been Approved!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
}



// IF Dispprove clicked
if(isset($_REQUEST['disapprove'])){
    $lawyerId = $_REQUEST['lawyer_id'];
    $sql = "UPDATE lawyer SET lawyer_status = 0 WHERE lawyer_id = '$lawyerId' ";
    $result = mysqli_query($conn, $sql);
    if($result){
        $msg =  '
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong >Congratulation!</strong> Lawyer has been Dispproved!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
}



// IF Block clicked
if(isset($_REQUEST['block'])){
    $lawyerId = $_REQUEST['lawyer_id'];
    $sql = "UPDATE lawyer SET lawyer_status = 2 WHERE lawyer_id = '$lawyerId' ";
    $result = mysqli_query($conn, $sql);
    if($result){
        $msg =  '
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong >Okaaay!</strong> Lawyer has been Blocked!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
}



// IF Delete clicked
if(isset($_REQUEST['delete'])){
    $lawyerId = $_REQUEST['lawyer_id'];
    $sql = "DELETE FROM lawyer WHERE lawyer_id = '$lawyerId' ";
    $result = mysqli_query($conn, $sql);
    if($result){
        $msg =  '
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong >Okaaay!</strong> Lawyer has been Deleted Successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
}

?>




<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0 text-uppercase">Lawyers List</h6>
      <!-- <a href="addAppointment.php" class="d-none d-sm-inline-block shadow-sm">
        <button class="btn btn-sm btn-primary">
          <i class="fas fa-plus"></i>
          Add Appointment
        </button>
      </a> -->
    </div>
    <hr />


    <?php if(isset($msg)) echo $msg; ?>

    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example2" class="table table-striped table-bordered example2">
            <thead>
              <tr>
                <th>Lawyer ID</th>
                <th>Lawyer Name</th>
                <th>Mobile</th>
                <th>Specialization</th>
                <th>Experience</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            
            <?php 
            // Showing Lawyers
            $sql = "SELECT * FROM lawyer";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
            
            ?>
                <tr>
                    <td scope="row"><?php echo $row['lawyer_id'] ?></td>
                    <td><?php echo $row['lawyer_fname']. ' '. $row['lawyer_lname'] ?></td>
                    <td><?php echo $row['lawyer_phone'] ?></td>
                    <td><?php echo $row['lawyer_spec'] ?></td>
                    <td><?php echo $row['lawyer_exp'] ?></td>
                    <td><?php 
                    if($row['lawyer_status'] == 0) echo "Disapproved";
                    elseif($row['lawyer_status'] == 1) echo "Approved";
                    else echo "Blocked";
                    ?></td>

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
                                <form action="lawyerProfile.php
                                " method="get">
                                <input type="hidden" name="lawyer_id" value="<?php echo $row['lawyer_id'] ?>">
                                <input type="hidden" name="lawyer_status" value="<?php echo $row['lawyer_status'] ?>">
                                <button type="submit" class="dropdown-item" href="#">
                                <i class="fas fa-eye"></i>
                                View
                                </button>
                            </form>
                            </li>


                            <li class="<?php if($row['lawyer_status'] == 1) echo 'd-none' ?>">
                            <form action="" method="get">
                                <input type="hidden" name="lawyer_id" value="<?php echo $row['lawyer_id'] ?>">
                                <button type="submit" name="approve" class="dropdown-item">
                                <i class="fas fa-check"></i>
                                Approve
                                </button>
                            </form>
                            </li>


                            <li class="<?php if($row['lawyer_status'] == 0) echo 'd-none' ?>">
                            <form action="" method="get">
                                <input type="hidden" name="lawyer_id" value="<?php echo $row['lawyer_id'] ?>">

                                <button type="submit" name="disapprove" class="dropdown-item">
                                <i class="fa-solid fa-xmark"></i>
                                 Disapprove
                                </button>
                            </form>
                            </li>



                            <li class="<?php if($row['lawyer_status'] == 2) echo 'd-none' ?>">
                            <form action="" method="get">
                                <input type="hidden" name="lawyer_id" value="<?php echo $row['lawyer_id'] ?>">

                                <button type="submit" name="block" class="dropdown-item">
                                <i class="fas fa-ban"></i>
                                Block
                                </button>
                            </form>
                            </li>



                            <li>
                            <form action="" method="get">
                                <input type="hidden" name="lawyer_id" value="<?php echo $row['lawyer_id'] ?>">

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
