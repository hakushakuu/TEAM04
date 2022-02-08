-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2022 at 05:21 AM
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
  `college_date_start` varchar(255) DEFAULT NULL,
  `college_date_end` varchar(255) DEFAULT NULL
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
  `messageContent` text DEFAULT NULL,
  `messageStatus` enum('Sent','Seen','Delete','Edit') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `employment`
--

DROP TABLE IF EXISTS `employment`;
CREATE TABLE `employment` (
  `employment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `employment_start` varchar(255) NOT NULL,
  `employment_end` varchar(255) DEFAULT NULL,
  `employment_company` varchar(255) NOT NULL,
  `employment_position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_publisher_id` int(11) DEFAULT NULL,
  `project_publisher_name` varchar(255) NOT NULL,
  `project_title` varchar(255) NOT NULL,
  `project_details` text DEFAULT NULL,
  `project_category` set('Technology','Science','Engineering','Arts') DEFAULT NULL,
  `project_source_code` varchar(255) DEFAULT NULL,
  `project_picture` varchar(255) DEFAULT NULL,
  `project_price` int(11) DEFAULT NULL,
  `project_status` enum('on_sale','acquired') NOT NULL DEFAULT 'on_sale',
  `project_client_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_firstName`, `user_lastName`, `user_type`, `user_uid`, `user_email`, `user_pwd`, `user_address`, `user_number`, `user_pic`, `user_bio`, `user_status`) VALUES
(1, 'Earl Benjamin', 'Rosales', 'user', 'borjrosales', 'borjrosales@gmail.com', '4f4561b3ef7ac32e76fcbc87664c20f1', 'EARL BENJAMIN', '09357294821', 'http://localhost/TEAM04/public/uploads/photo/a02b056dc81c1.png', 'A bright, hardworking, mature, and responsible college student with excellent interpersonal and organizational skills, who is able to manage various time sensitive tasks simultaneously desires any position that would best fit my qualifications; to provide assistance in encoding, bringing forth a motivated attitude and a variety of powerful skills.', 'Active'),
(2, 'Iris', 'Landicho', 'user', 'landichoiris', 'landichoiris@gmail.com', 'af6dfea6e3044b86ff4ee3a1de652ee4', 'Lukban St. Amparo Subd., Caloocan City', '09653218796', 'http://localhost/TEAM04/public/uploads/photo/5d761d5e7ccea.jpg', 'I am Iris Landicho, a third year Computer Science student from TUP Manila. My interests and hobbies are haywire. I do stuffs in all sorts but never got the chance to be good at it. But I at least try my hardest to help my peers with all the opportunities I have.', 'Active'),
(3, 'Patrick', 'Yee', 'user', 'yeepatrick27', 'yeepatrick27@gmail.com', '74aeb51f3d0089a8b935b25a74ff2ae1', '24 D. Lafelonila St. Quezon City', '09754521698', 'http://localhost/TEAM04/public/uploads/photo/6afebfeb11b73.jpg', 'I\'ve always wanted to build a system where everyone could use despite their age, gender, race and financial stability in order to achieve equality. Despite being a college student I can execute tasks that are given to me, and I will strive to improve my programming skills for myself and for my clients.', 'Active'),
(4, 'Wendell', 'Herrero', 'user', 'wendellherrero', 'wendellherrero@gmail.com', '6e40bbd237abb0ff50221f0bfa5a562a', 'Blk 25 Lot 17 Parañaque City', '09965685712', 'http://localhost/TEAM04/public/uploads/photo/f554c3396c6f3.jpg', 'A hardworking and responsible college student with a great intrapersonal skill. Currently working on my interpersonal skill but it is not bad as you imagine as it is vital skill in IT world. Despite of that, I always able to execute well the tasks that are given to me.', 'Active'),
(5, 'Lorence Joy', 'De Guzman', 'user', 'ljhey24deguzman', 'ljhey24deguzman@gmail.com', 'eac570d84fd27e1037164d5bb3f3edf9', 'Baclaran, Balayan, Batangas', '09586325981', 'http://localhost/TEAM04/public/uploads/photo/4ba268d4c1db2.png', 'I am a third year Computer Science student from Technological University of the Philippines. Im a hardworking person with the ability in problem solving and a skills in coordination when it comes to team building.', 'Active'),
(6, 'Ma. Jehiel', 'Caspillan', 'user', 'jehiel28caspillan', 'jehiel28caspillan@gmail.com', '39f3a0bdd5b499de4e2be414f0ff4bbc', '1272 A3 San Nicolas St. Tondo, Manila', '09586325148', 'http://localhost/TEAM04/public/uploads/photo/0b543af09c100.png', 'Responsible and reliable college student. Currently taking Computer Science course at Technological University of the Philippines. Hoping to learn more about this field and develop skills that will help me gain knowledge.', 'Active'),
(7, 'Elaine', 'Andus', 'user', 'elaineandus30', 'elaineandus30@gmail.com', '2a29d5066b9e0cc692fc649bfbef6565', 'Camia St, Old Sta. Mesa, Manila', '09365987451', 'http://localhost/TEAM04/public/uploads/photo/137fe37532433.jpg', 'I\'ve always wanted to make web applications and websites because I\'m fascinated by all the elements of web development. Hopefully, if I\'m fortunate enough, I would like to have an opportunity to work on projects with like-minded individuals someday.', 'Active');

-- --------------------------------------------------------



-- --------------------------------------------------------



-- --------------------------------------------------------



-- --------------------------------------------------------



-- --------------------------------------------------------


--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_publisher_id`, `project_publisher_name`, `project_title`, `project_details`, `project_category`, `project_source_code`, `project_picture`, `project_price`, `project_status`, `project_client_id`) VALUES
(1, 1, ' ', 'Inventory Program', 'Inventory Program is a program used to register IP Addresses and other necessary details. The main purpose of this program is to store, update, and delete IP addresses or their details. This inventory offers an efficient way of handling large amount information and the ability to access the data of the registered IP Addresses.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/bbfaa221684a1.png', NULL, 'on_sale', NULL),
(2, 1, ' ', 'Sample Payroll', 'Sample Payroll application computes an Employee\'s Gross pay and Net pay, based on the days the Employee had worked and the rate per day. It also deducts taxes and miscellaneous fees. Sample Payroll can also print the payroll.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/6a9b7ab475604.png', NULL, 'on_sale', NULL),
(3, 1, ' ', 'Subnet Calculator', 'The Subnet Calculator is relatively self-explanatory based on its name, which is a calculator that performs arithmetic operations in numbers. Basically, it is a program that calculates subnets. This tool is very useful to service providers and network operator who frequently allocate and work with subnets. By input of IP address, its Class, Public, Mask, Subnet, Broadcast, first host, Last Host, Max Host amount, and if it is a host is calculated and displayed.\r\n', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/3033ba9970454.png', NULL, 'on_sale', NULL),
(4, 1, ' ', 'CPU Scheduling', 'The CPU Scheduling Simulator is a software that simulates and visualizes the different techniques of CPU Scheduling, which includes First Come, First Serve (FCFS), Shortest Job First (SJF), Shortest Remaining Job First (SRJF), Round Robin (RR), Non – Preemptive (NP) and Preemptive. This program calculates the Waiting time, Response time and Turnaround time, as well as its averages. A Gantt Chart representation of the scheduling is also displayed, with the processes represented by different colors to distinguish easier. A comparative table is accessible within the program for the comparison of the said techniques.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/1323a80d259c5.png', NULL, 'on_sale', NULL),
(5, 1, ' ', 'Page Replacement', 'Page Replacement Algorithm decides which page has to be replaced when a new page comes in. During this process, page faults happen once a memory page is accessed by a running program that is mapped into the virtual address space, but not loaded in the physical memory.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/c430bbc699573.png', NULL, 'on_sale', NULL),
(6, 2, ' ', 'Selection Control', 'Using Visual Basic, this selection control converts or transform a normal text written by the user into a text with a font style and/or forecolor selected and applied by the user.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/d585da2cb9fd5.png', NULL, 'on_sale', NULL),
(7, 2, ' ', 'Payroll Calculator', 'This is a payroll calculator also made with Visual Basic. It simply calculates an employee\'s monthly wage deducted with their taxes such as Philhealth, Pagibig, and SSS.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/b1bd9070c44be.png', NULL, 'on_sale', NULL),
(8, 3, ' ', 'CATBOT: Automated Cat Laser', 'Sous-vide cooking allows you to precisely control the temperature of cooked food (how \"doneness\" is measured) by immersing it in a carefully controlled water bath. It\'s possible, but seriously difficult, to do this just with a thermometer and a pot on the stove... but if you have an Arduino do all the hard work for you, you can literally \"set it and forget it.\"', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/b7dba1935f8d5.png', NULL, 'on_sale', NULL),
(9, 3, ' ', 'Arduino Sous-Vide Cooker', 'Sous-vide cooking allows you to precisely control the temperature of cooked food (how \"doneness\" is measured) by immersing it in a carefully controlled water bath. It\'s possible, but seriously difficult, to do this just with a thermometer and a pot on the stove... but if you have an Arduino do all the hard work for you, you can literally \"set it and forget it.\"\r\n', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/cb440d096fcad.png', NULL, 'on_sale', NULL),
(10, 3, ' ', 'Web Robot', 'This Instructible will show you how to build your own Web Connected Robot (using an Arduino micro-controller and Asus pc). Why would you want a Web Connected Robot? To play with of course. Drive your robot from across the room or across the country, using nothing more than Skype and a web browser (nothing to install on the controlling computer). After that? Dig into the software & adapt it however you like, add a GPS so you can watch where you\'re driving on a map, add temperature sensors to map temperature gradients in your house, or sonar sensors to add controls on what your web drivers can and cannot run into.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/1277f52ace82c.png', NULL, 'on_sale', NULL),
(11, 3, ' ', 'OS Concepts', 'A program that will determine the request which is to be satisfied next, reserve a partial or complete portion of computer memory for the execution of programs and processes and will decide which memory pages to page out or sometimes called swap out, or write to disk, when a page of memory needs to be allocated', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/3901cf9dd00f2.png', NULL, 'on_sale', NULL),
(12, 4, ' ', 'Font Changer', 'This is a simple activity able to change the property of text inside the text input. The user can apply different fonts style and sizes and also text color according to his preference. It is an activity given to us to how manipulate the text properties.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/1170ada8dd82c.jpeg', NULL, 'on_sale', NULL),
(13, 4, ' ', 'Horse Auction', 'This is a simple activity how buttons work. In this program, when a button is clicked, an event happens. For example, if I click the button with text named Abby, it will show a horse and the same with button named Rascal but with different picture of a horse.\r\n', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/a12dfa461ce61.jpeg', NULL, 'on_sale', NULL),
(14, 4, ' ', 'Arduino LED', 'This is the simple setup of lighting up one LED using Arduino UNO. In this setup, there is a potentiometer where it controls the resistance flowing in the circuit by rotating its wiper. Because of potentiometer, the brightness of the LED can be controlled.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/54468370771fc.jpeg', NULL, 'on_sale', NULL),
(15, 4, ' ', 'Arduino RGB', 'This is the simple setup of lighting up one LED using Arduino UNO. In this setup, there is a potentiometer where it controls the resistance flowing in the circuit by rotating its wiper. Because of potentiometer, the brightness of the LED can be controlled.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/9a8d36973dfca.jpeg', NULL, 'on_sale', NULL),
(16, 4, ' ', 'Order Form', 'Simple order form created in Visual Basic. It gets inputs about the info of the client and the number of he/she will order and will calculate after the total price of ordered phones. This is a activity given to us to teach how to use the inputs given by the user and execute simple calculations which is the total price of phones ordered.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/e8e745891c24b.png', NULL, 'on_sale', NULL),
(17, 4, ' ', 'CPU Scheduling', 'A program that simulates the process happening inside the operating system we have today and show the order of task that will be executed based on the priority of the algorithm used in the simulator. It will also show what time it will be finished executing all task given in simulator.\r\n', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/7ac9278d24765.png', NULL, 'on_sale', NULL),
(18, 5, ' ', 'T-Shirt Design', 'This t-shirt design portrays the role of the generation z in this modern day.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/343de0fb0a7ae.png', NULL, 'on_sale', NULL),
(19, 5, ' ', 'Arduino Buzzer', 'Arduino (Using Piezo Buzzer-Happy Birthday Song). In this circuit, you’ll use the MICROCONTROLLER and a small buzzer to make music, and you’ll learn how to program your own songs using arrays.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/6767d8046ba87.png', NULL, 'on_sale', NULL),
(20, 5, ' ', 'Web Folio', 'Web Folio is an online portfolio that displays the developer’s skills and projects. This portfolio also includes ways to contact the developer and also provides a short background about the developer.\r\n', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/ac38f840afe02.png', NULL, 'on_sale', NULL),
(21, 5, ' ', 'To-Do List App', 'To-Do List App is an application that helps user to list down all the important agendas and tasks that needs to be carry out. Using this app effectively will result to an organized and more reliable list of tasks that can be managed through your Computer, Tablet, and mobile phone.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/9c51b7c7b0369.png', NULL, 'on_sale', NULL),
(22, 5, ' ', 'Encryption vs. Hacking', 'This video tackles about encryption and hashing. The definition, purpose, differences as well as the algorithms are explained. This video is helpful to know the importance of encryption and hashing in information security in this modern era.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/221c92af6cf40.png', NULL, 'on_sale', NULL),
(23, 6, ' ', 'Distance Sensor', 'This project is a protoype on the breadboard with distance sensor and rgb led. The red led will turn on if there’s an object that can sense by the sensor. The green led will turn on if there’s no object within the distance sensor can sense.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/51beb2844aa7c.jpg', NULL, 'on_sale', NULL),
(24, 6, ' ', 'Selection Controls', 'This project is made in Visual Studio to let the users enter some text and experiment the output of it by clicking the following options like change font property and change forecolor property.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/6a82e34cd2640.jpg', NULL, 'on_sale', NULL),
(25, 6, ' ', 'Cellular Order', 'A simple invoice form that is created in Visual Studio. This project will compute the quantity and total price of the phones ordered. Aside from that, this system will let the user to enter the personal details to be included in the invoice.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/1734a49091149.jpg', NULL, 'on_sale', NULL),
(26, 6, ' ', 'Wi-Fi Connection', 'An activity for the subject Networks and Security. It shows how the school buildings got some connection from the internet.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/30b1f6f7203d2.png', NULL, 'on_sale', NULL),
(27, 6, ' ', 'Color Game', 'This system is also created in Visual Studio. When the user pick one from the options, another form or page will pop up full of different colors so that the user can pick which color does he want to apply on his box from the main form.\r\n', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/833e448bf620a.png', NULL, 'on_sale', NULL),
(28, 6, ' ', 'Imusenyo', 'This shirt was made for a contest in Imus, Cavite. The design of the t-shirt is drawn by hand and applied it on this virtual t-shirt using a mobile art app.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/3a8842b4bdef9.png', NULL, 'on_sale', NULL),
(29, 6, ' ', 'Simple Payroll Calculator', 'One of the project that is made in Visual Studio. The system is called Simple Payroll Calculator where you can compute the gross pay and net pay of an employee. The user can also select to print the payslip if he wants to have a copy.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/6ac8293f53ffc.png', NULL, 'on_sale', NULL),
(30, 7, ' ', 'Calculateit', 'CalculateIt is a free online calculator website developed by Elaine S. Andus. It contains a simple user interface and yet incredible functionality. This is primarily a simple basic calculator with memory functions similar to handheld calculator we use in our daily lives. You can enjoy calculating and use this basic online calculator website any time for math problems that include its operators mainly: addition, subtraction, division, and multiplication.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/d8a5a5b9db76f.png', NULL, 'on_sale', NULL),
(31, 7, ' ', 'Gotraventour', 'GoTraventour is a travel website developed by Elaine S. Andus. The purpose of this website is to provide information related to local or international tourists’ destinations. When you are planning trips to where you are not familiar with, you may need to look into them. It is a trendy and fully editable asset, perfectly suitable for promoting your travel agency. It can also be a perfect solution for tour operators, car rentals, or any other business in the tourism industry. This travel agency HTML website comes with everything needed to present your services in the best light. Its top-notch features encourage you to create a professional website without high-level coding skills.\r\n\r\n', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/bbfd925f408f3.png', NULL, 'on_sale', NULL),
(32, 7, ' ', 'Hometelroyale', 'HometelRoyale is a hotel booking website developed by Elaine S. Andus. With most travelers today now booking their stays online, hotels have had to become reliant on online travel agents to deliver them reservations. Listing on them includes the benefits of reaching large, new, audiences and increasing bookings but each reservation requires a commission fee to be paid to the third-party. This website was made as a source of information for both guests and a hotel. It contains the domain name, what it offers, contact information, reviews, and all you need to learn about HometelRoyale hotel.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/b69a9d79df22e.png', NULL, 'on_sale', NULL),
(33, 7, ' ', 'Shortenlink', 'ShortenLink is a free URL shortener website developed by Elaine S. Andus. Since the dawn of the internet, links have been the way to get from one place to another online. Think about it, you either start by searching for something and then clicking a link, or by typing a link directly into your browser’s address bar. There’s no other way to get around. So, this website was made involving everything to do with links. Its purpose is simply to compress, shrink or shorten any link you will input.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/2a2c006b6ce9c.png', NULL, 'on_sale', NULL),
(34, 7, ' ', 'Encryption vs. Hashing', 'Encryption vs Hashing is a tutorial video created by Elaine S. Andus. Quick, do you know the difference between encryption and hashing? Do you know what symmetric encryption and asymmetric encryption are? Do you think to encrypt and to hash is almost the same? If you pay any attention to the world of cybersecurity, you’re likely to hear these terms bandied about. Oftentimes without any explanation. So, this tutorial video project I made in Information Assurance and Security tackles mainly about the differences between encryption and hashing and its algorithm.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/7ed65d0f5e213.png', NULL, 'on_sale', NULL),
(35, 7, ' ', 'Anduswebsite', 'AndusWebsite is a portfolio website developed by Elaine S. Andus. It is becoming increasingly important for computer scientists, and other creative and professional people to have a way to showcase and promote their work. Regardless of the medium(s) you work with, a portfolio will give more people access to your work and a better idea of your abilities. So, I made this website not only for project requirement but for future purposes. My website displays my skills and projects in a robust and visual way that complements the information in my Curriculum Vitae. Another good thing it provides is, it also allows me to organize my work in one place environment.', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/b123f1d7ab937.png', NULL, 'on_sale', NULL),
(36, 7, ' ', 'Arduino Projects', 'Arduino Projects is an Arduino website developed by Elaine S. Andus. Inside the website contains what exactly is an Arduino, its definition, why do we use it and the 10 different and simple Arduino projects that any beginners can try and do on their own. Learning Arduino is not easy as you’ll need to understand the hardware, programming, and connection methods. Fret not. The Arduino Projects website got you covered. Interested in Arduino projects but not sure where to begin? Why not try these 10 simple projects that will surely get you going.\r\n', NULL, NULL, 'http://localhost/TEAM04/public/uploads/projects/de090d27fc2b1.png', NULL, 'on_sale', NULL);

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

--
-- Dumping data for table `project_picture`
--

INSERT INTO `project_picture` (`project_picture_id`, `project_id`, `user_id`, `project_picture`, `is_cover`) VALUES
(1, 1, 1, 'http://localhost/TEAM04/public/uploads/projects/bbfaa221684a1.png', 'true'),
(2, 1, 1, 'http://localhost/TEAM04/public/uploads/projects/7a6f91a7e3ec6.png', 'false'),
(3, 1, 1, 'http://localhost/TEAM04/public/uploads/projects/689fbd8ba4ca0.png', 'false'),
(4, 1, 1, 'http://localhost/TEAM04/public/uploads/projects/efe32e75a106f.png', 'false'),
(5, 1, 1, 'http://localhost/TEAM04/public/uploads/projects/8e1a27542b57d.png', 'false'),
(6, 1, 1, 'http://localhost/TEAM04/public/uploads/projects/77df5f7d5597a.png', 'false'),
(7, 2, 1, 'http://localhost/TEAM04/public/uploads/projects/6a9b7ab475604.png', 'true'),
(8, 3, 1, 'http://localhost/TEAM04/public/uploads/projects/3033ba9970454.png', 'true'),
(9, 3, 1, 'http://localhost/TEAM04/public/uploads/projects/bcafc725957dc.png', 'false'),
(10, 3, 1, 'http://localhost/TEAM04/public/uploads/projects/3a77f0d89bec9.png', 'false'),
(11, 3, 1, 'http://localhost/TEAM04/public/uploads/projects/bb54c59f860be.png', 'false'),
(12, 4, 1, 'http://localhost/TEAM04/public/uploads/projects/1323a80d259c5.png', 'true'),
(13, 4, 1, 'http://localhost/TEAM04/public/uploads/projects/a37b795ead0f8.png', 'false'),
(14, 4, 1, 'http://localhost/TEAM04/public/uploads/projects/efdcaa9f3d567.png', 'false'),
(15, 4, 1, 'http://localhost/TEAM04/public/uploads/projects/600722b9e68c4.png', 'false'),
(16, 4, 1, 'http://localhost/TEAM04/public/uploads/projects/b10538b91fed6.png', 'false'),
(17, 4, 1, 'http://localhost/TEAM04/public/uploads/projects/17d7c08245a6f.png', 'false'),
(18, 5, 1, 'http://localhost/TEAM04/public/uploads/projects/c430bbc699573.png', 'true'),
(19, 5, 1, 'http://localhost/TEAM04/public/uploads/projects/34a34782a70f8.png', 'false'),
(20, 5, 1, 'http://localhost/TEAM04/public/uploads/projects/7c01893eea00b.png', 'false'),
(21, 5, 1, 'http://localhost/TEAM04/public/uploads/projects/0e28cbf726bba.png', 'false'),
(22, 5, 1, 'http://localhost/TEAM04/public/uploads/projects/27e9ebc811136.png', 'false'),
(23, 6, 2, 'http://localhost/TEAM04/public/uploads/projects/d585da2cb9fd5.png', 'true'),
(24, 7, 2, 'http://localhost/TEAM04/public/uploads/projects/b1bd9070c44be.png', 'true'),
(25, 8, 3, 'http://localhost/TEAM04/public/uploads/projects/b7dba1935f8d5.png', 'true'),
(26, 8, 3, 'http://localhost/TEAM04/public/uploads/projects/fee00000a2b23.png', 'false'),
(27, 8, 3, 'http://localhost/TEAM04/public/uploads/projects/2c175076b1c44.png', 'false'),
(28, 8, 3, 'http://localhost/TEAM04/public/uploads/projects/53808dd438a09.png', 'false'),
(29, 8, 3, 'http://localhost/TEAM04/public/uploads/projects/df977551873fc.png', 'false'),
(30, 9, 3, 'http://localhost/TEAM04/public/uploads/projects/cb440d096fcad.png', 'true'),
(31, 9, 3, 'http://localhost/TEAM04/public/uploads/projects/36723f4fbf0e1.png', 'false'),
(32, 9, 3, 'http://localhost/TEAM04/public/uploads/projects/bf246c15d2aa2.png', 'false'),
(33, 9, 3, 'http://localhost/TEAM04/public/uploads/projects/ff03c2889779f.png', 'false'),
(34, 10, 3, 'http://localhost/TEAM04/public/uploads/projects/1277f52ace82c.png', 'true'),
(35, 10, 3, 'http://localhost/TEAM04/public/uploads/projects/15ac697b6af40.png', 'false'),
(36, 10, 3, 'http://localhost/TEAM04/public/uploads/projects/f331a556378fc.png', 'false'),
(37, 10, 3, 'http://localhost/TEAM04/public/uploads/projects/d7486d1d876a8.png', 'false'),
(38, 10, 3, 'http://localhost/TEAM04/public/uploads/projects/aa668a1367fd5.png', 'false'),
(39, 10, 3, 'http://localhost/TEAM04/public/uploads/projects/b18148173d972.png', 'false'),
(40, 11, 3, 'http://localhost/TEAM04/public/uploads/projects/3901cf9dd00f2.png', 'true'),
(41, 11, 3, 'http://localhost/TEAM04/public/uploads/projects/4e60912149209.png', 'false'),
(42, 11, 3, 'http://localhost/TEAM04/public/uploads/projects/cde34a2aab0f2.png', 'false'),
(43, 11, 3, 'http://localhost/TEAM04/public/uploads/projects/1c8d9abd9448b.png', 'false'),
(44, 12, 4, 'http://localhost/TEAM04/public/uploads/projects/1170ada8dd82c.jpeg', 'true'),
(45, 13, 4, 'http://localhost/TEAM04/public/uploads/projects/a12dfa461ce61.jpeg', 'true'),
(46, 14, 4, 'http://localhost/TEAM04/public/uploads/projects/54468370771fc.jpeg', 'true'),
(47, 15, 4, 'http://localhost/TEAM04/public/uploads/projects/9a8d36973dfca.jpeg', 'true'),
(48, 16, 4, 'http://localhost/TEAM04/public/uploads/projects/e8e745891c24b.png', 'true'),
(49, 17, 4, 'http://localhost/TEAM04/public/uploads/projects/7ac9278d24765.png', 'true'),
(50, 17, 4, 'http://localhost/TEAM04/public/uploads/projects/308b748673272.png', 'false'),
(51, 17, 4, 'http://localhost/TEAM04/public/uploads/projects/0d2e03c94e0b8.png', 'false'),
(52, 17, 4, 'http://localhost/TEAM04/public/uploads/projects/7fd42544a6524.png', 'false'),
(53, 18, 5, 'http://localhost/TEAM04/public/uploads/projects/343de0fb0a7ae.png', 'true'),
(54, 19, 5, 'http://localhost/TEAM04/public/uploads/projects/6767d8046ba87.png', 'true'),
(55, 20, 5, 'http://localhost/TEAM04/public/uploads/projects/ac38f840afe02.png', 'true'),
(56, 20, 5, 'http://localhost/TEAM04/public/uploads/projects/6e724cfc67f90.png', 'false'),
(57, 20, 5, 'http://localhost/TEAM04/public/uploads/projects/749711fb6d2ff.png', 'false'),
(58, 20, 5, 'http://localhost/TEAM04/public/uploads/projects/c982854b6d691.png', 'false'),
(59, 21, 5, 'http://localhost/TEAM04/public/uploads/projects/9c51b7c7b0369.png', 'true'),
(60, 21, 5, 'http://localhost/TEAM04/public/uploads/projects/49404774eda40.png', 'false'),
(61, 21, 5, 'http://localhost/TEAM04/public/uploads/projects/73cdb50a0cd2d.png', 'false'),
(62, 21, 5, 'http://localhost/TEAM04/public/uploads/projects/dc6fbb03cf8da.png', 'false'),
(63, 22, 5, 'http://localhost/TEAM04/public/uploads/projects/221c92af6cf40.png', 'true'),
(64, 22, 5, 'http://localhost/TEAM04/public/uploads/projects/2f9e42ebb3c03.png', 'false'),
(65, 22, 5, 'http://localhost/TEAM04/public/uploads/projects/2f5f1e752b74e.png', 'false'),
(66, 22, 5, 'http://localhost/TEAM04/public/uploads/projects/6f7374a72cd70.png', 'false'),
(67, 22, 5, 'http://localhost/TEAM04/public/uploads/projects/48c0fafb07537.png', 'false'),
(68, 23, 6, 'http://localhost/TEAM04/public/uploads/projects/51beb2844aa7c.jpg', 'true'),
(69, 23, 6, 'http://localhost/TEAM04/public/uploads/projects/8ca3bf7733c99.jpg', 'false'),
(70, 23, 6, 'http://localhost/TEAM04/public/uploads/projects/5594201826c98.jpg', 'false'),
(71, 23, 6, 'http://localhost/TEAM04/public/uploads/projects/15971aabccf79.jpg', 'false'),
(72, 23, 6, 'http://localhost/TEAM04/public/uploads/projects/d7e947b240438.jpg', 'false'),
(73, 23, 6, 'http://localhost/TEAM04/public/uploads/projects/3d839be66fac3.jpg', 'false'),
(74, 24, 6, 'http://localhost/TEAM04/public/uploads/projects/6a82e34cd2640.jpg', 'true'),
(75, 25, 6, 'http://localhost/TEAM04/public/uploads/projects/1734a49091149.jpg', 'true'),
(76, 26, 6, 'http://localhost/TEAM04/public/uploads/projects/30b1f6f7203d2.png', 'true'),
(77, 27, 6, 'http://localhost/TEAM04/public/uploads/projects/833e448bf620a.png', 'true'),
(78, 28, 6, 'http://localhost/TEAM04/public/uploads/projects/3a8842b4bdef9.png', 'true'),
(79, 29, 6, 'http://localhost/TEAM04/public/uploads/projects/6ac8293f53ffc.png', 'true'),
(80, 30, 7, 'http://localhost/TEAM04/public/uploads/projects/d8a5a5b9db76f.png', 'true'),
(81, 31, 7, 'http://localhost/TEAM04/public/uploads/projects/bbfd925f408f3.png', 'true'),
(82, 32, 7, 'http://localhost/TEAM04/public/uploads/projects/b69a9d79df22e.png', 'true'),
(83, 33, 7, 'http://localhost/TEAM04/public/uploads/projects/2a2c006b6ce9c.png', 'true'),
(84, 34, 7, 'http://localhost/TEAM04/public/uploads/projects/7ed65d0f5e213.png', 'true'),
(85, 34, 7, 'http://localhost/TEAM04/public/uploads/projects/8eb6453192ae4.png', 'false'),
(86, 34, 7, 'http://localhost/TEAM04/public/uploads/projects/488f3d6522e56.png', 'false'),
(87, 34, 7, 'http://localhost/TEAM04/public/uploads/projects/706db383fab77.png', 'false'),
(88, 34, 7, 'http://localhost/TEAM04/public/uploads/projects/bdb96d356c00e.png', 'false'),
(89, 34, 7, 'http://localhost/TEAM04/public/uploads/projects/df1bf40730d64.png', 'false'),
(90, 35, 7, 'http://localhost/TEAM04/public/uploads/projects/b123f1d7ab937.png', 'true'),
(91, 35, 7, 'http://localhost/TEAM04/public/uploads/projects/3f6e2f1329663.png', 'false'),
(92, 35, 7, 'http://localhost/TEAM04/public/uploads/projects/4a895c7a444e6.png', 'false'),
(93, 35, 7, 'http://localhost/TEAM04/public/uploads/projects/c91edcf413e98.png', 'false'),
(94, 35, 7, 'http://localhost/TEAM04/public/uploads/projects/fa1bc6772298c.png', 'false'),
(95, 35, 7, 'http://localhost/TEAM04/public/uploads/projects/e56401b4e754c.png', 'false'),
(96, 36, 7, 'http://localhost/TEAM04/public/uploads/projects/de090d27fc2b1.png', 'true'),
(97, 36, 7, 'http://localhost/TEAM04/public/uploads/projects/d90b1b14b9220.png', 'false'),
(98, 36, 7, 'http://localhost/TEAM04/public/uploads/projects/187f5c2f52eaf.png', 'false'),
(99, 36, 7, 'http://localhost/TEAM04/public/uploads/projects/c864f518a609d.png', 'false'),
(100, 36, 7, 'http://localhost/TEAM04/public/uploads/projects/53f07763d6147.png', 'false'),
(101, 36, 7, 'http://localhost/TEAM04/public/uploads/projects/fd4534e32f981.png', 'false');

-- --------------------------------------------------------




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
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `project_picture`
--
ALTER TABLE `project_picture`
  MODIFY `project_picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`project_publisher_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `FK_user_id3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
