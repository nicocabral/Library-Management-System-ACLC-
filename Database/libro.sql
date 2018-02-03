-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 02, 2016 at 09:57 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `libro`
--
CREATE DATABASE IF NOT EXISTS `libro` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `libro`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `dateestab` date DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `dateestab`, `qty`, `status`) VALUES
(3, 'Phpmysql', ' php', '1989-10-02', 0, 'Out of Stock'),
(4, 'Javascript', 'java', '2000-10-03', 3, 'Available'),
(5, 'sample', 'sample', '1994-06-01', 1, 'Available'),
(6, 'Johhny pusong', 'johnny', '1999-10-10', 1, 'Available'),
(7, 'a', 'a', '2016-10-03', 1, 'Available'),
(8, 'book1', 'nico cabral', '1994-06-01', 1, 'Available'),
(9, 'Book2', 'CABRAL 2', '1994-01-06', 1, 'Available'),
(10, 'BOOK3', 'CABRAL3', '2016-10-05', 1, 'Available'),
(11, 'BOOK4', 'CABRAL4', '2015-10-12', 1, 'Available'),
(12, 'BOOK5', 'CABRAL5', '2010-10-21', 1, 'Available'),
(13, 'BOOK 6', 'CABRAL6', '2011-10-18', 2, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `isb`
--

CREATE TABLE IF NOT EXISTS `isb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bookid` int(11) DEFAULT NULL,
  `borrower_name` varchar(50) DEFAULT NULL,
  `b_id` varchar(100) DEFAULT NULL,
  `dateborrowed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `borrower_type` varchar(50) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `datereturn` date DEFAULT NULL,
  `isbstatus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `isb`
--

INSERT INTO `isb` (`id`, `bookid`, `borrower_name`, `b_id`, `dateborrowed`, `borrower_type`, `qty`, `address`, `datereturn`, `isbstatus`) VALUES
(6, 6, 'Juan Dela Cruz', '1234567890', '2016-10-02 06:14:22', 'Student', 1, 'Tacloban city', '2016-10-05', 'Return'),
(7, 7, 'Juan Dela Cruz ', '1234567890', '2016-10-02 07:59:06', 'Student', 1, 'Tacloban city', '2016-10-04', 'Issued');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `dep` varchar(50) DEFAULT NULL,
  `pos` varchar(50) DEFAULT NULL,
  `usertype` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `gender`, `dob`, `age`, `address`, `contact`, `dep`, `pos`, `usertype`, `username`, `password`) VALUES
(1, '  Nico Cabral', 'Male', '1994-01-06', 21, 'Tacloban City', '09369420867', '  Library', '  Librarian', 'admin', 'nico', 'nico'),
(2, 'Juan Dela Cruz ', 'Male', '1991-10-01', 20, 'Oh shit Avenue', '09369420867', 'School', 'Student', 'user', 'juan', 'juan');

-- --------------------------------------------------------

--
-- Table structure for table `userimg`
--

CREATE TABLE IF NOT EXISTS `userimg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `userimg`
--

INSERT INTO `userimg` (`id`, `userid`, `img`) VALUES
(1, 1, 'avatar/admin.png'),
(2, 2, 'avatar/flume.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
