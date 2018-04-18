-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2017 at 01:24 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projek_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_satker`
--

CREATE TABLE IF NOT EXISTS `mst_satker` (
  `id_satker` int(3) NOT NULL AUTO_INCREMENT,
  `nama_satker` varchar(50) NOT NULL,
  `alamat_satker` varchar(100) NOT NULL,
  `no_telp_satker` varchar(15) NOT NULL,
  `email_satker` varchar(50) NOT NULL,
  PRIMARY KEY (`id_satker`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `mst_satker`
--

INSERT INTO `mst_satker` (`id_satker`, `nama_satker`, `alamat_satker`, `no_telp_satker`, `email_satker`) VALUES
(1, 'Direktur Utama', '-', '-', '-'),
(2, 'Direktur Medik dan Keperawatan', '-', '-', '-'),
(3, 'Direktur Umum dan Operasional', '-', '-', '-'),
(4, 'Direktur Sdm dan Pendidikan', '-', '-', '-'),
(5, 'Direktur Keuangan', '-', '-', '-'),
(6, 'Satuan Pemeriksaan Intern (SPI)', '-', '-', '-'),
(7, 'Bidang Pelayanan Medik', '-', '-', '-'),
(8, 'Bidang Pelayanan Keperawatan', '-', '-', '-'),
(9, 'Bidang Penunjang dan Sarana', '-', '-', '-'),
(10, 'Bagian Sumber Daya Manusia', '-', '-', '-'),
(11, 'Bagian Pendidikan dan Penelitian', '-', '-', '-'),
(12, 'Bagian Penyusunan dan Evaluasi Anggaran', '-', 'Ekstensi 228/25', 'alitjogja@gmail.com'),
(13, 'Bagian Perbendaharaan dan Mobilisasi Dana', '-', '-', '-'),
(14, 'Bagian Akuntansi dan Verifikasi', '-', '-', '-'),
(15, 'Bagian Umum', '-', '-', '-'),
(16, 'Bagian Perencanaan dan Evaluasi', '-', '-', '-'),
(17, 'Bagian Hukum dan Hubungan Masyarakat', '-', '-', '-'),
(18, 'Instalasi Gawat Darurat', '-', '-', '-'),
(19, 'Instalasi Rawat Jalan', '-', '-', '-'),
(20, 'IRNA I', '-', '-', '-'),
(21, 'Instalasi Kesehatan Anak', '-', '-', '-'),
(22, 'IRNA III (Wijaya Kusuma)', '-', '-', '-'),
(23, 'IRNA IV (Teratai)', '-', '-', '-'),
(24, 'IRNA V (Cenderawasih)', '-', '-', '-'),
(25, 'IRNA VI (Amarta)', '-', '-', '-'),
(26, 'Instalasi Kanker Terpadu (TULIP)', '-', '-', '-'),
(27, 'Instalasi Maternal Perinatal', '-', '-', '-'),
(28, 'NICU (Unit Rawat Intensif Bayi Baru Lahir)', '-', '-', '-'),
(29, 'Instalasi Rawat Intensif', '-', '-', '-'),
(30, 'Instalasi Rawat Jantung', '-', '-', '-'),
(31, 'Instalasi Anesthesi dan Reanimasi', '-', '-', '-'),
(32, 'Instalasi Bedah Sentral', '-', '-', '-'),
(33, 'One Day Care (ODC)', '-', '-', '-'),
(34, 'Instalasi Kesehatan Reproduksi', '-', '-', '-'),
(35, 'Instalasi Dialisis', '-', '-', '-'),
(36, 'Instalasi Rehabilitasi Medik', '-', '-', '-'),
(37, 'Instalasi Kedokteran Forensik', '-', '-', '-'),
(38, 'Instalasi Farmasi', '-', '-', '-'),
(39, 'Instalasi Radiologi', '-', '-', '-'),
(40, 'Instalasi Patologi Anatomi', '-', '-', '-'),
(41, 'Instalasi Laboratorium Klinik', '-', '-', '-'),
(42, 'Unit Pelayanan Transfusi Darah', '-', '-', '-'),
(43, 'IP2KSDM', '-', '-', '-'),
(44, 'Instalasi Catatan Medik', '-', '-', '-'),
(45, 'Instalasi Gizi', '-', '-', '-'),
(46, 'Instalasi Sanitasi Lingkungan Rumah Sakit', '-', '-', '-'),
(47, 'IPSRS', '-', '-', '-'),
(48, 'IP2S', '-', '-', '-'),
(49, 'Instalasi Pengamanan dan Penertiban Rumah Sakit', '-', '-', '-'),
(50, 'Instalasi Binatu', '-', '-', '-'),
(51, 'Instalasi Rawat Intensif Anak dan Luka Bakar (PICU', '-', '-', '-'),
(52, 'Instalasi Penjaminan', '-', '-', '-'),
(53, 'Komite Medik', '-', '-', '-'),
(54, 'Komite Keperawatan', '-', '-', '-'),
(55, 'Komite Etik dan Hukum', '-', '-', '-'),
(56, 'KSM Kesehatan Anak', '-', '-', '-'),
(57, 'KSM Anesthesi dan Reanimasi', '-', '-', '-'),
(58, 'KSM Jantung', '-', '-', '-'),
(59, 'KSM Radiologi', '-', '-', '-'),
(60, 'KSM Rehabilitasi Medik', '-', '-', '-'),
(61, 'KSM Patologi Kulit', '-', '-', '-'),
(62, 'KSM Patologi Anatomi', '-', '-', '-'),
(63, 'KSM Kedokteran Forensik', '-', '-', '-'),
(64, 'KSM Bedah', '-', '-', '-'),
(65, 'KSM Sedah Saraf', '-', '-', '-'),
(66, 'KSM Bedah Orthopedi', '-', '-', '-'),
(67, 'KSM Bedah Mulut', '-', '-', '-'),
(68, 'KSM Bedah Urologi', '-', '-', '-'),
(69, 'KSM Kebidanan dan Kandungan', '-', '-', '-'),
(70, 'KSM Penyakit Dalam', '-', '-', '-'),
(71, 'KSM Paru', '-', '-', '-'),
(72, 'KSM Geriatri', '-', '-', '-'),
(73, 'KSM Jiwa', '-', '-', '-'),
(74, 'KSM Saraf', '-', '-', '-'),
(75, 'KSM Kulit dan Kelamin', '-', '-', '-'),
(76, 'KSM Telinga dan Tenggorokan', '-', '-', '-'),
(77, 'KSM Mata', '-', '-', '-'),
(78, 'KSM Gigi dan Mulut', '-', '-', '-'),
(79, 'KSM Dokter Umum', '-', '-', '-'),
(80, 'Unit Peningkatan Mutu', '-', '-', '-'),
(81, 'Unit Layanan Pengadaan Barang/Jasa (ULPBJ Pengadaa', '-', '-', '-'),
(82, 'Unit Layanan Penerimaan Barang/Jasa (ULPBJ Penerim', '-', '-', '-'),
(83, 'Unit Keselamatan & Kesehatan Kerja (UK3)', '-', '-', '-'),
(84, 'Unit Stroke', '-', '-', '-'),
(85, 'Unit Home Care', '-', '-', '-'),
(86, 'UPKT-PA', '-', '-', '-'),
(87, 'Instalasi Teknologi dan Informasi', '-', '-', '-'),
(88, 'PPK APBN-PNBP', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE IF NOT EXISTS `mst_user` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `id_satker` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `re_pass` varchar(15) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `type_user` varchar(15) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_satker` (`id_satker`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`id_user`, `id_satker`, `username`, `pass`, `re_pass`, `nama_user`, `type_user`) VALUES
(1, 14, 'djodjo', '44b100c0f0a8322756d4d640a206fd7d', 'djodjo', 'Arief Gunawan', '1'),
(3, 14, 'dwi', '7aa2602c588c05a93baf10128861aeb9', 'dwi', 'Dwi Astuti', '2');

