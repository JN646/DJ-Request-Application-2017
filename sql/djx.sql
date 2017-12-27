-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 27, 2017 at 05:52 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

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

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `Client_Mac` varchar(20) NOT NULL COMMENT 'Client Mac Address',
  `client_name` text NOT NULL,
  `client_description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `requests` (
  `request_id` int(11) NOT NULL COMMENT 'Request ID.',
  `request_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Time the song was requested.',
  `request_song_id` int(11) DEFAULT NULL COMMENT 'ID number of the song.',
  `request_zone_id` int(11) DEFAULT NULL COMMENT 'ID number of the session.',
  `request_active` tinyint(1) DEFAULT '1' COMMENT 'Is the song active?',
  `request_pinned` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'has the request been pinned.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `request_time`, `request_song_id`, `request_zone_id`, `request_active`, `request_pinned`) VALUES
(1, '2017-12-26 22:35:47', 1, 1, 0, 0),
(14, '2017-12-26 18:52:55', 1, 2, 0, 0),
(16, '2017-12-26 18:52:44', 93, NULL, 0, 0),
(17, '2017-12-26 18:52:37', 82, NULL, 1, 0),
(18, '2017-12-26 18:54:39', 735, 1, 1, 0),
(19, '2017-12-26 22:40:12', 207, 1, 1, 0),
(20, '2017-12-26 22:40:13', 210, 1, 1, 0),
(21, '2017-12-26 19:07:39', 62, 1, 1, 0),
(22, '2017-12-26 22:48:19', 209, 1, 1, 0),
(23, '2017-12-26 23:22:31', 220, 1, 1, 0),
(24, '2017-12-26 23:24:01', 213, 1, 1, 0),
(25, '2017-12-26 23:56:32', 255, 1, 1, 0),
(26, '2017-12-27 00:00:02', 255, 1, 1, 0),
(27, '2017-12-27 00:00:03', 255, 1, 1, 0),
(28, '2017-12-27 00:05:40', 271, 1, 1, 0),
(29, '2017-12-27 00:24:55', 205, 1, 1, 0),
(30, '2017-12-27 00:39:37', 232, 1, 1, 0),
(31, '2017-12-27 00:55:44', 207, 1, 1, 0),
(32, '2017-12-27 00:58:43', 210, 1, 1, 0),
(33, '2017-12-27 01:10:23', 210, 1, 1, 0),
(34, '2017-12-27 01:11:04', 210, 1, 1, 0),
(35, '2017-12-27 01:11:06', 210, 1, 1, 0),
(36, '2017-12-27 01:12:27', 210, 1, 1, 0),
(37, '2017-12-27 01:12:28', 210, 1, 1, 0),
(38, '2017-12-27 01:12:28', 210, 1, 1, 0),
(39, '2017-12-27 01:12:29', 210, 1, 1, 0),
(40, '2017-12-27 01:12:30', 210, 1, 1, 0),
(41, '2017-12-27 01:12:32', 210, 1, 1, 0),
(42, '2017-12-27 01:12:33', 210, 1, 1, 0),
(43, '2017-12-27 01:12:34', 210, 1, 1, 1),
(44, '2017-12-27 01:12:35', 210, 1, 1, 0),
(45, '2017-12-27 01:12:36', 210, 1, 1, 0),
(46, '2017-12-27 01:27:00', 206, 1, 1, 0),
(47, '2017-12-27 01:30:37', 206, 1, 1, 0),
(48, '2017-12-27 13:46:44', 470, 1, 1, 0),
(49, '2017-12-27 14:19:12', 343, 1, 1, 1),
(50, '2017-12-27 14:00:48', 65, 1, 1, 0),
(51, '2017-12-27 14:17:21', 202, 1, 1, 0),
(52, '2017-12-27 14:23:00', 206, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL COMMENT 'Session ID',
  `user_ID` int(11) NOT NULL COMMENT 'the user/DJ who owns the session',
  `session_name` text COMMENT 'Session Name',
  `playlist` int(10) UNSIGNED DEFAULT NULL COMMENT 'music playlist linked to session',
  `session_active` int(1) NOT NULL DEFAULT '1' COMMENT 'Session Active?'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `user_ID`, `session_name`, `playlist`, `session_active`) VALUES
