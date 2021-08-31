-- phpMyAdmin SQL Dump
-- version 5.0.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 28, 2021 at 11:33 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WSA2021_M1`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(1, 'Office A'),
(2, 'Office B'),
(3, 'Office C'),
(4, 'All access');

-- --------------------------------------------------------

--
-- Table structure for table `group_points`
--

CREATE TABLE `group_points` (
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `point_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_points`
--

INSERT INTO `group_points` (`group_id`, `point_id`) VALUES
(1, 3),
(1, 4),
(1, 5),
(1, 7),
(1, 8),
(2, 10),
(2, 11),
(3, 14),
(3, 17),
(3, 18),
(3, 19),
(4, 3),
(4, 4),
(4, 5),
(4, 7),
(4, 8),
(4, 10),
(4, 11),
(4, 14),
(4, 17),
(4, 18),
(4, 19);

-- --------------------------------------------------------

--
-- Table structure for table `group_staff`
--

CREATE TABLE `group_staff` (
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_staff`
--

INSERT INTO `group_staff` (`group_id`, `staff_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(3, 4),
(3, 5),
(3, 6),
(4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `point_id` bigint(20) UNSIGNED NOT NULL,
  `camera` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `staff_id`, `point_id`, `camera`, `access`, `created_at`) VALUES
(1, 1, 1, 'http://xkesryp-m1.wsr.ru/vcs/photos/photo.png', 1, '2021-07-20 06:11:08'),
(2, 2, 1, 'http://xkesryp-m1.wsr.ru/vcs/photos/photo.png', 1, '2021-07-20 06:22:36'),
(3, 3, 1, 'http://xkesryp-m1.wsr.ru/vcs/photos/photo.png', 0, '2021-07-20 06:38:10'),
(4, 1, 2, 'http://xkesryp-m1.wsr.ru/vcs/photos/photo.png', 1, '2021-08-20 07:55:09'),
(5, 2, 5, 'http://xkesryp-m1.wsr.ru/vcs/photos/photo.png', 1, '2021-08-20 07:57:35'),
(6, 3, 9, 'http://xkesryp-m1.wsr.ru/vcs/photos/photo.png', 1, '2021-08-20 08:00:35'),
(7, 3, 10, 'http://xkesryp-m1.wsr.ru/vcs/photos/photo.png', 1, '2021-08-20 08:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `parent`, `name`) VALUES
(1, NULL, 'Department A'),
(2, 1, 'Office A1'),
(3, 2, 'Office A1-1'),
(4, 2, 'Office A1-2'),
(5, 1, 'Office A2'),
(6, 1, 'Office A3'),
(7, 6, 'Office A3-1'),
(8, 6, 'Office A3-2'),
(9, NULL, 'Department B'),
(10, 9, 'Office B1'),
(11, 9, 'Office B2'),
(12, NULL, 'Department C'),
(13, 12, 'Office C1'),
(14, 13, 'Office C1-1'),
(15, 12, 'Office C2'),
(16, 15, 'Office C2-1'),
(17, 16, 'Office C2-1-1'),
(18, 16, 'Office C2-1-2'),
(19, 15, 'Office C2-2');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `full_name`, `photo`, `code`) VALUES
(1, 'Melinda Privette', 'placeholder.png', '74242218333061630050438776361432'),
(2, 'Brittaney Roman', 'placeholder.png', '27186870074837351807154583456842'),
(3, 'Michael Penwell', 'placeholder.png', '31143107181484888766866484505580'),
(4, 'Isabelle Herrmann', 'placeholder.png', '53707310827346234114850762333807'),
(5, 'Heather Brookins', 'placeholder.png', '57536364841123623784174322323717'),
(6, 'Felipe Wilson', 'placeholder.png', '66724751663888475810780785658807'),
(7, 'Theresa Socha', 'placeholder.png', '42603620318701361432654318367611');

-- --------------------------------------------------------

--
-- Table structure for table `staff_accesses`
--

CREATE TABLE `staff_accesses` (
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `point_id` bigint(20) UNSIGNED NOT NULL,
  `time` int(11) NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_accesses`
--

INSERT INTO `staff_accesses` (`staff_id`, `point_id`, `time`, `created_at`) VALUES
(1, 10, 600, '2021-07-28 10:00:00'),
(2, 11, 432000, '2021-07-28 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_points`
--
ALTER TABLE `group_points`
  ADD KEY `group_points_group_id_foreign` (`group_id`),
  ADD KEY `group_points_point_id_foreign` (`point_id`);

--
-- Indexes for table `group_staff`
--
ALTER TABLE `group_staff`
  ADD KEY `group_staff_group_id_foreign` (`group_id`),
  ADD KEY `group_staff_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_staff_id_foreign` (`staff_id`),
  ADD KEY `logs_point_id_foreign` (`point_id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `points_parent_foreign` (`parent`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_accesses`
--
ALTER TABLE `staff_accesses`
  ADD KEY `staff_accesses_staff_id_foreign` (`staff_id`),
  ADD KEY `staff_accesses_point_id_foreign` (`point_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `group_points`
--
ALTER TABLE `group_points`
  ADD CONSTRAINT `group_points_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_points_point_id_foreign` FOREIGN KEY (`point_id`) REFERENCES `points` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `group_staff`
--
ALTER TABLE `group_staff`
  ADD CONSTRAINT `group_staff_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_staff_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_point_id_foreign` FOREIGN KEY (`point_id`) REFERENCES `points` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `logs_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `points_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `points` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staff_accesses`
--
ALTER TABLE `staff_accesses`
  ADD CONSTRAINT `staff_accesses_point_id_foreign` FOREIGN KEY (`point_id`) REFERENCES `points` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `staff_accesses_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

