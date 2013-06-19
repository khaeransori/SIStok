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
    <?php if(validation_errors()) { ?>
    <div class="alert alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h4>Terjadi Kesalahan!</h4>
        <?php echo validation_errors(); ?>
    </div>
<?php } ?>
<?php echo form_open('app/transaksi/simpan','class="form-horizontal"'); ?>
    <div class="control-group">
        <legend>Manajemen Stok Barang</legend>
        <label class="control-label" for="id_barang">Nama Stok Barang</label>
        <div class="controls">
            <select name="id_barang" id="id_barang">
            <?php
                foreach ($barang_list->result_array() as $bl) {
                    ?>
                    <option value="<?php echo $bl['id_barang']; ?>">(<?php echo $bl['stok_barang']; ?> <?php echo $bl['nama_satuan_barang']; ?>) [<?php echo $bl['kode_kategori_barang']; ?> <?php echo $bl['id_barang']; ?>] <?php echo $bl['nama_barang']; ?></option>
                    <?php
                }
            ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="jumlah_barang_masuk">Jumlah Barang Masuk</label>
        <div class="controls">
            <input type="text" class="span" name="jumlah_barang_masuk" id="jumlah_barang_masuk" value="" placeholder="Jumlah Barang Masuk">
        </div>
    </div>
    <input type="hidden" name="st" value="<?php echo $st; ?>">
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <button type="reset" class="btn">Hapus Data</button>
        </div>
    </div>
<?php echo form_close(); ?>
</div>