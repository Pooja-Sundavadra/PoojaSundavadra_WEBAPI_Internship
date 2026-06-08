-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2026 at 03:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajaxdemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `internship`
--

CREATE TABLE `internship` (
  `id` int(11) NOT NULL,
  `stud_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `mode` enum('online','onsite','hybrid') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `internship`
--

INSERT INTO `internship` (`id`, `stud_name`, `email`, `contact`, `mode`) VALUES
(1, 'Sundavadra Pooja', 'pooja@gmail.com', '9876500001', 'onsite'),
(2, 'Rajshakhar Karan', 'karan@gmail.com', '9876500002', 'hybrid'),
(3, 'Odedra Rekha', 'rekha@gmail.com', '9876500003', 'online'),
(4, 'Bhutiya Shreya', 'shreya@gmail.com', '9876500004', 'online'),
(5, 'Bhutiya Jayveer', 'jayveer@gmail.com', '9876500005', 'hybrid'),
(6, 'Timba Chetna', 'chetna@gmail.com', '9876500006', 'onsite'),
(7, 'Khunti Bharti', 'bharti@gmail.com', '9876500007', 'hybrid'),
(8, 'Odedra Divya', 'divya@gmail.com', '9876500008', 'onsite'),
(9, 'Jadeja Kinjal', 'kinjal@gmail.com', '9876500009', 'online'),
(10, 'Parmar Yuvraj', 'yuvraj@gmail.com', '9876500010', 'online'),
(11, 'Khunti Vikram', 'vikram@gmail.com', '9876500011', 'hybrid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `internship`
--
ALTER TABLE `internship`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `internship`
--
ALTER TABLE `internship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
