<?php 
	if($aktif_th['status']==2 && $akses_user['type_user']==2) {
		$load_usulan = mysqli_query($db, "SELECT sum(v_usulan) AS verif FROM usulan	WHERE id_satker='$akses_user[id_satker]' AND tahun='$aktif_th[tahun]'");
		$usulan = mysqli_fetch_array($load_usulan);
		if($usulan['verif'] > 0) {
?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title"><b>TAMBAH USULAN</b></h2>
				</div>
				<div class="panel-body">
					<h3>Tidak dapat menambah usulan dikarenakan seluruh data telah di verifikasi.</h3>
				</div>
			</div>
<?php
		} else {
?>

			<script type="text/javascript">
				var htmlobjek;
					$(document).ready(function(){
							//apabila terjadi event onchange terhadap object <select id=propinsi>
						$("#jenis").change(function(){
						var addusulan = $("#jenis").val();
							$.ajax({
			    				url: "config/form.usulan.php",
			    				data: "jenis="+addusulan,
			    				cache: false,
			    				success: function(msg){
			        			//jika data sukses diambil dari server kita tampilkan
			        			//di <select id=kota>
			        			$("#addusulan").html(msg);
			    				}
							});
							
							});
					});	
			</script>

			<?php 
				$load_satker 	= mysqli_query($db, "SELECT * FROM mst_satker WHERE id_satker='$akses_user[id_satker]'");
				$satker 		= mysqli_fetch_array($load_satker);
			?>

			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title"><b>TAMBAH USULAN</b></h2>
				</div>
				<div class="panel-body">
			    	<form name="user" class="form-horizontal" id="form" method="post" action="log.usulan.php">
			    		<div class="form-group">
							<label class="control-label col-sm-2" for="tahun">Tahun Anggaran</label>
							<div class="col-sm-3">
								<input type="text" id="tahun" class="form-control" name="tahun" value="<?=$aktif_th[tahun];?>" readonly="" required>
							</div>
						</div>
			    		<div class="form-group">
							<label class="control-label col-sm-2" for="nm">Nama Satker</label>
							<div class="col-sm-6">
								<input type="text" id="nm" class="form-control" name="nm" value="<?=$satker[nama_satker];?>" placeholder="Nama Satker" required="" readonly="">
								<input type="hidden" id="satker" class="form-control" name="satker" value="<?=$satker[id_satker];?>">
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
						
						<div id="addusulan"></div>
						
							
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
		}
	}
?>