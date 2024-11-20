-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2024 at 08:58 AM
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
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `patient_id` int(6) UNSIGNED ZEROFILL DEFAULT NULL,
  `doctor_id` int(4) UNSIGNED DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `doctor_type` varchar(50) DEFAULT NULL,
  `doctor_name` varchar(100) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` time DEFAULT NULL,
  `room_number` varchar(10) DEFAULT NULL,
  `fees` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `patient_id`, `doctor_id`, `first_name`, `last_name`, `email`, `phone`, `doctor_type`, `doctor_name`, `appointment_date`, `appointment_time`, `room_number`, `fees`) VALUES
(115, 202203, 3030, 'sumaiya', 'khatun', 'sumaiyakhatun@gmail.com', '01928273763', 'Metabolism', '3030', '2024-07-29', '10:00:00', '2010', 1900.00),
(116, 202203, 3030, 'begum', 'sanjida', 'sumaiyakhatun@gmail.com', '019283733212', 'Metabolism', '3030', '2024-07-30', '17:30:00', '2010', 1900.00),
(117, 202204, 3041, 'md', 'Sagor', 'mdsagor@gmail.com', '01301928848', 'Metabolism', '3041', '2024-07-29', '16:30:00', '1009', 1900.00),
(118, 202200, 3037, 'MD', 'Sagor', 'Mdsagor@gmail.com', '01312304166', 'heart transplant specialists', '3037', '2024-07-30', '17:00:00', '280', 900.00),
(119, 202205, 3036, 'A. H. M.', 'Imtiaj', 'ahmimtiaj@gmail.com', '01312304166', 'heart surgeons', '3036', '2024-07-30', '17:00:00', NULL, NULL),
(120, 202206, 3030, 'wwsws', 'wsws', 'wswswss@bjhjh.com', 'wswsws', 'Metabolism', '3030', '2024-07-31', '09:00:00', '2010', 1900.00),
(121, 202206, 3038, 'okk', 'okk', 'okk@gmail.com', '018210210210', 'electrophysiologists', '3038', '2024-08-01', '09:00:00', '201', 1900.00),
(122, 202206, 3038, 'Roman', 'ahmed', 'romanahmed@gmail.com', '018210219099', 'electrophysiologists', '3038', '2024-08-20', '17:00:00', '201', 1900.00),
(123, 202200, 3038, 'odh', 'sagor', 'odhsagor@gmail.com', '01903810929', 'electrophysiologists', '3038', '2024-08-02', '11:30:00', '201', 1900.00);

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
(3032, 'Prof', 'md', 'rifat', '1999-12-07', 'male', 'Chattogram', '15685356565', '458976', 'Endocrinology & Metabolism', '01763663998', 'rifat@gmail.com', '$2y$10$QDBHbTD6/UtERZ8f71QGvOqkhgI/PmJGs4jybcjqUHlouy0UxJse2', 1),
(3033, 'Prof. Dr.', 'MD', 'Akash', '1996-01-03', 'male', 'Gopalganj', '4575315687565', '984569', 'cardiac imaging specialists', '0168974567', 'akash@gmailcom', '$2y$10$HwvoW7XyOCNE/BgR8xyZ9eRGzCXscn/f6l0dgpCgFQMjFKbcXgyiS', 1),
(3034, 'Dr', 'rohan', 'rahman', '1999-12-15', 'male', 'Cox\'s Bazar', '1578664896', '145796', 'fetal cardiologists', '0194676682', 'rohan@gmail.com', '$2y$10$/ZS2AG9I/F/TdxpssG4nmOimnJ0p8xChvsh98BqHVhyBWpT601txG', 1),
(3035, 'Prof', 'Mithila', 'khan', '2001-03-24', 'female', 'Chattogram', '2015664632', '126489', 'cardiac imaging specialists', '01648796645', 'mithila@gmail.com', '$2y$10$f94iCScIwtRuX5nTCgQD4.tjN/6wBBz1gC4xHqyCDJiN8sbQqGUxG', 1),
(3036, 'Prof. Dr.', 'sadia', 'khanam', '2000-12-05', 'female', 'Barguna', '1567898546', '1265489', 'heart surgeons', '0126547993', 'sadia@gmail.com', '$2y$10$s1zmYAP8acg76Tyj3BMi3.1c3Ad6xDX3RPHbhvWrzTCyOP4jsHVQa', 1),
(3037, 'Dr', 'Rabbi', 'Sharkar', '1996-07-19', 'male', 'Feni', '15497864', '12548963', 'heart transplant specialists', '0164798521', 'rabbi@gmailcom', '$2y$10$.T3gXO47CLSClrl/XMGmuOrrcqcNjwfgWlVPAomZBsAMu679IGE/6', 1),
(3038, 'Prof. Dr.', 'md', 'roman', '1998-09-12', 'male', 'Barisal', '126589978899', '124578', 'electrophysiologists', '01645789', 'roma@gmailcom', '$2y$10$fnzTKj5BbVaZrIfyJBXn5.VQukOJdQ.4V8drTb49d/S4MbMtkRTCW', 1),
(3039, 'Prof', 'md', 'rhaman', '1995-07-08', 'male', 'Bagerhat', '124578986532', '234598', 'cardiac geneticists', '0132456987', 'rhaman@gmail.com', '$2y$10$.2X3I0g/3qotRi7yu6dhzebsb68Kg77oN70gRgpgGpO8qX6QZTa8S', 1),
(3040, 'Prof. Dr.', 'Md', 'Pagla', '2004-12-04', 'male', 'Satkhira', '12654789655478', '1264789', 'fetal cardiologists', '0165478932', 'pagla@gmail.com', '$2y$10$ya1xEBpRCnwds.wyaInFqugdi5fY7FPPyMvUeojT9nCgpX0ZkqGuK', 1),
(3041, 'Prof. Dr.', 'MD', 'HASAN', '2024-02-12', 'male', 'Bandarban', '33311212', '1212121', 'Metabolism', '0121929109', 'mdhasan@gmail.com', '$2y$10$EgZXpCqQoGTMyQOk/DC8/eb3uK6R8l.L90JWdbIUJrnI8yYgQQryO', 1),
(3042, 'Prof. Dr.', 'Ashan', 'Ullah', '1991-05-07', 'male', 'Lakshmipur', '290309938', '98188891', 'heart surgeons', '0198200102', 'ashanullah@gmail.com', '$2y$10$tRu0Wuigj5g2aMmJF75Etuadc0FLfKrs3Yej8PMCSko.k8Uj5fWSy', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctorSchedules`
--

