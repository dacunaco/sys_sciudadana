/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : sys_sciudadana

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2013-10-27 20:07:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ci_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------
INSERT INTO `ci_sessions` VALUES ('3b0db4b15cde9c3587cb9446ccb46d53', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.101 Safari/537.36', '1382921920', 'a:1:{s:9:\"user_data\";a:8:{s:7:\"user_id\";s:1:\"1\";s:9:\"user_nick\";s:5:\"admin\";s:11:\"user_perfil\";s:1:\"1\";s:8:\"user_dni\";s:8:\"47850032\";s:9:\"user_name\";s:12:\"DAVIS BRETTS\";s:13:\"user_lastname\";s:14:\"ACUÑA CORDOVA\";s:8:\"user_sex\";s:1:\"M\";s:9:\"user_foto\";s:0:\"\";}}');

-- ----------------------------
-- Table structure for `cuadrante`
-- ----------------------------
DROP TABLE IF EXISTS `cuadrante`;
CREATE TABLE `cuadrante` (
  `idcuadrante` char(11) NOT NULL,
  `strnombrecuadrante` varchar(100) NOT NULL,
  `idzona` char(11) NOT NULL,
  PRIMARY KEY (`idcuadrante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cuadrante
-- ----------------------------

-- ----------------------------
-- Table structure for `detalle_incidente`
-- ----------------------------
DROP TABLE IF EXISTS `detalle_incidente`;
CREATE TABLE `detalle_incidente` (
  `iddetalleincidente` char(11) NOT NULL,
  `strestadodetalleincidente` char(1) NOT NULL,
  `straccion` varchar(500) NOT NULL,
  `datfechahoradetalleincidente` datetime NOT NULL,
  `idincidente` char(11) NOT NULL,
  PRIMARY KEY (`iddetalleincidente`),
  KEY `detalle_incidente_incidente_fk` (`idincidente`),
  CONSTRAINT `detalle_incidente_incidente_fk` FOREIGN KEY (`idincidente`) REFERENCES `incidente` (`idincidente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of detalle_incidente
-- ----------------------------

-- ----------------------------
-- Table structure for `distrito`
-- ----------------------------
DROP TABLE IF EXISTS `distrito`;
CREATE TABLE `distrito` (
  `iddistrito` char(11) NOT NULL,
  `strnombredistrito` varchar(50) NOT NULL,
  `idprovincia` char(11) NOT NULL,
  `idregion` char(11) NOT NULL,
  KEY `distrito_provincia_fk` (`idprovincia`),
  KEY `distrito_region_fk` (`idregion`),
  KEY `iddistrito` (`iddistrito`),
  CONSTRAINT `distrito_region_fk` FOREIGN KEY (`idregion`) REFERENCES `region` (`idregion`),
  CONSTRAINT `distrito_provincia_fk` FOREIGN KEY (`idprovincia`) REFERENCES `provincia` (`idprovincia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of distrito
-- ----------------------------

-- ----------------------------
-- Table structure for `entidad`
-- ----------------------------
DROP TABLE IF EXISTS `entidad`;
CREATE TABLE `entidad` (
  `identidad` char(11) NOT NULL,
  `strnombreentidad` varchar(100) NOT NULL,
  `strcodigoentidad` varchar(50) NOT NULL,
  PRIMARY KEY (`identidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of entidad
-- ----------------------------

-- ----------------------------
-- Table structure for `incidente`
-- ----------------------------
DROP TABLE IF EXISTS `incidente`;
CREATE TABLE `incidente` (
  `idincidente` char(11) NOT NULL,
  `strdescripcionincidente` longtext NOT NULL,
  `strcoordenadasincidente` varchar(100) NOT NULL,
  `strestadoincidente` char(1) NOT NULL,
  `datfechahoraincidente` datetime NOT NULL,
  `strefectivoincidente` varchar(100) NOT NULL,
  `datfechahoraregistroincidente` datetime NOT NULL,
  `imgincidente` varchar(100) NOT NULL,
  `idzona` char(11) NOT NULL,
  `identidad` char(11) NOT NULL,
  `idpersonal` char(11) NOT NULL,
  `idtipoincidente` char(11) NOT NULL,
  PRIMARY KEY (`idincidente`),
  KEY `incidente_zona_fk` (`idzona`),
  KEY `incidente_entidad_fk` (`identidad`),
  KEY `incidente_personal_fk` (`idpersonal`),
  KEY `incidente_tipo_incidente_fk` (`idtipoincidente`),
  CONSTRAINT `incidente_tipo_incidente_fk` FOREIGN KEY (`idtipoincidente`) REFERENCES `tipo_incidente` (`idtipoincidente`),
  CONSTRAINT `incidente_entidad_fk` FOREIGN KEY (`identidad`) REFERENCES `entidad` (`identidad`),
  CONSTRAINT `incidente_personal_fk` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idpersonal`),
  CONSTRAINT `incidente_zona_fk` FOREIGN KEY (`idzona`) REFERENCES `zona` (`idzona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of incidente
-- ----------------------------

-- ----------------------------
-- Table structure for `perfil_usuario`
-- ----------------------------
DROP TABLE IF EXISTS `perfil_usuario`;
CREATE TABLE `perfil_usuario` (
  `idperfilusuario` int(11) NOT NULL AUTO_INCREMENT,
  `perfilusuario` varchar(50) NOT NULL,
  PRIMARY KEY (`idperfilusuario`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of perfil_usuario
-- ----------------------------
INSERT INTO `perfil_usuario` VALUES ('1', 'ADMINISTRADOR');
INSERT INTO `perfil_usuario` VALUES ('2', 'USUARIO');
INSERT INTO `perfil_usuario` VALUES ('3', 'CONTRIBUYENTE');

-- ----------------------------
-- Table structure for `personal`
-- ----------------------------
DROP TABLE IF EXISTS `personal`;
CREATE TABLE `personal` (
  `idpersonal` char(11) NOT NULL,
  `strnombres` varchar(100) NOT NULL,
  `strapellidopaterno` varchar(50) NOT NULL,
  `strapellidomaterno` varchar(50) NOT NULL,
  `strdni` char(8) NOT NULL,
  `strsexo` char(1) NOT NULL,
  `datfechanacimiento` datetime NOT NULL,
  `strcodigo` varchar(10) NOT NULL,
  PRIMARY KEY (`idpersonal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of personal
-- ----------------------------

-- ----------------------------
-- Table structure for `provincia`
-- ----------------------------
DROP TABLE IF EXISTS `provincia`;
CREATE TABLE `provincia` (
  `idprovincia` char(11) NOT NULL,
  `strnombreprovincia` varchar(50) NOT NULL,
  `idregion` char(11) NOT NULL,
  PRIMARY KEY (`idprovincia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of provincia
-- ----------------------------

-- ----------------------------
-- Table structure for `region`
-- ----------------------------
DROP TABLE IF EXISTS `region`;
CREATE TABLE `region` (
  `idregion` char(11) NOT NULL,
  `strnombreregion` varchar(50) NOT NULL,
  PRIMARY KEY (`idregion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of region
-- ----------------------------

-- ----------------------------
-- Table structure for `tipo_incidente`
-- ----------------------------
DROP TABLE IF EXISTS `tipo_incidente`;
CREATE TABLE `tipo_incidente` (
  `idtipoincidente` char(11) NOT NULL,
  `strtipoincidente` varchar(50) NOT NULL,
  `imgtipoincidente` varchar(100) NOT NULL,
  PRIMARY KEY (`idtipoincidente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipo_incidente
-- ----------------------------

-- ----------------------------
-- Table structure for `urbanizacion`
-- ----------------------------
DROP TABLE IF EXISTS `urbanizacion`;
CREATE TABLE `urbanizacion` (
  `idurbanizacion` char(11) NOT NULL,
  `strnombreurbanizacion` varchar(100) NOT NULL,
  `idcuadrante` char(11) NOT NULL,
  `idzona` char(11) NOT NULL,
  PRIMARY KEY (`idurbanizacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of urbanizacion
-- ----------------------------

-- ----------------------------
-- Table structure for `usuario`
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `dni` char(8) NOT NULL,
  `sexo` char(1) NOT NULL,
  `foto` longtext NOT NULL,
  `idperfilusuario` int(11) NOT NULL,
  `estado` char(1) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', 'admin', 'rl6JW-Jg3YjSl-FcgJvFdOWsslsR9Kp_lft3cxWIO3Y', 'DAVIS BRETTS', 'ACUÑA CORDOVA', '47850032', 'M', '', '1', '1');

-- ----------------------------
-- Table structure for `zona`
-- ----------------------------
DROP TABLE IF EXISTS `zona`;
CREATE TABLE `zona` (
  `idzona` char(11) NOT NULL,
  `strnombrezona` varchar(100) NOT NULL,
  `iddistrito` char(11) NOT NULL,
  `idprovincia` char(11) NOT NULL,
  `idregion` char(11) NOT NULL,
  PRIMARY KEY (`idzona`),
  KEY `zona_distrito_fk` (`iddistrito`),
  KEY `zona_provincia_fk` (`idprovincia`),
  KEY `zona_region_fk` (`idregion`),
  CONSTRAINT `zona_region_fk` FOREIGN KEY (`idregion`) REFERENCES `region` (`idregion`),
  CONSTRAINT `zona_distrito_fk` FOREIGN KEY (`iddistrito`) REFERENCES `distrito` (`iddistrito`),
  CONSTRAINT `zona_provincia_fk` FOREIGN KEY (`idprovincia`) REFERENCES `provincia` (`idprovincia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zona
-- ----------------------------
