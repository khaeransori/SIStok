<div class="well">
<?php echo form_open('app/barang/simpan','class="form-horizontal"'); ?>
    <div class="control-group">
        <legend>Manajemen Barang</legend>
        <label class="control-label" for="kode_barang">Kode Barang</label>
        <div class="controls">
            <input type="text" class="span" name="kode_barang" id="kode_barang" value="<?php echo $kode_kategori_barang." ".$id_barang; ?>" readonly="true" placeholder="Kode Barang">
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="nama_barang">Nama Barang</label>
        <div class="controls">
            <input type="text" class="span" name="nama_barang" id="nama_barang" value="<?php echo $nama_barang; ?>" readonly="true" placeholder="Nama Barang">
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="nama_kategori_barang">Kategori Barang</label>
        <div class="controls">
            <input type="text" class="span" name="nama_kategori_barang" id="nama_kategori_barang" value="<?php echo $nama_kategori_barang; ?>" readonly="true" placeholder="Nama Kategori Barang">
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="satuan_barang">Satuan Barang</label>
        <div class="controls">
            <input type="text" class="span" name="satuan_barang" id="satuan_barang" value="<?php echo $satuan_barang; ?>" readonly="true" placeholder="Satuan Barang">
        </div>
    </div>
<?php echo form_close(); ?>
</div>