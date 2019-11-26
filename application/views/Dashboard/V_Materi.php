
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
                                    <li class="active">Mata Kuliah</li>
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
                                <strong class="card-title">Mata Kuliah</strong>
                                <div class="float-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputMateri">
                                        <span class="ti-plus"></span> Input
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="week1-tab" data-toggle="tab" href="#week1" role="tab" aria-controls="home" aria-selected="true">Menu 1</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="week2-tab" data-toggle="tab" href="#week2" role="tab" aria-controls="contact" aria-selected="false">Menu 2</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="week3-tab2" data-toggle="tab" href="#week3" role="tab" aria-controls="contact" aria-selected="false">Menu 3</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="week4-tab" data-toggle="tab" href="#week4" role="tab" aria-controls="contact" aria-selected="false">Menu 4</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="week5-tab" data-toggle="tab" href="#week5" role="tab" aria-controls="contact" aria-selected="false">Menu 5</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="week6-tab" data-toggle="tab" href="#week6" role="tab" aria-controls="contact" aria-selected="false">Menu 6</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="week7-tab" data-toggle="tab" href="#week7" role="tab" aria-controls="contact" aria-selected="false">Menu 7</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="week8-tab" data-toggle="tab" href="#week8" role="tab" aria-controls="contact" aria-selected="false">Menu 8</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="week9-tab" data-toggle="tab" href="#week9" role="tab" aria-controls="contact" aria-selected="false">Menu 9</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="week10-tab" data-toggle="tab" href="#week10" role="tab" aria-controls="contact" aria-selected="false">Menu 10</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="week11-tab" data-toggle="tab" href="#week11" role="tab" aria-controls="contact" aria-selected="false">Menu 11</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="week12-tab" data-toggle="tab" href="#week12" role="tab" aria-controls="contact" aria-selected="false">Menu 12</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="week13-tab" data-toggle="tab" href="#week13" role="tab" aria-controls="contact" aria-selected="false">Menu 13</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="week14-tab" data-toggle="tab" href="#week14" role="tab" aria-controls="contact" aria-selected="false">Menu 14</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="week15-tab" data-toggle="tab" href="#week15" role="tab" aria-controls="contact" aria-selected="false">Menu 15</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="week16-tab" data-toggle="tab" href="#week16" role="tab" aria-controls="contact" aria-selected="false">Menu 16</a>
                                        </li>
                                </ul>
                                <div class="tab-content pl-3 p-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="week1" role="tabpanel" aria-labelledby="home-tab">
                                        <h3>Week 1</h3>
                                        <h5><?php echo $data['judul']; ?></h5>
                                        <p><?php echo $data['penjelasan'] ?></p>

                                    </div>
                                    <div class="tab-pane fade" id="week2" role="tabpanel" aria-labelledby="profile-tab">
                                        <h3>Week 2</h3>
                                        <p>Some content here.</p>
                                    </div>
                                    <div class="tab-pane fade" id="week3" role="tabpanel" aria-labelledby="week">
                                        <h3>Week 3</h3>
                                        <p>Some content here.</p>
                                    </div>
                                    <div class="tab-pane fade" id="week4" role="tabpanel" aria-labelledby="week2">
                                        <h3>Week 4</h3>
                                        <p>Some content here.</p>
                                    </div>
                                    <div class="tab-pane fade" id="week5" role="tabpanel" aria-labelledby="week3">
                                        <h3>Week 5</h3>
                                        <p>Some content here.</p>
                                    </div>
                                    <div class="tab-pane fade" id="week6" role="tabpanel" aria-labelledby="week4">
                                        <h3>Week 6</h3>
                                        <p>Some content here.</p>
                                    </div>
                                    <div class="tab-pane fade" id="week7" role="tabpanel" aria-labelledby="week5">
                                        <h3>Week 7</h3>
                                        <p>Some content here.</p>
                                    </div>
                                    <div class="tab-pane fade" id="week8" role="tabpanel" aria-labelledby="week6">
                                        <h3>Week 8</h3>
                                        <p>Some content here.</p>
                                    </div>
                                    <div class="tab-pane fade" id="week9" role="tabpanel" aria-labelledby="week4">
                                        <h3>Week 9</h3>
                                        <p>Some content here.</p>
                                    </div>
                                    <div class="tab-pane fade" id="week10" role="tabpanel" aria-labelledby="week4">
                                        <h3>Week 10</h3>
                                        <p>Some content here.</p>
                                    </div>
                                    <div class="tab-pane fade" id="week11" role="tabpanel" aria-labelledby="week4">
                                        <h3>Week 11</h3>
                                        <p>Some content here.</p>
                                    </div>
                                    <div class="tab-pane fade" id="week12" role="tabpanel" aria-labelledby="week4">
                                        <h3>Week 12</h3>
                                        <p>Some content here.</p>
                                    </div>
                                    <div class="tab-pane fade" id="week13" role="tabpanel" aria-labelledby="week4">
                                        <h3>Week 13</h3>
                                        <p>Some content here.</p>
                                    </div>
                                    <div class="tab-pane fade" id="week14" role="tabpanel" aria-labelledby="week4">
                                        <h3>Week 14</h3>
                                        <p>Some content here.</p>
                                    </div>

                                    <div class="tab-pane fade" id="week15" role="tabpanel" aria-labelledby="week4">
                                        <h3>Week 15</h3>
                                        <p>Some content here.</p>
                                    </div>
                                    <div class="tab-pane fade" id="week16" role="tabpanel" aria-labelledby="week4">
                                        <h3>Week 16</h3>
                                        <p>Some content here.</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <!-- Modal -->
        <div class="modal fade" id="inputMateri" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Input Data Materi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <form action="#" method="post" novalidate="novalidate">
                                            
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">ID Materi</label>
                                                <input id="cc-payment" name="id_materi" type="text" class="form-control" placeholder = "ID Jadwal Custom" value="MTR-<?php $count+1?>" readonly>
                                            </div>
                                           <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Mata Kuliah</label><br>
                                                <select data-placeholder="Pilih Mahasiswa" class="standardSelect" tabindex="1">
                                                    <?php foreach($matkul as $a){ ?>
                                                        <option value="<?php echo $a->id_mata_kuliah ?>"><?php echo $a->nama_mata_kuliah ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Judul Materi</label>
                                                <input id="cc-payment" name="judul_materi" type="text" class="form-control" placeholder = "                                    </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Penjelasan Materi</label>
                                                <textarea id="cc-payment" name="penjelasan_materi" type="text" class="form-control" placeholder = "Penjelasan Materi"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Pertemuan</label>
                                                <select data-placeholder="Pilih Mahasiswa" class="standardSelect" tabindex="1">
                                                    <option value="1">Week 1</option>
                                                    <option value="2">Week 2</option>
                                                    <option value="3">Week 3</option>
                                                    <option value="4">Week 4</option>
                                                    <option value="5">Week 5</option>
                                                    <option value="6">Week 6</option>
                                                    <option value="7">Week 7</option>
                                                    <option value="8">Week 8</option>
                                                    <option value="9">Week 9</option>
                                                    <option value="10">Week 10</option>
                                                    <option value="11">Week 11</option>
                                                    <option value="12">Week 12</option>
                                                    <option value="13">Week 13</option>
                                                    <option value="14">Week 14</option>
                                                    <option value="15">Week 15</option>
                                                    <option value="16">Week 16</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tempat</label>
                                                <input id="cc-payment" name="file" type="file" class="form-control" placeholder = "Tempat">
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary">Submit</button>
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
