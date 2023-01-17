-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2022 a las 20:11:49
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbbatallas`
--
CREATE DATABASE IF NOT EXISTS `dbbatallas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbbatallas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `batalla_elemento`
--

DROP TABLE IF EXISTS `batalla_elemento`;
CREATE TABLE IF NOT EXISTS `batalla_elemento` (
  `id_batalla` int(11) NOT NULL AUTO_INCREMENT,
  `id_elemento1` int(11) NOT NULL,
  `id_elemento2` int(11) NOT NULL,
  PRIMARY KEY (`id_batalla`,`id_elemento1`,`id_elemento2`),
  KEY `id_elemento1_idx` (`id_elemento1`),
  KEY `id_elemento2_idx` (`id_elemento2`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credencial`
--

DROP TABLE IF EXISTS `credencial`;
CREATE TABLE IF NOT EXISTS `credencial` (
  `nombreusuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`nombreusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elemento`
--

DROP TABLE IF EXISTS `elemento`;
CREATE TABLE IF NOT EXISTS `elemento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `bloqueado` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fechanacimiento` date NOT NULL,
  `foto` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `modovis` enum('light','dark') NOT NULL DEFAULT 'light',
  `idioma` enum('es','en') NOT NULL DEFAULT 'es',
  `rol` enum('usuario','admin') NOT NULL DEFAULT 'usuario',
  `num_elementos_creados` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `num_batallas_creadas` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `num_batallas_votadas` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `num_batallas_ignoradas` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `num_batallas_denunciadas` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `puntos_troll` int(10) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_batalla`
--

DROP TABLE IF EXISTS `usuario_batalla`;
CREATE TABLE IF NOT EXISTS `usuario_batalla` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_batalla` int(11) NOT NULL,
  `accion` enum('crear','eliminar','ignorar','denunciar') NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_batalla_ub` (`id_batalla`),
  KEY `id_usuario_ub` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_credencial`
--

DROP TABLE IF EXISTS `usuario_credencial`;
CREATE TABLE IF NOT EXISTS `usuario_credencial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nombreusuario` varchar(50) NOT NULL,
  `accion` enum('registrar','loguear') NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nombreusuario_idx` (`nombreusuario`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_elemento`
--

DROP TABLE IF EXISTS `usuario_elemento`;
CREATE TABLE IF NOT EXISTS `usuario_elemento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_elemento` int(11) NOT NULL,
  `accion` enum('crear','editar','eliminar') NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_elemento_idx` (`id_elemento`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voto`
--

DROP TABLE IF EXISTS `voto`;
CREATE TABLE IF NOT EXISTS `voto` (
  `id_usuario` int(11) NOT NULL,
  `id_batalla` int(11) NOT NULL,
  `id_elemento` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_batalla`,`id_elemento`),
  KEY `id_batalla_idx` (`id_batalla`),
  KEY `id_elemento_idx` (`id_elemento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `batalla_elemento`
--
ALTER TABLE `batalla_elemento`
  ADD CONSTRAINT `id_elemento1_be` FOREIGN KEY (`id_elemento1`) REFERENCES `elemento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_elemento2_be` FOREIGN KEY (`id_elemento2`) REFERENCES `elemento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_batalla`
--
ALTER TABLE `usuario_batalla`
  ADD CONSTRAINT `id_batalla_ub` FOREIGN KEY (`id_batalla`) REFERENCES `batalla_elemento` (`id_batalla`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_usuario_ub` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_credencial`
--
ALTER TABLE `usuario_credencial`
  ADD CONSTRAINT `id_usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nombreusuario_fk` FOREIGN KEY (`nombreusuario`) REFERENCES `credencial` (`nombreusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_elemento`
--
ALTER TABLE `usuario_elemento`
  ADD CONSTRAINT `id_elemento_ue` FOREIGN KEY (`id_elemento`) REFERENCES `elemento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_usuario_ue` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `voto`
--
ALTER TABLE `voto`
  ADD CONSTRAINT `id_batalla_v` FOREIGN KEY (`id_batalla`) REFERENCES `batalla_elemento` (`id_batalla`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_elemento_v` FOREIGN KEY (`id_elemento`) REFERENCES `elemento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_usuario_v` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- METIDITA DE DATOS


INSERT INTO `usuario` (`id`, `fechanacimiento`, `foto`, `email`, `modovis`, `idioma`, `rol`)
VALUES
(1, '1999-05-12', 'img/ferrari.jpg', 'luis@gmail.com', 'light', 'es', 'usuario'),
(2, '2001-06-25', 'img/fotoNaruto.jpg', 'brandon@gmail.com', 'dark', 'en', 'usuario'),
(3, '1995-08-14', 'img/twitter.jpg', 'elonmusk@gmail.com', 'dark', 'en', 'usuario'),
(4, '1990-11-29', 'img/fotoCoche.jpg', 'miguel@gmail.com', 'light', 'es', 'usuario'),
(5, '1996-08-18', 'img/porch.jpg', 'clara@gmail.com', 'light', 'es', 'usuario'),
(6, '1999-01-01', '', 'admin@gmail.com', 'light', 'es', 'admin');

INSERT INTO `credencial`(`nombreusuario`, `password`)
VALUES
('sete7','SeteSiete1'),
('TimeLeaper', 'LeaperTime1'),
('Twitter_Enjoyer', 'MgTwitter1'),
('MigueLombarda', 'CafeCum1'),
('Claramente', 'Lanena1'),
('admin', 'Admin1');

INSERT INTO `elemento` (`id`, `nombre`, `foto`, `bloqueado`)
VALUES
(1, 'fuego', 'tabs/IMG/elementos/fuego.jpg', 0),
(2, 'agua', 'tabs/IMG/elementos/agua.jpg', 0), 
(3, 'naruto', 'tabs/IMG/elementos/narutoElemento.jpg', 0),
(4, 'sasuke', 'tabs/IMG/elementos/sasukeElemento.jpg', 0),
(5, 'audi', 'tabs/IMG/elementos/audiElemento.jpg', 0),
(6, 'mercedes', 'tabs/IMG/elementos/mercedesElemento.jpg', 0),
(7, 'youtube', 'tabs/IMG/elementos/youtubeElemento.jpg', 0),
(8, 'twitch', 'tabs/IMG/elementos/twitchElemento.jpg', 0),
(9, 'mario', 'tabs/IMG/elementos/marioElemento.jpg', 0),
(10, 'sonic', 'tabs/IMG/elementos/sonicElemento.jpg', 0);

-- Tengo que meter antes elemento
INSERT INTO `batalla_elemento` (`id_batalla`, `id_elemento1`, `id_elemento2`)
VALUES
(1, 1, 2),
(2, 3, 4),
(3, 5, 6),
(4, 7, 8),
(5, 9, 10),
(6, 1, 6),
(7, 1, 4),
(8, 6, 10),
(9, 7, 6),
(10, 9, 2),
(11, 1, 3),
(12, 1, 5);

-- Tengo que meter usuarios y batalla elemento antes
INSERT INTO `usuario_batalla` (`id_usuario`, `id_batalla`, `accion`, `fecha`)
VALUES
(1, 2, 'crear', '2022-11-30'),
(2, 1, 'crear', '2022-11-30'),
(4, 3, 'crear', '2022-11-30'),
(3, 4, 'crear', '2022-11-30'),
(5, 5, 'crear', '2022-11-30'),
(1, 5, 'denunciar', '2022-11-30'),
(2, 5, 'denunciar', '2022-11-30'),
(4, 4, 'ignorar', '2022-11-30'),
(6, 4, 'eliminar', '2022-11-30');


INSERT INTO `usuario_credencial` (`id_usuario`, `nombreusuario`, `accion`, `fecha`)
VALUES
(1, 'sete7', 'registrar', '2022-11-29'),
(2, 'TimeLeaper', 'registrar', '2022-11-29'),
(3, 'Twitter_Enjoyer', 'registrar', '2022-11-29'),
(4, 'MigueLombarda', 'registrar', '2022-11-29'),
(5, 'Claramente', 'registrar', '2022-11-29');

INSERT INTO `usuario_elemento` (`id_usuario`, `id_elemento`, `accion`, `fecha`)
VALUES
(1, 3, 'crear', '2022-11-30'),
(1, 4, 'crear', '2022-11-30'),
(2, 1, 'crear', '2022-11-30'),
(2, 2, 'crear', '2022-11-30'),
(4, 5, 'crear', '2022-11-30'),
(4, 6, 'crear', '2022-11-30'),
(3, 7, 'crear', '2022-11-30'),
(3, 8, 'crear', '2022-11-30'),
(5, 9, 'crear', '2022-11-30'),
(5, 10, 'crear', '2022-11-30');


INSERT INTO `voto` (`id_usuario`, `id_batalla`, `id_elemento`, `fecha`)
VALUES
(1, 2, 3, '2022-11-30'),
(2, 2, 3, '2022-11-30'),
(3, 2, 3, '2022-11-30'),
(4, 2, 3, '2022-11-30'),
(5, 2, 3, '2022-11-30'),
(2, 1, 1, '2022-11-30'),
(1, 1, 1, '2022-11-30'),
(3, 1, 1, '2022-11-30'),
(4, 1, 1, '2022-11-30'),
(5, 1, 1, '2022-11-30'),
(3, 4, 8, '2022-11-30'),
(1, 4, 8, '2022-11-30'),
(2, 4, 8, '2022-11-30'),
(5, 4, 8, '2022-11-30'),
(4, 3, 5, '2022-11-30'),
(1, 3, 5, '2022-11-30'),
(2, 3, 5, '2022-11-30'),
(3, 3, 5, '2022-11-30'),
(5, 3, 5, '2022-11-30'),
(5, 5, 9, '2022-11-30'),
(4, 5, 9, '2022-11-30'),
(3, 5, 9, '2022-11-30'),
(2, 5, 9, '2022-11-30'),
(1, 5, 9, '2022-11-30');