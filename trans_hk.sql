-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2016 at 05:10 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `trans_findings`
--

CREATE TABLE IF NOT EXISTS `trans_findings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `inspected_by` varchar(10) NOT NULL,
  `inspected_by2` varchar(10) NOT NULL,
  `date_filed` date NOT NULL,
  `locale_id` varchar(20) NOT NULL,
  `room_id` int(11) NOT NULL,
  `cleaning_type_id` tinyint(2) NOT NULL,
  `room_status_id` tinyint(2) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `responsible_id` varchar(10) NOT NULL,
  `responsible_id2` varchar(10) NOT NULL,
  `category_id` int(11) NOT NULL,
  `onsite_employees` varchar(250) NOT NULL,
  `area_id` int(11) NOT NULL,
  `sub_area_id` int(11) NOT NULL,
  `particular_id` int(11) NOT NULL,
  `findings_id` int(11) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `sub_category` varchar(250) NOT NULL,
  `no_findings_flag` tinyint(4) NOT NULL,
  `dup_ref` varchar(200) NOT NULL,
  `findings_na` varchar(250) NOT NULL,
  `points` decimal(5,2) NOT NULL,
  `grade` decimal(5,2) NOT NULL,
  `rating` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=133429 ;

-- --------------------------------------------------------

--
-- Table structure for table `trans_findings_master`
--

CREATE TABLE IF NOT EXISTS `trans_findings_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_id` int(11) NOT NULL,
  `date_filed` date NOT NULL,
  `locale_id` varchar(10) NOT NULL,
  `shift_id` tinyint(2) NOT NULL,
  `room_id` int(11) NOT NULL,
  `inspected_by` varchar(10) NOT NULL,
  `inspected_by2` varchar(10) NOT NULL,
  `responsible_id` varchar(10) NOT NULL,
  `responsible_id2` varchar(10) NOT NULL,
  `khelper_id1` varchar(10) NOT NULL,
  `khelper_id2` varchar(10) NOT NULL,
  `khelper_id3` varchar(10) NOT NULL,
  `khelper_id4` varchar(10) NOT NULL,
  `khelper_id5` varchar(10) NOT NULL,
  `cleaning_type_id` tinyint(2) NOT NULL,
  `room_status_id` tinyint(2) NOT NULL,
  `onsite_employees` varchar(250) NOT NULL,
  `remarks` tinytext NOT NULL,
  `perfect_points` decimal(5,2) NOT NULL,
  `earned_points` decimal(5,2) NOT NULL,
  `mnc_points` int(11) NOT NULL,
  `nc_points` int(11) NOT NULL,
  `loss_points` varchar(50) NOT NULL,
  `grade` decimal(5,2) NOT NULL,
  `rating` varchar(2) NOT NULL,
  `findings_na` varchar(250) NOT NULL,
  `no_findings_flag` tinyint(2) NOT NULL,
  `is_dup` tinyint(2) NOT NULL,
  `isDone` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81229 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
