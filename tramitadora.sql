-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-08-2012 a las 17:18:55
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tramitadora`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `claves`
--

CREATE TABLE IF NOT EXISTS `claves` (
  `id_clave` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(10) NOT NULL,
  `contrato` varchar(10) NOT NULL,
  PRIMARY KEY (`id_clave`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=959 ;

--
-- Volcar la base de datos para la tabla `claves`
--

INSERT INTO `claves` (`id_clave`, `clave`, `contrato`) VALUES
(897, 'PRUEBA01', 'PRUEBA'),
(898, 'IM-01', 'IMP-01'),
(899, 'Y-1', 'YAR-01'),
(900, 'Y-2', 'YAR-01'),
(901, 'Y-3', 'YAR-01'),
(902, 'Y-4', 'YAR-01'),
(903, 'D-1', 'DIS-01'),
(904, 'AR-1', 'YAR-02'),
(905, 'D-01', 'DIS-02'),
(906, 'IA-01', 'IAN-01'),
(907, 'CA-1', 'CAI-01'),
(908, 'OM1', 'OMA-01'),
(909, 'N-01', 'NIT-01'),
(910, 'DU-1', 'DUC-01'),
(911, 'AA-01', 'SQM-01'),
(912, 'AC-01', 'SQM-02'),
(913, 'AD-01', 'SQM-02'),
(914, 'D01', 'DIS-03'),
(915, 'D02', 'DIS-03'),
(916, 'D03', 'DIS-03'),
(917, 'O-01', '0MA-02'),
(918, 'O-02', '0MA-02'),
(919, 'Y-01', 'YAR-03'),
(920, 'P-01', 'PAC-01'),
(921, 'P-02', 'PAC-01'),
(922, 'DS-01', 'DIS-03'),
(923, 'OM-01', '0MA-02'),
(924, 'OM-2', 'OMA-01'),
(925, 'OM-010', 'OMA-03'),
(926, 'OM-011', 'OMA-03'),
(927, 'OM-1', 'OMA-01'),
(928, 'DA-01', 'DIS-04'),
(929, 'IM-1', 'IMP-02'),
(930, 'T-01', 'NIT-02'),
(931, 'DD-01', 'DIS-05'),
(932, 'DD-02', 'DIS-05'),
(933, 'S-01', 'yar-04'),
(934, 'S-02', 'yar-04'),
(935, 'S-03', 'yar-04'),
(936, 'S-04', 'yar-04'),
(937, 'S-05', 'yar-04'),
(938, 'X-01', 'pac-02'),
(939, 'PZ-1', 'PAC-03'),
(940, 'PZ-2', 'PAC-03'),
(941, 'U-1', 'YAR-05'),
(942, 'U-2', 'YAR-05'),
(943, 'J-1', 'DIS-06'),
(944, 'J-2', 'DIS-06'),
(945, 'K-01', 'OMA-04'),
(946, 'K-02', 'OMA-04'),
(947, 'TR-01', 'NIT-03'),
(948, 'M-1', 'IMP-03'),
(949, 'PB-1', 'PAC-04'),
(950, 'Y-001', 'YAR-06'),
(951, 'D-001', 'DIS-07'),
(953, 'G-01', 'DIS-08'),
(954, 'DP-1', 'DUC-02'),
(955, 'YA-01', 'IAN-02'),
(956, 'CM-1', 'CMA-01'),
(957, 'PF-01', 'PRO-01'),
(958, 'TN-01', 'NIT-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `claves_users`
--

CREATE TABLE IF NOT EXISTS `claves_users` (
  `id_clave` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `claves_users`
--

INSERT INTO `claves_users` (`id_clave`, `id`) VALUES
(910, 28),
(911, 32),
(913, 32),
(928, 22),
(929, 22),
(946, 29),
(948, 34),
(948, 20),
(951, 24),
(949, 33),
(950, 26),
(951, 34),
(949, 34),
(950, 34),
(953, 34),
(956, 25),
(955, 25),
(958, 25),
(957, 25),
(956, 36),
(955, 36),
(958, 36),
(957, 36),
(958, 30),
(955, 37),
(956, 34),
(955, 34),
(958, 34),
(957, 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE IF NOT EXISTS `configuracion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen_frontal` varchar(254) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `imagen_frontal`) VALUES
(3, 'FONDO.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dairy_board_report`
--

CREATE TABLE IF NOT EXISTS `dairy_board_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cve_contrato` varchar(10) NOT NULL,
  `report` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `dairy_board_report`
--

