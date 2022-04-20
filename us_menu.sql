/*
Navicat MySQL Data Transfer

Source Server         : Data_PC
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : db_longdo

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2021-03-10 21:28:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for us_menu
-- ----------------------------
DROP TABLE IF EXISTS `us_menu`;
CREATE TABLE `us_menu` (
  `menu_id` varchar(10) NOT NULL,
  `menu_parent` smallint(5) unsigned NOT NULL DEFAULT '0',
  `menu_name` varchar(128) NOT NULL DEFAULT '',
  `menu_link` varchar(128) NOT NULL DEFAULT '',
  `menu_icon` varchar(32) NOT NULL,
  `menu_order` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`menu_id`,`menu_parent`) USING BTREE,
  KEY `menu_parent` (`menu_parent`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=tis620 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of us_menu
-- ----------------------------
INSERT INTO `us_menu` VALUES ('1000', '0', 'ควบคุมผู้ใช้', '', 'fa-cog', '13');
INSERT INTO `us_menu` VALUES ('1100', '1000', 'กำหนดสิทธิ์การใช้งาน', 'abilities.php', '', '4');
INSERT INTO `us_menu` VALUES ('1300', '1000', 'จัดกลุ่มผู้ใช้งาน', 'group.php', '', '2');
INSERT INTO `us_menu` VALUES ('1200', '1000', 'เพิ่มผู้ใช้งาน', 'ins_user.php', '', '3');
INSERT INTO `us_menu` VALUES ('2000', '0', 'หน้าหลัก', '', 'fa-home', '1');
INSERT INTO `us_menu` VALUES ('2100', '2000', 'หน้าแรก', 'main.php', '', '1');
INSERT INTO `us_menu` VALUES ('3500', '3000', 'การแสดง Animation', 'Animation.php', '', '5');
INSERT INTO `us_menu` VALUES ('3400', '3000', 'การสร้างหมุด (Marker)', 'Marker.php', '', '4');
INSERT INTO `us_menu` VALUES ('3300', '3000', 'กำหนดและแสดงระดับการซูม', 'zoom.php', '', '3');
INSERT INTO `us_menu` VALUES ('3200', '3000', 'การกำหนดหรือแสดงพิกัด', 'location.php', '', '2');
INSERT INTO `us_menu` VALUES ('3100', '3000', 'การสร้างแผนที่พื้นฐาน', 'CreateBasicMap.php', '', '1');
INSERT INTO `us_menu` VALUES ('3000', '0', 'แผนที่', '', 'fa-sitemap', '2');

-- ----------------------------
-- Table structure for us_menu_group
-- ----------------------------
DROP TABLE IF EXISTS `us_menu_group`;
CREATE TABLE `us_menu_group` (
  `group_id` smallint(5) unsigned NOT NULL,
  `menu_id` varchar(10) NOT NULL,
  PRIMARY KEY (`group_id`,`menu_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=tis620 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of us_menu_group
-- ----------------------------
INSERT INTO `us_menu_group` VALUES ('1', '1000');
INSERT INTO `us_menu_group` VALUES ('1', '1100');
INSERT INTO `us_menu_group` VALUES ('1', '1200');
INSERT INTO `us_menu_group` VALUES ('1', '1300');
INSERT INTO `us_menu_group` VALUES ('1', '2000');
INSERT INTO `us_menu_group` VALUES ('1', '2100');
INSERT INTO `us_menu_group` VALUES ('1', '3000');
INSERT INTO `us_menu_group` VALUES ('1', '3100');
INSERT INTO `us_menu_group` VALUES ('1', '3200');
INSERT INTO `us_menu_group` VALUES ('1', '3300');
INSERT INTO `us_menu_group` VALUES ('1', '3400');
INSERT INTO `us_menu_group` VALUES ('1', '3500');
