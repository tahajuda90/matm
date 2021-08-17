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
        <h2 style="margin-top:0px">Dt_thpan Read</h2>
        <table class="table">
	    <tr><td>Id Obat</td><td><?php echo $id_obat; ?></td></tr>
	    <tr><td>Id Proses</td><td><?php echo $id_proses; ?></td></tr>
	    <tr><td>Hari</td><td><?php echo $hari; ?></td></tr>
	    <tr><td>Sisa Obat</td><td><?php echo $sisa_obat; ?></td></tr>
	    <tr><td>Ket</td><td><?php echo $ket; ?></td></tr>
	    <tr><td>Create At</td><td><?php echo $create_at; ?></td></tr>
	    <tr><td>Update At</td><td><?php echo $update_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('dt_thpan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>