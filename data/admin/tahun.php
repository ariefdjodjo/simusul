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
		} elseif ($_GET['error']== 'tahun_sama') {
			echo "
				<div class='alert fade in alert-danger'>
	            	<button type=button class=close data-dismiss=alert>&times;</button>
	            	<i class='fa fa-warning'></i><strong> Tahun</strong> telah ada dalam database.
	        	</div>
			";
		} elseif ($_GET['error']== 'gagal') {
			echo "
				<div class='alert fade in alert-danger'>
	            	<button type=button class=close data-dismiss=alert>&times;</button>
	            	<i class='fa fa-warning'></i><strong> Gagal Tambah/Edit/Delete </strong> tahun.
	        	</div>
			";
		} elseif ($_GET['status']== 'sukses') {
			echo "
				<div class='alert fade in alert-success'>
	            	<button type=button class=close data-dismiss=alert>&times;</button>
	            	<i class='fa fa-check-square-o'></i><strong> Berhasil Tambah/Edit/Hapus Data Pegawai</strong>.
	        	</div>
			";
		}

		//kode untuk user
		if(@$_GET['act'] == "") {
?>			
			<div  align="right">
			<div   class="btn-group">
				<a href="?page=admin&mod=tahun&act=add" role="button" data-toggle="modal" class="btn btn-success btn-xl">
					<i class="fa fa-plus"></i> Tambah Tahun Anggaran</a>
				<a href="?page=admin&mod=tahun&act=update" role="button" data-toggle="modal" class="btn btn-primary btn-xl">
					<i class="fa fa-plus"></i> Aktifkan Tahun Anggaran</a>
			</div></div>
			<h1>Daftar Tahun Anggaran</h1>
			

			<table class="table table-bordered table-striped" cellspacing="0" width="100%" id="example">
				<thead>
					<tr>
						<th width="3%" style="text-align:center;">No.</th>
						<th width="12%" style="text-align:center;">Tahun</th>
						<th width="5%" style="text-align:center;">Status</th>
						<th width="9%" style="text-align:center;">#</th>
					</tr>
				</thead>

				<tbody>
					<?php
						$urut		= 1; //untuk nomor urut
						$load_tahun  = mysqli_query($db, "SELECT * FROM ref_tahun");
						while ($tahun = mysqli_fetch_array($load_tahun)) {	
					?>

					<tr>
						<td style="text-align:center;"><?php echo $urut++; ?>.</td>
						<td><?php echo "$tahun[tahun]"; ?></td>
						<td>
							<?php 
								if($tahun['status']==0) {
									echo "<div class=btn-group><button class='btn btn-danger btn-xs'>Non Aktif</button></div>";
								} elseif ($tahun['status']==1) {
									echo "<div class=btn-group>
										<button class='btn btn-primary btn-xs'>Dapat Edit</button>
										</div>";
								} elseif ($tahun['status']==2) {
									echo "<div class=btn-group>
										<button class='btn btn-primary btn-xs'>Dapat Edit</button>
										<button class='btn btn-success btn-xs'>Dapat Input</button>
										</div>";
								}
							?>
						</td>
						<td>
							<div class="btn-group">
								<a href="?page=admin&mod=tahun&act=edit&id=<?=$tahun[tahun];?>" class="btn btn-ms btn-primary"><i class="fa fa-edit"></i></a >
								<a href="?page=admin&mod=tahun&act=hapus&id=<?=$tahun[tahun];?>" class="btn btn-ms  btn-danger"><i class="fa fa-trash"></i></a>
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
					<h2 class="panel-title"><b>TAMBAH DATA TAHUN</b></h2>
				</div>
				<div class="panel-body">
		        	<form name="pegawai" class="form-horizontal" id="form" method="post" action="log.tahun.php">

						<div class="form-group">
							<label class="control-label col-sm-2" for="tahun">Tahun</label>
							<div class="col-sm-6">
								<input type="text" id="tahun" class="form-control" name="tahun" placeholder="Tahun Anggaran" required="">
								<input type="hidden" id="case" class="span4" name="case" value="add" >
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

				$load_th_e 	= mysqli_query($db, "SELECT * FROM ref_tahun WHERE tahun='$id'");
				$th_e 		= mysqli_fetch_array($load_th_e);

		?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title"><b>EDIT DATA TAHUN</b></h2>
				</div>
				<div class="panel-body">
		        	<form name="pegawai" class="form-horizontal" id="form" method="post" action="log.tahun.php">

						<div class="form-group">
							<label class="control-label col-sm-2" for="tahun">Tahun</label>
							<div class="col-sm-6">
								<input type="text" id="tahun" class="form-control" name="tahun" value="<?=$th_e[tahun];?>" placeholder="Tahun Anggaran">
								<input type="hidden" id="tahun_e" class="form-control" name="tahun_e" value="<?=$th_e[tahun];?>" placeholder="Tahun Anggaran">
								<input type="hidden" id="case" class="span4" name="case" value="edit" >
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

				$load_tahun_h 	= mysqli_query($db, "SELECT * FROM ref_tahun WHERE tahun='$id'");
				$tahun_h 		= mysqli_fetch_array($load_tahun_h);
		?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title"><b>HAPUS DATA TAHUN</b></h2>
				</div>
				<div class="panel-body">

	            	<form name="user" class="form" id="form input" method="post" action="log.tahun.php">
					  <fieldset>
					    <label><i class="fa fa-warning"></i> <strong>WARNING</strong><br>
					    <p>
					     Apakah anda yakin akan menghapus data Tahun <strong><?php echo "$tahun_h[tahun]"; ?></strong>?</p>
					     <br>
					    </label>
					    	<input type="hidden" id="tahun" class="span8" name="tahun" value="<?=$tahun_h['tahun'];?>" placeholder="Tahun" required>
							<input type="hidden" id="case" class="span4" name="case" value="hapus" >
					    <button type="submit" class="btn btn-danger">Hapus</button> 
					    <a href="?page=admin&mod=tahun" class="btn btn-primary">Batal</a>
					  </fieldset>
					</form>
				</div>
			</div>  
		<?php
			} elseif ($_GET['act'] == "detail") {
				$id 	= $_GET['id'];

				$load_pegawai_s 	= mysqli_query($db, "SELECT * FROM ref_pegawai a INNER JOIN mst_satker b ON a.id_satker=b.id_satker WHERE a.nip='$id'");
				$pegawai_s 		= mysqli_fetch_array($load_pegawai_s);
		?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title"><b>DETAIL DATA PEGAWAI</b></h2>
				</div>
				<div class="panel-body">
					<table class="table table-bordered">
							<tr>
								<td class="col-sm-3">Nama Pegawai</td>
								<td class="col-sm-8"><?php echo "$pegawai_s[nama]"; ?></td>
							</tr>
							<tr>
								<td class="col-sm-3">NIM Pegawai</td>
								<td class="col-sm-8"><?php echo "$pegawai_s[nip]"; ?></td>
							</tr>
							<tr>
								<td class="col-sm-3">Satuan Kerja</td>
								<td class="col-sm-8"><?php echo "$pegawai_s[nama_satker]"; ?></td>
							</tr>
							<tr>
								<td class="col-sm-3">Pangkat, Golongan</td>
								<td class="col-sm-8"><?php echo p_gol("$pegawai_s[pangkat_gol]"); ?></td>
							</tr>
							<tr>
								<td class="col-sm-3">Type User</td>
								<td class="col-sm-8"><?php echo status_peg("$pegawai_s[status_pegawai]"); ?></td>
							</tr>
					</table>
				</div>
			</div>  

		<?php
			} elseif ($_GET['act'] == "update") {
		?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title"><b>AKTIFASI TAHUN</b></h2>
				</div>
				<div class="panel-body">
		        	<form name="pegawai" class="form-horizontal" id="form" method="post" action="log.tahun.php">

						<div class="form-group">
							<label class="control-label col-sm-2" for="tahun">Tahun</label>
							<div class="col-sm-6">
								<select id="tahun" name="tahun" class="form-control" required>
									<option value="" >Pilih Tahun</option>
									<?php 
										$load_dt_th = mysqli_query($db, "SELECT * FROM ref_tahun");
										while ($dt_th = mysqli_fetch_array($load_dt_th)) {
											echo "<option value=".$dt_th['tahun']." >".$dt_th['tahun']."</option>";
										}
									?>
								</select>
								<input type="hidden" id="case" class="span4" name="case" value="update" >
							</div>
						</div>
						<script>
							$('#tahun').selectize({
								create: false,
								sortField: 'text'
							});
						</script>
		   				<div class="form-group">
							<label class="control-label col-sm-2" for="status">Status</label>
							<div class="col-sm-6">
								<select id="status" name="status" class="form-control" required>
									<option value="" >Pilih Status</option>
									<option value="0" >Non Aktif</option>
									<option value="1" >Edit</option>
									<option value="2" >Input dan Edit</option>
								</select>
							</div>
						</div>

						<script>
							$('#status').selectize({
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
		}
		?>

<?php
	} else {
		include "illegal_akses.php";
	}
?>