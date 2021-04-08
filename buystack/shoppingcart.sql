-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-02-2021 a las 18:43:27
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `shoppingcart`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `idarticulo` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion` varchar(400) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT 1,
  `precio` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`idarticulo`, `idcategoria`, `codigo`, `nombre`, `stock`, `descripcion`, `imagen`, `condicion`, `precio`) VALUES
(1, 1, '123', 'Laptop Lenovo', 77, 'Latop de gama alta core i5', '1611685127.jpg', 1, '1699.99'),
(2, 1, '124', 'Laptop Asus', 90, 'Laptop asus gama alta para videojuegos', '1611685347.jpg', 1, '1999.99'),
(3, 2, '1201', 'Camara r5 Canon', 150, 'Camara r5 full frame sin espejos grabación de video 8k a 120fps', '1611686197.jpg', 1, '2999.99'),
(5, 1, '125', 'Laptop HP', 100, 'Laptop HP corei5 GTX 1650 6gbram 256SSD', '1613054735.jpg', 1, '2299.99'),
(6, 1, '126', 'Laptop Acer', 100, 'Laptop corei7 GTX 1660 16gb ram 512SSD', '1613054134.jpg', 1, '2799.99'),
(7, 1, '127', 'Laptop Asus 2', 97, 'Laptop corei7 GTX 1660 16gb ram 256SSD', '1613054093.jpg', 1, '2599.99'),
(8, 3, '2002', 'Xiaomi mi 11', 46, 'Con el procesador Snapdragon 888 de Qualcomm', '1613055084.jpg', 1, '2999.99'),
(9, 1, '128', 'Laptop gamer asus', 100, 'Laptop corei5 GTX 1650 8gb ram 512SSD', '1613055248.jpg', 1, '2399.99'),
(10, 3, '2003', 'Asus rog phone 3', 50, 'Con el procesador Snapdragon 865+ de Qualcomm con 16gb ram', '1613055948.jpg', 1, '2799.99'),
(11, 3, '2004', 'Samsung Galaxy S20', 50, 'Con el procesador Exynos 990.', '1613055982.jpg', 1, '2799.99'),
(12, 3, '2005', 'Asus Zenfone 7 Pro', 50, 'Con el procesador Snapdragon 865.', '1613056118.jpg', 1, '2799.99'),
(13, 3, '2006', 'Huawei Mate 40 Pro', 50, 'Con el procesador Kirin 9000', '1613056553.jpg', 1, '2699.99'),
(14, 3, '2007', 'HiSense KinKong 6', 75, 'Con capacidad 5,510 mAh.', '1613056689.jpeg', 1, '2759.99'),
(15, 2, '1202', 'Canon Combo 51', 75, 'Cámara estándar de Canon mediana', '1613056898.jpg', 1, '1499.99'),
(16, 2, '1203', 'Nikon Oficial Z 50', 65, 'Cámara estándar de nikon mediana.', '1613057039.jpg', 1, '1699.99'),
(17, 2, '1204', 'Canon Cámara de Video', 55, 'Cámara de video estándar de Canon', '1613057126.jpg', 1, '1999.99'),
(18, 2, '1205', 'Cámara de video XA-45', 50, 'Videocámara XA-45 de Canon.', '1613057304.jpg', 1, '2299.99'),
(19, 2, '1206', 'Cámara de video HF-W11', 95, 'Videocámara HF-W11 de Canon.', '1613057429.jpg', 1, '1699.99'),
(20, 4, '5001', 'XBlade Mouse Elite Calamity', 200, 'GXB-MG590 RGB 6400 dpi', '1613057716.jpg', 1, '89.99'),
(21, 4, '50002', 'Blue Yeti Nano', 100, 'Especial calidad radiofónico de Blue.', '1613057844.jpg', 1, '499.99'),
(22, 4, '5003', 'Audifono Gamer Hammer Azul', 50, 'Con frecuencia de 20.000Hz como máximo', '1613058022.jpg', 1, '259.99'),
(23, 4, '5004', 'Kit Gamer 3 en 1', 50, 'Pad Gamer de promocion especial.', '1613058124.jpg', 1, '99.99'),
(24, 4, '5005', 'Logitech K380', 50, 'Multidispositivo de color blanco con bluetooth', '1613058244.jpg', 1, '319.99'),
(25, 4, '5006', 'Teclado Gaming', 65, 'Teclado mecánico con luces LED', '1613058355.jpg', 1, '399.99');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `descripcion`, `condicion`) VALUES
(1, 'laptops', 'Laptops de primera calidad.', 1),
(2, 'camaras', 'Cámaras de alto nivel de grabación. ', 1),
(3, 'smartphones', 'Las mejores marcas en smartphones.', 1),
(4, 'accesorios', 'Todo tipo de accesorio tecnológico para gamers y profesionales.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `iddetalle_venta` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`iddetalle_venta`, `idventa`, `idarticulo`, `cantidad`, `precio_venta`) VALUES
(1, 245, 2, 1, '1999.99');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cargo` varchar(20) DEFAULT NULL,
  `login` varchar(20) NOT NULL,
  `clave` varchar(64) DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT 1,
  `apellidos` varchar(100) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `codigo_postal` varchar(20) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `direccion`, `telefono`, `email`, `cargo`, `login`, `clave`, `condicion`, `apellidos`, `pais`, `codigo_postal`, `ciudad`, `imagen`) VALUES
