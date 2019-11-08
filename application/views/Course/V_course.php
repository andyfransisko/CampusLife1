
    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url()?>assets/images/courses2.jpeg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
      </div>
    </section>
    
    <div style="color:white; position: absolute; bottom: 9%;width: 100%; font-size:30px;">
        <center>My Courses 
          <br>
            <a href = "#bawah">
              <img class ="inverted"  src="https://image.flaticon.com/icons/svg/25/25415.svg" width="35px" title="To My Courses">
            </a>
        </center>
      </div>

    
        <!-- Mata Kuliah -->
        <div id = "bawah" style="color:white;">
          <center>
          <?php 
          $i = 0;
          $arr = array(
            1 => "Monday",
            2 => "Tuesday", 
            3 => "Wednesday", 
            4 => "Thursday", 
            5 => "Friday", 
            6 => "Saturday", 
            7 => "Sunday",  
          );
          foreach($matkul as $a){ 
            if($i == 0){

            ?>
          <!-- 1 -->
          <div style = "padding-top: 8%;">
            <div class="outer">
              <div class="content animated fadeInLeft">
                <!--<span class="bg animated fadeInDown">EXCLUSIVE</span>-->
                <h1><?php echo $a->nama_mata_kuliah ?> </h1> 
                            
                <div class="button">
                  <?php foreach($detail_matkul as $b){ ?>
                    <a ><?php echo $b->jam_mulai."-".$b->jam_selesai ?></a><a class="cart-btn" ><?php echo $arr[$b->hari] ?></a>
                  <?php } ?>
                </div>
                <div class="button">
                  <?php foreach($detail_matkul as $b){ ?>
                    <a ><?php echo $b->detail_ruangan ?></a><a class="cart-btn" ><?php echo $b->nama_dosen ?></a>
                    <?php } ?>
                </div>
                
              </div>
              <img src="<?php echo base_url() ?>assets/images/courses1.jpeg" width="110%" class="animated fadeInRight">
              <div style="position: absolute;right: 6%;bottom: 5%" class="animated fadeInRight">
                  <a href = "<?php echo base_url() ?>DetailMataKuliah" style="color: white;">
                    <img class = "inverted" src="https://image.flaticon.com/icons/svg/126/126469.svg" width="62" title="Browse">
                    <br>Browse
                  </a>
                </div>
            </div>
          <div class="col-md-9 ftco-animate pb-5 text-center">        
          </div>
        </div>
        <?php }//tutup if
        else{ ?>
        <!-- 2 -->
        <div class="outer">
          <div class="content animated fadeInLeft">
            <!--<span class="bg animated fadeInDown">EXCLUSIVE</span>-->
            <h1><?php echo $a->nama_mata_kuliah ?> </h1> 
            <small><?php echo $a->detail_ruangan ?></small>             
            <div class="button">
              <a ><?php echo $a->jam_mulai ?></a><a class="cart-btn" ><?php echo $a->jam_selesai ?></a>
            </div>
            <div class="button">
                <a ><?php echo $a->hari ?></a><a class="cart-btn" ><?php echo $a->nama_dosen ?></a>
            </div>             
          </div>
          <img src="<?php echo base_url() ?>assets/images/courses1.jpeg" width="110%" class="animated fadeInRight">
          <div style="position: absolute;right: 6%;bottom: 5%" class="animated fadeInRight">
              <a href = "courses2.html" style="color: white;">
                <img class = "inverted" src="https://image.flaticon.com/icons/svg/126/126469.svg" width="62" title="Browse">
                <br>Browse
              </a>
            </div>
        </div>
        <div class="col-md-9 ftco-animate pb-5 text-center">        
      </div>
    <?php }// tutup else
      $i++;
    }// tutup foreach ?>
    
  </div>  
  </center>
  
  
    <!-- End Mata Kuliah -->
