<?php 
	$tahun 	= $_GET['th'];
	$id = $_GET['satker'];

	$load_sat = mysqli_query($db, "SELECT nama_satker FROM mst_satker WHERE id_satker='$id'");
	$sat = mysqli_fetch_array($load_sat);

	$urut =1;

?>

<h2><b>DATA USULAN SATUAN KERJA</b></h2>
<h4><b><?php echo "$sat[nama_satker]"; ?></b></h4>
<hr>



<table class="table table-bordered table-striped" cellspacing="0" width="100%" id="example">
	<thead>
		<tr>
			<th width="3%" style="text-align:center;">No.</th>
			<th width="5%" style="text-align:center;">Id Usulan</th>
			<th width="12%" style="text-align:center;">Nama Barang/Kegiatan</th>
			<th width="5%" style="text-align:center;">QTY</th>
			<th width="5%" style="text-align:center;">Harga Satuan</th>
			<th width="5%" style="text-align:center;">Jumlah Harga</th>
			<th width="9%" style="text-align:center;">#</th>
		</tr>
	</thead>
	
	<tbody>
		<?php 
			$load_usulan 	= mysqli_query($db, "SELECT * FROM usulan a INNER JOIN ref_sub_alokasi b ON a.id_sub_alokasi=b.id_sub_alokasi 
				WHERE a.id_satker='$id' AND a.tahun='$tahun' ORDER BY prioritas_usulan ASC");
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
				echo "<td>".$usul[nama_usulan]."</td>";
				echo "<td align=right>".number_format($usul[qty_usulan],2,",",".")." ".$usul[satuan_usulan]."</td>";
				echo "<td align=right>".number_format($usul[harga_usulan],2,",",".")."</td>";
				$jum = $usul[qty_usulan]*$usul[harga_usulan];
				echo "<td align=right>".number_format($jum,2,",",".")."</td>";
				echo "<td>";
		?>
					<div class="btn-group">
						<a href="?page=usulan&mod=view_usulan&id=<?=$usul[id_usulan];?>" class="btn btn-ms btn-info"><i class="fa fa-search"></i></a >
						<a href="?page=usulan&mod=edit_usulan&id=<?=$usul[id_usulan];?>" class="btn btn-ms btn-primary"><i class="fa fa-edit"></i></a >
						<a href="?page=usulan&mod=hapus_usulan&id=<?=$usul[id_usulan];?>" class="btn btn-ms  btn-danger"><i class="fa fa-trash"></i></a>
					</div>
		<?php
				echo "</td></tr>";

				$total+= $jum;
			}
		?>

	</tbody>
	<tfoot>
		<tr>
			<td colspan=5>TOTAL</td>
			<td align=right><?php echo number_format($total++,2,",","."); ?></td>
			<td></td>
		</tr>
	</tfoot>
</table>