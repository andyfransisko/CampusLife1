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
                                <strong class="card-title">Edit Profil</strong>
                            </div>
                            
                            <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body card-block">
                                <form action="<?php echo base_url(). "Dashboard/Welcome/updateData"?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                <?php foreach($dosen as $list) { ?>
                                <div class="row">
                                            <div class="col-md-3">
                                                <label>NIDN</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type = "text" class="form-control" readonly value="<?php echo $this->session->userdata('username') ?>" name="nidn">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                            <input type = "text" class="form-control"  value="<?php echo $list->nama_dosen ?>" name="nama_dosen">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control" tabindex="1" name="jenis_kelamin">
                                                    <option value="1" <?php echo ($list->jenis_kelamin == 1 ? "selected" : "")?>>Laki - Laki</option>
                                                    <option value="2" <?php echo ($list->jenis_kelamin == 2 ? "selected" : "")?>>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Lecturer Type</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control" tabindex="1" name="tipe_dosen">
                                                    <option value="1" <?php echo ($list->tipe_dosen == 1 ? "selected" : "")?>>Kepala Program Studi</option>
                                                    <option value="2" <?php echo ($list->tipe_dosen == 2 ? "selected" : "")?>>Dosen Pembimbing Akademik</option>
                                                    <option value="3" <?php echo ($list->tipe_dosen == 3 ? "selected" : "")?>>Dosen Reguler</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                            <input type = "text" class="form-control"  value="<?php echo $list->email_dosen ?>" name="email">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Birth Date</label>
                                            </div>
                                            <div class="col-md-6">
                                            <input type = "text" class="form-control"  value="<?php echo $list->tgl_lahir ?>" name="tmpt_lahir" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Birth Place</label>
                                            </div>
                                            <div class="col-md-6">
                                            <input type = "text" class="form-control"  value="<?php echo $list->tmpt_lahir ?>" name="tgl_lahir">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-6">
                                            <input type = "text" class="form-control"  value="<?php echo $list->alamat_rumah ?>" name="alamat">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Phone Number</label>
                                            </div>
                                            <div class="col-md-6">
                                            <input type = "text" class="form-control" value="<?php echo $list->no_telp ?>" name="no_telp">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Religion</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control" tabindex="1" name="agama" placeholder="pilih agama">
                                                    <option value="1" <?php echo ($list->agama == 1 ? "selected" : "")?>>Kristen</option>
                                                    <option value="2" <?php echo ($list->agama == 2 ? "selected" : "")?>>Katolik</option>
                                                    <option value="3" <?php echo ($list->agama == 3 ? "selected" : "")?>>Islam</option>
                                                    <option value="4" <?php echo ($list->agama == 4 ? "selected" : "")?>>Buddha</option>
                                                    <option value="5" <?php echo ($list->agama == 5 ? "selected" : "")?>>Hindu</option>
                                                    <option value="6" <?php echo ($list->agama == 6 ? "selected" : "")?>>Kong Hu Cu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <?php
                                            } 
                                            ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="form-control">
                                                    SUBMIT
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                    
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <!-- Modal -->
        <div class="modal fade" id="inputMateri" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Input Data Materi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <form action="#" method="post" novalidate="novalidate">
                                            
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">ID Materi</label>
                                                <input id="cc-payment" name="id_materi" type="text" class="form-control" placeholder = "ID Jadwal Custom" value="MTR-<?php $count+1?>" readonly>
                                            </div>
                                           <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Mata Kuliah</label><br>
                                                <select data-placeholder="Pilih Mahasiswa" class="standardSelect" tabindex="1">
                                                    <?php foreach($matkul as $a){ ?>
                                                        <option value="<?php echo $a->id_mata_kuliah ?>"><?php echo $a->nama_mata_kuliah ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Judul Materi</label>
                                                <input id="cc-payment" name="judul_materi" type="text" class="form-control" placeholder = "                                    </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Penjelasan Materi</label>
                                                <textarea id="cc-payment" name="penjelasan_materi" type="text" class="form-control" placeholder = "Penjelasan Materi"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Pertemuan</label>
                                                <select data-placeholder="Pilih Mahasiswa" class="standardSelect" tabindex="1">
                                                    <option value="1">Week 1</option>
                                                    <option value="2">Week 2</option>
                                                    <option value="3">Week 3</option>
                                                    <option value="4">Week 4</option>
                                                    <option value="5">Week 5</option>
                                                    <option value="6">Week 6</option>
                                                    <option value="7">Week 7</option>
                                                    <option value="8">Week 8</option>
                                                    <option value="9">Week 9</option>
                                                    <option value="10">Week 10</option>
                                                    <option value="11">Week 11</option>
                                                    <option value="12">Week 12</option>
                                                    <option value="13">Week 13</option>
                                                    <option value="14">Week 14</option>
                                                    <option value="15">Week 15</option>
                                                    <option value="16">Week 16</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tempat</label>
                                                <input id="cc-payment" name="file" type="file" class="form-control" placeholder = "Tempat">
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary">Submit</button>
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
