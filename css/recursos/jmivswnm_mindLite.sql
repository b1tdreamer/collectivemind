-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-11-2012 a las 14:00:56
-- Versión del servidor: 5.0.95
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `jmivswnm_mindLite`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apps`
--

CREATE TABLE IF NOT EXISTS `apps` (
  `id` int(11) NOT NULL auto_increment,
  `id_usuario` int(10) NOT NULL,
  `titulo` varchar(150) collate utf8_bin NOT NULL,
  `img` varchar(100) collate utf8_bin NOT NULL,
  `tags` text collate utf8_bin NOT NULL,
  `link` text collate utf8_bin NOT NULL,
  `hits` int(11) NOT NULL,
  `fecha` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=36 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE IF NOT EXISTS `archivos` (
  `id` int(20) NOT NULL auto_increment,
  `id_usuario` int(10) NOT NULL,
  `titulo` varchar(150) collate utf8_bin NOT NULL,
  `texto` text collate utf8_bin NOT NULL,
  `tags` text collate utf8_bin NOT NULL,
  `link` varchar(200) collate utf8_bin NOT NULL,
  `hits` int(20) NOT NULL,
  `fecha` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audios`
--

CREATE TABLE IF NOT EXISTS `audios` (
  `id` int(20) NOT NULL auto_increment,
  `id_usuario` int(10) NOT NULL,
  `titulo` varchar(150) collate utf8_bin NOT NULL,
  `texto` text collate utf8_bin NOT NULL,
  `tags` text collate utf8_bin NOT NULL,
  `link` varchar(200) collate utf8_bin NOT NULL,
  `hits` int(20) NOT NULL,
  `fecha` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_links`
--

CREATE TABLE IF NOT EXISTS `categorias_links` (
  `id` int(150) NOT NULL auto_increment,
  `titulo` varchar(150) collate utf8_bin NOT NULL,
  `img` varchar(100) collate utf8_bin NOT NULL,
  `tags` text collate utf8_bin NOT NULL,
  `hits` int(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=41 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(30) NOT NULL auto_increment,
  `id_usuario` int(10) NOT NULL,
  `texto` text collate utf8_bin NOT NULL,
  `link` varchar(100) collate utf8_bin NOT NULL,
  `fecha` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `importante` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1031 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desarrollo`
--

CREATE TABLE IF NOT EXISTS `desarrollo` (
  `id` int(10) NOT NULL auto_increment,
  `id_usuario` int(10) NOT NULL,
  `texto` varchar(200) collate utf8_bin NOT NULL,
  `prioridad` varchar(1) collate utf8_bin NOT NULL,
  `fecha` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=93 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
  `id` int(50) NOT NULL auto_increment,
  `id_usuario` int(10) NOT NULL,
  `titulo` varchar(150) collate utf8_bin NOT NULL,
  `link` varchar(200) collate utf8_bin NOT NULL,
  `img` varchar(100) collate utf8_bin NOT NULL,
  `hits` int(20) NOT NULL,
  `fecha` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=57 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(10) NOT NULL auto_increment,
  `id_categoria` int(150) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `titulo` varchar(150) collate utf8_bin NOT NULL,
  `tags` text collate utf8_bin NOT NULL,
  `link` varchar(300) collate utf8_bin NOT NULL,
  `hits` int(20) NOT NULL,
  `fecha` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=401 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `id` int(100) NOT NULL auto_increment,
  `id_usuario` varchar(10) collate utf8_bin NOT NULL,
  `id_receptor` varchar(45) collate utf8_bin NOT NULL,
  `texto` text collate utf8_bin NOT NULL,
  `link` varchar(100) collate utf8_bin NOT NULL,
  `visto` tinyint(1) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `fecha` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=351 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(100) NOT NULL auto_increment,
  `id_usuario` int(10) NOT NULL,
  `texto` text collate utf8_bin NOT NULL,
  `tags` text collate utf8_bin NOT NULL,
  `link` varchar(100) collate utf8_bin NOT NULL,
  `hits` int(20) NOT NULL,
  `fecha` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=40 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE IF NOT EXISTS `peliculas` (
  `id` int(100) NOT NULL auto_increment,
  `id_usuario` int(10) NOT NULL,
  `titulo` varchar(150) collate utf8_bin NOT NULL,
  `texto` text collate utf8_bin NOT NULL,
  `link` varchar(150) collate utf8_bin NOT NULL,
  `hits` int(20) NOT NULL,
  `fecha` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(15) NOT NULL auto_increment,
  `id_usuario` int(10) NOT NULL,
  `titulo` varchar(150) collate utf8_bin NOT NULL,
  `texto` text collate utf8_bin NOT NULL,
  `link` varchar(250) collate utf8_bin NOT NULL,
  `fecha` timestamp NOT NULL default '0000-00-00 00:00:00' on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `radios`
--

CREATE TABLE IF NOT EXISTS `radios` (
  `id` int(10) NOT NULL auto_increment,
  `titulo` varchar(50) collate utf8_bin NOT NULL,
  `link` varchar(150) collate utf8_bin NOT NULL,
  `hits` int(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sugerencias`
--

CREATE TABLE IF NOT EXISTS `sugerencias` (
  `id` int(100) NOT NULL auto_increment,
  `id_usuario` int(10) NOT NULL,
  `titulo` varchar(150) collate utf8_bin NOT NULL,
  `texto` varchar(100) collate utf8_bin NOT NULL,
  `link` varchar(100) collate utf8_bin NOT NULL,
  `hits` int(20) NOT NULL,
  `fecha` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL auto_increment,
  `titulo` varchar(20) collate utf8_bin NOT NULL,
  `password` varchar(200) collate utf8_bin NOT NULL,
  `link` varchar(200) collate utf8_bin NOT NULL,
  `ip` varchar(20) collate utf8_bin NOT NULL,
  `conectado` tinyint(1) NOT NULL,
  `fecha` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=37 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(100) NOT NULL auto_increment,
  `id_usuario` int(10) NOT NULL,
  `titulo` varchar(50) collate utf8_bin NOT NULL,
  `tags` text collate utf8_bin NOT NULL,
  `link` varchar(50) collate utf8_bin NOT NULL,
  `fecha` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=41 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
