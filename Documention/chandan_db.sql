-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2025 at 12:06 PM
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
-- Database: `chandan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_tbl`
--

CREATE TABLE `address_tbl` (
  `a_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `house_no` varchar(5000) NOT NULL,
  `road` varchar(5000) NOT NULL,
  `state` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `brief_add` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address_tbl`
--

INSERT INTO `address_tbl` (`a_id`, `first_name`, `last_name`, `email`, `house_no`, `road`, `state`, `city`, `pincode`, `brief_add`) VALUES
(6, '', '', 'peehu@gmail.com', '231', 'Arang', 'maharastra', 'dubai', '78121', 'road ke baju me'),
(10, 'chandraprakash', 'sahu', 'chandan@gmail.com', '3544', 'main road chaparid', 'chhattisgarhh', 'Raipur', '894399', 'Near Pann Thela'),
(11, 'Shubhma', 'Sahu', 'shubham@gmail.com', 'H No - 258', 'Near Bus Stand', 'Chhattisgardh', 'Raipur', '493225', 'Water Tank');

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `u_id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`u_id`, `username`, `usertype`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'chandansahu', 'admin', 'chandan', '', 'chandan111@gmail.com', '111'),
(2, 'peehu sahu', '', '', '', 'peehu@gmail.com', '111');

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `cart_id` int(20) NOT NULL,
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_tbl`
--

INSERT INTO `cart_tbl` (`cart_id`, `c_id`, `p_id`) VALUES
(18, 11, 18),
(19, 11, 20),
(20, 2, 18),
(27, 2, 20),
(28, 2, 17),
(29, 2, 22),
(34, 0, 0),
(35, 17, 0),
(36, 17, 0),
(37, 24, 21),
(38, 24, 21),
(39, 1, 23),
(40, 1, 28),
(41, 17, 23);

-- --------------------------------------------------------

--
-- Table structure for table `contact_msg`
--

CREATE TABLE `contact_msg` (
  `m_id` int(100) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_msg`
--

INSERT INTO `contact_msg` (`m_id`, `fullname`, `email`, `message`) VALUES
(1, 'chandan sahu', 'chandan@gmail.com', 'Hellow How are You?');

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `o_id` int(20) NOT NULL,
  `c_id` int(15) NOT NULL,
  `p_id` int(15) NOT NULL,
  `address` text NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`o_id`, `c_id`, `p_id`, `address`, `order_time`) VALUES
(1, 2, 21, ',,House No231,Arang,maharastra,dubai,78121,road ke baju me', '2025-09-25 22:45:56'),
(4, 24, 20, 'Shubhma,Sahu,House NoH No - 258,Near Bus Stand,Chhattisgardh,Raipur,493225,Water Tank', '2025-10-06 13:43:04'),
(5, 17, 21, 'chandraprakash,sahu,House No3544,main road chaparid,chhattisgarh,Raipur,894399,pann thela\r\n', '2025-10-10 13:05:43');

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `p_id` int(15) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` int(50) NOT NULL,
  `img` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`p_id`, `product_name`, `description`, `price`, `img`, `category`) VALUES
(21, 'NVDA GTX5090 Processor', 'The NVIDIA GeForce RTX 5090 is a high-end enthusiast-class graphics card, part of the RTX 50 series ', 276644, '6.jpg', ''),
(23, '3-D Game VR-SET', 'A virtual reality (VR) headset is a head-mounted device that immerses the user in a computer-generat', 25000, '27.jpg', ''),
(24, 'PS5 GamePad ', 'the management, operation, and optimization of a network.', 3500, '25.jpg', ''),
(27, 'SONY VR 3D Projection (RLG)', 'High bass with surounding sound.', 9954, '19.jpg', ''),
(28, 'Monitor 4k display 60hz', ' Zebronics Zeb-V19Hd 18.5 Inch Led Monitor.  Zebronics Zeb-V19Hd 18.5 Inch Led Monitor', 50000, '1.jpg', ''),
(29, 'Sony HeadPhone', 'Buy Sony Headphones Online with Upto 60% OFF ', 2000, '22.jpg', ''),
(30, 'LG Monitor4K', '4K computer monitors with innovative anti-glare technology or shop curved', 8999, '18.jpg', ''),
(33, 'LG Monitor4K', '4K computer monitors with innovative anti-glare technology or shop curved', 8999, '18.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `resistration_tbl`
--

CREATE TABLE `resistration_tbl` (
  `u_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `reg_date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resistration_tbl`
--

INSERT INTO `resistration_tbl` (`u_id`, `username`, `first_name`, `last_name`, `email`, `password`, `reg_date_time`) VALUES
(2, 'nikhatkhan', 'Nikhat ', 'khan', 'nikhatkhan@gmail.com', '111', '2025-06-06 18:57:36'),
(11, 'Peehu Sahu', 'peehu', 'sahu', 'peehu@gmail.com', '111', '2025-06-26 17:23:22'),
(17, 'chandan sahu', 'chandan', 'sahu', 'chandan@gmail.com', '111', '2025-09-26 03:01:53'),
(18, 'chetan chandrakar', 'chetan', 'chandrakra', 'chetan@gmail.com', '111', '2025-09-27 17:05:03'),
(19, 'sahu', 'Deep', 'sahu', 'sahu@gmail.com', '123', '2025-09-28 12:02:22'),
(20, 'Sanjana Sahu', '', '', 'SanjanaSahu@gmail.com', '123', '2025-09-30 14:49:52'),
(21, 'nikhat khan', '', '', 'nikhat11@gmail.com', '111', '2025-10-06 17:31:37'),
(22, 'chandan sahu', '', '', 'chandan21@gmail.com', '222', '2025-10-06 17:35:31'),
(23, 'naman', '', '', 'Naman@gmail.com', '222', '2025-10-06 17:46:00'),
(24, 'Shubham Sahu', '', '', 'shubham@gmail.com', '123', '2025-10-06 18:46:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_tbl`
--
ALTER TABLE `address_tbl`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `contact_msg`
--
ALTER TABLE `contact_msg`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `resistration_tbl`
--
ALTER TABLE `resistration_tbl`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_tbl`
--
ALTER TABLE `address_tbl`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `u_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `cart_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `contact_msg`
--
ALTER TABLE `contact_msg`
  MODIFY `m_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `o_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `p_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `resistration_tbl`
--
ALTER TABLE `resistration_tbl`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
