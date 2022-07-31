<?php 
define('TITLE', 'Tasks');
include('includes/header.php'); ?>

<?php 
// DELETE Button Clicked
if(isset($_REQUEST['delete'])){
  $taskId = $_REQUEST['taskId'];
  $sql = "DELETE FROM task WHERE task_id='$taskId'";
  $result = mysqli_query($conn, $sql);
  if($result){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Okaay!</strong> Task has been deleted.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';  
  }
}


// Complete Button Clicked
if(isset($_REQUEST['complete'])){
  $taskId = $_REQUEST['taskId'];
  $sql = "UPDATE task SET task_status = 1 WHERE task_id = '$taskId' ";
  $result = mysqli_query($conn, $sql);
  if($result){
      $msg =  '
      <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
          <strong >Nice!</strong> Task has been Completed!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
  }
}


?>

<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0 text-uppercase">Tasks</h6>
      <a href="addTask.php" class="d-none d-sm-inline-block shadow-sm">
        <button class="btn btn-sm btn-dark">
          <i class="fas fa-plus"></i>
          Add Task
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
                <th>Task Name</th>
                <th>Related To</th>
                <th>Start Date</th>
                <th>Deadline</th>
                <th>Members</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            <?php 
            $lawyerId = $_SESSION['lawyer_id'];
            $sql = "SELECT * FROM task WHERE lawyer_id = '$lawyerId'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
           
            ?>

              <tr>
                <td scope="row"><?php echo $row['task_id'] ?></td>
                <td><?php echo $row['task_subject'] ?></td>
                <td>
                <?php echo $row['client_name'] ?> <br>
                    Case Number : 58989
                </td>
                <td><?php echo $row['task_start_date'] ?></td>
                <td><?php echo $row['task_deadline'] ?></td>
                <td><?php echo $row['task_assign_to'] ?></td>

                <td>
                  <?php
                  if($row['task_priority'] == "urgent") {echo '<span class="badge bg-warning">URGENT</span>';}
                  elseif($row['task_priority'] ==  "high") {echo '<span class="badge bg-info">HIGH</span>';}
                  elseif($row['task_priority'] ==  "medium") {echo '<span class="badge bg-dark">Medium</span>';}
                  else {echo '<span class="badge bg-light text-dark">LOW</span>';}
                  ?>
                </td>

                <?php 
                // Setting Status Deffered if Date is passed
                $taskId = $row['task_id'];
                if(date("Y-m-d") > $row['task_deadline'] && $row['task_status'] != 1){
                  mysqli_query($conn, "UPDATE task SET task_status = -1 WHERE task_id = '$taskId'");
                }
                ?>


                <td>
                  <?php
                  if($row['task_status'] == -1) {echo '<span class="badge bg-danger">Deffered</span>';}
                  elseif($row['task_status'] == 0) {echo '<span class="badge bg-info">In Progress</span>';}
                  else {echo '<span class="badge bg-success">Completed</span>';}
                  ?>
                </td>


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
                        <form action="editTask.php" method="get">
                          <input type="hidden" name="taskId" value="<?php echo $row['task_id'] ?>">
                          <button type="submit" name="edit" class="dropdown-item">
                            <i class="fas fa-pencil-alt"></i>
                            Edit
                          </button>
                        </form>
                      </li>
                    

                      <li class="<?php if($row['task_status'] == -1 || $row['task_status'] == 1) echo 'd-none' ?>">
                        <form action="" method="get">
                          <input type="hidden" name="taskId" value="<?php echo $row['task_id'] ?>">

                          <button type="submit" name="complete" class="dropdown-item">
                          <i class="fas fa-check"></i>
                            Complete
                          </button>
                        </form>
                      </li>


                      <li class="<?php if($row['task_status'] == 1 || $row['task_status'] == -1) echo 'd-none' ?>">
                        <a class="dropdown-item" href="https://wa.me/3020006566?text=*Task*%20:%20<?php echo $row['task_subject']?>%0A*Description*%20:%20<?php echo $row['task_description']?>%0A*Client%20Name*%20:%20<?php echo $row['client_name']?>%0A*Case%20Number*%20:%20484834%0A*Deadline*%20:%<?php echo $row['task_deadline']?>">
                          <i class="fas fa-bell"></i>
                          Notify
                        </a>
                      </li>
                   
                      <li class="<?php if($row['task_status'] == -1 || $row['task_status'] == 0) echo 'd-none' ?>">
                        <a class="dropdown-item" href="https://wa.me/3020006566?text=*Task Stauts*:Completed%0A*Task*%20:%20<?php echo $row['task_subject']?>%0A*Description*%20:%20<?php echo $row['task_description']?>%0A*Client%20Name*%20:%20<?php echo $row['client_name']?>%0A*Case%20Number*%20:%20484834%0A*Deadline*%20:%<?php echo $row['task_deadline']?>">
                          <i class="fas fa-bell"></i>
                          Notify
                        </a>
                      </li>

                      <li class="<?php if($row['task_status'] == 0 || $row['task_status'] == 1) echo 'd-none' ?>">
                        <a class="dropdown-item" href="https://wa.me/3020006566?text=*Task Stauts* : Not Completed - Deadline Passed%0A*Task*%20:%20<?php echo $row['task_subject']?>%0A*Description*%20:%20<?php echo $row['task_description']?>%0A*Client%20Name*%20:%20<?php echo $row['client_name']?>%0A*Case%20Number*%20:%20484834%0A*Deadline*%20:%<?php echo $row['task_deadline']?>">
                          <i class="fas fa-bell"></i>
                          Notify
                        </a>
                      </li>



                      <li>
                        <form action="" method="get">
                          <input type="hidden" name="taskId" value="<?php echo $row['task_id'] ?>">

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
