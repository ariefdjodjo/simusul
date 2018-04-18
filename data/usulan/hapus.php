<?php
	$id 	= $_GET['id'];

	$load_usulan 	= mysqli_query($db, "SELECT * FROM usulan WHERE id_usulan='$id'");
	$usul 		= mysqli_fetch_array($load_usulan);
?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h2 class="panel-title"><b>HAPUS DATA USULAN</b></h2>
	</div>
	<div class="panel-body">

    	<form name="user" class="form" id="form input" method="post" action="log.usulan.php">
		  <fieldset>
		    <label><i class="fa fa-warning"></i> <strong>WARNING</strong><br>
		    <p>
		     Apakah anda yakin akan menghapus data Usulan <strong><?php echo "$usul[nama_usulan]"; ?></strong>?</p>
		     <br>
		    </label>
		    	<input type="hidden" id="nama" class="span8" name="nama" value="<?=$usul['nama_usulan'];?>" placeholder="nama" required>
				<input type="hidden" id="id" class="span8" name="id" value="<?=$usul['id_usulan'];?>" >
				<input type="hidden" id="tahun" class="span8" name="tahun" value="<?=$usul['tahun'];?>" >
				<input type="hidden" id="case" class="span4" name="case" value="hapus" >
		    <button type="submit" class="btn btn-danger">Hapus</button> 
		    <a href="?page=usulan&mod=data_usulan&th=<?=$usul[tahun];?>" class="btn btn-primary">Batal</a>
		  </fieldset>
		</form>
	</div>
</div>  