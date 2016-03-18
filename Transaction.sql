-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 17, 2016 at 11:55 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softwareEngineering`
--

-- --------------------------------------------------------

--
-- Table structure for table `Transaction`
--

CREATE TABLE `Transaction` (
  `Activity No.` int(9) NOT NULL,
  `Date/Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Activity` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Transaction`
--

INSERT INTO `Transaction` (`Activity No.`, `Date/Time`, `Activity`) VALUES
(1, '2016-03-17 21:57:21', 'Username joseph.nsiah logged into the program'),
(2, '2016-03-17 22:09:28', 'Username ernest.kufuor viewed equipment F1010345'),
(3, '2016-03-17 22:09:28', 'Username ernest.kufuor logged out of the program'),
(4, '2016-03-17 22:09:28', 'Username jeffery.takyi logged into the program'),
(5, '2016-03-17 22:09:28', 'Username eunice.quaye logged into requested for equipment 1034576c in lab 101'),
(6, '2016-03-17 22:09:28', 'Username akorsah added an equipment in lab 101'),
(7, '2016-03-17 22:09:28', 'Username akorsah granted username eunice.quaye request'),
(8, '2016-03-17 22:09:28', 'Username jeffery.takyi logged out of the program'),
(9, '2016-03-17 22:09:28', 'Username joseph.nsiah logged out of the program'),
(10, '2016-03-17 22:09:28', 'Username freda.annor viewed equipment c99143 in lab 202'),
(11, '2016-03-17 22:09:28', 'Username namanquah deleted equipment s123563'),
(12, '2016-03-17 22:11:53', 'Username nana.quojo requested for equipment c890865 in lab 123'),
(13, '2016-03-17 22:14:44', 'Username addable added equipment c78763 to lab 768');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Transaction`
--
ALTER TABLE `Transaction`
  ADD PRIMARY KEY (`Activity No.`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Transaction`
--
ALTER TABLE `Transaction`
  MODIFY `Activity No.` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
