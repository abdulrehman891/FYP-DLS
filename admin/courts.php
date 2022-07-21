<?php include('includes/header.php'); ?>

<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0 text-uppercase">Court</h6>
      <a href="#" class="d-none d-sm-inline-block shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <button class="btn btn-sm btn-primary">
          <i class="fas fa-plus"></i>
          Add Court
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
                <th>Court</th>
                <th>Court Type</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row">1</td>
                <td>Lahore Branch</td>
                <td>High Court</td>
                <td class="text-center">
                  <!-- Checked switch -->
                  <div class="form-check form-switch text-first">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      role="switch"
                      id="flexSwitchCheckChecked"
                      checked
                    />
                  </div>
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
                <label for="inputCourtType" class="form-label">Court Type <span class="text-danger">*</span></label>
                <select class="form-control" name="inputCourtType" id="inputCourtType" placeholder="Select Court">
                  <option value="" disabled selected> Select Court </option>
                  <option>Supreme Court </option>
                  <option>High Court</option>
                  <option>Session Court</option>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <label for="inputCourt" class="form-label">Court <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="inputCourt">
            </div>
            <div class="modal-footer">
              <input type="submit" value="Add" class="btn btn-primary"></button>
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
