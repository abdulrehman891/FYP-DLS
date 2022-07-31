<?php 
define('TITLE', 'Court Type');
include('includes/header.php'); ?>


<?php 
// Add clicked
if(isset($_REQUEST['add'])){
  $inputCourtType = $_REQUEST['inputCourtType'];
  $lawyerId = $_SESSION['lawyer_id'];

  $sql = "INSERT INTO courtType(court_type_name, lawyer_id) VALUES('$inputCourtType', '$lawyerId')";
  $result = mysqli_query($conn, $sql);
  if($result){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Congrats!</strong> Court Type has been added.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
} 
}

// DELETE Button Clicked
if(isset($_REQUEST['delete'])){
  $courtTypeId = $_REQUEST['courtTypeId'];
  $lawyerId = $_SESSION['lawyer_id'];
  $sql = "DELETE FROM courttype WHERE lawyer_id = '$lawyerId' AND court_type_id = '$courtTypeId'";
  if(mysqli_query($conn, $sql)){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Okay!</strong> Court Type has been Delete.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
}

// UPDATE CLICKED
if(isset($_REQUEST['update'])){
  $courtTypeId = $_REQUEST['courtTypeId'];
  $courtTypeName = $_REQUEST['courtTypeName'];

  $sql = "UPDATE courttype SET court_type_name = '$courtTypeName' WHERE court_type_id = '$courtTypeId'";
  $result = mysqli_query($conn, $sql);
  if($result){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Updated!</strong> Court Type has been Updated.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }

}


?>

<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0 text-uppercase">Court Types</h6>
      <a href="addCourtType.php" class="d-none d-sm-inline-block shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <button class="btn btn-sm btn-dark" >
          <i class="fas fa-plus"></i>
          Add Court Type
        </button>
      </a>
    </div>
    <hr />


    <?php if(isset($msg)) echo $msg ?>



    <!-- ######## Edit form open when edit clicked - Start ########## -->
    
    <?php if(isset($_REQUEST['edit'])){
      $courtTypeId = $_REQUEST['courtTypeId'];
      $sql = "SELECT * FROM courttype WHERE court_type_id = '$courtTypeId'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      ?>
      <form class="">
        <div class="row mb-3">
          <label for="courtTypeName" class="col-auto col-form-label">Court Type</label>
          <div class="col-auto">
            <input type="text"  class="form-control" id="courtTypeName" name="courtTypeName" value="<?php echo $row['court_type_name'] ?>">
          </div>
          <input type="hidden" name="courtTypeId" value="<?php echo $courtTypeId ?>">
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
                <th>Court Type</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            <?php
            $lawyerId = $_SESSION['lawyer_id'];
            $sql = "SELECT * FROM courtType WHERE lawyer_id = '$lawyerId'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
            ?>


              <tr>
                <td scope="row"><?php echo $row['court_type_id'] ?></td>
                <td><?php echo $row['court_type_name'] ?></td>

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
                          <input type="hidden" name="courtTypeId" value="<?php echo $row['court_type_id'] ?>">
  
                            <button name="edit" class="dropdown-item">
                              <i class="fas fa-pencil-alt"></i>
                              Edit
                            </button>

                        </form>
                      
                      </li>


                      <li>
                      <form action="" method="get">
                    
                      <input type="hidden" name="courtTypeId" value="<?php echo $row['court_type_id'] ?>">
                        <button input="submit" name="delete" class="dropdown-item">
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
        <h5 class="modal-title" id="exampleModalLabel">Add Court</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="get">
          <div class="row">
            <div class="col-md-12">
              <label for="inputCourtType" class="form-label">Add Court Type<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="inputCourtType" id="inputCourtType">
            </div>
            <div class="modal-footer">
              <button type="submit" name="add" class="btn btn-outline-dark">Add</button>
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

<?php include('includes/footer.php'); 
?>