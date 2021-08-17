<form action="<?php echo $action; ?>" method="post">
<div class="row">

    <div class="col-xs-6 col-sm-6">
        <div class="card">
            <div class="card-header">
                <strong>Data P.M.O</strong>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label class=" form-control-label">Nik P.M.O :</label>
                    <div class="col col-sm-12">
                         <?php echo form_error('Nik P.M.O') ?>
                         <input type="text" class="form-control" name="nik_pmo" id="nik_pmo" placeholder="Nik Pmo" value="<?php echo $nik_pmo; ?>" />
                    </div>                                       
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Nama Pasien :</label>
                    <div class="col col-sm-12">
                        <?php echo form_error('Nama P.M.O') ?>
                         <input type="text" class="form-control" name="nm_pmo" id="nm_pmo" placeholder="Nama Pmo" value="<?php echo $nm_pmo; ?>" />
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
                <div class="form-group">
                    <label class=" form-control-label">Kota / Prop :</label>
                    <div class="col col-sm-6">
                        <?php echo form_error('kota') ?>
                        <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo $kota; ?>" />
                    </div>
                    <div class="col col-sm-6">
                        <?php echo form_error('propinsi') ?>
                        <input type="text" class="form-control" name="prop" id="prop" placeholder="Propinsi" value="<?php echo $prop; ?>" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-6 col-sm-6">
        <div class="card">
            <div class="card-body card-block">
                <div class="form-group">
                    <label class=" form-control-label">Faskes</label>
                    <div class="col col-sm-8">
                        <?php echo form_error('faskes') ?>
                        <input type="text" class="form-control" name="faskes" id="faskes" placeholder="Faskes" value="<?php echo $faskes; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class=" form-control-label">No.Reg TB.03</label>
                    <div class="col col-sm-8">
                        <?php echo form_error('regtb03f') ?>
                        <input type="text" class="form-control" name="regtb03f" id="regtb03f" placeholder="Faskes" value="<?php echo $regtb03f; ?>" />
                    </div>
                    <div class="col col-sm-8">
                        <?php echo form_error('regtb03kt') ?>
                        <input type="text" class="form-control" name="regtb03kt" id="regtb03kt" placeholder="Kota" value="<?php echo $regtb03kt; ?>" />
                    </div>
                </div>
                <input type="hidden" name="id_pmo" value="<?php echo $id_pmo; ?>" /> 
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </div>
        </div>
    </div>

</div>
    </form>