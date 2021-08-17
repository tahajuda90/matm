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
        <h2 style="margin-top:0px">Dt_diag_klsf Read</h2>
        <table class="table">
	    <tr><td>Id Pasien</td><td><?php echo $id_pasien; ?></td></tr>
	    <tr><td>Tp Diag</td><td><?php echo $tp_diag; ?></td></tr>
	    <tr><td>Kls Antm</td><td><?php echo $kls_antm; ?></td></tr>
	    <tr><td>Ket Antm</td><td><?php echo $ket_antm; ?></td></tr>
	    <tr><td>Kls Rwyt</td><td><?php echo $kls_rwyt; ?></td></tr>
	    <tr><td>Is Hiv</td><td><?php echo $is_hiv; ?></td></tr>
	    <tr><td>Create At</td><td><?php echo $create_at; ?></td></tr>
	    <tr><td>Update At</td><td><?php echo $update_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('dt_diag_klsf') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>