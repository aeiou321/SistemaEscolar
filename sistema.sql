-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2019 a las 02:18:14
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id_calificacion` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_clase` int(11) NOT NULL,
  `calificacion` varchar(10) NOT NULL DEFAULT '-',
  `id_tarea_encargada` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `id_tarea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`id_calificacion`, `id_alumno`, `id_clase`, `calificacion`, `id_tarea_encargada`, `url`, `id_tarea`) VALUES
(16, 5, 101, '90', 1, 'archivos/about-img.jpg', 1),
(17, 5, 102, '70', 6, 'archivos/java.png', 1),
(18, 5, 101, '60', 5, 'archivos/algoritmos.png', 3),
(19, 5, 102, '90', 4, 'archivos/lenguajes-de-programacion.jpg', 5),
(20, 9, 101, '70', 1, 'archivos/mapaconceptual.jpg', 1),
(21, 9, 102, '100', 6, 'archivos/java.png', 1),
(22, 9, 101, '95', 5, 'archivos/algoritmos.png', 3),
(23, 9, 101, '65', 4, 'archivos/lenguajes-de-programacion.jpg', 5),
(24, 10, 101, '100', 1, 'archivos/mapaconceptual.jpg', 1),
(25, 10, 102, '75', 4, 'archivos/lenguajes-de-programacion.jpg', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion_parcial`
--

