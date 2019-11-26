
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
                                    <li class="active">Jadwal Custom</li>
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
                                <strong class="card-title">Jadwal Custom</strong>
                                <div class="float-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputJadwalCustom">
                                        <span class="ti-plus"></span> Input
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID Jadwal</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Tipe Kegiatan</th>
                                            <th>Tanggal</th>
                                            <th>Jam Mulai</th>
                                            <th>Jam Selesai</th>
                                            <th>Tempat</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $arr = array(
                                            1 => "Event",
                                            2 => "Meeting", 
                                            3 => "Ulang Tahun", 
                                            4 => "Important",   
                                          );
                                        foreach($jadwal_custom as $a){ ?>
                                        <tr align="center">
                                            <td><?php echo $a->id_jadwal ?></td>
                                            <td><?php echo $a->nama_mhs ?></td>
                                            <td><?php echo $a->nama_kegiatan ?></td>
                                            <td><?php echo $arr[$a->tipe_kegiatan] ?></td>
                                            <td><?php echo date('d-F-Y', strtotime($a->tanggal)) ?></td>
                                            <td><?php echo date('H:i',strtotime($a->jam_mulai)) ?></td>
                                            <td><?php echo date('H:i',strtotime($a->jam_selesai)) ?></td>
                                            <td><?php echo $a->tempat ?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#editJadwalCustom_<?php echo $a->id_jadwal?>">Edit</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-danger"><a href="<?php echo base_url(). 'Dashboard/Jadwalcustom/hapusData/'.$a->id_jadwal;?>">Delete</button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="editJadwalCustom_<?php echo $a->id_jadwal?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mediumModalLabel">Edit Jadwal Custom</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?php echo base_url(). "Dashboard/Jadwalcustom/updateData"?>" method="POST" novalidate="novalidate">
                                                    <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="cc-payment" class="control-label mb-1">ID Jadwal</label>
                                                                    <input type="text" class="form-control" placeholder = "ID Jadwal" id="id_jadwal" name="id_jadwal" value="<?php echo $a->id_jadwal ?>" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cc-payment" class="control-label mb-1">Nama User</label>
                                                                    <select data-placeholder="Pilih Dosen" class="standardSelect" tabindex="1" name="nidn" id="nidn">
                                                                        <?php foreach($user as $b) {?>
                                                                            <option value="<?php echo $b->nidn ?>" <?php echo ($b->id == $a->user_id ? "selected" : "") ?>><?php echo $b->nama ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="id_mata_kuliah" class="control-label mb-1">Nama Kegiatan</label><br>
                                                                    <input type="text" class="form-control" placeholder = "Nama Kegiatan" id="nama_kegiatan" name="nama_kegiatan" value="<?php echo $a->nama_kegiatan ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tipe_kegiatan" class="control-label mb-1">Tipe Kegiatan</label><br>
                                                                    <select data-placeholder="Pilih Tipe Kegiatan" class="standardSelect" tabindex="1" name="tipe_kegiatan" id="kegiatan">
                                                                        <option value="1" <?php echo ($a->hari == 1 ? "selected" : "") ?>>Event</option>
                                                                        <option value="2" <?php echo ($a->hari == 2 ? "selected" : "") ?>>Meeting</option>
                                                                        <option value="3" <?php echo ($a->hari == 3 ? "selected" : "") ?>>Ulang Tahun</option>
                                                                        <option value="4" <?php echo ($a->hari == 4 ? "selected" : "") ?>>Important!</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cc-payment" class="control-label mb-1">Tanggal</label>
                                                                    <input type="date" class="form-control" placeholder = "Tanggal" id="tanggal" name="tanggal" value="<?php echo $a->tanggal ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cc-payment" class="control-label mb-1">Jam Mulai</label>
                                                                    <input type="time" class="form-control" placeholder = "Jam Mulai" id="jam_mulai" name="jam_mulai" value="<?php echo $a->jam_mulai ?>" min="00:00" max="23:59">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jam_selesai" class="control-label mb-1">Jam Selesai</label>
                                                                    <input type="time" class="form-control" placeholder = "Jam Selesai" id="jam_selesai" name="jam_selesai" value="<?php echo $a->jam_selesai ?>" min="00:00" max="23:59">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tempat" class="control-label mb-1">Ruangan</label><br>
                                                                    <input type="text" class="form-control" placeholder = "Tempat" id="tempat" name="tempat" value="<?php echo $a->tempat ?>">
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
        <div class="modal fade" id="inputJadwal Custom" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Input Data Jadwal Custom</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <form action="#" method="post" novalidate="novalidate">
                                            
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">ID Jadwal Custom</label>
                                                <input id="cc-payment" name="cc-payment" type="text" class="form-control" placeholder = "ID Jadwal Custom" disabled>
                                            </div>
                                           <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Nama Mahasiswa</label><br>
                                                <select data-placeholder="Pilih Mahasiswa" class="standardSelect" tabindex="1">
                                                    <option value="ambil">Ambil dari database</option>
                                                    <option value="ambil">Ambil dari database</option>
                                                    <option value="ambil">Ambil dari database</option>
                                                    <option value="ambil">Ambil dari database</option>
                                                    <option value="ambil">Ambil dari database</option>
                                                    <option value="ambil">Ambil dari database</option>
                                                    <option value="ambil">Ambil dari database</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Kegiatan</label>
                                                <input id="cc-payment" name="cc-payment" type="text" class="form-control" placeholder = "Nama Kegiatan" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Hari</label>
                                                <input id="cc-payment" name="cc-payment" type="text" class="form-control" placeholder = "Hari" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Jam Mulai</label>
                                                <input id="cc-payment" name="cc-payment" type="time" class="form-control" placeholder = "Jam Mulai" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Jam Selesai</label>
                                                <input id="cc-payment" name="cc-payment" type="time" class="form-control" placeholder = "Jam Selesai">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tempat</label>
                                                <input id="cc-payment" name="cc-payment" type="text" class="form-control" placeholder = "Tempat">
                                            </div>
                                            
                                        </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary">Submit</button>
                        </div>
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
