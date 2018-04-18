<?php   
		if (@$_GET["act"]=="profil") {
		    include "data/site/profile.php";
		} elseif($_GET["act"]=="user_profil") {
	        include "data/site/user_profile.php";
	    } elseif($_GET["act"]=="ubah_pass") {
	        include "data/site/ubah_password.php";
	    } elseif($_GET["act"]=="edit_satker") {
	        include "data/site/edit_satker.php";
	    } 

?>