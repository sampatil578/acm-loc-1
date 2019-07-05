-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2019 at 03:09 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olx`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `descr` varchar(10000) NOT NULL,
  `file` varchar(100) NOT NULL,
  `owner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `descr` varchar(10000) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`username`, `name`, `brand`, `quantity`, `price`, `descr`, `file`) VALUES
('sammy123', 'IPHONE X 64GB Silver', 'Apple', 10, 57500, 'IPHONE X 64Gb Silver All access Are there Bill Box n all  It has August Warranty Left Now  Phone is in Next to New Condition Not Used Much  Indian Phones are With Gst Bill  Exchange With Full Kit Devices  Interested People Can Call and Chat', 'iphone.jpeg'),
('sammy123', 'Sony WH-1000XM3  headphones', 'Sony', 10, 24000, 'Flawless Sony WH-1000XM3 Noise Cancelling Headphone which I bought from Amazon and rarely used. It comes with Sony warranty and I have invoice from Amazon. All accessories included with Box Date Of Purchase : 28-May-2019', 'sony.jpeg'),
('sammy123', 'Philips Bluetooth Speaker', 'Philips', 10, 2000, '1 yr used', 'phillips.jpeg'),
('sammy123', 'Study Table', 'Surplus', 10, 549, 'Laptop use  Reading  Writing  Painting  Etc', 'table.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `trade`
--

CREATE TABLE `trade` (
  `buyer` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `seller` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hostel` varchar(100) NOT NULL,
  `rm_no` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `username`, `password`, `hostel`, `rm_no`, `email`, `contact`) VALUES
('Samruddha Patil', 'sammy123', 'sammy123', 'Amber', 'B-208', 'samruddhapatil.18je0721@am.iitism.ac.in', '6209274648');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `username` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
