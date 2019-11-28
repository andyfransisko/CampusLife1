<!-- Right Panel -->
<div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php
            include('Template/head.php');
        ?>
        <!-- Header-->

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Profile</strong>
                                <div class="float-right">
                                    <a href="<?php echo base_url().'Dashboard/Welcome/Editprofile' ?>">
                                        <button type="button" class="btn btn-primary">
                                            Edit 
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <tbody align="left">
                                    <?php
                            $i=1;
                            foreach($dosen as $list){
                          ?>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">NIDN</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"><?php echo $list->nidn ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Nama Dosen</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"><?php echo $list->nama_dosen ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Jenis Kelamin</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"><?php echo ($list->jenis_kelamin == 1 ? "Laki - laki" : "Perempuan") ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Tipe Dosen</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static">
                                            <?php 
                                                if($list->tipe_dosen == 1){
                                                    echo "Kepala Program Studi";
                                                }
                                                else if($list->tipe_dosen == 2){
                                                    echo "Dosen Pembimbing Akademik";
                                                }
                                                else{
                                                    echo "Dosen Reguler";
                                                }
                                                 ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Email</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"><?php echo $list->email_dosen?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Tempat Lahir</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"><?php echo $list->tmpt_lahir?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Tanggal Lahir</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"><?php echo $list->tgl_lahir?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Alamat Rumah</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"><?php echo $list->alamat_rumah?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Nomor Telepon</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"><?php echo $list->no_telp?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Agama</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static">
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
                                </div>
                                
                                    
                                        <div class="modal fade" id="editDosen_<?php echo $list->nidn?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mediumModalLabel">Edit Data Dosen</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                            
                                         <form action="<?php echo base_url().'Dashboard/Dosen/updateData'?>" method="POST" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">NIDN</label>
                                                <input type="text" class="form-control" placeholder = "nidn" id="nidn" name="nidn" value="<?php echo $list->nidn ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Dosen</label>
                                                <input  type="text" class="form-control" placeholder = "Nama Dosen" id="nama_dosen" name="nama_dosen" value="<?php echo $list->nama_dosen?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="jenis_kelamin" class="control-label mb-1">Jenis Kelamin</label><br>
                                                <select data-placeholder="Choose a Country..." class="standardSelect" tabindex="1" name="jenis_kelamin" id="jenis_kelamin">
                                                    <option value="1" <?php echo ($list->jenis_kelamin == 1 ? "selected" : "") ?>>Laki-Laki</option>
                                                    <option value="2" <?php echo ($list->jenis_kelamin == 2 ? "selected" : "") ?>>Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Tipe Dosen</label><br>
                                                <select data-placeholder="Pilih Tipe Dosen" class="standardSelect" tabindex="1" name="tipe_dosen" id="tipe_dosen">
                                                    <option value="1"<?php if(($list->tipe_dosen) == "1")  echo "selected" ?>>Kepala Program Studi</option>
                                                    <option value="2" <?php if(($list->tipe_dosen) == "2") echo "selected" ?>>Dosen Pembimbing Akademik</option>
                                                    <option value="3" <?php if(($list->tipe_dosen) == "3") echo "selected" ?>>Dosen Reguler</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Email Dosen</label>
                                                <input  type="text" class="form-control" placeholder = "email_dosen" id="email_dosen" name="email_dosen" value="<?php echo $list->email_dosen?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tempat Lahir</label>
                                                <input  type="text" class="form-control" placeholder = "" id="tmpt_lahir" name="tmpt_lahir" value="<?php echo $list->tmpt_lahir?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tanggal Lahir (mm/dd/yyyy)</label>
                                                <input  type="date" class="form-control" placeholder = "" id="tgl_lahir" name="tgl_lahir" value="<?php echo $list->tgl_lahir?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Alamat</label>
                                                <input  type="text" class="form-control" placeholder = "" id="alamat" name="alamat" value="<?php echo $list->alamat_rumah?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">No Telp</label>
                                                <input  type="text" class="form-control" placeholder = "" id="alamat" name="no_telp" value="<?php echo $list->no_telp?>">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Agama</label><br>
                                                <select data-placeholder="Pilih Agama" class="standardSelect" tabindex="1" name="agama">
                                                    <option value="1" <?php echo ($list->agama == 1 ? "selected" : "")?>>Kristen</option>
                                                    <option value="2" <?php echo ($list->agama == 2 ? "selected" : "")?>>Katolik</option>
                                                    <option value="3" <?php echo ($list->agama == 3 ? "selected" : "")?>>Islam</option>
                                                    <option value="4" <?php echo ($list->agama == 4 ? "selected" : "")?>>Buddha</option>
                                                    <option value="5" <?php echo ($list->agama == 5 ? "selected" : "")?>>Hindu</option>
                                                    <option value="6" <?php echo ($list->agama == 6 ? "selected" : "")?>>Kong Hu Cu</option>
                                                </select>
                                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                                          <?php
                          } 
                          ?>
                                    </tbody>
                                </table>
                            </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <!-- Modal -->
        <div class="modal fade" id="inputDosen" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Input Data Dosen</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <form action="<?php echo base_url().'Dashboard/Dosen/insertData'?>" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">NIDN</label>
                                                <input type="text" class="form-control" placeholder = "NIDN" name="nidn">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Dosen</label>
                                                <input name="nama_dosen" type="text" class="form-control" placeholder = "Nama Dosen">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Jenis Kelamin</label><br>
                                                <select data-placeholder="Pilih Jenis Kelamin" class="standardSelect" tabindex="1" name="jenis_kelamin">
                                                    <option value="1">Laki - Laki</option>
                                                    <option value="2">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Email</label>
                                                <input  name="email" type="text" class="form-control" placeholder = "Email">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Password</label>
                                                <input name="password" type="password" class="form-control cc-name valid" placeholder = "Password">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Konfirmasi Password</label>
                                                <input id="cc-name" name="password2" type="password" class="form-control cc-name valid" placeholder = "Konfirmasi Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Tipe Dosen</label><br>
                                                <select data-placeholder="Pilih Tipe Dosen" class="standardSelect" tabindex="1" name="tipe_dosen">
                                                    <option value="3">Dosen Reguler</option>
                                                    <option value="2">Dosen Pembimbing Akademik</option>
                                                    <option value="1">Kepala Program Studi</option>
                                                </select>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Tempat Lahir</label>
                                                <input id="cc-name" name="tmpt_lahir" type="text" class="form-control cc-name valid" placeholder = "Tempat Lahir">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Tanggal Lahir</label>
                                                <input id="cc-name" name="tgl_lahir" type="date" class="form-control cc-name valid" >
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Alamat</label>
                                                <input id="cc-name" name="alamat" type="text" class="form-control cc-name valid" placeholder = "Alamat">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">No Telepon</label>
                                                <input id="cc-name" name="no_telp" type="text" class="form-control cc-name valid" placeholder = "No Telepon">
                                            </div>
                                            <div class="form-group has-success">
                                                <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Agama</label><br>
                                                <select data-placeholder="Pilih Agama" class="standardSelect" tabindex="1" name="agama">
                                                    <option value="1">Kristen</option>
                                                    <option value="2">Katolik</option>
                                                    <option value="3">Islam</option>
                                                    <option value="4">Buddha</option>
                                                    <option value="5">Hindu</option>
                                                    <option value="6">Kong Hu Cu</option>
                                                </select>
                                            </div>
                                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                         </form>
                    </div>
                </div>
            </div>


        <div class="clearfix"></div>

        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Dosen
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->