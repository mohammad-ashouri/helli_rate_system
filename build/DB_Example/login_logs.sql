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

 Date: 17/06/2023 12:41:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for login_logs
-- ----------------------------
DROP TABLE IF EXISTS `login_logs`;
CREATE TABLE `login_logs`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `date_time` varchar(25) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `operation` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `IPAddress` varchar(40) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26975 CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
