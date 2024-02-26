-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2024 at 09:07 AM
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
-- Database: `webphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(255) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'shirt'),
(2, 'pants'),
(3, 'shoes'),
(4, 'accessory');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(255) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `email`, `password`, `name`) VALUES
(1, 'tram20012001@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', ''),
(6, 'tram202423@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Moc'),
(8, 'tram@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Tram');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) UNSIGNED NOT NULL,
  `customer_id` int(255) UNSIGNED DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total` decimal(10,3) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `fullname` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `phone`, `email`, `address`, `total`, `created_at`, `fullname`, `note`, `method`) VALUES
(30, NULL, '0953962553', 'tram20012001@gmail.com', 'Linh Trung, Thu Duc, a, a, a', 2491.000, '2024-02-21', 'Le Tram', 'a', 'cod'),
(31, NULL, 'A', 'tram20012001@gmail.com', 'A, A, A, A', 735.000, '2024-02-21', 'A', 'A', 'cod'),
(32, NULL, '0953962553', 'tram20012001@gmail.com', 'Linh Trung, Thu Duc, ádasd, ádasd, đâs', 1275.000, '2024-02-21', 'Le Tram', 'ádasd', 'cod'),
(33, NULL, '0953962553', 'tram20012001@gmail.com', 'Linh Trung, Thu Duc, d, asdasd, d', 1275.000, '2024-02-22', 'Le Tram', 'ádas', 'cod'),
(34, NULL, '0953962553', '123@gmail.com', 'Linh Trung, Thu Duc, asdsad, asdsad, sadsad', 863.000, '2024-02-22', 'Hoa', 'asdasdas', 'cod'),
(35, NULL, '0953962553', 'tram20012001@gmail.com', 'Linh Trung, Thu Duc, ádsad, sadsad, đâs', 1845.000, '2024-02-23', 'Le Tram', 'ádasds', 'cod'),
(36, NULL, '0953962553', 'tram20012001@gmail.com', 'Linh Trung, Thu Duc, , , ', 735.000, '2024-02-23', 'Le Tram', '', ''),
(37, NULL, '0953962553', 'tram20012001@gmail.com', 'Linh Trung, Thu Duc, , , ', 1275.000, '2024-02-23', 'Le Tram', '', ''),
(38, NULL, '0953962553', 'tram20012001@gmail.com', 'Linh Trung, Thu Duc, ádasd, ádasds, adasdas', 1275.000, '2024-02-23', 'Le Tram', 'ádasd', 'cod'),
(39, NULL, '', '', ', , , ', 245.000, '2024-02-23', '', '', ''),
(40, NULL, '', '', ', , , ', 785.000, '2024-02-23', '', '', ''),
(41, NULL, '0953962553', 'tram20012001@gmail.com', 'Linh Trung, Thu Duc, sdfsd, sdfsdf, sdfsdf', 1255.000, '2024-02-23', 'Le Tram', 'sfsdfsdf', ''),
(42, NULL, '0953962553', 'tram20012001@gmail.com', 'Linh Trung, Thu Duc, a, a, a', 785.000, '2024-02-23', 'Le Tram', 'a', ''),
(43, NULL, '0953962553', 'tram20012001@gmail.com', 'Linh Trung, Thu Duc, c, c, c', 980.000, '2024-02-23', 'Le Tram', 'c', 'cod'),
(44, NULL, '0953962553', 'tram20012001@gmail.com', 'Linh Trung, Thu Duc, d, d, d', 980.000, '2024-02-23', 'Le Tram', 'd', 'cod'),
(45, NULL, '0953962553', 'tram20012001@gmail.com', 'Linh Trung, Thu Duc, a, a, a', 1521.000, '2024-02-23', 'Le Tram', 'a', 'cod'),
(46, NULL, '0953962553', 'tram20012001@gmail.com', 'Linh Trung, Thu Duc, d, d, d', 735.000, '2024-02-23', 'Le Tram', 'd', 'cod'),
(47, NULL, '0953962553', 'tram20012001@gmail.com', 'Linh Trung, Thu Duc, a, a, a', 1030.000, '2024-02-23', 'Le Tram', 'a', 'cod'),
(48, NULL, '0953962553', 'tram20012001@gmail.com', 'Linh Trung, Thu Duc, d, asdasd, d', 1275.000, '2024-02-23', 'Le Tram', 'aaas', 'cod');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(255) UNSIGNED NOT NULL,
  `product_id` int(255) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(10,3) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`, `created_at`) VALUES
(4, 30, 31, 2, 441.000, '2024-02-21'),
(5, 30, 32, 2, 422.000, '2024-02-21'),
(6, 30, 38, 1, 245.000, '2024-02-21'),
(7, 30, 30, 1, 520.000, '2024-02-21'),
(8, 31, 38, 3, 245.000, '2024-02-21'),
(9, 32, 38, 1, 245.000, '2024-02-21'),
(10, 32, 37, 1, 490.000, '2024-02-21'),
(11, 32, 39, 1, 540.000, '2024-02-21'),
(12, 33, 38, 1, 245.000, '2024-02-22'),
(13, 33, 37, 1, 490.000, '2024-02-22'),
(14, 33, 39, 1, 540.000, '2024-02-22'),
(15, 34, 32, 1, 422.000, '2024-02-22'),
(16, 34, 31, 1, 441.000, '2024-02-22'),
(17, 35, 38, 1, 245.000, '2024-02-23'),
(18, 35, 37, 1, 490.000, '2024-02-23'),
(19, 35, 39, 1, 540.000, '2024-02-23'),
(20, 35, 30, 1, 520.000, '2024-02-23'),
(21, 35, 29, 1, 50.000, '2024-02-23'),
(22, 36, 38, 1, 245.000, '2024-02-23'),
(23, 36, 37, 1, 490.000, '2024-02-23'),
(24, 37, 39, 1, 540.000, '2024-02-23'),
(25, 37, 38, 1, 245.000, '2024-02-23'),
(26, 37, 37, 1, 490.000, '2024-02-23'),
(27, 38, 37, 1, 490.000, '2024-02-23'),
(28, 38, 38, 1, 245.000, '2024-02-23'),
(29, 38, 39, 1, 540.000, '2024-02-23'),
(30, 39, 38, 1, 245.000, '2024-02-23'),
(31, 40, 38, 1, 245.000, '2024-02-23'),
(32, 40, 39, 1, 540.000, '2024-02-23'),
(33, 41, 38, 1, 245.000, '2024-02-23'),
(34, 41, 37, 1, 490.000, '2024-02-23'),
(35, 41, 30, 1, 520.000, '2024-02-23'),
(36, 42, 38, 1, 245.000, '2024-02-23'),
(37, 42, 39, 1, 540.000, '2024-02-23'),
(38, 43, 38, 2, 245.000, '2024-02-23'),
(39, 43, 37, 1, 490.000, '2024-02-23'),
(40, 44, 38, 2, 245.000, '2024-02-23'),
(41, 44, 37, 1, 490.000, '2024-02-23'),
(42, 45, 38, 1, 245.000, '2024-02-23'),
(43, 45, 39, 1, 540.000, '2024-02-23'),
(44, 45, 42, 1, 736.000, '2024-02-23'),
(45, 46, 37, 1, 490.000, '2024-02-23'),
(46, 46, 38, 1, 245.000, '2024-02-23'),
(47, 47, 38, 2, 245.000, '2024-02-23'),
(48, 47, 39, 1, 540.000, '2024-02-23'),
(49, 48, 38, 1, 245.000, '2024-02-23'),
(50, 48, 39, 1, 540.000, '2024-02-23'),
(51, 48, 37, 1, 490.000, '2024-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` longtext NOT NULL,
  `price` decimal(10,3) NOT NULL,
  `category_id` int(255) UNSIGNED NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `category_id`, `created_at`, `updated_at`) VALUES
