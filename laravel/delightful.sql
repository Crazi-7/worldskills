-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2021 at 04:09 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delightful`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `tax` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'Ahmed', 'aaa@gmail.com', 1234567890, 'fsdfsegwefwsefwejhfuweyhf72346y47yweyfigh23478yr78yg2r78ug78rgfuwegfhigweuirtygweui5r254');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order-product`
--

CREATE TABLE `order-product` (
  `pid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `qtt` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order-product`
--

INSERT INTO `order-product` (`pid`, `oid`, `qtt`) VALUES
(80, 2, 3),
(68, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cid` int(11) NOT NULL,
  `value` double NOT NULL,
  `status` enum('Awaiting approval','Approved','Disapproved','In production','Out for Delivery','Finished') NOT NULL DEFAULT 'Awaiting approval',
  `home` tinyint(1) NOT NULL DEFAULT 0,
  `address` varchar(255) NOT NULL,
  `justify` text DEFAULT NULL,
  `pickup` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `cid`, `value`, `status`, `home`, `address`, `justify`, `pickup`) VALUES
(1, '2021-09-02 11:53:39', 1, 60, 'Awaiting approval', 0, 'sdff, gdf, gfdf', '', ''),
(2, '2021-09-02 11:55:45', 1, 3, 'Awaiting approval', 0, 'rewr. 123, fs.', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`) VALUES
(55, 'Rice', 1.5),
(56, 'Brown Rice', 1.5),
(57, 'Beans', 1.5),
(58, 'Pasta', 1.5),
(59, 'Soaked Pumpkin', 1.5),
(60, 'Seasoned rice', 1.5),
(61, 'Mayonnaise', 1.5),
(62, 'Pancake', 1.5),
(63, 'Mashed potatoes', 1.5),
(64, 'Fries', 1.5),
(65, 'Polenta Stick', 1.5),
(66, 'Aipim Croquette', 1.5),
(67, 'Gnocchi', 1.5),
(68, 'Grilled chicken', 3.5),
(69, 'Milanese thigh', 3.75),
(70, 'Roasted Thigh', 3.75),
(71, 'Milanese Fish Fillet', 4),
(72, 'Milanese Chicken Fillet', 3.5),
(73, 'Milanesa drumstick', 3.75),
(74, 'Roasted Drumstick', 3.75),
(75, 'Fried Sausage', 3),
(76, 'Grilled steak', 4),
(77, 'Stew', 3.75),
(78, 'Milanese steak', 4),
(79, 'Parmeggiana Fish Filet', 5),
(80, 'Chicken parmigiana', 4),
(81, 'Steak Parmegiana', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `order-product`
--
ALTER TABLE `order-product`
  ADD KEY `oid` (`oid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order-product`
--
ALTER TABLE `order-product`
  ADD CONSTRAINT `order-product_ibfk_1` FOREIGN KEY (`oid`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order-product_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
