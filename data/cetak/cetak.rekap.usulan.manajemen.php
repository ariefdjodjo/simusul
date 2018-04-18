<?php 
$tahun 	= $_GET['th'];
$urut 	= 1;

if ($akses_user['type_user']==1 || $akses_user['type_user']==3) {
?>

		<h2>REKAP USULAN SATKER TAHUN <?=$tahun;?></h2>
		<hr>

		<table class="grid" cellspacing="0" width="100%" style="font-size:0.5em;">
			<thead>
				<tr>
					<th>No.</th>
					<th width="20%">Nama Satker</th>
					<?php 
						for($i=1; $i< 7; $i++) {
							echo "<th width=12%>".jenis($i)."</th>";
						}
					?>
					<th width=5%>Total</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$load_satker = mysqli_query($db, "SELECT nama_satker,id_satker FROM mst_satker");
					while ($satker = mysqli_fetch_array($load_satker)) {
				?>
					<tr>
						<td><?php echo $urut++; ?></td>
						<td><?php echo "$satker[nama_satker]"; ?></td>
						<?php 
							for($i=1; $i< 7; $i++) {
							$load_jumlah = mysqli_query($db, "SELECT sum(a.qty_usulan*a.harga_usulan) AS jum_jenis FROM usulan a
							INNER JOIN ref_sub_alokasi b ON a.id_sub_alokasi=b.id_sub_alokasi WHERE b.kd_jenis='$i' 
							AND a.tahun='$tahun' AND a.id_satker='$satker[id_satker]'");
							$jumlah = mysqli_fetch_array($load_jumlah);
								echo "<td width=12% style=text-align:right;>".number_format($jumlah['jum_jenis'],2,",",".")."</td>";
							}

							$load_jum = mysqli_query($db, "SELECT sum(a.qty_usulan*a.harga_usulan) AS jumlah FROM usulan a
							INNER JOIN ref_sub_alokasi b ON a.id_sub_alokasi=b.id_sub_alokasi WHERE a.tahun='$tahun' AND a.id_satker='$satker[id_satker]'");
							$jum = mysqli_fetch_array($load_jum);

						?>
						<td><?php 
						if($jum['jumlah']=="") {
							echo number_format("0",2,",","."); 
						} else {
							echo number_format("$jum[jumlah]",2,",","."); 
						}
						
						?></td>
					</tr>
				<?php
					}
				?>
			</tbody>

			<tfoot>
				<tr>
				<th colspan="2">TOTAL</th>
				<?php 
					for($i=1; $i< 7; $i++) {
					$load_total = mysqli_query($db, "SELECT sum(a.qty_usulan*a.harga_usulan) AS total FROM usulan a
					INNER JOIN ref_sub_alokasi b ON a.id_sub_alokasi=b.id_sub_alokasi WHERE b.kd_jenis='$i' 
					AND a.tahun='$tahun'");
					$total = mysqli_fetch_array($load_total);
						echo "<th width=12% style=text-align:right;>".number_format($total['total'],2,",",".")."</th>";

					$tot+=$total['total'];
					}
				?>

					<td><?php 
						if($tot=="") {
							echo number_format("0",2,",","."); 
						} else {
							echo number_format("$tot",2,",","."); 
						}
						
						?></td>
				</tr>
			</tfoot>
		</table>
<?php
}
?>