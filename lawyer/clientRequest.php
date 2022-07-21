<?php include('includes/header.php'); ?>


<?php
// IF accept button clicked
if(isset($_REQUEST['accept'])){
  $clientId = $_REQUEST['clientId'];
  $lawyerId = $_SESSION['lawyer_id'];


  $sql = "UPDATE client SET is_assign = 1 WHERE client_id = '$clientId' AND lawyer_id = '$lawyerId' ";
  $result =  mysqli_query($conn, $sql);

  if($result){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Okaay!</strong> User Request has been Accepted Successfully!. 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';    
  }
}

// IF delete button clicked
if(isset($_REQUEST['delete'])){
  $clientId = $_REQUEST['clientId'];
  $lawyerId = $_SESSION['lawyer_id'];

  $sql = "DELETE FROM client WHERE client_id = '$clientId' AND lawyer_id = '$lawyerId' ";
  $result = mysqli_query($conn, $sql);
  if($result){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Okaay!</strong> Requested User has been deleted. 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    
  } else {
    $msg = '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
    <strong>Ohh!</strong> System is not working.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';

  }



}



?>



<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0 text-uppercase">Clients Requests</h6>
      <!-- <a href="addClient.php" class="d-none d-sm-inline-block shadow-sm">
        <button class="btn btn-sm btn-primary">
          <i class="fas fa-plus"></i>
          Add Client
        </button>
      </a> -->
    </div>
    <hr />

    <?php if(isset($msg)) echo $msg; ?>




    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example2" class="table table-striped table-bordered example2">
            <thead>
              <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Address</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>


            <?php
            // Select Requested Users
            $lawyerId = $_SESSION['lawyer_id'];
            $sql = "SELECT * FROM client WHERE lawyer_id = $lawyerId AND is_assign = 0 ";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){

            
            ?>

              <tr>
                <td scope="row"><?php echo $row ['client_id'] ?></td>
                <td><?php echo $row['client_name'] ?></td>
                <td><?php echo $row['client_mobile'] ?></td>
                <td><?php echo $row['client_email'] ?></td>
                <td><?php echo $row['client_address'] ?></td>
                <td><?php echo $row['client_description'] ?></td>
           

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
                        <form action="" method="get">
                          <input type="hidden" name="clientId" value="<?php echo $row['client_id'] ?>">
                          <button type="submit" name = "accept" class="dropdown-item">
                            <i class="fa-solid fa-check"></i>
                            Accept
                          </button>
                        </form>
                      </li>


                      <li>
                        <form action="" method="get">
                          <input type="hidden" name="clientId" value="<?php echo $row['client_id'] ?>">
                          <button type="submit" name = "delete" class="dropdown-item">
                            <i class="fas fa-trash"></i>
                            Delete
                          </button>
                        </form>
                      </li>


                    </ul>
                  </div>
                </td>
              </tr>

              <?php
            }
              ?>

              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!--end page wrapper -->

<?php include('includes/footer.php'); ?>
