<div class="well">
<?php echo form_open('app/satuan_barang/simpan','class="form-horizontal"'); ?>
    <div class="control-group">
        <legend>Manajemen Satuan Barang</legend>
        <label class="control-label" for="nama_satuan_barang">Nama Satuan Barang</label>
        <div class="controls">
            <input type="text" class="span" name="nama_satuan_barang" id="nama_satuan_barang" value="<?php echo $nama_satuan_barang; ?>" readonly="true" placeholder="Nama Satuan Barang">
        </div>
    </div>
<?php echo form_close(); ?>
</div>