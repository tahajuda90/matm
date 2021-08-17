<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Proses Pengobatan TBC</strong>
                <?php echo anchor(site_url('dt_proses/create/'.$q), 'Create', 'class="btn btn-primary pull-right"'); ?>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pasien</th>
                                <th>Bulan</th>
                                <th>Tahap</th>
                                <th>Status</th>
                                <th>Waktu Pengobatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($dt_proses_data as $dt_proses) {
                                ?>
                                <tr>
                                    <td width="50px"><?php echo ++$start ?></td>
                                    <td><?php echo $dt_proses->nm_pasien ?></td>
                                    <td>Bulan <?php echo $dt_proses->bulan ?><br><a href="<?= site_url('dt_thpan?q=').$dt_proses->id_proses?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-spinner"></i>&nbsp; Tahapan</a></td>
                                    <td><?php echo list_tahap()[$dt_proses->tahap] ?></td>
                                    <td><?php echo list_status()[$dt_proses->status] ?></td>
                                    <td><?php echo fdateindo($dt_proses->tgl_mulai) ?><br> s.d. <br>
                                    <?php echo fdateindo($dt_proses->tgl_selesai) ?></td>
                                    <td style="text-align:center" width="280px">
                                        <a href="<?= site_url('dt_obat?q=').$dt_proses->id_proses?>" type="button" class="btn btn-warning btn-sm"><i class="fa fa-coffee"></i>&nbsp; Obat</a>
                                        <a href="<?= site_url('dt_pemeriksaan?q=').$dt_proses->id_proses?>" type="button" class="btn btn-danger btn-sm"><i class="fa fa-stethoscope"></i>&nbsp; Pemeriksaan</a>                                        
                                        <br>
                                        <?php
                                        echo anchor(site_url('dt_proses/update/' . $dt_proses->id_proses), 'Update');
                                        echo ' | ';
                                        echo anchor(site_url('dt_proses/delete/' . $dt_proses->id_proses), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
