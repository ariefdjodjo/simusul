<?php
	session_start();

	//setting database
	$host		= "sql12.freemysqlhosting.net";
	$userdb 	= "sql12244694";
	$passdb 	= "ui6yHff6fc";
	$database 	= "sql12244694";

	$db 	= mysqli_connect($host, $userdb, $passdb, $database);

	if($db){
	echo "koneksi host berhasil.<br/>";
	}else{
	echo "koneksi gagal.<br/>";
}

	//setting hak akses
	$load_user 	= mysqli_query($db, "SELECT * FROM mst_user a INNER JOIN mst_satker b ON a.id_satker=b.id_satker 
		WHERE a.username='$_SESSION[ID]' AND a.pass='$_SESSION[PASS]'");
	$akses_user	= mysqli_fetch_array($load_user);

	//setting tahun anggaran
	$load_aktif_th 	= mysqli_query($db, "SELECT * FROM ref_tahun WHERE status>0");
	$aktif_th 		= mysqli_fetch_array($load_aktif_th);

	//fungsi type_user
	function type($tipe) {
		switch ($tipe) {
			case 1:
				return "Administrator";
				break;
			case 2:
				return "Satuan Kerja";
				break;
			case 3:
				return "Manajemen";
				break;
		}
	}

	//fungsi pangkat golongan
	

	//fungsi status pegawai
	function status_peg($status) {
		switch ($status) {
			case 1:
				return "PNS";
				break;
			case 2:
				return "Pegawai Tetap BLU";
				break;
			case 3:
				return "Pegawai Tidak Tetap BLU";
				break;
			case 4:
				return "Pegawai Kontrak";
				break;
		}
	}

	//fungsi pangkat dang golongan
	function p_gol($gol) {
		switch ($gol) {
			case 1:
				return "Juru Muda, I/a";
				break;
			case 2:
				return "Juru Muda Tk I, I/b";
				break;

			case 3:
				return "Juru, I/c";
				break;

			case 4:
				return "Juru Tk I, I/d";
				break;

			case 5:
				return "Pengatur Muda, II/a";
				break;

			case 6:
				return "pengatur Muda Tk I, II/b";
				break;

			case 7:
				return "Pengatur, II/c";
				break;

			case 8:
				return "Pengatur Tk I, II/d";
				break;

			case 9:
				return "Penata Muda, III/a";
				break;

			case 10:
				return "Penata Muda Tk I, III/b";
				break;

			case 11:
				return "Penata, III/c";
				break;

			case 12:
				return "Penata Tk I, III/d";
				break;

			case 13:
				return "Pembina, IV/a";
				break;

			case 14:
				return "Pembina Tk I, IV/b";
				break;

			case 15:
				return "Pembina Utama Muda, IV/c";
				break;

			case 16:
				return "Pembina Utama Madya, IV/d";
				break;

			case 17:
				return "Pembina Utama, IV/e";
				break;
		}
	}

	//fungsi pangkat dang golongan
	function jenis($jenis) {
		switch ($jenis) {
			case 1:
				return "Belanja Gaji";
				break;
			case 2:
				return "Belanja Barang Operasional";
				break;
			case 3:
				return "Belanja Jasa";
				break;
			case 4:
				return "Belanja Pemeliharaan";
				break;
			case 5:
				return "Pengembangan SDM";
				break;
			case 6:
				return "Belanja Investasi";
				break;
		}
	}
?>
