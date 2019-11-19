<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Matakuliah - HTML5 Matakuliah Template</title>
    <meta name="description" content="Ela Matakuliah - HTML5 Matakuliah Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="icon" type="image/png" href="images/logo5.png"/>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
  <!-- /#left-panel -->
  <?php
        include('left.php');
    ?>

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php
            include('head.php');
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
                                    <thead>
                                        <tr>
                                            <th>ID Matakuliah</th>
                                            <th>Nama Matakuliah</th>
                                            <th>SKS</th>
                                            <th>ID Semester</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                            $i=1;
                            foreach($matakuliah as $list){
                          ?>
                                        <tr align="center">
                                            <td><?php echo $list->id_mata_kuliah ?></td>
                                            <td><?php echo $list->nama_mata_kuliah ?></td>
                                            <td><?php echo $list->sks ?></td>
                                            <td><?php echo $list->id_semester ?></td>
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
                            
                            <form action="<?php echo 'updateData'?>" method="POST" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">ID Matakuliah</label>
                                                <input type="text" class="form-control" placeholder = "nidn" id="id_matakuliah" name="id_mata_kuliah" value="<?php echo $list->id_mata_kuliah ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Matakuliah</label>
                                                <input  type="text" class="form-control" placeholder = "Nama Matakuliah" id="nama_matakuliah" name="nama_matakuliah" value="<?php echo $list->nama_mata_kuliah?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">SKS</label>
                                                <input  type="text" class="form-control" placeholder = "SKS" id="sks" name="sks" value="<?php echo $list->sks?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Jenis Semester - Tahun</label><br>
                                                <select data-placeholder="Pilih Jenis Semester" class="standardSelect" tabindex="1"name="id_semester" id="id_semester">
                                                    <option value="3" <?php if(($list->id_semster) == "3") echo "selected" ?>>Matakuliah Reguler</option>
                                                    <option value="2" <?php if(($list->id_semester) == "2") echo "selected" ?>>Matakuliah Pembimbing Akademik</option>
                                                    <option value="1"<?php if(($list->id_semester) == "1")  echo "selected" ?>>Kepala Program Studi</option>
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
                                                <input type="text" class="form-control" placeholder = "ID Matakuliah" id="id_matakuliah" name="id_mata_kuliah">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Matakuliah</label>
                                                <input  type="text" class="form-control" placeholder = "Nama Matakuliah" id="nama_matakuliah" name="nama_matakuliah">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">SKS</label>
                                                <input  type="text" class="form-control" placeholder = "SKS" id="sks" name="sks">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Jenis Semester - Tahun</label><br>
                                                <select data-placeholder="Pilih Jenis Semester" class="standardSelect" tabindex="1"name="id_semester" id="tipe_Matakuliah">
                                                    <option value="3" <?php if(($list->tipe_Matakuliah) == "3") echo "selected" ?>>Matakuliah Reguler</option>
                                                    <option value="2" <?php if(($list->tipe_Matakuliah) == "2") echo "selected" ?>>Matakuliah Pembimbing Akademik</option>
                                                    <option value="1"<?php if(($list->tipe_Matakuliah) == "1")  echo "selected" ?>>Kepala Program Studi</option>
                                                </select>
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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../assets/js/main.js"></script>


    <script src="../assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/jszip.min.js"></script>
    <script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../assets/js/init/datatables-init.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>


</body>
</html>
