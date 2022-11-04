-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table petsave_db.tbl_adoption
CREATE TABLE IF NOT EXISTS `tbl_adoption` (
  `adoption_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`adoption_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table petsave_db.tbl_adoption: ~17 rows (approximately)
/*!40000 ALTER TABLE `tbl_adoption` DISABLE KEYS */;
INSERT INTO `tbl_adoption` (`adoption_id`, `animal_id`, `status`, `application_date`, `fullname`, `age`, `social_media_account`, `address`, `contact_num`, `email_adderess`, `occupation`, `civil_status`, `alternate_contact`, `relationship`, `guardian_contact_num`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `q17`, `q18`, `q19`, `q20`, `q21`, `adoption_agreement`, `date_added`, `user_id`) VALUES
	(1, 0, 'A', '2022-10-26', 'Sample Name', 2, '2', '2', '2', '2@f.v', '2', 'Married', '2', '2', 'd', 'Other', 'Dog', '2', '2', '2', 'For myself', '2', 'Yes', 'Yes', 'Spouse', '2', '2', '2', '2', '2', '2', '2', 'Other', '2', '2', 'Yes', '', '2022-10-25 13:41:17', 0),
	(2, 0, 'A', '2022-10-25', '1', 2, '2', '2', '2', '', '2', 'Single', '2', '2', '2', 'Website', 'Cat', '2', '2', '2', 'For myself', '2', 'No', 'Yes', 'Spouse', '2', '2', '2', '2', '2', '2', '2', 'House', '2', '2', 'No', '', '2022-10-25 13:57:29', 0),
	(3, 0, 'A', '2022-10-25', 'kaye', 12, '2', '2', '3', '3@m.com', '3', 'Married', '3', '3', '3', 'Website', 'Cat', '3', '3', '3', 'For myself', '3', 'Yes', 'Yes', 'Parents', '3', '3', '3', '3', '3', '3', '3', 'House', '3', '3', 'Yes', '', '2022-10-25 14:04:31', 0),
	(4, 0, '', '2022-10-26', 'juan de', 2, '', 'Bacolod Prosperity Feedmill Corp.', '1321', 'w@d.d', 's234', 'Single', '', '', '', 'Friends', 'Cat', 'No', 'No', 'No', 'For myself', 'No', 'Yes', 'Yes', 'Spouse', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'House', 'No', 'No', 'Yes', '', '2022-10-26 10:39:25', 0),
	(5, 0, 'S', '2022-10-26', '3', 3, '', '3', '3', 'w@d.d', '3', 'Widowed', '3', '3', '3', 'Friends', 'Cat', '3', '3', '3', 'For someone else', '3', 'Yes', 'Yes', 'Roommates', '3', '3', '3', '3', '3', '3', '3', 'House', '3', '3', 'Yes', '', '2022-10-26 13:45:02', 0),
	(6, 0, 'S', '0000-00-00', '', 0, '', '', '', '', '', 'Found', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-10-26 16:05:24', 0),
	(7, 0, 'S', '0000-00-00', '$fullname', 0, '$social_media_account', '$address', '$contact_num', '$email_adderess', '$occupation', '$civil_sta', '$alternate_contact', '$relationship', '$guardian_contact_num', '$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$q7', '$q8', '$q9', '$q10', '$q11', '$q12', '$q13', '$q14', '$q15', '$q16', '$q17', '$q18', '$q19', '$q20', '$q21', '', '2022-11-04 15:46:08', 0),
	(8, 0, 'S', '2022-11-04', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-11-04 15:48:12', 0),
	(9, 0, 'S', '2022-11-04', '3', 3243, '34', '34', '3', '', '33', '44', '4', '4', '5', 'Social Media', 'Dog', '55', '5', '5', 'For someone else', '5', 'Yes', 'Yes', 'Spouse', '55', '5', '5', '5', '5', '5', '5', 'House', '5', '5', 'Yes', '', '2022-11-04 15:48:12', 0),
	(10, 0, 'S', '2022-11-04', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-11-04 15:49:39', 0),
	(11, 0, 'S', '2022-11-04', '33', 3, '3', '3', '3', '', '3', '3', '3', '3', '3', 'Other', 'Cat', '3', '3', '3', 'For myself', '3', 'No', 'Yes', 'Parents', '3', '33', '3', '3', '4', '4', '4', 'Apartment', '4', '4', 'Yes', '', '2022-11-04 15:49:39', 0),
	(12, 0, 'S', '2022-11-04', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-11-04 15:50:48', 0),
	(13, 0, 'S', '2022-11-04', '33', 3, '3', '3', '3', '3', '3', '3', '3', '3', '3', 'Other', 'Cat', '3', '3', '3', 'For myself', '3', 'No', 'Yes', 'Parents', '3', '33', '3', '3', '4', '4', '4', 'Apartment', '4', '4', 'Yes', '', '2022-11-04 15:50:48', 0),
	(14, 0, 'S', '2022-11-04', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-11-04 15:51:03', 0),
	(15, 0, 'S', '2022-11-04', '33', 3, '3', '3', '3', '3', '3', '3', '3', '3', '3', 'Other', 'Cat', '3', '3', '3', 'For myself', '3', 'No', 'Yes', 'Parents', '3', '33', '3', '3', '4', '4', '4', 'Apartment', '4', '4', 'Yes', '', '2022-11-04 15:51:03', 0),
	(16, 0, 'S', '2022-11-04', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-11-04 15:51:20', 0),
	(17, 0, 'S', '2022-11-04', '33', 3, '3', '3', '3', '3', '3', '3', '3', '3', '3', 'Other', 'Cat', '3', '3', '3', 'For myself', '3', 'No', 'Yes', 'Parents', '3', '33', '3', '3', '4', '4', '4', 'Apartment', '4', '4', 'Yes', '', '2022-11-04 15:51:20', 0);
/*!40000 ALTER TABLE `tbl_adoption` ENABLE KEYS */;

-- Dumping structure for table petsave_db.tbl_animals
CREATE TABLE IF NOT EXISTS `tbl_animals` (
  `animal_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `shelter_id` int(11) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`animal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table petsave_db.tbl_animals: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_animals` DISABLE KEYS */;
INSERT INTO `tbl_animals` (`animal_id`, `animal_name`, `animal_description`, `animal_dob`, `animal_type`, `animal_breed`, `animal_weight`, `animal_color`, `animal_identifier`, `animal_image`, `status`, `shelter_id`, `date_added`, `date_modified`) VALUES
	(2, 'Bantay', 'white', '2022-10-26', 'A', 'Askal', '5.2', 'White', ' ', 'download (2).jpg', 0, 1, '2022-10-26 12:56:54', '2022-11-04 08:39:52'),
	(3, 'Memeng', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut', '2022-09-30', 'C', 'Cat', '2', 'Cat', 'Cat', 'images (1).jpg', 0, 1, '2022-10-26 13:58:20', '2022-11-04 08:39:55'),
	(4, 'Madison', 'This little girl stole our hearts with her sweetness. She is settling in to her foster home and learning how to be a dog. Stay tuned for more on Maddie!', '2022-09-15', 'D', '--', '2', 'white, brown', '', 'Madison+2.jpg', 0, 1, '2022-10-26 14:12:10', '2022-11-04 08:39:57'),
	(5, 'CHLOE', 'She is estimated to be about 4 years old and 20lbs. She is good with other dogs and good with kids. She is super cuddly and so far doing great with training. Stay tuned for more on Brooke!', '2022-09-06', 'D', ' ', '2', 'black and brown', '', 'Jerry4.jpg', 0, 1, '2022-10-26 14:15:24', '2022-11-04 08:45:26');
/*!40000 ALTER TABLE `tbl_animals` ENABLE KEYS */;

-- Dumping structure for table petsave_db.tbl_lost_and_found
CREATE TABLE IF NOT EXISTS `tbl_lost_and_found` (
  `if_id` int(11) NOT NULL AUTO_INCREMENT,
  `if_animal_name` varchar(30) NOT NULL,
  `if_animal_desc` varchar(250) NOT NULL,
  `if_last_location_found` varchar(100) NOT NULL,
  `if_animal_image` text NOT NULL,
  `if_other_remarks` text NOT NULL,
  `if_type` varchar(1) NOT NULL COMMENT 'L = Lost ;  F = Found',
  `status` varchar(1) NOT NULL,
  `shelter_id` int(11) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`if_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table petsave_db.tbl_lost_and_found: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_lost_and_found` DISABLE KEYS */;
INSERT INTO `tbl_lost_and_found` (`if_id`, `if_animal_name`, `if_animal_desc`, `if_last_location_found`, `if_animal_image`, `if_other_remarks`, `if_type`, `status`, `shelter_id`, `date_added`, `date_modified`) VALUES
	(1, '7', '7', '', 'Background.png', '7', '', 'R', NULL, '2022-10-26 16:11:31', '2022-10-27 13:39:45'),
	(2, '3', '3', '3', 'png-clipart-do-not-catch-the-tongue-of-the-dog-pet-dog.png', '3', 'L', '', NULL, '2022-10-26 16:12:42', '2022-10-26 16:12:42');
/*!40000 ALTER TABLE `tbl_lost_and_found` ENABLE KEYS */;

-- Dumping structure for table petsave_db.tbl_posts
CREATE TABLE IF NOT EXISTS `tbl_posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_title` varchar(30) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_category` varchar(1) NOT NULL DEFAULT '' COMMENT 'A,E',
  `post_status` int(1) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table petsave_db.tbl_posts: ~6 rows (approximately)
/*!40000 ALTER TABLE `tbl_posts` DISABLE KEYS */;
INSERT INTO `tbl_posts` (`post_id`, `user_id`, `post_title`, `post_content`, `post_date`, `post_category`, `post_status`) VALUES
	(1, 1, 'Title 1', 'Sample contents', '2022-02-03 14:09:24', 'A', 1),
	(2, 1, 'Title 1', 'Sample contentss', '2022-01-01 14:09:24', 'I', 1),
	(3, 1, 'Title 1', 'Sample contents', '2022-03-05 14:09:24', 'A', 1),
	(4, 0, 'Post 1', '1', '2022-09-13 07:47:35', '', 1),
	(6, 1, 'Title 1', 'Sample contents', '2022-04-07 14:09:24', 'A', 1),
	(7, 0, 'asdas', 'dasdad', '2022-05-11 08:52:02', 'A', 1);
/*!40000 ALTER TABLE `tbl_posts` ENABLE KEYS */;

-- Dumping structure for table petsave_db.tbl_shelters
CREATE TABLE IF NOT EXISTS `tbl_shelters` (
  `shelter_id` int(11) NOT NULL AUTO_INCREMENT,
  `shelter_name` varchar(50) NOT NULL,
  `shelter_address` varchar(150) NOT NULL,
  `shelter_email` varchar(30) NOT NULL,
  `shelter_contact_number` varchar(30) NOT NULL,
  `shelter_remarks` text NOT NULL,
  `shelter_location` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`shelter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table petsave_db.tbl_shelters: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_shelters` DISABLE KEYS */;
INSERT INTO `tbl_shelters` (`shelter_id`, `shelter_name`, `shelter_address`, `shelter_email`, `shelter_contact_number`, `shelter_remarks`, `shelter_location`, `date_added`, `date_last_modified`) VALUES
	(1, 'Balay Pawssion', 'M2JV+5W, Bacolod, Negros Occidental', 'balaypawssion@gmail.com', '0917120 3717', 'If you canâ€™t Adopt, Foster or Sponsor, there are always other ways to help!\r\n\r\nVolunteers who choose to spend time with our rescues play an important role in their rehabilitation and socialization. Most of the dogs at our shelters love to walk, play and get some quality time out of the environment they inhabit on a daily basis. Enrichment for the animals is one of the key factors to their wellbeing, so just getting more people to spend time with them and help supervise them, will already do wonders!', '', '2022-11-04 07:58:52', '2022-11-04 08:36:56'),
	(2, 'CARE Bacolod', 'J2C4+XGF, Bacolod, Negros Occidental', 'caresfsd@gmail.com', '0920 925 4500', 'COMMUNITY ANIMAL RESCUE EFFORTS (CARE), INC. is a SEC registered animal welfare organization in Bacolod City.\r\n\r\nWe seek to augment much-needed services in animal rescue, adoption, and in some cases, euthanasia of terminally ill street animals.', '', '2022-11-04 13:53:13', '2022-11-04 13:53:13');
/*!40000 ALTER TABLE `tbl_shelters` ENABLE KEYS */;

-- Dumping structure for table petsave_db.tbl_users
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fullname` varchar(50) NOT NULL,
  `user_category` varchar(1) NOT NULL,
  `user_contact_num` varchar(30) NOT NULL,
  `shelter_id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table petsave_db.tbl_users: ~10 rows (approximately)
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`user_id`, `user_fullname`, `user_category`, `user_contact_num`, `shelter_id`, `username`, `password`, `date_added`, `date_last_modified`) VALUES
	(1, 'Juan Dela Cruz', 'A', '09265402020', 1, 'admin', '0cc175b9c0f1b6a831c399e269772661', '2022-10-25 14:36:57', '2022-11-04 09:37:08'),
	(2, 's', 'S', 'aasd', 1, 's', '0cc175b9c0f1b6a831c399e269772661', '2022-11-04 09:47:09', '2022-11-04 09:52:13'),
	(3, 'Care Admin', 'A', '6555', 2, 'carebcd', '0cc175b9c0f1b6a831c399e269772661', '2022-11-04 13:53:13', '2022-11-04 13:57:44'),
	(4, '3', 'A', '3', 0, '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '2022-11-04 13:55:40', '2022-11-04 13:55:40'),
	(5, 's', 'A', '3', 0, '2', '37693cfc748049e45d87b8c7d8b9aacd', '2022-11-04 13:58:04', '2022-11-04 13:58:04'),
	(6, '23', 'A', '233', 1, '23', 'c81e728d9d4c2f636f067f89cc14862c', '2022-11-04 14:12:47', '2022-11-04 14:12:47'),
	(7, 'ss', 'A', 's', 1, 'ss', '03c7c0ace395d80182db07ae2c30f034', '2022-11-04 14:32:00', '2022-11-04 14:32:00'),
	(8, 'sad', 'A', 'sad', 1, 'caresfsd@gmail.coms', '2398f39c695d1dd15006ab0a2edcebcb', '2022-11-04 15:02:52', '2022-11-04 15:02:52'),
	(9, 'sad6', 'A', 'sad', 1, 'caresfsd@gmail.co6ms', '2398f39c695d1dd15006ab0a2edcebcb', '2022-11-04 15:03:18', '2022-11-04 15:03:18'),
	(10, 'sad6', 'A', 'sad', 1, 'caresfsd@gmsadail.co6ms', '2398f39c695d1dd15006ab0a2edcebcb', '2022-11-04 15:05:58', '2022-11-04 15:05:58');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;

-- Dumping structure for trigger petsave_db.delete_users
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `delete_users` AFTER DELETE ON `tbl_shelters` FOR EACH ROW DELETE FROM tbl_users WHERE shelter_id = OLD.shelter_id//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
