<?php 
define('TITLE', 'Edit Case');
include('includes/header.php'); ?>



<?php
if(isset($_REQUEST['update'])){
    $lawyerId = $_SESSION['lawyer_id'];
    $clientName = $_REQUEST['clientName'];
    $clientEmail = $_REQUEST['clientEmail'];
    $clientMobileNo = $_REQUEST['clientMobileNo'];
    $pName = $_REQUEST['pName'];
    $pAdvocateName = $_REQUEST['pAdvocateName'];
    $rName = $_REQUEST['rName'];
    $rAdvocateName = $_REQUEST['rAdvocateName'];
    $province = $_REQUEST['province'];
    $district = $_REQUEST['district'];
    $courtType = $_REQUEST['courtType'];
    $courtName = $_REQUEST['courtName'];
    $judgeName = $_REQUEST['judgeName'];
    $caseType = $_REQUEST['caseType'];
    $caseStatus = $_REQUEST['caseStatus'];
    $caseNumber = $_REQUEST['caseNumber'];
    $caseDescription = $_REQUEST['caseDescription'];
    $policeStationName = $_REQUEST['policeStationName'];
    $firNumber = $_REQUEST['firNumber'];
    $firDate = $_REQUEST['firDate'];
    $fileNumber = $_REQUEST['fileNumber'];
    $fileDate = $_REQUEST['fileDate'];
    $actName = $_REQUEST['actName'];
    $underSection = $_REQUEST['underSection'];
    $caseHearingLastDate = $_REQUEST['caseHearingLastDate'];
    $caseHearingNextDate = $_REQUEST['caseHearingNextDate'];
    $caseHearingPurpose = $_REQUEST['caseHearingPurpose'];

 
    $sql = "UPDATE cases SET client_name='$clientName', lawyer_id='$lawyerId', client_email='$clientEmail', client_mobile_no='$clientMobileNo', p_name='$pName', p_advocate_name='$pAdvocateName', r_name='$rName', r_advocate_name='$rAdvocateName', province='$province', district='$district', court_type='$courtType', court_name='$courtName', judge_name='$judgeName', case_type='$caseType', case_status='$caseStatus', case_number='$caseNumber', case_description='$caseDescription', police_station='$policeStationName', fir_number='$firNumber', fir_date='$firDate', file_no='$fileNumber', file_date='$fileDate', act_name='$actName', under_section = '$underSection', case_hearing_last_date = '$caseHearingLastDate', case_hearing_next_date = '$caseHearingNextDate', case_hearing_purpose = '$caseHearingPurpose' WHERE case_id = '".$_REQUEST['caseId']."'";

    $result = mysqli_query($conn, $sql);
    if($result){
        $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    
        <strong>Update!</strong> Case Has been registered!
    </div>';
    }else {
        $msg = '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    
        <strong>Sorry!</strong> System is busy!
    </div>';
    }

}
?>


