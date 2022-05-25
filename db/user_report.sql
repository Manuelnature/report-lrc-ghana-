-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 03:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_report`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cheque`
--

CREATE TABLE `tbl_cheque` (
  `id` int(11) NOT NULL,
  `bank` varchar(200) NOT NULL,
  `cheque_date` varchar(100) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `reference_number` varchar(100) NOT NULL,
  `cheque_number` varchar(100) NOT NULL,
  `purpose` mediumtext NOT NULL,
  `prepared_by` varchar(100) NOT NULL,
  `entered_by` varchar(100) NOT NULL,
  `reviewed_by` varchar(100) DEFAULT NULL,
  `approved_by` varchar(100) DEFAULT NULL,
  `date_entered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cheque`
--

INSERT INTO `tbl_cheque` (`id`, `bank`, `cheque_date`, `amount`, `reference_number`, `cheque_number`, `purpose`, `prepared_by`, `entered_by`, `reviewed_by`, `approved_by`, `date_entered`) VALUES
(2, 'ADB', '5467', '9087890', 'fees', '150000', '2022-03-28', 'Erama', 'Admin ', NULL, NULL, '2022-04-13 00:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payable`
--

CREATE TABLE `tbl_payable` (
  `id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `payable_type` varchar(100) NOT NULL,
  `transaction_type` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `comment` longtext DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL,
  `reference_number` varchar(100) DEFAULT NULL,
  `cheque_number` varchar(100) DEFAULT NULL,
  `purpose` mediumtext DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `prepared_by` varchar(100) DEFAULT NULL,
  `entered_by` varchar(100) DEFAULT NULL,
  `reviewed_by` varchar(100) DEFAULT NULL,
  `approved_by` varchar(100) DEFAULT NULL,
  `date_and_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payable_setups`
--

CREATE TABLE `tbl_payable_setups` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `type` varchar(255) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `department` varchar(100) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `first_name`, `last_name`, `email`, `password`, `department`, `date_registered`) VALUES
(1, 'Admin', '', 'admin@admin.com', 'Admin', 'Admin', '2022-04-07 22:10:49'),
(2, 'Manuel', 'Sussex', 'man@gmail.com', 'man24', 'Accounting', '2022-04-07 23:42:08'),
(6, 'David', 'Kattah', 'david.kattah@gmail.com', '123456', 'Finance', '2022-04-08 07:44:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cheque`
--
ALTER TABLE `tbl_cheque`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payable`
--
ALTER TABLE `tbl_payable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payable_setups`
--
ALTER TABLE `tbl_payable_setups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cheque`
--
ALTER TABLE `tbl_cheque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_payable`
--
ALTER TABLE `tbl_payable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_payable_setups`
--
ALTER TABLE `tbl_payable_setups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
