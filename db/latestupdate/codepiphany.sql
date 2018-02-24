-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2017 at 01:57 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

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
(18, 10, 12, 'friend'),
(20, 1, 5, 'friend'),
(21, 1, 4, 'friend'),
(22, 2, 4, 'friend'),
(23, 6, 5, 'pending'),
(24, 7, 5, 'friend'),
(25, 8, 5, 'pending'),
(26, 11, 5, 'friend'),
(27, 10, 5, 'friend'),
(28, 3, 5, 'friend'),
(29, 9, 5, 'friend'),
(30, 1, 7, 'friend'),
(31, 11, 1, 'friend'),
(32, 6, 1, 'friend'),
(33, 6, 2, 'pending'),
(34, 6, 3, 'friend'),
(35, 3, 13, 'pending'),
(36, 13, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `messagetest`
--

CREATE TABLE IF NOT EXISTS `messagetest` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `rec_id` int(50) NOT NULL,
  `message` varchar(200) NOT NULL,
  `sender_id` int(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `messagetest`
--

INSERT INTO `messagetest` (`msg_id`, `rec_id`, `message`, `sender_id`, `status`) VALUES
(1, 1, 'i will always be by your side', 2, 'unread'),
(2, 1, 'i will always love you', 2, 'unread'),
(3, 1, 'take heart', 2, 'unread'),
(4, 1, 'hey, whats up this weekend', 3, 'unread'),
(5, 1, 'we both know am not what you need', 3, 'unread'),
(6, 1, 'any movies coming out this weekend', 4, 'unread'),
(7, 1, 'you are such a sneaky sneaky person', 4, 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `poster_id` int(50) NOT NULL,
  `post` varchar(200) NOT NULL,
  `privacy` varchar(30) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `poster_id`, `post`, `privacy`, `post_time`) VALUES
(1, 4, 'this is my first test post to the public domain', 'public', '2017-04-07 11:24:56'),
(2, 4, 'this is my first posts to my friends', 'friends', '2017-04-07 11:26:02'),
(3, 4, 'yeah right, this is my own stuff..', 'public', '2017-04-07 11:29:22'),
(4, 4, 'in every man''s dream, his desire to go to the moon is lost', 'public', '2017-04-07 13:14:42'),
(5, 4, 'it is very lost and forgotten i say', 'public', '2017-04-07 13:15:38'),
(6, 4, 'and i say it again and again, it is lost and forgotten my friends', 'public', '2017-04-07 13:16:32'),
(7, 4, 'up and up we go again', 'public', '2017-04-07 13:17:16'),
(8, 4, 'i think i am very wrong', 'public', '2017-04-07 13:18:19'),
(9, 4, 'please show me the fireworks', 'public', '2017-04-07 13:19:06'),
(10, 4, 'this is to all my friends from above and beyond', 'friends', '2017-04-07 13:20:12'),
(11, 4, 'ok, lets be serious for a minute', 'private', '2017-04-07 13:25:54'),
(12, 4, 'and then he ran away ', 'friends', '2017-04-07 13:31:59'),
(17, 2, 'yeah, i do have something to say to all of you people', 'public', '2017-04-07 13:44:56'),
(18, 2, 'i was born young and energetic once, well, that was once', 'friends', '2017-04-07 13:45:40'),
(19, 4, 'like a diamond in the sky', 'friends', '2017-04-07 13:46:35'),
(20, 1, 'lets go home and get wasted', 'public', '2017-04-07 13:47:46'),
(21, 1, 'it is every man''s dream to get wasted, i think so..', 'public', '2017-04-07 13:48:10'),
(22, 2, 'i was actually very alarmed at the least', 'friends', '2017-04-07 13:49:59'),
(23, 1, 'like a diamond in the sky is flying around', 'public', '2017-04-07 13:53:13'),
(24, 1, 'i was once the prince in a fairy tale, well, until everything went south, southpark', 'public', '2017-04-07 13:55:13'),
(25, 1, 'when i was given the elixir of immortality, i looked around and said to myself, "yes, i finally did it"', 'friends', '2017-04-07 13:56:18'),
(26, 1, 'i know you think you are a hot shot now,  but to be honest, yeah you are..', 'private', '2017-04-07 13:57:36'),
(27, 3, 'an alpha who can get things done, who can get things up', 'friends', '2017-04-07 19:41:50'),
(28, 3, 'i once thought unicorns were real, apparently, am still not sure', 'public', '2017-04-07 19:42:23'),
(29, 3, 'i love my family very much, i protect them with all my heart ', 'public', '2017-04-07 19:42:48'),
(30, 3, 'this is my personal space, don''t try to be sneaky with me', 'private', '2017-04-07 19:43:16'),
(31, 5, 'my name is sally and this is my private story', 'private', '2017-04-07 19:52:15'),
(32, 9, 'just don''t judge me', 'public', '2017-04-07 19:54:48'),
(33, 1, 'in the beginning, there was dust...', 'public', '2017-04-08 19:09:52');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `signuptest`
--

INSERT INTO `signuptest` (`reg_id`, `name`, `email`, `password`, `bday`, `bmonth`, `byear`, `guest_rating`, `confirmcode`, `confirmation_id`, `reg_date`) VALUES
(1, 'margai wangara', 'mwangara@codewazimu.com', '45650b6f60fafe3b2544852ecc5848d0', '8', 'April', '1996', '1', '', '', '2017-04-06 08:00:19'),
(2, 'luke oduor', 'luke@kenya.com', '45650b6f60fafe3b2544852ecc5848d0', '', '', '', '1', '', '', '2017-04-06 08:00:19'),
(3, 'keith', 'kwangara@kenya.co.ke', '45650b6f60fafe3b2544852ecc5848d0', '6', 'April', '1995', '1', '', '', '2017-04-06 08:00:19'),
(4, 'salma halima washiali', 'salma@kenya.co.ke', '45650b6f60fafe3b2544852ecc5848d0', '', '', '', '1', '', '', '2017-04-06 08:00:19'),
(5, 'sally ly', 'sallyly@kenya.co.ke', '45650b6f60fafe3b2544852ecc5848d0', '7', 'April', '1995', '1', '', '', '2017-04-06 08:00:19'),
(6, 'alpha', 'alpha@teenwolf.co.ke', '45650b6f60fafe3b2544852ecc5848d0', '', '', '', '1', '', '', '2017-04-06 08:00:19'),
(7, 'scott mccal', 'mccal@teenwolf.com', '45650b6f60fafe3b2544852ecc5848d0', '7', 'April', '1989', '1', '', '', '2017-04-06 08:00:19'),
(8, 'elijah mikaelson', 'elijahmike@theoriginals.com', '45650b6f60fafe3b2544852ecc5848d0', '', '', '', '1', '', '', '2017-04-06 08:00:19'),
(9, 'walter obrian', 'walter@geniuses.com', '45650b6f60fafe3b2544852ecc5848d0', '6', 'April', '1990', '1', '', '', '2017-04-06 08:00:19'),
(10, 'sheldon cooper', 'scooper@tbbt.com', '45650b6f60fafe3b2544852ecc5848d0', '7', 'April', '1985', '1', '', '', '2017-04-06 08:00:19'),
(11, 'leonard', 'leonard@tbbt.com', '45650b6f60fafe3b2544852ecc5848d0', '8', 'April', '1989', '1', '', '', '2017-04-06 08:00:19'),
(12, 'clark kent', 'ckent@dailyplanet.com', 'f477f3a2793349d5903305d7bfa9d96d', '', '', '', '1', '29766', '0', '2017-04-06 17:13:29'),
(13, 'alicia dubnam', 'adubnam@hollywood.com', 'f477f3a2793349d5903305d7bfa9d96d', '', '', '', '0', '2920', '0', '2017-04-09 09:58:35');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user_images`
--

INSERT INTO `user_images` (`img_id`, `owner_id`, `image`, `img_type`) VALUES
(2, 1, 'uploads/emotion.jpg', 'profile'),
(3, 3, 'uploads/Agents-Of-Shield-HD-Wallpaper.jpg', 'profile'),
(4, 4, 'uploads/friendswithbenefitalbum.jpg', 'profile'),
(5, 11, 'uploads/71rqJDfMReL._SL1500_.jpg', 'profile'),
(6, 12, 'uploads/71rqJDfMReL._SL1500_.jpg', 'profile'),
(7, 5, 'uploads/222df830621a3a36f4fcf76938a17673.jpg', 'profile'),
(8, 9, 'uploads/tumblr_m9fymdRWI11qkzpbdo3_1280.jpg', 'profile'),
(9, 6, 'uploads/Aashiqui-2-17-h.jpg', 'profile'),
(10, 7, 'uploads/shield.jpg', 'profile');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `info_id` int(11) NOT NULL AUTO_INCREMENT,
  `university` varchar(100) NOT NULL,
  `college` varchar(100) NOT NULL,
  `highschool` varchar(100) NOT NULL,
  `primary` varchar(100) NOT NULL,
  `work` varchar(100) NOT NULL,
  `user_id` int(50) NOT NULL,
  `hobbies` varchar(100) NOT NULL,
  `likes` varchar(100) NOT NULL,
  PRIMARY KEY (`info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
