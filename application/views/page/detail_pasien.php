<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Pasien : <?=$nm_pasien?></strong>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                    <table class="table-sm">
                        <tr><td>Nik Pasien</td><td>: <?php echo $nik_pasien; ?></td></tr>
                        <tr><td>Nama Pasien</td><td>: <?php echo $nm_pasien; ?></td></tr>
                        <tr><td>Jenis Kelamin</td><td>: <span class="badge badge-secondary"><?php echo list_kelamin()[$jns_klm]; ?></span></td></tr>
                        <tr><td>Alamat</td><td>: <?php echo $alamat; ?></td></tr>
                        <tr><td>Telepon</td><td>: <?php echo $telp; ?></td></tr>
                        <tr><td>Tanggal Lahir</td><td>: <?php echo fdateformat("d-m-Y",$tgl_lahir); ?></td></tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table-sm">
                        <tr><td>Umur</td><td>: <span class="badge badge-primary"><?php echo $umr_thn; ?> Tahun <?php echo $umr_bln; ?> Bulan</span></td></tr>
                        <tr><td>Berat / Tinggi Badan</td><td>: <?php echo $brt_bdn; ?>Kg / <?php echo $tg_bdn; ?> Cm</td></tr>
                        <tr><td>Is Hamil</td><td>: <span class="badge badge-secondary"><?php echo list_hamil()[$is_hamil]; ?></span></td></tr>
                        <tr><td>Parut BCG</td><td>: <?php echo list_parutbcg()[$parut_bcg]; ?></td></tr>
                        <tr><td>Jumlah Skoring TB Anak</td><td>: <?php echo $skor_anak; ?></td></tr>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
