/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : sys_sciudadana

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2013-12-02 11:59:17
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
INSERT INTO `ci_sessions` VALUES ('b2c16c97952da6135dace07f15fb2aa7', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', '1386003471', 'a:1:{s:9:\"user_data\";a:8:{s:7:\"user_id\";s:1:\"1\";s:9:\"user_nick\";s:5:\"admin\";s:11:\"user_perfil\";s:1:\"1\";s:8:\"user_dni\";s:8:\"40200737\";s:9:\"user_name\";s:13:\"CESAR EDUARDO\";s:13:\"user_lastname\";s:19:\"IRRIBARREN OTINIANO\";s:8:\"user_sex\";s:1:\"M\";s:9:\"user_foto\";s:0:\"\";}}');

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
INSERT INTO `cuadrante` VALUES ('CD000000001', 'Cuadrante 1', 'ZN000000001');
INSERT INTO `cuadrante` VALUES ('CD000000002', 'Cuadrante 2', 'ZN000000001');
INSERT INTO `cuadrante` VALUES ('CD000000003', 'Cuadrante 3', 'ZN000000002');

-- ----------------------------
-- Table structure for `departamento`
-- ----------------------------
DROP TABLE IF EXISTS `departamento`;
CREATE TABLE `departamento` (
  `IdDepartamento` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `IdPais` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`IdDepartamento`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of departamento
-- ----------------------------
INSERT INTO `departamento` VALUES ('dep00001', 'Amazonas', 'pai00001');
INSERT INTO `departamento` VALUES ('dep00002', 'Ancash', 'pai00001');
INSERT INTO `departamento` VALUES ('dep00003', 'Apurimac', 'pai00001');
INSERT INTO `departamento` VALUES ('dep00004', 'Arequipa', 'pai00001');
INSERT INTO `departamento` VALUES ('dep00005', 'Ayacucho', 'pai00001');
INSERT INTO `departamento` VALUES ('dep00006', 'Cajamarca', 'pai00001');
INSERT INTO `departamento` VALUES ('dep00007', 'Cusco', 'pai00001');
INSERT INTO `departamento` VALUES ('dep00008', 'Huanuco', 'pai00001');
INSERT INTO `departamento` VALUES ('dep00009', 'Huancavelica', 'pai00001');
INSERT INTO `departamento` VALUES ('dep00010', 'Ica', 'pai00001');
INSERT INTO `departamento` VALUES ('dep00011', 'Junin', 'pai00001');
INSERT INTO `departamento` VALUES ('dep00012', 'La Libertad', 'pai00001');
INSERT INTO `departamento` VALUES ('dep00013', 'Lambayeque', 'pai00001');
INSERT INTO `departamento` VALUES ('dep00014', 'Lima', 'pai00001');
INSERT INTO `departamento` VALUES ('dep00015', 'Loreto', 'pai00001');
INSERT INTO `departamento` VALUES ('dep00016', 'Madre de Dios', 'pai00001');
INSERT INTO `departamento` VALUES ('dep00017', 'Moquegua', 'pai00001');
INSERT INTO `departamento` VALUES ('dep00018', 'Pasco', 'pai00001');
INSERT INTO `departamento` VALUES ('dep00019', 'Piura', 'pai00001');
INSERT INTO `departamento` VALUES ('dep00020', 'Puno', 'pai00001');
INSERT INTO `departamento` VALUES ('dep00021', 'San Martin', 'pai00001');
INSERT INTO `departamento` VALUES ('dep00022', 'Tacna', 'pai00001');
INSERT INTO `departamento` VALUES ('dep00023', 'Tumbes', 'pai00001');
INSERT INTO `departamento` VALUES ('dep00024', 'Ucayali', 'pai00001');

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
INSERT INTO `detalle_incidente` VALUES ('DI000000001', 'P', 'asdsad', '2013-12-01 10:51:21', 'IN000000001');
INSERT INTO `detalle_incidente` VALUES ('DI000000002', 'P', 'sadsadasd', '2013-12-01 11:27:28', 'IN000000002');
INSERT INTO `detalle_incidente` VALUES ('DI000000003', 'P', 'sadsadsad', '2013-12-02 11:28:32', 'IN000000002');
INSERT INTO `detalle_incidente` VALUES ('DI000000004', 'C', 'sadsadsad1234qweq12213213', '2013-12-02 11:28:32', 'IN000000002');
INSERT INTO `detalle_incidente` VALUES ('DI000000005', 'P', '213sadasd', '2013-12-01 11:32:56', 'IN000000001');

-- ----------------------------
-- Table structure for `distrito`
-- ----------------------------
DROP TABLE IF EXISTS `distrito`;
CREATE TABLE `distrito` (
  `IdDistrito` char(8) NOT NULL,
  `Nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `IdProvincia` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`IdDistrito`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of distrito
-- ----------------------------
INSERT INTO `distrito` VALUES ('dis00001', 'Chachapoyas', 'pro00001');
INSERT INTO `distrito` VALUES ('dis00002', 'Asuncion', 'pro00001');
INSERT INTO `distrito` VALUES ('dis00003', 'Balsas', 'pro00001');
INSERT INTO `distrito` VALUES ('dis00004', 'Cheto', 'pro00001');
INSERT INTO `distrito` VALUES ('dis00005', 'Chiliquin', 'pro00001');
INSERT INTO `distrito` VALUES ('dis00006', 'Chuquibamba', 'pro00001');
INSERT INTO `distrito` VALUES ('dis00007', 'Granada', 'pro00001');
INSERT INTO `distrito` VALUES ('dis00008', 'Huancas', 'pro00001');
INSERT INTO `distrito` VALUES ('dis00009', 'La Jalca', 'pro00001');
INSERT INTO `distrito` VALUES ('dis00010', 'Leimebamba', 'pro00001');
INSERT INTO `distrito` VALUES ('dis00011', 'Levanto', 'pro00001');
INSERT INTO `distrito` VALUES ('dis00012', 'Magdalena', 'pro00001');
INSERT INTO `distrito` VALUES ('dis00013', 'Mariscal Castilla', 'pro00001');
INSERT INTO `distrito` VALUES ('dis00014', 'Molinopampa', 'pro00001');
INSERT INTO `distrito` VALUES ('dis00015', 'Montevideo', 'pro00001');
INSERT INTO `distrito` VALUES ('dis00016', 'Olleros', 'pro00001');
INSERT INTO `distrito` VALUES ('dis00017', 'Quinjalca', 'pro00001');
INSERT INTO `distrito` VALUES ('dis00018', 'San Francisco de Daguas', 'pro00001');
INSERT INTO `distrito` VALUES ('dis00019', 'San Isidro de Maino', 'pro00001');
INSERT INTO `distrito` VALUES ('dis00020', 'Soloco', 'pro00001');
INSERT INTO `distrito` VALUES ('dis00021', 'Sonche', 'pro00001');
INSERT INTO `distrito` VALUES ('dis00022', 'Lla Peca', 'pro00002');
INSERT INTO `distrito` VALUES ('dis00023', 'Aramango', 'pro00002');
INSERT INTO `distrito` VALUES ('dis00024', 'Copallin', 'pro00002');
INSERT INTO `distrito` VALUES ('dis00025', 'El Parco', 'pro00002');
INSERT INTO `distrito` VALUES ('dis00026', 'Imaza', 'pro00002');
INSERT INTO `distrito` VALUES ('dis00027', 'Jumbilla', 'pro00003');
INSERT INTO `distrito` VALUES ('dis00028', 'Chisquilla', 'pro00003');
INSERT INTO `distrito` VALUES ('dis00029', 'Churuja', 'pro00003');
INSERT INTO `distrito` VALUES ('dis00030', 'Corosha', 'pro00003');
INSERT INTO `distrito` VALUES ('dis00031', 'Cuispes', 'pro00003');
INSERT INTO `distrito` VALUES ('dis00032', 'Florida', 'pro00003');
INSERT INTO `distrito` VALUES ('dis00033', 'Jazan', 'pro00003');
INSERT INTO `distrito` VALUES ('dis00034', 'Recta', 'pro00003');
INSERT INTO `distrito` VALUES ('dis00035', 'San Carlos', 'pro00003');
INSERT INTO `distrito` VALUES ('dis00036', 'Shipasbamba', 'pro00003');
INSERT INTO `distrito` VALUES ('dis00037', 'Valera', 'pro00003');
INSERT INTO `distrito` VALUES ('dis00038', 'Yambrasbamba', 'pro00003');
INSERT INTO `distrito` VALUES ('dis00039', 'Nieva', 'pro00004');
INSERT INTO `distrito` VALUES ('dis00040', 'El Cenepa', 'pro00004');
INSERT INTO `distrito` VALUES ('dis00041', 'Rio Santiago', 'pro00004');
INSERT INTO `distrito` VALUES ('dis00042', 'Lamud', 'pro00005');
INSERT INTO `distrito` VALUES ('dis00043', 'Camporredondo', 'pro00005');
INSERT INTO `distrito` VALUES ('dis00044', 'Cocabamba', 'pro00005');
INSERT INTO `distrito` VALUES ('dis00045', 'Colcamar', 'pro00005');
INSERT INTO `distrito` VALUES ('dis00046', 'Conila', 'pro00005');
INSERT INTO `distrito` VALUES ('dis00047', 'Inguilpata', 'pro00005');
INSERT INTO `distrito` VALUES ('dis00048', 'Longuita', 'pro00005');
INSERT INTO `distrito` VALUES ('dis00049', 'Lonya Chico', 'pro00005');
INSERT INTO `distrito` VALUES ('dis00050', 'Luya', 'pro00005');
INSERT INTO `distrito` VALUES ('dis00051', 'Luya Viejo', 'pro00005');
INSERT INTO `distrito` VALUES ('dis00052', 'Maria', 'pro00005');
INSERT INTO `distrito` VALUES ('dis00053', 'Ocalli', 'pro00005');
INSERT INTO `distrito` VALUES ('dis00054', 'Ocumal', 'pro00005');
INSERT INTO `distrito` VALUES ('dis00055', 'Pisuquia', 'pro00005');
INSERT INTO `distrito` VALUES ('dis00056', 'Providencia', 'pro00005');
INSERT INTO `distrito` VALUES ('dis00057', 'San Cristobal', 'pro00005');
INSERT INTO `distrito` VALUES ('dis00058', 'San Francisco Del Yeso', 'pro00005');
INSERT INTO `distrito` VALUES ('dis00059', 'San Jeronimo', 'pro00005');
INSERT INTO `distrito` VALUES ('dis00060', 'San Juan De Lopecancha', 'pro00005');
INSERT INTO `distrito` VALUES ('dis00061', 'Santa Catalina', 'pro00005');
INSERT INTO `distrito` VALUES ('dis00062', 'Santo Tomas', 'pro00005');
INSERT INTO `distrito` VALUES ('dis00063', 'Tingo', 'pro00005');
INSERT INTO `distrito` VALUES ('dis00064', 'Trita', 'pro00005');
INSERT INTO `distrito` VALUES ('dis00065', 'San Nicolas', 'pro00006');
INSERT INTO `distrito` VALUES ('dis00066', 'Chirimoto', 'pro00006');
INSERT INTO `distrito` VALUES ('dis00067', 'Cochamal', 'pro00006');
INSERT INTO `distrito` VALUES ('dis00068', 'Huambo', 'pro00006');
INSERT INTO `distrito` VALUES ('dis00069', 'Limabamba', 'pro00006');
INSERT INTO `distrito` VALUES ('dis00070', 'Longar', 'pro00006');
INSERT INTO `distrito` VALUES ('dis00071', 'Mariscal Benavides', 'pro00006');
INSERT INTO `distrito` VALUES ('dis00072', 'Milpuc', 'pro00006');
INSERT INTO `distrito` VALUES ('dis00073', 'Omia', 'pro00006');
INSERT INTO `distrito` VALUES ('dis00074', 'Santa Rosa', 'pro00006');
INSERT INTO `distrito` VALUES ('dis00075', 'Totora', 'pro00006');
INSERT INTO `distrito` VALUES ('dis00076', 'Vista Alegre', 'pro00006');
INSERT INTO `distrito` VALUES ('dis00077', 'Bagua Grande', 'pro00007');
INSERT INTO `distrito` VALUES ('dis00078', 'Cajaruro', 'pro00007');
INSERT INTO `distrito` VALUES ('dis00079', 'Cumba', 'pro00007');
INSERT INTO `distrito` VALUES ('dis00080', 'El Milagro', 'pro00007');
INSERT INTO `distrito` VALUES ('dis00081', 'Jamalca', 'pro00007');
INSERT INTO `distrito` VALUES ('dis00082', 'Lonya Grande', 'pro00007');
INSERT INTO `distrito` VALUES ('dis00083', 'Yamon', 'pro00007');
INSERT INTO `distrito` VALUES ('dis00084', 'Huaraz', 'pro00008');
INSERT INTO `distrito` VALUES ('dis00085', 'Cochabamba', 'pro00008');
INSERT INTO `distrito` VALUES ('dis00086', 'Colcabamba', 'pro00008');
INSERT INTO `distrito` VALUES ('dis00087', 'Huanchay', 'pro00008');
INSERT INTO `distrito` VALUES ('dis00088', 'Jangas', 'pro00008');
INSERT INTO `distrito` VALUES ('dis00089', 'La Libertad', 'pro00008');
INSERT INTO `distrito` VALUES ('dis00090', 'Olleros', 'pro00008');
INSERT INTO `distrito` VALUES ('dis00091', 'Pampas', 'pro00008');
INSERT INTO `distrito` VALUES ('dis00092', 'Pariacoto', 'pro00008');
INSERT INTO `distrito` VALUES ('dis00093', 'Pira', 'pro00008');
INSERT INTO `distrito` VALUES ('dis00094', 'Tarica', 'pro00008');
INSERT INTO `distrito` VALUES ('dis00095', 'Independencia', 'pro00008');
INSERT INTO `distrito` VALUES ('dis00096', 'Aija', 'pro00009');
INSERT INTO `distrito` VALUES ('dis00097', 'Coris', 'pro00009');
INSERT INTO `distrito` VALUES ('dis00098', 'Huacllan', 'pro00009');
INSERT INTO `distrito` VALUES ('dis00099', 'La Merced', 'pro00009');
INSERT INTO `distrito` VALUES ('dis00100', 'Succha', 'pro00009');
INSERT INTO `distrito` VALUES ('dis00101', 'Llamellin', 'pro00010');
INSERT INTO `distrito` VALUES ('dis00102', 'Aczo', 'pro00010');
INSERT INTO `distrito` VALUES ('dis00103', 'Chaccho', 'pro00010');
INSERT INTO `distrito` VALUES ('dis00104', 'Chingas', 'pro00010');
INSERT INTO `distrito` VALUES ('dis00105', 'Mirgas', 'pro00010');
INSERT INTO `distrito` VALUES ('dis00106', 'San Juan De Rontoy', 'pro00010');
INSERT INTO `distrito` VALUES ('dis00107', 'Chacas', 'pro00011');
INSERT INTO `distrito` VALUES ('dis00108', 'Acochaca', 'pro00011');
INSERT INTO `distrito` VALUES ('dis00109', 'Chiquian', 'pro00012');
INSERT INTO `distrito` VALUES ('dis00110', 'Abelardo Pardo Lezameta', 'pro00012');
INSERT INTO `distrito` VALUES ('dis00111', 'Antonio Raymondi', 'pro00012');
INSERT INTO `distrito` VALUES ('dis00112', 'Aquia', 'pro00012');
INSERT INTO `distrito` VALUES ('dis00113', 'Cajacay', 'pro00012');
INSERT INTO `distrito` VALUES ('dis00114', 'Canis', 'pro00012');
INSERT INTO `distrito` VALUES ('dis00115', 'Colquioc', 'pro00012');
INSERT INTO `distrito` VALUES ('dis00116', 'Huallanca', 'pro00012');
INSERT INTO `distrito` VALUES ('dis00117', 'Huasta', 'pro00012');
INSERT INTO `distrito` VALUES ('dis00118', 'Huayllacayan', 'pro00012');
INSERT INTO `distrito` VALUES ('dis00119', 'La Primavera', 'pro00012');
INSERT INTO `distrito` VALUES ('dis00120', 'Mangas', 'pro00012');
INSERT INTO `distrito` VALUES ('dis00121', 'Pacllon', 'pro00012');
INSERT INTO `distrito` VALUES ('dis00122', 'S. Mgel De Corpanqui', 'pro00012');
INSERT INTO `distrito` VALUES ('dis00123', 'Ticllos', 'pro00012');
INSERT INTO `distrito` VALUES ('dis00124', 'Carhuaz', 'pro00013');
INSERT INTO `distrito` VALUES ('dis00125', 'Acopampa', 'pro00013');
INSERT INTO `distrito` VALUES ('dis00126', 'Amashca', 'pro00013');
INSERT INTO `distrito` VALUES ('dis00127', 'Anta', 'pro00013');
INSERT INTO `distrito` VALUES ('dis00128', 'Ataquero', 'pro00013');
INSERT INTO `distrito` VALUES ('dis00129', 'Marcara', 'pro00013');
INSERT INTO `distrito` VALUES ('dis00130', 'Pariahuanca', 'pro00013');
INSERT INTO `distrito` VALUES ('dis00131', 'San Miguel De Aco', 'pro00013');
INSERT INTO `distrito` VALUES ('dis00132', 'Shilla', 'pro00013');
INSERT INTO `distrito` VALUES ('dis00133', 'Tinco', 'pro00013');
INSERT INTO `distrito` VALUES ('dis00134', 'Yungar', 'pro00013');
INSERT INTO `distrito` VALUES ('dis00135', 'San Luis', 'pro00014');
INSERT INTO `distrito` VALUES ('dis00136', 'San Nicolas', 'pro00014');
INSERT INTO `distrito` VALUES ('dis00137', 'Yauya', 'pro00014');
INSERT INTO `distrito` VALUES ('dis00138', 'Casma', 'pro00015');
INSERT INTO `distrito` VALUES ('dis00139', 'Buena Vista Alta', 'pro00015');
INSERT INTO `distrito` VALUES ('dis00140', 'Comandante Noel', 'pro00015');
INSERT INTO `distrito` VALUES ('dis00141', 'Yautan', 'pro00015');
INSERT INTO `distrito` VALUES ('dis00142', 'Corongo', 'pro00016');
INSERT INTO `distrito` VALUES ('dis00143', 'Aco', 'pro00016');
INSERT INTO `distrito` VALUES ('dis00144', 'Bambas', 'pro00016');
INSERT INTO `distrito` VALUES ('dis00145', 'Cusca', 'pro00016');
INSERT INTO `distrito` VALUES ('dis00146', 'La Pampa', 'pro00016');
INSERT INTO `distrito` VALUES ('dis00147', 'Yanac', 'pro00016');
INSERT INTO `distrito` VALUES ('dis00148', 'Yupan', 'pro00016');
INSERT INTO `distrito` VALUES ('dis00149', 'Huari', 'pro00017');
INSERT INTO `distrito` VALUES ('dis00150', 'Anra', 'pro00017');
INSERT INTO `distrito` VALUES ('dis00151', 'Cajay', 'pro00017');
INSERT INTO `distrito` VALUES ('dis00152', 'Chavin De Huantar', 'pro00017');
INSERT INTO `distrito` VALUES ('dis00153', 'Huacachi', 'pro00017');
INSERT INTO `distrito` VALUES ('dis00154', 'Huacchis', 'pro00017');
INSERT INTO `distrito` VALUES ('dis00155', 'Huachis', 'pro00017');
INSERT INTO `distrito` VALUES ('dis00156', 'Huantar', 'pro00017');
INSERT INTO `distrito` VALUES ('dis00157', 'Masin', 'pro00017');
INSERT INTO `distrito` VALUES ('dis00158', 'Paucas', 'pro00017');
INSERT INTO `distrito` VALUES ('dis00159', 'Ponto', 'pro00017');
INSERT INTO `distrito` VALUES ('dis00160', 'Rahuapampa', 'pro00017');
INSERT INTO `distrito` VALUES ('dis00161', 'Rapayan', 'pro00017');
INSERT INTO `distrito` VALUES ('dis00162', 'San Marcos', 'pro00017');
INSERT INTO `distrito` VALUES ('dis00163', 'San Pedro De Chana', 'pro00017');
INSERT INTO `distrito` VALUES ('dis00164', 'Uco', 'pro00017');
INSERT INTO `distrito` VALUES ('dis00165', 'Huarmey', 'pro00018');
INSERT INTO `distrito` VALUES ('dis00166', 'Cochapeti', 'pro00018');
INSERT INTO `distrito` VALUES ('dis00167', 'Culebras', 'pro00018');
INSERT INTO `distrito` VALUES ('dis00168', 'Huayan', 'pro00018');
INSERT INTO `distrito` VALUES ('dis00169', 'Malvas', 'pro00018');
INSERT INTO `distrito` VALUES ('dis00170', 'Caraz', 'pro00019');
INSERT INTO `distrito` VALUES ('dis00171', 'Huallanca', 'pro00019');
INSERT INTO `distrito` VALUES ('dis00172', 'Huata', 'pro00019');
INSERT INTO `distrito` VALUES ('dis00173', 'Huaylas', 'pro00019');
INSERT INTO `distrito` VALUES ('dis00174', 'Mato', 'pro00019');
INSERT INTO `distrito` VALUES ('dis00175', 'Pamparomas', 'pro00019');
INSERT INTO `distrito` VALUES ('dis00176', 'Pueblo Libre', 'pro00019');
INSERT INTO `distrito` VALUES ('dis00177', 'Santa Cruz', 'pro00019');
INSERT INTO `distrito` VALUES ('dis00178', 'Santo Toribio', 'pro00019');
INSERT INTO `distrito` VALUES ('dis00179', 'Yuracmarca', 'pro00019');
INSERT INTO `distrito` VALUES ('dis00180', 'Piscobamba', 'pro00020');
INSERT INTO `distrito` VALUES ('dis00181', 'Casca', 'pro00020');
INSERT INTO `distrito` VALUES ('dis00182', 'Eleazar Guzman Barron', 'pro00020');
INSERT INTO `distrito` VALUES ('dis00183', 'Fidel Olivas Escudero', 'pro00020');
INSERT INTO `distrito` VALUES ('dis00184', 'Llama', 'pro00020');
INSERT INTO `distrito` VALUES ('dis00185', 'Llumpa', 'pro00020');
INSERT INTO `distrito` VALUES ('dis00186', 'Lucma', 'pro00020');
INSERT INTO `distrito` VALUES ('dis00187', 'Musga', 'pro00020');
INSERT INTO `distrito` VALUES ('dis00188', 'Ocros', 'pro00021');
INSERT INTO `distrito` VALUES ('dis00189', 'Acas', 'pro00021');
INSERT INTO `distrito` VALUES ('dis00190', 'Cajamarquilla', 'pro00021');
INSERT INTO `distrito` VALUES ('dis00191', 'Carhuapampa', 'pro00021');
INSERT INTO `distrito` VALUES ('dis00192', 'Cochas', 'pro00021');
INSERT INTO `distrito` VALUES ('dis00193', 'Congas', 'pro00021');
INSERT INTO `distrito` VALUES ('dis00194', 'Llipa', 'pro00021');
INSERT INTO `distrito` VALUES ('dis00195', 'San Cristobal De Rajan', 'pro00021');
INSERT INTO `distrito` VALUES ('dis00196', 'San Pedro', 'pro00021');
INSERT INTO `distrito` VALUES ('dis00197', 'Santiago De Chilcas', 'pro00021');
INSERT INTO `distrito` VALUES ('dis00198', 'Cabana', 'pro00022');
INSERT INTO `distrito` VALUES ('dis00199', 'Bolognesi', 'pro00022');
INSERT INTO `distrito` VALUES ('dis00200', 'Conchucos', 'pro00022');
INSERT INTO `distrito` VALUES ('dis00201', 'Huacaschuque', 'pro00022');
INSERT INTO `distrito` VALUES ('dis00202', 'Huandoval', 'pro00022');
INSERT INTO `distrito` VALUES ('dis00203', 'Lacabamba', 'pro00022');
INSERT INTO `distrito` VALUES ('dis00204', 'Llapo', 'pro00022');
INSERT INTO `distrito` VALUES ('dis00205', 'Pallasca', 'pro00022');
INSERT INTO `distrito` VALUES ('dis00206', 'Pampas', 'pro00022');
INSERT INTO `distrito` VALUES ('dis00207', 'Santa Rosa', 'pro00022');
INSERT INTO `distrito` VALUES ('dis00208', 'Tauca', 'pro00022');
INSERT INTO `distrito` VALUES ('dis00209', 'Pomabamba', 'pro00023');
INSERT INTO `distrito` VALUES ('dis00210', 'Huayllan', 'pro00023');
INSERT INTO `distrito` VALUES ('dis00211', 'Parobamba', 'pro00023');
INSERT INTO `distrito` VALUES ('dis00212', 'Quinuabamba', 'pro00023');
INSERT INTO `distrito` VALUES ('dis00213', 'Recuay', 'pro00024');
INSERT INTO `distrito` VALUES ('dis00214', 'Catac', 'pro00024');
INSERT INTO `distrito` VALUES ('dis00215', 'Cotaparaco', 'pro00024');
INSERT INTO `distrito` VALUES ('dis00216', 'Huayllapampa', 'pro00024');
INSERT INTO `distrito` VALUES ('dis00217', 'Llacllin', 'pro00024');
INSERT INTO `distrito` VALUES ('dis00218', 'Marca', 'pro00024');
INSERT INTO `distrito` VALUES ('dis00219', 'Pampas Chico', 'pro00024');
INSERT INTO `distrito` VALUES ('dis00220', 'Pararin', 'pro00024');
INSERT INTO `distrito` VALUES ('dis00221', 'Tapacocha', 'pro00024');
INSERT INTO `distrito` VALUES ('dis00222', 'Ticapampa', 'pro00024');
INSERT INTO `distrito` VALUES ('dis00223', 'Chimbote', 'pro00025');
INSERT INTO `distrito` VALUES ('dis00224', 'Caceres Del Peru', 'pro00025');
INSERT INTO `distrito` VALUES ('dis00225', 'Coishco', 'pro00025');
INSERT INTO `distrito` VALUES ('dis00226', 'Macate', 'pro00025');
INSERT INTO `distrito` VALUES ('dis00227', 'Moro', 'pro00025');
INSERT INTO `distrito` VALUES ('dis00228', 'Nepeña', 'pro00025');
INSERT INTO `distrito` VALUES ('dis00229', 'Samanco', 'pro00025');
INSERT INTO `distrito` VALUES ('dis00230', 'Santa', 'pro00025');
INSERT INTO `distrito` VALUES ('dis00231', 'Nuevo Chimbote', 'pro00025');
INSERT INTO `distrito` VALUES ('dis00232', 'Sihuas', 'pro00026');
INSERT INTO `distrito` VALUES ('dis00233', 'Acobamba', 'pro00026');
INSERT INTO `distrito` VALUES ('dis00234', 'Alfonso Ugarte', 'pro00026');
INSERT INTO `distrito` VALUES ('dis00235', 'Cashapampa', 'pro00026');
INSERT INTO `distrito` VALUES ('dis00236', 'Chingalpo', 'pro00026');
INSERT INTO `distrito` VALUES ('dis00237', 'Huayllabamba', 'pro00026');
INSERT INTO `distrito` VALUES ('dis00238', 'Quiches', 'pro00026');
INSERT INTO `distrito` VALUES ('dis00239', 'Ragash', 'pro00026');
INSERT INTO `distrito` VALUES ('dis00240', 'San Juan', 'pro00026');
INSERT INTO `distrito` VALUES ('dis00241', 'Sicsibamba', 'pro00026');
INSERT INTO `distrito` VALUES ('dis00242', 'Yungay', 'pro00027');
INSERT INTO `distrito` VALUES ('dis00243', 'Cascapara', 'pro00027');
INSERT INTO `distrito` VALUES ('dis00244', 'Mancos', 'pro00027');
INSERT INTO `distrito` VALUES ('dis00245', 'Matacoto', 'pro00027');
INSERT INTO `distrito` VALUES ('dis00246', 'Quillo', 'pro00027');
INSERT INTO `distrito` VALUES ('dis00247', 'Ranrahirca', 'pro00027');
INSERT INTO `distrito` VALUES ('dis00248', 'Shupluy', 'pro00027');
INSERT INTO `distrito` VALUES ('dis00249', 'Yanama', 'pro00027');
INSERT INTO `distrito` VALUES ('dis00250', 'Abancay', 'pro00028');
INSERT INTO `distrito` VALUES ('dis00251', 'Chacoche', 'pro00028');
INSERT INTO `distrito` VALUES ('dis00252', 'Circa', 'pro00028');
INSERT INTO `distrito` VALUES ('dis00253', 'Curahuasi', 'pro00028');
INSERT INTO `distrito` VALUES ('dis00254', 'Huanipaca', 'pro00028');
INSERT INTO `distrito` VALUES ('dis00255', 'Lambrama', 'pro00028');
INSERT INTO `distrito` VALUES ('dis00256', 'Pichirhua', 'pro00028');
INSERT INTO `distrito` VALUES ('dis00257', 'San Pedro De Cachora', 'pro00028');
INSERT INTO `distrito` VALUES ('dis00258', 'Tamburco', 'pro00028');
INSERT INTO `distrito` VALUES ('dis00259', 'Antabamba', 'pro00030');
INSERT INTO `distrito` VALUES ('dis00260', 'El Oro', 'pro00030');
INSERT INTO `distrito` VALUES ('dis00261', 'Huaquirca', 'pro00030');
INSERT INTO `distrito` VALUES ('dis00262', 'Juan Espinoza Medrano', 'pro00030');
INSERT INTO `distrito` VALUES ('dis00263', 'Oropesa', 'pro00030');
INSERT INTO `distrito` VALUES ('dis00264', 'Pachaconas', 'pro00030');
INSERT INTO `distrito` VALUES ('dis00265', 'Sabaino', 'pro00030');
INSERT INTO `distrito` VALUES ('dis00266', 'Chalhuanca', 'pro00031');
INSERT INTO `distrito` VALUES ('dis00267', 'Capaya', 'pro00031');
INSERT INTO `distrito` VALUES ('dis00268', 'Caraybamba', 'pro00031');
INSERT INTO `distrito` VALUES ('dis00269', 'Chapimarca', 'pro00031');
INSERT INTO `distrito` VALUES ('dis00270', 'Colcabamba', 'pro00031');
INSERT INTO `distrito` VALUES ('dis00271', 'Cotaruse', 'pro00031');
INSERT INTO `distrito` VALUES ('dis00272', 'Huayllo', 'pro00031');
INSERT INTO `distrito` VALUES ('dis00273', 'Justo Apu Sahuaraura', 'pro00031');
INSERT INTO `distrito` VALUES ('dis00274', 'Lucre', 'pro00031');
INSERT INTO `distrito` VALUES ('dis00275', 'Pocohuanca', 'pro00031');
INSERT INTO `distrito` VALUES ('dis00276', 'San Juan De Chacña', 'pro00031');
INSERT INTO `distrito` VALUES ('dis00277', 'Sañayca', 'pro00031');
INSERT INTO `distrito` VALUES ('dis00278', 'Soraya', 'pro00031');
INSERT INTO `distrito` VALUES ('dis00279', 'Tapairihua', 'pro00031');
INSERT INTO `distrito` VALUES ('dis00280', 'Tintay', 'pro00031');
INSERT INTO `distrito` VALUES ('dis00281', 'Toraya', 'pro00031');
INSERT INTO `distrito` VALUES ('dis00282', 'Yanaca', 'pro00031');
INSERT INTO `distrito` VALUES ('dis00283', 'Tambobamba', 'pro00032');
INSERT INTO `distrito` VALUES ('dis00284', 'Cotabambas', 'pro00032');
INSERT INTO `distrito` VALUES ('dis00285', 'Coyllurqui', 'pro00032');
INSERT INTO `distrito` VALUES ('dis00286', 'Haquira', 'pro00032');
INSERT INTO `distrito` VALUES ('dis00287', 'Mara', 'pro00032');
INSERT INTO `distrito` VALUES ('dis00288', 'Challhuahuacho', 'pro00032');
INSERT INTO `distrito` VALUES ('dis00289', 'Chuquibambilla', 'pro00034');
INSERT INTO `distrito` VALUES ('dis00290', 'Curpahuasi', 'pro00034');
INSERT INTO `distrito` VALUES ('dis00291', 'Gamarra', 'pro00034');
INSERT INTO `distrito` VALUES ('dis00292', 'Huayllati', 'pro00034');
INSERT INTO `distrito` VALUES ('dis00293', 'Mamara', 'pro00034');
INSERT INTO `distrito` VALUES ('dis00294', 'Micaela Bastidas', 'pro00034');
INSERT INTO `distrito` VALUES ('dis00295', 'Pataypampa', 'pro00034');
INSERT INTO `distrito` VALUES ('dis00296', 'Progreso', 'pro00034');
INSERT INTO `distrito` VALUES ('dis00297', 'San Antonio', 'pro00034');
INSERT INTO `distrito` VALUES ('dis00298', 'Santa Rosa', 'pro00034');
INSERT INTO `distrito` VALUES ('dis00299', 'Turpay', 'pro00034');
INSERT INTO `distrito` VALUES ('dis00300', 'Vilcabamba', 'pro00034');
INSERT INTO `distrito` VALUES ('dis00301', 'Virundo', 'pro00034');
INSERT INTO `distrito` VALUES ('dis00302', 'Curasco', 'pro00034');
INSERT INTO `distrito` VALUES ('dis00303', 'Chincheros', 'pro00033');
INSERT INTO `distrito` VALUES ('dis00304', 'Anco-huallo', 'pro00033');
INSERT INTO `distrito` VALUES ('dis00305', 'Cocharcas', 'pro00033');
INSERT INTO `distrito` VALUES ('dis00306', 'Huaccana', 'pro00033');
INSERT INTO `distrito` VALUES ('dis00307', 'Ocobamba', 'pro00033');
INSERT INTO `distrito` VALUES ('dis00308', 'Ongoy', 'pro00033');
INSERT INTO `distrito` VALUES ('dis00309', 'Uranmarca', 'pro00033');
INSERT INTO `distrito` VALUES ('dis00310', 'Ranracancha', 'pro00033');
INSERT INTO `distrito` VALUES ('dis00311', 'Andahuaylas', 'pro00029');
INSERT INTO `distrito` VALUES ('dis00312', 'Andarapa', 'pro00029');
INSERT INTO `distrito` VALUES ('dis00313', 'Chiara', 'pro00029');
INSERT INTO `distrito` VALUES ('dis00314', 'Huancarama', 'pro00029');
INSERT INTO `distrito` VALUES ('dis00315', 'Huancaray', 'pro00029');
INSERT INTO `distrito` VALUES ('dis00316', 'Huayana', 'pro00029');
INSERT INTO `distrito` VALUES ('dis00317', 'Kishuara', 'pro00029');
INSERT INTO `distrito` VALUES ('dis00318', 'Pacobamba', 'pro00029');
INSERT INTO `distrito` VALUES ('dis00319', 'Pacucha', 'pro00029');
INSERT INTO `distrito` VALUES ('dis00320', 'Pampachiri', 'pro00029');
INSERT INTO `distrito` VALUES ('dis00321', 'Pomacocha', 'pro00029');
INSERT INTO `distrito` VALUES ('dis00322', 'San Antonio De Cachi', 'pro00029');
INSERT INTO `distrito` VALUES ('dis00323', 'San Jeronimo', 'pro00029');
INSERT INTO `distrito` VALUES ('dis00324', 'San Miguel De Chaccrampa', 'pro00029');
INSERT INTO `distrito` VALUES ('dis00325', 'Santa Maria De Chicmo', 'pro00029');
INSERT INTO `distrito` VALUES ('dis00326', 'Talavera', 'pro00029');
INSERT INTO `distrito` VALUES ('dis00327', 'Tumay Huaraca', 'pro00029');
INSERT INTO `distrito` VALUES ('dis00328', 'Turpo', 'pro00029');
INSERT INTO `distrito` VALUES ('dis00329', 'Kaquiabamba', 'pro00029');
INSERT INTO `distrito` VALUES ('dis00330', 'Arequipa', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00331', 'Alto Selva Alegre', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00332', 'Cayma', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00333', 'Cerro Colorado', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00334', 'Characato', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00335', 'Chiguata', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00336', 'Jacobo Hunter', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00337', 'La Joya', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00338', 'Mariano Melgar', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00339', 'Miraflores', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00340', 'Mollebaya', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00341', 'Paucarpata', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00342', 'Pocsi', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00343', 'Polobaya', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00344', 'Quequeña', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00345', 'Sabandia', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00346', 'Sachaca', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00347', 'San Juan De Siguas', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00348', 'San Juan De Tarucani', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00349', 'Santa Isabel De Siguas', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00350', 'Santa Rita De Siguas', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00351', 'Socabaya', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00352', 'Tiabaya', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00353', 'Uchumayo', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00354', 'Vitor', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00355', 'Yanahuara', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00356', 'Yarabamba', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00357', 'Yura', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00358', 'Jose Luis Bustamante Y Rivero', 'pro00035');
INSERT INTO `distrito` VALUES ('dis00359', 'Camana', 'pro00036');
INSERT INTO `distrito` VALUES ('dis00360', 'Jose Maria Quimper', 'pro00036');
INSERT INTO `distrito` VALUES ('dis00361', 'Mariano Nicolas Valcarcel', 'pro00036');
INSERT INTO `distrito` VALUES ('dis00362', 'Mariscal Caceres', 'pro00036');
INSERT INTO `distrito` VALUES ('dis00363', 'Nicolas De Pierola', 'pro00036');
INSERT INTO `distrito` VALUES ('dis00364', 'Ocoña', 'pro00036');
INSERT INTO `distrito` VALUES ('dis00365', 'Quilca', 'pro00036');
INSERT INTO `distrito` VALUES ('dis00366', 'Samuel Pastor', 'pro00036');
INSERT INTO `distrito` VALUES ('dis00367', 'Caraveli', 'pro00037');
INSERT INTO `distrito` VALUES ('dis00368', 'Acari', 'pro00037');
INSERT INTO `distrito` VALUES ('dis00369', 'Atico', 'pro00037');
INSERT INTO `distrito` VALUES ('dis00370', 'Atiquipa', 'pro00037');
INSERT INTO `distrito` VALUES ('dis00371', 'Bella Union', 'pro00037');
INSERT INTO `distrito` VALUES ('dis00372', 'Cahuacho', 'pro00037');
INSERT INTO `distrito` VALUES ('dis00373', 'Chala', 'pro00037');
INSERT INTO `distrito` VALUES ('dis00374', 'Chaparra', 'pro00037');
INSERT INTO `distrito` VALUES ('dis00375', 'Huanuhuanu', 'pro00037');
INSERT INTO `distrito` VALUES ('dis00376', 'Jaqui', 'pro00037');
INSERT INTO `distrito` VALUES ('dis00377', 'Lomas', 'pro00037');
INSERT INTO `distrito` VALUES ('dis00378', 'Quicacha', 'pro00037');
INSERT INTO `distrito` VALUES ('dis00379', 'Yauca', 'pro00037');
INSERT INTO `distrito` VALUES ('dis00380', 'Aplao', 'pro00038');
INSERT INTO `distrito` VALUES ('dis00381', 'Andagua', 'pro00038');
INSERT INTO `distrito` VALUES ('dis00382', 'Ayo', 'pro00038');
INSERT INTO `distrito` VALUES ('dis00383', 'Chachas', 'pro00038');
INSERT INTO `distrito` VALUES ('dis00384', 'Chilcaymarca', 'pro00038');
INSERT INTO `distrito` VALUES ('dis00385', 'Choco', 'pro00038');
INSERT INTO `distrito` VALUES ('dis00386', 'Huancarqui', 'pro00038');
INSERT INTO `distrito` VALUES ('dis00387', 'Machaguay', 'pro00038');
INSERT INTO `distrito` VALUES ('dis00388', 'Orcopampa', 'pro00038');
INSERT INTO `distrito` VALUES ('dis00389', 'Pampacolca', 'pro00038');
INSERT INTO `distrito` VALUES ('dis00390', 'Tipan', 'pro00038');
INSERT INTO `distrito` VALUES ('dis00391', 'Uñon', 'pro00038');
INSERT INTO `distrito` VALUES ('dis00392', 'Uraca', 'pro00038');
INSERT INTO `distrito` VALUES ('dis00393', 'Viraco', 'pro00038');
INSERT INTO `distrito` VALUES ('dis00394', 'Chivay', 'pro00039');
INSERT INTO `distrito` VALUES ('dis00395', 'Achoma', 'pro00039');
INSERT INTO `distrito` VALUES ('dis00396', 'Cabanaconde', 'pro00039');
INSERT INTO `distrito` VALUES ('dis00397', 'Callalli', 'pro00039');
INSERT INTO `distrito` VALUES ('dis00398', 'Caylloma', 'pro00039');
INSERT INTO `distrito` VALUES ('dis00399', 'Coporaque', 'pro00039');
INSERT INTO `distrito` VALUES ('dis00400', 'Huambo', 'pro00039');
INSERT INTO `distrito` VALUES ('dis00401', 'Huanca', 'pro00039');
INSERT INTO `distrito` VALUES ('dis00402', 'Ichupampa', 'pro00039');
INSERT INTO `distrito` VALUES ('dis00403', 'Lari', 'pro00039');
INSERT INTO `distrito` VALUES ('dis00404', 'Lluta', 'pro00039');
INSERT INTO `distrito` VALUES ('dis00405', 'Maca', 'pro00039');
INSERT INTO `distrito` VALUES ('dis00406', 'Madrigal', 'pro00039');
INSERT INTO `distrito` VALUES ('dis00407', 'San Antonio De Chuca', 'pro00039');
INSERT INTO `distrito` VALUES ('dis00408', 'Sibayo', 'pro00039');
INSERT INTO `distrito` VALUES ('dis00409', 'Tapay', 'pro00039');
INSERT INTO `distrito` VALUES ('dis00410', 'Tisco', 'pro00039');
INSERT INTO `distrito` VALUES ('dis00411', 'Tuti', 'pro00039');
INSERT INTO `distrito` VALUES ('dis00412', 'Yanque', 'pro00039');
INSERT INTO `distrito` VALUES ('dis00413', 'Chuquibamba', 'pro00040');
INSERT INTO `distrito` VALUES ('dis00414', 'Andaray', 'pro00040');
INSERT INTO `distrito` VALUES ('dis00415', 'Cayarani', 'pro00040');
INSERT INTO `distrito` VALUES ('dis00416', 'Chichas', 'pro00040');
INSERT INTO `distrito` VALUES ('dis00417', 'Iray', 'pro00040');
INSERT INTO `distrito` VALUES ('dis00418', 'Rio Grande', 'pro00040');
INSERT INTO `distrito` VALUES ('dis00419', 'Salamanca', 'pro00040');
INSERT INTO `distrito` VALUES ('dis00420', 'Yanaquihua', 'pro00040');
INSERT INTO `distrito` VALUES ('dis00421', 'Mollendo', 'pro00041');
INSERT INTO `distrito` VALUES ('dis00422', 'Cocachacra', 'pro00041');
INSERT INTO `distrito` VALUES ('dis00423', 'Dean Valdivia', 'pro00041');
INSERT INTO `distrito` VALUES ('dis00424', 'Islay', 'pro00041');
INSERT INTO `distrito` VALUES ('dis00425', 'Mejia', 'pro00041');
INSERT INTO `distrito` VALUES ('dis00426', 'Punta De Bombon', 'pro00041');
INSERT INTO `distrito` VALUES ('dis00427', 'Cotahuasi', 'pro00042');
INSERT INTO `distrito` VALUES ('dis00428', 'Alca', 'pro00042');
INSERT INTO `distrito` VALUES ('dis00429', 'Charcana', 'pro00042');
INSERT INTO `distrito` VALUES ('dis00430', 'Huaynacotas', 'pro00042');
INSERT INTO `distrito` VALUES ('dis00431', 'Pampamarca', 'pro00042');
INSERT INTO `distrito` VALUES ('dis00432', 'Puyca', 'pro00042');
INSERT INTO `distrito` VALUES ('dis00433', 'Quechualla', 'pro00042');
INSERT INTO `distrito` VALUES ('dis00434', 'Sayla', 'pro00042');
INSERT INTO `distrito` VALUES ('dis00435', 'Tauria', 'pro00042');
INSERT INTO `distrito` VALUES ('dis00436', 'Tomepampa', 'pro00042');
INSERT INTO `distrito` VALUES ('dis00437', 'Toro', 'pro00042');
INSERT INTO `distrito` VALUES ('dis00438', 'Ayacucho', 'pro00043');
INSERT INTO `distrito` VALUES ('dis00439', 'Acocro', 'pro00043');
INSERT INTO `distrito` VALUES ('dis00440', 'Acos Vinchos', 'pro00043');
INSERT INTO `distrito` VALUES ('dis00441', 'Carmen Alto', 'pro00043');
INSERT INTO `distrito` VALUES ('dis00442', 'Chiara', 'pro00043');
INSERT INTO `distrito` VALUES ('dis00443', 'Ocros', 'pro00043');
INSERT INTO `distrito` VALUES ('dis00444', 'Pacaycasa', 'pro00043');
INSERT INTO `distrito` VALUES ('dis00445', 'Quinua', 'pro00043');
INSERT INTO `distrito` VALUES ('dis00446', 'San Jose De Ticllas', 'pro00043');
INSERT INTO `distrito` VALUES ('dis00447', 'San Juan Bautista', 'pro00043');
INSERT INTO `distrito` VALUES ('dis00448', 'Santiago De Pischa', 'pro00043');
INSERT INTO `distrito` VALUES ('dis00449', 'Socos', 'pro00043');
INSERT INTO `distrito` VALUES ('dis00450', 'Tambillo', 'pro00043');
INSERT INTO `distrito` VALUES ('dis00451', 'Vinchos', 'pro00043');
INSERT INTO `distrito` VALUES ('dis00452', 'Jesus Nazareno', 'pro00043');
INSERT INTO `distrito` VALUES ('dis00453', 'Cangallo', 'pro00044');
INSERT INTO `distrito` VALUES ('dis00454', 'Chuschi', 'pro00044');
INSERT INTO `distrito` VALUES ('dis00455', 'Los Morochucos', 'pro00044');
INSERT INTO `distrito` VALUES ('dis00456', 'Maria Parado De Bellido', 'pro00044');
INSERT INTO `distrito` VALUES ('dis00457', 'Paras', 'pro00044');
INSERT INTO `distrito` VALUES ('dis00458', 'Totos', 'pro00044');
INSERT INTO `distrito` VALUES ('dis00459', 'Sancos', 'pro00045');
INSERT INTO `distrito` VALUES ('dis00460', 'Carapo', 'pro00045');
INSERT INTO `distrito` VALUES ('dis00461', 'Sacsamarca', 'pro00045');
INSERT INTO `distrito` VALUES ('dis00462', 'Santiago De Lucanamarca', 'pro00045');
INSERT INTO `distrito` VALUES ('dis00463', 'Huanta', 'pro00046');
INSERT INTO `distrito` VALUES ('dis00464', 'Hayahuanco', 'pro00046');
INSERT INTO `distrito` VALUES ('dis00465', 'Huamanguilla', 'pro00046');
INSERT INTO `distrito` VALUES ('dis00466', 'Iguain', 'pro00046');
INSERT INTO `distrito` VALUES ('dis00467', 'Luricocha', 'pro00046');
INSERT INTO `distrito` VALUES ('dis00468', 'Santillana', 'pro00046');
INSERT INTO `distrito` VALUES ('dis00469', 'Sivia', 'pro00046');
INSERT INTO `distrito` VALUES ('dis00470', 'San Miguel', 'pro00047');
INSERT INTO `distrito` VALUES ('dis00471', 'Anco', 'pro00047');
INSERT INTO `distrito` VALUES ('dis00472', 'Ayna', 'pro00047');
INSERT INTO `distrito` VALUES ('dis00473', 'Chilcas', 'pro00047');
INSERT INTO `distrito` VALUES ('dis00474', 'Chungui', 'pro00047');
INSERT INTO `distrito` VALUES ('dis00475', 'Luis Carranza', 'pro00047');
INSERT INTO `distrito` VALUES ('dis00476', 'Tambo', 'pro00047');
INSERT INTO `distrito` VALUES ('dis00477', 'Santa Rosa', 'pro00047');
INSERT INTO `distrito` VALUES ('dis00478', 'Puquio', 'pro00048');
INSERT INTO `distrito` VALUES ('dis00479', 'Aucara', 'pro00048');
INSERT INTO `distrito` VALUES ('dis00480', 'Cabana', 'pro00048');
INSERT INTO `distrito` VALUES ('dis00481', 'Carmen Salcedo', 'pro00048');
INSERT INTO `distrito` VALUES ('dis00482', 'Chaviña', 'pro00048');
INSERT INTO `distrito` VALUES ('dis00483', 'Chipao', 'pro00048');
INSERT INTO `distrito` VALUES ('dis00484', 'Huac-huas', 'pro00048');
INSERT INTO `distrito` VALUES ('dis00485', 'Laramate', 'pro00048');
INSERT INTO `distrito` VALUES ('dis00486', 'Leoncio Prado', 'pro00048');
INSERT INTO `distrito` VALUES ('dis00487', 'Llauta', 'pro00048');
INSERT INTO `distrito` VALUES ('dis00488', 'Lucanas', 'pro00048');
INSERT INTO `distrito` VALUES ('dis00489', 'Ocaña', 'pro00048');
INSERT INTO `distrito` VALUES ('dis00490', 'Otoca', 'pro00048');
INSERT INTO `distrito` VALUES ('dis00491', 'Saisa', 'pro00048');
INSERT INTO `distrito` VALUES ('dis00492', 'San Cristobal', 'pro00048');
INSERT INTO `distrito` VALUES ('dis00493', 'San Juan', 'pro00048');
INSERT INTO `distrito` VALUES ('dis00494', 'San Pedro', 'pro00048');
INSERT INTO `distrito` VALUES ('dis00495', 'San Pedro De Palco', 'pro00048');
INSERT INTO `distrito` VALUES ('dis00496', 'Sancos', 'pro00048');
INSERT INTO `distrito` VALUES ('dis00497', 'Santa Ana De Huaycahuacho', 'pro00048');
INSERT INTO `distrito` VALUES ('dis00498', 'Santa Lucia', 'pro00048');
INSERT INTO `distrito` VALUES ('dis00499', 'Coracora', 'pro00049');
INSERT INTO `distrito` VALUES ('dis00500', 'Chumpi', 'pro00049');
INSERT INTO `distrito` VALUES ('dis00501', 'Coronel Castañeda', 'pro00049');
INSERT INTO `distrito` VALUES ('dis00502', 'Pacapausa', 'pro00049');
INSERT INTO `distrito` VALUES ('dis00503', 'Pullo', 'pro00049');
INSERT INTO `distrito` VALUES ('dis00504', 'Puyusca', 'pro00049');
INSERT INTO `distrito` VALUES ('dis00505', 'San Francisco De Ravacayco', 'pro00049');
INSERT INTO `distrito` VALUES ('dis00506', 'Upahuacho', 'pro00049');
INSERT INTO `distrito` VALUES ('dis00507', 'Pausa', 'pro00050');
INSERT INTO `distrito` VALUES ('dis00508', 'Colta', 'pro00050');
INSERT INTO `distrito` VALUES ('dis00509', 'Corculla', 'pro00050');
INSERT INTO `distrito` VALUES ('dis00510', 'Lampa', 'pro00050');
INSERT INTO `distrito` VALUES ('dis00511', 'Marcabamba', 'pro00050');
INSERT INTO `distrito` VALUES ('dis00512', 'Oyolo', 'pro00050');
INSERT INTO `distrito` VALUES ('dis00513', 'Pararca', 'pro00050');
INSERT INTO `distrito` VALUES ('dis00514', 'San Javier Del Alpabamba', 'pro00050');
INSERT INTO `distrito` VALUES ('dis00515', 'San Jose De Ushua', 'pro00050');
INSERT INTO `distrito` VALUES ('dis00516', 'Sara Sara', 'pro00050');
INSERT INTO `distrito` VALUES ('dis00517', 'Querobamba', 'pro00051');
INSERT INTO `distrito` VALUES ('dis00518', 'Belen', 'pro00051');
INSERT INTO `distrito` VALUES ('dis00519', 'Chalcos', 'pro00051');
INSERT INTO `distrito` VALUES ('dis00520', 'Chilcayoc', 'pro00051');
INSERT INTO `distrito` VALUES ('dis00521', 'Huacaña', 'pro00051');
INSERT INTO `distrito` VALUES ('dis00522', 'Morcolla', 'pro00051');
INSERT INTO `distrito` VALUES ('dis00523', 'Paico', 'pro00051');
INSERT INTO `distrito` VALUES ('dis00524', 'San Pedro De Larcay', 'pro00051');
INSERT INTO `distrito` VALUES ('dis00525', 'San Salvador De Quije', 'pro00051');
INSERT INTO `distrito` VALUES ('dis00526', 'Santiago De Paucaray', 'pro00051');
INSERT INTO `distrito` VALUES ('dis00527', 'Soras', 'pro00051');
INSERT INTO `distrito` VALUES ('dis00528', 'Huancapi', 'pro00052');
INSERT INTO `distrito` VALUES ('dis00529', 'Alcamenca', 'pro00052');
INSERT INTO `distrito` VALUES ('dis00530', 'Apongo', 'pro00052');
INSERT INTO `distrito` VALUES ('dis00531', 'Asquipata', 'pro00052');
INSERT INTO `distrito` VALUES ('dis00532', 'Canaria', 'pro00052');
INSERT INTO `distrito` VALUES ('dis00533', 'Cayara', 'pro00052');
INSERT INTO `distrito` VALUES ('dis00534', 'Colca', 'pro00052');
INSERT INTO `distrito` VALUES ('dis00535', 'Huamanquiquia', 'pro00052');
INSERT INTO `distrito` VALUES ('dis00536', 'Huancaraylla', 'pro00052');
INSERT INTO `distrito` VALUES ('dis00537', 'Huaya', 'pro00052');
INSERT INTO `distrito` VALUES ('dis00538', 'Sarhua', 'pro00052');
INSERT INTO `distrito` VALUES ('dis00539', 'Vilcanchos', 'pro00052');
INSERT INTO `distrito` VALUES ('dis00540', 'Vilcas Huaman', 'pro00053');
INSERT INTO `distrito` VALUES ('dis00541', 'Accomarca', 'pro00053');
INSERT INTO `distrito` VALUES ('dis00542', 'Carhuanca', 'pro00053');
INSERT INTO `distrito` VALUES ('dis00543', 'Concepcion', 'pro00053');
INSERT INTO `distrito` VALUES ('dis00544', 'Huambalpa', 'pro00053');
INSERT INTO `distrito` VALUES ('dis00545', 'Independencia', 'pro00053');
INSERT INTO `distrito` VALUES ('dis00546', 'Saurama', 'pro00053');
INSERT INTO `distrito` VALUES ('dis00547', 'Vischongo', 'pro00053');
INSERT INTO `distrito` VALUES ('dis00548', 'San Ignacio', 'pro00062');
INSERT INTO `distrito` VALUES ('dis00549', 'Chirinos', 'pro00062');
INSERT INTO `distrito` VALUES ('dis00550', 'Huarango', 'pro00062');
INSERT INTO `distrito` VALUES ('dis00551', 'La Coipa', 'pro00062');
INSERT INTO `distrito` VALUES ('dis00552', 'Namballe', 'pro00062');
INSERT INTO `distrito` VALUES ('dis00553', 'San Jose De Lourdes', 'pro00062');
INSERT INTO `distrito` VALUES ('dis00554', 'Tabaconas', 'pro00062');
INSERT INTO `distrito` VALUES ('dis00555', 'Jaen', 'pro00061');
INSERT INTO `distrito` VALUES ('dis00556', 'Bellavista', 'pro00061');
INSERT INTO `distrito` VALUES ('dis00557', 'Chontali', 'pro00061');
INSERT INTO `distrito` VALUES ('dis00558', 'Colasay', 'pro00061');
INSERT INTO `distrito` VALUES ('dis00559', 'Huabal', 'pro00061');
INSERT INTO `distrito` VALUES ('dis00560', 'Las Pirias', 'pro00061');
INSERT INTO `distrito` VALUES ('dis00561', 'Pomahuaca', 'pro00061');
INSERT INTO `distrito` VALUES ('dis00562', 'Pucara', 'pro00061');
INSERT INTO `distrito` VALUES ('dis00563', 'Sallique', 'pro00061');
INSERT INTO `distrito` VALUES ('dis00564', 'San Felipe', 'pro00061');
INSERT INTO `distrito` VALUES ('dis00565', 'San Jose Del Alto', 'pro00061');
INSERT INTO `distrito` VALUES ('dis00566', 'Santa Rosa', 'pro00061');
INSERT INTO `distrito` VALUES ('dis00567', 'Cutervo', 'pro00059');
INSERT INTO `distrito` VALUES ('dis00568', 'Callayuc', 'pro00059');
INSERT INTO `distrito` VALUES ('dis00569', 'Choros', 'pro00059');
INSERT INTO `distrito` VALUES ('dis00570', 'Cujillo', 'pro00059');
INSERT INTO `distrito` VALUES ('dis00571', 'La Ramada', 'pro00059');
INSERT INTO `distrito` VALUES ('dis00572', 'Pimpingos', 'pro00059');
INSERT INTO `distrito` VALUES ('dis00573', 'Querocotillo', 'pro00059');
INSERT INTO `distrito` VALUES ('dis00574', 'San Andres De Cutervo', 'pro00059');
INSERT INTO `distrito` VALUES ('dis00575', 'San Juan De Cutervo', 'pro00059');
INSERT INTO `distrito` VALUES ('dis00576', 'San Luis De Lucma', 'pro00059');
INSERT INTO `distrito` VALUES ('dis00577', 'Santa Cruz', 'pro00059');
INSERT INTO `distrito` VALUES ('dis00578', 'Santo Domingo De La Capilla', 'pro00059');
INSERT INTO `distrito` VALUES ('dis00579', 'Santo Tomas', 'pro00059');
INSERT INTO `distrito` VALUES ('dis00580', 'Socota', 'pro00059');
INSERT INTO `distrito` VALUES ('dis00581', 'Toribio Casanova', 'pro00059');
INSERT INTO `distrito` VALUES ('dis00582', 'Chota', 'pro00057');
INSERT INTO `distrito` VALUES ('dis00583', 'Anguia', 'pro00057');
INSERT INTO `distrito` VALUES ('dis00584', 'Chadin', 'pro00057');
INSERT INTO `distrito` VALUES ('dis00585', 'Chiguirip', 'pro00057');
INSERT INTO `distrito` VALUES ('dis00586', 'Chimban', 'pro00057');
INSERT INTO `distrito` VALUES ('dis00587', 'Cochabamba', 'pro00057');
INSERT INTO `distrito` VALUES ('dis00588', 'Conchan', 'pro00057');
INSERT INTO `distrito` VALUES ('dis00589', 'Huambos', 'pro00057');
INSERT INTO `distrito` VALUES ('dis00590', 'Lajas', 'pro00057');
INSERT INTO `distrito` VALUES ('dis00591', 'Llama', 'pro00057');
INSERT INTO `distrito` VALUES ('dis00592', 'Miracosta', 'pro00057');
INSERT INTO `distrito` VALUES ('dis00593', 'Paccha', 'pro00057');
INSERT INTO `distrito` VALUES ('dis00594', 'Pion', 'pro00057');
INSERT INTO `distrito` VALUES ('dis00595', 'Querocoto', 'pro00057');
INSERT INTO `distrito` VALUES ('dis00596', 'San Juan De Licupis', 'pro00057');
INSERT INTO `distrito` VALUES ('dis00597', 'Tacabamba', 'pro00057');
INSERT INTO `distrito` VALUES ('dis00598', 'Tocmoche', 'pro00057');
INSERT INTO `distrito` VALUES ('dis00599', 'Choropampa', 'pro00057');
INSERT INTO `distrito` VALUES ('dis00600', 'Chalamarca', 'pro00057');
INSERT INTO `distrito` VALUES ('dis00601', 'Santa Cruz', 'pro00066');
INSERT INTO `distrito` VALUES ('dis00602', 'Andabamba', 'pro00066');
INSERT INTO `distrito` VALUES ('dis00603', 'Catache', 'pro00066');
INSERT INTO `distrito` VALUES ('dis00604', 'Chancaybaños', 'pro00066');
INSERT INTO `distrito` VALUES ('dis00605', 'La Esperanza', 'pro00066');
INSERT INTO `distrito` VALUES ('dis00606', 'Ninabamba', 'pro00066');
INSERT INTO `distrito` VALUES ('dis00607', 'Pulan', 'pro00066');
INSERT INTO `distrito` VALUES ('dis00608', 'Saucepampa', 'pro00066');
INSERT INTO `distrito` VALUES ('dis00609', 'Sexi', 'pro00066');
INSERT INTO `distrito` VALUES ('dis00610', 'Uticyacu', 'pro00066');
INSERT INTO `distrito` VALUES ('dis00611', 'Yauyucan', 'pro00066');
INSERT INTO `distrito` VALUES ('dis00612', 'Bambamarca', 'pro00060');
INSERT INTO `distrito` VALUES ('dis00613', 'Chugur', 'pro00060');
INSERT INTO `distrito` VALUES ('dis00614', 'Hualgayoc', 'pro00060');
INSERT INTO `distrito` VALUES ('dis00615', 'Celendin', 'pro00056');
INSERT INTO `distrito` VALUES ('dis00616', 'Chumuch', 'pro00056');
INSERT INTO `distrito` VALUES ('dis00617', 'Cortegana', 'pro00056');
INSERT INTO `distrito` VALUES ('dis00618', 'Huasmin', 'pro00056');
INSERT INTO `distrito` VALUES ('dis00619', 'Jorge Chavez', 'pro00056');
INSERT INTO `distrito` VALUES ('dis00620', 'Jose Galvez', 'pro00056');
INSERT INTO `distrito` VALUES ('dis00621', 'Miguel Iglesias', 'pro00056');
INSERT INTO `distrito` VALUES ('dis00622', 'Oxamarca', 'pro00056');
INSERT INTO `distrito` VALUES ('dis00623', 'Sorochuco', 'pro00056');
INSERT INTO `distrito` VALUES ('dis00624', 'Sucre', 'pro00056');
INSERT INTO `distrito` VALUES ('dis00625', 'Utco', 'pro00056');
INSERT INTO `distrito` VALUES ('dis00626', 'La Libertad De Pallan', 'pro00056');
INSERT INTO `distrito` VALUES ('dis00627', 'San Pablo', 'pro00065');
INSERT INTO `distrito` VALUES ('dis00628', 'San Bernardino', 'pro00065');
INSERT INTO `distrito` VALUES ('dis00629', 'San Luis', 'pro00065');
INSERT INTO `distrito` VALUES ('dis00630', 'Tumbaden', 'pro00065');
INSERT INTO `distrito` VALUES ('dis00631', 'San Miguel', 'pro00064');
INSERT INTO `distrito` VALUES ('dis00632', 'Bolivar', 'pro00064');
INSERT INTO `distrito` VALUES ('dis00633', 'Calquis', 'pro00064');
INSERT INTO `distrito` VALUES ('dis00634', 'Catilluc', 'pro00064');
INSERT INTO `distrito` VALUES ('dis00635', 'El Prado', 'pro00064');
INSERT INTO `distrito` VALUES ('dis00636', 'La Florida', 'pro00064');
INSERT INTO `distrito` VALUES ('dis00637', 'Llapa', 'pro00064');
INSERT INTO `distrito` VALUES ('dis00638', 'Nanchoc', 'pro00064');
INSERT INTO `distrito` VALUES ('dis00639', 'Niepos', 'pro00064');
INSERT INTO `distrito` VALUES ('dis00640', 'San Gregorio', 'pro00064');
INSERT INTO `distrito` VALUES ('dis00641', 'San Silvestre De Cochan', 'pro00064');
INSERT INTO `distrito` VALUES ('dis00642', 'Tongod', 'pro00064');
INSERT INTO `distrito` VALUES ('dis00643', 'Union Agua Blanca', 'pro00064');
INSERT INTO `distrito` VALUES ('dis00644', 'Contumaza', 'pro00058');
INSERT INTO `distrito` VALUES ('dis00645', 'Chilete', 'pro00058');
INSERT INTO `distrito` VALUES ('dis00646', 'Cupisnique', 'pro00058');
INSERT INTO `distrito` VALUES ('dis00647', 'Guzmango', 'pro00058');
INSERT INTO `distrito` VALUES ('dis00648', 'San Benito', 'pro00058');
INSERT INTO `distrito` VALUES ('dis00649', 'Santa Cruz De Toled', 'pro00058');
INSERT INTO `distrito` VALUES ('dis00650', 'Tantarica', 'pro00058');
INSERT INTO `distrito` VALUES ('dis00651', 'Yonan', 'pro00058');
INSERT INTO `distrito` VALUES ('dis00652', 'Cajamarca', 'pro00054');
INSERT INTO `distrito` VALUES ('dis00653', 'Asuncion', 'pro00054');
INSERT INTO `distrito` VALUES ('dis00654', 'Chetilla', 'pro00054');
INSERT INTO `distrito` VALUES ('dis00655', 'Cospan', 'pro00054');
INSERT INTO `distrito` VALUES ('dis00656', 'Encañada', 'pro00054');
INSERT INTO `distrito` VALUES ('dis00657', 'Jesus', 'pro00054');
INSERT INTO `distrito` VALUES ('dis00658', 'Llacanora', 'pro00054');
INSERT INTO `distrito` VALUES ('dis00659', 'Los Baños Del Inca', 'pro00054');
INSERT INTO `distrito` VALUES ('dis00660', 'Magdalena', 'pro00054');
INSERT INTO `distrito` VALUES ('dis00661', 'Matara', 'pro00054');
INSERT INTO `distrito` VALUES ('dis00662', 'Namora', 'pro00054');
INSERT INTO `distrito` VALUES ('dis00663', 'San Juan', 'pro00054');
INSERT INTO `distrito` VALUES ('dis00664', 'Cajabamba', 'pro00055');
INSERT INTO `distrito` VALUES ('dis00665', 'Cachachi', 'pro00055');
INSERT INTO `distrito` VALUES ('dis00666', 'Condebamba', 'pro00055');
INSERT INTO `distrito` VALUES ('dis00667', 'Sitacocha', 'pro00055');
INSERT INTO `distrito` VALUES ('dis00668', 'Pedro Galvez', 'pro00063');
INSERT INTO `distrito` VALUES ('dis00669', 'Eduardo Villanueva', 'pro00063');
INSERT INTO `distrito` VALUES ('dis00670', 'Gregorio Pita', 'pro00063');
INSERT INTO `distrito` VALUES ('dis00671', 'Ichocan', 'pro00063');
INSERT INTO `distrito` VALUES ('dis00672', 'Jose Manuel Quiroz', 'pro00063');
INSERT INTO `distrito` VALUES ('dis00673', 'Jose Sabogal', 'pro00063');
INSERT INTO `distrito` VALUES ('dis00674', 'Chancay', 'pro00063');
INSERT INTO `distrito` VALUES ('dis00675', 'Cusco', 'pro00068');
INSERT INTO `distrito` VALUES ('dis00676', 'Ccorca', 'pro00068');
INSERT INTO `distrito` VALUES ('dis00677', 'Poroy', 'pro00068');
INSERT INTO `distrito` VALUES ('dis00678', 'San Jeronimo', 'pro00068');
INSERT INTO `distrito` VALUES ('dis00679', 'San Sebastian', 'pro00068');
INSERT INTO `distrito` VALUES ('dis00680', 'Santiago', 'pro00068');
INSERT INTO `distrito` VALUES ('dis00681', 'Saylla', 'pro00068');
INSERT INTO `distrito` VALUES ('dis00682', 'Wanchaq', 'pro00068');
INSERT INTO `distrito` VALUES ('dis00683', 'Acomayo', 'pro00069');
INSERT INTO `distrito` VALUES ('dis00684', 'Acopia', 'pro00069');
INSERT INTO `distrito` VALUES ('dis00685', 'Acos', 'pro00069');
INSERT INTO `distrito` VALUES ('dis00686', 'Mosoc Llacta', 'pro00069');
INSERT INTO `distrito` VALUES ('dis00687', 'Pomacanchi', 'pro00069');
INSERT INTO `distrito` VALUES ('dis00688', 'Rondocan', 'pro00069');
INSERT INTO `distrito` VALUES ('dis00689', 'Sangarara', 'pro00069');
INSERT INTO `distrito` VALUES ('dis00690', 'Anta', 'pro00070');
INSERT INTO `distrito` VALUES ('dis00691', 'Ancahuasi', 'pro00070');
INSERT INTO `distrito` VALUES ('dis00692', 'Cachimayo', 'pro00070');
INSERT INTO `distrito` VALUES ('dis00693', 'Chinchaypujio', 'pro00070');
INSERT INTO `distrito` VALUES ('dis00694', 'Huarocondo', 'pro00070');
INSERT INTO `distrito` VALUES ('dis00695', 'Limatambo', 'pro00070');
INSERT INTO `distrito` VALUES ('dis00696', 'Mollepata', 'pro00070');
INSERT INTO `distrito` VALUES ('dis00697', 'Pucyura', 'pro00070');
INSERT INTO `distrito` VALUES ('dis00698', 'Zurite', 'pro00070');
INSERT INTO `distrito` VALUES ('dis00699', 'Calca', 'pro00071');
INSERT INTO `distrito` VALUES ('dis00700', 'Coya', 'pro00071');
INSERT INTO `distrito` VALUES ('dis00701', 'Lamay', 'pro00071');
INSERT INTO `distrito` VALUES ('dis00702', 'Lares', 'pro00071');
INSERT INTO `distrito` VALUES ('dis00703', 'Pisac', 'pro00071');
INSERT INTO `distrito` VALUES ('dis00704', 'San Salvador', 'pro00071');
INSERT INTO `distrito` VALUES ('dis00705', 'Taray', 'pro00071');
INSERT INTO `distrito` VALUES ('dis00706', 'Yanatile', 'pro00071');
INSERT INTO `distrito` VALUES ('dis00707', 'Yanaoca', 'pro00072');
INSERT INTO `distrito` VALUES ('dis00708', 'Checca', 'pro00072');
INSERT INTO `distrito` VALUES ('dis00709', 'Kunturkanki', 'pro00072');
INSERT INTO `distrito` VALUES ('dis00710', 'Langui', 'pro00072');
INSERT INTO `distrito` VALUES ('dis00711', 'Layo', 'pro00072');
INSERT INTO `distrito` VALUES ('dis00712', 'Pampamarca', 'pro00072');
INSERT INTO `distrito` VALUES ('dis00713', 'Quehue', 'pro00072');
INSERT INTO `distrito` VALUES ('dis00714', 'Tupac Amaru', 'pro00072');
INSERT INTO `distrito` VALUES ('dis00715', 'Sicuani', 'pro00073');
INSERT INTO `distrito` VALUES ('dis00716', 'Checacupe', 'pro00073');
INSERT INTO `distrito` VALUES ('dis00717', 'Combapata', 'pro00073');
INSERT INTO `distrito` VALUES ('dis00718', 'Marangani', 'pro00073');
INSERT INTO `distrito` VALUES ('dis00719', 'Pitumarca', 'pro00073');
INSERT INTO `distrito` VALUES ('dis00720', 'San Pablo', 'pro00073');
INSERT INTO `distrito` VALUES ('dis00721', 'San Pedro', 'pro00073');
INSERT INTO `distrito` VALUES ('dis00722', 'Tinta', 'pro00073');
INSERT INTO `distrito` VALUES ('dis00723', 'Santo Tomas', 'pro00074');
INSERT INTO `distrito` VALUES ('dis00724', 'Capacmarca', 'pro00074');
INSERT INTO `distrito` VALUES ('dis00725', 'Chamaca', 'pro00074');
INSERT INTO `distrito` VALUES ('dis00726', 'Colquemarca', 'pro00074');
INSERT INTO `distrito` VALUES ('dis00727', 'Livitaca', 'pro00074');
INSERT INTO `distrito` VALUES ('dis00728', 'Llusco', 'pro00074');
INSERT INTO `distrito` VALUES ('dis00729', 'Quiñota', 'pro00074');
INSERT INTO `distrito` VALUES ('dis00730', 'Velille', 'pro00074');
INSERT INTO `distrito` VALUES ('dis00731', 'Espinar', 'pro00075');
INSERT INTO `distrito` VALUES ('dis00732', 'Condoroma', 'pro00075');
INSERT INTO `distrito` VALUES ('dis00733', 'Coporaque', 'pro00075');
INSERT INTO `distrito` VALUES ('dis00734', 'Ocoruro', 'pro00075');
INSERT INTO `distrito` VALUES ('dis00735', 'Pallpata', 'pro00075');
INSERT INTO `distrito` VALUES ('dis00736', 'Pichigua', 'pro00075');
INSERT INTO `distrito` VALUES ('dis00737', 'Suyckutambo', 'pro00075');
INSERT INTO `distrito` VALUES ('dis00738', 'Alto Pichigua', 'pro00075');
INSERT INTO `distrito` VALUES ('dis00739', 'Santa Ana', 'pro00076');
INSERT INTO `distrito` VALUES ('dis00740', 'Echarate', 'pro00076');
INSERT INTO `distrito` VALUES ('dis00741', 'Huayopata', 'pro00076');
INSERT INTO `distrito` VALUES ('dis00742', 'Maranura', 'pro00076');
INSERT INTO `distrito` VALUES ('dis00743', 'Ocobamba', 'pro00076');
INSERT INTO `distrito` VALUES ('dis00744', 'Quellouno', 'pro00076');
INSERT INTO `distrito` VALUES ('dis00745', 'Quimbiri', 'pro00076');
INSERT INTO `distrito` VALUES ('dis00746', 'Santa Teresa', 'pro00076');
INSERT INTO `distrito` VALUES ('dis00747', 'Vilcabamba', 'pro00076');
INSERT INTO `distrito` VALUES ('dis00748', 'Pichari', 'pro00076');
INSERT INTO `distrito` VALUES ('dis00749', 'Paruro', 'pro00077');
INSERT INTO `distrito` VALUES ('dis00750', 'Accha', 'pro00077');
INSERT INTO `distrito` VALUES ('dis00751', 'Ccapi', 'pro00077');
INSERT INTO `distrito` VALUES ('dis00752', 'Colcha', 'pro00077');
INSERT INTO `distrito` VALUES ('dis00753', 'Huanoquite', 'pro00077');
INSERT INTO `distrito` VALUES ('dis00754', 'Omacha', 'pro00077');
INSERT INTO `distrito` VALUES ('dis00755', 'Paccaritambo', 'pro00077');
INSERT INTO `distrito` VALUES ('dis00756', 'Pillpinto', 'pro00077');
INSERT INTO `distrito` VALUES ('dis00757', 'Yaurisque', 'pro00077');
INSERT INTO `distrito` VALUES ('dis00758', 'Paucartambo', 'pro00078');
INSERT INTO `distrito` VALUES ('dis00759', 'Caicay', 'pro00078');
INSERT INTO `distrito` VALUES ('dis00760', 'Challabamba', 'pro00078');
INSERT INTO `distrito` VALUES ('dis00761', 'Colquepata', 'pro00078');
INSERT INTO `distrito` VALUES ('dis00762', 'Huancarani', 'pro00078');
INSERT INTO `distrito` VALUES ('dis00763', 'Kosñipata', 'pro00078');
INSERT INTO `distrito` VALUES ('dis00764', 'Urcos', 'pro00079');
INSERT INTO `distrito` VALUES ('dis00765', 'Andahuaylillas', 'pro00079');
INSERT INTO `distrito` VALUES ('dis00766', 'Camanti', 'pro00079');
INSERT INTO `distrito` VALUES ('dis00767', 'Ccarhuayo', 'pro00079');
INSERT INTO `distrito` VALUES ('dis00768', 'Ccatca', 'pro00079');
INSERT INTO `distrito` VALUES ('dis00769', 'Cusipata', 'pro00079');
INSERT INTO `distrito` VALUES ('dis00770', 'Huaro', 'pro00079');
INSERT INTO `distrito` VALUES ('dis00771', 'Lucre', 'pro00079');
INSERT INTO `distrito` VALUES ('dis00772', 'Marcapata', 'pro00079');
INSERT INTO `distrito` VALUES ('dis00773', 'Ocongate', 'pro00079');
INSERT INTO `distrito` VALUES ('dis00774', 'Oropesa', 'pro00079');
INSERT INTO `distrito` VALUES ('dis00775', 'Quiquijana', 'pro00079');
INSERT INTO `distrito` VALUES ('dis00776', 'Urubamba', 'pro00080');
INSERT INTO `distrito` VALUES ('dis00777', 'Chinchero', 'pro00080');
INSERT INTO `distrito` VALUES ('dis00778', 'Huayllabamba', 'pro00080');
INSERT INTO `distrito` VALUES ('dis00779', 'Machupicchu', 'pro00080');
INSERT INTO `distrito` VALUES ('dis00780', 'Maras', 'pro00080');
INSERT INTO `distrito` VALUES ('dis00781', 'Ollantaytambo', 'pro00080');
INSERT INTO `distrito` VALUES ('dis00782', 'Yucay', 'pro00080');
INSERT INTO `distrito` VALUES ('dis00783', 'Huancavelica', 'pro00081');
INSERT INTO `distrito` VALUES ('dis00784', 'Acobambilla', 'pro00081');
INSERT INTO `distrito` VALUES ('dis00785', 'Acoria', 'pro00081');
INSERT INTO `distrito` VALUES ('dis00786', 'Conayca', 'pro00081');
INSERT INTO `distrito` VALUES ('dis00787', 'Cuenca', 'pro00081');
INSERT INTO `distrito` VALUES ('dis00788', 'Huachocolpa', 'pro00081');
INSERT INTO `distrito` VALUES ('dis00789', 'Huayllahuara', 'pro00081');
INSERT INTO `distrito` VALUES ('dis00790', 'Izcuchaca', 'pro00081');
INSERT INTO `distrito` VALUES ('dis00791', 'Laria', 'pro00081');
INSERT INTO `distrito` VALUES ('dis00792', 'Manta', 'pro00081');
INSERT INTO `distrito` VALUES ('dis00793', 'Mariscal Caceres', 'pro00081');
INSERT INTO `distrito` VALUES ('dis00794', 'Moya', 'pro00081');
INSERT INTO `distrito` VALUES ('dis00795', 'Nuevo Occoro', 'pro00081');
INSERT INTO `distrito` VALUES ('dis00796', 'Palca', 'pro00081');
INSERT INTO `distrito` VALUES ('dis00797', 'Pilchaca', 'pro00081');
INSERT INTO `distrito` VALUES ('dis00798', 'Vilca', 'pro00081');
INSERT INTO `distrito` VALUES ('dis00799', 'Yauli', 'pro00081');
INSERT INTO `distrito` VALUES ('dis00800', 'Ascencion', 'pro00081');
INSERT INTO `distrito` VALUES ('dis00801', 'Acobamba', 'pro00082');
INSERT INTO `distrito` VALUES ('dis00802', 'Andabamba', 'pro00082');
INSERT INTO `distrito` VALUES ('dis00803', 'Anta', 'pro00082');
INSERT INTO `distrito` VALUES ('dis00804', 'Caja', 'pro00082');
INSERT INTO `distrito` VALUES ('dis00805', 'Marcas', 'pro00082');
INSERT INTO `distrito` VALUES ('dis00806', 'Paucara', 'pro00082');
INSERT INTO `distrito` VALUES ('dis00807', 'Pomacocha', 'pro00082');
INSERT INTO `distrito` VALUES ('dis00808', 'Rosario', 'pro00082');
INSERT INTO `distrito` VALUES ('dis00809', 'Lircay', 'pro00083');
INSERT INTO `distrito` VALUES ('dis00810', 'Anchonga', 'pro00083');
INSERT INTO `distrito` VALUES ('dis00811', 'Callanmarca', 'pro00083');
INSERT INTO `distrito` VALUES ('dis00812', 'Ccochaccasa', 'pro00083');
INSERT INTO `distrito` VALUES ('dis00813', 'Chincho', 'pro00083');
INSERT INTO `distrito` VALUES ('dis00814', 'Congalla', 'pro00083');
INSERT INTO `distrito` VALUES ('dis00815', 'Huanca-huanca', 'pro00083');
INSERT INTO `distrito` VALUES ('dis00816', 'Huayllay Grande', 'pro00083');
INSERT INTO `distrito` VALUES ('dis00817', 'Julcamarca', 'pro00083');
INSERT INTO `distrito` VALUES ('dis00818', 'San Antonio De Antaparco', 'pro00083');
INSERT INTO `distrito` VALUES ('dis00819', 'Santo Tomas De Pata', 'pro00083');
INSERT INTO `distrito` VALUES ('dis00820', 'Secclla', 'pro00083');
INSERT INTO `distrito` VALUES ('dis00821', 'Castrovirreyna', 'pro00084');
INSERT INTO `distrito` VALUES ('dis00822', 'Arma', 'pro00084');
INSERT INTO `distrito` VALUES ('dis00823', 'Aurahua', 'pro00084');
INSERT INTO `distrito` VALUES ('dis00824', 'Capillas', 'pro00084');
INSERT INTO `distrito` VALUES ('dis00825', 'Chupamarca', 'pro00084');
INSERT INTO `distrito` VALUES ('dis00826', 'Cocas', 'pro00084');
INSERT INTO `distrito` VALUES ('dis00827', 'Huachos', 'pro00084');
INSERT INTO `distrito` VALUES ('dis00828', 'Huamatambo', 'pro00084');
INSERT INTO `distrito` VALUES ('dis00829', 'Mollepampa', 'pro00084');
INSERT INTO `distrito` VALUES ('dis00830', 'San Juan', 'pro00084');
INSERT INTO `distrito` VALUES ('dis00831', 'Santa Ana', 'pro00084');
INSERT INTO `distrito` VALUES ('dis00832', 'Tantara', 'pro00084');
INSERT INTO `distrito` VALUES ('dis00833', 'Ticrapo', 'pro00084');
INSERT INTO `distrito` VALUES ('dis00834', 'Churcampa', 'pro00085');
INSERT INTO `distrito` VALUES ('dis00835', 'Anco', 'pro00085');
INSERT INTO `distrito` VALUES ('dis00836', 'Chinchihuasi', 'pro00085');
INSERT INTO `distrito` VALUES ('dis00837', 'El Carmen', 'pro00085');
INSERT INTO `distrito` VALUES ('dis00838', 'La Merced', 'pro00085');
INSERT INTO `distrito` VALUES ('dis00839', 'Locroja', 'pro00085');
INSERT INTO `distrito` VALUES ('dis00840', 'Pachamarca', 'pro00085');
INSERT INTO `distrito` VALUES ('dis00841', 'Paucarbamba', 'pro00085');
INSERT INTO `distrito` VALUES ('dis00842', 'San Miguel De Mayocc', 'pro00085');
INSERT INTO `distrito` VALUES ('dis00843', 'San Pedro De Coris', 'pro00085');
INSERT INTO `distrito` VALUES ('dis00844', 'Huaytara', 'pro00086');
INSERT INTO `distrito` VALUES ('dis00845', 'Ayavi', 'pro00086');
INSERT INTO `distrito` VALUES ('dis00846', 'Cordova', 'pro00086');
INSERT INTO `distrito` VALUES ('dis00847', 'Huayacundo Arma', 'pro00086');
INSERT INTO `distrito` VALUES ('dis00848', 'Laramarca', 'pro00086');
INSERT INTO `distrito` VALUES ('dis00849', 'Ocoyo', 'pro00086');
INSERT INTO `distrito` VALUES ('dis00850', 'Pilpichaca', 'pro00086');
INSERT INTO `distrito` VALUES ('dis00851', 'Querco', 'pro00086');
INSERT INTO `distrito` VALUES ('dis00852', 'Quito-arma', 'pro00086');
INSERT INTO `distrito` VALUES ('dis00853', 'San Antonio De Cusicancha', 'pro00086');
INSERT INTO `distrito` VALUES ('dis00854', 'San Francisco De Sangayaico', 'pro00086');
INSERT INTO `distrito` VALUES ('dis00855', 'San Isidro', 'pro00086');
INSERT INTO `distrito` VALUES ('dis00856', 'Santiago De Chocorvos', 'pro00086');
INSERT INTO `distrito` VALUES ('dis00857', 'Santiago De Quirahuara', 'pro00086');
INSERT INTO `distrito` VALUES ('dis00858', 'Santo Domingo De Capillas', 'pro00086');
INSERT INTO `distrito` VALUES ('dis00859', 'Tambo', 'pro00086');
INSERT INTO `distrito` VALUES ('dis00860', 'Pampas', 'pro00087');
INSERT INTO `distrito` VALUES ('dis00861', 'Acostambo', 'pro00087');
INSERT INTO `distrito` VALUES ('dis00862', 'Acraquia', 'pro00087');
INSERT INTO `distrito` VALUES ('dis00863', 'Ahuaycha', 'pro00087');
INSERT INTO `distrito` VALUES ('dis00864', 'Colcabamba', 'pro00087');
INSERT INTO `distrito` VALUES ('dis00865', 'Daniel Hernandez', 'pro00087');
INSERT INTO `distrito` VALUES ('dis00866', 'Huachocolpa', 'pro00087');
INSERT INTO `distrito` VALUES ('dis00867', 'Huando', 'pro00087');
INSERT INTO `distrito` VALUES ('dis00868', 'Huaribamba', 'pro00087');
INSERT INTO `distrito` VALUES ('dis00869', 'Ã‘ahuimpuquio', 'pro00087');
INSERT INTO `distrito` VALUES ('dis00870', 'Pazos', 'pro00087');
INSERT INTO `distrito` VALUES ('dis00871', 'Quishuar', 'pro00087');
INSERT INTO `distrito` VALUES ('dis00872', 'Salcabamba', 'pro00087');
INSERT INTO `distrito` VALUES ('dis00873', 'Salcahuasi', 'pro00087');
INSERT INTO `distrito` VALUES ('dis00874', 'San Marcos De Rocchac', 'pro00087');
INSERT INTO `distrito` VALUES ('dis00875', 'Surcubamba', 'pro00087');
INSERT INTO `distrito` VALUES ('dis00876', 'Tintay Puncu', 'pro00087');
INSERT INTO `distrito` VALUES ('dis00877', 'Huanuco', 'pro00088');
INSERT INTO `distrito` VALUES ('dis00878', 'Amarilis', 'pro00088');
INSERT INTO `distrito` VALUES ('dis00879', 'Chinchao', 'pro00088');
INSERT INTO `distrito` VALUES ('dis00880', 'Churubamba', 'pro00088');
INSERT INTO `distrito` VALUES ('dis00881', 'Margos', 'pro00088');
INSERT INTO `distrito` VALUES ('dis00882', 'Quisqui', 'pro00088');
INSERT INTO `distrito` VALUES ('dis00883', 'San Francisco De Cayran', 'pro00088');
INSERT INTO `distrito` VALUES ('dis00884', 'San Pedro De Chaulan', 'pro00088');
INSERT INTO `distrito` VALUES ('dis00885', 'Santa Maria Del Valle', 'pro00088');
INSERT INTO `distrito` VALUES ('dis00886', 'Yarumayo', 'pro00088');
INSERT INTO `distrito` VALUES ('dis00887', 'Pillco Marca', 'pro00088');
INSERT INTO `distrito` VALUES ('dis00888', 'Ambo', 'pro00089');
INSERT INTO `distrito` VALUES ('dis00889', 'Cayna', 'pro00089');
INSERT INTO `distrito` VALUES ('dis00890', 'Colpas', 'pro00089');
INSERT INTO `distrito` VALUES ('dis00891', 'Conchamarca', 'pro00089');
INSERT INTO `distrito` VALUES ('dis00892', 'Huacar', 'pro00089');
INSERT INTO `distrito` VALUES ('dis00893', 'San Francisco', 'pro00089');
INSERT INTO `distrito` VALUES ('dis00894', 'San Rafael', 'pro00089');
INSERT INTO `distrito` VALUES ('dis00895', 'Tomay Kichwa', 'pro00089');
INSERT INTO `distrito` VALUES ('dis00896', 'La Union', 'pro00090');
INSERT INTO `distrito` VALUES ('dis00897', 'Chuquis', 'pro00090');
INSERT INTO `distrito` VALUES ('dis00898', 'Marias', 'pro00090');
INSERT INTO `distrito` VALUES ('dis00899', 'Pachas', 'pro00090');
INSERT INTO `distrito` VALUES ('dis00900', 'Quivilla', 'pro00090');
INSERT INTO `distrito` VALUES ('dis00901', 'Ripan', 'pro00090');
INSERT INTO `distrito` VALUES ('dis00902', 'Shunqui', 'pro00090');
INSERT INTO `distrito` VALUES ('dis00903', 'Sillapata', 'pro00090');
INSERT INTO `distrito` VALUES ('dis00904', 'Yanas', 'pro00090');
INSERT INTO `distrito` VALUES ('dis00905', 'Huacaybamba', 'pro00091');
INSERT INTO `distrito` VALUES ('dis00906', 'Canchabamba', 'pro00091');
INSERT INTO `distrito` VALUES ('dis00907', 'Cochabamba', 'pro00091');
INSERT INTO `distrito` VALUES ('dis00908', 'Pinra', 'pro00091');
INSERT INTO `distrito` VALUES ('dis00909', 'Llata', 'pro00092');
INSERT INTO `distrito` VALUES ('dis00910', 'Arancay', 'pro00092');
INSERT INTO `distrito` VALUES ('dis00911', 'Chavin De Pariarca', 'pro00092');
INSERT INTO `distrito` VALUES ('dis00912', 'Jacas Grande', 'pro00092');
INSERT INTO `distrito` VALUES ('dis00913', 'Jircan', 'pro00092');
INSERT INTO `distrito` VALUES ('dis00914', 'Miraflores', 'pro00092');
INSERT INTO `distrito` VALUES ('dis00915', 'Monzon', 'pro00092');
INSERT INTO `distrito` VALUES ('dis00916', 'Punchao', 'pro00092');
INSERT INTO `distrito` VALUES ('dis00917', 'Puños', 'pro00092');
INSERT INTO `distrito` VALUES ('dis00918', 'Singa', 'pro00092');
INSERT INTO `distrito` VALUES ('dis00919', 'Tantamayo', 'pro00092');
INSERT INTO `distrito` VALUES ('dis00920', 'Rupa-rupa', 'pro00093');
INSERT INTO `distrito` VALUES ('dis00921', 'Daniel Alomia Robles', 'pro00093');
INSERT INTO `distrito` VALUES ('dis00922', 'Hermilio Valdizan', 'pro00093');
INSERT INTO `distrito` VALUES ('dis00923', 'Jose Crespo Y Castillo', 'pro00093');
INSERT INTO `distrito` VALUES ('dis00924', 'Luyando', 'pro00093');
INSERT INTO `distrito` VALUES ('dis00925', 'Mariano Damaso Beraun', 'pro00093');
INSERT INTO `distrito` VALUES ('dis00926', 'Huacrachuco', 'pro00094');
INSERT INTO `distrito` VALUES ('dis00927', 'Cholon', 'pro00094');
INSERT INTO `distrito` VALUES ('dis00928', 'San Buenaventura', 'pro00094');
INSERT INTO `distrito` VALUES ('dis00929', 'Panao', 'pro00095');
INSERT INTO `distrito` VALUES ('dis00930', 'Chaglla', 'pro00095');
INSERT INTO `distrito` VALUES ('dis00931', 'Molino', 'pro00095');
INSERT INTO `distrito` VALUES ('dis00932', 'Umari', 'pro00095');
INSERT INTO `distrito` VALUES ('dis00933', 'Puerto Inca', 'pro00096');
INSERT INTO `distrito` VALUES ('dis00934', 'Codo Del Pozuzo', 'pro00096');
INSERT INTO `distrito` VALUES ('dis00935', 'Honoria', 'pro00096');
INSERT INTO `distrito` VALUES ('dis00936', 'Tournavista', 'pro00096');
INSERT INTO `distrito` VALUES ('dis00937', 'Yuyapichis', 'pro00096');
INSERT INTO `distrito` VALUES ('dis00938', 'Jesus', 'pro00097');
INSERT INTO `distrito` VALUES ('dis00939', 'Baños', 'pro00097');
INSERT INTO `distrito` VALUES ('dis00940', 'Jivia', 'pro00097');
INSERT INTO `distrito` VALUES ('dis00941', 'Queropalca', 'pro00097');
INSERT INTO `distrito` VALUES ('dis00942', 'Rondos', 'pro00097');
INSERT INTO `distrito` VALUES ('dis00943', 'San Francisco De Asis', 'pro00097');
INSERT INTO `distrito` VALUES ('dis00944', 'San Miguel De Cauri', 'pro00097');
INSERT INTO `distrito` VALUES ('dis00945', 'Chavinillo', 'pro00098');
INSERT INTO `distrito` VALUES ('dis00946', 'Cahuac', 'pro00098');
INSERT INTO `distrito` VALUES ('dis00947', 'Chacabamba', 'pro00098');
INSERT INTO `distrito` VALUES ('dis00948', 'Chupan', 'pro00098');
INSERT INTO `distrito` VALUES ('dis00949', 'Jacas Chico', 'pro00098');
INSERT INTO `distrito` VALUES ('dis00950', 'Obas', 'pro00098');
INSERT INTO `distrito` VALUES ('dis00951', 'Pampamarca', 'pro00098');
INSERT INTO `distrito` VALUES ('dis00952', 'Ica', 'pro00099');
INSERT INTO `distrito` VALUES ('dis00953', 'La Tinguiña', 'pro00099');
INSERT INTO `distrito` VALUES ('dis00954', 'Los Aquijes', 'pro00099');
INSERT INTO `distrito` VALUES ('dis00955', 'Ocucaje', 'pro00099');
INSERT INTO `distrito` VALUES ('dis00956', 'Pachacutec', 'pro00099');
INSERT INTO `distrito` VALUES ('dis00957', 'Parcona', 'pro00099');
INSERT INTO `distrito` VALUES ('dis00958', 'Pueblo Nuevo', 'pro00099');
INSERT INTO `distrito` VALUES ('dis00959', 'Salas', 'pro00099');
INSERT INTO `distrito` VALUES ('dis00960', 'San Jose De Los Molinos', 'pro00099');
INSERT INTO `distrito` VALUES ('dis00961', 'San Juan Bautista', 'pro00099');
INSERT INTO `distrito` VALUES ('dis00962', 'Santiago', 'pro00099');
INSERT INTO `distrito` VALUES ('dis00963', 'Subtanjalla', 'pro00099');
INSERT INTO `distrito` VALUES ('dis00964', 'Tate', 'pro00099');
INSERT INTO `distrito` VALUES ('dis00965', 'Yauca Del Rosario', 'pro00099');
INSERT INTO `distrito` VALUES ('dis00966', 'Chincha Alta', 'pro00100');
INSERT INTO `distrito` VALUES ('dis00967', 'Alto Laran', 'pro00100');
INSERT INTO `distrito` VALUES ('dis00968', 'Chavin', 'pro00100');
INSERT INTO `distrito` VALUES ('dis00969', 'Chincha Baja', 'pro00100');
INSERT INTO `distrito` VALUES ('dis00970', 'El Carmen', 'pro00100');
INSERT INTO `distrito` VALUES ('dis00971', 'Grocio Prado', 'pro00100');
INSERT INTO `distrito` VALUES ('dis00972', 'Pueblo Nuevo', 'pro00100');
INSERT INTO `distrito` VALUES ('dis00973', 'San Juan De Yanac', 'pro00100');
INSERT INTO `distrito` VALUES ('dis00974', 'San Pedro De Huacarpana', 'pro00100');
INSERT INTO `distrito` VALUES ('dis00975', 'Sunampe', 'pro00100');
INSERT INTO `distrito` VALUES ('dis00976', 'Tambo De Mora', 'pro00100');
INSERT INTO `distrito` VALUES ('dis00977', 'Nazca', 'pro00101');
INSERT INTO `distrito` VALUES ('dis00978', 'Changuillo', 'pro00101');
INSERT INTO `distrito` VALUES ('dis00979', 'El Ingenio', 'pro00101');
INSERT INTO `distrito` VALUES ('dis00980', 'Marcona', 'pro00101');
INSERT INTO `distrito` VALUES ('dis00981', 'Vista Alegre', 'pro00101');
INSERT INTO `distrito` VALUES ('dis00982', 'Palpa', 'pro00102');
INSERT INTO `distrito` VALUES ('dis00983', 'Llipata', 'pro00102');
INSERT INTO `distrito` VALUES ('dis00984', 'Rio Grande', 'pro00102');
INSERT INTO `distrito` VALUES ('dis00985', 'Santa Cruz', 'pro00102');
INSERT INTO `distrito` VALUES ('dis00986', 'Tibillo', 'pro00102');
INSERT INTO `distrito` VALUES ('dis00987', 'Pisco', 'pro00103');
INSERT INTO `distrito` VALUES ('dis00988', 'Huancano', 'pro00103');
INSERT INTO `distrito` VALUES ('dis00989', 'Humay', 'pro00103');
INSERT INTO `distrito` VALUES ('dis00990', 'Independencia', 'pro00103');
INSERT INTO `distrito` VALUES ('dis00991', 'Paracas', 'pro00103');
INSERT INTO `distrito` VALUES ('dis00992', 'San Andres', 'pro00103');
INSERT INTO `distrito` VALUES ('dis00993', 'San Clemente', 'pro00103');
INSERT INTO `distrito` VALUES ('dis00994', 'Tupac Amaru Inca', 'pro00103');
INSERT INTO `distrito` VALUES ('dis00995', 'Huancayo', 'pro00104');
INSERT INTO `distrito` VALUES ('dis00996', 'Carhuacallanga', 'pro00104');
INSERT INTO `distrito` VALUES ('dis00997', 'Chacapampa', 'pro00104');
INSERT INTO `distrito` VALUES ('dis00998', 'Chicche', 'pro00104');
INSERT INTO `distrito` VALUES ('dis00999', 'Chilca', 'pro00104');
INSERT INTO `distrito` VALUES ('dis01000', 'Chongos Alto', 'pro00104');
INSERT INTO `distrito` VALUES ('dis01001', 'Chupuro', 'pro00104');
INSERT INTO `distrito` VALUES ('dis01002', 'Colca', 'pro00104');
INSERT INTO `distrito` VALUES ('dis01003', 'Cullhuas', 'pro00104');
INSERT INTO `distrito` VALUES ('dis01004', 'El Tambo', 'pro00104');
INSERT INTO `distrito` VALUES ('dis01005', 'Huacrapuquio', 'pro00104');
INSERT INTO `distrito` VALUES ('dis01006', 'Hualhuas', 'pro00104');
INSERT INTO `distrito` VALUES ('dis01007', 'Huancan', 'pro00104');
INSERT INTO `distrito` VALUES ('dis01008', 'Huasicancha', 'pro00104');
INSERT INTO `distrito` VALUES ('dis01009', 'Huayucachi', 'pro00104');
INSERT INTO `distrito` VALUES ('dis01010', 'Ingenio', 'pro00104');
INSERT INTO `distrito` VALUES ('dis01011', 'Pariahuanca', 'pro00104');
INSERT INTO `distrito` VALUES ('dis01012', 'Pilcomayo', 'pro00104');
INSERT INTO `distrito` VALUES ('dis01013', 'Pucara', 'pro00104');
INSERT INTO `distrito` VALUES ('dis01014', 'Quichuay', 'pro00104');
INSERT INTO `distrito` VALUES ('dis01015', 'Quilcas', 'pro00104');
INSERT INTO `distrito` VALUES ('dis01016', 'San Agustin', 'pro00104');
INSERT INTO `distrito` VALUES ('dis01017', 'San Jeronimo De Tunan', 'pro00104');
INSERT INTO `distrito` VALUES ('dis01018', 'Saño', 'pro00104');
INSERT INTO `distrito` VALUES ('dis01019', 'Santo Domingo De Acobamba', 'pro00104');
INSERT INTO `distrito` VALUES ('dis01020', 'Sapallanga', 'pro00104');
INSERT INTO `distrito` VALUES ('dis01021', 'Sicaya', 'pro00104');
INSERT INTO `distrito` VALUES ('dis01022', 'Viques', 'pro00104');
INSERT INTO `distrito` VALUES ('dis01023', 'Chanchamayo', 'pro00106');
INSERT INTO `distrito` VALUES ('dis01024', 'Perene', 'pro00106');
INSERT INTO `distrito` VALUES ('dis01025', 'Pichanaqui', 'pro00106');
INSERT INTO `distrito` VALUES ('dis01026', 'San Luis De Shuaro', 'pro00106');
INSERT INTO `distrito` VALUES ('dis01027', 'San Ramon', 'pro00106');
INSERT INTO `distrito` VALUES ('dis01028', 'Vitoc', 'pro00106');
INSERT INTO `distrito` VALUES ('dis01029', 'Concepcion', 'pro00105');
INSERT INTO `distrito` VALUES ('dis01030', 'Aco', 'pro00105');
INSERT INTO `distrito` VALUES ('dis01031', 'Andamarca', 'pro00105');
INSERT INTO `distrito` VALUES ('dis01032', 'Chambara', 'pro00105');
INSERT INTO `distrito` VALUES ('dis01033', 'Cochas', 'pro00105');
INSERT INTO `distrito` VALUES ('dis01034', 'Comas', 'pro00105');
INSERT INTO `distrito` VALUES ('dis01035', 'Heroinas Toledo', 'pro00105');
INSERT INTO `distrito` VALUES ('dis01036', 'Manzanares', 'pro00105');
INSERT INTO `distrito` VALUES ('dis01037', 'Mariscal Castilla', 'pro00105');
INSERT INTO `distrito` VALUES ('dis01038', 'Matahuasi', 'pro00105');
INSERT INTO `distrito` VALUES ('dis01039', 'Mito', 'pro00105');
INSERT INTO `distrito` VALUES ('dis01040', 'Nueve De Julio', 'pro00105');
INSERT INTO `distrito` VALUES ('dis01041', 'Orcotuna', 'pro00105');
INSERT INTO `distrito` VALUES ('dis01042', 'San Jose De Quero', 'pro00105');
INSERT INTO `distrito` VALUES ('dis01043', 'Santa Rosa De Ocopa', 'pro00105');
INSERT INTO `distrito` VALUES ('dis01044', 'Junin', 'pro00108');
INSERT INTO `distrito` VALUES ('dis01045', 'Carhuamayo', 'pro00108');
INSERT INTO `distrito` VALUES ('dis01046', 'Ondores', 'pro00108');
INSERT INTO `distrito` VALUES ('dis01047', 'Ulcumayo', 'pro00108');
INSERT INTO `distrito` VALUES ('dis01048', 'Satipo', 'pro00109');
INSERT INTO `distrito` VALUES ('dis01049', 'Coviriali', 'pro00109');
INSERT INTO `distrito` VALUES ('dis01050', 'Llaylla', 'pro00109');
INSERT INTO `distrito` VALUES ('dis01051', 'Mazamari', 'pro00109');
INSERT INTO `distrito` VALUES ('dis01052', 'Pampa Hermosa', 'pro00109');
INSERT INTO `distrito` VALUES ('dis01053', 'Pangoa', 'pro00109');
INSERT INTO `distrito` VALUES ('dis01054', 'Rio Negro', 'pro00109');
INSERT INTO `distrito` VALUES ('dis01055', 'Rio Tambo', 'pro00109');
INSERT INTO `distrito` VALUES ('dis01056', 'Jauja', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01057', 'Acolla', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01058', 'Apata', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01059', 'Ataura', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01060', 'Canchayllo', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01061', 'Curicaca', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01062', 'El Mantaro', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01063', 'Huamali', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01064', 'Huaripampa', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01065', 'Huertas', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01066', 'Janjaillo', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01067', 'Julcan', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01068', 'Leonor Ordoñez', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01069', 'Llocllapampa', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01070', 'Marco', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01071', 'Masma', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01072', 'Masma Chicche', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01073', 'Molinos', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01074', 'Monobamba', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01075', 'Muqui', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01076', 'Muquiyauyo', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01077', 'Paca', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01078', 'Paccha', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01079', 'Pancan', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01080', 'Parco', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01081', 'Pomacancha', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01082', 'Ricran', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01083', 'San Lorenzo', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01084', 'San Pedro De Chunan', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01085', 'Sausa', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01086', 'Sincos', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01087', 'Tunan Marca', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01088', 'Yauli', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01089', 'Yauyos', 'pro00107');
INSERT INTO `distrito` VALUES ('dis01090', 'Tarma', 'pro00110');
INSERT INTO `distrito` VALUES ('dis01091', 'Acobamba', 'pro00110');
INSERT INTO `distrito` VALUES ('dis01092', 'Huaricolca', 'pro00110');
INSERT INTO `distrito` VALUES ('dis01093', 'Huasahuasi', 'pro00110');
INSERT INTO `distrito` VALUES ('dis01094', 'La Union', 'pro00110');
INSERT INTO `distrito` VALUES ('dis01095', 'Palca', 'pro00110');
INSERT INTO `distrito` VALUES ('dis01096', 'Palcamayo', 'pro00110');
INSERT INTO `distrito` VALUES ('dis01097', 'San Pedro De Cajas', 'pro00110');
INSERT INTO `distrito` VALUES ('dis01098', 'Tapo', 'pro00110');
INSERT INTO `distrito` VALUES ('dis01099', 'La Oroya', 'pro00111');
INSERT INTO `distrito` VALUES ('dis01100', 'Chacapalpa', 'pro00111');
INSERT INTO `distrito` VALUES ('dis01101', 'Huay-huay', 'pro00111');
INSERT INTO `distrito` VALUES ('dis01102', 'Marcapomacocha', 'pro00111');
INSERT INTO `distrito` VALUES ('dis01103', 'Morococha', 'pro00111');
INSERT INTO `distrito` VALUES ('dis01104', 'Paccha', 'pro00111');
INSERT INTO `distrito` VALUES ('dis01105', 'Santa Barbara De Carhuacayan', 'pro00111');
INSERT INTO `distrito` VALUES ('dis01106', 'Santa Rosa De Sacco', 'pro00111');
INSERT INTO `distrito` VALUES ('dis01107', 'Suitucancha', 'pro00111');
INSERT INTO `distrito` VALUES ('dis01108', 'Yauli', 'pro00111');
INSERT INTO `distrito` VALUES ('dis01109', 'Chupaca', 'pro00112');
INSERT INTO `distrito` VALUES ('dis01110', 'Ahuac', 'pro00112');
INSERT INTO `distrito` VALUES ('dis01111', 'Chongos Bajo', 'pro00112');
INSERT INTO `distrito` VALUES ('dis01112', 'Huachac', 'pro00112');
INSERT INTO `distrito` VALUES ('dis01113', 'Huamancaca Chico', 'pro00112');
INSERT INTO `distrito` VALUES ('dis01114', 'San Juan De Yscos', 'pro00112');
INSERT INTO `distrito` VALUES ('dis01115', 'San Juan De Jarpa', 'pro00112');
INSERT INTO `distrito` VALUES ('dis01116', 'Tres De Diciembre', 'pro00112');
INSERT INTO `distrito` VALUES ('dis01117', 'Yanacancha', 'pro00112');
INSERT INTO `distrito` VALUES ('dis01118', 'Trujillo', 'pro00113');
INSERT INTO `distrito` VALUES ('dis01119', 'El Porvenir', 'pro00113');
INSERT INTO `distrito` VALUES ('dis01120', 'Florencia De Mora', 'pro00113');
INSERT INTO `distrito` VALUES ('dis01121', 'Huanchaco', 'pro00113');
INSERT INTO `distrito` VALUES ('dis01122', 'La Esperanza', 'pro00113');
INSERT INTO `distrito` VALUES ('dis01123', 'Laredo', 'pro00113');
INSERT INTO `distrito` VALUES ('dis01124', 'Moche', 'pro00113');
INSERT INTO `distrito` VALUES ('dis01125', 'Poroto', 'pro00113');
INSERT INTO `distrito` VALUES ('dis01126', 'Salaverry', 'pro00113');
INSERT INTO `distrito` VALUES ('dis01127', 'Simbal', 'pro00113');
INSERT INTO `distrito` VALUES ('dis01128', 'Victor Larco Herrera', 'pro00113');
INSERT INTO `distrito` VALUES ('dis01129', 'Ascope', 'pro00114');
INSERT INTO `distrito` VALUES ('dis01130', 'Chicama', 'pro00114');
INSERT INTO `distrito` VALUES ('dis01131', 'Chocope', 'pro00114');
INSERT INTO `distrito` VALUES ('dis01132', 'Magdalena De Cao', 'pro00114');
INSERT INTO `distrito` VALUES ('dis01133', 'Paijan', 'pro00114');
INSERT INTO `distrito` VALUES ('dis01134', 'Razuri', 'pro00114');
INSERT INTO `distrito` VALUES ('dis01135', 'Santiago De Cao', 'pro00114');
INSERT INTO `distrito` VALUES ('dis01136', 'Casa Grande', 'pro00114');
INSERT INTO `distrito` VALUES ('dis01137', 'Bolivar', 'pro00115');
INSERT INTO `distrito` VALUES ('dis01138', 'Bambamarca', 'pro00115');
INSERT INTO `distrito` VALUES ('dis01139', 'Condormarca', 'pro00115');
INSERT INTO `distrito` VALUES ('dis01140', 'Longotea', 'pro00115');
INSERT INTO `distrito` VALUES ('dis01141', 'Uchumarca', 'pro00115');
INSERT INTO `distrito` VALUES ('dis01142', 'Ucuncha', 'pro00115');
INSERT INTO `distrito` VALUES ('dis01143', 'Chepen', 'pro00116');
INSERT INTO `distrito` VALUES ('dis01144', 'Pacanga', 'pro00116');
INSERT INTO `distrito` VALUES ('dis01145', 'Pueblo Nuevo', 'pro00116');
INSERT INTO `distrito` VALUES ('dis01146', 'Julcan', 'pro00117');
INSERT INTO `distrito` VALUES ('dis01147', 'Calamarca', 'pro00117');
INSERT INTO `distrito` VALUES ('dis01148', 'Carabamba', 'pro00117');
INSERT INTO `distrito` VALUES ('dis01149', 'Huaso', 'pro00117');
INSERT INTO `distrito` VALUES ('dis01150', 'Otuzco', 'pro00118');
INSERT INTO `distrito` VALUES ('dis01151', 'Agallpampa', 'pro00118');
INSERT INTO `distrito` VALUES ('dis01152', 'Charat', 'pro00118');
INSERT INTO `distrito` VALUES ('dis01153', 'Huaranchal', 'pro00118');
INSERT INTO `distrito` VALUES ('dis01154', 'La Cuesta', 'pro00118');
INSERT INTO `distrito` VALUES ('dis01155', 'Mache', 'pro00118');
INSERT INTO `distrito` VALUES ('dis01156', 'Paranday', 'pro00118');
INSERT INTO `distrito` VALUES ('dis01157', 'Salpo', 'pro00118');
INSERT INTO `distrito` VALUES ('dis01158', 'Sinsicap', 'pro00118');
INSERT INTO `distrito` VALUES ('dis01159', 'Usquil', 'pro00118');
INSERT INTO `distrito` VALUES ('dis01160', 'Cascas', 'pro00123');
INSERT INTO `distrito` VALUES ('dis01161', 'Lucma', 'pro00123');
INSERT INTO `distrito` VALUES ('dis01162', 'Marmot', 'pro00123');
INSERT INTO `distrito` VALUES ('dis01163', 'Sayapullo', 'pro00123');
INSERT INTO `distrito` VALUES ('dis01164', 'Viru', 'pro00124');
INSERT INTO `distrito` VALUES ('dis01165', 'Chao', 'pro00124');
INSERT INTO `distrito` VALUES ('dis01166', 'Guadalupito', 'pro00124');
INSERT INTO `distrito` VALUES ('dis01167', 'San Pedro De Lloc', 'pro00119');
INSERT INTO `distrito` VALUES ('dis01168', 'Guadalupe', 'pro00119');
INSERT INTO `distrito` VALUES ('dis01169', 'Jequetepeque', 'pro00119');
INSERT INTO `distrito` VALUES ('dis01170', 'Pacasmayo', 'pro00119');
INSERT INTO `distrito` VALUES ('dis01171', 'San Jose', 'pro00119');
INSERT INTO `distrito` VALUES ('dis01172', 'Tayabamba', 'pro00120');
INSERT INTO `distrito` VALUES ('dis01173', 'Buldibuyo', 'pro00120');
INSERT INTO `distrito` VALUES ('dis01174', 'Chillia', 'pro00120');
INSERT INTO `distrito` VALUES ('dis01175', 'Huancaspata', 'pro00120');
INSERT INTO `distrito` VALUES ('dis01176', 'Huaylillas', 'pro00120');
INSERT INTO `distrito` VALUES ('dis01177', 'Huayo', 'pro00120');
INSERT INTO `distrito` VALUES ('dis01178', 'Ongon', 'pro00120');
INSERT INTO `distrito` VALUES ('dis01179', 'Parcoy', 'pro00120');
INSERT INTO `distrito` VALUES ('dis01180', 'Pataz', 'pro00120');
INSERT INTO `distrito` VALUES ('dis01181', 'Pias', 'pro00120');
INSERT INTO `distrito` VALUES ('dis01182', 'Santiago De Challas', 'pro00120');
INSERT INTO `distrito` VALUES ('dis01183', 'Taurija', 'pro00120');
INSERT INTO `distrito` VALUES ('dis01184', 'Urpay', 'pro00120');
INSERT INTO `distrito` VALUES ('dis01185', 'Huamachuco', 'pro00121');
INSERT INTO `distrito` VALUES ('dis01186', 'Chugay', 'pro00121');
INSERT INTO `distrito` VALUES ('dis01187', 'Cochorco', 'pro00121');
INSERT INTO `distrito` VALUES ('dis01188', 'Curgos', 'pro00121');
INSERT INTO `distrito` VALUES ('dis01189', 'Marcabal', 'pro00121');
INSERT INTO `distrito` VALUES ('dis01190', 'Sanagoran', 'pro00121');
INSERT INTO `distrito` VALUES ('dis01191', 'Sarin', 'pro00121');
INSERT INTO `distrito` VALUES ('dis01192', 'Sartimbamba', 'pro00121');
INSERT INTO `distrito` VALUES ('dis01193', 'Santiago De Chuco', 'pro00122');
INSERT INTO `distrito` VALUES ('dis01194', 'Angasmarca', 'pro00122');
INSERT INTO `distrito` VALUES ('dis01195', 'Cachicadan', 'pro00122');
INSERT INTO `distrito` VALUES ('dis01196', 'Mollebamba', 'pro00122');
INSERT INTO `distrito` VALUES ('dis01197', 'Mollepata', 'pro00122');
INSERT INTO `distrito` VALUES ('dis01198', 'Quiruvilca', 'pro00122');
INSERT INTO `distrito` VALUES ('dis01199', 'Santa Cruz De Chuca', 'pro00122');
INSERT INTO `distrito` VALUES ('dis01200', 'Sitabamba', 'pro00122');
INSERT INTO `distrito` VALUES ('dis01201', 'Chiclayo', 'pro00125');
INSERT INTO `distrito` VALUES ('dis01202', 'Chongoyape', 'pro00125');
INSERT INTO `distrito` VALUES ('dis01203', 'Eten', 'pro00125');
INSERT INTO `distrito` VALUES ('dis01204', 'Eten Puerto', 'pro00125');
INSERT INTO `distrito` VALUES ('dis01205', 'Jose Leonardo Ortiz', 'pro00125');
INSERT INTO `distrito` VALUES ('dis01206', 'La Victoria', 'pro00125');
INSERT INTO `distrito` VALUES ('dis01207', 'Lagunas', 'pro00125');
INSERT INTO `distrito` VALUES ('dis01208', 'Monsefu', 'pro00125');
INSERT INTO `distrito` VALUES ('dis01209', 'Nueva Arica', 'pro00125');
INSERT INTO `distrito` VALUES ('dis01210', 'Oyotun', 'pro00125');
INSERT INTO `distrito` VALUES ('dis01211', 'Picsi', 'pro00125');
INSERT INTO `distrito` VALUES ('dis01212', 'Pimentel', 'pro00125');
INSERT INTO `distrito` VALUES ('dis01213', 'Reque', 'pro00125');
INSERT INTO `distrito` VALUES ('dis01214', 'Santa Rosa', 'pro00125');
INSERT INTO `distrito` VALUES ('dis01215', 'Saña', 'pro00125');
INSERT INTO `distrito` VALUES ('dis01216', 'Santa Rosa', 'pro00125');
INSERT INTO `distrito` VALUES ('dis01217', 'Cayalti', 'pro00125');
INSERT INTO `distrito` VALUES ('dis01218', 'Patapo', 'pro00125');
INSERT INTO `distrito` VALUES ('dis01219', 'Pomalca', 'pro00125');
INSERT INTO `distrito` VALUES ('dis01220', 'Pucala', 'pro00125');
INSERT INTO `distrito` VALUES ('dis01221', 'Tuman', 'pro00125');
INSERT INTO `distrito` VALUES ('dis01222', 'Ferreñafe', 'pro00126');
INSERT INTO `distrito` VALUES ('dis01223', 'Cañaris', 'pro00126');
INSERT INTO `distrito` VALUES ('dis01224', 'Incahuasi', 'pro00126');
INSERT INTO `distrito` VALUES ('dis01225', 'Manuel Atonio Mesones Muro', 'pro00126');
INSERT INTO `distrito` VALUES ('dis01226', 'Pitipo', 'pro00126');
INSERT INTO `distrito` VALUES ('dis01227', 'Pueblo Nuevo', 'pro00126');
INSERT INTO `distrito` VALUES ('dis01228', 'Lambayeque', 'pro00127');
INSERT INTO `distrito` VALUES ('dis01229', 'Chochope', 'pro00127');
INSERT INTO `distrito` VALUES ('dis01230', 'Illimo', 'pro00127');
INSERT INTO `distrito` VALUES ('dis01231', 'Jayanca', 'pro00127');
INSERT INTO `distrito` VALUES ('dis01232', 'Mochumi', 'pro00127');
INSERT INTO `distrito` VALUES ('dis01233', 'Morrope', 'pro00127');
INSERT INTO `distrito` VALUES ('dis01234', 'Motupe', 'pro00127');
INSERT INTO `distrito` VALUES ('dis01235', 'Olmos', 'pro00127');
INSERT INTO `distrito` VALUES ('dis01236', 'Pacora', 'pro00127');
INSERT INTO `distrito` VALUES ('dis01237', 'Salas', 'pro00127');
INSERT INTO `distrito` VALUES ('dis01238', 'San Jose', 'pro00127');
INSERT INTO `distrito` VALUES ('dis01239', 'Tucume', 'pro00127');
INSERT INTO `distrito` VALUES ('dis01240', 'Lima', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01241', 'Ancon', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01242', 'Ate', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01243', 'Barranco', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01244', 'Breña', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01245', 'Carabayllo', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01246', 'Chaclacayo', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01247', 'Chorrillos', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01248', 'Cieneguilla', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01249', 'Comas', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01250', 'El Agustino', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01251', 'Independencia', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01252', 'Jesus Maria', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01253', 'La Molina', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01254', 'La Victoria', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01255', 'Lince', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01256', 'Los Olivos', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01257', 'Lurigancho', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01258', 'Lurin', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01259', 'Magdalena Del Mar', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01260', 'Magdalena Vieja', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01261', 'Miraflores', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01262', 'Pachacamac', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01263', 'Pucusana', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01264', 'Puente Piedra', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01265', 'Punta Hermosa', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01266', 'Punta Negra', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01267', 'Rimac', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01268', 'San Bartolo', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01269', 'San Borja', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01270', 'San Isidro', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01271', 'San Juan De Lurigancho', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01272', 'San Juan De Miraflores', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01273', 'San Luis', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01274', 'San Martin De Porres', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01275', 'San Miguel', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01276', 'Santa Anita', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01277', 'Santa Maria Del Mar', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01278', 'Santa Rosa', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01279', 'Santiago De Surco', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01280', 'Surquillo', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01281', 'Villa El Salvador', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01282', 'Villa Maria Del Triunfo', 'pro00128');
INSERT INTO `distrito` VALUES ('dis01283', 'Barranca', 'pro00129');
INSERT INTO `distrito` VALUES ('dis01284', 'Paramonga', 'pro00129');
INSERT INTO `distrito` VALUES ('dis01285', 'Pativilca', 'pro00129');
INSERT INTO `distrito` VALUES ('dis01286', 'Supe', 'pro00129');
INSERT INTO `distrito` VALUES ('dis01287', 'Supe Puerto', 'pro00129');
INSERT INTO `distrito` VALUES ('dis01288', 'Cajatambo', 'pro00130');
INSERT INTO `distrito` VALUES ('dis01289', 'Copa', 'pro00130');
INSERT INTO `distrito` VALUES ('dis01290', 'Gorgor', 'pro00130');
INSERT INTO `distrito` VALUES ('dis01291', 'Huancapon', 'pro00130');
INSERT INTO `distrito` VALUES ('dis01292', 'Manas', 'pro00130');
INSERT INTO `distrito` VALUES ('dis01293', 'San Vicente De Cañete', 'pro00132');
INSERT INTO `distrito` VALUES ('dis01294', 'Asia', 'pro00132');
INSERT INTO `distrito` VALUES ('dis01295', 'Calango', 'pro00132');
INSERT INTO `distrito` VALUES ('dis01296', 'Cerro Azul', 'pro00132');
INSERT INTO `distrito` VALUES ('dis01297', 'Chilca', 'pro00132');
INSERT INTO `distrito` VALUES ('dis01298', 'Coayllo', 'pro00132');
INSERT INTO `distrito` VALUES ('dis01299', 'Imperial', 'pro00132');
INSERT INTO `distrito` VALUES ('dis01300', 'Lunahuana', 'pro00132');
INSERT INTO `distrito` VALUES ('dis01301', 'Mala', 'pro00132');
INSERT INTO `distrito` VALUES ('dis01302', 'Nuevo Imperial', 'pro00132');
INSERT INTO `distrito` VALUES ('dis01303', 'Pacaran', 'pro00132');
INSERT INTO `distrito` VALUES ('dis01304', 'Quilmana', 'pro00132');
INSERT INTO `distrito` VALUES ('dis01305', 'San Antonio', 'pro00132');
INSERT INTO `distrito` VALUES ('dis01306', 'San Luis', 'pro00132');
INSERT INTO `distrito` VALUES ('dis01307', 'Santa Cruz De Flores', 'pro00132');
INSERT INTO `distrito` VALUES ('dis01308', 'Zuñiga', 'pro00132');
INSERT INTO `distrito` VALUES ('dis01309', 'Canta', 'pro00131');
INSERT INTO `distrito` VALUES ('dis01310', 'Arahuay', 'pro00131');
INSERT INTO `distrito` VALUES ('dis01311', 'Huamantanga', 'pro00131');
INSERT INTO `distrito` VALUES ('dis01312', 'Huaros', 'pro00131');
INSERT INTO `distrito` VALUES ('dis01313', 'Lachaqui', 'pro00131');
INSERT INTO `distrito` VALUES ('dis01314', 'San Buenaventura', 'pro00131');
INSERT INTO `distrito` VALUES ('dis01315', 'Santa Rosa De Quives', 'pro00131');
INSERT INTO `distrito` VALUES ('dis01316', 'Huaral', 'pro00133');
INSERT INTO `distrito` VALUES ('dis01317', 'Atavillos Alto', 'pro00133');
INSERT INTO `distrito` VALUES ('dis01318', 'Atavillos Bajo', 'pro00133');
INSERT INTO `distrito` VALUES ('dis01319', 'Aucallama', 'pro00133');
INSERT INTO `distrito` VALUES ('dis01320', 'Chancay', 'pro00133');
INSERT INTO `distrito` VALUES ('dis01321', 'Ihuari', 'pro00133');
INSERT INTO `distrito` VALUES ('dis01322', 'Lampian', 'pro00133');
INSERT INTO `distrito` VALUES ('dis01323', 'Pacaraos', 'pro00133');
INSERT INTO `distrito` VALUES ('dis01324', 'San Miguel De Acos', 'pro00133');
INSERT INTO `distrito` VALUES ('dis01325', 'Santa Cruz De Andamarca', 'pro00133');
INSERT INTO `distrito` VALUES ('dis01326', 'Sumbilca', 'pro00133');
INSERT INTO `distrito` VALUES ('dis01327', 'Veintisiete De Noviembre', 'pro00133');
INSERT INTO `distrito` VALUES ('dis01328', 'Matucana', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01329', 'Antioquia', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01330', 'Callahuanca', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01331', 'Carampoma', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01332', 'Chicla', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01333', 'Cuenca', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01334', 'Huachupampa', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01335', 'Huanza', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01336', 'Huarochiri', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01337', 'Lahuaytambo', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01338', 'Langa', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01339', 'Laraos', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01340', 'Mariatana', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01341', 'Ricardo Palma', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01342', 'San Andres De Tupicocha', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01343', 'San Antonio', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01344', 'San Bartolome', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01345', 'San Damian', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01346', 'San Juan De Iris', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01347', 'San Juan De Tantaranche', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01348', 'San Lorenzo De Quinti', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01349', 'San Mateo', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01350', 'San Mateo De Otao', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01351', 'San Pedro De Casta', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01352', 'San Pedro De Huancayre', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01353', 'Sangallaya', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01354', 'Santa Cruz De Cocachacra', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01355', 'Santa Eulalia', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01356', 'Santiago De Anchucaya', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01357', 'Santiago De Tuna', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01358', 'Santo Domingo De Los Olleros', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01359', 'Surco', 'pro00134');
INSERT INTO `distrito` VALUES ('dis01360', 'Huacho', 'pro00135');
INSERT INTO `distrito` VALUES ('dis01361', 'Ambar', 'pro00135');
INSERT INTO `distrito` VALUES ('dis01362', 'Caleta De Carquin', 'pro00135');
INSERT INTO `distrito` VALUES ('dis01363', 'Checras', 'pro00135');
INSERT INTO `distrito` VALUES ('dis01364', 'Hualmay', 'pro00135');
INSERT INTO `distrito` VALUES ('dis01365', 'Huaura', 'pro00135');
INSERT INTO `distrito` VALUES ('dis01366', 'Leoncio Prado', 'pro00135');
INSERT INTO `distrito` VALUES ('dis01367', 'Paccho', 'pro00135');
INSERT INTO `distrito` VALUES ('dis01368', 'Santa Leonor', 'pro00135');
INSERT INTO `distrito` VALUES ('dis01369', 'Santa Maria', 'pro00135');
INSERT INTO `distrito` VALUES ('dis01370', 'Sayan', 'pro00135');
INSERT INTO `distrito` VALUES ('dis01371', 'Vegueta', 'pro00135');
INSERT INTO `distrito` VALUES ('dis01372', 'Oyon', 'pro00136');
INSERT INTO `distrito` VALUES ('dis01373', 'Andajes', 'pro00136');
INSERT INTO `distrito` VALUES ('dis01374', 'Caujul', 'pro00136');
INSERT INTO `distrito` VALUES ('dis01375', 'Cochamarca', 'pro00136');
INSERT INTO `distrito` VALUES ('dis01376', 'Navan', 'pro00136');
INSERT INTO `distrito` VALUES ('dis01377', 'Pachangara', 'pro00136');
INSERT INTO `distrito` VALUES ('dis01378', 'Yauyos', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01379', 'Alis', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01380', 'Ayauca', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01381', 'Ayaviri', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01382', 'Azangaro', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01383', 'Cacra', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01384', 'Carania', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01385', 'Catahuasi', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01386', 'Chocos', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01387', 'Cochas', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01388', 'Colonia', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01389', 'Hongos', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01390', 'Huampara', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01391', 'Huancaya', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01392', 'Huangascar', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01393', 'Huantan', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01394', 'Huañec', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01395', 'Laraos', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01396', 'Lincha', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01397', 'Madean', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01398', 'Miraflores', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01399', 'Omas', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01400', 'Putinza', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01401', 'Quinches', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01402', 'Quinocay', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01403', 'San Joaquin', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01404', 'San Pedro De Pilas', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01405', 'Tanta', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01406', 'Tauripampa', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01407', 'Tomas', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01408', 'Tupe', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01409', 'Viñac', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01410', 'Vitis', 'pro00137');
INSERT INTO `distrito` VALUES ('dis01411', 'Callao', 'pro00067');
INSERT INTO `distrito` VALUES ('dis01412', 'Bellavista', 'pro00067');
INSERT INTO `distrito` VALUES ('dis01413', 'Carmen De La Legua Reynoso', 'pro00067');
INSERT INTO `distrito` VALUES ('dis01414', 'La Perla', 'pro00067');
INSERT INTO `distrito` VALUES ('dis01415', 'La Punta', 'pro00067');
INSERT INTO `distrito` VALUES ('dis01416', 'Ventanilla', 'pro00067');
INSERT INTO `distrito` VALUES ('dis01417', 'Iquitos', 'pro00138');
INSERT INTO `distrito` VALUES ('dis01418', 'Alto Nanay', 'pro00138');
INSERT INTO `distrito` VALUES ('dis01419', 'Fernando Lores', 'pro00138');
INSERT INTO `distrito` VALUES ('dis01420', 'Indiana', 'pro00138');
INSERT INTO `distrito` VALUES ('dis01421', 'Las Amazonas', 'pro00138');
INSERT INTO `distrito` VALUES ('dis01422', 'Mazan', 'pro00138');
INSERT INTO `distrito` VALUES ('dis01423', 'Napo', 'pro00138');
INSERT INTO `distrito` VALUES ('dis01424', 'Punchana', 'pro00138');
INSERT INTO `distrito` VALUES ('dis01425', 'Putumayo', 'pro00138');
INSERT INTO `distrito` VALUES ('dis01426', 'Torres Causana', 'pro00138');
INSERT INTO `distrito` VALUES ('dis01427', 'Belen', 'pro00138');
INSERT INTO `distrito` VALUES ('dis01428', 'San Juan Bautista', 'pro00138');
INSERT INTO `distrito` VALUES ('dis01429', 'Yurimaguas', 'pro00139');
INSERT INTO `distrito` VALUES ('dis01430', 'Balsapuerto', 'pro00139');
INSERT INTO `distrito` VALUES ('dis01431', 'Barranca', 'pro00139');
INSERT INTO `distrito` VALUES ('dis01432', 'Cahuapanas', 'pro00139');
INSERT INTO `distrito` VALUES ('dis01433', 'Jeberos', 'pro00139');
INSERT INTO `distrito` VALUES ('dis01434', 'Lagunas', 'pro00139');
INSERT INTO `distrito` VALUES ('dis01435', 'Manseriche', 'pro00139');
INSERT INTO `distrito` VALUES ('dis01436', 'Morona', 'pro00139');
INSERT INTO `distrito` VALUES ('dis01437', 'Pastaza', 'pro00139');
INSERT INTO `distrito` VALUES ('dis01438', 'Santa Cruz', 'pro00139');
INSERT INTO `distrito` VALUES ('dis01439', 'Teniente Cesar Lopez Rojas', 'pro00139');
INSERT INTO `distrito` VALUES ('dis01440', 'Nauta', 'pro00140');
INSERT INTO `distrito` VALUES ('dis01441', 'Parinari', 'pro00140');
INSERT INTO `distrito` VALUES ('dis01442', 'Tigre', 'pro00140');
INSERT INTO `distrito` VALUES ('dis01443', 'Trompeteros', 'pro00140');
INSERT INTO `distrito` VALUES ('dis01444', 'Urarinas', 'pro00140');
INSERT INTO `distrito` VALUES ('dis01445', 'Ramon Castilla', 'pro00141');
INSERT INTO `distrito` VALUES ('dis01446', 'Pebas', 'pro00141');
INSERT INTO `distrito` VALUES ('dis01447', 'Yavari', 'pro00141');
INSERT INTO `distrito` VALUES ('dis01448', 'San Pablo', 'pro00141');
INSERT INTO `distrito` VALUES ('dis01449', 'Requena', 'pro00142');
INSERT INTO `distrito` VALUES ('dis01450', 'Alto Tapiche', 'pro00142');
INSERT INTO `distrito` VALUES ('dis01451', 'Capelo', 'pro00142');
INSERT INTO `distrito` VALUES ('dis01452', 'Emilio San Martin', 'pro00142');
INSERT INTO `distrito` VALUES ('dis01453', 'Maquia', 'pro00142');
INSERT INTO `distrito` VALUES ('dis01454', 'Puinahua', 'pro00142');
INSERT INTO `distrito` VALUES ('dis01455', 'Saquena', 'pro00142');
INSERT INTO `distrito` VALUES ('dis01456', 'Soplin', 'pro00142');
INSERT INTO `distrito` VALUES ('dis01457', 'Tapiche', 'pro00142');
INSERT INTO `distrito` VALUES ('dis01458', 'Yaquerana', 'pro00142');
INSERT INTO `distrito` VALUES ('dis01459', 'Jenaro Herrera', 'pro00142');
INSERT INTO `distrito` VALUES ('dis01460', 'Contamana', 'pro00143');
INSERT INTO `distrito` VALUES ('dis01461', 'Inahuaya', 'pro00143');
INSERT INTO `distrito` VALUES ('dis01462', 'Padre Marquez', 'pro00143');
INSERT INTO `distrito` VALUES ('dis01463', 'Pampa Hermosa', 'pro00143');
INSERT INTO `distrito` VALUES ('dis01464', 'Sarayacu', 'pro00143');
INSERT INTO `distrito` VALUES ('dis01465', 'Vargas Guerra', 'pro00143');
INSERT INTO `distrito` VALUES ('dis01466', 'Tambopata', 'pro00145');
INSERT INTO `distrito` VALUES ('dis01467', 'Inambari', 'pro00145');
INSERT INTO `distrito` VALUES ('dis01468', 'Las Piedras', 'pro00145');
INSERT INTO `distrito` VALUES ('dis01469', 'Laberinto', 'pro00145');
INSERT INTO `distrito` VALUES ('dis01470', 'Fitzcarrald', 'pro00146');
INSERT INTO `distrito` VALUES ('dis01471', 'Manu', 'pro00146');
INSERT INTO `distrito` VALUES ('dis01472', 'Madre De Dios', 'pro00146');
INSERT INTO `distrito` VALUES ('dis01473', 'Heupetuhe', 'pro00146');
INSERT INTO `distrito` VALUES ('dis01474', 'Iñapari', 'pro00147');
INSERT INTO `distrito` VALUES ('dis01475', 'Iberia', 'pro00147');
INSERT INTO `distrito` VALUES ('dis01476', 'Tahuamanu', 'pro00147');
INSERT INTO `distrito` VALUES ('dis01477', 'Moquegua', 'pro00148');
INSERT INTO `distrito` VALUES ('dis01478', 'Carumas', 'pro00148');
INSERT INTO `distrito` VALUES ('dis01479', 'Cuchumbaya', 'pro00148');
INSERT INTO `distrito` VALUES ('dis01480', 'Samegua', 'pro00148');
INSERT INTO `distrito` VALUES ('dis01481', 'San Cristobal', 'pro00148');
INSERT INTO `distrito` VALUES ('dis01482', 'Torata', 'pro00148');
INSERT INTO `distrito` VALUES ('dis01483', 'Omate', 'pro00149');
INSERT INTO `distrito` VALUES ('dis01484', 'Chojata', 'pro00149');
INSERT INTO `distrito` VALUES ('dis01485', 'Coalaque', 'pro00149');
INSERT INTO `distrito` VALUES ('dis01486', 'Ichuña', 'pro00149');
INSERT INTO `distrito` VALUES ('dis01487', 'La Capilla', 'pro00149');
INSERT INTO `distrito` VALUES ('dis01488', 'Lloque', 'pro00149');
INSERT INTO `distrito` VALUES ('dis01489', 'Matalaque', 'pro00149');
INSERT INTO `distrito` VALUES ('dis01490', 'Puquina', 'pro00149');
INSERT INTO `distrito` VALUES ('dis01491', 'Quinistaquillas', 'pro00149');
INSERT INTO `distrito` VALUES ('dis01492', 'Ubinas', 'pro00149');
INSERT INTO `distrito` VALUES ('dis01493', 'Yunga', 'pro00149');
INSERT INTO `distrito` VALUES ('dis01494', 'Ilo', 'pro00150');
INSERT INTO `distrito` VALUES ('dis01495', 'El Algarrobal', 'pro00150');
INSERT INTO `distrito` VALUES ('dis01496', 'Pacocha', 'pro00150');
INSERT INTO `distrito` VALUES ('dis01497', 'Chaupimarca', 'pro00151');
INSERT INTO `distrito` VALUES ('dis01498', 'Huachon', 'pro00151');
INSERT INTO `distrito` VALUES ('dis01499', 'Huariaca', 'pro00151');
INSERT INTO `distrito` VALUES ('dis01500', 'Huayllay', 'pro00151');
INSERT INTO `distrito` VALUES ('dis01501', 'Ninacaca', 'pro00151');
INSERT INTO `distrito` VALUES ('dis01502', 'Pallanchacra', 'pro00151');
INSERT INTO `distrito` VALUES ('dis01503', 'Paucartambo', 'pro00151');
INSERT INTO `distrito` VALUES ('dis01504', 'San Fco.de Asis De Yarusyacan', 'pro00151');
INSERT INTO `distrito` VALUES ('dis01505', 'Simon Bolivar', 'pro00151');
INSERT INTO `distrito` VALUES ('dis01506', 'Ticlacayan', 'pro00151');
INSERT INTO `distrito` VALUES ('dis01507', 'Tinyahuarco', 'pro00151');
INSERT INTO `distrito` VALUES ('dis01508', 'Vicco', 'pro00151');
INSERT INTO `distrito` VALUES ('dis01509', 'Yanacancha', 'pro00151');
INSERT INTO `distrito` VALUES ('dis01510', 'Yanahuanca', 'pro00152');
INSERT INTO `distrito` VALUES ('dis01511', 'Chacayan', 'pro00152');
INSERT INTO `distrito` VALUES ('dis01512', 'Goyllarisquizga', 'pro00152');
INSERT INTO `distrito` VALUES ('dis01513', 'Paucar', 'pro00152');
INSERT INTO `distrito` VALUES ('dis01514', 'San Pedro De Pillao', 'pro00152');
INSERT INTO `distrito` VALUES ('dis01515', 'Santa Ana De Tusi', 'pro00152');
INSERT INTO `distrito` VALUES ('dis01516', 'Tapuc', 'pro00152');
INSERT INTO `distrito` VALUES ('dis01517', 'Vilcabamba', 'pro00152');
INSERT INTO `distrito` VALUES ('dis01518', 'Oxapampa', 'pro00153');
INSERT INTO `distrito` VALUES ('dis01519', 'Chontabamba', 'pro00153');
INSERT INTO `distrito` VALUES ('dis01520', 'Huancabamba', 'pro00153');
INSERT INTO `distrito` VALUES ('dis01521', 'Palcazu', 'pro00153');
INSERT INTO `distrito` VALUES ('dis01522', 'Pozuzo', 'pro00153');
INSERT INTO `distrito` VALUES ('dis01523', 'Puerto Bermudez', 'pro00153');
INSERT INTO `distrito` VALUES ('dis01524', 'Villa Rica', 'pro00153');
INSERT INTO `distrito` VALUES ('dis01525', 'Piura', 'pro00154');
INSERT INTO `distrito` VALUES ('dis01526', 'Castilla', 'pro00154');
INSERT INTO `distrito` VALUES ('dis01527', 'Catacaos', 'pro00154');
INSERT INTO `distrito` VALUES ('dis01528', 'Cura Mori', 'pro00154');
INSERT INTO `distrito` VALUES ('dis01529', 'El Tallan', 'pro00154');
INSERT INTO `distrito` VALUES ('dis01530', 'La Arena', 'pro00154');
INSERT INTO `distrito` VALUES ('dis01531', 'La Union', 'pro00154');
INSERT INTO `distrito` VALUES ('dis01532', 'Las Lomas', 'pro00154');
INSERT INTO `distrito` VALUES ('dis01533', 'Tambo Grande', 'pro00154');
INSERT INTO `distrito` VALUES ('dis01534', 'Ayabaca', 'pro00155');
INSERT INTO `distrito` VALUES ('dis01535', 'Frias', 'pro00155');
INSERT INTO `distrito` VALUES ('dis01536', 'Jilili', 'pro00155');
INSERT INTO `distrito` VALUES ('dis01537', 'Lagunas', 'pro00155');
INSERT INTO `distrito` VALUES ('dis01538', 'Montero', 'pro00155');
INSERT INTO `distrito` VALUES ('dis01539', 'Pacaipampa', 'pro00155');
INSERT INTO `distrito` VALUES ('dis01540', 'Paimas', 'pro00155');
INSERT INTO `distrito` VALUES ('dis01541', 'Sapillica', 'pro00155');
INSERT INTO `distrito` VALUES ('dis01542', 'Sicchez', 'pro00155');
INSERT INTO `distrito` VALUES ('dis01543', 'Suyo', 'pro00155');
INSERT INTO `distrito` VALUES ('dis01544', 'Huancabamba', 'pro00156');
INSERT INTO `distrito` VALUES ('dis01545', 'Canchaque', 'pro00156');
INSERT INTO `distrito` VALUES ('dis01546', 'El Carmen De La Frontera', 'pro00156');
INSERT INTO `distrito` VALUES ('dis01547', 'Huarmaca', 'pro00156');
INSERT INTO `distrito` VALUES ('dis01548', 'Lalaquiz', 'pro00156');
INSERT INTO `distrito` VALUES ('dis01549', 'San Miguel De El Faique', 'pro00156');
INSERT INTO `distrito` VALUES ('dis01550', 'Sondor', 'pro00156');
INSERT INTO `distrito` VALUES ('dis01551', 'Sondorillo', 'pro00156');
INSERT INTO `distrito` VALUES ('dis01552', 'Paita', 'pro00158');
INSERT INTO `distrito` VALUES ('dis01553', 'Amotape', 'pro00158');
INSERT INTO `distrito` VALUES ('dis01554', 'Arenal', 'pro00158');
INSERT INTO `distrito` VALUES ('dis01555', 'Colan', 'pro00158');
INSERT INTO `distrito` VALUES ('dis01556', 'La Huaca', 'pro00158');
INSERT INTO `distrito` VALUES ('dis01557', 'Tamarindo', 'pro00158');
INSERT INTO `distrito` VALUES ('dis01558', 'Vichayal', 'pro00158');
INSERT INTO `distrito` VALUES ('dis01559', 'Chulucanas', 'pro00157');
INSERT INTO `distrito` VALUES ('dis01560', 'Buenos Aires', 'pro00157');
INSERT INTO `distrito` VALUES ('dis01561', 'Chalaco', 'pro00157');
INSERT INTO `distrito` VALUES ('dis01562', 'La Matanza', 'pro00157');
INSERT INTO `distrito` VALUES ('dis01563', 'Morropon', 'pro00157');
INSERT INTO `distrito` VALUES ('dis01564', 'Salitral', 'pro00157');
INSERT INTO `distrito` VALUES ('dis01565', 'San Juan De Bigote', 'pro00157');
INSERT INTO `distrito` VALUES ('dis01566', 'Santa Catalina De Mossa', 'pro00157');
INSERT INTO `distrito` VALUES ('dis01567', 'Santo Domingo', 'pro00157');
INSERT INTO `distrito` VALUES ('dis01568', 'Yamango', 'pro00157');
INSERT INTO `distrito` VALUES ('dis01569', 'Sechura', 'pro00161');
INSERT INTO `distrito` VALUES ('dis01570', 'Bellavista La Union', 'pro00161');
INSERT INTO `distrito` VALUES ('dis01571', 'Bernal', 'pro00161');
INSERT INTO `distrito` VALUES ('dis01572', 'Cristo Nos Valga', 'pro00161');
INSERT INTO `distrito` VALUES ('dis01573', 'Rinconada Llicuar', 'pro00161');
INSERT INTO `distrito` VALUES ('dis01574', 'Vice', 'pro00161');
INSERT INTO `distrito` VALUES ('dis01575', 'Sullana', 'pro00159');
INSERT INTO `distrito` VALUES ('dis01576', 'Bellavista', 'pro00159');
INSERT INTO `distrito` VALUES ('dis01577', 'Ignacio Escudero', 'pro00159');
INSERT INTO `distrito` VALUES ('dis01578', 'Lancones', 'pro00159');
INSERT INTO `distrito` VALUES ('dis01579', 'Marcavelica', 'pro00159');
INSERT INTO `distrito` VALUES ('dis01580', 'Miguel Checa', 'pro00159');
INSERT INTO `distrito` VALUES ('dis01581', 'Querecotillo', 'pro00159');
INSERT INTO `distrito` VALUES ('dis01582', 'Salitral', 'pro00159');
INSERT INTO `distrito` VALUES ('dis01583', 'Pariñas', 'pro00160');
INSERT INTO `distrito` VALUES ('dis01584', 'El Alto', 'pro00160');
INSERT INTO `distrito` VALUES ('dis01585', 'La Brea', 'pro00160');
INSERT INTO `distrito` VALUES ('dis01586', 'Lobitos', 'pro00160');
INSERT INTO `distrito` VALUES ('dis01587', 'Los Organos', 'pro00160');
INSERT INTO `distrito` VALUES ('dis01588', 'Mancora', 'pro00160');
INSERT INTO `distrito` VALUES ('dis01589', 'Puno', 'pro00162');
INSERT INTO `distrito` VALUES ('dis01590', 'Acora', 'pro00162');
INSERT INTO `distrito` VALUES ('dis01591', 'Amantani', 'pro00162');
INSERT INTO `distrito` VALUES ('dis01592', 'Atuncolla', 'pro00162');
INSERT INTO `distrito` VALUES ('dis01593', 'Capachica', 'pro00162');
INSERT INTO `distrito` VALUES ('dis01594', 'Chucuito', 'pro00162');
INSERT INTO `distrito` VALUES ('dis01595', 'Coata', 'pro00162');
INSERT INTO `distrito` VALUES ('dis01596', 'Huata', 'pro00162');
INSERT INTO `distrito` VALUES ('dis01597', 'Mañazo', 'pro00162');
INSERT INTO `distrito` VALUES ('dis01598', 'Paucarcolla', 'pro00162');
INSERT INTO `distrito` VALUES ('dis01599', 'Pichacani', 'pro00162');
INSERT INTO `distrito` VALUES ('dis01600', 'Plateria', 'pro00162');
INSERT INTO `distrito` VALUES ('dis01601', 'San Antonio', 'pro00162');
INSERT INTO `distrito` VALUES ('dis01602', 'Tiquillaca', 'pro00162');
INSERT INTO `distrito` VALUES ('dis01603', 'Vilque', 'pro00162');
INSERT INTO `distrito` VALUES ('dis01604', 'Azangaro', 'pro00163');
INSERT INTO `distrito` VALUES ('dis01605', 'Achaya', 'pro00163');
INSERT INTO `distrito` VALUES ('dis01606', 'Arapa', 'pro00163');
INSERT INTO `distrito` VALUES ('dis01607', 'Asillo', 'pro00163');
INSERT INTO `distrito` VALUES ('dis01608', 'Caminaca', 'pro00163');
INSERT INTO `distrito` VALUES ('dis01609', 'Chupa', 'pro00163');
INSERT INTO `distrito` VALUES ('dis01610', 'Jose Domingo Choquehuanca', 'pro00163');
INSERT INTO `distrito` VALUES ('dis01611', 'Muñani', 'pro00163');
INSERT INTO `distrito` VALUES ('dis01612', 'Potoni', 'pro00163');
INSERT INTO `distrito` VALUES ('dis01613', 'Saman', 'pro00163');
INSERT INTO `distrito` VALUES ('dis01614', 'San Anton', 'pro00163');
INSERT INTO `distrito` VALUES ('dis01615', 'San Jose', 'pro00163');
INSERT INTO `distrito` VALUES ('dis01616', 'San Juan De Salinas', 'pro00163');
INSERT INTO `distrito` VALUES ('dis01617', 'Santiago De Pupuja', 'pro00163');
INSERT INTO `distrito` VALUES ('dis01618', 'Tirapata', 'pro00163');
INSERT INTO `distrito` VALUES ('dis01619', 'Macusani', 'pro00164');
INSERT INTO `distrito` VALUES ('dis01620', 'Ajoyani', 'pro00164');
INSERT INTO `distrito` VALUES ('dis01621', 'Ayapata', 'pro00164');
INSERT INTO `distrito` VALUES ('dis01622', 'Coasa', 'pro00164');
INSERT INTO `distrito` VALUES ('dis01623', 'Corani', 'pro00164');
INSERT INTO `distrito` VALUES ('dis01624', 'Crucero', 'pro00164');
INSERT INTO `distrito` VALUES ('dis01625', 'Ituata', 'pro00164');
INSERT INTO `distrito` VALUES ('dis01626', 'Ollachea', 'pro00164');
INSERT INTO `distrito` VALUES ('dis01627', 'San Gaban', 'pro00164');
INSERT INTO `distrito` VALUES ('dis01628', 'Usicayos', 'pro00164');
INSERT INTO `distrito` VALUES ('dis01629', 'Juli', 'pro00165');
INSERT INTO `distrito` VALUES ('dis01630', 'Desaguadero', 'pro00165');
INSERT INTO `distrito` VALUES ('dis01631', 'Huacullani', 'pro00165');
INSERT INTO `distrito` VALUES ('dis01632', 'Kelluyo', 'pro00165');
INSERT INTO `distrito` VALUES ('dis01633', 'Pisacoma', 'pro00165');
INSERT INTO `distrito` VALUES ('dis01634', 'Pomata', 'pro00165');
INSERT INTO `distrito` VALUES ('dis01635', 'Zepita', 'pro00165');
INSERT INTO `distrito` VALUES ('dis01636', 'Ilave', 'pro00166');
INSERT INTO `distrito` VALUES ('dis01637', 'Capazo', 'pro00166');
INSERT INTO `distrito` VALUES ('dis01638', 'Pilcuyo', 'pro00166');
INSERT INTO `distrito` VALUES ('dis01639', 'Santa Rosa', 'pro00166');
INSERT INTO `distrito` VALUES ('dis01640', 'Conduriri', 'pro00166');
INSERT INTO `distrito` VALUES ('dis01641', 'Huancane', 'pro00167');
INSERT INTO `distrito` VALUES ('dis01642', 'Cojata', 'pro00167');
INSERT INTO `distrito` VALUES ('dis01643', 'Huatasani', 'pro00167');
INSERT INTO `distrito` VALUES ('dis01644', 'Inchupalla', 'pro00167');
INSERT INTO `distrito` VALUES ('dis01645', 'Pusi', 'pro00167');
INSERT INTO `distrito` VALUES ('dis01646', 'Rosaspata', 'pro00167');
INSERT INTO `distrito` VALUES ('dis01647', 'Taraco', 'pro00167');
INSERT INTO `distrito` VALUES ('dis01648', 'Vilque Chico', 'pro00167');
INSERT INTO `distrito` VALUES ('dis01649', 'Lampa', 'pro00168');
INSERT INTO `distrito` VALUES ('dis01650', 'Cabanilla', 'pro00168');
INSERT INTO `distrito` VALUES ('dis01651', 'Calapuja', 'pro00168');
INSERT INTO `distrito` VALUES ('dis01652', 'Nicasio', 'pro00168');
INSERT INTO `distrito` VALUES ('dis01653', 'Ocuviri', 'pro00168');
INSERT INTO `distrito` VALUES ('dis01654', 'Palca', 'pro00168');
INSERT INTO `distrito` VALUES ('dis01655', 'Paratia', 'pro00168');
INSERT INTO `distrito` VALUES ('dis01656', 'Pucara', 'pro00168');
INSERT INTO `distrito` VALUES ('dis01657', 'Santa Lucia', 'pro00168');
INSERT INTO `distrito` VALUES ('dis01658', 'Vilavila', 'pro00168');
INSERT INTO `distrito` VALUES ('dis01659', 'Ayaviri', 'pro00169');
INSERT INTO `distrito` VALUES ('dis01660', 'Antauta', 'pro00169');
INSERT INTO `distrito` VALUES ('dis01661', 'Cupi', 'pro00169');
INSERT INTO `distrito` VALUES ('dis01662', 'Llalli', 'pro00169');
INSERT INTO `distrito` VALUES ('dis01663', 'Macari', 'pro00169');
INSERT INTO `distrito` VALUES ('dis01664', 'Nuña', 'pro00169');
INSERT INTO `distrito` VALUES ('dis01665', 'Orurillo', 'pro00169');
INSERT INTO `distrito` VALUES ('dis01666', 'Santa Rosa', 'pro00169');
INSERT INTO `distrito` VALUES ('dis01667', 'Umachiri', 'pro00169');
INSERT INTO `distrito` VALUES ('dis01668', 'Moho', 'pro00170');
INSERT INTO `distrito` VALUES ('dis01669', 'Conima', 'pro00170');
INSERT INTO `distrito` VALUES ('dis01670', 'Huayrapata', 'pro00170');
INSERT INTO `distrito` VALUES ('dis01671', 'Tilali', 'pro00170');
INSERT INTO `distrito` VALUES ('dis01672', 'Putina', 'pro00171');
INSERT INTO `distrito` VALUES ('dis01673', 'Ananea', 'pro00171');
INSERT INTO `distrito` VALUES ('dis01674', 'Pedro Vilca Apaza', 'pro00171');
INSERT INTO `distrito` VALUES ('dis01675', 'Quilcapuncu', 'pro00171');
INSERT INTO `distrito` VALUES ('dis01676', 'Sina', 'pro00171');
INSERT INTO `distrito` VALUES ('dis01677', 'Juliaca', 'pro00172');
INSERT INTO `distrito` VALUES ('dis01678', 'Cabana', 'pro00172');
INSERT INTO `distrito` VALUES ('dis01679', 'Cabanillas', 'pro00172');
INSERT INTO `distrito` VALUES ('dis01680', 'Caracoto', 'pro00172');
INSERT INTO `distrito` VALUES ('dis01681', 'Sandia', 'pro00173');
INSERT INTO `distrito` VALUES ('dis01682', 'Cuyocuyo', 'pro00173');
INSERT INTO `distrito` VALUES ('dis01683', 'Limbani', 'pro00173');
INSERT INTO `distrito` VALUES ('dis01684', 'Patambuco', 'pro00173');
INSERT INTO `distrito` VALUES ('dis01685', 'Phara', 'pro00173');
INSERT INTO `distrito` VALUES ('dis01686', 'Quiaca', 'pro00173');
INSERT INTO `distrito` VALUES ('dis01687', 'San Juan Del Oro', 'pro00173');
INSERT INTO `distrito` VALUES ('dis01688', 'Yanahuaya', 'pro00173');
INSERT INTO `distrito` VALUES ('dis01689', 'Alto Inambari', 'pro00173');
INSERT INTO `distrito` VALUES ('dis01690', 'Yunguyo', 'pro00174');
INSERT INTO `distrito` VALUES ('dis01691', 'Anapia', 'pro00174');
INSERT INTO `distrito` VALUES ('dis01692', 'Copani', 'pro00174');
INSERT INTO `distrito` VALUES ('dis01693', 'Cuturapi', 'pro00174');
INSERT INTO `distrito` VALUES ('dis01694', 'Ollaraya', 'pro00174');
INSERT INTO `distrito` VALUES ('dis01695', 'Tinicachi', 'pro00174');
INSERT INTO `distrito` VALUES ('dis01696', 'Unicachi', 'pro00174');
INSERT INTO `distrito` VALUES ('dis01697', 'Bellavista', 'pro00176');
INSERT INTO `distrito` VALUES ('dis01698', 'Alto Biavo', 'pro00176');
INSERT INTO `distrito` VALUES ('dis01699', 'Bajo Biavo', 'pro00176');
INSERT INTO `distrito` VALUES ('dis01700', 'Huallaga', 'pro00176');
INSERT INTO `distrito` VALUES ('dis01701', 'San Pablo', 'pro00176');
INSERT INTO `distrito` VALUES ('dis01702', 'San Rafael', 'pro00176');
INSERT INTO `distrito` VALUES ('dis01703', 'Saposoa', 'pro00178');
INSERT INTO `distrito` VALUES ('dis01704', 'Alto Saposoa', 'pro00178');
INSERT INTO `distrito` VALUES ('dis01705', 'El Eslabon', 'pro00178');
INSERT INTO `distrito` VALUES ('dis01706', 'Piscoyacu', 'pro00178');
INSERT INTO `distrito` VALUES ('dis01707', 'Sacanche', 'pro00178');
INSERT INTO `distrito` VALUES ('dis01708', 'Tingo De Saposoa', 'pro00178');
INSERT INTO `distrito` VALUES ('dis01709', 'Lamas', 'pro00179');
INSERT INTO `distrito` VALUES ('dis01710', 'Alonso De Alvara', 'pro00179');
INSERT INTO `distrito` VALUES ('dis01711', 'Barranquita', 'pro00179');
INSERT INTO `distrito` VALUES ('dis01712', 'Caynarachi', 'pro00179');
INSERT INTO `distrito` VALUES ('dis01713', 'Cuñumbuque', 'pro00179');
INSERT INTO `distrito` VALUES ('dis01714', 'Pinto Recodo', 'pro00179');
INSERT INTO `distrito` VALUES ('dis01715', 'Rumisapa', 'pro00179');
INSERT INTO `distrito` VALUES ('dis01716', 'San Roque De Cumbaza', 'pro00179');
INSERT INTO `distrito` VALUES ('dis01717', 'Shanao', 'pro00179');
INSERT INTO `distrito` VALUES ('dis01718', 'Tabalosos', 'pro00179');
INSERT INTO `distrito` VALUES ('dis01719', 'Zapatero', 'pro00179');
INSERT INTO `distrito` VALUES ('dis01720', 'Juanjui', 'pro00180');
INSERT INTO `distrito` VALUES ('dis01721', 'Campanilla', 'pro00180');
INSERT INTO `distrito` VALUES ('dis01722', 'Huicungo', 'pro00180');
INSERT INTO `distrito` VALUES ('dis01723', 'Pachiza', 'pro00180');
INSERT INTO `distrito` VALUES ('dis01724', 'Pajarillo', 'pro00180');
INSERT INTO `distrito` VALUES ('dis01725', 'Moyobamba', 'pro00175');
INSERT INTO `distrito` VALUES ('dis01726', 'Calzada', 'pro00175');
INSERT INTO `distrito` VALUES ('dis01727', 'Habana', 'pro00175');
INSERT INTO `distrito` VALUES ('dis01728', 'Jepelacio', 'pro00175');
INSERT INTO `distrito` VALUES ('dis01729', 'Soritor', 'pro00175');
INSERT INTO `distrito` VALUES ('dis01730', 'Yantalo', 'pro00175');
INSERT INTO `distrito` VALUES ('dis01731', 'Picota', 'pro00181');
INSERT INTO `distrito` VALUES ('dis01732', 'Buenos Aires', 'pro00181');
INSERT INTO `distrito` VALUES ('dis01733', 'Caspisapa', 'pro00181');
INSERT INTO `distrito` VALUES ('dis01734', 'Pilluana', 'pro00181');
INSERT INTO `distrito` VALUES ('dis01735', 'Pucacaca', 'pro00181');
INSERT INTO `distrito` VALUES ('dis01736', 'San Cristobal', 'pro00181');
INSERT INTO `distrito` VALUES ('dis01737', 'San Hilarion', 'pro00181');
INSERT INTO `distrito` VALUES ('dis01738', 'Shamboyacu', 'pro00181');
INSERT INTO `distrito` VALUES ('dis01739', 'Tingo De Ponasa', 'pro00181');
INSERT INTO `distrito` VALUES ('dis01740', 'Tres Unidos', 'pro00181');
INSERT INTO `distrito` VALUES ('dis01741', 'Rioja', 'pro00182');
INSERT INTO `distrito` VALUES ('dis01742', 'Awajun', 'pro00182');
INSERT INTO `distrito` VALUES ('dis01743', 'Elias Soplin Vargas', 'pro00182');
INSERT INTO `distrito` VALUES ('dis01744', 'Nueva Cajamarca', 'pro00182');
INSERT INTO `distrito` VALUES ('dis01745', 'Pardo Miguel', 'pro00182');
INSERT INTO `distrito` VALUES ('dis01746', 'Posic', 'pro00182');
INSERT INTO `distrito` VALUES ('dis01747', 'San Fernando', 'pro00182');
INSERT INTO `distrito` VALUES ('dis01748', 'Yorongos', 'pro00182');
INSERT INTO `distrito` VALUES ('dis01749', 'Yuracyacu', 'pro00182');
INSERT INTO `distrito` VALUES ('dis01750', 'Tarapoto', 'pro00183');
INSERT INTO `distrito` VALUES ('dis01751', 'Alberto Leveau', 'pro00183');
INSERT INTO `distrito` VALUES ('dis01752', 'Cacatachi', 'pro00183');
INSERT INTO `distrito` VALUES ('dis01753', 'Chazuta', 'pro00183');
INSERT INTO `distrito` VALUES ('dis01754', 'Chipurana', 'pro00183');
INSERT INTO `distrito` VALUES ('dis01755', 'El Porvenir', 'pro00183');
INSERT INTO `distrito` VALUES ('dis01756', 'Humbayoc', 'pro00183');
INSERT INTO `distrito` VALUES ('dis01757', 'Juan Guerra', 'pro00183');
INSERT INTO `distrito` VALUES ('dis01758', 'La Banda De Shilcayo', 'pro00183');
INSERT INTO `distrito` VALUES ('dis01759', 'Morales', 'pro00183');
INSERT INTO `distrito` VALUES ('dis01760', 'Papaplaya', 'pro00183');
INSERT INTO `distrito` VALUES ('dis01761', 'San Antonio', 'pro00183');
INSERT INTO `distrito` VALUES ('dis01762', 'Sauce', 'pro00183');
INSERT INTO `distrito` VALUES ('dis01763', 'Shapaja', 'pro00183');
INSERT INTO `distrito` VALUES ('dis01764', 'Tocache', 'pro00184');
INSERT INTO `distrito` VALUES ('dis01765', 'Nuevo Progreso', 'pro00184');
INSERT INTO `distrito` VALUES ('dis01766', 'Polvora', 'pro00184');
INSERT INTO `distrito` VALUES ('dis01767', 'Shunte', 'pro00184');
INSERT INTO `distrito` VALUES ('dis01768', 'Uchiza', 'pro00184');
INSERT INTO `distrito` VALUES ('dis01769', 'San Jose De Sisa', 'pro00177');
INSERT INTO `distrito` VALUES ('dis01770', 'Agua Blanca', 'pro00177');
INSERT INTO `distrito` VALUES ('dis01771', 'San Martin', 'pro00177');
INSERT INTO `distrito` VALUES ('dis01772', 'Santa Rosa', 'pro00177');
INSERT INTO `distrito` VALUES ('dis01773', 'Shatoja', 'pro00177');
INSERT INTO `distrito` VALUES ('dis01774', 'Tacna', 'pro00185');
INSERT INTO `distrito` VALUES ('dis01775', 'Alto De La Alianza', 'pro00185');
INSERT INTO `distrito` VALUES ('dis01776', 'Calana', 'pro00185');
INSERT INTO `distrito` VALUES ('dis01777', 'Inclan', 'pro00185');
INSERT INTO `distrito` VALUES ('dis01778', 'Pachia', 'pro00185');
INSERT INTO `distrito` VALUES ('dis01779', 'Palca', 'pro00185');
INSERT INTO `distrito` VALUES ('dis01780', 'Pocollay', 'pro00185');
INSERT INTO `distrito` VALUES ('dis01781', 'Sama', 'pro00185');
INSERT INTO `distrito` VALUES ('dis01782', 'Ciudad Nueva', 'pro00185');
INSERT INTO `distrito` VALUES ('dis01783', 'Candarave', 'pro00186');
INSERT INTO `distrito` VALUES ('dis01784', 'Cairani', 'pro00186');
INSERT INTO `distrito` VALUES ('dis01785', 'Camilaca', 'pro00186');
INSERT INTO `distrito` VALUES ('dis01786', 'Curibaya', 'pro00186');
INSERT INTO `distrito` VALUES ('dis01787', 'Huanuara', 'pro00186');
INSERT INTO `distrito` VALUES ('dis01788', 'Quilahuani', 'pro00186');
INSERT INTO `distrito` VALUES ('dis01789', 'Locumba', 'pro00187');
INSERT INTO `distrito` VALUES ('dis01790', 'Ilabaya', 'pro00187');
INSERT INTO `distrito` VALUES ('dis01791', 'Ite', 'pro00187');
INSERT INTO `distrito` VALUES ('dis01792', 'Tarata', 'pro00188');
INSERT INTO `distrito` VALUES ('dis01793', 'Chucatamani', 'pro00188');
INSERT INTO `distrito` VALUES ('dis01794', 'Estique', 'pro00188');
INSERT INTO `distrito` VALUES ('dis01795', 'Estique-pampa', 'pro00188');
INSERT INTO `distrito` VALUES ('dis01796', 'Sitajara', 'pro00188');
INSERT INTO `distrito` VALUES ('dis01797', 'Susapaya', 'pro00188');
INSERT INTO `distrito` VALUES ('dis01798', 'Tarucachi', 'pro00188');
INSERT INTO `distrito` VALUES ('dis01799', 'Ticaco', 'pro00188');
INSERT INTO `distrito` VALUES ('dis01800', 'Zarumilla', 'pro00191');
INSERT INTO `distrito` VALUES ('dis01801', 'Aguas Verdes', 'pro00191');
INSERT INTO `distrito` VALUES ('dis01802', 'Matapalo', 'pro00191');
INSERT INTO `distrito` VALUES ('dis01803', 'Papayal', 'pro00191');
INSERT INTO `distrito` VALUES ('dis01804', 'Tumbes', 'pro00189');
INSERT INTO `distrito` VALUES ('dis01805', 'Corrales', 'pro00189');
INSERT INTO `distrito` VALUES ('dis01806', 'La Cruz', 'pro00189');
INSERT INTO `distrito` VALUES ('dis01807', 'Pampas De Hospital', 'pro00189');
INSERT INTO `distrito` VALUES ('dis01808', 'San Jacinto', 'pro00189');
INSERT INTO `distrito` VALUES ('dis01809', 'San Juan De La Virgen', 'pro00189');
INSERT INTO `distrito` VALUES ('dis01810', 'Zorritos', 'pro00190');
INSERT INTO `distrito` VALUES ('dis01811', 'Casitas', 'pro00190');
INSERT INTO `distrito` VALUES ('dis01812', 'Callaria', 'pro00192');
INSERT INTO `distrito` VALUES ('dis01813', 'Campoverde', 'pro00192');
INSERT INTO `distrito` VALUES ('dis01814', 'Iparia', 'pro00192');
INSERT INTO `distrito` VALUES ('dis01815', 'Masisea', 'pro00192');
INSERT INTO `distrito` VALUES ('dis01816', 'Yarinacocha', 'pro00192');
INSERT INTO `distrito` VALUES ('dis01817', 'Nueva Requena', 'pro00192');
INSERT INTO `distrito` VALUES ('dis01818', 'Raymondi', 'pro00193');
INSERT INTO `distrito` VALUES ('dis01819', 'Sepahua', 'pro00193');
INSERT INTO `distrito` VALUES ('dis01820', 'Tahuania', 'pro00193');
INSERT INTO `distrito` VALUES ('dis01821', 'Yurua', 'pro00193');
INSERT INTO `distrito` VALUES ('dis01822', 'Padre Abad', 'pro00194');
INSERT INTO `distrito` VALUES ('dis01823', 'Irazola', 'pro00194');
INSERT INTO `distrito` VALUES ('dis01824', 'Curimana', 'pro00194');
INSERT INTO `distrito` VALUES ('dis01825', 'Purus', 'pro00195');

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
  `datfechahoraregistroincidente` datetime NOT NULL,
  `imgincidente` varchar(100) NOT NULL,
  `idzona` char(11) NOT NULL,
  `idtrabajador` char(11) NOT NULL,
  `idtipoincidente` char(11) NOT NULL,
  `idcuadrante` char(11) NOT NULL,
  `idurbanizacion` char(11) NOT NULL,
  PRIMARY KEY (`idincidente`),
  KEY `incidente_zona_fk` (`idzona`),
  KEY `incidente_tipo_incidente_fk` (`idtipoincidente`),
  KEY `incidente_trabajador_fk` (`idtrabajador`) USING BTREE,
  CONSTRAINT `incidente_tipo_incidente_fk` FOREIGN KEY (`idtipoincidente`) REFERENCES `tipo_incidente` (`idtipoincidente`),
  CONSTRAINT `incidente_trabjador_fk` FOREIGN KEY (`idtrabajador`) REFERENCES `trabajador` (`idtrabajador`),
  CONSTRAINT `incidente_zona_fk` FOREIGN KEY (`idzona`) REFERENCES `zona` (`idzona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of incidente
-- ----------------------------
INSERT INTO `incidente` VALUES ('IN000000001', 'sdsadadsad', '-8.101293400928514, -79.02167605285644', 'P', '2013-11-13 10:13:11', '2013-11-21 16:13:13', '', 'ZN000000001', 'TB000000001', 'TI000000001', 'CD000000002', 'UR000000001');
INSERT INTO `incidente` VALUES ('IN000000002', '3324324sdsdsadsadasddasd', '-8.110725419818444, -79.05051516418456', 'P', '2013-11-13 17:41:05', '2013-11-21 23:41:21', '', 'ZN000000001', 'TB000000001', 'TI000000001', 'CD000000002', 'UR000000001');

-- ----------------------------
-- Table structure for `pais`
-- ----------------------------
DROP TABLE IF EXISTS `pais`;
CREATE TABLE `pais` (
  `IdPais` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`IdPais`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of pais
-- ----------------------------
INSERT INTO `pais` VALUES ('pai00001', 'Perú');

-- ----------------------------
-- Table structure for `perfil_trabajador`
-- ----------------------------
DROP TABLE IF EXISTS `perfil_trabajador`;
CREATE TABLE `perfil_trabajador` (
  `idPerfilTrabajador` char(11) NOT NULL,
  `strPerfilTrabajador` varchar(200) NOT NULL,
  PRIMARY KEY (`idPerfilTrabajador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of perfil_trabajador
-- ----------------------------
INSERT INTO `perfil_trabajador` VALUES ('PT000000001', 'AGENTE POLICIAL');
INSERT INTO `perfil_trabajador` VALUES ('PT000000002', 'ESTADISTS');

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
-- Table structure for `provincia`
-- ----------------------------
DROP TABLE IF EXISTS `provincia`;
CREATE TABLE `provincia` (
  `IdProvincia` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `IdDepartamento` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`IdProvincia`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of provincia
-- ----------------------------
INSERT INTO `provincia` VALUES ('pro00001', 'Chachapoyas', 'dep00001');
INSERT INTO `provincia` VALUES ('pro00002', 'Bagua', 'dep00001');
INSERT INTO `provincia` VALUES ('pro00003', 'Bongara', 'dep00001');
INSERT INTO `provincia` VALUES ('pro00004', 'Condorcanqui', 'dep00001');
INSERT INTO `provincia` VALUES ('pro00005', 'Luya', 'dep00001');
INSERT INTO `provincia` VALUES ('pro00006', 'Rodriguez de Mendoza', 'dep00001');
INSERT INTO `provincia` VALUES ('pro00007', 'Utcubamba', 'dep00001');
INSERT INTO `provincia` VALUES ('pro00008', 'Huaraz', 'dep00002');
INSERT INTO `provincia` VALUES ('pro00009', 'Aija', 'dep00002');
INSERT INTO `provincia` VALUES ('pro00010', 'Antonio Raymondi', 'dep00002');
INSERT INTO `provincia` VALUES ('pro00011', 'Asuncion', 'dep00002');
INSERT INTO `provincia` VALUES ('pro00012', 'Bolognesi', 'dep00002');
INSERT INTO `provincia` VALUES ('pro00013', 'Carhuaz', 'dep00002');
INSERT INTO `provincia` VALUES ('pro00014', 'Carlos Fermin Fitzcarrald', 'dep00002');
INSERT INTO `provincia` VALUES ('pro00015', 'Casma', 'dep00002');
INSERT INTO `provincia` VALUES ('pro00016', 'Corongo', 'dep00002');
INSERT INTO `provincia` VALUES ('pro00017', 'Huari', 'dep00002');
INSERT INTO `provincia` VALUES ('pro00018', 'Huarmey', 'dep00002');
INSERT INTO `provincia` VALUES ('pro00019', 'Huaylas', 'dep00002');
INSERT INTO `provincia` VALUES ('pro00020', 'Mariscal Luzuriaga', 'dep00002');
INSERT INTO `provincia` VALUES ('pro00021', 'Ocros', 'dep00002');
INSERT INTO `provincia` VALUES ('pro00022', 'Pallasca', 'dep00002');
INSERT INTO `provincia` VALUES ('pro00023', 'Pomabamba', 'dep00002');
INSERT INTO `provincia` VALUES ('pro00024', 'Recuay', 'dep00002');
INSERT INTO `provincia` VALUES ('pro00025', 'Santa', 'dep00002');
INSERT INTO `provincia` VALUES ('pro00026', 'Sihuas', 'dep00002');
INSERT INTO `provincia` VALUES ('pro00027', 'Yungay', 'dep00002');
INSERT INTO `provincia` VALUES ('pro00028', 'Abancay', 'dep00003');
INSERT INTO `provincia` VALUES ('pro00029', 'Andahuaylas', 'dep00003');
INSERT INTO `provincia` VALUES ('pro00030', 'Antabamba', 'dep00003');
INSERT INTO `provincia` VALUES ('pro00031', 'Aymaraes', 'dep00003');
INSERT INTO `provincia` VALUES ('pro00032', 'Cotabambas', 'dep00003');
INSERT INTO `provincia` VALUES ('pro00033', 'Chincheros', 'dep00003');
INSERT INTO `provincia` VALUES ('pro00034', 'Grau', 'dep00003');
INSERT INTO `provincia` VALUES ('pro00035', 'Arequipa', 'dep00004');
INSERT INTO `provincia` VALUES ('pro00036', 'Camana', 'dep00004');
INSERT INTO `provincia` VALUES ('pro00037', 'Caraveli', 'dep00004');
INSERT INTO `provincia` VALUES ('pro00038', 'Castilla', 'dep00004');
INSERT INTO `provincia` VALUES ('pro00039', 'Caylloma', 'dep00004');
INSERT INTO `provincia` VALUES ('pro00040', 'Condesuyos', 'dep00004');
INSERT INTO `provincia` VALUES ('pro00041', 'Islay', 'dep00004');
INSERT INTO `provincia` VALUES ('pro00042', 'La Union', 'dep00004');
INSERT INTO `provincia` VALUES ('pro00043', 'Huamanga', 'dep00005');
INSERT INTO `provincia` VALUES ('pro00044', 'Cangallo', 'dep00005');
INSERT INTO `provincia` VALUES ('pro00045', 'Huanca Sancos', 'dep00005');
INSERT INTO `provincia` VALUES ('pro00046', 'Huanta', 'dep00005');
INSERT INTO `provincia` VALUES ('pro00047', 'La Mar', 'dep00005');
INSERT INTO `provincia` VALUES ('pro00048', 'Lucanas', 'dep00005');
INSERT INTO `provincia` VALUES ('pro00049', 'Parinacochas', 'dep00005');
INSERT INTO `provincia` VALUES ('pro00050', 'Paucar del Sara', 'dep00005');
INSERT INTO `provincia` VALUES ('pro00051', 'Sucre', 'dep00005');
INSERT INTO `provincia` VALUES ('pro00052', 'Victor Fajardo', 'dep00005');
INSERT INTO `provincia` VALUES ('pro00053', 'Vilcas Huaman', 'dep00005');
INSERT INTO `provincia` VALUES ('pro00054', 'Cajamarca', 'dep00006');
INSERT INTO `provincia` VALUES ('pro00055', 'Cajabamba', 'dep00006');
INSERT INTO `provincia` VALUES ('pro00056', 'Celendin', 'dep00006');
INSERT INTO `provincia` VALUES ('pro00057', 'Chota', 'dep00006');
INSERT INTO `provincia` VALUES ('pro00058', 'Contumaza', 'dep00006');
INSERT INTO `provincia` VALUES ('pro00059', 'Cutervo', 'dep00006');
INSERT INTO `provincia` VALUES ('pro00060', 'Hualgayoc', 'dep00006');
INSERT INTO `provincia` VALUES ('pro00061', 'Jaen', 'dep00006');
INSERT INTO `provincia` VALUES ('pro00062', 'San Ignacio', 'dep00006');
INSERT INTO `provincia` VALUES ('pro00063', 'San Marcos', 'dep00006');
INSERT INTO `provincia` VALUES ('pro00064', 'San Miguel', 'dep00006');
INSERT INTO `provincia` VALUES ('pro00065', 'San Pablo', 'dep00006');
INSERT INTO `provincia` VALUES ('pro00066', 'Santa Cruz', 'dep00006');
INSERT INTO `provincia` VALUES ('pro00067', 'Callao', 'dep00014');
INSERT INTO `provincia` VALUES ('pro00068', 'Cusco', 'dep00007');
INSERT INTO `provincia` VALUES ('pro00069', 'Acomayo', 'dep00007');
INSERT INTO `provincia` VALUES ('pro00070', 'Anta', 'dep00007');
INSERT INTO `provincia` VALUES ('pro00071', 'Calca', 'dep00007');
INSERT INTO `provincia` VALUES ('pro00072', 'Canas', 'dep00007');
INSERT INTO `provincia` VALUES ('pro00073', 'Canchis', 'dep00007');
INSERT INTO `provincia` VALUES ('pro00074', 'Chumbivilcas', 'dep00007');
INSERT INTO `provincia` VALUES ('pro00075', 'Espinar', 'dep00007');
INSERT INTO `provincia` VALUES ('pro00076', 'La Convencion', 'dep00007');
INSERT INTO `provincia` VALUES ('pro00077', 'Paruro', 'dep00007');
INSERT INTO `provincia` VALUES ('pro00078', 'Paucartambo', 'dep00007');
INSERT INTO `provincia` VALUES ('pro00079', 'Quispicanchi', 'dep00007');
INSERT INTO `provincia` VALUES ('pro00080', 'Urubamba', 'dep00007');
INSERT INTO `provincia` VALUES ('pro00081', 'Huancavelica', 'dep00009');
INSERT INTO `provincia` VALUES ('pro00082', 'Acobamba', 'dep00009');
INSERT INTO `provincia` VALUES ('pro00083', 'Angaraes', 'dep00009');
INSERT INTO `provincia` VALUES ('pro00084', 'Castrovirreyna', 'dep00009');
INSERT INTO `provincia` VALUES ('pro00085', 'Churcampa', 'dep00009');
INSERT INTO `provincia` VALUES ('pro00086', 'Huaytara', 'dep00009');
INSERT INTO `provincia` VALUES ('pro00087', 'Tayacaja', 'dep00009');
INSERT INTO `provincia` VALUES ('pro00088', 'Huanuco', 'dep00008');
INSERT INTO `provincia` VALUES ('pro00089', 'Ambo', 'dep00008');
INSERT INTO `provincia` VALUES ('pro00090', 'Dos de Mayo', 'dep00008');
INSERT INTO `provincia` VALUES ('pro00091', 'Huacaybamba', 'dep00008');
INSERT INTO `provincia` VALUES ('pro00092', 'Huamalies', 'dep00008');
INSERT INTO `provincia` VALUES ('pro00093', 'Leoncio Prado', 'dep00008');
INSERT INTO `provincia` VALUES ('pro00094', 'Marañon', 'dep00008');
INSERT INTO `provincia` VALUES ('pro00095', 'Pachitea', 'dep00008');
INSERT INTO `provincia` VALUES ('pro00096', 'Puerto Inca', 'dep00008');
INSERT INTO `provincia` VALUES ('pro00097', 'Lauricocha', 'dep00008');
INSERT INTO `provincia` VALUES ('pro00098', 'Yarowilca', 'dep00008');
INSERT INTO `provincia` VALUES ('pro00099', 'Ica', 'dep00010');
INSERT INTO `provincia` VALUES ('pro00100', 'Chincha', 'dep00010');
INSERT INTO `provincia` VALUES ('pro00101', 'Nazca', 'dep00010');
INSERT INTO `provincia` VALUES ('pro00102', 'Palpa', 'dep00010');
INSERT INTO `provincia` VALUES ('pro00103', 'Pisco', 'dep00010');
INSERT INTO `provincia` VALUES ('pro00104', 'Huancayo', 'dep00011');
INSERT INTO `provincia` VALUES ('pro00105', 'Concepcion', 'dep00011');
INSERT INTO `provincia` VALUES ('pro00106', 'Chanchamayo', 'dep00011');
INSERT INTO `provincia` VALUES ('pro00107', 'Jauja', 'dep00011');
INSERT INTO `provincia` VALUES ('pro00108', 'Junin', 'dep00011');
INSERT INTO `provincia` VALUES ('pro00109', 'Satipo', 'dep00011');
INSERT INTO `provincia` VALUES ('pro00110', 'Tarma', 'dep00011');
INSERT INTO `provincia` VALUES ('pro00111', 'Yauli', 'dep00011');
INSERT INTO `provincia` VALUES ('pro00112', 'Chupaca', 'dep00011');
INSERT INTO `provincia` VALUES ('pro00113', 'Trujillo', 'dep00012');
INSERT INTO `provincia` VALUES ('pro00114', 'Ascope', 'dep00012');
INSERT INTO `provincia` VALUES ('pro00115', 'Bolivar', 'dep00012');
INSERT INTO `provincia` VALUES ('pro00116', 'Chepen', 'dep00012');
INSERT INTO `provincia` VALUES ('pro00117', 'Julcan', 'dep00012');
INSERT INTO `provincia` VALUES ('pro00118', 'Otuzco', 'dep00012');
INSERT INTO `provincia` VALUES ('pro00119', 'Pacasmayo', 'dep00012');
INSERT INTO `provincia` VALUES ('pro00120', 'Pataz', 'dep00012');
INSERT INTO `provincia` VALUES ('pro00121', 'Sanchez Carrion', 'dep00012');
INSERT INTO `provincia` VALUES ('pro00122', 'Santiago de Chuco', 'dep00012');
INSERT INTO `provincia` VALUES ('pro00123', 'Gran Chimú', 'dep00012');
INSERT INTO `provincia` VALUES ('pro00124', 'Viru', 'dep00012');
INSERT INTO `provincia` VALUES ('pro00125', 'Chiclayo', 'dep00013');
INSERT INTO `provincia` VALUES ('pro00126', 'Ferreñafe', 'dep00013');
INSERT INTO `provincia` VALUES ('pro00127', 'Lambayeque', 'dep00013');
INSERT INTO `provincia` VALUES ('pro00128', 'Lima', 'dep00014');
INSERT INTO `provincia` VALUES ('pro00129', 'Barranca', 'dep00014');
INSERT INTO `provincia` VALUES ('pro00130', 'Cajatambo', 'dep00014');
INSERT INTO `provincia` VALUES ('pro00131', 'Canta', 'dep00014');
INSERT INTO `provincia` VALUES ('pro00132', 'Cañete', 'dep00014');
INSERT INTO `provincia` VALUES ('pro00133', 'Huaral', 'dep00014');
INSERT INTO `provincia` VALUES ('pro00134', 'Huarochiri', 'dep00014');
INSERT INTO `provincia` VALUES ('pro00135', 'Huaura', 'dep00014');
INSERT INTO `provincia` VALUES ('pro00136', 'Oyon', 'dep00014');
INSERT INTO `provincia` VALUES ('pro00137', 'Yauyos', 'dep00014');
INSERT INTO `provincia` VALUES ('pro00138', 'Maynas', 'dep00015');
INSERT INTO `provincia` VALUES ('pro00139', 'Alto Amazonas', 'dep00015');
INSERT INTO `provincia` VALUES ('pro00140', 'Loreto', 'dep00015');
INSERT INTO `provincia` VALUES ('pro00141', 'Mariscal Ramon Castilla', 'dep00015');
INSERT INTO `provincia` VALUES ('pro00142', 'Requena', 'dep00015');
INSERT INTO `provincia` VALUES ('pro00143', 'Ucayali', 'dep00015');
INSERT INTO `provincia` VALUES ('pro00144', 'Datem del Marañon', 'dep00015');
INSERT INTO `provincia` VALUES ('pro00145', 'Tambopata', 'dep00016');
INSERT INTO `provincia` VALUES ('pro00146', 'Manu', 'dep00016');
INSERT INTO `provincia` VALUES ('pro00147', 'Tahuamanu', 'dep00016');
INSERT INTO `provincia` VALUES ('pro00148', 'Mariscal Nieto', 'dep00017');
INSERT INTO `provincia` VALUES ('pro00149', 'General Sanchez Cerro', 'dep00017');
INSERT INTO `provincia` VALUES ('pro00150', 'Ilo', 'dep00017');
INSERT INTO `provincia` VALUES ('pro00151', 'Pasco', 'dep00018');
INSERT INTO `provincia` VALUES ('pro00152', 'Daniel Alcides Carrion', 'dep00018');
INSERT INTO `provincia` VALUES ('pro00153', 'Oxapampa', 'dep00018');
INSERT INTO `provincia` VALUES ('pro00154', 'Piura', 'dep00019');
INSERT INTO `provincia` VALUES ('pro00155', 'Ayabaca', 'dep00019');
INSERT INTO `provincia` VALUES ('pro00156', 'Huancabamba', 'dep00019');
INSERT INTO `provincia` VALUES ('pro00157', 'Morropon', 'dep00019');
INSERT INTO `provincia` VALUES ('pro00158', 'Paita', 'dep00019');
INSERT INTO `provincia` VALUES ('pro00159', 'Sullana', 'dep00019');
INSERT INTO `provincia` VALUES ('pro00160', 'Talara', 'dep00019');
INSERT INTO `provincia` VALUES ('pro00161', 'Sechura', 'dep00019');
INSERT INTO `provincia` VALUES ('pro00162', 'Puno', 'dep00020');
INSERT INTO `provincia` VALUES ('pro00163', 'Azangaro', 'dep00020');
INSERT INTO `provincia` VALUES ('pro00164', 'Carabaya', 'dep00020');
INSERT INTO `provincia` VALUES ('pro00165', 'Chucuito', 'dep00020');
INSERT INTO `provincia` VALUES ('pro00166', 'El Collao', 'dep00020');
INSERT INTO `provincia` VALUES ('pro00167', 'Huancane', 'dep00020');
INSERT INTO `provincia` VALUES ('pro00168', 'Lampa', 'dep00020');
INSERT INTO `provincia` VALUES ('pro00169', 'Melgar', 'dep00020');
INSERT INTO `provincia` VALUES ('pro00170', 'Moho', 'dep00020');
INSERT INTO `provincia` VALUES ('pro00171', 'San Antonio de Putina', 'dep00020');
INSERT INTO `provincia` VALUES ('pro00172', 'San Roman', 'dep00020');
INSERT INTO `provincia` VALUES ('pro00173', 'Sandía', 'dep00020');
INSERT INTO `provincia` VALUES ('pro00174', 'Yunguyo', 'dep00020');
INSERT INTO `provincia` VALUES ('pro00175', 'Moyobamba', 'dep00021');
INSERT INTO `provincia` VALUES ('pro00176', 'Bellavista', 'dep00021');
INSERT INTO `provincia` VALUES ('pro00177', 'El Dorado', 'dep00021');
INSERT INTO `provincia` VALUES ('pro00178', 'Huallaga', 'dep00021');
INSERT INTO `provincia` VALUES ('pro00179', 'Lamas', 'dep00021');
INSERT INTO `provincia` VALUES ('pro00180', 'Mariscal Caceres', 'dep00021');
INSERT INTO `provincia` VALUES ('pro00181', 'Picota', 'dep00021');
INSERT INTO `provincia` VALUES ('pro00182', 'Rioja', 'dep00021');
INSERT INTO `provincia` VALUES ('pro00183', 'San Martín', 'dep00021');
INSERT INTO `provincia` VALUES ('pro00184', 'Tocache', 'dep00021');
INSERT INTO `provincia` VALUES ('pro00185', 'Tacna', 'dep00022');
INSERT INTO `provincia` VALUES ('pro00186', 'Candarave', 'dep00022');
INSERT INTO `provincia` VALUES ('pro00187', 'Jorge Basadre', 'dep00022');
INSERT INTO `provincia` VALUES ('pro00188', 'Tarata', 'dep00022');
INSERT INTO `provincia` VALUES ('pro00189', 'Tumbes', 'dep00023');
INSERT INTO `provincia` VALUES ('pro00190', 'Contralmirante Villar', 'dep00023');
INSERT INTO `provincia` VALUES ('pro00191', 'Zarumilla', 'dep00023');
INSERT INTO `provincia` VALUES ('pro00192', 'Coronel Portillo', 'dep00024');
INSERT INTO `provincia` VALUES ('pro00193', 'Atalaya', 'dep00024');
INSERT INTO `provincia` VALUES ('pro00194', 'Padre Abad', 'dep00024');
INSERT INTO `provincia` VALUES ('pro00195', 'Purus', 'dep00024');

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
INSERT INTO `tipo_incidente` VALUES ('TI000000001', 'Tipo de Incidente 1', 'b404831fdfab58e410e09b2752462e94.png');

-- ----------------------------
-- Table structure for `trabajador`
-- ----------------------------
DROP TABLE IF EXISTS `trabajador`;
CREATE TABLE `trabajador` (
  `idtrabajador` char(11) NOT NULL,
  `strnombres` varchar(100) NOT NULL,
  `strapellidopaterno` varchar(50) NOT NULL,
  `strapellidomaterno` varchar(50) NOT NULL,
  `strdireccion` varchar(100) NOT NULL,
  `strdni` char(8) NOT NULL,
  `strsexo` char(1) NOT NULL,
  `datfechanacimiento` datetime NOT NULL,
  `strcodigo` varchar(10) NOT NULL,
  `strtelefono` varchar(20) NOT NULL,
  `idPerfilTrabajador` char(11) NOT NULL,
  PRIMARY KEY (`idtrabajador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trabajador
-- ----------------------------
INSERT INTO `trabajador` VALUES ('TB000000001', 'DAVIS', 'ASDAS', 'DASDASDASD', 'sadasd', '12312312', 'M', '2013-11-13 00:00:00', '123123', '123213', 'PT000000001');

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
INSERT INTO `urbanizacion` VALUES ('UR000000001', 'Urbanizacion 1', 'CD000000002', 'ZN000000001');

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
INSERT INTO `usuario` VALUES ('1', 'admin', 'rl6JW-Jg3YjSl-FcgJvFdOWsslsR9Kp_lft3cxWIO3Y', 'CESAR EDUARDO', 'IRRIBARREN OTINIANO', '40200737', 'M', '', '1', '1');

-- ----------------------------
-- Table structure for `zona`
-- ----------------------------
DROP TABLE IF EXISTS `zona`;
CREATE TABLE `zona` (
  `idzona` char(11) NOT NULL,
  `strnombrezona` varchar(100) NOT NULL,
  `IdDistrito` char(8) NOT NULL,
  `IdProvincia` char(8) NOT NULL,
  `IdDepartamento` char(8) NOT NULL,
  PRIMARY KEY (`idzona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zona
-- ----------------------------
INSERT INTO `zona` VALUES ('ZN000000001', 'Zona 1', 'dis00577', 'pro00059', 'dep00006');
INSERT INTO `zona` VALUES ('ZN000000002', 'Zona 2', 'dis00475', 'pro00047', 'dep00005');
INSERT INTO `zona` VALUES ('ZN000000003', 'Zona 3', 'dis00273', 'pro00031', 'dep00003');
INSERT INTO `zona` VALUES ('ZN000000004', 'Zona 4', 'dis00854', 'pro00086', 'dep00009');
INSERT INTO `zona` VALUES ('ZN000000005', 'Zona 5 ', 'dis00462', 'pro00045', 'dep00005');
INSERT INTO `zona` VALUES ('ZN000000006', 'Zona 6', 'dis00702', 'pro00071', 'dep00007');
