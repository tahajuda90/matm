<form action="<?php echo $action; ?>" method="post">
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <input type="hidden" class="form-control" name="id_proses" id="id_proses" placeholder="Id Proses" value="<?php echo $id_proses; ?>" />
            <div class="card">
                <div class="card-header">
                    <strong>Tambah Pemeriksaan</strong>
                </div>
                <div class="card-body card-block">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6">
                            <div class="form-group">
                                <label class=" form-control-label">Proses Pengobatan :</label>
                                <input type="text" value="<?= $proses ?>" disabled="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Tanggal Periksa :</label>
                                <input type="text" class="form-control" name="tgl_periksa" id="tgl_periksa" value="<?php echo $tgl_periksa; ?>" />
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">No Registrasi :</label>
                                <input type="text" class="form-control" name="noreg" id="noreg" value="<?php echo $noreg; ?>" />
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Jenis Pemeriksaan :</label>
                                <select name="jenis" id="jenis" class="form-control">
                                    <?php
                                foreach (list_jns_periksa() as $idx => $jnis) {
                                    ?>
                                    <option value="<?= $idx ?>"><?= $jnis ?></option>
                                    <?php }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6">
                            <div class="form-group">
                                <label class=" form-control-label">Nilai :</label>
                                <input type="number" class="form-control" name="nilai" id="nilai" value="<?php echo $nilai; ?>" />
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Keterangan :</label>
                                <textarea class="form-control" rows="3" name="ket" id="ket"><?php echo $ket; ?></textarea>
                            </div>
                            <input type="hidden" name="id_periksa" value="<?php echo $id_periksa; ?>" /> 
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                            <a href="<?php echo site_url('dt_pemeriksaan?q='.$id_proses) ?>" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
jQuery(document).ready(function() {
     $('#tgl_periksa').datepicker({
      	format: "yyyy-mm-dd",
      	autoclose: true,
      	todayHighlight: true
      });
});
</script>
