-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2016 at 06:42 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_myshow`
--
CREATE DATABASE IF NOT EXISTS `book_myshow` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `book_myshow`;

-- --------------------------------------------------------

--
-- Table structure for table `boarding_point`
--

CREATE TABLE `boarding_point` (
  `boarding_id` int(15) NOT NULL,
  `boarding_point_name` varchar(50) NOT NULL,
  `leave_time` time NOT NULL,
  `launch_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boarding_point`
--

INSERT INTO `boarding_point` (`boarding_id`, `boarding_point_name`, `leave_time`, `launch_id`) VALUES
(1, 'Badamtali Launch Ghat', '03:30:00', 1),
(2, 'SadarGhat ', '06:30:00', 1),
(3, 'Shimultoli RailGhat', '02:33:00', 2),
(4, 'SadarGhat Bus stand', '08:13:00', 1),
(5, 'Dakatia Bill hat', '05:48:00', 3),
(6, 'Kustia zilla school stand', '03:13:00', 2),
(7, 'Sadarghat ', '04:28:00', 4),
(8, 'Abdullahpur bus Stand', '06:00:00', 5),
(9, 'Gazipur nou ghat', '05:00:00', 6);

-- --------------------------------------------------------

--
-- Table structure for table `booking_ticket_for_theatre`
--

CREATE TABLE `booking_ticket_for_theatre` (
  `booking_id` int(1) NOT NULL,
  `user_id` int(1) NOT NULL,
  `theatre_show_time_id` int(1) NOT NULL,
  `date_of_booking` date NOT NULL,
  `show_time_id` int(1) NOT NULL,
  `ticket_rate_id` int(1) NOT NULL,
  `number_of_seats` int(10) NOT NULL,
  `seat_numbers` varchar(32) CHARACTER SET utf8 NOT NULL,
  `theatre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_ticket_for_theatre`
--

INSERT INTO `booking_ticket_for_theatre` (`booking_id`, `user_id`, `theatre_show_time_id`, `date_of_booking`, `show_time_id`, `ticket_rate_id`, `number_of_seats`, `seat_numbers`, `theatre_id`) VALUES
(1, 3, 3, '2016-08-03', 1, 1, 3, '1,2,3', 0),
(2, 3, 4, '2016-08-05', 2, 1, 3, '6,16,26', 0),
(3, 4, 3, '2016-08-03', 1, 2, 5, '122,123,124,125,126', 0),
(4, 3, 3, '2016-08-03', 4, 2, 3, '101,102,103', 0),
(5, 3, 3, '2016-08-03', 3, 2, 2, '116,117', 0),
(6, 3, 3, '2016-08-04', 3, 1, 3, '54,56,57', 0),
(7, 5, 8, '2016-08-09', 1, 1, 3, '2,3,4', 0),
(8, 5, 8, '2016-08-09', 1, 1, 3, '16,26,36', 0),
(9, 5, 8, '2016-08-09', 1, 1, 4, '42,43,44,45', 0),
(10, 5, 8, '2016-08-09', 2, 2, 2, '104,106', 0),
(11, 5, 8, '2016-08-09', 4, 2, 4, '94,95,96,97', 2),
(12, 5, 8, '2016-08-09', 3, 3, 4, '155,156,157,158', 2),
(13, 6, 8, '2016-08-09', 1, 2, 5, '96,107,108,109,110', 2),
(14, 6, 8, '2016-08-10', 3, 2, 4, '85,86,87,88', 2),
(15, 8, 11, '2016-08-10', 3, 2, 2, '95,96', 4),
(16, 5, 8, '2016-08-11', 1, 1, 3, '44,45,46', 2),
(17, 5, 12, '2016-08-14', 1, 1, 2, '15,16', 4),
(18, 5, 12, '2016-08-15', 1, 1, 4, '24,25,26,27', 4);

-- --------------------------------------------------------

--
-- Table structure for table `bus_reserve`
--

CREATE TABLE `bus_reserve` (
  `id` int(50) NOT NULL,
  `bus_name` varchar(50) NOT NULL,
  `bus_info` varchar(100) NOT NULL,
  `city_from` varchar(50) NOT NULL,
  `city_to` varchar(50) NOT NULL,
  `seat` int(100) NOT NULL,
  `fare` int(100) NOT NULL,
  `dtime` time NOT NULL,
  `arrtime` time NOT NULL,
  `dept_date` date NOT NULL,
  `arr_date` date NOT NULL,
  `reserve_seat_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_reserve`
--

INSERT INTO `bus_reserve` (`id`, `bus_name`, `bus_info`, `city_from`, `city_to`, `seat`, `fare`, `dtime`, `arrtime`, `dept_date`, `arr_date`, `reserve_seat_id`) VALUES
(1, 'Ena Transport (Pvt) Ltd', 'Hino, AK1J Super Plus', 'Dhaka', 'Dinajpur', 80, 250, '05:00:00', '09:00:00', '2016-08-11', '2016-08-14', 4),
(2, 'Green Line Paribahan', 'Scania, Business Class AC', 'Dhaka', 'Bogra', 59, 256, '19:00:00', '12:00:00', '2016-08-11', '2016-08-13', 3),
(3, 'soudia transport', 'Scania, Business Class AC', 'Dhaka', 'Bogra', 260, 250, '01:00:00', '06:00:00', '2016-08-13', '2016-08-14', 5),
(4, 'Ena Transport (Pvt) Ltd', 'Scania, Business Class AC', 'Dhaka', 'Khulna', 70, 125, '20:00:00', '22:00:00', '2016-08-20', '2016-08-21', 6);

-- --------------------------------------------------------

--
-- Table structure for table `cabin`
--

CREATE TABLE `cabin` (
  `cabin_id` int(20) NOT NULL,
  `cabin_name` varchar(36) NOT NULL,
  `launch_type_id` varchar(50) NOT NULL,
  `capacity` varchar(20) NOT NULL,
  `launch_id` int(20) NOT NULL,
  `price` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabin`
