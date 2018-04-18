<?php
	include "config/db.config.php";

	$case 	= $_POST['case'];

	if($case == "add") {
		$nama 	= $_POST['nama'];
		$alamat = $_POST['alamat'];
		$telp 	= $_POST['telp'];
		$email 	= $_POST['email'];
		
		$add 	= "INSERT INTO mst_satker VALUES ('', '$nama', '$alamat', '$telp', '$email')";
		if($hasil 	= mysqli_query($db, $add)) {
			header("location:index.php?page=admin&mod=satker&act=&status=sukses");
		} else {
			header("location:index.php?page=admin&mod=satker&act=add&error=gagal");
		}

	} elseif ($case=="edit") {
		$id 	= $_POST['id'];
		$nama 	= $_POST['nama'];
		$alamat = $_POST['alamat'];
		$telp 	= $_POST['telp'];
		$email 	= $_POST['email'];

		
		$edit 	= "UPDATE mst_satker SET nama_satker='$nama', alamat_satker='$alamat', no_telp_satker='$telp', email_satker='$email' WHERE id_satker='$id'";
		if($hasil 	= mysqli_query($db, $edit)) {
			header("location:index.php?page=admin&mod=satker&act=&status=sukses");
		} else {
			header("location:index.php?page=admin&mod=satker&act=edit&id=$id&error=gagal");
		}
		
	} elseif ($case=="hapus") {
		$id 		= $_POST['id'];
		$nama 	= $_POST['nama'];

		$delete 	= "DELETE FROM mst_satker WHERE id_satker='$id' AND nama_satker='$nama'";
		if($hasil = mysqli_query($db, $delete)) {
			header("location:index.php?page=admin&mod=satker&act=&status=sukses");
		} else {
			header("location:index.php?page=admin&mod=satker&act=hapus&id=$id&error=gagal");
		}
	} elseif ($case=="edit_site") {
		$id 	= $_POST['id'];
		$nama 	= $_POST['nama'];
		$alamat = $_POST['alamat'];
		$telp 	= $_POST['telp'];
		$email 	= $_POST['email'];

		
		$edit 	= "UPDATE mst_satker SET nama_satker='$nama', alamat_satker='$alamat', no_telp_satker='$telp', email_satker='$email' WHERE id_satker='$id'";
		if($hasil 	= mysqli_query($db, $edit)) {
			header("location:index.php?page=site&act=profil&status=sukses");
		} else {
			header("location:index.php?page=site&act=edit_satker&id=$id&error=gagal");
		}
		
	} 
?>