-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 19, 2018 at 06:03 PM
-- Server version: 5.7.19-log
-- PHP Version: 7.2.2

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
-- Table structure for table `tbl_application_business_line`
--

CREATE TABLE `tbl_application_business_line` (
  `ID` bigint(255) NOT NULL,
  `Cycle_ID` bigint(20) DEFAULT NULL,
  `Application_ID` bigint(255) DEFAULT NULL,
  `Business_line` varchar(65) DEFAULT NULL,
  `Business_category` varchar(65) DEFAULT NULL,
  `NoOfUnits` int(11) DEFAULT NULL,
  `Capitalization` double DEFAULT NULL,
  `Essential` varchar(15) DEFAULT NULL,
  `NonEssential` varchar(15) DEFAULT NULL,
  `Retirement` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_application_business_line`
--

INSERT INTO `tbl_application_business_line` (`ID`, `Cycle_ID`, `Application_ID`, `Business_line`, `Business_category`, `NoOfUnits`, `Capitalization`, `Essential`, `NonEssential`, `Retirement`) VALUES
(1, 1, 1, 'Gym', 'Service', 1, 1240000, NULL, NULL, 0),
(2, 1, 1, 'Laundry Shop', 'Service', 1, 452100, NULL, NULL, 0),
(3, 2, 9, 'Party Shop', 'Retailer', 1, 21400, NULL, NULL, 0),
(4, 3, 2, 'Batchoyan', 'Service', 1, 254000, NULL, NULL, 0),
(14, 4, 3, 'Food Supply Retailer', 'Retailer', 1, 152000, NULL, NULL, 0),
(46, 0, 14, 'Beach Resort', 'Amusement', 100, 100, NULL, NULL, 0),
(47, 0, 14, 'Computer Supplies Dealer', 'Dealer', 200, 200, NULL, NULL, 0),
(48, 0, 14, 'Sea Foods Traiding Dealer', 'Producer', 3002, 3001, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application_form`
--

CREATE TABLE `tbl_application_form` (
  `ID` bigint(255) NOT NULL,
  `U_ID` varchar(40) DEFAULT NULL,
  `Application_status_ID` int(11) NOT NULL,
  `Payment_mode_ID` int(11) NOT NULL,
  `TIN_no` varchar(10) DEFAULT NULL,
  `DTI_SEC_CDA_registration_no` varchar(25) DEFAULT NULL,
  `DTI_SEC_CDA_registration_date` date DEFAULT NULL,
  `Business_type_ID` int(11) DEFAULT NULL,
  `Amendment_from_business_type_ID` int(11) DEFAULT NULL,
  `Amendment_to_business_type_ID` int(11) DEFAULT NULL,
  `Tax_incentive` int(11) DEFAULT NULL,
  `Tax_incentive_reason` varchar(150) DEFAULT NULL,
  `Last_name` varchar(20) DEFAULT NULL,
  `First_name` varchar(30) DEFAULT NULL,
  `Middle_name` varchar(20) DEFAULT NULL,
  `Business_name` varchar(150) DEFAULT NULL,
  `Trade_name_franchise` varchar(150) DEFAULT NULL,
  `Business_postal_code` varchar(10) DEFAULT NULL,
  `Business_email_address` varchar(45) DEFAULT NULL,
  `Business_telephone_number` varchar(10) DEFAULT NULL,
  `Business_mobile_number` varchar(12) DEFAULT NULL,
  `Owner_address` varchar(255) DEFAULT NULL,
  `Owner_postal_code` varchar(10) DEFAULT NULL,
  `Owner_email_address` varchar(45) DEFAULT NULL,
  `Owner_telephone_number` varchar(10) DEFAULT NULL,
  `Owner_mobile_number` varchar(12) DEFAULT NULL,
  `Emergency_contact_person` varchar(150) DEFAULT NULL,
  `Emergency_mobile_number` varchar(12) DEFAULT NULL,
  `Emergency_email_address` varchar(45) DEFAULT NULL,
  `Business_area` varchar(15) DEFAULT NULL,
  `Total_number_employees` int(11) DEFAULT NULL,
  `Total_number_male` bigint(15) NOT NULL,
  `Total_number_female` bigint(15) NOT NULL,
  `No_employees_within_LGU` int(11) DEFAULT NULL,
  `Lessors_full_name` varchar(65) DEFAULT NULL,
  `Lessors_full_address` varchar(255) DEFAULT NULL,
  `Lessors_telephone_number` varchar(10) DEFAULT NULL,
  `Lessors_mobile_number` varchar(12) DEFAULT NULL,
  `Lessors_email_address` varchar(20) DEFAULT NULL,
  `Lessors_monthly_rental` double DEFAULT NULL,
  `Application_date` date DEFAULT NULL,
  `Login_email_address` varchar(45) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Salt` varchar(255) DEFAULT NULL,
  `Enable` int(11) DEFAULT NULL,
  `Barangay_ID` int(11) NOT NULL,
  `Purok_ID` int(11) DEFAULT NULL,
  `Street` varchar(255) DEFAULT NULL,
  `Building_name` varchar(150) DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  `Image` longblob NOT NULL,
  `Template_name` varchar(155) NOT NULL,
  `QR_code` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_application_form`
--

INSERT INTO `tbl_application_form` (`ID`, `U_ID`, `Application_status_ID`, `Payment_mode_ID`, `TIN_no`, `DTI_SEC_CDA_registration_no`, `DTI_SEC_CDA_registration_date`, `Business_type_ID`, `Amendment_from_business_type_ID`, `Amendment_to_business_type_ID`, `Tax_incentive`, `Tax_incentive_reason`, `Last_name`, `First_name`, `Middle_name`, `Business_name`, `Trade_name_franchise`, `Business_postal_code`, `Business_email_address`, `Business_telephone_number`, `Business_mobile_number`, `Owner_address`, `Owner_postal_code`, `Owner_email_address`, `Owner_telephone_number`, `Owner_mobile_number`, `Emergency_contact_person`, `Emergency_mobile_number`, `Emergency_email_address`, `Business_area`, `Total_number_employees`, `Total_number_male`, `Total_number_female`, `No_employees_within_LGU`, `Lessors_full_name`, `Lessors_full_address`, `Lessors_telephone_number`, `Lessors_mobile_number`, `Lessors_email_address`, `Lessors_monthly_rental`, `Application_date`, `Login_email_address`, `Password`, `Salt`, `Enable`, `Barangay_ID`, `Purok_ID`, `Street`, `Building_name`, `Status`, `Image`, `Template_name`, `QR_code`) VALUES
(1, 'a2d1383dc4156b1d57f1a3a95b17ce358f626883', 1, 3, '123-654-98', '0403623', '2018-09-11', 1, 1, 1, 0, '', 'Estrella', 'Fres', 'Fernan', 'FraDairy Farms', 'Fra Dairy Farms', '6121', 'fra_ma@gmail.com', '', '', '', '', 'fra_ma@gmail.com', '', '', '', '', 'fra_ma@gmail.com', '100', 3, 0, 0, 3, '', '', '', '', '', 0, '2018-09-11', 'fra_ma@gmail.com', '47827eaf9b6286edd40fa61862943918d25fb54c', 'mh>6$t3*yz@k$hm900$9ue6?l#8mi(2g', 1, 2, 1, 'Opal', '', 1, '', '', 'd9f9089'),
(2, '902b680b9d895a1b93e69d19db026a4c46b17918', 2, 3, '123456789', '123456789', '2018-08-30', 3, 3, 3, 1, '', 'delacruz', 'johnny', 'las', 'AVG inc.', 'avg inc', '6121', 'avg1234@gmail.com', '14344', '092626262626', '', '', '', '', '', '', '', '', '', 5, 0, 0, 0, '', '', '', '', '', 0, '2018-09-11', '', 'fca361f9d67a43a049cc8e39607b5c770819e1df', 'zsskv5za@&ifqq^o>h1^3mdlh$$8n(h3', 1, 3, 3, 'cabahug st.', 'character building', 1, '', '', 'b9226ee'),
(3, '4add4c398c763408b28ed43fe2731f3fcdb6b00c', 1, 1, '945-965-65', 'SDFSFDSF', '2018-09-10', 1, 1, 1, 0, '', 'SELLADO', 'JINKY', 'B', 'JNX TWIRL ICE CREAM CORNER', 'JNX TWIRL ICE CREAM CORNER', '6121', 'jjj_116@yahoo.com', '4930111', '09468888', '', '', 'jjj_116@yahoo.com', '', '', '', '', 'jjj_116@yahoo.com', '', 0, 0, 0, 0, '', '', '', '', '', 0, '2018-09-11', 'jjj_116@yahoo.com', 'c9f7cdd4882ce1f4042558f07ebaaa3ea984023f', 'jf(u11)mg$a1ky@<pmb@x2sz%$z*x!3<', 1, 1, 2, 'ABELARDE ST.', '', 1, '', '', 'e99d004'),
(4, '8eaf9217c542ee3a80acfc763ec2a0583ca51d54', 1, 1, '923-030-97', 'erik paul store', '0009-11-18', 1, 1, 1, 0, '', 'lacson', 'erik paul', 'delgado', 'erik paul store', 'elle store', '6121', 'erik.lacson', '', '09223658177', '', '', 'erik.lacson', '', '', '', '', 'erik.lacson', '', 2, 0, 0, 0, '', '', '', '', '', 0, '2018-09-11', 'erik.lacson', '017bd32de708da23b63ea568b6ddfb0b48261988', '5y0z*$mjp0yg%k$)cz*r^h995!?%h6$v', 1, 3, 3, 'herrerias St.', '', NULL, '', '', 'cb1ed34'),
(5, 'df6e6c9d1fea2f3662b374dcf4eb59f325d7ba5f', 1, 1, '496-495-95', 'FSDFSD', '2018-09-18', 1, 1, 1, 0, '', 'SELLADO', 'JINKY', 'BECEOS', 'JJJ ICE CREAM CORNER', 'JJJ ICE CREAM CORNER', '6121', 'JJJ_116@yahoo.com', '4930-012', '94600000', '', '', 'JJJ_116@yahoo.com', '', '', '', '', 'JJJ_116@yahoo.com', '', 5, 0, 0, 0, '', '', '', '', '', 0, '2018-09-11', 'JJJ_116@yahoo.com', 'd4ae58902212bcd17dc037973822764e03f33d2b', 'r45xj)t)$x61?kzp13a7!)us3n(7g53#', 1, 3, 1, 'ABELARDE ST.', '', NULL, '', '', '81d569e'),
(6, '9f876146f039aacebb4dd805e8736adf9caaf3ab', 1, 3, '918-176-00', '044894', '0000-00-00', 1, 1, 1, 0, '', 'Gonzales  ', 'Jerry', 'Carbaquil', 'jerry softdrinks retailer', '', '6121', 'jerry@gmail.com', '0445', '0919', 'Grandville Subd., Brgy. Daga', '6121', 'jerry@gmail.com', '0445', '0919', 'joan', '0445', 'jerry@gmail.com', '24 sq. m', 2, 0, 0, 0, '', '', '0445', '0919', 'jerry@gmail.com', 0, '2018-09-11', 'jerry@gmail.com', '8f7dea083a9faa4f1c90548b1842ff9ab731b27e', 'vkam1<^b#&#cxce@(oa)t(x%0>3gcasq', 1, 1, 1, '', '', NULL, '', '', 'c9abc20'),
(7, '3bc8403aa4a1aa620df1aeb0db1bc5a445ae4fa4', 1, 1, '123123123', '123123123', '2018-09-01', 1, 1, 1, 1, '', 'Daze', 'Gerald', 'Duterte', 'Geralds Puto', 'Geralds Puto', '6121', 'asd@gmail.com', '', '09302828282', 'Villa Beach, Brgy. Zone 3, Cadiz City', '6121', 'asd@gmail.com', '', '09302828282', 'Mama Daze', '09276374876', 'adef@gmail.com', '100', 4, 0, 0, 1, '', '', '', '', '', 0, '2018-09-11', 'asd@gmail.com', '23804f1efee91acce824321bb81f0c58ec7da909', 'p(!fb9c1uxmn47^wa4c6kdhlb6ku!@6&', 1, 3, 1, '', 'Tristar', NULL, '', '', '487ed24'),
(8, '5f73e291d8f9d5d3c08dfeb76364d6e20aa2cb86', 2, 3, '321654876', '1234560090', '2018-08-15', 1, 1, 1, 1, '', 'Las', 'Laarni', 'Casamayor', 'Laarni\'s Beauty Parlor', 'Laarni\'s Beauty Parlor', '6121', 'abcde@yahoo.com', '1489777', '928989898998', 'Purok 1, Brgy. Zone 1', '6121', 'abcde@yahoo.com', '1231321', '9288888888', '', '', 'abcde@yahoo.com', '20', 3, 0, 0, 1, '', '', '', '', '', 0, '2018-09-11', 'abcde@yahoo.com', '64d25afe62d8f1f99b0f5f20b84fd2b374ae2136', '16q>e1j1&ils^jush^xwtjyv5q)p6$(3', 1, 3, 1, '', 'no name', NULL, '', '', 'c9f1a85'),
(9, 'e8169f867dd9baae97c8efb6688ee060e476091c', 1, 3, '12345', '54321', '2018-08-14', 1, 1, 1, 1, '', 'Guboyan', 'Mary', 'D', 'Sample Trading ', 'Sample Trading ', '6100', 'delacruz@gmail.com', '09156475', '12654', 'sample@gmail.com', '6100', 'delacruz@gmail.com', '1321', '45671', '2', '2', 'delacruz@gmail.com', '2', 2, 0, 0, 2, '2', '2', '2', '2', '2', 2, '2018-09-17', 'delacruz@gmail.com', 'e1b8752d49ec556a583067b1dc2149a24805935c', '9^q8(no8v%n0)j&vr2j$esn$8>zi1jn?', 1, 8, 4, 'Santolan St. ', 'Sam\'s', 1, '', '', 'aee5f66'),
(14, '79846a1f3604c3e68e7457cdc3ff57103f7b42fb', 1, 1, '0923823', '09230923029', '0000-00-00', 1, 1, 1, 1, '', 'Huelgas', 'Joseph Mark Anthony', 'Vallejera', 'Huelgas', 'Battle Station', '092393929', 'Huelgas@gmail.com', '092392828', '9203902', 'Binalbagan', '09209', 'Huelgas@gmail.com', '09232', '2382382', 'Jeffrey Huelgas', '092329302', 'Huelgas@gmail.com', '902', 9, 3, 6, 92, '', '', '', '', '', 0, '2018-09-19', 'Huelgas@gmail.com', 'd752fb1bc687195cd92f3822a62230702e1c36ff', '$d>eiug9)61xkd(1!*n^r2e8!1@)yw)1', 1, 3, NULL, 'Sto. Rosario', 'Mirasol', NULL, '', '', '6745291');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application_form_amendment`
--

CREATE TABLE `tbl_application_form_amendment` (
  `ID` bigint(255) NOT NULL,
  `Application_form_ID` bigint(255) NOT NULL,
  `From_business_type_ID` int(11) DEFAULT NULL,
  `To_business_type_ID` int(11) DEFAULT NULL,
  `Cycle_ID` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_application_form_amendment`
--

INSERT INTO `tbl_application_form_amendment` (`ID`, `Application_form_ID`, `From_business_type_ID`, `To_business_type_ID`, `Cycle_ID`) VALUES
(1, 1, 1, 2, 2018),
(2, 2, 1, 2, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application_location_clearance_form`
--

CREATE TABLE `tbl_application_location_clearance_form` (
  `ID` bigint(255) NOT NULL,
  `Application_no` bigint(50) DEFAULT NULL,
  `Building_owner_ID` bigint(255) DEFAULT NULL,
  `Project_nature_ID` int(11) DEFAULT NULL,
  `Project_lot_area` double DEFAULT NULL,
  `Project_floor_area` double DEFAULT NULL,
  `Project_tenure_ID` int(11) DEFAULT NULL,
  `Capitalization` varchar(150) DEFAULT NULL,
  `Release_mode_ID` int(11) DEFAULT NULL,
  `Decision` varchar(150) NOT NULL,
  `Application_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `Date_of_inspection` date DEFAULT NULL,
  `Remarks` varchar(50) DEFAULT 'New',
  `Status` varchar(50) DEFAULT 'On Process',
  `Request_inspection` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_application_location_clearance_form`
--

INSERT INTO `tbl_application_location_clearance_form` (`ID`, `Application_no`, `Building_owner_ID`, `Project_nature_ID`, `Project_lot_area`, `Project_floor_area`, `Project_tenure_ID`, `Capitalization`, `Release_mode_ID`, `Decision`, `Application_date`, `Date_of_inspection`, `Remarks`, `Status`, `Request_inspection`) VALUES
(1, 1, 1, 1, 564, 54, 1, '85000', 3, '', '2018-06-06 16:24:45', '2018-06-18', 'New', 'On Process', 1),
(2, 2, 2, 1, 342, 32, 1, '30020', 3, '', '2018-06-06 16:34:19', '2018-05-10', 'New', 'On Process', 1),
(3, 3, 3, 1, 45, 23, 1, '25000', 3, '', '2018-06-06 16:56:01', '2018-06-09', 'New', 'On Process', 1),
(4, 4, 4, 1, 124, 21, 1, '85000', 3, '', '2018-06-11 11:37:07', NULL, 'New', 'On Process', 1),
(5, 5, 5, 1, 432, 23, 1, '250000', 3, '', '2018-06-14 10:55:27', NULL, 'New', 'On Process', 1),
(6, 6, 6, 3, 0, 0, 3, '', 4, 'Granted ', '2018-06-18 15:28:13', '2018-06-23', 'New', 'Approved', 1),
(7, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-06-18 15:55:10', NULL, 'New', 'On Process', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application_status`
--

CREATE TABLE `tbl_application_status` (
  `ID` int(11) NOT NULL,
  `Status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_application_status`
--

INSERT INTO `tbl_application_status` (`ID`, `Status`) VALUES
(1, 'NEW'),
(2, 'RENEWAL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assessment`
--

CREATE TABLE `tbl_assessment` (
  `ID` bigint(255) NOT NULL,
  `Cycle_ID` bigint(255) NOT NULL,
  `Date_assessed` datetime NOT NULL,
  `Assessed_by` varchar(65) NOT NULL,
  `Expiry` date NOT NULL,
  `Status` varchar(65) DEFAULT NULL,
  `Action_by` varchar(65) DEFAULT NULL,
  `Action_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assessment`
--

INSERT INTO `tbl_assessment` (`ID`, `Cycle_ID`, `Date_assessed`, `Assessed_by`, `Expiry`, `Status`, `Action_by`, `Action_date`) VALUES
(1, 1, '2018-09-11 13:41:00', 'Ruevan Banjibod', '2018-12-31', 'Approved', 'Ruevan T. Banjibod', '2018-09-11 13:43:56'),
(2, 2, '2018-09-11 13:52:49', 'Sandara Ting', '2018-12-31', 'Approved', 'Ruevan T. Banjibod', '2018-09-11 13:54:35'),
(3, 9, '2018-09-11 14:13:30', 'Ruevan Banjibod', '2018-12-31', 'Approved', 'Ruevan T. Banjibod', '2018-09-11 14:13:53'),
(4, 7, '2018-09-11 14:27:16', 'Sandara Ting', '2018-12-31', 'Approved', 'Ruevan T. Banjibod', '2018-09-11 14:45:07'),
(5, 3, '2018-09-11 14:38:26', 'Ruevan Banjibod', '2018-09-30', 'Approved', 'Ruevan T. Banjibod', '2018-09-11 14:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assessment_asset`
--

CREATE TABLE `tbl_assessment_asset` (
  `ID` int(10) NOT NULL,
  `Characteristics` varchar(65) NOT NULL,
  `Asset_size` varchar(65) NOT NULL,
  `Asset_from` bigint(65) NOT NULL,
  `Asset_to` bigint(65) DEFAULT NULL,
  `Num_of_workers` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_assessment_asset`
--

INSERT INTO `tbl_assessment_asset` (`ID`, `Characteristics`, `Asset_size`, `Asset_from`, `Asset_to`, `Num_of_workers`) VALUES
(1, 'Cottage', 'P500,000 and below', 1, 500000, '1-10'),
(2, 'Small', 'Over P500,000 to P5M', 500001, 5000000, '11-99'),
(3, 'Medium', 'Over P5M to P20M', 5000001, 20000000, '100-199'),
(4, 'Large', 'Over P20M', 20000001, 999999999999, '200 and above');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assessment_details`
--

CREATE TABLE `tbl_assessment_details` (
  `ID` bigint(255) NOT NULL,
  `Cycle_ID` bigint(255) NOT NULL,
  `Category_ID` int(10) NOT NULL,
  `Flammable` int(65) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_assessment_details`
--

INSERT INTO `tbl_assessment_details` (`ID`, `Cycle_ID`, `Category_ID`, `Flammable`) VALUES
(1, 1, 1, 0),
(2, 2, 1, 0),
(3, 6, 31, 0),
(4, 5, 2, 0),
(5, 5, 2, 0),
(6, 5, 2, 0),
(7, 5, 2, 0),
(8, 5, 2, 0),
(9, 5, 2, 0),
(10, 5, 2, 0),
(11, 5, 2, 0),
(12, 5, 2, 0),
(13, 5, 2, 0),
(14, 7, 24, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assessment_fees`
--

CREATE TABLE `tbl_assessment_fees` (
  `ID` bigint(255) NOT NULL,
  `Assessment_ID` bigint(255) NOT NULL,
  `Fee_name` varchar(120) NOT NULL,
  `Fee_category` varchar(65) NOT NULL,
  `Fee_status` varchar(65) DEFAULT NULL,
  `Fee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assessment_fees`
--

INSERT INTO `tbl_assessment_fees` (`ID`, `Assessment_ID`, `Fee_name`, `Fee_category`, `Fee_status`, `Fee`) VALUES
(1, 1, 'Beach Resort - Mayor\'s Permit', 'Regulatory Fee', 'NEW', 500),
(2, 1, 'Miscellaneous-Business', 'Regulatory Fee', NULL, 40),
(3, 1, 'Business Tax Clearance', 'Regulatory Fee', NULL, 175),
(4, 1, 'Zonal Permit Fee', 'Regulatory Fee', NULL, 100),
(5, 1, 'Health Fee', 'Regulatory Fee', NULL, 120),
(6, 1, 'Solid Waste Management Fee', 'Other Charge', NULL, 1200),
(7, 1, 'Sanitary Fee', 'Other Charge', NULL, 600),
(8, 1, 'Electrical Fee', 'Other Charge', NULL, 420),
(9, 2, 'Beer House - Mayor\'s Permit', 'Regulatory Fee', 'NEW', 400),
(10, 2, 'Miscellaneous-Business', 'Regulatory Fee', NULL, 40),
(11, 2, 'Business Tax Clearance', 'Regulatory Fee', NULL, 175),
(12, 2, 'Zonal Permit Fee', 'Regulatory Fee', NULL, 100),
(13, 2, 'Health Fee', 'Regulatory Fee', NULL, 200),
(14, 2, 'Solid Waste Management Fee', 'Other Charge', NULL, 1200),
(15, 2, 'Sanitary Fee', 'Other Charge', NULL, 600),
(16, 2, 'Electrical Fee', 'Other Charge', NULL, 530),
(17, 3, 'Soft Drinks Retailer - Mayor\'s Permit', 'Regulatory Fee', 'NEW', 200),
(18, 3, 'Miscellaneous-Business', 'Regulatory Fee', NULL, 40),
(19, 3, 'Business Tax Clearance', 'Regulatory Fee', NULL, 175),
(20, 3, 'Zonal Permit Fee', 'Regulatory Fee', NULL, 100),
(21, 3, 'Health Fee', 'Regulatory Fee', NULL, 80),
(22, 3, 'Solid Waste Management Fee', 'Other Charge', NULL, 360),
(23, 3, 'Sanitary Fee', 'Other Charge', NULL, 200),
(24, 4, 'Miscellaneous-Business', 'Regulatory Fee', NULL, 40),
(25, 4, 'Business Tax Clearance', 'Regulatory Fee', NULL, 175),
(26, 4, 'Zonal Permit Fee', 'Regulatory Fee', NULL, 100),
(27, 4, 'Health Fee', 'Regulatory Fee', NULL, 160),
(28, 4, 'Solid Waste Management Fee', 'Other Charge', NULL, 360),
(29, 4, 'Sanitary Fee', 'Other Charge', NULL, 500),
(30, 5, 'Barber Shop & Beauty Salon', 'Business Tax', 'RENEW', 1452),
(31, 5, 'Barber Shop & Beauty Salon - Mayor\'s Permit', 'Regulatory Fee', 'RENEW', 400),
(32, 5, 'Miscellaneous-Business', 'Regulatory Fee', NULL, 40),
(33, 5, 'Business Tax Clearance', 'Regulatory Fee', NULL, 175),
(34, 5, 'Zonal Permit Fee', 'Regulatory Fee', NULL, 100),
(35, 5, 'Health Fee', 'Regulatory Fee', NULL, 120),
(36, 5, 'Solid Waste Management Fee', 'Other Charge', NULL, 360),
(37, 5, 'Sanitary Fee', 'Other Charge', NULL, 300),
(38, 5, 'Electrical Fee', 'Other Charge', NULL, 335);

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barangay`
--

CREATE TABLE `tbl_barangay` (
  `ID` bigint(255) NOT NULL,
  `Barangay` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barangay`
--

INSERT INTO `tbl_barangay` (`ID`, `Barangay`) VALUES
(1, 'Barangay Zone 1'),
(2, 'Barangay Zone 2'),
(3, 'Barangay Zone 3'),
(4, 'Barangay Zone 4'),
(5, 'Barangay Zone 5'),
(6, 'Barangay Zone 6'),
(7, 'Barangay Andres Bonifacio'),
(8, 'Barangay Banquerohan'),
(9, 'Barangay Burgos'),
(10, 'Barangay Cabahug'),
(11, 'Barangay Caduha-an'),
(12, 'Barangay Celestino Villacin'),
(13, 'Barangay Daga'),
(14, 'Barangay V. F. Gustilo'),
(15, 'Barangay Jerusalem'),
(16, 'Barangay Luna'),
(17, 'Barangay Mabini'),
(18, 'Barangay Magsaysay'),
(19, 'Barangay Sicaba'),
(20, 'Barangay Tinampa-an');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_billing_fees`
--

CREATE TABLE `tbl_billing_fees` (
  `ID` bigint(255) NOT NULL,
  `Assessment_ID` bigint(255) NOT NULL,
  `Qtr` int(10) NOT NULL,
  `Line_of_business` varchar(65) NOT NULL,
  `Due_date` date NOT NULL,
  `Balance` float NOT NULL,
  `Discount` float NOT NULL,
  `Surcharge` float NOT NULL,
  `Interest` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_billing_fees`
--

INSERT INTO `tbl_billing_fees` (`ID`, `Assessment_ID`, `Qtr`, `Line_of_business`, `Due_date`, `Balance`, `Discount`, `Surcharge`, `Interest`) VALUES
(1, 5, 1, 'Barber Shop & Beauty Salon', '2018-01-20', 363, 0, 90.75, 81.68),
(2, 5, 2, 'Barber Shop & Beauty Salon', '2018-04-20', 363, 0, 90.75, 54.45),
(3, 5, 3, 'Barber Shop & Beauty Salon', '2018-07-20', 363, 0, 90.75, 27.23),
(4, 5, 4, 'Barber Shop & Beauty Salon', '2018-10-20', 363, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_building_owner`
--

CREATE TABLE `tbl_building_owner` (
  `ID` bigint(255) NOT NULL,
  `U_ID` varchar(60) NOT NULL,
  `First_name` varchar(30) DEFAULT NULL,
  `Last_name` varchar(20) DEFAULT NULL,
  `Address_street` varchar(50) DEFAULT NULL,
  `Address_zone` varchar(150) DEFAULT NULL,
  `Address_purok` varchar(150) DEFAULT NULL,
  `Address_barangay` varchar(150) NOT NULL,
  `Address_city` varchar(150) NOT NULL,
  `Address_province` varchar(150) NOT NULL,
  `Building_name` varchar(255) NOT NULL,
  `Name_corporation` varchar(45) DEFAULT NULL,
  `Address_corporation` varchar(255) DEFAULT NULL,
  `Authorized_representative_ID` bigint(255) NOT NULL,
  `Project_type` varchar(150) NOT NULL,
  `Project_address` varchar(255) DEFAULT NULL,
  `Right_over_land_ID` int(11) DEFAULT NULL,
  `Date_registered` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_building_owner`
--

INSERT INTO `tbl_building_owner` (`ID`, `U_ID`, `First_name`, `Last_name`, `Address_street`, `Address_zone`, `Address_purok`, `Address_barangay`, `Address_city`, `Address_province`, `Building_name`, `Name_corporation`, `Address_corporation`, `Authorized_representative_ID`, `Project_type`, `Project_address`, `Right_over_land_ID`, `Date_registered`) VALUES
(1, '840b22be052f1d2e568476b9cba1e27079b0af51', 'Tito ', 'Torreblanca ', 'Gustilo st.', 'Zone 2', 'Purok 3', 'Barangay 2 Pob.', 'Cadiz City', 'Negros Occidental', 'JS Building', ' Standard Insurance Co. ', ' Lacson st. corner Galo st. Bacolod City ', 1, ' Insurance', ' Gustilo BLVD. Brgy 1. (LTO)', 1, '2018-06-06 00:00:00'),
(2, '9c964efb31d54873eb7cb887b515d9f24f97988e', 'Eva', 'Torno', 'Santan St. ', 'Zone 1', 'Purok 2', 'Barangay 2 Pob.', 'Cadiz City', 'Negros Occidental', 'Teresita Bldg', ' Eatery ', 'DelaSalle St. Brgy. 2, Cadiz City ', 2, ' Eatery ', ' Gustilo BLVD. Brgy 1. (LTO)', 1, '2018-06-06 00:00:00'),
(3, '8e6a0ab63dcc760118dffc536af50ddac7fd80f0', 'Michael ', 'Abanil ', 'Galo St. ', 'Zone 4', 'Purok 3', 'Barangay 2 Pob.', 'Cadiz City', 'Negros Occidental', 'O Hotel Building  ', ' Michael Vulcanizing ', ' Santan St. Brgy 2. Cadiz City ', 3, ' Vulcanizing Shop ', 'Cabahug St. Brgy 2.  ', 1, '2018-05-06 00:00:00'),
(4, '8d0c938d51ea34ae173e52cee4920abbaab0dde9', 'Tito ', 'Flores', 'Lacson St. ', 'Zone 5', 'Purok 2', 'Barangay Cabahug', 'Cadiz City', 'Negros Occidental', 'Benilde', ' M\'c Insurance Corp.', ' Santan St. Brgy 2. Cadiz City', 4, ' Insurance ', ' Lacosn St. Brgy. 4, Cadiz City ', 1, '2018-06-11 11:37:00'),
(5, 'a303c411440744f88babfc0c5097d9686b13f02b', 'Jenel ', 'Dequina', 'Galo St. ', 'Zonr 3', 'Purok 2', 'Barangay Luna', 'Cadiz City', 'Negros Occidental', ' Jam Buildling ', ' Crave Ads Software Dev. ', ' Lacson St. corner galo st. Bacolod City ', 5, ' Software Development ', 'Lacson St. corner Rizal St. Bacolod City ', 1, '2018-06-14 10:55:18'),
(6, 'ee1b8a31304ff6eb05034ab1d58c778cdb7e517a', 'Joselas', 'Borromeo', 'Mabini St. ', NULL, 'Purok 2', 'Barangay Luna', 'Cadiz City', 'Province', ' dasasd', ' das', ' dsad', 6, ' sdad', ' dasda', 3, '2018-06-18 15:27:44'),
(7, 'd6442a36d1241cf628ec3beb20f5fe29b89732e9', 'tertre', 'erte', 'tert', NULL, 'Purok', 'Barangay', 'City', 'Province', ' ', ' ', ' ', 7, ' ', ' ', NULL, '2018-06-18 15:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_business_activity`
--

CREATE TABLE `tbl_business_activity` (
  `ID` bigint(255) NOT NULL,
  `Application_form_ID` bigint(255) NOT NULL,
  `Business_line` varchar(55) DEFAULT NULL,
  `No_of_units` int(11) DEFAULT NULL,
  `Capitalization` double DEFAULT NULL,
  `Essential` int(11) DEFAULT NULL,
  `Non_essential` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_business_line`
--

CREATE TABLE `tbl_business_line` (
  `ID` bigint(255) NOT NULL,
  `ParentID` bigint(255) DEFAULT NULL,
  `Description` varchar(120) DEFAULT NULL,
  `Essential` smallint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_business_line`
--

INSERT INTO `tbl_business_line` (`ID`, `ParentID`, `Description`, `Essential`) VALUES
(1, 0, 'Amusement', 0),
(2, 0, 'Dealer', 0),
(3, 0, 'Financial', 0),
(4, 0, 'Food Establishment', 0),
(5, 0, 'Manufacturer', 0),
(6, 0, 'Other', 0),
(7, 0, 'Producer', 0),
(8, 0, 'Retailer', 0),
(9, 0, 'Service', 0),
(10, 0, 'Wholesaler', 0),
(11, 1, 'Beach Resort', 0),
(12, 1, 'Billiard Pool', 0),
(13, 1, 'Bingo Millions Encoding & Betting Station', 0),
(14, 1, 'Bowlin Center', 0),
(15, 1, 'Gaming Station', 0),
(16, 1, 'Internet Café', 0),
(17, 1, 'Nature/ Educational Park', 0),
(18, 1, 'Night & Day Clubs', 0),
(19, 1, 'Resort', 0),
(20, 1, 'Swimming Pool', 0),
(21, 1, 'Video Games', 0),
(22, 1, 'Videoke', 0),
(23, 1, 'Videoke and Games', 0),
(24, 2, 'Cignal Units Dealer', 0),
(25, 2, 'Computer Supplies Dealer', 0),
(26, 2, 'Construction Supplies & Hardware Dealer', 0),
(27, 2, 'Diesel ', 0),
(28, 2, 'Diesel Max', 0),
(29, 2, 'Drilling Equipment Dealer', 0),
(30, 2, 'Dry Goods Dealer', 0),
(31, 2, 'Excellium(PROTEC)', 0),
(32, 2, 'Extra Advance (REGULAR GASOLINE)', 0),
(33, 2, 'Filters & Spareparts Dealer', 0),
(34, 2, 'Fire Extinguisher Refill', 0),
(35, 2, 'Houseware Dealer', 0),
(36, 2, 'I.T Products & Supplies Dealer', 0),
(37, 2, 'Kerosene', 1),
(38, 2, 'Liquid Petroleum Dealer', 0),
(39, 2, 'Lubricants Dealer', 0),
(40, 2, 'Motor Oil Dealer', 0),
(41, 2, 'Premium Gasoline', 0),
(42, 2, 'Regular Gasoline', 0),
(43, 2, 'Sand & Gravel Dealer(Extraction)', 0),
(44, 2, 'Tires & Spareparts', 0),
(45, 2, 'Unleaded Gasoline', 0),
(46, 3, 'Banking', 0),
(47, 3, 'Banking & Finance', 0),
(48, 3, 'Financing / Lending', 0),
(49, 3, 'Lending (Mobile)', 0),
(50, 3, 'Lending (Satellite Office Only)', 0),
(51, 3, 'Lending Investor', 0),
(52, 3, 'Micro Credit Financing', 0),
(53, 3, 'Micro Finance', 0),
(54, 3, 'Micro Finance (Cooperative)', 0),
(55, 3, 'Micro Finance(NGO-Facilitator)', 0),
(56, 3, 'Micro Lending', 0),
(57, 3, 'Money Lending', 0),
(58, 3, 'Pawnshop', 0),
(59, 4, 'Cafeteria & Refreshment', 0),
(60, 4, 'Coffee Shop', 0),
(61, 4, 'Eatery', 0),
(62, 4, 'Fast Food Chain', 0),
(63, 4, 'Fruit Shake Stand', 0),
(64, 4, 'Refreshment', 0),
(65, 4, 'Restaurant', 0),
(66, 4, 'Restobar', 0),
(67, 4, 'Snack House', 0),
(68, 5, 'Agriculture Farming', 1),
(69, 5, 'Aquaculture', 1),
(70, 5, 'Bakery', 0),
(71, 5, 'Buko Pie', 0),
(72, 5, 'Cacao Producer', 0),
(73, 5, 'Coffin Manufacturer', 0),
(74, 5, 'Crab Meat Processing', 1),
(75, 5, 'Dried Fish Box Maker', 1),
(76, 5, 'Dried Fish Processor', 1),
(77, 5, 'Drug Manufacturer', 1),
(78, 5, 'Fabricator of Chippers/ Shredder', 0),
(79, 5, 'Fishpond', 0),
(80, 5, 'Frozen Foods Manufacturer', 1),
(81, 5, 'Hog Raising', 0),
(82, 5, 'Hollow Blocks Manufacturer', 1),
(83, 5, 'Ice cream Manufacturer', 0),
(84, 5, 'Ice Plant', 0),
(85, 5, 'Lumpia Wrapper Maker', 0),
(86, 5, 'Maker of Concrete Arts', 0),
(87, 5, 'Manufacturer of Fire Safety Products', 0),
(88, 5, 'Nipa Hut Manufacturer', 0),
(89, 5, 'Organic Liquid Fertilizer Manufacturer', 1),
(90, 5, 'Piggery', 1),
(91, 5, 'Poultry', 1),
(92, 5, 'Poultry Feeds Manufacturer', 1),
(93, 5, 'Power Generation,Collection & Distribution Electricity', 1),
(94, 5, 'Sinamak Processor', 1),
(95, 5, 'Smoked Fish Processor', 1),
(96, 5, 'Soap Manufacturer', 1),
(97, 5, 'SoftDrinks Processor', 0),
(98, 5, 'Sugar Farming', 1),
(99, 5, 'Vinegar Processor', 1),
(100, 6, 'Billiard', 0),
(101, 6, 'Bio Diesel', 0),
(102, 6, 'Boron', 1),
(103, 6, 'Citronella Farm', 1),
(104, 6, 'Credit Cooperative', 0),
(105, 6, 'Educational Institution', 0),
(106, 6, 'Educational Institution (Non Stocks/Non Profit)', 0),
(107, 6, 'Educational Institution (Pre-School)', 0),
(108, 6, 'Educational Institution(Private Pre School & Elementary School', 0),
(109, 6, 'Farming Management', 1),
(110, 6, 'Fish Coral', 1),
(111, 6, 'Fish Mill', 1),
(112, 6, 'Foundation ( Social works W/o Accomation', 0),
(113, 6, 'Loans', 0),
(114, 6, 'Lubes Gasoline', 0),
(115, 6, 'Mass Display', 0),
(116, 6, 'Peddler', 0),
(117, 6, 'Pumpboat', 0),
(118, 6, 'Pushcart Operator', 0),
(119, 6, 'Signage', 0),
(120, 6, 'Storage of Flammable Substance', 0),
(121, 6, 'Streamers', 0),
(122, 6, 'WareHouse', 0),
(123, 7, 'Sea Foods Traiding Dealer', 1),
(124, 8, 'Accessories Retailer', 0),
(125, 8, 'Agri-Chemical Products Retailer (Buy & Cell)', 1),
(126, 8, 'Agricultural Farm Supplies Retailer', 1),
(127, 8, 'Appliances Retailer', 0),
(128, 8, 'Art Material Retailer', 0),
(129, 8, 'Auto Parts Supply Retailer', 0),
(130, 8, 'Bago-ong & Salt Retailer', 1),
(131, 8, 'Baked Food Products Retailer', 1),
(132, 8, 'Balut', 1),
(133, 8, 'Bamboo Craft Retailer', 0),
(134, 8, 'Bamboo Strips & Nipa Retailer', 0),
(135, 8, 'Banana & Root Crops Retailer', 1),
(136, 8, 'Banana & Spices  Retailer', 1),
(137, 8, 'Banana and Cassava Retailer', 1),
(138, 8, 'Beauty Products & Accesories Retailer', 0),
(139, 8, 'Beauty Products Retailer', 0),
(140, 8, 'Beer Retailer', 1),
(141, 8, 'Bicycle Accessories Retaileer', 0),
(142, 8, 'Book Store', 1),
(143, 8, 'Boutique', 0),
(144, 8, 'Bread & Pastries Retailer', 1),
(145, 8, 'Burger House', 1),
(146, 8, 'Buy & Sell of Dried Sea Cucumber ', 1),
(147, 8, 'Buy & Sell of Generic Medicine', 1),
(148, 8, 'Buy & Sell of Kitchenwares', 0),
(149, 8, 'Buy & Sell of Medical Supplies', 0),
(150, 8, 'Buy & Sell of Spareparts', 0),
(151, 8, 'Cakes & Pastries Retailer', 1),
(152, 8, 'Canteen', 1),
(153, 8, 'Car Care Products Retailer', 0),
(154, 8, 'Cellphone Loading Station', 0),
(155, 8, 'Cellphone Units & Retailer', 0),
(156, 8, 'Cellphone, Digital Units, Cell cards & Accessories Retailer', 0),
(157, 8, 'Cement Retailer', 1),
(158, 8, 'Charcoal Retailer', 0),
(159, 8, 'Chicherias Retailer', 0),
(160, 8, 'Chicken Joy Retailer', 0),
(161, 8, 'Cigarrete Retailer', 0),
(162, 8, 'Coco Lumber Retailer', 0),
(163, 8, 'Coconut Graine Retailer', 0),
(164, 8, 'Coffee Retailer', 0),
(165, 8, 'Computer Accessories, Eng\'r Arts Supplies Retailer', 0),
(166, 8, 'Compute Hardware & Software & Office Supplies Retailer', 0),
(167, 8, 'Computer Supplies Retailer', 0),
(168, 8, 'Construction Supplies & Materials Dealer', 0),
(169, 8, 'Convenience Store', 0),
(170, 8, 'Corn Retailer', 1),
(171, 8, 'Cosmetics Products Retailer', 0),
(172, 8, 'Cycle Parts Retailer', 0),
(173, 8, 'Dressed Chicken Retailer', 0),
(174, 8, 'Dried Fish Retailer', 1),
(175, 8, 'Drug Store', 1),
(176, 8, 'Dry Goods Retailer', 1),
(177, 8, 'Egg Retailer', 1),
(178, 8, 'Electrical  Supplies Retailer', 0),
(179, 8, 'E-Loading', 0),
(180, 8, 'Fancy Jewelries & Accessories Retailer', 0),
(181, 8, 'Fertilizer Retailer', 1),
(182, 8, 'Firewood & Charcoal Retailer', 0),
(183, 8, 'Fish and Spices Retailer', 1),
(184, 8, 'Flower Shop', 0),
(185, 8, 'Foam Retailer', 0),
(186, 8, 'Food Enterprise', 0),
(187, 8, 'Food Retailer (Dimsun,Mami,& Rice Meal)', 1),
(188, 8, 'Foods Stand (Burger, French Fries,Hotdogs, Siomai & Siopao)', 0),
(189, 8, 'Food Stand (Dough Nut)', 0),
(190, 8, 'Food Stand (Ngohiong, Sioami, Siopao,Rice Meal)', 0),
(191, 8, 'Food Stand( Shawarma)', 1),
(192, 8, 'Food Supply Retailer', 0),
(193, 8, 'Frozen Food & Meat Foods Retailer', 1),
(194, 8, 'Fruit (Buko) Retailer', 0),
(195, 8, 'Fruit Retailer', 0),
(196, 8, 'Fruit Shake & Fruit Juice Stand', 0),
(197, 8, 'Fruit Vendor', 0),
(198, 8, 'Fruits & Rootcrops Retailer', 0),
(199, 8, 'Gas & Acetylene Retailer', 1),
(200, 8, 'General Merchandise Retailer (RTW,Shoes & Housewarees)', 0),
(201, 8, 'General Merchandise-Essen- Retailer', 0),
(202, 8, 'Gift Shop', 0),
(203, 8, 'Glass Aluminum & Steel Works Retailer', 0),
(204, 8, 'Good Lumber Retailer', 0),
(205, 8, 'Groceries -Essential (COOP.)', 0),
(206, 8, 'Groceries-Non Essential (Coop)', 0),
(207, 8, 'Hardware & Electrical Supplies Retailer', 0),
(208, 8, 'Health Products Retailer', 0),
(209, 8, 'Hollow Blocks Retailer', 0),
(210, 8, 'Home Furniture & Office Supplies', 0),
(211, 8, 'Home, Office Equipment & Accessories Retailer', 0),
(212, 8, 'Homecare & Beauty Products Retailer', 0),
(213, 8, 'Honey Retailer', 0),
(214, 8, 'Houseware & Kitchenware Retailer', 0),
(215, 8, 'Ice cream Retailer', 0),
(216, 8, 'Ice Retailer', 0),
(217, 8, 'Ice scramble,Chicherias, Salt & Spices Retailer', 0),
(218, 8, 'Jewelry Store', 0),
(219, 8, 'JunkFoods Retailer', 0),
(220, 8, 'Kitchenware & Plasticware Retailer', 1),
(221, 8, 'Laboratory & Medical Supplies Retailer', 1),
(222, 8, 'Leather & Metal Craft Retailer', 1),
(223, 8, 'Liquified Petroleum Retailer', 1),
(224, 8, 'Liquor Retailer(Foregn/Domistics', 0),
(225, 8, 'Lubricating Oils & Oil by Products', 0),
(226, 8, 'Lumpia Wrapper Retailer', 0),
(227, 8, 'Mat Retailer', 0),
(228, 8, 'Meat Retailer', 1),
(229, 8, 'Medical Supplement Retailer', 1),
(230, 8, 'Mini-Mart', 0),
(231, 8, 'Motor Parts & Accessories Retailer', 0),
(232, 8, 'Motorcycle & Tricycle Parts  Parts Retailer', 0),
(233, 8, 'Motorcycle Parts  & Automotive Supply Retailer ', 0),
(234, 8, 'Musical Instruments Retailer', 0),
(235, 8, 'Native Products  Retailer ', 0),
(236, 8, 'Needle & Tailored Accessories Retailer', 0),
(237, 8, 'News Paper & Magazine Stand', 0),
(238, 8, 'Nipas Shingle Retailer', 0),
(239, 8, 'Novelty Items Retailer', 0),
(240, 8, 'Office Supplies & School Uniform Retailer', 1),
(241, 8, 'Office Supplies  Retailer', 0),
(242, 8, 'Oil Lubricant Retailer', 0),
(243, 8, 'Paint Materials Retailer', 0),
(244, 8, 'Party Shop', 0),
(245, 8, 'Pasalubong Center', 0),
(246, 8, 'Pastries Retailer', 1),
(247, 8, 'Peanut Retailer', 0),
(248, 8, 'Pet Shop & Koi Land', 1),
(249, 8, 'Petroleum Gas Accessories', 1),
(250, 8, 'Petroleum  Retailer', 1),
(251, 8, 'Pharmacy', 1),
(252, 8, 'Photocopier Parts Retailer', 0),
(253, 8, 'Pineapple Retailer', 0),
(254, 8, 'Pizza Stand', 0),
(255, 8, 'Plastic & Kitchen wares Repair', 0),
(256, 8, 'Plasticware & Glassware Retailer', 0),
(257, 8, 'Plasticware & Native Poducts', 0),
(258, 8, 'Pork & Beef Retailer', 1),
(259, 8, 'Pork & Beef Retailer', 1),
(260, 8, 'Pork and Meat Supply Retailer', 1),
(261, 8, 'Potato Corner', 0),
(262, 8, 'Potted plants Veterenary Products Retailer', 0),
(263, 8, 'Puto Repair', 0),
(264, 8, 'Quarry Retailer', 0),
(265, 8, 'Refilling Fuel Station', 0),
(266, 8, 'Religious Articles Retailer', 0),
(267, 8, 'Retail of Pharmaceutical & Medical Supplies', 1),
(268, 8, 'Retailer Appliances', 0),
(269, 8, 'Retailer of Construction Supplies', 1),
(270, 8, 'Retailer of Diswashing Soap & Fabric  Conditioner', 1),
(271, 8, 'Retailer of Hardware Supply', 0),
(272, 8, 'Retailer of Optical Goods', 0),
(273, 8, 'Retailer of Organic Food Supplements', 1),
(274, 8, 'Retailer of RTW Clothing, Food wear & Leather Goods', 0),
(275, 8, 'Retailer of Tricycle Bearing Parts', 0),
(276, 8, 'Rice & Corn Retailer', 1),
(277, 8, 'Roasted Chicken & Oil Retailer', 0),
(278, 8, 'Root Crops Retailer', 1),
(279, 8, 'RTW & Cellphone Accessories Retailer', 0),
(280, 8, 'RTW & Used Clothing', 0),
(281, 8, 'RTW, Footwear and Cellphone Accessories Retailer ', 0),
(282, 8, 'Rubber Slippers Retailer', 0),
(283, 8, 'Salt & Spices Retailer', 0),
(284, 8, 'Sand & Gravel Retailer', 0),
(285, 8, 'Sand & Gravel Retailer (Buy & Sell)', 0),
(286, 8, 'Sari-sari Store (Consumers\' Coop)', 0),
(287, 8, 'School & Office Supplies Retailer', 1),
(288, 8, 'School  Supplies Retailer', 1),
(289, 8, 'Seafoods Retailer (Buy & Sell)', 0),
(290, 8, 'Seasonal Items Retailer', 0),
(291, 8, 'Selling of Massage Products ', 0),
(292, 8, 'Selling of Telephone Lines & Broadbands', 0),
(293, 8, 'Sewing Needs, Rtw & Cosmetics Retailer', 0),
(294, 8, 'Shoes Retailer', 0),
(295, 8, 'Soap Retailer', 1),
(296, 8, 'Soft Drinks Retailer', 0),
(297, 8, 'Spareparts Retailer', 0),
(298, 8, 'Spices Retailer & Fish Vendor', 0),
(299, 8, 'Sports Equipments Dealer', 0),
(300, 8, 'Stock Room', 0),
(301, 8, 'Sugarcane juice Retailer', 0),
(302, 8, 'Tailored Accessories Retailer', 0),
(303, 8, 'Textbook Retailer', 0),
(304, 8, 'Tire, Batteries & Car Accessories ', 0),
(305, 8, 'Tobbaco Leaf Retailer', 0),
(306, 8, 'Trading of Construction MATERIALS & Supplies', 0),
(307, 8, 'Used Clothing ', 0),
(308, 8, 'Variety Store', 0),
(309, 8, 'Vegetables & Spices Retailer', 0),
(310, 8, 'Vegetables & Roofcrops Retailer', 0),
(311, 8, 'Vehicle Parts & Accessories Retailer', 0),
(312, 8, 'Vendo Mchine (Orange Products)', 0),
(313, 8, 'Veternary Retailer', 0),
(314, 8, 'Vinegar Retailer', 0),
(315, 8, 'Water Refilling Accessories Retailer', 0),
(316, 8, 'Wine & Liquors Retailer', 0),
(317, 8, 'Wood & Bamboo Craft Retailer', 0),
(318, 9, '30 MV Coal-Fired Power Plant', 0),
(319, 9, '50 MW Solar Power Plant ', 0),
(320, 9, 'Advertising Signages', 0),
(321, 9, 'Air & Sea Ticketing', 0),
(322, 9, 'Airvision Electronics, Refrigeration,& Aircondition Repair Shop', 0),
(323, 9, 'Apartment', 0),
(324, 9, 'Appliances Retailer', 0),
(325, 9, 'Appliances Repair Shop', 0),
(326, 9, 'Arts & Prints Services', 0),
(327, 9, 'Auto Repair Shop', 0),
(328, 9, 'Barber Shop & Beauty Salon', 0),
(329, 9, 'Batchoyan', 0),
(330, 9, 'Battery Storage and Supply', 0),
(331, 9, 'Bayad Center', 0),
(332, 9, 'Beauty Salon & Spa', 0),
(333, 9, 'Beer House', 0),
(334, 9, 'Bills Payment Services', 0),
(335, 9, 'Boarding House', 0),
(336, 9, 'Bookeeping Services', 0),
(337, 9, 'Booking Office Of Petroleum Products', 0),
(338, 9, 'Brake Bonding Services', 0),
(339, 9, 'Broadcasting', 0),
(340, 9, 'Bus Terminal', 0),
(341, 9, 'Cable Station', 0),
(342, 9, 'Caldohan', 0),
(343, 9, 'Canopy for rent', 0),
(344, 9, 'Car Repair Services', 0),
(345, 9, 'Car Wash', 0),
(346, 9, 'Cargo Forwarder', 0),
(347, 9, 'CarGO, Courier Services & Money Remittances', 0),
(348, 9, 'Carinderia', 0),
(349, 9, 'Catering ', 0),
(350, 9, 'Cell Site Tower', 0),
(351, 9, 'Cellphone Repair Shop', 0),
(352, 9, 'Chainsaw Repair Shop', 0),
(353, 9, 'Clinical Laboratory', 1),
(354, 9, 'Coconut Grinder', 0),
(355, 9, 'Computer Printings Services', 0),
(356, 9, 'Computer Mixer Rental', 0),
(357, 9, 'Construction & Installation of Solar System', 0),
(358, 9, 'Contractor Labor Services (Pakyaw System)', 0),
(359, 9, 'Coopeartive (Credit & Consumer)', 0),
(360, 9, 'Courier & Carg forwarding Services', 0),
(361, 9, 'Cut & Load Sugarcane/ Cultivation (Pakyaw System)', 0),
(362, 9, 'Dance Hall', 0),
(363, 9, 'Deepwell Drilling Services', 0),
(364, 9, 'Delivery Van & Truck ', 0),
(365, 9, 'Dental Clinic', 1),
(366, 9, 'Desktop Printing & I.D Lamination', 0),
(367, 9, 'Diagnostic Center', 1),
(368, 9, 'Digital print &  Ink Refilling Center', 1),
(369, 9, 'Digital Printing Services', 0),
(370, 9, 'Dress Shop & Gown Rental', 0),
(371, 9, 'Drilling Services', 0),
(372, 9, 'Drug Testing', 0),
(373, 9, 'Eatery & Catering Services', 0),
(374, 9, 'Educational Park', 0),
(375, 9, 'Electric Power Supply', 0),
(376, 9, 'Embalming', 0),
(377, 9, 'Emission Testing Center', 0),
(378, 9, 'Engineering Services, Planning,Supervision & Design Works', 0),
(379, 9, 'Event Organizing Services', 0),
(380, 9, 'Facility Office', 0),
(381, 9, 'Family Planning Clinic', 0),
(382, 9, 'Fiber Glass Fabrication (Motorcycle Fender)', 0),
(383, 9, 'Financing(Coop)', 0),
(384, 9, 'Fitness Gym', 0),
(385, 9, 'Floating Bar ', 1),
(386, 9, 'Food Catering', 0),
(387, 9, 'Foreign Exchange & Money Changer', 0),
(388, 9, 'Freight forwardiing Services.Courier, Money Remittance', 0),
(389, 9, 'Funeral Car', 0),
(390, 9, 'Funeral Parlor', 0),
(391, 9, 'Gown & Toga Rental', 0),
(392, 9, 'Grains & Coconut Refinery', 0),
(393, 9, 'Gym', 0),
(394, 9, 'Hauling / Delivery Services', 0),
(395, 9, 'Health Services', 1),
(396, 9, 'Holding Company', 0),
(397, 9, 'Hotel ', 0),
(398, 9, 'Ice cream Parlor ', 0),
(399, 9, 'Independent Power Producer (Office)', 0),
(400, 9, 'Installation of Glass & Aluminum Services', 0),
(401, 9, 'Installation of Telephone Lines & Broadbands Services', 0),
(402, 9, 'Internet Connection Installer', 0),
(403, 9, 'Janitorial & Man Power Services', 0),
(404, 9, 'Jewelry Repair Shop', 0),
(405, 9, 'Laboratory & Diagnostic Center', 0),
(406, 9, 'Lamination', 1),
(407, 9, 'Laundry Shop', 1),
(408, 9, 'Lending (Coop)', 0),
(409, 9, 'Liaison Services', 0),
(410, 9, 'Life Plan Insurance ', 0),
(411, 9, 'Lodging House', 0),
(412, 9, 'Machine Shop', 0),
(413, 9, 'Making Invitation & Documentation of Events', 0),
(414, 9, 'Manning Services', 0),
(415, 9, 'Manpower Services ', 0),
(416, 9, 'Marketing Agent (Herbal- Nutritional Food Services)', 0),
(417, 9, 'Massage Therapeutic Clinic', 1),
(418, 9, 'Maternity Clinic', 1),
(419, 9, 'Medical Clinic', 1),
(420, 9, 'Medical Transport', 1),
(421, 9, 'Memorial Park', 0),
(422, 9, 'Memorial Plan (Directing selling)', 0),
(423, 9, 'Memorial Plan(Reselling & Finance)', 0),
(424, 9, 'Messengerial Services', 0),
(425, 9, 'Money Remittance', 0),
(426, 9, 'Motor Services', 0),
(427, 9, 'Motorcycle Service Center', 0),
(428, 9, 'Non-Life Insurance Agent', 0),
(429, 9, 'Operation& Maintenance of Solar Plant', 0),
(430, 9, 'Optical & Dental Clinic', 1),
(431, 9, 'Party Needs & Pocket Books  Rental', 0),
(432, 9, 'Pension House', 0),
(433, 9, 'Photo Studio, Graphic Solutions & Digital Printings Services', 0),
(434, 9, 'Photocopier, Lamination, Fax Gift Wrapping Services', 0),
(435, 9, 'Piso Net', 0),
(436, 9, 'Pizza House', 0),
(437, 9, 'Post Paid Plan & Globe Payment Services', 0),
(438, 9, 'Printing Services', 0),
(439, 9, 'Private Cemeteries', 0),
(440, 9, 'Processing , Lay-out & Installation of Elec. Permit & Motorcyle Repair', 0),
(441, 9, 'Real Estate Developer', 0),
(442, 9, 'Recapping', 0),
(443, 9, 'Recrutting Agency ', 0),
(444, 9, 'Refrigeration and Airconditioning Repair Shop', 0),
(445, 9, 'Remittance Agent', 0),
(446, 9, 'Repair & Maintenance Services', 0),
(447, 9, 'Repair of Water Refilling Equipment', 0),
(448, 9, 'Repair Services (Vehicle)', 0),
(449, 9, 'Research and Development Review Center ', 0),
(450, 9, 'Rewinding Electrical Shop', 0),
(451, 9, 'Ric Grinder', 0),
(452, 9, 'Ripping Services', 0),
(453, 9, 'Salon & Spa', 0),
(454, 9, 'Sea Transport', 0),
(455, 9, 'Security Agency ', 0),
(456, 9, 'ShipBuilding and Repair ', 0),
(457, 9, 'Snack Bar', 0),
(458, 9, 'Steel Works Services', 0),
(459, 9, 'Sugarcane Transloading Station', 1),
(460, 9, 'Surveying Services', 1),
(461, 9, 'Tailoring Shop', 0),
(462, 9, 'Technical Office', 0),
(463, 9, 'Telecom Services', 0),
(464, 9, 'Tent Rental', 0),
(465, 9, 'Ticketing & Booking Sales Outlet', 0),
(466, 9, 'Ticketing Outlet', 0),
(467, 9, 'Tire Recapping', 0),
(468, 9, 'Tire Shop', 0),
(469, 9, 'Training Center (DXN products)', 0),
(470, 9, 'Transloading Station', 0),
(471, 9, 'Travel & Tours', 0),
(472, 9, 'Tricycle Repair Shop', 0),
(473, 9, 'Tricycle Terminal ', 0),
(474, 9, 'Trucking Services', 0),
(475, 9, 'T-shirt Printing Services', 0),
(476, 9, 'Video Tape Rental', 0),
(477, 9, 'Vulcanizing Shop', 0),
(478, 9, 'WareHouse ', 0),
(479, 9, 'Watch Repair Shop', 0),
(480, 9, 'Water well Drilling (Machine)RIG', 0),
(481, 9, 'Welding & Repair Shop', 0),
(482, 9, 'Wired Landline Services', 0),
(483, 9, 'Xerox Copier', 0),
(484, 10, '2nd Hand tire Trucks & Jeepney Dealer', 0),
(485, 10, 'Agricultural Farm Supplies Dealer', 1),
(486, 10, 'Agricultural Industrial Machines & Equipments Dealer', 1),
(487, 10, 'Appliance and Furniture Dealer', 0),
(488, 10, 'Appliances, Motorcycle & Spareparts Dealer ', 0),
(489, 10, 'Appliances,Motorcycle,Computer & Furniture Dealer', 0),
(490, 10, 'Araal/ Andesite Dealer', 0),
(491, 10, 'Auto Parts Dealer', 0),
(492, 10, 'Bamboo Strips & Nipa Dealer', 0),
(493, 10, 'Beer Wholesaler', 0),
(494, 10, 'Bicycle Dealer', 0),
(495, 10, 'Buy  & Sell of Assorted Agri Products', 0),
(496, 10, 'Buy & Sell Petroleum Products/ Fuel Depot', 0),
(497, 10, 'Buy & Sell Seafoods Wholesaler', 0),
(498, 10, 'Bicycle Dealer', 0),
(499, 10, 'Buy & Sell Seafoods Wholesaler', 0),
(500, 10, 'Car/ Truck Dealer', 0),
(501, 10, 'Cell cards & Sim cards wholesaler', 0),
(502, 10, 'Cellphone Units Dealer', 0),
(503, 10, 'Cement Dealer', 0),
(504, 10, 'Charcoal Dealer', 0),
(505, 10, 'Cigarretes Wholesaler', 0),
(506, 10, 'Coal Wholesaler', 0),
(507, 10, 'Coco Lumber Dealer', 0),
(508, 10, 'Coffin  Dealer', 0),
(509, 10, 'Const. Materials & Office  Supplies, Electrical & Gen. MDSE.', 0),
(510, 10, 'Corn Wholesaler', 1),
(511, 10, 'Cosmetics , RTW & Intimate Apparel Dealer ( NATASHA/MSE/BOARDWALK', 0),
(512, 10, 'Dairymilk Wholesaler(CARABAO)', 1),
(513, 10, 'Dealer of Sophie Products ( Direct Selling)', 0),
(514, 10, 'Developer & Marketing', 0),
(515, 10, 'Digital Cable Unit & Accessories ', 0),
(516, 10, 'Direct selling (Footwares, Apparels,Clothes', 0),
(517, 10, 'Distribution of Medicines & Medical Supplies Dealer', 1),
(518, 10, 'Distribution of Personal Collection , & Home Care Products', 0),
(519, 10, 'Dried Fish Dealer', 1),
(520, 10, 'Drug Distributor', 1),
(521, 10, 'Dry Goods  Wholesaler', 1),
(522, 10, 'Educational Supply Dealer', 0),
(523, 10, 'Egg Wholesaler', 1),
(524, 10, 'Fertilizer Wholesaler', 1),
(525, 10, 'Educational Supply Dealer', 1),
(526, 10, 'Eggs Wholesaler', 1),
(527, 10, 'Electrical, Lumberyard ( Good Lumber) Spareparts Dealer', 0),
(528, 10, 'Electronics & Communication Devicess Dealer', 0),
(529, 10, 'Feeds wholesaler', 1),
(530, 10, 'Fertilizer, Pesticides & Spareparts Dealer', 1),
(531, 10, 'Fire Safety Device Dealer', 0),
(532, 10, 'Fireworks & Pyrotechnic Device Dealer', 0),
(533, 10, 'Fish Dealer', 1),
(534, 10, 'Fish Trading', 1),
(535, 10, 'Fishing & Vegerinary Equipment Dealer', 1),
(536, 10, 'Fish Supplies Dealer', 1),
(537, 10, 'Frozen Foods -Wholesaler', 1),
(538, 10, 'Fruits  & Vegetables Wholesaler', 0),
(539, 10, 'Fuel woods Dealer ', 0),
(540, 10, 'Furniture Dealer', 0),
(541, 10, 'Gas & Acetylene Dealer', 1),
(542, 10, 'Gasoline Stations', 0),
(543, 10, 'General Merchandise-Non Essen WholeSaler', 0),
(544, 10, 'Glass & Alimuninum Supplies Dealer', 0),
(545, 10, 'Glassware & Plasticware Dealer', 0),
(546, 10, 'Government Formsc & Plate Nos. Dealer', 0),
(547, 10, 'Groceries Wholesaler', 0),
(548, 10, 'Handy Crafts, Garments & Office Supplies ', 1),
(549, 10, 'Hardware Wholesaler', 0),
(550, 10, 'Hardware ,Electrical Spareparts,Office Furniture & Fixtures Dealer', 0),
(551, 10, 'Heavy & Light Equipment Parts Dealer', 1),
(552, 10, 'Household Products Dealer', 0),
(553, 10, 'Industrial Generators Dealer', 0),
(554, 10, 'Intimate Apparel  Dealer', 0),
(555, 10, 'JunkShop', 0),
(556, 10, 'Kitchenware & Plasticware WholeSaler', 0),
(557, 10, 'Liquor WholeSaler', 0),
(558, 10, 'Livestock Feeds & Spareparts Dealer', 0),
(559, 10, 'Lumberyard Good & Coco Lumber Dealer', 0),
(560, 10, 'Magazine & Newspaper Dealer', 0),
(561, 10, 'Marine Equipment Dealer', 0),
(562, 10, 'Marine Products (Buy & Sell) ', 0),
(563, 10, 'Medical Accessories, Supplies & Equipment Dealer', 1),
(564, 10, 'Medical Service', 1),
(565, 10, 'Medicines & Medical Supplies Dealer', 1),
(566, 10, 'Mill/ Industrial Supplies & Heavy Equipment Dealer', 1),
(567, 10, 'Mini-Mart Wholesaler', 0),
(568, 10, 'Motor Parts & Accessories Dealer', 0),
(569, 10, 'Motocycle/ Tricyle Parts Dealer', 0),
(570, 10, 'Motorcycle Sale', 0),
(571, 10, 'Motorcycles & Accessories Dealer', 0),
(572, 10, 'Native Products Wholesaler', 0),
(573, 10, 'Newspaper/ Magazine Dealer', 0),
(574, 10, 'Nipa Dealer', 0),
(575, 10, 'Nipa Wholesaler', 0),
(576, 10, 'Office Equipment & Supplies Dealer', 0),
(577, 10, 'Office Supplies & Canned Goods Dealer', 0),
(578, 10, 'Office Supplies & Office Equipments Dealer', 0),
(579, 10, 'Office Supplies & Spareparts Dealer', 0),
(580, 10, 'Office Supplies Dealer', 0),
(581, 10, 'Office Supplies Wholesaler', 0),
(582, 10, 'Office Supplies. Plastic Cahirs, Filing Cabinet, Office Tables, Computer', 0),
(583, 10, 'Office Supplies, Spareparts, Office & Sports EQUIT.Dealer', 0),
(584, 10, 'Oil & Lubricants Dealer', 0),
(585, 10, 'Ordinary Earth Filling Material Dealer', 0),
(586, 10, 'Paint Materials', 0),
(587, 10, 'Personal Collections Distributor', 0),
(588, 10, 'Petrioleum Products Dealer', 0),
(589, 10, 'Pharmaceuticals, Medical Supplies & Medical Devices Dealer', 1),
(590, 10, 'Poultry Feeds Wholesaler', 1),
(591, 10, 'Pre Needs Plan', 0),
(592, 10, 'Real Esate Dealer', 0),
(593, 10, 'Rice & Shrimp Crackers Dealer', 1),
(594, 10, 'Rice Dealer', 1),
(595, 10, 'Rice Wholesaler', 1),
(596, 10, 'Roofing Materials Dealer', 0),
(597, 10, 'Round Culvert Pipes & Aggregates Dealer', 0),
(598, 10, 'RTW Wholesaler', 0),
(599, 10, 'RTW, Glassware, Plasticware & Houseware Dealer', 0),
(600, 10, 'Rubber Products Dealer', 0),
(601, 10, 'Sales, Purchase, Export of Minerals', 0),
(602, 10, 'Salt Dealer', 1),
(603, 10, 'Sand & Gravel Dealer (Buy & Sell)', 0),
(604, 10, 'Sand and Gravel Dealer', 0),
(605, 10, 'School & Office Supplies & Equipment Dealer', 1),
(606, 10, 'Seafoods Dealer', 1),
(607, 10, 'Soap Wholesaler', 1),
(608, 10, 'Softdrinks Wholesaler', 0),
(609, 10, 'Softdrinks Dealer', 0),
(610, 10, 'Spareparts & Lubricants Dealer', 0),
(611, 10, 'Sports Supplies & Equipment Dealer', 0),
(612, 10, 'Squid Farming', 1),
(613, 10, 'Steel Works Dealer', 0),
(614, 10, 'Storage Fee of Flammble Substance', 0),
(615, 10, 'Sugar Mills & Electrical Supplies Dealer', 1),
(616, 10, 'Supplier of Fire Equipment & Devices', 0),
(617, 10, 'TELECOM Merchandising', 0),
(618, 10, 'TextBook  & Publishing Dealer', 0),
(619, 10, 'Tire Dealer', 0),
(620, 10, 'Trading of Furnitures', 0),
(621, 10, 'Trading of Mineral Resources (Blacksand)', 0),
(622, 10, 'Tupperware Distributor', 0),
(623, 10, 'Veterinary Products Whosaler', 0),
(624, 10, 'Veterinary Supplies & Agricultural Supplies Dealer', 0),
(625, 10, 'Warehouse-Bt', 0),
(626, 10, 'Water Pump & Water Treatment Facilities Dealer', 0),
(627, 10, 'Water Refilling Station', 0),
(628, 10, 'Wholesaler of Cosmetics', 0),
(629, 10, 'Wholesaler of Diswashing Soap & Fabric Conditioner', 0),
(630, 10, 'Wholesaler of Dressed Chicken', 0),
(631, 10, 'Wholesaler of Elecrical Supplies & Hardware', 0),
(632, 10, 'Wholesaler of Feeds & Veterinary Supply', 0),
(633, 10, 'Wholesaler of Food Supplement', 0),
(634, 10, 'Wholesaler of Frozen Foods', 1),
(635, 10, 'Wholesaler of Kopiko Products', 0),
(636, 10, 'Wholesaler of School Supplies & Kitchenware', 0),
(637, 10, 'Wholesaler of Sugar', 1),
(638, 10, 'Yakult Distributor', 1),
(1034, 0, 'Description', 0),
(1036, 4, 'Food Cart', NULL),
(1037, 0, 'internet cafe', NULL),
(1038, 5, 'ICE CREAM STAND', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_business_type`
--

CREATE TABLE `tbl_business_type` (
  `ID` int(11) NOT NULL,
  `Type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_business_type`
--

INSERT INTO `tbl_business_type` (`ID`, `Type`) VALUES
(1, 'Single'),
(2, 'Partnership'),
(3, 'Corporation'),
(4, 'Cooperative');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cenro_line`
--

CREATE TABLE `tbl_cenro_line` (
  `ID` int(11) NOT NULL,
  `Cycle_ID` int(11) DEFAULT NULL,
  `Date_arrival` datetime DEFAULT NULL,
  `Solid_waste_ID` int(11) DEFAULT NULL,
  `Date_billed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cenro_line`
--

INSERT INTO `tbl_cenro_line` (`ID`, `Cycle_ID`, `Date_arrival`, `Solid_waste_ID`, `Date_billed`) VALUES
(1, 1, '2018-09-11 13:20:52', 3, '2018-09-11 13:22:54'),
(2, 2, '2018-09-11 13:23:08', 3, '2018-09-11 13:24:20'),
(3, 3, '2018-09-11 13:25:39', 3, '2018-09-11 13:31:16'),
(4, 4, '2018-09-11 13:26:27', 3, '2018-09-11 13:30:17'),
(5, 5, '2018-09-11 13:27:20', 1, '2018-09-11 13:34:17'),
(6, 6, '2018-09-11 13:28:57', 1, '2018-09-11 13:32:27'),
(7, 7, '2018-09-11 14:15:39', 1, '2018-09-11 14:20:45'),
(8, 8, '2018-09-17 14:25:02', NULL, NULL),
(9, 1, '2018-09-18 10:40:19', NULL, NULL),
(10, 2, '2018-09-18 10:43:41', NULL, NULL),
(11, 4, '2018-09-18 17:22:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cho_health_certificate`
--

CREATE TABLE `tbl_cho_health_certificate` (
  `ID` bigint(20) NOT NULL,
  `U_ID` varchar(50) NOT NULL,
  `Application_form_ID` bigint(20) DEFAULT NULL,
  `Registration_no` varchar(10) NOT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `First_name` varchar(100) NOT NULL,
  `Last_name` varchar(100) NOT NULL,
  `Middle_name` varchar(100) NOT NULL,
  `Nationality` varchar(50) DEFAULT NULL,
  `Civil_status` varchar(50) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Sex` varchar(1) DEFAULT NULL,
  `Occupation` varchar(100) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Place_of_work` varchar(200) DEFAULT NULL,
  `Residence` varchar(200) DEFAULT NULL,
  `Residence_certificate_no` varchar(50) DEFAULT NULL,
  `Place_issued` varchar(200) DEFAULT NULL,
  `City_health_officer` varchar(100) DEFAULT NULL,
  `Assistant_city_health_officer` varchar(200) DEFAULT NULL,
  `Sanitary_inspector` varchar(100) DEFAULT NULL,
  `Certificate_type` varchar(20) NOT NULL COMMENT 'yellow/green/pink',
  `Deleted` tinyint(1) NOT NULL DEFAULT '0',
  `Date_issued` date NOT NULL,
  `Date_expiry` date NOT NULL,
  `Date_printed` datetime DEFAULT NULL,
  `Date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cho_health_certificate`
--

INSERT INTO `tbl_cho_health_certificate` (`ID`, `U_ID`, `Application_form_ID`, `Registration_no`, `Position`, `First_name`, `Last_name`, `Middle_name`, `Nationality`, `Civil_status`, `Age`, `Sex`, `Occupation`, `Address`, `Place_of_work`, `Residence`, `Residence_certificate_no`, `Place_issued`, `City_health_officer`, `Assistant_city_health_officer`, `Sanitary_inspector`, `Certificate_type`, `Deleted`, `Date_issued`, `Date_expiry`, `Date_printed`, `Date_created`) VALUES
(7, '29891a0695a8fa75d1973b733d342c974cd29827', 9, '01', 'df', 'Jose', 'Rizal', 'Protacio', 'Sdf', 'Sdfs', NULL, '', '', 'Df', '', '', 'dfd', 'Dfd', 'DR. HILDEGARDE B. MADALAG, M.D.', '', 'ASDF', 'green', 0, '2018-09-19', '2018-12-31', NULL, '2018-09-19 16:18:42'),
(8, '33ffe0adea17181797763f5224c5783e83e6e40d', 9, '01', NULL, 'Jose', 'Rizal', 'Protacio', 'Sdf', 'Sdfs', 23, 'F', 'DDD', 'Df', 'Df', '', 'dfd', 'Dfd', 'DR. HILDEGARDE B. MADALAG, M.D.', '', 'ASDF', 'yellow', 0, '2018-09-19', '2018-12-31', NULL, '2018-09-19 16:25:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cho_sanitary_permit`
--

CREATE TABLE `tbl_cho_sanitary_permit` (
  `ID` bigint(20) NOT NULL,
  `Cycle_ID` int(11) NOT NULL,
  `Permit_type` varchar(10) NOT NULL COMMENT 'FOOD/ NON-FOOD',
  `Establishment_type` varchar(100) DEFAULT NULL,
  `Permit_no` int(11) NOT NULL,
  `Inspected_by` varchar(100) DEFAULT NULL,
  `Recommend_by` varchar(100) DEFAULT NULL,
  `Reviewed_By` varchar(100) DEFAULT NULL,
  `Approved_by` varchar(100) DEFAULT NULL,
  `Date_issued` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Date_expiry` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cho_sanitary_permit`
--

INSERT INTO `tbl_cho_sanitary_permit` (`ID`, `Cycle_ID`, `Permit_type`, `Establishment_type`, `Permit_no`, `Inspected_by`, `Recommend_by`, `Reviewed_By`, `Approved_by`, `Date_issued`, `Date_expiry`) VALUES
(93, 2, 'FOOD', 'TRADING CORPORATION. LTE.', 1, '', 'SUZZETTE A. DELOS SANTOS', 'JEANNIE VIC P. TARRAZONA', 'HILDEGARDE B. MADALAG, M.D.', '2018-09-19 14:17:17', '2018-12-31'),
(94, 4, 'FOOD', '', 2, NULL, NULL, NULL, NULL, '2018-09-19 14:38:04', '2018-12-31'),
(95, 1, 'NON-FOOD', '', 1, '', 'SUZZETTE A. DELOS SANTOS', 'JEANNIE VIC P. TARRAZONA', 'HILDEGARDE B. MADALAG, M.D.', '2018-09-19 14:44:16', '2018-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city_engineer`
--

CREATE TABLE `tbl_city_engineer` (
  `ID` bigint(255) NOT NULL,
  `Cycle_ID` bigint(255) DEFAULT NULL,
  `Discrepancy` tinyint(1) DEFAULT NULL,
  `Date_arrival` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_city_engineer`
--

INSERT INTO `tbl_city_engineer` (`ID`, `Cycle_ID`, `Discrepancy`, `Date_arrival`) VALUES
(1, 1, 0, '2018-09-11 13:20:51'),
(2, 2, 0, '2018-09-11 13:23:08'),
(3, 3, 0, '2018-09-11 13:25:39'),
(4, 4, 0, '2018-09-11 13:26:26'),
(5, 5, 0, '2018-09-11 13:27:20'),
(6, 6, 0, '2018-09-11 13:28:57'),
(7, 7, 0, '2018-09-11 14:15:39'),
(8, 8, 0, '2018-09-17 14:25:01'),
(9, 1, 0, '2018-09-18 10:40:18'),
(10, 2, 0, '2018-09-18 10:43:40'),
(11, 4, 0, '2018-09-18 17:22:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city_engineer_line`
--

CREATE TABLE `tbl_city_engineer_line` (
  `ID` bigint(255) NOT NULL,
  `Date_created` datetime DEFAULT NULL,
  `Representative` varchar(50) DEFAULT NULL,
  `City_engineer_ID` bigint(255) DEFAULT NULL,
  `Pay_type_ID` bigint(50) DEFAULT NULL,
  `Number_of_unit` int(11) DEFAULT NULL,
  `Rate` double DEFAULT NULL,
  `Date_payment` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_city_engineer_line`
--

INSERT INTO `tbl_city_engineer_line` (`ID`, `Date_created`, `Representative`, `City_engineer_ID`, `Pay_type_ID`, `Number_of_unit`, `Rate`, `Date_payment`) VALUES
(1, '2018-09-11 13:23:50', 'undefined', 1, 1, 1, 120, NULL),
(2, '2018-09-11 13:23:50', 'undefined', 1, 2, 1, 240, NULL),
(3, '2018-09-11 13:23:50', 'undefined', 1, 3, 1, 0, NULL),
(4, '2018-09-11 13:23:50', 'undefined', 1, 4, 1, 60, NULL),
(5, '2018-09-11 13:23:50', 'undefined', 1, 5, 1, 0, NULL),
(6, '2018-09-11 13:23:50', 'undefined', 1, 6, 1, 0, NULL),
(7, '2018-09-11 13:26:44', 'undefined', 2, 1, 1, 240, NULL),
(8, '2018-09-11 13:26:44', 'undefined', 2, 2, 1, 200, NULL),
(9, '2018-09-11 13:26:44', 'undefined', 2, 3, 1, 0, NULL),
(10, '2018-09-11 13:26:44', 'undefined', 2, 4, 1, 90, NULL),
(11, '2018-09-11 13:26:44', 'undefined', 2, 5, 1, 0, NULL),
(12, '2018-09-11 13:26:44', 'undefined', 2, 6, 1, 0, NULL),
(13, '2018-09-11 13:29:15', 'undefined', 4, 1, 1, 0, NULL),
(14, '2018-09-11 13:29:15', 'undefined', 4, 2, 1, 0, NULL),
(15, '2018-09-11 13:29:15', 'undefined', 4, 3, 1, 0, NULL),
(16, '2018-09-11 13:29:15', 'undefined', 4, 4, 1, 0, NULL),
(17, '2018-09-11 13:29:15', 'undefined', 4, 5, 1, 0, NULL),
(18, '2018-09-11 13:29:15', 'undefined', 4, 6, 1, 0, NULL),
(19, '2018-09-11 13:31:10', 'undefined', 3, 1, 1, 0, NULL),
(20, '2018-09-11 13:31:10', 'undefined', 3, 2, 1, 0, NULL),
(21, '2018-09-11 13:31:10', 'undefined', 3, 3, 1, 0, NULL),
(22, '2018-09-11 13:31:10', 'undefined', 3, 4, 1, 0, NULL),
(23, '2018-09-11 13:31:10', 'undefined', 3, 5, 1, 0, NULL),
(24, '2018-09-11 13:31:10', 'undefined', 3, 6, 1, 0, NULL),
(25, '2018-09-11 13:34:02', 'undefined', 6, 1, 1, 0, NULL),
(26, '2018-09-11 13:34:02', 'undefined', 6, 2, 1, 0, NULL),
(27, '2018-09-11 13:34:02', 'undefined', 6, 3, 1, 0, NULL),
(28, '2018-09-11 13:34:02', 'undefined', 6, 4, 1, 0, NULL),
(29, '2018-09-11 13:34:02', 'undefined', 6, 5, 1, 0, NULL),
(30, '2018-09-11 13:34:02', 'undefined', 6, 6, 1, 0, NULL),
(31, '2018-09-11 13:34:52', 'undefined', 5, 1, 1, 0, NULL),
(32, '2018-09-11 13:34:52', 'undefined', 5, 2, 1, 0, NULL),
(33, '2018-09-11 13:34:52', 'undefined', 5, 3, 1, 0, NULL),
(34, '2018-09-11 13:34:52', 'undefined', 5, 4, 1, 0, NULL),
(35, '2018-09-11 13:34:52', 'undefined', 5, 5, 1, 0, NULL),
(36, '2018-09-11 13:34:52', 'undefined', 5, 6, 1, 0, NULL),
(37, '2018-09-14 14:59:25', 'undefined', 7, 1, 1, 10, NULL),
(38, '2018-09-14 14:59:25', 'undefined', 7, 2, 1, 200, NULL),
(39, '2018-09-14 14:59:25', 'undefined', 7, 3, 1, 200, NULL),
(40, '2018-09-14 14:59:25', 'undefined', 7, 4, 1, 10, NULL),
(41, '2018-09-14 14:59:25', 'undefined', 7, 5, 1, 200, NULL),
(42, '2018-09-14 14:59:25', 'undefined', 7, 6, 1, 10.3, NULL);

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
  `Position` varchar(65) NOT NULL,
  `OR_number` varchar(10) NOT NULL,
  `Bank_name` varchar(60) DEFAULT NULL,
  `Check_number` varchar(30) DEFAULT NULL,
  `Check_date` date DEFAULT NULL,
  `Check_amount` float DEFAULT NULL,
  `Remarks` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_collection_items`
--

CREATE TABLE `tbl_collection_items` (
  `ID` bigint(255) NOT NULL,
  `OR_number` varchar(10) NOT NULL,
  `Fee` varchar(120) NOT NULL,
  `Amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cycle`
--

CREATE TABLE `tbl_cycle` (
  `ID` bigint(255) NOT NULL,
  `Application_ID` bigint(255) NOT NULL,
  `Cycle_date` year(4) DEFAULT NULL,
  `Date_application` datetime DEFAULT NULL,
  `Amendment_from_business_type_ID` int(11) DEFAULT NULL,
  `Amendment_to_business_type_ID` int(11) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL COMMENT 'Processing/Approved',
  `Retirement` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cycle`
--

INSERT INTO `tbl_cycle` (`ID`, `Application_ID`, `Cycle_date`, `Date_application`, `Amendment_from_business_type_ID`, `Amendment_to_business_type_ID`, `Status`, `Retirement`) VALUES
(1, 1, 2018, '2018-09-18 10:40:18', 1, 1, 'Approved', 0),
(2, 9, 2018, '2018-09-18 10:43:39', 1, 1, 'Processing', 0),
(3, 2, 2018, '2018-09-18 10:46:39', 3, 3, 'Processing', 0),
(4, 3, 2018, '2018-09-18 05:22:54', 1, 1, 'Processing', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_documents`
--

CREATE TABLE `tbl_documents` (
  `ID` bigint(255) NOT NULL,
  `Cycle_ID` bigint(255) NOT NULL,
  `Application_UID` varchar(255) NOT NULL,
  `Folder_path` varchar(255) NOT NULL,
  `Filename` varchar(255) NOT NULL,
  `Document` varchar(50) NOT NULL,
  `Date_expiration` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fees_fixed`
--

CREATE TABLE `tbl_fees_fixed` (
  `ID` bigint(10) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Fee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_fees_fixed`
--

INSERT INTO `tbl_fees_fixed` (`ID`, `Category`, `Fee`) VALUES
(1, 'Miscellaneous-Business', 40),
(2, 'Business Tax Clearance', 175),
(3, 'Zonal Permit Fee', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fees_mayors_permit`
--

CREATE TABLE `tbl_fees_mayors_permit` (
  `ID` bigint(255) NOT NULL,
  `Category` varchar(65) NOT NULL,
  `Characteristics` varchar(65) NOT NULL,
  `Fee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fees_mayors_permit`
--

INSERT INTO `tbl_fees_mayors_permit` (`ID`, `Category`, `Characteristics`, `Fee`) VALUES
(1, 'Manufacturer', 'Cottage', 300),
(2, 'Manufacturer', 'Small', 600),
(3, 'Manufacturer', 'Medium', 1200),
(4, 'Manufacturer', 'Large', 2400),
(5, 'Producer', 'Cottage', 300),
(6, 'Producer', 'Small', 600),
(7, 'Producer', 'Medium', 1200),
(8, 'Producer', 'Large', 2400),
(9, 'Financial', 'Cottage', 2000),
(10, 'Financial', 'Small', 2000),
(11, 'Financial', 'Medium', 4000),
(12, 'Financial', 'Large', 6000),
(13, 'Service', 'Cottage', 400),
(14, 'Service', 'Small', 400),
(15, 'Service', 'Medium', 800),
(16, 'Service', 'Large', 1000),
(17, 'Wholesaler', 'Cottage', 200),
(18, 'Wholesaler', 'Small', 500),
(19, 'Wholesaler', 'Medium', 1000),
(20, 'Wholesaler', 'Large', 1200),
(21, 'Retailer', 'Cottage', 200),
(22, 'Retailer', 'Small', 500),
(23, 'Retailer', 'Medium', 1000),
(24, 'Retailer', 'Large', 1200),
(25, 'Dealer', 'Cottage', 200),
(26, 'Dealer', 'Small', 500),
(27, 'Dealer', 'Medium', 1000),
(28, 'Dealer', 'Large', 1200),
(29, 'Other', 'Cottage', 200),
(30, 'Other', 'Small', 500),
(31, 'Other', 'Medium', 1000),
(32, 'Other', 'Large', 1200),
(33, 'Amusement', 'Cottage', 200),
(34, 'Amusement', 'Small', 500),
(35, 'Amusement', 'Medium', 1000),
(36, 'Amusement', 'Large', 1200),
(37, 'Food Establishment', 'Cottage', 200),
(38, 'Food Establishment', 'Small', 500),
(39, 'Food Establishment', 'Medium', 1000),
(40, 'Food Establishment', 'Large', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fees_sanitary`
--

CREATE TABLE `tbl_fees_sanitary` (
  `ID` int(10) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Sanitary_fee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_fees_sanitary`
--

INSERT INTO `tbl_fees_sanitary` (`ID`, `Category`, `Sanitary_fee`) VALUES
(1, 'Amusement Places', 600),
(2, 'Manufacturer', 500),
(3, 'Producer', 500),
(4, 'Laundry Shop', 500),
(5, 'Laboratory', 500),
(6, 'Private Market', 500),
(7, 'Private Hospital', 500),
(8, 'Private School', 500),
(9, 'Department Store', 500),
(10, 'Shopping Center', 500),
(11, 'Importer', 500),
(12, 'Exporter', 500),
(13, 'Wholesaler', 500),
(14, 'Hotel', 500),
(15, 'Motel', 500),
(16, 'Appartelle', 500),
(17, 'Pension House', 500),
(18, 'Financial Institution', 500),
(19, 'Medical Clinic', 400),
(20, 'Dental Clinic', 400),
(21, 'Institution for Learning', 400),
(22, 'Restaurant', 300),
(23, 'Refreshment', 300),
(24, 'Parlor', 300),
(25, 'Carinderia', 300),
(26, 'Establishment offering services', 300),
(27, 'Apartment', 300),
(28, 'House for rent', 300),
(29, 'Accessories', 300),
(30, 'Boarding House', 300),
(31, 'Retailer', 200),
(32, 'Others', 200);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fees_solid_waste`
--

CREATE TABLE `tbl_fees_solid_waste` (
  `ID` bigint(10) NOT NULL,
  `Size` varchar(20) NOT NULL,
  `Waste_fee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_fees_solid_waste`
--

INSERT INTO `tbl_fees_solid_waste` (`ID`, `Size`, `Waste_fee`) VALUES
(1, 'Small', 360),
(2, 'Medium', 600),
(3, 'Large', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fire_abatement_order`
--

CREATE TABLE `tbl_fire_abatement_order` (
  `ID` bigint(20) NOT NULL,
  `Inspection_order_ID` bigint(20) NOT NULL,
  `Date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fire_application`
--

CREATE TABLE `tbl_fire_application` (
  `ID` bigint(255) NOT NULL,
  `Cycle_ID` bigint(255) DEFAULT NULL,
  `Fire_business_type_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fire_application`
--

INSERT INTO `tbl_fire_application` (`ID`, `Cycle_ID`, `Fire_business_type_ID`) VALUES
(1, 1, 1),
(2, 2, 5),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fire_appointments`
--

CREATE TABLE `tbl_fire_appointments` (
  `ID` bigint(255) NOT NULL,
  `Cycle_ID` bigint(255) NOT NULL,
  `App_ID` bigint(11) NOT NULL,
  `Fire_user_in_charge_ID` bigint(255) DEFAULT NULL,
  `Requested_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Date_of_appointment` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fire_appointments`
--

INSERT INTO `tbl_fire_appointments` (`ID`, `Cycle_ID`, `App_ID`, `Fire_user_in_charge_ID`, `Requested_date`, `Date_created`, `Date_of_appointment`) VALUES
(1, 0, 3, 4, '2018-05-23 18:05:21', '2018-05-23 18:05:21', '2018-06-18 00:00:00'),
(4, 1, 2, 4, '2018-06-02 11:52:41', '2018-06-02 11:52:41', '2018-06-18 00:00:00'),
(5, 0, 1, 4, '2018-06-02 11:52:51', '2018-06-02 11:52:51', '2018-06-18 00:00:00'),
(6, 0, 4, 4, '2018-05-23 18:05:21', '2018-05-23 18:05:21', '2018-06-19 00:00:00'),
(7, 0, 5, NULL, '2018-05-23 18:05:21', '2018-05-23 18:05:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fire_billing`
--

CREATE TABLE `tbl_fire_billing` (
  `ID` bigint(20) NOT NULL,
  `Fire_application_ID` bigint(20) NOT NULL,
  `Paid` tinyint(1) NOT NULL DEFAULT '0',
  `Date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Date_paid` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fire_billing`
--

INSERT INTO `tbl_fire_billing` (`ID`, `Fire_application_ID`, `Paid`, `Date_created`, `Date_paid`) VALUES
(5, 1, 0, '2018-05-23 12:47:18', NULL),
(6, 2, 0, '2018-05-23 12:47:18', NULL),
(7, 3, 1, '2018-05-23 12:47:18', '2018-06-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fire_billing_details`
--

CREATE TABLE `tbl_fire_billing_details` (
  `ID` bigint(20) NOT NULL,
  `Fire_billing_ID` bigint(20) NOT NULL,
  `Fire_billing_description` varchar(500) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fire_billing_details`
--

INSERT INTO `tbl_fire_billing_details` (`ID`, `Fire_billing_ID`, `Fire_billing_description`, `Amount`) VALUES
(1, 8, 'OBSTRUCTING OR BLOCKING OF FIRE EXIT', 12500),
(2, 9, 'SMOKING IN PROHIBITED AREAS AS MAY BE DETERMINED BY THE FIRE SERVICE OR THROWING CIGARS, CIGARETTES ', 4000),
(3, 9, 'LOCKING FIRE EXITS DURING PERIOD WHEN PEOPLE INSIDE THE BUILDING', 37500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fire_business_types`
--

CREATE TABLE `tbl_fire_business_types` (
  `ID` bigint(20) NOT NULL,
  `Business_type` varchar(50) NOT NULL,
  `Structural` tinyint(1) NOT NULL,
  `Residential` tinyint(1) NOT NULL,
  `Date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Date_modified` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Created_by_user_ID` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fire_business_types`
--

INSERT INTO `tbl_fire_business_types` (`ID`, `Business_type`, `Structural`, `Residential`, `Date_created`, `Date_modified`, `Created_by_user_ID`) VALUES
(1, 'Assembly', 1, 0, '2018-05-11 11:04:31', '', NULL),
(2, 'Educational', 1, 0, '2018-05-11 11:04:31', '', NULL),
(3, 'Health Care', 1, 0, '2018-05-11 11:04:31', '', NULL),
(4, 'Detention and Correctional', 1, 0, '2018-05-11 11:04:31', '', NULL),
(5, 'Hotel', 1, 1, '2018-05-11 11:04:31', '', NULL),
(6, 'Dormitories', 1, 1, '2018-05-11 11:04:31', '', NULL),
(7, 'Apartment Building', 1, 1, '2018-05-11 11:04:31', '', NULL),
(8, 'Lodging and Rooming House', 1, 1, '2018-05-11 11:04:31', '', NULL),
(9, 'Single and Two Family Dwelling Unit', 1, 1, '2018-05-11 11:04:31', '', NULL),
(10, 'Mercantile', 1, 0, '2018-05-11 11:04:31', '', NULL),
(11, 'Business', 1, 0, '2018-05-11 11:04:31', '', NULL),
(12, 'Industrial', 1, 0, '2018-05-11 11:04:31', '', NULL),
(13, 'Storage', 1, 0, '2018-05-11 11:04:31', '', NULL),
(14, 'Miscellaneous Structures', 1, 0, '2018-05-11 11:04:31', '', NULL),
(15, 'Vehicles/ Ambulant Vendors/ Others', 0, 0, '2018-05-11 11:04:31', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fire_certificate`
--

CREATE TABLE `tbl_fire_certificate` (
  `ID` bigint(255) NOT NULL,
  `FSIC_no_code` varchar(20) DEFAULT NULL,
  `FSIC_year` int(4) NOT NULL,
  `FSIC_number` bigint(20) NOT NULL,
  `Certificate_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Valid_until` datetime NOT NULL,
  `Fire_application_ID` int(11) NOT NULL,
  `Amount_paid` int(11) NOT NULL,
  `OR_number` varchar(50) NOT NULL,
  `Date_paid` datetime DEFAULT NULL,
  `Released` tinyint(1) NOT NULL,
  `Released_date` datetime DEFAULT NULL,
  `Created_by_user_ID` bigint(20) DEFAULT NULL,
  `Date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fire_certificate`
--

INSERT INTO `tbl_fire_certificate` (`ID`, `FSIC_no_code`, `FSIC_year`, `FSIC_number`, `Certificate_date`, `Valid_until`, `Fire_application_ID`, `Amount_paid`, `OR_number`, `Date_paid`, `Released`, `Released_date`, `Created_by_user_ID`, `Date_created`) VALUES
(1, '2018-6-100', 2018, 100, '2018-06-18 11:15:33', '2019-06-18 11:06:22', 3, 0, '', NULL, 0, NULL, 5, '2018-06-18 11:15:33'),
(2, '2018-6-101', 2018, 101, '2018-06-18 14:54:32', '2019-06-18 02:06:20', 2, 0, '', NULL, 0, NULL, 5, '2018-06-18 14:54:32'),
(3, '2018-6-102', 2018, 102, '2018-06-18 16:41:07', '2019-06-18 04:06:56', 1, 0, '', NULL, 0, NULL, 5, '2018-06-18 16:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fire_code`
--

CREATE TABLE `tbl_fire_code` (
  `ID` bigint(20) NOT NULL,
  `Fire_code_description` varchar(500) NOT NULL,
  `Fire_code_min_fine` int(11) NOT NULL,
  `Fire_code_max_fine` int(11) NOT NULL,
  `Fire_code_grace_period` int(100) NOT NULL,
  `Fire_code_grace_period_type` varchar(10) NOT NULL COMMENT 'Day/s/ Hour/s',
  `Date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Created_by_user_ID` bigint(20) DEFAULT NULL,
  `Date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fire_code`
--

INSERT INTO `tbl_fire_code` (`ID`, `Fire_code_description`, `Fire_code_min_fine`, `Fire_code_max_fine`, `Fire_code_grace_period`, `Fire_code_grace_period_type`, `Date_created`, `Created_by_user_ID`, `Date_modified`) VALUES
(24, 'OBSTRUCTING OR BLOCKING OF FIRE EXIT', 12500, 25000, 1, 'Day/s', '2018-05-07 11:49:32', NULL, NULL),
(25, 'SMOKING IN PROHIBITED AREAS AS MAY BE DETERMINED BY THE FIRE SERVICE OR THROWING CIGARS, CIGARETTES ', 4000, 12500, 1, 'Day/s', '2018-05-07 11:51:48', NULL, NULL),
(26, 'LOCKING FIRE EXITS DURING PERIOD WHEN PEOPLE INSIDE THE BUILDING', 37500, 50000, 1, 'Day/s', '2018-05-07 11:57:14', NULL, NULL),
(27, 'USE OF JUMPERS OR TAMPERING WITH ELECTRICAL WIRING OR OVER LOADING THE ELECTRICAL SYSTEM BEYOND ITS ', 25000, 37500, 1, 'Day/s', '2018-05-07 16:58:32', NULL, NULL),
(28, 'CONSTRUCTING GATES, ENTRANCES AND WALKWAYS TO BUILDING COMPONENTS AND YARDS WHICH OBSTRUCT THE ORDER', 12500, 25000, 3, 'Day/s', '2018-05-07 16:59:42', NULL, NULL),
(34, 'FAILURE TO SUBMIT COPY OF FIRE INSURANCE POLICY WITHIN THE PRESCRIBED TIME LIMIT', 4000, 12500, 3, 'Day/s', '2018-05-07 17:19:38', NULL, NULL),
(35, 'FAILURE TO PROVIDE FIRE WALLS TO SEPARATE ADJOINING BUILDING', 25000, 375000, 10, 'Day/s', '2018-05-07 17:31:26', NULL, NULL),
(36, 'NO AUTOMATIC FIRE SUPPRESSION SYSTEM (SPRINKLER SYSTEM)', 25000, 37500, 15, 'Day/s', '2018-05-07 17:32:54', NULL, NULL),
(37, 'NO MANUAL FIRE ALARM SYSTEM', 25000, 37500, 15, 'Day/s', '2018-05-07 17:33:39', NULL, NULL),
(38, 'NO WET STANDPIPE', 25000, 37500, 15, 'Day/s', '2018-05-07 17:36:23', NULL, NULL),
(39, 'NO DRY STANDPIPE', 25000, 37500, 15, 'Day/s', '2018-05-07 17:37:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fire_fsic_no`
--

CREATE TABLE `tbl_fire_fsic_no` (
  `ID` bigint(255) NOT NULL,
  `Start` int(11) NOT NULL,
  `End` int(11) NOT NULL,
  `Created_by_user_ID` bigint(20) DEFAULT NULL,
  `Date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` varchar(5) NOT NULL DEFAULT 'Ready' COMMENT 'Ready/Full'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fire_fsic_no`
--

INSERT INTO `tbl_fire_fsic_no` (`ID`, `Start`, `End`, `Created_by_user_ID`, `Date_created`, `Status`) VALUES
(1, 100, 400, NULL, '2018-03-06 11:53:31', 'Ready'),
(76, 500, 1500, NULL, '2018-03-08 19:14:46', 'Ready'),
(77, 2000, 2999, NULL, '2018-06-18 15:15:35', 'Ready'),
(78, 3000, 3199, NULL, '2018-06-18 15:48:17', 'Ready');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fire_inspection_order`
--

CREATE TABLE `tbl_fire_inspection_order` (
  `ID` bigint(255) NOT NULL,
  `Inspection_order_number_code` varchar(1000) NOT NULL,
  `Inspection_order_year` int(4) NOT NULL,
  `Inspection_order_number` bigint(11) NOT NULL,
  `Fire_application_ID` bigint(255) DEFAULT NULL,
  `Cycle_ID` bigint(20) NOT NULL,
  `Proceed` text,
  `Purpose` text,
  `Duration` varchar(50) DEFAULT NULL,
  `Remarks` text,
  `Recommended_by_user_ID` int(11) DEFAULT NULL,
  `Approved_by_user_ID` int(11) DEFAULT NULL,
  `Created_by_user_ID` bigint(20) DEFAULT NULL,
  `Date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Date_of_inspection` datetime NOT NULL,
  `Sequence_no` int(1) NOT NULL,
  `Has_result` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fire_inspection_order`
--

INSERT INTO `tbl_fire_inspection_order` (`ID`, `Inspection_order_number_code`, `Inspection_order_year`, `Inspection_order_number`, `Fire_application_ID`, `Cycle_ID`, `Proceed`, `Purpose`, `Duration`, `Remarks`, `Recommended_by_user_ID`, `Approved_by_user_ID`, `Created_by_user_ID`, `Date_created`, `Date_of_inspection`, `Sequence_no`, `Has_result`) VALUES
(1, 'NIR-RXVIII-2018-06-1000', 2018, 1000, 3, 3, NULL, 'To Conduct Fire Safety Inscpection Pursuant                                                                     To Section 9.0.2.4 of RA 9514', NULL, 'Return to office upon completion of mission', NULL, NULL, NULL, '2018-06-18 11:11:49', '2018-06-18 00:00:00', 1, 1),
(2, 'NIR-RXVIII-2018-06-1001', 2018, 1001, 3, 3, NULL, 'To Conduct Fire Safety Inscpection Pursuant                                                                     To Section 9.0.2.4 of RA 9514', NULL, 'Return to office upon completion of mission', NULL, NULL, NULL, '2018-06-18 11:13:26', '2018-06-19 00:00:00', 2, 1),
(3, 'NIR-RXVIII-2018-06-1002', 2018, 1002, 2, 2, NULL, 'To Conduct Fire Safety Inscpection Pursuant                                                                     To Section 9.0.2.4 of RA 9514', NULL, 'Return to office upon completion of mission', NULL, NULL, NULL, '2018-06-18 14:51:59', '2018-06-18 00:00:00', 1, 1),
(4, 'NIR-RXVIII-2018-06-1003', 2018, 1003, 2, 2, NULL, 'To Conduct Fire Safety Inscpection Pursuant                                                                     To Section 9.0.2.4 of RA 9514', NULL, 'Return to office upon completion of mission', NULL, NULL, NULL, '2018-06-18 14:53:53', '2018-06-19 00:00:00', 2, 1),
(5, 'NIR-RXVIII-2018-06-1004', 2018, 1004, 1, 1, 'process to crave digital  ads at adresss', 'To Conduct Fire Safety Inscpection Pursuant                                                                     To Section 9.0.2.4 of RA 9514', '', 'Return to office upon completion of mission', NULL, NULL, NULL, '2018-06-18 15:35:27', '2018-06-18 00:00:00', 1, 1),
(6, 'NIR-RXVIII-2018-06-1005', 2018, 1005, 1, 1, NULL, 'To Conduct Fire Safety Inscpection Pursuant                                                                     To Section 9.0.2.4 of RA 9514', NULL, 'Return to office upon completion of mission', NULL, NULL, NULL, '2018-06-18 16:35:52', '2018-06-19 00:00:00', 2, 1),
(7, 'NIR-RXVIII-2018-06-1006', 2018, 1006, 4, 4, NULL, 'To Conduct Fire Safety Inscpection Pursuant                                                                     To Section 9.0.2.4 of RA 9514', NULL, 'Return to office upon completion of mission', NULL, NULL, NULL, '2018-06-19 12:49:00', '2018-06-19 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fire_notice`
--

CREATE TABLE `tbl_fire_notice` (
  `ID` bigint(255) NOT NULL,
  `Inspection_order_ID` bigint(255) DEFAULT NULL,
  `Created_by_user_ID` bigint(20) DEFAULT NULL,
  `Date_created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fire_notice`
--

INSERT INTO `tbl_fire_notice` (`ID`, `Inspection_order_ID`, `Created_by_user_ID`, `Date_created`) VALUES
(1, 1, 4, '2018-06-18 11:12:40'),
(2, 3, 4, '2018-06-18 14:53:13'),
(3, 5, 4, '2018-06-18 16:16:43'),
(4, 7, 4, '2018-06-19 13:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fire_notice_defects`
--

CREATE TABLE `tbl_fire_notice_defects` (
  `ID` bigint(255) NOT NULL,
  `Fire_code_defect_ID` bigint(255) NOT NULL,
  `Fire_notice_ID` bigint(255) NOT NULL,
  `Grace_period` int(10) NOT NULL,
  `Fire_inspection_order_ID` bigint(20) DEFAULT NULL,
  `Grace_period_type` varchar(10) NOT NULL COMMENT 'Day/s/ Hour/s',
  `Batch_number` int(11) DEFAULT NULL,
  `Created_by_user_ID` bigint(20) NOT NULL,
  `Date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Date_complied` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fire_notice_defects`
--

INSERT INTO `tbl_fire_notice_defects` (`ID`, `Fire_code_defect_ID`, `Fire_notice_ID`, `Grace_period`, `Fire_inspection_order_ID`, `Grace_period_type`, `Batch_number`, `Created_by_user_ID`, `Date_created`, `Date_complied`) VALUES
(1, 24, 1, 1, 2, 'Day/s', 1, 0, '2018-06-18 11:12:49', '2018-06-18 11:15:57'),
(2, 25, 1, 1, 2, 'Day/s', 1, 0, '2018-06-18 11:12:49', '2018-06-18 11:15:57'),
(3, 24, 2, 1, 2, 'Day/s', 1, 0, '2018-06-18 14:53:20', '2018-06-18 14:55:03'),
(4, 25, 2, 1, 2, 'Day/s', 1, 0, '2018-06-18 14:53:20', '2018-06-18 14:55:03'),
(5, 24, 3, 1, 2, 'Day/s', 1, 0, '2018-06-18 16:18:24', '2018-06-18 16:38:56'),
(6, 25, 3, 1, 2, 'Day/s', 1, 0, '2018-06-18 16:18:24', '2018-06-18 16:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fire_notice_violation`
--

CREATE TABLE `tbl_fire_notice_violation` (
  `ID` bigint(255) NOT NULL,
  `Fee` double DEFAULT NULL,
  `Payment_date` date DEFAULT NULL,
  `Recieved_by_user_ID` bigint(255) DEFAULT NULL,
  `Inspection_order_ID` bigint(255) DEFAULT NULL,
  `Fire_notice_ID` bigint(20) NOT NULL,
  `Created_by_user_ID` bigint(20) DEFAULT NULL,
  `Date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Complied` tinyint(1) NOT NULL DEFAULT '0',
  `Date_complied` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fire_notice_violation_defects`
--

CREATE TABLE `tbl_fire_notice_violation_defects` (
  `ID` bigint(20) NOT NULL,
  `Fire_code_defect_ID` bigint(20) NOT NULL,
  `Fire_notice_violation_ID` bigint(20) NOT NULL,
  `Grace_period` int(10) NOT NULL,
  `Grace_period_type` varchar(10) NOT NULL COMMENT 'Day/s/ Hour/s',
  `Created_by_user_ID` bigint(20) DEFAULT NULL,
  `Date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Date_complied` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fire_stoppage_recommendation`
--

CREATE TABLE `tbl_fire_stoppage_recommendation` (
  `ID` bigint(20) NOT NULL,
  `Inspection_order_ID` bigint(20) NOT NULL,
  `Created_by_user_ID` bigint(20) NOT NULL,
  `Date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `ID` bigint(255) NOT NULL,
  `Cycle_ID` bigint(255) NOT NULL,
  `Message_from` varchar(5) NOT NULL,
  `Message_date` datetime NOT NULL,
  `Message` varchar(1500) NOT NULL,
  `Cycle_date` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modules`
--

CREATE TABLE `tbl_modules` (
  `ID` int(11) NOT NULL,
  `Module_name` varchar(45) DEFAULT NULL,
  `Description` varchar(100) NOT NULL,
  `Link` varchar(45) DEFAULT NULL,
  `ParentID` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_modules`
--

INSERT INTO `tbl_modules` (`ID`, `Module_name`, `Description`, `Link`, `ParentID`) VALUES
(1, 'Dashboard', 'Admin', 'dashboard', NULL),
(3, 'Monitoring', 'Admin', 'monitoring', NULL),
(4, 'User Accounts', 'Admin', 'user-accounts', NULL),
(5, 'BF', 'Bereau of Fre Protection', NULL, 0),
(6, 'CT', 'City Treasurer', NULL, 0),
(7, 'CE', 'City Engineer', 'CE', 0),
(8, 'CH', 'City Health', NULL, 0),
(9, 'CV', 'City Veterinary', NULL, 0),
(10, 'CN', 'CENRO', NULL, 0),
(11, 'MD', 'Market Division\r\n', NULL, 0),
(12, 'CP', 'City Planning', NULL, 0),
(13, 'Assessor', 'City Assessor', NULL, 0),
(14, 'BPLO', 'Business Permits and Licensing Office', NULL, 0),
(15, 'Collector', 'City Treasurer\'s Office - Collector', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_mode`
--

CREATE TABLE `tbl_payment_mode` (
  `ID` int(11) NOT NULL,
  `Mode` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment_mode`
--

INSERT INTO `tbl_payment_mode` (`ID`, `Mode`) VALUES
(1, 'Annually'),
(2, 'Semi-Annually'),
(3, 'Quarterly');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pay_type`
--

CREATE TABLE `tbl_pay_type` (
  `ID` int(11) NOT NULL,
  `Type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pay_type`
--

INSERT INTO `tbl_pay_type` (`ID`, `Type`) VALUES
(1, 'Building Permit Fee'),
(2, 'Electrical Permit Fee'),
(3, 'Mechanical Permit Fee'),
(4, 'Plumbing/Sanitary Permit Fee'),
(5, 'Signboard/Billboard Renewal Fee'),
(6, 'Signboard/Billboard Permit Fee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permit`
--

CREATE TABLE `tbl_permit` (
  `ID` bigint(255) NOT NULL,
  `Cycle_ID` bigint(255) DEFAULT NULL,
  `Date_printed` datetime DEFAULT NULL,
  `Date_release` timestamp NULL DEFAULT NULL,
  `Permit_no` varchar(25) DEFAULT NULL,
  `Revoke_permit` tinyint(1) NOT NULL DEFAULT '0',
  `Date_revoke` datetime DEFAULT NULL,
  `Applicant_signature` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_permit`
--

INSERT INTO `tbl_permit` (`ID`, `Cycle_ID`, `Date_printed`, `Date_release`, `Permit_no`, `Revoke_permit`, `Date_revoke`, `Applicant_signature`) VALUES
(2, 1, '2018-09-19 15:05:00', '2018-09-18 19:38:04', 'BP-2018-00001-0', 0, NULL, 0x646174613a696d6167652f706e673b6261736536342c6956424f5277304b47676f414141414e53556845556741414245774141414830434159414141416e6f4c67464141416741456c455156523458757a644237513054316d752f667567497569525a4142524a416c4b4541516c3579784a5144494969475142795a4938656c434a4567534a6f6d544a4f5169535151484a6b6b5343676771534a416d43674d713372764e56616632626e74777a307a317a3156717a647570512f6576612b3333376d6165652b6c2b784b61434141676f6f6f494143436969676741494b4b4b434141677163514f422f3661474141676f6f6f494143436969676741494b4b4b434141676f6f634549424179614f434155555545414242525251514145464646424141515555554b416a594d44454961474141676f6f6f494143436969676741494b4b4b434141676f594d48454d4b4b434141676f6f6f494143436969676741494b4b4b434141764d467a444278684369676741494b4b4b434141676f6f6f494143436969676741496441514d6d44676b4646464241415155555545414242525251514145464646444167496c6a514145464646424141515555554541424252525151414546464a67765949614a4930514242525251514145464646424141515555554541424252546f434267776355676f6f494143436969676741494b4b4b434141676f6f6f494143426b776341776f6f6f494143436969676741494b4b4b434141676f6f6f4d423841544e4d4843454b4b4b434141676f6f6f494143436969676741494b4b4b42415238434169554e434151555555454142425252515141454646464241415155554d4744694746424141515555554541424252525151414546464642414151586d43356868346768525141454646464241415155555545414242525251514145464f67494754427753436969676741494b4b4b434141676f6f6f494143436969676741455478344143436969676741494b4b4b434141676f6f6f494143436967775838414d4530654941676f6f6f494143436969676741494b4b4b434141676f6f30424577594f4b51554541424252525151414546464642414151555555454142425179594f4159555545414242525251514145464646424141515555554543422b514a6d6d4468434646424141515555554541424252525151414546464642416759364141524f486841494b4b4b434141676f6f6f494143436969676741494b4b474441784447676741494b4b4b434141676f6f6f494143436969676741494b7a426377773851526f6f4143436969676741494b4b4b434141676f6f6f494143436e5145444a67344a4252515141454646464241415155555545414242525251514145444a6f3442425252515141454646464241415155555545414242525251594c36414753614f454155555545414242525251514145464646424141515555554b416a594d44454961474141676f6f6f494143436969676741494b4b4b434141676f594d48454d4b4b434141676f6f6f494143436969676741494b4b4b434141764d467a444278684369676741494b4b4b434141676f6f6f494143436969676741496441514d6d44676b4646464241415155555545414242525251514145464646444167496c6a514145464646424141515555554541424252525151414546464a67765949614a4930514242525251514145464646424141515555554541424252546f434267776355676f6f494143436969676741494b4b4b434141676f6f6f494143426b776341776f6f6f494143436969676741494b4b4b434141676f6f6f4d423841544e4d4843454b4b4b434141676f6f6f494143436969676741494b4b4b42415238434169554e434151555555454142425252515141454646464241415155554d4744694746424141515555554541424252525151414546464642414151586d43356868346768525141454646464241415155555545414242525251514145464f67494754427753436969676741494b4b4b434141676f6f6f494143436969676741455478344143436969676741494b4b4b434141676f6f6f494143436967775838414d4530654941676f6f6f494143436969676741494b4b4b434141676f6f30424577594f4b51554541424252525151414546464642414151555555454142425179594f4159555545414242525251514145464646424141515555554543422b514a6d6d4468434646424141515555554541424252525151414546464642416759364141524f486841494b4b4b434141676f6f6f494143436969676741494b4b474441784447676741494b4b4b434141676f6f6f494143436969676741494b7a426377773851526f6f4143436969676741494b4b4b434141676f6f6f494143436e5145444a67344a4252515141454646464241415155555545414242525251514145444a6f3442425252515141454646464241415155555545414242525251594c36414753614f454155555545414242525251514145464646424141515555554b416a594d44454961474141676f6f6f494143436969676741494b4b4b434141676f594d48454d4b4b434141676f6f6f494143436969676741494b4b4b434141764d467a444278684369676741494b4b4b434141676f6f6f494143436969676741496441514d6d44676b4646464241415155555545414242525251514145464646444167496c6a514145464646424141515555554541424252525151414546464a67765949614a4930514242525251514145464646424141515555554541424252546f434267776355676f6f494143436969676741494b4b4b434141676f6f6f494143426b776341776f6f6f494143436969676741494b4b4b434141676f6f6f4d423841544e4d4843454b4b4b434141676f6f6f494143436969676741494b4b4b42415238434169554e434151555555454142425252515141454646464241415155554d4744694746424141515555554541424252525151414546464642414151586d43356868346768525141454646464241415155555545414242525251514145464f67494754427753436969676741494b4b4b434141676f6f6f494143436969676741455478344143436969676741494b4b4b434141676f6f6f494143436967775838414d4530654941676f6f6f494143436969676741494b4b4b434141676f6f30424577594f4b51554541424252525151414546464642414151555555454142425179594f4159555545414242525251514145464646424141515555554543422b514a6d6d4468434646424141515555554541424252525151414546464642416759364141524f486841494b4b4b434141676f6f6f494143436969676741494b4b474441784447676741494b4b4b434141676f6f6f494143436969676741494b7a426377773851526f6f4143436969676741494b4b4b434141676f6f6f494143436e5145444a67344a4252515141454646464241415155555545414242525251514145444a6f3442425252515141454646464241415155555545414242525251594c36414753614f454155555545414242525251514145464646424141515555554b416a594d44454961474141676f6f6f494143436969676741494b4b4b434141676f594d48454d4b4b434141676f6f6f494143436969676741494b4b4b434141764d467a444278684369676741494b4b4b434141676f6f6f494143436969676741496441514d6d44676b4646464241415155555545414242525251514145464646444167496c6a514145464646424141515555554541424252525151414546464a67765949614a4930514242525251514145464646424141515555554541424252546f434267776355676f6f494143436969676741494b4b4b434141676f6f6f494143426b776341776f6f6f494143436969676741494b4b4b434141676f6f6f4d423841544e4d4843454b4b4b434141676f6f6f494143436969676741494b4b4b42415238434169554e434151555555454142425252515141454646464241415155554d4744694746424141515555554541424252525151414546464642414151586d43356868346768525141454646464241415155555545414242525251514145464f67494754427753436969676741494b4b4b434141676f6f6f494143436969676741455478344143436969676741494b4b4b434141676f6f6f494143436967775838414d4530654941676f6f6f494143436969676741494b4b4b434141676f6f30424577594f4b51554541424252525151414546464642414151555555454142425179594f4159555545414242525251514145464646424141515555554543422b514a6d6d4468434646424141515555554541424252525151414546464642416759364141524f486841494b4b4b434141676f6f6f494143436969676741494b4b474441784447676741494b4b4b434141676f6f6f494143436969676741494b7a426377773851526f6f4143436969676741494b4b4b434141676f6f6f494143436e5145444a67344a4252515141454646464241415155555545414242525251514145444a6f3442425252515141454646464241415155555545414242525251594c36414753614f454155555545414242525251514145464646424141515555554b416a594d44454961474141676f6f6f494143436969676741494b4b4b434141676f594d48454d4b4b434141676f6f6f494143436969676741494b4b4b434141764d467a444278684369676741494b4b4b434141676f6f6f494143436969676741496441514d6d44676b4646464241415155555545414242525251514145464646444167496c6a514145464646424141515555554541424252525151414546464a67765949614a4930514242525251514145464646424141515555554541424252546f434267776355676f6f494143436969676741494b4b4b434141676f6f6f494143426b776341776f6f6f494143436969676741494b4b4b434141676f6f6f4d423841544e4d4843454b4b4b434141676f6f6f494143436969676741494b4b4b42415238434169554e434151555555454142425252515141454646464241415155554d4744694746424141515555554541424252525151414546464642414151586d43356868346768525141454646464241415155555545414242525251514145464f67494754427753436969676741494b4b4b434141676f6f6f494143436969676741455478344143436969676741494b4b4b434141676f6f6f494143436967775838414d4530654941676f6f6f494143436969676741494b4b4b434141676f6f30424577594f4b51554541424252525151414546464642414151555555454142425179594f4159555545414242525251514145464646424141515555554543422b514a6d6d4468434646424141515555554541424252525151414546464642416759364141524f486841494b4b4b434141676f6f6f494143436969676741494b4b474441784447676741494b4b4b434141676f6f6f494143436969676741494b7a426377773851526f6f4143436969676741494b4b4b434141676f6f6f494143436e5145444a67344a4252515141454646464241415155555545414242525251514145444a6f3442425252515141454646464241415155555545414242525251594c36414753614f454155555545414242525251514145464646424141515555554b416a594d44454961474141676f6f6f494143436969676741494b4b4b434141676f594d48454d4b4b434141676f6f6f494143436969676741494b4b4b434141764d467a444278684369676741494b4b4b434141676f6f6f494143436969676741496441514d6d44676b4646464241415155555545414242525251514145464646444167496c6a514145464646424141515555554541424252525151414546464a67765949614a4930514242525251514145464646424141515555554541424252546f434267776355676f6f494143436969676741494b4b4b434141676f6f6f494143426b776341776f6f6f494143436969676741494b4b4b434141676f6f6f4d423841544e4d4843454b4b4b434141676f6f6f494143436969676741494b4b4b42415238434169554e434151555555454142425252515141454646464241415155554d4744694746424141515555554541424252525151414546464642414151586d43356868346768525141454646464241415155555545414242525251514145464f67494754427753436969676741494b4b4b434141676f6f6f494143436969676741455478344143436969676741494b4b4b434141676f6f6f494143436967775838414d4530654941676f6f6f494143436969676741494b4b4b434141676f6f30424577594f4b51554541424252525151414546464642414151555555454142425179594f4159555545414242525251514145464646424141515555554543422b514a6d6d4468434646424141515555554541424252525151414546464642416759364141524f486841494b4b4b434141676f6f6f494143436969676741494b4b474441784447676741494b4b4b434141676f6f6f494143436969676741494b7a426377773851526f6f4143436969676741494b4b4b434141676f6f6f494143436e5145444a67344a4252515141454646464241415155555545414242525251514145444a6f3442425252515141454646464241415155555545414242525251594c36414753614f454155555545414242525251514145464646424141515555554b416a594d44454961474141676f6f6f494143436969676741494b4b4b434141676f594d48454d4b4b434141676f6f6f494143436969676741494b4b4b434141764d467a444278684369676741494b4b4b434141676f6f6f494143436969676741496441514d6d44676b4646464241415155555545414242525251514145464646444167496c6a514145464646424141515555554541424252525151414546464a67765949614a4930514242525251514145464646424141515555554541424252546f434267776355676f6f494143436969676741494b4b4b434141676f6f6f494143426b776341776f6f6f494143436969676741494b4b4b434141676f6f6f4d423841544e4d4843454b4b4b434141676f6f6f494143436969676741494b4b4b42415238434169554e434151555555454142425252515141454646464241415155554d4744694746424141515555554541424252525151414546464642414151586d43356868346768525141454646464241415155555545414242525251514145464f67494754427753436969676741494b4b4b434141676f6f6f494143436969676741455478344143436969676741494b4b4b434141676f6f6f494143436967775838414d4530654941676f6f6f494143436969676741494b4b4b434141676f6f30424577594f4b51554541424252525151414546464642414151555555454142425179594f4159555545414242525251514145464646424141515555554543422b514a6d6d4468434646424141515555554541424252525151414546464642416759364141524f486841494b4b4b434141676f6f6f494143436969676741494b4b474441784447676741494b4b4b434141676f6f6f494143436969676741494b7a426377773851526f6f4143436969676741494b4b4b434141676f6f6f494143436e5145444a67344a4252515141454646464241415155555545414242525251514145444a6f3442425252515141454646464241415155555545414242525251594c36414753614f454155555545414242525251514145464646424141515555554b416a594d44454961474141676f6f6f494143436969676741494b4b4b434141676f594d48454d4b4b434141676f6f6f494143436969676741494b4b4b434141764d467a444278684369676741494b4b4b434141676f6f6f494143436969676741496441514d6d44676b4646464241415155555545414242525251514145464646444167496c6a514145464646424141515555554541424252525151414546464a67765949614a4930514242525251514145464646424141515555554541424252546f434267776355676f6f494143436969676741494b4b4b434141676f6f6f494143426b776341776f6f6f494143436969676741494b4b4b434141676f6f6f4d423841544e4d4843454b4b4b434141676f6f6f494143436969676741494b4b4b42415238434169554e434151555555454142425252515141454646464241415155554d4744694746424141515555554541424252525151414546464642414151586d43356868346768525141454646464241415155555545414242525251514145464f67494754427753436969676741494b4b4b434141676f6f6f494143436969676741455478344143436969676741494b4b4b434141676f6f6f494143436967775838414d4530654941676f6f6f494143436969676741494b4b4b434141676f6f30424577594f4b51554541424252525151414546464642414151555555454142425179594f4159555545414242525251514145464646424141515555554543422b514a6d6d4468434646424141515555554541424252525151414546464642416759364141524f486841494b4b4b434141676f6f6f494143436969676741494b4b474441784447676741494b4b4b434141676f6f6f494143436969676741494b7a426377773851526f6f4143436969676741494b4b4b434141676f6f6f494143436e5145444a67344a4252515141454646464241415155555545414242525251514145444a6f3442425252515141454646464241415155555545414242525251594c36414753614f454155555545414242525251514145464646424141515555554b416a594d44454961474141676f6f6f494143436969676741494b4b4b434141676f594d48454d4b4b434141676f73496643367a6a6158576d49664e314641415155555545414242525251344741457a4441356d4676706853696767414b44436e777879536e4b45622b55354a5344487432444b61434141676f6f6f49414343696777636745444a694f2f51585a5041515555324a4f41415a4d3977587461425252515141454646464241675845494744415a7833327746776f6f6f4d4459424a695363386e537164636e6355724f324f36512f564641415155555545414242525459716f41426b363379656e4146464642677367496653334b47307675504a7a6e6a5a4b2f456a6975676741494b4b4b434141676f6f73496141415a4d31304e7846415155554f41494241795a48634a4f395241555555454142425252515149485a41675a4d4842304b4b4b4341416e304354736c78584369676741494b4b4b434141676f63745941426b364f2b2f56363841676f6f4d46504167496d44517745464646424141515555554f436f4251795948505874392b4956554541424179614f415155555545414242525251514145462b67514d6d44677546464241415158364246675a35784c6c42363653347868525141454646464241415155554f446f4241795a486438753959415555554741706751386e4f55765a386b314a4c727255586d366b6741494b4b4b434141676f6f6f4d4342434267774f5a41623657556f6f494143417774384c636c4a797a472f6b4f5148427a362b68314e41415155555545414242525251594e5143426b7847665876736e41494b484944412f3031796753527654634c6e5532696e53504c4670714e7653584c684b585463506971676741494b4b4b434141676f6f4d4a5341415a4f684a44324f41676f6f63454942736a50756b4f5465536635336b75636b756335456b47365535436c4e58776e303347636966626562436969676741494b4b4b434141676f4d496d44415a42424744364b414167723874774254563336394245744f33726a3859354c544e312b664b676c54586362596e74554a3768677747654e64736b384b4b4b434141676f6f6f49414357785577594c4a5658672b7567414a484a4843364569676857484c697a6e557a765955704f56637330334c4f6d75524b53643656354e496a4d7a70526b7138323955766f6e6747546b64306b75364f4141676f6f6f49414343696977665145444a7473333967774b4b4844594167512f434a4c637475637933352f6b45556b65332f7a7374556b75315878396d53523862797a74616b6c65324f6d4d415a4f78334233376f594143436969676741494b4b4c417a41514d6d4f36503252416f6f63474143503173434a546674756136336c55444a6e2f62386a4f4444627a66662f32435338795435786b6838434f37633349444a534f3647335642414151555555454142425254596d3441426b37335265324946464a696f7749564b665a4c723976542f44556b656e7551466336377464556b7532666b35515970626a73546a30306c4f33656b4c42562b6e73734c5053426a746867494b4b4b434141676f6f6f4d4455425179595450304f326e3846464e695641464e6e6d48727a697a306e66486e4a4b486e4645703370433569773236386b656649532b32397a4536594b31656c4258303553693959614d466c642f5a564a336c78324d396930757039374b4b434141676f6f6f49414365786377594c4c33573241484646426735414a584c594753792f623038336b6c55504c47466136686e5a4c7a7a69512f562f616c30437054637a3636777247473376516853653563447371306f764f587a7732594c432f4e45744a50536e4c4e737376726b3542355a4e426b65554f3356454142425252515141454652694667774751557438464f4b4b4441434157755577496c462b6e7032394e4b6f4f5474612f5337445a6a38586e6d77506c73357a6c386b75666761787878716c77386e4f557335474e663479775a4d56714c392b53525054484c4f7a6c365054484c376c59376b78676f6f6f4941434369696767414a37467a426773766462594163555547426b416b794e59656f4e32523764396b636c55504b4244667263426b7a49334341373554584e38636847364e593432654230532b394b7073733779745a6653764c5854542f496b6d6858396c6e366f4565304963456c676958663358504e544e6c6947576d6241676f6f6f4941434369696777495145444a684d3647625a56515555324b724162556f7831352f716e4f58624a5568434d646550446443446273434572366c39636f586d3244644b516f62484c6c76627236636d4f5a30426b3658356e352f6b477333572f35486b33356f614d4f644f3874366c6a2b6147436969676741494b4b4b434141714d514d474179697474674a7852515945384333314f795363676f2b596c4f48336a676655523573584c4d554b30742b74706d627277344366565361447877737870507a66675936747a7a6a734f35616a305656674136653750384d634555736d467333796e7737435458627237392f695433532f4c30386a33477a6f384b70344143436969676741494b4b44413941514d6d3037746e396c6742425459584f466e4a4a694651386b4f64772f314c6b31487972357566366a754f4d43746751724851747a54314c336a774a6d68434d6468744e2b7157554c2b45396c394a364d7664445a67735a4f38475335684f645a556b543269434b482b57354d6f4c6a2b5147436969676741494b4b4b434141714d544d474179756c7469687852515949734370326b795372362f6335352f62444a4b76725846507252545837715a4778514e4a5768533632437743732b3174746958656d6857786d4746484e714c6b6c7939724f7279322b56375a706963384361634e416e54634836682b585a62735066506b31792b2f4f77355353676762464e414151555555454142425253596d4941426b346e644d4c757267414a72435a797879536a702f74333755424c716b7a786d72534f7676744f3867416c486f33676f4e55527175322b5333317a394e4376743864716d714f73746b767978415a4f5a666a395367695874366b6d2f3032546a734f4d586b70797948494556637a597045727a536a58526a42525251514145464646424167654545444a674d5a2b6d524646426766414c6e4b426b6c742b7a703272744c52736d5464747a745251455475734e79772f64752b72584e4972436e54744c576143454c357a4d475448704878552b57594d6e504e442b39573549484e3139667347514a385332796c6b362f342f486c36525251514145464646424141515547456a42674d68436b683146416756454a6e4b384553736a57364c59336c55414a39536632305a594a6d4e4376357961355a756e674e6f7641336a7a4a34387435714b397936664c3573763363682b452b7a736b7930307a444f554e7a386c736e6556796e4d2f637352562f3539704f54734579315451454646464241415155555547434341675a4d4a6e6a54374c4943437377557548674a6c4e5241513776687130756735435637396c7332454c47724972417654484b31596e4b584a41383159504964492b51535361676e3834504e5432365135426b39592b6d5653533558766b2b77684b434a5451454646464241415155555547434341675a4d4a6e6a54374c4943436e7948414d55335766486d696a30324c4e664c3873437647596e627367455475727674497241554c3255566e684d566d374d6d2b5967426b784f4d4646613949624f454a6168704641542b7053517637526c50464f7639656c4f306c2b6b34544d75784b61434141676f6f6f494143436b78517749444a42472b6158565a416766385775455970356b6f47514c63397178527a5a64575a4d62553259484b665569746b58762b3257515357315674776f72327a424768715831594a37497a4a6438692b58442f4a303573446672354d6b324c35344c35475a676b5a4a6a514b76564c7739566a61397961684943343163666a493634596c495065656752436f44305067696d415667616d766456367a7676664e676337765952525151414546464644677941514d6d427a5a4466647946546751415237457943673566382f31504c466b6c507a31534b39313159414a6c3747744972425053554a4257566f3365485073415a4e624a586c734d34592b586a4a4c4b425938713930764354564d6149394d637675526a73466c753357716e69424944595a305035356932595075595475796770594a734e527476692f4a615a503856704a35393373506c2b497046564241415155555547435841675a4d64716e747552525159464d426c72776c554e4c337a76326a5371446b773575655a4d763772784d776f5576624b414c3778535431515a66705032535a314c5a755037664d74355044337a584a377a646e656c384a6c6e783077646e4a5a69494c676b5964486162796a4b6e315a59484d436f44772f546f4e61557a58734f752b7345513068614c2f736e7a6b63357343436969676741494b48496d41415a4d6a7564466570674954467942497775764d6e657367315a37364a4c7a2b61534c587547346759756769734e523965586b786f32344a39557661746d342f4a3349625a6e6154544273794332726a415a6d614a5a39646347476e544d4c446457316b5a784351326e5962537859495752775974532b5759663633456d6859355044745252736b6f61677a515277436532534255494f486a2f58562f6270754d32546735393837415251434b57536d3242525151414546464644674141554d6d427a6754665753464467776754736b75556553307a5458396556536e3452414358556c707451324355514d575153574b534f334c5843736a4d4d4b4f573362704a39547568397458336e3476556a7a6a566555594d6b79443851455656684a682f5a58535336304a734b59736b432b31424d4536515a46506c4f3261594e463761577a5a50556e6b35796c3144525a6b32576a3355376345317a7043376a5537374730396f386c2b65456b503737456d636b7371686b6f664a7a613336516c4c74464e46464241415155554f4534424179624865642b396167576d4a4d41443138314c682f38317966314c7347535a683967785875656d675969686973442b51354b664b454138494c377569414d6d4c42664d38736f58625179656b345369754d75325030787975374978592f52657a59356a7a674c70426b443475675a427672487378632f596a6d6c4e424478726873664c6b724471304a5461543556785153434e385548675a31476a794332426b7870456d55723232364c723875634b4b4b434141676f636e5941426b364f373556367741704d54614f744358485a4579774f7643306c6734704a6c3539636e7564516142397130434f79466d326b5350427933325475314f35734764746134724c337367762b664a446c6a63335a57447272654372303565386b712b5947797a7a75536646657a5773795155304b3633526f6943325346533131363039394938734365726163594e476b7634335364414d71356c784368726c4a62422b5644532b7a6a4a676f6f6f49414343696777416745444a694f3443585a424151586d436e776c4366553761447a593834412f35545a457749547233365149624c75617978386e6f5a68757478314477495473687a2f6f5844694657696e594f71387854594e4153333264596341423256634c5a4a745a49414e322f62385064644d6b5432674f54476259795a71765758336f4e7473343852364f535859536d5363314132575a715669664b414555616a4464654139393970514b4b4b434141676f6f734b5341415a4d6c6f64784d41515832496b445253417153306a35566c76726353306347504f6c51792f56755567535756562f71536b4e58542f4b696e7573373549414a2f2f59524b50725635727170693850554c774a523355626d53427367575361726f443347574c4e4142687a572f33306f7074793870446b77685957766c4f54395363355276722f71644b647439484e627836547762427441495a42796b6a6b6e65314953416b773242525251514145464642696867414754456434557536534141763874774d503843387058723070792b514f7747537067417355365257414a6c4241776f5645486873444c662f5734486d72416847414877524c736176754c456978706c7a7939336f51414143414153555242564b532b52416d53554e2f6c59677647485a6b434642616c4558423559696d454f6c51746b4b6b4d2b77736b6557315a7459592b4d7a574a514e4e586b35777243625539614a394f38714e54756167422b6b6e5170476167384a47614e6d306a774553394846626773536d676741494b4b4b44416941514d6d497a6f5a74675642525434446f486654504b373562735053334c6e417a41614d6d414378367046594f2b5a68436b357447636e7565344d30304d4d6d4e796f4245747163494e4c66315170316e71655468624a3938385a6177535943417777765972584d357343756b7a4a594a57635932746e4b69616e4c78644f5557474354582f66514a416c5675766c454c6836373745686c65746c724432342b4653434e3565674353734b3252525151414546464642674a41494754455a79492b794741677230436a796a4b62353573303564684b6d534452307777574756497241556e36546f4b34333643552b6441586c6f41524e57624c6c7235317166556f717a6b675678326755443675314e6749516753563142707333592b574a5039734255782b6b712f535a4c435a4f6174664f3145677834612b63675a504c556c5969577152577a53682b6d754330724b64323336546a46594d6b304f645a41306854766f583157514145464644687741514d6d42333644765477464a69375131746f67336639744537386575722b4e67416e48586159494c4d73493838352f6261644d516e324e766a5a5563647039337a494b744c494b546a7564693244483979376f474e4e7a4d4b695a4a4a2b627354315a4f74637550357636436a44723371732f53334c465a7565724a6e6c707a3847656c2b5358797665666e755347363537776750613756524b4b344e62324c32553873594b575451454646464241415158324c4744415a4d3833774e4d726f4d424d6765394f776f6f6874544646676e6575703936324654425a7067687347315168592b4c38637a436e486a42682f4e796a764f5a4e72366b453142747070396c38644d6d42316a6f64636a485457527a7654764b7a7a5138707045734e6c373547494f58463551657654484b464a59305066624e726c656c783966396b3379354245774a4d4e67555555454142425254596f3441426b7a336965326f46464a677277454d5944324d3056736f353634463462537467416b2b33434f77626b314338744c596e4e387559386a4447673971737473312b627574576b6f565556374f35624a49547a546b52425739724452492b766e4f4e54724636446b766d316b59646a342b74635a7770377349554a6a4a71326d444a335a4d38614d37466e43334a333553665539766b7a464f38384333316d58464c747449504e63636e2b2b5350746e512b4436754141676f6f6f494143537767594d466b437955305555474176416d30785531624b71616e38652b6e4d6743666464694369577754324c357456587669635654706f563037435649705a6264763948494c307035755662486a672f4d45464236562b537a764e5a744d2b5544435867712b3052526b376d353572545075544b664b345a7155624d694c342b6a594c4f766b39535668527144614b37375a5a5a474f36786e3330685a5745434a723856484e7936707a6366782b64385a774b4b4b434141676f6f6b4267776352516f6f4d42594252365168486573616179553831746a3765694b2f647046494b4b7446554833734752316e43386b6f57344a3758524a506a476e3737766f353470302f323870576c5a6571566b6b5a4851736176395978672f545a623638614f4d566639356d374e796e314b645a3852435432707870546b797061657556634145733033794c4a612f6b37354c552b3362324a4239636372396a32657a485374436b466d626d75682f535537443457447938546755555545414242665971594d426b722f796558414546356768514e4a4973434272763550504f36794730585155697948786f6c77786d47644f365373777971376e7371702f7a37696d3152327077684938737837704b3435727674736f4f4b32354c6763366131554939474c4a4d4472487845452f32794b3831415465756b3257436d5462796b6855752b732b624172792f754f4b2b4b35786d307075657050793949354f485268594f4b7a7264664e4a585a65635655454142425253596f4941426b776e654e4c7573774a454966447a4a366375316e714f70665444317939396c494f4a704d3159695957704b586435316c7563752b396e3234574c4e4e4a75322f6b706650386b5959596f4e5151763271343170487a78637a6c6f7965596778644a6b6b727934486f6d374a4d746b75513578336c386634755353336e764767546b4354594d6b2f7239696852355841433776644f636e4456747a2f6d445a76432b6f65517762544d643162723155424252525159434943426b776d6371507370674a484a7343304561615030486a3458625145374a523464683249654836536133534148702f6b6c67765164745650366a61303032776f70447176645a66365a5470494779783552336e4166382b57427758544a486a6770784545754e32577a37664c77312b7042457071686b4e37626f7132736a51313253482f7355616e3770546b6f57572f52796535375272484f4a5a64327439424179624863746539546755555545434255516b594d426e563762417a43696851424867415a6f555832727553384537336f62526442534a61723164306c6e4239527049624c414464566a2f50304a6c6d382b4d4c2b7348714e6531714e71787551324f464834496c4a322f326630494a6c6c4345644e7674623576696e41515958723774452b37672b446374675a4b2b356161354234394a51693259545a704c43792b765a38426b65537533564541424252525159437343426b79327775704246564267517748714a6644754d3432352b7a665a3848686a327632336d2b4b67753372586d4a6f496e306c7973675a69555632596f51496d5a4176564f69526b6b6c446f6331373761424d6765573370643366375a7957355475656264307a7938423364614c4a696167624c56354d73796f725a556266574f7330705370434533376d6636446b43745841496c4e5141356c6f6e61585a796165486c42452b56684b6c7a7241524632395866697556363531594b4b4b434141676f63695941426b794f353056366d41684d54614f73632f456153333539592f2b643164783842452f70446f5663656a747332722b6a6d75674754453357572b723351676e763375535145526d6f577959635862502b6e6e657759366f6663724f792f71324843696b50334b79636a65484f39585a313477504f776443333153516955644b653866614d455352366235454d446e704e44756254775974434c4a2f6d544a44395a4e7632334a45796a597a71545451454646464241415156324b4744415a4966596e6b6f42425a595765454d534868706f687a4c646f5637385067496d5448763570394b422f307a795863336e56306a796d70343773307241354879646154627a617337774d4e354f73566c6c5a5a6b6e4a766d56707139764c72553050722f307942706d7737396f697561532f55515731465161763163455366714350437a425444594a675a497662664743584670344e6934315852375a2b6648764a4f4876686b304242525251514145466469786777475448344a354f41515757457541426d4a523047744d453673502b556a7550664b4e39424577756e34546c58476e55684d475757694b30723554364a6d2f70754d304c6d4a79314d38336d68786559632b7932574f742f7258475075706b6c485050436178786e3031314f6d2b53547a55462b4b4d6d75417a6272584d4f315336434536564864397259534a4345677459766d30734c397967537157486d6f746e38744e586b327252757a693376714f525251514145464644684941514d6d42336c627661674445376841456c343836504c36326f4664582f64795470654564377070724a54446b724748315059524d486c5a796454426b55414447515938744a363677464c6668457954646d575a4e6d447934444c32616932534f6c5667316e31684a5a56326d67335467545a707a3031797a6559417246427a3130304f754d472b4c46664d394167616d546d583365425932393731753875395a75704e582b32596c355241795a397475794f6434374d6b385a584c39313655354f6f3750762f59546b6564457162677441464173716559616b5a78595a7343436969676741494b37456e41674d6d6534443274416b734b384e443638383344426275394c776d464d5a6c613862744a3372766b736161793252575431416334436b316559696f6458374b662b776959744e6b5a32504b77536d305267696131594f6e48533943454769496e4c55474247793535545a2f6f544c506857454d302f6f3369676270643376622b53653431784d4858504d594c6d676638757a524c354b3535754b3373396d4e4e6f4b5176344d6a71516d517a73414c5250746f4c6b3179746e4a6867336c583230596d526e4a504d482b3548573544356361572b7a45693675485133546c2b4b64583967784948392b75384a307a374833506252542f35754d48337a766b667935737959373739395530434245516b594d426e527a62417243765149744f2f797a774a696c5936616b634844527a63443563784a6d44627769464c41386539484c6e32334a4138716657536c484f623048314c625238446b59556c5952595a32357952385462744d435a72556d6961664c63473452564e646d4d5a543635435153624b4e6f423131554169576b506c534737385072426179723362694d6f574a6a7a525766426c544267444c62354e4e51685a4d747a46746943414a4e5572614b55583773485270345953705851524b4342433337585a4a4b486f396c5862754576437151646970394e742b4c6862677a5a6d6132586f734761364c566478434151574f5473434179644864386b6c664d4f39386b46624f673139397343504c676e6f49737a374f2b396d696662732f482f4a5939646a316d4c4e7544412b497635364570566d48616c387667524e57762b42686a342f31387a464d39336c796b687558692f3231386f4133314c575034546a37434a6a38555a4a626c49766e675a7033734d2b5a6847562b72352f6b676b7641384935736e575a4430644e744e724a6558707a6b6b73314a79436f68753253666a616b6a5a4a6a5143424c7873446947526d466b376d7562695650377866536f47696a356a7a4630746753613642654e4143354233574e6f42456d75555634454b3974473169425463495a61766e6d626e767865456941684d36677565377a4e38336e733851675952426e507662416e43696977497745444a6a7543396a517243645441434d4752396a566b3047436c4475316734336e42474e374e506b6d7a73736b32753850796c5251612f484a355558754346316b7379775359654d65646839306e4a5747614275396b382f47624b33536161514c6e4c64757a6f73653248383558364e6f676d2b346a59504b304a485636445a366b7a6c4e4d64313737644a4c546c4131595176666567317a39346f4f514455566d535a766c51723053367062737531473770475a7637487471454259334c594753382f66416b4146454e736b594334596530394c433834496b3962595268474e6355624e706a4931614f4152486170436b2f6c336f3679754248366231385864386e654c4f66636638396f416f4e516737394a536349667649355737537a335837517132304879332f312f695a4663774e6f7179413561594b4b44413941514d6d3037746e6839546a5977794d484e4c39572b566179416871417967316b4e4a2b6a36414d6a57566e36355148566e505a7447446f4b763363786261374370696376466e4a6871563432786f4a6664663575535474616a63382b4e5469726b794449647470323432485334496c314f3270376659397936787575782b7a6a732b3470592b3069795835797a31303542516c53454c6833723667317a4e4c6f4754736d517148764c54774d6b45536867354667776c532f334b5a367257483454547a6c4151753279414a5166752b7876513869766779485a5350424e74743078663476764c4742573965314e6571515251435a70394b38745935484e525949735073486c7561326a6e394f2b45564b4b44413367554d6d4f7a39466878464234594b6a50446754426f332f3348376c7952764c2b2b456e47694a6a387473517832486564734e6359785a357a694b6762446749723955376d7439534f632f3374517a71634556506b35682b645a4639334b6241524e5773574761445238767371416a574c5a4c2f54493969796c516666555464684577595a6c6a6769586e6176724e4571744d4a787044753269543766545053536951754d76325530326768506f75625350495344594a55322b59586a6546646d684c433638534a43476a6842666a61457a744c4530575358664b554e7450616d6256414d6d75563167616b39657839575854494d6f694c3749612b58654a386356533537734930692f716b7a395851414546597344455154436b774e43424559496a3759747368454e744e5a41795a46434742302b57504f552f766a3879412b37395356692b6b71566d71562f435065544677794150414b546e3875492f5371753262355755374f3744336172486162656e6a323041705339726858653078747947444a6851354c4d75396374485672645a314168415047484f753336732f4d4979776d33626473434559414442456a3757786e5154706e614e70544574365a366c4d785472724456687474302f7071575254584b396e685078594645444a515163703951497a4247676f375746694b6430445963514a446c664579546837386d73527332654769546833777962416768734b346a432f306c656164444551616141416d4d514d4741796872737776543459474a6e65506675464a4e6370722b2b66305832572b71546577624f5464497444386d4441777977462f76685950796372594e56474949567349597250307367596f6a354e6e59617a3676473632314e7270532b5130673230374b73414a6c6b64645837363630764159396c724a76756d426b6a494a446e316768314a68655a3831307a4375386330487044657357432f2f35506b643570747944366850733032476d6e654245764f32427a38426b6d65735932546258444d397a545a4c7854753550646c6d34336c5a676d55634c2b376a58646679535a35346a5937734f566a33366c5a6b6e6c4b713245645170446b636b32515a46374258615a313153424a4c644b3735574868345139416f415a52714874562f7932756c39577472304c64464772564d5232302b38624d74675031423044744a53696777433445444a6a73516e6d36357a41774d7431374e36766e464f386a634d4c444743742b3944586d31424d303466574b4251543842366362524b6b426c575779486271482f2f6353514f4837504b43536f7374782b4d385557532b4c366e43736373664952466d5572624b4e56594e57435a6877336530306d374d7575454143472b30306d7a71463659504e6168626e4b4a6c626936776f447373306c4e705974655a7169335a61386565386f303277704a33656371306b7a3176784f4e76656e44474f49593043786851325871575138624c39342f655449416b7233764151305730764b594753513567474d61576c686163654a4f487664433359796b667152765131616b3551683654574a426e626c4b466c66342f63627277434e5a687968784c774a34446656782b48756d646b7a7a6b745a377a333070347063445143426b794f356c62507656414449386335446e67597238475453387767344e3268476a795a56376974622f637a6c55795557795a685651777957336a776e4c6643777177375155594b74526c596770542f534c475344772b735447586959615a4f492b496a7851714861717861735368625a645769745077486b476b354e44376e586254616d4c3755547248685035507a4767383042456a7143352b2b3967394e67564379677668365557756e447456746d61377a304555374c766c7a5673456857464c76462b3838457041684b44433278705352756b6f506d53566b6d417a5a43426a5651456e6677797854674d676f5965575251326c6b4c4931356165477042306e6f66773253554c7956365a35396a6142717a534c68347a6143784963795a72324f315154576d6137446d795a4d7865485656303972745236347451494b4b444341674147544152416e6441674449784f36575476754b706b4c6463724f724572344c4231596779637347376c75592b576276756b3966472f5676306b385a424e4949624f436a37772b566c61632b4e2b6451416f50705457774d6d5442546c6233575a537038706b477178737734542b47375453625751383248494c736e7a5a413875346c62774972344e5441425056732b4870523677755973412f4c457a39393063344c667336554a49496c4e574f492f7951544c4d46696a4f33567052595166614e324351474d49526f5a4e6d5354314b574b32325079494575516848645a47562b48317361307444447663444d31355a7a6c377943666e33734f4f4b76626a4c46774b316c4a6457556261742f4d61717851564c4e49586e566f41387672325976414f734752327445504e4545532f673059616a6e7176554234556755554f4479425652394f446b2f674d4b2f49774d6868337464645852567a696d7677684c485531796a49396b2b6c4f436972465133524c6c694b7a3349734167784d4236725465366878736d706a4f6b384e704c51424662497743457130415a51325136562b6e2b2f78554464456f32344c6d53713843467a556569426b7953797133634c556d4e6557514d6b623175774d675a593650357841456c3876616d334142444d79686d716a6b444239577164647667524c61686f323255494553366a6e4d735a4778676572637458472b4e683071734b565371434561536e6452745a46445a54737138374f727537444c7063574a6a6848494951587459447135337a7357353635617a445749416d5a576a5649307134773165302f32556b3153444c55332b78646a5250504d7936425459496a58416c76767642764d733867393072796b5846646e72315251414546546968677747546149384c41794c547633785236763079785747714e7345516f4151367948395a747635726b5438724f7a3078792f655a4151786164706468737a555a7041796c38336b314870366871587a436c446259516742697930516365794f6b507854304a5672545467736a47574b587864373539783435675562667758742f7837702f6b4875554844307079785351312b34674141744f3456693045535943417a4a4c3662772f4849566779356c553362707a6b796358684c354e63624258387a7261732f454e4779666c376a73487644746b6b4646342b6c6a623030734945493974415342735957576371344669444a4154636170426b587243482f74636769512b6c782f4a624e647831387674302b69524d342f7a6c4a4363764166395a576168395a7959343871374f79326c667739306a6a365341416a73514d474379412b5142546d46675a4142454437475277444c46596a6b42395477496e4e51583955615762645447594f554d477175302f4e34534f7735646450626a6e656b394e6141794c364f41374a645a32536f38734a3175526c47374a53367664784f4344497671716e7935325a50614d5577626f76456631566d724a485650526a30444873786f31466c684f68595a4c6e5671442f38525a6d6f4e6456365761617a553839786d5136615a4543775a6531304f676e66584c66336d3356414353617530553551674354564b2b6835754f543642456c596b4f6261327a744c434c485065426b4c617a356e757432346a322b576a535669716d61796932772b5153625275583772373861426141795238704f687758794f5957674d6b6647777a6f346271693863354849453249454a5170415a48367364566936776248446d63736547564b4b4241493244415a4a7a443459356c6851546d492f4e6164546f434436323838397439385a426c5532425441597246506a494a6d52564d727943594d71753971516d654c46724b6c726e4c4c48644a47324c5a316c703074713258736d6e52325736394641497133666e57764a4e4e64737a315a6d515374465955583657654341455848675348616b787a7158565671495642583268386e3877516672616f6a676b506a675237614b7a4b5167464a6c6a4c6d5865766171482f4147466a5538476a726e6c426e686d414a2f384565652f744b476576306b376f573731327977347737736b6b496c46444d743233664b45455370743477706f36317a5670616d4165323772535a2b7657364756314d6636744245543532507839623351542b72684b6b5a4f6f613256327a476c4d503279444a6f552f6a4f7462666c585775652b6941534e734867795072334248335555434253516f594d426e6662614d674a41386d503739453177794d4c49486b4a6c73566f503747465a497764596458572b656965324965774f765548544a51756d6d355a4848556f4d465a79727539322b6a38746f724f38766555414d4e355a335361344d677a6b74534d417a5a7256386e6841576e523942392b7a737041517a54656a5a3556724a6148306a6f4e68584e68566c6344756b475350323036384e516b5446755a3158346c79524f624878496749466779685541424436703143562f3653384274556150594a6b475347715271742b64336747775341695666576e5367412f343530384b594f734e59717375474573416a49344c764c3672724d347547544b7075494b522b76637a4b55474d685a386c3361676a393749774f45616974515a4b783176345a692b556839324f6241524863434c435464636e7644763965554e4f4c31634b5959754f306d6b4d655756366241677163514d434179666747524c754352753264675a48783353643731432f41662f414a6e42424559627247764e5a4f336548686b58644b61547a307a456f353336593744334538454e6443732b336e71325a35315835534b345472346b475a4b556438764859536c716d6c645a63565875623643436f7443717a5541712f4c48472f524e767a486d4b774b4d7451344c786b58584665625755494e6b7237564e6c674668696b457456484d6c796b6f55776b574d4357704c75314d6f654e35712f69636f775336535733764e674a545a466a3939534c73412f33356855716d4a4e4f33617162497570664b4d666f79524a684f38366c31447a71532f61674e516143453657766478766972792f39534e3870322b414b3744496a5577416766362b644f365472384d6559564b71444145674947544a5a413276456d6263446b61556e75575235556474774e5436664178674a6b4a64544d457a34796c576457347830733076427066355745423677787462626f4c4e6c6646306c797867336543612f58786e394d71563342696b4d4555397150764c753362714d475136327277696f613979344834706963683841486d5334324263596f514a43784c796a43397737784965366b4a586a364735326251664359514352546c366155495450474d54584750686b5147654e647355384b4b4b42415238434179666947524273776f6442695456636558302f746b514b724356793043614351655443722f576553357a66546433683366742b4e374a4e616c36544e6d476a3778547666764d504e6c426d43507a7745626449345868744536515a552b48715a78685352756877785378547a4e5931704e32326d537632636a49706c706751756332363355574357414f4f584141686a725761556b566e78366a495634466a6b626c6d7953676a4b746f3270572f7766674b7773327a51464449684d3837375a61775555554f414541675a4d786a6367534d6574515249444a754f37502f5a6f47414543436d33324359554e5a3757334e6f566a7954375a5a614e416167325573464a46743746454d58564a6550476731375a61644a62436e7853555a426f4c713651773157665a6c57726d585376483741756974466b71544f66442b65586c514e53513465743537586c4a66716c733849416b6a322b79565667576c7856345074416334456164326a5876546e4b653575646b3054414e68304b6e3232724c4c4a4f3836726d5a556c616e6c5646416d2b76673373327130384e596548755a656b4d6d54393233427174575066395132322f445a74572b6e625773727353714f44567a70433650335334747a4c683777616f486e2b6a326c796d426b75347931557a3734742f2b4d532b3150564879776274745147527755672b6f6741494b6a452f41674d6e34376b6b624d506c675757576a4c676b367674373239346a2f375047753466755473474c497155763942683436584b6c6e4b6e6478642f336b3778427a382b65744246463751775a48572f746b6b326b72733636516f704d4553586978536c56663436476d426b70574451533057575155544f57426d6d4b7842464e3431632f6e425a4757765473454e336a5635577a354857525a3342705549654243526b3974314564706c31436d4c6766377a47744d76614c774a505558756f324859517138726d713037505674637a734350374f4b6272626e5a645567736f4675315254473357612f4475335966357a6b5a75576979437a7271393978534e644d734a692f41525244627476666c2b2f7a4e3845324467454449754f34442f5a4341515555324b7541415a4f39387665652f4f464a6270366b466d306b364d4337756f75575a4233546c6643665870614637577357734233546e527050583868417547377044765034795a3467452b4b7943377049566763424642374d2b56315a74374873617732537a466f6d6c384242445a4c774c766d3662646c7064775162612f436b372b4e5179784154504b6b42464d355a4d7950496c71446f365449314977677373583162624a62377776356a79484259396c34784c594b2f58617a655175325857593067435a6b51764e6f4130374c6e6362762f4557677a6d6c68395939353076616d372f57624a4b756b7578633662444c796d394c7379395874522b303852596a4b6743486a697a2f524c676c6f55627a375a6868665a726a4a6a5564554e4d64316441515555324a6541415a4e397963382f372b38315252725a386a394b3049516973464e6f4c486e4953694f72744270492b62636b704c592f4a636e48796d73714b3271736372317565304b424e69326651416c66302f6750617a74315a313651344d4f64374a4e6c486a3449794e524153562f4e4562497a434f59514b426c7161735779415a4e4659345167543575523070656c4d735455487a4c63466b333975572b5375335136544c484b5763476e5264653279352f5849416d4245715a4a7a476f4753625a7a56786a44625546543374582f2f485a4f7462656a386a6547374e4875763476386d3036676842562b624e73546f41673239675247654e58502b6368537565733241794c7279726d6641676f6f4d4345424179626a76566d2f6e4f534a536470336f6e676f345232714d54662b732f766b4a4b5479313156504e7530762f336e6d335a6b6151476b2f3533745454506666314f54513971644f79666e4c5256307743562f334e583557417967586d494e4166595232366b3737514861324a4e6372675a4b7a7a446a475335744143646b75513761684169624c39496d56696537524c4750387a764a7756674d74464872645a6e747479645959572b484b5a594d6b324c43454b356b795a704a73623652516a4a6969304451794b702b3076565074394d6755554f62336e6648544e7059494a6c425341384d37376453426e6f78693232307770503338523961385a674d6961384b356d77494b4b48424941675a4d786e303371514e43304f53635454644a58326275387854716d74514855365a617a4d6f3449614f456433684f764d47746f43374b7249434b537a4675414c7644585439552f72504c4b536d737964654c4773766d456a793551766c595639726f322b2b7679774d765530374f4f2b504162464f6e334442465a5674746c774554726f484d6945755869326c58796546624247527238495267624a30437866575458555057536c2b7832315674794270626c4b58797456555075754c3279775a4a574a574a7355566a544442656c736c5757724537627434494d413376676558725136686a516c30666673397633376e4c6e79766666375233663230427367786e425562574f53692f372f7837383633793567765a725858367a444c5445646335702f736f6f494143436b78497749444a2b47385753332f79626c746243472b4b645531596259523339516d656e48494f4f77394e504b6752454b4c6f4a652b5162314c386b756c4d33597955397576506a6e3849484555507955436f377749533146676e492b46795466624a72474b74585579796c353565416957383637754c74757541435a6b32424a566f5a487a3054547668337749733675386d323741746a653931433949535343484468774b35517a562b462b63465664624a3846673253464b6e327842386657467a5156645038714b684c74446a7a4251677546364c432f4d336d332f3370706f35654963792f616237373978445331624a4e6770564839725134742f386474704d4f35586d464774634c472f4d4d4757547741676632382b3948327541756f73434369687754414947544b5a7a7436646531365356766e594a6e43793747734a586b7243434141395542465159743953327149585a4e686e48484876656442392b6274752b774465627565545535754472646475356b74773243654e73586e437548703856586b694e4a37424152734732323634444a7533352b4a7970414e31327779533152684b726379304b4f444846674a574e61715067363530374e5655496b504a4f2b31434e4d64477537744d756b794e5a587741414941424a524546556e3177444c66792b72686f6b61517533556e656c5a746d517a5865746f5472766352594b555043314c6b64396e53545057626a487544613463736b6549544f30625154632b4a316a315358624351554978506256466a6e6a6d6c424d3065304c6a5044337761614141676f6f6f4d426141707338614b3531516e6661534743716455316d5854543154683554736b6c596b7051483356554b7350474f3548764c5178524659306d703564306e2f725046697972336d36346b5170426d586b434664304e746d776e77626e494e5450464f49462b76326e67776633785a77766f694d33596d485a34704b504f434b41546d61753054676969624247356d58634d59417959455032716468662b5468414474724d595551616232314864363335546b596a3354566c684f6e45414b325369304e35666a7a697055323130355a4e557877506238445a6a334e325265346461626447706e384464706b35575831756e2f4d653944554f47334367424c363935344968684d49655233757137795662763967664c393530376b4f726256546437636d4457465a703269314253423738735534587655727249706f49414343696777714941426b30453564334b77716463315759544551387135532f43456a377834384671324d5a5744496f3238434b627762684d5034573051706631386e66546574692f55534a6b565543473933375a59674d4b6a7457594938386c584c55544b75394538354c65316675705a6d635a4258524a5775716c4c632f4d37564176487a67717573442f424d42373436644e6a7938507a4f6c4f4675674a6a43356a772b304367714c597a6c514c4c6658654f4f6a462f5758342f2b546c6a6e47414a76774e39446565584e7a2b675467564661507361393333654d73704d7a3975302f65654d4c4258754d6348625772746b586a3833375950373977767765386e7647343248346d5779772f5a705357434f6c572f7533656b45442b33386a7465614c50767334793750585a666e3757614d314e2b70566673796177724e703159396b4e73726f49414343696977695941426b303330397266766f645131575661512f3343526664494755685a4e475769507a62764f42452f2b4c676d5639436c7579644c484e4a59623741756d31417756706f6573323569445036392b797145746e626d754534474f39355764655665324c2f4452642b774c6c33656b6133324f6470746e6c55444a6f766f54314531706c793165394a44323652493449664f6766524755573761394c736b6c79385a4d42377255736a7575756432694b546e38507678754f6661664a57467177617a323469525862583549626149334c756a58505a506372396d47715472636e3155623730627a554d31554b34725955766469473431566b5269487050485071716c43344d5532764542622f4a6c787948676359324d6c48333676794a5a7132782b5837784f414f38513239504b385a48444f436f7a344f33614949386872556b41424253596f594d426b676a6574366649683154565a39553551464b344e6f4e534143756d2f793753504a6e6c31575547454e48326d39505131337657656c5a327936624c4a7649733662377250746c634e57635a70463975516f56416675736c65344f743544586379536d3757325168504370586549736b5831757734775975363867376a61396e47654f6f4755586a6f376d746a433567777461304748356a323936637a2b7633495568756d2f70677045307964574b593975775136324a596969797933796f50534d6d32566d6954384c684d63356539445836466143676f50306672717037544246594f6836796b2f4f4d6c647971356b6464316d76634e7362612b4c6c3442494e386a4a377a51426c45584277363131624d4144443730384c32395931436b3033616b302f70344d654f4d386c41494b4b4b44416467514d6d477a48645a6448506253364a7076616b526263446151735530434f423355657467696938506b796a5a6f4c4e5a68534d314c61344570643957575a592f5674512b72787249414b332b656438454e6f5a43795175554237615365446f62302b2f694e506f49545869546f582f7243534a544572384c574f45797641504b44554d57476143706b7671395258595570504e346853563767696c5a394733515965744c625a356d57596b4b6e42754b6468787a76496655766f3369334a6735704f6b705679337855367a645133706c76772b306c3751354e6c303365595659496b464731744337664f3631594e704c5254663668647776326c3861343234327a54526b326552515671743145665a394e2b3733742f4d70624975714b744d7a3176572f306e793548666f357433546b43516a4f382f6356736e33754a787437553862336356476f4c4a4e6755555545414242535972594d426b737266754242302f394c6f6d6d39346c706c6b51524c6c64576272325a354e516932465749314f68426b2f342b4a45314f384135356756553576566830536c35714a30333357644b383778766c4f517035594a5a71595776753430484651496c3352523456744c346e523057357953495175436b2b31703076397166552b4f674c70584e6c414d4345515253747656753637794143564d496171624f6f387276535064614b475a4a445a6a614b4b35377931557575477a4c752f4a3171574b2b3966416b6432794f7336306779627975646c66376f59396b42765556707131426c6e56724d6e5437515832646563736f482b75533539544671635a4d58534f34747339323978495536533576543843516743635a46474e744c733837316a746a76785251514145464a694e67774751797432706852342b7472736c436b41556238422f787935545868525a73533730544169633169444c5555734e6b6f4d79726e374c4a7169464d35366b42465336506438366656497035557543546152466a61626450386f6a5347615a39384856745449386855454b396b726178346770314e316a525a742b4e6a49532b494171724e4b335365464473793069684673346d62566241354b526c366c4a39454b51414c7135747532425a4561654f5256594f34703673322b3655354b484e7a67524d794d533552766c646e48586365617662724e7358396e74626d52374535332f536b3048516432794b6663344c7142425957585a71344c792b387a76636e66725444624238665a4f4c482b6d2b464e2b3964656e6251354c6364552f395a456c70666e664f30546b2f3958663466713244746166756e6543304c733837687274674878525151414546446c4c41674d6e6833645a6a726d75793774316b65574f434a3563744878644e346545647a31722f354333726e6e534a2f616a564d61742b79716f727958525078784b374245342b316e787350312b6965344e74516b43454c42456134376575654d4d536f785434624273506a41524b79497759657a76356a45414b34323256786f4e5a4e3542434c59426c323678566563677371593776546e4c657a67484a2b47443534447064685835636449424d6d4f636c2b61556c4f722b7449456b3939612b584c42652b4a696a46644b476856725a696d657435515a567570745153484c326273477254764379564b5757613151747373333659337347714b37747335796d723331797463314a5732654a3369535734393946636e6e63663670355441515555554f446f42517959484f5951734b374a5a7665566249476166554951685866695a7a576d556454674352384a4f75796973587250764f6b2b314b4a597431456270515a543269424b2f64375155306434462f6e4f70624d4553336a594a424f686266534a51416d7671612b65304637765835634d43385a634e2b562f3376316a576b39664e6b72663668797a416959454a4b686851754e64665072564e716250314f4b575a4474516a506464367736714a46644d636f4d6b4e30777936392b656251644a6176635a59395257714b7369735a49503957703231616a42553666347a4171734c467178615a6d2b45676861564b443271387363614d666255452b6e4c766c4f676543364a5067327530464167747043395739525052643959656f4e5538694761717a34784a524d4d6b5072712f73316d567a3069566f33424933576e51726d38727844335457506f344143436968776c41494754413733746c76585a4c683732775a502b4d2f37764562396737622b79623557757546686f775a554b47705a703153514c6344334e316b756d51634941696c397752532b742b71632f69636b595a6c4f476c37663177466d716753426b6e3859377062753955697a416867384648576e39767a30696a33396c353541796c5753334b4d637078615a5a566e7564685566736b6e616241536d627a4675616d504b7a417458374175626330303153454c396c316d4e51737655537147757879346155384471314339574365704f75396846487861646777796c52564e2f4e706d3256382f506d4a6c586f48616f724a74463139762b6e4a7047745a595232576531535049717831686c3231387232534d2f334e6e7044354d387341517443477773436e4b3050352b333764442f39334a35336c5875747473716f49414343696977677344512f32697663476f333359474164553247527a35314d335748514d7169315070612b34535031457359532b5064375270517155455576755a7a48703433615151325a6b33312b585450675a3966616c68306630533944423657756e55314e756e6247505a645a566c68416c7439395648576e5a4a4659494c6c57716e685531663877502b614451784246615a44315561646b5658655861664752773253584734474f4c384c504f7933303442756c655350646e43447a702f6b7263313572704f4534734654624979447671424b2f64367130372f36444b67787379684c35637344347a45566a36576f61583354785761643773514c676872644941624c61524d45377a7152776356316b313034784b704a512f4334504f38516968354441515555554543424651554d6d4b77494e74484e7257757976527648366a74742f52502b777a367255572b677a5436683973415947786b657334497066482b567058573731306636667a6559636f656d5467626234305239696672414e45616a546671305373426b316e6d5963745558534b6e5447466270483045556975637978596348795073334f314f673953354c486f77704f30793334645533527269766631706564576f504b2b3630533755537a4744353457303256695a696568434e356179377453713265653564483576377343684c5a5a4e7373336f395a4a334e43717255476976645a64414a6d50564e5279476f7754686d71643636664469664d37326f6d2b58524459444d2b2f7537612f7435352f75334a5077747243384b6958652f70696734313866715655797263586e654d6431422b364b4141676f6f63445143426b794f356c6248756962627639653845396b47543770464e4c733965472b6e2f676c7a31616651546c4d434b74334d46494970464b72647046476668454b3633536b2f664d30443253473065637638626e70392b4863444b656471486a78584f543442447537466b30744e6d37394c776f4e653236697255494d6b6e4b65764d5a5748514d6c7a6533374976304545534836752f4979614c67524e56703357746578316b666c435832726a6435514d686d4e7550376f6771454a573352434e653872764e2f656376355644544363616f6c2b4c6a6b47324363474d7671444776494448724941497832465a654a7343436969676741494b54454441674d6b4562744b4158625375795943595378794b68386d322f736d3871533438534c524c4632395358484f4a726d317445365a6a644c4e543273444b4a6f5573655965355a71655151732b37326e2b317453765a336f457655616245634962584a32485670573232396e78664b734754645a653935534551643749464b46773561386f48775a62334a53456f7547675a62683759623945556769566f3871497467647775535332495444446f6c5275634231666174752f66426c32637579735a5157526b4544436156322b446e335872436d3272543573656c36447a7245414639556b494a6e62482f6875545044554a4163472b414168546332774b4b4b434141676f6f634b5143426b794f37385a623132522f39357833732b7653785152533573324e702f686c58583248514572663669663775354c317a387a4461713256637132655a59505850374a374b7144416f517351724b50414b6257514b455a4c31686d7264784873594b6e7476722b544679354659792f667757484a624f723138506656706f4143436969676741494b39416f594d446e65675746646b2f33656539375a72634554507336617a6c423753635a4a572f396b366b76722f6d52355a37746236344b56564e726c6b6d743243682b374b316a73397735366467574f523441704a4d744d50356b31625958734d444b53714531436c686e314f5a6a6152333256576d4f46544a5a4e47315047616930565676383553796e7132683658594453426b6c3055474e373065747866415155555545414242665973594d426b7a7a64677a36653372736d656230427a6568346132766f6e382b6f476b486265426b2f654d35374c574c6f6e46426d39516d6472706f764d6d374a444b6e304e6f4c43694375383238363779324e71692b675373554d4f4c787051635874747376354c6b444f5545394b332b3366396745737776314a79634971684d305343517852512b366f6d77556b69337366777a44365455642b42422b46517a746c7632756a674f6657457033586f2b566c353565736b6f5747533636447773693079425a686f503143785676576d7239334362553349327665353531336942737277344e575957465344743171375a314b357666374c507567567172376645536d5372396f5870596853697263566f75352f3372655331366a6e6358674546464642414151554f524d4341795948637941307577376f6d472b42746356636556477639457a374f612f79487636312f776750426d4e74726b31797170344e6378365a4659386438336256766264465833756e6d36323232396e7a315041524c714e7477762b62454c4f48387643533353584c726e67377838453742564949594c2b2f354f646b44424c52346b536c55503638664e376c47706c32304c365a67314b384a744d78724c47336331697068617361724e756d4d2b2b354d674657622f7161636a566f695a3039437a527557526539622f57656456614b3646304d3254446549306c304261426342704a30686579494646464241415155556d433167774d5452675942315463593944696934324761666e474e4264316c31704b312f4d726172363375417233336b515953552b5538314839765036382f49507068714730504135412b53334c45424a4b444164497072397141535847484a595149706e3138546e65566875774755396d737953395a74394b6b4e6f4c53426c5839493871596b314c47675053584a546459396b66767452594169774455376943576779594c7161372b61354a4764544b66506c59414c2f396570415a5a3574614f577655434f4f32735a5a6235506652576241676f6f6f49414343687941674147544137694a4131364364553047784e7a696f616a783064592f7161742b394a33793635336743512b2b2b323445444869587635304b736d7166756f4556336c6c6d355a5a6e4a5348446872523650764c61357253475666764e3976734f6d4c777a43652f6331355650794e446f6532656531554d656b2b535a36317a6b697674516e36624e54726c755764466b78634e38782b62552b6d6b666b4d6b736558423569506168646c506433657a2f674352334c36646950503561353751452f50387743565050327361307679763264484657646b72392f72792f703874654d646b7769374a552f6e585a67376d6441676f6f6f494143437578507749444a2f757a48656d62726d6f7a317a737a75463447486d6f46536c7a71647454584c38726231543668447359393274354a617a39536a6935514f384a447833514e33686d424a445a7a5549456f6254476b2f3531336a586252644230796f3138473737375878446a675068374d6130334a344d4e3333366947632f394b6c6b36782b7770686847654e7570737136533935534134667048743258675a52642f4259736677357178627975624d37664c2b352f62623951736b7159416c59625165486262314162694f4b7a733449714e5575466f743262746938737946496834444b32594f2b6d312b7a2b436969676741494b54453741674d6e6b62746c4f4f6d78646b353077622b556b2f47652f58627234707865633553314e2f5a4e7446782f7436776f503872554135784f54334b6b45556b37622b556a6467765a3746426f64756847773657616e7a417179384c433962714d4f7941334b7a6e2b656849652b626259506c3956434f41655a4f625073486c73434a652f645a6d64574f445950775738724257585a3751564a66716c6e66385a464e346a43766b7a6a574765634745685a3453627461464f6d585646596d4d62793742516d766d2b536533584f54364350594d6d325678466a7a505856554b6d42466c5942327251524c476b4c3033616e4150477a5466344f62646f2f3931644141515555554f416f42417959484d567458757369725775794674766f646d4a5a7a62622b79627969694e537734463139567547355a5a4a6431416d3553356b69416478446b2f44314d6f3261463230513566706c39526365494669756c465747654731724b57494b512f5a6c717652397235743633363451524c305a736d7932316135654167327a6a6f385864523934304b52577a4e67614e5657653233547174354c3837684b64504538536c754b753757456c714d494b504152524b4234366230576d766c4d5953466b43666b756274454847527954682f6c36734f52665a4767524b4b456738686b625730364b705033327254363361642f35477a36756c516c4346514c424e4151555555454142426459554d4743794a74775237575a646b384f36325264744d6c44346646626a50396c504b797570734b724e74686f507637395a44723773772f41716657474b443447544e6f6853502b392b623955483647583751565a484f79336f4a4531744251706155704f682f6e7a6f3154664930446a666a49367930733156642f42752f4c4a4f733762722f6732697a793964634e41584a666e46736733586561576537582b38424534496e72537656636542675a524e372f44692f5739554376623262636d394a6c68433447424b6a62394c4e616a536c363143514869497868537a6555475658553146484f4a61504959434369696767414937467a4267736e5079535a3751756961547647304c4f383244595632366d476b38507a6c6a6a2f6331775a4f687378416f316e6937637435664c38556246335a385378743837354b42465235305472616c5070434e73757930494c4a63356a5779684237587377464247544a7958724b6c61396a4759562f5742443059677753427147765331363664354e6e4e4479355170765973327938444b63744b375736376e307279747a326e6f36344e52587750736648336146475743706d676d7a622b48725254662f716d4153333657374e7048397866415155555545434230516f594d426e7472526c64783678724d7270624d6e69486541693961354b7a4a766e5a4755666e5166537053377a4476327a6e4f4259424f64714e7937475833586566327a47746f3037376d5a5778556e2b2b5468324e5a61364e7a495a5a30344a34312f6a784a514455486f7548492b3476797a4e507166315945715976315866642f797a4a6c5764637741644b7867672f4a694248494736495a69426c434d58566a33474e6368385a4137577864445231674e36362b75454f61672b4b494d384c717377723772774b4245484b65566b712f4232794b61434141676f6f634a4143426b774f38725a7537614b7361374931327445642b49496c6b4545716646383242513873424474342f6430477653664c3453706c66365a5154436e7259646e4c787138374c5969705348587142786b386245506768586556743957595a76576d4a4b546f55795431712b5872625a32766539784e2f37306830454e6d5447312f6b615137585978705a6d524e30626a6568795268616531744e75346474584b3672315672564e4250416c3331785170576644375635576672696c3262464a4f2b776f7a6c782f6d645954556e3233794245795768336c503759727a57722f6d634b594b624e6e3758714b6643692f4861392f6d334e6a334a68506466353364686c622b58396668764b45617378475a545141454646426849594a552f79414f6430734d6367494231545137674a6935354364514149576a433631497a397147654250564f6e72586b4d64764e654f6974745651756e6f53766a3647784f73376c7934573267534b434b4d7655577945414d2f51537a4d6667376a55716f49414368797a7738535250546d4c51354a44767374656d6741493746544267736c5075677a715a6455304f366e59756454486e61724a4f654b6a764e744b7979546768654c4c733072547654334b4f6371436653634c58783941655659713963713133547349714c7173324d68713630344c346d67444d6f75576b567a3258327975676741494b5445506750675a4d706e476a374b5543436b78447749444a4e4f375457487470585a4f7833706e74392b75364a58685370394e307a2f69365a73724f764755746d52355361784d77333536766a3648647153796a7a4c552b4f736c744237726f63796468355a323273517250437a7254676768344d69566e32634457514e3062354441733258714c4a48574a3749386c65574f536d7a52485a387247353550554650564254727a6c672f524e3761464778547054652b70306e6e614b7a36366e396e536e43537a69342f705a7a5967437232326a5867333161326a55726548664852725479313639364b442b6643634354435673702f6f7735616337396565376474495454324b4769574e414151555547466a41674d6e416f4564344f4f7561484f464e627937357a4d3255486570696442735061545872354b3936667335446579324b2b67506c4966345952466b613938586c516c2b5a68466f4e517a51654c4f73444a636437565450315a346a6a6a2b5559724f7245746456476f493269724c526e6c494b67592b6e7270763034686d4b7a4648436c514f2b704769796d35374743566876554933754b5a59527037356c546e487054632f6366586f44416543315165374e53352b5276686a394e767232465931367948484f5a414f7979353539317a4c37397539753232395366315670422f4c2f653654686247415165556745466a6c6641674d6e7833767568723979364a6b4f4c547539345a4a7451362b51364d37724f6968593165454a5277424d6e716374565568435172342b6c6e53314a665669676743364270303362505a4c63767a6b4941616f4c6258725145652f506b72495036756b6647516f66486e472f682b72614951525379446f6755484b62447372396b7479374234712f45617a30564f7633734254364a6b576e68376f58486b63424252525151414546446c5441674d6d4233746739585a5a315466594550374c5473765172675250474133564a756f30704f7451356f566a73633873505031756d6a497a73557262576e65394a3873336d3644774962724b4b78466c4b2f5a636164474971786d6e4c536a466275346752484a684377323241377245394439386a364f5a4f757a4230494f567253586752374354642f782b534d4f566e303859373477524c7a746b63694f4148575357766d485077646d55742f6e356365394f4f754c3843436969676741494b4b44424c7749434a59324e6f416575614443303637654e6475676d657a4676565a61677369796c7038584259707a476450636b48312b7738726e2f6279564a6879737072316a7a656c485a6a3257434b35746232356951586d644946374c43765177565336444a5437577277705032346245434635614337713234394b636e746c3569573935776b317970756e32796d59753251306c4d706f49414343696967774c4549474441356c6a7539322b753072736c75766164774e6f6f416b6e464335736b465a6e54343265566462444a506a71484e576c70343157756e5a7366316d703349756d692f5876563455396d657a41534b75336262493875443931537559392f3948444b515571396c566b43463654524d70534b51577476585331624a45316141494d766c4a38723264307a793842583264564d4646464241415155555547427041514d6d53314f3534526f43316a565a412b304964726c67435a37634e416b726e6e51623253616b2f2f4d3635506f4562307479766e4c784245392b59593137543830536170665578674d7055364b2b737361787072594c307a4775575472396f6337714b685356584f554266477258766f762b316b414b71797a3956366b6263766f6b5a7967726f417a524231597959685563437269536e624a7368736f646b7678423663412f4a7146664e675555554541424252525159484142417961446b3372416a6f423154527753737752755747715a7a424d69323452364a32524e4846716a546b4e6448656670536642597064307979654d364f7a792f43534b7363717970625875314a4339734f6e33524a4464503869766c657a7a67453478363139517562434c395a626e6a476a77686746492f48797167306d616f554f7548347243504b426c467458364b5753595447537832557745464646424167536b4c4744435a3874326254742b74617a4b646537584c6e7434367957504b43616c4c774c764c544e6b355455386e50743273734e4d754d37724c2f6735394c705a2b2f4f31795544362f7a776f6e754677536c694e75327a4f5458482b4659307835303363335338725751713855306956723532664c6862327a4245325758655a7a7968356a3633734e714a776e795a3253554b4f6e4e7537484a762f33494b4f457677456e53554b74486870466a6e396b62416a3252774546464642414151576d4c37444a6631716d662f56657753344672477579532b31706e4f74567a5150506d354b514a55433762706d79777a4c46666531317a5a51645674795a616c7333594d4b4b4f47394a386f504e68524d6f6f4e6a706c44325776593876546e4c56737646586b3743303747664b3132535659464862487965357862494864727442426268485a454178526177324d735a7556566149476a70446855795544355378634d5642723853444b61434141676f6f6f4d4452436867774f6470627637634c7436374a33756848642b4a32656442584a7946726f6d316e4c686b6e5a4a3355315754616e354f325435305470757a3831656975626e474831676d597343494f7761587a4e34656e447353466b6e786b38536b6e76775642496d72636e4b78634357506f467a7458315a3271644e736b6a3537386c552f72417471785858744f4268586658366131553337342f5366677a6a302f56354c76585841414d6f7649617251706f494143436969676741496243786777325a6a5141367768594632544e64414f634a645641675a6b6d2f4467644a305a446d394e51716f2b425370726a594f786b375858762b7a445a486446484b3778386b6e49316a6d47786d6f6f763134753950314a666d62475254505669796c66745632345a4f55636739452b722f47304a61756b7a513737564d6b7149626731524474487565384554376a2f6c7977426c5870736973686565596754655177464646424141515555554d434169574e6758774c574e646d582f486a4f7530724170506161394834434a7754642b68365776316765324b6872515648494d62645641796264465847344e7159332f4e47594c334c41766c45506f7933696575306b724a517a71354631564a65774a726a43644a312f4837412f4875714541764f6d34507a7a6c72455942307a504f6e5553416a532f7575587a6558674646464241415155554f42494241795a4863714e4865706e574e526e706a646c527439594a6d4c5264753351545047477153726339755152507150637878766148535735584f7662794a46656130386d2b465845656b4f5365593779774c66574a56584659485966327369537a61747a5530354f423850596b4a793766595072576a62665574324d2f374b5a54634937647a2b74585141454646464241675a454b4744415a36593035736d355a312b5449626e6935334530444a6c574e75685a4d7757416c44744c31753433704b685366664e37496d4a6b365549745455717a796e445036642b7772347342793953517661487a4948476d4c753836367454644a3871546d6833644f387243526a594d70643263585533436d3747506646564241415155555547446941675a4d4a6e344444366a376658564e57446231436764306a56374b43515747437069305237316d6d6162534c53444c4e67516c434a7777586564624937675a5a454338702f53445a5a50623155527139343539525a7a717746516370755451434935527132625a3967644a37744273544759534b79335a4e685059357853637a58727533676f6f6f49414343696967774a4943426b795768484b7a6e516a30315458355a424a714e7a78714a7a33774a4c7355324562417050616656574f6f373047475162654e7163344a39525a4f557a70343769547662547037374376695641714b76464c736c666131736d4a5358555a34326648362b6953584b42742f744e517a2b644b794f37766464776734426364426f5941434369696767414a4849574441354368753836517573712b75435266416b716b50507149436c354f3661577432647073426b39716c30356656556769656e4c4b6e6e2f7575632f4c734a4251767054466c3646704e483439395252776f5745723259306c4f56567a756b6553426134793373355a364a6e55353475664d5758484155415a43414141644d456c45515652706a634d667a53354f77546d61572b32464b71434141676f6f6f414143426b776342324d566f4d446a7a79583538553448503167434a303859613866743139494375776959314d353854784d3447564f644531623359426f523752746c6851382b5a3757506b33596b6a326c466e48727044306c43335248613379593532394b6a367a7333764736535a7a6266766c664a587476676b45653171314e776a7570326537454b4b4b434141676f6f594d44454d5441466762736d7555737a626148326d616b4c5a4a7977386f56746d674b37444a6930516d4f7263384c79787a2b78344259655930594579306133553552756b4953736d3030614b77766476546b415258646673636b426a325466503039792b6336313369634a76384d324252525151414546464644675941584d4d446e5957337451463059744277496e76466752705730556779527773756d443145474254655269396855777154786a71584e4351564b436771656263642f656e34546777624531676b523169684950374c38774545443738503950705a374a716a56524275724b3641397a2f5249555955705462645464496476704a615076765231555141454646464241415155324644426773694767752b395567436b4b4e65506b354a307a767a554a366673385a4e6d6d4962447667456c56476b4f644579776f53736f307442396f62742f626b35782f4772647a304635654f636c4c6d794e654a4d6d62427a6f443978765848793748477a49594d314158393336595379573564354c4c644872435053465938733937373645645545414242525251514145466469426777475148794a3569634145654b477647796664316a76366d6b6e46434452546275415847456a43705376757563384a4b554f31797559394f6374747833384b74396535744a664f44457a772b79533048507450566b3779674f655a726534494441353979456f66373652496f595a6e33747247794645456d6c336d66784732306b776f6f6f494143436967776c4941426b36456b5063342b4246673567366b4d4245394f334f6b417934695363644b2b53373250506e724f32514a74774752733952415731546c68316162724a506e5751446659594d6e2f51424930717375493433756d4a4a3859794c6b39544c76554d4e382f356e6f6d5a4f7a395a766c623271566d797550764a666e794675364268315241415155555545414242555974594d426b314c66487a69307038434e4e786b6c33544c2b365a4a7951646d38626c38435941795a56616c3664457771532f6b355a446e675457594d6c2f364e4878746a666c3157432b433450386666644248664276767839714e4e4f4b4c353733695266324f4c35786e686f566948437562767339744f4b5061735432525251514145464646424167614d554d4742796c4c663959432f3678307247795a31367276446c4a65506b4e51643739644f3773436b45544b727176446f6e464c386b63504b4f4e5734424756445536366a746d4b6668594e4375597650524a47645a77335356585369302b38366d6e736b7872555a45515663434a576676675045336b69445636316142644673464646424141515555554f415142517959484f4a64395a7034754757617a7531364b4869344a6358386a544c745857424b415a4f4b525a32545a796535644a4b546451542f7341524f2f6d564a57594d6c4a34513657354b2f616235313478307447383730712b6332353731622b527578354732633347617a437270697a395162567879623343323177776f6f6f494143436969774c5145444a7475533962686a45506a4a6b6e46793635374f55504352774d6c514b322b4d3458716e316f6370426b79713851386c2b61306b742b2b672f32734a6d6c412f5a31377254734e35575a4b72544f304744747866487453765634363536794b7344307a794738333173474c526f515656357856304a564479304948767034645451414546464642414151556d4c3244415a504b3330417459516f414842544a4f6274617a4c646b434245355941634b325734457042307971314d2b58774d6c564f33547a367073594c506e4f636362714b362f59633843434b5369584c4830673234496c6e76393974373853577a6d6242563233777570424656424141515555554f415942417959484d4e6439687172774d2b556a4a4f62394a41387651524f336933587a67514f49574253735a6a575163624a7554703633666f6d466e6a74483134734233376838714d6e4a766e566e5933432f7a6b52675658716d64536c79702b55354b5a37364d6551707951496458344c7567354a367245555545414242525251344a6745444a676330393332577176416555724779513136534a356369734f2b5436367443787853774b526973637731675a4f2b2b69616e54554a6770625a6a4c2f42614857365a3548486c69322b585a59512f7676585231333843367162774e3641326c6a682b7a4a373673736c707a354345386356537957327a6f4f736d717536726741494b4b4b4341416b636e594d446b36473635463977496e4b3845547137546f2f496e4a6550454a5457334e32514f4d57434331717a364a762b5a354c734b4a315041654f662f324e754a797a4c4372484246753038537873552b32794f54334c6270414e4f757944795a53714d4f444d475364706e67447856624337704f35533761547755555545414242525159685941426b314863426a75785a77476d416c446a35426f392f586873795468686956506273414b48476a4370537250716d2f427a706f446463466a4f5352364e597150334c6a332f6879526e54454b577962376232354951554b564e4b626a3142306e75304d466a576b34333032546676703566415155555545414242525359684941426b306e634a6a75354934474c6c38424a7434416e702b64645a347244386c426e4730626730414d6d56616c62333853704f502b2f444b74596661515a537451746f58374a47426f4658392f52644954614d33334c6c492b68722f53422f6a4b753271796c763074796d795376476b736e37596343436969676741494b4b44413141514d6d5537746a396e6358417063707857483733705639574d6b342b6551754f6e4c67353643657771584c4e523744752b44554e32474b4630734932354b6e4a766e6c4173455376697a6c4f365a4773494567524730556933374b6d4470592b734c3049514b366258746145757176664757452f62564c436969676741494b4b4b44415a41514d6d457a6d56746e525051697731436c54645337624f546454427367323466585a506654725545373546306b755769376d74556b49564e6d4f513442372f65726d55766b6449344132746b624779362b55546e32745a484b4d706137524435534154673036565473795963694973536d676741494b4b4b4341416770734b4744415a454e41647a384b676175556a4a4e4c647137326d79566f3870416b587a674b695745763875464a667230636b726f4c6a786a323842357478414a76534d49554f42725a45446361615639505567712b6e723330372f564a4c6a5743766c3675724e357a35715976314630687132524b4257704851476b584646424141515555554543423251494754427764436977766350575363584b527a6936383831777a546b7942583936546c59696f5730473765524b2b7468322b77453254504b47357a4c4d6b47584e525a5149374248687165314353752b2f784e7230345362664f457348484f2b367854353561415155555545414242525134534145444a6764355737326f4c51746375325363584b427a6e692b582b6959455437362b35543463777547666d65533635554a594376565a6833425258734e634166374e2b566953303565743770766b4e7964677874533833322f366561306b7a39744476352b6268434c43745832785a4a58777532525451414546464642414151555547466a41674d6e416f42377571415375587a4a4f7a747535367338334753662f635651697131337353354e6375657a434f2b5a386254747367585a6c4a416f6e6e796b4a5539756d304a36646847417037584f6c6e736b2f37616a6a7079314c556265466364395569755a2b664564393844514b4b4b434141676f6f6f4d4452435267774f6270623767567651594436433777446661374f73542f645a4a78733462535450795431494f6f44494855682b4e703275414a6e53504c335365712f4f37644b386b6354757478544a586c586b78314430567071695779377356547730354f303955722b4d736e46746e31696a362b4141676f6f6f49414343687937674147545978384258762b514174546a49484279747335425035486b7265586434483866386f5154503962626b2f78387559627a4a586e48784b2f48377338586f47344a3955746f62303753725155304262396653504c7970714f7661356247336b622f723147434a5253667259314379582b346a5a4e3554415555554541424252525151494554436867776355516f4d4c7a414c55766768474b57626674714b577a3678306e65502f78704a3366454479623536644a725669486861397468436e514c70784a342b504f4a5869704c594c63723556772b79617532634332333736776352624431426b6c657349567a65556746464642414151555555454342486745444a67344c4262596e634e73534f4745715172645272344e565956363476644f502f736a2f6d4f5230705a632f6b5752583953424744334f414858784e6b346c4267564c712f3079357464667a64306e4f6b32544946624c615a5a64783468774553316736324b614141676f6f6f49414343696977497745444a6a7543396a52484b3041712f644f532f475353632f636f2f4730534d6b35347363724f4d6255764a446c6c7557447151374469682b3377424b6a783835546d736734686d3467674b50564d36766a6c64357a72334c5252514a71364c6a2f5848496a674363475366393730344f36766741494b4b4b434141676f6f734a7141415a5056764e7861675530456d495a77383836796f505634724b5a5441796676334f516b453971583156472b702f543365796530577371456945665231592b5567434764655743536534796956357433677157776e394563356e5a4a4872584259652b5a354836642f51386847326344456e64565141454646464241415158324b3244415a4c2f2b6e7630344261687463724d5350506e4248674c714954426435316b487a4850694a4e386f312f65744a4878744f7a79426579663576584a5a6e796e4c43482f746743377a44354c636f626b65696869764776416b712b53687a5970523958424d3136506f71303042425252515141454646464267547749475450594537326b564b4d75726b6e484369365644752b316a5464624a5a77394d6a4b6b4d544d6d684d5257484b546d3277784c3438624b4d634d30696f7162506f772f7245762f66316241435676333970636249425661345270596d766b786e65366267334c6c4d2b566e68554736716741494b4b4b434141676f6f4d4c5341415a4f68525432654175734a734f6f4767524e71466653314a35626743637578486b4b6a3243744658326b556536586f712b3277424b6a4663597479535377683352635550495172707435497579543277355063636347466e54624a34354e6371625064765a4c632f784251764159464646424141515555554f415142417959484d4a6439426f4f53594441515a327577304e5674373278544e64706932684f386672506c75527653736370664d765874734d52754843534e7a57586335556b4c7a7563792f754f4b7946373570484e64316b4669506f6a6665327153523658354565624837346c435456514b4352725530414242525251514145464642694a674147546b647749753646416a38434e532f446b346a302f5938554d697352533636526d616b774a6b566f505a4233516548662b66465071764831644b50434b4a46636f577a303379625558376a4839445a3661354a664c5a54444e6a4e6f6b48323875362b564a574458726b70314c5a596e697930372f387230434252525151414546464644673841514d6d427a655066574b446b2b41642b755a726e5054475a663239424938656432454c70324878747066616a5a304879496e64436c3274534e416467566a73725a7a4a586e6645536a39514a4a334a7a6c7a756461504a766c45456d71352f4843536b33634d5070586b566b6c656367513258714943436969676741494b4b44424a41514d6d6b377874647670494258366b424534496e707978783443436b335670346d2b5033496770477656426b616b6166473037444945504a766e7063696d732f6e4b587737697370613769636b6c65756353574c793342456a4c4662416f6f6f494143436969676741496a465442674d744962593763555743427733544a6468776530627674384d31336e49794f5670502b317867504c4a313976705032305736734a3344334a41386f7572494a45594f3966567a7645354c662b7252496b4f6c6e6e5372366368466f6c544d7568794c4e4e415155555545414242525251594f5143426b7847666f50736e67494c424669686f79354e2f4e3039327a367642452b6f4b54476d526d4662736d466f54796a426e7a48317a3736734c6e4471736f7a77393556643735446b45617366356944326546435372795735524c6d616630397978594f344d693943415155555545414242525134496745444a6b64307337335567786167506b494e6e4e5470454f3046557869574654695942734d797670387572382f745549556144326371722f7331307a5a34714f6268326a5a746755636e755532354247703555505455706f4143436969676741494b4b4b44415a41554d6d457a3231746c784257594b584c316b62437854462b52625466436b426c456f526c6b2f627a392b66516c7a6c6b57755152476d592f42352f556747516c2b3766354a374c5846734e786d7677506d54764c5870336a5753764843383362566e436969676741494b4b4b434141676f73466a426773746a494c525359717341355339594a30312f2b3977415877564b706251446c74456d2b4a776d3147577051354d51726e7563766b6a426469497754323351464b474a3635644c3946795568614764545141454646464241415155555547445341675a4d4a6e3337374c774353776c515a50495a706237456a79593554664d3635564a484747616a6235592b66437a4a4479556841454d527a5038377a4f4539797034457270586b4f6332356d5972446c42796241676f6f6f4941434369696767414b54466a42674d756e625a2b635632466a67704a30415367326d64414d72664a39736b6b58744d303151354f2b5445427a6849792f71714e674f533443364e47394f516a59547a586f306833562f76526f464646424141515555554f436f4251795948505874392b495657456e67687a76426c55736e5951724f63357567794664574f714962543133672b556d6f56304c6a336a4d316932577462516f6f6f494143436969676741494b54463741674d6e6b623645586f4941434375784e344e564a4c6c504f2f6f496b763753336e6e686942525251514145464646424141515547466a42674d6a436f68314e414151574f5249436976353973727658486b767a7a6b5679376c366d4141676f6f6f4941434369687742414947544937674a6e754a436969677742594579436970712b47384a736c6c7433414f44366d4141676f6f6f49414343696967774e3445444a6a736a6434544b36434141704d564f464f5344795835376e49464c3278716d557a326f75793441676f6f6f4941434369696767414b746741455478344d4343696967774b6f434c464e3976624c54323070326951562f5631563065775555554541424252525151494652437867774766587473584d4b4b4b44413641542b7633627558316679415934432b486b46685a614b37556d3867494b4b2b46666f536169496a67656770534c6841515168564352655145475052454b723841494b3257534b577943547a64307a6332592b322b374d6e505037664739314d76652b6d4f547a473633752f69724f33562f4a3859384141514945434241675149444152516b59544337716e42364741414543393133676c7953504846492b53764c3666553855514941414151494543424167514f4145416761544536434c4a454341774b6a4175306e65506e542f4d386d644a482b4e506f7661424167514945434141414543425035587747446942345141415149456a6846344c4d6d504e31373461704a506a6e6d6a31784167514941414151494543424259464443594c46354e5a77494543505146766b33793143483275795250397974494a4543414141454342416751494e41544d4a6a307243555249454267566543564a422f664b5039346b70395748305a76416751494543424167414142417363494745794f5566496141675149584b2f4141306c2b54764c67676543394a4f39634c34636e4a30434141414543424167517542594267386d31584e707a45694241344e3445506b7a793275477476795a35394e342b7872734945434241674141424167514962416b59544c62757053304241675361416b386d2b6635473445744a766d67576b455741414145434241675149454467564149476b31504a79795641674d4435432f795135496c447a552b5476487a2b6c54556b514941414151494543424167634473434270506263665170424167517544534272354d386333696f7635506353664c627054326b3579464167414142416751494543447758774947457a386242416751495042764172386e65656a774839386b65525954415149454342416751494141675773534d4a6863303755394b774543424934546543504a2b3465582f70486b34655065356c55454342416751494141415149454c6b664159484935742f516b42416751754332426d3938756554504a4237663177543648414145434241675149454341774971417757546c556e6f5349454367492f426c6b75634f55623564306a4758516f414141514945434241676349594342704d7a5049704b424167514f4b48417a572b58664a586b2b524e32455532414141454342416751494544675a4149476b35505243795a41674d445a43666a624a576433456f554945434241674141424167524f4a5741774f5a573858414945434a796e7741744a336b72796d62396463703448306f6f414151494543424167514b416a594444704f45736851494141415149454342416751494141415149456867514d4a6b504855705541415149454342416751494141415149454342446f4342684d4f73355343424167514941414151494543424167514941416753454267386e517356516c51494141415149454342416751494141415149454f6749476b34367a46414945434241675149414141514945434241675147424977474179644378564352416751494141415149454342416751494141675936417761546a4c4955414151494543424167514941414151494543424159456a43594442314c5651494543424167514941414151494543424167514b416a594444704f45736851494141415149454342416751494141415149456867514d4a6b504855705541415149454342416751494141415149454342446f4342684d4f73355343424167514941414151494543424167514941416753454267386e517356516c51494141415149454342416751494141415149454f6749476b34367a46414945434241675149414141514945434241675147424977474179644378564352416751494141415149454342416751494141675936417761546a4c4955414151494543424167514941414151494543424159456a43594442314c5651494543424167514941414151494543424167514b416a594444704f45736851494141415149454342416751494141415149456867514d4a6b504855705541415149454342416751494141415149454342446f4342684d4f73355343424167514941414151494543424167514941416753454267386e517356516c51494141415149454342416751494141415149454f6749476b34367a46414945434241675149414141514945434241675147424977474179644378564352416751494141415149454342416751494141675936417761546a4c4955414151494543424167514941414151494543424159456a43594442314c5651494543424167514941414151494543424167514b416a594444704f45736851494141415149454342416751494141415149456867514d4a6b504855705541415149454342416751494141415149454342446f4342684d4f73355343424167514941414151494543424167514941416753454267386e517356516c51494141415149454342416751494141415149454f6749476b34367a46414945434241675149414141514945434241675147424977474179644378564352416751494141415149454342416751494141675936417761546a4c4955414151494543424167514941414151494543424159456a43594442314c5651494543424167514941414151494543424167514b416a594444704f45736851494141415149454342416751494141415149456867514d4a6b504855705541415149454342416751494141415149454342446f4342684d4f73355343424167514941414151494543424167514941416753454267386e517356516c51494141415149454342416751494141415149454f6749476b34367a46414945434241675149414141514945434241675147424977474179644378564352416751494141415149454342416751494141675936417761546a4c4955414151494543424167514941414151494543424159456a43594442314c5651494543424167514941414151494543424167514b416a594444704f45736851494141415149454342416751494141415149456867514d4a6b504855705541415149454342416751494141415149454342446f4342684d4f73355343424167514941414151494543424167514941416753454267386e517356516c51494141415149454342416751494141415149454f6749476b34367a46414945434241675149414141514945434241675147424977474179644378564352416751494141415149454342416751494141675936417761546a4c4955414151494543424167514941414151494543424159456a43594442314c5651494543424167514941414151494543424167514b416a594444704f45736851494141415149454342416751494141415149456867514d4a6b504855705541415149454342416751494141415149454342446f4342684d4f73355343424167514941414151494543424167514941416753454267386e517356516c51494141415149454342416751494141415149454f6749476b34367a46414945434241675149414141514945434241675147424977474179644378564352416751494141415149454342416751494141675936417761546a4c4955414151494543424167514941414151494543424159456a43594442314c5651494543424167514941414151494543424167514b416a594444704f45736851494141415149454342416751494141415149456867514d4a6b504855705541415149454342416751494141415149454342446f4342684d4f73355343424167514941414151494543424167514941416753454267386e517356516c51494141415149454342416751494141415149454f6749476b34367a46414945434241675149414141514945434241675147424977474179644378564352416751494141415149454342416751494141675936417761546a4c4955414151494543424167514941414151494543424159456a43594442314c5651494543424167514941414151494543424167514b416a594444704f45736851494141415149454342416751494141415149456867514d4a6b504855705541415149454342416751494141415149454342446f4342684d4f73355343424167514941414151494543424167514941416753454267386e517356516c51494141415149454342416751494141415149454f6749476b34367a46414945434241675149414141514945434241675147424977474179644378564352416751494141415149454342416751494141675936417761546a4c4955414151494543424167514941414151494543424159456a43594442314c5651494543424167514941414151494543424167514b416a594444704f45736851494141415149454342416751494141415149456867514d4a6b504855705541415149454342416751494141415149454342446f4342684d4f73355343424167514941414151494543424167514941416753454267386e517356516c51494141415149454342416751494141415149454f6749476b34367a46414945434241675149414141514945434241675147424977474179644378564352416751494141415149454342416751494141675936417761546a4c4955414151494543424167514941414151494543424159456a43594442314c5651494543424167514941414151494543424167514b416a594444704f45736851494141415149454342416751494141415149456867514d4a6b504855705541415149454342416751494141415149454342446f4342684d4f73355343424167514941414151494543424167514941416753454267386e517356516c51494141415149454342416751494141415149454f6749476b34367a46414945434241675149414141514945434241675147424977474179644378564352416751494141415149454342416751494141675936417761546a4c4955414151494543424167514941414151494543424159456a43594442314c5651494543424167514941414151494543424167514b416a594444704f45736851494141415149454342416751494141415149456867514d4a6b504855705541415149454342416751494141415149454342446f4342684d4f73355343424167514941414151494543424167514941416753454267386e517356516c51494141415149454342416751494141415149454f6749476b34367a46414945434241675149414141514945434241675147424977474179644378564352416751494141415149454342416751494141675936417761546a4c4955414151494543424167514941414151494543424159456a43594442314c5651494543424167514941414151494543424167514b416a594444704f45736851494141415149454342416751494141415149456867514d4a6b504855705541415149454342416751494141415149454342446f4342684d4f73355343424167514941414151494543424167514941416753454267386e517356516c51494141415149454342416751494141415149454f6749476b34367a46414945434241675149414141514945434241675147424977474179644378564352416751494141415149454342416751494141675936417761546a4c4955414151494543424167514941414151494543424159456a43594442314c5651494543424167514941414151494543424167514b416a594444704f45736851494141415149454342416751494141415149456867514d4a6b504855705541415149454342416751494141415149454342446f4350774436383550456e7a696d437741414141415355564f524b35435949493d);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `ID` int(11) NOT NULL,
  `Position` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`ID`, `Position`) VALUES
(3, 'Encoder'),
(4, 'Book Keeper'),
(5, 'Accountant'),
(6, 'Sales Staff'),
(7, 'Assistant Purchaser'),
(8, 'Purchaser'),
(9, 'Manager'),
(11, 'Engineer IV'),
(12, 'BPLO'),
(13, NULL),
(14, 'Manager'),
(15, 'Programmer'),
(16, 'LRCO II');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_province`
--

CREATE TABLE `tbl_province` (
  `ID` int(255) NOT NULL,
  `Province` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_province`
--

INSERT INTO `tbl_province` (`ID`, `Province`) VALUES
(1, 'Negros Occidental'),
(2, 'Negros Oriental');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purok`
--

CREATE TABLE `tbl_purok` (
  `ID` bigint(255) NOT NULL,
  `Purok` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purok`
--

INSERT INTO `tbl_purok` (`ID`, `Purok`) VALUES
(1, 'Purok 1'),
(2, 'Purok 2'),
(3, 'Purok 3'),
(4, 'Purok 4'),
(5, 'Purok 5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_queueing_departments`
--

CREATE TABLE `tbl_queueing_departments` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `Department` varchar(100) NOT NULL,
  `Application_ID` bigint(20) NOT NULL,
  `Pass_count` int(10) NOT NULL,
  `Done` tinyint(1) NOT NULL DEFAULT '0',
  `Date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_queueing_departments`
--

INSERT INTO `tbl_queueing_departments` (`ID`, `User_ID`, `Position`, `Department`, `Application_ID`, `Pass_count`, `Done`, `Date_created`) VALUES
(1, NULL, NULL, 'VR', 1, 0, 1, '2018-09-11 13:27:25'),
(2, NULL, NULL, 'AS', 1, 0, 1, '2018-09-11 13:33:49'),
(3, NULL, NULL, 'VR', 2, 0, 1, '2018-09-11 13:36:57'),
(4, NULL, NULL, 'CH', 2, 0, 1, '2018-09-11 13:38:25'),
(5, NULL, NULL, 'AS', 2, 0, 1, '2018-09-11 13:39:02'),
(6, NULL, NULL, 'CH', 4, 0, 1, '2018-09-11 13:41:52'),
(7, NULL, NULL, 'CO', 1, 0, 1, '2018-09-11 13:42:41'),
(8, NULL, NULL, 'VR', 4, 0, 0, '2018-09-11 13:42:42'),
(9, NULL, NULL, 'CO', 2, 0, 1, '2018-09-11 13:42:55'),
(10, NULL, NULL, 'CN', 1, 0, 1, '2018-09-11 13:43:01'),
(12, NULL, NULL, 'RE', 1, 0, 1, '2018-09-11 13:51:05'),
(13, NULL, NULL, 'RE', 2, 0, 0, '2018-09-11 13:51:08'),
(14, NULL, NULL, 'VR', 5, 0, 1, '2018-09-11 13:52:58'),
(16, NULL, NULL, 'VR', 6, 0, 1, '2018-09-11 13:56:59'),
(17, NULL, NULL, 'VR', 7, 0, 1, '2018-09-11 14:00:00'),
(18, NULL, NULL, 'AS', 6, 0, 0, '2018-09-11 14:02:27'),
(19, NULL, NULL, 'AS', 7, 0, 0, '2018-09-11 14:06:38'),
(20, NULL, NULL, 'CO', 0, 0, 0, '2018-09-11 14:10:37'),
(21, NULL, NULL, 'VR', 8, 0, 1, '2018-09-11 14:21:53'),
(22, NULL, NULL, 'AS', 8, 0, 0, '2018-09-11 14:22:48'),
(23, NULL, NULL, 'AS', 5, 0, 0, '2018-09-11 14:57:33'),
(24, NULL, NULL, 'CH', 1, 0, 0, '2018-09-15 16:13:13'),
(25, NULL, NULL, 'AS', 9, 0, 0, '2018-09-18 15:32:55'),
(26, NULL, NULL, 'VR', 9, 0, 0, '2018-09-18 17:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_queueing_logs`
--

CREATE TABLE `tbl_queueing_logs` (
  `ID` bigint(20) NOT NULL,
  `Person_in_charge` varchar(255) NOT NULL COMMENT 'LAST NAME, FIRST NAME MIDDLE NAME',
  `Position` varchar(50) NOT NULL,
  `Task` varchar(50) NOT NULL,
  `Application_ID` int(11) NOT NULL,
  `Number` int(11) NOT NULL,
  `Date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Date_finished` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_queueing_logs`
--

INSERT INTO `tbl_queueing_logs` (`ID`, `Person_in_charge`, `Position`, `Task`, `Application_ID`, `Number`, `Date_created`, `Date_finished`) VALUES
(1, 'Huelgas, Paul Anthony', '', '', 4, 0, '2018-09-11 13:13:25', '2018-09-11 01:09:49'),
(2, 'Huelgas, Paul Anthony', '', '', 8, 0, '2018-09-11 13:13:34', '2018-09-11 02:09:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_queueing_numbers`
--

CREATE TABLE `tbl_queueing_numbers` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Window` varchar(10) NOT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `Priority_type` tinyint(1) DEFAULT '0' COMMENT 'PRIORITY/REGULAR',
  `Application_ID` bigint(20) DEFAULT NULL,
  `Number` bigint(20) DEFAULT NULL,
  `Date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Pass_count` int(11) NOT NULL,
  `Number_type` varchar(15) DEFAULT NULL COMMENT 'registration/preprocess',
  `Done` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_queueing_numbers`
--

INSERT INTO `tbl_queueing_numbers` (`ID`, `User_ID`, `Window`, `Position`, `Priority_type`, `Application_ID`, `Number`, `Date_created`, `Pass_count`, `Number_type`, `Done`) VALUES
(1, 23, 'undefined', NULL, 0, 1, 1, '2018-09-11 01:09:15', 0, 'registration', 1),
(2, NULL, '', NULL, 0, 2, 2, '2018-09-11 13:13:16', 0, 'registration', 1),
(3, NULL, '', NULL, 0, 4, 3, '2018-09-11 13:13:25', 0, 'registration', 1),
(4, NULL, '', NULL, 0, 8, 4, '2018-09-11 13:13:34', 0, 'registration', 1),
(5, NULL, '', NULL, 0, NULL, 5, '2018-09-11 13:13:46', 0, 'registration', 0),
(6, NULL, '', NULL, 0, NULL, 6, '2018-09-11 13:13:46', 0, 'registration', 0),
(7, NULL, '', NULL, 0, NULL, 7, '2018-09-11 15:13:12', 0, 'registration', 0),
(8, NULL, '', NULL, 0, NULL, 8, '2018-09-11 15:13:22', 0, 'registration', 0),
(9, NULL, '', NULL, 0, NULL, 9, '2018-09-11 15:13:27', 0, 'registration', 0),
(10, NULL, '', NULL, 0, NULL, 10, '2018-09-11 15:13:31', 0, 'registration', 0),
(11, NULL, '', NULL, 0, NULL, 11, '2018-09-11 15:14:08', 0, 'registration', 0),
(12, NULL, '', NULL, 0, NULL, 12, '2018-09-11 15:14:45', 0, 'registration', 0),
(13, NULL, '', NULL, 0, NULL, 13, '2018-09-11 15:15:08', 0, 'registration', 0),
(14, NULL, '', NULL, 0, NULL, 14, '2018-09-11 15:15:31', 0, 'registration', 0),
(15, NULL, '', NULL, 0, NULL, 15, '2018-09-11 15:16:53', 0, 'registration', 0),
(16, NULL, '', NULL, 0, NULL, 16, '2018-09-11 15:17:11', 0, 'registration', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_queueing_windows`
--

CREATE TABLE `tbl_queueing_windows` (
  `ID` bigint(20) NOT NULL,
  `User_ID` bigint(20) NOT NULL,
  `Window` varchar(10) NOT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `Task` varchar(50) NOT NULL,
  `Date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ready_to_assess`
--

CREATE TABLE `tbl_ready_to_assess` (
  `ID` bigint(255) NOT NULL,
  `Cycle_ID` bigint(255) NOT NULL,
  `Date_accepted` datetime DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `Approved_by` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ready_to_assess`
--

INSERT INTO `tbl_ready_to_assess` (`ID`, `Cycle_ID`, `Date_accepted`, `Status`, `Approved_by`) VALUES
(1, 1, '2018-09-18 18:10:14', 'Done', 'Paul Anthony Huelgas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requirements`
--

CREATE TABLE `tbl_requirements` (
  `ID` int(11) NOT NULL,
  `Cycle_ID` bigint(11) NOT NULL,
  `Occupancy_permit` tinyint(1) DEFAULT NULL,
  `Barangay_clearance` tinyint(1) DEFAULT NULL,
  `Zoning_clearance` tinyint(1) DEFAULT NULL,
  `Sanitary_permit_health_certificate` tinyint(1) DEFAULT NULL,
  `Real_property_tax_clearance` tinyint(1) DEFAULT NULL,
  `City_environmental_certificate` tinyint(1) DEFAULT NULL,
  `Market_clearance` tinyint(1) DEFAULT NULL,
  `Livestock_slaugtering_clearance` tinyint(1) DEFAULT NULL,
  `Valid_fire_safety_inspection_certificate` tinyint(1) DEFAULT NULL,
  `Date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_requirements`
--

INSERT INTO `tbl_requirements` (`ID`, `Cycle_ID`, `Occupancy_permit`, `Barangay_clearance`, `Zoning_clearance`, `Sanitary_permit_health_certificate`, `Real_property_tax_clearance`, `City_environmental_certificate`, `Market_clearance`, `Livestock_slaugtering_clearance`, `Valid_fire_safety_inspection_certificate`, `Date_created`, `Date_modified`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2018-09-18 18:08:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_right_over_land`
--

CREATE TABLE `tbl_right_over_land` (
  `ID` int(11) NOT NULL,
  `Description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_right_over_land`
--

INSERT INTO `tbl_right_over_land` (`ID`, `Description`) VALUES
(1, 'Owner'),
(2, 'Lessee'),
(3, 'Other/s');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanitary`
--

CREATE TABLE `tbl_sanitary` (
  `ID` bigint(255) NOT NULL,
  `Cycle_ID` bigint(255) NOT NULL,
  `Application_ID` bigint(255) NOT NULL,
  `Remarks` varchar(255) NOT NULL DEFAULT 'UNBILLED'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sanitary`
--

INSERT INTO `tbl_sanitary` (`ID`, `Cycle_ID`, `Application_ID`, `Remarks`) VALUES
(1, 1, 1, 'BILLED'),
(2, 2, 2, 'COMPLETED'),
(3, 3, 3, 'COMPLETED'),
(4, 4, 4, 'UNBILLED'),
(5, 5, 5, 'UNBILLED');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `ID` bigint(255) NOT NULL,
  `Cycle_ID` bigint(255) DEFAULT NULL,
  `Application_ID` bigint(255) NOT NULL,
  `Date_undertaking` datetime DEFAULT NULL,
  `Date_approved` datetime DEFAULT NULL,
  `Date_disapproved` datetime DEFAULT NULL,
  `Department` varchar(2) NOT NULL COMMENT 'BF/CH/CN/CE/CP',
  `Action_By` varchar(50) DEFAULT NULL,
  `Disapproved_by` varchar(100) DEFAULT NULL,
  `Undertake_by` varchar(100) DEFAULT NULL,
  `Blacklisted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`ID`, `Cycle_ID`, `Application_ID`, `Date_undertaking`, `Date_approved`, `Date_disapproved`, `Department`, `Action_By`, `Disapproved_by`, `Undertake_by`, `Blacklisted`) VALUES
(1, 1, 1, NULL, '2018-09-18 00:00:00', NULL, 'BF', NULL, NULL, NULL, 0),
(2, 1, 1, '2018-09-18 00:00:00', NULL, NULL, 'CP', NULL, NULL, NULL, 0),
(3, 1, 1, '2018-09-18 17:45:36', '2018-09-18 17:50:00', '2018-09-18 17:49:45', 'CH', 'Charles Xavier', 'Regina Lopez', 'Regina Lopez', 0),
(4, 1, 1, NULL, '2018-09-18 00:00:00', NULL, 'CE', NULL, NULL, NULL, 0),
(5, 1, 1, '2018-09-18 00:00:00', NULL, NULL, 'CT', NULL, NULL, NULL, 0),
(6, 1, 1, NULL, '2018-09-18 00:00:00', NULL, 'CV', NULL, NULL, NULL, 0),
(7, 1, 1, NULL, '2018-09-18 00:00:00', NULL, 'MD', NULL, NULL, NULL, 0),
(8, 1, 1, NULL, '2018-09-18 00:00:00', NULL, 'CN', NULL, NULL, NULL, 0),
(9, 2, 9, '2018-09-18 00:00:00', NULL, NULL, 'BF', NULL, NULL, NULL, 0),
(10, 2, 9, NULL, '2018-09-18 00:00:00', NULL, 'CP', NULL, NULL, NULL, 0),
(11, 2, 9, '2018-09-18 17:55:32', '2018-09-18 17:55:48', NULL, 'CH', 'Charles Xavier', 'Regina Lopez', 'Regina Lopez', 0),
(12, 2, 9, NULL, '2018-09-19 00:00:00', NULL, 'CE', NULL, NULL, NULL, 0),
(13, 2, 9, NULL, '2018-09-19 00:00:00', NULL, 'CT', NULL, NULL, NULL, 0),
(14, 2, 9, NULL, '2018-09-18 00:00:00', NULL, 'CV', NULL, NULL, NULL, 0),
(15, 2, 9, NULL, '2018-09-19 00:00:00', NULL, 'MD', NULL, NULL, NULL, 0),
(16, 2, 9, '2018-09-19 00:00:00', NULL, NULL, 'CN', NULL, NULL, NULL, 0),
(17, 3, 2, NULL, '2018-09-18 10:47:12', NULL, 'BF', 'Eddie De Paula', NULL, NULL, 0),
(18, 4, 3, NULL, NULL, NULL, 'BF', NULL, NULL, NULL, 0),
(19, 4, 3, NULL, NULL, NULL, 'CP', NULL, NULL, NULL, 0),
(20, 4, 3, NULL, '2018-09-18 17:34:39', NULL, 'CH', 'Charles Xavier', NULL, NULL, 0),
(21, 4, 3, NULL, NULL, NULL, 'CE', NULL, NULL, NULL, 0),
(22, 4, 3, NULL, NULL, NULL, 'CT', NULL, NULL, NULL, 0),
(23, 4, 3, NULL, NULL, NULL, 'CV', NULL, NULL, NULL, 0),
(24, 4, 3, NULL, NULL, NULL, 'MD', NULL, NULL, NULL, 0),
(25, 4, 3, NULL, NULL, NULL, 'CN', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tax_dealer`
--

CREATE TABLE `tbl_tax_dealer` (
  `ID` bigint(255) NOT NULL,
  `Gross_from` int(65) NOT NULL,
  `Gross_to` int(65) NOT NULL,
  `Tax` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tax_dealer`
--

INSERT INTO `tbl_tax_dealer` (`ID`, `Gross_from`, `Gross_to`, `Tax`) VALUES
(1, 1, 999, 29.7),
(2, 1000, 1999, 54.45),
(3, 2000, 2999, 82.5),
(4, 3000, 3999, 118.8),
(5, 4000, 4999, 165),
(6, 5000, 5999, 199.65),
(7, 6000, 6999, 235.95),
(8, 7000, 7999, 272.25),
(9, 8000, 9999, 308),
(10, 10000, 14999, 363),
(11, 15000, 19999, 453.75),
(12, 20000, 29999, 544.5),
(13, 30000, 39999, 726),
(14, 40000, 49999, 1089),
(15, 50000, 74999, 1633.5),
(16, 75000, 99999, 2178),
(17, 100000, 149999, 3085.5),
(18, 150000, 199999, 3993),
(19, 200000, 299999, 5445.55),
(20, 300000, 499999, 7260),
(21, 500000, 749999, 10890),
(22, 750000, 999999, 14520),
(23, 1000000, 1999999, 16500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tax_manufacturer`
--

CREATE TABLE `tbl_tax_manufacturer` (
  `ID` bigint(255) NOT NULL,
  `Gross_from` int(65) NOT NULL,
  `Gross_to` int(65) NOT NULL,
  `Tax` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tax_manufacturer`
--

INSERT INTO `tbl_tax_manufacturer` (`ID`, `Gross_from`, `Gross_to`, `Tax`) VALUES
(1, 1, 9999, 272.25),
(2, 10000, 14999, 330),
(3, 15000, 19999, 498.3),
(4, 20000, 29999, 726),
(5, 30000, 39999, 990),
(6, 40000, 49999, 1360),
(7, 50000, 74999, 2178),
(8, 75000, 99999, 2722.5),
(9, 100000, 149999, 3630),
(10, 150000, 199999, 4537.5),
(11, 200000, 299999, 6352.5),
(12, 300000, 499999, 9075),
(13, 500000, 749999, 13200),
(14, 750000, 999999, 16500),
(15, 1000000, 1999999, 22687.5),
(16, 2000000, 2999999, 27225),
(17, 3000000, 3999999, 32670),
(18, 4000000, 4999999, 38115),
(19, 5000000, 6499999, 40218.8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tax_service`
--

CREATE TABLE `tbl_tax_service` (
  `ID` bigint(255) NOT NULL,
  `Gross_from` int(65) NOT NULL,
  `Gross_to` int(65) NOT NULL,
  `Tax` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tax_service`
--

INSERT INTO `tbl_tax_service` (`ID`, `Gross_from`, `Gross_to`, `Tax`) VALUES
(1, 1, 4999, 45.37),
(2, 5000, 9999, 101.75),
(3, 10000, 14999, 172.42),
(4, 15000, 19999, 272.25),
(5, 20000, 29999, 453.75),
(6, 30000, 39999, 635.25),
(7, 40000, 49999, 907.5),
(8, 50000, 74999, 1452),
(9, 75000, 99999, 2178),
(10, 100000, 149999, 3267),
(11, 150000, 199999, 4356),
(12, 200000, 249999, 5989.5),
(13, 250000, 299999, 7623),
(14, 300000, 399999, 10164),
(15, 400000, 499999, 13612.5),
(16, 500000, 749999, 15262.5),
(17, 750000, 999999, 16912.5),
(18, 1000000, 1999999, 18975);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_treasurers_payables`
--

CREATE TABLE `tbl_treasurers_payables` (
  `ID` bigint(255) NOT NULL,
  `Payee_ID` bigint(255) NOT NULL,
  `Pay_for` varchar(255) NOT NULL,
  `Quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_treasurers_payables`
--

INSERT INTO `tbl_treasurers_payables` (`ID`, `Payee_ID`, `Pay_for`, `Quantity`) VALUES
(1, 0, 'Cedula', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_treasurers_payments`
--

CREATE TABLE `tbl_treasurers_payments` (
  `ID` bigint(255) NOT NULL,
  `Application_ID` bigint(255) NOT NULL,
  `Payee` varchar(255) NOT NULL,
  `Pay_for` varchar(255) NOT NULL,
  `Quantity` bigint(255) NOT NULL,
  `Amount_to_pay` bigint(255) NOT NULL,
  `AR_Number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_treasurers_payments`
--

INSERT INTO `tbl_treasurers_payments` (`ID`, `Application_ID`, `Payee`, `Pay_for`, `Quantity`, `Amount_to_pay`, `AR_Number`) VALUES
(1, 3, 'Genesis Software Inc.', 'LIGHTS', 1, 20, '100000'),
(2, 3, 'Genesis Software Inc.', 'C. OUTLET', 1, 30, '100000'),
(3, 3, 'Genesis Software Inc.', 'SWITCHES', 1, 20, '100000'),
(4, 3, 'Genesis Software Inc.', 'MAIN SWITCH', 1, 20, '100000'),
(5, 3, 'Genesis Software Inc.', 'A/C', 1, 50, '100000'),
(6, 3, 'Genesis Software Inc.', 'OTHERS', 1, 23, '100000'),
(7, 3, 'Genesis Software Inc.', 'WIRING PERMIT', 1, 90, '100000'),
(8, 3, 'Genesis Software Inc.', 'ELECTRICAL METER', 1, 10, '100000'),
(9, 3, 'Genesis Software Inc.', 'INSPECTION FEE', 1, 20, '100000'),
(10, 3, 'Genesis Software Inc.', 'FIRE CODE OF THE PHILIPPINESS', 1, 20, '100000'),
(11, 3, 'Genesis Software Inc.', 'SANITARY/PLUMBING INPS. FEE', 1, 30, '100000'),
(12, 3, 'Genesis Software Inc.', 'BUILDING INSPECTION FEE', 1, 100, '100000'),
(13, 3, 'Genesis Software Inc.', 'MACHINERIES', 1, 1100, '100000'),
(14, 3, 'Genesis Software Inc.', 'INSPECTION FEE', 1, 50, '100000'),
(15, 3, 'Genesis Software Inc.', 'OTHERS', 1, 20, '100000'),
(16, 3, 'Genesis Software Inc.', 'Sanitary Fee', 1, 300, '100000'),
(17, 3, 'Genesis Software Inc.', 'Health Fee', 4, 160, '100000'),
(18, 2, 'Cadiz Business', 'LIGHTS', 1, 20, '100001'),
(19, 2, 'Cadiz Business', 'C. OUTLET', 1, 30, '100001'),
(20, 2, 'Cadiz Business', 'SWITCHES', 1, 20, '100001'),
(21, 2, 'Cadiz Business', 'MAIN SWITCH', 1, 20, '100001'),
(22, 2, 'Cadiz Business', 'A/C', 1, 50, '100001'),
(23, 2, 'Cadiz Business', 'OTHERS', 1, 23, '100001'),
(24, 2, 'Cadiz Business', 'WIRING PERMIT', 1, 90, '100001'),
(25, 2, 'Cadiz Business', 'ELECTRICAL METER', 1, 10, '100001'),
(26, 2, 'Cadiz Business', 'INSPECTION FEE', 1, 20, '100001'),
(27, 2, 'Cadiz Business', 'FIRE CODE OF THE PHILIPPINESS', 1, 20, '100001'),
(28, 2, 'Cadiz Business', 'SANITARY/PLUMBING INPS. FEE', 1, 30, '100001'),
(29, 2, 'Cadiz Business', 'BUILDING INSPECTION FEE', 1, 100, '100001'),
(30, 2, 'Cadiz Business', 'MACHINERIES', 1, 1100, '100001'),
(31, 2, 'Cadiz Business', 'INSPECTION FEE', 1, 50, '100001'),
(32, 2, 'Cadiz Business', 'OTHERS', 1, 20, '100001'),
(33, 2, 'Cadiz Business', 'LIGHTS', 1, 20, '100001'),
(34, 2, 'Cadiz Business', 'C. OUTLET', 1, 20, '100001'),
(35, 2, 'Cadiz Business', 'SWITCHES', 1, 20, '100001'),
(36, 2, 'Cadiz Business', 'MAIN SWITCH', 1, 20, '100001'),
(37, 2, 'Cadiz Business', 'A/C', 1, 20, '100001'),
(38, 2, 'Cadiz Business', 'OTHERS', 1, 20, '100001'),
(39, 2, 'Cadiz Business', 'WIRING PERMIT', 1, 10, '100001'),
(40, 2, 'Cadiz Business', 'ELECTRICAL METER', 1, 10, '100001'),
(41, 2, 'Cadiz Business', 'INSPECTION FEE', 1, 10, '100001'),
(42, 2, 'Cadiz Business', 'FIRE CODE OF THE PHILIPPINESS', 1, 10, '100001'),
(43, 2, 'Cadiz Business', 'SANITARY/PLUMBING INPS. FEE', 1, 15, '100001'),
(44, 2, 'Cadiz Business', 'BUILDING INSPECTION FEE', 1, 100, '100001'),
(45, 2, 'Cadiz Business', 'MACHINERIES', 1, 1100, '100001'),
(46, 2, 'Cadiz Business', 'INSPECTION FEE', 1, 1, '100001'),
(47, 2, 'Cadiz Business', 'OTHERS', 1, 1, '100001'),
(48, 2, 'Cadiz Business', 'Sanitary Fee', 1, 300, '100001'),
(49, 2, 'Cadiz Business', 'Health Fee', 5, 200, '100001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_treasurers_receipts`
--

CREATE TABLE `tbl_treasurers_receipts` (
  `ID` bigint(255) NOT NULL,
  `Application_ID` bigint(255) NOT NULL,
  `Payee` varchar(255) NOT NULL,
  `AR_Number` varchar(255) NOT NULL,
  `Total_amount` bigint(255) NOT NULL,
  `Paid_amount` bigint(255) NOT NULL,
  `Change_amount` bigint(255) NOT NULL,
  `Received_by` varchar(255) NOT NULL,
  `Date_paid` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_treasurers_receipts`
--

INSERT INTO `tbl_treasurers_receipts` (`ID`, `Application_ID`, `Payee`, `AR_Number`, `Total_amount`, `Paid_amount`, `Change_amount`, `Received_by`, `Date_paid`) VALUES
(1, 3, 'Genesis Software Inc.', '100000', 2063, 2100, 37, 'Glaidel Guinabo', '2018-06-18 11:30:34'),
(2, 2, 'Cadiz Business', '100001', 3480, 5000, 1520, 'Glaidel Guinabo', '2018-06-18 15:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `ID` bigint(255) NOT NULL,
  `Position_ID` int(11) DEFAULT NULL,
  `First_name` varchar(30) DEFAULT NULL,
  `Middle_name` varchar(20) DEFAULT NULL,
  `Last_name` varchar(20) DEFAULT NULL,
  `Username` varchar(55) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Salt` varchar(255) DEFAULT NULL,
  `Enable` int(11) DEFAULT '1',
  `U_ID` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`ID`, `Position_ID`, `First_name`, `Middle_name`, `Last_name`, `Username`, `Password`, `Salt`, `Enable`, `U_ID`) VALUES
(3, 4, 'Sunny', NULL, 'Lopez', 'sunny.lopez@gmail.com', 'e1f10f085b638660363ba4f54dedee382a0d9fe5', 'w75tkes9lk11hr112s2c2mg0861fnjbi', 1, 'e1f10f085b638660363ba4f54dedee382a0d9fe5'),
(4, 4, 'Eddie', NULL, 'De Paula', 'e.depaula@gmail.com', '03c2ca8d28b1b996a8fb714eeb612ece8cdf9c6d', 'jz7txp$3tq1bd1e9r8vnnrbl9ik5agpv', 1, '03c2ca8d28b1b996a8fb714eeb612ece8cdf9c6d'),
(5, 8, 'Carlito', NULL, 'Caballero', 'carlito@gmail.com', '55d25d49cbe3ac52ac681c53ab3f92de5f17d1e0', '5fjp7qh7$48$n4kto4btzinciim$lhhv', 1, '55d25d49cbe3ac52ac681c53ab3f92de5f17d1e0'),
(6, 3, 'Regina', NULL, 'Lopez', 'crissa115@yahoo.com', 'f3b373d3359be057d10f007847c7c4fd0a1f44a9', 'n8t6k1dho35w51fzv118r6nky231ocwa', 1, 'f3b373d3359be057d10f007847c7c4fd0a1f44a9'),
(7, 5, 'Charles', NULL, 'Xavier', 'charles.xavier@xmen.com', '7b022ff48b8e242f1e57dfedb9627795a59ca5e6', '5%1zh?^8wy5xunp#%ux#d$mm?>?224<c', 1, '7b022ff48b8e242f1e57dfedb9627795a59ca5e6'),
(8, 7, 'Jean', NULL, 'Gray', 'jean.gray@gmail.com', 'e375f2d575484d449f86406a981ec26b77698d46', '3*c5j^8l^f>)06jq?r*b$v3j><s411>6', 1, 'e375f2d575484d449f86406a981ec26b77698d46'),
(9, 3, 'Marian ', NULL, 'Lizares', 'marian05', '5fbb3354392069c089c0f91a1c78989114d230ac', '>89sdrma(?rgp^!)ixjx)%t?j9^^c>mq', 1, '5fbb3354392069c089c0f91a1c78989114d230ac'),
(10, 11, 'Enrique', NULL, 'Ambos', 'Enriqueambos', '5fbb3354392069c089c0f91a1c78989114d230ac', '>89sdrma(?rgp^!)ixjx)%t?j9^^c>mq', 1, '5fbb3354392069c089c0f91a1c78989114d230ec'),
(11, NULL, 'Admin', NULL, 'Nistrator', 'admin.nistrator@mail.com', 'dd3fbb707706d80a0378ceb6d06799c82ed80b32', ')@41$h3!q)0?pyi4411@)<altthiq&eg', 1, 'd65c736f68fbbf0a56240e2a0c3ddd78817f7dd8'),
(12, 12, 'Rosemarie', NULL, 'Delfin', 'rosemarie@gmail.com', '7512c23f1d787f1bbd415600abc9c536a2adc238', 'yc!(%2)>vyll(s$51*z<w&i%)j8z7$il', 1, '21651fccc5836f0504b6435811257047bf69cc1a'),
(13, 3, 'Roque', NULL, 'Chavez', 'roque@gmail.com', 'd5fe3249cb059accba96ad1af0684899c63c653c', 't18^uq$6j8dyc)bf9(010)b>wqs#0e1^', 1, '15bfaa37866161f15fd19ecda72117b19f6a77d8'),
(14, NULL, 'Sarah', NULL, 'Cubil', 'sarahc@gmail.com', 'ab05e4436a8a61c2b960dd937f8d5455215c3adf', 'k@xu0$9!wa6uw931wb)^$w$nx4t*uzs1', 1, 'f87ab33adeeb77fe0dd917c391aa01aeba04a41d'),
(15, NULL, 'Prince Lexis', NULL, 'Galavo', 'prince@gmail.com', '02ebf16d3564f9a029c5c96301defa5c2604ac50', '0wsf91)y$wk9z85!jtj6h6<17x3@e*&7', 1, '8ebb83e140584e54a67e6edc4e18eabb2f6b9eeb'),
(16, NULL, 'Kirth', NULL, 'Sabariz', 'kirth@gmail.com', '2e18c57ccf5078e2ee743594966e6572cade8ded', 'h1q1jfz^p#*%c#>#?$wea*)gvz6p#!h1', 1, '399a65fb277d460636efeb3e251b3e5a1b9778ea'),
(17, NULL, 'Joseph Christian', NULL, 'Chua', 'chua@gmail.com', 'bbfc13137a399a9f149b74fed05a95553afcad99', '1^@6sl9v4ke4%26(i16npiw6!r%n17k!', 1, 'e454f68b9834a086710e1bd4ddf03392e6481209'),
(18, NULL, 'Rick Ivan', NULL, 'Pabelo', 'rick@gmail.com', '03739ed80dd6f7e833f3d96c8358d9e5dc40468d', 's92(f?>lln)ia013iw1kft1e)q07eh76', 1, 'c1bfaeddaa3261a97f813a7cb01095a4ff70fa86'),
(19, NULL, 'Sharmaine', NULL, 'Consuelo', 'shar@gmail.com', '26205e91d81feecae950ea58db37c870238733c7', '110)y>$<$!^k0dt04en$h>*<#lrtc5na', 1, '4cbe36e543eb33dee056d2efa9e7227743eab9a3'),
(20, NULL, 'John Mark', NULL, 'Jaravilla', 'jaravilla@gmail.com', 'afd69ce3424bf0f2a475bb356df5a9e7f5073c35', '3%wze1!7pc8z#pv(5nf1$05<qn<81to$', 1, '688dd85d7abef6a931b6951553c8c53b7a897de9'),
(21, NULL, 'Charles', NULL, 'Saviour', 'charles@mail.com', 'e2e9cb5178b79e1006eb33b429d6e0b4d586b987', 'tyl4l^)py^v$$nd6jpy9mm*kyc8m)ic<', 1, 'fb826cf5cec086b3e5ed88a83385df204cb2dbcc'),
(22, NULL, 'Second', NULL, 'Admin', 'admin.second@mail.com', 'c7b6b1ef453f7d53f0b962550daa5834e94abf72', 'a$@6$6rpye3guwal19dso$oiu67s6duz', 1, 'eb644bdaa8ad086faac734fc5b9b00f7a9c9aaa5'),
(23, 12, 'Paul Anthony', NULL, 'Huelgas', 'bplo@gmail.com', '00a63e22286cef48b9d7f41357bd2112b66ccf74', 'urc8g?c%zdi$&*fnrawr>ji42^(5x?po', 1, 'd7cbe3cde3a35ee28d8ee6ec3f112c2e06c2b1bd'),
(24, 16, 'Sam', 'Paul', 'Paul', 'sampaul@gmail.com', '406322d5216d08068a4ce1568eb92c780c5fe329', 'nr0<0&v@8c1e4wp%8^hy8np0uzt1$j1u', 1, '04be6a60580ca8ef14c274b3fc00515c90184da6'),
(25, NULL, 'Sandara', 'Ting', 'Ting', 'sandara@gmail.com', '01604e1663f72e80e15fba8ed8998b1276619252', '72t2rwa1ew>m9xkau^e$)38*<@*j3*ry', 1, 'a884b96ea70e4d78b168887330b8c4ab8040e587'),
(26, NULL, 'Ruevan', 'Torculas', 'Banjibod', 'ruevan', '63508fa3ef6144a36028a2d237c7f8ff08749e81', '9kd9pkd3*c6(s87u(gak>$p&x?3ef1ny', 1, 'b951a26a98bc82363b86e0a6f60f8125f9efe768'),
(27, NULL, 'Franz', 'T.', 'Vistal', 'franz', '1887dee9cbdbeef1487cfe83287944a1ef7e3eed', '<6o9?%lf&w6$07sa9vy>8ax9r!yf2wib', 1, 'e93436601a82fe8ecca85337f0e812750cbaf1fa'),
(28, NULL, 'Jeinelyn', NULL, 'Abiera', 'jein', '794e0c98e54a883843b1b75cebdada4037caae95', '$i6h#zfo2<fg<^sq$$jt8@*8g)gtdwv%', 1, 'a671e182f9bafe9ab2fd390d13e57202cac635fc');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_modules`
--

CREATE TABLE `tbl_user_modules` (
  `Module_ID` int(11) NOT NULL,
  `User_ID` bigint(255) NOT NULL,
  `Restrict_access` int(11) DEFAULT '0',
  `Full_control` int(11) DEFAULT '0',
  `Read_only` int(11) DEFAULT '0',
  `Write_only` int(11) DEFAULT '0',
  `Approved_only` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_modules`
--

INSERT INTO `tbl_user_modules` (`Module_ID`, `User_ID`, `Restrict_access`, `Full_control`, `Read_only`, `Write_only`, `Approved_only`) VALUES
(5, 4, 0, 0, 0, 0, 1),
(1, 5, 1, 0, 0, 0, 0),
(6, 5, 0, 0, 0, 0, 1),
(8, 6, 0, 0, 0, 1, 0),
(8, 7, 0, 0, 0, 0, 1),
(7, 8, 0, 0, 0, 1, 0),
(5, 9, 0, 0, 0, 1, 0),
(7, 10, 0, 0, 0, 0, 1),
(1, 11, 0, 1, 0, 0, 0),
(3, 11, 0, 1, 0, 0, 0),
(4, 11, 0, 1, 0, 0, 0),
(6, 12, 0, 0, 0, 1, 0),
(10, 13, 0, 0, 0, 0, 1),
(10, 14, 0, 0, 0, 1, 0),
(11, 15, 0, 0, 0, 0, 1),
(11, 16, 0, 0, 0, 1, 0),
(9, 17, 0, 0, 0, 0, 1),
(9, 18, 0, 0, 0, 1, 0),
(12, 19, 0, 0, 0, 0, 1),
(12, 20, 0, 0, 0, 1, 0),
(7, 21, 0, 0, 0, 0, 1),
(1, 22, 0, 0, 1, 0, 0),
(3, 22, 0, 0, 1, 0, 0),
(4, 22, 1, 0, 0, 0, 0),
(14, 23, 0, 1, 0, 0, 0),
(15, 24, 0, 1, 0, 0, 0),
(13, 25, 0, 1, 0, 0, 0),
(13, 26, 0, 1, 0, 0, 0),
(15, 27, 0, 1, 0, 0, 0),
(15, 28, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_violation`
--

CREATE TABLE `tbl_violation` (
  `ID` bigint(20) NOT NULL,
  `Violation` varchar(1000) NOT NULL,
  `Cycle_ID` bigint(20) NOT NULL,
  `Application_ID` bigint(20) NOT NULL,
  `Department` varchar(10) NOT NULL,
  `Inspected_by` varchar(100) NOT NULL,
  `Date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_violation`
--

INSERT INTO `tbl_violation` (`ID`, `Violation`, `Cycle_ID`, `Application_ID`, `Department`, `Inspected_by`, `Date_created`) VALUES
(1, 'For inspection', 1, 1, 'BF', 'Marian  Lizares', '2018-09-11 13:21:32'),
(2, 'Without certificate of social acceptabillity', 1, 1, 'CP', 'John Mark Jaravilla', '2018-09-11 13:22:21'),
(3, 'For inspection', 2, 2, 'BF', 'Marian  Lizares', '2018-09-11 13:23:59'),
(4, 'For inspection', 4, 4, 'BF', 'Marian  Lizares', '2018-09-11 13:25:45'),
(5, 'Health cert. on process', 1, 1, 'CH', 'Regina Lopez', '2018-09-11 13:26:11'),
(6, 'Illegal structure; occupying on box culvert; violation on zoning ordinance', 4, 4, 'CP', 'John Mark Jaravilla', '2018-09-11 13:26:30'),
(7, 'For inspection', 3, 5, 'BF', 'Marian  Lizares', '2018-09-11 13:26:33'),
(8, 'For inspection', 5, 7, 'BF', 'Marian  Lizares', '2018-09-11 13:27:23'),
(9, 'For inspection', 6, 6, 'BF', 'Marian  Lizares', '2018-09-11 13:31:10'),
(10, 'No employee/call attention-owner', 2, 2, 'CH', 'Regina Lopez', '2018-09-11 13:37:23'),
(11, 'Health cert.under process', 4, 4, 'CH', 'Regina Lopez', '2018-09-11 13:43:02'),
(12, 'Submit  stool/sputu, exam results', 3, 5, 'CH', 'Regina Lopez', '2018-09-11 13:53:31'),
(13, 'For deworming', 5, 7, 'CH', 'Regina Lopez', '2018-09-11 14:00:24'),
(14, 'For inspection', 7, 8, 'BF', 'Marian  Lizares', '2018-09-11 14:17:46'),
(15, 'Without locational clearance', 7, 8, 'CP', 'John Mark Jaravilla', '2018-09-11 14:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_violation_inspection`
--

CREATE TABLE `tbl_violation_inspection` (
  `Violation_ID` int(11) NOT NULL,
  `Result` varchar(2) NOT NULL,
  `Inspected_by` varchar(100) NOT NULL,
  `Date_inspected` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_violation_inspection`
--

INSERT INTO `tbl_violation_inspection` (`Violation_ID`, `Result`, `Inspected_by`, `Date_inspected`, `Date_created`) VALUES
(1, 'C', 'Marian  Lizares', '2018-09-12 00:00:00', '2018-09-11 13:22:08'),
(3, 'C', 'Marian  Lizares', '2018-09-12 00:00:00', '2018-09-11 13:24:16'),
(4, 'C', 'Marian  Lizares', '2018-09-11 00:00:00', '2018-09-11 13:27:50'),
(5, 'C', 'Regina Lopez', '2018-09-11 00:00:00', '2018-09-11 13:32:07'),
(7, 'C', 'Marian  Lizares', '2018-09-11 00:00:00', '2018-09-11 13:28:40'),
(8, 'C', 'Marian  Lizares', '2018-09-11 00:00:00', '2018-09-11 13:29:34'),
(9, 'C', 'Marian  Lizares', '2018-09-11 00:00:00', '2018-09-11 13:31:21'),
(10, 'C', 'Regina Lopez', '2018-09-11 00:00:00', '2018-09-11 13:40:03'),
(11, 'C', 'Regina Lopez', '2018-09-11 00:00:00', '2018-09-11 13:48:00'),
(12, 'C', 'Regina Lopez', '2018-09-11 00:00:00', '2018-09-11 14:02:33'),
(13, 'C', 'Regina Lopez', '2018-09-11 00:00:00', '2018-09-11 14:04:41'),
(14, 'C', 'Marian  Lizares', '2018-09-12 00:00:00', '2018-09-11 14:18:08'),
(15, 'C', 'John Mark Jaravilla', '2018-09-11 00:00:00', '2018-09-11 14:19:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_zone`
--

CREATE TABLE `tbl_zone` (
  `ID` bigint(255) NOT NULL,
  `Zone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_zone`
--

INSERT INTO `tbl_zone` (`ID`, `Zone`) VALUES
(1, 'Zone 1'),
(2, 'Zone 2'),
(3, 'Zone 3'),
(4, 'Zone 4'),
(5, 'Zone 5'),
(6, 'Zone 6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_application_business_line`
--
ALTER TABLE `tbl_application_business_line`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_application_form`
--
ALTER TABLE `tbl_application_form`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_application_form_amendment`
--
ALTER TABLE `tbl_application_form_amendment`
  ADD PRIMARY KEY (`ID`,`Application_form_ID`);

--
-- Indexes for table `tbl_application_location_clearance_form`
--
ALTER TABLE `tbl_application_location_clearance_form`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_application_status`
--
ALTER TABLE `tbl_application_status`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_assessment`
--
ALTER TABLE `tbl_assessment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_assessment_asset`
--
ALTER TABLE `tbl_assessment_asset`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_assessment_details`
--
ALTER TABLE `tbl_assessment_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_assessment_fees`
--
ALTER TABLE `tbl_assessment_fees`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_barangay`
--
ALTER TABLE `tbl_barangay`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_billing_fees`
--
ALTER TABLE `tbl_billing_fees`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_building_owner`
--
ALTER TABLE `tbl_building_owner`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_business_activity`
--
ALTER TABLE `tbl_business_activity`
  ADD PRIMARY KEY (`ID`,`Application_form_ID`);

--
-- Indexes for table `tbl_business_line`
--
ALTER TABLE `tbl_business_line`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_business_type`
--
ALTER TABLE `tbl_business_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_cenro_line`
--
ALTER TABLE `tbl_cenro_line`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_cho_health_certificate`
--
ALTER TABLE `tbl_cho_health_certificate`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_cho_sanitary_permit`
--
ALTER TABLE `tbl_cho_sanitary_permit`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_city_engineer`
--
ALTER TABLE `tbl_city_engineer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_city_engineer_line`
--
ALTER TABLE `tbl_city_engineer_line`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_collection`
--
ALTER TABLE `tbl_collection`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_collection_items`
--
ALTER TABLE `tbl_collection_items`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_cycle`
--
ALTER TABLE `tbl_cycle`
  ADD PRIMARY KEY (`ID`,`Application_ID`);

--
-- Indexes for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_fees_fixed`
--
ALTER TABLE `tbl_fees_fixed`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_fees_mayors_permit`
--
ALTER TABLE `tbl_fees_mayors_permit`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_fees_sanitary`
--
ALTER TABLE `tbl_fees_sanitary`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_fees_solid_waste`
--
ALTER TABLE `tbl_fees_solid_waste`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_fire_abatement_order`
--
ALTER TABLE `tbl_fire_abatement_order`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_fire_application`
--
ALTER TABLE `tbl_fire_application`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_fire_appointments`
--
ALTER TABLE `tbl_fire_appointments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_fire_billing`
--
ALTER TABLE `tbl_fire_billing`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_fire_billing_details`
--
ALTER TABLE `tbl_fire_billing_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_fire_business_types`
--
ALTER TABLE `tbl_fire_business_types`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_fire_certificate`
--
ALTER TABLE `tbl_fire_certificate`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_fire_code`
--
ALTER TABLE `tbl_fire_code`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_fire_fsic_no`
--
ALTER TABLE `tbl_fire_fsic_no`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_fire_inspection_order`
--
ALTER TABLE `tbl_fire_inspection_order`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_fire_notice`
--
ALTER TABLE `tbl_fire_notice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_fire_notice_defects`
--
ALTER TABLE `tbl_fire_notice_defects`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_fire_notice_violation`
--
ALTER TABLE `tbl_fire_notice_violation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_fire_notice_violation_defects`
--
ALTER TABLE `tbl_fire_notice_violation_defects`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_fire_stoppage_recommendation`
--
ALTER TABLE `tbl_fire_stoppage_recommendation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_modules`
--
ALTER TABLE `tbl_modules`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_payment_mode`
--
ALTER TABLE `tbl_payment_mode`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_pay_type`
--
ALTER TABLE `tbl_pay_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_permit`
--
ALTER TABLE `tbl_permit`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_province`
--
ALTER TABLE `tbl_province`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_purok`
--
ALTER TABLE `tbl_purok`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_queueing_departments`
--
ALTER TABLE `tbl_queueing_departments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_queueing_logs`
--
ALTER TABLE `tbl_queueing_logs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_queueing_numbers`
--
ALTER TABLE `tbl_queueing_numbers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_queueing_windows`
--
ALTER TABLE `tbl_queueing_windows`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_ready_to_assess`
--
ALTER TABLE `tbl_ready_to_assess`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_requirements`
--
ALTER TABLE `tbl_requirements`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_right_over_land`
--
ALTER TABLE `tbl_right_over_land`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_sanitary`
--
ALTER TABLE `tbl_sanitary`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_tax_dealer`
--
ALTER TABLE `tbl_tax_dealer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_tax_manufacturer`
--
ALTER TABLE `tbl_tax_manufacturer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_tax_service`
--
ALTER TABLE `tbl_tax_service`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_treasurers_payables`
--
ALTER TABLE `tbl_treasurers_payables`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_treasurers_payments`
--
ALTER TABLE `tbl_treasurers_payments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_treasurers_receipts`
--
ALTER TABLE `tbl_treasurers_receipts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_user_modules`
--
ALTER TABLE `tbl_user_modules`
  ADD PRIMARY KEY (`User_ID`,`Module_ID`);

--
-- Indexes for table `tbl_violation`
--
ALTER TABLE `tbl_violation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_violation_inspection`
--
ALTER TABLE `tbl_violation_inspection`
  ADD PRIMARY KEY (`Violation_ID`,`Date_inspected`);

--
-- Indexes for table `tbl_zone`
--
ALTER TABLE `tbl_zone`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_application_business_line`
--
ALTER TABLE `tbl_application_business_line`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `tbl_application_form`
--
ALTER TABLE `tbl_application_form`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_application_form_amendment`
--
ALTER TABLE `tbl_application_form_amendment`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_application_location_clearance_form`
--
ALTER TABLE `tbl_application_location_clearance_form`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_application_status`
--
ALTER TABLE `tbl_application_status`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_assessment`
--
ALTER TABLE `tbl_assessment`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_assessment_asset`
--
ALTER TABLE `tbl_assessment_asset`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_assessment_details`
--
ALTER TABLE `tbl_assessment_details`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_assessment_fees`
--
ALTER TABLE `tbl_assessment_fees`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tbl_barangay`
--
ALTER TABLE `tbl_barangay`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_billing_fees`
--
ALTER TABLE `tbl_billing_fees`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_building_owner`
--
ALTER TABLE `tbl_building_owner`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_business_activity`
--
ALTER TABLE `tbl_business_activity`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_business_line`
--
ALTER TABLE `tbl_business_line`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1039;
--
-- AUTO_INCREMENT for table `tbl_business_type`
--
ALTER TABLE `tbl_business_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_cenro_line`
--
ALTER TABLE `tbl_cenro_line`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_cho_health_certificate`
--
ALTER TABLE `tbl_cho_health_certificate`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_cho_sanitary_permit`
--
ALTER TABLE `tbl_cho_sanitary_permit`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `tbl_city_engineer`
--
ALTER TABLE `tbl_city_engineer`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_city_engineer_line`
--
ALTER TABLE `tbl_city_engineer_line`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tbl_collection`
--
ALTER TABLE `tbl_collection`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_collection_items`
--
ALTER TABLE `tbl_collection_items`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_cycle`
--
ALTER TABLE `tbl_cycle`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_fees_fixed`
--
ALTER TABLE `tbl_fees_fixed`
  MODIFY `ID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_fees_mayors_permit`
--
ALTER TABLE `tbl_fees_mayors_permit`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tbl_fees_sanitary`
--
ALTER TABLE `tbl_fees_sanitary`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tbl_fees_solid_waste`
--
ALTER TABLE `tbl_fees_solid_waste`
  MODIFY `ID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_fire_abatement_order`
--
ALTER TABLE `tbl_fire_abatement_order`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_fire_application`
--
ALTER TABLE `tbl_fire_application`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_fire_appointments`
--
ALTER TABLE `tbl_fire_appointments`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_fire_billing`
--
ALTER TABLE `tbl_fire_billing`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_fire_billing_details`
--
ALTER TABLE `tbl_fire_billing_details`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_fire_business_types`
--
ALTER TABLE `tbl_fire_business_types`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_fire_certificate`
--
ALTER TABLE `tbl_fire_certificate`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_fire_code`
--
ALTER TABLE `tbl_fire_code`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tbl_fire_fsic_no`
--
ALTER TABLE `tbl_fire_fsic_no`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `tbl_fire_inspection_order`
--
ALTER TABLE `tbl_fire_inspection_order`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_fire_notice`
--
ALTER TABLE `tbl_fire_notice`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_fire_notice_defects`
--
ALTER TABLE `tbl_fire_notice_defects`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_fire_notice_violation`
--
ALTER TABLE `tbl_fire_notice_violation`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_fire_notice_violation_defects`
--
ALTER TABLE `tbl_fire_notice_violation_defects`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_fire_stoppage_recommendation`
--
ALTER TABLE `tbl_fire_stoppage_recommendation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_modules`
--
ALTER TABLE `tbl_modules`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_payment_mode`
--
ALTER TABLE `tbl_payment_mode`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_pay_type`
--
ALTER TABLE `tbl_pay_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_permit`
--
ALTER TABLE `tbl_permit`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_province`
--
ALTER TABLE `tbl_province`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_purok`
--
ALTER TABLE `tbl_purok`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_queueing_departments`
--
ALTER TABLE `tbl_queueing_departments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tbl_queueing_logs`
--
ALTER TABLE `tbl_queueing_logs`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_queueing_numbers`
--
ALTER TABLE `tbl_queueing_numbers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_queueing_windows`
--
ALTER TABLE `tbl_queueing_windows`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_ready_to_assess`
--
ALTER TABLE `tbl_ready_to_assess`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_requirements`
--
ALTER TABLE `tbl_requirements`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_right_over_land`
--
ALTER TABLE `tbl_right_over_land`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_sanitary`
--
ALTER TABLE `tbl_sanitary`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_tax_dealer`
--
ALTER TABLE `tbl_tax_dealer`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_tax_manufacturer`
--
ALTER TABLE `tbl_tax_manufacturer`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_tax_service`
--
ALTER TABLE `tbl_tax_service`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_treasurers_payables`
--
ALTER TABLE `tbl_treasurers_payables`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_treasurers_payments`
--
ALTER TABLE `tbl_treasurers_payments`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `tbl_treasurers_receipts`
--
ALTER TABLE `tbl_treasurers_receipts`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tbl_violation`
--
ALTER TABLE `tbl_violation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_zone`
--
ALTER TABLE `tbl_zone`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
