-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2024 at 07:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sunshnsm_reevadevpt`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent_wallet`
--

CREATE TABLE `agent_wallet` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A',
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `wallet_id` varchar(20) NOT NULL,
  `last_update` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `balance` double(7,2) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agent_wallet`
--

INSERT INTO `agent_wallet` (`id`, `status`, `create_time`, `wallet_id`, `last_update`, `update_by`, `balance`, `member_id`) VALUES
(1, 'A', '2024-06-21 15:47:25', '202406211', '2024-06-21 15:47:25', 1, 7200.00, 1),
(2, 'A', '2024-06-21 15:47:25', '202406212', '2024-06-21 15:47:25', 1, 2400.00, 2),
(3, 'A', '2024-06-21 15:47:25', '2024062118', '2024-06-21 15:47:25', 1, 0.00, 18),
(4, 'A', '2024-06-21 15:47:25', '2024062119', '2024-06-21 15:47:25', 1, 0.00, 19),
(5, 'A', '2024-06-21 15:47:25', '2024062120', '2024-06-21 15:47:25', 1, 0.00, 20),
(6, 'A', '2024-06-21 15:47:25', '2024062121', '2024-06-21 15:47:25', 1, 0.00, 21),
(7, 'A', '2024-06-21 15:47:25', '2024062122', '2024-06-21 15:47:25', 1, 0.00, 22),
(8, 'A', '2024-06-21 15:47:25', '2024062129', '2024-06-21 15:47:25', 1, 2400.00, 29),
(9, 'A', '2024-06-21 15:47:25', '2024062130', '2024-06-21 15:47:25', 1, 3000.00, 30),
(10, 'A', '2024-06-21 15:47:25', '2024062131', '2024-06-21 15:47:25', 1, 0.00, 31),
(11, 'A', '2024-06-21 15:47:25', '2024062132', '2024-06-21 15:47:25', 1, 3000.00, 32),
(12, 'A', '2024-06-21 15:47:25', '2024062133', '2024-06-21 15:47:25', 1, 6000.00, 33),
(13, 'A', '2024-06-21 15:47:25', '2024062134', '2024-06-21 15:47:25', 1, 0.00, 34),
(14, 'A', '2024-06-21 15:47:25', '2024062135', '2024-06-21 15:47:25', 1, 0.00, 35),
(15, 'A', '2024-06-21 15:47:25', '2024062136', '2024-06-21 15:47:25', 1, 0.00, 36),
(16, 'A', '2024-06-21 15:47:25', '2024062137', '2024-06-21 15:47:25', 1, 0.00, 37),
(17, 'A', '2024-06-21 15:47:25', '2024062138', '2024-06-21 15:47:25', 1, 0.00, 38),
(18, 'A', '2024-06-21 15:47:25', '2024062139', '2024-06-21 15:47:25', 1, 0.00, 39),
(19, 'A', '2024-06-26 15:25:07', '2024062640', '2024-06-26 15:25:07', 33, 12000.00, 40),
(20, 'A', '2024-06-26 16:29:18', '2024062641', '2024-06-26 16:29:18', 40, 54000.00, 41),
(21, 'A', '2024-06-26 16:32:40', '2024062642', '2024-06-26 16:32:40', 41, 0.00, 42),
(22, 'A', '2024-06-26 16:35:25', '2024062643', '2024-06-26 16:35:25', 42, 0.00, 43),
(23, 'A', '2024-06-26 16:40:26', '2024062644', '2024-06-26 16:40:26', 43, 0.00, 44),
(24, 'A', '2024-06-27 15:39:21', '2024062745', '2024-06-27 15:39:21', 31, 0.00, 45),
(25, 'A', '2024-06-27 15:47:04', '2024062746', '2024-06-27 15:47:04', 31, 0.00, 46);

-- --------------------------------------------------------

--
-- Table structure for table `allowed_ip`
--

CREATE TABLE `allowed_ip` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `insert_time` datetime NOT NULL,
  `ip_address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `api_data`
--

CREATE TABLE `api_data` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `insert_time` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_data`
--

INSERT INTO `api_data` (`id`, `status`, `insert_time`, `last_update`, `name`, `email`, `password`) VALUES
(1, 'A', '2024-04-05 08:15:13', '0000-00-00 00:00:00', 'Dgvvv', 'Aman@gmail.com', 'Cghhvvvvbb'),
(2, 'A', '2024-04-05 08:18:29', '0000-00-00 00:00:00', 'Vvbbh', 'Sb@gmail.com', 'Gfttvv'),
(3, 'A', '2024-04-05 08:20:43', '0000-00-00 00:00:00', 'Sdvb', 'Abhr@gmail.com', 'Yodyduufgi'),
(4, 'A', '2024-04-05 08:24:02', '0000-00-00 00:00:00', 'Afbbb', 'Aman@gmail.com', 'Svbgfgjjh'),
(5, 'A', '2024-04-05 08:26:16', '0000-00-00 00:00:00', 'Aman', 'Aman@gmail.com', 'Amdmjdjfjxjd'),
(6, 'A', '2024-04-05 12:27:58', '0000-00-00 00:00:00', 'AMAN KASHYAP', 'Amankashyap2312@gmail.com', 'Aman@1234');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A',
  `name` varchar(150) NOT NULL,
  `insert_time` datetime NOT NULL,
  `last_update` datetime NOT NULL DEFAULT current_timestamp(),
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`id`, `status`, `name`, `insert_time`, `last_update`, `update_by`) VALUES
(1, 'A', 'RCC ROAD', '2024-03-27 10:44:11', '2024-03-27 10:44:11', 1),
(2, 'A', 'NALA WITH COVER', '2024-03-27 10:45:08', '2024-03-27 10:45:08', 1),
(3, 'A', 'ELECTRIC FACILITY', '2024-03-27 10:45:20', '2024-03-27 10:45:20', 1),
(4, 'A', 'GARDEN', '2024-03-27 10:45:36', '2024-03-27 10:45:36', 1),
(5, 'A', 'BOUNDARY WALL', '2024-03-27 10:45:45', '2024-03-27 10:45:45', 1),
(6, 'A', 'PARK', '2024-03-27 10:45:51', '2024-03-27 10:45:51', 1),
(7, 'A', 'OPEN GYM', '2024-03-27 10:45:57', '2024-03-27 10:45:57', 1),
(8, 'A', 'SCHOOL', '2024-03-27 10:46:03', '2024-03-27 10:46:03', 1),
(9, 'A', 'CAMERA', '2024-03-27 10:46:10', '2024-03-27 10:46:10', 1),
(10, 'A', 'WELCOME GATE', '2024-03-27 10:46:17', '2024-03-27 10:46:17', 1),
(11, 'A', 'SECURITY GAURD', '2024-03-27 10:46:26', '2024-03-27 10:46:26', 1),
(12, 'A', 'TEMPLE', '2024-03-27 10:46:32', '2024-03-27 10:47:26', 1),
(13, 'D', 'Aman Kashyap', '2024-04-20 11:53:44', '2024-06-01 11:56:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A',
  `insert_time` datetime NOT NULL,
  `last_update` datetime NOT NULL DEFAULT current_timestamp(),
  `update_by` int(11) NOT NULL,
  `heading` varchar(150) NOT NULL,
  `paragraph` varchar(300) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `status`, `insert_time`, `last_update`, `update_by`, `heading`, `paragraph`, `icon`) VALUES
(1, 'A', '2024-03-26 12:23:19', '2024-06-01 11:57:18', 1, 'EMI OPTIONS', 'You have the option to choose 12, 24, or 36 interest-free EMIs for the remaining payment.', 'icon-realestate-credit'),
(2, 'A', '2024-03-26 12:24:21', '2024-03-26 13:06:43', 1, 'VERSATILE PLOT SIZES', 'We offer a variety of plot sizes for your convenience.', 'icon-realestate-hammer'),
(3, 'A', '2024-03-26 12:25:22', '2024-03-26 13:05:47', 1, 'SITE VISIT', 'We offer you a complimentary car for site visits with pick-up and drop-off services.', 'icon-realestate-garage'),
(4, 'A', '2024-03-26 12:25:59', '2024-03-26 12:25:59', 1, 'INSTANT POSSESSION', 'Youll gain full possession with just a 30% booking amount.', 'icon-realestate-rent'),
(5, 'A', '2024-03-26 12:26:44', '2024-03-26 13:07:28', 1, 'EASY FINANCING', 'We offer flexible payment plans tailored to buyers or tenants financial needs, including options for down payments, installments, or rent-to-own arrangements', 'icon-realestate-my-house'),
(6, 'A', '2024-03-26 12:27:14', '2024-03-26 13:07:57', 1, 'SOLID PAPERWORK', 'Concise and thorough lease agreements delineating tenant rights, duties, and tenancy terms.', 'icon-realestate-doc'),
(7, 'D', '2024-04-20 11:55:12', '2024-04-20 12:47:57', 1, 'Testing', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `frm_contact`
--

CREATE TABLE `frm_contact` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `system_info` varchar(300) NOT NULL,
  `insert_time` datetime NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `purpose` varchar(150) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `frm_contact`
--

INSERT INTO `frm_contact` (`id`, `status`, `ip_address`, `system_info`, `insert_time`, `name`, `mobile`, `email`, `purpose`, `message`) VALUES
(1, 'A', '110.227.110.117', '{\"browser\":\"Opera\",\"browser_ver\":\"89.0.4447.51\",\"platform\":\"Windows 10\"}', '2024-07-06 01:27:18', 'Benito Broadway', '882284341', 'benito.broadway94@gmail.com', '', 'Hey Reevadeveloperspvtltd,\r\n\r\nI hope this message finds you well.\r\n\r\nAre you looking for a way to make your website content more engaging and accessible? Look no further! With Fliki, you can effortlessly transform your written content into captivating videos that are sure to grab your audiences atte'),
(2, 'A', '45.13.191.111', '{\"browser\":\"Edge\",\"browser_ver\":\"114.0.1264.71\",\"platform\":\"Windows 10\"}', '2024-07-06 11:32:09', 'Phil Stewart', '342-123-4456', 'noreplyhere@aol.com', '', 'I was interested in whether or not you would like me to blast your ad to millions of contact forms. Youre reading this message so you know others will read yours the same way. Take a peek at my site below for info\r\n\r\nhttp://fc7spm.contactformmarketing.xyz');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `insert_time` datetime NOT NULL DEFAULT current_timestamp(),
  `last_update` datetime NOT NULL DEFAULT current_timestamp(),
  `update_by` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `plot_no` varchar(6) NOT NULL,
  `area` int(11) NOT NULL,
  `img_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `status`, `insert_time`, `last_update`, `update_by`, `project_id`, `plot_no`, `area`, `img_id`) VALUES
(1, 'A', '2024-04-01 14:35:46', '2024-04-01 14:41:23', 1, 1, '0001', 25, 9),
(2, 'A', '2024-04-01 14:46:28', '2024-04-01 14:46:28', 1, 1, '0002', 25, 10),
(3, 'A', '2024-04-01 14:50:07', '2024-04-01 14:50:07', 1, 1, '0003', 25, 11),
(4, 'A', '2024-04-01 14:51:54', '2024-04-01 14:51:54', 1, 1, '0004', 25, 12),
(5, 'A', '2024-04-01 14:54:34', '2024-04-01 14:54:34', 1, 1, '0005', 25, 13),
(6, 'A', '2024-04-01 14:56:35', '2024-04-01 14:56:35', 1, 1, '0006', 25, 14),
(7, 'A', '2024-04-01 15:01:30', '2024-04-01 15:01:30', 1, 1, '0007', 25, 16),
(8, 'A', '2024-04-01 15:04:41', '2024-04-01 15:04:41', 1, 1, '0008', 25, 17),
(9, 'A', '2024-04-01 15:06:35', '2024-04-01 15:06:35', 1, 1, '0009', 25, 18),
(10, 'A', '2024-04-01 15:08:24', '2024-04-01 15:08:24', 1, 1, '0010', 25, 19),
(11, 'A', '2024-04-01 15:11:30', '2024-04-01 15:11:30', 1, 1, '0011', 25, 20),
(12, 'A', '2024-04-01 15:13:08', '2024-04-01 15:13:08', 1, 1, '0012', 25, 21),
(13, 'A', '2024-04-01 15:14:40', '2024-04-01 15:14:40', 1, 1, '0013', 25, 22),
(14, 'A', '2024-04-01 15:16:19', '2024-04-01 15:16:19', 1, 1, '0014', 25, 23),
(15, 'A', '2024-04-01 15:18:30', '2024-04-01 15:18:30', 1, 1, '0015', 25, 24);

-- --------------------------------------------------------

--
-- Table structure for table `home_slider`
--

CREATE TABLE `home_slider` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A',
  `last_update` datetime NOT NULL DEFAULT current_timestamp(),
  `update_by` int(11) NOT NULL,
  `img` int(11) NOT NULL,
  `top_line` varchar(200) NOT NULL,
  `middle_line` varchar(100) NOT NULL,
  `bottom_text` varchar(250) NOT NULL,
  `link_button` char(1) NOT NULL DEFAULT 'Y' COMMENT 'Y=>Yes | N=>No',
  `form_button` char(1) NOT NULL,
  `form_type` varchar(20) NOT NULL,
  `url_ref` varchar(300) NOT NULL,
  `sort_data` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `home_slider`
--

INSERT INTO `home_slider` (`id`, `status`, `last_update`, `update_by`, `img`, `top_line`, `middle_line`, `bottom_text`, `link_button`, `form_button`, `form_type`, `url_ref`, `sort_data`) VALUES
(1, 'A', '2024-04-22 13:52:00', 1, 35, 'Reeva Developers Pvt. Ltd.', '', '', 'Y', '', '', '/', 1),
(2, 'A', '2024-04-27 11:00:21', 1, 61, 'Reeva Developers Pvt. Ltd.', '', '', 'Y', '', '', '/', 2),
(3, 'A', '2024-04-27 11:00:40', 1, 62, 'Reeva Developers Pvt. Ltd.', '', '', 'Y', '', '', '/', 3),
(4, 'A', '2024-04-27 11:00:44', 1, 63, 'Reeva Developers Pvt. Ltd.', '', '', 'Y', '', '', '/', 4),
(5, 'A', '2024-04-27 11:02:44', 1, 64, 'Reeva Developers Pvt. Ltd.', '', '', 'Y', '', '', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A',
  `upload_time` datetime NOT NULL DEFAULT current_timestamp(),
  `upload_by` int(11) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `location` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `status`, `upload_time`, `upload_by`, `purpose`, `location`) VALUES
