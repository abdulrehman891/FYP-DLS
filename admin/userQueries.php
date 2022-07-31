<?php 
define('TITLE', 'User Queries');
include('includes/header.php'); ?>

<?php 
// DELETE Button Clicked
if(isset($_REQUEST['delete'])){
  $queryId = $_REQUEST['queryId'];
  $sql = "DELETE FROM query WHERE query_id='$queryId'";
  $result = mysqli_query($conn, $sql);
  if($result){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Okaay!</strong> Query has been deleted.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';  
  }
}


// Answered Button Clicked
if(isset($_REQUEST['answered'])){
  $queryId = $_REQUEST['queryId'];
  $sql = "UPDATE query SET replied = 1 WHERE query_id = '$queryId' ";
  $result = mysqli_query($conn, $sql);
  if($result){
      $msg =  '
      <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
          <strong >Okay!</strong> Status Changed!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
  }
}


?>

<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0 text-uppercase">User Quries</h6>
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
                <th>Query ID</th>
                <th>User Name</th>
                <th>User Mobile</th>
                <th>User Email</th>
                <th>Message</th>
                <th>Replied</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            <?php 
            $sql = "SELECT * FROM query";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
           
            ?>

              <tr>
                <td scope="row"><?php echo $row['query_id'] ?></td>
                <td><?php echo $row['query_sender_name'] ?></td>
                <td><?php echo $row['query_sender_mobile'] ?></td>
                <td><?php echo $row['query_sender_email'] ?></td>
                <td><?php echo $row['query_message'] ?></td>

                <td>
                  <?php
                  if($row['replied'] == 0) {echo '<span class="badge bg-danger">No</span>';}
                  else {echo '<span class="badge bg-success">Yes</span>';}
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
                          <a href="https://wa.me/<?php echo $row['query_sender_mobile'] ?>" class="dropdown-item">
                          <i class="fa-brands fa-whatsapp"></i>
                            Whatsapp
                          </a>
                      </li>
                      
                      <li>
                          <a href="mailto:<?php echo $row['query_sender_email'] ?>" class="dropdown-item">
                          <i class="fa-solid fa-at"></i>
                            Email
                          </a>
                      </li>

                      <li class="<?php if($row['replied'] == 1) echo 'd-none' ?>">
                        <form action="" method="get">
                          <input type="hidden" name="queryId" value="<?php echo $row['query_id'] ?>">

                          <button type="submit" name="answered" class="dropdown-item">
                          <i class="fas fa-check"></i>
                            Answered
                          </button>
                        </form>
                      </li>

                     

                      <li>
                        <form action="" method="get">
                          <input type="hidden" name="queryId" value="<?php echo $row['query_id'] ?>">
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
