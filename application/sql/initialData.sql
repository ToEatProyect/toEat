USE toeat_db;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;