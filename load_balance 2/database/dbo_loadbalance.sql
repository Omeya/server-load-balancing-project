-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 20, 2013 at 03:25 PM
-- Server version: 5.1.36
-- PHP Version: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbo_loadbalance`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `password`) VALUES
(1, 'admin123', 'test123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_audio`
--

CREATE TABLE IF NOT EXISTS `tbl_audio` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `audios` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_audio`
--

INSERT INTO `tbl_audio` (`id`, `audios`) VALUES
(1, 'khamoshi4(www.songs.pk).mp3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_files`
--

CREATE TABLE IF NOT EXISTS `tbl_files` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `file` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_files`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_server`
--

CREATE TABLE IF NOT EXISTS `tbl_server` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `server` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `bandwidth` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_server`
--

INSERT INTO `tbl_server` (`id`, `server`, `ip`, `bandwidth`) VALUES
(1, 'server 1', '192.168.0.108', '100 kbps');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `Emailid` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `Name`, `ip`, `Emailid`, `Username`, `Password`) VALUES
(1, 'abc', '192.168.0.111', 'abc@gmail.com', 'abc', 'abc'),
(2, 'ajay', '192.168.0.110', 'ajay@gmail.com', 'ajay', 'ajay'),
(3, 'somil', '192.168.0.110', 'ajay@gmail.com', 'somil', 'somil');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE IF NOT EXISTS `tbl_video` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `video` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`id`, `video`) VALUES
(1, 'Shaftalign.avi');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`) VALUES
(1, 'ip1');
