-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 10:15 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attend`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_ID` int(11) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `number_on_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `time_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_ID`, `student_id`, `number_on_id`, `name`, `time_added`) VALUES
(2, 1438621678, 0, 'Marlon Abel', '2022-11-09'),
(6, 1763409101, 0, 'Aidam Tamondong', '2022-12-06'),
(7, 1445608270, 202001236, 'Adrian Joseph Lauresta ', '2023-01-25'),
(24, 1439101054, 0, 'John Michael M. Condesa', '2022-11-09'),
(26, 2147483641, 0, 'Christian Jay A. Marasigan', '2023-02-23'),
(27, 2147483642, 0, 'Kenneth F. Licop', '2023-02-23'),
(28, 2147483643, 0, 'Clarence  S. Cordial', '2023-02-23'),
(30, 1773279229, 0, 'Julieto C. Lirazan Jr.', '2023-02-23'),
(299, 110675100062, 0, 'John Rick Magtibay', '2023-03-27'),
(300, 110675100094, 0, 'John Gerald Ylagan', '2023-03-27'),
(301, 110664100011, 0, 'Jess Christian De Roxas', '2023-03-27'),
(302, 110677100025, 0, 'Kent  Sydrein Fabunan', '2023-03-27'),
(303, 110683100116, 0, 'Carl Japhet Pahuay', '2023-03-27'),
(304, 110677100033, 0, 'John Lee Neo Josue', '2023-03-27'),
(305, 542031901531, 0, 'Jay-R Selladona', '2023-03-27'),
(306, 110680100028, 0, 'Rex Delfin', '2023-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `morning_in` time DEFAULT NULL,
  `morning_out` time DEFAULT NULL,
  `afternoon_in` time DEFAULT NULL,
  `afternoon_out` time DEFAULT NULL,
  `date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `std_id`, `morning_in`, `morning_out`, `afternoon_in`, `afternoon_out`, `date`) VALUES
