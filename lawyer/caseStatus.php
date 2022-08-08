<?php 
define('TITLE', 'Case Status');
include('includes/header.php'); ?>


<?php 

// Add Clicked
if(isset($_REQUEST['add'])){
  $lawyerId = $_SESSION['lawyer_id'];
  $caseStatus = $_REQUEST['caseStatus'];

  // Insert DATA
  $sql = "INSERT INTO casestatus (casestatus_name , lawyer_id) VALUES ('$caseStatus', '$lawyerId')";
  $result = mysqli_query($conn, $sql);
  if($result){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Congratulations!</strong> New Case Status has been added.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
} else{
    $msg = '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
    <strong>Ohh!</strong> System is not responding.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

  }
}



// DELETE Clicked
if(isset($_REQUEST['delete'])){
  $caseStatusId = $_REQUEST['caseStatusId'];
  $sql = "DELETE FROM casestatus WHERE casestatus_id='$caseStatusId'";
  $result = mysqli_query($conn, $sql);
  if($result){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Okaay!</strong> Case Status has been deleted.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';  
  }
}




// UPDATE CLICKED
if(isset($_REQUEST['update'])){
  $caseStatusId = $_REQUEST['caseStatusId'];
  $caseStatusName = $_REQUEST['caseStatusName'];

  $sql = "UPDATE casestatus SET casestatus_name = '$caseStatusName' WHERE casestatus_id = '$caseStatusId'";
  $result = mysqli_query($conn, $sql);
  if($result){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Updated!</strong> Case Status has been changed!.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }

}




?>

<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0 text-uppercase">Case Status</h6>
      <a href="" class="d-none d-sm-inline-block shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <button class="btn btn-sm btn-dark">
          <i class="fas fa-plus"></i>
          Add Case Status
        </button>
      </a>
    </div>
    <hr />



    <?php
    if(isset($msg)) echo $msg;
    ?>
    <div class="alert-msg"></div>
    
    
       



 <!-- ######## Edit form open when edit clicked - Start ########## -->
    
 <?php if(isset($_REQUEST['edit'])){
      $caseStatusId = $_REQUEST['caseStatusId'];
      $sql = "SELECT * FROM casestatus WHERE casestatus_id = '$caseStatusId'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      ?>
      <form class="needs-validation" novalidate>
        <div class="row mb-3">
          <label for="caseStatusName" class="col-auto col-form-label">Case Status</label>
          <div class="col-auto">
            <input type="text"  class="form-control" id="caseStatusName" name="caseStatusName" value="<?php echo $row['casestatus_name'] ?>" pattern="[a-zA-Z\d\.\s]{3,}" required>
            <div class="invalid-feedback">Looks Bad</div>
            <div class="valid-feedback">Looks Good</div>
          </div>
          <input type="hidden" name="caseStatusId" value="<?php echo $caseStatusId ?>">
          <div class="col-auto">
            <button type="submit" name="update" class="btn btn-outline-dark">Update</button>
          </div>
        </div>
      </form>
      
      <?php } ?>

     
      
      <!-- ############# Edit form open when edit clicked - End ########## -->



    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example2" class="table table-striped table-bordered example2">
            <thead>
              <tr>
                <th>No</th>
                <th>Case Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>


            <?php 
            $lawyerId = $_SESSION['lawyer_id'];
            $sql = "SELECT * FROM casestatus WHERE lawyer_id = '$lawyerId'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){

            ?>

              <tr>
                <td scope="row"><?php echo $row['casestatus_id'] ?></td>
                <td><?php echo $row['casestatus_name'] ?></td>

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
                        <form action="" method="get" class="editForm">
                          <input type="hidden" name="caseStatusId" id="caseStatusId" value="<?php echo $row['casestatus_id'] ?>">
                          
  
                            <button type="submit" name="edit" class="dropdown-item" data-id ="<?php echo $row['casestatus_id'] ?>">
                              <i class="fas fa-pencil-alt"></i>
                              Edit
                            </button>

                        </form>
                      
                      </li>

                   
                      <li>
                        <form action="" method="get">
                          <input type="hidden" name="caseStatusId" value="<?php echo $row['casestatus_id'] ?>">
                          

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


<!-- Modal Start-->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Case Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="get" class="needs-validation" novalidate>
          <div class="row">
            <div class="col-md-12">
              <label for="caseStatus" class="form-label">Case Status <span class="text-danger">*</span></label>
              <input type="text" name="caseStatus" class="form-control" id="caseStatus" pattern="[a-zA-Z\d\s\.]{3,}" required>
              <div class="invalid-feedback">looks bad...</div>
              <div class="valid-feedback">looks good...</div>
            </div>
    
            <div class="modal-footer">
            <button type="submit" name="add" class="btn btn-outline-dark">Add</button>
              <input type="button" value="Close" class="btn btn-secondary" data-bs-dismiss="modal"></button>
            </div>

          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<!-- Modal End-->


<!--end page wrapper -->

<?php include('includes/footer.php'); ?>
