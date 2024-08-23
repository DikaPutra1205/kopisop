-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2024 at 11:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psc`
--

-- --------------------------------------------------------

--
-- Table structure for table `cash_flow`
--

CREATE TABLE `cash_flow` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `akun` varchar(255) NOT NULL,
  `berita` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `dana_masuk` int(11) DEFAULT 0,
  `dana_keluar` int(11) DEFAULT 0,
  `saldo` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_sales` varchar(255) NOT NULL,
  `nama_sales` set('Edy Sudrajat','Harry Rusli','Gunadi','Manajemen','Dealer') NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `kontak_pelanggan` varchar(255) NOT NULL,
  `pelanggan_baru_lama` set('Pelanggan Baru','Pelanggan Lama') NOT NULL,
  `alamat_kirim` varchar(255) NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `jam_kirim` time NOT NULL,
  `mutu_beton` varchar(255) NOT NULL,
  `armada` varchar(255) NOT NULL,
  `fa_nfa` varchar(255) NOT NULL,
  `slump` set('8 +/- 2','10 +/- 2','12 +/- 2','18+/-2') NOT NULL,
  `harga_ppn` int(11) NOT NULL,
  `volume` int(11) NOT NULL,
  `metode_bongkar` set('Pompa','Langsung Tuang','Langsir/Eceran') NOT NULL,
  `media_cor` set('Lantai','Kolom','Canstein','Rigid /Jalan') NOT NULL,
  `cara_bayar` set('Tunai','Transfer') NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `jarak_lokasi` set('0-20','21-25','26-30','31-35','36-40','41-50') NOT NULL,
  `titipan` varchar(255) NOT NULL,
  `aktual` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fa`
--

CREATE TABLE `fa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mutu` varchar(255) NOT NULL,
  `pasir` float NOT NULL,
  `dust` float NOT NULL,
  `split` float NOT NULL,
  `additive_d` float DEFAULT NULL,
  `additive_f` float DEFAULT NULL,
  `additive_1g` float DEFAULT NULL,
  `additive_2g` float DEFAULT NULL,
  `semen` float NOT NULL,
  `fly_ash` float NOT NULL,
  `air` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `konversi`
--

CREATE TABLE `konversi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pasir` float NOT NULL,
  `split` float NOT NULL,
  `screening` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konversi`
--

