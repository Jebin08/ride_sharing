-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2023 at 04:54 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ride_sharing`
--

-- --------------------------------------------------------

--
-- Table structure for table `rs_admin`
--

CREATE TABLE `rs_admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_admin`
--

INSERT INTO `rs_admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `rs_driver`
--

CREATE TABLE `rs_driver` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `aadhar` varchar(20) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `driving` varchar(20) NOT NULL,
  `vehicle` varchar(20) NOT NULL,
  `vmodel` varchar(30) NOT NULL,
  `vno` varchar(20) NOT NULL,
  `vphoto` varchar(50) NOT NULL,
  `vehicle_st` int(11) NOT NULL,
  `trip_st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_driver`
--

INSERT INTO `rs_driver` (`id`, `name`, `gender`, `dob`, `address`, `city`, `pincode`, `mobile`, `email`, `aadhar`, `photo`, `uname`, `pass`, `create_date`, `status`, `driving`, `vehicle`, `vmodel`, `vno`, `vphoto`, `vehicle_st`, `trip_st`) VALUES
(1, 'Kumar', 'Male', '25-06-1994', '45,FF', 'Trichy', '620245', 9631475521, 'kumar@gmail.com', '235795435535', 'P1face1.jpg', 'kumar', '123456', '04-04-2023', 1, 'T457433565656', 'Car', 'Maruthi', 'TN5548', 'V1car-rent-4.png', 0, 2),
(2, 'Ravi', 'Male', '19-04-1990', '87/GR Colony', 'Madurai', '6745855', 8954125544, 'ravi@gmail.com', '255415554895', 'P2face8.jpg', 'ravi', '123456', '07-04-2023', 1, 'T585214555552', 'Car', 'Alto', 'TN6347', 'V2car-rent-5.png', 0, 2),
(3, 'Rajan', 'Male', '12-04-1985', '56, SK Nagar', 'Namakkal', '685425', 7389555266, 'rajan11@gmail.com', '234587456963', 'P3face18.jpg', 'rajan', '123456', '07-04-2023', 1, 'T7425112245801', 'Car', 'Maruthi Suzuki', 'TN6585', 'V3car-rent-2.png', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rs_request`
--

CREATE TABLE `rs_request` (
  `id` int(11) NOT NULL,
  `ride_id` int(11) NOT NULL,
  `rider` varchar(20) NOT NULL,
  `driver` varchar(20) NOT NULL,
  `num_seats` int(11) NOT NULL,
  `rdate` varchar(20) NOT NULL,
  `rtime` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `pay_st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_request`
--

INSERT INTO `rs_request` (`id`, `ride_id`, `rider`, `driver`, `num_seats`, `rdate`, `rtime`, `status`, `amount`, `pay_st`) VALUES
(1, 2, 'santhosh', 'rajan', 2, '08-04-2023', '07:13:49', 1, 300, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rs_rider`
--

CREATE TABLE `rs_rider` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `city` varchar(20) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `create_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_rider`
--

INSERT INTO `rs_rider` (`id`, `name`, `gender`, `mobile`, `email`, `city`, `uname`, `pass`, `create_date`) VALUES
(1, 'Santhosh', 'Male', 9638527155, 'santhosh@gmail.com', 'Salem', 'santhosh', '123456', '03-04-2023');

-- --------------------------------------------------------

--
-- Table structure for table `rs_rideshare`
--

CREATE TABLE `rs_rideshare` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `splace` varchar(30) NOT NULL,
  `dplace` varchar(30) NOT NULL,
  `route` varchar(30) NOT NULL,
  `pdate` varchar(20) NOT NULL,
  `ptime` varchar(20) NOT NULL,
  `seats` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `trip_st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_rideshare`
--

INSERT INTO `rs_rideshare` (`id`, `uname`, `splace`, `dplace`, `route`, `pdate`, `ptime`, `seats`, `rate`, `create_date`, `status`, `trip_st`) VALUES
(1, 'kumar', 'Trichy', 'Chennai', 'Viluppuram', '08-04-2023', '10:02 AM', 4, 250, '07-04-2023', 0, 2),
(2, 'rajan', 'Namakkal', 'Salem', 'Rasipuram', '', '9:00 AM', 4, 150, '07-04-2023', 0, 1),
(3, 'ravi', 'Trichy', 'Madurai', 'Dindigul', '10-04-2023', '10:00 AM', 3, 160, '07-04-2023', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rs_route`
--

CREATE TABLE `rs_route` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `location_start` varchar(20) NOT NULL,
  `location_end` varchar(20) NOT NULL,
  `start_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_route`
--

