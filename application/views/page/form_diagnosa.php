<form action="<?php echo $action; ?>" method="post">
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <input type="hidden" name="id_pasien" id="id_pasien" value="<?php echo $id_pasien; ?>" />
            <div class="card">
                <div class="card-header">
                    <strong>Diagnosis dan Klasifikasi Pasien</strong>
                </div>
                <div class="card-body card-block">
                    <div class="row">
                    <div class="col-xs-6 col-sm-6">
                        <div class="form-group">
                            <label class=" form-control-label">Nama Pasien :</label>
                            <input type="text" value="<?= $nama ?>" disabled="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Tipe Diagnosis :</label>
                            <select name="tp_diag" id="tp_diag" class="form-control">
                                <?php
                                foreach (list_tpdiag() as $idx => $diag) {
                                    ?>
                                    <option value="<?= $idx ?>"><?= $diag ?></option>
                                    <?php }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Klasifikasi Anatomi :</label>
                            <select name="kls_antm" id="kls_antm" class="form-control">
                                <?php
                                foreach (list_klsantm() as $idx => $antm) {
                                    ?>
                                    <option value="<?= $idx ?>"><?= $antm ?></option>
                                    <?php }
                                ?>
                            </select>
                            <label class=" form-control-label">Keterangan Anatomi :</label>
                            <textarea class="form-control" rows="3" name="ket_antm" id="ket_antm" value="<?php echo $ket_antm; ?>" ></textarea>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6">                        
                        <div class="form-group">
                            <label class=" form-control-label">Klasifikasi Riwayat Pengobatan :</label>
                            <select name="kls_rwyt" id="kls_rwyt" class="form-control">
                                <?php
                                foreach (list_klsrwyt() as $idx => $rwyt) {
                                    ?>
                                    <option value="<?= $idx ?>"><?= $rwyt ?></option>
                                    <?php }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Status HIV</label>
                            <div class="form-check">
                                <?php
                                foreach (list_klshiv() as $idx => $hiv) {
                                    ?>
                                <div class="radio">
                                    <label for="radio<?=$idx?>" class="form-check-label ">
                                        <input type="radio" name="is_hiv" id="is_hiv" value="<?=$idx?>" class="form-check-input"><?=$hiv?>
                                    </label>
                                </div>
                                <?php }
                                ?>
                            </div>
                        </div>
                        <input type="hidden" name="id_diag" value="<?php echo $id_diag; ?>" /> 
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>