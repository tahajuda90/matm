<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Hasil Pemeriksaan Pasien TB</strong>
                <?php echo anchor(site_url('dt_pemeriksaan/create/'.$q),'Create', 'class="btn btn-primary pull-right"'); ?>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Proses</th>
                                <th>Tanggal Periksa</th>
                                <th>No.Registrasi</th>
                                <th>Jenis Pemeriksaan</th>
                                <th>Nilai</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
            foreach ($dt_pemeriksaan_data as $dt_pemeriksaan)
            {
                ?>
                             <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td>Bulan <?php echo $dt_pemeriksaan->bulan ?></td>
                        <td><?php echo fdateindo($dt_pemeriksaan->tgl_periksa) ?></td>
			<td><?php echo $dt_pemeriksaan->noreg ?></td>
                        <td><?php echo list_jns_periksa()[$dt_pemeriksaan->jenis] ?></td>
			<td><?php echo $dt_pemeriksaan->nilai ?></td>
			<td><?php echo $dt_pemeriksaan->ket ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('dt_pemeriksaan/read/'.$dt_pemeriksaan->id_periksa),'Read'); 
				echo ' | '; 
				echo anchor(site_url('dt_pemeriksaan/update/'.$dt_pemeriksaan->id_periksa),'Update'); 
				echo ' | '; 
				echo anchor(site_url('dt_pemeriksaan/delete/'.$dt_pemeriksaan->id_periksa),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
