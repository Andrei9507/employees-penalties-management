-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2020 at 03:14 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practice`
--

-- --------------------------------------------------------

--
-- Table structure for table `behaviors`
--

CREATE TABLE `behaviors` (
  `id` int(10) UNSIGNED NOT NULL,
  `behavior` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `penalty_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `behaviors`
--

INSERT INTO `behaviors` (`id`, `behavior`, `created_at`, `updated_at`, `penalty_id`, `deleted_at`) VALUES
(2, 'test', NULL, '2020-04-07 12:46:00', 20, '2020-04-07 12:46:00'),
(3, 'test', NULL, '2020-04-07 12:46:04', 20, '2020-04-07 12:46:04'),
(4, 'Dont respect scheduler', NULL, '2020-04-09 10:09:35', 21, NULL),
(5, '2', NULL, '2020-04-07 17:07:07', 20, '2020-04-07 17:07:07'),
(6, '222', NULL, '2020-04-08 12:13:03', 20, '2020-04-08 12:13:03'),
(7, '222', NULL, '2020-04-08 12:50:12', 21, '2020-04-08 12:50:12'),
(8, 'Selfishness', NULL, NULL, 24, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `firstname`, `lastname`, `adress`, `phone`, `created_at`, `updated_at`) VALUES
(15, 'HumanResource', 'HumanResource', 'HumanResource', '999999999', NULL, NULL),
(16, 'TeamLeader', 'TeamLeader', 'TeamLeader', '999999999', NULL, NULL),
(17, 'Employee', 'Employee', 'Employee', '999999999', NULL, NULL),
(18, 'CEO', 'CEO', 'CEO', '999999999', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees_penalties`
--

CREATE TABLE `employees_penalties` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `behavior_id` int(10) UNSIGNED NOT NULL,
  `penalty_id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees_penalties`
--

INSERT INTO `employees_penalties` (`id`, `comment`, `expire`, `created_at`, `updated_at`, `behavior_id`, `penalty_id`, `employee_id`, `deleted_at`, `active`) VALUES
(5, '-', '2020-04-30', '2020-04-08 13:59:39', '2020-04-08 13:59:39', 4, 21, 1, NULL, 1),
(6, 'dont help others', '2020-04-22', '2020-04-08 14:07:28', '2020-04-08 14:07:28', 8, 24, 13, NULL, 1),
(7, 'no comment', '2020-04-29', '2020-04-08 14:32:20', '2020-04-08 14:32:20', 8, 24, 14, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_07_120143_create_employees_table', 1),
(4, '2017_08_07_120209_create_penalties_table', 1),
(5, '2017_08_07_120235_create_behaviors_table', 1),
(6, '2017_08_07_121220_ceate_employees_penalties_table', 1),
(7, '2017_08_17_103041_add_penalty_to_employees_penalties_table', 1),
(8, '2017_09_05_115414_add_delete_to_behaviors_table', 1),
(9, '2017_09_05_124439_add_delete_to_employees_penalties_table', 1),
(10, '2017_11_24_191220_add_role_to_users_table', 1),
(11, '2017_11_24_195207_create_notifications_table', 1),
(12, '2017_11_24_204351_add_active_to_employees_penalties_table', 1),
(13, '2017_11_25_102117_add_penalty_id_to_users_table', 1),
(14, '2017_11_25_102502_add_expire_to_notifications_table', 1),
(15, '2018_03_09_145048_add_employee_id_to_users', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `behavior_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `penalty_id` int(11) NOT NULL,
  `expire` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penalties`
--

CREATE TABLE `penalties` (
  `id` int(10) UNSIGNED NOT NULL,
  `penalty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penalties`
--

INSERT INTO `penalties` (`id`, `penalty`, `created_at`, `updated_at`) VALUES
(21, 'Work saturday 8h', NULL, '2020-04-08 13:57:12'),
(24, 'Make 1 task more this month', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `employee_id`) VALUES
(3, 'HumanResource', 'HumanResource@HumanResource.com', '$2y$10$L1LSY4mDcaz1Luehb8AtKu0.kZp3u39a6Dqlf/kaby.WBGKD2mwRu', NULL, '2020-04-09 10:03:02', '2020-04-09 10:03:02', '1', 15),
(4, 'TeamLeader', 'TeamLeader@TeamLeader.com', '$2y$10$k/zCIhkxHPRCkmyKmfJELORA8/hfMrYSWXTttYzk6oqIjDOt4aFjm', '7V18G2GEKjGnolBjsp50VHiZGRCtNvNFSlkPB3ytPkklVXIJ203mU6H8USnf', '2020-04-09 10:05:14', '2020-04-09 10:05:14', '2', 16),
(5, 'Employee', 'Employee@Employee.com', '$2y$10$qGB.Y8xk/XBm.cXjdBYnxe0/dSEisutgO/cM4SMoVoexaJo/U26im', 'mFfi23dYGbjSGdMdcDCrI5QmyOwfI3l5Z8qOwE3k0uuYbmlgnrEk9uMVA76B', '2020-04-09 10:06:07', '2020-04-09 10:06:07', '3', 17),
(6, 'CEO', 'CEO@CEO.com', '$2y$10$jvY9Ij65RDOcnIZdqGUUIOjbr1BvQ5tBOPMR/U0K700CygXcb0Kry', '3iNnIMUfnWF7MAxFVUKNb1RUpBzKnMReWCkXTfVliQOTESCTlinojxDxTmEq', '2020-04-09 10:07:11', '2020-04-09 10:07:11', '4', 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `behaviors`
--
ALTER TABLE `behaviors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees_penalties`
--
ALTER TABLE `employees_penalties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penalties`
--
ALTER TABLE `penalties`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `behaviors`
--
ALTER TABLE `behaviors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `employees_penalties`
--
ALTER TABLE `employees_penalties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penalties`
--
ALTER TABLE `penalties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
