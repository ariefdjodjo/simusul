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
	            	<i class='fa fa-warning'></i><strong> Gagal Tambah/Edit/Delete </strong> Pegawai.
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
				<a href="?page=admin&mod=pegawai&act=add" role="button" data-toggle="modal" class="btn btn-success btn-xl">
					<i class="fa fa-plus"></i> Tambah Pegawai</a>
				<!--
				<a href="#" role="button" data-toggle="modal" class="btn btn-info btn-xl" disabled>
					<i class="icon icon-plus"></i> Eksport Data Pegawai</a>
				<a href="#" role="button" data-toggle="modal" class="btn btn-primary btn-xl" disabled>
					<i class="icon icon-plus"></i> Import Data Pegawai</a>
				<a href="#" role="button" data-toggle="modal" class="btn btn-danger btn-xl" disabled>
					<i class="icon icon-plus"></i> Kosongkan Data</a>
				-->
			</div></div>
			<h1>Daftar Nama Pegawai</h1>
			

			<table class="table table-bordered table-striped" cellspacing="0" width="100%" id="example">
				<thead>
					<tr>
						<th width="3%" style="text-align:center;">No.</th>
						<th width="12%" style="text-align:center;">Satuan Kerja</th>
						<th width="12%" style="text-align:center;">Nama Pegawai</th>
						<th width="8%" style="text-align:center;">NIP</th>
						<th width="10%" style="text-align:center;">Pangkat/Gol</th>
						<th width="5%" style="text-align:center;">Status</th>
						<th width="9%" style="text-align:center;">#</th>
					</tr>
				</thead>

				<tbody>
					<?php
						$urut		= 1; //untuk nomor urut
						$load_pegawai  = mysqli_query($db, "SELECT * FROM ref_pegawai u INNER JOIN mst_satker s ON u.id_satker=s.id_satker");
						while ($pegawai = mysqli_fetch_array($load_pegawai)) {	
					?>

					<tr>
						<td style="text-align:center;"><?php echo $urut++; ?>.</td>
						<td><?php echo "$pegawai[nama_satker]"; ?></td>
						<td><?php echo "$pegawai[nama]"; ?></td>
						<td><?php echo "$pegawai[nip]"; ?></td>
						<td><?php echo p_gol("$pegawai[pangkat_gol]"); ?></td>
						<td><?php echo status_peg("$pegawai[status_pegawai]"); ?></td>
						<td>
							<div class="btn-group">
								<a href="?page=admin&mod=pegawai&act=detail&id=<?=$pegawai[nip];?>" class="btn btn-ms btn-info"><i class="fa fa-search"></i></a >
								<a href="?page=admin&mod=pegawai&act=edit&id=<?=$pegawai[nip];?>" class="btn btn-ms btn-primary"><i class="fa fa-edit"></i></a >
								<a href="?page=admin&mod=pegawai&act=hapus&id=<?=$pegawai[nip];?>" class="btn btn-ms  btn-danger"><i class="fa fa-trash"></i></a>
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
					<h2 class="panel-title"><b>TAMBAH DATA PEGAWAI</b></h2>
				</div>
				<div class="panel-body">
		        	<form name="pegawai" class="form-horizontal" id="form" method="post" action="log.pegawai.php">

						<div class="form-group">
							<label class="control-label col-sm-2" for="nip">NIP</label>
							<div class="col-sm-6">
								<input type="text" id="nip" class="form-control" name="nip" placeholder="NIP Pegawai" required="">
								<input type="hidden" id="case" class="span4" name="case" value="add" >
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="nama">Nama</label>
							<div class="col-sm-6">
								<input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Pegawai" required>
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
							<label class="control-label col-sm-2" for="re-password">Pangkat Golongan</label>
							<div class="col-sm-6">
								<select id="gol" name="gol" class="form-control" required>
									<option value="" >-- Pilih Pangkat dan Golongan --</option>
									<?php 
										$speg =1;
										for($i=1; $i<=17; $i++) {
											echo "<option value=$i>".p_gol($i)."</option>";
										}
									?>
									
								</select>
							</div>
						</div>
						
						<script>
							$('#gol').selectize({
								create: false,
								sortField: 'text'
							});
						</script>

						<div class="form-group">
							<label class="control-label col-sm-2" for="re-password">Status Kepegawaian</label>
							<div class="col-sm-6">
								<select id="status" name="status" class="form-control" required>
									<option value="" >-- Pilih Status Kepegawaian --</option>
									<?php 
										$speg =1;
										for($i=1; $i<=4; $i++) {
											echo "<option value=$i>".status_peg($i)."</option>";
										}
									?>
									
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
			} elseif ($_GET['act'] == "edit") {
				$id 	= $_GET['id'];

				$load_peg_e 	= mysqli_query($db, "SELECT * FROM ref_pegawai a INNER JOIN mst_satker b ON a.id_satker=b.id_satker WHERE a.nip='$id'");
				$peg 		= mysqli_fetch_array($load_peg_e);

		?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title"><b>EDIT DATA PEGAWAI</b></h2>
				</div>
				<div class="panel-body">
		        	<form name="pegawai" class="form-horizontal" id="form" method="post" action="log.pegawai.php">

						<div class="form-group">
							<label class="control-label col-sm-2" for="nip">NIP</label>
							<div class="col-sm-6">
								<input type="text" id="nip" class="form-control" name="nip" value="<?=$peg[nip];?>" placeholder="NIP Pegawai" required="">
								<input type="hidden" id="nip_lama" class="form-control" name="nip_lama" value="<?=$peg[nip];?>" placeholder="Username" required="">
								<input type="hidden" id="case" class="span4" name="case" value="edit" >
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="nama">Nama</label>
							<div class="col-sm-6">
								<input type="text" id="nama" class="form-control" value="<?=$peg[nama];?>" name="nama" placeholder="Nama Pegawai" required>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="satker">Satuan Kerja</label>
							<div class="col-sm-6">
								<select id="satker" name="satker" class="form-control" required>
									<option value="<?=$peg[id_satker];?>"><?php echo "$peg[nama_satker]"; ?></option>
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
							<label class="control-label col-sm-2" for="re-password">Pangkat Golongan</label>
							<div class="col-sm-6">
								<select id="gol" name="gol" class="form-control" required>
									<option value="<?=$peg[pangkat_gol];?>"><?php echo p_gol("$peg[pangkat_gol]"); ?></option>
									<option value="" >-- Pilih Pangkat dan Golongan --</option>
									<?php 
										$speg =1;
										for($i=1; $i<=17; $i++) {
											echo "<option value=$i>".p_gol($i)."</option>";
										}
									?>
									
								</select>
							</div>
						</div>
						
						<script>
							$('#gol').selectize({
								create: false,
								sortField: 'text'
							});
						</script>

						<div class="form-group">
							<label class="control-label col-sm-2" for="re-password">Status Kepegawaian</label>
							<div class="col-sm-6">
								<select id="status" name="status" class="form-control" required>
									<option value="<?=$peg[status_pegawai];?>"><?php echo status_peg("$peg[status_pegawai]"); ?></option>
									<option value="" >-- Pilih Status Kepegawaian --</option>
									<?php 
										$speg =1;
										for($i=1; $i<=4; $i++) {
											echo "<option value=$i>".status_peg($i)."</option>";
										}
									?>
									
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

		<?php
			} elseif ($_GET['act'] == "hapus") {
				$id 	= $_GET['id'];

				$load_peg_h 	= mysqli_query($db, "SELECT * FROM ref_pegawai a INNER JOIN mst_satker b ON a.id_satker=b.id_satker WHERE a.nip='$id'");
				$peg_h 		= mysqli_fetch_array($load_peg_h);
		?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title"><b>HAPUS DATA PEGAWAI</b></h2>
				</div>
				<div class="panel-body">

	            	<form name="user" class="form" id="form input" method="post" action="log.pegawai.php">
					  <fieldset>
					    <label><i class="fa fa-warning"></i> <strong>WARNING</strong><br>
					    <p>
					     Apakah anda yakin akan menghapus data Pegawai <strong><?php echo "$peg_h[nama]"; ?></strong>?</p>
					     <br>
					    </label>
					    	<input type="hidden" id="nama" class="span8" name="nama" value="<?=$peg_h['nama'];?>" placeholder="Username" required>
							<input type="hidden" id="id" class="span8" name="id" value="<?=$peg_h['nip'];?>" >
							<input type="hidden" id="case" class="span4" name="case" value="hapus" >
					    <button type="submit" class="btn btn-danger">Hapus</button> 
					    <a href="?page=admin&mod=pegawai" class="btn btn-primary">Batal</a>
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
<?php	# code...
}
?>

<?php
	} else {
		include "illegal_akses.php";
	}
?>