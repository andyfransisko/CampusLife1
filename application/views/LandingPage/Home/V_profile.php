  
 <div class="hero-wrap" style="background-image: url('<?php echo base_url() ?>assets/images/bgprofile.jpeg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
          <div class="col-md-6 order-md-last ftco-animate mt-5" data-scrollax=" properties: { translateY: '70%' }">
          </div>

        <!-- Profile -->
        <div class="container emp-profile" style="margin-top:10%;">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $this->session->userdata('nama_user') ?>
                                    </h5>
                                    <h6>
                                        Mahasiswa
                                    </h6>
                                    
                            <ul class="nav nav-tabs" id="myTab" role="tablist" style="padding-top:5%;">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href = "<?php echo base_url() ?>User/Editprofile" >
                            Edit Profile
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="<?php echo base_url() ?>assets/images/default.jpg" alt=""/>
                            
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>NIM</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $this->session->userdata('username') ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $this->session->userdata('nama_user') ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                <?php 
                                                    if($this->session->userdata('jenisk') == 1){
                                                        echo "Laki laki";
                                                    }
                                                    else if($this->session->userdata('jenisk') == 2){
                                                        echo "Perempuan";
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Major</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $this->session->userdata('jurusan') ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Cohort</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $this->session->userdata('angkatan1') ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $this->session->userdata('email1') ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Birth Date</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $this->session->userdata('tempat1') ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Birth Place</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $this->session->userdata('tanggal1') ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $this->session->userdata('alamat1') ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Phone Number</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $this->session->userdata('phone1') ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Religion</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                    <?php 
                                                    if($this->session->userdata('agama1') == 1){
                                                        echo "Kristen";
                                                    }
                                                    else if($this->session->userdata('agama1') == 2){
                                                        echo "Katolik";
                                                    }
                                                    else if($this->session->userdata('agama1') == 3){
                                                        echo "Islam";
                                                    }
                                                    else if($this->session->userdata('agama1') == 4){
                                                        echo "Buddha";
                                                    }
                                                    else if($this->session->userdata('agama1') == 5){
                                                        echo "Hindu";
                                                    }
                                                    else{
                                                        echo "Kong Hu Cu";
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </form>           
        </div>
    </div>

          <div class=" col-md-20 d-none d-md-block">
              
          </div>
        </div>
      </div>
    </div>
    