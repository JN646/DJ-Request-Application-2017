-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 18, 2017 at 09:29 AM
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
  PRIMARY KEY (`request_id`),
  KEY `request_song_id` (`request_song_id`),
  KEY `request_session_id` (`request_session_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `request_time`, `request_song_id`, `request_session_id`, `request_active`) VALUES
(1, '2017-12-16 15:21:14', 1, 1, 0),
(3, '2017-12-16 15:24:29', 1, 1, 0),
(4, '2017-12-16 15:24:32', 1, 1, 1),
(5, '2017-12-16 17:18:46', 1, 1, 1),
(6, '2017-12-16 17:18:46', 1, 1, 1),
(7, '2017-12-16 17:18:46', 1, 1, 1),
(8, '2017-12-16 17:18:46', 1, 1, 1),
(9, '2017-12-16 17:18:46', 1, 2, 1),
(10, '2017-12-16 17:18:48', 1, 1, 1),
(11, '2017-12-16 17:18:48', 1, 1, 1),
(12, '2017-12-16 17:18:48', 1, 1, 1),
(13, '2017-12-16 17:18:48', 1, 1, 1),
(14, '2017-12-16 17:18:48', 1, 2, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
  `song_album` varchar(50) NOT NULL COMMENT 'Song Album',
  `song_genre` text NOT NULL,
  `song_year` int(4) NOT NULL,
  PRIMARY KEY (`song_id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`song_id`, `song_name`, `song_artist`, `song_album`, `song_genre`, `song_year`) VALUES
