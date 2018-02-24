-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2017 at 07:17 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`friend_id`, `rsender_id`, `r_receiver_id`, `status`) VALUES
(3, 0, 0, 'pending');

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
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `signuptest`
--

INSERT INTO `signuptest` (`reg_id`, `name`, `email`, `password`) VALUES
(1, 'margai wangara', 'mwangara@codewazimu.com', '45650b6f60fafe3b2544852ecc5848d0'),
(2, 'luke oduor', 'luke@kenya.com', '45650b6f60fafe3b2544852ecc5848d0'),
(3, 'keith', 'kwangara@kenya.co.ke', '45650b6f60fafe3b2544852ecc5848d0'),
(4, 'salma halima', 'salma@kenya.co.ke', '45650b6f60fafe3b2544852ecc5848d0'),
(5, 'sally ly', 'sallyly@kenya.co.ke', '45650b6f60fafe3b2544852ecc5848d0'),
(6, 'alpha', 'alpha@teenwolf.co.ke', '45650b6f60fafe3b2544852ecc5848d0'),
(7, 'scott mccal', 'mccal@teenwolf.com', '45650b6f60fafe3b2544852ecc5848d0'),
(8, 'elijah mikaelson', 'elijahmike@theoriginals.com', '45650b6f60fafe3b2544852ecc5848d0'),
(9, 'walter obrian', 'walter@geniuses.com', '45650b6f60fafe3b2544852ecc5848d0'),
(10, 'sheldon cooper', 'scooper@tbbt.com', '45650b6f60fafe3b2544852ecc5848d0'),
(11, 'leonard', 'leonard@tbbt.com', '45650b6f60fafe3b2544852ecc5848d0');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
