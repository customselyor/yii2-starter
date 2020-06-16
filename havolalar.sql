/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 80018
 Source Host           : 127.0.0.1:3306
 Source Schema         : havolalar

 Target Server Type    : MySQL
 Target Server Version : 80018
 File Encoding         : 65001

 Date: 22/05/2020 08:55:04
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `preview` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `category_id` int(11) NULL DEFAULT NULL,
  `author_id` int(11) NULL DEFAULT NULL,
  `updater_id` int(11) NULL DEFAULT NULL,
  `published_at` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_article_author`(`author_id`) USING BTREE,
  INDEX `fk_article_updater`(`updater_id`) USING BTREE,
  INDEX `fk_article_category`(`category_id`) USING BTREE,
  CONSTRAINT `fk_article_author` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_article_category` FOREIGN KEY (`category_id`) REFERENCES `article_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_article_updater` FOREIGN KEY (`updater_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES (1, 'bir', 'dwadwad', '', '', '<p>dwa</p>', '<p>daw</p>', 1, 1, 1, 1, '17-03-2020', 1581576042, 1581576335);
INSERT INTO `article` VALUES (2, 'ikki', 'fwefwef-wefewf', 'wefwef', 'wefwef', '<p>wefwef</p>', '<p>fwefwe</p>', 1, 1, 1, 1, '21-02-2020', 1581576308, 1581576473);
INSERT INTO `article` VALUES (3, 'uch', 'uch', 'dasd', 'asd', '<p>asd</p>', '<p>sd</p>', 0, 1, 1, 1, '28-02-2020', 1581576490, 1581576490);
INSERT INTO `article` VALUES (4, 'uz titletitletitle', 'uz-titletitletitle', NULL, NULL, 'previewpreviewpreviewpreview', 'bodybodybodybodybody', 0, 1, NULL, NULL, '08-04-2020', 1586288824, 1586288824);
INSERT INTO `article` VALUES (5, 'uz titletitletitle', 'uz-titletitletitle-2', NULL, NULL, 'previewpreviewpreviewpreview', 'bodybodybodybodybody', 0, 1, NULL, NULL, '08-04-2020', 1586291183, 1586291183);
INSERT INTO `article` VALUES (6, 'uz titletitletitle', 'uz-titletitletitle-3', NULL, NULL, 'previewpreviewpreviewpreview', 'bodybodybodybodybody', 0, 1, NULL, NULL, '08-04-2020', 1586291188, 1586291188);
INSERT INTO `article` VALUES (7, 'uz titletitletitle', 'uz-titletitletitle-4', NULL, NULL, 'previewpreviewpreviewpreview', 'bodybodybodybodybody', 0, 1, NULL, NULL, '08-04-2020', 1586292424, 1586292424);
INSERT INTO `article` VALUES (8, 'uz titletitletitle', 'uz-titletitletitle-5', NULL, NULL, 'previewpreviewpreviewpreview', 'bodybodybodybodybody', 0, 1, NULL, NULL, '08-04-2020', 1586292426, 1586292426);
INSERT INTO `article` VALUES (9, 'uz titletitletitle', 'uz-titletitletitle-6', NULL, NULL, 'previewpreviewpreviewpreview', 'bodybodybodybodybody', 0, 1, NULL, NULL, '08-04-2020', 1586293299, 1586293299);
INSERT INTO `article` VALUES (10, 'uz titletitletitle', 'uz-titletitletitle-7', NULL, NULL, 'previewpreviewpreviewpreview', 'bodybodybodybodybody', 0, 1, NULL, NULL, '08-04-2020', 1586293315, 1586293315);
INSERT INTO `article` VALUES (11, 'uz titletitletitle', 'uz-titletitletitle-8', NULL, NULL, 'previewpreviewpreviewpreview', 'bodybodybodybodybody', 0, 1, NULL, NULL, '08-04-2020', 1586293317, 1586293317);
INSERT INTO `article` VALUES (12, 'uz titletitletitle', 'uz-titletitletitle-9', NULL, NULL, 'previewpreviewpreviewpreview', 'bodybodybodybodybody', 0, 1, NULL, NULL, '08-04-2020', 1586293318, 1586293318);
INSERT INTO `article` VALUES (13, 'uz titletitletitle', 'uz-titletitletitle-10', NULL, NULL, 'previewpreviewpreviewpreview', 'bodybodybodybodybody', 0, 1, NULL, NULL, '08-04-2020', 1586293319, 1586293319);
INSERT INTO `article` VALUES (14, 'uz titletitletitle', 'uz-titletitletitle-11', NULL, NULL, 'previewpreviewpreviewpreview', 'bodybodybodybodybody', 0, 1, NULL, NULL, '08-04-2020', 1586293319, 1586293319);
INSERT INTO `article` VALUES (15, 'uz titletitletitle', 'uz-titletitletitle-12', NULL, NULL, 'previewpreviewpreviewpreview', 'bodybodybodybodybody', 0, 1, NULL, NULL, '08-04-2020', 1586293320, 1586293320);
INSERT INTO `article` VALUES (16, 'uz titletitletitle', 'uz-titletitletitle-13', NULL, NULL, 'previewpreviewpreviewpreview', 'bodybodybodybodybody', 0, 1, NULL, NULL, '08-04-2020', 1586293321, 1586293321);
INSERT INTO `article` VALUES (17, 'asdasdasduz titletitletitle', 'asdasdasduz-titletitletitle', NULL, NULL, 'previewpreviewpreviewpreview', 'bodybodybodybodybody', 0, 1, NULL, NULL, '08-04-2020', 1586293328, 1586293328);

-- ----------------------------
-- Table structure for article_category
-- ----------------------------
DROP TABLE IF EXISTS `article_category`;
CREATE TABLE `article_category`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `parent_id` int(11) NULL DEFAULT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_article_category_section`(`parent_id`) USING BTREE,
  CONSTRAINT `fk_article_category_section` FOREIGN KEY (`parent_id`) REFERENCES `article_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of article_category
-- ----------------------------
INSERT INTO `article_category` VALUES (1, 'wwww', 'wwww', 'dsa', NULL, 1, 1581576027, 1581576027);

-- ----------------------------
-- Table structure for article_tag
-- ----------------------------
DROP TABLE IF EXISTS `article_tag`;
CREATE TABLE `article_tag`  (
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`article_id`, `tag_id`) USING BTREE,
  INDEX `fk_tag-tag_id-tag-id`(`tag_id`) USING BTREE,
  CONSTRAINT `fk_tag-article_id-article-id` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_tag-tag_id-tag-id` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of article_tag
-- ----------------------------
INSERT INTO `article_tag` VALUES (1, 1);
INSERT INTO `article_tag` VALUES (2, 1);
INSERT INTO `article_tag` VALUES (2, 2);
INSERT INTO `article_tag` VALUES (2, 3);

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment`  (
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`item_name`, `user_id`) USING BTREE,
  INDEX `idx-auth_assignment-user_id`(`user_id`) USING BTREE,
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('administrator', '1', 1580208044);
INSERT INTO `auth_assignment` VALUES ('user', '2', 1586980930);
INSERT INTO `auth_assignment` VALUES ('user', '3', 1586981168);
INSERT INTO `auth_assignment` VALUES ('user', '4', 1586981222);
INSERT INTO `auth_assignment` VALUES ('user', '5', 1586981442);
INSERT INTO `auth_assignment` VALUES ('user', '6', 1586982096);

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `rule_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `data` blob NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE,
  INDEX `rule_name`(`rule_name`) USING BTREE,
  INDEX `idx-auth_item-type`(`type`) USING BTREE,
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('administrator', 1, 'Administrator', NULL, NULL, 1580208044, 1586986174);
INSERT INTO `auth_item` VALUES ('loginToBackend', 2, 'Login to backend', NULL, NULL, 1580208044, 1586986188);
INSERT INTO `auth_item` VALUES ('manager', 1, 'Manager', NULL, NULL, 1580208044, 1580208044);
INSERT INTO `auth_item` VALUES ('user', 1, 'User', NULL, NULL, 1580208044, 1580208044);

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child`  (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`, `child`) USING BTREE,
  INDEX `child`(`child`) USING BTREE,
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('manager', 'loginToBackend');
INSERT INTO `auth_item_child` VALUES ('administrator', 'manager');
INSERT INTO `auth_item_child` VALUES ('manager', 'user');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` blob NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------
INSERT INTO `auth_rule` VALUES ('ownModelRule', 0x4F3A32343A22636F6D6D6F6E5C726261635C4F776E4D6F64656C52756C65223A333A7B733A343A226E616D65223B733A31323A226F776E4D6F64656C52756C65223B733A393A22637265617465644174223B693A313538303230383034343B733A393A22757064617465644174223B693A313538363938363139363B7D, 1580208044, 1586986196);

-- ----------------------------
-- Table structure for contacts
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` smallint(6) NULL DEFAULT 0,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone2` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `phone3` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `fax` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `fax2` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `fax3` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `map` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `og_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `detail_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of contacts
-- ----------------------------
INSERT INTO `contacts` VALUES (1, 1, 'info@tdtuof.uz', '(71) 123-45-67', '', '', '', '', '', '', '', '', '', 1564128713, 1587689053);

-- ----------------------------
-- Table structure for contacts_translation
-- ----------------------------
DROP TABLE IF EXISTS `contacts_translation`;
CREATE TABLE `contacts_translation`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contacts_id` int(11) NULL DEFAULT NULL,
  `language` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `site_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `site_name2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `footer_menu` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `footer_info` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `contacts_info` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `home_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `footer_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `address_locality` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `street_address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `street_address2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `legal_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_contacts_translation_contacts`(`contacts_id`) USING BTREE,
  CONSTRAINT `fk_contacts_translation_contacts` FOREIGN KEY (`contacts_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of contacts_translation
-- ----------------------------
INSERT INTO `contacts_translation` VALUES (7, 1, 'uz', 'Toshkent Davlat Texnika Universiteti Olmaliq filiali', NULL, NULL, '<div class=\"col-md-3 col-sm-4 p-0\">\r\n<h6 class=\"text-uppercase\">UNIVERSITET</h6>\r\n\r\n<ul class=\"list-group\">\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Rektor tabrigi</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Universitet nizomi</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Me&#39;yoriy hujjatlar</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Umumiy ma&#39;lumot</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Onlayn murojaat</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Qayta aloqa</a></li>\r\n</ul>\r\n<!-- Ends: .footer-widget --></div>\r\n<!-- end /.col-md-4 -->\r\n\r\n<div class=\"col-md-3 col-sm-4 p-0\">\r\n<h6 class=\"text-uppercase\">UNIVERSITET</h6>\r\n\r\n<ul class=\"list-group\">\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Rektor tabrigi</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Universitet nizomi</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Me&#39;yoriy hujjatlar</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Umumiy ma&#39;lumot</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Onlayn murojaat</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Qayta aloqa</a></li>\r\n</ul>\r\n<!-- Ends: .footer-widget --></div>\r\n<!-- end /.col-md-4 -->\r\n\r\n<div class=\"col-md-3 col-sm-4 p-0\">\r\n<h6 class=\"text-uppercase\">UNIVERSITET</h6>\r\n\r\n<ul class=\"list-group\">\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Rektor tabrigi</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Universitet nizomi</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Me&#39;yoriy hujjatlar</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Umumiy ma&#39;lumot</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Onlayn murojaat</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Qayta aloqa</a></li>\r\n</ul>\r\n<!-- Ends: .footer-widget --></div>\r\n<!-- end /.col-md-4 -->\r\n\r\n<div class=\"col-md-3 col-sm-4 p-0\">\r\n<h6 class=\"text-uppercase\">UNIVERSITET</h6>\r\n\r\n<ul class=\"list-group\">\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Rektor tabrigi</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Universitet nizomi</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Me&#39;yoriy hujjatlar</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Umumiy ma&#39;lumot</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Onlayn murojaat</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Qayta aloqa</a></li>\r\n</ul>\r\n<!-- Ends: .footer-widget --></div>\r\n<!-- end /.col-md-4 -->', '', '', '<h6>Toshkent Davlat Texnika Universiteti Olmaliq filiali Manzil: Toshkent viloyati Olmaliq tumani, Tuman Ko&rsquo;cha, uy</h6>\r\n\r\n<p>Tel.: (71) 123-45-67</p>\r\n\r\n<p>Mail: info@tdtuof.uz</p>\r\n', NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL);
INSERT INTO `contacts_translation` VALUES (8, 1, 'ru', 'Toshkent Davlat Texnika Universiteti Olmaliq filiali', NULL, NULL, '<div class=\"col-md-3 col-sm-4 p-0\">\r\n<h6 class=\"text-uppercase\">UNIVERSITET</h6>\r\n\r\n<ul class=\"list-group\">\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Rektor tabrigi</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Universitet nizomi</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Me&#39;yoriy hujjatlar</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Umumiy ma&#39;lumot</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Onlayn murojaat</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Qayta aloqa</a></li>\r\n</ul>\r\n<!-- Ends: .footer-widget --></div>\r\n<!-- end /.col-md-4 -->\r\n\r\n<div class=\"col-md-3 col-sm-4 p-0\">\r\n<h6 class=\"text-uppercase\">UNIVERSITET</h6>\r\n\r\n<ul class=\"list-group\">\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Rektor tabrigi</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Universitet nizomi</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Me&#39;yoriy hujjatlar</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Umumiy ma&#39;lumot</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Onlayn murojaat</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Qayta aloqa</a></li>\r\n</ul>\r\n<!-- Ends: .footer-widget --></div>\r\n<!-- end /.col-md-4 -->\r\n\r\n<div class=\"col-md-3 col-sm-4 p-0\">\r\n<h6 class=\"text-uppercase\">UNIVERSITET</h6>\r\n\r\n<ul class=\"list-group\">\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Rektor tabrigi</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Universitet nizomi</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Me&#39;yoriy hujjatlar</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Umumiy ma&#39;lumot</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Onlayn murojaat</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Qayta aloqa</a></li>\r\n</ul>\r\n<!-- Ends: .footer-widget --></div>\r\n<!-- end /.col-md-4 -->\r\n\r\n<div class=\"col-md-3 col-sm-4 p-0\">\r\n<h6 class=\"text-uppercase\">UNIVERSITET</h6>\r\n\r\n<ul class=\"list-group\">\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Rektor tabrigi</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Universitet nizomi</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Me&#39;yoriy hujjatlar</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Umumiy ma&#39;lumot</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Onlayn murojaat</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Qayta aloqa</a></li>\r\n</ul>\r\n<!-- Ends: .footer-widget --></div>\r\n<!-- end /.col-md-4 -->', '', '', '<h6>Toshkent Davlat Texnika Universiteti Olmaliq filiali Manzil: Toshkent viloyati Olmaliq tumani, Tuman Ko&rsquo;cha, uy</h6>\r\n\r\n<p>Tel.: (71) 123-45-67</p>\r\n\r\n<p>Mail: info@tdtuof.uz</p>\r\n', NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL);
INSERT INTO `contacts_translation` VALUES (9, 1, 'en', 'Toshkent Davlat Texnika Universiteti Olmaliq filiali', NULL, NULL, '<div class=\"col-md-3 col-sm-4 p-0\">\r\n<h6 class=\"text-uppercase\">UNIVERSITET</h6>\r\n\r\n<ul class=\"list-group\">\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Rektor tabrigi</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Universitet nizomi</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Me&#39;yoriy hujjatlar</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Umumiy ma&#39;lumot</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Onlayn murojaat</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Qayta aloqa</a></li>\r\n</ul>\r\n<!-- Ends: .footer-widget --></div>\r\n<!-- end /.col-md-4 -->\r\n\r\n<div class=\"col-md-3 col-sm-4 p-0\">\r\n<h6 class=\"text-uppercase\">UNIVERSITET</h6>\r\n\r\n<ul class=\"list-group\">\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Rektor tabrigi</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Universitet nizomi</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Me&#39;yoriy hujjatlar</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Umumiy ma&#39;lumot</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Onlayn murojaat</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Qayta aloqa</a></li>\r\n</ul>\r\n<!-- Ends: .footer-widget --></div>\r\n<!-- end /.col-md-4 -->\r\n\r\n<div class=\"col-md-3 col-sm-4 p-0\">\r\n<h6 class=\"text-uppercase\">UNIVERSITET</h6>\r\n\r\n<ul class=\"list-group\">\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Rektor tabrigi</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Universitet nizomi</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Me&#39;yoriy hujjatlar</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Umumiy ma&#39;lumot</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Onlayn murojaat</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Qayta aloqa</a></li>\r\n</ul>\r\n<!-- Ends: .footer-widget --></div>\r\n<!-- end /.col-md-4 -->\r\n\r\n<div class=\"col-md-3 col-sm-4 p-0\">\r\n<h6 class=\"text-uppercase\">UNIVERSITET</h6>\r\n\r\n<ul class=\"list-group\">\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Rektor tabrigi</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Universitet nizomi</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Me&#39;yoriy hujjatlar</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Umumiy ma&#39;lumot</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Onlayn murojaat</a></li>\r\n	<li class=\"list-group-item footermenu\"><a href=\"#\">Qayta aloqa</a></li>\r\n</ul>\r\n<!-- Ends: .footer-widget --></div>\r\n<!-- end /.col-md-4 -->', '', '', '<h6>Toshkent Davlat Texnika Universiteti Olmaliq filiali Manzil: Toshkent viloyati Olmaliq tumani, Tuman Ko&rsquo;cha, uy</h6>\r\n\r\n<p>Tel.: (71) 123-45-67</p>\r\n\r\n<p>Mail: info@tdtuof.uz</p>\r\n', NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL);
INSERT INTO `contacts_translation` VALUES (10, 1, 'oz', 'Toshkent Davlat Texnika Universiteti Olmaliq filiali kytttttttttrrrrrrrr', NULL, NULL, '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for gallery
-- ----------------------------
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_category_id` int(11) NULL DEFAULT NULL,
  `status` smallint(6) NULL DEFAULT 0,
  `is_favorite` smallint(6) NULL DEFAULT 0,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `og_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `detail_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `sort_index` int(11) NULL DEFAULT NULL,
  `urlcount` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '0',
  `hits_count` int(11) NULL DEFAULT NULL,
  `published_at` int(11) NULL DEFAULT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_gallery_category_gallery`(`gallery_category_id`) USING BTREE,
  CONSTRAINT `fk_gallery_category_gallery` FOREIGN KEY (`gallery_category_id`) REFERENCES `gallery_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for gallery_category
-- ----------------------------
DROP TABLE IF EXISTS `gallery_category`;
CREATE TABLE `gallery_category`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` smallint(6) NULL DEFAULT 0,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `og_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `detail_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `sort_index` int(11) NULL DEFAULT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for gallery_category_translation
-- ----------------------------
DROP TABLE IF EXISTS `gallery_category_translation`;
CREATE TABLE `gallery_category_translation`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_category_id` int(11) NULL DEFAULT NULL,
  `language` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_gallery_category_translation`(`gallery_category_id`) USING BTREE,
  CONSTRAINT `fk_gallery_category_translation` FOREIGN KEY (`gallery_category_id`) REFERENCES `gallery_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for gallery_images
-- ----------------------------
DROP TABLE IF EXISTS `gallery_images`;
CREATE TABLE `gallery_images`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_gallery_images`(`gallery_id`) USING BTREE,
  CONSTRAINT `fk_gallery_images` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for gallery_translation
-- ----------------------------
DROP TABLE IF EXISTS `gallery_translation`;
CREATE TABLE `gallery_translation`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NULL DEFAULT NULL,
  `language` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_gallery_translation`(`gallery_id`) USING BTREE,
  CONSTRAINT `fk_gallery_translation` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for gender
-- ----------------------------
DROP TABLE IF EXISTS `gender`;
CREATE TABLE `gender`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` smallint(6) NULL DEFAULT 0,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gender
-- ----------------------------
INSERT INTO `gender` VALUES (1, 1, 1584428730, 1584428812);
INSERT INTO `gender` VALUES (2, 1, 1587884465, 1587884476);

-- ----------------------------
-- Table structure for gender_translation
-- ----------------------------
DROP TABLE IF EXISTS `gender_translation`;
CREATE TABLE `gender_translation`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gender_id` int(11) NULL DEFAULT NULL,
  `language` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_gender_translation`(`gender_id`) USING BTREE,
  CONSTRAINT `fk_gender_translation` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gender_translation
-- ----------------------------
INSERT INTO `gender_translation` VALUES (1, 1, 'uz', 'Erkak');
INSERT INTO `gender_translation` VALUES (2, 1, 'oz', 'Erkak kr');
INSERT INTO `gender_translation` VALUES (3, 1, 'ru', 'Erkak ru');
INSERT INTO `gender_translation` VALUES (4, 1, 'en', 'erkak en ds');
INSERT INTO `gender_translation` VALUES (5, 2, 'uz', 'Ayol uz das');
INSERT INTO `gender_translation` VALUES (6, 2, 'oz', 'Ayol kr asd');
INSERT INTO `gender_translation` VALUES (7, 2, 'ru', 'Ayol ruas das');
INSERT INTO `gender_translation` VALUES (8, 2, 'en', 'Ayol enasdasd');

-- ----------------------------
-- Table structure for key_storage_item
-- ----------------------------
DROP TABLE IF EXISTS `key_storage_item`;
CREATE TABLE `key_storage_item`  (
  `key` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  PRIMARY KEY (`key`) USING BTREE,
  UNIQUE INDEX `idx_key_storage_item_key`(`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of key_storage_item
-- ----------------------------
INSERT INTO `key_storage_item` VALUES ('backend.layout-boxed', '0', NULL);
INSERT INTO `key_storage_item` VALUES ('backend.layout-collapsed-sidebar', '0', NULL);
INSERT INTO `key_storage_item` VALUES ('backend.layout-fixed', '0', NULL);
INSERT INTO `key_storage_item` VALUES ('backend.layout-mini-sidebar', '0', NULL);
INSERT INTO `key_storage_item` VALUES ('backend.theme-skin', 'skin-blue', NULL);
INSERT INTO `key_storage_item` VALUES ('bayroq', '18', '');
INSERT INTO `key_storage_item` VALUES ('facebook', 'https://www.facebook.com/oftdtu/', '');
INSERT INTO `key_storage_item` VALUES ('frontend.email-confirm', '1', NULL);
INSERT INTO `key_storage_item` VALUES ('frontend.registration', '1', NULL);
INSERT INTO `key_storage_item` VALUES ('instagram', 'https://www.instagram.com/tdtuof.uz/', '');
INSERT INTO `key_storage_item` VALUES ('telegram', 'https://t.me/TDTU_OF', '');
INSERT INTO `key_storage_item` VALUES ('youtube', 'https://www.youtube.com/channel/UC6-sOomQ7y_5iiV8f2PRLqw', '');

-- ----------------------------
-- Table structure for lavozim
-- ----------------------------
DROP TABLE IF EXISTS `lavozim`;
CREATE TABLE `lavozim`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` smallint(6) NULL DEFAULT 0,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lavozim
-- ----------------------------
INSERT INTO `lavozim` VALUES (2, 1, 1585030243, 1585030392);

-- ----------------------------
-- Table structure for lavozimlang
-- ----------------------------
DROP TABLE IF EXISTS `lavozimlang`;
CREATE TABLE `lavozimlang`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lavozim_id` int(11) NULL DEFAULT NULL,
  `language` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `extra1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_lavozim_lavozimLang`(`lavozim_id`) USING BTREE,
  CONSTRAINT `fk_lavozim_lavozimLang` FOREIGN KEY (`lavozim_id`) REFERENCES `lavozim` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lavozimlang
-- ----------------------------
INSERT INTO `lavozimlang` VALUES (1, 2, 'uz', 'lavozim uz update', NULL, NULL, NULL);
INSERT INTO `lavozimlang` VALUES (2, 2, 'oz', 'lavozim oz update', NULL, NULL, NULL);
INSERT INTO `lavozimlang` VALUES (3, 2, 'ru', 'lavozim ru update', NULL, NULL, NULL);
INSERT INTO `lavozimlang` VALUES (4, 2, 'en', 'lavozim en update', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `level` int(11) NULL DEFAULT NULL,
  `category` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `log_time` double NULL DEFAULT NULL,
  `prefix` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_log_level`(`level`) USING BTREE,
  INDEX `idx_log_category`(`category`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2170 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `extra1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, 'Основное меню', 'header-menu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `menu` VALUES (2, 'Правая боковая панель', 'right-sidebar', NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for menu_items
-- ----------------------------
DROP TABLE IF EXISTS `menu_items`;
CREATE TABLE `menu_items`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NULL DEFAULT NULL,
  `parent_id` int(11) NULL DEFAULT NULL,
  `target` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ico_path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `title_ru` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `slug_ru` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `title_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `slug_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `body_ru` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `body_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_menu_items_menu_id`(`menu_id`) USING BTREE,
  CONSTRAINT `fk_menu_items_menu_id` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menu_items
-- ----------------------------
INSERT INTO `menu_items` VALUES (1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 's:3127:\"[{\"text\":\"Filial\",\"href\":\"/sahifalar/institut-haqida\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"textru\":\"Филиал\",\"hrefru\":\"/stranitsi/ob-institute\",\"texten\":\"About us\",\"hrefen\":\"/pages/about-us\",\"children\":[{\"text\":\"Filial nizomi\",\"href\":\"/sahifalar/filial-nizomi\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"textru\":\"Устав филиала\",\"hrefru\":\"/stranitsi/ustav-filiala\",\"texten\":\" Branch Charter\",\"hrefen\":\"/pages/branch-charter\"},{\"text\":\"Filial tarixi\",\"href\":\"/sahifalar/filial-tarixi\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"textru\":\"История Филиала\",\"hrefru\":\"/stranitsi/istoriya-filiala\",\"texten\":\"branch History\",\"hrefen\":\"/pages/branch-history\"},{\"text\":\"Institut asoschisi\",\"href\":\"/sahifalar/institut-asoschisi\",\"icon\":\"\",\"target\":\"_self\",\"title\":\"\",\"textru\":\"Основатель института\",\"hrefru\":\"/stranitsi/osnovatel-instituta\",\"texten\":\"Founder of the Institute\",\"hrefen\":\"/pages/founder-of-the-institute\"},{\"text\":\"Institut direktorlari\",\"href\":\"/sahifalar/institut-direktorlari\",\"icon\":\"\",\"target\":\"_self\",\"title\":\"\",\"textru\":\"Директора Института\",\"hrefru\":\"/stranitsi/direktora-instituta\",\"texten\":\"Director of the Institute\",\"hrefen\":\"/pages/director-of-the-institute\"},{\"text\":\"Bo\'limlar\",\"href\":\"/bolimlar\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"textru\":\"Отделы\",\"hrefru\":\"/otdeli\",\"texten\":\"Departments\",\"hrefen\":\"/departments\",\"children\":[{\"text\":\"Kadrlar bo‘limi\",\"href\":\"/sahifalar/kadrlar-bolimi\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"textru\":\"Отдел кадров\",\"hrefru\":\"/stranitsi/otdel-kadrov\",\"texten\":\"Personnel department\",\"hrefen\":\"/pages/personnel-department\",\"children\":[{\"text\":\"Kengashlar\",\"href\":\"#\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"textru\":\"Советы\",\"hrefru\":\"#\",\"texten\":\"Councils\",\"hrefen\":\"#\"}]}]}]},{\"text\":\"Ilmiy faoliyat\",\"href\":\"#\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"textru\":\"Научная деятельность\",\"hrefru\":\"#\",\"texten\":\"Activity\",\"hrefen\":\"#\"},{\"text\":\"Matbuot xizmati\",\"href\":\"#\",\"icon\":\"\",\"target\":\"_self\",\"title\":\"\",\"textru\":\"Пресс центр\",\"hrefru\":\"#\",\"texten\":\"Press office\",\"hrefen\":\"#\",\"children\":[{\"text\":\"Yangiliklar\",\"href\":\"/yangiliklar\",\"icon\":\"\",\"target\":\"_self\",\"title\":\"\",\"textru\":\"Новости\",\"hrefru\":\"/novosti\",\"texten\":\"News\",\"hrefen\":\"/news\"},{\"text\":\"Foto Galleriya\",\"href\":\"/photo-gallery\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"textru\":\"Фотогалерея\",\"hrefru\":\"/photo-gallery\",\"texten\":\"Photo Gallery\",\"hrefen\":\"/photo-gallery\"},{\"text\":\"Video galleriya\",\"href\":\"/video-galleriya\",\"icon\":\"\",\"target\":\"_self\",\"title\":\"\",\"textru\":\"Видео галерея\",\"hrefru\":\"/video-galereya\",\"texten\":\"Video gallery\",\"hrefen\":\"/video-gallery\"}]},{\"text\":\"Qayta aloqa\",\"href\":\"/contact\",\"icon\":\"\",\"target\":\"_self\",\"title\":\"\",\"textru\":\"Контакты\",\"hrefru\":\"/contact\",\"texten\":\"Contacts\",\"hrefen\":\"/contact\"},{\"text\":\"FTI uz\",\"href\":\"/fti-uz\",\"textoz\":\"FTI kr\",\"hrefoz\":\"/fti-kr\",\"textru\":\"FTI ru\",\"hrefru\":\"/fti-ru\",\"texten\":\"FTI en\",\"hrefen\":\"/fti-en\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\"}]\";', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message`  (
  `id` int(11) NOT NULL,
  `language` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `translation` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`, `language`) USING BTREE,
  INDEX `idx_message_language`(`language`) USING BTREE,
  CONSTRAINT `fk_message_source_message` FOREIGN KEY (`id`) REFERENCES `source_message` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES (4, 'en', 'Menu');
INSERT INTO `message` VALUES (4, 'ru', 'Меню');
INSERT INTO `message` VALUES (4, 'uz', 'Menyu');
INSERT INTO `message` VALUES (5, 'en', 'Sliders');
INSERT INTO `message` VALUES (5, 'ru', 'Слайдеры');
INSERT INTO `message` VALUES (5, 'uz', 'Sliderlar');
INSERT INTO `message` VALUES (6, 'en', 'Create');
INSERT INTO `message` VALUES (6, 'ru', 'Создать');
INSERT INTO `message` VALUES (6, 'uz', 'Yaratmoq');
INSERT INTO `message` VALUES (7, 'en', 'Widgets');
INSERT INTO `message` VALUES (7, 'ru', 'Виджиты');
INSERT INTO `message` VALUES (7, 'uz', 'Vidjitlar');
INSERT INTO `message` VALUES (8, 'en', 'Save');
INSERT INTO `message` VALUES (8, 'ru', 'Сохранить');
INSERT INTO `message` VALUES (8, 'uz', 'Saqlash');
INSERT INTO `message` VALUES (9, 'en', 'Menus');
INSERT INTO `message` VALUES (9, 'ru', 'Меню');
INSERT INTO `message` VALUES (9, 'uz', 'Menyular');
INSERT INTO `message` VALUES (10, 'en', 'Title');
INSERT INTO `message` VALUES (10, 'ru', 'Заглавие');
INSERT INTO `message` VALUES (10, 'uz', 'Sarlavha');
INSERT INTO `message` VALUES (11, 'en', 'Key');
INSERT INTO `message` VALUES (11, 'ru', 'Ключ');
INSERT INTO `message` VALUES (11, 'uz', 'Kalit');
INSERT INTO `message` VALUES (12, 'en', 'Select a page');
INSERT INTO `message` VALUES (12, 'ru', 'Выберите страницу');
INSERT INTO `message` VALUES (12, 'uz', 'Sahifani tanlang');
INSERT INTO `message` VALUES (13, 'en', 'Select news');
INSERT INTO `message` VALUES (13, 'ru', 'Выберите новости');
INSERT INTO `message` VALUES (13, 'uz', 'Yangiliklarni tanlang');
INSERT INTO `message` VALUES (14, 'en', 'Select Article');
INSERT INTO `message` VALUES (14, 'ru', 'Выберите статью');
INSERT INTO `message` VALUES (14, 'uz', 'Maqolani tanlang');
INSERT INTO `message` VALUES (16, 'en', 'Articles');
INSERT INTO `message` VALUES (16, 'ru', 'Статьи');
INSERT INTO `message` VALUES (16, 'uz', 'Maqolalar');
INSERT INTO `message` VALUES (17, 'en', 'Articles');
INSERT INTO `message` VALUES (17, 'ru', 'Статьи');
INSERT INTO `message` VALUES (17, 'uz', 'Maqolalar');
INSERT INTO `message` VALUES (18, 'en', 'Published At');
INSERT INTO `message` VALUES (18, 'ru', 'Опубликовано в');
INSERT INTO `message` VALUES (18, 'uz', 'Chop etildi');
INSERT INTO `message` VALUES (19, 'en', 'Is Favorite?');
INSERT INTO `message` VALUES (19, 'ru', 'Любимый?');
INSERT INTO `message` VALUES (19, 'uz', 'Sevimlimi?');
INSERT INTO `message` VALUES (20, 'en', 'Not active');
INSERT INTO `message` VALUES (20, 'ru', 'Не активен');
INSERT INTO `message` VALUES (20, 'uz', 'Faol emas');
INSERT INTO `message` VALUES (21, 'en', 'Active');
INSERT INTO `message` VALUES (21, 'ru', 'Активный');
INSERT INTO `message` VALUES (21, 'uz', 'Faol');
INSERT INTO `message` VALUES (22, 'en', 'Source Messages');
INSERT INTO `message` VALUES (22, 'ru', 'Исходные сообщения');
INSERT INTO `message` VALUES (22, 'uz', 'Xabar manbasi');
INSERT INTO `message` VALUES (23, 'en', 'Print');
INSERT INTO `message` VALUES (23, 'ru', 'Распечатать');
INSERT INTO `message` VALUES (23, 'uz', 'Chop etish');
INSERT INTO `message` VALUES (24, 'en', 'Navigation');
INSERT INTO `message` VALUES (24, 'ru', 'Навигация');
INSERT INTO `message` VALUES (24, 'uz', 'Navigatsiya');
INSERT INTO `message` VALUES (25, 'en', '© IHRV AN RUz. 2019');
INSERT INTO `message` VALUES (25, 'ru', '© ИХРВ АН РУз. 2019');
INSERT INTO `message` VALUES (25, 'uz', '© O\'zR IHRV. 2019 yil');
INSERT INTO `message` VALUES (26, 'en', '');
INSERT INTO `message` VALUES (26, 'ru', '<b>ИНСТИТУТ ХИМИИ</b> <br>растительных веществ <br>АН РУз');
INSERT INTO `message` VALUES (26, 'uz', 'O\'zR FA<br>\r\n<b>O\'simlik moddalar </b> <br>kimyosi instituti');
INSERT INTO `message` VALUES (27, 'en', 'Almalyk branch of the Islam Karimov Tashkent State Technical University');
INSERT INTO `message` VALUES (27, 'ru', 'Алмалыкский филиал Ташкентского государственного технического университета имени Ислама Каримова');
INSERT INTO `message` VALUES (27, 'uz', 'Islom Karimov nomidagi Toshkent davlat texnika universiteti Olmaliq filiali');
INSERT INTO `message` VALUES (28, 'en', 'All News');
INSERT INTO `message` VALUES (28, 'ru', 'Все новости');
INSERT INTO `message` VALUES (28, 'uz', 'Barcha yangiliklar');
INSERT INTO `message` VALUES (29, 'en', 'Read more');
INSERT INTO `message` VALUES (29, 'ru', 'Подробно');
INSERT INTO `message` VALUES (29, 'uz', 'Batafsil');
INSERT INTO `message` VALUES (30, 'en', 'Events');
INSERT INTO `message` VALUES (30, 'ru', 'Мероприятии');
INSERT INTO `message` VALUES (30, 'uz', 'Tadbirlar');
INSERT INTO `message` VALUES (31, 'en', 'Drugs');
INSERT INTO `message` VALUES (31, 'ru', 'Препараты');
INSERT INTO `message` VALUES (31, 'uz', 'Dori vositalari');
INSERT INTO `message` VALUES (32, 'en', 'Partners');
INSERT INTO `message` VALUES (32, 'ru', 'Партнеры');
INSERT INTO `message` VALUES (32, 'uz', 'Hamkorlar');
INSERT INTO `message` VALUES (33, 'en', 'Useful links');
INSERT INTO `message` VALUES (33, 'ru', 'Полезные ссылки');
INSERT INTO `message` VALUES (33, 'uz', 'Foydali havolalar');
INSERT INTO `message` VALUES (34, 'en', 'Our services');
INSERT INTO `message` VALUES (34, 'ru', 'Наши услуги');
INSERT INTO `message` VALUES (34, 'uz', 'Bizning xizmatlarimiz');
INSERT INTO `message` VALUES (35, 'en', 'Site search');
INSERT INTO `message` VALUES (35, 'ru', 'Поиск по сайту');
INSERT INTO `message` VALUES (35, 'uz', 'Saytdan qidirish');
INSERT INTO `message` VALUES (36, 'en', 'Search');
INSERT INTO `message` VALUES (36, 'ru', 'Поиск');
INSERT INTO `message` VALUES (36, 'uz', 'Izlash');
INSERT INTO `message` VALUES (37, 'en', 'Latest news');
INSERT INTO `message` VALUES (37, 'ru', 'Последние новости');
INSERT INTO `message` VALUES (37, 'uz', 'So\'nggi yangiliklar');
INSERT INTO `message` VALUES (38, 'en', 'Home');
INSERT INTO `message` VALUES (38, 'ru', 'Главная');
INSERT INTO `message` VALUES (38, 'uz', 'Bosh sahifa');
INSERT INTO `message` VALUES (39, 'en', '');
INSERT INTO `message` VALUES (39, 'ru', 'asd');
INSERT INTO `message` VALUES (39, 'uz', 'asd');
INSERT INTO `message` VALUES (40, 'en', 'Widget');
INSERT INTO `message` VALUES (40, 'ru', 'Виджит');
INSERT INTO `message` VALUES (40, 'uz', 'Vidjit');

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration`  (
  `version` varchar(180) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `apply_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`version`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', 1562930653);
INSERT INTO `migration` VALUES ('m140506_102106_rbac_init', 1562930659);
INSERT INTO `migration` VALUES ('m141106_185632_log_init', 1562930660);
INSERT INTO `migration` VALUES ('m160101_000001_user', 1562930662);
INSERT INTO `migration` VALUES ('m160101_000002_key_storage_item', 1562930663);
INSERT INTO `migration` VALUES ('m160101_000003_navbar_menu', 1562930665);
INSERT INTO `migration` VALUES ('m160101_000004_page', 1562930665);
INSERT INTO `migration` VALUES ('m160101_000005_article', 1562930674);
INSERT INTO `migration` VALUES ('m160101_000006_tag', 1562930686);
INSERT INTO `migration` VALUES ('m160101_000007_data', 1562930688);
INSERT INTO `migration` VALUES ('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1562930688);
INSERT INTO `migration` VALUES ('m180523_151638_rbac_updates_indexes_without_prefix', 1562930690);
INSERT INTO `migration` VALUES ('m190717_045625_create_menu_table', 1563339696);
INSERT INTO `migration` VALUES ('m190718_130125_create_slider_table', 1563455953);
INSERT INTO `migration` VALUES ('m190720_121450_create_widgets_text_table', 1563625572);
INSERT INTO `migration` VALUES ('m190721_185640_create_post_table', 1563970039);
INSERT INTO `migration` VALUES ('m190726_075546_create_contacts_table', 1564127945);
INSERT INTO `migration` VALUES ('m191202_071243_create_gallery_table', 1584419982);
INSERT INTO `migration` VALUES ('m200317_043257_create_reg_obl_table', 1584419982);
INSERT INTO `migration` VALUES ('m200317_065623_create_gender_table', 1584428285);
INSERT INTO `migration` VALUES ('m200324_055040_create_lavozim_table', 1585029477);
INSERT INTO `migration` VALUES ('m200424_132546_create_post_category_table', 1587739036);
INSERT INTO `migration` VALUES ('m200424_132614_create_posts_table', 1587739038);
INSERT INTO `migration` VALUES ('m200522_023449_add_new_column_to_posts_table', 1590115448);

-- ----------------------------
-- Table structure for navbar_menu
-- ----------------------------
DROP TABLE IF EXISTS `navbar_menu`;
CREATE TABLE `navbar_menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NULL DEFAULT NULL,
  `status` smallint(6) NOT NULL,
  `sort_index` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `parent`(`parent_id`) USING BTREE,
  CONSTRAINT `parent` FOREIGN KEY (`parent_id`) REFERENCES `navbar_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of navbar_menu
-- ----------------------------
INSERT INTO `navbar_menu` VALUES (1, 'page/about', 'About', NULL, 1, NULL);

-- ----------------------------
-- Table structure for page
-- ----------------------------
DROP TABLE IF EXISTS `page`;
CREATE TABLE `page`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of page
-- ----------------------------
INSERT INTO `page` VALUES (1, 'About', 'about', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1562930687, 1562930687);

-- ----------------------------
-- Table structure for post_category
-- ----------------------------
DROP TABLE IF EXISTS `post_category`;
CREATE TABLE `post_category`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NULL DEFAULT 0,
  `is_favorite` smallint(6) NULL DEFAULT 0,
  `date_of_birth` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `year` int(11) NULL DEFAULT NULL,
  `month` int(11) NULL DEFAULT NULL,
  `day` int(11) NULL DEFAULT NULL,
  `age` int(11) NULL DEFAULT NULL,
  `fax` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `fax2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `phone2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `phone3` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `passport_seria` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `passport_number` int(11) NULL DEFAULT NULL,
  `inn` int(11) NULL DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `og_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `detail_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `sort_index` int(11) NULL DEFAULT NULL,
  `urlcount` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '0',
  `map` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `latitude` int(11) NULL DEFAULT NULL,
  `longitude` int(11) NULL DEFAULT NULL,
  `hits_count` int(11) NULL DEFAULT NULL,
  `parent_id` int(11) NULL DEFAULT NULL,
  `published_at` int(11) NULL DEFAULT NULL,
  `author_id` int(11) NULL DEFAULT NULL,
  `updater_id` int(11) NULL DEFAULT NULL,
  `extra1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_post_category_parent`(`parent_id`) USING BTREE,
  INDEX `fk_post_post_category_author`(`author_id`) USING BTREE,
  INDEX `fk_post-post_category_updater`(`updater_id`) USING BTREE,
  CONSTRAINT `fk_post-post_category_updater` FOREIGN KEY (`updater_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_post_category_parent` FOREIGN KEY (`parent_id`) REFERENCES `post_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_post_post_category_author` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_category
-- ----------------------------
INSERT INTO `post_category` VALUES (22, 'pages', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '0', '', NULL, NULL, NULL, NULL, 1586890800, 1, 1, NULL, NULL, NULL, 1587749011, 1587749706);
INSERT INTO `post_category` VALUES (23, 'fan_talim', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '0', '', NULL, NULL, NULL, NULL, 1587841200, 1, 1, NULL, NULL, NULL, 1587883128, 1587883128);

-- ----------------------------
-- Table structure for post_category_translation
-- ----------------------------
DROP TABLE IF EXISTS `post_category_translation`;
CREATE TABLE `post_category_translation`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_category_id` int(11) NULL DEFAULT NULL,
  `language` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `address2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `address3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_post_category_translation`(`post_category_id`) USING BTREE,
  CONSTRAINT `fk_post_category_translation` FOREIGN KEY (`post_category_id`) REFERENCES `post_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_category_translation
-- ----------------------------
INSERT INTO `post_category_translation` VALUES (25, 22, 'uz', 'Sahifalar', 'sahifalar', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL);
INSERT INTO `post_category_translation` VALUES (26, 22, 'oz', 'Sahifalar kr', 'sahifalar-kr', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL);
INSERT INTO `post_category_translation` VALUES (27, 22, 'ru', 'Sahifalar ru', 'sahifalar-ru', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL);
INSERT INTO `post_category_translation` VALUES (28, 22, 'en', 'Pages', 'pages', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL);
INSERT INTO `post_category_translation` VALUES (29, 23, 'uz', 'Fan va Ta\'lim uz', 'fan-va-talim-uz', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL);
INSERT INTO `post_category_translation` VALUES (30, 23, 'oz', 'Fan va Ta\'lim kr', 'fan-va-talim-kr', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL);
INSERT INTO `post_category_translation` VALUES (31, 23, 'ru', 'Fan va Ta\'lim ru', 'fan-va-talim-ru', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL);
INSERT INTO `post_category_translation` VALUES (32, 23, 'en', 'Fan va Ta\'lim en', 'fan-va-talim-en', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NULL DEFAULT NULL,
  `lavozim_id` int(11) NULL DEFAULT NULL,
  `gender_id` int(11) NULL DEFAULT NULL,
  `status` smallint(6) NULL DEFAULT 0,
  `is_favorite` smallint(6) NULL DEFAULT 0,
  `date_of_birth` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `year` int(11) NULL DEFAULT NULL,
  `month` int(11) NULL DEFAULT NULL,
  `day` int(11) NULL DEFAULT NULL,
  `age` int(11) NULL DEFAULT NULL,
  `fax` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `fax2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `phone2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `phone3` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `passport_seria` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `passport_number` int(11) NULL DEFAULT NULL,
  `inn` int(11) NULL DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `og_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `detail_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `sort_index` int(11) NULL DEFAULT NULL,
  `urlcount` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '0',
  `map` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `latitude` int(11) NULL DEFAULT NULL,
  `longitude` int(11) NULL DEFAULT NULL,
  `hits_count` int(11) NULL DEFAULT NULL,
  `parent_id` int(11) NULL DEFAULT NULL,
  `published_at` int(11) NULL DEFAULT NULL,
  `author_id` int(11) NULL DEFAULT NULL,
  `updater_id` int(11) NULL DEFAULT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  `child_id` int(11) NULL DEFAULT NULL,
  `code` int(11) NULL DEFAULT NULL,
  `stir` int(11) NULL DEFAULT NULL,
  `gov_phone_number` int(11) NULL DEFAULT NULL,
  `work_phone_number` int(11) NULL DEFAULT NULL,
  `mobile_phone_number` int(11) NULL DEFAULT NULL,
  `home_phone_number` int(11) NULL DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `number_employees` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_posts_category`(`category_id`) USING BTREE,
  INDEX `fk_posts_lavozim`(`lavozim_id`) USING BTREE,
  INDEX `fk_posts_gender`(`gender_id`) USING BTREE,
  INDEX `fk_post_parent`(`parent_id`) USING BTREE,
  INDEX `fk_posts_author`(`author_id`) USING BTREE,
  INDEX `fk_posts_updater`(`updater_id`) USING BTREE,
  CONSTRAINT `fk_post_parent` FOREIGN KEY (`parent_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_posts_author` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_posts_category` FOREIGN KEY (`category_id`) REFERENCES `post_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_posts_gender` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_posts_lavozim` FOREIGN KEY (`lavozim_id`) REFERENCES `lavozim` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_posts_updater` FOREIGN KEY (`updater_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (2, 23, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '5ea52ca02109a.png', NULL, '', '', '', NULL, '0', '', NULL, NULL, NULL, NULL, 1587841200, 1, 1, 1587883174, 1587883174, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `posts` VALUES (3, 23, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, NULL, '', NULL, '', '', '', NULL, '0', '', NULL, NULL, NULL, 2, 1587841200, 1, 1, 1587883221, 1587883221, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `posts` VALUES (4, 23, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, '132465', NULL, '132456@mail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5ec74a7d87682.jpg', NULL, '5ec74a7fce9cf.jpg', NULL, NULL, NULL, '0', '', NULL, NULL, NULL, 2, 0, 1, 1, 1590119041, 1590119361, NULL, 123456, 13456, 123456, 132456, 123456, 123456, '132456', 132465);

-- ----------------------------
-- Table structure for posts_translation
-- ----------------------------
DROP TABLE IF EXISTS `posts_translation`;
CREATE TABLE `posts_translation`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `posts_id` int(11) NULL DEFAULT NULL,
  `language` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `address2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `address3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `director` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `fio` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_posts_translation`(`posts_id`) USING BTREE,
  CONSTRAINT `fk_posts_translation` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts_translation
-- ----------------------------
INSERT INTO `posts_translation` VALUES (5, 2, 'uz', 'Fanlar adademiyasi uz', 'fanlar-adademiyasi-uz', '', NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `posts_translation` VALUES (6, 2, 'oz', 'Fanlar adademiyasi kr', 'fanlar-adademiyasi-kr', '', NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `posts_translation` VALUES (7, 2, 'ru', 'Fanlar adademiyasi ru', 'fanlar-adademiyasi-ru', '', NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `posts_translation` VALUES (8, 2, 'en', 'Fanlar adademiyasi en', 'fanlar-adademiyasi-en', '', NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `posts_translation` VALUES (9, 3, 'uz', 'FTI uz', 'fti-uz', '', NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `posts_translation` VALUES (10, 3, 'oz', 'FTI kr', 'fti-kr', '', NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `posts_translation` VALUES (11, 3, 'ru', 'FTI ru', 'fti-ru', '', NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `posts_translation` VALUES (12, 3, 'en', 'FTI en', 'fti-en', '', NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `posts_translation` VALUES (13, 4, 'uz', 'fban kutubxona uz update', 'fban-kutubxona-uz', NULL, '<span style=\"font-family: &quot;Source Sans Pro&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 700;\">Address uz</span>', NULL, NULL, '<span style=\"color: rgb(0, 166, 90); font-family: &quot;Source Sans Pro&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 700;\">Body uz</span>', '', '', NULL, NULL, NULL, 'Director uz', 'Fio uz');
INSERT INTO `posts_translation` VALUES (14, 4, 'oz', 'fban kutubxona oz update', 'fban-kutubxona-oz', NULL, 'address oz', NULL, NULL, 'body oz', '', '', NULL, NULL, NULL, 'Director oz', 'fio oz');
INSERT INTO `posts_translation` VALUES (15, 4, 'ru', 'fban kutubxona ru update', 'fban-kutubxona-ru', NULL, 'address ru', NULL, NULL, 'body ru', '', '', NULL, NULL, NULL, 'director ru', 'fio ru');
INSERT INTO `posts_translation` VALUES (16, 4, 'en', 'fban kutubxona en update', 'fban-kutubxona-en', NULL, 'address en', NULL, NULL, 'body en', '', '', NULL, NULL, NULL, 'Director en', 'fio en');

-- ----------------------------
-- Table structure for slider
-- ----------------------------
DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `extra1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of slider
-- ----------------------------
INSERT INTO `slider` VALUES (1, 'Главный большой', 'main', NULL, NULL, NULL, 1563456608, 1563456608);
INSERT INTO `slider` VALUES (2, 'Партнеры', 'partneri', NULL, NULL, NULL, 1564142176, 1564142176);
INSERT INTO `slider` VALUES (3, 'Полезные ссылки', 'poleznie-ssilki', NULL, NULL, NULL, 1564142288, 1564142288);
INSERT INTO `slider` VALUES (4, 'Препараты', 'drugs', NULL, NULL, NULL, 1564654940, 1564654940);

-- ----------------------------
-- Table structure for slider_items
-- ----------------------------
DROP TABLE IF EXISTS `slider_items`;
CREATE TABLE `slider_items`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_id` int(11) NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` smallint(6) NULL DEFAULT 0,
  `backgroun_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `extra_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `extra_1image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `extra_2image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `extra_3image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_slider_items_slider_id`(`slider_id`) USING BTREE,
  CONSTRAINT `fk_slider_items_slider_id` FOREIGN KEY (`slider_id`) REFERENCES `slider` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of slider_items
-- ----------------------------
INSERT INTO `slider_items` VALUES (3, 3, '5df1e542c9aa7.png', 1, '', NULL, NULL, NULL, NULL, 1564555568, 1576133956);
INSERT INTO `slider_items` VALUES (5, 3, '5df1e5da6a23e.png', 1, '', NULL, NULL, NULL, NULL, 1576134109, 1576134121);
INSERT INTO `slider_items` VALUES (6, 1, '5ea5340daa8dc.png', 1, '', NULL, NULL, NULL, NULL, 1587885071, 1587885071);

-- ----------------------------
-- Table structure for slider_items_translation
-- ----------------------------
DROP TABLE IF EXISTS `slider_items_translation`;
CREATE TABLE `slider_items_translation`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_items_id` int(11) NULL DEFAULT NULL,
  `language` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_slider_items_translation_slider_items`(`slider_items_id`) USING BTREE,
  CONSTRAINT `fk_slider_items_translation_slider_items` FOREIGN KEY (`slider_items_id`) REFERENCES `slider_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of slider_items_translation
-- ----------------------------
INSERT INTO `slider_items_translation` VALUES (7, 3, 'uz', ' O\'zbekiston Respublikasi Fanlar akademiyasi', 'www.academy.uz', '', NULL, '', NULL, NULL, NULL);
INSERT INTO `slider_items_translation` VALUES (8, 3, 'ru', ' O\'zbekiston Respublikasi Fanlar akademiyasi', 'www.academy.uz', '', NULL, '', NULL, NULL, NULL);
INSERT INTO `slider_items_translation` VALUES (9, 3, 'en', ' O\'zbekiston Respublikasi Fanlar akademiyasi', 'www.academy.uz', '', NULL, '', NULL, NULL, NULL);
INSERT INTO `slider_items_translation` VALUES (13, 5, 'uz', 'Ягона Интерактив Давлат хизматлари портали', 'https://my.gov.uz', '', NULL, '', NULL, NULL, NULL);
INSERT INTO `slider_items_translation` VALUES (14, 5, 'ru', 'Ягона Интерактив Давлат хизматлари портали', 'https://my.gov.uz', '', NULL, '', NULL, NULL, NULL);
INSERT INTO `slider_items_translation` VALUES (15, 5, 'en', 'Ягона Интерактив Давлат хизматлари портали', 'https://my.gov.uz', '', NULL, '', NULL, NULL, NULL);
INSERT INTO `slider_items_translation` VALUES (16, 6, 'uz', 'main uz', '', '', NULL, '', NULL, NULL, NULL);
INSERT INTO `slider_items_translation` VALUES (17, 6, 'oz', 'main kr', '', '', NULL, '', NULL, NULL, NULL);
INSERT INTO `slider_items_translation` VALUES (18, 6, 'ru', 'main ru', '', '', NULL, '', NULL, NULL, NULL);
INSERT INTO `slider_items_translation` VALUES (19, 6, 'en', 'main en', '', '', NULL, '', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for source_message
-- ----------------------------
DROP TABLE IF EXISTS `source_message`;
CREATE TABLE `source_message`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_source_message_category`(`category`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of source_message
-- ----------------------------
INSERT INTO `source_message` VALUES (4, 'app', 'Menu');
INSERT INTO `source_message` VALUES (5, 'app', 'Sliders');
INSERT INTO `source_message` VALUES (6, 'app', 'Create');
INSERT INTO `source_message` VALUES (7, 'app', 'Post Categories');
INSERT INTO `source_message` VALUES (8, 'app', 'Save');
INSERT INTO `source_message` VALUES (9, 'app', 'Menus');
INSERT INTO `source_message` VALUES (10, 'app', 'Title');
INSERT INTO `source_message` VALUES (11, 'app', 'Key');
INSERT INTO `source_message` VALUES (12, 'app', 'Select a page');
INSERT INTO `source_message` VALUES (13, 'app', 'Select news');
INSERT INTO `source_message` VALUES (14, 'app', 'Select posts');
INSERT INTO `source_message` VALUES (16, 'app', 'Posts');
INSERT INTO `source_message` VALUES (17, 'app', 'Posts');
INSERT INTO `source_message` VALUES (18, 'app', 'Published At');
INSERT INTO `source_message` VALUES (19, 'app', 'Is Favorite');
INSERT INTO `source_message` VALUES (20, 'app', 'Not active');
INSERT INTO `source_message` VALUES (21, 'app', 'Active');
INSERT INTO `source_message` VALUES (22, 'app', 'Source Messages');
INSERT INTO `source_message` VALUES (23, 'app', 'Print');
INSERT INTO `source_message` VALUES (24, 'app', 'Navigation');
INSERT INTO `source_message` VALUES (25, 'app', 'copyrights');
INSERT INTO `source_message` VALUES (26, 'app', 'appname');
INSERT INTO `source_message` VALUES (27, 'app', 'apptitle');
INSERT INTO `source_message` VALUES (28, 'app', 'All News');
INSERT INTO `source_message` VALUES (29, 'app', 'Подробно');
INSERT INTO `source_message` VALUES (30, 'app', 'Мероприятии');
INSERT INTO `source_message` VALUES (31, 'app', 'Препараты');
INSERT INTO `source_message` VALUES (32, 'app', 'Партнеры');
INSERT INTO `source_message` VALUES (33, 'app', 'Полезные ссылки');
INSERT INTO `source_message` VALUES (34, 'app', 'Наши услуги');
INSERT INTO `source_message` VALUES (35, 'app', 'Поиск по сайту');
INSERT INTO `source_message` VALUES (36, 'app', 'Поиск');
INSERT INTO `source_message` VALUES (37, 'app', 'Latest posts');
INSERT INTO `source_message` VALUES (38, 'app', 'Главная');
INSERT INTO `source_message` VALUES (39, 'app', 'sadasd');
INSERT INTO `source_message` VALUES (40, 'app', 'Widgets');

-- ----------------------------
-- Table structure for tag
-- ----------------------------
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frequency` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tag
-- ----------------------------
INSERT INTO `tag` VALUES (1, 2, 'wad', 'wad', NULL);
INSERT INTO `tag` VALUES (2, 1, 'fwef wef wef wef', 'fwef-wef-wef-wef', NULL);
INSERT INTO `tag` VALUES (3, 1, 'fwefewf', 'fwefewf', NULL);

-- ----------------------------
-- Table structure for tuman
-- ----------------------------
DROP TABLE IF EXISTS `tuman`;
CREATE TABLE `tuman`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `viloyat_id` int(11) NULL DEFAULT NULL,
  `status` smallint(6) NULL DEFAULT 0,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_viloyat_tuman`(`viloyat_id`) USING BTREE,
  CONSTRAINT `fk_viloyat_tuman` FOREIGN KEY (`viloyat_id`) REFERENCES `viloyat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tuman
-- ----------------------------
INSERT INTO `tuman` VALUES (1, 1, 1, 1584427402, 1584427402);
INSERT INTO `tuman` VALUES (2, 2, 1, 1586796890, 1586796890);

-- ----------------------------
-- Table structure for tuman_translation
-- ----------------------------
DROP TABLE IF EXISTS `tuman_translation`;
CREATE TABLE `tuman_translation`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tuman_id` int(11) NULL DEFAULT NULL,
  `language` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tuman_translation`(`tuman_id`) USING BTREE,
  CONSTRAINT `fk_tuman_translation` FOREIGN KEY (`tuman_id`) REFERENCES `tuman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tuman_translation
-- ----------------------------
INSERT INTO `tuman_translation` VALUES (1, 1, 'uz', 'Andijon (tuman)');
INSERT INTO `tuman_translation` VALUES (2, 1, 'oz', 'Andijon (tuman) kr');
INSERT INTO `tuman_translation` VALUES (3, 1, 'ru', 'Andijon (tuman) ru');
INSERT INTO `tuman_translation` VALUES (4, 1, 'en', 'Andijon (tuman) en');
INSERT INTO `tuman_translation` VALUES (5, 2, 'uz', 'Buxoro uz');
INSERT INTO `tuman_translation` VALUES (6, 2, 'oz', 'Buxoro kr');
INSERT INTO `tuman_translation` VALUES (7, 2, 'ru', 'Buxoro ru');
INSERT INTO `tuman_translation` VALUES (8, 2, 'en', 'Buxoro en');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `access_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `ip` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  `action_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Administrator', 'QWRtaW5pc3RyYXRvcjpwYXNzd2Q=\n', '633uq4t0qdtd1mdllnv2h1vs32', '$2y$13$bgWbo3FnjY1P.02TmfogpOaWQmhsgJ8ZjiP8Hkt.9CNuotZZYiEua', 'webmaster@example.com', 1, '127.0.0.1', 1562930687, 1586957375, 1590119676);
INSERT INTO `user` VALUES (6, 'elyor', 'cqsNLzbZYx1zmwujxuiDh0lEir653t-S', NULL, '$2y$13$a8YMFdgP3ijhq6H9QBqlv.S1VCAQzXqONxmV9qOnvRbF6y75/CezC', 'karimovelyor@gmail.com', 1, '127.0.0.1', 1586982096, 1586982151, 1586986792);

-- ----------------------------
-- Table structure for user_profile
-- ----------------------------
DROP TABLE IF EXISTS `user_profile`;
CREATE TABLE `user_profile`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `lastname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `birthday` int(11) NULL DEFAULT NULL,
  `avatar_path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `gender` smallint(1) NULL DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `other` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_profile
-- ----------------------------
INSERT INTO `user_profile` VALUES (1, NULL, NULL, NULL, '', NULL, NULL, NULL);
INSERT INTO `user_profile` VALUES (6, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for viloyat
-- ----------------------------
DROP TABLE IF EXISTS `viloyat`;
CREATE TABLE `viloyat`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` smallint(6) NULL DEFAULT 0,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of viloyat
-- ----------------------------
INSERT INTO `viloyat` VALUES (1, 1, 1584426333, 1584426333);
INSERT INTO `viloyat` VALUES (2, 1, 1586776654, 1586776654);

-- ----------------------------
-- Table structure for viloyat_translation
-- ----------------------------
DROP TABLE IF EXISTS `viloyat_translation`;
CREATE TABLE `viloyat_translation`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `viloyat_id` int(11) NULL DEFAULT NULL,
  `language` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_viloyat_translation`(`viloyat_id`) USING BTREE,
  CONSTRAINT `fk_viloyat_translation` FOREIGN KEY (`viloyat_id`) REFERENCES `viloyat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of viloyat_translation
-- ----------------------------
INSERT INTO `viloyat_translation` VALUES (1, 1, 'uz', 'Andijon uz');
INSERT INTO `viloyat_translation` VALUES (2, 1, 'oz', 'Andijon kr');
INSERT INTO `viloyat_translation` VALUES (3, 1, 'ru', 'Andijon ru');
INSERT INTO `viloyat_translation` VALUES (4, 1, 'en', 'Andijon en');
INSERT INTO `viloyat_translation` VALUES (5, 2, 'uz', 'Buxoro uz');
INSERT INTO `viloyat_translation` VALUES (6, 2, 'oz', 'Buxoro kr');
INSERT INTO `viloyat_translation` VALUES (7, 2, 'ru', 'Buxoro ru');
INSERT INTO `viloyat_translation` VALUES (8, 2, 'en', 'Buxoro en');

-- ----------------------------
-- Table structure for widget_items
-- ----------------------------
DROP TABLE IF EXISTS `widget_items`;
CREATE TABLE `widget_items`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `parent_id` int(11) NULL DEFAULT NULL,
  `widgets_text_id` int(11) NULL DEFAULT NULL,
  `status` smallint(6) NULL DEFAULT 0,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `og_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `detail_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `sort_index` int(11) NULL DEFAULT NULL,
  `urlcount` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '0',
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_widget_items_parent_id`(`parent_id`) USING BTREE,
  INDEX `fk_widget_items_widgets_text_id`(`widgets_text_id`) USING BTREE,
  CONSTRAINT `fk_widget_items_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `widget_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_widget_items_widgets_text_id` FOREIGN KEY (`widgets_text_id`) REFERENCES `widgets_text` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for widget_items_translation
-- ----------------------------
DROP TABLE IF EXISTS `widget_items_translation`;
CREATE TABLE `widget_items_translation`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `widget_items_id` int(11) NULL DEFAULT NULL,
  `language` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_widget_items_translation_slider_items`(`widget_items_id`) USING BTREE,
  CONSTRAINT `fk_widget_items_translation_slider_items` FOREIGN KEY (`widget_items_id`) REFERENCES `widget_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for widget_text_translation
-- ----------------------------
DROP TABLE IF EXISTS `widget_text_translation`;
CREATE TABLE `widget_text_translation`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `widget_text_id` int(11) NULL DEFAULT NULL,
  `language` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `extra3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_widget_text_translation_slider_items`(`widget_text_id`) USING BTREE,
  CONSTRAINT `fk_widget_text_translation_slider_items` FOREIGN KEY (`widget_text_id`) REFERENCES `widgets_text` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for widgets_text
-- ----------------------------
DROP TABLE IF EXISTS `widgets_text`;
CREATE TABLE `widgets_text`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NULL DEFAULT 0,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `og_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `detail_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `sort_index` int(11) NULL DEFAULT NULL,
  `urlcount` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '0',
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
