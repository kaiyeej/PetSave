-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2022 at 08:02 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petsave_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adoption`
--

CREATE TABLE `tbl_adoption` (
  `adoption_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'S',
  `application_date` date NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `social_media_account` varchar(30) NOT NULL,
  `address` varchar(150) NOT NULL,
  `contact_num` varchar(20) NOT NULL,
  `email_adderess` varchar(50) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `civil_status` varchar(10) NOT NULL,
  `alternate_contact` varchar(50) NOT NULL COMMENT 'If the applicant is a minor',
  `relationship` varchar(30) NOT NULL,
  `guardian_contact_num` varchar(30) NOT NULL,
  `q1` varchar(30) NOT NULL,
  `q2` varchar(30) NOT NULL,
  `q3` varchar(30) NOT NULL,
  `q4` varchar(30) NOT NULL,
  `q5` varchar(30) NOT NULL,
  `q6` varchar(30) NOT NULL,
  `q7` varchar(30) NOT NULL,
  `q8` varchar(30) NOT NULL,
  `q9` varchar(30) NOT NULL,
  `q10` varchar(30) NOT NULL,
  `q11` varchar(30) NOT NULL,
  `q12` varchar(30) NOT NULL,
  `q13` varchar(30) NOT NULL,
  `q14` varchar(30) NOT NULL,
  `q15` varchar(30) NOT NULL,
  `q16` varchar(30) NOT NULL,
  `q17` varchar(30) NOT NULL,
  `q18` varchar(30) NOT NULL,
  `q19` varchar(30) NOT NULL,
  `q20` varchar(30) NOT NULL,
  `q21` varchar(30) NOT NULL,
  `adoption_agreement` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_adoption`
--

INSERT INTO `tbl_adoption` (`adoption_id`, `animal_id`, `status`, `application_date`, `fullname`, `age`, `social_media_account`, `address`, `contact_num`, `email_adderess`, `occupation`, `civil_status`, `alternate_contact`, `relationship`, `guardian_contact_num`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `q17`, `q18`, `q19`, `q20`, `q21`, `adoption_agreement`, `date_added`, `user_id`) VALUES
(1, 0, 'A', '2022-10-26', 'Sample Name', 2, '2', '2', '2', '2@f.v', '2', 'Married', '2', '2', 'd', 'Other', 'Dog', '2', '2', '2', 'For myself', '2', 'Yes', 'Yes', 'Spouse', '2', '2', '2', '2', '2', '2', '2', 'Other', '2', '2', 'Yes', '', '2022-10-25 13:41:17', 0),
(2, 0, 'A', '2022-10-25', '1', 2, '2', '2', '2', '', '2', 'Single', '2', '2', '2', 'Website', 'Cat', '2', '2', '2', 'For myself', '2', 'No', 'Yes', 'Spouse', '2', '2', '2', '2', '2', '2', '2', 'House', '2', '2', 'No', '', '2022-10-25 13:57:29', 0),
(3, 0, 'A', '2022-10-25', 'kaye', 12, '2', '2', '3', '3@m.com', '3', 'Married', '3', '3', '3', 'Website', 'Cat', '3', '3', '3', 'For myself', '3', 'Yes', 'Yes', 'Parents', '3', '3', '3', '3', '3', '3', '3', 'House', '3', '3', 'Yes', '', '2022-10-25 14:04:31', 0),
(4, 0, '', '2022-10-26', 'juan de', 2, '', 'Bacolod Prosperity Feedmill Corp.', '1321', 'w@d.d', 's234', 'Single', '', '', '', 'Friends', 'Cat', 'No', 'No', 'No', 'For myself', 'No', 'Yes', 'Yes', 'Spouse', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'House', 'No', 'No', 'Yes', '', '2022-10-26 10:39:25', 0),
(5, 0, 'S', '2022-10-26', '3', 3, '', '3', '3', 'w@d.d', '3', 'Widowed', '3', '3', '3', 'Friends', 'Cat', '3', '3', '3', 'For someone else', '3', 'Yes', 'Yes', 'Roommates', '3', '3', '3', '3', '3', '3', '3', 'House', '3', '3', 'Yes', '', '2022-10-26 13:45:02', 0),
(6, 0, 'S', '0000-00-00', '', 0, '', '', '', '', '', 'Found', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-10-26 16:05:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_animals`
--

