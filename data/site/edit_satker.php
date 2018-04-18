<?php	# code...
$load_satker_e 	= mysqli_query($db, "SELECT * FROM mst_satker WHERE id_satker='$akses_user[id_satker]'");
$satker 		= mysqli_fetch_array($load_satker_e);

?>
<div class="panel panel-primary">
<div class="panel-heading">
	<h2 class="panel-title"><b>EDIT DATA SATUAN KERJA</b></h2>
</div>
<div class="panel-body">
	<form name="user" class="form-horizontal" id="form" method="post" action="log.satker.php">

		<div class="form-group">
			<label class="control-label col-sm-2" for="nama">Nama Satker</label>
			<div class="col-sm-6">
				<input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Satker" value="<?=$satker[nama_satker];?>" required="">
				<input type="hidden" id="id" class="span4" name="id" value="<?=$satker[id_satker];?>" >
				<input type="hidden" id="case" class="span4" name="case" value="edit_site" >
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-2" for="alamat">Alamat Satker</label>
			<div class="col-sm-6">
				<input type="text" id="alamat" class="form-control" name="alamat" value="<?=$satker[alamat_satker];?>" placeholder="Alamat Satker" required>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-2" for="telp">No. Telp Satker</label>
			<div class="col-sm-6">
				<input type="text" id="telp" class="form-control" name="telp" value="<?=$satker[no_telp_satker];?>" placeholder="No. Telp Satker" required>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-2" for="email">E-mail Satker</label>
			<div class="col-sm-6">
				<input type="text" id="email" class="form-control" name="email" value="<?=$satker[email_satker];?>" placeholder="E-mail Satker" required>
			</div>
		</div>
			
			<div class="form-group">
				<div class="col-sm-2"></div>
			<div class="col-sm-6">
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</div>	
	</form>
	</div>
</div>