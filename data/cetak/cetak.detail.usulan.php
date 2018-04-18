<?php 
	$tahun  = $_GET['th'];
	$id 	= $_GET['id'];
	$urut 	= 1;

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

<h2><b>DATA USULAN SATUAN KERJA</b></h2>
<h2><b><?php echo "$satker[nama_satker]"; ?></b></h2><hr>
<br>
<table class="grid" cellspacing="0" width="100%" style="font-size:0.7em;">
	<thead>
		<tr>
			<th width="2%" style="text-align:center;">No.</th>
			<th width="3%" style="text-align:center;">Id Usulan</th>
			<th width="10%" style="text-align:center;">Jenis Usulan</th>
			<th width="10%" style="text-align:center;">Sub Alokasi</th>
			<th width="15%" style="text-align:center;">Nama Barang/Kegiatan</th>
			<th width="20%" style="text-align:center;">Spesifikasi Barang/Kegiatan</th>
			<th width="7%" style="text-align:center;">QTY</th>
			<th width="7%" style="text-align:center;">Harga Satuan</th>
			<th width="8%" style="text-align:center;">Jumlah Harga</th>
			<th width="5%" style="text-align:center;">Prioritas</th>
		</tr>
	</thead>
	
	<tbody>
		<?php 
			if ($akses_user['type_user']==2) {
				$load_usulan 	= mysqli_query($db, "SELECT * FROM usulan a INNER JOIN ref_sub_alokasi b ON a.id_sub_alokasi=b.id_sub_alokasi 
				WHERE a.id_satker='$akses_user[id_satker]' AND a.tahun='$tahun' ORDER BY b.kd_jenis ASC, a.prioritas_usulan ASC");
			} elseif ($akses_user['type_user']==1) {
				$load_usulan 	= mysqli_query($db, "SELECT * FROM usulan a INNER JOIN ref_sub_alokasi b ON a.id_sub_alokasi=b.id_sub_alokasi 
				WHERE a.id_satker='$id' AND a.tahun='$tahun' ORDER BY b.kd_jenis ASC, a.prioritas_usulan ASC");
			}
			
			while ($usul = mysqli_fetch_array($load_usulan)) {
				echo "<tr class=danger>";
				echo "<td>".$urut++."</td>";
				echo "<td>".$usul[id_usulan]."</td>";
				echo "<td>".jenis($usul[kd_jenis])."</td>";
				echo "<td>".$usul[nama_sub_alokasi]."</td>";
				echo "<td>".$usul[nama_usulan]."</td>";
				echo "<td>".$usul[spesifikasi_usulan]."</td>";
				echo "<td align=right>".number_format($usul[qty_usulan],2,",",".")." ".$usul[satuan_usulan]."</td>";
				echo "<td align=right>".number_format($usul[harga_usulan],2,",",".")."</td>";
				$jum = $usul[qty_usulan]*$usul[harga_usulan];
				echo "<td align=right>".number_format($jum,2,",",".")."</td>";
				echo "<td>".$usul[prioritas_usulan]."</td>";
				echo "</tr>";

				$total+= $jum;
			}
		?>

	</tbody>
	<tfoot>
		<tr>
			<td colspan=8>TOTAL</td>
			<td align=right><?php echo number_format($total++,2,",","."); ?></td>
			<td></td>
		</tr>
	</tfoot>
</table>