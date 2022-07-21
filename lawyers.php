
<?php 
define("TITLE", "Lawyers");
define("PAGE", "Lawyers");
include('includes/header.php'); 

// Starting Session
if(!isset($_SESSION)){
    session_start();
}

?>

    <!-- Banner Start -->
    <div class="bg-first w-100 d-flex align-items-center justify-content-center" style="min-height: 250px;">

        <div class="img-overl"></div>

        <h1 class="text-white display-3">Our <strong>Lawyers</strong></h1>

    </div>
    <!-- Banner End -->

    <!-- Our Lawyers Start -->
    <div class="container-fluid p-5">
        <div class="row d-flex justify-content-between py-4">
            <div class="col-auto px-5 ms-4 d-flex align-items-center" >
                <select class="form-select" aria-label="Default select example search" id="aioConceptName">
                    <option value=" " selected class="select-item">Select Lawyer Category</option>
                    <option value=" " class="select-item">See All</option>
                    <option value="business lawyer" class="select-item">Business Lawyer</option>
                    <option value="constitutional lawyer" class="select-item">Constitutional Lawyer</option>
                    <option value="family lawyer" class="select-item">Family Lawyer</option>
                    <option value="intellectual property lawyer" class="select-item">Intellectual Property Lawyer</option>
                    <option value="property Lawyer" class="select-item">Property Lawyer</option>
                    <option value="public interest lawyer" class="select-item">Public Interest Lawyer</option>
                    <option value="civil rights lawyer" class="select-item">Civil Rights Lawyer</option>
                </select>
            </div>
            <div class="col-auto me-4 pe-5">
                <div class="search-box">
                    <button class="btn-search"><i class="fas fa-search"></i></button>
                    <input type="text" id="search" class="input-search" placeholder="Type name of any Lawyer...">
                </div>
            </div>
        </div>



        <div class="row d-flex " id="myDIV">


        <?php
        
        $sql = "SELECT * FROM lawyer WHERE lawyer_status = 1";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)) {

        
        ?>
           <div class="col-md-4 my-4 mycard">
                <div mx-auto class="card mx-auto" style="width: 18rem;">
                    <img src="lawyer/assets/images/lawyers/<?php echo $row['lawyer_image'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['lawyer_fname'] . " " .  $row['lawyer_lname'] ?></h5>
                        <p class="text-muted"><?php echo $row['lawyer_spec'] ?></p>
                        <p class="card-text"><?php echo $row['lawyer_description'] ?></p>
                    </div>
                    <div class="card-footer d-flex flex-row justify-content-between">
                        <div>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star "></i>
                            <i class="fa fa-star "></i>
                        </div>
                        <form action="lawyerProfile.php" method="get">
                            <input type="hidden" name="userId" value="<?php if(isset($_SESSION['user_id'])) echo $_SESSION['user_id'] ?>">
                            <input type="hidden" name="lawyerId" value="<?php echo $row['lawyer_id'] ?>">
                            <input type="hidden" name="lawyerEmail" value="<?php echo $row['lawyer_email'] ?>">
                            <button type="submit" class="btn btn-grey">Profile</button>
                        </form>
                       
                    </div>
                </div>
           </div>

        <?php } ?>

           
        </div>
    </div>
    <!-- Our Lawyers End -->

<?php 

include('includes/footer.php'); ?>
    <script>
        $(document).ready(function(){
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myDIV .mycard").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $("#aioConceptName").on("change", function(){
            var value = $("#aioConceptName").val();
            console.log(value);
            $("#myDIV .mycard").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        });



    </script>