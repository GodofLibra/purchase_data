-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 09:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `purchase_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `dte`
--

CREATE TABLE `dte` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dte`
--

INSERT INTO `dte` (`id`, `firstname`, `lastname`, `email`, `reg_date`) VALUES
(1, 'Om', 'Maniya', 'om@gmail.com', '2022-10-03 04:38:58'),
(2, 'Om', 'Maniya', 'om@gmail.com', '2022-10-03 04:41:05'),
(3, 'John', 'Doe', 'john@example.com', '2022-10-03 04:44:01'),
(4, 'Mary', 'Moe', 'mary@example.com', '2022-10-03 04:44:01'),
(5, 'Julie', 'Dooley', 'julie@example.com', '2022-10-03 04:44:01'),
(6, 'John', 'Doe', 'john@example.com', '2022-10-03 05:03:36'),
(7, 'John', 'Doe', 'john@example.com', '2022-10-03 05:03:36'),
(8, 'Mary', 'Moe', 'mary@example.com', '2022-10-03 05:03:37'),
(9, 'Mary', 'Moe', 'mary@example.com', '2022-10-03 05:03:37'),
(10, 'Julie', 'Dooley', 'julie@example.com', '2022-10-03 05:03:37'),
(11, 'Julie', 'Dooley', 'julie@example.com', '2022-10-03 05:03:37'),
(12, 'John', 'Doe', 'john@example.com', '2022-10-03 05:45:40'),
(13, 'Mary', 'Moe', 'mary@example.com', '2022-10-03 05:45:41'),
(14, 'Julie', 'Dooley', 'julie@example.com', '2022-10-03 05:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_img_name` varchar(255) NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_category` varchar(27) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `product_count` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_img_name`, `product_price`, `product_category`, `seller_id`, `product_count`, `amount`) VALUES
(14, 'hii', 'nnnnnnnn', '123.png', 200, 'Automobile', 0, 0, 0),
(18, 'ddd', 'dddd', '123.png', 2222, 'Computer/IT', 8, 0, 0),
(19, 'watch', 'a good titan watch', 'watch.jpg', 999, 'Computer/IT', 8, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `register_buyer`
--

CREATE TABLE `register_buyer` (
  `buyer_id` int(11) NOT NULL,
  `buyer_name` varchar(250) NOT NULL,
  `buyer_email` varchar(250) NOT NULL,
  `buyer_password` varchar(250) NOT NULL,
  `buyer_activation_code` varchar(250) NOT NULL,
  `buyer_email_status` enum('not verified','verified') NOT NULL,
  `buyer_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_buyer`
--

INSERT INTO `register_buyer` (`buyer_id`, `buyer_name`, `buyer_email`, `buyer_password`, `buyer_activation_code`, `buyer_email_status`, `buyer_date`) VALUES
(0, 'meet', 'mrugankdave20@gnu.ac.in', '$2y$10$9lwv/P3TUPaFNOw9PSjbR.SUuvfUJ.k4EVDGALEThgZB1sqO4X8BS', '2f1e01ebacc8519e27f4e14a3887b2a4', 'verified', '2022-10-08 02:22:47'),
(0, 'harsh maniya', 'harshmaniya201@gmail.com', '$2y$10$DmQIEfup4Xicl1PR6EXE1un0TmM9ybbd1B5Amp1c.Dn1fSpWVwDDW', 'e33f5ee1d9f4312b1d67c78ed6d32b32', 'verified', '2022-10-08 08:34:33'),
(0, 'om maniya', 'ommaniya123@gmail.com', '$2y$10$vMzQE9kIcykcvV0XIeZjx.fjgqB2F3HzuMBU7jc/SWgRH3QogkW5u', 'c37b407461639d270eecbc0c1653339d', 'verified', '2022-10-08 08:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `register_inst`
--

CREATE TABLE `register_inst` (
  `inst_user_id` int(11) NOT NULL,
  `inst_name` varchar(250) NOT NULL,
  `inst_email` varchar(250) NOT NULL,
  `inst_password` varchar(250) NOT NULL,
  `inst_activation_code` varchar(250) NOT NULL,
  `inst_email_status` enum('not verified','verified') NOT NULL,
  `inst_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_inst`
--

INSERT INTO `register_inst` (`inst_user_id`, `inst_name`, `inst_email`, `inst_password`, `inst_activation_code`, `inst_email_status`, `inst_date`) VALUES
(8, 'Ganpat University', 'swetnandola@gmail.com', '$2y$10$vTQGS8nt.SFgONrVvb6.PewpdXTKJrjnFqeYNm8yxKCwo5d0ykP3q', '6bf406e898616517e54a5333bd00e304', 'verified', '2022-10-07 11:44:06'),
(9, 'raj', 'rajmparmar08@gmail.com', '$2y$10$rzvqDaEHvmN0SFm7p2kEZuAJnQuj9p3xKNacAslLBq7BXnT.buu.6', 'c866aaae4ca13bedb72ed3d1ff81ff84', 'not verified', '2022-10-08 05:22:48'),
(10, 'Rusabh', 'mrugankdave20@gnu.ac.in', '$2y$10$HOvFFf4cI1u3o3SxjojJD.Gz7HpAQSCU/BhDC/QU2P030T8iiuccy', 'bffb6b2fcd5ace7409b58ddfc835feea', 'verified', '2022-12-20 08:00:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `product_id`, `quantity`, `member_id`) VALUES
(64, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, '3D Camera', '3DcAM01', 'product-images/camera.jpg', 1500.00),
(2, 'External Hard Drive', 'USB02', 'product-images/external-hard-drive.jpg', 800.00),
(3, 'Wrist Watch', 'wristWear03', 'product-images/watch.jpg', 300.00),
(4, 'UPS', 'UPS01', 'product-images/ups.jpg', 1800.00),
(5, 'Extension', 'EXT02', 'product-images/extension.jpg', 900.00),
(6, 'Power Bank', 'powbank03', 'product-images/powerbank.jpg', 2700.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dte`
--
ALTER TABLE `dte`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `register_inst`
--
ALTER TABLE `register_inst`
  ADD PRIMARY KEY (`inst_user_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dte`
--
ALTER TABLE `dte`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `register_inst`
--
ALTER TABLE `register_inst`
  MODIFY `inst_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
