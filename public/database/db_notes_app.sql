-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Okt 2023 pada 14.30
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_notes_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_11_091937_create_notes_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` char(3) NOT NULL,
  `notes` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `notes`, `created_at`, `updated_at`) VALUES
(1, '26', 'ini catatanku lo mas bro', '2023-10-13 06:43:41', '2023-10-13 06:43:41'),
(2, '26', 'ini catatanku yang kedua mas bro', '2023-10-13 06:45:47', '2023-10-13 06:45:47'),
(3, '26', 'ini catatanku yang kedua mas bro', '2023-10-13 06:47:08', '2023-10-13 06:47:08'),
(4, '26', 'nkjn', '2023-10-13 06:47:47', '2023-10-13 06:47:47'),
(5, '26', 'sdasdasda23123', '2023-10-13 06:49:49', '2023-10-13 06:49:49'),
(6, '26', 'adasdsadasd', '2023-10-13 06:53:35', '2023-10-13 06:53:35'),
(7, '26', 'asdadadqwojqoie123', '2023-10-13 06:54:43', '2023-10-13 06:54:43'),
(8, '26', 'ini cara gue', '2023-10-13 06:56:31', '2023-10-13 08:53:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number_phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `number_phone`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Miftakul Huda', 'huda@gmail.com', '12345678', '$2y$10$Ym0Xti0IAjFlGVmOYooVcOujIlP9DzV4V2wpktDV15bQbq7ufN08O', 'user', '2023-10-11 05:47:27', '2023-10-11 05:47:27'),
(2, 'test', 'test@gmail.com', '123123123', '$2y$10$vQbq.rBcxrUIhwkcAaSShOOnYMVJqgj3gJqLKwGhiSHzCDjWG.aba', 'user', '2023-10-11 05:48:30', '2023-10-11 05:48:30'),
(3, 'asdasdasd', 'adsasdasd@gmail.com', '123451231', '$2y$10$KuWMDFPf5CUtMdqi2mFWcu2ofp7Ms0QFnrBUv6b57SrDjhp8FOm/u', 'user', '2023-10-11 05:52:58', '2023-10-11 05:52:58'),
(4, 'qweqweqe', 'joko@gmail.com', '13213123', '$2y$10$yMW3/sPIg1AUu7AGAXoMeOTIkAi8YmS/Fgsic/voU9qd7ufb4Ol.O', 'user', '2023-10-11 06:00:09', '2023-10-11 06:00:09'),
(5, 'Rizal', 'rizal@gmail.com', '0876514251', '$2y$10$p8J3WbuEt5wZpsTyQLkIx.9I5QKrU2IN1p1UQylSApTiJRHeeAZYa', 'user', '2023-10-11 06:24:05', '2023-10-11 06:24:05'),
(6, 'Budi', 'admin@gmail.com', '08876153412', '$2y$10$94z/D4e.MdMFinbsTT1XFuWRCoH.5EEe10PS6dOeHxRHN6aDCO4d6', 'admin', '2023-10-11 07:59:23', '2023-10-11 07:59:23'),
(9, 'andi', 'andi@gmail.com', '123123', '$2y$10$9nn.NSaqKefPkzSgYlirs.24PcjQtFf3HeCNhyCDepC4GGeF9Yriu', 'admin', '2023-10-11 16:56:22', '2023-10-11 16:56:22'),
(10, 'putra', 'putra@gmail.com', '123', '$2y$10$7CEXU7YZsoAYcssXSXGfNOcQsq0M8zUsq.P26vUktqrWV1m0OFm1u', 'editor', '2023-10-11 16:57:57', '2023-10-12 07:45:16'),
(26, 'fajar', 'fajar@gmail.com', '12121221', '$2y$10$2JztlcmfIddfgWBKLfzBK.Q4/lSaIwn.S/RV45.LIZKvkQIxgp7p.', 'editor', '2023-10-12 09:06:26', '2023-10-12 09:06:26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
