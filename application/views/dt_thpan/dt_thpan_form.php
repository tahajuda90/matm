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
        <h2 style="margin-top:0px">Dt_thpan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Obat <?php echo form_error('id_obat') ?></label>
            <input type="text" class="form-control" name="id_obat" id="id_obat" placeholder="Id Obat" value="<?php echo $id_obat; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Proses <?php echo form_error('id_proses') ?></label>
            <input type="text" class="form-control" name="id_proses" id="id_proses" placeholder="Id Proses" value="<?php echo $id_proses; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Hari <?php echo form_error('hari') ?></label>
            <input type="text" class="form-control" name="hari" id="hari" placeholder="Hari" value="<?php echo $hari; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Sisa Obat <?php echo form_error('sisa_obat') ?></label>
            <input type="text" class="form-control" name="sisa_obat" id="sisa_obat" placeholder="Sisa Obat" value="<?php echo $sisa_obat; ?>" />
        </div>
	    <div class="form-group">
            <label for="ket">Ket <?php echo form_error('ket') ?></label>
            <textarea class="form-control" rows="3" name="ket" id="ket" placeholder="Ket"><?php echo $ket; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="datetime">Create At <?php echo form_error('create_at') ?></label>
            <input type="text" class="form-control" name="create_at" id="create_at" placeholder="Create At" value="<?php echo $create_at; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Update At <?php echo form_error('update_at') ?></label>
            <input type="text" class="form-control" name="update_at" id="update_at" placeholder="Update At" value="<?php echo $update_at; ?>" />
        </div>
	    <input type="hidden" name="id_thp" value="<?php echo $id_thp; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('dt_thpan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>