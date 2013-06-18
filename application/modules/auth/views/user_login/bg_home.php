<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="<?php echo base_url(); ?>"><?php echo $judul_pendek; ?></a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home icon-white"></i> Beranda</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-comment icon-white"></i> Panduan <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="icon-fire"></i> Administrator</a></li>
                            <li><a href="#"><i class="icon-asterisk"></i> Gudang</a></li>
                            <li><a href="#"><i class="icon-leaf"></i> Manager</a></li>
                        </ul>
                    </li>
                </ul>
                <?php echo form_open('auth/index','class="navbar-form pull-right"'); ?>
                <input class="span2" type="text" name="username" placeholder="Username..." value="<?php echo set_value('username'); ?>">
                <input class="span2" type="password" name="password" placeholder="Password...">
                <button type="submit" class="btn btn-primary "><i class="icon-share icon-white"></i> Log in</button>
                <?php echo form_close(); ?>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
<div class="container">

    <?php if(validation_errors()) { ?>
    <div class="alert alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h4>Terjadi Kesalahan!</h4>
        <?php echo validation_errors(); ?>
    </div>
    <?php } ?>

    <?php if($this->session->flashdata('result_login')) { ?>
    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h4>Terjadi Kesalahan!</h4>
        <?php echo $this->session->flashdata('result_login'); ?>
    </div>
    <?php } ?>
    <div class="hero-unit">
        <h2>Selamat Datang di <?php echo $judul_lengkap.' '.$instansi; ?></h2>
        <p><?php echo $judul_lengkap.' '.$instansi; ?> merupakan sebuah aplikasi untuk melakukan manajemen data barang di <?=$instansi;?>. Silahkan masukkan username dan password anda untuk mulai melakukan manajemen atau pengolahan data sesuai dengan hak akses yang anda miliki.</p>
        <p><a href="http://fb.me/khaeransori.nad/" class="btn btn-primary btn-large">Meet the Creator <i class="icon-circle-arrow-right icon-white"></i> </a></p>
    </div>