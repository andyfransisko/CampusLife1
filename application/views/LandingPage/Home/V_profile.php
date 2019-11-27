  
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
                                        <?php foreach($mahasiswa as $list) { ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>NIM</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $list->nim?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $list->nama_mhs ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                <?php echo ($list->jenis_kelamin == 1) ? "Laki-laki" : "Perempuan" ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Major</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $list->nama_jurusan ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Cohort</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $list->angkatan ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $list->email_mhs ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Birth Date</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo date('d-F-Y', strtotime($list->tgl_lahir))  ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Birth Place</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $list->tmpt_lahir ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $list->alamat_rumah ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Phone Number</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $list->no_telp ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Religion</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                <?php 
                                                if($list->agama == 1){
                                                    echo "Kristen";
                                                }
                                                else if($list->agama == 2){
                                                    echo "Katolik";
                                                }
                                                else if($list->agama == 3){
                                                    echo "Islam";
                                                }
                                                else if($list->agama == 4){
                                                    echo "Buddha";
                                                }
                                                else if($list->agama == 5){
                                                    echo "Hindu";
                                                }
                                                else{
                                                    echo "Kong Hu Cu";
                                                }
                                                 ?>
                                                </p>
                                            </div>
                                        </div>
                                            <?php } ?>                            </div>
                            
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
    