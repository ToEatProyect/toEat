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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;