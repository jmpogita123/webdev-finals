-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2024 at 04:21 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lname` varchar(120) NOT NULL,
  `gender` text NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `contactnumber` varchar(11) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `program` varchar(55) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `instructor` varchar(100) NOT NULL,
  `before_weightkg` int(254) NOT NULL,
  `before_heightkg` int(254) NOT NULL,
  `after_weightkg` int(254) NOT NULL,
  `after_heightkg` int(254) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lname`, `gender`, `username`, `password`, `email`, `contactnumber`, `usertype`, `date_created`, `program`, `start_date`, `end_date`, `instructor`, `before_weightkg`, `before_heightkg`, `after_weightkg`, `after_heightkg`, `status`) VALUES
(1, 'Jacob', 'Marino', 'male', 'Jacob', 'admin', 'admin@yahoo.com', '', 'admin', '2024-07-01 10:10:34', '', '0000-00-00', '0000-00-00', '', 0, 0, 0, 0, ''),
(2, 'Riley', 'Tyler', 'female', 'Riley', 'admin', 'riley.tyler@gmail.com', '12345678900', 'admin', '2024-07-01 10:11:44', '', '0000-00-00', '0000-00-00', '', 0, 0, 0, 0, ''),
(3, 'Nathan', 'Gonzales', 'Male', 'Nathan', 'admin', 'nathan.Gonzales@emailnya.com', '12345678900', 'admin', '2024-07-01 10:11:33', '', '0000-00-00', '0000-00-00', '', 0, 0, 0, 0, ''),
(38, 'jan', 'gamboa', 'male', 'jm', '123', 'epicbench123@yahoo.com', '09777944826', '', '2024-07-04 12:43:38', '', '0000-00-00', '0000-00-00', '', 0, 0, 0, 0, ''),
(39, 'monkey', 'bars', 'female', 'mk', '123', 'epicbench123@yahoo.com', '09777944826', '', '2024-07-02 03:50:45', '', '1970-01-01', '1970-01-01', '', 0, 0, 60, 1000, 'complete');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
