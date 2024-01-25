<?php 
 include('includes/connection.php');

 if (!isset($_SESSION['lawyer_email'])) {
     header('Location:lawyerLogin.php');
 } 
include('includes/header.php');
 ?>

<?php 



// Complete Button Clicked
if(isset($_REQUEST['complete'])){
  $taskId = $_REQUEST['taskId'];
  $sql = "UPDATE task SET task_status = 1 WHERE task_id = '$taskId' ";
  $result = mysqli_query($conn, $sql);
  if($result){
      $msg =  '
      <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
          <strong >Nice!</strong> Task has been Completed!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
  }
}


?>

<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0 text-uppercase">Tasks</h6>
      <a href="addTask.php" class="d-none d-sm-inline-block shadow-sm">
        <button class="btn btn-sm btn-dark">
          <i class="fas fa-plus"></i>
          Add Task
        </button>
      </a>
    </div>
    <hr />
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example2" class="table table-striped table-bordered example2">
            <thead>
              <tr>
                <th>No</th>
                <th>Task Name</th>
                <th>Related To</th>
                <th>Start Date</th>
                <th>Deadline</th>
                <th>Members</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            <?php 
            $lawyer_key = $_SESSION['lawyer_id'];
            if ($_SESSION['user'] == 'USER') {
                                            
            
            $sql1 = "SELECT * FROM `lawyer_user_access` WHERE `user_access_id`= '$lawyer_key'";
              $result1 = mysqli_query($conn, $sql1);
              $row = mysqli_fetch_assoc($result1);
              $lawyer_key=$row['lawer_key'];
              
            }

            $sql = "SELECT * FROM `task` WHERE lawyer_id = '$lawyer_key'";
            $run=mysqli_query($conn,$sql);
            
            while ($row=mysqli_fetch_array($run)) {
           
              ?>
  
                <tr>
                  <td scope="row"><?php echo $row['task_id'] ?></td>
                  <td><?php echo $row['task_subject'] ?></td>
                  <td>
                  <?php echo $row['client_name'] ?>
                      
                  </td>
                  <td><?php echo $row['task_start_date'] ?></td>
                  <td><?php echo $row['task_deadline'] ?></td>
                  <td><?php echo $row['task_assign_to'] ?></td>
  
                  <td>
                    <?php
                    if($row['task_priority'] == "urgent") {echo '<span class="badge bg-warning">URGENT</span>';}
                    elseif($row['task_priority'] ==  "high") {echo '<span class="badge bg-info">HIGH</span>';}
                    elseif($row['task_priority'] ==  "medium") {echo '<span class="badge bg-dark">Medium</span>';}
                    else {echo '<span class="badge bg-light text-dark">LOW</span>';}
                    ?>
                  </td>
  
                  <?php 
                  // Setting Status Deffered if Date is passed
                  $taskId = $row['task_id'];
                  if(date("Y-m-d") > $row['task_deadline'] && $row['task_status'] != 1){
                    mysqli_query($conn, "UPDATE task SET task_status = -1 WHERE task_id = '$taskId'");
                  }
                  ?>
  
  
                  <td>
                    <?php
                    if($row['task_status'] == -1) {echo '<span class="badge bg-danger">Deffered</span>';}
                    elseif($row['task_status'] == 0) {echo '<span class="badge bg-info">In Progress</span>';}
                    else {echo '<span class="badge bg-success">Completed</span>';}
                    ?>
                  </td>
  
  
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
                      <a class="dropdown-item" href="./editTask.php?upid=<?php echo $row['task_id'] ?>">
                          <i class="fas fa-pencil-alt"></i>
                          Edit
                      </a>
                        </li>
                      
  
                        <li class="<?php if($row['task_status'] == -1 || $row['task_status'] == 1) echo 'd-none' ?>">
                          <form action="" method="get">
                            <input type="hidden" name="taskId" value="<?php echo $row['task_id'] ?>">
  
                            <button type="submit" name="complete" class="dropdown-item">
                            <i class="fas fa-check"></i>
                              Complete
                            </button>
                          </form>
                        </li>
  
  
  
                        <li>
                          
                          <a class="dropdown-item delete" data-id="<?php echo $row['task_id'] ?>">
                          <i class="fas fa-trash"></i>
                          Delete
                      </a>
                          
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


<script>
// //////DELETE//////////////
$(document).on('click', '.delete', function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var tid = $(this).data("id");

            var msg = this;

            $.ajax({
                url: './ajax/delete_task.php',
                data: {
                    id: tid,
                },

                success: function(result) {

                    if (result == 1) {
                        Swal.fire({
                            toast: true,
                            icon: 'success',
                            title: 'Task has been deleted',
                            animation: false,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal
                                    .stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)

                            }
                        })
                        $(msg).closest("tr").fadeOut();
                    } else if (result == 2) {
                        Swal.fire({
                            toast: true,
                            icon: 'warning',
                            title: 'Task has not been deleted.',
                            animation: false,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal
                                    .stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)

                            }
                        })
                    } else {
                        Swal.fire({
                            toast: true,
                            icon: 'warning',
                            title: 'System error',
                            animation: false,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal
                                    .stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)

                            }
                        })
                    }

                }
            });
        }
    })
});

</script>