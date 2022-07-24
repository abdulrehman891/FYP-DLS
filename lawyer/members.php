<?php include('includes/header.php'); ?>

<?php 
// DELETE Button Clicked
if(isset($_REQUEST['delete'])){
  $memberId = $_REQUEST['memberId'];
  $sql = "DELETE FROM member WHERE member_id='$memberId'";
  $result = mysqli_query($conn, $sql);
  if($result){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Okaay!</strong> Member has been deleted.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';  
  }
}


// IF Enable clicked
if(isset($_REQUEST['enable'])){
  $memberId = $_REQUEST['memberId'];
  $sql = "UPDATE member SET member_status = 1 WHERE member_id = '$memberId' ";
  $result = mysqli_query($conn, $sql);
  if($result){
      $msg =  '
      <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
          <strong >Congratulation!</strong> Member has been Enabled!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
  }
}

// IF Dispprove clicked
if(isset($_REQUEST['disable'])){
  $memberId = $_REQUEST['memberId'];
  $sql = "UPDATE member SET member_status = 0 WHERE member_id = '$memberId' ";
  $result = mysqli_query($conn, $sql);
  if($result){
      $msg =  '
      <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
          <strong >Congratulation!</strong> Member has been Disabled!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
  }
}




?>


<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0 text-uppercase">Members</h6>
      <a href="addMember.php" class="d-none d-sm-inline-block shadow-sm">
        <button class="btn btn-sm btn-dark">
          <i class="fas fa-plus"></i>
          Add Member
        </button>
      </a>
    </div>
    <hr />


    <?php if(isset($msg)) echo $msg; ?>

    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example2" class="table table-striped table-bordered example2">
            <thead>
              <tr>
                <th>Member ID</th>
                <th>Member Name</th>
                <th>Email</th>
                <th>Mobile No</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            <?php
            $sql = "SELECT * FROM member";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){

            ?>
              <tr>
                <td scope="row"><?php echo $row['member_id'] ?></td>
                <td><?php echo $row['member_name'] ?></td>
                <td><?php echo $row['member_email'] ?></td>
                <td><?php echo $row['member_mobile_no'] ?></td>
                <td><?php echo $row['member_role'] ?></td>
                <td><?php if($row['member_status'] == 0) echo "Disabled"; else echo "Enabled" ?></td>

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
                      



                      <li class="<?php if($row['member_status'] == 1) echo 'd-none' ?>">
                            <form action="" method="get">
                                <input type="hidden" name="memberId" value="<?php echo $row['member_id'] ?>">
                                <button type="submit" name="enable" class="dropdown-item">
                                <i class="fas fa-check"></i>
                                Enable
                                </button>
                            </form>
                      </li>


                      <li class="<?php if($row['member_status'] == 0) echo 'd-none' ?>">
                            <form action="" method="get">
                                <input type="hidden" name="memberId" value="<?php echo $row['member_id'] ?>">

                                <button type="submit" name="disable" class="dropdown-item">
                                <i class="fa-solid fa-xmark"></i>
                                 Disable
                                </button>
                            </form>
                        </li>


                     <li>
                        <form action="" method="get">
                          <input type="hidden" name="memberId" value="<?php echo $row['member_id'] ?>">

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
