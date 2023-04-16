-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2023 at 02:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scaninfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `password_sec` text DEFAULT NULL,
  `surname` varchar(50) NOT NULL,
  `given_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `birthdate` date NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `link_fb` text NOT NULL,
  `profile_pic` text NOT NULL,
  `sign` text NOT NULL,
  `admin_status` enum('Inactive','Active') NOT NULL,
  `position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `id_number`, `password_sec`, `surname`, `given_name`, `middle_name`, `address`, `gender`, `birthdate`, `phone_number`, `email`, `link_fb`, `profile_pic`, `sign`, `admin_status`, `position`) VALUES
(1, '201811568', '$2y$10$ZqI/vP79CeofjiIBfaqYbOv8ejpx.1/.RjJfzp9WMjtw56KTy9aDq', 'CRUZ1', 'JUAN', 'DELA', 'imus', 'Male', '1997-03-18', '0909-345-2222', 'felicespaulkenneth@gmail.com', 'fblink', '6387b503821f30.28888400.jpg', '63b39b8d8425f1.46595363.png', 'Active', 'Unit Checker'),
(2, '201811567', '$2y$10$TWOeJUgLCsse3v6tKian0O31d7ZmFjL9IVf4TVVpTFn1qpZdS4xcq', 'CRUCILLO', 'ROBERTO', 'C', 'Imus Cavite', 'Male', '2022-12-02', '0909-345-2222', 'Austin@gmail.com', 'fblink', '6387b4c963a269.36090742.jpg', 'cru.png', 'Active', 'Priority 3'),
(3, '201811566', '$2y$10$GcLFjWoLsombhBIOeRBAVeStXME5uTkzX2aJbnMVdt/XoGYAsXuA6', 'VILLA', 'JOHN JOSEPH', 'C', 'Imus Cavite', 'Male', '2022-12-02', '0909-345-2222', 'jazz@gmail.com', 'fblink', '6387b487cc47f0.51871567.png', 'villa.png', 'Active', 'Priority 4'),
(4, '201811565', '$2y$10$0ehfTgEiTg.A0zEJOnMRM.Wthb4JUsLEx3G0U5VF760zft5.HOOZu', 'MOJICA', 'DR. MARLON', 'A', 'dasma', 'Male', '2022-12-02', '0909-345-2222', 'juan@gmail.com', 'fblink', '6387b423851aa7.50726487.jpg', 'mojica.png', 'Active', 'Priority 5'),
(6, '201811563', '$2y$10$2Fd3r5ALMbfr2940lNiTOeuo1oRHW.lyGpIcLldNVtpUhWgdLfWc2', 'Ocampo', 'Nelia', 'G', 'Imus Cavite', 'Female', '2022-12-02', '0909-345-2222', 'Nelia@gmail.com', 'FbLINK', '6387b36d7eafd7.97342775.png', 'ocampo.png', 'Active', 'Priority 2'),
(7, '123', '$2y$10$NWSA9/ioA7cebxye2ymjouh5Ws1Kt9xByXNsCsifa46bls/jEREIi', 'andal', 'mark lorens', 'b', 'imus', 'Male', '2023-01-05', '0909-345-2222', 'feliceskim@yahoo.com', 'fblink', '63b39b8d83c252.55094742.png', '63b39b8d8425f1.46595363.png', 'Active', 'Unit Checker'),
(8, '456', '$2y$10$HB4l8fuUZOQMGiEOzd.VtuFhRevXA2XdcST7WQAPoNPnFSVyitQJq', 'BAD', 'John Michael', 'MALA', '', 'Male', '0000-00-00', '', '', '', 'male.png', '', 'Inactive', 'Unit Checker');

-- --------------------------------------------------------

--
-- Table structure for table `allrecords`
--

