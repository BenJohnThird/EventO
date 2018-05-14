-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2018 at 02:12 PM
-- Server version: 5.7.14-log
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `ap_reservation_main_ID` int(11) NOT NULL,
  `school_individual_idschool_individual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounting-dept`
--

INSERT INTO `accounting-dept` (`ID`, `Rate`, `Total`, `Date`, `ap_reservation_main_ID`, `school_individual_idschool_individual`) VALUES
(2, 200, 4000, 'February 1, 2018', 6, 0);

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
  `idstudent_council` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activityproposal`
--

INSERT INTO `activityproposal` (`ap_id`, `Theme`, `ap_status`, `Note`, `Type`, `Location`, `Description`, `TargetParticipant`, `Rehearsal(TD)`, `CountTarget`, `ObjectivePercent`, `ValuesInculcated`, `PastMean`, `PastVI`, `BudgetType`, `TakenFrom`, `events_id`, `idstudent_council`) VALUES
(2, 'Another one', 'Returned', 'Change your title', 'Community Outreach', 'Inside', 'another one', '', '', '', 0, '', '', '', '', '', 38, 0),
(3, 'Hi Crush', 'Verified | Pending Financial Report/Status	\r\n', '', 'Community Outreach', 'Inside', 'Hi Crushh', 'BSIT', 'Monday and Tuesday', '32', 95, 'Love', '95', 'Passed', 'Requesting Subsidy for Venue(s) Only', '', 33, 0),
(5, 'A gust of expertise', 'Verified | Pending Financial Report/Status', 'Go', 'Community Outreach', 'Inside', 'An event where all gathered to witness Mark Zuckerberg demonstrates his new app', '', '', '', 0, 'Love', '65', 'Passed', 'To be taken from the fund of', '20000', 61, 0),
(6, NULL, 'Verified | Pending Financial Report/Status', NULL, NULL, NULL, NULL, '', NULL, NULL, 0, '', NULL, NULL, '', '', 60, 0),
(7, 'A silence of the night', 'Verified | Pending Financial Report/Status', '', 'Community Outreach', 'Inside', 'This will show if the due date really works', 'BSIT and JPCS', '', '200', 0, 'Love', '', '', 'Requesting Subsidy for Venue(s) Only', '', 64, 0),
(8, NULL, 'Verified | Waiting for the event', NULL, NULL, NULL, NULL, '', NULL, NULL, 0, '', NULL, NULL, '', '', 56, 0);

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
  `idmbl_user_school_individual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ap_committees`
--

INSERT INTO `ap_committees` (`ID`, `Committee`, `Position`, `Committees_Status`, `ap_id`, `idmbl_user_school_individual`) VALUES
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
  `color` varchar(7) CHARACTER SET utf8 DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `place` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `proponent` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `semester` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `situation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `notes` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `student_council_idstudent_council` int(11) NOT NULL,
  `venue_idvenue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`, `place`, `proponent`, `semester`, `situation`, `notes`, `student_council_idstudent_council`, `venue_idvenue`) VALUES
