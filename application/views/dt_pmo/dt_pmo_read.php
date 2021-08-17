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
        <h2 style="margin-top:0px">Dt_pmo Read</h2>
        <table class="table">
	    <tr><td>Nik Pmo</td><td><?php echo $nik_pmo; ?></td></tr>
	    <tr><td>Nm Pmo</td><td><?php echo $nm_pmo; ?></td></tr>
	    <tr><td>Jns Klm</td><td><?php echo $jns_klm; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Telp</td><td><?php echo $telp; ?></td></tr>
	    <tr><td>Kota</td><td><?php echo $kota; ?></td></tr>
	    <tr><td>Prop</td><td><?php echo $prop; ?></td></tr>
	    <tr><td>Faskes</td><td><?php echo $faskes; ?></td></tr>
	    <tr><td>Regtb03f</td><td><?php echo $regtb03f; ?></td></tr>
	    <tr><td>Regtb03kt</td><td><?php echo $regtb03kt; ?></td></tr>
	    <tr><td>Create At</td><td><?php echo $create_at; ?></td></tr>
	    <tr><td>Update At</td><td><?php echo $update_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('dt_pmo') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>