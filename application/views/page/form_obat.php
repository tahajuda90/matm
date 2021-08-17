<form action="<?php echo $action; ?>" method="post">
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <input type="hidden" name="id_proses" id="id_proses" placeholder="Id Proses" value="<?php echo $id_proses; ?>" />
            <div class="card">
                <div class="card-header">
                    <strong>Tambah Obat</strong>
                </div>
                <div class="card-body card-block">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6">
                            <div class="form-group">
                                <label class=" form-control-label">Proses Pengobatan :</label>
                                <input type="text" value="<?= $proses ?>" disabled="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Paduan :</label>
                                <select name="panduan" id="panduan" class="form-control">
                                    <?php
                                foreach (list_paduan() as $idx => $padu) {
                                    ?>
                                    <option value="<?= $idx ?>"><?= $padu ?></option>
                                    <?php }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Bentuk :</label>
                                <select name="bentuk" id="bentuk" class="form-control">
                                    <?php
                                foreach (list_bentuk() as $idx => $bntk) {
                                    ?>
                                    <option value="<?= $idx ?>"><?= $bntk ?></option>
                                    <?php }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Sumber :</label>
                                <select name="sumber" id="sumber" class="form-control">
                                    <?php
                                foreach (list_sumber() as $idx => $smbr) {
                                    ?>
                                    <option value="<?= $idx ?>"><?= $smbr ?></option>
                                    <?php }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Batch :</label>
                                <input type="text" class="form-control" name="batch" id="batch" value="<?php echo $batch; ?>" />
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6">
                            <div class="form-group">
                                <label class=" form-control-label">Dosis :</label>
                                <input type="number" class="form-control" name="dosis" id="dosis" value="<?php echo $dosis; ?>" />
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Dosis / Hari :</label>
                                <input type="number" class="form-control" name="dosis_minum" id="dosis_minum" value="<?php echo $dosis_minum; ?>" />
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Tanggal Pemberian :</label>
                                <input type="text" class="form-control" name="tgl_pemberian" id="tgl_pemberian" value="<?php echo $tgl_pemberian; ?>" />
                            </div>
                            <input type="hidden" name="id_obat" value="<?php echo $id_obat; ?>" /> 
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                            <a type="button" href="<?php echo site_url('dt_obat?q='.$id_proses) ?>" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
jQuery(document).ready(function() {
           $('#tgl_pemberian').datepicker({
      	format: "yyyy-mm-dd",
      	autoclose: true,
      	todayHighlight: true
      });
});
</script>