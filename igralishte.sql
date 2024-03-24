-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.1.1.0
-- Generation Time: Mar 25, 2024 at 12:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `igralishte`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('active','archived') NOT NULL DEFAULT 'active',
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tag_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `status`, `description`, `created_at`, `updated_at`, `tag_id`, `category_id`) VALUES
(1, 'Nike', 'active', 'dadad', '2024-03-16 18:42:31', '2024-03-24 10:47:12', 1, 1),
(2, 'Adidas', 'active', 'random', '2024-03-16 18:42:31', '2024-03-24 16:28:13', NULL, NULL),
(3, 'Zara', 'active', 'random3', '2024-03-16 18:42:31', '2024-03-16 18:42:31', NULL, NULL),
(4, 'H&M', 'active', 'random 4', '2024-03-16 18:42:31', '2024-03-16 18:42:31', NULL, NULL),
(5, 'Gucci', 'active', 'random 5', '2024-03-16 18:42:31', '2024-03-16 18:42:31', NULL, NULL),
(6, 'Louis Vuitton', 'active', 'random 6', '2024-03-16 18:42:31', '2024-03-16 18:42:31', NULL, NULL),
(7, 'Levi\'s', 'active', 'random 7', '2024-03-16 18:42:31', '2024-03-16 18:42:31', NULL, NULL),
(8, 'Calvin Klein', 'active', 'random8', '2024-03-16 18:42:31', '2024-03-16 18:42:31', NULL, NULL),
(9, 'Puma', 'active', 'random 9', '2024-03-16 18:42:31', '2024-03-16 18:42:31', NULL, NULL),
(10, 'Tommy Hilfiger', 'active', 'random 10', '2024-03-16 18:42:31', '2024-03-16 18:42:31', NULL, NULL),
(11, 'Versace', 'active', 'random 11', '2024-03-16 18:42:31', '2024-03-16 18:42:31', NULL, NULL),
(12, 'Chanel', 'active', 'random 12', '2024-03-16 18:42:31', '2024-03-16 18:42:31', NULL, NULL),
(13, 'Fendi', 'active', 'random 13', '2024-03-16 18:42:31', '2024-03-16 18:42:31', NULL, NULL),
(14, 'Balenciaga', 'active', 'random 14', '2024-03-16 18:42:31', '2024-03-16 18:42:31', NULL, NULL),
(15, 'Prada', 'active', 'random 15', '2024-03-16 18:42:31', '2024-03-16 18:42:31', NULL, NULL),
(16, 'Dior', 'active', 'random 16', '2024-03-16 18:42:31', '2024-03-16 18:42:31', NULL, NULL),
(17, 'Burberry', 'active', 'random 17', '2024-03-16 18:42:31', '2024-03-16 18:42:31', NULL, NULL),
(18, 'Under Armour', 'active', 'random 18', '2024-03-16 18:42:31', '2024-03-16 18:42:31', NULL, NULL),
(19, 'Ralph Lauren', 'active', 'random 19', '2024-03-16 18:42:31', '2024-03-16 18:42:31', NULL, NULL),
(20, 'Armani', 'active', 'random 20', '2024-03-16 18:42:31', '2024-03-24 21:54:37', NULL, NULL),
(21, 'Lacoste', 'active', 'random 21', '2024-03-23 17:02:42', '2024-03-23 17:02:42', 4, 8),
(22, 'Polo', 'archived', 'good', '2024-03-24 18:17:07', '2024-03-24 18:17:07', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Горници и маици', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(2, 'Фустан', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(3, 'Ролка', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(4, 'Панталони и фармерки', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(5, 'Сукњи', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(6, 'Јакни и палта', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(7, 'Дуксери и џемпери', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(8, 'Активни облеки', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(9, 'Костими за капење', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(10, 'ноќни облеки', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(11, 'Формална облека', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(12, 'Работна облека', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(13, 'Бременосна облека', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(14, 'Облека за поголеми големини', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(15, 'Винтиџ облека', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(16, 'Костими и косплеј', '2024-03-16 18:42:31', '2024-03-16 18:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','archived') NOT NULL DEFAULT 'active',
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tag_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `code`, `amount`, `created_at`, `updated_at`, `status`, `category_id`, `brand_id`, `tag_id`) VALUES
(1, 'SUMMER SALE', '10', '2024-03-16 18:42:31', '2024-03-23 21:06:31', 'active', 9, 19, 15),
(2, 'SALE15', '15.00', '2024-03-16 18:42:31', '2024-03-16 18:42:31', 'active', 3, 19, 5),
(3, 'HALFOFF', '50.00', '2024-03-16 18:42:31', '2024-03-16 18:42:31', 'active', NULL, 3, 15),
(4, 'SUMMER', '20.00', '2024-03-16 18:42:31', '2024-03-16 18:42:31', 'active', NULL, 4, 11),
(5, 'FALL', '25.00', '2024-03-16 18:42:31', '2024-03-16 18:42:31', 'active', NULL, 5, 4),
(6, 'SPRING', '30.00 %', '2024-03-16 18:42:31', '2024-03-21 20:06:57', 'active', 15, 6, 1),
(7, 'WINTER', '40.00', '2024-03-16 18:42:31', '2024-03-16 18:42:31', 'active', NULL, 7, 11),
(8, 'Winter Sale', '25.00 %', NULL, '2024-03-23 06:24:33', 'archived', 1, 8, 15),
(10, 'DISCOUNT25', '25.00 %', '2024-03-21 19:39:26', '2024-03-21 19:39:26', 'active', 1, 1, NULL),
(11, 'DISCOUNT 5', '05 %', '2024-03-21 19:46:25', '2024-03-21 19:46:25', 'active', 13, 12, NULL),
(12, 'HALLOWEEN SALE', '60 %', '2024-03-21 19:57:02', '2024-03-21 19:57:02', 'active', 16, 4, NULL),
(13, 'BLACK FRIDAY', '60 %', '2024-03-21 20:03:30', '2024-03-21 20:04:30', 'active', 2, 20, NULL),
(14, 'LAST_SALE', '30%', '2024-03-21 20:48:49', '2024-03-21 20:48:49', 'active', 10, 13, NULL),
(15, 'fasdfasdfasdf', '22', '2024-03-21 20:49:14', '2024-03-21 20:49:14', 'active', 14, 15, NULL),
(16, 'test', '20.00 %', '2024-03-21 20:57:23', '2024-03-21 20:57:23', 'archived', 11, 15, NULL),
(17, 'test2', '20.00 %', '2024-03-21 21:06:50', '2024-03-21 21:06:50', 'active', 16, 16, NULL),
(18, 'test3', '20.00 %', '2024-03-21 21:12:13', '2024-03-21 21:12:13', 'active', 15, 13, NULL),
(19, 'qqqqq', '22', '2024-03-23 06:26:56', '2024-03-23 06:26:56', 'active', 14, 14, 9),
(20, 'gsdgasgsa', '22', '2024-03-23 06:29:43', '2024-03-23 06:29:43', 'active', 15, 14, 12),
(21, 'gsadgasgsa', '2312', '2024-03-23 06:30:07', '2024-03-23 06:30:07', 'active', 14, 14, 13),
(22, 'gsdgdgsdgas', '222', '2024-03-23 06:32:50', '2024-03-23 06:32:50', 'active', 13, 15, 12),
(23, 'last winter sale', '20', '2024-03-23 06:39:35', '2024-03-23 06:39:35', 'archived', 14, 17, 1),
(24, 'gsdgasdgasdg', '30', '2024-03-23 06:44:09', '2024-03-23 06:44:09', 'archived', 14, 17, 13),
(25, 'test 4', '30 %', '2024-03-23 07:44:57', '2024-03-23 07:45:18', 'archived', 15, 18, 13),
(26, 'gsagsadgsad', 'gsdgsadgsadgsadgsadgsa', '2024-03-23 09:14:08', '2024-03-23 09:14:08', 'active', 4, 18, 4);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_11_214422_add_is_admin_row_to_users_table', 1),
(6, '2024_03_16_162856_create_category_table', 1),
(7, '2024_03_16_164006_create_brands_table', 1),
(8, '2024_03_16_164357_create_tags_table', 1),
(9, '2024_03_16_164819_create_discounts_table', 1),
(10, '2024_03_16_165035_create_products_table', 1),
(11, '2024_03_20_200912_add_status_to_discounts_table', 2),
(12, '2024_03_21_192314_add_brands_id_to_discounts_table', 3),
(13, '2024_03_22_210117_add_tag_id_column_to_discounts_table', 4),
(14, '2024_03_22_210258_create_discount_tag_table', 5),
(15, '2024_03_22_211225_add_tag_to_discounts_table', 6),
(16, '2024_03_23_150529_add_column_status_to_brands_table', 7),
(17, '2024_03_23_162529_add_description_column_to_brands_table', 8),
(18, '2024_03_23_165227_add_foreign_key_to_brands_table', 9);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` enum('active','archived') NOT NULL DEFAULT 'active',
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `advise_for_size` varchar(255) NOT NULL,
  `guidelines_for_maintenance` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `tags_id` bigint(20) UNSIGNED NOT NULL,
  `discount_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `quantity`, `status`, `color`, `size`, `advise_for_size`, `guidelines_for_maintenance`, `user_id`, `category_id`, `brand_id`, `tags_id`, `discount_id`, `created_at`, `updated_at`) VALUES
