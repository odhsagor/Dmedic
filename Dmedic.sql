-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 16, 2024 at 07:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Dmedic`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctorRegistrations`
--

CREATE TABLE `doctorRegistrations` (
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
-- Dumping data for table `doctorRegistrations`
--

INSERT INTO `doctorRegistrations` (`doctor_id`, `title`, `first_name`, `last_name`, `dob`, `gender`, `district`, `national_id`, `registration_number`, `doctor_type`, `mobile_number`, `email`, `password`, `approved`) VALUES
(3030, 'Prof.', 'ODH', 'SAGOR', '1997-05-27', 'male', 'Noakhali', '2001001', '2001001', 'Metabolism', '0123930129', 'obidulhuq@gmail.com', '$2y$10$s0jjHjYtS/6JevW50HCRR.WU36wDdr6B/x27/1OjDZtGz/uMI5rva', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctorSchedules`
--

CREATE TABLE `doctorSchedules` (
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
-- Dumping data for table `doctorSchedules`
--

INSERT INTO `doctorSchedules` (`doctorSchedulesId`, `doctor_id`, `days_of_week`, `from_date`, `to_date`, `start_time`, `end_time`, `consulting_time`, `fees`) VALUES
(501, 3030, 'sun,mon', '2024-07-16', '2024-07-23', '13:43:00', '17:43:00', 10, 1900.00),
(502, 3030, 'sun,mon,tue', '2024-07-16', '2024-07-23', '13:43:00', '17:43:00', 10, 1900.00);

-- --------------------------------------------------------

--
-- Table structure for table `patientRegistrations`
--

CREATE TABLE `patientRegistrations` (
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
-- Dumping data for table `patientRegistrations`
--

INSERT INTO `patientRegistrations` (`patient_id`, `first_name`, `last_name`, `house_number`, `road_number`, `area_name`, `dob`, `gender`, `email`, `contact_number`, `password`) VALUES
(202200, 'ODH', 'SAGOR', '293', '12', 'Bashundhara R/A', '2002-05-07', 'male', 'odhsagor@gmail.com', '01230303911', '$2y$10$ClEknm1xEuYZuWwabwP8/Obd4ap/2r9sIa9yKjcHNq7yaJfAFijHm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctorRegistrations`
--
ALTER TABLE `doctorRegistrations`
  ADD PRIMARY KEY (`doctor_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `doctorSchedules`
--
ALTER TABLE `doctorSchedules`
  ADD PRIMARY KEY (`doctorSchedulesId`),
  ADD KEY `fk_doctor_id` (`doctor_id`);

--
-- Indexes for table `patientRegistrations`
--
ALTER TABLE `patientRegistrations`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctorRegistrations`
--
ALTER TABLE `doctorRegistrations`
  MODIFY `doctor_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3031;

--
-- AUTO_INCREMENT for table `doctorSchedules`
--
ALTER TABLE `doctorSchedules`
  MODIFY `doctorSchedulesId` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;

--
-- AUTO_INCREMENT for table `patientRegistrations`
--
ALTER TABLE `patientRegistrations`
  MODIFY `patient_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202202;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctorSchedules`
--
ALTER TABLE `doctorSchedules`
  ADD CONSTRAINT `fk_doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctorRegistrations` (`doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
