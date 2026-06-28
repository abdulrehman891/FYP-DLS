<?php 
define('TITLE', 'User Feedbacks');
include('includes/header.php'); ?>

<?php 
// DELETE Button Clicked
if(isset($_REQUEST['delete'])){
  $feedbackId = $_REQUEST['feedbackId'];
  $sql = "DELETE FROM feedback WHERE feedback_id='$feedbackId'";
  $result = mysqli_query($conn, $sql);
  if($result){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Okaay!</strong> Feedback has been deleted.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';  
  }
}


// Approve Button Clicked
if(isset($_REQUEST['approve'])){
  $feedbackId = $_REQUEST['feedbackId'];
  $sql = "UPDATE feedback SET feedback_status = 1 WHERE feedback_id = '$feedbackId' ";
  $result = mysqli_query($conn, $sql);
  if($result){
      $msg =  '
      <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
          <strong >Ok!</strong> Feedback Has been Approved Successfully!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
  }
}


// Disapprove Button Clicked
if(isset($_REQUEST['disapprove'])){
  $feedbackId = $_REQUEST['feedbackId'];
  $sql = "UPDATE feedback SET feedback_status = 0 WHERE feedback_id = '$feedbackId' ";
  $result = mysqli_query($conn, $sql);
  if($result){
      $msg =  '
      <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
          <strong >Ok!</strong> Feedback Has been Disapproved Successfully!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
  }
}


?>

<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0 text-uppercase">User Feedbacks</h6>
      <!-- <a href="addTask.php" class="d-none d-sm-inline-block shadow-sm">
        <button class="btn btn-sm btn-primary">
          <i class="fas fa-plus"></i>
          Add Task
        </button>
      </a> -->
    </div>
    <hr />


    <?php if(isset($msg)) echo $msg ?>


    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example2" class="table table-striped table-bordered example2">
            <thead>
              <tr>
                <th>Feedback ID</th>
                <th>User ID</th>
                <th>Feedback</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            <?php 
            $sql = "SELECT * FROM feedback";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
           
            ?>

              <tr>
                <td scope="row"><?php echo $row['feedback_id'] ?></td>
                <td><?php echo $row['user_id'] ?></td>
                <td><?php echo $row['feedback_message'] ?></td>

                <td>
                  <?php
                  if($row['feedback_status'] == 0) {echo '<span class="badge bg-info">Waiting</span>';}
                  else {echo '<span class="badge bg-success">Approved</span>';}
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
                                       

                      <li class="<?php if($row['feedback_status'] == 1) echo 'd-none' ?>">
                        <form action="" method="get">
                          <input type="hidden" name="feedbackId" value="<?php echo $row['feedback_id'] ?>">

                          <button type="submit" name="approve" class="dropdown-item">
                          <i class="fas fa-check"></i>
                            Approve
                          </button>
                        </form>
                      </li>

                      <li class="<?php if($row['feedback_status'] == 0) echo 'd-none' ?>">
                        <form action="" method="get">
                          <input type="hidden" name="feedbackId" value="<?php echo $row['feedback_id'] ?>">

                          <button type="submit" name="disapprove" class="dropdown-item">
                          <i class="fas fa-xmark"></i>
                            Disapprove
                          </button>
                        </form>
                      </li>



                      <li>
                        <form action="" method="get">
                          <input type="hidden" name="feedbackId" value="<?php echo $row['feedback_id'] ?>">

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
