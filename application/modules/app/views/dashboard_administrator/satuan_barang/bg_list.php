<div class="well">
<?php if($this->session->flashdata('fail')) { ?>
    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h4>Terjadi Kesalahan!</h4>
        <?php echo $this->session->flashdata('fail'); ?>
    </div>
<?php } ?>
<?php if($this->session->flashdata('success')) { ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h4>Berhasil!</h4>
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php } ?>
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <div class="container">
            <a class="brand" href="#">Satuan Barang</a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li><a href="<?php echo base_url(); ?>app/satuan_barang/tambah" class="small-box"><i class="icon-plus-sign icon-white"></i> Tambah Satuan</a></li>
                </ul>
            </div>
            </div>
        </div><!-- /navbar-inner -->
    </div><!-- /navbar -->

    <section>
        <table class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $no=$tot+1;
            foreach($list_satuan->result_array() as $ls)
            {
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $ls['nama_satuan_barang']; ?></td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-small small-box" href="<?php echo base_url(); ?>app/satuan_barang/detail/<?php echo $ls['id_satuan_barang']; ?>"><i class="icon-ok-circle"></i> Lihat Detail</a>
                            <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>app/satuan_barang/edit/<?php echo $ls['id_satuan_barang']; ?>" class="small-box"><i class="icon-pencil"></i> Edit Data</a></li>
                                <li><a href="<?php echo base_url(); ?>app/satuan_barang/hapus/<?php echo $ls['id_satuan_barang']; ?>" onClick="return confirm('Anda yakin..???');"><i class="icon-trash"></i> Hapus Data</a></li>
                            </ul>
                        </div><!-- /btn-group -->
                    </td>
                </tr>
            <?php
            $no++;
            }
            ?>
            </tbody>
        </table>
        <div class="pagination pagination-centered">
            <ul>
                <?php
                echo $paginator;
                ?>
            </ul>
        </div>
    </section>
</div>