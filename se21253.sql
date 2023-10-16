-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 16, 2023 at 05:13 PM
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
-- Database: `se21253`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `friend_id` int(11) NOT NULL,
  `friend_email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `profile_name` varchar(30) NOT NULL,
  `date_started` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `num_of_friends` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`friend_id`, `friend_email`, `password`, `profile_name`, `date_started`, `num_of_friends`) VALUES
(1, 'thuvakannan@gmail.com', 'Thuva12', 'Thuva', '2023-10-16 15:08:20', 3),
(2, 'keerthy@gmail.com', 'Keerthy08', 'Keerthy', '2023-10-16 14:51:48', 3),
(3, 'Raaji@gmail.com', 'Raaji15', 'Raaji', '2023-10-16 14:48:58', 0),
(4, 'Kannan@gmail.com', 'Kannan16', 'Kannan', '2023-10-16 14:51:48', 1),
(5, 'Ammu@gmail.com', 'Ammu03', 'Ammu', '2023-10-16 15:08:20', 1),
(6, 'abc@gmail.com', 'abc11', 'abc', '2023-10-16 14:50:51', 1),
(7, 'bcd@gmail.com', 'bcd22', 'bcd', '2023-10-16 14:49:20', 0),
(8, 'cde@gmail.com', 'cde33', 'cde', '2023-10-16 14:49:39', 0),
(9, 'def@gmail.com', 'def44', 'def', '2023-10-16 14:50:35', 1),
(10, 'efg@gmail.com', 'efg55', 'efg', '2023-10-16 14:49:26', 0),
(21, 'fgh@gmail.com', 'fgh66', 'fgh', '2023-10-16 12:11:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `myfriends`
--

CREATE TABLE `myfriends` (
  `friend_id1` int(10) NOT NULL,
  `friend_id2` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `myfriends`
--

INSERT INTO `myfriends` (`friend_id1`, `friend_id2`) VALUES
(2, 1),
(2, 9),
(1, 6),
(2, 4),
(1, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`friend_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `friend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
