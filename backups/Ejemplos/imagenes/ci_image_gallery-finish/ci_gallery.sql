-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2016 at 09:48 AM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `view_count` int(11) NOT NULL DEFAULT '0',
  `download_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `title`, `filename`, `thumbnail`, `created_at`, `visible`, `view_count`, `download_count`) VALUES
(1, 'Image 1', 'Image+1.jpg', '', '2015-10-04 20:18:03', 0, 6, 5),
(2, 'Image 2', 'Image+2.jpg', '', '2015-10-04 20:18:03', 1, 8, 9),
(3, 'Image 3', 'Image+3.jpg', '', '2015-10-04 20:18:03', 1, 9, 2),
(4, 'Image 4', 'Image+4.jpg', '', '2015-10-04 20:20:03', 1, 5, 2),
(5, 'Image 5', 'Image+5.jpg', '', '2015-10-04 20:21:03', 1, 9, 3),
(6, 'Image 6', 'Image+6.jpg', '', '2015-10-04 20:18:03', 1, 8, 5),
(7, 'Image 7', 'Image+7.jpg', '', '2015-10-04 20:18:03', 1, 11, 10),
(8, 'Image 8', 'Image+8.jpg', '', '2015-10-04 20:18:03', 1, 12, 2),
(9, 'First Image', '', '', '2015-10-06 18:31:52', 1, 1, 0),
(10, 'The second Image', '', '', '2015-10-06 18:41:17', 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
