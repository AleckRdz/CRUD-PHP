-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2022 a las 22:21:36
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `idAlumno` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoPaterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoMaterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla de alumnos';

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`idAlumno`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `correo`, `direccion`, `telefono`, `ciudad`, `pais`) VALUES
(1, 'Aleck Jesus', 'Zuñiga', 'Rodriguez', 'aleck@hotmail.es', 'canteras, privada canteras 3180', '8342641022', 'Ciudad Victoria', 'México'),
(26, 'El', 'Pepe', 'Sech', 'a@hot.com', 'canteras, privada canteras 3180', '8342641022', 'Ciudad Victoria', 'México'),
(28, 'Jaqueline', 'Sanchez', 'Montalvo', 'ajsm@gmail.com', 'la paz', '8131262626', 'Ciudad Victoria', 'México'),
(29, 'Pancho', 'Pan', 'tera', 'panchopantera@hotmail.com', 'casa de pancho', '4651237898', 'villa pancho', 'pancholandia'),
(30, 'Iron', 'M', 'an', 'ironman@superheroes.com', 'casa de los avengers', '4578966332', 'nueva york', 'estados unidos'),
(31, 'Super', 'M', 'an', 'superman@superheroes.com', 'casa de superman', '8346549780', 'almeja', 'fondo de bikini');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `idCalificaciones` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `matematicas` int(11) NOT NULL,
  `espanol` int(11) NOT NULL,
  `ingles` int(11) NOT NULL,
  `geografia` int(11) NOT NULL,
  `quimica` int(11) NOT NULL,
  `fisica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla de calificaciones';

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`idCalificaciones`, `idAlumno`, `matematicas`, `espanol`, `ingles`, `geografia`, `quimica`, `fisica`) VALUES
(1, 1, 10, 10, 7, 8, 10, 6),
(17, 26, 5, 9, 8, 7, 7, 3),
(19, 28, 10, 10, 10, 10, 10, 10),
(20, 29, 8, 9, 9, 10, 7, 9),
(21, 30, 6, 7, 8, 6, 7, 9),
(22, 31, 9, 9, 9, 9, 9, 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`idAlumno`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`idCalificaciones`),
  ADD KEY `FK_Alumnos_Calificaciones` (`idAlumno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `idAlumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `idCalificaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `FK_Alumnos_Calificaciones` FOREIGN KEY (`idAlumno`) REFERENCES `alumnos` (`idAlumno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
