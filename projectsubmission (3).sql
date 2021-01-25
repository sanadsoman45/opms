-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 15, 2020 at 03:22 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectsubmission`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `a_id` int(11) NOT NULL,
  `a_pass` varchar(60) DEFAULT NULL,
  `a_name` varchar(30) NOT NULL,
  `a_type` varchar(30) NOT NULL,
  `a_email` varchar(30) NOT NULL,
  `a_pn` varchar(30) NOT NULL,
  `a_email_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `proj_starting_date` date DEFAULT NULL,
  `proj_ending_date` date DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_pass`, `a_name`, `a_type`, `a_email`, `a_pn`, `a_email_time`, `proj_starting_date`, `proj_ending_date`) VALUES
(208111, '1233a9bbdab791b0fe9561fdea519adf', 'Ganesh Gaitonde', 'root', 'ggaitonde64@gmail.com', '8773541327', '2020-11-21 10:35:24', '2020-11-24', '2020-12-29'),
(229641, '06260357c2bb9c909d4325590943da02', 'sanad soman', 'sudo_user', 'sanadsoman871@gmail.com', '8773542196', '2020-12-09 16:30:42', NULL, NULL),
(166885, '1233a9bbdab791b0fe9561fdea519adf', 'raj yadav', 'sudo_user', 'sanad03052000@gmail.com', '8775421396', '2020-11-21 11:58:54', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `s_id` int(10) NOT NULL,
  `proj_name` varchar(50) NOT NULL,
  `proj_description` varchar(200) NOT NULL,
  `proj_type` varchar(20) NOT NULL,
  `proj_status` varchar(20) NOT NULL,
  `proj_create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `proj_select` varchar(20) DEFAULT NULL,
  `stage1_file` varchar(400) DEFAULT NULL,
  `stage1_stat` varchar(30) DEFAULT NULL,
  `stage1_reje_reason` varchar(400) DEFAULT NULL,
  `stage2_file` varchar(400) DEFAULT NULL,
  `stage2_stat` varchar(30) DEFAULT NULL,
  `stage2_reje_reason` varchar(400) DEFAULT NULL,
  `stage3_file` varchar(400) DEFAULT NULL,
  `stage3_stat` varchar(30) DEFAULT NULL,
  `stage3_reje_reason` varchar(400) DEFAULT NULL,
  `stage4_file` varchar(400) DEFAULT NULL,
  `stage4_stat` varchar(30) DEFAULT NULL,
  `stage4_reje_reason` varchar(400) DEFAULT NULL,
  `stage5_file` varchar(400) DEFAULT NULL,
  `stage5_stat` varchar(30) DEFAULT NULL,
  `stage5_reje_reason` varchar(400) DEFAULT NULL,
  `stage6_file` varchar(400) DEFAULT NULL,
  `stage6_stat` varchar(30) DEFAULT NULL,
  `stage6_reje_reason` varchar(400) DEFAULT NULL,
  `stage7_file` varchar(400) DEFAULT NULL,
  `stage7_stat` varchar(30) DEFAULT NULL,
  `stage7_reje_reason` varchar(400) DEFAULT NULL,
  `stagefinal_file` varchar(400) DEFAULT NULL,
  `stagefinal_stat` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `s_id`, `proj_name`, `proj_description`, `proj_type`, `proj_status`, `proj_create_time`, `proj_select`, `stage1_file`, `stage1_stat`, `stage1_reje_reason`, `stage2_file`, `stage2_stat`, `stage2_reje_reason`, `stage3_file`, `stage3_stat`, `stage3_reje_reason`, `stage4_file`, `stage4_stat`, `stage4_reje_reason`, `stage5_file`, `stage5_stat`, `stage5_reje_reason`, `stage6_file`, `stage6_stat`, `stage6_reje_reason`, `stage7_file`, `stage7_stat`, `stage7_reje_reason`, `stagefinal_file`, `stagefinal_stat`) VALUES
