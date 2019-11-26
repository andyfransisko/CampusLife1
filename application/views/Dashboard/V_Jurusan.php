
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
                                    <li class="active">Jurusan</li>
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
                                <strong class="card-title">Jurusan</strong>
                                <div class="float-right">
                                    <a href="<?php echo base_url().'Dashboard/Jurusan/exportPDF' ?>" target="_blank">
                                        <button type="button" class="btn btn-success">
                                            Export
                                        </button>
                                    </a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputJurusan">
                                        <span class="ti-plus"></span> Input
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead align="center">
                                        <tr>
                                            <th>ID Jurusan</th>
                                            <th>Nama Jurusan</th>
                                            <th>Keterangan Jurusan</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                            $i=1;
                            foreach($jurusan as $list){
                          ?>
                                        <tr align="center">
                                            <td><?php echo $list->id_jurusan ?></td>
                                            <td><?php echo $list->nama_jurusan ?></td>
                                            <td><?php echo $list->keterangan_jurusan ?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#editJurusan_<?php echo $list->id_jurusan?>">Edit</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-danger"><a href="<?php echo base_url(). 'Jurusan/hapusData/'.$list->id_jurusan;?>">Delete</button>
                                            </td>
                                        </tr>

                                         <div class="modal fade" id="editJurusan_<?php echo $list->id_jurusan?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mediumModalLabel">Edit Data Jurusan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                            
                            <form action="<?php echo 'updateData'?>" method="POST" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">ID Jurusan</label>
                                                <input type="text" class="form-control" placeholder = "ID Jurusan" id="id_jurusan" name="id_jurusan" value="<?php echo $list->id_jurusan ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Jurusan</label>
                                                <input  type="text" class="form-control" placeholder = "Nama Jurusan" id="nama_jurusan" name="nama_jurusan" value="<?php echo $list->nama_jurusan?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Keterangan Jurusan</label>
                                                <input type="text" class="form-control" placeholder = "Keterangan" id="keterangan_jurusan" name="keterangan_jurusan" value="<?php echo $list->keterangan_jurusan?>">
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
                                        <?php
                          } 
                          ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <!-- Modal -->
        <div class="modal fade" id="inputJurusan" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Input Data Jurusan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <form action="<?php echo 'insertData'?>" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">ID Jurusan</label>
                                                <input name="id_jurusan" type="text" class="form-control" placeholder = "ID Jurusan">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Jurusan</label>
                                                <input name="nama_jurusan" type="text" class="form-control" placeholder = "Nama Jurusan">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Keterangan Jurusan</label>
                                                <input name="keterangan_jurusan" type="text" class="form-control" placeholder = "Keterangan Jurusan">
                                            </div>
                                            
                                        

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>


        <div class="clearfix"></div>

        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Jurusan
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->