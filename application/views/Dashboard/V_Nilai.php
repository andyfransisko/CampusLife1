
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
                                    <li class="active">Nilai</li>
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
                                <strong class="card-title">Daftar Nilai Mata Kuliah</strong>
                                <div class="float-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputNilai">
                                        <span class="ti-plus"></span> Input
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID Mata Kuliah</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>Jumlah Mahasiswa</th>
                                            <th>Tahun Ajaran </th>
                                            <th>Grading</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $arr = [
                                            1=>'Ganjil',
                                            2=>'Genap',
                                            3=>'Akselerasi'
                                        ];
                                        foreach($matkul as $a){?>
                                        <tr align="center">
                                            <td><?php echo $a->id_mata_kuliah?></td>
                                            <td><?php echo $a->nama_mata_kuliah?></td>
                                            <td><?php echo $a->jumlah_mahasiswa?></td>
                                            <td><?php echo $a->tahun. " - ".$arr[$a->jenis_semester]?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-danger"><a href="<?php echo base_url(). "Dashboard/Nilai/viewGrading/".$a->id_mata_kuliah."/".$a->id_semester?>">GRADE</a></button>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


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
