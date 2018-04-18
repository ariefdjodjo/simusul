<?php
	include "config/db.config.php";

	$case 	= $_POST['case'];

	if($case == "add") {
		$tahun 		= $_POST['tahun'];
		$satker 	= $_POST['satker'];
		$alokasi 	= $_POST['alokasi'];
		$nama 		= $_POST['nama'];
		$spek 		= $_POST['spek'];
		$qty 		= $_POST['qty'];
		$satuan 	= $_POST['satuan'];
		$harga 		= $_POST['harga'];
		$prioritas 	= $_POST['prioritas'];
		//menentukan tanggal input
		$jam 			= date("Y-m-d");

		$add 	= "INSERT INTO usulan VALUES ('', '$jam', '$tahun', '$satker', '$alokasi', '$nama', '$spek', '$qty', '$satuan', '$harga','0', '$prioritas')";
		if($hasil 	= mysqli_query($db, $add)) {
			header("location:index.php?page=usulan&mod=data_usulan&th=".$tahun."&status=sukses");
		} else {
			header("location:index.php?page=usulan&mod=add_usulan&error=gagal");
		}
	

	} elseif ($case=="edit") {
		$id 		= $_POST['id'];
		$tahun 		= $_POST['tahun'];
		$satker 	= $_POST['satker'];
		$alokasi 	= $_POST['alokasi'];
		$nama 		= $_POST['nama'];
		$spek 		= $_POST['spek'];
		$qty 		= $_POST['qty'];
		$satuan 	= $_POST['satuan'];
		$harga 		= $_POST['harga'];
		$prioritas 	= $_POST['prioritas'];
		//menentukan tanggal input
		$jam 			= date("Y-m-d");

		$edit 	= "UPDATE usulan SET id_sub_alokasi='$alokasi', nama_usulan='$nama', spesifikasi_usulan='$spek', qty_usulan='$qty',
			satuan_usulan='$satuan', harga_usulan='$harga', prioritas_usulan='$prioritas' WHERE id_usulan='$id'";
		if($hasil 	= mysqli_query($db, $edit)) {
			header("location:index.php?page=usulan&mod=data_usulan&th=$tahun&status=sukses");
		} else {
			header("location:index.php?page=usulan&mod=edit_usulan&id=$id&error=gagal");
		}

		
	} elseif ($case=="hapus") {
		$id 		= $_POST['id'];
		$nama 		= $_POST['nama'];
		$tahun 		= $_POST['tahun'];

		$delete 	= "DELETE FROM usulan WHERE id_usulan='$id' AND nama_usulan='$nama'";
		if($hasil = mysqli_query($db, $delete)) {
			header("location:index.php?page=usulan&mod=data_usulan&th=$tahun&status=sukses");
		} else {
			header("location:index.php?page=usulan&mod=hapus_usulan&id=$id&error=gagal");
		}
	} elseif ($case=="verif") {
		$tahun 		= $_POST['tahun'];

		$verif 	= "UPDATE usulan SET v_usulan='1' WHERE tahun='$tahun' AND id_satker='$akses_user[id_satker]'";
		if($hasil = mysqli_query($db, $verif)) {
			header("location:index.php?page=usulan&mod=rekap_usulan&status=sukses");
		} else {
			header("location:index.php?page=usulan&mod=verif_usulan&th=$tahun&error=gagal");
		}
	} elseif ($case=="batal_verif") {
		$tahun 		= $_POST['tahun'];
		$act 		= $_POST['act'];

		$verif 	= "UPDATE usulan SET v_usulan='0' WHERE tahun='$tahun' AND id_satker='$act'";
		if($hasil = mysqli_query($db, $verif)) {
			header("location:index.php?page=usulan&mod=rekap_usulan&act=$act&status=sukses");
		} else {
			header("location:index.php?page=usulan&mod=rekap_usulan&act=$act&error=gagal");
		}
	}
?>