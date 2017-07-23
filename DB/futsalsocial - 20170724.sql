-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2017 at 01:12 AM
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

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `rownum`() RETURNS int(11)
BEGIN
  set @prvrownum=if(@ranklastrun=CURTIME(6),@prvrownum+1,1);
  set @ranklastrun=CURTIME(6);
  RETURN @prvrownum;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `team_challenge_count`( team_id int(11) ) RETURNS int(11)
BEGIN 
  DECLARE total int(11);
  SET total = ( SELECT count(*) FROM team_challenge WHERE ( inviter_team = team_id OR rival_team = team_id ) AND status_challenge = 5 );
  RETURN total;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `team_inviter_point`( team_id int(11) ) RETURNS int(11)
BEGIN 
  DECLARE total int(11);
  SET total = ( SELECT CASE WHEN SUM(inviter_point) IS NULL THEN 0 ELSE SUM(inviter_point) END FROM team_challenge WHERE inviter_team = team_id AND status_challenge = 5 );
  RETURN total;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `team_inviter_score`( team_id int(11) ) RETURNS int(11)
BEGIN 
  DECLARE total int(11);
  SET total = ( SELECT CASE WHEN SUM(inviter_score) IS NULL THEN 0 ELSE SUM(inviter_score) END FROM team_challenge WHERE inviter_team = team_id AND status_challenge = 5 );
  RETURN total;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `team_rival_point`( team_id int(11) ) RETURNS int(11)
BEGIN 
  DECLARE total int(11);
  SET total = ( SELECT CASE WHEN SUM(rival_point) IS NULL THEN 0 ELSE SUM(rival_point) END FROM team_challenge WHERE rival_team = team_id AND status_challenge = 5 );
  RETURN total;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `team_rival_score`( team_id int(11) ) RETURNS int(11)
BEGIN 
  DECLARE total int(11);
  SET total = ( SELECT CASE WHEN SUM(rival_score) IS NULL THEN 0 ELSE SUM(rival_score) END FROM team_challenge WHERE rival_team = team_id AND status_challenge = 5 );
  RETURN total;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `foto_lapangan`
--

