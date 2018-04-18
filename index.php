<?php 
    error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
    session_start();
    include "config/db.config.php";
    include "config/tanggal.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="template/sjt.ico">

    <title>Sistem Informasi Manajemen Usulan</title>
	
	<!-- Bootstrap core CSS -->
    <script src="template/jquery.min.js"></script>
	<link href="template/bootstrap.css" rel="stylesheet">
    <link href="template/bootstrap3/css/sticky-footer.css" rel="stylesheet">
    
    
    <!-- Bootstrap t
    <link href="template/bootstrap3/css/bootstrap-theme.min.css" rel="stylesheet">

    <link href="template/bootstrap3/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">heme -->


        <!-- selectize -->
    <script src="template/selectize/jquery-1.10.2.min.js"></script>
    <script language="JavaScript" src="template/selectize/validjs.js" type="text/javascript"></script>
    <link rel="stylesheet" href="template/selectize/selectize.bootstrap3.css" data-theme="bootstrap3">
    <script src="template/selectize/selectize.js"></script>
    <script src="template/selectize/main.js"></script>

    <!-- data table -->
    <link rel="stylesheet" type="text/css" href="template/DataTables-1.10.16/css/dataTables.bootstrap.min.css">
    <script type="text/javascript" language="javascript" src="template/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="template/DataTables-1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" class="init">
		$(document).ready(function() {
			$('#example').DataTable();
		} );
	</script>

	    <!-- fortawasome -->
    <link href="template/fa44/css/font-awesome.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <script src="template/bootstrap3/assets/js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>
  	<!-- Fixed navbar -->
  	<?php 
  		include "template/header.php"; 
  	?>
    
    

    <!-- untuk halaman isi -->
    <div class="container"><br><br><br>
	    <?php 
	    	if( !isset($_SESSION['ID']) || !isset($_SESSION['PASS']) ){
      			header("location:signin.php"); 
    		} else {
	    ?>
	    <div class="col-sm-2">
	    	<div class="list-group">
	    		<?php 
	    			if(@$_GET["page"]=="profile") {
	    		?>
		    			<li class="list-group-item active" disabled>MENU PROFIL</li>
						<a href="#" class="list-group-item">Data Profil</a>
						<a href="#" class="list-group-item">Ubah Username</a>
	    		<?php
	    			} elseif ($_GET["page"]=="admin" && $akses_user['type_user']==1) {
	    		?>
		    			<li class="list-group-item active" disabled>MASTER DATA</li>
						<a href="?page=admin&mod=user" class="list-group-item"><i class="fa fa-user"></i> User Akses</a>
						<a href="?page=admin&mod=satker" class="list-group-item"><i class="fa fa-building"></i> Data Satuan Kerja</a>
						<a href="?page=admin&mod=pegawai" class="list-group-item"><i class="fa fa-users"></i> Data Pegawai</a>
						<a href="?page=admin&mod=tahun" class="list-group-item"><i class="fa fa-dollar"></i> Tahun Anggaran</a>
						<a href="?page=admin&mod=sub_alokasi" class="list-group-item"><i class="fa fa-leaf"></i> Sub Alokasi</a>
	    		<?php	
	    			} elseif ($_GET["page"]=="usulan") {
	    		?>
	    				<li class="list-group-item active" disabled>Sidebar Usulan</li>
	    				<?php 
	    					if($aktif_th['status']==2 && $akses_user['type_user']==2) {
	    						echo "<a href=?page=usulan&mod=add_usulan class=list-group-item><i class='fa fa-plus'></i> Tambah Usulan</a>";
	    					}
	    				?>
						
						<a href="?page=usulan&mod=data_usulan" class="list-group-item"><i class="fa fa-book"></i> Data Usulan</a>
						<?php 
							if($akses_user['type_user']!=3) {
								echo "<a href=?page=usulan&mod=rekap_usulan class=list-group-item><i class='fa fa-print'></i> Verifikasi dan Cetak</a>";
							}
						?>
				<?php	
	    			} elseif ($_GET["page"]=="manajemen") {
	    		?>
	    				<li class="list-group-item active" disabled>Tahun Usulan</li>
	    				<?php 
	    					$load_tahun = mysqli_query($db, "SELECT * FROM ref_tahun");
	    					while($tahun = mysqli_fetch_array($load_tahun)) {
	    						echo "<a href=?page=manajemen&mod=manajemen_usulan&th=".$tahun['tahun']." class=list-group-item>Tahun ".$tahun['tahun']."</a>";
	    					}
	    				?>								
	    		<?php	
	    			} elseif ($_GET['page']=="" || $_GET['page']=="site") {
	    		?>
	    			<li class="list-group-item active" disabled>MENU</li>
						<a href="?page=site&act=profil" class="list-group-item">Profil Satker</a>
						<a href="?page=site&act=user_profil" class="list-group-item">Profil User</a>
						<a href="?page=site&act=ubah_pass" class="list-group-item">Ubah Password</a>
	    		<?php 
	    			}
	    		?>
				
			</div>
	    </div>

	    <div class="col-sm-10">
			<?php   
	            if (@$_GET["page"]=="") {
	                include "data/site/depan.php";
	            } elseif($_GET["page"]=="admin") {
	                include "data/admin/index.php";
	            } elseif($_GET["page"]=="usulan") {
	                include "data/usulan/index.php";
	            } elseif($_GET["page"]=="manajemen") {
	                include "data/manajemen/index.php";
	            } elseif($_GET["page"]=="error") {
	                include "data/site/error.php";
	            } elseif($_GET["page"]=="logout") {
	                include "logout.php";
	            } elseif($_GET["page"]=="site") {
	                include "data/site/index.php";
	            } 

	        ?>
	    </div>
	<?php 
		}
	?>
    </div> <!-- /container -->

</body>

<footer class="footer">
	<div class="container">
		&copy; Sistem Informasi Manajemen Rencana Usulan RS <br><img src="template/chrome.png" width="30px" height="30px">
        <b>Best View From Google Chrome</b>
	</div>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="template/bootstrap3/js/bootstrap.min.js"></script>
<script src="template/bootstrap3/assets/js/docs.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="template/bootstrap3/assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="template/bootstrap3/assets/js/bootstrap-transition.js"></script>
<script src="template/bootstrap3/assets/js/bootstrap-alert.js"></script>
<script src="template/bootstrap3/assets/js/bootstrap-modal.js"></script>
<script src="template/bootstrap3/assets/js/bootstrap-dropdown.js"></script>
<script src="template/bootstrap3/assets/js/bootstrap-scrollspy.js"></script>
<script src="template/bootstrap3/assets/js/bootstrap-tab.js"></script>
<script src="template/bootstrap3/assets/js/bootstrap-button.js"></script>
<script src="template/bootstrap3/assets/js/bootstrap-collapse.js"></script>
<script src="template/bootstrap3/assets/js/bootstrap-datepicker.js"></script>
</html>
