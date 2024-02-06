-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.24-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla alquiler.detalle_venta
CREATE TABLE IF NOT EXISTS `detalle_venta` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` int(11) DEFAULT NULL,
  `id_productos` int(11) DEFAULT NULL,
  `cantidad` varchar(50) DEFAULT NULL,
  `precio_venta` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `FK_detalle_venta_tb_productos` (`id_productos`),
  CONSTRAINT `FK_detalle_venta_tb_productos` FOREIGN KEY (`id_productos`) REFERENCES `tb_productos` (`id_productos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla alquiler.detalle_venta: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_venta` DISABLE KEYS */;
INSERT INTO `detalle_venta` (`id_detalle`, `numero_factura`, `id_productos`, `cantidad`, `precio_venta`) VALUES
	(46, 1, 5, '3', '43.00'),
	(47, 2, 4, '3', '23.00'),
	(48, 3, 4, '2', '23.00'),
	(49, 3, 4, '2', '23.00'),
	(50, 4, 7, '2', '13.30'),
	(51, 4, 7, '2', '13.30'),
	(52, 5, 5, '4', '43.00'),
	(53, 6, 5, '3', '43.00'),
	(54, 7, 5, '4', '43.00'),
	(55, 8, 4, '3', '23.00'),
	(56, 9, 5, '3', '43.00'),
	(57, 10, 4, '1', '23.00'),
	(58, 11, 5, '2', '43.00'),
	(61, 12, 6, '3', '22.00'),
	(62, 13, 6, '2', '22.00'),
	(63, 14, 5, '3', '43.00'),
	(64, 15, 6, '3', '22.00');
/*!40000 ALTER TABLE `detalle_venta` ENABLE KEYS */;

-- Volcando estructura para tabla alquiler.tb_categorias
CREATE TABLE IF NOT EXISTS `tb_categorias` (
  `id_categorias` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_categorias`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla alquiler.tb_categorias: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_categorias` DISABLE KEYS */;
INSERT INTO `tb_categorias` (`id_categorias`, `descripcion`, `estado`) VALUES
	(1, 'vestidos', 1),
	(2, 'Pantalones ', 1),
	(4, 'forma', 0);
/*!40000 ALTER TABLE `tb_categorias` ENABLE KEYS */;

-- Volcando estructura para tabla alquiler.tb_clientes
CREATE TABLE IF NOT EXISTS `tb_clientes` (
  `id_clientes` int(11) NOT NULL AUTO_INCREMENT,
  `nombres_apellidos` varchar(50) DEFAULT NULL,
  `cedula` varchar(11) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `estado` int(11) DEFAULT 1,
  PRIMARY KEY (`id_clientes`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla alquiler.tb_clientes: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_clientes` DISABLE KEYS */;
INSERT INTO `tb_clientes` (`id_clientes`, `nombres_apellidos`, `cedula`, `telefono`, `correo`, `direccion`, `fecha_registro`, `estado`) VALUES
	(30, 'martines bajañs', '092383332', '0987654321', 'jacientolopez2029@gmail.com', 'mw', '2023-08-16', 0),
	(41, 'jamilex castros', '0974634256', '0293820392', 'jonathanlopez3020@hotmail.com', 'que te oas', '2023-05-08', 1),
	(45, 'Marcos Abd Herrera', '0987654321', '0912382192', 'jose3020@gmail.com', 'ZJHXBHZVXZH<Z', '2023-05-08', 1),
	(46, 'jhon marcos david', '0873651427', '3242112321', 'jonathanlopez3020@gmail.com', 'que te paso', '2022-12-21', 1),
	(50, 'alexanda jose ', '0349838383', '328328293', 'joseartines@gmail.com', 'dsfssdsd', '2023-03-02', 1),
	(52, 'jonathan lopez', '0929979938', '0912382192', 'jonathanlopez3020@hotmail.com', 'km 31 via ha ', '2023-03-14', 1),
	(58, 'angie rosa rosa ', '0983736252', '0987654321', 'jonathan@gmai.com', 'que mas da yo', '2023-03-14', 1),
	(59, 'hola que tal ', '09897887878', '0987907897', 'jonathanlopez3020@hotmail.com', 'iughAUISGiuas', '2023-05-07', 1);
/*!40000 ALTER TABLE `tb_clientes` ENABLE KEYS */;