--

INSERT INTO `cabin` (`cabin_id`, `cabin_name`, `launch_type_id`, `capacity`, `launch_id`, `price`) VALUES
(1, 'cabin-1', '1', '250', 1, '1000'),
(2, 'cabin-2', '2', '150', 1, '950'),
(3, 'cabin-3', '3', '150', 1, '500'),
(4, 'cabin-1', '1', '150', 2, '1000'),
(5, 'cabin-2', '2', '250', 2, '800'),
(6, 'cabin-3', '3', '300', 2, '500'),
(7, 'cabin-1', '1', '150', 3, '1200'),
(8, 'cabin-2', '2', '150', 3, '900'),
(9, 'cabin-3', '3', '300', 3, '500');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(10) NOT NULL,
  `city` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city`) VALUES
(1, 'Dhaka'),
(2, 'Mirpur'),
(3, 'Uttara '),
(4, 'Gulistan'),
(5, 'Badda');

-- --------------------------------------------------------

--
-- Table structure for table `launch_booking`
--

CREATE TABLE `launch_booking` (
  `ln_book_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `dept_id` int(20) NOT NULL,
  `date_of_booking` date NOT NULL,
  `cabin_id` int(20) NOT NULL,
  `number_of_seats` int(20) NOT NULL,
  `seat_numbers` varchar(50) NOT NULL,
  `boarding_id` int(20) NOT NULL,
  `ticket_rate_id` int(30) NOT NULL,
  `dept_time_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `launch_booking`
--

INSERT INTO `launch_booking` (`ln_book_id`, `user_id`, `dept_id`, `date_of_booking`, `cabin_id`, `number_of_seats`, `seat_numbers`, `boarding_id`, `ticket_rate_id`, `dept_time_id`) VALUES
(1, 5, 1, '2016-08-12', 2, 3, '22,23,24', 1, 0, 0),
(2, 0, 0, '0000-00-00', 0, 0, '', 0, 0, 0),
(3, 5, 1, '2016-08-11', 2, 2, '55,56', 1, 1, 0),
(4, 5, 2, '2016-08-12', 1, 3, '43,44,45', 3, 0, 0),
(5, 5, 2, '2016-08-12', 1, 3, '43,44,45', 3, 0, 0),
(6, 5, 2, '2016-08-13', 1, 2, '12,13', 3, 0, 0),
(7, 5, 2, '2016-08-13', 1, 4, '56,57,58,59', 3, 1, 0),
(8, 5, 1, '2016-08-13', 1, 1, '6', 1, 1, 0),
(9, 5, 1, '2016-08-14', 1, 2, '14,15', 2, 1, 0),
(10, 5, 1, '2016-08-14', 1, 3, '13,14,15', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `launch_cabin`
--

CREATE TABLE `launch_cabin` (
  `cabin_id` int(15) NOT NULL,
  `cabin_name` varchar(30) NOT NULL,
  `launch_id` int(30) NOT NULL,
  `boarding_id` int(30) NOT NULL,
  `capacity` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `launch_cabin`
--

INSERT INTO `launch_cabin` (`cabin_id`, `cabin_name`, `launch_id`, `boarding_id`, `capacity`) VALUES
(1, 'A type', 1, 1, 200),
(2, 'B type', 1, 2, 200),
(3, 'C type', 1, 3, 150),
(4, 'D type', 2, 3, 140),
(5, 'A type', 2, 4, 160);

-- --------------------------------------------------------

--
-- Table structure for table `launch_capacity`
--

CREATE TABLE `launch_capacity` (
  `launch_cp_id` int(20) NOT NULL,
  `capacity` varchar(30) NOT NULL,
  `launch_id` int(20) NOT NULL,
  `boarding_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `launch_capacity`
