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
        <h2 style="margin-top:0px">Dt_pemeriksaan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Proses <?php echo form_error('id_proses') ?></label>
            <input type="text" class="form-control" name="id_proses" id="id_proses" placeholder="Id Proses" value="<?php echo $id_proses; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tgl Periksa <?php echo form_error('tgl_periksa') ?></label>
            <input type="text" class="form-control" name="tgl_periksa" id="tgl_periksa" placeholder="Tgl Periksa" value="<?php echo $tgl_periksa; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Noreg <?php echo form_error('noreg') ?></label>
            <input type="text" class="form-control" name="noreg" id="noreg" placeholder="Noreg" value="<?php echo $noreg; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis <?php echo form_error('jenis') ?></label>
            <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis" value="<?php echo $jenis; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nilai <?php echo form_error('nilai') ?></label>
            <input type="text" class="form-control" name="nilai" id="nilai" placeholder="Nilai" value="<?php echo $nilai; ?>" />
        </div>
	    <div class="form-group">
            <label for="ket">Ket <?php echo form_error('ket') ?></label>
            <textarea class="form-control" rows="3" name="ket" id="ket" placeholder="Ket"><?php echo $ket; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="timestamp">Create At <?php echo form_error('create_at') ?></label>
            <input type="text" class="form-control" name="create_at" id="create_at" placeholder="Create At" value="<?php echo $create_at; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Update At <?php echo form_error('update_at') ?></label>
            <input type="text" class="form-control" name="update_at" id="update_at" placeholder="Update At" value="<?php echo $update_at; ?>" />
        </div>
	    <input type="hidden" name="id_periksa" value="<?php echo $id_periksa; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('dt_pemeriksaan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>