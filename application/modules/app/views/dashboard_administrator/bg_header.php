<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="<?php echo base_url(); ?>"><?php echo $judul_pendek; ?></a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active"><a href="<?php echo base_url(); ?>"><i class="icon-home icon-white"></i> Beranda</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-book icon-white"></i> Master Data <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>master_data_kendaraan"><i class="icon-tag"></i> Master Data Kendaraan</a></li>
                            <li><a href="<?php echo base_url(); ?>master_data_kode_plat"><i class="icon-question-sign"></i> Master Data Kode Plat</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-book icon-white"></i> Data Parkir <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>data_parkir_masuk"><i class="icon-random"></i> Data Parkir Masuk</a></li>
                            <li><a href="<?php echo base_url(); ?>data_parkir_keluar"><i class="icon-retweet"></i> Data Parkir Keluar</a></li>
                            <li><a href="<?php echo base_url(); ?>data_parkir_semua"><i class="icon-eye-open"></i> Data Parkir Semua</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="btn-group pull-right">
                    <button class="btn btn-primary"><i class="icon-user icon-white"></i> <?php echo $this->session->userdata('sess_nama'); ?></button>
                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>app/change_password"><i class="icon-wrench"></i> Pengaturan Akun</a></li>
                        <li><a href="<?php echo base_url(); ?>app/manage_user"><i class="icon-tasks"></i> Manajemen User</a></li>
                        <li><a href="<?php echo base_url(); ?>app/logout"><i class="icon-off"></i> Log Out</a></li>
                    </ul>
                </div>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container">

    <div class="well">
        <div class="row">
            <div class="span">
                <h3><?php echo $judul_lengkap.' '.$instansi; ?></h3>
                <p><?php echo $alamat; ?></p>
            </div>
        </div>
    </div>