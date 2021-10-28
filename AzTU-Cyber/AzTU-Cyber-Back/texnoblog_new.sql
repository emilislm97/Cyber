-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2021 at 03:08 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `texnoblog_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'alt ve title icin',
  `start_date` datetime NOT NULL,
  `finish_date` datetime NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `click_count` int(11) DEFAULT 0,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `name`, `start_date`, `finish_date`, `url`, `section`, `img`, `click_count`, `status`, `created_at`, `updated_at`) VALUES
(87, 'Emil', '2021-08-14 19:33:00', '2021-08-28 19:33:00', 'https://www.trendyol.com/', 'home.section1.1', 'assets/media/rklm/611690eaaa2e2.jpeg', 0, '1', '2021-08-13 19:34:02', '2021-08-13 19:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` int(11) DEFAULT 0,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '0',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `type`, `name`, `slug`, `status`, `created_at`) VALUES
(12, 0, 'Məqəlalər', 'meqaleler', '1', '2021-08-13 01:12:28'),
(13, 0, 'Xəbərlər', 'xeberler', '1', '2021-08-13 01:15:26'),
(14, 0, 'Texniki Terminlər', 'texniki-terminler', '1', '2021-08-13 01:15:26'),
(15, 12, 'Proqramlaşdırma', 'proqramlasdirma', '1', '2021-08-14 15:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT 0,
  `name` varchar(250) DEFAULT NULL,
  `slug` varchar(300) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `type` enum('image','video') DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `video` varchar(500) DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `status` enum('0','1','2') DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `author_id`, `name`, `slug`, `content`, `category_id`, `type`, `image`, `video`, `hit`, `tags`, `status`, `created_at`, `updated_at`) VALUES
