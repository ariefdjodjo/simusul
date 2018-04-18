<?php
	$th 	= $_GET['th'];
?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h2 class="panel-title"><b>VERIFIKASI DATA USULAN</b></h2>
	</div>
	<div class="panel-body">

    	<form name="user" class="form" id="form input" method="post" action="log.usulan.php">
		  <fieldset>
		    <label><i class="fa fa-warning"></i> <strong>WARNING</strong><br>
		    <p>
		     Apakah anda yakin akan Mem-verifikasi data usulan Tahun <strong><?php echo "$th"; ?></strong>?<br>Setelah Verifikasi dilakukan, Satuan Kerja tidak dapat melakukan input Usulan<br></p>
		     <hr>
		    </label>
				<input type="hidden" id="tahun" class="span8" name="tahun" value="<?=$th;?>" >
				<input type="hidden" id="case" class="span4" name="case" value="verif" >
		    <button type="submit" class="btn btn-danger">Verifikasi</button> 
		    <a href="?page=usulan&mod=rekap_usulan&th=<?=$th;?>" class="btn btn-primary">Batal</a>

		  </fieldset>
		</form>
	</div>
</div>  