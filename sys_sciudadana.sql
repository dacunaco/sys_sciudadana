-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-10-2013 a las 15:41:44
-- Versión del servidor: 5.5.23
-- Versión de PHP: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `decont_sysmaps`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('5c6699f71be79a38364ea9dfebeb2269', '200.48.201.24', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.76 Safari/537.36', 1380670550, ''),
('688acebc981110ee4b50868203bfca1f', '200.48.201.24', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.76 Safari/537.36', 1380676440, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencia`
--

CREATE TABLE IF NOT EXISTS `incidencia` (
  `idincidencia` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(200) NOT NULL,
  `estado` char(1) NOT NULL,
  `coordenadas` longtext NOT NULL,
  `descripcion` longtext NOT NULL,
  PRIMARY KEY (`idincidencia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `incidencia`
--

INSERT INTO `incidencia` (`idincidencia`, `nombres`, `estado`, `coordenadas`, `descripcion`) VALUES
(7, 'DAVIS BRETTS ACUÑA CORDOVA', '1', '(-8.108091893712698,-79.02414321899414)', 'SADASD'),
(8, '123213', '4', '(-8.097215240678855,-79.04731750488281)', '123123'),
(9, 'DAVIS BRETTS ACUÑA CORDOVA', '1', '(-8.10775200275582,-79.02405738830566)', 'asdasd'),
(10, 'DAVIS BRETTS ACUÑA CORDOVA', '1', '(-8.108373365693927,-79.02413785457611)', 'sadsa'),
(11, 'DAVIS BRETTS ACUÑA CORDOVA', '2', '(-8.098319914161628,-79.03255462646484)', 'asdasd'),
(12, 'dasdasd', '3', '(-8.106774195579199,-79.03798388366698)', 'sadasd'),
(13, 'DAVIS BRETTS ACUÑA CORDOVA', '1', '(-8.098064370691736,-79.00931643371581)', 'asdasd'),
(14, 'DAVIS BRETTS ACUÑA CORDOVA', '3', '(-8.105457112206679,-79.04064463500976)', 'asdasd'),
(15, 'DAVIS BRETTS ACUÑA CORDOVA', '2', '(-8.119307515014293,-79.03480814819335)', 'asdasd'),
(16, 'DAVIS BRETTS ACUÑA CORDOVA', '4', '(-8.105712031905641,-79.010432232666)', 'asdasd'),
(17, 'd12321asdas', '3', '(-8.116588455186468,-79.0170411956787)', 'asdsad'),
(18, 'cesar irribarren', '1', '(-6.4833333, -76.3666667)', 'asdasdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_usuario`
--

CREATE TABLE IF NOT EXISTS `perfil_usuario` (
  `idperfilusuario` int(11) NOT NULL AUTO_INCREMENT,
  `perfilusuario` varchar(50) NOT NULL,
  PRIMARY KEY (`idperfilusuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `perfil_usuario`
--

INSERT INTO `perfil_usuario` (`idperfilusuario`, `perfilusuario`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'USUARIO'),
(3, 'CONTRIBUYENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `password`, `nombres`, `apellidos`, `dni`, `sexo`, `foto`, `idperfilusuario`, `estado`) VALUES
(1, 'admin', 'rl6JW-Jg3YjSl-FcgJvFdOWsslsR9Kp_lft3cxWIO3Y', 'DAVIS BRETTS', 'ACUÑA CORDOVA', '47850032', 'M', '', 1, '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
