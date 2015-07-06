-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2015 at 07:02 AM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `todo`
--
CREATE DATABASE IF NOT EXISTS `todo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `todo`;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(1, 'Group 1'),
(2, 'Group 2'),
(3, 'Group 3'),
(4, 'Group 4'),
(5, 'Group 5'),
(6, 'Group 6');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL DEFAULT '0',
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=77 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `body`, `created_on`, `updated_on`, `status`, `group_id`) VALUES
(4, 'Updating Task', '2015-06-23 00:42:33', '2015-07-03 08:14:28', 1, 4),
(24, 'New Task', '2015-06-24 00:42:46', '2015-06-25 07:35:04', 1, 4),
(26, 'test Group4', '2015-06-24 04:17:21', '2015-06-24 04:17:21', 0, 4),
(27, 'dfg', '2015-06-24 05:11:46', '2015-06-25 07:56:33', 1, 2),
(38, 'Checking new layout', '2015-06-24 08:28:37', '2015-06-25 07:35:08', 1, 3),
(42, 'No task in this group, lets add one now', '2015-06-24 23:57:35', '2015-06-24 23:57:35', 0, 6),
(43, 'new task', '2015-06-25 05:46:17', '2015-06-25 07:34:50', 1, 6),
(44, 'new task2', '2015-06-25 05:50:38', '2015-06-25 05:50:38', 0, 6),
(45, 'add again', '2015-06-25 05:54:27', '2015-06-25 05:54:27', 0, 6),
(47, 'asdasd', '2015-06-25 06:01:57', '2015-06-25 06:01:57', 0, 3),
(48, 'AZ', '2015-06-25 06:02:05', '2015-06-25 06:02:05', 0, 2),
(49, ' rert', '2015-06-25 06:02:31', '2015-06-25 06:02:31', 0, 3),
(50, 'lets change this', '2015-06-25 06:03:00', '2015-06-25 09:21:41', 1, 4),
(52, 'Final check - edited', '2015-06-25 09:23:19', '2015-06-25 09:23:34', 0, 4),
(54, 'おつかれさまです', '2015-06-26 08:37:46', '2015-07-03 11:12:45', 0, 1),
(55, 'いま　にほんご　で　も　かえる　できます。', '2015-06-26 08:39:15', '2015-07-03 08:08:26', 0, 1),
(59, 'Front-end for Add Groups Tab', '2015-06-29 01:57:32', '2015-07-03 11:12:44', 0, 1),
(60, 'Checking put request -2', '2015-06-29 01:58:38', '2015-06-29 08:44:00', 1, 4),
(67, 'task created using api - testing 3', '2015-06-30 00:48:39', '2015-06-30 00:48:39', 0, 2),
(68, 'task created using api - testing', '2015-06-30 01:04:09', '2015-06-30 01:04:09', 0, 2),
(69, 'Checking on server', '2015-06-30 01:06:56', '2015-07-06 05:50:58', 1, 1),
(73, 'task created using api - testing 6', '2015-06-30 01:11:10', '2015-06-30 01:11:10', 0, 2),
(76, 'Task created using API on C9 - edited', '2015-07-03 08:13:34', '2015-07-06 05:50:56', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
