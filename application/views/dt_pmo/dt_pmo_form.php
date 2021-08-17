<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Dt_pmo <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nik Pmo <?php echo form_error('nik_pmo') ?></label>
            <input type="text" class="form-control" name="nik_pmo" id="nik_pmo" placeholder="Nik Pmo" value="<?php echo $nik_pmo; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nm Pmo <?php echo form_error('nm_pmo') ?></label>
            <input type="text" class="form-control" name="nm_pmo" id="nm_pmo" placeholder="Nm Pmo" value="<?php echo $nm_pmo; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jns Klm <?php echo form_error('jns_klm') ?></label>
            <input type="text" class="form-control" name="jns_klm" id="jns_klm" placeholder="Jns Klm" value="<?php echo $jns_klm; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Telp <?php echo form_error('telp') ?></label>
            <input type="text" class="form-control" name="telp" id="telp" placeholder="Telp" value="<?php echo $telp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kota <?php echo form_error('kota') ?></label>
            <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo $kota; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Prop <?php echo form_error('prop') ?></label>
            <input type="text" class="form-control" name="prop" id="prop" placeholder="Prop" value="<?php echo $prop; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Faskes <?php echo form_error('faskes') ?></label>
            <input type="text" class="form-control" name="faskes" id="faskes" placeholder="Faskes" value="<?php echo $faskes; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Regtb03f <?php echo form_error('regtb03f') ?></label>
            <input type="text" class="form-control" name="regtb03f" id="regtb03f" placeholder="Regtb03f" value="<?php echo $regtb03f; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Regtb03kt <?php echo form_error('regtb03kt') ?></label>
            <input type="text" class="form-control" name="regtb03kt" id="regtb03kt" placeholder="Regtb03kt" value="<?php echo $regtb03kt; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Create At <?php echo form_error('create_at') ?></label>
            <input type="text" class="form-control" name="create_at" id="create_at" placeholder="Create At" value="<?php echo $create_at; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Update At <?php echo form_error('update_at') ?></label>
            <input type="text" class="form-control" name="update_at" id="update_at" placeholder="Update At" value="<?php echo $update_at; ?>" />
        </div>
	    <input type="hidden" name="id_pmo" value="<?php echo $id_pmo; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('dt_pmo') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>