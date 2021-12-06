-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2018 at 04:48 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cadiz_licensing_v3`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_collection`
--

CREATE TABLE `tbl_collection` (
  `ID` bigint(255) NOT NULL,
  `Cycle_ID` bigint(255) NOT NULL,
  `Amount_paid` float DEFAULT NULL,
  `Date_paid` datetime NOT NULL,
  `Received_by` varchar(65) NOT NULL,
  `OR_number` varchar(10) NOT NULL,
  `Bank_name` varchar(60) DEFAULT NULL,
  `Check_number` varchar(30) DEFAULT NULL,
  `Check_date` date DEFAULT NULL,
  `Check_amount` float DEFAULT NULL,
  `Remarks` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_collection`
--
ALTER TABLE `tbl_collection`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_collection`
--
ALTER TABLE `tbl_collection`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
