-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 18, 2021 at 04:11 AM
-- Server version: 5.7.13-log
-- PHP Version: 5.6.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_longdo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prefix`
--

CREATE TABLE `tbl_prefix` (
  `prf_id` int(11) NOT NULL,
  `prf_fullth` varchar(100) DEFAULT NULL,
  `prf_initialsth` varchar(50) DEFAULT NULL,
  `prf_fulleng` varchar(100) DEFAULT NULL,
  `prf_initialseng` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_prefix`
--

INSERT INTO `tbl_prefix` (`prf_id`, `prf_fullth`, `prf_initialsth`, `prf_fulleng`, `prf_initialseng`) VALUES
(1, 'นาย', 'นาย', 'Mr.', 'Mr.'),
(2, 'นาง', 'นาง', 'Mrs.', 'Mrs.'),
(3, 'นางสาว', 'นางสาว', 'Miss.', 'Miss.');

-- --------------------------------------------------------

--
-- Table structure for table `us_menu`
--

CREATE TABLE `us_menu` (
  `menu_id` varchar(10) NOT NULL,
  `menu_parent` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `menu_name` varchar(128) NOT NULL DEFAULT '',
  `menu_link` varchar(128) NOT NULL DEFAULT '',
  `menu_icon` varchar(32) NOT NULL,
  `menu_order` smallint(5) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=tis620 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `us_menu`
--

INSERT INTO `us_menu` (`menu_id`, `menu_parent`, `menu_name`, `menu_link`, `menu_icon`, `menu_order`) VALUES
('1000', 0, 'ควบคุมผู้ใช้', '', 'fa-cog', 13),
('1100', 1000, 'กำหนดสิทธิ์การใช้งาน', 'abilities.php', '', 4),
('1300', 1000, 'จัดกลุ่มผู้ใช้งาน', 'group.php', '', 2),
('1200', 1000, 'เพิ่มผู้ใช้งาน', 'ins_user.php', '', 3),
('2000', 0, 'หน้าหลัก', '', 'fa-home', 1),
('2100', 2000, 'หน้าแรก', 'main.php', '', 1),
('3300', 3000, 'กำหนดและแสดงระดับการซูม', 'zoom.php', '', 3),
('3200', 3000, 'การกำหนดหรือแสดงพิกัด', 'location.php', '', 2),
('3100', 3000, 'การสร้างแผนที่พื้นฐาน', 'CreateBasicMap.php', '', 1),
('3000', 0, 'แผนที่', '', 'fa-sitemap', 2),
('3500', 3000, 'การแสดง Animation', 'Animation.php', '', 5),
('3400', 3000, 'การสร้างหมุด (Marker)', 'Marker.php', '', 4),
('3600', 3000, 'การสร้างรูปเรขาคณิตบนแผนที่', 'Geometry.php', '', 6),
('3700', 3000, 'เขตการปกครอง', 'government.php', '', 7);

-- --------------------------------------------------------

--
-- Table structure for table `us_menu_group`
--

CREATE TABLE `us_menu_group` (
  `group_id` smallint(5) UNSIGNED NOT NULL,
  `menu_id` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `us_menu_group`
--

INSERT INTO `us_menu_group` (`group_id`, `menu_id`) VALUES
(1, '1000'),
(1, '1100'),
(1, '1200'),
(1, '1300'),
(1, '2000'),
(1, '2100'),
(1, '3000'),
(1, '3100'),
(1, '3200'),
(1, '3300'),
(1, '3400'),
(1, '3500'),
(1, '3600'),
(1, '3700');

-- --------------------------------------------------------

--
-- Table structure for table `us_user`
--

CREATE TABLE `us_user` (
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `group_id` smallint(5) UNSIGNED NOT NULL,
  `prf_id` int(11) DEFAULT NULL,
  `nameth` varchar(50) NOT NULL,
  `nameng` varchar(100) DEFAULT NULL,
  `major` varchar(100) DEFAULT NULL,
  `faculty` varchar(100) DEFAULT NULL,
  `user_name` varchar(64) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `time_create` datetime NOT NULL,
  `time_update` datetime NOT NULL,
  `user_status` int(1) UNSIGNED NOT NULL,
  `user_image` varchar(20) DEFAULT 'img_avatar.png'
) ENGINE=MyISAM DEFAULT CHARSET=tis620 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `us_user`
--

INSERT INTO `us_user` (`user_id`, `group_id`, `prf_id`, `nameth`, `nameng`, `major`, `faculty`, `user_name`, `user_password`, `time_create`, `time_update`, `user_status`, `user_image`) VALUES
(1, 1, 1, 'ศรายุทธ  เนียนกระโทก', NULL, NULL, NULL, 'sarayut', '81dc9bdb52d04dc20036dbd8313ed055', '2021-02-25 08:36:56', '2021-03-18 09:25:46', 0, 'Aj_Sarayuth.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `us_user_group`
--

CREATE TABLE `us_user_group` (
  `group_id` smallint(5) UNSIGNED NOT NULL,
  `group_name` varchar(64) NOT NULL,
  `group_detail` text,
  `group_type` tinyint(1) NOT NULL,
  `group_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `us_user_group`
--

INSERT INTO `us_user_group` (`group_id`, `group_name`, `group_detail`, `group_type`, `group_time`) VALUES
(1, 'ผู้ดูแลระบบ', 'ผู้จัดการระบบสารสนเทศสำหรับการบริการ', 1, '2021-02-25 08:37:10'),
(2, 'ผู้จัดเก็บข้อมูล', '-', 0, '2021-02-25 08:37:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_prefix`
--
ALTER TABLE `tbl_prefix`
  ADD PRIMARY KEY (`prf_id`) USING BTREE;

--
-- Indexes for table `us_menu`
--
ALTER TABLE `us_menu`
  ADD PRIMARY KEY (`menu_id`,`menu_parent`) USING BTREE,
  ADD KEY `menu_parent` (`menu_parent`) USING BTREE;

--
-- Indexes for table `us_menu_group`
--
ALTER TABLE `us_menu_group`
  ADD PRIMARY KEY (`group_id`,`menu_id`) USING BTREE;

--
-- Indexes for table `us_user`
--
ALTER TABLE `us_user`
  ADD PRIMARY KEY (`user_id`,`group_id`) USING BTREE,
  ADD KEY `group_id` (`group_id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE,
  ADD KEY `user_id_2` (`user_id`) USING BTREE,
  ADD KEY `user_id_3` (`user_id`) USING BTREE,
  ADD KEY `user_id_4` (`user_id`) USING BTREE,
  ADD KEY `user_id_5` (`user_id`) USING BTREE;

--
-- Indexes for table `us_user_group`
--
ALTER TABLE `us_user_group`
  ADD PRIMARY KEY (`group_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_prefix`
--
ALTER TABLE `tbl_prefix`
  MODIFY `prf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `us_user`
--
ALTER TABLE `us_user`
  MODIFY `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `us_user_group`
--
ALTER TABLE `us_user_group`
  MODIFY `group_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
