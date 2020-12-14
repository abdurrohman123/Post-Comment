-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Des 2020 pada 19.09
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sosmed`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Private', 'private-post', '2020-11-16 17:00:00', '2020-11-16 17:00:00'),
(2, 'Public', 'public-post', '2020-11-16 17:00:00', '2020-11-16 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `massage` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `massage`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 'aaaakkk', '2020-11-17 02:28:23', '2020-11-23 22:17:05'),
(17, 6, 1, 'Ahmad Test 66', '2020-11-17 07:17:57', '2020-11-24 18:41:39'),
(21, 14, 1, 'hiiiii', '2020-11-23 20:30:29', '2020-11-23 20:30:29'),
(26, 9, 1, '123456', '2020-11-23 22:03:49', '2020-11-25 01:39:36'),
(32, 7, 1, 'Ax', '2020-11-23 22:17:57', '2020-11-24 00:58:21'),
(34, 6, 2, 'aa', '2020-11-25 00:53:24', '2020-11-25 00:53:24'),
(35, 9, 2, '654321', '2020-11-25 00:59:00', '2020-11-25 01:39:46'),
(40, 9, 2, 'a', '2020-11-25 01:58:03', '2020-11-25 01:58:03'),
(41, 9, 2, 'a', '2020-11-25 01:59:22', '2020-11-25 01:59:22'),
(43, 6, 1, 'asdasda', '2020-12-12 12:13:05', '2020-12-12 12:13:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `comment_id`, `user_id`, `created_at`, `updated_at`) VALUES
(71, NULL, 7, 1, '2020-11-23 20:08:31', '2020-11-23 20:08:31'),
(77, NULL, 17, 1, '2020-11-23 23:36:38', '2020-11-23 23:36:38'),
(82, NULL, 32, 1, '2020-11-24 00:59:03', '2020-11-24 00:59:03'),
(83, NULL, 31, 1, '2020-11-24 01:00:14', '2020-11-24 01:00:14'),
(86, 13, NULL, 1, '2020-11-24 20:28:53', '2020-11-24 20:28:53'),
(87, 9, NULL, 2, '2020-11-25 02:14:04', '2020-11-25 02:14:04'),
(88, NULL, 36, 2, '2020-11-25 02:22:50', '2020-11-25 02:22:50'),
(89, 13, NULL, 2, '2020-12-11 01:50:43', '2020-12-11 01:50:43'),
(90, 6, NULL, 1, '2020-12-12 12:13:13', '2020-12-12 12:13:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `upload` text DEFAULT NULL,
  `content` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `slug`, `upload`, `content`, `status`, `created_at`, `updated_at`) VALUES
(6, 1, 1, 'Aditya Muhammad Putra', 'aditya-muhammad-putra', NULL, 'Test Uji Contenty', NULL, '2020-11-16 20:32:18', '2020-12-05 22:16:37'),
(7, 1, 2, 'AANG-Avatar', 'aang-avatar', NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, tenetur voluptates nobis dolor, deserunt dignissimos accusamus, officia architecto aperiam dolorum soluta dolorem iste. Perferendis deserunt dolor nihil doloremque architecto reiciendis?', NULL, '2020-11-16 20:32:57', '2020-12-05 23:39:55'),
(9, 2, 1, 'Ahmad', 'ahmad', NULL, 'Ahmad Mau Comment Bang', NULL, '2020-11-16 21:51:34', '2020-12-05 23:08:26'),
(13, 1, 2, 'Ahlan', 'adsdadad', NULL, 'Assalamu\'alaikum', NULL, '2020-11-19 03:43:21', '2020-12-05 23:39:57'),
(16, 2, 1, 'test', 'test', 'DSC03224.JPG', 'AAA', NULL, '2020-11-25 05:27:52', '2020-12-05 22:16:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_hides`
--

CREATE TABLE `post_hides` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `hide` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `post_hides`
--

INSERT INTO `post_hides` (`id`, `user_id`, `post_id`, `hide`, `created_at`, `updated_at`) VALUES
(41, 2, 13, NULL, '2020-12-14 06:16:04', '2020-12-14 06:16:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reports`
--

INSERT INTO `reports` (`id`, `post_id`, `comment_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 17, NULL, 1, '2020-11-24 18:18:13', '2020-11-24 18:18:13'),
(9, NULL, 7, 1, '2020-11-24 18:30:22', '2020-11-24 18:30:22'),
(19, NULL, 31, 1, '2020-11-24 18:33:28', '2020-11-24 18:33:28'),
(26, 9, NULL, 1, '2020-11-24 20:24:45', '2020-11-24 20:24:45'),
(37, 6, NULL, 1, '2020-11-25 00:36:39', '2020-11-25 00:36:39'),
(38, NULL, 17, 1, '2020-11-25 00:37:28', '2020-11-25 00:37:28'),
(43, NULL, 38, 2, '2020-11-25 01:48:18', '2020-11-25 01:48:18'),
(44, NULL, 39, 2, '2020-11-25 01:48:20', '2020-11-25 01:48:20'),
(45, NULL, 36, 2, '2020-11-25 02:22:49', '2020-11-25 02:22:49'),
(49, 9, NULL, 2, '2020-12-04 01:03:55', '2020-12-04 01:03:55'),
(50, 7, NULL, 2, '2020-12-04 01:10:48', '2020-12-04 01:10:48'),
(55, 6, NULL, 2, '2020-12-05 02:04:33', '2020-12-05 02:04:33'),
(56, NULL, 32, 2, '2020-12-11 04:54:55', '2020-12-11 04:54:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `nohp`, `avatar`, `alamat`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abdurrohman Muthi', 'admin@gmail.com', '089665435xx', '/avatar/admin@gmail.com20201118043929.jpg', 'Cinagara, Jawa Timur Kabupaten Timor Leste', NULL, '$2y$10$MKygAhA2cPAidJ9t3QBquOfAagtBTfpPLuWUYR5bk3q6FuEf9ZGwG', NULL, '2020-11-16 19:08:44', '2020-11-17 21:39:29'),
(2, 'Ahmad Budayanti', 'user@gmail.com', '08571213151', '/avatar/user@gmail.com20201118034633.jpg', 'Karawang, Jawa Barat, India', NULL, '$2y$10$ZsOZ2K1T5er/7kwduyHQV.Z/C4LFoduxX8D4aQp6zQr12dPai00LC', 'hkuOkgFb6myO2iYXfVfL2NL0eU7YfDgBG8lQNrztAv6aTC73QSxOQLFRyLil', '2020-11-16 21:49:52', '2020-11-17 20:46:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `post_hides`
--
ALTER TABLE `post_hides`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `post_hides`
--
ALTER TABLE `post_hides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
