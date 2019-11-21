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
                                    <li>Enroll</li>
                                    <li class="active">Course Enroll</li>
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
                                <strong class="card-title">Enroll</strong>
                                
                                    
                                
                                <div class="float-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputEnroll">
                                        <span class="ti-plus"></span> Input
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <select class="custom-select col-4 mb-3" name="semester" id="semester">
                                        <option value="">Choose Academic Year</option>
                                        <?php foreach($tahun as $a){ ?>
                                            <option value="<?php echo $a->id_semester ?>"><?php echo ($a->jenis_semester == 1 ? $a->tahun. " - Ganjil" : ($a->jenis_semester == 2 ? $a->tahun. " - Genap" : $a->tahun. " - Akselerasi")) ?></option>
                                        
                                        <?php } ?>

                                </select>
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox"></th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Angkatan</th>
                                            <th>Jurusan</th>
                                        </tr>
                                    </thead>
                                    <tbody id="enroll-body">
                                        <tr>
                                        <?php 
                                            $i = 1;
                                            foreach($mahasiswa as $b){ ?>
                                            <tr>
                                                <td><input type="checkbox" value="<?php echo $b->nim ?>" name="mahasiswa[]" <?php echo ($enrolled['nim'] == $b->nim) ? "checked" : "" ?>></td>
                                                <td><?php echo $i?></td>
                                                <td><?php echo $b->nim?></td>
                                                <td><?php echo $b->nama_mhs?></td>
                                                <td><?php echo $b->angkatan?></td>
                                                <td><?php echo $b->nama_jurusan?></td>
                                            </tr>
                                            <?php $i++;} ?>
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
        <div class="modal fade" id="inputEnroll" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Input Data Enroll</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <form action="#" method="post" novalidate="novalidate">
                                            
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">ID Enroll</label>
                                                <input id="cc-payment" name="cc-payment" type="text" class="form-control" placeholder = "ID Enroll" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Nama Matakuliah</label><br>
                                                <select data-placeholder="Pilih Matakuliah" class="standardSelect" tabindex="1">
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
                                                <label for="cc-number" class="control-label mb-1">Jenis Semester</label><br>
                                                <select data-placeholder="Pilih Semester" class="standardSelect" tabindex="1">
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
                                                <label for="cc-number" class="control-label mb-1">Tahun</label><br>
                                                <select data-placeholder="Pilih Tahun" class="standardSelect" tabindex="1">
                                                    <option value="ambil">Ambil dari database</option>
                                                    <option value="ambil">Ambil dari database</option>
                                                    <option value="ambil">Ambil dari database</option>
                                                    <option value="ambil">Ambil dari database</option>
                                                    <option value="ambil">Ambil dari database</option>
                                                    <option value="ambil">Ambil dari database</option>
                                                    <option value="ambil">Ambil dari database</option>
                                                </select>
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
    