-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2014 at 02:58 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_photo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_photo`
--

CREATE TABLE IF NOT EXISTS `tbl_photo` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_name` varchar(255) NOT NULL,
  `photo_description` varchar(500) NOT NULL,
  `photo_file` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `added_date` int(11) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_photo`
--

INSERT INTO `tbl_photo` (`photo_id`, `photo_name`, `photo_description`, `photo_file`, `user_id`, `added_date`, `is_delete`) VALUES
(1, 'Second Photo', 'Green leaf with water bubbles', 'pri_001.jpg', 1, 0, 0),
(2, 'First Photo', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.', 'pri_002.jpg', 1, 0, 0),
(3, 'name3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'pri_003.jpg', 2, 0, 0),
(4, 'ghhkk', '', '5b1bc6123861853958439e0169d28d74.jpg', 2, 1410497516, 0),
(5, 'Funny baby', '', '6c292499ce5a3d77d673403d938bcaeb.jpg', 2, 1410499265, 1),
(6, 'Paper art', '', '399dc1aa5ef6b20a57a6a16969b6ba2e.jpg', 2, 1410499310, 0),
(7, 'Classic Paper Arts Edit', 'New Description for Classic Paper Arts ', 'bc5f1f6a118d245ba32abc1f77c80827.jpg', 2, 1410499336, 0),
(8, 'Alexandra Stan', '', 'f092a99dc98c3d7e57c77fa7900f9c25.jpg', 2, 1410499468, 0),
(9, 'My Favaorite', 'afa', 'e727a105a375fa8f1362c1d74b57c6cf.jpg', 3, 1410499623, 0),
(10, 'Good one', 'sdffsd', '7468e36ca2197a6c1ed795acda1e8ee1.jpg', 3, 1410499641, 0),
(11, 'Run boy run', 'Run boy run', 'af20d123246b8f1423f14ac0a395e167.jpg', 1, 1410522588, 0),
(12, 'Nike everywhere', 'Tiago has Nike everywhere', '7ad7e2b7736f2ab66a0acff2e90c18b1.jpg', 1, 1410522717, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_photo_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_photo_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_fk` int(11) NOT NULL,
  `photo_id_fk` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `added` int(11) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_photo_comment`
--

INSERT INTO `tbl_photo_comment` (`comment_id`, `user_id_fk`, `photo_id_fk`, `comment`, `added`, `is_delete`) VALUES
(1, 2, 1, 'sadasdasda', 1410448725, 0),
(2, 2, 2, 'aasasasa', 1410448788, 0),
(3, 2, 2, 'aasasasasasas', 1410448824, 0),
(4, 2, 2, 'aasasasasasas', 1410448875, 0),
(5, 2, 2, 'asada', 1410448944, 0),
(6, 2, 2, 'zsa', 1410449563, 0),
(7, 2, 2, 'ssafasf', 1410449584, 0),
(8, 2, 2, 'ssafasf', 1410449586, 0),
(9, 2, 2, 'ssafasf', 1410449586, 0),
(10, 2, 2, 'gfhgfhfg', 1410449656, 0),
(11, 2, 2, 'ghjhgj', 1410449684, 0),
(12, 2, 3, 'xs', 1410449758, 0),
(13, 2, 3, 'sdasd', 1410449834, 0),
(14, 2, 3, 'sdsd', 1410450378, 0),
(15, 2, 2, 'sdsadasd', 1410450601, 0),
(16, 2, 2, 'zfdfdsfsd', 1410450622, 0),
(17, 2, 2, 'asdasdas', 1410450718, 0),
(18, 2, 2, 'loop', 1410450768, 0),
(19, 2, 2, 'sdsdfdsfs', 1410450866, 0),
(20, 1, 2, 'nice capturing', 1410460327, 0),
(21, 3, 9, 'sdfsdfsdfs', 1410502465, 0),
(22, 3, 9, 'iopiopiopiopi', 1410502470, 0),
(23, 2, 10, 'new comment', 1410511540, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_system_user`
--

CREATE TABLE IF NOT EXISTS `tbl_system_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_system_user`
--

INSERT INTO `tbl_system_user` (`user_id`, `username`, `password`, `active`) VALUES
(1, 'adam', '3e7b522b9756d2578d3a86d8f366be6e', 1),
(2, 'sumith', '363743902873bb7f28098ee0118672d7', 1),
(3, 'akila', '77cb2899cf0a7a8d52eca93d410df665', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