(1, '22', 'Taylor Swift', 'RED', 'Pop', 2015),
(4, 'We Are The Champions', 'Queen', 'News of the World', 'Rock', 1970),
(9, 'Reach', 'S Club 7', '7', 'Pop', 1999),
(10, 'Another One Bites The Dust', 'Queen', 'The Game', 'Rock', 1970),
(11, 'Rockstar', 'Post Malone Featuring 21 Savage', 'Rockstar', 'Pop', 2017),
(12, 'Havana', 'Camila Cabello Featuring Young Thug', 'Camila', 'Pop', 2017),
(13, 'Gucci Gang', 'Lil Pump', 'Lil Pump', 'Pop', 2017),
(14, 'Thunder', 'Imagine Dragons', 'Evolve', 'Pop', 2017),
(15, 'Too Good At Goodbyes', 'Sam Smith', 'The Thrill of It All', 'Pop', 2017),
(16, 'Bodak Yellow (Money Moves)', 'Cardi B', '', 'Pop', 2017),
(17, 'No Limit', 'G-Eazy Featuring A$AP Rocky & Cardi B', '', 'Pop', 2017),
(18, 'What Lovers Do', 'Maroon 5 Featuring SZA', 'Red Pill Blues', 'Pop', 2017),
(19, 'Feel It Still', 'Portugal. The Man', 'Woodstock', 'Pop', 2017),
(20, 'Bad At Love', 'Halsey', '', 'Pop', 2017),
(21, 'Sorry Not Sorry', 'Demi Lovato', 'Tell Me You Love Me', 'Pop', 2017),
(22, 'Mi Gente', 'J Balvin & Willy William Featuring Beyonce', '', 'Pop', 2017),
(23, '1-800-273-8255', 'Logic Featuring Alessia Cara & Khalid', '', 'Pop', 2017),
(24, 'New Rules', 'Dua Lipa', '', 'Pop', 2017),
(25, 'I Get The Bag', 'Gucci Mane Featuring Migos', '', 'Pop', 2017),
(26, 'Shake It Off', 'Taylor Swift', '1989', 'Pop', 2014),
(27, 'Blank Space', 'Taylor Swift', '1989', 'Pop', 2014),
(28, 'Love Story', 'Taylor Swift', 'Fearless', 'Pop', 2008),
(29, 'I Knew You Were Trouble', 'Taylor Swift', 'RED', 'Pop', 2012),
(30, 'White Horse', 'Taylor Swift', 'Fearless', 'Pop', 2008),
(31, 'Fifteen', 'Taylor Swift', 'Fearless', 'Pop', 2008),
(32, 'Creatures Of The Night', 'Hardwell', 'Dirty Work', 'EDM', 2017),
(33, 'Spaceman', 'Hardwell', 'I Am Hardwell (Original Soundtrack)', 'EDM', 2012),
(34, 'Power', 'Hardwell', 'Dirty Work', 'EDM', 2017),
(35, 'Follow Me', 'Hardwell', 'United We Are', 'EDM', 2015),
(36, 'Billie Jean', 'Michael Jackson', 'Thriller', 'Pop', 1982),
(37, 'Smooth Criminal', 'Michael Jackson', 'Bad', 'Pop', 1987),
(38, 'Beat It', 'Michael Jackson', 'Thriller', 'Pop', 1982),
(39, 'Thriller', 'Michael Jackson', 'Thriller', 'Pop', 1982),
(40, 'Man in the Mirror', 'Michael Jackson', 'Thriller', 'Pop', 1982),
(41, 'Black or White', 'Michael Jackson', 'Dangerous', 'Pop', 1991),
(42, 'Bad', 'Michael Jackson', 'Bad', 'Pop', 1987),
(43, 'Stay With Me', 'Sam Smith', 'In the Lonely Hour', 'Pop', 2014),
(44, 'Lay Me Down', 'Sam Smith', 'In the Lonely Hour', 'Pop', 2014),
(45, 'I\'m Not the Only One', 'Sam Smith', 'In the Lonely Hour', 'Pop', 2014),
(46, 'Pray', 'Sam Smith', 'The Thrill of It All', 'Pop', 2017),
(47, 'Burning', 'Sam Smith', 'The Thrill of It All', 'Pop', 2017),
(48, 'One Last Song', 'Sam Smith', 'The Thrill of It All', 'Pop', 2017),
(49, 'Bad Romance', 'Lady Gaga', 'The Fame Monster', 'Pop', 2009),
(50, 'Million Reasons', 'Lady Gaga', 'Joanne', 'Pop', 2016),
(51, 'Poker Face', 'Lady Gaga', 'The Fame', 'Pop', 2008),
(52, 'Born This Way', 'Lady Gaga', 'Born This Way', 'Pop', 2011),
(53, 'Applause', 'Lady Gaga', 'Artpop', 'Pop', 2013),
(54, 'Mans Not Hot', 'Big Shaq', 'Daddy K - The Mix 11', 'Grime', 2017),
(55, 'Shape of You', 'Ed Sheeran', 'Ã·', 'Pop', 2017),
(56, 'Perfect', 'Ed Sheeran', 'Ã·', 'Pop', 2017),
(57, 'Thinking Out Loud', 'Ed Sheeran', 'X', 'Pop', 2017),
(58, 'Photograph', 'Ed Sheeran', 'X', 'Pop', 2014),
(59, 'Galway Girl', 'Ed Sheeran', 'Ã·', 'Pop', 2017),
(60, 'Castle on the Hill', 'Ed Sheeran', 'Ã·', 'Pop', 2017),
(61, 'Dive', 'Ed Sheeran', '+', 'Pop', 2017),
(62, 'Give Me Love', 'Ed Sheeran', '+', 'Pop', 2011),
(63, 'The A Team', 'Ed Sheeran', '+', 'Pop', 2011),
(64, 'Happier', 'Ed Sheeran', 'Ã·', 'Pop', 2017),
(65, 'Bohemian Rhapsody', 'Queen', 'A Night at the Opera', 'Rock', 1975),
(66, 'We Will Rock You', 'Queen', 'News of the World', 'Rock', 1977),
(67, 'I Want to Break Free', 'Queen', 'The Works', 'Rock', 1984),
(68, 'Don\'t Stop Me Now', 'Queen', 'Jazz', 'Rock', 1978),
(69, 'Under Pressure', 'Queen', 'Hot Space', 'Rock', 1982),
(70, 'Killer Queen', 'Queen', 'Sheer Heart Attack', 'Rock', 1974),
(71, 'Last Christmas', 'Wham!', 'Music from the Edge of Heaven', 'Pop', 1986),
(72, 'Despacito', 'Luis Fonsi', 'Daddy K - The Mix 11', 'Pop', 2017),
(73, 'Natural', 'S Club 7', '7', 'Pop', 2000),
(74, 'I\'ll Keep Waiting', 'S Club 7', '7', 'Pop', 2000),
(75, 'Bring the House Down', 'S Club 7', '7', 'Pop', 2000),
(76, 'Best Friend', 'S Club 7', '7', 'Pop', 2000),
(77, 'All in Love Is Fair', 'S Club 7', '7', 'Pop', 2000),
(78, 'Love Train', 'S Club 7', '7', 'Pop', 2000),
(79, 'Cross My Heart', 'S Club 7', '7', 'Pop', 2000),
(80, 'The Colour of Blue', 'S Club 7', '7', 'Pop', 2000),
(81, 'I\'ll Be There', 'S Club 7', '7', 'Pop', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` int(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`zone_id`, `zone_name`, `zone_description`) VALUES
(1, 'Room 1', 'Downstairs, Room 1'),
(3, 'Room 2', 'Downstairs, Room 2'),
(5, 'Private Room', 'Private Room Downstairs'),
(6, 'Smoking Area', 'Outside (House)'),
(7, 'Terrace', 'RnB Terrace');

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
