<form action="<?php echo $action; ?>" method="post">
<div class="row">
    <div class="col-xs-6 col-sm-6">
        <div class="card">
            <div class="card-header">
                <strong>Data Pasien</strong>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class=" form-control-label">Nik Pasien :</label>
                    <div class="col col-sm-12">
                         <?php echo form_error('Nik Pasien') ?>
                         <input type="text" class="form-control" name="nik_pasien" id="nik_pasien" placeholder="Nik Pasien" value="<?php echo $nik_pasien; ?>" />
                    </div>                                       
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Nama Pasien :</label>
                    <div class="col col-sm-12">
                        <?php echo form_error('Nama Pasien') ?>
                        <input type="text" class="form-control" name="nm_pasien" id="nm_pasien" placeholder="Nm Pasien" value="<?php echo $nm_pasien; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Tanggal Lahir</label>
                    <div class="col col-sm-8">
                         <?php echo form_error('Tanggal Lahir') ?>
                        <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl Lahir" value="<?php echo $tgl_lahir; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Jenis Kelamin</label>
                    <?php echo form_error('Jenis Kelamin') ?>
                    <div class="form-check">
                        <div class="radio">
                            <label for="radio1" class="form-check-label ">
                                <input type="radio" name="jns_klm" id="jns_klm" value="1" class="form-check-input">Laki-Laki
                            </label>
                        </div>
                        <div class="radio">
                            <label for="radio2" class="form-check-label ">
                                <input type="radio" name="jns_klm" id="jns_klm" value="2" class="form-check-input">Perempuan
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Alamat :</label>
                    <div class="col col-sm-10">
                        <?php echo form_error('Alamat') ?>
                       <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Tlp/No HP :</label>
                    <div class="col col-sm-8">
                        <?php echo form_error('Telepon') ?>
                        <input type="text" class="form-control" name="telp" id="telp" placeholder="Telp" value="<?php echo $telp; ?>" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-6 col-sm-6">
        <div class="card">
            <div class="card-body card-block">
                <div class="form-group">
                    <label class=" form-control-label">Berat Badan</label>
                    <div class="col col-sm-8">
                        <?php echo form_error('Berat Badan') ?>
                        <input type="text" class="form-control" name="brt_bdn" id="brt_bdn" placeholder="Brt Bdn" value="<?php echo $brt_bdn; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Tinggi Badan</label>
                    <div class="col col-sm-8">
                        <?php echo form_error('Tinggi Badan') ?>
                        <input type="text" class="form-control" name="tg_bdn" id="tg_bdn" placeholder="Tg Bdn" value="<?php echo $tg_bdn; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Skoring Anak</label>
                    <div class="col col-sm-8">
                        <?php echo form_error('Skoring Anak') ?>
                        <input type="text" class="form-control" name="skor_anak" id="skor_anak" placeholder="Skor Anak" value="<?php echo $skor_anak; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_error('Hamil') ?>
                    <div class="col col-sm-8">
                        <label for="checkbox1" class="form-check-label ">
                            <input type="checkbox" name="is_hamil" id="is_hamil" value="1" class="form-check-input">Hamil
                            <input type="hidden" name="is_hamil" id="is_hamil" value="0" /> 
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Parut BCG</label>
                    <?php echo form_error('Parut BCG') ?>
                    <div class="form-check">
                        <div class="radio">
                            <label for="radio1" class="form-check-label ">
                                <input type="radio" name="parut_bcg" id="parut_bcg" value="1" class="form-check-input">ada
                            </label>
                        </div>
                        <div class="radio">
                            <label for="radio2" class="form-check-label ">
                                <input type="radio" name="parut_bcg" id="parut_bcg" value="0" class="form-check-input">tidak ada
                            </label>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id_pasien" value="<?php echo $id_pasien; ?>" /> 
                 <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </div>
        </div>
    </div>

</div>
    </form>


<script type="text/javascript">
jQuery(document).ready(function() {
$('#tgl_lahir').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
      });
      });
</script>