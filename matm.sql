/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100128
 Source Host           : localhost:3306
 Source Schema         : matm

 Target Server Type    : MySQL
 Target Server Version : 100128
 File Encoding         : 65001

 Date: 27/07/2020 19:34:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for dt_diag_klsf
-- ----------------------------
DROP TABLE IF EXISTS `dt_diag_klsf`;
CREATE TABLE `dt_diag_klsf`  (
  `id_diag` int(64) NOT NULL AUTO_INCREMENT,
  `id_pasien` varchar(125) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tp_diag` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kls_antm` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ket_antm` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kls_rwyt` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_hiv` int(10) NULL DEFAULT NULL,
  `create_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_diag`) USING BTREE,
  INDEX `diag_pasien`(`id_pasien`) USING BTREE,
  CONSTRAINT `diag_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `dt_pasien` (`id_pasien`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dt_diag_klsf
-- ----------------------------
INSERT INTO `dt_diag_klsf` VALUES (1, 'f0ca9be1', '1', '1', 'ginjal', '1', 1, '2020-04-21 17:17:28', '2020-04-21 17:17:28');

-- ----------------------------
-- Table structure for dt_obat
-- ----------------------------
DROP TABLE IF EXISTS `dt_obat`;
CREATE TABLE `dt_obat`  (
  `id_obat` int(64) NOT NULL AUTO_INCREMENT,
  `id_proses` int(24) NULL DEFAULT NULL,
  `panduan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bentuk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sumber` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `batch` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dosis` int(10) NULL DEFAULT NULL,
  `dosis_minum` int(10) NULL DEFAULT NULL,
  `tgl_pemberian` datetime(0) NULL DEFAULT NULL,
  `create_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_obat`) USING BTREE,
  INDEX `obat_proses`(`id_proses`) USING BTREE,
  CONSTRAINT `obat_proses` FOREIGN KEY (`id_proses`) REFERENCES `dt_proses` (`id_proses`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dt_obat
-- ----------------------------
INSERT INTO `dt_obat` VALUES (1, 1, '1', '1', '1', '9725mvsaifd8036', 7, 1, '2020-07-18 00:00:00', '2020-07-18 10:35:57', '2020-07-18 10:35:57');
INSERT INTO `dt_obat` VALUES (2, 1, '0', '0', '2', 'ouwgfouwe289521984', 10, 2, '2020-07-15 00:00:00', '2020-07-18 10:39:41', '2020-07-18 10:39:41');

-- ----------------------------
-- Table structure for dt_pasien
-- ----------------------------
DROP TABLE IF EXISTS `dt_pasien`;
CREATE TABLE `dt_pasien`  (
  `id_pasien` varchar(125) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nik_pasien` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nm_pasien` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jns_klm` int(10) NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `is_hamil` int(10) NULL DEFAULT NULL,
  `tgl_lahir` datetime(6) NULL DEFAULT NULL,
  `umr_thn` int(16) NULL DEFAULT NULL,
  `umr_bln` int(16) NULL DEFAULT NULL,
  `brt_bdn` int(16) NULL DEFAULT NULL,
  `tg_bdn` int(16) NULL DEFAULT NULL,
  `telp` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `parut_bcg` int(2) NULL DEFAULT NULL,
  `skor_anak` int(10) NULL DEFAULT NULL,
  `create_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_pasien`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dt_pasien
-- ----------------------------
INSERT INTO `dt_pasien` VALUES ('f0ca9be1', '3521035408940001', 'Erlyan', 2, 'tinalan', 1, '1995-04-19 00:00:00.000000', 25, 10, 76, 170, '082213343435', 1, 0, '2020-03-23 19:47:33', '2020-03-23 19:47:33');

-- ----------------------------
-- Table structure for dt_pemeriksaan
-- ----------------------------
DROP TABLE IF EXISTS `dt_pemeriksaan`;
CREATE TABLE `dt_pemeriksaan`  (
  `id_periksa` int(64) NOT NULL AUTO_INCREMENT,
  `id_proses` int(24) NULL DEFAULT NULL,
  `tgl_periksa` datetime(0) NULL DEFAULT NULL,
  `noreg` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis` varchar(125) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nilai` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ket` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `create_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_periksa`) USING BTREE,
  INDEX `proses_pemeriksaan`(`id_proses`) USING BTREE,
  CONSTRAINT `proses_pemeriksaan` FOREIGN KEY (`id_proses`) REFERENCES `dt_proses` (`id_proses`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dt_pemeriksaan
-- ----------------------------
INSERT INTO `dt_pemeriksaan` VALUES (1, 1, '2020-07-24 00:00:00', '3714814-91lsdf', '0', '10', 'dahak nya banyak', '2020-07-18 11:43:21', '2020-07-18 11:43:21');

-- ----------------------------
-- Table structure for dt_pmo
-- ----------------------------
DROP TABLE IF EXISTS `dt_pmo`;
CREATE TABLE `dt_pmo`  (
  `id_pmo` varchar(125) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nik_pmo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nm_pmo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jns_klm` int(10) NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `telp` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kota` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `prop` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `faskes` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `regtb03f` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `regtb03kt` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `create_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_pmo`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dt_pmo
-- ----------------------------
INSERT INTO `dt_pmo` VALUES ('7fffffff', '3571203983027490', 'Erlian', 2, 'purwoasri', '085736421099', 'Kab. Kediri', 'Jawa Timur', 'Puskesmas Pesantren', '1234567', '1232141', '2020-06-25 20:17:31', '2020-06-25 20:17:31');

-- ----------------------------
-- Table structure for dt_proses
-- ----------------------------
DROP TABLE IF EXISTS `dt_proses`;
CREATE TABLE `dt_proses`  (
  `id_proses` int(24) NOT NULL AUTO_INCREMENT,
  `id_pasien` varchar(125) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bulan` varchar(125) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tahap` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_mulai` datetime(0) NULL DEFAULT NULL,
  `tgl_selesai` datetime(0) NULL DEFAULT NULL,
  `create_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_proses`) USING BTREE,
  INDEX `pasien_proses`(`id_pasien`) USING BTREE,
  CONSTRAINT `pasien_proses` FOREIGN KEY (`id_pasien`) REFERENCES `dt_pasien` (`id_pasien`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dt_proses
-- ----------------------------
INSERT INTO `dt_proses` VALUES (1, 'f0ca9be1', '0', '0', '4', '2020-06-27 00:00:00', '2020-07-30 00:00:00', '2020-06-27 15:55:39', '2020-06-27 15:55:39');

-- ----------------------------
-- Table structure for dt_relasi_pasien_pmo
-- ----------------------------
DROP TABLE IF EXISTS `dt_relasi_pasien_pmo`;
CREATE TABLE `dt_relasi_pasien_pmo`  (
  `id_pmo` varchar(125) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_pasien` varchar(125) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dt_thpan
-- ----------------------------
DROP TABLE IF EXISTS `dt_thpan`;
CREATE TABLE `dt_thpan`  (
  `id_thp` int(64) NOT NULL AUTO_INCREMENT,
  `id_obat` int(64) NULL DEFAULT NULL,
  `id_proses` int(24) NULL DEFAULT NULL,
  `hari` int(10) NULL DEFAULT NULL,
  `sisa_obat` int(10) NULL DEFAULT NULL,
  `ket` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `create_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_thp`) USING BTREE,
  INDEX `proses_tahapan`(`id_proses`) USING BTREE,
  CONSTRAINT `proses_tahapan` FOREIGN KEY (`id_proses`) REFERENCES `dt_proses` (`id_proses`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES (1, 'admin', 'Administrator');
INSERT INTO `groups` VALUES (2, 'members', 'General User');

-- ----------------------------
-- Table structure for login_attempts
-- ----------------------------
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `login` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` int(11) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(254) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `activation_selector` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activation_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `forgotten_password_selector` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `forgotten_password_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED NULL DEFAULT NULL,
  `remember_selector` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `remember_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED NULL DEFAULT NULL,
  `active` tinyint(1) UNSIGNED NULL DEFAULT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `company` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `uc_email`(`email`) USING BTREE,
  UNIQUE INDEX `uc_activation_selector`(`activation_selector`) USING BTREE,
  UNIQUE INDEX `uc_forgotten_password_selector`(`forgotten_password_selector`) USING BTREE,
  UNIQUE INDEX `uc_remember_selector`(`remember_selector`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, '127.0.0.1', 'administrator', '$2y$12$Hxp3YHHbG0x2KSQY9v80oucl75BOmrQ8DpX86CNhCL8U5us7caq36', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1595841248, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- ----------------------------
-- Table structure for users_groups
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `uc_users_groups`(`user_id`, `group_id`) USING BTREE,
  INDEX `fk_users_groups_users1_idx`(`user_id`) USING BTREE,
  INDEX `fk_users_groups_groups1_idx`(`group_id`) USING BTREE,
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users_groups
-- ----------------------------
INSERT INTO `users_groups` VALUES (1, 1, 1);
INSERT INTO `users_groups` VALUES (2, 1, 2);

SET FOREIGN_KEY_CHECKS = 1;
