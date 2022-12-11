-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 05:11 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ngo`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_overview` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_goal` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mission` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `values` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `project_overview`, `project_goal`, `mission`, `values`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, sint.Lorem ipsum dolor sit amet\r\n                    consectetur adipisicing elit  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores autem blanditiis cum dolores dolorum ducimus eaque, error est excepturi exercitationem hic illo illum in libero minima molestias necessitatibus nostrum officiis, perferendis porro praesentium qui saepe sequi temporibus voluptates voluptatibus. Accusamus ad, assumenda, autem, dolorum ex incidunt iste laudantium magni mollitia nobis praesentium repudiandae suscipit tempora veritatis voluptates? Alias amet excepturi ipsum neque pariatur perferendis saepe. Amet asperiores atque blanditiis consequatur cupiditate dignissimos distinctio doloribus eaque enim error eum, eveniet, ipsa ipsam itaque magni maxime minus molestiae, nemo nesciunt nihil optio perferendis porro qui quia quos ratione sed tempore veniam.', NULL, NULL, NULL, 'about/166254044563185a9d1c2ed.png', 1, '2022-09-06 18:31:21', '2022-09-06 20:47:25'),
(2, NULL, 'adipisicing elit. Harum, sint.Lorem ipsum dolor sit amet consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores autem blanditiis cum dolores dolorum ducimus eaque, error est excepturi exercitationem hic illo illum in libero minima molestias necessitatibus nostrum officiis, perferendis porro praesentium qui saepe sequi temporibus voluptates voluptatibus. Accusamus ad, assumenda, autem, dolorum ex incidunt iste laudantium magni mollitia nobis praesentium repudiandae suscipit tempora veritatis voluptates? Alias amet excepturi ipsum neque pariatur perferendis saepe. Amet asperiores atque blanditiis consequatur cupiditate dignissimos distinctio doloribus eaque enim error eum, eveniet, ipsa ipsam itaque magni maxime minus molestiae, nemo nesciunt nihil optio perferendis porro qui quia quos ratione sed', NULL, NULL, 'about/166254127863185dde3aaba.png', 1, '2022-09-06 19:01:23', '2022-09-06 21:06:27'),
(3, NULL, NULL, 'adipisicing elit. Harum, sint.Lorem ipsum dolor sit amet consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores autem blanditiis cum dolores dolorum ducimus eaque, error est excepturi exercitationem hic illo illum in libero minima molestias necessitatibus nostrum officiis, perferendis porro praesentium qui saepe sequi temporibus voluptates voluptatibus. Accusamus ad, assumenda, autem, dolorum ex incidunt iste laudantium magni mollitia nobis praesentium repudiandae suscipit tempora veritatis voluptates? Alias amet excepturi ipsum neque pariatur perferendis saepe. Amet asperiores atque blanditiis consequatur cupiditate dignissimos distinctio doloribus eaque enim error eum, eveniet, ipsa ipsam itaque magni maxime minus molestiae, nemo nesciunt nihil optio perferendis porro qui quia quos ratione sed', NULL, 'about/16625419326318606cca402.png', 1, '2022-09-06 19:01:41', '2022-09-06 21:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Trainings and Workshop', '<ol><li>Workshop on Good Aquaculture Practice</li><li>Training on Soft shell crab farming</li><li>Training on Crab fattening with GAP</li><li>Training on Mud Crab farming with</li></ol>', 'activity/166235234263157bd6aee0d.jpg', 1, '2022-09-04 16:32:23', '2022-09-04 16:32:23'),
(4, 'New project title', '<ol><li>Workshop on Good Aquaculture Practice</li><li>Training on Soft shell crab farming</li><li>Training on Crab fattening with GAP</li><li>Training on Mud Crab farming with</li></ol>', 'activity/166235477463158556e2443.jpg', 1, '2022-09-04 17:12:55', '2022-09-04 17:12:55'),
(5, 'Trainings and Workshop', '<ol><li>Workshop on Good Aquaculture Practice</li><li>Training on Soft shell crab farming</li><li>Training on Crab fattening with GAP</li><li>Training on Mud Crab farming with</li></ol>', 'activity/1662354916631585e4d27a1.jpg', 1, '2022-09-04 17:15:17', '2022-09-04 17:15:17'),
(6, 'Trainings and Workshop', '<ol><li>Workshop on Good Aquaculture Practice</li><li>Training on Soft shell crab farming</li><li>Training on Crab fattening with GAP</li><li>Training on Mud Crab farming with</li></ol>', 'activity/166235234263157bd6aee0d.jpg', 1, '2022-09-04 16:32:23', '2022-09-04 16:32:23'),
(7, 'Trainings and Workshop', '<ol><li>Workshop on Good Aquaculture Practice</li><li>Training on Soft shell crab farming</li><li>Training on Crab fattening with GAP</li><li>Training on Mud Crab farming with</li></ol>', 'activity/16623553406315878c5e69c.jpg', 1, '2022-09-04 17:22:20', '2022-09-04 17:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Search Engine Optimization most and most important for blogging. If you are using', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'blog/1662874448631d7350ce4eb.jpg', 1, '2022-09-10 17:34:10', '2022-09-10 17:34:10'),
(3, 'Search Engine Optimization most and most important for blogging. If you are using', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'blog/1662874464631d7360057d4.jpg', 1, '2022-09-10 17:34:25', '2022-09-10 17:34:25'),
(4, 'Search Engine Optimization most and most important for blogging. If you are using', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'blog/1662874492631d737c7add3.jpg', 1, '2022-09-10 17:34:53', '2022-09-10 17:34:53'),
(5, 'Search Engine Optimization most and most important for blogging. If you are using', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'blog/1662874509631d738d47fc4.jpg', 1, '2022-09-10 17:35:10', '2022-09-10 17:35:10'),
(6, 'Search Engine Optimization most and most important for blogging. If you are using', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'blog/1662874539631d73abebd20.jpg', 1, '2022-09-10 17:35:41', '2022-09-10 17:35:41'),
(7, 'and most', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'blog/1662874583631d73d7b460b.jpg', 1, '2022-09-10 17:36:24', '2022-09-10 17:36:24'),
(8, 'Search Engine Optimization most and most important for blogging. If you are using', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'blog/1662874448631d7350ce4eb.jpg', 1, '2022-09-10 17:34:10', '2022-09-10 17:34:10'),
(9, 'fdfdg', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'blog/1662874464631d7360057d4.jpg', 1, '2022-09-10 17:34:25', '2022-09-10 17:34:25'),
(10, 'Search Engine Optimization most and most important for blogging. If you are using', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'blog/1662874492631d737c7add3.jpg', 1, '2022-09-10 17:34:53', '2022-09-10 17:34:53'),
(11, 'Search Engine Optimization most and most important for blogging. If you are using', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'blog/1662874509631d738d47fc4.jpg', 1, '2022-09-10 17:35:10', '2022-09-10 17:35:10'),
(12, 'Search Engine ', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'blog/1662874539631d73abebd20.jpg', 1, '2022-09-10 17:35:41', '2022-09-10 17:35:41'),
(13, 'Search Engine Optimization most and most important for blogging. If you are using', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'blog/1662874583631d73d7b460b.jpg', 1, '2022-09-10 17:36:24', '2022-09-10 17:36:24'),
(14, 'Search Engine Optimization most and most important for blogging. If you are using', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'blog/1662874448631d7350ce4eb.jpg', 1, '2022-09-10 17:34:10', '2022-09-10 17:34:10'),
(15, 'Search Engine Optimization most and most important for blogging. If you are using', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'blog/1662874464631d7360057d4.jpg', 1, '2022-09-10 17:34:25', '2022-09-10 17:34:25'),
(16, 'Search Engine Optimization most and most important for blogging. If you are using', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'blog/1662874492631d737c7add3.jpg', 1, '2022-09-10 17:34:53', '2022-09-10 17:34:53'),
(17, 'Search Engine Optimization most and most important for blogging. If you are using', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'blog/1662874509631d738d47fc4.jpg', 1, '2022-09-10 17:35:10', '2022-09-10 17:35:10'),
(18, 'Search Engine Optimization most and most important for blogging. If you are using', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'blog/1662874539631d73abebd20.jpg', 1, '2022-09-10 17:35:41', '2022-09-10 17:35:41'),
(19, 'Search Engine Optimization most and most important for blogging. If you are using', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'blog/1662874583631d73d7b460b.jpg', 1, '2022-09-10 17:36:24', '2022-09-10 17:36:24'),
(20, 'Search Engine Optimization most and most important for blogging. If you are using', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'blog/1662874448631d7350ce4eb.jpg', 1, '2022-09-10 17:34:10', '2022-09-10 17:34:10'),
(21, 'Search Engine Optimization most and most important for blogging. If you are using', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'blog/1662874464631d7360057d4.jpg', 1, '2022-09-10 17:34:25', '2022-09-10 17:34:25'),
(22, 'Search Engine Optimization most and most important for blogging. If you are using', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'blog/1662874492631d737c7add3.jpg', 1, '2022-09-10 17:34:53', '2022-09-10 17:34:53'),
(23, 'Search Engine Optimization most and most important for blogging. If you are using', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'blog/1662874509631d738d47fc4.jpg', 1, '2022-09-10 17:35:10', '2022-09-10 17:35:10'),
(24, 'Search Engine Optimization most and most important for blogging. If you are using', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'blog/1662874539631d73abebd20.jpg', 1, '2022-09-10 17:35:41', '2022-09-10 17:35:41'),
(25, 'Search Engine Optimization most and most important for blogging. If you are using', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'blog/1662874583631d73d7b460b.jpg', 1, '2022-09-10 17:36:24', '2022-09-10 17:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE `components` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contactNumber` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactMail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactAddress` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `contactNumber`, `contactMail`, `contactAddress`, `status`, `created_at`, `updated_at`) VALUES
(1, '35367838367', 'example7@gmail.com', 'Boklyn new 7 yeark ,USA', 0, '2022-08-23 22:40:30', '2022-08-23 22:46:40'),
(3, '01678757674', 'example@gmail.com', 'Boklyn new yeark ,USA', 1, '2022-09-05 17:04:42', '2022-09-05 17:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `entrepreneurs`
--

CREATE TABLE `entrepreneurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `owner_company` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_company_logo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_contact` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mapLink` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `entrepreneurs`
--

INSERT INTO `entrepreneurs` (`id`, `owner_company`, `owner_name`, `owner_company_logo`, `owner_email`, `owner_contact`, `owner_address`, `mapLink`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rahman Enterprise', 'Rahman Khan', 'ownerCompanyLogo/1670048019.png', 'rahman1@gmail.com', '01634352627', 'Kapaleswar, Kapasia', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233667.8223904494!2d90.2791928824347!3d23.780887457317867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1661233396211!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, '2022-12-02 23:41:50', '2022-12-03 05:42:48'),
(3, 'Marah Enterpise', 'Marah Mckee', 'ownerCompanyLogo/1670061347.png', 'marah@gmail.com', '01784884598', 'Dhaka, bangladesh', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233667.8223904494!2d90.2791928824347!3d23.780887457317867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1661233396211!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, '2022-12-03 03:55:47', '2022-12-03 03:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `image`, `start`, `end`, `place`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fundraiser for kids', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, nesciunt? Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, nesciunt?Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, nesciunt?', 'event/166235630663158b525144d.jpg', '03-08-2022', '31-08-2022', 'Mohammadpur Dhaka', 1, '2022-09-04 17:38:28', '2022-09-09 19:14:21'),
(2, 'Fundraiser for kids', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa recusandae reprehenderit deleniti dolorem sint hic quisquam, nobis aperiam? Exercitationem expedita excepturi quae impedit quia dolor, quidem et', 'event/16623585886315943ca95e3.jpg', '08-08-2022', '14-08-2022', 'Mohammadpur Dhaka', 1, '2022-09-04 18:16:30', '2022-09-04 18:16:30'),
(3, 'Fundraiser for kids Fundraiser for', 'NGF works in south-west coastal part of Bangladesh covering 17 upazilas under 3 different. Districts\r\n                    namely Satkhira, Khulna, Jashore. The Head Office is situated in Nowabenki, Shyamnagar,', 'event/1662358990631595cec2406.jpg', '03-08-2022', '14-08-2022', 'Mohammadpur Dhaka', 1, '2022-09-04 18:23:13', '2022-09-04 18:24:15'),
(4, 'Fundraiser for kids', 'NGF works in south-west coastal part of Bangladesh covering 17 upazilas under 3 different. Districts\r\n                    namely Satkhira, Khulna, Jashore. The Head Office is situated in Nowabenki, Shyamnagar,', 'event/1662359089631596310a1f6.jpg', '22-09-2022', '30-09-2022', 'Mohammadpur Dhaka', 1, '2022-09-04 18:24:50', '2022-09-04 18:24:50'),
(5, 'Fundraiser for kids', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias consequatur, deleniti deserunt, distinctio dolor dolores facilis impedit magni nihil odio officiis perspiciatis quisquam rerum ullam, vel? Ab est ex magni nemo perferendis quasi recusandae repudiandae sapiente similique voluptatibus. Beatae dolore ipsa odio voluptates! Aliquid deserunt modi optio provident, sequi voluptates?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias consequatur, deleniti deserunt, distinctio dolor dolores facilis impedit magni nihil odio officiis perspiciatis quisquam rerum ullam, vel? Ab est ex magni nemo perferendis quasi recusandae repudiandae sapiente similique voluptatibus. Beatae dolore ipsa odio voluptates! Aliquid deserunt modi optio provident, sequi voluptates?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias consequatur, deleniti deserunt, distinctio dolor dolores facilis impedit magni nihil odio officiis perspiciatis quisquam rerum ullam, vel? Ab est ex magni nemo perferendis quasi recusandae repudiandae sapiente similique voluptatibus. Beatae dolore ipsa odio voluptates! Aliquid deserunt modi optio provident, sequi voluptates?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias consequatur, deleniti deserunt, distinctio dolor dolores facilis impedit magni nihil odio officiis perspiciatis quisquam rerum ullam, vel? Ab est ex magni nemo perferendis quasi recusandae repudiandae sapiente similique voluptatibus. Beatae dolore ipsa odio voluptates! Aliquid deserunt modi optio provident, sequi voluptates?', 'event/1662793224631c360805682.jpg', '08-08-2022', '29-09-2022', 'Mohammadpur Dhaka', 1, '2022-09-09 19:00:26', '2022-09-09 19:02:37'),
(6, 'Fundraiser for kids', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, nesciunt? Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, nesciunt?Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, nesciunt?', 'event/166235630663158b525144d.jpg', '03-08-2022', '31-08-2022', 'Mohammadpur Dhaka', 1, '2022-09-04 17:38:28', '2022-09-09 19:14:21'),
(7, 'Fundraiser for kids', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa recusandae reprehenderit deleniti dolorem sint hic quisquam, nobis aperiam? Exercitationem expedita excepturi quae impedit quia dolor, quidem et', 'event/16623585886315943ca95e3.jpg', '08-08-2022', '14-08-2022', 'Mohammadpur Dhaka', 1, '2022-09-04 18:16:30', '2022-09-04 18:16:30'),
(8, 'Fundraiser for kids Fundraiser for', 'NGF works in south-west coastal part of Bangladesh covering 17 upazilas under 3 different. Districts\r\n                    namely Satkhira, Khulna, Jashore. The Head Office is situated in Nowabenki, Shyamnagar,', 'event/1662358990631595cec2406.jpg', '03-08-2022', '14-08-2022', 'Mohammadpur Dhaka', 1, '2022-09-04 18:23:13', '2022-09-04 18:24:15'),
(9, 'Fundraiser for kids', 'NGF works in south-west coastal part of Bangladesh covering 17 upazilas under 3 different. Districts\r\n                    namely Satkhira, Khulna, Jashore. The Head Office is situated in Nowabenki, Shyamnagar,', 'event/1662359089631596310a1f6.jpg', '22-09-2022', '30-09-2022', 'Mohammadpur Dhaka', 1, '2022-09-04 18:24:50', '2022-09-04 18:24:50'),
(10, 'Fundraiser for kids', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias consequatur, deleniti deserunt, distinctio dolor dolores facilis impedit magni nihil odio officiis perspiciatis quisquam rerum ullam, vel? Ab est ex magni nemo perferendis quasi recusandae repudiandae sapiente similique voluptatibus. Beatae dolore ipsa odio voluptates! Aliquid deserunt modi optio provident, sequi voluptates?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias consequatur, deleniti deserunt, distinctio dolor dolores facilis impedit magni nihil odio officiis perspiciatis quisquam rerum ullam, vel? Ab est ex magni nemo perferendis quasi recusandae repudiandae sapiente similique voluptatibus. Beatae dolore ipsa odio voluptates! Aliquid deserunt modi optio provident, sequi voluptates?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias consequatur, deleniti deserunt, distinctio dolor dolores facilis impedit magni nihil odio officiis perspiciatis quisquam rerum ullam, vel? Ab est ex magni nemo perferendis quasi recusandae repudiandae sapiente similique voluptatibus. Beatae dolore ipsa odio voluptates! Aliquid deserunt modi optio provident, sequi voluptates?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias consequatur, deleniti deserunt, distinctio dolor dolores facilis impedit magni nihil odio officiis perspiciatis quisquam rerum ullam, vel? Ab est ex magni nemo perferendis quasi recusandae repudiandae sapiente similique voluptatibus. Beatae dolore ipsa odio voluptates! Aliquid deserunt modi optio provident, sequi voluptates?', 'event/1662793224631c360805682.jpg', '08-08-2022', '29-09-2022', 'Mohammadpur Dhaka', 1, '2022-09-09 19:00:26', '2022-09-09 19:02:37'),
(11, 'Fundraiser for kids', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, nesciunt? Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, nesciunt?Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, nesciunt?', 'event/166235630663158b525144d.jpg', '03-08-2022', '31-08-2022', 'Mohammadpur Dhaka', 1, '2022-09-04 17:38:28', '2022-09-09 19:14:21'),
(12, 'Fundraiser for kids', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa recusandae reprehenderit deleniti dolorem sint hic quisquam, nobis aperiam? Exercitationem expedita excepturi quae impedit quia dolor, quidem et', 'event/16623585886315943ca95e3.jpg', '08-08-2022', '14-08-2022', 'Mohammadpur Dhaka', 1, '2022-09-04 18:16:30', '2022-09-04 18:16:30'),
(13, 'Fundraiser for kids Fundraiser for', 'NGF works in south-west coastal part of Bangladesh covering 17 upazilas under 3 different. Districts\r\n                    namely Satkhira, Khulna, Jashore. The Head Office is situated in Nowabenki, Shyamnagar,', 'event/1662358990631595cec2406.jpg', '03-08-2022', '14-08-2022', 'Mohammadpur Dhaka', 1, '2022-09-04 18:23:13', '2022-09-04 18:24:15'),
(14, 'Fundraiser for kids', 'NGF works in south-west coastal part of Bangladesh covering 17 upazilas under 3 different. Districts\r\n                    namely Satkhira, Khulna, Jashore. The Head Office is situated in Nowabenki, Shyamnagar,', 'event/1662359089631596310a1f6.jpg', '22-09-2022', '30-09-2022', 'Mohammadpur Dhaka', 1, '2022-09-04 18:24:50', '2022-09-04 18:24:50'),
(15, 'Fundraiser for kids', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias consequatur, deleniti deserunt, distinctio dolor dolores facilis impedit magni nihil odio officiis perspiciatis quisquam rerum ullam, vel? Ab est ex magni nemo perferendis quasi recusandae repudiandae sapiente similique voluptatibus. Beatae dolore ipsa odio voluptates! Aliquid deserunt modi optio provident, sequi voluptates?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias consequatur, deleniti deserunt, distinctio dolor dolores facilis impedit magni nihil odio officiis perspiciatis quisquam rerum ullam, vel? Ab est ex magni nemo perferendis quasi recusandae repudiandae sapiente similique voluptatibus. Beatae dolore ipsa odio voluptates! Aliquid deserunt modi optio provident, sequi voluptates?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias consequatur, deleniti deserunt, distinctio dolor dolores facilis impedit magni nihil odio officiis perspiciatis quisquam rerum ullam, vel? Ab est ex magni nemo perferendis quasi recusandae repudiandae sapiente similique voluptatibus. Beatae dolore ipsa odio voluptates! Aliquid deserunt modi optio provident, sequi voluptates?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias consequatur, deleniti deserunt, distinctio dolor dolores facilis impedit magni nihil odio officiis perspiciatis quisquam rerum ullam, vel? Ab est ex magni nemo perferendis quasi recusandae repudiandae sapiente similique voluptatibus. Beatae dolore ipsa odio voluptates! Aliquid deserunt modi optio provident, sequi voluptates?', 'event/1662793224631c360805682.jpg', '08-08-2022', '29-09-2022', 'Mohammadpur Dhaka', 1, '2022-09-09 19:00:26', '2022-09-09 19:02:37'),
(16, 'Fundraiser for kids', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, nesciunt? Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, nesciunt?Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, nesciunt?', 'event/166235630663158b525144d.jpg', '03-08-2022', '31-08-2022', 'Mohammadpur Dhaka', 1, '2022-09-04 17:38:28', '2022-09-09 19:14:21'),
(17, 'Fundraiser for kids', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa recusandae reprehenderit deleniti dolorem sint hic quisquam, nobis aperiam? Exercitationem expedita excepturi quae impedit quia dolor, quidem et', 'event/16623585886315943ca95e3.jpg', '08-08-2022', '14-08-2022', 'Mohammadpur Dhaka', 1, '2022-09-04 18:16:30', '2022-09-04 18:16:30'),
(18, 'Fundraiser for kids Fundraiser for', 'NGF works in south-west coastal part of Bangladesh covering 17 upazilas under 3 different. Districts\r\n                    namely Satkhira, Khulna, Jashore. The Head Office is situated in Nowabenki, Shyamnagar,', 'event/1662358990631595cec2406.jpg', '03-08-2022', '14-08-2022', 'Mohammadpur Dhaka', 1, '2022-09-04 18:23:13', '2022-09-04 18:24:15'),
(19, 'Fundraiser for kids', 'NGF works in south-west coastal part of Bangladesh covering 17 upazilas under 3 different. Districts\r\n                    namely Satkhira, Khulna, Jashore. The Head Office is situated in Nowabenki, Shyamnagar,', 'event/1662359089631596310a1f6.jpg', '22-09-2022', '30-09-2022', 'Mohammadpur Dhaka', 1, '2022-09-04 18:24:50', '2022-09-04 18:24:50'),
(20, 'Fundraiser for kids', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias consequatur, deleniti deserunt, distinctio dolor dolores facilis impedit magni nihil odio officiis perspiciatis quisquam rerum ullam, vel? Ab est ex magni nemo perferendis quasi recusandae repudiandae sapiente similique voluptatibus. Beatae dolore ipsa odio voluptates! Aliquid deserunt modi optio provident, sequi voluptates?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias consequatur, deleniti deserunt, distinctio dolor dolores facilis impedit magni nihil odio officiis perspiciatis quisquam rerum ullam, vel? Ab est ex magni nemo perferendis quasi recusandae repudiandae sapiente similique voluptatibus. Beatae dolore ipsa odio voluptates! Aliquid deserunt modi optio provident, sequi voluptates?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias consequatur, deleniti deserunt, distinctio dolor dolores facilis impedit magni nihil odio officiis perspiciatis quisquam rerum ullam, vel? Ab est ex magni nemo perferendis quasi recusandae repudiandae sapiente similique voluptatibus. Beatae dolore ipsa odio voluptates! Aliquid deserunt modi optio provident, sequi voluptates?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias consequatur, deleniti deserunt, distinctio dolor dolores facilis impedit magni nihil odio officiis perspiciatis quisquam rerum ullam, vel? Ab est ex magni nemo perferendis quasi recusandae repudiandae sapiente similique voluptatibus. Beatae dolore ipsa odio voluptates! Aliquid deserunt modi optio provident, sequi voluptates?', 'event/1662793224631c360805682.jpg', '08-08-2022', '29-09-2022', 'Mohammadpur Dhaka', 1, '2022-09-09 19:00:26', '2022-09-09 19:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Chicken burger 1 price', 'Description', 'foods/16613345236305f3fb10611.jpg', 1, '2022-08-23 21:40:52', '2022-08-23 21:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `food_demands`
--

CREATE TABLE `food_demands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food_demands`
--

INSERT INTO `food_demands` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Food demand ok', 'Food demand description ok', 0, '2022-08-23 18:20:44', '2022-08-23 18:21:17');

-- --------------------------------------------------------

--
-- Table structure for table `food_values`
--

CREATE TABLE `food_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food_values`
--

INSERT INTO `food_values` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Food title ok', '<p>ok</p>', 0, '2022-08-23 17:29:34', '2022-08-23 18:00:54');

-- --------------------------------------------------------

--
-- Table structure for table `f_a_q_s`
--

CREATE TABLE `f_a_q_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `questions` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answers` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `f_a_q_s`
--

INSERT INTO `f_a_q_s` (`id`, `questions`, `answers`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dashwood marianne in of entrance be on wondered entrance', 'Not attention say frankness intention out dashwoods now curiosity. Stronger ecstatic as no judgment daughter speedily thoughts. Worse downs nor might she court did nay forth these.', 1, '2022-09-07 17:05:46', '2022-09-07 17:16:00'),
(2, 'Dashwood marianne in of entrance be on wondered entrance', 'Not attention say frankness intention out dashwoods now curiosity. Stronger ecstatic as no judgment daughter speedily thoughts. Worse downs nor might she court did nay forth these.', 1, '2022-09-07 17:15:13', '2022-09-07 17:19:02'),
(3, 'Dashwood marianne in of entrance be on wondered entrance', 'Not attention say frankness intention out dashwoods now curiosity. Stronger ecstatic as no judgment daughter speedily thoughts. Worse downs nor might she court did nay forth these.', 1, '2022-09-07 17:20:59', '2022-09-07 17:20:59'),
(4, 'Dashwood marianne in of entrance be on wondered entrance', 'Not attention say frankness intention out dashwoods now curiosity. Stronger ecstatic as no judgment daughter speedily thoughts. Worse downs nor might she court did nay forth these.', 1, '2022-09-07 17:21:15', '2022-09-07 17:21:15'),
(5, 'Dashwood marianne in of entrance be on wondered entrance', 'Not attention say frankness intention out dashwoods now curiosity. Stronger ecstatic as no judgment daughter speedily thoughts. Worse downs nor might she court did nay forth these.', 1, '2022-09-07 17:21:32', '2022-09-07 17:21:32'),
(6, 'Dashwood marianne in of entrance be on wondered entrance', 'Not attention say frankness intention out dashwoods now curiosity. Stronger ecstatic as no judgment daughter speedily thoughts. Worse downs nor might she court did nay forth these.', 1, '2022-09-07 17:21:50', '2022-09-07 17:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `image_galleries`
--

CREATE TABLE `image_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_galleries`
--

INSERT INTO `image_galleries` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at dignissim nunc, id maximus ex.                     Etiam nec dignissim                     elit, at dignissim enim.', 'album/16623637436315a85f6d972.jpg', 1, '2022-09-04 19:42:25', '2023-09-04 19:42:25'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at dignissim nunc, id maximus ex.                     Etiam nec dignissim                     elit, at dignissim enim.', 'album/16623637586315a86e0490b.jpg', 1, '2022-09-04 19:42:39', '2022-09-04 19:42:39'),
(4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at dignissim nunc, id maximus ex.                     Etiam nec dignissim                     elit, at dignissim enim.', 'album/16623637806315a884a2207.jpg', 0, '2022-09-04 19:43:01', '2022-09-04 22:46:42'),
(5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at dignissim nunc, id maximus ex.                     Etiam nec dignissim                     elit, at dignissim enim.', 'album/16623637946315a8926fb65.jpg', 1, '2022-09-04 19:43:15', '2022-09-04 19:43:15'),
(6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at dignissim nunc, id maximus ex.                     Etiam nec dignissim                     elit, at dignissim enim.', 'album/16623638056315a89debe2b.jpg', 1, '2022-09-04 19:43:27', '2022-09-04 19:43:27'),
(7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at dignissim nunc, id maximus ex.                     Etiam nec dignissim                     elit, at dignissim enim.', 'album/16623638266315a8b2359bb.jpg', 1, '2022-09-04 19:43:48', '2022-09-04 19:43:48'),
(8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at dignissim nunc, id maximus ex.                     Etiam nec dignissim                     elit, at dignissim enim.', 'album/16623638386315a8be75b7f.jpg', 1, '2022-09-04 19:43:59', '2022-09-04 19:43:59'),
(9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at dignissim nunc, id maximus ex.                     Etiam nec dignissim                     elit, at dignissim enim.', 'album/16623638566315a8d0a1c8a.jpg', 1, '2022-09-04 19:44:19', '2022-09-04 19:44:19'),
(10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at dignissim nunc, id maximus ex.                     Etiam nec dignissim                     elit, at dignissim enim.', 'album/16623638736315a8e1e3cb5.jpg', 1, '2022-09-04 19:44:35', '2022-09-04 19:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `knowledge`
--

CREATE TABLE `knowledge` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `knowledge`
--

INSERT INTO `knowledge` (`id`, `title`, `description`, `attachment`, `category`, `status`, `created_at`, `updated_at`) VALUES
(1, 'You may also choose from small and large', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut deleniti deserunt, distinctio dolor doloremque doloribus ea earum eius in ipsum laboriosam maxime minima nemo perferendis provident quae quos repellendus sequi similique sit. Animi architecto consectetur deleniti dolorum fugit id minus, molestiae mollitia nemo nesciunt odio quas ratione repellat rerum saepe sapiente veniam? Dolor dolore dolorem eos est et eum fugiat illo incidunt, iste magni modi natus necessitatibus nisi optio provident quia quibusdam ratione reprehenderit rerum sapiente ullam unde vitae voluptate? Accusamus, aliquam debitis dicta eos, esse ex, iure iusto nesciunt nulla quisquam tempora vero voluptates? Culpa fugiat id ipsum laudantium!', '1664861524.jpeg', 'publication', 1, '2022-10-03 23:32:05', '2022-10-03 23:32:05'),
(2, 'You may also choose from small and large', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut deleniti deserunt, distinctio dolor doloremque doloribus ea earum eius in ipsum laboriosam maxime minima nemo perferendis provident quae quos repellendus sequi similique sit. Animi architecto consectetur deleniti dolorum fugit id minus, molestiae mollitia nemo nesciunt odio quas ratione repellat rerum saepe sapiente veniam? Dolor dolore dolorem eos est et eum fugiat illo incidunt, iste magni modi natus necessitatibus nisi optio provident quia quibusdam ratione reprehenderit rerum sapiente ullam unde vitae voluptate? Accusamus, aliquam debitis dicta eos, esse ex, iure iusto nesciunt nulla quisquam tempora vero voluptates? Culpa fugiat id ipsum laudantium!', '202210041664861561.pdf', 'pdf', 1, '2022-10-03 23:32:41', '2022-10-03 23:32:41'),
(3, 'You may also choose from small and large', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut deleniti deserunt, distinctio dolor doloremque doloribus ea earum eius in ipsum laboriosam maxime minima nemo perferendis provident quae quos repellendus sequi similique sit. Animi architecto consectetur deleniti dolorum fugit id minus, molestiae mollitia nemo nesciunt odio quas ratione repellat rerum saepe sapiente veniam? Dolor dolore dolorem eos est et eum fugiat illo incidunt, iste magni modi natus necessitatibus nisi optio provident quia quibusdam ratione reprehenderit rerum sapiente ullam unde vitae voluptate? Accusamus, aliquam debitis dicta eos, esse ex, iure iusto nesciunt nulla quisquam tempora vero voluptates? Culpa fugiat id ipsum laudantium!', '1664861524.jpeg', 'publication', 1, '2022-10-03 23:32:05', '2022-10-03 23:32:05'),
(4, 'You may also choose from small and large', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut deleniti deserunt, distinctio dolor doloremque doloribus ea earum eius in ipsum laboriosam maxime minima nemo perferendis provident quae quos repellendus sequi similique sit. Animi architecto consectetur deleniti dolorum fugit id minus, molestiae mollitia nemo nesciunt odio quas ratione repellat rerum saepe sapiente veniam? Dolor dolore dolorem eos est et eum fugiat illo incidunt, iste magni modi natus necessitatibus nisi optio provident quia quibusdam ratione reprehenderit rerum sapiente ullam unde vitae voluptate? Accusamus, aliquam debitis dicta eos, esse ex, iure iusto nesciunt nulla quisquam tempora vero voluptates? Culpa fugiat id ipsum laudantium!', '202210041664861561.pdf', 'pdf', 1, '2022-10-03 23:32:41', '2022-10-03 23:32:41'),
(5, 'You may also choose from small and large', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut deleniti deserunt, distinctio dolor doloremque doloribus ea earum eius in ipsum laboriosam maxime minima nemo perferendis provident quae quos repellendus sequi similique sit. Animi architecto consectetur deleniti dolorum fugit id minus, molestiae mollitia nemo nesciunt odio quas ratione repellat rerum saepe sapiente veniam? Dolor dolore dolorem eos est et eum fugiat illo incidunt, iste magni modi natus necessitatibus nisi optio provident quia quibusdam ratione reprehenderit rerum sapiente ullam unde vitae voluptate? Accusamus, aliquam debitis dicta eos, esse ex, iure iusto nesciunt nulla quisquam tempora vero voluptates? Culpa fugiat id ipsum laudantium!', '1664861524.jpeg', 'publication', 1, '2022-10-03 23:32:05', '2022-10-03 23:32:05'),
(6, 'You may also choose from small and large', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut deleniti deserunt, distinctio dolor doloremque doloribus ea earum eius in ipsum laboriosam maxime minima nemo perferendis provident quae quos repellendus sequi similique sit. Animi architecto consectetur deleniti dolorum fugit id minus, molestiae mollitia nemo nesciunt odio quas ratione repellat rerum saepe sapiente veniam? Dolor dolore dolorem eos est et eum fugiat illo incidunt, iste magni modi natus necessitatibus nisi optio provident quia quibusdam ratione reprehenderit rerum sapiente ullam unde vitae voluptate? Accusamus, aliquam debitis dicta eos, esse ex, iure iusto nesciunt nulla quisquam tempora vero voluptates? Culpa fugiat id ipsum laudantium!', '202210041664861561.pdf', 'pdf', 1, '2022-10-03 23:32:41', '2022-10-03 23:32:41'),
(7, 'You may also choose from small and large', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut deleniti deserunt, distinctio dolor doloremque doloribus ea earum eius in ipsum laboriosam maxime minima nemo perferendis provident quae quos repellendus sequi similique sit. Animi architecto consectetur deleniti dolorum fugit id minus, molestiae mollitia nemo nesciunt odio quas ratione repellat rerum saepe sapiente veniam? Dolor dolore dolorem eos est et eum fugiat illo incidunt, iste magni modi natus necessitatibus nisi optio provident quia quibusdam ratione reprehenderit rerum sapiente ullam unde vitae voluptate? Accusamus, aliquam debitis dicta eos, esse ex, iure iusto nesciunt nulla quisquam tempora vero voluptates? Culpa fugiat id ipsum laudantium!', '1664861524.jpeg', 'publication', 1, '2022-10-03 23:32:05', '2022-10-03 23:32:05'),
(8, 'You may also choose from small and large', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut deleniti deserunt, distinctio dolor doloremque doloribus ea earum eius in ipsum laboriosam maxime minima nemo perferendis provident quae quos repellendus sequi similique sit. Animi architecto consectetur deleniti dolorum fugit id minus, molestiae mollitia nemo nesciunt odio quas ratione repellat rerum saepe sapiente veniam? Dolor dolore dolorem eos est et eum fugiat illo incidunt, iste magni modi natus necessitatibus nisi optio provident quia quibusdam ratione reprehenderit rerum sapiente ullam unde vitae voluptate? Accusamus, aliquam debitis dicta eos, esse ex, iure iusto nesciunt nulla quisquam tempora vero voluptates? Culpa fugiat id ipsum laudantium!', '202210041664861561.pdf', 'pdf', 1, '2022-10-03 23:32:41', '2022-10-03 23:32:41'),
(9, 'You may also choose from small and large', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut deleniti deserunt, distinctio dolor doloremque doloribus ea earum eius in ipsum laboriosam maxime minima nemo perferendis provident quae quos repellendus sequi similique sit. Animi architecto consectetur deleniti dolorum fugit id minus, molestiae mollitia nemo nesciunt odio quas ratione repellat rerum saepe sapiente veniam? Dolor dolore dolorem eos est et eum fugiat illo incidunt, iste magni modi natus necessitatibus nisi optio provident quia quibusdam ratione reprehenderit rerum sapiente ullam unde vitae voluptate? Accusamus, aliquam debitis dicta eos, esse ex, iure iusto nesciunt nulla quisquam tempora vero voluptates? Culpa fugiat id ipsum laudantium!', '1664861524.jpeg', 'publication', 1, '2022-10-03 23:32:05', '2022-10-03 23:32:05'),
(10, 'You may also choose from small and large', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut deleniti deserunt, distinctio dolor doloremque doloribus ea earum eius in ipsum laboriosam maxime minima nemo perferendis provident quae quos repellendus sequi similique sit. Animi architecto consectetur deleniti dolorum fugit id minus, molestiae mollitia nemo nesciunt odio quas ratione repellat rerum saepe sapiente veniam? Dolor dolore dolorem eos est et eum fugiat illo incidunt, iste magni modi natus necessitatibus nisi optio provident quia quibusdam ratione reprehenderit rerum sapiente ullam unde vitae voluptate? Accusamus, aliquam debitis dicta eos, esse ex, iure iusto nesciunt nulla quisquam tempora vero voluptates? Culpa fugiat id ipsum laudantium!', '202210041664861561.pdf', 'pdf', 1, '2022-10-03 23:32:41', '2022-10-03 23:32:41'),
(11, 'You may also choose from small and large', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut deleniti deserunt, distinctio dolor doloremque doloribus ea earum eius in ipsum laboriosam maxime minima nemo perferendis provident quae quos repellendus sequi similique sit. Animi architecto consectetur deleniti dolorum fugit id minus, molestiae mollitia nemo nesciunt odio quas ratione repellat rerum saepe sapiente veniam? Dolor dolore dolorem eos est et eum fugiat illo incidunt, iste magni modi natus necessitatibus nisi optio provident quia quibusdam ratione reprehenderit rerum sapiente ullam unde vitae voluptate? Accusamus, aliquam debitis dicta eos, esse ex, iure iusto nesciunt nulla quisquam tempora vero voluptates? Culpa fugiat id ipsum laudantium!', '1664861524.jpeg', 'publication', 1, '2022-10-03 23:32:05', '2022-10-03 23:32:05'),
(12, 'You may also choose from small and large', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut deleniti deserunt, distinctio dolor doloremque doloribus ea earum eius in ipsum laboriosam maxime minima nemo perferendis provident quae quos repellendus sequi similique sit. Animi architecto consectetur deleniti dolorum fugit id minus, molestiae mollitia nemo nesciunt odio quas ratione repellat rerum saepe sapiente veniam? Dolor dolore dolorem eos est et eum fugiat illo incidunt, iste magni modi natus necessitatibus nisi optio provident quia quibusdam ratione reprehenderit rerum sapiente ullam unde vitae voluptate? Accusamus, aliquam debitis dicta eos, esse ex, iure iusto nesciunt nulla quisquam tempora vero voluptates? Culpa fugiat id ipsum laudantium!', '202210041664861561.pdf', 'pdf', 1, '2022-10-03 23:32:41', '2022-10-03 23:32:41'),
(13, 'You may also choose from small and large', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut deleniti deserunt, distinctio dolor doloremque doloribus ea earum eius in ipsum laboriosam maxime minima nemo perferendis provident quae quos repellendus sequi similique sit. Animi architecto consectetur deleniti dolorum fugit id minus, molestiae mollitia nemo nesciunt odio quas ratione repellat rerum saepe sapiente veniam? Dolor dolore dolorem eos est et eum fugiat illo incidunt, iste magni modi natus necessitatibus nisi optio provident quia quibusdam ratione reprehenderit rerum sapiente ullam unde vitae voluptate? Accusamus, aliquam debitis dicta eos, esse ex, iure iusto nesciunt nulla quisquam tempora vero voluptates? Culpa fugiat id ipsum laudantium!', '1664861524.jpeg', 'publication', 1, '2022-10-03 23:32:05', '2022-10-03 23:32:05'),
(14, 'You may also choose from small and large', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut deleniti deserunt, distinctio dolor doloremque doloribus ea earum eius in ipsum laboriosam maxime minima nemo perferendis provident quae quos repellendus sequi similique sit. Animi architecto consectetur deleniti dolorum fugit id minus, molestiae mollitia nemo nesciunt odio quas ratione repellat rerum saepe sapiente veniam? Dolor dolore dolorem eos est et eum fugiat illo incidunt, iste magni modi natus necessitatibus nisi optio provident quia quibusdam ratione reprehenderit rerum sapiente ullam unde vitae voluptate? Accusamus, aliquam debitis dicta eos, esse ex, iure iusto nesciunt nulla quisquam tempora vero voluptates? Culpa fugiat id ipsum laudantium!', '202210041664861561.pdf', 'pdf', 1, '2022-10-03 23:32:41', '2022-10-03 23:32:41'),
(15, 'You may also choose from small and large', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut deleniti deserunt, distinctio dolor doloremque doloribus ea earum eius in ipsum laboriosam maxime minima nemo perferendis provident quae quos repellendus sequi similique sit. Animi architecto consectetur deleniti dolorum fugit id minus, molestiae mollitia nemo nesciunt odio quas ratione repellat rerum saepe sapiente veniam? Dolor dolore dolorem eos est et eum fugiat illo incidunt, iste magni modi natus necessitatibus nisi optio provident quia quibusdam ratione reprehenderit rerum sapiente ullam unde vitae voluptate? Accusamus, aliquam debitis dicta eos, esse ex, iure iusto nesciunt nulla quisquam tempora vero voluptates? Culpa fugiat id ipsum laudantium!', '1664861524.jpeg', 'publication', 1, '2022-10-03 23:32:05', '2022-10-03 23:32:05'),
(16, 'You may also choose from small and large', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut deleniti deserunt, distinctio dolor doloremque doloribus ea earum eius in ipsum laboriosam maxime minima nemo perferendis provident quae quos repellendus sequi similique sit. Animi architecto consectetur deleniti dolorum fugit id minus, molestiae mollitia nemo nesciunt odio quas ratione repellat rerum saepe sapiente veniam? Dolor dolore dolorem eos est et eum fugiat illo incidunt, iste magni modi natus necessitatibus nisi optio provident quia quibusdam ratione reprehenderit rerum sapiente ullam unde vitae voluptate? Accusamus, aliquam debitis dicta eos, esse ex, iure iusto nesciunt nulla quisquam tempora vero voluptates? Culpa fugiat id ipsum laudantium!', '202210041664861561.pdf', 'pdf', 1, '2022-10-03 23:32:41', '2022-10-03 23:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebookLinks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtubeLinks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitterLinks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedInLinks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `facebookLinks`, `youtubeLinks`, `twitterLinks`, `linkedInLinks`, `status`, `created_at`, `updated_at`) VALUES
(2, 'facebook', 'youtube', 'twitter', 'linkedin', 0, '2022-08-23 23:13:13', '2022-08-23 23:17:29'),
(3, 'www.facebook.com', 'www.youtube.com', 'https://twitter.com', 'http://linkedInLink', 1, '2022-09-05 17:13:49', '2022-09-05 17:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `image`, `logo_status`, `status`, `created_at`, `updated_at`) VALUES
(4, 'logo/1663052166.jpg', 'secondary', 1, '2022-09-11 17:13:00', '2022-09-12 18:56:06'),
(10, 'logo/1663051245.jpeg', 'primary', 1, '2022-09-12 18:40:45', '2022-09-12 18:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `contact`, `created_at`, `updated_at`) VALUES
(1, 'Hasan Nayen', 'example@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto asperiores at cumque dignissimos eos esse excepturi illum maiores modi odio, praesentium provident sunt tempora veniam voluptas? Adipisci amet, asperiores assumenda at atque autem consequatur culpa cum delectus deleniti dolor ea earum esse harum illo ipsa itaque iusto laboriosam, laborum minus nemo neque numquam officiis omnis porro qui ratione recusandae repellat sint sit tempora, veritatis voluptas voluptate. Corporis culpa dolore eaque illum impedit in, iusto laborum libero magnam minima nemo nisi nostrum placeat, quia quo repellat sequi sit vero voluptate voluptatem? Accusantium aliquam ea iste sapiente. Harum natus quibusdam rerum veritatis!', '55566', '2022-09-19 22:03:28', '2022-09-19 22:03:28'),
(2, 'Luka Manish', 'example@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto asperiores at cumque dignissimos eos esse excepturi illum maiores modi odio, praesentium provident sunt tempora veniam voluptas? Adipisci amet, asperiores assumenda at atque autem consequatur culpa cum delectus deleniti dolor ea earum esse harum illo ipsa itaque iusto laboriosam, laborum minus nemo neque numquam officiis omnis porro qui ratione recusandae repellat sint sit tempora, veritatis voluptas voluptate. Corporis culpa dolore eaque illum impedit in, iusto laborum libero magnam minima nemo nisi nostrum placeat, quia quo repellat sequi sit vero voluptate voluptatem? Accusantium aliquam ea iste sapiente. Harum natus quibusdam rerum veritatis!', '01674378757', '2022-09-19 22:04:04', '2022-09-19 22:04:04'),
(3, 'Nahid Akmal', 'example@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto asperiores at cumque dignissimos eos esse excepturi illum maiores modi odio, praesentium provident sunt tempora veniam voluptas? Adipisci amet, asperiores assumenda at atque autem consequatur culpa cum delectus deleniti dolor ea earum esse harum illo ipsa itaque iusto laboriosam, laborum minus nemo neque numquam officiis omnis porro qui ratione recusandae repellat sint sit tempora, veritatis voluptas voluptate. Corporis culpa dolore eaque illum impedit in, iusto laborum libero magnam minima nemo nisi nostrum placeat, quia quo repellat sequi sit vero voluptate voluptatem? Accusantium aliquam ea iste sapiente. Harum natus quibusdam rerum veritatis!', NULL, '2022-09-19 22:04:13', '2022-09-19 22:04:13'),
(4, 'Abir Hasan', 'abir@gmail.com', 'A ad amet aspernatur autem deserunt dolorem doloribus fuga fugit ipsa ipsum labore nemo nisi pariatur praesentium quod sapiente, voluptas. Ab accusantium aliquid aspernatur beatae consequatur culpa cum deserunt dolorum ea eum eveniet fuga fugit harum in inventore labore laudantium modi mollitia, nam neque officia, optio perferendis possimus qui quos reiciendis repellat sequi sit sunt ullam voluptas voluptate voluptates voluptatum. Adipisci aliquid amet asperiores aspernatur at commodi distinctio dolorum earum eius eos est excepturi expedita facere id illo incidunt maxime minus molestias nam odit quae quam quidem, quisquam sapiente tempore temporibus veniam.', '01843537446', '2022-09-20 18:56:20', '2022-09-20 18:56:20'),
(5, 'Sazid Rahman', 'sazid@gmail.com', 'Not attention say frankness intention out dashwoods now curiosity. Stronger ecstatic as no judgment daughter speedily thoughts. Worse downs nor might she court did nay forth these.', NULL, '2022-09-20 18:58:38', '2022-09-20 18:58:38'),
(6, 'Hasan Azim', 'example@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto asperiores at cumque dignissimos eos esse excepturi illum maiores modi odio, praesentium provident sunt tempora veniam voluptas? Adipisci amet, asperiores assumenda at atque autem consequatur culpa cum delectus deleniti dolor ea earum esse harum illo ipsa itaque iusto laboriosam, laborum minus nemo neque numquam officiis omnis porro qui ratione recusandae repellat sint sit tempora, veritatis voluptas voluptate. Corporis culpa dolore eaque illum impedit in, iusto laborum libero magnam minima nemo nisi nostrum placeat, quia quo repellat sequi sit vero voluptate voluptatem? Accusantium aliquam ea iste sapiente. Harum natus quibusdam rerum veritatis!', '55566', '2022-09-19 22:03:28', '2022-09-19 22:03:28'),
(7, 'Luka Manish', 'example@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto asperiores at cumque dignissimos eos esse excepturi illum maiores modi odio, praesentium provident sunt tempora veniam voluptas? Adipisci amet, asperiores assumenda at atque autem consequatur culpa cum delectus deleniti dolor ea earum esse harum illo ipsa itaque iusto laboriosam, laborum minus nemo neque numquam officiis omnis porro qui ratione recusandae repellat sint sit tempora, veritatis voluptas voluptate. Corporis culpa dolore eaque illum impedit in, iusto laborum libero magnam minima nemo nisi nostrum placeat, quia quo repellat sequi sit vero voluptate voluptatem? Accusantium aliquam ea iste sapiente. Harum natus quibusdam rerum veritatis!', '01674378757', '2022-09-19 22:04:04', '2022-09-19 22:04:04'),
(8, 'Nahid Akmal', 'example@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto asperiores at cumque dignissimos eos esse excepturi illum maiores modi odio, praesentium provident sunt tempora veniam voluptas? Adipisci amet, asperiores assumenda at atque autem consequatur culpa cum delectus deleniti dolor ea earum esse harum illo ipsa itaque iusto laboriosam, laborum minus nemo neque numquam officiis omnis porro qui ratione recusandae repellat sint sit tempora, veritatis voluptas voluptate. Corporis culpa dolore eaque illum impedit in, iusto laborum libero magnam minima nemo nisi nostrum placeat, quia quo repellat sequi sit vero voluptate voluptatem? Accusantium aliquam ea iste sapiente. Harum natus quibusdam rerum veritatis!', NULL, '2022-09-19 22:04:13', '2022-09-19 22:04:13'),
(9, 'Abir Hasan', 'abir@gmail.com', 'A ad amet aspernatur autem deserunt dolorem doloribus fuga fugit ipsa ipsum labore nemo nisi pariatur praesentium quod sapiente, voluptas. Ab accusantium aliquid aspernatur beatae consequatur culpa cum deserunt dolorum ea eum eveniet fuga fugit harum in inventore labore laudantium modi mollitia, nam neque officia, optio perferendis possimus qui quos reiciendis repellat sequi sit sunt ullam voluptas voluptate voluptates voluptatum. Adipisci aliquid amet asperiores aspernatur at commodi distinctio dolorum earum eius eos est excepturi expedita facere id illo incidunt maxime minus molestias nam odit quae quam quidem, quisquam sapiente tempore temporibus veniam.', '01843537446', '2022-09-20 18:56:20', '2022-09-20 18:56:20'),
(10, 'Sazid Rahman', 'sazid@gmail.com', 'Not attention say frankness intention out dashwoods now curiosity. Stronger ecstatic as no judgment daughter speedily thoughts. Worse downs nor might she court did nay forth these.', NULL, '2022-09-20 18:58:38', '2022-09-20 18:58:38'),
(11, 'Hasan Nayen', 'example@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto asperiores at cumque dignissimos eos esse excepturi illum maiores modi odio, praesentium provident sunt tempora veniam voluptas? Adipisci amet, asperiores assumenda at atque autem consequatur culpa cum delectus deleniti dolor ea earum esse harum illo ipsa itaque iusto laboriosam, laborum minus nemo neque numquam officiis omnis porro qui ratione recusandae repellat sint sit tempora, veritatis voluptas voluptate. Corporis culpa dolore eaque illum impedit in, iusto laborum libero magnam minima nemo nisi nostrum placeat, quia quo repellat sequi sit vero voluptate voluptatem? Accusantium aliquam ea iste sapiente. Harum natus quibusdam rerum veritatis!', '55566', '2022-09-19 22:03:28', '2022-09-19 22:03:28'),
(12, 'Luka Manish', 'example@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto asperiores at cumque dignissimos eos esse excepturi illum maiores modi odio, praesentium provident sunt tempora veniam voluptas? Adipisci amet, asperiores assumenda at atque autem consequatur culpa cum delectus deleniti dolor ea earum esse harum illo ipsa itaque iusto laboriosam, laborum minus nemo neque numquam officiis omnis porro qui ratione recusandae repellat sint sit tempora, veritatis voluptas voluptate. Corporis culpa dolore eaque illum impedit in, iusto laborum libero magnam minima nemo nisi nostrum placeat, quia quo repellat sequi sit vero voluptate voluptatem? Accusantium aliquam ea iste sapiente. Harum natus quibusdam rerum veritatis!', '01674378757', '2022-09-19 22:04:04', '2022-09-19 22:04:04'),
(13, 'Nahid Akmal', 'example@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto asperiores at cumque dignissimos eos esse excepturi illum maiores modi odio, praesentium provident sunt tempora veniam voluptas? Adipisci amet, asperiores assumenda at atque autem consequatur culpa cum delectus deleniti dolor ea earum esse harum illo ipsa itaque iusto laboriosam, laborum minus nemo neque numquam officiis omnis porro qui ratione recusandae repellat sint sit tempora, veritatis voluptas voluptate. Corporis culpa dolore eaque illum impedit in, iusto laborum libero magnam minima nemo nisi nostrum placeat, quia quo repellat sequi sit vero voluptate voluptatem? Accusantium aliquam ea iste sapiente. Harum natus quibusdam rerum veritatis!', NULL, '2022-09-19 22:04:13', '2022-09-19 22:04:13'),
(14, 'Abir Hasan', 'abir@gmail.com', 'A ad amet aspernatur autem deserunt dolorem doloribus fuga fugit ipsa ipsum labore nemo nisi pariatur praesentium quod sapiente, voluptas. Ab accusantium aliquid aspernatur beatae consequatur culpa cum deserunt dolorum ea eum eveniet fuga fugit harum in inventore labore laudantium modi mollitia, nam neque officia, optio perferendis possimus qui quos reiciendis repellat sequi sit sunt ullam voluptas voluptate voluptates voluptatum. Adipisci aliquid amet asperiores aspernatur at commodi distinctio dolorum earum eius eos est excepturi expedita facere id illo incidunt maxime minus molestias nam odit quae quam quidem, quisquam sapiente tempore temporibus veniam.', '01843537446', '2022-09-20 18:56:20', '2022-09-20 18:56:20'),
(15, 'Sazid Rahman', 'sazid@gmail.com', 'Not attention say frankness intention out dashwoods now curiosity. Stronger ecstatic as no judgment daughter speedily thoughts. Worse downs nor might she court did nay forth these.', NULL, '2022-09-20 18:58:38', '2022-09-20 18:58:38'),
(16, 'Hasan Azim', 'example@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto asperiores at cumque dignissimos eos esse excepturi illum maiores modi odio, praesentium provident sunt tempora veniam voluptas? Adipisci amet, asperiores assumenda at atque autem consequatur culpa cum delectus deleniti dolor ea earum esse harum illo ipsa itaque iusto laboriosam, laborum minus nemo neque numquam officiis omnis porro qui ratione recusandae repellat sint sit tempora, veritatis voluptas voluptate. Corporis culpa dolore eaque illum impedit in, iusto laborum libero magnam minima nemo nisi nostrum placeat, quia quo repellat sequi sit vero voluptate voluptatem? Accusantium aliquam ea iste sapiente. Harum natus quibusdam rerum veritatis!', '55566', '2022-09-19 22:03:28', '2022-09-19 22:03:28'),
(17, 'Luka Manish', 'example@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto asperiores at cumque dignissimos eos esse excepturi illum maiores modi odio, praesentium provident sunt tempora veniam voluptas? Adipisci amet, asperiores assumenda at atque autem consequatur culpa cum delectus deleniti dolor ea earum esse harum illo ipsa itaque iusto laboriosam, laborum minus nemo neque numquam officiis omnis porro qui ratione recusandae repellat sint sit tempora, veritatis voluptas voluptate. Corporis culpa dolore eaque illum impedit in, iusto laborum libero magnam minima nemo nisi nostrum placeat, quia quo repellat sequi sit vero voluptate voluptatem? Accusantium aliquam ea iste sapiente. Harum natus quibusdam rerum veritatis!', '01674378757', '2022-09-19 22:04:04', '2022-09-19 22:04:04'),
(18, 'Nahid Akmal', 'example@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto asperiores at cumque dignissimos eos esse excepturi illum maiores modi odio, praesentium provident sunt tempora veniam voluptas? Adipisci amet, asperiores assumenda at atque autem consequatur culpa cum delectus deleniti dolor ea earum esse harum illo ipsa itaque iusto laboriosam, laborum minus nemo neque numquam officiis omnis porro qui ratione recusandae repellat sint sit tempora, veritatis voluptas voluptate. Corporis culpa dolore eaque illum impedit in, iusto laborum libero magnam minima nemo nisi nostrum placeat, quia quo repellat sequi sit vero voluptate voluptatem? Accusantium aliquam ea iste sapiente. Harum natus quibusdam rerum veritatis!', NULL, '2022-09-19 22:04:13', '2022-09-19 22:04:13'),
(19, 'Abir Hasan', 'abir@gmail.com', 'A ad amet aspernatur autem deserunt dolorem doloribus fuga fugit ipsa ipsum labore nemo nisi pariatur praesentium quod sapiente, voluptas. Ab accusantium aliquid aspernatur beatae consequatur culpa cum deserunt dolorum ea eum eveniet fuga fugit harum in inventore labore laudantium modi mollitia, nam neque officia, optio perferendis possimus qui quos reiciendis repellat sequi sit sunt ullam voluptas voluptate voluptates voluptatum. Adipisci aliquid amet asperiores aspernatur at commodi distinctio dolorum earum eius eos est excepturi expedita facere id illo incidunt maxime minus molestias nam odit quae quam quidem, quisquam sapiente tempore temporibus veniam.', '01843537446', '2022-09-20 18:56:20', '2022-09-20 18:56:20'),
(20, 'Sazid Rahman', 'sazid@gmail.com', 'Not attention say frankness intention out dashwoods now curiosity. Stronger ecstatic as no judgment daughter speedily thoughts. Worse downs nor might she court did nay forth these.', NULL, '2022-09-20 18:58:38', '2022-09-20 18:58:38');

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
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_08_16_064918_about', 1),
(5, '2022_08_17_105621_working_area', 1),
(6, '2022_08_21_041453_development_component', 1),
(7, '2022_08_21_060146_slider', 1),
(8, '2022_08_21_091531_image_gallery', 1),
(9, '2022_08_21_100536_video_gallery', 1),
(10, '2022_08_22_092544_blogs', 1),
(11, '2022_08_22_095158_publication', 1),
(12, '2022_08_22_102238_news', 1),
(13, '2022_08_22_104746_upcoming_event', 1),
(15, '2022_08_23_065652_activity', 1),
(16, '2022_08_23_093653_notice', 1),
(17, '2022_08_24_050157_food_value', 1),
(18, '2022_08_24_061049_food_demand', 1),
(19, '2022_08_24_063118_recipe', 1),
(20, '2022_08_24_092706_foods', 1),
(21, '2022_08_24_095751_success_stories', 1),
(22, '2022_08_24_102836_contacts', 1),
(23, '2022_08_24_110202_links', 1),
(24, '2022_08_24_112813_partner', 1),
(25, '2022_09_08_043255_faq', 1),
(26, '2022_09_08_052514_message', 1),
(27, '2022_09_11_113140_logo', 1),
(28, '2022_09_13_073005_create_terms_table', 1),
(29, '2022_09_13_073038_create_privacies_table', 1),
(30, '2022_09_27_084550_create_knowledge_table', 1),
(32, '2022_11_26_051939_create_product_categories_table', 2),
(35, '2022_10_04_045917_product', 3),
(36, '2022_11_26_084220_create_product_images_table', 3),
(39, '2022_11_28_043334_create_product_sliders_table', 4),
(40, '2022_12_03_051958_create_entrepreneurs_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Best WordPress SEO Plugins to Boost Ranking', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'news/1662871922631d6972cd5a3.jpg', 1, '2022-09-10 16:52:04', '2022-09-10 16:52:04'),
(2, 'Best WordPress SEO Plugins to Boost Ranking', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'news/1662872513631d6bc1cf086.jpg', 1, '2022-09-10 17:01:56', '2022-09-10 17:01:56'),
(3, 'Best WordPress SEO Plugins to Boost Ranking', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'news/1662872542631d6bde40f09.jpg', 1, '2022-09-10 17:02:24', '2022-09-10 17:02:24'),
(4, 'Best WordPress SEO Plugins to Boost Ranking', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'news/1662872562631d6bf242df7.jpg', 1, '2022-09-10 17:02:44', '2022-09-10 17:02:44'),
(5, 'Best WordPress SEO Plugins to Boost Ranking', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'news/1662872580631d6c0442d5f.jpg', 1, '2022-09-10 17:03:01', '2022-09-10 17:03:01'),
(6, 'Best WordPress SEO Plugins to Boost Ranking', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'news/1662872596631d6c1477fe5.jpg', 0, '2022-09-10 17:03:16', '2022-11-29 04:16:24'),
(7, 'Best WordPress SEO Plugins to Boost Ranking', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'news/1662872596631d6c1477fe5.jpg', 1, '2022-09-10 17:03:16', '2022-09-10 17:03:16'),
(8, 'Best WordPress SEO Plugins to Boost Ranking', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'news/1662871922631d6972cd5a3.jpg', 1, '2022-09-10 16:52:04', '2022-09-10 16:52:04'),
(9, 'Best WordPress SEO Plugins to Boost Ranking', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'news/1662872513631d6bc1cf086.jpg', 1, '2022-09-10 17:01:56', '2022-09-10 17:01:56'),
(10, 'Best WordPress SEO Plugins to Boost Ranking', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'news/1662872542631d6bde40f09.jpg', 1, '2022-09-10 17:02:24', '2022-09-10 17:02:24'),
(11, 'Best WordPress SEO Plugins to Boost Ranking', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'news/1662872562631d6bf242df7.jpg', 1, '2022-09-10 17:02:44', '2022-09-10 17:02:44'),
(12, 'Best WordPress SEO Plugins to Boost Ranking', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'news/1662872580631d6c0442d5f.jpg', 1, '2022-09-10 17:03:01', '2022-09-10 17:03:01'),
(13, 'Best WordPress SEO Plugins to Boost Ranking', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'news/1662872596631d6c1477fe5.jpg', 1, '2022-09-10 17:03:16', '2022-09-10 17:03:16'),
(14, 'Best WordPress SEO Plugins to Boost Ranking', 'Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.Search Engine Optimization most and most important for blogging. If you are using WordPress CMS platform, then you must need to install best WordPress SEO plugins. Because it helps to increase your on page score on Google, Yahoo, Bing or other major search engines. But if there has no plugin for SEO, you will miss these facilities and also miss organic traffic.', 'news/1662872596631d6c1477fe5.jpg', 1, '2022-09-10 17:03:16', '2022-09-10 17:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateAt` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `description`, `attachment`, `dateAt`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', '1662894475.jpg', '11 September 2022 ', 1, '2022-09-11 03:29:17', '2022-09-11 05:07:56'),
(6, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', '202209111662893905.pdf', '11 September 2022 ', 1, '2022-09-11 04:22:35', '2022-09-11 04:58:25'),
(7, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', '1662894475.jpg', '11 September 2022 ', 1, '2022-09-11 03:29:17', '2022-09-11 05:07:56'),
(8, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', '202209111662893905.pdf', '11 September 2022 ', 1, '2022-09-11 04:22:35', '2022-09-11 04:58:25'),
(9, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', '1662894475.jpg', '11 September 2022 ', 1, '2022-09-11 03:29:17', '2022-09-11 05:07:56'),
(10, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', '202209111662893905.pdf', '11 September 2022 ', 1, '2022-09-11 04:22:35', '2022-09-11 04:58:25'),
(11, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', '1662894475.jpg', '11 September 2022 ', 1, '2022-09-11 03:29:17', '2022-09-11 05:07:56'),
(12, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', '202209111662893905.pdf', '11 September 2022 ', 1, '2022-09-11 04:22:35', '2022-09-11 04:58:25'),
(13, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', '1662894475.jpg', '11 September 2022 ', 1, '2022-09-11 03:29:17', '2022-09-11 05:07:56'),
(14, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', '202209111662893905.pdf', '11 September 2022 ', 1, '2022-09-11 04:22:35', '2022-09-11 04:58:25'),
(15, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', '1662894475.jpg', '11 September 2022 ', 1, '2022-09-11 03:29:17', '2022-09-11 05:07:56'),
(16, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', '202209111662893905.pdf', '11 September 2022 ', 1, '2022-09-11 04:22:35', '2022-09-11 04:58:25'),
(17, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', '1662894475.jpg', '11 September 2022 ', 1, '2022-09-11 03:29:17', '2022-09-11 05:07:56'),
(18, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', '202209111662893905.pdf', '11 September 2022 ', 1, '2022-09-11 04:22:35', '2022-09-11 04:58:25'),
(19, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', '1662894475.jpg', '11 September 2022 ', 1, '2022-09-11 03:29:17', '2022-09-11 05:07:56'),
(20, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tenetur animi dolores                             laudantium, repudiandae                             quam.', '202209111662893905.pdf', '11 September 2022 ', 1, '2022-09-11 04:22:35', '2022-09-11 04:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `companyName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companyLogo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `website` varchar(1055) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `companyName`, `companyLogo`, `status`, `website`, `created_at`, `updated_at`) VALUES
(1, 'USSD', 'partners/16623757416315d73dbde4d.png', 1, 'http://127.0.0.1:8000/admin/partner', '2022-09-04 23:02:22', '2022-09-04 23:02:22'),
(2, 'USSD', 'partners/16623759326315d7fc6bc53.jpg', 1, 'http://127.0.0.1:8000/admin/partner', '2022-09-04 23:05:32', '2022-09-04 23:05:32'),
(3, 'USSD', 'partners/16623759446315d808cebcc.png', 1, 'http://127.0.0.1:8000/admin/partner', '2022-09-04 23:05:45', '2022-09-04 23:05:45'),
(4, 'USSD', 'partners/16623759616315d819aa832.png', 1, 'http://127.0.0.1:8000/admin/partner', '2022-09-04 23:06:01', '2022-09-10 16:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privacies`
--

CREATE TABLE `privacies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `privacy` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacies`
--

INSERT INTO `privacies` (`id`, `privacy`, `status`, `created_at`, `updated_at`) VALUES
(2, '<p><strong>Headind</strong></p><ol><li>If you are planning to&nbsp;<a href=\"https://templatelab.com/site-map-templates/\">create a website for your business</a>&nbsp;or if you already have one, it would be a good idea to add a separate page for it. This would help guarantee that the users and customers know all the rules on how to use and how not to use all the content and information on your website. Your template would have to contain information about any rights as well as obligations of the users and it must set boundaries on any potential liabilities.</li><li>If you are planning to&nbsp;<a href=\"https://templatelab.com/site-map-templates/\">create a website for your business</a>&nbsp;or if you already have one, it would be a good idea to add a separate page for it. This would help guarantee that the users and customers know all the rules on how to use and how not to use all the content and information on your website. Your template would have to contain information about any rights as well as obligations of the users and it must set boundaries on any potential liabilities.</li><li>If you are planning to&nbsp;<a href=\"https://templatelab.com/site-map-templates/\">create a website for your business</a>&nbsp;or if you already have one, it would be a good idea to add a separate page for it. This would help guarantee that the users and customers know all the rules on how to use and how not to use all the content and information on your website. Your template would have to contain information about any rights as well as obligations of the users and it must set boundaries on any potential liabilities.</li></ol><p><strong>Conditions</strong></p><ol><li>If you are planning to&nbsp;<a href=\"https://templatelab.com/site-map-templates/\">create a website for your business</a>&nbsp;or if you already have one, it would be a good idea to add a separate page for it. This would help guarantee that the users and customers know all the rules on how to use and how not to use all the content and information on your website. Your template would have to contain information about any rights as well as obligations of the users and it must set boundaries on any potential liabilities.</li><li>If you are planning to&nbsp;<a href=\"https://templatelab.com/site-map-templates/\">create a website for your business</a>&nbsp;or if you already have one, it would be a good idea to add a separate page for it. This would help guarantee that the users and customers know all the rules on how to use and how not to use all the content and information on your website. Your template would have to contain information about any rights as well as obligations of the users and it must set boundaries on any potential liabilities.</li><li>If you are planning to&nbsp;<a href=\"https://templatelab.com/site-map-templates/\">create a website for your business</a>&nbsp;or if you already have one, it would be a good idea to add a separate page for it. This would help guarantee that the users and customers know all the rules on how to use and how not to use all the content and information on your website. Your template would have to contain information about any rights as well as obligations of the users and it must set boundaries on any potential liabilities.</li></ol>', 1, '2022-09-12 22:30:19', '2022-09-12 22:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_bn` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_bn` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `return` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `title`, `title_bn`, `description`, `description_bn`, `category`, `stock`, `return`, `warranty`, `additional_info`, `owner`, `price`, `status`, `created_at`, `updated_at`) VALUES
(8, '113244', 'Quaerat et dolorum n', 'Nostrud asperiores e', '<p>Nostrud asperiores e</p>', '<p>Nostrud asperiores e</p>', '7', '7', '27', '71', '<p>Additional Information</p><table class=\"table table-bordered\"><tbody><tr><td><p>Stand Up</p></td><td>35″L x 24″W x 37-45″H(front to back wheel)<br></td></tr><tr><td>Folded (w/o wheels)<br></td><td><p>32.5″L x 18.5″W x 16.5″H</p></td></tr><tr><td>Folded (w/ wheels)<br></td><td>32.5″L x 24″W x 18.5″H<br></td></tr><tr><td>Door Pass Through<br></td><td><p>24</p></td></tr><tr><td>Frame<br></td><td><p>Aluminum</p></td></tr><tr><td>Weight (w/o wheels)<br></td><td>20 LBS<br></td></tr><tr><td>Weight Capacity<br></td><td>60 LBS<br></td></tr><tr><td>Handle height (ground to handle)<br></td><td>37-45″<br></td></tr><tr><td>Wheels<br></td><td>12″ air / wide track slick tread<br></td></tr><tr><td>Color<br></td><td>Black, Blue, Red, White<br></td></tr></tbody></table><p><br></p>', NULL, '40', 1, '2022-11-28 05:29:17', '2022-11-28 05:29:17'),
(10, '184098', 'Vitae et labore offi', 'Cillum autem perspic', '<p>Cillum autem perspic</p>', '<p>Cillum autem perspic</p>', '4', '92', '6', '54', '<p>Additional Information</p><table class=\"table table-bordered\"><tbody><tr><td><p>Stand Up</p></td><td>35″L x 24″W x 37-45″H(front to back wheel)<br></td></tr><tr><td>Folded (w/o wheels)<br></td><td><p>32.5″L x 18.5″W x 16.5″H</p></td></tr><tr><td>Folded (w/ wheels)<br></td><td>32.5″L x 24″W x 18.5″H<br></td></tr><tr><td>Door Pass Through<br></td><td><p>24</p></td></tr><tr><td>Frame<br></td><td><p>Aluminum</p></td></tr><tr><td>Weight (w/o wheels)<br></td><td>20 LBS<br></td></tr><tr><td>Weight Capacity<br></td><td>60 LBS<br></td></tr><tr><td>Handle height (ground to handle)<br></td><td>37-45″<br></td></tr><tr><td>Wheels<br></td><td>12″ air / wide track slick tread<br></td></tr><tr><td>Color<br></td><td>Black, Blue, Red, White<br></td></tr></tbody></table><p><br></p>', NULL, '786', 1, '2022-11-28 05:37:48', '2022-11-28 05:37:48'),
(11, '780200', 'Et in exercitation v', 'Laborum eius velit a', '<p>Et in exercitation v</p>', '<p>Et in exercitation v</p>', '10', '42', '11', '63', '<p>Additional Information</p><table class=\"table table-bordered\"><tbody><tr><td><p>Stand Up</p></td><td>35″L x 24″W x 37-45″H(front to back wheel)<br></td></tr><tr><td>Folded (w/o wheels)<br></td><td><p>32.5″L x 18.5″W x 16.5″H</p></td></tr><tr><td>Folded (w/ wheels)<br></td><td>32.5″L x 24″W x 18.5″H<br></td></tr><tr><td>Door Pass Through<br></td><td><p>24</p></td></tr><tr><td>Frame<br></td><td><p>Aluminum</p></td></tr><tr><td>Weight (w/o wheels)<br></td><td>20 LBS<br></td></tr><tr><td>Weight Capacity<br></td><td>60 LBS<br></td></tr><tr><td>Handle height (ground to handle)<br></td><td>37-45″<br></td></tr><tr><td>Wheels<br></td><td>12″ air / wide track slick tread<br></td></tr><tr><td>Color<br></td><td>Black, Blue, Red, White<br></td></tr></tbody></table><p><br></p>', NULL, '864', 1, '2022-11-28 05:38:43', '2022-11-28 05:38:43'),
(12, '567770', 'Maxime porro et sapi', 'Saepe ipsum aut ulla bn', '<p>Saepe ipsum aut ulla</p>', '<p>Saepe ipsum aut ulla</p>', '4', '73', '21', '1', '<p>Additional Information</p><table class=\"table table-bordered\"><tbody><tr><td><p>Stand Up</p></td><td>35″L x 24″W x 37-45″H(front to back wheel)<br></td></tr><tr><td>Folded (w/o wheels)<br></td><td><p>32.5″L x 18.5″W x 16.5″H</p></td></tr><tr><td>Folded (w/ wheels)<br></td><td>32.5″L x 24″W x 18.5″H<br></td></tr><tr><td>Door Pass Through<br></td><td><p>24</p></td></tr><tr><td>Frame<br></td><td><p>Aluminum</p></td></tr><tr><td>Weight (w/o wheels)<br></td><td>20 LBS<br></td></tr><tr><td>Weight Capacity<br></td><td>60 LBS<br></td></tr><tr><td>Handle height (ground to handle)<br></td><td>37-45″<br></td></tr><tr><td>Wheels<br></td><td>12″ air / wide track slick tread<br></td></tr><tr><td>Color<br></td><td>Black, Blue, Red, White<br></td></tr></tbody></table><p><br></p>', '1', '427', 1, '2022-11-28 05:45:37', '2022-12-03 05:40:12'),
(13, '184098', 'Vitae et labore offi', 'Cillum autem perspic', '<p>Cillum autem perspic</p>', '<p>Cillum autem perspic</p>', '4', '92', '6', '54', '<p>Additional Information</p><table class=\"table table-bordered\"><tbody><tr><td><p>Stand Up</p></td><td>35″L x 24″W x 37-45″H(front to back wheel)<br></td></tr><tr><td>Folded (w/o wheels)<br></td><td><p>32.5″L x 18.5″W x 16.5″H</p></td></tr><tr><td>Folded (w/ wheels)<br></td><td>32.5″L x 24″W x 18.5″H<br></td></tr><tr><td>Door Pass Through<br></td><td><p>24</p></td></tr><tr><td>Frame<br></td><td><p>Aluminum</p></td></tr><tr><td>Weight (w/o wheels)<br></td><td>20 LBS<br></td></tr><tr><td>Weight Capacity<br></td><td>60 LBS<br></td></tr><tr><td>Handle height (ground to handle)<br></td><td>37-45″<br></td></tr><tr><td>Wheels<br></td><td>12″ air / wide track slick tread<br></td></tr><tr><td>Color<br></td><td>Black, Blue, Red, White<br></td></tr></tbody></table><p><br></p>', NULL, '786', 1, '2022-11-28 05:37:48', '2022-11-28 05:37:48'),
(14, '567770', 'Maxime porro et sapi', 'Saepe ipsum aut ulla bn', '<p>Saepe ipsum aut ulla</p>', '<p>Saepe ipsum aut ulla</p>', '4', '73', '21', '1', '<p>Additional Information</p><table class=\"table table-bordered\"><tbody><tr><td><p>Stand Up</p></td><td>35″L x 24″W x 37-45″H(front to back wheel)<br></td></tr><tr><td>Folded (w/o wheels)<br></td><td><p>32.5″L x 18.5″W x 16.5″H</p></td></tr><tr><td>Folded (w/ wheels)<br></td><td>32.5″L x 24″W x 18.5″H<br></td></tr><tr><td>Door Pass Through<br></td><td><p>24</p></td></tr><tr><td>Frame<br></td><td><p>Aluminum</p></td></tr><tr><td>Weight (w/o wheels)<br></td><td>20 LBS<br></td></tr><tr><td>Weight Capacity<br></td><td>60 LBS<br></td></tr><tr><td>Handle height (ground to handle)<br></td><td>37-45″<br></td></tr><tr><td>Wheels<br></td><td>12″ air / wide track slick tread<br></td></tr><tr><td>Color<br></td><td>Black, Blue, Red, White<br></td></tr></tbody></table><p><br></p>', NULL, '427', 1, '2022-11-28 05:45:37', '2022-11-28 05:45:37'),
(15, '567770', 'Maxime porro et sapi', 'Saepe ipsum aut ulla bn', '<p>Saepe ipsum aut ulla</p>', '<p>Saepe ipsum aut ulla</p>', '4', '73', '21', '1', '<p>Additional Information</p><table class=\"table table-bordered\"><tbody><tr><td><p>Stand Up</p></td><td>35″L x 24″W x 37-45″H(front to back wheel)<br></td></tr><tr><td>Folded (w/o wheels)<br></td><td><p>32.5″L x 18.5″W x 16.5″H</p></td></tr><tr><td>Folded (w/ wheels)<br></td><td>32.5″L x 24″W x 18.5″H<br></td></tr><tr><td>Door Pass Through<br></td><td><p>24</p></td></tr><tr><td>Frame<br></td><td><p>Aluminum</p></td></tr><tr><td>Weight (w/o wheels)<br></td><td>20 LBS<br></td></tr><tr><td>Weight Capacity<br></td><td>60 LBS<br></td></tr><tr><td>Handle height (ground to handle)<br></td><td>37-45″<br></td></tr><tr><td>Wheels<br></td><td>12″ air / wide track slick tread<br></td></tr><tr><td>Color<br></td><td>Black, Blue, Red, White<br></td></tr></tbody></table><p><br></p>', NULL, '427', 1, '2022-11-28 05:45:37', '2022-11-28 05:45:37'),
(16, '184098', 'Vitae et labore offi', 'Cillum autem perspic', '<p>Cillum autem perspic</p>', '<p>Cillum autem perspic</p>', '4', '92', '6', '54', '', NULL, '786', 1, '2022-11-28 05:37:48', '2022-11-28 05:37:48'),
(17, '567770', 'Maxime porro et sapi', 'Saepe ipsum aut ulla bn', '<p>Saepe ipsum aut ulla</p>', '<p>Saepe ipsum aut ulla</p>', '4', '73', '21', '1', '', NULL, '427', 1, '2022-11-28 05:45:37', '2022-11-28 05:45:37'),
(18, '567770', 'Maxime porro et sapi', 'Saepe ipsum aut ulla bn', '<p>Saepe ipsum aut ulla</p>', '<p>Saepe ipsum aut ulla</p>', '4', '73', '21', '1', '', NULL, '427', 1, '2022-11-28 05:45:37', '2022-11-28 05:45:37'),
(19, '', 'Vitae et labore offi', 'Cillum autem perspic', '<p>Cillum autem perspic</p>', '<p>Cillum autem perspic</p>', '4', '92', '6', '54', '', NULL, '786', 1, '2022-11-28 05:37:48', '2022-11-28 05:37:48'),
(20, '567770', 'Maxime porro et sapi', 'Saepe ipsum aut ulla bn', '<p>Saepe ipsum aut ulla</p>', '<p>Saepe ipsum aut ulla</p>', '4', '73', '21', '1', '', NULL, '427', 1, '2022-11-28 05:45:37', '2022-11-28 05:45:37'),
(21, '567770', 'Maxime porro et sapi', 'Saepe ipsum aut ulla bn', '<p>Saepe ipsum aut ulla</p>', '<p>Saepe ipsum aut ulla</p>', '4', '73', '21', '1', '', NULL, '427', 1, '2022-11-28 05:45:37', '2022-11-28 05:45:37'),
(22, '184098', 'Vitae et labore offi', 'Cillum autem perspic', '<p>Cillum autem perspic</p>', '<p>Cillum autem perspic</p>', '4', '92', '6', '54', '', NULL, '786', 1, '2022-11-28 05:37:48', '2022-11-28 05:37:48'),
(23, '567770', 'Maxime porro et sapi', 'Saepe ipsum aut ulla bn', '<p>Saepe ipsum aut ulla</p>', '<p>Saepe ipsum aut ulla</p>', '4', '73', '21', '1', '', NULL, '427', 1, '2022-11-28 05:45:37', '2022-11-28 05:45:37'),
(24, '567770', 'Maxime porro et sapi', 'Saepe ipsum aut ulla bn', '<p>Saepe ipsum aut ulla</p>', '<p>Saepe ipsum aut ulla</p>', '4', '73', '21', '1', '', NULL, '427', 1, '2022-11-28 05:45:37', '2022-11-28 05:45:37'),
(25, '567770', 'Maxime porro et sapi', 'Saepe ipsum aut ulla bn', '<p>Saepe ipsum aut ulla</p>', '<p>Saepe ipsum aut ulla</p>', '4', '73', '21', '1', '', NULL, '427', 1, '2022-11-28 05:45:37', '2022-11-28 05:45:37'),
(26, '184098', 'Vitae et labore offi', 'Cillum autem perspic', '<p>Cillum autem perspic</p>', '<p>Cillum autem perspic</p>', '4', '92', '6', '54', '', NULL, '786', 1, '2022-11-28 05:37:48', '2022-11-28 05:37:48'),
(27, '567770', 'Maxime porro et sapi', 'Saepe ipsum aut ulla bn', '<p>Saepe ipsum aut ulla</p>', '<p>Saepe ipsum aut ulla</p>', '4', '73', '21', '1', '', NULL, '427', 1, '2022-11-28 05:45:37', '2022-11-28 05:45:37'),
(28, '567770', 'Maxime porro et sapi', 'Saepe ipsum aut ulla bn', '<p>Saepe ipsum aut ulla</p>', '<p>Saepe ipsum aut ulla</p>', '4', '73', '21', '1', '', NULL, '427', 1, '2022-11-28 05:45:37', '2022-11-28 05:45:37'),
(29, '184098', 'Vitae et labore offi', 'Cillum autem perspic', '<p>Cillum autem perspic</p>', '<p>Cillum autem perspic</p>', '4', '92', '6', '54', '', NULL, '786', 1, '2022-11-28 05:37:48', '2022-11-28 05:37:48'),
(30, '567770', 'Maxime porro et sapi', 'Saepe ipsum aut ulla bn', '<p>Saepe ipsum aut ulla</p>', '<p>Saepe ipsum aut ulla</p>', '4', '73', '21', '1', '', NULL, '427', 1, '2022-11-28 05:45:37', '2022-11-28 05:45:37'),
(31, '942031', 'Autem repudiandae qu', 'Obcaecati cillum rec', '<p>Description</p>', '<p>Description</p>', '5', '60', '9', '71', '', NULL, '865', 1, '2022-11-29 03:57:45', '2022-11-29 03:57:45'),
(32, '657674', 'Sint magna qui aut q', 'Rerum explicabo Qua', 'Text messages are used for personal, family, business and social purposes. Governmental and non-governmental organizations use text messaging for communication between colleagues. In the 2010s, the sending of short informal messages became an accepted part of many cultures, as happened earlier with emailing.[1] This makes texting a quick and easy way to communicate with friends, family and colleagues, including in contexts where a call would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities). Like e-mail and voicemail and unlike calls (in which the caller hopes to speak directly with the recipient), texting does not require the caller and recipient to both be free at the same moment; this permits communication even between busy individuals. Text messages can also be used to interact with automated systems, for example, to order products or services from e-commerce websites, or to participate in online contests. Advertisers and service providers use direct text marketing to send messages to mobile users about promotions, payment due dates, and other notifications instead of using postal mail, email, or voicemail.', 'পাঠ্য বার্তা ব্যক্তিগত, পারিবারিক, ব্যবসায়িক এবং সামাজিক উদ্দেশ্যে ব্যবহার করা হয়। সরকারি এবং বেসরকারি সংস্থাগুলি সহকর্মীদের মধ্যে যোগাযোগের জন্য পাঠ্য বার্তা ব্যবহার করে। 2010-এর দশকে, সংক্ষিপ্ত অনানুষ্ঠানিক বার্তা প্রেরণ অনেক সংস্কৃতির একটি স্বীকৃত অংশ হয়ে ওঠে, যেমনটি আগে ইমেল করার ক্ষেত্রে হয়েছিল। এটি টেক্সট পাঠানোকে বন্ধু, পরিবার এবং সহকর্মীদের সাথে যোগাযোগের একটি দ্রুত এবং সহজ উপায় করে তোলে, যেখানে একটি কল অশ্লীল বা অনুপযুক্ত হবে এমন প্রেক্ষাপট সহ (যেমন, খুব রাতে কল করা বা যখন কেউ জানে যে অন্য ব্যক্তি পরিবার বা কাজের ক্রিয়াকলাপে ব্যস্ত রয়েছে) ) ই-মেইল এবং ভয়েসমেলের মতো এবং কলের বিপরীতে (যেটিতে কলার প্রাপকের সাথে সরাসরি কথা বলার আশা করেন), টেক্সট করার জন্য কলার এবং প্রাপক উভয়কেই একই মুহূর্তে বিনামূল্যে থাকতে হবে না; এটি এমনকি ব্যস্ত ব্যক্তিদের মধ্যে যোগাযোগের অনুমতি দেয়। পাঠ্য বার্তাগুলি স্বয়ংক্রিয় সিস্টেমের সাথে ইন্টারঅ্যাক্ট করতেও ব্যবহার করা যেতে পারে, উদাহরণস্বরূপ, ই-কমার্স ওয়েবসাইটগুলি থেকে পণ্য বা পরিষেবাগুলি অর্ডার করতে বা অনলাইন প্রতিযোগিতায় অংশ নিতে। বিজ্ঞাপনদাতা এবং পরিষেবা প্রদানকারীরা পোস্টাল মেল, ইমেল বা ভয়েসমেইল ব্যবহার করার পরিবর্তে প্রচার, অর্থপ্রদানের শেষ তারিখ এবং অন্যান্য বিজ্ঞপ্তি সম্পর্কে মোবাইল ব্যবহারকারীদের বার্তা পাঠাতে সরাসরি পাঠ্য বিপণন ব্যবহার করে।', '4', '57', '28', '92', '<h4><b>Additional Information</b></h4><h6><b><br></b></h6><table class=\"table table-bordered\"><tbody><tr><td><p>Stand up</p></td><td>35″L x 24″W x 37-45″H(front to back wheel)<br></td></tr><tr><td>Folded (w/o wheels)<br></td><td><p>32.5″L x 18.5″W x 16.5″H</p></td></tr><tr><td>Folded (w/ wheels)<br></td><td>32.5″L x 24″W x 18.5″H<br></td></tr><tr><td>Door Pass Through<br></td><td><p>24</p></td></tr><tr><td>Frame<br></td><td><p>Aluminum</p></td></tr><tr><td>Weight (w/o wheels)<br></td><td>20 LBS<br></td></tr><tr><td>Weight Capacity<br></td><td>60 LBS<br></td></tr><tr><td>Handle height (ground to handle)<br></td><td>37-45″<br></td></tr><tr><td>Wheels<br></td><td>12″ air / wide track slick tread<br></td></tr><tr><td>Color<br></td><td>Black, Blue, Red, White<br></td></tr></tbody></table><p><br></p>', '1', '479', 1, '2022-11-29 04:11:03', '2022-12-03 04:53:57'),
(33, '503766', 'Cupiditate error eiu', 'Aliquip fugiat odit', 'Optio lorem amet n', 'Qui tempor consequat', '5', '13', '24', '11', '<p>Facilis dolorem labo. additional information<br></p>', '3', '734', 1, '2022-12-03 03:16:04', '2022-12-03 04:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_bn` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `title`, `title_bn`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'leather bag', 'চামড়ার ব্যাগ', 'categories/1669544449.png', 1, '2022-11-25 23:43:40', '2022-11-27 04:46:13'),
(4, 'Leather wallet', 'চামড়ার মানিব্যাগ', 'categories/1669544461.png', 1, '2022-11-26 00:04:15', '2022-11-27 04:47:36'),
(5, 'leather shoes', 'চামড়ার জুতা', 'categories/1669544481.png', 1, '2022-11-26 00:05:11', '2022-11-27 04:48:06'),
(6, 'leather belt', 'চামড়ার বেল্ট', 'categories/1669545800.png', 1, '2022-11-27 04:43:21', '2022-11-27 04:47:01'),
(7, 'Leather phone cover', 'চামড়ার ফোন কভার', 'categories/1669546649.png', 1, '2022-11-27 04:57:29', '2022-11-27 04:57:29'),
(8, 'glasses frame', 'চশমার ফ্রেম', 'categories/1669546688.png', 1, '2022-11-27 04:58:09', '2022-11-27 04:58:09'),
(9, 'school bag', 'স্কুল ব্যাগ', 'categories/1669546724.png', 1, '2022-11-27 04:58:45', '2022-11-27 04:58:45'),
(10, 't-shirt', 'টি-শার্ট', 'categories/1669546759.png', 1, '2022-11-27 04:59:19', '2022-11-27 04:59:19'),
(11, 'leather hat', 'চামড়ার টুপি', 'categories/1669546794.png', 1, '2022-11-27 04:59:56', '2022-11-27 04:59:56'),
(12, 'Water bottle', 'ওয়াটার বোতল', 'categories/1669546831.png', 1, '2022-11-27 05:00:31', '2022-11-27 05:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(78, '184098', 'product/1669635468.png', NULL, NULL),
(84, '184098', 'product/1669635590.jpg', NULL, NULL),
(85, '184098', 'product/1669635593.jpg', NULL, NULL),
(89, '567770', 'product/1669635934.png', '2022-11-28 05:45:35', '2022-11-28 05:45:35'),
(90, '780200', 'product/1669635989.png', '2022-11-28 05:46:29', '2022-11-28 05:46:29'),
(91, '113244', 'product/1669636031.png', '2022-11-28 05:47:11', '2022-11-28 05:47:11'),
(92, '567770', 'product/1669715505.png', '2022-11-29 03:51:45', '2022-11-29 03:51:45'),
(93, '567770', 'product/1669715530.png', '2022-11-29 03:52:10', '2022-11-29 03:52:10'),
(94, '942031', 'product/1669715857.jpg', NULL, NULL),
(95, '942031', 'product/1669715859.jpg', NULL, NULL),
(96, '942031', 'product/1669715861.jpg', NULL, NULL),
(97, '567770', 'product/1669715894.jpg', NULL, NULL),
(98, '567770', 'product/1669715897.jpg', NULL, NULL),
(99, '567770', 'product/1669715899.jpg', NULL, NULL),
(100, '657674', 'product/1669716655.jpg', NULL, NULL),
(101, '657674', 'product/1669716657.jpg', NULL, NULL),
(102, '657674', 'product/1669716658.jpg', NULL, NULL),
(103, '657674', 'product/1669716660.jpg', NULL, NULL),
(104, '513239', 'product/1670058882.jpg', NULL, NULL),
(105, '513239', 'product/1670058885.jpg', NULL, NULL),
(106, '513239', 'product/1670058888.jpg', NULL, NULL),
(107, '503766', 'product/1670058954.jpg', NULL, NULL),
(108, '503766', 'product/1670058957.jpg', NULL, NULL),
(109, '503766', 'product/1670058960.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_sliders`
--

CREATE TABLE `product_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sliders`
--

INSERT INTO `product_sliders` (`id`, `image`, `title`, `title_bn`, `description`, `description_bn`, `status`, `created_at`, `updated_at`) VALUES
(1, 'product_slider/1669612081.jpg', 'Don’t miss amazing grocery deals', 'আশ্চর্যজনক মুদির ডিল মিস করবেন না', 'Sign up for the daily newsletter', 'দৈনিক নিউজলেটার জন্য সাইন আপ করুন', 1, '2022-11-27 22:54:30', '2022-11-27 23:08:12'),
(2, 'product_slider/1669612037.jpg', 'Don’t miss amazing grocery deals ok', 'আশ্চর্যজনক মুদির ডিল মিস করবেন না', NULL, NULL, 1, '2022-11-27 22:54:30', '2022-11-27 23:29:13'),
(3, 'product_slider/1669612113.jpg', 'Don’t miss amazing grocery deals', 'আশ্চর্যজনক মুদির ডিল মিস করবেন না', 'Sign up for the daily newsletter', 'দৈনিক নিউজলেটার জন্য সাইন আপ করুন', 1, '2022-11-27 22:54:30', '2022-11-27 23:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ingredients` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `steps` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `ingredients`, `steps`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Chiken fry ok', '<p>ok</p>', '<p>ok</p>', 'recipe/16613252546305cfc6a4908.jpg', 0, '2022-08-23 19:10:58', '2022-08-23 19:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet.', 'slider/166228904363148493da285.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa recusandae reprehenderit\r\n                                deleniti dolorem sint hic quisquam, nobis aperiam? Exercitationem expedita excepturi\r\n                                quae impedit quia dolor, quidem et', 1, '2022-09-03 22:50:37', '2022-09-03 22:57:24'),
(2, 'Lorem ipsum dolor sit amet.', 'slider/16622886846314832c23f1f.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa recusandae reprehenderit\r\n                                deleniti dolorem sint hic quisquam, nobis aperiam? Exercitationem expedita excepturi\r\n                                quae impedit quia dolor, quidem et', 1, '2022-09-03 22:51:24', '2022-09-03 23:00:25'),
(3, 'Lorem ipsum dolor sit ametok.', 'slider/16622891756314851794e61.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa recusandae reprehenderit\r\n                                deleniti dolorem sint hic quisquam, nobis aperiam? Exercitationemok.', 1, '2022-09-03 22:59:35', '2022-09-03 22:59:35'),
(4, 'title', 'slider/1663579790.jpg', 'description', 1, '2022-09-18 21:29:51', '2022-09-18 21:29:51'),
(5, NULL, 'slider/1663581940.jpg', NULL, 1, '2022-09-18 22:05:40', '2022-09-18 22:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `success_stories`
--

CREATE TABLE `success_stories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `success_stories`
--

INSERT INTO `success_stories` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Success sory', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid asperiores assumenda delectus deleniti distinctio earum expedita explicabo facere, impedit laboriosam, laudantium, maxime minus mollitia nemo nihil officiis optio porro quae quasi quia quidem quo reprehenderit sint tempore vero voluptas. Cumque ea error fugit impedit incidunt quaerat quos ratione saepe sint sit temporibus ullam unde, vel voluptates voluptatum. Ab aspernatur commodi deleniti, deserunt distinctio eaque eum ex excepturi ipsum maxime molestias necessitatibus, nobis officiis placeat porro quasi quos sunt voluptatum? Dolor possimus veniam vero. Aliquam aperiam at blanditiis, debitis deleniti dolore dolorem dolores ducimus error et exercitationem fuga hic id illum ipsa ipsam libero, magnam maxime necessitatibus nemo neque omnis optio perferendis praesentium quam quas qui rerum similique temporibus totam velit voluptas voluptatibus voluptatum. Atque doloremque illum incidunt quod soluta ut velit vero voluptatem? Accusamus aliquam asperiores, deserunt dolor, dolores enim eos est et facere iste laborum magnam molestias nihil nisi pariatur perferendis praesentium ratione rem repellendus sit temporibus ut voluptatum. Dolore dolorum eos esse reiciendis voluptas. Dolor dolores doloribus enim fugiat harum iure quidem reiciendis temporibus unde vel? Amet aut dignissimos iure laudantium maiores nihil quidem vel? Ad corporis est facere itaque odit! Amet aut libero necessitatibus odio vel!', 'successStories/16626277346319af96061f4.jpg', 1, '2022-09-07 21:02:15', '2022-09-07 21:02:15'),
(4, 'Success sory', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid asperiores assumenda delectus deleniti distinctio earum expedita explicabo facere, impedit laboriosam, laudantium, maxime minus mollitia nemo nihil officiis optio porro quae quasi quia quidem quo reprehenderit sint tempore vero voluptas. Cumque ea error fugit impedit incidunt quaerat quos ratione saepe sint sit temporibus ullam unde, vel voluptates voluptatum. Ab aspernatur commodi deleniti, deserunt distinctio eaque eum ex excepturi ipsum maxime molestias necessitatibus, nobis officiis placeat porro quasi quos sunt voluptatum? Dolor possimus veniam vero. Aliquam aperiam at blanditiis, debitis deleniti dolore dolorem dolores ducimus error et exercitationem fuga hic id illum ipsa ipsam libero, magnam maxime necessitatibus nemo neque omnis optio perferendis praesentium quam quas qui rerum similique temporibus totam velit voluptas voluptatibus voluptatum. Atque doloremque illum incidunt quod soluta ut velit vero voluptatem? Accusamus aliquam asperiores, deserunt dolor, dolores enim eos est et facere iste laborum magnam molestias nihil nisi pariatur perferendis praesentium ratione rem repellendus sit temporibus ut voluptatum. Dolore dolorum eos esse reiciendis voluptas. Dolor dolores doloribus enim fugiat harum iure quidem reiciendis temporibus unde vel? Amet aut dignissimos iure laudantium maiores nihil quidem vel? Ad corporis est facere itaque odit! Amet aut libero necessitatibus odio vel!', 'successStories/16626277696319afb9c712a.jpg', 1, '2022-09-07 21:02:50', '2022-09-07 21:02:50'),
(5, 'Success sory', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid asperiores assumenda delectus deleniti distinctio earum expedita explicabo facere, impedit laboriosam, laudantium, maxime minus mollitia nemo nihil officiis optio porro quae quasi quia quidem quo reprehenderit sint tempore vero voluptas. Cumque ea error fugit impedit incidunt quaerat quos ratione saepe sint sit temporibus ullam unde, vel voluptates voluptatum. Ab aspernatur commodi deleniti, deserunt distinctio eaque eum ex excepturi ipsum maxime molestias necessitatibus, nobis officiis placeat porro quasi quos sunt voluptatum? Dolor possimus veniam vero. Aliquam aperiam at blanditiis, debitis deleniti dolore dolorem dolores ducimus error et exercitationem fuga hic id illum ipsa ipsam libero, magnam maxime necessitatibus nemo neque omnis optio perferendis praesentium quam quas qui rerum similique temporibus totam velit voluptas voluptatibus voluptatum. Atque doloremque illum incidunt quod soluta ut velit vero voluptatem? Accusamus aliquam asperiores, deserunt dolor, dolores enim eos est et facere iste laborum magnam molestias nihil nisi pariatur perferendis praesentium ratione rem repellendus sit temporibus ut voluptatum. Dolore dolorum eos esse reiciendis voluptas. Dolor dolores doloribus enim fugiat harum iure quidem reiciendis temporibus unde vel? Amet aut dignissimos iure laudantium maiores nihil quidem vel? Ad corporis est facere itaque odit! Amet aut libero necessitatibus odio vel!', 'successStories/16626278216319afed55ed0.jpg', 1, '2022-09-07 21:03:43', '2022-09-07 21:03:43'),
(6, 'Success sory', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid asperiores assumenda delectus deleniti distinctio earum expedita explicabo facere, impedit laboriosam, laudantium, maxime minus mollitia nemo nihil officiis optio porro quae quasi quia quidem quo reprehenderit sint tempore vero voluptas. Cumque ea error fugit impedit incidunt quaerat quos ratione saepe sint sit temporibus ullam unde, vel voluptates voluptatum. Ab aspernatur commodi deleniti, deserunt distinctio eaque eum ex excepturi ipsum maxime molestias necessitatibus, nobis officiis placeat porro quasi quos sunt voluptatum? Dolor possimus veniam vero. Aliquam aperiam at blanditiis, debitis deleniti dolore dolorem dolores ducimus error et exercitationem fuga hic id illum ipsa ipsam libero, magnam maxime necessitatibus nemo neque omnis optio perferendis praesentium quam quas qui rerum similique temporibus totam velit voluptas voluptatibus voluptatum. Atque doloremque illum incidunt quod soluta ut velit vero voluptatem? Accusamus aliquam asperiores, deserunt dolor, dolores enim eos est et facere iste laborum magnam molestias nihil nisi pariatur perferendis praesentium ratione rem repellendus sit temporibus ut voluptatum. Dolore dolorum eos esse reiciendis voluptas. Dolor dolores doloribus enim fugiat harum iure quidem reiciendis temporibus unde vel? Amet aut dignissimos iure laudantium maiores nihil quidem vel? Ad corporis est facere itaque odit! Amet aut libero necessitatibus odio vel!', 'successStories/16626277346319af96061f4.jpg', 1, '2022-09-07 21:02:15', '2022-09-07 21:02:15'),
(7, 'Success sory', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid asperiores assumenda delectus deleniti distinctio earum expedita explicabo facere, impedit laboriosam, laudantium, maxime minus mollitia nemo nihil officiis optio porro quae quasi quia quidem quo reprehenderit sint tempore vero voluptas. Cumque ea error fugit impedit incidunt quaerat quos ratione saepe sint sit temporibus ullam unde, vel voluptates voluptatum. Ab aspernatur commodi deleniti, deserunt distinctio eaque eum ex excepturi ipsum maxime molestias necessitatibus, nobis officiis placeat porro quasi quos sunt voluptatum? Dolor possimus veniam vero. Aliquam aperiam at blanditiis, debitis deleniti dolore dolorem dolores ducimus error et exercitationem fuga hic id illum ipsa ipsam libero, magnam maxime necessitatibus nemo neque omnis optio perferendis praesentium quam quas qui rerum similique temporibus totam velit voluptas voluptatibus voluptatum. Atque doloremque illum incidunt quod soluta ut velit vero voluptatem? Accusamus aliquam asperiores, deserunt dolor, dolores enim eos est et facere iste laborum magnam molestias nihil nisi pariatur perferendis praesentium ratione rem repellendus sit temporibus ut voluptatum. Dolore dolorum eos esse reiciendis voluptas. Dolor dolores doloribus enim fugiat harum iure quidem reiciendis temporibus unde vel? Amet aut dignissimos iure laudantium maiores nihil quidem vel? Ad corporis est facere itaque odit! Amet aut libero necessitatibus odio vel!', 'successStories/16626277696319afb9c712a.jpg', 1, '2022-09-07 21:02:50', '2022-09-07 21:02:50'),
(8, 'Success sory', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid asperiores assumenda delectus deleniti distinctio earum expedita explicabo facere, impedit laboriosam, laudantium, maxime minus mollitia nemo nihil officiis optio porro quae quasi quia quidem quo reprehenderit sint tempore vero voluptas. Cumque ea error fugit impedit incidunt quaerat quos ratione saepe sint sit temporibus ullam unde, vel voluptates voluptatum. Ab aspernatur commodi deleniti, deserunt distinctio eaque eum ex excepturi ipsum maxime molestias necessitatibus, nobis officiis placeat porro quasi quos sunt voluptatum? Dolor possimus veniam vero. Aliquam aperiam at blanditiis, debitis deleniti dolore dolorem dolores ducimus error et exercitationem fuga hic id illum ipsa ipsam libero, magnam maxime necessitatibus nemo neque omnis optio perferendis praesentium quam quas qui rerum similique temporibus totam velit voluptas voluptatibus voluptatum. Atque doloremque illum incidunt quod soluta ut velit vero voluptatem? Accusamus aliquam asperiores, deserunt dolor, dolores enim eos est et facere iste laborum magnam molestias nihil nisi pariatur perferendis praesentium ratione rem repellendus sit temporibus ut voluptatum. Dolore dolorum eos esse reiciendis voluptas. Dolor dolores doloribus enim fugiat harum iure quidem reiciendis temporibus unde vel? Amet aut dignissimos iure laudantium maiores nihil quidem vel? Ad corporis est facere itaque odit! Amet aut libero necessitatibus odio vel!', 'successStories/16626278216319afed55ed0.jpg', 1, '2022-09-07 21:03:43', '2022-09-07 21:03:43'),
(9, 'Success sory', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid asperiores assumenda delectus deleniti distinctio earum expedita explicabo facere, impedit laboriosam, laudantium, maxime minus mollitia nemo nihil officiis optio porro quae quasi quia quidem quo reprehenderit sint tempore vero voluptas. Cumque ea error fugit impedit incidunt quaerat quos ratione saepe sint sit temporibus ullam unde, vel voluptates voluptatum. Ab aspernatur commodi deleniti, deserunt distinctio eaque eum ex excepturi ipsum maxime molestias necessitatibus, nobis officiis placeat porro quasi quos sunt voluptatum? Dolor possimus veniam vero. Aliquam aperiam at blanditiis, debitis deleniti dolore dolorem dolores ducimus error et exercitationem fuga hic id illum ipsa ipsam libero, magnam maxime necessitatibus nemo neque omnis optio perferendis praesentium quam quas qui rerum similique temporibus totam velit voluptas voluptatibus voluptatum. Atque doloremque illum incidunt quod soluta ut velit vero voluptatem? Accusamus aliquam asperiores, deserunt dolor, dolores enim eos est et facere iste laborum magnam molestias nihil nisi pariatur perferendis praesentium ratione rem repellendus sit temporibus ut voluptatum. Dolore dolorum eos esse reiciendis voluptas. Dolor dolores doloribus enim fugiat harum iure quidem reiciendis temporibus unde vel? Amet aut dignissimos iure laudantium maiores nihil quidem vel? Ad corporis est facere itaque odit! Amet aut libero necessitatibus odio vel!', 'successStories/16626277346319af96061f4.jpg', 1, '2022-09-07 21:02:15', '2022-09-07 21:02:15'),
(10, 'Success sory', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid asperiores assumenda delectus deleniti distinctio earum expedita explicabo facere, impedit laboriosam, laudantium, maxime minus mollitia nemo nihil officiis optio porro quae quasi quia quidem quo reprehenderit sint tempore vero voluptas. Cumque ea error fugit impedit incidunt quaerat quos ratione saepe sint sit temporibus ullam unde, vel voluptates voluptatum. Ab aspernatur commodi deleniti, deserunt distinctio eaque eum ex excepturi ipsum maxime molestias necessitatibus, nobis officiis placeat porro quasi quos sunt voluptatum? Dolor possimus veniam vero. Aliquam aperiam at blanditiis, debitis deleniti dolore dolorem dolores ducimus error et exercitationem fuga hic id illum ipsa ipsam libero, magnam maxime necessitatibus nemo neque omnis optio perferendis praesentium quam quas qui rerum similique temporibus totam velit voluptas voluptatibus voluptatum. Atque doloremque illum incidunt quod soluta ut velit vero voluptatem? Accusamus aliquam asperiores, deserunt dolor, dolores enim eos est et facere iste laborum magnam molestias nihil nisi pariatur perferendis praesentium ratione rem repellendus sit temporibus ut voluptatum. Dolore dolorum eos esse reiciendis voluptas. Dolor dolores doloribus enim fugiat harum iure quidem reiciendis temporibus unde vel? Amet aut dignissimos iure laudantium maiores nihil quidem vel? Ad corporis est facere itaque odit! Amet aut libero necessitatibus odio vel!', 'successStories/16626277696319afb9c712a.jpg', 1, '2022-09-07 21:02:50', '2022-09-07 21:02:50'),
(11, 'Success sory', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid asperiores assumenda delectus deleniti distinctio earum expedita explicabo facere, impedit laboriosam, laudantium, maxime minus mollitia nemo nihil officiis optio porro quae quasi quia quidem quo reprehenderit sint tempore vero voluptas. Cumque ea error fugit impedit incidunt quaerat quos ratione saepe sint sit temporibus ullam unde, vel voluptates voluptatum. Ab aspernatur commodi deleniti, deserunt distinctio eaque eum ex excepturi ipsum maxime molestias necessitatibus, nobis officiis placeat porro quasi quos sunt voluptatum? Dolor possimus veniam vero. Aliquam aperiam at blanditiis, debitis deleniti dolore dolorem dolores ducimus error et exercitationem fuga hic id illum ipsa ipsam libero, magnam maxime necessitatibus nemo neque omnis optio perferendis praesentium quam quas qui rerum similique temporibus totam velit voluptas voluptatibus voluptatum. Atque doloremque illum incidunt quod soluta ut velit vero voluptatem? Accusamus aliquam asperiores, deserunt dolor, dolores enim eos est et facere iste laborum magnam molestias nihil nisi pariatur perferendis praesentium ratione rem repellendus sit temporibus ut voluptatum. Dolore dolorum eos esse reiciendis voluptas. Dolor dolores doloribus enim fugiat harum iure quidem reiciendis temporibus unde vel? Amet aut dignissimos iure laudantium maiores nihil quidem vel? Ad corporis est facere itaque odit! Amet aut libero necessitatibus odio vel!', 'successStories/16626278216319afed55ed0.jpg', 1, '2022-09-07 21:03:43', '2022-09-07 21:03:43'),
(12, 'Success sory', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid asperiores assumenda delectus deleniti distinctio earum expedita explicabo facere, impedit laboriosam, laudantium, maxime minus mollitia nemo nihil officiis optio porro quae quasi quia quidem quo reprehenderit sint tempore vero voluptas. Cumque ea error fugit impedit incidunt quaerat quos ratione saepe sint sit temporibus ullam unde, vel voluptates voluptatum. Ab aspernatur commodi deleniti, deserunt distinctio eaque eum ex excepturi ipsum maxime molestias necessitatibus, nobis officiis placeat porro quasi quos sunt voluptatum? Dolor possimus veniam vero. Aliquam aperiam at blanditiis, debitis deleniti dolore dolorem dolores ducimus error et exercitationem fuga hic id illum ipsa ipsam libero, magnam maxime necessitatibus nemo neque omnis optio perferendis praesentium quam quas qui rerum similique temporibus totam velit voluptas voluptatibus voluptatum. Atque doloremque illum incidunt quod soluta ut velit vero voluptatem? Accusamus aliquam asperiores, deserunt dolor, dolores enim eos est et facere iste laborum magnam molestias nihil nisi pariatur perferendis praesentium ratione rem repellendus sit temporibus ut voluptatum. Dolore dolorum eos esse reiciendis voluptas. Dolor dolores doloribus enim fugiat harum iure quidem reiciendis temporibus unde vel? Amet aut dignissimos iure laudantium maiores nihil quidem vel? Ad corporis est facere itaque odit! Amet aut libero necessitatibus odio vel!', 'successStories/16626277346319af96061f4.jpg', 1, '2022-09-07 21:02:15', '2022-09-07 21:02:15'),
(13, 'Success sory', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid asperiores assumenda delectus deleniti distinctio earum expedita explicabo facere, impedit laboriosam, laudantium, maxime minus mollitia nemo nihil officiis optio porro quae quasi quia quidem quo reprehenderit sint tempore vero voluptas. Cumque ea error fugit impedit incidunt quaerat quos ratione saepe sint sit temporibus ullam unde, vel voluptates voluptatum. Ab aspernatur commodi deleniti, deserunt distinctio eaque eum ex excepturi ipsum maxime molestias necessitatibus, nobis officiis placeat porro quasi quos sunt voluptatum? Dolor possimus veniam vero. Aliquam aperiam at blanditiis, debitis deleniti dolore dolorem dolores ducimus error et exercitationem fuga hic id illum ipsa ipsam libero, magnam maxime necessitatibus nemo neque omnis optio perferendis praesentium quam quas qui rerum similique temporibus totam velit voluptas voluptatibus voluptatum. Atque doloremque illum incidunt quod soluta ut velit vero voluptatem? Accusamus aliquam asperiores, deserunt dolor, dolores enim eos est et facere iste laborum magnam molestias nihil nisi pariatur perferendis praesentium ratione rem repellendus sit temporibus ut voluptatum. Dolore dolorum eos esse reiciendis voluptas. Dolor dolores doloribus enim fugiat harum iure quidem reiciendis temporibus unde vel? Amet aut dignissimos iure laudantium maiores nihil quidem vel? Ad corporis est facere itaque odit! Amet aut libero necessitatibus odio vel!', 'successStories/16626277696319afb9c712a.jpg', 1, '2022-09-07 21:02:50', '2022-09-07 21:02:50'),
(14, 'Success sory', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid asperiores assumenda delectus deleniti distinctio earum expedita explicabo facere, impedit laboriosam, laudantium, maxime minus mollitia nemo nihil officiis optio porro quae quasi quia quidem quo reprehenderit sint tempore vero voluptas. Cumque ea error fugit impedit incidunt quaerat quos ratione saepe sint sit temporibus ullam unde, vel voluptates voluptatum. Ab aspernatur commodi deleniti, deserunt distinctio eaque eum ex excepturi ipsum maxime molestias necessitatibus, nobis officiis placeat porro quasi quos sunt voluptatum? Dolor possimus veniam vero. Aliquam aperiam at blanditiis, debitis deleniti dolore dolorem dolores ducimus error et exercitationem fuga hic id illum ipsa ipsam libero, magnam maxime necessitatibus nemo neque omnis optio perferendis praesentium quam quas qui rerum similique temporibus totam velit voluptas voluptatibus voluptatum. Atque doloremque illum incidunt quod soluta ut velit vero voluptatem? Accusamus aliquam asperiores, deserunt dolor, dolores enim eos est et facere iste laborum magnam molestias nihil nisi pariatur perferendis praesentium ratione rem repellendus sit temporibus ut voluptatum. Dolore dolorum eos esse reiciendis voluptas. Dolor dolores doloribus enim fugiat harum iure quidem reiciendis temporibus unde vel? Amet aut dignissimos iure laudantium maiores nihil quidem vel? Ad corporis est facere itaque odit! Amet aut libero necessitatibus odio vel!', 'successStories/16626278216319afed55ed0.jpg', 1, '2022-09-07 21:03:43', '2022-09-07 21:03:43'),
(15, 'Success sory', 'Description', 'successStories/1663569364.jpg', 1, '2022-09-18 18:36:04', '2022-09-18 18:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `terms` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `terms`, `status`, `created_at`, `updated_at`) VALUES
(1, '<p>Including a website terms and conditions template would make known any issues and/or concerns such as the appropriate use of the site, privacy, use of cookies, password security, registration procedures, intellectual property and other such pertinent information. Basically, this would provide enough information about the content of the website and how users and customers are supposed to use it.</p><p>If you are planning to&nbsp;<a href=\"https://templatelab.com/site-map-templates/\">create a website for your business</a>&nbsp;or if you already have one, it would be a good idea to add a separate page for it. This would help guarantee that the users and customers know all the rules on how to use and how not to use all the content and information on your website. Your template would have to contain information about any rights as well as obligations of the users and it must set boundaries on any potential liabilities.</p>', 0, '2022-09-12 21:46:12', '2022-09-12 22:56:51'),
(2, '<p><strong>Header</strong></p><ol><li><p>Including a website terms and conditions template would make known any issues and/or concerns such as the appropriate use of the site, privacy, use of cookies, password security, registration procedures, intellectual property and other such pertinent information. Basically, this would provide enough information about the content of the website and how users and customers are supposed to use it.</p><p>If you are planning to&nbsp;<a href=\"https://templatelab.com/site-map-templates/\">create a website for your business</a>&nbsp;or if you already have one, it would be a good idea to add a separate page for it. This would help guarantee that the users and customers know all the rules on how to use and how not to use all the content and information on your website. Your template would have to contain information about any rights as well as obligations of the users and it must set boundaries on any potential liabilities.</p></li><li><p>Including a website terms and conditions template would make known any issues and/or concerns such as the appropriate use of the site, privacy, use of cookies, password security, registration procedures, intellectual property and other such pertinent information. Basically, this would provide enough information about the content of the website and how users and customers are supposed to use it.</p><p>If you are planning to&nbsp;<a href=\"https://templatelab.com/site-map-templates/\">create a website for your business</a>&nbsp;or if you already have one, it would be a good idea to add a separate page for it. This would help guarantee that the users and customers know all the rules on how to use and how not to use all the content and information on your website. Your template would have to contain information about any rights as well as obligations of the users and it must set boundaries on any potential liabilities.</p></li></ol>', 1, '2022-09-12 21:46:12', '2022-09-12 22:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3' COMMENT '1 = super admin, 2 = admin, 3 = staff',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `user_type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sifat Alam', NULL, 'safin@gmail.com', '3', NULL, '$2y$10$itWKT3o8gHlBYeJJoJmsceUh28NPWT7YaFYXSVl4hGe.X0V9Kv6m2', NULL, '2022-08-22 18:31:28', '2022-08-22 18:31:28');

-- --------------------------------------------------------

--
-- Table structure for table `video_galleries`
--

CREATE TABLE `video_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_galleries`
--

INSERT INTO `video_galleries` (`id`, `title`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Video title', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/R5f0T7GjY94\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, '2022-09-04 22:40:54', '2022-09-04 22:46:18'),
(2, 'Video title', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Sqqj_14wBxU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, '2022-09-05 21:24:40', '2022-09-05 21:24:40'),
(3, 'title', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/LPvby34KeOA\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, '2022-09-05 21:25:44', '2022-09-05 21:25:44'),
(4, 'Video title', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/R5f0T7GjY94\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, '2022-09-05 21:26:43', '2022-09-05 21:26:43'),
(5, 'title', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Sqqj_14wBxU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, '2022-09-05 21:26:51', '2022-09-05 21:26:51'),
(6, 'title', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/R5f0T7GjY94\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, '2022-09-05 21:26:58', '2022-09-05 21:26:58'),
(7, 'title', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Sqqj_14wBxU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, '2022-09-05 21:27:08', '2022-09-05 21:27:08'),
(8, 'title', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Sqqj_14wBxU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, '2022-09-05 21:27:17', '2022-09-05 21:27:17');

-- --------------------------------------------------------

--
-- Table structure for table `workingareas`
--

CREATE TABLE `workingareas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workingareas`
--

INSERT INTO `workingareas` (`id`, `image`, `area`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'workingArea/16622895346314867e960d7.jpg', 'NGF works in south-west coastal', 'NGF works in south-west coastal part of Bangladesh covering 17 upazilas under 3 different. Districts\r\n                    namely Satkhira, Khulna, Jashore. The Head Office is situated in Nowabenki, Shyamnagar', 1, '2022-09-03 23:05:35', '2022-09-03 23:05:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entrepreneurs`
--
ALTER TABLE `entrepreneurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_demands`
--
ALTER TABLE `food_demands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_values`
--
ALTER TABLE `food_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_galleries`
--
ALTER TABLE `image_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knowledge`
--
ALTER TABLE `knowledge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `privacies`
--
ALTER TABLE `privacies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sliders`
--
ALTER TABLE `product_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `success_stories`
--
ALTER TABLE `success_stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `video_galleries`
--
ALTER TABLE `video_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workingareas`
--
ALTER TABLE `workingareas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `components`
--
ALTER TABLE `components`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `entrepreneurs`
--
ALTER TABLE `entrepreneurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `food_demands`
--
ALTER TABLE `food_demands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food_values`
--
ALTER TABLE `food_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `image_galleries`
--
ALTER TABLE `image_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `knowledge`
--
ALTER TABLE `knowledge`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privacies`
--
ALTER TABLE `privacies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `product_sliders`
--
ALTER TABLE `product_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `success_stories`
--
ALTER TABLE `success_stories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `video_galleries`
--
ALTER TABLE `video_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `workingareas`
--
ALTER TABLE `workingareas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
