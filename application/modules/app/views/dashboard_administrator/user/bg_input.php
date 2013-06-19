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
<?php echo form_open('app/manage_user/simpan','class="form-horizontal"'); ?>
    <div class="control-group">
        <legend>Manajemen User</legend>
        <label class="control-label" for="nama_lengkap">Nama Pengguna</label>
        <div class="controls">
            <input type="text" class="span" name="nama_lengkap" id="nama_lengkap" value="<?php echo $nama_lengkap; ?>" placeholder="Nama Pengguna">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="username">Username</label>
        <div class="controls">
            <input type="text" class="span" name="username" id="username" value="<?php echo $username; ?>" <?php if($st=="edit"){ echo 'readonly="true"'; } ?> placeholder="Username">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="password">Password</label>
        <div class="controls">
            <input type="password" class="span" name="password" id="password" placeholder="Password">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="level">Level</label>
        <div class="controls">
            <?php $a=""; $g=""; $m="";
            ($level==1) ? $a="selected='selected'" : (($level==2) ? $g="selected='selected'" : $m="selected='selected'");
            ?>
            <select name="level">
                <option value="1" <?php echo $a; ?>>Administrator</option>
                <option value="2" <?php echo $g; ?>>Gudang</option>
                <option value="3" <?php echo $m; ?>>Manager</option>
            </select>
        </div>
    </div>
    <input type="hidden" name="id_param" value="<?php echo $id_param; ?>">
    <input type="hidden" name="default_username" value="<?php echo $username; ?>">
    <input type="hidden" name="st" value="<?php echo $st; ?>">
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <button type="reset" class="btn">Hapus Data</button>
        </div>
    </div>
<?php echo form_close(); ?>
</div>