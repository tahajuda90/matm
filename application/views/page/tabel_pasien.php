<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Pasien TBC</strong>
                <?php echo anchor(site_url('dt_pasien/create'),'Create', 'class="btn btn-primary pull-right"'); ?>
            </div>
            <div class="card-body">
                <div class="col-md-3 pull-right" style="margin-bottom: 10px">
                    <form action="<?php echo site_url('dt_pasien/index'); ?>" class="form-inline" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                            <span class="input-group-btn">
                                <?php
                                if ($q <> '') {
                                    ?>
                                    <a href="<?php echo site_url('dt_pasien'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                                ?>
                                <button class="btn btn-primary" type="submit">Search</button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nik</th>
                                <th>Nama Pasien</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
            foreach ($dt_pasien_data as $dt_pasien)
            {
                ?>
                            <tr>
                                <td width="30px"><?php echo ++$start ?></td>
                                <td><?php echo $dt_pasien->nik_pasien ?></td>
                                    <td><?php echo $dt_pasien->nm_pasien ?></td>
                                    <td><?php echo $dt_pasien->alamat ?></td>
                                    <td><?php echo $dt_pasien->telp ?></td>
                                    <td style="text-align:center" width="200px">
                                        <!--<a href="<?= site_url('dt_diag_klsf?q='.$dt_pasien->id_pasien)?>" class="btn btn-primary btn-sm"><i class="fa fa-search"></i>&nbsp; Detail</a>
                                    <br>-->
				<?php 
				echo anchor(site_url('dt_pasien/read/'.$dt_pasien->id_pasien),'<button class="btn btn-primary btn-sm"><i class="fa fa-search"></i>&nbsp; Detail</button>'); 
				echo ' <br> '; 
				echo anchor(site_url('dt_pasien/update/'.$dt_pasien->id_pasien),'Update'); 
				echo ' | '; 
				echo anchor(site_url('dt_pasien/delete/'.$dt_pasien->id_pasien),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
                            </tr>
            <?php
            }
            ?>
                        </tbody>
                    </table> 
                </div>
                <div class="row col-md-12">
                    <div class="col-md-9">
                        <?=$start?> data of <?= $total_rows ?> data
                    </div>
                    <div class="col-md-3 pull-right">
                        <?php echo $pagination ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>