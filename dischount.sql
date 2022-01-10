-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2022 pada 23.51
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dischount`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` int(11) NOT NULL,
  `id_kategori_diskon` int(11) NOT NULL,
  `nama_diskon` varchar(255) NOT NULL,
  `deskripsi` varchar(1000) DEFAULT NULL,
  `gambar_diskon` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `id_kategori_diskon`, `nama_diskon`, `deskripsi`, `gambar_diskon`, `created_at`, `updated_at`) VALUES
(2, 1, 'Lazada 10%', 'gini ini', 'diskon/Diskon2_1641457560863unnamed (1).jpg', '2022-01-05 18:26:00', '2022-01-05 18:26:00'),
(3, 3, 'Shopee 30%', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'diskon/Diskon3_1641461511799unnamed.jpg', '2022-01-05 19:31:51', '2022-01-05 19:31:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_diskon`
--

CREATE TABLE `kategori_diskon` (
  `id_kategori_diskon` int(11) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_diskon`
--

INSERT INTO `kategori_diskon` (`id_kategori_diskon`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Kupon', '2022-01-05 18:17:45', '2022-01-05 18:19:08'),
(3, 'Voucher', '2022-01-05 19:30:33', '2022-01-05 19:30:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `klaim_diskon`
--

CREATE TABLE `klaim_diskon` (
  `id_membership` int(11) NOT NULL,
  `id_diskon` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `klaim_diskon`
--

INSERT INTO `klaim_diskon` (`id_membership`, `id_diskon`, `created_at`, `updated_at`) VALUES
(1, 3, '2022-01-06 02:35:28', '2022-01-06 02:35:28'),
(2, 3, '2022-01-06 13:43:37', '2022-01-06 13:43:37'),
(1, 2, '2022-01-06 19:50:07', '2022-01-06 19:50:07'),
(2, 2, '2022-01-07 14:38:32', '2022-01-07 14:38:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_diskon`
--

CREATE TABLE `lokasi_diskon` (
  `id_lokasi_diskon` int(11) NOT NULL,
  `id_diskon` int(11) NOT NULL,
  `nama_kota` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lokasi_diskon`
--

INSERT INTO `lokasi_diskon` (`id_lokasi_diskon`, `id_diskon`, `nama_kota`, `created_at`, `updated_at`) VALUES
(1, 2, 'Kabupaten Malang', '2022-01-05 19:20:33', '2022-01-05 19:22:52'),
(3, 2, 'Kota Surabaya', '2022-01-06 01:37:18', '2022-01-06 01:37:18'),
(4, 3, 'Kota Malang', '2022-01-06 17:53:03', '2022-01-06 17:53:03'),
(5, 3, 'Kota Batu', '2022-01-06 17:53:17', '2022-01-06 17:53:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `membership`
--

CREATE TABLE `membership` (
  `id_membership` int(11) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `no_telp` varchar(100) DEFAULT NULL,
  `alamat` varchar(1000) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `membership`
--

INSERT INTO `membership` (`id_membership`, `id_user`, `nama_lengkap`, `no_telp`, `alamat`, `kota`, `created_at`, `updated_at`) VALUES
(1, 2, 'Dion Maulana W', '09876789', 'Jl.ncje oke', 'Kota Malang', '2022-01-06 08:50:50', '2022-01-06 19:24:41'),
(2, 17, 'dion11', NULL, NULL, NULL, '2022-01-06 13:43:12', '2022-01-07 15:18:34'),
(3, 19, 'Ani3', NULL, NULL, NULL, '2022-01-07 15:04:52', '2022-01-07 15:20:19'),
(4, 21, 'dodik set', '0987', 'Jl. Prof. Moch. Yamin', 'Kota Malang', '2022-01-07 15:46:32', '2022-01-07 15:47:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review_diskon`
--

CREATE TABLE `review_diskon` (
  `id_review_diskon` int(11) NOT NULL,
  `id_diskon` int(11) NOT NULL,
  `id_membership` int(11) NOT NULL,
  `isi_review` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `review_diskon`
--

INSERT INTO `review_diskon` (`id_review_diskon`, `id_diskon`, `id_membership`, `isi_review`, `created_at`, `updated_at`) VALUES
(2, 3, 2, 'Sangat bisa digunakan', '2022-01-06 14:04:12', '2022-01-06 14:04:12'),
(3, 2, 2, 'bermanfaat', '2022-01-07 14:39:01', '2022-01-07 14:39:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_level`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@gmail.com', '2021-06-01 20:28:20', '$2y$10$aQgQOGF4x3xHbx1L7lXWcO3dUh7qnbiuT90BbncYIc6z3EumRS6Tu', '7CBKa5mkOEckzv2VceknU37JSvogtxxm9dXh0RiOdIMS9rVhXo3ydgwqNvlg', '2021-04-30 05:03:41', '2021-04-30 05:12:51'),
(2, 4, 'Dion Maulana W', 'will@gmail.com', '2021-06-02 08:24:33', '$2y$10$FfpeD/zDsEMD6fGlPwA3uO13KFRM6j32D0fTgx37zoP5LHTYtFOsi', 'umdwtlqkb2F2ywWHngYsJga4CZSCGvzeHj1CDAxeG1KDslSfEjXeIfZ4pP1r', '2021-05-26 00:54:41', '2022-01-06 19:23:43'),
(17, 4, 'dion11', 'dion@gmail.com', NULL, '$2y$10$PjEQE6T7MBflbppaKujFt.6KzkhHUTY5Qmc5AyT4yeMH.ZQUC/azO', '8viykhKpY58teTj4iKG1WkG0TTlVcKfl2E3QV3m9zzwvFHOteHKliBCgW8pK', '2022-01-06 13:43:12', '2022-01-07 15:18:34'),
(18, 1, 'Admin 2', 'admin2@gmail.com', NULL, '$2y$10$MJI2I2VB7Fb8tD8BM9N77OjmO3Y8B6XQMarHnUcq4AgFlOY65mZu6', 'zfYffNACnRar0nuqoMaAzIY3yaaK3xa7djHtIHg4wiTbxOtWsdinmDjgaVLV', '2022-01-07 15:02:27', '2022-01-07 15:02:27'),
(19, 4, 'Ani3', 'ani@gmail.com', NULL, '$2y$10$7EpQdSa75zd3nJb0gvjZ1eH8WFY1Xgs4PPSXPNGwECt0pNO/wKo2G', '51dAODqS1SEOLKF3xCIoICMLCn6MGkFG24iefUQ7yfmnmF25wdStGnfXVmxc', '2022-01-07 15:04:52', '2022-01-07 15:20:19'),
(20, 1, 'admin3', 'admin3@gmail.com', NULL, '$2y$10$1KLsLhoPG9bgz3fCTq2czOnep.UkCn2yPfjVosoSgQvK3lHcUitmi', 'HsG9CDD8L2WK5Da0qWKGD87ya0ktFpDpzbrbSxauyYOwTD9fVbWfjm60vQuc', '2022-01-07 15:19:59', '2022-01-07 15:19:59'),
(21, 4, 'dodik set', 'dodik@gmail.com', NULL, '$2y$10$IJrhxzVhkNaUXFPiv53.ouK26s/CwQw3F9KEworpteayEHYUfHCY.', 'vyAgEun0huShS8TzSkmyOrPaCRKTDxkYAmjsE1ZnPjpOXpgxcWgph6hu3Zaw', '2022-01-07 15:46:32', '2022-01-07 15:47:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE `user_level` (
  `id_level` int(11) NOT NULL,
  `deskripsi_level` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_level`
--

INSERT INTO `user_level` (`id_level`, `deskripsi_level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2021-04-30 11:31:06', '2021-04-30 11:31:06'),
(4, 'Pelanggan', '2021-05-26 07:51:10', '2021-05-26 07:51:10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`),
  ADD KEY `fk_kat_diskon` (`id_kategori_diskon`);

--
-- Indeks untuk tabel `kategori_diskon`
--
ALTER TABLE `kategori_diskon`
  ADD PRIMARY KEY (`id_kategori_diskon`);

--
-- Indeks untuk tabel `klaim_diskon`
--
ALTER TABLE `klaim_diskon`
  ADD KEY `fk_klaim_diskon` (`id_diskon`),
  ADD KEY `fk_klaim_member` (`id_membership`);

--
-- Indeks untuk tabel `lokasi_diskon`
--
ALTER TABLE `lokasi_diskon`
  ADD PRIMARY KEY (`id_lokasi_diskon`),
  ADD KEY `fk_lokasi_diskon` (`id_diskon`);

--
-- Indeks untuk tabel `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id_membership`),
  ADD KEY `fk_member` (`id_user`);

--
-- Indeks untuk tabel `review_diskon`
--
ALTER TABLE `review_diskon`
  ADD PRIMARY KEY (`id_review_diskon`),
  ADD KEY `fk_review_diskon` (`id_diskon`),
  ADD KEY `fk_review_member` (`id_membership`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_user_lvl_user_lev` (`id_level`);

--
-- Indeks untuk tabel `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori_diskon`
--
ALTER TABLE `kategori_diskon`
  MODIFY `id_kategori_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `lokasi_diskon`
--
ALTER TABLE `lokasi_diskon`
  MODIFY `id_lokasi_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `membership`
--
ALTER TABLE `membership`
  MODIFY `id_membership` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `review_diskon`
--
ALTER TABLE `review_diskon`
  MODIFY `id_review_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD CONSTRAINT `fk_kat_diskon` FOREIGN KEY (`id_kategori_diskon`) REFERENCES `kategori_diskon` (`id_kategori_diskon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `klaim_diskon`
--
ALTER TABLE `klaim_diskon`
  ADD CONSTRAINT `fk_klaim_diskon` FOREIGN KEY (`id_diskon`) REFERENCES `diskon` (`id_diskon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_klaim_member` FOREIGN KEY (`id_membership`) REFERENCES `membership` (`id_membership`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lokasi_diskon`
--
ALTER TABLE `lokasi_diskon`
  ADD CONSTRAINT `fk_lokasi_diskon` FOREIGN KEY (`id_diskon`) REFERENCES `diskon` (`id_diskon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `fk_member` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `review_diskon`
--
ALTER TABLE `review_diskon`
  ADD CONSTRAINT `fk_review_diskon` FOREIGN KEY (`id_diskon`) REFERENCES `diskon` (`id_diskon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_review_member` FOREIGN KEY (`id_membership`) REFERENCES `membership` (`id_membership`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_level` FOREIGN KEY (`id_level`) REFERENCES `user_level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
