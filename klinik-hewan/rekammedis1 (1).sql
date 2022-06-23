-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2022 at 01:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekammedis1`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokters`
--

CREATE TABLE `dokters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nm_dokter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spesialis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokters`
--

INSERT INTO `dokters` (`id`, `nm_dokter`, `spesialis`, `phone`, `address`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'FIJAY', 'Dokter Umum', '0812918218', 'Bekasi', '-', '2022-05-11 14:55:24', '2022-05-11 14:55:24'),
(2, 'Pradana', 'Dokter Bedah', '0812918218', 'Jakarta', '-', '2022-05-11 14:55:24', '2022-05-11 14:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `kategori_products`
--

CREATE TABLE `kategori_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_kategori_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_kategori_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_products`
--

INSERT INTO `kategori_products` (`id`, `kd_kategori_product`, `nm_kategori_product`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'JASA', 'JASA', '-', '2022-05-11 14:55:24', '2022-05-11 14:55:24'),
(3, 'OBAT', 'OBAT-OBATAN', '-', '2022-05-11 14:55:24', '2022-05-11 14:55:24'),
(6, 'vksn', 'Vaksin', NULL, '2022-06-08 21:05:30', '2022-06-08 21:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_products`
--

CREATE TABLE `kelas_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_kelas_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_kelas_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas_products`
--

INSERT INTO `kelas_products` (`id`, `kd_kelas_product`, `nm_kelas_product`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'general', 'GENERAL', '-', '2022-05-11 14:55:24', '2022-05-11 14:55:24'),
(2, 'rendah', 'RENDAH', '-', '2022-05-11 14:55:24', '2022-05-11 14:55:24'),
(3, 'sedang', 'SEDANG', '-', '2022-05-11 14:55:24', '2022-05-11 14:55:24'),
(4, 'tinggi', 'TINGGI', '-', '2022-05-11 14:55:24', '2022-05-11 14:55:24'),
(8, '<5kg', '<5kg', '-', '2022-05-11 14:55:24', '2022-05-11 14:55:24'),
(9, '>5kg', '>5kg', '-', '2022-05-11 14:55:24', '2022-05-11 14:55:24'),
(10, '>10kg', '>10kg', '-', '2022-05-11 14:55:24', '2022-05-11 14:55:24');

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
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 1),
(19, '2019_08_19_000000_create_failed_jobs_table', 1),
(20, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(21, '2022_03_08_025626_create_pasiens_table', 1),
(22, '2022_03_08_031253_create_dokters_table', 1),
(23, '2022_03_11_023621_create_kategori_products_table', 1),
(24, '2022_03_11_072412_create_kelas_products_table', 1),
(25, '2022_03_11_084012_create_products_table', 1),
(26, '2022_03_11_154751_create_rekam_medis_table', 1),
(27, '2022_03_11_162829_create_pulang_paksas_table', 1),
(28, '2022_03_11_184158_create_events_table', 1),
(29, '2022_03_12_053953_create_transactions_table', 1),
(30, '2022_03_12_070807_create_transaction_details_table', 1),
(31, '2022_03_15_013718_create_rawat_inaps_table', 1),
(32, '2022_03_15_172403_create_rawat_inap_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pasiens`
--

CREATE TABLE `pasiens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nm_hewan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_hewan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spesies` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_pemilik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasiens`
--

INSERT INTO `pasiens` (`id`, `nm_hewan`, `jenis_hewan`, `spesies`, `sex`, `nm_pemilik`, `phone`, `address`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'MOLY 1', 'KUCING', 'Mongol', 'jantan', 'SAYA', '00', 'BEKASI', '-', '2022-05-11 14:55:24', '2022-05-11 14:55:24'),
(2, 'MOLY 2', 'ANJING', 'Rusia', 'betina', 'KAMU', '00', 'JAKARTA', '-', '2022-05-11 14:55:24', '2022-05-11 14:55:24'),
(3, 'MOLY 3', 'IKAN', 'Rusia', 'jantan', 'DIA', '00', 'KARAWANG', '-', '2022-05-11 14:55:24', '2022-05-11 14:55:24'),
(6, 'Mola', 'kucing', 'anggora', 'jantan', 'Putri', '08', 'Jl.Siliwangi', NULL, '2022-06-08 23:06:33', '2022-06-08 23:06:33'),
(7, 'Headerrr', 'Kuciang', 'anggora', 'betina', 'Bunda', '0896543333251', 'Jalan Pangeran Ganteng', 'Dekat indomaret', '2022-06-09 22:53:49', '2022-06-09 22:54:29');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_product_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_product_id` bigint(20) UNSIGNED NOT NULL,
  `kd_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `kategori_product_id`, `kelas_product_id`, `kd_product`, `nm_product`, `purchase_price`, `sale_price`, `stock`, `remarks`, `created_at`, `updated_at`) VALUES
(13, 6, 1, 'VKSN1', 'VAKSIN 1', 50000, 60000, 99, NULL, '2022-06-08 21:07:32', '2022-06-08 23:10:55'),
(14, 3, 1, 'KLH12', 'Metylpredison', 2000, 3500, 10, NULL, '2022-06-09 23:00:23', '2022-06-09 23:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `pulang_paksas`
--

CREATE TABLE `pulang_paksas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rekam_medis_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_pulang` date NOT NULL,
  `alasan_pulang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rawat_inaps`
--

CREATE TABLE `rawat_inaps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rekam_medis_id` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` bigint(20) UNSIGNED NOT NULL,
  `no_ranap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_ranap` date NOT NULL,
  `total_item` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `total_diskon` int(11) NOT NULL,
  `total_invoice_ranap` int(11) NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rawat_inaps`
--

INSERT INTO `rawat_inaps` (`id`, `rekam_medis_id`, `pasien_id`, `no_ranap`, `tgl_ranap`, `total_item`, `grand_total`, `total_diskon`, `total_invoice_ranap`, `remarks`, `created_at`, `updated_at`) VALUES
(4, 2, 1, 'Ranap-202251610001', '2022-05-16', 0, 0, 0, 0, '-', '2022-05-16 15:45:21', '2022-05-16 15:45:21');

-- --------------------------------------------------------

--
-- Table structure for table `rawat_inap_details`
--

CREATE TABLE `rawat_inap_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rawat_inap_id` bigint(20) UNSIGNED NOT NULL,
  `waktu` datetime NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `disc_amount` int(11) NOT NULL,
  `disc_percent` int(11) NOT NULL,
  `total_disc_line` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` bigint(20) UNSIGNED NOT NULL,
  `no_rm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_rm` date NOT NULL,
  `suhu_tubuh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat_badan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keluhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tindakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`id`, `pasien_id`, `no_rm`, `tgl_rm`, `suhu_tubuh`, `berat_badan`, `age`, `keluhan`, `kondisi`, `diagnosa`, `tindakan`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 1, 'RM-202251410001', '2022-05-15', '123', '8', '7', 'ada', 'normal', 'ada', 'istirahat', 'ada', '2022-05-14 13:16:12', '2022-05-14 13:16:12'),
(2, 1, 'RM-202251610002', '2022-05-17', '30', '10', '9', 'ada', 'normal', 'ada', 'istirahat', 'ada', '2022-05-16 15:15:51', '2022-05-16 15:15:51'),
(3, 7, 'RM-202251610002', '2022-05-17', '30', '10', '3', 'Ada', 'normal', 'ada', 'istirahat', 'ada', '2022-05-16 15:17:18', '2022-06-09 23:02:49'),
(6, 2, 'RM-202261310003', '2022-06-13', 'dipn', 'pnpon', 'ponop', 'pn', 'opnpo', 'ponopn', 'ponop', 'ponopn', '2022-06-13 06:14:02', '2022-06-13 06:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_transaction` date NOT NULL,
  `total_item` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `total_diskon` int(11) NOT NULL,
  `total_invoice` int(11) NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `pasien_id`, `invoice`, `tgl_transaction`, `total_item`, `grand_total`, `total_diskon`, `total_invoice`, `remarks`, `created_at`, `updated_at`) VALUES
(9, 6, 'INV-20226910001', '2022-06-09', 1, 60000, 0, 60000, '-', '2022-06-08 23:10:29', '2022-06-08 23:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `disc_amount` int(11) NOT NULL,
  `disc_percent` int(11) NOT NULL,
  `total_disc_line` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transaction_id`, `product_id`, `harga`, `qty`, `subtotal`, `disc_amount`, `disc_percent`, `total_disc_line`, `total`, `created_at`, `updated_at`) VALUES
(7, 9, 13, 60000, 1, 60000, 0, 0, 0, 60000, '2022-06-08 23:10:43', '2022-06-08 23:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'dokter2', 'dokter2@gmail.com', 'dokter', NULL, '$2y$10$xp9V8I5K3Jb6uZkUbDjSTeeYDWo5e8VI4sqURZr.ky2wGPRoo8KpK', NULL, '2022-05-14 12:46:29', '2022-05-14 12:46:29'),
(8, 'resepsionis', 'resepsionis@gmail.com', 'resepsionis', NULL, '$2y$10$MrmN8pFAfloPLFXbvya14eKt8ykM2oK.f6BxM2/XNqE/CBMsI3FY2', NULL, '2022-05-17 22:40:03', '2022-05-17 22:40:03'),
(11, 'admin', 'admin2@gmail.com', 'admin', NULL, '$2y$10$HJwckWZROIBT6PibEtHYjuNWBpotVq0B48hHqSD/NGtUBlgNocrfu', NULL, '2022-05-28 00:14:02', '2022-05-28 00:14:02'),
(22, 'Dr. Jaya', 'jaya@mail.com', 'dokter', NULL, '$2y$10$Pf4wflSeyKksTRn/ShkCeuWpbTjQ3S40IykIEjzwJCBjSeDYoDqT6', NULL, '2022-06-08 22:35:31', '2022-06-08 22:35:31'),
(25, 'Dr. Fikri', 'fikri12@gamil.com', 'dokter', NULL, '$2y$10$Dby9nvRZeZVSwOfz57LBseRlzRBid8oGld/M6xw5rNfxzA8QZ7kKm', NULL, '2022-06-11 02:42:36', '2022-06-11 02:48:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokters`
--
ALTER TABLE `dokters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori_products`
--
ALTER TABLE `kategori_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas_products`
--
ALTER TABLE `kelas_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasiens`
--
ALTER TABLE `pasiens`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_kategori_product_id_foreign` (`kategori_product_id`),
  ADD KEY `products_kelas_product_id_foreign` (`kelas_product_id`);

--
-- Indexes for table `pulang_paksas`
--
ALTER TABLE `pulang_paksas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pulang_paksas_rekam_medis_id_foreign` (`rekam_medis_id`);

--
-- Indexes for table `rawat_inaps`
--
ALTER TABLE `rawat_inaps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rawat_inaps_rekam_medis_id_foreign` (`rekam_medis_id`),
  ADD KEY `rawat_inaps_pasien_id_foreign` (`pasien_id`);

--
-- Indexes for table `rawat_inap_details`
--
ALTER TABLE `rawat_inap_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rawat_inap_details_rawat_inap_id_foreign` (`rawat_inap_id`),
  ADD KEY `rawat_inap_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rekam_medis_pasien_id_foreign` (`pasien_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_pasien_id_foreign` (`pasien_id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_transaction_id_foreign` (`transaction_id`),
  ADD KEY `transaction_details_product_id_foreign` (`product_id`);

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
-- AUTO_INCREMENT for table `dokters`
--
ALTER TABLE `dokters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_products`
--
ALTER TABLE `kategori_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelas_products`
--
ALTER TABLE `kelas_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pasiens`
--
ALTER TABLE `pasiens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pulang_paksas`
--
ALTER TABLE `pulang_paksas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rawat_inaps`
--
ALTER TABLE `rawat_inaps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rawat_inap_details`
--
ALTER TABLE `rawat_inap_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_kategori_product_id_foreign` FOREIGN KEY (`kategori_product_id`) REFERENCES `kategori_products` (`id`),
  ADD CONSTRAINT `products_kelas_product_id_foreign` FOREIGN KEY (`kelas_product_id`) REFERENCES `kelas_products` (`id`);

--
-- Constraints for table `pulang_paksas`
--
ALTER TABLE `pulang_paksas`
  ADD CONSTRAINT `pulang_paksas_rekam_medis_id_foreign` FOREIGN KEY (`rekam_medis_id`) REFERENCES `rekam_medis` (`id`);

--
-- Constraints for table `rawat_inaps`
--
ALTER TABLE `rawat_inaps`
  ADD CONSTRAINT `rawat_inaps_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasiens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rawat_inaps_rekam_medis_id_foreign` FOREIGN KEY (`rekam_medis_id`) REFERENCES `rekam_medis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rawat_inap_details`
--
ALTER TABLE `rawat_inap_details`
  ADD CONSTRAINT `rawat_inap_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rawat_inap_details_rawat_inap_id_foreign` FOREIGN KEY (`rawat_inap_id`) REFERENCES `rawat_inaps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `rekam_medis_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasiens` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasiens` (`id`);

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
