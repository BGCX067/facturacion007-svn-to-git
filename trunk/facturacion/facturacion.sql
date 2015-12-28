-- phpMyAdmin SQL Dump
-- version 3.3.7deb5build0.10.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-08-2012 a las 16:00:43
-- Versión del servidor: 5.1.61
-- Versión de PHP: 5.3.3-1ubuntu9.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `facturacion`
--
CREATE DATABASE `facturacion` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `facturacion`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE IF NOT EXISTS `bitacora` (
  `id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `sql` text NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `bitacora`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_apellido` varchar(200) NOT NULL,
  `nacionalidad` varchar(1) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `idParroquia` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idParroquia` (`idParroquia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre_apellido`, `nacionalidad`, `cedula`, `direccion`, `telefono`, `idParroquia`) VALUES
(2, 'Juan A Mendoza ', 'V', '18758704', 'Albarico', '0412-8889976', '00019'),
(3, 'Pedro Perez', 'V', '12345678', 'Independencia', '02545555555', '00004');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE IF NOT EXISTS `facturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nro_control` varchar(10) NOT NULL,
  `fecha_emision` date NOT NULL,
  `hora` time NOT NULL,
  `total_iva` float NOT NULL,
  `total_descuento` float NOT NULL,
  `total_neto` float NOT NULL,
  `forma_pago` varchar(20) NOT NULL,
  `estatus` varchar(50) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`,`id_usuario`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcar la base de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id`, `nro_control`, `fecha_emision`, `hora`, `total_iva`, `total_descuento`, `total_neto`, `forma_pago`, `estatus`, `id_cliente`, `id_usuario`) VALUES
(1, '', '2012-06-12', '16:08:00', 720, 0, 4720, 'contado', '', 2, 1),
(3, 'F0001', '2012-06-14', '12:14:00', 1440, 0, 9440, 'contado', 'pagada', 2, 1),
(4, 'F002', '2012-06-14', '13:15:00', 2160, 0, 14160, 'contado', 'pagada', 2, 1),
(5, 'B-002', '2012-06-15', '11:08:00', 6660, 0, 43660, 'contado', 'pagada', 2, 1),
(6, 'F-00006', '2012-06-29', '17:36:00', 720, 0, 6720, 'contado', 'pagada', 2, 1),
(7, 'F-00007', '2012-06-29', '17:44:00', 1440, 0, 13440, 'contado', 'pagada', 2, 1),
(8, 'F-00008', '2012-06-29', '17:46:00', 4200, 0, 39200, 'contado', 'pagada', 2, 1),
(9, 'F-00008', '2012-06-29', '17:46:00', 4200, 0, 39200, 'contado', 'pagada', 2, 1),
(10, 'F-00010', '2012-06-29', '17:48:00', 3600, 0, 33600, 'contado', 'pagada', 2, 1),
(11, 'F-00011', '2012-06-29', '19:14:00', 1800, 0, 16800, 'contado', 'pagada', 2, 1),
(12, 'F-00012', '2012-06-29', '19:15:00', 3600, 0, 33600, 'contado', 'pagada', 2, 1),
(13, 'F-00013', '2012-07-02', '19:00:00', 2160, 0, 20160, 'contado', 'pagada', 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE IF NOT EXISTS `municipios` (
  `idMunicipio` varchar(5) NOT NULL COMMENT 'clave primaria',
  `municipio` varchar(30) NOT NULL COMMENT 'almacena el nombre de cada uno de los municipios del estado',
  PRIMARY KEY (`idMunicipio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Almacena los municipios del estado';

--
-- Volcar la base de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`idMunicipio`, `municipio`) VALUES
('00001', 'San Felipe'),
('00002', 'Independencia'),
('00003', 'Cocorote'),
('00004', 'Bolivar'),
('00005', 'Bruzual'),
('00006', 'Manuel Monge'),
('00007', 'La Trinidad'),
('00008', 'Jose Antonio Paez'),
('00009', 'Sucre'),
('00010', 'Nirgua'),
('00011', 'Peña'),
('00012', 'Urachiche'),
('00013', 'Veroes'),
('00014', 'Aristides Bastidas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquias`
--

CREATE TABLE IF NOT EXISTS `parroquias` (
  `idParroquia` varchar(5) NOT NULL COMMENT 'clave principal',
  `parroquia` varchar(30) NOT NULL COMMENT 'almacena los nombres de todas las parroquias del estado yaracuy',
  `idMunicipio` varchar(5) NOT NULL COMMENT 'clave foranea para hacer la relacion con la tabla municipios',
  PRIMARY KEY (`idParroquia`),
  KEY `idMunicipio` (`idMunicipio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Amacena las parroquias del estado';

--
-- Volcar la base de datos para la tabla `parroquias`
--

INSERT INTO `parroquias` (`idParroquia`, `parroquia`, `idMunicipio`) VALUES
('00001', 'San Felipe', '00001'),
('00002', 'Albarico', '00001'),
('00003', 'San Javier', '00001'),
('00004', 'Independencia', '00002'),
('00005', 'Cocorote', '00003'),
('00006', 'Aroa', '00004'),
('00007', 'Chivacoa', '00005'),
('00008', 'Campo Elias', '00005'),
('00009', 'Yumare', '00006'),
('00010', 'Boraure', '00007'),
('00011', 'Sabana de Parra', '00008'),
('00012', 'Guama', '00009'),
('00013', 'Nirgua', '00010'),
('00014', 'Salom', '00010'),
('00015', 'Temerla', '00010'),
('00016', 'Yaritagua', '00011'),
('00017', 'San Andres', '00011'),
('00018', 'Urachiche', '00012'),
('00019', 'Farriar', '00013'),
('00020', 'El Guayabo', '00013'),
('00021', 'San Pablo', '00014');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) NOT NULL,
  `descripcion` text NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `stock_minimo` int(11) NOT NULL,
  `existencia` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_proveedor` (`id_proveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `descripcion`, `precio_compra`, `precio_venta`, `stock_minimo`, `existencia`, `id_proveedor`) VALUES
(1, 'A-001', 'UNA DESCRIPCION', 1000, 2000, 10, 74, 2),
(2, 'c002', 'Arroz', 2000, 3000, 10, 83, 2),
(3, 'A-002', 'Cualquier Cosa', 3000, 5000, 10, 69, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_factura`
--

CREATE TABLE IF NOT EXISTS `productos_factura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_producto` int(11) NOT NULL,
  `iva_producto` float NOT NULL,
  `descuento_producto` float NOT NULL,
  `total_producto` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_factura` (`id_factura`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcar la base de datos para la tabla `productos_factura`
--

INSERT INTO `productos_factura` (`id`, `id_factura`, `id_producto`, `cantidad_producto`, `iva_producto`, `descuento_producto`, `total_producto`) VALUES
(1, 3, 1, 2, 0, 0, 4000),
(2, 3, 1, 2, 0, 0, 4000),
(3, 4, 1, 2, 0, 0, 4000),
(4, 4, 1, 4, 0, 0, 8000),
(5, 5, 2, 4, 0, 0, 12000),
(6, 5, 3, 5, 0, 0, 25000),
(7, 6, 2, 2, 0, 0, 6000),
(8, 7, 2, 4, 0, 0, 12000),
(9, 8, 3, 7, 0, 0, 35000),
(10, 9, 3, 7, 0, 0, 35000),
(11, 10, 3, 6, 0, 0, 30000),
(12, 11, 2, 5, 0, 0, 15000),
(13, 12, 3, 6, 0, 0, 30000),
(14, 13, 2, 2, 0, 0, 6000),
(15, 13, 1, 6, 0, 0, 12000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rif` varchar(20) NOT NULL,
  `razon_social` text NOT NULL,
  `telefono` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `rif`, `razon_social`, `telefono`) VALUES
(2, 'j-12345678-1', 'Los Chinos C.A', '0254-5553873');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(36) NOT NULL,
  `rol` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `login`, `password`, `rol`) VALUES
(1, 'Juan', 'Mendoza', 'jmendoza', 'fda61272edcad4243461bd15b3a6e0c7', 'administrador'),
(3, 'Carlos', 'Ilarraza', 'cilarraza', '1eb676783bed0b105e39bd958987db20', 'administrador'),
(4, 'Pedro', 'Perez', 'pperez', 'fda61272edcad4243461bd15b3a6e0c7', 'por defecto');

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`idParroquia`) REFERENCES `parroquias` (`idParroquia`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `facturas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `parroquias`
--
ALTER TABLE `parroquias`
  ADD CONSTRAINT `parroquias_ibfk_1` FOREIGN KEY (`idMunicipio`) REFERENCES `municipios` (`idMunicipio`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos_factura`
--
ALTER TABLE `productos_factura`
  ADD CONSTRAINT `productos_factura_ibfk_1` FOREIGN KEY (`id_factura`) REFERENCES `facturas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_factura_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON UPDATE CASCADE;

