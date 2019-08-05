-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2019 at 10:47 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `city_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_radius` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `city_radius`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'Noida', '50', '28.5355170', '77.3910290', '2019-02-11 15:01:54', '2019-02-12 11:01:40'),
(2, 'New Delhi', '60', '28.6448000', '77.2167210', '2019-02-11 16:32:50', '2019-02-12 11:02:39'),
(3, 'Lucknow', '40', '26.8466950', '80.9461670', '2019-02-12 11:06:35', '2019-02-12 11:06:35'),
(4, 'Barabanki', '30', '26.9955060', '81.2518840', '2019-02-12 11:07:35', '2019-02-12 11:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(55, 13, 2, 'comment goes here', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(31, 8, 1, '2019-01-04 13:20:45', '2019-01-04 13:20:45'),
(46, 1, 34, '2019-01-12 06:13:41', '2019-01-12 06:13:41'),
(47, 1, 33, '2019-01-12 06:13:45', '2019-01-12 06:13:45'),
(48, 1, 5, '2019-01-12 06:14:05', '2019-01-12 06:14:05'),
(49, 2, 6, '2019-01-14 06:16:08', '2019-01-14 06:16:08'),
(50, 2, 13, '2019-01-24 07:14:02', '2019-01-24 07:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `follows_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `user_id`, `follows_id`, `created_at`, `updated_at`) VALUES
(6, 2, 1, '2019-01-10 09:17:45', '2019-01-10 09:17:45'),
(7, 2, 19, '2019-01-10 10:51:49', '2019-01-10 10:51:49'),
(8, 1, 3, '2019-01-10 12:39:51', '2019-01-10 12:39:51'),
(9, 6, 2, '2019-01-14 06:02:52', '2019-01-14 06:02:52'),
(13, 1, 2, '2019-01-24 07:32:18', '2019-01-24 07:32:18'),
(18, 2, 21, '2019-02-12 14:05:55', '2019-02-12 14:05:55'),
(19, 2, 20, '2019-02-12 14:06:16', '2019-02-12 14:06:16');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `like` enum('1','0','null') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`, `like`, `created_at`, `updated_at`) VALUES
(16, 16, 8, '1', '2019-01-02 05:24:17', '2019-01-02 05:24:17'),
(17, 16, 9, '1', '2019-01-02 05:25:50', '2019-01-02 05:25:50'),
(22, 15, 9, '1', '2019-01-02 07:26:04', '2019-01-02 07:26:04'),
(23, 15, 8, '1', '2019-01-02 07:27:13', '2019-01-02 07:27:13'),
(28, 2, 8, '1', '2019-01-04 13:38:49', '2019-01-04 13:38:49'),
(29, 6, 10, '1', '2019-01-07 03:17:15', '2019-01-07 03:17:15'),
(30, 4, 9, '1', '2019-01-07 03:21:29', '2019-01-07 03:21:29'),
(32, 4, 2, '1', '2019-01-07 07:25:48', '2019-01-07 07:25:48'),
(37, 108, 2, '1', '2019-01-30 12:09:42', '2019-01-30 12:09:42'),
(38, 13, 2, '1', '2019-02-08 10:41:48', '2019-02-08 10:41:48');

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(22, '2018_12_29_122507_create_comments_table', 7),
(26, '2018_12_29_122632_create_likes_table', 9),
(29, '2018_12_28_114351_create_posts_table', 12),
(30, '2019_01_03_160252_create_searches_table', 12),
(31, '2019_01_04_120851_create_favorites_table', 13),
(32, '2019_01_07_090146_create_notifications_table', 14),
(36, '2018_12_29_122653_create_followers_table', 17),
(38, '2014_10_12_100000_create_password_resets_table', 18),
(39, '2014_10_12_000000_create_users_table', 19),
(41, '2019_01_08_160102_create_cities_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('009016c9-3a04-47f8-8baf-2f4a54484a0e', 'App\\Notifications\\NewCommentPost', 'App\\User', 2, '{\"comment\":{\"user_id\":2,\"post_id\":108,\"comment\":\"it is first notificaton comment\",\"updated_at\":\"2019-01-22 13:23:32\",\"created_at\":\"2019-01-22 13:23:32\",\"id\":47},\"post\":{\"id\":108,\"user_id\":2,\"post_text\":\"amet dfdfdfdadipisicing elit. Rnecessitat\",\"post_image\":null,\"color\":\"#fff\",\"longitude\":\"-3.7037900\",\"latitude\":\"40.4188900\",\"created_at\":\"2019-01-21 11:15:13\",\"updated_at\":\"2019-01-21 11:15:13\",\"deleted_at\":null},\"user\":{\"id\":2,\"username\":\"AYTXOB\",\"phone\":\"9889919029\",\"email\":\"shakeel@chetu.com\",\"email_verified_at\":null,\"show_me\":1,\"type\":\"default\",\"longitude\":\"11.6000000\",\"latitude\":\"10.4000000\",\"created_at\":\"2019-01-21 15:46:19\",\"updated_at\":\"2019-01-21 15:46:19\"}}', NULL, '2019-01-22 07:53:32', '2019-01-22 07:53:32'),
('0290e6b8-5976-40cf-80b5-4917e31e2ef2', 'App\\Notifications\\UserFollowed', 'App\\User', 8, '{\"follower_id\":2,\"follower_name\":\"AYTXOB\"}', NULL, '2019-01-30 12:05:24', '2019-01-30 12:05:24'),
('05430733-1c40-45bc-9f6f-ef4a92614f7f', 'App\\Notifications\\NewCommentPost', 'App\\User', 2, '{\"comment\":{\"user_id\":2,\"post_id\":6,\"comment\":\"anymous secrets is awesom to share own thughts\",\"updated_at\":\"2019-02-08 22:33:02\",\"created_at\":\"2019-02-08 22:33:02\",\"id\":57},\"post\":{\"id\":6,\"user_id\":2,\"post_text\":\"Hello Lorem sit amet consectetur adipisicing elit. Rnecessitat\",\"post_image\":null,\"color\":\"#fff\",\"longitude\":\"1.7800000\",\"latitude\":\"2.8900000\",\"created_at\":\"2019-01-07 08:37:53\",\"updated_at\":\"2019-01-07 08:37:53\",\"deleted_at\":null},\"user\":{\"id\":2,\"username\":\"AYTXOB\",\"phone\":\"9889919029\",\"email\":\"shakeel@chetu.com\",\"email_verified_at\":null,\"show_me\":1,\"type\":\"default\",\"status\":1,\"longitude\":\"11.6000000\",\"latitude\":\"10.4000000\",\"created_at\":\"2019-01-21 15:46:19\",\"updated_at\":\"2019-01-30 17:05:41\"}}', NULL, '2019-02-08 17:03:03', '2019-02-08 17:03:03'),
('10933d88-09af-4361-a7f8-4ccc0037bbb2', 'App\\Notifications\\UserFollowed', 'App\\User', 2, '{\"follower_id\":1,\"follower_name\":\"WP7PF6\"}', NULL, '2019-01-24 07:32:18', '2019-01-24 07:32:18'),
('14065de3-a5b3-4e8c-a3f0-19a0cef71cc4', 'App\\Notifications\\UserFollowed', 'App\\User', 8, '{\"follower_id\":2,\"follower_name\":\"AYTXOB\"}', NULL, '2019-02-18 11:20:24', '2019-02-18 11:20:24'),
('1e14eca6-cb09-4851-80e2-1c6828c0ebcb', 'App\\Notifications\\NewLikePost', 'App\\User', 1, '{\"like\":{\"post_id\":\"108\",\"user_id\":2,\"like\":1,\"updated_at\":\"2019-01-30 17:39:42\",\"created_at\":\"2019-01-30 17:39:42\",\"id\":37},\"post\":{\"id\":108,\"user_id\":1,\"post_text\":\"amet dfdfdfdadipisicing elit. Rnecessitat\",\"post_image\":null,\"color\":\"#fff\",\"longitude\":\"-3.7037900\",\"latitude\":\"40.4188900\",\"created_at\":\"2019-01-21 11:15:13\",\"updated_at\":\"2019-01-21 11:15:13\",\"deleted_at\":null},\"user\":{\"id\":2,\"username\":\"AYTXOB\",\"phone\":\"9889919029\",\"email\":\"shakeel@chetu.com\",\"email_verified_at\":null,\"show_me\":1,\"type\":\"default\",\"status\":1,\"longitude\":\"11.6000000\",\"latitude\":\"10.4000000\",\"created_at\":\"2019-01-21 15:46:19\",\"updated_at\":\"2019-01-30 17:05:41\"}}', NULL, '2019-01-30 12:09:42', '2019-01-30 12:09:42'),
('1f53aa7a-c4f6-4703-8750-5d75431d9b90', 'App\\Notifications\\NewPost', 'App\\User', 1, '{\"following_id\":2,\"following_name\":\"AYTXOB\",\"post_id\":110}', NULL, '2019-01-30 11:27:48', '2019-01-30 11:27:48'),
('21d4ef3c-65b7-4d1c-acb6-14b51d9db27d', 'App\\Notifications\\NewLikePost', 'App\\User', 2, '{\"like\":{\"post_id\":\"108\",\"user_id\":2,\"like\":1,\"updated_at\":\"2019-01-22 13:34:02\",\"created_at\":\"2019-01-22 13:34:02\",\"id\":35},\"post\":{\"id\":108,\"user_id\":2,\"post_text\":\"amet dfdfdfdadipisicing elit. Rnecessitat\",\"post_image\":null,\"color\":\"#fff\",\"longitude\":\"-3.7037900\",\"latitude\":\"40.4188900\",\"created_at\":\"2019-01-21 11:15:13\",\"updated_at\":\"2019-01-21 11:15:13\",\"deleted_at\":null},\"user\":{\"id\":2,\"username\":\"AYTXOB\",\"phone\":\"9889919029\",\"email\":\"shakeel@chetu.com\",\"email_verified_at\":null,\"show_me\":1,\"type\":\"default\",\"longitude\":\"11.6000000\",\"latitude\":\"10.4000000\",\"created_at\":\"2019-01-21 15:46:19\",\"updated_at\":\"2019-01-21 15:46:19\"}}', NULL, '2019-01-22 08:04:02', '2019-01-22 08:04:02'),
('277d2efa-1761-4d1f-bc40-e6197847705c', 'App\\Notifications\\NewPost', 'App\\User', 6, '{\"following_id\":2,\"following_name\":\"AYTXOB\",\"post_id\":13}', NULL, '2019-02-08 10:41:14', '2019-02-08 10:41:14'),
('279fe7c5-3cb7-4ece-a6e1-1f509f5c70da', 'App\\Notifications\\NewPost', 'App\\User', 6, '{\"following_id\":2,\"following_name\":\"AYTXOB\",\"post_id\":113}', NULL, '2019-01-30 13:47:35', '2019-01-30 13:47:35'),
('2e613cf7-1301-412f-8c45-e5f5cad2a44c', 'App\\Notifications\\NewPost', 'App\\User', 2, '{\"following_id\":1,\"following_name\":\"admin\",\"post_id\":111}', NULL, '2019-01-29 12:35:26', '2019-01-29 12:35:26'),
('2ec4a177-aa08-46fe-92b6-9f4e15863b94', 'App\\Notifications\\NewLikePost', 'App\\User', 1, '{\"like\":{\"post_id\":\"108\",\"user_id\":2,\"like\":1,\"updated_at\":\"2019-01-30 17:39:31\",\"created_at\":\"2019-01-30 17:39:31\",\"id\":36},\"post\":{\"id\":108,\"user_id\":1,\"post_text\":\"amet dfdfdfdadipisicing elit. Rnecessitat\",\"post_image\":null,\"color\":\"#fff\",\"longitude\":\"-3.7037900\",\"latitude\":\"40.4188900\",\"created_at\":\"2019-01-21 11:15:13\",\"updated_at\":\"2019-01-21 11:15:13\",\"deleted_at\":null},\"user\":{\"id\":2,\"username\":\"AYTXOB\",\"phone\":\"9889919029\",\"email\":\"shakeel@chetu.com\",\"email_verified_at\":null,\"show_me\":1,\"type\":\"default\",\"status\":1,\"longitude\":\"11.6000000\",\"latitude\":\"10.4000000\",\"created_at\":\"2019-01-21 15:46:19\",\"updated_at\":\"2019-01-30 17:05:41\"}}', NULL, '2019-01-30 12:09:31', '2019-01-30 12:09:31'),
('31b20ccf-69c0-4743-81e7-4512204c7f59', 'App\\Notifications\\NewPost', 'App\\User', 1, '{\"following_id\":2,\"following_name\":\"AYTXOB\",\"post_id\":113}', '2019-02-04 17:59:27', '2019-01-30 13:47:35', '2019-02-04 17:59:27'),
('31e46c07-b836-4fa8-9d03-45c6853f98a7', 'App\\Notifications\\NewPost', 'App\\User', 2, '{\"following_id\":1,\"following_name\":\"admin\",\"post_id\":125}', NULL, '2019-02-04 13:08:35', '2019-02-04 13:08:35'),
('381884a7-c275-4d6b-aae3-62180c72c1c4', 'App\\Notifications\\NewPost', 'App\\User', 1, '{\"following_id\":2,\"following_name\":\"AYTXOB\",\"post_id\":109}', NULL, '2019-01-30 11:26:36', '2019-01-30 11:26:36'),
('49e12897-c2ef-4d10-9cb3-7e31080bd969', 'App\\Notifications\\NewPost', 'App\\User', 2, '{\"following_id\":1,\"following_name\":\"admin\",\"post_id\":12}', NULL, '2019-02-07 16:20:35', '2019-02-07 16:20:35'),
('4a8e3ee8-3d17-42a8-8d87-97959f0f80e7', 'App\\Notifications\\NewPost', 'App\\User', 1, '{\"following_id\":2,\"following_name\":\"AYTXOB\",\"post_id\":112}', NULL, '2019-01-30 11:28:09', '2019-01-30 11:28:09'),
('4f014025-4a80-467c-873e-8daa1578baf5', 'App\\Notifications\\NewPost', 'App\\User', 2, '{\"following_id\":1,\"following_name\":\"admin\",\"post_id\":115}', NULL, '2019-02-04 12:48:56', '2019-02-04 12:48:56'),
('56c7a0f9-68f2-44a3-aee6-ff0d0c8a8a97', 'App\\Notifications\\NewCommentPost', 'App\\User', 1, '{\"comment\":{\"user_id\":2,\"post_id\":108,\"comment\":\"It is a long established fact that a reader will be distracted by\",\"updated_at\":\"2019-01-30 17:43:39\",\"created_at\":\"2019-01-30 17:43:39\",\"id\":50},\"post\":{\"id\":108,\"user_id\":1,\"post_text\":\"amet dfdfdfdadipisicing elit. Rnecessitat\",\"post_image\":null,\"color\":\"#fff\",\"longitude\":\"-3.7037900\",\"latitude\":\"40.4188900\",\"created_at\":\"2019-01-21 11:15:13\",\"updated_at\":\"2019-01-21 11:15:13\",\"deleted_at\":null},\"user\":{\"id\":2,\"username\":\"AYTXOB\",\"phone\":\"9889919029\",\"email\":\"shakeel@chetu.com\",\"email_verified_at\":null,\"show_me\":1,\"type\":\"default\",\"status\":1,\"longitude\":\"11.6000000\",\"latitude\":\"10.4000000\",\"created_at\":\"2019-01-21 15:46:19\",\"updated_at\":\"2019-01-30 17:05:41\"}}', NULL, '2019-01-30 12:13:39', '2019-01-30 12:13:39'),
('5e0e48b6-7067-42ef-b110-1e5190c0ce2d', 'App\\Notifications\\NewPost', 'App\\User', 2, '{\"following_id\":1,\"following_name\":\"admin\",\"post_id\":119}', NULL, '2019-02-04 12:54:33', '2019-02-04 12:54:33'),
('661fd096-8cf1-48f6-9d00-04fc9984f5f7', 'App\\Notifications\\NewPost', 'App\\User', 2, '{\"following_id\":1,\"following_name\":\"admin\",\"post_id\":116}', NULL, '2019-02-04 12:49:19', '2019-02-04 12:49:19'),
('667410de-ca03-45e1-be85-119121981ee8', 'App\\Notifications\\NewPost', 'App\\User', 1, '{\"following_id\":2,\"following_name\":\"AYTXOB\",\"post_id\":13}', NULL, '2019-02-08 10:41:14', '2019-02-08 10:41:14'),
('67e687e1-41ce-4fe7-b4bf-f13731e9a498', 'App\\Notifications\\NewPost', 'App\\User', 2, '{\"following_id\":1,\"following_name\":\"WP7PF6\",\"post_id\":110}', NULL, '2019-01-24 07:28:58', '2019-01-24 07:28:58'),
('69980ee7-574e-4d93-9037-7ea14be598c2', 'App\\Notifications\\NewCommentPost', 'App\\User', 2, '{\"comment\":{\"user_id\":2,\"post_id\":13,\"comment\":\"It is a long established fact that a reader will be distracted by\",\"updated_at\":\"2019-02-08 16:12:48\",\"created_at\":\"2019-02-08 16:12:48\",\"id\":54},\"post\":{\"id\":13,\"user_id\":2,\"post_text\":\"amet dfdfdfdadipisicing elit. Rnecessitat\",\"post_image\":null,\"color\":\"#fff\",\"longitude\":\"1.7800000\",\"latitude\":\"2.8900000\",\"created_at\":\"2019-02-08 16:11:14\",\"updated_at\":\"2019-02-08 16:11:14\",\"deleted_at\":null},\"user\":{\"id\":2,\"username\":\"AYTXOB\",\"phone\":\"9889919029\",\"email\":\"shakeel@chetu.com\",\"email_verified_at\":null,\"show_me\":1,\"type\":\"default\",\"status\":1,\"longitude\":\"11.6000000\",\"latitude\":\"10.4000000\",\"created_at\":\"2019-01-21 15:46:19\",\"updated_at\":\"2019-01-30 17:05:41\"}}', NULL, '2019-02-08 10:42:48', '2019-02-08 10:42:48'),
('700746df-6a25-4154-bb36-9d4cd0e699c4', 'App\\Notifications\\UserFollowed', 'App\\User', 21, '{\"follower_id\":2,\"follower_name\":\"AYTXOB\"}', NULL, '2019-02-12 14:05:55', '2019-02-12 14:05:55'),
('7545b294-f613-45ab-a372-1bb4a0e8ebd9', 'App\\Notifications\\UserFollowed', 'App\\User', 8, '{\"follower_id\":2,\"follower_name\":\"AYTXOB\"}', NULL, '2019-02-18 11:15:11', '2019-02-18 11:15:11'),
('7b67de2e-fa37-480e-85c8-e5d289680a40', 'App\\Notifications\\NewPost', 'App\\User', 2, '{\"following_id\":1,\"following_name\":\"WP7PF6\",\"post_id\":111}', NULL, '2019-01-25 17:24:25', '2019-01-25 17:24:25'),
('7da6836e-bc47-4d36-9fb1-4b17b04133aa', 'App\\Notifications\\NewPost', 'App\\User', 2, '{\"following_id\":1,\"following_name\":\"admin\",\"post_id\":114}', NULL, '2019-01-29 12:39:20', '2019-01-29 12:39:20'),
('81186e27-1e87-46bf-b000-7af2c8c25d85', 'App\\Notifications\\NewPost', 'App\\User', 6, '{\"following_id\":2,\"following_name\":\"AYTXOB\",\"post_id\":111}', NULL, '2019-01-30 11:27:57', '2019-01-30 11:27:57'),
('8198f6e6-b483-43e0-98ce-26eac53e5a87', 'App\\Notifications\\NewCommentPost', 'App\\User', 1, '{\"comment\":{\"user_id\":2,\"post_id\":108,\"comment\":\"It is a long established fact that a reader will be distracted by\",\"updated_at\":\"2019-01-30 17:44:27\",\"created_at\":\"2019-01-30 17:44:27\",\"id\":52},\"post\":{\"id\":108,\"user_id\":1,\"post_text\":\"amet dfdfdfdadipisicing elit. Rnecessitat\",\"post_image\":null,\"color\":\"#fff\",\"longitude\":\"-3.7037900\",\"latitude\":\"40.4188900\",\"created_at\":\"2019-01-21 11:15:13\",\"updated_at\":\"2019-01-21 11:15:13\",\"deleted_at\":null},\"user\":{\"id\":2,\"username\":\"AYTXOB\",\"phone\":\"9889919029\",\"email\":\"shakeel@chetu.com\",\"email_verified_at\":null,\"show_me\":1,\"type\":\"default\",\"status\":1,\"longitude\":\"11.6000000\",\"latitude\":\"10.4000000\",\"created_at\":\"2019-01-21 15:46:19\",\"updated_at\":\"2019-01-30 17:05:41\"}}', NULL, '2019-01-30 12:14:27', '2019-01-30 12:14:27'),
('87267533-763a-4e94-846a-04f5fe1d70b8', 'App\\Notifications\\NewCommentPost', 'App\\User', 2, '{\"comment\":{\"user_id\":2,\"post_id\":6,\"comment\":\"anymous secrets is awesom to share own thughts\",\"updated_at\":\"2019-02-08 22:32:42\",\"created_at\":\"2019-02-08 22:32:42\",\"id\":56},\"post\":{\"id\":6,\"user_id\":2,\"post_text\":\"Hello Lorem sit amet consectetur adipisicing elit. Rnecessitat\",\"post_image\":null,\"color\":\"#fff\",\"longitude\":\"1.7800000\",\"latitude\":\"2.8900000\",\"created_at\":\"2019-01-07 08:37:53\",\"updated_at\":\"2019-01-07 08:37:53\",\"deleted_at\":null},\"user\":{\"id\":2,\"username\":\"AYTXOB\",\"phone\":\"9889919029\",\"email\":\"shakeel@chetu.com\",\"email_verified_at\":null,\"show_me\":1,\"type\":\"default\",\"status\":1,\"longitude\":\"11.6000000\",\"latitude\":\"10.4000000\",\"created_at\":\"2019-01-21 15:46:19\",\"updated_at\":\"2019-01-30 17:05:41\"}}', NULL, '2019-02-08 17:02:42', '2019-02-08 17:02:42'),
('8988a465-2db4-4d12-bf1e-c64be660d5ec', 'App\\Notifications\\UserFollowed', 'App\\User', 8, '{\"follower_id\":2,\"follower_name\":\"AYTXOB\"}', NULL, '2019-01-30 12:05:08', '2019-01-30 12:05:08'),
('987bad5d-7364-4d05-b87f-ba5a4bca1376', 'App\\Notifications\\NewPost', 'App\\User', 2, '{\"following_id\":1,\"following_name\":\"admin\",\"post_id\":112}', NULL, '2019-01-29 12:36:50', '2019-01-29 12:36:50'),
('9adc009d-5b5f-4e97-aeec-d15676cf8305', 'App\\Notifications\\NewPost', 'App\\User', 1, '{\"following_id\":2,\"following_name\":\"AYTXOB\",\"post_id\":111}', NULL, '2019-01-30 11:27:57', '2019-01-30 11:27:57'),
('9b59a0e8-bca3-4806-ad2b-27e7989ddf26', 'App\\Notifications\\NewCommentPost', 'App\\User', 1, '{\"comment\":{\"user_id\":2,\"post_id\":108,\"comment\":\"It is a long established fact that a reader will be distracted by\",\"updated_at\":\"2019-01-30 17:50:51\",\"created_at\":\"2019-01-30 17:50:51\",\"id\":53},\"post\":{\"id\":108,\"user_id\":1,\"post_text\":\"amet dfdfdfdadipisicing elit. Rnecessitat\",\"post_image\":null,\"color\":\"#fff\",\"longitude\":\"-3.7037900\",\"latitude\":\"40.4188900\",\"created_at\":\"2019-01-21 11:15:13\",\"updated_at\":\"2019-01-21 11:15:13\",\"deleted_at\":null},\"user\":{\"id\":2,\"username\":\"AYTXOB\",\"phone\":\"9889919029\",\"email\":\"shakeel@chetu.com\",\"email_verified_at\":null,\"show_me\":1,\"type\":\"default\",\"status\":1,\"longitude\":\"11.6000000\",\"latitude\":\"10.4000000\",\"created_at\":\"2019-01-21 15:46:19\",\"updated_at\":\"2019-01-30 17:05:41\"}}', NULL, '2019-01-30 12:20:51', '2019-01-30 12:20:51'),
('9cc8e32f-0c57-4bdb-9385-6ecc21f93ca9', 'App\\Notifications\\NewPost', 'App\\User', 6, '{\"following_id\":2,\"following_name\":\"AYTXOB\",\"post_id\":110}', NULL, '2019-01-30 11:27:48', '2019-01-30 11:27:48'),
('9fdf2090-fc2a-4b73-ad1c-931784d97599', 'App\\Notifications\\NewCommentPost', 'App\\User', 1, '{\"comment\":{\"user_id\":2,\"post_id\":108,\"comment\":\"It is a long established fact that a reader will be distracted by\",\"updated_at\":\"2019-01-30 17:44:20\",\"created_at\":\"2019-01-30 17:44:20\",\"id\":51},\"post\":{\"id\":108,\"user_id\":1,\"post_text\":\"amet dfdfdfdadipisicing elit. Rnecessitat\",\"post_image\":null,\"color\":\"#fff\",\"longitude\":\"-3.7037900\",\"latitude\":\"40.4188900\",\"created_at\":\"2019-01-21 11:15:13\",\"updated_at\":\"2019-01-21 11:15:13\",\"deleted_at\":null},\"user\":{\"id\":2,\"username\":\"AYTXOB\",\"phone\":\"9889919029\",\"email\":\"shakeel@chetu.com\",\"email_verified_at\":null,\"show_me\":1,\"type\":\"default\",\"status\":1,\"longitude\":\"11.6000000\",\"latitude\":\"10.4000000\",\"created_at\":\"2019-01-21 15:46:19\",\"updated_at\":\"2019-01-30 17:05:41\"}}', NULL, '2019-01-30 12:14:21', '2019-01-30 12:14:21'),
('a235f5ba-1b81-44e3-9c49-9195a55778a7', 'App\\Notifications\\NewPost', 'App\\User', 2, '{\"following_id\":1,\"following_name\":\"admin\",\"post_id\":115}', NULL, '2019-01-29 12:42:21', '2019-01-29 12:42:21'),
('a4be1c63-3580-405d-b243-222f65f62894', 'App\\Notifications\\NewCommentPost', 'App\\User', 2, '{\"comment\":{\"user_id\":2,\"post_id\":4,\"comment\":\"Nice article im so happy with this article.\",\"updated_at\":\"2019-02-08 16:59:25\",\"created_at\":\"2019-02-08 16:59:25\",\"id\":55},\"post\":{\"id\":4,\"user_id\":2,\"post_text\":\"Hello Lorem sit amet consectetur adipisicing elit. Rnecessitatibu\",\"post_image\":null,\"color\":\"#fff\",\"longitude\":\"1.7800000\",\"latitude\":\"2.8900000\",\"created_at\":\"2019-01-04 17:48:28\",\"updated_at\":\"2019-01-04 17:48:28\",\"deleted_at\":null},\"user\":{\"id\":2,\"username\":\"AYTXOB\",\"phone\":\"9889919029\",\"email\":\"shakeel@chetu.com\",\"email_verified_at\":null,\"show_me\":1,\"type\":\"default\",\"status\":1,\"longitude\":\"11.6000000\",\"latitude\":\"10.4000000\",\"created_at\":\"2019-01-21 15:46:19\",\"updated_at\":\"2019-01-30 17:05:41\"}}', NULL, '2019-02-08 11:29:25', '2019-02-08 11:29:25'),
('af7ac7c9-3296-4a32-8343-01ff1a3c14cd', 'App\\Notifications\\NewPost', 'App\\User', 2, '{\"following_id\":1,\"following_name\":\"WP7PF6\",\"post_id\":109}', NULL, '2019-01-24 05:33:16', '2019-01-24 05:33:16'),
('b2430300-2cb7-4581-a404-f4c9b03d4022', 'App\\Notifications\\NewPost', 'App\\User', 2, '{\"following_id\":1,\"following_name\":\"admin\",\"post_id\":123}', NULL, '2019-02-04 13:05:57', '2019-02-04 13:05:57'),
('b3fb824d-51f9-4696-bc2f-1f6b05511451', 'App\\Notifications\\UserFollowed', 'App\\User', 8, '{\"follower_id\":2,\"follower_name\":\"AYTXOB\"}', NULL, '2019-01-30 12:07:19', '2019-01-30 12:07:19'),
('b945a805-fbc0-4050-9401-8922eef3c5be', 'App\\Notifications\\UserFollowed', 'App\\User', 8, '{\"follower_id\":2,\"follower_name\":\"AYTXOB\"}', NULL, '2019-01-30 12:00:43', '2019-01-30 12:00:43'),
('bb491226-a5c7-4d11-bc4a-71be36811941', 'App\\Notifications\\NewPost', 'App\\User', 2, '{\"following_id\":1,\"following_name\":\"admin\",\"post_id\":114}', NULL, '2019-02-04 12:35:17', '2019-02-04 12:35:17'),
('bd9e9189-0494-43d3-8111-11ee630b8f70', 'App\\Notifications\\NewPost', 'App\\User', 2, '{\"following_id\":1,\"following_name\":\"admin\",\"post_id\":117}', NULL, '2019-02-04 12:50:44', '2019-02-04 12:50:44'),
('c311b10c-fbe3-4a8a-89d4-141725400180', 'App\\Notifications\\NewPost', 'App\\User', 2, '{\"following_id\":1,\"following_name\":\"admin\",\"post_id\":126}', '2019-02-04 17:59:33', '2019-02-04 13:42:11', '2019-02-04 17:59:33'),
('caf336c1-78d5-4a91-89b2-380b1cdc0fcd', 'App\\Notifications\\NewPost', 'App\\User', 2, '{\"following_id\":1,\"following_name\":\"admin\",\"post_id\":113}', NULL, '2019-01-29 12:37:59', '2019-01-29 12:37:59'),
('cd25efd0-f1a9-4757-b16b-8effa4a76ee2', 'App\\Notifications\\NewPost', 'App\\User', 2, '{\"following_id\":1,\"following_name\":\"admin\",\"post_id\":118}', NULL, '2019-02-04 12:53:59', '2019-02-04 12:53:59'),
('e07ab3f9-2ea4-4f48-891e-a8d0edcab214', 'App\\Notifications\\NewCommentPost', 'App\\User', 2, '{\"comment\":{\"user_id\":2,\"post_id\":108,\"comment\":\"it is first notificaton comment\",\"updated_at\":\"2019-01-22 13:25:39\",\"created_at\":\"2019-01-22 13:25:39\",\"id\":48},\"post\":{\"id\":108,\"user_id\":2,\"post_text\":\"amet dfdfdfdadipisicing elit. Rnecessitat\",\"post_image\":null,\"color\":\"#fff\",\"longitude\":\"-3.7037900\",\"latitude\":\"40.4188900\",\"created_at\":\"2019-01-21 11:15:13\",\"updated_at\":\"2019-01-21 11:15:13\",\"deleted_at\":null},\"user\":{\"id\":2,\"username\":\"AYTXOB\",\"phone\":\"9889919029\",\"email\":\"shakeel@chetu.com\",\"email_verified_at\":null,\"show_me\":1,\"type\":\"default\",\"longitude\":\"11.6000000\",\"latitude\":\"10.4000000\",\"created_at\":\"2019-01-21 15:46:19\",\"updated_at\":\"2019-01-21 15:46:19\"}}', NULL, '2019-01-22 07:55:40', '2019-01-22 07:55:40'),
('e39278c0-0d51-4706-93e8-63fbeec203f7', 'App\\Notifications\\NewPost', 'App\\User', 2, '{\"following_id\":1,\"following_name\":\"admin\",\"post_id\":124}', NULL, '2019-02-04 13:07:28', '2019-02-04 13:07:28'),
('ef63d4e5-c9b1-4948-80e3-c0e71c17b61d', 'App\\Notifications\\NewPost', 'App\\User', 2, '{\"following_id\":1,\"following_name\":\"admin\",\"post_id\":122}', NULL, '2019-02-04 13:05:32', '2019-02-04 13:05:32'),
('f23df9cb-00f2-43c1-af50-e4fc44d09569', 'App\\Notifications\\NewLikePost', 'App\\User', 2, '{\"like\":{\"post_id\":\"13\",\"user_id\":2,\"like\":1,\"updated_at\":\"2019-02-08 16:11:48\",\"created_at\":\"2019-02-08 16:11:48\",\"id\":38},\"post\":{\"id\":13,\"user_id\":2,\"post_text\":\"amet dfdfdfdadipisicing elit. Rnecessitat\",\"post_image\":null,\"color\":\"#fff\",\"longitude\":\"1.7800000\",\"latitude\":\"2.8900000\",\"created_at\":\"2019-02-08 16:11:14\",\"updated_at\":\"2019-02-08 16:11:14\",\"deleted_at\":null},\"user\":{\"id\":2,\"username\":\"AYTXOB\",\"phone\":\"9889919029\",\"email\":\"shakeel@chetu.com\",\"email_verified_at\":null,\"show_me\":1,\"type\":\"default\",\"status\":1,\"longitude\":\"11.6000000\",\"latitude\":\"10.4000000\",\"created_at\":\"2019-01-21 15:46:19\",\"updated_at\":\"2019-01-30 17:05:41\"}}', NULL, '2019-02-08 10:41:48', '2019-02-08 10:41:48'),
('f3fca66a-402e-4b68-af02-fb152d8caf5b', 'App\\Notifications\\NewPost', 'App\\User', 6, '{\"following_id\":2,\"following_name\":\"AYTXOB\",\"post_id\":112}', NULL, '2019-01-30 11:28:09', '2019-01-30 11:28:09'),
('f44983eb-049e-499d-b2fb-ebdddf582e8a', 'App\\Notifications\\NewPost', 'App\\User', 6, '{\"following_id\":2,\"following_name\":\"AYTXOB\",\"post_id\":109}', NULL, '2019-01-30 11:26:36', '2019-01-30 11:26:36'),
('f6754a29-97fe-4e8a-902c-17a04c675999', 'App\\Notifications\\NewCommentPost', 'App\\User', 1, '{\"comment\":{\"user_id\":2,\"post_id\":108,\"comment\":\"It is a long established fact that a reader will be distracted by\",\"updated_at\":\"2019-01-30 17:43:30\",\"created_at\":\"2019-01-30 17:43:30\",\"id\":49},\"post\":{\"id\":108,\"user_id\":1,\"post_text\":\"amet dfdfdfdadipisicing elit. Rnecessitat\",\"post_image\":null,\"color\":\"#fff\",\"longitude\":\"-3.7037900\",\"latitude\":\"40.4188900\",\"created_at\":\"2019-01-21 11:15:13\",\"updated_at\":\"2019-01-21 11:15:13\",\"deleted_at\":null},\"user\":{\"id\":2,\"username\":\"AYTXOB\",\"phone\":\"9889919029\",\"email\":\"shakeel@chetu.com\",\"email_verified_at\":null,\"show_me\":1,\"type\":\"default\",\"status\":1,\"longitude\":\"11.6000000\",\"latitude\":\"10.4000000\",\"created_at\":\"2019-01-21 15:46:19\",\"updated_at\":\"2019-01-30 17:05:41\"}}', NULL, '2019-01-30 12:13:30', '2019-01-30 12:13:30'),
('f7089161-b23b-4221-a84c-d2ac29432acc', 'App\\Notifications\\UserFollowed', 'App\\User', 20, '{\"follower_id\":2,\"follower_name\":\"AYTXOB\"}', NULL, '2019-02-12 14:06:16', '2019-02-12 14:06:16'),
('f9224cf1-e2a2-4002-b430-ec33a809ab61', 'App\\Notifications\\NewPost', 'App\\User', 2, '{\"following_id\":1,\"following_name\":\"admin\",\"post_id\":120}', NULL, '2019-02-04 13:00:54', '2019-02-04 13:00:54'),
('fcc1f72a-83af-45fb-a7e3-cbc55fd8af61', 'App\\Notifications\\NewPost', 'App\\User', 2, '{\"following_id\":1,\"following_name\":\"admin\",\"post_id\":121}', NULL, '2019-02-04 13:05:14', '2019-02-04 13:05:14'),
('fe17a4b8-5dc5-4005-a6e9-12352528f29d', 'App\\Notifications\\UserFollowed', 'App\\User', 2, '{\"follower_id\":1,\"follower_name\":\"WP7PF6\"}', NULL, '2019-01-24 06:45:00', '2019-01-24 06:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('014587f34b0129093e39cdb2a11c24b06111159ea16c839b641c0eaae2a89f65a64c6330a968625c', 1, 1, 'API Access', '[]', 0, '2019-01-17 06:46:33', '2019-01-17 06:46:33', '2020-01-17 12:16:33'),
('04254ba3e4be5d542e80e60327dac2c0577587257f6d9be03c427d3acafa1db3bf4837b171a1be51', 6, 2, NULL, '[]', 0, '2019-01-14 05:24:24', '2019-01-14 05:24:24', '2020-01-14 10:54:24'),
('0571e88976f8025a41b523bb699de3e0cbaefc5c8598c67d386fa11f5abc621abbdadd43aeb7b6ac', 2, 1, 'API SpainOptions', '[]', 0, '2019-01-29 09:53:42', '2019-01-29 09:53:42', '2020-01-29 15:23:42'),
('05e5c1ecac9cd5f81cb58070bac7b06efeafd0ebeeace0ba731d46d1ac4897e8ee714168d8eab8f5', 1, 1, 'API Access', '[]', 0, '2019-01-17 06:47:41', '2019-01-17 06:47:41', '2020-01-17 12:17:41'),
('070eeb6c1939f445cc57fda635c4950882532b9d5afd5472ccdc0521deda5113d64e37907f1327a7', 1, 1, 'API Access', '[]', 0, '2019-01-17 06:57:35', '2019-01-17 06:57:35', '2020-01-17 12:27:35'),
('071714b7189aa1386e13d8a8ec2561eb7453be985b5d55f72fdc3311d9620da2afb19add591b3dfa', 3, 2, NULL, '[]', 0, '2019-01-16 10:34:40', '2019-01-16 10:34:40', '2020-01-16 16:04:40'),
('08f7b95cbe29c0b5713654c481545daad7fee4253f231c4b54c18c4116f590c28f883067278adfd0', 1, 2, NULL, '[]', 1, '2019-01-24 05:32:00', '2019-01-24 05:32:00', '2020-01-24 11:02:00'),
('090ee2639add99410b834107d2e20592634618206e878f8f46fad267bffb5d5addea97a68ee36167', 3, 2, NULL, '[]', 0, '2019-01-11 06:14:56', '2019-01-11 06:14:56', '2020-01-11 11:44:56'),
('0a32682849687dc5d6c6d8ea9d918e93550d8fe5e5f59c6777d320448c835747c621a019fcace535', 2, 2, NULL, '[]', 0, '2019-01-07 07:20:45', '2019-01-07 07:20:45', '2020-01-07 12:50:45'),
('0af287ca98b354ed2a447194dac5b5847f2afffdc3dc0ee62b7760c210a0da20fce55abe6576b01a', 2, 1, 'API SpainOptions', '[]', 0, '2019-01-24 06:53:53', '2019-01-24 06:53:53', '2020-01-24 12:23:53'),
('0bd5339c91cd2f30e27771ee441ab329775b3a8aa072efbb773f5c1b479a8d0fbaef394090289287', 3, 2, NULL, '[]', 0, '2019-01-17 04:13:53', '2019-01-17 04:13:53', '2019-01-18 09:43:53'),
('0d0f2bc8d1d03722f27f3c071964418391c28b04a197accbf6196096ad5a5f94aff382366c0c76dc', 2, 1, 'API SpainOptions', '[]', 0, '2019-01-17 07:45:54', '2019-01-17 07:45:54', '2020-01-17 13:15:54'),
('0d23b518297440a8e1c467fb9826a8dfd53f455cf6a36b34955bd5c1e00718dda665f28455609e50', 2, 1, 'API Access', '[]', 1, '2019-01-17 06:58:25', '2019-01-17 06:58:25', '2020-01-17 12:28:25'),
('0ef5ebc1fb64c82b77fd589d05d832ed3d41534b08d10a4a7e4da79a2a6ec206666bc2c68273700e', 2, 1, 'API Access', '[]', 0, '2019-01-17 07:04:28', '2019-01-17 07:04:28', '2020-01-17 12:34:28'),
('0fd04acf4a582ad1a0e87f478904c5029340933cdfba5969902e4362a94b62a8e88d92679a00b332', 6, 2, NULL, '[]', 0, '2019-01-11 06:19:40', '2019-01-11 06:19:40', '2020-01-11 11:49:40'),
('1110f0031f27490089fea6695f52703ea5f58ffbe9d3235e0f6a07f7ed83a81083127d4451ea4c14', 3, 2, NULL, '[]', 0, '2018-12-31 03:27:01', '2018-12-31 03:27:01', '2019-12-31 08:57:01'),
('12f3a444fb226ec873947101593594a31a2b4825496671d09260ba771ff902f6d7ea3adca5eab005', 5, 2, NULL, '[]', 0, '2018-12-29 06:16:33', '2018-12-29 06:16:33', '2019-12-29 11:46:33'),
('17bd4ffc5d4d89d93fe97f8f0a479f019ed4cea98d2c74783fe9bcb44a19b1e455f073bcbd0c3383', 1, 1, 'API SpainOptions', '[]', 0, '2019-01-25 17:22:56', '2019-01-25 17:22:56', '2020-01-25 22:52:56'),
('1837df77a20ec9eb3fa3bce4e312df7a08b1d88d25e56d92c476cb2dd130d50ff01f72981e38f953', 2, 1, 'API SpainOptions', '[]', 1, '2019-01-29 16:48:39', '2019-01-29 16:48:39', '2020-01-29 22:18:39'),
('18ed25fb260e4a66336c1e2213da3578f111a41d7b6fd57aae1f38c859d190cb7a7703b26255eee5', 1, 1, 'LaraPassport', '[]', 0, '2019-01-17 06:53:12', '2019-01-17 06:53:12', '2020-01-17 12:23:12'),
('1caa1f876ade839d7a4499b096044d1dbb57f54008cd30059ca79f66030944de97608a6238a8a0a2', 2, 1, 'API Access', '[]', 0, '2019-01-17 07:08:25', '2019-01-17 07:08:25', '2020-01-17 12:38:25'),
('1cad12ca9c82cd5febfbc0bed61b43c1507774e4b9a50b4a28ae01ee7f9c98a5749759b4b0151b1e', 2, 1, 'API SpainOptions', '[]', 0, '2019-01-17 08:16:49', '2019-01-17 08:16:49', '2020-01-17 13:46:49'),
('1d308c29236b7ce861d2d7794e974e170179191755f94734079ff7155ec089d5e5457411522b9cad', 2, 1, 'API SpainOptions', '[]', 0, '2019-01-17 07:45:45', '2019-01-17 07:45:45', '2020-01-17 13:15:45'),
('1ebb9b921496fb3e49660ffef6ea20b4c52fcb9df704240a0b71838c2355db0c92dc68b9bd9a3f31', 1, 1, 'LaraPassport', '[]', 0, '2019-01-17 06:39:11', '2019-01-17 06:39:11', '2020-01-17 12:09:11'),
('2000656ef3a8d764fe9cb8c40e99e0c087d36e7731cb35e7e36a56c4c45dd8f4425190f271bfce97', 20, 2, NULL, '[]', 0, '2018-12-27 11:10:06', '2018-12-27 11:10:06', '2019-12-27 16:40:06'),
('205a393becefd0bdae29874852c54545eee2468f8a1d70bee1f76072c15dd3dfc2ba3254323cb7d8', 6, 2, NULL, '[]', 0, '2019-01-11 06:31:46', '2019-01-11 06:31:46', '2020-01-11 12:01:46'),
('2143b89de63e459105f157962328819c0f0fbae6128966c05717add6ceb1179d74b91e0fdfc137b5', 2, 1, 'API SpainOptions', '[]', 1, '2019-01-29 16:49:52', '2019-01-29 16:49:52', '2020-01-29 22:19:52'),
('23b80f5dfa020e29c3aaa2b4cc7e03826a07b369f37e7f4b73d7f1e2f2afcb6d55ed8548a433ce42', 3, 2, NULL, '[]', 0, '2019-01-17 04:08:19', '2019-01-17 04:08:19', '2020-01-17 09:38:19'),
('249b138ab491e8b60ee4ae3ba40563651a76dc6d941b5b786f90c80f05ca2f7df2196aed7fb61ed1', 2, 1, 'API SpainOptions', '[]', 0, '2019-01-29 10:01:14', '2019-01-29 10:01:14', '2020-01-29 15:31:14'),
('24c9e239e77bfcc075238572181103284f0d0ae156d41c58697b81ee22ad7656eb744796bff251ec', 19, 2, NULL, '[]', 0, '2018-12-27 11:06:59', '2018-12-27 11:06:59', '2019-12-27 16:36:59'),
('2687762487a907c8e22ed9df871bbc8a85b08ba1c2e87a67ad7cd118040dea9db6d81b7afd936beb', 1, 2, NULL, '[]', 0, '2019-01-10 08:48:24', '2019-01-10 08:48:24', '2020-01-10 14:18:24'),
('28c7808d0de565bc1ebb873a6b86b86002f5ec33570c41b0b72cb3f129c0694914661ddb050d015e', 8, 2, NULL, '[]', 0, '2018-12-31 08:22:16', '2018-12-31 08:22:16', '2019-12-31 13:52:16'),
('298525d2dfb5bfb7bd365fa108eda48d5d725ee1733eb94033c8881ef79726d84f9ba48525d9df2f', 2, 1, 'API SpainOptions', '[]', 1, '2019-01-24 07:33:36', '2019-01-24 07:33:36', '2020-01-24 13:03:36'),
('2a715ec2ee6f9da4f2292df52ac2d777a944cdb8ff43160c331d665564ea79de6e87dcbf6abe2e09', 2, 1, 'API SpainOptions', '[]', 1, '2019-01-29 09:53:03', '2019-01-29 09:53:03', '2020-01-29 15:23:03'),
('2dda08d29e0e74b341ba0d9768baac3a04599414c3e472b56dc369333588a2fa63f15ece97500c29', 9, 2, NULL, '[]', 1, '2019-01-04 08:59:59', '2019-01-04 08:59:59', '2020-01-04 14:29:59'),
('33197192d234d065ac06f9c280e5ad6d799cda290d2b7fced2b834addd7ff46ccb5998d1f16230e5', 3, 2, NULL, '[]', 0, '2019-01-10 10:50:52', '2019-01-10 10:50:52', '2020-01-10 16:20:52'),
('333d06fc28ade346176343fda940963d6a162cffad58f2b93f98f6c87b5a50c74298e126ddb961a6', 2, 1, 'API SpainOptions', '[]', 1, '2019-01-17 08:21:49', '2019-01-17 08:21:49', '2020-01-17 13:51:49'),
('34a62d50fd70c9704527f95fa57a72f3e9ad07df4c2dadd9eb6e840185e42de8134115834148cf46', 2, 1, 'API Access', '[]', 0, '2019-01-17 07:24:43', '2019-01-17 07:24:43', '2020-01-17 12:54:43'),
('34bf851ba88713a3e7a9013215275bcb94caf6116839b4ffaf6d5b35d166e01e4b0a56c2a58c8252', 1, 1, 'API Access', '[]', 0, '2019-01-17 06:51:58', '2019-01-17 06:51:58', '2020-01-17 12:21:58'),
('34efcea728d0a366469894528b7d651af870c8f1d493fd1c975312332e2bcf6c3f420f1e7af1c691', 1, 1, 'LaraPassport', '[]', 0, '2019-01-17 06:31:29', '2019-01-17 06:31:29', '2020-01-17 12:01:29'),
('36ade4f050b6374102ac8e7392106b2831d4de546a1486ad6675c95198c760ca2ff3de163c506f96', 8, 2, NULL, '[]', 0, '2019-01-03 05:40:29', '2019-01-03 05:40:29', '2020-01-03 11:10:29'),
('38d9582795a408a268d2850e75338912e5eec5c1b61cd0b53c681f01bd488611095995def55722ee', 1, 1, 'API Access', '[]', 0, '2019-01-17 06:56:06', '2019-01-17 06:56:06', '2020-01-17 12:26:06'),
('3c1cd92ce0c45f98134d7e1a737fa9138d2f9c8b0705e700724924748e26e443fac4f707467d3178', 1, 2, NULL, '[]', 0, '2019-01-10 12:16:39', '2019-01-10 12:16:39', '2020-01-10 17:46:39'),
('3ce6c09b3b320a32102147a8027c6c833126ac0ec4a96b34cabdfa0793d94823959c0503ec7dad7f', 1, 2, NULL, '[]', 1, '2019-01-11 05:00:31', '2019-01-11 05:00:31', '2020-01-11 10:30:31'),
('3f3efc507f752681dc0100d5b1d563cce4a795b765a88c13a0fa0168d8abc74f8e6cdf710a8c0672', 1, 1, 'LaraPassport', '[]', 0, '2019-01-17 06:10:53', '2019-01-17 06:10:53', '2020-01-17 11:40:53'),
('3f85e02eefee0215ca2c8c07347e414b09a2952d454574703c227a87d87bd25def7051d948ed41a8', 3, 2, NULL, '[]', 1, '2018-12-29 06:27:22', '2018-12-29 06:27:22', '2019-12-29 11:57:22'),
('41feada1e88275f9af69b6895e7cccab1af5331dc0dd999f6712226d7674e4be687bd39912a72c16', 1, 1, 'API Access', '[]', 0, '2019-01-17 06:56:00', '2019-01-17 06:56:00', '2020-01-17 12:26:00'),
('4285dc9b1795506749092ac6fa39224eb9c44bdb619ae30be33c13f276a5ba0a002ebba893d80d37', 1, 1, 'API SpainOptions', '[]', 0, '2019-01-24 07:43:24', '2019-01-24 07:43:24', '2020-01-24 13:13:24'),
('434d2e920c844f29a48215d4a77305231359743b5278a63240c92f07b1ac4eaf75d45b5aa1491a47', 1, 1, 'API Access', '[]', 0, '2019-01-17 06:51:05', '2019-01-17 06:51:05', '2020-01-17 12:21:05'),
('448e04b4f617a00b2a25834421df7624f67f1437115188bd1b275f4a31886d5432b97c872959cbe4', 9, 2, NULL, '[]', 0, '2019-01-14 11:40:23', '2019-01-14 11:40:23', '2020-01-14 17:10:23'),
('4623dfd2db27f7856511b0f8ed0fba897717b2519fce0a8ddb66e81aa398f52d060f7ec9d3da9382', 9, 2, NULL, '[]', 0, '2019-01-02 03:42:25', '2019-01-02 03:42:25', '2020-01-02 09:12:25'),
('4899e67d54d4d2fb7d41698ee4ab1add1b7d6815313889563de0e6cff3ce64f1583f4a0a55ff6e94', 7, 2, NULL, '[]', 0, '2018-12-31 08:21:08', '2018-12-31 08:21:08', '2019-12-31 13:51:08'),
('4e9a5d9c57fc498294cbaf7de028c5dbb0c84446aac4c104b547668577f3932c5daadfa3422f3421', 2, 2, NULL, '[]', 0, '2019-01-04 13:26:09', '2019-01-04 13:26:09', '2020-01-04 18:56:09'),
('4f48b3a83b1a397927d410293ab9638361f34d71541c8a837ff2c756509f88416d4d1459240f3e73', 2, 1, 'API SpainOptions', '[]', 0, '2019-02-15 16:24:46', '2019-02-15 16:24:46', '2020-02-15 21:54:46'),
('50165b06b1cbce2d0014f254d59211d9de0e0cc47ad4cd4e1dc5d61459dbdda1356273fbd964c8eb', 2, 1, 'API Access', '[]', 0, '2019-01-17 07:12:46', '2019-01-17 07:12:46', '2020-01-17 12:42:46'),
('50c7557f67ef57c51d37040cb19951d35dd55b19f0fe9a0bc3495d66055d00d2f9d9093cc7363667', 1, 1, 'API Access', '[]', 0, '2019-01-17 06:54:02', '2019-01-17 06:54:02', '2020-01-17 12:24:02'),
('52cba2a514f81c01522288d80fb8f4f500fbd9307aff035e139bd6f32b17f1576a112993ae288831', 5, 2, NULL, '[]', 0, '2018-12-29 04:01:38', '2018-12-29 04:01:38', '2019-12-29 09:31:38'),
('53d81de5cd50178ea4f372aa4fd8e6a515299b6b93e2d283dd93bfa4b7a38d3ddfb7dbb639ce4ac9', 1, 2, NULL, '[]', 0, '2019-01-17 06:13:39', '2019-01-17 06:13:39', '2019-01-18 11:43:39'),
('546e7335e32451e245ff3028d4a0830932473472bad006a2c992e67e72a1d78338b1ee686caa425f', 1, 1, 'LaraPassport', '[]', 0, '2019-01-17 06:36:31', '2019-01-17 06:36:31', '2020-01-17 12:06:31'),
('54f1ad95791af61ce3ad1ec422c0fcf4c39a07bdd59c632cb859d8dd73ec714df2fbefb3f329605b', 2, 1, 'API SpainOptions', '[]', 0, '2019-01-17 08:18:45', '2019-01-17 08:18:45', '2020-01-17 13:48:45'),
('5514e8a351f6454fb3252b82073f1f017b1e10987fcd1d7dc20fba4bca7b5cf837cea51908be1140', 6, 1, 'API SpainOptions', '[]', 0, '2019-01-29 09:56:22', '2019-01-29 09:56:22', '2020-01-29 15:26:22'),
('57fcfda4903f4c4168b2b62a6970cb34007db4a5ff7b98caf2a37b95ae6245a364734f45312e9df2', 5, 2, NULL, '[]', 1, '2018-12-29 06:16:46', '2018-12-29 06:16:46', '2019-12-29 11:46:46'),
('5849e258c2ae93901b5e49159aab5ef16890594f0f1719c91cceaa094aaf1e3fb72853e715a84dfc', 9, 2, NULL, '[]', 0, '2018-12-28 06:55:49', '2018-12-28 06:55:49', '2019-12-28 12:25:49'),
('5a27a014732b9e2558461b9b60cf504f4722a5077e90820b3b09ba23d7a0ba0228b31265de6e44d3', 1, 1, 'API Access', '[]', 0, '2019-01-17 06:56:08', '2019-01-17 06:56:08', '2020-01-17 12:26:08'),
('5c576751cb4dce655bb35ad6dd03b0c3d97873675ef441308de6511deaaaf22b079569c9ac96aeb4', 1, 2, NULL, '[]', 0, '2019-01-17 07:43:20', '2019-01-17 07:43:20', '2020-01-17 13:13:20'),
('5c7c7b5c755aa6606c775193b861eea445a15f2f5f9477557abed80da394a58075105beaad0d3888', 2, 2, NULL, '[]', 0, '2019-01-04 11:40:08', '2019-01-04 11:40:08', '2020-01-04 17:10:08'),
('5cd866bda530eb61828ca0c5d5ef397778ee4c8e56cb0f9aae2eacc13933fd388efc3af898d11b3c', 1, 1, 'API Access', '[]', 0, '2019-01-17 06:49:33', '2019-01-17 06:49:33', '2020-01-17 12:19:33'),
('5cfe107c65e1fabd38fa829da8ee8f1f773f6ff93ba0e2b3179039a711fe55c08bea003aa4483d70', 2, 1, 'API SpainOptions', '[]', 0, '2019-01-24 07:33:17', '2019-01-24 07:33:17', '2020-01-24 13:03:17'),
('5d9b3ac27077c0494551d811fa1b8b420b1f53608375a59d91e7a68537f737d1d1a189f42f496b00', 6, 2, NULL, '[]', 0, '2018-12-31 08:07:18', '2018-12-31 08:07:18', '2019-12-31 13:37:18'),
('61b452ef6117798ddabf3eb502479766ba747972dcc64ab8276a57ccfd683736691bdb3c2a13de56', 6, 2, NULL, '[]', 0, '2019-01-11 06:20:24', '2019-01-11 06:20:24', '2020-01-11 11:50:24'),
('62ba8ae628c84c6936e78bd15b23ef88be0bd6db27d63007baf9f83f088f7ed4f0f2617bb1dd0cec', 1, 1, 'LaraPassport', '[]', 0, '2019-01-17 06:42:28', '2019-01-17 06:42:28', '2020-01-17 12:12:28'),
('63e93c07ffcb3c54f848fe66a65b88e3df9f2ecfe1b45fb0e2cbb08b4cbfec5bf5afc56e143f9183', 1, 1, 'LaraPassport', '[]', 0, '2019-01-17 06:37:50', '2019-01-17 06:37:50', '2020-01-17 12:07:50'),
('6548d9a80d6030df4f48f849977878d23516a64038152ad749bacd77c80626cfb503c12ca117025b', 1, 2, NULL, '[]', 0, '2019-01-17 07:40:59', '2019-01-17 07:40:59', '2020-01-17 13:10:59'),
('68c1bfae7868c5bfed4aea81a02162c2006ba4934afdea8110f0d328f8f19e2c87348f8b9c241cac', 2, 1, 'API Access', '[]', 0, '2019-01-17 07:27:19', '2019-01-17 07:27:19', '2020-01-17 12:57:19'),
('6a691dcfacb8148aa330b94491bf4dbb6d5da5982319db084b2f26dc0936a9bd1860256cdbe269de', 1, 1, 'LaraPassport', '[]', 0, '2019-01-17 06:42:21', '2019-01-17 06:42:21', '2020-01-17 12:12:21'),
('6aa7a673f901082eec25badc901244a8c2ae839c22784329e7a4fdf0f23a1de1ca5a6726873434e4', 6, 2, NULL, '[]', 0, '2019-01-14 05:10:12', '2019-01-14 05:10:12', '2020-01-14 10:40:12'),
('6ab60c925340eaa38ff0227f130bcef51dcb0aefa153c0325b375598f2fac30b666015824ee4659c', 2, 1, 'API SpainOptions', '[]', 0, '2019-01-17 08:19:25', '2019-01-17 08:19:25', '2020-01-17 13:49:25'),
('6eb51dd48d6f9a97f6caf51006c9aed1e97e5104fb2d7b2ffa7dc776751d4dbfbd09b34b7665f3fc', 2, 1, 'API SpainOptions', '[]', 1, '2019-01-29 16:51:24', '2019-01-29 16:51:24', '2020-01-29 22:21:24'),
('6edd3c953bace6f9a15aef2f133c17887cf26e17e60c85796a401fc423cc76c9bb5de619a9dedf4f', 2, 1, 'API SpainOptions', '[]', 1, '2019-01-30 12:38:46', '2019-01-30 12:38:46', '2020-01-30 18:08:46'),
('7031134a69e1c6ec12c126dff9ad28dad8c6d534ddf478df3f7dddc1028cf30e3a2eecad45a41dd2', 1, 1, 'API SpainOptions', '[]', 0, '2019-01-24 07:42:35', '2019-01-24 07:42:35', '2020-01-24 13:12:35'),
('71dc72496041e75b6ad5930522ce8a8853542739cedf372ae52c33b1641d414338a1b80034fadfdc', 2, 1, 'API SpainOptions', '[]', 0, '2019-01-17 08:19:05', '2019-01-17 08:19:05', '2020-01-17 13:49:05'),
('72cc7050db4d65b2752abcc536a1b29bfe5163ba3466d7f1f6e48aab77e25431557b53096d2383f0', 2, 1, 'API SpainOptions', '[]', 1, '2019-01-29 16:50:50', '2019-01-29 16:50:50', '2020-01-29 22:20:50'),
('7492fbd37b478cb616f3fec013f1b5911b0c7f2cb503591bfa8db1c25da1c7645d58ffe3977b1f38', 2, 1, 'API SpainOptions', '[]', 1, '2019-01-30 12:36:14', '2019-01-30 12:36:14', '2020-01-30 18:06:14'),
('756f428227839f84811b999c6e3a37ba1c0559a0dfd5ed489219ce64d166ddcd462ad080453ffa28', 8, 2, NULL, '[]', 1, '2019-01-02 07:26:38', '2019-01-02 07:26:38', '2020-01-02 12:56:38'),
('77993ea6b38a5147660438048c0177e8e9773d8fc5efe82b7de21226931f43521afcab9628448a4e', 2, 1, 'API Access', '[]', 0, '2019-01-17 07:35:15', '2019-01-17 07:35:15', '2020-01-17 13:05:15'),
('79c1dcac0830e7ebc0d06ff3126084fe7227d19d2efb8e0bb56fa3b21ef609fc636df9cfae863000', 9, 2, NULL, '[]', 1, '2019-01-14 06:19:11', '2019-01-14 06:19:11', '2020-01-14 11:49:11'),
('79c4a3e8d33332cfcad79fd63cb827413f637ff62f944c4c38f6321c85ff42f4689ccd11317f98ef', 8, 2, NULL, '[]', 1, '2019-01-04 10:50:28', '2019-01-04 10:50:28', '2020-01-04 16:20:28'),
('7bbfdf0ce2e1fca69b9324b09ef38e6dc5a9e9609ef3409bb66ed90ff9e1c29082635d5cdf28e06d', 1, 2, NULL, '[]', 1, '2019-01-07 11:35:29', '2019-01-07 11:35:29', '2020-01-07 17:05:29'),
('7cd17f4f82869554387ea68b67879e9db00d465fb58bebde6423fff7fbeafadfe251e37c3de76faa', 1, 1, 'API Access', '[]', 0, '2019-01-17 06:48:22', '2019-01-17 06:48:22', '2020-01-17 12:18:22'),
('7e2b928695a584558e1872786c7f4205eeb2f578d09fcd980b5c9e1dd2fbce60795ba9b1d6ea50a8', 2, 1, 'API SpainOptions', '[]', 0, '2019-01-17 07:45:00', '2019-01-17 07:45:00', '2020-01-17 13:15:00'),
('7e5e9f55a1f151954ad13e5fc880e41cce0c9b09b6d0c59c352558c475b8b8e485b24eb2700bb223', 3, 2, NULL, '[]', 0, '2019-01-10 11:21:05', '2019-01-10 11:21:05', '2020-01-10 16:51:05'),
('7ef9cc816a227fe5babbe3a744da9fc87f1be7ddc506f1c3712d28d45051bb442bc413666f7acefb', 2, 1, 'API Access', '[]', 0, '2019-01-17 07:04:35', '2019-01-17 07:04:35', '2020-01-17 12:34:35'),
('80e634a1ea6be6b6872d21ce027255511fa844b3b5ff823d0226454af34d414efe815b6e2f318b75', 1, 1, 'API Access', '[]', 0, '2019-01-17 06:48:38', '2019-01-17 06:48:38', '2020-01-17 12:18:38'),
('826095658db465fcd55f019c50480a7cd979ce1ce5c68c7a14e98513a86d075e915b42504fc20787', 10, 2, NULL, '[]', 1, '2019-01-07 03:16:37', '2019-01-07 03:16:37', '2020-01-07 08:46:37'),
('8263c90519c2b1a844a7d5eaf0cc8546f3c6999d6d1c93397e4c61f653dca1bb8cfe6554be68a7e8', 2, 2, NULL, '[]', 1, '2019-01-07 03:07:08', '2019-01-07 03:07:08', '2020-01-07 08:37:08'),
('830193283b9a4eae99f76672dfbf67b4d33cf24b89e57fecf3d9f46c3d6ad724d907fe9127438c3c', 7, 2, NULL, '[]', 1, '2018-12-31 08:19:15', '2018-12-31 08:19:15', '2019-12-31 13:49:15'),
('843c872e872c1f5565dae0263f74c8406d71da9d06323c9365bb589d6b2f1c002e0d7e1239792412', 2, 1, 'API SpainOptions', '[]', 0, '2019-01-31 10:30:26', '2019-01-31 10:30:26', '2020-01-31 16:00:26'),
('87da6a7bcf556bb0cc849fb604df2230882e17309f07e303ba3c32fef9068b9eec17d430a3692e0e', 2, 2, NULL, '[]', 1, '2019-01-07 03:18:07', '2019-01-07 03:18:07', '2020-01-07 08:48:07'),
('88163ac4295c792a1cb9bc9eeaf5893ce93194d5da084e4e6ec2b59f63459f4180040cd632b041ce', 1, 2, NULL, '[]', 0, '2019-01-18 04:30:32', '2019-01-18 04:30:32', '2020-01-18 10:00:32'),
('885d40f045248910de3b0314f42cc3d757f63714542f2fccbf9a8c766c162c085dcb092548231aa7', 2, 1, 'API Access', '[]', 0, '2019-01-17 07:31:53', '2019-01-17 07:31:53', '2020-01-17 13:01:53'),
('8923f2533a30a1e9bfe35c99f935c84e130afdfe8cc54e00455feb0d6482a80e9b9f8eba4c6f38e7', 2, 2, NULL, '[]', 0, '2018-12-28 09:19:52', '2018-12-28 09:19:52', '2019-12-28 14:49:52'),
('89783b907e52cd23edd423a18dd9fc6819f3b27cfb02aa82c1206ae7a41cbe7bf591933f09c498b0', 2, 1, 'API SpainOptions', '[]', 0, '2019-01-17 08:18:50', '2019-01-17 08:18:50', '2020-01-17 13:48:50'),
('89b10742e850d0fc6b7da1f58b296757e54e05442762cfed604552f4d0831a24b4f5f45206288c11', 3, 2, NULL, '[]', 1, '2019-01-10 12:40:46', '2019-01-10 12:40:46', '2020-01-10 18:10:46'),
('8ab6f169e5af04df794a768dad516f62475d597ebd20db5a28c231b9d65d7e28095c1fb94d17c6b5', 2, 2, NULL, '[]', 0, '2019-01-07 03:17:54', '2019-01-07 03:17:54', '2020-01-07 08:47:54'),
('8f532291abeb2379758345069447a3ff41c142269f585ac5f332e237b7423b0606a179d02df7e8ef', 8, 2, NULL, '[]', 0, '2019-01-02 05:05:09', '2019-01-02 05:05:09', '2020-01-02 10:35:09'),
('9344a1f46c2df13d9f8f1f77fd8f35dea7ede294cdc8d6ee3b88e563445551ca311d79a1145fb585', 1, 1, 'LaraPassport', '[]', 0, '2019-01-17 06:38:33', '2019-01-17 06:38:33', '2020-01-17 12:08:33'),
('93ec668c2fd5681bb56e791fa952e98eff0814ecf2f0eea4700e802936169bdc0f2245174a37cee3', 3, 2, NULL, '[]', 1, '2018-12-29 09:43:44', '2018-12-29 09:43:44', '2019-12-29 15:13:44'),
('9446845177014ffd3e580fd9103184f5b286e643915ca44b144653488edf43672a186f086c308fb9', 9, 2, NULL, '[]', 1, '2018-12-31 08:35:58', '2018-12-31 08:35:58', '2019-12-31 14:05:58'),
('96db6d6d160832a664a30f1ba30f8af05e9fe61e82d67632d78eabb97dca1b72874c35d2553525e1', 2, 1, 'API SpainOptions', '[]', 0, '2019-01-17 08:15:09', '2019-01-17 08:15:09', '2020-01-17 13:45:09'),
('97031933fe643b580b5e9350384380d20c1095162e45d7135d9935b08a081a2ca69488e7e7592b26', 7, 2, NULL, '[]', 1, '2018-12-31 08:17:28', '2018-12-31 08:17:28', '2019-12-31 13:47:28'),
('9b7e1179440e91c215af4e26c5a43a093920910cf850b02ba7637cee0a72bf1b3ae3153582904c10', 2, 1, 'API SpainOptions', '[]', 0, '2019-01-17 08:15:48', '2019-01-17 08:15:48', '2020-01-17 13:45:48'),
('9ca0b4bd3e586571d45d593d971c2985269796a2587144a942f6afcd588bdcd404f0e0a5fb0f0e99', 2, 1, 'API SpainOptions', '[]', 0, '2019-01-29 10:01:59', '2019-01-29 10:01:59', '2020-01-29 15:31:59'),
('9f632c84bdf75f4ef35607d4d72ab5d9db309513cb111c69b52e18ac30155e094e9bdec9a8cb835f', 1, 1, 'API Access', '[]', 0, '2019-01-17 06:56:18', '2019-01-17 06:56:18', '2020-01-17 12:26:18'),
('a0f973cbc41cf57413eb60ccdcc704539b4753c5ed5bd98293a51af59952328408d1e353a4dd9548', 18, 2, NULL, '[]', 0, '2019-02-11 10:34:58', '2019-02-11 10:34:58', '2020-02-11 16:04:58'),
('a25fb9e1b1e8d7a1e3dcc5166efc4744f9ea0ee34c859a73ec69dbae8718eb41df6e68006537c780', 7, 2, NULL, '[]', 0, '2018-12-31 08:20:49', '2018-12-31 08:20:49', '2019-12-31 13:50:49'),
('a26d3c76c4475d7cb035b2ea74e2742e88e5b56af7020832031992f627915d86e2143391922bac6c', 2, 1, 'API Access', '[]', 0, '2019-01-17 07:14:17', '2019-01-17 07:14:17', '2020-01-17 12:44:17'),
('a5d7bcdf003ce536031e4e1a3abfcabd472a962a36a5ba334d6003cd12fa80073b84e1832e81f8c8', 2, 1, 'API Access', '[]', 0, '2019-01-17 07:27:33', '2019-01-17 07:27:33', '2020-01-17 12:57:33'),
('a7261cd66f0537c4aed971566541f20fae8ba32d5b256657bad5b5a0533880ece36d00078c8547ce', 1, 1, 'API Access', '[]', 0, '2019-01-17 06:50:57', '2019-01-17 06:50:57', '2020-01-17 12:20:57'),
('ab293fc5a6890fb0d6144f74a9b3ab9ff769d5850777b8b9c825668bb699f188beb1d543aae41ffe', 7, 2, NULL, '[]', 0, '2018-12-31 08:11:59', '2018-12-31 08:11:59', '2019-12-31 13:41:59'),
('ac0d166f43ef837649fae6d37d22a058ae43416e49405f3e50e91c9261ac58549cfa587987de081b', 1, 2, NULL, '[]', 0, '2019-01-09 06:10:21', '2019-01-09 06:10:21', '2020-01-09 11:40:21'),
('ac480f44bbc132fbd743ba724ca595bfca421e4a5daa34a2695971f7b23528039283711e891483f6', 5, 2, NULL, '[]', 1, '2018-12-31 04:24:13', '2018-12-31 04:24:13', '2019-12-31 09:54:13'),
('ae2300c6de9754f5d481ee6b8a614e5cc29e0c82be1c0ed3cc5450bba95da5e2c92622f81dac2401', 3, 2, NULL, '[]', 0, '2019-01-16 10:14:23', '2019-01-16 10:14:23', '2020-01-16 15:44:23'),
('b0bdf20293f3d16f064056dd76b6b5400d61f9305c5bd30943d70434fca62f1e8b824964cf9fab88', 3, 2, NULL, '[]', 0, '2019-01-16 08:53:29', '2019-01-16 08:53:29', '2020-01-16 14:23:29'),
('b1c3a20eb87da5f85f9af931d8e558f91a6b6141a92e83ed708c853a08eabb6f8225d4d2114a5e2d', 9, 2, NULL, '[]', 0, '2019-01-04 10:49:07', '2019-01-04 10:49:07', '2020-01-04 16:19:07'),
('b229b491a9eae7adc81e17fb879fd47ca60f83047f533ade01a248ea78f11a0463c5b82722345916', 6, 2, NULL, '[]', 0, '2019-01-11 06:21:09', '2019-01-11 06:21:09', '2020-01-11 11:51:09'),
('b3f836d810685936864247ca656f326d3104c5b87aa1264b3790bf86909a7ab497887cb366aff73a', 2, 2, NULL, '[]', 0, '2018-12-29 03:59:10', '2018-12-29 03:59:10', '2019-12-29 09:29:10'),
('b8c7d79ec2a67eaf0a7fb6a19efa4eeca14b2fa706a9c85e29591e710cf776a342713643e0febdb5', 1, 2, NULL, '[]', 0, '2019-01-17 07:43:34', '2019-01-17 07:43:34', '2020-01-17 13:13:34'),
('bbcfb0508a844a359742ff62381f3357138d0537ad1f92c17e098bfbeca668664ff625b88bb6002e', 3, 2, NULL, '[]', 1, '2018-12-29 06:25:20', '2018-12-29 06:25:20', '2019-12-29 11:55:20'),
('bc51171c7a01b5513a30cb4c8035f1c68de6d9d36fb59fb73452ac5d22e58ae5d00e1cb782d9685e', 1, 2, NULL, '[]', 0, '2019-01-21 10:28:38', '2019-01-21 10:28:38', '2020-01-21 15:58:38'),
('bd3b415788f789ccedd34118e5dc56029737d38ca9a4d77ca90f4a01ffea38892d84cec4251f56c3', 2, 1, 'API Access', '[]', 0, '2019-01-17 07:26:57', '2019-01-17 07:26:57', '2020-01-17 12:56:57'),
('bd9bc1ddcfa0d611f8ebafa1f209c6d34f1de11d93fcac519a9cfb45b11e672a6e000f2298bd8eb3', 2, 1, 'API SpainOptions', '[]', 0, '2019-01-17 07:49:43', '2019-01-17 07:49:43', '2020-01-17 13:19:43'),
('be1976f21f5019ff9d298c07c9796cf63a4936c37aee074533b1db9e5214396ce3d8cabe85ac8da5', 2, 1, 'API SpainOptions', '[]', 0, '2019-01-29 09:51:14', '2019-01-29 09:51:14', '2020-01-29 15:21:14'),
('bfaa2b2cb95e68141ee90f67b28c7f12364b3b6208f403903edc45489fa381be175ae7fdcd75f8ed', 1, 1, 'API Access', '[]', 0, '2019-01-17 06:50:02', '2019-01-17 06:50:02', '2020-01-17 12:20:02'),
('c0b2ab4d549e792591093041ced1ad2d87814a17c45517c433f016853ee3f334957379183c23b0a0', 8, 2, NULL, '[]', 1, '2019-01-04 09:09:48', '2019-01-04 09:09:48', '2020-01-04 14:39:48'),
('c5e5700c9463b139762a592cd7d1907a35c1044e01eb14c215f1c9a467ad47f3027d5d9c9e103792', 8, 2, NULL, '[]', 0, '2019-01-14 04:48:49', '2019-01-14 04:48:49', '2020-01-14 10:18:49'),
('c667939a22a7307561340af13d6686b2ebe6f25b8bd50179d9e443a0cb7152ac57bee97285051d7c', 8, 2, NULL, '[]', 0, '2019-01-11 07:12:57', '2019-01-11 07:12:57', '2020-01-11 12:42:57'),
('c6a13b57734b23ca931960466d886326e33134c4a5f33f041078747e31e848c8162a5c8dcf1c6b11', 1, 2, NULL, '[]', 0, '2019-01-11 10:41:23', '2019-01-11 10:41:23', '2020-01-11 16:11:23'),
('c6f93be1a3c78d52f853cac3d43e3b54191ef10495ca449540ed7f465ab3d5aed8b541b155323afc', 2, 1, 'API SpainOptions', '[]', 1, '2019-01-29 14:25:33', '2019-01-29 14:25:33', '2020-01-29 19:55:33'),
('c79f85cc3830227bf80acb1c0c5c8bf58a69e31c728b75f231ef954f3ef7602ed0d6266087bb898b', 9, 2, NULL, '[]', 0, '2018-12-31 08:32:46', '2018-12-31 08:32:46', '2019-12-31 14:02:46'),
('c82f7aebe8ac9b17b71b6a33938eba7a9f204384b507ced8adfc7976c72cd2c855a32fec5326972e', 5, 2, NULL, '[]', 0, '2018-12-29 05:11:09', '2018-12-29 05:11:09', '2019-12-29 10:41:09'),
('c8e35923bc051d8791259f3c8b3b17e9a1eaf5ab547f28b0370d806c2c55614335a82b65d48662da', 1, 1, 'LaraPassport', '[]', 0, '2019-01-17 06:26:40', '2019-01-17 06:26:40', '2020-01-17 11:56:40'),
('cb2dee09fe9fa0c60950e4735968449031cd28ee38896bd6806b2a0acf766cdd602dfdc75ed109ee', 9, 2, NULL, '[]', 1, '2019-01-07 03:21:07', '2019-01-07 03:21:07', '2020-01-07 08:51:07'),
('cbd3c1741ec6671a895ed34c70141147c53494e8b7aaffb203891c9f09f92ca56a9602d7bdeab926', 1, 2, NULL, '[]', 0, '2019-01-17 07:44:32', '2019-01-17 07:44:32', '2020-01-17 13:14:32'),
('cd6f3ebda410b199f1a74acac2b7beb47c446971ab92d5d143221c8a254d024a6c357ea5c6f54a1c', 1, 1, 'API SpainOptions', '[]', 1, '2019-01-25 17:27:12', '2019-01-25 17:27:12', '2020-01-25 22:57:12'),
('cd7eb5bda0ed1759d2181fc8cdf56fd852593463ee99b5db73509d2a1a8d9e5249f58f5e759974a7', 9, 2, NULL, '[]', 0, '2019-01-14 11:26:13', '2019-01-14 11:26:13', '2020-01-14 16:56:13'),
('cdbf91bd81b426e2a1e5e7f29bfa51e52e54216b93ea9ca349c696b89e8bf7fce9844fa0c0ddc3dc', 3, 2, NULL, '[]', 1, '2018-12-29 06:18:52', '2018-12-29 06:18:52', '2019-12-29 11:48:52'),
('ce354a52c01f8218af471d9bbb1974a7de7ae5f6ffb078888fa528fdf62d6a4dffb8fb80fc568ce1', 1, 1, 'API SpainOptions', '[]', 0, '2019-01-25 17:08:10', '2019-01-25 17:08:10', '2020-01-25 22:38:10'),
('ce72e3f16bf85df5d757b42274a150569604f31f78c86a6948d1ea295388345bf71ab2dbab1ea74a', 2, 2, NULL, '[]', 1, '2019-01-07 08:40:29', '2019-01-07 08:40:29', '2020-01-07 14:10:29'),
('d026d0fcdd11079e6ce1897ffed20caab105b0aaea3a8d904cad679176226aebd98a372c4695958c', 8, 2, NULL, '[]', 1, '2019-01-03 05:57:22', '2019-01-03 05:57:22', '2020-01-03 11:27:22'),
('d65bc4dc56bb813e41d630ff026267f4f62207ade841626b87423c59d43c6e691bfb13b5a5c1c9d3', 1, 1, 'LaraPassport', '[]', 0, '2019-01-17 06:12:40', '2019-01-17 06:12:40', '2020-01-17 11:42:40'),
('d6ea2d781b7131a94c3759bf4729044d3d1d9c69b99f6f3581ec74811f0cef4a8d550a5e28ccab49', 2, 1, 'API SpainOptions', '[]', 0, '2019-01-30 13:44:23', '2019-01-30 13:44:23', '2020-01-30 19:14:23'),
('d76f8f788e43914cdc76c99a05c7f161093ba92cd2fe57405d3e453aae61ae830f2c03105d6a838b', 1, 1, 'API Access', '[]', 0, '2019-01-17 06:55:46', '2019-01-17 06:55:46', '2020-01-17 12:25:46'),
('dcb381f588b1b171e97198ccf92b555a05e3bd99d32e2531aaf26b666eddf27f2e3e1d635dbded12', 1, 1, 'API Access', '[]', 0, '2019-01-17 06:50:14', '2019-01-17 06:50:14', '2020-01-17 12:20:14'),
('df796db51809efc19979b6521c9952013052649a89e5ab22c5b84d9a3b92cef381f0b676feac483c', 2, 2, NULL, '[]', 0, '2019-01-10 09:15:51', '2019-01-10 09:15:51', '2020-01-10 14:45:51'),
('e0efd622779e765bcca955b81020f23369a9b0d5313a0b4788946e0f3a5b33cf3dc436d0f3ec4f1d', 1, 2, NULL, '[]', 0, '2019-01-17 07:44:03', '2019-01-17 07:44:03', '2020-01-17 13:14:03'),
('e35c352578a31fc032e8071d2e601714b4f8a4169e261589b5c2cb24ea56f89d76b978234c843efa', 8, 2, NULL, '[]', 0, '2018-12-31 08:43:21', '2018-12-31 08:43:21', '2019-12-31 14:13:21'),
('e4cf6f8f3eec5f2ec67c161dba0f4fb954be95fdf9ab864218a87676ad404310c588ff3b2227f269', 2, 1, 'API Access', '[]', 0, '2019-01-17 06:57:52', '2019-01-17 06:57:52', '2020-01-17 12:27:52'),
('e6e5a4007b3ab4448b888399126353ce4d10bc080bf97bd3b90f173b0c4aaed49d069adf252ab6b7', 1, 2, NULL, '[]', 0, '2019-01-18 11:40:09', '2019-01-18 11:40:09', '2020-01-18 17:10:09'),
('e73436a92891801af35d165143186ad77315325f2a60ee768a20ab47da91f24bed36c9aa4d83bbd4', 9, 2, NULL, '[]', 1, '2018-12-31 08:41:02', '2018-12-31 08:41:02', '2019-12-31 14:11:02'),
('e7c18209de7fcd2811a6815bdbb31fa9b59ed9d5c09a8494c4817731bb15f4524f3b3b6412da76a6', 3, 2, NULL, '[]', 0, '2018-12-29 06:18:36', '2018-12-29 06:18:36', '2019-12-29 11:48:36'),
('e7c321a42fb79b97c4b2198d148384eabdddc4dc6ee0586dba0e33f4a11ad45e788ed038059efff4', 8, 2, NULL, '[]', 0, '2019-01-11 07:21:00', '2019-01-11 07:21:00', '2020-01-11 12:51:00'),
('e80cf6ffb3e4abd013e7fc7b2ffe880619b17ae393a6273574a432c684fe5443753600a165db1d78', 1, 2, NULL, '[]', 0, '2019-01-11 06:19:06', '2019-01-11 06:19:06', '2020-01-11 11:49:06'),
('e8b1771c1081fdf93e8cf07ea2ca342d346824a37151940f60052d7aa3bcb77eb9dc444b3c123ac1', 9, 2, NULL, '[]', 0, '2019-01-02 05:24:29', '2019-01-02 05:24:29', '2020-01-02 10:54:29'),
('eac992b5e920918751df49d75b230c96cc31b54d685330aa87ac5fc051f9c1562e33fbc23b862185', 10, 2, NULL, '[]', 0, '2018-12-28 07:43:04', '2018-12-28 07:43:04', '2019-12-28 13:13:04'),
('ecbf6194a4df2cfcd02079cd2882fea1e17f55e1b873e69ebff6b2a8d1516540b81918f340b03b46', 1, 1, 'API Access', '[]', 0, '2019-01-17 06:54:27', '2019-01-17 06:54:27', '2020-01-17 12:24:27'),
('f186f5a27549f8ac6c5fe1f5260cc80ead93e7d90e7e4dc0b717e8d8d170de0c667c6f47fb942d85', 2, 1, 'API SpainOptions', '[]', 0, '2019-01-30 11:26:00', '2019-01-30 11:26:00', '2020-01-30 16:56:00'),
('f2f583fb7518d376c3de0f0ac06b5b98bb848babdb1cea7688a3862a6a0b2f2c917b71682f16e857', 2, 2, NULL, '[]', 1, '2019-01-04 09:08:26', '2019-01-04 09:08:26', '2020-01-04 14:38:26'),
('f450e0a0bdde201bfcaf06119a5e1dbb344ac2df1f8fd2c6d0def60dcf4eecc088058b089e65904b', 1, 1, 'API Access', '[]', 0, '2019-01-17 06:47:13', '2019-01-17 06:47:13', '2020-01-17 12:17:13'),
('f63519c00c2c1d5b5818b8e2c3905c8266378091e988015e749734be6b7e3877cb8f68d9ad569a96', 20, 2, NULL, '[]', 0, '2018-12-28 04:52:01', '2018-12-28 04:52:01', '2019-12-28 10:22:01'),
('f65193337c82884318568839ea7343ec69ce675743139b1f7501c18e1d7c7df5301da92f4b58ed45', 2, 2, NULL, '[]', 1, '2018-12-31 05:26:07', '2018-12-31 05:26:07', '2019-12-31 10:56:07'),
('f67e8ff257433448375c8619b4a5c34d70c8d516c820bb03f6948830b890853d13595f1507509a6c', 2, 2, NULL, '[]', 0, '2019-01-04 12:24:28', '2019-01-04 12:24:28', '2020-01-04 17:54:28'),
('f6d610c3a7aca159e050c5a17c67f7958ddbd5f1e7769b0fe01282ec996d568901240a175c172203', 2, 2, NULL, '[]', 0, '2019-01-07 09:08:15', '2019-01-07 09:08:15', '2020-01-07 14:38:15'),
('f79a132f0d596f5097628882e21044c53a4622f39349ef4e69058beae21738c5da059cdc9e63d3db', 2, 1, 'API SpainOptions', '[]', 0, '2019-02-01 10:12:09', '2019-02-01 10:12:09', '2020-02-01 15:42:09'),
('f89f2cdfd316b4cd6f6fce76ea225d23fc8edcc9cd85f4feb724ca487728ad1379c3de7343d776c8', 3, 2, NULL, '[]', 0, '2019-01-11 05:20:37', '2019-01-11 05:20:37', '2020-01-11 10:50:37'),
('f8b6c802759b1fc9b7a78ec296ee5b8d244fe61e5a81bc27698fd6cd2b3abdb829b8a5ba287fcd42', 5, 2, NULL, '[]', 1, '2018-12-29 04:14:21', '2018-12-29 04:14:21', '2019-12-29 09:44:21'),
('f9aa68d1216953fe7c31f1a188d2919d721b0fa41cd5bed2573a0265b3092b2b771018596bb4dcbb', 1, 1, 'API SpainOptions', '[]', 0, '2019-01-18 11:40:39', '2019-01-18 11:40:39', '2020-01-18 17:10:39'),
('fd38b823e9269584afd62180f44fc46a6e7eabb2946a73cd1b409a8addac436015c9fce4f043d279', 1, 1, 'LaraPassport', '[]', 0, '2019-01-17 06:32:00', '2019-01-17 06:32:00', '2020-01-17 12:02:00'),
('fea02de7160cac60c23c353dfe26eb3e4446c520e41f723520df67a0bdedda02020c76479615346b', 2, 1, 'API Access', '[]', 0, '2019-01-17 07:27:33', '2019-01-17 07:27:33', '2020-01-17 12:57:33'),
('ff81c6a6f701cfa12c42a02dca52397a011c2fda3a0df1b519aaa1c6de0fe315afcdc8cd86b980dc', 2, 2, NULL, '[]', 1, '2019-01-07 03:21:49', '2019-01-07 03:21:49', '2020-01-07 08:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '3aO46XLUFJIzoN5AXtOOffcVwVLH6scvEAmOn069', 'http://localhost', 1, 0, 0, '2018-12-25 06:58:10', '2018-12-25 06:58:10'),
(2, NULL, 'Laravel Password Grant Client', 'EnKPIVgE3hIu6DCNWUgTIO8f4JxHoS5eirnXewBl', 'http://localhost', 0, 1, 0, '2018-12-25 06:58:11', '2018-12-25 06:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-12-25 06:58:11', '2018-12-25 06:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('002cee3f158c1e0d45bc0b59c7edc498130e4de5a18ae7e329a9d9b8fdd4214017ff76f04e64ad7d', 'eac992b5e920918751df49d75b230c96cc31b54d685330aa87ac5fc051f9c1562e33fbc23b862185', 0, '2019-12-28 13:13:04'),
('01c72bf077ee9de9dbea08dea360fd7aaceffddffb31ec3ac4323a99b06307df9029ff7aa03bdf2f', '0a32682849687dc5d6c6d8ea9d918e93550d8fe5e5f59c6777d320448c835747c621a019fcace535', 0, '2020-01-07 12:50:45'),
('05977f5ed134445c0e56f6211f1f1b4c0004c67e75524c7680318f803eb0ccf431c3af5996b4f756', '9446845177014ffd3e580fd9103184f5b286e643915ca44b144653488edf43672a186f086c308fb9', 0, '2019-12-31 14:05:58'),
('0e2073629b19567c745b158a4d35f8657724b9d38682e76b04924654015e2360a3640644e3260ddd', '5849e258c2ae93901b5e49159aab5ef16890594f0f1719c91cceaa094aaf1e3fb72853e715a84dfc', 0, '2019-12-28 12:25:49'),
('107366cf4f34fd5b761150da54fb355a2ced203b0c359dad009dd01aa455bed344751ddaa8fbb174', 'b1c3a20eb87da5f85f9af931d8e558f91a6b6141a92e83ed708c853a08eabb6f8225d4d2114a5e2d', 0, '2020-01-04 16:19:07'),
('108f77eb62102900bc55ba312819cc5fa9f24429a4a6c9a82c08125796ae274bee7aff910686a3ba', '52cba2a514f81c01522288d80fb8f4f500fbd9307aff035e139bd6f32b17f1576a112993ae288831', 0, '2019-12-29 09:31:38'),
('154ccbe9472ce0b263bf163056b955c0af41465728c4839ba1f997b108cf0570c80284e0ca0b321c', 'a25fb9e1b1e8d7a1e3dcc5166efc4744f9ea0ee34c859a73ec69dbae8718eb41df6e68006537c780', 0, '2019-12-31 13:50:49'),
('1a2c94a5698b5ae134410d52d9814b21e1aad1ca85a05883bc949ccd1b3056dfb8f6e1afc45266ee', 'e80cf6ffb3e4abd013e7fc7b2ffe880619b17ae393a6273574a432c684fe5443753600a165db1d78', 0, '2020-01-11 11:49:06'),
('1ac587940a93485d20f663674bb55cb1cf5f79b95f0d6ca97029add4dc1486d6cb9977b3e9b7c998', '57fcfda4903f4c4168b2b62a6970cb34007db4a5ff7b98caf2a37b95ae6245a364734f45312e9df2', 0, '2019-12-29 11:46:46'),
('1d55573dfed10ade7393d5a24dffceeee048f2a880235964e5718370758dd4171d765748cf70b6b0', '7e5e9f55a1f151954ad13e5fc880e41cce0c9b09b6d0c59c352558c475b8b8e485b24eb2700bb223', 0, '2020-01-10 16:51:05'),
('1d873bfc12fa461cddb034cf8a4773016cd5bb3a3df461bf0bc36064553d5dc5ff809b514df5b488', 'e6e5a4007b3ab4448b888399126353ce4d10bc080bf97bd3b90f173b0c4aaed49d069adf252ab6b7', 0, '2020-01-18 17:10:09'),
('1e08bdbbc404abc03c4188bac5818905f5b2ade37b7b5be8c4467a78f75fb559b6af50d02425050b', 'ae2300c6de9754f5d481ee6b8a614e5cc29e0c82be1c0ed3cc5450bba95da5e2c92622f81dac2401', 0, '2020-01-16 15:44:23'),
('2e479f55f1d5b34717e7c5628e076b684e163c5ec63462d76fc8dac8218cf421aa11f2c06f824428', 'cb2dee09fe9fa0c60950e4735968449031cd28ee38896bd6806b2a0acf766cdd602dfdc75ed109ee', 0, '2020-01-07 08:51:07'),
('2fb712519a79f7b58f56172686270a4d77180a09fc680099e171803b234e50dece26b78d2bda7916', 'c79f85cc3830227bf80acb1c0c5c8bf58a69e31c728b75f231ef954f3ef7602ed0d6266087bb898b', 0, '2019-12-31 14:02:46'),
('3581135383d6934163fc43879cdc3a3b5d5a7d1c46a42774e03bac8e76c5cb6c70d99a4f6979be8f', '8ab6f169e5af04df794a768dad516f62475d597ebd20db5a28c231b9d65d7e28095c1fb94d17c6b5', 0, '2020-01-07 08:47:55'),
('35f15f1d21b7f29977f007d0b68c92e7d7922559c01c3a30ac08839e6935be17defcfaa9cf3e3ec2', '090ee2639add99410b834107d2e20592634618206e878f8f46fad267bffb5d5addea97a68ee36167', 0, '2020-01-11 11:44:56'),
('37c15b89f756c77ba0b5d4bb1dcadbc7620f3372ca537fbcd948630565f7027bfcbb88773b10d4f2', 'bbcfb0508a844a359742ff62381f3357138d0537ad1f92c17e098bfbeca668664ff625b88bb6002e', 0, '2019-12-29 11:55:20'),
('3a91fac5b38dfb2a418cfb57a74038122f0d64fafa352fe089a751849d2cb1e95e0ba8a48a39cab7', 'f65193337c82884318568839ea7343ec69ce675743139b1f7501c18e1d7c7df5301da92f4b58ed45', 0, '2019-12-31 10:56:07'),
('3ac9d31aac05f82cc2a3d7aed3e90b597c642e8098bb559416fc056a37f0faff4a12b0dd4136cd9f', 'c0b2ab4d549e792591093041ced1ad2d87814a17c45517c433f016853ee3f334957379183c23b0a0', 0, '2020-01-04 14:39:48'),
('3caa4f11303a96488b74f463791a681ac6a7caa3d3a9bb8df3ac5d6b0e629d3da9de0c0348a562f2', '6548d9a80d6030df4f48f849977878d23516a64038152ad749bacd77c80626cfb503c12ca117025b', 0, '2020-01-17 13:10:59'),
('3f628d7e8ce031ad9a129f613f9842357efd892a2dc8531c167b4ab13b5568069917629f564fb79c', 'f8b6c802759b1fc9b7a78ec296ee5b8d244fe61e5a81bc27698fd6cd2b3abdb829b8a5ba287fcd42', 0, '2019-12-29 09:44:22'),
('40a3a5dee3427bd2e00b06564be49a42cc96f6d2fbc88d201adc24bf70c927272770742d409cd798', 'f6d610c3a7aca159e050c5a17c67f7958ddbd5f1e7769b0fe01282ec996d568901240a175c172203', 0, '2020-01-07 14:38:15'),
('4133c8640935c0271fda241c973a978f7f222e85e68e436a449a0d1a51c4b99fe88d5cb4eba7fe8c', '071714b7189aa1386e13d8a8ec2561eb7453be985b5d55f72fdc3311d9620da2afb19add591b3dfa', 0, '2020-01-16 16:04:41'),
('447f75a00f12dce522a4c49d7269eb305ab4b66fa52d54a289a2f7e21ac82dad5b46fa4645ea118a', '23b80f5dfa020e29c3aaa2b4cc7e03826a07b369f37e7f4b73d7f1e2f2afcb6d55ed8548a433ce42', 0, '2020-01-17 09:38:19'),
('46ee5683f7b671adf25635633d0c723e90d4ea61e7acc6d08f023229b43c600f6a87d98d0e7b59dd', 'bc51171c7a01b5513a30cb4c8035f1c68de6d9d36fb59fb73452ac5d22e58ae5d00e1cb782d9685e', 0, '2020-01-21 15:58:38'),
('4986e11792e618ca249a168ba885428a9d7e9a3cb7d1718b2123c1785dcb8ebdc4621769bec4cb7b', '4e9a5d9c57fc498294cbaf7de028c5dbb0c84446aac4c104b547668577f3932c5daadfa3422f3421', 0, '2020-01-04 18:56:09'),
('4a0206ce2a4f8eeafc1bc5a0e797dbd931ce8f4af0b1f89fa9bbcbc6e7e42a2b5a3f66d3f7058989', 'e8b1771c1081fdf93e8cf07ea2ca342d346824a37151940f60052d7aa3bcb77eb9dc444b3c123ac1', 0, '2020-01-02 10:54:29'),
('4a51a02d0085dc9f85fc9d3d2f7b6801e511fa9901311c14f6449b78a042ec9ddecd5808825bdeb0', '7bbfdf0ce2e1fca69b9324b09ef38e6dc5a9e9609ef3409bb66ed90ff9e1c29082635d5cdf28e06d', 0, '2020-01-07 17:05:29'),
('54a6cc68e6343b972813093a51c9ed2c3f6a643e7dd2e641a820b8a005d871884d6b59ea05b20f3f', '8f532291abeb2379758345069447a3ff41c142269f585ac5f332e237b7423b0606a179d02df7e8ef', 0, '2020-01-02 10:35:10'),
('54d0231c1e5888f6737804f9111e25b1d33d4fd0d57e281985390f7384afb857b8bf9d5175b75f4e', 'b3f836d810685936864247ca656f326d3104c5b87aa1264b3790bf86909a7ab497887cb366aff73a', 0, '2019-12-29 09:29:10'),
('55fe6ac70166ba3de9a3924356c89b43eb9a0003cdaf9c9de30daf643e9f01f71d9b0eebe45736f1', 'e7c321a42fb79b97c4b2198d148384eabdddc4dc6ee0586dba0e33f4a11ad45e788ed038059efff4', 0, '2020-01-11 12:51:00'),
('57224ac1de0f25c568fc8fdd218cd32b11369c19877b42ebe665e586de18f2ff4e8d62f6f97d52ca', '2687762487a907c8e22ed9df871bbc8a85b08ba1c2e87a67ad7cd118040dea9db6d81b7afd936beb', 0, '2020-01-10 14:18:24'),
('5a3d040e3ef1fba56031845481ac821615d67f699207124d1e6c8f989628eb617b3db05819f323ee', '6aa7a673f901082eec25badc901244a8c2ae839c22784329e7a4fdf0f23a1de1ca5a6726873434e4', 0, '2020-01-14 10:40:12'),
('5a9c029dddb08beeaf83d1267ed9880624c6b749f90cdedc543a590b126d43a38f7135ec8fdf9e02', 'df796db51809efc19979b6521c9952013052649a89e5ab22c5b84d9a3b92cef381f0b676feac483c', 0, '2020-01-10 14:45:51'),
('66a10a7416cb77deaf585ffa3c55dafe40ddc4a8c19f7c4ed9ca138a02a9591c75af2409df63586d', '3ce6c09b3b320a32102147a8027c6c833126ac0ec4a96b34cabdfa0793d94823959c0503ec7dad7f', 0, '2020-01-11 10:30:31'),
('6826f3477f4cdbbbc4f7a45d7c4fcd30f68f11495b6378bd5bc5885ba0494b30813c493f3a0a2063', 'f63519c00c2c1d5b5818b8e2c3905c8266378091e988015e749734be6b7e3877cb8f68d9ad569a96', 0, '2019-12-28 10:22:01'),
('6c0547d2de4a42c99cbfef13866fde828df2eaeea7748c9370520bdc8a502ae181cd5cfe217f76ae', '79c4a3e8d33332cfcad79fd63cb827413f637ff62f944c4c38f6321c85ff42f4689ccd11317f98ef', 0, '2020-01-04 16:20:28'),
('6f0d9566fffff20ce89f652448059b99c9b1c147e9835a5614ab738b9319f568a275a7c72f6176b3', '53d81de5cd50178ea4f372aa4fd8e6a515299b6b93e2d283dd93bfa4b7a38d3ddfb7dbb639ce4ac9', 0, '2020-01-17 11:43:40'),
('75db920fa75dbd90487ece0f2a0f32cda4aff3258fb44853a9b99ba23d75bcf984b9575e0f61862d', '28c7808d0de565bc1ebb873a6b86b86002f5ec33570c41b0b72cb3f129c0694914661ddb050d015e', 0, '2019-12-31 13:52:16'),
('77ce108bc36ffd56da6a1b4a3dd5924dc94f2825b0af6dca91f07f962ce3d43c352aff3e4c70d6ce', 'b229b491a9eae7adc81e17fb879fd47ca60f83047f533ade01a248ea78f11a0463c5b82722345916', 0, '2020-01-11 11:51:09'),
('79bdfa3632f3da81dd6d9d3b02b4397d9788bb68f07517d6c8a3c39cc94a293c7566c3538e024443', '4899e67d54d4d2fb7d41698ee4ab1add1b7d6815313889563de0e6cff3ce64f1583f4a0a55ff6e94', 0, '2019-12-31 13:51:08'),
('7e9d58177d4b676e5d159598d6714a85c8e39c5a8e0a7b599cae654696b031fa2f59734609fe64e2', 'b8c7d79ec2a67eaf0a7fb6a19efa4eeca14b2fa706a9c85e29591e710cf776a342713643e0febdb5', 0, '2020-01-17 13:13:34'),
('81f7350d1fd2c165caafcb2fd42d504c1641870645ab36231ab69f2c8f632867835604b913405075', '8263c90519c2b1a844a7d5eaf0cc8546f3c6999d6d1c93397e4c61f653dca1bb8cfe6554be68a7e8', 0, '2020-01-07 08:37:08'),
('825d25ea9da87ea417dbcf00263894c4dc4ef06dd507a17394c1fdf4148f04af7265eed3d7886556', '33197192d234d065ac06f9c280e5ad6d799cda290d2b7fced2b834addd7ff46ccb5998d1f16230e5', 0, '2020-01-10 16:20:52'),
('8387686a9322efbb7de80e6d2bcc07a686e746aa4a8ae9b3090e699d2762e8fd568a403d1a4a454d', 'e73436a92891801af35d165143186ad77315325f2a60ee768a20ab47da91f24bed36c9aa4d83bbd4', 0, '2019-12-31 14:11:02'),
('8648ec1127259a5ca9468df9d10f360e73fec95dabd982e38c92c7ca2599f7ae6381329d89ca9f6f', 'e35c352578a31fc032e8071d2e601714b4f8a4169e261589b5c2cb24ea56f89d76b978234c843efa', 0, '2019-12-31 14:13:21'),
('86e86dfd4d81dc1d1e11fc45903b24d94b6e9008fb898827680a385547b2fce1b6eaba2f50dfbd45', 'e0efd622779e765bcca955b81020f23369a9b0d5313a0b4788946e0f3a5b33cf3dc436d0f3ec4f1d', 0, '2020-01-17 13:14:03'),
('87cc4c5c916a04cea7f20a831546fc2fb590c49239b86786fd3e1c8781ba25a2881b665a84eb36e0', '24c9e239e77bfcc075238572181103284f0d0ae156d41c58697b81ee22ad7656eb744796bff251ec', 0, '2019-12-27 16:36:59'),
('924101ffa74b70a168692cd52e430e18492e6d3c4fdcd7196b7553c5c61e4ff0d8dae0df5c8e395d', 'a0f973cbc41cf57413eb60ccdcc704539b4753c5ed5bd98293a51af59952328408d1e353a4dd9548', 0, '2020-02-11 16:04:58'),
('94b5fad8e05eddf847c8227388b52a569f750f34fa818cf09214fcaebbbca469cfa9bae3bf4e0bcc', 'ac0d166f43ef837649fae6d37d22a058ae43416e49405f3e50e91c9261ac58549cfa587987de081b', 0, '2020-01-09 11:40:21'),
('95c8dcd6f7243c54efa2df825e032606c320526978918ef4d9ce78cc6aca4c7c59e6fc894616c2da', 'c5e5700c9463b139762a592cd7d1907a35c1044e01eb14c215f1c9a467ad47f3027d5d9c9e103792', 0, '2020-01-14 10:18:49'),
('9663b5d4906b423e0bc57ca1fce24891112bfbe9b1c458205a691c947bbae4ab7dd53d860b622f76', 'ce72e3f16bf85df5d757b42274a150569604f31f78c86a6948d1ea295388345bf71ab2dbab1ea74a', 0, '2020-01-07 14:10:29'),
('977d6ea07fef45240fe94993bd5a85e57117efa25417b10e8a98a5dfbd0d118fbc8d1f50cd932924', 'c6a13b57734b23ca931960466d886326e33134c4a5f33f041078747e31e848c8162a5c8dcf1c6b11', 0, '2020-01-11 16:11:24'),
('984466e1807a7f438c827353f051185aeba64e9e8d5eaceaf0b272164de8624cc8bef33b85c94f22', '93ec668c2fd5681bb56e791fa952e98eff0814ecf2f0eea4700e802936169bdc0f2245174a37cee3', 0, '2019-12-29 15:13:44'),
('996c0a100c0610e5c7831e089adbae0a19f438dc7fecea7c7d3010b74d281cfe184ab6714cbeef01', '0bd5339c91cd2f30e27771ee441ab329775b3a8aa072efbb773f5c1b479a8d0fbaef394090289287', 0, '2020-01-17 09:43:53'),
('9c325d5dfeda140c75107c3f8484fbcfe4c155c80a079dce925cad332ac9d3765c58b091dbbfc7ca', '3f85e02eefee0215ca2c8c07347e414b09a2952d454574703c227a87d87bd25def7051d948ed41a8', 0, '2019-12-29 11:57:22'),
('9cce759f41d2e88a718c3e537a7baadebe079a24af53c92a8f499388c35638415754b486e050cdad', 'e7c18209de7fcd2811a6815bdbb31fa9b59ed9d5c09a8494c4817731bb15f4524f3b3b6412da76a6', 0, '2019-12-29 11:48:36'),
('a1f795a07f8dc415d8e35df8c0fa27dd79fea1990a99967df73aefff848eb8fe88189ade9eeac0dc', '4623dfd2db27f7856511b0f8ed0fba897717b2519fce0a8ddb66e81aa398f52d060f7ec9d3da9382', 0, '2020-01-02 09:12:25'),
('a551f26f98f0c4ce9bc8b5de23d3fb200d79482ce11abec131326275c3d1020b038e85de5778a9fe', '205a393becefd0bdae29874852c54545eee2468f8a1d70bee1f76072c15dd3dfc2ba3254323cb7d8', 0, '2020-01-11 12:01:46'),
('ab745885e13da1bc1698d38a13be970955a37239d1cacca8b38e57282454a639a79ab20eed431f16', '04254ba3e4be5d542e80e60327dac2c0577587257f6d9be03c427d3acafa1db3bf4837b171a1be51', 0, '2020-01-14 10:54:25'),
('adea6bb39857c5c6d34ee9e642d56e2a6ea30af11609c7bdf0fb81251cb0c5db80f626edccb8853b', 'f2f583fb7518d376c3de0f0ac06b5b98bb848babdb1cea7688a3862a6a0b2f2c917b71682f16e857', 0, '2020-01-04 14:38:26'),
('b0b2e8c1642ac7b7b5f7559c1f42e36687b8e4baa4b7284f3430d6cff5c09638a06cd74193030b9f', '1110f0031f27490089fea6695f52703ea5f58ffbe9d3235e0f6a07f7ed83a81083127d4451ea4c14', 0, '2019-12-31 08:57:01'),
('b1a59848e1e59fdcc7c853e66bb71f7e7dd15ccfda8e6c5f5e3e36d4e71d626fa9bfc8c69804231e', 'c82f7aebe8ac9b17b71b6a33938eba7a9f204384b507ced8adfc7976c72cd2c855a32fec5326972e', 0, '2019-12-29 10:41:09'),
('b7a39acc34ed8c94397ff8cb235b4942d168cc945ef225a758bf1c36abe749ea48807c90a59bbc22', '826095658db465fcd55f019c50480a7cd979ce1ce5c68c7a14e98513a86d075e915b42504fc20787', 0, '2020-01-07 08:46:38'),
('b8b429bdc262b676be96b4ffc36961dac11315141e5d65ca95cf3997b4c63825c77caae95700d0de', 'ab293fc5a6890fb0d6144f74a9b3ab9ff769d5850777b8b9c825668bb699f188beb1d543aae41ffe', 0, '2019-12-31 13:41:59'),
('bacf8167ab4a8e68ecb22c59f1b6a18c2a3edd1f5de839c3cc7551a43cda084c58e3bfd8cf25d815', '5d9b3ac27077c0494551d811fa1b8b420b1f53608375a59d91e7a68537f737d1d1a189f42f496b00', 0, '2019-12-31 13:37:19'),
('bb689f0d543e5208c961c2c54fe9aac88fd25e9c1e724157f4b576c5dff2d0ed715bc2a853fdafda', '5c576751cb4dce655bb35ad6dd03b0c3d97873675ef441308de6511deaaaf22b079569c9ac96aeb4', 0, '2020-01-17 13:13:20'),
('bbd3a1d33697803ab66877130129024e1e4e88fbf2efd77c297e8ae13fd663bf9c7a053789a09edf', 'c667939a22a7307561340af13d6686b2ebe6f25b8bd50179d9e443a0cb7152ac57bee97285051d7c', 0, '2020-01-11 12:42:57'),
('c07ccd3067525d7cad4c5e28783998e6bc3cc64b36da3ba2d7199df7934858bc4b93094b82852b41', 'cbd3c1741ec6671a895ed34c70141147c53494e8b7aaffb203891c9f09f92ca56a9602d7bdeab926', 0, '2020-01-17 13:14:32'),
('c08f55686dee809c302e67506d00bd128147270fea74c89939195effe4a0b7a6bf752609263fc619', '756f428227839f84811b999c6e3a37ba1c0559a0dfd5ed489219ce64d166ddcd462ad080453ffa28', 0, '2020-01-02 12:56:38'),
('c26106166a92c927ade68e94631c8abca6701cc58b097f43ddabc649eb6acc56ff95cbdcf1a1b744', 'd026d0fcdd11079e6ce1897ffed20caab105b0aaea3a8d904cad679176226aebd98a372c4695958c', 0, '2020-01-03 11:27:22'),
('c2ee58bfcc60b98f71857d6e7365fb9891cff5c72cd2d43c8810fde16f66763250210795e229ac80', '3c1cd92ce0c45f98134d7e1a737fa9138d2f9c8b0705e700724924748e26e443fac4f707467d3178', 0, '2020-01-10 17:46:39'),
('c38335ada95c4fc12b00a86c9429cfa0a02250034a715cc69e4998a042e25a7028086fced6cb7b3f', 'ff81c6a6f701cfa12c42a02dca52397a011c2fda3a0df1b519aaa1c6de0fe315afcdc8cd86b980dc', 0, '2020-01-07 08:51:49'),
('c41557fc349c96d6f3f605b5798d701e68ebe41517f89dad66746fdc0549691b8938585f3a1cd95c', '5c7c7b5c755aa6606c775193b861eea445a15f2f5f9477557abed80da394a58075105beaad0d3888', 0, '2020-01-04 17:10:08'),
('c625e438ee592d43894c839797fa89abc08fe204bf55df3c7c97f0d80abb4052ea995caf3fc2f0f9', '97031933fe643b580b5e9350384380d20c1095162e45d7135d9935b08a081a2ca69488e7e7592b26', 0, '2019-12-31 13:47:28'),
('c6f69add466edc83fde3d0db41e3350544e282c0d1e4ed009bf4781bd8a8502f76541942e1ae0802', '0fd04acf4a582ad1a0e87f478904c5029340933cdfba5969902e4362a94b62a8e88d92679a00b332', 0, '2020-01-11 11:49:40'),
('c79aed307baa6a4a374a3fde380807740f246fbee85edd59fdac48ae76ad47196741df05473e84ca', '79c1dcac0830e7ebc0d06ff3126084fe7227d19d2efb8e0bb56fa3b21ef609fc636df9cfae863000', 0, '2020-01-14 11:49:11'),
('ca88d0116496cb718a69ded5e54fb973c4a2f32c891125b0bca430e77981b0deba11963123655517', '2000656ef3a8d764fe9cb8c40e99e0c087d36e7731cb35e7e36a56c4c45dd8f4425190f271bfce97', 0, '2019-12-27 16:40:06'),
('ce5df89b270fab83513da8af47d879b6219c8cd41793aa8a93a1b09e4c86403b20c3b9ee9488266f', '89b10742e850d0fc6b7da1f58b296757e54e05442762cfed604552f4d0831a24b4f5f45206288c11', 0, '2020-01-10 18:10:46'),
('d0d3ea1a78cc71b4492a00a1132bc8d6d12b4e2323f06059b9703f16049713cc26ba1697ab0bc21c', '08f7b95cbe29c0b5713654c481545daad7fee4253f231c4b54c18c4116f590c28f883067278adfd0', 0, '2020-01-24 11:02:00'),
('d5eefd68fe0f0a92697a6a0cc5063e3ff42bed2fae88a4b188517c595b69b348da390489b1b5dc6b', '88163ac4295c792a1cb9bc9eeaf5893ce93194d5da084e4e6ec2b59f63459f4180040cd632b041ce', 0, '2020-01-18 10:00:32'),
('d7e4a25be427401ff9e6259cfc0849dcb27adcfca3bdee9580e569641bc1980f6db188f7a41f436e', '12f3a444fb226ec873947101593594a31a2b4825496671d09260ba771ff902f6d7ea3adca5eab005', 0, '2019-12-29 11:46:33'),
('da3bad456a4532df990bd47a1b3fe917483e740f316ee3a9bea25bad4b6002d4ab334fc05dd21b96', 'f89f2cdfd316b4cd6f6fce76ea225d23fc8edcc9cd85f4feb724ca487728ad1379c3de7343d776c8', 0, '2020-01-11 10:50:37'),
('dc656b8013f90bf08786a7f4a3d482230f21d332d042e9004ff15eee6f234d775cdd09000e043300', '61b452ef6117798ddabf3eb502479766ba747972dcc64ab8276a57ccfd683736691bdb3c2a13de56', 0, '2020-01-11 11:50:24'),
('dd8bd6690baf43ad2dac926716ede711d569cf9b45830684fa3ca268e9d3cca88882e1c1fa22f0cd', '87da6a7bcf556bb0cc849fb604df2230882e17309f07e303ba3c32fef9068b9eec17d430a3692e0e', 0, '2020-01-07 08:48:07'),
('dfad2211cfacc541e89190c090786ced84fa0e567750ec3687f63b26f0b03641bd62e60e11b4dabc', '830193283b9a4eae99f76672dfbf67b4d33cf24b89e57fecf3d9f46c3d6ad724d907fe9127438c3c', 0, '2019-12-31 13:49:15'),
('e06d5cf35acc132aa349059dff4888c595a82baa66ff7926c03f6c4d17dfa59ab4eff87d09b1c371', '2dda08d29e0e74b341ba0d9768baac3a04599414c3e472b56dc369333588a2fa63f15ece97500c29', 0, '2020-01-04 14:29:59'),
('e12aed6a41457c902e9fb088c884494763a0ab66263920948322112932251961d0749ae9e7fcd5a5', '36ade4f050b6374102ac8e7392106b2831d4de546a1486ad6675c95198c760ca2ff3de163c506f96', 0, '2020-01-03 11:10:29'),
('e48fcca46793b8e80ccd4ed303edf96682ba4b28a23fc4449aeaf7e588959951a6401ecf22d1d824', '8923f2533a30a1e9bfe35c99f935c84e130afdfe8cc54e00455feb0d6482a80e9b9f8eba4c6f38e7', 0, '2019-12-28 14:49:52'),
('e6bec80d644ffb41c91f4aade42afdfffb20e451bc0cdaf5c31fdc4af6fbc28dc7e38651ab36ceaf', 'cd7eb5bda0ed1759d2181fc8cdf56fd852593463ee99b5db73509d2a1a8d9e5249f58f5e759974a7', 0, '2020-01-14 16:56:14'),
('e8257c1a627e5a15f1dd5801763a13690ae74d8a2e0f63b2f89c3733eabfd97dc620a238dc76c3d0', 'cdbf91bd81b426e2a1e5e7f29bfa51e52e54216b93ea9ca349c696b89e8bf7fce9844fa0c0ddc3dc', 0, '2019-12-29 11:48:52'),
('f26ef99cce595f49c863bb2916590eed269c52dc9270dbcbc9af60d0407d4322a94429597818915d', '448e04b4f617a00b2a25834421df7624f67f1437115188bd1b275f4a31886d5432b97c872959cbe4', 0, '2020-01-14 17:10:23'),
('f5270c61b55abe4a352eb11b3e896e004d946a7008b8fd9ab3686992e75e53d4e0978b735c9662be', 'b0bdf20293f3d16f064056dd76b6b5400d61f9305c5bd30943d70434fca62f1e8b824964cf9fab88', 0, '2020-01-16 14:23:29'),
('f682cf561e1bbb803a7375c758ced72142ca8c51b5c10dff5e92a700929e2be11d14b8fb9657af3c', 'ac480f44bbc132fbd743ba724ca595bfca421e4a5daa34a2695971f7b23528039283711e891483f6', 0, '2019-12-31 09:54:13'),
('f8e275b57f8a8ac126388c885db4c085c49b43093d894b3325da06648c7c6c9e873a24cb140a3e50', 'f67e8ff257433448375c8619b4a5c34d70c8d516c820bb03f6948830b890853d13595f1507509a6c', 0, '2020-01-04 17:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_text` text COLLATE utf8mb4_unicode_ci,
  `post_image` text COLLATE utf8mb4_unicode_ci,
  `color` text COLLATE utf8mb4_unicode_ci,
  `longitude` decimal(10,7) DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `post_text`, `post_image`, `color`, `longitude`, `latitude`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 2, 'Hello Lorem sit amet consectetur adipisicing elit. Rnecessitatibu', NULL, '#fff', '1.7800000', '2.8900000', '2019-01-04 12:18:28', '2019-02-15 16:28:13', '0000-00-00 00:00:00'),
(6, 2, 'lorem ipsume updated', NULL, '#00fff', '1.6700000', '2.8800000', '2019-01-07 03:07:53', '2019-02-18 11:14:57', NULL),
(8, 1, 'Hello Lorem sit amet consectetur adipisicing elit. Rnecessitat', NULL, '#fff', '1.7800000', '2.8900000', '2019-01-08 02:42:30', '2019-01-08 02:42:30', NULL),
(10, 2, 'Hello Lorem sit amet consectetur adipisicing elit. Rnecessitat', NULL, '#fff', '1.7800000', '2.8900000', '2019-01-08 09:08:48', '2019-02-15 16:29:55', '2019-02-15 16:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_me` int(11) NOT NULL DEFAULT '1',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `status` int(11) NOT NULL DEFAULT '1',
  `longitude` decimal(10,7) DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `phone`, `email`, `email_verified_at`, `password`, `show_me`, `type`, `status`, `longitude`, `latitude`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '9889919029', 'admin@chetu.com', NULL, '$2y$10$NdOx6TSZGhMXNXY8GCwnOO/vECTaT7Vko2LgTMIHAxcE7Wt4hs/kS', 1, 'admin', 1, '11.6000000', '10.4000000', 'ZrgXqlz3VFXPDqQyrnldN0AUeho861X4E40F4nQSFCZnZfkenyLdoZIxJ2xv', '2019-01-23 10:15:58', '2019-01-28 17:35:32'),
(2, 'AYTXOB', '9889919029', 'shakeel@chetu.com', NULL, '$2y$10$dT/x1wdVvok9dBQ4FuONo./2T.euNKWGOwH.0pcYa/UFu8kU4XpRi', 1, 'default', 1, '11.6000000', '10.4000000', NULL, '2019-01-21 10:16:19', '2019-02-11 13:27:10'),
(4, 'TDZUTJ', '9889919029', 'rajesh@chetu.com', NULL, '$2y$10$JF5892PhYZ0i/vaGSqjhiOihkN9jrGagjPR03muYY6KMo7PtDcwi2', 1, 'default', 1, NULL, NULL, NULL, '2019-01-24 11:10:47', '2019-01-29 09:55:08'),
(6, 'JQZG2N', '9889919029', 'rishi@gmail.com', NULL, '$2y$10$ONrYtOOG.aq3ZyYnrORRyeEMHNEm2v16dqEmiIMi2HlR1Oid0Cj2a', 1, 'default', 1, NULL, NULL, NULL, '2019-01-28 13:54:13', '2019-02-07 16:12:52'),
(8, 'JCZJV6', '9889919029', 'vijay@yandex.com', NULL, '$2y$10$4YBp.Eo/Ifx8MlNKihYHTuXFsbec/hi9qPli9Q6DXnvjx5/xIRshK', 1, 'default', 1, NULL, NULL, NULL, '2019-01-28 17:36:30', '2019-02-07 16:14:42'),
(9, '7FH3WJ', '9889919029', 'abuj@chetu.com', NULL, '$2y$10$/wScdfdFIp.d9aCP8QsWzuT.O3Su7I32a/1AlA62qAXJW9/m0Y7K.', 1, 'default', 1, '11.6000000', '10.4000000', NULL, '2019-01-31 10:31:49', '2019-01-31 10:33:30'),
(10, '3YHIPV', '9889919029', 'alok@chetu.com', NULL, '$2y$10$JTYMXTgZkOQUzOXi.cAuZOgZW9tSPuUqpwpU5BVHxdUL9aOgcza8C', 1, 'default', 1, '11.6000000', '10.4000000', NULL, '2019-02-06 12:00:57', '2019-02-06 12:00:57'),
(11, 'QPBD1V', '9582300578', 'alokdev@chetu.com', NULL, '$2y$10$B8dEk2r8X9D8N5yluo/3E.5UhlnmOav/EXcQE5957t8wwT6CHpTTS', 1, 'default', 1, '11.6000000', '10.4000000', NULL, '2019-02-11 10:30:35', '2019-02-11 10:30:35'),
(12, 'CNXMNV', '9582300578', 'alokdev1@chetu.com', NULL, '$2y$10$tXQIOyepVM.193ZF.WislOxN2xxplYyShriceif2dqV08uBXYQxzu', 1, 'default', 1, '11.6000000', '10.4000000', NULL, '2019-02-11 10:31:15', '2019-02-11 10:31:15'),
(13, 'M1VCLW', '9582300578', 'alokdev2@chetu.com', NULL, '$2y$10$AaYctJ7KFLznQDciQuDyi.3A1.buzdJCQQHjvUZrkcoRdRKA.2RVK', 1, 'default', 1, '11.6000000', '10.4000000', NULL, '2019-02-11 10:31:22', '2019-02-11 10:31:22'),
(14, 'X3NAPG', '9582300578', 'alokdev3@chetu.com', NULL, '$2y$10$4MXRW2hOjb60GaAOmGnJhuZwRxk51NwumV0TMb7semjbm.Lnjdctq', 1, 'default', 1, '11.6000000', '10.4000000', NULL, '2019-02-11 10:31:28', '2019-02-11 10:31:28'),
(15, 'KE0WBW', '9582300578', 'alokdev4@chetu.com', NULL, '$2y$10$HrT9CsmsKsdKx1RjvLsR8.EjlmQ1puOU2QkxU5nwcbg6DqtcUKFRS', 1, 'default', 1, '11.6000000', '10.4000000', NULL, '2019-02-11 10:31:33', '2019-02-11 10:31:33'),
(16, 'GESV0C', '9582300578', 'alokdev5@chetu.com', NULL, '$2y$10$bCLJqhyLCqQtZcAVIOsal.KrdSUap//IYIuhp6G2PMlRlA1FgtA8m', 1, 'default', 1, '11.6000000', '10.4000000', NULL, '2019-02-11 10:31:37', '2019-02-11 10:31:37'),
(17, 'MOD3HT', '9582300578', 'ajayd3@chetu.com', NULL, '$2y$10$aIMmZQKn.HQks251LXcRqOnecQNEwG2kRAvm5R.ffJjla23xwN1ZS', 1, 'default', 1, '11.6000000', '10.4000000', NULL, '2019-02-11 10:32:21', '2019-02-11 10:32:21'),
(18, 'MHUJTT', '1234567890', 'ajayd4@chetu.com', NULL, '$2y$10$TJc7AA9ZXVYAPT820gV/MubYyvcUu8tHy1eu9oQ8fPt9WuJoCL3l.', 1, 'default', 1, '11.6000000', '10.4000000', NULL, '2019-02-11 10:33:39', '2019-02-11 10:33:39'),
(19, 'ZAKZRJ', '9889919029', 'mahesh@chetu.com', NULL, '$2y$10$QwB1hQTWRxPb4Yo3160GmOCLGFKgW35Aq4oplI.NBtHwGi5aRfQUe', 1, 'default', 1, '11.6000000', '10.4000000', NULL, '2019-02-11 12:44:15', '2019-02-11 12:44:15'),
(20, '0LICKM', '9889919029', 'al@chetu.com', NULL, '$2y$10$CC7g6XQcCQ/xobcZ3WP1eOzFQDtSUjH.h1BXHyM.teoxD1Gi7gF0e', 1, 'default', 1, '11.6000000', '10.4000000', NULL, '2019-02-11 14:55:18', '2019-02-11 14:55:18'),
(21, 'XJGETR', '9889919029', 'ald@chetu.com', NULL, '$2y$10$Xa./2HAFji58/V6ha4U9s./pyuj8cGj7e/AJQNBkh/1TtS9b8q5cO', 1, 'default', 1, NULL, NULL, NULL, '2019-02-11 14:55:41', '2019-02-11 14:55:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
