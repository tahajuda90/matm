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
        <h2 style="margin-top:0px">Dt_pemeriksaan Read</h2>
        <table class="table">
	    <tr><td>Id Proses</td><td><?php echo $id_proses; ?></td></tr>
	    <tr><td>Tgl Periksa</td><td><?php echo $tgl_periksa; ?></td></tr>
	    <tr><td>Noreg</td><td><?php echo $noreg; ?></td></tr>
	    <tr><td>Jenis</td><td><?php echo $jenis; ?></td></tr>
	    <tr><td>Nilai</td><td><?php echo $nilai; ?></td></tr>
	    <tr><td>Ket</td><td><?php echo $ket; ?></td></tr>
	    <tr><td>Create At</td><td><?php echo $create_at; ?></td></tr>
	    <tr><td>Update At</td><td><?php echo $update_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('dt_pemeriksaan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>