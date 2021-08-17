<form action="<?php echo $action; ?>" method="post">
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <input type="hidden" name="id_pasien" id="id_pasien" placeholder="Id Pasien" value="<?php echo $id_pasien; ?>" />
            <div class="card">
                <div class="card-header">
                    <strong>Proses Pengobatan</strong>
                </div>
                <div class="card-body card-block">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6">
                            <div class="form-group">
                                <label class=" form-control-label">Nama Pasien :</label>
                                <input type="text" value="<?= $nama ?>" disabled="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Bulan :</label>
                                <input type="number" class="form-control" name="bulan" id="bulan" value="<?php echo $bulan; ?>" />
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Tahapan Pengobatan :</label>
                                <select name="tahap" id="tahap" class="form-control">
                                    <?php
                                foreach (list_tahap() as $idx => $thp) {
                                    ?>
                                    <option value="<?= $idx ?>"><?= $thp ?></option>
                                    <?php }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Status Pasien :</label>
                                <select name="status" id="status" class="form-control">
                                    <?php
                                foreach (list_status() as $idx => $stts) {
                                    ?>
                                    <option value="<?= $idx ?>"><?= $stts ?></option>
                                    <?php }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6">
                            <div class="form-group">
                                <label class=" form-control-label">Tanggal Mulai :</label>
                                <input type="text" class="form-control" name="tgl_mulai" id="tgl_mulai" placeholder="Tgl Mulai" value="<?php echo $tgl_mulai; ?>" />
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Tanggal Selesai :</label>
                                <input type="text" class="form-control" name="tgl_selesai" id="tgl_selesai" placeholder="Tgl Selesai" value="<?php echo $tgl_selesai; ?>" />
                            </div>
                            <input type="hidden" name="id_proses" value="<?php echo $id_proses; ?>" /> 
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
jQuery(document).ready(function() {
     $('#tgl_mulai').datepicker({
      	format: "yyyy-mm-dd",
      	autoclose: true,
      	todayHighlight: true
      });
      
      
      $('#tgl_selesai').datepicker({
      	format: "yyyy-mm-dd",
      	autoclose: true,
      	todayHighlight: true
      });
});
</script>