<?php
	$satker = @$_GET['id'];
	$act 	=$_GET['act'];

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
	            	<i class='fa fa-warning'></i><strong> Gagal Tambah/Edit/Delete </strong> Usulan.
	        	</div>
			";
		} elseif ($_GET['status']== 'sukses') {
			echo "
				<div class='alert fade in alert-success'>
	            	<button type=button class=close data-dismiss=alert>&times;</button>
	            	<i class='fa fa-check-square-o'></i><strong> Berhasil Tambah/Edit/Hapus Data Usulan</strong>.
	        	</div>
			";
		}

if($akses_user['type_user']!=3) {
	if($akses_user['type_user']==1 && $act == "") {
?>
	<h2>DAFTAR SATUAN KERJA</h2>
	<hr>

	<table class="table table-bordered" id="example">
		<thead>
			<tr>
				<th width="20%">Nama Satker</th>
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
					<td><a href="index.php?page=usulan&mod=rekap_usulan&act=<?=$satker[id_satker];?>" class="btn btn-ms btn-info"><i class="fa fa-search"></i></a></td>
				</tr>
			<?php
				}
			?>
		</tbody>
	</table>

<?php
	} elseif($akses_user['type_user']!=3) {
?>

		<h2>REKAP USULAN SATUAN KERJA</h2>
		<?php 
			if($act > 0) {
				$load_sat 	= mysqli_query($db, "SELECT nama_satker FROM mst_satker WHERE id_satker='$act'");
				$sat 		= mysqli_fetch_array($load_sat);

				echo "<h3>$sat[nama_satker]</h3>";
			} else {
				echo "<h3>$akses_user[nama_satker]</h3>";
			}
		?>

		<table class="table table-bordered ">
			<thead>
				<tr>
					<th width="3%">No</th>
					<th width="10%">Tahun Anggaran</th>
					<th width="10%">Jumlah Usulan</th>
					<th width="10%">Total RAB Usulan</th>
					<th width="10%">Status</th>
					<th width="20%">Cetak</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$urut = 1;
					$load_tahun 	= mysqli_query($db, "SELECT * FROM ref_tahun");
					while($tahun = mysqli_fetch_array($load_tahun)) {
						//load jumlah usulan
						if($akses_user['type_user']==2) {
							$load_usulan = mysqli_query($db, "SELECT id_satker, COUNT(id_usulan) AS jumlah, SUM(qty_usulan*harga_usulan) AS total, sum(v_usulan) AS verif FROM usulan	WHERE id_satker='$akses_user[id_satker]' AND tahun='$tahun[tahun]'");
						} elseif ($akses_user['type_user']==1) {
							$load_usulan = mysqli_query($db, "SELECT id_satker, COUNT(id_usulan) AS jumlah, SUM(qty_usulan*harga_usulan) AS total, sum(v_usulan) AS verif FROM usulan	WHERE id_satker='$act' AND tahun='$tahun[tahun]'");
						}
						$jum 		= mysqli_fetch_array($load_usulan);

						echo "<tr>";
						echo "<td>".$urut++."</td>";
						echo "<td>$tahun[tahun]</td>";
						echo "<td>".number_format($jum[jumlah],0,",",".")."</td>";
						echo "<td>".number_format($jum[total],0,",",".")."</td>";
						if($jum['verif']>0 && $jum['jumlah']>0) {
							echo "<td><button class='btn btn-sm btn-xm btn-info'>terverifikasi</button></td>";
							if($akses_user['type_user']==2) {
				?>
							<td>
								<a href="cetak.php?page=cetak&act=c_r_usul&th=<?=$tahun[tahun];?>" class="btn btn-ms btn-success" target="blank"><i class="fa fa-print"></i> Cetak Rekap</a>
								<a href="cetak.php?page=cetak&act=c_d_usul&th=<?=$tahun[tahun];?>" class="btn btn-ms btn-primary" target="blank"><i class="fa fa-print"></i> Cetak Detail</a>
							</td>
				<?php	
							} elseif($akses_user['type_user']==1) {
				?>
							<td>
								<div class="btn-group">
								<a href="cetak.php?page=cetak&act=c_r_usul&th=<?=$tahun[tahun];?>&id=<?=$act;?>" class="btn btn-sm btn-success" target="blank"><i class="fa fa-print"></i> Cetak Rekap</a>
								<a href="cetak.php?page=cetak&act=c_d_usul&th=<?=$tahun[tahun];?>&id=<?=$act;?>" class="btn btn-sm btn-primary" target="blank"><i class="fa fa-print"></i> Cetak Detail</a>
								<a href="?page=usulan&mod=batal_verif&th=<?=$tahun[tahun];?>&id=<?=$act;?>" class="btn btn-sm btn-danger"><i class="fa fa-check-square-o"></i> Batal Verifikasi</a>
								</div>
							</td>
				<?php
							}
						} elseif($jum['jumlah']>0) {
				?>
							<td><a href="?page=usulan&mod=verif_usulan&th=<?=$tahun[tahun];?>" class="btn btn-ms btn-primary">
								Verifikasi</a></td>						
							
				<?php
							echo "<td></td>";
						} elseif($jum['jumlah']==0) {
							echo "<td colspan=2>Data Belum Diisi</td>";
						}
						echo "</tr>";
					}
				?>
			</tbody>
		</table>

		<h5>Catatan</h5>
		1. Setelah Verifikasi dilakukan, Satuan Kerja tidak dapat melakukan input Usulan<br>
		2. Menu Cetak akan muncul jika data telah diverifikasi.

<?php 
		}
	}
?>