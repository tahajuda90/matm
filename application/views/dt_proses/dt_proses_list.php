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
        <h2 style="margin-top:0px">Dt_proses List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('dt_proses/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('dt_proses/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('dt_proses'); ?>" class="btn btn-default">Reset</a>
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
		<th>Id Pasien</th>
		<th>Bulan</th>
		<th>Tahap</th>
		<th>Status</th>
		<th>Tgl Mulai</th>
		<th>Tgl Selesai</th>
		<th>Action</th>
            </tr><?php
            foreach ($dt_proses_data as $dt_proses)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $dt_proses->id_pasien ?></td>
			<td><?php echo $dt_proses->bulan ?></td>
			<td><?php echo $dt_proses->tahap ?></td>
			<td><?php echo $dt_proses->status ?></td>
			<td><?php echo $dt_proses->tgl_mulai ?></td>
			<td><?php echo $dt_proses->tgl_selesai ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('dt_proses/read/'.$dt_proses->id_proses),'Read'); 
				echo ' | '; 
				echo anchor(site_url('dt_proses/update/'.$dt_proses->id_proses),'Update'); 
				echo ' | '; 
				echo anchor(site_url('dt_proses/delete/'.$dt_proses->id_proses),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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