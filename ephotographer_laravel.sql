-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2019 at 10:15 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tagdphot_o`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `shoot_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `shoot_id`, `created_at`, `updated_at`) VALUES
(2, 12, 4, '2019-08-09 13:02:14', '2019-08-09 13:02:14'),
(4, 10, 3, '2019-08-09 13:09:00', '2019-08-09 13:09:00'),
(5, 10, 4, '2019-08-09 13:09:09', '2019-08-09 13:09:09'),
(8, 2, 4, '2019-08-14 05:39:10', '2019-08-14 05:39:10'),
(9, 2, 3, '2019-08-14 06:17:26', '2019-08-14 06:17:26'),
(11, 11, 8, '2019-08-16 05:09:12', '2019-08-16 05:09:12'),
(12, 11, 4, '2019-08-16 05:09:25', '2019-08-16 05:09:25'),
(13, 11, 2, '2019-08-16 06:43:17', '2019-08-16 06:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'wedding', NULL, NULL),
(2, 'wild_life', NULL, NULL),
(3, 'sports', NULL, NULL),
(4, 'architecture', NULL, NULL),
(5, 'fashion', NULL, NULL),
(6, 'historic', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shoot_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `shoot_id`, `comment`, `created_at`, `updated_at`, `user_id`) VALUES
(2, 11, 'ksdkfisfsid', '2019-08-20 18:00:00', '2019-08-30 18:00:00', 12),
(3, 4, 'fkkdf', '2019-08-14 03:08:57', '2019-08-14 03:08:57', 12),
(4, 8, 'nope', '2019-08-14 03:11:41', '2019-08-14 03:11:41', 12),
(5, 1, 'hjhjzs', '2019-08-14 05:22:25', '2019-08-14 05:22:25', 12),
(6, 4, 'tiger', '2019-08-14 05:22:44', '2019-08-14 05:22:44', 12),
(7, 10, 'elephant', '2019-08-14 05:31:09', '2019-08-14 05:31:09', 2),
(8, 10, 'hjbj', '2019-08-14 06:07:50', '2019-08-14 06:07:50', 2),
(9, 3, 'hkdkg', '2019-09-04 07:45:07', '2019-09-04 07:45:07', 2);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `email`, `feedback`, `created_at`, `updated_at`) VALUES
(1, 'p1@gmail.com', 'jasdjasd', '2019-08-09 13:10:22', '2019-08-09 13:10:22'),
(2, 'gjgj@kzxj.com', 'jhghghj', '2019-08-15 04:42:52', '2019-08-15 04:42:52');

-- --------------------------------------------------------

--
-- Table structure for table `hires`
--

CREATE TABLE `hires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `photographer_id` bigint(20) UNSIGNED NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` int(11) NOT NULL,
  `event_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'block',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `views` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unseen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hires`
--

INSERT INTO `hires` (`id`, `client_id`, `photographer_id`, `event_name`, `payment`, `event_image`, `event_location`, `event_link`, `event_description`, `status`, `created_at`, `updated_at`, `views`) VALUES
(1, 2, 11, 'ljdkjfg', 1324, NULL, 'dfdg', NULL, NULL, 'pending', '2019-09-04 07:46:11', '2019-09-04 07:46:11', 'unseen'),
(2, 2, 12, 'ksd kje lwjre', 2324, NULL, 'weve', NULL, NULL, 'reject', '2019-09-04 09:45:22', '2019-09-04 09:52:54', 'seen');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shoot_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `shoot_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 9, 2, '2019-09-04 04:23:22', '2019-09-04 04:23:22'),
(2, 3, 2, '2019-09-04 04:23:28', '2019-09-04 04:23:28'),
(3, 5, 2, '2019-09-04 04:23:30', '2019-09-04 04:23:30');

-- --------------------------------------------------------

--
-- Table structure for table `messengers`
--

CREATE TABLE `messengers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messengers`
--

INSERT INTO `messengers` (`id`, `sender_id`, `receiver_id`, `message`, `img`, `created_at`, `updated_at`) VALUES
(19, 1, 2, 'hello', NULL, NULL, NULL),
(20, 1, 2, 'hello', NULL, NULL, NULL),
(21, 1, 2, 'sas', NULL, NULL, NULL),
(22, 1, 4, 'sdsd', NULL, NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_02_191204_create_sport_shoots_table', 2),
(5, '2019_08_03_105604_create_trends_table', 2),
(6, '2019_08_02_185545_create_wedding_shoots_table', 3),
(7, '2019_08_07_141217_create_feedback_table', 4),
(8, '2019_08_07_181808_create_categories_table', 4),
(9, '2019_08_07_181815_create_shoots_table', 4),
(10, '2019_08_07_182958_create_comments_table', 4),
(11, '2019_08_07_204452_add_user_id_to_comments', 4),
(12, '2019_08_08_101037_create_carts_table', 4),
(13, '2019_08_10_144739_add_search_tags_shoots', 5),
(14, '2019_08_14_155436_create_orders_table', 6),
(16, '2019_08_15_052259_create_views_table', 7),
(19, '2019_08_15_112613_create_likes_table', 8),
(24, '2019_08_18_070002_add_column_to_users', 9),
(26, '2019_08_18_102102_create_hires_table', 10),
(28, '2019_08_18_161401_add_column_to_hires', 12),
(30, '2019_09_04_175243_create_messengers_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_address` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cart_id`, `shipping_address`, `created_at`, `updated_at`) VALUES
(6, 9, 'zxc', '2019-08-14 23:14:45', '2019-08-14 23:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shoots`
--

