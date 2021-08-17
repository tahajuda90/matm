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
        <h2 style="margin-top:0px">Dt_proses Read</h2>
        <table class="table">
	    <tr><td>Id Pasien</td><td><?php echo $id_pasien; ?></td></tr>
	    <tr><td>Bulan</td><td><?php echo $bulan; ?></td></tr>
	    <tr><td>Tahap</td><td><?php echo $tahap; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Tgl Mulai</td><td><?php echo $tgl_mulai; ?></td></tr>
	    <tr><td>Tgl Selesai</td><td><?php echo $tgl_selesai; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('dt_proses') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>