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
                                <h2><strong class="card-title">Enroll</strong></h2><br>
                                <div class="float-left">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#inputEnroll">
                                        <span class="ti-plus"></span> Add Students
                                    </button>
                                </div>
                                <div class="float-right">
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteEnroll">
                                        <span class="ti-plus"></span> Delete Students
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <h1>Mata Kuliah : <?php echo $matkul['nama_mata_kuliah'] ?></h1>
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Angkatan</th>
                                            <th>Jurusan</th>
                                        </tr>
                                    </thead>
                                    <tbody id="enroll-body">
                                        <?php 
                                            $i = 1;
                                            foreach($mhs_enrolled as $b){ ?>
                                            <tr>
                                                <td><?php echo $i?></td>
                                                <td><?php echo $b->nim?></td>
                                                <td><?php echo $b->nama_mhs?></td>
                                                <td><?php echo $b->angkatan?></td>
                                                <td><?php echo $b->nama_jurusan?></td>
                                            </tr>



                                            <?php $i++;} ?>
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
                            <h2 class="modal-title" id="mediumModalLabel">Input Data Enroll</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <form action="<?php echo base_url()."Dashboard/Enroll/insertData" ?>" method="post" novalidate="novalidate">
                                            <input type="hidden" name="id_semester" value="<?php echo $matkul_enrolled['id_semester']; ?>">
                                            <input type="hidden" name="id_mata_kuliah" value="<?php echo $matkul_enrolled['id_mata_kuliah']; ?>">
                                            <div class="form-group">
                                                <input id="cc-payment" name="id_enroll" type="hidden" class="form-control" placeholder = "ID Enroll" value="ENROLL-<?php echo count($mhs_enrolled)+1; ?>" >
                                            </div>
                                            <div class="form-group">
                                                <label for="id_matkul" class="control-label mb-1">Nama Matakuliah</label><br>
                                                <input type="text" name="id_matkul_view" id="id_matkul_view" class="form-control" value="<?php echo $matkul_enrolled['nama_mata_kuliah']." - ".($matkul_enrolled['jenis_semester'] == 1 ? $matkul_enrolled['tahun']. " - Ganjil" : ($matkul_enrolled['jenis_semester'] == 2 ? $matkul_enrolled['tahun']. " - Genap" : $matkul_enrolled['tahun']. " - Akselerasi")); ?>" readonly>
                                            </div>
                                           <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Nama Mahasiswa</label><br>
                                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th><input type="checkbox" onClick="toggle(this)" /></th>
                                                        <th>NIM</th>
                                                        <th>Nama Mahasiswa</th>
                                                        <th>Jurusan</th>
                                                        <th>Angkatan</th>

                                                        <script language="JavaScript">
                                                            function toggle(source) {
                                                            checkboxes = document.getElementsByName('mahasiswa[]');
                                                            for(var i=0, n=checkboxes.length;i<n;i++) {
                                                                checkboxes[i].checked = source.checked;
                                                            }
                                                            }
                                                        </script>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                    $i = 1;
                                                    foreach($mahasiswa as $a){ 
                                                        if($enrolled['nim'] == $a->nim){
                                                            $i++;
                                                            continue;
                                                        }?>
                                                        <tr>
                                                            <td><input type="checkbox" value="<?php echo $a->nim ?>" name="mahasiswa[]"></td>
                                                            <td><?php echo $a->nim; ?></td>
                                                            <td><?php echo $a->nama_mhs; ?></td>
                                                            <td><?php echo $a->nama_jurusan; ?></td>
                                                            <td><?php echo $a->angkatan; ?></td>
                                                        </tr>
                                                    <?php $i++;} ?>
                                                    </tbody>
                                                </table>
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


            <!--DELETE MODAL-->
            <div class="modal fade" id="deleteEnroll" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="mediumModalLabel">Delete Data Enroll</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <form action="<?php echo base_url()."Dashboard/Enroll/hapusData" ?>" method="post" novalidate="novalidate">
                                            <input type="hidden" name="id_semester" value="<?php echo $matkul_enrolled['id_semester']; ?>">
                                            <input type="hidden" name="id_mata_kuliah" value="<?php echo $matkul_enrolled['id_mata_kuliah']; ?>">
                                            <div class="form-group">
                                                <label for="id_matkul" class="control-label mb-1">Nama Matakuliah</label><br>
                                                <input type="text" name="id_matkul_view" id="id_matkul_view" class="form-control" value="<?php echo $matkul_enrolled['nama_mata_kuliah']." - ".($matkul_enrolled['jenis_semester'] == 1 ? $matkul_enrolled['tahun']. " - Ganjil" : ($matkul_enrolled['jenis_semester'] == 2 ? $matkul_enrolled['tahun']. " - Genap" : $matkul_enrolled['tahun']. " - Akselerasi")); ?>" readonly>
                                            </div>
                                           <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Nama Mahasiswa</label><br>
                                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th><input type="checkbox" onClick="toggle(this)" /></th>
                                                        <th>NIM</th>
                                                        <th>Nama Mahasiswa</th>
                                                        <th>Jurusan</th>
                                                        <th>Angkatan</th>

                                                        <script language="JavaScript">
                                                            function toggle(source) {
                                                            checkboxes = document.getElementsByName('mahasiswa[]');
                                                            for(var i=0, n=checkboxes.length;i<n;i++) {
                                                                checkboxes[i].checked = source.checked;
                                                            }
                                                            }
                                                        </script>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                        $i = 1;
                                                        foreach($mhs_enrolled as $a){
                                                    ?>
                                                        <tr>
                                                            <td><input type="checkbox" value="<?php echo $a->id_enroll ?>" name="mahasiswa[]"></td>
                                                            <td><?php echo $a->nim; ?></td>
                                                            <td><?php echo $a->nama_mhs; ?></td>
                                                            <td><?php echo $a->nama_jurusan; ?></td>
                                                            <td><?php echo $a->angkatan; ?></td>
                                                        </tr>
                                                    <?php $i++;} ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteEnroll">
                                Delete Students
                            </button>
                        </div>
                        <div class="modal fade" id="confirmDeleteEnroll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete these student from enrollment?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                    <button type="submit" class="btn btn-primary">Yes</button>
                                </div>
                                </div>
                            </div>
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
    