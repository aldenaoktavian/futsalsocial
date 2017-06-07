-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 08, 2017 at 01:05 AM
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
  `is_team_admin` int(1) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `team_id`, `member_name`, `member_image`, `username`, `password`, `email`, `is_team_admin`) VALUES
(1, 1, 'Vian', '', 'vian123', '355bd34540f4a0f0ce321f42c1b66b98', 'vian@gmail.com', 1),
(2, 1, 'Reno', '', 'reno123', 'f98a4d4ef820d9f217ca496518607649', 'reno@yahoo.com', 0),
(3, 2, 'Rian', '', 'rian123', '26ed30f28908645239254ff4f88c1b75', 'rian@yahoo.com', 1),
(4, 3, 'Vero', '', 'vero123', 'c2dfee78ffc7b5dc9e6268d7aa721a56', 'vero@yahoo.com', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `member_post_comment`
--

INSERT INTO `member_post_comment` (`post_comment_id`, `post_id`, `member_id`, `comment_description`) VALUES
(1, 1, 1, 'hi\nff'),
(2, 2, 1, 'wohoo\n'),
(3, 1, 1, 'ups');

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
  PRIMARY KEY (`notif_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`notif_id`, `member_id`, `notif_type`, `notif_detail`, `notif_url`, `notif_status`, `notif_created`) VALUES
(8, 2, 1, '"Team Coba" mengundang Anda untuk bergabung dalam tim.', 'http://localhost/futsalsocial/notif/team_request/1679091c5a880faf6fb5e6087eb1b2dc', 1, '2017-06-06 01:18:36'),
(11, 1, 2, 'Reno telah menerima permintaan Anda untuk bergabung dalam tim.', 'http://localhost/futsalsocial/notif/team_request/1679091c5a880faf6fb5e6087eb1b2dc', 1, '2017-06-06 01:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `notif_type`
--

CREATE TABLE IF NOT EXISTS `notif_type` (
  `notif_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `notif_type_name` varchar(100) NOT NULL,
  `notif_type_detail` varchar(255) NOT NULL,
  PRIMARY KEY (`notif_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `notif_type`
--

INSERT INTO `notif_type` (`notif_type_id`, `notif_type_name`, `notif_type_detail`) VALUES
(1, 'Undangan Bergabung ke Team', '"{team_name}" mengundang Anda untuk bergabung dalam tim.'),
(2, 'Undangan Bergabung Diterima', '{member_name} telah menerima permintaan Anda untuk bergabung dalam tim.'),
(3, 'Undangan Bergabung Tidak Diterima', '{member_name} tidak menerima permintaan Anda untuk bergabung dalam tim.'),
(4, 'Undangan Permintaan Challenge', 'Tim "{inviter_team} mengundang tim Anda untuk melakukan pertandingan.'),
(5, 'Permintaan Challenge Diterima', 'Tim "{rival_team}" permintaan Anda untuk bertanding.');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `team_name`, `team_description`, `team_image`, `team_banner`, `password`) VALUES
(1, 'Team Coba', 'Halo ini team coba yaa,. mohon dipahami hohoho haiiii', 'profil.jpg', 'banner1.png', '0cc175b9c0f1b6a831c399e269772661'),
(2, 'Team Coba Coba', 'Halo ini team coba yaa,. mohon dipahami hohoho haiiii', '', 'banner1.png', '0cc175b9c0f1b6a831c399e269772661'),
(3, 'Team Halo', 'Halo ini team coba yaa,. mohon dipahami hohoho haiiii', 'profil.jpg', 'banner1.png', '0cc175b9c0f1b6a831c399e269772661');

-- --------------------------------------------------------

--
-- Table structure for table `team_challenge`
--

CREATE TABLE IF NOT EXISTS `team_challenge` (
  `challenge_id` int(11) NOT NULL AUTO_INCREMENT,
  `inviter_team` int(11) NOT NULL,
  `rival_team` int(11) NOT NULL,
  `inviter_score` int(11) NOT NULL,
  `rival_score` int(11) NOT NULL,
  `status_challenge` int(1) NOT NULL,
  PRIMARY KEY (`challenge_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `team_challenge`
--

INSERT INTO `team_challenge` (`challenge_id`, `inviter_team`, `rival_team`, `inviter_score`, `rival_score`, `status_challenge`) VALUES
(1, 1, 2, 0, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `team_request`
--

INSERT INTO `team_request` (`team_request_id`, `team_id`, `member_id`, `member_admin_id`, `team_request_status`) VALUES
(6, 1, 2, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `transaksi_challenge`
--

INSERT INTO `transaksi_challenge` (`transaksi_challenge_id`, `challenge_id`, `id_tipe`, `tanggal`, `start_time`, `end_time`, `tgl_transaksi`, `kode_booking`, `transaksi_challenge_status`) VALUES
(2, 1, 'TL17030002', '2017-06-08', '07:00:00', '08:00:00', '2017-06-08 00:00:00', 'c98e7', 0);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
