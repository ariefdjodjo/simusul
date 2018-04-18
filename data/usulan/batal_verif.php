<?php
	$th 	= $_GET['th'];
	$act 	= $_GET['id'];
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
		     Apakah anda yakin akan Membataklan verifikasi data usulan Tahun <strong><?php echo "$th"; ?></strong>?<br>Setelah Verifikasi dilakukan, Satuan Kerja tidak dapat melakukan input Usulan<br></p>
		     <hr>
		    </label>
				<input type="hidden" id="tahun" class="span8" name="tahun" value="<?=$th;?>" >
				<input type="hidden" id="act" class="span8" name="act" value="<?=$act;?>" >
				<input type="hidden" id="case" class="span4" name="case" value="batal_verif" >
		    <button type="submit" class="btn btn-danger">Batalkan Verifikasi</button> 

		  </fieldset>
		</form>
	</div>
</div>  