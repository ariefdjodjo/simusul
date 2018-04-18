<script src="template/bootstrap3/assets/js/bootstrap-dropdown.js"></script>

<?php
	$tahun = $_GET['th'];
	$urut =1;

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

	if($akses_user['type_user']==2) {
		if($tahun == "") {
?>
	<!-- Split button -->
			<div class="btn-group">
			  <button type="button" class="btn btn-danger">Tahun</button>
			  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    <span class="caret"></span>
			    <span class="sr-only">Toggle Dropdown</span>
			  </button>
			  <ul class="dropdown-menu">
			    <?php 
			        for ($i = 2018; $i<=2022; $i++) {
			            echo "<li class=dropdown-submenu><a href=index.php?page=usulan&mod=data_usulan&th=$i>$i</a></li>";
			         }
			        ?>
			  </ul>
			</div>

			<hr>
			<h4>Silahkan Pilih Tahun Untuk Melihat Data</h4>
<?php
		} else {
?>

				<!-- Split button -->
			<div class="btn-group">
			  <button type="button" class="btn btn-danger">Tahun</button>
			  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    <span class="caret"></span>
			    <span class="sr-only">Toggle Dropdown</span>
			  </button>
			  <ul class="dropdown-menu">
			    <?php 
			        for ($i = 2018; $i<=2022; $i++) {
			            echo "<li class=dropdown-submenu><a href=index.php?page=usulan&mod=data_usulan&th=$i>$i</a></li>";
			         }
			        ?>
			  </ul>
			</div>
		
			<h2><b>DATA USULAN SATUAN KERJA</b></h2><hr>
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
							WHERE a.id_satker='$akses_user[id_satker]' AND a.tahun='$tahun' ORDER BY prioritas_usulan ASC");
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
									<?php 
										if($usul['v_usulan'] > 0) {

										} else {
									?>
									<a href="?page=usulan&mod=edit_usulan&id=<?=$usul[id_usulan];?>" class="btn btn-ms btn-primary"><i class="fa fa-edit"></i></a >
									<a href="?page=usulan&mod=hapus_usulan&id=<?=$usul[id_usulan];?>" class="btn btn-ms  btn-danger"><i class="fa fa-trash"></i></a>

										<?php 
											}
										?>
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
<?php 
		}
	} elseif ($akses_user['type_user']==1 || $akses_user['type_user']==3) {
		if($tahun == "") {
?>
			<!-- Split button -->
			<div class="btn-group">
			  <button type="button" class="btn btn-danger">Tahun</button>
			  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    <span class="caret"></span>
			    <span class="sr-only">Toggle Dropdown</span>
			  </button>
			  <ul class="dropdown-menu">
			    <?php 
			        for ($i = 2018; $i<=2022; $i++) {
			            echo "<li class=dropdown-submenu><a href=index.php?page=usulan&mod=data_usulan&th=$i>$i</a></li>";
			         }
			        ?>
			  </ul>
			</div>

			<hr>
			<h4>Silahkan Pilih Tahun Untuk Melihat Data</h4>
<?php 
		} else {
?>
			<h2>REKAP USULAN SATKER</h2>
			<h2>TAHUN <?=$tahun;?></h2>
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
							<td><a href="index.php?page=usulan&mod=usulan_satker&satker=<?=$satker[id_satker];?>&th=<?=$tahun;?>" class="btn btn-ms btn-info"><i class="fa fa-search"></i></a></td>
						</tr>
					<?php
						}
					?>
				</tbody>
			</table>
<?php
		}
	}
?>