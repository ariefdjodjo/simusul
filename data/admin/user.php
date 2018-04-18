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
		} elseif ($_GET['error']== 'password') {
			echo "
				<div class='alert fade in alert-danger'>
	            	<button type=button class=close data-dismiss=alert>&times;</button>
	            	<i class='fa fa-warning'></i><strong> Password</strong> tidak sama dengan Re-Password.
	        	</div>
			";
		} elseif ($_GET['error']== 'gagal') {
			echo "
				<div class='alert fade in alert-danger'>
	            	<button type=button class=close data-dismiss=alert>&times;</button>
	            	<i class='fa fa-warning'></i><strong> Gagal Tambah/Edit/Delete </strong> Username.
	        	</div>
			";
		} elseif ($_GET['status']== 'sukses') {
			echo "
				<div class='alert fade in alert-success'>
	            	<button type=button class=close data-dismiss=alert>&times;</button>
	            	<i class='fa fa-check-square-o'></i><strong> Berhasil Tambah User Accunt</strong>.
	        	</div>
			";
		}

		//kode untuk user
		if(@$_GET['act'] == "") {
?>
			<div align="right"><p>
				<a href="?page=admin&mod=user&act=add" role="button" data-toggle="modal" class="btn btn-success btn-small">
					<i class="fa fa-plus"></i> Tambah User
				</a></p>
			</div>
			<h1>Daftar User Accunt</h1>
			

			<table class="table table-bordered table-striped" cellspacing="0" width="100%" id="example">
				<thead>
					<tr>
						<th width="3%" style="text-align:center;">No.</th>
						<th width="12%" style="text-align:center;">Nama User</th>
						<th width="20%" style="text-align:center;">Satuan Kerja</th>
						<th width="10%" style="text-align:center;">Username</th>
						<th width="10%" style="text-align:center;">Type User</th>
						<th width="8%" style="text-align:center;">#</th>
					</tr>
				</thead>

				<tbody>
					<?php
						$urut		= 1; //untuk nomor urut
						$load_user  = mysqli_query($db, "SELECT * FROM mst_user u INNER JOIN mst_satker s ON u.id_satker=s.id_satker");
						$row_user	= mysqli_num_rows($load_user);

						if($row_user == 0) {
							echo "<tr><th colspan=6>Tidak ada data</th></tr>";
						} else {
							while ($user_u = mysqli_fetch_array($load_user)) {	
					?>

					<tr>
						<td style="text-align:center;"><?php echo $urut++; ?>.</td>
						<td><?php echo "$user_u[nama_user]"; ?></td>
						<td><?php echo "$user_u[nama_satker]"; ?></td>
						<td><?php echo "$user_u[username]"; ?></td>
						<td><?php echo type("$user_u[type_user]"); ?></td>
						<td>
							<div class="btn-group">
								<a href="?page=admin&mod=user&act=detail&id=<?=$user_u[id_user];?>" class="btn btn-ms btn-success" title="Detail"><i class="fa fa-search"></i></a >
								<a href="?page=admin&mod=user&act=edit&id=<?=$user_u[id_user];?>" class="btn btn-ms btn-primary" title="Edit"><i class="fa fa-edit"></i></a >
								<a href="?page=admin&mod=user&act=hapus&id=<?=$user_u[id_user];?>" class="btn btn-ms  btn-danger" title="hapus"><i class="fa fa-trash"></i></a>
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
					<h2 class="panel-title"><b>TAMBAH DATA USER</b></h2>
				</div>
				<div class="panel-body">
		        	<form name="user" class="form-horizontal" id="form" method="post" action="log.user.php">

						<div class="form-group">
							<label class="control-label col-sm-2" for="username">Username</label>
							<div class="col-sm-6">
								<input type="text" id="username" class="form-control" name="username" placeholder="Username" required="">
								<input type="hidden" id="case" class="span4" name="case" value="add" >
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="password">Password</label>
							<div class="col-sm-6">
								<input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="re-password">Re-password</label>
							<div class="col-sm-6">
								<input type="password" id="repassword" class="form-control" name="repassword" placeholder="Re-Password" required>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-sm-2" for="re-password">Type</label>
							<div class="col-sm-6">
								<select id="type" name="type" class="form-control" required>
									<option value="" >-- Pilih Type --</option>
									<option value="1">Administrator</option>
									<option value="2">Satuan Kerja</option>
									<option value="3">Manajemen</option>
								</select>
							</div>
						</div>
						
						<script>
							$('#type').selectize({
								create: false,
								sortField: 'text'
							});
						</script>

						<div class="form-group">
							<label class="control-label col-sm-2" for="nama">Nama User </label>
							<div class="col-sm-6">
								<input type="text" id="nama" class="form-control" name="nama" placeholder="Nama" required>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="satker">Satuan Kerja</label>
							<div class="col-sm-6">
								<select id="satker" name="satker" class="form-control" required>
									<option value="" >-- Pilih Satuan Kerja --</option>
									<?php 
										$load_satker 	= mysqli_query($db, "SELECT * FROM mst_satker");
										while ($satker 	= mysqli_Fetch_array($load_satker)) {
											echo "<option value='$satker[id_satker]'>$satker[nama_satker]</option>";
										}
									?>
								</select>
							</div>
						</div>

						<script>
							$('#satker').selectize({
								create: false,
								sortField: 'text'
							});
						</script>
		   				
		   				<div class="form-group">
		      				<div class="col-sm-2"></div>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
							</div>
						</div>	
					</form>
       			</div>
       		</div>
		<?php	# code...
			} elseif ($_GET['act'] == "edit") {
				$id 	= $_GET['id'];

				$load_user_e 	= mysqli_query($db, "SELECT * FROM mst_user a INNER JOIN mst_satker b ON a.id_satker=b.id_satker WHERE a.id_user='$id'");
				$user_e 		= mysqli_fetch_array($load_user_e);

		?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title"><b>EDIT DATA USER</b></h2>
				</div>
				<div class="panel-body">
		        	<form name="user" class="form-horizontal" id="form" method="post" action="log.user.php">

						<div class="form-group">
							<label class="control-label col-sm-2" for="username">Username</label>
							<div class="col-sm-6">
								<input type="text" id="username" class="form-control" name="username" value="<?=$user_e[username];?>" placeholder="Username" required="">
								<input type="hidden" id="id" class="form-control" name="id" value="<?=$user_e[id_user];?>" placeholder="id" required="">
								<input type="hidden" id="case" class="span4" name="case" value="edit" >
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="password">Password</label>
							<div class="col-sm-6">
								<input type="" id="password" class="form-control" name="password" value="<?=$user_e[4];?>" placeholder="Password" required>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="re-password">Re-password</label>
							<div class="col-sm-6">
								<input type="" id="repassword" class="form-control" name="repassword" value="<?=$user_e[re_pass];?>" placeholder="Re-Password" required>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-sm-2" for="re-password">Type</label>
							<div class="col-sm-6">
								<select id="type" name="type" class="form-control" required>
									<option value="<?=$user_e[type_user];?>"><?php echo type($user_e['type_user']); ?></option>
									<option value="" >-- Pilih Type --</option>
									<option value="1">Administrator</option>
									<option value="2">Satuan Kerja</option>
									<option value="3">Manajemen</option>
								</select>
							</div>
						</div>
						
						<script>
							$('#type').selectize({
								create: false,
								sortField: 'text'
							});
						</script>

						<div class="form-group">
							<label class="control-label col-sm-2" for="nama">Nama User </label>
							<div class="col-sm-6">
								<input type="text" id="nama" class="form-control" name="nama" value="<?=$user_e[nama_user];?>" placeholder="Nama" required>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="satker">Satuan Kerja</label>
							<div class="col-sm-6">
								<select id="satker" name="satker" class="form-control" required>
									<option value="<?=$user_e[id_satker];?>"><?php echo $user_e['nama_satker']; ?></option>
									<option value="" >-- Pilih Satuan Kerja --</option>
									<?php 
										$load_satker 	= mysqli_query($db, "SELECT * FROM mst_satker");
										while ($satker 	= mysqli_Fetch_array($load_satker)) {
											echo "<option value='$satker[id_satker]'>$satker[nama_satker]</option>";
										}
									?>
								</select>
							</div>
						</div>

						<script>
							$('#satker').selectize({
								create: false,
								sortField: 'text'
							});
						</script>
		   				
		   				<div class="form-group">
		      				<div class="col-sm-2"></div>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
							</div>
						</div>	
					</form>
       			</div>
       		</div>
		<?php
			} elseif ($_GET['act'] == "hapus") {
				$id 	= $_GET['id'];

				$load_user_h 	= mysqli_query($db, "SELECT * FROM mst_user a INNER JOIN mst_satker b ON a.id_satker=b.id_satker WHERE a.id_user='$id'");
				$user_h 		= mysqli_fetch_array($load_user_h);
		?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title"><b>HAPUS DATA USER</b></h2>
				</div>
				<div class="panel-body">

	            	<form name="user" class="form" id="form input" method="post" action="log.user.php">
					  <fieldset>
					    <label><i class="fa fa-warning"></i> <strong>WARNING</strong><br>
					    <p>
					     Apakah anda yakin akan menghapus User Accunt <strong><?php echo "$user_h[username]"; ?></strong>?</p>
					     <br>
					    </label>
					    	<input type="hidden" id="username" class="span8" name="username" value="<?=$user_h['username'];?>" placeholder="Username" required>
							<input type="hidden" id="id" class="span8" name="id" value="<?=$user_h['id_user'];?>" >
							<input type="hidden" id="case" class="span4" name="case" value="hapus" >
					    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button> 
					    <a href="?page=admin&mod=user" class="btn btn-primary"><i class="fa fa-times"></i> Batal</a>
					  </fieldset>
					</form>
				</div>
			</div>  
		<?php
			} elseif ($_GET['act'] == "detail") {
				$id 	= $_GET['id'];

				$load_user_s 	= mysqli_query($db, "SELECT * FROM mst_user a INNER JOIN mst_satker b ON a.id_satker=b.id_satker WHERE a.id_user='$id'");
				$user_s 		= mysqli_fetch_array($load_user_s);
		?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title"><b>DETAIL DATA USER</b></h2>
				</div>
				<div class="panel-body">
					<table class="table table-bordered">
							<tr>
								<td class="col-sm-3">Nama User</td>
								<td class="col-sm-8"><?php echo "$user_s[nama_user]"; ?></td>
							</tr>
							<tr>
								<td class="col-sm-3">Satuan Kerja</td>
								<td class="col-sm-8"><?php echo "$user_s[nama_satker]"; ?></td>
							</tr>
							<tr>
								<td class="col-sm-3">Username</td>
								<td class="col-sm-8"><?php echo "$user_s[username]"; ?></td>
							</tr>
							<tr>
								<td class="col-sm-3">Type User</td>
								<td class="col-sm-8"><?php echo type("$user_s[type_user]"); ?></td>
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