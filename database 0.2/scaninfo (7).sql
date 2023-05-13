-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 12:03 AM
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
  `Deparment` varchar(100) NOT NULL,
  `veri_status` enum('verified','not') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrowers`
--

INSERT INTO `borrowers` (`id`, `id_num`, `sname`, `gname`, `mname`, `status`, `Deparment`, `veri_status`) VALUES
(31, '201811563', 'Felices', 'Paul Kenneth', 'Cabalu', 'Permanent', 'DCS', 'verified');

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
(1, 'CVSUQRprop2bbc19a', 'Laptop', '', 'dell', '2314141', 1, 'itim 14 inches ', 'temp/Qr104aa2859c464767d5ffd41d53a25be8.png'),
(2, 'CVSUQRprop8302779', 'Projector', '', 'mitsu', '31231', 1, 'kulay puti', 'temp/Qr58d149589f8047abf9246c50d9745298.png'),
(3, 'CVSUQRpropc896447', 'Pencil', '', 'MONGGOL 2', '', 5, 'PINK', 'temp/Qrd8776783c16f6a7eaf9750aaff93fe5e.png'),
(4, 'CVSUQRprop3f95d9e', 'Chalk', '', 'CHALK', '', 10, 'MAKULAY', 'temp/Qrb668d5cd1045cdbdb90dc3978d95a521.png'),
(5, 'CVSUQRpropeb0b197', 'Laptop', '', 'Asus', '123456', 1, 'blue laptop', 'temp/Qr8bca9359bee2ef5a4eb79d12000b00cb.png');

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

-- --------------------------------------------------------

--
-- Table structure for table `item_borrow`
--

CREATE TABLE `item_borrow` (
  `id` int(11) NOT NULL,
  `borrower_id_num` int(11) NOT NULL,
  `qr_id_cvsu` int(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `transaction` varchar(50) NOT NULL,
  `date_borrow` date NOT NULL,
  `status` enum('borrow','return') NOT NULL,
  `date_return` date NOT NULL,
  `date_return_item` date DEFAULT NULL,
  `qr_print` text NOT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_borrow`
--

INSERT INTO `item_borrow` (`id`, `borrower_id_num`, `qr_id_cvsu`, `quantity`, `transaction`, `date_borrow`, `status`, `date_return`, `date_return_item`, `qr_print`, `remarks`) VALUES
(3, 31, 3, 1, 'Trans960c4ce', '2023-05-13', 'borrow', '2023-05-15', NULL, 'trans/Qr2d02802f1b317a2992032843abb73a18.png', NULL),
(4, 31, 3, 1, 'Trans960c4ce', '2023-05-13', 'borrow', '2023-05-15', NULL, 'trans/Qr2d02802f1b317a2992032843abb73a18.png', NULL),
(5, 31, 3, 1, 'Trans960c4ce', '2023-05-13', 'borrow', '2023-05-15', NULL, 'trans/Qr2d02802f1b317a2992032843abb73a18.png', NULL),
(7, 31, 4, 1, 'Trans960c4ce', '2023-05-13', 'borrow', '2023-05-15', NULL, 'trans/Qr2d02802f1b317a2992032843abb73a18.png', NULL),
(8, 31, 4, 1, 'Trans960c4ce', '2023-05-13', 'borrow', '2023-05-15', NULL, 'trans/Qr2d02802f1b317a2992032843abb73a18.png', NULL),
(9, 31, 2, 1, 'Trans960c4ce', '2023-05-13', 'borrow', '2023-05-15', NULL, 'trans/Qr2d02802f1b317a2992032843abb73a18.png', NULL),
(10, 31, 1, 1, 'Trans960c4ce', '2023-05-13', 'borrow', '2023-05-15', NULL, 'trans/Qr2d02802f1b317a2992032843abb73a18.png', NULL),
(11, 31, 4, 1, 'Trans86189fe', '2023-05-13', 'borrow', '2023-05-15', NULL, 'trans/Qr1936d5e0be4508445363f5ac8a7ca2f4.png', NULL),
(12, 31, 4, 1, 'Trans86189fe', '2023-05-13', 'borrow', '2023-05-15', NULL, 'trans/Qr1936d5e0be4508445363f5ac8a7ca2f4.png', NULL),
(13, 31, 4, 1, 'Trans86189fe', '2023-05-13', 'borrow', '2023-05-15', NULL, 'trans/Qr1936d5e0be4508445363f5ac8a7ca2f4.png', NULL),
(14, 31, 4, 1, 'Trans86189fe', '2023-05-13', 'borrow', '2023-05-15', NULL, 'trans/Qr1936d5e0be4508445363f5ac8a7ca2f4.png', NULL),
(15, 31, 4, 1, 'Trans86189fe', '2023-05-13', 'borrow', '2023-05-15', NULL, 'trans/Qr1936d5e0be4508445363f5ac8a7ca2f4.png', NULL),
(16, 31, 4, 1, 'Trans86189fe', '2023-05-13', 'borrow', '2023-05-15', NULL, 'trans/Qr1936d5e0be4508445363f5ac8a7ca2f4.png', NULL),
(17, 31, 4, 1, 'Trans86189fe', '2023-05-13', 'borrow', '2023-05-15', NULL, 'trans/Qr1936d5e0be4508445363f5ac8a7ca2f4.png', NULL),
(18, 31, 4, 1, 'Trans86189fe', '2023-05-13', 'borrow', '2023-05-15', NULL, 'trans/Qr1936d5e0be4508445363f5ac8a7ca2f4.png', NULL);

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
-- Table structure for table `pin_default`
--

CREATE TABLE `pin_default` (
  `pin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pin_default`
--

INSERT INTO `pin_default` (`pin`) VALUES
('1234');

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
-- Indexes for table `item_borrow`
--
ALTER TABLE `item_borrow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `knowing_borrower` (`borrower_id_num`),
  ADD KEY `knowing_item` (`qr_id_cvsu`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
-- AUTO_INCREMENT for table `item_borrow`
--
ALTER TABLE `item_borrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
-- Constraints for table `item_borrow`
--
ALTER TABLE `item_borrow`
  ADD CONSTRAINT `knowing_borrower` FOREIGN KEY (`borrower_id_num`) REFERENCES `borrowers` (`id`),
  ADD CONSTRAINT `knowing_item` FOREIGN KEY (`qr_id_cvsu`) REFERENCES `cvsu_equipment` (`id`);

--
-- Constraints for table `unit_number`
--
ALTER TABLE `unit_number`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `gatepass` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
