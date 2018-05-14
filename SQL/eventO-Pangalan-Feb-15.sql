-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2018 at 07:24 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ceu`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounting-dept`
--

CREATE TABLE `accounting-dept` (
  `ID` int(11) NOT NULL,
  `Rate` float DEFAULT NULL,
  `Total` float DEFAULT NULL,
  `Date` varchar(20) NOT NULL,
  `users_ID` int(11) NOT NULL,
  `ap_reservation_main_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounting-dept`
--

INSERT INTO `accounting-dept` (`ID`, `Rate`, `Total`, `Date`, `users_ID`, `ap_reservation_main_ID`) VALUES
(2, 200, 4000, 'February 1, 2018', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `activityproposal`
--

CREATE TABLE `activityproposal` (
  `ap_id` int(11) NOT NULL,
  `Theme` varchar(100) DEFAULT NULL,
  `ap_status` varchar(50) DEFAULT NULL,
  `Note` varchar(255) DEFAULT NULL,
  `Type` varchar(30) DEFAULT NULL,
  `Location` varchar(10) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `TargetParticipant` varchar(50) NOT NULL,
  `Rehearsal(TD)` varchar(100) DEFAULT NULL,
  `CountTarget` varchar(10) DEFAULT NULL,
  `ObjectivePercent` int(10) NOT NULL,
  `ValuesInculcated` varchar(100) NOT NULL,
  `PastMean` varchar(10) DEFAULT NULL,
  `PastVI` varchar(10) DEFAULT NULL,
  `BudgetType` varchar(50) NOT NULL,
  `TakenFrom` varchar(100) NOT NULL,
  `events_id` int(11) DEFAULT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activityproposal`
--

INSERT INTO `activityproposal` (`ap_id`, `Theme`, `ap_status`, `Note`, `Type`, `Location`, `Description`, `TargetParticipant`, `Rehearsal(TD)`, `CountTarget`, `ObjectivePercent`, `ValuesInculcated`, `PastMean`, `PastVI`, `BudgetType`, `TakenFrom`, `events_id`, `created`) VALUES
(2, 'Another one', 'Returned', 'Change your title', 'Community Outreach', 'Inside', 'another one', '', '', '', 0, '', '', '', '', '', 38, 6),
(3, 'Hi Crush', 'Verified | Pending Financial Report/Status	\r\n', '', 'Community Outreach', 'Inside', 'Hi Crushh', 'BSIT', 'Monday and Tuesday', '32', 95, 'Love', '95', 'Passed', 'Requesting Subsidy for Venue(s) Only', '', 33, 1),
(5, 'A gust of expertise', 'Verified | Pending Financial Report/Status', 'Go', 'Community Outreach', 'Inside', 'An event where all gathered to witness Mark Zuckerberg demonstrates his new app', '', '', '', 0, 'Love', '65', 'Passed', 'To be taken from the fund of', '20000', 61, 1),
(6, NULL, 'Verified | Pending Financial Report/Status', NULL, NULL, NULL, NULL, '', NULL, NULL, 0, '', NULL, NULL, '', '', 60, 1),
(7, 'A silence of the night', 'Verified | Pending Financial Report/Status', '', 'Community Outreach', 'Inside', 'This will show if the due date really works', 'BSIT and JPCS', '', '200', 0, 'Love', '', '', 'Requesting Subsidy for Venue(s) Only', '', 64, 1),
(8, NULL, 'Verified | Waiting for the event', NULL, NULL, NULL, NULL, '', NULL, NULL, 0, '', NULL, NULL, '', '', 56, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ap_committees`
--

CREATE TABLE `ap_committees` (
  `ID` int(11) NOT NULL,
  `Committee` varchar(50) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `Committees_Status` varchar(25) NOT NULL,
  `ap_id` int(11) NOT NULL,
  `mobile_users_mobile_users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ap_committees`
--

INSERT INTO `ap_committees` (`ID`, `Committee`, `Position`, `Committees_Status`, `ap_id`, `mobile_users_mobile_users_id`) VALUES
(7, 'Overall', 'Chairman', 'Done', 3, 0),
(8, 'Food', 'Co-Chairman', 'Done', 3, 0),
(11, 'Food', 'Member', 'Done', 3, 0),
(14, 'Overall', 'Co-Chairman', 'Done', 3, 0),
(15, 'Food', 'Chairman', 'Done', 3, 0),
(16, 'Overall', 'Chairman', 'Not Done', 5, 0),
(17, 'Overall', 'Co-Chairman', 'Not Done', 5, 0),
(18, 'Food', 'Chairman', 'Done', 5, 0),
(19, 'Overall', 'Chairman', 'Done', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ap_consumption`
--

CREATE TABLE `ap_consumption` (
  `ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `Committees` varchar(50) NOT NULL,
  `Price` float NOT NULL,
  `Description` varchar(50) NOT NULL,
  `ap_financial_disbursement_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ap_consumption`
--

INSERT INTO `ap_consumption` (`ID`, `Committees`, `Price`, `Description`, `ap_financial_disbursement_ID`) VALUES
(00000000007, 'Food', 260, 'Jollibee', 6),
(00000000009, 'Materials', 5, 'Stapler', 6),
(00000000011, 'Honorarium', 1000, 'Dota', 6),
(00000000012, 'ProgramInvi', 5000, 'Lauv', 6),
(00000000015, 'Token', 1000, 'Try', 6),
(00000000016, 'Others', 1000, 'Try', 6),
(00000000017, 'Others', 500, 'Try', 6),
(00000000020, 'Venue', 1000, 'True', 6),
(00000000021, 'Energy', 500, 'Meralco', 6),
(00000000024, 'Transportation', 1000, 'Taxi', 6);

-- --------------------------------------------------------

--
-- Table structure for table `ap_distributionbudget`
--

CREATE TABLE `ap_distributionbudget` (
  `ID` int(11) NOT NULL,
  `Committees` varchar(50) NOT NULL,
  `Distributor` varchar(100) NOT NULL,
  `Amount` double NOT NULL,
  `Description` varchar(100) NOT NULL,
  `ap_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ap_distributionbudget`
--

INSERT INTO `ap_distributionbudget` (`ID`, `Committees`, `Distributor`, `Amount`, `Description`, `ap_id`) VALUES
(2, 'Food', 'JPCS', 5000, 'Nice', 3),
(6, 'Materials', 'JPCS', 100, 'Nice', 3),
(8, 'Honorarium', 'JPCS', 100, 'Nice', 3),
(11, 'ProgramInvi', 'JPCS', 100, 'Nice', 3),
(13, 'Token', 'JPCS', 100, 'Nice', 3),
(15, 'Others', 'JPCS', 100, 'Nice', 3),
(17, 'Venue', 'JPCS', 100, 'Nice', 3),
(19, 'Energy', 'JPCS', 100, 'Nice', 3),
(21, 'Transportation', 'JPCS', 100, 'Nice', 3),
(23, 'Contingency', 'JPCS', 100, 'Nice', 3),
(25, 'Food', 'JPCS', 200000, 'JPCS Fund', 7),
(26, 'Documentation', 'JPCS', 2000, 'Nice', 8),
(27, 'Token', 'JPCS', 1000, 'Nice', 6),
(29, 'Contingency', 'CSIT', 200, 'Nice', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ap_expenses`
--

CREATE TABLE `ap_expenses` (
  `ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `Committees` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Pcs` float NOT NULL,
  `Price` float NOT NULL,
  `Description` varchar(50) NOT NULL,
  `ap_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ap_expenses`
--

INSERT INTO `ap_expenses` (`ID`, `Committees`, `Name`, `Pcs`, `Price`, `Description`, `ap_id`) VALUES
(00000000003, 'Token', 'CSGO Champion', 1, 1000, 'CSIT Day', 3),
(00000000004, 'Token', 'Dota Champion', 1, 1000, 'CSIT Day', 3),
(00000000005, 'Token', 'Programming Champion', 1, 400, 'CSIT Day', 3),
(00000000007, 'Documentation', 'Stapler', 5, 500, 'Little Town', 3),
(00000000008, 'Documentation', 'Print', 250, 5, 'Print', 3),
(00000000009, 'Food', 'Jollibee', 50, 85, 'Affordable', 3),
(00000000010, 'Documentation', 'Xerox', 50, 0.5, '7th Floor', 3),
(00000000012, 'Food', 'Jollibee', 10, 100, 'For guests', 3),
(00000000015, 'Food', 'Jollibee', 1, 1000, 'For King', 3),
(00000000016, 'Food', 'KFC', 1, 2000, 'For Queen', 3),
(00000000023, 'ProgramInvi', 'Print', 30, 500, 'Print', 3),
(00000000026, 'Contingency', 'Contingency', 1, 500, 'If ever', 3),
(00000000029, 'Documentation', 'Pin', 25, 30, 'Little Town', 5),
(00000000030, 'Food', 'Itallianis', 100, 2000, 'For Facebook Guests', 5),
(00000000031, 'Food', 'Giligans', 200, 2000, 'Nice', 7),
(00000000035, 'Others', 'Grab', 3, 200, 'Contestant', 3),
(00000000036, 'Venue', 'Pasig Covered Court', 1, 200, 'Nice', 3),
(00000000037, 'Energy', 'Energy Fee', 1, 2505, 'SAC GP', 3),
(00000000038, 'Transportation', 'Bus', 3, 200, 'CEU', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ap_exp_materials`
--

CREATE TABLE `ap_exp_materials` (
  `ID` int(11) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` double NOT NULL,
  `ap_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ap_exp_materials`
--

INSERT INTO `ap_exp_materials` (`ID`, `Category`, `Name`, `Price`, `ap_id`) VALUES
(1, 'Publicity', 'Print', 202, 3),
(3, 'Registration', 'Print', 53, 3),
(4, 'Registration', 'print', 5, 3),
(5, 'Registration', 'print', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ap_financial_disbursement`
--

CREATE TABLE `ap_financial_disbursement` (
  `ID` int(11) NOT NULL,
  `ap_financial_disbursement_status` varchar(45) DEFAULT NULL,
  `ap_financial_disbursement_notes` varchar(255) DEFAULT NULL,
  `ap_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ap_financial_disbursement`
--

INSERT INTO `ap_financial_disbursement` (`ID`, `ap_financial_disbursement_status`, `ap_financial_disbursement_notes`, `ap_id`) VALUES
(6, 'Verified', 'Change Mary', 3),
(7, 'Verified', 'Ben', 5),
(8, 'Verified', 'Nathan', 6),
(9, 'Verified', 'kl', 7),
(10, 'Verified', 'PAkita ka', 7);

-- --------------------------------------------------------

--
-- Table structure for table `ap_financial_report`
--

CREATE TABLE `ap_financial_report` (
  `ID` int(11) NOT NULL,
  `ap_financial_report_status` varchar(45) DEFAULT NULL,
  `ap_financial_report_notes` varchar(255) DEFAULT NULL,
  `ap_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ap_financial_report`
--

INSERT INTO `ap_financial_report` (`ID`, `ap_financial_report_status`, `ap_financial_report_notes`, `ap_id`) VALUES
(1, 'Returned', 'Mary Mary', 3),
(2, 'Verified', '', 5),
(3, 'Verified', 'Mary', 6),
(4, 'Pending', '', 7),
(5, 'Returned', '', 7);

-- --------------------------------------------------------

--
-- Table structure for table `ap_guest`
--

CREATE TABLE `ap_guest` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Position` varchar(255) NOT NULL,
  `Educ_Attainment` varchar(255) NOT NULL,
  `Exp_Train` varchar(255) NOT NULL,
  `ap_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ap_guest`
--

INSERT INTO `ap_guest` (`ID`, `Name`, `Position`, `Educ_Attainment`, `Exp_Train`, `ap_id`) VALUES
(1, 'Ben John C. Villanueva III', 'CEO', 'Cum Laude', 'Pro Web Developer/Programmer', 3),
(2, 'Mary Aissen Avisado', 'CEO', 'Cum Laude', 'MNS', 3),
(6, 'Mark Zuckerberg', 'CEO', 'Nice', 'Facebook', 5),
(7, ' Ben John C. Villanueva III', 'CEO', 'Cum Laude', 'Boss', 7);

-- --------------------------------------------------------

--
-- Table structure for table `ap_objectives`
--

CREATE TABLE `ap_objectives` (
  `ID` int(11) NOT NULL,
  `Objectives` varchar(255) NOT NULL,
  `events_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ap_reservation`
--

CREATE TABLE `ap_reservation` (
  `ID` int(11) NOT NULL,
  `Subject` varchar(70) NOT NULL,
  `Pcs` varchar(20) NOT NULL,
  `Sector` varchar(50) NOT NULL,
  `ap_reservation_main_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ap_reservation`
--

INSERT INTO `ap_reservation` (`ID`, `Subject`, `Pcs`, `Sector`, `ap_reservation_main_ID`) VALUES
(4, 'Chair', '3', 'Physical Facilities', 6),
(6, 'Laptop/Wide Screen', '1', 'TLTS', 6),
(9, 'CD/Casette Player', '3', 'TLTS', 6),
(11, 'DVD/VCD Player', '3', 'TLTS', 6),
(12, 'Lecture Style', '1', 'Classroom', 6),
(13, 'Chair', '200', 'Physical Facilities', 10),
(14, 'Laptop/Wide Screen', '1', 'TLTS', 10),
(15, 'Microphone/Karaoke', '2', 'TLTS', 10),
(17, 'Square Style', '1', 'Classroom', 9),
(19, 'Lecture Style', '1', 'Classroom', 8),
(20, 'LCD/Overhead/Projector', '2', 'TLTS', 6);

-- --------------------------------------------------------

--
-- Table structure for table `ap_reservation_main`
--

CREATE TABLE `ap_reservation_main` (
  `ID` int(11) NOT NULL,
  `reservation_status` varchar(45) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `ap_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ap_reservation_main`
--

INSERT INTO `ap_reservation_main` (`ID`, `reservation_status`, `notes`, `ap_id`) VALUES
(6, 'Verified by Property', 'Bennn', 3),
(7, 'Verified by TLTS', NULL, 2),
(8, 'Pending', '', 5),
(9, 'Pending', '', 6),
(10, 'Verified by Property', '', 7),
(11, 'Pending', '', 8);

-- --------------------------------------------------------

--
-- Table structure for table `ap_schedule`
--

CREATE TABLE `ap_schedule` (
  `ID` int(11) NOT NULL,
  `Activity` varchar(60) NOT NULL,
  `Starttime` varchar(50) NOT NULL,
  `Endtime` varchar(50) NOT NULL,
  `Person_Group` varchar(70) NOT NULL,
  `ap_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ap_schedule`
--

INSERT INTO `ap_schedule` (`ID`, `Activity`, `Starttime`, `Endtime`, `Person_Group`, `ap_id`) VALUES
(3, 'Class', '10:00', '15:00', 'Mr. Marcial Anacio', 5),
(6, 'Registration', '07:00', '07:10', 'Jane Doe', 7),
(7, 'Opening Remarks', '07:10', '07:20', 'Mr. Marcial Anacio', 7),
(11, 'Registration', '10:10', '10:20', 'Glizzel Toledo', 3);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `ID` int(11) NOT NULL,
  `department_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`ID`, `department_name`) VALUES
(1, 'CSIT'),
(2, 'HRM'),
(3, 'SAO'),
(4, 'TLTS'),
(5, 'Property'),
(6, 'Maintenance'),
(7, 'Organization Adviser'),
(8, 'BS Tourism'),
(9, 'BS Law'),
(10, 'BS Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `place` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `proponent` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `situation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `notes` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`, `place`, `proponent`, `situation`, `sy`, `notes`, `created`) VALUES
(33, 'Mary', '', '2018-01-24 13:30:00', '2018-01-24 13:30:00', 'CEU SAC GP', 'Me', 'Pending Activity Proposal', '', 'Crushhh', 1),
(38, 'Another one', '', '2018-01-26 13:30:00', '2018-01-26 13:30:00', 'another one', 'JPCS', 'Verified', '2017-2018', '', 6),
(56, 'CSIT Day', '', '2018-01-25 07:00:00', '2018-01-25 12:00:00', '9th Floor, 901 and 902', 'JPCS', 'Pending Activity Proposal', '2017-2018', 'We have already changed it. Thank you.', 1),
(57, 'CSIT Day', '', '2018-01-26 13:30:00', '2018-01-27 16:00:00', '9th Floor, 901 and 902', 'JPCS', 'Verified by Organization Adviser', '2017-2018', 'Awardingg', 1),
(60, 'Nathan Ganesh', '', '2018-01-22 01:00:00', '2018-01-22 03:00:00', 'Ben', 'Ben', 'Pending Activity Proposal', '2017-2018', 'Done', 1),
(61, 'Ben', '', '2018-01-22 01:00:00', '2018-01-22 03:00:00', 'Red', 'Ben', 'Pending Activity Proposal', '2017-2018', '', 1),
(62, 'Try', '', '2018-01-26 01:00:00', '2018-01-27 13:00:00', 'Try', 'JPCS', 'Verified', '2017-2018', '', 1),
(63, 'JPCS Week', '', '2018-01-27 08:00:00', '2018-01-27 16:30:00', '9th Floor', 'CSIT', 'Returned', '2017-2018', 'Change your color to redplease. Thank you.', 6),
(64, 'Trying Due Date', '', '2018-02-10 07:00:00', '2018-02-10 11:00:00', '9th Floor', 'JPCS', 'Pending Activity Proposal', '2017-2018', 'Good', 1),
(65, 'Yow', '', '2018-02-22 01:00:00', '2018-02-23 13:00:00', 'Ben', 'CSIT', 'Verified by Organization Adviser', '2017-2018', '', 6),
(67, 'Dapat Gumana to', '#008000', '2018-02-15 00:00:00', '2018-02-16 00:00:00', 'rer', 'rere', 'Pending', '2017-2018', 'rer', 6),
(68, 'Valentines Day', '#FF0000', '2018-02-14 00:00:00', '2018-02-15 00:00:00', '9th Floor', 'USC', 'Returned', '2017-2018', 'Change the Place', 13),
(71, 'Try', '', '2018-02-21 00:00:00', '2018-02-22 00:00:00', '', '', 'Verified by Organization Adviser', '2017-2018', '', 1),
(81, 'Capstone Thesis Defense', '#008000', '2018-02-17 00:00:00', '2018-02-18 00:00:00', 'CEU LV 9th Floor', 'Panelists', 'Pending', '2017-2018', 'Success', 61),
(82, 'Hearing Law', '#0071c5', '2018-02-21 00:00:00', '2018-02-22 00:00:00', 'Malacanang', 'Malacanang Gov.', 'Pending', '2017-2018', '', 62),
(83, 'Try', '#FFD700', '2018-02-22 00:00:00', '2018-02-23 00:00:00', '', 'Try', 'Pending', '2017-2018', '', 61),
(84, 'Try', '#FF8C00', '2018-02-23 00:00:00', '2018-02-24 00:00:00', '', '', 'Pending', '2017-2018', '', 62),
(85, 'Try', '#008000', '2018-02-22 00:00:00', '2018-02-23 00:00:00', '', '', 'Pending', '2017-2018', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `Function` varchar(30) DEFAULT NULL,
  `Time` datetime DEFAULT NULL,
  `users_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mobile_users`
--

CREATE TABLE `mobile_users` (
  `mobile_users_id` int(11) NOT NULL,
  `Userno` varchar(45) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `department_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mobile_users`
--

INSERT INTO `mobile_users` (`mobile_users_id`, `Userno`, `Username`, `Password`, `department_ID`) VALUES
(1, NULL, 'Tourism', 'Tourism', 8),
(2, NULL, 'Ben', 'Ben', 1),
(3, NULL, 'Jane', 'Jane', 2),
(4, NULL, 'Law', 'Law', 9),
(5, NULL, 'Lara', 'Lara', 10);

-- --------------------------------------------------------

--
-- Table structure for table `mobile_users_has_organization`
--

CREATE TABLE `mobile_users_has_organization` (
  `mobile_users_mobile_users_id` int(11) NOT NULL,
  `organization_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `ID` int(11) NOT NULL,
  `organization_name` varchar(150) NOT NULL,
  `organization_adviser` varchar(5) NOT NULL,
  `organization_objectives` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`ID`, `organization_name`, `organization_adviser`, `organization_objectives`) VALUES
(1, 'CSIT SC', '59', ''),
(2, 'JPCS SC', '59', ''),
(3, 'HRM SC', '63', ''),
(6, 'Nursing SC', '', ''),
(7, 'Law SC', '61', ''),
(8, 'Dent SC', '', ''),
(9, 'Marketing SC', '', ''),
(10, 'Tourism SC', '', ''),
(11, 'USC', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `organization_has_department`
--

CREATE TABLE `organization_has_department` (
  `organization_ID` int(11) NOT NULL,
  `department_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organization_has_department`
--

INSERT INTO `organization_has_department` (`organization_ID`, `department_ID`) VALUES
(1, 1),
(1, 10),
(2, 1),
(3, 2),
(9, 10),
(11, 1),
(11, 2),
(11, 8),
(11, 9),
(11, 10);

-- --------------------------------------------------------

--
-- Table structure for table `physicalfaci-dept`
--

CREATE TABLE `physicalfaci-dept` (
  `ID` int(11) NOT NULL,
  `Rate` float DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `physical_start` time NOT NULL,
  `physical_end` time NOT NULL,
  `Pcs` int(10) DEFAULT NULL,
  `Request` varchar(50) NOT NULL,
  `users_ID` int(11) NOT NULL,
  `ap_reservation_main_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `physicalfaci-dept`
--

INSERT INTO `physicalfaci-dept` (`ID`, `Rate`, `Date`, `physical_start`, `physical_end`, `Pcs`, `Request`, `users_ID`, `ap_reservation_main_ID`) VALUES
(1, 2000, '2018-01-31', '14:30:00', '15:30:00', 6, 'BMS', 1, 6),
(2, 200, '2018-01-31', '14:30:00', '15:30:00', 3, 'PPFD', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Middlename` varchar(50) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `UserLvl` varchar(50) NOT NULL,
  `AccessLvl` varchar(50) NOT NULL,
  `department_ID` int(11) NOT NULL,
  `user_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `Email`, `Lastname`, `Firstname`, `Middlename`, `Position`, `UserLvl`, `AccessLvl`, `department_ID`, `user_status`) VALUES
(1, 'Ben', '812d6a01ed0d3508196055be1b62e3a952f9d51be9fdc1b175d5cb9f2aed838fa18958819eeff033e38da19518741ac60494f5c4e41536d730afaca7b18b4cee', 'villanuevabenjohn@gmail.com', 'Villanueva', 'Ben John III', 'Cabual', 'Student Council', 'Student', 'User', 1, 'Active'),
(5, 'Super Admin', 'd4008fa66cd25bcadc9d18689083d84307dcc82323e1f8fe5f5875c786e8c3d1259dca0464ad7aeff99a6cfc73eadecb45fb18d4aa775d56e8631f332bca28bc', 'superadmin@gmail.com', 'Andoy', 'Maria Corazon', 'Amelita', 'SAO', 'Employee', 'Super Admin', 3, 'Active'),
(6, 'Mary', '72c2f664fed9fb38b5cd0e40f1f5fb153c75e7270c7250ea4147ee4b7fe4bdc4264f2c0db7acec1679e51da8e18379345bb3fcf103b177d07e3f3e1581dc86d0', 'Mary@gmail.com', 'Avisado', 'Mary Aissen', 'Howard', 'Student Council', 'Student', 'User', 1, 'Active'),
(7, 'Marie', '7abaddafad56fb0af34af597597c65cfd0b5a49268bfb0bd353bd96ac248ff68907e30f5f3da5dbbbf4fa909cef946804f4055ab78166e80438f70c55e807b8e', 'Marie@gmail.com', 'Cruz', 'Marie', 'Lloydy', 'SAO', 'Employee', 'User', 3, 'Active'),
(9, 'Maintenance', '7e0591400107f641411ea4ceda726c3833a0f49ca39e3fa581ea25677796501b24e2f857dbc36e283cedfa9a5ce4104758327c3b3ea363c300049944967e7b1f', 'Maintenance@gmail.com', 'Doe', 'Jane', 'Cruz', 'Maintenance', 'Employee', 'User', 6, 'Active'),
(10, 'Property', '4559ed258c06ab05dc92a08e218279c64336b4f70a2819c251652c0380f2d9947e934b9c58aed3e862d2f08b22c1c26fd04ff3a097ad585dcb28b1c0c5344459', 'Property@gmail.com', 'Doe', 'John', 'Cruz', 'Property', 'Employee', 'User', 5, 'Active'),
(11, 'TLTS', '688f1ca6c58c00f6f0bdea49b27b097d84b049a750ad8714d6ad73fe380a4bd392fdb8acf4420335449a67caa09de6f303ba4db5a1211f8443fddcb54162e87a', 'TLTS@gmail.com', 'Doe', 'James', 'Cruz', 'TLTS', 'Employee', 'User', 4, 'Active'),
(12, 'Dummy', '812d6a01ed0d3508196055be1b62e3a952f9d51be9fdc1b175d5cb9f2aed838fa18958819eeff033e38da19518741ac60494f5c4e41536d730afaca7b18b4cee', 'Dummy@gmail.com', 'Dummy', 'Dummy', 'Dummy', 'Student', 'Student', 'User', 0, ''),
(13, 'Razer', 'b1915d36e097bcfd61fd8e2b2ac03a8189111a1daaf656a7a33e6c77c7889d778ee3042056c06c78adb5b24a4d0e64d444d266cbb0341a1c00928f54cff365bf', 'Razer@gmail.com', 'Razer', 'Razer', 'Razer', 'Student Council', 'Student', 'User', 2, 'Active'),
(20, 'AbDon34', 'ac75b08c584d41be890a49db2e532f2877c84cbd2285bb713c303f8e5538f3c0fb4eed44b5a0bc2f3620b0e746e71e41929f118d3063019efc1218a23b366528', 'villanuevabenjohn@gmail.com', 'Villanueva', 'Ben John III', 'Cabual', 'Student Council', 'Student', 'User', 0, ''),
(22, 'Alabaster', 'd4501bf2f4a3718fee76036a2852c04b9eccffb1a352959d493d9bd1382191468322114771d70edc0306fe7f7b2a24ea4c7b3e58b08b52a6ebf133ebc12fd1bb', 'Jar@gmail.com', 'Alabaster', 'Jar', 'Alabaster', 'Maintenance', 'Employee', 'User', 6, 'Active'),
(35, 'Julia', '722278d66a3a8c27aff84ea556a220413d3051c5efbfc12b7bee1919a71f05a840b27a48de7abbc5242e19692ace35ab1f472e174dea7a9517864073a29472c3', 'julia@gmail.com', 'Sesbreno', 'Julia', 'Aninipot', 'Student Council', 'Student', 'User', 2, 'Active'),
(37, 'Anna', 'a450ecda449cda1c9ea8d2d9491cd9d036dbee9e518afd26af4a74f541a5c4cbe31d09a5b7f433534a2b64187685a18801bee02836a5f52758d44e7cf1a98224', 'anna@gmail.com', 'Sesbreno', 'Anna', 'Aninipot', 'Organization Adviser', 'Employee', 'Admin', 7, 'Active'),
(56, 'Lara', '929ccee03b37b6a93aebb2f0c919061d9f49272caec14bcbeb7832e396e1b1286cfe52c80da07240547ea55277cc8a7c260a5b3277158958d0713df005bfaf34', 'Lara@gmail.com', 'Lara', 'Lara', 'Cruz', 'Student Council', 'Student', 'User', 2, 'Active'),
(57, 'Law Student', '4cb275710e57fbf42fa406b73494965e03ecb1d6ec52ea82c6ea4728bf0094ca082675cfd5c3c68823f3d360447d9911794e7be437970e12497e34d993e4a12e', 'LAW@GMAIL.COM', 'Law Student', 'Law Student', 'Law Student', 'Student Council', 'Student', 'User', 2, 'Active'),
(58, 'Dave', '2a11af953a024233803ea7281078da967ec0be9139f4533ca9d909d56eddaeae32586267622488d49fef7cda83e41eba47bb930ff6a6c04060c84102a5092d4a', 'dave@gmail.com', 'Mercado', 'Dave', 'Cruz', 'Student Council', 'Student', 'User', 1, 'Active'),
(59, 'Mac', '533e8ddca766af6b8e81a53020d69f885a95fae67286d4322341cfc0ca3cb2efd5073e2875ac46e010ab32b0d51e2deb13756f1a03c696e03898ce6ff8d05ae1', 'mac@gmail.edu.ph', 'Anacio', 'Marcial', 'Cruz', 'Organization Adviser', 'Employee', 'User', 7, 'Active'),
(61, 'Kayzer', 'bd693cf5a40105adbd6f8676d63d562a99fff4d3f7a66ce10235f8ce163c58242931ad2f8b4886c8c11b9a66f71800ed92abd0025dc6b156fad3c88d14dcea8e', 'Kayzer@gmail.com', 'Saba', 'Kayzer', 'Cruz', 'Organization Adviser', 'Employee', 'User', 7, 'Active'),
(62, 'Ben Law', '032c9038eae53ab2b1a789f4bca418d570b073df4bcb45ceab73f2f94370f4cf15df0d9aa6f4f499632ec8075d9f5ab7d2e18e951b4084828c2d84d5f1e61bd6', 'benjohn@ceu.edu.ph', 'Villanueva', 'Ben John III', 'Cabual', 'Student Council', 'Student', 'User', 1, 'Active'),
(63, 'Borlongan', '580985e0df00b6c5491618644388b359856e753502535ea8d2bd58b9e4b19c21870f20b7ee84de449c7bbd5092ff9d18ef67cdd9e8da363b6c8c3fccbcec6b13', 'coffee@gmail.com', 'Amelita', 'Borlongan', 'Coffee', 'Organization Adviser', 'Employee', 'User', 7, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users_has_organization`
--

CREATE TABLE `users_has_organization` (
  `users_ID` int(11) NOT NULL,
  `organization_ID` int(11) NOT NULL,
  `users_position` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_has_organization`
--

INSERT INTO `users_has_organization` (`users_ID`, `organization_ID`, `users_position`) VALUES
(1, 1, 'Student Council'),
(6, 2, 'Student Council'),
(12, 1, 'Student'),
(13, 3, 'Student Council'),
(35, 3, 'Student Council'),
(56, 8, 'Student Council'),
(57, 7, 'Student Council'),
(58, 1, 'Student Council'),
(59, 1, 'Organization Adviser'),
(59, 2, 'Organization Adviser'),
(61, 7, 'Organization Adviser'),
(62, 7, 'Student Council'),
(63, 3, 'Organization Adviser');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounting-dept`
--
ALTER TABLE `accounting-dept`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Accounting-dept_users1_idx` (`users_ID`),
  ADD KEY `fk_accounting-dept_ap_reservation_main1_idx` (`ap_reservation_main_ID`);

--
-- Indexes for table `activityproposal`
--
ALTER TABLE `activityproposal`
  ADD PRIMARY KEY (`ap_id`),
  ADD KEY `fk_activityproposal_events1_idx` (`events_id`),
  ADD KEY `fk_activityproposal_users1_idx` (`created`);

--
-- Indexes for table `ap_committees`
--
ALTER TABLE `ap_committees`
  ADD PRIMARY KEY (`ID`,`mobile_users_mobile_users_id`),
  ADD KEY `fk_ap_committees_activityproposal1_idx` (`ap_id`),
  ADD KEY `fk_ap_committees_mobile_users1_idx` (`mobile_users_mobile_users_id`);

--
-- Indexes for table `ap_consumption`
--
ALTER TABLE `ap_consumption`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_ap_consumption_ap_financial_disbursement1_idx` (`ap_financial_disbursement_ID`);

--
-- Indexes for table `ap_distributionbudget`
--
ALTER TABLE `ap_distributionbudget`
  ADD PRIMARY KEY (`ID`,`ap_id`),
  ADD KEY `fk_ap_distributionbudget_activityproposal1_idx` (`ap_id`);

--
-- Indexes for table `ap_expenses`
--
ALTER TABLE `ap_expenses`
  ADD PRIMARY KEY (`ID`,`ap_id`),
  ADD KEY `fk_ap_expenses_activityproposal1_idx` (`ap_id`);

--
-- Indexes for table `ap_exp_materials`
--
ALTER TABLE `ap_exp_materials`
  ADD PRIMARY KEY (`ID`,`ap_id`),
  ADD KEY `fk_ap_exp_materials_activityproposal1_idx` (`ap_id`);

--
-- Indexes for table `ap_financial_disbursement`
--
ALTER TABLE `ap_financial_disbursement`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_ap_financial_disbursement_activityproposal1_idx` (`ap_id`);

--
-- Indexes for table `ap_financial_report`
--
ALTER TABLE `ap_financial_report`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_ap_financial_report_activityproposal1_idx` (`ap_id`);

--
-- Indexes for table `ap_guest`
--
ALTER TABLE `ap_guest`
  ADD PRIMARY KEY (`ID`,`ap_id`),
  ADD KEY `fk_ap_guest_activityproposal1_idx` (`ap_id`);

--
-- Indexes for table `ap_objectives`
--
ALTER TABLE `ap_objectives`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_ap_objectives_events1_idx` (`events_id`);

--
-- Indexes for table `ap_reservation`
--
ALTER TABLE `ap_reservation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_ap_reservation_ap_reservation_main1_idx` (`ap_reservation_main_ID`);

--
-- Indexes for table `ap_reservation_main`
--
ALTER TABLE `ap_reservation_main`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_ap_reservation_main_activityproposal1_idx` (`ap_id`);

--
-- Indexes for table `ap_schedule`
--
ALTER TABLE `ap_schedule`
  ADD PRIMARY KEY (`ID`,`ap_id`),
  ADD KEY `fk_ap_schedule_activityproposal1_idx` (`ap_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_events_users1_idx` (`created`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_history_users1_idx1` (`users_ID`);

--
-- Indexes for table `mobile_users`
--
ALTER TABLE `mobile_users`
  ADD PRIMARY KEY (`mobile_users_id`),
  ADD KEY `fk_mobile_users_department1_idx` (`department_ID`);

--
-- Indexes for table `mobile_users_has_organization`
--
ALTER TABLE `mobile_users_has_organization`
  ADD PRIMARY KEY (`mobile_users_mobile_users_id`,`organization_ID`),
  ADD KEY `fk_mobile_users_has_organization_organization1_idx` (`organization_ID`),
  ADD KEY `fk_mobile_users_has_organization_mobile_users1_idx` (`mobile_users_mobile_users_id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `organization_has_department`
--
ALTER TABLE `organization_has_department`
  ADD PRIMARY KEY (`organization_ID`,`department_ID`),
  ADD KEY `fk_organization_has_department_department1_idx` (`department_ID`),
  ADD KEY `fk_organization_has_department_organization1_idx` (`organization_ID`);

--
-- Indexes for table `physicalfaci-dept`
--
ALTER TABLE `physicalfaci-dept`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_PhysicalFaci-dept_users1_idx` (`users_ID`),
  ADD KEY `fk_physicalfaci-dept_ap_reservation_main1_idx` (`ap_reservation_main_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `fk_users_department1_idx` (`department_ID`);

--
-- Indexes for table `users_has_organization`
--
ALTER TABLE `users_has_organization`
  ADD PRIMARY KEY (`users_ID`,`organization_ID`),
  ADD KEY `fk_users_has_organization_organization1_idx` (`organization_ID`),
  ADD KEY `fk_users_has_organization_users1_idx` (`users_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounting-dept`
--
ALTER TABLE `accounting-dept`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `activityproposal`
--
ALTER TABLE `activityproposal`
  MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ap_committees`
--
ALTER TABLE `ap_committees`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ap_consumption`
--
ALTER TABLE `ap_consumption`
  MODIFY `ID` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ap_distributionbudget`
--
ALTER TABLE `ap_distributionbudget`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `ap_expenses`
--
ALTER TABLE `ap_expenses`
  MODIFY `ID` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `ap_exp_materials`
--
ALTER TABLE `ap_exp_materials`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ap_financial_disbursement`
--
ALTER TABLE `ap_financial_disbursement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ap_financial_report`
--
ALTER TABLE `ap_financial_report`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ap_guest`
--
ALTER TABLE `ap_guest`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ap_objectives`
--
ALTER TABLE `ap_objectives`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ap_reservation`
--
ALTER TABLE `ap_reservation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ap_reservation_main`
--
ALTER TABLE `ap_reservation_main`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ap_schedule`
--
ALTER TABLE `ap_schedule`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mobile_users`
--
ALTER TABLE `mobile_users`
  MODIFY `mobile_users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `physicalfaci-dept`
--
ALTER TABLE `physicalfaci-dept`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounting-dept`
--
ALTER TABLE `accounting-dept`
  ADD CONSTRAINT `fk_Accounting-dept_users1` FOREIGN KEY (`users_ID`) REFERENCES `users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_accounting-dept_ap_reservation_main1` FOREIGN KEY (`ap_reservation_main_ID`) REFERENCES `ap_reservation_main` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `activityproposal`
--
ALTER TABLE `activityproposal`
  ADD CONSTRAINT `fk_activityproposal_events1` FOREIGN KEY (`events_id`) REFERENCES `events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activityproposal_users1` FOREIGN KEY (`created`) REFERENCES `users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ap_committees`
--
ALTER TABLE `ap_committees`
  ADD CONSTRAINT `fk_ap_committees_activityproposal1` FOREIGN KEY (`ap_id`) REFERENCES `activityproposal` (`ap_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ap_committees_mobile_users1` FOREIGN KEY (`mobile_users_mobile_users_id`) REFERENCES `mobile_users` (`mobile_users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ap_consumption`
--
ALTER TABLE `ap_consumption`
  ADD CONSTRAINT `fk_ap_consumption_ap_financial_disbursement1` FOREIGN KEY (`ap_financial_disbursement_ID`) REFERENCES `ap_financial_disbursement` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ap_distributionbudget`
--
ALTER TABLE `ap_distributionbudget`
  ADD CONSTRAINT `fk_ap_distributionbudget_activityproposal1` FOREIGN KEY (`ap_id`) REFERENCES `activityproposal` (`ap_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ap_expenses`
--
ALTER TABLE `ap_expenses`
  ADD CONSTRAINT `fk_ap_expenses_activityproposal1` FOREIGN KEY (`ap_id`) REFERENCES `activityproposal` (`ap_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ap_exp_materials`
--
ALTER TABLE `ap_exp_materials`
  ADD CONSTRAINT `fk_ap_exp_materials_activityproposal1` FOREIGN KEY (`ap_id`) REFERENCES `activityproposal` (`ap_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ap_financial_disbursement`
--
ALTER TABLE `ap_financial_disbursement`
  ADD CONSTRAINT `fk_ap_financial_disbursement_activityproposal1` FOREIGN KEY (`ap_id`) REFERENCES `activityproposal` (`ap_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ap_financial_report`
--
ALTER TABLE `ap_financial_report`
  ADD CONSTRAINT `fk_ap_financial_report_activityproposal1` FOREIGN KEY (`ap_id`) REFERENCES `activityproposal` (`ap_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ap_guest`
--
ALTER TABLE `ap_guest`
  ADD CONSTRAINT `fk_ap_guest_activityproposal1` FOREIGN KEY (`ap_id`) REFERENCES `activityproposal` (`ap_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ap_objectives`
--
ALTER TABLE `ap_objectives`
  ADD CONSTRAINT `fk_ap_objectives_events1` FOREIGN KEY (`events_id`) REFERENCES `events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ap_reservation`
--
ALTER TABLE `ap_reservation`
  ADD CONSTRAINT `fk_ap_reservation_ap_reservation_main1` FOREIGN KEY (`ap_reservation_main_ID`) REFERENCES `ap_reservation_main` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ap_reservation_main`
--
ALTER TABLE `ap_reservation_main`
  ADD CONSTRAINT `fk_ap_reservation_main_activityproposal1` FOREIGN KEY (`ap_id`) REFERENCES `activityproposal` (`ap_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ap_schedule`
--
ALTER TABLE `ap_schedule`
  ADD CONSTRAINT `fk_ap_schedule_activityproposal1` FOREIGN KEY (`ap_id`) REFERENCES `activityproposal` (`ap_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_events_users1` FOREIGN KEY (`created`) REFERENCES `users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `fk_history_users1` FOREIGN KEY (`users_ID`) REFERENCES `users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mobile_users`
--
ALTER TABLE `mobile_users`
  ADD CONSTRAINT `fk_mobile_users_department1` FOREIGN KEY (`department_ID`) REFERENCES `department` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mobile_users_has_organization`
--
ALTER TABLE `mobile_users_has_organization`
  ADD CONSTRAINT `fk_mobile_users_has_organization_mobile_users1` FOREIGN KEY (`mobile_users_mobile_users_id`) REFERENCES `mobile_users` (`mobile_users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mobile_users_has_organization_organization1` FOREIGN KEY (`organization_ID`) REFERENCES `organization` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `organization_has_department`
--
ALTER TABLE `organization_has_department`
  ADD CONSTRAINT `fk_organization_has_department_department1` FOREIGN KEY (`department_ID`) REFERENCES `department` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_organization_has_department_organization1` FOREIGN KEY (`organization_ID`) REFERENCES `organization` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `physicalfaci-dept`
--
ALTER TABLE `physicalfaci-dept`
  ADD CONSTRAINT `fk_PhysicalFaci-dept_users1` FOREIGN KEY (`users_ID`) REFERENCES `users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_physicalfaci-dept_ap_reservation_main1` FOREIGN KEY (`ap_reservation_main_ID`) REFERENCES `ap_reservation_main` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_has_organization`
--
ALTER TABLE `users_has_organization`
  ADD CONSTRAINT `fk_users_has_organization_organization1` FOREIGN KEY (`organization_ID`) REFERENCES `organization` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_organization_users1` FOREIGN KEY (`users_ID`) REFERENCES `users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
