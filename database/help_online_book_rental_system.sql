-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 12, 2023 at 06:27 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `help_online_book_rental_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(11, 'Zulkar Nain', 'zulkarnain4543@gmail.com', '$2y$10$NsDA6lEIAbawl4bRWH4esONuVgWKsvvnkZ5i3HaaltqNsg/Vd3QKu', '2021-03-12 06:34:26', '2005-10-11 04:24:56'),
(12, 'Admin Panel', 'admin@gmail.com', '$2y$10$YuxYIFANOvZNpLIorSrA/.7I4D6W2NGxkgu5lnZZnWah./8ae3aFi', '1996-10-02 12:40:22', '2005-05-14 05:00:35'),
(13, 'Mrs. Vivien Dach', 'wbecker@yahoo.com', '$2y$10$.UXOwpWi6uaIgoHjMW3vu.mtZUPLr5RWH3.cDeR94NP9zp/StyMEG', '2017-06-16 21:04:31', '2001-02-11 22:39:47'),
(14, 'Dr. Norval Strosin', 'creinger@mante.com', '$2y$10$UBq2.VXgJNzd4ZZYyVCbzORh5khkg/QNqH6UqwmNuSmPCXgf8Pg6m', '1986-05-02 18:54:48', '2013-01-11 17:07:20'),
(15, 'Miss Myrtie Rippin', 'okeefe.madeline@rippin.com', '$2y$10$5.28.yWugevHPiHtkGc9PuoyttgVhxbRpVmgpO8/d4VRnD/EuSF0C', '2015-08-23 02:44:12', '1999-11-21 17:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `ebooks`
--

CREATE TABLE `ebooks` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `writer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pages` int DEFAULT NULL,
  `price` int NOT NULL DEFAULT '0',
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'English',
  `book_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ebooks`
--

INSERT INTO `ebooks` (`id`, `title`, `slug`, `writer`, `publisher`, `edition`, `pages`, `price`, `language`, `book_url`, `summary`, `status`, `created_at`, `updated_at`) VALUES
('99986c95-d698-4f9a-b6b6-6a4bb2093178', 'Object Oriented Programming II', 'object-oriented-programming-ii', 'Dr. Hasibul Islam', 'Northern University', 'First Edition, 20-05-2020', 40, 600, 'English', 'https://stackoverflow.com/', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. \r\n\r\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, '2023-07-08 00:55:58', '2023-07-08 01:30:44'),
('99992bd3-3e61-4bfd-aa34-692157e4b82a', 'Data Structure and Algorithm', 'data-structure-and-algorithm', 'Dr. Abul Kalam Azad', 'Dhaka University', '2nd Edition, 2020', 1200, 2000, 'English', 'https://mu.ac.in/wp-content/uploads/2021/05/Data-Structure-Final-.pdf', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2023-07-08 09:50:43', '2023-07-09 09:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(36, '2014_10_12_000000_create_users_table', 1),
(37, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(38, '2019_08_19_000000_create_failed_jobs_table', 1),
(39, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(40, '2023_07_07_183756_create_ebooks_table', 1),
(41, '2023_07_08_080659_create_admins_table', 2),
(44, '2023_07_11_174739_create_rents_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rents`
--

