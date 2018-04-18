<?php 
	$tahun 	= $_GET['th'];
	$urut 	= 1;

	$sekarang = date("Y-m-d");
	$jam = date("d-m-Y_g.i_a");

	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=".$tahun."_detail_usulan_".$jam.".xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>

<b>DATA USULAN SATUAN KERJA</b><hr>
<table border="solid">
	<thead>
		<tr>
			<th width="3%" style="text-align:center;">No.</th>
			<th width="5%" style="text-align:center;">Id Usulan</th>
			<th width="5%" style="text-align:center;">Satuan Kerja</th>
			<th width="12%" style="text-align:center;">Nama Barang/Kegiatan</th>
			<th width="5%" style="text-align:center;">Spesifikasi</th>
			<th width="5%" style="text-align:center;">Sub Alokasi</th>
			<th width="5%" style="text-align:center;">Jenis</th>
			<th width="5%" style="text-align:center;">Sumber Dana</th>
			<th width="5%" style="text-align:center;">QTY</th>
			<th width="5%" style="text-align:center;">Satuan</th>
			<th width="5%" style="text-align:center;">Harga Satuan</th>
			<th width="5%" style="text-align:center;">Jumlah Harga</th>
			<th width="5%" style="text-align:center;">Prioritas</th>
		</tr>
	</thead>
	
	<tbody>
		<?php 
			$load_usulan 	= mysqli_query($db, "SELECT * FROM usulan a INNER JOIN ref_sub_alokasi b ON a.id_sub_alokasi=b.id_sub_alokasi INNER JOIN mst_satker c ON a.id_satker=c.id_satker WHERE a.tahun='$tahun'");
			while ($usul = mysqli_fetch_array($load_usulan)) {
				if($usul['prioritas_usulan']==1) {
					echo "<tr class=danger>";
				} elseif($usul['prioritas_usulan']==2) {
					echo "<tr class=primary>";
				} elseif($usul['prioritas_usulan']==3) {
					echo "<tr class=info>";
				} 
				
				echo "<td>".$urut++."</td>";
				echo "<td>".$usul[id_usulan]."</td>";
				echo "<td>".$usul[nama_satker]."</td>";
				echo "<td>".$usul[nama_usulan]."</td>";
				echo "<td>".$usul[spesifikasi_usulan]."</td>";
				echo "<td>".$usul[nama_sub_alokasi]."</td>";
				echo "<td>".jenis($usul[kd_jenis])."</td>";
				echo "<td>".$usul[sumber_dana]."</td>";
				echo "<td align=right>".number_format($usul[qty_usulan],2,",",".")."</td>";
				echo "<td>".$usul[satuan_usulan]."</td>";
				echo "<td align=right>".number_format($usul[harga_usulan],2,",",".")."</td>";
				$jum = $usul[qty_usulan]*$usul[harga_usulan];
				echo "<td align=right>".number_format($jum,2,",",".")."</td>";
				echo "<td>".$usul[prioritas_usulan]."</td></tr>";

				$total+= $jum;
			}
		?>

	</tbody>
	<tfoot>
		<tr>
			<td colspan=11>TOTAL</td>
			<td align=right><?php echo number_format($total++,2,",","."); ?></td>
			<td></td>
		</tr>
	</tfoot>
</table>