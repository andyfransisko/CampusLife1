
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
                                <strong class="card-title">Grade Mata Kuliah</strong>
                                <div class="float-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputNilai">
                                        <span class="ti-plus"></span> Input
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered" style="text-align:center">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">Nama Mahasiswa</th>
                                            <th colspan="<?php echo ($count == 3) ? "3" : ($count == 4) ? "4" : "5" ?>" style="text-align:center">Nilai</th>
                                            <th rowspan="2">Grade </th>
                                        </tr>
                                        <tr>
                                            <th>KAT 1</th>
                                            <?php if($count == 4){?>
                                                <th>KAT 2</th>
                                            <?php }else{?>
                                                <th>KAT 2</th>
                                                <th>KAT 3</th>
                                            <?php
                                                }
                                            ?>
                                            <th>UTS</th>
                                            <th>UAS</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach($mhs as $a){?>
                                        <tr align="center">
                                            <td><?php echo $a->nama_mhs?></td>
                                            <td><?php echo $a->nilai_mahasiswa?></td>
                                            
                                            <td><?php echo $kat1['nilai_mahasiswa']?></td>
                                            <?php if($count == 4){?>
                                            <?php }else{?>
                                                <td><?php echo $kat2['nilai_mahasiswa']?></td>
                                                <td><?php echo $kat3['nilai_mahasiswa']?></td>
                                            <?php
                                                }
                                            ?>
                                            <td><?php echo $uts['nilai_mahasiswa']?></td>
                                            <td><?php echo $uas['nilai_mahasiswa']?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-primary"><a href="<?php echo base_url(). "Dashboard/Nilai/gradeMhs/"?>">GRADE MAHASISWA</a></button>
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
