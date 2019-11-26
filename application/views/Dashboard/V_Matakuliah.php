
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
                                            <th>SKS</th>
                                            <th>Tahun Ajaran</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                            $arr=[
                                1=>"Ganjil",
                                2=>"Genap",
                                3=>"Akselerasi",
                            ];
                            foreach($matakuliah as $list){
                          ?>
                                        <tr align="center">
                                            <td><?php echo $list->id_mata_kuliah ?></td>
                                            <td><?php echo $list->nama_mata_kuliah ?></td>
                                            <td><?php echo $list->sks ?></td>
                                            <td><?php echo $list->tahun." - ".$arr[$list->jenis_semester] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#editMatakuliah_<?php echo $list->id_mata_kuliah?>">Edit</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-danger"><a href="<?php echo base_url(). 'Matakuliah/hapusData/'.$list->id_mata_kuliah;?>">Delete</button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="editMatakuliah_<?php echo $list->id_mata_kuliah?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Edit Data Matakuliah</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <form action="<?php echo base_url().'Dashboard/Matakuliah/updateData'?>" method="POST" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">ID Mata Kuliah</label>
                                                <input type="text" class="form-control" placeholder = "id_mata_kuliah" id="id_mata_kuliah" name="id_mata_kuliah" value="<?php echo $list->id_mata_kuliah ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Mata Kuliah</label>
                                                <input  type="text" class="form-control" placeholder = "Nama Matakuliah" id="nama_matakuliah" name="nama_mata_kuliah" value="<?php echo $list->nama_mata_kuliah?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">SKS</label>
                                                <input  type="text" class="form-control" placeholder = "SKS" id="sks" name="sks" value="<?php echo $list->sks?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Jenis Semester - Tahun</label><br>
                                                <select data-placeholder="Pilih Jenis Semester" class="standardSelect" tabindex="1"name="id_semester" id="id_semester">
                                                    <?php 
                                                    $arr=[
                                                        1=>"Ganjil",
                                                        2=>"Genap",
                                                        3=>"Akselerasi",

                                                    ];
                                                    foreach($semester as $a){?>
                                                        <option value="<?php echo $a->id_semester?>" <?php echo ($list->id_semester == $a->id_semester) ? "selected" : ""?>><?php echo $a->tahun. " - " .$arr[$a->jenis_semester]?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                                          <?php
                          } 
                          ?>
                      </div>
                                    </tbody>
                                </table>
                            </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <!-- Modal -->
        <div class="modal fade" id="inputMatakuliah" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Input Data Matakuliah</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <form action="<?php echo 'insertData'?>" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">ID Matakuliah</label>
                                                <input type="text" class="form-control" placeholder = "ID Matakuliah" id="id_matakuliah" name="id_mata_kuliah" value="MTKL-<?php echo $count+1?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Matakuliah</label>
                                                <input  type="text" class="form-control" placeholder = "Nama Matakuliah" id="nama_matakuliah" name="nama_mata_kuliah">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">SKS</label>
                                                <input  type="text" class="form-control" placeholder = "SKS" id="sks" name="sks">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Tahun - Jenis Semester</label><br>
                                                <select data-placeholder="Pilih Jenis Semester" class="standardSelect" tabindex="1"name="id_semester" id="tipe_Matakuliah">
                                                    <?php 
                                                    $arr=[
                                                        1=>"Ganjil",
                                                        2=>"Genap",
                                                        3=>"Akselerasi",

                                                    ];
                                                    foreach($semester as $a){?>
                                                        <option value="<?php echo $a->id_semester?>"><?php echo $a->tahun. " - " .$arr[$a->jenis_semester]?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Penilaian</label><br>
                                                <div class="row form-group">
                                                    <div class="col col-md-12">
                                                        <div class="form-check">
                                                            <div class="checkbox">
                                                                <label for="checkbox1" class="form-check-label ">
                                                                    <input type="checkbox" id="kat1" name="nilai[]" value="1" class="form-check-input" checked>KAT 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label for="checkbox2" class="form-check-label ">
                                                                    <input type="checkbox" id="kat2" name="nilai[]" value="2" class="form-check-input"> KAT 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label for="checkbox3" class="form-check-label ">
                                                                    <input type="checkbox" id="kat3" name="nilai[]" value="3" class="form-check-input"> KAT 3
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label for="checkbox3" class="form-check-label ">
                                                                    <input type="checkbox" id="uts" name="nilai[]" value="4" class="form-check-input" checked readonly> UTS
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label for="checkbox3" class="form-check-label ">
                                                                    <input type="checkbox" id="uas" name="nilai[]" value="5" class="form-check-input" checked readonly> UAS
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
