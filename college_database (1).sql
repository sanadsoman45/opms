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
-- Database: `college_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `stud_table`
--

DROP TABLE IF EXISTS `stud_table`;
CREATE TABLE IF NOT EXISTS `stud_table` (
  `S_id` int(11) NOT NULL,
  `S_gr` int(11) NOT NULL,
  `S_name` varchar(30) NOT NULL,
  `S_pn` varchar(30) NOT NULL,
  `S_email` varchar(30) NOT NULL,
  PRIMARY KEY (`S_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stud_table`
--

INSERT INTO `stud_table` (`S_id`, `S_gr`, `S_name`, `S_pn`, `S_email`) VALUES
(208601, 121141, 'Sanad Soman', '9631452278', 'sanadsoman871@gmail.com'),
(208602, 121342, 'AGRE HRUTIK ', '8831432322', 'hrutik208602@gmail.com'),
(208603, 121323, 'AGRE NINAD', '7718931345', 'ninad208603@gmail.com'),
(208604, 121311, 'AGRE SAGAR', '7718931257', 'sagar20604@gmail.com'),
(208605, 121331, 'ANERAO RUTHIK', '7718931234', 'ruthik208605@gmail.com'),
(208606, 123212, 'ATTAR SANIYA', '8831432232', 'saniya208605@gmail.com'),
(208607, 123222, 'BAFNA GAURAV', '8831433333', 'gaurav208607@gmail.com'),
(208608, 121332, 'BEHERA VIKAS', '7189313572', 'vikas208608@gmail.com'),
(208609, 133212, 'BHAGWAT RAHUL', '8831432222', 'rahul208609@gmail.com'),
(208610, 123324, 'BHAPKAR SONALI', '8311122232', 'sonali208610@gmail.com'),
(208611, 132145, 'BHATKAR ADITYA', '9870133356', 'aditya208611@gmail.com'),
(208612, 123444, 'BHAVSAR ATHARVA', '87771133789', 'atharva208612@gmail.com'),
(208613, 131221, 'BHOSALE PRINCE', '9870133325', 'prince20613@gmail.com'),
(208614, 122111, 'BHOSALE RUSHIKESH', '8831432353', 'rushikesh208614@gmail.com'),
(208615, 123124, 'BOBADE VEDANT', '7712345655', 'vedant208615@gmail.com'),
(208616, 131232, 'BORHADE SUMIT', '8811223215', 'sumit208616@gmail.com'),
(208619, 133221, 'KANTALE RAJ', '8711331122', 'raj208619@gmail.com'),
(208620, 123333, 'CHITYAL RAJESH', '8889442333', 'rajesh208620@gmail.com'),
(208621, 123389, 'CHOPADE SUSHANT', '8245655663', 'sushant208621@gmail.com'),
(208622, 132155, 'DAMLE ABHISHEK', '9982533457', 'abhishek208622@gmail.com'),
(208623, 123358, 'DAMUGADE RUPALI', '882555542', 'rupali208623'),
(208625, 133232, 'DESALE HARSHAL', '9870134444', 'harshal208625@gmail.com'),
(208626, 123377, 'DESHMUKH PRIYANKA', '8666632211', 'priyanka208626@gmail.com'),
(208627, 142322, 'DEVRUKAR YASH', '8766622552', 'yash208627@gmail.com'),
(208628, 145344, 'DHOTRE NIRMITI', '9922882352', 'nirmiti208628@gmail.com'),
(208629, 142554, 'DOLAS SAHIL', '9850131357', 'sahil208629@gmail.com'),
(208630, 145555, 'DUBEY POOJA', '9872253444', 'pooja208630@gmail.com'),
(208717, 123242, 'CHAUDARY MAHIMA', '8722456772', 'mahima208717@gmail.com'),
(208718, 123445, 'CHAUDARY ROSHAN', '7718931344', 'roshan208718@gmail.com');

--
-- Triggers `stud_table`
--
DROP TRIGGER IF EXISTS `student_delete_trigger`;
DELIMITER $$
CREATE TRIGGER `student_delete_trigger` AFTER DELETE ON `stud_table` FOR EACH ROW BEGIN

DELETE from projectsubmission.student where s_id NOT IN (SELECT s_id from stud_table);

DELETE from projectsubmission.project where s_id NOT IN (SELECT s_id from stud_table);
DELETE from projectsubmission.rejected_proj_table where s_id NOT IN (SELECT s_id from stud_table);
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `student_update_trigger`;
DELIMITER $$
CREATE TRIGGER `student_update_trigger` AFTER UPDATE ON `stud_table` FOR EACH ROW BEGIN
IF NEW.S_name <> OLD.S_name THEN
UPDATE projectsubmission.student set s_name=NEW.S_name where s_id=OLD.S_id;
END IF;
IF NEW.S_pn <> OLD.S_pn THEN
UPDATE projectsubmission.student set s_pn=NEW.S_pn where s_id=OLD.s_id;
END IF;
IF NEW.s_email <> OLD.s_email THEN
UPDATE projectsubmission.student set s_email=NEW.s_email where s_id=OLD.s_id;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `teac_table`
--

DROP TABLE IF EXISTS `teac_table`;
CREATE TABLE IF NOT EXISTS `teac_table` (
  `t_id` int(6) NOT NULL,
  `t_pin` int(6) NOT NULL,
  `t_name` varchar(30) NOT NULL,
  `t_mob` varchar(10) NOT NULL,
  `t_email` varchar(30) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teac_table`
--

INSERT INTO `teac_table` (`t_id`, `t_pin`, `t_name`, `t_mob`, `t_email`) VALUES
(208111, 151212, 'SHAH REENA', '8766621332', 'sanadsoman871@gmail.com'),
(208112, 152452, 'DEV SHYLASHREE', '9136214172', 'sanad20000305@gmail.com'),
(208113, 152667, 'ASSAR VAISHNAVI', '7718932356', 'vaishnavi208113@gmail.com'),
(208114, 152724, 'NAKUM BHUMIKA', '9869055554', 'bhumika208114@gmail.com'),
(208115, 152899, 'HARWALKAR PRATIKSHA', '7735288952', 'pratiksha208115@gmail.com'),
(208116, 152925, 'PATIL POOJA', '8438825333', 'pooja208116@gmail.com');

--
-- Triggers `teac_table`
--
DROP TRIGGER IF EXISTS `teacher_delete_trigger`;
DELIMITER $$
CREATE TRIGGER `teacher_delete_trigger` AFTER DELETE ON `teac_table` FOR EACH ROW BEGIN
DELETE from projectsubmission.teacher where t_id NOT IN (SELECT t_id from teac_table);
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `teacher_update_trigger`;
DELIMITER $$
CREATE TRIGGER `teacher_update_trigger` AFTER UPDATE ON `teac_table` FOR EACH ROW BEGIN
IF NEW.t_name <> OLD.t_name THEN
UPDATE projectsubmission.teacher set t_name=NEW.t_name where t_id=OLD.t_id;
END IF;
IF NEW.t_mob <> OLD.t_mob THEN
UPDATE projectsubmission.teacher set t_pn=NEW.t_mob where t_id=OLD.t_id;
END IF;
IF NEW.t_email <> OLD.t_email THEN
UPDATE projectsubmission.teacher set t_email=NEW.t_email where t_id=OLD.t_id;
END IF;
END
$$
DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
