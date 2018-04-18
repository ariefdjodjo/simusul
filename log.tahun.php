<?php
	include "config/db.config.php";

	$case 	= $_POST['case'];

	if($case == "add") {
		$tahun 	= $_POST['tahun'];

		$load_tahun 	= mysqli_query($db, "SELECT * FROM ref_tahun WHERE tahun='$tahun'");
		$d_tahun 		= mysqli_num_rows($load_tahun);
		if($d_tahun['tahun']==1) {
			header("location:index.php?page=admin&mod=tahun&act=add&error=tahun_sama");
		} else {
			$add 	= "INSERT INTO ref_tahun VALUES ('$tahun', '0')";
			if($hasil 	= mysqli_query($db, $add)) {
				header("location:index.php?page=admin&mod=tahun&act=&status=sukses");
			} else {
				header("location:index.php?page=admin&mod=tahun&act=add&error=gagal");
			}
		}
	} elseif ($case=="edit") {
		$tahun 	= $_POST['tahun'];
		$tahun_e 	= $_POST['tahun_e'];

		$edit 	= "UPDATE ref_tahun SET tahun='$tahun' WHERE tahun='$tahun_e'";
		if($hasil 	= mysqli_query($db, $edit)) {
			header("location:index.php?page=admin&mod=tahun&act=&status=sukses");
		} else {
			header("location:index.php?page=admin&mod=tahun&act=edit&id=$tahun_e&error=gagal");
		}
	} elseif ($case=="update") {
		$tahun 	= $_POST['tahun'];
		$status = $_POST['status'];
		$kosongkan 	= mysqli_query($db, "UPDATE ref_tahun SET status='0'");
		$edit 	= "UPDATE ref_tahun SET status='$status' WHERE tahun='$tahun'";
		if($hasil 	= mysqli_query($db, $edit)) {
			header("location:index.php?page=admin&mod=tahun&act=&status=sukses");
		} else {
			header("location:index.php?page=admin&mod=tahun&act=edit&id=$tahun_e&error=gagal");
		}
	} elseif ($case=="hapus") {
		$tahun 		= $_POST['tahun'];

		$delete 	= "DELETE FROM ref_tahun WHERE tahun='$tahun'";
		if($hasil = mysqli_query($db, $delete)) {
			header("location:index.php?page=admin&mod=tahun&act=&status=sukses");
		} else {
			header("location:index.php?page=admin&mod=tahun&act=hapus&id=$tahun&error=gagal");
		}
	}
?>