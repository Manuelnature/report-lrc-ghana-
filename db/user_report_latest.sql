-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 02:38 AM
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
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `date_entered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banks`
--

CREATE TABLE `tbl_banks` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_banks`
--

INSERT INTO `tbl_banks` (`bank_id`, `bank_name`) VALUES
(1, 'Ghana Commercial Bank'),
(2, 'Agriculture Development Bank'),
(3, 'Prudential Bank'),
(4, 'Absa Bank');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank_branches`
--

CREATE TABLE `tbl_bank_branches` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `branch_address` mediumtext DEFAULT NULL,
  `bank_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bank_branches`
--

INSERT INTO `tbl_bank_branches` (`branch_id`, `branch_name`, `branch_address`, `bank_id`) VALUES
(1, 'HIGH STREET', 'Accra Highstreet Branch\r\nP O Box 2971, Accra\r\n0302662337', 1),
(2, 'ABELENKPE', 'PMB, ACHIMOTA SCHOOL, ACCRA\r\n\r\n+233(0)30 2769142/ 030 2769135, 0540 319 854 FAX: +233(0)30 2769137\r\n\r\nabelenkpemgr@gcb.com.gh', 1),
(3, 'Abeka-Lapaz', 'Off George Walker Bush N1 Highway, Near the Amakye Dede Spot\r\n\r\nGPS: GA-428-0862\r\n\r\nTel: 0307010373', 2),
(4, 'Accra New Town', 'Newtown Road, Next to Advans Savings & loans Ltd\r\n\r\nGPS: GA-069-3525', 2),
(5, 'Tema Harbour', ' Off Krakue Road, Near Ghana Telecom Reg. Office', 3),
(6, 'Spintex', 'JVRP+X2R, Accra', 3),
(7, 'ACCRA NEW TOWN', 'P. O. BOX NT 96, ACCRA NEW TOWN\r\n\r\nMGR: +233(0)302 236935, OFFICE: +233(0)302 222641', 1),
(8, 'BURMA CAMP', 'P. O. BOX BC 268, BURMA CAMP, ACCRA\r\n+233(0)30 2784182, 030 2782668', 1),
(9, 'LABONE', '0577690962 / 0577690963 \r\nlabonemgr@gcb.com.gh', 1),
(10, 'DANSOMAN', 'PMB 17, DANSOMAN ESTATES +233(0)30 2301410 ', 1),
(11, 'KANTAMANTO', 'P. O. BOX CT1778  \r\n+233(0)30 2909201 / 030 2909432', 1),
(12, 'ADABRAKA', '+233(0)30 2908000/ 1-2 \r\nadabrakamgr@gcb.com.gh', 1),
(13, 'ABOSSEY OKAI', 'Ayikai Street, Accra, Ghana.', 1),
(14, 'OKAISHIE', 'PMB 17, 11a Kimberly Ave, Accra, Ghana.', 1),
(15, 'DZORWULU ', 'Nii Nortey Nyandi Street, Accra', 1),
(16, 'DOME', '65 Dome Road, Accra, Ghana.', 1),
(17, 'KWAME NKRUMAH CIRCLE', 'GCB Tower, Kwame Nkrumah Ave, Accra, Ghana.', 1),
(18, 'KANESHIE INDUSTRIAL', '5 Feo Eyeo Rd, Accra, Ghana. ', 1),
(19, 'ADB House Branch', 'Independence Avenue before Vanguard Assurance Limited\r\nTel: 030-2785473 / 030-2783730\r\nFax: 030-2785473 / 030-2783730', 2),
(20, 'Achimota', 'Near Neoplan Assembly Plant on the Achimota  Nsawam road\r\nGPS Address: GA-249-1678\r\nTel: 0307002070/0593804186', 2),
(21, 'Burma Camp ATM', 'Burma Camp Cathedral', 2),
(22, 'Dansoman', 'Near Dansoman Round-About, Off Dansoman High Street Tel: 0302312415 and 0302312414 GPS Address:GA 537-1721', 2),
(23, 'Dansoman', 'Near Dansoman Round-About, Off Dansoman High Street Tel: 0302312415 and 0302312414 GPS Address:GA 537-1721', 2),
(24, 'Gulf House', 'Main Gulf House Building on the Tetteh Quarshie – Legon Road.\r\nTel: 030 2506201 / 030 2506202 / 030 2506203\r\nFax: 030 2506201 / 030 2506202 / 030 2506203', 2),
(25, 'Kaneshie', 'Near Kaneshie Market, Off the Winneba Road\r\nTel: 030-2688 399/030-2688411 / 030-2688412 / 030-2688413 / 030-2688414', 2),
(26, 'Weija', 'Near SCC Junction before the new Shoprite on the Mallam- Kasoa Road\r\nTel: 0302853081 / 0302853083 / 030-2850428 / 030-2850429', 2);

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payable`
--

CREATE TABLE `tbl_payable` (
  `id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `payable_type` varchar(100) NOT NULL,
  `transaction_type` varchar(100) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `payment_type` varchar(200) DEFAULT NULL,
  `project` varchar(200) DEFAULT NULL,
  `prepaid_receipt_number` varchar(100) DEFAULT NULL,
  `prepaid_receipt_amount` varchar(100) DEFAULT NULL,
  `amount` varchar(100) NOT NULL,
  `comment` longtext DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL,
  `reference_number` varchar(100) DEFAULT NULL,
  `cheque_number` varchar(100) DEFAULT NULL,
  `account_name_and_number` varchar(255) DEFAULT NULL,
  `purpose` mediumtext DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `prepared_by` varchar(100) DEFAULT NULL,
  `entered_by` varchar(100) DEFAULT NULL,
  `reviewed_by` varchar(100) DEFAULT NULL,
  `approved_by` varchar(100) DEFAULT NULL,
  `date_and_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payable`
