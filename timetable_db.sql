-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2026 at 07:39 AM
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
-- Database: `timetable_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty_directory`
--

CREATE TABLE `faculty_directory` (
  `id` int(11) NOT NULL,
  `faculty_name` varchar(255) NOT NULL,
  `college_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_directory`
--

INSERT INTO `faculty_directory` (`id`, `faculty_name`, `college_code`) VALUES
(2, 'Prof. Amol Mankar', ''),
(3, 'Prof. Saif Qazi', ''),
(4, 'Prof.Neha Ankar', ''),
(5, 'Prof. Kajal Dongare', ''),
(6, 'Prof. Shamal Dhodre', ''),
(7, 'Prof. Shradhha Wani', ''),
(8, 'Prof. Smita Kolarkar', ''),
(10, 'Prof. Payal Chavhan ', ''),
(11, 'Prof. Pratik Wankhede', ''),
(12, 'Prof. Mohini Masram ', ''),
(13, 'Prof. Kiran Gujar', ''),
(14, 'Prof. Nikita Gujarkar', ''),
(15, 'Prof. Varsha Khevle', ''),
(17, 'Dr. Ritesh Sule ', '');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_schedule`
--

CREATE TABLE `faculty_schedule` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `course_class` varchar(50) NOT NULL,
  `day_name` varchar(15) NOT NULL,
  `time_slot` varchar(50) NOT NULL,
  `room_no` varchar(20) NOT NULL,
  `college_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_schedule`
--

INSERT INTO `faculty_schedule` (`id`, `teacher_name`, `course_class`, `day_name`, `time_slot`, `room_no`, `college_code`) VALUES
(1, 'Prof. Shraddha Wani', 'BCA 1st Year', 'Monday', '10:45 AM - 11:30 AM', 'Room 1', ''),
(2, 'Prof. Mohini Masram', 'BCA 1st Year', 'Monday', '11:30 AM - 12:15 PM', 'Room 1', ''),
(3, 'Prof. Amol Mankar', 'BCA 1st Year', 'Monday', '12:30 PM - 01:15 PM', 'Room 1', ''),
(4, 'Prof. Kiran Gujar', 'BCA 1st Year', 'Monday', '01:15 PM - 02:00 PM', 'Room 1', ''),
(5, 'Prof. Kajal Dongare', 'BCA 1st Year', 'Monday', '02:30 PM - 03:15 PM', 'Room 1', ''),
(6, 'Prof. Shraddha Wani', 'BCA 1st Year', 'Tuesday', '10:45 AM - 11:30 AM', 'Room 1', ''),
(7, 'Prof. Mohini Masram', 'BCA 1st Year', 'Tuesday', '11:30 AM - 12:15 PM', 'Room 1', ''),
(8, 'COMPUTER LAB', 'BCA 1st Year', 'Tuesday', '12:30 PM - 01:15 PM', 'Room 1', ''),
(9, 'Prof. Kajal Dongare', 'BCA 1st Year', 'Tuesday', '02:30 PM - 03:15 PM', 'Room 1', ''),
(10, 'Prof. Shraddha Wani', 'BCA 1st Year', 'Wednesday', '10:45 AM - 11:30 AM', 'Room 1', ''),
(11, 'LIBRARY', 'BCA 1st Year', 'Wednesday', '11:30 AM - 12:15 PM', 'Room 1', ''),
(12, 'Prof.Neha Ankar', 'BCA 1st Year', 'Wednesday', '12:30 PM - 01:15 PM', 'Room 1', ''),
(13, 'Prof. Kiran Gujar', 'BCA 1st Year', 'Wednesday', '01:15 PM - 02:00 PM', 'Room 1', ''),
(14, 'Prof. Kajal Dongare', 'BCA 1st Year', 'Wednesday', '02:30 PM - 03:15 PM', 'Room 1', ''),
(15, 'Prof. Shradhha Wani', 'BCA 1st Year', 'Thursday', '10:45 AM - 11:30 AM', 'Room 1', ''),
(16, 'Prof. Amol Mankar', 'BCA 1st Year', 'Thursday', '11:30 AM - 12:15 PM', 'Room 1', ''),
(17, 'Prof. Kiran Gujar', 'BCA 1st Year', 'Thursday', '12:30 PM - 01:15 PM', 'Room 1', ''),
(18, 'Prof.Neha Ankar', 'BCA 1st Year', 'Thursday', '01:15 PM - 02:00 PM', 'Room 1', ''),
(19, 'Prof. Amol Mankar', 'BCA 1st Year', 'Friday', '10:45 AM - 11:30 AM', 'Room 1', ''),
(20, 'Prof.Neha Ankar', 'BCA 1st Year', 'Friday', '11:30 AM - 12:15 PM', 'Room 1', ''),
(21, 'Prof. Kiran Gujar', 'BCA 1st Year', 'Friday', '12:30 PM - 01:15 PM', 'Room 1', ''),
(22, 'LIBRARY', 'BCA 1st Year', 'Friday', '01:15 PM - 02:00 PM', 'Room 1', ''),
(23, 'COMPUTER LAB', 'BCA 1st Year', 'Friday', '02:30 PM - 03:15 PM', 'Room 1', ''),
(24, 'Prof. Amol Mankar', 'BCA 1st Year', 'Saturday', '10:45 AM - 11:30 AM', 'Room 1', ''),
(25, 'Prof.Neha Ankar', 'BCA 1st Year', 'Saturday', '11:30 AM - 12:15 PM', 'Room 1', ''),
(26, 'COMPUTER LAB', 'BCA 1st Year', 'Saturday', '12:30 PM - 01:15 PM', 'Room 1', ''),
(27, 'LAB', 'BCA 1st Year', 'Saturday', '01:15 PM - 02:00 PM', 'Room 1', ''),
(28, 'Prof. Amol Mankar', 'BCA 2nd Year', 'Monday', '10:45 AM - 11:30 AM', 'Room 2', ''),
(29, 'Prof.Neha Ankar', 'BCA 2nd Year', 'Monday', '11:30 AM - 12:15 PM', 'Room 2', ''),
(30, 'Prof. Kajal Dongare', 'BCA 2nd Year', 'Monday', '12:30 PM - 01:15 PM', 'Room 2', ''),
(31, 'LIBRARY', 'BCA 2nd Year', 'Monday', '01:15 PM - 02:00 PM', 'Room 2', ''),
(32, 'COMPUTER LAB', 'BCA 2nd Year', 'Monday', '02:30 PM - 03:15 PM', 'Room 2', ''),
(33, 'Prof. Amol Mankar', 'BCA 2nd Year', 'Tuesday', '10:45 AM - 11:30 AM', 'Room 2', ''),
(34, 'Prof.Neha Ankar', 'BCA 2nd Year', 'Tuesday', '11:30 AM - 12:15 PM', 'Room 2', ''),
(35, 'Prof. Kajal Dongare', 'BCA 2nd Year', 'Tuesday', '12:30 PM - 01:15 PM', 'Room 2', ''),
(36, 'Prof. Mohini Masram', 'BCA 2nd Year', 'Tuesday', '01:15 PM - 02:00 PM', 'Room 2', ''),
(37, 'COMPUTER LAB', 'BCA 2nd Year', 'Tuesday', '02:30 PM - 03:15 PM', 'Room 2', ''),
(38, 'Prof. Ashwini Kapile', 'BCA 2nd Year', 'Wednesday', '10:45 AM - 11:30 AM', 'Room 2', ''),
(39, 'Prof. Amol Mankar', 'BCA 2nd Year', 'Wednesday', '11:30 AM - 12:15 PM', 'Room 2', ''),
(40, 'Prof. Mohini Masram', 'BCA 2nd Year', 'Wednesday', '12:30 PM - 01:15 PM', 'Room 2', ''),
(41, 'Prof. Kajal Dongare', 'BCA 2nd Year', 'Wednesday', '01:15 PM - 02:00 PM', 'Room 2', ''),
(42, 'Prof.Neha Ankar', 'BCA 2nd Year', 'Thursday', '10:45 AM - 11:30 AM', 'Room 2', ''),
(43, 'Prof. Ashwini Kapile', 'BCA 2nd Year', 'Thursday', '11:30 AM - 12:15 PM', 'Room 2', ''),
(44, 'Prof. Mohini Masram', 'BCA 2nd Year', 'Thursday', '12:30 PM - 01:15 PM', 'Room 2', ''),
(45, 'LIBRARY', 'BCA 2nd Year', 'Thursday', '01:15 PM - 02:00 PM', 'Room 2', ''),
(46, 'LAB', 'BCA 2nd Year', 'Friday', '10:45 AM - 11:30 AM', 'Room 2', ''),
(47, 'Prof. Ashwini Kapile', 'BCA 2nd Year', 'Friday', '11:30 AM - 12:15 PM', 'Room 2', ''),
(48, 'Prof. Nikita Gujarkar', 'BCA 2nd Year', 'Friday', '12:30 PM - 01:15 PM', 'Room 2', ''),
(49, 'Prof.Neha Ankar', 'BCA 2nd Year', 'Friday', '01:15 PM - 02:00 PM', 'Room 2', ''),
(50, 'Prof. Kajal Dongare', 'BCA 2nd Year', 'Saturday', '10:45 AM - 11:30 AM', 'Room 2', ''),
(51, 'Prof. Amol Mankar', 'BCA 2nd Year', 'Saturday', '11:30 AM - 12:15 PM', 'Room 2', ''),
(52, 'Prof. Ashwini Kapile', 'BCA 2nd Year', 'Saturday', '12:30 PM - 01:15 PM', 'Room 2', ''),
(53, 'Prof. Nikita Gujarkar', 'BCA 2nd Year', 'Saturday', '01:15 PM - 02:00 PM', 'Room 2', ''),
(54, 'Prof. Kajal Dongare', 'BCA 3rd Year', 'Monday', '10:45 AM - 11:30 AM', 'Room 3', ''),
(55, 'LAB', 'BCA 3rd Year', 'Monday', '11:30 AM - 12:15 PM', 'Room 3', ''),
(56, 'Prof. Mohini Masram', 'BCA 3rd Year', 'Monday', '12:30 PM - 01:15 PM', 'Room 3', ''),
(57, 'Prof. Amol Mankar', 'BCA 3rd Year', 'Monday', '01:15 PM - 02:00 PM', 'Room 3', ''),
(58, 'Prof.Neha Ankar', 'BCA 3rd Year', 'Tuesday', '10:45 AM - 11:30 AM', 'Room 3', ''),
(59, 'LAB', 'BCA 3rd Year', 'Tuesday', '11:30 AM - 12:15 PM', 'Room 3', ''),
(60, 'Prof. Mohini Masram', 'BCA 3rd Year', 'Tuesday', '12:30 PM - 01:15 PM', 'Room 3', ''),
(61, 'Prof. Amol Mankar', 'BCA 3rd Year', 'Tuesday', '01:15 PM - 02:00 PM', 'Room 3', ''),
(62, 'Prof.Neha Ankar', 'BCA 3rd Year', 'Wednesday', '10:45 AM - 11:30 AM', 'Room 3', ''),
(63, 'Prof. Mohini Masram', 'BCA 3rd Year', 'Wednesday', '11:30 AM - 12:15 PM', 'Room 3', ''),
(64, 'Prof. Kajal Dongare', 'BCA 3rd Year', 'Wednesday', '12:30 PM - 01:15 PM', 'Room 3', ''),
(65, 'Prof. Amol Mankar', 'BCA 3rd Year', 'Wednesday', '01:15 PM - 02:00 PM', 'Room 3', ''),
(66, 'Prof. Kajal Dongare', 'BCA 3rd Year', 'Thursday', '10:45 AM - 11:30 AM', 'Room 3', ''),
(67, 'Prof. Mohini Masram', 'BCA 3rd Year', 'Thursday', '11:30 AM - 12:15 PM', 'Room 3', ''),
(68, 'Prof.Neha Ankar', 'BCA 3rd Year', 'Thursday', '12:30 PM - 01:15 PM', 'Room 3', ''),
(69, 'LAB', 'BCA 3rd Year', 'Thursday', '01:15 PM - 02:00 PM', 'Room 3', ''),
(70, 'COMPUTER LAB', 'BCA 3rd Year', 'Thursday', '02:30 PM - 03:15 PM', 'Room 3', ''),
(71, 'Prof.Neha Ankar', 'BCA 3rd Year', 'Friday', '10:45 AM - 11:30 AM', 'Room 3', ''),
(72, 'Prof. Amol Mankar', 'BCA 3rd Year', 'Friday', '11:30 AM - 12:15 PM', 'Room 3', ''),
(73, 'Prof. Kajal Dongare', 'BCA 3rd Year', 'Friday', '12:30 PM - 01:15 PM', 'Room 3', ''),
(74, 'COMPUTER LAB', 'BCA 3rd Year', 'Saturday', '10:45 AM - 11:30 AM', 'Room 3', ''),
(75, 'Prof. Shraddha Wani', 'BCCA 1st Year', 'Monday', '10:45 AM - 11:30 AM', 'Room 4', ''),
(76, 'Prof. Pratik Wankhede', 'BCCA 1st Year', 'Monday', '11:30 AM - 12:15 PM', 'Room 4', ''),
(77, 'Prof. Amol Mankar', 'BCCA 1st Year', 'Monday', '12:30 PM - 01:15 PM', 'Room 4', ''),
(78, 'Prof. Payal Chavhan', 'BCCA 1st Year', 'Monday', '01:15 PM - 02:00 PM', 'Room 4', ''),
(79, 'Prof. Mohini Masram', 'BCCA 1st Year', 'Monday', '02:30 PM - 03:15 PM', 'Room 4', ''),
(80, 'Prof. Shraddha Wani', 'BCCA 1st Year', 'Tuesday', '10:45 AM - 11:30 AM', 'Room 4', ''),
(81, 'LIBRARY', 'BCCA 1st Year', 'Tuesday', '11:30 AM - 12:15 PM', 'Room 4', ''),
(82, 'Prof. Nikita Gujarkar', 'BCCA 1st Year', 'Tuesday', '12:30 PM - 01:15 PM', 'Room 4', ''),
(83, 'Prof. Payal Chavhan', 'BCCA 1st Year', 'Tuesday', '01:15 PM - 02:00 PM', 'Room 4', ''),
(84, 'Prof. Mohini Masram', 'BCCA 1st Year', 'Tuesday', '02:30 PM - 03:15 PM', 'Room 4', ''),
(85, 'Prof. Shraddha Wani', 'BCCA 1st Year', 'Wednesday', '10:45 AM - 11:30 AM', 'Room 4', ''),
(86, 'Prof. Nikita Gujarkar', 'BCCA 1st Year', 'Wednesday', '11:30 AM - 12:15 PM', 'Room 4', ''),
(87, 'LAB', 'BCCA 1st Year', 'Wednesday', '12:30 PM - 01:15 PM', 'Room 4', ''),
(88, 'Prof. Varsha Khevle', 'BCCA 1st Year', 'Wednesday', '01:15 PM - 02:00 PM', 'Room 4', ''),
(89, 'Prof. Payal Chavhan', 'BCCA 1st Year', 'Wednesday', '02:30 PM - 03:15 PM', 'Room 4', ''),
(90, 'Prof. Shraddha Wani', 'BCCA 1st Year', 'Thursday', '10:45 AM - 11:30 AM', 'Room 4', ''),
(91, 'Prof. Amol Mankar', 'BCCA 1st Year', 'Thursday', '11:30 AM - 12:15 PM', 'Room 4', ''),
(92, 'Prof. Pratik Wankhede', 'BCCA 1st Year', 'Thursday', '12:30 PM - 01:15 PM', 'Room 4', ''),
(93, 'Prof. Varsha Khevle', 'BCCA 1st Year', 'Thursday', '01:15 PM - 02:00 PM', 'Room 4', ''),
(94, 'Prof. Payal Chavhan', 'BCCA 1st Year', 'Thursday', '02:30 PM - 03:15 PM', 'Room 4', ''),
(95, 'Prof. Amol Mankar', 'BCCA 1st Year', 'Friday', '10:45 AM - 11:30 AM', 'Room 4', ''),
(96, 'LIBRARY', 'BCCA 1st Year', 'Friday', '11:30 AM - 12:15 PM', 'Room 4', ''),
(97, 'Prof. Pratik Wankhede', 'BCCA 1st Year', 'Friday', '12:30 PM - 01:15 PM', 'Room 4', ''),
(98, 'Prof. Varsha Khevle', 'BCCA 1st Year', 'Friday', '01:15 PM - 02:00 PM', 'Room 4', ''),
(99, 'Prof. Amol Mankar', 'BCCA 1st Year', 'Saturday', '10:45 AM - 11:30 AM', 'Room 4', ''),
(100, 'Prof. Nikita Gujarkar', 'BCCA 1st Year', 'Saturday', '11:30 AM - 12:15 PM', 'Room 4', ''),
(101, 'Prof. Pratik Wankhede', 'BCCA 1st Year', 'Saturday', '12:30 PM - 01:15 PM', 'Room 4', ''),
(102, 'Prof. Varsha Khevle', 'BCCA 1st Year', 'Saturday', '01:15 PM - 02:00 PM', 'Room 4', ''),
(103, 'Dr. Ritesh Sule', 'BCCA 2nd Year', 'Monday', '10:45 AM - 11:30 AM', 'Room 5', ''),
(104, 'LIBRARY', 'BCCA 2nd Year', 'Monday', '11:30 AM - 12:15 PM', 'Room 5', ''),
(105, 'Prof. Shamal Dhodre', 'BCCA 2nd Year', 'Monday', '12:30 PM - 01:15 PM', 'Room 5', ''),
(106, 'Prof. Varsha Khevle', 'BCCA 2nd Year', 'Monday', '01:15 PM - 02:00 PM', 'Room 5', ''),
(107, 'Dr. Ritesh Sule', 'BCCA 2nd Year', 'Tuesday', '10:45 AM - 11:30 AM', 'Room 5', ''),
(108, 'Prof. Smita Kolarkar', 'BCCA 2nd Year', 'Tuesday', '11:30 AM - 12:15 PM', 'Room 5', ''),
(109, 'Prof. Shamal Dhodre', 'BCCA 2nd Year', 'Tuesday', '12:30 PM - 01:15 PM', 'Room 5', ''),
(110, 'COMP LAB', 'BCCA 2nd Year', 'Tuesday', '01:15 PM - 02:00 PM', 'Room 5', ''),
(111, 'COMP LAB', 'BCCA 2nd Year', 'Wednesday', '10:45 AM - 11:30 AM', 'Room 5', ''),
(112, 'Prof. Varsha Khevle', 'BCCA 2nd Year', 'Wednesday', '11:30 AM - 12:15 PM', 'Room 5', ''),
(113, 'Prof. Shamal Dhodre', 'BCCA 2nd Year', 'Wednesday', '12:30 PM - 01:15 PM', 'Room 5', ''),
(114, 'LIBRARY', 'BCCA 2nd Year', 'Wednesday', '01:15 PM - 02:00 PM', 'Room 5', ''),
(115, 'COMP LAB', 'BCCA 2nd Year', 'Thursday', '10:45 AM - 11:30 AM', 'Room 5', ''),
(116, 'Prof. Varsha Khevle', 'BCCA 2nd Year', 'Thursday', '11:30 AM - 12:15 PM', 'Room 5', ''),
(117, 'COMPUTER LAB', 'BCCA 2nd Year', 'Thursday', '12:30 PM - 01:15 PM', 'Room 5', ''),
(118, 'Prof. Smita Kolarkar', 'BCCA 2nd Year', 'Thursday', '01:15 PM - 02:00 PM', 'Room 5', ''),
(119, 'Dr. Ritesh Sule', 'BCCA 2nd Year', 'Friday', '10:45 AM - 11:30 AM', 'Room 5', ''),
(120, 'COMP LAB', 'BCCA 2nd Year', 'Friday', '11:30 AM - 12:15 PM', 'Room 5', ''),
(121, 'Prof. Shamal Dhodre', 'BCCA 2nd Year', 'Friday', '12:30 PM - 01:15 PM', 'Room 5', ''),
(122, 'Prof. Smita Kolarkar', 'BCCA 2nd Year', 'Friday', '01:15 PM - 02:00 PM', 'Room 5', ''),
(123, 'Dr. Ritesh Sule', 'BCCA 2nd Year', 'Saturday', '10:45 AM - 11:30 AM', 'Room 5', ''),
(124, 'Prof. Varsha Khevle', 'BCCA 2nd Year', 'Saturday', '11:30 AM - 12:15 PM', 'Room 5', ''),
(125, 'Prof. Smita Kolarkar', 'BCCA 2nd Year', 'Saturday', '12:30 PM - 01:15 PM', 'Room 5', ''),
(126, 'COMP LAB', 'BCCA 2nd Year', 'Saturday', '01:15 PM - 02:00 PM', 'Room 5', ''),
(127, 'Prof. Kiran Gujar', 'BCCA 3rd Year', 'Monday', '10:45 AM - 11:30 AM', 'Room 6', ''),
(128, 'Prof. Nikita Gujarkar', 'BCCA 3rd Year', 'Monday', '11:30 AM - 12:15 PM', 'Room 6', ''),
(129, 'Prof. Ashwini Kapile', 'BCCA 3rd Year', 'Monday', '12:30 PM - 01:15 PM', 'Room 6', ''),
(130, 'LIBRARY', 'BCCA 3rd Year', 'Monday', '01:15 PM - 02:00 PM', 'Room 6', ''),
(131, 'Prof. Payal Chavhan', 'BCCA 3rd Year', 'Tuesday', '10:45 AM - 11:30 AM', 'Room 6', ''),
(132, 'Prof. Nikita Gujarkar', 'BCCA 3rd Year', 'Tuesday', '11:30 AM - 12:15 PM', 'Room 6', ''),
(133, 'Prof. Ashwini Kapile', 'BCCA 3rd Year', 'Tuesday', '12:30 PM - 01:15 PM', 'Room 6', ''),
(134, 'Prof. Kiran Gujar', 'BCCA 3rd Year', 'Tuesday', '01:15 PM - 02:00 PM', 'Room 6', ''),
(135, 'Prof. Nikita Gujarkar', 'BCCA 3rd Year', 'Wednesday', '10:45 AM - 11:30 AM', 'Room 6', ''),
(136, 'Prof. Kajal Dongare', 'BCCA 3rd Year', 'Wednesday', '11:30 AM - 12:15 PM', 'Room 6', ''),
(137, 'Prof. Payal Chavhan', 'BCCA 3rd Year', 'Wednesday', '12:30 PM - 01:15 PM', 'Room 6', ''),
(138, 'LAB', 'BCCA 3rd Year', 'Wednesday', '01:15 PM - 02:00 PM', 'Room 6', ''),
(139, 'Prof. Nikita Gujarkar', 'BCCA 3rd Year', 'Thursday', '10:45 AM - 11:30 AM', 'Room 6', ''),
(140, 'Prof. Kajal Dongare', 'BCCA 3rd Year', 'Thursday', '11:30 AM - 12:15 PM', 'Room 6', ''),
(141, 'Prof. Ashwini Kapile', 'BCCA 3rd Year', 'Thursday', '01:15 PM - 02:00 PM', 'Room 6', ''),
(142, 'Prof. Kiran Gujar', 'BCCA 3rd Year', 'Thursday', '01:15 PM - 02:00 PM', 'Room 6', ''),
(143, 'LAB', 'BCCA 3rd Year', 'Friday', '10:45 AM - 11:30 AM', 'Room 6', ''),
(144, 'Prof. Kajal Dongare', 'BCCA 3rd Year', 'Friday', '10:45 AM - 11:30 AM', 'Room 6', ''),
(145, 'Prof. Payal Chavhan', 'BCCA 3rd Year', 'Friday', '12:30 PM - 01:15 PM', 'Room 6', ''),
(146, 'Prof. Kiran Gujar', 'BCCA 3rd Year', 'Friday', '01:15 PM - 02:00 PM', 'Room 6', ''),
(147, 'Prof. Ashwini Kapile', 'BCCA 3rd Year', 'Saturday', '10:45 AM - 11:30 AM', 'Room 6', ''),
(148, 'Prof. Kajal Dongare', 'BCCA 3rd Year', 'Saturday', '11:30 AM - 12:15 PM', 'Room 6', ''),
(149, 'LAB', 'BCCA 3rd Year', 'Saturday', '12:30 PM - 01:15 PM', 'Room 6', ''),
(150, 'Prof. Shamal Dhodre', 'BBA 1st Year', 'Monday', '10:45 AM - 11:30 AM', 'Room 7', ''),
(151, 'Prof. Pratik Wankhede', 'BBA 1st Year', 'Monday', '11:30 AM - 12:15 PM', 'Room 7', ''),
(152, 'Prof. Kiran Gujar', 'BBA 1st Year', 'Monday', '12:30 PM - 01:15 PM', 'Room 7', ''),
(153, 'Prof. Smita Kolarkar', 'BBA 1st Year', 'Monday', '01:15 PM - 02:00 PM', 'Room 7', ''),
(154, 'Prof. Mohini Masram', 'BBA 1st Year', 'Monday', '02:30 PM - 03:15 PM', 'Room 7', ''),
(155, 'Prof. Shamal Dhodre', 'BBA 1st Year', 'Tuesday', '10:45 AM - 11:30 AM', 'Room 7', ''),
(156, 'Prof. Kajal Dongare', 'BBA 1st Year', 'Tuesday', '11:30 AM - 12:15 PM', 'Room 7', ''),
(157, 'Prof. Kiran Gujar', 'BBA 1st Year', 'Tuesday', '12:30 PM - 01:15 PM', 'Room 7', ''),
(158, 'Prof. Smita Kolarkar', 'BBA 1st Year', 'Tuesday', '01:15 PM - 02:00 PM', 'Room 7', ''),
(159, 'Prof. Mohini Masram', 'BBA 1st Year', 'Tuesday', '02:30 PM - 03:15 PM', 'Room 7', ''),
(160, 'Prof. Shamal Dhodre', 'BBA 1st Year', 'Wednesday', '10:45 AM - 11:30 AM', 'Room 7', ''),
(161, 'Prof. Shraddha Wani', 'BBA 1st Year', 'Wednesday', '11:30 AM - 12:15 PM', 'Room 7', ''),
(162, 'Prof. Kiran Gujar', 'BBA 1st Year', 'Wednesday', '12:30 PM - 01:15 PM', 'Room 7', ''),
(163, 'Prof. Varsha Khevle', 'BBA 1st Year', 'Wednesday', '01:15 PM - 02:00 PM', 'Room 7', ''),
(164, 'Prof. Smita Kolarkar', 'BBA 1st Year', 'Wednesday', '02:30 PM - 03:15 PM', 'Room 7', ''),
(165, 'Prof. Shamal Dhodre', 'BBA 1st Year', 'Thursday', '10:45 AM - 11:30 AM', 'Room 7', ''),
(166, 'Prof. Shamal Dhodre', 'BBA 1st Year', 'Thursday', '11:30 AM - 12:15 PM', 'Room 7', ''),
(167, 'Prof. Pratik Wankhede', 'BBA 1st Year', 'Thursday', '12:30 PM - 01:15 PM', 'Room 7', ''),
(168, 'Prof. Varsha Khevle', 'BBA 1st Year', 'Thursday', '01:15 PM - 02:00 PM', 'Room 7', ''),
(169, 'Prof. Shraddha Wani', 'BBA 1st Year', 'Thursday', '02:30 PM - 03:15 PM', 'Room 7', ''),
(170, 'Prof. Kajal Dongare', 'BBA 1st Year', 'Friday', '10:45 AM - 11:30 AM', 'Room 7', ''),
(171, 'Prof. Shamal Dhodre', 'BBA 1st Year', 'Friday', '11:30 AM - 12:15 PM', 'Room 7', ''),
(172, 'Prof. Pratik Wankhede', 'BBA 1st Year', 'Friday', '12:30 PM - 01:15 PM', 'Room 7', ''),
(173, 'Prof. Varsha Khevle', 'BBA 1st Year', 'Friday', '01:15 PM - 02:00 PM', 'Room 7', ''),
(174, 'Prof. Shraddha Wani', 'BBA 1st Year', 'Friday', '02:30 PM - 03:15 PM', 'Room 7', ''),
(175, 'LAB', 'BBA 1st Year', 'Saturday', '10:45 AM - 11:30 AM', 'Room 7', ''),
(176, 'Prof. Shamal Dhodre', 'BBA 1st Year', 'Saturday', '11:30 AM - 12:15 PM', 'Room 7', ''),
(177, 'Prof. Pratik Wankhede', 'BBA 1st Year', 'Saturday', '12:30 PM - 01:15 PM', 'Room 7', ''),
(178, 'Prof. Varsha Khevle', 'BBA 1st Year', 'Saturday', '01:15 PM - 02:00 PM', 'Room 7', ''),
(179, 'LAB', 'BBA 2nd Year', 'Monday', '10:45 AM - 11:30 AM', 'Room 8', ''),
(180, 'Prof. Payal Chavhan', 'BBA 2nd Year', 'Monday', '11:30 AM - 12:15 PM', 'Room 8', ''),
(181, 'Prof. Shamal Dhodre', 'BBA 2nd Year', 'Monday', '12:30 PM - 01:15 PM', 'Room 8', ''),
(182, 'Prof. Varsha Khevle', 'BBA 2nd Year', 'Monday', '01:15 PM - 02:00 PM', 'Room 8', ''),
(183, 'Prof. Pratik Wankhede', 'BBA 2nd Year', 'Tuesday', '10:45 AM - 11:30 AM', 'Room 8', ''),
(184, 'Prof. Smita Kolarkar', 'BBA 2nd Year', 'Tuesday', '11:30 AM - 12:15 PM', 'Room 8', ''),
(185, 'Prof. Shamal Dhodre', 'BBA 2nd Year', 'Tuesday', '12:30 PM - 01:15 PM', 'Room 8', ''),
(186, 'LIBRARY', 'BBA 2nd Year', 'Tuesday', '01:15 PM - 02:00 PM', 'Room 8', ''),
(187, 'Prof. Pratik Wankhede', 'BBA 2nd Year', 'Wednesday', '10:45 AM - 11:30 AM', 'Room 8', ''),
(188, 'Prof. Varsha Khevle', 'BBA 2nd Year', 'Wednesday', '11:30 AM - 12:15 PM', 'Room 8', ''),
(189, 'Prof. Shamal Dhodre', 'BBA 2nd Year', 'Wednesday', '12:30 PM - 01:15 PM', 'Room 8', ''),
(190, 'Prof. Pratik Wankhede', 'BBA 2nd Year', 'Wednesday', '01:15 PM - 02:00 PM', 'Room 8', ''),
(191, 'Prof. Pratik Wankhede', 'BBA 2nd Year', 'Thursday', '10:45 AM - 11:30 AM', 'Room 8', ''),
(192, 'Prof. Varsha Khevle', 'BBA 2nd Year', 'Thursday', '11:30 AM - 12:15 PM', 'Room 8', ''),
(193, 'Prof. Payal Chavhan', 'BBA 2nd Year', 'Thursday', '12:30 PM - 01:15 PM', 'Room 8', ''),
(194, 'Prof. Smita Kolarkar', 'BBA 2nd Year', 'Thursday', '01:15 PM - 02:00 PM', 'Room 8', ''),
(195, 'Prof. Pratik Wankhede', 'BBA 2nd Year', 'Friday', '10:45 AM - 11:30 AM', 'Room 8', ''),
(196, 'Prof. Payal Chavhan', 'BBA 2nd Year', 'Friday', '11:30 AM - 12:15 PM', 'Room 8', ''),
(197, 'Prof. Shamal Dhodre', 'BBA 2nd Year', 'Friday', '12:30 PM - 01:15 PM', 'Room 8', ''),
(198, 'Prof. Smita Kolarkar', 'BBA 2nd Year', 'Friday', '01:15 PM - 02:00 PM', 'Room 8', ''),
(199, 'Prof. Pratik Wankhede', 'BBA 2nd Year', 'Saturday', '10:45 AM - 11:30 AM', 'Room 8', ''),
(200, 'Prof. Varsha Khevle', 'BBA 2nd Year', 'Saturday', '11:30 AM - 12:15 PM', 'Room 8', ''),
(201, 'Prof. Smita Kolarkar', 'BBA 2nd Year', 'Saturday', '12:30 PM - 01:15 PM', 'Room 8', ''),
(202, 'Prof. Payal Chavhan', 'BBA 2nd Year', 'Saturday', '01:15 PM - 02:00 PM', 'Room 8', ''),
(203, 'Prof. Kiran Gujar', 'BBA 3rd Year', 'Monday', '10:45 AM - 11:30 AM', 'Room 9', ''),
(204, 'Prof. Shamal Dhodre', 'BBA 3rd Year', 'Monday', '11:30 AM - 12:15 PM', 'Room 9', ''),
(205, 'Prof. Payal Chavhan', 'BBA 3rd Year', 'Monday', '12:30 PM - 01:15 PM', 'Room 9', ''),
(206, 'LIBRARY', 'BBA 3rd Year', 'Monday', '01:15 PM - 02:00 PM', 'Room 9', ''),
(207, 'Prof. Varsha Khevle', 'BBA 3rd Year', 'Tuesday', '10:45 AM - 11:30 AM', 'Room 9', ''),
(208, 'Prof. Shamal Dhodre', 'BBA 3rd Year', 'Tuesday', '11:30 AM - 12:15 PM', 'Room 9', ''),
(209, 'Prof. Payal Chavhan', 'BBA 3rd Year', 'Tuesday', '12:30 PM - 01:15 PM', 'Room 9', ''),
(210, 'Prof. Kiran Gujar', 'BBA 3rd Year', 'Tuesday', '01:15 PM - 02:00 PM', 'Room 9', ''),
(211, 'Prof. Varsha Khevle', 'BBA 3rd Year', 'Wednesday', '10:45 AM - 11:30 AM', 'Room 9', ''),
(212, 'Prof. Payal Chavhan', 'BBA 3rd Year', 'Wednesday', '11:30 AM - 12:15 PM', 'Room 9', ''),
(213, 'LAB', 'BBA 3rd Year', 'Wednesday', '12:30 PM - 01:15 PM', 'Room 9', ''),
(214, 'Prof. Shraddha Wani', 'BBA 3rd Year', 'Wednesday', '01:15 PM - 02:00 PM', 'Room 9', ''),
(215, 'Prof. Varsha Khevle', 'BBA 3rd Year', 'Thursday', '10:45 AM - 11:30 AM', 'Room 9', ''),
(216, 'Prof. Shraddha Wani', 'BBA 3rd Year', 'Thursday', '11:30 AM - 12:15 PM', 'Room 9', ''),
(217, 'Prof. Shamal Dhodre', 'BBA 3rd Year', 'Thursday', '12:30 PM - 01:15 PM', 'Room 9', ''),
(218, 'Prof. Kiran Gujar', 'BBA 3rd Year', 'Thursday', '01:15 PM - 02:00 PM', 'Room 9', ''),
(219, 'Prof. Shamal Dhodre', 'BBA 3rd Year', 'Friday', '10:45 AM - 11:30 AM', 'Room 9', ''),
(220, 'Prof. Shraddha Wani', 'BBA 3rd Year', 'Friday', '11:30 AM - 12:15 PM', 'Room 9', ''),
(221, 'LAB', 'BBA 3rd Year', 'Friday', '12:30 PM - 01:15 PM', 'Room 9', ''),
(222, 'Prof. Kiran Gujar', 'BBA 3rd Year', 'Friday', '01:15 PM - 02:00 PM', 'Room 9', ''),
(223, 'Prof. Pratik Wankhede', 'MBA 1st year', 'Monday', '10:45 AM - 11:30 AM', 'Room 10', ''),
(224, 'Prof. Smita Kolarkar', 'MBA 1st year', 'Monday', '11:30 AM - 12:15 PM', 'Room 10', ''),
(225, 'Prof. Shraddha Wani', 'MBA 1st year', 'Monday', '12:30 PM - 01:15 PM', 'Room 10', ''),
(226, 'Prof. Pratik Wankhede', 'MBA 1st year', 'Monday', '01:15 PM - 02:00 PM', 'Room 10', ''),
(227, 'LAB', 'MBA 1st year', 'Tuesday', '10:45 AM - 11:30 AM', 'Room 10', ''),
(228, 'Prof. Payal Chavhan', 'MBA 1st year', 'Tuesday', '11:30 AM - 12:15 PM', 'Room 10', ''),
(229, 'Prof. Shraddha Wani', 'MBA 1st year', 'Tuesday', '12:30 PM - 01:15 PM', 'Room 10', ''),
(230, 'Prof. Pratik Wankhede', 'MBA 1st year', 'Tuesday', '01:15 PM - 02:00 PM', 'Room 10', ''),
(231, 'Prof. Pratik Wankhede', 'MBA 1st year', 'Wednesday', '11:30 AM - 12:15 PM', 'Room 10', ''),
(232, 'Prof. Shraddha Wani', 'MBA 1st year', 'Wednesday', '12:30 PM - 01:15 PM', 'Room 10', ''),
(233, 'Prof. Smita Kolarkar', 'MBA 1st year', 'Wednesday', '01:15 PM - 02:00 PM', 'Room 10', ''),
(234, 'Prof. Pratik Wankhede', 'MBA 1st year', 'Wednesday', '02:30 PM - 03:15 PM', 'Room 10', ''),
(235, 'Prof. Smita Kolarkar', 'MBA 1st year', 'Thursday', '10:45 AM - 11:30 AM', 'Room 10', ''),
(236, 'Prof. Payal Chavhan', 'MBA 1st year', 'Thursday', '11:30 AM - 12:15 PM', 'Room 10', ''),
(237, 'Prof. Varsha Khevle', 'MBA 1st year', 'Thursday', '12:30 PM - 01:15 PM', 'Room 10', ''),
(238, 'Prof. Shamal Dhodre', 'MBA 1st year', 'Thursday', '01:15 PM - 02:00 PM', 'Room 10', ''),
(239, 'Prof. Pratik Wankhede', 'MBA 1st year', 'Thursday', '02:30 PM - 03:15 PM', 'Room 10', ''),
(240, 'Prof. Payal Chavhan', 'MBA 1st year', 'Friday', '10:45 AM - 11:30 AM', 'Room 10', ''),
(241, 'Prof. Smita Kolarkar', 'MBA 1st year', 'Friday', '11:30 AM - 12:15 PM', 'Room 10', ''),
(242, 'Prof. Varsha Khevle', 'MBA 1st year', 'Friday', '12:30 PM - 01:15 PM', 'Room 10', ''),
(243, 'Prof. Shamal Dhodre', 'MBA 1st year', 'Friday', '01:15 PM - 02:00 PM', 'Room 10', ''),
(244, 'Prof. Pratik Wankhede', 'MBA 1st year', 'Friday', '02:30 PM - 03:15 PM', 'Room 10', ''),
(245, 'Prof. Shraddha Wani', 'MBA 1st year', 'Saturday', '10:45 AM - 11:30 AM', 'Room 10', ''),
(246, 'Prof. Payal Chavhan', 'MBA 1st year', 'Saturday', '11:30 AM - 12:15 PM', 'Room 10', ''),
(247, 'Prof. Varsha Khevle', 'MBA 1st year', 'Saturday', '12:30 PM - 01:15 PM', 'Room 10', ''),
(248, 'Prof. Shamal Dhodre', 'MBA 1st year', 'Saturday', '01:15 PM - 02:00 PM', 'Room 10', ''),
(249, 'Prof.Neha Ankar', 'MCA 1st Year', 'Monday', '10:45 AM - 11:30 AM', 'Room 11', ''),
(250, 'Prof. Amol Mankar', 'MCA 1st Year', 'Monday', '11:30 AM - 12:15 PM', 'Room 11', ''),
(251, 'Prof. Nikita Gujarkar', 'MCA 1st Year', 'Monday', '12:30 PM - 01:15 PM', 'Room 11', ''),
(252, 'Prof. Ashwini Kapile', 'MCA 1st Year', 'Monday', '01:15 PM - 02:00 PM', 'Room 11', ''),
(253, 'Prof. Kajal Dongare', 'MCA 1st Year', 'Tuesday', '10:45 AM - 11:30 AM', 'Room 11', ''),
(254, 'Prof. Amol Mankar', 'MCA 1st Year', 'Tuesday', '11:30 AM - 12:15 PM', 'Room 11', ''),
(255, 'LIBRARY', 'MCA 1st Year', 'Tuesday', '12:30 PM - 01:15 PM', 'Room 11', ''),
(256, 'Prof. Nikita Gujarkar', 'MCA 1st Year', 'Tuesday', '01:15 PM - 02:00 PM', 'Room 11', ''),
(257, 'Prof. Kajal Dongare', 'MCA 1st Year', 'Wednesday', '10:45 AM - 11:30 AM', 'Room 11', ''),
(258, 'Prof.Neha Ankar', 'MCA 1st Year', 'Wednesday', '11:30 AM - 12:15 PM', 'Room 11', ''),
(259, 'Prof. Nikita Gujarkar', 'MCA 1st Year', 'Wednesday', '12:30 PM - 01:15 PM', 'Room 11', ''),
(260, 'Prof. Ashwini Kapile', 'MCA 1st Year', 'Wednesday', '01:15 PM - 02:00 PM', 'Room 11', ''),
(261, 'Prof. Ashwini Kapile', 'MCA 1st Year', 'Thursday', '10:45 AM - 11:30 AM', 'Room 11', ''),
(262, 'Prof.Neha Ankar', 'MCA 1st Year', 'Thursday', '11:30 AM - 12:15 PM', 'Room 11', ''),
(263, 'Prof. Kajal Dongare', 'MCA 1st Year', 'Thursday', '10:45 AM - 11:30 AM', 'Room 11', ''),
(264, 'Prof. Amol Mankar', 'MCA 1st Year', 'Thursday', '01:15 PM - 02:00 PM', 'Room 11', ''),
(265, 'Prof. Ashwini Kapile', 'MCA 1st Year', 'Friday', '10:45 AM - 11:30 AM', 'Room 11', ''),
(266, 'Prof. Nikita Gujarkar', 'MCA 1st Year', 'Friday', '11:30 AM - 12:15 PM', 'Room 11', ''),
(267, 'Prof.Neha Ankar', 'MCA 1st Year', 'Friday', '12:30 PM - 01:15 PM', 'Room 11', ''),
(268, 'LAB', 'MCA 1st Year', 'Friday', '01:15 PM - 02:00 PM', 'Room 11', ''),
(269, 'COMPUTER LAB', 'MCA 1st Year', 'Saturday', '10:45 AM - 11:30 AM', 'Room 11', ''),
(270, 'COMPUTER LAB', 'MCA 1st Year', 'Saturday', '12:30 PM - 01:15 PM', 'Room 11', ''),
(271, 'Prof. Mohini Masram', 'MCA 2nd Year', 'Monday', '10:45 AM - 11:30 AM', 'Room 12', ''),
(272, 'Prof. Ashwini Kapile', 'MCA 2nd Year', 'Monday', '11:30 AM - 12:15 PM', 'Room 12', ''),
(273, 'Prof.Neha Ankar', 'MCA 2nd Year', 'Monday', '12:30 PM - 01:15 PM', 'Room 12', ''),
(274, 'Prof. Nikita Gujarkar', 'MCA 2nd Year', 'Monday', '01:15 PM - 02:00 PM', 'Room 12', ''),
(275, 'Prof. Mohini Masram', 'MCA 2nd Year', 'Tuesday', '10:45 AM - 11:30 AM', 'Room 12', ''),
(276, 'Prof. Ashwini Kapile', 'MCA 2nd Year', 'Tuesday', '11:30 AM - 12:15 PM', 'Room 12', ''),
(277, 'Prof.Neha Ankar', 'MCA 2nd Year', 'Tuesday', '12:30 PM - 01:15 PM', 'Room 12', ''),
(278, 'LAB', 'MCA 2nd Year', 'Tuesday', '01:15 PM - 02:00 PM', 'Room 12', ''),
(279, 'Prof. Mohini Masram', 'MCA 2nd Year', 'Wednesday', '10:45 AM - 11:30 AM', 'Room 12', ''),
(280, 'Prof. Ashwini Kapile', 'MCA 2nd Year', 'Wednesday', '11:30 AM - 12:15 PM', 'Room 12', ''),
(281, 'Prof. Amol Mankar', 'MCA 2nd Year', 'Wednesday', '12:30 PM - 01:15 PM', 'Room 12', ''),
(282, 'Prof. Nikita Gujarkar', 'MCA 2nd Year', 'Wednesday', '01:15 PM - 02:00 PM', 'Room 12', ''),
(283, 'Prof. Nikita Gujarkar', 'MCA 2nd Year', 'Thursday', '11:30 AM - 12:15 PM', 'Room 12', ''),
(284, 'Prof. Amol Mankar', 'MCA 2nd Year', 'Thursday', '12:30 PM - 01:15 PM', 'Room 12', ''),
(285, 'Prof. Mohini Masram', 'MCA 2nd Year', 'Thursday', '01:15 PM - 02:00 PM', 'Room 12', ''),
(286, 'LAB', 'MCA 2nd Year', 'Friday', '11:30 AM - 12:15 PM', 'Room 12', ''),
(287, 'Prof. Amol Mankar', 'MCA 2nd Year', 'Friday', '12:30 PM - 01:15 PM', 'Room 12', ''),
(288, 'Prof. Nikita Gujarkar', 'MCA 2nd Year', 'Friday', '01:15 PM - 02:00 PM', 'Room 12', ''),
(289, 'Prof. Ashwini Kapile', 'MCA 2nd Year', 'Saturday', '11:30 AM - 12:15 PM', 'Room 12', ''),
(290, 'Prof.Neha Ankar', 'MCA 2nd Year', 'Saturday', '12:30 PM - 01:15 PM', 'Room 12', '');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_users`
--

CREATE TABLE `faculty_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `faculty_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_classes`
--

CREATE TABLE `university_classes` (
  `id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `college_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `university_classes`
--

INSERT INTO `university_classes` (`id`, `class_name`, `college_code`) VALUES
(1, 'MCA 1st Year', ''),
(2, 'MCA 2nd Year', ''),
(3, 'BCA 1st Year', ''),
(4, 'BCA 2nd Year', ''),
(5, 'BCA 3rd Year', ''),
(6, 'BBA 1st Year', ''),
(8, 'BBA 3rd Year', ''),
(9, 'BBA 2nd Year', ''),
(10, 'BCCA 1st Year', ''),
(11, 'BCCA 2nd Year', ''),
(12, 'BCCA 3rd Year', ''),
(13, 'MBA 1st year', ''),
(14, 'MBA 2nd Year', ''),
(15, 'Prof. Ashwini Kapile', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `college_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `college_code`) VALUES
(1, 'admin', 'admin1234\r\n\r\n', '2026-06-19 10:01:04', 'RAICSIT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty_directory`
--
ALTER TABLE `faculty_directory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faculty_name` (`faculty_name`);

--
-- Indexes for table `faculty_schedule`
--
ALTER TABLE `faculty_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_users`
--
ALTER TABLE `faculty_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `university_classes`
--
ALTER TABLE `university_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class_name` (`class_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `college_code` (`college_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty_directory`
--
ALTER TABLE `faculty_directory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `faculty_schedule`
--
ALTER TABLE `faculty_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- AUTO_INCREMENT for table `faculty_users`
--
ALTER TABLE `faculty_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_classes`
--
ALTER TABLE `university_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
