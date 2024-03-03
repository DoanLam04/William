-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 11:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `william`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `trang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `created_at`, `trang`) VALUES
(1, 'clothes', '2023-10-14 17:22:03', 'clothes'),
(2, 'electronics', '2023-10-14 17:22:59', 'electronics'),
(3, 'Accessory', '2023-11-08 22:28:08', 'accessory'),
(4, 'inventory', '2023-10-14 17:25:40', 'inventory');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`) VALUES
(1, 79, '2023-11-09 08:44:56'),
(2, 87, '2023-11-09 10:28:29'),
(3, 84, '2023-11-11 19:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `quantity`, `price`, `total_price`) VALUES
(1, 2, 1, 50, 50),
(1, 4, 1, 70, 70),
(1, 8, 1, 315, 315),
(1, 30, 1, 140, 140),
(2, 1, 2, 20, 40),
(2, 2, 2, 50, 100),
(3, 2, 4, 50, 200),
(3, 7, 2, 200, 400),
(3, 8, 2, 315, 630);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cat_id` varchar(50) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `is_on_sale` tinyint(1) DEFAULT 0,
  `discount` smallint(6) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `views` int(11) NOT NULL DEFAULT 0,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `cat_id`, `image`, `price`, `description`, `is_on_sale`, `discount`, `created_at`, `views`, `updated_at`) VALUES
(1, 'tshirt', '1', '1.jpg', 20, 'blue tshirt', 0, NULL, '2023-10-14 17:37:58', 124, NULL),
(2, 'jacket 1', '1', '2.jpg', 50, 'brown jacket', 0, NULL, '2023-10-14 18:06:48', 5, NULL),
(3, 'short jean', '1', '3.jpg', 30, 'blue short jean', 1, 20, '0000-00-00 00:00:00', 12, NULL),
(4, 'blue bag', '1', '4.jpg', 100, 'big bag', 1, 30, '0000-00-00 00:00:00', 2, '2023-11-05 15:28:42'),
(5, 'apple leather', '3', '5.jpg', 100, 'brown leather apple ipad', 1, 15, '0000-00-00 00:00:00', 0, NULL),
(6, 'arm chair', '4', '6.jpg', 150, 'small arm chair', 1, 25, '0000-00-00 00:00:00', 1, NULL),
(7, 'apple watch', '3', '7.jpg', 250, 'apple watch series 24', 1, 20, '0000-00-00 00:00:00', 2, NULL),
(8, 'airpod', '3', '8.jpg', 350, 'airpod gen 4', 0, 10, '2023-10-15 16:53:44', 2, '2023-11-08 22:29:04'),
(9, 'sony headphone', '3', '9.jpg', 500, 'brand new sony headphone', 0, NULL, '2023-10-15 16:54:29', 0, NULL),
(10, 'eccobe', '3', '10.jpg', 150, 'weather eccobe', 0, 0, '2023-10-15 16:55:09', 0, '2023-11-08 22:59:43'),
(11, 'gopro24', '3', '11.jpg', 240, 'gopro gen24 next', 0, NULL, '2023-10-15 16:55:55', 10, NULL),
(12, 'machine 12', '2', '12.jpg', 600, 'small machine', 0, NULL, '2023-10-15 16:58:33', 0, NULL),
(13, 'machine 13', '2', '13.jpg', 800, 'next gen machine', 0, NULL, '2023-10-15 16:58:33', 20, NULL),
(14, 'machine 14', '2', '14.jpg', 750, 'big machine', 0, NULL, '2023-10-15 16:59:53', 0, NULL),
(15, 'shoes converse', '1', '15.jpg', 120, 'converse 1978', 0, NULL, '2023-10-15 16:59:53', 0, NULL),
(16, 'jacket 2', '1', '16.jpg', 70, 'awesome jacket', 0, NULL, '2023-10-16 01:25:20', 1, NULL),
(17, 'jacket 3', '1', '17.jpg', 100, 'black jacket', 0, NULL, '2023-10-16 01:26:18', 3, NULL),
(18, 'jacket 4', '1', '18.jpg', 120, 'grey jacket', 0, NULL, '2023-10-16 01:26:18', 1, NULL),
(19, 'toshiba fridge', '2', '19.jpg', 600, 'black fridge', 0, NULL, '2023-10-17 16:15:09', 0, NULL),
(20, 'sanyo fridge', '2', '20.jpg', 800, 'white fridge', 0, NULL, '2023-10-17 16:15:09', 41, NULL),
(21, 'washing disk', '2', '21.jpg', 350, 'small washing disk', 0, NULL, '2023-10-17 16:16:31', 0, NULL),
(22, 'washing machine', '2', '22.jpg', 280, 'stand washing machine', 0, NULL, '2023-10-17 16:16:31', 12, NULL),
(23, 'bếp gas đơn đen', '2', '23.jpg', 50, 'bếp ga rinnie đơn nhỏ', 0, NULL, '2023-10-17 16:17:31', 0, NULL),
(24, 'washing awesome', '2', '24.jpg', 610, 'black washing machine 8kg', 0, NULL, '2023-10-17 16:39:29', 15, NULL),
(25, 'beat headphone', '3', '25.jpg', 240, 'BHP beat edm', 0, NULL, '2023-10-17 16:39:29', 1, NULL),
(26, 'canon camera', '3', '26.jpg', 500, 'canon 2000d', 0, NULL, '2023-10-17 16:40:54', 0, NULL),
(27, 'glasses 1', '3', '27.jpg', 100, 'lv glasses', 0, NULL, '2023-10-17 16:40:54', 17, NULL),
(28, 'sony headphone', '3', '28.jpg', 120, 'sony tremble headphone', 0, NULL, '2023-10-17 16:42:12', 31, NULL),
(29, 'b headphone', '3', '29.jpg', 240, 'beat headphone to the max acs', 0, NULL, '2023-10-17 16:42:12', 0, NULL),
(30, 'glasses 2', '3', '30.jpg', 140, 'gucci glasses', 0, NULL, '2023-10-17 16:43:33', 0, NULL),
(31, 'apple watch series 4', '3', '31.jpg', 600, 'apple watch with steels', 1, 15, '2023-10-17 16:43:33', 0, NULL),
(32, 'glasses 3', '3', '32.jpg', 160, 'luivui glasses', 0, NULL, '2023-10-17 16:44:49', 11, NULL),
(33, 'apple watch', '3', '33.jpg', 240, 'white apple watch', 1, 30, '2023-10-17 16:44:49', 0, NULL),
(34, 'chair 1', '4', '34.jpg', 110, 'white chair 5 wheels', 1, 10, '2023-10-17 16:56:04', 24, NULL),
(35, 'chair 2', '4', '35.jpg', 60, '4 stand chair', 0, NULL, '2023-10-17 16:56:04', 0, NULL),
(36, 'kệ chén', '4', '36.jpg', 30, 'white 3 bowls table', 0, NULL, '2023-10-17 16:57:29', 14, NULL),
(37, 'chair 4', '4', '37.jpg', 140, 'pink chair beauty', 0, 0, '2023-10-17 16:57:29', 0, '2023-11-08 22:32:10'),
(38, 'chair 5', '4', '38.jpg', 190, 'chair for table', 1, 15, '2023-10-17 16:58:42', 16, NULL),
(39, 'desk 1', '4', '39.jpg', 240, 'big white desk', 0, NULL, '2023-10-17 16:58:42', 0, NULL),
(40, 'desk 2', '4', '40.jpg', 210, 'bigger desk', 1, 10, '2023-10-17 16:59:15', 1, NULL),
(143, 'iPhone 15', '3', '41.jpg', 1500, 'mới nhất', 1, 10, '2023-11-05 19:38:32', 0, '2023-11-05 19:38:32'),
(144, 'thêm tạm', '4', '123.jpg', 140, 'cái gì cũng ko biết', 1, 10, '2023-11-08 23:20:37', 0, '2023-11-08 23:20:37'),
(145, 'iphone 17', '3', 'iphone 17.jpeg', 2000, 'iphone năm 2030', 1, 10, '2023-11-09 08:21:36', 0, '2023-11-09 08:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(256) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT 'user',
  `created_at` datetime DEFAULT current_timestamp(),
  `dateofbirth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `email`, `phone`, `address`, `gender`, `avatar`, `role`, `created_at`, `dateofbirth`) VALUES
(79, 'pt', '1', 'phong', 'pt@mail', '012', 'pt 123', 0, NULL, 'admin', '2023-10-22 12:44:23', '0000-00-00'),
(83, 'demo', '1', 'demo', 'demo@mail', '12', 'demo address', 1, '123.jpg', 'user', '2023-11-05 11:24:00', '1996-04-24'),
(84, 'demo2', '1', 'demo2', 'demo2@mail', '123213', '123', 1, NULL, 'user', '2023-11-05 22:48:14', '1996-04-24'),
(87, 'phong', '1', 'xuanphong', 'pt@mail', '123466', 'pt address', 1, '123.jpg', 'user', '2023-11-09 16:26:24', '1996-04-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trang` (`trang`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_id`,`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
