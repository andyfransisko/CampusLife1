
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php
            include('Template/head.php');
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
                                    <li class="active">Mahasiswa</li>
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
                                <strong class="card-title">Mahasiswa</strong>
                                <div class="float-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputMahasiswa">
                                        <span class="ti-plus"></span> Input
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr align="center">
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Jurusan</th>
                                            <th>Angkatan</th>
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
                                            foreach($mahasiswa as $list){
                                        ?>
                                        <tr align="center">
                                            <td><?php echo $list->nim ?></td>
                                            <td><?php echo $list->nama_mhs ?></td>
                                            <td><?php echo ($list->jenis_kelamin == 1) ? "Laki-laki" : "Perempuan" ?></td>
                                            <td><?php echo $list->nama_jurusan ?></td>
                                            <td><?php echo $list->angkatan ?></td>
                                            <td><?php echo $list->email_mhs ?></td>
                                            <td><?php echo $list->tmpt_lahir ?></td>
                                            <td><?php echo date('d-F-Y', strtotime($list->tgl_lahir))  ?></td>
                                            <td><?php echo $list->alamat_rumah ?></td>
                                            <td><?php echo $list->no_telp ?></td>
                                            <td>
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
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#editMahasiswa_<?php echo $list->nim?>">Edit</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-danger"><a href="<?php echo base_url(). 'Dashboard/Mahasiswa/hapusData/'.$list->nim;?>">Delete</button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="editMahasiswa_<?php echo $list->nim?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mediumModalLabel">Edit Data Mahasiswa</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?php echo base_url(). "Dashboard/Mahasiswa/updateData"?>" method="POST" novalidate="novalidate">
                                                    <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="cc-payment" class="control-label mb-1">NIM</label>
                                                                    <input type="text" class="form-control" placeholder = "nim" id="nim" name="nim" value="<?php echo $list->nim ?>" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cc-payment" class="control-label mb-1">Nama</label>
                                                                    <input  type="text" class="form-control" placeholder = "Nama Mahasiswa" id="nama_mahasiswa" name="nama_mhs" value="<?php echo $list->nama_mhs?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jenis_kelamin" class="control-label mb-1">Jenis Kelamin</label><br>
                                                                    <select data-placeholder="Choose a Country..." class="standardSelect" tabindex="1" name="jenis_kelamin" id="jenis_kelamin">
                                                                        <option value="1" <?php echo ($list->jenis_kelamin == 1 ? "selected" : "") ?>>Laki-Laki</option>
                                                                        <option value="2" <?php echo ($list->jenis_kelamin == 2 ? "selected" : "") ?>>Perempuan</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="id_jurusan" class="control-label mb-1">Jurusan</label><br>
                                                                    <select data-placeholder="Pilih Jenis Semester" class="standardSelect" tabindex="1" name="id_jurusan" id="id_jurusan">
                                                                        <?php foreach($jurusan as $a){ ?>
                                                                            <option value="<?php echo $a->id_jurusan ?>" <?php echo (($list->id_jurusan == $a->id_jurusan)? "selected" : "" ) ?>><?php echo $a->nama_jurusan ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cc-payment" class="control-label mb-1">Email</label>
                                                                    <input id="cc-payment" name="email" type="text" class="form-control" placeholder = "Email" value="<?php echo $list->email_mhs ?>">
                                                                </div>
                                                                <div class="form-group has-success">
                                                                    <label for="cc-name" class="control-label mb-1">Angkatan</label>
                                                                    <input id="cc-name" name="angkatan" type="text" class="form-control cc-name valid" placeholder = "Angkatan" value="<?php echo $list->angkatan ?>">
                                                                </div>
                                                                <div class="form-group has-success">
                                                                    <label for="cc-name" class="control-label mb-1">Tempat Lahir</label>
                                                                    <input id="cc-name" name="tmpt_lahir" type="text" class="form-control cc-name valid" placeholder = "Tempat Lahir" value="<?php echo $list->tmpt_lahir?>">
                                                                </div>
                                                                <div class="form-group has-success">
                                                                    <label for="cc-name" class="control-label mb-1">Tanggal Lahir (mm/dd/yyyy)</label>
                                                                    <input id="cc-name" name="tgl_lahir" type="date" class="form-control cc-name valid" value="<?php echo $list->tgl_lahir?>">
                                                                </div>
                                                                <div class="form-group has-success">
                                                                    <label for="cc-name" class="control-label mb-1">Alamat</label>
                                                                    <input id="cc-name" name="alamat" type="text" class="form-control cc-name valid" placeholder = "Alamat" value="<?php echo $list->alamat_rumah ?>">
                                                                </div>
                                                                <div class="form-group has-success">
                                                                    <label for="cc-name" class="control-label mb-1">No Telepon</label>
                                                                    <input id="cc-name" name="no_telp" type="tel" class="form-control cc-name valid" placeholder = "No Telepon" value="<?php echo $list->no_telp?>">
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
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                          <?php
                                            } 
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!--row-->
            </div><!-- .animated -->
        </div><!-- .content -->

        <!-- Modal -->
        <div class="modal fade" id="inputMahasiswa" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Input Data Mahasiswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo base_url(). "Dashboard/Mahasiswa/insertData" ?>" method="post" novalidate="novalidate">
                                 <div class="modal-body">
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">NIM</label>
                                                <input id="cc-name" name="nim" type="text" class="form-control cc-name valid" placeholder = "Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama</label>
                                                <input id="cc-payment" name="nama_mhs" type="text" class="form-control" placeholder = "Nama">
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
                                                <input id="cc-payment" name="email" type="text" class="form-control" placeholder = "Email">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Password</label>
                                                <input id="cc-name" name="password" type="password" class="form-control cc-name valid" placeholder = "Password">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Konfirmasi Password</label>
                                                <input id="cc-name" name="password2" type="password" class="form-control cc-name valid" placeholder = "Konfirmasi Password">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Jurusan</label><br>
                                                <select data-placeholder="Pilih Jurusan" class="standardSelect" tabindex="1" name="id_jurusan">
                                                    <?php foreach($jurusan as $a){ ?>
                                                        <option value="<?php echo $a->id_jurusan ?>"><?php echo $a->nama_jurusan ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Angkatan</label>
                                                <input id="cc-name" name="angkatan" type="text" class="form-control cc-name valid" placeholder = "Angkatan">
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
                                                <input id="cc-name" name="no_telp" type="tel" class="form-control cc-name valid" placeholder = "No Telepon">
                                            </div>
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
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->