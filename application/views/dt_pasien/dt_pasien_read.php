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
        <h2 style="margin-top:0px">Dt_pasien Read</h2>
        <table class="table">
	    <tr><td>Nik Pasien</td><td><?php echo $nik_pasien; ?></td></tr>
	    <tr><td>Nm Pasien</td><td><?php echo $nm_pasien; ?></td></tr>
	    <tr><td>Jns Klm</td><td><?php echo $jns_klm; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Is Hamil</td><td><?php echo $is_hamil; ?></td></tr>
	    <tr><td>Tgl Lahir</td><td><?php echo $tgl_lahir; ?></td></tr>
	    <tr><td>Umr Thn</td><td><?php echo $umr_thn; ?></td></tr>
	    <tr><td>Umr Bln</td><td><?php echo $umr_bln; ?></td></tr>
	    <tr><td>Brt Bdn</td><td><?php echo $brt_bdn; ?></td></tr>
	    <tr><td>Tg Bdn</td><td><?php echo $tg_bdn; ?></td></tr>
	    <tr><td>Telp</td><td><?php echo $telp; ?></td></tr>
	    <tr><td>Parut Bcg</td><td><?php echo $parut_bcg; ?></td></tr>
	    <tr><td>Skor Anak</td><td><?php echo $skor_anak; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('dt_pasien') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>