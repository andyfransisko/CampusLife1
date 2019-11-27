
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
                                <h1>Academics</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li>Academics</li>
                                    <li class="active">Materi</li>
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
                                <strong class="card-title">Materi</strong>
                            </div>
                            
                            <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">ID Materi</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="text-input" placeholder="" class="form-control" readonly></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Mata Kuliah</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="select" id="select" class="form-control">
                                                <option value="0">Please select</option>
                                                <option value="1">Option #1</option>
                                                <option value="2">Option #2</option>
                                                <option value="3">Option #3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="password-input" class=" form-control-label">Judul Materi</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="text-input" placeholder="" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Penjelasan Materi</label></div>
                                        <div class="col-12 col-md-9"><textarea name="textarea-input" id="textarea-input" rows="9" placeholder="" class="form-control"></textarea></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Pertemuan Ke-</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="select" id="select" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="file-multiple-input" class=" form-control-label">Multiple File input</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="file-multiple-input" name="file-multiple-input" multiple="" class="form-control-file"></div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                            <input class="btn btn-outline-success" type="submit" value="Submit">
                            </div>
                        </div>
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
