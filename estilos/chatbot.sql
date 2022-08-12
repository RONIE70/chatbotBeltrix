-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2022 a las 04:53:39
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chatbot`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriausuarios`
--

CREATE TABLE `categoriausuarios` (
  `id` int(20) NOT NULL,
  `id_tipo` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `mensaje` varchar(200) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `fechaMensaje` date NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menuopciones`
--

CREATE TABLE `menuopciones` (
  `idMenu` int(2) NOT NULL,
  `descripcion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `idSuperior` int(11) DEFAULT NULL,
  `nroOpcion` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `menuopciones`
--

INSERT INTO `menuopciones` (`idMenu`, `descripcion`, `idSuperior`, `nroOpcion`) VALUES
(1, 'Administración', NULL, 1),
(2, 'Info general ', NULL, 2),
(3, 'Alumnos', NULL, 3),
(4, 'Profesionales', NULL, 4),
(5, 'Hacer una pregunta', NULL, 5),
(6, 'Ayuda', NULL, 6),
(7, 'Dto. de alumnos', 1, 1),
(8, 'Pagos', 1, 2),
(9, 'Tarjeta/libreta', 1, 3),
(10, 'Soporte técnico', 1, 4),
(11, 'Estatutos legales', 1, 5),
(12, 'Horarios de atención', 2, 1),
(13, 'Carreras', 2, 2),
(14, 'Capacitación', 2, 3),
(15, 'Formación profesional', 2, 4),
(16, 'Inscripciones', 2, 5),
(17, 'Domilicio', 2, 6),
(18, 'Teléfonos', 2, 7),
(19, 'Cartelera', 2, 8),
(20, 'Redes sociales(sedes)', 2, 9),
(21, 'Calendario académico', 3, 1),
(22, 'Cartelera', 3, 2),
(23, 'Alumno regular - LOGIN', 3, 3),
(24, 'Inscribirse', 3, 4),
(25, 'Entrevistas a docentes', 4, 1),
(26, 'Profesor que no puede asistir', 4, 2),
(27, 'Soporte técnico a docentes', 4, 3),
(28, 'Problemas técnico', 4, 4),
(29, 'Ajustes del chatBot', 4, 5),
(30, 'Usuarios', 6, 1),
(31, 'Alumnos', 6, 2),
(32, 'Profesional', 6, 3),
(33, 'Horarios', 7, 1),
(34, 'Trámites', 7, 2),
(35, 'Pagos por cvu/cbu', 8, 1),
(36, 'Pagos por QR', 8, 2),
(37, 'Precios', 9, 1),
(38, 'Tiempos limites', 9, 2),
(39, 'Instructivos', 10, 1),
(40, 'Ayuda telefónica', 10, 2),
(41, 'Covid19', 11, 1),
(42, 'Estatutos legales para ingresar', 11, 2),
(43, 'Análisis de sistemas', 12, 1),
(44, 'Diseño Industrial', 12, 2),
(45, 'Enfermería', 12, 3),
(46, 'Radiología', 12, 4),
(47, 'Higiene y seguridad en el trabajo', 12, 5),
(48, 'Comunicación multimedial', 12, 6),
(49, 'Administración contable', 12, 7),
(50, 'Administración de pequeñas y medianas empresas--PY', 12, 8),
(51, 'Certificación superior en salud y seguridad ocupac', 12, 9),
(52, 'Comunicación', 12, 10),
(53, 'Multimedial', 12, 11),
(54, 'Informática', 13, 1),
(55, 'Metalúrgica', 13, 2),
(56, 'Oficios digitales', 13, 3),
(57, 'Ingles Nivel I Y Nivel II', 14, 1),
(58, 'Portugues Nivel I Y Nivel II', 14, 2),
(59, 'Diseño proyectual basico', 14, 3),
(60, 'Diseño proyectual avanzado', 14, 4),
(61, 'Tornero', 14, 5),
(62, 'Cupo', 15, 1),
(63, 'Tiempo para la inscripcion', 15, 2),
(64, 'Mesa de exámenes', 22, 1),
(65, 'Olvidó su clave', 22, 2),
(66, 'Teams', 38, 1),
(67, 'Office365', 38, 2),
(68, 'Outlook', 38, 3),
(69, 'SIU', 38, 4),
(70, 'DD,JJ', 41, 1),
(71, 'Modelado', 53, 1),
(72, 'Operador de autocad', 53, 2),
(73, 'Software básico', 53, 3),
(74, 'Software avanzado', 53, 4),
(75, 'Hardware', 53, 5),
(76, 'Operario múltiple', 54, 1),
(77, 'Electrónica inicial', 54, 2),
(78, 'Electricista inicial/Calificado', 54, 3),
(79, 'Tornero Niv. inicial/Calificado', 54, 4),
(80, 'Soldador Niv. inicial/Calificado', 54, 5),
(81, 'Operador de CNC', 54, 6),
(82, 'Operador de PLC', 54, 7),
(83, 'Instalación de antenas y decodificadores de TVDT', 55, 1),
(84, 'Montaje y mantenimiento de decodificadores de TVDT', 55, 2),
(85, 'y reparaciones de fallas de decodificadores de TVD', 55, 3),
(86, 'Desarrollo de software para TV Digital', 55, 4),
(87, 'Enviar cv', 25, 1),
(88, 'Materias del docente', 26, 1),
(89, 'Mail', 27, 1),
(90, 'Teléfono', 27, 2),
(91, 'Falta de luz', 28, 1),
(92, 'Problemas con el auto', 28, 2),
(93, 'Licencias', 28, 3),
(94, 'Enfermedad', 28, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opcioneslogin`
--

CREATE TABLE `opcioneslogin` (
  `idMenuLog` int(11) NOT NULL,
  `descripcion` varchar(25) NOT NULL,
  `idSuperior` int(5) DEFAULT NULL,
  `nroOpcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `opcioneslogin`
--

INSERT INTO `opcioneslogin` (`idMenuLog`, `descripcion`, `idSuperior`, `nroOpcion`) VALUES
(1, 'Notas', NULL, 1),
(2, 'Certificado Exámen', NULL, 2),
(3, 'C. Alumno Regular', NULL, 3),
(4, 'Equivalencias', NULL, 4),
(9, 'Descargar Notas', 1, 1),
(10, 'Descargar Reconocidas', 4, 1),
(11, 'Descargar Certificado', 3, 1),
(12, 'Descargar Certificado', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(20) NOT NULL,
  `nrespuesta` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saludos`
--

CREATE TABLE `saludos` (
  `idSaludos` varchar(2) NOT NULL,
  `txtSaludos` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `saludos`
--

INSERT INTO `saludos` (`idSaludos`, `txtSaludos`) VALUES
('1', 'Hola'),
('1', 'Hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocategoriausuarios`
--

CREATE TABLE `tipocategoriausuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `registrado` varchar(11) NOT NULL,
  `publico` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipocategoriausuarios`
--

INSERT INTO `tipocategoriausuarios` (`id`, `nombre`, `registrado`, `publico`) VALUES
(1, 'alumno', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomensajes`
--

CREATE TABLE `tipomensajes` (
  `id` int(2) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipomensajes`
--

INSERT INTO `tipomensajes` (`id`, `descripcion`) VALUES
(5, 'palabrasClaves'),
(2, 'preguntas'),
(3, 'respuestas'),
(4, 'restringidas'),
(1, 'saludos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `foto_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `idcategoria`, `foto_user`) VALUES
(1, 'a', 'a', 'a', 1, 'archivos/a.jpg'),
(2, 'Paula Quiroga', 'paula@gmail.com', '1234', 1, 'archivos/usuarios.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoriausuarios`
--
ALTER TABLE `categoriausuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menuopciones`
--
ALTER TABLE `menuopciones`
  ADD PRIMARY KEY (`idMenu`),
  ADD KEY `fk_idSuperior` (`idSuperior`);

--
-- Indices de la tabla `opcioneslogin`
--
ALTER TABLE `opcioneslogin`
  ADD PRIMARY KEY (`idMenuLog`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `saludos`
--
ALTER TABLE `saludos`
  ADD KEY `txtSaludos` (`txtSaludos`);

--
-- Indices de la tabla `tipocategoriausuarios`
--
ALTER TABLE `tipocategoriausuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipomensajes`
--
ALTER TABLE `tipomensajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `descripcion` (`descripcion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarios_ibfk_1` (`idcategoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoriausuarios`
--
ALTER TABLE `categoriausuarios`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menuopciones`
--
ALTER TABLE `menuopciones`
  MODIFY `idMenu` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de la tabla `opcioneslogin`
--
ALTER TABLE `opcioneslogin`
  MODIFY `idMenuLog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoriausuarios`
--
ALTER TABLE `categoriausuarios`
  ADD CONSTRAINT `categoriausuarios_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipocategoriausuarios` (`id`),
  ADD CONSTRAINT `categoriausuarios_ibfk_2` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipomensajes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `menuopciones`
--
ALTER TABLE `menuopciones`
  ADD CONSTRAINT `fk_idSuperior` FOREIGN KEY (`idSuperior`) REFERENCES `menuopciones` (`idMenu`);

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tipomensajes` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `tipocategoriausuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