INSERT INTO `konversi` (`id`, `pasir`, `split`, `screening`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1400, 1350, 1350, NULL, '2024-08-19 07:21:01', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nfa`
--

CREATE TABLE `nfa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mutu` varchar(255) NOT NULL,
  `pasir` float NOT NULL,
  `dust` float NOT NULL,
  `split` float NOT NULL,
  `additive_d` float DEFAULT NULL,
  `additive_f` float DEFAULT NULL,
  `additive_1g` float DEFAULT NULL,
  `additive_2g` float DEFAULT NULL,
  `semen` float NOT NULL,
  `air` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemakaian_manual`
--

CREATE TABLE `pemakaian_manual` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `material` varchar(255) NOT NULL,
  `qty` float NOT NULL,
  `ket` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemakaian_manual`
--

INSERT INTO `pemakaian_manual` (`id`, `tanggal`, `material`, `qty`, `ket`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(4, '2024-08-22', 'Split 10-20', 10, 'tes', '2024-08-22 03:01:39', '2024-08-22 03:01:39', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_material`
--

CREATE TABLE `pembelian_material` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_po` date NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `no_po` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_include` int(11) NOT NULL,
  `total_po_keluar` int(11) NOT NULL,
  `ket_payment` varchar(255) NOT NULL,
  `bayar` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `kurang_bayar` int(11) DEFAULT 0,
  `ket` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `solar`
--

CREATE TABLE `solar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `pemakaian` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `special`
--

CREATE TABLE `special` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mutu` varchar(255) NOT NULL,
  `pasir` float NOT NULL,
  `dust` float NOT NULL,
  `split` float NOT NULL,
  `screening` float NOT NULL,
  `additive_d` float DEFAULT NULL,
  `additive_f` float DEFAULT NULL,
  `additive_1g` float DEFAULT NULL,
  `additive_2g` float DEFAULT NULL,
  `semen` float NOT NULL,
  `fly_ash` float DEFAULT NULL,
  `air` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `periode` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `pasir_cilegon` float DEFAULT NULL,
  `pasir_tayan` float DEFAULT NULL,
  `split_10_20` float DEFAULT NULL,
  `split_screening` float DEFAULT NULL,
  `fly_ash` float DEFAULT NULL,
  `semen_hc` float DEFAULT NULL,
  `semen_opc` float DEFAULT NULL,
  `abu_batu` float DEFAULT NULL,
  `additive_d` float DEFAULT NULL,
  `additive_f` float DEFAULT NULL,
  `additive_1g` float DEFAULT NULL,
  `additive_2g` float DEFAULT NULL,
  `air` float DEFAULT NULL,
  `solar` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `periode`, `tanggal`, `pasir_cilegon`, `pasir_tayan`, `split_10_20`, `split_screening`, `fly_ash`, `semen_hc`, `semen_opc`, `abu_batu`, `additive_d`, `additive_f`, `additive_1g`, `additive_2g`, `air`, `solar`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(5, 'Aug', '2024-08-19', 14700, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-19 09:51:28', '2024-08-19 09:51:28', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock_total`
--

CREATE TABLE `stock_total` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pasir_cilegon` float NOT NULL,
  `pasir_tayan` float NOT NULL,
  `split_10_20` float NOT NULL,
  `split_screening` float NOT NULL,
  `fly_ash` float NOT NULL,
  `semen_hc` float NOT NULL,
  `semen_opc` float NOT NULL,
  `abu_batu` float NOT NULL,
  `additive_d` float NOT NULL,
  `additive_f` float NOT NULL,
  `additive_1g` float NOT NULL,
  `additive_2g` float NOT NULL,
  `air` float NOT NULL,
  `solar` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_total`
--

INSERT INTO `stock_total` (`id`, `pasir_cilegon`, `pasir_tayan`, `split_10_20`, `split_screening`, `fly_ash`, `semen_hc`, `semen_opc`, `abu_batu`, `additive_d`, `additive_f`, `additive_1g`, `additive_2g`, `air`, `solar`, `created_at`, `updated_at`) VALUES
(1, 29400, 0, -20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-08-13 09:38:35', '2024-08-22 03:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_level` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `id_level`, `created_at`, `updated_at`) VALUES
(1, 'Management PSC', 'management@gmail.com', '$2y$12$5WZEkQUmdaduRttGEUYn2e9gJ72m/O/qkfGfU1IocnfXL4u1NpFi2', 1, '2024-08-18 10:16:44', '2024-08-18 10:16:44'),
(2, 'Finance PSC', 'finance@gmail.com', '$2y$12$31vWn5OOER9b93Qwh.OmmO9TvcpvnWwpP1awPjeWKRqMTdNq9463G', 2, '2024-08-18 10:16:44', '2024-08-18 10:16:44'),
(3, 'Logistic PSC', 'logistic@gmail.com', '$2y$12$Kor0BinKS8.QkT8tG93b8.3xFPvrONuyffNLmK5H8PtWMJI9nxKQS', 3, '2024-08-18 10:16:44', '2024-08-18 10:16:44'),
(4, 'Didin PSC', 'didin@gmail.com', '$2y$12$oExnYJV0Gv6LKnw99K0nV.Mj3eLMg3mFHnHt9Qva24i3LJrRYDST6', 5, '2024-08-18 10:16:44', '2024-08-18 10:16:44'),
(5, 'Jalil PSC', 'jalil@gmail.com', '$2y$12$JoOPVYNoLGN27DQKt1DK2ej4cR9NBAZiN2yuqxD66G.sZNj8CrYbu', 3, '2024-08-18 10:16:44', '2024-08-18 10:16:44'),
(6, 'Abel PSC', 'abel@gmail.com', '$2y$12$HJ2VPoiva6NQoOGfhHVr1OO8kCYY1.N.HECvJs94y.XIPtX4/20CC', 2, '2024-08-18 10:16:44', '2024-08-18 10:16:44'),
(7, 'Marcel PSC', 'marcel@gmail.com', '$2y$12$9e6zRrql99zgixhLBdFCcONCYeHSHXK2S5urwUmOozA1Jy2OyZDsW', 2, '2024-08-18 10:16:44', '2024-08-18 10:16:44'),
(8, 'Technician PSC', 'teknisi@gmail.com', '$2y$12$X57iREMDmVMl0aPKAqY/UOpwHT8tzn2qEUmBhWxzj/Ny5xIIfjAku', 5, '2024-08-18 10:16:44', '2024-08-18 10:16:44'),
(9, 'Edy Sudrajat PSC', 'edy@gmail.com', '$2y$12$k4mbjhXW0vyIDJGlQjypWeOWkNMHezgs4rma73Q.tfz78/ixqxR4e', 6, '2024-08-19 07:13:41', '2024-08-19 07:13:41'),
(10, 'Harry Rusli PSC', 'harry@gmail.com', '$2y$12$Rtbx5ryUsEkxiU0jjm23QOJSUBAh8taHbz54gezuhpHVZdd5/rv3G', 6, '2024-08-19 07:13:41', '2024-08-19 07:13:41'),
(11, 'Gunadi PSC', 'gunadi@gmail.com', '$2y$12$5iW615ItZ/DNGnvMigZVvOQJLD0tHTYMKB/muIByedk5Ok0NzQILO', 6, '2024-08-19 07:13:41', '2024-08-19 07:13:41'),
(12, 'Dealer PSC', 'dealer@gmail.com', '$2y$12$xBqcA8jdiqbPBd2PJjGkTeBilbuW/8S5YxZJ20AwlKQ8/2FTJLj5i', 6, '2024-08-19 07:13:41', '2024-08-19 07:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `users_level`
--

CREATE TABLE `users_level` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_level`
--

INSERT INTO `users_level` (`id`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Management', NULL, NULL),
(2, 'Finance', NULL, NULL),
(3, 'Logistic', NULL, NULL),
(4, 'Technician', NULL, NULL),
(5, 'Tax Staff', NULL, NULL),
(6, 'Sales', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cash_flow`
--
ALTER TABLE `cash_flow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa`
--
ALTER TABLE `fa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konversi`
--
ALTER TABLE `konversi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nfa`
--
ALTER TABLE `nfa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemakaian_manual`
--
ALTER TABLE `pemakaian_manual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian_material`
--
ALTER TABLE `pembelian_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solar`
--
ALTER TABLE `solar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special`
--
ALTER TABLE `special`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_total`
--
ALTER TABLE `stock_total`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_level_foreign` (`id_level`);

--
-- Indexes for table `users_level`
--
ALTER TABLE `users_level`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cash_flow`
--
ALTER TABLE `cash_flow`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fa`
--
ALTER TABLE `fa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konversi`
--
ALTER TABLE `konversi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nfa`
--
ALTER TABLE `nfa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemakaian_manual`
--
ALTER TABLE `pemakaian_manual`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembelian_material`
--
ALTER TABLE `pembelian_material`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `solar`
--
ALTER TABLE `solar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `special`
--
ALTER TABLE `special`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stock_total`
--
ALTER TABLE `stock_total`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users_level`
--
ALTER TABLE `users_level`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_level_foreign` FOREIGN KEY (`id_level`) REFERENCES `users_level` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