(5, 9, 'Friday Night', 1, 1),
(6, 9, 'Friday Night', 1, 1),
(7, 9, 'Foo', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessionzone`
--

CREATE TABLE `sessionzone` (
  `id` int(11) NOT NULL COMMENT 'link id',
  `session_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `song_id` int(11) NOT NULL,
  `song_name` text NOT NULL,
  `song_artist` text NOT NULL,
  `song_album` varchar(50) NOT NULL COMMENT 'Song Album',
  `song_genre` text NOT NULL,
  `song_year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(81, 'I\'ll Be There', 'S Club 7', '7', 'Pop', 2000),
(82, 'Don\'t Stop Movin\'', 'S Club 7', 'Sunshine', 'Pop', 2001),
(83, 'Show Me Your Colours', 'S Club 7', 'Sunshine', 'Pop', 2001),
(84, 'You', 'S Club 7', 'Sunshine', 'Pop', 2001),
(85, 'Have You Ever', 'S Club 7', 'Sunshine', 'Pop', 2001),
(86, 'Good Times', 'S Club 7', 'Sunshine', 'Pop', 2001),
(87, 'Boy Like You', 'S Club 7', 'Sunshine', 'Pop', 2001),
(88, 'Sunshine', 'S Club 7', 'Sunshine', 'Pop', 2001),
(89, 'Dance, Dance, Dance', 'S Club 7', 'Sunshine', 'Pop', 2001),
(90, 'It\'s Alright', 'S Club 7', 'Sunshine', 'Pop', 2001),
(91, 'Stronger', 'S Club 7', 'Sunshine', 'Pop', 2001),
(92, 'Blue Suede Shoes', 'Elvis Presley', 'Elvis Presley', 'Pop', 1956),
(93, 'I\'m Counting on You', 'Elvis Presley', 'Elvis Presley', 'Pop', 1956),
(94, 'I Got a Woman', 'Elvis Presley', 'Elvis Presley', 'Pop', 1956),
(95, 'One Sided Love Affair', 'Elvis Presley', 'Elvis Presley', 'Pop', 1956),
(96, 'I Love You Because', 'Elvis Presley', 'Elvis Presley', 'Pop', 1956),
(97, 'I  Saw Her Standing There', 'The Beatles', 'Please Please Me', 'Pop', 1963),
(98, 'Misery', 'The Beatles', 'Please Please Me', 'Pop', 1963),
(99, 'Anna (Go to Him)', 'The Beatles', 'Please Please Me', 'Pop', 1963),
(100, 'Chains', 'The Beatles', 'Please Please Me', 'Pop', 1963),
(101, 'Boys', 'The Beatles', 'Please Please Me', 'Pop', 1963),
(102, 'Ask Me Why', 'The Beatles', 'Please Please Me', 'Pop', 1963),
(103, 'Please Please Me', 'The Beatles', 'Please Please Me', 'Pop', 1963),
(104, 'Love Me Do', 'The Beatles', 'Please Please Me', 'Pop', 1963),
(105, 'P.S I Love You', 'The Beatles', 'Please Please Me', 'Pop', 1963),
(106, 'Baby It\'s You', 'The Beatles', 'Please Please Me', 'Pop', 1963),
(200, 'It\'s Over Now', '112', '', '', 2001),
(201, 'Peaches \'n\' Cream', '112', '', '', 2001),
(202, 'Dance With Me', '112', '', '', 2001),
(203, 'Where My Girls At?', '702', '', '', 2000),
(204, 'Hit The Quan', '@iheartmemphis', '', '', 2015),
(205, 'U Already Know', '112 & Foxy Brown', '', '', 2005),
(206, 'No Lie', '2 Chainz', 'Based on a T.R.U. Story', 'Hip-Hop', 2012),
(207, 'I\'m Different', '2 Chainz', 'Based on a T.R.U. Story', 'Hip-Hop', 2013),
(208, 'We Own It (Fast & Furious 6)', '2 Chainz & Wiz Khalifa', 'Based on a T.R.U. Story', 'Hip-Hop', 2013),
(209, 'She Got It', '2 Pistols', '', '', 2008),
(210, 'Bank Account', '21 Savage', '', '', 2017),
(211, 'No Heart', '21 Savage & Metro Boomin', '', '', 2017),
(212, 'X', '21 Savage & Metro Boomin & Future', '', '', 2016),
(213, 'Until The End Of Time', '2Pac', 'Until the End of Time', 'Rap', 2001),
(214, 'Runnin\' (Dying To Live)', '2Pac', 'Until the End of Time', 'Rap', 2003),
(215, 'Thugz Mansion', '2Pac', 'Until the End of Time', 'Rap', 2002),
(217, 'Don\'t Trust Me', '3OH!3', '3OH!3', 'EDM', 2009),
(218, 'Starstrukk', '3OH!3', '3OH!3', 'EDM', 2010),
(219, 'My First Kiss', '3OH!3', 'Streets of Gold', 'EDM', 2010),
(220, 'She Looks So Perfect', '5 Seconds of Summer', '5 Seconds of Summer', 'Pop', 2014),
(221, 'Amnesia', '5 Seconds of Summer', '5 Seconds of Summer', 'Pop', 2014),
(222, 'She\'s Kinda Hot', '5 Seconds of Summer', '5 Seconds of Summer', 'Pop', 2015),
(223, 'Wanksta', '50 Cent', 'Get Rich or Die Tryin\'', 'Hip-Hop', 2003),
(224, 'In Da Club', '50 Cent', 'Get Rich or Die Tryin\'', 'Hip-Hop', 2003),
(225, 'PIMP', '50 Cent', 'Get Rich or Die Tryin\'', 'Hip-Hop', 2003),
(226, 'Disco Inferno', '50 Cent', 'The Massacre', 'Hip-Hop', 2005),
(227, 'Just A Lil Bit', '50 Cent', 'The Massacre', 'Hip-Hop', 2005),
(228, 'Window Shopper', '50 Cent', 'The Massacre', 'Hip-Hop', 2005),
(229, 'I Get Money', '50 Cent', 'Curtis', 'Hip-Hop', 2007),
(230, 'Ayo Technology', '50 Cent', 'Curtis', 'Hip-Hop', 2007),
(231, 'Outta Control', '50 Cent', 'The Massacre', 'Hip-Hop', 2005),
(232, '21 Questions', '50 Cent', 'Get Rich or Die Tryin\'', 'Hip-Hop', 2003),
(233, 'Baby By Me', '50 Cent', 'Before I Self Destruct', 'Hip-Hop', 2009),
(234, 'Candy Shop', '50 Cent', 'The Massacre', 'Hip-Hop', 2005),
(235, 'Best Friend', '50 Cent', 'Get Rich or Die Tryin\'', 'Hip-Hop', 2006),
(236, 'Wobble Wobble', '504 Boyz', '', '', 2000),
(237, 'Give Me Just One Night', '98 Degrees', '', '', 2000),
(238, 'My Everything', '98 Degrees', '', '', 2001),
(239, 'Drowning', 'A Boogie Wit da Hoodie & Kodak Black', '', '', 2017),
(240, 'Say Something', 'A Great Big World & Christina Aguilera', '', '', 2013),
(241, 'Jay Ho (you Are My Destiny)', 'A R Rahman & The Pussycat Dolls', '', '', 2009),
(242, 'I Don\'t Wanna', 'Aaliyah', 'Next Friday', '', 2000),
(243, 'Try Again', 'Aaliyah', 'Next Friday', '', 2000),
(244, 'Rock The Boat', 'Aaliyah', 'Next Friday', '', 2001),
(245, 'More Than A Woman', 'Aaliyah', 'Next Friday', '', 2002),
(246, 'I Care 4 U', 'Aaliyah', 'Next Friday', '', 2002),
(247, 'Miss You', 'Aaliyah', 'Next Friday', '', 2002),
(248, 'Come Over', 'Aaliyah', 'Next Friday', '', 2003),
(249, 'We Need A Resolution', 'Aaliyah', 'Next Friday', '', 2001),
(250, 'You Can\'t Hide Beautiful', 'Aaron Lines', '', '', 2003),
(251, 'Where The Stars And Stripes And The Eagle Fly', 'Aaron Tippin', '', '', 2001),
(252, 'Bugatti', 'Ace Hood, Future & Rick Ross', '', '', 2013),
(253, 'What Do You Want From Me?', 'Adam Lambert', '', '', 2010),
(254, 'If I Had You', 'Adam Lambert', '', '', 2010),
(255, 'Rolling In The Deep', 'Adele', '21', '', 2011),
(256, 'Someone Like You', 'Adele', '21', '', 2011),
(257, 'Set Fire To The Rain', 'Adele', '21', '', 2011),
(258, 'Rumour Has It', 'Adele', '21', '', 2012),
(259, 'Skyfall', 'Adele', '21', '', 2012),
(260, 'Hello', 'Adele', '25', '', 2015),
(261, 'When We Were Young', 'Adele', '25', '', 2016),
(262, 'Send My Love (To Your New Lover)', 'Adele', '25', '', 2016),
(263, 'Water Under The Bridge', 'Adele', '25', '', 2017),
(264, 'Jaded', 'Aerosmith', '', '', 2001),
(265, 'Miss Murder', 'AFI', '', '', 2006),
(266, 'Take Over Control', 'Afrojack & Eva Simons', '', '', 2011),
(267, 'Because I Got High', 'Afroman', '', '', 2001),
(268, 'Lonely', 'Akon', 'Trouble', '', 2005),
(269, 'Belly Dancer (Bananza)', 'Akon', 'Trouble', '', 2005),
(270, 'Smack That', 'Akon', 'Trouble', '', 2006),
(271, 'Don\'t Matter', 'Akon', 'Trouble', '', 2007),
(272, 'Sorry Blame It On Me', 'Akon', 'Trouble', '', 2007),
(273, 'Right Now (Na, Na, Na)', 'Akon', 'Trouble', '', 2008),
(274, 'Beautiful', 'Akon', 'Trouble', '', 2009),
(275, 'I Wanna Love You', 'Akon', 'Trouble', '', 2006),
(276, 'Locked Up', 'Akon', 'Trouble', '', 2004),
(277, 'I\'m So Paid', 'Akon', 'Trouble', '', 2009),
(278, 'It Must Be Love', 'Alan Jackson', 'Under the Influence', '', 2000),
(279, 'Where I Come From', 'Alan Jackson', 'Under the Influence', '', 2001),
(280, 'Where Were You (When The World Stopped Turning)', 'Alan Jackson', 'Under the Influence', '', 2001),
(281, 'Drive (For Daddy Gene)', 'Alan Jackson', 'Under the Influence', '', 2002),
(282, 'Work In Progress', 'Alan Jackson', 'Under the Influence', '', 2002),
(283, 'That\'d Be Alright', 'Alan Jackson', 'Under the Influence', '', 2003),
(284, 'Remember When', 'Alan Jackson', 'Under the Influence', '', 2004),
(285, 'Good Time', 'Alan Jackson', 'Under the Influence', '', 2008),
(286, 'It\'s Five O\'Clock Somewhere', 'Alan Jackson', 'Under the Influence', '', 2003),
(287, 'Faded', 'Alan Walker', '', '', 2016),
(288, 'Hands Clean', 'Alanis Morissette', '', '', 2002),
(289, 'Here', 'Alessia Cara', '', '', 2015),
(290, 'Wild Things', 'Alessia Cara', '', '', 2016),
(291, 'Scars To Your Beautiful', 'Alessia Cara', '', '', 2016),
(292, 'How Far I\'ll Go', 'Alessia Cara', '', '', 2017),
(293, 'Heroes (We Could Be)', 'Alesso & Tove Lo', '', '', 2014),
(294, 'Too Close', 'Alex Clare', '', '', 2012),
(295, 'Destination Calabria', 'Alex Gaudino & Crystal Waters', '', '', 2007),
(296, 'Fairytale', 'Alexander Rybak', '', '', 2009),
(297, 'Mr Saxobeat', 'Alexandra Stan', '', '', 2011),
(298, 'Better Off Alone', 'Alice DeeJay', '', '', 2000),
(299, 'Fallin\'', 'Alicia Keys', '', '', 2001),
(300, 'A Woman\'s Worth', 'Alicia Keys', '', '', 2001),
(301, 'You Don\'t Know My Name', 'Alicia Keys', '', '', 2003),
(302, 'If I Ain\'t Got You', 'Alicia Keys', '', '', 2004),
(303, 'Karma', 'Alicia Keys', '', '', 2005),
(304, 'Unbreakable', 'Alicia Keys', '', '', 2005),
(305, 'No One', 'Alicia Keys', '', '', 2007),
(306, 'Like You\'ll Never See Me Again', 'Alicia Keys', '', '', 2007),
(307, 'Doesn\'t Mean Anything', 'Alicia Keys', '', '', 2009),
(308, 'Try Sleeping With A Broken Heart', 'Alicia Keys', '', '', 2010),
(309, 'Un-Thinkable (I\'m Ready)', 'Alicia Keys', '', '', 2010),
(310, 'Girl On Fire', 'Alicia Keys & Nicki Minaj', '', '', 2012),
(311, 'Diary', 'Alicia Keys & Tony! Toni! Tone!', '', '', 2004),
(312, 'Smooth Criminal', 'Alien Ant Farm', '', '', 2001),
(313, 'What\'s Going On', 'All Star Tribute', '', '', 2001),
(314, 'Swing, Swing', 'All-American Rejects', '', '', 2003),
(315, 'Dirty Little Secret', 'All-American Rejects', '', '', 2005),
(316, 'Move Along', 'All-American Rejects', '', '', 2006),
(317, 'It Ends Tonight', 'All-American Rejects', '', '', 2006),
(318, 'Gives You Hell', 'All-American Rejects', '', '', 2009),
(319, 'The Man', 'Aloe Blacc', '', '', 2014),
(320, 'Potential Break Up Song', 'Aly & AJ', '', '', 2007),
(321, 'Angel', 'Amanda Perez', '', '', 2003),
(323, 'Best Day Of My Life', 'American Authors', '', '', 2014),
(324, 'Flavor Of The Weak', 'American Hi-Fi', '', '', 2001),
(325, 'God Bless The U.S.A.', 'American Idol Finalists', '', '', 2003),
(326, '1 Thing', 'Amerie', '', '', 2005),
(327, 'Why Don\'t We Fall In Love', 'Amerie & Ludacris', '', '', 2002),
(328, 'Caroline', 'Amine', '', '', 2016),
(329, 'This Is The Life', 'Amy Macdonald', 'This Is the Life', 'Pop', 2008),
(330, 'Rehab', 'Amy Winehouse', '', '', 2007),
(331, 'Left Outside Alone', 'Anastacia', '', '', 2004),
(332, 'Honey, I\'m Good.', 'Andy Grammer', '', '', 2015),
(333, 'Fresh Eyes', 'Andy Grammer', '', '', 2016),
(334, 'She s More', 'Andy Griggs', '', '', 2000),
(335, 'If I Could Go!', 'Angie Martinez, Lil\' Mo & Sacario', '', '', 2002),
(336, 'Cups (Pitch Perfect\'s \'When I\'m Gone\')', 'Anna Kendrick', '', '', 2013),
(337, 'Charlene', 'Anthony Hamilton', '', '', 2004),
(338, 'The Way', 'Ariana Grande', 'Yours Truly', '', 2013),
(339, 'Love Me Harder', 'Ariana Grande', 'Yours Truly', '', 2014),
(340, 'One Last Time (Attends-moi)', 'Ariana Grande', 'Yours Truly', '', 2015),
(341, 'Focus', 'Ariana Grande', 'Yours Truly', '', 2015),
(342, 'Dangerous Woman', 'Ariana Grande', 'Yours Truly', '', 2016),
(343, 'Into You', 'Ariana Grande', 'Yours Truly', '', 2016),
(344, 'Problem', 'Ariana Grande', 'Yours Truly', '', 2014),
(345, 'Side To Side', 'Ariana Grande', 'Yours Truly', '', 2016),
(346, 'Break Free', 'Ariana Grande', 'Yours Truly', '', 2014),
(347, 'I\'m An Albatraoz', 'AronChupa', '', '', 2015),
(348, 'We Are The World 25 For Haiti', 'Artists For Haiti', '', '', 2010),
(349, 'One Day/Reckoning Song', 'Asaf Avidan', '', '', 2012),
(350, 'Fuckin\' Problems', 'ASAP Rocky', '', '', 2013),
(351, 'Foolish', 'Ashanti', '', '', 2002),
(352, 'Happy', 'Ashanti', '', '', 2002),
(353, 'Baby', 'Ashanti', '', '', 2002),
(354, 'Rock Wit U (Awww Baby)', 'Ashanti', '', '', 2003),
(355, 'Rain On Me', 'Ashanti', '', '', 2003),
(356, 'Only U', 'Ashanti', '', '', 2004),
(357, 'I Love College', 'Asher Roth', '', '', 2009),
(358, 'Pieces Of Me', 'Ashlee Simpson', '', '', 2004),
(359, 'Boyfriend', 'Ashlee Simpson', '', '', 2005),
(360, 'L.O.V.E.', 'Ashlee Simpson', '', '', 2006),
(361, 'Invisible', 'Ashlee Simpson', '', '', 2006),
(362, 'Let U Go', 'Ashley Parker Angel', '', '', 2006),
(363, 'Around The World (La La La La La)', 'ATC', '', '', 2001),
(364, 'Like A Stone', 'Audioslave', '', '', 2003),
(365, 'Boston', 'Augustana', '', '', 2007),
(366, 'I Will Love You Monday (365)', 'Aura Dione', '', '', 2009),
(367, 'Separated', 'Avant', '', '', 2000),
(368, 'Makin\' Good Love', 'Avant', '', '', 2002),
(369, 'Read Your Mind', 'Avant', '', '', 2003),
(370, 'Don\'t Take Your Love Away', 'Avant', '', '', 2004),
(371, 'My First Love', 'Avant & KeKe Wyatt', '', '', 2000),
(372, 'Levels', 'Avicii', 'True', 'EDM', 2011),
(373, 'Wake Me Up', 'Avicii', 'True', 'EDM', 2013),
(374, 'Hey, Brother', 'Avicii', 'True', 'EDM', 2013),
(375, 'Addicted To You', 'Avicii', 'True', 'EDM', 2014),
(376, 'Waiting For Love', 'Avicii', 'True', 'EDM', 2015),
(377, 'I Could Be The One', 'Avicii & Nicky Romero', 'True', 'EDM', 2013),
(378, 'Lonely Together', 'Avicii & Rita Ora', '', 'EDM', 2017),
(379, 'Complicated', 'Avril Lavigne', '', '', 2002),
(380, 'Sk8er Boi', 'Avril Lavigne', '', '', 2002),
(381, 'I\'m With You', 'Avril Lavigne', '', '', 2003),
(382, 'Don\'t Tell Me', 'Avril Lavigne', '', '', 2004),
(383, 'My Happy Ending', 'Avril Lavigne', '', '', 2004),
(384, 'Nobody\'s Home', 'Avril Lavigne', '', '', 2005),
(385, 'Keep Holding On', 'Avril Lavigne', '', '', 2007),
(386, 'Girlfriend', 'Avril Lavigne', '', '', 2007),
(387, 'When You\'re Gone', 'Avril Lavigne', '', '', 2007),
(388, 'What The Hell', 'Avril Lavigne', '', '', 2011),
(389, 'Here\'s To Never Growing Up', 'Avril Lavigne', '', '', 2013),
(390, 'Sail', 'AWOLNATION', '', '', 2013),
(391, 'More Than You Know', 'Axwell L Ingrosso', '', '', 2017),
(392, 'Rolex', 'Ayo & Teo', '', '', 2017),
(393, 'Uh Huh', 'B2K', '', '', 2002),
(394, 'Gots Ta Be', 'B2K', '', '', 2002),
(395, 'Bump Bump Bump', 'B2K & P Diddy', '', '', 2002),
(396, 'Harlem Shake', 'Baauer', '', '', 2013),
(397, 'What Happened To That Boy', 'Baby & Clipse', '', '', 2003),
(398, 'Do That...', 'Baby & P Diddy', '', '', 2003),
(399, 'Baby I\'m Back', 'Baby Bash & Akon', '', '', 2005),
(400, 'Suga Suga', 'Baby Bash & Frankie J', '', '', 2003),
(401, 'Cyclone', 'Baby Bash & T-Pain', '', '', 2007),
(402, 'The Way I Live', 'Baby Boy Da\'prince', '', '', 2007),
(403, 'Lighters', 'Bad Meets Evil & Bruno Mars', '', '', 2011),
(404, 'Who Let The Dogs Out?', 'Baha Men', '', '', 2000),
(405, 'Pinch Me', 'Barenaked Ladies', '', '', 2000),
(406, 'Now You\'re Gone', 'Basshunter Ft Dj Mental Theo', '', '', 2008),
(407, 'Pompeii', 'Bastille', '', '', 2013),
(408, 'Was du Liebe nennst', 'Bausa', '', '', 2017),
(409, 'Back Here', 'BBMak', '', '', 2000),
(410, 'Ch-Check It Out', 'Beastie Boys', '', '', 2004),
(411, 'I Got You', 'Bebe Rexha', '', '', 2017),
(412, 'Shower', 'Becky G', '', '', 2014),
(413, 'Feel It Boy', 'Beenie Man & Janet', '', '', 2002),
(414, 'Dude', 'Beenie Man & Ms Thing', '', '', 2004),
(415, 'Baby Boy', 'Beyonce', '', '', 2003),
(416, 'Me, Myself & I', 'Beyonce', '', '', 2003),
(417, 'Naughty Girl', 'Beyonce', '', '', 2004),
(418, 'Ring The Alarm', 'Beyonce', '', '', 2006),
(419, 'Irreplaceable', 'Beyonce', '', '', 2006),
(420, 'Listen', 'Beyonce', '', '', 2007),
(421, 'If I Were A Boy', 'Beyonce', '', '', 2008),
(422, 'Single Ladies (Put A Ring On It)', 'Beyonce', '', '', 2008),
(423, 'Diva', 'Beyonce', '', '', 2009),
(424, 'Halo', 'Beyonce', '', '', 2009),
(425, 'Sweet Dreams', 'Beyonce', '', '', 2009),
(426, 'Run The World (Girls)', 'Beyonce', '', '', 2011),
(427, 'Best Thing I Never Had', 'Beyonce', '', '', 2011),
(428, 'Love On Top', 'Beyonce', '', '', 2012),
(429, 'XO', 'Beyonce', '', '', 2014),
(430, 'Partition', 'Beyonce', '', '', 2014),
(431, '43046', 'Beyonce', '', '', 2014),
(432, 'Hold Up', 'Beyonce', '', '', 2016),
(433, 'Formation', 'Beyonce', '', '', 2016),
(434, 'Sorry', 'Beyonce', '', '', 2016),
(435, 'Crazy In Love', 'Beyonce & Jay-Z', '', '', 2003),
(436, 'Deja Vu', 'Beyonce & Jay-Z', '', '', 2006),
(437, 'Drunk In Love', 'Beyonce & Jay-Z', '', '', 2014),
(438, 'Beautiful Liar', 'Beyonce & Shakira', '', '', 2007),
(439, 'Check On It', 'Beyonce & Slim Thug', '', '', 2005),
(440, 'Lost In This Moment', 'Big & Rich', '', '', 2007),
(441, 'Bounce Back', 'Big Sean', '', '', 2016),
(442, 'My Last', 'Big Sean & Chris Brown', '', '', 2011),
(443, 'Blessings', 'Big Sean & Drake', '', '', 2015),
(444, 'I Don\'t F**k With You', 'Big Sean & E-40', '', '', 2014),
(445, 'Marvin & Chardonnay', 'Big Sean & Kanye West', '', '', 2011),
(446, 'Dance (A$$)', 'Big Sean & Nicki Minaj', '', '', 2011),
(447, 'Man\'s Not Hot', 'Big Shaq', '', '', 2017),
(448, 'Still Fly', 'Big Tymers', '', '', 2002),
(449, 'Must Be Doin\' Somethin\' Right', 'Billy Currington', '', '', 2006),
(450, 'People Are Crazy', 'Billy Currington', '', '', 2009),
(451, 'Pretty Good At Drinkin\' Beer', 'Billy Currington', '', '', 2010),
(452, 'It Don\'t Hurt Like It Used To', 'Billy Currington', '', '', 2016),
(453, 'One Voice', 'Billy Gilman', '', '', 2000),
(454, 'Ready, Set, Don\'t Go', 'Billy Ray Cyrus & Miley Cyrus', '', '', 2008),
(455, 'Stuntin\' Like My Daddy', 'Birdman, Drake & Lil\' Wayne', '', '', 2006),
(456, 'Pop Bottles', 'Birdman, Drake & Lil\' Wayne', '', '', 2008),
(457, 'Money To Blow', 'Birdman, Drake & Lil\' Wayne', '', '', 2009),
(458, 'Whoa!', 'Black Rob', '', '', 2000),
(459, 'Austin', 'Blake Shelton', '', '', 2001),
(460, 'The Baby', 'Blake Shelton', '', '', 2003),
(461, 'Some Beach', 'Blake Shelton', '', '', 2004),
(462, 'Honey Bee', 'Blake Shelton', '', '', 2011),
(463, 'God Gave Me You', 'Blake Shelton', '', '', 2011),
(464, 'Sure Be Cool If You Did', 'Blake Shelton', '', '', 2013),
(465, 'Mine Would Be You', 'Blake Shelton', '', '', 2013),
(466, 'Doin\' What She Likes', 'Blake Shelton', '', '', 2014),
(467, 'Sangria', 'Blake Shelton', '', '', 2015),
(468, 'Came Here To Forget', 'Blake Shelton', '', '', 2016),
(469, 'Boys \'Round Here', 'Blake Shelton & Pistol Annies', '', '', 2013),
(470, 'Bring It All To Me', 'Blaque', '', '', 2000),
(471, 'All The Small Things', 'blink-182', '', '', 2000),
(472, 'The Rock Show', 'blink-182', '', '', 2001),
(473, 'I Miss You', 'blink-182', '', '', 2004),
(474, 'The Bad Touch', 'Bloodhound Gang', '', '', 2000),
(475, 'Hit \'em Up Style (Oops!)', 'Blu Cantrell', '', '', 2001),
(476, 'Breathe', 'Blu Cantrell & Sean Paul', '', '', 2003),
(477, 'Hate Me!', 'Blue October', '', '', 2006),
(478, 'Inside Your Heaven', 'Bo Bice', '', '', 2005),
(479, 'So Good', 'BoB', '', '', 2012),
(480, 'Nothin\' On You', 'BoB & Bruno Mars', '', '', 2010),
(481, 'Airplanes', 'BoB & Hayley Williams', '', '', 2010),
(482, 'Strange Clouds', 'BoB & Lil\' Wayne', '', '', 2011),
(483, 'Magic', 'BoB & Rivers Cuomo', '', '', 2010),
(484, 'Both Of Us', 'BoB & Taylor Swift', '', '', 2012),
(485, 'Rock This Party (Everybody Dance Now)', 'Bob Sinclar & Cutee-B', '', '', 2006),
(486, 'Hot Boy', 'Bobby Shmurda', '', '', 2014),
(487, 'Slow Down', 'Bobby Valentino', '', '', 2005),
(488, 'Anonymous', 'Bobby Valentino & Timbaland', '', '', 2007),
(489, 'It\'s My Life', 'Bon Jovi', '', '', 2000),
(490, 'Have A Nice Day', 'Bon Jovi', '', '', 2005),
(491, 'Who Says You Can\'t Go Home', 'Bon Jovi', '', '', 2006),
(492, '(You Want To) Make A Memory', 'Bon Jovi', '', '', 2007),
(493, 'Never Scared', 'Bone Crusher & Killer Mike & T.I.', '', '', 2003),
(494, 'I Tried', 'Bone Thugs-n-Harmony & Akon', '', '', 2007),
(495, 'Let\'s Get Down', 'Bow Wow & Baby', '', '', 2003),
(496, 'Shortie Like Mine', 'Bow Wow & Chris Brown & Johnta Austin', '', '', 2006),
(497, 'Like You', 'Bow Wow & Ciara', '', '', 2005),
(498, 'Fresh Azimiz', 'Bow Wow & J-Kwon & Jermaine Dupri', '', '', 2006),
(499, 'Let Me Hold You', 'Bow Wow & Omarion', '', '', 2005),
(500, 'Outta My System', 'Bow Wow & T-Pain & Johnta Austin', '', '', 2007),
(501, '1985', 'Bowling For Soup', '', '', 2004),
(502, 'Almost', 'Bowling For Soup', '', '', 2005),
(503, 'The Great Escape', 'Boys Like Girls', '', '', 2007),
(504, 'Love Drunk', 'Boys Like Girls', '', '', 2009),
(505, 'Two Is Better Than One', 'Boys Like Girls & Taylor Swift', '', '', 2009),
(506, 'He Didn\'t Have To Be', 'Brad Paisley', '', '', 2000),
(507, 'We Danced', 'Brad Paisley', '', '', 2000),
(508, 'Wrapped Around', 'Brad Paisley', '', '', 2002),
(509, 'I\'m Gonna Miss Her (The Fishin\' Song)', 'Brad Paisley', '', '', 2002),
(510, 'Celebrity', 'Brad Paisley', '', '', 2003),
(511, 'Little Moments', 'Brad Paisley', '', '', 2004),
(512, 'Mud On The Tires', 'Brad Paisley', '', '', 2005),
(513, 'Alcohol', 'Brad Paisley', '', '', 2005),
(514, 'The World', 'Brad Paisley', '', '', 2006),
(515, 'She\'s Everything', 'Brad Paisley', '', '', 2006),
(516, 'Ticks', 'Brad Paisley', '', '', 2007),
(517, 'Letter To Me', 'Brad Paisley', '', '', 2008),
(518, 'I\'m Still A Guy', 'Brad Paisley', '', '', 2008),
(519, 'Then', 'Brad Paisley', '', '', 2009),
(520, 'Old Alabama', 'Brad Paisley & Alabama', '', '', 2011),
(521, 'Whiskey Lullaby', 'Brad Paisley & Alison Krauss', '', '', 2004),
(522, 'Remind Me', 'Brad Paisley & Carrie Underwood', '', '', 2011),
(523, 'When I Get Where I\'m Going', 'Brad Paisley & Dolly Parton', '', '', 2006),
(524, 'What About Us', 'Brandy', '', '', 2002),
(525, 'Full Moon', 'Brandy', '', '', 2002),
(526, 'Right Here (Departed)', 'Brandy', '', '', 2008),
(527, 'Talk About Our Love', 'Brandy & Kanye West', '', '', 2004),
(528, 'Bottoms Up', 'Brantley Gilbert', '', '', 2014),
(529, 'Blackout', 'Breathe Carolina', '', '', 2012),
(530, 'Don\'t Ya', 'Brett Eldredge', '', '', 2013),
(531, 'Drunk On Your Love', 'Brett Eldredge', '', '', 2016),
(532, 'In Case You Didn\'t Know', 'Brett Young', '', '', 2017),
(533, 'Back At One', 'Brian McKnight', '', '', 2000),
(534, '(You Drive Me) Crazy', 'Britney Spears', 'Oops!... I Did It Again', 'Pop', 2000),
(535, 'From The Bottom Of My Broken Heart', 'Britney Spears', 'Oops!... I Did It Again', 'Pop', 2000),
(536, 'Oops!... I Did It Again', 'Britney Spears', 'Oops!... I Did It Again', 'Pop', 2000),
(537, 'Lucky', 'Britney Spears', 'Oops!... I Did It Again', 'Pop', 2000),
(538, 'Stronger', 'Britney Spears', 'Oops!... I Did It Again', 'Pop', 2000),
(539, 'I\'m A Slave 4 U', 'Britney Spears', 'Oops!... I Did It Again', 'Pop', 2001),
(540, 'Toxic', 'Britney Spears', 'Oops!... I Did It Again', 'Pop', 2004),
(541, 'Everytime', 'Britney Spears', 'Oops!... I Did It Again', 'Pop', 2004),
(542, 'Gimme More', 'Britney Spears', 'Blackout', 'Pop', 2007),
(543, 'Piece Of Me', 'Britney Spears', 'Blackout', 'Pop', 2007),
(544, 'Break The Ice', 'Britney Spears', 'Oops!... I Did It Again', 'Pop', 2008),
(545, 'Womanizer', 'Britney Spears', 'Oops!... I Did It Again', 'Pop', 2008),
(546, 'Circus', 'Britney Spears', 'Oops!... I Did It Again', 'Pop', 2008),
(547, 'If U Seek Amy', 'Britney Spears', 'Oops!... I Did It Again', 'Pop', 2009),
(548, '3', 'Britney Spears', 'Oops!... I Did It Again', 'Pop', 2009),
(549, 'Hold It Against Me', 'Britney Spears', 'Oops!... I Did It Again', 'Pop', 2011),
(550, 'Till The World Ends', 'Britney Spears', 'Oops!... I Did It Again', 'Pop', 2011),
(551, 'I Wanna Go', 'Britney Spears', 'Oops!... I Did It Again', 'Pop', 2011),
(552, 'Criminal', 'Britney Spears', 'Oops!... I Did It Again', 'Pop', 2011),
(553, 'Work Bitch!', 'Britney Spears', 'Oops!... I Did It Again', 'Pop', 2013),
(554, 'Make Me...', 'Britney Spears', 'Oops!... I Did It Again', 'Pop', 2016),
(555, 'Pretty Girls', 'Britney Spears', 'Oops!... I Did It Again', 'Pop', 2015),
(556, 'Me Against The Music', 'Britney Spears', 'Oops!... I Did It Again', 'Pop', 2003),
(557, 'Girlfight', 'Brooke Valentine, Lil\' Jon & Big Boi', '', '', 2005),
(558, 'Ain\'t Nothing \'Bout You', 'Brooks & Dunn', '', '', 2001),
(559, 'Only In America', 'Brooks & Dunn', '', '', 2001),
(560, 'The Long Goodbye', 'Brooks & Dunn', '', '', 2002),
(561, 'My Heart Is Lost To You', 'Brooks & Dunn', '', '', 2002),
(562, 'Red Dirt Road', 'Brooks & Dunn', '', '', 2003),
(563, 'You Can\'t Take The Honky Tonk Out Of The Girl', 'Brooks & Dunn', '', '', 2004),
(564, 'That\'s What It\'s All About', 'Brooks & Dunn', '', '', 2004),
(565, 'Just The Way You Are (Amazing)', 'Bruno Mars', '', '', 2010),
(566, 'Grenade', 'Bruno Mars', '', '', 2010),
(567, 'The Lazy Song', 'Bruno Mars', '', '', 2011),
(568, 'It Will Rain', 'Bruno Mars', '', '', 2011),
(569, 'Locked Out Of Heaven', 'Bruno Mars', '', '', 2012),
(570, 'When I Was Your Man', 'Bruno Mars', '', '', 2013),
(571, 'Treasure', 'Bruno Mars', '', '', 2013),
(572, 'Gorilla', 'Bruno Mars', '', '', 2013),
(573, 'Young Girls', 'Bruno Mars', '', '', 2014),
(574, '24K Magic', 'Bruno Mars', '', '', 2016),
(575, 'That\'s What I Like', 'Bruno Mars', '', '', 2017),
(576, 'Versace On The Floor', 'Bruno Mars', '', '', 2017),
(577, 'Don\'t', 'Bryson Tiller', '', '', 2015),
(578, 'Exchange', 'Bryson Tiller', '', '', 2016),
(579, 'Ugly', 'Bubba Sparxxx', '', '', 2001),
(580, 'Ms New Booty', 'Bubba Sparxxx, Ying Yang Twins & Mr. ColliPark', '', '', 2006),
(581, 'Help Pour Out The Rain (Lacey\'s Song)', 'Buddy Jewell', '', '', 2003),
(582, 'Sweet Southern Comfort', 'Buddy Jewell', '', '', 2004),
(583, 'Break Ya Neck', 'Busta Rhymes', '', '', 2002),
(584, 'Touch It', 'Busta Rhymes', '', '', 2006),
(585, 'I Know What You Want', 'Busta Rhymes & Mariah Carey', '', '', 2003),
(586, 'Make It Clap', 'Busta Rhymes & Spliff Star', '', '', 2003),
(587, 'Pass the Courvoisier - Part II', 'Busta Rhymes, P Diddy & Pharrell Williams', '', '', 2002),
(588, 'I Love My B****', 'Busta Rhymes, will.i.am & Kelis', '', '', 2006),
(589, 'Jerk It Out', 'Caesars', '', '', 2005),
(590, 'Teach Me How To Dougie', 'Cali Swag District', '', '', 2010),
(591, 'Feel So Close', 'Calvin Harris', '18 Months', '', 2012),
(592, 'Summer', 'Calvin Harris', 'Summer', '', 2014),
(593, 'My Way', 'Calvin Harris', 'Summer', '', 2016),
(594, 'How Deep Is Your Love?', 'Calvin Harris', 'Summer', '', 2015),
(595, 'I Need Your Love', 'Calvin Harris', '18 Months', '', 2013),
(596, 'Outside', 'Calvin Harris', 'Motion', '', 2015),
(597, 'Sweet Nothing', 'Calvin Harris', '18 Months', '', 2012),
(598, 'Blame', 'Calvin Harris', 'Motion', '', 2014),
(599, 'Let\'s Go', 'Calvin Harris', '18 Months', '', 2012),
(600, 'This Is What You Came For', 'Calvin Harris & Rihanna', '', '', 2016),
(601, 'Slide', 'Calvin Harris, Frank Ocean & Migos', '', '', 2017),
(602, 'Feels', 'Calvin Harris, Pharrell Williams, Katy Perry & Big Sean', '', '', 2017),
(603, 'Cola', 'Camelphat & Elderbrook', '', '', 2017),
(604, 'Crying In The Club', 'Camila Cabello', '', '', 2017),
(605, 'Havana', 'Camila Cabello & Young Thug', '', '', 2017),
(606, 'Oh Boy', 'Cam\'ron & Juelz Santana', '', '', 2002),
(607, 'Hey Ma', 'Cam\'ron & Juelz Santana', '', '', 2002),
(608, 'Safe And Sound', 'Capital Cities', '', '', 2013),
(609, 'Bodak Yellow (Money Moves)', 'Cardi B', '', '', 2017),
(610, 'I Wish', 'Carl Thomas', '', '', 2000),
(611, 'Call Me Maybe', 'Carly Rae Jepsen', '', '', 2012),
(612, 'I Really Like You', 'Carly Rae Jepsen', '', '', 2015),
(613, 'Show Me What I\'m Looking For', 'Carolina Liar', '', '', 2009),
(614, 'Jesus, Take The Wheel', 'Carrie Underwood', '', '', 2005),
(615, 'Before He Cheats', 'Carrie Underwood', '', '', 2006),
(616, 'Wasted', 'Carrie Underwood', '', '', 2007),
(617, 'I\'ll Stand By You', 'Carrie Underwood', '', '', 2007),
(618, 'So Small', 'Carrie Underwood', '', '', 2007),
(619, 'All-American Girl', 'Carrie Underwood', '', '', 2008),
(620, 'Last Name', 'Carrie Underwood', '', '', 2008),
(621, 'I Told You So', 'Carrie Underwood', '', '', 2009),
(622, 'Cowboy Casanova', 'Carrie Underwood', '', '', 2009),
(623, 'Undo It', 'Carrie Underwood', '', '', 2010),
(624, 'Good Girl', 'Carrie Underwood', '', '', 2012),
(625, 'Blown Away', 'Carrie Underwood', '', '', 2012),
(626, 'Something In The Water', 'Carrie Underwood', '', '', 2015),
(627, 'Everytime We Touch', 'Cascada', '', '', 2006),
(628, 'What Hurts The Most', 'Cascada', '', '', 2008),
(629, 'Evacuate The Dancefloor', 'Cascada', '', '', 2009),
(630, 'Missing You', 'Case', '', '', 2001),
(631, 'Stadt', 'Cassandra Steen & Adel Tawil', '', '', 2009),
(632, 'I\'m A Hustla', 'Cassidy', '', '', 2005),
(633, 'Hotel', 'Cassidy & R Kelly', '', '', 2004),
(634, 'Me & U', 'Cassie', '', '', 2006),
(635, 'Seasons Of Love', 'Cast of Rent', '', '', 2005),
(636, 'F**k You/Forget You', 'Cee-Lo Green', '', '', 2010),
(637, 'That\'s The Way It Is', 'Celine Dion', '', '', 2000),
(638, 'A New Day Has Come', 'Celine Dion', '', '', 2002),
(639, 'I Drove All Night', 'Celine Dion', '', '', 2003),
(640, 'Taking Chances', 'Celine Dion', '', '', 2007),
(641, 'Yes!', 'Chad Brock', '', '', 2000),
(642, 'Hero', 'Chad Kroeger & Josey Scott', '', '', 2002),
(643, 'Ridin\'', 'Chamillionaire & Krayzie Bone', '', '', 2006),
(644, 'Turn It Up', 'Chamillionaire & Lil\' Flip', '', '', 2006),
(645, 'Boom Clap', 'Charli XCX', '', '', 2014),
(646, 'One Call Away', 'Charlie Puth', '', '', 2016),
(647, 'Attention', 'Charlie Puth', '', '', 2017),
(648, 'How Long', 'Charlie Puth', '', '', 2017),
(649, 'Marvin Gaye', 'Charlie Puth & Meghan Trainor', '', '', 2015),
(650, 'We Don\'t Talk Anymore', 'Charlie Puth & Selena Gomez', '', '', 2016),
(651, 'No Promises', 'Cheat Codes & Demi Lovato', '', '', 2017),
(652, 'Want U Back', 'Cher Lloyd & Astro', '', '', 2012),
(653, 'Do It To It', 'Cherish & Sean Paul', '', '', 2006),
(654, 'Killa', 'Cherish & Yung Joc', '', '', 2008),
(655, 'Fight For This Love', 'Cheryl Cole', '', '', 2010),
(656, 'Redbone', 'Childish Gambino', '', '', 2017),
(657, 'Right Thurr', 'Chingy', '', '', 2003),
(658, 'Balla Baby', 'Chingy', '', '', 2004),
(659, 'Pullin\' Me Back', 'Chingy & Tyrese', '', '', 2006),
(660, 'Holidae In', 'Chingy, Ludacris & Snoop Dogg', '', '', 2003),
(661, 'Yo! (Excuse Me Miss)', 'Chris Brown', '', '', 2006),
(662, 'Say Goodbye', 'Chris Brown', '', '', 2006),
(663, 'With You', 'Chris Brown', '', '', 2008),
(664, 'Forever', 'Chris Brown', '', '', 2008),
(665, 'Deuces', 'Chris Brown', '', '', 2010),
(666, 'Yeah 3X', 'Chris Brown', '', '', 2010),
(667, 'She Ain\'t You', 'Chris Brown', '', '', 2011),
(668, 'Turn Up The Music', 'Chris Brown', '', '', 2012),
(669, 'Don\'t Wake Me Up', 'Chris Brown', '', '', 2012),
(670, 'Fine China', 'Chris Brown', '', '', 2013),
(671, 'Love More', 'Chris Brown', '', '', 2013),
(672, 'A New Flame', 'Chris Brown', '', '', 2014),
(673, 'Back To Sleep', 'Chris Brown', '', '', 2016),
(674, 'Questions', 'Chris Brown', '', '', 2017),
(675, 'Beautiful People', 'Chris Brown & Benny Benassi', '', '', 2011),
(676, 'Run It', 'Chris Brown & Juelz Santana', '', '', 2005),
(677, 'Gimme That', 'Chris Brown & Lil\' Wayne', '', '', 2006),
(678, 'I Can Transform Ya', 'Chris Brown & Lil\' Wayne', '', '', 2009),
(679, 'Look At Me Now', 'Chris Brown & Lil\' Wayne', '', '', 2011),
(680, 'Loyal', 'Chris Brown & Lil\' Wayne', '', '', 2014),
(681, 'Kiss Kiss', 'Chris Brown & T-Pain', '', '', 2007),
(682, 'Ayo', 'Chris Brown & Tyga', '', '', 2015),
(683, 'Party', 'Chris Brown, Usher & Gucci Mane', '', '', 2017),
(684, 'I Breathe In, I Breathe Out', 'Chris Cagle', '', '', 2002),
(685, 'What A Beautiful Day', 'Chris Cagle', '', '', 2003),
(686, 'Gettin\' You Home (The Black Dress Song)', 'Chris Young', '', '', 2009),
(687, 'You', 'Chris Young', '', '', 2012),
(688, 'Think Of You', 'Chris Young & Cassadee Pope', '', '', 2016),
(689, 'What A Girl Wants', 'Christina Aguilera', '', '', 2000),
(690, 'I Turn To You', 'Christina Aguilera', '', '', 2000),
(691, 'Come On Over Baby (All I Want Is You)', 'Christina Aguilera', '', '', 2000),
(692, 'Fighter', 'Christina Aguilera', '', '', 2003),
(693, 'The Voice Within', 'Christina Aguilera', '', '', 2003),
(694, 'Ain\'t No Other Man', 'Christina Aguilera', '', '', 2006),
(695, 'Hurt', 'Christina Aguilera', '', '', 2006),
(696, 'Candyman', 'Christina Aguilera', '', '', 2007),
(697, 'Keeps Gettin\' Better', 'Christina Aguilera', '', '', 2008),
(698, 'Not Myself Tonight', 'Christina Aguilera', '', '', 2010),
(699, 'Your Body', 'Christina Aguilera', '', '', 2012),
(700, 'Dirrty', 'Christina Aguilera & Redman', '', '', 2002),
(701, 'Lady Marmalade (Voulez-Vous Coucher Aver Moi Ce Soir?)', 'Christina Aguilera, Lil\' Kim, Mya & Pink', '', '', 2001),
(702, 'Can\'t Hold Us Down', 'Christina Aguilera, Lil\' Kim, Mya & Pink', '', '', 2003),
(703, 'AM To PM', 'Christina Milian', '', '', 2001),
(704, 'Dip It Low', 'Christina Milian & Samy Deluxe', '', '', 2004),
(705, 'Say I', 'Christina Milian & Young Jeezy', '', '', 2006),
(706, 'Jar Of Hearts', 'Christina Perri', '', '', 2011),
(707, 'A Thousand Years', 'Christina Perri', '', '', 2011),
(708, 'Human', 'Christina Perri', '', '', 2014),
(709, 'Promise', 'Ciara', '', '', 2006),
(710, 'Like A Boy', 'Ciara', '', '', 2007),
(711, 'Body Party', 'Ciara', '', '', 2013),
(712, 'Get Up', 'Ciara & Chamillionaire', '', '', 2006),
(713, 'Love Sex Magic', 'Ciara & Justin Timberlake', '', '', 2009),
(714, 'Oh', 'Ciara & Ludacris', '', '', 2005),
(715, '1-2 Step', 'Ciara & Missy \'Misdemeanor\' Elliot', '', '', 2004),
(716, 'Goodies', 'Ciara & Petey Pablo', '', '', 2004),
(717, 'What Would You Do?', 'City High', '', '', 2001),
(718, 'Caramel', 'City High & Eve', '', '', 2001),
(719, 'This Is The Night', 'Clay Aiken', '', '', 2003),
(720, 'Solitaire', 'Clay Aiken', '', '', 2004),
(721, 'Unconditional', 'Clay Davidson', '', '', 2000),
(722, 'The Chain Of Love', 'Clay Walker', '', '', 2000),
(723, 'Rather Be', 'Clean Bandit & Jess Glynne', '', '', 2014),
(724, 'Symphony', 'Clean Bandit & Zara Larsson', '', '', 2017),
(725, 'Rockabye', 'Clean Bandit, Sean Paul & Anne-Marie', '', '', 2016),
(726, 'Been There', 'Clint Black & Steve Wariner', '', '', 2000),
(727, 'Grindin\'', 'Clipse', '', '', 2002),
(728, 'When The Last Time', 'Clipse', '', '', 2002),
(729, 'Reggaeton Lento', 'CNCO & Little Mix', '', '', 2017),
(730, 'Good Girls Go Bad', 'Cobra Starship', '', '', 2009),
(731, 'You Make Me Feel', 'Cobra Starship & Sabi', '', '', 2011),
(732, 'Bubbly', 'Colbie Caillat', '', '', 2007),
(733, 'Realize', 'Colbie Caillat', '', '', 2008),
(734, 'Falling For You', 'Colbie Caillat', '', '', 2009),
(735, 'What You Got', 'Colby O\'Donis & Akon', '', '', 2008),
(736, 'Yellow', 'Coldplay', '', '', 2001),
(737, 'Clocks', 'Coldplay', '', '', 2003),
(738, 'Speed Of Sound', 'Coldplay', '', '', 2005),
(739, 'Fix You', 'Coldplay', '', '', 2005),
(740, 'Viva la vida', 'Coldplay', '', '', 2008),
(741, 'Violet Hill', 'Coldplay', '', '', 2008),
(742, 'Christmas Lights', 'Coldplay', '', '', 2010),
(743, 'Every Teardrop Is A Waterfall', 'Coldplay', '', '', 2011),
(744, 'Paradise', 'Coldplay', '', '', 2011),
(745, 'A Sky Full Of Stars', 'Coldplay', '', '', 2014),
(746, 'Adventure Of A Lifetime', 'Coldplay', '', '', 2015),
(747, 'Hymn For The Weekend', 'Coldplay', '', '', 2016),
(748, 'Chillin\' It', 'Cole Swindell', '', '', 2014),
(749, 'You Should Be Here', 'Cole Swindell', '', '', 2016),
(750, 'Couldn t Last A Moment', 'Colin Raye', '', '', 2000),
(751, 'The Light', 'Common', '', '', 2000),
(752, 'Push It To The Limit', 'Corbin Bleu', '', '', 2007),
(753, 'Hanginaround', 'Counting Crows', '', '', 2000),
(754, 'Accidentally In Love', 'Counting Crows', '', '', 2004),
(755, 'Big Yellow Taxi', 'Counting Crows & Vanessa Carlton', '', '', 2003),
(756, 'Fill Me In', 'Craig David', '', '', 2001),
(757, '7 Days', 'Craig David', '', '', 2002),
(758, 'Walking Away', 'Craig David', '', '', 2002),
(759, 'Redneck Yacht Club', 'Craig Morgan', '', '', 2005),
(760, 'Axel F', 'Crazy Frog', '', '', 2005),
(761, 'Butterfly', 'Crazy Town', '', '', 2001),
(762, 'Higher', 'Creed', '', '', 2000),
(763, 'With Arms Wide Open', 'Creed', '', '', 2000),
(764, 'My Sacrifice', 'Creed', '', '', 2001),
(765, 'One Last Breath', 'Creed', '', '', 2002),
(766, 'Rock Yo Hips', 'Crime Mob & Lil Scrappy', '', '', 2007),
(767, 'What I Really Meant To Say', 'Cyndi Thomson', '', '', 2001),
(768, 'Untitled (How Does It Feel)', 'D Angelo', '', '', 2000),
(769, 'Broccoli', 'D.R.A.M. & Lil Yachty', '', '', 2016),
(770, 'Purple Pills', 'D12', '', '', 2001),
(771, 'How Come', 'D12', '', '', 2004),
(772, 'My Band', 'D12 & Eminem', 'Encore', '', 2004),
(773, 'Laffy Taffy', 'D4L', '', '', 2005),
(774, 'In Love Wit Chu', 'Da Brat & Cherish', '', '', 2003),
(775, 'What\'chu Like', 'Da Brat & Tyrese', '', '', 2000),
(776, 'Gasolina', 'Daddy Yankee', '', '', 2005),
(777, 'Rompe', 'Daddy Yankee', '', '', 2006),
(778, 'One More Time', 'Daft Punk', '', '', 2001),
(779, 'Get Lucky', 'Daft Punk & Pharrell Williams', '', '', 2013),
(780, 'Gotta Get Thru This', 'Daniel Bedingfield', '', '', 2002),
(781, 'If You\'re Not The One', 'Daniel Bedingfield', '', '', 2003),
(782, 'Bad Day', 'Daniel Powter', '', '', 2005),
(783, 'Anything But Love', 'Daniel Schuhmacher', '', '', 2009),
(784, 'Show Stoppers', 'Danity Kane', '', '', 2006),
(785, 'Damaged', 'Danity Kane', '', '', 2008),
(786, 'Don\'t Think I Don\'t Think About It', 'Darius Rucker', '', '', 2008),
(787, 'Alright', 'Darius Rucker', '', '', 2009),
(788, 'Wagon Wheels', 'Darius Rucker', '', '', 2013),
(789, 'I Miss My Friend', 'Darryl Worley', '', '', 2002),
(790, 'Have You Forgotten?', 'Darryl Worley', '', '', 2003),
(791, 'Awful, Beautiful Life', 'Darryl Worley', '', '', 2005),
(792, 'It\'s Not Over', 'Daughtry', '', '', 2007),
(793, 'Home', 'Daughtry', '', '', 2007),
(794, 'Over You', 'Daughtry', '', '', 2007),
(795, 'Feels Like Tonight', 'Daughtry', '', '', 2008),
(796, 'No Surprise', 'Daughtry', '', '', 2009),
(797, 'Life After You', 'Daughtry', '', '', 2010),
(798, 'September', 'Daughtry', '', '', 2010),
(799, 'One Woman Man', 'Dave Hollister', '', '', 2001),
(800, 'The Space Between', 'Dave Matthews Band', '', '', 2001),
(801, 'Where Are You Going', 'Dave Matthews Band', '', '', 2002),
(802, 'Crush', 'David Archuleta', '', '', 2008),
(803, 'Riding With Private Malone', 'David Ball', '', '', 2001),
(804, 'Play', 'David Banner', '', '', 2005),
(805, 'Get Like Me', 'David Banner', '', '', 2008),
(806, 'Time Of My Life', 'David Cook', '', '', 2008),
(807, 'Light On', 'David Cook', '', '', 2009),
(808, 'Sexy Chick (Sexy Bitch)', 'David Guetta & Akon', '', '', 2009),
(809, 'Getting Over You', 'David Guetta & Chris Willis', '', '', 2010),
(810, '2U', 'David Guetta & Justin Bieber', '', '', 2017),
(811, 'When Love Takes Over', 'David Guetta & Kelly Rowland', '', '', 2009),
(812, 'Memories', 'David Guetta & Kid Cudi', '', '', 2010),
(813, 'Turn Me On', 'David Guetta & Nicki Minaj', '', '', 2012),
(814, 'Who\'s That Chick?', 'David Guetta & Rihanna', '', '', 2010),
(815, 'Lovers On The Sun', 'David Guetta & Sam Martin', '', '', 2014),
(816, 'Dangerous', 'David Guetta & Sam Martin', '', '', 2014),
(817, 'Titanium', 'David Guetta & Sia', '', '', 2011),
(818, 'She Wolf (Falling To Pieces)', 'David Guetta & Sia', '', '', 2012),
(819, 'Bang My Head', 'David Guetta & Sia', '', '', 2016),
(820, 'Without You', 'David Guetta & Usher', '', '', 2011),
(821, 'This One\'s For You', 'David Guetta & Zara Larsson', '', '', 2016),
(822, 'Where Them Girls At', 'David Guetta, Flo-Rida & Nicki Minaj', '', '', 2011),
(823, 'Play Hard', 'David Guetta, Ne-Yo & Akon', '', '', 2013),
(824, 'Hey Mama', 'David Guetta, Nicki Minaj & Afrojack', '', '', 2015),
(825, 'Little Bad Girl', 'David Guetta, Taio Cruz & Ludacris', '', '', 2011),
(826, 'Whatever She\'s Got', 'David Nail', '', '', 2014),
(827, 'Hide Away', 'Daya', '', '', 2016),
(828, 'Sit Still, Look Pretty', 'Daya', '', '', 2016),
(829, 'Wasting My Time', 'Default', '', '', 2002),
(830, 'Try Me', 'DeJ Loaf', '', '', 2015),
(831, 'I Think They Like Me', 'Dem Franchize Boyz & Jermaine Dupri, Da Brat & Bow Wow', '', '', 2005),
(832, 'Lean Wit It, Rock Wit It', 'Dem Franchize Boyz, Lil Peanut & Charlay', '', '', 2006),
(833, 'Here We Go Again', 'Demi Lovato', '', '', 2009),
(834, 'Give Your Heart A Break', 'Demi Lovato', '', '', 2012),
(835, 'Heart Attack', 'Demi Lovato', '', '', 2013),
(836, 'Let It Go', 'Demi Lovato', '', '', 2014),
(837, 'Neon Lights', 'Demi Lovato', '', '', 2014),
(838, 'Cool For The Summer', 'Demi Lovato', '', '', 2015),
(839, 'Confident', 'Demi Lovato', '', '', 2015),
(840, 'Sorry Not Sorry', 'Demi Lovato', '', '', 2017),
(841, 'Really Don\'t Care', 'Demi Lovato & Cher Lloyd', '', '', 2014),
(842, 'This Is Me', 'Demi Lovato & Joe Jonas', '', '', 2008),
(843, 'Dream On', 'Depeche Mode', '', '', 2001),
(844, 'Panda', 'Desiigner', '', '', 2016),
(845, 'Tiimmy Turner', 'Desiigner', '', '', 2016),
(846, 'Say My Name', 'Destiny\'s Child', '', '', 2000),
(847, 'Jumpin\' Jumpin\'', 'Destiny\'s Child', '', '', 2000),
(848, 'Independent Woman', 'Destiny\'s Child', '', '', 2000),
(849, 'Survivor', 'Destiny\'s Child', '', '', 2001),
(850, 'Bootylicious', 'Destiny\'s Child', '', '', 2001),
(851, 'Emotion', 'Destiny\'s Child', '', '', 2001),
(852, 'Lose My Breath', 'Destiny\'s Child', '', '', 2004),
(853, 'Girl', 'Destiny\'s Child', '', '', 2005),
(854, 'Cater 2 U', 'Destiny\'s Child', '', '', 2005),
(855, 'Soldier', 'Destiny\'s Child & T.I. & Lil\' Wayne', '', '', 2004),
(856, 'In The Dark', 'Dev', '', '', 2011),
(857, 'Listen To Your Heart', 'DHT', '', '', 2005),
(858, 'One More Day', 'Diamond Rio', '', '', 2001),
(859, 'Beautiful Mess', 'Diamond Rio', '', '', 2002),
(860, 'I Believe', 'Diamond Rio', '', '', 2003),
(861, 'Thank You', 'Dido', '', '', 2001),
(862, 'White Flag', 'Dido', '', '', 2003),
(863, 'Disco Pogo', 'Die Atzen', '', '', 2010),
(864, 'What Was I Thinkin\'', 'Dierks Bentley', '', '', 2003),
(865, 'Come A Little Closer', 'Dierks Bentley', '', '', 2005),
(866, 'Settle For A Slowdown', 'Dierks Bentley', '', '', 2006),
(867, 'Sideways', 'Dierks Bentley', '', '', 2009),
(868, 'Drunk On A Plane', 'Dierks Bentley', '', '', 2014),
(869, 'Somewhere On A Beach', 'Dierks Bentley', '', '', 2016),
(870, 'Days Go By', 'Dirty Vegas', '', '', 2002),
(871, 'Latch', 'Disclosure & Sam Smith', '', '', 2014),
(872, 'Omen', 'Disclosure & Sam Smith', '', '', 2015),
(873, 'Send It On', 'Disney\'s Friends For Change', '', '', 2009),
(874, 'The Sound Of Silence', 'Disturbed', '', '', 2016),
(875, 'Bonkers', 'Dizzee Rascal & Armand Van Helden', '', '', 2009),
(876, 'Welcome To St. Tropez', 'DJ Antoine & Timati', '', '', 2011),
(877, 'For Free', 'DJ Khaled & Drake', '', '', 2016),
(878, 'I\'m So Hood', 'DJ Khaled & T-Pain, Trick Daddy, Rick Ross & Plies', '', '', 2007),
(879, 'Hold You Down', 'DJ Khaled, Chris Brown, August Alsina, Future & Jeremih', '', '', 2014),
(880, 'I\'m On One', 'DJ Khaled, Drake & Rick Ross', '', '', 2011),
(881, 'I Got The Keys', 'DJ Khaled, Jay-Z & Future', '', '', 2016),
(882, 'I\'m The One', 'DJ Khaled, Justin Bieber, Quavo, Chance The Rapper & Lil Wayne', '', '', 2017),
(883, 'Do You Mind', 'DJ Khaled, Nicki Minaj, Chris Brown & August Alsina', '', '', 2016),
(884, 'Wild Thoughts', 'DJ Khaled, Rihanna & Bryson Tiller', '', '', 2017),
(885, 'We Takin\' Over', 'DJ Khaled, T.I. Akon, Rick Ross, Fat Joe. Lil\' Wayne & Baby', '', '', 2007),
(886, 'All I Do Is Win', 'DJ Khaled, T-Pain, Ludacris, Snoop Dogg & Rick Ross', '', '', 2010),
(887, 'Heaven', 'DJ Sammy & Yanou', '', '', 2002),
(888, 'You Know You Like It', 'DJ Snake & AlunaGeorge', '', '', 2015),
(889, 'Middle', 'DJ Snake & Bipolar Sunshine', '', '', 2016),
(890, 'Let Me Love You', 'DJ Snake & Justin Bieber', '', '', 2016),
(891, 'Turn Down For What', 'DJ Snake & Lil\' Jon', '', '', 2014),
(892, 'Party Up (Up In Here)', 'DMX', '', '', 2000),
(893, 'X Gon\' Give It To Ya', 'DMX', '', '', 2003),
(894, 'Cake By The Ocean', 'DNCE', '', '', 2016),
(895, 'U Know What\'s Up', 'Donell Jones', '', '', 2000),
(896, 'Where I Wanna Be', 'Donell Jones', '', '', 2000),
(897, 'Ice Cream Paint Job', 'Dorrough', '', '', 2009),
(898, 'Lean Like A Cholo', 'Down Aka Kilo', '', '', 2007),
(899, 'The Next Episode', 'Dr Dre & Snoop Dogg', '', '', 2000),
(900, 'Forgot About Dre', 'Dr Dre, Eminem & Skylar Grey', '', '', 2000),
(901, 'I Need A Doctor', 'Dr Dre, Eminem & Skylar Grey', '', '', 2011),
(902, 'Kush', 'Dr Dre, Snoop Dogg & Akon', '', '', 2010),
(903, 'Best I Ever Had', 'Drake', '', '', 2009),
(904, 'Over', 'Drake', '', '', 2010),
(905, 'Find Your Love', 'Drake', '', '', 2010),
(906, 'Fancy', 'Drake', '', '', 2010),
(907, 'Headlines', 'Drake', '', '', 2011),
(908, 'Started From The Bottom', 'Drake', '', '', 2013),
(909, '0 To 100 - The Catch Up', 'Drake', '', '', 2014),
(910, 'Energy', 'Drake', '', '', 2015),
(911, 'Hotline Bling', 'Drake', '', '', 2015),
(912, 'Back To Back', 'Drake', '', '', 2015),
(913, 'Summer Sixteen', 'Drake', '', '', 2016),
(914, 'Controlla', 'Drake', '', '', 2016),
(915, 'Hype', 'Drake', '', '', 2016),
(916, 'Fake Love', 'Drake', '', '', 2016),
(917, 'Passionfruit', 'Drake', '', '', 2017),
(918, 'Blem', 'Drake', '', '', 2017),
(919, 'Signs', 'Drake', '', '', 2017),
(920, 'Jumpman', 'Drake & Future', '', '', 2015),
(921, 'Miss Me', 'Drake & Lil\' Wayne', '', '', 2010),
(922, 'The Motto', 'Drake & Lil\' Wayne', '', '', 2011),
(923, 'Hold On, We\'re Going Home', 'Drake & Majid Jordan', '', '', 2013),
(924, 'Make Me Proud', 'Drake & Nicki Minaj', '', '', 2011),
(925, 'Take Care', 'Drake & Rihanna', '', '', 2011),
(926, 'Too Good', 'Drake & Rihanna', '', '', 2016),
(927, 'Pop Style', 'Drake & The Throne', '', '', 2016),
(928, 'Successful', 'Drake & Trey Songz', '', '', 2009),
(929, 'Portland', 'Drake, Quavo & Travi$ Scott', '', '', 2017),
(930, 'One Dance', 'Drake, Wizkid & Kyla', '', '', 2016),
(931, 'He Loves U Not', 'Dream', '', '', 2000),
(932, 'I Should Be...', 'Dru Hill', '', '', 2003),
(933, 'New Rules', 'Dua Lipa', '', '', 2017),
(934, 'Barbra Streisand', 'Duck Sauce', '', '', 2010),
(935, 'Mercy', 'Duffy', '', '', 2008),
(936, 'Small Town Boy', 'Dustin Lynch', '', '', 2017),
(937, 'Tell Me When To Go', 'E-40 Featuring Keak Da Sneak', '', '', 2006),
(938, 'U & Dat', 'E-40, T-Pain & Kandi Girl', '', '', 2006),
(939, 'F**k it (I Don\'t Want You Back)', 'Eamon', '', '', 2004),
(940, 'Cool Kids', 'Echosmith', '', '', 2014),
(941, 'The \'A\' Team', 'Ed Sheeran', '', '', 2012),
(942, 'I See Fire', 'Ed Sheeran', '', '', 2014),
(943, 'Sing', 'Ed Sheeran', '', '', 2014),
(944, 'Thinking Out Loud', 'Ed Sheeran', '', '', 2014),
(945, 'Photograph', 'Ed Sheeran', '', '', 2015),
(946, 'Shape Of You', 'Ed Sheeran', '', '', 2017),
(947, 'Castle On The Hill', 'Ed Sheeran', '', '', 2017),
(948, 'Galway Girl', 'Ed Sheeran', '', '', 2017),
(949, 'Perfect', 'Ed Sheeran', '', '', 2017),
(950, 'Get Over Yourself', 'Eden\'s Crush', '', '', 2001),
(951, 'Stereo Love', 'Edward Maya', '', '', 2010),
(952, 'Blue (Da Ba Dee)', 'Eiffel 65', '', '', 2000),
(953, 'Crazy Girl', 'Eli Young Band', '', '', 2011),
(954, 'Even If It Breaks Your Heart', 'Eli Young Band', '', '', 2012),
(955, 'Ghost', 'Ella Henderson', '', '', 2014),
(956, 'Ex\'s & Oh\'s', 'Elle King', '', '', 2015),
(957, 'Lights', 'Ellie Goulding', '', '', 2012),
(958, 'Anything Could Happen', 'Ellie Goulding', '', '', 2012),
(959, 'Burn', 'Ellie Goulding', '', '', 2013),
(960, 'Love Me Like You Do', 'Ellie Goulding', '', '', 2015),
(961, 'On My Mind', 'Ellie Goulding', '', '', 2015),
(962, 'Wait For You', 'Elliott Yamin', '', '', 2007),
(963, 'A Little Less Conversation', 'Elvis Presley', '', 'Pop', 2002),
(964, 'Read All About It (Pt. III)', 'Emeli Sande', '', '', 2012),
(965, 'Next To Me', 'Emeli Sande', '', '', 2013),
(966, 'I Should Be Sleeping', 'Emerson Drive', '', '', 2002);
INSERT INTO `songs` (`song_id`, `song_name`, `song_artist`, `song_album`, `song_genre`, `song_year`) VALUES
(967, 'Fall Into Me', 'Emerson Drive', '', '', 2003),
(968, 'Jungle Drum', 'Emiliana Torrini', '', '', 2009),
(969, 'The Real Slim Shady', 'Eminem', 'The Marshall Mathers LP', 'Rap', 2000),
(970, 'The Way I Am', 'Eminem', 'The Marshall Mathers LP', 'Rap', 2000),
(971, 'Without Me', 'Eminem', 'The Eminem Show', 'Rap', 2002),
(972, 'Cleanin\' Out My Closet', 'Eminem', 'Encore', 'Rap', 2002),
(973, 'Lose Yourself', 'Eminem', 'Encore', 'Rap', 2002),
(974, 'Superman', 'Eminem', 'The Eminem Show', 'Rap', 2003);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `djname` varchar(100) DEFAULT NULL COMMENT 'Store the users DJ Name',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `current_session_id` int(11) DEFAULT NULL COMMENT 'Currently running session attached to this user. ',
  `is_admin` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `djname`, `created_at`, `current_session_id`, `is_admin`) VALUES
(7, 'Josh', '$2y$10$Ry2zVNurJh/cPzg8uTsbYeirkwrcFgtq6ncGmIK5E/YqjN0wHKunS', 'The Badger', '2017-12-27 11:44:55', 1, 1),
(8, 'Test Account', '$2y$10$vLeO06vkijOP30uG1NyL0OQSCbwVqvhivzmZmaRRhyKmj37.JgSzq', 'The Woman', '2017-12-27 12:57:55', 1, 0),
(9, 'Darius', '$2y$10$2nFTEr5uivUp8gAi6/FcrekOuRp.IOf/9eV8glr4/s7C6pKvpy19u', 'Big D', '2017-12-27 14:11:25', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `zone_id` int(11) NOT NULL COMMENT 'Zone ID',
  `zone_name` text NOT NULL COMMENT 'Zone Name',
  `zone_description` text NOT NULL COMMENT 'Zone Description'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `request_song_id` (`request_song_id`),
  ADD KEY `request_session_id` (`request_zone_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `sessionzone`
--
ALTER TABLE `sessionzone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`song_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`zone_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Request ID.', AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Session ID', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sessionzone`
--
ALTER TABLE `sessionzone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'link id';

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=975;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `zone_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Zone ID', AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `SessionsIDFK` FOREIGN KEY (`request_zone_id`) REFERENCES `sessions` (`session_id`),
  ADD CONSTRAINT `SongIDFK` FOREIGN KEY (`request_song_id`) REFERENCES `songs` (`song_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
