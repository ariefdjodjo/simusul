<?php
	include "config/db.config.php";

	$case 	= $_POST['case'];

	if($case == "add") {
		$nip 	= $_POST['nip'];
		$nama 	= $_POST['nama'];
		$satker = $_POST['satker'];
		$gol 	= $_POST['gol'];
		$status = $_POST['status'];

		$load_peg 	= mysqli_query($db, "SELECT * FROM ref_pegawai WHERE nip='$nip'");
		$peg 		= mysqli_num_rows($load_peg);
		if($peg['nim']==1) {
			header("location:index.php?page=admin&mod=pegawai&act=add&error=nip_sama");
		} else {
			$add 	= "INSERT INTO ref_pegawai VALUES ('$nip', '$satker', '$nama', '$gol', '$status')";
			if($hasil 	= mysqli_query($db, $add)) {
				header("location:index.php?page=admin&mod=pegawai&act=&status=sukses");
			} else {
				header("location:index.php?page=admin&mod=pegawai&act=add&error=gagal");
			}
		}
		

	} elseif ($case=="edit") {
		$nip_l 	= $_POST['nip_lama'];
		$nip 	= $_POST['nip'];
		$nama 	= $_POST['nama'];
		$satker = $_POST['satker'];
		$gol 	= $_POST['gol'];
		$status = $_POST['status'];

		if($nip_l == $nip) {
			$edit 	= "UPDATE ref_pegawai SET nama='$nama', id_satker='$satker', pangkat_gol='$gol', status_pegawai='$status' WHERE nip='$nip'";
			if($hasil 	= mysqli_query($db, $edit)) {
				header("location:index.php?page=admin&mod=pegawai&act=&status=sukses");
			} else {
				header("location:index.php?page=admin&mod=pegawai&act=edit&id=$nip&error=gagal");
			}
		} else {
			$load_edit_nip 	= mysqli_query($db, "SELECT count(nip) AS jum_nim FROM ref_pegawai WHERE nip='$nip'");
			$edit_nip 		= mysqli_fetch_array($load_edit_nip);

			if($edit_nip['jum_nim']==0) {
				$edit 	= "UPDATE ref_pegawai SET nip='$nip', nama='$nama', id_satker='$satker', pangkat_gol='$gol', status_pegawai='$status' WHERE nip='$nip_l'";
				if($hasil 	= mysqli_query($db, $edit)) {
					header("location:index.php?page=admin&mod=pegawai&act=&status=sukses");
				} else {
					header("location:index.php?page=admin&mod=pegawai&act=edit&id=$nip&error=gagal");
				}
			} else {
				header("location:index.php?page=admin&mod=pegawai&act=edit&id=$nip_lama&error=nip_sama");
			}
		}
		
		
	} elseif ($case=="hapus") {
		$id 		= $_POST['id'];
		$nama 		= $_POST['nama'];

		$delete 	= "DELETE FROM ref_pegawai WHERE nip='$id' AND nama='$nama'";
		if($hasil = mysqli_query($db, $delete)) {
			header("location:index.php?page=admin&mod=pegawai&act=&status=sukses");
		} else {
			header("location:index.php?page=admin&mod=pegawai&act=hapus&id=$nip_lama&error=gagal");
		}
	}
?>