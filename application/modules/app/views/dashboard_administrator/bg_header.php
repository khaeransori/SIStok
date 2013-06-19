<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="<?php echo base_url(); ?>"><?php echo $judul_pendek; ?></a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="<?php echo isset($beranda_aktif) ? $beranda_aktif : "";  ?>"><a href="<?php echo base_url(); ?>"><i class="icon-home icon-white"></i> Beranda</a></li>
                </ul>
                
                <div class="btn-group pull-right">
                    <button class="btn btn-primary"><i class="icon-user icon-white"></i> <?php echo $this->session->userdata('sess_nama'); ?></button>
                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>app/change_password"><i class="icon-wrench"></i> Pengaturan Akun</a></li>
                        <li><a href="<?php echo base_url(); ?>app/logout"><i class="icon-off"></i> Log Out</a></li>
                    </ul>
                </div>
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
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>app/manage_user"><i class="icon-fire"></i> Manajemen User</a></li>
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