(4, 23, 'test proq', 'test-proq', 'asdad', 15, 'image', '4/test-proq.webp', NULL, 0, '[{\"id\":66,\"name\":\"adada\"}]', '1', '2021-08-14', '2021-08-14'),
(5, 23, 'texniki', 'texniki', 'adasdadad', 14, 'image', '5/texniki.webp', NULL, 0, '[{\"id\":68,\"name\":\"adsadas\"}]', '2', '2021-08-14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newslatter`
--

CREATE TABLE `newslatter` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(500) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `newslatter_message`
--

CREATE TABLE `newslatter_message` (
  `id` bigint(22) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `to` text NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `keywords` varchar(250) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `about_title` varchar(250) NOT NULL,
  `about_description` text NOT NULL,
  `about_image` varchar(250) NOT NULL,
  `tel` varchar(250) NOT NULL,
  `office_tel` varchar(250) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(500) NOT NULL,
  `facebook` varchar(500) DEFAULT NULL,
  `instagram` varchar(500) DEFAULT NULL,
  `linkedin` varchar(500) DEFAULT NULL,
  `youtube` varchar(500) DEFAULT NULL,
  `github` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `description`, `keywords`, `logo`, `about_title`, `about_description`, `about_image`, `tel`, `office_tel`, `email`, `address`, `facebook`, `instagram`, `linkedin`, `youtube`, `github`) VALUES
(1, 'Ayyub Hajiyev Blog Səhifəsi', 'Mənim məqsədim  ayyubhajiyev.com vasitəsi ilə bu günə qədər əldə etdiyim təcrübələri burada bölüşərək sizlərə kiçik də olsa dəstək vermək və Azərbaycan dilində resursları daha da əl çatan etməkdir.', 'əyyub hacıyev, ayyub hajiyev, proqramlaşdırma, javascript, texnologiya, bloq', '', 'Ayyub Hajiyev', '<p>Mənim fikrimcə, insanın özü haqqında çox danışmağı o qədər də yaxşı bir şey deyil, buna görə də mənim üçün ən çətin yer “haqqımda” hissəsidir.</p>\r\n\r\n<p>2011-2012 – ci illərdə ölkədə olmadığım üçün və bir o qədər də dostum olmadığından ən yaxın dostum kompüter olmağa başladı. Bu dövrlərdə zamanımın da həddindən artıq çox olması mənə daha maraqlı gələn proqramlaşdırmanı araşdırmağa və daha yaxından tanımağa köməklik göstərdi.</p>\r\n\r\n<p>2014-ci ildə ölkəyə qayıtdım və Azərbaycan Universitetinin “Kompüter Elmləri” ixtisasına qəbul oldum.</p>\r\n\r\n<p>Həmin ildən başlayaraq müxtəlif yerlərdə çalışdım, həmin şirkətlər adına müxtəlif layihələrdə iştirak etdim.</p>\r\n\r\n<p>Amma ən əsası mənə ən gözəl dövrləri, ən gözəl dostluqları qazandıran start up layihələrdə iştirak etdim.</p>\r\n\r\n<p>Bütün layihələri batırdım :)</p>\r\n\r\n<p>2017 – ci il sonlarına yaxın Yup Technology şirkətini qurduqdan sonra həyatımda yeni bir dövr başladı. Yeni insanlar, dostluqlar qazandım.\r\n</p>\r\n<p>Dəstək olduğu qədər, mane olmağa çalışanlar da az olmadı :)</p>\r\n\r\n<p>Hər zaman mənfi rəylərin olması məni daha da gücləndirdi və bütün bu mənfi hadisələrə baxmayaraq 2019-cu ildə Yup Technology-nin İstanbul filialının açılışını etdim.</p>\r\n\r\n<p>Və bunlardan ən əsası çox gözəl bir ailəm və dünyalar gözəli Hümeyra adlı bir qızım və Murad adlı bir oğlum var :)</p>', 'about-image.jpg', '+ 99 455 211 22 80', '+ 99 412 594 69 21', 'hello@ayyubhajiyev.com', 'Yasamal r. Ş. Qurbanov 1', 'https://www.facebook.com/ayyubhajiyevv', 'https://www.instagram.com/ayyubhajiyevv/', 'https://www.linkedin.com/in/ayyub-hajiyev-04a347116/', 'https://www.youtube.com/channel/UCqvQTSYrjoWDU90qRbyImBw', 'https://github.com/ayyubhaciyev');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'key', NULL, NULL),
(2, ' test', NULL, NULL),
(3, ' bir', NULL, NULL),
(4, ' iki', NULL, NULL),
(5, 'test', NULL, NULL),
(6, ' key', NULL, NULL),
(7, ' lm', NULL, NULL),
(13, 'lm', NULL, NULL),
(17, 'hekimler', NULL, NULL),
(18, 'doctor', NULL, NULL),
(19, 'web page', NULL, NULL),
(20, 'ajhdkaj', NULL, NULL),
(25, 'blog', NULL, NULL),
(26, 'proqramlasdirma', NULL, NULL),
(31, 'vpn', NULL, NULL),
(32, 'it', NULL, NULL),
(33, 'python', NULL, NULL),
(34, 'java', NULL, NULL),
(35, 'adsadsa', NULL, NULL),
(38, 'front-end', NULL, NULL),
(39, 'back-end', NULL, NULL),
(40, 'turing', NULL, NULL),
(41, 'Octothorpe', NULL, NULL),
(42, 'UNIX', NULL, NULL),
(43, 'HTML', NULL, NULL),
(44, 'CSS', NULL, NULL),
(45, 'JS', NULL, NULL),
(46, 'ROOT', NULL, NULL),
(47, 'PROMPT', NULL, NULL),
(48, 'Oberon', NULL, NULL),
(49, 'DSR', NULL, NULL),
(50, 'developer', NULL, NULL),
(56, 'ui', NULL, NULL),
(58, 'mirta', NULL, NULL),
(59, 'ahh yee', NULL, NULL),
(65, 'sadas', NULL, NULL),
(66, 'adada', NULL, NULL),
(68, 'adsadas', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` enum('Admin','Moderator','Author') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_github` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_behance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `roles`, `author_about`, `author_facebook`, `author_instagram`, `author_linkedin`, `author_github`, `author_behance`, `author_twitter`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(16, 'Əyyub Hacıyev', 'eyyubhaciyevv@gmail.com', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'avatar.jpg', NULL, '$2y$10$Y.tb3q4Knc2Jc1qXQEoU6uHPkoJKtKbZfyQIrqSr2F.yDykhTabqG', NULL, '2021-07-17 10:41:19', '2021-07-17 10:41:19'),
(17, 'Cahandar Quliyev', 'cahan@gmail.com', 'Moderator', 'haqqindadf', NULL, NULL, NULL, NULL, NULL, NULL, 'u5mj1lUg1H9AtsUq.jpg', NULL, '$2y$10$Y.tb3q4Knc2Jc1qXQEoU6uHPkoJKtKbZfyQIrqSr2F.yDykhTabqG', NULL, NULL, '2021-08-13 14:55:57'),
(23, 'Kənan Kamranoğlu', 'kenan@gmail.com', 'Author', NULL, 'https://stackoverflow.com/', NULL, NULL, NULL, NULL, NULL, 'avatar.jpg', NULL, '$2y$10$XUIp0Stg6SMk0mqWv1WRhOqoa9o3RyB3ir3RSgkhv2j0ZeNKElWtS', NULL, '2021-08-14 09:25:26', '2021-08-14 10:51:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newslatter`
--
ALTER TABLE `newslatter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `newslatter_message`
--
ALTER TABLE `newslatter_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `newslatter`
--
ALTER TABLE `newslatter`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `newslatter_message`
--
ALTER TABLE `newslatter_message`
  MODIFY `id` bigint(22) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
