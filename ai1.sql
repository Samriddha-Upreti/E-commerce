-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 07:48 PM
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
-- Database: `ai1`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `carts_id` int(11) NOT NULL,
  `carts_user_id` int(11) NOT NULL,
  `carts_prd_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`carts_id`, `carts_user_id`, `carts_prd_id`, `quantity`) VALUES
(1, 1, 1, 3),
(2, 1, 2, 23);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(500) NOT NULL,
  `url_slug` text NOT NULL,
  `status` enum('active','inactive','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `url_slug`, `status`) VALUES
(1, 'Clothes', 'clothes', 'active'),
(2, 'Electronics', 'electronics', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ord_id` int(11) NOT NULL,
  `ord_user_id` int(11) NOT NULL,
  `total_amt` float NOT NULL,
  `shipping_amt` float NOT NULL,
  `status` enum('Placed','Processing','Shipping','Delivered') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `ord_detail_id` int(11) NOT NULL,
  `ord_id` int(11) NOT NULL,
  `ord_prd_id` int(11) NOT NULL,
  `ord_prd_name` varchar(200) NOT NULL,
  `ord_prd_size` varchar(50) NOT NULL,
  `ord_price` float NOT NULL,
  `ord_quantity` int(11) NOT NULL,
  `total_amt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ord_shipping_add`
--

CREATE TABLE `ord_shipping_add` (
  `ord_ship_id` int(11) NOT NULL,
  `ord_id` int(11) NOT NULL,
  `ship_add_id` int(11) NOT NULL,
  `full_address` varchar(500) NOT NULL,
  `province` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `postal_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prd_id` int(11) NOT NULL,
  `prd_cat_id` int(11) DEFAULT NULL,
  `prd_status` enum('active','inactive') DEFAULT 'active',
  `prd_name` varchar(100) DEFAULT NULL,
  `prd_price` int(11) DEFAULT NULL,
  `prd_image` text DEFAULT NULL,
  `prd_description` text DEFAULT NULL,
  `prd_quantity` int(11) DEFAULT NULL,
  `url_slug` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prd_id`, `prd_cat_id`, `prd_status`, `prd_name`, `prd_price`, `prd_image`, `prd_description`, `prd_quantity`, `url_slug`) VALUES
(1, 1, NULL, 'add', 400, '662ca47791cc6_Screenshot 2024-04-25 220808.png', 'dajkad', 23, 'add'),
(2, 2, NULL, 'add1', 400, '662ca493f40de_Screenshot 2024-01-17 180508.png', 'dajkad', 23, 'add1');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_add`
--

CREATE TABLE `shipping_add` (
  `ship_add_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_address` varchar(500) NOT NULL,
  `district` varchar(50) NOT NULL,
  `postal_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(500) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_address` text NOT NULL,
  `user_contact` varchar(24) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_role_id`, `user_name`, `user_email`, `user_password`, `user_address`, `user_contact`, `fname`, `lname`) VALUES
(1, 1, 'Sam', 'upretisamriddha612@gmail.com', 'Sam', 'Mahadevtar', '9865508233', 'Samriddha', 'Upreti'),
(2, 1, 'Samr', 'samriddhaupreti@gmail.com', 'Sam', 'Mahadevtar', '9865508233', 'Sam', 'Upreti');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_roles_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `created at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_roles_id`, `role_name`, `created at`, `updated at`) VALUES
(1, 'customer', '2024-04-29 11:48:36', NULL),
(2, 'admin', '2024-04-29 11:48:36', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`carts_id`),
  ADD KEY `carts_prd_id` (`carts_prd_id`),
  ADD KEY `carts_user_id` (`carts_user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `url_slug` (`url_slug`(1000)) USING HASH;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`),
  ADD KEY `ord_user_id` (`ord_user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`ord_detail_id`),
  ADD KEY `ord_id` (`ord_id`),
  ADD KEY `ord_prd_id` (`ord_prd_id`);

--
-- Indexes for table `ord_shipping_add`
--
ALTER TABLE `ord_shipping_add`
  ADD PRIMARY KEY (`ord_ship_id`),
  ADD KEY `ord_id` (`ord_id`),
  ADD KEY `ship_add_id` (`ship_add_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prd_id`),
  ADD UNIQUE KEY `url_slug` (`url_slug`) USING HASH,
  ADD KEY `prd_cat_id` (`prd_cat_id`);

--
-- Indexes for table `shipping_add`
--
ALTER TABLE `shipping_add`
  ADD PRIMARY KEY (`ship_add_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_role_id` (`user_role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_roles_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`carts_prd_id`) REFERENCES `product` (`prd_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_ibfk_3` FOREIGN KEY (`carts_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`ord_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`ord_id`) REFERENCES `orders` (`ord_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`ord_prd_id`) REFERENCES `product` (`prd_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ord_shipping_add`
--
ALTER TABLE `ord_shipping_add`
  ADD CONSTRAINT `ord_shipping_add_ibfk_1` FOREIGN KEY (`ord_id`) REFERENCES `orders` (`ord_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ord_shipping_add_ibfk_2` FOREIGN KEY (`ship_add_id`) REFERENCES `ord_shipping_add` (`ord_ship_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`prd_cat_id`) REFERENCES `categories` (`cat_id`);

--
-- Constraints for table `shipping_add`
--
ALTER TABLE `shipping_add`
  ADD CONSTRAINT `shipping_add_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `user_roles` (`user_roles_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
