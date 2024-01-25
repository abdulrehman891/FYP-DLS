<?php


include('includes/connection.php');

if (!isset($_SESSION['lawyer_email'])) {
    header('Location:lawyerLogin.php');
} 

include('includes/header.php'); 

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
        <hr />

        <div class="card">

            <div class="card-body">

                <div class="table-responsive">


                    </ul>

                    <div class="tab-content mt-2" id="myTabContent">
                        <div class="tab-pane fade show active border-0" id="rcases" role="tabpanel"
                            aria-labelledby="home-tab">
                            <table id="example2" class="table table-striped table-bordered example2">
                                <thead class="">
                                    <tr>
                                        
                                        <th>Client</th>
                                        <th>Petitioner vs Respondent</th>
                                        <th>Area</th>
                                        <th>Court Detail</th>
                                        <th>Case Detail</th>
                                        <th>Hearing Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                            // $lawyerid=$_SESSION['lawyer_id'];

                            $lawyer_key = $_SESSION['lawyer_id'];
                            if ($_SESSION['user'] == 'USER') {
                                                            
                            
                            $sql1 = "SELECT * FROM `lawyer_user_access` WHERE `user_access_id`= '$lawyer_key'";
                              $result1 = mysqli_query($conn, $sql1);
                              $row = mysqli_fetch_assoc($result1);
                              $lawyer_key=$row['lawer_key'];
                              
                            }


                            $sql="SELECT * FROM add_case INNER JOIN `client` ca ON `add_case`.client_name=ca.client_id INNER JOIN `client` cb  ON `add_case`.cnic=cb.client_id INNER JOIN `client` cc ON `add_case`.client_mobile=cc.client_id INNER JOIN `province` ON `add_case`.province=`province`.pro_id INNER JOIN `district` ON `add_case`.district=`district`.dc_id INNER JOIN `tehsil` ON `add_case`.tehsil=`tehsil`.th_id INNER JOIN `court` ON `add_case`.court=`court`.cou_id INNER JOIN `court_type` ON `add_case`.court_type=`court_type`.coid INNER JOIN `court_name` ON `add_case`.court_name=`court_name`.c_id INNER JOIN `case_type` ON `add_case`.case_tye=`case_type`.case_id INNER JOIN `case_category` ON `add_case`.case_category=`case_category`.case_id INNER JOIN `view_sub_category` ON `add_case`.case_sub_category=`view_sub_category`.case_sub_id INNER JOIN `police_station` ON `add_case`.police_station=`police_station`.po_id INNER JOIN `act` ON `add_case`.act=`act`.act_id WHERE la_id='$lawyer_key'"; 

                            $run=mysqli_query($conn,$sql);

                            while ($fet=mysqli_fetch_array($run)) {
                            ?>
                                    <tr>
                                        
                                        <td>

                                            Name : <b><?php echo $fet["client_name"]; ?></b> <br />
                                            CNIC : <b><?php echo $fet["client_cnic"]; ?></b> <br />
                                            Mobile : <b><?php echo $fet["client_mobile"]; ?></b> <br />
                                        </td>

                                        <td>
                                            Petitioner: <b> <?php echo $fet["petitioner_name"]; ?></b> <br />
                                            Pet. Advocate: <b> <?php echo $fet["p_advocate_name"]; ?></b> <br />
                                            Respondent: <b><?php echo $fet["respondent_name"]; ?> </b> <br />

                                            Res. Advocate: <b> <?php echo $fet["r_advocate_name"]; ?></b> <br />
                                        </td>
                                        <td>
                                            Province : <b><?php echo $fet["province"]; ?></b> <br />
                                            District: <b><?php echo $fet["district"]; ?></b> <br />
                                            Tehsil :<b><?php echo $fet["th_name"]; ?></b>

                                        </td>
                                        <td>
                                            Court : <b><?php echo $fet["cou_name"]; ?></b> <br />
                                            Court Type : <b><?php echo $fet["cotype"]; ?></b> <br />
                                            Court Name :<b><?php echo $fet["court_name"]; ?></b> <br />
                                            Judge :<b><?php echo $fet["judge"]; ?></b> <br />


                                        </td>
                                        <td>
                                            Case : <b><?php echo $fet["case_type"]; ?></b> Category :
                                            <b><?php echo $fet["case_category"]; ?></b> Sub Category :
                                            <b><?php echo $fet["sub_category"]; ?></b> <br />
                                            No. : <b><?php echo $fet["case_number"]; ?></b> Date :
                                            <b><?php echo $fet["case_date"]; ?></b> <br />
                                            CNR : <b><?php echo $fet["cnr"]; ?></b> Reg. Date:
                                            <b><?php echo $fet["registration_date"]; ?></b> <br />
                                            Police Station : <b><?php echo $fet["policestation"]; ?></b> FIR No.:
                                            <b><?php echo $fet["fir_number"]; ?></b> FIR Date:
                                            <b><?php echo $fet["fir_date"]; ?></b><br />
                                            File No. : <b><?php echo $fet["file_number"]; ?></b> File Date.:
                                            <b>file_date</b> <br />
                                            ACT. : <b><?php echo $fet["act"]; ?></b> Under Section:
                                            <b><?php echo $fet["under_section"]; ?></b> <br />

                                        </td>
                                        <td>Last Hearing: <b><?php echo $fet["last_date"]; ?></b> <br>
                                            Next Hearing: <b><?php echo $fet["next_date"]; ?></b> <br /></td>
                                        <td class="text-center"> <b><?php echo $fet["purpose_of_hearing"]; ?></b> </td>

                                        <td>
                                            <div class="dropdown">
                                                <a class="text-first" type="button" id="dropdownMenuButton1"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-h" style="font-size: 19px"></i>
                                                </a>
                                                <ul class="dropdown-menu shadow animated--fade-in"
                                                    aria-labelledby="dropdownMenuButton1">
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fas fa-eye"></i>
                                                            view
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="update_client_case.php?upid=<?php echo $fet['add_case_id']; ?>">
                                                            <i class="fas fa-pencil-alt"></i>
                                                            Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item delete"
                                                            data-id="<?php echo $fet['add_case_id']; ?>">
                                                            <i class="fas fa-trash"></i>
                                                            Delete
                                                        </a>
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



                            <!--End page wrapper -->

                            <?php include('includes/footer.php'); ?>
                            <script>
                           
                             /////DELETE///////

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
                                            url: './ajax/delete_client_case.php',
                                            type: 'POST',
                                            data: {
                                                id: tid
                                            },
                                            // data: {
                                            //     key: 'delpos',
                                            //     delid: id,
                                            // },
                                            success: function(result) {

                                                if (result == 1) {
                                                    Swal.fire({
                                                        toast: true,
                                                        icon: 'success',
                                                        title: 'Client case has been deleted',
                                                        animation: false,
                                                        position: 'top-right',
                                                        showConfirmButton: false,
                                                        timer: 3000,
                                                        timerProgressBar: true,
                                                        didOpen: (toast) => {
                                                            toast
                                                                .addEventListener(
                                                                    'mouseenter',
                                                                    Swal
                                                                    .stopTimer)
                                                            toast
                                                                .addEventListener(
                                                                    'mouseleave',
                                                                    Swal
                                                                    .resumeTimer
                                                                )

                                                        }
                                                    })
                                                    $(msg).closest("tr").fadeOut();
                                                } else if (result == 2) {
                                                    ({
                                                        toast: true,
                                                        icon: 'warning',
                                                        title: 'Client case has not been deleted',
                                                        animation: false,
                                                        position: 'top-right',
                                                        showConfirmButton: false,
                                                        timer: 3000,
                                                        timerProgressBar: true,
                                                        didOpen: (toast) => {
                                                            toast.addEventListener(
                                                                'mouseenter',
                                                                Swal
                                                                .stopTimer)
                                                            toast.addEventListener(
                                                                'mouseleave',
                                                                Swal
                                                                .resumeTimer)

                                                        }
                                                    })
                                                    // Swal.fire(
                                                    //     'Warning!',
                                                    //     'Your file has not been deleted.',
                                                    //     'warning'
                                                    // )
                                                } else {
                                                    alert("Error");
                                                }

                                            }
                                        });
                                    }
                                })
                            })
                            </script>