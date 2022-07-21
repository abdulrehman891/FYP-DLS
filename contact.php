<?php 
define("TITLE", "Contact Us");
define("PAGE", "Contact Us");
include('includes/header.php') ?>

    <!-- Banner Start -->
    <div class="bg-first w-100 d-flex align-items-center justify-content-center" style="min-height: 250px;">

        <div class="img-overl"></div>

        <h1 class="text-white display-3">Contact <strong>Us</strong></h1>
        <div></div>
        


    </div>
    <!-- Banner End -->


    <!-- Contact Form Start -->

    <div class="container-fluid bg-second p-5">

        <div class="row">
            <div class="col-lg-6 p-5">
                <form class="text-fifth w-100">
                    <div class="row mb-2">
                        <div class="col-6">
                             <div class="form-group">
                                <label class="" for="fname">First name</label>
                                <input type="text" class="form-control custom-form" id="fname">
                                </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="" for="lname">Last name</label>
                                <input type="text" class="form-control custom-form" id="lname">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label class="" for="email">Email address</label>
                        <input type="email" class="form-control custom-form" id="email">
                    </div>
                    <div class="form-group mb-2">
                        <label class="" for="message">Message</label>
                        <textarea name="" class="form-control custom-form" id="message" cols="30" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-gold mb-2">Send Message</button>
                    </form>
            </div>
            <div class="col-lg-6 p-5">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3403.7715739257346!2d73.0946223144809!3d31.4479549578623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x392269d2ff7a2f5b%3A0xfe3c760a16a97137!2sMillat%20Chowk!5e0!3m2!1sen!2s!4v1649254813542!5m2!1sen!2s" width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

    </div>



    <!-- Contact Form End -->


    <!-- Call US start -->
    <div class="container-fluid bg-first p-5">
      <div class="row m-5 rounded-3 d-flex justify-content-center align-items-center" style="height: 400px; background-image: url('assets/images/banner.jpg'); background-size: cover;">
        <div class="col-sm-7 text-white text-center">
          <h2>Let's get started. Call us Now for a Free Consultation</h2>
          <p class="">
            <a href="tel:+923020006566" class="btn btn-gold mt-3"> <i class="fa fa-phone" aria-hidden="true"></i> Call Us Now</a>
          </p>
        </div>
      </div>
    </div>

    <!-- Call US End -->

    <?php include('includes/footer.php') ?>
