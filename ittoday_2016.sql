-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2016 at 03:59 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ittoday_2016`
--

-- --------------------------------------------------------

--
-- Table structure for table `agrihack`
--

CREATE TABLE `agrihack` (
  `id_peserta` int(255) NOT NULL,
  `id_ketua` int(255) NOT NULL,
  `tim` varchar(255) NOT NULL,
  `anggota1` varchar(255) DEFAULT NULL,
  `anggota2` varchar(255) DEFAULT NULL,
  `kartu_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agrihack`
--

INSERT INTO `agrihack` (`id_peserta`, `id_ketua`, `tim`, `anggota1`, `anggota2`, `kartu_id`) VALUES
(1, 6, 'dragonforce', 'rado', 'wawan', 'img/identitas/agrihack/0764140001_identitas.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `digishare`
--

CREATE TABLE `digishare` (
  `id_peserta` int(255) NOT NULL,
  `id_ketua` int(255) NOT NULL,
  `tim` varchar(255) NOT NULL,
  `anggota1` varchar(255) DEFAULT NULL,
  `anggota2` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) NOT NULL,
  `judul` text NOT NULL,
  `deskripsi` text NOT NULL,
  `proposal` varchar(255) NOT NULL,
  `kartu_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `digishare`
--

INSERT INTO `digishare` (`id_peserta`, `id_ketua`, `tim`, `anggota1`, `anggota2`, `kategori`, `judul`, `deskripsi`, `proposal`, `kartu_id`) VALUES
(1, 6, 'dragonforce', 'rado', 'wawan', 'mulgame', 'pewdiepie', 'hahaha', 'img/identitas/digishare/0764140001_proposal.pdf', 'img/identitas/digishare/0764140001_identitas.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `igdc`
--

CREATE TABLE `igdc` (
  `id_peserta` int(255) NOT NULL,
  `id_ketua` int(255) NOT NULL,
  `tim` varchar(255) NOT NULL,
  `anggota1` varchar(255) DEFAULT NULL,
  `anggota2` varchar(255) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `video` varchar(255) NOT NULL,
  `game` varchar(255) NOT NULL,
  `kartu_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `igdc`
--

INSERT INTO `igdc` (`id_peserta`, `id_ketua`, `tim`, `anggota1`, `anggota2`, `judul`, `deskripsi`, `video`, `game`, `kartu_id`) VALUES
(1, 6, 'dragonforce', 'rado', 'wawan', 'pewdiepie', 'hahaha', 'youtube.com', 'google.com', 'img/identitas/igdc/0764140001_identitas.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `isc`
--

CREATE TABLE `isc` (
  `id_peserta` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `kartu_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isc`
--

INSERT INTO `isc` (`id_peserta`, `id_user`, `kartu_id`) VALUES
(1, 6, 'img/identitas/isc/0764140001_identitas.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `ittoday`
--

CREATE TABLE `ittoday` (
  `id_user` int(255) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_identitas` varchar(255) DEFAULT NULL,
  `institusi` varchar(255) DEFAULT NULL,
  `tahun_masuk` int(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT 'img/user/default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ittoday`
--

INSERT INTO `ittoday` (`id_user`, `nama_lengkap`, `email`, `password`, `no_hp`, `alamat`, `no_identitas`, `institusi`, `tahun_masuk`, `foto`) VALUES
(1, 'Fadhlal Khaliq Surado', 'fksutan.rajomudo@gmail.com', 'c3ec0f7b054e729c5a716c8125839829', '082298220348', 'Dramaga Cantik', 'G64140015', 'IPB', 2014, 'img/user/default.png 	'),
(2, 'Ravena', 'ravena@ravena.com', 'b4a480785c8d5ceb41a83c688ef803f3', '21903920', 'Kuningan', 'G64140041', 'IPB', 2014, 'img/user/default.png 	'),
(3, 'Feby Tri Saputra', 'febytri.saputra@gmail.com', '39907b3c541e066b8fda044731049cce', '08999627017', 'Semplak', 'G64140047', 'IPB', 2016, 'img/user/default.png 	'),
(4, 'Wawan Setyadi', 'wawan.setyadi@gmail.com', 'f2e7a38f5dd3d4befb660f9dc916cba4', '808213912391', 'Tajur', 'G64140088', 'IPB', 2014, 'img/user/default.png 	'),
(5, 'Rizqi alif', 'alifahasni.rizqi@gmail.com', '32c306b6079c0c5161e08b10d5e32eeb', '082220922296', 'bara 4', 'g64140006', 'IPB', 2014, 'img/user/default.png 	'),
(6, 'Ado Bule German', 'ado.bule@gmail.com', '043077e2abaec8b0b1999e04cdfbceea', '081666999690', 'NCC', '0764140001', 'IPB', 2014, 'img/user/0764140001.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `seminar`
--

CREATE TABLE `seminar` (
  `id_peserta` int(255) NOT NULL,
  `id_user` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seminar`
--

INSERT INTO `seminar` (`id_peserta`, `id_user`) VALUES
(3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `kode_voucher` int(11) NOT NULL,
  `activate` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`kode_voucher`, `activate`, `id_user`) VALUES
(565656, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agrihack`
--
ALTER TABLE `agrihack`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `id_user_FK` (`id_ketua`);

--
-- Indexes for table `digishare`
--
ALTER TABLE `digishare`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `id_user_FK` (`id_ketua`);

--
-- Indexes for table `igdc`
--
ALTER TABLE `igdc`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `id_user_FK` (`id_ketua`);

--
-- Indexes for table `isc`
--
ALTER TABLE `isc`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `id_user_FK` (`id_user`);

--
-- Indexes for table `ittoday`
--
ALTER TABLE `ittoday`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `seminar`
--
ALTER TABLE `seminar`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `id_user_FK` (`id_user`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`kode_voucher`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agrihack`
--
ALTER TABLE `agrihack`
  MODIFY `id_peserta` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `digishare`
--
ALTER TABLE `digishare`
  MODIFY `id_peserta` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `igdc`
--
ALTER TABLE `igdc`
  MODIFY `id_peserta` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `isc`
--
ALTER TABLE `isc`
  MODIFY `id_peserta` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ittoday`
--
ALTER TABLE `ittoday`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `id_peserta` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `agrihack`
--
ALTER TABLE `agrihack`
  ADD CONSTRAINT `id_user_FK` FOREIGN KEY (`id_ketua`) REFERENCES `ittoday` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `digishare`
--
ALTER TABLE `digishare`
  ADD CONSTRAINT `id_user_ds_FK` FOREIGN KEY (`id_ketua`) REFERENCES `ittoday` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `igdc`
--
ALTER TABLE `igdc`
  ADD CONSTRAINT `id_user_igdc_FK` FOREIGN KEY (`id_ketua`) REFERENCES `ittoday` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `isc`
--
ALTER TABLE `isc`
  ADD CONSTRAINT `id_user_isc_FK` FOREIGN KEY (`id_user`) REFERENCES `ittoday` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seminar`
--
ALTER TABLE `seminar`
  ADD CONSTRAINT `id_user_sem_FK` FOREIGN KEY (`id_user`) REFERENCES `ittoday` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `voucher`
--
ALTER TABLE `voucher`
  ADD CONSTRAINT `id_user_voucher` FOREIGN KEY (`id_user`) REFERENCES `ittoday` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
