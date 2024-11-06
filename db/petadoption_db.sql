-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 03:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petadoption_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adoption`
--

CREATE TABLE `tbl_adoption` (
  `adoption_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'S',
  `application_date` date NOT NULL,
  `user_social_media` varchar(50) NOT NULL DEFAULT '',
  `user_spouse` varchar(50) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_adoption`
--

INSERT INTO `tbl_adoption` (`adoption_id`, `pet_id`, `status`, `application_date`, `user_social_media`, `user_spouse`, `date_added`, `user_id`) VALUES
(1, 0, 'A', '2022-10-26', '', '', '2022-10-25 13:41:17', 0),
(2, 0, 'A', '2022-10-25', '', '', '2022-10-25 13:57:29', 0),
(3, 0, 'A', '2022-10-25', '', '', '2022-10-25 14:04:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lost_and_found`
--

CREATE TABLE `tbl_lost_and_found` (
  `if_id` int(11) NOT NULL,
  `if_animal_name` varchar(30) NOT NULL,
  `if_animal_desc` varchar(250) NOT NULL,
  `if_last_location_found` varchar(100) NOT NULL,
  `if_animal_image` text NOT NULL,
  `if_other_remarks` text NOT NULL,
  `if_type` varchar(1) NOT NULL COMMENT 'L = Lost ;  F = Found',
  `status` varchar(1) NOT NULL,
  `shelter_id` int(11) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lost_and_found`
--

INSERT INTO `tbl_lost_and_found` (`if_id`, `if_animal_name`, `if_animal_desc`, `if_last_location_found`, `if_animal_image`, `if_other_remarks`, `if_type`, `status`, `shelter_id`, `date_added`, `date_modified`) VALUES
(1, '7', '7', '', 'Background.png', '7', '', 'R', NULL, '2022-10-26 16:11:31', '2022-10-27 13:39:45'),
(2, '3', '3', '3', 'png-clipart-do-not-catch-the-tongue-of-the-dog-pet-dog.png', '3', 'L', '', NULL, '2022-10-26 16:12:42', '2022-10-26 16:12:42'),
(3, 'ewr', 'e', 'we', 'logo.jpg', 'w', 'L', '', NULL, '2022-11-08 14:30:09', '2022-11-08 14:30:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pets`
--

CREATE TABLE `tbl_pets` (
  `pet_id` int(11) NOT NULL,
  `pet_name` varchar(50) NOT NULL,
  `pet_description` varchar(250) NOT NULL,
  `pet_dob` date DEFAULT NULL,
  `pet_type` varchar(1) NOT NULL,
  `pet_breed` varchar(30) NOT NULL,
  `pet_identifier` varchar(250) NOT NULL,
  `pet_image` text NOT NULL,
  `pet_status` varchar(1) NOT NULL COMMENT 'P - for adoption; A- aptode ; R - rescues; B - rehabilitated; C - reclaimed',
  `pet_owner` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pets`
--

INSERT INTO `tbl_pets` (`pet_id`, `pet_name`, `pet_description`, `pet_dob`, `pet_type`, `pet_breed`, `pet_identifier`, `pet_image`, `pet_status`, `pet_owner`, `date_added`, `date_modified`) VALUES
(2, 'Bantay', 'white', '2022-10-26', 'A', 'Askal', ' ', 'download (2).jpg', '0', 1, '2022-10-26 12:56:54', '2022-11-04 08:39:52'),
(3, 'Memeng', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut', '2022-09-30', 'C', 'Cat', 'Cat', 'images (1).jpg', '0', 1, '2022-10-26 13:58:20', '2022-11-04 08:39:55'),
(4, 'Madison', 'This little girl stole our hearts with her sweetness. She is settling in to her foster home and learning how to be a dog. Stay tuned for more on Maddie!', '2022-09-15', 'D', '--', '', 'Madison+2.jpg', '0', 1, '2022-10-26 14:12:10', '2022-11-04 08:39:57'),
(5, 'CHLOE', 'She is estimated to be about 4 years old and 20lbs. She is good with other dogs and good with kids. She is super cuddly and so far doing great with training. Stay tuned for more on Brooke!', '2022-09-06', 'D', ' ', '', 'Jerry4.jpg', '0', 1, '2022-10-26 14:15:24', '2022-11-04 08:45:26'),
(6, 'Pepe', 'pepe', '2024-10-02', 'p', 'p', 'p', 'dog_PNG50375.png', '', 0, '2024-11-05 16:43:39', '2024-11-05 16:43:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_title` varchar(30) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp(),
  `post_category` varchar(1) NOT NULL DEFAULT '' COMMENT 'A,E',
  `post_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_posts`
--

INSERT INTO `tbl_posts` (`post_id`, `user_id`, `post_title`, `post_content`, `post_date`, `post_category`, `post_status`) VALUES
(1, 1, 'Title 1', 'Sample contents', '2022-02-03 14:09:24', 'A', 1),
(2, 1, 'Title 1', 'Sample contentss', '2022-01-01 14:09:24', 'I', 1),
(3, 1, 'Title 1', 'Sample contents', '2022-03-05 14:09:24', 'A', 1),
(4, 0, 'Post 1', '1', '2022-09-13 07:47:35', '', 1),
(6, 1, 'Title 1', 'Sample contents', '2022-04-07 14:09:24', 'A', 1),
(7, 0, 'asdas', 'dasdad', '2022-05-11 08:52:02', 'A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rehab`
--

CREATE TABLE `tbl_rehab` (
  `rehab_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `rehab_desc` int(11) NOT NULL,
  `date_started` date NOT NULL,
  `date_ended` date NOT NULL,
  `status` varchar(1) NOT NULL COMMENT 'O - ongoing ; R - reclaimed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rescue`
--

CREATE TABLE `tbl_rescue` (
  `rescue_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `location` text DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `rescue_type` varchar(1) DEFAULT NULL COMMENT 'C - Rescue ; R - reported',
  `status` varchar(1) DEFAULT NULL COMMENT 'A - Accepted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_category` varchar(1) NOT NULL,
  `user_contact_num` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_civil_status` varchar(10) NOT NULL,
  `user_city` varchar(50) NOT NULL,
  `user_address` varchar(250) NOT NULL,
  `user_occupation` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_last_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_fullname`, `user_category`, `user_contact_num`, `user_email`, `user_civil_status`, `user_city`, `user_address`, `user_occupation`, `username`, `password`, `date_added`, `date_last_modified`) VALUES
(1, 'Juan Dela Cruz', 'A', '09265402020', '', '', '', '', '', 'admin', '0cc175b9c0f1b6a831c399e269772661', '2022-10-25 14:36:57', '2022-11-04 09:37:08'),
(2, 's', 'S', 'aasd', '', '', '', '', '', 's', '0cc175b9c0f1b6a831c399e269772661', '2022-11-04 09:47:09', '2022-11-04 09:52:13'),
(3, 'Care Admin', 'A', '6555', '', '', '', '', '', 'carebcd', '0cc175b9c0f1b6a831c399e269772661', '2022-11-04 13:53:13', '2022-11-04 13:57:44'),
(4, '3', 'A', '3', '', '', '', '', '', '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '2022-11-04 13:55:40', '2022-11-04 13:55:40'),
(5, 's', 'A', '3', '', '', '', '', '', '2', '37693cfc748049e45d87b8c7d8b9aacd', '2022-11-04 13:58:04', '2022-11-04 13:58:04'),
(6, '23', 'A', '233', '', '', '', '', '', '23', 'c81e728d9d4c2f636f067f89cc14862c', '2022-11-04 14:12:47', '2022-11-04 14:12:47'),
(7, 'ss', 'A', 's', '', '', '', '', '', 'ss', '03c7c0ace395d80182db07ae2c30f034', '2022-11-04 14:32:00', '2022-11-04 14:32:00'),
(8, 'sad', 'A', 'sad', '', '', '', '', '', 'caresfsd@gmail.coms', '2398f39c695d1dd15006ab0a2edcebcb', '2022-11-04 15:02:52', '2022-11-04 15:02:52'),
(9, 'sad6', 'A', 'sad', '', '', '', '', '', 'caresfsd@gmail.co6ms', '2398f39c695d1dd15006ab0a2edcebcb', '2022-11-04 15:03:18', '2022-11-04 15:03:18'),
(10, 'sad6', 'A', 'sad', '', '', '', '', '', 'caresfsd@gmsadail.co6ms', '2398f39c695d1dd15006ab0a2edcebcb', '2022-11-04 15:05:58', '2022-11-04 15:05:58'),
(11, 'Juan Ponce', 'A', '0212121', '', '', '', '', '', 'greenpaws', '0cc175b9c0f1b6a831c399e269772661', '2022-11-08 14:40:29', '2022-11-08 14:40:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adoption`
--
ALTER TABLE `tbl_adoption`
  ADD PRIMARY KEY (`adoption_id`);

--
-- Indexes for table `tbl_lost_and_found`
--
ALTER TABLE `tbl_lost_and_found`
  ADD PRIMARY KEY (`if_id`);

--
-- Indexes for table `tbl_pets`
--
ALTER TABLE `tbl_pets`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tbl_rehab`
--
ALTER TABLE `tbl_rehab`
  ADD PRIMARY KEY (`rehab_id`);

--
-- Indexes for table `tbl_rescue`
--
ALTER TABLE `tbl_rescue`
  ADD PRIMARY KEY (`rescue_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_adoption`
--
ALTER TABLE `tbl_adoption`
  MODIFY `adoption_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_lost_and_found`
--
ALTER TABLE `tbl_lost_and_found`
  MODIFY `if_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pets`
--
ALTER TABLE `tbl_pets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_rehab`
--
ALTER TABLE `tbl_rehab`
  MODIFY `rehab_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_rescue`
--
ALTER TABLE `tbl_rescue`
  MODIFY `rescue_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
