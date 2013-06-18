<div class="well">
<?php echo form_open('manage_user/simpan','class="form-horizontal"'); ?>
    <div class="control-group">
        <legend>Manajemen User</legend>
        <label class="control-label" for="nama_lengkap">Nama Pengguna</label>
        <div class="controls">
            <input type="text" class="span" name="nama_lengkap" id="nama_lengkap" value="<?php echo $nama_lengkap; ?>" readonly="true" placeholder="Nama Pengguna">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="username">Username</label>
        <div class="controls">
            <input type="text" class="span" name="username" id="username" value="<?php echo $username; ?>" readonly="true" placeholder="Username">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="level">Status</label>
        <div class="controls">
            <?php
                $lvl = ($level==1) ? "Administrator" : (($level==2) ? "Gudang" : "Manager");
            ?>
            <input type="text" class="span" name="level" id="level" value="<?php echo $lvl; ?>" readonly="true" placeholder="Status">
        </div>
    </div>
<?php echo form_close(); ?>
</div>