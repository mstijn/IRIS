-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2015 at 01:22 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `acc_level` int(4) NOT NULL DEFAULT '1',
  `acc_email` varchar(255) NOT NULL,
  `acc_username` varchar(12) NOT NULL,
  `acc_password` char(64) NOT NULL,
  `acc_score` int(200) DEFAULT NULL,
  `acc_age` int(2) NOT NULL,
  `acc_adres` varchar(255) NOT NULL,
  `edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `acc_level`, `acc_email`, `acc_username`, `acc_password`, `acc_score`, `acc_age`, `acc_adres`, `edit`) VALUES
(1, 2, 'max.vanstijn@yahoo.com', 'max', '1ad9aac3240b349cf08ac6e5d097b0c600c6d7fb05da623cb8d245de4d756cf1', 56, 18, '127.0.0.1', '2015-01-20 08:23:16'),
(6, 1, 'test@test.test', 'test', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 3, 9, 'Von Flotowlaan 1', '2015-01-20 08:23:20'),
(7, 1, 'luciskanker@kanker.com', 'luc', '8cbe391aef253e68ed3f010b8f26c6110637a3c3d7d417dccde01f1ca78b3251', 6, 12, 'nergens 2', '2015-01-20 08:23:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD UNIQUE KEY `acc_email` (`acc_email`), ADD UNIQUE KEY `acc_username` (`acc_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
