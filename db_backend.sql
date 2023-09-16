-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2023 at 06:45 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_backend`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `balance` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`id`, `name`, `balance`) VALUES
(1, 'Mochammad Vaif ', '4330000.00'),
(2, 'Bagas Aqmal', '58120000.00'),
(3, 'Andyka Salom', '22550000.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transactions`
--

CREATE TABLE `tbl_transactions` (
  `id` int(11) NOT NULL,
  `from_account` int(11) NOT NULL,
  `to_account` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transactions`
--

INSERT INTO `tbl_transactions` (`id`, `from_account`, `to_account`, `amount`, `timestamp`) VALUES
(1, 1, 2, '2000000.00', '2023-09-13 15:29:46'),
(2, 2, 1, '2000000.00', '2023-09-13 15:42:48'),
(3, 1, 2, '1560000.00', '2023-09-13 15:56:58'),
(4, 1, 2, '2000000.00', '2023-09-13 15:59:02'),
(5, 1, 2, '2000000.00', '2023-09-13 16:00:01'),
(6, 1, 2, '2000000.00', '2023-09-13 16:00:21'),
(7, 1, 2, '2000000.00', '2023-09-13 16:00:40'),
(8, 2, 1, '2000000.00', '2023-09-13 16:03:51'),
(9, 3, 1, '150000.00', '2023-09-13 16:14:27'),
(10, 3, 1, '150000.00', '2023-09-13 16:15:24'),
(11, 3, 1, '150000.00', '2023-09-13 16:16:11'),
(12, 1, 2, '1560000.00', '2023-09-13 16:24:43'),
(13, 2, 1, '2000000.00', '2023-09-13 16:31:22'),
(14, 3, 1, '2000000.00', '2023-09-13 16:33:03'),
(15, 1, 2, '1000000.00', '2023-09-16 04:03:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
