<?php include('includes/header.php'); ?>

<!--start page wrapper -->





<div class="page-wrapper">
  <div class="page-content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0 text-uppercase">Cases</h6>
      <a href="addCase.php" class="d-none d-sm-inline-block shadow-sm">
        <button class="btn btn-sm btn-primary">
          <i class="fas fa-plus"></i>
          Add Case
        </button>
      </a>
    </div>
    <hr />
    
    <div class="card">
      
      <div class="card-body">
        
        <div class="table-responsive">
            <ul class="nav nav-tabs" id="rcases-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#rcases" type="button" role="tab" aria-controls="rcases" aria-selected="false">Running Cases</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="icases-tab" data-bs-toggle="tab" data-bs-target="#icases" type="button" role="tab" aria-controls="icases" aria-selected="true">Important Cases</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link" id="acases-tab" data-bs-toggle="tab" data-bs-target="#acases" type="button" role="tab" aria-controls="acases" aria-selected="false">Archieved Cases</button>
                </li>
          </ul>

                    <div class="tab-content mt-2" id="myTabContent">
                      
  <div class="tab-pane fade border-0" id="icases" role="tabpanel" aria-labelledby="profile-tab">
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
                        <tr>
                          <td scope="row">1</td>
                          <td>
                            Hafiz Shahnawaz Pardesi <br />
                            No : <b>58939</b> <br />
                            Case : <b>Murder</b> <br />
                            Assign to : <b>No One</b> <br />
                          </td>
                          <td>
                            Court : <b>Lahore Branch</b> <br />
                            No : <b>74738</b> <br />
                            Magistrate :
                            <b
                              >Justice Athar <br />
                              Minallah</b
                            >
                            <br />
                          </td>
                          <td>
                            Rana Muhammad Kamran <br />
                            <b>VS</b> <br />
                            Mr. Saim
                          </td>
                          <td>19-05-2022</td>
                          <td class="text-center">On-Trial</td>

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
  </div>
</div>






<!--End page wrapper -->






<?php include('includes/footer.php'); ?>