CREATE TABLE `calificacion_parcial` (
  `id_calificiacion_parcial` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_clase` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL DEFAULT '0',
  `id_tarea_encargada` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `id_tipo_tarea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `calificacion_parcial`
--

INSERT INTO `calificacion_parcial` (`id_calificiacion_parcial`, `id_alumno`, `id_clase`, `calificacion`, `id_tarea_encargada`, `url`, `id_tarea`, `id_tipo_tarea`) VALUES
(15, 5, 101, 25, 1, 'archivos/about-img.jpg', 1, 1),
(16, 5, 101, 25, 1, 'archivos/about-img.jpg', 1, 2),
(17, 5, 101, 15, 1, 'archivos/about-img.jpg', 1, 3),
(18, 5, 101, 25, 1, 'archivos/about-img.jpg', 1, 4),
(19, 5, 102, 10, 6, 'archivos/java.png', 1, 1),
(20, 5, 102, 20, 6, 'archivos/java.png', 1, 2),
(21, 5, 102, 25, 6, 'archivos/java.png', 1, 3),
(22, 5, 102, 15, 6, 'archivos/java.png', 1, 4),
(23, 5, 101, 10, 5, 'archivos/algoritmos.png', 3, 10),
(24, 5, 101, 25, 5, 'archivos/algoritmos.png', 3, 11),
(25, 5, 101, 15, 5, 'archivos/algoritmos.png', 3, 12),
(26, 5, 101, 10, 5, 'archivos/algoritmos.png', 3, 13),
(27, 5, 102, 15, 4, 'archivos/lenguajes-de-programacion.jpg', 5, 10),
(28, 5, 102, 25, 4, 'archivos/lenguajes-de-programacion.jpg', 5, 11),
(29, 5, 102, 25, 4, 'archivos/lenguajes-de-programacion.jpg', 5, 12),
(30, 5, 102, 25, 4, 'archivos/lenguajes-de-programacion.jpg', 5, 13),
(31, 9, 101, 10, 1, 'archivos/mapaconceptual.jpg', 1, 1),
(32, 9, 101, 20, 1, 'archivos/mapaconceptual.jpg', 1, 2),
(33, 9, 101, 15, 1, 'archivos/mapaconceptual.jpg', 1, 3),
(34, 9, 101, 25, 1, 'archivos/mapaconceptual.jpg', 1, 4),
(35, 9, 102, 25, 6, 'archivos/java.png', 1, 1),
(36, 9, 102, 25, 6, 'archivos/java.png', 1, 2),
(37, 9, 102, 25, 6, 'archivos/java.png', 1, 3),
(38, 9, 102, 25, 6, 'archivos/java.png', 1, 4),
(39, 9, 101, 20, 5, 'archivos/algoritmos.png', 3, 5),
(40, 9, 101, 25, 5, 'archivos/algoritmos.png', 3, 6),
(41, 9, 101, 25, 5, 'archivos/algoritmos.png', 3, 7),
(42, 9, 101, 25, 5, 'archivos/algoritmos.png', 3, 8),
(43, 9, 101, 10, 4, 'archivos/lenguajes-de-programacion.jpg', 3, 14),
(44, 9, 101, 10, 4, 'archivos/lenguajes-de-programacion.jpg', 5, 15),
(45, 9, 101, 20, 4, 'archivos/lenguajes-de-programacion.jpg', 5, 16),
(46, 9, 101, 25, 4, 'archivos/lenguajes-de-programacion.jpg', 5, 17),
(47, 10, 101, 25, 1, 'archivos/mapaconceptual.jpg', 1, 1),
(48, 10, 101, 25, 1, 'archivos/mapaconceptual.jpg', 1, 2),
(49, 10, 101, 25, 1, 'archivos/mapaconceptual.jpg', 1, 3),
(50, 10, 101, 25, 1, 'archivos/mapaconceptual.jpg', 1, 4),
(51, 10, 102, 10, 4, 'archivos/lenguajes-de-programacion.jpg', 5, 18),
(52, 10, 102, 20, 4, 'archivos/lenguajes-de-programacion.jpg', 5, 19),
(53, 10, 102, 20, 4, 'archivos/lenguajes-de-programacion.jpg', 5, 20),
(54, 10, 102, 25, 4, 'archivos/lenguajes-de-programacion.jpg', 5, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `id_clase` int(11) NOT NULL,
  `clase` int(40) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_maestro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`id_clase`, `clase`, `id_materia`, `id_maestro`) VALUES
(1, 101, 1, 1),
(2, 102, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `links`
--

CREATE TABLE `links` (
  `id_link` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `link` varchar(250) NOT NULL,
  `pagina` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `links`
--

INSERT INTO `links` (`id_link`, `id_tarea`, `link`, `pagina`) VALUES
(1, 1, 'https://www.lucidchart.com/pages/es/ejemplos/mapa-conceptual', 'Mapa Conceptual Online | Lucidchart'),
(2, 1, 'https://creately.com/es/lp/creador-mapas-conceptuales', 'Programa para Hacer Mapas Conceptuales Online | Creately'),
(3, 1, 'https://scholar.google.com/', 'Google Academico'),
(4, 1, 'https://www.questia.com/hbr-welcome', 'HighBeam Research'),
(5, 2, 'https://www.canva.com/es_mx/graficas/mapas-mentales/', 'Programa para hacer mapas mentales online gratis - Canva'),
(6, 2, 'https://www.chemedia.com/', 'Chemedia'),
(7, 2, 'https://www.lucidchart.com/pages/es/mapa-mental', 'Aplicación para crear Mapas Mentales Online | Lucidchart'),
(8, 2, 'http://www.redalyc.org/home.oa', 'Redalyc'),
(9, 3, 'https://resoomer.com/es/', 'Resoomer | Resumidor para hacer un resumen automático de texto'),
(10, 3, 'https://linguakit.com/es/resumidor', 'Resumidor - Análisis completo'),
(11, 3, 'https://www.academia.edu/', 'Academia.edu'),
(12, 3, 'https://www.refseek.com/', 'RefSeek'),
(13, 4, 'https://www.onlineencuesta.com/', 'Crear encuestas y cuestionarios gratis en línea con Online Encuesta'),
(14, 4, 'https://www.questionpro.com/es/cuestionarios-online.html', '¿Qué es un cuestionario online? | QuestionPro'),
(15, 4, 'https://www.scielo.org/', 'Scielo'),
(16, 4, 'https://eric.ed.gov/', 'ERIC'),
(17, 5, 'https://scholar.google.com/', 'Google Académico'),
(18, 5, 'https://www.questia.com/hbr-welcome', 'HighBeam Research'),
(19, 5, 'https://www.academia.edu/', 'Academia.edu'),
(20, 5, 'https://www.refseek.com/', 'RefSeek');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL,
  `materia` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `materia`) VALUES
(1, 'Cálculo Diferencial'),
(2, 'Ciencias'),
(3, 'Español'),
(4, 'Química');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id_tarea` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `evaluacion` varchar(30) NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `25` varchar(60) NOT NULL,
  `20` varchar(60) NOT NULL,
  `15` varchar(60) NOT NULL,
  `10` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id_tarea`, `tipo`, `evaluacion`, `porcentaje`, `25`, `20`, `15`, `10`) VALUES
(1, '1', 'Niveles', 25, '5', '4', '3 A 2', '1'),
(2, '1', 'Conceptos', 25, 'Todos bien', 'La mayoria', 'Algunos bien', 'Mal todos'),
(3, '1', 'Informacion', 25, 'Bien', 'Buena', 'Regular', 'Mala'),
(4, '1', 'Coherencia', 25, 'Bien', 'Buena', 'Regular', 'Mala'),
(5, '2', 'Niveles', 25, '5', '4', '3 A 2', '1'),
(6, '2', 'Imagenes', 25, 'Todos bien', 'La mayoria', 'Algunos bien', 'Mal todos'),
(7, '2', 'Informacion', 25, 'Bien', 'Buena', 'Regular', 'Mala'),
(8, '2', 'Coherencia', 25, 'Bien', 'Buena', 'Regular', 'Mala'),
(10, '3', 'Subtitulos', 25, '5', '4', '3 A 2', '1'),
(11, '3', 'Referencias', 25, '5', '4', '3 A 2', '1'),
(12, '3', 'Informacion', 25, 'Bien', 'Buena', 'Regular', 'Mala'),
(13, '3', 'Coherencia', 25, 'Bien', 'Buena', 'Regular', 'Mala'),
(14, '4', 'Preguntas', 25, '20 A 25', '15 A 19', '10 A 14', '1 A 5 '),
(15, '4', 'Conceptos', 25, 'Todos bien', 'La mayoria', 'Algunos bien', 'Mal todos'),
(16, '4', 'Información', 25, 'Bien', 'Buena', 'Regular', 'Mala'),
(17, '4', 'Coherencia', 25, 'Bien', 'Buena', 'Regular', 'Mala'),
(18, '5', 'Subtitulos', 25, '5', '4', '3 A 2', '1'),
(19, '5', 'Referencias', 25, '5', '4', '3 A 2', '1'),
(20, '5', 'Informacion', 25, 'Bien', 'Buen', 'Regular', 'Mala'),
(21, '5', 'Coherencia', 25, 'Bien', 'Buena', 'Regular', 'Mala');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea_encargada`
--

CREATE TABLE `tarea_encargada` (
  `id_tarea_encargada` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `estado` varchar(40) NOT NULL DEFAULT 'En proceso',
  `descripcion` varchar(100) NOT NULL,
  `fecha_entrega` text NOT NULL,
  `id_clase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tarea_encargada`
--

INSERT INTO `tarea_encargada` (`id_tarea_encargada`, `id_tarea`, `estado`, `descripcion`, `fecha_entrega`, `id_clase`) VALUES
(1, 1, 'En proceso', 'Entregar un mapa conceptual', '2019-04-17', 101),
(4, 5, 'En proceso', 'Investigar lenguajes de programación', '23-05-2019', 102),
(5, 3, 'En proceso', 'Entregar resumen de algoritmos', '14-05-2019', 101),
(6, 1, 'En proceso', 'Entregar mapa conceptual de Java', '29-05-2019', 102);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_tarea`
--

CREATE TABLE `tipo_tarea` (
  `id_tarea` int(11) NOT NULL,
  `tipo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_tarea`
--

INSERT INTO `tipo_tarea` (`id_tarea`, `tipo`) VALUES
(1, 'Mapa Conceptual'),
(2, 'Mapa Mental'),
(3, 'Resumen'),
(4, 'Cuestionario'),
(5, 'Investigación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `control` int(11) NOT NULL,
  `password` varchar(40) NOT NULL,
  `tipo_usuario` varchar(40) NOT NULL DEFAULT 'alumno',
  `semestre` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `control`, `password`, `tipo_usuario`, `semestre`, `nombre`) VALUES
(1, 123456, '1234', 'maestro', 1, 'Miguel'),
(5, 14321026, '1234', 'alumno', 9, 'Jesús Eduardo Méndez Hilario'),
(9, 14321027, '1234', 'alumno', 8, 'Alarcón López Gerardo Genaro'),
(10, 14321028, '1234', 'alumno', 9, 'De la Medina Soto Mario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id_calificacion`);

--
-- Indices de la tabla `calificacion_parcial`
--
ALTER TABLE `calificacion_parcial`
  ADD PRIMARY KEY (`id_calificiacion_parcial`);

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`id_clase`);

--
-- Indices de la tabla `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id_link`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id_tarea`);

--
-- Indices de la tabla `tarea_encargada`
--
ALTER TABLE `tarea_encargada`
  ADD PRIMARY KEY (`id_tarea_encargada`);

--
-- Indices de la tabla `tipo_tarea`
--
ALTER TABLE `tipo_tarea`
  ADD PRIMARY KEY (`id_tarea`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `calificacion_parcial`
--
ALTER TABLE `calificacion_parcial`
  MODIFY `id_calificiacion_parcial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `id_clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `links`
--
ALTER TABLE `links`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id_tarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tarea_encargada`
--
ALTER TABLE `tarea_encargada`
  MODIFY `id_tarea_encargada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_tarea`
--
ALTER TABLE `tipo_tarea`
  MODIFY `id_tarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
