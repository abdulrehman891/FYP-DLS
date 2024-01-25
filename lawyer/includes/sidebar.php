<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
                <div>
            <h4 class="logo-text">DLS</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="./index.php">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <?php
$conn=mysqli_connect("localhost","root","","dls2");
if(!(isset($_SESSION))){
    session_start();
}
$role=$_SESSION['lawyer_status'];
$sql="SELECT * FROM `user_manegment_role_access` WHERE r_id='$role'";
$run=mysqli_query($conn,$sql);
$fet=mysqli_fetch_array($run);

        //  echo "<pre>";
        //        print_r($fet);
        //  echo "</pre>";
        //  echo $fet['r_access'];

if($fet['client'] == 'clients' || $fet['access']== 'all'){
?>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-user-plus"></i>
                </div>
                <div class="menu-title">Clients</div>
            </a>
            <ul>

                <li> <a href="./clients.php"><i class="bx bx-right-arrow-alt"></i>View Clients</a>
                </li>
                <!-- <li> <a href="./addClient1.php"><i class="bx bx-right-arrow-alt"></i>Add Client</a>
                </li> -->
                <li> <a href="./clientRequest.php"><i class="bx bx-right-arrow-alt"></i>Requests</a>
                </li>

            </ul>
        </li>
        <?php
}
        if($fet['casee'] == 'case' || $fet['access']== 'all'){
?>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fas fa-gavel fa-sm"></i>
                </div>
                <div class="menu-title">Cases</div>
            </a>
            <ul>

                <li> <a href="./cases.php"><i class="bx bx-right-arrow-alt"></i>View Cases</a>
                </li>
                <li> <a href="./addCase.php"><i class="bx bx-right-arrow-alt"></i>Add Case</a>
                </li>

            </ul>
        </li>
        <?php
}
        if($fet['appoinment'] == 'appoinment' || $fet['access']== 'all'){
?>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fas fa-calendar-plus fa-sm"></i>
                </div>
                <div class="menu-title">Appointments</div>
            </a>
            <ul>

                <li> <a href="./appointments.php"><i class="bx bx-right-arrow-alt"></i>View Appointments</a>
                </li>
                <li> <a href="./addAppointment.php"><i class="bx bx-right-arrow-alt"></i>Add Appointment</a>
                </li>

            </ul>
        </li>
        <?php
}
        if($fet['team_member'] == 'team_member' || $fet['access']== 'all'){
?>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fas fa-users-cog fa-sm"></i>
                </div>
                <div class="menu-title">Team Members</div>
            </a>
            <ul>

                <li> <a href="./members.php"><i class="bx bx-right-arrow-alt"></i>Members</a>
                </li>
                <li> <a href="./memberroles.php"><i class="bx bx-right-arrow-alt"></i>Role</a>
                </li>

            </ul>
        </li>
        <?php
}
        if($fet['task'] == 'tasks' || $fet['access']== 'all'){
?>
        <li>
            <a href="tasks.php">
                <div class="parent-icon"><i class="fas fa-tasks"></i>
                </div>
                <div class="menu-title">Tasks</div>
            </a>
        </li>

        <?php
}
        if($fet['user'] == 'user manegment' || $fet['access']== 'all'){
?>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-user"></i>
                </div>
                <div class="menu-title">User</div>
            </a>
            <ul>

                <li> <a href="./add_user_role.php"><i class="bx bxs-shopping-bags"></i>User Role</a>
                </li>

                <!-- <li> <a href="#"><i class="bx bxs-show"></i>View User Role</a>
        </li> -->

        <li> <a href="./addrole.php"><i class="bx bxs-shopping-bags"></i>Add Role</a>
        </li>
        <li> <a href="./view_role.php"><i class="bx bxs-show"></i>View Role</a>
        </li>

    </ul>
    
    </li>
    <?php
}
        if($fet['setting'] == 'setting' || $fet['access']== 'all'){
?>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fas fa-cog"></i>
                </div>
                <div class="menu-title">Settings</div>
            </a>
            <ul>

                <li> <a href="caseType.php"><i class="bx bx-right-arrow-alt"></i>Case Type</a>
                </li>
                <li> <a href="case_category.php"><i class="bx bx-right-arrow-alt"></i>Case Category</a>
                </li>
                <li> <a href="case_sub_category.php"><i class="bx bx-right-arrow-alt"></i>Case Sub Category</a>
                </li>
                <li> <a href="courts.php"><i class="bx bx-right-arrow-alt"></i>Court</a>
                </li>
                <li> <a href="courtType.php"><i class="bx bx-right-arrow-alt"></i>Court Type</a>
                </li>

                <li> <a href="court_name.php"><i class="bx bx-right-arrow-alt"></i>Court Name</a>
                </li>
                
                </li>
                <li> <a href="province.php"><i class="bx bx-right-arrow-alt"></i>Province</a>
                </li>
                <li> <a href="district.php"><i class="bx bx-right-arrow-alt"></i>District</a>
                </li>
                <li> <a href="tehsil.php"><i class="bx bx-right-arrow-alt"></i>Tehsil</a>
                </li>
                <li> <a href="police_station.php"><i class="bx bx-right-arrow-alt"></i>Police Station</a>
                </li>
                <li> <a href="act_type.php"><i class="bx bx-right-arrow-alt"></i>Act</a>
                </li>

            </ul>
        </li>

        <?php
}

?>
   
    </ul>
    <!--end navigation-->
</div>