<div class="well">
<?php echo form_open('app/kategori_barang/simpan','class="form-horizontal"'); ?>
    <div class="control-group">
        <legend>Manajemen Kategori Barang</legend>
        <label class="control-label" for="kode_kategori_barang">Kode Kategori Barang</label>
        <div class="controls">
            <input type="text" class="span" name="kode_kategori_barang" id="kode_kategori_barang" value="<?php echo $kode_kategori_barang; ?>" readonly="true" placeholder="Kode Kategori Barang">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="nama_kategori_barang">Nama Kategori Barang</label>
        <div class="controls">
            <input type="text" class="span" name="nama_kategori_barang" id="nama_kategori_barang" value="<?php echo $nama_kategori_barang; ?>" readonly="true" placeholder="Nama Kategori Barang">
        </div>
    </div>
<?php echo form_close(); ?>
</div>