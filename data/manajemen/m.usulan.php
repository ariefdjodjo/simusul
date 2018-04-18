<?php 
$tahun 	= $_GET['th'];

if ($akses_user['type_user']==1 || $akses_user['type_user']==3) {
?>

	<div class="btn-group" style="text-align:right;">
		<a href="cetak.php?page=cetak&act=c_r_m_usul&th=<?=$tahun;?>" target="blank" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Cetak</a>
		<a href="eksport.php?page=eksport&act=e_r_m_usul&th=<?=$tahun;?>" class="btn btn-sm btn-warning"><i class="fa fa-file-excel-o"></i> Eksport Rekap</a>
		<a href="eksport.php?page=eksport&act=e_d_m_usul&th=<?=$tahun;?>" class="btn btn-sm btn-danger"><i class="fa fa-file-excel-o"></i> Eksport Detail</a>
	</div>
		<h2>REKAP USULAN SATKER TAHUN <?=$tahun;?></h2>
		<hr>

		<table class="table table-bordered" id="example">
			<thead>
				<tr>
					<th width="20%">Nama Satker</th>
					<?php 
						for($i=1; $i< 7; $i++) {
							echo "<th width=12%>".jenis($i)."</th>";
						}
					?>
					<th width=5%>#</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$load_satker = mysqli_query($db, "SELECT nama_satker,id_satker FROM mst_satker");
					while ($satker = mysqli_fetch_array($load_satker)) {
				?>
					<tr>
						<td><?php echo "$satker[nama_satker]"; ?></td>
						<?php 
							for($i=1; $i< 7; $i++) {
							$load_jumlah = mysqli_query($db, "SELECT sum(a.qty_usulan*a.harga_usulan) AS jum_jenis FROM usulan a
							INNER JOIN ref_sub_alokasi b ON a.id_sub_alokasi=b.id_sub_alokasi WHERE b.kd_jenis='$i' 
							AND a.tahun='$tahun' AND a.id_satker='$satker[id_satker]'");
							$jumlah = mysqli_fetch_array($load_jumlah);
								echo "<td width=12% style=text-align:right;>".number_format($jumlah['jum_jenis'],2,",",".")."</td>";
							}
						?>
						<td><a href="index.php?page=manajemen&mod=usulan_satker&satker=<?=$satker[id_satker];?>&th=<?=$tahun;?>" class="btn btn-ms btn-info"><i class="fa fa-search"></i></a></td>
					</tr>
				<?php
					}
				?>
			</tbody>
		</table>
<?php
}
?>