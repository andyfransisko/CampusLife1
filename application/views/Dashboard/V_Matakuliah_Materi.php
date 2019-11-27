
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
                                    <li class="active">Matakuliah</li>
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
                                <strong class="card-title">Matakuliah</strong>
                                <div class="float-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputMatakuliah">
                                        <span class="ti-plus"></span> Input
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead align="center">
                                        <tr>
                                            <th>ID Matakuliah</th>
                                            <th>Nama Matakuliah</th>
                                            <th>Tahun Ajaran</th>
                                            <th>Materi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $arr=[
                                                1=>"Ganjil",
                                                2=>"Genap",
                                                3=>"Akselerasi",
                                            ];
                                            foreach($matkul as $list){
                                        ?>
                                        <tr align="center">
                                            <td><?php echo $list->id_mata_kuliah ?></td>
                                            <td><?php echo $list->nama_mata_kuliah ?></td>
                                            <td><?php echo $list->tahun." - ".$arr[$list->jenis_semester] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-warning"><a href="<?php echo base_url()."Dashboard/Materi/viewMateri/".$list->id_mata_kuliah ?>">MATERI</a></button>
                                            </td>
                                        </tr>
                                            <?php } ?>
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
                        Copyright &copy; 2018 Ela Matakuliah
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->
