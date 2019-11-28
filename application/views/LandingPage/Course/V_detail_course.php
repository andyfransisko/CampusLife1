    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url()?>assets/images/courses3.jpeg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
      </div>
    </section>
    
    <div style="color:white; position: absolute; bottom: 9%;width: 100%; font-size:30px;">
        <center>Mata Kuliah <?php echo $matkul['nama_mata_kuliah'] ?>
          <br>
            <a href = "#bawah">
              <img class ="inverted"  src="https://image.flaticon.com/icons/svg/25/25415.svg" width="35px" title="Browse My Courses">
            </a>
        </center>
      </div>
    
        <!-- Mata Kuliah -->
        <div id = "bawah" style="color:white;">
            <center>
                <div class="tabs">
  
                    <nav role='navigation' class="transformer-tabs">
                        <ul>
                        <li><a href="#tab-1" class="active">Week 1 (Home)</a></li>
                        <li><a href="#tab-2">Week 2</a></li>
                        <li><a href="#tab-3">Week 3</a></li>
                        <li><a href="#tab-4">Week 4</a></li>
                        <li><a href="#tab-5">Week 5</a></li>
                        <li><a href="#tab-6">Week 6</a></li>
                        <li><a href="#tab-7">Week 7</a></li>
                        <li><a href="#tab-8">Week 8</a></li>
                        <li><a href="#tab-9">Week 9</a></li>
                        <li><a href="#tab-10">Week 10</a></li>
                        <li><a href="#tab-11">Week 11</a></li>
                        <li><a href="#tab-12">Week 12</a></li>
                        <li><a href="#tab-13">Week 13</a></li>
                        <li><a href="#tab-14">Week 14</a></li>
                        <li><a href="#tab-15">Week 15</a></li>
                        <li><a href="#tab-16">Week 16</a></li>
                        </ul>
                    </nav>
                    
                    <?php 
                    $i = 1;
                    foreach($materi as $a){ 
                        if($i == 1){?>
                    
                    <div id="tab-<?php echo $i;?>" class="active">
                        <h2>Week 1</h2>
                        <h2><?php echo $a->judul_materi ?></h2>
                        <p><?php echo $a->penjelasan_materi ?></p>
                    </div>

                    <?php }else{
                    ?>

                    <div id="tab-<?php echo $i ?>">
                        <h2>Week 2</h2>
                        <h2><?php echo $a->judul_materi ?></h2>
                        <p><?php echo $a->penjelasan_materi ?></p>
                    </div>

                    <?php }
                    $i++;
                    }
                    ?>
                    
                </div>
            </center>
        </div>  
    
  
  
    <!-- End Mata Kuliah -->