(3, 'Quần Kaki Nam Ống Rộng Premium Limited Form Wide Leg - 10F23PCA005L', 'https://routine.vn/media/amasty/webp/catalog/product/cache/d0cf4470db45e8932c69fc124d711a7e/q/u/quan-kaki-nam-29-10f23pca005l_natural_light_1__jpg.webp', 150.000, 2, '2024-01-16', '2024-01-16'),
(4, 'Quần Kaki Nam Ống Suông Xếp Ly Trơn Form Straight Crop - 10S23PCA020', 'https://routine.vn/media/amasty/webp/catalog/product/cache/d0cf4470db45e8932c69fc124d711a7e/q/u/quan-kaki-nam-12-10s23pca020-toffee-_2__1_jpg.webp', 79.000, 2, '2024-01-16', '2024-01-16'),
(5, 'Quần Short Nam Lưng Thun Trơn Ống Rộng Form Relax - 10S23PSH023', 'https://routine.vn/media/catalog/product/cache/d0cf4470db45e8932c69fc124d711a7e/1/0/10s23psh023-apple-cinnamon-_1__1.jpg', 385.000, 2, '2024-01-16', '2024-01-16'),
(6, 'Quần Short Nam Nylon Túi Sau Nhãn Trang Trí Form Relax - 10S24PSH029', 'https://routine.vn/media/amasty/webp/catalog/product/cache/d0cf4470db45e8932c69fc124d711a7e/q/u/quan-short-nam-4-10s24psh029-black-_1__1_jpg.webp', 385.000, 2, '2024-01-16', '2024-01-16'),
(7, 'Giày Tây Nam Da Trơn Form Basic - 10S23SHO008', 'https://routine.vn/media/amasty/amoptmobile/catalog/product/cache/5b5632a96492396f42c72e22fdd64763/1/0/10s23sho008-black-giay-tay_3__2_jpg.webp', 736.000, 3, '2024-01-16', '2024-01-16'),
(8, 'Giày Sneaker Canvas Trơn Basic Poin Label - 10S23SHO003', 'https://routine.vn/media/amasty/webp/catalog/product/cache/d0cf4470db45e8932c69fc124d711a7e/g/i/gia-10s23sho003_white_2__1_jpg.webp', 570.000, 3, '2024-01-16', '2024-01-16'),
(9, 'Giày Loafer Mũi Nhọn - 10S23SHOW004', 'https://routine.vn/media/amasty/webp/catalog/product/cache/d0cf4470db45e8932c69fc124d711a7e/g/i/giay-10s23show004_black_8__1_jpg.webp', 385.000, 3, '2024-01-16', '2024-01-16'),
(27, 'Vớ Dài Cotton Thêu Chữ Coffee Lovers Freesize - 10F23SOC015R1', 'https://routine.vn/media/amasty/webp/catalog/product/cache/d0cf4470db45e8932c69fc124d711a7e/v/o/vo-10f23soc015_black_2__1_1_jpg.webp', 49.000, 4, '2024-01-18', '2024-01-18'),
(28, 'Vớ Thể Thao Trơn Logo Freesize - 10S22SOC002', 'https://routine.vn/media/amasty/webp/catalog/product/cache/d0cf4470db45e8932c69fc124d711a7e/1/0/10s22soc002_bright_rose_9__1_jpg.webp', 29.000, 4, '2024-01-18', '2024-01-18'),
(29, 'Vớ Dài Dệt Hình Freesize - 10S22SOC005', 'https://routine.vn/media/amasty/webp/catalog/product/cache/d0cf4470db45e8932c69fc124d711a7e/1/0/10s22soc005-whie_2_-2_1_jpg.webp', 50.000, 4, '2024-01-18', '2024-01-18'),
(30, 'Áo Polo Nam Interlock Pique Phối Bo Và Tay Form Regular - 10S23POL037', 'https://routine.vn/media/amasty/webp/catalog/product/cache/d0cf4470db45e8932c69fc124d711a7e/1/0/10s23pol037_rain_forest-ao-polo-nam_17_1__1_jpg.webp', 520.000, 1, '2024-01-18', '2024-01-18'),
(31, 'Áo Polo Nam Tay Ngắn Phối Cổ Và Tay Form Fitted - 10S23POL058', 'https://routine.vn/media/amasty/webp/catalog/product/cache/d0cf4470db45e8932c69fc124d711a7e/1/0/10s23pol058-ponderosa-pine-_ao-polo-nam_3__1_jpg.webp', 441.000, 1, '2024-01-18', '2024-01-18'),
(32, 'Áo Polo Phối Bo Sườn. Fitted - 10S23POL024', 'https://routine.vn/media/amasty/webp/catalog/product/cache/d0cf4470db45e8932c69fc124d711a7e/a/o/ao-polo-nam-29-10s23pol024-ceylon-yellow-_2__1_jpg.webp', 422.000, 1, '2024-01-18', '2024-01-18'),
(37, 'Dây Nịt Nam Có Khóa Xoay Trơn Basic - 10F23BEL002', 'https://routine.vn/media/amasty/webp/catalog/product/cache/d0cf4470db45e8932c69fc124d711a7e/1/0/10f23bel002_black_navy_2__1_jpg.webp', 490.000, 4, '2024-01-18', '2024-01-18'),
(38, 'Nón Lưỡi Trai Flannel Kẻ Sọc Freesize - 10F23CAP002', 'https://routine.vn/media/amasty/webp/catalog/product/cache/d0cf4470db45e8932c69fc124d711a7e/n/o/non-10f23cap002_black_2__1_jpg.webp', 245.000, 1, '2024-01-18', '2024-01-18'),
(39, 'Túi Đeo Chéo Unisex Da PU Phối Dây Basic - 10F23BAGU008', 'https://routine.vn/media/amasty/webp/catalog/product/cache/d0cf4470db45e8932c69fc124d711a7e/t/u/tui-10f23bagu008_red_1__1_jpg.webp', 540.000, 4, '2024-01-18', '2024-01-18'),
(42, 'Giày Bata Da Trơn Basic - 10S23SHO010', 'https://routine.vn/media/amasty/webp/catalog/product/cache/d0cf4470db45e8932c69fc124d711a7e/g/i/giay-10s23sho010_white_6__1_jpg.webp', 736.000, 3, '2024-01-18', '2024-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer_id` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_id` (`product_id`),
  ADD KEY `fk_order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
