<?php 
	$id 	= $_GET['id'];

	$load_usulan = mysqli_query($db, "SELECT * FROM usulan a INNER JOIN ref_sub_alokasi b ON a.id_sub_alokasi=b.id_sub_alokasi 
		WHERE a.id_usulan='$id' AND a.id_satker='$akses_user[id_satker]'");
	$usulan 	= mysqli_fetch_array($load_usulan);
?>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h2 class="panel-title"><b>DETAIL USULAN</b></h2>
	</div>
	<div class="panel-body">
		<table class="table table-bordered">
				<tr>
					<td class="col-sm-3">ID Usulan</td>
					<td class="col-sm-8"><?php echo "$usulan[id_usulan]"; ?></td>
				</tr>
				<tr>
					<td class="col-sm-3">Tanggal Input</td>
					<td class="col-sm-8"><?php echo tfi("$usulan[tgl_input_usulan]"); ?></td>
				</tr>
				<tr>
					<td class="col-sm-3">Tahun</td>
					<td class="col-sm-8"><?php echo "$usulan[tahun]"; ?></td>
				</tr>
				<tr>
					<td class="col-sm-3">Sub Alokasi</td>
					<td class="col-sm-8"><?php echo "$usulan[nama_sub_alokasi]"; ?></td>
				</tr>
				<tr>
					<td class="col-sm-3">Nama Usulan</td>
					<td class="col-sm-8"><?php echo "$usulan[nama_usulan]"; ?></td>
				</tr>
				<tr>
					<td class="col-sm-3">Spesifikasi Usulan</td>
					<td class="col-sm-8"><?php echo "$usulan[spesifikasi_usulan]"; ?></td>
				</tr>
				<tr>
					<td class="col-sm-3">Jumlah Usulan</td>
					<td class="col-sm-8"><?php 
					$jum = $usulan['qty_usulan']*$usulan['harga_usulan'];
					echo number_format($usulan['qty_usulan'],2,",",".")." ".$usulan['satuan_usulan']." X ".
					number_format($usulan['harga_usulan'],2,",",".")." = <b>".number_format($jum,2,",",".")."</b>";

					 ?></td>
				</tr>
				<tr>
					<td class="col-sm-3">Spesifikasi Usulan</td>
					<td class="col-sm-8"><?php echo "$usulan[prioritas_usulan]"; ?></td>
				</tr>
		</table>
	</div>
</div>  