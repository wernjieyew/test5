-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2023 at 07:17 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `password`) VALUES
('admin01', '7c222fb2927d828af22f592134e8932480637c0d'),
('admin02', 'a7d579ba76398070eae654c30ff153a4c273272a');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `Event_id` int(4) NOT NULL,
  `Event_name` varchar(50) NOT NULL,
  `Event_type` varchar(20) NOT NULL,
  `Venue` varchar(30) NOT NULL,
  `Event_date` date NOT NULL,
  `Event_time` time NOT NULL,
  `Contact_number` varchar(11) NOT NULL,
  `adminID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`Event_id`, `Event_name`, `Event_type`, `Venue`, `Event_date`, `Event_time`, `Contact_number`, `adminID`) VALUES
(1009, 'Spring Singing Competition', 'Competition', 'Dewan Utama', '2023-05-10', '20:00:00', '0174016934', 'admin01'),
(1010, 'Summer Singing Competition', 'Competition', 'DSA Hall', '2023-06-20', '18:00:00', '0174016934', 'admin01'),
(1011, 'Music Workshop', 'Workshop', 'EDK 2', '2023-07-11', '22:30:00', '0174016934', 'admin01'),
(1012, 'Piano Workshop', 'Workshop', 'FDK 2', '2023-10-23', '14:00:00', '0174016934', 'admin01'),
(1013, 'Industry Talk', 'Talk', 'CDK 1', '2023-05-04', '14:00:00', '0174016934', 'admin01'),
(1014, 'Music Talk', 'Talk', 'CDK 2', '2023-06-03', '16:00:00', '0174016934', 'admin01');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` int(11) NOT NULL,
  `studentID` varchar(7) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(25) NOT NULL,
  `comment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackID`, `studentID`, `fullname`, `gender`, `email`, `comment`) VALUES
(1003, '2203687', 'YEW WERN JIE', 'male', 'wernjieyew@gmail.com', 'Very good'),
(1004, '2201301', 'Yap Kok Xiang', 'male', 'kokxiang318@gmail.com', 'Hope to add more event'),
(1005, '2203113', 'Liew Zhi Zhao', 'male', 'zhizhaoliew@gmail.com', 'good'),
(1006, '2202555', 'Ching Yen Hern', 'male', 'yenhern@gmail.com', 'well done');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `Event_id` int(4) NOT NULL,
  `studentID` int(7) NOT NULL,
  `Event_name` varchar(50) NOT NULL,
  `Event_type` varchar(30) NOT NULL,
  `studentname` varchar(30) NOT NULL,
  `gender` char(1) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`Event_id`, `studentID`, `Event_name`, `Event_type`, `studentname`, `gender`, `email`, `phone_no`) VALUES
(1009, 2203113, 'Spring Singing Competition', 'Competition', 'LIEW ZHI ZHAO', 'M', 'zhizhaoliew@gmail.com', '0174016935'),
(1009, 2203687, 'Spring Singing Competition', 'Competition', 'YEW WERN JIE', 'M', 'wernjieyew@gmail.com', '0174016934'),
(1010, 2201301, 'Summer Singing Competition', 'Competition', 'YAP KOK XIANG', 'M', 'kokxiang318@gmail.com', '0174016936'),
(1010, 2202555, 'Summer Singing Competition', 'Competition', 'CHING YEN HERN', 'M', 'yenhern@gmail.com', '0165352876'),
(1011, 2203113, 'Music Workshop', 'Workshop', 'LIEW ZHI ZHAO', 'M', 'zhizhaoliew@gmail.com', '0174016935'),
(1011, 2203687, 'Music Workshop', 'Workshop', 'YEW WERN JIE', 'M', 'wernjieyew@gmail.com', '0174016934'),
(1012, 2201301, 'Piano Workshop', 'Workshop', 'YAP KOK XIANG', 'M', 'kokxiang318@gmail.com', '0174016936'),
(1012, 2202555, 'Piano Workshop', 'Workshop', 'CHING YEN HERN', 'M', 'yenhern@gmail.com', '0165352876'),
(1013, 2203113, 'Industry Talk', 'Talk', 'YEW WERN JIE', 'M', 'zhizhaoliew@gmail.com', '0174016935'),
(1013, 2203687, 'Industry Talk', 'Talk', 'YEW WERN JIE', 'M', 'wernjieyew@gmail.com', '0174016934'),
(1014, 2201301, 'Music Talk', 'Talk', 'YAP KOK XIANG', 'M', 'kokxiang318@gmail.com', '0174016936'),
(1014, 2202555, 'Music Talk', 'Talk', 'CHING YEN HERN', 'M', 'yenhern@gmail.com', '0165352876');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(7) NOT NULL,
  `Fullname` varchar(30) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `Fullname`, `Email`, `Password`) VALUES
(2201301, 'Yap Kok Xiang', 'kokxiang318@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d'),
(2202555, 'Ching Yen Hern', 'yenhern@gmail.com', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8'),
(2203113, 'Liew Zhi Zhao', 'zhizhaoliew@gmail.com', 'f638e2789006da9bb337fd5689e37a265a70f359'),
(2203687, 'YEW WERN JIE', 'wernjieyew@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`Event_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`Event_id`,`studentID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `Event_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1015;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
