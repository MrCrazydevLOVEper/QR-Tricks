-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2025 at 05:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qr_tricks`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `name`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `form_id` int(11) NOT NULL,
  `inv_type` varchar(50) NOT NULL,
  `inv_name` varchar(100) NOT NULL,
  `inv_img` text DEFAULT NULL,
  `inv_user_price` varchar(10) NOT NULL,
  `inv_vendor_price` varchar(10) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`form_id`, `inv_type`, `inv_name`, `inv_img`, `inv_user_price`, `inv_vendor_price`, `flag`) VALUES
(1, 'wedding', 'Wedding Invitation', 'uploads/invitation/1.png', '30', '5', 1),
(2, 'wedding', 'Wedding Invitation', 'uploads/invitation/2.png', '30', '5', 1),
(3, 'wedding', 'Wedding Invitation', 'uploads/invitation/3.png', '30', '5', 1),
(4, 'wedding', 'Wedding Invitation', 'uploads/invitation/4.png', '30', '5', 1),
(5, 'wedding', 'Wedding Invitation', 'uploads/invitation/5.png', '30', '5', 1),
(6, 'wedding', 'Wedding Invitation', 'uploads/invitation/6.png', '30', '5', 1),
(7, 'wedding', 'Wedding Invitation', 'uploads/invitation/7.png', '30', '5', 1),
(8, 'wedding', 'Wedding Invitation', 'uploads/invitation/8.png', '30', '5', 1),
(9, 'wedding', 'Wedding Invitation', 'uploads/invitation/9.png', '30', '5', 1),
(10, 'wedding', 'Wedding Invitation', 'uploads/invitation/10.png', '30', '5', 1),
(11, 'business', 'Business Cards', 'uploads/business-invitation-sample1.png', '30', '10', 1),
(12, 'business', 'Business Cards', 'uploads/business-invitation-sample1.png', '30', '10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gift`
--

