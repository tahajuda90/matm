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
        <h2 style="margin-top:0px">Dt_pemeriksaan List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('dt_pemeriksaan/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('dt_pemeriksaan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('dt_pemeriksaan'); ?>" class="btn btn-default">Reset</a>
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
		<th>Id Proses</th>
		<th>Tgl Periksa</th>
		<th>Noreg</th>
		<th>Jenis</th>
		<th>Nilai</th>
		<th>Ket</th>
		<th>Create At</th>
		<th>Update At</th>
		<th>Action</th>
            </tr><?php
            foreach ($dt_pemeriksaan_data as $dt_pemeriksaan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $dt_pemeriksaan->id_proses ?></td>
			<td><?php echo $dt_pemeriksaan->tgl_periksa ?></td>
			<td><?php echo $dt_pemeriksaan->noreg ?></td>
			<td><?php echo $dt_pemeriksaan->jenis ?></td>
			<td><?php echo $dt_pemeriksaan->nilai ?></td>
			<td><?php echo $dt_pemeriksaan->ket ?></td>
			<td><?php echo $dt_pemeriksaan->create_at ?></td>
			<td><?php echo $dt_pemeriksaan->update_at ?></td>
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
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>