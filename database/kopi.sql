-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Feb 2024 pada 16.33
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

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
-- Struktur dari tabel `detail_orders`
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
-- Dumping data untuk tabel `detail_orders`
--

INSERT INTO `detail_orders` (`id`, `id_order`, `id_menu`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 12, 2, NULL, NULL),
(2, 1, 16, 3, NULL, NULL),
(3, 2, 12, 2, NULL, NULL),
(4, 2, 16, 2, NULL, NULL),
(6, 4, 16, 1, NULL, NULL),
(7, 5, 12, 1, NULL, NULL),
(8, 6, 12, 2, '2024-02-04 05:06:24', NULL),
(9, 6, 16, 1, NULL, NULL),
(10, 7, 16, 2, NULL, NULL),
(11, 8, 12, 2, NULL, NULL),
(13, 9, 16, 3, NULL, NULL),
(14, 10, 12, 2, NULL, NULL),
(15, 11, 12, 2, NULL, NULL),
(16, 12, 16, 3, NULL, NULL),
(20, 13, 16, 6, NULL, NULL),
(21, 13, 12, 4, NULL, NULL),
(24, 3, 12, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_activities`
--

CREATE TABLE `log_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `activity` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `log_activities`
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
(39, 8, 'Logged Out', '2024-02-04 12:59:44', '2024-02-04 12:59:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
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
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `harga`, `image`, `created_at`, `updated_at`) VALUES
(12, 'kopi semanis kamu', 20000, 'images/1706575834.jpg', '2024-01-29 17:43:45', '2024-01-29 17:50:34'),
(16, 'Kopi Hitam', 10000, 'images/1706700534.jpg', '2024-01-31 04:28:54', '2024-01-31 04:28:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_meja` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `nomor_meja`, `total`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'A1', 70000, '2', '2024-02-03 01:49:28', '2024-02-03 01:49:42'),
(2, 'A2', 60000, '2', '2024-02-03 03:38:01', '2024-02-03 03:38:27'),
(3, 'A3', 70000, '5', '2024-02-03 04:20:14', '2024-02-04 11:04:51'),
(4, 'A1', 10000, '5', '2024-02-03 04:33:30', '2024-02-03 04:33:39'),
(5, 'B7', 20000, '5', '2024-02-03 04:34:52', '2024-02-03 04:34:55'),
(6, 'A2', 50000, '5', '2024-02-03 22:04:50', '2024-02-03 22:04:56'),
(7, 'A3', 20000, '5', '2024-02-03 22:08:06', '2024-02-03 22:08:09'),
(8, 'B7', 40000, '5', '2024-02-03 22:10:08', '2024-02-03 22:10:11'),
(9, 'B7', 30000, '5', '2024-02-03 22:28:10', '2024-02-03 22:46:49'),
(10, 'A1', 40000, '5', '2024-02-03 22:47:09', '2024-02-03 22:47:12'),
(11, 'A1', 40000, '5', '2024-02-04 01:11:52', '2024-02-04 01:11:54'),
(12, 'A2', 30000, '5', '2024-02-04 08:48:05', '2024-02-04 08:48:08'),
(13, 'A1', 140000, '5', '2024-02-04 09:18:59', '2024-02-04 12:17:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `id_level`, `created_at`, `updated_at`, `profile_picture`) VALUES
(2, 'Risgan Paras', 'risgan@gmail.com', '$2y$12$8YkSD7zC090sRfnzBL41tuEdfl8Y.NWTf07OP1QN8JOXXtwCPqGsG', 1, '2024-01-29 18:35:43', '2024-01-31 03:22:23', NULL),
(4, 'Dika Putra Indra', 'dika@gmail.com', '$2y$12$2uE1XNoAzlxbtZYPXg.Hh.SmKo.FCokSi2LDyxtdYc4rrWAMEyPGK', 2, '2024-01-31 04:27:39', '2024-02-04 13:29:06', 'profile_pictures/1707053346.png'),
(5, 'Jekmis Tarigan', 'jemis@gmail.com', '$2y$12$fBzAai9rAe2vQcZc8WlMsulSAckpUYY/lrowfcGTtqV9knhdJkRka', 3, '2024-01-31 04:28:01', '2024-01-31 04:28:01', NULL),
(8, 'Dabidog', 'dabidog@gmail.com', '$2y$12$D8LAxYU0bO2ZkWe49n7wX.CuYoRy5.Un3oi7/TKiMDnWx9H4mULzK', 3, '2024-02-04 12:47:02', '2024-02-04 12:55:56', 'profile_pictures/1707051356.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_level`
--

CREATE TABLE `users_level` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users_level`
--

INSERT INTO `users_level` (`id`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Manajer', NULL, NULL),
(3, 'Kasir', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_orders_id_order_foreign` (`id_order`),
  ADD KEY `detail_orders_id_menu_foreign` (`id_menu`);

--
-- Indeks untuk tabel `log_activities`
--
ALTER TABLE `log_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_level_foreign` (`id_level`);

--
-- Indeks untuk tabel `users_level`
--
ALTER TABLE `users_level`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_orders`
--
ALTER TABLE `detail_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `log_activities`
--
ALTER TABLE `log_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users_level`
--
ALTER TABLE `users_level`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD CONSTRAINT `detail_orders_id_menu_foreign` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`),
  ADD CONSTRAINT `detail_orders_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_level_foreign` FOREIGN KEY (`id_level`) REFERENCES `users_level` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
