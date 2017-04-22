-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2017 at 04:04 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stock_se`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
`id` int(11) NOT NULL,
  `a_username` varchar(32) NOT NULL,
  `a_password` varchar(32) NOT NULL,
  `a_fn` varchar(32) NOT NULL,
  `a_ln` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `a_username`, `a_password`, `a_fn`, `a_ln`) VALUES
(1, 'admin', 'admin', 'Jhace', 'Llanes');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_active` int(11) NOT NULL,
  `brand_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_active`, `brand_status`) VALUES
(4, 'Tester', 1, 1),
(5, 'Mugs', 1, 1),
(6, 'Keys', 1, 1),
(7, 'Remote Key', 1, 1),
(8, '', 1, 1),
(9, '', 1, 1),
(10, 'HID Lamp', 1, 1),
(11, '', 0, 1),
(12, '', 0, 1),
(13, '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cashout`
--

CREATE TABLE IF NOT EXISTS `cashout` (
`id` int(11) NOT NULL,
  `cn` varchar(255) NOT NULL,
  `ca` varchar(11) NOT NULL,
  `con` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cash` int(11) NOT NULL,
  `pm` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashout`
--

INSERT INTO `cashout` (`id`, `cn`, `ca`, `con`, `email`, `cash`, `pm`) VALUES
(1, 'Jhace Llanes', 'dasfasgasga', 2147483647, 'asdasd@asd.com', 1200, ''),
(2, '', '', 0, '', 0, ''),
(3, 'Joshua Christian', 'dau', 912312323, 'asdasd@asd.com', 5000, ''),
(4, 'asd', 'dqwuuuuu', 9123123, 'q21@sds.com', 0, ''),
(5, 'asdffsf', 'dhgfjjjj', 8787878, 'cvcv@ht.com', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `categories_active` int(11) NOT NULL,
  `categories_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Msg` varchar(255) NOT NULL,
  `DnT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pro_id` int(11) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `Name`, `Email`, `Msg`, `DnT`, `pro_id`, `img`) VALUES
(29, 'dsfsdf', 'dsfsd@yt.com', 'Nice product', '2017-04-19 12:35:28', 30, 'img/user.png'),
(30, 'dsfsdf', 'dsfsd@yt.com', 'Good quality', '2017-04-19 12:35:41', 31, 'img/user.png'),
(32, 'Joshua Llanes', 'dsad2@asd.com', 'Sample comment. Tutuloy bukas. Goodnight.', '2017-04-19 13:41:16', 30, 'img/user.png'),
(33, 'Joshua Llanes', 'dsad2@asd.com', 'Kung mahaba kaya comment anung manyayare? Kung mahaba kaya comment anung manyayare? Kung mahaba kaya comment anung manyayare? Kung mahaba kaya comment anung manyayare?', '2017-04-19 14:26:19', 31, 'img/user.png'),
(34, 'dsfsdf', 'dsfsd@yt.com', 'Worst Generation is heart heart', '2017-04-20 03:57:54', 54, 'img/user.png'),
(35, 'Ace Bantug', 'bantug@ileen.com', 'Good quality and very affordable. I like it.', '2017-04-20 22:04:51', 33, 'img/user.png'),
(36, 'Geneva C. Miclat', 'qweqwe@htl.com', 'issue?\r\n', '2017-04-21 02:00:49', 31, 'img/user.png'),
(37, 'Geneva C. Miclat', 'qweqwe@htl.com', 'awa ne soy', '2017-04-21 02:01:05', 31, 'img/user.png'),
(38, 'Geneva C. Miclat', 'qweqwe@htl.com', 'mwa mwa ', '2017-04-21 02:01:18', 31, 'img/user.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` int(13) NOT NULL,
  `address` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `age`, `gender`, `phone`, `address`, `street`, `barangay`, `city`, `email`, `username`, `password`, `status`) VALUES
(1, 'Ace Bantug', 35, 'male', 912312312, '32434', 'maligaya', 'dawu', 'lipa', 'bantug@ileen.com', 'animobentedos', 'mwamwamwa', 'Not Active'),
(6, 'dsfsdf', 67, 'male', 324647344, '6536436', 'dsfdsf', 'adsf', 'Mabalacat City', 'dsfsd@yt.com', 'admin', 'admin', 'Active'),
(7, 'sdfsdf', 45, 'male', 2147483647, '56343', 'dfsdf', 'asdasd', 'Mabalacat City', 'qe4@weg.com', 'fghjk', 'ogjk', 'Active'),
(8, 'Geneva C. Miclat', 19, 'female', 916102718, '123456', 'fereg', 'Dau', 'Mabalacat City', 'qweqwe@htl.com', 'genebes', 'yes123', 'Not Active'),
(9, 'asdjasdlkj', 19, 'male', 324234324, '234234', 'dsfsdf', 'dbvcbfb', 'Mabalacat City', 'asdasd@sdf.com', 'mwamwa', 'mwemwe', 'Active'),
(10, 'Joshua Llanes', 18, 'male', 2147483647, '16100', 'Las Vegas', 'Dau', 'Mabalacat City', 'dsad2@asd.com', 'jhace', 'llanes', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(11) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `item_name` varchar(25) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `order_total` double(10,2) NOT NULL,
  `act` varchar(255) NOT NULL,
  `via` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cus_name`, `item_name`, `item_quantity`, `product_price`, `order_total`, `act`, `via`) VALUES
(2, 'dsfsdf', 'dell laptop', 400, 1, 400.00, 'Completed', 'mlhuiller'),
(3, 'dsfsdf', 'viglen laptop', 100, 1, 100.00, 'Completed', 'mlhuiller'),
(4, 'dsfsdf', 'H9 Halogen', 1500, 2, 3000.00, 'Completed', 'mlhuiller'),
(5, 'dsfsdf', 'Multimeter', 45, 1, 45.00, 'Completed', 'mlhuiller'),
(6, 'dsfsdf', 'viglen laptop', 100, 1, 100.00, 'Completed', 'mlhuiller'),
(7, 'dsfsdf', 'viglen laptop', 100, 1, 100.00, 'Pending', 'mlhuiller'),
(8, 'dsfsdf', 'viglen laptop', 100, 1, 100.00, 'Pending', 'mlhuiller'),
(9, 'Geneva C. Miclat', '<br />\r\n<b>Notice</b>:  U', 0, 0, 0.00, 'Pending', 'mlhuiller');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `des` text NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `category`, `product_image`, `product_price`, `des`, `quantity`) VALUES
(30, 'H9 Halogen', 'Light and Bulbs', 'img/img/h9.jpg', 1500, 'Another halogen for brighter future', 12),
(31, 'Mio', 'Tools', 'img/img/31402.jpg', 12000, 'Pagod na pagod gumagapang nalang', 12),
(32, 'Multimeter', 'Diagnostic and Test', 'img/img/Mini Digital Multimeter with Buzzer Voltage Ampere Meter Test Pr (deleted 6721981c33914e13a7c28d6655f0b230).jpg', 45, 'okay na okay swak sa budget', 15),
(33, 'viglen laptop', 'Car Parts and Accessories', 'img/img/kukuru.jpg', 100, 'Affordable and Good quality', 10),
(44, 'dell laptop', 'Car Parts and Accessories', 'img/img/dell (1).jpg', 400, 'No information', 7),
(52, 'H1 Halogen Bulbs', 'Light and Bulbs', 'img/img/1.jpg', 75, 'Halogen bulbs for the brighter future.', 24),
(54, 'Elm 327', 'Diagnostic and Test', 'img/img/elm.jpg', 150, 'elm 327 ODBII scanner. Scanning and reading the car codes.', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`id` int(11) NOT NULL,
  `fn` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `cn` int(11) NOT NULL,
  `hn` int(11) NOT NULL,
  `st` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', ''),
(2, 'stock', '7a1eabc3deb7fd02ceb1e16eafc41073', 'a.castro@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashout`
--
ALTER TABLE `cashout`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cashout`
--
ALTER TABLE `cashout`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
