-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-04-2020 a las 21:34:12
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `noticias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id` int(100) NOT NULL,
  `link` varchar(200) NOT NULL,
  `titulo` varchar(500) NOT NULL,
  `autor` varchar(200) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `hora` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `id_pagina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id`, `link`, `titulo`, `autor`, `fecha`, `hora`, `descripcion`, `id_pagina`) VALUES
(83, 'https://es.gizmodo.com/nintendo-acude-al-rescate-despues-de-que-a-una-abuela-d-1841917900', 'Nintendo acude al rescate después de que a una abuela de 95 años se le rompiera su Game Boy', 'Andrew Liszewski', '2020-02-25', '23:31:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--76SXLPrr--/c_fit,fl_progressive,q_80,w_636/twmwkzzftgfly1mqkkiy.jpg\"><p>Nintendo es conocida por su excelente servicio al cliente, pero de vez en cuando la compañía también va mas allá del llamado del deber en casos muy especiales. Cuando los técnicos no pudieron arreglar el <a href=\"https://es.gizmodo.com/relajate-con-este-fantastico-video-en-el-que-restauran-1835198178\">Game Boy original</a> de una mujer japonesa de 95 años, la com', 10),
(145, 'https://es.gizmodo.com/nintendo-acude-al-rescate-despues-de-que-a-una-abuela-d-1841917900', 'Nintendo acude al rescateeee', 'Andrew Liszewski', '2020-02-25', '23:31:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--76SXLPrr--/c_fit,fl_progressive,q_80,w_636/twmwkzzftgfly1mqkkiy.jpg\"><p>Nintendo es conocida por su excelente servicio al cliente, pero de vez en cuando la compañía también va mas allá del llamado del deber en casos muy especiales. Cuando los técnicos no pudieron arreglar el <a href=\"https://es.gizmodo.com/relajate-con-este-fantastico-video-en-el-que-restauran-1835198178\">Game Boy original</a> de una mujer japonesa de 95 años, la com', 10),
(146, 'https://es.gizmodo.com/nintendo-acude-al-rescate-despues-de-que-a-una-abuela-d-1841917900', 'naniiii', 'Andrew Liszewski', '2020-03-25', '23:31:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--76SXLPrr--/c_fit,fl_progressive,q_80,w_636/twmwkzzftgfly1mqkkiy.jpg\"><p>Nintendo es conocida por su excelente servicio al cliente, pero de vez en cuando la compañía también va mas allá del llamado del deber en casos muy especiales. Cuando los técnicos no pudieron arreglar el <a href=\"https://es.gizmodo.com/relajate-con-este-fantastico-video-en-el-que-restauran-1835198178\">Game Boy original</a> de una mujer japonesa de 95 años, la com', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `id` int(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `subtitulo` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`id`, `nombre`, `subtitulo`, `url`) VALUES
(10, 'Gizmodo en Español', 'Las ultimas noticias en tecnología, ciencia y cultura digital.', 'https://es.gizmodo.com'),
(11, 'Xataka', 'Publicación de noticias sobre gadgets y tecnología. Últimas tecnologías en electrónica de consumo y ', 'http://feeds.weblogssl.com/xataka2.xml'),
(12, 'NYT &gt; Top Stories', '', 'http://rss.nytimes.com/services/xml/rss/nyt/HomePage.xml');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pagina` (`id_pagina`);
ALTER TABLE `articulo` ADD FULLTEXT KEY `fullqr` (`titulo`,`autor`,`descripcion`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`id_pagina`) REFERENCES `pagina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
