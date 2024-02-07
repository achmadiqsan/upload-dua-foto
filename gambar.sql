/*
 Navicat Premium Data Transfer

 Source Server         : locahost_xampp8
 Source Server Type    : MySQL
 Source Server Version : 100428
 Source Host           : localhost:3306
 Source Schema         : employe

 Target Server Type    : MySQL
 Target Server Version : 100428
 File Encoding         : 65001

 Date: 08/02/2024 07:29:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for gambar
-- ----------------------------
DROP TABLE IF EXISTS `gambar`;
CREATE TABLE `gambar`  (
  `foto1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gambar
-- ----------------------------
INSERT INTO `gambar` VALUES ('570-AHMAD.jpg', '570-DANNY.jpg');

SET FOREIGN_KEY_CHECKS = 1;