CREATE TABLE `shoots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `caption` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `capture_by` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lens` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resolution` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `software` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `like` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `search_tags` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoots`
--

INSERT INTO `shoots` (`id`, `user_id`, `category_id`, `caption`, `file_name`, `price`, `description`, `capture_by`, `lens`, `file_size`, `resolution`, `software`, `view`, `like`, `created_at`, `updated_at`, `search_tags`) VALUES
(1, 11, 1, 'asdad', 'p11@gmail.com213.jpg', 100, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-09 12:53:35', '2019-09-04 11:14:02', ''),
(2, 11, 5, 'dsdsd', 'p11@gmail.com146.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-09 12:54:56', '2019-08-18 04:36:00', ''),
(3, 11, 4, 'asdas', 'p11@gmail.com50.jpg', 600, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-08-09 12:55:20', '2019-09-04 04:23:34', ''),
(4, 12, 2, 'sfsdfsdf', 'p22@gmail.com364.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, '2019-08-09 12:59:01', '2019-08-15 06:28:53', ''),
(5, 12, 4, 'fsdfsdf', 'p22@gmail.com159.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2019-08-09 12:59:23', '2019-09-04 04:23:33', ''),
(6, 12, 1, 'zssfdf', 'p22@gmail.com628.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-09 12:59:48', '2019-08-15 06:28:53', ''),
(7, 12, 5, 'sfsdfsd', 'p22@gmail.com369.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-09 13:00:14', '2019-08-18 04:36:01', ''),
(8, 12, 3, 'dfsdfs', 'p22@gmail.com244.jpg', 400, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, '2019-08-09 13:00:49', '2019-08-18 04:36:00', ''),
(9, 12, 3, 'sdfsdfs', 'p22@gmail.com429.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-08-09 13:01:31', '2019-09-04 04:23:34', ''),
(10, 13, 1, 'elephant', 'p33@gmail.com226.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-10 08:56:15', '2019-08-15 06:28:53', 'elephant wild life'),
(11, 13, 3, 'swiming', 'p33@gmail.com846.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, '2019-08-10 08:56:57', '2019-08-18 04:36:00', 'swiming sports');

-- --------------------------------------------------------

--
-- Table structure for table `trends`
--

CREATE TABLE `trends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `caption` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shoot_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `about` text COLLATE utf8mb4_unicode_ci,
  `capture_by` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lens` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `software` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(170) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagline` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hire_status` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `tagline`, `facebook`, `instagram`, `rating`, `address`, `type`, `status`, `remember_token`, `created_at`, `updated_at`, `hire_status`) VALUES
(1, 'p1', 'p1@gmail.com', NULL, '$2y$10$FmFvxCUgjTItaDK068GH4.U.RYyq.36NtV.2CP35PETJSU7spRaJa', '01@gmail.com.jpg', 'khdsd', NULL, NULL, NULL, 'ka-129, kuril Dhaka', 'photographer', 'active', NULL, '2019-07-29 14:34:57', '2019-07-31 23:31:25', 'active'),
(2, 'c1', 'c1@gmail.com', NULL, '$2y$10$MV5CSo.1QKuRL/N6PNRJwe8ii9pwx9ek0Do3MbBrAlQQ2QYMHLZhS', 'c1@gmail.com.jpg', 'my tagline', NULL, '/ismhosen', NULL, 'ka-129, kuril Dhaka', 'client', 'block', NULL, '2019-07-29 14:38:59', '2019-08-14 05:30:47', 'active'),
(3, 'admin', 'admin@gmail.com', NULL, '$2y$10$vuwIRDMAxx3m.hyEjqIQ/emm6L5GrM8Or8r.9.aWJYwP8.SANNkdi', 'admin@gmail.com.jpg', NULL, NULL, NULL, NULL, NULL, 'admin', 'active', NULL, '2019-07-29 14:59:03', '2019-08-09 13:13:36', 'active'),
(4, 'c3', 'c3@gmail.com', NULL, '$2y$10$Fy3rYttikvtvDU2NlP3H3eJQsvvPXAPZv2jlbKvpxNNYF.5n4Vq5u', 'c3@gmail.com.jpg', NULL, NULL, NULL, NULL, NULL, 'client', 'active', NULL, '2019-07-30 00:16:53', '2019-07-30 00:16:53', 'active'),
(5, 'p3', 'p3@gmail.com', NULL, '$2y$10$6zFEXC1P8eDbsaPzWip3SOc8PFGxTlO7Fy88xHHKQZ7TxETTOhi5i', 'p3@gmail.com.jpg', NULL, NULL, NULL, NULL, NULL, 'photographer', 'active', NULL, '2019-07-30 00:38:57', '2019-07-30 00:38:57', 'active'),
(6, 'p4', 'p4@gmail.com', NULL, '$2y$10$KBQc5/.Ly671JnCTF3zEmesXB.6dPeNfBcN8hg7Wh/xB41zmIT.Eq', 'p4@gmail.com.jpg', NULL, NULL, NULL, NULL, NULL, 'photographer', 'active', NULL, '2019-07-30 00:40:52', '2019-07-30 00:40:52', 'active'),
(7, 'c5', 'c5@gmail.com', NULL, '$2y$10$TrojtmATwnzTuz4quCv.i.ae3okucNHlHocn0IV3oz4m2RV4SoLE6', 'c5@gmail.com.jpg', NULL, NULL, NULL, NULL, NULL, 'client', 'active', NULL, '2019-07-30 00:43:11', '2019-07-30 00:43:11', 'active'),
(8, 'p6', 'p6@gmail.com', NULL, '$2y$10$qote.Ih7h.Qpe2keRDsSbOq6QGt7P9fzs7257H1LeTbb.C5EDznvK', 'p6@gmail.com.jpg', 'Capture your dream', NULL, NULL, NULL, NULL, 'photographer', 'active', NULL, '2019-07-30 00:56:45', '2019-07-30 00:58:40', 'active'),
(9, 'ismail', 'ism@gmail.com', NULL, '$2y$10$QcCy1ca2NHN8n5dIrG4FceLV6.AgsCo5qlvZS2VnR6TeeR5OURhNW', 'ism@gmail.com.jpg', NULL, NULL, NULL, NULL, NULL, 'photographer', 'block', NULL, '2019-08-04 00:10:55', '2019-08-12 12:15:14', 'active'),
(10, 'client1', 'c11@gmail.com', NULL, '$2y$10$EJRAdRSgh0RsPjZtbJW.ZeWc4wozh.tNKTqp/YlDCVSZJ7QvqTmJ2', 'c11@gmail.com.jpg', NULL, NULL, NULL, NULL, 'xzxczx', 'client', 'active', NULL, '2019-08-09 11:05:51', '2019-08-09 11:19:24', 'active'),
(11, 'p11', 'p11@gmail.com', NULL, '$2y$10$IiI/btdGpYWc2FEJzMrFGOZvCclm3YKyPCNijyWChT6PkHN7c86oG', 'p11@gmail.com.jpg', 'hfjdk', NULL, NULL, NULL, NULL, 'photographer', 'active', NULL, '2019-08-09 12:31:57', '2019-09-04 07:43:18', 'active'),
(12, 'p22', 'p22@gmail.com', NULL, '$2y$10$ewR8z/ttA.H2VTlimEwkiuvIXGF2SThEm09bj0xvZwPtPd4c9yXY6', 'p22@gmail.com.png', NULL, NULL, NULL, NULL, NULL, 'photographer', 'block', NULL, '2019-08-09 12:58:16', '2019-08-12 12:15:10', 'active'),
(13, 'p33', 'p33@gmail.com', NULL, '$2y$10$iEDJKt2ATvi2pnuPMJccv.Uz6SUC69Ypfx8g4cuHKRjHX7YZULc76', 'p33@gmail.com.jpg', NULL, NULL, NULL, NULL, NULL, 'photographer', 'active', NULL, '2019-08-10 08:39:12', '2019-08-10 08:39:12', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shoot_id` bigint(20) UNSIGNED NOT NULL,
  `mac_address` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `shoot_id`, `mac_address`, `created_at`, `updated_at`) VALUES
(1, 5, 'F4-D1-08-0A-2E-C6   Media disconnected', '2019-08-15 00:21:32', '2019-08-15 00:21:32'),
(2, 6, 'F4-D1-08-0A-2E-C6   Media disconnected', '2019-08-15 00:21:47', '2019-08-15 00:21:47'),
(4, 8, 'F4-D1-08-0A-2E-C6   Media disconnected', '2019-08-15 01:14:30', '2019-08-15 01:14:30'),
(5, 8, 'F4-D1-08-0A-2E-C7   Media disconnected', '2019-08-15 01:16:01', '2019-08-15 01:16:01'),
(6, 9, 'F4-D1-08-0A-2E-C6   Media disconnected', '2019-08-15 01:28:04', '2019-08-15 01:28:04'),
(7, 10, 'F4-D1-08-0A-2E-C6   Media disconnected', '2019-08-15 01:28:58', '2019-08-15 01:28:58'),
(8, 4, 'F4-D1-08-0A-2E-C6   Media disconnected', '2019-08-15 01:36:17', '2019-08-15 01:36:17'),
(9, 3, 'F4-D1-08-0A-2E-C6   Media disconnected', '2019-08-15 01:36:41', '2019-08-15 01:36:41'),
(10, 7, 'F4-D1-08-0A-2E-C6   Media disconnected', '2019-08-15 01:36:44', '2019-08-15 01:36:44'),
(11, 2, 'F4-D1-08-0A-2E-C6   Media disconnected', '2019-08-15 01:38:01', '2019-08-15 01:38:01'),
(12, 11, 'F4-D1-08-0A-2E-C6   Media disconnected', '2019-08-15 04:34:48', '2019-08-15 04:34:48'),
(13, 4, '6C-2B-59-48-2E-32   Media disconnected', '2019-08-15 06:02:31', '2019-08-15 06:02:31'),
(14, 11, '6C-2B-59-48-2E-32   Media disconnected', '2019-08-15 06:25:15', '2019-08-15 06:25:15'),
(15, 5, '6C-2B-59-48-2E-32   Media disconnected', '2019-08-16 05:09:09', '2019-08-16 05:09:09'),
(16, 1, 'F4-D1-08-0A-2E-C6   Media disconnected', '2019-09-04 07:50:07', '2019-09-04 07:50:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_shoot_id_foreign` (`shoot_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_shoot_id_foreign` (`shoot_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hires`
--
ALTER TABLE `hires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hires_client_id_foreign` (`client_id`),
  ADD KEY `hires_photographer_id_foreign` (`photographer_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_shoot_id_foreign` (`shoot_id`),
  ADD KEY `likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `messengers`
--
ALTER TABLE `messengers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messengers_sender_id_foreign` (`sender_id`),
  ADD KEY `messengers_receiver_id_foreign` (`receiver_id`);

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
  ADD KEY `orders_cart_id_foreign` (`cart_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `shoots`
--
ALTER TABLE `shoots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shoots_user_id_foreign` (`user_id`),
  ADD KEY `shoots_category_id_foreign` (`category_id`);

--
-- Indexes for table `trends`
--
ALTER TABLE `trends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trends_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `views_shoot_id_foreign` (`shoot_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hires`
--
ALTER TABLE `hires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messengers`
--
ALTER TABLE `messengers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shoots`
--
ALTER TABLE `shoots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `trends`
--
ALTER TABLE `trends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_shoot_id_foreign` FOREIGN KEY (`shoot_id`) REFERENCES `shoots` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_shoot_id_foreign` FOREIGN KEY (`shoot_id`) REFERENCES `shoots` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hires`
--
ALTER TABLE `hires`
  ADD CONSTRAINT `hires_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hires_photographer_id_foreign` FOREIGN KEY (`photographer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_shoot_id_foreign` FOREIGN KEY (`shoot_id`) REFERENCES `shoots` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messengers`
--
ALTER TABLE `messengers`
  ADD CONSTRAINT `messengers_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messengers_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shoots`
--
ALTER TABLE `shoots`
  ADD CONSTRAINT `shoots_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shoots_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trends`
--
ALTER TABLE `trends`
  ADD CONSTRAINT `trends_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `views_shoot_id_foreign` FOREIGN KEY (`shoot_id`) REFERENCES `shoots` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
