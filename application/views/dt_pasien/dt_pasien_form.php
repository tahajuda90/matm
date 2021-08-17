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
        <h2 style="margin-top:0px">Dt_pasien <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nik Pasien <?php echo form_error('nik_pasien') ?></label>
            <input type="text" class="form-control" name="nik_pasien" id="nik_pasien" placeholder="Nik Pasien" value="<?php echo $nik_pasien; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nm Pasien <?php echo form_error('nm_pasien') ?></label>
            <input type="text" class="form-control" name="nm_pasien" id="nm_pasien" placeholder="Nm Pasien" value="<?php echo $nm_pasien; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jns Klm <?php echo form_error('jns_klm') ?></label>
            <input type="text" class="form-control" name="jns_klm" id="jns_klm" placeholder="Jns Klm" value="<?php echo $jns_klm; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Is Hamil <?php echo form_error('is_hamil') ?></label>
            <input type="text" class="form-control" name="is_hamil" id="is_hamil" placeholder="Is Hamil" value="<?php echo $is_hamil; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tgl Lahir <?php echo form_error('tgl_lahir') ?></label>
            <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl Lahir" value="<?php echo $tgl_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Umr Thn <?php echo form_error('umr_thn') ?></label>
            <input type="text" class="form-control" name="umr_thn" id="umr_thn" placeholder="Umr Thn" value="<?php echo $umr_thn; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Umr Bln <?php echo form_error('umr_bln') ?></label>
            <input type="text" class="form-control" name="umr_bln" id="umr_bln" placeholder="Umr Bln" value="<?php echo $umr_bln; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Brt Bdn <?php echo form_error('brt_bdn') ?></label>
            <input type="text" class="form-control" name="brt_bdn" id="brt_bdn" placeholder="Brt Bdn" value="<?php echo $brt_bdn; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tg Bdn <?php echo form_error('tg_bdn') ?></label>
            <input type="text" class="form-control" name="tg_bdn" id="tg_bdn" placeholder="Tg Bdn" value="<?php echo $tg_bdn; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Telp <?php echo form_error('telp') ?></label>
            <input type="text" class="form-control" name="telp" id="telp" placeholder="Telp" value="<?php echo $telp; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Parut Bcg <?php echo form_error('parut_bcg') ?></label>
            <input type="text" class="form-control" name="parut_bcg" id="parut_bcg" placeholder="Parut Bcg" value="<?php echo $parut_bcg; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Skor Anak <?php echo form_error('skor_anak') ?></label>
            <input type="text" class="form-control" name="skor_anak" id="skor_anak" placeholder="Skor Anak" value="<?php echo $skor_anak; ?>" />
        </div>
	    <input type="hidden" name="id_pasien" value="<?php echo $id_pasien; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('dt_pasien') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>