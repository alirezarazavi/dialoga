-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2018 at 01:58 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dialoga`
--

-- --------------------------------------------------------

--
-- Table structure for table `dialogs`
--

CREATE TABLE `dialogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `imdb_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_id` int(10) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dialogs`
--

INSERT INTO `dialogs` (`id`, `imdb_id`, `movie_id`, `user_id`, `text`, `point_count`, `created_at`, `updated_at`) VALUES
(1, 'tt3783958', 1, 2, 'دیالوگ فیلم لالالند', 0, '2017-12-28 09:58:44', '2017-12-28 09:58:44'),
(2, 'tt0103064', NULL, 2, 'دیالوگ فیلم ترمیناتور ۲', 0, '2018-02-20 13:12:35', '2018-02-20 13:12:35'),
(3, 'tt2370248', NULL, 2, 'adfasff', 0, '2018-02-20 13:32:40', '2018-02-20 13:32:40'),
(4, 'tt0101048', NULL, 2, 'اوپس!', 0, '2018-02-20 13:34:01', '2018-02-20 13:34:01'),
(5, 'tt0898266', NULL, 2, 'lab lab lab', 0, '2018-02-20 13:36:07', '2018-02-20 13:36:07'),
(6, 'tt1111358', NULL, 2, 'afasdfsdafsafasfa', 0, '2018-02-20 13:37:11', '2018-02-20 13:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_12_28_095429_create_dialogs_table', 1),
(4, '2017_12_28_103037_create_movies_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `imdb_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `imdb_id`, `title`, `year`, `type`, `poster`, `created_at`, `updated_at`) VALUES
(1, 'tt3783958', 'La La Land', '2016', 'movie', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMzUzNDM2NzM2MV5BMl5BanBnXkFtZTgwNTM3NTg4OTE@._V1_SX300.jpg', '2017-12-28 09:58:44', '2017-12-28 09:58:44'),
(2, 'tt0103064', 'Terminator 2', '1991', 'movie', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMGU2NzRmZjUtOGUxYS00ZjdjLWEwZWItY2NlM2JhNjkxNTFmXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_SX300.jpg', '2018-02-20 13:12:35', '2018-02-20 13:12:35'),
(3, 'tt2370248', 'Short Term 12', '2013', 'movie', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMTEwNjE2OTM4NDZeQTJeQWpwZ15BbWU3MDE2MTE4OTk@._V1_SX300.jpg', '2018-02-20 13:32:40', '2018-02-20 13:32:40'),
(4, 'tt0101048', 'Bij nader inzien', '1991', 'series', 'N/A', '2018-02-20 13:34:01', '2018-02-20 13:34:01'),
(5, 'tt0898266', 'The Big Bang Theory', '2007–', 'series', 'https://images-na.ssl-images-amazon.com/images/M/MV5BY2FmZTY5YTktOWRlYy00NmIyLWE0ZmQtZDg2YjlmMzczZDZiXkEyXkFqcGdeQXVyNjg4NzAyOTA@._V1_SX300.jpg', '2018-02-20 13:36:07', '2018-02-20 13:36:07'),
(6, 'tt1111358', 'Kolah Ghermezi and Sarvenaz', '2002', 'movie', 'https://images-na.ssl-images-amazon.com/images/M/MV5BZTc0ODdkYmQtNDA5Yy00MDE2LWI5NTctNGUyNzk3ZWZhNmVjXkEyXkFqcGdeQXVyMzU1OTM4NDU@._V1_SX300.jpg', '2018-02-20 13:37:11', '2018-02-20 13:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` int(11) NOT NULL,
  `dialog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `avatar`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'alireza', 'hi@alirezarazavi.ir', 'default.png', '$2y$10$NJdZe8YUhrJHKmcm52C2IeGRUB.jmYENoWAjbmI/Sr/c6jz5vRMOK', 'dUBahRYmKDeduioY7tRUQapGAzn9H2836YHiwdEtjPTuQMCPTxXawvxRpxVP', '2017-12-28 06:55:13', NULL),
(3, 'alireza2', 'hi2@alirezarazavi.ir', 'default.png', '$2y$10$NLcNhNWXaryG/EEo5u7Xw.QT.QEoZkA/anHa2iTcZDJyIX2.8/fU2', NULL, '2017-12-28 11:06:29', '2017-12-28 11:06:29'),
(4, 'alirezarazavi', 'i@alirezarazavi.ir', 'default.png', '$2y$10$c3MZhg5UKU8BhEXXyxs4neDSGTGeNr42EgX7uLyQS9tduuI9Ewciu', 'MXLgw9OR9c4pfpTLIyjKD4XNCqHJsOpoWg9Grxc2zku1vXPsmH1Xk9WMFSvN', '2018-02-16 11:18:40', '2018-02-16 11:18:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dialogs`
--
ALTER TABLE `dialogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dialogs`
--
ALTER TABLE `dialogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
