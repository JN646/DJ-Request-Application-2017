-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 26, 2017 at 10:42 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `djx`
--

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Request ID.',
  `request_time` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Time the song was requested.',
  `request_song_id` int(11) DEFAULT NULL COMMENT 'ID number of the song.',
  `request_session_id` int(11) DEFAULT NULL COMMENT 'ID number of the session.',
  `request_active` tinyint(1) DEFAULT '1' COMMENT 'Is the song active?',
  `request_pinned` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'has the request been pinned.',
  PRIMARY KEY (`request_id`),
  KEY `request_song_id` (`request_song_id`),
  KEY `request_session_id` (`request_session_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `request_time`, `request_song_id`, `request_session_id`, `request_active`, `request_pinned`) VALUES
(1, '2017-12-26 22:35:47', 1, 1, 0, 0),
(14, '2017-12-26 18:52:55', 1, 2, 0, 0),
(16, '2017-12-26 18:52:44', 93, NULL, 0, 0),
(17, '2017-12-26 18:52:37', 82, NULL, 1, 0),
(18, '2017-12-26 18:54:39', 735, 1, 1, 0),
(19, '2017-12-26 22:40:12', 207, 1, 1, 1),
(20, '2017-12-26 22:40:13', 210, 1, 1, 0),
(21, '2017-12-26 19:07:39', 62, 1, 1, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `SessionsIDFK` FOREIGN KEY (`request_session_id`) REFERENCES `sessions` (`session_id`),
  ADD CONSTRAINT `SongIDFK` FOREIGN KEY (`request_song_id`) REFERENCES `songs` (`song_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
