
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
                                            <th>Hari</th>
                                            <th>Jam Mulai</th>
                                            <th>Jam Selesai</th>
                                            <th>Tempat</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr align="center">
                                            <td>1</td>
                                            <td>Vyatta</td>
                                            <td>Powerbank</td>
                                            <td>Men</td>
                                            <td>vyata@gmail.com</td>
                                            <td>vyata@gmail.com</td>
                                            <td>
                                                <button type="button" class="btn btn-outline-danger">Edit</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-warning">Delete</button>
                                            </td>
                                        </tr>
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
