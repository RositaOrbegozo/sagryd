/*
 Navicat Premium Data Transfer

 Source Server         : conn
 Source Server Type    : MySQL
 Source Server Version : 100130
 Source Host           : localhost:3306
 Source Schema         : pextumuy

 Target Server Type    : MySQL
 Target Server Version : 100130
 File Encoding         : 65001

 Date: 23/11/2020 16:13:51
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categoria
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria`  (
  `id_cat` int(4) NOT NULL AUTO_INCREMENT,
  `nomb_cat` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `descrip_cat` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_cat`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of categoria
-- ----------------------------
INSERT INTO `categoria` VALUES (1, 'ElectrÃ³nicos', 'Productos electrÃ³nicos como cÃ¡maras, celulares, audÃ­fonos, parlantes, proyectores, etc.', 1);
INSERT INTO `categoria` VALUES (2, 'Moda para Mujer', 'Perfumeria, calzados, carteras, billeteras, relojes, accesorios y mÃ¡s.', 1);
INSERT INTO `categoria` VALUES (3, 'Moda para Hombre', 'Ropa, calzado, relojes y accesorios.', 1);

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes`  (
  `id_cliente` int(8) NOT NULL AUTO_INCREMENT,
  `nomb_cliente` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `apell_cliente` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ndni_cliente` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cell_cliente` varchar(9) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tel_cliente` varchar(9) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_cliente`) USING BTREE,
  INDEX `id_cliente`(`id_cliente`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO `clientes` VALUES (1, 'Junior', 'Orbegozo', '12345678', '935473523', '7354264', 1);
INSERT INTO `clientes` VALUES (2, 'Maria', 'Blas', '19475437', '926345326', '9363432', 1);
INSERT INTO `clientes` VALUES (3, 'Luisa', 'Velasquez', '59271047', '993645762', '6527643', 1);
INSERT INTO `clientes` VALUES (4, 'Jairoly Alexander', 'Tamayo Llashac', '03321620', '925706002', '35115', 1);

-- ----------------------------
-- Table structure for departamento
-- ----------------------------
DROP TABLE IF EXISTS `departamento`;
CREATE TABLE `departamento`  (
  `id_dep` int(2) NOT NULL AUTO_INCREMENT,
  `nomb_dep` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_dep`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of departamento
-- ----------------------------
INSERT INTO `departamento` VALUES (1, 'Lima', 1);
INSERT INTO `departamento` VALUES (2, 'Trujillo', 1);
INSERT INTO `departamento` VALUES (3, 'Ancash', 1);
INSERT INTO `departamento` VALUES (4, 'Tacna', 1);
INSERT INTO `departamento` VALUES (5, 'Piura', 1);
INSERT INTO `departamento` VALUES (6, 'Arequipa', 1);

-- ----------------------------
-- Table structure for distrito
-- ----------------------------
DROP TABLE IF EXISTS `distrito`;
CREATE TABLE `distrito`  (
  `id_distrito` int(10) NOT NULL AUTO_INCREMENT,
  `nomb_distrito` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_prov` int(4) NULL DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_distrito`) USING BTREE,
  INDEX `id_prov`(`id_prov`) USING BTREE,
  CONSTRAINT `distrito_ibfk_1` FOREIGN KEY (`id_prov`) REFERENCES `provincia` (`id_prov`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of distrito
-- ----------------------------
INSERT INTO `distrito` VALUES (1, 'Huacho', 1, 1);
INSERT INTO `distrito` VALUES (2, 'Santa MarÃ­a', 1, 1);
INSERT INTO `distrito` VALUES (3, 'Hualmay', 1, 1);
INSERT INTO `distrito` VALUES (4, 'Chancay', 2, 1);
INSERT INTO `distrito` VALUES (5, 'Huaral', 2, 1);
INSERT INTO `distrito` VALUES (6, 'Supe', 3, 1);
INSERT INTO `distrito` VALUES (7, 'Paramonga', 3, 1);
INSERT INTO `distrito` VALUES (8, 'Pativilca', 3, 1);
INSERT INTO `distrito` VALUES (9, 'Barranca', 3, 1);
INSERT INTO `distrito` VALUES (10, 'San Vicente', 4, 1);
INSERT INTO `distrito` VALUES (11, 'Chilca', 4, 1);
INSERT INTO `distrito` VALUES (12, 'San Luis', 4, 1);
INSERT INTO `distrito` VALUES (13, 'Vegueta', 1, 1);

-- ----------------------------
-- Table structure for envio
-- ----------------------------
DROP TABLE IF EXISTS `envio`;
CREATE TABLE `envio`  (
  `id_envio` int(20) NOT NULL AUTO_INCREMENT,
  `forma_pago` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fech_envio` date NULL DEFAULT NULL,
  `fech_entrega` date NULL DEFAULT NULL,
  `id_ubigeo` int(8) NULL DEFAULT NULL,
  `id_pedido` int(8) NULL DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_envio`) USING BTREE,
  INDEX `id_pedido`(`id_pedido`) USING BTREE,
  INDEX `id_ubigeo`(`id_ubigeo`) USING BTREE,
  CONSTRAINT `envio_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `envio_ibfk_2` FOREIGN KEY (`id_ubigeo`) REFERENCES `ubigeo` (`id_ubigeo`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of envio
-- ----------------------------
INSERT INTO `envio` VALUES (1, 'PayPal', '2020-02-15', '2020-06-01', 2, 1, 1);
INSERT INTO `envio` VALUES (2, 'Efectivo', '2020-10-01', '2020-10-16', 2, 2, 1);
INSERT INTO `envio` VALUES (3, 'PayPal', '2020-11-18', '2020-11-24', 3, 2, 1);

-- ----------------------------
-- Table structure for factura
-- ----------------------------
DROP TABLE IF EXISTS `factura`;
CREATE TABLE `factura`  (
  `id_factura` int(20) NOT NULL AUTO_INCREMENT,
  `igv` decimal(3, 2) NULL DEFAULT NULL,
  `cantidad` int(10) NULL DEFAULT NULL,
  `id_pedido` int(10) NULL DEFAULT NULL,
  `id_prod` int(30) NULL DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_factura`) USING BTREE,
  INDEX `id_prod`(`id_prod`) USING BTREE,
  INDEX `id_pedido`(`id_pedido`) USING BTREE,
  CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `productos` (`id_prod`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of factura
-- ----------------------------
INSERT INTO `factura` VALUES (1, 0.18, 5, 1, 2, 1);
INSERT INTO `factura` VALUES (2, 0.18, 2, 1, 1, 1);
INSERT INTO `factura` VALUES (3, 0.00, 12, 2, 10, 1);
INSERT INTO `factura` VALUES (4, 1.00, 6, 3, 1, 1);
INSERT INTO `factura` VALUES (5, 0.17, 6, 1, 1, 1);
INSERT INTO `factura` VALUES (6, 0.17, 7, 1, 1, 1);

-- ----------------------------
-- Table structure for marca
-- ----------------------------
DROP TABLE IF EXISTS `marca`;
CREATE TABLE `marca`  (
  `id_marc` int(255) NOT NULL AUTO_INCREMENT,
  `nomb_marc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `descrip_marc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `img_marca` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_marc`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of marca
-- ----------------------------
INSERT INTO `marca` VALUES (1, 'HP', 'Empresa de tecnologÃ­a estadounidense comercializadora de hardware y software.', '../Assets/img/marca/hp.png', 1);
INSERT INTO `marca` VALUES (2, 'SanDisk', 'Empresa estadounidense dedicada al desarrollo y fabricaciï¿½n de dispositivos de memoria flash para el almacenamiento de informaciï¿½n.', '../Assets/img/marca/sandisk.jpg', 1);
INSERT INTO `marca` VALUES (3, 'Kingston', 'Fabricante estadounidense de productos de memorias de ordenadores.', '../Assets/img/marca/kingston.png', 1);
INSERT INTO `marca` VALUES (4, 'Renzo Costa', 'Empresa peruana lï¿½der en prendas y artï¿½culos de cuero.', '../Assets/img/marca/renzocosta.jpg', 1);
INSERT INTO `marca` VALUES (5, 'Gucci', 'Empresa dedicada al diseï¿½o y fabricaciï¿½n de artï¿½culos de moda tales como ropa, zapatos, joyas, bolsos, relojes y perfumes.', '../Assets/img/marca/gucci.jpg', 1);
INSERT INTO `marca` VALUES (6, 'Redragon', 'Marca de alto valor para perifï¿½ricos de juegos, dedicada a proporcionar a los clientes globales un hardware de juegos de alto rendimiento.', '../Assets/img/marca/redragon.png', 1);
INSERT INTO `marca` VALUES (7, 'Sony', 'Empresa multinacional fabricante de electrï¿½nica de consumo: audio y vï¿½deo, computaciï¿½n, fotografï¿½a, videojuegos, telefonï¿½a mï¿½vil, productos profesionales, etcï¿½tera.', '../Assets/img/marca/sony.png', 1);
INSERT INTO `marca` VALUES (8, 'Samsung', 'Empresa multinacional electrï¿½nica y de tecnologï¿½as de la informaciï¿½n.', '../Assets/img/marca/samsung.jpg', 1);
INSERT INTO `marca` VALUES (9, 'Epson', 'Empresa japonesa fabricante de impresoras de inyecciï¿½n de tinta, matricial y de impresoras lï¿½ser, escï¿½neres, ordenadores de escritorio, proyectores, home cinema, televisores, robots, equipamiento de automatismo industrial, TPV, mï¿½quinas registrado', '../Assets/img/marca/epson.jpg', 1);
INSERT INTO `marca` VALUES (10, 'Apple', 'Empresa estadounidense que diseï¿½a y produce equipos electrï¿½nicos, software y servicios en lï¿½nea.', '../Assets/img/marca/apple.png', 1);
INSERT INTO `marca` VALUES (11, 'MuGo', '', '../Assets/img/marca/mugo.png', 1);
INSERT INTO `marca` VALUES (12, 'Runmus', '', '../Assets/img/marca/runmus.png', 1);
INSERT INTO `marca` VALUES (13, 'Cafini', '', '../Assets/img/marca/cafini.jpg', 1);
INSERT INTO `marca` VALUES (14, 'Apedra', '', '../Assets/img/marca/apedra.png', 1);
INSERT INTO `marca` VALUES (15, 'Startech', '', '../Assets/img/marca/startech.png', 1);
INSERT INTO `marca` VALUES (16, 'Abker', '', '../Assets/img/marca/anker.png', 1);
INSERT INTO `marca` VALUES (17, 'Antryx', '', '../Assets/img/marca/antryx.png', 1);
INSERT INTO `marca` VALUES (18, 'Spedal', '', '../Assets/img/marca/spedal.jpg', 1);
INSERT INTO `marca` VALUES (19, 'SriHome', '', '../Assets/img/marca/srihome.jpg', 1);
INSERT INTO `marca` VALUES (20, 'asdad', 'asdas', 'asdd', 1);
INSERT INTO `marca` VALUES (21, 'ultimo', 'asdadas', '6.jpg', 0);

-- ----------------------------
-- Table structure for pedido
-- ----------------------------
DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido`  (
  `id_pedido` int(20) NOT NULL AUTO_INCREMENT,
  `fech_pedido` date NULL DEFAULT NULL,
  `id_cliente` int(8) NULL DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_pedido`) USING BTREE,
  INDEX `id_cliente`(`id_cliente`) USING BTREE,
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pedido
-- ----------------------------
INSERT INTO `pedido` VALUES (1, '2020-02-15', 3, 1);
INSERT INTO `pedido` VALUES (2, '2020-02-16', 2, 1);
INSERT INTO `pedido` VALUES (3, '2020-01-17', 3, 1);
INSERT INTO `pedido` VALUES (4, '2020-11-24', 4, 1);

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos`  (
  `id_prod` int(30) NOT NULL AUTO_INCREMENT,
  `nomb_prod` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `descrip_prod` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pven_prod` int(10) NULL DEFAULT NULL,
  `img_prod` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `stoc_prod` int(255) NULL DEFAULT NULL,
  `id_marc` int(4) NULL DEFAULT NULL,
  `id_subcat` int(4) NULL DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_prod`) USING BTREE,
  INDEX `id_marc`(`id_marc`) USING BTREE,
  INDEX `id_subcat`(`id_subcat`) USING BTREE,
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_marc`) REFERENCES `marca` (`id_marc`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_subcat`) REFERENCES `subcategoria` (`id_subcat`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of productos
-- ----------------------------
INSERT INTO `productos` VALUES (1, 'Apple AirPods con funda de carga', 'Encendido automático, conectado automáticamente. De fácil configur', 850, '../Assets/img/productos/airpods.jpg', 20, 5, 3, 1);
INSERT INTO `productos` VALUES (2, 'Audifonos bluetooth MuGo', 'Auriculares inalámbricos con Bluetooth y funda de carga de 3500 mAh, I', 100, '../Assets/img/productos/audifonos-inalamb-MuGo.jpg', 15, 1, 7, 1);
INSERT INTO `productos` VALUES (3, 'Audifonos Sony Premium', 'Auriculares estéreo con cancelación de ruido, ligeros, extra graves y funda ubicle.', 180, '../Assets/img/productos/audifono-sony.jpg', NULL, 7, 2, 1);
INSERT INTO `productos` VALUES (4, 'Audifonos Runmus', 'Auriculares de diadema para juegos con micrófono y luz LED para Xbox One (adaptador no incluido).', 105, '../Assets/img/productos/audifonos-rumnus.jpg', NULL, 12, 2, 1);
INSERT INTO `productos` VALUES (5, 'Billetera WP ETR-18 9408021', 'Billetera de Cuero color negro para mujer.', 280, '../Assets/img/productos/billetera-rc.jpg', 20, 5, 4, 1);
INSERT INTO `productos` VALUES (6, 'Billetera NAPA ILLUSION', 'BILLETERA WP1808 2009 E COL 14/NAPA ILLUSION RACING RED.                ', 230, '../Assets/img/productos/billetera-rc-2.jpg', 20, 5, 4, 1);
INSERT INTO `productos` VALUES (7, 'Billetera BURDOCK AUSTRAL', 'BILLETERA WP1602 MURDOCK AUSTRAL ROJO TIERRA.', 132, '../Assets/img/productos/billetera-rc-3.jpg', NULL, 4, 4, 1);
INSERT INTO `productos` VALUES (8, 'Cargador Portatil Marca Cafini D', 'CARGADOR PORTATIL DE 52000 mAh carga hasta 3 veces al 100 %compatible con cualquier celularmarca CAF', 60, '../Assets/img/productos/cargador-portatil-cafini.jpg', NULL, 13, 7, 1);
INSERT INTO `productos` VALUES (9, 'Cartera GG Marmont con cremaller', 'Cartera de piel matelassé rosa pastel con motivo chevron y GG en la parte trasera, con piezas metáli', 2119, '../Assets/img/productos/cartera-gucci-3.jpg', NULL, 5, 3, 1);
INSERT INTO `productos` VALUES (10, 'Bolso de Hombro GG Marmont Peque', 'Bolso de hombro GG Marmont pequeño con silueta estructurada y cierre de solapa extragrande con pieza', 7565, '../Assets/img/productos/cartera-gucci-1.jpg', NULL, 5, 3, 1);
INSERT INTO `productos` VALUES (11, 'Cargador Portatil SamSung', 'Samsung Power Bank 10.000mah Usb-c Carga Rapida - Eb-p1100.', 120, '../Assets/img/productos/cargador-portatil-samsung.jpg', NULL, 8, 7, 1);
INSERT INTO `productos` VALUES (12, 'Cargador Portatil Sony', 'Cargador Portatil', 150, '../Assets/img/productos/cargador-portatil-sony.jpg', 15, 5, 3, 1);
INSERT INTO `productos` VALUES (13, 'Minibolso Gucci Zumi de piel sua', 'El aplique se presenta en una combinación actual de tonos plateados y ', 15, '../Assets/img/productos/cartera-gucci-2.jpg', 15, 2, 5, 1);
INSERT INTO `productos` VALUES (14, 'NVIDIA', 'asda                        ', 15, '../Assets/img/productos/no-disponible.jpg', 20, 5, 7, 1);
INSERT INTO `productos` VALUES (15, 'prueba', 'editanto', 50, '../assets/img/productos/no-disponible.jpg', 3, 1, 1, 1);
INSERT INTO `productos` VALUES (16, 'prueba3', 'editando y cambiando de precio', 30, '../Assets/img/productos/no-disponible.jpg', 6, 1, 1, 1);

-- ----------------------------
-- Table structure for provincia
-- ----------------------------
DROP TABLE IF EXISTS `provincia`;
CREATE TABLE `provincia`  (
  `id_prov` int(4) NOT NULL AUTO_INCREMENT,
  `nomb_prov` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_dep` int(2) NULL DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_prov`) USING BTREE,
  INDEX `id_dep`(`id_dep`) USING BTREE,
  CONSTRAINT `provincia_ibfk_1` FOREIGN KEY (`id_dep`) REFERENCES `departamento` (`id_dep`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of provincia
-- ----------------------------
INSERT INTO `provincia` VALUES (1, 'Huaura', 1, 1);
INSERT INTO `provincia` VALUES (2, 'Huaral', 1, 1);
INSERT INTO `provincia` VALUES (3, 'Barranca', 1, 1);
INSERT INTO `provincia` VALUES (4, 'CaÃ±ete', 1, 1);
INSERT INTO `provincia` VALUES (5, 'Paramonga', 1, 1);
INSERT INTO `provincia` VALUES (6, 'Lima', 1, 1);

-- ----------------------------
-- Table structure for subcategoria
-- ----------------------------
DROP TABLE IF EXISTS `subcategoria`;
CREATE TABLE `subcategoria`  (
  `id_subcat` int(4) NOT NULL AUTO_INCREMENT,
  `nomb_subcat` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `descrip_subcat` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_cat` int(4) NULL DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_subcat`) USING BTREE,
  INDEX `id_cat`(`id_cat`) USING BTREE,
  CONSTRAINT `subcategoria_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of subcategoria
-- ----------------------------
INSERT INTO `subcategoria` VALUES (1, 'CÃ¡maras y fotografÃ­a', 'CÃ¡maras, tarjetas SD, kit de luces anillo y mÃ¡s.', 1, 1);
INSERT INTO `subcategoria` VALUES (2, 'Audifonos', 'Airpods, audifonos inalpambricos, audifonos gamer.', 1, 1);
INSERT INTO `subcategoria` VALUES (3, 'Carteras', 'Carteras de las mejores marcas y de calidad.', 2, 1);
INSERT INTO `subcategoria` VALUES (4, 'Billeteras', 'Billeteras de las mejores marcas y calidad.', 2, 1);
INSERT INTO `subcategoria` VALUES (5, 'Calzado', 'Zapatos, zapatillas de todas las mejores marcas.', 3, 1);
INSERT INTO `subcategoria` VALUES (6, 'Billeteras2', 'Billeteras de las mejores marcas y calidad.', 3, 1);
INSERT INTO `subcategoria` VALUES (7, 'Accesorios para computadora', 'Hubs usb, mouse, teclado, webcams, etc.', 1, 1);
INSERT INTO `subcategoria` VALUES (8, 'prueba', 'casa', 2, 1);

-- ----------------------------
-- Table structure for ubigeo
-- ----------------------------
DROP TABLE IF EXISTS `ubigeo`;
CREATE TABLE `ubigeo`  (
  `id_ubigeo` int(10) NOT NULL AUTO_INCREMENT,
  `direc_ubigeo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mzlote_ubigeo` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `num_ubigeo` int(255) NOT NULL,
  `piso_ubigeo` int(255) NULL DEFAULT NULL,
  `referen_ubigeo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cpostal_ubigeo` int(255) NOT NULL,
  `id_distrito` int(10) NULL DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_ubigeo`) USING BTREE,
  INDEX `id_distrito`(`id_distrito`) USING BTREE,
  CONSTRAINT `ubigeo_ibfk_1` FOREIGN KEY (`id_distrito`) REFERENCES `distrito` (`id_distrito`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ubigeo
-- ----------------------------
INSERT INTO `ubigeo` VALUES (1, 'Av. Las FLores 725', 'A-Lt.1', 15138, 1, 'Frente a la cevichera El ClÃ¡sico 2', 754325, 1, 1);
INSERT INTO `ubigeo` VALUES (2, 'Av. Los Girasoles 228', 'r-Lt.15', 15115, 1, 'Frente a la Universidad Alas Peruanas', 836542, 2, 1);
INSERT INTO `ubigeo` VALUES (3, 'Psj. Los Robles 523', 'Mz. H - Lote 2', 18355, 1, 'Cerca de supermercado Metro', 15641, 9, 1);

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `rol` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, 'admin', 'admin', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Administrador', 1);
INSERT INTO `usuarios` VALUES (2, 'naju', 'naju', 'naju@gmail.com', '3b4bb6dc4b5cd4785cede954ed18246fee7429e8cb77e2179e632a2651b52f52', 'Vendedor', 1);
INSERT INTO `usuarios` VALUES (3, 'jairo', 'estudiante', 'asda@gamil.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Administrador', 1);

SET FOREIGN_KEY_CHECKS = 1;
