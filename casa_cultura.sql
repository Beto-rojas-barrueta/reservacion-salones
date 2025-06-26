-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2025 a las 09:02:24
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `casa_cultura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_reservas`
--

CREATE TABLE `tb_reservas` (
  `PK_ID_RESERVA` int(11) NOT NULL,
  `FK_ID_SALON` int(11) DEFAULT NULL,
  `FL_GRUPO_ARTISTICO` varchar(100) DEFAULT NULL,
  `FL_TIPO_EVENTO` varchar(100) DEFAULT NULL,
  `FL_FECHA` date DEFAULT NULL,
  `FL_HORA_INICIO` time DEFAULT NULL,
  `FL_HORA_FIN` time DEFAULT NULL,
  `FL_PUBLICO_ESPERADO` int(11) DEFAULT NULL,
  `FL_OBSERVACIONES` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_reservas`
--

INSERT INTO `tb_reservas` (`PK_ID_RESERVA`, `FK_ID_SALON`, `FL_GRUPO_ARTISTICO`, `FL_TIPO_EVENTO`, `FL_FECHA`, `FL_HORA_INICIO`, `FL_HORA_FIN`, `FL_PUBLICO_ESPERADO`, `FL_OBSERVACIONES`) VALUES
(1, 1, 'GRUPO TEATRAL LUZ', 'OBRA DE TEATRO', '2025-06-24', '18:00:00', '20:00:00', 95, 'PRESENTACIÓN ABIERTA AL PÚBLICO'),
(2, 2, 'DANZA VIVA', 'ENSAYO GENERAL', '2025-06-25', '16:00:00', '18:00:00', 50, 'ENSAYO PRIVADO'),
(3, 3, 'CORO INFANTIL ARMONÍA', 'ENSAYO', '2025-06-26', '15:00:00', '17:00:00', 30, 'ENSAYO REGULAR'),
(4, 1, 'COMPAÑÍA DRAMÁTICA MX', 'ENSAYO DE OBRA', '2025-06-27', '14:00:00', '17:00:00', 80, 'PREPARACIÓN DE ESTRENO'),
(5, 2, 'GRUPO FOLCLÓRICO XOCHITL', 'PRESENTACIÓN DE DANZA', '2025-06-28', '19:00:00', '21:00:00', 70, 'EVENTO GRATUITO'),
(6, 3, 'COLECTIVO POÉTICO', 'RECITAL POÉTICO', '2025-06-29', '17:00:00', '18:30:00', 35, 'LECTURA ABIERTA'),
(7, 1, 'ORQUESTA DE CÁMARA', 'CONCIERTO', '2025-06-30', '20:00:00', '22:00:00', 100, 'BOLETOS AGOTADOS'),
(8, 3, 'Honey\'s', 'Baile regional', '2025-06-23', '23:31:00', '23:30:00', 30, 'Prueba'),
(9, 3, 'sqa', 'saas', '2025-06-12', '23:32:00', '15:30:00', 2, ''),
(10, 3, 'sqa', 'saas', '2025-06-12', '23:32:00', '15:30:00', 2, ''),
(11, 3, 'Honey\'s', 'Baile regional', '2025-06-24', '23:20:00', '23:20:00', 24, 'Prueba'),
(12, 1, 'Honey\'s', 'Baile regional', '2025-06-26', '00:09:00', '05:13:00', 100, 'Prueba con público esperado  valido'),
(13, 1, 'Grupo Betos', 'Música regional', '2025-06-28', '13:30:00', '14:30:00', 100, 'Se reserva el salón A con capacidad de 100 aunque se esperan 200'),
(14, 1, 'Prueba', 'Música regional', '2025-06-28', '13:30:00', '13:30:00', 100, 'prueba'),
(15, 1, 'Grupo Betos', 'Baile regional', '2025-06-28', '14:31:00', '17:33:00', 100, 'prueba'),
(16, 1, 'Grupo Rivera', 'Música clásica ', '2025-06-28', '01:00:00', '02:00:00', 100, 'Evento social '),
(17, 1, 'Grupo Rivera', 'Música clásica ', '2025-06-28', '02:00:00', '03:00:00', 100, 'Evento social '),
(18, 2, 'Grupo Sofís', 'Evento Infantil', '2025-06-27', '10:00:00', '11:00:00', 50, 'Evento infantil y se esperan 50 personas'),
(19, 2, 'Grupo Sofís', 'Evento Infantil', '2025-06-27', '00:00:00', '01:00:00', 50, 'Evento infantil y se esperan 50 personas'),
(20, 2, 'Grupo CHILDREN', 'Evento Infantil', '2025-06-28', '00:00:00', '13:00:00', 60, 'Evento infantil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_salones`
--

CREATE TABLE `tb_salones` (
  `PK_ID_SALON` int(11) NOT NULL,
  `FL_NOMBRE` varchar(100) NOT NULL,
  `FL_CAPACIDAD` int(11) NOT NULL,
  `FL_DESCRIPCION` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_salones`
--

INSERT INTO `tb_salones` (`PK_ID_SALON`, `FL_NOMBRE`, `FL_CAPACIDAD`, `FL_DESCRIPCION`) VALUES
(1, 'SALÓN A', 100, 'AUDITORIO PRINCIPAL'),
(2, 'SALÓN B', 80, 'SALÓN MEDIANO'),
(3, 'SALÓN C', 40, 'SALÓN PEQUEÑO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_reservas`
--
ALTER TABLE `tb_reservas`
  ADD PRIMARY KEY (`PK_ID_RESERVA`),
  ADD KEY `FK_ID_SALON` (`FK_ID_SALON`);

--
-- Indices de la tabla `tb_salones`
--
ALTER TABLE `tb_salones`
  ADD PRIMARY KEY (`PK_ID_SALON`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_reservas`
--
ALTER TABLE `tb_reservas`
  MODIFY `PK_ID_RESERVA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tb_salones`
--
ALTER TABLE `tb_salones`
  MODIFY `PK_ID_SALON` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_reservas`
--
ALTER TABLE `tb_reservas`
  ADD CONSTRAINT `tb_reservas_ibfk_1` FOREIGN KEY (`FK_ID_SALON`) REFERENCES `tb_salones` (`PK_ID_SALON`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
