<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Diagnosa / Klasifikasi Pasien TB</strong>
                <?php echo anchor(site_url('dt_diag_klsf/create/'.$q),'Create', 'class="btn btn-primary pull-right"'); ?>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pasien</th>
                                <th>Tipe Diagnosis</th>
                                <th>Kls. Anatomi</th>
                                <th>Riwayat Pengobatan</th>
                                <th>Hiv</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
            foreach ($dt_diag_klsf_data as $dt_diag_klsf)
            {
                ?>
                            <tr>
                                <td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $dt_diag_klsf->nm_pasien ?></td>
                        <td><?php echo list_tpdiag()[$dt_diag_klsf->tp_diag] ?></td>
                        <td><?php echo list_klsantm()[$dt_diag_klsf->kls_antm] ?> <br>
                        Ket : <?php echo $dt_diag_klsf->ket_antm ?></td>
                        <td><?php echo list_klsrwyt()[$dt_diag_klsf->kls_rwyt] ?></td>
                        <td><?php echo list_klshiv()[$dt_diag_klsf->is_hiv] ?></td>
			<td>
			<?php echo fdateindo($dt_diag_klsf->create_at) ?>	
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