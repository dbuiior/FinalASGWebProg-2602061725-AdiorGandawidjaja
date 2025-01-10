-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2025 at 12:03 PM
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
-- Database: `connectfriend`
--

-- --------------------------------------------------------

--
-- Table structure for table `avatar`
--

CREATE TABLE `avatar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `urlProfile` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `avatar`
--

INSERT INTO `avatar` (`id`, `name`, `urlProfile`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Gaiman Nashiruddin', 'assets/avatar1.jpg', 8965, '2025-01-10 03:09:18', '2025-01-10 03:09:18'),
(2, 'Lalita Mayasari', 'assets/avatar2.jpg', 75011, '2025-01-10 03:09:18', '2025-01-10 03:09:18'),
(3, 'Gina Suartini S.Kom', 'assets/avatar3.jpg', 60484, '2025-01-10 03:09:18', '2025-01-10 03:09:18'),
(4, 'Aurora Padmasari', 'assets/avatar4.jpg', 49435, '2025-01-10 03:09:18', '2025-01-10 03:09:18'),
(5, 'Asmuni Mahendra', 'assets/avatar5.jpg', 19347, '2025-01-10 03:09:18', '2025-01-10 03:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `friend_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`friend_id`, `user_id`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 1, 1, '2025-01-10 03:14:56', '2025-01-10 03:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_09_055955_create_avatar_table', 1),
(5, '2025_01_09_060019_create_transaction_table', 1),
(6, '2025_01_09_060037_create_work_table', 1),
(7, '2025_01_09_060845_create_friend_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('oOIbNOOzYB43KP8OqwEcLWflbNBUwC30XNMBoiiV', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoieVk4SXNJdVVwbGlDRWtrQngxbTJocXRDdTF6WjZaak9vTFVoZzJ6TiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTczNjUwNjM0Mjt9fQ==', 1736506519);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `avatar_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`user_id`, `avatar_id`, `created_at`, `updated_at`) VALUES
(2, 4, '2025-01-10 03:23:23', '2025-01-10 03:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `registration_price` int(11) NOT NULL,
  `coins` int(11) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `profession` varchar(255) NOT NULL DEFAULT 'Unemployed',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`, `linkedin`, `mobile_number`, `registration_price`, `coins`, `profile_picture`, `profession`, `is_active`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Adior Gandawidjaja', 'adior@gmail.com', 'Male', 'https://www.linkedin.com/in/adior-gandawidjaja-8212ab293', '0812312345', 124377, 5668, 'assets/default.jpg', 'Unemployed', 1, NULL, '$2y$12$cgwCqI1SdVoUrwhEWATLmODpvHoSVNEecgNrsF1h3xXw6YxDKgMBO', NULL, '2025-01-10 03:05:01', '2025-01-10 03:32:27'),
