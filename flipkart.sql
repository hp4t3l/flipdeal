-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2016 at 01:56 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `flipkart`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cartid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `ptdid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`cartid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `userid`, `ptdid`, `quantity`, `status`) VALUES
(14, 0, 6, 2, 'yes'),
(15, 0, 16, 1, 'yes'),
(25, 4, 20, 1, 'no'),
(26, 0, 19, 1, 'no'),
(34, 5, 11, 1, 'no'),
(37, 5, 17, 1, 'no'),
(39, 5, 9, 1, 'no'),
(41, 4, 9, 1, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `categori`
--

CREATE TABLE IF NOT EXISTS `categori` (
  `catid` int(11) NOT NULL AUTO_INCREMENT,
  `catname` varchar(80) NOT NULL,
  `cattype` varchar(50) NOT NULL,
  `prim` int(11) NOT NULL,
  `catimage` varchar(100) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `categori`
--

INSERT INTO `categori` (`catid`, `catname`, `cattype`, `prim`, `catimage`) VALUES
(1, 'electronic', 'prim', 0, ''),
(2, 'cloth', 'prim', 0, ''),
(3, 'book', 'prim', 0, ''),
(4, 'tv', 'sec', 1, ''),
(5, 'LED', 'sec', 4, ''),
(6, 'comics', 'sec', 3, ''),
(7, 'mens cloth', 'sec', 2, ''),
(8, '32 inch', 'sec', 5, ''),
(9, 'MOBILE', 'sec', 1, 'DSC_0726 (2).JPG'),
(10, 'WOMENS', 'sec', 2, '6a00e5534e0a818833014e883ec273970d.jpg'),
(12, 'ANDROID', 'sec', 9, 'IMG_20160219_184430.jpg'),
(13, 'Camera', 'sec', 1, 'dslr.jpg'),
(14, 'DSLR', 'sec', 13, 'dslr.jpg'),
(15, 'windows', 'sec', 9, ''),
(16, 'Footware', 'prim', 0, '31-menshoes.jpg'),
(17, 'MEN-FOOTWARE', 'sec', 16, '31-menshoes.jpg'),
(18, 'WOMEN-FOOTWARE', 'sec', 16, 'women_shoes_PNG7446.png'),
(19, 'Home and Furniture', 'prim', 0, ''),
(20, 'Drama', 'sec', 3, ''),
(21, 'sofa', 'sec', 19, 'comforting-brown-single-seater-sofa-by-ventura-comforting-brown-single-seater-sofa-by-ventura-xgarqi'),
(22, 'Auto & Sports', 'prim', 0, ''),
(23, 'Laptops', 'sec', 1, ''),
(24, 'LCD', 'sec', 4, ''),
(25, 'Tablets & Accessories', 'sec', 1, ''),
(26, 'KIDS', 'sec', 2, ''),
(27, 'Fiction', 'sec', 3, ''),
(28, 'Non-Fiction', 'sec', 3, ''),
(29, 'School', 'sec', 3, ''),
(30, 'Entrance Exam', 'sec', 3, ''),
(31, 'KIDS-FOOTWARE', 'sec', 16, ''),
(32, 'Casul Shoes', 'sec', 17, ''),
(33, 'Formal Shoes', 'sec', 17, ''),
(34, 'Sports Shoes', 'sec', 17, ''),
(35, 'Sandals & Slippers', 'sec', 17, ''),
(36, 'Casual Shoes', 'sec', 18, ''),
(37, 'Formal Shoes', 'sec', 18, ''),
(38, 'Heels', 'sec', 18, ''),
(39, 'Flats', 'sec', 18, ''),
(40, 'Sports Shoes', 'sec', 18, ''),
(41, 'Sandals & Slippers', 'sec', 18, ''),
(42, 'Casual Shoes', 'sec', 31, ''),
(43, 'School Shoes', 'sec', 31, ''),
(44, 'Sandals & Slippers', 'sec', 31, ''),
(45, 'Beds', 'sec', 19, ''),
(46, 'Biker Accessories', 'sec', 22, ''),
(47, 'Car Accessories', 'sec', 22, ''),
(48, 'Helmets', 'sec', 46, ''),
(49, 'Seat covers', 'sec', 46, ''),
(50, 'Navigation Devices', 'sec', 46, ''),
(51, 'Navigation Devices', 'sec', 47, ''),
(52, 'Speakers', 'sec', 47, '');

-- --------------------------------------------------------

--
-- Table structure for table `cod`
--

CREATE TABLE IF NOT EXISTS `cod` (
  `codid` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` int(11) NOT NULL,
  `payid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `date_time` bigint(20) NOT NULL,
  `dil_date` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`codid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `cod`
--

INSERT INTO `cod` (`codid`, `orderid`, `payid`, `amount`, `status`, `date_time`, `dil_date`) VALUES
(1, 1, 1, 43812, '0', 1465238664, 0),
(2, 2, 2, 500, '0', 1465238846, 0),
(3, 3, 3, 36000, '0', 1465244954, 0),
(4, 4, 4, 36000, '0', 1465245190, 0),
(5, 5, 5, 36000, '0', 1465245348, 0),
(6, 6, 6, 36000, '0', 1465245910, 0),
(7, 7, 7, 36000, '0', 1465245966, 0),
(8, 8, 8, 36000, '0', 1465246146, 0),
(9, 9, 9, 4000, '0', 1465299959, 0),
(10, 10, 10, 4000, '0', 1465300128, 0),
(11, 11, 11, 4000, '0', 1465300130, 0),
(12, 12, 12, 8800, '0', 1465300232, 0),
(13, 13, 13, 8800, 'pending', 1465300374, 0),
(14, 14, 14, 8800, 'rejected', 1465300489, 1467119411),
(15, 15, 15, 8800, 'pending', 1465300650, 0),
(16, 16, 16, 16400, 'pending', 1465300811, 0),
(17, 17, 17, 38199, 'delivered', 1465301177, 1467117997),
(18, 18, 18, 38199, 'rejected', 1465301209, 1467368740),
(19, 19, 19, 38199, 'pending', 1465301237, 0),
(20, 20, 20, 38199, 'pending', 1465301252, 0),
(21, 21, 21, 38199, 'pending', 1465301264, 0),
(22, 22, 22, 38199, 'pending', 1465301362, 0),
(23, 23, 23, 38199, 'pending', 1465301391, 0),
(24, 24, 24, 38199, 'pending', 1465301400, 0),
(25, 25, 25, 38199, 'pending', 1465301421, 0),
(26, 26, 26, 36000, 'pending', 1465301605, 0),
(27, 27, 27, 53200, 'rejected', 1465311665, 1467460984),
(28, 28, 28, 4000, 'delivered', 1465316138, 1467647207),
(29, 29, 29, 24012, 'cencel', 1465324442, 0),
(30, 0, 34, 33000, 'pending', 1465490557, 0),
(31, 0, 35, 1512, 'pending', 1465628044, 0),
(32, 33, 36, 1512, 'pending', 1465628279, 0),
(33, 49, 52, 15000, 'pending', 1465647879, 0),
(34, 51, 54, 108900, 'delivered', 1466513827, 1467123095),
(35, 52, 55, 2900, 'delivered', 1467133697, 1467133809),
(36, 0, 55, 0, 'pending', 1467133697, NULL),
(37, 54, 57, 19200, 'delivered', 1467453102, 1467460917),
(38, 55, 58, 0, 'pending', 1467453294, NULL),
(39, 56, 59, 0, 'pending', 1467453381, NULL),
(40, 57, 60, 0, 'cencel', 1467453384, NULL),
(41, 60, 63, 21000, 'pending', 1467461814, NULL),
(42, 61, 64, 350, 'delivered', 1467462051, 1467566951),
(43, 62, 65, 21249, 'pending', 1467462448, NULL),
(44, 63, 66, 880, 'pending', 1467463283, NULL),
(45, 64, 67, 880, 'delivered', 1467463355, 1467564464),
(46, 65, 68, 50900, 'cencel', 1467522892, NULL),
(47, 67, 70, 47698, 'delivered', 1467648112, 1467648140),
(48, 68, 71, 10000, 'delivered', 1467649774, 1467687404),
(49, 69, 72, 21000, 'pending', 1467711601, NULL),
(50, 70, 73, 0, 'pending', 1467712444, NULL),
(51, 71, 74, 21000, 'pending', 1467712640, NULL),
(52, 73, 76, 2900, 'pending', 1467714177, NULL),
(53, 74, 77, 15000, 'pending', 1467715010, NULL),
(54, 75, 78, 27740, 'pending', 1468244770, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comapny`
--

CREATE TABLE IF NOT EXISTS `comapny` (
  `compid` int(11) NOT NULL AUTO_INCREMENT,
  `compname` varchar(20) NOT NULL,
  `compdetails` text NOT NULL,
  `catid` int(11) NOT NULL,
  `complogo` varchar(80) NOT NULL,
  `displayname` varchar(80) NOT NULL,
  PRIMARY KEY (`compid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `comapny`
--

INSERT INTO `comapny` (`compid`, `compname`, `compdetails`, `catid`, `complogo`, `displayname`) VALUES
(1, 'SONY-TV', '32 inch with android and smart tv with music system', 8, 'sony_logo.png', 'SONY'),
(3, 'MI-MOBILE', 'MOBILE', 1, '894f1b24a5573b0fe25cc8e4e6e5b757.64704.png', 'MI'),
(11, 'Nikon-CAMERA', 'camera', 14, 'dslr.jpg', 'Nikon'),
(12, 'moto-moblie', 'mobile compnay', 12, 'moto.jpg', 'MOTO'),
(13, 'lenevo-mobile', 'lene vo', 12, 'k4.jpg', 'Lenevo'),
(14, 'HONOR-MOBILE', 'honor', 12, 'honor7.jpeg', 'HONOR'),
(15, 'microsoft-mobile', 'wwkjd', 15, 'microsoft-logo.jpg', 'microsoft'),
(16, 'UCB-UDY', 'ucb', 7, 'Benetton-250x250.jpg', 'UCB'),
(17, 'UCB-women', 'UCB', 10, 'Benetton-250x250.jpg', 'UCB'),
(18, 'PUMA-FOOTWARE', 'SHOES COMPANY', 16, 'women_shoes_PNG7446.png', 'PUMA'),
(19, 'George R. R. Martin-', 'writer of game of throne', 3, 'Article Lead.jpg', 'George R. R. Martin'),
(20, 'ROCKY FURNITURE-SOFA', 'confortable', 19, 'comforting-brown-single-seater-sofa-by-ventura-comforting-brown-single-seater-so', 'ROCKY FURNITURE'),
(21, 'HP-laptop', 'laptop ', 23, 'HP_logo_630x630.png', 'HP'),
(22, 'DELL-laptop', 'LAPTOP', 23, 'Dell_Logo.png', 'DELL'),
(23, 'MI-tablet', 'tablet', 25, '894f1b24a5573b0fe25cc8e4e6e5b757.64704.png', 'MI'),
(24, 'APPLE-TABLET', 'tablet', 25, 'Apple_logo_black.svg.png', 'Apple'),
(25, 'vega halmet', 'halemt', 48, 'vega-logo.jpg', 'vega');

-- --------------------------------------------------------

--
-- Table structure for table `giftcode`
--

CREATE TABLE IF NOT EXISTS `giftcode` (
  `giftid` int(11) NOT NULL AUTO_INCREMENT,
  `gift_code` varchar(10) NOT NULL,
  `payid` int(11) DEFAULT NULL,
  `orderid` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `bal` int(11) DEFAULT NULL,
  `date` bigint(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`giftid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `giftcode`
--

INSERT INTO `giftcode` (`giftid`, `gift_code`, `payid`, `orderid`, `amount`, `bal`, `date`, `status`) VALUES
(1, 'FG005', 0, 0, 122, 0, 1465384740, 'ACT'),
(2, 'FG005', 0, 0, 300, 0, 1465384838, 'ACT'),
(3, 'FG005', NULL, NULL, 2000, 0, 1465386063, 'ACT'),
(4, 'FG004', NULL, NULL, 5000, 3488, 1465386089, 'ACT'),
(5, 'FG005', NULL, NULL, 2000, 0, 1465480076, 'ACT'),
(6, 'FG004', 49, 46, 2000, 100, 1465483913, 'ACT'),
(7, 'FG004', 75, 72, 30000, 10700, 1465628572, 'ACT'),
(8, 'FG004', NULL, NULL, 200, NULL, 1465631937, 'ACT'),
(9, 'FG005', 51, 48, 300, 168, 1465646073, 'ACT'),
(10, 'FG005', NULL, NULL, 6000, 100, 1467460437, 'ACT'),
(11, 'FG005', 69, 66, 6000, 45, 1467460632, 'ACT'),
(12, 'FG006', NULL, NULL, 5555, NULL, 1468150144, 'ACT');

-- --------------------------------------------------------

--
-- Table structure for table `no.of.item`
--

CREATE TABLE IF NOT EXISTS `no.of.item` (
  `itemid` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `no.of.item`
--

INSERT INTO `no.of.item` (`itemid`, `orderid`, `productid`, `quantity`, `discount`) VALUES
(1, 1, 9, 1, 0),
(2, 1, 16, 2, 0),
(3, 1, 8, 1, 0),
(4, 2, 13, 1, 0),
(5, 3, 0, 0, 0),
(6, 3, 0, 0, 0),
(7, 4, 0, 0, 0),
(8, 4, 0, 0, 0),
(9, 5, 0, 0, 0),
(10, 5, 0, 0, 0),
(11, 6, 0, 0, 0),
(12, 6, 0, 0, 0),
(13, 7, 0, 0, 0),
(14, 7, 0, 0, 0),
(15, 8, 0, 0, 0),
(16, 8, 0, 0, 0),
(17, 9, 17, 1, 0),
(18, 10, 17, 1, 0),
(19, 11, 17, 1, 0),
(20, 12, 16, 1, 0),
(21, 12, 15, 1, 0),
(22, 13, 16, 1, 0),
(23, 13, 15, 1, 0),
(24, 14, 16, 1, 0),
(25, 14, 15, 1, 0),
(26, 15, 16, 1, 0),
(27, 15, 15, 1, 0),
(28, 16, 14, 1, 0),
(29, 16, 12, 1, 0),
(30, 17, 11, 1, 0),
(31, 17, 18, 1, 0),
(32, 17, 20, 1, 0),
(33, 18, 11, 1, 0),
(34, 18, 18, 1, 0),
(35, 18, 20, 1, 0),
(36, 19, 11, 1, 0),
(37, 19, 18, 1, 0),
(38, 19, 20, 1, 0),
(39, 20, 11, 1, 0),
(40, 20, 18, 1, 0),
(41, 20, 20, 1, 0),
(42, 21, 11, 1, 0),
(43, 21, 18, 1, 0),
(44, 21, 20, 1, 0),
(45, 22, 11, 1, 0),
(46, 22, 18, 1, 0),
(47, 22, 20, 1, 0),
(48, 23, 11, 1, 0),
(49, 23, 18, 1, 0),
(50, 23, 20, 1, 0),
(51, 24, 11, 1, 0),
(52, 24, 18, 1, 0),
(53, 24, 20, 1, 0),
(54, 25, 11, 1, 0),
(55, 25, 18, 1, 0),
(56, 25, 20, 1, 0),
(57, 26, 20, 3, 0),
(58, 27, 14, 2, 0),
(59, 27, 12, 1, 0),
(60, 27, 16, 6, 0),
(61, 28, 6, 4, 0),
(62, 29, 10, 2, 0),
(63, 29, 9, 1, 0),
(64, 31, 13, 2, 0),
(65, 32, 9, 1, 0),
(66, 33, 9, 1, 0),
(67, 33, 13, 3, 0),
(68, 39, 12, 1, 0),
(69, 42, 14, 1, 0),
(70, 46, 13, 1, 0),
(71, 47, 9, 1, 0),
(72, 49, 12, 1, 0),
(73, 50, 15, 1, 0),
(74, 51, 8, 1, 0),
(75, 51, 12, 5, 0),
(76, 51, 13, 1, 0),
(77, 51, 14, 1, 0),
(78, 52, 15, 1, 0),
(79, 54, 18, 1, 0),
(80, 54, 20, 3, 0),
(81, 58, 16, 1, 0),
(82, 60, 19, 1, 0),
(83, 61, 13, 1, 0),
(84, 62, 11, 1, 0),
(85, 63, 6, 1, 0),
(86, 64, 6, 1, 12),
(87, 65, 19, 2, 0),
(88, 65, 15, 1, 0),
(89, 65, 20, 1, 50),
(90, 66, 13, 1, 30),
(91, 67, 11, 2, 15),
(92, 67, 18, 1, 0),
(93, 67, 17, 1, 0),
(94, 68, 20, 1, 50),
(95, 68, 17, 1, 0),
(96, 69, 20, 1, 50),
(97, 69, 9, 1, 45),
(98, 69, 19, 1, 0),
(99, 70, 20, 1, 50),
(100, 71, 19, 1, 0),
(101, 72, 14, 1, 0),
(102, 73, 15, 1, 0),
(103, 74, 12, 1, 0),
(104, 75, 25, 1, 27);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE IF NOT EXISTS `offer` (
  `offerid` int(11) NOT NULL AUTO_INCREMENT,
  `pdtid` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `validity` int(11) NOT NULL,
  `all_date` bigint(20) NOT NULL,
  PRIMARY KEY (`offerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`offerid`, `pdtid`, `discount`, `validity`, `all_date`) VALUES
(4, 13, 55, 1, 1467959994),
(6, 9, 45, 7, 1467706575),
(7, 20, 50, 2, 1467646075),
(8, 16, 5, 1, 1467518533),
(9, 19, 40, 1, 1467478585),
(10, 8, 11, 2, 1467479000),
(11, 21, 50, 1, 1468244513),
(12, 25, 27, 3, 1468244746);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `no_of_item` int(11) NOT NULL,
  `date_time` bigint(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `payid` int(11) NOT NULL,
  `returnrq` int(11) DEFAULT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderid`, `userid`, `no_of_item`, `date_time`, `status`, `payid`, `returnrq`) VALUES
(1, 4, 4, 1465238664, 'pending', 1, NULL),
(2, 4, 2, 1465238846, 'pending', 2, NULL),
(3, 5, 2, 1465244954, 'pending', 3, NULL),
(4, 5, 2, 1465245190, 'pending', 4, NULL),
(5, 5, 2, 1465245348, 'pending', 5, NULL),
(6, 5, 2, 1465245910, 'pending', 6, NULL),
(7, 5, 2, 1465245966, 'pending', 7, NULL),
(8, 5, 2, 1465246146, 'cencel', 8, NULL),
(9, 5, 1, 1465299959, 'pending', 9, NULL),
(10, 5, 1, 1465300128, 'pending', 10, NULL),
(11, 5, 1, 1465300130, 'pending', 11, NULL),
(12, 5, 2, 1465300232, 'pending', 12, NULL),
(13, 5, 2, 1465300374, 'pending', 13, NULL),
(14, 5, 2, 1465300489, 'rejected', 14, NULL),
(15, 5, 2, 1465300650, 'pending', 15, NULL),
(16, 5, 2, 1465300811, 'pending', 16, NULL),
(17, 4, 3, 1465301177, 'delivered', 17, NULL),
(18, 4, 3, 1465301209, 'rejected', 18, NULL),
(19, 4, 3, 1465301237, 'pending', 19, NULL),
(20, 4, 3, 1465301252, 'pending', 20, NULL),
(21, 4, 3, 1465301264, 'pending', 21, NULL),
(22, 4, 3, 1465301362, 'pending', 22, NULL),
(23, 4, 3, 1465301391, 'pending', 23, NULL),
(24, 4, 3, 1465301400, 'pending', 24, NULL),
(25, 4, 3, 1465301421, 'pending', 25, NULL),
(26, 4, 1, 1465301605, 'pending', 26, NULL),
(27, 5, 3, 1465311665, 'rejected', 27, NULL),
(28, 5, 1, 1465316138, 'delivered', 28, NULL),
(29, 5, 2, 1465324442, 'cencel', 29, NULL),
(30, 2, 4, 3535, 'p', 2, NULL),
(31, 5, 2, 1465490557, 'pending', 34, NULL),
(32, 4, 2, 1465628044, 'pending', 35, NULL),
(33, 4, 2, 1465628279, 'pending', 36, NULL),
(39, 4, 1, 1465629271, 'pending', 42, NULL),
(42, 4, 1, 1465630062, 'pending', 45, NULL),
(46, 4, 1, 1465643062, 'pending', 49, NULL),
(47, 5, 1, 1465647358, 'delivered', 50, NULL),
(49, 5, 1, 1465647879, 'cencel', 52, NULL),
(50, 4, 1, 1465742507, 'delivered', 53, NULL),
(51, 5, 4, 1466513827, 'delivered', 54, NULL),
(52, 5, 1, 1467133697, 'delivered', 55, NULL),
(53, 5, 0, 1467133697, 'cencel', 55, NULL),
(54, 5, 2, 1467453102, 'delivered', 57, NULL),
(55, 5, 0, 1467453294, 'pending', 58, NULL),
(56, 5, 0, 1467453381, 'pending', 59, NULL),
(57, 5, 0, 1467453384, 'cencel', 60, NULL),
(58, 5, 1, 1467460674, 'approved', 61, 2),
(59, 5, 0, 1467460837, 'cencel', 62, NULL),
(60, 4, 1, 1467461814, 'pending', 63, NULL),
(61, 4, 1, 1467462051, 'delivered', 64, NULL),
(62, 4, 1, 1467462448, 'pending', 65, NULL),
(63, 4, 1, 1467463283, 'pending', 66, NULL),
(64, 4, 1, 1467463355, 'approved', 67, 4),
(65, 5, 3, 1467522892, 'cencel', 68, NULL),
(66, 5, 1, 1467523612, 'cencel', 69, NULL),
(67, 5, 3, 1467648112, 'delivered', 70, 3),
(68, 6, 2, 1467649774, 'delivered', 71, NULL),
(69, 4, 3, 1467711601, 'pending', 72, NULL),
(70, 4, 3, 1467712444, 'pending', 73, NULL),
(71, 4, 1, 1467712640, 'pending', 74, NULL),
(72, 4, 1, 1467713931, 'pending', 75, NULL),
(73, 6, 1, 1467714177, 'pending', 76, NULL),
(74, 6, 1, 1467715010, 'pending', 77, NULL),
(75, 4, 1, 1468244770, 'pending', 78, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payid` int(11) NOT NULL AUTO_INCREMENT,
  `paymode` varchar(50) NOT NULL,
  `giftcode_id` int(11) DEFAULT NULL,
  `cod_id` int(11) DEFAULT NULL,
  `date_time` bigint(15) NOT NULL,
  `status` varchar(50) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`payid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payid`, `paymode`, `giftcode_id`, `cod_id`, `date_time`, `status`, `amount`) VALUES
(1, 'cod', NULL, 1, 1465238664, 'sucessfull', NULL),
(2, 'cod', NULL, 2, 1465238846, 'sucessfull', NULL),
(3, 'cod', NULL, 3, 1465244954, 'sucessfull', NULL),
(4, 'cod', NULL, 4, 1465245190, 'sucessfull', NULL),
(5, 'cod', NULL, 5, 1465245348, 'sucessfull', NULL),
(6, 'cod', NULL, 6, 1465245910, 'sucessfull', NULL),
(7, 'cod', NULL, 7, 1465245966, 'sucessfull', NULL),
(8, 'cod', NULL, 8, 1465246146, 'sucessfull', NULL),
(9, 'cod', NULL, 9, 1465299959, 'sucessfull', NULL),
(10, 'cod', NULL, 10, 1465300128, 'sucessfull', NULL),
(11, 'cod', NULL, 11, 1465300130, 'sucessfull', NULL),
(12, 'cod', NULL, 12, 1465300232, 'sucessfull', NULL),
(13, 'cod', NULL, 13, 1465300374, 'successfull', NULL),
(14, 'cod', NULL, 14, 1465300489, 'unsuccessfull', NULL),
(15, 'cod', NULL, 15, 1465300650, 'sucessfull', NULL),
(16, 'cod', NULL, 16, 1465300811, 'sucessfull', NULL),
(17, 'cod', NULL, 17, 1465301177, 'successfull', NULL),
(18, 'cod', NULL, 18, 1465301209, 'unsuccessfull', NULL),
(19, 'cod', NULL, 19, 1465301237, 'sucessfull', NULL),
(20, 'cod', NULL, 20, 1465301252, 'sucessfull', NULL),
(21, 'cod', NULL, 21, 1465301264, 'sucessfull', NULL),
(22, 'cod', NULL, 22, 1465301362, 'sucessfull', NULL),
(23, 'cod', NULL, 23, 1465301391, 'sucessfull', NULL),
(24, 'cod', NULL, 24, 1465301400, 'sucessfull', NULL),
(25, 'cod', NULL, 25, 1465301421, 'sucessfull', NULL),
(26, 'cod', NULL, 26, 1465301605, 'sucessfull', NULL),
(27, 'cod', NULL, 27, 1465311665, 'unsuccessfull', NULL),
(28, 'cod', NULL, 28, 1465316138, 'successfull', NULL),
(29, 'cod', NULL, 29, 1465324442, 'cencel', NULL),
(30, 'gift', 4, NULL, 1465483750, 'process', NULL),
(31, 'gift', 4, NULL, 1465483837, 'process', NULL),
(32, 'gift', 4, NULL, 1465484125, 'process', NULL),
(33, 'gift', 4, NULL, 1465484776, 'process', NULL),
(34, 'cod', NULL, 30, 1465490557, 'process', NULL),
(35, 'cod', NULL, 31, 1465628044, 'process', NULL),
(36, 'cod', NULL, 32, 1465628279, 'sucessfull', NULL),
(37, 'gift', 7, NULL, 1465628726, 'process', NULL),
(38, 'gift', 7, NULL, 1465628856, 'process', NULL),
(39, 'gift', 7, NULL, 1465628886, 'process', NULL),
(40, 'gift', 7, NULL, 1465628963, 'process', NULL),
(41, 'gift', 7, NULL, 1465629183, 'process', NULL),
(42, 'gift', 7, NULL, 1465629271, 'process', NULL),
(43, 'gift', 7, NULL, 1465629295, 'process', NULL),
(44, 'gift', 7, NULL, 1465629888, 'process', NULL),
(45, 'gift', 6, NULL, 1465630062, 'process', NULL),
(46, 'gift', 6, NULL, 1465630116, 'process', NULL),
(47, 'gift', 6, NULL, 1465630142, 'process', NULL),
(48, 'gift', 6, NULL, 1465630175, 'process', NULL),
(49, 'gift', 6, NULL, 1465643062, 'process', NULL),
(50, 'gift', 9, NULL, 1465647358, 'successfull', 12),
(51, 'gift', 9, NULL, 1465647376, 'process', 12),
(52, 'cod', NULL, 33, 1465647879, 'sucessfull', NULL),
(53, 'gift', 7, NULL, 1465742507, 'successfull', 2900),
(54, 'cod', NULL, 34, 1466513827, 'successfull', NULL),
(55, 'cod', NULL, 35, 1467133697, 'successfull', NULL),
(56, 'cod', NULL, NULL, 1467133697, 'process', NULL),
(57, 'cod', NULL, 37, 1467453102, 'successfull', NULL),
(58, 'cod', NULL, 38, 1467453294, 'process', NULL),
(59, 'cod', NULL, 39, 1467453381, 'process', NULL),
(60, 'cod', NULL, 40, 1467453384, 'cencel', NULL),
(61, 'gift', 11, NULL, 1467460674, 'successfull', 5605),
(62, 'gift', 11, NULL, 1467460837, 'process', 5605),
(63, 'cod', NULL, 41, 1467461814, 'process', NULL),
(64, 'cod', NULL, 42, 1467462051, 'successfull', NULL),
(65, 'cod', NULL, 43, 1467462448, 'process', NULL),
(66, 'cod', NULL, 44, 1467463283, 'process', NULL),
(67, 'cod', NULL, 45, 1467463355, 'unsucessfull', NULL),
(68, 'cod', NULL, 46, 1467522892, 'cencel', NULL),
(69, 'gift', 11, NULL, 1467523612, 'successfull', 350),
(70, 'cod', NULL, 47, 1467648112, 'successfull', NULL),
(71, 'cod', NULL, 48, 1467649774, 'successfull', NULL),
(72, 'cod', NULL, 49, 1467711601, 'process', NULL),
(73, 'cod', NULL, 50, 1467712444, 'process', NULL),
(74, 'cod', NULL, 51, 1467712640, 'process', NULL),
(75, 'gift', 7, NULL, 1467713931, 'process', 1400),
(76, 'cod', NULL, 52, 1467714177, 'process', NULL),
(77, 'cod', NULL, 53, 1467715010, 'process', NULL),
(78, 'cod', NULL, 54, 1468244770, 'process', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `ptdid` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL,
  `companyid` int(11) NOT NULL,
  `pdtname` varchar(80) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `company` varchar(80) NOT NULL,
  `feature` text NOT NULL,
  `pdtimage` varchar(80) NOT NULL,
  `al_date` bigint(20) NOT NULL,
  PRIMARY KEY (`ptdid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ptdid`, `catid`, `companyid`, `pdtname`, `price`, `stock`, `company`, `feature`, `pdtimage`, `al_date`) VALUES
(6, 12, 12, 'moto g2', 1000, 98, 'moto-moblie', 'ota update.', 'moto.jpg', 1465480076),
(8, 12, 14, 'honor 7', 32000, 80, 'HONOR-MOBILE', 'Fingerprint Sensor,20|8 MP Camera, 5.2 in,3 GB RAM', 'honor7.jpeg', 0),
(9, 8, 1, 'sony tv', 120000, 9, 'SONY-TV', 'led tv', 'kdl46ex6501._sony-bravia-kdl-46ex650-46-inch-full-hd-led-smart-tv.jpg', 1468150144),
(10, 15, 15, 'lumia 950', 12000, 100, 'microsoft-mobile', 'window 10', 'phone_start.png', 0),
(11, 12, 3, 'mi 5', 24999, 117, 'MI-MOBILE', 'Fast as light / Snapdragon 820 / 3GB RAM / 32GB', '12742369_10153227215421612_5191335728300831198_n.jpg', 0),
(12, 12, 3, 'mi 4', 15000, 39, 'MI-MOBILE', '13MP Sony camera, Snapdragon 4-core 2.5GHz, 3GB RAM', 'mi4.jpg', 0),
(13, 7, 16, 'UDY', 500, 8, 'UCB-UDY', 'COTTON, RED COLOR', 'ucb-winter-wear-for-kids-girls8.jpg', 0),
(14, 10, 17, 'top', 1400, 0, 'UCB-women', 'red color, cotton.', '1.jpg', 0),
(15, 32, 18, 'Puma causal shoes', 2900, 136, 'PUMA-FOOTWARE', 'blue causal shoe', 'Puma-Limnos-Cat-2-Dp-SDL941877351-2-6490b.jpg', 1468150144),
(16, 38, 18, 'puma women high heel shoe', 5900, 139, 'PUMA-FOOTWARE', 'red color high heel shoe', 'women_shoes_PNG7446.png', 0),
(17, 33, 18, 'puma brown formal shoe', 4000, 198, 'PUMA-FOOTWARE', 'brown lather formal shoe', '31-menshoes.jpg', 0),
(18, 20, 19, 'got', 1200, 9, 'George R. R. Martin-', 'George R. R. Martin writter', '51Vb90Q1SlL._SY344_BO1,204,203,200_.jpg', 1467460632),
(19, 14, 11, 'nikon-360mp camera', 35000, 5, 'Nikon-CAMERA', '360mpx , with tripod', 'dslr.jpg', 0),
(20, 21, 20, 'king single sit sofa', 12000, 5, 'ROCKY FURNITURE-SOFA', 'mst h bhai king lagega', 'sofa.jpg', 1467460632),
(21, 23, 21, 'HP Pavilion 15-P077TX Laptop', 54000, 12, 'HP-laptop', 'i5-8GB-1TB-15.6-Win8.1-2GB Graphics(Snow White)', 'cat_1468241247.jpg', 1468241247),
(22, 23, 22, 'Dell Inspiron 11 3148', 37940, 15, 'DELL-laptop', 'i3 - 4 GB/500 GB/Windows 10', 'cat_1468242035.jpg', 1468242035),
(23, 23, 21, 'HP Envy 13 13-d015TU', 72000, 5, 'HP-laptop', 'i5, 6th Gen(4 GB/256 GB SSD/Windows 10) ', 'cat_1468242259.jpg', 1468242259),
(24, 25, 23, 'MI PAD', 10999, 20, 'MI-tablet', '7.9 inch, 2.2 GHz,8 MP Camera,2 GB RAM', 'cat_1468242744.jpg', 1468242744),
(25, 25, 24, 'Apple iPad Air 2', 38000, 9, 'APPLE-TABLET', '9.7 inch ,iOS 8,8 MP, WiFi only', 'cat_1468243066.jpg', 1468243066),
(26, 48, 25, 'Vega Cliff Motorsports Helmet - M', 790, 50, 'vega halmet', 'Full Face Type Medium Size', 'cat_1468244002.jpg', 1468244002);

-- --------------------------------------------------------

--
-- Table structure for table `return`
--

CREATE TABLE IF NOT EXISTS `return` (
  `returnid` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` int(11) NOT NULL,
  `reason` text NOT NULL,
  `date_al` bigint(20) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`returnid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `return`
--

INSERT INTO `return` (`returnid`, `orderid`, `reason`, `date_al`, `status`) VALUES
(1, 64, 'sccs', 1467566553, 'request denied'),
(2, 58, 'size prblm', 1467570621, 'approved'),
(3, 67, 'defeted maal h', 1467648157, 'request denied'),
(4, 64, 'fir se ', 1467649012, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `user_regi`
--

CREATE TABLE IF NOT EXISTS `user_regi` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(80) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `dob` date NOT NULL,
  `uname` varchar(80) NOT NULL,
  `uemail` varchar(80) NOT NULL,
  `upass` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(6) NOT NULL,
  `mob` int(10) NOT NULL,
  `uimg` varchar(100) NOT NULL,
  UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_regi`
--

INSERT INTO `user_regi` (`uid`, `fname`, `lname`, `gender`, `dob`, `uname`, `uemail`, `upass`, `address`, `state`, `pincode`, `mob`, `uimg`) VALUES
(4, 'himanshu', 'patel', 'M', '2016-06-08', 'himajju', 'him@gmail.com', 'h', 'add', '', 12345, 1234567777, 'u4_1467120862'),
(5, 'ajju', 'patel', 'M', '2016-06-05', 'ajju', 'ajju@gmail.com', 'a', 'djj', '', 15236, 1233256, 'DSC_0980-02.jpeg'),
(6, 'deepanshu', 'pattel', 'M', '1999-05-16', 'deep', 'deepanshup26@gmail.com', 'd', '163/14, infront of mahindra tractor, postoffice road, saraipali, distt- mahasamund(c.g.).', '', 49355, 2147483647, 'u6_1467649686.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
