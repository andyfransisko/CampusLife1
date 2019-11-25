<footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><img src = "<?php echo base_url() ?>assets/images/logo2.png" width = "7%"> &nbsp; Campus Life</h2>
              <p>Campus Life is an academic web system that designed to help students manage their activies in campus. We hope this system can work exactly like universities students need in their university life.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          
          <div class="col-md-2">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="<?php echo base_url()."Home" ?>" class="py-2 d-block">Home</a></li>
                <?php if($this->session->userdata('nama_user') != null) {?>
                <li><a href="<?php echo base_url()."Schedule" ?>" class="py-2 d-block">My Schedules</a></li>
                <li><a href="<?php echo base_url()."Course" ?>" class="py-2 d-block">My Courses</a></li>
                <li><a href="<?php echo base_url()."Grade" ?>" class="py-2 d-block">My Grades</a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Contact Us</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Jl. MH. Thamrin Boulevard 1100, Kelapa Dua, Kec. Karawaci, Kota Tangerang, Banten 15811</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">(021) 5460901</span></a></li>
	                <li><a href="mailto:campuslife.cs@gmail.com" target="_blank"><span class="icon icon-envelope"></span><span class="text">campuslife.cs@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>