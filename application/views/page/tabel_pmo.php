<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Daftar Petugas PMO</strong>
                <?php echo anchor(site_url('dt_pmo/create'),'Create', 'class="btn btn-primary pull-right"'); ?>
            </div>
            <div class="card-body">
                <div class="col-md-3 pull-right" style="margin-bottom: 10px">
                    <form action="<?php echo site_url('dt_pmo/index'); ?>" class="form-inline" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                            <span class="input-group-btn">
                                 <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('dt_pmo'); ?>" class="btn btn-default">Reset</a>
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
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Telp</th>
                                <th>Faskes</th>
                                <th>No. Registrasi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
            foreach ($dt_pmo_data as $dt_pmo)
            {
                ?>
                            <tr>
                                <td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $dt_pmo->nik_pmo ?></td>
			<td><?php echo $dt_pmo->nm_pmo ?><br><?php echo $dt_pmo->jns_klm ?></td>
			<td><?php echo $dt_pmo->alamat ?><br><?php echo $dt_pmo->kota ?><br><?php echo $dt_pmo->prop ?></td>
			<td><?php echo $dt_pmo->telp ?></td>
			<td><?php echo $dt_pmo->faskes ?></td>
			<td><?php echo $dt_pmo->regtb03f ?><br><?php echo $dt_pmo->regtb03kt ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('dt_pmo/read/'.$dt_pmo->id_pmo),'Read'); 
				echo ' | '; 
				echo anchor(site_url('dt_pmo/update/'.$dt_pmo->id_pmo),'Update'); 
				echo ' | '; 
				echo anchor(site_url('dt_pmo/delete/'.$dt_pmo->id_pmo),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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