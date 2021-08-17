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
        <h2 style="margin-top:0px">Dt_pmo List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('dt_pmo/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('dt_pmo/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('dt_pmo'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nik Pmo</th>
		<th>Nm Pmo</th>
		<th>Jns Klm</th>
		<th>Alamat</th>
		<th>Telp</th>
		<th>Kota</th>
		<th>Prop</th>
		<th>Faskes</th>
		<th>Regtb03f</th>
		<th>Regtb03kt</th>
		<th>Create At</th>
		<th>Update At</th>
		<th>Action</th>
            </tr><?php
            foreach ($dt_pmo_data as $dt_pmo)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $dt_pmo->nik_pmo ?></td>
			<td><?php echo $dt_pmo->nm_pmo ?></td>
			<td><?php echo $dt_pmo->jns_klm ?></td>
			<td><?php echo $dt_pmo->alamat ?></td>
			<td><?php echo $dt_pmo->telp ?></td>
			<td><?php echo $dt_pmo->kota ?></td>
			<td><?php echo $dt_pmo->prop ?></td>
			<td><?php echo $dt_pmo->faskes ?></td>
			<td><?php echo $dt_pmo->regtb03f ?></td>
			<td><?php echo $dt_pmo->regtb03kt ?></td>
			<td><?php echo $dt_pmo->create_at ?></td>
			<td><?php echo $dt_pmo->update_at ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('dt_pmo/read/'.$dt_pmo->id_pmo),'Read'); 
				echo ' | '; 
				echo anchor(site_url('dt_pmo/update/'.$dt_pmo->id_pmo),'Update'); 
				echo ' | '; 
				echo anchor(site_url('dt_pmo/delete/'.$dt_pmo->id_pmo),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('dt_pmo/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>