-- --------------------------------------------------------

--
-- Table structure for table `ref_pegawai`
--

CREATE TABLE IF NOT EXISTS `ref_pegawai` (
  `nip` varchar(17) NOT NULL,
  `id_satker` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pangkat_gol` int(2) NOT NULL,
  `status_pegawai` int(1) NOT NULL,
  PRIMARY KEY (`nip`),
  KEY `id_satker` (`id_satker`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_pegawai`
--

INSERT INTO `ref_pegawai` (`nip`, `id_satker`, `nama`, `pangkat_gol`, `status_pegawai`) VALUES
('19880617201012100', 12, 'Arief Gunawan', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_sub_alokasi`
--

CREATE TABLE IF NOT EXISTS `ref_sub_alokasi` (
  `id_sub_alokasi` int(3) NOT NULL AUTO_INCREMENT,
  `kd_akun` varchar(6) NOT NULL,
  `kd_jenis` varchar(3) NOT NULL,
  `nama_sub_alokasi` varchar(50) NOT NULL,
  `sumber_dana` varchar(6) NOT NULL,
  PRIMARY KEY (`id_sub_alokasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `ref_sub_alokasi`
--

INSERT INTO `ref_sub_alokasi` (`id_sub_alokasi`, `kd_akun`, `kd_jenis`, `nama_sub_alokasi`, `sumber_dana`) VALUES
(1, '511111', '1', 'Belanja Gaji Pokok PNS', 'APBN'),
(2, '511119', '1', 'Belanja Pembulatan Gaji PNS', 'APBN'),
(3, '511121', '1', 'Belanja Tunjangan Suami/Istri PNS', 'APBN'),
(4, '511122', '1', 'Belanja Tunjangan Anak PNS', 'APBN'),
(5, '511123', '1', 'Belanja Tunjangan Struktural PNS', 'APBN'),
(6, '511124', '1', 'Belanja Tunjangan Fungsional PNS', 'APBN'),
(7, '511125', '1', 'Belanja Tunjangan PPh PNS', 'APBN'),
(8, '511126', '1', 'Belanja Tunjangan Beras PNS', 'APBN'),
(9, '511129', '1', 'Belanja Uang Makan PNS', 'APBN'),
(10, '511134', '1', 'Belanja Tunjangan Kompensasi Kerja PNS', 'APBN'),
(11, '511151', '1', 'Belanja Tunjangan Umum', 'APBN'),
(12, '525111', '1', 'Imbalan Kinerja', 'PNBP'),
(13, '525119', '1', 'Outsourcing Pegawai', 'PNBP'),
(14, '525111', '1', 'Remunerasi BLU', 'PNBP'),
(15, '525111', '1', 'Gaji Pegawai Non PNS Kontrak', 'PNBP'),
(16, '525119', '1', 'Lembur', 'PNBP'),
(17, '515112', '2', 'Barang Cetakan', 'PNBP'),
(18, '515112', '2', 'Linen', 'PNBP'),
(19, '515112', '2', 'Pakaian Dinas', 'PNBP'),
(20, '515112', '2', 'Suku Cadang dan Bahan Habis Pakai Komputer', 'PNBP'),
(21, '515112', '2', 'Barang K3', 'PNBP'),
(22, '515112', '2', 'Pemasaran', 'PNBP'),
(23, '515112', '2', 'Bahan Bakar', 'PNBP'),
(24, '515112', '2', 'Alat Tulis Kantor', 'PNBP'),
(25, '515112', '2', 'Gas Dapur', 'PNBP'),
(26, '515112', '2', 'Bahan Non Medis Habis Pakai', 'PNBP'),
(27, '515112', '2', 'Barang Rumah Tangga', 'PNBP'),
(28, '515112', '2', 'Perkantoran', 'PNBP'),
(29, '515112', '2', 'Suku Cadang', 'PNBP'),
(30, '515112', '2', 'Pengelolaan Limbah', 'PNBP'),
(31, '525115', '2', 'Perjalanan Dinas', 'PNBP'),
(32, '515112', '2', 'Bahan Makanan', 'PNBP'),
(33, '515112', '2', 'Gas Medis', 'PNBP'),
(34, '515112', '2', 'Obat-obatan BLU', 'PNBP'),
(35, '515112', '2', 'AMHP/BMHP', 'PNBP'),
(36, '515112', '2', 'Reagen RS', 'PNBP'),
(37, '515112', '2', 'Reagen KSO', 'PNBP'),
(38, '515112', '2', 'Film RS', 'PNBP'),
(39, '515112', '2', 'Film KSO', 'PNBP'),
(40, '522111', '3', 'Belanja Langganan Listrik', 'APBN'),
(41, '522112', '3', 'Belanja Langganan Telephon', 'APBN'),
(42, '522113', '3', 'Belanja Langganan Air', 'APBN'),
(43, '522119', '3', 'Belanja Langganan Internet', 'APBN'),
(44, '525119', '3', 'Audit Eksternal KAP', 'PNBP'),
(45, '525119', '3', 'Pengelolaan Parkir', 'PNBP'),
(46, '525119', '3', 'Outsourcing Satpam', 'PNBP'),
(47, '525119', '3', 'Jasa Pemeriksaan Kesehatan (PPK) Luar', 'PNBP'),
(48, '525114', '4', 'Cleaning Service', 'PNBP'),
(49, '525114', '4', 'Pemeliharaan Peralatan Medis', 'PNBP'),
(50, '525114', '4', 'Pemeliharaan Peralatan Non Medis', 'PNBP'),
(51, '525114', '4', 'Pemeliharaan dan Operasional Kendaraan Roda 4', 'PNBP'),
(52, '525114', '4', 'Pemeliharaan Gedung dan Bangunan', 'PNBP'),
(53, '525114', '4', 'Pemeliharaan Taman', 'PNBP'),
(54, '525112', '5', 'Pendidikan Formal', 'PNBP'),
(55, '525112', '5', 'Pelatihan dan Pertemuan Ilmiah Internal', 'PNBP'),
(56, '525112', '5', 'Pelatihan dan Pertemuan Ilmiah Eksternal', 'PNBP'),
(57, '525112', '5', 'Peningkatan Mutu dan Kajian Pelayanan Kesehatan RS', 'PNBP'),
(58, '537112', '6', 'Investasi Peralatan Non Medis', 'PNBP'),
(59, '537112', '6', 'Investasi Peralatan Medis', 'PNBP'),
(60, '537112', '6', 'Investasi Perangkat Pengolah Data dan Komunikasi', 'PNBP'),
(61, '537113', '6', 'Investasi Gedung dan Bangunan', 'PNBP'),
(62, '537113', '6', 'Rehabilitasi Gedung dan Bangunan', 'PNBP'),
(63, '537112', '6', 'Investasi Suku Cadang Komputer', 'PNBP'),
(64, '537112', '6', 'Investasi Peralatan dan Mesin K3', 'PNBP'),
(65, '532111', '6', 'coba investasi aaa', 'APBN');

-- --------------------------------------------------------

--
-- Table structure for table `ref_tahun`
--

CREATE TABLE IF NOT EXISTS `ref_tahun` (
  `tahun` varchar(5) NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`tahun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_tahun`
--

INSERT INTO `ref_tahun` (`tahun`, `status`) VALUES
('2018', '0'),
('2019', '0'),
('2020', '2');

-- --------------------------------------------------------

--
-- Table structure for table `usulan`
--

CREATE TABLE IF NOT EXISTS `usulan` (
  `id_usulan` int(6) NOT NULL AUTO_INCREMENT,
  `tgl_input_usulan` date DEFAULT NULL,
  `tahun` varchar(4) NOT NULL,
  `id_satker` int(3) NOT NULL,
  `id_sub_alokasi` int(3) NOT NULL,
  `nama_usulan` varchar(150) NOT NULL,
  `spesifikasi_usulan` text,
  `qty_usulan` decimal(5,0) DEFAULT NULL,
  `satuan_usulan` varchar(30) NOT NULL,
  `harga_usulan` decimal(15,2) DEFAULT NULL,
  `v_usulan` varchar(11) DEFAULT NULL,
  `prioritas_usulan` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_usulan`),
  KEY `tahun` (`tahun`),
  KEY `id_satker` (`id_satker`),
  KEY `id_sub_alokasi` (`id_sub_alokasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `usulan`
--

INSERT INTO `usulan` (`id_usulan`, `tgl_input_usulan`, `tahun`, `id_satker`, `id_sub_alokasi`, `nama_usulan`, `spesifikasi_usulan`, `qty_usulan`, `satuan_usulan`, `harga_usulan`, `v_usulan`, `prioritas_usulan`) VALUES
(1, '2017-12-07', '2020', 14, 24, 'ATK', '-', '2', 'Paket', '1000002.00', '0', '3'),
(2, '2017-12-07', '2020', 14, 60, 'PC Komputer', 'i7', '1', 'Unit', '10000000.00', '0', '1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mst_user`
--
ALTER TABLE `mst_user`
  ADD CONSTRAINT `mst_user_ibfk_1` FOREIGN KEY (`id_satker`) REFERENCES `mst_satker` (`id_satker`);

--
-- Constraints for table `ref_pegawai`
--
ALTER TABLE `ref_pegawai`
  ADD CONSTRAINT `ref_pegawai_ibfk_1` FOREIGN KEY (`id_satker`) REFERENCES `mst_satker` (`id_satker`);

--
-- Constraints for table `usulan`
--
ALTER TABLE `usulan`
  ADD CONSTRAINT `usulan_ibfk_1` FOREIGN KEY (`tahun`) REFERENCES `ref_tahun` (`tahun`),
  ADD CONSTRAINT `usulan_ibfk_2` FOREIGN KEY (`id_satker`) REFERENCES `mst_satker` (`id_satker`),
  ADD CONSTRAINT `usulan_ibfk_3` FOREIGN KEY (`id_sub_alokasi`) REFERENCES `ref_sub_alokasi` (`id_sub_alokasi`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
