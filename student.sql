-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2022 at 01:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `stud_reg`
--

CREATE TABLE `stud_reg` (
  `Roll_No` int(10) NOT NULL,
  `Name` varchar(25) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Contact_No` varchar(15) DEFAULT NULL,
  `image_name` varchar(255) NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud_reg`
--

INSERT INTO `stud_reg` (`Roll_No`, `Name`, `Email`, `Gender`, `DOB`, `Contact_No`, `image_name`, `Password`) VALUES
(2, 'Tejas', 'tejas@gmail.com', 'Male', '2022-12-13', '1234567890', 'Profile_572.jpg', '111'),
(1, 'Modh Chirag', 'modhchirag@gmail.com', 'Male', '2022-12-14', '9785643586', 'Profile_555.jpg', '123'),
(4, 'Vishal', 'vishal@gmail.com', 'Male', '2022-12-07', '1234567890', 'Profile_61.jpg', '112'),
(3, 'Tejas', 'tejas@gmail.com', 'Male', '2022-12-08', '56444686', 'Profile_700.jpg', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stud_reg`
--
ALTER TABLE `stud_reg`
  ADD PRIMARY KEY (`Roll_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stud_reg`
--
ALTER TABLE `stud_reg`
  MODIFY `Roll_No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
