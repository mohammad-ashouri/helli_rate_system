/*
 Navicat Premium Data Transfer

 Source Server         : helli_helli-info
 Source Server Type    : MySQL
 Source Server Version : 50740 (5.7.40-log)
 Source Host           : 172.30.0.66:3306
 Source Schema         : helli_helli-info

 Target Server Type    : MySQL
 Target Server Version : 50740 (5.7.40-log)
 File Encoding         : 65001

 Date: 17/06/2023 12:41:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for log_helli
-- ----------------------------
DROP TABLE IF EXISTS `log_helli`;
CREATE TABLE `log_helli`  (
  `radif` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `login_year` int(11) NULL DEFAULT NULL,
  `login_month` int(11) NULL DEFAULT NULL,
  `login_day` int(11) NULL DEFAULT NULL,
  `login_hour` int(11) NULL DEFAULT NULL,
  `login_minute` int(11) NULL DEFAULT NULL,
  `login_second` int(11) NULL DEFAULT NULL,
  `logout_year` int(11) NULL DEFAULT NULL,
  `logout_month` int(11) NULL DEFAULT NULL,
  `logout_day` int(11) NULL DEFAULT NULL,
  `logout_hour` int(11) NULL DEFAULT NULL,
  `logout_minute` int(11) NULL DEFAULT NULL,
  `logout_second` int(11) NULL DEFAULT NULL,
  `ip_address` varchar(20) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `browser_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `browser_version` varchar(5) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  PRIMARY KEY (`radif`) USING BTREE,
  UNIQUE INDEX `radif`(`radif`) USING BTREE,
  INDEX `username`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29288 CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
