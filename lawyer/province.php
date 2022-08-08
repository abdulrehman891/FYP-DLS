<?php 
define('TITLE', 'Province');
include('includes/header.php'); ?>


<?php 
// Add clicked
if(isset($_REQUEST['add'])){
  $province = $_REQUEST['province'];
  $lawyerId = $_SESSION['lawyer_id'];

  $sql = "INSERT INTO province(province_name, lawyer_id) VALUES('$province', '$lawyerId')";
  $result = mysqli_query($conn, $sql);
  if($result){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Congrats!</strong> Province has been added.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
} 
}

// DELETE Button Clicked
if(isset($_REQUEST['delete'])){
  $provinceId = $_REQUEST['provinceId'];
  $lawyerId = $_SESSION['lawyer_id'];
  $sql = "DELETE FROM province WHERE lawyer_id = '$lawyerId' AND province_id = '$provinceId'";
  if(mysqli_query($conn, $sql)){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Okay!</strong> Province has been Delete.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
}

// UPDATE CLICKED
if(isset($_REQUEST['update'])){
  $provinceId = $_REQUEST['provinceId'];
  $province = $_REQUEST['province'];

  $sql = "UPDATE province SET province_name = '$province' WHERE province_id = '$provinceId'";
  $result = mysqli_query($conn, $sql);
  if($result){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Updated!</strong> Province has been Updated.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }

}


?>

<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0 text-uppercase">Province</h6>
      <a href="addCourtType.php" class="d-none d-sm-inline-block shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <button class="btn btn-sm btn-dark" >
          <i class="fas fa-plus"></i>
          Add Province
        </button>
      </a>
    </div>
    <hr />


    <?php if(isset($msg)) echo $msg ?>



    <!-- ######## Edit form open when edit clicked - Start ########## -->
    
    <?php if(isset($_REQUEST['edit'])){
      $provinceId = $_REQUEST['provinceId'];
      $sql = "SELECT * FROM province WHERE province_id = '$provinceId'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      ?>
      <form class="">
        <div class="row mb-3">
          <label for="courtTypeName" class="col-auto col-form-label">Province</label>
          <div class="col-auto">
            <input type="text"  class="form-control" id="province" name="province" value="<?php echo $row['province_name'] ?>">
          </div>
          <input type="hidden" name="provinceId" value="<?php echo $provinceId ?>">
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
                <th>Province</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            <?php
            $lawyerId = $_SESSION['lawyer_id'];
            $sql = "SELECT * FROM province WHERE lawyer_id = '$lawyerId'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
            ?>


              <tr>
                <td scope="row"><?php echo $row['province_id'] ?></td>
                <td><?php echo $row['province_name'] ?></td>

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
                          <input type="hidden" name="provinceId" value="<?php echo $row['province_id'] ?>">
  
                            <button name="edit" class="dropdown-item">
                              <i class="fas fa-pencil-alt"></i>
                              Edit
                            </button>

                        </form>
                      
                      </li>


                      <li>
                      <form action="" method="get">
                    
                      <input type="hidden" name="provinceId" value="<?php echo $row['province_id'] ?>">
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
        <h5 class="modal-title" id="exampleModalLabel">Add Province</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="get">
          <div class="row">
            <div class="col-md-12">
              <label for="province" class="form-label">Province<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="province" id="province" required>
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