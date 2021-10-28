-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 Eki 2021, 19:11:56
-- Sunucu sürümü: 10.4.20-MariaDB
-- PHP Sürümü: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `aztu_cyber`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `about`
--

INSERT INTO `about` (`id`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'about.webp', '2021-09-09 14:25:44', '2021-09-09 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` int(11) NOT NULL COMMENT 'suala cavabdisa 0 şərhə cavabdısa 1',
  `answer_comment_id` int(11) NOT NULL DEFAULT 0 COMMENT 'başdakı şərhin id si',
  `answer_user_id` int(11) NOT NULL COMMENT 'cavab yazilan serhin sahibinin id si',
  `comment` text NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '2',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `question_id`, `answer`, `answer_comment_id`, `answer_user_id`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(19, 30, 6, 0, 0, 0, 'mence video kartla elaqelidi', '0', '2021-10-03 11:15:51', '2021-10-03 11:15:51'),
(20, 16, 6, 1, 19, 30, 'video karti nece duzelde bilerem bes', '1', '2021-10-03 11:16:31', '2021-10-03 11:16:31'),
(27, 30, 6, 1, 19, 16, 'bilmirem', '1', '2021-10-03 18:56:22', '2021-10-03 18:56:22'),
(29, 16, 9, 0, 0, 0, 'Ubuntu Linux nüvəli Açıq Qaynaq Kodlu əməliyyat sistemidir. (Vindovs kimi) Server və Desktop tipli iki növü var', '1', '2021-10-14 13:13:15', '2021-10-14 13:13:15');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT ' 0 gozlemededi 1 cavab verilib',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Emil İslamov', 'emilislm97@gmail.com', 'Ele bele mirta', '1', '2021-09-20 06:37:43', '2021-09-20 06:37:43');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT 0,
  `type` enum('xeber','meqale') DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `slug` varchar(300) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `status` enum('0','1','2') DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `news`
--

INSERT INTO `news` (`id`, `author_id`, `type`, `name`, `slug`, `content`, `image`, `status`, `created_at`, `updated_at`) VALUES
(103, 16, 'meqale', 'Elon Musk-In Humanoid Robotu Tesla Bot', 'aaa', 'Keçdiyimiz aylarda Elon Musk, şirkətin hazırladığı Tesla Bot adlı insana bənzər robotu təqdim etdi. Tesla Bot nə edə bilər, xüsusiyyətləri nələrdir ətraflı şəkildə xəbərimizdə.\n\nElon Musk, Tesla Bot humanoid robotunun  insanların nifrət etdiyi, təkrarlayan, cansıxıcı işlərəni kömək etmək üçün hazırlanacağını dedi. Məsələn, marketə getmək və ya evi təmizləmək kimi vəzifələri yerinə yetirəcək.', '1/aaa.webp', '1', '2021-09-06', '2021-09-07'),
(104, 16, 'meqale', 'Apple Tədbirinə Sayılı Günlər Qalıb', 'Apple Tədbirinə Sayılı Günlər Qalıb', 'Apple tədbirinə sayılı günlər qalıb. Apple tərəfindən təqdim olunan məhsullar nələr olacaq.\n\nApple 14 sentyabrda gözlənilən tədbiri açıqladı. Bu tədbirə iPhone 13 də daxil olmaqla bir çox məhsulun gələcəyi gözlənilir.\n\nMark Qurmanın sözlərinə görə, dörd fərqli modeldən ibarət olan iPhone 13 ailəsi 14 sentyabr tədbirində təqdim ediləcək. Tədbirdə, iPhone\'lara əlavə olaraq, çoxdan gözlənilən simsiz qulaqlıq AirPods 3 və iPad Pro dizaynlı iPad mini 6-nın da təqdim ediləcəyi bildirildi.Apple Watch Series 7 ağıllı saat modeli, tədbirdə mütləq yer alacaq əhəmiyyətli məhsullar arasındadır.', '104/bbbb.webp', '1', '2021-09-08', NULL),
(105, 16, 'meqale', 'Apple Tədbirinə Sayılı Günlər Qalıb', 'Apple Tədbirinə Sayılı Günlər Qalıb', 'Apple tədbirinə sayılı günlər qalıb. Apple tərəfindən təqdim olunan məhsullar nələr olacaq.\n\nApple 14 sentyabrda gözlənilən tədbiri açıqladı. Bu tədbirə iPhone 13 də daxil olmaqla bir çox məhsulun gələcəyi gözlənilir.\n\nMark Qurmanın sözlərinə görə, dörd fərqli modeldən ibarət olan iPhone 13 ailəsi 14 sentyabr tədbirində təqdim ediləcək. Tədbirdə, iPhone\'lara əlavə olaraq, çoxdan gözlənilən simsiz qulaqlıq AirPods 3 və iPad Pro dizaynlı iPad mini 6-nın da təqdim ediləcəyi bildirildi.Apple Watch Series 7 ağıllı saat modeli, tədbirdə mütləq yer alacaq əhəmiyyətli məhsullar arasındadır.', '104/bbbb.webp', '1', '2021-09-08', NULL),
(106, 16, 'meqale', 'Apple Tədbirinə Sayılı Günlər Qalıb', 'Apple Tədbirinə Sayılı Günlər Qalıb', 'Apple tədbirinə sayılı günlər qalıb. Apple tərəfindən təqdim olunan məhsullar nələr olacaq.\n\nApple 14 sentyabrda gözlənilən tədbiri açıqladı. Bu tədbirə iPhone 13 də daxil olmaqla bir çox məhsulun gələcəyi gözlənilir.\n\nMark Qurmanın sözlərinə görə, dörd fərqli modeldən ibarət olan iPhone 13 ailəsi 14 sentyabr tədbirində təqdim ediləcək. Tədbirdə, iPhone\'lara əlavə olaraq, çoxdan gözlənilən simsiz qulaqlıq AirPods 3 və iPad Pro dizaynlı iPad mini 6-nın da təqdim ediləcəyi bildirildi.Apple Watch Series 7 ağıllı saat modeli, tədbirdə mütləq yer alacaq əhəmiyyətli məhsullar arasındadır.', '104/bbbb.webp', '1', '2021-09-08', NULL),
(107, 16, 'meqale', ' Musk-In Humanoid Robotu Tesla Bot', 'aaa', 'Keçdiyimiz aylarda Elon Musk, şirkətin hazırladığı Tesla Bot adlı insana bənzər robotu təqdim etdi. Tesla Bot nə edə bilər, xüsusiyyətləri nələrdir ətraflı şəkildə xəbərimizdə.\r\n\r\nElon Musk, Tesla Bot humanoid robotunun  insanların nifrət etdiyi, təkrarlayan, cansıxıcı işlərəni kömək etmək üçün hazırlanacağını dedi. Məsələn, marketə getmək və ya evi təmizləmək kimi vəzifələri yerinə yetirəcək.', '1/aaa.webp', '1', '2021-09-06', '2021-09-07'),
(108, 16, 'xeber', 'Apple Tədbirinə Sayılı Günlər Qalıb', 'Apple Tədbirinə Sayılı Günlər Qalıb', 'Apple tədbirinə sayılı günlər qalıb. Apple tərəfindən təqdim olunan məhsullar nələr olacaq.\r\n\r\nApple 14 sentyabrda gözlənilən tədbiri açıqladı. Bu tədbirə iPhone 13 də daxil olmaqla bir çox məhsulun gələcəyi gözlənilir.\r\n\r\nMark Qurmanın sözlərinə görə, dörd fərqli modeldən ibarət olan iPhone 13 ailəsi 14 sentyabr tədbirində təqdim ediləcək. Tədbirdə, iPhone\'lara əlavə olaraq, çoxdan gözlənilən simsiz qulaqlıq AirPods 3 və iPad Pro dizaynlı iPad mini 6-nın da təqdim ediləcəyi bildirildi.Apple Watch Series 7 ağıllı saat modeli, tədbirdə mütləq yer alacaq əhəmiyyətli məhsullar arasındadır.', '104/bbbb.webp', '1', '2021-09-08', NULL),
(109, 16, 'xeber', 'Apple Tədbirinə Sayılı Günlər Qalıb', 'Apple Tədbirinə Sayılı Günlər Qalıb', 'Apple tədbirinə sayılı günlər qalıb. Apple tərəfindən təqdim olunan məhsullar nələr olacaq.\r\n\r\nApple 14 sentyabrda gözlənilən tədbiri açıqladı. Bu tədbirə iPhone 13 də daxil olmaqla bir çox məhsulun gələcəyi gözlənilir.\r\n\r\nMark Qurmanın sözlərinə görə, dörd fərqli modeldən ibarət olan iPhone 13 ailəsi 14 sentyabr tədbirində təqdim ediləcək. Tədbirdə, iPhone\'lara əlavə olaraq, çoxdan gözlənilən simsiz qulaqlıq AirPods 3 və iPad Pro dizaynlı iPad mini 6-nın da təqdim ediləcəyi bildirildi.Apple Watch Series 7 ağıllı saat modeli, tədbirdə mütləq yer alacaq əhəmiyyətli məhsullar arasındadır.', '104/bbbb.webp', '1', '2021-09-08', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '2',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `question`
--

INSERT INTO `question` (`id`, `user_id`, `question`, `status`, `created_at`, `updated_at`) VALUES
(1, 30, 'Komputer biraz işlədikdən sonra qızır və sönür. Bu problem düzələ bilər? Mən bunu düzəlməyi üçün nə edə bilərəm?', '1', '2021-09-06 22:41:46', '2021-09-06 22:41:46'),
(6, 16, 'Mən komputeri yandırarkən göy qırmızı rəngdə qarışıq rənglər çıxır, windows yükləndikdən sonra mavi ekran açılır və qəribə yazılar yazılır. Amma 5 – 10 dəqiqədən sonra restart verdikdə normal açılır. Məncə ekran kartındadı problem. Bilən varsa necə düzəldə bilərəm?\r\nİndidən təşəkkür!!!', '1', '2021-10-02 12:57:33', '2021-10-15 12:41:03'),
(9, 76, 'Ubuntu nədir?', '1', '2021-10-03 19:38:28', '2021-10-03 19:38:28'),
(11, 16, 'ttt', '2', '2021-10-15 11:49:05', '2021-10-15 12:33:37');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `map` text DEFAULT NULL,
  `number` varchar(55) DEFAULT NULL,
  `fax` varchar(55) DEFAULT NULL,
  `instagram` varchar(55) DEFAULT NULL,
  `facebook` varchar(55) DEFAULT NULL,
  `twitter` varchar(55) DEFAULT NULL,
  `telegram` varchar(55) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `setting`
--

INSERT INTO `setting` (`id`, `logo`, `content`, `map`, `number`, `fax`, `instagram`, `facebook`, `twitter`, `telegram`, `created_at`, `updated_at`) VALUES
(1, 'main-light.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, dolorum? Id sint iusto delectus nam iste dolor incidunt esse! Voluptatibus, architecto. Ullam laudantium culpa deleniti?', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3039.7483175231146!2d49.813257115666076!3d40.37010466639723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307dc397d94dc3%3A0x617bc46b47244c00!2sAz%C9%99rbaycan%20Texniki%20Universiteti!5e0!3m2!1saz!2s!4v1631208817261!5m2!1saz!2s', '+994-55-666-77-88', '+994-55-666-77-88', 'https://www.instagram.com/', 'https://www.instagram.com/', 'https://www.twitter.com/', 'https://www.telegram.com/', '2021-07-17 14:41:19', '2021-09-22 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT ' 0 admin  1 user',
  `image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `confirm` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `image`, `gender`, `status`, `confirm`, `token`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(16, 'Şəhla Əliyeva', 'test@gmail.com', '0', 'avatar.png', NULL, '1', '1', NULL, '$2y$10$Tq4/tsxYC9i7EyBetmAdH.wm/smkdnEzRLU2E7dPsuPrZM/kb2oVe', 'wcpBTWMgdHTR2YQ56qrOHYXAD4DRccXCRICTqqzlwtp0dzP2jb3hjy1VTmtX', '2021-07-17 10:41:19', '2021-09-09 13:23:34'),
(30, 'Emil Islamov', 'emilislm97@gmail.com', '1', 'male.png', 'male', '1', '1', NULL, '$2y$10$ItYJHbiKibrHt9cCGRH9teq12ERAdgV183JtgnlzEAL9aCQpa4Hru', NULL, '2021-09-20 19:17:38', '2021-09-20 19:17:38'),
(76, 'Müşviq', 'm@gmail.com', '1', 'male.png', 'male', '1', '1', NULL, '$2y$10$aTRtVVusIMU2WREi52Wmhu41yLjlPcBEFd1J40uAcKKOWm09VgUKG', NULL, '2021-10-03 15:36:35', '2021-10-03 15:36:58');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `vacancy`
--

CREATE TABLE `vacancy` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `vacancy`
--

INSERT INTO `vacancy` (`id`, `user_id`, `title`, `content`, `status`, `created_at`, `updated_at`) VALUES
(2, 16, 'Back-end Proqramçı axtarılır  Maaş 500-700', '<p><span style=\"font-size: 1rem;\">Istəniən</span><br></p><p>3 il təcrübə</p><p>Texniki İngilis dili</p><p><br></p>', '1', '2021-09-09 00:00:00', NULL),
(3, 16, 'Front-end Proqramçı axtarılır  Maaş 500', '<p><span style=\"font-size: 1rem;\">Istəniən</span><br></p><p>3 il təcrübə</p><p>Texniki İngilis dili</p><p><br></p>', '1', '2021-09-09 00:00:00', NULL),
(4, 16, 'IT Adminstrator axtarılır Maaş 900', '<p><span style=\"font-size: 1rem;\">Istəniən</span><br></p><p>3 il təcrübə</p><p>Texniki İngilis dili</p><p><br></p>', '1', '2021-09-09 00:00:00', NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Tablo için indeksler `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Tablo için AUTO_INCREMENT değeri `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Tablo için AUTO_INCREMENT değeri `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Tablo için AUTO_INCREMENT değeri `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Tablo için AUTO_INCREMENT değeri `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
