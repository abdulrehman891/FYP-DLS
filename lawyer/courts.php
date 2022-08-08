<?php 
define('TITLE', 'Courts');
include('includes/header.php'); ?>


<?php
// Add Clicked
if(isset($_REQUEST['add'])){
  $lawyerId = $_SESSION['lawyer_id'];
  $courtTypeName = $_REQUEST['courtTypeName'];
  $courtName = $_REQUEST['courtName'];

  if($courtTypeName == "" || $courtName == ""){
    $msg = '<div class="alert alert-info alert-dismissible fade show text-center" role="alert">
    <strong>Please!</strong> Fill All Fields.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  } else{
    // Insert DATA
    $sql = "INSERT INTO court(court_type_name , court_name, lawyer_id) VALUES ('$courtTypeName', '$courtName' ,'$lawyerId')";
    $result = mysqli_query($conn, $sql);
    if($result){
      $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
      <strong>Congratulations!</strong> New Court has been added.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  } else{
      $msg = '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
      <strong>Ohh!</strong> System is not responding.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  
    }

  }

}


// DELETE Clicked
if(isset($_REQUEST['delete'])){
  $courtId = $_REQUEST['courtId'];
  $sql = "DELETE FROM court WHERE court_id='$courtId'";
  $result = mysqli_query($conn, $sql);
  if($result){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Okaay!</strong> Court has been deleted.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';  
  }
}



// UPDATE CLICKED
if(isset($_REQUEST['update'])){
  $courtId = $_REQUEST['courtId'];
  $courtName = $_REQUEST['courtName'];

  $sql = "UPDATE court SET court_name = '$courtName' WHERE court_id = '$courtId'";
  $result = mysqli_query($conn, $sql);
  if($result){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Updated!</strong> Court Name has been update!.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }

}





?>




<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0 text-uppercase">Court</h6>
      <a href="#" class="d-none d-sm-inline-block shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <button class="btn btn-sm btn-dark">
          <i class="fas fa-plus"></i>
          Add Court
        </button>
      </a>
    </div>
    <hr />


<?php if(isset($msg)) echo $msg ?>



<!-- ######## Edit form open when edit clicked - Start ########## -->
    
<?php if(isset($_REQUEST['edit'])){
      $courtId = $_REQUEST['courtId'];
      $sql = "SELECT * FROM court WHERE court_id = '$courtId'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      ?>
      <form class="">
        <div class="row mb-3">
          <label for="courtName" class="col-auto col-form-label">Court Name</label>
          <div class="col-auto">
            <input type="text"  class="form-control" id="courtName" name="courtName" value="<?php echo $row['court_name'] ?>">
          </div>


          <input type="hidden" name="courtId" value="<?php echo $courtId ?>">
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
                <th>Court</th>
                <th>Court Type</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            <?php 
            $lawyerId = $_SESSION['lawyer_id'];
            $sql = "SELECT * FROM court WHERE lawyer_id = '$lawyerId'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){

            ?>

              <tr>
                <td scope="row"><?php echo $row['court_id'] ?></td>
                <td><?php echo $row['court_name'] ?></td>
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
                          <input type="hidden" name="courtId" value="<?php echo $row['court_id'] ?>">
  
                            <button name="edit" class="dropdown-item">
                              <i class="fas fa-pencil-alt"></i>
                              Edit
                            </button>

                        </form>
                      
                      </li>



                     
                      <li>
                        <form action="" method="get">
                          <input type="hidden" name="courtId" value="<?php echo $row['court_id'] ?>">

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
        <h5 class="modal-title" id="exampleModalLabel">Add Court</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="get">
          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="courtTypeName" class="form-label">Court Type <span class="text-danger">*</span></label>
                <select class="form-control" name="courtTypeName" id="courtTypeName" placeholder="Select Court">
                  <option value="" disabled selected> Select Court Type</option>
                  
                  <?php
                  $sql = "SELECT * FROM courttype";
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_assoc($result)){
                
                  ?>
                  <option value="<?php echo $row['court_type_name'] ?>"><?php echo $row['court_type_name'] ?></option>

                  <?php } ?>


                </select>
              </div>
            </div>
            <div class="col-md-12">
              <label for="courtName" class="form-label">Court Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="courtName" id="courtName">
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



<?php include('includes/footer.php'); ?>