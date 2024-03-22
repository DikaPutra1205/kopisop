-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2024 at 07:17 PM
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
-- Database: `kopi`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_orders`
--

CREATE TABLE `detail_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_order` bigint(20) UNSIGNED NOT NULL,
  `id_menu` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_orders`
--

INSERT INTO `detail_orders` (`id`, `id_order`, `id_menu`, `qty`, `created_at`, `updated_at`) VALUES
(20, 28, 16, 3, NULL, NULL),
(21, 29, 16, 3, NULL, NULL),
(22, 29, 12, 2, NULL, NULL),
(23, 30, 12, 2, NULL, NULL),
(24, 30, 16, 7, NULL, NULL),
(25, 31, 16, 4, NULL, NULL),
(26, 31, 12, 1, NULL, NULL),
(27, 32, 16, 2, NULL, NULL),
(28, 32, 12, 3, NULL, NULL),
(29, 33, 16, 1, NULL, NULL),
(30, 34, 16, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log_activities`
--

CREATE TABLE `log_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `activity` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_activities`
--

INSERT INTO `log_activities` (`id`, `user_id`, `activity`, `created_at`, `updated_at`) VALUES
(1, 5, 'Unknown Activity', '2024-02-03 04:03:05', '2024-02-03 04:03:05'),
(2, 5, 'Unknown Activity', '2024-02-03 04:06:27', '2024-02-03 04:06:27'),
(3, 5, 'logged in', '2024-02-03 04:07:37', '2024-02-03 04:07:37'),
(4, 5, 'Unknown Activity', '2024-02-03 04:07:37', '2024-02-03 04:07:37'),
(5, 5, 'logged in', '2024-02-03 04:08:48', '2024-02-03 04:08:48'),
(6, 5, 'Unknown Activity', '2024-02-03 04:08:48', '2024-02-03 04:08:48'),
(7, 5, 'logged in', '2024-02-03 04:10:39', '2024-02-03 04:10:39'),
(8, 5, 'Unknown Activity', '2024-02-03 04:10:39', '2024-02-03 04:10:39'),
(9, 5, 'Logged In', '2024-02-03 04:16:24', '2024-02-03 04:16:24'),
(10, 5, 'Logged In', '2024-02-03 04:16:48', '2024-02-03 04:16:48'),
(11, 5, 'Logged In', '2024-02-03 04:20:03', '2024-02-03 04:20:03'),
(12, 5, 'Created Order', '2024-02-03 04:20:14', '2024-02-03 04:20:14'),
(13, 5, 'Logged In', '2024-02-03 04:28:39', '2024-02-03 04:28:39'),
(14, 5, 'Logged in', '2024-02-03 04:33:14', '2024-02-03 04:33:14'),
(15, 5, 'Created Order', '2024-02-03 04:33:30', '2024-02-03 04:33:30'),
(16, 5, 'Created Order', '2024-02-03 04:34:52', '2024-02-03 04:34:52'),
(17, 5, 'Logged Out', '2024-02-03 04:35:03', '2024-02-03 04:35:03'),
(18, 5, 'Logged In', '2024-02-03 04:37:30', '2024-02-03 04:37:30'),
(19, 5, 'Logged Out', '2024-02-03 04:37:38', '2024-02-03 04:37:38'),
(20, 5, 'Logged In', '2024-02-03 22:04:42', '2024-02-03 22:04:42'),
(21, 5, 'Created Order', '2024-02-03 22:04:50', '2024-02-03 22:04:50'),
(22, 5, 'Created Order', '2024-02-03 22:08:06', '2024-02-03 22:08:06'),
(23, 5, 'Created Order', '2024-02-03 22:10:08', '2024-02-03 22:10:08'),
(24, 5, 'Created Order', '2024-02-03 22:28:10', '2024-02-03 22:28:10'),
(25, 5, 'Created Order', '2024-02-03 22:47:09', '2024-02-03 22:47:09'),
(26, 5, 'Created Order', '2024-02-04 01:11:52', '2024-02-04 01:11:52'),
(27, 5, 'Logged Out', '2024-02-04 01:34:47', '2024-02-04 01:34:47'),
(28, 5, 'Logged In', '2024-02-04 08:39:24', '2024-02-04 08:39:24'),
(29, 5, 'Created Order', '2024-02-04 08:48:05', '2024-02-04 08:48:05'),
(30, 5, 'Logged Out', '2024-02-04 09:08:15', '2024-02-04 09:08:15'),
(31, 5, 'Logged In', '2024-02-04 09:08:19', '2024-02-04 09:08:19'),
(32, 5, 'Logged Out', '2024-02-04 09:16:55', '2024-02-04 09:16:55'),
(33, 5, 'Logged In', '2024-02-04 09:18:33', '2024-02-04 09:18:33'),
(34, 5, 'Created Order', '2024-02-04 09:18:59', '2024-02-04 09:18:59'),
(35, 5, 'Logged Out', '2024-02-04 09:21:39', '2024-02-04 09:21:39'),
(36, 5, 'Logged In', '2024-02-04 09:46:00', '2024-02-04 09:46:00'),
(37, 5, 'Logged Out', '2024-02-04 12:18:18', '2024-02-04 12:18:18'),
(38, 8, 'Logged In', '2024-02-04 12:59:30', '2024-02-04 12:59:30'),
(39, 8, 'Logged Out', '2024-02-04 12:59:44', '2024-02-04 12:59:44'),
(40, 5, 'Logged In', '2024-03-21 16:51:05', '2024-03-21 16:51:05'),
(41, 5, 'Created Order', '2024-03-21 17:16:56', '2024-03-21 17:16:56'),
(42, 5, 'Logged In', '2024-03-22 04:36:27', '2024-03-22 04:36:27'),
(43, 5, 'Created Order', '2024-03-22 04:36:35', '2024-03-22 04:36:35'),
(44, 5, 'Created Order', '2024-03-22 04:37:34', '2024-03-22 04:37:34'),
(45, 5, 'Logged Out', '2024-03-22 05:43:25', '2024-03-22 05:43:25'),
(46, 5, 'Logged In', '2024-03-22 05:45:41', '2024-03-22 05:45:41'),
(47, 5, 'Created Order', '2024-03-22 05:51:34', '2024-03-22 05:51:34'),
(48, 5, 'Logged Out', '2024-03-22 05:54:22', '2024-03-22 05:54:22'),
(49, 5, 'Logged In', '2024-03-22 05:57:38', '2024-03-22 05:57:38'),
(50, 5, 'Logged Out', '2024-03-22 05:58:30', '2024-03-22 05:58:30'),
(51, 5, 'Logged In', '2024-03-22 06:28:32', '2024-03-22 06:28:32'),
(52, 5, 'Created Order', '2024-03-22 06:28:38', '2024-03-22 06:28:38'),
(53, 5, 'Created Order', '2024-03-22 06:43:45', '2024-03-22 06:43:45'),
(54, 5, 'Created Order', '2024-03-22 06:50:57', '2024-03-22 06:50:57'),
(55, 5, 'Logged Out', '2024-03-22 06:55:33', '2024-03-22 06:55:33'),
(56, 5, 'Logged In', '2024-03-22 07:13:46', '2024-03-22 07:13:46'),
(57, 5, 'Created Order', '2024-03-22 07:13:51', '2024-03-22 07:13:51'),
(58, 5, 'Logged Out', '2024-03-22 07:14:31', '2024-03-22 07:14:31'),
(59, 5, 'Logged In', '2024-03-22 07:19:49', '2024-03-22 07:19:49'),
(60, 5, 'Created Order', '2024-03-22 07:19:53', '2024-03-22 07:19:53'),
(61, 5, 'Created Order', '2024-03-22 07:20:51', '2024-03-22 07:20:51'),
(62, 5, 'Created Order', '2024-03-22 07:21:03', '2024-03-22 07:21:03'),
(63, 5, 'Logged Out', '2024-03-22 07:48:39', '2024-03-22 07:48:39'),
(64, 5, 'Logged In', '2024-03-22 08:22:33', '2024-03-22 08:22:33'),
(65, 5, 'Created Order', '2024-03-22 08:47:07', '2024-03-22 08:47:07'),
(66, 5, 'Created Order', '2024-03-22 08:48:51', '2024-03-22 08:48:51'),
(67, 5, 'Logged Out', '2024-03-22 08:57:59', '2024-03-22 08:57:59'),
(68, 5, 'Logged In', '2024-03-22 09:25:07', '2024-03-22 09:25:07'),
(69, 5, 'Created Order', '2024-03-22 09:26:29', '2024-03-22 09:26:29'),
(70, 5, 'Created Order', '2024-03-22 09:39:53', '2024-03-22 09:39:53'),
(71, 5, 'Created Order', '2024-03-22 13:28:11', '2024-03-22 13:28:11'),
(72, 5, 'Created Order', '2024-03-22 13:32:20', '2024-03-22 13:32:20'),
(73, 5, 'Created Order', '2024-03-22 13:35:54', '2024-03-22 13:35:54'),
(74, 5, 'Created Order', '2024-03-22 13:39:49', '2024-03-22 13:39:49'),
(75, 5, 'Created Order', '2024-03-22 13:40:42', '2024-03-22 13:40:42'),
(76, 5, 'Logged Out', '2024-03-22 15:26:00', '2024-03-22 15:26:00'),
(77, 5, 'Logged In', '2024-03-22 15:26:26', '2024-03-22 15:26:26'),
(78, 5, 'Created Order', '2024-03-22 15:26:50', '2024-03-22 15:26:50'),
(79, 5, 'Logged Out', '2024-03-22 17:24:33', '2024-03-22 17:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `harga`, `image`, `created_at`, `updated_at`) VALUES
(12, 'kopi semanis kamu', 20000, 'images/1706575834.jpg', '2024-01-29 17:43:45', '2024-01-29 17:50:34'),
(16, 'Kopi Hitam', 10000, 'images/1706700534.jpg', '2024-01-31 04:28:54', '2024-01-31 04:28:54'),
(19, 'Es Memek', 1000000, 'images/1711128338.jpg', '2024-03-22 17:25:28', '2024-03-22 17:25:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_01_29_122138_create_menu_table', 1),
(3, '2024_01_30_012025_create_users_level_table', 2),
(4, '2024_01_30_012508_create_users_table', 3),
(5, '2024_01_31_131507_create_orders_table', 4),
(6, '2024_01_31_132526_create_detail_orders_table', 5),
(7, '2024_02_03_104744_create_log_activities_table', 6),
(8, '2024_02_04_193102_add_profile_picture_to_users_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_meja` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `bayar` int(11) DEFAULT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_meja`, `total`, `nama_pelanggan`, `status`, `bayar`, `created_by`, `created_at`, `updated_at`) VALUES
(28, 7, 30000, 'Dika', 'Completed', 35000, '5', '2024-03-22 09:39:53', '2024-03-22 09:51:42'),
(29, 7, 70000, 'Dika', 'Completed', 80000, '5', '2024-03-22 13:28:11', '2024-03-22 13:31:17'),
(30, 7, 110000, 'Dika', 'Completed', 0, '5', '2024-03-22 13:32:20', '2024-03-22 13:32:32'),
(31, 7, 70000, 'Dika', 'Completed', 0, '5', '2024-03-22 13:35:54', '2024-03-22 13:36:04'),
(32, 7, 80000, 'Auk', 'Completed', 90000, '5', '2024-03-22 13:39:49', '2024-03-22 13:40:07'),
(33, 7, 10000, 'Auk', 'Completed', 25000, '5', '2024-03-22 13:40:42', '2024-03-22 15:27:59'),
(34, 8, 20000, 'Dika', 'Pending', 0, '5', '2024-03-22 15:26:50', '2024-03-22 15:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_meja` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `dipesan_oleh` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `nomor_meja`, `status`, `dipesan_oleh`, `created_at`, `updated_at`) VALUES
(6, 'A3', 'In Use', 'Auk', '2024-03-22 07:48:45', '2024-03-22 09:26:29'),
(7, 'A6', 'Available', NULL, '2024-03-22 08:43:19', '2024-03-22 15:27:59'),
(8, 'A1', 'In Use', 'Dika', '2024-03-22 15:26:12', '2024-03-22 15:26:50');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `id_level`, `created_at`, `updated_at`, `profile_picture`) VALUES
(2, 'Risgan Paras', 'risgan@gmail.com', '$2y$12$8YkSD7zC090sRfnzBL41tuEdfl8Y.NWTf07OP1QN8JOXXtwCPqGsG', 1, '2024-01-29 18:35:43', '2024-01-31 03:22:23', NULL),
(4, 'Dika Putra Indra', 'dika@gmail.com', '$2y$12$2uE1XNoAzlxbtZYPXg.Hh.SmKo.FCokSi2LDyxtdYc4rrWAMEyPGK', 2, '2024-01-31 04:27:39', '2024-02-04 13:29:06', 'profile_pictures/1707053346.png'),
(5, 'Jekmis Tarigan', 'jemis@gmail.com', '$2y$12$fBzAai9rAe2vQcZc8WlMsulSAckpUYY/lrowfcGTtqV9knhdJkRka', 3, '2024-01-31 04:28:01', '2024-01-31 04:28:01', NULL),
(8, 'Dabidog', 'dabidog@gmail.com', '$2y$12$D8LAxYU0bO2ZkWe49n7wX.CuYoRy5.Un3oi7/TKiMDnWx9H4mULzK', 3, '2024-02-04 12:47:02', '2024-02-04 12:55:56', 'profile_pictures/1707051356.jpg'),
(9, 'Marcel', 'marcel@gmail.com', '$2y$12$tjAwrUA0G1JI.WI3GQ5Qh.EcDp6uStOfUWYK01rE44H4NDzgqDnXa', 4, '2024-03-22 05:56:14', '2024-03-22 05:56:14', 'profile_pictures/1711086974.jpg');

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
(1, 'Admin', NULL, NULL),
(2, 'Owner', NULL, NULL),
(3, 'Kasir', NULL, NULL),
(4, 'Waiter', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_orders_id_order_foreign` (`id_order`),
  ADD KEY `detail_orders_id_menu_foreign` (`id_menu`);

--
-- Indexes for table `log_activities`
--
ALTER TABLE `log_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_meja` (`id_meja`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
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
-- AUTO_INCREMENT for table `detail_orders`
--
ALTER TABLE `detail_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `log_activities`
--
ALTER TABLE `log_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_level`
--
ALTER TABLE `users_level`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD CONSTRAINT `detail_orders_id_menu_foreign` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`),
  ADD CONSTRAINT `detail_orders_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_meja`) REFERENCES `tables` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_level_foreign` FOREIGN KEY (`id_level`) REFERENCES `users_level` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
