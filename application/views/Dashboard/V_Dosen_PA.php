
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
                                    <li class="active">Dosen</li>
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
                                <strong class="card-title">Dosen</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead align="center">
                                        <tr>
                                            <th>NIDN</th>
                                            <th>Nama Dosen</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tipe Dosen</th>
                                            <th>Assign PA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                            $i=1;
                            foreach($dosen as $list){
                          ?>
                                        <tr align="center">
                                            <td><?php echo $list->nidn ?></td>
                                            <td><?php echo $list->nama_dosen ?></td>
                                            <td><?php echo ($list->jenis_kelamin == 1 ? "Laki - laki" : "Perempuan") ?></td>
                                            <td>
                                                <?php 
                                                if($list->tipe_dosen == 1){
                                                    echo "Kepala Program Studi";
                                                }
                                                else if($list->tipe_dosen == 2){
                                                    echo "Dosen Pembimbing Akademik";
                                                }
                                                else{
                                                    echo "Dosen Reguler";
                                                }
                                                 ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#assignPA_<?php echo $list->nidn?>">ASSIGN</button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="assignPA_<?php echo $list->nidn?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mediumModalLabel">Confirmation Assignment</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to assign this lecturer?
                                                        <form action="<?php echo base_url().'Dashboard/Dosen/insertAssign'?>" method="post" novalidate="novalidate">
                                                        <div class="form-group">
                                                            <label for="cc-payment" class="control-label mb-1">NIDN</label>
                                                            <input type="text" class="form-control" placeholder = "NIDN" name="nidn" value="<?php echo $list->nidn ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="cc-payment" class="control-label mb-1">Nama Dosen</label>
                                                            <input type="text" class="form-control" placeholder = "Nama Dosen" name="nama_dosen" value="<?php echo $list->nama_dosen ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Yes</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                                                    <?php
                                                    } 
                                                    ?>
                                    </tbody>
                                </table>
                            </form>
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
                        Copyright &copy; 2018 Ela Dosen
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->