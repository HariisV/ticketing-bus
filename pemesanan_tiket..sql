-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.25-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for pemesanan_tiket
CREATE DATABASE IF NOT EXISTS `pemesanan_tiket` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `pemesanan_tiket`;

-- Dumping structure for table pemesanan_tiket.tbl_bus
CREATE TABLE IF NOT EXISTS `tbl_bus` (
  `id_bus` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bus` varchar(255) NOT NULL,
  `waktu_brngkt` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `dari` varchar(255) NOT NULL,
  `ke` varchar(255) NOT NULL,
  `ongkos` varchar(255) NOT NULL,
  PRIMARY KEY (`id_bus`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pemesanan_tiket.tbl_bus: ~1 rows (approximately)
INSERT INTO `tbl_bus` (`id_bus`, `nama_bus`, `waktu_brngkt`, `status`, `dari`, `ke`, `ongkos`) VALUES
	(33, 'simpati', 'pagi hari', 'tersedia', 'aceh', 'medan', 'Rp 200.000');

-- Dumping structure for table pemesanan_tiket.tbl_transaksi
CREATE TABLE IF NOT EXISTS `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_bus` int(11) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `jml_bangku` int(11) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `biaya` varchar(100) NOT NULL,
  `waktu_berangkat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pemesanan_tiket.tbl_transaksi: ~2 rows (approximately)
INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_bus`, `nama_pemesan`, `jml_bangku`, `kelas`, `biaya`, `waktu_berangkat`, `email`) VALUES
	(7, 27, 'www', 1, 'Biasa', 'Rp 10.000', 'SIANG HARI (14.00)', 'coba1@gmail.com'),
	(17, 27, 'uyuyuu', 1, 'Premium', 'Rp 20.000', 'SIANG HARI (14.00)', 'rerere123@gmail.com');

-- Dumping structure for table pemesanan_tiket.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'Member',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pemesanan_tiket.tbl_user: ~4 rows (approximately)
INSERT INTO `tbl_user` (`id_user`, `nama`, `email`, `password`, `role`) VALUES
	(1, 'Admin', 'admin@gmail.com', '123', 'Admin'),
	(2, 'User', 'user@gmail.com', '123', 'Member'),

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