(1, 'A', '2024-03-21 12:39:14', 1, 'banner', 'pagebanner/8.jpg'),
(2, 'A', '2024-03-21 12:56:46', 1, 'banner', 'pagebanner/7.jpg'),
(3, 'A', '2024-03-26 09:40:41', 1, 'home_slider', 'homeslider/1711426241_1124eaee99146ae61656.jpg'),
(4, 'A', '2024-03-26 11:03:26', 1, 'home_slider', 'homeslider/1711431206_9e628ceeafe2e4230c52.jpg'),
(5, 'A', '2024-03-27 10:03:41', 1, 'home_slider', 'homeslider/1711514021_ba8d0ee32861f7f74472.jpg'),
(6, 'A', '2024-03-27 10:05:42', 1, 'home_slider', 'homeslider/1711514142_07556a9ce6eb27f2f85c.jpg'),
(7, 'A', '2024-03-27 10:07:40', 1, 'home_slider', 'homeslider/1711514260_9f2f055495ecc8df56a6.jpg'),
(8, 'A', '2024-03-27 10:11:12', 1, 'home_slider', 'homeslider/1711514472_16f5dfaddbe83de31496.jpg'),
(9, 'A', '2024-04-01 12:33:12', 1, 'gallery', 'gallery/1711954992_9c40caa489d60a0e34d2.jpg'),
(10, 'A', '2024-04-01 14:45:38', 1, 'gallery', 'gallery/1711962938_10711abf722ce8ecd9ab.jpg'),
(11, 'A', '2024-04-01 14:49:50', 1, 'gallery', 'gallery/1711963190_2cc9a744d4790c61626e.jpg'),
(12, 'A', '2024-04-01 14:51:37', 1, 'gallery', 'gallery/1711963297_9238c4dab826557bdda4.jpg'),
(13, 'A', '2024-04-01 14:54:18', 1, 'gallery', 'gallery/1711963458_d88cbc6764d3a1737f5d.jpg'),
(14, 'A', '2024-04-01 14:56:20', 1, 'gallery', 'gallery/1711963580_4c40b94d7b0719349d59.jpg'),
(15, 'D', '2024-04-01 14:58:06', 1, 'gallery', 'gallery/1711963686_d05fc5ecb7c3439322fb.jpg'),
(16, 'A', '2024-04-01 15:00:27', 1, 'gallery', 'gallery/1711963827_04f31abdaaccad794d42.jpg'),
(17, 'A', '2024-04-01 15:04:09', 1, 'gallery', 'gallery/1711964049_b4c7a269163c116494b4.jpg'),
(18, 'A', '2024-04-01 15:06:18', 1, 'gallery', 'gallery/1711964178_29d23de4d3d5894f5bac.jpg'),
(19, 'A', '2024-04-01 15:08:11', 1, 'gallery', 'gallery/1711964291_ae4c3b857a4b5f99686e.jpg'),
(20, 'A', '2024-04-01 15:11:15', 1, 'gallery', 'gallery/1711964475_6c55c3784b30e838d6d6.jpg'),
(21, 'A', '2024-04-01 15:12:52', 1, 'gallery', 'gallery/1711964572_b388cfab2bd2a518b01e.jpg'),
(22, 'A', '2024-04-01 15:14:23', 1, 'gallery', 'gallery/1711964663_1e33ea102e1d00ff8d2c.jpg'),
(23, 'A', '2024-04-01 15:15:49', 1, 'gallery', 'gallery/1711964749_d4baf2c3387c5affc07f.jpg'),
(24, 'A', '2024-04-01 15:18:16', 1, 'gallery', 'gallery/1711964896_ab426dd81e0bea645a19.jpg'),
(26, 'A', '2024-04-01 16:48:27', 1, 'project', 'project/1711970307_46b4ccc19632dea275e4.jpg'),
(27, 'A', '2024-04-01 17:34:49', 1, 'project', 'project/1711973089_2e80e2f2a22f766bae24.jpg'),
(34, 'A', '2024-04-22 13:30:14', 1, 'home_slider', 'homeslider/1713772814_f136f4c42a7f070cd2c5.jpg'),
(35, 'A', '2024-04-22 13:50:30', 1, 'home_slider', 'homeslider/1713774030_e56dfc724aaadc8f235c.jpg'),
(44, 'A', '2024-04-23 14:24:34', 1, 'mlm_user_profile', 'mlm_user_profile/202404231424340.png'),
(45, 'A', '2024-04-23 14:48:30', 1, 'mlm_user_profile', 'mlm_user_profile/2024042314483067.png'),
(46, 'A', '2024-04-23 15:02:48', 1, 'mlm_user_profile', 'mlm_user_profile/2024042315024847.png'),
(47, 'A', '2024-04-23 15:55:29', 1, 'mlm_user_profile', 'mlm_user_profile/2024042315552916.png'),
(49, 'A', '2024-04-23 16:30:23', 1, 'gallery', 'gallery/1713870023_8e23c9838c552bd1c0df.jpg'),
(50, 'A', '2024-04-23 16:30:34', 1, 'gallery', 'gallery/1713870034_83d3b673e2ec2c712c60.jpg'),
(51, 'A', '2024-04-23 16:30:41', 1, 'gallery', 'gallery/1713870041_5455a77a3ee657b33bba.jpg'),
(52, 'A', '2024-04-23 16:30:49', 1, 'gallery', 'gallery/1713870049_2127325bf0cd77481963.jpg'),
(53, 'A', '2024-04-23 16:30:57', 1, 'gallery', 'gallery/1713870057_8bed843828ca7f3ad7da.jpg'),
(54, 'A', '2024-04-23 16:31:06', 1, 'gallery', 'gallery/1713870066_aa5e16df2c43ccb1e5d8.jpg'),
(55, 'A', '2024-04-24 15:07:33', 1, 'mlm_user_profile', 'mlm_user_profile/2024042415073378.png'),
(56, 'A', '2024-04-26 14:36:50', 1, 'mlm_user_profile', 'mlm_user_profile/2024042614365037.png'),
(57, 'A', '2024-04-26 14:41:34', 1, 'mlm_user_profile', 'mlm_user_profile/2024042614413452.png'),
(58, 'A', '2024-04-26 14:43:49', 1, 'mlm_user_profile', 'mlm_user_profile/2024042614434992.png'),
(59, 'A', '2024-04-26 14:47:47', 1, 'mlm_user_profile', 'mlm_user_profile/2024042614474728.png'),
(60, 'A', '2024-04-26 14:49:54', 1, 'mlm_user_profile', 'mlm_user_profile/202404261449545.png'),
(61, 'A', '2024-04-27 10:09:32', 1, 'home_slider', 'homeslider/1714192772_755b2373d2da104f011c.jpg'),
(62, 'A', '2024-04-27 10:09:50', 1, 'home_slider', 'homeslider/1714192790_43941ff6dd51ccf9966f.jpg'),
(63, 'A', '2024-04-27 10:10:07', 1, 'home_slider', 'homeslider/1714192807_705363f50172f0f72976.jpg'),
(64, 'A', '2024-04-27 10:10:20', 1, 'home_slider', 'homeslider/1714192820_5c5f379547ff154d2361.jpg'),
(65, 'A', '2024-05-03 10:11:09', 1, 'mlm_user_profile', 'mlm_user_profile/2024050310110982.png'),
(66, 'A', '2024-05-03 10:33:45', 1, 'mlm_user_profile', 'mlm_user_profile/2024050310334519.png'),
(67, 'A', '2024-05-03 10:45:10', 1, 'mlm_user_profile', 'mlm_user_profile/2024050310451043.png'),
(68, 'A', '2024-05-03 10:55:52', 1, 'mlm_user_profile', 'mlm_user_profile/2024050310555271.png'),
(69, 'A', '2024-05-03 11:02:37', 1, 'mlm_user_profile', 'mlm_user_profile/2024050311023771.png'),
(70, 'A', '2024-05-03 11:08:21', 1, 'mlm_user_profile', 'mlm_user_profile/2024050311082189.png'),
(71, 'A', '2024-05-03 11:20:31', 1, 'mlm_user_profile', 'mlm_user_profile/2024050311203134.png'),
(72, 'A', '2024-05-03 14:38:06', 1, 'mlm_user_profile', 'mlm_user_profile/2024050314380636.png'),
(73, 'A', '2024-05-08 10:14:10', 1, 'property', 'property/2024050810141072.png'),
(74, 'A', '2024-06-14 13:45:48', 18, 'mlm_user_profile', 'mlm_user_profile/202406141345480.png'),
(75, 'A', '2024-06-14 15:13:49', 2, 'mlm_user_profile', 'mlm_user_profile/2024061415134915.png'),
(76, 'A', '2024-06-14 15:15:39', 2, 'mlm_user_profile', 'mlm_user_profile/2024061415153977.png'),
(77, 'A', '2024-06-15 13:34:37', 31, 'mlm_user_profile', 'mlm_user_profile/2024061513343762.png'),
(78, 'A', '2024-06-15 15:28:52', 31, 'mlm_user_profile', 'mlm_user_profile/2024061515285250.png'),
(79, 'A', '2024-06-15 17:24:04', 31, 'mlm_user_profile', 'mlm_user_profile/2024061517240425.png'),
(80, 'A', '2024-06-15 17:28:19', 31, 'mlm_user_profile', 'mlm_user_profile/2024061517281958.png'),
(81, 'A', '2024-06-15 18:19:43', 31, 'mlm_user_profile', 'mlm_user_profile/2024061518194383.png'),
(82, 'A', '2024-06-15 18:23:08', 31, 'mlm_user_profile', 'mlm_user_profile/2024061518230898.png'),
(83, 'A', '2024-06-26 15:25:07', 33, 'mlm_user_profile', 'mlm_user_profile/2024062615250719.png'),
(84, 'A', '2024-06-26 16:29:18', 40, 'mlm_user_profile', 'mlm_user_profile/2024062616291877.png'),
(85, 'A', '2024-06-26 16:32:40', 41, 'mlm_user_profile', 'mlm_user_profile/2024062616324016.png'),
(86, 'A', '2024-06-26 16:35:25', 42, 'mlm_user_profile', 'mlm_user_profile/2024062616352535.png'),
(87, 'A', '2024-06-26 16:40:26', 43, 'mlm_user_profile', 'mlm_user_profile/2024062616402668.png'),
(88, 'A', '2024-06-27 15:39:21', 31, 'mlm_user_profile', 'mlm_user_profile/202406271539219.png'),
(89, 'A', '2024-06-27 15:47:04', 31, 'mlm_user_profile', 'mlm_user_profile/2024062715470494.png');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `type` char(2) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `session_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `status`, `create_time`, `update_time`, `update_by`, `type`, `f_name`, `l_name`, `email_id`, `password`, `session_id`) VALUES
(1, 'A', '2023-11-22 06:58:44', '2023-11-22 06:58:44', 1, 'SA', 'Gaurav', 'Kumar', 'gaurav.gom@gmail.com', 'gaur@1717', 63);

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` datetime NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `last_activity_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`id`, `user_id`, `login_time`, `ip_address`, `last_activity_time`) VALUES
(1, 1, '2024-02-02 09:13:32', '::1', '2024-02-02 09:14:42'),
(2, 1, '2024-02-02 09:15:04', '::1', '2024-02-02 11:13:48'),
(3, 1, '2024-02-03 04:06:28', '::1', '2024-02-03 05:10:57'),
(4, 1, '2024-02-06 11:05:49', '10.20.20.17', '2024-02-06 11:05:49'),
(5, 1, '2024-02-07 08:54:33', '10.20.20.17', '2024-02-07 08:54:40'),
(6, 1, '2024-02-13 09:16:29', '182.76.20.162', '2024-02-13 09:18:40'),
(7, 1, '2024-03-30 11:01:54', '182.76.20.162', '2024-03-30 11:34:02'),
(8, 1, '2024-04-01 04:33:06', '182.76.20.162', '2024-04-01 04:33:06'),
(9, 1, '2024-04-01 04:43:42', '122.180.182.114', '2024-04-01 04:47:00'),
(10, 1, '2024-04-01 05:14:11', '122.180.182.114', '2024-04-01 06:06:35'),
(11, 1, '2024-04-01 06:09:09', '182.76.20.162', '2024-04-01 06:13:05'),
(12, 1, '2024-04-01 06:42:06', '122.180.182.114', '2024-04-01 06:42:06'),
(13, 1, '2024-04-01 10:15:25', '122.180.182.114', '2024-04-01 10:26:56'),
(14, 1, '2024-04-01 15:57:17', '223.228.209.37', '2024-04-01 16:02:08'),
(15, 1, '2024-04-02 03:39:40', '122.180.182.114', '2024-04-02 03:46:35'),
(16, 1, '2024-04-02 03:46:42', '182.76.20.162', '2024-04-02 03:46:57'),
(17, 1, '2024-04-02 03:46:59', '122.180.182.114', '2024-04-02 03:48:12'),
(18, 1, '2024-04-02 03:49:16', '182.76.20.162', '2024-04-02 04:58:48'),
(19, 1, '2024-04-02 05:00:53', '122.180.182.114', '2024-04-02 05:03:12'),
(20, 1, '2024-04-02 05:03:49', '182.76.20.162', '2024-04-02 11:33:13'),
(21, 1, '2024-04-03 05:52:03', '182.76.20.162', '2024-04-03 07:03:22'),
(22, 1, '2024-04-03 08:41:05', '182.76.20.162', '2024-04-03 08:41:14'),
(23, 1, '2024-04-04 04:10:16', '122.180.188.40', '2024-04-04 04:19:23'),
(24, 1, '2024-04-04 04:29:39', '182.76.20.162', '2024-04-04 08:19:40'),
(25, 1, '2024-04-04 08:56:07', '122.180.188.40', '2024-04-04 10:02:22'),
(26, 1, '2024-04-04 14:33:20', '106.221.237.1', '2024-04-04 14:40:50'),
(27, 1, '2024-04-05 06:18:17', '182.76.20.162', '2024-04-05 06:18:17'),
(28, 1, '2024-04-06 05:37:46', '182.76.20.162', '2024-04-06 05:38:45'),
(29, 1, '2024-04-08 04:02:20', '182.76.20.162', '2024-04-08 04:25:14'),
(30, 1, '2024-04-09 05:07:05', '182.76.20.162', '2024-04-09 05:07:12'),
(31, 1, '2024-04-09 05:07:25', '182.76.20.162', '2024-04-09 07:20:20'),
(32, 1, '2024-04-10 08:56:56', '182.76.20.162', '2024-04-10 09:46:41'),
(33, 1, '2024-04-12 15:57:16', '27.59.79.66', '2024-04-12 16:00:12'),
(34, 1, '2024-04-15 09:52:51', '182.76.20.162', '2024-04-15 11:47:40'),
(35, 1, '2024-04-17 11:02:34', '182.76.20.162', '2024-04-17 11:07:44'),
(36, 1, '2024-04-17 11:08:36', '122.176.201.117', '2024-04-17 11:08:37'),
(37, 1, '2024-04-20 11:53:36', '182.76.20.162', '2024-04-20 12:16:13'),
(47, 1, '2024-04-20 12:46:32', '122.176.200.40', '2024-04-20 13:01:31'),
(48, 1, '2024-04-20 13:02:44', '182.76.20.162', '2024-04-20 13:03:32'),
(49, 1, '2024-04-20 13:04:27', '122.176.200.40', '2024-04-20 13:33:25'),
(50, 1, '2024-04-20 13:45:04', '182.76.20.162', '2024-04-20 13:45:20'),
(51, 1, '2024-04-20 13:45:45', '122.176.200.40', '2024-04-20 13:46:30'),
(52, 1, '2024-04-20 13:46:56', '182.76.20.162', '2024-04-20 15:15:59'),
(53, 1, '2024-04-22 12:36:35', '182.76.20.162', '2024-04-22 13:56:06'),
(54, 1, '2024-04-22 14:43:39', '122.176.200.40', '2024-04-22 14:43:53'),
(55, 1, '2024-04-23 16:25:29', '182.76.20.162', '2024-04-23 16:31:21'),
(56, 1, '2024-04-27 10:06:56', '182.76.20.162', '2024-04-27 11:02:44'),
(57, 1, '2024-04-27 23:34:03', '42.108.166.61', '2024-04-27 23:35:45'),
(58, 1, '2024-05-10 09:44:42', '182.76.20.162', '2024-05-10 09:44:47'),
(59, 1, '2024-05-15 14:00:50', '182.76.20.162', '2024-05-15 14:01:03'),
(60, 1, '2024-05-21 13:56:13', '122.180.180.117', '2024-05-21 13:57:08'),
(61, 1, '2024-05-21 14:00:44', '122.180.180.117', '2024-05-21 14:13:59'),
(62, 1, '2024-05-21 14:47:43', '122.176.194.215', '2024-05-21 16:44:03'),
(63, 1, '2024-06-01 11:44:25', '122.180.188.141', '2024-06-01 12:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `mail_settings`
--

CREATE TABLE `mail_settings` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A',
  `last_update` datetime NOT NULL DEFAULT current_timestamp(),
  `update_by` int(11) NOT NULL DEFAULT 1,
  `mail_owner` enum('website','admin') NOT NULL DEFAULT 'website',
  `template` varchar(50) NOT NULL,
  `cc` varchar(300) NOT NULL,
  `bcc` varchar(300) NOT NULL,
  `smtp_host` varchar(150) NOT NULL DEFAULT 'mail.reevadeveloperspvtltd.com',
  `smtp_port` varchar(4) NOT NULL DEFAULT '465',
  `smtp_user` varchar(150) NOT NULL DEFAULT 'contact@reevadeveloperspvtltd.com',
  `smtp_pass` varchar(50) NOT NULL DEFAULT 'NC8T[GIxMJ,e',
  `username` varchar(50) NOT NULL DEFAULT 'Reeva'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_settings`
--

INSERT INTO `mail_settings` (`id`, `status`, `last_update`, `update_by`, `mail_owner`, `template`, `cc`, `bcc`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `username`) VALUES
(1, 'A', '2024-04-16 09:42:21', 1, 'website', 'contact_form', '', 'contact@reevadeveloperspvtltd.com', 'mail.reevadeveloperspvtltd.com', '465', 'contact@reevadeveloperspvtltd.com', 'NC8T[GIxMJ,e', 'Reeva');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_client`
--

CREATE TABLE `mlm_client` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `insert_time` datetime NOT NULL,
  `insert_by` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mlm_client`
--

INSERT INTO `mlm_client` (`id`, `status`, `insert_time`, `insert_by`, `name`, `email`, `mobile_number`, `address`) VALUES
(1, 'A', '2024-04-12 12:01:54', 1, 'Gaurav Kumar', 'gaurav.gom@gmail.com', '9899204201', 'Karol Bagh'),
(2, 'A', '2024-04-12 12:02:37', 1, 'testing', 'testing@gmail.com', '972873522', NULL),
(3, 'A', '2024-04-13 09:11:48', 1, 'aman sir', 'abcxyz@gmail.com', '972873522', NULL),
(4, 'A', '2024-05-04 11:04:38', 1, 'aman', 'amankashyap2312@gmail.com', '0813076461', 'H 213 east jawahar nagar Loni Ghaziabad , U.P');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_client_info`
--

CREATE TABLE `mlm_client_info` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `last_update` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `type` enum('client','relative') NOT NULL,
  `info_type` enum('mobile','email','address','document','profile','name') NOT NULL,
  `info_value` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mlm_client_info`
--

