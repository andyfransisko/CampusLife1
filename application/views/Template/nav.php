<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html"><img src = "<?php echo base_url('assets/images/logo2.png');?>" width = "10%"></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item <?php echo ($nav == 'Home') ? 'active' : '' ?>"><a href="<?php echo base_url() ?>Home" class="nav-link">Home</a></li>
	        	<li class="nav-item <?php echo ($nav == 'Schedule') ? 'active' : '' ?>"><a href="<?php echo base_url() ?>Schedule" class="nav-link">My Schedules</a></li>
	        	<li class="nav-item <?php echo ($nav == 'Course') ? 'active' : '' ?>"><a href="<?php echo base_url() ?>Course" class="nav-link">My Courses</a></li>
	        	<li class="nav-item <?php echo ($nav == 'Grade') ? 'active' : '' ?>"><a href="<?php echo base_url() ?>Grade" class="nav-link">My Grades</a></li>
				<?php if($nav == "User") {?>
					<li class="nav-item active"><a href="<?php base_url() ?>User/profile" class="nav-link"><?php echo $this->session->userdata('nama') ?></a>
					</li>
				<?php }else{ ?>
	        		<li class="nav-item <?php echo ($nav == 'Login') ? 'active' : '' ?>"><a href="<?php echo base_url() ?>Login" class="nav-link">Login</a></li>
				<?php } ?>
	        	
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->