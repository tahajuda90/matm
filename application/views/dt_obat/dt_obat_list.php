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
        <h2 style="margin-top:0px">Dt_obat List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('dt_obat/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('dt_obat/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('dt_obat'); ?>" class="btn btn-default">Reset</a>
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
		<th>Proses</th>
		<th>Paduan</th>
		<th>Bentuk</th>
		<th>Sumber</th>
		<th>Batch</th>
		<th>Dosis</th>
		<th>Dosis Minum</th>
		<th>Tgl Pemberian</th>
		<th>Create At</th>
		<th>Update At</th>
		<th>Action</th>
            </tr><?php
            foreach ($dt_obat_data as $dt_obat)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $dt_obat->id_proses ?></td>
                        <td><?php echo list_paduan()[$dt_obat->panduan] ?></td>
                        <td><?php echo list_bentuk()[$dt_obat->bentuk ]?></td>
                        <td><?php echo list_sumber()[$dt_obat->sumber ]?></td>
			<td><?php echo $dt_obat->batch ?></td>
			<td><?php echo $dt_obat->dosis ?></td>
			<td><?php echo $dt_obat->dosis_minum ?></td>
			<td><?php echo $dt_obat->tgl_pemberian ?></td>
			<td><?php echo $dt_obat->create_at ?></td>
			<td><?php echo $dt_obat->update_at ?></td>
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