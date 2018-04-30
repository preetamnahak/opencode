-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2018 at 12:28 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `opencode`
--

-- --------------------------------------------------------

--
-- Table structure for table `club_projects`
--

CREATE TABLE IF NOT EXISTS `club_projects` (
  `pro_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pro_title` longtext CHARACTER SET utf8 NOT NULL,
  `pro_desc` longtext CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `club_projects`
--

INSERT INTO `club_projects` (`pro_id`, `pro_title`, `pro_desc`) VALUES
(1, 'OpenCodeWeb', 'Inspired from Iron Man''s Friday, Saturday is a web app that lets us build complete website on the browser itself using voice commands. It uses p5 speech engine to recognize voice and javascript to render commands and elements to the webpage.'),
(2, 'Chessbot', 'Inspired from Iron Man''s Friday, Saturday is a web app that lets us build complete website on the browser itself using voice commands. It uses p5 speech engine to recognize voice and javascript to render commands and elements to the webpage.'),
(3, 'Minipaint', 'This version of the classic paint app with a few interesting twists to the classic features and some extra interactive features to make the user experience more involving.It is coded from scratch in Java in BlueJ IDE and the interface primarily uses awt and swing libraries of Java 7.0.');

-- --------------------------------------------------------

--
-- Table structure for table `cmsadmin`
--

CREATE TABLE IF NOT EXISTS `cmsadmin` (
  `admin_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` longtext NOT NULL,
  `password` longtext NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cmsadmin`
--

INSERT INTO `cmsadmin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `student_project_idea`
--

CREATE TABLE IF NOT EXISTS `student_project_idea` (
  `project_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) NOT NULL,
  `project_title` longtext CHARACTER SET utf8 NOT NULL,
  `project_desc` longtext CHARACTER SET utf8 NOT NULL,
  `status` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT 'Pending',
  `date_of_sub` date NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `student_project_idea`
--

INSERT INTO `student_project_idea` (`project_id`, `student_id`, `project_title`, `project_desc`, `status`, `date_of_sub`) VALUES
(6, 1, 'ABC', 'BCD', 'Approved', '0000-00-00'),
(7, 1, 'KNGDLKFS', 'GKJNFSLD', 'Approved', '0000-00-00'),
(8, 1, 'AAAA', 'AAAAA', 'Approved', '0000-00-00'),
(11, 1, 'JHK', 'RTYTKL', 'Approved', '0000-00-00'),
(12, 4, 'Afghj', 'fjwhdk', 'Approved', '0000-00-00'),
(14, 4, 'ADDD', 'FAGHJM<', 'Approved', '0000-00-00'),
(15, 4, 'ADD', 'GN ', 'Declined', '0000-00-00'),
(16, 1, 'vhscknl', 'hfbscl,', 'Declined', '0000-00-00'),
(17, 1, 'AFGH', 'DATE', 'Approved', '2018-03-17'),
(18, 1, 'dfhg', '\\sk', 'Declined', '2018-03-17'),
(19, 1, 'hdaj', 'dfwwgsjk', 'Declined', '2018-03-18'),
(20, 1, 'svsj', 'sgdyahkj', 'Declined', '2018-03-18'),
(21, 1, 'sgcydhk', 'sdjlkm', 'Approved', '2018-03-18'),
(22, 1, 'FGHJK', 'DXFGFHJBK', 'Approved', '2018-03-18'),
(23, 1, 'ADFG', 'CFGHJK', 'Declined', '2018-03-18'),
(25, 1, 'dssfgdh', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Approved', '2018-03-18'),
(26, 1, 'afsbdn', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Declined', '2018-03-18'),
(28, 4, 'minimillitia', 'Game app', 'Approved', '2018-03-18'),
(29, 0, 'dvhfuskjlm', 'vfsd.,a.j,nkm.lknlasvjkb/FC;', 'Pending', '2018-03-19'),
(30, 1, 'Adfghjkklll;;', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Declined', '2018-03-22'),
(31, 0, 'All', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Pending', '2018-03-22'),
(32, 1, 'New   project', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Approved', '2018-03-22'),
(33, 1, 'ASF', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Declined', '2018-03-22'),
(34, 1, 'ASDFpp', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Approved', '2018-03-22'),
(35, 4, 'MY P', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Approved', '2018-03-22'),
(36, 4, 'New', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Approved', '2018-03-22'),
(37, 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Approved', '2018-03-22'),
(38, 0, 'HOSPITAL', ' A HOSPITAL TO BE DESSIGNED CONTAINING SPECIAL FACILITIES NDDDDDD Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 'Pending', '2018-03-22'),
(39, 4, 'AFGH', 'hskjm', 'Declined', '2018-03-22'),
(40, 4, 'ywhdkj', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 'Approved', '2018-03-22'),
(41, 4, 'BUILDING', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 'Approved', '2018-03-22'),
(42, 1, 'skfnl', 'gsyufeioaj;l,', 'Pending', '2018-03-22'),
(43, 3, 'PROJECT 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Approved', '2018-03-24'),
(44, 3, 'project 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Declined', '2018-03-24'),
(45, 4, 'NEW ONE', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Approved', '2018-03-25'),
(46, 4, 'NEW ONE !', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Declined', '2018-03-25'),
(47, 4, 'NEW ONE 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Approved', '2018-03-25'),
(48, 3, 'NEW ONE', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Approved', '2018-03-25'),
(49, 3, 'NEW 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Approved', '2018-03-25'),
(50, 3, 'A', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Declined', '2018-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE IF NOT EXISTS `student_registration` (
  `reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext NOT NULL,
  `roll_no` longtext NOT NULL,
  `email` longtext NOT NULL,
  `password` longtext NOT NULL,
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`reg_id`, `name`, `roll_no`, `email`, `password`) VALUES
(1, 'Preetam Keshari Nahak', 'student1', 'aaa', 'pass'),
(3, 'Ajit Kumar Behera', '116CS0165', 'aj@gmail.com', 'aaa'),
(4, 'Aman Gupta', '416CY5005', 'ag@gmail.com', 'a'),
(10, 'sfda', 'dweft', 'grfsed@ghjk.com', 'a');
