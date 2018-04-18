<?php

			//alern Error input/edit
		if(@$_GET['error'] == 'username') {
			echo "
				<div class='alert fade in alert-danger'>
	            	<button type=button class=close data-dismiss=alert>&times;</button>
	            	<i class='fa fa-warning'></i><strong>Username</strong> sudah ada yang sama. Silahkan ganti dengan username yang baru.
	        	</div>
			";
		} elseif ($_GET['error']== 'gagal') {
			echo "
				<div class='alert fade in alert-danger'>
	            	<button type=button class=close data-dismiss=alert>&times;</button>
	            	<i class='fa fa-warning'></i><strong> Gagal Tambah/Edit/Delete </strong> Data Satker.
	        	</div>
			";
		} elseif ($_GET['status']== 'sukses') {
			echo "
				<div class='alert fade in alert-success'>
	            	<button type=button class=close data-dismiss=alert>&times;</button>
	            	<i class='fa fa-check-square-o'></i><strong> Berhasil</strong>.
	        	</div>
			";
		}
		
	$load_satker_s 	= mysqli_query($db, "SELECT * FROM mst_satker WHERE id_satker='$akses_user[id_satker]'");
	$satker_s 		= mysqli_fetch_array($load_satker_s);
?>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h2 class="panel-title"><b>DETAIL DATA SATUAN KERJA</b></h2>
		</div>
		<div class="panel-body">
			<a href="?page=site&act=edit_satker" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit Profil Satker</a>
			<table class="table table-bordered">
					<tr>
						<td class="col-sm-3">Nama Satuan Kerja</td>
						<td class="col-sm-8"><?php echo "$satker_s[nama_satker]"; ?></td>
					</tr>
					<tr>
						<td class="col-sm-3">Alamat Satuan Kerja</td>
						<td class="col-sm-8"><?php echo "$satker_s[alamat_satker]"; ?></td>
					</tr>
					<tr>
						<td class="col-sm-3">No. Telp</td>
						<td class="col-sm-8"><?php echo "$satker_s[no_telp_satker]"; ?></td>
					</tr>
					<tr>
						<td class="col-sm-3">e-mail </td>
						<td class="col-sm-8"><?php echo "$satker_s[email_satker]"; ?></td>
					</tr>
			</table>

			<h3>Daftar Karyawan</h3>
			<table class="table table-bordered table-striped" cellspacing="0" width="100%" id="example">
				<thead>
					<tr>
						<th width="3%" style="text-align:center;">No.</th>
						<th width="12%" style="text-align:center;">Satuan Kerja</th>
						<th width="12%" style="text-align:center;">Nama Pegawai</th>
						<th width="8%" style="text-align:center;">NIP</th>
						<th width="10%" style="text-align:center;">Pangkat/Gol</th>
						<th width="5%" style="text-align:center;">Status</th>
					</tr>
				</thead>

				<tbody>
					<?php
						$urut		= 1; //untuk nomor urut
						$load_pegawai  = mysqli_query($db, "SELECT * FROM ref_pegawai u INNER JOIN mst_satker s ON u.id_satker=s.id_satker WHERE u.id_satker='$akses_user[id_satker]'");
						while ($pegawai = mysqli_fetch_array($load_pegawai)) {	
					?>

					<tr>
						<td style="text-align:center;"><?php echo $urut++; ?>.</td>
						<td><?php echo "$pegawai[nama_satker]"; ?></td>
						<td><?php echo "$pegawai[nama]"; ?></td>
						<td><?php echo "$pegawai[nip]"; ?></td>
						<td><?php echo p_gol("$pegawai[pangkat_gol]"); ?></td>
						<td><?php echo status_peg("$pegawai[status_pegawai]"); ?></td>
					</tr>
				<?php
						}
				?>
				</tbody>
			</table>
		</div>
	</div>  