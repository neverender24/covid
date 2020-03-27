/*
Navicat MySQL Data Transfer
Source Host     : localhost:3306
Source Database : covid
Target Host     : localhost:3306
Target Database : covid
Date: 2020-03-26 15:54:18
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for barangays
-- ----------------------------
DROP TABLE IF EXISTS `barangays`;
CREATE TABLE `barangays` (
  `recid` int(4) NOT NULL AUTO_INCREMENT,
  `brgyname` varchar(50) NOT NULL,
  `idmun` int(4) NOT NULL,
  PRIMARY KEY (`recid`)
) ENGINE=InnoDB AUTO_INCREMENT=314 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of barangays
-- ----------------------------
INSERT INTO `barangays` VALUES ('50', 'CUAMBOG             ', '3');
INSERT INTO `barangays` VALUES ('51', 'SAN JOSE            ', '8');
INSERT INTO `barangays` VALUES ('52', 'BANGLASAN           ', '8');
INSERT INTO `barangays` VALUES ('53', 'PROSPERIDAD         ', '8');
INSERT INTO `barangays` VALUES ('54', 'ANITAPAN            ', '3');
INSERT INTO `barangays` VALUES ('55', 'SINGAPORE           ', '3');
INSERT INTO `barangays` VALUES ('56', 'MAMBATANG           ', '3');
INSERT INTO `barangays` VALUES ('57', 'MANASA              ', '3');
INSERT INTO `barangays` VALUES ('58', 'MASCAREG            ', '3');
INSERT INTO `barangays` VALUES ('59', 'GOLDEN VALLEY       ', '3');
INSERT INTO `barangays` VALUES ('60', 'PINDASAN            ', '3');
INSERT INTO `barangays` VALUES ('61', 'DAUMAN              ', '8');
INSERT INTO `barangays` VALUES ('62', 'CANIDKID            ', '8');
INSERT INTO `barangays` VALUES ('63', 'CAMANSI             ', '8');
INSERT INTO `barangays` VALUES ('64', 'CAMANTANGAN         ', '8');
INSERT INTO `barangays` VALUES ('65', 'SAN ANTONIO         ', '3');
INSERT INTO `barangays` VALUES ('66', 'CADUNAN             ', '3');
INSERT INTO `barangays` VALUES ('67', 'NEW VISAYAS         ', '8');
INSERT INTO `barangays` VALUES ('68', 'CONCEPCION          ', '8');
INSERT INTO `barangays` VALUES ('69', 'NEW CEBULAN         ', '8');
INSERT INTO `barangays` VALUES ('70', 'TAPIA               ', '8');
INSERT INTO `barangays` VALUES ('71', 'MAYAON              ', '8');
INSERT INTO `barangays` VALUES ('72', 'BANAGBANAG          ', '8');
INSERT INTO `barangays` VALUES ('73', 'TAGNANAN            ', '3');
INSERT INTO `barangays` VALUES ('74', 'CALAPE              ', '8');
INSERT INTO `barangays` VALUES ('75', 'NEW CALAPE          ', '8');
INSERT INTO `barangays` VALUES ('76', 'SAN VICENTE         ', '8');
INSERT INTO `barangays` VALUES ('77', 'NEW DALAGUETE       ', '8');
INSERT INTO `barangays` VALUES ('78', 'LEBANON             ', '8');
INSERT INTO `barangays` VALUES ('79', 'LIBUDON             ', '3');
INSERT INTO `barangays` VALUES ('80', 'BANKEROHAN NORTE    ', '8');
INSERT INTO `barangays` VALUES ('81', 'DEL PILAR           ', '3');
INSERT INTO `barangays` VALUES ('82', 'CABOYUAN            ', '3');
INSERT INTO `barangays` VALUES ('83', 'LINOAN              ', '8');
INSERT INTO `barangays` VALUES ('84', 'BANKEROHAN SUR      ', '8');
INSERT INTO `barangays` VALUES ('85', 'PANGIBIRAN          ', '3');
INSERT INTO `barangays` VALUES ('86', 'ANDILI              ', '6');
INSERT INTO `barangays` VALUES ('87', 'BAWANI              ', '6');
INSERT INTO `barangays` VALUES ('88', 'CONCEPCION          ', '6');
INSERT INTO `barangays` VALUES ('89', 'MALINAWON           ', '6');
INSERT INTO `barangays` VALUES ('90', 'NUEVA VISAYAS       ', '6');
INSERT INTO `barangays` VALUES ('91', 'NUEVO ILOCO         ', '6');
INSERT INTO `barangays` VALUES ('92', 'POBLACION           ', '6');
INSERT INTO `barangays` VALUES ('93', 'SALVACION           ', '6');
INSERT INTO `barangays` VALUES ('94', 'SAOSAO              ', '6');
INSERT INTO `barangays` VALUES ('95', 'SAWANGAN            ', '6');
INSERT INTO `barangays` VALUES ('96', 'TUBORAN             ', '6');
INSERT INTO `barangays` VALUES ('104', 'BAGONG SILANG       ', '5');
INSERT INTO `barangays` VALUES ('105', 'BAHI                ', '5');
INSERT INTO `barangays` VALUES ('106', 'CAMBAGANG           ', '5');
INSERT INTO `barangays` VALUES ('107', 'CORONOBE            ', '5');
INSERT INTO `barangays` VALUES ('108', 'KATIPUNAN           ', '5');
INSERT INTO `barangays` VALUES ('109', 'LAHI                ', '5');
INSERT INTO `barangays` VALUES ('110', 'LANGGAWISAN         ', '5');
INSERT INTO `barangays` VALUES ('111', 'MABUGNAO            ', '5');
INSERT INTO `barangays` VALUES ('112', 'MAGCAGONG           ', '5');
INSERT INTO `barangays` VALUES ('113', 'MAHAYAHAY           ', '5');
INSERT INTO `barangays` VALUES ('114', 'MAPAWA              ', '5');
INSERT INTO `barangays` VALUES ('115', 'MARAGUSAN (POB.)    ', '5');
INSERT INTO `barangays` VALUES ('116', 'MAUSWAGON           ', '5');
INSERT INTO `barangays` VALUES ('117', 'NEW ALBAY           ', '5');
INSERT INTO `barangays` VALUES ('118', 'NEW KATIPUNAN       ', '5');
INSERT INTO `barangays` VALUES ('119', 'NEW MAN-AY          ', '5');
INSERT INTO `barangays` VALUES ('120', 'NEW PANAY           ', '5');
INSERT INTO `barangays` VALUES ('121', 'PALOC               ', '5');
INSERT INTO `barangays` VALUES ('122', 'PAMINTARAN          ', '5');
INSERT INTO `barangays` VALUES ('123', 'PARASANON           ', '5');
INSERT INTO `barangays` VALUES ('124', 'TALIAN              ', '5');
INSERT INTO `barangays` VALUES ('125', 'TANDIK              ', '5');
INSERT INTO `barangays` VALUES ('126', 'TIGBAO              ', '5');
INSERT INTO `barangays` VALUES ('127', 'TUPAZ               ', '5');
INSERT INTO `barangays` VALUES ('128', 'ANISLAGAN           ', '9');
INSERT INTO `barangays` VALUES ('129', 'ANTEQUERA           ', '9');
INSERT INTO `barangays` VALUES ('130', 'BASAK               ', '9');
INSERT INTO `barangays` VALUES ('131', 'BAYABAS             ', '9');
INSERT INTO `barangays` VALUES ('132', 'BUKAL               ', '9');
INSERT INTO `barangays` VALUES ('133', 'CABACUNGAN          ', '9');
INSERT INTO `barangays` VALUES ('134', 'CABIDIANAN          ', '9');
INSERT INTO `barangays` VALUES ('135', 'KATIPUNAN           ', '9');
INSERT INTO `barangays` VALUES ('136', 'LIBASAN             ', '9');
INSERT INTO `barangays` VALUES ('137', 'LINDA               ', '9');
INSERT INTO `barangays` VALUES ('138', 'MAGADING            ', '9');
INSERT INTO `barangays` VALUES ('139', 'MAGSAYSAY           ', '9');
INSERT INTO `barangays` VALUES ('140', 'MAINIT              ', '9');
INSERT INTO `barangays` VALUES ('141', 'MANAT               ', '9');
INSERT INTO `barangays` VALUES ('142', 'MATILO              ', '9');
INSERT INTO `barangays` VALUES ('143', 'MIPANGI             ', '9');
INSERT INTO `barangays` VALUES ('144', 'NEW DAUIS           ', '9');
INSERT INTO `barangays` VALUES ('145', 'NEW SIBONGA         ', '9');
INSERT INTO `barangays` VALUES ('146', 'OGAO                ', '9');
INSERT INTO `barangays` VALUES ('147', 'PANGUTOSAN          ', '9');
INSERT INTO `barangays` VALUES ('148', 'POBLACION           ', '9');
INSERT INTO `barangays` VALUES ('149', 'SAN ISIDRO          ', '9');
INSERT INTO `barangays` VALUES ('150', 'SAN ROQUE           ', '9');
INSERT INTO `barangays` VALUES ('151', 'SAN VICENTE         ', '9');
INSERT INTO `barangays` VALUES ('152', 'SANTA MARIA         ', '9');
INSERT INTO `barangays` VALUES ('153', 'SANTO NIÑO (KAO)    ', '9');
INSERT INTO `barangays` VALUES ('154', 'SASA                ', '9');
INSERT INTO `barangays` VALUES ('155', 'TAGNOCON            ', '9');
INSERT INTO `barangays` VALUES ('156', 'ANDAP               ', '10');
INSERT INTO `barangays` VALUES ('157', 'BANTACAN            ', '10');
INSERT INTO `barangays` VALUES ('158', 'BATINAO             ', '10');
INSERT INTO `barangays` VALUES ('159', 'CABINUANGAN (POB.)  ', '10');
INSERT INTO `barangays` VALUES ('160', 'CAMANLANGAN         ', '10');
INSERT INTO `barangays` VALUES ('161', 'COGONON             ', '10');
INSERT INTO `barangays` VALUES ('162', 'FATIMA              ', '10');
INSERT INTO `barangays` VALUES ('163', 'KAHAYAG             ', '10');
INSERT INTO `barangays` VALUES ('164', 'KATIPUNAN           ', '10');
INSERT INTO `barangays` VALUES ('165', 'MAGANGIT            ', '10');
INSERT INTO `barangays` VALUES ('166', 'MAGSAYSAY           ', '10');
INSERT INTO `barangays` VALUES ('167', 'MANURIGAO           ', '10');
INSERT INTO `barangays` VALUES ('168', 'PAGSABANGAN         ', '10');
INSERT INTO `barangays` VALUES ('169', 'PANAG               ', '10');
INSERT INTO `barangays` VALUES ('170', 'SAN ROQUE           ', '10');
INSERT INTO `barangays` VALUES ('171', 'TANDAWAN            ', '10');
INSERT INTO `barangays` VALUES ('172', 'AWAO                ', '7');
INSERT INTO `barangays` VALUES ('173', 'BABAG               ', '7');
INSERT INTO `barangays` VALUES ('174', 'BANLAG              ', '7');
INSERT INTO `barangays` VALUES ('175', 'BAYLO               ', '7');
INSERT INTO `barangays` VALUES ('176', 'CASOON              ', '7');
INSERT INTO `barangays` VALUES ('177', 'HAGUIMITAN          ', '7');
INSERT INTO `barangays` VALUES ('178', 'INAMBATAN           ', '7');
INSERT INTO `barangays` VALUES ('179', 'MACOPA              ', '7');
INSERT INTO `barangays` VALUES ('180', 'MAMONGA             ', '7');
INSERT INTO `barangays` VALUES ('181', 'MOUNT DIWATA        ', '7');
INSERT INTO `barangays` VALUES ('182', 'NABOC               ', '7');
INSERT INTO `barangays` VALUES ('183', 'OLAYCON             ', '7');
INSERT INTO `barangays` VALUES ('184', 'PASIAN              ', '7');
INSERT INTO `barangays` VALUES ('185', 'POBLACION           ', '7');
INSERT INTO `barangays` VALUES ('186', 'RIZAL               ', '7');
INSERT INTO `barangays` VALUES ('187', 'SALVACION           ', '7');
INSERT INTO `barangays` VALUES ('188', 'SAN ISIDRO          ', '7');
INSERT INTO `barangays` VALUES ('189', 'SAN JOSE            ', '7');
INSERT INTO `barangays` VALUES ('190', 'TUBO-TUBO           ', '7');
INSERT INTO `barangays` VALUES ('191', 'UNION               ', '7');
INSERT INTO `barangays` VALUES ('192', 'UPPER ULIP          ', '7');
INSERT INTO `barangays` VALUES ('193', 'AGUINALDO           ', '2');
INSERT INTO `barangays` VALUES ('194', 'AMOR CRUZ           ', '2');
INSERT INTO `barangays` VALUES ('195', 'AMPAWID             ', '2');
INSERT INTO `barangays` VALUES ('196', 'ANDAP               ', '2');
INSERT INTO `barangays` VALUES ('197', 'ANITAP              ', '2');
INSERT INTO `barangays` VALUES ('198', 'BAGONG SILANG       ', '2');
INSERT INTO `barangays` VALUES ('199', 'BANBANON            ', '2');
INSERT INTO `barangays` VALUES ('200', 'BELMONTE            ', '2');
INSERT INTO `barangays` VALUES ('201', 'BINASBAS            ', '2');
INSERT INTO `barangays` VALUES ('202', 'BULLACAN            ', '2');
INSERT INTO `barangays` VALUES ('203', 'CEBULIDA            ', '2');
INSERT INTO `barangays` VALUES ('204', 'CONCEPCION          ', '2');
INSERT INTO `barangays` VALUES ('205', 'DATU AMPUNAN        ', '2');
INSERT INTO `barangays` VALUES ('206', 'DATU DAVAO          ', '2');
INSERT INTO `barangays` VALUES ('207', 'DOÑA JOSEFA         ', '2');
INSERT INTO `barangays` VALUES ('208', 'EL KATIPUNAN        ', '2');
INSERT INTO `barangays` VALUES ('209', 'IL PAPA             ', '2');
INSERT INTO `barangays` VALUES ('210', 'IMELDA              ', '2');
INSERT INTO `barangays` VALUES ('211', 'INACAYAN            ', '2');
INSERT INTO `barangays` VALUES ('212', 'KALIGUTAN           ', '2');
INSERT INTO `barangays` VALUES ('213', 'KIDAWA              ', '2');
INSERT INTO `barangays` VALUES ('214', 'KILAGDING           ', '2');
INSERT INTO `barangays` VALUES ('215', 'KIOKMAY             ', '2');
INSERT INTO `barangays` VALUES ('216', 'LAAK (POB.)         ', '2');
INSERT INTO `barangays` VALUES ('217', 'LANGTUD             ', '2');
INSERT INTO `barangays` VALUES ('218', 'LONGANAPAN          ', '2');
INSERT INTO `barangays` VALUES ('219', 'MABUHAY             ', '2');
INSERT INTO `barangays` VALUES ('220', 'MACOPA              ', '2');
INSERT INTO `barangays` VALUES ('221', 'MALINAO             ', '2');
INSERT INTO `barangays` VALUES ('222', 'MANGLOY             ', '2');
INSERT INTO `barangays` VALUES ('223', 'MELALE              ', '2');
INSERT INTO `barangays` VALUES ('224', 'NAGA                ', '2');
INSERT INTO `barangays` VALUES ('225', 'NEW BETHLEHEM       ', '2');
INSERT INTO `barangays` VALUES ('226', 'PANAMOREN           ', '2');
INSERT INTO `barangays` VALUES ('227', 'SABUD               ', '2');
INSERT INTO `barangays` VALUES ('228', 'SAN ANTONIO         ', '2');
INSERT INTO `barangays` VALUES ('229', 'SANTA EMILIA        ', '2');
INSERT INTO `barangays` VALUES ('230', 'SANTO NIÑO          ', '2');
INSERT INTO `barangays` VALUES ('231', 'SISIMON             ', '2');
INSERT INTO `barangays` VALUES ('232', 'KAPATAGAN           ', '2');
INSERT INTO `barangays` VALUES ('233', 'AURORA              ', '1');
INSERT INTO `barangays` VALUES ('234', 'BAGONGON            ', '1');
INSERT INTO `barangays` VALUES ('235', 'GABI                ', '1');
INSERT INTO `barangays` VALUES ('236', 'LAGAB               ', '1');
INSERT INTO `barangays` VALUES ('237', 'MANGAYON            ', '1');
INSERT INTO `barangays` VALUES ('238', 'MAPACA              ', '1');
INSERT INTO `barangays` VALUES ('239', 'MAPARAT             ', '1');
INSERT INTO `barangays` VALUES ('240', 'NEW ALEGRIA         ', '1');
INSERT INTO `barangays` VALUES ('241', 'NGAN                ', '1');
INSERT INTO `barangays` VALUES ('242', 'OSMEÑA              ', '1');
INSERT INTO `barangays` VALUES ('243', 'PANANSALAN          ', '1');
INSERT INTO `barangays` VALUES ('244', 'POBLACION           ', '1');
INSERT INTO `barangays` VALUES ('245', 'SAN JOSE            ', '1');
INSERT INTO `barangays` VALUES ('246', 'SAN MIGUEL          ', '1');
INSERT INTO `barangays` VALUES ('247', 'SIOCON              ', '1');
INSERT INTO `barangays` VALUES ('248', 'TAMIA               ', '1');
INSERT INTO `barangays` VALUES ('249', 'ANIBONGAN           ', '4');
INSERT INTO `barangays` VALUES ('250', 'ANISLAGAN           ', '4');
INSERT INTO `barangays` VALUES ('251', 'BINUANGAN           ', '4');
INSERT INTO `barangays` VALUES ('252', 'BUCANA              ', '4');
INSERT INTO `barangays` VALUES ('253', 'CALABCAB            ', '4');
INSERT INTO `barangays` VALUES ('254', 'CONCEPCION          ', '4');
INSERT INTO `barangays` VALUES ('255', 'DUMLAN              ', '4');
INSERT INTO `barangays` VALUES ('256', 'ELIZALDE (SOMIL)    ', '4');
INSERT INTO `barangays` VALUES ('257', 'GUBATAN             ', '4');
INSERT INTO `barangays` VALUES ('258', 'HIJO                ', '4');
INSERT INTO `barangays` VALUES ('259', 'KINUBAN             ', '4');
INSERT INTO `barangays` VALUES ('260', 'LANGGAM             ', '4');
INSERT INTO `barangays` VALUES ('261', 'LAPU-LAPU           ', '4');
INSERT INTO `barangays` VALUES ('262', 'LIBAY-LIBAY         ', '4');
INSERT INTO `barangays` VALUES ('263', 'LIMBO               ', '4');
INSERT INTO `barangays` VALUES ('264', 'LUMATAB             ', '4');
INSERT INTO `barangays` VALUES ('265', 'MAGANGIT            ', '4');
INSERT INTO `barangays` VALUES ('266', 'MAINIT              ', '4');
INSERT INTO `barangays` VALUES ('267', 'MALAMODAO           ', '4');
INSERT INTO `barangays` VALUES ('268', 'MANIPONGOL          ', '4');
INSERT INTO `barangays` VALUES ('269', 'MAPAANG             ', '4');
INSERT INTO `barangays` VALUES ('270', 'MASARA              ', '4');
INSERT INTO `barangays` VALUES ('271', 'NEW ASTURIAS        ', '4');
INSERT INTO `barangays` VALUES ('272', 'NEW BARILI          ', '4');
INSERT INTO `barangays` VALUES ('273', 'NEW LEYTE           ', '4');
INSERT INTO `barangays` VALUES ('274', 'NEW VISAYAS         ', '4');
INSERT INTO `barangays` VALUES ('275', 'PANANGAN            ', '4');
INSERT INTO `barangays` VALUES ('276', 'PANGI               ', '4');
INSERT INTO `barangays` VALUES ('277', 'PANIBASAN           ', '4');
INSERT INTO `barangays` VALUES ('278', 'PANORAON            ', '4');
INSERT INTO `barangays` VALUES ('279', 'POBLACION           ', '4');
INSERT INTO `barangays` VALUES ('280', 'SAN JUAN            ', '4');
INSERT INTO `barangays` VALUES ('281', 'SAN ROQUE           ', '4');
INSERT INTO `barangays` VALUES ('282', 'SANGOB              ', '4');
INSERT INTO `barangays` VALUES ('283', 'TAGBAROS            ', '4');
INSERT INTO `barangays` VALUES ('284', 'TAGLAWIG            ', '4');
INSERT INTO `barangays` VALUES ('285', 'TERESA              ', '4');
INSERT INTO `barangays` VALUES ('286', 'ARAIBO              ', '11');
INSERT INTO `barangays` VALUES ('287', 'BONGABONG           ', '11');
INSERT INTO `barangays` VALUES ('288', 'BONGBONG            ', '11');
INSERT INTO `barangays` VALUES ('289', 'KINGKING (POB.)     ', '11');
INSERT INTO `barangays` VALUES ('290', 'LAS ARENAS          ', '11');
INSERT INTO `barangays` VALUES ('291', 'MAGNAGA             ', '11');
INSERT INTO `barangays` VALUES ('292', 'MATIAO              ', '11');
INSERT INTO `barangays` VALUES ('293', 'NAPNAPAN            ', '11');
INSERT INTO `barangays` VALUES ('294', 'P. FUENTES          ', '11');
INSERT INTO `barangays` VALUES ('295', 'TAG-UGPO            ', '11');
INSERT INTO `barangays` VALUES ('296', 'TAGDANGUA           ', '11');
INSERT INTO `barangays` VALUES ('297', 'TAMBONGON           ', '11');
INSERT INTO `barangays` VALUES ('298', 'TIBAGON             ', '11');
INSERT INTO `barangays` VALUES ('299', 'PANAMIN', '3');
INSERT INTO `barangays` VALUES ('300', 'SARANGA', '5');
INSERT INTO `barangays` VALUES ('301', 'KANLAWIG', '5');
INSERT INTO `barangays` VALUES ('302', 'TIGASA', '2');
INSERT INTO `barangays` VALUES ('303', 'LINUMBAAN', '2');
INSERT INTO `barangays` VALUES ('304', 'CANDIIS', '2');
INSERT INTO `barangays` VALUES ('305', 'PAHAMUTANG', '2');
INSERT INTO `barangays` VALUES ('306', 'LIBUTON', '2');
INSERT INTO `barangays` VALUES ('307', 'BUHI', '2');
INSERT INTO `barangays` VALUES ('308', 'LUGOM', '2');
INSERT INTO `barangays` VALUES ('309', 'KIBAGUIO', '2');
INSERT INTO `barangays` VALUES ('310', 'DALIMDIM', '2');
INSERT INTO `barangays` VALUES ('311', 'HINAGTUNGAN', '2');
INSERT INTO `barangays` VALUES ('312', 'MABUHAY', '2');
INSERT INTO `barangays` VALUES ('313', 'MAG-AGBAY', '2');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');

-- ----------------------------
-- Table structure for modules
-- ----------------------------
DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules` (
  `modulename` varchar(30) NOT NULL,
  PRIMARY KEY (`modulename`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of modules
-- ----------------------------
INSERT INTO `modules` VALUES ('Registries-RAAO');
INSERT INTO `modules` VALUES ('Registries_Allotments');
INSERT INTO `modules` VALUES ('Registries_Appropriations');
INSERT INTO `modules` VALUES ('Registries_Obligations');
INSERT INTO `modules` VALUES ('Reports');
INSERT INTO `modules` VALUES ('RF-Allotment Classes');
INSERT INTO `modules` VALUES ('RF-Appropriation Types');
INSERT INTO `modules` VALUES ('RF-Chart of Accounts');
INSERT INTO `modules` VALUES ('RF-Functions');
INSERT INTO `modules` VALUES ('RF-Funds');
INSERT INTO `modules` VALUES ('RF-Object of Expenditures');
INSERT INTO `modules` VALUES ('RF-Payees');
INSERT INTO `modules` VALUES ('RF-Programs');
INSERT INTO `modules` VALUES ('RF-Sources');

-- ----------------------------
-- Table structure for municipalities
-- ----------------------------
DROP TABLE IF EXISTS `municipalities`;
CREATE TABLE `municipalities` (
  `recid` int(2) NOT NULL AUTO_INCREMENT,
  `munname` varchar(25) NOT NULL,
  PRIMARY KEY (`recid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of municipalities
-- ----------------------------
INSERT INTO `municipalities` VALUES ('1', 'COMPOSTELA');
INSERT INTO `municipalities` VALUES ('2', 'LAAK');
INSERT INTO `municipalities` VALUES ('3', 'MABINI');
INSERT INTO `municipalities` VALUES ('4', 'MACO');
INSERT INTO `municipalities` VALUES ('5', 'MARAGUSAN');
INSERT INTO `municipalities` VALUES ('6', 'MAWAB');
INSERT INTO `municipalities` VALUES ('7', 'MONKAYO');
INSERT INTO `municipalities` VALUES ('8', 'MONTEVISTA');
INSERT INTO `municipalities` VALUES ('9', 'NABUNTURAN');
INSERT INTO `municipalities` VALUES ('10', 'NEW BATAAN');
INSERT INTO `municipalities` VALUES ('11', 'PANTUKAN');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `recid` int(4) NOT NULL AUTO_INCREMENT,
  `ModuleName` varchar(30) NOT NULL,
  `iduser` int(4) NOT NULL,
  `addtag` int(1) NOT NULL,
  `updatetag` int(1) NOT NULL,
  `deletetag` int(1) NOT NULL,
  `viewtag` int(1) NOT NULL,
  PRIMARY KEY (`recid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of permissions
-- ----------------------------

-- ----------------------------
-- Table structure for systemusers
-- ----------------------------
DROP TABLE IF EXISTS `systemusers`;
CREATE TABLE `systemusers` (
  `recid` int(4) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(50) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `UserPassword` varchar(32) NOT NULL,
  `UserType` varchar(20) NOT NULL,
  PRIMARY KEY (`recid`,`FullName`,`UserName`,`UserPassword`),
  UNIQUE KEY `recid` (`recid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of systemusers
-- ----------------------------

-- ----------------------------
-- Table structure for tallies
-- ----------------------------
DROP TABLE IF EXISTS `tallies`;
CREATE TABLE `tallies` (
  `recid` int(11) NOT NULL AUTO_INCREMENT,
  `date_updated` date NOT NULL,
  `municipality_id` int(11) NOT NULL,
  `barangay_id` int(11) NOT NULL,
  `munname` varchar(15) NOT NULL,
  `brgyname` varchar(20) NOT NULL,
  `pum_brgy` int(11) NOT NULL,
  `pum_brgy_completed_quarantine` int(11) NOT NULL,
  `pum_brgy_referred_pui` int(11) NOT NULL,
  `pui_brgy` int(11) NOT NULL,
  `pui_brgy_mild_elderly_wcom` int(11) NOT NULL,
  `pui_brgy_mild_elderly_ncom` int(4) NOT NULL,
  `pui_brgy_mild_notelderly_wcom` int(4) NOT NULL,
  `pui_brgy_mild_notelderly_ncom` int(4) NOT NULL,
  `pui_brgy_severe_elderly_wcom` int(11) NOT NULL,
  `pui_brgy_severe_elderly_ncom` int(11) NOT NULL,
  `pui_brgy_severe_notelderly_wcom` int(11) NOT NULL,
  `pui_brgy_severe_notelderly_ncom` int(11) NOT NULL,
  `pui_dis` int(4) NOT NULL,
  `pui_dis_mild_elderly_wcom` int(11) NOT NULL,
  `pui_dis_mild_elderly_ncom` int(11) NOT NULL,
  `pui_dis_mild_notelderly_wcom` int(11) NOT NULL,
  `pui_dis_mild_notelderly_ncom` int(11) NOT NULL,
  `pui_dis_severe_elderly_wcom` int(11) NOT NULL,
  `pui_dis_severe_elderly_ncom` int(11) NOT NULL,
  `pui_dis_severe_notelderly_wcom` int(11) NOT NULL,
  `pui_dis_severe_notelderly_ncom` int(11) NOT NULL,
  `pui_ref` int(11) NOT NULL,
  `pui_ref_mild_elderly_wcom` int(11) NOT NULL,
  `pui_ref_mild_elderly_ncom` int(11) NOT NULL,
  `pui_ref_mild_notelderly_wcom` int(11) NOT NULL,
  `pui_ref_mild_notelderly_ncom` int(11) NOT NULL,
  `pui_ref_severe_elderly_wcom` int(11) NOT NULL,
  `pui_ref_severe_elderly_ncom` int(11) NOT NULL,
  `pui_ref_severe_notelderly_wcom` int(11) NOT NULL,
  `pui_ref_severe_notelderly_ncom` int(11) NOT NULL,
  `pui_admitted` int(11) NOT NULL,
  `pui_admitted_elderly` int(11) NOT NULL,
  `pui_admitted_not_elderly` int(11) NOT NULL,
  `pui_admitted_with_comorbidity` int(11) NOT NULL,
  `pui_admitted_no_comorbidity` int(11) NOT NULL,
  `pui_deaths_nc` int(11) NOT NULL,
  `pui_deaths_nc_elderly` int(11) NOT NULL,
  `pui_deaths_nc_not_elderly` int(11) NOT NULL,
  `pui_deaths_nc_with_comorbidity` int(11) NOT NULL,
  `pui_deaths_nc_no_comorbidity` int(11) NOT NULL,
  `pui_negative` int(11) NOT NULL,
  `pui_negative_elderly` int(11) NOT NULL,
  `pui_negative_not_elderly` int(11) NOT NULL,
  `pui_negative_with_comorbidity` int(11) NOT NULL,
  `pui_negative_no_comorbidity` int(11) NOT NULL,
  `pui_recovered` int(11) NOT NULL,
  `pui_recovered_elderly` int(11) NOT NULL,
  `pui_recovered_not_elderly` int(11) NOT NULL,
  `pui_recovered_with_comorbidity` int(11) NOT NULL,
  `pui_recovered_no_comorbidity` int(11) NOT NULL,
  `pui_deaths_n` int(11) NOT NULL,
  `pui_deaths_n_elderly` int(11) NOT NULL,
  `pui_deaths_n_not_elderly` int(11) NOT NULL,
  `pui_deaths_n_with_comorbidity` int(11) NOT NULL,
  `pui_deaths_n_no_comorbidity` int(11) NOT NULL,
  `covid_positive` int(11) NOT NULL,
  `covid_positive_elderly` int(11) NOT NULL,
  `covid_positive_not_elderly` int(11) NOT NULL,
  `covid_positive_with_comorbidity` int(11) NOT NULL,
  `covid_positive_no_comorbidity` int(11) NOT NULL,
  `covid_deaths` int(11) NOT NULL,
  `covid_deaths_elderly` int(11) NOT NULL,
  `covid_deaths_not_elderly` int(11) NOT NULL,
  `covid_deaths_with_comorbidity` int(11) NOT NULL,
  `covid_deaths_no_comorbidity` int(11) NOT NULL,
  `covid_discharged` int(11) NOT NULL,
  `covid_discharged_elderly` int(11) NOT NULL,
  `covid_discharged_not_elderly` int(11) NOT NULL,
  `covid_discharged_with_comorbidity` int(11) NOT NULL,
  `covid_discharged_no_comorbidity` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`recid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tallies
-- ----------------------------
INSERT INTO `tallies` VALUES ('1', '2020-03-23', '1', '233', 'COMPOSTELA     ', 'AURORA              ', '4', '5', '0', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '0', '-2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '25', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2020-03-24 07:10:56', '2020-03-24 07:10:56');
INSERT INTO `tallies` VALUES ('2', '2020-03-26', '4', '251', 'MACO           ', 'BINUANGAN           ', '22', '12', '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2020-03-24 07:11:33', '2020-03-24 07:11:33');
INSERT INTO `tallies` VALUES ('3', '2020-03-26', '1', '244', 'COMPOSTELA     ', 'POBLACION           ', '100', '105', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2020-03-24 07:12:16', '2020-03-24 07:12:16');

-- ----------------------------
-- Table structure for tallies_copy
-- ----------------------------
DROP TABLE IF EXISTS `tallies_copy`;
CREATE TABLE `tallies_copy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_updated` datetime NOT NULL,
  `municipality_id` int(11) NOT NULL,
  `barangay_id` int(11) NOT NULL,
  `brgy_pum` int(11) NOT NULL,
  `brgy_pum_death` int(11) NOT NULL,
  `brgy_completed_quarantine` int(11) NOT NULL,
  `brgy_referred_pui` int(11) NOT NULL,
  `pui_brgy` int(11) NOT NULL,
  `pui_brgy_mild` int(11) NOT NULL,
  `pui_brgy_severe` int(11) NOT NULL,
  `pui_brgy_elderly` int(11) NOT NULL,
  `pui_brgy_not_elderly` int(11) NOT NULL,
  `pui_brgy_with_comorbidity` int(11) NOT NULL,
  `pui_brgy_no_comorbidity` int(11) DEFAULT NULL,
  `pui_brgy_discharged` int(11) NOT NULL,
  `pui_brgy_discharged_mild` int(11) NOT NULL,
  `pui_brgy_discharged_severe` int(11) NOT NULL,
  `pui_brgy_discharged_elderly` int(11) NOT NULL,
  `pui_brgy_discharged_not_elderly` int(11) NOT NULL,
  `pui_brgy_discharged_with_comorbidity` int(11) NOT NULL,
  `pui_brgy_discharged_no_comorbidity` int(11) NOT NULL,
  `pui_brgy_referred` int(11) NOT NULL,
  `pui_brgy_referred_mild` int(11) NOT NULL,
  `pui_brgy_referred_severe` int(11) NOT NULL,
  `pui_brgy_referred_elderly` int(11) NOT NULL,
  `pui_brgy_referred_not_elderly` int(11) NOT NULL,
  `pui_brgy_referred_with_comorbidity` int(11) NOT NULL,
  `pui_brgy_referred_no_comorbidity` int(11) NOT NULL,
  `pui_brgy_deaths` int(11) NOT NULL,
  `pui_brgy_deaths_mild` int(11) NOT NULL,
  `pui_brgy_deaths_severe` int(11) DEFAULT NULL,
  `pui_brgy_deaths_elderly` int(11) DEFAULT NULL,
  `pui_brgy_deaths_not_elderly` int(11) NOT NULL,
  `pui_brgy_deaths_with_comorbidity` int(11) DEFAULT NULL,
  `pui_brgy_deaths_no_comorbidity` int(11) NOT NULL,
  `pui_admitted` int(11) NOT NULL,
  `pui_admitted_elderly` int(11) NOT NULL,
  `pui_admitted_not_elderly` int(11) NOT NULL,
  `pui_admitted_with_comorbidity` int(11) NOT NULL,
  `pui_admitted_no_comorbidity` int(11) NOT NULL,
  `pui_deaths_nc` int(11) NOT NULL,
  `pui_deaths_nc_elderly` int(11) NOT NULL,
  `pui_deaths_nc_not_elderly` int(11) NOT NULL,
  `pui_deaths_nc_with_comorbidity` int(11) NOT NULL,
  `pui_deaths_nc_no_comorbidity` int(11) NOT NULL,
  `pui_negative` int(11) NOT NULL,
  `pui_negative_elderly` int(11) NOT NULL,
  `pui_negative_not_elderly` int(11) NOT NULL,
  `pui_negative_with_comorbidity` int(11) NOT NULL,
  `pui_negative_no_comorbidity` int(11) NOT NULL,
  `pui_recovered` int(11) NOT NULL,
  `pui_recovered_elderly` int(11) NOT NULL,
  `pui_recovered_not_elderly` int(11) NOT NULL,
  `pui_recovered_with_comorbidity` int(11) NOT NULL,
  `pui_recovered_no_comorbidity` int(11) NOT NULL,
  `pui_deaths_n` int(11) NOT NULL,
  `pui_deaths_n_elderly` int(11) NOT NULL,
  `pui_deaths_n_not_elderly` int(11) NOT NULL,
  `pui_deaths_n_with_comorbidity` int(11) NOT NULL,
  `pui_deaths_n_no_comorbidity` int(11) NOT NULL,
  `covid_positive` int(11) NOT NULL,
  `covid_positive_elderly` int(11) NOT NULL,
  `covid_positive_not_elderly` int(11) NOT NULL,
  `covid_positive_with_comorbidity` int(11) NOT NULL,
  `covid_positive_no_comorbidity` int(11) NOT NULL,
  `covid_deaths` int(11) NOT NULL,
  `covid_deaths_elderly` int(11) NOT NULL,
  `covid_deaths_not_elderly` int(11) NOT NULL,
  `covid_deaths_with_comorbidity` int(11) NOT NULL,
  `covid_deaths_no_comorbidity` int(11) NOT NULL,
  `covid_discharged` int(11) NOT NULL,
  `covid_discharged_elderly` int(11) NOT NULL,
  `covid_discharged_not_elderly` int(11) NOT NULL,
  `covid_discharged_with_comorbidity` int(11) NOT NULL,
  `covid_discharged_no_comorbidity` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tallies_copy
-- ----------------------------
INSERT INTO `tallies_copy` VALUES ('1', '2020-03-25 00:00:00', '1', '233', '4', '0', '5', '0', '1', '1', '0', '0', '1', '0', '1', '0', '-2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '25', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2020-03-24 07:10:56', '2020-03-24 07:10:56');
INSERT INTO `tallies_copy` VALUES ('2', '2020-03-23 00:00:00', '2', '193', '50', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2020-03-24 07:11:33', '2020-03-24 07:11:33');
INSERT INTO `tallies_copy` VALUES ('3', '2020-03-23 00:00:00', '1', '233', '100', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2020-03-24 07:12:16', '2020-03-24 07:12:16');

-- ----------------------------
-- Table structure for uselogs
-- ----------------------------
DROP TABLE IF EXISTS `uselogs`;
CREATE TABLE `uselogs` (
  `recid` int(10) NOT NULL AUTO_INCREMENT,
  `FTRANS` varchar(100) NOT NULL,
  `FUSER` int(4) NOT NULL,
  `TRANDATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`recid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of uselogs
-- ----------------------------
INSERT INTO `uselogs` VALUES ('1', 'Tally-Edited1 Brgy:AURORA COMPOSTELA                Date:03/25/2020', '1', '2020-03-25 21:45:19');
INSERT INTO `uselogs` VALUES ('2', 'Tally-Edited1 Brgy:AURORA COMPOSTELA                Date:03/25/2020', '1', '2020-03-25 21:45:49');
INSERT INTO `uselogs` VALUES ('3', 'Tally-Edited1 Brgy: COMPOSTELA                Date:03/25/2020', '1', '2020-03-25 21:45:53');
INSERT INTO `uselogs` VALUES ('4', 'Tally-Edited1 Brgy:AURORA COMPOSTELA                Date:03/25/2020', '1', '2020-03-25 21:47:11');
INSERT INTO `uselogs` VALUES ('5', 'Tally-Edited1 Brgy:AURORA COMPOSTELA                Date:03/25/2020', '1', '2020-03-25 21:47:20');
INSERT INTO `uselogs` VALUES ('6', 'Tally-Edited2 Brgy:AGUINALDO LAAK                      Date:03/23/2020', '1', '2020-03-25 21:47:37');
INSERT INTO `uselogs` VALUES ('7', 'Tally-Edited2 Brgy:AGUINALDO LAAK                      Date:03/23/2020', '1', '2020-03-25 21:48:20');
INSERT INTO `uselogs` VALUES ('8', 'Tally-Edited3 Brgy:PANANSALAN COMPOSTELA                Date:03/23/2020', '1', '2020-03-25 21:48:40');
INSERT INTO `uselogs` VALUES ('9', 'Tally-Edited2 Brgy:AGUINALDO LAAK                      Date:03/23/2020', '1', '2020-03-25 21:54:35');
INSERT INTO `uselogs` VALUES ('10', 'Tally-Edited1 Brgy:AURORA COMPOSTELA                Date:03/25/2020', '1', '2020-03-25 22:00:39');
INSERT INTO `uselogs` VALUES ('11', 'Tally-Edited1 Brgy:AURORA COMPOSTELA                Date:03/25/2020', '1', '2020-03-25 22:02:22');
INSERT INTO `uselogs` VALUES ('12', 'Tally-Edited1 Brgy:AURORA COMPOSTELA                Date:03/25/2020', '1', '2020-03-25 22:03:52');
INSERT INTO `uselogs` VALUES ('13', 'Tally-Edited3 Brgy:PANANSALAN COMPOSTELA                Date:03/23/2020', '1', '2020-03-26 00:43:30');
INSERT INTO `uselogs` VALUES ('14', 'Tally-Edited1 Brgy:AURORA COMPOSTELA                Date:03/23/2020', '1', '2020-03-26 00:43:46');
INSERT INTO `uselogs` VALUES ('15', 'Tally-Edited3 Brgy:PANANSALAN COMPOSTELA                Date:03/22/2020', '1', '2020-03-26 14:13:03');
INSERT INTO `uselogs` VALUES ('16', 'Tally-Edited3 Brgy: COMPOSTELA                Date:03/22/2020', '1', '2020-03-26 14:19:14');
INSERT INTO `uselogs` VALUES ('17', 'Tally-Edited3 Brgy:POBLACION COMPOSTELA                Date:03/26/2020', '1', '2020-03-26 14:22:13');
INSERT INTO `uselogs` VALUES ('18', 'Tally-Edited2 Brgy:BINUANGAN MACO                      Date:03/26/2020', '1', '2020-03-26 14:24:55');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Admin', 'admin@admin.com', null, '$2y$10$iSDpkptrBHulOeDI0moJaO56UE73CPCjsdDqFVU1uSolfqslHcrOK', null, '2020-03-18 06:06:44', '2020-03-18 06:06:44');
