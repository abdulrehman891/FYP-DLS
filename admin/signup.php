<?php
include("includes/connection.php");
include("includes/header.php");

?>
<?php
if (isset($_POST['sub'])) {
	$lfname=mysqli_real_escape_string($conn,$_POST['lfname']);
	$llname=mysqli_real_escape_string($conn,$_POST['llname']);
	$ledu=mysqli_real_escape_string($conn,$_POST['ledu']);
	$lspec=mysqli_real_escape_string($conn,$_POST['lspec']);
	$lexp=mysqli_real_escape_string($conn,$_POST['lexp']);
	$llfname=mysqli_real_escape_string($conn,$_POST['llfname']);
	$lphone=mysqli_real_escape_string($conn,$_POST['lphone']);
	$laddress=mysqli_real_escape_string($conn,$_POST['laddress']);
	$limage=$_FILES['limage']['name'];
	$lemail=mysqli_real_escape_string($conn,$_POST['lemail']);
	$lpass=mysqli_real_escape_string($conn,$_POST['lpass']);
	$lcountry=mysqli_real_escape_string($conn,$_POST['lcountry']);
	$lstatus=mysqli_real_escape_string($conn,$_POST['lstatus']);
	$lcond=mysqli_real_escape_string($conn,$_POST['lcond']);
	if ($lfname==""||$llname==""||$ledu==""||$lspec==""||$lexp==""||$llfname==""||$lphone==""||$laddress==""||$limage==""||$lemail==""||$lpass==""||$lcountry==""||$lstatus==""||$lcond=="") {
		?>
<script>
alert("Please fill all fields!");
</script>
<?php
	}
	else{
		$sql="INSERT INTO `login`(`lfname`, `llname`, `ledu`, `lspec`, `lexp`, `llfname`, `lphone`, `laddress`, `limage`, `lemail`, `lpass`, `lcountry`, `lstatus`, `lcond`) VALUES ('$lfname','$llname','$ledu','$lspec','$lexp','$llfname','$lphone','$laddress','$limage','$lemail','$lpass','$lcountry','$lstatus','$lcond')";
	$run=mysqli_query($conn,$sql);
    move_uploaded_file($_FILES['limage']['tmp_name'],"./image/".$limage);
	if($run){
		?>
<script>
alert("Data has been submited!");
</script>
<?php
	}
	else {
		?>
<script>
alert("Data has not been submited!");
</script>
<?php
	}
	}
	
}




?>

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                    <div class="col mx-auto">
                        <div class="my-4 text-center">
                            <img src="assets/images/logo-img.png" width="180" alt="" />
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="">Sign Up</h3>
                                        <p>Already have an account? <a href="signin.php">Sign in here</a>
                                        </p>
                                    </div>
                                    <div class="d-grid">
                                        <a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span
                                                class="d-flex justify-content-center align-items-center">
                                                <img class="me-2" src="assets/images/icons/search.svg" width="16"
                                                    alt="Image Description">
                                                <span>Sign Up with Google</span>
                                            </span>
                                        </a> <a href="javascript:;" class="btn btn-facebook"><i
                                                class="bx bxl-facebook"></i>Sign Up with Facebook</a>
                                    </div>
                                    <div class="login-separater text-center mb-4"> <span>OR SIGN UP WITH EMAIL</span>
                                        <hr />
                                    </div>
                                    <div class="form-body">
                                        <form class="row g-3" method="POST" enctype="multipart/form-data">
                                            <div class="col-sm-6">
                                                <label for="fname" class="form-label">First Name</label>
                                                <input type="text" name="lfname" class="form-control" id="fname"
                                                    placeholder="Abdul">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="lastname" class="form-label">Last Name</label>
                                                <input type="text" name="llname" class="form-control" id="lastname"
                                                    placeholder="Rehman">
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="education" class="form-label">Education</label>
                                                <input type="text" name="ledu" class="form-control" id="education"
                                                    placeholder="LLB">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="specialization" class="form-label">Specialization</label>
                                                <input type="text" name="lspec" class="form-control" id="specialization"
                                                    placeholder="Criminal lawyer">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="experience" class="form-label">Experience</label>
                                                <input type="text" name="lexp" class="form-control" id="experience"
                                                    placeholder="5-Years">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="LFname" class="form-label">Law Firm Name</label>
                                                <input type="text" name="llfname" class="form-control" id="LFname"
                                                    placeholder="Firm name">
                                            </div>
                                            <div class="col-12">
                                                <label for="phone" class="form-label">Phone No#</label>
                                                <input type="text" name="lphone" class="form-control" id="phone"
                                                    placeholder="+92 5765680">
                                            </div>
                                            <div class="col-12">
                                                <label for="address" class="form-label">Address</label>
                                                <textarea class="form-control" name="laddress" id="address"
                                                    placeholder="" cols="30" rows="2"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <label for="image" class="form-label">Upload Image</label>
                                                <input type="file" class="form-control" name="limage" id="image">
                                            </div>
                                            <div class="col-12">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input type="email" class="form-control" name="lemail" id="email"
                                                    placeholder="example@user.com">
                                            </div>
                                            <div class="col-12">
                                                <label for="password" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0"
                                                        name="lpass" id="password" value="12345678"
                                                        placeholder="Enter Password"> <a href="javascript:;"
                                                        class="input-group-text bg-transparent"><i
                                                            class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="country" class="form-label">Country</label>
                                                <select class="form-select" name="lcountry" id="country"
                                                    aria-label="Default select example">
                                                    <option selected value="India">India</option>
                                                    <option value="UK">United Kingdom</option>
                                                    <option value="USA">America</option>
                                                    <option value="USE">Dubai</option>
                                                </select>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="lstatus" id="status"
                                                    value="lawyer" checked>
                                                <label class="form-check-label" for="status">
                                                    Lawyer
                                                </label>
                                                <br>
                                                <input class="form-check-input" type="radio" name="lstatus" id="status"
                                                    value="admin">
                                                <label class="form-check-label" for="status">
                                                    Admin
                                                </label>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="lcond"
                                                        id="codition" value="agree">
                                                    <label class="form-check-label" for="codition">I read and agree to
                                                        Terms & Conditions</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" name="sub" class="btn btn-primary"><i
                                                            class='bx bx-user'></i>Sign up</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--Password show & hide js -->
    <script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
    });
    </script>
    <!--app JS-->
    <script src="assets/js/app.js"></script>
</body>

</html>