(33, 'Mary', '#008000', '2018-01-24 13:30:00', '2018-01-24 13:30:00', 'CEU SAC GP', 'Me', '1st Semester', 'Pending Activity Proposal', 'Crushhh', 2, 0),
(38, 'Another one', '', '2018-01-26 13:30:00', '2018-01-26 13:30:00', 'another one', 'JPCS', '1st Semester', 'Verified', '', 4, 0),
(56, 'CSIT Day', '', '2018-01-25 07:00:00', '2018-01-25 12:00:00', '9th Floor, 901 and 902', 'JPCS', '2nd Semester', 'Pending Activity Proposal', 'We have already changed it. Thank you.', 2, 0),
(57, 'CSIT Day', '', '2018-01-26 13:30:00', '2018-01-27 16:00:00', '9th Floor, 901 and 902', 'JPCS', '2nd Semester', 'Verified by Organization Adviser', 'Awardingg', 0, 0),
(60, 'Nathan Ganesh', '', '2018-01-22 01:00:00', '2018-01-22 03:00:00', 'Ben', 'Ben', '', 'Pending Activity Proposal', 'Done', 0, 0),
(61, 'Ben', '', '2018-01-22 01:00:00', '2018-01-22 03:00:00', 'Red', 'Ben', '', 'Pending Activity Proposal', '', 0, 0),
(62, 'Try', '', '2018-01-26 01:00:00', '2018-01-27 13:00:00', 'Try', 'JPCS', '', 'Verified', '', 0, 0),
(63, 'JPCS Week', '', '2018-01-27 08:00:00', '2018-01-27 16:30:00', '9th Floor', 'CSIT', '', 'Returned', 'Change your color to redplease. Thank you.', 0, 0),
(64, 'Trying Due Date', '', '2018-02-10 07:00:00', '2018-02-10 11:00:00', '9th Floor', 'JPCS', '', 'Pending Activity Proposal', 'Good', 0, 0),
(65, 'Yow', '', '2018-02-22 01:00:00', '2018-02-23 13:00:00', 'Ben', 'CSIT', '', 'Verified by Organization Adviser', '', 0, 0),
(67, 'Dapat Gumana to', '#008000', '2018-02-15 00:00:00', '2018-02-16 00:00:00', 'rer', 'rere', '', 'Pending', 'rer', 0, 0),
(68, 'Valentines Day', '#FF0000', '2018-02-14 00:00:00', '2018-02-15 00:00:00', '9th Floor', 'USC', '', 'Returned', 'Change the Place', 0, 0),
(71, 'Try', '', '2018-02-21 00:00:00', '2018-02-22 00:00:00', '', '', '', 'Verified by Organization Adviser', '', 0, 0),
(81, 'Capstone Thesis Defense', '#008000', '2018-02-17 00:00:00', '2018-02-18 00:00:00', 'CEU LV 9th Floor', 'Panelists', '', 'Pending', 'Success', 0, 0),
(82, 'Hearing Law', '#0071c5', '2018-02-21 00:00:00', '2018-02-22 00:00:00', 'Malacanang', 'Malacanang Gov.', '', 'Pending', '', 0, 0),
(83, 'Try', '#FFD700', '2018-02-22 00:00:00', '2018-02-23 00:00:00', '', 'Try', '', 'Pending', '', 0, 0),
(84, 'Try', '#FF8C00', '2018-02-23 00:00:00', '2018-02-24 00:00:00', '', '', '', 'Pending', '', 0, 0),
(85, 'Try', '#008000', '2018-02-22 00:00:00', '2018-02-23 00:00:00', '', '', '', 'Pending', '', 0, 0),
(89, 'Anataaa', NULL, '2018-02-14 00:00:00', '2018-02-14 00:00:00', '9th Floor', 'JPCS', '2nd Semester', 'Pending', 'Nice', 3, NULL),
(90, 'Must go', NULL, '2018-02-23 14:03:00', '2018-02-23 15:00:00', '9th Floor', 'JPCS', '2nd Semester', 'Pending', '', 3, NULL),
(91, 'Try Error', NULL, '2018-04-23 13:00:00', '2018-04-23 15:00:00', '9th Floor', 'JPCS', '2nd Semester', 'Pending', '', 3, NULL),
(92, 'Must not go', NULL, '2018-02-23 00:00:00', '2018-02-24 00:00:00', '10th Floor', 'JPCS', '2nd Semester', 'Pending', 'Noice', 3, NULL);

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
-- Table structure for table `mbl_user_school_individual`
--

