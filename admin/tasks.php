<?php include('includes/header.php'); ?>

<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0 text-uppercase">Tasks</h6>
      <a href="addTask.php" class="d-none d-sm-inline-block shadow-sm">
        <button class="btn btn-sm btn-primary">
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
                <th>Status</th>
                <th>Priority</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row">1</td>
                <td>Find Evidence</td>
                <td>
                    Rana Muhammad Kamran <br>
                    Case Number : 58989
                </td>
                <td>05-05-2022</td>
                <td>20-05-2022</td>
                <td>Arslan Naeem</td>
                <td><span class="badge bg-success">Completed</span></td>
                <td><span class="badge bg-info">Medium</span></td>

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
                        <a class="dropdown-item" href="#">
                          <i class="fas fa-pencil-alt"></i>
                          Edit
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">
                          <i class="fas fa-trash"></i>
                          Delete
                        </a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!--end page wrapper -->

<?php include('includes/footer.php'); ?>
