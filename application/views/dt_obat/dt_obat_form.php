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
        <h2 style="margin-top:0px">Dt_obat <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Proses <?php echo form_error('id_proses') ?></label>
            <input type="text" class="form-control" name="id_proses" id="id_proses" placeholder="Id Proses" value="<?php echo $id_proses; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Panduan <?php echo form_error('panduan') ?></label>
            <input type="text" class="form-control" name="panduan" id="panduan" placeholder="Panduan" value="<?php echo $panduan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Bentuk <?php echo form_error('bentuk') ?></label>
            <input type="text" class="form-control" name="bentuk" id="bentuk" placeholder="Bentuk" value="<?php echo $bentuk; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Sumber <?php echo form_error('sumber') ?></label>
            <input type="text" class="form-control" name="sumber" id="sumber" placeholder="Sumber" value="<?php echo $sumber; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Batch <?php echo form_error('batch') ?></label>
            <input type="text" class="form-control" name="batch" id="batch" placeholder="Batch" value="<?php echo $batch; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Dosis <?php echo form_error('dosis') ?></label>
            <input type="text" class="form-control" name="dosis" id="dosis" placeholder="Dosis" value="<?php echo $dosis; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Dosis Minum <?php echo form_error('dosis_minum') ?></label>
            <input type="text" class="form-control" name="dosis_minum" id="dosis_minum" placeholder="Dosis Minum" value="<?php echo $dosis_minum; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tgl Pemberian <?php echo form_error('tgl_pemberian') ?></label>
            <input type="text" class="form-control" name="tgl_pemberian" id="tgl_pemberian" placeholder="Tgl Pemberian" value="<?php echo $tgl_pemberian; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Create At <?php echo form_error('create_at') ?></label>
            <input type="text" class="form-control" name="create_at" id="create_at" placeholder="Create At" value="<?php echo $create_at; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Update At <?php echo form_error('update_at') ?></label>
            <input type="text" class="form-control" name="update_at" id="update_at" placeholder="Update At" value="<?php echo $update_at; ?>" />
        </div>
	    <input type="hidden" name="id_obat" value="<?php echo $id_obat; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('dt_obat') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>