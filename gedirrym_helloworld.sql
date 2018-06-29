-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2018 at 01:26 PM
-- Server version: 10.2.15-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `businxiw_helloworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date_Time` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `reply_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `business_id` int(11) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `registration_name` varchar(255) NOT NULL,
  `reg_number` varchar(255) NOT NULL,
  `vat_reg_number` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `physical_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `postalcode` varchar(255) NOT NULL,
  `registeredBy` varchar(255) NOT NULL,
  `date_Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`business_id`, `company_name`, `registration_name`, `reg_number`, `vat_reg_number`, `industry`, `contact_number`, `company_email`, `website`, `physical_address`, `city`, `province`, `postalcode`, `registeredBy`, `date_Time`) VALUES
(28, 'Toyota Durban', 'Toyota Durban', 'TD8907645', 'TD8907645', 'Automotive', '05463287', 'toyota@gmail.com', 'www.toyota.co.za', '65 Grundel Road', 'Durban', 'Kwazulu Natal', '4005', 'Floriberto flory@gmail.co.za', '2018-02-25 05:58:50'),
(29, 'FNB', 'FNB', '65983214520', 'VAT5644793435', 'Bank', '03165324150', 'info@fnb.co.za', 'www.fnb.co.za', 'Morrison Road', 'Durban', 'kzn', '4001', 'Aime aimedi', '2018-02-25 06:01:23'),
(32, 'Telkom', 'Telkom', 'TE0045321', '950045321', 'Electronics', '0315689635', 'info@telkom.co.za', 'www.telkom.co.za', '3-20 Durban', 'Durban', 'kzn', '4001', 'Dwarika dwarika', '2018-02-25 22:01:05'),
(35, 'Webslesson', 'Webslesson', 'REG003254', 'VAT621035', 'Computers', '0765023131', 'info@webslesson.com', 'www.webslesson.com', '49 Keit Road Berea', 'Durban', 'kzn', '4001', 'Marc marc', '2018-04-04 09:48:54');

-- --------------------------------------------------------

--
-- Table structure for table `dislikes`
--

CREATE TABLE `dislikes` (
  `id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dislikes`
--

INSERT INTO `dislikes` (`id`, `review_id`, `user_id`) VALUES
(1, 43, 19),
(4, 55, 25),
(5, 52, 24);

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` int(11) NOT NULL,
  `industry` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `industry`) VALUES
(1, 'Advertising '),
(2, 'Automotive'),
(3, 'Computers'),
(4, 'Consultants'),
(5, 'Educations'),
(6, 'Electronics'),
(7, 'Fast Foods'),
(8, 'Networking'),
(9, 'Plumbing'),
(10, 'Restaurent'),
(11, 'Attorneys'),
(12, 'Web Development'),
(13, 'Bred & Breakfast'),
(14, 'Hotel'),
(15, 'Properties'),
(16, 'Call Center'),
(17, 'Industrial Eng'),
(18, 'Church'),
(19, 'Shops');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `review_id`, `user_id`) VALUES
(172, 44, 19),
(173, 45, 19),
(175, 46, 15),
(176, 48, 19),
(177, 46, 24),
(179, 56, 25),
(180, 54, 24),
(181, 43, 24),
(182, 44, 24),
(183, 43, 25),
(184, 44, 25),
(185, 55, 24),
(187, 58, 25),
(188, 59, 26);

-- --------------------------------------------------------

--
-- Table structure for table `mytesttable`
--

CREATE TABLE `mytesttable` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_sender_name` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mytesttable`
--

INSERT INTO `mytesttable` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES
(10, 9, 'Why not. These people are so bad', 'Gloria Ilunga', '2018-03-09 04:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `no_name`
--

CREATE TABLE `no_name` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `reply_review` text NOT NULL,
  `replyDT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `no_name`
--

INSERT INTO `no_name` (`id`, `user_id`, `review_id`, `reply_review`, `replyDT`) VALUES
(0, 24, 43, '', '2018-03-05 22:41:43'),
(0, 24, 43, '', '2018-03-05 22:41:53'),
(0, 24, 54, '', '2018-03-05 22:47:43'),
(0, 24, 54, '', '2018-03-05 22:47:55'),
(0, 24, 54, '', '2018-03-05 22:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `reply_review` text NOT NULL,
  `replyDT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `user_id`, `review_id`, `reply_review`, `replyDT`) VALUES
(5, 23, 54, 'This is me    		', '2018-03-07 12:07:21'),
(6, 24, 55, ' faced the same problem', '2018-03-07 12:09:55'),
(7, 20, 54, 'This is not true, they do good job    		', '2018-03-07 12:27:13'),
(8, 24, 43, ' I\'m please with there style', '2018-03-07 12:28:20'),
(9, 24, 55, 'Thanks after all', '2018-03-07 19:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `reviewtb`
--

CREATE TABLE `reviewtb` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `review_nature` varchar(255) NOT NULL,
  `reviewTitle` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `reviewDT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviewtb`
--

INSERT INTO `reviewtb` (`review_id`, `user_id`, `user_name`, `company_name`, `rating`, `review_nature`, `reviewTitle`, `review`, `reviewDT`) VALUES
(59, 26, 'Alpha', 'Webslesson', 2, 'Other', 'Not bad', 'I couldn\'t believe getting such nice and great services. Thanks Guys', '2018-04-04 10:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `user_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_type` enum('master','user') NOT NULL,
  `user_status` enum('active','inactive') NOT NULL,
  `userDateTime` datetime NOT NULL,
  `email_code` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `focusCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`user_id`, `name`, `lastname`, `email`, `mobile`, `username`, `password`, `user_type`, `user_status`, `userDateTime`, `email_code`, `active`, `focusCode`) VALUES
(26, 'Alpha', 'Bruno', 'alpha@gmail.com', '0616023535', 'fredderique', 'be401722fb46110e54c8bec5148ab70a', 'master', 'active', '2018-04-04 09:57:24', '9757cf3b398dc84bdc4d29a241ac831a', 0, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`business_id`);

--
-- Indexes for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mytesttable`
--
ALTER TABLE `mytesttable`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviewtb`
--
ALTER TABLE `reviewtb`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `business_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `mytesttable`
--
ALTER TABLE `mytesttable`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reviewtb`
--
ALTER TABLE `reviewtb`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
