<?php   
	

	if($akses_user['type_user']==1 || $akses_user['type_user']==3 ) {
		if (@$_GET["mod"]=="") {
		    include "data/manajemen/depan.php";
		} elseif($_GET["mod"]=="manajemen_usulan") {
	        include "data/manajemen/m.usulan.php";
	    } elseif($_GET["mod"]=="usulan_satker") {
	        include "data/manajemen/usulan_satker.php";
	    } 
	} else {
		header("location:?page=error");
	}
	

?>