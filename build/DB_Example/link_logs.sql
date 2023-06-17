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

 Date: 17/06/2023 12:42:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for link_logs
-- ----------------------------
DROP TABLE IF EXISTS `link_logs`;
CREATE TABLE `link_logs`  (
  `radif` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `url` varchar(2500) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `operation` varchar(500) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `time` varchar(20) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  PRIMARY KEY (`radif`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 258817 CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