(1, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-09'),
(3, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-10'),
(6, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-25'),
(7, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-26'),
(8, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-27'),
(9, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-30'),
(10, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-31'),
(11, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-01'),
(12, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-02'),
(13, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-04'),
(14, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-06'),
(15, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-08'),
(16, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-09'),
(17, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-11'),
(19, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-12'),
(20, 1439101054, '08:00:00', '12:00:00', '00:00:00', '00:00:00', '2023-02-13'),
(23, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-10'),
(24, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-11'),
(25, 1439101054, '08:00:00', '12:00:00', '00:00:00', '00:00:00', '2022-11-12'),
(26, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-13'),
(28, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-16'),
(29, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-17'),
(30, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-14'),
(31, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-18'),
(32, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-19'),
(33, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-22'),
(34, 1439101054, '08:00:00', '12:00:00', '00:00:00', '00:00:00', '2022-11-23'),
(35, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-24'),
(36, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-25'),
(37, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-26'),
(38, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-28'),
(39, 1439101054, '08:00:00', '12:00:00', '00:00:00', '00:00:00', '2022-11-29'),
(41, 1439101054, '00:00:00', '00:00:00', '13:00:00', '17:00:00', '2022-12-01'),
(42, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-02'),
(43, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-03'),
(44, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-05'),
(45, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-06'),
(46, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-07'),
(47, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-09'),
(49, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-15'),
(50, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-16'),
(51, 1439101054, '10:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-17'),
(52, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-10'),
(53, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-09'),
(54, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-12'),
(55, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-13'),
(56, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-14'),
(57, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-16'),
(58, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-18'),
(59, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-19'),
(60, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-20'),
(61, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-21'),
(62, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-23'),
(63, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-24'),
(64, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-25'),
(65, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-26'),
(66, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-27'),
(69, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-31'),
(70, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-01'),
(71, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-02'),
(72, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-03'),
(73, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-04'),
(74, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-06'),
(75, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-07'),
(76, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-08'),
(77, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-09'),
(78, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-10'),
(79, 1445608270, '08:28:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-13'),
(82, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-14'),
(83, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-14'),
(119, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-15'),
(120, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-15'),
(121, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-16'),
(122, 1445608270, '08:00:00', '12:00:00', '01:00:00', '05:00:00', '2023-02-17'),
(124, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-17'),
(132, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-28'),
(133, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-30'),
(134, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-09'),
(135, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-10'),
(136, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-11'),
(137, 1438621678, '08:00:00', '12:00:00', '00:00:00', '00:00:00', '2022-11-12'),
(138, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-14'),
(141, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-16'),
(142, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-17'),
(143, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-18'),
(144, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-19'),
(145, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-22'),
(146, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-23'),
(147, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-24'),
(148, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-25'),
(149, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-26'),
(150, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-28'),
(151, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-11-29'),
(152, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-01'),
(153, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-02'),
(154, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-03'),
(155, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-17'),
(156, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-05'),
(157, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-06'),
(158, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-07'),
(159, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-09'),
(160, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-10'),
(161, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-13'),
(162, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-15'),
(163, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-16'),
(164, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-17'),
(165, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-04'),
(167, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-09'),
(168, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-12'),
(169, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-13'),
(170, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-14'),
(171, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-16'),
(172, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-18'),
(173, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-19'),
(174, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-20'),
(175, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-21'),
(176, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-23'),
(177, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-24'),
(178, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-25'),
(179, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-26'),
(180, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-27'),
(181, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-28'),
(182, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-30'),
(183, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-31'),
(184, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-01'),
(185, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-02'),
(186, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-03'),
(187, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-04'),
(188, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-06'),
(189, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-07'),
(190, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-08'),
(191, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-09'),
(192, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-10'),
(193, 1438621678, '08:00:00', '12:00:00', '00:00:00', '00:00:00', '2023-02-11'),
(194, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-13'),
(195, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-14'),
(196, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-15'),
(197, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-16'),
(198, 1445608270, '08:00:00', '12:00:00', '01:00:00', '05:00:00', '2023-02-18'),
(199, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-20'),
(200, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-20'),
(201, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-20'),
(202, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-21'),
(203, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-21'),
(205, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-22'),
(206, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-22'),
(214, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-22'),
(215, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-23'),
(216, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-23'),
(217, 1773279229, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-23'),
(222, 1438621678, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-23'),
(223, 2147483647, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-23'),
(278, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-25'),
(279, 1773279229, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-25'),
(280, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-24'),
(281, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-24'),
(282, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-27'),
(283, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-27'),
(284, 1445608270, '08:24:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-28'),
(287, 1439101054, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-01'),
(288, 1445608270, '08:18:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-01'),
(292, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-02'),
(293, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-04'),
(294, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-03'),
(295, 1439101054, '08:00:00', '10:00:00', '00:00:00', '00:00:00', '2023-03-06'),
(296, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-06'),
(297, 1763409101, '08:21:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-06'),
(298, 1763409101, '08:50:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-06'),
(299, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-07'),
(300, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-09'),
(301, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-10'),
(302, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-13'),
(303, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-15'),
(304, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-16'),
(305, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2022-12-17'),
(306, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-09'),
(307, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-10'),
(308, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-11'),
(309, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-13'),
(310, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-14'),
(311, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-16'),
(312, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-18'),
(313, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-19'),
(314, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-20'),
(315, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-21'),
(316, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-23'),
(317, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-24'),
(318, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-25'),
(319, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-26'),
(320, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-27'),
(321, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-28'),
(322, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-31'),
(323, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-01'),
(324, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-02'),
(325, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-03'),
(326, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-01-04'),
(327, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-06'),
(328, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-04'),
(329, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-09'),
(330, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-10'),
(332, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-11'),
(336, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-13'),
(337, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-14'),
(338, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-15'),
(339, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-16'),
(340, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-17'),
(341, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-18'),
(342, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-20'),
(343, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-21'),
(344, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-22'),
(345, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-23'),
(346, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-24'),
(347, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-25'),
(349, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-27'),
(350, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-02-28'),
(351, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-01'),
(352, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-02'),
(353, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-04'),
(354, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-07'),
(355, 1763409101, '08:00:00', '12:00:00', '13:15:18', '17:00:00', '2023-03-07'),
(356, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-08'),
(359, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-09'),
(360, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-10'),
(361, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-10'),
(362, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-11'),
(363, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-11'),
(364, 6767, NULL, NULL, NULL, NULL, ''),
(365, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-13'),
(366, 1763409101, '00:00:00', '00:00:00', '13:00:00', '17:00:00', '2023-03-13'),
(367, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-14'),
(369, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-14'),
(370, 45, '10:29:00', NULL, '00:00:00', '00:00:00', '2023-03-14'),
(371, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-15'),
(372, 1763409101, '00:00:00', '00:00:00', '13:00:00', '17:00:00', '2023-03-15'),
(373, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-16'),
(375, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-16'),
(376, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-17'),
(378, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-18'),
(379, 1763409101, '00:00:00', '00:00:00', '13:00:00', '17:00:00', '2023-03-18'),
(380, 1445608270, '08:23:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-20'),
(381, 1763409101, '08:24:00', '12:00:00', '00:00:00', '00:00:00', '2023-03-20'),
(382, 1773279229, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-27'),
(383, 1773279229, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-07'),
(384, 2147483647, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-25'),
(385, 2147483647, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-27'),
(386, 2147483647, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-07'),
(387, 2147483641, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-07'),
(388, 2147483641, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-27'),
(389, 2147483641, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-25'),
(390, 2147483641, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-23'),
(391, 2147483643, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-07'),
(392, 2147483643, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-27'),
(393, 2147483643, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-25'),
(394, 2147483643, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-23'),
(395, 2147483642, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-07'),
(396, 2147483642, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-27'),
(397, 2147483642, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-25'),
(398, 2147483642, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-23'),
(399, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-21'),
(400, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-21'),
(401, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-22'),
(402, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-23'),
(403, 2147483641, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-24'),
(404, 2147483641, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-28'),
(405, 2147483641, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-01'),
(406, 2147483641, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-02'),
(407, 2147483641, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-03'),
(408, 2147483641, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-06'),
(409, 2147483643, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-24'),
(410, 2147483643, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-28'),
(411, 2147483643, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-02'),
(412, 2147483643, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-03'),
(413, 2147483643, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-06'),
(414, 2147483643, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-01'),
(415, 2147483647, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-24'),
(416, 2147483647, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-28'),
(417, 2147483647, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-01'),
(418, 2147483647, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-02'),
(419, 2147483647, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-06'),
(420, 2147483647, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-03'),
(421, 1773279229, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-24'),
(422, 1773279229, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-28'),
(423, 1773279229, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-01'),
(424, 1773279229, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-02'),
(425, 1773279229, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-03'),
(426, 1773279229, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-06'),
(427, 2147483642, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-24'),
(428, 2147483642, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-02-28'),
(429, 2147483642, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-01'),
(430, 2147483642, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-02'),
(431, 2147483642, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-03'),
(432, 2147483642, '08:00:00', '12:00:00', '13:00:00', '16:00:00', '2023-03-06'),
(433, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-24'),
(434, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-25'),
(435, 1445608270, '08:22:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-25'),
(436, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-27'),
(437, 1763409101, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-27'),
(438, 2147483647, NULL, NULL, NULL, NULL, ''),
(439, 65, NULL, NULL, NULL, NULL, ''),
(440, 2147483647, NULL, NULL, NULL, NULL, ''),
(441, 23, NULL, NULL, NULL, NULL, ''),
(442, 45, NULL, NULL, NULL, NULL, ''),
(443, 6767, NULL, NULL, NULL, NULL, ''),
(444, 56, NULL, NULL, NULL, NULL, ''),
(445, 65, NULL, NULL, NULL, NULL, ''),
(446, 4545, NULL, NULL, NULL, NULL, ''),
(447, 7777, NULL, NULL, NULL, NULL, ''),
(448, 5666, NULL, NULL, NULL, NULL, ''),
(449, 2147483647, NULL, NULL, NULL, NULL, ''),
(450, 2147483647, NULL, NULL, NULL, NULL, ''),
(451, 2147483647, NULL, NULL, NULL, NULL, ''),
(452, 2147483647, NULL, NULL, NULL, NULL, ''),
(453, 2147483647, NULL, NULL, NULL, NULL, ''),
(454, 2147483647, NULL, NULL, NULL, NULL, ''),
(455, 2147483647, NULL, NULL, NULL, NULL, ''),
(456, 2147483647, NULL, NULL, NULL, NULL, ''),
(457, 1445608270, '08:00:00', '12:00:00', '13:00:00', '17:00:00', '2023-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `default_time`
--

CREATE TABLE `default_time` (
  `id` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `morning_timein` time NOT NULL,
  `morning_timeout` time NOT NULL,
  `afternoon_timein` time NOT NULL,
  `afternoon_timeout` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `default_time`
--

INSERT INTO `default_time` (`id`, `status`, `morning_timein`, `morning_timeout`, `afternoon_timein`, `afternoon_timeout`) VALUES
(1, 'Ontime', '08:00:00', '12:00:00', '13:00:00', '17:00:00'),
(2, 'Late', '00:00:00', '00:00:00', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `try`
--

CREATE TABLE `try` (
  `id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `time1` datetime NOT NULL,
  `time2` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL,
  `access` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `access`) VALUES
(1, 'admin', 'admin123', 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_ID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `default_time`
--
ALTER TABLE `default_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `try`
--
ALTER TABLE `try`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=458;

--
-- AUTO_INCREMENT for table `default_time`
--
ALTER TABLE `default_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `try`
--
ALTER TABLE `try`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;