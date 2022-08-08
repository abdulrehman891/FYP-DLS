<?php 
define('TITLE', 'Case Details');
include('includes/header.php'); ?>


<!--start page wrapper -->

<div class="page-wrapper">
  <div class="page-content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0 text-uppercase">Case Details</h6>
    </div>
    <hr />

    
    <div class="card">
      
      <div class="card-body">

      <div class="row">


      <?php 
      $caseId = $_REQUEST['caseId'];
      $sql = "SELECT * FROM cases WHERE case_id = '$caseId'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      ?>


        <div class="col-md-6 hidden-small">
  
  
          <table class="table">
              <tbody>
                <h5 class="text-center">Client's Information</h5>
              <tr>
                  <td>Case ID</td>
                  <td class="fs15 fw700 text-right"><?php echo $row['case_id'] ?></td>
              </tr>
              <tr>
                  <td>Client Name</td>
                  <td class="fs15 fw700 text-right"><?php echo $row['client_name'] ?></td>
              </tr>
              <tr>
                  <td>Client Email</td>
                  <td class="fs15 fw700 text-right"><?php echo $row['client_email'] ?></td>
              </tr>
              <tr>
                  <td>Client Mobile</td>
                  <td class="fs15 fw700 text-right"><?php echo $row['client_mobile_no'] ?></td>
              </tr>
              
              
              </tbody>
          </table>
          </div>
  
          <div class="col-md-6 hidden-small">
  
                <table class="table">
                    <tbody>
                      <h5 class="text-center">Party Information</h5>
                      <tr>
                      <td>Petitioner Name</td>
                      <td class="fs15 fw700 text-right"><?php echo $row['p_name'] ?></td>
                      </tr>
                      <tr>
                          <td>Petitioner Advocate</td>
                          <td class="fs15 fw700 text-right"> <?php echo $row['p_advocate_name'] ?></td>
                      </tr>
                      <tr>
                          <td>Respodent Name</td>
                          <td class="fs15 fw700 text-right"> <?php echo $row['r_name'] ?></td>
                      </tr>
                      <tr>
                          <td>Respdent Advocate</td>
                          <td class="fs15 fw700 text-right"> <?php echo $row['r_advocate_name'] ?></td>
                      </tr>
                    
                    </tbody>
                </table>
            </div>


            <div class="col-md-4 hidden-small">
  
                <table class="table">
                    <tbody>
                      <h5 class="text-center">Location Information</h5>
                      <tr>
                          <td>Province</td>
                          <td class="fs15 fw700 text-right"> <?php echo $row['province'] ?></td>
                      </tr>
                      <tr>
                          <td>District</td>
                          <td class="fs15 fw700 text-right"> <?php echo $row['district'] ?></td>
                      </tr>
                      <tr>
                          <td>Police Station</td>
                          <td class="fs15 fw700 text-right"> <?php echo $row['police_station'] ?></td>
                      </tr>
                    </tbody>
                 </table>
            </div>



            <div class="col-md-4 hidden-small">
  
              <table class="table">
                  <tbody>
                    <h5 class="text-center">FIR Information</h5>
                    <tr>
                        <td>FIR Number</td>
                        <td class="fs15 fw700 text-right"> <?php echo $row['fir_number'] ?></td>
                    </tr>
                    <tr>
                        <td>FIR DATE</td>
                        <td class="fs15 fw700 text-right"> <?php echo $row['fir_date'] ?></td>
                    </tr>
                  </tbody>
              </table>
            </div>


            <div class="col-md-4 hidden-small">
  
              <table class="table">
                  <tbody>
                    <h5 class="text-center">ACT Information</h5>
                    <tr>
                        <td>ACT No</td>
                        <td class="fs15 fw700 text-right"> <?php echo $row['act_name'] ?></td>
                    </tr>
                    <tr>
                        <td>Under Section</td>
                        <td class="fs15 fw700 text-right"> <?php echo $row['under_section'] ?></td>
                    </tr>
                  </tbody>
              </table>
            </div>


            <div class="col-md-6 hidden-small">
  
                <table class="table">
                    <tbody>
                      <h5 class="text-center">Court Information</h5>
                      <tr>
                          <td>Court Type</td>
                          <td class="fs15 fw700 text-right"> <?php echo $row['court_type'] ?></td>
                      </tr>
                      <tr>
                          <td>Court Name</td>
                          <td class="fs15 fw700 text-right"> <?php echo $row['court_name'] ?></td>
                      </tr>
                      <tr>
                          <td>Judge Name</td>
                          <td class="fs15 fw700 text-right"> <?php echo $row['judge_name'] ?></td>
                      </tr>
                      <tr>
                          <td>FILE No</td>
                          <td class="fs15 fw700 text-right"> <?php echo $row['file_no'] ?></td>
                      </tr>
                      <tr>
                          <td>FILE Date</td>
                          <td class="fs15 fw700 text-right"> <?php echo $row['file_date'] ?></td>
                      </tr>
                    </tbody>
                 </table>
            </div>
            <div class="col-md-6 hidden-small">
  
                <table class="table">
                    <tbody>
                      <h5 class="text-center">Case Information</h5>
                      <tr>
                          <td>Case Status</td>
                          <td class="fs15 fw700 text-right"> <?php echo $row['case_status'] ?></td>
                      </tr>
                      <tr>
                          <td>Case Number</td>
                          <td class="fs15 fw700 text-right"> <?php echo $row['case_number'] ?></td>
                      </tr>
                      <tr>
                          <td>Case Description</td>
                          <td class="fs15 fw700 text-right"> <?php echo $row['case_description'] ?></td>
                      </tr>
                      <tr>
                          <td>Next Hearing Date</td>
                          <td class="fs15 fw700 text-right"> <?php echo $row['case_hearing_next_date'] ?></td>
                      </tr>

                      <tr>
                          <td>Hearing Purpose</td>
                          <td class="fs15 fw700 text-right"> <?php echo $row['case_hearing_purpose'] ?></td>
                      </tr>
                    </tbody>
                 </table>
            </div>

            
      </div>


      <button class="btn btn-success" id="printNow">Print</button>
      <a href="cases.php" class="btn btn-dark">Back</a>


        
        
          
      </div> <!-- End Card Body -->
    </div> <!-- End Card -->

  </div><!--  End Page Content -->
</div><!--  End Page Wrapper -->




<!--End page wrapper -->


<?php include('includes/footer.php'); ?>


<script>
  $('#printNow').on('click', function () {
    var newHTML = $('.card').html();
    $('body').html(newHTML);
    window.print();
  });
</script>


