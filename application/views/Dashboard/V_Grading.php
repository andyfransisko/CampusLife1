
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
                                <strong class="card-title">Grade Mata Kuliah <?php echo $nama['nama_mata_kuliah'];?></strong>
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
                                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#editGrading_<?php echo $a->nim?>">GRADE MAHASISWA</button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="editGrading_<?php echo $a->nim?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mediumModalLabel">Fill Grade</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                <div class="modal-body">
                            
                                                        <form action="<?php echo base_url().'Dashboard/Nilai/updateData'?>" method="POST" novalidate="novalidate">
                                                        <input type="hidden" id="id_enroll" name="id_enroll" value="<?php echo $a->id_enroll ?>">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">NIM</label>
                                                        <input type="text" class="form-control" placeholder = "NIM" id="nim" name="nim" value="<?php echo $a->nim ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Nama Mahasiswa</label><br>
                                                        <input type="text" class="form-control" placeholder= "nama_mhs" id="nama_mhs" name="nama_mhs" value="<?php echo $a->nama_mhs ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">KAT 1</label>
                                                        <input type="number" class="form-control" placeholder = "KAT 1" id="kat1" name="nilai[]" value="<?php echo $kat1['nilai_mahasiswa']?>" min="0" max="100">
                                                    </div>
                                                    <?php if($count == 4){?>
                                                        <div class="form-group">
                                                            <label for="cc-payment" class="control-label mb-1">KAT 2</label>
                                                            <input type="number" class="form-control" placeholder = "KAT 2" id="kat2" name="nilai[]" value="<?php echo $kat2['nilai_mahasiswa']?>" min="0" max="100">
                                                        </div>
                                                    <?php }else{?>
                                                        <div class="form-group">
                                                            <label for="cc-payment" class="control-label mb-1">KAT 2</label>
                                                            <input type="number" class="form-control" placeholder = "KAT 2" id="kat2" name="nilai[]" value="<?php echo $kat2['nilai_mahasiswa']?>" min="0" max="100">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="cc-payment" class="control-label mb-1">KAT 3</label>
                                                            <input type="number" class="form-control" placeholder = "KAT 3" id="kat3" name="nilai[]" value="<?php echo $kat3['nilai_mahasiswa']?>" min="0" max="100">
                                                        </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">UTS</label>
                                                        <input type="number" class="form-control" placeholder = "UTS" id="uts" name="nilai[]" value="<?php echo $uts['nilai_mahasiswa']?>" min="0" max="100">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">UAS</label>
                                                        <input type="number" class="form-control" placeholder = "UAS" id="tahun" name="nilai[]" value="<?php echo $uas['nilai_mahasiswa']?>"min="0" max="100">
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
