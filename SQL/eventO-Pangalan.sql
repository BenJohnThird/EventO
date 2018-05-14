-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2018 at 04:19 PM
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
(2, '', 'Verified | Waiting for the event', NULL, 'Community Outreach', 'Inside', 'another one', '', '', '', 0, '', '', '', '', '', 38, 6),
(3, 'Hi Crush', 'Verified | Waiting for the event', '', 'Community Outreach', 'Inside', 'Hi Crushh', 'BSIT', 'Monday and Tuesday', '32', 95, 'Love', '95', 'Passed', 'Requesting Subsidy for Venue(s) Only', '', 33, 1),
(5, 'A gust of expertise', 'Verified | Waiting for the event', 'Go', 'Community Outreach', 'Inside', 'An event where all gathered to witness Mark Zuckerberg demonstrates his new app', '', '', '', 0, 'Love', '65', 'Passed', 'To be taken from the fund of', '20000', 61, 1),
(6, NULL, 'Verified | Waiting for the event', NULL, NULL, NULL, NULL, '', NULL, NULL, 0, '', NULL, NULL, '', '', 60, 1),
(7, 'A silence of the night', 'Verified | Waiting for the event', '', 'Community Outreach', 'Inside', 'This will show if the due date really works', 'BSIT and JPCS', '', '200', 0, 'Love', '', '', 'Requesting Subsidy for Venue(s) Only', '', 64, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ap_committees`
--

CREATE TABLE `ap_committees` (
  `ID` int(11) NOT NULL,
  `Committee` varchar(50) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `Committees_Status` varchar(25) NOT NULL,
  `Stud_Emp_ID` int(11) NOT NULL,
  `ap_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ap_committees`
--

INSERT INTO `ap_committees` (`ID`, `Committee`, `Position`, `Committees_Status`, `Stud_Emp_ID`, `ap_id`) VALUES
(7, 'Overall', 'Chairman', 'Done', 1, 3),
(8, 'Food', 'Co-Chairman', 'Done', 1, 3),
(11, 'Food', 'Member', 'Done', 1, 3),
(14, 'Overall', 'Co-Chairman', 'Done', 6, 3),
(15, 'Food', 'Chairman', 'Done', 6, 3),
(16, 'Overall', 'Chairman', 'Not Done', 1, 5),
(17, 'Overall', 'Co-Chairman', 'Not Done', 6, 5),
(18, 'Food', 'Chairman', 'Done', 1, 5),
(19, 'Overall', 'Chairman', 'Done', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ap_consumption`
--

CREATE TABLE `ap_consumption` (
  `ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `Committees` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Pcs` float NOT NULL,
  `Price` float NOT NULL,
  `Description` varchar(50) NOT NULL,
  `ap_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Documentation', 'JPCS', 5000, 'Nice', 3),
(2, 'Food', 'JPCS', 5000, 'Nice', 3),
(5, 'Food', 'CSIT', 1000, 'Nice', 3),
(6, 'Materials', 'JPCS', 100, 'Nice', 3),
(7, 'Materials', 'JPCS', 200, 'Nice', 3),
(8, 'Honorarium', 'JPCS', 100, 'Nice', 3),
(9, 'Documentation', 'JPCS', 100, 'Nuice', 3),
(10, 'Honorarium', 'JPCS', 100, 'Nice', 3),
(11, 'ProgramInvi', 'JPCS', 100, 'Nice', 3),
(12, 'ProgramInvi', 'JPCS', 100, 'Nice', 3),
(13, 'Token', 'JPCS', 100, 'Nice', 3),
(14, 'Token', 'JPCS', 100, 'Nice', 3),
(15, 'Others', 'JPCS', 100, 'Nice', 3),
(16, 'Others', 'JPCS', 100, 'Nice', 3),
(17, 'Venue', 'JPCS', 100, 'Nice', 3),
(18, 'Venue', 'JPCS', 100, 'Nice', 3),
(19, 'Energy', 'JPCS', 100, 'Nice', 3),
(20, 'Energy', 'JPCS', 100, 'Nice', 3),
(21, 'Transportation', 'JPCS', 100, 'Nice', 3),
(22, 'Transportation', 'JPCS', 100, 'Nice', 3),
(23, 'Contingency', 'JPCS', 100, 'Nice', 3),
(24, 'Contingency', 'JPCS', 100, 'Nice', 3),
(25, 'Food', 'JPCS', 200000, 'JPCS Fund', 7);

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
(00000000001, 'Venue', 'Pasig Covered Court', 1, 2000, 'Nice', 3),
(00000000002, 'Certificates', 'Number of Copies', 3, 40, 'To be printed somewhere', 3),
(00000000003, 'Token', 'CSGO Champion', 1, 1000, 'CSIT Day', 3),
(00000000004, 'Token', 'Dota Champion', 1, 1000, 'CSIT Day', 3),
(00000000005, 'Token', 'Programming Champion', 1, 400, 'CSIT Day', 3),
(00000000006, 'Token', 'Quiz Bee Champion', 1, 600, 'CSIT Day', 3),
(00000000007, 'Documentation', 'Stapler', 5, 500, 'Little Town', 3),
(00000000008, 'Documentation', 'Print', 250, 5, 'Print', 3),
(00000000009, 'Food', 'Jollibee', 50, 85, 'Affordable', 3),
(00000000010, 'Documentation', 'Xerox', 50, 0.5, '7th Floor', 3),
(00000000011, 'Documentation', 'Waiver', 25, 100, 'Waiver', 3),
(00000000012, 'Food', 'Jollibee', 10, 100, 'For guests', 3),
(00000000013, 'Documentation', 'Machine', 1, 1000, 'Go', 3),
(00000000014, 'Documentation', 'Go', 1, 2000, 'Dis', 3),
(00000000015, 'Food', 'Jollibee', 1, 1000, 'For King', 3),
(00000000016, 'Food', 'KFC', 1, 2000, 'For Queen', 3),
(00000000017, 'Documentation', 'Machine', 3, 5000, 'Go', 3),
(00000000018, 'Documentation', 'Pin', 1, 20, 'g', 3),
(00000000019, 'Honorarium', 'Mark Zuckerberg', 1, 10000, 'Teacher', 3),
(00000000020, 'Documentation', 'Print', 1, 5, 'g', 3),
(00000000021, 'Food', 'print', 1, 5, 'go na', 3),
(00000000022, 'Food', 'print', 1, 5, 'g', 3),
(00000000023, 'ProgramInvi', 'Print', 30, 500, 'Print', 3),
(00000000024, 'Others', 'Grab', 2, 500, 'Students and Teachers', 3),
(00000000025, 'Transportation', 'Bus', 3, 4000, 'CEU', 3),
(00000000026, 'Contingency', 'Contingency', 1, 500, 'If ever', 3),
(00000000027, 'Contingency', 'Contingency', 1, 500, 'if ever', 3),
(00000000028, 'Energy', 'Energy Fee', 1, 700, 'SAC GP', 3),
(00000000029, 'Documentation', 'Pin', 25, 30, 'Little Town', 5),
(00000000030, 'Food', 'Itallianis', 100, 2000, 'For Facebook Guests', 5),
(00000000031, 'Food', 'Giligans', 200, 2000, 'Nice', 7);

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
(1, 'Publicity', 'Print', 20, 3),
(2, 'Publicity', 'Print', 5, 3),
(3, 'Registration', 'Print', 5, 3),
(4, 'Registration', 'print', 5, 3),
(5, 'Registration', 'print', 5, 3),
(6, 'Registration', 'print', 5, 3);

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
(5, 'Mark', 'CEO', 'Conti\'s', 'Yow', 3),
(6, 'Mark Zuckerberg', 'CEO', 'Nice', 'Facebook', 5),
(7, ' Ben John C. Villanueva III', 'CEO', 'Cum Laude', 'Boss', 7);

-- --------------------------------------------------------

--
-- Table structure for table `ap_objectives`
--

CREATE TABLE `ap_objectives` (
  `ID` int(11) NOT NULL,
  `Objectives` varchar(255) NOT NULL,
  `events_id` int(11) NOT NULL,
  `ap_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ap_objectives`
--

INSERT INTO `ap_objectives` (`ID`, `Objectives`, `events_id`, `ap_id`) VALUES
(11, 'Become pro', 56, 3);

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
(15, 'Microphone/Karaoke', '2', 'TLTS', 10);

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
(6, 'Verified by Property', 'Ben', 3),
(7, 'Verified by TLTS', NULL, 2),
(8, 'Pending', '', 5),
(9, 'Pending', '', 6),
(10, 'Verified by Property', '', 7);

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
(4, 'Registration', '10:00', '10:15', 'Glizzen Toledo', 3),
(5, 'Discussion', '22:14', '10:30', 'Mr. Mark Zuckerberg', 5),
(6, 'Registration', '07:00', '07:10', 'Jane Doe', 7),
(7, 'Opening Remarks', '07:10', '07:20', 'Mr. Marcial Anacio', 7);

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
(56, 'CSIT Day', '', '2018-01-25 07:00:00', '2018-01-25 12:00:00', '9th Floor, 901 and 902', 'JPCS', 'Verified', '2017-2018', 'We have already changed it. Thank you.', 1),
(57, 'CSIT Day', '', '2018-01-26 13:30:00', '2018-01-27 16:00:00', '9th Floor, 901 and 902', 'JPCS', 'Pending', '2017-2018', 'Awardingg', 1),
(60, 'Nathan Ganesh', '', '2018-01-22 01:00:00', '2018-01-22 03:00:00', 'Ben', 'Ben', 'Pending Activity Proposal', '2017-2018', 'Done', 1),
(61, 'Ben', '', '2018-01-22 01:00:00', '2018-01-22 03:00:00', 'Red', 'Ben', 'Pending Activity Proposal', '2017-2018', '', 1),
(62, 'Try', '', '2018-01-26 01:00:00', '2018-01-27 13:00:00', 'Try', 'JPCS', 'Pending', '2017-2018', '', 1),
(63, 'JPCS Week', '', '2018-01-27 08:00:00', '2018-01-27 16:30:00', '9th Floor', 'CSIT', 'Returned', '2017-2018', 'Change your color to orange please. Thank you.', 6),
(64, 'Trying Due Date', '', '2018-02-09 07:00:00', '2018-02-09 11:00:00', '9th Floor', 'JPCS', 'Pending Activity Proposal', '2017-2018', 'Good', 1);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `Function` varchar(30) DEFAULT NULL,
  `Time` datetime DEFAULT NULL,
  `users_ID` int(11) NOT NULL,
  `events_id` int(11) NOT NULL,
  `activityproposal_ap_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `Department` varchar(50) NOT NULL,
  `Organization` varchar(50) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `UserLvl` varchar(50) NOT NULL,
  `AccessLvl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `Email`, `Lastname`, `Firstname`, `Middlename`, `Department`, `Organization`, `Position`, `UserLvl`, `AccessLvl`) VALUES
(1, 'Ben', '812d6a01ed0d3508196055be1b62e3a952f9d51be9fdc1b175d5cb9f2aed838fa18958819eeff033e38da19518741ac60494f5c4e41536d730afaca7b18b4cee', 'Ben@gmail.com', 'Villanueva', 'Ben John III', 'Cabual', 'BSIT', 'CSIT', 'Student Council', 'Student', 'User'),
(5, 'Super Admin', 'd4008fa66cd25bcadc9d18689083d84307dcc82323e1f8fe5f5875c786e8c3d1259dca0464ad7aeff99a6cfc73eadecb45fb18d4aa775d56e8631f332bca28bc', 'superadmin@gmail.com', 'Super Admin', 'Super Admin', 'Super Admin', 'SAO', 'SAO', 'SAO', 'Employee', 'Super Admin'),
(6, 'Mary', '72c2f664fed9fb38b5cd0e40f1f5fb153c75e7270c7250ea4147ee4b7fe4bdc4264f2c0db7acec1679e51da8e18379345bb3fcf103b177d07e3f3e1581dc86d0', 'Mary@gmail.com', 'Avisado', 'Mary Aissen', 'Howard', 'BSIT', 'JPCS', 'Student Council', 'Student', 'User'),
(7, 'Marie', 'Marie', 'Marie@gmail.com', 'Cruz', 'Marie', 'Lloyd', 'SAO', 'SAO', 'SAO', 'Employee', 'User'),
(8, 'Mac', 'Mac', 'marcial@gmail.com', 'Anacio', 'Marcial', 'Cruz', 'BSIT', 'CSIT', 'Organization Adviser', 'Employee', 'Admin'),
(9, 'Maintenance', '7e0591400107f641411ea4ceda726c3833a0f49ca39e3fa581ea25677796501b24e2f857dbc36e283cedfa9a5ce4104758327c3b3ea363c300049944967e7b1f', 'Maintenance@gmail.com', 'Doe', 'Jane', 'Cruz', 'Maintenance', 'Maintenance', 'Maintenance', 'Employee', 'User'),
(10, 'Property', '4559ed258c06ab05dc92a08e218279c64336b4f70a2819c251652c0380f2d9947e934b9c58aed3e862d2f08b22c1c26fd04ff3a097ad585dcb28b1c0c5344459', 'Property@gmail.com', 'Doe', 'John', 'Cruz', 'Property', 'Property', 'Property', 'Employee', 'User'),
(11, 'TLTS', '688f1ca6c58c00f6f0bdea49b27b097d84b049a750ad8714d6ad73fe380a4bd392fdb8acf4420335449a67caa09de6f303ba4db5a1211f8443fddcb54162e87a', 'TLTS@gmail.com', 'Doe', 'James', 'Cruz', 'TLTS', 'TLST', 'TLTS', 'Employee', 'User'),
(12, 'Dummy', 'Dummy', 'Dummy@gmail.com', 'Dummy', 'Dummy', 'Dummy', 'Dummy', 'Dummy', '', 'Employee', 'User'),
(13, 'Razer', 'Razer', 'Razer@gmail.com', 'Razer', 'Razer', 'Razer', 'BSCS', 'JPCS', 'Student Council', 'Student', 'User');

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
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_ap_committees_users1_idx` (`Stud_Emp_ID`),
  ADD KEY `fk_ap_committees_activityproposal1_idx` (`ap_id`);

--
-- Indexes for table `ap_consumption`
--
ALTER TABLE `ap_consumption`
  ADD PRIMARY KEY (`ID`,`ap_id`),
  ADD KEY `fk_ap_expenses_activityproposal1_idx` (`ap_id`);

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
  ADD UNIQUE KEY `ap_id` (`ap_id`),
  ADD KEY `fk_ap_objectives_events1_idx` (`events_id`),
  ADD KEY `fk_ap_objectives_activityproposal1_idx` (`ap_id`);

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
  ADD KEY `fk_history_users1_idx1` (`users_ID`),
  ADD KEY `fk_history_events1_idx` (`events_id`),
  ADD KEY `fk_history_activityproposal1_idx` (`activityproposal_ap_id`);

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
  ADD PRIMARY KEY (`ID`);

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
  MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ap_committees`
--
ALTER TABLE `ap_committees`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ap_consumption`
--
ALTER TABLE `ap_consumption`
  MODIFY `ID` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ap_distributionbudget`
--
ALTER TABLE `ap_distributionbudget`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ap_expenses`
--
ALTER TABLE `ap_expenses`
  MODIFY `ID` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ap_exp_materials`
--
ALTER TABLE `ap_exp_materials`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ap_guest`
--
ALTER TABLE `ap_guest`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ap_objectives`
--
ALTER TABLE `ap_objectives`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ap_reservation`
--
ALTER TABLE `ap_reservation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ap_reservation_main`
--
ALTER TABLE `ap_reservation_main`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ap_schedule`
--
ALTER TABLE `ap_schedule`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `physicalfaci-dept`
--
ALTER TABLE `physicalfaci-dept`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  ADD CONSTRAINT `fk_ap_committees_users1` FOREIGN KEY (`Stud_Emp_ID`) REFERENCES `users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ap_consumption`
--
ALTER TABLE `ap_consumption`
  ADD CONSTRAINT `fk_ap_expenses_activityproposal10` FOREIGN KEY (`ap_id`) REFERENCES `activityproposal` (`ap_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `ap_guest`
--
ALTER TABLE `ap_guest`
  ADD CONSTRAINT `fk_ap_guest_activityproposal1` FOREIGN KEY (`ap_id`) REFERENCES `activityproposal` (`ap_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ap_objectives`
--
ALTER TABLE `ap_objectives`
  ADD CONSTRAINT `fk_ap_objectives_activityproposal1` FOREIGN KEY (`ap_id`) REFERENCES `activityproposal` (`ap_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `fk_history_activityproposal1` FOREIGN KEY (`activityproposal_ap_id`) REFERENCES `activityproposal` (`ap_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_history_events1` FOREIGN KEY (`events_id`) REFERENCES `events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_history_users1` FOREIGN KEY (`users_ID`) REFERENCES `users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `physicalfaci-dept`
--
ALTER TABLE `physicalfaci-dept`
  ADD CONSTRAINT `fk_PhysicalFaci-dept_users1` FOREIGN KEY (`users_ID`) REFERENCES `users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_physicalfaci-dept_ap_reservation_main1` FOREIGN KEY (`ap_reservation_main_ID`) REFERENCES `ap_reservation_main` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