--

INSERT INTO `launch_capacity` (`launch_cp_id`, `capacity`, `launch_id`, `boarding_id`) VALUES
(1, '150', 1, 1),
(2, '200', 2, 0),
(3, '100', 3, 0),
(4, '150', 4, 0),
(5, '200', 5, 0),
(6, '250', 6, 0),
(7, '150', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `launch_dept_date`
--

CREATE TABLE `launch_dept_date` (
  `dept_id` int(15) NOT NULL,
  `cabin_id` int(15) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `launch_dept_date`
--

INSERT INTO `launch_dept_date` (`dept_id`, `cabin_id`, `start_date`, `end_date`) VALUES
(1, 1, '2016-08-11', '2016-08-13'),
(2, 2, '2016-08-11', '2016-08-14'),
(3, 1, '2016-08-14', '2016-08-16'),
(4, 2, '2016-08-14', '2016-08-16'),
(5, 3, '2016-08-14', '2016-08-17'),
(6, 4, '2016-08-14', '2016-08-15'),
(7, 5, '2016-08-14', '2016-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `launch_dept_time`
--

CREATE TABLE `launch_dept_time` (
  `dept_time_id` int(15) NOT NULL,
  `dept_time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `launch_dept_time`
--

INSERT INTO `launch_dept_time` (`dept_time_id`, `dept_time`) VALUES
(1, 'Morning time(07-09.00)'),
(2, 'Night time(09-10.30)'),
(3, 'Evning time'),
(4, 'Late Night time');

-- --------------------------------------------------------

--
-- Table structure for table `launch_info`
--

CREATE TABLE `launch_info` (
  `launch_id` int(10) NOT NULL,
  `launch_name` varchar(50) NOT NULL,
  `launch_info` varchar(100) NOT NULL,
  `city_from` varchar(11) NOT NULL,
  `city_to` varchar(30) NOT NULL,
  `seat` int(40) NOT NULL,
  `dtime` time NOT NULL,
  `arrtime` time NOT NULL,
  `dept_date` date NOT NULL,
  `arr_date` date NOT NULL,
  `reserve_id` int(15) NOT NULL,
  `fare_range` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `launch_info`
--

INSERT INTO `launch_info` (`launch_id`, `launch_name`, `launch_info`, `city_from`, `city_to`, `seat`, `dtime`, `arrtime`, `dept_date`, `arr_date`, `reserve_id`, `fare_range`) VALUES
(11, 'Mv fotulla', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, consequatur incidunt magni veritatis n', 'Dhaka', 'Noagaon', 150, '05:00:00', '07:00:00', '2016-08-21', '2016-08-22', 3, '200-1000');

-- --------------------------------------------------------

--
-- Table structure for table `launch_reserve`
--

CREATE TABLE `launch_reserve` (
  `r_id` int(10) NOT NULL,
  `user_id` int(20) NOT NULL,
  `seat_number` varchar(100) NOT NULL,
  `payable` int(10) NOT NULL,
  `transaction_code` varchar(50) NOT NULL,
  `dept_date` date NOT NULL,
  `book_type` varchar(100) NOT NULL,
  `total_seat_no` int(10) NOT NULL,
  `reserve_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `launch_reserve`
--

INSERT INTO `launch_reserve` (`r_id`, `user_id`, `seat_number`, `payable`, `transaction_code`, `dept_date`, `book_type`, `total_seat_no`, `reserve_id`) VALUES
(3, 9, '5,6', 2000, 'jnocgnrk', '2016-08-21', '1', 2, 3),
(4, 9, '17,18', 1600, '8tysuc7i', '2016-08-21', '2', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `launch_route`
--

CREATE TABLE `launch_route` (
  `city_id` int(10) NOT NULL,
  `city_from` varchar(50) NOT NULL,
  `city_to` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `launch_route`
--

INSERT INTO `launch_route` (`city_id`, `city_from`, `city_to`) VALUES
(1, 'Dhaka', 'Barisal'),
(2, 'Dhaka', 'Comilla'),
(3, 'Dhaka ', 'Chittagaon'),
(4, 'Dhaka', 'kustia'),
(5, 'Dhaka ', 'Sylet '),
(6, 'Dhaka', 'Chandpur'),
(7, 'Dhaka', 'Bagerhat'),
(8, 'Dhaka', 'Alimabad'),
(9, 'Dhaka', 'Auliyapur'),
(10, 'Dhaka', 'Anondo Bazar');

-- --------------------------------------------------------

--
-- Table structure for table `launch_type`
--

CREATE TABLE `launch_type` (
  `launch_type_id` int(20) NOT NULL,
  `launch_type_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `launch_type`
--

INSERT INTO `launch_type` (`launch_type_id`, `launch_type_name`, `price`) VALUES
(1, 'Double Ac', 1000),
(2, 'Single Ac', 800),
(3, 'Non Ac', 600);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(10) NOT NULL,
  `movie_name` varchar(50) NOT NULL,
  `movie_director` varchar(30) NOT NULL,
  `movie_decription` varchar(255) NOT NULL,
  `movie_language` varchar(30) NOT NULL,
  `movie_poster` varchar(255) NOT NULL,
  `islive` varchar(50) NOT NULL,
  `image_name` varchar(500) NOT NULL,
  `image_type` varchar(500) NOT NULL,
  `image_path` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_name`, `movie_director`, `movie_decription`, `movie_language`, `movie_poster`, `islive`, `image_name`, `image_type`, `image_path`) VALUES
(2, 'Son Of Sardars', 'Ashwni Dhir', 'Bollywood Action Comedy Film', 'Hindi', 'files/Son-Of-Sardars.png', 'running', '', '', ''),
(3, 'Jab Tak Hai Jann', 'Yash chopra', 'Indian Romance Movie By Late Yash Raj', 'Hindi', 'files/Jab-Tak-Hai-Jann.png', 'running', '', '', ''),
(4, 'Sky Fall', 'Sam Mendes', 'Latest Bond Movie of 2012', 'English', 'files/Sky-Fall.png', 'running', '', '', ''),
(5, 'Denikaina Ready', 'G. Nageswara Reddy', 'Slapstick telugu movie with comedy', 'Telugu', 'files/Denikaina-Ready.png', 'running', '', '', ''),
(6, 'Student Of The Year', 'karan johar', 'Indian Comedy with touch of romance', 'Hindi', 'files/Student-Of-The-Year.png', 'not running', '', '', ''),
(7, 'Life Of Pie', 'Ang Lee', 'Hollywood film based on Fantasy Novel', 'English', 'files/Life-Of-Pie.png', 'running', '', '', ''),
(8, 'English Vinglish', 'Gauri Shinde', 'House-wife comedy Drama', 'Hindi', 'files/English-Vinglish.png', 'running', '', '', ''),
(9, 'Krantiveera Sangolli Rayanna', 'naganna', 'Based on freedom fighter Rayanna', 'kannada', 'files/krantiveera.png', 'running', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `reserve_list`
--

CREATE TABLE `reserve_list` (
  `reserve_id` int(11) NOT NULL,
  `total_reserve` varchar(255) NOT NULL,
  `busno` varchar(30) NOT NULL,
  `transaction_code` varchar(10) NOT NULL,
  `setnum` varchar(100) NOT NULL,
  `seat_remain` varchar(100) NOT NULL,
  `reserve_seat_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserve_list`
--

INSERT INTO `reserve_list` (`reserve_id`, `total_reserve`, `busno`, `transaction_code`, `setnum`, `seat_remain`, `reserve_seat_id`) VALUES
(27, 'a:4:{i:0;s:1:"5";i:1;s:1:"6";i:2;s:1:"7";i:3;s:1:"8";}', '1', '', '5,6,7,8', '', 4),
(28, 'a:4:{i:0;s:1:"9";i:1;s:1:"10";i:2;s:1:"11";i:3;s:1:"12";}', '1', '', '9,10,11,12', '', 4),
(29, 'a:3:{i:0;s:1:"9";i:1;s:2:"10";i:2;s:2:"11";}', '3', '', '9,10,11', '', 5),
(30, '', '3', '', '18,17,17,29,30', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reserve_section`
--

CREATE TABLE `reserve_section` (
  `id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `seat` varchar(11) NOT NULL,
  `setnum` varchar(100) NOT NULL,
  `transaction_code` varchar(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  `payable` varchar(11) NOT NULL,
  `reserve_seat_id` int(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserve_section`
--

INSERT INTO `reserve_section` (`id`, `user_id`, `firstname`, `lastname`, `contact`, `address`, `seat`, `setnum`, `transaction_code`, `status`, `payable`, `reserve_seat_id`, `date`) VALUES
(1, 5, 'aklima', 'akther', '01725365455', 'uttara dhaka', '70', '2,3,4', '', '', '375', 6, '2016-08-20'),
(2, 0, '', '', '', '', '', '', '', '', '', 0, '0000-00-00'),
(3, 5, 'gjgjhgjy', 'mhbmhbjh', '026595989', 'jmnjhbjhjgjggv', '4', '5,6,7,8', 'c6w63owc', '', '0', 6, '2016-08-20'),
(4, 5, 'afroz', 'nahar', '453434', 'houselerere', '2', '15,16', 'er827miy', '', '250', 6, '2016-08-20'),
(5, 9, 'kk', 'r', '026595989', 'kk', '2', '1,2', 'gk0yqfg2', '', '250', 6, '2016-08-20');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `rid` int(10) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`rid`, `role`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'editor');

-- --------------------------------------------------------

--
-- Table structure for table `route_one`
--

CREATE TABLE `route_one` (
  `route_id` int(10) NOT NULL,
  `route_to` varchar(50) NOT NULL,
  `route_from` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route_one`
--

INSERT INTO `route_one` (`route_id`, `route_to`, `route_from`) VALUES
(1, 'Dhaka', 'Dhaka'),
(2, 'Dinajpur', 'Dinajpur'),
(3, 'Cox''s Bazar', 'Cox''s Bazar'),
(4, 'Bogra', 'Bogra'),
(5, 'Khulna', 'Khulna'),
(6, 'Moulvibazar', 'Moulvibazar'),
(7, 'Jessore', 'Jessore'),
(8, 'Tangail', 'Tangail'),
(9, 'Panchagor', 'Panchagor'),
(10, 'Feni', 'Feni'),
(11, 'Noagaon', 'Noagaon'),
(12, 'Sylhet', 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `screens`
--

CREATE TABLE `screens` (
  `screen_id` int(10) NOT NULL,
  `screen_name` varchar(50) NOT NULL,
  `theatre_id` int(15) NOT NULL,
  `movie_id` int(15) NOT NULL,
  `screen_capactiy` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `screens`
--

INSERT INTO `screens` (`screen_id`, `screen_name`, `theatre_id`, `movie_id`, `screen_capactiy`) VALUES
(1, 'Hall 1', 1, 3, 250),
(2, 'Hall 2', 1, 3, 260),
(3, 'Hall 3', 1, 4, 300),
(4, 'Hall 4', 1, 5, 300),
(5, 'Hall new 1', 2, 3, 200),
(6, 'Hall new 2 ', 2, 6, 500),
(7, 'Hall new 3', 3, 7, 500),
(8, 'new hall', 1, 4, 100),
(9, 'hall beach', 2, 7, 200),
(10, 'A', 4, 2, 200),
(11, 'B', 4, 3, 200);

-- --------------------------------------------------------

--
-- Table structure for table `show_timing`
--

CREATE TABLE `show_timing` (
  `show_time_id` int(10) NOT NULL,
  `show_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `show_timing`
--

INSERT INTO `show_timing` (`show_time_id`, `show_time`) VALUES
(1, 'Morning Show  [09:30am - 12:00pm]'),
(2, 'Matinee Show [12:30pm - 30:00pm]'),
(3, 'First Show [06:30pm - 09:00pm]'),
(4, 'Second Show [09:30pm - 12:00pm]');

-- --------------------------------------------------------

--
-- Table structure for table `theatres`
--

CREATE TABLE `theatres` (
  `theatre_id` int(1) NOT NULL,
  `city_id` int(1) NOT NULL,
  `theatre_name` varchar(32) NOT NULL,
  `manager` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `theatres`
--

INSERT INTO `theatres` (`theatre_id`, `city_id`, `theatre_name`, `manager`) VALUES
(1, 1, 'Padma Cinema Hall', 'Atharva '),
(2, 1, 'Purnima cinema hall', 'purnami '),
(3, 1, 'Jhumjhum Cinema hall', 'jhumijah'),
(4, 2, 'Anarkoli cinema hall', 'Anisul hak'),
(5, 3, 'Vimrul Cinema hall ', 'vimrul hasan');

-- --------------------------------------------------------

--
-- Table structure for table `theatre_show_timings`
--

CREATE TABLE `theatre_show_timings` (
  `theatre_show_time_id` int(15) NOT NULL,
  `screen_id` int(15) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theatre_show_timings`
--

INSERT INTO `theatre_show_timings` (`theatre_show_time_id`, `screen_id`, `start_date`, `end_date`) VALUES
(2, 2, '2016-08-03', '2016-08-05'),
(6, 2, '2016-08-07', '2016-08-10'),
(7, 8, '2016-08-09', '2016-08-11'),
(8, 9, '2016-08-09', '2016-08-11'),
(9, 1, '2016-08-10', '2016-08-12'),
(10, 1, '2016-08-09', '2016-08-11'),
(11, 10, '2016-08-10', '2016-08-12'),
(12, 11, '2016-08-10', '2016-08-16');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_rate`
--

CREATE TABLE `ticket_rate` (
  `ticket_rate_id` int(10) NOT NULL,
  `ticket_type` varchar(50) NOT NULL,
  `ticket_price` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_rate`
--

INSERT INTO `ticket_rate` (`ticket_rate_id`, `ticket_type`, `ticket_price`) VALUES
(1, 'Platinium', 300),
(2, 'Gold', 200),
(3, 'Silver', 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(32) DEFAULT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `address` varchar(32) DEFAULT NULL,
  `mobile_number` varchar(10) DEFAULT NULL,
  `rid` int(10) NOT NULL DEFAULT '3',
  `sid` varchar(50) NOT NULL DEFAULT '0',
  `login_time` varchar(32) NOT NULL,
  `logout_time` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `email`, `first_name`, `last_name`, `address`, `mobile_number`, `rid`, `sid`, `login_time`, `logout_time`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ak_limacse10@gmail.come', 'aklima ', 'akther', 'uttara dhaka', '1236547891', 1, '0', '', '1470232253'),
(4, 'ruhinacse14', 'e10adc3949ba59abbe56e057f20f883e', 'ruhina05@yahoo.com', 'ruhina', 'akther', 'taerererere', '1172655449', 3, '0', '2016-08-03', '1470196822'),
(5, 'ruhina05', 'e10adc3949ba59abbe56e057f20f883e', 'aklimacse10@htmail.com', 'aklima', 'aktherr', 'uttara Dhaka 1232', '123654666', 3, '0', '2016-08-08', '1471624391'),
(6, 'rakib54', 'e10adc3949ba59abbe56e057f20f883e', 'rakibul34@yahoo.com', 'rakibul', 'hasan', 'badda dhaka 1236', '1236547890', 3, '0', '2016-08-09', '1470815819'),
(7, 'rabiul43', '733d7be2196ff70efaf6913fc8bdcabf', 'rabiul_34@yahoo.com', 'rabiul', 'hasan', 'uttara dhaka ', '1236547895', 3, '0', '2016-08-10', '1470799737'),
(8, 'builam2', '733d7be2196ff70efaf6913fc8bdcabf', 'builam@yahoo.com', 'builam', 'khan', 'buerjlejrle', '1856555220', 3, '0', '2016-08-10', '1470808986'),
(9, 'afrojakhan', 'e10adc3949ba59abbe56e057f20f883e', 'afroznahr@yahoo.com', 'afroja', 'khan', 'afrooj villa ', '1725636540', 3, '0', '2016-08-19', '1471710465');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boarding_point`
--
ALTER TABLE `boarding_point`
  ADD PRIMARY KEY (`boarding_id`),
  ADD KEY `launch_id` (`launch_id`);

--
-- Indexes for table `booking_ticket_for_theatre`
--
ALTER TABLE `booking_ticket_for_theatre`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_theatre_show_time_id` (`theatre_show_time_id`),
  ADD KEY `fk_ticket_rate_id` (`ticket_rate_id`),
  ADD KEY `theatre_id` (`theatre_id`);

--
-- Indexes for table `bus_reserve`
--
ALTER TABLE `bus_reserve`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reserve_seat` (`reserve_seat_id`);

--
-- Indexes for table `cabin`
--
ALTER TABLE `cabin`
  ADD PRIMARY KEY (`cabin_id`),
  ADD KEY `launch_id` (`launch_id`),
  ADD KEY `launch_type_id` (`launch_type_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `launch_booking`
--
ALTER TABLE `launch_booking`
  ADD PRIMARY KEY (`ln_book_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `launch_id` (`dept_id`,`cabin_id`,`boarding_id`),
  ADD KEY `ticket_rate_id` (`ticket_rate_id`);

--
-- Indexes for table `launch_cabin`
--
ALTER TABLE `launch_cabin`
  ADD PRIMARY KEY (`cabin_id`),
  ADD KEY `launch_id` (`launch_id`),
  ADD KEY `boarding_id` (`boarding_id`);

--
-- Indexes for table `launch_capacity`
--
ALTER TABLE `launch_capacity`
  ADD PRIMARY KEY (`launch_cp_id`),
  ADD KEY `bd_id` (`launch_id`),
  ADD KEY `boarding_id` (`boarding_id`);

--
-- Indexes for table `launch_dept_date`
--
ALTER TABLE `launch_dept_date`
  ADD PRIMARY KEY (`dept_id`),
  ADD KEY `launch_id` (`cabin_id`);

--
-- Indexes for table `launch_dept_time`
--
ALTER TABLE `launch_dept_time`
  ADD PRIMARY KEY (`dept_time_id`);

--
-- Indexes for table `launch_info`
--
ALTER TABLE `launch_info`
  ADD PRIMARY KEY (`launch_id`),
  ADD KEY `city_id` (`city_from`);

--
-- Indexes for table `launch_reserve`
--
ALTER TABLE `launch_reserve`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `reserve_id` (`reserve_id`);

--
-- Indexes for table `launch_route`
--
ALTER TABLE `launch_route`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `launch_type`
--
ALTER TABLE `launch_type`
  ADD PRIMARY KEY (`launch_type_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `reserve_list`
--
ALTER TABLE `reserve_list`
  ADD PRIMARY KEY (`reserve_id`),
  ADD KEY `reserve_seat_id` (`reserve_seat_id`);

--
-- Indexes for table `reserve_section`
--
ALTER TABLE `reserve_section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `reserve_seat_id` (`reserve_seat_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `screens`
--
ALTER TABLE `screens`
  ADD PRIMARY KEY (`screen_id`),
  ADD KEY `theatre_id` (`theatre_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `show_timing`
--
ALTER TABLE `show_timing`
  ADD PRIMARY KEY (`show_time_id`);

--
-- Indexes for table `theatres`
--
ALTER TABLE `theatres`
  ADD PRIMARY KEY (`theatre_id`),
  ADD KEY `fk_city_id` (`city_id`);

--
-- Indexes for table `theatre_show_timings`
--
ALTER TABLE `theatre_show_timings`
  ADD PRIMARY KEY (`theatre_show_time_id`),
  ADD KEY `screen_id` (`screen_id`);

--
-- Indexes for table `ticket_rate`
--
ALTER TABLE `ticket_rate`
  ADD PRIMARY KEY (`ticket_rate_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_rid` (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boarding_point`
--
ALTER TABLE `boarding_point`
  MODIFY `boarding_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `booking_ticket_for_theatre`
--
ALTER TABLE `booking_ticket_for_theatre`
  MODIFY `booking_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `bus_reserve`
--
ALTER TABLE `bus_reserve`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cabin`
--
ALTER TABLE `cabin`
  MODIFY `cabin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `launch_booking`
--
ALTER TABLE `launch_booking`
  MODIFY `ln_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `launch_cabin`
--
ALTER TABLE `launch_cabin`
  MODIFY `cabin_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `launch_capacity`
--
ALTER TABLE `launch_capacity`
  MODIFY `launch_cp_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `launch_dept_date`
--
ALTER TABLE `launch_dept_date`
  MODIFY `dept_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `launch_dept_time`
--
ALTER TABLE `launch_dept_time`
  MODIFY `dept_time_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `launch_info`
--
ALTER TABLE `launch_info`
  MODIFY `launch_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `launch_reserve`
--
ALTER TABLE `launch_reserve`
  MODIFY `r_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `launch_route`
--
ALTER TABLE `launch_route`
  MODIFY `city_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `launch_type`
--
ALTER TABLE `launch_type`
  MODIFY `launch_type_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `reserve_list`
--
ALTER TABLE `reserve_list`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `reserve_section`
--
ALTER TABLE `reserve_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `screens`
--
ALTER TABLE `screens`
  MODIFY `screen_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `show_timing`
--
ALTER TABLE `show_timing`
  MODIFY `show_time_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `theatres`
--
ALTER TABLE `theatres`
  MODIFY `theatre_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `theatre_show_timings`
--
ALTER TABLE `theatre_show_timings`
  MODIFY `theatre_show_time_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `ticket_rate`
--
ALTER TABLE `ticket_rate`
  MODIFY `ticket_rate_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
