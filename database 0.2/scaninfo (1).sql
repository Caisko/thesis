-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2023 at 11:04 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
(1, '201811568', '$2y$10$ZqI/vP79CeofjiIBfaqYbOv8ejpx.1/.RjJfzp9WMjtw56KTy9aDq', 'CRUZ', 'JUAN', 'DELA', 'imus', 'Male', '1997-03-18', '0909-345-2222', 'felicespaulkenneth@gmail.com', 'fblink', '6387b503821f30.28888400.jpg', '63b39b8d8425f1.46595363.png', 'Active', 'Unit Checker'),
(2, '201811567', '$2y$10$TWOeJUgLCsse3v6tKian0O31d7ZmFjL9IVf4TVVpTFn1qpZdS4xcq', 'CRUCILLO', 'ROBERTO', 'C', 'Imus Cavite', 'Male', '2022-12-02', '0909-345-2222', 'Austin@gmail.com', 'fblink', '6387b4c963a269.36090742.jpg', 'cru.png', 'Active', 'Priority 3'),
(3, '201811566', '$2y$10$GcLFjWoLsombhBIOeRBAVeStXME5uTkzX2aJbnMVdt/XoGYAsXuA6', 'VILLA', 'JOHN JOSEPH', 'C', 'Imus Cavite', 'Male', '2022-12-02', '0909-345-2222', 'jazz@gmail.com', 'fblink', '6387b487cc47f0.51871567.png', 'villa.png', 'Active', 'Priority 4'),
(4, '201811565', '$2y$10$0ehfTgEiTg.A0zEJOnMRM.Wthb4JUsLEx3G0U5VF760zft5.HOOZu', 'MOJICA', 'DR. MARLON', 'A', 'dasma', 'Male', '2022-12-02', '0909-345-2222', 'juan@gmail.com', 'fblink', '6387b423851aa7.50726487.jpg', 'mojica.png', 'Active', 'Priority 5'),
(6, '201811563', '$2y$10$2Fd3r5ALMbfr2940lNiTOeuo1oRHW.lyGpIcLldNVtpUhWgdLfWc2', 'Ocampo', 'Nelia', 'G', 'Imus Cavite', 'Female', '2022-12-02', '0909-345-2222', 'Nelia@gmail.com', 'FbLINK', '6387b36d7eafd7.97342775.png', 'ocampo.png', 'Active', 'Priority 2');

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

-- --------------------------------------------------------

--
-- Table structure for table `borrowers`
--

CREATE TABLE `borrowers` (
  `id` int(11) NOT NULL,
  `id_num` varchar(50) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `gname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `Deparment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrowers`
--

INSERT INTO `borrowers` (`id`, `id_num`, `sname`, `gname`, `mname`, `status`, `Deparment`) VALUES
(5, '1112', 'Felices', 'Paul Kenneth', 'C', 'Permanent', 'IT Department'),
(6, '3344', 'Malabanan', 'John Carlo', 'C', 'Permanent', 'IT DEPARTMENT'),
(7, '2131', 'Gonzales', 'Jazz Gibson', 'M', 'Temporary', 'CS Department'),
(8, '3344', 'Khen', 'Khen', 'Khen', 'Contractual of Service', 'Sa gate'),
(9, '3344', 'khen', '123', 'qw', 'Temporary', 'imus'),
(10, '123421', 'khen', 'khen', 'khen', 'Temporary', 'imus'),
(11, '9218390', 'imus', 'imus', 'imus', 'Permanent', 'it');

-- --------------------------------------------------------

--
-- Table structure for table `cvsu_equipment`
--

CREATE TABLE `cvsu_equipment` (
  `id` int(11) NOT NULL,
  `qr_id` varchar(50) NOT NULL,
  `equipment` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `item_name` text NOT NULL,
  `serial` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `qr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cvsu_equipment`
--

INSERT INTO `cvsu_equipment` (`id`, `qr_id`, `equipment`, `category`, `item_name`, `serial`, `quantity`, `description`, `qr`) VALUES
(1, 'CVSUQRpropb0a46f1', 'other', 'Computer', 'MSI PC', '231321312', 1, '', ''),
(2, 'CVSUQRprop22ca352', 'other', 'Electric Fan', 'Standard Fan', '', 10, 'lahat pula', ''),
(3, 'CVSUQRprop5d93622', 'other', 'Laptop', 'msic', '12333', 1, 'wew', ''),
(4, 'CVSUQRprop29be165', 'other', 'Projector', '1', '1', 1, '', ''),
(5, 'CVSUQRprop2e2b681', 'other', 'Pencil', 'Monggol', '', 10, 'sampu nito', 'temp/Qr02feb9b64ae85a0bd01b32fd20017b41.png');

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
(137, 'CVSUQRd4b02ef', 'Teacher', 'LONG TERM', '2211', 'ANABU', NULL, NULL, NULL, NULL, 'IMUS', '2023-04-15', '0000-00-00', '09213123112', 'temp/Qrd0f561b016531b745d305ea9b78cd0f1.png', '', 'transaction 1', 'pending', NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`id`, `category_name`) VALUES
(1, 'Laptop'),
(2, 'Projector'),
(3, 'Computer'),
(4, 'Electric Fan'),
(5, 'Chalk'),
(6, 'Pencil');

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
(132, '832178', 137, 1, 'KHEN');

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
-- Indexes for table `borrowers`
--
ALTER TABLE `borrowers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cvsu_equipment`
--
ALTER TABLE `cvsu_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gatepass`
--
ALTER TABLE `gatepass`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_admin_gatepass` (`fk_admins`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `allrecords`
--
ALTER TABLE `allrecords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `borrowers`
--
ALTER TABLE `borrowers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cvsu_equipment`
--
ALTER TABLE `cvsu_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gatepass`
--
ALTER TABLE `gatepass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `item_category`
--
ALTER TABLE `item_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `unit_number`
--
ALTER TABLE `unit_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

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
