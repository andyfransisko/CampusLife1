<!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo base_url(). "Dashboard/Welcome" ?>"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Menu</li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Academics</a>
                        <ul class="sub-menu children dropdown-menu">
                            
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/Enroll/index';?>">Enroll</a></li>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/JadwalCustom/index';?>">Jadwal Custom</a></li>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/JadwalKuliah/index';?>">Jadwal Kuliah</a></li>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/Nilai/index';?>">Nilai</a></li>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/Materi/index';?>">Mata Kuliah</a></li>
                            
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Master Data</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/Admin/index';?>">Admin</a></li>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/Dosen/index';?>">Dosen</a></li>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/Jurusan/index';?>">Jurusan</a></li>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/Mahasiswa/index';?>">Mahasiswa</a></li>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/Matakuliah/index';?>">Matakuliah</a></li>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/Ruangan/index';?>">Ruangan</a></li>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/Semester/index';?>">Semester</a></li>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url() .'Dashboard/User/index';?>">User</a></li>
                        </ul>
                    </li>
                    <?php  //} ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>