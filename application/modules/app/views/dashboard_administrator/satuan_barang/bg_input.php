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
<?php echo form_open('app/satuan_barang/simpan','class="form-horizontal"'); ?>
    <div class="control-group">
        <legend>Manajemen Satuan Barang</legend>
        <label class="control-label" for="nama_satuan_barang">Nama Satuan Barang</label>
        <div class="controls">
            <input type="text" class="span" name="nama_satuan_barang" id="nama_satuan_barang" value="<?php echo $nama_satuan_barang; ?>" placeholder="Nama Satuan Barang">
        </div>
    </div>
    <input type="hidden" name="id_param" value="<?php echo $id_param; ?>">
    <input type="hidden" name="st" value="<?php echo $st; ?>">
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <button type="reset" class="btn">Hapus Data</button>
        </div>
    </div>
<?php echo form_close(); ?>
</div>