--

INSERT INTO `tbl_payable` (`id`, `date`, `payable_type`, `transaction_type`, `transaction_id`, `payment_type`, `project`, `prepaid_receipt_number`, `prepaid_receipt_amount`, `amount`, `comment`, `bank`, `reference_number`, `cheque_number`, `account_name_and_number`, `purpose`, `status`, `prepared_by`, `entered_by`, `reviewed_by`, `approved_by`, `date_and_time`) VALUES
(1, '2022-05-03', 'Rent', 'Payable', NULL, 'Postpayment', 'Internet', NULL, NULL, '5000', 'This is the first payable entry', NULL, NULL, NULL, NULL, NULL, 'Created', NULL, 'Admin ', 'Admin ', 'Admin ', '2022-05-25 14:22:11'),
(2, '2022-05-02', 'Consultancy', 'Receivable', NULL, NULL, 'Internet', NULL, NULL, '3000', 'The first receivable entry', NULL, NULL, NULL, NULL, NULL, 'Created', NULL, 'Admin ', 'Admin ', 'Admin ', '2022-05-25 14:23:39'),
(3, '2022-03-30', 'Rent', 'Payable', NULL, 'Postpayment', NULL, NULL, NULL, '500', NULL, 'Kwame Asante - Prudential bank', '145652', '6767Y77', 'Kwame Asin  2521003654200', 'Payment for plumbing service', 'Rejected', 'David Arkoh', 'Admin ', 'Admin ', 'Admin ', '2022-05-25 14:26:06'),
(4, '2022-05-02', 'Rent', 'Payable', NULL, 'Prepayment', 'Internet', NULL, NULL, '600', 'This is the first prepayment entry', NULL, NULL, NULL, NULL, NULL, 'Created', NULL, 'Admin ', 'Admin ', 'Admin ', '2022-05-25 14:27:21'),
(5, '2020-10-16', 'Equipment', 'Payable', NULL, 'Postpayment', NULL, NULL, NULL, '1499.51', NULL, 'Daily Graphic', 'JSSA001', '632601', 'LRC Ghana  0100126550300', 'Payment for advertisement for the purchase of a vehicle.', 'Reviewed', 'Robert', 'Admin ', 'Admin ', 'Admin ', '2022-05-25 16:28:41');

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

