-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 12, 2024 at 06:41 PM
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
  `id` int(6) NOT NULL,
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

INSERT INTO `doctorRegistrations` (`id`, `title`, `first_name`, `last_name`, `dob`, `gender`, `district`, `national_id`, `registration_number`, `doctor_type`, `mobile_number`, `email`, `password`, `approved`) VALUES
(1312304197, 'Prof. Dr.', 'MD. Obidul Huq ', 'Sagor', '2000-10-17', 'male', 'Dhaka', '23456784', '12345678', 'Endocrinology', '0123859504', 'mdobidulhuqsagor@gmail.com', '$2y$10$UnOisqyP7b59G4/8npd7CeNs6tp8eRQnZAWZTdyIk2CSVSwxVWPVm', 1),
(1312304198, 'Prof', 'odh', 'sagor', '1991-01-02', 'male', 'Bagerhat', '23940506', '12345676', 'Metabolism', '01929384754', 'odhsagor@gmail.com', '$2y$10$ATqfB27cjAZ1a6S.Hm/b5edCnxOpxCoIROySnIgXTmOxbtTiRDfsq', 1),
(1312304199, 'Prof. Dr.', 'obidulhuq', 'sagor', '1993-01-10', 'male', 'Bhola', '31322323', '23232323', 'Endocrinology &amp; Metabolism', '2233223233', 'obidulhuqsagor@gmail.com', '$2y$10$iq.EKgOYJiziZOdkq0Th6Ooks/w/rbTY64Q4k6b2heXrXvqdRRxte', 1),
(1312304200, 'Prof', 'Abdullah al ', 'Mamun', '2001-11-18', 'male', 'Bagerhat', '233232', '232323111', 'Endocrinology', '0132382300', 'abdullahalmamun@gmail.com', '$2y$10$a50aDkrUxYuLKhza4/sxZObRXHp2d.9We/wIgBS32mmtX.Xzx54iS', 1),
(1312304202, 'Prof. Dr.', 'A. H. M. ', 'ANIK', '2001-01-11', 'male', 'Bagerhat', '34443556', '345556', 'Endocrinology &amp; Metabolism', '01356778888', 'ahmanik@gmail.com', '$2y$10$XFMSJfte3bfPCcmR6ulp0eV..k1JCOfzLQNTjtuFBKP8IaWZcjNAe', 1),
(1312304203, 'Prof. Dr.', 'Rakib', 'Hossain', '2003-01-08', 'male', 'Bagerhat', '123131131', '232223132', 'Endocrinology', '021038223121', 'rakibhossain@gmail.com', '$2y$10$BX2dWOVKPc9RZZM3Fi6LF.wk.WPmT5kbrHb97FA8XAUQE0eFbaVAy', 1),
(1312304204, 'Prof', 'Nishat ', 'Anjuman', '2000-10-20', 'female', 'Noakhali', '27819191', '2224324', 'Metabolism', '0182929343', 'nishatanjuman@gmail.com', '$2y$10$ecR0ZcymaJ2.bKpIP4z4Oun7Edtzd45Fyka1zrmgI20BH4HH77Cs2', 0),
(1312304205, 'Prof. Dr.', 'AKIB', 'Hossain', '2001-06-22', 'male', 'Bagerhat', '13131331', '1313333', 'Endocrinology', '0191383930', 'akibhossain@gmail.com', '$2y$10$f2tJzfVHqIyyq3.Z.I3TtuCnToC61.sn8MjmhTc6C9fymdWo2aYnm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctorSchedules`
--

CREATE TABLE `doctorSchedules` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
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

INSERT INTO `doctorSchedules` (`id`, `doctor_id`, `days_of_week`, `from_date`, `to_date`, `start_time`, `end_time`, `consulting_time`, `fees`) VALUES
(7, 1312304198, 'sun,thu', '2024-07-10', '2024-07-20', '15:45:00', '23:45:00', 20, 1800.00),
(8, 1312304197, 'sun', '2024-07-07', '2024-07-23', '17:47:00', '21:47:00', 15, 1900.00),
(9, 1312304197, 'sun,sat', '2024-07-07', '2024-07-23', '17:47:00', '21:47:00', 15, 1900.00),
(10, 1312304199, 'sun,tue,thu', '2024-07-11', '2024-07-16', '17:20:00', '23:20:00', 20, 2000.00);

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
(100000, 'Rakib', 'Hasan', '123', '15', 'R/A', '2002-01-01', 'male', 'rakibhasan@gmail.com', '0131829101', '$2y$10$1UfRVGll.g8.iVlFtXxHm.09h2g/H1rS3JfZa115.FH9V7/MpltL6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctorRegistrations`
--
ALTER TABLE `doctorRegistrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorSchedules`
--
ALTER TABLE `doctorSchedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`);

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
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1312304206;

--
-- AUTO_INCREMENT for table `doctorSchedules`
--
ALTER TABLE `doctorSchedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patientRegistrations`
--
ALTER TABLE `patientRegistrations`
  MODIFY `patient_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100001;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctorSchedules`
--
ALTER TABLE `doctorSchedules`
  ADD CONSTRAINT `doctorschedules_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctorRegistrations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
