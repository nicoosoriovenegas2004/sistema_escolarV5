-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-04-2026 a las 23:24:56
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_escolarv5`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombre_alumno` varchar(50) DEFAULT NULL,
  `apellido_alumno` varchar(50) DEFAULT NULL,
  `asignatura` text DEFAULT NULL,
  `direccion_alumno` varchar(100) DEFAULT NULL,
  `telefono_alumno` varchar(20) DEFAULT NULL,
  `anio_escolar` varchar(20) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `asignatura_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre_alumno`, `apellido_alumno`, `asignatura`, `direccion_alumno`, `telefono_alumno`, `anio_escolar`, `foto`, `usuario_id`, `asignatura_id`) VALUES
(2, 'Maria', 'Lopez', 'Lenguaje', 'Chile', '987654', '2025', 'uploads/1775502066_OIP (4).webp', NULL, 2),
(16, 'nico', 'carrascos', 'Matematicas', 'wdcwcdwcdwcwdcdw', '12444', '2024', 'uploads/1775502075_OIP (3).webp', NULL, 1),
(17, 'nico', 'carrascos', 'Matematicas', 'wdcwcdwcdwcwdcdw', '12444', '2024', 'uploads/1775502081_OIP (1).webp', NULL, 1),
(18, 'de2d', 'ewswx', 'Matematicas', 'wsxwsx', '', NULL, 'uploads/1775502120_OIP (2).webp', NULL, 1),
(19, 'diego', 'topo', 'Matematicas', 'colon nrt', '', NULL, 'uploads/1775502128_OIP.webp', NULL, 1),
(20, 'de2d', 'ewswx', 'Lenguaje', 'wsxwsx', '12444', '2025', 'uploads/1775502141_il_1140xN.3904753674_rv4k.webp', NULL, 2),
(21, 'de2d', 'ewswx', 'Ingles', 'wsxwsx', '12444', '2025', '', NULL, 3),
(22, 'de2d', 'ewswx', 'Lenguaje', 'wsxwsx', '12444', '2025', '', NULL, 2),
(23, 'de2d', 'ewswx', 'Ingles', 'wsxwsx', '12444', '2025', '', NULL, 3),
(24, 'de2d', 'ewswx', 'Historia', 'wsxwsx', '12444', '2025', '', NULL, 4),
(25, 'diego', 'topo', 'Ciencias', 'colon nrt', '12444', '2025', 'uploads/1775673934_Diego_Armando_Maradona.webp', NULL, 5),
(27, 'ytruj', 'hy', 'Matematicas', 'hgfh', 'ytrj', '2026', 'uploads/1775673688_papimiki.jpg', NULL, NULL),
(28, 'ytruj', 'hy', 'Historia', 'hgfh', 'ytrj', '2026', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id`, `nombre`) VALUES
(1, 'Matematicas'),
(2, 'Lenguaje'),
(3, 'Ingles'),
(4, 'Historia'),
(5, 'Ciencias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id` int(11) NOT NULL,
  `nombre_docente` varchar(50) DEFAULT NULL,
  `carrera_docente` varchar(100) DEFAULT NULL,
  `asignatura` varchar(50) DEFAULT NULL,
  `telefono_docente` varchar(20) DEFAULT NULL,
  `correo_docente` varchar(100) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `asignatura_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id`, `nombre_docente`, `carrera_docente`, `asignatura`, `telefono_docente`, `correo_docente`, `usuario_id`, `asignatura_id`) VALUES