--
-- Dumping data for table `tbl_payable_setups`
--

INSERT INTO `tbl_payable_setups` (`id`, `code`, `name`, `description`, `type`, `date_registered`) VALUES
(4, 'SAL001', 'Personnel salaries and allowances', 'Personnel salaries and allowances', 'Payable', '2022-05-25 16:06:12'),
(5, 'TNT001', 'Travel and Transport', 'Travel and Transport', 'Payable', '2022-05-25 16:07:22'),
(6, 'EQ001', 'Equipment', 'Equipment', 'Payable', '2022-05-25 16:07:54'),
(7, 'SS001', 'Supplies', 'Supplies', 'Payable', '2022-05-25 16:08:14'),
(8, 'CON001', 'Consultancy', 'Consultancy', 'Receivable', '2022-05-25 16:09:23'),
(9, 'LS001', 'Legal Services', 'Legal Services', 'Receivable', '2022-05-25 16:09:51'),
(10, 'USAID001', 'USAID Justice sector support activity', 'USAID Justice sector support activity 15', 'Project', '2022-05-25 16:11:55');

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
  `department` varchar(100) DEFAULT NULL,
  `user_group` varchar(100) DEFAULT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `first_name`, `last_name`, `email`, `password`, `department`, `user_group`, `date_registered`) VALUES
(1, 'Admin', '', 'admin@admin.com', 'Admin', 'Admin', 'Approver', '2022-04-07 22:10:49'),
(2, 'Manuel', 'Sussex', 'man@gmail.com', 'man24', 'Accounting', 'Reviewer', '2022-04-07 23:42:08'),
(6, 'David', 'Kattah', 'david.kattah@gmail.com', '123456', 'Finance', 'Reviewer', '2022-04-08 07:44:16'),
(9, 'Emma', 'Agudey', 'agudey@gmail.com', '4545', 'Finance', 'Reviewer', '2022-04-16 01:13:46'),
(10, 'Afi', 'Korkor', 'afikor@gmail.com', '67674', 'Audit', NULL, '2022-04-16 01:56:34'),
(11, 'Daniel', 'Kisseh', 'dankis@gmail.com', 'dankis', 'Finance', 'Reviewer', '2022-05-23 20:23:51'),
(12, 'Lawe', 'Lawson', 'law@gmail.com', 'laws', NULL, NULL, '2022-05-31 11:17:21'),
(17, 'Abena', 'Ackom', 'abena@gmail.com', 'abena', '', 'Preparer', '2022-06-01 13:58:56'),
(18, 'Kwame', 'Kofi', 'kofi@gmail.com', 'kofi12', 'Audit', 'Preparer', '2022-06-01 14:00:35'),
(19, 'Afua', 'Kissi', 'afua@gmail.com', 'afua1', '', 'Approver', '2022-06-01 17:08:50'),
(20, 'Agah', 'Kuma', 'aga@gmail.com', 'aga45', 'Finanace', 'Preparer', '2022-06-07 00:23:06'),
(21, 'Thine', 'Nudak', 'nudak@gmail.com', 'nudak', 'Audit', 'Reviewer', '2022-06-07 00:40:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banks`
--
ALTER TABLE `tbl_banks`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `tbl_bank_branches`
--
ALTER TABLE `tbl_bank_branches`
  ADD PRIMARY KEY (`branch_id`),
  ADD KEY `FK_bank_name` (`bank_id`);

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
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_banks`
--
ALTER TABLE `tbl_banks`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_bank_branches`
--
ALTER TABLE `tbl_bank_branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_cheque`
--
ALTER TABLE `tbl_cheque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_payable`
--
ALTER TABLE `tbl_payable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_payable_setups`
--
ALTER TABLE `tbl_payable_setups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_bank_branches`
--
ALTER TABLE `tbl_bank_branches`
  ADD CONSTRAINT `FK_bank_name` FOREIGN KEY (`bank_id`) REFERENCES `tbl_banks` (`bank_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
