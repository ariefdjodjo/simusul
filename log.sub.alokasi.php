<?php
	include "config/db.config.php";

	$case 	= $_POST['case'];

	if($case == "add") {
		$akun 	= $_POST['akun'];
		$jenis 	= $_POST['jenis'];
		$nama 	= $_POST['nama'];
		$sd 	= $_POST['sd'];
		
		$add 	= "INSERT INTO ref_sub_alokasi VALUES ('', '$akun', '$jenis', '$nama', '$sd')";
		if($hasil 	= mysqli_query($db, $add)) {
			header("location:index.php?page=admin&mod=sub_alokasi&act=&status=sukses");
		} else {
			header("location:index.php?page=admin&mod=sub_alokasi&act=add&error=gagal");
		}

	} elseif ($case=="edit") {
		$id 	= $_POST['id'];
		$akun 	= $_POST['akun'];
		$jenis 	= $_POST['jenis'];
		$nama 	= $_POST['nama'];
		$sd 	= $_POST['sd'];

		
		$edit 	= "UPDATE ref_sub_alokasi SET kd_akun='$akun', kd_jenis='$jenis', nama_sub_alokasi='$nama', sumber_dana='$sd' WHERE id_sub_alokasi='$id'";
		if($hasil 	= mysqli_query($db, $edit)) {
			header("location:index.php?page=admin&mod=sub_alokasi&act=&status=sukses");
		} else {
			header("location:index.php?page=admin&mod=sub_alokasi&act=edit&id=$id&error=gagal");
		}
		
	} elseif ($case=="hapus") {
		$id 		= $_POST['id'];
		$nama 	= $_POST['nama'];

		$delete 	= "DELETE FROM ref_sub_alokasi WHERE id_sub_alokasi='$id' AND nama_sub_alokasi='$nama'";
		if($hasil = mysqli_query($db, $delete)) {
			header("location:index.php?page=admin&mod=sub_alokasi&act=&status=sukses");
		} else {
			header("location:index.php?page=admin&mod=sub_alokasi&act=hapus&id=$id&error=gagal");
		}
	}
?>