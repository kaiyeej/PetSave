-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2022 at 03:45 AM
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
-- Database: `cdms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_documents`
--

CREATE TABLE `tbl_documents` (
  `doc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doc_name` varchar(50) NOT NULL,
  `doc_type_id` int(11) NOT NULL,
  `doc_file` text NOT NULL,
  `doc_converted_text` text NOT NULL,
  `date_added` datetime NOT NULL,
  `date_last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_documents`
--

INSERT INTO `tbl_documents` (`doc_id`, `user_id`, `doc_name`, `doc_type_id`, `doc_file`, `doc_converted_text`, `date_added`, `date_last_modified`) VALUES
(11, 6, 'demo', 1, 'demo.gif', 'Mild Splendour of the various-vested Nightl\r\nMother of wildly-working visions! hail!\r\nI watch thy gliding, while with watery light\r\nThy weak eye glimmers through a ï¬‚eecy veil; _, L (AM Jdgnghsmgeawmnm5\r\nAnd when thou lovest thy pale orb to shroud â€œ335\r\nBehind the gatherâ€™d blackness lost on high;\r\nAnd when thou dartest from the wind-rent cloud\r\nThy placid lightning oâ€™er the awakenâ€™d sky.\r\n\r\n', '2022-09-07 15:19:26', '2022-09-07 15:19:26'),
(12, 1, 'test', 1, '0Jl54.png', 'It was the best of\r\ntimes, it was the worst\r\nof times, it was the age\r\nof wisdom, it was the\r\nage of foolishness...\r\n\r\n', '2022-09-16 15:27:48', '2022-09-16 15:28:05'),
(13, 1, 'sample', 1, 'eng_bw.png', 'Mild Splendour of the various-vested Night!\r\nMother of Wildly-working visions! haill\r\nI watch thy gliding, while with watery light\r\nThy weak eye glimmers through a ï¬‚eecy veil;\r\nAnd when thou lovest thy pale orb to shroud\r\nBehind the gatherâ€™d blackness lost on high;\r\nAnd when thou dartest from the wind-rent cloud\r\nThy placid lightning oâ€™er the awakenâ€™d sky.\r\n\r\n', '2022-09-16 15:30:39', '2022-09-16 15:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document_type`
--

CREATE TABLE `tbl_document_type` (
  `doc_type_id` int(11) NOT NULL,
  `doc_type` varchar(30) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_document_type`
--

INSERT INTO `tbl_document_type` (`doc_type_id`, `doc_type`, `date_added`, `date_last_modified`) VALUES
(1, 'Syllabus', '2022-08-25 08:59:30', '2022-08-25 08:59:30'),
(3, 'Module', '2022-08-25 15:51:05', '2022-08-25 15:51:05'),
(4, 'Report', '2022-08-30 08:25:05', '2022-08-30 08:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `log_id` int(11) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`log_id`, `remarks`, `user_id`, `date_added`) VALUES
(48, 'Updated Recipients (Document:)', 1, '2022-08-26 13:50:50'),
(49, 'Added Document (Document:Sample)', 1, '2022-08-26 13:52:19'),
(50, 'Updated Recipients (Document:Sample)', 1, '2022-08-26 13:52:33'),
(51, 'Updated Recipients (Document:Sample)', 1, '2022-08-26 13:52:52'),
(52, 'Updated Recipients (Document:Sample)', 1, '2022-08-26 13:54:46'),
(53, 'Updated Recipients (Document:Sample)', 1, '2022-08-29 11:16:14'),
(54, 'Updated Document (Document:Sample)', 1, '2022-08-29 11:19:13'),
(55, 'Updated Document (Document:Sample)', 1, '2022-08-30 08:21:36'),
(56, 'Added new document type (Type:Report)', 1, '2022-08-30 08:25:05'),
(57, 'Added Document (Document:Document 001)', 1, '2022-08-30 08:27:49'),
(58, 'Added Document (Document:Sample)', 1, '2022-08-30 08:28:21'),
(59, 'Added Document (Document:Test)', 1, '2022-08-30 08:28:31'),
(60, 'Accept Invitation (Document:Sample)', 1, '2022-08-30 10:58:48'),
(61, 'Removed Document', 1, '2022-08-30 11:02:29'),
(62, 'Updated Recipients (Document:Sample)', 1, '2022-08-30 11:03:30'),
(63, 'Removed Document', 1, '2022-08-30 11:03:42'),
(64, 'Updated Recipients (Document:Sample)', 1, '2022-08-30 11:05:10'),
(65, 'Accept Invitation (Document:Sample)', 1, '2022-08-30 11:05:17'),
(66, 'Removed Document', 1, '2022-08-30 11:05:31'),
(67, 'Updated Recipients (Document:Sample)', 1, '2022-08-30 11:08:27'),
(68, 'Updated Recipients (Document:Document 001)', 1, '2022-08-30 11:08:35'),
(69, 'Updated Recipients (Document:Test)', 1, '2022-08-30 11:08:55'),
(70, 'Updated Recipients (Document:Sample)', 1, '2022-08-30 11:10:28'),
(71, 'Accept Invitation (Document:Sample)', 1, '2022-08-30 11:11:57'),
(72, 'Removed Document', 1, '2022-08-30 11:12:04'),
(73, 'Updated Document (Document:Test)', 1, '2022-08-30 11:23:25'),
(74, 'Updated Document (Document:Test)', 1, '2022-08-30 11:23:31'),
(75, 'Updated Document (Document:Test)', 1, '2022-08-30 11:25:33'),
(76, 'Updated Document (Document:Test)', 1, '2022-08-30 11:25:44'),
(77, 'Updated Document (Document:Test)', 1, '2022-08-30 11:25:54'),
(78, 'Updated Document (Document:Test)', 1, '2022-08-30 11:45:17'),
(79, 'Updated Document (Document:Test)', 1, '2022-08-30 11:45:18'),
(80, 'Updated Document (Document:Test)', 1, '2022-08-30 11:45:18'),
(81, 'Updated Document (Document:Test)', 1, '2022-08-30 11:51:37'),
(82, 'Updated Document (Document:Test)', 1, '2022-08-30 11:51:37'),
(83, 'Updated Document (Document:Test)', 1, '2022-08-30 11:52:59'),
(84, 'Updated Document (Document:Test)', 1, '2022-08-30 11:53:28'),
(85, 'Updated Document (Document:Sample)', 6, '2022-08-30 11:58:22'),
(86, 'Accept Invitation (Document:Test)', 6, '2022-08-30 14:34:20'),
(87, 'Updated Recipients (Document:Test)', 1, '2022-08-30 15:55:11'),
(88, 'Updated Recipients (Document:Test)', 1, '2022-08-30 15:56:21'),
(89, 'Updated Recipients (Document:Test)', 1, '2022-08-30 15:56:38'),
(90, 'Updated Recipients (Document:Test)', 1, '2022-08-30 16:10:14'),
(91, 'Updated Recipients (Document:Test)', 1, '2022-08-30 16:11:19'),
(92, 'Updated Recipients (Document:Test)', 1, '2022-08-30 16:12:25'),
(93, 'Updated Recipients (Document:Test)', 1, '2022-08-30 16:16:34'),
(94, 'Updated Recipients (Document:Test)', 1, '2022-08-30 16:19:16'),
(95, 'Updated Recipients (Document:Test)', 1, '2022-08-30 16:21:16'),
(96, 'Updated Recipients (Document:Test)', 1, '2022-08-30 16:25:01'),
(97, 'Updated Recipients (Document:Test)', 1, '2022-08-30 16:27:04'),
(98, 'Updated Recipients (Document:Test)', 1, '2022-08-30 16:28:00'),
(99, 'Updated Recipients (Document:Test)', 1, '2022-08-30 16:28:08'),
(100, 'Updated Recipients (Document:Test)', 1, '2022-08-30 16:28:38'),
(101, 'Updated Recipients (Document:Test)', 1, '2022-08-30 16:29:42'),
(102, 'Updated Recipients (Document:Test)', 1, '2022-08-30 16:30:28'),
(103, 'Updated Recipients (Document:Test)', 1, '2022-08-30 16:30:47'),
(104, 'Updated Recipients (Document:Test)', 1, '2022-08-30 16:32:20'),
(105, 'Updated Recipients (Document:Test)', 6, '2022-08-31 09:31:36'),
(106, 'Updated Recipients (Document:Test)', 6, '2022-08-31 09:34:41'),
(107, 'Updated Document (Document:Test)', 6, '2022-08-31 10:09:15'),
(108, 'Updated Document (Document:Document 001)', 6, '2022-08-31 13:49:14'),
(109, 'Updated Document (Document:Sample)', 6, '2022-08-31 13:49:30'),
(110, 'Updated Document (Document:Sample)', 6, '2022-08-31 13:49:45'),
(111, 'Updated Document (Document:Sample)', 6, '2022-08-31 13:50:02'),
(112, 'Updated Document (Document:Test)', 6, '2022-08-31 13:50:55'),
(113, 'Updated Document (Document:Sample)', 6, '2022-08-31 13:55:41'),
(114, 'Updated Document (Document:Sample)', 6, '2022-08-31 13:56:06'),
(115, 'Updated Document (Document:Sample)', 6, '2022-08-31 13:57:24'),
(116, 'Updated Document (Document:Sample)', 1, '2022-08-31 14:00:17'),
(117, 'Updated Document (Document:Sample)', 6, '2022-08-31 14:21:31'),
(118, 'Updated Document (Document:Sample)', 6, '2022-08-31 14:21:47'),
(119, 'Updated Document (Document:Document 001)', 6, '2022-08-31 14:22:38'),
(120, 'Updated Recipients (Document:Test)', 6, '2022-08-31 14:25:38'),
(121, 'Updated Document (Document:Sample)', 1, '2022-09-07 15:06:23'),
(122, 'Deleted Subject', 6, '2022-09-07 15:14:59'),
(123, 'Added Document (Document:demo)', 6, '2022-09-07 15:19:26'),
(124, 'Updated Recipients (Document:demo)', 6, '2022-09-07 15:42:58'),
(125, 'Updated Recipients (Document:demo)', 6, '2022-09-07 15:51:12'),
(126, 'Updated Recipients (Document:demo)', 1, '2022-09-16 14:51:32'),
(127, 'Added Document (Document:Testing)', 1, '2022-09-16 15:10:43'),
(128, 'Added Document (Document:test)', 1, '2022-09-16 15:11:32'),
(129, 'Added Document (Document:test)', 1, '2022-09-16 15:11:43'),
(130, 'Added Document (Document:2)', 1, '2022-09-16 15:27:48'),
(131, 'Updated Document (Document:test)', 1, '2022-09-16 15:28:05'),
(132, 'Added Document (Document:sample)', 1, '2022-09-16 15:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recipients`
--

CREATE TABLE `tbl_recipients` (
  `recipient_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_recipients`
--

INSERT INTO `tbl_recipients` (`recipient_id`, `user_id`, `doc_id`, `status`, `date_added`, `date_last_modified`) VALUES
(73, 6, 10, 0, '2022-08-31 14:25:38', '2022-08-31 14:25:38'),
(74, 4, 11, 0, '2022-09-16 14:51:32', '2022-09-16 14:51:32'),
(75, 6, 11, 0, '2022-09-16 14:51:32', '2022-09-16 14:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_mname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_contact_num` varchar(20) NOT NULL,
  `user_category` varchar(1) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `date_added` datetime NOT NULL,
  `date_last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_fname`, `user_mname`, `user_lname`, `user_contact_num`, `user_category`, `user_email`, `username`, `password`, `date_added`, `date_last_modified`) VALUES
(1, 'Juan', 'Cruz', 'Dela Cruz', '', 'A', 'email@fm.com', 'admin', '0cc175b9c0f1b6a831c399e269772661', '2022-07-22 01:04:02', '2022-08-24 11:02:43'),
(2, 'James', '', 'Smith', '', 'S', 'smith@gmail.com', 'james', 'b148e7f41fdc3be4b14e8d17e068bbad', '2022-08-26 08:04:58', '2022-08-26 08:04:58'),
(3, 'Ree', '', 'Nu', '', 'S', 'd@gmail.com', 'staff', 'b148e7f41fdc3be4b14e8d17e068bbad', '2022-08-26 08:05:30', '2022-08-26 08:05:30'),
(4, 'Anna Maria', 'Santos', 'Santos', '', 'S', 'perosn@gmail.com', 'anna', 'b148e7f41fdc3be4b14e8d17e068bbad', '2022-08-26 08:06:30', '2022-08-26 08:06:30'),
(5, 'Pepe', '', 'Smith', '09262662222', 'S', 'sa@gmail.com', 'pepe', 'b148e7f41fdc3be4b14e8d17e068bbad', '2022-08-26 08:06:54', '2022-08-26 08:06:54'),
(6, 'John', '', 'Doe', '09260923454', 'S', 'john@gmail.com', 'john', '0cc175b9c0f1b6a831c399e269772661', '2022-08-26 08:07:15', '2022-08-26 08:07:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `tbl_document_type`
--
ALTER TABLE `tbl_document_type`
  ADD PRIMARY KEY (`doc_type_id`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tbl_recipients`
--
ALTER TABLE `tbl_recipients`
  ADD PRIMARY KEY (`recipient_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_document_type`
--
ALTER TABLE `tbl_document_type`
  MODIFY `doc_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `tbl_recipients`
--
ALTER TABLE `tbl_recipients`
  MODIFY `recipient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
