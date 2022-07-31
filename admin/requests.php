<?php 
define('TITLE', 'Lawyer Requests');
include('includes/header.php'); ?>



<?php

// If approve Clicked - start
if(isset($_REQUEST['approve'])){
    // SQL 
    $lawyer_id = $_REQUEST['lawyer_id'];
    $sql = "UPDATE lawyer SET lawyer_status = 1 WHERE lawyer_id = '$lawyer_id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong >Congratulation!</strong> Handshake Successful!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else{
        $msg = '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        <strong >Ohh!</strong> System is not responding!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}

// If approve Clicked - end

// if delete clicked - start

if(isset($_REQUEST['delete'])){
    $lawyer_id = $_REQUEST['lawyer_id'];
    $sql = "DELETE FROM lawyer WHERE lawyer_id = $lawyer_id ";
    $result = mysqli_query($conn, $sql);
    if($result){
        $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong >Request Lawyer!</strong> has been deleted!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    } else {
        $msg = '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        <strong >Unable!</strong> to delete, System is not responding!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}

// if delete clicked - end



?>







<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0 text-uppercase">Requested Lawyers</h6>
      <!-- <a href="addTask.php" class="d-none d-sm-inline-block shadow-sm">
        <button class="btn btn-sm btn-primary">
          <i class="fas fa-plus"></i>
          Add Task
        </button>
      </a> -->
    </div>
    <hr />


    <?php
    if(isset($msg)) {echo $msg;}
    ?>
    



    <div class="row d-flex " id="myDIV">


    <?php
    // Lawyer Card View
    $sql = "SELECT * FROM lawyer WHERE lawyer_status = 0";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){

    ?>


        <div class="col-md-4 my-4 mycard">
            <div mx-auto="" class="card mx-auto" style="width: 18rem;">
                <img src="../lawyer/assets/images/lawyers/<?php echo $row['lawyer_image'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['lawyer_fname']." ". $row['lawyer_lname'] ?></h5>
                    <p class="text-muted"><?php echo $row['lawyer_spec'] ?></p>
                    <p class="card-text"><?php echo $row['lawyer_description'] ?></p>
                </div>
                <div class="card-footer">
                    <form action="" method="GET" class="d-inline">
                        <input type="hidden" name="lawyer_id" value="<?php echo $row['lawyer_id'] ?>">
                        <button type="submit" name="approve" class="btn btn-outline-dark mx-auto">Approve</button>
                        <button type="submit" name="delete" class="btn btn-danger mx-auto">Delete</button>
                    </form>

                    <form action="lawyerProfile.php" method="GET" class="d-inline">
                        <input type="hidden" name="lawyer_id" value="<?php echo $row['lawyer_id'] ?>">
                        <button type="submit" name="details" class="btn btn-dark">Details</button>
                    </form>
                </div>
            </div>
        </div>


        <?php
         }
        ?>

        
           
    </div>


  </div>
</div>
<!--end page wrapper -->

<?php include('includes/footer.php'); ?>
