-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 16 Des 2022 pada 10.36
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbyayasantiga`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anak_asuh`
--

CREATE TABLE `anak_asuh` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `tmp_lahir` varchar(45) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` enum('Laki-Laki','Perempuan') NOT NULL,
  `pendidikan` varchar(45) NOT NULL,
  `foto` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anak_asuh`
--

INSERT INTO `anak_asuh` (`id`, `nama`, `tmp_lahir`, `tgl_lahir`, `gender`, `pendidikan`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Jamal Abidin', 'Bogor', '2008-12-16', 'Laki-Laki', 'SMP', 'foto-Jamal Abidin.jpg', NULL, '2022-11-20 08:48:57'),
(2, 'Sinta Larasati', 'Depok', '2007-11-21', 'Perempuan', 'SMP', 'foto-Sinta Larasati.jpg', NULL, '2022-12-04 16:07:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi`
--

CREATE TABLE `donasi` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(45) NOT NULL,
  `tgl_donasi` date NOT NULL,
  `jml_donasi` double NOT NULL,
  `donatur_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `donasi`
--

INSERT INTO `donasi` (`id`, `keterangan`, `tgl_donasi`, `jml_donasi`, `donatur_id`, `created_at`, `updated_at`) VALUES
(1, 'Donasi Infastruktur Yayasan', '2022-09-14', 1000000, 1, NULL, NULL),
(2, 'Donasi Biaya Pendidikan Anak Asuh', '2022-08-17', 7000000, 2, NULL, '2022-12-05 16:23:13'),
(7, 'Hello Semuanya 777', '2022-11-27', 4000000, 1, '2022-12-05 17:10:31', '2022-12-05 17:10:31'),
(8, 'Hallo semoga bisa ya dalam aacar ini', '2022-11-29', 2000000, 3, '2022-12-05 17:15:00', '2022-12-05 17:15:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donatur`
--

CREATE TABLE `donatur` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `no_hp` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `donatur`
--

INSERT INTO `donatur` (`id`, `nama`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, 'Jaenudin Akbar', '098744356723', NULL, NULL),
(2, 'Suhendi Mangkualam', '089823547682', NULL, NULL),
(3, 'Ade Ramanda', '082867352883', '2022-11-13 01:55:13', '2022-11-16 10:32:05'),
(4, 'Jajang Galah', '088766276356', '2022-11-29 01:14:11', '2022-11-29 01:14:11');

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
-- Struktur dari tabel `kategori_kegiatan`
--

CREATE TABLE `kategori_kegiatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_kegiatan`
--

INSERT INTO `kategori_kegiatan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Keagamaan', NULL, '2022-12-04 16:09:41'),
(2, 'Olahraga', NULL, '2022-12-04 16:09:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama`, `tgl_kegiatan`, `deskripsi`, `kategori_id`, `foto`, `created_at`, `updated_at`) VALUES
(3, 'memanah', '2022-11-06', 'Belajar olahraga memanah sesuai sunnah nabi', 2, 'foto-memanah.jpg', '2022-11-29 02:12:53', '2022-12-13 06:56:36'),
(5, 'Kegiatan bagi takjil', '2022-11-28', 'Kegiatan yang dilakukan ketika bulan ramadan tiba', 1, 'foto-Kegiatan bagi takjil.jpg', '2022-12-04 07:45:23', '2022-12-13 06:56:23'),
(6, 'Zakat fitrah', '2022-11-30', 'Zakat ketika masuk bulan ramadan, setahun sekali', 1, 'foto-Zakat fitrah.jpg', '2022-12-04 09:42:42', '2022-12-13 06:56:13');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_09_075240_add_google_id_column', 2);

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
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ketua','sekretaris','bendahara','staff') COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','pengurus') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pengurus',
  `isactive` tinyint(1) NOT NULL DEFAULT 0,
  `foto` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `no_hp`, `email`, `email_verified_at`, `password`, `status`, `role`, `isactive`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'uhuy', '089466352638', 'uhuy@gmail.com', NULL, 'uhuy1231', 'staff', 'admin', 0, '', NULL, '2022-11-20 09:25:27', '2022-12-08 09:24:14'),
(3, 'Admin', '088766276356', 'admin@gmail.com', NULL, '$2y$10$U8sV7lYrcBongJh86Lzs5.sZUMqZ97ClgCdce.bAqAKCP//wZQNjW', 'staff', 'admin', 1, 'foto-.png', NULL, '2022-11-29 09:16:26', '2022-12-07 01:54:37'),
(17, 'syaff', '087654312457', 'syaff@gmail.com', NULL, 'syaff12345', 'ketua', 'admin', 0, 'foto-syaff@gmail.com.jpg', NULL, '2022-12-07 02:05:31', '2022-12-08 06:15:25'),
(18, 'Rudi', '087642109816', 'rudi@gmail.com', NULL, '$2y$10$XVrmGFxz1o/t2fcqL4Z1r.Q9K1N2VEW8juJ6shmPmq/LSzvU0Qd9S', 'ketua', 'pengurus', 1, NULL, NULL, '2022-12-08 09:25:32', '2022-12-08 09:25:32');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anak_asuh`
--
ALTER TABLE `anak_asuh`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_donasi_donatur1_idx` (`donatur_id`);

--
-- Indeks untuk tabel `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategori_kegiatan`
--
ALTER TABLE `kategori_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

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
-- AUTO_INCREMENT untuk tabel `anak_asuh`
--
ALTER TABLE `anak_asuh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `donatur`
--
ALTER TABLE `donatur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_kegiatan`
--
ALTER TABLE `kategori_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD CONSTRAINT `fk_donasi_donatur1` FOREIGN KEY (`donatur_id`) REFERENCES `donatur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_kegiatan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