(2, 'Elma Riyanti', 'xhasanah@halimah.name', 'Female', 'https://www.linkedin.com/in/adior-gandawidjaja-8212ab293/', '(+62) 721 3230 3117', 119879, 33075, 'assets/avatar4.jpg', 'Kepala Desa', 1, NULL, '$2y$12$hmRz3c8Prsb/y6.b1JDGBec7hRDCzAc98f9pq/Ga/ShSKXuVz0KmO', NULL, '2025-01-10 03:09:15', '2025-01-10 03:26:41'),
(3, 'Ade Mayasari M.Ak', 'nlestari@gmail.com', 'Female', 'https://www.linkedin.com/in/adior-gandawidjaja-8212ab293/', '0240 2265 9980', 106834, 1090, 'assets/person2.jpg', 'Dosen', 1, NULL, '$2y$12$l2CODbB52xDop4b0nKY2N.U4s.yxCRyOQy3PiIQl4pLZOJxbVc9le', NULL, '2025-01-10 03:09:16', '2025-01-10 03:09:16'),
(4, 'Belinda Putri Yuniar', 'teguh10@yahoo.co.id', 'Female', 'https://www.linkedin.com/in/adior-gandawidjaja-8212ab293/', '(+62) 26 8803 7108', 108518, 2594, 'assets/person3.jpg', 'Programmer', 1, NULL, '$2y$12$Y9UJqRlllfzdFmbMqf3ISe94WeS0exGRqwp.5B99a0OFthQKO9P2m', NULL, '2025-01-10 03:09:16', '2025-01-10 03:09:16'),
(5, 'Jarwadi Ega Lazuardi', 'tnajmudin@yahoo.com', 'Female', 'https://www.linkedin.com/in/adior-gandawidjaja-8212ab293/', '(+62) 230 2647 187', 112429, 5200, 'assets/person4.jpg', 'Penyelam', 1, NULL, '$2y$12$UumQl4ryQHh5kASdmhQRwOXt9jdo3kd1iDX.VxMEcWc.f8E8/ohGS', NULL, '2025-01-10 03:09:16', '2025-01-10 03:09:16'),
(6, 'Maria Puti Zulaika', 'tzulaika@novitasari.biz', 'Female', 'https://www.linkedin.com/in/adior-gandawidjaja-8212ab293/', '0402 6913 3812', 116061, 2616, 'assets/person5.jpg', 'Wiraswasta', 1, NULL, '$2y$12$b2VBw97VfdCGkwmdP5EW0OcVaUngA8rak9utGupog9.vguNb/Jyc2', NULL, '2025-01-10 03:09:16', '2025-01-10 03:09:16'),
(7, 'Luis Atma Marpaung S.IP', 'sprastuti@andriani.mil.id', 'Female', 'https://www.linkedin.com/in/adior-gandawidjaja-8212ab293/', '(+62) 728 5169 4831', 107699, 2518, 'assets/person6.jpg', 'Pendeta', 1, NULL, '$2y$12$U0yv.EfDHLBAbqDDw2p88u6eFNdvBVG4iiaiEB4Z6ccKECbCN5lfC', NULL, '2025-01-10 03:09:17', '2025-01-10 03:09:17'),
(8, 'Bakiadi Haryanto', 'jaga33@yahoo.com', 'Male', 'https://www.linkedin.com/in/adior-gandawidjaja-8212ab293/', '(+62) 770 6191 917', 124292, 7157, 'assets/person7.jpg', 'Pramugari', 1, NULL, '$2y$12$GNAJ5mSbycDzcpAUg7KcCeOvXjEFGBqpSBwDc7T7mFFWV68Ou57yu', NULL, '2025-01-10 03:09:17', '2025-01-10 03:09:17'),
(9, 'Irfan Wardi Mangunsong M.Ak', 'raharja38@kuswandari.org', 'Female', 'https://www.linkedin.com/in/adior-gandawidjaja-8212ab293/', '(+62) 485 7084 533', 111382, 9190, 'assets/person8.jpg', 'Pendeta', 1, NULL, '$2y$12$FOM6RHm4OzLIUOVCYOVAjeTMW/iZYyYmEoqvZO2L2J.geebKAGv9e', NULL, '2025-01-10 03:09:17', '2025-01-10 03:09:17'),
(10, 'Qori Hasanah', 'septi.simbolon@wibisono.desa.id', 'Male', 'https://www.linkedin.com/in/adior-gandawidjaja-8212ab293/', '(+62) 723 1674 6036', 113595, 7869, 'assets/person9.jpg', 'Tukang Las / Pandai Besi', 1, NULL, '$2y$12$nc8hoUemjivH2Vb3D44CD.eMW5ZafUkXVodB6FAeCbHF9oEOzZcMe', NULL, '2025-01-10 03:09:17', '2025-01-10 03:09:17'),
(11, 'Eluh Budiyanto S.IP', 'snurdiyanti@gmail.com', 'Male', 'https://www.linkedin.com/in/adior-gandawidjaja-8212ab293/', '0873 591 967', 109226, 6800, 'assets/person10.jpg', 'Kepolisian RI (POLRI)', 1, NULL, '$2y$12$xV3NXvE/G7mYTXUn9OTqZ.x58Pl4mj1Lk/E/TnVEFgz8aufJnJc3y', NULL, '2025-01-10 03:09:18', '2025-01-10 03:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Data', '2025-01-10 03:05:01', '2025-01-10 03:05:01'),
(2, 1, 'Designer', '2025-01-10 03:05:01', '2025-01-10 03:05:01'),
(3, 1, 'Doctor', '2025-01-10 03:05:01', '2025-01-10 03:05:01'),
(4, 2, 'Tukang Batu', '2025-01-10 03:09:15', '2025-01-10 03:09:15'),
(5, 2, 'Wartawan', '2025-01-10 03:09:15', '2025-01-10 03:09:15'),
(6, 2, 'Wartawan', '2025-01-10 03:09:15', '2025-01-10 03:09:15'),
(7, 3, 'Masinis', '2025-01-10 03:09:16', '2025-01-10 03:09:16'),
(8, 3, 'Konsultan', '2025-01-10 03:09:16', '2025-01-10 03:09:16'),
(9, 3, 'Peneliti', '2025-01-10 03:09:16', '2025-01-10 03:09:16'),
(10, 4, 'Peneliti', '2025-01-10 03:09:16', '2025-01-10 03:09:16'),
(11, 4, 'Seniman', '2025-01-10 03:09:16', '2025-01-10 03:09:16'),
(12, 4, 'Mengurus Rumah Tangga', '2025-01-10 03:09:16', '2025-01-10 03:09:16'),
(13, 5, 'Paraji', '2025-01-10 03:09:16', '2025-01-10 03:09:16'),
(14, 5, 'Paraji', '2025-01-10 03:09:16', '2025-01-10 03:09:16'),
(15, 5, 'Guru', '2025-01-10 03:09:16', '2025-01-10 03:09:16'),
(16, 6, 'Tabib', '2025-01-10 03:09:16', '2025-01-10 03:09:16'),
(17, 6, 'Hakim', '2025-01-10 03:09:16', '2025-01-10 03:09:16'),
(18, 6, 'Tukang Cukur', '2025-01-10 03:09:16', '2025-01-10 03:09:16'),
(19, 7, 'Buruh Harian Lepas', '2025-01-10 03:09:17', '2025-01-10 03:09:17'),
(20, 7, 'Juru Masak', '2025-01-10 03:09:17', '2025-01-10 03:09:17'),
(21, 7, 'Ustaz / Mubaligh', '2025-01-10 03:09:17', '2025-01-10 03:09:17'),
(22, 8, 'Akuntan', '2025-01-10 03:09:17', '2025-01-10 03:09:17'),
(23, 8, 'Pedagang', '2025-01-10 03:09:17', '2025-01-10 03:09:17'),
(24, 8, 'Dosen', '2025-01-10 03:09:17', '2025-01-10 03:09:17'),
(25, 9, 'Perangkat Desa', '2025-01-10 03:09:17', '2025-01-10 03:09:17'),
(26, 9, 'Buruh Nelayan / Perikanan', '2025-01-10 03:09:17', '2025-01-10 03:09:17'),
(27, 9, 'Penulis', '2025-01-10 03:09:17', '2025-01-10 03:09:17'),
(28, 10, 'Seniman', '2025-01-10 03:09:17', '2025-01-10 03:09:17'),
(29, 10, 'Wiraswasta', '2025-01-10 03:09:17', '2025-01-10 03:09:17'),
(30, 10, 'Karyawan Honorer', '2025-01-10 03:09:17', '2025-01-10 03:09:17'),
(31, 11, 'Kepolisian RI (POLRI)', '2025-01-10 03:09:18', '2025-01-10 03:09:18'),
(32, 11, 'Pengacara', '2025-01-10 03:09:18', '2025-01-10 03:09:18'),
(33, 11, 'Tentara Nasional Indonesia (TNI)', '2025-01-10 03:09:18', '2025-01-10 03:09:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD KEY `friend_friend_id_foreign` (`friend_id`),
  ADD KEY `friend_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD KEY `transaction_user_id_foreign` (`user_id`),
  ADD KEY `transaction_avatar_id_foreign` (`avatar_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avatar`
--
ALTER TABLE `avatar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friend`
--
ALTER TABLE `friend`
  ADD CONSTRAINT `friend_friend_id_foreign` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `friend_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_avatar_id_foreign` FOREIGN KEY (`avatar_id`) REFERENCES `avatar` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `work`
--
ALTER TABLE `work`
  ADD CONSTRAINT `work_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
