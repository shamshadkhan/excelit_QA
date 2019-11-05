-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2014 at 02:38 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `excel`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_no` varchar(11) NOT NULL,
  `answer` text NOT NULL,
  `user` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `submitter_name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `question_no`, `answer`, `user`, `date`, `submitter_name`, `phone`, `email`) VALUES
(1, '1', ':p', 'excelit', '09/03/2014', '', '', ''),
(2, '2', ':D', 'excelit', '09/03/2014', '', '', ''),
(3, '2', ':D', 'excelit', '09/03/2014', '', '', ''),
(4, '1', ':@', 'excelit', '10/03/2014', 'shamskhan123', '01817009382', 'shamshad.cse90@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `startdate` varchar(100) NOT NULL,
  `enddate` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `startdate`, `enddate`, `date`, `user`) VALUES
(1, '-----BRAIN TEASER-----\r\nyoure inside the car you see three\r\nspecial\r\ndoors...\r\n1st door--full of jewelries...\r\n2nd doors--have three luxuries cars\r\ninside\r\n3rd doors --a lots of dollars inside\r\nwhat will be the first door you will\r\ngoing to open?', '03/10/2014', '03/13/2014', '09-03-2014', 'excelit'),
(2, 'IPv4 and IPv6. One of the Network Connection info picture is attached here. \r\n', '03/10/2014 1:30 AM', '03/15/2014 1:30 AM', '09/03/2014', 'excelit'),
(3, 'Hei', '8/3/2014', '13/3/2014', '10/03/2014', 'excelit'),
(4, 'test -_-', '03/08/2014', '03/13/2014', '10/03/2014', 'excelit');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'excelit', '2ff707bf3f531f96ef0737e486be5d7f');

-- --------------------------------------------------------

--
-- Table structure for table `winner`
--

CREATE TABLE IF NOT EXISTS `winner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_no` text NOT NULL,
  `winner` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `winner`
--

INSERT INTO `winner` (`id`, `question_no`, `winner`, `date`, `user`) VALUES
(1, '1', 'ABC', '09/03/2014', 'excelit'),
(2, '', 'shamskhan123', '10/03/2014', 'excelit'),
(3, '1', 'shamskhan123', '10/03/2014', 'excelit');
