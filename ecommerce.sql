/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100406
 Source Host           : localhost:3306
 Source Schema         : ecommerce

 Target Server Type    : MySQL
 Target Server Version : 100406
 File Encoding         : 65001

 Date: 04/11/2019 19:01:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang`  (
  `kode` int(11) NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` float NOT NULL,
  `stock` int(11) NOT NULL,
  `file_gambar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `berat` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`kode`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of barang
-- ----------------------------
INSERT INTO `barang` VALUES (1, 'Adidas Sport BM11CX White Shoes', 800000, 0, '1.jpg', '-', 500);
INSERT INTO `barang` VALUES (2, 'Adidas Sport BM11CX Black Shoes', 700000, -5, '2.jpg', '-', 650);
INSERT INTO `barang` VALUES (3, 'Adidas Sport BM11CX Red Shoes', 800000, 5, '1.jpg', '-', 550);
INSERT INTO `barang` VALUES (4, 'Adidas Sport BM11CX Blue Shoes', 700000, 0, '2.jpg', '-', 300);

-- ----------------------------
-- Table structure for jual
-- ----------------------------
DROP TABLE IF EXISTS `jual`;
CREATE TABLE `jual`  (
  `NoPenjualan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `KodeBarang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `JumlahJual` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `HargaJual` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  UNIQUE INDEX `U_JUAL`(`NoPenjualan`, `KodeBarang`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jual
-- ----------------------------
INSERT INTO `jual` VALUES ('2a75d0ae60d6f', '2', '1', '700000');
INSERT INTO `jual` VALUES ('ec2b83da756514a', '2', '1', '700000');
INSERT INTO `jual` VALUES ('ec2b83da756514a', '3', '2', '800000');
INSERT INTO `jual` VALUES ('ca3171f96bdfe17', '2', '1', '700000');
INSERT INTO `jual` VALUES ('ca3171f96bdfe17', '3', '2', '800000');

-- ----------------------------
-- Table structure for penjualan
-- ----------------------------
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan`  (
  `NoPenjualan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Tanggal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Total` int(1) NULL DEFAULT NULL,
  `Nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `HP` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Kota` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `KodePos` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Ongkir` int(1) NULL DEFAULT NULL,
  `Provinsi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Kurir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ServiceKurir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  UNIQUE INDEX `U_PENJUALAN`(`NoPenjualan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penjualan
-- ----------------------------
INSERT INTO `penjualan` VALUES ('2a75d0ae60d6f', '2019-10-14 22:17:36', 749000, 'Ali Piqri Sopandi', '085123123', 'Komplek BSI', 'Kabupaten Berau', '77311', 'alipiqri2@gmail.com', 'Sedang Dikirim', 49000, 'Kalimantan Timur', 'jne', 'OKE');
INSERT INTO `penjualan` VALUES ('ca3171f96bdfe17', '2019-10-15 03:36:59', 2316000, 'Ali Piqri Sopandi', '085123123', 'Komplek BSI', 'Kabupaten Bandung', '40311', 'alipiqri2@gmail.com', 'Belum Bayar', 16000, 'Jawa Barat', 'jne', 'REG');
INSERT INTO `penjualan` VALUES ('ec2b83da756514a', '2019-10-15 03:35:22', 2364000, 'Ali Piqri Sopandi', '085123123', 'Komplek BSI', 'Kabupaten Muaro Jambi', '36311', 'alipiqri2@gmail.com', 'Belum Bayar', 64000, 'Jambi', 'jne', 'OKE');

SET FOREIGN_KEY_CHECKS = 1;
