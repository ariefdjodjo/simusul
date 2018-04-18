<?php 
	$id 	= $_GET['id'];
	if (@$_GET['error']== 'gagal') {
			echo "
				<div class='alert fade in alert-danger'>
	            	<button type=button class=close data-dismiss=alert>&times;</button>
	            	<i class='fa fa-warning'></i><strong> Gagal Tambah/Edit/Delete </strong> Sub Alokasi.
	        	</div>
			";
		}

	$load_usulan 	= mysqli_query($db, "SELECT * FROM usulan a INNER JOIN mst_satker b ON a.id_satker=b.id_satker INNER JOIN 
		ref_sub_alokasi c ON a.id_sub_alokasi=c.id_sub_alokasi WHERE a.id_usulan='$id'");
	$usulan 		= mysqli_fetch_array($load_usulan);
?>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h2 class="panel-title"><b>TAMBAH USULAN</b></h2>
	</div>
	<div class="panel-body">
    	<form name="user" class="form-horizontal" id="form" method="post" action="log.usulan.php">
    		<div class="form-group">
				<label class="control-label col-sm-2" for="tahun">Tahun Anggaran</label>
				<div class="col-sm-3">
					<input type="text" id="tahun" class="form-control" name="tahun" value="<?=$usulan[tahun];?>" readonly="" required>
				</div>
			</div>
    		<div class="form-group">
				<label class="control-label col-sm-2" for="nm">Nama Satker</label>
				<div class="col-sm-6">
					<input type="text" id="nm" class="form-control" name="nm" value="<?=$usulan[nama_satker];?>" placeholder="Nama Satker" required="" readonly="">
					<input type="hidden" id="satker" class="form-control" name="satker" value="<?=$usulan[id_satker];?>">
					<input type="hidden" id="id" class="form-control" name="id" value="<?=$usulan[id_usulan];?>">
					<input type="hidden" id="case" class="span4" name="case" value="edit" >
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-2" for="alokasi">Sub Alokasi</label>
				<div class="col-sm-6">
					<select id="alokasi" name="alokasi" class="form-control" required>
						<option value="<?=$usulan[id_sub_alokasi];?>" ><?php echo "$usulan[nama_sub_alokasi]"; ?></option>
						<option value="" >-- Pilih Sub Alokasi --</option>
						<?php 
							$load_alokasi 	= mysqli_query($db, "SELECT id_sub_alokasi, nama_sub_alokasi FROM ref_sub_alokasi");
							while ($alokasi = mysqli_fetch_array($load_alokasi)) {
								echo "<option value='$alokasi[id_sub_alokasi]'>$alokasi[nama_sub_alokasi]</option>";
							}
						?>
					</select>
				</div>
			</div>

			<script>
				$('#alokasi').selectize({
					create: false,
					sortField: 'text'
				});
			</script>

			<div class="form-group">
				<label class="control-label col-sm-2" for="nama">Nama Usulan/Barang/Kegiatan</label>
				<div class="col-sm-6">
					<input type="text" id="nama" class="form-control" name="nama" value="<?=$usulan[nama_usulan];?>" placeholder="Nama Usulan/Barang/Kegiatan" required="">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="spek">Spesifikasi Barang</label>
				<div class="col-sm-6">
					<input type="text" id="spek" class="form-control" name="spek" value="<?=$usulan[spesifikasi_usulan];?>" placeholder="Spesifikasi Usulan/Barang/Kegiatan" required>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="qty">Jumlah Permintaan</label>
				<div class="col-sm-3">
					<input type="number" id="qty" class="form-control" name="qty" value="<?=$usulan[qty_usulan];?>" placeholder="Permintaan" required>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="satuan">Satuan</label>
				<div class="col-sm-6">
					<select id="satuan" name="satuan" class="form-control" required>
						<option value="<?=$usulan[satuan_usulan];?>" ><?php echo "$usulan[satuan_usulan]"; ?></option>
						<option value="" >-- Pilih Satuan --</option>
						<option value="Unit" >Unit</option>
						<option value="Paket" >Paket</option>
						<option value="Pcs" >Pcs</option>
						<option value="Botol" >Botol</option>
						<option value="Liter" >Liter</option>
						<option value="Kg" >Kg</option>
						<option value="Ons" >Ons</option>
						<option value="Ampul" >Ampul</option>
						<option value="Lusin" >Lusin</option>
						<option value="m2" >m2</option>
					</select>
				</div>
			</div>

			<script>
				$('#satuan').selectize({
					create: true,
					sortField: 'text'
				});
			</script>

			<div class="form-group">
				<label class="control-label col-sm-2" for="harga">Harga Satuan</label>
				<div class="col-sm-3">
					<input type="number" id="harga" class="form-control" name="harga" value="<?=$usulan[harga_usulan];?>" placeholder="Harga Satuan" required>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="prioritas">Prioritas</label>
				<div class="col-sm-6">
					<select id="prioritas" name="prioritas" class="form-control" required>
						<option value="<?=$usulan[prioritas_usulan];?>" ><?php echo "$usulan[prioritas_usulan]"; ?></option>
						<option value="" >-- Pilih Prioritas --</option>
						<option value="1" >1</option>
						<option value="2" >2</option>
						<option value="3" >3</option>
					</select>
				</div>
			</div>

			<script>
				$('#prioritas').selectize({
					create: false,
					sortField: 'text'
				});
			</script>
			
				
			<div class="form-group">
  				<div class="col-sm-2"></div>
				<div class="col-sm-6">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>	
		</form>
	</div>
</div>