<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Dt_pasien List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('dt_pasien/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('dt_pasien/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
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
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nik Pasien</th>
		<th>Nm Pasien</th>
		<th>Jns Klm</th>
		<th>Alamat</th>
		<th>Is Hamil</th>
		<th>Tgl Lahir</th>
		<th>Umr Thn</th>
		<th>Umr Bln</th>
		<th>Brt Bdn</th>
		<th>Tg Bdn</th>
		<th>Telp</th>
		<th>Parut Bcg</th>
		<th>Skor Anak</th>
		<th>Create At</th>
		<th>Update At</th>
		<th>Action</th>
            </tr><?php
            foreach ($dt_pasien_data as $dt_pasien)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $dt_pasien->nik_pasien ?></td>
			<td><?php echo $dt_pasien->nm_pasien ?></td>
			<td><?php echo $dt_pasien->jns_klm ?></td>
			<td><?php echo $dt_pasien->alamat ?></td>
			<td><?php echo $dt_pasien->is_hamil ?></td>
			<td><?php echo $dt_pasien->tgl_lahir ?></td>
			<td><?php echo $dt_pasien->umr_thn ?></td>
			<td><?php echo $dt_pasien->umr_bln ?></td>
			<td><?php echo $dt_pasien->brt_bdn ?></td>
			<td><?php echo $dt_pasien->tg_bdn ?></td>
			<td><?php echo $dt_pasien->telp ?></td>
			<td><?php echo $dt_pasien->parut_bcg ?></td>
			<td><?php echo $dt_pasien->skor_anak ?></td>
			<td><?php echo $dt_pasien->create_at ?></td>
			<td><?php echo $dt_pasien->update_at ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('dt_pasien/read/'.$dt_pasien->id_pasien),'Read'); 
				echo ' | '; 
				echo anchor(site_url('dt_pasien/update/'.$dt_pasien->id_pasien),'Update'); 
				echo ' | '; 
				echo anchor(site_url('dt_pasien/delete/'.$dt_pasien->id_pasien),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('dt_pasien/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>