CREATE TABLE IF NOT EXISTS `foto_lapangan` (
  `id_tipe_lapangan` varchar(50) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE IF NOT EXISTS `lapangan` (
  `id` varchar(11) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `deskripsi` varchar(150) DEFAULT NULL,
  `daerah` varchar(50) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `long` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `parameter_daerah_kota` (`daerah`,`kota`),
  KEY `parameter_join` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id`, `nama`, `deskripsi`, `daerah`, `kota`, `picture`, `lat`, `long`) VALUES
('LP1703001', 'raya futsal', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'kemayoran', 'Jakarta Pusat', 'assets/img/lapangan/raya_futsal.jpg', '-6.260272', '106.780946'),
('LP1703002', 'indo futsal', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'sunter', 'Jakarta Utara', 'assets/img/lapangan/indo_futsal.jpg', '-6.326825', '106.746659'),
('LP1703003', 'yes futsal', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'ancol', 'Jakarta Utara', 'assets/img/lapangan/yes_futsal.jpg', '-6.185704', '106.903613');

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE IF NOT EXISTS `login_log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `login_datetime` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `login_log`
--

INSERT INTO `login_log` (`id_log`, `member_id`, `ip_address`, `login_datetime`, `status`) VALUES
(1, 3, '::1', '2017-07-23 21:09:22', 1),
(2, 1, '::1', '2017-07-23 17:22:17', 0),
(3, 3, '::1', '2017-07-23 21:09:22', 1),
(4, 3, '::1', '2017-07-23 21:09:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `member_name` varchar(150) NOT NULL,
  `member_image` text NOT NULL,
  `member_banner` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_team_admin` int(1) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `team_id`, `member_name`, `member_image`, `member_banner`, `username`, `password`, `email`, `is_team_admin`) VALUES
(1, 1, 'Vian', 'profil1.jpg', 'banner11.PNG', 'vian123', '355bd34540f4a0f0ce321f42c1b66b98', 'vian@gmail.com', 1),
(2, 1, 'Reno', '', '', 'reno123', 'f98a4d4ef820d9f217ca496518607649', 'reno@yahoo.com', 0),
(3, 2, 'Rian', '13385671_652412064911444_407033444_n_(1).jpg', '', 'rian123', '26ed30f28908645239254ff4f88c1b75', 'rian@yahoo.com', 1),
(4, 3, 'Vero', '', '', 'vero123', 'c2dfee78ffc7b5dc9e6268d7aa721a56', 'vero@yahoo.com', 1),
(5, 10, 'Taro', '', '', 'taro123', '80e14bdc86dcdc4a2aab4da1da778b54', 'taro@yahoo.com', 0),
(6, 11, 'Atan', '', '', 'atan123', '2a9a1faecd6ac0398ed8a7d07535ca1b', 'atan@yahoo.com', 0),
(7, 12, 'Bagas', '', '', 'bagas123', '5ffd9bb73b00bce4feeb77e2d12722da', 'bagas@yahoo.com', 0),
(8, 13, 'a123', '', '', 'a123', '0cc175b9c0f1b6a831c399e269772661', 'a@yahoo.com', 0),
(9, 14, 'Reno', '', '', 'b123', '0cc175b9c0f1b6a831c399e269772661', 'reno@yahoo.com', 0),
(10, 15, 'Rian', '', '', 'c123', '0cc175b9c0f1b6a831c399e269772661', 'rian@yahoo.com', 1),
(11, 16, 'Vero', '', '', 'd123', '0cc175b9c0f1b6a831c399e269772661', 'vero@yahoo.com', 1),
(12, 17, 'Taro', '', '', 'e123', '0cc175b9c0f1b6a831c399e269772661', 'taro@yahoo.com', 0),
(13, 18, 'Atan', '', '', 'f123', '0cc175b9c0f1b6a831c399e269772661', 'atan@yahoo.com', 0),
(14, 19, 'Bagas', '', '', 'g123', '0cc175b9c0f1b6a831c399e269772661', 'bagas@yahoo.com', 0),
(15, 20, 'Taro', '', '', 'h123', '0cc175b9c0f1b6a831c399e269772661', 'taro@yahoo.com', 0),
(16, 21, 'Atan', '', '', 'i123', '0cc175b9c0f1b6a831c399e269772661', 'atan@yahoo.com', 0),
(17, 22, 'Taro', '', '', 'j123', '0cc175b9c0f1b6a831c399e269772661', 'taro@yahoo.com', 0),
(18, 23, 'Atan', '', '', 'k123', '0cc175b9c0f1b6a831c399e269772661', 'atan@yahoo.com', 0),
(19, 24, 'Taro', '', '', 'l123', '0cc175b9c0f1b6a831c399e269772661', 'taro@yahoo.com', 0),
(20, 25, 'Atan', '', '', 'm123', '0cc175b9c0f1b6a831c399e269772661', 'atan@yahoo.com', 0),
(21, 26, 'Taro', '', '', 'n123', '0cc175b9c0f1b6a831c399e269772661', 'taro@yahoo.com', 0),
(22, 0, 'Atan', '', '', 'o123', '0cc175b9c0f1b6a831c399e269772661', 'atan@yahoo.com', 0),
(23, 0, 'Taro', '', '', 'p123', '0cc175b9c0f1b6a831c399e269772661', 'taro@yahoo.com', 0),
(24, 0, 'Atan', '', '', 'q123', '0cc175b9c0f1b6a831c399e269772661', 'atan@yahoo.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member_challenge_comment`
--

CREATE TABLE IF NOT EXISTS `member_challenge_comment` (
  `challenge_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `challenge_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `comment_description` text NOT NULL,
  `comment_created` datetime NOT NULL,
  PRIMARY KEY (`challenge_comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `member_challenge_comment`
--

INSERT INTO `member_challenge_comment` (`challenge_comment_id`, `challenge_id`, `member_id`, `comment_description`, `comment_created`) VALUES
(12, 19, 4, 'a', '2017-07-01 14:39:10'),
(13, 19, 3, 'b', '2017-07-01 14:53:41'),
(14, 19, 1, 'hai', '2017-07-09 14:00:16'),
(15, 19, 1, 'tes', '2017-07-09 14:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `member_chat`
--

CREATE TABLE IF NOT EXISTS `member_chat` (
  `member_chat_id` int(11) NOT NULL AUTO_INCREMENT,
  `chat_group_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `member_partner_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`member_chat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `member_chat`
--

INSERT INTO `member_chat` (`member_chat_id`, `chat_group_id`, `member_id`, `member_partner_id`, `status`, `created_date`) VALUES
(2, 0, 1, 3, 0, '2017-07-23 21:09:06'),
(3, 0, 1, 4, 0, '2017-07-23 22:20:12'),
(5, 2, 0, 0, 0, '2017-07-23 23:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `member_chat_detail`
--

CREATE TABLE IF NOT EXISTS `member_chat_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_chat_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `detail_chat` text NOT NULL,
  `detail_status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`detail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `member_chat_detail`
--

INSERT INTO `member_chat_detail` (`detail_id`, `member_chat_id`, `member_id`, `detail_chat`, `detail_status`, `created_date`) VALUES
(1, 2, 1, 'tes', 0, '2017-07-23 21:59:53'),
(2, 2, 3, 'hai', 0, '2017-07-23 22:03:34'),
(3, 2, 1, 'halo', 0, '2017-07-23 22:03:39'),
(4, 2, 1, 'haaaiii', 0, '2017-07-23 22:06:27'),
(5, 2, 1, 'helloooww', 0, '2017-07-23 22:06:55'),
(6, 2, 3, 'haaiii', 0, '2017-07-23 22:07:05'),
(7, 3, 1, 'hai', 0, '2017-07-23 22:31:34'),
(8, 3, 1, 'hhmm', 0, '2017-07-23 22:31:51'),
(9, 2, 1, 'heloow', 0, '2017-07-23 22:33:34'),
(10, 4, 3, 'apo', 0, '2017-07-23 23:07:23'),
(11, 5, 3, 'aop', 0, '2017-07-23 23:08:54'),
(12, 5, 1, 'yaa oke', 0, '2017-07-23 23:49:37'),
(13, 5, 1, 'hhmm', 0, '2017-07-23 23:51:29'),
(14, 5, 3, 'apa si', 0, '2017-07-23 23:51:35'),
(15, 5, 1, 'hahaha', 0, '2017-07-23 23:51:39'),
(16, 5, 3, 'tes aja cuy', 0, '2017-07-23 23:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `member_chat_group`
--

CREATE TABLE IF NOT EXISTS `member_chat_group` (
  `chat_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(150) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`chat_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `member_chat_group`
--

INSERT INTO `member_chat_group` (`chat_group_id`, `group_name`, `status`, `created_date`) VALUES
(2, '', 0, '2017-07-23 23:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `member_chat_group_detail`
--

CREATE TABLE IF NOT EXISTS `member_chat_group_detail` (
  `group_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `chat_group_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`group_detail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `member_chat_group_detail`
--

INSERT INTO `member_chat_group_detail` (`group_detail_id`, `chat_group_id`, `member_id`, `status`, `created_date`) VALUES
(2, 2, 1, 0, '2017-07-23 23:08:54'),
(3, 2, 2, 0, '2017-07-23 23:08:54'),
(4, 2, 3, 0, '2017-07-23 23:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `member_friend`
--

CREATE TABLE IF NOT EXISTS `member_friend` (
  `member_friend_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `request_from` int(11) NOT NULL,
  `friend_status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`member_friend_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `member_friend`
--

INSERT INTO `member_friend` (`member_friend_id`, `member_id`, `request_from`, `friend_status`, `created_date`, `modified_date`) VALUES
(2, 3, 1, 1, '2017-07-23 04:07:11', '2017-07-23 10:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `member_post`
--

CREATE TABLE IF NOT EXISTS `member_post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `post_description` text NOT NULL,
  `post_created` datetime NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `member_post`
--

INSERT INTO `member_post` (`post_id`, `member_id`, `post_description`, `post_created`) VALUES
(36, 1, 'a', '2017-07-01 09:45:23'),
(37, 1, 'b', '2017-07-01 09:45:31'),
(38, 3, 'c', '2017-07-01 09:45:34'),
(39, 3, 'd', '2017-07-01 09:48:40'),
(40, 3, 'e', '2017-07-01 09:49:19'),
(41, 3, 'f', '2017-07-01 09:50:44'),
(42, 3, 'g', '2017-07-01 09:51:45'),
(43, 1, 'xoxo', '2017-07-09 13:27:36'),
(44, 3, 'tes', '2017-07-12 10:21:14'),
(45, 3, 'coba', '2017-07-12 10:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `member_post_comment`
--

CREATE TABLE IF NOT EXISTS `member_post_comment` (
  `post_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `comment_description` text NOT NULL,
  `comment_created` datetime NOT NULL,
  PRIMARY KEY (`post_comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `member_post_comment`
--

INSERT INTO `member_post_comment` (`post_comment_id`, `post_id`, `member_id`, `comment_description`, `comment_created`) VALUES
(31, 42, 1, 'a', '2017-07-01 13:10:19'),
(32, 42, 1, 'b', '2017-07-01 13:10:56'),
(33, 42, 3, 'hai', '2017-07-09 11:47:47'),
(34, 42, 1, 'tes ya', '2017-07-09 11:53:51'),
(35, 42, 1, 'coba', '2017-07-09 13:24:08');

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
-- Table structure for table `notifikasi`
--

CREATE TABLE IF NOT EXISTS `notifikasi` (
  `notif_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `notif_type` int(11) NOT NULL,
  `notif_detail` varchar(255) NOT NULL,
  `notif_url` varchar(255) NOT NULL,
  `notif_status` int(1) NOT NULL,
  `notif_created` datetime NOT NULL,
  `notif_show` int(1) NOT NULL,
  PRIMARY KEY (`notif_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=264 ;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`notif_id`, `member_id`, `notif_type`, `notif_detail`, `notif_url`, `notif_status`, `notif_created`, `notif_show`) VALUES
(8, 2, 1, '"Team Coba" mengundang Anda untuk bergabung dalam tim.', 'http://localhost/futsalsocial/notif/team_request/1679091c5a880faf6fb5e6087eb1b2dc', 1, '2017-06-06 01:18:36', 0),
(11, 1, 2, 'Reno telah menerima permintaan Anda untuk bergabung dalam tim.', 'http://localhost/futsalsocial/notif/team_request/1679091c5a880faf6fb5e6087eb1b2dc', 1, '2017-06-06 01:42:31', 0),
(16, 4, 4, 'Tim "Team Halo" mengundang tim Anda untuk melakukan pertandingan.', 'http://localhost/futsalsocial/notif/detail_challenge/d3d9446802a44259755d38e6d163e820', 1, '2017-06-10 10:20:53', 0),
(17, 3, 4, 'Tim "Team Halo" mengundang tim Anda untuk melakukan pertandingan.', 'http://localhost/futsalsocial/notif/detail_challenge/aab3238922bcc25a6f606eb525ffdc56', 1, '2017-06-10 17:07:54', 0),
(21, 4, 9, 'Tim "Team Coba" mengajukan score challenge.', 'http://localhost/futsalsocial/notif/detail_score_challenge/d3d9446802a44259755d38e6d163e820', 1, '2017-06-15 18:15:29', 0),
(25, 1, 10, 'Tim "Team Halods" mengajukan revisi untuk score challenge.', 'http://localhost/futsalsocial/notif/detail_score_challenge/d3d9446802a44259755d38e6d163e820', 1, '2017-06-15 18:49:00', 0),
(26, 2, 10, 'Tim "Team Halods" mengajukan revisi untuk score challenge.', 'http://localhost/futsalsocial/notif/detail_score_challenge/d3d9446802a44259755d38e6d163e820', 0, '2017-06-15 18:49:00', 0),
(27, 4, 9, 'Tim "Team Coba" mengajukan score challenge.', 'http://localhost/futsalsocial/notif/detail_score_challenge/d3d9446802a44259755d38e6d163e820', 1, '2017-06-15 18:49:16', 0),
(28, 1, 10, 'Tim "Team Halods" mengajukan revisi untuk score challenge.', 'http://localhost/futsalsocial/notif/detail_score_challenge/d3d9446802a44259755d38e6d163e820', 1, '2017-06-15 18:49:37', 0),
(29, 2, 10, 'Tim "Team Halods" mengajukan revisi untuk score challenge.', 'http://localhost/futsalsocial/notif/detail_score_challenge/d3d9446802a44259755d38e6d163e820', 0, '2017-06-15 18:49:37', 0),
(31, 4, 11, 'Score challenge telah disetujui', 'http://localhost/futsalsocial/notif/detail_score_challenge/d3d9446802a44259755d38e6d163e820', 1, '2017-06-15 19:03:55', 0),
(32, 3, 4, 'Tim "Team Coba" mengundang tim Anda untuk melakukan pertandingan.', 'http://localhost/futsalsocial/notif/detail_challenge/9bf31c7ff062936a96d3c8bd1f8f2ff3', 1, '2017-06-17 01:10:34', 0),
(33, 1, 5, 'Tim "Team Coba Coba" mengajukan revisi.', 'http://localhost/futsalsocial/notif/detail_revisi_challenge/9bf31c7ff062936a96d3c8bd1f8f2ff3', 1, '2017-06-17 01:12:35', 1),
(37, 3, 12, 'Tim "Team Coba Coba" merubah challenge.', 'http://localhost/futsalsocial/notif/detail_challenge/9bf31c7ff062936a96d3c8bd1f8f2ff3', 1, '2017-06-18 20:48:50', 0),
(86, 6, 1, '"Team Coba" mengundang Anda untuk bergabung dalam tim.', 'http://localhost/futsalsocial/notif/team_request/02e74f10e0327ad868d138f2b4fdd6f0', 1, '2017-06-29 08:30:37', 0),
(88, 1, 3, 'Atan menolak permintaan Anda untuk bergabung dalam tim.', 'http://localhost/futsalsocial/notif/team_request/02e74f10e0327ad868d138f2b4fdd6f0', 1, '2017-06-29 08:32:25', 0),
(92, 3, 4, 'Tim "Team Coba" mengundang tim Anda untuk melakukan pertandingan.', 'http://localhost/futsalsocial/notif/detail_challenge/1f0e3dad99908345f7439f8ffabdffc4', 1, '2017-06-29 08:46:56', 0),
(109, 1, 5, 'Tim "Team Coba Coba" mengajukan revisi.', 'http://localhost/futsalsocial/notif/detail_revisi_challenge/1f0e3dad99908345f7439f8ffabdffc4', 1, '2017-06-29 13:46:28', 0),
(110, 2, 5, 'Tim "Team Coba Coba" mengajukan revisi.', 'http://localhost/futsalsocial/notif/detail_revisi_challenge/1f0e3dad99908345f7439f8ffabdffc4', 0, '2017-06-29 13:46:28', 0),
(111, 3, 6, 'Tim "Team Coba" telah merubah pertandingan.', 'http://localhost/futsalsocial/notif/detail_challenge/1f0e3dad99908345f7439f8ffabdffc4', 1, '2017-06-29 14:03:48', 0),
(120, 1, 9, 'Tim "Team Coba Coba" menyetujui pertandingan.', 'http://localhost/futsalsocial/notif/detail_challenge/1f0e3dad99908345f7439f8ffabdffc4', 1, '2017-06-29 14:30:50', 0),
(121, 2, 9, 'Tim "Team Coba Coba" menyetujui pertandingan.', 'http://localhost/futsalsocial/notif/detail_challenge/1f0e3dad99908345f7439f8ffabdffc4', 0, '2017-06-29 14:30:50', 0),
(130, 3, 4, 'Tim "Team Coba" mengundang tim Anda untuk melakukan pertandingan.', 'http://localhost/futsalsocial/notif/detail_challenge/33e75ff09dd601bbe69f351039152189', 1, '2017-06-30 01:40:57', 0),
(131, 1, 5, 'Tim "Team Coba Coba" mengajukan revisi.', 'http://localhost/futsalsocial/notif/detail_revisi_challenge/33e75ff09dd601bbe69f351039152189', 1, '2017-06-30 02:32:24', 0),
(132, 2, 5, 'Tim "Team Coba Coba" mengajukan revisi.', 'http://localhost/futsalsocial/notif/detail_revisi_challenge/33e75ff09dd601bbe69f351039152189', 0, '2017-06-30 02:32:24', 0),
(138, 3, 6, 'Tim "Team Coba" telah merubah pertandingan.', 'http://localhost/futsalsocial/notif/detail_challenge/33e75ff09dd601bbe69f351039152189', 1, '2017-06-30 06:33:34', 0),
(139, 1, 5, 'Tim "Team Coba Coba" mengajukan revisi.', 'http://localhost/futsalsocial/notif/detail_revisi_challenge/33e75ff09dd601bbe69f351039152189', 1, '2017-06-30 06:35:43', 0),
(140, 2, 5, 'Tim "Team Coba Coba" mengajukan revisi.', 'http://localhost/futsalsocial/notif/detail_revisi_challenge/33e75ff09dd601bbe69f351039152189', 0, '2017-06-30 06:35:43', 0),
(141, 3, 8, 'Tim "Team Coba" membatalkan pertandingan.', 'http://localhost/futsalsocial/notif/detail_challenge/33e75ff09dd601bbe69f351039152189', 1, '2017-06-30 06:36:05', 0),
(143, 2, 11, 'Tim "Team Coba Coba" mengajukan score pertandingan.', 'http://localhost/futsalsocial/notif/detail_score_challenge/6512bd43d9caa6e02c990b0a82652dca', 0, '2017-06-30 06:50:21', 0),
(144, 3, 4, 'Tim "Team Coba" mengundang tim Anda untuk melakukan pertandingan.', 'http://localhost/futsalsocial/notif/detail_challenge/6ea9ab1baa0efb9e19094440c317e21b', 1, '2017-06-30 06:58:19', 0),
(145, 1, 11, 'Tim "Team Coba Coba" mengajukan score pertandingan.', 'http://localhost/futsalsocial/notif/detail_score_challenge/6512bd43d9caa6e02c990b0a82652dca', 1, '2017-06-30 07:08:35', 0),
(146, 2, 11, 'Tim "Team Coba Coba" mengajukan score pertandingan.', 'http://localhost/futsalsocial/notif/detail_score_challenge/6512bd43d9caa6e02c990b0a82652dca', 0, '2017-06-30 07:08:35', 0),
(148, 1, 11, 'Tim "Team Coba Coba" mengajukan score pertandingan.', 'http://localhost/futsalsocial/notif/detail_score_challenge/6512bd43d9caa6e02c990b0a82652dca', 1, '2017-06-30 07:33:23', 0),
(149, 2, 11, 'Tim "Team Coba Coba" mengajukan score pertandingan.', 'http://localhost/futsalsocial/notif/detail_score_challenge/6512bd43d9caa6e02c990b0a82652dca', 0, '2017-06-30 07:33:23', 0),
(150, 3, 12, 'Tim "Team Coba" mengajukan revisi untuk score pertandingan.', 'http://localhost/futsalsocial/notif/detail_score_challenge/6512bd43d9caa6e02c990b0a82652dca', 1, '2017-06-30 07:33:31', 0),
(151, 1, 13, 'Score pertandingan telah disetujui.', 'http://localhost/futsalsocial/notif/detail_score_challenge/6512bd43d9caa6e02c990b0a82652dca', 1, '2017-06-30 07:34:01', 0),
(152, 2, 13, 'Score pertandingan telah disetujui.', 'http://localhost/futsalsocial/notif/detail_score_challenge/6512bd43d9caa6e02c990b0a82652dca', 0, '2017-06-30 07:34:01', 0),
(193, 3, 14, 'Vian mengomentari post Anda.', 'http://localhost/futsalsocial/social/detail_post/a1d0c6e83f027327d8461063f4ac58a6', 1, '2017-07-01 13:10:19', 0),
(194, 3, 14, 'Vian mengomentari post Anda.', 'http://localhost/futsalsocial/social/detail_post/a1d0c6e83f027327d8461063f4ac58a6', 0, '2017-07-01 13:10:56', 0),
(217, 1, 15, 'Vero mengomentari challenge tim Anda.', 'http://localhost/futsalsocial/team/detail_challenge/1f0e3dad99908345f7439f8ffabdffc4', 0, '2017-07-01 14:39:10', 0),
(218, 2, 15, 'Vero mengomentari challenge tim Anda.', 'http://localhost/futsalsocial/team/detail_challenge/1f0e3dad99908345f7439f8ffabdffc4', 0, '2017-07-01 14:39:10', 0),
(219, 3, 15, 'Vero mengomentari challenge tim Anda.', 'http://localhost/futsalsocial/team/detail_challenge/1f0e3dad99908345f7439f8ffabdffc4', 1, '2017-07-01 14:39:10', 0),
(220, 1, 15, 'Rian mengomentari challenge tim Anda.', 'http://localhost/futsalsocial/team/detail_challenge/1f0e3dad99908345f7439f8ffabdffc4', 0, '2017-07-01 14:53:41', 0),
(221, 2, 15, 'Rian mengomentari challenge tim Anda.', 'http://localhost/futsalsocial/team/detail_challenge/1f0e3dad99908345f7439f8ffabdffc4', 0, '2017-07-01 14:53:41', 0),
(222, 3, 15, 'Rian mengomentari challenge tim Anda.', 'http://localhost/futsalsocial/team/detail_challenge/1f0e3dad99908345f7439f8ffabdffc4', 1, '2017-07-01 14:53:41', 0),
(223, 1, 16, 'Rian membalas komentar Anda.', 'http://localhost/futsalsocial/social/detail_post/a1d0c6e83f027327d8461063f4ac58a6', 0, '2017-07-09 11:47:47', 0),
(224, 3, 14, 'Vian mengomentari post Anda.', 'http://localhost/futsalsocial/social/detail_post/a1d0c6e83f027327d8461063f4ac58a6', 0, '2017-07-09 11:53:51', 0),
(225, 3, 14, 'Vian mengomentari post Anda.', 'http://localhost/futsalsocial/social/detail_post/a1d0c6e83f027327d8461063f4ac58a6', 0, '2017-07-09 13:24:08', 0),
(226, 1, 15, 'Vian mengomentari challenge tim Anda.', 'http://localhost/futsalsocial/team/detail_challenge/1f0e3dad99908345f7439f8ffabdffc4', 0, '2017-07-09 14:00:16', 0),
(227, 2, 15, 'Vian mengomentari challenge tim Anda.', 'http://localhost/futsalsocial/team/detail_challenge/1f0e3dad99908345f7439f8ffabdffc4', 0, '2017-07-09 14:00:16', 0),
(228, 3, 15, 'Vian mengomentari challenge tim Anda.', 'http://localhost/futsalsocial/team/detail_challenge/1f0e3dad99908345f7439f8ffabdffc4', 0, '2017-07-09 14:00:16', 0),
(229, 1, 15, 'Vian mengomentari challenge tim Anda.', 'http://localhost/futsalsocial/team/detail_challenge/1f0e3dad99908345f7439f8ffabdffc4', 0, '2017-07-09 14:00:38', 0),
(230, 2, 15, 'Vian mengomentari challenge tim Anda.', 'http://localhost/futsalsocial/team/detail_challenge/1f0e3dad99908345f7439f8ffabdffc4', 0, '2017-07-09 14:00:38', 0),
(231, 3, 15, 'Vian mengomentari challenge tim Anda.', 'http://localhost/futsalsocial/team/detail_challenge/1f0e3dad99908345f7439f8ffabdffc4', 0, '2017-07-09 14:00:38', 0),
(232, 3, 4, 'Tim "Team Coba" mengundang tim Anda untuk melakukan pertandingan.', 'http://localhost/futsalsocial/notif/detail_challenge/34173cb38f07f89ddbebc2ac9128303f', 1, '2017-07-09 14:12:40', 0),
(233, 1, 5, 'Tim "Team Coba Coba" mengajukan revisi.', 'http://localhost/futsalsocial/notif/detail_revisi_challenge/34173cb38f07f89ddbebc2ac9128303f', 1, '2017-07-09 14:13:15', 0),
(234, 2, 5, 'Tim "Team Coba Coba" mengajukan revisi.', 'http://localhost/futsalsocial/notif/detail_revisi_challenge/34173cb38f07f89ddbebc2ac9128303f', 0, '2017-07-09 14:13:15', 0),
(235, 3, 11, 'Tim "Team Coba" mengajukan score pertandingan.', 'http://localhost/futsalsocial/notif/detail_score_challenge/9bf31c7ff062936a96d3c8bd1f8f2ff3', 1, '2017-07-09 14:38:29', 0),
(236, 3, 11, 'Tim "Team Coba" mengajukan score pertandingan.', 'http://localhost/futsalsocial/notif/detail_score_challenge/1f0e3dad99908345f7439f8ffabdffc4', 1, '2017-07-09 14:51:38', 0),
(237, 1, 12, 'Tim "Team Coba Coba" mengajukan revisi untuk score pertandingan.', 'http://localhost/futsalsocial/notif/detail_score_challenge/1f0e3dad99908345f7439f8ffabdffc4', 1, '2017-07-09 14:51:53', 0),
(238, 2, 12, 'Tim "Team Coba Coba" mengajukan revisi untuk score pertandingan.', 'http://localhost/futsalsocial/notif/detail_score_challenge/1f0e3dad99908345f7439f8ffabdffc4', 0, '2017-07-09 14:51:53', 0),
(239, 3, 13, 'Score pertandingan telah disetujui.', 'http://localhost/futsalsocial/notif/detail_score_challenge/1f0e3dad99908345f7439f8ffabdffc4', 1, '2017-07-09 14:51:59', 0),
(240, 3, 4, 'Tim "Team Coba" mengundang tim Anda untuk melakukan pertandingan.', 'http://localhost/futsalsocial/notif/detail_challenge/c16a5320fa475530d9583c34fd356ef5', 1, '2017-07-09 14:54:55', 0),
(241, 1, 9, 'Tim "Team Coba Coba" menyetujui pertandingan.', 'http://localhost/futsalsocial/notif/detail_challenge/c16a5320fa475530d9583c34fd356ef5', 1, '2017-07-09 14:55:04', 0),
(242, 2, 9, 'Tim "Team Coba Coba" menyetujui pertandingan.', 'http://localhost/futsalsocial/notif/detail_challenge/c16a5320fa475530d9583c34fd356ef5', 0, '2017-07-09 14:55:04', 0),
(243, 3, 11, 'Tim "Team Coba" mengajukan score pertandingan.', 'http://localhost/futsalsocial/notif/detail_score_challenge/c16a5320fa475530d9583c34fd356ef5', 1, '2017-07-09 14:57:16', 0),
(244, 1, 12, 'Tim "Team Coba Coba" mengajukan revisi untuk score pertandingan.', 'http://localhost/futsalsocial/notif/detail_score_challenge/c16a5320fa475530d9583c34fd356ef5', 1, '2017-07-09 14:57:38', 0),
(245, 2, 12, 'Tim "Team Coba Coba" mengajukan revisi untuk score pertandingan.', 'http://localhost/futsalsocial/notif/detail_score_challenge/c16a5320fa475530d9583c34fd356ef5', 0, '2017-07-09 14:57:38', 0),
(246, 3, 13, 'Score pertandingan telah disetujui.', 'http://localhost/futsalsocial/notif/detail_score_challenge/c16a5320fa475530d9583c34fd356ef5', 1, '2017-07-09 14:57:43', 0),
(247, 4, 4, 'Tim "Team Coba" mengundang tim Anda untuk melakukan pertandingan.', 'http://localhost/futsalsocial/notif/detail_challenge/6364d3f0f495b6ab9dcf8d3b5c6e0b01', 0, '2017-07-12 21:28:37', 0),
(248, 3, 4, 'Tim "Team Coba" mengundang tim Anda untuk melakukan pertandingan.', 'http://localhost/futsalsocial/notif/detail_challenge/182be0c5cdcd5072bb1864cdee4d3d6e', 1, '2017-07-23 03:50:50', 0),
(250, 3, 4, 'Tim "Team Coba" mengundang tim Anda untuk melakukan pertandingan.', 'http://localhost/futsalsocial/notif/detail_challenge/e369853df766fa44e1ed0ff613f563bd', 1, '2017-07-23 04:03:52', 0),
(251, 3, 18, 'Vian menambahkan Anda sebagai teman.', 'http://localhost/futsalsocial/member/profile/c4ca4238a0b923820dcc509a6f75849b', 1, '2017-07-23 04:07:11', 0),
(256, 1, 19, 'Rian menerima permintaan pertemanan Anda.', 'http://localhost/futsalsocial/member/profile/eccbc87e4b5ce2fe28308fd9f2a7baf3', 0, '2017-07-23 09:00:57', 0),
(259, 1, 5, 'Tim "Team Coba Coba" mengajukan revisi.', 'http://localhost/futsalsocial/notif/detail_revisi_challenge/e369853df766fa44e1ed0ff613f563bd', 1, '2017-07-23 23:08:54', 0),
(260, 2, 5, 'Tim "Team Coba Coba" mengajukan revisi.', 'http://localhost/futsalsocial/notif/detail_revisi_challenge/e369853df766fa44e1ed0ff613f563bd', 0, '2017-07-23 23:08:54', 0),
(261, 3, 6, 'Tim "Team Coba" telah merubah pertandingan.', 'http://localhost/futsalsocial/notif/detail_challenge/e369853df766fa44e1ed0ff613f563bd', 1, '2017-07-24 00:41:26', 0),
(262, 1, 9, 'Tim "Team Coba Coba" menyetujui pertandingan.', 'http://localhost/futsalsocial/notif/detail_challenge/e369853df766fa44e1ed0ff613f563bd', 0, '2017-07-24 00:41:38', 0),
(263, 2, 9, 'Tim "Team Coba Coba" menyetujui pertandingan.', 'http://localhost/futsalsocial/notif/detail_challenge/e369853df766fa44e1ed0ff613f563bd', 0, '2017-07-24 00:41:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notif_type`
--

CREATE TABLE IF NOT EXISTS `notif_type` (
  `notif_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `notif_type_name` varchar(100) NOT NULL,
  `notif_type_detail` varchar(255) NOT NULL,
  PRIMARY KEY (`notif_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `notif_type`
--

INSERT INTO `notif_type` (`notif_type_id`, `notif_type_name`, `notif_type_detail`) VALUES
(1, 'Undangan Bergabung ke Team', '"{team_name}" mengundang Anda untuk bergabung dalam tim.'),
(2, 'Undangan Bergabung Diterima', '{member_name} telah menerima permintaan Anda untuk bergabung dalam tim.'),
(3, 'Undangan Bergabung Ditolak', '{member_name} menolak permintaan Anda untuk bergabung dalam tim.'),
(4, 'Undangan Permintaan Challenge', 'Tim "{inviter_team_name}" mengundang tim Anda untuk melakukan pertandingan.'),
(5, 'Permintaan Revisi Challenge', 'Tim "{rival_team_name}" mengajukan revisi.'),
(6, 'Update Challenge oleh Inviter', 'Tim "{inviter_team_name}" telah merubah pertandingan.'),
(7, 'Challenge Ditolak', 'Tim "{rival_team_name}" menolak pertandingan.'),
(8, 'Challenge Dibatalkan', 'Tim "{inviter_team_name}" membatalkan pertandingan.'),
(9, 'Challenge Diterima', 'Tim "{rival_team_name}" menyetujui pertandingan.'),
(10, 'Reminder Input Score', ''),
(11, 'Pengajuan Score Challenge', 'Tim "{inviter_team_name}" mengajukan score pertandingan.'),
(12, 'Revisi Score Challenge', 'Tim "{team_name}" mengajukan revisi untuk score pertandingan.'),
(13, 'Score Challenge Disetujui', 'Score pertandingan telah disetujui.'),
(14, 'Comment Post Member', '{member_name} mengomentari post Anda.'),
(15, 'Comment Challenge', '{member_name} mengomentari challenge tim Anda.'),
(16, 'Balas Comment Post Member', '{member_name} membalas komentar Anda.'),
(17, 'Balas Comment Challenge', '{member_name} membalas komentar Anda.'),
(18, 'Permintaan Pertemanan', '{member_name} menambahkan Anda sebagai teman.'),
(19, 'Menerima Permintaan Pertemanan', '{member_name} menerima permintaan pertemanan Anda.');

-- --------------------------------------------------------

--
-- Table structure for table `rating_lapangan`
--

CREATE TABLE IF NOT EXISTS `rating_lapangan` (
  `id_lapangan` varchar(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `rating_sum` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_lapangan`
--

INSERT INTO `rating_lapangan` (`id_lapangan`, `id_user`, `rating_sum`) VALUES
('LP1703001', 1, 5),
('LP1703001', 2, 4),
('LP1703001', 3, 5),
('LP1703002', 1, 4),
('LP1703002', 3, 3),
('LP1703003', 2, 5),
('LP1703003', 3, 2),
('LP1703001', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ref_status_challenge`
--

CREATE TABLE IF NOT EXISTS `ref_status_challenge` (
  `status_challenge_id` int(11) NOT NULL,
  `status_challenge_name` varchar(150) NOT NULL,
  PRIMARY KEY (`status_challenge_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_status_challenge`
--

INSERT INTO `ref_status_challenge` (`status_challenge_id`, `status_challenge_name`) VALUES
(0, 'Menunggu balasan dari tim lawan'),
(1, 'Challenge diterima'),
(2, 'Challenge ditolak'),
(3, 'Revisi Challenge oleh Lawan'),
(4, 'Revisi Challenge oleh Tim Pengundang'),
(5, 'Challenge Selesai'),
(6, 'Challenge Dibatalkan'),
(7, 'Menunggu Approval Score oleh Tim Lawan'),
(8, 'Update Score oleh Tim Lawan');

-- --------------------------------------------------------

--
-- Table structure for table `status_lapangan`
--

CREATE TABLE IF NOT EXISTS `status_lapangan` (
  `id_lapangan` varchar(11) DEFAULT NULL,
  `id_tipe` varchar(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` int(11) DEFAULT NULL,
  `nama_boking` varchar(50) DEFAULT NULL,
  KEY `parameter_tanggal_jam` (`tanggal`,`jam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_lapangan`
--

INSERT INTO `status_lapangan` (`id_lapangan`, `id_tipe`, `tanggal`, `jam`, `nama_boking`) VALUES
('LP1703001', 'TL17030001', '2017-03-29', 1300, 'dhani'),
('LP1703001', 'TL17030002', '2017-03-29', 1400, 'alex');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `team_name`, `team_description`, `team_image`, `team_banner`, `password`) VALUES
(1, 'Team Coba', 'Halo ini team coba yaa,. mohon dipahami hohoho haiiii', '1.png', 'banner13.PNG', '0cc175b9c0f1b6a831c399e269772661'),
(2, 'Team Coba Coba', 'Halo ini team coba yaa,. mohon dipahami hohoho haiiii', '', 'banner1.png', '0cc175b9c0f1b6a831c399e269772661'),
(3, 'Team Halods', 'Halo ini team coba yaa,. mohon dipahami hohoho haiiii', '13385671_652412064911444_407033444_n_(1).jpg', 'banner1.png', '0cc175b9c0f1b6a831c399e269772661'),
(10, 'halohaai', 'vghccf ghfhgh fhfhg gfhgfgh', 'profil2.jpg', 'banner11.PNG', '0cc175b9c0f1b6a831c399e269772661'),
(11, 'tim a', 'a', 'desyca-1.png', 'gong_yoo_-_3.png', '0cc175b9c0f1b6a831c399e269772661'),
(12, 'tim b', 'b', 'desyca-11.png', 'gong_yoo_-_31.png', '0cc175b9c0f1b6a831c399e269772661'),
(13, 'tim c', 'c', 'desyca-12.png', 'gong_yoo_-_32.png', '0cc175b9c0f1b6a831c399e269772661'),
(14, 'tim d', 'd', 'desyca-13.png', 'gong_yoo_-_33.png', '0cc175b9c0f1b6a831c399e269772661'),
(15, 'tim e', 'e', 'desyca-14.png', 'gong_yoo_-_34.png', '0cc175b9c0f1b6a831c399e269772661'),
(16, 'team f', 'f', 'desyca-5.png', 'desyca-5.png', '0cc175b9c0f1b6a831c399e269772661'),
(17, 'team g', 'g', 'desyca-15.png', 'gong_yoo_-_35.png', '0cc175b9c0f1b6a831c399e269772661'),
(18, 'team h', 'h', 'desyca-16.png', 'gong_yoo_-_36.png', '0cc175b9c0f1b6a831c399e269772661'),
(19, 'team i', 'i', 'desyca-17.png', 'gong_yoo_-_37.png', '0cc175b9c0f1b6a831c399e269772661'),
(20, 'team j', 'j', 'desyca-18.png', 'gong_yoo_-_38.png', '0cc175b9c0f1b6a831c399e269772661'),
(21, 'team k', 'k', 'desyca-19.png', 'gong_yoo_-_39.png', '0cc175b9c0f1b6a831c399e269772661'),
(22, 'team l', 'l', 'desyca-110.png', 'gong_yoo_-_310.png', '0cc175b9c0f1b6a831c399e269772661'),
(23, 'team m', 'm', 'desyca-111.png', 'gong_yoo_-_311.png', '0cc175b9c0f1b6a831c399e269772661'),
(24, 'team n', 'n', 'desyca-112.png', 'gong_yoo_-_312.png', '0cc175b9c0f1b6a831c399e269772661'),
(25, 'team o', 'o', 'desyca-113.png', 'gong_yoo_-_313.png', '0cc175b9c0f1b6a831c399e269772661'),
(26, 'team p', 'a', 'desyca-114.png', 'gong_yoo_-_314.png', '0cc175b9c0f1b6a831c399e269772661');

-- --------------------------------------------------------

--
-- Table structure for table `team_challenge`
--

CREATE TABLE IF NOT EXISTS `team_challenge` (
  `challenge_id` int(11) NOT NULL AUTO_INCREMENT,
  `inviter_team` int(11) NOT NULL,
  `rival_team` int(11) NOT NULL,
  `detail_revisi` text NOT NULL,
  `inviter_score` int(11) NOT NULL,
  `rival_score` int(11) NOT NULL,
  `inviter_point` int(11) NOT NULL,
  `rival_point` int(11) NOT NULL,
  `status_challenge` int(1) NOT NULL,
  PRIMARY KEY (`challenge_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `team_challenge`
--

INSERT INTO `team_challenge` (`challenge_id`, `inviter_team`, `rival_team`, `detail_revisi`, `inviter_score`, `rival_score`, `inviter_point`, `rival_point`, `status_challenge`) VALUES
(1, 1, 2, '', 0, 0, 0, 0, 0),
(9, 1, 3, '', 0, 0, 0, 0, 0),
(10, 1, 3, '', 5, 6, 1, 2, 5),
(11, 2, 1, '', 5, 7, 1, 2, 5),
(12, 1, 3, '', 4, 5, 1, 2, 5),
(13, 1, 2, '', 7, 5, 2, 1, 5),
(14, 3, 2, '', 0, 0, 0, 0, 0),
(15, 1, 2, 'aku minta revisi', 1, 2, 0, 0, 7),
(19, 1, 2, 'vfdddf', 2, 3, 1, 2, 5),
(28, 1, 2, 'hai', 0, 0, 0, 0, 6),
(29, 1, 2, '', 0, 0, 0, 0, 0),
(30, 1, 2, 'revisi', 0, 0, 0, 0, 3),
(31, 1, 2, '', 3, 2, 2, 1, 5),
(32, 1, 3, '', 0, 0, 0, 0, 0),
(33, 1, 2, '', 0, 0, 0, 0, 0),
(34, 1, 2, 'aop', 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `team_challenge_log`
--

CREATE TABLE IF NOT EXISTS `team_challenge_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `challenge_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `modify_by` int(11) NOT NULL,
  `modify_date` datetime NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `team_challenge_log`
--

INSERT INTO `team_challenge_log` (`log_id`, `challenge_id`, `note`, `modify_by`, `modify_date`) VALUES
(3, 10, '', 1, '2017-06-15 18:15:28'),
(4, 10, '', 4, '2017-06-15 18:38:36'),
(5, 10, '', 4, '2017-06-15 18:40:05'),
(6, 10, '', 4, '2017-06-15 18:48:59'),
(7, 10, '', 1, '2017-06-15 18:49:16'),
(8, 10, '', 4, '2017-06-15 18:49:37'),
(9, 10, '', 1, '2017-06-15 18:49:55'),
(10, 10, '', 1, '2017-06-15 19:03:55'),
(11, 15, '', 1, '2017-06-18 20:46:07'),
(12, 15, '', 1, '2017-06-18 20:46:28'),
(13, 15, '', 1, '2017-06-18 20:46:55'),
(14, 15, '', 1, '2017-06-18 20:47:31'),
(15, 15, '', 1, '2017-06-18 20:48:15'),
(16, 15, '', 1, '2017-06-18 20:48:46'),
(17, 15, '', 1, '2017-06-18 20:48:50'),
(18, 15, '', 3, '2017-06-18 21:26:01'),
(19, 15, '', 3, '2017-06-18 21:27:51'),
(29, 19, 'vfdddf', 3, '2017-06-29 13:46:28'),
(30, 19, '', 1, '2017-06-29 14:03:48'),
(35, 19, '', 3, '2017-06-29 14:30:50'),
(36, 28, 'fdgf', 3, '2017-06-30 02:32:24'),
(40, 28, '', 1, '2017-06-30 06:31:18'),
(41, 28, '', 1, '2017-06-30 06:33:34'),
(42, 28, 'hai', 3, '2017-06-30 06:35:43'),
(43, 28, '', 1, '2017-06-30 06:36:05'),
(44, 11, '', 3, '2017-06-30 06:50:21'),
(45, 11, '', 3, '2017-06-30 07:08:35'),
(46, 11, '', 1, '2017-06-30 07:08:52'),
(47, 11, '', 3, '2017-06-30 07:33:23'),
(48, 11, '', 1, '2017-06-30 07:33:31'),
(49, 11, '', 3, '2017-06-30 07:34:01'),
(50, 30, 'revisi', 3, '2017-07-09 14:13:15'),
(51, 15, '', 1, '2017-07-09 14:38:29'),
(52, 19, '', 1, '2017-07-09 14:51:38'),
(53, 19, '', 3, '2017-07-09 14:51:53'),
(54, 19, '', 1, '2017-07-09 14:51:59'),
(55, 31, '', 3, '2017-07-09 14:55:04'),
(56, 31, '', 1, '2017-07-09 14:57:16'),
(57, 31, '', 3, '2017-07-09 14:57:38'),
(58, 31, '', 1, '2017-07-09 14:57:43'),
(61, 34, 'aop', 3, '2017-07-23 23:08:54'),
(62, 34, '', 1, '2017-07-24 00:41:26'),
(63, 34, '', 3, '2017-07-24 00:41:38');

-- --------------------------------------------------------

--
-- Table structure for table `team_request`
--

CREATE TABLE IF NOT EXISTS `team_request` (
  `team_request_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `member_admin_id` int(11) NOT NULL,
  `team_request_status` int(1) NOT NULL,
  PRIMARY KEY (`team_request_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `team_request`
--

INSERT INTO `team_request` (`team_request_id`, `team_id`, `member_id`, `member_admin_id`, `team_request_status`) VALUES
(6, 1, 2, 1, 1),
(27, 1, 6, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tipe_lapangan`
--

CREATE TABLE IF NOT EXISTS `tipe_lapangan` (
  `id_lapangan` varchar(11) DEFAULT NULL,
  `id_tipe` varchar(11) NOT NULL DEFAULT '',
  `nama_tipe` varchar(250) DEFAULT NULL,
  `tarif` int(11) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `picture` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_tipe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe_lapangan`
--

INSERT INTO `tipe_lapangan` (`id_lapangan`, `id_tipe`, `nama_tipe`, `tarif`, `deskripsi`, `picture`) VALUES
('LP1703001', 'TL17030001', 'umum', 250000, 'It is a long established fact that a reader will be distracted by the readable', 'assets/img/lapangan/raya_futsal.jpg'),
('LP1703001', 'TL17030002', 'premium', 350000, 'It is a long established fact that a reader will be distracted by the readable', 'assets/img/lapangan/raya_futsal.jpg'),
('LP1703002', 'TL17030003', 'premium big', 500000, 'It is a long established fact that a reader will be distracted by the readable', 'assets/img/lapangan/raya_futsal.jpg'),
('LP1703003', 'TL17030004', 'Umum', 200000, 'It is a long established fact that a reader will be distracted by the readable', 'assets/img/lapangan/raya_futsal.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_tipe` varchar(30) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` varchar(20) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `tgl_transaksi` timestamp NULL DEFAULT NULL,
  `kode_booking` varchar(50) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `id_tipe`, `tanggal`, `jam`, `total`, `tgl_transaksi`, `kode_booking`) VALUES
(11, 1, 'TL17030002', '2017-04-20', '1400', 350000, NULL, NULL),
(12, 1, 'TL17030003', '2017-04-20', '1300', 500000, NULL, NULL),
(13, 1, 'TL17030002', '2017-03-29', '1300', 350000, NULL, NULL),
(14, 1, 'TL17030002', '2017-03-29', '1300', 350000, NULL, NULL),
(15, 1, 'TL17030002', '2017-03-29', '1300', 350000, NULL, NULL),
(16, 1, 'TL17030002', '2017-03-29', '1300', 350000, NULL, NULL),
(17, 1, 'TL17030004', '2017-04-04', '2000', 200000, NULL, NULL),
(18, 1, 'TL17030004', '0000-00-00', '1900', 200000, NULL, NULL),
(19, 1, 'TL17030004', '0000-00-00', '1900', 200000, NULL, NULL),
(20, 1, 'TL17030004', '0000-00-00', '1900', 200000, NULL, NULL),
(21, 1, 'TL17030004', '0000-00-00', '1900', 200000, NULL, NULL),
(22, 1, 'TL17030004', '0000-00-00', '1900', 200000, NULL, NULL),
(23, 1, 'TL17030004', '0000-00-00', '1900', 200000, NULL, NULL),
(24, 1, 'TL17030004', '0000-00-00', '1900', 200000, NULL, NULL),
(25, 1, 'TL17030004', '0000-00-00', '1900', 200000, NULL, NULL),
(26, 1, 'TL17030004', '0000-00-00', '1900', 200000, NULL, NULL),
(27, 1, 'TL17030003', '2017-04-14', '2300', 500000, NULL, NULL),
(28, 1, 'TL17030003', '2017-04-14', '2300', 500000, NULL, '3ce90'),
(29, 1, 'TL17030003', '2017-04-14', '2300', 500000, NULL, '13530'),
(30, 1, 'TL17030003', '2017-04-14', '2300', 500000, NULL, 'f1438'),
(31, 1, 'TL17030003', '2017-04-14', '2300', 500000, NULL, '653cf'),
(32, 1, 'TL17030003', '2017-04-14', '2300', 500000, NULL, '5fb6b'),
(33, 1, 'TL17030003', '2017-04-14', '2300', 500000, NULL, 'fbedb'),
(34, 1, 'TL17030003', '2017-04-14', '2300', 500000, NULL, '4b16c'),
(35, 1, 'TL17030003', '2017-04-14', '2300', 500000, NULL, 'e36e9'),
(36, 1, 'TL17030003', '2017-04-14', '2300', 500000, NULL, '034b9'),
(37, 1, 'TL17030003', '2017-04-14', '2300', 500000, NULL, '1bfec'),
(38, 1, 'TL17030003', '2017-04-14', '2300', 500000, NULL, '35fc7'),
(39, 1, 'TL17030004', '2017-04-02', '2300', 200000, NULL, 'c98e6');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_challenge`
--

CREATE TABLE IF NOT EXISTS `transaksi_challenge` (
  `transaksi_challenge_id` int(11) NOT NULL AUTO_INCREMENT,
  `challenge_id` int(11) NOT NULL,
  `id_tipe` varchar(11) NOT NULL,
  `tanggal` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `kode_booking` varchar(50) NOT NULL,
  `transaksi_challenge_status` int(1) NOT NULL,
  PRIMARY KEY (`transaksi_challenge_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `transaksi_challenge`
--

INSERT INTO `transaksi_challenge` (`transaksi_challenge_id`, `challenge_id`, `id_tipe`, `tanggal`, `start_time`, `end_time`, `tgl_transaksi`, `kode_booking`, `transaksi_challenge_status`) VALUES
(2, 1, 'TL17030002', '2017-06-08', '07:00:00', '08:00:00', '2017-06-08 00:00:00', 'c98e7', 0),
(8, 9, 'TL17030001', '2017-06-12', '09:00:00', '11:00:00', '2017-06-10 02:00:08', 'abc', 0),
(9, 10, 'TL17030001', '2017-06-12', '09:01:00', '11:01:00', '2017-06-10 02:01:36', 'abc', 1),
(10, 11, 'TL17030002', '2017-06-12', '07:00:00', '08:00:00', '2017-06-10 00:00:00', 'c98e7', 1),
(11, 12, 'TL17030001', '2017-06-10', '09:00:00', '11:00:00', '2017-06-10 02:00:08', 'abc', 3),
(12, 13, 'TL17030001', '2017-06-10', '12:00:00', '14:00:00', '2017-06-10 02:01:36', 'abc', 3),
(13, 14, 'TL17030004', '2017-06-12', '22:04:00', '00:04:00', '2017-06-10 17:07:54', 'abc', 0),
(14, 15, 'TL17030004', '2017-06-21', '17:00:00', '19:00:00', '2017-06-17 01:10:34', 'abc', 1),
(18, 19, 'TL17030004', '2017-06-30', '15:00:00', '17:00:00', '2017-06-29 08:46:56', 'abc', 1),
(27, 28, 'TL17030001', '2017-07-01', '11:00:00', '12:00:00', '2017-06-30 01:40:57', 'abc', 2),
(28, 29, 'TL17030004', '2017-07-03', '19:00:00', '21:00:00', '2017-06-30 06:58:19', 'abc', 0),
(29, 30, 'TL17030004', '2017-07-13', '09:00:00', '11:00:00', '2017-07-09 14:12:40', 'abc', 0),
(30, 31, 'TL17030004', '2017-07-14', '11:00:00', '13:00:00', '2017-07-09 14:54:55', 'abc', 1),
(31, 32, 'TL17030004', '2017-07-18', '03:00:00', '04:00:00', '2017-07-12 21:28:37', 'abc', 0),
(32, 33, 'TL17030004', '2017-07-26', '16:00:00', '17:00:00', '2017-07-23 03:50:49', 'abc', 0),
(33, 34, 'TL17030004', '2017-07-26', '19:00:00', '20:00:00', '2017-07-23 04:03:52', 'abc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `fullname` varchar(30) DEFAULT NULL,
  `picture` varchar(30) DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL,
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `fullname`, `picture`, `saldo`) VALUES
(1, 'dhanidwiputra', 'dhanidwiputra@gmail.com', 'hanyaaku', 'dhany dwi putra', NULL, 0),
(2, 'john', 'john@gmail.com', 'admin', 'john wick', NULL, NULL),
(3, 'will', 'will@gmail.com', 'admin', 'will capster', NULL, NULL),
(4, 'rayce', 'rayce@gmail.com', 'admin', 'rayce william', NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_team_rangking`
--
CREATE TABLE IF NOT EXISTS `view_team_rangking` (
`rangking` int(11)
,`team_id` int(11)
,`score` decimal(15,4)
);
-- --------------------------------------------------------

--
-- Structure for view `view_team_rangking`
--
DROP TABLE IF EXISTS `view_team_rangking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_team_rangking` AS select `rownum`() AS `rangking`,`a`.`team_id` AS `team_id`,((`team_inviter_score`(`a`.`team_id`) + `team_rival_score`(`a`.`team_id`)) / `team_challenge_count`(`a`.`team_id`)) AS `score` from `team` `a` order by ((`team_inviter_score`(`a`.`team_id`) + `team_rival_score`(`a`.`team_id`)) / `team_challenge_count`(`a`.`team_id`)) desc;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
