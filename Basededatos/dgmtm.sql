/*
Navicat MySQL Data Transfer

Source Server         : MySql
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : dgmtm

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2018-05-29 20:55:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for autorizaciones
-- ----------------------------
DROP TABLE IF EXISTS `autorizaciones`;
CREATE TABLE `autorizaciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `proveedor_id` int(10) unsigned NOT NULL,
  `solicitud_id` int(10) unsigned NOT NULL,
  `numero_autorizacion` int(11) NOT NULL,
  `fecha_autorizacion` date NOT NULL,
  `status` enum('En Proceso','Falta Repuesto','No Procede','Talleres','Ejecutado') COLLATE utf8_unicode_ci NOT NULL,
  `seguimiento` mediumtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `autorizaciones_numero_autorizacion_unique` (`numero_autorizacion`),
  KEY `autorizaciones_proveedor_id_foreign` (`proveedor_id`),
  KEY `autorizaciones_solicitud_id_foreign` (`solicitud_id`),
  CONSTRAINT `autorizaciones_proveedor_id_foreign` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `autorizaciones_solicitud_id_foreign` FOREIGN KEY (`solicitud_id`) REFERENCES `solicitudes` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of autorizaciones
-- ----------------------------
INSERT INTO `autorizaciones` VALUES ('2', '2', '2', '1', '2018-02-26', 'En Proceso', 'Visita tecnica programada con el proveedor', '2018-02-26 21:57:16', '2018-02-26 21:57:16');
INSERT INTO `autorizaciones` VALUES ('3', '1', '1', '2', '2018-02-26', 'En Proceso', 'Autorizado. Repuesto solicitado al fabricante.', '2018-02-26 22:21:00', '2018-02-26 22:21:00');
INSERT INTO `autorizaciones` VALUES ('5', '2', '3', '3', '2018-03-04', 'En Proceso', 'Presupuesto recibido, pendiente de aprobacion', '2018-03-05 00:15:37', '2018-03-05 00:15:37');

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomb_categoria` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `categorias_nomb_categoria_unique` (`nomb_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES ('1', 'TIPO IV', '2017-09-14 17:06:21', '2017-09-14 17:06:21');
INSERT INTO `categorias` VALUES ('2', 'TIPO III', '2018-03-12 03:10:18', '2018-03-12 03:10:18');
INSERT INTO `categorias` VALUES ('3', 'TIPO II', '2018-03-12 03:12:31', '2018-03-12 03:12:31');

-- ----------------------------
-- Table structure for centros
-- ----------------------------
DROP TABLE IF EXISTS `centros`;
CREATE TABLE `centros` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomb_centro` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `estado_id` int(10) unsigned NOT NULL,
  `localidad_id` int(10) unsigned NOT NULL,
  `categoria_id` int(10) unsigned NOT NULL,
  `director_centro` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `centros_director_centro_unique` (`director_centro`),
  KEY `centros_estado_id_foreign` (`estado_id`),
  KEY `centros_localidad_id_foreign` (`localidad_id`),
  KEY `centros_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `centros_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `centros_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `centros_localidad_id_foreign` FOREIGN KEY (`localidad_id`) REFERENCES `localidades` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of centros
-- ----------------------------
INSERT INTO `centros` VALUES ('3', 'DR. DOMINGO LUCIANI', '1', '1', '1', 'DRA. M. CONTRERAS', '2017-09-19 16:52:57', '2017-09-25 21:20:46');
INSERT INTO `centros` VALUES ('4', 'DR. PEREZ CARREÑO', '2', '2', '1', 'DR. L. BRICENO', '2018-03-04 23:59:52', '2018-03-05 00:03:15');

-- ----------------------------
-- Table structure for equipos
-- ----------------------------
DROP TABLE IF EXISTS `equipos`;
CREATE TABLE `equipos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `centro_id` int(10) unsigned NOT NULL,
  `servicio_id` int(10) unsigned NOT NULL,
  `tipoequipo_id` int(10) unsigned NOT NULL,
  `marca_equipo` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `modelo_equipo` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `serial_equipo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `bien_nacional` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `equipo_garantia` enum('SI','NO') COLLATE utf8_unicode_ci NOT NULL,
  `estatus_equipo` enum('Activo','Inactivo') COLLATE utf8_unicode_ci NOT NULL,
  `responsable_garantia` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duracion_garantia` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observaciones_equipo` mediumtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `equipos_serial_equipo_unique` (`serial_equipo`),
  UNIQUE KEY `equipos_bien_nacional_unique` (`bien_nacional`),
  KEY `equipos_centro_id_foreign` (`centro_id`),
  KEY `equipos_servicio_id_foreign` (`servicio_id`),
  KEY `equipos_tipoequipo_id_foreign` (`tipoequipo_id`),
  CONSTRAINT `equipos_centro_id_foreign` FOREIGN KEY (`centro_id`) REFERENCES `centros` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `equipos_servicio_id_foreign` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `equipos_tipoequipo_id_foreign` FOREIGN KEY (`tipoequipo_id`) REFERENCES `tiposequipos` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of equipos
-- ----------------------------
INSERT INTO `equipos` VALUES ('2', '3', '1', '3', 'SIEMENS', 'MULTIX FUSION', 'SMX-44751210', 'BN-4475121', 'NO', 'Activo', '', '', '', '2017-10-11 16:23:05', '2017-10-11 16:23:15');
INSERT INTO `equipos` VALUES ('3', '3', '3', '5', 'GE HEALTHCARE', 'REVOLUTION EVO', 'GEH-45458780', 'BN-7878787', 'NO', 'Activo', '', '', '', '2017-12-08 21:05:47', '2017-12-08 21:05:47');
INSERT INTO `equipos` VALUES ('4', '3', '2', '4', 'DRAGER', 'FABIUS PLUS', 'DRG-12127880', 'BN-7878001', 'NO', 'Activo', '', '', '', '2017-12-08 21:06:15', '2017-12-08 21:06:15');
INSERT INTO `equipos` VALUES ('5', '3', '1', '3', 'PHILIPS', 'DIGITALDIAGNOST', 'PHL-11445454', 'BN-7878002', 'NO', 'Activo', '', '', '', '2017-12-15 21:29:28', '2017-12-15 21:29:28');
INSERT INTO `equipos` VALUES ('6', '4', '8', '3', 'CANON MEDICAL', 'CXDI-820C', 'CNM-01010220', 'BN-1230666', 'NO', 'Activo', '', '', '', '2018-03-05 00:04:02', '2018-03-05 00:04:02');
INSERT INTO `equipos` VALUES ('7', '4', '11', '4', 'MINDRAY', 'A7 ANEOS', 'MDR-876TREW66', 'BN-9987003', 'NO', 'Activo', '', '', '', '2018-03-05 00:04:36', '2018-03-05 00:04:36');

-- ----------------------------
-- Table structure for equipo_solicitud
-- ----------------------------
DROP TABLE IF EXISTS `equipo_solicitud`;
CREATE TABLE `equipo_solicitud` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `solicitud_id` int(10) unsigned NOT NULL,
  `equipo_id` int(10) unsigned NOT NULL,
  `falla_reportada` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `equipo_solicitud_solicitud_id_foreign` (`solicitud_id`),
  KEY `equipo_solicitud_equipo_id_foreign` (`equipo_id`),
  CONSTRAINT `equipo_solicitud_equipo_id_foreign` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `equipo_solicitud_solicitud_id_foreign` FOREIGN KEY (`solicitud_id`) REFERENCES `solicitudes` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of equipo_solicitud
-- ----------------------------
INSERT INTO `equipo_solicitud` VALUES ('1', '1', '2', 'Colimador no responde al ajuste de campo', '2018-02-26 21:50:16', '2018-02-26 21:50:16');
INSERT INTO `equipo_solicitud` VALUES ('2', '2', '4', 'Fuga en el circuito de gases, alarma de presion activa', '2018-02-26 21:50:46', '2018-02-26 21:50:46');
INSERT INTO `equipo_solicitud` VALUES ('3', '3', '2', 'El generador se apaga durante la exposicion', '2018-03-04 23:39:43', '2018-03-04 23:39:43');
INSERT INTO `equipo_solicitud` VALUES ('4', '4', '3', 'El gantry emite ruido anomalo al girar', '2018-03-04 23:59:05', '2018-03-04 23:59:05');
INSERT INTO `equipo_solicitud` VALUES ('5', '5', '7', 'El vaporizador no mantiene concentracion estable', '2018-03-05 00:05:28', '2018-03-05 00:05:28');
INSERT INTO `equipo_solicitud` VALUES ('6', '6', '6', 'Sin falla tecnica: error de operacion del usuario', '2018-03-05 00:20:26', '2018-03-05 00:20:26');
INSERT INTO `equipo_solicitud` VALUES ('7', '7', '6', 'El detector digital no inicializa al encender', '2018-05-15 02:46:12', '2018-05-15 02:46:12');

-- ----------------------------
-- Table structure for estados
-- ----------------------------
DROP TABLE IF EXISTS `estados`;
CREATE TABLE `estados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomb_estado` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of estados
-- ----------------------------
INSERT INTO `estados` VALUES ('1', 'MIRANDA', '2017-09-14 17:05:33', '2017-09-14 17:05:33');
INSERT INTO `estados` VALUES ('2', 'CARACAS', '2018-03-05 00:02:12', '2018-03-05 00:02:12');
INSERT INTO `estados` VALUES ('3', 'TACHIRA', '2018-03-12 03:12:54', '2018-03-12 03:12:54');

-- ----------------------------
-- Table structure for localidades
-- ----------------------------
DROP TABLE IF EXISTS `localidades`;
CREATE TABLE `localidades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estado_id` int(10) unsigned NOT NULL,
  `nomb_localidad` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `localidades_estado_id_foreign` (`estado_id`),
  CONSTRAINT `localidades_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of localidades
-- ----------------------------
INSERT INTO `localidades` VALUES ('1', '1', 'EL LLANITO', '2017-09-14 17:05:49', '2017-09-14 17:05:49');
INSERT INTO `localidades` VALUES ('2', '2', 'LA YAGUARA', '2018-03-05 00:02:32', '2018-04-11 03:29:29');
INSERT INTO `localidades` VALUES ('3', '2', 'CATIAS', '2018-03-05 00:02:46', '2018-04-11 03:30:10');
INSERT INTO `localidades` VALUES ('4', '3', 'SAN CRISTOBAL', '2018-03-12 03:15:33', '2018-03-12 03:15:33');
INSERT INTO `localidades` VALUES ('5', '3', 'TARIBA', '2018-03-12 03:15:43', '2018-03-12 03:15:43');
INSERT INTO `localidades` VALUES ('6', '3', 'EL LLANITO', '2018-04-11 04:26:03', '2018-04-11 04:26:03');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2016_08_28_165208_create_estados_table', '1');
INSERT INTO `migrations` VALUES ('2016_08_28_165210_create_localidades_table_', '1');
INSERT INTO `migrations` VALUES ('2016_08_28_165230_create_categorias_table', '1');
INSERT INTO `migrations` VALUES ('2016_08_28_165240_create_proveedores_table', '1');
INSERT INTO `migrations` VALUES ('2016_08_28_165270_create_centros_table', '1');
INSERT INTO `migrations` VALUES ('2016_08_28_165271_create_servicios_table', '1');
INSERT INTO `migrations` VALUES ('2016_08_28_165273_create_tipo_equipo_table', '1');
INSERT INTO `migrations` VALUES ('2016_08_28_165282_create_equipos_table', '2');
INSERT INTO `migrations` VALUES ('2016_08_28_165316_create_autorizaciones_table', '2');
INSERT INTO `migrations` VALUES ('2016_08_28_165318_create_solicitudes_table', '2');
INSERT INTO `migrations` VALUES ('2016_09_11_031319_create_equipo_solicitud_table', '2');
INSERT INTO `migrations` VALUES ('2016_09_11_033917_create_reportes_proveedores_table', '2');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for proveedores
-- ----------------------------
DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE `proveedores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rif_proveedor` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nomb_proveedor` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `telf_proveedor` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `correo_proveedor` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contacto_proveedor` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `proveedores_rif_proveedor_unique` (`rif_proveedor`),
  UNIQUE KEY `proveedores_correo_proveedor_unique` (`correo_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of proveedores
-- ----------------------------
INSERT INTO `proveedores` VALUES ('1', 'J123456789', 'CONTINENTAL MEDICAL SYSTEMS', '02125550101', 'soporte@continentalmed.com', 'ING. P. MARQUEZ', '2018-02-26 17:08:39', '2018-02-26 17:08:39');
INSERT INTO `proveedores` VALUES ('2', 'J876543210', 'ASA TECNOLOGIA BIOMEDICA', '02125550202', 'servicio@asabiomedica.com', 'ING. D. ALVAREZ', '2018-02-26 17:12:36', '2018-02-26 17:12:36');

-- ----------------------------
-- Table structure for reportes_proveedores
-- ----------------------------
DROP TABLE IF EXISTS `reportes_proveedores`;
CREATE TABLE `reportes_proveedores` (
  `id` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `proveedor_id` int(10) unsigned NOT NULL,
  `autorizacion_id` int(10) unsigned NOT NULL,
  `numero_reporte` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_atencion` date NOT NULL,
  `tecnico_responsable` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `reportes_proveedores_numero_reporte_unique` (`numero_reporte`),
  KEY `reportes_proveedores_autorizacion_id_foreign` (`autorizacion_id`),
  KEY `reportes_proveedores_proveedor_id_foreign` (`proveedor_id`),
  CONSTRAINT `reportes_proveedores_autorizacion_id_foreign` FOREIGN KEY (`autorizacion_id`) REFERENCES `autorizaciones` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `reportes_proveedores_proveedor_id_foreign` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of reportes_proveedores
-- ----------------------------

-- ----------------------------
-- Table structure for servicios
-- ----------------------------
DROP TABLE IF EXISTS `servicios`;
CREATE TABLE `servicios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `centro_id` int(10) unsigned NOT NULL,
  `nomb_servicio` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `servicios_centro_id_foreign` (`centro_id`),
  CONSTRAINT `servicios_centro_id_foreign` FOREIGN KEY (`centro_id`) REFERENCES `centros` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of servicios
-- ----------------------------
INSERT INTO `servicios` VALUES ('1', '3', 'RAYOS X', '2017-09-25 21:21:09', '2017-09-25 21:21:09');
INSERT INTO `servicios` VALUES ('2', '3', 'CIRUGIA', '2017-09-25 21:21:18', '2017-09-25 21:21:18');
INSERT INTO `servicios` VALUES ('3', '3', 'TOMOGRAFIA', '2017-09-25 21:21:30', '2017-09-25 21:21:30');
INSERT INTO `servicios` VALUES ('4', '3', 'UCI', '2017-12-04 20:28:08', '2017-12-04 20:28:08');
INSERT INTO `servicios` VALUES ('5', '3', 'LABORATORIO', '2017-12-04 20:28:52', '2017-12-04 20:28:52');
INSERT INTO `servicios` VALUES ('6', '3', 'HEMODINAMIA', '2017-12-04 20:33:44', '2017-12-04 20:33:44');
INSERT INTO `servicios` VALUES ('7', '4', 'TOMOGRAFIA', '2018-03-05 00:00:23', '2018-03-05 00:00:23');
INSERT INTO `servicios` VALUES ('8', '4', 'RADIOLOGIA', '2018-03-05 00:00:29', '2018-03-05 00:00:29');
INSERT INTO `servicios` VALUES ('9', '4', 'EMERGENCIA PEDIATRICA', '2018-03-05 00:00:36', '2018-03-05 00:00:36');
INSERT INTO `servicios` VALUES ('10', '4', 'RESONANCIA MAGNETICA', '2018-03-05 00:00:47', '2018-03-05 00:00:47');
INSERT INTO `servicios` VALUES ('11', '4', 'QUIROFANO 1', '2018-03-05 00:01:02', '2018-03-05 00:01:02');

-- ----------------------------
-- Table structure for solicitudes
-- ----------------------------
DROP TABLE IF EXISTS `solicitudes`;
CREATE TABLE `solicitudes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `centro_id` int(10) unsigned NOT NULL,
  `numero_solicitud` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Recibida','Autorizada','No Procede') COLLATE utf8_unicode_ci NOT NULL,
  `fecha_recibo` date NOT NULL,
  `responsable_emision` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `jefe_servicio` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `solicitudes_numero_solicitud_unique` (`numero_solicitud`),
  KEY `solicitudes_centro_id_foreign` (`centro_id`),
  CONSTRAINT `solicitudes_centro_id_foreign` FOREIGN KEY (`centro_id`) REFERENCES `centros` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of solicitudes
-- ----------------------------
INSERT INTO `solicitudes` VALUES ('1', '3', '0001', 'Recibida', '2018-02-26', 'J. MENDOZA', 'DRA. R. SILVA', 'Equipo fuera de servicio', '2018-02-26 21:50:16', '2018-02-26 21:50:16');
INSERT INTO `solicitudes` VALUES ('2', '3', '0002', 'Recibida', '2018-02-26', 'J. MENDOZA', 'DR. A. PERNIA', 'Requiere revision urgente', '2018-02-26 21:50:46', '2018-02-26 21:50:46');
INSERT INTO `solicitudes` VALUES ('3', '3', '0003', 'Autorizada', '2018-03-04', 'C. ROJAS', 'DRA. R. SILVA', 'Autorizada a proveedor externo', '2018-03-04 23:39:43', '2018-03-05 00:15:37');
INSERT INTO `solicitudes` VALUES ('4', '3', '0004', 'Recibida', '2018-03-04', 'C. ROJAS', 'DR. A. PERNIA', 'Pendiente de evaluacion tecnica', '2018-03-04 23:59:05', '2018-03-04 23:59:05');
INSERT INTO `solicitudes` VALUES ('5', '4', '0005', 'Recibida', '2018-03-04', 'M. HERRERA', 'DR. J. VILLALBA', 'Reportado por el servicio', '2018-03-05 00:05:28', '2018-03-05 00:05:28');
INSERT INTO `solicitudes` VALUES ('6', '4', '0006', 'No Procede', '2018-03-04', 'M. HERRERA', 'DR. J. VILLALBA', 'No procede: error de operacion, equipo sin falla tecnica', '2018-03-05 00:20:26', '2018-03-05 00:21:00');
INSERT INTO `solicitudes` VALUES ('7', '4', '0007', 'Recibida', '2018-05-14', 'M. HERRERA', 'DRA. C. NAVAS', 'Segunda incidencia del mismo equipo', '2018-05-15 02:46:12', '2018-05-15 02:46:12');

-- ----------------------------
-- Table structure for tiposequipos
-- ----------------------------
DROP TABLE IF EXISTS `tiposequipos`;
CREATE TABLE `tiposequipos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_equipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tiposequipos
-- ----------------------------
INSERT INTO `tiposequipos` VALUES ('3', 'MAQUINA DE RAYOS X', '2017-09-19 17:04:20', '2017-09-19 17:04:20');
INSERT INTO `tiposequipos` VALUES ('4', 'MAQUINA DE ANESTESIA', '2017-09-25 21:05:49', '2017-09-25 21:05:49');
INSERT INTO `tiposequipos` VALUES ('5', 'TOMOGRAFO', '2017-12-08 21:03:33', '2017-12-08 21:03:33');
INSERT INTO `tiposequipos` VALUES ('6', 'RESONADOR', '2017-12-08 21:03:45', '2017-12-08 21:03:45');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `perfil_user` enum('Usuario','Administrador') CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `estatus` enum('Inactivo','Activo') CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'ADMIN DEMO', 'admin@medtech.local', '$2y$10$CJ4Yg1v8EBqW2hDUy2bnGuapI0i.FPNgjvZvUDeKQ8Pw29p40Yvr.', 'Administrador', '', '2018-04-17 00:37:11', '2018-05-01 20:28:03', 'Activo');
INSERT INTO `users` VALUES ('2', 'USUARIO DEMO', 'usuario@medtech.local', '$2y$10$w.ZF4zTuy3PCm9L6dV/zjOx86swYOrvFW04bWIcsfYSIYjQ5/araC', 'Usuario', '', '2018-04-17 00:38:57', '2018-04-17 00:39:27', 'Activo');
