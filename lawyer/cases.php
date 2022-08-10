<?php 
define('TITLE', 'Cases');
include('includes/header.php'); ?>



<?php
// If delete button clicked
if(isset($_REQUEST['delete'])){
  $caseId = $_REQUEST['caseId'];
  $lawyerId = $_SESSION['lawyer_id'];

  $sql = "DELETE FROM cases WHERE case_id = '$caseId' AND lawyer_id = '$lawyerId'";
  $result = mysqli_query($conn, $sql);
  if($result){
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>Okay!</strong> Case has been deleted.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
          }
        }
        
// Update Button Clicked
if(isset($_REQUEST['update'])){
  $caseId = $_REQUEST['caseId'];
  $caseNextHearingDate = $_REQUEST['caseNextHearingDate'];
  $sql = "UPDATE cases SET case_hearing_next_date = '$caseNextHearingDate' WHERE case_id='$caseId' ";
  if(mysqli_query($conn, $sql)){
      $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
              <strong>Okay!</strong> Next Hearing Date Added.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
              
            }
          }
                  
                  
                  
// Complete Button Clicked
if(isset($_REQUEST['complete'])){
  $sql = "UPDATE cases SET case_status = 'complete' WHERE case_id = '".$_REQUEST['caseId']."'";
  if(mysqli_query($conn, $sql)){
    
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>Okay!</strong> Case Status Changed Successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
  }
}


// Not Complete Button Clicked
if(isset($_REQUEST['notComplete'])){
  $sql = "UPDATE cases SET case_status = 'On Trial' WHERE case_id = '".$_REQUEST['caseId']."'";
  if(mysqli_query($conn, $sql)){
    
    $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>Okay!</strong> Case Status Changed Successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
  }
}

?>

<!--start page wrapper -->

