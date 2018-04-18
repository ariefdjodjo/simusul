<?php   
	

	if($akses_user['type_user']==1 || $akses_user['type_user']==2 || $akses_user['type_user']==3 ) {
		if (@$_GET["mod"]=="") {
		    include "data/usulan/depan.php";
		} elseif($_GET["mod"]=="add_usulan") {
	        include "data/usulan/add.usulan.php";
	    } elseif($_GET["mod"]=="data_usulan") {
	        include "data/usulan/data.php";
	    } elseif($_GET["mod"]=="view_usulan") {
	        include "data/usulan/view.php";
	    } elseif($_GET["mod"]=="edit_usulan") {
	        include "data/usulan/edit.php";
	    } elseif($_GET["mod"]=="hapus_usulan") {
	        include "data/usulan/hapus.php";
	    } elseif($_GET["mod"]=="rekap_usulan") {
	        include "data/usulan/rekap.php";
	    } elseif($_GET["mod"]=="verif_usulan") {
	        include "data/usulan/verif.php";
	    } elseif($_GET["mod"]=="usulan_satker") {
	        include "data/usulan/usulan_satker.php";
	    } elseif($_GET["mod"]=="batal_verif") {
	        include "data/usulan/batal_verif.php";
	    } 
	} else {
		header("location:?page=error");
	}
	

?>