CREATE TABLE `mbl_user_school_individual` (
  `idmbl_user_school_individual` int(11) NOT NULL,
  `Lastname` varchar(100) DEFAULT NULL,
  `Firstname` varchar(100) DEFAULT NULL,
  `Middlename` varchar(50) DEFAULT NULL,
  `mobile_users_id` int(11) NOT NULL,
  `department_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mbl_user_school_individual_has_organization`
--

CREATE TABLE `mbl_user_school_individual_has_organization` (
  `mbl_user_school_individual_idmbl_user_school_individual` int(11) NOT NULL,
  `organization_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mbl_user_student_related`
--

CREATE TABLE `mbl_user_student_related` (
  `idmbl_user_student_related` int(11) NOT NULL,
  `Lastname` varchar(100) DEFAULT NULL,
  `Firstname` varchar(100) DEFAULT NULL,
  `Middlename` varchar(50) DEFAULT NULL,
  `mobile_users_mobile_users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mobile_users`
--

CREATE TABLE `mobile_users` (
  `mobile_users_id` int(11) NOT NULL,
  `Userno` varchar(45) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mobile_users`
--

INSERT INTO `mobile_users` (`mobile_users_id`, `Userno`, `Username`, `Password`) VALUES
(1, NULL, 'Tourism', 'Tourism'),
(2, NULL, 'Ben', 'Ben'),
(3, NULL, 'Jane', 'Jane'),
(4, NULL, 'Law', 'Law'),
(5, NULL, 'Lara', 'Lara');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `ID` int(11) NOT NULL,
  `organization_name` varchar(150) DEFAULT NULL,
  `organization_objectives` varchar(255) DEFAULT NULL,
  `org_adviser_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`ID`, `organization_name`, `organization_objectives`, `org_adviser_id`) VALUES
(1, 'CSIT SC', '', 14),
(2, 'JPCS SC', '', 14),
(3, 'HRM SC', '', NULL),
(6, 'Nursing SC', '', NULL),
(7, 'Law SC', '', 10),
(8, 'Dent SC', '', 11),
(9, 'Marketing SC', '', NULL),
(10, 'Tourism SC', '', 12),
(11, 'USC', '', 11),
(12, 'Peer', NULL, 10);

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
(2, 1),
(11, 1),
(11, 2),
(11, 8),
(11, 9),
(1, 10),
(9, 10),
(11, 10);

-- --------------------------------------------------------

--
-- Table structure for table `org_adviser`
--

CREATE TABLE `org_adviser` (
  `idorg_adviser` int(11) NOT NULL,
  `Lastname` varchar(100) DEFAULT NULL,
  `Firstname` varchar(100) DEFAULT NULL,
  `Middlename` varchar(50) DEFAULT NULL,
  `users_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `org_adviser`
--

INSERT INTO `org_adviser` (`idorg_adviser`, `Lastname`, `Firstname`, `Middlename`, `users_ID`) VALUES
(10, 'Gornez', 'Gornez', 'Gornez', 74),
(11, 'Tabile', 'Tabile', 'Tabile', 75),
(12, 'Emman', 'Emman', 'Emman', 78),
(13, 'Jeff', 'Jeff', 'Jeff', 79),
(14, 'Anacio', 'Marcial', 'Cruz', 83);

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
  `ap_reservation_main_ID` int(11) NOT NULL,
  `idstudent_council` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `physicalfaci-dept`
--

INSERT INTO `physicalfaci-dept` (`ID`, `Rate`, `Date`, `physical_start`, `physical_end`, `Pcs`, `Request`, `ap_reservation_main_ID`, `idstudent_council`) VALUES
(1, 2000, '2018-01-31', '14:30:00', '15:30:00', 6, 'BMS', 6, 0),
(2, 200, '2018-01-31', '14:30:00', '15:30:00', 3, 'PPFD', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `school_individual`
--

CREATE TABLE `school_individual` (
  `idschool_individual` int(11) NOT NULL,
  `Lastname` varchar(100) DEFAULT NULL,
  `Firstname` varchar(100) DEFAULT NULL,
  `Middlename` varchar(50) DEFAULT NULL,
  `users_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school_individual`
--

INSERT INTO `school_individual` (`idschool_individual`, `Lastname`, `Firstname`, `Middlename`, `users_ID`) VALUES
(1, 'SAO2', 'SAO2', 'SAO3', 77),
(2, 'TLTS4', 'TLTS4', 'TLTS4', 80),
(3, 'Andoy', 'Maria', 'Corazon', 84);

-- --------------------------------------------------------

--
-- Table structure for table `student_council`
--

CREATE TABLE `student_council` (
  `idstudent_council` int(11) NOT NULL,
  `Lastname` varchar(100) DEFAULT NULL,
  `Firstname` varchar(100) DEFAULT NULL,
  `Middlename` varchar(45) DEFAULT NULL,
  `SY` varchar(20) DEFAULT NULL,
  `users_ID` int(11) NOT NULL,
  `organization_ID` int(11) NOT NULL,
  `department_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_council`
--

INSERT INTO `student_council` (`idstudent_council`, `Lastname`, `Firstname`, `Middlename`, `SY`, `users_ID`, `organization_ID`, `department_ID`) VALUES
(2, 'Dragon', 'Dragon', 'Dragon', '2018-2019', 64, 1, 1),
(3, 'Villanueva', 'Ben John III', 'Cabual', '2017-2018', 81, 1, 1),
(4, 'Avisado', 'Mary Aissen', 'Howard', '2017-2018', 82, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(100) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `AccessLvl` varchar(20) NOT NULL,
  `UserLvl` varchar(50) NOT NULL,
  `user_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `Email`, `AccessLvl`, `UserLvl`, `user_status`) VALUES
(64, 'Dragon', '76d3d0d82921bcfdbedb70443b3b9c4610e11f64c7f2107b554d8826989e0947f4d398e040c07375d97055fb89879078e08113091ff6eeb2178af85720510ba9', 'Dragon@gmail.com', 'User', 'Student Council', 'Active'),
(74, 'Gornez', '00305e683b6a77e89ea5f9581b2429475f03ec67ca46db8ce3d3171254a79ff699e5dbfbf87694347891d3ced5829ed969b0f50985f945bd30f6982b0382615b', 'Gornez@gmail.com', 'Admin', 'Organization Adviser', 'Active'),
(75, 'Tabile', 'c90efadee3c306ac9dcff8597d3c83780bc92bede7e8d730c66af8bd32b614ed6d33677e089c50e84d3db0b3dc70b57b12028fbf7e4f4da17597c7f6b4287eed', 'Tabile@gmail.com', 'Admin', 'Organization Adviser', 'Inactive'),
(77, 'SAO2', 'acc2ad043bc1d68232ce477fb3d08ee5dd6837b31ad1c91a8534c7f0dbd0bfe0f5858d65f0a661c7357adffea462d82e0ee0435b453571cde0fb0369db849a3f', 'SAO2@gmail.com', 'Admin', 'SAO', 'Active'),
(78, 'Emman', '5f1b16f94d0c8db8fb3a4e53aac79e44362cf7ff0c3e0e377ea8b27cf62c3f3557c3c5d5cfcf2a30d22c1ddf6e13b3d58639aafd956cfc87cfb7dc3364039e46', 'Emman@gmail.com', 'Admin', 'Organization Adviser', 'Inactive'),
(79, 'Jeff', '739a8e6e2068cbcd421e9b15ec9dcb4537653b99dc588f93eea89add1398346762f9f0e4585df9bc4ff6807a80af34894c6a0ec0946cd44b2cc8bbe6ba8399e1', 'Jeff@gmail.com', 'Admin', 'Organization Adviser', 'Inactive'),
(80, 'TLTS4', '494db12944ca68d9b510207a99d10c31bba82451b575688934235aa9415a0fa3d24d063a57ad42bf7a681a22011aa8a570732ffafbb8ca8d0d6a6a8ab5e14c2b', 'TLTS4@gmail.com', 'User', 'TLTS', 'Inactive'),
(81, 'Ben', '812d6a01ed0d3508196055be1b62e3a952f9d51be9fdc1b175d5cb9f2aed838fa18958819eeff033e38da19518741ac60494f5c4e41536d730afaca7b18b4cee', 'villanuevabenjohn@gmail.com', 'User', 'Student Council', 'Active'),
(82, 'Mary', '72c2f664fed9fb38b5cd0e40f1f5fb153c75e7270c7250ea4147ee4b7fe4bdc4264f2c0db7acec1679e51da8e18379345bb3fcf103b177d07e3f3e1581dc86d0', 'mary@gmail.com', 'User', 'Student Council', 'Inactive'),
(83, 'Mac', '533e8ddca766af6b8e81a53020d69f885a95fae67286d4322341cfc0ca3cb2efd5073e2875ac46e010ab32b0d51e2deb13756f1a03c696e03898ce6ff8d05ae1', 'mac@gmail.com', 'Admin', 'Organization Adviser', 'Active'),
(84, 'Super Admin', '812d6a01ed0d3508196055be1b62e3a952f9d51be9fdc1b175d5cb9f2aed838fa18958819eeff033e38da19518741ac60494f5c4e41536d730afaca7b18b4cee', 'super@gmail.com', 'Super Admin', 'SAO', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `idvenue` int(11) NOT NULL,
  `venue` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`idvenue`, `venue`) VALUES
(1, '9th Floor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounting-dept`
--
ALTER TABLE `accounting-dept`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_accounting-dept_ap_reservation_main1_idx` (`ap_reservation_main_ID`),
  ADD KEY `fk_accounting-dept_school_individual1_idx` (`school_individual_idschool_individual`);

--
-- Indexes for table `activityproposal`
--
ALTER TABLE `activityproposal`
  ADD PRIMARY KEY (`ap_id`),
  ADD KEY `fk_activityproposal_events1_idx` (`events_id`),
  ADD KEY `fk_activityproposal_student_council1_idx` (`idstudent_council`);

--
-- Indexes for table `ap_committees`
--
ALTER TABLE `ap_committees`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_ap_committees_activityproposal1_idx` (`ap_id`),
  ADD KEY `fk_ap_committees_mbl_user_school_individual1_idx` (`idmbl_user_school_individual`);

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
  ADD KEY `fk_events_student_council1_idx` (`student_council_idstudent_council`),
  ADD KEY `fk_events_venue1_idx` (`venue_idvenue`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_history_users1_idx1` (`users_ID`);

--
-- Indexes for table `mbl_user_school_individual`
--
ALTER TABLE `mbl_user_school_individual`
  ADD PRIMARY KEY (`idmbl_user_school_individual`),
  ADD KEY `fk_mbl_user_school_individual_mobile_users1_idx` (`mobile_users_id`),
  ADD KEY `fk_mbl_user_school_individual_department1_idx` (`department_ID`);

--
-- Indexes for table `mbl_user_school_individual_has_organization`
--
ALTER TABLE `mbl_user_school_individual_has_organization`
  ADD PRIMARY KEY (`mbl_user_school_individual_idmbl_user_school_individual`,`organization_ID`),
  ADD KEY `fk_mbl_user_school_individual_has_organization_organization_idx` (`organization_ID`),
  ADD KEY `fk_mbl_user_school_individual_has_organization_mbl_user_sch_idx` (`mbl_user_school_individual_idmbl_user_school_individual`);

--
-- Indexes for table `mbl_user_student_related`
--
ALTER TABLE `mbl_user_student_related`
  ADD PRIMARY KEY (`idmbl_user_student_related`),
  ADD KEY `fk_mbl_user_student_related_mobile_users1_idx` (`mobile_users_mobile_users_id`);

--
-- Indexes for table `mobile_users`
--
ALTER TABLE `mobile_users`
  ADD PRIMARY KEY (`mobile_users_id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_organization_org_adviser1_idx` (`org_adviser_id`);

--
-- Indexes for table `organization_has_department`
--
ALTER TABLE `organization_has_department`
  ADD PRIMARY KEY (`organization_ID`,`department_ID`),
  ADD KEY `fk_organization_has_department_department1_idx` (`department_ID`),
  ADD KEY `fk_organization_has_department_organization1_idx` (`organization_ID`);

--
-- Indexes for table `org_adviser`
--
ALTER TABLE `org_adviser`
  ADD PRIMARY KEY (`idorg_adviser`),
  ADD KEY `fk_org_adviser_users1_idx` (`users_ID`);

--
-- Indexes for table `physicalfaci-dept`
--
ALTER TABLE `physicalfaci-dept`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_physicalfaci-dept_ap_reservation_main1_idx` (`ap_reservation_main_ID`),
  ADD KEY `fk_physicalfaci-dept_student_council1_idx` (`idstudent_council`);

--
-- Indexes for table `school_individual`
--
ALTER TABLE `school_individual`
  ADD PRIMARY KEY (`idschool_individual`),
  ADD KEY `fk_school_individual_users2_idx` (`users_ID`);

--
-- Indexes for table `student_council`
--
ALTER TABLE `student_council`
  ADD PRIMARY KEY (`idstudent_council`),
  ADD KEY `fk_student_council_users1_idx` (`users_ID`),
  ADD KEY `fk_student_council_organization1_idx` (`organization_ID`),
  ADD KEY `fk_student_council_department1_idx` (`department_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`idvenue`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mbl_user_school_individual`
--
ALTER TABLE `mbl_user_school_individual`
  MODIFY `idmbl_user_school_individual` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mbl_user_student_related`
--
ALTER TABLE `mbl_user_student_related`
  MODIFY `idmbl_user_student_related` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mobile_users`
--
ALTER TABLE `mobile_users`
  MODIFY `mobile_users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `org_adviser`
--
ALTER TABLE `org_adviser`
  MODIFY `idorg_adviser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `physicalfaci-dept`
--
ALTER TABLE `physicalfaci-dept`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `school_individual`
--
ALTER TABLE `school_individual`
  MODIFY `idschool_individual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `student_council`
--
ALTER TABLE `student_council`
  MODIFY `idstudent_council` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `idvenue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounting-dept`
--
ALTER TABLE `accounting-dept`
  ADD CONSTRAINT `fk_accounting-dept_ap_reservation_main1` FOREIGN KEY (`ap_reservation_main_ID`) REFERENCES `ap_reservation_main` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_accounting-dept_school_individual1` FOREIGN KEY (`school_individual_idschool_individual`) REFERENCES `school_individual` (`idschool_individual`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `activityproposal`
--
ALTER TABLE `activityproposal`
  ADD CONSTRAINT `fk_activityproposal_events1` FOREIGN KEY (`events_id`) REFERENCES `events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activityproposal_student_council1` FOREIGN KEY (`idstudent_council`) REFERENCES `student_council` (`idstudent_council`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ap_committees`
--
ALTER TABLE `ap_committees`
  ADD CONSTRAINT `fk_ap_committees_activityproposal1` FOREIGN KEY (`ap_id`) REFERENCES `activityproposal` (`ap_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ap_committees_mbl_user_school_individual1` FOREIGN KEY (`idmbl_user_school_individual`) REFERENCES `mbl_user_school_individual` (`idmbl_user_school_individual`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_events_student_council1` FOREIGN KEY (`student_council_idstudent_council`) REFERENCES `student_council` (`idstudent_council`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_events_venue1` FOREIGN KEY (`venue_idvenue`) REFERENCES `venue` (`idvenue`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `fk_history_users1` FOREIGN KEY (`users_ID`) REFERENCES `users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mbl_user_school_individual`
--
ALTER TABLE `mbl_user_school_individual`
  ADD CONSTRAINT `fk_mbl_user_school_individual_department1` FOREIGN KEY (`department_ID`) REFERENCES `department` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mbl_user_school_individual_mobile_users1` FOREIGN KEY (`mobile_users_id`) REFERENCES `mobile_users` (`mobile_users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mbl_user_school_individual_has_organization`
--
ALTER TABLE `mbl_user_school_individual_has_organization`
  ADD CONSTRAINT `fk_mbl_user_school_individual_has_organization_mbl_user_schoo1` FOREIGN KEY (`mbl_user_school_individual_idmbl_user_school_individual`) REFERENCES `mbl_user_school_individual` (`idmbl_user_school_individual`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mbl_user_school_individual_has_organization_organization1` FOREIGN KEY (`organization_ID`) REFERENCES `organization` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mbl_user_student_related`
--
ALTER TABLE `mbl_user_student_related`
  ADD CONSTRAINT `fk_mbl_user_student_related_mobile_users1` FOREIGN KEY (`mobile_users_mobile_users_id`) REFERENCES `mobile_users` (`mobile_users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `organization`
--
ALTER TABLE `organization`
  ADD CONSTRAINT `fk_organization_org_adviser1` FOREIGN KEY (`org_adviser_id`) REFERENCES `org_adviser` (`idorg_adviser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `organization_has_department`
--
ALTER TABLE `organization_has_department`
  ADD CONSTRAINT `fk_organization_has_department_department1` FOREIGN KEY (`department_ID`) REFERENCES `department` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_organization_has_department_organization1` FOREIGN KEY (`organization_ID`) REFERENCES `organization` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `org_adviser`
--
ALTER TABLE `org_adviser`
  ADD CONSTRAINT `fk_org_adviser_users1` FOREIGN KEY (`users_ID`) REFERENCES `users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `physicalfaci-dept`
--
ALTER TABLE `physicalfaci-dept`
  ADD CONSTRAINT `fk_physicalfaci-dept_ap_reservation_main1` FOREIGN KEY (`ap_reservation_main_ID`) REFERENCES `ap_reservation_main` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_physicalfaci-dept_student_council1` FOREIGN KEY (`idstudent_council`) REFERENCES `student_council` (`idstudent_council`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `school_individual`
--
ALTER TABLE `school_individual`
  ADD CONSTRAINT `fk_school_individual_users2` FOREIGN KEY (`users_ID`) REFERENCES `users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_council`
--
ALTER TABLE `student_council`
  ADD CONSTRAINT `fk_student_council_department1` FOREIGN KEY (`department_ID`) REFERENCES `department` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_council_organization1` FOREIGN KEY (`organization_ID`) REFERENCES `organization` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_council_users1` FOREIGN KEY (`users_ID`) REFERENCES `users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
