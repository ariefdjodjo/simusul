<?php	# code...
		$id 	= $_GET['id'];

		$load_user_e 	= mysqli_query($db, "SELECT * FROM mst_user a INNER JOIN mst_satker b ON a.id_satker=b.id_satker WHERE a.id_user='$akses_user[id_user]'");
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
						<input type="text" id="username" class="form-control" name="username" value="<?=$user_e[username];?>" placeholder="Username" readonly>
						<input type="hidden" id="id" class="form-control" name="id" value="<?=$user_e[id_user];?>" placeholder="id" required="">
						<input type="hidden" id="case" class="span4" name="case" value="edit_pass" >
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2" for="password">Password</label>
					<div class="col-sm-6">
						<input type="password" id="password" class="form-control" name="password" value="<?=$user_e[4];?>" placeholder="Password" required>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2" for="re-password">Re-password</label>
					<div class="col-sm-6">
						<input type="password" id="repassword" class="form-control" name="repassword" value="<?=$user_e[re_pass];?>" placeholder="Re-Password" required>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2" for="nama">Nama User </label>
					<div class="col-sm-6">
						<input type="text" id="nama" class="form-control" name="nama" value="<?=$user_e[nama_user];?>" placeholder="Nama" required>
					</div>
				</div>
   				
   				<div class="form-group">
      				<div class="col-sm-2"></div>
					<div class="col-sm-6">
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
					</div>
				</div>	
			</form>
			</div>
		</div>