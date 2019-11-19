
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php
            include('head.php');
        ?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Master Data</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li>Master Data</li>
                                    <li class="active">Dosen</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Dosen</strong>
                                <div class="float-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputDosen">
                                        <span class="ti-plus"></span> Input
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NIDN</th>
                                            <th>Nama Dosen</th>
                                            <th>Tipe Dosen</th>
                                            <th>Email</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat Rumah</th>
                                            <th>No Telepon</th>
                                            <th>Agama</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                            $i=1;
                            foreach($dosen as $list){
                          ?>
                                        <tr align="center">
                                            <td><?php echo $list->nidn ?></td>
                                            <td><?php echo $list->nama_dosen ?></td>
                                            <td><?php echo $list->tipe_dosen ?></td>
                                            <td><?php echo $list->email_dosen?></td>
                                            <td><?php echo $list->tmpt_lahir ?></td>
                                            <td><?php echo $list->tgl_lahir ?></td>
                                            <td><?php echo $list->alamat_rumah ?></td>
                                            <td><?php echo $list->no_telp ?></td>
                                            <td><?php echo $list->agama ?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#editDosen_<?php echo $list->nidn?>">Edit</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-danger"><a href="<?php echo base_url(). 'Dosen/hapusData/'.$list->nidn;?>">Delete</button>
                                            </td>
                                        </tr>
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
                            
                            <form action="<?php echo 'updateData'?>" method="POST" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">NIDN</label>
                                                <input type="text" class="form-control" placeholder = "nidn" id="nidn" name="nidn" value="<?php echo $list->nidn ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Dosen</label>
                                                <input  type="text" class="form-control" placeholder = "Nama Dosen" id="nama_dosen" name="nama_dosen" value="<?php echo $list->nama_dosen?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Tipe Dosen</label><br>
                                                <select data-placeholder="Pilih Tipe Dosen" class="standardSelect" tabindex="1"name="tipe_dosen" id="tipe_dosen">
                                                    <option value="3" <?php if(($list->tipe_dosen) == "3") echo "selected" ?>>Dosen Reguler</option>
                                                    <option value="2" <?php if(($list->tipe_dosen) == "2") echo "selected" ?>>Dosen Pembimbing Akademik</option>
                                                    <option value="1"<?php if(($list->tipe_dosen) == "1")  echo "selected" ?>>Kepala Program Studi</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Email Dosen</label>
                                                <input  type="text" class="form-control" placeholder = "email_dosen" id="email_dosen" name="email_dosen" value="<?php echo $list->email_dosen?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tempat Lahir</label>
                                                <input  type="text" class="form-control" placeholder = "" id="tempat_lahir" name="tempat_lahir" value="<?php echo $list->tmpt_lahir?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tanggal Lahir</label>
                                                <input  type="date" class="form-control" placeholder = "" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $list->tgl_lahir?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Alamat</label>
                                                <input  type="text" class="form-control" placeholder = "" id="alamat" name="alamat" value="<?php echo $list->alamat_rumah?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">No Telp</label>
                                                <input  type="text" class="form-control" placeholder = "" id="alamat" name="no_telpon" value="<?php echo $list->no_telp?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Agama</label>
                                                <input  type="text" class="form-control" placeholder = "" id="agama" name="agama" value="<?php echo $list->agama?>">
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
                            
                            <form action="<?php echo 'insertData'?>" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">NIDN</label>
                                                <input type="text" class="form-control" placeholder = "NIDN" name="nidn">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Dosen</label>
                                                <input name="nama_dosen" type="text" class="form-control" placeholder = "Nama Dosen">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Email</label>
                                                <input  name="email_dosen" type="text" class="form-control" placeholder = "Email">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Username</label>
                                                <input name="username" type="text" class="form-control cc-name valid" placeholder = "Username">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Password</label>
                                                <input name="password" type="password" class="form-control cc-name valid" placeholder = "Password">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Konfirmasi Password</label>
                                                <input id="cc-name" name="konfirmasi_password" type="password" class="form-control cc-name valid" placeholder = "Konfirmasi Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Tipe Dosen</label><br>
                                                <select data-placeholder="Pilih Tipe Dosen" class="standardSelect" tabindex="1"name="tipe_dosen">
                                                    <option value="3">Dosen Reguler</option>
                                                    <option value="2">Dosen Pembimbing Akademik</option>
                                                    <option value="1">Kepala Program Studi</option>
                                                </select>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Tempat Lahir</label>
                                                <input id="cc-name" name="tempat_lahir" type="text" class="form-control cc-name valid" placeholder = "Tempat Lahir">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Tanggal Lahir</label>
                                                <input id="cc-name" name="tanggal_lahir" type="date" class="form-control cc-name valid" >
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Alamat</label>
                                                <input id="cc-name" name="alamat" type="text" class="form-control cc-name valid" placeholder = "Alamat">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">No Telepon</label>
                                                <input id="cc-name" name="no_telpon" type="text" class="form-control cc-name valid" placeholder = "No Telepon">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Agama</label>
                                                <input id="cc-name" name="agama" type="text" class="form-control cc-name valid" placeholder = "Agama">
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