<?php
	include "config/db.config.php";

	$case 	= $_POST['case'];

	if($case == "add") {
		$username 	= $_POST['username'];
		$password 	= $_POST['password'];
		$re_pass 	= $_POST['repassword'];
		$type 		= $_POST['type'];
		$nama 		= $_POST['nama'];
		$satker 	= $_POST['satker'];

		if($password==$re_pass) {
			$md5 	= md5($password);
		} else {
			header("location:index.php?page=admin&mod=user&act=add&error=password");
		}
		
		$load_d_user  	= mysqli_query($db, "SELECT * FROM mst_user WHERE username='$username'");
		$d_user 		= mysqli_fetch_array($load_d_user);

		if($username == $d_user['username']) {
			header("location:index.php?page=admin&mod=user&act=add&error=username");
		} else {
			$add 	= "INSERT INTO mst_user VALUES ('', '$satker', '$username', '$md5', '$re_pass', '$nama', '$type')";
			if($hasil 	= mysqli_query($db, $add)) {
				header("location:index.php?page=admin&mod=user&act=&status=sukses");
			} else {
				header("location:index.php?page=admin&mod=user&act=add&error=gagal");
			}
		}
	} elseif ($case=="edit") {
		$id 		= $_POST['id'];
		$username 	= $_POST['username'];
		$password 	= $_POST['password'];
		$re_pass 	= $_POST['repassword'];
		$type 		= $_POST['type'];
		$nama 		= $_POST['nama'];
		$satker 	= $_POST['satker'];

		if($password==$re_pass) {
			$md5 	= md5($password);
		} else {
			header("location:index.php?page=admin&mod=user&act=edit&id=$id&error=password");
		}

		$load_e_user  	= mysqli_query($db, "SELECT * FROM mst_user WHERE username='$username'");
		$e_user 		= mysqli_fetch_array($load_e_user);


		if($username == $e_user['username'] && $id != $e_user['id_user']) {
			header("location:index.php?page=admin&mod=user&act=edit&id=$id&error=username");
		} else {
			$edit 	= "UPDATE mst_user SET id_satker='$satker', username='$username', pass='$md5', re_pass='$re_pass', nama_user='$nama', type_user='$type' WHERE id_user='$id'";
			if($hasil 	= mysqli_query($db, $edit)) {
				header("location:index.php?page=admin&mod=user&act=&status=sukses");
			} else {
				header("location:index.php?page=admin&mod=user&act=edit&id=$id&error=gagal");
			}
		}
	} elseif ($case=="hapus") {
		$id 		= $_POST['id'];
		$username 	= $_POST['username'];

		$delete 	= "DELETE FROM mst_user WHERE id_user='$id' AND username='$username'";
		if($hasil = mysqli_query($db, $delete)) {
			header("location:index.php?page=admin&mod=user&act=&status=sukses");
		} else {
			header("location:index.php?page=admin&mod=user&act=hapus&id=$id&error=gagal");
		}
	} elseif ($case=="edit_pass") {
		$id 		= $_POST['id'];
		$password 	= $_POST['password'];
		$re_pass 	= $_POST['repassword'];
		$nama 		= $_POST['nama'];

		if($password==$re_pass) {
			$md5 	= md5($password);
		} else {
			header("location:index.php?page=admin&mod=user&act=edit&id=$id&error=password");
		}

		$edit 	= "UPDATE mst_user SET pass='$md5', re_pass='$re_pass', nama_user='$nama' WHERE id_user='$id'";
		if($hasil 	= mysqli_query($db, $edit)) {
			header("location:index.php?page=&status=sukses");
		} else {
			header("location:index.php?page=site&act=ubah_pass&error=gagal");
		}
	} 
?>