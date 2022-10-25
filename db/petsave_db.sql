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
  `status` varchar(1) NOT NULL,
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
  PRIMARY KEY (`adoption_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table petsave_db.tbl_adoption: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_adoption` DISABLE KEYS */;
INSERT INTO `tbl_adoption` (`adoption_id`, `animal_id`, `status`, `application_date`, `fullname`, `age`, `social_media_account`, `address`, `contact_num`, `email_adderess`, `occupation`, `civil_status`, `alternate_contact`, `relationship`, `guardian_contact_num`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `q17`, `q18`, `q19`, `q20`, `q21`, `adoption_agreement`, `date_added`) VALUES
	(1, 0, '', '0000-00-00', 'James', 2, '2', '2', '2', '2@f.v', '2', 'Married', '2', '2', 'd', 'Other', 'Dog', '2', '2', '2', 'For myself', '2', 'Yes', 'Yes', 'Spouse', '2', '2', '2', '2', '2', '2', '2', 'Other', '2', '2', 'Yes', '', '2022-10-25 13:41:17'),
	(2, 0, '', '2022-10-25', '1', 2, '2', '2', '2', '', '2', 'Single', '2', '2', '2', 'Website', 'Cat', '2', '2', '2', 'For myself', '2', 'No', 'Yes', 'Spouse', '2', '2', '2', '2', '2', '2', '2', 'House', '2', '2', 'No', '', '2022-10-25 13:57:29'),
	(3, 0, '', '2022-10-25', 'kaye', 12, '2', '2', '3', '3@m.com', '3', 'Married', '3', '3', '3', 'Website', 'Cat', '3', '3', '3', 'For myself', '3', 'Yes', 'Yes', 'Parents', '3', '3', '3', '3', '3', '3', '3', 'House', '3', '3', 'Yes', '', '2022-10-25 14:04:31');
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
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`animal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table petsave_db.tbl_animals: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_animals` DISABLE KEYS */;
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
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`if_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table petsave_db.tbl_lost_and_found: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_lost_and_found` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_lost_and_found` ENABLE KEYS */;

-- Dumping structure for table petsave_db.tbl_users
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fullname` varchar(50) NOT NULL,
  `user_address` varchar(250) NOT NULL,
  `user_contact_num` varchar(20) NOT NULL,
  `user_remarks` varchar(250) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table petsave_db.tbl_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`user_id`, `user_fullname`, `user_address`, `user_contact_num`, `user_remarks`, `username`, `password`, `date_added`, `date_modified`) VALUES
	(1, 'Juan Dela Cruz', '', '', '', 'admin', '0cc175b9c0f1b6a831c399e269772661', '2022-10-25 14:36:57', '2022-10-25 14:37:38');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
