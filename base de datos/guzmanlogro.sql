-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2024 a las 20:54:03
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `guzmanlogro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denuncias`
--

CREATE TABLE `denuncias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `ubicacion` varchar(150) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `ciudadano` varchar(100) NOT NULL,
  `telefono_ciudadano` varchar(15) DEFAULT NULL,
  `Fecha_registro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `denuncias`
--

INSERT INTO `denuncias` (`id`, `titulo`, `descripcion`, `ubicacion`, `estado`, `ciudadano`, `telefono_ciudadano`, `Fecha_registro`) VALUES
(1, 'Robo en tienda', 'Se reporta un robo en una tienda local', 'Av. Principal 126', 'pendiente', 'Carlos Pérezz', '987654320', '2024-10-30 08:19:21'),
(2, 'Vandalismo en parque', 'Se detectaron grafitis en juegos infantiles', 'Parque Central', 'en proceso', 'María Gómez', '912345678', '2024-10-30 08:19:21'),
(3, 'Fuga de agua', 'Fuga en tubería de la calle', 'Calle 10, Esquina Sur', 'pendiente', 'Jorge Ruiz', '999888777', '2024-10-30 08:19:21'),
(4, 'Ruido excesivo', 'Vecinos reportan ruido de fiesta durante la noche', 'Calle Los Olivos 34', 'resuelto', 'Ana Torres', '922334455', '2024-10-30 08:19:21'),
(5, 'Mal estacionamiento', 'Vehículo bloqueando una rampa para discapacitados', 'Av. Libertad 456', 'en proceso', 'Luis Hernández', '944556677', '2024-10-30 08:19:21'),
(7, 'Robo en negocio', 'Robo de dinero', 'centro de la ciudad', 'pendiente', 'Guerrero Basco', '987654321', '2024-10-30 10:01:33'),
(9, 'Robo de bicicleta', 'Sustrajeron bicicleta de la plaza central', 'Plaza Central', 'Pendiente', 'Juan Pérez', '987654321', '2024-10-30 10:09:34'),
(10, 'Daños a propiedad', 'Romperieron las ventanas de mi casa', 'Av. Los Rosales 123', 'Pendiente', 'María García', '945678123', '2024-10-30 10:09:34'),
(11, 'Robo de celular', 'Me quitaron el celular en el bus', 'Paradero 14, Ruta 5', 'resuelto', 'Gilverto Santorosa', '912345678', '2024-10-30 10:09:34'),
(12, 'Vandalismo en parque', 'Grafitearon las paredes del parque', 'Parque El Olivo', 'Pendiente', 'Ana Torres', '984512367', '2024-10-30 10:09:34'),
(13, 'Accidente de tránsito', 'Chocaron mi auto y huyeron', 'Av. Principal y Calle 4', 'Investigación', 'Carlos López', '953216487', '2024-10-30 10:09:34'),
(14, 'Acoso callejero', 'Una persona me acosó verbalmente', 'Calle Mayor 45', 'Investigación', 'Sofía Sánchez', '912367894', '2024-10-30 10:09:34'),
(15, 'Ruido excesivo', 'Fiesta en casa vecina sin control', 'Callejón San Juan', 'Resuelto', 'Pedro Ortiz', '999123654', '2024-10-30 10:09:34'),
(16, 'Basura en la calle', 'Amontonaron basura en mi cuadra', 'Av. Libertad 77', 'Pendiente', 'Carmen Silva', '923451267', '2024-10-30 10:09:34'),
(17, 'Venta ilegal de drogas', 'Noté actividad sospechosa en la esquina', 'Esquina 5 y Los Laureles', 'Investigación', 'Fernando Álvarez', '987654321', '2024-10-30 10:09:34'),
(18, 'Violencia doméstica', 'Escuché gritos y golpes en la casa de al lado', 'Calle Primavera 12', 'Resuelto', 'Laura Castillo', '912345678', '2024-10-30 10:09:34'),
(20, 'Robo en comercio', 'Forzaron la puerta de mi tienda', 'Av. Sol 330', 'Pendiente', 'Andrés Mejía', '965432178', '2024-10-30 10:09:34'),
(21, 'Falsificación de documentos', 'Intentaron falsificar mi firma', 'Oficina Calle 10', 'Investigación', 'Gloria Velásquez', '934512789', '2024-10-30 10:09:34'),
(22, 'Robo de vehículo', 'Me robaron el auto estacionado', 'Estacionamiento Plaza Norte', 'Pendiente', 'Diego León', '912876543', '2024-10-30 10:09:34'),
(23, 'Fraude bancario', 'Cargos no reconocidos en mi cuenta', 'Calle Falsa 123', 'Investigación', 'Lucía Mendoza', '952134678', '2024-10-30 10:09:34'),
(24, 'Violación de propiedad', 'Entraron al patio de mi casa sin permiso', 'Calle Naranjos 45', 'Resuelto', 'Rodrigo Campos', '923654789', '2024-10-30 10:09:34'),
(25, 'Amenazas', 'Una persona me amenazó por teléfono', 'Desconocido', 'Investigación', 'Valeria Espinoza', '932145678', '2024-10-30 10:09:34'),
(26, 'Extorsión', 'Me pidieron dinero a cambio de no hacerme daño', 'Centro Comercial', 'Pendiente', 'Daniela Rodríguez', '987654312', '2024-10-30 10:09:34'),
(28, 'Estafa en compra', 'Compré un producto defectuoso y no me respondieron', 'Tienda Online XYZ', 'Pendiente', 'Inés Chávez', '943215678', '2024-10-30 10:09:34'),
(29, 'Carro Mal Estacionado', 'Aparcado en medio de la pista', 'Calle Quiñones', 'en proceso', 'Renzo Palacios', '85475631', '2024-10-30 11:50:15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `denuncias`
--
ALTER TABLE `denuncias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `denuncias`
--
ALTER TABLE `denuncias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
