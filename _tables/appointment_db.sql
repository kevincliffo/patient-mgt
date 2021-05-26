-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 03:13 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `AppointmentId` int(11) NOT NULL,
  `PatientId` int(11) NOT NULL,
  `Symptoms` text NOT NULL,
  `AppointmentDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`AppointmentId`, `PatientId`, `Symptoms`, `AppointmentDate`) VALUES
(1, 1, 'Headache with slight fever.', '2021-05-24 00:00:00'),
(2, 1, 'Running Nose', '2021-05-24 16:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `clinics`
--

CREATE TABLE `clinics` (
  `ClinicId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Manager` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `PhoneNumber` varchar(255) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinics`
--

INSERT INTO `clinics` (`ClinicId`, `Name`, `Manager`, `Location`, `PhoneNumber`, `CreatedDate`) VALUES
(1, 'Badria', 'Amina Achieng', 'Kongowea Karama', '0781761145', '2021-05-24 17:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `consultants`
--

CREATE TABLE `consultants` (
  `ConsultantId` int(11) NOT NULL,
  `ConsultantName` varchar(255) NOT NULL,
  `PracticeNumber` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Field` varchar(255) NOT NULL,
  `MobileNumber` varchar(255) DEFAULT NULL,
  `AddedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultants`
--

INSERT INTO `consultants` (`ConsultantId`, `ConsultantName`, `PracticeNumber`, `Email`, `Field`, `MobileNumber`, `AddedDate`) VALUES
(1, 'Kevin Angura', 'PR/021/2021/0000067', 'kangura@gmail.com', 'ophthalmologist ', '0711541134', '2021-05-24 14:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `PatientId` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `IDNumber` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `PatientType` varchar(50) NOT NULL,
  `DOB` datetime NOT NULL DEFAULT current_timestamp(),
  `Email` varchar(50) DEFAULT NULL,
  `MobileNo` varchar(50) DEFAULT NULL,
  `PatientImage` varchar(255) DEFAULT NULL,
  `UnderlyingCondition` text NOT NULL,
  `Address` text NOT NULL,
  `Location` text NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`PatientId`, `FirstName`, `LastName`, `IDNumber`, `Gender`, `PatientType`, `DOB`, `Email`, `MobileNo`, `PatientImage`, `UnderlyingCondition`, `Address`, `Location`, `CreatedDate`) VALUES
(1, 'Anne', 'Njeri', '34332312', 'Female', 'Adult', '1997-05-14 00:00:00', 'anne.njeri@yahoo.com', '0724113456', 'products3.jpg', '', '', '', '2021-05-24 15:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `UserType` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `ProfileImage` varchar(255) NOT NULL,
  `IDNumber` varchar(50) NOT NULL,
  `MobileNo` varchar(50) NOT NULL,
  `LastLogin` datetime NOT NULL DEFAULT current_timestamp(),
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `UserName`, `FirstName`, `LastName`, `UserType`, `Email`, `Password`, `ProfileImage`, `IDNumber`, `MobileNo`, `LastLogin`, `CreatedDate`) VALUES
(1, 'admin', 'Admin', 'Admin', 'Admin', 'admin@yahoo.com', 'ff53475470d2d7ee6e4f1dd41e717452', 'user.jpg', '00000000', '0700000000', '2021-05-25 11:03:23', '2021-05-19 14:57:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`AppointmentId`);

--
-- Indexes for table `clinics`
--
ALTER TABLE `clinics`
  ADD PRIMARY KEY (`ClinicId`);

--
-- Indexes for table `consultants`
--
ALTER TABLE `consultants`
  ADD PRIMARY KEY (`ConsultantId`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`PatientId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `AppointmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clinics`
--
ALTER TABLE `clinics`
  MODIFY `ClinicId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `consultants`
--
ALTER TABLE `consultants`
  MODIFY `ConsultantId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `PatientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
