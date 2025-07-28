-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 28 Jul 2025 pada 03.51
-- Versi server: 8.4.3
-- Versi PHP: 8.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_harsyad_utama`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_branches`
--

CREATE TABLE `master_branches` (
  `branch_id` bigint UNSIGNED NOT NULL,
  `company_id` int NOT NULL,
  `name_branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_branches`
--

INSERT INTO `master_branches` (`branch_id`, `company_id`, `name_branch`, `phone_branch`, `address_branch`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'Gentle Baby Main Store', '021-5551234', 'Jl. Sudirman No. 123, Jakarta Pusat', '2025-07-24 21:11:05', '2025-07-24 21:11:05', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_categories`
--

CREATE TABLE `master_categories` (
  `category_id` bigint UNSIGNED NOT NULL,
  `name_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_categories`
--

INSERT INTO `master_categories` (`category_id`, `name_category`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Baby Food', '2025-07-20 11:36:53', '2025-07-20 11:36:53', NULL),
(2, 'Therapeutic Oils', '2025-07-20 11:36:53', '2025-07-20 11:36:53', NULL),
(3, 'Herbal Infusions', '2025-07-20 11:36:53', '2025-07-20 11:36:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_companies`
--

CREATE TABLE `master_companies` (
  `company_id` bigint UNSIGNED NOT NULL,
  `name_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_companies`
--

INSERT INTO `master_companies` (`company_id`, `name_company`, `phone_company`, `address_company`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'nyambabyfood', '081234567891', 'Jl. Kapi Sraba Raya 12A 22, Desa Mangliawan, Kecamatan Pakis, Kab. Malang Jawa Timur, 65164', '2025-07-20 11:36:53', '2025-07-20 11:36:53', NULL),
(2, 'mamina.id', '081234567890', 'Jl. Kapi Sraba Raya 12A 22, Desa Mangliawan, Kecamatan Pakis, Kab. Malang Jawa Timur, 65164', '2025-07-20 11:36:53', '2025-07-20 11:36:53', NULL),
(3, 'tes', '13123', '123123', '2025-07-23 23:51:30', '2025-07-23 23:51:34', '2025-07-23 23:51:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_customers`
--

CREATE TABLE `master_customers` (
  `customer_id` bigint UNSIGNED NOT NULL,
  `name_customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_customer` text COLLATE utf8mb4_unicode_ci,
  `phone_customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_customers`
--

INSERT INTO `master_customers` (`customer_id`, `name_customer`, `address_customer`, `phone_customer`, `email_customer`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Walk-in Customer', 'Unknown', '-', NULL, '2025-07-23 23:34:47', '2025-07-23 23:34:47', NULL),
(1001, 'PT. Sumber Rejeki Makmur', 'Jl. Sudirman No. 123, Jakarta', '021-5551234', 'admin@sumberrejeki.co.id', '2025-07-24 20:56:10', '2025-07-24 20:56:10', NULL),
(1002, 'CV. Maju Bersama Jaya', 'Jl. Gatot Subroto No. 456, Bandung', '022-7778890', 'info@majubersama.co.id', '2025-07-24 20:56:10', '2025-07-24 20:56:10', NULL),
(1003, 'Toko Baby Shop Central', 'Jl. Malioboro No. 789, Yogyakarta', '0274-5556677', 'central@babyshop.com', '2025-07-24 20:56:10', '2025-07-24 20:56:10', NULL),
(1004, 'UD. Aneka Baby Care', 'Jl. Ahmad Yani No. 321, Surabaya', '031-8889990', 'aneka@babycare.co.id', '2025-07-24 20:56:10', '2025-07-24 20:56:10', NULL),
(1005, 'PT. Baby World Indonesia', 'Jl. HR Rasuna Said No. 654, Jakarta', '021-3334455', 'indonesia@babyworld.com', '2025-07-24 20:56:10', '2025-07-24 20:56:10', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_items`
--

CREATE TABLE `master_items` (
  `item_id` bigint UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `name_item` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_item` text COLLATE utf8mb4_unicode_ci,
  `ingredient_item` text COLLATE utf8mb4_unicode_ci,
  `netweight_item` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contain_item` text COLLATE utf8mb4_unicode_ci,
  `costprice_item` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_items`
--

INSERT INTO `master_items` (`item_id`, `category_id`, `name_item`, `description_item`, `ingredient_item`, `netweight_item`, `contain_item`, `costprice_item`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Beef Pudding', 'Delicious beef pudding for babies', 'Beef, milk, organic ingredients', '200g', 'High protein, vitamins', 22000, '2025-07-20 11:36:55', '2025-07-20 11:36:55', NULL),
(2, 1, 'Chicken Pudding', 'Nutritious chicken pudding for babies', 'Chicken, milk, organic ingredients', '200g', 'High protein, vitamins', 19500, '2025-07-20 11:36:55', '2025-07-20 11:36:55', NULL),
(3, 1, 'Pannababy', 'Special panna cotta for babies', 'Milk, natural flavoring', '150g', 'Calcium, vitamins', 10000, '2025-07-20 11:36:55', '2025-07-20 11:36:55', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_payment_methods`
--

CREATE TABLE `master_payment_methods` (
  `payment_method_id` bigint UNSIGNED NOT NULL,
  `name_payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_payment_method` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_payment_methods`
--

INSERT INTO `master_payment_methods` (`payment_method_id`, `name_payment_method`, `description_payment_method`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cash', 'Cash payment', '2025-07-23 23:34:47', '2025-07-23 23:34:47', NULL),
(2, 'Transfer', 'Bank transfer', '2025-07-23 23:34:47', '2025-07-23 23:34:47', NULL),
(3, 'Credit Card', NULL, '2025-07-24 21:11:05', '2025-07-24 21:11:05', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_sales_types`
--

CREATE TABLE `master_sales_types` (
  `sales_type_id` bigint UNSIGNED NOT NULL,
  `name_sales_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_sales_types`
--

INSERT INTO `master_sales_types` (`sales_type_id`, `name_sales_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Retail', '2025-07-24 21:11:05', '2025-07-24 21:11:05', NULL),
(2, 'Wholesale', '2025-07-24 21:11:05', '2025-07-24 21:11:05', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_users`
--

CREATE TABLE `master_users` (
  `user_id` bigint UNSIGNED NOT NULL,
  `company_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jwt_token` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_users`
--

INSERT INTO `master_users` (`user_id`, `company_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `jwt_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Administrator', 'admin@mail', NULL, '$2y$12$mhCiuMFZK4AdAWJXTYZ7Iuxx9/vYfO/HOfIk.kTa8onctwhl1lolG', NULL, NULL, '2025-07-20 11:36:53', '2025-07-20 11:36:53', NULL),
(2, 2, 'Staff User', 'staff@mail', NULL, '$2y$12$FgywVZ.wG90NGCMOZx44qepMSaJvtwFE7GOxLrmKyXfeRkd9NF4Ai', NULL, NULL, '2025-07-20 11:36:53', '2025-07-20 11:36:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_07_24_061841_create_master_tables_from_sql', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0A31mjg1vKwZFLiRj26sBq4lprdsk47C9iEUI4aC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT0RJQnl1bXhTamZ4bEpQMWVHY28yU3VxczVlOXpSSGhZZ0VlR2txVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvdGVzdC10cmFuc2FjdGlvbjI/aWQ9NDgyYjliNGYtZTliOS00YzNkLWI3MjctY2QzNTcyZGNhMzFhJnZzY29kZUJyb3dzZXJSZXFJZD0xNzUzNjcwNjA5NTExIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753670609),
('0RaqztVdJ4EfEPAnvMBEHOlVjsLXqO2jUAGAPmUO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoielNFNk5NT0hQa3hodEtTQ2hWTk9va0xTY21YaXBHSjNBNnhSS2d6SyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753669591),
('0w2SbHHqtNjnVYSPHCaCvl7cUxEVhd0to4jLLss9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS1lqSGthZ2V4RGR3RzllOFVraU5tRXRtT0ExZDlyQTFBNk1aV2MwTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753669450),
('1BU4fdUhewb3BurKHO6ivgFBZVh3J2wghR2N4krZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUzRUVlp3NzlGblpybFN6NDQzakozSG54MXdQS0thYm1RVWVSNEhqciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753671414),
('1FaIpPfs9aSQRC7tdykQgj02sTo2d3ITMXivzKg9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMUhaU3hSbFhRZWRIMmhoTlRQTG1xbExWZEJnakxONG9sMUozWllBZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTExOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvdGVzdC10cmFuc2FjdGlvbj9pZD03NWY1NWU3NS0yMDhkLTRjOTUtOTQ0MS1kMGE2N2ZmMGE3NzkmdnNjb2RlQnJvd3NlclJlcUlkPTE3NTM2NjkzNTU4ODEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753669356),
('20bSp73o7ljfs879dPD3xSnQN0fKHEfrE9vsl1ng', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT0VGcDZsVnphT1F1TWoxQllUeVo3RVMycG5EMlBVb0FkcDJmTVMxbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753669408),
('3nC6drQjB3zKFouR7FMKYANFnL9ReDCEajstokE2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiek5aVjN0YWV6VjNmNnF6OFkyWEZhd1RNcVhuVHZSdHNkMFBrTjY1UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753669402),
('5tVEtwhlzxaPetPmFGhfH9959Rn3pcIn2pSp8SAb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR3BkM2wzdW9GeHVmWWx1T1kySGtDSzVVNTFzN2lIaWFHNzBSSG11ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753671329),
('6duzNAQhwszf7Vf8Jy7G5hd5YbLYVU35vFrpiczT', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoic1BlNHZ6UFV6YlhYVUVKNGZoT2tBUWY4bTNhbjZ1dkxWejRJYlppMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90cmFuc2FjdGlvbnMvY3JlYXRlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1753674670),
('BniUrJLhUBuDLou2VHdDcSTNCsOIna9fEQq3sMrV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTjV6c29UVUQ4T2JjcjNUazMwRktoTzJuZVpMajdvdUxrTUNwelJPQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753669591),
('bYtTC7Ln8C3e2Chs1pcD2fjo4VU7itCx6buAlxhM', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN05PQmlPWjEydnNSVEZuTmZFSk5GaDBGRnZTNWJRUldPWVNISkZDWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753669571),
('CP3j8AEDPfUAKv5dpcTOTx2HOlLyx1y8u2V9rtGj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWk5wdHFCeEtESk4yNURISnlyNWt6Z0FKdW94SkdtMDR2V3NxNzdEaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753669305),
('Fn9gFtYi66S03pYTFAe2Qc0uMwL9IyYIt1l8keNt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQm8xcFVQNnBHbnJlS0xjQ3BiMnp4eDZCb2cwc2d4Mmo0bFRVR1hVNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvdGVzdC10cmFuc2FjdGlvbjI/aWQ9NDgyYjliNGYtZTliOS00YzNkLWI3MjctY2QzNTcyZGNhMzFhJnZzY29kZUJyb3dzZXJSZXFJZD0xNzUzNjcwNTIxNjk0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753670522),
('frk8TDUePCOax5XRibkBtMlz8UnTdmcN2k218Gvn', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRkd0Zzh4eDRXbnFLMDU4NWZQd3R5QjJIZTdzQVJKVFFTRE8xQmZaZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753669331),
('iEsDpWLKZFbCeX5lmZdNNgBxYzFRGH39IqHNqlZ9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid2M4SlRDNWl4c3JnZkxsMlRCQ3pxU2JFVW16ZXNuVUVBWXYyTDdYWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753671201),
('kPcDmKDSsPw1TK49s5seNAV4mkB45uaZvkJkVNoU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYUd1ZzRQb0FUZ0hMRE5IYjM3Y0NMNE41ME03aXFIbFA2VzVPTFBBeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753668429),
('Kqe0mHA95ZoH93Ipq81oIl5OoefDUubtyvTgjpZB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicUgwOXRoaG9QV2Z6YWI5c2JMRTJBdEhyQ2M0alRJNlBPZ0FrbDF6MSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoxMTQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90cmFuc2FjdGlvbnMvY3JlYXRlP2lkPTQ4MmI5YjRmLWU5YjktNGMzZC1iNzI3LWNkMzU3MmRjYTMxYSZ2c2NvZGVCcm93c2VyUmVxSWQ9MTc1MzY3MTMyODgzNCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjExNDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3RyYW5zYWN0aW9ucy9jcmVhdGU/aWQ9NDgyYjliNGYtZTliOS00YzNkLWI3MjctY2QzNTcyZGNhMzFhJnZzY29kZUJyb3dzZXJSZXFJZD0xNzUzNjcxMzI4ODM0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753671329),
('m2XdvtBVgAgxdN2RgoLa3DMMTdSRPzvyulKjG4lf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibHFja25lSDhyWUJuMDh0a2Q1SGNyVk5RdjloWVBrRm1zY2wySVJQaiI7czoxMDoiX29sZF9pbnB1dCI7YToyOntzOjI6ImlkIjtzOjM2OiI3NWY1NWU3NS0yMDhkLTRjOTUtOTQ0MS1kMGE2N2ZmMGE3NzkiO3M6MTg6InZzY29kZUJyb3dzZXJSZXFJZCI7czoxMzoiMTc1MzY2OTQwNzQ3MiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6MzoibmV3IjthOjA6e31zOjM6Im9sZCI7YToyOntpOjA7czoxMDoiX29sZF9pbnB1dCI7aToxO3M6NToiZXJyb3IiO319czo1OiJlcnJvciI7czo0NTA6IkdhZ2FsIG1lbWJ1YXQgdHJhbnNha3NpOiBTUUxTVEFURVtIWTAwMF06IEdlbmVyYWwgZXJyb3I6IDEzNjQgRmllbGQgJ2JyYW5jaF9pZCcgZG9lc24ndCBoYXZlIGEgZGVmYXVsdCB2YWx1ZSAoQ29ubmVjdGlvbjogbXlzcWwsIFNRTDogaW5zZXJ0IGludG8gYHRyYW5zYWN0aW9uX3NhbGVzYCAoYG51bWJlcmAsIGBkYXRlYCwgYGN1c3RvbWVyX2lkYCwgYHBheW1lbnRfbWV0aG9kX2lkYCwgYG5vdGVzYCwgYHN1YnRvdGFsYCwgYGRpc2NvdW50X2Ftb3VudGAsIGB0b3RhbF9hbW91bnRgLCBgcGFpZF9hbW91bnRgLCBgdXBkYXRlZF9hdGAsIGBjcmVhdGVkX2F0YCkgdmFsdWVzIChUWE4tMjAyNTA3MjgtMDAxMSwgMjAyNS0wNy0yOCAwMjoyMzoyNywgMSwgMSwgQ3JlYXRlZCB2aWEgd2ViIGZvcm0sIDAsIDAsIDAsIDAsIDIwMjUtMDctMjggMDI6MjM6MjcsIDIwMjUtMDctMjggMDI6MjM6MjcpKSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTExOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvdGVzdC10cmFuc2FjdGlvbj9pZD03NWY1NWU3NS0yMDhkLTRjOTUtOTQ0MS1kMGE2N2ZmMGE3NzkmdnNjb2RlQnJvd3NlclJlcUlkPTE3NTM2Njk0MDc0NzIiO319', 1753669407),
('nAowcqucNg6P8ce8HZcBg729EUztJgilusKZMibM', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZmh3bFFRYTRXb0s3eW1BTGVZUWFQcWJvNG9sWjdaRHVmTzhoemo5dCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753669373),
('NTXX1P0RgUBkQcyKC85Ssd4Fhbi8S7krWXe3S7xS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN08yQUhEQW1NQkVUdFdsbG1Qb3kyWGVVdHc3U3l1Wk9FOFNiaUgyZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTExOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvdGVzdC10cmFuc2FjdGlvbj9pZD1jYzczY2ZmNi0zOWFlLTQ2YTQtOGE0Mi1mMmY4NDY4OGI3NmUmdnNjb2RlQnJvd3NlclJlcUlkPTE3NTM2NzAwNjQ3MjMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753670065),
('OHSBAsjV6CDXIvpr25OFZFzNXTyJ8qefmnYTGTqX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSm9FekRRYTZKZ25icG5BQVRGcmx4QUpVWExyY1pLRlhuZzFIc2JZNCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoxMTQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90cmFuc2FjdGlvbnMvY3JlYXRlP2lkPTc1ZjU1ZTc1LTIwOGQtNGM5NS05NDQxLWQwYTY3ZmYwYTc3OSZ2c2NvZGVCcm93c2VyUmVxSWQ9MTc1MzY2OTM3Mjg3NiI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjExNDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3RyYW5zYWN0aW9ucy9jcmVhdGU/aWQ9NzVmNTVlNzUtMjA4ZC00Yzk1LTk0NDEtZDBhNjdmZjBhNzc5JnZzY29kZUJyb3dzZXJSZXFJZD0xNzUzNjY5MzcyODc2Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753669373),
('RT8fZlBLwfewAj2lwCPLwkAcPHw5fTbXgEdebI7g', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYW5ybUFWME1xckthUjBETm5VWjdtbDUwZm1acWJMNzhaMThsSVJTdiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoxMTQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90cmFuc2FjdGlvbnMvY3JlYXRlP2lkPTc1ZjU1ZTc1LTIwOGQtNGM5NS05NDQxLWQwYTY3ZmYwYTc3OSZ2c2NvZGVCcm93c2VyUmVxSWQ9MTc1MzY2OTU3MTM3MyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjExNDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3RyYW5zYWN0aW9ucy9jcmVhdGU/aWQ9NzVmNTVlNzUtMjA4ZC00Yzk1LTk0NDEtZDBhNjdmZjBhNzc5JnZzY29kZUJyb3dzZXJSZXFJZD0xNzUzNjY5NTcxMzczIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753669571),
('s4rW9Hf5AehdhvaBOvn6JpyshtOSzfK4NaOaW8cw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiY20xb256TzBmN21hMWtKTnB4Rmx2b0t1WGR1SDg3c1dZeFExUlpONiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoxMTQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90cmFuc2FjdGlvbnMvY3JlYXRlP2lkPTQ4MmI5YjRmLWU5YjktNGMzZC1iNzI3LWNkMzU3MmRjYTMxYSZ2c2NvZGVCcm93c2VyUmVxSWQ9MTc1MzY3MTIwMTEzNSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjExNDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3RyYW5zYWN0aW9ucy9jcmVhdGU/aWQ9NDgyYjliNGYtZTliOS00YzNkLWI3MjctY2QzNTcyZGNhMzFhJnZzY29kZUJyb3dzZXJSZXFJZD0xNzUzNjcxMjAxMTM1Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753671201),
('UsgzqXDl1u7AxvAiJiKitvN3PLjLLIZfLZqnLZCS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidHk4YmFCbnRqaVFiY2YxZlFnc3RYcTIzWkFPblRrYUpjbzhxOEM0TyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753669330),
('vfUKpkcE7jSMBSispL0hNy4Nm1xGyn0L7sODyE3E', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidllCUDdSdWN5MEV3V2JkSkt4UExtWDhuWXp6dkx2V2Voa1JjN2F6NSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoxMTQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90cmFuc2FjdGlvbnMvY3JlYXRlP2lkPTQ4MmI5YjRmLWU5YjktNGMzZC1iNzI3LWNkMzU3MmRjYTMxYSZ2c2NvZGVCcm93c2VyUmVxSWQ9MTc1MzY3MTQxMzgyOSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjExNDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3RyYW5zYWN0aW9ucy9jcmVhdGU/aWQ9NDgyYjliNGYtZTliOS00YzNkLWI3MjctY2QzNTcyZGNhMzFhJnZzY29kZUJyb3dzZXJSZXFJZD0xNzUzNjcxNDEzODI5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753671414),
('Vw0xkIcijZLqZDS7i2207CkVuJqHwWATfSJEZ7qL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUNtRlJnNFVvMWN2dWFxdE10NFMwTEJaaEQ5U3dNcWxFdzVZRHZVSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753669348),
('WcdjBkmYaZxJhxdrCTIiAKVccvrPhzezYwEwZh69', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWGV2c1ZYMlZLdlA4TUpFVGFCYkpqTHE4a3FuYlRweDBoTzVCWVJRMCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoxMTQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90cmFuc2FjdGlvbnMvY3JlYXRlP2lkPTc1ZjU1ZTc1LTIwOGQtNGM5NS05NDQxLWQwYTY3ZmYwYTc3OSZ2c2NvZGVCcm93c2VyUmVxSWQ9MTc1MzY2OTMwNDg5NyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjExNDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3RyYW5zYWN0aW9ucy9jcmVhdGU/aWQ9NzVmNTVlNzUtMjA4ZC00Yzk1LTk0NDEtZDBhNjdmZjBhNzc5JnZzY29kZUJyb3dzZXJSZXFJZD0xNzUzNjY5MzA0ODk3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753669305),
('xgpzttztrLZkaefWFd7TaCKGMm0QY1sUTMTW2ub2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia05pOGlCb3hDaUtpMzZUaVRDOVVvWkVBYTVpbVpKTTMwTjFORVc4RiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGVidWctdHJhbnNhY3Rpb24/aWQ9NzVmNTVlNzUtMjA4ZC00Yzk1LTk0NDEtZDBhNjdmZjBhNzc5JnZzY29kZUJyb3dzZXJSZXFJZD0xNzUzNjY5NTY2NTcwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753669566),
('yF3vT5Y375ypOyhzhxCXl9ap2lXVSOX9406PgFsE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.2 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSWNVRkFsbGRnUXlyV0dBdnRleG8zc0ZLWGV6TXVQamdLZGtnZUx6SSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGVidWctdHJhbnNhY3Rpb24/aWQ9NzVmNTVlNzUtMjA4ZC00Yzk1LTk0NDEtZDBhNjdmZjBhNzc5JnZzY29kZUJyb3dzZXJSZXFJZD0xNzUzNjY5NDU2NjEwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753669457);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_sales`
--

CREATE TABLE `transaction_sales` (
  `transaction_sales_id` bigint UNSIGNED NOT NULL,
  `branch_id` int NOT NULL,
  `payment_method_id` int NOT NULL,
  `user_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `sales_type_id` int NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `subtotal` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `discount_percentage` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `change_amount` double DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaction_sales`
--

INSERT INTO `transaction_sales` (`transaction_sales_id`, `branch_id`, `payment_method_id`, `user_id`, `customer_id`, `sales_type_id`, `number`, `date`, `notes`, `subtotal`, `discount_amount`, `discount_percentage`, `total_amount`, `paid_amount`, `change_amount`, `whatsapp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 1, 1, 'TXN-20250724-0001', '2025-07-24 06:35:20', NULL, 33000, 0, NULL, 33000, 33000, NULL, NULL, '2025-07-23 23:35:20', '2025-07-23 23:35:20', NULL),
(2, 1, 2, 1, 1, 1, 'TXN-20250724-0002', '2025-07-24 06:38:24', NULL, 29250, 0, NULL, 29250, 29250, NULL, NULL, '2025-07-23 23:38:24', '2025-07-23 23:38:24', NULL),
(2001, 1, 1, 1, 1001, 1, 'TRX-20250720-001', '2025-07-20 00:00:00', 'Pesanan untuk toko cabang Jakarta Pusat', 850000, NULL, NULL, 850000, 300000, NULL, NULL, '2025-07-20 03:30:00', '2025-07-20 03:30:00', NULL),
(2002, 1, 2, 1, 1002, 1, 'TRX-20250719-002', '2025-07-19 00:00:00', 'Pesanan rutin bulanan', 650000, NULL, NULL, 650000, 0, NULL, NULL, '2025-07-19 07:15:00', '2025-07-19 07:15:00', NULL),
(2003, 1, 1, 1, 1003, 1, 'TRX-20250718-003', '2025-07-18 00:00:00', 'Pembayaran sistem cicilan', 450000, NULL, NULL, 450000, 200000, NULL, NULL, '2025-07-18 02:45:00', '2025-07-18 02:45:00', NULL),
(2004, 1, 3, 1, 1004, 1, 'TRX-20250717-004', '2025-07-17 00:00:00', 'Order khusus untuk event baby expo', 750000, NULL, NULL, 750000, 400000, NULL, NULL, '2025-07-17 09:20:00', '2025-07-17 09:20:00', NULL),
(2005, 1, 1, 1, 1005, 1, 'TRX-20250716-005', '2025-07-16 00:00:00', 'Pesanan untuk launching produk baru', 920000, NULL, NULL, 920000, 500000, NULL, NULL, '2025-07-16 04:10:00', '2025-07-16 04:10:00', NULL),
(2006, 1, 2, 1, 1001, 1, 'TRX-20250715-006', '2025-07-15 00:00:00', 'Pesanan mendesak untuk stok habis', 380000, NULL, NULL, 380000, 100000, NULL, NULL, '2025-07-15 06:30:00', '2025-07-15 06:30:00', NULL),
(2007, 1, 1, 1, 1003, 1, 'TRX-20250714-007', '2025-07-14 00:00:00', 'Pre-order untuk produk seasonal', 560000, NULL, NULL, 560000, 0, NULL, NULL, '2025-07-14 01:45:00', '2025-07-14 01:45:00', NULL),
(2008, 1, 3, 1, 1002, 1, 'TRX-20250713-008', '2025-07-13 00:00:00', 'Konsinyasi untuk toko partner', 720000, NULL, NULL, 720000, 250000, NULL, NULL, '2025-07-13 08:20:00', '2025-07-13 08:20:00', NULL),
(2017, 1, 1, 1, 1, 1, 'TEST-1753669543', '2025-07-28 02:25:43', 'Direct test', 100000, 0, NULL, 100000, 0, NULL, NULL, '2025-07-28 02:25:43', '2025-07-28 02:25:43', NULL),
(2018, 1, 1, 1, 1, 1, 'TEST-LARAVEL-1753669566', '2025-07-28 02:26:06', 'Test Laravel model', 100000, 0, NULL, 100000, 0, NULL, NULL, '2025-07-27 19:26:06', '2025-07-27 19:26:06', NULL),
(2021, 1, 2, 1, 1, 1, 'TXN-20250728-0013', '2025-07-28 02:44:09', 'Created via web form', 150000, 0, NULL, 150000, 0, NULL, NULL, '2025-07-27 19:44:09', '2025-07-27 19:44:09', NULL),
(2022, 1, 1, 1, 1, 1, 'TXN-20250728-0014', '2025-07-28 02:57:11', 'Created via web form', 75000, 0, NULL, 75000, 0, NULL, NULL, '2025-07-27 19:57:11', '2025-07-27 19:57:11', NULL),
(2023, 1, 2, 1, 1002, 1, 'TXN-20250728-0015', '2025-07-28 02:58:57', 'Created via web form', 41500, 0, NULL, 41500, 0, NULL, NULL, '2025-07-27 19:58:57', '2025-07-27 19:58:57', NULL),
(2024, 1, 2, 1, 1002, 1, 'TXN-20250728-0016', '2025-07-28 02:58:57', 'Created via web form', 41500, 0, NULL, 41500, 0, NULL, NULL, '2025-07-27 19:58:57', '2025-07-27 19:58:57', NULL),
(2025, 1, 2, 1, 1003, 1, 'TXN-20250728-0017', '2025-07-28 03:07:00', 'Created via web form', 29500, 0, NULL, 29500, 0, NULL, NULL, '2025-07-27 20:07:00', '2025-07-27 20:07:00', NULL),
(2026, 1, 2, 1, 1003, 1, 'TXN-20250728-0018', '2025-07-28 03:07:00', 'Created via web form', 29500, 0, NULL, 29500, 0, NULL, NULL, '2025-07-27 20:07:00', '2025-07-27 20:07:48', '2025-07-27 20:07:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_sales_details`
--

CREATE TABLE `transaction_sales_details` (
  `transaction_sales_detail_id` bigint UNSIGNED NOT NULL,
  `transaction_sales_id` int NOT NULL,
  `item_id` int NOT NULL,
  `qty` int DEFAULT NULL,
  `costprice` double DEFAULT NULL,
  `sell_price` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `discount_percentage` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaction_sales_details`
--

INSERT INTO `transaction_sales_details` (`transaction_sales_detail_id`, `transaction_sales_id`, `item_id`, `qty`, `costprice`, `sell_price`, `subtotal`, `discount_amount`, `discount_percentage`, `total_amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 0, 33000, 33000, 0, 0, 33000, '2025-07-23 23:35:20', '2025-07-23 23:35:20', NULL),
(2, 2, 2, 1, 0, 29250, 29250, 0, 0, 29250, '2025-07-23 23:38:24', '2025-07-23 23:38:24', NULL),
(3, 2001, 1, 15, NULL, 25000, 375000, NULL, NULL, 375000, '2025-07-24 20:56:10', '2025-07-24 20:56:10', NULL),
(4, 2001, 3, 19, NULL, 25000, 475000, NULL, NULL, 475000, '2025-07-24 20:56:10', '2025-07-24 20:56:10', NULL),
(5, 2002, 2, 10, NULL, 25000, 250000, NULL, NULL, 250000, '2025-07-24 20:56:10', '2025-07-24 20:56:10', NULL),
(6, 2002, 4, 16, NULL, 25000, 400000, NULL, NULL, 400000, '2025-07-24 20:56:10', '2025-07-24 20:56:10', NULL),
(7, 2003, 5, 18, NULL, 25000, 450000, NULL, NULL, 450000, '2025-07-24 20:56:10', '2025-07-24 20:56:10', NULL),
(8, 2004, 1, 12, NULL, 25000, 300000, NULL, NULL, 300000, '2025-07-24 20:56:10', '2025-07-24 20:56:10', NULL),
(9, 2004, 2, 8, NULL, 25000, 200000, NULL, NULL, 200000, '2025-07-24 20:56:10', '2025-07-24 20:56:10', NULL),
(10, 2004, 6, 10, NULL, 25000, 250000, NULL, NULL, 250000, '2025-07-24 20:56:10', '2025-07-24 20:56:10', NULL),
(11, 2005, 3, 20, NULL, 25000, 500000, NULL, NULL, 500000, '2025-07-24 20:56:10', '2025-07-24 20:56:10', NULL),
(12, 2005, 4, 12, NULL, 25000, 300000, NULL, NULL, 300000, '2025-07-24 20:56:10', '2025-07-24 20:56:10', NULL),
(13, 2005, 7, 5, NULL, 24000, 120000, NULL, NULL, 120000, '2025-07-24 20:56:10', '2025-07-24 20:56:10', NULL),
(14, 2006, 5, 8, NULL, 25000, 200000, NULL, NULL, 200000, '2025-07-24 20:56:10', '2025-07-24 20:56:10', NULL),
(15, 2006, 8, 9, NULL, 20000, 180000, NULL, NULL, 180000, '2025-07-24 20:56:10', '2025-07-24 20:56:10', NULL),
(16, 2007, 1, 14, NULL, 25000, 350000, NULL, NULL, 350000, '2025-07-24 20:56:10', '2025-07-24 20:56:10', NULL),
(17, 2007, 9, 7, NULL, 30000, 210000, NULL, NULL, 210000, '2025-07-24 20:56:10', '2025-07-24 20:56:10', NULL),
(18, 2008, 2, 16, NULL, 25000, 400000, NULL, NULL, 400000, '2025-07-24 20:56:10', '2025-07-24 20:56:10', NULL),
(19, 2008, 10, 8, NULL, 40000, 320000, NULL, NULL, 320000, '2025-07-24 20:56:10', '2025-07-24 20:56:10', NULL),
(20, 2001, 1, 15, NULL, 25000, 375000, NULL, NULL, 375000, '2025-07-24 21:31:31', '2025-07-24 21:31:31', NULL),
(21, 2001, 3, 19, NULL, 25000, 475000, NULL, NULL, 475000, '2025-07-24 21:31:31', '2025-07-24 21:31:31', NULL),
(22, 2002, 2, 10, NULL, 25000, 250000, NULL, NULL, 250000, '2025-07-24 21:31:31', '2025-07-24 21:31:31', NULL),
(23, 2002, 4, 16, NULL, 25000, 400000, NULL, NULL, 400000, '2025-07-24 21:31:31', '2025-07-24 21:31:31', NULL),
(24, 2003, 5, 18, NULL, 25000, 450000, NULL, NULL, 450000, '2025-07-24 21:31:31', '2025-07-24 21:31:31', NULL),
(25, 2004, 1, 12, NULL, 25000, 300000, NULL, NULL, 300000, '2025-07-24 21:31:31', '2025-07-24 21:31:31', NULL),
(26, 2004, 2, 8, NULL, 25000, 200000, NULL, NULL, 200000, '2025-07-24 21:31:31', '2025-07-24 21:31:31', NULL),
(27, 2004, 6, 10, NULL, 25000, 250000, NULL, NULL, 250000, '2025-07-24 21:31:31', '2025-07-24 21:31:31', NULL),
(28, 2005, 3, 20, NULL, 25000, 500000, NULL, NULL, 500000, '2025-07-24 21:31:31', '2025-07-24 21:31:31', NULL),
(29, 2005, 4, 12, NULL, 25000, 300000, NULL, NULL, 300000, '2025-07-24 21:31:31', '2025-07-24 21:31:31', NULL),
(30, 2005, 7, 5, NULL, 24000, 120000, NULL, NULL, 120000, '2025-07-24 21:31:31', '2025-07-24 21:31:31', NULL),
(31, 2006, 5, 8, NULL, 25000, 200000, NULL, NULL, 200000, '2025-07-24 21:31:31', '2025-07-24 21:31:31', NULL),
(32, 2006, 8, 9, NULL, 20000, 180000, NULL, NULL, 180000, '2025-07-24 21:31:31', '2025-07-24 21:31:31', NULL),
(33, 2007, 1, 14, NULL, 25000, 350000, NULL, NULL, 350000, '2025-07-24 21:31:31', '2025-07-24 21:31:31', NULL),
(34, 2007, 9, 7, NULL, 30000, 210000, NULL, NULL, 210000, '2025-07-24 21:31:31', '2025-07-24 21:31:31', NULL),
(35, 2008, 2, 16, NULL, 25000, 400000, NULL, NULL, 400000, '2025-07-24 21:31:31', '2025-07-24 21:31:31', NULL),
(36, 2008, 10, 8, NULL, 40000, 320000, NULL, NULL, 320000, '2025-07-24 21:31:31', '2025-07-24 21:31:31', NULL),
(50, 2017, 1, 2, 0, 50000, 100000, 0, 0, 100000, '2025-07-28 02:25:43', '2025-07-28 02:25:43', NULL),
(51, 2018, 1, 2, 0, 50000, 100000, 0, 0, 100000, '2025-07-27 19:26:06', '2025-07-27 19:26:06', NULL),
(56, 2021, 1, 1, 0, 75000, 75000, 0, 0, 75000, '2025-07-27 19:44:09', '2025-07-27 19:44:09', NULL),
(57, 2021, 1, 1, 0, 75000, 75000, 0, 0, 75000, '2025-07-27 19:44:09', '2025-07-27 19:44:09', NULL),
(58, 2022, 1, 1, 0, 75000, 75000, 0, 0, 75000, '2025-07-27 19:57:11', '2025-07-27 19:57:11', NULL),
(59, 2023, 1, 1, 0, 22000, 22000, 0, 0, 22000, '2025-07-27 19:58:57', '2025-07-27 19:58:57', NULL),
(60, 2023, 2, 1, 0, 19500, 19500, 0, 0, 19500, '2025-07-27 19:58:57', '2025-07-27 19:58:57', NULL),
(61, 2024, 1, 1, 0, 22000, 22000, 0, 0, 22000, '2025-07-27 19:58:57', '2025-07-27 19:58:57', NULL),
(62, 2024, 2, 1, 0, 19500, 19500, 0, 0, 19500, '2025-07-27 19:58:57', '2025-07-27 19:58:57', NULL),
(63, 2025, 2, 1, 0, 19500, 19500, 0, 0, 19500, '2025-07-27 20:07:00', '2025-07-27 20:07:00', NULL),
(64, 2025, 3, 1, 0, 10000, 10000, 0, 0, 10000, '2025-07-27 20:07:00', '2025-07-27 20:07:00', NULL),
(65, 2026, 2, 1, 0, 19500, 19500, 0, 0, 19500, '2025-07-27 20:07:00', '2025-07-27 20:07:00', NULL),
(66, 2026, 3, 1, 0, 10000, 10000, 0, 0, 10000, '2025-07-27 20:07:00', '2025-07-27 20:07:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_branches`
--
ALTER TABLE `master_branches`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indeks untuk tabel `master_categories`
--
ALTER TABLE `master_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `master_companies`
--
ALTER TABLE `master_companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indeks untuk tabel `master_customers`
--
ALTER TABLE `master_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indeks untuk tabel `master_items`
--
ALTER TABLE `master_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indeks untuk tabel `master_payment_methods`
--
ALTER TABLE `master_payment_methods`
  ADD PRIMARY KEY (`payment_method_id`);

--
-- Indeks untuk tabel `master_sales_types`
--
ALTER TABLE `master_sales_types`
  ADD PRIMARY KEY (`sales_type_id`);

--
-- Indeks untuk tabel `master_users`
--
ALTER TABLE `master_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `transaction_sales`
--
ALTER TABLE `transaction_sales`
  ADD PRIMARY KEY (`transaction_sales_id`);

--
-- Indeks untuk tabel `transaction_sales_details`
--
ALTER TABLE `transaction_sales_details`
  ADD PRIMARY KEY (`transaction_sales_detail_id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_branches`
--
ALTER TABLE `master_branches`
  MODIFY `branch_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `master_categories`
--
ALTER TABLE `master_categories`
  MODIFY `category_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `master_companies`
--
ALTER TABLE `master_companies`
  MODIFY `company_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `master_customers`
--
ALTER TABLE `master_customers`
  MODIFY `customer_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- AUTO_INCREMENT untuk tabel `master_items`
--
ALTER TABLE `master_items`
  MODIFY `item_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `master_payment_methods`
--
ALTER TABLE `master_payment_methods`
  MODIFY `payment_method_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `master_sales_types`
--
ALTER TABLE `master_sales_types`
  MODIFY `sales_type_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `master_users`
--
ALTER TABLE `master_users`
  MODIFY `user_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaction_sales`
--
ALTER TABLE `transaction_sales`
  MODIFY `transaction_sales_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2027;

--
-- AUTO_INCREMENT untuk tabel `transaction_sales_details`
--
ALTER TABLE `transaction_sales_details`
  MODIFY `transaction_sales_detail_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
