-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2014 at 11:21 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cpbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location`, `status`) VALUES
(1, 'posta', ''),
(2, 'kariakoo', ''),
(3, 'sinza', ''),
(4, 'mbezi beach', ''),
(5, 'upanga', ''),
(6, 'masaki', ''),
(7, 'oysterbay', '');

-- --------------------------------------------------------

--
-- Table structure for table `paking`
--

CREATE TABLE IF NOT EXISTS `paking` (
  `pacid` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`pacid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `paking`
--

INSERT INTO `paking` (`pacid`, `id`, `name`) VALUES
(1, 1, 'mnazi'),
(2, 1, 'national'),
(3, 2, 'car1'),
(4, 2, 'car2'),
(5, 3, 'capark1'),
(6, 3, 'carpark2'),
(7, 4, 'nafasi ipo'),
(8, 4, 'nafasi ipo1'),
(9, 5, 'chance'),
(10, 5, 'chance1'),
(11, 6, 'nafasi '),
(12, 6, 'nafasi'),
(13, 7, 'karibu'),
(14, 7, 'karibu1'),
(15, 1, 'nimeongeza'),
(16, 1, 'nyingine');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(70) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `email` varchar(80) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(67) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `phone`, `email`, `username`, `password`) VALUES
(1, 'charles', 'sundu', '0755542233', 'sunducharles@yahoo.com', 'sundu', '698d51a19d8a121ce581499d7b701668'),
(2, 'jonas', 'ishengoma', '0755542233', 'jonas@yahoo.com', 'jonas', '202cb962ac59075b964b07152d234b70'),
(8, 'charles', 'sundu', '0755542233', 'sndu@gmail.com', 'agrea', 'febe1ac42b29625ede362e97ec5af503'),
(9, 'tyui', 'tyui', 'tyuii', 'rtes@ty.com', 'tyr', '15137ac9aa4a99ca503af92199223644'),
(10, 'sdaggg', 'sdfg', '1234567', 'sdg@ghv.com', 'sdfg', '56fb167809cddf32a68168c0511c654d'),
(11, 'charles', 'sundu', '1234567', 'sunducharles@yahoo.com', 'ana', '457391c9c82bfdcbb4947278c0401e41'),
(12, 'wer', 'qwer', 'erty', 'mkun@gmail.com', 'sundu', '827ccb0eea8a706c4c34a16891f84e7b'),
(13, 'charles', 'sundu', '0755542233', 'sunducharles@yahoo.com', 'sundu', '81dc9bdb52d04dc20036dbd8313ed055'),
(14, 'charles', 'sundu', '0755542233', 'nnn@vv.com', 'sundu', 'f970e2767d0cfe75876ea857f92e319b'),
(15, 'charles', 'sundu', '0755542233', 'sunducharles@yahoo.com', 'sundu', '7815696ecbf1c96e6894b779456d330e'),
(16, 'charles', 'sundu', '1234567', 'jonas@yahoo.com', 'sundu', '7815696ecbf1c96e6894b779456d330e'),
(17, 'charles', 'sundu', '0755542233', 'jonas@yahoo.com', 'sundu', '912ec803b2ce49e4a541068d495ab570'),
(18, 'asde', 'fgfdddd', '0755542233', 'jonas@yahoo.com', 'sundu', '7815696ecbf1c96e6894b779456d330e'),
(19, 'charles', 'sundu', '0755542233', 'jonas@yahoo.com', 'sundu', 'dde6ecd6406700aa000b213c843a3091'),
(20, 'charles', 'sundu', '0755542233', 'sunducharles@gmail.com', 'sundu', '140b543013d988f4767277b6f45ba542'),
(21, 'charles', 'sundu', '1234567', 'jonas@yahoo.com', 'sundu', 'dde6ecd6406700aa000b213c843a3091'),
(22, 'charles', 'sundu', '0755542233', 'jonas@yahoo.com', 'sundu', 'dde6ecd6406700aa000b213c843a3091'),
(23, 'charles', 'sundu', '0755542233', 'jonas@yahoo.com', 'sundu', 'dde6ecd6406700aa000b213c843a3091');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