CREATE TABLE `doctorSchedules` (
  `doctorSchedulesId` int(3) UNSIGNED ZEROFILL NOT NULL,
  `doctor_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `room_number` varchar(50) NOT NULL,
  `fees` decimal(10,2) DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctorSchedules`
--

INSERT INTO `doctorSchedules` (`doctorSchedulesId`, `doctor_id`, `date`, `start_time`, `end_time`, `room_number`, `fees`, `created_at`, `updated_at`) VALUES
(001, 3030, '2024-07-18', '16:00:00', '23:00:00', '2010', 1900.00, '2024-07-17 19:29:40', '2024-07-17 19:29:40'),
(002, 3030, '2024-07-19', '16:00:00', '22:00:00', '2010', 1900.00, '2024-07-17 19:31:07', '2024-07-17 19:31:07'),
(003, 3031, '2024-07-18', '16:00:00', '22:00:00', '3010', 1600.00, '2024-07-17 19:32:05', '2024-07-17 19:32:05'),
(004, 3032, '2024-07-19', '16:00:00', '23:00:00', '2911', 2000.00, '2024-07-17 19:32:58', '2024-07-17 19:32:58'),
(005, 3033, '2024-07-18', '17:00:00', '21:00:00', '1010', 700.00, '2024-07-17 19:33:42', '2024-07-17 19:33:42'),
(006, 3037, '2024-07-20', '10:00:00', '00:00:00', '280', 900.00, '2024-07-17 19:34:41', '2024-07-17 19:34:41'),
(007, 3038, '2024-07-22', '11:00:00', '21:00:00', '201', 1900.00, '2024-07-17 19:35:24', '2024-07-17 19:35:24'),
(008, 3039, '2024-07-22', '10:00:00', '23:00:00', '301', 1000.00, '2024-07-17 19:35:58', '2024-07-17 19:35:58'),
(009, 3041, '2024-07-26', '22:52:00', '09:52:00', '1009', 1900.00, '2024-07-25 15:52:36', '2024-07-25 15:52:36');

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
(202200, 'ODH', 'SAGOR', '293', '12', 'Bashundhara R/A', '2002-05-07', 'male', 'odhsagor@gmail.com', '01230303911', '$2y$10$ClEknm1xEuYZuWwabwP8/Obd4ap/2r9sIa9yKjcHNq7yaJfAFijHm'),
(202202, 'Rakib', 'Hasan', '201', '12', 'Dhaka', '1998-07-18', 'male', 'rakibhasan@gmail.com', '0192838212', '$2y$10$4g04.xA9td5UHiHX8l9erOnzYSEhkoJBJUOPeaDEIVWxEK0HL1eeO'),
(202203, 'sumaiya ', 'khatun', '120', '5', 'Dhaka', '2000-05-01', 'female', 'sumaiyakhatun@gmail.com', '01572823801', '$2y$10$zlnSPE..aEPlR10K2DIA/ueFAKSATMIU96f2wMSNgK6T7q3jMCsTW'),
(202204, 'Nasokota', 'girl', '120', '5', 'Dhaka,', '2000-05-01', 'female', 'khatunsumaiya@gmail.com', '01972823728', '$2y$10$nT8LaEHD08meGj/4A7gN4.vvQxFEKh31W0wMtLvn7OnFYBt8vv8wW'),
(202205, 'A. H. M. ', 'Imtiaj', '111(A)', '1', 'Noakhali', '2005-01-28', 'male', 'ahmimtiaj@gmail.com', '0131929101', '$2y$10$SeTn7wye/59wlAl2m6pTu.K/UjICbcb9szBOTR96l2rZ0S9ziOjb.'),
(202206, 'Imtiaj', 'Anik', '391', '15', 'Boshundhara', '2000-11-30', 'male', 'anik@gamil.com', '01775989897', '$2y$10$H37oyV6MdAp3VVEaovRkgOTKW4wz2vX9.uQxGboYV8FLK7HIF.Xoq');

-- --------------------------------------------------------

--
-- Table structure for table `patient_health_data`
--

CREATE TABLE `patient_health_data` (
  `id` int(11) NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `blood_glucose` decimal(5,2) NOT NULL,
  `insulin_dosage` varchar(255) NOT NULL,
  `medication_intake` enum('Yes','No') NOT NULL,
  `dietary_intake` enum('Yes','No') NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `symptoms` varchar(255) NOT NULL,
  `bmi` decimal(4,2) NOT NULL,
  `blood_pressure` varchar(20) NOT NULL,
  `heart_rate` int(11) NOT NULL,
  `sleep_duration` decimal(4,2) NOT NULL,
  `water_intake` decimal(4,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_health_data`
--

INSERT INTO `patient_health_data` (`id`, `patient_id`, `blood_glucose`, `insulin_dosage`, `medication_intake`, `dietary_intake`, `weight`, `symptoms`, `bmi`, `blood_pressure`, `heart_rate`, `sleep_duration`, `water_intake`, `created_at`) VALUES
(1, 202200, 11.00, '11', 'Yes', 'Yes', 11.00, 'জ্বর', 23.00, '11', 22, 9.00, 8.00, '2024-11-19 10:00:20'),
(2, 202200, 11.00, '11', 'Yes', 'Yes', 11.00, 'জ্বর', 23.00, '11', 22, 9.00, 9.00, '2024-11-19 15:47:12'),
(3, 202200, 9.00, '11', 'Yes', 'Yes', 11.00, 'জ্বর', 23.00, '11', 22, 9.00, 9.00, '2024-11-19 16:17:25'),
(4, 202200, 9.00, '11', 'Yes', 'Yes', 11.00, 'জ্বর', 23.00, '11', 22, 9.00, 9.00, '2024-11-19 16:23:04'),
(5, 202200, 9.00, '11', 'Yes', 'Yes', 11.00, 'জ্বর', 23.00, '11', 22, 9.00, 9.00, '2024-11-19 16:23:22'),
(6, 202200, 9.00, '11', 'Yes', 'Yes', 11.00, 'জ্বর', 23.00, '11', 22, 9.00, 9.00, '2024-11-19 16:23:29'),
(7, 202200, 9.00, '11', 'Yes', 'Yes', 11.00, 'জ্বর', 23.00, '11', 22, 9.00, 9.00, '2024-11-19 16:24:24'),
(8, 202200, 9.00, '11', 'Yes', 'Yes', 11.00, 'জ্বর', 23.00, '11', 22, 9.00, 9.00, '2024-11-19 16:33:13'),
(9, 202200, 9.00, '11', 'Yes', 'Yes', 11.00, 'জ্বর', 9.00, '11', 22, 9.00, 9.00, '2024-11-20 07:53:22');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `prescription_id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `appointment_id` int(3) UNSIGNED ZEROFILL DEFAULT NULL,
  `doctor_id` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `patient_id` int(6) UNSIGNED DEFAULT NULL,
  `doctor_name` varchar(255) DEFAULT NULL,
  `doctor_type` varchar(50) DEFAULT NULL,
  `patient_name` varchar(255) DEFAULT NULL,
  `prescription_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`prescription_id`, `appointment_id`, `doctor_id`, `patient_id`, `doctor_name`, `doctor_type`, `patient_name`, `prescription_text`, `created_at`) VALUES
(44, 117, 3041, 202204, 'MD HASAN', 'Metabolism', 'md Sagor', 'oksjsjs', '2024-07-29 11:30:24'),
(45, 117, 3041, 202204, 'MD HASAN', 'Metabolism', 'md Sagor', 'AKAJA', '2024-07-29 11:30:34'),
(46, 117, 3041, 202204, 'MD HASAN', 'Metabolism', 'md Sagor', 'Napa 500 mg\r\n1+1+1\r\nDocopa 250 mg\r\n1+1+0', '2024-07-29 12:05:15'),
(47, 118, 3037, 202200, 'Rabbi Sharkar', 'heart transplant specialists', 'MD Sagor', 'Napa 500 mg 1+1+1\r\nTitinas 50 mg 0+0+1', '2024-07-29 13:20:57'),
(48, 119, 3036, 202205, 'sadia khanam', 'heart surgeons', 'A. H. M. Imtiaj', 'Flexi 200 mg\r\n1+1+1\r\nVirux Tablet 400 mg\r\n1+1+1', '2024-07-30 16:01:54'),
(49, 120, 3030, 202206, 'ODH SAGOR', 'Metabolism', 'ANIK', 'Napa kahio sthe ek glass pani.', '2024-07-31 17:11:06'),
(50, 115, 3030, 202203, 'ODH SAGOR', 'Metabolism', 'sumaiya khatun', 'Take sleep 8 Hours. and walk\r\n', '2024-07-31 18:05:24'),
(51, 115, 3030, 202203, 'ODH SAGOR', 'Metabolism', 'sumaiya khatun', 'ok', '2024-07-31 18:07:07'),
(52, 116, 3030, 202203, 'ODH SAGOR', 'Metabolism', 'begum sanjida', 'ookkk', '2024-07-31 18:07:44'),
(53, 121, 3038, 202206, 'md roman', 'electrophysiologists', 'okk okk', 'ok\r\n', '2024-07-31 18:10:06'),
(54, 122, 3038, 202206, 'md roman', 'electrophysiologists', 'Roman ahmed', 'go and sleep', '2024-07-31 18:18:39'),
(55, 123, 3038, 202200, 'md roman', 'electrophysiologists', 'odh sagor', 'ok', '2024-07-31 18:24:48'),
(56, 121, 3038, 202206, 'md roman', 'electrophysiologists', 'okk okk', 'ok', '2024-07-31 18:27:55'),
(57, 122, 3038, 202206, 'md roman', 'electrophysiologists', 'Roman ahmed', 'sleep', '2024-07-31 18:28:03'),
(58, 121, 3038, 202206, 'md roman', 'electrophysiologists', 'okk okk', 'bd jindabhad', '2024-07-31 18:46:53'),
(59, 121, 3038, 202206, 'md roman', 'electrophysiologists', 'okk okk', 'ok', '2024-07-31 18:46:53'),
(61, 123, 3038, 202200, 'md roman', 'electrophysiologists', 'odh sagor', 'everytime', '2024-07-31 18:48:05'),
(62, 123, 3038, 202200, 'md roman', 'electrophysiologists', 'odh sagor', 'everytime', '2024-07-31 18:48:29'),
(63, 121, 3038, 202206, 'md roman', 'electrophysiologists', 'okk okk', 'ok', '2024-07-31 18:50:26'),
(64, 122, 3038, 202206, 'md roman', 'electrophysiologists', 'Roman ahmed', 'ok', '2024-07-31 19:07:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `fk_appointments_patient_id` (`patient_id`),
  ADD KEY `fk_appointments_doctor_id` (`doctor_id`);

--
-- Indexes for table `doctorregistrations`
--
ALTER TABLE `doctorregistrations`
  ADD PRIMARY KEY (`doctor_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `doctorSchedules`
--
ALTER TABLE `doctorSchedules`
  ADD PRIMARY KEY (`doctorSchedulesId`),
  ADD KEY `fk_doctor_id` (`doctor_id`);

--
-- Indexes for table `patientregistrations`
--
ALTER TABLE `patientregistrations`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `patient_health_data`
--
ALTER TABLE `patient_health_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`prescription_id`),
  ADD KEY `fk_prescriptions_appointment_id` (`appointment_id`),
  ADD KEY `fk_prescriptions_doctor_id` (`doctor_id`),
  ADD KEY `fk_prescriptions_patient_id` (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `doctorregistrations`
--
ALTER TABLE `doctorregistrations`
  MODIFY `doctor_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3043;

--
-- AUTO_INCREMENT for table `doctorSchedules`
--
ALTER TABLE `doctorSchedules`
  MODIFY `doctorSchedulesId` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patientregistrations`
--
ALTER TABLE `patientregistrations`
  MODIFY `patient_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202207;

--
-- AUTO_INCREMENT for table `patient_health_data`
--
ALTER TABLE `patient_health_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `prescription_id` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `fk_appointments_doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctorRegistrations` (`doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_appointments_patient_id` FOREIGN KEY (`patient_id`) REFERENCES `patientRegistrations` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctorSchedules`
--
ALTER TABLE `doctorSchedules`
  ADD CONSTRAINT `fk_doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctorregistrations` (`doctor_id`);

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `fk_prescriptions_appointment_id` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`appointment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prescriptions_doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctorRegistrations` (`doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prescriptions_patient_id` FOREIGN KEY (`patient_id`) REFERENCES `patientRegistrations` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
