-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 04:42 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodorderigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `email`, `date`) VALUES
(1, 'admin', '$2y$10$mI/hpZ59vGgjs/lPTQWLJu.I82O93AEJ3gwFycAjuibOjAGi9dcTm', 'admin123@gmail.com', '2021-02-26 16:24:50');


-- --------------------------------------------------------

--
-- Table structure for table `product`
--
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--
INSERT INTO `product` (`product_id`, `category_id`, `name`, `about`, `price`, `img`) VALUES
(1, 1, 'Grilled Cheese Sandwich', 'Grilled cheese sandwich or grilled cheese is a hot sandwich made with more varieties of cheese cooked on the grill long enough for the cheese to melt a little and the bread to get brown and a little crispy. Grill until lightly browned and flip over; conti', 6, 'igcsan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`,`img`) VALUES
(1, 'Fishes','gresto.jpg'),
(2, 'Clams','gresto.jpg'),
(3, 'Shrimps','gresto.jpg'),
(4, 'Crabs','gresto.jpg'),
(5, 'Seaweeds','gresto.jpg');


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`) VALUES
(18, 'christine', 'Christine', 'Moore', 'christine@gmail.com', '8545457777', '$2y$10$XLhDPwNkxadw1cePzUckzutf5jIWe.c7EUdrnUCPSo7RC3xqN0MqO', '245 Ralph Street'),
(19, 'thomas', 'Thomas', 'Yorke', 'thomas@gmail.com', '6540215001', '$2y$10$a7x4PLACXGXy4D0oJR0C8.fKMaG4Syg0mIUWqQw.kl8Cpt4zHyGeC', '8520 Allace Avenue'),
(20, 'leahp', 'Leah', 'Powell', 'leahp@gmail.com', '6540215700', '$2y$10$qUdthXhirk4/A./n2M3g1.cLMzG32i6zpHk5TsZSfq5D/JpnvidB6', '1114  Anmoore Road'),
(21, 'julie', 'Julie', 'Turner', 'julie@gmail.com', '6201254700', '$2y$10$lVo7.B89NHzx3UN/XHBmGOFoKIni95HaXNve2lciGPmNlBNhIz00S', '175  Gladwell Street'),
(22, 'robert', 'Robert', 'Garcia', 'robertgr@gmail.com', '8542124540', '$2y$10$K7cwOrUSXWWyzqM1PaIrSewLr.6xdFySk4DPWFENdAfNUFWB9BIRW', '2325  Brooke Street'),
(23, 'caroline', 'Caroline', 'Silva', 'carolinsi@gmail.com', '8540222320', '$2y$10$C2y0mZ.niJ1TfozEp15iG.ZLPJ23SHp9swR7sMzkZyF6JYRajFKDi', '1836  Rainbow Drive'),
(24, 'walker', 'John', 'Walker', 'john@gmail.com', '6012225470', '$2y$10$pl0kXL/4376t7les3MR5EeKVVZrGxTDzhNjCmqyzkjheeQs5zEJwG', '3791  Barnes Avenue'),
(25, 'jason', 'Jason', 'Anderson', 'jason@gmail.com', '8541212140', '$2y$10$kDGpBxWSICET3rzxvrGgXe.8mZB.04d.IqIz0DNQC.MCdd9kcIlv2', '4417  Clark Street'),
(26, 'plyler', 'Anastasia', 'Plyler', 'anastasia@gmail.com', '1245552120', '$2y$10$IpzK223xfacfCETSRR5uT.jNN/ClIP3r/vGInZQK9445UiPoz5RgW', '4685  Poling Farm Road'),
(27, 'michael', 'Michael', 'Holland', 'michael@gmail.com', '0540001470', '$2y$10$ihOEGdI6OCrQkBv1.I100uLe3rVtbJ6G1LcICuzJrCR7McLjTD71y', '79  Main St'),
(28, 'paige', 'Paige', 'Richardson', 'paigeri@gmail.com', '0254580002', '$2y$10$S87MjBD29LIXmtegDjxa7uiGNKqUiLoMiecJ9vIRxUU9fCtdnfavO', '110  Manor Way'),
(29, 'douglas', 'Eva', 'Douglas', 'evadoug@gmail.com', '3145800010', '$2y$10$KeoGCID6Z1Byt84B.lzSz.KB1uVYtTCz.DUGym4HuJeiQTg4MpT5S', '25 Ocean Street'),
(30, 'jayden', 'Jayden', 'Swadling', 'jayden@gmail.com', '3145210020', '$2y$10$G5tjFx15o76k78fAPudvUOovE.ubzQjkH51HcvF2zBukNTkV0t25G', '53 Ocean Street'),
(31, 'jessica', 'Jessica', 'Callum', 'jessum@gmail.com', '4521020010', '$2y$10$ZbHU6iGGm4Aeq/.cRWYp2eadhHK0h4sg6c4LIHbqdf1jnd1pybVC.', '73 Ocean Street'),
(32, 'carter', 'Brian', 'Carter', 'brianc@gmail.com', '6470002696', '$2y$10$bg1XbJ97GXaoHnG4OMkrDex5ybLWGEueKjFvUzvH1/kBtjR4NIp36', '2415  Walkers Ridge Way'),
(33, 'henry', 'Henry', 'Clark', 'henryc@gmail.com', '5402225000', '$2y$10$yKsf5a6TcTBHEflcfJDKnOu6Hfsw1QNok58uvrj7YWemzM2yMLNZC', '3017  Middleville Road'),
(34, 'taylor', 'Paul', 'Taylor', 'paulty@gmail.com', '7558744260', '$2y$10$FvSDmYTKWLh9CWuhRUHsfuWqALfXwzR7jIC00y0ZSvTihaFCSnWeG', '4957 Pearcy Avenue');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `o_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `success-date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`o_id`, `u_id`, `product_id`, `product_name`, `quantity`, `price`, `status`, `date`, `success-date`, `category_id`) VALUES
(18, 18, 1, 'Maltesers Tiramisu', 1, 4, 'closed', '2021-05-16 18:01:05', '2021-05-16 16:02:09', 1);


--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
