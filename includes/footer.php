    <!-- Footer Start -->

    <!-- Bring to Top Start -->
    <button onclick="topFunction()" id="gotoTopBtn" class="rounded-pill" title="Go to top"><i class="fas fa-arrow-up"></i></button>
    <!-- Bring to Top End -->


    <footer class="container-fluid bg-first p-5">
      <div class="row px-5">
        <div class="col-lg-3">
          <div class="widget">
            <h3 class="text-fourth">Pages</h3>
            <ul class="list-unstyled float-left links">
              <li class="mb-2"><a href="index.php" class="text-third fade-up-sm">Home</a></li>
              <li class="mb-2"><a href="practices.php" class="text-third fade-up-sm">Practice Area</a></li>
              <li class="mb-2"><a href="services.php" class="text-third fade-up-sm">Services</a></li>
              <li class="mb-2"><a href="lawyers.php" class="text-third fade-up-sm">Lawyers</a></li>
            </ul>
          </div> 
        </div> 

        <div class="col-lg-3">
          <div class="widget">
            <h3 class="text-fourth">Company</h3>
              <ul class="list-unstyled float-left links">
                <li class="mb-2"><a href="about.php" class="text-third fade-up-sm">About us</a></li>
                <li class="mb-2"><a href="terms.php" class="text-third fade-up-sm">Terms</a></li>
                <li class="mb-2"><a href="privacy.php" class="text-third fade-up-sm">Privacy</a></li>
            </ul>
          </div> 
        </div> 

        <div class="col-lg-3">
          <div class="widget">
            <h3 class="text-fourth">Practice Area</h3>
            <ul class="list-unstyled float-left links">
              <li class="mb-2"><a href="practices.php" class="text-third fade-up-sm">Banking Law</a></li>
              <li class="mb-2"><a href="practices.php" class="text-third fade-up-sm">Commercial Law</a></li>
              <li class="mb-2"><a href="practices.php" class="text-third fade-up-sm">Corporate Law</a></li>
              <li class="mb-2"><a href="practices.php" class="text-third fade-up-sm">Family Law</a></li>
            </ul>
          </div> 
        </div> 

        <div class="col-lg-3">
          <div class="widget">
            <h3 class="text-fourth">Contact</h3>
            <address class="text-fifth">Millat Road, Faisalabad</address>
            <ul class="list-unstyled links mb-4">
              <li class="mb-2"><a href="tel://923020006566" class="text-third fade-up-sm">+923020006566</a></li>
              <li class="mb-2"><a href="tel://923447652891" class="text-third fade-up-sm">+923447652891</a></li>
              <li class="mb-2"><a href="mailto:info@mydomain.com" class="text-third fade-up-sm">info@mydomain.com</a></li>
            </ul>
            <ul class="list-unstyled social">
              <li><a href="#" class="fade-up-sm"><i class="fab fa-instagram"></i></a></li>
              <li><a href="#" class="fade-up-sm"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#" class="fade-up-sm"><i class="fab fa-facebook"></i></a></li>
              <li><a href="#" class="fade-up-sm"><i class="fab fa-linkedin"></i></a></li>
              <li><a href="#" class="fade-up-sm"><i class="fab fa-pinterest"></i></a></li>
              <li><a href="#" class="fade-up-sm"><i class="fab fa-dribbble"></i></a></li>
            </ul>
          </div> 
        </div> 
      </div> 
      <div class="row mt-5">
        <div class="col-12 text-center text-fourth">
          <p>
          
            Copyright ©<script>document.write(new Date().getFullYear());</script>2022 All rights reserved | This template is made with Anas Makki & Abdul Rahman
          </p>
        </div>
      </div>
    </footer>

    <!-- Footer End -->



    <?php 
    // Calculating Avg Ratting
    $sql = "SELECT * FROM lawyer";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      $lawyerId = $row['lawyer_id'];
      $rateValue = $row['rate_value'];
      $rateTime = $row['rate_time'];
      if($rateTime == 0){ $rateTime =1; }
  
      $averageRate = round($rateValue / $rateTime);
  
      $sql1 = "UPDATE lawyer SET average_rate = '$averageRate' WHERE lawyer_id = '$lawyerId'";
      mysqli_query($conn, $sql1);
    }

    ?>




    <!-- Bootstrap with bundle JS -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- jQuery JS -->
    <script src="assets/js/jquery.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/custom.js"></script>

    <!-- Font Awesome JS -->
    <script src="assets/js/all.min.js"></script>


    <!-- Plugins -->
    <script src="assets/plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>

    <script>
      $(document).ready(function() {
			$('.dataTable').DataTable( {
				lengthChange: false,               
			} );



    });

    </script>


</body>
</html>