INSERT INTO `mlm_client_info` (`id`, `status`, `last_update`, `update_by`, `client_id`, `type`, `info_type`, `info_value`) VALUES
(1, 'A', '2024-04-12 12:01:54', 1, 1, 'client', 'mobile', '9899204201'),
(2, 'A', '2024-04-12 12:01:54', 1, 1, 'client', 'name', 'Gaurav Kumar'),
(3, 'A', '2024-04-12 12:01:54', 1, 1, 'client', 'email', 'gaurav.gom@gmail.com'),
(4, 'A', '2024-04-12 12:02:37', 1, 2, 'client', 'mobile', '972873522'),
(5, 'A', '2024-04-12 12:02:37', 1, 2, 'client', 'name', 'testing'),
(6, 'A', '2024-04-12 12:02:37', 1, 2, 'client', 'email', 'testing@gmail.com'),
(7, 'A', '2024-04-13 09:11:48', 1, 3, 'client', 'mobile', '972873522'),
(8, 'A', '2024-04-13 09:11:48', 1, 3, 'client', 'name', 'aman sir'),
(9, 'A', '2024-04-13 09:11:48', 1, 3, 'client', 'email', 'abcxyz@gmail.com'),
(10, 'A', '2024-05-04 11:04:38', 1, 4, 'client', 'mobile', '0813076461'),
(11, 'A', '2024-05-04 11:04:38', 1, 4, 'client', 'name', 'aman'),
(12, 'A', '2024-05-04 11:04:38', 1, 4, 'client', 'email', 'amankashyap2312@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_login`
--

CREATE TABLE `mlm_login` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A',
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `f_name` varchar(150) NOT NULL,
  `l_name` varchar(150) NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `session_id` int(11) NOT NULL,
  `member_id` varchar(50) DEFAULT NULL,
  `member_count` int(11) NOT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `aadhar_id` int(10) DEFAULT NULL,
  `pan_id` int(10) DEFAULT NULL,
  `img_id` int(10) DEFAULT NULL,
  `nominee_id` int(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `office` varchar(50) DEFAULT NULL,
  `member_user_id` varchar(10) DEFAULT NULL,
  `direct_sale` int(11) NOT NULL,
  `group_sale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mlm_login`
--

INSERT INTO `mlm_login` (`id`, `status`, `create_time`, `update_time`, `update_by`, `user_type`, `f_name`, `l_name`, `email_id`, `password`, `session_id`, `member_id`, `member_count`, `contact`, `aadhar_id`, `pan_id`, `img_id`, `nominee_id`, `dob`, `office`, `member_user_id`, `direct_sale`, `group_sale`) VALUES
(1, 'A', '2024-04-17 13:20:14', '2024-04-20 15:24:26', 1, 9, 'Gaurav', 'Kumar', 'gaurav.gom@gmail.com', 'gaur@1717', 292, '0', 14, '9899204201', NULL, NULL, NULL, NULL, NULL, 'Narela', 'RD0002', 0, 0),
(2, 'A', '2024-04-17 16:51:43', '2024-07-05 17:43:32', 1, 2, 'Pankaj', 'Gupta', 'pankaj@pctiltd.com', 'Passw0rdP', 291, '1', 7, '8130764614', NULL, NULL, NULL, NULL, NULL, 'Narela', 'RD0001', 0, 1),
(18, 'A', '2024-05-01 11:45:54', '0000-00-00 00:00:00', 1, 9, 'Reeva', 'Developer', 'guptanandan90@ymail.com', 'Nandan@123', 195, '0', 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RD0999', 0, 0),
(19, 'A', '2024-05-01 11:45:54', '2024-06-27 16:08:27', 19, 2, 'Mohd Yunus', 'Khan', 'yunuskhan130@gmail.com', 'Yunus@123', 261, '18', 3, '9999485743', NULL, NULL, NULL, NULL, NULL, 'Azadpur', 'RD1001', 0, 0),
(20, 'A', '2024-05-01 11:45:54', '2024-06-27 16:07:55', 19, 1, 'Gulam', 'Husain', 'gulamhusain325@gmail.com', 'Gulam@123', 257, '19', 0, '8851823097', NULL, NULL, NULL, NULL, NULL, 'Azadpur', 'RD1002', 0, 0),
(21, 'A', '2024-05-01 11:45:54', '2024-06-27 16:09:07', 19, 1, 'Ravinder', 'Kumar', 'ravindertigerteam123@gmail.com', 'Ravinder@123', 0, '19', 0, '7042972394', NULL, NULL, NULL, NULL, NULL, 'Azadpur', 'RD1003', 0, 0),
(22, 'A', '2024-05-01 11:45:54', '2024-06-27 16:09:41', 19, 1, 'Jitender', 'Singh', 'jitendersinghrajput7@gmail.com', 'Jitendar@123', 256, '19', 1, '9560443046', NULL, NULL, NULL, NULL, NULL, 'Azadpur', 'RD1004', 0, 0),
(29, 'A', '2024-05-03 11:20:31', '2024-05-03 11:20:31', 1, 1, 'Dev', 'Chauhan', 'dev@cftedu.in', 'Dev@123', 0, '2', 5, '7879865465', 36, 35, 71, NULL, '2024-05-21', 'Pitampura', 'RD1000', 0, 1),
(30, 'A', '2024-05-03 14:38:06', '2024-05-03 14:46:19', 1, 1, 'Harsh', 'Saini', 'harsh@cftedu.in', 'Harsh@5390', 0, '29', 5, '8789658745', 2, 1, 72, NULL, '2024-05-29', 'Azadpur', 'RD1001', 0, 1),
(31, 'A', '2024-06-14 13:45:48', '2024-06-15 15:34:37', 31, 2, 'Krishan Kumar Pandey', 'Pandey', 'vishambarpandey9@gmail.com', 'Krishan@9956', 220, '18', 8, '7011809478', 4, 3, 74, NULL, '2004-10-09', 'Nangloi', 'RD1002', 0, 0),
(32, 'A', '2024-06-14 15:13:49', '2024-06-14 15:13:49', 2, 1, 'Sanjay', 'Sharma', 'sangita@pctiltd.com', 'Sanjay@9660', 0, '30', 5, '2105848780', 6, 5, 75, NULL, '2024-06-14', 'Nangloi', 'RD1003', 0, 1),
(33, 'A', '2024-06-14 15:15:39', '2024-06-14 15:15:39', 2, 1, 'Rachna', 'Garg', 'pankajgupta011@gmail.com', 'Rachna@9001', 211, '32', 5, '2105848780', 8, 7, 76, NULL, '2024-06-14', 'Narela', 'RD1004', 0, 1),
(34, 'A', '2024-06-15 13:34:37', '2024-06-15 13:35:30', 31, 1, 'ARJUN SAH', 'SAH', 'ARJUNSAH3741@GMAIL.COM', 'ARJUN@2594', 0, '31', 0, '7678419139', 10, 9, 77, NULL, '1974-07-08', 'Nangloi', 'RD1005', 0, 0),
(35, 'A', '2024-06-15 15:28:52', '2024-06-15 15:29:11', 31, 1, 'JYOTI SWAROOP DUBEY', 'DUBEY', 'JSDUBEY52@GMAIL.COM', 'JYOTI SWAROOP @5157', 0, '34', 0, '9810953685', 12, 11, 78, NULL, '1975-12-29', 'Nangloi', 'RD1006', 0, 0),
(36, 'A', '2024-06-15 17:24:04', '2024-06-15 17:24:04', 31, 1, 'DILIP KUMAR SINGH', 'SINGH', 'd9999359510@gmail.com', 'dilip-kumar-singh@4636', 0, '35', 0, '9999359510', 14, 13, 79, NULL, '1981-03-06', 'Nangloi', 'RD1007', 0, 0),
(37, 'A', '2024-06-15 17:28:19', '2024-06-15 17:28:19', 31, 1, 'LOKESH PATHAK', 'PATHAK', 'lokeshpathak123@gmail.com', 'lokesh-pathak@7614', 0, '36', 0, '9891698476', 16, 15, 80, NULL, '1987-11-19', 'Nangloi', 'RD1008', 0, 0),
(38, 'A', '2024-06-15 18:19:43', '2024-06-15 18:19:43', 31, 1, 'SUBHASH CHANDRA', 'CHANDRA', 'PRIYANSHUSUBHASH1976@GMAIL.COM', 'subhash-chandra@8312', 0, '37', 0, '7011106506', 18, 17, 81, NULL, '1976-02-20', 'Nangloi', 'RD1009', 0, 0),
(39, 'A', '2024-06-15 18:23:08', '2024-06-15 18:23:08', 31, 1, 'DINESH KUMAR', 'KUMAR', 'KUMARDINESH62829@GMAIL.COM', 'dinesh-kumar@3645', 0, '38', 0, '8750462250', 20, 19, 82, NULL, '1976-10-10', 'Nangloi', 'RD1010', 0, 0),
(40, 'A', '2024-06-26 15:25:07', '2024-06-26 15:26:27', 33, 1, 'Aman', 'Kashyap', 'aman@cftedu.in', 'aman@123', 293, '33', 4, '9999999999', 22, 21, 83, NULL, '2024-06-05', 'Nangloi', 'RD1011', 0, 1),
(41, 'A', '2024-06-26 16:29:18', '2024-06-26 16:29:44', 40, 1, 'Jagmal', 'Jaggu', 'jagmal@cftedu.in', 'jagmal@123', 215, '40', 3, '9191919191', 24, 23, 84, NULL, '2024-06-05', 'Narela', 'RD1012', 1, 0),
(42, 'A', '2024-06-26 16:32:40', '2024-06-26 16:33:02', 41, 1, 'Aman', 'kashyap', 'aman@cftedu.in', 'aman@123', 216, '41', 2, '9191919191', 26, 25, 85, NULL, '2024-06-05', 'Narela', 'RD1013', 0, 0),
(43, 'A', '2024-06-26 16:35:25', '2024-06-26 16:35:51', 42, 1, 'Dharmu', 'dharmu', 'dharmu@cftedu.in', 'dharmu@123', 217, '42', 1, '9191919191', 28, 27, 86, NULL, '2024-06-04', 'Narela', 'RD1014', 0, 0),
(44, 'A', '2024-06-26 16:40:26', '2024-06-26 16:42:40', 43, 1, 'Vijay', 'Bora', 'vijay@cftedu.in', 'vijay@123', 218, '43', 0, '9191919191', 30, 29, 87, NULL, '2024-06-01', 'Narela', 'RD1015', 0, 0),
(45, 'A', '2024-06-27 15:39:21', '2024-06-27 15:39:21', 31, 1, 'SATVIR', 'SINGH TANWAR', 'SINGHSATBER824@GMAIL.COM', 'satvir@2390', 0, '31', 0, '9654537455', 32, 31, 88, NULL, '1966-01-01', 'Nangloi', 'RD1016', 0, 0),
(46, 'A', '2024-06-27 15:47:04', '2024-06-27 15:47:04', 31, 1, 'ASHOK', 'KUMAR', 'ASHOKKUMAR9716336299@GMAIL.COM', 'ashok@1149', 0, '31', 0, '9716336299', 34, 33, 89, NULL, '1974-11-05', 'Nangloi', 'RD1017', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mlm_login_history`
--

CREATE TABLE `mlm_login_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` datetime NOT NULL DEFAULT current_timestamp(),
  `ip_address` varchar(20) NOT NULL,
  `last_activity_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mlm_login_history`
--

INSERT INTO `mlm_login_history` (`id`, `user_id`, `login_time`, `ip_address`, `last_activity_time`) VALUES
(1, 1, '2024-03-29 17:22:32', '::1', '2024-03-29 17:22:32'),
(2, 1, '2024-03-30 09:08:02', '::1', '2024-03-30 09:08:02'),
(3, 1, '2024-03-30 09:18:28', '::1', '2024-03-30 09:18:28'),
(4, 1, '2024-03-30 09:20:39', '::1', '2024-03-30 09:20:39'),
(5, 1, '2024-03-30 10:04:55', '::1', '2024-03-30 10:04:55'),
(6, 1, '2024-03-30 14:41:00', '::1', '2024-03-30 14:41:00'),
(7, 1, '2024-03-30 17:17:42', '::1', '2024-03-30 17:17:42'),
(8, 1, '2024-03-30 17:18:57', '::1', '2024-03-30 17:22:58'),
(9, 1, '2024-03-30 17:24:11', '::1', '2024-03-30 17:24:11'),
(10, 1, '2024-03-30 17:31:16', '::1', '2024-03-30 17:42:43'),
(11, 1, '2024-04-01 09:14:09', '::1', '2024-04-01 11:35:36'),
(12, 1, '2024-04-02 10:08:30', '::1', '2024-04-02 14:21:57'),
(13, 2, '2024-04-02 14:22:23', '::1', '2024-04-02 14:29:42'),
(14, 1, '2024-04-02 14:29:59', '::1', '2024-04-02 14:30:47'),
(15, 2, '2024-04-02 14:30:59', '::1', '2024-04-02 14:59:52'),
(16, 1, '2024-04-02 15:27:33', '::1', '2024-04-02 16:23:23'),
(17, 1, '2024-04-02 16:37:21', '::1', '2024-04-02 17:10:24'),
(18, 2, '2024-04-02 17:11:48', '::1', '2024-04-02 17:30:35'),
(19, 1, '2024-04-02 17:31:05', '::1', '2024-04-02 17:31:25'),
(20, 2, '2024-04-02 17:31:38', '::1', '2024-04-02 17:51:54'),
(21, 1, '2024-04-03 09:23:53', '::1', '2024-04-03 15:20:52'),
(22, 2, '2024-04-03 15:21:35', '::1', '2024-04-03 15:27:43'),
(23, 2, '2024-04-03 15:28:02', '::1', '2024-04-03 15:29:29'),
(24, 2, '2024-04-03 15:29:42', '::1', '2024-04-03 15:32:18'),
(25, 1, '2024-04-03 15:32:33', '::1', '2024-04-03 17:19:49'),
(26, 1, '2024-04-04 09:29:04', '::1', '2024-04-04 16:42:35'),
(27, 1, '2024-04-04 20:07:01', '::1', '2024-04-04 20:13:51'),
(28, 1, '2024-04-05 08:53:00', '::1', '2024-04-05 17:58:26'),
(29, 1, '2024-04-06 09:03:27', '::1', '2024-04-06 10:50:21'),
(30, 2, '2024-04-06 10:51:01', '::1', '2024-04-06 10:58:23'),
(31, 1, '2024-04-06 10:58:46', '::1', '2024-04-06 11:00:21'),
(32, 2, '2024-04-06 11:00:40', '::1', '2024-04-06 11:01:49'),
(33, 1, '2024-04-06 11:02:04', '::1', '2024-04-06 11:03:02'),
(34, 2, '2024-04-06 11:03:13', '::1', '2024-04-06 11:08:48'),
(35, 1, '2024-04-06 11:09:00', '::1', '2024-04-06 18:02:10'),
(36, 1, '2024-04-07 18:54:44', '::1', '2024-04-07 20:53:21'),
(37, 1, '2024-04-08 09:04:58', '::1', '2024-04-08 18:06:47'),
(38, 1, '2024-04-09 09:03:43', '::1', '2024-04-09 18:00:40'),
(39, 1, '2024-04-10 09:05:16', '::1', '2024-04-10 15:52:29'),
(40, 1, '2024-04-10 16:16:07', '::1', '2024-04-10 17:55:19'),
(41, 1, '2024-04-12 08:53:59', '::1', '2024-04-12 11:21:57'),
(42, 1, '2024-04-12 11:59:46', '::1', '2024-04-12 12:02:38'),
(43, 1, '2024-04-12 13:29:10', '::1', '2024-04-12 14:25:06'),
(44, 1, '2024-04-12 15:21:30', '::1', '2024-04-12 17:01:35'),
(45, 1, '2024-04-13 09:06:57', '::1', '2024-04-13 15:56:58'),
(46, 1, '2024-04-15 08:52:25', '::1', '2024-04-15 09:10:41'),
(47, 1, '2024-04-15 09:11:34', '::1', '2024-04-15 09:53:42'),
(48, 1, '2024-04-15 09:56:12', '::1', '2024-04-15 09:56:20'),
(49, 1, '2024-04-15 09:58:12', '::1', '2024-04-15 10:50:19'),
(50, 1, '2024-04-15 12:15:48', '::1', '2024-04-15 14:19:32'),
(51, 2, '2024-04-15 14:20:48', '::1', '2024-04-15 14:30:33'),
(52, 1, '2024-04-15 14:30:52', '::1', '2024-04-15 14:33:00'),
(53, 2, '2024-04-15 14:33:21', '::1', '2024-04-15 15:45:47'),
(54, 1, '2024-04-15 15:46:37', '::1', '2024-04-15 16:55:16'),
(55, 1, '2024-04-16 09:05:39', '::1', '2024-04-16 09:21:42'),
(56, 1, '2024-04-16 09:32:52', '::1', '2024-04-16 13:42:24'),
(57, 1, '2024-04-16 14:23:54', '::1', '2024-04-16 15:54:42'),
(58, 1, '2024-04-16 15:54:55', '::1', '2024-04-16 18:03:13'),
(59, 1, '2024-04-17 08:53:28', '::1', '2024-04-17 12:51:49'),
(60, 1, '2024-04-17 13:21:40', '::1', '2024-04-17 13:29:00'),
(61, 2, '2024-04-17 13:29:15', '::1', '2024-04-17 13:31:08'),
(62, 1, '2024-04-17 13:31:22', '::1', '2024-04-17 15:03:29'),
(63, 1, '2024-04-17 15:22:23', '::1', '2024-04-17 15:25:28'),
(64, 2, '2024-04-17 15:25:58', '::1', '2024-04-17 16:00:08'),
(65, 1, '2024-04-17 16:11:20', '::1', '2024-04-17 16:14:46'),
(66, 2, '2024-04-17 16:15:03', '::1', '2024-04-17 16:29:02'),
(67, 1, '2024-04-17 16:29:22', '::1', '2024-04-17 16:45:44'),
(68, 2, '2024-04-17 16:46:01', '::1', '2024-04-17 16:47:01'),
(69, 1, '2024-04-17 16:47:19', '::1', '2024-04-17 16:49:47'),
(70, 1, '2024-04-17 16:51:00', '::1', '2024-04-17 16:52:25'),
(71, 2, '2024-04-17 16:52:40', '::1', '2024-04-17 16:53:25'),
(72, 1, '2024-04-17 16:53:39', '::1', '2024-04-17 16:53:43'),
(73, 1, '2024-04-18 09:03:26', '::1', '2024-04-18 16:31:13'),
(74, 1, '2024-04-19 09:31:39', '::1', '2024-04-19 15:47:46'),
(75, 1, '2024-04-20 09:01:49', '::1', '2024-04-20 10:39:21'),
(76, 1, '2024-04-20 11:47:02', '182.76.20.162', '2024-04-20 11:47:02'),
(77, 1, '2024-04-20 11:48:03', '182.76.20.162', '2024-04-20 11:48:04'),
(78, 1, '2024-04-20 12:12:57', '122.176.200.40', '2024-04-20 12:13:58'),
(79, 4, '2024-04-20 12:19:56', '182.76.20.162', '2024-04-20 12:21:16'),
(80, 4, '2024-04-20 12:21:27', '182.76.20.162', '2024-04-20 12:23:54'),
(81, 1, '2024-04-20 14:41:07', '182.76.20.162', '2024-04-20 14:41:39'),
(82, 1, '2024-04-20 14:42:51', '182.76.20.162', '2024-04-20 15:15:45'),
(83, 2, '2024-04-20 14:44:03', '182.76.20.162', '2024-04-20 15:22:41'),
(84, 1, '2024-04-20 15:17:11', '182.76.20.162', '2024-04-20 16:16:09'),
(85, 2, '2024-04-20 16:00:48', '182.76.20.162', '2024-04-20 16:13:04'),
(86, 1, '2024-04-22 09:23:16', '182.76.20.162', '2024-04-22 09:24:17'),
(87, 1, '2024-04-22 09:48:31', '182.76.20.162', '2024-04-22 09:56:41'),
(88, 1, '2024-04-22 09:58:17', '182.76.20.162', '2024-04-22 09:59:41'),
(89, 1, '2024-04-22 10:02:56', '182.76.20.162', '2024-04-22 10:21:48'),
(90, 7, '2024-04-22 10:18:28', '182.76.20.162', '2024-04-22 10:19:43'),
(91, 1, '2024-04-22 10:22:55', '182.76.20.162', '2024-04-22 11:23:57'),
(92, 1, '2024-04-22 11:55:09', '182.76.20.162', '2024-04-22 13:32:44'),
(93, 1, '2024-04-22 13:55:07', '182.76.20.162', '2024-04-22 14:30:46'),
(94, 1, '2024-04-22 14:44:11', '122.176.200.40', '2024-04-22 14:44:40'),
(95, 1, '2024-04-22 15:01:49', '182.76.20.162', '2024-04-22 17:41:52'),
(96, 1, '2024-04-23 09:31:41', '182.76.20.162', '2024-04-23 16:16:23'),
(97, 1, '2024-04-24 10:13:33', '182.76.20.162', '2024-04-24 11:47:54'),
(98, 1, '2024-04-24 14:28:31', '182.76.20.162', '2024-04-24 14:32:44'),
(99, 1, '2024-04-24 14:33:22', '182.76.20.162', '2024-04-24 14:33:52'),
(100, 1, '2024-04-24 14:37:21', '182.76.20.162', '2024-04-24 15:07:35'),
(101, 2, '2024-04-24 14:40:17', '182.76.20.162', '2024-04-24 14:40:18'),
(102, 1, '2024-04-25 10:20:21', '182.76.20.162', '2024-04-25 10:20:21'),
(103, 1, '2024-04-25 10:20:40', '182.76.20.162', '2024-04-25 15:33:46'),
(104, 1, '2024-04-26 14:01:36', '182.76.20.162', '2024-04-26 16:27:26'),
(105, 1, '2024-04-27 09:30:16', '182.76.20.162', '2024-04-27 09:37:09'),
(106, 1, '2024-04-27 11:05:17', '182.76.20.162', '2024-04-27 17:12:53'),
(107, 1, '2024-04-29 09:26:26', '182.76.20.162', '2024-04-29 10:57:02'),
(108, 1, '2024-04-29 11:01:21', '122.176.203.51', '2024-04-29 11:06:08'),
(109, 1, '2024-04-29 11:49:04', '182.76.20.162', '2024-04-29 16:54:51'),
(110, 1, '2024-04-29 16:56:26', '122.176.203.51', '2024-04-29 17:03:49'),
(111, 1, '2024-04-29 17:06:09', '182.76.20.162', '2024-04-29 17:54:29'),
(112, 1, '2024-04-29 17:54:40', '182.76.20.162', '2024-04-29 17:55:43'),
(113, 1, '2024-04-29 17:56:01', '182.76.20.162', '2024-04-29 17:56:13'),
(114, 1, '2024-04-30 10:00:11', '182.76.20.162', '2024-04-30 10:37:56'),
(115, 1, '2024-04-30 10:38:28', '122.176.203.51', '2024-04-30 10:41:27'),
(116, 1, '2024-04-30 10:41:47', '182.76.20.162', '2024-04-30 11:52:38'),
(117, 1, '2024-05-01 09:12:09', '122.180.189.145', '2024-05-01 09:20:08'),
(118, 1, '2024-05-01 09:34:29', '182.76.20.162', '2024-05-01 12:43:08'),
(119, 1, '2024-05-01 12:43:58', '182.76.20.162', '2024-05-01 16:58:52'),
(120, 2, '2024-05-01 12:52:40', '182.76.20.162', '2024-05-01 12:52:41'),
(121, 1, '2024-05-02 09:29:01', '122.180.189.145', '2024-05-02 09:29:02'),
(122, 1, '2024-05-02 09:34:17', '182.76.20.162', '2024-05-02 09:51:50'),
(123, 1, '2024-05-02 10:03:40', '122.180.189.145', '2024-05-02 10:18:42'),
(124, 1, '2024-05-02 10:28:14', '182.76.20.162', '2024-05-02 13:51:25'),
(125, 2, '2024-05-02 11:09:48', '182.76.20.162', '2024-05-02 11:15:25'),
(126, 18, '2024-05-02 13:51:46', '182.76.20.162', '2024-05-02 13:57:06'),
(127, 1, '2024-05-02 13:57:20', '182.76.20.162', '2024-05-02 14:08:35'),
(128, 1, '2024-05-02 14:09:46', '122.180.189.145', '2024-05-02 14:16:53'),
(129, 1, '2024-05-02 14:17:53', '182.76.20.162', '2024-05-02 15:20:31'),
(130, 19, '2024-05-02 14:21:42', '122.180.189.145', '2024-05-02 15:49:12'),
(131, 1, '2024-05-02 16:23:12', '122.180.189.145', '2024-05-02 17:46:56'),
(132, 18, '2024-05-02 16:43:20', '1.38.50.143', '2024-05-02 16:46:27'),
(133, 20, '2024-05-02 16:48:31', '47.31.156.220', '2024-05-02 16:52:43'),
(134, 22, '2024-05-02 16:58:32', '47.31.156.220', '2024-05-02 18:22:47'),
(135, 22, '2024-05-03 09:24:22', '122.180.189.145', '2024-05-03 09:42:36'),
(136, 1, '2024-05-03 09:24:26', '182.76.20.162', '2024-05-03 09:24:26'),
(137, 1, '2024-05-03 09:27:36', '122.180.189.145', '2024-05-03 11:13:55'),
(138, 18, '2024-05-03 09:42:54', '122.180.189.145', '2024-05-03 09:46:14'),
(139, 1, '2024-05-03 11:16:52', '182.76.20.162', '2024-05-03 16:11:40'),
(140, 1, '2024-05-04 10:18:24', '182.76.20.162', '2024-05-04 12:17:12'),
(141, 1, '2024-05-06 09:40:38', '182.76.20.162', '2024-05-06 11:47:13'),
(142, 1, '2024-05-06 11:54:43', '122.176.200.215', '2024-05-06 12:24:53'),
(143, 1, '2024-05-06 12:55:14', '182.76.20.162', '2024-05-06 14:19:02'),
(144, 1, '2024-05-06 16:54:06', '182.76.20.162', '2024-05-06 18:14:20'),
(145, 1, '2024-05-07 09:11:08', '182.76.20.162', '2024-05-07 14:12:31'),
(146, 1, '2024-05-07 16:55:28', '122.176.200.215', '2024-05-07 17:00:38'),
(147, 18, '2024-05-07 16:58:23', '122.176.200.215', '2024-05-07 17:56:52'),
(148, 1, '2024-05-08 09:50:39', '122.176.205.49', '2024-05-08 10:23:15'),
(149, 1, '2024-05-08 12:34:53', '122.176.205.49', '2024-05-08 13:16:11'),
(150, 1, '2024-05-08 15:31:44', '122.176.205.49', '2024-05-08 17:06:47'),
(151, 18, '2024-05-08 17:09:04', '122.176.205.49', '2024-05-08 17:12:58'),
(152, 18, '2024-05-08 19:12:43', '45.118.164.201', '2024-05-08 20:07:19'),
(153, 1, '2024-05-09 12:07:07', '122.176.205.49', '2024-05-09 13:33:17'),
(154, 1, '2024-05-09 16:15:53', '122.176.205.49', '2024-05-09 16:26:12'),
(155, 1, '2024-05-10 10:05:42', '122.176.205.49', '2024-05-10 14:30:48'),
(156, 18, '2024-05-12 06:52:03', '103.214.117.138', '2024-05-12 06:54:19'),
(157, 1, '2024-05-14 09:26:59', '182.76.20.162', '2024-05-14 09:43:34'),
(158, 1, '2024-05-15 10:10:53', '122.176.206.137', '2024-05-15 10:10:54'),
(159, 1, '2024-05-15 14:09:06', '182.76.20.162', '2024-05-15 14:38:49'),
(160, 1, '2024-05-15 14:46:51', '122.176.206.137', '2024-05-15 14:46:51'),
(161, 1, '2024-05-15 14:47:48', '182.76.20.162', '2024-05-15 14:48:19'),
(162, 1, '2024-05-15 14:48:30', '122.176.206.137', '2024-05-15 18:04:15'),
(163, 2, '2024-05-15 14:51:06', '182.76.20.162', '2024-05-15 17:29:30'),
(164, 1, '2024-05-16 12:43:44', '182.76.20.162', '2024-05-16 12:46:19'),
(165, 1, '2024-05-16 14:04:17', '182.76.20.162', '2024-05-16 14:04:39'),
(166, 1, '2024-05-16 14:04:40', '182.76.20.162', '2024-05-16 14:04:41'),
(167, 1, '2024-05-16 14:05:24', '182.76.20.162', '2024-05-16 14:16:41'),
(168, 1, '2024-05-16 14:30:29', '182.76.20.162', '2024-05-16 14:42:38'),
(169, 1, '2024-05-16 14:46:30', '182.76.20.162', '2024-05-16 14:50:20'),
(170, 1, '2024-05-16 14:50:33', '182.76.20.162', '2024-05-16 16:07:27'),
(171, 2, '2024-05-16 14:50:33', '182.76.20.162', '2024-05-16 15:21:05'),
(172, 1, '2024-05-17 11:09:15', '182.76.20.162', '2024-05-17 11:14:17'),
(173, 1, '2024-05-17 11:14:55', '182.76.20.162', '2024-05-17 11:15:48'),
(174, 1, '2024-05-17 11:16:02', '182.76.20.162', '2024-05-17 17:14:55'),
(175, 2, '2024-05-17 11:16:05', '182.76.20.162', '2024-05-17 15:22:58'),
(176, 1, '2024-05-18 09:40:16', '122.180.178.227', '2024-05-18 15:23:51'),
(177, 1, '2024-05-20 10:28:46', '182.76.20.162', '2024-05-20 10:30:59'),
(178, 1, '2024-05-20 15:09:41', '122.176.202.238', '2024-05-20 17:56:32'),
(179, 1, '2024-05-21 11:08:22', '122.180.180.117', '2024-05-21 11:09:02'),
(180, 1, '2024-05-21 15:51:01', '122.176.194.215', '2024-05-21 16:56:13'),
(181, 1, '2024-05-22 09:32:10', '122.176.194.215', '2024-05-22 11:30:14'),
(182, 1, '2024-05-22 14:16:36', '122.176.194.215', '2024-05-22 17:26:31'),
(183, 1, '2024-05-23 10:18:01', '115.246.74.114', '2024-05-23 11:31:51'),
(184, 1, '2024-05-23 14:20:40', '103.46.202.205', '2024-05-23 18:03:29'),
(185, 1, '2024-05-27 11:29:02', '122.176.201.181', '2024-05-27 11:53:00'),
(186, 1, '2024-05-28 11:01:22', '122.176.201.181', '2024-05-28 11:33:35'),
(187, 1, '2024-06-05 16:42:45', '122.176.194.129', '2024-06-05 16:46:18'),
(188, 1, '2024-06-14 11:26:25', '182.76.20.162', '2024-06-14 13:16:01'),
(189, 22, '2024-06-14 12:19:47', '122.180.182.244', '2024-06-14 12:20:37'),
(190, 18, '2024-06-14 13:16:25', '182.76.20.162', '2024-06-14 13:50:03'),
(191, 31, '2024-06-14 13:50:52', '182.76.20.162', '2024-06-14 14:00:14'),
(192, 2, '2024-06-14 15:11:53', '182.76.20.162', '2024-06-14 15:15:41'),
(193, 31, '2024-06-15 13:22:56', '152.59.68.93', '2024-06-15 17:28:20'),
(194, 2, '2024-06-15 17:40:01', '182.76.20.162', '2024-06-15 17:41:50'),
(195, 18, '2024-06-15 17:42:50', '182.76.20.162', '2024-06-15 17:45:19'),
(196, 31, '2024-06-15 17:46:14', '182.76.20.162', '2024-06-15 17:47:41'),
(197, 31, '2024-06-15 18:17:35', '103.212.144.192', '2024-06-15 20:31:32'),
(198, 1, '2024-06-18 10:07:26', '122.176.201.217', '2024-06-18 10:10:52'),
(199, 1, '2024-06-19 11:07:40', '182.76.20.162', '2024-06-19 11:32:40'),
(200, 1, '2024-06-19 17:32:08', '122.176.201.217', '2024-06-19 17:46:39'),
(201, 1, '2024-06-20 09:48:14', '182.76.20.162', '2024-06-20 10:28:29'),
(202, 1, '2024-06-20 14:12:15', '122.176.199.45', '2024-06-20 14:18:25'),
(203, 1, '2024-06-20 17:32:37', '182.76.20.162', '2024-06-20 17:33:41'),
(204, 1, '2024-06-21 10:28:04', '182.76.20.162', '2024-06-21 11:54:05'),
(205, 1, '2024-06-22 11:29:40', '182.76.20.162', '2024-06-22 11:31:24'),
(206, 31, '2024-06-22 16:45:19', '152.58.115.191', '2024-06-22 16:54:22'),
(207, 1, '2024-06-24 10:51:12', '182.76.20.162', '2024-06-24 11:40:15'),
(208, 1, '2024-06-24 14:11:35', '182.76.20.162', '2024-06-24 14:12:10'),
(209, 1, '2024-06-25 13:51:43', '182.76.20.162', '2024-06-25 15:23:48'),
(210, 1, '2024-06-26 15:18:31', '182.76.20.162', '2024-06-26 15:18:47'),
(211, 33, '2024-06-26 15:20:24', '182.76.20.162', '2024-06-26 16:00:35'),
(212, 1, '2024-06-26 16:00:51', '182.76.20.162', '2024-06-26 16:04:22'),
(213, 1, '2024-06-26 16:11:32', '182.76.20.162', '2024-06-26 16:15:03'),
(214, 40, '2024-06-26 16:15:22', '182.76.20.162', '2024-06-26 16:30:03'),
(215, 41, '2024-06-26 16:30:56', '182.76.20.162', '2024-06-26 16:33:06'),
(216, 42, '2024-06-26 16:33:27', '182.76.20.162', '2024-06-26 16:35:58'),
(217, 43, '2024-06-26 16:36:20', '182.76.20.162', '2024-06-26 16:42:49'),
(218, 44, '2024-06-26 16:43:16', '182.76.20.162', '2024-06-26 16:48:52'),
(219, 40, '2024-06-27 14:12:25', '182.76.20.162', '2024-06-27 15:43:23'),
(220, 31, '2024-06-27 15:34:56', '103.184.170.83', '2024-06-27 15:48:00'),
(221, 40, '2024-06-27 15:45:04', '182.76.20.162', '2024-06-27 15:53:29'),
(222, 19, '2024-06-27 15:49:23', '47.31.162.236', '2024-06-27 15:49:25'),
(223, 19, '2024-06-27 15:50:27', '122.176.200.23', '2024-06-27 15:53:52'),
(224, 19, '2024-06-27 15:54:00', '182.76.20.162', '2024-06-27 16:25:37'),
(225, 20, '2024-06-27 17:34:18', '157.37.190.198', '2024-06-27 17:35:41'),
(226, 19, '2024-06-27 18:20:06', '47.31.177.111', '2024-06-27 18:22:24'),
(227, 19, '2024-06-27 18:46:02', '202.142.121.65', '2024-06-27 18:59:11'),
(228, 19, '2024-06-27 19:15:40', '202.142.121.65', '2024-06-27 19:37:56'),
(229, 19, '2024-06-27 19:44:04', '202.142.121.65', '2024-06-27 19:44:18'),
(230, 40, '2024-06-28 11:13:11', '182.76.20.162', '2024-06-28 11:43:29'),
(231, 40, '2024-06-28 13:53:47', '182.76.20.162', '2024-06-28 15:41:58'),
(232, 1, '2024-06-28 15:43:37', '182.76.20.162', '2024-06-28 17:16:01'),
(233, 19, '2024-06-28 17:31:48', '203.81.240.29', '2024-06-28 17:37:57'),
(234, 19, '2024-06-28 17:43:52', '203.81.240.29', '2024-06-28 17:44:51'),
(235, 19, '2024-06-28 22:59:59', '157.37.176.143', '2024-06-28 23:08:08'),
(236, 19, '2024-06-29 12:28:13', '203.81.242.101', '2024-06-29 12:28:13'),
(237, 19, '2024-06-29 12:28:17', '203.81.242.101', '2024-06-29 12:29:12'),
(238, 19, '2024-06-29 12:29:13', '203.81.242.101', '2024-06-29 12:29:19'),
(239, 40, '2024-07-01 09:28:09', '182.76.20.162', '2024-07-01 09:32:29'),
(240, 40, '2024-07-01 09:35:07', '182.76.20.162', '2024-07-01 09:38:35'),
(241, 40, '2024-07-01 09:38:55', '182.76.20.162', '2024-07-01 11:20:39'),
(242, 1, '2024-07-01 11:21:00', '182.76.20.162', '2024-07-01 17:38:07'),
(243, 40, '2024-07-02 09:14:42', '182.76.20.162', '2024-07-02 12:53:28'),
(244, 1, '2024-07-02 12:54:04', '182.76.20.162', '2024-07-02 17:31:10'),
(245, 40, '2024-07-02 17:31:23', '182.76.20.162', '2024-07-02 17:57:04'),
(246, 40, '2024-07-03 09:00:18', '182.76.20.162', '2024-07-03 10:14:58'),
(247, 1, '2024-07-03 09:16:29', '182.76.20.162', '2024-07-03 10:14:17'),
(248, 40, '2024-07-03 14:44:46', '182.76.20.162', '2024-07-03 17:07:53'),
(249, 19, '2024-07-03 19:40:35', '203.81.241.230', '2024-07-03 19:41:21'),
(250, 40, '2024-07-04 10:26:28', '182.76.20.162', '2024-07-04 17:18:46'),
(251, 20, '2024-07-04 10:54:07', '103.216.143.38', '2024-07-04 11:10:04'),
(252, 19, '2024-07-04 10:58:32', '203.81.243.86', '2024-07-04 11:04:39'),
(253, 19, '2024-07-04 11:05:04', '203.81.243.86', '2024-07-04 11:05:05'),
(254, 19, '2024-07-04 11:11:16', '103.216.143.38', '2024-07-04 11:11:17'),
(255, 19, '2024-07-04 11:19:18', '103.216.143.38', '2024-07-04 11:45:58'),
(256, 22, '2024-07-04 11:44:19', '103.216.143.38', '2024-07-04 11:44:39'),
(257, 20, '2024-07-04 11:44:50', '103.216.143.38', '2024-07-04 11:44:56'),
(258, 40, '2024-07-05 10:31:17', '182.76.20.162', '2024-07-05 10:31:33'),
(259, 40, '2024-07-05 12:49:47', '182.76.20.162', '2024-07-05 17:18:20'),
(260, 1, '2024-07-05 16:07:33', '182.76.20.162', '2024-07-05 17:56:09'),
(261, 19, '2024-07-05 18:40:28', '157.37.148.187', '2024-07-05 18:40:29'),
(262, 40, '2024-07-06 08:46:12', '182.76.20.162', '2024-07-06 08:47:40'),
(263, 40, '2024-07-06 08:47:52', '182.76.20.162', '2024-07-06 08:47:57'),
(264, 1, '2024-07-06 08:48:18', '182.76.20.162', '2024-07-06 14:06:33'),
(265, 1, '2024-07-06 12:05:08', '::1', '2024-07-06 12:10:17'),
(266, 1, '2024-07-08 03:48:48', '::1', '2024-07-08 12:10:44'),
(267, 1, '2024-07-08 12:10:54', '::1', '2024-07-08 12:11:16'),
(268, 1, '2024-07-11 03:53:26', '::1', '2024-07-11 07:17:11'),
(269, 1, '2024-07-11 09:46:59', '::1', '2024-07-11 11:14:51'),
(270, 1, '2024-07-12 06:30:18', '10.20.20.138', '2024-07-12 06:50:17'),
(271, 1, '2024-07-12 06:59:16', '10.20.20.17', '2024-07-12 10:23:44'),
(272, 1, '2024-07-15 04:02:37', '10.20.20.17', '2024-07-15 06:53:03'),
(273, 2, '2024-07-15 06:53:23', '10.20.20.17', '2024-07-15 08:52:41'),
(274, 1, '2024-07-15 08:53:24', '10.20.20.17', '2024-07-15 09:05:40'),
(275, 2, '2024-07-15 09:05:58', '10.20.20.17', '2024-07-15 09:21:36'),
(276, 1, '2024-07-15 09:21:53', '10.20.20.17', '2024-07-15 09:24:48'),
(277, 2, '2024-07-15 09:25:07', '10.20.20.17', '2024-07-15 09:27:21'),
(278, 1, '2024-07-15 09:27:33', '10.20.20.17', '2024-07-15 10:27:54'),
(279, 2, '2024-07-15 10:28:07', '10.20.20.17', '2024-07-15 10:35:15'),
(280, 1, '2024-07-15 10:35:43', '10.20.20.17', '2024-07-15 10:35:51'),
(281, 1, '2024-07-16 04:14:28', '10.20.20.17', '2024-07-16 04:14:29'),
(282, 1, '2024-07-17 04:04:38', '10.20.20.17', '2024-07-17 11:03:32'),
(283, 1, '2024-07-18 05:30:54', '10.20.20.17', '2024-07-18 05:38:32'),
(284, 2, '2024-07-18 05:38:44', '10.20.20.17', '2024-07-18 05:38:57'),
(285, 1, '2024-07-18 05:39:09', '10.20.20.17', '2024-07-18 05:40:03'),
(286, 2, '2024-07-18 05:40:15', '10.20.20.17', '2024-07-18 05:40:25'),
(287, 1, '2024-07-18 05:40:36', '10.20.20.17', '2024-07-18 05:41:07'),
(288, 2, '2024-07-18 05:41:25', '10.20.20.17', '2024-07-18 05:41:32'),
(289, 1, '2024-07-18 05:41:51', '10.20.20.17', '2024-07-18 05:42:35'),
(290, 1, '2024-07-18 05:43:13', '10.20.20.17', '2024-07-18 05:43:19'),
(291, 2, '2024-07-18 05:43:35', '10.20.20.17', '2024-07-18 05:49:22'),
(292, 1, '2024-07-18 05:49:33', '10.20.20.17', '2024-07-18 05:50:05'),
(293, 40, '2024-07-20 04:27:09', '10.20.20.17', '2024-07-20 04:27:13');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_member_id`
--

CREATE TABLE `mlm_member_id` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A',
  `create_time` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `member_login_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mlm_member_id`
--

INSERT INTO `mlm_member_id` (`id`, `status`, `create_time`, `last_update`, `update_by`, `member_login_id`, `name`) VALUES
(1, 'A', '2024-05-03 11:02:37', '2024-05-03 11:02:37', 1, 27, 'test test'),
(76, 'A', '2024-05-03 11:10:03', '2024-05-03 11:08:21', 1, 28, 'test test'),
(998, 'A', '2024-05-03 12:10:40', '0000-00-00 00:00:00', 1, 17, 'Aman Kashyap'),
(1000, 'A', '2024-05-03 11:20:31', '2024-05-03 11:20:31', 1, 29, 'test test'),
(1001, 'A', '2024-05-03 14:38:06', '2024-05-03 14:38:06', 1, 30, 'Harsh Saini'),
(1002, 'A', '2024-06-14 13:45:48', '2024-06-14 13:45:48', 18, 31, 'Krishan Kumar Pandey'),
(1003, 'A', '2024-06-14 15:13:49', '2024-06-14 15:13:49', 2, 32, 'Sanjay Sharma'),
(1004, 'A', '2024-06-14 15:15:39', '2024-06-14 15:15:39', 2, 33, 'Rachna Garg'),
(1005, 'A', '2024-06-15 13:34:37', '2024-06-15 13:34:37', 31, 34, 'ARJUN SAH'),
(1006, 'A', '2024-06-15 15:28:52', '2024-06-15 15:28:52', 31, 35, 'JYOTI SWAROOP  DUBEY'),
(1007, 'A', '2024-06-15 17:24:04', '2024-06-15 17:24:04', 31, 36, 'DILIP KUMAR SINGH SINGH'),
(1008, 'A', '2024-06-15 17:28:19', '2024-06-15 17:28:19', 31, 37, 'LOKESH PATHAK PATHAK'),
(1009, 'A', '2024-06-15 18:19:43', '2024-06-15 18:19:43', 31, 38, 'SUBHASH CHANDRA CHANDRA'),
(1010, 'A', '2024-06-15 18:23:08', '2024-06-15 18:23:08', 31, 39, 'DINESH KUMAR KUMAR'),
(1011, 'A', '2024-06-26 15:25:07', '2024-06-26 15:25:07', 33, 40, 'Aman Kashyap'),
(1012, 'A', '2024-06-26 16:29:18', '2024-06-26 16:29:18', 40, 41, 'Jagmal Jaggu'),
(1013, 'A', '2024-06-26 16:32:40', '2024-06-26 16:32:40', 41, 42, 'Ankit Rajput'),
(1014, 'A', '2024-06-26 16:35:25', '2024-06-26 16:35:25', 42, 43, 'Dharmu dharmu'),
(1015, 'A', '2024-06-26 16:40:26', '2024-06-26 16:40:26', 43, 44, 'Vijay Bora'),
(1016, 'A', '2024-06-27 15:39:21', '2024-06-27 15:39:21', 31, 45, 'SATVIR SINGH TANWAR'),
(1017, 'A', '2024-06-27 15:47:04', '2024-06-27 15:47:04', 31, 46, 'ASHOK KUMAR');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_member_type`
--

CREATE TABLE `mlm_member_type` (
  `id` int(11) NOT NULL,
  `user_key` char(4) NOT NULL,
  `status` char(1) NOT NULL,
  `last_update` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `direct_sale` int(11) NOT NULL,
  `group_sale` int(11) NOT NULL,
  `next_profile_id` int(11) NOT NULL,
  `require_profile` int(11) NOT NULL,
  `require_profile_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mlm_member_type`
--

INSERT INTO `mlm_member_type` (`id`, `user_key`, `status`, `last_update`, `update_by`, `name`, `direct_sale`, `group_sale`, `next_profile_id`, `require_profile`, `require_profile_count`) VALUES
(1, 'AS', 'A', '2024-07-01 15:34:08', 1, 'Associate', 2, 6, 2, 0, 0),
(2, 'MNG', 'A', '2024-07-01 15:35:28', 1, 'Manager', 4, 14, 3, 2, 1),
(3, 'SMNG', 'A', '2024-07-01 15:36:27', 1, 'Sr. Manager', 4, 60, 4, 3, 2),
(4, 'AGM', 'A', '2024-07-01 15:37:30', 1, 'Assistant General Manager', 5, 102, 5, 4, 2),
(5, 'GM', 'A', '2024-07-01 15:39:56', 1, 'General Manager', 5, 250, 6, 5, 2),
(6, 'SGM', 'A', '2024-07-01 15:41:39', 1, 'Senior General Manager', 5, 580, 7, 6, 2),
(7, 'CGM', 'A', '2024-07-01 15:42:28', 1, 'Chief General Manager', 5, 1350, 8, 7, 2),
(8, 'SCGM', 'A', '2024-06-28 11:05:07', 1, 'Senior Chief General Manager', 0, 0, 0, 0, 0),
(9, 'AD', 'A', '2024-04-24 10:23:19', 1, 'Admin', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mlm_property_booking`
--

CREATE TABLE `mlm_property_booking` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `insert_time` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `prop_status` varchar(50) NOT NULL COMMENT 'A =>Available, B=>Booked, P=>Partially Booked,S=>Sold',
  `paid_amount` int(11) NOT NULL,
  `deal_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mlm_property_booking`
--

INSERT INTO `mlm_property_booking` (`id`, `status`, `insert_time`, `last_update`, `update_by`, `client_id`, `member_id`, `property_id`, `prop_status`, `paid_amount`, `deal_amount`) VALUES
(1, 'A', '2024-07-02 17:32:57', '2024-07-03 10:03:51', 1, 1, 1, 1, 'S', 600000, 600000),
(2, 'A', '2024-07-05 12:54:54', '2024-07-05 12:54:54', 40, 1, 1, 2, 'P', 50000, 400000);

-- --------------------------------------------------------

--
-- Table structure for table `mlm_property_deal`
--

CREATE TABLE `mlm_property_deal` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `insert_time` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `deal_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mlm_property_deal`
--

INSERT INTO `mlm_property_deal` (`id`, `status`, `insert_time`, `last_update`, `update_by`, `client_id`, `member_id`, `property_id`, `deal_amount`) VALUES
(1, 'M', '2024-07-03 16:55:37', '2024-07-03 16:55:37', 40, 1, 41, 2, 400000);

-- --------------------------------------------------------

--
-- Table structure for table `mlm_property_status_log`
--

CREATE TABLE `mlm_property_status_log` (
  `id` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mlm_property_status_log`
--

INSERT INTO `mlm_property_status_log` (`id`, `last_update`, `update_by`, `booking_id`, `status`) VALUES
(1, '2024-07-02 17:32:57', 40, 1, 'T'),
(2, '2024-07-03 09:20:04', 1, 1, 'P'),
(3, '2024-07-03 09:22:51', 1, 1, 'B'),
(4, '2024-07-03 09:43:22', 1, 1, 'B'),
(5, '2024-07-03 09:43:52', 1, 1, 'S'),
(6, '2024-07-03 10:02:29', 1, 1, 'P'),
(7, '2024-07-03 10:02:36', 1, 1, 'S'),
(8, '2024-07-03 10:03:39', 1, 1, 'P'),
(9, '2024-07-03 10:03:51', 1, 1, 'S'),
(10, '2024-07-05 12:54:54', 40, 2, 'P');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_property_visit`
--

CREATE TABLE `mlm_property_visit` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `client_id` int(11) NOT NULL,
  `visit_date` date NOT NULL,
  `visit_time` time NOT NULL,
  `property_id` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mlm_property_visit`
--

INSERT INTO `mlm_property_visit` (`id`, `status`, `client_id`, `visit_date`, `visit_time`, `property_id`, `last_update`, `update_by`) VALUES
(1, 'A', 2, '2024-04-17', '12:49:14', 3, '2024-04-15 10:49:42', 1),
(2, 'A', 3, '2024-04-16', '12:49:43', 124, '2024-04-15 10:50:19', 1),
(3, 'A', 2, '2024-04-23', '14:28:36', 24, '2024-04-15 12:29:06', 1),
(7, 'A', 1, '2024-05-07', '11:24:31', 1, '2024-05-07 09:25:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mlm_tab`
--

CREATE TABLE `mlm_tab` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A',
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `tab_group` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `name` varchar(300) NOT NULL,
  `page_url` varchar(300) NOT NULL,
  `other_action` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mlm_tab`
--

INSERT INTO `mlm_tab` (`id`, `status`, `create_at`, `tab_group`, `sort`, `name`, `page_url`, `other_action`) VALUES
(1, 'A', '2024-04-02 16:35:23', 4, 1, 'Manage Member ', 'user', 'Add|1,Edit|2,Change Password|3,Change Nominee|4,Change MemberID|5'),
(2, 'A', '2024-04-02 17:33:47', 1, 2, 'Member Access', 'mlm_access', 'Change Access|1'),
(3, 'A', '2024-04-03 14:14:54', 3, 1, 'Property', 'manage-properties', 'Add|1,Edit|2,Change Status|3,Prop.Detail|4'),
(4, 'A', '2024-04-04 15:09:30', 4, 1, 'Member Chain', 'team_detail', 'Search_Client|1'),
(5, 'D', '2024-04-05 15:12:07', 3, 2, 'Booking', 'mlm_property_book', 'Add|1,View|3'),
(6, 'A', '2024-04-10 12:01:08', 2, 1, 'Records', 'client-records', 'Add Client|1,Create Deal|2,Add Properties|3,Mature Deal|4,Prop. Details|5,Payment History|6,Add Payment|7,Change Stage|8'),
(7, 'A', '2024-04-25 10:59:47', 1, 1, 'Admin', 'admin_manage', 'Add|1,Edit|2,Change Password|3,Change Nominee|4,Change MemberID|5'),
(8, 'A', '2024-07-01 11:25:26', 1, 3, 'Profile & Promotion', 'profile-promotion', 'Add|1,Edit|2,Change Status|3'),
(9, 'A', '2024-07-01 11:25:26', 5, 3, 'Sale Reports', 'sale_reports', 'Add|1,Edit|2,Change Status|3,Mature Deal|4,Prop. Details|5,Payment History|6,Add Payment|7,Change Stage|8'),
(10, 'A', '2024-07-01 11:25:26', 5, 3, 'Down Line Report', 'down_line_reports', 'Add|1,Edit|2,Change Status|3'),
(11, 'A', '2024-07-01 11:25:26', 5, 3, 'Direct Member Report', 'direct_member_reports', 'Add|1,Edit|2,Change Status|3'),
(12, 'A', '2024-07-01 11:25:26', 5, 3, 'Post Short  by', 'post_short', 'Add|1,Edit|2,Change Status|3'),
(13, 'A', '2024-07-01 11:25:26', 5, 3, 'Profile Details', 'profile_details', 'Add|1,Edit|2,Change Status|3');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_tab_group`
--

CREATE TABLE `mlm_tab_group` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `last_update` datetime NOT NULL DEFAULT current_timestamp(),
  `update_by` int(11) NOT NULL,
  `themify` varchar(15) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mlm_tab_group`
--

INSERT INTO `mlm_tab_group` (`id`, `status`, `create_time`, `last_update`, `update_by`, `themify`, `name`) VALUES
(1, 'A', '2024-04-01 10:24:42', '2024-04-01 10:24:42', 1, 'fa fa-cogs', 'Settings'),
(2, 'A', '2024-04-01 10:25:21', '2024-04-01 10:25:21', 1, 'fa fa-server', 'Client'),
(3, 'A', '2024-04-03 14:13:18', '2024-04-03 14:13:18', 1, 'fa fa-home', 'Land'),
(4, 'A', '2024-04-04 15:08:08', '2024-04-04 15:08:08', 1, 'fa fa-users', 'Member'),
(5, 'A', '2024-04-04 15:08:08', '2024-04-04 15:08:08', 1, 'fa fa-users', 'Reports');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_user_access`
--

CREATE TABLE `mlm_user_access` (
  `user_type_id` int(11) NOT NULL,
  `tab_id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `other_action` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mlm_user_access`
--

INSERT INTO `mlm_user_access` (`user_type_id`, `tab_id`, `status`, `other_action`) VALUES
(1, 1, 'D', ''),
(1, 2, 'D', ''),
(1, 3, 'D', ''),
(1, 4, 'A', '1'),
(1, 5, 'D', ''),
(1, 6, 'A', '5 6'),
(1, 8, 'A', '1 2 3'),
(1, 9, 'A', '1 2 3'),
(1, 10, 'A', '1 2 3'),
(1, 13, 'A', '1 2 3'),
(2, 1, 'A', '1 2 3 4'),
(2, 2, 'D', ''),
(2, 4, 'A', '1'),
(2, 6, 'A', '1 2 5 6'),
(2, 9, 'A', '1 2 3 4 5'),
(2, 10, 'A', '1 2 3'),
(2, 13, 'A', '1 2 3'),
(3, 1, 'A', '1 2 3'),
(3, 4, 'A', '1 2 3'),
(3, 6, 'A', '1 2 3'),
(4, 1, 'A', '1 2 3'),
(4, 4, 'A', '1 2 3'),
(4, 6, 'A', '1 2 3'),
(5, 1, 'A', '1 2 3'),
(5, 4, 'A', '1 2 3'),
(5, 6, 'A', '1 2 3'),
(6, 1, 'A', '1 2 3'),
(6, 4, 'A', '1 2 3'),
(6, 6, 'A', '1 2 3'),
(8, 1, 'A', '1 2 3'),
(8, 4, 'A', '1 2 3'),
(8, 6, 'A', '1 2 3'),
(9, 1, 'A', '1 2 3 4 5'),
(9, 2, 'A', '1'),
(9, 3, 'A', '1 2 3 4'),
(9, 4, 'A', '1'),
(9, 6, 'A', '1 2 3 4 5 6 7 8'),
(9, 7, 'A', '1 2 3'),
(9, 8, 'A', '1 2 3'),
(9, 9, 'A', '1 2 3 4 5 6 7 8'),
(9, 10, 'A', '1 2 3'),
(9, 11, 'A', '1 2 3'),
(9, 12, 'A', '1 2 3'),
(9, 13, 'A', '1 2 3');

-- --------------------------------------------------------

--
-- Table structure for table `navbar`
--

CREATE TABLE `navbar` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A',
  `last_update` datetime NOT NULL DEFAULT current_timestamp(),
  `update_by` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `url` varchar(200) NOT NULL,
  `parent_name` varchar(150) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `navbar`
--

INSERT INTO `navbar` (`id`, `status`, `last_update`, `update_by`, `name`, `url`, `parent_name`, `sort`) VALUES
(1, 'A', '2024-03-26 14:54:15', 1, 'HOME', '/', '', 1),
(2, 'A', '2024-03-26 14:52:11', 1, 'ABOUT US', 'about_us', '', 2),
(3, 'A', '2024-03-26 14:53:15', 1, 'Facility', 'facility', '', 3),
(4, 'A', '2024-03-26 14:53:50', 1, 'Contact', 'contact', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `near_location`
--

CREATE TABLE `near_location` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A',
  `insert_time` timestamp NULL DEFAULT NULL,
  `insert_by` int(11) NOT NULL,
  `last_update` datetime NOT NULL DEFAULT current_timestamp(),
  `update_by` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `resource` varchar(150) NOT NULL,
  `distance` varchar(30) NOT NULL,
  `detail` varchar(150) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `near_location`
--

INSERT INTO `near_location` (`id`, `status`, `insert_time`, `insert_by`, `last_update`, `update_by`, `project_id`, `resource`, `distance`, `detail`, `sort`) VALUES
(1, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 15:00:38', 1, 1, 'Bank', '1KM TO 4KM', 'ICICI Bank Ltd:- Alipur Road Narela, Delhi', 1),
(2, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'Bank', '1KM TO 4KM', 'Axis Bank Ltd:- Bawana Road Narela, Delhi', 2),
(3, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'Bank', '1KM TO 4KM', 'HDFC Bank Ltd:- Railway Road Narela, Delhi', 3),
(4, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'Bank', '1KM TO 4KM', 'State Bank of India :- Narela , Delhi', 4),
(5, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'Bank', '1KM TO 4KM', 'Bank of Baroda :- Lampur Road Narela , Delhi', 5),
(6, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'Bank', '1KM TO 4KM', 'Union Bank of India :- Ramdev Chowk Narela , Delhi', 6),
(7, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'Bank', '1KM TO 4KM', 'Canara Bank :- Ramdev Chowk Narela , Delhi', 7),
(8, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'Bank', '1KM TO 4KM', 'State Bank of India :- Aggarwal Narela , Delhi', 8),
(9, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'School', '0.5KM TO 3KM', 'Khemo Devi Public :- Safiabad Road Narela, Delhi', 1),
(10, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'School', '0.5KM TO 3KM', 'Maharaja Agarsain Public School :- Bawana Road Narela, Delhi', 2),
(11, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'School', '0.5KM TO 3KM', 'Rajkiya Pratiba Vikas Vidyalaya :- A 10 Narela, Delhi', 3),
(12, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'School', '0.5KM TO 3KM', 'R K Memorial Senior Secondary School :- Safiabad Road Narela , Delhi', 4),
(13, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'School', '0.5KM TO 3KM', 'Govt Sarvodya Bal Vidyalaya :- Narela , Delhi', 5),
(14, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'School', '0.5KM TO 3KM', 'National Public School :- Colony Street No-18 Narela , Delhi', 6),
(15, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'Hospital', '2KM TO 8KM', 'Harishchandra Delhi Govt. Hospital', 1),
(16, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'Hospital', '2KM TO 8KM', 'P K Gupta Hospital :- T-43 Shivaji Nagar Narela, Delhi', 2),
(17, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'Hospital', '2KM TO 8KM', 'Dr. Sunitas Eva Hospital :- Arya Samaj Road Narela , Delhi', 3),
(18, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'Hospital', '2KM TO 8KM', 'Raja Harish Chandra Hospital :- Narela main road Narela , Delhi', 4),
(19, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'Hospital', '2KM TO 8KM', 'Sanjeevani Hospital :- Lampur rd Narela , Delhi', 5),
(20, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'Hospital', '2KM TO 8KM', 'Samarpan Mother Child Hospital :- Bawana Road Narela , Delhi', 6),
(21, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'Mandi', '2KM', 'Narela Sabji &amp; Fruit &amp; Anaj Mandi', 1),
(22, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'Railway Station', '2.5KM', 'Narela Railway Station', 1),
(23, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'Market', '1KM', 'Narela Malls and Market', 1),
(24, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'Market', '2KM', 'NARELA MARKET', 2),
(25, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'Industrial Area', '2.5KM', 'Narela Industrial area', 1),
(26, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'DDA Flats', '3KM', 'Narela DDA Flats', 1),
(27, 'A', '2024-03-28 04:06:04', 1, '2024-03-28 09:42:11', 1, 1, 'GT Karnal Road', '3KM', 'GT Karnal Road', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nominee`
--

CREATE TABLE `nominee` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `insert_time` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `mlm_login_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `relation` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `contact` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `nominee`
--

INSERT INTO `nominee` (`id`, `status`, `insert_time`, `last_update`, `update_by`, `mlm_login_id`, `name`, `relation`, `dob`, `contact`) VALUES
(1, 'A', '2024-05-03 10:11:09', '2024-05-03 12:09:57', 1, 23, 'Xyzvvvv', 'sister', '2003-07-22', '8989898989'),
(2, 'A', '2024-05-03 10:33:45', '2024-05-03 10:33:45', 1, 24, 'Deepika', 'brother', '2024-05-14', '787878787878'),
(3, 'A', '2024-05-03 10:45:10', '2024-05-03 10:45:10', 1, 25, 'Ashish', 'son', '2024-05-15', '9999999999'),
(4, 'A', '2024-05-03 10:55:52', '2024-05-03 10:55:52', 1, 26, 'ttt', 'parents', '2024-05-28', '6767676767'),
(5, 'A', '2024-05-03 11:02:37', '2024-05-03 11:02:37', 1, 27, 'dff', 'grand_parents', '2024-05-15', '6767677667'),
(6, 'A', '2024-05-03 11:08:21', '2024-05-03 11:08:21', 1, 28, 'yuyu', 'grand_parents', '2024-05-12', '6767676767'),
(7, 'A', '2024-05-03 11:20:31', '2024-05-03 11:20:31', 1, 29, 'sdfs', 'wife', '2024-05-20', '08130764614'),
(8, 'A', '2024-05-03 14:38:06', '2024-05-03 14:38:06', 1, 30, 'Harsh', 'husband', '2024-05-17', '7898564575'),
(9, 'A', '2024-06-14 13:45:48', '2024-06-14 13:45:48', 18, 31, 'Vishambar Pandey', 'parents', '1969-10-10', '8447676462'),
(10, 'A', '2024-06-14 15:13:49', '2024-06-14 15:13:49', 2, 32, 'p', 'wife', '2024-06-14', '8527596451'),
(11, 'A', '2024-06-14 15:15:39', '2024-06-14 15:15:39', 2, 33, 'p', 'wife', '2024-06-14', '8527596451'),
(12, 'A', '2024-06-15 13:34:37', '2024-06-15 13:34:37', 31, 34, 'POONAM DEVI', 'wife', '1986-01-01', '7678419139'),
(13, 'A', '2024-06-15 15:28:52', '2024-06-15 15:28:52', 31, 35, 'KANCHAN DEVI', 'wife', '1977-06-05', '9810953685'),
(14, 'A', '2024-06-15 17:24:04', '2024-06-15 17:24:04', 31, 36, 'SABITRI DEVI', 'wife', '1982-01-15', '9212638553'),
(15, 'A', '2024-06-15 17:28:19', '2024-06-15 17:28:19', 31, 37, 'NISHU DEVI', 'wife', '1996-09-05', '9818338750'),
(16, 'A', '2024-06-15 18:19:43', '2024-06-15 18:19:43', 31, 38, 'PRANSHU YADAV', 'son', '2007-07-11', '7017849630'),
(17, 'A', '2024-06-15 18:23:08', '2024-06-15 18:23:08', 31, 39, 'URMILA', 'wife', '1977-04-11', '9354592324'),
(18, 'A', '2024-06-26 15:25:07', '2024-06-26 15:25:07', 33, 40, 'Amni', 'wife', '2024-06-21', '9911991199'),
(19, 'A', '2024-06-26 16:29:18', '2024-06-26 16:29:18', 40, 41, 'Jaggu', 'son', '2024-06-05', '9191919191'),
(20, 'A', '2024-06-26 16:32:40', '2024-06-26 16:32:40', 41, 42, 'Ankita', 'parents', '2024-06-05', '9191919191'),
(21, 'A', '2024-06-26 16:35:25', '2024-06-26 16:35:25', 42, 43, 'Dharmi', 'wife', '2024-06-05', '9191919191'),
(22, 'A', '2024-06-26 16:40:26', '2024-06-26 16:40:26', 43, 44, 'Vijiya', 'wife', '2024-06-05', '9191919191'),
(23, 'A', '2024-06-27 15:39:21', '2024-06-27 15:39:21', 31, 45, 'SEEMA KANWAR', 'wife', '1974-01-01', '9136482533'),
(24, 'A', '2024-06-27 15:47:04', '2024-06-27 15:47:04', 31, 46, 'SUNITA', 'wife', '1978-01-18', '9716336299');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `name` varchar(30) NOT NULL,
  `insert_time` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `img_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `status`, `name`, `insert_time`, `last_update`, `updated_by`, `img_id`) VALUES
(1, 'A', 'Reeva Enclave', '2024-04-01 17:48:05', '2024-04-01 17:48:05', 1, 26);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `insert_time` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `update_by` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `plot_no` varchar(6) NOT NULL,
  `block` char(1) NOT NULL,
  `type` varchar(30) NOT NULL,
  `prop_status` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `area_sq` int(11) NOT NULL,
  `size_gaj` int(11) NOT NULL,
  `img_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `status`, `insert_time`, `last_update`, `update_by`, `project_id`, `plot_no`, `block`, `type`, `prop_status`, `price`, `area_sq`, `size_gaj`, `img_id`) VALUES
(1, 'A', '2024-03-23 16:56:23', '2024-07-03 10:03:51', 1, 1, '0001', 'A', 'Plot', 'S', 200, 25, 40, 73),
(2, 'A', '2024-03-23 16:56:23', '2024-07-05 12:54:54', 40, 1, '0002', 'A', 'Plot', 'P', 0, 25, 40, 73),
(3, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0003', 'A', 'Plot', 'A', 0, 25, 40, 73),
(4, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0004', 'A', 'Plot', 'A', 0, 25, 40, 73),
(5, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0005', 'A', 'Plot', 'A', 0, 25, 40, 73),
(6, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0006', 'A', 'Plot', 'A', 0, 25, 40, 73),
(7, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0007', 'A', 'Plot', 'A', 0, 25, 40, 73),
(8, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0008', 'A', 'Plot', 'A', 0, 25, 40, 73),
(9, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0009', 'A', 'Plot', 'A', 0, 25, 40, 73),
(10, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0010', 'A', 'Plot', 'A', 0, 25, 40, 73),
(11, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0011', 'A', 'Plot', 'A', 0, 25, 40, 73),
(12, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0012', 'A', 'Plot', 'A', 0, 25, 40, 73),
(13, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0013', 'A', 'Plot', 'A', 0, 25, 40, 73),
(14, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0014', 'A', 'Plot', 'A', 0, 25, 40, 73),
(15, 'A', '2024-03-23 16:56:23', '2024-05-08 19:13:22', 18, 1, '0015', 'A', 'Plot', 'A', 0, 25, 40, 73),
(16, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0016', 'A', 'Plot', 'A', 0, 25, 40, 73),
(17, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0017', 'A', 'Plot', 'A', 0, 25, 40, 73),
(18, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0018', 'A', 'Plot', 'A', 0, 25, 40, 73),
(19, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0019', 'A', 'Plot', 'A', 0, 25, 40, 73),
(20, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0020', 'A', 'Plot', 'A', 0, 25, 40, 73),
(21, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0021', 'A', 'Plot', 'A', 0, 27, 50, 73),
(22, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0022', 'A', 'Plot', 'A', 0, 27, 50, 73),
(23, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0023', 'A', 'Plot', 'A', 0, 27, 50, 73),
(24, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0024', 'A', 'Plot', 'A', 0, 27, 50, 73),
(25, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0025', 'A', 'Plot', 'A', 0, 27, 50, 73),
(26, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0026', 'A', 'Plot', 'A', 0, 27, 50, 73),
(27, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0027', 'A', 'Plot', 'A', 0, 27, 50, 73),
(28, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0028', 'A', 'Plot', 'A', 0, 27, 50, 73),
(29, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0029', 'A', 'Plot', 'A', 0, 27, 50, 73),
(30, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0030', 'A', 'Plot', 'A', 0, 27, 50, 73),
(31, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0031', 'A', 'Plot', 'A', 0, 27, 50, 73),
(32, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0032', 'A', 'Plot', 'A', 0, 27, 50, 73),
(33, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0033', 'A', 'Plot', 'A', 0, 27, 50, 73),
(34, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0034', 'A', 'Plot', 'A', 0, 27, 50, 73),
(35, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0035', 'A', 'Plot', 'A', 0, 27, 50, 73),
(36, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0036', 'A', 'Plot', 'A', 0, 27, 50, 73),
(37, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0037', 'A', 'Plot', 'A', 0, 27, 50, 73),
(38, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0038', 'A', 'Plot', 'A', 0, 27, 50, 73),
(39, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0039', 'A', 'Plot', 'A', 0, 27, 50, 73),
(40, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0040', 'A', 'Plot', 'A', 0, 27, 50, 73),
(41, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0041', 'A', 'Plot', 'A', 0, 27, 50, 73),
(42, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0042', 'A', 'Plot', 'A', 0, 27, 50, 73),
(43, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0043', 'A', 'Plot', 'A', 0, 27, 50, 73),
(44, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0044', 'A', 'Plot', 'A', 0, 27, 50, 73),
(45, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0045', 'A', 'Plot', 'A', 0, 27, 50, 73),
(46, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0046', 'A', 'Plot', 'A', 0, 27, 50, 73),
(47, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0047', 'A', 'Plot', 'A', 0, 27, 50, 73),
(48, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0048', 'A', 'Plot', 'A', 0, 27, 50, 73),
(49, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0049', 'A', 'Plot', 'A', 0, 27, 50, 73),
(50, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0050', 'A', 'Plot', 'A', 0, 27, 50, 73),
(51, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0051', 'A', 'Plot', 'A', 0, 27, 50, 73),
(52, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0052', 'A', 'Plot', 'A', 0, 27, 50, 73),
(53, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0053', 'A', 'Plot', 'A', 0, 27, 50, 73),
(54, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0054', 'A', 'Plot', 'A', 0, 27, 50, 73),
(55, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0055', 'A', 'Plot', 'A', 0, 27, 50, 73),
(56, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0056', 'A', 'Plot', 'A', 0, 27, 50, 73),
(57, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0057', 'A', 'Plot', 'A', 0, 27, 50, 73),
(58, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0058', 'A', 'Plot', 'A', 0, 27, 50, 73),
(59, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0059', 'A', 'Plot', 'A', 0, 27, 50, 73),
(60, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0060', 'A', 'Plot', 'A', 0, 27, 50, 73),
(61, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0061', 'A', 'Plot', 'A', 0, 30, 50, 73),
(62, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0062', 'A', 'Plot', 'A', 0, 30, 50, 73),
(63, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0063', 'A', 'Plot', 'A', 0, 30, 50, 73),
(64, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0064', 'A', 'Plot', 'A', 0, 30, 50, 73),
(65, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0065', 'A', 'Plot', 'A', 0, 30, 50, 73),
(66, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0066', 'A', 'Plot', 'A', 0, 30, 50, 73),
(67, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0067', 'A', 'Plot', 'A', 0, 30, 50, 73),
(68, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0068', 'A', 'Plot', 'A', 0, 30, 50, 73),
(69, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0069', 'A', 'Plot', 'A', 0, 30, 50, 73),
(70, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0070', 'A', 'Plot', 'A', 0, 30, 50, 73),
(71, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0071', 'A', 'Plot', 'A', 0, 30, 50, 73),
(72, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0072', 'A', 'Plot', 'A', 0, 30, 50, 73),
(73, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0073', 'A', 'Plot', 'A', 0, 30, 50, 73),
(74, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0074', 'A', 'Plot', 'A', 0, 30, 50, 73),
(75, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0075', 'A', 'Plot', 'A', 0, 30, 50, 73),
(76, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0076', 'A', 'Plot', 'A', 0, 30, 50, 73),
(77, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0077', 'A', 'Plot', 'A', 0, 30, 50, 73),
(78, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0078', 'A', 'Plot', 'A', 0, 30, 50, 73),
(79, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0079', 'A', 'Plot', 'A', 0, 30, 50, 73),
(80, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0080', 'A', 'Plot', 'A', 0, 30, 50, 73),
(81, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0081', 'A', 'Plot', 'A', 0, 30, 50, 73),
(82, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0082', 'A', 'Plot', 'A', 0, 30, 50, 73),
(83, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0083', 'A', 'Plot', 'A', 0, 30, 50, 73),
(84, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0084', 'A', 'Plot', 'A', 0, 30, 50, 73),
(85, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0085', 'A', 'Plot', 'A', 0, 30, 50, 73),
(86, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0086', 'A', 'Plot', 'A', 0, 30, 50, 73),
(87, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0087', 'A', 'Plot', 'A', 0, 30, 50, 73),
(88, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0088', 'A', 'Plot', 'A', 0, 30, 50, 73),
(89, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0089', 'A', 'Plot', 'A', 0, 30, 50, 73),
(90, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0090', 'A', 'Plot', 'A', 0, 30, 50, 73),
(91, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0091', 'A', 'Plot', 'A', 0, 30, 50, 73),
(92, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0092', 'A', 'Plot', 'A', 0, 30, 50, 73),
(93, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0093', 'A', 'Plot', 'A', 0, 30, 50, 73),
(94, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0094', 'A', 'Plot', 'A', 0, 30, 50, 73),
(95, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0095', 'A', 'Plot', 'A', 0, 30, 50, 73),
(96, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0096', 'A', 'Plot', 'A', 0, 30, 50, 73),
(97, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0097', 'A', 'Plot', 'A', 0, 30, 50, 73),
(98, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0098', 'A', 'Plot', 'A', 0, 30, 50, 73),
(99, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0099', 'A', 'Plot', 'A', 0, 30, 50, 73),
(100, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0100', 'A', 'Plot', 'A', 0, 30, 50, 73),
(101, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0101', 'A', 'Plot', 'A', 0, 30, 50, 73),
(102, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0102', 'A', 'Plot', 'A', 0, 30, 50, 73),
(103, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0103', 'A', 'Plot', 'A', 0, 30, 50, 73),
(104, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0104', 'A', 'Plot', 'A', 0, 30, 50, 73),
(105, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0105', 'A', 'Plot', 'A', 0, 30, 50, 73),
(106, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0106', 'A', 'Plot', 'A', 0, 30, 50, 73),
(107, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0107', 'A', 'Plot', 'A', 0, 30, 50, 73),
(108, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0108', 'A', 'Plot', 'A', 0, 30, 50, 73),
(109, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0109', 'A', 'Plot', 'A', 0, 30, 50, 73),
(110, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0110', 'A', 'Plot', 'A', 0, 30, 50, 73),
(111, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0111', 'A', 'Plot', 'A', 0, 30, 50, 73),
(112, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0112', 'A', 'Plot', 'A', 0, 30, 50, 73),
(113, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0113', 'A', 'Plot', 'A', 0, 30, 50, 73),
(114, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0114', 'A', 'Plot', 'A', 0, 30, 50, 73),
(115, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0115', 'A', 'Plot', 'A', 0, 30, 50, 73),
(116, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0116', 'A', 'Plot', 'A', 0, 30, 50, 73),
(117, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0117', 'A', 'Plot', 'A', 0, 30, 50, 73),
(118, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0118', 'A', 'Plot', 'A', 0, 30, 50, 73),
(119, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0119', 'A', 'Plot', 'A', 0, 30, 50, 73),
(120, 'A', '2024-03-23 16:56:23', '2024-03-23 16:56:23', 1, 1, '0120', 'A', 'Plot', 'A', 0, 30, 50, 73),
(121, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0201', 'B', 'Plot', 'A', 0, 25, 40, 73),
(122, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0202', 'B', 'Plot', 'A', 0, 25, 40, 73),
(123, 'A', '2024-03-23 16:57:05', '2024-07-02 15:00:33', 1, 1, '0203', 'B', 'Plot', 'A', 0, 25, 40, 73),
(124, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0204', 'B', 'Plot', 'A', 0, 25, 40, 73),
(125, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0205', 'B', 'Plot', 'A', 0, 25, 40, 73),
(126, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0206', 'B', 'Plot', 'A', 0, 25, 40, 73),
(127, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0207', 'B', 'Plot', 'A', 0, 25, 40, 73),
(128, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0208', 'B', 'Plot', 'A', 0, 25, 40, 73),
(129, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0209', 'B', 'Plot', 'A', 0, 25, 40, 73),
(130, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0210', 'B', 'Plot', 'A', 0, 25, 40, 73),
(131, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0211', 'B', 'Plot', 'A', 0, 25, 40, 73),
(132, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0212', 'B', 'Plot', 'A', 0, 25, 40, 73),
(133, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0213', 'B', 'Plot', 'A', 0, 25, 40, 73),
(134, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0214', 'B', 'Plot', 'A', 0, 25, 40, 73),
(135, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0215', 'B', 'Plot', 'A', 0, 25, 40, 73),
(136, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0216', 'B', 'Plot', 'A', 0, 25, 40, 73),
(137, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0217', 'B', 'Plot', 'A', 0, 25, 40, 73),
(138, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0218', 'B', 'Plot', 'A', 0, 25, 40, 73),
(139, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0219', 'B', 'Plot', 'A', 0, 25, 40, 73),
(140, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0220', 'B', 'Plot', 'A', 0, 25, 40, 73),
(141, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0221', 'B', 'Plot', 'A', 0, 27, 50, 73),
(142, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0222', 'B', 'Plot', 'A', 0, 27, 50, 73),
(143, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0223', 'B', 'Plot', 'A', 0, 27, 50, 73),
(144, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0224', 'B', 'Plot', 'A', 0, 27, 50, 73),
(145, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0225', 'B', 'Plot', 'A', 0, 27, 50, 73),
(146, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0226', 'B', 'Plot', 'A', 0, 27, 50, 73),
(147, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0227', 'B', 'Plot', 'A', 0, 27, 50, 73),
(148, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0228', 'B', 'Plot', 'A', 0, 27, 50, 73),
(149, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0229', 'B', 'Plot', 'A', 0, 27, 50, 73),
(150, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0230', 'B', 'Plot', 'A', 0, 27, 50, 73),
(151, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0231', 'B', 'Plot', 'A', 0, 27, 50, 73),
(152, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0232', 'B', 'Plot', 'A', 0, 27, 50, 73),
(153, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0233', 'B', 'Plot', 'A', 0, 27, 50, 73),
(154, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0234', 'B', 'Plot', 'A', 0, 27, 50, 73),
(155, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0235', 'B', 'Plot', 'A', 0, 27, 50, 73),
(156, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0236', 'B', 'Plot', 'A', 0, 27, 50, 73),
(157, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0237', 'B', 'Plot', 'A', 0, 27, 50, 73),
(158, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0238', 'B', 'Plot', 'A', 0, 27, 50, 73),
(159, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0239', 'B', 'Plot', 'A', 0, 27, 50, 73),
(160, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0240', 'B', 'Plot', 'A', 0, 27, 50, 73),
(161, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0241', 'B', 'Plot', 'A', 0, 27, 50, 73),
(162, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0242', 'B', 'Plot', 'A', 0, 27, 50, 73),
(163, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0243', 'B', 'Plot', 'A', 0, 27, 50, 73),
(164, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0244', 'B', 'Plot', 'A', 0, 27, 50, 73),
(165, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0245', 'B', 'Plot', 'A', 0, 27, 50, 73),
(166, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0246', 'B', 'Plot', 'A', 0, 27, 50, 73),
(167, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0247', 'B', 'Plot', 'A', 0, 27, 50, 73),
(168, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0248', 'B', 'Plot', 'A', 0, 27, 50, 73),
(169, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0249', 'B', 'Plot', 'A', 0, 27, 50, 73),
(170, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0250', 'B', 'Plot', 'A', 0, 27, 50, 73),
(171, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0251', 'B', 'Plot', 'A', 0, 27, 50, 73),
(172, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0252', 'B', 'Plot', 'A', 0, 27, 50, 73),
(173, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0253', 'B', 'Plot', 'A', 0, 27, 50, 73),
(174, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0254', 'B', 'Plot', 'A', 0, 27, 50, 73),
(175, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0255', 'B', 'Plot', 'A', 0, 27, 50, 73),
(176, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0256', 'B', 'Plot', 'A', 0, 27, 50, 73),
(177, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0257', 'B', 'Plot', 'A', 0, 27, 50, 73),
(178, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0258', 'B', 'Plot', 'A', 0, 27, 50, 73),
(179, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0259', 'B', 'Plot', 'A', 0, 27, 50, 73),
(180, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0260', 'B', 'Plot', 'A', 0, 27, 50, 73),
(181, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0261', 'B', 'Plot', 'A', 0, 30, 50, 73),
(182, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0262', 'B', 'Plot', 'A', 0, 30, 50, 73),
(183, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0263', 'B', 'Plot', 'A', 0, 30, 50, 73),
(184, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0264', 'B', 'Plot', 'A', 0, 30, 50, 73),
(185, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0265', 'B', 'Plot', 'A', 0, 30, 50, 73),
(186, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0266', 'B', 'Plot', 'A', 0, 30, 50, 73),
(187, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0267', 'B', 'Plot', 'A', 0, 30, 50, 73),
(188, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0268', 'B', 'Plot', 'A', 0, 30, 50, 73),
(189, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0269', 'B', 'Plot', 'A', 0, 30, 50, 73),
(190, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0270', 'B', 'Plot', 'A', 0, 30, 50, 73),
(191, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0271', 'B', 'Plot', 'A', 0, 30, 50, 73),
(192, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0272', 'B', 'Plot', 'A', 0, 30, 50, 73),
(193, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0273', 'B', 'Plot', 'A', 0, 30, 50, 73),
(194, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0274', 'B', 'Plot', 'A', 0, 30, 50, 73),
(195, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0275', 'B', 'Plot', 'A', 0, 30, 50, 73),
(196, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0276', 'B', 'Plot', 'A', 0, 30, 50, 73),
(197, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0277', 'B', 'Plot', 'A', 0, 30, 50, 73),
(198, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0278', 'B', 'Plot', 'A', 0, 30, 50, 73),
(199, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0279', 'B', 'Plot', 'A', 0, 30, 50, 73),
(200, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0280', 'B', 'Plot', 'A', 0, 30, 50, 73),
(201, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0281', 'B', 'Plot', 'A', 0, 30, 50, 73),
(202, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0282', 'B', 'Plot', 'A', 0, 30, 50, 73),
(203, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0283', 'B', 'Plot', 'A', 0, 30, 50, 73),
(204, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0284', 'B', 'Plot', 'A', 0, 30, 50, 73),
(205, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0285', 'B', 'Plot', 'A', 0, 30, 50, 73),
(206, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0286', 'B', 'Plot', 'A', 0, 30, 50, 73),
(207, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0287', 'B', 'Plot', 'A', 0, 30, 50, 73),
(208, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0288', 'B', 'Plot', 'A', 0, 30, 50, 73),
(209, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0289', 'B', 'Plot', 'A', 0, 30, 50, 73),
(210, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0290', 'B', 'Plot', 'A', 0, 30, 50, 73),
(211, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0291', 'B', 'Plot', 'A', 0, 30, 50, 73),
(212, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0292', 'B', 'Plot', 'A', 0, 30, 50, 73),
(213, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0293', 'B', 'Plot', 'A', 0, 30, 50, 73),
(214, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0294', 'B', 'Plot', 'A', 0, 30, 50, 73),
(215, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0295', 'B', 'Plot', 'A', 0, 30, 50, 73),
(216, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0296', 'B', 'Plot', 'A', 0, 30, 50, 73),
(217, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0297', 'B', 'Plot', 'A', 0, 30, 50, 73),
(218, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0298', 'B', 'Plot', 'A', 0, 30, 50, 73),
(219, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0299', 'B', 'Plot', 'A', 0, 30, 50, 73),
(220, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0300', 'B', 'Plot', 'A', 0, 30, 50, 73),
(221, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0301', 'B', 'Plot', 'A', 0, 30, 50, 73),
(222, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0302', 'B', 'Plot', 'A', 0, 30, 50, 73),
(223, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0303', 'B', 'Plot', 'A', 0, 30, 50, 73),
(224, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0304', 'B', 'Plot', 'A', 0, 30, 50, 73),
(225, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0305', 'B', 'Plot', 'A', 0, 30, 50, 73),
(226, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0306', 'B', 'Plot', 'A', 0, 30, 50, 73),
(227, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0307', 'B', 'Plot', 'A', 0, 30, 50, 73),
(228, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0308', 'B', 'Plot', 'A', 0, 30, 50, 73),
(229, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0309', 'B', 'Plot', 'A', 0, 30, 50, 73),
(230, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0310', 'B', 'Plot', 'A', 0, 30, 50, 73),
(231, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0311', 'B', 'Plot', 'A', 0, 30, 50, 73),
(232, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0312', 'B', 'Plot', 'A', 0, 30, 50, 73),
(233, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0313', 'B', 'Plot', 'A', 0, 30, 50, 73),
(234, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0314', 'B', 'Plot', 'A', 0, 30, 50, 73),
(235, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0315', 'B', 'Plot', 'A', 0, 30, 50, 73),
(236, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0316', 'B', 'Plot', 'A', 0, 30, 50, 73),
(237, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0317', 'B', 'Plot', 'A', 0, 30, 50, 73),
(238, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0318', 'B', 'Plot', 'A', 0, 30, 50, 73),
(239, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0319', 'B', 'Plot', 'A', 0, 30, 50, 73),
(240, 'A', '2024-03-23 16:57:05', '2024-03-23 16:57:05', 1, 1, '0320', 'B', 'Plot', 'A', 0, 30, 50, 73),
(241, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0401', 'C', 'Plot', 'A', 0, 25, 40, 73),
(242, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0402', 'C', 'Plot', 'A', 0, 25, 40, 73),
(243, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0403', 'C', 'Plot', 'A', 0, 25, 40, 73),
(244, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0404', 'C', 'Plot', 'A', 0, 25, 40, 73),
(245, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0405', 'C', 'Plot', 'A', 0, 25, 40, 73),
(246, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0406', 'C', 'Plot', 'A', 0, 25, 40, 73),
(247, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0407', 'C', 'Plot', 'A', 0, 25, 40, 73),
(248, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0408', 'C', 'Plot', 'A', 0, 25, 40, 73),
(249, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0409', 'C', 'Plot', 'A', 0, 25, 40, 73),
(250, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0410', 'C', 'Plot', 'A', 0, 25, 40, 73),
(251, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0411', 'C', 'Plot', 'A', 0, 25, 40, 73),
(252, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0412', 'C', 'Plot', 'A', 0, 25, 40, 73),
(253, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0413', 'C', 'Plot', 'A', 0, 25, 40, 73),
(254, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0414', 'C', 'Plot', 'A', 0, 25, 40, 73),
(255, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0415', 'C', 'Plot', 'A', 0, 25, 40, 73),
(256, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0416', 'C', 'Plot', 'A', 0, 25, 40, 73),
(257, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0417', 'C', 'Plot', 'A', 0, 25, 40, 73),
(258, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0418', 'C', 'Plot', 'A', 0, 25, 40, 73),
(259, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0419', 'C', 'Plot', 'A', 0, 25, 40, 73),
(260, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0420', 'C', 'Plot', 'A', 0, 25, 40, 73),
(261, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0421', 'C', 'Plot', 'A', 0, 27, 50, 73),
(262, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0422', 'C', 'Plot', 'A', 0, 27, 50, 73),
(263, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0423', 'C', 'Plot', 'A', 0, 27, 50, 73),
(264, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0424', 'C', 'Plot', 'A', 0, 27, 50, 73),
(265, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0425', 'C', 'Plot', 'A', 0, 27, 50, 73),
(266, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0426', 'C', 'Plot', 'A', 0, 27, 50, 73),
(267, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0427', 'C', 'Plot', 'A', 0, 27, 50, 73),
(268, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0428', 'C', 'Plot', 'A', 0, 27, 50, 73),
(269, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0429', 'C', 'Plot', 'A', 0, 27, 50, 73),
(270, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0430', 'C', 'Plot', 'A', 0, 27, 50, 73),
(271, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0431', 'C', 'Plot', 'A', 0, 27, 50, 73),
(272, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0432', 'C', 'Plot', 'A', 0, 27, 50, 73),
(273, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0433', 'C', 'Plot', 'A', 0, 27, 50, 73),
(274, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0434', 'C', 'Plot', 'A', 0, 27, 50, 73),
(275, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0435', 'C', 'Plot', 'A', 0, 27, 50, 73),
(276, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0436', 'C', 'Plot', 'A', 0, 27, 50, 73),
(277, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0437', 'C', 'Plot', 'A', 0, 27, 50, 73),
(278, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0438', 'C', 'Plot', 'A', 0, 27, 50, 73),
(279, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0439', 'C', 'Plot', 'A', 0, 27, 50, 73),
(280, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0440', 'C', 'Plot', 'A', 0, 27, 50, 73),
(281, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0441', 'C', 'Plot', 'A', 0, 27, 50, 73),
(282, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0442', 'C', 'Plot', 'A', 0, 27, 50, 73),
(283, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0443', 'C', 'Plot', 'A', 0, 27, 50, 73),
(284, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0444', 'C', 'Plot', 'A', 0, 27, 50, 73),
(285, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0445', 'C', 'Plot', 'A', 0, 27, 50, 73),
(286, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0446', 'C', 'Plot', 'A', 0, 27, 50, 73),
(287, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0447', 'C', 'Plot', 'A', 0, 27, 50, 73),
(288, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0448', 'C', 'Plot', 'A', 0, 27, 50, 73),
(289, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0449', 'C', 'Plot', 'A', 0, 27, 50, 73),
(290, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0450', 'C', 'Plot', 'A', 0, 27, 50, 73),
(291, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0451', 'C', 'Plot', 'A', 0, 27, 50, 73),
(292, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0452', 'C', 'Plot', 'A', 0, 27, 50, 73),
(293, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0453', 'C', 'Plot', 'A', 0, 27, 50, 73),
(294, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0454', 'C', 'Plot', 'A', 0, 27, 50, 73),
(295, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0455', 'C', 'Plot', 'A', 0, 27, 50, 73),
(296, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0456', 'C', 'Plot', 'A', 0, 27, 50, 73),
(297, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0457', 'C', 'Plot', 'A', 0, 27, 50, 73),
(298, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0458', 'C', 'Plot', 'A', 0, 27, 50, 73),
(299, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0459', 'C', 'Plot', 'A', 0, 27, 50, 73),
(300, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0460', 'C', 'Plot', 'A', 0, 27, 50, 73),
(301, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0461', 'C', 'Plot', 'A', 0, 30, 50, 73),
(302, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0462', 'C', 'Plot', 'A', 0, 30, 50, 73),
(303, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0463', 'C', 'Plot', 'A', 0, 30, 50, 73),
(304, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0464', 'C', 'Plot', 'A', 0, 30, 50, 73),
(305, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0465', 'C', 'Plot', 'A', 0, 30, 50, 73),
(306, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0466', 'C', 'Plot', 'A', 0, 30, 50, 73),
(307, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0467', 'C', 'Plot', 'A', 0, 30, 50, 73),
(308, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0468', 'C', 'Plot', 'A', 0, 30, 50, 73),
(309, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0469', 'C', 'Plot', 'A', 0, 30, 50, 73),
(310, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0470', 'C', 'Plot', 'A', 0, 30, 50, 73),
(311, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0471', 'C', 'Plot', 'A', 0, 30, 50, 73),
(312, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0472', 'C', 'Plot', 'A', 0, 30, 50, 73),
(313, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0473', 'C', 'Plot', 'A', 0, 30, 50, 73),
(314, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0474', 'C', 'Plot', 'A', 0, 30, 50, 73),
(315, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0475', 'C', 'Plot', 'A', 0, 30, 50, 73),
(316, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0476', 'C', 'Plot', 'A', 0, 30, 50, 73),
(317, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0477', 'C', 'Plot', 'A', 0, 30, 50, 73),
(318, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0478', 'C', 'Plot', 'A', 0, 30, 50, 73),
(319, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0479', 'C', 'Plot', 'A', 0, 30, 50, 73),
(320, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0480', 'C', 'Plot', 'A', 0, 30, 50, 73),
(321, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0481', 'C', 'Plot', 'A', 0, 30, 50, 73),
(322, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0482', 'C', 'Plot', 'A', 0, 30, 50, 73),
(323, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0483', 'C', 'Plot', 'A', 0, 30, 50, 73),
(324, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0484', 'C', 'Plot', 'A', 0, 30, 50, 73),
(325, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0485', 'C', 'Plot', 'A', 0, 30, 50, 73),
(326, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0486', 'C', 'Plot', 'A', 0, 30, 50, 73),
(327, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0487', 'C', 'Plot', 'A', 0, 30, 50, 73),
(328, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0488', 'C', 'Plot', 'A', 0, 30, 50, 73),
(329, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0489', 'C', 'Plot', 'A', 0, 30, 50, 73),
(330, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0490', 'C', 'Plot', 'A', 0, 30, 50, 73),
(331, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0491', 'C', 'Plot', 'A', 0, 30, 50, 73),
(332, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0492', 'C', 'Plot', 'A', 0, 30, 50, 73),
(333, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0493', 'C', 'Plot', 'A', 0, 30, 50, 73),
(334, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0494', 'C', 'Plot', 'A', 0, 30, 50, 73),
(335, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0495', 'C', 'Plot', 'A', 0, 30, 50, 73),
(336, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0496', 'C', 'Plot', 'A', 0, 30, 50, 73),
(337, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0497', 'C', 'Plot', 'A', 0, 30, 50, 73),
(338, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0498', 'C', 'Plot', 'A', 0, 30, 50, 73),
(339, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0499', 'C', 'Plot', 'A', 0, 30, 50, 73),
(340, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0500', 'C', 'Plot', 'A', 0, 30, 50, 73),
(341, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0501', 'C', 'Plot', 'A', 0, 30, 50, 73),
(342, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0502', 'C', 'Plot', 'A', 0, 30, 50, 73),
(343, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0503', 'C', 'Plot', 'A', 0, 30, 50, 73),
(344, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0504', 'C', 'Plot', 'A', 0, 30, 50, 73),
(345, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0505', 'C', 'Plot', 'A', 0, 30, 50, 73),
(346, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0506', 'C', 'Plot', 'A', 0, 30, 50, 73),
(347, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0507', 'C', 'Plot', 'A', 0, 30, 50, 73),
(348, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0508', 'C', 'Plot', 'A', 0, 30, 50, 73),
(349, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0509', 'C', 'Plot', 'A', 0, 30, 50, 73),
(350, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0510', 'C', 'Plot', 'A', 0, 30, 50, 73),
(351, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0511', 'C', 'Plot', 'A', 0, 30, 50, 73),
(352, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0512', 'C', 'Plot', 'A', 0, 30, 50, 73),
(353, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0513', 'C', 'Plot', 'A', 0, 30, 50, 73),
(354, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0514', 'C', 'Plot', 'A', 0, 30, 50, 73),
(355, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0515', 'C', 'Plot', 'A', 0, 30, 50, 73),
(356, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0516', 'C', 'Plot', 'A', 0, 30, 50, 73),
(357, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0517', 'C', 'Plot', 'A', 0, 30, 50, 73),
(358, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0518', 'C', 'Plot', 'A', 0, 30, 50, 73),
(359, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0519', 'C', 'Plot', 'A', 0, 30, 50, 73),
(360, 'A', '2024-03-23 16:57:51', '2024-03-23 16:57:51', 1, 1, '0520', 'C', 'Plot', 'A', 0, 30, 50, 73),
(361, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0601', 'D', 'Plot', 'A', 0, 25, 40, 73),
(362, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0602', 'D', 'Plot', 'A', 0, 25, 40, 73),
(363, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0603', 'D', 'Plot', 'A', 0, 25, 40, 73),
(364, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0604', 'D', 'Plot', 'A', 0, 25, 40, 73),
(365, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0605', 'D', 'Plot', 'A', 0, 25, 40, 73),
(366, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0606', 'D', 'Plot', 'A', 0, 25, 40, 73),
(367, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0607', 'D', 'Plot', 'A', 0, 25, 40, 73),
(368, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0608', 'D', 'Plot', 'A', 0, 25, 40, 73),
(369, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0609', 'D', 'Plot', 'A', 0, 25, 40, 73),
(370, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0610', 'D', 'Plot', 'A', 0, 25, 40, 73),
(371, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0611', 'D', 'Plot', 'A', 0, 25, 40, 73),
(372, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0612', 'D', 'Plot', 'A', 0, 25, 40, 73),
(373, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0613', 'D', 'Plot', 'A', 0, 25, 40, 73),
(374, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0614', 'D', 'Plot', 'A', 0, 25, 40, 73),
(375, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0615', 'D', 'Plot', 'A', 0, 25, 40, 73),
(376, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0616', 'D', 'Plot', 'A', 0, 25, 40, 73),
(377, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0617', 'D', 'Plot', 'A', 0, 25, 40, 73),
(378, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0618', 'D', 'Plot', 'A', 0, 25, 40, 73),
(379, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0619', 'D', 'Plot', 'A', 0, 25, 40, 73),
(380, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0620', 'D', 'Plot', 'A', 0, 25, 40, 73),
(381, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0621', 'D', 'Plot', 'A', 0, 27, 50, 73),
(382, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0622', 'D', 'Plot', 'A', 0, 27, 50, 73),
(383, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0623', 'D', 'Plot', 'A', 0, 27, 50, 73),
(384, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0624', 'D', 'Plot', 'A', 0, 27, 50, 73),
(385, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0625', 'D', 'Plot', 'A', 0, 27, 50, 73),
(386, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0626', 'D', 'Plot', 'A', 0, 27, 50, 73),
(387, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0627', 'D', 'Plot', 'A', 0, 27, 50, 73),
(388, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0628', 'D', 'Plot', 'A', 0, 27, 50, 73),
(389, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0629', 'D', 'Plot', 'A', 0, 27, 50, 73),
(390, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0630', 'D', 'Plot', 'A', 0, 27, 50, 73),
(391, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0631', 'D', 'Plot', 'A', 0, 27, 50, 73),
(392, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0632', 'D', 'Plot', 'A', 0, 27, 50, 73),
(393, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0633', 'D', 'Plot', 'A', 0, 27, 50, 73),
(394, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0634', 'D', 'Plot', 'A', 0, 27, 50, 73),
(395, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0635', 'D', 'Plot', 'A', 0, 27, 50, 73),
(396, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0636', 'D', 'Plot', 'A', 0, 27, 50, 73),
(397, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0637', 'D', 'Plot', 'A', 0, 27, 50, 73),
(398, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0638', 'D', 'Plot', 'A', 0, 27, 50, 73),
(399, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0639', 'D', 'Plot', 'A', 0, 27, 50, 73),
(400, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0640', 'D', 'Plot', 'A', 0, 27, 50, 73),
(401, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0641', 'D', 'Plot', 'A', 0, 27, 50, 73),
(402, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0642', 'D', 'Plot', 'A', 0, 27, 50, 73),
(403, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0643', 'D', 'Plot', 'A', 0, 27, 50, 73),
(404, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0644', 'D', 'Plot', 'A', 0, 27, 50, 73),
(405, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0645', 'D', 'Plot', 'A', 0, 27, 50, 73),
(406, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0646', 'D', 'Plot', 'A', 0, 27, 50, 73),
(407, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0647', 'D', 'Plot', 'A', 0, 27, 50, 73),
(408, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0648', 'D', 'Plot', 'A', 0, 27, 50, 73),
(409, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0649', 'D', 'Plot', 'A', 0, 27, 50, 73),
(410, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0650', 'D', 'Plot', 'A', 0, 27, 50, 73),
(411, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0651', 'D', 'Plot', 'A', 0, 27, 50, 73),
(412, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0652', 'D', 'Plot', 'A', 0, 27, 50, 73),
(413, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0653', 'D', 'Plot', 'A', 0, 27, 50, 73),
(414, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0654', 'D', 'Plot', 'A', 0, 27, 50, 73),
(415, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0655', 'D', 'Plot', 'A', 0, 27, 50, 73),
(416, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0656', 'D', 'Plot', 'A', 0, 27, 50, 73),
(417, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0657', 'D', 'Plot', 'A', 0, 27, 50, 73),
(418, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0658', 'D', 'Plot', 'A', 0, 27, 50, 73),
(419, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0659', 'D', 'Plot', 'A', 0, 27, 50, 73),
(420, 'A', '2024-03-23 16:58:41', '2024-03-23 16:58:41', 1, 1, '0660', 'D', 'Plot', 'A', 0, 27, 50, 73);

-- --------------------------------------------------------

--
-- Table structure for table `prop_amount_recieved`
--

CREATE TABLE `prop_amount_recieved` (
  `id` int(11) NOT NULL,
  `last_update` datetime NOT NULL DEFAULT current_timestamp(),
  `update_by` int(11) NOT NULL,
  `count_status` int(11) NOT NULL DEFAULT 1,
  `booking_id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `amount` int(11) NOT NULL,
  `booking_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prop_amount_recieved`
--

INSERT INTO `prop_amount_recieved` (`id`, `last_update`, `update_by`, `count_status`, `booking_id`, `status`, `amount`, `booking_date`) VALUES
(1, '2024-07-02 17:32:57', 0, 1, 1, 'T', 5000, '2024-07-02 17:32:57'),
(2, '2024-07-03 09:19:47', 1, 1, 1, 'T', 200000, '2024-07-03 09:19:47'),
(3, '2024-07-03 09:22:38', 1, 1, 1, 'P', 300000, '2024-07-03 09:22:38'),
(4, '2024-07-03 09:30:08', 1, 1, 1, 'B', 50000, '2024-07-03 09:30:08'),
(5, '2024-07-03 09:31:21', 1, 1, 1, 'B', 45000, '2024-07-03 09:31:21'),
(6, '2024-07-05 12:54:54', 0, 1, 2, 'P', 50000, '2024-07-05 12:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `resourses`
--

CREATE TABLE `resourses` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `insert_time` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `purpose` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `resourses`
--

INSERT INTO `resourses` (`id`, `status`, `insert_time`, `last_update`, `update_by`, `location`, `purpose`) VALUES
(1, 'A', '2024-05-03 14:38:06', '0000-00-00 00:00:00', 1, 'pan/1714727286_58955893f84bf322f27f.pdf', 'pan'),
(2, 'A', '2024-05-03 14:38:06', '0000-00-00 00:00:00', 1, 'aadhar/1714727286_d76c3ec3f2af38343ff1.pdf', 'aadhar_card'),
(3, 'A', '2024-06-14 13:45:48', '0000-00-00 00:00:00', 18, 'pan/1718352948_992164461a62e0758b5d.pdf', 'pan'),
(4, 'A', '2024-06-14 13:45:48', '0000-00-00 00:00:00', 18, 'aadhar/1718352948_c375c82a4921d568cea2.pdf', 'aadhar_card'),
(5, 'A', '2024-06-14 15:13:49', '0000-00-00 00:00:00', 2, 'pan/1718358229_08457089c4883e8936f4.pdf', 'pan'),
(6, 'A', '2024-06-14 15:13:49', '0000-00-00 00:00:00', 2, 'aadhar/1718358229_8f0c0069e9d12292cacb.pdf', 'aadhar_card'),
(7, 'A', '2024-06-14 15:15:39', '0000-00-00 00:00:00', 2, 'pan/1718358339_e8846ef1266242952b6d.pdf', 'pan'),
(8, 'A', '2024-06-14 15:15:39', '0000-00-00 00:00:00', 2, 'aadhar/1718358339_538df763216749fe5e6e.pdf', 'aadhar_card'),
(9, 'A', '2024-06-15 13:34:37', '0000-00-00 00:00:00', 31, 'pan/1718438677_0804e7996481f7a5f7d7.pdf', 'pan'),
(10, 'A', '2024-06-15 13:34:37', '0000-00-00 00:00:00', 31, 'aadhar/1718438677_4a32b5d4862f08398322.pdf', 'aadhar_card'),
(11, 'A', '2024-06-15 15:28:52', '0000-00-00 00:00:00', 31, 'pan/1718445532_ab68cb67bedcd9ac4fcd.pdf', 'pan'),
(12, 'A', '2024-06-15 15:28:52', '0000-00-00 00:00:00', 31, 'aadhar/1718445532_f4da2ab0aa318eb7ca9e.pdf', 'aadhar_card'),
(13, 'A', '2024-06-15 17:24:04', '0000-00-00 00:00:00', 31, 'pan/1718452444_3d74bf45562c33e79789.pdf', 'pan'),
(14, 'A', '2024-06-15 17:24:04', '0000-00-00 00:00:00', 31, 'aadhar/1718452444_4a12d7e2d0575440a350.pdf', 'aadhar_card'),
(15, 'A', '2024-06-15 17:28:19', '0000-00-00 00:00:00', 31, 'pan/1718452699_68d41f1c795cef3d18ba.pdf', 'pan'),
(16, 'A', '2024-06-15 17:28:19', '0000-00-00 00:00:00', 31, 'aadhar/1718452699_3ee98aa8ae7d9c1fe2cb.pdf', 'aadhar_card'),
(17, 'A', '2024-06-15 18:19:43', '0000-00-00 00:00:00', 31, 'pan/1718455783_5f239e33fee1704f28d0.pdf', 'pan'),
(18, 'A', '2024-06-15 18:19:43', '0000-00-00 00:00:00', 31, 'aadhar/1718455783_fc5aa0844444a6a9458f.pdf', 'aadhar_card'),
(19, 'A', '2024-06-15 18:23:08', '0000-00-00 00:00:00', 31, 'pan/1718455988_f85b676549def72aec65.pdf', 'pan'),
(20, 'A', '2024-06-15 18:23:08', '0000-00-00 00:00:00', 31, 'aadhar/1718455988_d9aa14299441f3424722.pdf', 'aadhar_card'),
(21, 'A', '2024-06-26 15:25:07', '0000-00-00 00:00:00', 33, 'pan/1719395707_a6d949d17b9c3f911e40.pdf', 'pan'),
(22, 'A', '2024-06-26 15:25:07', '0000-00-00 00:00:00', 33, 'aadhar/1719395707_c4fb42fa5b02deefedb7.pdf', 'aadhar_card'),
(23, 'A', '2024-06-26 16:29:18', '0000-00-00 00:00:00', 40, 'pan/1719399558_1618c1c1d61474ca7fb2.pdf', 'pan'),
(24, 'A', '2024-06-26 16:29:18', '0000-00-00 00:00:00', 40, 'aadhar/1719399558_9f801959923f12caacc1.pdf', 'aadhar_card'),
(25, 'A', '2024-06-26 16:32:40', '0000-00-00 00:00:00', 41, 'pan/1719399760_d4262a1aecea208419f6.pdf', 'pan'),
(26, 'A', '2024-06-26 16:32:40', '0000-00-00 00:00:00', 41, 'aadhar/1719399760_b94654a20dae895a1a65.pdf', 'aadhar_card'),
(27, 'A', '2024-06-26 16:35:25', '0000-00-00 00:00:00', 42, 'pan/1719399925_d27f9b2952d1fc124591.pdf', 'pan'),
(28, 'A', '2024-06-26 16:35:25', '0000-00-00 00:00:00', 42, 'aadhar/1719399925_1feab6d45caecf68fac1.pdf', 'aadhar_card'),
(29, 'A', '2024-06-26 16:40:26', '0000-00-00 00:00:00', 43, 'pan/1719400226_2240d67cb757e541ceaf.pdf', 'pan'),
(30, 'A', '2024-06-26 16:40:26', '0000-00-00 00:00:00', 43, 'aadhar/1719400226_09b09f920bad921fc6aa.pdf', 'aadhar_card'),
(31, 'A', '2024-06-27 15:39:21', '0000-00-00 00:00:00', 31, 'pan/1719482961_bc476b5e3931c46d3ee2.pdf', 'pan'),
(32, 'A', '2024-06-27 15:39:21', '0000-00-00 00:00:00', 31, 'aadhar/1719482961_4e0724ac21f917238283.pdf', 'aadhar_card'),
(33, 'A', '2024-06-27 15:47:04', '0000-00-00 00:00:00', 31, 'pan/1719483424_9f06e146676f9f839e38.pdf', 'pan'),
(34, 'A', '2024-06-27 15:47:04', '0000-00-00 00:00:00', 31, 'aadhar/1719483424_1626b4287585afde9e8c.pdf', 'aadhar_card');

-- --------------------------------------------------------

--
-- Table structure for table `tab`
--

CREATE TABLE `tab` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A',
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `tab_group` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `page_url` varchar(300) NOT NULL,
  `other_action` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tab`
--

INSERT INTO `tab` (`id`, `status`, `create_at`, `tab_group`, `name`, `page_url`, `other_action`) VALUES
(1, 'A', '2024-03-19 15:44:37', 1, 'users', 'user', 'Add|1,edit|2,view|3'),
(2, 'A', '2024-03-19 15:46:04', 1, 'Web Pages', 'web_pages', 'Add|1,Edit|2,Change Status|3'),
(3, 'A', '2024-03-22 10:15:55', 3, 'Property', 'property', 'Add|1,edit|2,view|3'),
(4, 'A', '2024-03-22 12:36:43', 3, 'Project', 'project', 'Add|1,Edit|2,Change Status|3'),
(5, 'A', '2024-03-24 22:11:59', 4, 'Contact', 'contact', 'Add|1,edit|2,view|3'),
(6, 'A', '2024-03-24 22:13:47', 4, 'Slider', 'slider', 'Add|1,Edit|2,Change Status|3'),
(7, 'A', '2024-03-26 11:27:04', 4, 'Features', 'features', 'Add|1,edit|2,view|3'),
(8, 'A', '2024-03-26 14:07:59', 4, 'Navbar', 'navbar', 'Add|1,Edit|2,Change Status|3'),
(9, 'A', '2024-03-26 16:18:56', 4, 'Near Location', 'near_location', 'Add|1,edit|2,view|3'),
(10, 'A', '2024-03-26 17:35:34', 4, 'Categories', 'category', 'Add|1,Edit|2,Change Status|3'),
(11, 'A', '2024-03-27 10:31:11', 4, 'Facilities', 'facility', 'Add|1,edit|2,view|3'),
(12, 'A', '2024-03-27 10:58:14', 1, 'Web Settings', 'web_setting', 'Add|1,Edit|2,Change Status|3'),
(13, 'A', '2024-04-02 03:46:08', 4, 'Gallery', 'gallery', 'Add|1,Edit|2,Change Status|3');

-- --------------------------------------------------------

--
-- Table structure for table `tab_group`
--

CREATE TABLE `tab_group` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `last_update` datetime NOT NULL DEFAULT current_timestamp(),
  `update_by` int(11) NOT NULL,
  `themify` varchar(15) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tab_group`
--

INSERT INTO `tab_group` (`id`, `status`, `create_time`, `last_update`, `update_by`, `themify`, `name`) VALUES
(1, 'A', '2024-03-19 15:39:11', '2024-03-19 15:39:11', 1, 'ti-settings', 'Settings'),
(2, 'A', '2024-03-19 16:42:07', '2024-03-19 16:42:07', 1, 'ti-user', 'Users'),
(3, 'A', '2024-03-22 10:14:03', '2024-03-22 10:14:03', 1, 'ti-home', 'Land'),
(4, 'A', '2024-03-24 22:10:48', '2024-03-24 22:10:48', 1, 'ti-tablet', 'Gadget');

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE `user_access` (
  `user_id` int(11) NOT NULL,
  `tab_id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `other_action` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`user_id`, `tab_id`, `status`, `other_action`) VALUES
(1, 1, 'A', '1 2 3'),
(1, 2, 'A', '1 2 3'),
(1, 3, 'A', '1 2 3'),
(1, 4, 'A', '1 2 3'),
(1, 5, 'A', '1 2 3'),
(1, 6, 'A', '1 2 3'),
(1, 7, 'A', '1 2 3'),
(1, 8, 'A', '1 2 3'),
(1, 9, 'A', '1 2 3'),
(1, 11, 'A', '1 2 3'),
(1, 13, 'A', '1 2 3');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_key` char(2) NOT NULL,
  `status` char(1) NOT NULL,
  `last_update` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_key`, `status`, `last_update`, `update_by`, `name`) VALUES
('SA', '', '2023-11-22 09:54:20', 1, 'Super Admin'),
('AD', 'A', '2023-11-22 09:54:51', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_transection_history`
--

CREATE TABLE `wallet_transection_history` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `insert_at` datetime NOT NULL,
  `insert_by` int(11) NOT NULL,
  `type` enum('credit','debit') NOT NULL,
  `amount` double(7,2) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `message` varchar(250) NOT NULL,
  `wallet_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallet_transection_history`
--

INSERT INTO `wallet_transection_history` (`id`, `status`, `insert_at`, `insert_by`, `type`, `amount`, `booking_id`, `message`, `wallet_id`) VALUES
(1, 'A', '2024-07-03 09:43:52', 1, 'credit', 54000.00, 1, '9% comm for sale 0001 Block A from Reeva Enclave', '20'),
(2, 'A', '2024-07-03 09:43:52', 1, 'credit', 12000.00, 1, '2% comm for sale 0001 Block A from Reeva Enclave', '19'),
(3, 'A', '2024-07-03 09:43:52', 1, 'credit', 6000.00, 1, '1% comm for sale 0001 Block A from Reeva Enclave', '12'),
(4, 'A', '2024-07-03 09:43:52', 1, 'credit', 3000.00, 1, '0.5% comm for sale 0001 Block A from Reeva Enclave', '11'),
(5, 'A', '2024-07-03 09:43:52', 1, 'credit', 3000.00, 1, '0.5% comm for sale 0001 Block A from Reeva Enclave', '9'),
(6, 'A', '2024-07-03 09:43:52', 1, 'credit', 2400.00, 1, '0.4% comm for sale 0001 Block A from Reeva Enclave', '8'),
(7, 'A', '2024-07-03 09:43:52', 1, 'credit', 2400.00, 1, '0.4% comm for sale 0001 Block A from Reeva Enclave', '2'),
(8, 'A', '2024-07-03 09:43:52', 1, 'credit', 7200.00, 1, '1.2% comm for sale 0001 Block A from Reeva Enclave', '1');

-- --------------------------------------------------------

--
-- Table structure for table `web_pages`
--

CREATE TABLE `web_pages` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `last_update` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `page_heading` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `page_url` varchar(100) NOT NULL,
  `banner_img` int(11) NOT NULL,
  `form` char(1) NOT NULL,
  `main_content` text NOT NULL,
  `header_text` text NOT NULL,
  `footer_text` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `web_pages`
--

INSERT INTO `web_pages` (`id`, `status`, `last_update`, `update_by`, `page_heading`, `title`, `description`, `keyword`, `page_url`, `banner_img`, `form`, `main_content`, `header_text`, `footer_text`) VALUES
(1, 'A', '2024-02-13 09:17:31', 1, 'About Us', 'About Us', 'About Us', 'About Us', 'about_us', 0, 'N', 'About Us', 'About Us', 'About Us'),
(2, 'A', '2024-04-04 06:24:28', 1, 'Contact Us', 'Contact Us', 'Contact Us', 'Contact Us', 'contact', 0, 'N', 'Contact Us', 'Contact Us', 'Contact Us'),
(3, 'A', '2023-11-23 10:14:23', 1, 'Search', 'Search', 'Search', 'Search', 'search', 0, 'N', 'Search', 'Search', 'Search'),
(4, 'A', '2024-04-04 06:27:13', 1, 'Facility', 'Facility', 'Facility', 'Facility', 'facility', 0, 'N', 'Our Team', 'Our Team', 'Our Team'),
(5, 'A', '2024-04-09 05:08:06', 1, 'Reeva Developer Vision', 'Reeva Developer Vision', 'Reeva Developer Vision', 'Reeva Developer Vision', 'vision', 1, 'N', 'Foundation Work', 'Foundation Work', 'Foundation Work'),
(6, 'A', '2024-04-04 08:16:52', 1, 'About Raimah Empowerment', 'About Raimah Empowerment', 'About Raimah Empowerment', 'About Raimah Empowerment', 'raimah_foundation', 1, 'N', 'About Raimah Empowerment', 'About Raimah Empowerment', 'About Raimah Empowerment'),
(7, 'A', '2024-05-21 15:23:06', 1, 'Terms & Conditions', 'RD | Terms & Conditions', 'Terms & Conditions', 'Terms & Conditions, Policies', 'terms', 1, 'N', '<h2 class=\"text-center\"><u><font face=\"georgia\" size=\"5\">TERM\'S &amp; CONDITION\'S FOR ASSOCIATES</font></u></h2>\r\n<ol>\r\n	<li><font size=\"4\">Commission will be released in 3 equals installment within 3 months in EMI Mode and 1 time in Cash Mode (if total payment of plot received Within 30 days).</font></li>\r\n	<li><font size=\"4\">Payouts will be released on 10<sup>th</sup> of Every Month.</font></li>\r\n	<li><font size=\"4\">One Direct Sale is Compulsory to get the Level Income.</font></li>\r\n</ol>\r\n<u><h2 class=\"text-center\"><font face=\"georgia\" size=\"5\">RULES &amp; REGULATIONS</font></h2></u>\r\n<ol>\r\n	<li><font size=\"4\">Token money 2100/- for particular plot (Valid for 7 days only).</font></li>\r\n	<li><font size=\"4\">Part Payment is minimum 10% of Total Plot/Shop Value and valid for 15 days from date of token.</font></li>\r\n	<li><font size=\"4\">PLC Charges may apply as per the rule.</font></li>\r\n	<li><font size=\"4\">Booking Amount means, 30% of Full Amount of plot.</font></li>\r\n	<li><font size=\"4\">Registry after 40% of full amount and Registry will be handover after recieving PDC Cheques for balance amount.</font></li>\r\n	<li><font size=\"4\">Agreement charges will be extra as per Govt. norms.</font></li>\r\n	<li><font size=\"4\">No Registry charges (fees) will be charged, if customer paying total payment of plot Within 30 days time period.</font></li>\r\n	<li><font size=\"4\">Registry charges (fees) and all other expenses will be paid by Customer who are on EMI mode.</font></li>\r\n	<li><font size=\"4\">Require document for Registry-</font></li> <ol class=\"ms-5\"><li><font size=\"4\">Properly fulfilled Registry Form (provide by Company).</font></li><li><font size=\"4\">Aadhar Card.</font></li></ol>\r\n	<li><font size=\"4\">Mutation charges Rs.3000/- will extra which paid by all consumer/customer, either one shot payee OR on EMI payee.</font></li>\r\n<br>\r\n	<h2><u><b><font size=\"5\">SPECIAL NOTE</font></b></u>:</h2>\r\n	<li><font size=\"4\">In case, any Associate, Manager, Sr. Manager, A.G.M., G.M., S.G.M. join any other company alongwith I &amp; S Buildtech Pvt. Ltd. then he will be terminated from the Company and his/her ID will be blocked and no dues will be released.</font></li>\r\n	<li><font size=\"4\">In case, any Associate, Manager, Sr. Manager, A.G.M., G.M., S.G.M. leave the company &amp; after some time re-join then he will starts with the company as a fresher and not with his/her existing post.</font></li>\r\n</ol>\r\n<u><h2 class=\"text-center\"><font face=\"georgia\" size=\"5\">OFFER\'S FACILITY</font></h2></u>\r\n<ol>\r\n	<li><font size=\"4\">Free Site visit with pick &amp; drop facility.</font></li>\r\n	<li><font size=\"4\">Interest Free EMI Mode- 12, 24 &amp; 30 Month i.e. one year, two year &amp; Two and half year.</font></li>\r\n	<li><font size=\"4\">Payment Mode- Cash, Cheque &amp; DD.</font></li>\r\n	<li><font size=\"4\">Most of the Plot sizes are available as per the customer\'s requirement.</font></li>\r\n</ol>', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `web_settings`
--

CREATE TABLE `web_settings` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `last_update` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `web_settings`
--

INSERT INTO `web_settings` (`id`, `status`, `last_update`, `update_by`, `name`, `value`) VALUES
(1, 'A', '2024-04-01 05:59:08', 1, 'contact', '8800885758,8750885758');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent_wallet`
--
ALTER TABLE `agent_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allowed_ip`
--
ALTER TABLE `allowed_ip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_data`
--
ALTER TABLE `api_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frm_contact`
--
ALTER TABLE `frm_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_slider`
--
ALTER TABLE `home_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_client`
--
ALTER TABLE `mlm_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_client_info`
--
ALTER TABLE `mlm_client_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_login`
--
ALTER TABLE `mlm_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_login_history`
--
ALTER TABLE `mlm_login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_member_id`
--
ALTER TABLE `mlm_member_id`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `member_login_id` (`member_login_id`);

--
-- Indexes for table `mlm_member_type`
--
ALTER TABLE `mlm_member_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_property_booking`
--
ALTER TABLE `mlm_property_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_property_deal`
--
ALTER TABLE `mlm_property_deal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_property_status_log`
--
ALTER TABLE `mlm_property_status_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_property_visit`
--
ALTER TABLE `mlm_property_visit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_tab`
--
ALTER TABLE `mlm_tab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_tab_group`
--
ALTER TABLE `mlm_tab_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_user_access`
--
ALTER TABLE `mlm_user_access`
  ADD UNIQUE KEY `user_type_id` (`user_type_id`,`tab_id`);

--
-- Indexes for table `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `near_location`
--
ALTER TABLE `near_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nominee`
--
ALTER TABLE `nominee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prop_amount_recieved`
--
ALTER TABLE `prop_amount_recieved`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resourses`
--
ALTER TABLE `resourses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab`
--
ALTER TABLE `tab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_group`
--
ALTER TABLE `tab_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD UNIQUE KEY `user_id` (`user_id`,`tab_id`);

--
-- Indexes for table `wallet_transection_history`
--
ALTER TABLE `wallet_transection_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_pages`
--
ALTER TABLE `web_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_settings`
--
ALTER TABLE `web_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent_wallet`
--
ALTER TABLE `agent_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `allowed_ip`
--
ALTER TABLE `allowed_ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `api_data`
--
ALTER TABLE `api_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `frm_contact`
--
ALTER TABLE `frm_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `home_slider`
--
ALTER TABLE `home_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `mlm_client`
--
ALTER TABLE `mlm_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mlm_client_info`
--
ALTER TABLE `mlm_client_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mlm_login`
--
ALTER TABLE `mlm_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `mlm_login_history`
--
ALTER TABLE `mlm_login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- AUTO_INCREMENT for table `mlm_member_id`
--
ALTER TABLE `mlm_member_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1018;

--
-- AUTO_INCREMENT for table `mlm_member_type`
--
ALTER TABLE `mlm_member_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mlm_property_booking`
--
ALTER TABLE `mlm_property_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mlm_property_deal`
--
ALTER TABLE `mlm_property_deal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mlm_property_status_log`
--
ALTER TABLE `mlm_property_status_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mlm_property_visit`
--
ALTER TABLE `mlm_property_visit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mlm_tab`
--
ALTER TABLE `mlm_tab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mlm_tab_group`
--
ALTER TABLE `mlm_tab_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `navbar`
--
ALTER TABLE `navbar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `near_location`
--
ALTER TABLE `near_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `nominee`
--
ALTER TABLE `nominee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=421;

--
-- AUTO_INCREMENT for table `prop_amount_recieved`
--
ALTER TABLE `prop_amount_recieved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `resourses`
--
ALTER TABLE `resourses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tab`
--
ALTER TABLE `tab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tab_group`
--
ALTER TABLE `tab_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wallet_transection_history`
--
ALTER TABLE `wallet_transection_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `web_pages`
--
ALTER TABLE `web_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `web_settings`
--
ALTER TABLE `web_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
