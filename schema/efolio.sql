-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 06:17 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `efolio`
--
CREATE DATABASE IF NOT EXISTS `efolio` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `efolio`;

-- --------------------------------------------------------

--
-- Table structure for table `college_school`
--

DROP TABLE IF EXISTS `college_school`;
CREATE TABLE `college_school` (
  `college_school_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `college_name` varchar(255) DEFAULT NULL,
  `college_degree` enum('Associate','Bachelor','Master','Doctor') DEFAULT NULL,
  `college_course` varchar(255) DEFAULT NULL,
  `college_date_start` int(4) DEFAULT NULL,
  `college_date_end` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employment`
--

DROP TABLE IF EXISTS `employment`;
CREATE TABLE `employment` (
  `employment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `employment_start` int(4) NOT NULL,
  `employment_end` int(4) DEFAULT NULL,
  `employment_company` varchar(255) NOT NULL,
  `employment_position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `invoice_user_id` int(11) NOT NULL,
  `invoice_client_id` int(11) NOT NULL,
  `invoice_total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `messageId` varchar(255) NOT NULL,
  `senderId` int(11) DEFAULT NULL,
  `receiverId` int(11) DEFAULT NULL,
  `dateCreated` int(11) DEFAULT NULL,
  `Subject` varchar(255) NOT NULL,
  `messageContent` varchar(255) DEFAULT NULL,
  `messageStatus` enum('Sent','Seen','Delete','Edit') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

DROP TABLE IF EXISTS `order_line`;
CREATE TABLE `order_line` (
  `sales_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `project_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_publisher_id` int(11) DEFAULT NULL,
  `project_title` varchar(255) NOT NULL,
  `project_details` varchar(255) DEFAULT NULL,
  `project_category` set('Technology','Science','Engineering','Arts') DEFAULT NULL,
  `project_source_code` varchar(255) DEFAULT NULL,
  `project_picture` varchar(255) DEFAULT NULL,
  `project_price` int(11) DEFAULT NULL,
  `project_status` enum('on_sale','acquired') NOT NULL DEFAULT 'on_sale',
  `project_client_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `project_picture`
--

DROP TABLE IF EXISTS `project_picture`;
CREATE TABLE `project_picture` (
  `project_picture_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_picture` varchar(255) NOT NULL,
  `is_cover` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE `skills` (
  `skills_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_skills` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `payment_method` enum('Payment1','Payment2','Payment3','Payment4') NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_firstName` varchar(255) NOT NULL,
  `user_lastName` varchar(255) NOT NULL,
  `user_type` enum('user','client','admin') DEFAULT NULL,
  `user_uid` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_number` varchar(255) NOT NULL,
  `user_pic` varchar(255) DEFAULT NULL,
  `user_bio` varchar(500) DEFAULT NULL,
  `user_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `college_school`
--
ALTER TABLE `college_school`
  ADD PRIMARY KEY (`college_school_id`),
  ADD KEY `FK_user_id1` (`user_id`);

--
-- Indexes for table `employment`
--
ALTER TABLE `employment`
  ADD PRIMARY KEY (`employment_id`),
  ADD KEY `FK_user_id2` (`user_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_line`
--
ALTER TABLE `order_line`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `FK_user_id` (`project_publisher_id`);

--
-- Indexes for table `project_picture`
--
ALTER TABLE `project_picture`
  ADD PRIMARY KEY (`project_picture_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skills_id`),
  ADD KEY `FK_user_id3` (`user_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `college_school`
--
ALTER TABLE `college_school`
  MODIFY `college_school_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employment`
--
ALTER TABLE `employment`
  MODIFY `employment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_line`
--
ALTER TABLE `order_line`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_picture`
--
ALTER TABLE `project_picture`
  MODIFY `project_picture_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skills_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `college_school`
--
ALTER TABLE `college_school`
  ADD CONSTRAINT `FK_user_id1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `employment`
--
ALTER TABLE `employment`
  ADD CONSTRAINT `FK_user_id2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`project_publisher_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `FK_user_id3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
