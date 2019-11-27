
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
                                <h1>Academics</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li>Academics</li>
                                    <li class="active">Materi</li>
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
                                <strong class="card-title">Materi Mata Kuliah <?php echo $matkul['nama_mata_kuliah'] ?></strong>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body card-block">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <?php 
                                                $a=1;
                                            foreach($materi as $i){ 
                                                if($a == 1){    
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                                            </li>
                                                <?php }
                                                else{ ?>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#week<?php echo $a?>" role="tab" aria-controls="profile" aria-selected="false">Week <?php echo $a ?></a>
                                            </li>
                                            <?php }
                                            $a++;
                                            } ?>
                                        </ul>
                                        
                                        <div class="tab-content pl-3 p-1" id="myTabContent">
                                            <?php
                                            $a=1; 
                                            foreach($materi as $i){
                                                if($a==1){ ?>
                                                    <button class="btn btn-outline-primary float-right" style="z-index:100" data-toggle="modal" data-target="#editMateri_<?php echo $i->id_materi?>">EDIT</button>
                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                
                                                <h2>Home</h2>
                                                <h4><?php echo $i->judul_materi ?></h4>
                                                <p><?php echo $i->penjelasan_materi ?></p>
                                            </div>
                                            <?php }else{
                                            ?>
                                            
                                            <div class="tab-pane fade" id="week<?php echo $a?>" role="tabpanel" aria-labelledby="profile-tab">
                                                <div class="float-right">
                                                    
                                                </div>
                                                <h2>Week <?php echo $a ?></h2>
                                                <h4><?php echo $i->judul_materi ?></h4>
                                                <p><?php echo $i->penjelasan_materi ?></p>
                                            </div>
                                        <?php }//tutup else
                                        
                                        ?>
                                        
                                        <div class="modal fade" id="editMateri_<?php echo $i->id_materi?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Input Data Matakuliah</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <form action="<?php echo base_url(). 'Dashboard/Materi/updateData'?>" method="post" novalidate="novalidate">
                                                                        <input type="hidden" name="id_mata_kuliah" id="" value="<?php echo $i->id_mata_kuliah ?>">
                                                                        <div class="row form-group">
                                                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">ID Materi</label></div>
                                                                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="id_materi" placeholder="" value="<?php echo $i->id_materi ?>" class="form-control" readonly></div>
                                                                        </div>
                                                                        <div class="row form-group">
                                                                            <div class="col col-md-3"><label for="select" class=" form-control-label">Pertemuan Ke-</label></div>
                                                                            <div class="col-12 col-md-9">
                                                                            <input type="text" id="text-input" name="kali_pertemuan" placeholder="" value="<?php echo $i->kali_pertemuan ?>" class="form-control" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row form-group">
                                                                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">Judul Materi</label></div>
                                                                            <div class="col-12 col-md-9"><input type="text" id="judul_materi" name="judul_materi" placeholder="Judul Materi" value="<?php echo $i->judul_materi ?>" class="form-control"></div>
                                                                        </div>
                                                                        <div class="row form-group">
                                                                            <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Penjelasan Materi</label></div>
                                                                            <div class="col-12 col-md-9"><textarea name="penjelasan_materi" id="penjelasan_materi" rows="9" placeholder="Penjelasan Materi" class="form-control"><?php echo $i->penjelasan_materi ?></textarea></div>
                                                                        </div>
                                                                        
                                                                        <div class="row form-group">
                                                                            <div class="col col-md-3"><label for="file-multiple-input" class=" form-control-label">Multiple File input</label></div>
                                                                            <div class="col-12 col-md-9"><input type="file" id="direktori_file" name="direktori_file" multiple="" class="form-control-file"></div>
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


        
                                     <?php $a++;} //tutup for?>
                                        </div>
                                    </div>   
                                </div>
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
