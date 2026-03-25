-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2026 at 01:42 PM
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
-- Database: `nonchalant_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` enum('Processing','Shipped','Delivered','Cancel Requested') NOT NULL DEFAULT 'Processing',
  `shipping_address` varchar(255) DEFAULT NULL,
  `payment_method` enum('Cash on Delivery','E-Wallet','Debit/Credit') NOT NULL DEFAULT 'Cash on Delivery',
  `shipping_method` enum('Standard','Express') NOT NULL DEFAULT 'Standard'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `created_at`, `updated_at`, `status`, `shipping_address`, `payment_method`, `shipping_method`) VALUES
(5005, 202111632, 999.99, '2026-03-23 18:17:59', '2026-03-25 08:33:50', 'Delivered', 'HUMUKA LOOP', 'E-Wallet', 'Standard'),
(5008, 202111613, 6460.00, '2026-03-25 01:38:06', '2026-03-25 09:41:55', 'Processing', 'Metro Manila, the one near the SM MOA... yes that one', 'Debit/Credit', 'Standard'),
(5009, 202111612, 4900.00, '2026-03-25 04:08:15', '2026-03-25 12:08:15', 'Processing', 'asdasd', 'Cash on Delivery', 'Standard');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(123, 332, 323, 2, 2999.00),
(124, 5006, 202680803, 2, 5200.00),
(125, 5006, 202580802, 1, 1260.00),
(126, 5007, 202680803, 2, 5200.00),
(127, 5007, 202580802, 1, 1260.00),
(128, 5008, 202680803, 1, 5200.00),
(129, 5008, 202580803, 1, 1260.00),
(130, 5009, 202680802, 1, 4900.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `collection` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `collection`, `price`, `stock`, `image`) VALUES
(202540401, 'RadioEvaJ', 'Nonchalant X RADIO EVA: EVA JACKET', 'MANGA26', 9200.00, 5, 'RadioEvaJ.webp'),
(202540402, 'RadioEvaJ2', 'Nonchalant X RADIO EVA: EVA JACKET RED', 'MANGA26', 9200.00, 5, 'RadioEvaJ2.webp'),
(202540403, 'RadioEvaLS', 'Nonchalant X RADIO EVA: LS EVA T-SHIRT', 'MANGA26', 2300.00, 5, 'RadioEvaLS.webp'),
(202540404, 'RadioEvaLS2', 'Nonchalant X RADIO EVA: LS EVA T-SHIRT RED', 'MANGA26', 2300.00, 5, 'RadioEvaLS2.webp'),
(202544401, 'MomoVarsityJ', 'Momo Varsity Jacket', 'COLLAB26', 7300.00, 5, 'MomoVarsityJ.webp'),
(202544402, 'OkarunJ', 'Okarun Jacket', 'COLLAB26', 4800.00, 5, 'OkarunJ.webp'),
(202544403, 'OPPanelC', 'OP Panel Crewneck', 'COLLAB26', 7300.00, 5, 'OPPanelC.webp'),
(202544404, 'SeikoVarsityJ', 'Seiko Varsity Jacket', 'COLLAB26', 5500.00, 5, 'SeikoVarsityJ.webp'),
(202544441, 'UFOS', 'UFO Button Down Shirt', 'COLLAB26', 3700.00, 12, '202544441_1774431888.webp'),
(202580801, 'WiredT', 'Nonchalant X 2026 Wired T-shirt', 'Drop25', 1260.00, 5, 'WiredT.webp'),
(202580802, 'DungeonT', 'Nonchalant X 2026 Dungeon T-shirt', 'Drop25', 1260.00, 3, 'DungeonT.webp'),
(202580803, 'SkullT', 'Nonchalant X 2026 Skull T-shirt', 'Drop25', 1260.00, 4, 'SkullT.webp'),
(202580804, 'WebT', 'Nonchalant X 2026 Web T-shirt', 'Drop25', 1260.00, 5, 'WebT.webp'),
(202680801, 'MangaUni', 'Manga University Jacket', 'Drop26', 6100.00, 5, 'MangaUni.webp'),
(202680802, 'MangaClubS', 'Manga Club Shirt', 'Drop26', 4900.00, 4, 'MangaClubS.webp'),
(202680803, 'MangaClubH', 'Manga Club Hoodie', 'Drop26', 5200.00, 5, 'MangaClubH.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `role` enum('buyer','seller') DEFAULT 'buyer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `full_name`, `address`, `mobile`, `role`, `created_at`, `updated_at`) VALUES
(202111610, 'Nonchalant.Admin@nonchlt.ph', '$2y$10$XChGqYX6RRUu6iMQ2lVleeiFdCCpgCPDIgwrQcIM1krEkn75oBsHq', 'Endminister', '', '', 'seller', '2026-03-23 17:55:34', '2026-03-25 08:10:32'),
(202111612, 'UserDev@nonchalant.ph', '$2y$10$GXZplULSZA4cvfvCYfr32OcmwYLRiNiVCnjtQEvm7D1tL/4tjQhGK', 'Customer Testing', 'Humuka Loop', '09881275923', 'buyer', '2026-03-24 22:37:08', '2026-03-25 06:37:08'),
(202111613, 'pigas52998@jsncos.com', '$2y$10$mCSpAunye8Gck2HHlz5Jz.qxtWWafZwjt88UuzkExnzK.YGsRD88O', 'Juan Dela Cruz', 'Metro Manila', '09342839923', 'buyer', '2026-03-25 01:36:37', '2026-03-25 09:36:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5010;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202111614;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
