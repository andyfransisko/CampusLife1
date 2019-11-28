
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
                                    <li class="active">User</li>
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
                                <strong class="card-title">User</strong>
                                <div class="float-right">
                                    <a href="<?php echo base_url().'Dashboard/User/exportPDF' ?>" target="_blank">
                                        <button type="button" class="btn btn-success">
                                            Export
                                        </button>
                                    </a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputUser">
                                        <span class="ti-plus"></span> Input
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr align="center">
                                            <th>Username</th>
                                            <th>Images</th>
                                            <th>Tipe Akun</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($user as $list){ ?>
                                        <tr align="center">
                                            <td><?php echo $list->username ?></td>
                                            <td><?php echo $list->images ?></td>
                                            <td>
                                                <?php   
                                                   if($list->tipe_akun == 1){
                                                    echo "Mahasiswa";
                                                    }
                                                    else if($list->tipe_akun == 2){
                                                        echo "Dosen";
                                                    }
                                                    else{
                                                        echo "Admin";
                                                    } 
                                                ?>
                                            </td>
                                            <td>
                                            <?php   
                                                    if($list->status == 1){
                                                        echo "Aktif";
                                                    
                                                    }else{
                                                        echo "Non-Aktif";
                                                    } 
                                                ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#editUser_<?php echo $list->username?>">Edit</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-danger"><a href="<?php echo base_url(). 'Dashboard/Semester/hapusData/'.$list->username;?>">Delete</button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="editUser_<?php echo $list->username?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mediumModalLabel">Edit Data User</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?php echo base_url(). "Dashboard/User/updateData"?>" method="POST" novalidate="novalidate">
                                                    <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="cc-payment" class="control-label mb-1">Username</label>
                                                                    <input type="text" class="form-control" placeholder = "Username" id="username" name="username" value="<?php echo $list->username ?>" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cc-payment" class="control-label mb-1">New Password</label>
                                                                    <input  type="text" class="form-control" placeholder = "New Password" id="password" name="password">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jenis_kelamin" class="control-label mb-1">Image Directory</label><br>
                                                                    <input  type="text" class="form-control" placeholder = "Image" id="password" name="password">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="id_jurusan" class="control-label mb-1">Account Type</label><br>
                                                                    <select data-placeholder="Pilih Jenis Semester" class="standardSelect form-control" tabindex="1" name="tipe_akun" id="tipe_akun">
                                                                        <option value="1" <?php echo ($list->tipe_akun == 1 ? "selected" : "") ?>>Mahasiswa</option>
                                                                        <option value="2" <?php echo ($list->tipe_akun == 2 ? "selected" : "") ?>>Dosen</option>
                                                                        <option value="0" <?php echo ($list->tipe_akun == 3 ? "selected" : "") ?>>Admin</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cc-payment" class="control-label mb-1">Status</label>
                                                                    <select data-placeholder="Pilih Jenis Semester" class="standardSelect form-control" tabindex="1" name="id_jurusan" id="id_jurusan">
                                                                        <option value="1" <?php echo ($list->status == 1 ? "selected" : "") ?>>Aktif</option>
                                                                        <option value="0" <?php echo ($list->status == 0 ? "selected" : "") ?>>Non-Aktif/Deleted</option>
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
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <!-- Modal -->
        <div class="modal fade" id="inputUser" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Input Data User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <form action="#" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Username</label>
                                                <input id="cc-payment" name="username" type="text" class="form-control" placeholder = "Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Password (New)</label>
                                                <input id="cc-payment" name="password" type="password" class="form-control" placeholder = "Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Images</label>
                                                <input id="cc-payment" name="image" type="text" class="form-control" placeholder = "Images">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Tipe Akun</label><br>
                                                <select data-placeholder="Pilih Tipe Akun" class="standardSelect form-control" tabindex="1" name="tipe_akun">
                                                    <option value="1">Mahasiswa</option>
                                                    <option value="2">Dosen</option>
                                                    <option value="0">Admin</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Status</label><br>
                                                <select data-placeholder="Pilih Tipe Dosen" class="standardSelect form-control" tabindex="1" name="">
                                                    <option value="1">Aktif</option>
                                                    <option value="0">Non-aktif</option>
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
