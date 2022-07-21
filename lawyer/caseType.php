<?php include('includes/header.php'); ?>


<?php 

// Add Clicked
if(isset($_REQUEST['add'])){
  $lawyerId = $_SESSION['lawyer_id'];
  $caseTypeName = $_REQUEST['caseTypeName'];

  // Insert DATA
  $sql = "INSERT INTO casetype (case_type_name , lawyer_id) VALUES ('$caseTypeName', '$lawyerId')";
  $result = mysqli_query($conn, $sql);
  if($result){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Congratulations!</strong> New Case Type has been added.
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
  $caseTypeId = $_REQUEST['caseTypeId'];
  $sql = "DELETE FROM casetype WHERE case_type_id='$caseTypeId'";
  $result = mysqli_query($conn, $sql);
  if($result){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Okaay!</strong> Case Type has been deleted.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';  
  }
}




// UPDATE CLICKED
if(isset($_REQUEST['update'])){
  $caseTypeId = $_REQUEST['caseTypeId'];
  $caseTypeName = $_REQUEST['caseTypeName'];

  $sql = "UPDATE casetype SET case_type_name = '$caseTypeName' WHERE case_type_id = '$caseTypeId'";
  $result = mysqli_query($conn, $sql);
  if($result){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Updated!</strong> Case Type has been changed!.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }

}




?>

<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0 text-uppercase">Case Types</h6>
      <a href="" class="d-none d-sm-inline-block shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <button class="btn btn-sm btn-primary">
          <i class="fas fa-plus"></i>
          Add Case Type
        </button>
      </a>
    </div>
    <hr />



    <?php
    if(isset($msg)) echo $msg;
    ?>



 <!-- ######## Edit form open when edit clicked - Start ########## -->
    
 <?php if(isset($_REQUEST['edit'])){
      $caseTypeId = $_REQUEST['caseTypeId'];
      $sql = "SELECT * FROM casetype WHERE case_type_id = '$caseTypeId'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      ?>
      <form class="">
        <div class="row mb-3">
          <label for="caseTypeName" class="col-auto col-form-label">Case Type</label>
          <div class="col-auto">
            <input type="text"  class="form-control" id="caseTypeName" name="caseTypeName" value="<?php echo $row['case_type_name'] ?>">
          </div>
          <input type="hidden" name="caseTypeId" value="<?php echo $caseTypeId ?>">
          <div class="col-auto">
            <button type="submit" name="update" class="btn btn-primary">Update</button>
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
                <th>Case Type</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>


            <?php 
            $lawyerId = $_SESSION['lawyer_id'];
            $sql = "SELECT * FROM casetype WHERE lawyer_id = '$lawyerId'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){

            ?>

              <tr>
                <td scope="row"><?php echo $row['case_type_id'] ?></td>
                <td><?php echo $row['case_type_name'] ?></td>

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
                        <form action="" method="get" >
                          <input type="hidden" name="caseTypeId" value="<?php echo $row['case_type_id'] ?>">
  
                            <button name="edit" class="dropdown-item">
                              <i class="fas fa-pencil-alt"></i>
                              Edit
                            </button>

                        </form>
                      
                      </li>


                      <li>
                        <form action="" method="get">
                          <input type="hidden" name="caseTypeId" value="<?php echo $row['case_type_id'] ?>">

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
        <h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="get">
          <div class="row">
            <div class="col-md-12">
              <label for="caseTypeName" class="form-label">Case Type <span class="text-danger">*</span></label>
              <input type="text" name="caseTypeName" class="form-control" id="caseTypeName">
            </div>
    
            <div class="modal-footer">
            <button type="submit" name="add" class="btn btn-primary">Add</button>
              <input type="submit" value="Close" class="btn btn-secondary" data-bs-dismiss="modal"></button>
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
