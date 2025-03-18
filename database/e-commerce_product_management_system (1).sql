-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2025 at 07:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce_product_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, '4', '2', '2025-03-17 23:09:36', '2025-03-17 23:09:36'),
(5, '3', '2', '2025-03-18 00:30:22', '2025-03-18 00:30:22'),
(6, '3', '2', '2025-03-18 00:35:47', '2025-03-18 00:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Shoes', 'Shoes Description', '1', '2025-03-17 07:18:26', '2025-03-17 07:18:26'),
(3, 'Watch', 'Watch Description', '1', '2025-03-17 07:35:15', '2025-03-17 11:11:54'),
(4, 'Men Shirt', 'Men Shirt Description', '1', '2025-03-17 07:37:31', '2025-03-17 07:37:31'),
(5, 'Women T-shirt', 'Women T-shirts Description', '1', '2025-03-17 07:38:04', '2025-03-17 08:43:56'),
(6, 'Laptop', 'Laptop Description', '1', '2025-03-17 07:38:48', '2025-03-17 07:38:48'),
(7, 'Computer', 'Computer Description', '1', '2025-03-17 07:42:00', '2025-03-17 07:42:00'),
(8, 'Mens Jeans', 'Mens Jeans Description', '0', '2025-03-17 07:42:56', '2025-03-17 07:42:56'),
(9, 'Women Jeans', 'Women Jeans Description', '1', '2025-03-17 07:43:26', '2025-03-17 07:43:26'),
(10, 'Sandals', 'Sandals Description', '1', '2025-03-17 07:43:56', '2025-03-17 07:43:56'),
(11, 'Mobile', 'Mobile Description', '1', '2025-03-17 07:44:33', '2025-03-17 07:44:33'),
(12, 'Smart Watch', 'Smart Watch Description', '1', '2025-03-17 07:45:53', '2025-03-17 07:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkouts`
--

INSERT INTO `checkouts` (`id`, `first_name`, `last_name`, `email`, `address`, `city`, `postcode`, `total_price`, `created_at`, `updated_at`) VALUES
(5, 'Shri', 'Krishn', 'user@demo.com', 'Mathura', 'Uttar Pradesh', '111111', 90000.00, '2025-03-18 00:21:41', '2025-03-18 00:21:41'),
(6, 'Shri', 'Krishn', 'user@demo.com', 'Mathura', 'Uttar Pradesh', '111111', 195000.00, '2025-03-18 00:30:49', '2025-03-18 00:30:49'),
(7, 'Shri', 'Krishn', 'user@demo.com', 'Mathura', 'Uttar Pradesh', '111111', 195000.00, '2025-03-18 00:33:50', '2025-03-18 00:33:50'),
(8, 'Shri', 'Krishn', 'user@demo.com', 'Mathura', 'Uttar Pradesh', '111111', 195000.00, '2025-03-18 00:35:37', '2025-03-18 00:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `checkout_products`
--

CREATE TABLE `checkout_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `checkout_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkout_products`
--

INSERT INTO `checkout_products` (`id`, `checkout_id`, `product_name`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 5, 'Lenovo', 2, 90000.00, '2025-03-18 00:21:41', '2025-03-18 00:21:41'),
(2, 6, 'Lenovo', 1, 45000.00, '2025-03-18 00:30:49', '2025-03-18 00:30:49'),
(3, 6, 'Iphone X', 1, 150000.00, '2025-03-18 00:30:49', '2025-03-18 00:30:49'),
(4, 8, 'Lenovo', 1, 45000.00, '2025-03-18 00:35:37', '2025-03-18 00:35:37'),
(5, 8, 'Iphone X', 1, 150000.00, '2025-03-18 00:35:37', '2025-03-18 00:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(21, '2025_03_17_105200_create_categories_table', 2),
(22, '2025_03_17_143303_create_products_table', 3),
(23, '2025_03_18_035011_create_carts_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` longtext DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `quantity`, `category_id`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Bata', '1000', '50', '10', 'Bata Description', 'products/1742224901_bata-sandals.jpeg', '1', '2025-03-17 09:51:41', '2025-03-17 09:51:41'),
(3, 'Iphone X', '150000', '15', '11', 'Iphone X Description', 'products/1742225651_mobile-phones.png', '1', '2025-03-17 10:04:11', '2025-03-17 11:11:33'),
(4, 'Lenovo', '45000', '10', '6', 'Lenovo description', 'products/1742225793_laptop.png', '1', '2025-03-17 10:06:33', '2025-03-17 10:06:33'),
(5, 'Womens Jeans', '20000', '100', '9', 'Womens Jeans Description', 'products/1742229408_women-jeans.jpg', '1', '2025-03-17 10:18:35', '2025-03-17 11:06:48'),
(6, 'Zara', '1000', '50', '9', 'Women Jeans Description', 'products/1742226649_women-jeans.jpg', '1', '2025-03-17 10:20:49', '2025-03-17 10:20:49'),
(7, 'Iphone Smart Watch', '5000', '100', '12', 'Iphone Smart Watch Description', 'products/1742226829_smart-watch.jpeg', '1', '2025-03-17 10:23:49', '2025-03-17 10:23:49'),
(9, 'Puma Kids Shoes', '500', '100', '2', 'Puma Kids Shoes Description', 'products/1742227101_kids shoes.jpg', '1', '2025-03-17 10:28:21', '2025-03-17 10:28:21'),
(10, 'Tommy Hilfiger Shirt', '999.9', '100', '4', 'Tommy Hilfiger Shirt Description', 'products/1742227323_mens sirt.jpg', '1', '2025-03-17 10:32:03', '2025-03-17 10:32:03'),
(11, 'Acer Laptop', '50000', '20', '6', 'Acer Laptop Description', 'products/1742227403_laptop.png', '1', '2025-03-17 10:33:23', '2025-03-17 10:33:23'),
(12, 'Iphone XII', '120000', '20', '11', 'Iphone XII Description', 'products/1742227873_mobile.jpg', '1', '2025-03-17 10:41:13', '2025-03-17 10:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$n.xx23Z4Kst0VnMJvs.uYeckLy9HqzoWOTqNXXrQqnO7jlVHo7Vi6', '1', NULL, '2025-03-17 05:26:48', '2025-03-17 05:26:48'),
(2, 'user', 'user@demo.com', NULL, '$2y$10$/BWujedCoIWS2HAUrhTlQeLMhK6Z6oS7bEkkaIgV7vqjsSk6OOV.S', '2', NULL, '2025-03-17 05:31:05', '2025-03-17 05:31:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout_products`
--
ALTER TABLE `checkout_products`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

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
  ADD UNIQUE KEY `products_product_name_unique` (`product_name`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `checkout_products`
--
ALTER TABLE `checkout_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
