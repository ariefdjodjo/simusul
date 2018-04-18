<?php

	if($akses_user['type_user']== "1") {

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
	            	<i class='fa fa-warning'></i><strong> Gagal Tambah/Edit/Delete </strong> Data Satker.
	        	</div>
			";
		} elseif ($_GET['status']== 'sukses') {
			echo "
				<div class='alert fade in alert-success'>
	            	<button type=button class=close data-dismiss=alert>&times;</button>
	            	<i class='fa fa-check-square-o'></i><strong> Berhasil</strong>.
	        	</div>
			";
		}

		//kode untuk user
		if(@$_GET['act'] == "") {
?>
			<div align="right"><p>
				<a href="?page=admin&mod=satker&act=add" role="button" data-toggle="modal" class="btn btn-success btn-small">
					<i class="fa fa-plus"></i> Tambah Satuan Kerja
				</a></p>
			</div>

			<h1>Daftar Satuan Kerja</h1>

			<table class="table table-bordered table-striped" cellspacing="0" width="100%" id="example">
				<thead>
					<tr>
						<th width="3%" style="text-align:center;">No.</th>
						<th width="16%" style="text-align:center;">Nama Satker</th>
						<th width="10%" style="text-align:center;">Alamat Satker</th>
						<th width="10%" style="text-align:center;">No. Telp</th>
						<th width="10%" style="text-align:center;">E-mail</th>
						<th width="9%" style="text-align:center;">#</th>
					</tr>
				</thead>

				<tbody>
					<?php
						$urut		= 1; //untuk nomor urut
						$load_satker  = mysqli_query($db, "SELECT * FROM mst_satker");
						$row_satker	= mysqli_num_rows($load_satker);

						if($row_satker == 0) {
							echo "<tr><th colspan=6>Tidak ada data</th></tr>";
						} else {
							while ($satker = mysqli_fetch_array($load_satker)) {	
					?>

					<tr>
						<td style="text-align:center;"><?php echo $urut++; ?>.</td>
						<td><?php echo "$satker[nama_satker]"; ?></td>
						<td><?php echo "$satker[alamat_satker]"; ?></td>
						<td><?php echo "$satker[no_telp_satker]"; ?></td>
						<td><?php echo "$satker[email_satker]"; ?></td>
						<td>
							<div class="btn-group">
								<a href="?page=admin&mod=satker&act=detail&id=<?=$satker[id_satker];?>" class="btn btn-ms btn-success" title="Detail"><i class="fa fa-search"></i></a >
								<a href="?page=admin&mod=satker&act=edit&id=<?=$satker[id_satker];?>" class="btn btn-ms btn-primary" title="Edit"><i class="fa fa-edit"></i></a >
								<a href="?page=admin&mod=satker&act=hapus&id=<?=$satker[id_satker];?>" class="btn btn-ms  btn-danger" title="Hapus"><i class="fa fa-trash"></i></a>
							</div>
						</td>
					</tr>
				<?php
						}
					}
				?>
				</tbody>
			</table>

		<?php
			} elseif($_GET['act'] == "add") {
		?>
	        <div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title"><b>TAMBAH DATA SATUAN KERJA</b></h2>
				</div>
				<div class="panel-body">
		        	<form name="user" class="form-horizontal" id="form" method="post" action="log.satker.php">

						<div class="form-group">
							<label class="control-label col-sm-2" for="nama">Nama Satker</label>
							<div class="col-sm-6">
								<input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Satker" required="">
								<input type="hidden" id="case" class="span4" name="case" value="add" >
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="alamat">Alamat Satker</label>
							<div class="col-sm-6">
								<input type="text" id="alamat" class="form-control" name="alamat" placeholder="Alamat Satker" required>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="telp">No. Telp Satker</label>
							<div class="col-sm-6">
								<input type="text" id="telp" class="form-control" name="telp" placeholder="No. Telp Satker" required>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="email">E-mail Satker</label>
							<div class="col-sm-6">
								<input type="text" id="email" class="form-control" name="email" placeholder="E-mail Satker" required>
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
		<?php	# code...
			} elseif ($_GET['act'] == "edit") {
				$id 	= $_GET['id'];

				$load_satker_e 	= mysqli_query($db, "SELECT * FROM mst_satker WHERE id_satker='$id'");
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
								<input type="hidden" id="case" class="span4" name="case" value="edit" >
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
		<?php
			} elseif ($_GET['act'] == "hapus") {
				$id 	= $_GET['id'];

				$load_satker_h 	= mysqli_query($db, "SELECT * FROM mst_satker WHERE id_satker='$id'");
				$satker_h 		= mysqli_fetch_array($load_satker_h);
		?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title"><b>HAPUS DATA SATUAN KERJA</b></h2>
				</div>
				<div class="panel-body">

	            	<form name="satker" class="form" id="form input" method="post" action="log.satker.php">
					  <fieldset>
					    <label><i class="fa fa-warning"></i> <strong>WARNING</strong><br>
					    <p>
					     Apakah anda yakin akan menghapus Satker <strong><?php echo "$satker_h[nama_satker]"; ?></strong>?</p>
					     <br>
					    </label>
					    	<input type="hidden" id="nama" class="span8" name="nama" value="<?=$satker_h['nama_satker'];?>" placeholder="Username" required>
							<input type="hidden" id="id" class="span8" name="id" value="<?=$satker_h['id_satker'];?>" >
							<input type="hidden" id="case" class="span4" name="case" value="hapus" >
					    <button type="submit" class="btn btn-danger">Hapus</button> 
					    <a href="?page=admin&mod=satker" class="btn btn-primary">Batal</a>
					  </fieldset>
					</form>
				</div>
			</div>  
		<?php
			} elseif ($_GET['act'] == "detail") {
				$id 	= $_GET['id'];

				$load_satker_s 	= mysqli_query($db, "SELECT * FROM mst_satker WHERE id_satker='$id'");
				$satker_s 		= mysqli_fetch_array($load_satker_s);
		?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title"><b>DETAIL DATA SATUAN KERJA</b></h2>
				</div>
				<div class="panel-body">
					<table class="table table-bordered">
							<tr>
								<td class="col-sm-3">Nama Satuan Kerja</td>
								<td class="col-sm-8"><?php echo "$satker_s[nama_satker]"; ?></td>
							</tr>
							<tr>
								<td class="col-sm-3">Alamat Satuan Kerja</td>
								<td class="col-sm-8"><?php echo "$satker_s[alamat_satker]"; ?></td>
							</tr>
							<tr>
								<td class="col-sm-3">No. Telp</td>
								<td class="col-sm-8"><?php echo "$satker_s[no_telp_satker]"; ?></td>
							</tr>
							<tr>
								<td class="col-sm-3">e-mail </td>
								<td class="col-sm-8"><?php echo "$satker_s[email_satker]"; ?></td>
							</tr>
					</table>
				</div>
			</div>  
<?php	# code...
}
?>

<?php
	} else {
		include "illegal_akses.php";
	}
?>