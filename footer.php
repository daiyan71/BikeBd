<footer class="page-footer font-small black pt-4" style="clear: left; background-color: #212529; margin-top:-40px;">

  <!-- Footer Links -->
	  <div class="container-fluid text-center text-md-left" style="padding: 0px 80px;">

	    <!-- Grid row -->
	    <div class="row">

	      <!-- Grid column -->
	      <div class="col-md-3 mt-md-0 mt-3">


            <h1 style="color: #FFC107; font-size: 27px; font-family:Carter One; margin-bottom: 30px;">BUY BIKE.com</h1>

	        <!-- Content -->
	        <h5 class="font-weight-bold text-uppercase mb-6"style="color: #ffc107;">Follow Us On</h5>

        <!-- Facebook -->
        
        <!-- Twitter -->
        <a href="https://www.facebook.com/daiyan.ibrahim71"><img src="img/fb.jpg" style="height: 60px;width: 60px;"></a>
        <!-- Google +-->
        <a href="https://twitter.com/iamsrk?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><img src="img/twitter.jpg" style="height: 60px;width: 60px;"></a>
        <!-- Dribbble -->
        <a href="https://www.instagram.com/Daiyan_ibrahim/?fbclid=IwAR21ockl3IzergeB2-jCtsggutY1JExVcy-gAPlMX4oCISuLCY11vLGB0YQ"><img src="img/insta.jpg" style="height: 60px;width: 60px;"></a>

	      </div>
	      <!-- Grid column -->

	      <hr class="clearfix w-100 d-md-none pb-3">

	      <!-- Grid column -->
	      <div class="col-md-3 mb-md-0 mb-3">

	        <!-- Links -->
	        <h4 class="text-uppercase" style="color: #ffc107;">INFORMATION</h4>

	        <ul class="list-unstyled">
	          <li>
              <?php if($_SESSION['login']==0): ?>
	             <a href="signin.php?bikeId=00" style="color: #E3D4A2;"><h5>Your Account</h5></a>
             <?php endif ?>
             <?php if($_SESSION['login']==1): ?>
               <a href="account.php" style="color: #E3D4A2;"><h5>Your Account</h5></a>
             <?php endif ?>
	          </li>
	          <li>
	            <a href="contactUs.php" style="color: #E3D4A2;"><h5>Contact Us</h5></a>
	          </li>
	         
	        </ul>

	      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h4 class="text-uppercase" style="color: #ffc107;">ADDRESS</h4>

        <ul class="list-unstyled" style="color: #E3D4A2;">
          <li>
            <h5>South Banasree,Khilgaon</br>Dhaka-1219</h5>
          </li>
          <li>
            <h5>Buybikebd.com</h5>
          </li>
          <li>
            <h5>buybikebd@gmail.com</h5>
          </li>
          <li>
            <h5>+880 1787141384</h5>
          </li>

        </ul>

      </div>


      <div class="col-md-3 mb-md-0 mb-3">

          <!-- Links -->
          <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2171.4002495468526!2d90.43933223149665!3d23.752892864839605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1ssouth%20banasree!5e0!3m2!1sen!2sbd!4v1570734533674!5m2!1sen!2sbd" width="100%" height="200px" frameborder="0" style="border:0; box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0); color: #080832;" allowfullscreen=""></iframe>

        </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3" style="color: white;">© 2019 Copyright:
    <a href="home.php"style="color: white;"> Buybike.com</a>
  </div>
  <!-- Copyright -->
  </footer>