(1, 'Joan', 'Jr. Necochea 280', '999555217', 'remnyachizot2015@gmail.com', 'cliente', 'Joan', '4fc0b3354106bf2c38a62bf9503acae9d4d03e84b4a3c5a83b60931693a24298', 1, 'Roca Hormaza', 'Perú', '12006', 'Huancayo', '1612716728.png'),
(2, 'JoanJose', 'Jr. Necochea 280', '985868674', 'joanjose_04@hotmail.com', 'administrador', 'JoanJose', 'e0281b9dceed1a31230382f596f05d03ba78532713a48412ffb17b381e459b3b', 1, 'Roca Hormaza', 'Perú', '12006', 'Huancayo', 'default.png'),
(3, 'Mariza', 'Av. Aviación 280', '999555218', 'maestra@gmail.com', 'cliente', 'Mariza', '1d60d46c36a1b7f58e26c01b95091739604b7e79f5050b9c7e5cec7a04666063', 1, 'De la Cuz', 'Perú', '11007', 'Callao', 'default.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `clavetransaccion` varchar(200) DEFAULT NULL,
  `paypaldatos` text DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `total_compra` decimal(11,2) DEFAULT NULL,
  `condicion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idventa`, `idusuario`, `clavetransaccion`, `paypaldatos`, `fecha_hora`, `total_compra`, `condicion`) VALUES