CREATE TABLE `rents` (
  `id` bigint UNSIGNED NOT NULL,
  `ebook_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `payment_status` enum('Pending','Completed','Rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rents`
--

INSERT INTO `rents` (`id`, `ebook_id`, `user_id`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, '99986c95-d698-4f9a-b6b6-6a4bb2093178', 9, 'Rejected', '2023-07-11 20:50:59', '2023-07-12 00:14:34'),
(2, '99992bd3-3e61-4bfd-aa34-692157e4b82a', 10, 'Completed', '2023-07-11 20:50:59', '2023-07-11 20:50:59'),
(3, '99986c95-d698-4f9a-b6b6-6a4bb2093178', 11, 'Rejected', '2023-07-11 20:50:59', '2023-07-12 00:14:41'),
(4, '99992bd3-3e61-4bfd-aa34-692157e4b82a', 11, 'Completed', '2023-07-11 20:50:59', '2023-07-11 20:50:59'),
(5, '99992bd3-3e61-4bfd-aa34-692157e4b82a', 11, 'Completed', '2023-07-11 23:42:53', '2023-07-12 00:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Vance Lubowitz', 'user@gmail.com', '2023-07-08 08:33:00', '$2y$10$Qem1Envj35TevJdE9upqyezm4BqUqn8sOjqTQjo8azWNoLfCaJ.9y', 'ZILYLO5Wpv8D6MV4Z0AnoMd60s8KHQ4IJPCdUWpacWBpSRIu2WOpWQjdoOLi', '2023-07-08 08:33:01', '2023-07-08 08:33:01'),
(2, 'Keagan Bauch', 'jackie44@example.com', '2023-07-08 08:33:00', '$2y$10$OYUZlz38zyozLCbuS5tD0uXJ8zEuYeYtG9U8B9oYfC7.VqUFYmj4m', '1NVeYFHdYu', '2023-07-08 08:33:01', '2023-07-08 08:33:01'),
(3, 'Sheila Senger IV', 'freddie96@example.net', '2023-07-08 08:33:00', '$2y$10$3Ml6tyhDl3rpEnbJJthnnegds32DEdNAfFzu.YYAiO7dbRqp9Hpq6', 'HEsp7GmM8N', '2023-07-08 08:33:01', '2023-07-08 08:33:01'),
(4, 'Tyshawn Emard', 'leta.beer@example.net', '2023-07-08 08:33:00', '$2y$10$7Uh1sXhBUPTtHyDrvp6wW.7aKp9z9TA41JCwq09F.XUDBHRux3tRO', 'bS2XeYU6al', '2023-07-08 08:33:01', '2023-07-08 08:33:01'),
(5, 'Providenci Legros MD', 'feest.raymundo@example.org', '2023-07-08 08:33:01', '$2y$10$VpZVfLh/sGPINZmHmRPUxOxsssEB38xjaBfe9VHUR5w3Wrj3ZtcEm', 'w3FObYjH4V', '2023-07-08 08:33:01', '2023-07-08 08:33:01'),
(6, 'Kristina Morar', 'uhoeger@example.net', '2023-07-08 08:33:01', '$2y$10$o59PKn4.CfljIbpxts7R5OTi5.BbOZa3ZEnXC8zJasf4ZiaVebYPi', 'N82TPjbczm', '2023-07-08 08:33:01', '2023-07-08 08:33:01'),
(7, 'Merritt Fritsch IV', 'upton.jacynthe@example.org', '2023-07-08 08:33:01', '$2y$10$gbS8OxrjGzpyM1LLX2udHe4sglQU3vT8gFlp5aoFCJtNfcBDtEdDy', 'F3yEzUAeWz', '2023-07-08 08:33:01', '2023-07-08 08:33:01'),
(8, 'Leopold Stiedemann', 'gstrosin@example.com', '2023-07-08 08:33:01', '$2y$10$NPTwRJyD1YQI3l0eWxgnMe1wg2/88fWcfgSFwtWF8NXAo3.SRJl1O', 'xfmeUDeXye', '2023-07-08 08:33:01', '2023-07-08 08:33:01'),
(9, 'Amya Sipes V', 'iweimann@example.net', '2023-07-08 08:33:01', '$2y$10$yo3UwHTdVX8/YW4snbbcZOAkCF7Kixz7.hHqOCbGSSnGiqqCMyST.', '0GCWPs5BD6', '2023-07-08 08:33:01', '2023-07-08 08:33:01'),
(10, 'Ardith Schmeler', 'bud.beatty@example.net', '2023-07-08 08:33:01', '$2y$10$AwBRnBb7mKee.llEvnfpB.LrlGKGl65kYmV99nTkfXncfFXwAoLAG', 'dMp9oModtD', '2023-07-08 08:33:01', '2023-07-08 08:33:01'),
(11, 'Md. Chanchal Biswas', 'mchanchalbd@gmail.com', NULL, '$2y$10$Qem1Envj35TevJdE9upqyezm4BqUqn8sOjqTQjo8azWNoLfCaJ.9y', NULL, '2023-07-08 09:26:04', '2023-07-08 09:26:04'),
(12, 'Md. Chanchal Biswas', 'bchanchalbd@gmail.com', NULL, '$2y$10$sY.tl41roqVUdiLf/b9LNeasvtJBxWPbXEl/xaUq2kcO1ZvqN1uTq', NULL, '2023-07-09 09:47:13', '2023-07-09 09:47:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `ebooks`
--
ALTER TABLE `ebooks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ebooks_title_unique` (`title`),
  ADD UNIQUE KEY `ebooks_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rents`
--
ALTER TABLE `rents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rents_ebook_id_foreign` (`ebook_id`),
  ADD KEY `rents_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rents`
--
ALTER TABLE `rents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rents`
--
ALTER TABLE `rents`
  ADD CONSTRAINT `rents_ebook_id_foreign` FOREIGN KEY (`ebook_id`) REFERENCES `ebooks` (`id`),
  ADD CONSTRAINT `rents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