CREATE TABLE `gift` (
  `gift_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `image` text NOT NULL,
  `link` text NOT NULL,
  `flag` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gift`
--

INSERT INTO `gift` (`gift_id`, `name`, `image`, `link`, `flag`) VALUES
(1, 'Wood Frame', 'uploads/wood-frame.jpg', 'http://localhost/phpmyadmin/sql.php', 1),
(2, 'Wood Craft', 'uploads/wood-craft.jpg', 'http://localhost/phpmyadmin/sql.php', 1),
(3, 'Wood Clock', 'uploads/wood-clock.png', 'http://localhost/projects/invitation-maker/', 1),
(4, 'Wood Clock-1', 'uploads/wood-clock.png', 'http://localhost/projects/invitation-maker/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invitation`
--

CREATE TABLE `invitation` (
  `id` int(11) NOT NULL,
  `form_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `info` text NOT NULL,
  `custom_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invitation`
--

INSERT INTO `invitation` (`id`, `form_id`, `user_id`, `info`, `custom_url`, `created_at`, `token`) VALUES
(1, '1', '1', '{\"groom\":\"Boy\",\"bride\":\"Girl\",\"date\":\"17\",\"month\":\"04\",\"year\":\"2025\",\"from\":\"7:30am\",\"to\":\"8:30am\",\"venue\":\"Chennai\",\"contact\":\"9876543210\",\"location\":\"http://localhost/projects/invitation-maker/\",\"message\":\"check\",\"token\":\"66b77e3def8ef\",\"user_id\":1,\"form_id\":1}', 'http://localhost/projects/invitation-maker/Invitation/invitationInformation/inv-1-1-1', '2024-08-10 15:22:02', '66b77e3def8ef'),
(4, '1', '2', '{\"groom\":\"Boy\",\"bride\":\"Girl\",\"date\":\"12\",\"month\":\"12\",\"year\":\"2025\",\"from\":\"7:30am\",\"to\":\"8:30am\",\"venue\":\"Chennai\",\"contact\":\"9876543210\",\"location\":\"http://localhost/projects/invitation-maker/\",\"message\":\"test\",\"token\":\"66b7822c2d962\",\"form_id\":\"1\"}', 'http://localhost/projects/invitation-maker/Invitation/invitationInformation/inv-1-2-4', '2024-08-11 13:00:02', '66b7822c2d962'),
(5, '2', '2', '{\"owner_name\":\"Rechecy\",\"business_name\":\"RND\",\"date\":\"12\",\"month\":\"12\",\"year\":\"2024\",\"from\":\"7:30am\",\"to\":\"8:30am\",\"address\":\"test\",\"wano\":\"+3245644\",\"fb\":\"facebook.com\",\"insta\":\"instagram.com\",\"yt\":\"youtube.com\",\"twitter\":\"twitter.com\",\"location\":\"http://localhost/projects/invitation-maker/\",\"message\":\"test\",\"token\":\"66b7822c2d962\",\"form_id\":2,\"file\":\"uploads/logo/Wiuy17233818765loB.png\"}', 'http://localhost/projects/invitation-maker/Invitation/invitationInformation/inv-2-2-5', '2024-08-11 13:11:16', '66b7822c2d962'),
(6, '1', '3', '{\"groom\":\"Boy\",\"bride\":\"Girl\",\"date\":\"11\",\"month\":\"11\",\"year\":\"2025\",\"from\":\"7:30am\",\"to\":\"8:30am\",\"venue\":\"Chennai\",\"contact\":\"9876543210\",\"location\":\"32ww\",\"message\":\"333\",\"token\":\"66b8bd80a10e3\",\"form_id\":\"1\"}', 'http://localhost/projects/invitation-maker/Invitation/invitationInformation/inv-1-3-6', '2024-08-11 13:33:53', '66b8bd80a10e3'),
(7, '1', '4', '{\"groom\":\"Boy\",\"bride\":\"Girl\",\"date\":\"12\",\"month\":\"12\",\"year\":\"2024\",\"from\":\"7:30am\",\"to\":\"8:30am\",\"venue\":\"Chennai\",\"contact\":\"9876543210\",\"location\":\"http://localhost/projects/invitation-maker/\",\"message\":\"rest\",\"token\":\"66b9d62695ad4\",\"form_id\":\"1\"}', 'http://localhost/projects/invitation-maker/Invitation/invitationInformation/inv-1-4-7', '2024-08-12 09:34:47', '66b9d62695ad4'),
(8, '1', '1', '{\"groom\":\"mani\",\"bride\":\"bbbb\",\"date\":\"11\",\"month\":\"11\",\"year\":\"2024\",\"from\":\"7:30 am\",\"to\":\"9:30 am\",\"venue\":\"chennai\",\"contact\":\"8489391945\",\"location\":\"https://maps.app.goo.gl/EghapNBRq2PNHbb18\",\"message\":\"Look at me..\",\"token\":\"66b77e3def8ef\",\"form_id\":\"1\"}', 'http://192.168.1.8/projects/invitation-maker/Invitation/invitationInformation/inv-1-1-8', '2024-12-30 07:48:35', '66b77e3def8ef'),
(9, '1', '1', '{\"groom\":\"Manivelan\",\"bride\":\"Ajitha\",\"date\":\"01\",\"month\":\"12\",\"year\":\"1025\",\"from\":\"7:30 am\",\"to\":\"9:30 am\",\"venue\":\"Mayikunju Kovil, Vedaranyama, Nagapattinam\",\"contact\":\"8489391945\",\"location\":\"https://maps.app.goo.gl/EghapNBRq2PNHbb18\",\"message\":\"Ellarum vanga\",\"token\":\"66b77e3def8ef\",\"form_id\":\"1\"}', 'http://localhost/projects/invitation-maker/Invitation/invitationInformation/inv-1-1-9', '2024-12-30 10:36:38', '66b77e3def8ef'),
(10, '8', '1', '{\"groom\":\"Ambikapathi\",\"bride\":\"Vijaya\",\"date\":\"20\",\"month\":\"05\",\"year\":\"1999\",\"from\":\"7:30 am\",\"to\":\"9:30 am\",\"venue\":\"Vedaranyam\",\"contact\":\"8489391945\",\"location\":\"https://maps.app.goo.gl/ZBUdnmEYsbSi2i6u5\",\"message\":\"test\",\"token\":\"66b77e3def8ef\",\"form_id\":\"8\"}', 'http://localhost/projects/invitation-maker/Invitation/invitationInformation/inv-8-1-10', '2025-02-09 17:29:49', '66b77e3def8ef'),
(11, '8', '1', '{\"groom\":\"Manivelan\",\"bride\":\"Ajitha\",\"date\":\"11\",\"month\":\"11\",\"year\":\"1111\",\"from\":\"7:30 am\",\"to\":\"9:30 am\",\"venue\":\"Mayikunju Kovil, Vedaranyama, Nagapattinam\",\"contact\":\"8489391945\",\"location\":\"111\",\"message\":\"11\",\"token\":\"66b77e3def8ef\",\"form_id\":\"8\"}', 'http://localhost/projects/invitation-maker/Invitation/invitationInformation/inv-8-1-11', '2025-02-20 08:39:14', '66b77e3def8ef'),
(12, '6', '1', '{\"groom\":\"Manivelan\",\"bride\":\"Ajitha\",\"date\":\"11\",\"month\":\"11\",\"year\":\"11\",\"from\":\"7:30 am\",\"to\":\"9:30 am\",\"venue\":\"Mayikunju Kovil, Vedaranyama, Nagapattinam\",\"contact\":\"8489391945\",\"location\":\"dd\",\"message\":\"dd\",\"token\":\"66b77e3def8ef\",\"form_id\":\"6\"}', 'http://localhost/projects/invitation-maker/Invitation/invitationInformation/inv-6-1-12', '2025-02-20 09:01:04', '66b77e3def8ef'),
(13, '3', '1', '{\"groom\":\"Ambikapathi\",\"bride\":\"vijaya\",\"date\":\"10\",\"month\":\"10\",\"year\":\"2025\",\"from\":\"7:30 am\",\"to\":\"9:30 am\",\"venue\":\"Mayikunju Kovil, Vedaranyama, Nagapattinam\",\"contact\":\"8489391945\",\"location\":\"link\",\"message\":\"test\",\"token\":\"66b77e3def8ef\",\"form_id\":\"3\"}', 'http://localhost/projects/invitation-maker/Invitation/invitationInformation/inv-3-1-13', '2025-02-20 09:26:02', '66b77e3def8ef');

-- --------------------------------------------------------

--
-- Table structure for table `saved_list`
--

CREATE TABLE `saved_list` (
  `list_id` int(11) NOT NULL,
  `token` varchar(40) NOT NULL,
  `invitation_id` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saved_list`
--

INSERT INTO `saved_list` (`list_id`, `token`, `invitation_id`, `created_at`) VALUES
(40, '66b77e3def8ef', '6', '2025-02-09 17:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `bname` varchar(255) DEFAULT NULL,
  `baddress` text DEFAULT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'U',
  `otp` varchar(4) NOT NULL,
  `others` text DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `token` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `mobile`, `district`, `state`, `bname`, `baddress`, `type`, `otp`, `others`, `created`, `token`) VALUES
(1, 'Manivelan', '8489391945', 'Chennai', 'Tamilnadu', NULL, NULL, 'U', '1758', NULL, '2024-08-10 14:50:37', '66b77e3def8ef'),
(2, 'Premium', '8489391946', 'chennai', 'india', 'IT', 'Chennai', 'V', '9824', NULL, '2024-08-10 15:07:24', '66b7822c2d962'),
(3, 'Register', '8796543210', '123', '1233', NULL, NULL, 'U', '4432', NULL, '2024-08-11 13:32:48', '66b8bd80a10e3'),
(4, 'Manivelan', '9842616693', 'Nagapatainam', 'taminadu', NULL, NULL, 'U', '6900', NULL, '2024-08-12 09:30:14', '66b9d62695ad4'),
(5, 'ragu', '9629861885', 'ww', 'ww', NULL, NULL, 'U', '6685', NULL, '2024-10-07 10:06:16', '6703b2982b7cd');

-- --------------------------------------------------------

--
-- Table structure for table `view_history`
--

CREATE TABLE `view_history` (
  `hid` int(11) NOT NULL,
  `token` varchar(20) NOT NULL,
  `page` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `view_history`
--

INSERT INTO `view_history` (`hid`, `token`, `page`, `timestamp`) VALUES
(1, '66b77e3def8ef', 'savedinvitationcards', '2024-09-29 09:08:15'),
(2, '66b77e3def8ef', 'savedinvitationcards', '2024-09-29 09:08:52'),
(3, '66b77e3def8ef', 'savedbusinesscards', '2024-09-29 09:09:03'),
(4, '66b77e3def8ef', 'myinvitationcards', '2024-09-30 09:09:11'),
(5, '66b77e3def8ef', 'mybusinesscards', '2024-09-30 09:09:15'),
(6, '66b77e3def8ef', 'weddinginvitations', '2024-09-30 09:11:43'),
(7, '66b77e3def8ef', 'businesscards', '2024-09-30 09:11:50'),
(8, '6703b2982b7cd', 'weddinginvitations', '2024-10-07 10:07:01'),
(9, '6703b2982b7cd', 'businesscards', '2024-10-07 10:07:04'),
(10, '6703b2982b7cd', 'myinvitationcards', '2024-10-07 10:07:08'),
(11, '6703b2982b7cd', 'weddinginvitations', '2024-10-07 10:56:51'),
(12, '6703b2982b7cd', 'myinvitationcards', '2024-10-07 10:57:38'),
(13, '6703b2982b7cd', 'weddinginvitations', '2024-10-07 12:59:46'),
(14, '66b77e3def8ef', 'weddinginvitations', '2024-11-21 15:41:53'),
(15, '66b77e3def8ef', 'businesscards', '2024-11-21 15:42:00'),
(16, '66b77e3def8ef', 'savedinvitationcards', '2024-11-21 15:42:25'),
(17, '66b77e3def8ef', 'savedbusinesscards', '2024-11-21 15:42:35'),
(18, '66b77e3def8ef', 'myinvitationcards', '2024-11-21 15:42:39'),
(19, '66b77e3def8ef', 'mybusinesscards', '2024-11-21 15:42:46'),
(20, '66b77e3def8ef', 'savedinvitationcards', '2024-11-21 16:50:54'),
(21, '66b77e3def8ef', 'businesscards', '2024-11-23 07:30:05'),
(22, '66b77e3def8ef', 'weddinginvitations', '2024-11-23 07:47:08'),
(23, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 08:15:38'),
(24, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 08:23:14'),
(25, '66b77e3def8ef', 'mybusinesscards', '2024-11-23 08:23:25'),
(26, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 08:24:10'),
(27, '66b77e3def8ef', 'mybusinesscards', '2024-11-23 08:24:12'),
(28, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 08:24:55'),
(29, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 08:25:01'),
(30, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 08:25:41'),
(31, '66b77e3def8ef', 'mybusinesscards', '2024-11-23 08:25:48'),
(32, '66b77e3def8ef', 'mybusinesscards', '2024-11-23 08:38:37'),
(33, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 08:38:38'),
(34, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 08:38:47'),
(35, '66b77e3def8ef', 'weddinginvitations', '2024-11-23 08:43:05'),
(36, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 08:45:01'),
(37, '66b77e3def8ef', 'mybusinesscards', '2024-11-23 08:45:04'),
(38, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 08:45:06'),
(39, '66b77e3def8ef', 'mybusinesscards', '2024-11-23 08:45:08'),
(40, '66b77e3def8ef', 'weddinginvitations', '2024-11-23 08:49:25'),
(41, '66b77e3def8ef', 'weddinginvitations', '2024-11-23 08:51:00'),
(42, '66b77e3def8ef', 'weddinginvitations', '2024-11-23 08:51:25'),
(43, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:20:06'),
(44, '66b77e3def8ef', 'mybusinesscards', '2024-11-23 09:20:08'),
(45, '66b77e3def8ef', 'weddinginvitations', '2024-11-23 09:20:17'),
(46, '66b77e3def8ef', 'weddinginvitations', '2024-11-23 09:20:38'),
(47, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:20:57'),
(48, '66b77e3def8ef', 'mybusinesscards', '2024-11-23 09:21:00'),
(49, '66b77e3def8ef', 'myinvitationcards', '2024-11-23 09:21:20'),
(50, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:21:23'),
(51, '66b77e3def8ef', 'mybusinesscards', '2024-11-23 09:21:24'),
(52, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:21:26'),
(53, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:21:46'),
(54, '66b77e3def8ef', 'weddinginvitations', '2024-11-23 09:22:12'),
(55, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:22:17'),
(56, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:25:52'),
(57, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:30:14'),
(58, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:34:36'),
(59, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:34:51'),
(60, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:37:52'),
(61, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:39:18'),
(62, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:39:30'),
(63, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:39:48'),
(64, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:41:08'),
(65, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:41:33'),
(66, '66b77e3def8ef', 'weddinginvitations', '2024-11-23 09:41:38'),
(67, '66b77e3def8ef', 'weddinginvitations', '2024-11-23 09:42:50'),
(68, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:42:53'),
(69, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:44:04'),
(70, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:44:55'),
(71, '66b77e3def8ef', 'businesscards', '2024-11-23 09:45:09'),
(72, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:45:11'),
(73, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:45:49'),
(74, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:45:57'),
(75, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:46:19'),
(76, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:47:19'),
(77, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:48:00'),
(78, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:49:05'),
(79, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:50:24'),
(80, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:51:15'),
(81, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:53:02'),
(82, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:53:52'),
(83, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:54:22'),
(84, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:54:50'),
(85, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:55:19'),
(86, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:55:44'),
(87, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:56:00'),
(88, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:56:29'),
(89, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:56:51'),
(90, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:57:01'),
(91, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:57:04'),
(92, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:57:30'),
(93, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:57:35'),
(94, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 09:57:45'),
(95, '66b77e3def8ef', 'mybusinesscards', '2024-11-23 09:57:46'),
(96, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 10:06:54'),
(97, '66b77e3def8ef', 'mybusinesscards', '2024-11-23 10:47:10'),
(98, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 10:47:12'),
(99, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 10:59:13'),
(100, '66b77e3def8ef', 'weddinginvitations', '2024-11-23 11:22:21'),
(101, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 11:22:29'),
(102, '66b77e3def8ef', 'weddinginvitations', '2024-11-23 11:22:43'),
(103, '66b77e3def8ef', 'weddinginvitations', '2024-11-23 11:23:13'),
(104, '66b77e3def8ef', 'weddinginvitations', '2024-11-23 11:23:26'),
(105, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 11:24:30'),
(106, '66b77e3def8ef', 'weddinginvitations', '2024-11-23 11:24:55'),
(107, '66b77e3def8ef', 'weddinginvitations', '2024-11-23 11:25:03'),
(108, '66b77e3def8ef', 'weddinginvitations', '2024-11-23 11:25:53'),
(109, '66b77e3def8ef', 'businesscards', '2024-11-23 11:26:09'),
(110, '66b77e3def8ef', 'weddinginvitations', '2024-11-23 11:28:12'),
(111, '66b77e3def8ef', 'businesscards', '2024-11-23 11:28:30'),
(112, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 11:30:21'),
(113, '66b77e3def8ef', 'mybusinesscards', '2024-11-23 11:30:22'),
(114, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 11:30:27'),
(115, '66b77e3def8ef', 'mybusinesscards', '2024-11-23 11:30:34'),
(116, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 11:30:35'),
(117, '66b77e3def8ef', 'mybusinesscards', '2024-11-23 11:30:40'),
(118, '66b77e3def8ef', 'weddinginvitations', '2024-11-23 12:31:31'),
(119, '66b77e3def8ef', 'mybusinesscards', '2024-11-23 12:31:42'),
(120, '66b77e3def8ef', 'savedinvitationcards', '2024-11-23 12:31:46'),
(121, '66b77e3def8ef', 'weddinginvitations', '2024-11-23 12:32:03'),
(122, '66b77e3def8ef', 'weddinginvitations', '2024-11-23 12:32:21'),
(123, '66b77e3def8ef', 'businesscards', '2024-12-30 04:51:15'),
(124, '66b77e3def8ef', 'weddinginvitations', '2024-12-30 04:55:18'),
(125, '66b77e3def8ef', 'weddinginvitations', '2024-12-30 07:46:55'),
(126, '66b77e3def8ef', 'savedinvitationcards', '2024-12-30 07:52:17'),
(127, '66b77e3def8ef', 'businesscards', '2024-12-30 07:52:55'),
(128, '66b77e3def8ef', 'savedinvitationcards', '2024-12-30 08:10:19'),
(129, '66b77e3def8ef', 'mybusinesscards', '2024-12-30 08:10:28'),
(130, '66b77e3def8ef', 'weddinginvitations', '2024-12-30 08:11:32'),
(131, '66b77e3def8ef', 'businesscards', '2024-12-30 08:13:43'),
(132, '66b77e3def8ef', 'savedinvitationcards', '2024-12-30 08:13:59'),
(133, '66b77e3def8ef', 'savedinvitationcards', '2024-12-30 08:14:06'),
(134, '66b77e3def8ef', 'savedbusinesscards', '2024-12-30 08:14:18'),
(135, '66b77e3def8ef', 'savedinvitationcards', '2024-12-30 08:14:22'),
(136, '66b77e3def8ef', 'savedinvitationcards', '2024-12-30 08:14:29'),
(137, '66b77e3def8ef', 'savedbusinesscards', '2024-12-30 08:14:34'),
(138, '66b77e3def8ef', 'myinvitationcards', '2024-12-30 08:14:37'),
(139, '66b77e3def8ef', 'businesscards', '2024-12-30 08:33:15'),
(140, '66b77e3def8ef', 'weddinginvitations', '2024-12-30 08:33:23'),
(141, '66b77e3def8ef', 'savedinvitationcards', '2024-12-30 08:33:28'),
(142, '66b77e3def8ef', 'weddinginvitations', '2024-12-30 08:33:31'),
(143, '66b77e3def8ef', 'savedinvitationcards', '2024-12-30 08:33:42'),
(144, '66b77e3def8ef', 'savedinvitationcards', '2024-12-30 08:34:17'),
(145, '66b77e3def8ef', 'weddinginvitations', '2024-12-30 10:35:25'),
(146, '66b77e3def8ef', 'weddinginvitations', '2024-12-30 10:51:40'),
(147, '66b77e3def8ef', 'savedinvitationcards', '2024-12-30 10:54:50'),
(148, '66b77e3def8ef', 'mybusinesscards', '2024-12-30 10:54:52'),
(149, '66b77e3def8ef', 'weddinginvitations', '2024-12-30 10:56:49'),
(150, '66b77e3def8ef', 'savedinvitationcards', '2024-12-30 10:57:05'),
(151, '66b77e3def8ef', 'savedinvitationcards', '2024-12-30 11:10:13'),
(152, '66b77e3def8ef', 'savedinvitationcards', '2024-12-30 11:14:52'),
(153, '66b77e3def8ef', 'savedbusinesscards', '2024-12-30 11:15:17'),
(154, '66b77e3def8ef', 'weddinginvitations', '2024-12-30 11:17:10'),
(155, '66b77e3def8ef', 'savedinvitationcards', '2024-12-30 11:17:15'),
(156, '66b77e3def8ef', 'weddinginvitations', '2024-12-30 11:18:05'),
(157, '66b77e3def8ef', 'savedinvitationcards', '2024-12-30 11:19:46'),
(158, '66b77e3def8ef', 'weddinginvitations', '2024-12-30 11:19:55'),
(159, '66b77e3def8ef', 'savedinvitationcards', '2024-12-30 11:20:09'),
(160, '66b77e3def8ef', 'savedinvitationcards', '2024-12-30 11:35:20'),
(161, '66b77e3def8ef', 'savedinvitationcards', '2024-12-30 11:40:36'),
(162, '66b77e3def8ef', 'weddinginvitations', '2024-12-30 11:40:41'),
(163, '66b77e3def8ef', 'savedinvitationcards', '2024-12-30 11:40:46'),
(164, '66b77e3def8ef', 'businesscards', '2024-12-30 11:40:51'),
(165, '66b77e3def8ef', 'businesscards', '2024-12-30 11:40:56'),
(166, '66b77e3def8ef', 'businesscards', '2024-12-30 11:41:07'),
(167, '66b77e3def8ef', 'savedbusinesscards', '2024-12-30 11:41:11'),
(168, '66b77e3def8ef', 'businesscards', '2024-12-30 11:41:58'),
(169, '66b77e3def8ef', 'savedbusinesscards', '2024-12-30 11:42:07'),
(170, '66b77e3def8ef', 'savedbusinesscards', '2024-12-30 12:33:26'),
(171, '66b77e3def8ef', 'businesscards', '2024-12-30 12:33:35'),
(172, '66b77e3def8ef', 'savedbusinesscards', '2024-12-30 12:33:46'),
(173, '66b77e3def8ef', 'businesscards', '2024-12-30 12:33:58'),
(174, '66b77e3def8ef', 'businesscards', '2024-12-30 12:34:13'),
(175, '66b77e3def8ef', 'businesscards', '2024-12-30 12:34:25'),
(176, '66b77e3def8ef', 'savedbusinesscards', '2024-12-30 12:34:31'),
(177, '66b77e3def8ef', 'savedbusinesscards', '2024-12-30 13:02:39'),
(178, '66b77e3def8ef', 'businesscards', '2024-12-30 13:02:46'),
(179, '66b77e3def8ef', 'savedbusinesscards', '2024-12-30 13:03:22'),
(180, '66b77e3def8ef', 'savedbusinesscards', '2024-12-30 13:04:36'),
(181, '66b77e3def8ef', 'savedinvitationcards', '2024-12-30 13:04:52'),
(182, '66b77e3def8ef', 'myinvitationcards', '2024-12-30 13:04:58'),
(183, '66b77e3def8ef', 'weddinginvitations', '2024-12-30 13:06:07'),
(184, '66b77e3def8ef', 'weddinginvitations', '2025-02-09 17:25:33'),
(185, '66b77e3def8ef', 'weddinginvitations', '2025-02-09 17:26:27'),
(186, '66b77e3def8ef', 'weddinginvitations', '2025-02-09 17:27:23'),
(187, '66b77e3def8ef', 'savedinvitationcards', '2025-02-09 17:27:49'),
(188, '66b77e3def8ef', 'savedinvitationcards', '2025-02-09 17:27:56'),
(189, '66b77e3def8ef', 'weddinginvitations', '2025-02-09 17:28:31'),
(190, '66b77e3def8ef', 'weddinginvitations', '2025-02-20 08:37:40'),
(191, '66b77e3def8ef', 'weddinginvitations', '2025-02-20 08:59:55'),
(192, '66b77e3def8ef', 'weddinginvitations', '2025-02-20 09:00:14'),
(193, '66b77e3def8ef', 'weddinginvitations', '2025-02-20 09:20:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `gift`
--
ALTER TABLE `gift`
  ADD PRIMARY KEY (`gift_id`);

--
-- Indexes for table `invitation`
--
ALTER TABLE `invitation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_list`
--
ALTER TABLE `saved_list`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `view_history`
--
ALTER TABLE `view_history`
  ADD PRIMARY KEY (`hid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `gift`
--
ALTER TABLE `gift`
  MODIFY `gift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invitation`
--
ALTER TABLE `invitation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `saved_list`
--
ALTER TABLE `saved_list`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `view_history`
--
ALTER TABLE `view_history`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
