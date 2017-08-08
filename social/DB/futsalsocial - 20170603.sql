-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 03, 2017 at 01:26 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `futsalsocial`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `member_name` varchar(150) NOT NULL,
  `member_image` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `team_id`, `member_name`, `member_image`, `username`, `password`, `email`) VALUES
(1, 0, 'Vian', '', 'vian123', '355bd34540f4a0f0ce321f42c1b66b98', 'vian@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `member_post`
--

CREATE TABLE IF NOT EXISTS `member_post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `post_description` text NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `member_post`
--

INSERT INTO `member_post` (`post_id`, `member_id`, `post_description`) VALUES
(1, 1, 'coba ya'),
(2, 1, 'hai'),
(3, 1, 'halo');

-- --------------------------------------------------------

--
-- Table structure for table `member_post_comment`
--

CREATE TABLE IF NOT EXISTS `member_post_comment` (
  `post_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `comment_description` text NOT NULL,
  PRIMARY KEY (`post_comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `member_post_comment`
--

INSERT INTO `member_post_comment` (`post_comment_id`, `post_id`, `member_id`, `comment_description`) VALUES
(1, 1, 1, 'hi\nff');

-- --------------------------------------------------------

--
-- Table structure for table `member_post_like`
--

CREATE TABLE IF NOT EXISTS `member_post_like` (
  `post_like_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`post_like_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `team_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(150) NOT NULL,
  `team_description` text NOT NULL,
  `team_image` text NOT NULL,
  `team_banner` text NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `team_challenge`
--

CREATE TABLE IF NOT EXISTS `team_challenge` (
  `id_challenge` int(11) NOT NULL AUTO_INCREMENT,
  `inviter_team` int(11) NOT NULL,
  `rival_team` int(11) NOT NULL,
  `inviter_score` int(11) NOT NULL,
  `rival_score` int(11) NOT NULL,
  `status_challenge` int(1) NOT NULL,
  PRIMARY KEY (`id_challenge`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `team_notif`
--

CREATE TABLE IF NOT EXISTS `team_notif` (
  `notif_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `notif_detail` varchar(200) NOT NULL,
  `notif_status` int(1) NOT NULL,
  PRIMARY KEY (`notif_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
