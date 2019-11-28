
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php
            include('Template/head.php');
        ?>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">User Activation </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">#</th>
                                                    <th class="avatar">Avatar</th>
                                                    <th>Username</th>
                                                    <th>Nama</th>
                                                    <th>Angkatan</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $i=1;
                                                foreach($mahasiswa as $list){
                                            ?>
                                                <tr>
                                                    <td class="serial"><?php echo $i ?></td>
                                                    <td class="avatar">
                                                        <div class="round-img">
                                                            <a href="#"><img class="rounded-circle" src="<?php echo base_url() ?>assets/dashboard/images/avatar/1.jpg" alt=""></a>
                                                        </div>
                                                    </td>
                                                    <td> <?php echo $list->nim ?></td>
                                                    <td>  <span class="name"><?php echo $list->nama_mhs ?></span> </td>
                                                    <td> <span class="product"><?php echo $list->angkatan ?></span> </td>
                                                    <td><span class="name"><?php if($list->status=="1") echo "Activated"; else echo "Not Activated" ?></span></td>
                                                    <td><button type="button" class="btn btn-outline-success"><a href="<?php echo base_url(). 'Dashboard/Welcome/Activating/'.$list->username;?>">Activation</a></button></td>
                                                </tr>
                                                <?php
                                                    $i++ ; 
                                                    } 
                                                ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->
                        
                        <div class="row">
                        <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Course</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                          <th scope="col">ID Mata Kuliah</th>
                                          <th scope="col">Nama Mata Kuliah</th>
                                          <th scope="col">SKS</th>
                                          <th scope="col">Semester</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                    <?php
                            $i=1;
                            foreach($matakuliah as $list){
                          ?>
                                        <th scope="row"><?php echo $list->id_mata_kuliah ?> </th>
                                        <td><?php echo $list->nama_mata_kuliah ?></td>
                                        <td><?php echo $list->sks ?></td>
                                        <td><?php if($list->id_semester=="1") echo "Ganjil";elseif($list->id_semester=="2") echo "Genap"; else echo "Akselerasi" ?></td>
                                    </tr>
                                    <?php
                          $i++ ; 
                          } 
                          ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                        <!-- /# card -->
                        
                    </div><!-- /# column -->
                    <div class="col-md-4">
                        <div class="card text-white bg-flat-color-3">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="count"><?php echo $count; ?></span>
                                    </h3>
                                    <p class="text-light mt-1 m-0">Total Mahasiswa</p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-users"></i>
                                </div><!-- /.card-right -->

                            </div>
                    </div>
                          </div>
                    </div>
                    </div>
                </div>
            <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->