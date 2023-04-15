-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2023 at 06:04 PM
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
-- Database: `hello`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`qid`, `ansid`) VALUES
('55892169bf6a7', '55892169d2efc'),
('5589216a3646e', '5589216a48722'),
('558922117fcef', '5589221195248'),
('55892211e44d5', '55892211f1fa7'),
('558922894c453', '558922895ea0a'),
('558922899ccaa', '55892289aa7cf'),
('558923538f48d', '558923539a46c'),
('55892353f05c4', '55892354051be'),
('558973f4389ac', '558973f462e61'),
('558973f4c46f2', '558973f4d4abe'),
('558973f51600d', '558973f526fc5'),
('558973f55d269', '558973f57af07'),
('558973f5abb1a', '558973f5e764a'),
('5589751a63091', '5589751a81bf4'),
('5589751ad32b8', '5589751adbdbd'),
('5589751b304ef', '5589751b3b04d'),
('5589751b749c9', '5589751b9a98c'),
('5fbe1776de2af', '5fbe17770372b'),
('5fbe17774ddb4', '5fbe177754882'),
('5fbe17778284a', '5fbe17778c286'),
('5fbe1777d900a', '5fbe1777e550a'),
('5fbe177876695', '5fbe1778a76a9'),
('5fbfbbb158f56', '5fbfbbb18949c'),
('5fbfbbb1cf831', '5fbfbbb1d79b6'),
('5fbfbbb20ebbd', '5fbfbbb21831c'),
('5fbff7d868686', '5fbff7d87a0b7'),
('5fbff7d8cc654', '5fbff7d900adf'),
('5fbff7d9300e4', '5fbff7d9398e8'),
('5fbff90d6d094', '5fbff90d87b27'),
('5fc150a53ce13', '5fc150a5536e0'),
('5fc88b4fdacfa', '5fc88b501a508'),
('5fc88b506fde9', '5fc88b5078baf'),
('5fc893339556f', '5fc89333b39a5'),
('5fc89333ec407', '5fc8933405d7c');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `email` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `correct` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cid` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`email`, `eid`, `score`, `level`, `correct`, `wrong`, `date`, `cid`) VALUES
('sarathchandhra365@gmail.com', '5fc1507b723ba', 0, 1, 0, 1, '2020-11-28 17:21:29', 1),
('sarathchandhra365@gmail.com', '5fbff8de22215', 0, 1, 0, 1, '2020-12-01 17:37:14', 1),
('banti@gmail.com', '5fc1507b723ba', 0, 1, 0, 1, '2020-12-02 18:59:00', 1),
('sarathchandhra365@gmail.com', '5fc88f26e0cc2', 1, 2, 1, 1, '2020-12-03 08:17:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('55892169bf6a7', 'usermod', '55892169d2efc'),
('55892169bf6a7', 'useradd', '55892169d2f05'),
('55892169bf6a7', 'useralter', '55892169d2f09'),
('55892169bf6a7', 'groupmod', '55892169d2f0c'),
('5589216a3646e', '751', '5589216a48713'),
('5589216a3646e', '752', '5589216a4871a'),
('5589216a3646e', '754', '5589216a4871f'),
('5589216a3646e', '755', '5589216a48722'),
('558922117fcef', 'echo', '5589221195248'),
('558922117fcef', 'print', '558922119525a'),
('558922117fcef', 'printf', '5589221195265'),
('558922117fcef', 'cout', '5589221195270'),
('55892211e44d5', 'int a', '55892211f1f97'),
('55892211e44d5', '$a', '55892211f1fa7'),
('55892211e44d5', 'long int a', '55892211f1fb4'),
('55892211e44d5', 'int a$', '55892211f1fbd'),
('558922894c453', 'cin>>a;', '558922895ea0a'),
('558922894c453', 'cin<<a;', '558922895ea26'),
('558922894c453', 'cout>>a;', '558922895ea34'),
('558922894c453', 'cout<a;', '558922895ea41'),
('558922899ccaa', 'cout', '55892289aa7cf'),
('558922899ccaa', 'cin', '55892289aa7df'),
('558922899ccaa', 'print', '55892289aa7eb'),
('558922899ccaa', 'printf', '55892289aa7f5'),
('558923538f48d', '255.0.0.0', '558923539a46c'),
('558923538f48d', '255.255.255.0', '558923539a480'),
('558923538f48d', '255.255.0.0', '558923539a48b'),
('558923538f48d', 'none of these', '558923539a495'),
('55892353f05c4', '192.168.1.100', '5589235405192'),
('55892353f05c4', '172.168.16.2', '55892354051a3'),
('55892353f05c4', '10.0.0.0.1', '55892354051b4'),
('55892353f05c4', '11.11.11.11', '55892354051be'),
('558973f4389ac', 'containing root file-system required during bootup', '558973f462e44'),
('558973f4389ac', ' Contains only scripts to be executed during bootup', '558973f462e56'),
('558973f4389ac', ' Contains root-file system and drivers required to be preloaded during bootup', '558973f462e61'),
('558973f4389ac', 'None of the above', '558973f462e6b'),
('558973f4c46f2', 'Kernel', '558973f4d4abe'),
('558973f4c46f2', 'Shell', '558973f4d4acf'),
('558973f4c46f2', 'Commands', '558973f4d4ad9'),
('558973f4c46f2', 'Script', '558973f4d4ae3'),
('558973f51600d', 'Boot Loading', '558973f526f9d'),
('558973f51600d', ' Boot Record', '558973f526fb9'),
('558973f51600d', ' Boot Strapping', '558973f526fc5'),
('558973f51600d', ' Booting', '558973f526fce'),
('558973f55d269', ' Quick boot', '558973f57aef1'),
('558973f55d269', 'Cold boot', '558973f57af07'),
('558973f55d269', ' Hot boot', '558973f57af17'),
('558973f55d269', ' Fast boot', '558973f57af27'),
('558973f5abb1a', 'bash', '558973f5e7623'),
('558973f5abb1a', ' Csh', '558973f5e7636'),
('558973f5abb1a', ' ksh', '558973f5e7640'),
('558973f5abb1a', ' sh', '558973f5e764a'),
('5589751a63091', 'q', '5589751a81bd6'),
('5589751a63091', 'wq', '5589751a81be8'),
('5589751a63091', ' both (a) and (b)', '5589751a81bf4'),
('5589751a63091', ' none of the mentioned', '5589751a81bfd'),
('5589751ad32b8', ' moves screen down one page', '5589751adbdbd'),
('5589751ad32b8', 'moves screen up one page', '5589751adbdce'),
('5589751ad32b8', 'moves screen up one line', '5589751adbdd8'),
('5589751ad32b8', ' moves screen down one line', '5589751adbde2'),
('5589751b304ef', ' yy', '5589751b3b04d'),
('5589751b304ef', 'yw', '5589751b3b05e'),
('5589751b304ef', 'yc', '5589751b3b069'),
('5589751b304ef', ' none of the mentioned', '5589751b3b073'),
('5589751b749c9', 'X', '5589751b9a98c'),
('5589751b749c9', 'x', '5589751b9a9a5'),
('5589751b749c9', 'D', '5589751b9a9b7'),
('5589751b749c9', 'd', '5589751b9a9c9'),
('5589751bd02ec', 'autoindentation is not possible in vi editor', '5589751bdadaa'),
('5fbe1776de2af', '4', '5fbe17770372b'),
('5fbe1776de2af', '1', '5fbe17770372f'),
('5fbe1776de2af', '2', '5fbe177703731'),
('5fbe1776de2af', '3', '5fbe177703732'),
('5fbe17774ddb4', '5', '5fbe17775487d'),
('5fbe17774ddb4', '2', '5fbe177754882'),
('5fbe17774ddb4', '3', '5fbe177754884'),
('5fbe17774ddb4', '4', '5fbe177754885'),
('5fbe17778284a', '8', '5fbe17778c282'),
('5fbe17778284a', '9', '5fbe17778c286'),
('5fbe17778284a', '7', '5fbe17778c287'),
('5fbe17778284a', '2', '5fbe17778c288'),
('5fbe1777d900a', '7', '5fbe1777e550a'),
('5fbe1777d900a', '8', '5fbe1777e5510'),
('5fbe1777d900a', '9', '5fbe1777e5511'),
('5fbe1777d900a', '1', '5fbe1777e5514'),
('5fbe177876695', '7', '5fbe1778a769d'),
('5fbe177876695', '8', '5fbe1778a76a3'),
('5fbe177876695', '9', '5fbe1778a76a6'),
('5fbe177876695', '2', '5fbe1778a76a9'),
('5fbfbbb158f56', '1', '5fbfbbb18949c'),
('5fbfbbb158f56', '2', '5fbfbbb1894a1'),
('5fbfbbb158f56', '3', '5fbfbbb1894a3'),
('5fbfbbb158f56', '4', '5fbfbbb1894a4'),
('5fbfbbb1cf831', '5', '5fbfbbb1d79b6'),
('5fbfbbb1cf831', '6', '5fbfbbb1d79ba'),
('5fbfbbb1cf831', '7', '5fbfbbb1d79bb'),
('5fbfbbb1cf831', '8', '5fbfbbb1d79bc'),
('5fbfbbb20ebbd', '1', '5fbfbbb218317'),
('5fbfbbb20ebbd', '2', '5fbfbbb21831b'),
('5fbfbbb20ebbd', '3', '5fbfbbb21831c'),
('5fbfbbb20ebbd', '4', '5fbfbbb21831d'),
('5fbff7d868686', '1', '5fbff7d87a0b7'),
('5fbff7d868686', '2', '5fbff7d87a12e'),
('5fbff7d868686', '3', '5fbff7d87a133'),
('5fbff7d868686', '4', '5fbff7d87a135'),
('5fbff7d8cc654', '5', '5fbff7d900adf'),
('5fbff7d8cc654', '6', '5fbff7d900ae7'),
('5fbff7d8cc654', '7', '5fbff7d900ae8'),
('5fbff7d8cc654', '8', '5fbff7d900ae9'),
('5fbff7d9300e4', '1', '5fbff7d9398e1'),
('5fbff7d9300e4', '2', '5fbff7d9398e6'),
('5fbff7d9300e4', '3', '5fbff7d9398e8'),
('5fbff7d9300e4', '4', '5fbff7d9398e9'),
('5fbff90d6d094', '1', '5fbff90d87b27'),
('5fbff90d6d094', '2', '5fbff90d87b2f'),
('5fbff90d6d094', '3', '5fbff90d87b30'),
('5fbff90d6d094', '4', '5fbff90d87b31'),
('5fc150a53ce13', '1333', '5fc150a5536e0'),
('5fc150a53ce13', '1334', '5fc150a5536e6'),
('5fc150a53ce13', '1335', '5fc150a5536e8'),
('5fc150a53ce13', '1336', '5fc150a5536ea'),
('5fc88b4fdacfa', 'extends', '5fc88b501a508'),
('5fc88b4fdacfa', 'implement', '5fc88b501a50d'),
('5fc88b4fdacfa', 'both', '5fc88b501a510'),
('5fc88b4fdacfa', 'none', '5fc88b501a512'),
('5fc88b506fde9', 'default', '5fc88b5078baf'),
('5fc88b506fde9', 'public', '5fc88b5078bb5'),
('5fc88b506fde9', 'private', '5fc88b5078bb7'),
('5fc88b506fde9', 'protected', '5fc88b5078bb8'),
('5fc893339556f', 'public', '5fc89333b39a5'),
('5fc893339556f', 'private', '5fc89333b39ab'),
('5fc893339556f', 'protected', '5fc89333b39ac'),
('5fc893339556f', 'default', '5fc89333b39ad'),
('5fc89333ec407', 'public', '5fc8933405d70'),
('5fc89333ec407', 'private', '5fc8933405d79'),
('5fc89333ec407', 'default', '5fc8933405d7c'),
('5fc89333ec407', 'protected', '5fc8933405d7e');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`eid`, `qid`, `qns`, `choice`, `sn`) VALUES
('558920ff906b8', '55892169bf6a7', 'what is command for changing user information??', 4, 1),
('558920ff906b8', '5589216a3646e', 'what is permission for view only for other??', 4, 2),
('558921841f1ec', '558922117fcef', 'what is command for print in php??', 4, 1),
('558921841f1ec', '55892211e44d5', 'which is a variable of php??', 4, 2),
('5589222f16b93', '558922894c453', 'what is correct statement in c++??', 4, 1),
('5589222f16b93', '558922899ccaa', 'which command is use for print the output in c++?', 4, 2),
('558922ec03021', '558923538f48d', 'what is correct mask for A class IP???', 4, 1),
('558922ec03021', '55892353f05c4', 'which is not a private IP??', 4, 2),
('55897338a6659', '558973f4389ac', 'On Linux, initrd is a file', 4, 1),
('55897338a6659', '558973f4c46f2', 'Which is loaded into memory when system is booted?', 4, 2),
('55897338a6659', '558973f51600d', ' The process of starting up a computer is known as', 4, 3),
('55897338a6659', '558973f55d269', ' Bootstrapping is also known as', 4, 4),
('55897338a6659', '558973f5abb1a', 'The shell used for Single user mode shell is:', 4, 5),
('5589741f9ed52', '5589751a63091', ' Which command is used to close the vi editor?', 4, 1),
('5589741f9ed52', '5589751ad32b8', ' In vi editor, the key combination CTRL+f', 4, 2),
('5589741f9ed52', '5589751b304ef', ' Which vi editor command copies the current line of the file?', 4, 3),
('5589741f9ed52', '5589751b749c9', ' Which command is used to delete the character before the cursor location in vi editor?', 4, 4),
('5589741f9ed52', '5589751bd02ec', ' Which one of the following statement is true?', 4, 5),
('5fbe170fe03b0', '5fbe1776de2af', 'He', 4, 1),
('5fbe170fe03b0', '5fbe17774ddb4', 'Hb', 4, 2),
('5fbe170fe03b0', '5fbe17778284a', 'sd', 4, 3),
('5fbe170fe03b0', '5fbe1777d900a', 'Ghf', 4, 4),
('5fbe170fe03b0', '5fbe177876695', 'op', 4, 5),
('5fbfbb19c78cc', '5fbfbbb158f56', 'Mark Right', 4, 1),
('5fbfbb19c78cc', '5fbfbbb1cf831', 'Second One', 4, 2),
('5fbfbb19c78cc', '5fbfbbb20ebbd', 'Third', 4, 3),
('5fbfbb19c78cc', '5fbff7d868686', 'Mark Right', 4, 1),
('5fbfbb19c78cc', '5fbff7d8cc654', 'Second One', 4, 2),
('5fbfbb19c78cc', '5fbff7d9300e4', 'Third', 4, 3),
('5fbff8de22215', '5fbff90d6d094', 'Again Question', 4, 1),
('5fc1507b723ba', '5fc150a53ce13', 'Paniput Battle', 4, 1),
('5fc88a90c6877', '5fc88b4fdacfa', 'To inherit other class , Which keyword is used?', 4, 1),
('5fc88a90c6877', '5fc88b506fde9', 'Which of the following accifier class is visible within package?', 4, 2),
('5fc88f26e0cc2', '5fc893339556f', 'Which is visible everywhere?', 4, 1),
('5fc88f26e0cc2', '5fc89333ec407', 'Which is visible within Package?', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `eid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `correct` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `intro` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`eid`, `title`, `correct`, `wrong`, `total`, `time`, `intro`, `date`, `cid`) VALUES
('558920ff906b8', 'Linux : File Managment', 2, 1, 2, 5, '', '2015-06-23 09:03:59', 0),
('558921841f1ec', 'Php Coding', 2, 1, 2, 5, '', '2015-06-23 09:06:12', 0),
('5589222f16b93', 'C++ Coding', 2, 1, 2, 5, '', '2015-06-23 09:09:03', 0),
('558922ec03021', 'Networking', 2, 1, 2, 5, '', '2015-06-23 09:12:12', 0),
('55897338a6659', 'Linux:startup', 2, 1, 5, 10, '', '2015-06-23 14:54:48', 0),
('5589741f9ed52', 'Linux :vi Editor', 2, 1, 5, 10, '', '2015-06-23 14:58:39', 0),
('5fbe170fe03b0', 'Assignment', 2, 0, 5, 5, 'Hello', '2020-11-25 08:34:23', 0),
('5fbfba7079d39', 'First', 1, 0, 3, 1, '5', '0000-00-00 00:00:00', 2147483647),
('5fbfbacc66bf9', 'First', 1, 0, 3, 1, '5', '0000-00-00 00:00:00', 2147483647),
('5fbfbaf466b3a', 'First', 2, 0, 3, 1, '4', '0000-00-00 00:00:00', 2147483647),
('5fbfbb19c78cc', 'First', 2, 0, 3, 1, '4', '0000-00-00 00:00:00', 2147483647),
('5fbff8de22215', 'Again', 1, 0, 1, 4, 'Just Fun', '2020-11-26 18:50:06', 1),
('5fc1507b723ba', 'Can You', 2, 0, 1, 4, 'Complete It', '2020-11-27 19:16:11', 1),
('5fc88a90c6877', 'Inheritence', 1, 0, 2, 5, 'Complete it', '2020-12-03 06:49:52', 7),
('5fc88f26e0cc2', 'Exam On Access Modifierd ', 2, 1, 2, 2, 'Complete It!!', '2020-12-03 07:09:26', 7);

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`email`, `score`, `time`, `cid`) VALUES
('sarathchandhra365@gmail.com', 1, '2020-12-03 08:17:15', 1),
('banti@gmail.com', 0, '2020-12-02 18:59:00', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