CREATE TABLE `tbl_animals` (
  `animal_id` int(11) NOT NULL,
  `animal_name` varchar(50) NOT NULL,
  `animal_description` varchar(250) NOT NULL,
  `animal_dob` date NOT NULL,
  `animal_type` varchar(1) NOT NULL,
  `animal_breed` varchar(30) NOT NULL,
  `animal_weight` varchar(30) NOT NULL,
  `animal_color` varchar(30) NOT NULL,
  `animal_identifier` varchar(250) NOT NULL,
  `animal_image` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_animals`
--

INSERT INTO `tbl_animals` (`animal_id`, `animal_name`, `animal_description`, `animal_dob`, `animal_type`, `animal_breed`, `animal_weight`, `animal_color`, `animal_identifier`, `animal_image`, `status`, `date_added`, `date_modified`) VALUES
(2, 'Bantay', 'white', '2022-10-26', 'A', 'Askal', '5.2', 'White', ' ', 'download (2).jpg', 0, '2022-10-26 12:56:54', '2022-10-27 14:01:28'),
(3, 'Memeng', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut', '2022-09-30', 'C', 'Cat', '2', 'Cat', 'Cat', 'images (1).jpg', 0, '2022-10-26 13:58:20', '2022-10-27 14:00:47'),
(4, 'Madison', 'This little girl stole our hearts with her sweetness. She is settling in to her foster home and learning how to be a dog. Stay tuned for more on Maddie!', '2022-09-15', 'D', '--', '2', 'white, brown', '', 'Madison+2.jpg', 0, '2022-10-26 14:12:10', '2022-10-26 14:16:53'),
(5, 'CHLOE', 'She is estimated to be about 4 years old and 20lbs. She is good with other dogs and good with kids. She is super cuddly and so far doing great with training. Stay tuned for more on Brooke!', '2022-09-06', 'D', ' ', '2', 'black and brown', '', 'Jerry4.jpg', 0, '2022-10-26 14:15:24', '2022-10-26 14:17:49');

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
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lost_and_found`
--

INSERT INTO `tbl_lost_and_found` (`if_id`, `if_animal_name`, `if_animal_desc`, `if_last_location_found`, `if_animal_image`, `if_other_remarks`, `if_type`, `status`, `date_added`, `date_modified`) VALUES
(1, '7', '7', '', 'Background.png', '7', '', 'R', '2022-10-26 16:11:31', '2022-10-27 13:39:45'),
(2, '3', '3', '3', 'png-clipart-do-not-catch-the-tongue-of-the-dog-pet-dog.png', '3', 'L', '', '2022-10-26 16:12:42', '2022-10-26 16:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_address` varchar(250) NOT NULL,
  `user_contact_num` varchar(20) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_remarks` varchar(250) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_fullname`, `user_address`, `user_contact_num`, `user_email`, `user_remarks`, `username`, `password`, `date_added`, `date_modified`) VALUES
(1, 'Juan Dela Cruz', 'Brgy. 16, Bacolod City', '09090909222', 'pawsbcd@petsave.com', 'Sample account', 'admin', '0cc175b9c0f1b6a831c399e269772661', '2022-10-25 14:36:57', '2022-10-27 11:28:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adoption`
--
ALTER TABLE `tbl_adoption`
  ADD PRIMARY KEY (`adoption_id`);

--
-- Indexes for table `tbl_animals`
--
ALTER TABLE `tbl_animals`
  ADD PRIMARY KEY (`animal_id`);

--
-- Indexes for table `tbl_lost_and_found`
--
ALTER TABLE `tbl_lost_and_found`
  ADD PRIMARY KEY (`if_id`);

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
  MODIFY `adoption_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_animals`
--
ALTER TABLE `tbl_animals`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_lost_and_found`
--
ALTER TABLE `tbl_lost_and_found`
  MODIFY `if_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
