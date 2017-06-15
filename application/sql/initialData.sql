USE toeat_db;

-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2017 a las 20:21:36
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `toeat_db`
--

--
-- Volcado de datos para la tabla `categorization`
--

INSERT INTO `categorization` (`id`, `name`, `slug`, `parent_category`) VALUES
  (1, 'Recetas de...', 'recetas-de...', NULL),
  (2, 'Postres y dulces', 'postres-y-dulces', '1'),
  (3, 'Arroz', 'arroz', '1'),
  (4, 'Tapas y aperitivos', 'tapas-y-aperitivos', '1'),
  (5, 'Patatas, salsas y guarniciones', 'patatas-salsas-y-guarniciones', '1'),
  (6, 'Pescado y marisco', 'pescado-y-marisco', '1'),
  (7, 'Pasta', 'pasta', '1'),
  (8, 'Sopas, guisos y legumbres', 'sopas-guisos-y-legumbres', '1'),
  (9, 'Ensaladas y verduras', 'ensaladas-y-verduras', '1'),
  (10, 'Pollo y otras carnes', 'pollo-y-otras-carnes', '1'),
  (11, 'Masas y rebozados', 'masas-y-rebozados', '1'),
  (12, 'Bebidas, cócteles y licores', 'bebidas-cocteles-y-licores', '1'),
  (13, 'Momento del día', 'momento-del-dia', NULL),
  (14, 'Desayuno', 'desayuno', '13'),
  (15, 'Merienda', 'merienda', '13'),
  (16, 'Comida', 'comida', '13'),
  (17, 'Cena', 'cena', '13');

--
-- Volcado de datos para la tabla `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `slug`) VALUES
  (1, 'Aceite de soja', 'aceite-de-soja'),
  (2, 'Aceite de maiz', 'aceite-de-maiz'),
  (3, 'Aceite de oliva', 'aceite-de-oliva'),
  (4, 'Nata', 'nata'),
  (5, 'Crema de leche', 'crema-de-leche'),
  (6, 'Yogur', 'yogur'),
  (7, 'Leche', 'leche'),
  (8, 'Helado', 'helado'),
  (9, 'Queso', 'queso'),
  (10, 'Cuajada', 'cuajada'),
  (11, 'Setas', 'setas'),
  (12, 'Hongos', 'hongos'),
  (13, 'Coles', 'coles'),
  (14, 'Alubias', 'alubias'),
  (15, 'Garbanzos', 'garbanzos'),
  (16, 'Lentejas', 'lentejas'),
  (17, 'Soja', 'soja'),
  (18, 'Pimientas', 'pimientas'),
  (19, 'Patata', 'patata'),
  (20, 'Lechugas', 'lechugas'),
  (21, 'Acelga', 'acelga'),
  (22, 'Alcachofa', 'alcachofa'),
  (23, 'Batata', 'batata'),
  (24, 'Berenjena', 'berenjena'),
  (25, 'Berro', 'berro'),
  (26, 'Brócoli', 'brocoli'),
  (27, 'Calabacín', 'calabacin'),
  (28, 'Brecol', 'brecol'),
  (29, 'Calabaza', 'calabaza'),
  (30, 'Cardo', 'cardo'),
  (31, 'Cebolla', 'cebolla'),
  (32, 'Cebolleta', 'cebolleta'),
  (33, 'Coles de Bruselas', 'coles-de-bruselas'),
  (34, 'Colifror', 'colifror'),
  (35, 'Endivia', 'endivia'),
  (36, 'Tomate', 'tomate'),
  (37, 'Zanahoria', 'zanahoria'),
  (38, 'Escarola', 'escarola'),
  (39, 'Espárrago', 'esparrago'),
  (40, 'Espinaca', 'espinaca'),
  (41, 'Guisante', 'guisante'),
  (42, 'Habas', 'habas'),
  (43, 'Hinojo', 'hinojo'),
  (44, 'Judías', 'judias'),
  (45, 'Maíz', 'maiz'),
  (46, 'Palmito', 'palmito'),
  (47, 'Pepino', 'pepino'),
  (48, 'Remolacha', 'remolacha'),
  (49, 'Pimiento', 'pimiento'),
  (50, 'Puerro', 'puerro');

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `name`, `auth_level`, `banned`, `passwd`, `passwd_recovery_code`, `passwd_recovery_date`, `passwd_modified_at`, `last_login`, `created_at`, `modified_at`) VALUES
  (73542321, 'register1', 'register1@gmail.com', 'register1', 1, '0', '$2y$11$seyfC0t8U5yErmbqdJsURuXkl5fCUe6TojyFiGSTXEU/wdyPWqwwu', NULL, NULL, NULL, NULL, '2017-06-14 20:12:35', '2017-06-14 18:12:35'),
  (716165383, 'collaborator2', 'collaborator2@gmail.com', 'collaborator2', 3, '0', '$2y$11$FG27wgCir0Gt6LVyU2xSxOa3sNQhvna7FY4DzHWlKKC1wERja1Ouq', NULL, NULL, NULL, NULL, '2017-06-14 20:12:05', '2017-06-14 18:13:39'),
  (885827396, 'moderator2', 'moderator2@gmail.com', 'moderator', 6, '0', '$2y$11$JFkoeLX7KuIvpvUSZiX/te2Pw7ktL8WWtwYzAjmtjVEVafU8o1Jh6', NULL, NULL, NULL, NULL, '2017-06-14 20:11:13', '2017-06-14 18:13:45'),
  (1702716028, 'register2', 'register2@gmail.com', 'register2', 1, '0', '$2y$11$N0AntQfz4rkzq1g3PR9q9ONrzVxTwkjftqMEwekG0Ay8cSAr2Yi0y', NULL, NULL, NULL, NULL, '2017-06-14 20:12:52', '2017-06-14 18:12:52'),
  (2009485070, 'collaborator1', 'collaborator1@gmail.com', 'collaborator1', 3, '0', '$2y$11$JgTvDYVCoxSEDYvNPlQEe.WDXlb0DEB.lhdb8bqxBP9qs4.ccLsHW', NULL, NULL, NULL, NULL, '2017-06-14 20:11:47', '2017-06-14 18:14:05'),
  (2147484848, 'moderator1', 'moderator1@gmail.com', 'moderador', 6, '0', '$2y$11$0Ra6vQfI61lZsm/Yw1OPVuspOPeENiAW1MQr0FBHLbvNh6iaZ5AjG', NULL, NULL, NULL, NULL, '2017-06-14 20:10:42', '2017-06-14 18:14:02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;