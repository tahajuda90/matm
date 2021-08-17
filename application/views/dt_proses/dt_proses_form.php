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
        <h2 style="margin-top:0px">Dt_proses <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Pasien <?php echo form_error('id_pasien') ?></label>
            <input type="text" class="form-control" name="id_pasien" id="id_pasien" placeholder="Id Pasien" value="<?php echo $id_pasien; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Bulan <?php echo form_error('bulan') ?></label>
            <input type="text" class="form-control" name="bulan" id="bulan" placeholder="Bulan" value="<?php echo $bulan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tahap <?php echo form_error('tahap') ?></label>
            <input type="text" class="form-control" name="tahap" id="tahap" placeholder="Tahap" value="<?php echo $tahap; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tgl Mulai <?php echo form_error('tgl_mulai') ?></label>
            <input type="text" class="form-control" name="tgl_mulai" id="tgl_mulai" placeholder="Tgl Mulai" value="<?php echo $tgl_mulai; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tgl Selesai <?php echo form_error('tgl_selesai') ?></label>
            <input type="text" class="form-control" name="tgl_selesai" id="tgl_selesai" placeholder="Tgl Selesai" value="<?php echo $tgl_selesai; ?>" />
        </div>
	    <input type="hidden" name="id_proses" value="<?php echo $id_proses; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('dt_proses') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>