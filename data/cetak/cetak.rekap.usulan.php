<?php 
	$tahun 	= $_GET['th'];
	$id 	= $_GET['id'];
	$th_lalu 	= $tahun-1;

	if($akses_user['type_user']==1) {
		$satker 	= $id;
	} elseif ($akses_user['type_user']==2) {
		$satker		= $akses_user['id_satker'];
	} else {
		echo "Error";
	}

	$load_satker = mysqli_query($db, "SELECT nama_satker,id_satker FROM mst_satker WHERE id_satker='$satker'");
	$satker 	= mysqli_fetch_array($load_satker);
?>

<h2><b>REKAP USULAN BELANJA TAHUN <?=$tahun;?></b></h2>
<h2><b><?php echo "$satker[nama_satker]"; ?></b></h2>
<hr>
<br>

<table class="grid" width="100%">
	<thead>
		<tr>
			<th width="5%">NO</th>
			<th width="45%">Jenis Usulan Kegiatan</th>
			<th width="25%">Usulan Tahun <?php echo "$th_lalu"; ?></th>
			<th width="25%">Usulan Tahun <?php echo "$tahun"; ?></th>
		</tr>
	</thead>

	<tbody>
		<?php 
			for ($i=1; $i < 7 ; $i++) { 
		?>
			<tr>
				<td><?php echo "$i"; ?></td>
				<td><?php echo jenis("$i"); ?></td>
				<td align="right"><?php 
					$load_lalu 	= mysqli_query($db, "SELECT sum(a.qty_usulan*a.harga_usulan) AS jum_lalu FROM usulan a INNER JOIN ref_sub_alokasi b ON a.id_sub_alokasi=b.id_sub_alokasi WHERE b.kd_jenis='$i' AND a.tahun='$th_lalu'");
					$lalu = mysqli_fetch_array($load_lalu);
					echo number_format($lalu['jum_lalu'],2,",","."); 
					$t_lalu+= $lalu['jum_lalu'];
				?></td>

				<td align="right"><?php 
					$load_th 	= mysqli_query($db, "SELECT sum(a.qty_usulan*a.harga_usulan) AS jum FROM usulan a INNER JOIN ref_sub_alokasi b ON a.id_sub_alokasi=b.id_sub_alokasi WHERE b.kd_jenis='$i' AND a.tahun='$tahun'");
					$th = mysqli_fetch_array($load_th);
					echo number_format($th['jum'],2,",","."); 
					$t_th+= $th['jum'];
				?></td>
			</tr>
		<?php
			}
		?>
			<tr>
				<tfoot>
					<tr>
						<td colspan="2">TOTAL</td>
						<td align="right"><?php echo number_format($t_lalu,2,",",".");  ?></td>
						<td align="right"><?php echo number_format($t_th,2,",",".");  ?></td>
					</tr>
				</tfoot>
			</tr>
	</tbody>
</table>
