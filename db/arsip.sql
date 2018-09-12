-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 12, 2018 at 04:15 PM
-- Server version: 10.1.34-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `cv_pt`
--

CREATE TABLE `cv_pt` (
  `id_cv_pt` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `nama_direktur` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telepon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cv_pt`
--

INSERT INTO `cv_pt` (`id_cv_pt`, `nama_perusahaan`, `nama_direktur`, `alamat`, `no_telepon`) VALUES
(1, 'CV. Surya Mandiri', 'Sultan Andira', 'Jl. Bunga Sepatu V No. 6- Kel. Perum Way Kandis- K', '081369567780'),
(2, 'PT. Prima Jati', 'Mei Indrayati', 'Jl. Imam Bonjol RT/RW 003/01 Kel. Lankapura Baru K', '081267672323'),
(3, 'CV. Buana Raya', 'Harry Wijaya', 'Jl. Dr. Harun II No. 99 Kota Baru Tanjung Karang T', '082234383323'),
(4, 'CV. Karya Feruel', 'Harry Wijaya', 'Jl. RA Rasyid Gg Paring Perum Panorama Alam Blok D', '081369694430'),
(5, 'CV. Dua Putri Alzaya', 'Agra Sugiarto K.S', 'Jl. Ikan Sepat No.8 Rt.044 LK.III Teluk Betung, Ba', '082234357486'),
(6, 'PT. Citra Angkasa', 'Raka Pradipta', 'Jln. Prof Sumantri No. 99 Kota Baru Tanjung Karang', '081209793467'),
(7, 'PT. Indokarya', 'Pratama', 'Jl. Soekarno Hatta No.15 Bandar Lampung', '081569565012'),
(8, 'PT. Mutiara', 'Sultan Andira ', 'Jln. Dr. Harun II No. 99 Kota Baru Tanjung Karang ', '082234383335');

-- --------------------------------------------------------

--
-- Table structure for table `detail_kontrak`
--

CREATE TABLE `detail_kontrak` (
  `id_detail_kontrak` int(11) NOT NULL,
  `id_cv_pt` int(11) NOT NULL,
  `id_kontrak` int(11) NOT NULL,
  `status_kontrak` enum('pm','pn') NOT NULL,
  `nama_berkas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_kontrak`
--

INSERT INTO `detail_kontrak` (`id_detail_kontrak`, `id_cv_pt`, `id_kontrak`, `status_kontrak`, `nama_berkas`) VALUES
(5, 8, 4, 'pm', 'db_buntang.txt'),
(6, 1, 4, 'pn', 'klui.xlsx');

-- --------------------------------------------------------

--
-- Table structure for table `kontrak`
--

CREATE TABLE `kontrak` (
  `id_kontrak` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `nama_pekerjaan` varchar(100) NOT NULL,
  `tgl_mulai_kontrak` date NOT NULL,
  `tgl_selesai_kontrak` date NOT NULL,
  `no_kl` varchar(30) NOT NULL,
  `nilai` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontrak`
--

INSERT INTO `kontrak` (`id_kontrak`, `id_unit`, `nama_pekerjaan`, `tgl_mulai_kontrak`, `tgl_selesai_kontrak`, `no_kl`, `nilai`, `id_lokasi`) VALUES
(3, 1, 'Renovasi Mess Babaranjang ', '2017-04-08', '2017-05-25', '20/34/DV', 200000000, 3),
(4, 1, 'Perbaikan Mushola Tarahan', '2017-06-05', '2017-07-06', '20/2017/VI', 200000000, 2),
(5, 1, 'Perbaikan Mushola Blambangan Umpu', '2017-07-07', '2017-09-09', '20/2017/V', 500000000, 3),
(6, 3, 'Renovasi Gedung Resort JJ Air Kaka (AK)', '2017-06-06', '2017-08-08', '20/2017/VI/V', 3000000, 4),
(7, 2, 'Renovasi Wisma Tulungbuyut', '2018-02-08', '2018-04-08', '24/34/DV/V/XX', 300000000, 6),
(8, 3, 'Renovasi Mess Divre IV TanjungKarang', '2018-06-06', '2018-07-08', '20/2018/VI/VI/IX', 500000000, 3),
(9, 2, 'Renovasi masjid tulung buyut', '2017-08-08', '2017-10-09', '20/2017/VI', 700000000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_lokasi`) VALUES
(2, 'Stasiun Tarahan'),
(3, 'Stasiun Blambangan Umpu'),
(4, 'Stasiun Kotabumi'),
(6, 'Stasiun Tulung Buyut'),
(7, 'DIVRE IV TanjungKarang');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id_unit`, `nama_unit`) VALUES
(1, 'Unit Dinas Stasiun'),
(2, 'Unit Dinas Non Stasiun'),
(3, 'Unit Mekanikal dan Elektrikal');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` enum('a','p') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'Administrator', 'a'),
(2, 'user', 'b14361404c078ffd549c03db443c3fede2f3e534d73f78f77301ed97d4a436a9fd9db05ee8b325c0ad36438b43fec8510c204fc1c1edb21d0941c00e9e2c1ce2', 'User', 'p');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cv_pt`
--
ALTER TABLE `cv_pt`
  ADD PRIMARY KEY (`id_cv_pt`);

--
-- Indexes for table `detail_kontrak`
--
ALTER TABLE `detail_kontrak`
  ADD PRIMARY KEY (`id_detail_kontrak`),
  ADD KEY `id_cv_pt` (`id_cv_pt`),
  ADD KEY `id_kontrak` (`id_kontrak`);

--
-- Indexes for table `kontrak`
--
ALTER TABLE `kontrak`
  ADD PRIMARY KEY (`id_kontrak`),
  ADD KEY `id_lokasi` (`id_lokasi`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cv_pt`
--
ALTER TABLE `cv_pt`
  MODIFY `id_cv_pt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detail_kontrak`
--
ALTER TABLE `detail_kontrak`
  MODIFY `id_detail_kontrak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kontrak`
--
ALTER TABLE `kontrak`
  MODIFY `id_kontrak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_kontrak`
--
ALTER TABLE `detail_kontrak`
  ADD CONSTRAINT `detail_kontrak_ibfk_1` FOREIGN KEY (`id_cv_pt`) REFERENCES `cv_pt` (`id_cv_pt`),
  ADD CONSTRAINT `detail_kontrak_ibfk_2` FOREIGN KEY (`id_kontrak`) REFERENCES `kontrak` (`id_kontrak`);

--
-- Constraints for table `kontrak`
--
ALTER TABLE `kontrak`
  ADD CONSTRAINT `kontrak_ibfk_1` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`),
  ADD CONSTRAINT `kontrak_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
