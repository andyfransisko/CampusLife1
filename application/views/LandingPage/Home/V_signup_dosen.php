<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url()?>assets/images/login.jpeg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div style="position:relative;padding-top: 10%;padding-bottom: 10%;">
        <div class="form-style-5 container">
            <h3 style="text-align: center; margin-bottom: 50px;">LECTURER INFORMATION</h3>
            <form class="" action="<?php echo base_url() ?>Login/signup_dosen_cek" style="font-family: 'Nunito', sans-serif;" method="post">
                <fieldset>
                    <?php echo form_error('nim', '<small class="text-danger">', '</small>') ?>
                    <input type="text" name="nidn" placeholder="NIDN" value="<?php echo set_value('nidn'); ?>">
                    
                    
                    <?php echo form_error('nama_dosen', '<small class="text-danger pl-3">', '</small>') ?>
                    <input type="text" name="nama_dosen" placeholder="Name" value="<?php echo set_value('nama_dosen'); ?>">

                    <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                    <input type="text" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
                    
                    <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                    <input type="password" name="password" placeholder="Password" value="">
                    
                    <?php echo form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
                    <input type="password" name="password2" placeholder="Confirm Password" value="">
                    
                    <?php echo form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>') ?>
                    <select class="" id="jenis_kelamin" name="jenis_kelamin">
                        <option value="">Choose Gender</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>

                    <?php echo form_error('alamat_rumah', '<small class="text-danger pl-3">', '</small>') ?>
                    <input type="text" name="alamat_rumah" placeholder="Address" value="<?php echo set_value('no_telp'); ?>">
                    
                    <?php echo form_error('tmpt_lahir', '<small class="text-danger pl-3">', '</small>') ?>
                    <input type="text" name="tmpt_lahir" placeholder="Place of Birth" value="<?php echo set_value('tmpt_lahir'); ?>">
                    
                    <?php echo form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>') ?>
                    <input type="date" name="tgl_lahir" placeholder="Date of Birth" value="<?php echo set_value('tgl_lahir'); ?>">
                    
                    <?php echo form_error('no_telp', '<small class="text-danger pl-3">', '</small>') ?>
                    <input type="number" name="no_telp" placeholder="Telephone Number" value="<?php echo set_value('no_telp'); ?>">
                    
                    <?php echo form_error('agama', '<small class="text-danger pl-3">', '</small>') ?>
                    <select id="agama" name="agama">
                        <option value="">Choose Religion</option>
                        <option value="1">Kristen</option>
                        <option value="2">Katolik</option>
                        <option value="3">Islam</option>
                        <option value="4">Buddha</option>
                        <option value="5">Hindu</option>
                        <option value="6">Kong Hu Cu</option>
                    </select>
                </fieldset>
                <input type="submit" value="Sign Up" />
            </form>
          </div>
      </div>
        
    </section>