(1, 'whaaat', 'idk', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 22, 'archived', 'blue', 'M', 'none', 'none', 1, 5, 4, 1, 1, NULL, '2024-03-24 18:15:02'),
(2, 'green', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'green', 'X', 'none', 'none', 1, 1, 2, 3, 1, NULL, NULL),
(3, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'pink', 'X', 'none', 'none', 1, 1, 3, 3, 1, NULL, NULL),
(4, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'pink', 'X', 'none', 'none', 1, 1, 4, 3, 1, NULL, NULL),
(5, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'pink', 'X', 'none', 'none', 1, 1, 5, 3, 1, NULL, NULL),
(6, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'pink', 'X', 'none', 'none', 1, 1, 6, 3, 1, NULL, NULL),
(7, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'pink', 'X', 'none', 'none', 1, 1, 17, 3, 1, NULL, NULL),
(8, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'blue', 'X,S,M', 'none', 'none', 1, 1, 8, 3, 1, NULL, NULL),
(9, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'blue', 'X,S,M', 'none', 'none', 1, 1, 7, 3, 1, NULL, NULL),
(10, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'blue', 'X,S,M', 'none', 'none', 1, 1, 9, 3, 1, NULL, NULL),
(11, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'blue', 'X,S,M', 'none', 'none', 1, 1, 10, 3, 1, NULL, NULL),
(12, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'blue', 'X,S,M', 'none', 'none', 1, 1, 11, 3, 1, NULL, NULL),
(13, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'blue', 'X,S,M', 'none', 'none', 1, 1, 13, 3, 1, NULL, NULL),
(14, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'blue', 'X,S,M', 'none', 'none', 1, 1, 13, 3, 1, NULL, NULL),
(15, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'blue', 'X,S,M', 'none', 'none', 1, 1, 13, 3, 1, NULL, NULL),
(16, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'blue', 'X,S,M', 'none', 'none', 1, 1, 13, 3, 1, NULL, NULL),
(17, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'blue', 'X,S,M', 'none', 'none', 1, 1, 13, 3, 1, NULL, NULL),
(18, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'blue', 'X,S,M', 'none', 'none', 1, 1, 13, 3, 1, NULL, NULL),
(19, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'blue', 'X,S,M', 'none', 'none', 1, 1, 13, 3, 1, NULL, NULL),
(20, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'blue', 'X,S,M', 'none', 'none', 1, 1, 13, 3, 1, NULL, NULL),
(21, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'blue', 'X,S,M', 'none', 'none', 1, 1, 13, 3, 1, NULL, NULL),
(22, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'blue', 'X,S,M', 'none', 'none', 1, 1, 13, 3, 1, NULL, NULL),
(23, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'blue', 'X,S,M', 'none', 'none', 1, 1, 14, 3, 1, NULL, NULL),
(24, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'blue', 'X,S,M', 'none', 'none', 1, 1, 15, 3, 1, NULL, NULL),
(25, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'blue', 'X,S,M', 'none', 'none', 1, 1, 12, 3, 1, NULL, NULL),
(26, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'blue', 'X,S,M', 'none', 'none', 1, 1, 13, 3, 1, NULL, NULL),
(27, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'blue', 'X,S,M', 'none', 'none', 1, 1, 13, 3, 1, NULL, NULL),
(28, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'blue', 'X,S,M', 'none', 'none', 1, 1, 13, 3, 1, NULL, NULL),
(29, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'blue', 'X,S,M', 'none', 'none', 1, 1, 18, 3, 1, NULL, NULL),
(30, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'blue', 'X,S,M', 'none', 'none', 1, 1, 17, 3, 1, NULL, NULL),
(31, 'pink', 'dresss', '100.00', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F7c%2F43%2F7c43605d431ba3ce573f96b16ce7fe18e9f701ac.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 23, 'active', 'blue', 'X,S,M', 'none', 'none', 1, 1, 15, 3, 1, NULL, NULL),
(32, 'gsadgasdgsd', 'gsdagasdgas', '2222', 'C:\\xampp\\tmp\\php49B7.tmp', 12222, 'active', 'yellow', 'yellow', 'gsdgsa', 'gsdgsadg', 1, 9, 17, 2, NULL, '2024-03-22 21:16:51', '2024-03-22 21:16:51'),
(33, 'gsadgasdgsa', 'gsadgasdgas', '150', 'C:\\xampp\\tmp\\phpB806.tmp', 2, 'active', 'green', 'M', 'gsdgsadgsad', 'gsdgsagsa', 1, 12, 15, 2, NULL, '2024-03-23 20:58:43', '2024-03-23 20:58:43'),
(34, 'gsadgasdgsa', 'gsadgasdgas', '150', 'C:\\xampp\\tmp\\php6908.tmp', 2, 'active', 'blue', 'M', 'gsdgsadgsad', 'gsdgsagsa', 1, 11, 14, 2, NULL, '2024-03-23 20:59:29', '2024-03-23 20:59:29'),
(35, 'gsadgasdgsa', 'gsadgasdgas', '150', 'C:\\xampp\\tmp\\phpBD63.tmp', 2, 'active', 'blue', 'M', 'gsdgsadgsad', 'gsdgsagsa', 1, 11, 14, 2, NULL, '2024-03-23 20:59:50', '2024-03-23 20:59:50'),
(36, 'no waaay', 'wwwwww', '112', 'C:\\xampp\\tmp\\php65B0.tmp', 4, 'active', 'green', 'M', 'fasfasd', 'fsadfasdfa', 1, 1, 1, 1, NULL, '2024-03-23 21:02:44', '2024-03-24 09:41:20'),
(37, 'whaat', 'gsadgasdg', '222', 'uploads/products/1711236329.jpeg', 12, 'active', 'green', 'M', 'gsdgsa', 'gsdgsad', 1, 1, 1, 2, NULL, '2024-03-23 22:25:29', '2024-03-24 09:40:46'),
(38, 'dada', 'dadada', '222', 'uploads/products/1711277554.jpeg', 21, 'archived', 'green', 'M', 'gsdgsda', 'gsdgsadg', 1, 16, 21, 3, NULL, '2024-03-24 09:52:34', '2024-03-24 09:54:51'),
(39, 'dadada', 'dadada', '222', 'uploads/products/1711291557.jpeg', 12, 'active', 'green', 'M', 'dadada', 'dadada', 1, 11, 14, 1, NULL, '2024-03-24 13:45:57', '2024-03-24 13:45:57'),
(40, 'dadada', 'dadada', '222', 'uploads/products/1711295794.jpeg', 122, 'active', 'blue', 'L', 'dada', 'dada', 1, 9, 12, 2, NULL, '2024-03-24 14:56:34', '2024-03-24 14:56:34'),
(41, 'dada', 'dada', '30000', 'uploads/products/1711297137.jpeg', 4, 'active', 'blue', 'M', 'dada', 'dada', 1, 9, 11, 1, NULL, '2024-03-24 15:18:57', '2024-03-24 15:18:57'),
(42, 'dada', 'dadada', '2222', 'uploads/products/1711307396.jpeg', 122, 'active', 'green', 'M', 'ada', 'dadad', 1, 11, 2, 2, NULL, '2024-03-24 18:09:56', '2024-03-24 18:09:56'),
(43, 'dadad', 'adadada', '222', 'uploads/products/1711316021.jpeg', 12, 'active', 'green', 'M', 'dada', 'dadas', 1, 5, 10, 1, NULL, '2024-03-24 20:33:41', '2024-03-24 20:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Мода', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(2, 'Стил', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(3, 'Тренд', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(4, 'Опуштено', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(5, 'Формално', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(6, 'Додатоци', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(7, 'Обувки', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(8, 'Торби', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(9, 'Накит', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(10, 'Убавина', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(11, 'Нега на кожа', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(12, 'Шминка', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(13, 'Нега на коса', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(14, 'Здравје', '2024-03-16 18:42:31', '2024-03-16 18:42:31'),
(15, 'Фитнес', '2024-03-16 18:42:31', '2024-03-16 18:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `confirm_password`, `address`, `phone`, `image`, `bio`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Admin', 'Doe', 'admin@admin.com', NULL, '$2y$12$rlDAOm7cFOr32r39T/A9QOkrXtmXCGKqgsVhqR/lMYnthGtmJmyzm', '$2y$12$7kAWOIaAkwrU.pNv9XNGHupu8AnS0G6hS6FkBgs2FOllOGf6y1vMO', 'Street example', '0711113', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvb1Z00-ubxAEY910bz264t8FVAeyvgjKVOwf-Auf0jQ&s', NULL, NULL, '2024-03-16 18:42:31', '2024-03-23 13:08:48', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brands_tag_id_foreign` (`tag_id`),
  ADD KEY `brands_category_id_foreign` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `discounts_code_unique` (`code`),
  ADD KEY `category_id_foreign` (`category_id`),
  ADD KEY `discounts_brand_id_foreign` (`brand_id`),
  ADD KEY `discounts_tag_id_foreign` (`tag_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_tags_id_foreign` (`tags_id`),
  ADD KEY `products_discount_id_foreign` (`discount_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `brands_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `discounts`
--
ALTER TABLE `discounts`
  ADD CONSTRAINT `category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `discounts_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `discounts_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `products_discount_id_foreign` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`id`),
  ADD CONSTRAINT `products_tags_id_foreign` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`),
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