(240, 1, 'bi2dga1q0565u8ud67i54vl5em', '{\"id\":\"PAYID-MASWC3A0LY98803YF417282J\",\"intent\":\"sale\",\"state\":\"approved\",\"cart\":\"8TR14388D6792011P\",\"payer\":{\"payment_method\":\"paypal\",\"status\":\"VERIFIED\",\"payer_info\":{\"email\":\"sb-qkz8b5062302@business.example.com\",\"first_name\":\"John\",\"last_name\":\"Doe\",\"payer_id\":\"P5LKJQU3WMSKS\",\"shipping_address\":{\"recipient_name\":\"John Doe\",\"line1\":\"Free Trade Zone\",\"city\":\"Lima\",\"state\":\"Lima\",\"postal_code\":\"07001\",\"country_code\":\"PE\"},\"phone\":\"5158655025\",\"country_code\":\"PE\",\"business_name\":\"John Doe Test Store\"}},\"transactions\":[{\"amount\":{\"total\":\"1728.00\",\"currency\":\"USD\",\"details\":{\"subtotal\":\"1728.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payee\":{\"merchant_id\":\"CKEJH6TK94C76\",\"email\":\"sb-bw3p75060743@personal.example.com\"},\"description\":\"Compra de productos a BuyStack: 1,727.99\",\"custom\":\"bi2dga1q0565u8ud67i54vl5em#ckybtMmjBaqoijIJfFRsnA==\",\"item_list\":{\"shipping_address\":{\"recipient_name\":\"John Doe\",\"line1\":\"Free Trade Zone\",\"city\":\"Lima\",\"state\":\"Lima\",\"postal_code\":\"07001\",\"country_code\":\"PE\"}},\"related_resources\":[{\"sale\":{\"id\":\"3Y6419934C200124K\",\"state\":\"completed\",\"amount\":{\"total\":\"1728.00\",\"currency\":\"USD\",\"details\":{\"subtotal\":\"1728.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payment_mode\":\"INSTANT_TRANSFER\",\"protection_eligibility\":\"ELIGIBLE\",\"protection_eligibility_type\":\"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\"transaction_fee\":{\"value\":\"93.61\",\"currency\":\"USD\"},\"parent_payment\":\"PAYID-MASWC3A0LY98803YF417282J\",\"create_time\":\"2021-02-11T16:55:21Z\",\"update_time\":\"2021-02-11T16:55:21Z\",\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v1/payments/sale/3Y6419934C200124K\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https://api.sandbox.paypal.com/v1/payments/sale/3Y6419934C200124K/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https://api.sandbox.paypal.com/v1/payments/payment/PAYID-MASWC3A0LY98803YF417282J\",\"rel\":\"parent_payment\",\"method\":\"GET\"}]}}]}],\"create_time\":\"2021-02-11T16:55:08Z\",\"update_time\":\"2021-02-11T16:55:21Z\",\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v1/payments/payment/PAYID-MASWC3A0LY98803YF417282J\",\"rel\":\"self\",\"method\":\"GET\"}]}', '2021-02-11 11:54:59', '6399.97', 'aprovado'),
(241, 1, 'bi2dga1q0565u8ud67i54vl5em', '{\"id\":\"PAYID-MASWPWY4BG73124AF814445L\",\"intent\":\"sale\",\"state\":\"approved\",\"cart\":\"6BF588004M940463T\",\"payer\":{\"payment_method\":\"paypal\",\"status\":\"VERIFIED\",\"payer_info\":{\"email\":\"sb-qkz8b5062302@business.example.com\",\"first_name\":\"John\",\"last_name\":\"Doe\",\"payer_id\":\"P5LKJQU3WMSKS\",\"shipping_address\":{\"recipient_name\":\"John Doe\",\"line1\":\"Free Trade Zone\",\"city\":\"Lima\",\"state\":\"Lima\",\"postal_code\":\"07001\",\"country_code\":\"PE\"},\"phone\":\"5158655025\",\"country_code\":\"PE\",\"business_name\":\"John Doe Test Store\"}},\"transactions\":[{\"amount\":{\"total\":\"459.00\",\"currency\":\"USD\",\"details\":{\"subtotal\":\"459.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payee\":{\"merchant_id\":\"CKEJH6TK94C76\",\"email\":\"sb-bw3p75060743@personal.example.com\"},\"description\":\"Compra de productos a BuyStack: 459.00\",\"custom\":\"bi2dga1q0565u8ud67i54vl5em#I1cc6+J4/3ddqNgK/mZGyw==\",\"item_list\":{\"shipping_address\":{\"recipient_name\":\"John Doe\",\"line1\":\"Free Trade Zone\",\"city\":\"Lima\",\"state\":\"Lima\",\"postal_code\":\"07001\",\"country_code\":\"PE\"}},\"related_resources\":[{\"sale\":{\"id\":\"73H069257A515753C\",\"state\":\"completed\",\"amount\":{\"total\":\"459.00\",\"currency\":\"USD\",\"details\":{\"subtotal\":\"459.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payment_mode\":\"INSTANT_TRANSFER\",\"protection_eligibility\":\"ELIGIBLE\",\"protection_eligibility_type\":\"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\"transaction_fee\":{\"value\":\"25.09\",\"currency\":\"USD\"},\"parent_payment\":\"PAYID-MASWPWY4BG73124AF814445L\",\"create_time\":\"2021-02-11T17:22:58Z\",\"update_time\":\"2021-02-11T17:22:58Z\",\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v1/payments/sale/73H069257A515753C\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https://api.sandbox.paypal.com/v1/payments/sale/73H069257A515753C/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https://api.sandbox.paypal.com/v1/payments/payment/PAYID-MASWPWY4BG73124AF814445L\",\"rel\":\"parent_payment\",\"method\":\"GET\"}]}}]}],\"create_time\":\"2021-02-11T17:22:35Z\",\"update_time\":\"2021-02-11T17:22:58Z\",\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v1/payments/payment/PAYID-MASWPWY4BG73124AF814445L\",\"rel\":\"self\",\"method\":\"GET\"}]}', '2021-02-11 12:22:30', '1699.99', 'aprovado'),
(242, 1, 'bi2dga1q0565u8ud67i54vl5em', '{\"id\":\"PAYID-MASWQ4I9C425644SC148854T\",\"intent\":\"sale\",\"state\":\"approved\",\"cart\":\"9B873621513733431\",\"payer\":{\"payment_method\":\"paypal\",\"status\":\"VERIFIED\",\"payer_info\":{\"email\":\"sb-qkz8b5062302@business.example.com\",\"first_name\":\"John\",\"last_name\":\"Doe\",\"payer_id\":\"P5LKJQU3WMSKS\",\"shipping_address\":{\"recipient_name\":\"John Doe\",\"line1\":\"Free Trade Zone\",\"city\":\"Lima\",\"state\":\"Lima\",\"postal_code\":\"07001\",\"country_code\":\"PE\"},\"phone\":\"5158655025\",\"country_code\":\"PE\",\"business_name\":\"John Doe Test Store\"}},\"transactions\":[{\"amount\":{\"total\":\"540.00\",\"currency\":\"USD\",\"details\":{\"subtotal\":\"540.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payee\":{\"merchant_id\":\"CKEJH6TK94C76\",\"email\":\"sb-bw3p75060743@personal.example.com\"},\"description\":\"Compra de productos a BuyStack: 540.00\",\"custom\":\"bi2dga1q0565u8ud67i54vl5em#DquSjgCJJOHFDol9I3naMg==\",\"item_list\":{\"shipping_address\":{\"recipient_name\":\"John Doe\",\"line1\":\"Free Trade Zone\",\"city\":\"Lima\",\"state\":\"Lima\",\"postal_code\":\"07001\",\"country_code\":\"PE\"}},\"related_resources\":[{\"sale\":{\"id\":\"65649504PR465650E\",\"state\":\"completed\",\"amount\":{\"total\":\"540.00\",\"currency\":\"USD\",\"details\":{\"subtotal\":\"540.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payment_mode\":\"INSTANT_TRANSFER\",\"protection_eligibility\":\"ELIGIBLE\",\"protection_eligibility_type\":\"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\"transaction_fee\":{\"value\":\"29.46\",\"currency\":\"USD\"},\"parent_payment\":\"PAYID-MASWQ4I9C425644SC148854T\",\"create_time\":\"2021-02-11T17:25:18Z\",\"update_time\":\"2021-02-11T17:25:18Z\",\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v1/payments/sale/65649504PR465650E\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https://api.sandbox.paypal.com/v1/payments/sale/65649504PR465650E/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https://api.sandbox.paypal.com/v1/payments/payment/PAYID-MASWQ4I9C425644SC148854T\",\"rel\":\"parent_payment\",\"method\":\"GET\"}]}}]}],\"create_time\":\"2021-02-11T17:25:05Z\",\"update_time\":\"2021-02-11T17:25:18Z\",\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v1/payments/payment/PAYID-MASWQ4I9C425644SC148854T\",\"rel\":\"self\",\"method\":\"GET\"}]}', '2021-02-11 12:24:58', '1999.99', 'aprovado'),
(243, 1, 'bi2dga1q0565u8ud67i54vl5em', '{\"id\":\"PAYID-MASWSPA87V385696B374253D\",\"intent\":\"sale\",\"state\":\"approved\",\"cart\":\"13X07076RL7849535\",\"payer\":{\"payment_method\":\"paypal\",\"status\":\"VERIFIED\",\"payer_info\":{\"email\":\"sb-qkz8b5062302@business.example.com\",\"first_name\":\"John\",\"last_name\":\"Doe\",\"payer_id\":\"P5LKJQU3WMSKS\",\"shipping_address\":{\"recipient_name\":\"John Doe\",\"line1\":\"Free Trade Zone\",\"city\":\"Lima\",\"state\":\"Lima\",\"postal_code\":\"07001\",\"country_code\":\"PE\"},\"phone\":\"5158655025\",\"country_code\":\"PE\",\"business_name\":\"John Doe Test Store\"}},\"transactions\":[{\"amount\":{\"total\":\"810.00\",\"currency\":\"USD\",\"details\":{\"subtotal\":\"810.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payee\":{\"merchant_id\":\"CKEJH6TK94C76\",\"email\":\"sb-bw3p75060743@personal.example.com\"},\"description\":\"Compra de productos a BuyStack: 810.00\",\"custom\":\"bi2dga1q0565u8ud67i54vl5em#JQzGjgZKL7OBgPIfESQ8Bg==\",\"item_list\":{\"shipping_address\":{\"recipient_name\":\"John Doe\",\"line1\":\"Free Trade Zone\",\"city\":\"Lima\",\"state\":\"Lima\",\"postal_code\":\"07001\",\"country_code\":\"PE\"}},\"related_resources\":[{\"sale\":{\"id\":\"7MA76134TB8771912\",\"state\":\"completed\",\"amount\":{\"total\":\"810.00\",\"currency\":\"USD\",\"details\":{\"subtotal\":\"810.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payment_mode\":\"INSTANT_TRANSFER\",\"protection_eligibility\":\"ELIGIBLE\",\"protection_eligibility_type\":\"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\"transaction_fee\":{\"value\":\"44.04\",\"currency\":\"USD\"},\"parent_payment\":\"PAYID-MASWSPA87V385696B374253D\",\"create_time\":\"2021-02-11T17:28:41Z\",\"update_time\":\"2021-02-11T17:28:41Z\",\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v1/payments/sale/7MA76134TB8771912\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https://api.sandbox.paypal.com/v1/payments/sale/7MA76134TB8771912/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https://api.sandbox.paypal.com/v1/payments/payment/PAYID-MASWSPA87V385696B374253D\",\"rel\":\"parent_payment\",\"method\":\"GET\"}]}}]}],\"create_time\":\"2021-02-11T17:28:28Z\",\"update_time\":\"2021-02-11T17:28:41Z\",\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v1/payments/payment/PAYID-MASWSPA87V385696B374253D\",\"rel\":\"self\",\"method\":\"GET\"}]}', '2021-02-11 12:28:24', '2999.99', 'aprovado'),
(244, 1, 'bi2dga1q0565u8ud67i54vl5em', '{\"id\":\"PAYID-MASWTVQ5SH93091F7643250A\",\"intent\":\"sale\",\"state\":\"approved\",\"cart\":\"83054052L1848360E\",\"payer\":{\"payment_method\":\"paypal\",\"status\":\"VERIFIED\",\"payer_info\":{\"email\":\"sb-qkz8b5062302@business.example.com\",\"first_name\":\"John\",\"last_name\":\"Doe\",\"payer_id\":\"P5LKJQU3WMSKS\",\"shipping_address\":{\"recipient_name\":\"John Doe\",\"line1\":\"Free Trade Zone\",\"city\":\"Lima\",\"state\":\"Lima\",\"postal_code\":\"07001\",\"country_code\":\"PE\"},\"phone\":\"5158655025\",\"country_code\":\"PE\",\"business_name\":\"John Doe Test Store\"}},\"transactions\":[{\"amount\":{\"total\":\"810.00\",\"currency\":\"USD\",\"details\":{\"subtotal\":\"810.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payee\":{\"merchant_id\":\"CKEJH6TK94C76\",\"email\":\"sb-bw3p75060743@personal.example.com\"},\"description\":\"Compra de productos a BuyStack: 810.00\",\"custom\":\"bi2dga1q0565u8ud67i54vl5em#W2SwQ9qsWus5+by6qgoyqw==\",\"item_list\":{\"shipping_address\":{\"recipient_name\":\"John Doe\",\"line1\":\"Free Trade Zone\",\"city\":\"Lima\",\"state\":\"Lima\",\"postal_code\":\"07001\",\"country_code\":\"PE\"}},\"related_resources\":[{\"sale\":{\"id\":\"4HA012965K645390S\",\"state\":\"completed\",\"amount\":{\"total\":\"810.00\",\"currency\":\"USD\",\"details\":{\"subtotal\":\"810.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payment_mode\":\"INSTANT_TRANSFER\",\"protection_eligibility\":\"ELIGIBLE\",\"protection_eligibility_type\":\"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\"transaction_fee\":{\"value\":\"44.04\",\"currency\":\"USD\"},\"parent_payment\":\"PAYID-MASWTVQ5SH93091F7643250A\",\"create_time\":\"2021-02-11T17:31:14Z\",\"update_time\":\"2021-02-11T17:31:14Z\",\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v1/payments/sale/4HA012965K645390S\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https://api.sandbox.paypal.com/v1/payments/sale/4HA012965K645390S/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https://api.sandbox.paypal.com/v1/payments/payment/PAYID-MASWTVQ5SH93091F7643250A\",\"rel\":\"parent_payment\",\"method\":\"GET\"}]}}]}],\"create_time\":\"2021-02-11T17:31:02Z\",\"update_time\":\"2021-02-11T17:31:14Z\",\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v1/payments/payment/PAYID-MASWTVQ5SH93091F7643250A\",\"rel\":\"self\",\"method\":\"GET\"}]}', '2021-02-11 12:30:59', '2999.99', 'aprovado'),
(245, 1, 'bi2dga1q0565u8ud67i54vl5em', '{\"id\":\"PAYID-MASWYQQ7GC54363GL8586823\",\"intent\":\"sale\",\"state\":\"approved\",\"cart\":\"17M17246LR390042X\",\"payer\":{\"payment_method\":\"paypal\",\"status\":\"VERIFIED\",\"payer_info\":{\"email\":\"sb-qkz8b5062302@business.example.com\",\"first_name\":\"John\",\"last_name\":\"Doe\",\"payer_id\":\"P5LKJQU3WMSKS\",\"shipping_address\":{\"recipient_name\":\"John Doe\",\"line1\":\"Free Trade Zone\",\"city\":\"Lima\",\"state\":\"Lima\",\"postal_code\":\"07001\",\"country_code\":\"PE\"},\"phone\":\"5158655025\",\"country_code\":\"PE\",\"business_name\":\"John Doe Test Store\"}},\"transactions\":[{\"amount\":{\"total\":\"540.00\",\"currency\":\"USD\",\"details\":{\"subtotal\":\"540.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payee\":{\"merchant_id\":\"CKEJH6TK94C76\",\"email\":\"sb-bw3p75060743@personal.example.com\"},\"description\":\"Compra de productos a BuyStack: 540.00\",\"custom\":\"bi2dga1q0565u8ud67i54vl5em#+fHIdTt+yUz7oJPwztf2tA==\",\"item_list\":{\"shipping_address\":{\"recipient_name\":\"John Doe\",\"line1\":\"Free Trade Zone\",\"city\":\"Lima\",\"state\":\"Lima\",\"postal_code\":\"07001\",\"country_code\":\"PE\"}},\"related_resources\":[{\"sale\":{\"id\":\"3XH56198SG1368319\",\"state\":\"completed\",\"amount\":{\"total\":\"540.00\",\"currency\":\"USD\",\"details\":{\"subtotal\":\"540.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payment_mode\":\"INSTANT_TRANSFER\",\"protection_eligibility\":\"ELIGIBLE\",\"protection_eligibility_type\":\"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\"transaction_fee\":{\"value\":\"29.46\",\"currency\":\"USD\"},\"parent_payment\":\"PAYID-MASWYQQ7GC54363GL8586823\",\"create_time\":\"2021-02-11T17:41:39Z\",\"update_time\":\"2021-02-11T17:41:39Z\",\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v1/payments/sale/3XH56198SG1368319\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https://api.sandbox.paypal.com/v1/payments/sale/3XH56198SG1368319/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https://api.sandbox.paypal.com/v1/payments/payment/PAYID-MASWYQQ7GC54363GL8586823\",\"rel\":\"parent_payment\",\"method\":\"GET\"}]}}]}],\"create_time\":\"2021-02-11T17:41:22Z\",\"update_time\":\"2021-02-11T17:41:39Z\",\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v1/payments/payment/PAYID-MASWYQQ7GC54363GL8586823\",\"rel\":\"self\",\"method\":\"GET\"}]}', '2021-02-11 12:41:17', '1999.99', 'aprovado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`idarticulo`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  ADD KEY `fk_articulo_categoria_idx` (`idcategoria`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`iddetalle_venta`),
  ADD KEY `fk_detalle_ingreso_ingreso_idx` (`idventa`),
  ADD KEY `fk_detalle_ingreso_articulo_idx` (`idarticulo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `fk_ingreso_usuario_idx` (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `idarticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `iddetalle_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `fk_articulo_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `fk_detalle_ingreso_articulo` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_ingreso_venta` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_ingreso_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