INSERT INTO `dairy_board_report` (`id`, `cve_contrato`, `report`) VALUES
(2, 'PAC-03', '<p><strong>Dia 1 </strong>Fecha: 13/07/2012</p>\r\n<p>- Se está probando el módulo de <em>dairy board report </em>el cual esta<strong> funcionando bien</strong>.</p>\r\n<p><strong>Dia 2 </strong>Fecha: 14/07/2012</p>\r\n<p>- Se publicá la funcionalidad en producción</p>\r\n<p><strong>DIA 4</strong> Fecha: 16/07/2012</p>\r\n<p>- Después de un dia muy nublado y lluvioso ya se esta trabajando (prueba de captura)</p>'),
(3, 'NIT-03', '<p>ESTADO DE HECHOS::</p>\r\n<p> </p>'),
(4, 'IMP-03', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE IF NOT EXISTS `empresas` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(254) NOT NULL,
  `imagen` varchar(254) NOT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `nombre`, `imagen`) VALUES
(1, 'TRAMITADORA DEL PACIFICO S.A DE C.V', '7f2c7-LOGO-ANACOPA-TRAMITADORA.JPG'),
(2, 'GRUPO ALMACONT S.A. DE C.V.', '42aae-almacont.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_contratos`
--

CREATE TABLE IF NOT EXISTS `imagenes_contratos` (
  `clave_contrato` varchar(10) NOT NULL,
  `imagen` varchar(254) NOT NULL,
  PRIMARY KEY (`clave_contrato`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `imagenes_contratos`
--

INSERT INTO `imagenes_contratos` (`clave_contrato`, `imagen`) VALUES
('DIS-01', 'bb0d9-MARGARITE.JPG'),
('IMP-01', 'IMP01.jpg'),
('IMP-03', '8ea45-IMG_0470.JPG'),
('NIT-03', '73f43-SAM_1261.jpg'),
('YAR-01', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` int(10) unsigned NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `id_empresa` int(11) NOT NULL,
  `superusuario` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `IX_USERNAME` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Volcar la base de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `id_empresa`, `superusuario`) VALUES
(1, 2130706433, 'administrador', '24359', '1234567890', 'admin@admin.com', '', '', '', 1268889823, 1345240245, 1, 'Jose Luis ', 'Diaz', 'ADMIN', '0', 1, 1),
(17, 2130706433, 'root', 'toor', NULL, 'ing.edmundo@gmail.com', NULL, NULL, NULL, 1268889823, 1343694209, 1, NULL, NULL, NULL, NULL, 1, 1),
(20, 0, 'IMPALA', 'impalamzo', NULL, '', NULL, NULL, NULL, 0, 1344461124, 1, 'MARTIN', 'HERNANDEZ', NULL, NULL, 2, 1),
(22, 0, 'KARLAJ', '1704', NULL, '', NULL, NULL, NULL, 0, 1343763138, 1, 'KARLA ', 'JIMENEZ', NULL, NULL, 2, 1),
(24, 0, 'disagro', 'kds93Kyus', NULL, '', NULL, NULL, NULL, 0, 1344733894, 1, 'SAUL', 'MARTINEZ', NULL, NULL, 1, 1),
(25, 0, 'MLEPEZ', 'COLIMA97', NULL, '', NULL, NULL, NULL, 0, 1345225443, 1, 'MARTIN', 'LEPEZ', NULL, NULL, 1, 1),
(26, 0, 'PICHARDINE', 'MANZANILLO', NULL, 'Claudio.Pichardine@yara.com', NULL, NULL, NULL, 0, 1336923374, 1, NULL, NULL, NULL, NULL, 1, 1),
(28, 0, 'DUCORAGRO', 'MANZANILLO', NULL, '', NULL, NULL, NULL, 0, 1335997020, 1, 'DUCORAGRO', '', NULL, NULL, 1, 1),
(29, 0, 'OMAGRO', 'OMAZLO', NULL, '', NULL, NULL, NULL, 0, 1344016549, 1, 'JAVIER', 'MORENO', NULL, NULL, 1, 1),
(30, 0, 'NITROFER', 'ANDRES', NULL, '', NULL, NULL, NULL, 0, 1345223263, 1, 'NITROFER', NULL, NULL, NULL, 1, 1),
(32, 0, 'OMARH', 'DELTORO', NULL, '', NULL, NULL, NULL, 0, 1335916813, 1, 'OMAR ', 'HERNANDEZ', NULL, NULL, 1, 1),
(33, 0, 'JOSELUISSANCHEZ', 'JOSACA_66', NULL, '', NULL, NULL, NULL, 0, 1337109066, 1, 'JOSE LUIS', 'SANCHEZ CASILLAS', NULL, NULL, 1, 1),
(34, 0, 'TRAMITADORA', 'aduana', NULL, 'manzanillo@tramitadora.com', NULL, NULL, NULL, 0, 1345308292, 1, 'Tramitadora del pacifico', NULL, NULL, NULL, 1, 1),
(36, 0, 'jdiaz', 'lolo51', NULL, '', NULL, NULL, NULL, 0, 1345308422, 1, 'Jose Luis ', 'Diaz Caro', NULL, NULL, 1, 1),
(37, 0, 'IANSA', 'TOCAYO', NULL, 'valvarado@iansa.com.mx', NULL, NULL, NULL, 0, 1345309631, 1, 'JOSE LUIS ', 'GUTIERREZ MURO', NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(5, 17, 1),
(6, 17, 2);
