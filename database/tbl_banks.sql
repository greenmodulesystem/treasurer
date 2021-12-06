-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2018 at 07:54 AM
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
-- Table structure for table `tbl_banks`
--

CREATE TABLE `tbl_banks` (
  `Bank_name` varchar(120) NOT NULL,
  `Bank_name_short` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_banks`
--

INSERT INTO `tbl_banks` (`Bank_name`, `Bank_name_short`) VALUES
('Banco de Oro ', 'BDO'),
('Metropolitan Bank & Trust Company', 'Metrobank'),
('Bank of the Philippine Islands', 'BPI'),
('Land Bank of the Philippines', 'Landbank'),
('Security Bank Corporation', 'Security Bank'),
('Philippine National Bank', 'PNB'),
('Development Bank of the Philippines', 'DBP'),
('Union Bank of the Philippines', 'UnionBank'),
('Rizal Commercial Banking Corporation', 'RCBC'),
('United Coconut Planters Bank', 'UCPB');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
