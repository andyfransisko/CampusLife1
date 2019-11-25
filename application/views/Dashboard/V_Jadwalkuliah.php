
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
                                    <li class="active">Jadwal Kuliah</li>
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
                                <strong class="card-title">Jadwal Kuliah</strong>
                                <div class="float-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputJadwalKuliah">
                                        <span class="ti-plus"></span> Input
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID Jadwal</th>
                                            <th>Nama Dosen</th>
                                            <th>Nama Matakuliah</th>
                                            <th>Hari</th>
                                            <th>Jam Mulai</th>
                                            <th>Jam Selesai</th>
                                            <th>Ruangan</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $arr = array(
                                            1 => "Senin",
                                            2 => "Selasa", 
                                            3 => "Rabu", 
                                            4 => "Kamis", 
                                            5 => "Jumat", 
                                            6 => "Sabtu", 
                                            7 => "Minggu",  
                                          );
                                        foreach($jadwal as $a){ ?>
                                        <tr align="center">
                                            <td><?php echo $a->id_jadwal ?></td>
                                            <td><?php echo $a->nama_dosen ?></td>
                                            <td><?php echo $a->nama_mata_kuliah ?></td>
                                            <td><?php echo $arr[$a->hari] ?></td>
                                            <td><?php echo date('H:i',strtotime($a->jam_mulai)) ?></td>
                                            <td><?php echo date('H:i',strtotime($a->jam_selesai)) ?></td>
                                            <td><?php echo $a->detail_ruangan ?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#editJadwal_<?php echo $a->id_jadwal?>">Edit</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-danger"><a href="<?php echo base_url(). 'Dashboard/Jadwalkuliah/hapusData/'.$a->id_jadwal;?>">Delete</button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="editJadwal_<?php echo $a->id_jadwal?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mediumModalLabel">Edit Jadwal Kuliah</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?php echo base_url(). "Dashboard/Jadwalkuliah/updateData"?>" method="POST" novalidate="novalidate">
                                                    <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="cc-payment" class="control-label mb-1">ID Jadwal</label>
                                                                    <input type="text" class="form-control" placeholder = "ID Jadwal" id="id_jadwal" name="id_jadwal" value="<?php echo $a->id_jadwal ?>" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cc-payment" class="control-label mb-1">Nama Dosen</label><br>
                                                                    <select data-placeholder="Pilih Dosen" class="standardSelect" tabindex="1" name="nidn" id="nidn">
                                                                        <?php foreach($dosen as $b) {?>
                                                                            <option value="<?php echo $b->nidn ?>" <?php echo ($b->nidn == $a->nidn ? "selected" : "") ?>><?php echo $b->nama_dosen ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="id_mata_kuliah" class="control-label mb-1">Nama Mata Kuliah</label><br>
                                                                    <select data-placeholder="Pilih Mata Kuliah" class="standardSelect" tabindex="1" name="id_mata_kuliah" id="id_mata_kuliah">
                                                                        <?php foreach($matkul as $c) {?>
                                                                            <option value="<?php echo $c->id_mata_kuliah ?>" <?php echo ($c->id_mata_kuliah == $a->id_mata_kuliah ? "selected" : "") ?>><?php echo $c->nama_mata_kuliah ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="hari" class="control-label mb-1">Hari</label><br>
                                                                    <select data-placeholder="Pilih Hari" class="standardSelect" tabindex="1" name="hari" id="hari">
                                                                        <option value="1" <?php echo ($a->hari == 1 ? "selected" : "") ?>>Senin</option>
                                                                        <option value="2" <?php echo ($a->hari == 2 ? "selected" : "") ?>>Selasa</option>
                                                                        <option value="3" <?php echo ($a->hari == 3 ? "selected" : "") ?>>Rabu</option>
                                                                        <option value="4" <?php echo ($a->hari == 4 ? "selected" : "") ?>>Kamis</option>
                                                                        <option value="5" <?php echo ($a->hari == 5 ? "selected" : "") ?>>Jumat</option>
                                                                        <option value="6" <?php echo ($a->hari == 6 ? "selected" : "") ?>>Sabtu</option>
                                                                        <option value="7" <?php echo ($a->hari == 7 ? "selected" : "") ?>>Minggu</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cc-payment" class="control-label mb-1">Jam Mulai</label>
                                                                    <input type="time" class="form-control" placeholder = "Jam Mulai" id="jam_mulai" name="jam_mulai" value="<?php echo $a->jam_mulai ?>" min="04:00" max="23:59">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cc-payment" class="control-label mb-1">Jam Selesai</label>
                                                                    <input type="time" class="form-control" placeholder = "Jam Selesai" id="jam_selesai" name="jam_selesai" value="<?php echo $a->jam_selesai ?>" min="04:00" max="23:59">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jenis_kelamin" class="control-label mb-1">Ruangan</label><br>
                                                                    <select data-placeholder="Pilih Ruangan" class="standardSelect" tabindex="1" name="id_ruangan" id="id_ruangan">
                                                                        <?php foreach($ruangan as $d) {?>
                                                                            <option value="<?php echo $d->id_ruangan ?>" <?php echo ($d->id_ruangan == $a->id_ruangan ? "selected" : "") ?>><?php echo $d->detail_ruangan." - ".$d->kapasitas." orang" ?></option>
                                                                        <?php } ?>
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
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <!-- Modal -->
        <div class="modal fade" id="inputJadwalKuliah" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Input Data Jadwal Kuliah</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <form action="<?php echo base_url()."Dashboard/Jadwalkuliah/insertData" ?>" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Dosen</label><br>
                                                <select data-placeholder="Pilih Dosen" class="standardSelect" tabindex="1" name="nidn" id="nidn">
                                                    <?php foreach($dosen as $b) {?>
                                                        <option value="<?php echo $b->nidn ?>"><?php echo $b->nama_dosen ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="id_mata_kuliah" class="control-label mb-1">Nama Mata Kuliah</label><br>
                                                <select data-placeholder="Pilih Mata Kuliah" class="standardSelect" tabindex="1" name="id_mata_kuliah" id="id_mata_kuliah">
                                                    <?php foreach($matkul as $c) {?>
                                                        <option value="<?php echo $c->id_mata_kuliah ?>"><?php echo $c->nama_mata_kuliah ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="hari" class="control-label mb-1">Hari</label><br>
                                                <select data-placeholder="Pilih Hari" class="standardSelect" tabindex="1" name="hari" id="hari">
                                                    <option value="1">Senin</option>
                                                    <option value="2">Selasa</option>
                                                    <option value="3">Rabu</option>
                                                    <option value="4">Kamis</option>
                                                    <option value="5">Jumat</option>
                                                    <option value="6">Sabtu</option>
                                                    <option value="7">Minggu</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Jam Mulai</label>
                                                <input type="time" class="form-control" placeholder = "Jam Mulai" id="jam_mulai" name="jam_mulai" value="" min="04:00" max="23:59">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Jam Selesai</label>
                                                <input type="time" class="form-control" placeholder = "Jam Selesai" id="jam_selesai" name="jam_selesai" value="" min="04:00" max="23:59">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Ruangan</label><br>
                                                <select data-placeholder="Pilih Ruangan" class="standardSelect" tabindex="1" name="id_ruangan" id="id_ruangan">
                                                    <?php foreach($ruangan as $d) {?>
                                                        <option value="<?php echo $d->id_ruangan ?>"><?php echo $d->detail_ruangan." - ".$d->kapasitas." orang" ?></option>
                                                    <?php } ?>
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