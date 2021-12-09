-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 07:13 PM
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
  `college_degree` enum('Associate','Bachelor''s','Master''s','Docotral') DEFAULT NULL,
  `college_course` varchar(255) DEFAULT NULL,
  `college_date_start` year(4) DEFAULT NULL,
  `college_date_end` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college_school`
--

INSERT INTO `college_school` (`college_school_id`, `user_id`, `college_name`, `college_degree`, `college_course`, `college_date_start`, `college_date_end`) VALUES
(3, 13, 'PUTO', 'Bachelor\'s', 'Counter Strike', 2012, 2016),
(4, 13, 'Mapua', 'Master\'s', 'Counter Strike', 2017, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `employment`
--

DROP TABLE IF EXISTS `employment`;
CREATE TABLE `employment` (
  `employment_id` int(11) NOT NULL,
  `employment_user_id` int(11) DEFAULT NULL,
  `employment_start` year(4) NOT NULL,
  `employment_end` year(4) DEFAULT NULL,
  `employment_company` varchar(255) NOT NULL,
  `employment_position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employment`
--

INSERT INTO `employment` (`employment_id`, `employment_user_id`, `employment_start`, `employment_end`, `employment_company`, `employment_position`) VALUES
(1, 13, 2016, 2019, 'Meralco', 'Jumper'),
(2, 13, 2019, 2021, 'Tier One', 'Taga bantay ng Compshop');

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
  `project_picture` blob NOT NULL,
  `project_price` int(11) NOT NULL,
  `project_status` enum('on_sale','acquired') NOT NULL DEFAULT 'on_sale',
  `project_client_id` int(11) DEFAULT NULL
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

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skills_id`, `user_id`, `user_skills`) VALUES
(1, 13, 'Magluto'),
(2, 13, 'Matulog');

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
  `user_pic` blob DEFAULT NULL,
  `user_bio` varchar(500) DEFAULT NULL,
  `user_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_firstName`, `user_lastName`, `user_type`, `user_uid`, `user_email`, `user_pwd`, `user_address`, `user_number`, `user_pic`, `user_bio`, `user_status`) VALUES
(1, 'Wendell', 'Herrero', 'client', 'asd', 'asd@yahoo.com', '$2y$10$do4dc.KlXpdAt5liEdHAkOx5O46ZAT0GonAIVpIRDM3cWr94Qwnsm', '', '', NULL, '', 'Active'),
(11, 'zxc', 'zxc', 'user', 'zxc', 'zxc@yahoo.com', '5fa72358f0b4fb4f2c5d7de8c9a41846', '', '', NULL, '', 'Active'),
(12, '123', '123', 'client', '123', '123@yahoo.com', '202cb962ac59075b964b07152d234b70', '', '', NULL, '', 'Inactive'),
(13, 'wqe', 'qwe', 'user', 'qwe', 'qwe@yaho.com', '76d80224611fc919a5d54f0ff9fba446', 'sa bahay sa may kanto', '', NULL, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis illo fugit officiis distinctio culpa officia totam atque exercitationem inventore repudiandae?', 'Active'),
(16, 'try', 'try', 'user', 'try', 'try@yahoo.com', '080f651e3fcca17df3a47c2cecfcb880', '', '', NULL, '', 'Inactive'),
(18, 'RJ', 'RJ', 'user', 'RJ', 'rj@yahoo.com', '0f4bda3a8e49e714c26ef610e2893454', 'sa bahay sa may kanto', '0909-092-0909', NULL, '', 'Active');

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
  ADD KEY `FK_user_id2` (`employment_user_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

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
  MODIFY `college_school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employment`
--
ALTER TABLE `employment`
  MODIFY `employment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skills_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `college_school`
--
ALTER TABLE `college_school`
  ADD CONSTRAINT `FK_user_id1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `employment`
--
ALTER TABLE `employment`
  ADD CONSTRAINT `FK_user_id2` FOREIGN KEY (`employment_user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

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
