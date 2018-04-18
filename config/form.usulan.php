<?php 
	include "db.config.php";

	$id_jenis = $_GET['jenis'];
?>

<div class="form-group">
	<label class="control-label col-sm-2" for="alokasi">Sub Alokasi</label>
	<div class="col-sm-6">
		<select id="alokasi" name="alokasi" class="form-control" required>
			<option value="" >-- Pilih Sub Alokasi --</option>
			<?php 
				$load_alokasi 	= mysqli_query($db, "SELECT id_sub_alokasi, nama_sub_alokasi FROM ref_sub_alokasi WHERE kd_jenis='$id_jenis'");
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
		<input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Usulan/Barang/Kegiatan" required="">
	</div>
</div>

<div class="form-group">
	<label class="control-label col-sm-2" for="spek">Spesifikasi Barang</label>
	<div class="col-sm-6">
		<input type="text" id="spek" class="form-control" name="spek" placeholder="Spesifikasi Usulan/Barang/Kegiatan" required>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-sm-2" for="qty">Jumlah Permintaan</label>
	<div class="col-sm-3">
		<input type="number" id="qty" class="form-control" name="qty" placeholder="Permintaan" required>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-sm-2" for="satuan">Satuan</label>
	<div class="col-sm-6">
		<select id="satuan" name="satuan" class="form-control" required>
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
		<input type="number" id="harga" class="form-control" name="harga" placeholder="Harga Satuan" required>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-sm-2" for="prioritas">Prioritas</label>
	<div class="col-sm-6">
		<select id="prioritas" name="prioritas" class="form-control" required>
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