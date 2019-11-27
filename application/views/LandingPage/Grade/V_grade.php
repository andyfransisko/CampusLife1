  
    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url() ?>assets/images/grades.jpeg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        
      </div>
    </section>

    <div style="color:white; position: absolute; bottom: 9%;width: 100%; font-size:30px;">
        <center>My Grades 
          <br>
            <a href = "#bawah">
              <img class ="inverted"  src="https://image.flaticon.com/icons/svg/25/25415.svg" width="35px" title="To My Grades">
            </a>
        </center>
      </div>

      <div id="bawah">

          <center>
              <div class="tabs">

                  <nav role='navigation' class="transformer-tabs">
                      <ul>
                      <?php
                        $no =1;
                       foreach($semester as $list){
                      ?>
                      <li><a href="#tab-<?php echo $no?>">Semester <?php echo $no?></a></li>
                      
                      <?php
                      $no++;
                       }
                      ?>
                      </ul>
                  </nav>

                  <?php
                  $no1 = 1;
                  ?>
                  
                  <div id="tab-<?php echo $no; ?>" class="active">
                      <div class="container1">
                          <h2>Semester 
                          <?php 
                          foreach($matkul as $listmatkul){
                            echo $no1;
                            
                          ?></h2>
                          <div class="cards-list ftco-animate">
  
                              <div class="card <?php echo $no1;?>">
                                <div class="card_image"> 
                                    <img src="<?php echo base_url() ?>assets/images/logo4.png"  />
                                </div>
                                <div class="card_title title-black">
                                  <?php 
                                    echo $listmatkul->id_mata_kuliah;
                                  ?>
                                  <p>
                                  <!-- Nama Matkul -->
                                  </p>
                                </div>
                              </div>
                              <!--
                                <div class="card 2">
                                <div class="card_image">
                                  <img src="<?php echo base_url() ?>assets/images/logo4.png"  />
                                  </div>
                                <div class="card_title title-black">
                                  <p>Matkul 2</p>
                                </div>
                              </div>
                              
                              <div class="card 3">
                                <div class="card_image">
                                 <img src="<?php echo base_url() ?>assets/images/logo4.png"  />  
                                </div>
                                <div class="card_title title-black">
                                  <p>Matkul 3</p>
                                </div>
                              </div>
                                
                                <div class="card 4">
                                <div class="card_image">
                                  <img src="<?php echo base_url() ?>assets/images/logo4.png"  />
                                  </div>
                                <div class="card_title title-black">
                                  <p>Matkul 4</p>
                                </div>
                                </div>

                                <div class="card 5">
                                <div class="card_image">
                                  <img src="<?php echo base_url() ?>assets/images/logo4.png"  />
                                  </div>
                                <div class="card_title title-black">
                                  <p>Matkul 5</p>
                                </div>
                                </div>

                                <div class="card 6">
                                <div class="card_image">
                                  <img src="<?php echo base_url() ?>assets/images/logo4.png"  />
                                  </div>
                                <div class="card_title title-black">
                                  <p>Matkul 6</p>
                                </div>
                                </div>
                                -->
                                <?php 
                                  $no1++;  
                                }
                                ?>
                              
                              </div>
                              <!--
                          <ul class="responsive-table ftco-animate">
                            <li class="table-header">
                              <div class="col col-1">No</div>
                              <div class="col col-2">Category</div>
                              <div class="col col-3">Grades</div>
                            </li>
                            <li class="table-row">
                              <div class="col col-1" data-label="No">1</div>
                              <div class="col col-2" data-label="Category">KAT 1</div>
                              <div class="col col-3" data-label="Grades">90</div>
                            </li>
                            <li class="table-row">
                                <div class="col col-1" data-label="No">2</div>
                                <div class="col col-2" data-label="Category">KAT 2</div>
                                <div class="col col-3" data-label="Grades">95</div>
                              </li>
                              <li class="table-row">
                                  <div class="col col-1" data-label="No">3</div>
                                  <div class="col col-2" data-label="Category">UTS</div>
                                  <div class="col col-3" data-label="Grades">97</div>
                                </li>
                                <li class="table-row">
                                    <div class="col col-1" data-label="No">4</div>
                                    <div class="col col-2" data-label="Category">UAS</div>
                                    <div class="col col-3" data-label="Grades">80</div>
                                  </li>
                          </ul>
                          -->
                      </div>
                  </div>
                  
               
                  
                 
                  
                 
              
              </div>
          </center>

      </div>

        <!-- courses tab -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'>
    </script><script  src="<?php echo base_url() ?>assets/js/scriptcourses2.js"></script>