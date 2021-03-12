-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2021 at 12:40 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feature_exercise_pugazhenthi`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `price` double(12,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double(12,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `item_id`, `price`, `quantity`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 50.00, 6, 130.00, '2021-03-12 05:41:42', '2021-03-12 05:57:24'),
(2, 2, 30.00, 2, 45.00, '2021-03-12 05:44:47', '2021-03-12 05:44:47'),
(3, 3, 20.00, 5, 88.00, '2021-03-12 05:45:02', '2021-03-12 05:45:02'),
(4, 4, 15.00, 10, 90.00, '2021-03-12 05:57:37', '2021-03-12 05:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 'A', 50.00, '2021-03-12 05:34:15', '2021-03-12 05:34:15'),
(2, 'B', 30.00, '2021-03-12 05:34:15', '2021-03-12 05:34:15'),
(3, 'C', 20.00, '2021-03-12 05:34:15', '2021-03-12 05:34:15'),
(4, 'D', 15.00, '2021-03-12 05:34:15', '2021-03-12 05:34:15'),
(5, 'E', 5.00, '2021-03-12 05:34:15', '2021-03-12 05:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `item_offers`
--

CREATE TABLE `item_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(12,2) NOT NULL,
  `combo_item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_offers`
--

INSERT INTO `item_offers` (`id`, `item_id`, `quantity`, `price`, `combo_item_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 130.00, NULL, '2021-03-12 05:34:15', '2021-03-12 05:34:15'),
(2, 2, 2, 45.00, NULL, '2021-03-12 05:34:15', '2021-03-12 05:34:15'),
(3, 3, 2, 38.00, NULL, '2021-03-12 05:34:15', '2021-03-12 05:34:15'),
(4, 3, 3, 50.00, NULL, '2021-03-12 05:34:15', '2021-03-12 05:34:15'),
(5, 4, 5, 5.00, 1, '2021-03-12 05:34:15', '2021-03-12 05:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_03_12_092519_create_carts_table', 1),
(2, '2021_03_12_092555_create_items_table', 1),
(3, '2021_03_12_092608_create_item_offers_table', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_offers`
--
ALTER TABLE `item_offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_offers_item_id_foreign` (`item_id`),
  ADD KEY `item_offers_combo_item_id_foreign` (`combo_item_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item_offers`
--
ALTER TABLE `item_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item_offers`
--
ALTER TABLE `item_offers`
  ADD CONSTRAINT `item_offers_combo_item_id_foreign` FOREIGN KEY (`combo_item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_offers_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