-- Volcando estructura para tabla alquiler.tb_configuracion
CREATE TABLE IF NOT EXISTS `tb_configuracion` (
  `id_configuracion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `icono` varchar(100) DEFAULT NULL,
  `iva` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_configuracion`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla alquiler.tb_configuracion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_configuracion` DISABLE KEYS */;
INSERT INTO `tb_configuracion` (`id_configuracion`, `nombre`, `telefono`, `direccion`, `correo`, `logo`, `icono`, `iva`) VALUES
	(1, 'Delgado sanchez maira fernanda Alquitrajes', '0430822538', 'gral vernaza sl 20 y sucre', 'maria.fds78@gmail.com', 'Logotype_.png', 'terni.png', '4');
/*!40000 ALTER TABLE `tb_configuracion` ENABLE KEYS */;

-- Volcando estructura para tabla alquiler.tb_productos
CREATE TABLE IF NOT EXISTS `tb_productos` (
  `id_productos` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(50) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `stock` varchar(50) DEFAULT NULL,
  `talla` varchar(50) DEFAULT NULL,
  `precioventa` decimal(20,2) DEFAULT NULL,
  `id_categorias` int(11) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  PRIMARY KEY (`id_productos`) USING BTREE,
  KEY `FK_tb_productos_tb_categorias` (`id_categorias`),
  CONSTRAINT `FK_tb_productos_tb_categorias` FOREIGN KEY (`id_categorias`) REFERENCES `tb_categorias` (`id_categorias`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla alquiler.tb_productos: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_productos` DISABLE KEYS */;
INSERT INTO `tb_productos` (`id_productos`, `color`, `descripcion`, `stock`, `talla`, `precioventa`, `id_categorias`, `fecha_registro`) VALUES
	(4, 'azul', 'oan con cola', '78', 'xl', 23.00, 1, '2023-06-07 08:15:58'),
	(5, 'negro', 'respue2 ', '10', 'mr', 43.00, 1, '2023-06-07 08:16:41'),
	(6, 'amarillos', 'respuesto 3', '20', 'jw', 22.00, 1, '2023-06-07 08:17:19'),
	(7, 'zaul', 'caucho bicicleta', '13', 'ww', 13.30, 1, '2023-08-15 05:10:00'),
	(9, 'celeste', 'roba para peroosa', '26', 'mk', 23.00, 1, '2023-09-01 05:37:01'),
	(14, 'tokos', 'de buien traje', '12', '23', 23.00, 2, '2023-09-03 06:26:27');
/*!40000 ALTER TABLE `tb_productos` ENABLE KEYS */;

-- Volcando estructura para tabla alquiler.tb_tipo_usuario
CREATE TABLE IF NOT EXISTS `tb_tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT 1,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla alquiler.tb_tipo_usuario: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_tipo_usuario` DISABLE KEYS */;
INSERT INTO `tb_tipo_usuario` (`id_tipo_usuario`, `descripcion`, `estado`) VALUES
	(1, 'Admin', 1),
	(2, 'vendedor', 1);
/*!40000 ALTER TABLE `tb_tipo_usuario` ENABLE KEYS */;

-- Volcando estructura para tabla alquiler.tb_usuario
CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `cedula` varchar(50) DEFAULT NULL,
  `correo` varchar(60) DEFAULT NULL,
  `clave` varchar(300) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_tipo_usuario` int(11) DEFAULT 1,
  `estado` int(11) DEFAULT 1,
  PRIMARY KEY (`id_usuario`),
  KEY `FK_tb_usuario_tb_tipo_usuario` (`id_tipo_usuario`),
  CONSTRAINT `FK_tb_usuario_tb_tipo_usuario` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tb_tipo_usuario` (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla alquiler.tb_usuario: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` (`id_usuario`, `nombre`, `cedula`, `correo`, `clave`, `fecha`, `id_tipo_usuario`, `estado`) VALUES
	(77, 'jonathan ', 'admin', 'jonathanlopez3020@gmail.com', '$2y$10$qv9.0crs9KOuMLZW1xlipexo2ZRB8DYLqGQvQVan58GG3nVvuchPq', '2022-08-13', 1, 1),
	(94, 'rosa gabriela', 'rosa', 'jesua3020@gmail.com', '$2y$10$TlOBQeKmgEZP.aD7TFchOeSES.R079ejIloGZJYjTjEpHA7rEE56S', '2023-06-07', 2, 1);
/*!40000 ALTER TABLE `tb_usuario` ENABLE KEYS */;

-- Volcando estructura para tabla alquiler.tmp
CREATE TABLE IF NOT EXISTS `tmp` (
  `id_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `id_productos` int(11) DEFAULT NULL,
  `cantidad_tmp` varchar(100) DEFAULT NULL,
  `precio_tmp` varchar(50) DEFAULT NULL,
  `id_session` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_tmp`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla alquiler.tmp: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tmp` DISABLE KEYS */;
INSERT INTO `tmp` (`id_tmp`, `id_productos`, `cantidad_tmp`, `precio_tmp`, `id_session`) VALUES
	(192, 6, '3', '22.00', 'jriogncei3mgt0f8tkv0q28q6m');
/*!40000 ALTER TABLE `tmp` ENABLE KEYS */;

-- Volcando estructura para tabla alquiler.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` int(11) DEFAULT NULL,
  `fecha_factura` datetime DEFAULT NULL,
  `id_clientes` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `condiciones` int(11) DEFAULT NULL,
  `total_venta` decimal(20,2) DEFAULT NULL,
  `estado_factura` int(11) DEFAULT NULL,
  `codigo_venta` varchar(50) DEFAULT NULL,
  `abono` decimal(10,2) DEFAULT NULL,
  `fechadevolucion` date DEFAULT NULL,
  UNIQUE KEY `numero_factura` (`numero_factura`),
  KEY `id_factura` (`id_factura`),
  KEY `FK_ventas_tb_clientes` (`id_clientes`),
  CONSTRAINT `FK_ventas_tb_clientes` FOREIGN KEY (`id_clientes`) REFERENCES `tb_clientes` (`id_clientes`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla alquiler.ventas: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` (`id_factura`, `numero_factura`, `fecha_factura`, `id_clientes`, `id_usuario`, `condiciones`, `total_venta`, `estado_factura`, `codigo_venta`, `abono`, `fechadevolucion`) VALUES
	(30, 1, '2023-09-08 18:19:42', 52, 77, 2, 129.00, 1, 'CODVE1', 129.00, '2023-09-09'),
	(31, 2, '2023-09-08 18:23:56', 45, 77, 1, 69.00, 1, 'CODVE2', 69.00, '2023-09-09'),
	(32, 3, '2023-09-08 18:45:34', 52, 77, 1, 92.00, 1, 'CODVE3', 92.00, '2023-09-09'),
	(33, 4, '2023-09-08 18:53:07', 52, 77, 1, 53.20, 1, 'CODVE4', 53.20, '0000-00-00'),
	(34, 5, '2023-09-08 18:56:51', 45, 77, 2, 172.00, 1, 'CODVE5', 172.00, '2023-09-09'),
	(35, 6, '2023-09-08 19:05:25', 52, 77, 2, 129.00, 1, 'CODVE6', 129.00, '2023-09-30'),
	(36, 7, '2023-09-08 19:06:10', 45, 77, 1, 172.00, 1, 'CODVE7', 172.00, '0000-00-00'),
	(37, 8, '2023-09-09 08:21:59', 50, 77, 2, 69.00, 1, 'CODVE8', 69.00, '2023-09-12'),
	(38, 9, '2023-09-12 10:03:43', 45, 77, 2, 134.16, 1, 'CODVE9', 134.16, '2023-09-12'),
	(39, 10, '2023-09-12 10:05:57', 52, 77, 1, 23.92, 1, 'CODVE10', 23.92, '0000-00-00'),
	(40, 11, '2023-09-12 10:08:54', 41, 77, 2, 89.44, 1, 'CODVE11', 89.44, '2023-09-13'),
	(42, 12, '2023-09-14 17:42:46', 52, 77, 1, 68.64, 1, 'CODVE12', 68.64, '0000-00-00'),
	(43, 13, '2023-09-15 17:12:07', 52, 77, 2, 45.76, 1, 'CODVE13', 39.00, '2023-09-22'),
	(44, 14, '2023-09-19 16:31:24', 52, 77, 2, 134.16, 1, 'CODVE14', 15.00, '2023-09-21'),
	(45, 15, '2023-09-25 17:35:35', 52, 77, 2, 68.64, 1, 'CODVE15', 65.00, '2023-09-28');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

-- Volcando estructura para disparador alquiler.restar_stock
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `restar_stock` AFTER INSERT ON `detalle_venta` FOR EACH ROW BEGIN
    -- Actualizar el stock en tb_productos
    UPDATE tb_productos
    SET stock = stock - NEW.cantidad
    WHERE id_productos = NEW.id_productos;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
