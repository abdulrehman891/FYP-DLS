<?php 
define("TITLE", "About Us");
define("PAGE", "About Us");
include('includes/header.php'); ?>


 <!-- Banner Start -->
  <div class="bg-first w-100 d-flex align-items-center justify-content-center" style="min-height: 250px;">

  <div class="img-overl"></div>

  <h1 class="text-white display-3">About <strong>Us</strong></h1>

  </div>
<!-- Banner End -->


    <!-- Our Mission Start -->
    <div class="container-fluid bg-second p-5 text-fourth">
      <div class="">
        <h2 class="text-center display-4 fw-bold">Our Mission</h2>
        <p class="px-5 text-center lh-lg">Our mission is to inspire, promote, and support people who want to to find the way out of the complicated situation, become successful and just live happily. So that we believe we can collectively heal the planet and transition into an era of global peace and prosperity.</p>
      </div>
    </div>
    <!-- Our Mission End -->


    <!-- image with text Start -->
    <div class="container-fluid bg-first p-5">
      <div class="row">
        <div class="col-md-6">
          <img src="assets/images/about-section.jpg" alt="" class="img-fluid">
        </div>
        <div class="col-md-6 text-white d-flex flex-column justify-content-center">
            
          <h1>These three have proven to:</h1>

          <p>
            <ol class="lh-lg fs-5">
              <li>Earn our clients' trust with us</li>
              <li>Build our reputation on a good soil</li>
              <li>Attract thousands of individuals and businesses, all of whom (98%) have successfully dealt with their legal conundrums with our timely and diligent help...</li>
            </ol>
          </p>

        </div>
      </div>
    </div>
    <!-- image with text End -->

    <!-- Why US Start -->
    <div class="contianer-fluid p-5">
      <p class="px-5 fs-2">Attract thousands of individuals and businesses, all of whom (98%) have successfully dealt with their legal conundrums with our timely and diligent help...</p>
      
      <p>
        <ul class="lh-lg ms-5">
          <li>A Commitment to Excellence</li>
          <li>A Passion for Justice</li>
          <li>An urge for fair pricing</li>
        </ul>
      </p> <br> <br>

      <p class="px-5 fw-bold fs-1">Why US ? </p>

      <div>
        <p class="text-center fs-3 fw-bolder">1. Success Rate</p>
        <p class="mx-5">While the yearly number of cases which we take totals to an insurmountable number, unparalleled by any other Houston, TX law firm, our percentage of wins is record-breaking too... Just to drop some statistics here, in more than 9000 cases that we have ever taken on, a whopping 98% of those (which is 9800+) were the cases which we eventually won...</p>
      </div>
      
      <div>
        <p class="text-center fs-3 fw-bolder">2. Urge for Justice</p>
        <p class="mx-5">With our legal principles and our desire for justice being our first and foremost value, we always try to diversify the range of cases which we take on. That is perfectly shown when you notice that our civil/business cases are divided absolutely evenly. That means that besides helping good, big and small businesses we also help thousands of small men and women!</p>
      </div>

      <div>
        <p class="text-center fs-3 fw-bolder">3. Affordable Legal Fees</p>
        <p class="mx-5">On par with our passion for justice and excellence, the third work ethic which we stand by is the fair pricing. While we have the most winning cases as opposed to any other Houston, TX law firm, we've also got the lowest pricing among them all. That is due to the simple fact, that in our opinion, a decent lawyer should charge a price that is nation-wide affordable!</p>
      </div>

    </div>
    <!-- Why US End -->

    <!-- Experience Start -->
    <section class="container-fluid bg-first text-white p-5 animate">
      <div class="row">
        <div class="col-lg-4 px-5">
          <h1 class="text-white mt-2 display-4">
            <strong class="text-third">3 Months</strong> of Experience in Various Cases</h1>
        </div>


        <div class="col-lg-4 px-5">
          <span class="display-1 fw-bolder">
            <span class="text-third counter">3.5<span class="text-third">K</span></span><span class="text-white">+</span>
          </span>
          <strong class="d-block text-white fs-5">Total Cases</strong>
          <p>These stunning number claims that people believe us.</p>
        </div>

        <div class="col-lg-4 px-5">
          <span class="display-1 fw-bolder">
            <span class="text-third counter">3</span><span class="text-third">K</span><span class="text-white">+</span>
          </span>
          <strong class="d-block text-white fs-5">Cases Win</strong>
          <p>Your Success is our happiness, You win your legal matters.</p>
        </div>


      </div>


      <div class="row">
        <div class="col-lg-4 px-5"></div>


        <div class="col-lg-4 px-5">
          <span class="display-1 fw-bolder">
            <span class="text-third counter"><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM client"));
              ?></span><span class="text-white">+</span>
          </span>
          <strong class="d-block text-white fs-5">Clients</strong>
          <p>Here is the total number of clients who are associated with our system .</p>
        </div>

        <div class="col-lg-4 px-5">
          <span class="display-1 fw-bolder">
            <span class="text-third counter"><?php 
                echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM lawyer"));
              ?></span><span class="text-white">+</span>
          </span>
          <strong class="d-block text-white fs-5">Lawyers</strong>
          <p>We hereby have all the experts lawyer with exepriced staff.</p>
        </div>


      </div>
    </section>
    <!-- Experience End -->



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


    <?php include('includes/footer.php'); ?>