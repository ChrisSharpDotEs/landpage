-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-04-2024 a las 14:19:52
-- Versión del servidor: 8.0.36-0ubuntu0.22.04.1
-- Versión de PHP: 8.1.2-1ubuntu2.15
CREATE DATABASE departamento_ventas;
USE departamento_ventas;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `departamento_ventas`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `nuevo_cliente` (IN `nombre` VARCHAR(40), IN `localidad` VARCHAR(40), IN `comercial` INT)   BEGIN
	DECLARE id_cliente_existente INT;
    
	INSERT INTO cliente (nombre, localidad) VALUES(nombre, localidad);
    
    SELECT id INTO id_cliente_existente FROM cliente WHERE cliente.nombre = nombre AND cliente.localidad = localidad;
    
    IF id_cliente_existente IS NOT NULL THEN
        INSERT INTO comercial_cliente (id_comercial, id_cliente) VALUES (comercial, id_cliente_existente);
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_clientes` (IN `id_comercial` INT)   BEGIN
    -- Declaración de variables
    DECLARE done INT DEFAULT FALSE;
    DECLARE cliente_id INT;
    DECLARE cliente_nombre VARCHAR(40);
    DECLARE cliente_localidad VARCHAR(40);
    DECLARE cur CURSOR FOR 
        SELECT cliente.id, cliente.nombre, cliente.localidad 
        FROM cliente 
        JOIN comercial_cliente ON comercial_cliente.id_cliente = cliente.id 
        WHERE comercial_cliente.id_comercial = id_comercial;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

    -- Inicializar un array de resultados vacío
    CREATE TEMPORARY TABLE IF NOT EXISTS clientes_temp (
        id INT,
        nombre VARCHAR(40),
        localidad VARCHAR(40)
    );

    -- Abrir el cursor y almacenar los resultados en la tabla temporal
    OPEN cur;
    read_loop: LOOP
        FETCH cur INTO cliente_id, cliente_nombre, cliente_localidad;
        IF done THEN
            LEAVE read_loop;
        END IF;
        INSERT INTO clientes_temp (id, nombre, localidad) VALUES (cliente_id, cliente_nombre, cliente_localidad);
    END LOOP;
    CLOSE cur;

    -- Devolver los resultados
    SELECT * FROM clientes_temp;

    -- Limpiar la tabla temporal
    DROP TEMPORARY TABLE IF EXISTS clientes_temp;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int NOT NULL,
  `id_comercial` int NOT NULL,
  `id_cliente` int NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `localidad` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercial`
--

CREATE TABLE `comercial` (
  `id` int NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercial_cliente`
--

CREATE TABLE `comercial_cliente` (
  `id` int NOT NULL,
  `id_comercial` int NOT NULL,
  `id_cliente` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `id` int NOT NULL,
  `id_cliente` int NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_citas_FK` (`id_cliente`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comercial`
--
ALTER TABLE `comercial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comercial_cliente`
--
ALTER TABLE `comercial_cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_FK` (`id_cliente`),
  ADD KEY `comercial_FK` (`id_comercial`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_contrato_FK` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comercial`
--
ALTER TABLE `comercial`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `cliente_citas_FK` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `comercial_cliente`
--
ALTER TABLE `comercial_cliente`
  ADD CONSTRAINT `comercial_cliente_ibfk_1` FOREIGN KEY (`id_comercial`) REFERENCES `comercial` (`id`),
  ADD CONSTRAINT `comercial_cliente_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `cliente_contrato_FK` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