(3, 'diego topo', 'Pedagogia', 'Lenguaje', '12444', 'hfdhdrfh@jnfue.com', NULL, 2),
(4, 'diego topo', 'Pedagogia', 'Matematicas', '12444', 'hfdhdrfh@jnfue.com', NULL, 1),
(5, 'nico', 'Pedagogia', 'Matematicas', '12444', 'hfdhdrthfh@jnfue.com', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `alumno_id` int(11) DEFAULT NULL,
  `asignatura` varchar(100) DEFAULT NULL,
  `nota` decimal(3,1) DEFAULT NULL,
  `asignatura_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `alumno_id`, `asignatura`, `nota`, `asignatura_id`) VALUES
(3, 2, 'Lenguaje', 7.0, 2),
(16, 16, 'Matematicas', 7.0, 1),
(17, 16, 'Matematicas', 4.0, 1),
(18, 16, 'Matematicas', 3.0, 1),
(19, 17, 'Matematicas', 2.0, 1),
(20, 18, 'Ingles', 5.0, 3),
(21, 18, 'Ciencias', 5.0, 5),
(22, 19, 'Historia', 7.0, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `tipo_usuario` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `token_expira` datetime DEFAULT NULL,
  `foto` varchar(255) DEFAULT 'imagenes/user.png',
  `role` enum('administrador','usuario') NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `tipo_usuario`, `correo`, `password`, `token`, `token_expira`, `foto`, `role`) VALUES
(13, 'Nicolas', 'Osorio', 'Administrador', 'nicoosoriovenegas2004@gmail.com', '$2y$10$fiUeEhRtVM/wLiJdNRytgurMSFNDXvbJFxoN8RwYWFoY62TsBkNcy', NULL, NULL, 'imagenes/usuarios/1775507409_OIP.webp', 'administrador'),
(14, 'nico', 'topo', 'Usuario', 'n@gmail.com', '$2y$10$QdrYzDX/T97G3gg29iuSvuPEBi8PeXH7VhOULaRg4VmoM16MD9.N2', NULL, NULL, 'imagenes/usuarios/1775682979_papimiki.jpg', 'usuario'),
(15, 'luis', 'santander', 'Administrador', 'luxitrox.dbz@gmail.com', '$2y$10$4YrwXoZgzidBpuOZ300/KejDtrvI11kyHZsFcYM.iWkQzvKMjNuH6', NULL, NULL, 'imagenes/user.png', 'administrador'),
(16, 'ytruj', 'hy', 'Administrador', '4@gmail.com', '$2y$10$TLbOEXUzFCRax2EcmiM07e3G0apC06C2Hn/u8vrIg3GN51t7WRv8W', NULL, NULL, 'imagenes/user.png', 'usuario'),
(17, 'y', 'yt', '', '2004@gmail.com', '$2y$10$duycKLRDsJ.rnedMe4w.ou1BMuEhi7IJgiLuhWsJ9lDri47yllrDC', NULL, NULL, 'imagenes/user.png', 'usuario'),
(18, 'y', 'hy', NULL, 'n467@gmail.com', '$2y$10$mU2BPftMF1x20W7.nLcFr.33wgNfB5fwINhYkJ8njteAIePPF3tlG', NULL, NULL, 'imagenes/user.png', 'administrador'),
(20, 'loco', 'rene', NULL, 'locorene@gmail.com', '$2y$10$URG18W9CEFy9TQzvfj4XUOpwUqWlu05r6zQy/k.8ohXMvfnwPM1FK', NULL, NULL, 'imagenes/usuarios/1775682938_Renepuente.webp', 'administrador'),
(21, 'papi', 'miki', NULL, 'papimiki@gmail.com', '$2y$10$3L97QrY3tGlevATQEKwZ/OGE.NelEhtPJYakH/p1A/U1Wc5Bt0rVa', NULL, NULL, 'imagenes/usuarios/1775683259_papimiki.jpg', 'usuario'),
(25, 'arturo', 'vidal', NULL, 'arturovidal@gmail.com', '$2y$10$0YNsdaJBoPlyZtgvvldKZeNGwZbaEJKMkzMAllelIUdjmJbiyCg.K', NULL, NULL, 'imagenes/usuarios/1775683112_arturo vidal.webp', 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `asignatura_id` (`asignatura_id`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `asignatura_id` (`asignatura_id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumno_id` (`alumno_id`),
  ADD KEY `asignatura_id` (`asignatura_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `alumnos_ibfk_2` FOREIGN KEY (`asignatura_id`) REFERENCES `asignaturas` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `docentes_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `docentes_ibfk_2` FOREIGN KEY (`asignatura_id`) REFERENCES `asignaturas` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`asignatura_id`) REFERENCES `asignaturas` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
