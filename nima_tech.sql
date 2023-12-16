-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 11:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nima_tech`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'Luis Pitt', 'luis@pitt.com', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying', '2023-12-16 16:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laptops`
--

CREATE TABLE `tbl_laptops` (
  `id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `model_name` varchar(200) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `processor` text NOT NULL,
  `display` text NOT NULL,
  `memory_storage` text NOT NULL,
  `design_battery` text NOT NULL,
  `ports_cd_drive` text NOT NULL,
  `cooling` text NOT NULL,
  `operating_system` text NOT NULL,
  `inside_the_box` text NOT NULL,
  `weight` varchar(200) NOT NULL,
  `graphics` text NOT NULL,
  `warranty` text NOT NULL,
  `keyboard` text NOT NULL,
  `audio` text NOT NULL,
  `camera` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `available_stock` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mobiles`
--

CREATE TABLE `tbl_mobiles` (
  `id` int(11) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `display` varchar(50) NOT NULL,
  `memory_and_storage` text NOT NULL,
  `battery` varchar(50) NOT NULL,
  `os` varchar(255) NOT NULL,
  `camera` text NOT NULL,
  `price` int(11) NOT NULL,
  `sim` text NOT NULL,
  `processor` text NOT NULL,
  `weight` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL,
  `available_stock` int(11) NOT NULL,
  `inside_the_box` varchar(255) NOT NULL,
  `warranty` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_mobiles`
--

INSERT INTO `tbl_mobiles` (`id`, `product_img`, `company_name`, `product_name`, `description`, `display`, `memory_and_storage`, `battery`, `os`, `camera`, `price`, `sim`, `processor`, `weight`, `discount`, `available_stock`, `inside_the_box`, `warranty`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '58aefac1c869e092af51ee68.png', 'google', 'Pixel 6', '', 'Full-screen 6.7-inch', '12 GB LPDDR5 RAM 128 GB UFS 3.1 storage11', '3200mh', 'stock os', '10.8 MP', 50000, 'dual sim', 'Google Tensor G2 Titan M2 security coprocessor', '170gram', 10, 4, '1 m USB-C® to USB-C cable (USB 2.0)  Quick Switch Adapter  SIM tool', '2 year', '2023-12-16 10:43:13', 3, '2023-12-16 10:43:13', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `full_name` text NOT NULL,
  `mobile_no` int(11) NOT NULL,
  `address` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `p_id`, `user_id`, `type`, `full_name`, `mobile_no`, `address`, `quantity`, `created_at`) VALUES
(1, 1, 4, 'mobile', 'maria', 1231231231, 'ahemdabad', 1, '2023-12-16 10:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_cart`
--

CREATE TABLE `tbl_user_cart` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_cart`
--

INSERT INTO `tbl_user_cart` (`id`, `p_id`, `user_id`, `type`, `created_at`) VALUES
(1, 1, 4, 'mobile', '2023-12-16 10:45:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_registration`
--

CREATE TABLE `tbl_user_registration` (
  `id` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `phone_no` varchar(12) NOT NULL,
  `gender` int(2) NOT NULL,
  `address` text NOT NULL,
  `pincode_no` int(6) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_super_admin` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_registration`
--

INSERT INTO `tbl_user_registration` (`id`, `first_name`, `last_name`, `email`, `password`, `phone_no`, `gender`, `address`, `pincode_no`, `status`, `is_super_admin`, `created_at`) VALUES
(3, 'System', 'Admin', 'system@admin.com', '$2y$10$oAI4B2YaXJCuR2S4P5ZkjOTt..BV/0MWo94CaKG7yYhF7Pe.C.cP6', '123456', 0, '', 0, 0, 1, '2023-12-11 23:36:07'),
(4, 'abc', 'abc', 'abc@abc.com', '$2y$10$ttbyAugxPjzwnZPBn2qWmedCWp/7bHX4tTC9w/oKzOFNbRpWz2WRS', '1231231231', 0, 'ahemdabad', 123123, 0, 0, '2023-12-16 15:59:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_laptops`
--
ALTER TABLE `tbl_laptops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laptop1` (`created_by`),
  ADD KEY `laptop2` (`updated_by`);

--
-- Indexes for table `tbl_mobiles`
--
ALTER TABLE `tbl_mobiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mobile1` (`created_by`),
  ADD KEY `mobile2` (`updated_by`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order` (`user_id`);

--
-- Indexes for table `tbl_user_cart`
--
ALTER TABLE `tbl_user_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart` (`user_id`);

--
-- Indexes for table `tbl_user_registration`
--
ALTER TABLE `tbl_user_registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_laptops`
--
ALTER TABLE `tbl_laptops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_mobiles`
--
ALTER TABLE `tbl_mobiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user_cart`
--
ALTER TABLE `tbl_user_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user_registration`
--
ALTER TABLE `tbl_user_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_laptops`
--
ALTER TABLE `tbl_laptops`
  ADD CONSTRAINT `laptop1` FOREIGN KEY (`created_by`) REFERENCES `tbl_user_registration` (`id`),
  ADD CONSTRAINT `laptop2` FOREIGN KEY (`updated_by`) REFERENCES `tbl_user_registration` (`id`);

--
-- Constraints for table `tbl_mobiles`
--
ALTER TABLE `tbl_mobiles`
  ADD CONSTRAINT `mobile1` FOREIGN KEY (`created_by`) REFERENCES `tbl_user_registration` (`id`),
  ADD CONSTRAINT `mobile2` FOREIGN KEY (`updated_by`) REFERENCES `tbl_user_registration` (`id`);

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `order` FOREIGN KEY (`user_id`) REFERENCES `tbl_user_registration` (`id`);

--
-- Constraints for table `tbl_user_cart`
--
ALTER TABLE `tbl_user_cart`
  ADD CONSTRAINT `cart` FOREIGN KEY (`user_id`) REFERENCES `tbl_user_registration` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
