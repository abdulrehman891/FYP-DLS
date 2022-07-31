<?php 
define('TITLE', 'Member Role');
include('includes/header.php'); ?>


<?php

// Add Clicked
if(isset($_REQUEST['add'])){
  $lawyerId = $_SESSION['lawyer_id'];
  $roleName = $_REQUEST['roleName'];
  $roleDescription = $_REQUEST['roleDescription'];

  // Insert DATA
  $sql = "INSERT INTO role (role_name , role_description, lawyer_id) VALUES ('$roleName', '$roleDescription', '$lawyerId')";
  $result = mysqli_query($conn, $sql);
  if($result){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Congratulations!</strong> New Role has been added.
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
  $roleId = $_REQUEST['roleId'];
  $sql = "DELETE FROM role WHERE role_id='$roleId'";
  $result = mysqli_query($conn, $sql);
  if($result){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Okaay!</strong> Role has been deleted.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';  
  }
}


// UPDATE CLICKED
if(isset($_REQUEST['update'])){
  $roleId = $_REQUEST['roleId'];
  $roleName = $_REQUEST['roleName'];
  $roleDescription = $_REQUEST['roleDescription'];

  $sql = "UPDATE role SET role_name = '$roleName', role_description = '$roleDescription' WHERE role_id = '$roleId'";
  $result = mysqli_query($conn, $sql);
  if($result){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Updated!</strong> Role has been update!.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }

}

?>

<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0 text-uppercase">Member Roles</h6>
      <a href="" class="d-none d-sm-inline-block shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <button class="btn btn-sm btn-dark">
          <i class="fas fa-plus fa-fw"></i>
          Add Role
        </button>
      </a>
    </div>
    <hr />


    <?php if(isset($msg)) echo $msg; ?>



    <!-- ######## Edit form open when edit clicked - Start ########## -->
    
    <?php if(isset($_REQUEST['edit'])){
      $roleId = $_REQUEST['roleId'];
      $sql = "SELECT * FROM role WHERE role_id = '$roleId'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      ?>
      <form class="">
        <div class="row mb-3">
          <label for="roleName" class="col-auto col-form-label">Role Name</label>
          <div class="col-auto">
            <input type="text"  class="form-control" id="roleName" name="roleName" value="<?php echo $row['role_name'] ?>">
          </div>

          <label for="roleDescription" class="col-auto col-form-label">Role Description</label>
          <div class="col-auto">
            <input type="text"  class="form-control" id="roleDescription" name="roleDescription" value="<?php echo $row['role_description'] ?>">
          </div>

          <input type="hidden" name="roleId" value="<?php echo $roleId ?>">
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
                <th>Role</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>



            <?php 
            $lawyerId = $_SESSION['lawyer_id'];
            $sql = "SELECT * FROM role WHERE lawyer_id = '$lawyerId'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){

            ?>



                <tr>
                    <td scope="row"><?php echo $row['role_id'] ?></td>
                    <td><?php echo $row['role_name'] ?></td>
                    <td><?php echo $row['role_description'] ?></td>

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
                          <input type="hidden" name="roleId" value="<?php echo $row['role_id'] ?>">
  
                            <button name="edit" class="dropdown-item">
                              <i class="fas fa-pencil-alt"></i>
                              Edit
                            </button>

                        </form>
                      
                      </li>
                       
                        <li>
                        <form action="" method="get">
                          <input type="hidden" name="roleId" value="<?php echo $row['role_id'] ?>">

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
              <label for="roleName" class="form-label">Role Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="roleName" id="roleName">
            </div>
            <div class="col-12">
              <label for="roleDescription" class="form-label">Role Description <span class="text-danger">*</span></label>
              <textarea class="form-control" id="roleDescription" name="roleDescription" placeholder="Address..." rows="3"></textarea>
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
