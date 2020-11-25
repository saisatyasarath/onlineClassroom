-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2020 at 07:54 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `virtualclassroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `des` varchar(1000) NOT NULL,
  `title` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `cid`, `uid`, `des`, `title`) VALUES
(1, 1, 3, 'Testing', 'Check This'),
(2, 1, 2, 'Testing', 'From Student'),
(3, 1, 2, 'Testing', 'From Student'),
(4, 1, 2, 'Testing', 'From Student'),
(5, 1, 2, 'Testing', 'From Student'),
(6, 1, 7, 'Please', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `assignmentfiles`
--

CREATE TABLE `assignmentfiles` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `path` varchar(200) NOT NULL,
  `date` varchar(25) NOT NULL,
  `aid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignmentfiles`
--

INSERT INTO `assignmentfiles` (`id`, `cid`, `sid`, `path`, `date`, `aid`) VALUES
(1, 1, 2, 'assignments/22020_10_1300_09_13amAmazonResume.pdf', '2020_10_13(00_09_13am)', 1),
(2, 1, 2, 'assignments/22020_10_1314_46_36pmfv.pdf', '2020_10_13(14_46_36pm)', 2),
(3, 1, 2, 'assignments/22020_11_1317_25_14pm17BCE7128_AP2019201000377_Experiment-14.pdf', '2020_11_13(17_25_14pm)', 6);

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `path` varchar(250) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `cid`, `fid`, `path`, `name`, `description`, `date`) VALUES
(1, 1, 3, 'uploads/1data report.pdf', 'Random', 'Do it bastards', '16/10/2020'),
(2, 1, 3, 'uploads/1complex.pdf', 'Assigment On Deadlock ', 'Please find the attached pdf and solve those and submit it before deadline ', '30/10/2020'),
(3, 1, 3, 'uploads/1IOT.pdf', 'Assignment On Different OS', 'Please complete it.', '28/10/2020'),
(4, 1, 3, 'uploads/1cryptography1.pdf', 'Assignment On Threads', 'Complete it before Deadline', '01/10/2020'),
(5, 2, 4, 'uploads/2Vellore Institute of Technology (VIT).pdf', 'Random', 'iosdnklz', '06/11/2020'),
(6, 1, 3, 'uploads/117BCE7128_AP2019201000377_Experiment-9.pdf', 'Ganesh Kandregula', 'Please follow the attched instructions', '10/11/2020');

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `cid` int(11) NOT NULL DEFAULT '0',
  `gid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`, `cid`, `gid`) VALUES
(1, 3, 2, 'Hii', '2020-11-16 10:59:49', 1, 0, 0),
(2, 3, 2, 'hi', '2020-11-17 07:58:13', 1, 0, 0),
(3, 5, 2, 'Hii banti\nEla unnav', '2020-11-17 08:11:27', 0, 0, 0),
(4, 5, 2, 'Hii raa', '2020-11-17 08:14:11', 0, 0, 0),
(5, 2, 5, 'Fine... Nuvvu?', '2020-11-17 08:16:30', 0, 0, 0),
(6, 2, 5, 'Kya\n', '2020-11-18 16:52:57', 0, 0, 0),
(7, 0, 2, 'Hello', '2020-11-20 10:07:39', 1, 0, 0),
(8, 2, 7, 'Hii', '2020-11-21 13:39:10', 0, 0, 0),
(9, 7, 2, 'Hello', '2020-11-21 13:39:26', 0, 0, 0),
(10, 0, 2, 'Hiii\n', '2020-11-21 13:39:37', 1, 0, 0),
(11, 0, 7, 'Hello\n', '2020-11-21 13:39:50', 1, 0, 0),
(12, 0, 2, 'Hello', '2020-11-22 18:45:15', 1, 1, 0),
(13, 0, 2, 'Hii', '2020-11-22 18:45:30', 1, 2, 0),
(14, 0, 2, 'Hii', '2020-11-24 15:41:39', 1, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `cid` int(11) NOT NULL,
  `cname` varchar(250) NOT NULL,
  `ccode` varchar(250) NOT NULL,
  `fid` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`cid`, `cname`, `ccode`, `fid`, `date`) VALUES
(1, 'OS(F1+TF1)', 'aaba1', 3, '0000-00-00'),
(2, 'DBMS(D+TD)', 'aaba2', 4, '0000-00-00'),
(3, 'random1', 'aaba3', 4, '0000-00-00'),
(4, 'CN(A1+TA1)', 'aaba4', 4, '0000-00-00'),
(5, 'SE(B1+TB1)', 'aaba5', 4, '0000-00-00'),
(6, 'Linear(A1+TA1)', 'aaba6', 3, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `gid` int(11) NOT NULL,
  `gname` varchar(200) NOT NULL,
  `sid` int(11) NOT NULL,
  `cname` varchar(200) NOT NULL,
  `gcode` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`gid`, `gname`, `sid`, `cname`, `gcode`) VALUES
(5, 'Assignment', 2, 'OS', 'aabc5');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(1, 2, '2020-11-16 11:11:24', 'no'),
(2, 2, '2020-11-17 17:23:48', 'no'),
(3, 5, '2020-11-17 08:31:02', 'no'),
(4, 2, '2020-11-18 16:58:59', 'no'),
(5, 5, '2020-11-20 08:47:49', 'no'),
(6, 2, '2020-11-20 18:11:34', 'no'),
(7, 2, '2020-11-21 12:35:05', 'no'),
(8, 7, '2020-11-21 13:43:53', 'no'),
(9, 3, '2020-11-21 13:36:12', 'no'),
(10, 2, '2020-11-21 13:40:00', 'no'),
(11, 2, '2020-11-22 18:58:25', 'no'),
(12, 2, '2020-11-24 18:32:59', 'no'),
(13, 7, '2020-11-24 09:09:51', 'no'),
(14, 2, '2020-11-24 09:35:13', 'no'),
(15, 2, '2020-11-24 11:28:34', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `studentclasses`
--

CREATE TABLE `studentclasses` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentclasses`
--

