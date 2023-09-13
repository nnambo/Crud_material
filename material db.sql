-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-09-2023 a las 11:55:31
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `materialncm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id` int(3) NOT NULL,
  `Fecha` date NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Numero` varchar(7) NOT NULL,
  `Serial` varchar(12) NOT NULL,
  `Celda` varchar(4) NOT NULL,
  `SRC` varchar(10) NOT NULL,
  `PEN` varchar(10) NOT NULL,
  `Step` varchar(8) NOT NULL,
  `Defecto` varchar(15) NOT NULL,
  `Turno` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`id`, `Fecha`, `Usuario`, `Numero`, `Serial`, `Celda`, `SRC`, `PEN`, `Step`, `Defecto`, `Turno`) VALUES
(1, '2023-06-07', 'nambos', '450983', '0wer8w', 'c150', '230494230', '4320934', 'c160', 'fisico', 3),
(2, '2023-06-07', 'coyote', '345\'305', '3\'023\'0', 'a200', '\'30423\'0', '\'3403432', 'd100', 'fisico', 3),
(3, '2023-06-26', 'NASN87', '02cy572', '3243249023', 'f200', '3318089673', '0383457', 'c135', 'fisico', 3),
(7, '2023-05-14', 'NASN87', '02cy572', '3243249023', 'f200', '33094832', '0383457', 'c135', 'fisico', 2),
(10, '2023-05-14', 'NASN87', '02cy572', '3243249023', 'f200', '33094832', '0383457', 'c135', 'fisico', 2),
(11, '2023-07-04', 'NASN87', '02cy572', '3243249023', 'f200', '33094832', '0383457', 'c135', 'fisico', 1),
(12, '2023-07-05', 'jose', '03fe453', '3243249023', 'f250', '3318089673', '0383457', 'c135', 'fisico', 1),
(13, '2023-07-03', 'nambo', '03fe453', '4308439823', 'd200', '3318089673', '09403445', 'a100', 'logico', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