<!--start page wrapper -->
<div class="page-wrapper">
			<div class="page-content">
			<div class="row">
            <div class="col-xl-9 mx-auto">
                <div class="card border-top border-0 border-4 border-dark">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div>
                                <!-- <i class="bx bxs-user me-1 font-22 text-primary"></i>
                                     -->
                            </div>
                            <i class="fas fa-gavel fa-fw "></i>
                            <h5 class="mb-0 text-dark">Update Case Details</h5>
                        </div>
                       
                        <?php if(isset($msg)) echo $msg; ?>
                        
                        

                        <form id="data" method="get" class="row g-3 needs-validation" novalidate>


                        <?php 
                        $sql1 = "SELECT * FROM cases WHERE case_id = '".$_REQUEST['caseId']."'";
                        $result1 = mysqli_query($conn, $sql1);
                        $row1 = mysqli_fetch_assoc($result1);

                        ?>


                        <h4 class="text-center">Client Information</h4>
                        <hr>
                            <div class="col-md-4">
                                <label for="clientName" class="form-label">Client Name</label>
                                <select id="clientName" name="clientName" class="form-select" value="<?php echo $row1['client_name'] ?>" required>
                                    <option value="">Select</option>
                                    <option value="">My Name is Anas </option>
                                    

                                    <?php
                                    $sql = "SELECT * FROM client WHERE lawyer_id = '".$_SESSION['lawyer_id']."' AND is_assign = 1 ";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result)){ ?>

                                    <option value="<?php echo $row['client_name']; ?>" ><?php echo $row['client_name']; ?></option>                             
                                    
                                <?php }
                                    ?>

                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="clientEmail" class="form-label">Email</label>
                                <input type="email" name="clientEmail" class="form-control" id="clientEmail" required readonly>
                            </div>
                           
                           
                            <div class="col-md-4">
                                <label for="clientMobileNo" class="form-label">Mobile No</label>
                                <div class="input-group">
                                    <span class="input-group-text">+92</span>
                                    <input type="text" id="clientMobileNo" name="clientMobileNo" class="form-control" aria-label="clientMobileNo"  readonly required>
                                </div>
                            </div>

                            
                            
                          
                            <h4 class="text-center">Party Information</h4>
                            <hr>
                            <div class="col-md-6">
                                <label for="pName" class="form-label">Petitioner Name</label>
                                <input type="text" name="pName" class="form-control" id="pName" value="<?php echo $row1['p_name'] ?>" onkeypress="isInputAlphabet(event)" required>
                            </div>
                            <div class="col-md-6">
                                <label for="pAdvocateName" class="form-label">Advocate Name</label>
                                <input type="text" class="form-control" name="pAdvocateName" placeholder="Petitioner Advocate" id="pAdvocateName" value="<?php echo $row1['p_advocate_name'] ?>" onkeypress="isInputAlphabet(event)" required>
                            </div>
                            <div class="col-md-6">
                                <label for="rName" class="form-label">Respondent Name</label>
                                <input type="text" class="form-control" name="rName" id="rName" value="<?php echo $row1['r_name'] ?>" onkeypress="isInputAlphabet(event)" required>
                            </div>
                            <div class="col-md-6">
                                <label for="rAdvocateName" class="form-label">Advocate Name</label>
                                <input type="text" class="form-control" name="rAdvocateName" placeholder="Respondent Advocate" id="rAdvocateName" value="<?php echo $row1['r_advocate_name'] ?>" onkeypress="isInputAlphabet(event)" required>
                            </div>


                            <h4 class="text-center">Area</h4>
                            <hr>

                            <div class="col-md-6">
                                <label for="province" class="form-label">Province</label>
                                <select id="province" name="province" class="form-select" required>

                                    <option value="">Select Province</option>
                                    
                                    <?php
                                    $sql = "SELECT * FROM province WHERE lawyer_id = '".$_SESSION['lawyer_id']."'";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <option value="<?php echo $row['province_id'] ?>"><?php echo $row['province_name'] ?></option>

                                    <?php } ?>

                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="district" class="form-label">District</label>
                                <select id="district" name="district" class="form-select" required>
                                    <option value=""> Select District</option>
                                </select>
                            </div>
                            
                            <h4 class="text-center">Court</h5>
                            <hr>
                            
                            <div class="col-md-4">
                                <label for="courtType" class="form-label">Court Type</label>
                                <select id="courtType" name="courtType" class="form-select" required>
                                    <option value=""> Select Court Type</option>
                                    <?php 
                                    $sql = "SELECT * FROM courttype WHERE lawyer_id = '".$_SESSION['lawyer_id']."'";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result)){ ?>
                                        <option><?php echo $row['court_type_name'] ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="courtName" class="form-label">Court Name</label>
                                <select id="courtName" name="courtName" class="form-select" required>

                                    <option value="">Select Court Name</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                
                                <label for="judgeName" class="form-label">Judge Name</label>
                                <select id="judgeName" name="judgeName" class="form-select" required>
                                    <option value="" >Select Judge</option>

                                    <?php 
                                    $sql = "SELECT * FROM judges WHERE lawyer_id = '".$_SESSION['lawyer_id']."'";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result)){ ?>
                                        <option><?php echo $row['judge_name'] ?></option>
                                    <?php }
                                    ?>
                                </select>

                            </div>


                            <h4 class="text-center">Case</h4>
                            <hr>

                            <div class="col-md-4">
                                <label for="caseType" class="form-label">Case Type</label>
                                <select id="caseType" name="caseType" class="form-select" required>
                                    <option value="">Select Case Type</option>
                                    <?php 
                                    $sql = "SELECT * FROM casetype WHERE lawyer_id = '".$_SESSION['lawyer_id']."'";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result)){ ?>
                                        <option><?php echo $row['case_type_name'] ?></option>
                                    <?php }
                                    ?>
                                                                       
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="caseStatus" class="form-label">Case Status</label>
                                <select id="caseStatus" name="caseStatus" class="form-select" required>
                                    <option value="">Select Case Status</option>
                                    <?php 
                                    $sql = "SELECT * FROM casestatus WHERE lawyer_id = '".$_SESSION['lawyer_id']."'";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result)){ ?>
                                        <option><?php echo $row['casestatus_name'] ?></option>
                                    <?php }
                                    ?>

                                </select>
                            </div>
                            
                            <div class="col-md-4">
                                <label for="caseNumber" class="form-label">Case Number</label>
                                <input type="text" name="caseNumber" class="form-control" id="caseNumber" value="<?php echo $row1['case_number'] ?>" onkeypress="isInputNumber(event)" required>
                            </div>

                           <div class="mb-3">
                             <label for="caseDescription" class="form-label">Case Description</label>
                             <textarea class="form-control" name="caseDescription" id="caseDescription" rows="3" required><?php echo $row1['case_hearing_purpose'] ?></textarea>
                           </div>

                            
                            <h4 class="text-center">FIR Details</h4>
                            <hr>
                            
                            <div class="col-md-4">
                                <div class="mb-3">
                                  <label for="policeStationName" class="form-label">Police Station</label>
                                  <input type="text" class="form-control" name="policeStationName" id="policeStationName" value="<?php echo $row1['police_station'] ?>" placeholder="Enter Police Station Name" required>
                                  
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="firNumber" class="form-label">FIR Number</label>
                                <input type="text" name="firNumber" class="form-control" id="firNumber" value="<?php echo $row1['fir_number'] ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label for="firDate" class="form-label">FIR Date</label>
                                <input type="date" name="firDate" class="form-control" id="firDate" value="<?php echo $row1['fir_date'] ?>" required>
                            </div>



                            <h4 class="text-center">Filing Number</h4>
                            <hr>

                            <div class="col-md-6">
                                <label for="fileNumber" class="form-label">File Number</label>
                                <input type="text" name="fileNumber" class="form-control" id="fileNumber" value="<?php echo $row1['file_no'] ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="fileDate" class="form-label">File Date</label>
                                <input type="date" name="fileDate" class="form-control" id="fileDate" value="<?php echo $row1['file_date'] ?>" required>
                            </div>

                            <h4 class="text-center">ACT</h4>
                            <hr>
                            

                            <div class="col-md-6">
                                <label for="actName" class="form-label">Act Name</label>
                                <input type="text" name="actName" class="form-control" id="actName" value="<?php echo $row1['act_name'] ?>" required>
                            </div>

                            <div class="col-md-6">
                                <label for="underSection" class="form-label">Under Section</label>
                                <input type="text" name="underSection" class="form-control" id="underSection" value="<?php echo $row1['under_section'] ?>" required>
                            </div>

                            <h4 class="text-center">Case Hearing</h4>
                            <hr>
                            <div class="col-md-6">
                                <label for="caseHearingLastDate" class="form-label">Last Date</label>
                                <input type="date" name="caseHearingLastDate" class="form-control" id="caseHearingLastDate" value="<?php echo $row1['case_hearing_last_date'] ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="caseHearingNextDate" class="form-label">Next Date</label>
                                <input type="date" name="caseHearingNextDate" class="form-control" id="caseHearingNextDate" value="<?php echo $row1['case_hearing_last_date'] ?>" required>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                  <label for="caseHearingPurpose" class="form-label">Purpose Of Hearing</label>
                                  <textarea class="form-control" name="caseHearingPurpose" id="caseHearingPurpose" rows="3" required><?php echo $row1['case_hearing_purpose'] ?></textarea>
                                </div>
                            </div>

                            <input type="hidden" name="caseId" value="<?php echo $row1['case_id'] ?>">

                            <div class="col-12">
                                <a href="cases.php" class="btn btn-secondary">Back</a>
                                <button type="submit" id="update" name="update" class="btn btn-outline-dark">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
				<!--end row-->
			</div>
		</div>
		<!--end page wrapper -->


<?php include('includes/footer.php'); ?>
		
<script>
    // Select Email and Phone No on Client Name Change
    $('#clientName').on('change', function () {
        var clientName = $(this).val();
        $.ajax({
            type: "post",
            url: "ajax/case.php",
            data: {
                clientName : clientName
            },
            success: function (response) {
                var data = JSON.parse(response);
                var clientEmail = data['client_email'];
                var clientMobileNo = data['client_mobile'];
                $('#clientEmail').val(clientEmail);
                $('#clientMobileNo').val(clientMobileNo);

            }
        });  
    });

    // SELECT DISTRICT on Province Change
    $('#province').on('change', function () {
        var province = $(this).val();

        $.ajax({
            type: "post",
            url: "ajax/case1.php",
            data: {provinceId : province},
            success: function (response) {

               $('#district').html(response);
                
            }
        });
    });
    
    
    
    // SELECT Court on Court Type Change
    $('#courtType').on('change', function () {
        var courtTyeName = $(this).val();
        

        $.ajax({
            type: "post",
            url: "ajax/case2.php",
            data: {courtTypeName : courtTyeName},
            success: function (response) {

               $('#courtName').html(response);
                
            }
        });
    });


</script>