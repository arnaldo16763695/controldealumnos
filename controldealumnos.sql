-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-08-2018 a las 21:07:37
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `controldealumnos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cedulaEscolar` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `lugarNacimiento` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `idRepresentante` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRegistro` date NOT NULL,
  `nombreMadre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cedulaMadre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombrePadre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cedulaPadre` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `etapa` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `seccion` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `horaEntrada` time NOT NULL,
  `horaSalida` time NOT NULL,
  `grado` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idDocente` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fechaHoraFin` datetime NOT NULL,
  `periodoEscolar` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `inscripcion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRegistro` date NOT NULL,
  `status` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id` int(11) NOT NULL,
  `nombreGrado` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `etapa` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id`, `nombreGrado`, `etapa`, `fechaRegistro`) VALUES
(1, '1 Grado', 'Primaria', '2018-06-21'),
(2, '2 Grado', 'Primaria', '2018-06-21'),
(3, '3 Grado', 'Primaria', '2018-06-21'),
(4, '4 Grado', 'Primaria', '2018-06-21'),
(5, '5 Grado', 'Primaria', '2018-06-21'),
(6, '6 Grado', 'Primaria', '2018-06-21'),
(7, 'Nivel 1', 'Preescolar', '2018-06-21'),
(8, 'Nivel 2', 'Preescolar', '2018-06-21'),
(9, 'Nivel 3', 'Preescolar', '2018-06-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `idRepresentante` int(11) NOT NULL,
  `idAlumnos` int(11) NOT NULL,
  `fechaRegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representantes`
--

CREATE TABLE `representantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `fechaRegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'SurperAdmin', 'Adminitrador Total del Sistema, puede incluso modificar labase de datos', 1),
(2, 'Administrador', 'Administra el Sistema con menos privilegios que el SuperAdmin', 1),
(3, 'Usuario', 'Tiene el rol de usuario, sin privelegios, es la forma predeterminada.', 1),
(4, 'Docente', 'Rol de docente con algunos privilegios', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` int(11) NOT NULL,
  `nombreSeccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `etapa` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `nombreSeccion`, `etapa`, `fechaRegistro`) VALUES
(4, 'A', 'primaria', '2018-06-21'),
(5, 'B', 'primaria', '2018-06-21'),
(6, 'C', 'primaria', '2018-06-21'),
(7, 'D', 'Primaria', '2018-07-04'),
(8, 'E', 'Primaria', '2018-07-04'),
(9, 'F', 'Primaria', '2018-07-04'),
(10, 'G', 'Primaria', '2018-07-04'),
(11, 'H', 'Primaria', '2018-07-04'),
(12, 'I', 'Primaria', '2018-07-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `pass` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRegistro` date NOT NULL,
  `id_rol` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `representantes`
--
ALTER TABLE `representantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `representantes`
--
ALTER TABLE `representantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
