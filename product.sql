-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 07:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `img`, `description`, `created_at`, `updated_at`) VALUES
(21, 'Bánh kem 2', 7000000, '1656644793_block-2-346x240.jpg', 'đẹp và xịn', '2022-06-30 20:06:33', '2022-06-30 20:06:33'),
(22, 'Bánh kem 2', 7000000, '1656644800_block-2-346x240.jpg', 'đẹp và xịn', '2022-06-30 20:06:40', '2022-06-30 20:06:40'),
(23, 'bánh mì sài gòn', 11000000, '1656645198_block-2-346x240.jpg', 'ngon lắm anh em ơi', '2022-06-30 20:13:18', '2022-06-30 20:13:18'),
(24, 'bánh mì bò kho', 20000, '1656645675_bo-kho-1-1-150x150.jpg', 'ngon lắm anh em ơi', '2022-06-30 20:21:15', '2022-06-30 20:21:15'),
(25, 'bánh mì ô dề', 3000000, '1656645721_vietnamese-spicy-meatball-banh-mi_1980x1320-120038-1-150x150.jpg', 'ngon lắm anh em ơi', '2022-06-30 20:22:01', '2022-06-30 20:22:01'),
(26, 'com nieu', 3000000, '1656649621_VietnameseMeatballsXiuMaiandBanhMi-1-1-150x150.jpeg', 'ngon lắm anh em ơi', '2022-06-30 21:27:01', '2022-06-30 21:27:01'),
(27, 'com ga xa', 7000000, '1656649850_Fotolia_89940763_Subscription_Monthly_M-150x150.jpg', 'ngon lắm anh em ơi', '2022-06-30 21:30:50', '2022-06-30 21:30:50'),
(28, 'com ga xa', 7000000, '1656649870_Fotolia_89940763_Subscription_Monthly_M-150x150.jpg', 'ngon lắm anh em ơi', '2022-06-30 21:31:10', '2022-06-30 21:31:10'),
(29, 'com ga xa', 7000000, '1656649889_Fotolia_89940763_Subscription_Monthly_M-150x150.jpg', 'ngon lắm anh em ơi', '2022-06-30 21:31:29', '2022-06-30 21:31:29'),
(30, 'OMAR/RAAWII VASEE', 7000000, '1656651095_VietnameseMeatballsXiuMaiandBanhMi-1-1-150x150.jpeg', 'ngon lắm anh em ơi', '2022-06-30 21:51:35', '2022-06-30 21:51:35'),
(31, 'OMAR/RAAWII VASEE', 7000000, '1656651132_bo-kho-1-1-150x150.jpg', 'ngon lắm anh em ơi', '2022-06-30 21:52:12', '2022-06-30 21:52:12'),
(32, 'OMAR/RAAWII VASEE', 7000000, '1656651183_Fotolia_89940763_Subscription_Monthly_M-150x150.jpg', 'ngon lắm anh em ơi', '2022-06-30 21:53:03', '2022-06-30 21:53:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