<div class="page-wrapper">
  <div class="page-content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0 text-uppercase">Cases</h6>
      <a href="addCase.php" class="d-none d-sm-inline-block shadow-sm">
        <button class="btn btn-sm btn-dark">
          <i class="fas fa-plus"></i>
          Add Case
        </button>
      </a>
    </div>

    <?php if(isset($_REQUEST['changeDate'])) {?>
      <div class="col-md-4 shadow p-3">
        <form action="" method="get">
          <div class="mb-3">
            <label for="caseNextHearingDate" class="form-label">Next Date</label>
            <input type="date" class="form-control" name="caseNextHearingDate" id="caseNextHearingDate" placeholder="Enter Next Hearing Date">
          </div>
          <input type="hidden" name="caseId" value="<?php echo $_REQUEST['caseId'] ?>">
          <button type="submit" class="btn btn-warning" name="update">Update</button>
        </form>
      </div>

    <?php } ?>


    <hr />

    <?php if(isset($msg)) echo $msg; ?>    
    
    <div class="card">
      
      <div class="card-body">
        
        <div class="table-responsive">
          <ul class="nav nav-tabs" id="rcases-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#rcases" type="button" role="tab" aria-controls="rcases" aria-selected="true">Running Cases</button>
            </li>
          
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="acases-tab" data-bs-toggle="tab" data-bs-target="#acases" type="button" role="tab" aria-controls="acases" aria-selected="false">Completed Cases</button>
            </li>
          </ul>

                    <div class="tab-content mt-2" id="myTabContent">
                      <div class="tab-pane fade show active border-0" id="rcases" role="tabpanel" aria-labelledby="home-tab">
                      <table id="example2" class="table table-striped table-bordered example2">
                      <thead class="">
                        <tr>
                          <th>No</th>
                          <th>Client & Case Detail</th>
                          <th>Court Detail</th>
                          <th>Petitioner vs Respondent</th>
                          <th>Next Date</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php
                      $sql = "SELECT * FROM cases WHERE lawyer_id = '".$_SESSION['lawyer_id']."' AND case_status != 'complete'";
                      $result = mysqli_query($conn, $sql);
                      while($row = mysqli_fetch_assoc($result)){
                      ?>

                        <tr>
                          <td scope="row"><?php echo $row['case_id'] ?></td>
                          <td>
                          <?php echo $row['client_name'] ?> <br />
                            No : <b><?php echo $row['case_number'] ?></b> <br />
                            Case : <b><?php echo $row['case_type'] ?></b> <br />
                            Assign to : <b><?php echo $row['assign_to'] ?></b> <br />
                          </td>
                          <td>
                            Court : <b><?php echo $row['court_name'] ?></b> <br />
                            
                            Judge :
                            <b
                              ><?php echo $row['judge_name'] ?></b
                            >
                            <br />
                          </td>
                          <td>
                          <?php echo $row['p_name'] ?> <br />
                            <b>VS</b> <br />
                            <?php echo $row['r_name'] ?>
                          </td>
                          <td><?php echo $row['case_hearing_next_date'] ?></td>
                          <td class="text-center"><?php echo $row['case_status'] ?></td>

                          <td>
                            <div class="dropdown">
                              <a
                                class="text-first"
                                type="button"
                                id="dropdownMenuButton1"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                              >
                                <i
                                  class="fa fa-ellipsis-h"
                                  style="font-size: 19px"
                                ></i>
                              </a>
                              <ul
                                class="dropdown-menu shadow animated--fade-in"
                                aria-labelledby="dropdownMenuButton1"
                              >
                              <li>
                                  <form action="caseDetails.php" method="get">
                                    <input type="hidden" name="caseId" value="<?php echo $row['case_id'] ?>">
                                    <button type="submit" name="view" class="dropdown-item">
                                      <i class="fas fa-eye"></i>
                                      View
                                    </button>
                                  </form>
                                </li>
                               
                                <li>
                                  <form action="" method="get">
                                    <input type="hidden" name="caseId" value="<?php echo $row['case_id']; ?>">
                                    <button type="submit" name="changeDate" class="dropdown-item" >
                                      <i class="fas fa-calendar fa-fw"></i>
                                      Next Date
                                    </button>
                                  </form>
                                </li>
                              
                              
                                <li>
                                  <form action="" method="get">
                                    <input type="hidden" name="caseId" value="<?php echo $row['case_id']; ?>">
                                    <button type="submit" name="complete" class="dropdown-item" >
                                      <i class="fas fa-check fa-fw "></i>
                                      Complete
                                    </button>
                                  </form>
                                </li>
                               
                                

                                <li>
                                  <form action="editCase.php" method="get">
                                    <input type="hidden" name="caseId" value="<?php echo $row['case_id'] ?>">
                                    <button type="submit" name="edit" class="dropdown-item">
                                      <i class="fas fa-pencil-alt fa-fw"></i>
                                      Edit
                                    </button>
                                  </form>
                                </li>

                                <li>
                                  <form action="" method="get">
                                    <input type="hidden" name="caseId" value="<?php echo $row['case_id'] ?>">
                                    <button type="submit" name="delete" class="dropdown-item">
                                      <i class="fas fa-trash fa-fw"></i>
                                      Delete
                                    </a>
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
  
  <div class="tab-pane fade border-0" id="acases" role="tabpanel" aria-labelledby="contact-tab">
  <table id="example2" class="table table-striped table-bordered example2">
  <thead class="">
                        <tr>
                          <th>No</th>
                          <th>Client & Case Detail</th>
                          <th>Court Detail</th>
                          <th>Petitioner vs Respondent</th>
                          <th>Next Date</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php
                      $sql = "SELECT * FROM cases WHERE lawyer_id = '".$_SESSION['lawyer_id']."' AND case_status = 'complete'";
                      $result = mysqli_query($conn, $sql);
                      while($row = mysqli_fetch_assoc($result)){
                      ?>

                        <tr>
                          <td scope="row"><?php echo $row['case_id'] ?></td>
                          <td>
                          <?php echo $row['client_name'] ?>  <br />
                            No : <b><?php echo $row['case_number'] ?></b> <br />
                            Case : <b><?php echo $row['case_type'] ?></b> <br />
                            Assign to : <b><?php echo $row['assign_to'] ?></b> <br />
                          </td>
                          <td>
                            Court : <b><?php echo $row['court_name'] ?></b> <br />
                            JUDGE :
                            <b
                              ><?php echo $row['judge_name'] ?></b
                            >
                            <br />
                          </td>
                          <td>
                          <?php echo $row['p_name'] ?> <br />
                            <b>VS</b> <br />
                            <?php echo $row['r_name'] ?>
                          </td>
                          <td><?php echo $row['case_hearing_next_date'] ?></td>
                          <td class="text-center"><?php echo $row['case_status'] ?></td>

                          <td>
                            <div class="dropdown">
                              <a
                                class="text-first"
                                type="button"
                                id="dropdownMenuButton1"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                              >
                                <i
                                  class="fa fa-ellipsis-h"
                                  style="font-size: 19px"
                                ></i>
                              </a>
                              <ul
                                class="dropdown-menu shadow animated--fade-in"
                                aria-labelledby="dropdownMenuButton1"
                              >
                                
                                <li>
                                  <form action="caseDetails.php" method="get">
                                    <input type="hidden" name="caseId" value="<?php echo $row['case_id'] ?>">
                                    <button type="submit" name="view" class="dropdown-item">
                                      <i class="fas fa-eye"></i>
                                      View
                                    </button>
                                  </form>
                                </li>
                                <li>
                                  <form action="editCase.php" method="get">
                                    <input type="hidden" name="caseId" value="<?php echo $row['case_id'] ?>">
                                    <button type="submit" name="edit" class="dropdown-item">
                                      <i class="fas fa-pencil-alt"></i>
                                      Edit
                                    </button>
                                  </form>
                                </li>
                               
                                <li>
                                  <form action="" method="get">
                                    <input type="hidden" name="caseId" value="<?php echo $row['case_id'] ?>">
                                    <button type="submit" name="notComplete" class="dropdown-item">
                                      <i class="fas fa-times fa-fw  "></i>
                                      Not Complete
                                    </button>
                                  </form>
                                </li>

                                <li>
                                  <form action="" method="get">
                                    <input type="hidden" name="caseId" value="<?php echo $row['case_id'] ?>">
                                    <button type="submit" name="delete" class="dropdown-item">
                                      <i class="fas fa-trash"></i>
                                      Delete
                                    </a>
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
  </div>
</div>













<!--End page wrapper -->











<?php include('includes/footer.php'); ?>
