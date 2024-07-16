-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2024 at 10:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dmedic`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctorregistrations`
--

CREATE TABLE `doctorregistrations` (
  `doctor_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `title` varchar(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `district` varchar(50) NOT NULL,
  `national_id` varchar(50) NOT NULL,
  `registration_number` varchar(50) NOT NULL,
  `doctor_type` varchar(50) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctorregistrations`
--

INSERT INTO `doctorregistrations` (`doctor_id`, `title`, `first_name`, `last_name`, `dob`, `gender`, `district`, `national_id`, `registration_number`, `doctor_type`, `mobile_number`, `email`, `password`, `approved`) VALUES
(3030, 'Prof.', 'ODH', 'SAGOR', '1997-05-27', 'male', 'Noakhali', '2001001', '2001001', 'Metabolism', '0123930129', 'obidulhuq@gmail.com', '$2y$10$s0jjHjYtS/6JevW50HCRR.WU36wDdr6B/x27/1OjDZtGz/uMI5rva', 1),
(3031, 'Dr', 'rakib', 'khan', '2002-01-23', 'male', 'Dhaka', '524785268268', '5498852', 'Endocrinology', '0168845754', 'dw@gmail.com', '$2y$10$K5cUVQpFK/dxT5up8z2CoeySj/4z7Tz0gPfGuucfAjIj5zQuKtni.', 1),
(3032, 'Prof', 'md', 'rifat', '1999-12-07', 'male', 'Chattogram', '15685356565', '458976', 'Endocrinology &amp; Metabolism', '01763663998', 'rifat@gmail.com', '$2y$10$QDBHbTD6/UtERZ8f71QGvOqkhgI/PmJGs4jybcjqUHlouy0UxJse2', 1),
(3033, 'Prof. Dr.', 'MD', 'Akash', '1996-01-03', 'male', 'Gopalganj', '4575315687565', '984569', 'cardiac imaging specialists', '0168974567', 'akash@gmailcom', '$2y$10$HwvoW7XyOCNE/BgR8xyZ9eRGzCXscn/f6l0dgpCgFQMjFKbcXgyiS', 1),
(3034, 'Dr', 'rohan', 'rahman', '1999-12-15', 'male', 'Cox\'s Bazar', '1578664896', '145796', 'fetal cardiologists', '0194676682', 'rohan@gmail.com', '$2y$10$/ZS2AG9I/F/TdxpssG4nmOimnJ0p8xChvsh98BqHVhyBWpT601txG', 1),
(3035, 'Prof', 'Mithila', 'khan', '2001-03-24', 'female', 'Chattogram', '2015664632', '126489', 'cardiac imaging specialists', '01648796645', 'mithila@gmail.com', '$2y$10$f94iCScIwtRuX5nTCgQD4.tjN/6wBBz1gC4xHqyCDJiN8sbQqGUxG', 1),
(3036, 'Prof. Dr.', 'sadia', 'khanam', '2000-12-05', 'female', 'Barguna', '1567898546', '1265489', 'heart surgeons', '0126547993', 'sadia@gmail.com', '$2y$10$s1zmYAP8acg76Tyj3BMi3.1c3Ad6xDX3RPHbhvWrzTCyOP4jsHVQa', 1),
(3037, 'Dr', 'Rabbi', 'Sharkar', '1996-07-19', 'male', 'Feni', '15497864', '12548963', 'heart transplant specialists', '0164798521', 'rabbi@gmailcom', '$2y$10$.T3gXO47CLSClrl/XMGmuOrrcqcNjwfgWlVPAomZBsAMu679IGE/6', 1),
(3038, 'Prof. Dr.', 'md', 'roman', '1998-09-12', 'male', 'Barisal', '126589978899', '124578', 'electrophysiologists', '01645789', 'roma@gmailcom', '$2y$10$fnzTKj5BbVaZrIfyJBXn5.VQukOJdQ.4V8drTb49d/S4MbMtkRTCW', 1),
(3039, 'Prof', 'md', 'rhaman', '1995-07-08', 'male', 'Bagerhat', '124578986532', '234598', 'cardiac geneticists', '0132456987', 'rhaman@gmail.com', '$2y$10$.2X3I0g/3qotRi7yu6dhzebsb68Kg77oN70gRgpgGpO8qX6QZTa8S', 1),
(3040, 'Prof. Dr.', 'Md', 'Pagla', '2004-12-04', 'male', 'Satkhira', '12654789655478', '1264789', 'fetal cardiologists', '0165478932', 'pagla@gmail.com', '$2y$10$ya1xEBpRCnwds.wyaInFqugdi5fY7FPPyMvUeojT9nCgpX0ZkqGuK', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctorschedules`
--

CREATE TABLE `doctorschedules` (
  `doctorSchedulesId` int(3) UNSIGNED ZEROFILL NOT NULL,
  `doctor_id` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `days_of_week` varchar(255) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `consulting_time` int(11) DEFAULT NULL,
  `fees` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctorschedules`
--

INSERT INTO `doctorschedules` (`doctorSchedulesId`, `doctor_id`, `days_of_week`, `from_date`, `to_date`, `start_time`, `end_time`, `consulting_time`, `fees`) VALUES
(501, 3030, 'sun,mon', '2024-07-16', '2024-07-23', '13:43:00', '17:43:00', 10, 1900.00),
(502, 3030, 'sun,mon,tue', '2024-07-16', '2024-07-23', '13:43:00', '17:43:00', 10, 1900.00);

-- --------------------------------------------------------

--
-- Table structure for table `patientregistrations`
--

CREATE TABLE `patientregistrations` (
  `patient_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `house_number` varchar(20) NOT NULL,
  `road_number` varchar(20) NOT NULL,
  `area_name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patientregistrations`
--

INSERT INTO `patientregistrations` (`patient_id`, `first_name`, `last_name`, `house_number`, `road_number`, `area_name`, `dob`, `gender`, `email`, `contact_number`, `password`) VALUES
(202200, 'ODH', 'SAGOR', '293', '12', 'Bashundhara R/A', '2002-05-07', 'male', 'odhsagor@gmail.com', '01230303911', '$2y$10$ClEknm1xEuYZuWwabwP8/Obd4ap/2r9sIa9yKjcHNq7yaJfAFijHm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctorregistrations`
--
ALTER TABLE `doctorregistrations`
  ADD PRIMARY KEY (`doctor_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `doctorschedules`
--
ALTER TABLE `doctorschedules`
  ADD PRIMARY KEY (`doctorSchedulesId`),
  ADD KEY `fk_doctor_id` (`doctor_id`);

--
-- Indexes for table `patientregistrations`
--
ALTER TABLE `patientregistrations`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctorregistrations`
--
ALTER TABLE `doctorregistrations`
  MODIFY `doctor_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3041;

--
-- AUTO_INCREMENT for table `doctorschedules`
--
ALTER TABLE `doctorschedules`
  MODIFY `doctorSchedulesId` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;

--
-- AUTO_INCREMENT for table `patientregistrations`
--
ALTER TABLE `patientregistrations`
  MODIFY `patient_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202202;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctorschedules`
--
ALTER TABLE `doctorschedules`
  ADD CONSTRAINT `fk_doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctorregistrations` (`doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