INSERT INTO `studentclasses` (`id`, `cid`, `fid`, `sid`) VALUES
(1, 1, 3, 2),
(2, 2, 4, 2),
(3, 1, 3, 5),
(4, 1, 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `studentgroups`
--

CREATE TABLE `studentgroups` (
  `id` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentgroups`
--

INSERT INTO `studentgroups` (`id`, `gid`, `sid`) VALUES
(2, 5, 2),
(3, 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `studymaterials`
--

CREATE TABLE `studymaterials` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `path` varchar(250) NOT NULL,
  `fid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `date` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studymaterials`
--

INSERT INTO `studymaterials` (`id`, `name`, `path`, `fid`, `cid`, `date`, `description`) VALUES
(1, 'Material On OS', 'uploads/sample.pdf', 3, 1, '05/10/2020', 'This is the first ppt'),
(2, 'Material on DeadLock', 'uploads/1Cognizant Applied.xlsx', 3, 1, '09/10/2020', 'This is Second One '),
(3, 'Important Questions', 'uploads/1data_structues_c.pdf', 3, 1, '07/10/2020', 'Please find the attached pdf'),
(4, 'General Instructions', 'uploads/5Application for Employment_Full Time-converted.pdf', 4, 5, '13/10/2020', 'Please follow the attched instructions'),
(5, 'PPt', 'uploads/1Gudimetla S C SatyaNarayana Reddy_BTECH_CSE .pdf', 3, 1, '14/10/2020', 'Please find the below ppt'),
(6, 'Random', 'uploads/2Adobe Scan Oct 14, 2020 (2).pdf', 4, 2, '12/11/2020', 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `Role`) VALUES
(2, 'sarathchandhra365@gmail.com', 'sarath1234', 'student'),
(3, 'scssreddy.gudimetla@vitap.ac.in', 'sarath1234', 'faculty'),
(4, 'gudimetlavr11@gmail.com', 'veer', 'faculty'),
(5, 'banti@gmail.com', 'banti', 'student'),
(6, 'aasha@gmail.com', 'aasha', 'student'),
(7, 'bannu@gmail.com', 'bannu', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignmentfiles`
--
ALTER TABLE `assignmentfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `studentclasses`
--
ALTER TABLE `studentclasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentgroups`
--
ALTER TABLE `studentgroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studymaterials`
--
ALTER TABLE `studymaterials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assignmentfiles`
--
ALTER TABLE `assignmentfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `studentclasses`
--
ALTER TABLE `studentclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `studentgroups`
--
ALTER TABLE `studentgroups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `studymaterials`
--
ALTER TABLE `studymaterials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
