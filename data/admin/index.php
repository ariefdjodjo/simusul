<?php   
	

	if($akses_user['type_user']==1) {
		if (@$_GET["mod"]=="") {
		    include "data/admin/depan.php";
		} elseif($_GET["mod"]=="user") {
	        include "data/admin/user.php";
	    } elseif($_GET["mod"]=="satker") {
	        include "data/admin/satker.php";
	    } elseif($_GET["mod"]=="pegawai") {
	        include "data/admin/pegawai.php";
	    } elseif($_GET["mod"]=="tahun") {
	        include "data/admin/tahun.php";
	    } elseif($_GET["mod"]=="sub_alokasi") {
	        include "data/admin/sub_alokasi.php";
	    } 
	} else {
		header("location:?page=error");
	}
	

?>