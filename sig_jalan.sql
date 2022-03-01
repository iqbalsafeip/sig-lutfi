-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2022 at 02:18 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sig_jalan`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kondisi`
--

CREATE TABLE `data_kondisi` (
  `id` int(11) NOT NULL,
  `id_kondisi` int(11) DEFAULT NULL,
  `id_jalan` int(11) DEFAULT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kondisi`
--

INSERT INTO `data_kondisi` (`id`, `id_kondisi`, `id_jalan`, `value`) VALUES
(4, 1, 17, '9.02'),
(5, 3, 17, '4.18'),
(6, 1, 18, '0.18'),
(7, 3, 18, '1'),
(8, 5, 18, '0.40');

-- --------------------------------------------------------

--
-- Table structure for table `data_tipe_permukaan`
--

CREATE TABLE `data_tipe_permukaan` (
  `id` int(11) NOT NULL,
  `id_permukaan` int(11) DEFAULT NULL,
  `id_jalan` int(11) DEFAULT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_tipe_permukaan`
--

INSERT INTO `data_tipe_permukaan` (`id`, `id_permukaan`, `id_jalan`, `value`) VALUES
(1, 1, 4, '12'),
(2, 2, 4, '12'),
(3, 5, 4, '12'),
(4, 1, 5, '12'),
(5, 4, 5, '12'),
(6, 5, 5, '33'),
(7, 2, 15, '12'),
(8, 1, 17, '11.06'),
(9, 2, 17, '2.15'),
(10, 1, 18, '1.58');

-- --------------------------------------------------------

--
-- Table structure for table `jalan`
--

CREATE TABLE `jalan` (
  `id` int(11) NOT NULL,
  `nama_ruas` varchar(255) DEFAULT NULL,
  `panjang` varchar(255) DEFAULT NULL,
  `lebar` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jalan`
--

INSERT INTO `jalan` (`id`, `nama_ruas`, `panjang`, `lebar`, `longitude`, `latitude`) VALUES
(17, 'Limbangan - Selaawi (Bts.Kab.Sumedang)', '13.20', '5.50', '-7.026068491752526', '107.99671821134253'),
(18, 'Salamanjah - Kadungora', '1.58', '7', '-7.145827348345265', '107.89814688250776');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama`) VALUES
(1, 'Bl. Limbangan'),
(2, 'Selaawi'),
(3, 'Bayongbong'),
(4, 'Garut Kota'),
(5, 'Kadungora');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan_dilalui`
--

CREATE TABLE `kecamatan_dilalui` (
  `id` int(11) NOT NULL,
  `id_kecamatan` int(11) DEFAULT NULL,
  `id_jalan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan_dilalui`
--

INSERT INTO `kecamatan_dilalui` (`id`, `id_kecamatan`, `id_jalan`) VALUES
(15, 1, 17),
(16, 2, 17),
(17, 5, 18);

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE `kondisi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`id`, `nama`, `satuan`) VALUES
(1, 'Baik', 'km'),
(3, 'Sedang', 'km'),
(4, 'Rusak Ringan', 'km'),
(5, 'Rusak Berat', 'km');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1645410875),
('m130524_201442_init', 1645410882),
('m190124_110200_add_verification_token_column_to_user_table', 1645410883),
('m220222_131319_create_kondisi_table', 1645535610),
('m220222_131430_create_tipe_permukaan_table', 1645535675),
('m220222_134945_create_kecamatan_table', 1645537794),
('m220222_140227_create_jalan_table', 1645538818),
('m220222_140450_create_kecamatan_dilalui_table', 1645590986),
('m220222_140629_create_data_kondisi_table', 1645590986),
('m220222_140826_create_data_tipe_permukaan_table', 1645590986),
('m220223_043432_add_location_column', 1645591137);

-- --------------------------------------------------------

--
-- Table structure for table `tipe_permukaan`
--

CREATE TABLE `tipe_permukaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe_permukaan`
--

INSERT INTO `tipe_permukaan` (`id`, `nama`, `satuan`) VALUES
(1, 'ASPAL (AC, HRS, ATB)', 'km'),
(2, 'PERKERASAN BETON', 'km'),
(3, 'LAPIS PENETRASI /LATASIR/MACADAM', 'km'),
(4, 'TELFORD /KERIKIL /URPIL', 'km'),
(5, 'TANAH/ BELUM TEMBUS', 'km');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'lutfi', 'F6Fw4F7L3Ot_LK7lqL1c8mZ2ye0GUA6f', '$2y$13$Cz5bkwTw/wMpro3/ksJWz.QGrn6hUwXqhXzUT3xXrpxI2d/G.dr5a', NULL, 'lutfi@gmail.com', 9, 1645410958, 1645410958, 'f3Pj1y9vVVXRMp3IFiuOzIV6YQyexIQj_1645410958'),
(2, 'admin', 'mqrAU_-5C6KiUMhOfiYjGZA1vwU3q21S', '$2y$13$JOMFCn2ACm0VfVwezl336OSDP7Qut/HV4qQGWV2fZxgdba0x6iqoi', NULL, 'admin@admin.com', 10, 1645410992, 1645410992, 'AeE0a5y9S2n3-ajWSZHeRX6Smhi4C_Cd_1645410992');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kondisi`
--
ALTER TABLE `data_kondisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-data_kondisi-id_kondisi` (`id_kondisi`),
  ADD KEY `idx-data_kondisi-id_jalan` (`id_jalan`);

--
-- Indexes for table `data_tipe_permukaan`
--
ALTER TABLE `data_tipe_permukaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-data_tipe_permukaan-id_permukaan` (`id_permukaan`);

--
-- Indexes for table `jalan`
--
ALTER TABLE `jalan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan_dilalui`
--
ALTER TABLE `kecamatan_dilalui`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-kecamatan_dilalui-id_kecamatan` (`id_kecamatan`),
  ADD KEY `idx-kecamatan_dilalui-id_jalan` (`id_jalan`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `tipe_permukaan`
--
ALTER TABLE `tipe_permukaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kondisi`
--
ALTER TABLE `data_kondisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_tipe_permukaan`
--
ALTER TABLE `data_tipe_permukaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jalan`
--
ALTER TABLE `jalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kecamatan_dilalui`
--
ALTER TABLE `kecamatan_dilalui`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tipe_permukaan`
--
ALTER TABLE `tipe_permukaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_kondisi`
--
ALTER TABLE `data_kondisi`
  ADD CONSTRAINT `fk-data_kondisi-id_jalan` FOREIGN KEY (`id_jalan`) REFERENCES `jalan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-data_kondisi-id_kondisi` FOREIGN KEY (`id_kondisi`) REFERENCES `kondisi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kecamatan_dilalui`
--
ALTER TABLE `kecamatan_dilalui`
  ADD CONSTRAINT `fk-kecamatan_dilalui-id_jalan` FOREIGN KEY (`id_jalan`) REFERENCES `jalan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-kecamatan_dilalui-id_kecamatan` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
