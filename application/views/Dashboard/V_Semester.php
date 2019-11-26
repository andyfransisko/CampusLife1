
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
                                    <li class="active">Semester</li>
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
                                <strong class="card-title">Semester</strong>
                                <div class="float-right">
                                    <a href="<?php echo base_url().'Dashboard/Semester/exportPDF' ?>" target="_blank">
                                        <button type="button" class="btn btn-success">
                                            Export
                                        </button>
                                    </a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputSemester">
                                        <span class="ti-plus"></span> Input
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead align="center">
                                        <tr>
                                            <th>ID Semester</th>
                                            <th>Jenis Semester</th>
                                            <th>Tahun</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                            $i=1;
                            foreach($semester as $list){
                          ?>
                                        <tr align="center">
                                            <td><?php echo $list->id_semester ?></td>
                                            <td>
                                                <?php 
                                                    if($list->jenis_semester == 1){
                                                        echo "Ganjil";
                                                    }
                                                    else if($list->jenis_semester == 2){
                                                        echo "Genap";
                                                    }
                                                    else{
                                                        echo "Akselerasi";
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $list->tahun ?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#editSemester_<?php echo $list->id_semester?>">Edit</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-danger"><a href="<?php echo base_url(). 'Dashboard/Semester/hapusData/'.$list->id_semester;?>">Delete</button>
                                            </td>
                                        </tr>
                                         <div class="modal fade" id="editSemester_<?php echo $list->id_semester?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mediumModalLabel">Edit Data Semester</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                            
                            <form action="<?php echo base_url().'Dashboard/Semester/updateData'?>" method="POST" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">ID Semester</label>
                                                <input type="text" class="form-control" placeholder = "ID Semester" id="id_semester" name="id_semester" value="<?php echo $list->id_semester ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Jenis Semester</label><br>
                                                <select data-placeholder="Pilih Jenis Semester" class="standardSelect" tabindex="1" name="jenis_semester" id="jenis_semester">
                                                    <option value="1"<?php if(($list->jenis_semester) == "1")  echo "selected" ?>>Ganjil</option>
                                                    <option value="2" <?php if(($list->jenis_semester) == "2") echo "selected" ?>>Genap</option>
                                                    <option value="3" <?php if(($list->jenis_semester) == "3") echo "selected" ?>>Akselerasi</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tahun</label>
                                                <input type="text" class="form-control" placeholder = "Tahun" id="tahun" name="tahun" value="<?php echo $list->tahun?>">
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
        <div class="modal fade" id="inputSemester" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Input Data Semester</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <form action="<?php echo base_url(). 'Dashboard/Semester/insertData'?>" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">ID Semester</label>
                                                <input id="cc-payment" name="id_semester" type="text" class="form-control" value="SMSTR-<?php echo $count+1;?>" placeholder = "ID Semester" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Jenis Semester</label><br>
                                                <select data-placeholder="Pilih Jenis Semester" class="standardSelect" tabindex="1" name="jenis_semester" id="jenis_semester">
                                                    <option value="1">Ganjil</option>
                                                    <option value="2">Genap</option>
                                                    <option value="3">Akselerasi</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tahun</label>
                                                <input id="cc-payment" name="tahun" type="text" class="form-control" placeholder = "Tahun">
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
