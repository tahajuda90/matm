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
        <h2 style="margin-top:0px">Dt_obat Read</h2>
        <table class="table">
	    <tr><td>Id Proses</td><td><?php echo $id_proses; ?></td></tr>
	    <tr><td>Panduan</td><td><?php echo $panduan; ?></td></tr>
	    <tr><td>Bentuk</td><td><?php echo $bentuk; ?></td></tr>
	    <tr><td>Sumber</td><td><?php echo $sumber; ?></td></tr>
	    <tr><td>Batch</td><td><?php echo $batch; ?></td></tr>
	    <tr><td>Dosis</td><td><?php echo $dosis; ?></td></tr>
	    <tr><td>Dosis Minum</td><td><?php echo $dosis_minum; ?></td></tr>
	    <tr><td>Tgl Pemberian</td><td><?php echo $tgl_pemberian; ?></td></tr>
	    <tr><td>Create At</td><td><?php echo $create_at; ?></td></tr>
	    <tr><td>Update At</td><td><?php echo $update_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('dt_obat') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>