CREATE TABLE `allrecords` (
  `id` int(11) NOT NULL,
  `gate_id` int(11) NOT NULL,
  `gatepass_id` varchar(50) NOT NULL,
  `gatepass_cat` enum('Student','Teacher','Owner') NOT NULL,
  `gate_cat_2` varchar(50) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `name_store` varchar(150) DEFAULT NULL,
  `course` varchar(50) DEFAULT NULL,
  `yr` enum('1','2','3','4','5','6') DEFAULT NULL,
  `section` varchar(10) DEFAULT NULL,
  `address` varchar(150) NOT NULL,
  `date_register` date NOT NULL,
  `valid_until` date DEFAULT NULL,
  `phone_number` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `qr` varchar(250) NOT NULL,
  `technical_name` text DEFAULT NULL,
  `in/out` enum('in','out') DEFAULT NULL,
  `fk_admins` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allrecords`
--

INSERT INTO `allrecords` (`id`, `gate_id`, `gatepass_id`, `gatepass_cat`, `gate_cat_2`, `id_number`, `name`, `name_store`, `course`, `yr`, `section`, `address`, `date_register`, `valid_until`, `phone_number`, `description`, `qr`, `technical_name`, `in/out`, `fk_admins`) VALUES
(16, 84, 'CVSUQRa7fe7f3', 'Student', 'VALID UNTIL', '2019230190', 'admin', '', 'bscs', '1', 'A', 'imus', '2023-01-02', '2023-12-31', '09203901', '123 laptop\r\n', 'temp/Qr9920b20baac7e25e3eedd23f4a856810.png', 'khen felices', 'in', 1),
(17, 85, 'CVSUQRb47c512', 'Student', 'VALID UNTIL', '20930107070', 'austin', '', 'bscs', '1', 'A', 'qweewqewqeq', '2023-01-02', '2023-12-31', '02930290', 'imus', 'temp/Qrfe72b4450c5d2721abbad91bca2e559b.png', '', 'in', 1),
(18, 87, 'CVSUQRff8847d', 'Student', 'VALID UNTIL', '20920381808', 'JAZZ GIBSON GONZALES', '', 'BSCS', '1', 'A', 'IMUS', '2023-01-03', '2023-12-31', 'O93218318', 'SPEAKER', 'temp/Qr947760c20befa71e6c35559ea21fa786.png', '', 'in', 1),
(19, 88, 'CVSUQR15318eb', 'Teacher', 'VALID UNTIL', '20188121', 'KHEN FELICES', '', '', '', '', 'Carsadang bago 1', '2023-01-08', '2023-01-10', '0955 555 5522', 'MOLTEN BALL', 'temp/Qr37021cde58d889dedef4072955945dfa.png', '', 'in', 1),
(20, 111, 'CVSUQRd85a541', 'Teacher', 'LONG TERM', '21321', 'Austin Mhar Miclat', '', '', '', '', 'qweewqewqeq', '2023-01-18', '0000-00-00', 'eqw', '', 'temp/Qr8f1e1fb8e28e19f2e61a87f8d3e37e13.png', '', 'in', 1),
(21, 112, 'CVSUQRa9dc7e2', 'Owner', 'VALID UNTIL', '3213', 'Fahline Capule', 'Fahline Capule', '', '', '', 'Carsadang bago 1', '2023-01-18', '2023-01-20', '0955 046 5871', '', 'temp/Qr56bed5408a6b990f3261f71a4aa91fa3.png', '', 'in', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gatepass`
--

CREATE TABLE `gatepass` (
  `id` int(11) NOT NULL,
  `gatepass_id` varchar(50) NOT NULL,
  `gatepass_cat` enum('Student','Teacher','Owner') NOT NULL,
  `gate_cat_2` varchar(50) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `name_store` varchar(150) DEFAULT NULL,
  `course` varchar(50) DEFAULT NULL,
  `yr` enum('1','2','3','4','5','6') DEFAULT NULL,
  `section` varchar(10) DEFAULT NULL,
  `address` varchar(150) NOT NULL,
  `date_register` date NOT NULL,
  `valid_until` date DEFAULT NULL,
  `phone_number` varchar(50) NOT NULL,
  `qr` varchar(250) NOT NULL,
  `technical_name` text DEFAULT NULL,
  `gatepass_status` varchar(100) DEFAULT NULL,
  `transaction` enum('approved','declined','pending') DEFAULT NULL,
  `in/out` enum('in','out') DEFAULT NULL,
  `comment` text NOT NULL,
  `fk_admins` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gatepass`
--

INSERT INTO `gatepass` (`id`, `gatepass_id`, `gatepass_cat`, `gate_cat_2`, `id_number`, `name`, `name_store`, `course`, `yr`, `section`, `address`, `date_register`, `valid_until`, `phone_number`, `qr`, `technical_name`, `gatepass_status`, `transaction`, `in/out`, `comment`, `fk_admins`) VALUES
(111, 'CVSUQRd85a541', 'Teacher', 'LONG TERM', '21321', 'Austin Mhar Miclat', NULL, NULL, NULL, NULL, 'qweewqewqeq', '2023-01-18', '0000-00-00', 'eqw', 'temp/Qr8f1e1fb8e28e19f2e61a87f8d3e37e13.png', '', 'transaction 5', 'approved', 'in', '', 1),
(112, 'CVSUQRa9dc7e2', 'Owner', 'VALID UNTIL', '3213', 'Fahline Capule', 'Fahline Capule', NULL, NULL, NULL, 'Carsadang bago 1', '2023-01-18', '2023-01-20', '0955 046 5871', 'temp/Qr56bed5408a6b990f3261f71a4aa91fa3.png', '', 'transaction 5', 'approved', 'in', '', 1),
(113, 'CVSUQReb436a9', 'Teacher', 'IN/OUT', '232131', 'Austin Mhar Miclat', NULL, NULL, NULL, NULL, 'qweewqewqeq', '2023-01-18', '0000-00-00', '0955 555 5522', 'temp/Qre34d6c285bb8a64dd5c03c0fa98dbd91.png', '', 'request', 'pending', NULL, '', 1),
(114, 'CVSUQRa41c05a', 'Teacher', 'VALID UNTIL', '231231', 'Fahline Capule', NULL, NULL, NULL, NULL, 'Carsadang bago 1', '2023-01-18', '2023-01-20', '0955 046 5871', 'temp/Qr0abc54ffcd29e17072b193a18be3a5b2.png', '', 'request', 'pending', NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit_number`
--

CREATE TABLE `unit_number` (
  `id` int(11) NOT NULL,
  `unit_num_serial` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_number`
--

INSERT INTO `unit_number` (`id`, `unit_num_serial`, `user_id`, `quantity`, `description`) VALUES
(98, '123', 111, 1, 'ewq'),
(100, '', 112, 20, 'PLASTIC BOTTLE'),
(101, '1232', 113, 2, 'khen'),
(102, 'skd12321', 114, 5, 'LOGITECH MOUSE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allrecords`
--
ALTER TABLE `allrecords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_admin_gatepass` (`fk_admins`);

--
-- Indexes for table `gatepass`
--
ALTER TABLE `gatepass`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_admin_gatepass` (`fk_admins`);

--
-- Indexes for table `unit_number`
--
ALTER TABLE `unit_number`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `allrecords`
--
ALTER TABLE `allrecords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `gatepass`
--
ALTER TABLE `gatepass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `unit_number`
--
ALTER TABLE `unit_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gatepass`
--
ALTER TABLE `gatepass`
  ADD CONSTRAINT `fk_admin_gatepass` FOREIGN KEY (`fk_admins`) REFERENCES `admins` (`id`);

--
-- Constraints for table `unit_number`
--
ALTER TABLE `unit_number`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `gatepass` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
