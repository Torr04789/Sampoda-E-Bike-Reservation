-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 04:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sampodabike`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '2024-08-03 08:08:38');

-- --------------------------------------------------------

--
-- Table structure for table `ebikebooking`
--

CREATE TABLE `ebikebooking` (
  `id` int(11) NOT NULL,
  `BookingNumber` bigint(12) DEFAULT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `PickLoc` varchar(20) DEFAULT NULL,
  `ReturnLoc` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ebikebooking`
--

INSERT INTO `ebikebooking` (`id`, `BookingNumber`, `userEmail`, `VehicleId`, `FromDate`, `ToDate`, `PickLoc`, `ReturnLoc`, `message`, `Status`, `PostingDate`, `LastUpdationDate`) VALUES
(1, 462962684, 'victorokafor4789@gmail.com', 20, '2024-09-09T12:18', '2024-09-23T12:18', 'Bacoor', 'LasPinas', 'Come Quickly!', 1, '2024-09-09 04:18:38', '2024-09-22 23:27:09'),
(75, 613690674, 'victorokafor4789@gmail.com', 20, '2024-09-23T08:35', '2024-09-24T08:35', 'LasPinas', '14.4703488, 121.0220', 'SAd', 1, '2024-09-23 00:36:21', '2024-10-14 01:51:55'),
(76, 768630902, 'victorokafor4789@gmail.com', 20, '2024-10-12T17:56', '2024-10-13T17:56', 'Bacoor', '14.4240429, 121.0026', 'erere', 1, '2024-10-12 09:57:27', '2024-10-12 09:59:56'),
(77, 130475748, 'victorokafor4789@gmail.com', 20, '2024-10-14T09:21', '2024-10-17T09:21', 'LasPinas', '14.4240449, 121.0026', 'MEEPO', 2, '2024-10-14 01:21:41', '2024-10-14 01:35:38'),
(78, 107271039, 'victorokafor4789@gmail.com', 20, '2024-10-18T09:36', '2024-11-07T09:36', 'LasPinas', '14.4240449, 121.0026', 'ASAP PLEASEE!', 2, '2024-10-14 01:37:04', '2024-10-14 01:53:51'),
(79, 872017054, 'victorokafor4789@gmail.com', 20, '2024-11-26T09:36', '2025-04-04T09:36', 'LasPinas', '14.4240449, 121.0026', 'ASAP PLEASEE!', 3, '2024-10-14 01:37:30', '2024-10-14 01:47:35'),
(80, 696684304, 'victorokafor4789@gmail.com', 20, '2025-05-23T09:52', '2025-09-05T09:53', 'Manila', '', 'SSD', 2, '2024-10-14 01:53:34', '2024-10-14 01:59:45'),
(81, 568097865, 'victorokafor4789@gmail.com', 20, '2026-10-14T10:36', '2027-03-14T10:36', 'LasPinas', 'SOUTH', 'TA', 3, '2024-10-14 02:37:07', '2024-10-14 02:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `ebikebrands`
--

CREATE TABLE `ebikebrands` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ebikebrands`
--

INSERT INTO `ebikebrands` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(15, 'Queue  Reservation', '2024-09-09 03:26:48', '2024-09-09 03:58:46'),
(16, 'Self-Drive Rental', '2024-09-09 03:28:00', '2024-09-09 03:58:27'),
(17, 'Chauffeur Book', '2024-09-09 03:30:09', '2024-10-15 22:49:13');

-- --------------------------------------------------------

--
-- Table structure for table `ebikecontactusinfo`
--

CREATE TABLE `ebikecontactusinfo` (
  `id` int(11) NOT NULL,
  `Address` tinytext DEFAULT NULL,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ebikecontactusinfo`
--

INSERT INTO `ebikecontactusinfo` (`id`, `Address`, `EmailId`, `ContactNo`) VALUES
(1, 'Philippines', 'victorokafor4789@gmail.com', '09934821484');

-- --------------------------------------------------------

--
-- Table structure for table `ebikecontactusquery`
--

CREATE TABLE `ebikecontactusquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ebikecontactusquery`
--

INSERT INTO `ebikecontactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(36, 'Victor Okafor', 'victorokafor4789@gmail.com', '9934821484', '12312', '2024-10-12 10:00:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ebikepages`
--

CREATE TABLE `ebikepages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ebikepages`
--

INSERT INTO `ebikepages` (`id`, `PageName`, `type`, `detail`) VALUES
(1, 'Terms and Conditions', 'terms', '<P align=justify><FONT size=2><STRONG><FONT color=#990000>(1) ACCEPTANCE OF TERMS</FONT><BR><BR></STRONG>Welcome to Yahoo! India. 1Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: <A href=\"http://in.docs.yahoo.com/info/terms/\">http://in.docs.yahoo.com/info/terms/</A>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </FONT></P>\r\n<P align=justify><FONT size=2>Welcome to Yahoo! India. Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: </FONT><A href=\"http://in.docs.yahoo.com/info/terms/\"><FONT size=2>http://in.docs.yahoo.com/info/terms/</FONT></A><FONT size=2>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </FONT></P>\r\n<P align=justify><FONT size=2>Welcome to Yahoo! India. Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: </FONT><A href=\"http://in.docs.yahoo.com/info/terms/\"><FONT size=2>http://in.docs.yahoo.com/info/terms/</FONT></A><FONT size=2>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </FONT></P>'),
(2, 'Privacy Policy', 'privacy', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat</span>'),
(3, 'About Us ', 'aboutus', '                                                        																																								<h2 style=\"text-align: center;\"><span style=\"font-weight: bold; font-family: helvetica; font-size: x-large;\"><span style=\"color: rgb(0, 0, 0);\">Welcome to Sampoda E-Bike&nbsp;</span><img style=\"\"><span style=\"color: rgb(0, 0, 0);\">R</span><span style=\"color: rgb(0, 0, 0);\">ental Reservation</span></span></h2><h6 style=\"text-align: center;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: large;\">Sampoda E-Bike Rental Reservation is a system build to deal with problems faced in transportation. Major problems faced in this transport sector are such as task allocation, tracking of E-Bikes, assigning routes, payment, booking order, delivery report, generating transactions receipt, overworking of the employees, security of goods, users,and drivers. the E-Bike with tasks at hand and those without.</span></h6>\r\n										\r\n										\r\n										\r\n										                                                    '),
(11, 'FAQs', 'faqs', '<div style=\"text-align: justify;\"><span style=\"font-size: 1em; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">SAD</span></div>');

-- --------------------------------------------------------

--
-- Table structure for table `ebikerental`
--

CREATE TABLE `ebikerental` (
  `id` int(11) NOT NULL,
  `BookingNumber` bigint(12) DEFAULT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `PickLoc` varchar(20) DEFAULT NULL,
  `ReturnLoc` varchar(20) DEFAULT NULL,
  `message` varchar(200) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ebikerental`
--

INSERT INTO `ebikerental` (`id`, `BookingNumber`, `userEmail`, `VehicleId`, `FromDate`, `ToDate`, `PickLoc`, `ReturnLoc`, `message`, `Status`, `PostingDate`, `LastUpdationDate`) VALUES
(6, 422778580, 'victorokafor4789@gmail.com', 21, '2024-10-14T11:18', '2024-10-15T11:18', 'LasPinas', 'China', 'lets go', 3, '2024-10-14 03:18:25', NULL),
(7, 340365210, 'victorokafor4789@gmail.com', 21, '2024-10-17T11:30', '2024-10-30T11:30', 'LasPinas', 'AFRICA', 'Chinchong', 0, '2024-10-14 03:31:06', NULL),
(8, 977317034, 'victorokafor4789@gmail.com', 21, '2026-01-14T11:52', '2027-10-17T11:52', 'LasPinas', 'DEAD', 'assds', 3, '2024-10-14 03:52:34', NULL),
(9, 750668199, 'victorokafor4789@gmail.com', 30, '2024-10-16T07:45', '2024-10-17T07:45', 'LasPinas', 'Zapote 1 ', 'Let\'s Go!', 1, '2024-10-15 23:45:24', NULL),
(10, 793991936, 'victorokafor4789@gmail.com', 32, '2024-10-16T09:12', '2024-10-17T09:12', 'LasPinas', 'LasPinas', 'OSIMM', 1, '2024-10-16 01:12:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ebikereservation`
--

CREATE TABLE `ebikereservation` (
  `id` int(11) NOT NULL,
  `BookingNumber` bigint(12) DEFAULT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `PickLoc` varchar(20) DEFAULT NULL,
  `ReturnLoc` varchar(20) DEFAULT NULL,
  `message` varchar(200) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ebikereservation`
--

INSERT INTO `ebikereservation` (`id`, `BookingNumber`, `userEmail`, `VehicleId`, `FromDate`, `ToDate`, `PickLoc`, `ReturnLoc`, `message`, `Status`, `PostingDate`, `LastUpdationDate`) VALUES
(3, 167072885, 'victorokafor4789@gmail.com', 19, '2024-09-09T12:16', NULL, 'Blk2 Lot11 Royal Sou', 'Mall of Asia', 'I need it ASAP!', 1, '2024-09-09 04:17:10', NULL),
(5, 233506808, 'victorokafor4789@gmail.com', 19, '2024-10-14T08:10', NULL, 'LasPinas', '14.4240454, 121.0026', 'SAD', 2, '2024-10-14 00:10:25', NULL),
(7, 224684421, 'victorokafor4789@gmail.com', 19, '2024-10-14T08:21', NULL, 'Bacoor', '14.4240454, 121.0026', 'ASAP PLEASE', 0, '2024-10-14 00:21:21', NULL),
(8, 361416207, 'victorokafor4789@gmail.com', 19, '2024-10-14T08:21', NULL, 'Bacoor', '14.4240454, 121.0026', 'ASAP PLEASE', 2, '2024-10-14 00:21:21', NULL),
(11, 974331203, 'victorokafor4789@gmail.com', 22, '2024-10-14T08:45', NULL, 'LasPinas', 'SEX TOWN', '123', 2, '2024-10-14 00:45:50', NULL),
(12, 537074739, 'victorokafor4789@gmail.com', 19, '2024-10-14T08:47', NULL, 'LasPinas', 'DEAD', 'SAd', 3, '2024-10-14 00:47:33', NULL),
(13, 412360666, 'victorokafor4789@gmail.com', 19, '2024-10-14T09:03', NULL, 'Manila', '14.4240437, 121.0026', 'HELP', 3, '2024-10-14 01:03:24', NULL),
(14, 828221841, 'victorokafor4789@gmail.com', 19, '2024-10-14T09:04', NULL, 'SAD', '14.4240437, 121.0026', 'AD', 3, '2024-10-14 01:04:47', NULL),
(15, 382959334, 'victorokafor4789@gmail.com', 19, '2024-10-14T09:08', NULL, '14.4240437, 121.0026', 'LasPinas', 'D', 3, '2024-10-14 01:08:49', NULL),
(16, 115359199, 'victorokafor4789@gmail.com', 19, '2024-10-14T09:28', NULL, 'LasPinas', 'LETS G OO', 'ds', 3, '2024-10-14 01:28:46', NULL),
(17, 776425785, 'victorokafor4789@gmail.com', 22, '2024-10-14T09:58', NULL, 'LasPinas', '14.4240432, 121.0026', 'TINKER', 0, '2024-10-14 01:58:57', NULL),
(18, 862032184, 'victorokafor4789@gmail.com', 22, '2024-10-14T10:28', NULL, 'Manila', '14.4240441, 121.0026', 'AD', 0, '2024-10-14 02:28:48', NULL),
(19, 627248983, 'victorokafor4789@gmail.com', 19, '2024-10-14T12:01', NULL, 'LasPinas', 'Poland', 'SHHESH', 0, '2024-10-14 04:01:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ebikesubscribers`
--

CREATE TABLE `ebikesubscribers` (
  `id` int(11) NOT NULL,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ebikesubscribers`
--

INSERT INTO `ebikesubscribers` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(6, 'victorokafor4789@gmail.com', '2024-09-22 22:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `ebiketestimonial`
--

CREATE TABLE `ebiketestimonial` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `Testimonial` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ebiketestimonial`
--

INSERT INTO `ebiketestimonial` (`id`, `UserEmail`, `Testimonial`, `PostingDate`, `status`) VALUES
(1, 'victorokafor4789@gmail.com', 'This is great! ', '2024-08-04 05:20:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ebikeusers`
--

CREATE TABLE `ebikeusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ebikeusers`
--

INSERT INTO `ebikeusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(1, 'Victor Okafor', 'victorokafor4789@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '09934821484', '02/11/2002', 'Blk 2 Lot 11 Royal South Marcos Alvarez', 'Las Pinas City', 'Philippines', '2024-08-03 08:10:55', '2024-08-03 08:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `ebikevehicles`
--

CREATE TABLE `ebikevehicles` (
  `id` int(11) NOT NULL,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `VehiclesOverview` longtext DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `Driver` varchar(20) NOT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `LeatherSeats` int(11) DEFAULT NULL,
  `GPSLocation` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Status` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ebikevehicles`
--

INSERT INTO `ebikevehicles` (`id`, `VehiclesTitle`, `VehiclesBrand`, `VehiclesOverview`, `PricePerDay`, `FuelType`, `Driver`, `ModelYear`, `SeatingCapacity`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `LeatherSeats`, `GPSLocation`, `RegDate`, `UpdationDate`, `Status`) VALUES
(19, 'E-Bike (Green)', 15, 'To reserve an e-bike, pay a $20 reservation fee to secure your bike. Choose a pick-up location for delivery and a drop-off location for the end of your trip. After your ride, you’ll pay the driver based on the distance traveled between the two locations, in addition to the reservation fee.', 20, 'Reservation', 'No', 2020, 2, 'ebike-1.jpg', 'ebike-1.jpg', 'ebike-1.jpg', 'ebike-1.jpg', 'ebike-1.jpg', 1, 1, '2024-09-09 03:39:25', '2024-09-09 03:54:48', 0),
(20, 'E-Bike  (Red)', 16, 'To rent a self-driven E-Bike, pay a $200 rental fee to secure your E-Bike. You can choose your start date and end date for the rental period. Select a pick-up location for delivery and a drop-off location for the end of your ride. After completing your trip, you\'ll only pay the rental fee, with no additional charges for mileage.', 200, 'Rental', 'No', 2022, 3, 'ebike-2.jpg', 'ebike-2.jpg', 'ebike-2.jpg', 'ebike-2.jpg', 'ebike-2.jpg', 1, 1, '2024-09-09 03:42:35', '2024-10-15 22:49:46', 0),
(21, 'E-Bike (Yellow)', 17, 'To rent a  E-Bike with a chauffeur, pay a $250 reservation fee to secure your E-Bike. You can select your start date and end date for the rental period, as well as choose a location where the driver will deliver the E- Bike to you. At the end of your ride, you can designate a drop-off location. After completing your trip, you\'ll only pay the rental fee, with no additional charges for mileage.', 250, 'Booking', 'Yes', 2024, 2, 'ebike-3.jpg', 'ebike-3.jpg', 'ebike-3.jpg', 'ebike-3.jpg', 'ebike-3.jpg', 1, 1, '2024-09-09 03:44:23', '2024-10-15 22:49:57', 0),
(22, 'E-Bike  (Black)', 15, 'To reserve an e-bike, pay a $20 reservation fee to secure your bike. Choose a pick-up location for delivery and a drop-off location for the end of your trip. After your ride, you’ll pay the driver based on the distance traveled between the two locations, in addition to the reservation fee.', 20, 'Reservation', 'Yes', 2024, 2, 'bg.jpg', 'bg.jpg', 'bg.jpg', 'bg.jpg', 'bg.jpg', 1, 1, '2024-09-09 03:53:29', '2024-09-09 03:54:03', 0),
(24, 'E-Bike ', 15, 'To rent a  E-Bike with a chauffeur, pay a $250 reservation fee to secure your E-Bike. You can select your start date and end date for the rental period, as well as choose a location where the driver will deliver the E- Bike to you. At the end of your ride, you can designate a drop-off location. After completing your trip, you\'ll only pay the rental fee, with no additional charges for mileage.', 250, 'Reservation', 'Yes', 2024, 3, 'affordable_brand_new_and_quali_1684807859_ef8b3422_progressive.jpg', 'affordable_brand_new_and_quali_1684807859_ef8b3422_progressive.jpg', 'affordable_brand_new_and_quali_1684807859_ef8b3422_progressive.jpg', 'affordable_brand_new_and_quali_1684807859_ef8b3422_progressive.jpg', 'affordable_brand_new_and_quali_1684807859_ef8b3422_progressive.jpg', 1, 1, '2024-10-15 22:42:35', '2024-10-15 22:48:02', 0),
(25, 'E-Bike', 15, 'To reserve a  E-Bike with a chauffeur, pay a $250 reservation fee to secure your E-Bike. You can select your start date and end date for the rental period, as well as choose a location where the driver will deliver the E- Bike to you. At the end of your ride, you can designate a drop-off location. After completing your trip, you\'ll only pay the rental fee, with no additional charges for mileage.', 250, 'Reservation', 'Yes', 2024, 3, 'H035ce7dc594143b69e9495470ef30a79e.jpeg_350x350.avif', 'H035ce7dc594143b69e9495470ef30a79e.jpeg_350x350.avif', 'H035ce7dc594143b69e9495470ef30a79e.jpeg_350x350.avif', 'H035ce7dc594143b69e9495470ef30a79e.jpeg_350x350.avif', 'H035ce7dc594143b69e9495470ef30a79e.jpeg_350x350.avif', 1, 1, '2024-10-15 22:43:22', '2024-10-15 22:47:44', 0),
(26, 'E-Bike', 17, 'To rent a  E-Bike with a chauffeur, pay a $250 reservation fee to secure your E-Bike. You can select your start date and end date for the rental period, as well as choose a location where the driver will deliver the E- Bike to you. At the end of your ride, you can designate a drop-off location. After completing your trip, you\'ll only pay the rental fee, with no additional charges for mileage.', 250, 'Booking', 'Yes', 2024, 3, 'H88d4addb6be44b89a22785ff3202c281k.jpg_300x300.avif', 'H88d4addb6be44b89a22785ff3202c281k.jpg_300x300.avif', 'H88d4addb6be44b89a22785ff3202c281k.jpg_300x300.avif', 'H88d4addb6be44b89a22785ff3202c281k.jpg_300x300.avif', 'H88d4addb6be44b89a22785ff3202c281k.jpg_300x300.avif', 1, 1, '2024-10-15 22:43:57', NULL, 0),
(27, 'E-Bike', 17, 'To rent a  E-Bike with a chauffeur, pay a $250 reservation fee to secure your E-Bike. You can select your start date and end date for the rental period, as well as choose a location where the driver will deliver the E- Bike to you. At the end of your ride, you can designate a drop-off location. After completing your trip, you\'ll only pay the rental fee, with no additional charges for mileage.', 250, 'Booking', 'Yes', 2024, 3, 'ebike_3_wheels_1660675899_684f2e8f.jpg', 'ebike_3_wheels_1660675899_684f2e8f.jpg', 'ebike_3_wheels_1660675899_684f2e8f.jpg', 'ebike_3_wheels_1660675899_684f2e8f.jpg', 'ebike_3_wheels_1660675899_684f2e8f.jpg', 1, 1, '2024-10-15 22:44:33', NULL, 0),
(28, 'E-Bike', 16, 'To rent a  E-Bike with a chauffeur, pay a $250 reservation fee to secure your E-Bike. You can select your start date and end date for the rental period, as well as choose a location where the driver will deliver the E- Bike to you. At the end of your ride, you can designate a drop-off location. After completing your trip, you\'ll only pay the rental fee, with no additional charges for mileage.', 200, 'Rental', 'Yes', 2024, 3, '43.jpg', '43.jpg', '43.jpg', '43.jpg', '43.jpg', 1, 1, '2024-10-15 22:45:32', NULL, 0),
(29, 'E-Bike', 16, 'To rent a  E-Bike with a chauffeur, pay a $250 reservation fee to secure your E-Bike. You can select your start date and end date for the rental period, as well as choose a location where the driver will deliver the E- Bike to you. At the end of your ride, you can designate a drop-off location. After completing your trip, you\'ll only pay the rental fee, with no additional charges for mileage.', 250, 'Rental', 'Yes', 2024, 3, '3e.jpg', '3e.jpg', '3e.jpg', '3e.jpg', '3e.jpg', 1, 1, '2024-10-15 22:46:12', '2024-10-15 22:49:30', 0),
(30, 'E-Bike', 16, 'To rent a  E-Bike with a chauffeur, pay a $250 reservation fee to secure your E-Bike. You can select your start date and end date for the rental period, as well as choose a location where the driver will deliver the E- Bike to you. At the end of your ride, you can designate a drop-off location. After completing your trip, you\'ll only pay the rental fee, with no additional charges for mileage.', 250, 'Rental', 'Yes', 2024, 3, '2e.avif', '2e.avif', '2e.avif', '2e.avif', '2e.avif', 1, 1, '2024-10-15 22:46:49', NULL, 0),
(37, 'Land Cruiser', 16, '1', 1000, 'Rental', 'Yes', 2024, 4, 'ebike_3_wheels_1660675899_684f2e8f.jpg', 'ebike_3_wheels_1660675899_684f2e8f.jpg', 'ebike_3_wheels_1660675899_684f2e8f.jpg', 'ebike_3_wheels_1660675899_684f2e8f.jpg', 'ebike_3_wheels_1660675899_684f2e8f.jpg', 1, 1, '2024-10-16 02:13:09', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ebikebooking`
--
ALTER TABLE `ebikebooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ebikebrands`
--
ALTER TABLE `ebikebrands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ebikecontactusinfo`
--
ALTER TABLE `ebikecontactusinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ebikecontactusquery`
--
ALTER TABLE `ebikecontactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ebikepages`
--
ALTER TABLE `ebikepages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ebikerental`
--
ALTER TABLE `ebikerental`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ebikereservation`
--
ALTER TABLE `ebikereservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ebikesubscribers`
--
ALTER TABLE `ebikesubscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ebiketestimonial`
--
ALTER TABLE `ebiketestimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ebikeusers`
--
ALTER TABLE `ebikeusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`);

--
-- Indexes for table `ebikevehicles`
--
ALTER TABLE `ebikevehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ebikebooking`
--
ALTER TABLE `ebikebooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `ebikebrands`
--
ALTER TABLE `ebikebrands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ebikecontactusinfo`
--
ALTER TABLE `ebikecontactusinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ebikecontactusquery`
--
ALTER TABLE `ebikecontactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `ebikepages`
--
ALTER TABLE `ebikepages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ebikerental`
--
ALTER TABLE `ebikerental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ebikereservation`
--
ALTER TABLE `ebikereservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ebikesubscribers`
--
ALTER TABLE `ebikesubscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ebiketestimonial`
--
ALTER TABLE `ebiketestimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ebikeusers`
--
ALTER TABLE `ebikeusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ebikevehicles`
--
ALTER TABLE `ebikevehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
