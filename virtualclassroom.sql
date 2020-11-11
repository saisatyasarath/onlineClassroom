-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2020 at 09:15 AM
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
  `des` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `cid`, `uid`, `des`) VALUES
(1, 1, 3, 'Testing');

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
(2, 1, 2, 'assignments/22020_10_1314_46_36pmfv.pdf', '2020_10_13(14_46_36pm)', 2);

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
(5, 2, 4, 'uploads/2Vellore Institute of Technology (VIT).pdf', 'Random', 'iosdnklz', '06/11/2020');

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
(4, 'CN(A1+TA1)', 'aaba4', 3, '0000-00-00'),
(5, 'SE(B1+TB1)', 'aaba5', 4, '0000-00-00'),
(6, 'Linear(A1+TA1)', 'aaba6', 3, '0000-00-00');

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
(2, 2, 4, 2);

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
(2, 'sarathchandhra365@gmail.com', 'sarath123', 'student'),
(3, 'scssreddy.gudimetla@vitap.ac.in', 'sarath1234', 'faculty'),
(4, 'gudimetlavr11@gmail.com', 'veer', 'faculty');

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
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `studentclasses`
--
ALTER TABLE `studentclasses`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignmentfiles`
--
ALTER TABLE `assignmentfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `studentclasses`
--
ALTER TABLE `studentclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studymaterials`
--
ALTER TABLE `studymaterials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
