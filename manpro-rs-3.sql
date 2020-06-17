-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.10-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for manpro-rs-3
CREATE DATABASE IF NOT EXISTS `manpro-rs-3` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `manpro-rs-3`;

-- Dumping structure for table manpro-rs-3.tb_dokter
CREATE TABLE IF NOT EXISTS `tb_dokter` (
  `id_dokter` int(6) NOT NULL AUTO_INCREMENT,
  `nama_dok` varchar(30) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `spesialis` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_dokter`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table manpro-rs-3.tb_dokter: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_dokter` DISABLE KEYS */;
REPLACE INTO `tb_dokter` (`id_dokter`, `nama_dok`, `no_telp`, `spesialis`, `status`) VALUES
	(103, 'ocan', '089908990899', 'penyakit dalam', 'aktif'),
	(104, 'udin', '0870870877', 'penyakit dalam', 'aktif'),
	(105, 'akuh', '123123123123', 'penyakit dalam', 'aktif');
/*!40000 ALTER TABLE `tb_dokter` ENABLE KEYS */;

-- Dumping structure for table manpro-rs-3.tb_drugs
CREATE TABLE IF NOT EXISTS `tb_drugs` (
  `id_drugs` int(6) NOT NULL AUTO_INCREMENT,
  `nama_drugs` varchar(30) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id_drugs`)
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table manpro-rs-3.tb_drugs: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_drugs` DISABLE KEYS */;
REPLACE INTO `tb_drugs` (`id_drugs`, `nama_drugs`, `merk`, `type`) VALUES
	(201, 'Oskadon', 'Orang Tua', '3');
/*!40000 ALTER TABLE `tb_drugs` ENABLE KEYS */;

-- Dumping structure for table manpro-rs-3.tb_jadwal
CREATE TABLE IF NOT EXISTS `tb_jadwal` (
  `id_jadwal` int(6) NOT NULL AUTO_INCREMENT,
  `id_poli` int(6) NOT NULL,
  `id_dokter` int(6) NOT NULL,
  `id_perawat` int(6) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` time NOT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `FK_tb_jadwal_tb_dokter` (`id_dokter`),
  KEY `FK_tb_jadwal_tb_perawat` (`id_perawat`),
  KEY `FK_tb_jadwal_tb_poliklinik` (`id_poli`),
  CONSTRAINT `FK_tb_jadwal_tb_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`) ON DELETE CASCADE,
  CONSTRAINT `FK_tb_jadwal_tb_perawat` FOREIGN KEY (`id_perawat`) REFERENCES `tb_perawat` (`id_perawat`) ON DELETE CASCADE,
  CONSTRAINT `FK_tb_jadwal_tb_poliklinik` FOREIGN KEY (`id_poli`) REFERENCES `tb_poliklinik` (`id_poli`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=313 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table manpro-rs-3.tb_jadwal: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_jadwal` DISABLE KEYS */;
REPLACE INTO `tb_jadwal` (`id_jadwal`, `id_poli`, `id_dokter`, `id_perawat`, `hari`, `jam`) VALUES
	(301, 701, 103, 601, 'Senin', '11:19:10'),
	(312, 701, 103, 601, 'Selasa', '12:12:00');
/*!40000 ALTER TABLE `tb_jadwal` ENABLE KEYS */;

-- Dumping structure for table manpro-rs-3.tb_medrec
CREATE TABLE IF NOT EXISTS `tb_medrec` (
  `id_medrec` int(11) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(9) NOT NULL,
  `tgl_check` date NOT NULL,
  `diagnosa` varchar(20) NOT NULL,
  `id_dokter` int(6) NOT NULL,
  `id_treatment` int(6) NOT NULL,
  `id_drugs` int(6) NOT NULL,
  `dosis` varchar(50) NOT NULL,
  `aturan_pakai` varchar(50) NOT NULL,
  PRIMARY KEY (`id_medrec`),
  KEY `FK_tb_medrec_tb_pasien` (`id_pasien`),
  KEY `FK_tb_medrec_tb_dokter` (`id_dokter`),
  KEY `FK_tb_medrec_tb_treatment` (`id_treatment`),
  KEY `FK_tb_medrec_tb_drugs` (`id_drugs`),
  CONSTRAINT `FK_tb_medrec_tb_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`),
  CONSTRAINT `FK_tb_medrec_tb_drugs` FOREIGN KEY (`id_drugs`) REFERENCES `tb_drugs` (`id_drugs`),
  CONSTRAINT `FK_tb_medrec_tb_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`),
  CONSTRAINT `FK_tb_medrec_tb_treatment` FOREIGN KEY (`id_treatment`) REFERENCES `tb_treatment` (`id_treatment`)
) ENGINE=InnoDB AUTO_INCREMENT=403 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table manpro-rs-3.tb_medrec: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_medrec` DISABLE KEYS */;
REPLACE INTO `tb_medrec` (`id_medrec`, `id_pasien`, `tgl_check`, `diagnosa`, `id_dokter`, `id_treatment`, `id_drugs`, `dosis`, `aturan_pakai`) VALUES
	(401, 502, '0000-00-00', 'Sakit Kepala', 105, 902, 201, '1 x 1', 'diminum setelah futsal'),
	(402, 502, '2020-03-07', 'Sakit Huntu', 104, 902, 201, '2x1', 'diminum setelah makan');
/*!40000 ALTER TABLE `tb_medrec` ENABLE KEYS */;

-- Dumping structure for table manpro-rs-3.tb_pasien
CREATE TABLE IF NOT EXISTS `tb_pasien` (
  `id_pasien` int(9) NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(30) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=504 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table manpro-rs-3.tb_pasien: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_pasien` DISABLE KEYS */;
REPLACE INTO `tb_pasien` (`id_pasien`, `nama_pasien`, `no_telp`, `alamat`, `tgl_lahir`, `pekerjaan`) VALUES
	(502, 'Isal', '089908990899', 'Bandung', '2019-10-09', 'Kuliah Kerja'),
	(503, 'Gunawan', '0', 'Bandung', '2020-03-07', 'Kuliah');
/*!40000 ALTER TABLE `tb_pasien` ENABLE KEYS */;

-- Dumping structure for table manpro-rs-3.tb_perawat
CREATE TABLE IF NOT EXISTS `tb_perawat` (
  `id_perawat` int(6) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `spesialis` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_perawat`)
) ENGINE=InnoDB AUTO_INCREMENT=602 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table manpro-rs-3.tb_perawat: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_perawat` DISABLE KEYS */;
REPLACE INTO `tb_perawat` (`id_perawat`, `nama`, `no_telp`, `spesialis`, `status`) VALUES
	(601, 'ibu mertua', '089908990899', 'penyakit dalam', 'aktif');
/*!40000 ALTER TABLE `tb_perawat` ENABLE KEYS */;

-- Dumping structure for table manpro-rs-3.tb_poliklinik
CREATE TABLE IF NOT EXISTS `tb_poliklinik` (
  `id_poli` int(6) NOT NULL AUTO_INCREMENT,
  `nama_poli` varchar(30) NOT NULL,
  `ruangan` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id_poli`)
) ENGINE=InnoDB AUTO_INCREMENT=703 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table manpro-rs-3.tb_poliklinik: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_poliklinik` DISABLE KEYS */;
REPLACE INTO `tb_poliklinik` (`id_poli`, `nama_poli`, `ruangan`, `type`) VALUES
	(701, 'Poliklinik Penyakit Kulit', '402', '2'),
	(702, 'Poliklinik Penyaki Dalam', '401', '1');
/*!40000 ALTER TABLE `tb_poliklinik` ENABLE KEYS */;

-- Dumping structure for table manpro-rs-3.tb_registrasi
CREATE TABLE IF NOT EXISTS `tb_registrasi` (
  `id_registrasi` int(9) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(9) NOT NULL,
  `id_jadwal` int(6) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_registrasi`),
  KEY `FK_tb_registrasi_tb_pasien` (`id_pasien`),
  KEY `FK_tb_registrasi_tb_jadwal` (`id_jadwal`),
  CONSTRAINT `FK_tb_registrasi_tb_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tb_jadwal` (`id_jadwal`),
  CONSTRAINT `FK_tb_registrasi_tb_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=801 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table manpro-rs-3.tb_registrasi: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_registrasi` DISABLE KEYS */;
REPLACE INTO `tb_registrasi` (`id_registrasi`, `id_pasien`, `id_jadwal`, `tanggal`, `status`) VALUES
	(800, 502, 301, '2020-03-18', 'reservasi');
/*!40000 ALTER TABLE `tb_registrasi` ENABLE KEYS */;

-- Dumping structure for table manpro-rs-3.tb_treatment
CREATE TABLE IF NOT EXISTS `tb_treatment` (
  `id_treatment` int(6) NOT NULL AUTO_INCREMENT,
  `treatment` varchar(50) NOT NULL,
  PRIMARY KEY (`id_treatment`)
) ENGINE=InnoDB AUTO_INCREMENT=906 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table manpro-rs-3.tb_treatment: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_treatment` DISABLE KEYS */;
REPLACE INTO `tb_treatment` (`id_treatment`, `treatment`) VALUES
	(902, 'Cubit'),
	(905, 'Jitak');
/*!40000 ALTER TABLE `tb_treatment` ENABLE KEYS */;

-- Dumping structure for table manpro-rs-3.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_user`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table manpro-rs-3.user: ~3 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `role_id`, `is_active`, `date_created`) VALUES
	(11, 'Muhammad Fauzan Raspati', 'raspatiocan@gmail.com', 'raspati', '$2y$10$FzLNjD8Hhm9E6xvsJ4W8Y.uIC1xOxonVkyYLWSObwbFlwB3kcP7YO', 3, 1, '0000-00-00 00:00:00'),
	(12, 'hasna', 'hasnaseptidewi@gmail.com', 'hasnasepti', '$2y$10$.AArD8y7MfVS.Y/mAvk3Xem3cEU7luRULisomiQv/ON.6XtjJ/EL2', 1, 1, '0000-00-00 00:00:00'),
	(13, 'dokter', 'dokter@gmail.com', 'dokter', '$2y$10$jtqrB2qqFtgSZkgnJs7giuhcOpHq1W7YXkbgi/89Hm6SjMYf.tTLW', 2, 1, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table manpro-rs-3.user_access_menu
CREATE TABLE IF NOT EXISTS `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table manpro-rs-3.user_access_menu: ~11 rows (approximately)
/*!40000 ALTER TABLE `user_access_menu` DISABLE KEYS */;
REPLACE INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 1, 3),
	(4, 1, 4),
	(5, 1, 5),
	(6, 2, 2),
	(7, 2, 3),
	(8, 2, 4),
	(9, 3, 2),
	(10, 3, 4),
	(11, 3, 5);
/*!40000 ALTER TABLE `user_access_menu` ENABLE KEYS */;

-- Dumping structure for table manpro-rs-3.user_menu
CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table manpro-rs-3.user_menu: ~5 rows (approximately)
/*!40000 ALTER TABLE `user_menu` DISABLE KEYS */;
REPLACE INTO `user_menu` (`id`, `menu`) VALUES
	(1, 'Admin'),
	(2, 'User'),
	(3, 'Dokter'),
	(4, 'Poliklinik'),
	(5, 'Reservasi');
/*!40000 ALTER TABLE `user_menu` ENABLE KEYS */;

-- Dumping structure for table manpro-rs-3.user_role
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table manpro-rs-3.user_role: ~3 rows (approximately)
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
REPLACE INTO `user_role` (`id`, `role`) VALUES
	(1, 'admin'),
	(2, 'dokter'),
	(3, 'user');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;

-- Dumping structure for table manpro-rs-3.user_sub_menu
CREATE TABLE IF NOT EXISTS `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table manpro-rs-3.user_sub_menu: ~16 rows (approximately)
/*!40000 ALTER TABLE `user_sub_menu` DISABLE KEYS */;
REPLACE INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
	(1, 1, 'Dashboard', 'admin', 'nav-icon far fas fa-tachometer-alt', 1),
	(2, 2, 'Profile', 'user', 'nav-icon far fas fa-user', 1),
	(3, 2, 'Edit Profile', 'user/edit', 'nav-icon far fas fa-user-edit', 1),
	(4, 1, 'Menu Management', 'menu', 'nav-icon far fas fa-folder', 1),
	(5, 1, 'Sub Menu Management', 'menu/submenu', 'nav-icon far fas fa-folder', 1),
	(6, 1, 'coba', 'coba/coba', 'nav-icon fab fa-fw fa-youtube', 1),
	(7, 4, 'Jadwal Poliklinik', 'poliklinik', 'nav-icon fas fa-calendar-plus', 1),
	(8, 4, 'List Poliklinik', 'poliklinik/list_poli', 'nav-icon fas fa-hospital', 1),
	(9, 4, 'Dokter Poliklinik', 'poliklinik/dokter_poli', 'nav-icon fas fa-hospital', 1),
	(10, 4, 'Perawat Poliklinik', 'poliklinik/perawat_poli', 'nav-icon fas fa-hospital', 1),
	(11, 3, 'Pasien', 'poliklinik/pasien', 'nav-icon fas fa-hospital', 1),
	(12, 3, 'Obat', 'poliklinik/obat', 'nav-icon fas fa-hospital', 1),
	(13, 3, 'Treatment', 'poliklinik/treatment', 'nav-icon fas fa-hospital', 1),
	(14, 5, 'Registrasi', 'poliklinik/regis_poli', 'nav-icon fas fa-hospital', 1),
	(15, 3, 'Medrec', 'poliklinik/medrec', 'nav-icon fas fa-hospital', 1),
	(16, 4, 'Medrec', 'poliklinik/medrec', 'nav-icon fas fa-hospital', 1);
/*!40000 ALTER TABLE `user_sub_menu` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
