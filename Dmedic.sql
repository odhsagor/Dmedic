-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 28, 2024 at 07:16 PM
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
  `appointment_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `patient_id`, `doctor_id`, `first_name`, `last_name`, `email`, `phone`, `doctor_type`, `doctor_name`, `appointment_date`, `appointment_time`) VALUES
(114, 202200, 3030, 'ok', 'pk', 'ok@gmail.com', '0121992111', 'Metabolism', '3030', '2024-07-31', '09:00:00'),
(115, 202200, 3036, 'okkkkk', 'pkmss', 'osssk@gmail.com', '012199saw2w', 'heart surgeons', '3036', '2024-07-31', '17:00:00'),
(117, 202200, 3039, 'odh', 'sagormd', 'odhsagormd@gmail.com', '0182381221', 'cardiac geneticists', '3039', '2024-07-27', '11:30:00'),
(132, 202200, 3037, 'obidul', 'hhuq', 'obidulhuq@gmail.com', '01200012088', 'heart transplant specialists', '3037', '2024-07-30', '11:00:00'),
(134, 202200, 3031, 'md', 'anik', 'okanik@gmail.com', '109201292', 'Endocrinology', '3031', '2024-07-30', '11:00:00'),
(214, 202200, 3031, 'md', 'anik', 'okanik@gmail.com', '109201292', 'Endocrinology', '3031', '2024-07-30', '09:00:00'),
(215, 202200, 3040, 'Sumaiya', 'Khatun', 'sumaiyakhatun@gmail.com', '01239398411', 'fetal cardiologists', '3040', '2024-07-28', '18:00:00');

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
(3041, 'Prof. Dr.', 'MD', 'HASAN', '2024-02-12', 'male', 'Bandarban', '33311212', '1212121', 'Metabolism', '0121929109', 'mdhasan@gmail.com', '$2y$10$EgZXpCqQoGTMyQOk/DC8/eb3uK6R8l.L90JWdbIUJrnI8yYgQQryO', 1);

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
(202204, 'Nasokota', 'girl', '120', '5', 'Dhaka,', '2000-05-01', 'female', 'khatunsumaiya@gmail.com', '01972823728', '$2y$10$nT8LaEHD08meGj/4A7gN4.vvQxFEKh31W0wMtLvn7OnFYBt8vv8wW');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `doctorregistrations`
--
ALTER TABLE `doctorregistrations`
  MODIFY `doctor_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3042;

--
-- AUTO_INCREMENT for table `doctorSchedules`
--
ALTER TABLE `doctorSchedules`
  MODIFY `doctorSchedulesId` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patientregistrations`
--
ALTER TABLE `patientregistrations`
  MODIFY `patient_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202205;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
