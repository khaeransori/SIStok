<div class="well">
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <div class="container">
            <a class="brand" href="#">Stok Barang</a>
            <div class="nav-collapse">
                <ul class="nav">
                    <?php
                    if($this->session->userdata("sess_level")==1 || $this->session->userdata("sess_level")==2) {
                    ?>
                    <li><a href="<?php echo base_url(); ?>app/transaksi/tambah" class="small-box"><i class="icon-plus-sign icon-white"></i> Tambah Stok Barang</a></li>
                    <li><a href="<?php echo base_url(); ?>app/transaksi/kurang" class="small-box"><i class="icon-minus-sign icon-white"></i> Kurang Stok Barang</a></li>
                    <?php
                    }
                    ?>
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
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Waktu</th>
                    <th>Oleh</th>
                    <th>Status</th>
                    <th>Stok Barang</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $no=$tot+1;
            foreach($list_barang->result_array() as $lb)
            {
                $st = "<span class='label label-important'>Keluar</span>";
                if($lb['status']==1){$st="<span class='label label-info'>Masuk</span>";}
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td>[<?php echo $lb['kode_kategori_barang']." ".$lb['id_barang']; ?> - <?php echo $lb['nama_kategori_barang']; ?>] <?php echo $lb['nama_barang']; ?></td>
                    <td><?php echo $lb['jumlah']; ?> <?php echo $lb['nama_satuan_barang']; ?></td>
                    <td><?php echo $lb['waktu']; ?></td>
                    <td><?php echo $lb['nama']; ?></td>
                    <td><?php echo $st; ?></td>
                    <td><?php echo $lb['stok_barang']; ?> <?php echo $lb['nama_satuan_barang']; ?></td>
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