-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2017 at 10:46 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `codepiphany`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `friend_id` int(11) NOT NULL AUTO_INCREMENT,
  `rsender_id` int(50) NOT NULL,
  `r_receiver_id` int(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`friend_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`friend_id`, `rsender_id`, `r_receiver_id`, `status`) VALUES
(3, 1, 3, 'friend'),
(4, 10, 1, 'friend'),
(5, 9, 1, 'friend'),
(6, 8, 1, 'friend'),
(9, 3, 2, 'friend'),
(11, 12, 9, 'friend'),
(12, 12, 1, 'friend'),
(15, 3, 10, 'friend'),
(16, 3, 4, 'friend'),
(17, 12, 8, 'friend'),
(18, 10, 12, 'friend');

-- --------------------------------------------------------

--
-- Table structure for table `messagetest`
--

CREATE TABLE IF NOT EXISTS `messagetest` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `rec_id` int(50) NOT NULL,
  `message` varchar(200) NOT NULL,
  `sender_id` int(50) NOT NULL,
  `status` int(20) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `signuptest`
--

CREATE TABLE IF NOT EXISTS `signuptest` (
  `reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `bday` varchar(5) NOT NULL,
  `bmonth` varchar(20) NOT NULL,
  `byear` varchar(10) NOT NULL,
  `guest_rating` varchar(50) NOT NULL,
  `confirmcode` varchar(50) NOT NULL,
  `confirmation_id` varchar(50) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `signuptest`
--

INSERT INTO `signuptest` (`reg_id`, `name`, `email`, `password`, `bday`, `bmonth`, `byear`, `guest_rating`, `confirmcode`, `confirmation_id`, `reg_date`) VALUES
(1, 'margai wangara', 'mwangara@codewazimu.com', '45650b6f60fafe3b2544852ecc5848d0', '6', 'April', '1996', '1', '', '', '2017-04-06 08:00:19'),
(2, 'luke oduor', 'luke@kenya.com', '45650b6f60fafe3b2544852ecc5848d0', '', '', '', '1', '', '', '2017-04-06 08:00:19'),
(3, 'keith', 'kwangara@kenya.co.ke', '45650b6f60fafe3b2544852ecc5848d0', '6', 'April', '1995', '1', '', '', '2017-04-06 08:00:19'),
(4, 'salma halima', 'salma@kenya.co.ke', '45650b6f60fafe3b2544852ecc5848d0', '', '', '', '1', '', '', '2017-04-06 08:00:19'),
(5, 'sally ly', 'sallyly@kenya.co.ke', '45650b6f60fafe3b2544852ecc5848d0', '', '', '', '', '', '', '2017-04-06 08:00:19'),
(6, 'alpha', 'alpha@teenwolf.co.ke', '45650b6f60fafe3b2544852ecc5848d0', '', '', '', '', '', '', '2017-04-06 08:00:19'),
(7, 'scott mccal', 'mccal@teenwolf.com', '45650b6f60fafe3b2544852ecc5848d0', '', '', '', '', '', '', '2017-04-06 08:00:19'),
(8, 'elijah mikaelson', 'elijahmike@theoriginals.com', '45650b6f60fafe3b2544852ecc5848d0', '', '', '', '1', '', '', '2017-04-06 08:00:19'),
(9, 'walter obrian', 'walter@geniuses.com', '45650b6f60fafe3b2544852ecc5848d0', '6', 'April', '1990', '1', '', '', '2017-04-06 08:00:19'),
(10, 'sheldon cooper', 'scooper@tbbt.com', '45650b6f60fafe3b2544852ecc5848d0', '', '', '', '1', '', '', '2017-04-06 08:00:19'),
(11, 'leonard', 'leonard@tbbt.com', '45650b6f60fafe3b2544852ecc5848d0', '', '', '', '', '', '', '2017-04-06 08:00:19'),
(12, 'clark kent', 'ckent@dailyplanet.com', 'f477f3a2793349d5903305d7bfa9d96d', '', '', '', '0', '29766', '0', '2017-04-06 17:13:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_images`
--

CREATE TABLE IF NOT EXISTS `user_images` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `img_type` varchar(20) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_images`
--

INSERT INTO `user_images` (`img_id`, `owner_id`, `image`, `img_type`) VALUES
(1, 12, 'uploads/mainbgone.jpg', 'profile');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
