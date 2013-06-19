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
<?php echo form_open('app/barang/simpan','class="form-horizontal"'); ?>
     <div class="control-group">
         <legend>Manajemen Barang</legend>
        <label class="control-label" for="nama_barang">Nama Barang</label>
        <div class="controls">
            <input type="text" class="span" name="nama_barang" id="nama_barang" value="<?php echo $nama_barang; ?>" placeholder="Nama Barang">
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="id_kategori_barang">Kategori Barang</label>
        <div class="controls">
            <select name="id_kategori_barang" id="id_kategori_barang">
            <?php
                foreach ($kategori_list->result_array() as $kl) {
                    if($id_kategori_barang==$kl['id_kategori_barang'])
                    {
                ?>
                    <option value="<?php echo $kl['id_kategori_barang']; ?>" selected="selected">[<?php echo $kl['kode_kategori_barang']; ?>] <?php echo $kl['nama_kategori_barang']; ?></option>
                <?php
                    }
                    else
                    {
                ?>
                    <option value="<?php echo $kl['id_kategori_barang']; ?>">[<?php echo $kl['kode_kategori_barang']; ?>] <?php echo $kl['nama_kategori_barang']; ?></option>
                <?php
                    }
                }
            ?>
            </select>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="id_satuan_barang">Satuan Barang</label>
        <div class="controls">
            <select name="id_satuan_barang" id="id_satuan_barang">
            <?php
                foreach ($satuan_list->result_array() as $sl) {
                    if($id_satuan_barang==$sl['id_satuan_barang'])
                    {
                ?>
                    <option value="<?php echo $sl['id_satuan_barang']; ?>" selected="selected"><?php echo $sl['nama_satuan_barang']; ?></option>
                <?php
                    }
                    else
                    {
                ?>
                    <option value="<?php echo $sl['id_satuan_barang']; ?>"><?php echo $sl['nama_satuan_barang']; ?></option>
                <?php
                    }
                }
            ?>
            </select>
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