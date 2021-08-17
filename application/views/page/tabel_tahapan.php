<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Tahapan Minum Obat Pasien</strong>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Proses</th>
                                <th>Obat</th>                                
                                <th>Hari</th>
                                <th>Sisa Obat</th>
                                <th>Ket</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
            foreach ($dt_thpan_data as $dt_thpan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
                        <td>Bulan <?php echo $dt_thpan->bulan ?></td>
                        <td><?php echo list_bentuk()[$dt_thpan->bentuk] ?></td>			
			<td><?php echo $dt_thpan->hari ?></td>
			<td><?php echo $dt_thpan->sisa_obat ?></td>
			<td><?php echo $dt_thpan->ket ?></td>
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
