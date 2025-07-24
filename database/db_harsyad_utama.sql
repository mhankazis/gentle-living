-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 21 Jul 2025 pada 03.34
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
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
  `name_branch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_branch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_branch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_branches`
--

INSERT INTO `master_branches` (`branch_id`, `company_id`, `name_branch`, `phone_branch`, `address_branch`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Nyam Kediri', '081234567893', 'Jl. Brawijaya No. 123, Kediri, Jawa Timur', '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL),
(2, 2, 'Nyam Jakarta', '081234567894', 'Jl. Sudirman No. 45, Jakarta Pusat', '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL),
(3, 2, 'Nyam Surabaya', '081234567895', 'Jl. Pemuda No. 67, Surabaya', '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_categories`
--

CREATE TABLE `master_categories` (
  `category_id` bigint UNSIGNED NOT NULL,
  `name_category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_categories`
--

INSERT INTO `master_categories` (`category_id`, `name_category`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Baby Food', '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL),
(2, 'Therapeutic Oils', '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL),
(3, 'Herbal Infusions', '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_companies`
--

CREATE TABLE `master_companies` (
  `company_id` bigint UNSIGNED NOT NULL,
  `name_company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_companies`
--

INSERT INTO `master_companies` (`company_id`, `name_company`, `phone_company`, `address_company`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'nyambabyfood', '081234567891', 'Jl. Kapi Sraba Raya 12A 22, Desa Mangliawan, Kecamatan Pakis, Kab. Malang Jawa Timur, 65164', '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL),
(2, 'mamina.id', '081234567890', 'Jl. Kapi Sraba Raya 12A 22, Desa Mangliawan, Kecamatan Pakis, Kab. Malang Jawa Timur, 65164', '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL),
(3, 'gentle living', '081234567892', 'Jl. Kapi Sraba Raya 12A 22, Desa Mangliawan, Kecamatan Pakis, Kab. Malang Jawa Timur, 65164', '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_customers`
--

CREATE TABLE `master_customers` (
  `customer_id` bigint UNSIGNED NOT NULL,
  `company_id` int NOT NULL,
  `customer_type_id` int NOT NULL,
  `name_customer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_customer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_customer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `point` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jwt_token` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_customers`
--

INSERT INTO `master_customers` (`customer_id`, `company_id`, `customer_type_id`, `name_customer`, `phone_customer`, `address_customer`, `point`, `password`, `remember_token`, `jwt_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Budi Customer', '6281234567894', 'Jl. Mawar No. 45, Jakarta', '10', '$2y$12$5l2SuJfqM1LQmNwdTojySe/vWNLFvrwT9mSj9VFyuexnxRA36M1Mq', NULL, NULL, '2025-07-20 18:36:54', '2025-07-20 18:36:54', NULL),
(2, 1, 2, 'Siti Agent', '6281234567895', 'Jl. Melati No. 67, Surabaya', '25', '$2y$12$r9IeX3TqTrWJotf7LlBN2uE6XfRWrJCBp29JkLnsKGWesB/NBSMgW', NULL, NULL, '2025-07-20 18:36:54', '2025-07-20 18:36:54', NULL),
(3, 2, 3, 'Ahmad Regular', '6281234567896', 'Jl. Anggrek No. 89, Kediri', '5', '$2y$12$Svx.Bp3MPEK/gVY9RfVrX.Nj/jbPV3m9JasbxEDUXXObSREGiYB.e', NULL, NULL, '2025-07-20 18:36:54', '2025-07-20 18:36:54', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_customers_types`
--

CREATE TABLE `master_customers_types` (
  `customer_type_id` bigint UNSIGNED NOT NULL,
  `name_customer_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_customers_types`
--

INSERT INTO `master_customers_types` (`customer_type_id`, `name_customer_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Reseller', '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL),
(2, 'Agent', '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL),
(3, 'Regular Customer', '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_inventories`
--

CREATE TABLE `master_inventories` (
  `inventory_id` bigint UNSIGNED NOT NULL,
  `company_id` int NOT NULL,
  `name_inventory` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_inventories`
--

INSERT INTO `master_inventories` (`inventory_id`, `company_id`, `name_inventory`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Jakarta Warehouse', '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL),
(2, 2, 'Kediri Warehouse', '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL),
(3, 3, 'Surabaya Warehouse', '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_items`
--

CREATE TABLE `master_items` (
  `item_id` bigint UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `name_item` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_item` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ingredient_item` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `netweight_item` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contain_item` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `costprice_item` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_items`
--

INSERT INTO `master_items` (`item_id`, `category_id`, `name_item`, `description_item`, `ingredient_item`, `netweight_item`, `contain_item`, `costprice_item`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Beef Pudding', 'Delicious beef pudding for babies', 'Beef, milk, organic ingredients', '200g', 'High protein, vitamins', 22000, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(2, 1, 'Chicken Pudding', 'Nutritious chicken pudding for babies', 'Chicken, milk, organic ingredients', '200g', 'High protein, vitamins', 19500, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(3, 1, 'Pannababy', 'Special panna cotta for babies', 'Milk, natural flavoring', '150g', 'Calcium, vitamins', 10000, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(4, 1, 'Ice Cream All Varian', 'Various flavored ice cream for babies', 'Milk, natural fruits', '100g', 'Vitamins, natural sweeteners', 12500, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(5, 1, 'Abon Hati Ayam', 'Chicken liver floss for babies', 'Chicken liver, spices', '50g', 'Iron, protein', 20000, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(6, 1, 'Ciki Bone Broth', 'Nutritious bone broth for babies', 'Bone broth, vegetables', '250ml', 'Collagen, minerals', 22500, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_items_branches`
--

CREATE TABLE `master_items_branches` (
  `item_branch_id` bigint UNSIGNED NOT NULL,
  `item_id` int NOT NULL,
  `branch_id` int NOT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_items_branches`
--

INSERT INTO `master_items_branches` (`item_branch_id`, `item_id`, `branch_id`, `stock`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 50, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(2, 1, 2, 30, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(3, 1, 3, 25, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(4, 2, 1, 40, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(5, 2, 2, 35, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(6, 2, 3, 20, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_items_details`
--

CREATE TABLE `master_items_details` (
  `item_detail_id` bigint UNSIGNED NOT NULL,
  `item_id` int NOT NULL,
  `customer_type_id` int NOT NULL,
  `cost_price` double DEFAULT NULL,
  `sell_price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_items_details`
--

INSERT INTO `master_items_details` (`item_detail_id`, `item_id`, `customer_type_id`, `cost_price`, `sell_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 22000, 26500, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(2, 1, 2, 22000, 24500, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(3, 1, 3, 22000, 28500, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(4, 2, 1, 19500, 22000, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(5, 2, 2, 19500, 22000, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(6, 2, 3, 19500, 24500, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(7, 3, 1, 10000, 13500, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(8, 3, 2, 10000, 12500, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(9, 3, 3, 10000, 15000, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(10, 4, 1, 12500, 15000, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(11, 4, 2, 12500, 15000, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(12, 4, 3, 12500, 18000, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(13, 5, 1, 20000, 23500, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(14, 5, 2, 20000, 22500, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(15, 5, 3, 20000, 25000, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(16, 6, 1, 22500, 25000, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(17, 6, 2, 22500, 25000, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(18, 6, 3, 22500, 28000, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_menus`
--

CREATE TABLE `master_menus` (
  `menu_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_payment_methods`
--

CREATE TABLE `master_payment_methods` (
  `payment_method_id` bigint UNSIGNED NOT NULL,
  `name_payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_payment_methods`
--

INSERT INTO `master_payment_methods` (`payment_method_id`, `name_payment_method`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cash', '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL),
(2, 'Transfer Bank', '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL),
(3, 'E-Wallet', '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL),
(4, 'Credit Card', '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL),
(5, 'Debit Card', '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL),
(6, 'QRIS', '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_sales_types`
--

CREATE TABLE `master_sales_types` (
  `sales_type_id` bigint UNSIGNED NOT NULL,
  `name_sales_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_sales_types`
--

INSERT INTO `master_sales_types` (`sales_type_id`, `name_sales_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Shopee', '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL),
(2, 'Tiktok Shop', '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL),
(3, 'WA Admin', '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_suppliers`
--

CREATE TABLE `master_suppliers` (
  `supplier_id` bigint UNSIGNED NOT NULL,
  `company_id` int NOT NULL,
  `name_supplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_supplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_supplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jwt_token` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_suppliers`
--

INSERT INTO `master_suppliers` (`supplier_id`, `company_id`, `name_supplier`, `phone_supplier`, `address_supplier`, `password`, `remember_token`, `jwt_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'PT. Supplier Utama', '081234567896', 'Jl. Industri No. 123, Jakarta', '$2y$12$Axkv9ZftCn2UeogHjLtjQ.LnHt0.qnC87.VgXwRr5zmh9zAqtX.Y6', NULL, NULL, '2025-07-20 18:36:54', '2025-07-20 18:36:54', NULL),
(2, 2, 'CV. Supplier Makanan', '081234567897', 'Jl. Dagang No. 45, Surabaya', '$2y$12$k4iBK6flPsY/Vd4/OEp81OmmE.tvWyharyNZVH9y5A3MdcRIaij7S', NULL, NULL, '2025-07-20 18:36:54', '2025-07-20 18:36:54', NULL),
(3, 1, 'UD. Bahan Baku Sehat', '081234567898', 'Jl. Kesehatan No. 67, Malang', '$2y$12$WWLF5sOvmvJ9ypAiD66Dre6z7Bg5N.suW13zu8n4ybFRkrlyc3nvi', NULL, NULL, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_users`
--

CREATE TABLE `master_users` (
  `user_id` bigint UNSIGNED NOT NULL,
  `company_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jwt_token` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_users`
--

INSERT INTO `master_users` (`user_id`, `company_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `jwt_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Administrator', 'admin@mail', NULL, '$2y$12$mhCiuMFZK4AdAWJXTYZ7Iuxx9/vYfO/HOfIk.kTa8onctwhl1lolG', NULL, NULL, '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL),
(2, 2, 'Staff User', 'staff@mail', NULL, '$2y$12$FgywVZ.wG90NGCMOZx44qepMSaJvtwFE7GOxLrmKyXfeRkd9NF4Ai', NULL, NULL, '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL),
(3, 1, 'Manager User', 'manager@mail', NULL, '$2y$12$t5U1/hjDDV6aWkeft7ssPeJj4ufhQ9uQFDiZGz4eLt0CTVlUnhNSi', NULL, NULL, '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL),
(4, 3, 'Supervisor User', 'supervisor@mail', NULL, '$2y$12$pSoW3uMG8b1BPn3xcgaPiuiMG0tvb0SLFhlmnvta9iCLohX.kiJje', NULL, NULL, '2025-07-20 18:36:53', '2025-07-20 18:36:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_users_access`
--

CREATE TABLE `master_users_access` (
  `access_id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `menu_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_users_branches`
--

CREATE TABLE `master_users_branches` (
  `user_branch_id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `branch_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_users_branches`
--

INSERT INTO `master_users_branches` (`user_branch_id`, `user_id`, `branch_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(2, 1, 2, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(3, 1, 3, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL),
(4, 2, 1, '2025-07-20 18:36:55', '2025-07-20 18:36:55', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_07_01_073849_multiple_tables', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6jmN0rEmeFInknFj6U1dPt088AhjPmO5eRUk55Ou', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.1 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMTd4TzhBT3FVeTdjM3d6VGhpVjhmSVdkcXRkUUMxWDJYUWlxaW1KaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753064051),
('8y1KTHQuAfyiUvEDv215NIwVl4lGOTpO4Prvsgem', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.1 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSzNrdHNGREtoR250RGFiUmhLV1JWMUFUU0Fwc214RDdsNG1uQ0xFaCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoxMDQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jb21wYW5pZXM/aWQ9YmE2MjJkMWMtZjMxZi00YzUwLTk2OTctYjRjMThlNjA0ZTlhJnZzY29kZUJyb3dzZXJSZXFJZD0xNzUzMDY0MDQ3NzQ5Ijt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTA0OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvY29tcGFuaWVzP2lkPWJhNjIyZDFjLWYzMWYtNGM1MC05Njk3LWI0YzE4ZTYwNGU5YSZ2c2NvZGVCcm93c2VyUmVxSWQ9MTc1MzA2NDA0Nzc0OSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753064048),
('cjyIcmYlw3DIbErZtLxyaddD7GACUXUE76V3spso', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.1 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiTUJkSk4zMWtjV0dmeHBneWl2cDdpUWtLSHc5S3hGSzZFV1dVdjFnVCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753064044),
('Ftpnnd1pypYW0f6zCUAh7BWTTsUxjOpK8QaZFInd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.1 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicW5MYUhsWVZTWVFjMUQwNHhMNkVMUEVmTUk4Y1NTV29jTlNwQkZ0UyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoxMDc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC90cmFuc2FjdGlvbnM/aWQ9MDE2MTY5ZjAtZGZjYy00MzQ4LTkzNjYtODI3ZDBhMTY3OWY4JnZzY29kZUJyb3dzZXJSZXFJZD0xNzUzMDY3MDE5NTc1Ijt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTA3OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvdHJhbnNhY3Rpb25zP2lkPTAxNjE2OWYwLWRmY2MtNDM0OC05MzY2LTgyN2QwYTE2NzlmOCZ2c2NvZGVCcm93c2VyUmVxSWQ9MTc1MzA2NzAxOTU3NSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753067020),
('ILAnY8qAYnXxGVhy5Tn4aGy3AyjwuaF52SAFqe5Q', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.1 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS29ObnRUaWZBTnhndk1vZ2xtZGprRlY5S3V1aVpNVHNYY29tOG0xMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753066726),
('jqfvuCRb94KflH1qlQivaA63bCgUl4jWIOg93pXn', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.1 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieFc3djIwR3l5SU95UDYwdFZKVzJKSllJakpGM3RmYzhKV3lOVVlhQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753064029),
('kK9kFnUVH7tMYhmfJZ8IRLFuA2DCwf17PrbZ5XHt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.1 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMzlvVTY3SXRZa3JWZEtvblNVdjlzTWsxdzdDOUtPS2Y5cVFBRHN3ZyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoxMTc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC90cmFuc2FjdGlvbnMvMS9pbnZvaWNlP2lkPTQwNDAyYWFmLTFlMWQtNDc1Ny04MzU3LThlNzZjMWUxZDJiNiZ2c2NvZGVCcm93c2VyUmVxSWQ9MTc1MzA2NjQ5NTcwMiI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjExNzoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL3RyYW5zYWN0aW9ucy8xL2ludm9pY2U/aWQ9NDA0MDJhYWYtMWUxZC00NzU3LTgzNTctOGU3NmMxZTFkMmI2JnZzY29kZUJyb3dzZXJSZXFJZD0xNzUzMDY2NDk1NzAyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753066496),
('lv2aB0SLqGTkjw7Icf9J0fN1VB7TGPob5zOtyw5R', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.1 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMzNKbE1ncWFjRUxjSFoyc3BqbzVEWk9iTlNMSXVkbEZJemxzc0tIZCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoxMDQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jb21wYW5pZXM/aWQ9YmE2MjJkMWMtZjMxZi00YzUwLTk2OTctYjRjMThlNjA0ZTlhJnZzY29kZUJyb3dzZXJSZXFJZD0xNzUzMDY0MDI4MjkyIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTA0OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvY29tcGFuaWVzP2lkPWJhNjIyZDFjLWYzMWYtNGM1MC05Njk3LWI0YzE4ZTYwNGU5YSZ2c2NvZGVCcm93c2VyUmVxSWQ9MTc1MzA2NDAyODI5MiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753064029),
('M2ZSZCkvPFPhY7qKM2m2HAi7wZvSUQhCozgT4zqK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.1 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRWlSaTNHVFRPa3llcUFqQjlMZ0RmVHNQcW1TUDlDUnRIbkp3TGs3RiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoxMDc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC90cmFuc2FjdGlvbnM/aWQ9NDA0MDJhYWYtMWUxZC00NzU3LTgzNTctOGU3NmMxZTFkMmI2JnZzY29kZUJyb3dzZXJSZXFJZD0xNzUzMDY2NDMyNzg1Ijt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTA3OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvdHJhbnNhY3Rpb25zP2lkPTQwNDAyYWFmLTFlMWQtNDc1Ny04MzU3LThlNzZjMWUxZDJiNiZ2c2NvZGVCcm93c2VyUmVxSWQ9MTc1MzA2NjQzMjc4NSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753066433),
('Nf28ptNO4fSeDTmLFd7KyqRbP3VWMI1PqlFjLrQT', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.1 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZDRSTkVEOER2dUhQTGFZZHBxaXEzWExpU2d2RXZtY3lPbFZzYVhmMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753066988),
('nqK8EppiAH5r7L9QjexH20LbPfaMYcCWObsEFCiS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.1 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMU0yQmNWWXIzQUpEVEMwdUdvNmtpOUY0d2Z2Q0ViR2VYZ2R0Q1NBeiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoxMDc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC90cmFuc2FjdGlvbnM/aWQ9MDE2MTY5ZjAtZGZjYy00MzQ4LTkzNjYtODI3ZDBhMTY3OWY4JnZzY29kZUJyb3dzZXJSZXFJZD0xNzUzMDY2NzE4NzM3Ijt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTA3OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvdHJhbnNhY3Rpb25zP2lkPTAxNjE2OWYwLWRmY2MtNDM0OC05MzY2LTgyN2QwYTE2NzlmOCZ2c2NvZGVCcm93c2VyUmVxSWQ9MTc1MzA2NjcxODczNyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753066719),
('NQyCmbsBJRMVwn5Tk8wHGkj1URricPNHDHb2ud8s', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.1 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib2lBZjNhSWFGOFhPeU54S1RSN1ZmS1d5b0ZZOExWS0pGUm9vTW9TcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753066719),
('oJHsGHH3yj6FzCzHWmHtnkFAUTUCyi3fNhANHoPF', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.1 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNVo0eWlrRDFCMTlaWWpLTWV1eWdweDdvaWRScFlKTEx1SlptWE5uWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753066736),
('PnzimFA72yzI0wA6lDPQfhU19iqm8Di01jMFxuUd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.1 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicjd0aDRTNjQ4cTREQ1hGdnFWczBVbDB1MEJSZkRKeGd0NUxJVFVBdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753067020),
('qxfDgtynvFYhPNh4pDk0TgUPDnXD0X2ZQzVXPN3e', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.1 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia3N2SzhCZ2hRUGRIdm15Szc2c1ZzQ2xyOHdaNHNRd0hVM3ZyZzRvdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753067052),
('RQmKZXb4NYk8gXoGE3R6BsIB5dBDJLPEJWp6h0pb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUHdQNHZ3aExia2FsQTh2b01PcGJpRTM2NDRQcndhMVlid3dEQUlibCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1753068571),
('sENvHnaruzxxTEWKicS69whzR8GOyJTETFG1ZN5T', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.1 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR1Y1aFk4RGh6d1dHNldPNVJzTWpvSnhIYUxjaHUzZW5IZnd2TUptYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753064049),
('SmspUdsg0QVXNi7GaMJF4eAM0L4qa9Zq86kFxXqo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.1 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieWdTYmZWU2pwMDQwbmpzZ2VFRUhsZzYwc2xYandzWGFEWDNrMjNXTyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoxMDM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9pbnZvaWNlcz9pZD0wMTYxNjlmMC1kZmNjLTQzNDgtOTM2Ni04MjdkMGExNjc5ZjgmdnNjb2RlQnJvd3NlclJlcUlkPTE3NTMwNjY3MzU1MTEiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoxMDM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9pbnZvaWNlcz9pZD0wMTYxNjlmMC1kZmNjLTQzNDgtOTM2Ni04MjdkMGExNjc5ZjgmdnNjb2RlQnJvd3NlclJlcUlkPTE3NTMwNjY3MzU1MTEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753066735),
('TGl9YZK8ZMKGxJLnruMWGCQiJzTM0qsqW9bXa5Q2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.1 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSU9MZ3dVVG82cmJHV3VSV1ZQbEZQUFBFaDZ1YUlyeVo2R3FiN3VybSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753066496),
('w6vazs3tHNTA1eOxubKm9lcC4iuhgx7r2Lq3lv4L', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.1 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSjZ6eG5MY1lFMFZ3a2M3OW1WNHU5TGJPb2pkVUY3aFh2bkVicnhudCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753066434),
('yigXUUQmqVsSUIgpFuxKAt1nmY07RHd8fhUMvoKY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.1 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV05rUWVqckp2Nm1KVXdaTXptMVlvbnpyRDl4OWJiVUZMdVRhMjVkVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753066987),
('yzuAI100CZKGtSRB4oVWsE6oqmuFMkQOGCifu2C7', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.1 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMWNrY21pelE4V2dMVUtXVDJ3UnMzUWFyb283Y1o4TFprdEpNbkI2SyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoxMDQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jb21wYW5pZXM/aWQ9YmE2MjJkMWMtZjMxZi00YzUwLTk2OTctYjRjMThlNjA0ZTlhJnZzY29kZUJyb3dzZXJSZXFJZD0xNzUzMDY0MDQ4NTI4Ijt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTA0OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvY29tcGFuaWVzP2lkPWJhNjIyZDFjLWYzMWYtNGM1MC05Njk3LWI0YzE4ZTYwNGU5YSZ2c2NvZGVCcm93c2VyUmVxSWQ9MTc1MzA2NDA0ODUyOCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753064051),
('ZphlMi8p5OoKov2qIHDTWcWIubPHg11xGJ4yE9Tk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.102.1 Chrome/134.0.6998.205 Electron/35.6.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZ3RiclpyR2ptN0NzbXdJUHBIbkVpR1k2MDZnRFlMVk1xcTNNV21RdyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoxMTc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC90cmFuc2FjdGlvbnMvMS9pbnZvaWNlP2lkPTAxNjE2OWYwLWRmY2MtNDM0OC05MzY2LTgyN2QwYTE2NzlmOCZ2c2NvZGVCcm93c2VyUmVxSWQ9MTc1MzA2NzA1MTgzOSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjExNzoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL3RyYW5zYWN0aW9ucy8xL2ludm9pY2U/aWQ9MDE2MTY5ZjAtZGZjYy00MzQ4LTkzNjYtODI3ZDBhMTY3OWY4JnZzY29kZUJyb3dzZXJSZXFJZD0xNzUzMDY3MDUxODM5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753067052);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_payments`
--

CREATE TABLE `transaction_payments` (
  `transaction_payment_id` bigint UNSIGNED NOT NULL,
  `transaction_purchase_id` int DEFAULT NULL,
  `transaction_sales_id` int DEFAULT NULL,
  `deposit` double DEFAULT NULL,
  `withdraw` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_purchases`
--

CREATE TABLE `transaction_purchases` (
  `transaction_purchase_id` bigint UNSIGNED NOT NULL,
  `supplier_id` int NOT NULL,
  `branch_id` int NOT NULL,
  `payment_method_id` int NOT NULL,
  `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `subtotal` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `discount_percentage` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `change_amount` double DEFAULT NULL,
  `whatsapp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_purchases_details`
--

CREATE TABLE `transaction_purchases_details` (
  `transaction_purchase_detail_id` bigint UNSIGNED NOT NULL,
  `transaction_purchase_id` int NOT NULL,
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
  `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `subtotal` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `discount_percentage` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `change_amount` double DEFAULT NULL,
  `whatsapp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaction_sales`
--

INSERT INTO `transaction_sales` (`transaction_sales_id`, `branch_id`, `payment_method_id`, `user_id`, `customer_id`, `sales_type_id`, `number`, `date`, `notes`, `subtotal`, `discount_amount`, `discount_percentage`, `total_amount`, `paid_amount`, `change_amount`, `whatsapp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 6, 3, 1, 3, 'TXN-20250721-0001', '2025-07-21 02:51:31', 'Pesanan untuk acara gathering', 932796.34, 21484.1, 5, 408197.9, 456807.9, 48610, '+6288065269180', '2025-07-20 19:51:31', '2025-07-20 19:51:31', NULL),
(2, 2, 3, 1, 3, 3, 'TXN-20250707-0002', '2025-07-07 02:51:31', 'Paket bundling produk', 185946.72, 3004.17, 1, 297412.83, 313285.83, 15873, '+6286344221357', '2025-07-06 19:51:31', '2025-07-20 19:51:31', NULL),
(3, 3, 2, 2, 2, 2, 'TXN-20250628-0003', '2025-06-28 02:51:31', 'Pesanan untuk acara gathering', 232505.47, 29786.26, 14, 182972.74, 230549.74, 47577, '+6286099748808', '2025-06-27 19:51:31', '2025-07-20 19:51:31', NULL),
(4, 2, 2, 4, 1, 3, 'TXN-20250706-0004', '2025-07-06 02:51:31', 'Pembelian rutin mingguan', 50216, 16670.98, 19, 71071.02, 94914.02, 23843, '+6284582000633', '2025-07-05 19:51:31', '2025-07-20 19:51:31', NULL),
(5, 1, 5, 4, 1, 1, 'TXN-20250719-0005', '2025-07-19 02:51:31', 'Pembelian wholesale', 405619.84, 5487.03, 3, 177413.97, 180434.97, 3021, '+6281945722390', '2025-07-18 19:51:31', '2025-07-20 19:51:31', NULL),
(6, 1, 1, 1, 2, 1, 'TXN-20250716-0006', '2025-07-16 02:51:31', 'Pesanan untuk hadiah', 516728.84, 17092.6, 20, 68370.4, 114765.4, 46395, '+6281110205090', '2025-07-15 19:51:31', '2025-07-20 19:51:31', NULL),
(7, 2, 6, 3, 1, 1, 'TXN-20250721-0007', '2025-07-21 02:51:31', 'Pesanan untuk hadiah', 74398.56, 0, 0, 96115, 144945, 48830, '+6284186358174', '2025-07-20 19:51:31', '2025-07-20 19:51:31', NULL),
(8, 1, 6, 4, 2, 1, 'TXN-20250701-0008', '2025-07-01 02:51:31', 'Pesanan urgent - kirim segera', 517567.99, 14675.94, 3, 474522.06, 490170.06, 15648, '+6282205738397', '2025-06-30 19:51:31', '2025-07-20 19:51:31', NULL),
(9, 1, 2, 3, 2, 3, 'TXN-20250703-0009', '2025-07-03 02:51:31', 'Orderan custom packaging', 460023.12, 17128.96, 4, 411095.04, 441613.04, 30518, '+6289231662993', '2025-07-02 19:51:31', '2025-07-20 19:51:31', NULL),
(10, 2, 2, 3, 3, 3, 'TXN-20250712-0001', '2025-07-12 02:51:58', 'Pembelian wholesale', 399071.52, 33618.5, 10, 302566.5, 326036.5, 23470, '+6289422590249', '2025-07-11 19:51:58', '2025-07-20 19:51:58', NULL),
(11, 1, 6, 2, 3, 3, 'TXN-20250624-0002', '2025-06-24 02:51:58', 'Pesanan untuk acara gathering', 638747.44, 87252.8, 20, 349011.2, 394072.2, 45061, '+6289894487481', '2025-06-23 19:51:58', '2025-07-20 19:51:58', NULL),
(12, 3, 3, 3, 1, 1, 'TXN-20250703-0003', '2025-07-03 02:51:58', 'Pembelian untuk stok bulanan', 620709.86, 23672.16, 16, 124278.84, 173314.84, 49036, '+6281582095168', '2025-07-02 19:51:58', '2025-07-20 19:51:58', NULL),
(13, 3, 6, 3, 2, 2, 'TXN-20250716-0004', '2025-07-16 02:51:58', 'Orderan khusus pelanggan VIP', 485316.68, 15574.64, 8, 179108.36, 209173.36, 30065, '+6288858549365', '2025-07-15 19:51:58', '2025-07-20 19:51:59', NULL),
(14, 3, 2, 1, 1, 1, 'TXN-20250706-0005', '2025-07-06 02:51:59', 'Pesanan untuk event ulang tahun', 522947.39, 14052.6, 18, 64017.4, 66031.4, 2014, '+6289663759613', '2025-07-05 19:51:59', '2025-07-20 19:51:59', NULL),
(15, 3, 4, 4, 1, 2, 'TXN-20250718-0006', '2025-07-18 02:51:59', 'Pesanan urgent - kirim segera', 433600.74, 65453.78, 14, 402073.22, 404943.22, 2870, '+6286936925507', '2025-07-17 19:51:59', '2025-07-20 19:51:59', NULL),
(16, 1, 6, 4, 1, 1, 'TXN-20250716-0007', '2025-07-16 02:51:59', 'Paket bundling produk', 239862.52, 9936.42, 3, 321277.58, 369636.58, 48359, '+6283579955710', '2025-07-15 19:51:59', '2025-07-20 19:51:59', NULL),
(17, 2, 5, 2, 3, 2, 'TXN-20250701-0008', '2025-07-01 02:51:59', 'Orderan khusus pelanggan VIP', 274760.64, 30956.16, 8, 355995.84, 403399.84, 47404, '+6281237460782', '2025-06-30 19:51:59', '2025-07-20 19:51:59', NULL),
(18, 2, 3, 3, 2, 3, 'TXN-20250721-0009', '2025-07-21 02:51:59', 'Pesanan urgent - kirim segera', 473856.88, 6008.94, 3, 194289.06, 212133.06, 17844, '+6283712461378', '2025-07-20 19:51:59', '2025-07-20 19:51:59', NULL),
(19, 2, 3, 1, 3, 1, 'TXN-20250627-0010', '2025-06-27 02:51:59', NULL, 183768, 47346.3, 10, 426116.7, 459795.7, 33679, '+6283614250909', '2025-06-26 19:51:59', '2025-07-20 19:51:59', NULL),
(20, 3, 1, 2, 2, 3, 'TXN-20250703-0011', '2025-07-03 02:51:59', 'Pesanan urgent - kirim segera', 635971.96, 11651.85, 3, 376743.15, 401396.15, 24653, '+6287230295430', '2025-07-02 19:51:59', '2025-07-20 19:51:59', NULL),
(21, 3, 5, 3, 3, 2, 'TXN-20250627-0012', '2025-06-27 02:51:59', 'Pembelian rutin mingguan', 294395.5, 42908.2, 20, 171632.8, 176333.8, 4701, '+6282619933226', '2025-06-26 19:51:59', '2025-07-20 19:51:59', NULL),
(22, 1, 2, 4, 3, 1, 'TXN-20250713-0013', '2025-07-13 02:51:59', 'Pembelian untuk stok bulanan', 582672.06, 28461.51, 11, 230279.49, 243931.49, 13652, '+6284834514861', '2025-07-12 19:51:59', '2025-07-20 19:51:59', NULL),
(23, 3, 1, 1, 1, 1, 'TXN-20250628-0014', '2025-06-28 02:51:59', 'Pesanan urgent - kirim segera', 333884.19, 87925.68, 18, 400550.32, 431965.32, 31415, '+6285195840864', '2025-06-27 19:51:59', '2025-07-20 19:51:59', NULL),
(24, 3, 4, 3, 1, 3, 'TXN-20250721-0015', '2025-07-21 02:51:59', NULL, 321966.32, 9790.64, 2, 479741.36, 516365.36, 36624, '+6284075459646', '2025-07-20 19:51:59', '2025-07-20 19:51:59', NULL),
(25, 2, 4, 3, 3, 3, 'TXN-20250703-0016', '2025-07-03 02:51:59', 'Pesanan untuk event ulang tahun', 432288.44, 69510.79, 17, 339376.21, 361111.21, 21735, '+6283611592906', '2025-07-02 19:51:59', '2025-07-20 19:51:59', NULL),
(26, 2, 6, 1, 1, 2, 'TXN-20250625-0017', '2025-06-25 02:51:59', 'Orderan khusus pelanggan VIP', 762249.04, 3861.86, 2, 189231.14, 204747.14, 15516, '+6286742155572', '2025-06-24 19:51:59', '2025-07-20 19:51:59', NULL),
(27, 1, 1, 3, 2, 3, 'TXN-20250707-0018', '2025-07-07 02:51:59', 'Orderan custom packaging', 332280.72, 6468.27, 3, 209140.73, 241643.73, 32503, '+6282295053189', '2025-07-06 19:51:59', '2025-07-20 19:51:59', NULL),
(28, 1, 3, 1, 3, 1, 'TXN-20250625-0019', '2025-06-25 02:51:59', 'Pesanan untuk acara gathering', 790514.3, 25464.4, 8, 292840.6, 342477.6, 49637, '+6284298240747', '2025-06-24 19:51:59', '2025-07-20 19:51:59', NULL),
(29, 1, 1, 2, 1, 1, 'TXN-20250704-0020', '2025-07-04 02:51:59', 'Pesanan untuk acara gathering', 369479.48, 26506.27, 7, 352154.73, 391692.73, 39538, '+6281304829129', '2025-07-03 19:51:59', '2025-07-20 19:51:59', NULL),
(30, 1, 2, 1, 2, 1, 'TXN-20250628-0021', '2025-06-28 02:51:59', 'Pesanan untuk hadiah', 144589.5, 12647.4, 15, 71668.6, 97608.6, 25940, '+6284581392495', '2025-06-27 19:51:59', '2025-07-20 19:51:59', NULL),
(31, 3, 6, 4, 3, 3, 'TXN-20250701-0022', '2025-07-01 02:51:59', 'Pesanan urgent - kirim segera', 168253.98, 17719.2, 15, 100408.8, 120641.8, 20233, '+6286375702792', '2025-06-30 19:51:59', '2025-07-20 19:51:59', NULL),
(32, 1, 3, 4, 1, 1, 'TXN-20250629-0023', '2025-06-29 02:51:59', 'Orderan custom packaging', 671918.63, 45194.93, 11, 365668.07, 385993.07, 20325, '+6285039363935', '2025-06-28 19:51:59', '2025-07-20 19:51:59', NULL),
(33, 1, 2, 3, 3, 2, 'TXN-20250624-0024', '2025-06-24 02:51:59', 'Pembelian wholesale', 605608.62, 80578.4, 20, 322313.6, 369768.6, 47455, '+6288152407743', '2025-06-23 19:51:59', '2025-07-20 19:51:59', NULL),
(34, 1, 5, 1, 1, 3, 'TXN-20250718-0025', '2025-07-18 02:51:59', 'Pesanan untuk event ulang tahun', 20871, 14174.51, 7, 188318.49, 227538.49, 39220, '+6288592134660', '2025-07-17 19:51:59', '2025-07-20 19:51:59', NULL),
(35, 2, 5, 3, 3, 3, 'TXN-20250703-0026', '2025-07-03 02:51:59', 'Pesanan untuk hadiah', 668922.81, 6838.08, 3, 221097.92, 223926.92, 2829, '+6286357292418', '2025-07-02 19:51:59', '2025-07-20 19:51:59', NULL),
(36, 1, 2, 3, 2, 1, 'TXN-20250713-0027', '2025-07-13 02:51:59', 'Pembelian untuk stok bulanan', 929722.09, 11618.32, 8, 133610.68, 167791.68, 34181, '+6289142128330', '2025-07-12 19:51:59', '2025-07-20 19:51:59', NULL),
(37, 1, 4, 1, 2, 3, 'TXN-20250719-0028', '2025-07-19 02:51:59', 'Pembelian untuk stok bulanan', 187857.67, 28458.66, 6, 445852.34, 457548.34, 11696, '+6282782716405', '2025-07-18 19:51:59', '2025-07-20 19:51:59', NULL),
(38, 1, 4, 4, 2, 2, 'TXN-20250712-0029', '2025-07-12 02:51:59', 'Pembelian rutin mingguan', 765156.91, 2198.78, 2, 107740.22, 139391.22, 31651, '+6285645047580', '2025-07-11 19:51:59', '2025-07-20 19:51:59', NULL),
(39, 3, 4, 3, 2, 2, 'TXN-20250703-0030', '2025-07-03 02:51:59', 'Orderan khusus pelanggan VIP', 231136.95, 1952.27, 1, 193274.73, 223555.73, 30281, '+6283060966720', '2025-07-02 19:51:59', '2025-07-20 19:51:59', NULL),
(40, 3, 4, 2, 3, 2, 'TXN-20250630-0031', '2025-06-30 02:51:59', 'Orderan custom packaging', 168319.46, 60943.83, 19, 259813.17, 294727.17, 34914, '+6288540110746', '2025-06-29 19:51:59', '2025-07-20 19:51:59', NULL),
(41, 3, 2, 1, 3, 2, 'TXN-20250719-0032', '2025-07-19 02:51:59', 'Pesanan untuk acara gathering', 359517.6, 93388.04, 19, 398127.96, 445986.96, 47859, '+6281748117571', '2025-07-18 19:51:59', '2025-07-20 19:51:59', NULL),
(42, 3, 2, 1, 2, 2, 'TXN-20250712-0033', '2025-07-12 02:51:59', 'Paket bundling produk', 702999.07, 9982.5, 11, 80767.5, 114698.5, 33931, '+6286898985693', '2025-07-11 19:51:59', '2025-07-20 19:51:59', NULL),
(43, 1, 6, 1, 1, 3, 'TXN-20250706-0034', '2025-07-06 02:51:59', 'Paket bundling produk', 361093.68, 31134.87, 9, 314808.13, 323408.13, 8600, '+6287901598594', '2025-07-05 19:51:59', '2025-07-20 19:52:00', NULL),
(44, 3, 4, 4, 3, 1, 'TXN-20250629-0035', '2025-06-29 02:52:00', NULL, 823650.58, 0, 0, 192751, 230263, 37512, '+6281392922836', '2025-06-28 19:52:00', '2025-07-20 19:52:00', NULL),
(45, 3, 3, 2, 1, 3, 'TXN-20250712-0036', '2025-07-12 02:52:00', 'Pembelian wholesale', 718175.64, 12311.26, 13, 82390.74, 103399.74, 21009, '+6287728046930', '2025-07-11 19:52:00', '2025-07-20 19:52:00', NULL),
(46, 3, 3, 1, 1, 1, 'TXN-20250701-0037', '2025-07-01 02:52:00', 'Pesanan untuk hadiah', 708618.69, 16977, 4, 407448, 418681, 11233, '+6281596824956', '2025-06-30 19:52:00', '2025-07-20 19:52:00', NULL),
(47, 1, 1, 2, 2, 1, 'TXN-20250707-0038', '2025-07-07 02:52:00', NULL, 249120.06, 24560.95, 5, 466658.05, 478360.05, 11702, '+6287008104476', '2025-07-06 19:52:00', '2025-07-20 19:52:00', NULL),
(48, 2, 6, 2, 1, 3, 'TXN-20250710-0039', '2025-07-10 02:52:00', 'Pesanan untuk hadiah', 178166.66, 6167.16, 2, 302190.84, 318254.84, 16064, '+6285964583182', '2025-07-09 19:52:00', '2025-07-20 19:52:00', NULL),
(49, 3, 3, 2, 3, 1, 'TXN-20250628-0040', '2025-06-28 02:52:00', 'Paket bundling produk', 119229.72, 0, 0, 112719, 159481, 46762, '+6287152283784', '2025-06-27 19:52:00', '2025-07-20 19:52:00', NULL),
(50, 2, 4, 2, 2, 3, 'TXN-20250703-0041', '2025-07-03 02:52:00', 'Pesanan untuk event ulang tahun', 603272.74, 0, 0, 358613, 371319, 12706, '+6287449571111', '2025-07-02 19:52:00', '2025-07-20 19:52:00', NULL),
(51, 1, 5, 3, 2, 2, 'TXN-20250717-0042', '2025-07-17 02:52:00', 'Pembelian wholesale', 524710.52, 2437.42, 2, 119433.58, 163493.58, 44060, '+6281552338095', '2025-07-16 19:52:00', '2025-07-20 19:52:00', NULL),
(52, 3, 3, 1, 1, 2, 'TXN-20250705-0043', '2025-07-05 02:52:00', 'Orderan khusus pelanggan VIP', 891094.55, 24106.41, 9, 243742.59, 293501.59, 49759, '+6284802217150', '2025-07-04 19:52:00', '2025-07-20 19:52:00', NULL),
(53, 2, 6, 2, 2, 3, 'TXN-20250716-0044', '2025-07-16 02:52:00', 'Pesanan urgent - kirim segera', 572411.84, 18374.4, 11, 148665.6, 187830.6, 39165, '+6285931396992', '2025-07-15 19:52:00', '2025-07-20 19:52:00', NULL),
(54, 1, 4, 3, 3, 1, 'TXN-20250713-0045', '2025-07-13 02:52:00', 'Orderan custom packaging', 354007.7, 21830.04, 6, 342003.96, 376343.96, 34340, '+6285559314616', '2025-07-12 19:52:00', '2025-07-20 19:52:00', NULL),
(55, 2, 1, 3, 1, 1, 'TXN-20250621-0046', '2025-06-21 02:52:00', 'Pesanan urgent - kirim segera', 632610.92, 23615.02, 13, 158038.98, 187386.98, 29348, '+6281590697422', '2025-06-20 19:52:00', '2025-07-20 19:52:00', NULL),
(56, 2, 1, 3, 3, 1, 'TXN-20250715-0047', '2025-07-15 02:52:00', 'Pesanan urgent - kirim segera', 185748.8, 10903.76, 14, 66980.24, 87858.24, 20878, '+6287472750549', '2025-07-14 19:52:00', '2025-07-20 19:52:00', NULL),
(57, 2, 1, 3, 2, 2, 'TXN-20250622-0048', '2025-06-22 02:52:00', 'Pembelian wholesale', 579627.12, 5273.9, 5, 100204.1, 117243.1, 17039, '+6283675283884', '2025-06-21 19:52:00', '2025-07-20 19:52:00', NULL),
(58, 3, 1, 3, 1, 2, 'TXN-20250706-0049', '2025-07-06 02:52:00', 'Pesanan untuk acara gathering', 112574.88, 36578.32, 8, 420650.68, 457255.68, 36605, '+6288210361719', '2025-07-05 19:52:00', '2025-07-20 19:52:00', NULL),
(59, 1, 3, 2, 3, 3, 'TXN-20250708-0050', '2025-07-08 02:52:00', NULL, 438705.07, 31480.4, 10, 283323.6, 319643.6, 36320, '+6287816521633', '2025-07-07 19:52:00', '2025-07-20 19:52:00', NULL);

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
(1, 1, 5, 7, 19438, 25181, 176267, 10576.02, 6, 165690.98, '2025-07-20 19:51:31', '2025-07-20 19:51:31', NULL),
(2, 1, 1, 9, 24859, 32815, 295335, 0, 0, 295335, '2025-07-20 19:51:31', '2025-07-20 19:51:31', NULL),
(3, 1, 6, 5, 18337, 34536, 172680, 1726.8, 1, 170953.2, '2025-07-20 19:51:31', '2025-07-20 19:51:31', NULL),
(4, 1, 2, 3, 22342, 31508, 94524, 8507.16, 9, 86016.84, '2025-07-20 19:51:31', '2025-07-20 19:51:31', NULL),
(5, 1, 6, 8, 24533, 27398, 219184, 4383.68, 2, 214800.32, '2025-07-20 19:51:31', '2025-07-20 19:51:31', NULL),
(6, 2, 4, 6, 23172, 33686, 202116, 16169.28, 8, 185946.72, '2025-07-06 19:51:31', '2025-07-06 19:51:31', NULL),
(7, 3, 6, 2, 22321, 21470, 42940, 1288.2, 3, 41651.8, '2025-06-27 19:51:31', '2025-06-27 19:51:31', NULL),
(8, 3, 2, 7, 23925, 29317, 205219, 14365.33, 7, 190853.67, '2025-06-27 19:51:31', '2025-06-27 19:51:31', NULL),
(9, 4, 2, 2, 24361, 25108, 50216, 0, 0, 50216, '2025-07-05 19:51:31', '2025-07-05 19:51:31', NULL),
(10, 5, 3, 10, 20235, 26014, 260140, 15608.4, 6, 244531.6, '2025-07-18 19:51:31', '2025-07-18 19:51:31', NULL),
(11, 5, 2, 3, 19661, 21132, 63396, 3803.76, 6, 59592.24, '2025-07-18 19:51:31', '2025-07-18 19:51:31', NULL),
(12, 5, 2, 5, 23951, 21145, 105725, 4229, 4, 101496, '2025-07-18 19:51:31', '2025-07-18 19:51:31', NULL),
(13, 6, 3, 4, 19568, 24167, 96668, 2900.04, 3, 93767.96, '2025-07-15 19:51:31', '2025-07-15 19:51:31', NULL),
(14, 6, 4, 10, 24733, 21668, 216680, 2166.8, 1, 214513.2, '2025-07-15 19:51:31', '2025-07-15 19:51:31', NULL),
(15, 6, 5, 7, 24819, 31019, 217133, 8685.32, 4, 208447.68, '2025-07-15 19:51:31', '2025-07-15 19:51:31', NULL),
(16, 7, 2, 4, 18000, 20217, 80868, 6469.44, 8, 74398.56, '2025-07-20 19:51:31', '2025-07-20 19:51:31', NULL),
(17, 8, 2, 1, 23035, 20831, 20831, 1041.55, 5, 19789.45, '2025-06-30 19:51:31', '2025-06-30 19:51:31', NULL),
(18, 8, 6, 9, 15191, 20319, 182871, 18287.1, 10, 164583.9, '2025-06-30 19:51:31', '2025-06-30 19:51:31', NULL),
(19, 8, 5, 6, 23360, 27684, 166104, 14949.36, 9, 151154.64, '2025-06-30 19:51:31', '2025-06-30 19:51:31', NULL),
(20, 8, 2, 8, 18747, 22755, 182040, 0, 0, 182040, '2025-06-30 19:51:31', '2025-06-30 19:51:31', NULL),
(21, 9, 4, 7, 19234, 30837, 215859, 17268.72, 8, 198590.28, '2025-07-02 19:51:31', '2025-07-02 19:51:31', NULL),
(22, 9, 3, 3, 24227, 31593, 94779, 7582.32, 8, 87196.68, '2025-07-02 19:51:31', '2025-07-02 19:51:31', NULL),
(23, 9, 2, 6, 17181, 29632, 177792, 3555.84, 2, 174236.16, '2025-07-02 19:51:31', '2025-07-02 19:51:31', NULL),
(24, 10, 4, 2, 21692, 30124, 60248, 2409.92, 4, 57838.08, '2025-07-11 19:51:58', '2025-07-11 19:51:58', NULL),
(25, 10, 2, 1, 16644, 22110, 22110, 2211, 10, 19899, '2025-07-11 19:51:58', '2025-07-11 19:51:58', NULL),
(26, 10, 1, 3, 15497, 20695, 62085, 1241.7, 2, 60843.3, '2025-07-11 19:51:58', '2025-07-11 19:51:58', NULL),
(27, 10, 2, 9, 16025, 31806, 286254, 25762.86, 9, 260491.14, '2025-07-11 19:51:58', '2025-07-11 19:51:58', NULL),
(28, 11, 5, 6, 23605, 24654, 147924, 7396.2, 5, 140527.8, '2025-06-23 19:51:58', '2025-06-23 19:51:58', NULL),
(29, 11, 5, 10, 18646, 31396, 313960, 25116.8, 8, 288843.2, '2025-06-23 19:51:58', '2025-06-23 19:51:58', NULL),
(30, 11, 6, 3, 17013, 28756, 86268, 2588.04, 3, 83679.96, '2025-06-23 19:51:58', '2025-06-23 19:51:58', NULL),
(31, 11, 4, 4, 22433, 34532, 138128, 12431.52, 9, 125696.48, '2025-06-23 19:51:58', '2025-06-23 19:51:58', NULL),
(32, 12, 4, 10, 24423, 28019, 280190, 0, 0, 280190, '2025-07-02 19:51:58', '2025-07-02 19:51:58', NULL),
(33, 12, 1, 6, 18642, 28147, 168882, 11821.74, 7, 157060.26, '2025-07-02 19:51:58', '2025-07-02 19:51:58', NULL),
(34, 12, 5, 6, 20442, 33974, 203844, 20384.4, 10, 183459.6, '2025-07-02 19:51:58', '2025-07-02 19:51:58', NULL),
(35, 13, 1, 6, 23078, 22594, 135564, 10845.12, 8, 124718.88, '2025-07-15 19:51:58', '2025-07-15 19:51:58', NULL),
(36, 13, 1, 10, 16982, 26408, 264080, 26408, 10, 237672, '2025-07-15 19:51:58', '2025-07-15 19:51:58', NULL),
(37, 13, 6, 5, 20992, 26723, 133615, 10689.2, 8, 122925.8, '2025-07-15 19:51:58', '2025-07-15 19:51:58', NULL),
(38, 14, 6, 4, 17516, 29888, 119552, 7173.12, 6, 112378.88, '2025-07-05 19:51:59', '2025-07-05 19:51:59', NULL),
(39, 14, 3, 5, 17944, 34341, 171705, 12019.35, 7, 159685.65, '2025-07-05 19:51:59', '2025-07-05 19:51:59', NULL),
(40, 14, 6, 5, 24948, 30163, 150815, 3016.3, 2, 147798.7, '2025-07-05 19:51:59', '2025-07-05 19:51:59', NULL),
(41, 14, 1, 4, 23442, 28012, 112048, 8963.84, 8, 103084.16, '2025-07-05 19:51:59', '2025-07-05 19:51:59', NULL),
(42, 15, 1, 3, 16722, 33898, 101694, 10169.4, 10, 91524.6, '2025-07-17 19:51:59', '2025-07-17 19:51:59', NULL),
(43, 15, 6, 5, 24567, 33351, 166755, 16675.5, 10, 150079.5, '2025-07-17 19:51:59', '2025-07-17 19:51:59', NULL),
(44, 15, 5, 9, 23999, 23188, 208692, 16695.36, 8, 191996.64, '2025-07-17 19:51:59', '2025-07-17 19:51:59', NULL),
(45, 16, 6, 1, 20692, 30896, 30896, 2780.64, 9, 28115.36, '2025-07-15 19:51:59', '2025-07-15 19:51:59', NULL),
(46, 16, 4, 6, 24281, 23727, 142362, 0, 0, 142362, '2025-07-15 19:51:59', '2025-07-15 19:51:59', NULL),
(47, 16, 4, 2, 17029, 22879, 45758, 3660.64, 8, 42097.36, '2025-07-15 19:51:59', '2025-07-15 19:51:59', NULL),
(48, 16, 1, 1, 22553, 28724, 28724, 1436.2, 5, 27287.8, '2025-07-15 19:51:59', '2025-07-15 19:51:59', NULL),
(49, 17, 1, 8, 20523, 34692, 277536, 2775.36, 1, 274760.64, '2025-06-30 19:51:59', '2025-06-30 19:51:59', NULL),
(50, 18, 4, 8, 19534, 22113, 176904, 5307.12, 3, 171596.88, '2025-07-20 19:51:59', '2025-07-20 19:51:59', NULL),
(51, 18, 2, 10, 21309, 30226, 302260, 0, 0, 302260, '2025-07-20 19:51:59', '2025-07-20 19:51:59', NULL),
(52, 19, 3, 8, 22162, 24180, 193440, 9672, 5, 183768, '2025-06-26 19:51:59', '2025-06-26 19:51:59', NULL),
(53, 20, 3, 8, 15424, 33354, 266832, 5336.64, 2, 261495.36, '2025-07-02 19:51:59', '2025-07-02 19:51:59', NULL),
(54, 20, 5, 7, 22810, 32882, 230174, 23017.4, 10, 207156.6, '2025-07-02 19:51:59', '2025-07-02 19:51:59', NULL),
(55, 20, 1, 8, 15266, 22250, 178000, 10680, 6, 167320, '2025-07-02 19:51:59', '2025-07-02 19:51:59', NULL),
(56, 21, 3, 10, 23952, 30989, 309890, 15494.5, 5, 294395.5, '2025-06-26 19:51:59', '2025-06-26 19:51:59', NULL),
(57, 22, 6, 3, 21788, 34109, 102327, 5116.35, 5, 97210.65, '2025-07-12 19:51:59', '2025-07-12 19:51:59', NULL),
(58, 22, 2, 4, 19045, 23306, 93224, 6525.68, 7, 86698.32, '2025-07-12 19:51:59', '2025-07-12 19:51:59', NULL),
(59, 22, 2, 9, 15956, 22901, 206109, 18549.81, 9, 187559.19, '2025-07-12 19:51:59', '2025-07-12 19:51:59', NULL),
(60, 22, 5, 6, 23486, 34579, 207474, 18672.66, 9, 188801.34, '2025-07-12 19:51:59', '2025-07-12 19:51:59', NULL),
(61, 22, 2, 1, 19333, 23336, 23336, 933.44, 4, 22402.56, '2025-07-12 19:51:59', '2025-07-12 19:51:59', NULL),
(62, 23, 5, 5, 20701, 26535, 132675, 3980.25, 3, 128694.75, '2025-06-27 19:51:59', '2025-06-27 19:51:59', NULL),
(63, 23, 2, 8, 15538, 27879, 223032, 17842.56, 8, 205189.44, '2025-06-27 19:51:59', '2025-06-27 19:51:59', NULL),
(64, 24, 5, 9, 23137, 33584, 302256, 9067.68, 3, 293188.32, '2025-07-20 19:51:59', '2025-07-20 19:51:59', NULL),
(65, 24, 4, 1, 19144, 28778, 28778, 0, 0, 28778, '2025-07-20 19:51:59', '2025-07-20 19:51:59', NULL),
(66, 25, 5, 3, 23293, 22567, 67701, 5416.08, 8, 62284.92, '2025-07-02 19:51:59', '2025-07-02 19:51:59', NULL),
(67, 25, 2, 4, 21232, 25972, 103888, 2077.76, 2, 101810.24, '2025-07-02 19:51:59', '2025-07-02 19:51:59', NULL),
(68, 25, 1, 8, 18580, 34921, 279368, 11174.72, 4, 268193.28, '2025-07-02 19:51:59', '2025-07-02 19:51:59', NULL),
(69, 26, 6, 6, 19899, 34267, 205602, 4112.04, 2, 201489.96, '2025-06-24 19:51:59', '2025-06-24 19:51:59', NULL),
(70, 26, 2, 3, 19323, 26076, 78228, 2346.84, 3, 75881.16, '2025-06-24 19:51:59', '2025-06-24 19:51:59', NULL),
(71, 26, 4, 10, 15675, 29950, 299500, 0, 0, 299500, '2025-06-24 19:51:59', '2025-06-24 19:51:59', NULL),
(72, 26, 3, 7, 15952, 27586, 193102, 7724.08, 4, 185377.92, '2025-06-24 19:51:59', '2025-06-24 19:51:59', NULL),
(73, 27, 5, 6, 22763, 33603, 201618, 12097.08, 6, 189520.92, '2025-07-06 19:51:59', '2025-07-06 19:51:59', NULL),
(74, 27, 2, 6, 21270, 26437, 158622, 15862.2, 10, 142759.8, '2025-07-06 19:51:59', '2025-07-06 19:51:59', NULL),
(75, 28, 4, 8, 24973, 20895, 167160, 15044.4, 9, 152115.6, '2025-06-24 19:51:59', '2025-06-24 19:51:59', NULL),
(76, 28, 6, 2, 22567, 32504, 65008, 1950.24, 3, 63057.76, '2025-06-24 19:51:59', '2025-06-24 19:51:59', NULL),
(77, 28, 6, 7, 24213, 30078, 210546, 2105.46, 1, 208440.54, '2025-06-24 19:51:59', '2025-06-24 19:51:59', NULL),
(78, 28, 2, 4, 23562, 33323, 133292, 13329.2, 10, 119962.8, '2025-06-24 19:51:59', '2025-06-24 19:51:59', NULL),
(79, 28, 6, 8, 16469, 33920, 271360, 24422.4, 9, 246937.6, '2025-06-24 19:51:59', '2025-06-24 19:51:59', NULL),
(80, 29, 4, 2, 17224, 32155, 64310, 0, 0, 64310, '2025-07-03 19:51:59', '2025-07-03 19:51:59', NULL),
(81, 29, 2, 6, 20587, 23164, 138984, 4169.52, 3, 134814.48, '2025-07-03 19:51:59', '2025-07-03 19:51:59', NULL),
(82, 29, 2, 5, 21789, 34071, 170355, 0, 0, 170355, '2025-07-03 19:51:59', '2025-07-03 19:51:59', NULL),
(83, 30, 3, 2, 22680, 31172, 62344, 623.44, 1, 61720.56, '2025-06-27 19:51:59', '2025-06-27 19:51:59', NULL),
(84, 30, 3, 3, 24898, 27902, 83706, 837.06, 1, 82868.94, '2025-06-27 19:51:59', '2025-06-27 19:51:59', NULL),
(85, 31, 1, 1, 23512, 27051, 27051, 541.02, 2, 26509.98, '2025-06-30 19:51:59', '2025-06-30 19:51:59', NULL),
(86, 31, 1, 6, 16001, 23624, 141744, 0, 0, 141744, '2025-06-30 19:51:59', '2025-06-30 19:51:59', NULL),
(87, 32, 1, 9, 22306, 30693, 276237, 24861.33, 9, 251375.67, '2025-06-28 19:51:59', '2025-06-28 19:51:59', NULL),
(88, 32, 4, 7, 19589, 26527, 185689, 14855.12, 8, 170833.88, '2025-06-28 19:51:59', '2025-06-28 19:51:59', NULL),
(89, 32, 2, 6, 22386, 34541, 207246, 4144.92, 2, 203101.08, '2025-06-28 19:51:59', '2025-06-28 19:51:59', NULL),
(90, 32, 4, 2, 19681, 23304, 46608, 0, 0, 46608, '2025-06-28 19:51:59', '2025-06-28 19:51:59', NULL),
(91, 33, 3, 5, 20577, 34107, 170535, 6821.4, 4, 163713.6, '2025-06-23 19:51:59', '2025-06-23 19:51:59', NULL),
(92, 33, 3, 10, 19819, 34357, 343570, 30921.3, 9, 312648.7, '2025-06-23 19:51:59', '2025-06-23 19:51:59', NULL),
(93, 33, 5, 4, 24847, 32971, 131884, 2637.68, 2, 129246.32, '2025-06-23 19:51:59', '2025-06-23 19:51:59', NULL),
(94, 34, 4, 1, 19353, 23190, 23190, 2319, 10, 20871, '2025-07-17 19:51:59', '2025-07-17 19:51:59', NULL),
(95, 35, 5, 7, 15842, 23015, 161105, 4833.15, 3, 156271.85, '2025-07-02 19:51:59', '2025-07-02 19:51:59', NULL),
(96, 35, 2, 7, 18181, 27520, 192640, 0, 0, 192640, '2025-07-02 19:51:59', '2025-07-02 19:51:59', NULL),
(97, 35, 6, 2, 20410, 21770, 43540, 0, 0, 43540, '2025-07-02 19:51:59', '2025-07-02 19:51:59', NULL),
(98, 35, 1, 10, 20883, 23210, 232100, 13926, 6, 218174, '2025-07-02 19:51:59', '2025-07-02 19:51:59', NULL),
(99, 35, 6, 2, 18445, 30363, 60726, 2429.04, 4, 58296.96, '2025-07-02 19:51:59', '2025-07-02 19:51:59', NULL),
(100, 36, 4, 7, 21089, 23737, 166159, 1661.59, 1, 164497.41, '2025-07-12 19:51:59', '2025-07-12 19:51:59', NULL),
(101, 36, 2, 7, 23803, 32541, 227787, 18222.96, 8, 209564.04, '2025-07-12 19:51:59', '2025-07-12 19:51:59', NULL),
(102, 36, 4, 4, 19455, 20639, 82556, 4953.36, 6, 77602.64, '2025-07-12 19:51:59', '2025-07-12 19:51:59', NULL),
(103, 36, 3, 7, 20262, 26380, 184660, 12926.2, 7, 171733.8, '2025-07-12 19:51:59', '2025-07-12 19:51:59', NULL),
(104, 36, 1, 10, 18454, 33662, 336620, 30295.8, 9, 306324.2, '2025-07-12 19:51:59', '2025-07-12 19:51:59', NULL),
(105, 37, 5, 7, 22640, 29491, 206437, 18579.33, 9, 187857.67, '2025-07-18 19:51:59', '2025-07-18 19:51:59', NULL),
(106, 38, 4, 6, 22992, 20147, 120882, 4835.28, 4, 116046.72, '2025-07-11 19:51:59', '2025-07-11 19:51:59', NULL),
(107, 38, 4, 4, 24827, 34315, 137260, 12353.4, 9, 124906.6, '2025-07-11 19:51:59', '2025-07-11 19:51:59', NULL),
(108, 38, 1, 6, 23610, 34228, 205368, 10268.4, 5, 195099.6, '2025-07-11 19:51:59', '2025-07-11 19:51:59', NULL),
(109, 38, 2, 9, 24124, 20897, 188073, 3761.46, 2, 184311.54, '2025-07-11 19:51:59', '2025-07-11 19:51:59', NULL),
(110, 38, 6, 5, 16327, 29251, 146255, 1462.55, 1, 144792.45, '2025-07-11 19:51:59', '2025-07-11 19:51:59', NULL),
(111, 39, 1, 7, 23276, 21707, 151949, 6077.96, 4, 145871.04, '2025-07-02 19:51:59', '2025-07-02 19:51:59', NULL),
(112, 39, 4, 3, 19350, 29301, 87903, 2637.09, 3, 85265.91, '2025-07-02 19:51:59', '2025-07-02 19:51:59', NULL),
(113, 40, 4, 7, 18748, 21760, 152320, 7616, 5, 144704, '2025-06-29 19:51:59', '2025-06-29 19:51:59', NULL),
(114, 40, 3, 1, 17490, 23854, 23854, 238.54, 1, 23615.46, '2025-06-29 19:51:59', '2025-06-29 19:51:59', NULL),
(115, 41, 6, 3, 19004, 29558, 88674, 8867.4, 10, 79806.6, '2025-07-18 19:51:59', '2025-07-18 19:51:59', NULL),
(116, 41, 2, 10, 18469, 31079, 310790, 31079, 10, 279711, '2025-07-18 19:51:59', '2025-07-18 19:51:59', NULL),
(117, 42, 4, 1, 22964, 20124, 20124, 603.72, 3, 19520.28, '2025-07-11 19:51:59', '2025-07-11 19:51:59', NULL),
(118, 42, 2, 7, 23622, 22399, 156793, 9407.58, 6, 147385.42, '2025-07-11 19:51:59', '2025-07-11 19:51:59', NULL),
(119, 42, 3, 3, 21245, 34955, 104865, 1048.65, 1, 103816.35, '2025-07-11 19:51:59', '2025-07-11 19:51:59', NULL),
(120, 42, 6, 9, 15673, 28963, 260667, 18246.69, 7, 242420.31, '2025-07-11 19:51:59', '2025-07-11 19:51:59', NULL),
(121, 42, 4, 9, 20405, 22683, 204147, 14290.29, 7, 189856.71, '2025-07-11 19:51:59', '2025-07-11 19:51:59', NULL),
(122, 43, 3, 8, 22981, 27297, 218376, 15286.32, 7, 203089.68, '2025-07-05 19:51:59', '2025-07-05 19:51:59', NULL),
(123, 43, 3, 7, 15755, 23760, 166320, 8316, 5, 158004, '2025-07-05 19:51:59', '2025-07-05 19:51:59', NULL),
(124, 44, 6, 8, 16399, 28659, 229272, 11463.6, 5, 217808.4, '2025-06-28 19:52:00', '2025-06-28 19:52:00', NULL),
(125, 44, 5, 8, 18421, 31466, 251728, 0, 0, 251728, '2025-06-28 19:52:00', '2025-06-28 19:52:00', NULL),
(126, 44, 6, 3, 15080, 32438, 97314, 3892.56, 4, 93421.44, '2025-06-28 19:52:00', '2025-06-28 19:52:00', NULL),
(127, 44, 1, 6, 20644, 34986, 209916, 14694.12, 7, 195221.88, '2025-06-28 19:52:00', '2025-06-28 19:52:00', NULL),
(128, 44, 4, 3, 16615, 22269, 66807, 1336.14, 2, 65470.86, '2025-06-28 19:52:00', '2025-06-28 19:52:00', NULL),
(129, 45, 6, 7, 17833, 24162, 169134, 0, 0, 169134, '2025-07-11 19:52:00', '2025-07-11 19:52:00', NULL),
(130, 45, 1, 6, 24483, 20556, 123336, 11100.24, 9, 112235.76, '2025-07-11 19:52:00', '2025-07-11 19:52:00', NULL),
(131, 45, 2, 9, 23330, 23341, 210069, 16805.52, 8, 193263.48, '2025-07-11 19:52:00', '2025-07-11 19:52:00', NULL),
(132, 45, 2, 8, 16554, 33090, 264720, 21177.6, 8, 243542.4, '2025-07-11 19:52:00', '2025-07-11 19:52:00', NULL),
(133, 46, 5, 8, 18690, 26157, 209256, 6277.68, 3, 202978.32, '2025-06-30 19:52:00', '2025-06-30 19:52:00', NULL),
(134, 46, 4, 1, 18066, 27699, 27699, 1384.95, 5, 26314.05, '2025-06-30 19:52:00', '2025-06-30 19:52:00', NULL),
(135, 46, 2, 4, 18790, 29907, 119628, 10766.52, 9, 108861.48, '2025-06-30 19:52:00', '2025-06-30 19:52:00', NULL),
(136, 46, 4, 9, 23822, 34456, 310104, 27909.36, 9, 282194.64, '2025-06-30 19:52:00', '2025-06-30 19:52:00', NULL),
(137, 46, 3, 3, 15514, 30972, 92916, 4645.8, 5, 88270.2, '2025-06-30 19:52:00', '2025-06-30 19:52:00', NULL),
(138, 47, 1, 7, 18654, 22265, 155855, 15585.5, 10, 140269.5, '2025-07-06 19:52:00', '2025-07-06 19:52:00', NULL),
(139, 47, 2, 4, 18391, 27768, 111072, 2221.44, 2, 108850.56, '2025-07-06 19:52:00', '2025-07-06 19:52:00', NULL),
(140, 48, 2, 7, 16038, 27077, 189539, 11372.34, 6, 178166.66, '2025-07-09 19:52:00', '2025-07-09 19:52:00', NULL),
(141, 49, 2, 4, 16359, 32051, 128204, 8974.28, 7, 119229.72, '2025-06-27 19:52:00', '2025-06-27 19:52:00', NULL),
(142, 50, 3, 7, 23118, 24397, 170779, 15370.11, 9, 155408.89, '2025-07-02 19:52:00', '2025-07-02 19:52:00', NULL),
(143, 50, 3, 6, 16492, 28417, 170502, 17050.2, 10, 153451.8, '2025-07-02 19:52:00', '2025-07-02 19:52:00', NULL),
(144, 50, 3, 6, 24685, 21194, 127164, 1271.64, 1, 125892.36, '2025-07-02 19:52:00', '2025-07-02 19:52:00', NULL),
(145, 50, 2, 3, 23375, 27136, 81408, 5698.56, 7, 75709.44, '2025-07-02 19:52:00', '2025-07-02 19:52:00', NULL),
(146, 50, 5, 3, 15441, 32565, 97695, 4884.75, 5, 92810.25, '2025-07-02 19:52:00', '2025-07-02 19:52:00', NULL),
(147, 51, 2, 10, 21604, 30671, 306710, 27603.9, 9, 279106.1, '2025-07-16 19:52:00', '2025-07-16 19:52:00', NULL),
(148, 51, 6, 6, 18539, 20735, 124410, 3732.3, 3, 120677.7, '2025-07-16 19:52:00', '2025-07-16 19:52:00', NULL),
(149, 51, 6, 3, 15518, 31870, 95610, 3824.4, 4, 91785.6, '2025-07-16 19:52:00', '2025-07-16 19:52:00', NULL),
(150, 51, 3, 1, 16857, 34522, 34522, 1380.88, 4, 33141.12, '2025-07-16 19:52:00', '2025-07-16 19:52:00', NULL),
(151, 52, 2, 10, 16879, 34330, 343300, 6866, 2, 336434, '2025-07-04 19:52:00', '2025-07-04 19:52:00', NULL),
(152, 52, 1, 2, 20391, 22845, 45690, 1827.6, 4, 43862.4, '2025-07-04 19:52:00', '2025-07-04 19:52:00', NULL),
(153, 52, 2, 5, 22210, 30183, 150915, 10564.05, 7, 140350.95, '2025-07-04 19:52:00', '2025-07-04 19:52:00', NULL),
(154, 52, 4, 8, 19977, 21450, 171600, 17160, 10, 154440, '2025-07-04 19:52:00', '2025-07-04 19:52:00', NULL),
(155, 52, 5, 9, 18402, 25264, 227376, 11368.8, 5, 216007.2, '2025-07-04 19:52:00', '2025-07-04 19:52:00', NULL),
(156, 53, 4, 6, 21930, 21819, 130914, 7854.84, 6, 123059.16, '2025-07-15 19:52:00', '2025-07-15 19:52:00', NULL),
(157, 53, 1, 10, 18178, 26301, 263010, 10520.4, 4, 252489.6, '2025-07-15 19:52:00', '2025-07-15 19:52:00', NULL),
(158, 53, 1, 4, 22135, 30572, 122288, 3668.64, 3, 118619.36, '2025-07-15 19:52:00', '2025-07-15 19:52:00', NULL),
(159, 53, 6, 3, 22567, 27746, 83238, 4994.28, 6, 78243.72, '2025-07-15 19:52:00', '2025-07-15 19:52:00', NULL),
(160, 54, 4, 4, 23468, 27790, 111160, 8892.8, 8, 102267.2, '2025-07-12 19:52:00', '2025-07-12 19:52:00', NULL),
(161, 54, 2, 10, 19409, 26499, 264990, 13249.5, 5, 251740.5, '2025-07-12 19:52:00', '2025-07-12 19:52:00', NULL),
(162, 55, 5, 10, 19621, 31141, 311410, 21798.7, 7, 289611.3, '2025-06-20 19:52:00', '2025-06-20 19:52:00', NULL),
(163, 55, 5, 1, 18220, 24562, 24562, 491.24, 2, 24070.76, '2025-06-20 19:52:00', '2025-06-20 19:52:00', NULL),
(164, 55, 6, 3, 24314, 28218, 84654, 5079.24, 6, 79574.76, '2025-06-20 19:52:00', '2025-06-20 19:52:00', NULL),
(165, 55, 1, 5, 15065, 30178, 150890, 10562.3, 7, 140327.7, '2025-06-20 19:52:00', '2025-06-20 19:52:00', NULL),
(166, 55, 5, 5, 21689, 21296, 106480, 7453.6, 7, 99026.4, '2025-06-20 19:52:00', '2025-06-20 19:52:00', NULL),
(167, 56, 2, 4, 16552, 23508, 94032, 9403.2, 10, 84628.8, '2025-07-14 19:52:00', '2025-07-14 19:52:00', NULL),
(168, 56, 3, 4, 18227, 25280, 101120, 0, 0, 101120, '2025-07-14 19:52:00', '2025-07-14 19:52:00', NULL),
(169, 57, 3, 4, 18348, 31960, 127840, 8948.8, 7, 118891.2, '2025-06-21 19:52:00', '2025-06-21 19:52:00', NULL),
(170, 57, 6, 10, 24900, 30444, 304440, 9133.2, 3, 295306.8, '2025-06-21 19:52:00', '2025-06-21 19:52:00', NULL),
(171, 57, 2, 7, 16357, 21569, 150983, 6039.32, 4, 144943.68, '2025-06-21 19:52:00', '2025-06-21 19:52:00', NULL),
(172, 57, 3, 1, 17197, 21339, 21339, 853.56, 4, 20485.44, '2025-06-21 19:52:00', '2025-06-21 19:52:00', NULL),
(173, 58, 4, 4, 22158, 30591, 122364, 9789.12, 8, 112574.88, '2025-07-05 19:52:00', '2025-07-05 19:52:00', NULL),
(174, 59, 4, 3, 19069, 24505, 73515, 0, 0, 73515, '2025-07-07 19:52:00', '2025-07-07 19:52:00', NULL),
(175, 59, 1, 7, 15275, 24692, 172844, 12099.08, 7, 160744.92, '2025-07-07 19:52:00', '2025-07-07 19:52:00', NULL),
(176, 59, 5, 7, 22248, 32095, 224665, 20219.85, 9, 204445.15, '2025-07-07 19:52:00', '2025-07-07 19:52:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_sales_users`
--

CREATE TABLE `transaction_sales_users` (
  `transaction_sales_user_id` bigint UNSIGNED NOT NULL,
  `transaction_sales_id` int NOT NULL,
  `user_id` int NOT NULL,
  `item_id` int NOT NULL,
  `qty` int DEFAULT NULL,
  `revenue` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_stocks`
--

CREATE TABLE `transaction_stocks` (
  `transaction_stocks_id` bigint UNSIGNED NOT NULL,
  `transaction_purchase_detail_id` int DEFAULT NULL,
  `transaction_sales_detail_id` int DEFAULT NULL,
  `item_id` int DEFAULT NULL,
  `inventory_origin_id` int DEFAULT NULL,
  `inventory_destination_id` int DEFAULT NULL,
  `stock_incoming` int DEFAULT NULL,
  `stock_outgoing` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
-- Indeks untuk tabel `master_customers_types`
--
ALTER TABLE `master_customers_types`
  ADD PRIMARY KEY (`customer_type_id`);

--
-- Indeks untuk tabel `master_inventories`
--
ALTER TABLE `master_inventories`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indeks untuk tabel `master_items`
--
ALTER TABLE `master_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indeks untuk tabel `master_items_branches`
--
ALTER TABLE `master_items_branches`
  ADD PRIMARY KEY (`item_branch_id`);

--
-- Indeks untuk tabel `master_items_details`
--
ALTER TABLE `master_items_details`
  ADD PRIMARY KEY (`item_detail_id`);

--
-- Indeks untuk tabel `master_menus`
--
ALTER TABLE `master_menus`
  ADD PRIMARY KEY (`menu_id`);

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
-- Indeks untuk tabel `master_suppliers`
--
ALTER TABLE `master_suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indeks untuk tabel `master_users`
--
ALTER TABLE `master_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `master_users_email_unique` (`email`);

--
-- Indeks untuk tabel `master_users_access`
--
ALTER TABLE `master_users_access`
  ADD PRIMARY KEY (`access_id`);

--
-- Indeks untuk tabel `master_users_branches`
--
ALTER TABLE `master_users_branches`
  ADD PRIMARY KEY (`user_branch_id`);

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
-- Indeks untuk tabel `transaction_payments`
--
ALTER TABLE `transaction_payments`
  ADD PRIMARY KEY (`transaction_payment_id`);

--
-- Indeks untuk tabel `transaction_purchases`
--
ALTER TABLE `transaction_purchases`
  ADD PRIMARY KEY (`transaction_purchase_id`);

--
-- Indeks untuk tabel `transaction_purchases_details`
--
ALTER TABLE `transaction_purchases_details`
  ADD PRIMARY KEY (`transaction_purchase_detail_id`);

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
-- Indeks untuk tabel `transaction_sales_users`
--
ALTER TABLE `transaction_sales_users`
  ADD PRIMARY KEY (`transaction_sales_user_id`);

--
-- Indeks untuk tabel `transaction_stocks`
--
ALTER TABLE `transaction_stocks`
  ADD PRIMARY KEY (`transaction_stocks_id`);

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
  MODIFY `branch_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `customer_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `master_customers_types`
--
ALTER TABLE `master_customers_types`
  MODIFY `customer_type_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `master_inventories`
--
ALTER TABLE `master_inventories`
  MODIFY `inventory_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `master_items`
--
ALTER TABLE `master_items`
  MODIFY `item_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `master_items_branches`
--
ALTER TABLE `master_items_branches`
  MODIFY `item_branch_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `master_items_details`
--
ALTER TABLE `master_items_details`
  MODIFY `item_detail_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `master_menus`
--
ALTER TABLE `master_menus`
  MODIFY `menu_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_payment_methods`
--
ALTER TABLE `master_payment_methods`
  MODIFY `payment_method_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `master_sales_types`
--
ALTER TABLE `master_sales_types`
  MODIFY `sales_type_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `master_suppliers`
--
ALTER TABLE `master_suppliers`
  MODIFY `supplier_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `master_users`
--
ALTER TABLE `master_users`
  MODIFY `user_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `master_users_access`
--
ALTER TABLE `master_users_access`
  MODIFY `access_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_users_branches`
--
ALTER TABLE `master_users_branches`
  MODIFY `user_branch_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaction_payments`
--
ALTER TABLE `transaction_payments`
  MODIFY `transaction_payment_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaction_purchases`
--
ALTER TABLE `transaction_purchases`
  MODIFY `transaction_purchase_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaction_purchases_details`
--
ALTER TABLE `transaction_purchases_details`
  MODIFY `transaction_purchase_detail_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaction_sales`
--
ALTER TABLE `transaction_sales`
  MODIFY `transaction_sales_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `transaction_sales_details`
--
ALTER TABLE `transaction_sales_details`
  MODIFY `transaction_sales_detail_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT untuk tabel `transaction_sales_users`
--
ALTER TABLE `transaction_sales_users`
  MODIFY `transaction_sales_user_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaction_stocks`
--
ALTER TABLE `transaction_stocks`
  MODIFY `transaction_stocks_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
