-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 01, 2019 at 05:48 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s1471412`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `userID` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(18) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `privilege` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`userID`, `username`, `password`, `privilege`) VALUES
(4, 'JohnDoe', '$2y$10$QbAmykkftRe.nlj0fmLNRebqqIxTM8HoV7nzr1Gu1rEDlc0jFUYR6', 0),
(5, 'ClintEastwood', '$2y$10$ptz5XYddMCYutgo2oKUKh.ykzME3w8DaQKNTOq6DkQTQf4Wz6zhQm', 1),
(8, '566gggssf2v', '$2y$10$cnAmgxdSP4BPzCFuvb7wcuJdf6dVDKYmQBhnonXt6JHUOA9cglyqC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `departmentID` int(4) NOT NULL,
  `departmentName` varchar(30) NOT NULL,
  `workers` int(3) NOT NULL,
  PRIMARY KEY (`departmentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`departmentID`, `departmentName`, `workers`) VALUES
(1, 'Sales', 2),
(2, 'Administration', 2),
(3, 'Maintenance', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `employeeID` int(12) NOT NULL AUTO_INCREMENT,
  `departmentID_fk` int(4) NOT NULL,
  `jobTitle_fk` varchar(25) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `age` int(10) DEFAULT NULL,
  `hireDate` date NOT NULL,
  `birthDate` date DEFAULT NULL,
  PRIMARY KEY (`employeeID`),
  KEY `DepartmentID` (`departmentID_fk`),
  KEY `JobTitle` (`jobTitle_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employeeID`, `departmentID_fk`, `jobTitle_fk`, `firstName`, `lastName`, `age`, `hireDate`, `birthDate`) VALUES
(2, 3, 'Handyman', 'John', 'Smith', NULL, '1901-01-01', '0010-10-10'),
(3, 2, 'Accountant', 'Leroy', 'Brown', NULL, '2017-08-09', '1958-06-06'),
(4, 2, 'Accountant', 'Johnny', 'Walker', 5, '2018-12-31', '2000-01-01'),
(5, 1, 'Salesperson', 'Luke', 'Skywalker', NULL, '3000-07-07', NULL),
(6, 1, 'Salesperson', 'Han', 'Solo', NULL, '3001-06-06', NULL),
(9, 2, 'Accountant', 'bob', 'patterson', 0, '2019-04-01', NULL),
(10, 1, 'Salesperson', 'John', 'Jingleheimerschmidt', 100, '1999-12-31', '1111-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `productName` varchar(30) NOT NULL,
  `stockQty` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`productName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`productName`, `stockQty`, `price`) VALUES
('Cookie', 100, 0),
('Gizmo', 0, 50),
('Widget', 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobtitles`
--

DROP TABLE IF EXISTS `jobtitles`;
CREATE TABLE IF NOT EXISTS `jobtitles` (
  `jobTitle` varchar(25) NOT NULL,
  `departmentID_fk` int(4) NOT NULL,
  PRIMARY KEY (`jobTitle`),
  KEY `DepartmentID` (`departmentID_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobtitles`
--

INSERT INTO `jobtitles` (`jobTitle`, `departmentID_fk`) VALUES
('Salesperson', 1),
('Accountant', 2),
('Handyman', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `saleID` int(11) NOT NULL AUTO_INCREMENT,
  `employeeID_fk` int(11) NOT NULL,
  `productName_fk` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`saleID`),
  KEY `ProductName` (`productName_fk`),
  KEY `EmployeeID` (`employeeID_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`saleID`, `employeeID_fk`, `productName_fk`, `quantity`) VALUES
(1, 5, 'Gizmo', 5000),
(2, 6, 'Cookie', 2);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `color` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `color`) VALUES
(0, 'John', 'Blue'),
(1, 'two', '3'),
(2, 'two', '3'),
(4, 'John', ''),
(5, '', 'Purple'),
(6, 'Mark', 'Burgandy'),
(7, '7', '7'),
(8, 'sir', 'red'),
(9, 'null', 'null name is string');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`departmentID_fk`) REFERENCES `departments` (`departmentID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`jobTitle_fk`) REFERENCES `jobtitles` (`jobTitle`) ON UPDATE CASCADE;

--
-- Constraints for table `jobtitles`
--
ALTER TABLE `jobtitles`
  ADD CONSTRAINT `jobtitles_ibfk_1` FOREIGN KEY (`departmentID_fk`) REFERENCES `departments` (`departmentID`) ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`productName_fk`) REFERENCES `inventory` (`productName`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`employeeID_fk`) REFERENCES `employees` (`employeeID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