(1, 208601, 'opms', 'jkkjbj .\njgfjgfjgv\nbvgjgv\n', 'Java Development', 'Active', '2020-12-09 17:29:06', 'Selected', 'Uploads/TYBSC CS PROJ Certificate.pdf', 'Accepted', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 208607, 'opms', 'jkkjbj .\r\njgfjgfjgv\r\nbvgjgv\r\n', 'Java Development', 'Active', '2020-12-09 17:29:06', 'Selected', 'Uploads/TYBSC CS PROJ Certificate.pdf', 'Accepted', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 208608, 'hotel management', 'jkkjbj .\r\njgfjgfjgv\r\nbvgjgv\r\n', 'web development', 'Active', '2020-12-09 17:29:06', 'Selected', 'Uploads/TYBSC CS PROJ Certificate.pdf', 'Accepted', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `queries_doubts`
--

DROP TABLE IF EXISTS `queries_doubts`;
CREATE TABLE IF NOT EXISTS `queries_doubts` (
  `user_id` int(10) NOT NULL,
  `user_gi_pin` int(10) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_doubt` varchar(800) NOT NULL,
  `message_time` timestamp NULL DEFAULT current_timestamp(),
  `message_status` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `queries_doubts`
--

INSERT INTO `queries_doubts` (`user_id`, `user_gi_pin`, `user_type`, `user_email`, `user_doubt`, `message_time`, `message_status`) VALUES
(208111, 151212, 'teacher', 'sanadsoman871@gmail.com', 'Sanad', '2020-11-28 14:07:28', 'checked'),
(208601, 121341, 'student', 'sanad871@gmail.com', 'here is the query', '2020-12-05 13:55:28', 'checked');

-- --------------------------------------------------------

--
-- Table structure for table `rejected_proj_table`
--

DROP TABLE IF EXISTS `rejected_proj_table`;
CREATE TABLE IF NOT EXISTS `rejected_proj_table` (
  `s_id` int(6) NOT NULL,
  `reject_message` varchar(400) NOT NULL,
  `message_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rejected_proj_table`
--

INSERT INTO `rejected_proj_table` (`s_id`, `reject_message`, `message_time`, `id`) VALUES
(208601, 'Your Stage 1 Has Been Accepted', '2020-12-10 06:50:35', 9),
(208608, 'Your Stage 1 Has Been Accepted', '2020-12-10 06:50:31', 8),
(208607, 'Your Stage 1 Has Been Accepted', '2020-12-09 17:43:53', 7),
(208601, 'Your Project opms Has Been Accepted', '2020-12-09 17:30:05', 6);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `s_id` int(11) NOT NULL,
  `s_gr` varchar(30) NOT NULL,
  `s_name` varchar(30) NOT NULL,
  `s_pass` varchar(60) DEFAULT NULL,
  `s_email` varchar(30) NOT NULL,
  `s_pn` varchar(30) NOT NULL,
  `group_id` varchar(30) NOT NULL,
  `s_email_time` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_gr`, `s_name`, `s_pass`, `s_email`, `s_pn`, `group_id`, `s_email_time`) VALUES
(208602, '121342', 'AGRE HRUTIK ', '1233a9bbdab791b0fe9561fdea519adf', 'hrutik208602@gmail.com', '8831432322', 'A', '2020-11-24 18:39:28'),
(208603, '121323', 'AGRE NINAD', '1233a9bbdab791b0fe9561fdea519adf', 'ninad208603@gmail.com', '7718931345', 'A', '2020-11-24 18:39:28'),
(208604, '121311', 'AGRE SAGAR', '1233a9bbdab791b0fe9561fdea519adf', 'sagar20604@gmail.com', '7718931257', 'A', '2020-11-24 18:39:28'),
(208605, '121331', 'ANERAO RUTHIK', '1233a9bbdab791b0fe9561fdea519adf', 'ruthik208605@gmail.com', '7718931234', 'A', '2020-11-24 18:39:28'),
(208606, '123212', 'ATTAR SANIYA', '1233a9bbdab791b0fe9561fdea519adf', 'saniya208605@gmail.com', '8831432232', 'A', '2020-11-24 18:39:28'),
(208607, '123222', 'BAFNA GAURAV', '1233a9bbdab791b0fe9561fdea519adf', 'gaurav208607@gmail.com', '8831433333', 'B', '2020-11-24 18:39:28'),
(208608, '121332', 'BEHERA VIKAS', '1233a9bbdab791b0fe9561fdea519adf', 'vikas208608@gmail.com', '7189313572', 'B', '2020-11-24 18:39:28'),
(208609, '133212', 'BHAGWAT RAHUL', '1233a9bbdab791b0fe9561fdea519adf', 'rahul208609@gmail.com', '8831432222', 'B', '2020-11-24 18:39:28'),
(208610, '123324', 'BHAPKAR SONALI', '1233a9bbdab791b0fe9561fdea519adf', 'sonali208610@gmail.com', '8311122232', 'B', '2020-11-24 18:39:28'),
(208611, '132145', 'BHATKAR ADITYA', '1233a9bbdab791b0fe9561fdea519adf', 'aditya208611@gmail.com', '9870133356', 'B', '2020-11-24 18:39:28'),
(208612, '123444', 'BHAVSAR ATHARVA', '1233a9bbdab791b0fe9561fdea519adf', 'atharva208612@gmail.com', '87771133789', 'B', '2020-11-24 18:39:28'),
(208613, '131221', 'BHOSALE PRINCE', '1233a9bbdab791b0fe9561fdea519adf', 'prince20613@gmail.com', '9870133325', 'C', '2020-11-24 18:39:28'),
(208614, '122111', 'BHOSALE RUSHIKESH', '1233a9bbdab791b0fe9561fdea519adf', 'rushikesh208614@gmail.com', '8831432353', 'C', '2020-11-24 18:39:28'),
(208615, '123124', 'BOBADE VEDANT', '1233a9bbdab791b0fe9561fdea519adf', 'vedant208615@gmail.com', '7712345655', 'C', '2020-11-24 18:39:28'),
(208616, '131232', 'BORHADE SUMIT', '1233a9bbdab791b0fe9561fdea519adf', 'sumit208616@gmail.com', '8811223215', 'C', '2020-11-24 18:39:28'),
(208619, '133221', 'KANTALE RAJ', '1233a9bbdab791b0fe9561fdea519adf', 'raj208619@gmail.com', '8711331122', 'C', '2020-11-24 18:39:28'),
(208620, '123333', 'CHITYAL RAJESH', '1233a9bbdab791b0fe9561fdea519adf', 'rajesh208620@gmail.com', '8889442333', 'C', '2020-11-24 18:39:28'),
(208621, '123389', 'CHOPADE SUSHANT', '1233a9bbdab791b0fe9561fdea519adf', 'sushant208621@gmail.com', '8245655663', 'D', '2020-11-24 18:39:28'),
(208622, '132155', 'DAMLE ABHISHEK', '1233a9bbdab791b0fe9561fdea519adf', 'abhishek208622@gmail.com', '9982533457', 'D', '2020-11-24 18:39:28'),
(208623, '123358', 'DAMUGADE RUPALI', '1233a9bbdab791b0fe9561fdea519adf', 'rupali208623', '882555542', 'D', '2020-11-24 18:39:28'),
(208625, '133232', 'DESALE HARSHAL', '1233a9bbdab791b0fe9561fdea519adf', 'harshal208625@gmail.com', '9870134444', 'D', '2020-11-24 18:39:28'),
(208626, '123377', 'DESHMUKH PRIYANKA', '1233a9bbdab791b0fe9561fdea519adf', 'priyanka208626@gmail.com', '8666632211', 'D', '2020-11-24 18:39:28'),
(208627, '142322', 'DEVRUKAR YASH', '1233a9bbdab791b0fe9561fdea519adf', 'yash208627@gmail.com', '8766622552', 'D', '2020-11-24 18:39:28'),
(208628, '145344', 'DHOTRE NIRMITI', '1233a9bbdab791b0fe9561fdea519adf', 'nirmiti208628@gmail.com', '9922882352', 'E', '2020-11-24 18:39:28'),
(208629, '142554', 'DOLAS SAHIL', '1233a9bbdab791b0fe9561fdea519adf', 'sahil208629@gmail.com', '9850131357', 'E', '2020-11-24 18:39:28'),
(208630, '145555', 'DUBEY POOJA', '1233a9bbdab791b0fe9561fdea519adf', 'pooja208630@gmail.com', '9872253444', 'E', '2020-11-24 18:39:28'),
(208717, '123242', 'CHAUDARY MAHIMA', '1233a9bbdab791b0fe9561fdea519adf', 'mahima208717@gmail.com', '8722456772', 'E', '2020-11-24 18:39:28'),
(208718, '123445', 'CHAUDARY ROSHAN', '1233a9bbdab791b0fe9561fdea519adf', 'roshan208718@gmail.com', '7718931344', 'E', '2020-11-24 18:39:28'),
(208601, '121141', 'Sanad Soman', '1233a9bbdab791b0fe9561fdea519adf', 'sanadsoman871@gmail.com', '9631452277', 'A', '2020-12-09 22:23:18');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `t_id` int(11) NOT NULL,
  `t_pin` varchar(30) NOT NULL,
  `t_name` varchar(30) NOT NULL,
  `t_pass` varchar(60) DEFAULT NULL,
  `t_email` varchar(30) NOT NULL,
  `t_pn` varchar(30) NOT NULL,
  `group_id` varchar(30) NOT NULL,
  `t_type` varchar(30) NOT NULL DEFAULT 'Teacher',
  `t_email_time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`t_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `t_pin`, `t_name`, `t_pass`, `t_email`, `t_pn`, `group_id`, `t_type`, `t_email_time`) VALUES
(208111, '151212', 'SHAH REENA', NULL, 'sanadsoman871@gmail.com', '8766621332', 'E', 'Teacher', '2020-12-10 06:52:52'),
(208112, '152452', 'DEV SHYLASHREE', '1233a9bbdab791b0fe9561fdea519adf', 'sanad20000305@gmail.com', '9136214172', 'A', 'Teacher', '2020-11-23 11:03:02'),
(208113, '152667', 'ASSAR VAISHNAVI', '1233a9bbdab791b0fe9561fdea519adf', 'vaishnavi208113@gmail.com', '7718932356', 'B', 'Teacher', '2020-11-23 11:03:10'),
(208114, '152724', 'NAKUM BHUMIKA', '1233a9bbdab791b0fe9561fdea519adf', 'bhumika208114@gmail.com', '9869055554', 'C', 'Supervisor', '2020-11-23 11:03:16'),
(208115, '152899', 'HARWALKAR PRATIKSHA', '1233a9bbdab791b0fe9561fdea519adf', 'pratiksha208115@gmail.com', '7735288952', 'D', 'Teacher', '2020-11-23 11:03:23');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
