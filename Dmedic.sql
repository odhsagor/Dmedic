-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 25, 2024 at 10:08 PM
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
  `id` int(11) NOT NULL,
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
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctorRegistrations`
--

INSERT INTO `doctorRegistrations` (`id`, `title`, `first_name`, `last_name`, `dob`, `gender`, `district`, `national_id`, `registration_number`, `doctor_type`, `mobile_number`, `email`, `password`) VALUES
(1312304168, 'Dr', 'ODH', 'SAGOR', '2000-06-13', 'male', 'Noakhali', '12345678', '987654', 'Endocrinology', '01312304166', 'Odhsagor@gmail.com', '$2y$10$gXAd1Oa39KYhqe6xtHyMpe3giTU1NnQJKSKrXWWADmmxlC4iT9Ye.'),
(1312304170, 'Prof', 'Abullah Al', 'Mamun', '2002-02-06', 'male', 'Noakhali', '19447367', '648127', 'Metabolism', '0139134831', 'Abdullahalmamun@gmail.com', 'efwfwef'),
(1312304171, 'Prof. Dr.', 'Hasib', 'Mahmud', '1997-01-23', 'male', 'Barisal', '24324255', '244343', 'Endocrinology', '0182479242', 'Kibriya@gmail.com', '$2y$10$wjYkwZw4oTaHj6K9CzdPUuh9tLDZ0eyKysmOetNHFLPPhmvnhNkDi'),
(1312304172, 'Prof. Dr.', 'rakib', 'Mahmud', '1997-01-23', 'male', 'Barisal', '24324255', '244343', 'Endocrinology', '0182479242', 'Kibriya@gmail.com', '$2y$10$Q.LXq7qEYpR0t2Hx9fXd4./DgrCBsJWPlGb/B9Iqo.hpiaJDObzBO'),
(1312304173, 'Prof. Dr.', 'dfsdafas', 'sdgwaf', '2024-05-28', 'other', 'Bagerhat', '34123413', '2411234', 'Endocrinology & Metabolism', '124124123451', 'ewfwefew@gmail.com', '$2y$10$r2j0gHMNd0PsDjwxVp9jR.Xn6oBkc17Z3IlRaabDh6ewdxVc98dW2'),
(1312304174, 'Prof', 'Shanto ', 'Bhai', '2024-07-03', 'male', 'Patuakhali', '123173917', '141232', 'Endocrinology', '2141243124', 'hksfhdkas@gmail.com', '$2y$10$ZoRbGGQLggokX0wQe5dWbuylWlmHPJspQEKDascHySp1.BYSa6eou'),
(1312304175, 'Prof', 'Obidul Huq ', 'Sagor', '2024-06-06', 'male', 'Barisal', '30234284', '1424989', 'Endocrinology', '01343434234', 'obidulhuqsagor@gmail.com', '$2y$10$8zl/xOU5bjUXYdygZ3madO5mdgh2DJTq9xnB2AcJ6/rF37u5X0PfC'),
(1312304176, 'Prof', 'Rakib', 'Sheikh', '2024-06-24', 'male', 'Bhola', '22230481', '6824381', 'Metabolism', '0183219132', 'Rakib@gmail.com', '$2y$10$es.d/vcCIe2ilMRSNkVkf.LkXeLL22kl1YYzJ7ujsEmlXwdtyy68y'),
(1312304177, 'Dr', 'ewr', 'erew', '2024-05-29', 'male', 'Bagerhat', '1412331', '324134231', 'Endocrinology', '1324412431', 'df@gmail.com', '$2y$10$NV0ZI6.f6OZUJindcLsBCOIu3MshLboRaqtla42k35CRzVtxfYZqi'),
(1312304178, 'Prof', '32e', 'ewfq', '2024-06-13', 'female', 'Barguna', '33241234', '2341242', 'Endocrinology', '4222343324', 'df@gmail.com', '$2y$10$0GyD0n4smD3IFd.dv2yZYODGfOJMY3LZkLcV7SDGfmGV6UFk53Th6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctorRegistrations`
--
ALTER TABLE `doctorRegistrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctorRegistrations`
--
ALTER TABLE `doctorRegistrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1312304179;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
