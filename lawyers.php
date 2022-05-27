<?php 
define("TITLE", "Lawyers");
define("PAGE", "Lawyers");
include('includes/header.php'); ?>

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
                    <option value="criminal" class="select-item">criminal</option>
                    <option value="land" class="select-item">land</option>
                    <option value="divorce" class="select-item">divorce</option>
                    <option value="Finance" class="select-item">Finance</option>
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
           <div class="col-md-4 my-4 mycard">
                <div mx-auto class="card mx-auto" style="width: 18rem;">
                    <img src="assets/images/lawyers/lawyer1.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Anas Makki</h5>
                        <p class="text-muted">State of Art</p>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <div class="card-footer d-flex flex-row justify-content-between">
                        <div>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star "></i>
                            <i class="fa fa-star "></i>
                        </div>
                        <a href="#" class="btn btn-grey">Hire Me</a>
                    </div>
                </div>
           </div>
           <div class="col-md-4 my-4 mycard">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="assets/images/lawyers/lawyer2.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Mah Jabeen</h5>
                        <p class="text-muted">Criminal Expert</p>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <div class="card-footer d-flex flex-row justify-content-between">
                        <div>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star "></i>
                            <i class="fa fa-star "></i>
                        </div>
                        <a href="#" class="btn btn-grey">Hire Me</a>
                    </div>
                </div>
           </div>
           
           <div class="col-md-4 my-4 mycard">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="assets/images/lawyers/lawyer3.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Raheel Baig</h5>
                        <p class="text-muted">Divorce Law</p>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <div class="card-footer d-flex flex-row justify-content-between">
                        <div>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star "></i>
                            <i class="fa fa-star "></i>
                        </div>
                        <a href="#" class="btn btn-grey">Hire Me</a>
                    </div>
                </div>
           </div>
           <div class="col-md-4 my-4 mycard">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="assets/images/lawyers/lawyer3.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Zaila Jutt</h5>
                        <p class="text-muted">Divorce Law</p>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <div class="card-footer d-flex flex-row justify-content-between">
                        <div>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star "></i>
                            <i class="fa fa-star "></i>
                        </div>
                        <a href="#" class="btn btn-grey">Hire Me</a>
                    </div>
                </div>
           </div>
           <div class="col-md-4 my-4 mycard">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="assets/images/lawyers/lawyer4.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Amna Jamil</h5>
                        <p class="text-muted">Land Expert</p>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <div class="card-footer d-flex flex-row justify-content-between">
                        <div>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star "></i>
                            <i class="fa fa-star "></i>
                        </div>
                        <a href="#" class="btn btn-grey">Hire Me</a>
                    </div>
                </div>
           </div>

           <div class="col-md-4 my-4 mycard">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="assets/images/lawyers/lawyer5.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Anas Makki</h5>
                        <p class="text-muted">Banking & Finance Expert</p>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <div class="card-footer d-flex flex-row justify-content-between">
                        <div>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star "></i>
                            <i class="fa fa-star "></i>
                        </div>
                        <a href="#" class="btn btn-grey">Hire Me</a>
                    </div>
                </div>
           </div>
           <div class="col-md-4 my-4 mycard">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="assets/images/lawyers/lawyer6.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Ayesha Hanif</h5>
                        <p class="text-muted">Banking & Finance Expert</p>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <div class="card-footer d-flex flex-row justify-content-between">
                        <div>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star "></i>
                            <i class="fa fa-star "></i>
                        </div>
                        <a href="#" class="btn btn-grey">Hire Me</a>
                    </div>
                </div>
           </div>
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