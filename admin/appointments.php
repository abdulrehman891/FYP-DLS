<?php include('includes/header.php'); ?>

<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0 text-uppercase">Appointments</h6>
      <a href="addAppointment.php" class="d-none d-sm-inline-block shadow-sm">
        <button class="btn btn-sm btn-primary">
          <i class="fas fa-plus"></i>
          Add Appointment
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
                <th>Client Name</th>
                <th>Mobile</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row">1</td>
                <td>M. Kamran</td>
                <td>03048874922</td>
                <td>19-04-2022</td>
                <td>2:00 PM</td>
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
                          <i class="fas fa-eye"></i>
                          view
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">
                          <i class="fas fa-pencil-alt"></i>
                          edit
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">
                          <i class="fas fa-trash"></i>
                          delete
                        </a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              <tr>
                <td scope="row">2</td>
                <td>Abdul Rehman</td>
                <td>03325674922</td>
                <td>22-05-2023</td>
                <td>5:00 AM</td>
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
                          <i class="fas fa-eye"></i>
                          view
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">
                          <i class="fas fa-pencil-alt"></i>
                          edit
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">
                          <i class="fas fa-trash"></i>
                          delete
                        </a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              <tr>
                <td scope="row">3</td>
                <td>Hanzla</td>
                <td>03325674922</td>
                <td>44-13-2094</td>
                <td>2:00 AM</td>
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
                          <i class="fas fa-eye"></i>
                          view
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">
                          <i class="fas fa-pencil-alt"></i>
                          edit
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">
                          <i class="fas fa-trash"></i>
                          delete
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
