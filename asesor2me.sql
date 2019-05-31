-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2019 a las 05:17:29
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asesor2me`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(111) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_hora_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `contenido` text NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `fecha_hora_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id`, `id_usuario`, `titulo`, `contenido`, `categoria`, `fecha_hora_creacion`) VALUES
(1, 19, 'Primer pregunta', 'Este es una ejemplo de lo que pudiera ser una pregunta de asesoria', 'matematicas', '2019-05-29 20:48:19'),
(2, 19, 'Esta es otra pregunta', 'sdfasdf asdfasdfasdfvsdjfhvalksjdfklcasjfkajs fkj asfj ljljl;af;ajksa s;f vksdjfklsdjlfkjalsdkjfvakdfja fklasdjf;kljsdklfjakdj;lfkaj;fkj a;sldkfjdjl;ksdajf;lkasdj lsdjf knsdl;ak', 'matematicas', '2019-05-29 21:13:56'),
(3, 19, 'Hoa mundo', 'Quiero hacer un hola mundo', 'programacion', '2019-05-30 20:56:44'),
(4, 19, 'soy humano??', 'quiero saber si soy humano', 'otro', '2019-05-30 21:04:38'),
(5, 19, 'Sale la luna??', '12e fdwaf3rcqeva a fasdf asdf', 'programacion', '2019-05-30 21:10:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `contrasenia` varchar(128) NOT NULL,
  `tipo` enum('administrador','mortal') NOT NULL DEFAULT 'mortal',
  `nombre` varchar(150) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `verificado` tinyint(4) NOT NULL DEFAULT '0',
  `codigo_verificacion` varchar(45) DEFAULT NULL,
  `fecha_hora_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `codigo_recuperacion` varchar(45) DEFAULT NULL,
  `fecha_hora_recuperacion` datetime DEFAULT NULL,
  `edad` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `contrasenia`, `tipo`, `nombre`, `foto`, `verificado`, `codigo_verificacion`, `fecha_hora_registro`, `codigo_recuperacion`, `fecha_hora_recuperacion`, `edad`) VALUES
(18, 'omar@itparral.edu.mx', '263fec58861449aacc1c328a4aff64aff4c62df4a2d50b3f207fa89b6e242c9aa778e7a8baeffef85b6ca6d2e7dc16ff0a760d59c13c238f6bcdc32f8ce9cc62', 'mortal', 'Omar BaÃ±uelos', NULL, 1, '67395a814a2d26c19c8cae0d64347bc0', '2019-05-27 16:10:36', NULL, NULL, 36),
(19, 'kevinalcala1@gmail.com', '$2y$10$RhXMiEib.9eNfzYnO0dtHuYmhE9PKVNkf/lOS61VuLGtXt88uiISy', 'mortal', 'Kevin gallegos', NULL, 1, 'af08d66a0af4684cb25b132dc31ee2f3', '2019-05-29 00:07:23', NULL, NULL, 21);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cometarios_pregunta_idx` (`id_pregunta`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk_pregunta_usuarios_idx` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_cometarios_pregunta_idx` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `pk_pregunta_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
