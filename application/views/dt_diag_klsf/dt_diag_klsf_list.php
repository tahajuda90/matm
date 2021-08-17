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
        <h2 style="margin-top:0px">Dt_diag_klsf List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('dt_diag_klsf/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('dt_diag_klsf/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('dt_diag_klsf'); ?>" class="btn btn-default">Reset</a>
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
		<th>Tp Diag</th>
		<th>Kls Antm</th>
		<th>Ket Antm</th>
		<th>Kls Rwyt</th>
		<th>Is Hiv</th>
		<th>Create At</th>
		<th>Update At</th>
		<th>Action</th>
            </tr><?php
            foreach ($dt_diag_klsf_data as $dt_diag_klsf)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $dt_diag_klsf->id_pasien ?></td>
			<td><?php echo $dt_diag_klsf->tp_diag ?></td>
			<td><?php echo $dt_diag_klsf->kls_antm ?></td>
			<td><?php echo $dt_diag_klsf->ket_antm ?></td>
			<td><?php echo $dt_diag_klsf->kls_rwyt ?></td>
			<td><?php echo $dt_diag_klsf->is_hiv ?></td>
			<td><?php echo $dt_diag_klsf->create_at ?></td>
			<td><?php echo $dt_diag_klsf->update_at ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('dt_diag_klsf/read/'.$dt_diag_klsf->id_diag),'Read'); 
				echo ' | '; 
				echo anchor(site_url('dt_diag_klsf/update/'.$dt_diag_klsf->id_diag),'Update'); 
				echo ' | '; 
				echo anchor(site_url('dt_diag_klsf/delete/'.$dt_diag_klsf->id_diag),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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