<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="<?php echo base_url(); ?>"><?php echo $judul_pendek; ?></a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="<?php echo isset($beranda_aktif) ? $beranda_aktif : "";  ?>"><a href="<?php echo base_url(); ?>"><i class="icon-home icon-white"></i> Beranda</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-retweet icon-white"></i> Transaksi <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php
                            if(($this->session->userdata("sess_level")==1) || ($this->session->userdata("sess_level")==2)) {
                                ?>
                                <li><a href="<?php echo base_url('app/transaksi/masuk'); ?>"><i class="icon-chevron-down"></i> Transaksi Masuk</a></li>
                                <li><a href="<?php echo base_url('app/transaksi/keluar'); ?>"><i class="icon-chevron-up"></i> Transaksi Keluar</a></li>
                                <?php
                            }
                            ?>
                            <li><a href="<?php echo base_url('app/transaksi'); ?>"><i class="icon-briefcase"></i> Rekap Transaksi</a></li>
                        </ul>
                    </li>
                </ul>
                
                <div class="btn-group pull-right">
                    <button class="btn btn-primary"><i class="icon-user icon-white"></i> <?php echo $this->session->userdata('sess_nama'); ?></button>
                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('app/change_password'); ?>"><i class="icon-wrench"></i> Pengaturan Akun</a></li>
                        <li><a href="<?php echo base_url('auth/logout'); ?>"><i class="icon-off"></i> Log Out</a></li>
                    </ul>
                </div>
                <?php
                if(($this->session->userdata("sess_level")==1) || ($this->session->userdata("sess_level")==2)) {
                    ?>
                    <div class="btn-group pull-right"></div>
                    <div class="btn-group pull-right">
                        <button class="btn btn-primary"><i class="icon-cogs icon-white"></i> Konfigurasi</button>
                        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>app/kategori_barang"><i class="icon-tags"></i> Kategori Barang</a></li>
                            <li><a href="<?php echo base_url(); ?>app/satuan_barang"><i class="icon-list"></i> Satuan Barang</a></li>
                            <li><a href="<?php echo base_url(); ?>app/barang"><i class="icon-shopping-cart"></i> Barang</a></li>
                            <?php
                            if($this->session->userdata("sess_level")==1) {
                                ?>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url(); ?>app/manage_user"><i class="icon-fire"></i> Manajemen User</a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <?php
                }
                ?>
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