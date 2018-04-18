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
		} elseif ($_GET['error']== 'nip_sama') {
			echo "
				<div class='alert fade in alert-danger'>
	            	<button type=button class=close data-dismiss=alert>&times;</button>
	            	<i class='fa fa-warning'></i><strong> NIP</strong> telah ada dalam database.
	        	</div>
			";
		} elseif ($_GET['error']== 'gagal') {
			echo "
				<div class='alert fade in alert-danger'>
	            	<button type=button class=close data-dismiss=alert>&times;</button>
	            	<i class='fa fa-warning'></i><strong> Gagal Tambah/Edit/Delete </strong> Sub Alokasi.
	        	</div>
			";
		} elseif ($_GET['status']== 'sukses') {
			echo "
				<div class='alert fade in alert-success'>
	            	<button type=button class=close data-dismiss=alert>&times;</button>
	            	<i class='fa fa-check-square-o'></i><strong> Berhasil Tambah/Edit/Hapus Data Sub Alokasi</strong>.
	        	</div>
			";
		}

		//kode untuk user
		if(@$_GET['act'] == "") {
?>			
			<div  align="right">
			<div   class="btn-group">
				<a href="?page=admin&mod=sub_alokasi&act=add" role="button" data-toggle="modal" class="btn btn-success btn-xl">
					<i class="fa fa-plus"></i> Tambah Sub Alokasi</a>
			</div></div>
			<h1>Daftar Sub Alokasi</h1>
			

			<table class="table table-bordered table-striped" cellspacing="0" width="100%" id="example">
				<thead>
					<tr>
						<th width="3%" style="text-align:center;">No.</th>
						<th width="5%" style="text-align:center;">Kode Akun</th>
						<th width="10%" style="text-align:center;">Jenis</th>
						<th width="15%" style="text-align:center;">Nama Sub Alokasi</th>
						<th width="5%" style="text-align:center;">Sumber Dana</th>
						<th width="9%" style="text-align:center;">#</th>
					</tr>
				</thead>

				<tbody>
					<?php
						$urut		= 1; //untuk nomor urut
						$load_sub_alokasi  = mysqli_query($db, "SELECT * FROM ref_sub_alokasi");
						while ($sub_alokasi = mysqli_fetch_array($load_sub_alokasi)) {	
					?>

					<tr>
						<td style="text-align:center;"><?php echo $urut++; ?>.</td>
						<td><?php echo "$sub_alokasi[kd_akun]"; ?></td>
						<td><?php echo jenis("$sub_alokasi[kd_jenis]"); ?></td>
						<td><?php echo "$sub_alokasi[nama_sub_alokasi]"; ?></td>
						<td><?php echo "$sub_alokasi[sumber_dana]"; ?></td>
						<td>
							<div class="btn-group">
								<a href="?page=admin&mod=sub_alokasi&act=detail&id=<?=$sub_alokasi[id_sub_alokasi];?>" class="btn btn-ms btn-info"><i class="fa fa-search"></i></a >
								<a href="?page=admin&mod=sub_alokasi&act=edit&id=<?=$sub_alokasi[id_sub_alokasi];?>" class="btn btn-ms btn-primary"><i class="fa fa-edit"></i></a >
								<a href="?page=admin&mod=sub_alokasi&act=hapus&id=<?=$sub_alokasi[id_sub_alokasi];?>" class="btn btn-ms  btn-danger"><i class="fa fa-trash"></i></a>
							</div>
						</td>
					</tr>
				<?php
						}
				?>
				</tbody>
			</table>

		<?php
			} elseif($_GET['act'] == "add") {
		?>
	        <div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title"><b>TAMBAH DATA SUB ALOKASI</b></h2>
				</div>
				<div class="panel-body">
		        	<form name="subalokasi" class="form-horizontal" id="form" method="post" action="log.sub.alokasi.php">

						<div class="form-group">
							<label class="control-label col-sm-2" for="akun">Kode Akun</label>
							<div class="col-sm-6">
								<input type="text" id="akun" class="form-control" name="akun" placeholder="Kode Akun" required="">
								<input type="hidden" id="case" class="span4" name="case" value="add" >
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-sm-2" for="jenis">Jenis Kegiatan</label>
							<div class="col-sm-6">
								<select id="jenis" name="jenis" class="form-control" required>
									<option value="" >-- Pilih Jenis Kegiatan --</option>
									<?php 
										for($jen=1; $jen<=6; $jen++){
											echo "<option value='$jen'>".jenis($jen)."</option>";
										}
									?>
								</select>
							</div>
						</div>

						<script>
							$('#jenis').selectize({
								create: false,
								sortField: 'text'
							});
						</script>

						<div class="form-group">
							<label class="control-label col-sm-2" for="nama">Nama Sub Alokasi</label>
							<div class="col-sm-6">
								<input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Sub Alokasi" required>
							</div>
						</div>

						

						<div class="form-group">
							<label class="control-label col-sm-2" for="sd">Sumber Dana</label>
							<div class="col-sm-6">
								<select id="sd" name="sd" class="form-control" required>
									<option value="" >-- Pilih Sumber Dana --</option>
									<option value="APBN" >APBN</option>
									<option value="PNBP" >PNBP</option>
								</select>
							</div>
						</div>
						
						<script>
							$('#sd').selectize({
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
		<?php	# code...
			} elseif ($_GET['act'] == "edit") {
				$id 	= $_GET['id'];

				$load_sa_e 	= mysqli_query($db, "SELECT * FROM ref_sub_alokasi WHERE id_sub_alokasi='$id'");
				$sa_e 		= mysqli_fetch_array($load_sa_e);

		?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title"><b>EDIT DATA SUB ALOKASI</b></h2>
				</div>
				<div class="panel-body">
		        	<form name="subalokasi" class="form-horizontal" id="form" method="post" action="log.sub.alokasi.php">

						<div class="form-group">
							<label class="control-label col-sm-2" for="akun">Kode Akun</label>
							<div class="col-sm-6">
								<input type="text" id="akun" class="form-control" name="akun" placeholder="Kode Akun" value="<?=$sa_e[kd_akun];?>" required="">
								<input type="hidden" id="id" name="id" value="<?=$sa_e[id_sub_alokasi];?>">
								<input type="hidden" id="case" class="span4" name="case" value="edit" >
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-sm-2" for="jenis">Jenis Kegiatan</label>
							<div class="col-sm-6">
								<select id="jenis" name="jenis" class="form-control" required>
									<option value="<?=$sa_e[kd_jenis];?>" ><?php echo jenis("$sa_e[kd_jenis]"); ?></option>
									<option value="" >-- Pilih Jenis Kegiatan --</option>
									<?php 
										for($jen=1; $jen<=6; $jen++){
											echo "<option value='$jen'>".jenis($jen)."</option>";
										}
									?>
								</select>
							</div>
						</div>

						<script>
							$('#jenis').selectize({
								create: false,
								sortField: 'text'
							});
						</script>

						<div class="form-group">
							<label class="control-label col-sm-2" for="nama">Nama Sub Alokasi</label>
							<div class="col-sm-6">
								<input type="text" id="nama" class="form-control" name="nama" value="<?=$sa_e[nama_sub_alokasi];?>" placeholder="Nama Sub Alokasi" required>
							</div>
						</div>

						

						<div class="form-group">
							<label class="control-label col-sm-2" for="sd">Sumber Dana</label>
							<div class="col-sm-6">
								<select id="sd" name="sd" class="form-control" required>
									<option value="<?=$sa_e[sumber_dana];?>" ><?php echo "$sa_e[sumber_dana]"; ?></option>
									<option value="" >-- Pilih Sumber Dana --</option>
									<option value="APBN" >APBN</option>
									<option value="PNBP" >PNBP</option>
								</select>
							</div>
						</div>
						
						<script>
							$('#sd').selectize({
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

		<?php
			} elseif ($_GET['act'] == "hapus") {
				$id 	= $_GET['id'];

				$load_sub_h 	= mysqli_query($db, "SELECT * FROM ref_sub_alokasi WHERE id_sub_alokasi='$id'");
				$sub_h 		= mysqli_fetch_array($load_sub_h);
		?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title"><b>HAPUS DATA SUB ALOKASI</b></h2>
				</div>
				<div class="panel-body">

	            	<form name="user" class="form" id="form input" method="post" action="log.sub.alokasi.php">
					  <fieldset>
					    <label><i class="fa fa-warning"></i> <strong>WARNING</strong><br>
					    <p>
					     Apakah anda yakin akan menghapus data Sub Alokasi <strong><?php echo "$sub_h[nama_sub_alokasi]"; ?></strong>?</p>
					     <br>
					    </label>
					    	<input type="hidden" id="nama" class="span8" name="nama" value="<?=$sub_h['nama_sub_alokasi'];?>" placeholder="Username" required>
							<input type="hidden" id="id" class="span8" name="id" value="<?=$sub_h['id_sub_alokasi'];?>" >
							<input type="hidden" id="case" class="span4" name="case" value="hapus" >
					    <button type="submit" class="btn btn-danger">Hapus</button> 
					    <a href="?page=admin&mod=sub_alokasi" class="btn btn-primary">Batal</a>
					  </fieldset>
					</form>
				</div>
			</div>  
		<?php
			} elseif ($_GET['act'] == "detail") {
				$id 	= $_GET['id'];

				$load_sub_alokasi_s 	= mysqli_query($db, "SELECT * FROM ref_sub_alokasi WHERE id_sub_alokasi='$id'");
				$sub_alokasi_s 		= mysqli_fetch_array($load_sub_alokasi_s);
		?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title"><b>DETAIL DATA SUB ALOKASI</b></h2>
				</div>
				<div class="panel-body">
					<table class="table table-bordered">
							<tr>
								<td class="col-sm-3">Kode Akun</td>
								<td class="col-sm-8"><?php echo "$sub_alokasi_s[kd_akun]"; ?></td>
							</tr>
							<tr>
								<td class="col-sm-3">Jenis Kegiatan</td>
								<td class="col-sm-8"><?php echo jenis("$sub_alokasi_s[kd_jenis]"); ?></td>
							</tr>
							<tr>
								<td class="col-sm-3">Nama Sub Alokasi</td>
								<td class="col-sm-8"><?php echo "$sub_alokasi_s[nama_sub_alokasi]"; ?></td>
							</tr>
							<tr>
								<td class="col-sm-3">Sumber Dana</td>
								<td class="col-sm-8"><?php echo "$sub_alokasi_s[sumber_dana]"; ?></td>
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