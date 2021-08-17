<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Obat Pasien TBC</strong>
                <?php echo anchor(site_url('dt_obat/create/'.$q),'Create', 'class="btn btn-primary pull-right"'); ?>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Proses</th>
                                <th>Paduan</th>
                                <th>Bentuk</th>
                                <th>Sumber</th>
                                <th>Batch</th>
                                <th>Dosis</th>
                                <th>Dosis / Hari</th>
                                <th>Tanggal Pemberian</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
            foreach ($dt_obat_data as $dt_obat)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td>Bulan <?php echo $dt_obat->bulan ?></td>
			<td><?php echo list_paduan()[$dt_obat->panduan] ?></td>
                        <td><?php echo list_bentuk()[$dt_obat->bentuk ]?></td>
                        <td><?php echo list_sumber()[$dt_obat->sumber ]?></td>
			<td><?php echo $dt_obat->batch ?></td>
			<td><?php echo $dt_obat->dosis ?></td>
			<td><?php echo $dt_obat->dosis_minum ?></td>
                        <td><?php echo fdateindo($dt_obat->tgl_pemberian) ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('dt_obat/read/'.$dt_obat->id_obat),'Read'); 
				echo ' | '; 
				echo anchor(site_url('dt_obat/update/'.$dt_obat->id_obat),'Update'); 
				echo ' | '; 
				echo anchor(site_url('dt_obat/delete/'.$dt_obat->id_obat),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
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
