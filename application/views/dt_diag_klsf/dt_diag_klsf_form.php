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
        <h2 style="margin-top:0px">Dt_diag_klsf <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Pasien <?php echo form_error('id_pasien') ?></label>
            <input type="text" class="form-control" name="id_pasien" id="id_pasien" placeholder="Id Pasien" value="<?php echo $id_pasien; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tp Diag <?php echo form_error('tp_diag') ?></label>
            <input type="text" class="form-control" name="tp_diag" id="tp_diag" placeholder="Tp Diag" value="<?php echo $tp_diag; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kls Antm <?php echo form_error('kls_antm') ?></label>
            <input type="text" class="form-control" name="kls_antm" id="kls_antm" placeholder="Kls Antm" value="<?php echo $kls_antm; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ket Antm <?php echo form_error('ket_antm') ?></label>
            <input type="text" class="form-control" name="ket_antm" id="ket_antm" placeholder="Ket Antm" value="<?php echo $ket_antm; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kls Rwyt <?php echo form_error('kls_rwyt') ?></label>
            <input type="text" class="form-control" name="kls_rwyt" id="kls_rwyt" placeholder="Kls Rwyt" value="<?php echo $kls_rwyt; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Is Hiv <?php echo form_error('is_hiv') ?></label>
            <input type="text" class="form-control" name="is_hiv" id="is_hiv" placeholder="Is Hiv" value="<?php echo $is_hiv; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Create At <?php echo form_error('create_at') ?></label>
            <input type="text" class="form-control" name="create_at" id="create_at" placeholder="Create At" value="<?php echo $create_at; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Update At <?php echo form_error('update_at') ?></label>
            <input type="text" class="form-control" name="update_at" id="update_at" placeholder="Update At" value="<?php echo $update_at; ?>" />
        </div>
	    <input type="hidden" name="id_diag" value="<?php echo $id_diag; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('dt_diag_klsf') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>