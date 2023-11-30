-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 07:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toshiba_lucky_spin`
--

-- --------------------------------------------------------

--
-- Table structure for table `gift_of_day`
--

CREATE TABLE `gift_of_day` (
  `id_gift` int(11) NOT NULL,
  `gift1_daily` int(11) NOT NULL,
  `gift2_daily` int(11) NOT NULL,
  `gift3_daily` int(11) NOT NULL,
  `gift4_daily` int(11) NOT NULL,
  `gift5_daily` int(11) NOT NULL,
  `gift1_sat` int(11) NOT NULL,
  `gift2_sat` int(11) NOT NULL,
  `gift3_sat` int(11) NOT NULL,
  `gift4_sat` int(11) NOT NULL,
  `gift5_sat` int(11) NOT NULL,
  `gift1_quantity` int(11) NOT NULL DEFAULT 0,
  `gift2_quantity` int(11) NOT NULL DEFAULT 0,
  `gift3_quantity` int(11) NOT NULL DEFAULT 0,
  `gift4_quantity` int(11) NOT NULL DEFAULT 0,
  `gift5_quantity` int(11) NOT NULL DEFAULT 0,
  `gift1_status` int(11) NOT NULL,
  `gift2_status` int(11) NOT NULL,
  `gift3_status` int(11) NOT NULL,
  `gift4_status` int(11) NOT NULL,
  `gift5_status` int(11) NOT NULL,
  `gift1_used` int(11) DEFAULT 0,
  `gift2_used` int(11) DEFAULT 0,
  `gift3_used` int(11) DEFAULT 0,
  `gift4_used` int(11) DEFAULT 0,
  `gift5_used` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `gift_of_day`
--

INSERT INTO `gift_of_day` (`id_gift`, `gift1_daily`, `gift2_daily`, `gift3_daily`, `gift4_daily`, `gift5_daily`, `gift1_sat`, `gift2_sat`, `gift3_sat`, `gift4_sat`, `gift5_sat`, `gift1_quantity`, `gift2_quantity`, `gift3_quantity`, `gift4_quantity`, `gift5_quantity`, `gift1_status`, `gift2_status`, `gift3_status`, `gift4_status`, `gift5_status`, `gift1_used`, `gift2_used`, `gift3_used`, `gift4_used`, `gift5_used`) VALUES
(1, 1, 12, 12, 200, 300, 1, 14, 14, 200, 300, 8, 100, 100, 1600, 2400, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id_log` int(11) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_phone` varchar(11) NOT NULL,
  `cus_add` varchar(255) NOT NULL,
  `spin_quantity` int(11) DEFAULT NULL,
  `ticket_stamp` int(11) DEFAULT NULL,
  `ticket_seri` varchar(10) DEFAULT NULL,
  `time_create` varchar(255) NOT NULL,
  `id_ad` int(11) DEFAULT NULL,
  `time_confirm` varchar(10) DEFAULT NULL,
  `gift_1` int(11) DEFAULT 0,
  `gift_2` int(11) DEFAULT 0,
  `gift_3` int(11) DEFAULT 0,
  `gift_4` int(11) DEFAULT 0,
  `gift_5` int(11) DEFAULT 0,
  `logs_gift` varchar(255) DEFAULT '',
  `logs_state` varchar(10) NOT NULL,
  `tmp_gift1` int(11) DEFAULT 0,
  `tmp_gift2` int(11) DEFAULT 0,
  `tmp_gift3` int(11) DEFAULT 0,
  `tmp_gift4` int(11) DEFAULT 0,
  `tmp_gift5` int(11) DEFAULT 0,
  `channels` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user`, `pass`, `status`) VALUES
('admin', '4f52776a7046a405c43336aa42bfe1d8', 1),
('spadmin', '4f52776a7046a405c43336aa42bfe1d8', 1),
('VinhTruong', 'e10adc3949ba59abbe56e057f20f883e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gift_of_day`
--
ALTER TABLE `gift_of_day`
  ADD PRIMARY KEY (`id_gift`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id_log`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
