-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 16, 2017 at 07:13 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

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
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `Client_Mac` varchar(20) NOT NULL COMMENT 'Client Mac Address',
  `client_name` text NOT NULL,
  `client_description` text NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `Client_Mac`, `client_name`, `client_description`) VALUES
(3, 'F8-D7-20-00-71-AD', 'Galaxy Tab 302', 'Booth 2'),
(2, '90-41-DA-F6-12-4D', 'Galaxy Tab 301', 'Booth 1'),
(4, '17-54-E1-66-9E-65', 'Galaxy Tab 303', 'Booth 3'),
(5, '9D-E5-12-E4-33-E1', 'Galaxy Tab 304', 'Booth 4'),
(6, '98-CA-DD-2C-7F-AB', 'Galaxy Tab 305', 'Booth 5');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Request ID.',
  `request_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Time the song was requested.',
  `request_song_id` int(11) NOT NULL COMMENT 'ID number of the song.',
  `request_session_id` int(11) NOT NULL COMMENT 'ID number of the session.',
  `request_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Is the song active?',
  PRIMARY KEY (`request_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `request_time`, `request_song_id`, `request_session_id`, `request_active`) VALUES
(1, '2017-12-16 15:21:14', 1, 1, 0),
(3, '2017-12-16 15:24:29', 5, 1, 0),
(4, '2017-12-16 15:24:32', 5, 1, 1),
(5, '2017-12-16 17:18:46', 6, 1, 1),
(6, '2017-12-16 17:18:46', 7, 1, 1),
(7, '2017-12-16 17:18:46', 4, 1, 1),
(8, '2017-12-16 17:18:46', 9, 1, 1),
(9, '2017-12-16 17:18:46', 11, 2, 1),
(10, '2017-12-16 17:18:48', 6, 1, 1),
(11, '2017-12-16 17:18:48', 7, 1, 1),
(12, '2017-12-16 17:18:48', 4, 1, 1),
(13, '2017-12-16 17:18:48', 9, 1, 1),
(14, '2017-12-16 17:18:48', 11, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Session ID',
  `session_name` text COMMENT 'Session Name',
  `session_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Session Start Time',
  `session_end` timestamp NULL DEFAULT NULL COMMENT 'Session End Time',
  `session_active` int(1) NOT NULL DEFAULT '1' COMMENT 'Session Active?',
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `session_name`, `session_start`, `session_end`, `session_active`) VALUES
(1, 'Test Session', '2017-12-16 12:53:55', NULL, 1),
(2, 'Test Session', '2017-12-16 12:53:58', NULL, 1),
(3, 'Test', '2017-12-16 13:30:35', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

DROP TABLE IF EXISTS `songs`;
CREATE TABLE IF NOT EXISTS `songs` (
  `song_id` int(11) NOT NULL AUTO_INCREMENT,
  `song_name` text NOT NULL,
  `song_artist` text NOT NULL,
  `song_genre` text NOT NULL,
  `song_year` int(4) NOT NULL,
  PRIMARY KEY (`song_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`song_id`, `song_name`, `song_artist`, `song_genre`, `song_year`) VALUES
(1, '22', 'Taylor Swift', 'Pop', 2015),
(3, 'Test Song 1', 'Test Artist', 'Pop', 2000),
(4, 'We Are The Champions', 'Queen', 'Rock', 1970),
(10, 'Another One Bites The Dust', 'Queen', 'Rock', 1970),
(9, 'Reach', 'S Club 7', 'Pop', 1999),
(8, 'Fifteen', 'Hardwell', 'EDM', 2011),
(11, 'Rockstar', 'Post Malone Featuring 21 Savage', 'Pop', 2017),
(12, 'Havana', 'Camila Cabello Featuring Young Thug', 'Pop', 2017),
(13, 'Gucci Gang', 'Lil Pump', 'Pop', 2017),
(14, 'Thunder', 'Imagine Dragons', 'Pop', 2017),
(15, 'Too Good At Goodbyes', 'Sam Smith', 'Pop', 2017),
(16, 'Bodak Yellow (Money Moves)', 'Cardi B', 'Pop', 2017),
(17, 'No Limit', 'G-Eazy Featuring A$AP Rocky & Cardi B', 'Pop', 2017),
(18, 'What Lovers Do', 'Maroon 5 Featuring SZA', 'Pop', 2017),
(19, 'Feel It Still', 'Portugal. The Man', 'Pop', 2017),
(20, 'Bad At Love', 'Halsey', 'Pop', 2017),
(21, 'Sorry Not Sorry', 'Demi Lovato', 'Pop', 2017),
(22, 'Mi Gente', 'J Balvin & Willy William Featuring Beyonce', 'Pop', 2017),
(23, '1-800-273-8255', 'Logic Featuring Alessia Cara & Khalid', 'Pop', 2017),
(24, 'New Rules', 'Dua Lipa', 'Pop', 2017),
(25, 'I Get The Bag', 'Gucci Mane Featuring Migos', 'Pop', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` text NOT NULL,
  `user_password` int(50) NOT NULL,
  `user_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

DROP TABLE IF EXISTS `zones`;
CREATE TABLE IF NOT EXISTS `zones` (
  `zone_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Zone ID',
  `zone_name` text NOT NULL COMMENT 'Zone Name',
  `zone_description` text NOT NULL COMMENT 'Zone Description',
  PRIMARY KEY (`zone_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`zone_id`, `zone_name`, `zone_description`) VALUES
(1, 'Room 1', 'Downstairs, Room 1'),
(3, 'Room 2', 'Downstairs, Room 2'),
(5, 'Private Room', 'Private Room Downstairs');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
