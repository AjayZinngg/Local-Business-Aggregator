-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost:3307
-- Generation Time: May 31, 2016 at 07:56 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `localstorefinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `localstore`
--

CREATE TABLE IF NOT EXISTS `localstore` (
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `storename` varchar(100) NOT NULL,
  `tags` varchar(100) NOT NULL,
  `descr` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `localstore`
--

INSERT INTO `localstore` (`name`, `email`, `storename`, `tags`, `descr`) VALUES
('harshith', 'harshith', 'kirana', 'ghjk', 'This is good place');

-- --------------------------------------------------------

--
-- Table structure for table `localstore1`
--

CREATE TABLE IF NOT EXISTS `localstore1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `storename` varchar(100) NOT NULL,
  `tags` varchar(400) NOT NULL,
  `address` varchar(400) NOT NULL,
  `descr` varchar(600) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `localstore1`
--

INSERT INTO `localstore1` (`id`, `name`, `email`, `storename`, `tags`, `address`, `descr`, `lat`, `lng`) VALUES
(1, 'harshit', 'harshit', 'kirana1', 'good', '', 'very good', 0.000000, 0.000000),
(2, 'anne', 'anne', 'peru', 'tag', '', 'fgjfjgfigijfgifguif', 12.863811, 77.665421),
(3, 'anshul', 'anshul@gmail.com', 'tirke', 'manga', '', 'intelligent', 12.864106, 77.665306),
(4, 'Jawad', 'jazzie@gmail.com', 'kirani', 'good', '', 'excellent', 12.864359, 77.666306),
(5, 'jazzy', 'jazzyjawad', 'dell', 'party', '', 'when is the party', 12.869718, 77.664360),
(6, 'harshith', 'harshithmaiya', 'bakery', 'good', '', 'very excellent', 12.859663, 77.619942),
(7, 'test', 'test', 'test', 'test', '', 'test', 12.862850, 77.671524),
(8, 'jahsd', 'ahsbjhqbas@gmaill.com', 'jhbasjhb', 'gsh', 'gshgsd', 'aysaashjv', 12.863591, 77.662048);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
