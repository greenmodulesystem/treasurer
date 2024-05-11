-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 16, 2018 at 06:02 PM
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
-- Database: `cadiz_licensing_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application_form`
--

CREATE TABLE `tbl_application_form` (
  `ID` bigint(255) NOT NULL,
  `U_ID` varchar(40) NOT NULL,
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
  `Barangay_ID` int(11) DEFAULT NULL,
  `Purok_ID` int(11) DEFAULT NULL,
  `Street` varchar(255) NOT NULL,
  `Building_name` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_application_form`
--

INSERT INTO `tbl_application_form` (`ID`, `U_ID`, `Application_status_ID`, `Payment_mode_ID`, `TIN_no`, `DTI_SEC_CDA_registration_no`, `DTI_SEC_CDA_registration_date`, `Business_type_ID`, `Amendment_from_business_type_ID`, `Amendment_to_business_type_ID`, `Tax_incentive`, `Tax_incentive_reason`, `Last_name`, `First_name`, `Middle_name`, `Business_name`, `Trade_name_franchise`, `Business_postal_code`, `Business_email_address`, `Business_telephone_number`, `Business_mobile_number`, `Owner_address`, `Owner_postal_code`, `Owner_email_address`, `Owner_telephone_number`, `Owner_mobile_number`, `Emergency_contact_person`, `Emergency_mobile_number`, `Emergency_email_address`, `Business_area`, `Total_number_employees`, `No_employees_within_LGU`, `Lessors_full_name`, `Lessors_full_address`, `Lessors_telephone_number`, `Lessors_mobile_number`, `Lessors_email_address`, `Lessors_monthly_rental`, `Application_date`, `Login_email_address`, `Password`, `Salt`, `Enable`, `Barangay_ID`, `Purok_ID`, `Street`, `Building_name`) VALUES
(1, 'b707b978b0a426bcf8c5e550df91c15ba1ba4357', 2, 1, '', '', '2018-04-19', 1, 1, 1, 0, '', 'Lopez', 'Immanuel Dennis', 'Huelar', 'Crave Digital Advertising', '', '6100', 'sunny.lopez@gmail.com', '704-2412', '', 'Bacolod City ', '', 'sunny.lopez@gmail.com', '', '', '', '', 'sunny.lopez@gmail.com', '', 0, 0, '', '', '', '', 'bok_817@yahoo.com', 45000, '2018-05-02', 'sunny.lopez@gmail.com', 'b5afb86eb511aa248ac8b40b08f6a93dc9e91667', '*ut10?^>6ty^)701<r1vs)1iimu&80)z', 1, 1, 3, 'Narra Street', 'Teresita Bldg'),
(2, '128728f3438b6794bcd04e4a6436b3301ee81c74', 1, 1, '', '', '2018-04-19', 3, 1, 1, 1, '', 'Caballero', 'Carlito', 'Cabs', 'Basket Business', '', '6100', 'cadiz@gmail.com', '707-2309', '', 'Silay City', '', 'cadiz@gmail.com', '', '', '', '', 'cadiz@gmail.com', '', 0, 0, '', '', '', '', '', 0, '2018-04-19', 'cadiz@gmail.com', 'b74b7d71912e5050fef0afcc8f91f30b3f34b3dc', '1y5>tkl#v?1j91wi8<0!a7)bs7kl(fe&', 1, 2, 2, 'Lacson Street', 'JS Building'),
(3, '2dea2efe59d68d3a6e158dc378d6cfc5f8a54a0a', 2, 1, '', '', '2018-04-19', 1, 1, 1, 0, '', 'De Paula', 'Eddie', 'Wow', 'Genesis Software Inc.', '', '6100', 'de_paula@gwapo.com', '430-1778', '', 'La Carlota City ', '', 'de_paula@gwapo.com', '', '', '', '', 'de_paula@gwapo.com', '', 0, 0, '', '', '', '', 'de_paula@gwapo.com', 45000, '2018-04-24', 'de_paula@gwapo.com', 'a8c19f599f8d3ba21dfd94573b042d8f06fa17d6', '9w8ckg!<4d6a$4h*r?!b1i#bn!ldj45b', 1, 3, 1, 'Galo Street', 'Jack Building '),
(4, '1aea2efe59d68d3a6e158dc378d6cfc5f8a54a0a', 2, 1, '', '', '2018-04-19', 1, 1, 1, 0, '', 'Mondragon', 'Joenel', 'Sample', 'VJ Summit Holdings', '', '6100', 'mon@mail.com', '430-1778', '', 'La Carlota City ', '', 'mon@mail.com', '', '', '', '', 'mon@mail.com', '', 0, 0, '', '', '', '', 'mon@mail.com', 45000, '2018-04-24', 'mon@mail.com', 'a8c19f599f8d3ba21dfd94573b042d8f06fa17d6', '9w8ckg!<4d6a$4h*r?!b1i#bn!ldj45b', 1, 3, 1, 'Galo Street', 'O Building '),
(5, '1aeaaede59d68d3a6e158dc378d6cfc5f8a54a0a', 2, 1, '', '', '2018-04-19', 1, 1, 1, 0, '', 'Fernandez', 'Jay Anne', 'Sample', 'Fernandez Corportion', '', '6100', 'fer@mail.com', '430-1778', '', 'La Carlota City ', '', 'fer@mail.com', '', '', '', '', 'fer@mail.com', '', 0, 0, '', '', '', '', 'fer@mail.com', 45000, '2018-04-24', 'fer@mail.com', 'a8c19f599f8d3ba21dfd94573b042d8f06fa17d6', '9w8ckg!<4d6a$4h*r?!b1i#bn!ldj45b', 1, 3, 1, 'Galo Street', 'Benilde');

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
(3, 3, 3, 1, 45, 23, 1, '25000', 3, '', '2018-06-06 16:56:01', NULL, 'New', 'On Process', 1),
(4, 4, 4, 1, 124, 21, 1, '85000', 3, '', '2018-06-11 11:37:07', NULL, 'New', 'On Process', 1),
(5, 5, 5, 1, 432, 23, 1, '250000', 3, '', '2018-06-14 10:55:27', NULL, 'New', 'On Process', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application_notice`
--

CREATE TABLE `tbl_application_notice` (
  `ID` bigint(255) NOT NULL,
  `Notice_ID` int(11) DEFAULT NULL,
  `Application_location_clearance_ID` bigint(255) DEFAULT NULL,
  `Remarks` text,
  `Notice_type_ID` int(11) DEFAULT NULL COMMENT 'Just use a combo or radio button to filter out the entry for this field!',
  `Notice_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `tbl_authorized_representative`
--

CREATE TABLE `tbl_authorized_representative` (
  `ID` bigint(255) NOT NULL,
  `Last_name` varchar(150) NOT NULL,
  `First_name` varchar(150) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `City` varchar(150) NOT NULL,
  `Province` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_authorized_representative`
--

INSERT INTO `tbl_authorized_representative` (`ID`, `Last_name`, `First_name`, `Address`, `City`, `Province`) VALUES
(1, 'Torreblanca', 'Mary ', 'Gustilo st. Purok 3, Brgy. 2, Pob.,', 'Municipality of Murcia', 'Negros Occidental'),
(2, 'Torno ', 'John ', ' Santan st., Purok 2, Brgy. 2 Pob.', 'Municipality of Murcia', 'Negros Occidental'),
(3, 'Abani ', 'Michelle ', ' Galo st. Prk. 3 Brgy 2 Pob. ', 'Municipality of Murcia', 'Negros Occidental'),
(4, 'Flores ', 'Joy Anne ', ' Lacson St., Purok 2, Brgy. Cabahug', 'Municipality of Murcia', 'Negros Occidental'),
(5, 'Dequina', 'Joy', ' Galo st., Purk 2, Brgy. Luna', 'Municipality of Murcia', 'Negros Occidental');

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
(1, 'Barangay 1 Pob.'),
(2, 'Barangay 2 Pob.'),
(3, 'Barangay 3 Pob.'),
(4, 'Barangay 4 Pob.'),
(5, 'Barangay 5 Pob.'),
(6, 'Barangay 6 Pob. '),
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
(1, '840b22be052f1d2e568476b9cba1e27079b0af51', 'Tito ', 'Torreblanca ', 'Gustilo st.', 'Zone 2', 'Purok 3', 'Barangay 2 Pob.', 'Municipality of Murcia', 'Negros Occidental', 'JS Building', ' Standard Insurance Co. ', ' Lacson st. corner Galo st. Bacolod City ', 1, ' Insurance', ' Gustilo BLVD. Brgy 1. (LTO)', 1, '2018-06-06 00:00:00'),
(2, '9c964efb31d54873eb7cb887b515d9f24f97988e', 'Eva', 'Torno', 'Santan St. ', 'Zone 1', 'Purok 2', 'Barangay 2 Pob.', 'Municipality of Murcia', 'Negros Occidental', 'Teresita Bldg', ' Eatery ', 'DelaSalle St. Brgy. 2, Municipality of Murcia ', 2, ' Eatery ', ' Gustilo BLVD. Brgy 1. (LTO)', 1, '2018-06-06 00:00:00'),
(3, '8e6a0ab63dcc760118dffc536af50ddac7fd80f0', 'Michael ', 'Abanil ', 'Galo St. ', 'Zone 4', 'Purok 3', 'Barangay 2 Pob.', 'Municipality of Murcia', 'Negros Occidental', 'O Hotel Building  ', ' Michael Vulcanizing ', ' Santan St. Brgy 2. Municipality of Murcia ', 3, ' Vulcanizing Shop ', 'Cabahug St. Brgy 2.  ', 1, '2018-05-06 00:00:00'),
(4, '8d0c938d51ea34ae173e52cee4920abbaab0dde9', 'Tito ', 'Flores', 'Lacson St. ', 'Zone 5', 'Purok 2', 'Barangay Cabahug', 'Municipality of Murcia', 'Negros Occidental', 'Benilde', ' M\'c Insurance Corp.', ' Santan St. Brgy 2. Municipality of Murcia', 4, ' Insurance ', ' Lacosn St. Brgy. 4, Municipality of Murcia ', 1, '2018-06-11 11:37:00'),
(5, 'a303c411440744f88babfc0c5097d9686b13f02b', 'Jenel ', 'Dequina', 'Galo St. ', 'Zonr 3', 'Purok 2', 'Barangay Luna', 'Municipality of Murcia', 'Negros Occidental', ' Jam Buildling ', ' Crave Ads Software Dev. ', ' Lacson St. corner galo st. Bacolod City ', 5, ' Software Development ', 'Lacson St. corner Rizal St. Bacolod City ', 1, '2018-06-14 10:55:18');

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
-- Table structure for table `tbl_cards`
--

CREATE TABLE `tbl_cards` (
  `ID` bigint(255) NOT NULL,
  `Card_type` varchar(255) NOT NULL,
  `Fee` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cards`
--

INSERT INTO `tbl_cards` (`ID`, `Card_type`, `Fee`) VALUES
(1, 'Yellow', 40),
(2, 'Green', 40),
(3, 'Pink', 40);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_card_applications`
--

CREATE TABLE `tbl_card_applications` (
  `ID` bigint(255) NOT NULL,
  `Card_no` bigint(255) NOT NULL,
  `Card_holder_ID` bigint(255) NOT NULL,
  `Card_ID` bigint(20) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Date_approved` datetime NOT NULL,
  `Date_disapproved` datetime NOT NULL,
  `Expiry_date` date NOT NULL,
  `Action_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_card_applications`
--

INSERT INTO `tbl_card_applications` (`ID`, `Card_no`, `Card_holder_ID`, `Card_ID`, `Status`, `Date_approved`, `Date_disapproved`, `Expiry_date`, `Action_by`) VALUES
(1, 0, 1, 2, 'ON PROCESS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00', ''),
(2, 0, 2, 1, 'ON PROCESS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00', ''),
(3, 0, 3, 2, 'ON PROCESS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00', ''),
(4, 17, 4, 1, 'APPROVED', '2018-05-11 10:11:16', '0000-00-00 00:00:00', '2018-12-31', ''),
(5, 12, 5, 1, 'APPROVED', '2018-04-11 10:33:30', '0000-00-00 00:00:00', '2018-12-31', ''),
(6, 7, 6, 1, 'APPROVED', '2018-03-15 15:50:02', '0000-00-00 00:00:00', '2018-12-31', ''),
(7, 8, 7, 1, 'APPROVED', '2018-03-15 15:50:21', '0000-00-00 00:00:00', '2018-12-31', ''),
(8, 6, 8, 1, 'APPROVED', '2018-03-15 15:49:57', '0000-00-00 00:00:00', '2018-12-31', ''),
(9, 5, 9, 2, 'APPROVED', '2018-03-15 15:49:44', '0000-00-00 00:00:00', '2018-12-31', ''),
(10, 4, 10, 2, 'APPROVED', '2018-03-15 15:49:40', '0000-00-00 00:00:00', '2018-12-31', ''),
(11, 11, 11, 1, 'APPROVED', '2018-04-11 10:31:59', '0000-00-00 00:00:00', '2018-12-31', ''),
(12, 3, 12, 1, 'APPROVED', '2018-03-15 14:04:33', '0000-00-00 00:00:00', '2018-12-31', ''),
(13, 1, 13, 2, 'APPROVED', '2018-03-15 13:59:35', '0000-00-00 00:00:00', '2018-12-31', ''),
(14, 2, 14, 1, 'APPROVED', '2018-03-15 13:59:41', '0000-00-00 00:00:00', '2018-12-31', ''),
(17, 10, 9, 1, 'APPROVED', '2018-04-10 16:59:45', '0000-00-00 00:00:00', '2018-12-31', ''),
(20, 9, 12, 2, 'APPROVED', '2018-04-10 09:58:20', '0000-00-00 00:00:00', '2018-12-31', ''),
(21, 13, 14, 2, 'APPROVED', '2018-04-11 10:38:30', '0000-00-00 00:00:00', '2018-12-31', ''),
(22, 14, 11, 2, 'APPROVED', '2018-04-11 10:39:40', '0000-00-00 00:00:00', '2018-12-31', ''),
(23, 16, 11, 1, 'APPROVED', '2018-04-12 18:55:19', '0000-00-00 00:00:00', '2018-12-31', ''),
(24, 15, 11, 2, 'APPROVED', '2018-04-11 11:33:05', '0000-00-00 00:00:00', '2018-12-31', ''),
(25, 0, 10, 2, 'ON PROCESS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_card_holder_profile`
--

CREATE TABLE `tbl_card_holder_profile` (
  `ID` bigint(255) NOT NULL,
  `First_name` varchar(50) NOT NULL,
  `Middle_name` varchar(30) NOT NULL,
  `Last_name` varchar(30) NOT NULL,
  `Age` int(3) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Contact_number` varchar(15) NOT NULL,
  `Street` varchar(255) NOT NULL,
  `Purok` varchar(255) NOT NULL,
  `Brgy_ID` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL DEFAULT 'Municipality of Murcia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_card_holder_profile`
--

INSERT INTO `tbl_card_holder_profile` (`ID`, `First_name`, `Middle_name`, `Last_name`, `Age`, `Gender`, `Contact_number`, `Street`, `Purok`, `Brgy_ID`, `City`) VALUES
(1, 'Julian Diego', 'Paclibar', 'Mapa', 22, 'Male', '09257260059', 'Natalia Street', 'Zone 1', '2', 'Municipality of Murcia'),
(2, 'Mark', 'Valleja', 'Huelgas', 21, 'Male', '09258636824', 'Narra Street', 'Zone 1', '4', 'Municipality of Murcia'),
(3, 'Meltito', 'Santiago', 'Vagallon', 21, 'Male', '09176509838', 'Lacson Street', 'Zone 5', '5', 'Municipality of Murcia'),
(4, 'Anthony', 'Valleja', 'Huelgas', 32, 'Male', '09328753685', 'Araneta Street', 'Zone 1', '1', 'Municipality of Murcia'),
(5, 'Glaidel', 'Paculana', 'Guinabo', 20, 'Female', '09234536297', 'Lasalle Avenue', 'Zone 3', '3', 'Municipality of Murcia'),
(6, 'Paul', 'Dela Cruz', 'Faburada', 30, 'Male', '09176210234', '123', 'Zone 5', '5', 'Municipality of Murcia'),
(7, 'Cardo', 'Martin', 'Dalisay', 35, 'Male', '09451237654', 'Quiapo', 'Zone 5', '5', 'Municipality of Murcia'),
(8, 'Czarina', 'Alfonso', 'Año', 21, 'Female', '09258636824', 'Buena Park', 'Zone 1', '1', 'Municipality of Murcia'),
(9, 'Dominic Justine', 'Paclibar', 'Mapa', 19, 'Female', '09172321934', 'Narra', 'Zone 1', '1', 'Municipality of Murcia'),
(10, 'Angelika', 'Joyce', 'Alipalo', 33, 'Female', '09444433322', 'Mansilingan', 'Zone 1', '4', 'Municipality of Murcia'),
(11, 'Ma. Dorothy', 'Caras', 'Paclibar', 41, 'Female', '09213497123', 'Jobstreet', 'Zone 2', '2', 'Municipality of Murcia'),
(12, 'Maria Leonora', ' Theresa', 'Jurisprudencia', 22, 'Female', '09223334444', 'Back Street Boys', 'Zone 5', '5', 'Municipality of Murcia'),
(13, 'Julio Ezekiel', 'Duyo', 'Mapa', 14, 'Male', '09223809421', 'Boulevard', 'Zone 1', '2', 'Municipality of Murcia'),
(14, 'Elaiza Justine', 'Duyo', 'Mapa', 20, 'Female', '09257260058', 'Mambulac', 'Zone 3', '2', 'Municipality of Murcia');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_card_requirements`
--

CREATE TABLE `tbl_card_requirements` (
  `ID` bigint(255) NOT NULL,
  `Requirement` varchar(255) NOT NULL,
  `Card_ID` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_card_requirements`
--

INSERT INTO `tbl_card_requirements` (`ID`, `Requirement`, `Card_ID`) VALUES
(1, 'Cedula, X-ray(If Individual)', 1),
(2, 'Cedula, X-ray/Sputum, Stool Exam', 2),
(3, 'Cedula, Gram Staining Exam', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city_engineer`
--

CREATE TABLE `tbl_city_engineer` (
  `ID` bigint(255) NOT NULL,
  `Cycle_ID` bigint(255) DEFAULT NULL,
  `Remark` varchar(50) DEFAULT NULL,
  `Arrival_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_city_engineer`
--

INSERT INTO `tbl_city_engineer` (`ID`, `Cycle_ID`, `Remark`, `Arrival_date`) VALUES
(1, 1, 'BILLED', '2018-04-01'),
(2, 2, 'BILLED', '2018-04-02'),
(3, 3, 'UNBILLED', '2018-05-03'),
(4, 4, 'UNBILLED', '2018-05-04'),
(5, 5, 'UNBILLED', '2018-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city_engineer_line`
--

CREATE TABLE `tbl_city_engineer_line` (
  `ID` bigint(255) NOT NULL,
  `Created_date` datetime DEFAULT NULL,
  `Representative` varchar(50) DEFAULT NULL,
  `City_engineer_ID` bigint(255) DEFAULT NULL,
  `Pay_type_ID` bigint(50) DEFAULT NULL,
  `Number_of_unit` int(11) DEFAULT NULL,
  `Rate` double DEFAULT NULL,
  `Payment_date` datetime DEFAULT NULL,
  `CO_date` datetime DEFAULT NULL,
  `Note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_city_engineer_line`
--

INSERT INTO `tbl_city_engineer_line` (`ID`, `Created_date`, `Representative`, `City_engineer_ID`, `Pay_type_ID`, `Number_of_unit`, `Rate`, `Payment_date`, `CO_date`, `Note`) VALUES
(1, '2018-06-16 00:00:00', 'AKO', 1, 1, 1, 1, NULL, NULL, NULL),
(2, '2018-06-16 00:00:00', 'AKO', 1, 2, 1, 1, NULL, NULL, NULL),
(3, '2018-06-16 00:00:00', 'AKO', 1, 3, 1, 1, NULL, NULL, NULL),
(4, '2018-06-16 00:00:00', 'AKO', 1, 4, 1, 1, NULL, NULL, NULL),
(5, '2018-06-16 00:00:00', 'AKO', 1, 5, 1, 1, NULL, NULL, NULL),
(6, '2018-06-16 00:00:00', 'AKO', 1, 6, 1, 1, NULL, NULL, NULL),
(7, '2018-06-16 00:00:00', 'AKO', 1, 7, 1, 2, NULL, NULL, NULL),
(8, '2018-06-16 00:00:00', 'AKO', 1, 8, 1, 3, NULL, NULL, NULL),
(9, '2018-06-16 00:00:00', 'AKO', 1, 9, 1, 4, NULL, NULL, NULL),
(10, '2018-06-16 00:00:00', 'AKO', 1, 10, 1, 2, NULL, NULL, NULL),
(11, '2018-06-16 00:00:00', 'AKO', 1, 11, 1, 345, NULL, NULL, NULL),
(12, '2018-06-16 00:00:00', 'AKO', 1, 12, 1, 100, NULL, NULL, NULL),
(13, '2018-06-16 00:00:00', 'AKO', 1, 13, 1, 550, NULL, NULL, NULL),
(14, '2018-06-16 00:00:00', 'AKO', 1, 14, 1, 23, NULL, NULL, NULL),
(15, '2018-06-16 00:00:00', 'AKO', 1, 15, 1, 11, NULL, NULL, NULL),
(16, '2018-06-16 00:00:00', 'AKO', 2, 1, 0, 0, NULL, NULL, NULL),
(17, '2018-06-16 00:00:00', 'AKO', 2, 2, 0, 0, NULL, NULL, NULL),
(18, '2018-06-16 00:00:00', 'AKO', 2, 3, 0, 0, NULL, NULL, NULL),
(19, '2018-06-16 00:00:00', 'AKO', 2, 4, 0, 0, NULL, NULL, NULL),
(20, '2018-06-16 00:00:00', 'AKO', 2, 5, 0, 0, NULL, NULL, NULL),
(21, '2018-06-16 00:00:00', 'AKO', 2, 6, 0, 0, NULL, NULL, NULL),
(22, '2018-06-16 00:00:00', 'AKO', 2, 7, 1, 0, NULL, NULL, NULL),
(23, '2018-06-16 00:00:00', 'AKO', 2, 8, 1, 0, NULL, NULL, NULL),
(24, '2018-06-16 00:00:00', 'AKO', 2, 9, 1, 0, NULL, NULL, NULL),
(25, '2018-06-16 00:00:00', 'AKO', 2, 10, 1, 0, NULL, NULL, NULL),
(26, '2018-06-16 00:00:00', 'AKO', 2, 11, 1, 0, NULL, NULL, NULL),
(27, '2018-06-16 00:00:00', 'AKO', 2, 12, 1, 0, NULL, NULL, NULL),
(28, '2018-06-16 00:00:00', 'AKO', 2, 13, 1, 0, NULL, NULL, NULL),
(29, '2018-06-16 00:00:00', 'AKO', 2, 14, 1, 0, NULL, NULL, NULL),
(30, '2018-06-16 00:00:00', 'AKO', 2, 15, 1, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_condition`
--

CREATE TABLE `tbl_condition` (
  `ID` int(11) NOT NULL,
  `Zoning_condition` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_condition`
--

INSERT INTO `tbl_condition` (`ID`, `Zoning_condition`) VALUES
(1, 'All condition stipulated herein form part of the decision and are subject to monitoring.'),
(2, 'Non-compliance there with shall be a cause for cancellation or legal action. '),
(3, 'The applicable requirements of government agencies and applicable provisions of existing laws shall be complied with.'),
(4, 'No other activity other than the applied shall be conducted within the project site.'),
(5, 'No major expansion, alternation and/or improvement shall be introduces without prior clearance from this office.'),
(6, 'This decision shall not be construed as a certification of the city as to the ownership by the applicant of the parcel of land subject of this decision. '),
(7, 'Any misrepresentation, false statement of allegation material to the issuance of this decision shall be sufficient cause of its revocation. '),
(8, 'Provision as to setbacks, yard requirements, bulk easements, area, height and other restrictions shall strictly conform with the requirements if the National Building Code and other related laws. '),
(9, 'This decision shall be considered  automatically revoked if project is not commenced within one (1) year from date of issue of this decision. '),
(10, 'For other conditions, please see below. \r\n    * The rules & regulations against \r\n      Fire Code shall at all times be \r\n      complied with.\r\n    * The rules and regulations of the \r\n      Sanitation Code shall at all time \r\n      be complied with.\r\n    * Parking area requirements as per \r\n      NBC shall be complied with. ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cycle`
--

CREATE TABLE `tbl_cycle` (
  `ID` bigint(255) NOT NULL,
  `Application_ID` bigint(255) NOT NULL,
  `Cycle_date` year(4) DEFAULT NULL,
  `Date_application` date DEFAULT NULL,
  `Amendment_from_business_type_ID` int(11) DEFAULT NULL,
  `Amendment_to_business_type_ID` int(11) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL COMMENT 'Processing/Approved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cycle`
--

INSERT INTO `tbl_cycle` (`ID`, `Application_ID`, `Cycle_date`, `Date_application`, `Amendment_from_business_type_ID`, `Amendment_to_business_type_ID`, `Status`) VALUES
(1, 1, 2018, '2018-05-01', NULL, NULL, 'Processing'),
(2, 2, 2018, '2018-05-02', NULL, NULL, 'Processing'),
(3, 3, 2018, '2018-05-03', NULL, NULL, 'Processing'),
(4, 4, 2018, '2018-05-04', NULL, NULL, 'Processing'),
(5, 5, 2018, '2018-05-05', NULL, NULL, 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_existing_land_use`
--

CREATE TABLE `tbl_existing_land_use` (
  `ID` bigint(255) NOT NULL,
  `Building_owner_ID` bigint(255) DEFAULT NULL,
  `Land_use_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_existing_land_use`
--

INSERT INTO `tbl_existing_land_use` (`ID`, `Building_owner_ID`, `Land_use_ID`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_existing_uses_of_project_site`
--

CREATE TABLE `tbl_existing_uses_of_project_site` (
  `ID` int(11) NOT NULL,
  `Project_site` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_existing_uses_of_project_site`
--

INSERT INTO `tbl_existing_uses_of_project_site` (`ID`, `Project_site`) VALUES
(1, 'Commercial '),
(2, 'Industrial '),
(3, 'Residential'),
(4, 'Agricultural '),
(5, 'Tenanted '),
(6, 'Institutional '),
(7, 'Non_tenanted '),
(8, 'Vacant');

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
(1, 0, 3, NULL, '2018-05-23 18:05:21', '2018-05-23 18:05:21', NULL),
(4, 1, 2, NULL, '2018-06-02 11:52:41', '2018-06-02 11:52:41', NULL),
(5, 0, 1, NULL, '2018-06-02 11:52:51', '2018-06-02 11:52:51', NULL),
(6, 0, 4, NULL, '2018-05-23 18:05:21', '2018-05-23 18:05:21', NULL),
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
(7, 3, 0, '2018-05-23 12:47:18', NULL);

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
(76, 500, 1500, NULL, '2018-03-08 19:14:46', 'Ready');

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
-- Table structure for table `tbl_inspection_result`
--

CREATE TABLE `tbl_inspection_result` (
  `ID` bigint(255) NOT NULL,
  `Application_location_clearance_ID` bigint(255) DEFAULT NULL,
  `Date_inspection` date DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `Violation` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_inspection_result`
--

INSERT INTO `tbl_inspection_result` (`ID`, `Application_location_clearance_ID`, `Date_inspection`, `Remarks`, `Violation`) VALUES
(1, 2, '2018-05-10', ' Occupying Subdivision Road ', 'YES');

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

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`ID`, `Cycle_ID`, `Message_from`, `Message_date`, `Message`, `Cycle_date`) VALUES
(1, 3, 'CP', '2018-06-16 04:08:01', 'The building where you applied for doesn\'t exist.', 2018),
(2, 4, 'CP', '2018-06-16 04:08:01', 'The building where you applied for doesn\'t exist.', 2018);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modules`
--

CREATE TABLE `tbl_modules` (
  `ID` int(11) NOT NULL,
  `Module_name` varchar(45) DEFAULT NULL,
  `Link` varchar(45) DEFAULT NULL,
  `ParentID` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_modules`
--

INSERT INTO `tbl_modules` (`ID`, `Module_name`, `Link`, `ParentID`) VALUES
(1, 'Dashboard', 'dashboard', 0),
(2, 'Position', 'position', 0),
(3, 'Application Form', 'application-form', 0),
(4, 'User Accounts', 'user-accounts', 0),
(5, 'Inquires', 'inquiry', 0),
(6, 'Notice to Comply', 'notice-comply', 0),
(7, 'Fire Inspection Safety Certificate', 'fsic', 0),
(8, 'City Engineer', 'Pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notice_type`
--

CREATE TABLE `tbl_notice_type` (
  `ID` bigint(255) NOT NULL,
  `Notice_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notice_type`
--

INSERT INTO `tbl_notice_type` (`ID`, `Notice_type`) VALUES
(1, '1st Notice of Violation '),
(2, '2nd Notice of Violation '),
(3, '3rd Notice of Violation ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_others`
--

CREATE TABLE `tbl_others` (
  `ID` bigint(255) NOT NULL,
  `Section` varchar(50) NOT NULL,
  `Value` varchar(500) NOT NULL,
  `APL_ID` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'Sem-Annually'),
(3, 'Quarterly');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pay_category`
--

CREATE TABLE `tbl_pay_category` (
  `ID` int(11) NOT NULL,
  `Category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pay_category`
--

INSERT INTO `tbl_pay_category` (`ID`, `Category_name`) VALUES
(1, 'Electrical Permit'),
(2, 'Business Permit'),
(3, 'Mechanical Permit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pay_range`
--

CREATE TABLE `tbl_pay_range` (
  `ID` bigint(255) NOT NULL,
  `From_value` double DEFAULT NULL,
  `To_value` double DEFAULT NULL,
  `Rate` double DEFAULT NULL,
  `Pay_type_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pay_range`
--

INSERT INTO `tbl_pay_range` (`ID`, `From_value`, `To_value`, `Rate`, `Pay_type_ID`) VALUES
(1, 1, 100, 100, 12),
(2, 101, 200, 240, 12),
(3, 201, 351, 480, 12),
(4, 351, 500, 700, 12),
(5, 501, 750, 960, 12),
(6, 751, 1000, 1100, 12),
(7, 1, 5, 110, 13),
(8, 5.1, 10, 220, 13),
(9, 10.1, 15, 330, 13),
(10, 15.1, 20, 440, 13),
(11, 20.1, 25, 550, 13),
(12, 25.1, 30, 660, 13),
(13, 30.1, 35, 770, 13),
(14, 35.1, 40, 880, 13),
(15, 40.1, 45, 990, 13),
(16, 45.1, 50, 1100, 13),
(18, 751, 1000, 1000, 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pay_single`
--

CREATE TABLE `tbl_pay_single` (
  `ID` bigint(255) NOT NULL,
  `Rate_per_unit` double DEFAULT NULL,
  `Number_of_unit` double DEFAULT NULL,
  `Pay_type_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pay_single`
--

INSERT INTO `tbl_pay_single` (`ID`, `Rate_per_unit`, `Number_of_unit`, `Pay_type_ID`) VALUES
(1, 15, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pay_type`
--

CREATE TABLE `tbl_pay_type` (
  `ID` int(11) NOT NULL,
  `Pay_type` varchar(50) DEFAULT NULL,
  `Unit_abbreviation` varchar(50) DEFAULT NULL,
  `Category_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pay_type`
--

INSERT INTO `tbl_pay_type` (`ID`, `Pay_type`, `Unit_abbreviation`, `Category_ID`) VALUES
(1, 'LIGHTS', NULL, 1),
(2, 'C. OUTLET', NULL, 1),
(3, 'SWITCHES', NULL, 1),
(4, 'MAIN SWITCH', NULL, 1),
(5, 'A/C', NULL, 1),
(6, 'OTHERS', NULL, 1),
(7, 'WIRING PERMIT', NULL, 1),
(8, 'ELECTRICAL METER', 'Kv', 1),
(9, 'INSPECTION FEE', NULL, 1),
(10, 'FIRE CODE OF THE PHILIPPINESS', NULL, 1),
(11, 'SANITARY/PLUMBING INPS. FEE', 'Unit', 2),
(12, 'BUILDING INSPECTION FEE', 'Sq.m', 2),
(13, 'MACHINERIES', 'Hp', 3),
(14, 'INSPECTION FEE', NULL, 3),
(15, 'OTHERS', NULL, 3);

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
(12, NULL),
(13, NULL),
(14, 'Manager'),
(15, 'Programmer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_preffered_mode_of_release`
--

CREATE TABLE `tbl_preffered_mode_of_release` (
  `ID` int(11) NOT NULL,
  `Preffered_mode` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_preffered_mode_of_release`
--

INSERT INTO `tbl_preffered_mode_of_release` (`ID`, `Preffered_mode`) VALUES
(1, 'Pick-up'),
(2, 'By, email'),
(3, 'Applicant'),
(4, 'Representative ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_nature`
--

CREATE TABLE `tbl_project_nature` (
  `ID` int(11) NOT NULL,
  `Project` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project_nature`
--

INSERT INTO `tbl_project_nature` (`ID`, `Project`) VALUES
(1, 'New Development '),
(2, 'Improvements '),
(3, 'Other/s');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_tenure`
--

CREATE TABLE `tbl_project_tenure` (
  `ID` int(11) NOT NULL,
  `tenure` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project_tenure`
--

INSERT INTO `tbl_project_tenure` (`ID`, `tenure`) VALUES
(1, 'Permit '),
(2, 'Temporary '),
(3, 'Other/s');

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
(1, 1, 1, 'UNBILLED'),
(2, 2, 2, 'UNBILLED'),
(3, 3, 3, 'UNBILLED'),
(4, 4, 4, 'UNBILLED'),
(5, 5, 5, 'UNBILLED');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanitary_line`
--

CREATE TABLE `tbl_sanitary_line` (
  `ID` bigint(255) NOT NULL,
  `Sanitary_ID` bigint(255) NOT NULL,
  `Type_ID` int(5) NOT NULL,
  `Card_qty` bigint(255) NOT NULL,
  `Sanitary_permit_no` bigint(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Date_approved` datetime NOT NULL,
  `Date_disapproved` datetime NOT NULL,
  `Expiry_date` date NOT NULL,
  `Date_paid` datetime NOT NULL,
  `Action_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanitary_officers`
--

CREATE TABLE `tbl_sanitary_officers` (
  `ID` bigint(255) NOT NULL,
  `Officer_name` varchar(255) NOT NULL,
  `Position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sanitary_officers`
--

INSERT INTO `tbl_sanitary_officers` (`ID`, `Officer_name`, `Position`) VALUES
(1, 'Jeannie Vic P. Tarrazona ', 'Sanitary Inspector III'),
(2, 'Suzzette A. De Los Santos', 'Sanitary Inspector V'),
(3, 'Hildegarde B. Madalag, M.D.', 'City Health Officer'),
(4, 'Ma. Joselle A. Pineda', 'Sanitary Inspector III'),
(5, 'Christian Jorge M. Locsin', 'Sanitary Inspector III');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanitary_type`
--

CREATE TABLE `tbl_sanitary_type` (
  `ID` int(5) NOT NULL,
  `Business_type` varchar(20) NOT NULL,
  `Sanitary_fee` int(10) NOT NULL,
  `Card_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sanitary_type`
--

INSERT INTO `tbl_sanitary_type` (`ID`, `Business_type`, `Sanitary_fee`, `Card_type`) VALUES
(1, 'Food', 300, 'Yellow'),
(2, 'Non-Food', 350, 'Green'),
(3, 'Private', 350, 'Pink');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `ID` bigint(255) NOT NULL,
  `Cycle_ID` bigint(255) DEFAULT NULL,
  `Application_ID` bigint(255) NOT NULL,
  `Date_approved` datetime DEFAULT NULL,
  `Date_disapproved` datetime DEFAULT NULL,
  `Department` varchar(2) NOT NULL COMMENT 'BF/CH/CN/CE/CP',
  `Action_By` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`ID`, `Cycle_ID`, `Application_ID`, `Date_approved`, `Date_disapproved`, `Department`, `Action_By`) VALUES
(1, 1, 1, NULL, NULL, 'BF', NULL),
(2, 1, 1, NULL, NULL, 'CN', NULL),
(3, 1, 1, NULL, NULL, 'CH', NULL),
(4, 1, 1, NULL, NULL, 'CP', NULL),
(5, 1, 1, NULL, NULL, 'CT', NULL),
(6, 1, 1, NULL, NULL, 'CE', NULL),
(7, 1, 1, NULL, NULL, 'CV', NULL),
(8, 1, 1, NULL, NULL, 'MD', NULL),
(9, 2, 2, NULL, NULL, 'BF', NULL),
(10, 2, 2, NULL, NULL, 'CE', NULL),
(11, 2, 2, NULL, NULL, 'CN', NULL),
(12, 2, 2, NULL, NULL, 'CH', NULL),
(13, 2, 2, NULL, NULL, 'CP', NULL),
(14, 2, 2, NULL, NULL, 'CT', NULL),
(15, 2, 2, NULL, NULL, 'CV', NULL),
(16, 2, 2, NULL, NULL, 'MD', NULL),
(17, 3, 3, NULL, NULL, 'BF', NULL),
(18, 3, 3, NULL, NULL, 'CE', NULL),
(19, 3, 3, NULL, NULL, 'CN', NULL),
(20, 3, 3, NULL, NULL, 'CH', NULL),
(21, 3, 3, NULL, NULL, 'CP', NULL),
(22, 3, 3, NULL, NULL, 'CT', NULL),
(23, 3, 3, NULL, NULL, 'CV', NULL),
(24, 3, 3, NULL, NULL, 'MD', NULL),
(25, 4, 4, NULL, NULL, 'BF', NULL),
(26, 4, 4, NULL, NULL, 'CE', NULL),
(27, 4, 4, NULL, NULL, 'CN', NULL),
(28, 4, 4, NULL, NULL, 'CH', NULL),
(29, 4, 4, NULL, NULL, 'CP', NULL),
(30, 4, 4, NULL, NULL, 'CT', NULL),
(31, 4, 4, NULL, NULL, 'CV', NULL),
(32, 4, 4, NULL, NULL, 'MD', NULL),
(33, 5, 5, NULL, NULL, 'BF', NULL),
(34, 5, 5, NULL, NULL, 'CE', NULL),
(35, 5, 5, NULL, NULL, 'CN', NULL),
(36, 5, 5, NULL, NULL, 'CH', NULL),
(37, 5, 5, NULL, NULL, 'CP', NULL),
(38, 5, 5, NULL, NULL, 'CT', NULL),
(39, 5, 5, NULL, NULL, 'CV', NULL),
(40, 5, 5, NULL, NULL, 'MD', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `ID` bigint(255) NOT NULL,
  `Position_ID` int(11) DEFAULT NULL,
  `First_name` varchar(30) DEFAULT NULL,
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

INSERT INTO `tbl_users` (`ID`, `Position_ID`, `First_name`, `Last_name`, `Username`, `Password`, `Salt`, `Enable`, `U_ID`) VALUES
(3, 4, 'Sunny', 'Lopez', 'sunny.lopez@gmail.com', 'e1f10f085b638660363ba4f54dedee382a0d9fe5', 'w75tkes9lk11hr112s2c2mg0861fnjbi', 1, 'e1f10f085b638660363ba4f54dedee382a0d9fe5'),
(4, 4, 'Eddie', 'De Paula', 'e.depaula@gmail.com', '03c2ca8d28b1b996a8fb714eeb612ece8cdf9c6d', 'jz7txp$3tq1bd1e9r8vnnrbl9ik5agpv', 1, '03c2ca8d28b1b996a8fb714eeb612ece8cdf9c6d'),
(5, 8, 'Carlito', 'Caballero', 'carlito@gmail.com', '55d25d49cbe3ac52ac681c53ab3f92de5f17d1e0', '5fjp7qh7$48$n4kto4btzinciim$lhhv', 1, '55d25d49cbe3ac52ac681c53ab3f92de5f17d1e0'),
(6, 3, 'Regina', 'Lopez', 'crissa115@yahoo.com', 'f3b373d3359be057d10f007847c7c4fd0a1f44a9', 'n8t6k1dho35w51fzv118r6nky231ocwa', 1, 'f3b373d3359be057d10f007847c7c4fd0a1f44a9'),
(7, 5, 'Charles', 'Xavier', 'charles.xavier@xmen.com', '7b022ff48b8e242f1e57dfedb9627795a59ca5e6', '5%1zh?^8wy5xunp#%ux#d$mm?>?224<c', 1, '7b022ff48b8e242f1e57dfedb9627795a59ca5e6'),
(8, 7, 'Jean', 'Gray', 'jean.gray@gmail.com', 'e375f2d575484d449f86406a981ec26b77698d46', '3*c5j^8l^f>)06jq?r*b$v3j><s411>6', 1, 'e375f2d575484d449f86406a981ec26b77698d46'),
(9, 3, 'Marian ', 'Rivera ', 'marian05', '5fbb3354392069c089c0f91a1c78989114d230ac', '>89sdrma(?rgp^!)ixjx)%t?j9^^c>mq', 1, '5fbb3354392069c089c0f91a1c78989114d230ac'),
(10, 11, 'Enrique', 'Ambos', 'Enriqueambos', '5fbb3354392069c089c0f91a1c78989114d230ac', '>89sdrma(?rgp^!)ixjx)%t?j9^^c>mq', 1, '5fbb3354392069c089c0f91a1c78989114d230ac');

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
(1, 3, 0, 1, 0, 0, 0),
(2, 3, 0, 1, 0, 0, 0),
(3, 3, 0, 1, 0, 0, 0),
(4, 3, 1, 0, 0, 0, 0),
(1, 4, 1, 0, 0, 0, 0),
(2, 4, 0, 0, 1, 0, 0),
(3, 4, 0, 0, 1, 0, 0),
(4, 4, 0, 0, 1, 0, 0),
(8, 4, 0, 0, 0, 0, 1),
(1, 5, 1, 0, 0, 0, 0),
(2, 5, 1, 0, 0, 0, 0),
(3, 5, 1, 0, 0, 0, 0),
(4, 5, 1, 0, 0, 0, 0),
(5, 5, 0, 0, 0, 1, 0),
(6, 5, 0, 0, 0, 1, 0),
(7, 5, 0, 0, 0, 0, 1),
(1, 8, 0, 1, 0, 0, 0),
(2, 8, 0, 1, 0, 0, 0),
(3, 8, 0, 1, 0, 0, 0),
(4, 8, 0, 1, 0, 0, 0),
(1, 9, 0, 0, 1, 0, 0),
(2, 9, 0, 0, 0, 1, 0),
(3, 9, 0, 1, 0, 0, 0),
(4, 9, 0, 1, 0, 0, 0),
(8, 10, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_written_notice`
--

CREATE TABLE `tbl_written_notice` (
  `ID` bigint(255) NOT NULL,
  `Application_location_clearance_ID` bigint(255) DEFAULT NULL,
  `Date_of_notice` datetime NOT NULL,
  `Order_request_indicated_in_notice` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_zoning_conditions`
--

CREATE TABLE `tbl_zoning_conditions` (
  `ID` bigint(255) NOT NULL,
  `Application_location_clearance_ID` bigint(255) DEFAULT NULL,
  `Condition_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tbl_application_notice`
--
ALTER TABLE `tbl_application_notice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_application_status`
--
ALTER TABLE `tbl_application_status`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_authorized_representative`
--
ALTER TABLE `tbl_authorized_representative`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_barangay`
--
ALTER TABLE `tbl_barangay`
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
-- Indexes for table `tbl_business_type`
--
ALTER TABLE `tbl_business_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_cards`
--
ALTER TABLE `tbl_cards`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_card_applications`
--
ALTER TABLE `tbl_card_applications`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_card_holder_profile`
--
ALTER TABLE `tbl_card_holder_profile`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_card_requirements`
--
ALTER TABLE `tbl_card_requirements`
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
-- Indexes for table `tbl_condition`
--
ALTER TABLE `tbl_condition`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_cycle`
--
ALTER TABLE `tbl_cycle`
  ADD PRIMARY KEY (`ID`,`Application_ID`);

--
-- Indexes for table `tbl_existing_land_use`
--
ALTER TABLE `tbl_existing_land_use`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_existing_uses_of_project_site`
--
ALTER TABLE `tbl_existing_uses_of_project_site`
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
-- Indexes for table `tbl_inspection_result`
--
ALTER TABLE `tbl_inspection_result`
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
-- Indexes for table `tbl_notice_type`
--
ALTER TABLE `tbl_notice_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_others`
--
ALTER TABLE `tbl_others`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_payment_mode`
--
ALTER TABLE `tbl_payment_mode`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_pay_category`
--
ALTER TABLE `tbl_pay_category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_pay_range`
--
ALTER TABLE `tbl_pay_range`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_pay_single`
--
ALTER TABLE `tbl_pay_single`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_pay_type`
--
ALTER TABLE `tbl_pay_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_preffered_mode_of_release`
--
ALTER TABLE `tbl_preffered_mode_of_release`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_project_nature`
--
ALTER TABLE `tbl_project_nature`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_project_tenure`
--
ALTER TABLE `tbl_project_tenure`
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
-- Indexes for table `tbl_sanitary_line`
--
ALTER TABLE `tbl_sanitary_line`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_sanitary_officers`
--
ALTER TABLE `tbl_sanitary_officers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_sanitary_type`
--
ALTER TABLE `tbl_sanitary_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
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
-- Indexes for table `tbl_written_notice`
--
ALTER TABLE `tbl_written_notice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_zone`
--
ALTER TABLE `tbl_zone`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_zoning_conditions`
--
ALTER TABLE `tbl_zoning_conditions`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_application_form`
--
ALTER TABLE `tbl_application_form`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_application_form_amendment`
--
ALTER TABLE `tbl_application_form_amendment`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_application_location_clearance_form`
--
ALTER TABLE `tbl_application_location_clearance_form`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_application_notice`
--
ALTER TABLE `tbl_application_notice`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_application_status`
--
ALTER TABLE `tbl_application_status`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_authorized_representative`
--
ALTER TABLE `tbl_authorized_representative`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_barangay`
--
ALTER TABLE `tbl_barangay`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_building_owner`
--
ALTER TABLE `tbl_building_owner`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_business_activity`
--
ALTER TABLE `tbl_business_activity`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_business_type`
--
ALTER TABLE `tbl_business_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_cards`
--
ALTER TABLE `tbl_cards`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_card_applications`
--
ALTER TABLE `tbl_card_applications`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_card_holder_profile`
--
ALTER TABLE `tbl_card_holder_profile`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_card_requirements`
--
ALTER TABLE `tbl_card_requirements`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_city_engineer`
--
ALTER TABLE `tbl_city_engineer`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_city_engineer_line`
--
ALTER TABLE `tbl_city_engineer_line`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tbl_condition`
--
ALTER TABLE `tbl_condition`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_cycle`
--
ALTER TABLE `tbl_cycle`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_existing_land_use`
--
ALTER TABLE `tbl_existing_land_use`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_existing_uses_of_project_site`
--
ALTER TABLE `tbl_existing_uses_of_project_site`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_fire_code`
--
ALTER TABLE `tbl_fire_code`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tbl_fire_fsic_no`
--
ALTER TABLE `tbl_fire_fsic_no`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `tbl_fire_inspection_order`
--
ALTER TABLE `tbl_fire_inspection_order`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_fire_notice`
--
ALTER TABLE `tbl_fire_notice`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_fire_notice_defects`
--
ALTER TABLE `tbl_fire_notice_defects`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_fire_notice_violation`
--
ALTER TABLE `tbl_fire_notice_violation`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_fire_notice_violation_defects`
--
ALTER TABLE `tbl_fire_notice_violation_defects`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_fire_stoppage_recommendation`
--
ALTER TABLE `tbl_fire_stoppage_recommendation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_inspection_result`
--
ALTER TABLE `tbl_inspection_result`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_modules`
--
ALTER TABLE `tbl_modules`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_notice_type`
--
ALTER TABLE `tbl_notice_type`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_others`
--
ALTER TABLE `tbl_others`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_payment_mode`
--
ALTER TABLE `tbl_payment_mode`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_pay_category`
--
ALTER TABLE `tbl_pay_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_pay_range`
--
ALTER TABLE `tbl_pay_range`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_pay_single`
--
ALTER TABLE `tbl_pay_single`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_pay_type`
--
ALTER TABLE `tbl_pay_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_preffered_mode_of_release`
--
ALTER TABLE `tbl_preffered_mode_of_release`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_project_nature`
--
ALTER TABLE `tbl_project_nature`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_project_tenure`
--
ALTER TABLE `tbl_project_tenure`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- AUTO_INCREMENT for table `tbl_sanitary_line`
--
ALTER TABLE `tbl_sanitary_line`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sanitary_officers`
--
ALTER TABLE `tbl_sanitary_officers`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_sanitary_type`
--
ALTER TABLE `tbl_sanitary_type`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tbl_treasurers_payables`
--
ALTER TABLE `tbl_treasurers_payables`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_treasurers_payments`
--
ALTER TABLE `tbl_treasurers_payments`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_treasurers_receipts`
--
ALTER TABLE `tbl_treasurers_receipts`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_written_notice`
--
ALTER TABLE `tbl_written_notice`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_zone`
--
ALTER TABLE `tbl_zone`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_zoning_conditions`
--
ALTER TABLE `tbl_zoning_conditions`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
