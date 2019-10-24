
    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url() ?>assets/images/login.jpeg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="limiter">
          <div class="container-login100" >
                <?php echo $this->session->flashdata('message'); ?>
            <div class="wrap-login100 p-t-190 p-b-30">
              <form class="login100-form validate-form" action="<?php echo base_url('Login') ?>" method="post">
                <div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
                  <input class="input100" type="text" name="username" id="username" placeholder="Username" value="<?php echo set_value('username') ?>">
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                    <i class="fa fa-user"></i>
                  </span>
                  <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
      
                <div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
                  <input class="input100" type="password" name="password" id="password" placeholder="Password">
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                    <i class="fa fa-lock"></i>
                  </span>
                  <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
      
                <div class="container-login100-form-btn p-t-10">
                  <button class="login100-form-btn" type="submit">
                    Login
                  </button>
                </div>
      
                <div class="text-center w-full p-t-25 p-b-150">
                  <a href="#" class="txt1">
                    Forgot Username / Password?
                  </a>
                </div>
                <div class="text-center w-full">
                  <a class="txt1" href="#">
                    Create new account
                    <i class="fa fa-long-arrow-right"></i>						
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      <div class="container">
        
        
      </div>
    </section>