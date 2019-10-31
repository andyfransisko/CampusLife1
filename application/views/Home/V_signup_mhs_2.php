<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url()?>assets/images/login.jpeg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div style="position:relative;padding-top: 10%;padding-bottom: 10%;">
        <div class="form-style-5 container">
            <form class="" action="<?php echo base_url() ?>Login/signup_mhs_cek" style="font-family: 'Nunito', sans-serif;">
                <fieldset>
                    <input type="text" name="nim" placeholder="NIM" value="<?php echo set_value('nim'); ?>">
                    <input type="text" name="nama" placeholder="Name" value="<?php echo set_value('nama'); ?>">
                    <input type="text" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>">
                    <input type="password" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>">
                    <input type="password" name="password2" placeholder="Confirm Password" value="<?php echo set_value('password2'); ?>">
                    <select id="jenis_kelamin" name="jenis_kelamin">
                        <option value="">Choose Gender</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>      
                    <select id="jurusan" name="jurusan">
                    <!--nanti ambil database-->
                        <option value="football">Ambil Database</option>
                        <option value="swimming">Ambil Database</option>
                    </select>      
                    <input type="text" name="tmpt_lahir" placeholder="Tempat Lahir" value="<?php echo set_value('tmpt_lahir'); ?>">
                    <input type="date" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?php echo set_value('tgl_lahir'); ?>">
                    <input type="number" name="no_telp" placeholder="Nomor Telepon" value="<?php echo set_value('no_telp'); ?>">
                    <select id="agama" name="agama">
                        <option value="">Pilih Agama</option>
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