  
 <div class="hero-wrap" style="background-image: url('<?php echo base_url() ?>assets/images/bgprofile.jpeg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
          <div class="col-md-6 order-md-last ftco-animate mt-5" data-scrollax=" properties: { translateY: '70%' }">
          </div>

        <!-- Profile -->
        <div class="container emp-profile" style="margin-top:10%;">
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
                        <a href = "<?php echo base_url() ?>User/profile" >
                            Back
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="<?php echo base_url() ?>assets/images/default.jpg" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="padding-bottom:10%;">
                                <form action="<?php echo base_url(). "User/updateData"?>" method="POST" novalidate="novalidate">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>NIM</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type = "text" class="form-control" readonly value="<?php echo $this->session->userdata('username') ?>" name="nim">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                            <input type = "text" class="form-control"  value="<?php echo $this->session->userdata('nama_user') ?>" name="nama_mhs">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control" tabindex="1" name="jenis_kelamin">
                                                    <option value="1">Laki - Laki</option>
                                                    <option value="2">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Major</label>
                                            </div>
                                            <div class="col-md-6">
                                            <select class="form-control" tabindex="1" name="id_jurusan">
                                                    <?php foreach($jurusan as $a){ ?>
                                                        <option value="<?php echo $a->id_jurusan ?>"><?php echo $a->nama_jurusan ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Cohort</label>
                                            </div>
                                            <div class="col-md-6">
                                            <input type = "text" class="form-control" value="<?php echo $this->session->userdata('angkatan1') ?>" name="angkatan">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                            <input type = "text" class="form-control"  value="<?php echo $this->session->userdata('email1') ?>" name="email">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Birth Date</label>
                                            </div>
                                            <div class="col-md-6">
                                            <input type = "text" class="form-control"  value="<?php echo $this->session->userdata('tempat1') ?>" name="tmpt_lahir" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Birth Place</label>
                                            </div>
                                            <div class="col-md-6">
                                            <input type = "text" class="form-control"  value="<?php echo $this->session->userdata('tanggal1') ?>" name="tgl_lahir">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-6">
                                            <input type = "text" class="form-control"  value="<?php echo $this->session->userdata('alamat1') ?>" name="alamat">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Phone Number</label>
                                            </div>
                                            <div class="col-md-6">
                                            <input type = "text" class="form-control" value="<?php echo $this->session->userdata('phone1') ?>" name="no_telp">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Religion</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control" tabindex="1" name="agama">
                                                    <option value="1">Kristen</option>
                                                    <option value="2">Katolik</option>
                                                    <option value="3">Islam</option>
                                                    <option value="4">Buddha</option>
                                                    <option value="5">Hindu</option>
                                                    <option value="6">Kong Hu Cu</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-3">
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="form-control">
                                                    SUBMIT
                                                </button>
                                            </div>
                                        </div>
                                    </form>
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
    