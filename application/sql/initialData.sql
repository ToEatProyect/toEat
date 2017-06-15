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
  (808873978, 'collaborator3', 'collaborator3@gmail.com', 'collaborator3', 3, '0', '$2y$11$SSg1Y6shoOHHzfZineeUJ.PR3P4SOApGdrIHbPig1ibOwnopyU.Pe', NULL, NULL, NULL, NULL, '2017-06-16 00:25:03', '0000-00-00 00:00:00'),
  (885827396, 'moderator2', 'moderator2@gmail.com', 'moderator', 6, '0', '$2y$11$JFkoeLX7KuIvpvUSZiX/te2Pw7ktL8WWtwYzAjmtjVEVafU8o1Jh6', NULL, NULL, NULL, NULL, '2017-06-14 20:11:13', '2017-06-14 18:13:45'),
  (1702716028, 'register2', 'register2@gmail.com', 'register2', 1, '0', '$2y$11$N0AntQfz4rkzq1g3PR9q9ONrzVxTwkjftqMEwekG0Ay8cSAr2Yi0y', NULL, NULL, NULL, NULL, '2017-06-14 20:12:52', '2017-06-14 18:12:52'),
  (2009485070, 'collaborator1', 'collaborator1@gmail.com', 'collaborator1', 3, '0', '$2y$11$JgTvDYVCoxSEDYvNPlQEe.WDXlb0DEB.lhdb8bqxBP9qs4.ccLsHW', NULL, NULL, NULL, NULL, '2017-06-14 20:11:47', '2017-06-14 18:14:05'),
  (2147484848, 'moderator1', 'moderator1@gmail.com', 'moderador', 6, '0', '$2y$11$0Ra6vQfI61lZsm/Yw1OPVuspOPeENiAW1MQr0FBHLbvNh6iaZ5AjG', NULL, NULL, NULL, NULL, '2017-06-14 20:10:42', '2017-06-14 18:14:02');


--
-- Volcado de datos para la tabla `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `id_owner`, `slug`, `description`, `cooking_time`, `created_at`, `lastModDate`, `image`, `published`) VALUES
  (1, 'Pan con tomate y jamón serrano', 2009485070, 'pan-con-tomate-y-jamon-serrano', 'En Cataluña, en España, se le conoce como el famoso pan tumaca con jamón serrano, pero para el resto del mundo es el pan con tomate, un desayuno muy característico dentro de la dieta mediterránea y que forma parte de la tradición de este país.<br />\r\n<br />\r\nEl pan con tomate y jamón es un desayuno delicioso y aunque no lo creas, también es bastante saludable. Hidratos de carbono, ácidos grasos monoinsaturados y carotenos, esto es lo que conseguiremos con la mezcla de pan, aceite y tomate, perfecto para ganar energía para empezar el día.', 10, '2017-06-16 00:32:06', '2017-06-16 00:32:06', 'img-recipe-1.jpg', 1),
  (2, 'Sopa de papa con espinaca', 2009485070, 'sopa-de-papa-con-espinaca', 'La sopa de papa con espinaca que mostramos a continuación no solo es un plato completo y nutritivo, sino que además está delicioso. La papa es un alimento utilizado en diferentes tipos de platillos, y es que se puede cocinar horneada, frita, asada, hervida, etc., gracias a su versatilidad y suave sabor. Así mismo, puede ser utilizada tanto como platillo principal como guarnición dependiendo del menú en el que se presente.', 25, '2017-06-16 00:35:10', '2017-06-16 00:35:10', 'img-recipe-2.jpg', 1),
  (3, 'Secreto ibérico al horno', 2009485070, 'secreto-iberico-al-horno', 'El secreto ibérico de cerdo es un corte de carne de cerdo muy preciado por ser una carne muy jugosa y con un sabor particular. Esta pieza se obtiene de una zona situada en la “axila” del cerdo, entre la paletilla y la panceta y, según algunos, el nombre de \"secreto\" se debe a que era ta preciada que los carniceros la escondían y reservaban para sí mismos.<br />\r\n<br />\r\nLa pieza de secreto ibérico tiene hilos de grasa intramuscular que se ven a simple vista, lo que la hace tan jugosa. Pues bien, preparar esta carne de cerdo es muy sencillo y hoy te enseñamos cómo sacarle el máximo provecho preparando la receta de secreto ibérico al horno con puré de calabacín.', 30, '2017-06-16 00:39:35', '2017-06-16 00:39:35', 'img-recipe-3.jpg', 1),
  (4, 'Albóndigas de pollo con tomate', 716165383, 'albondigas-de-pollo-con-tomate', 'Las albóndigas son bolas de carne molida, preparadas generalmente con res, aunque existen versiones con pescado, aves, cerdo e incluso vegetarianas. Este platillo es una mezcla de carne y variados condimentos como perejil, comino, pimienta, cúrcuma y hasta canela… entre otros.<br />\r\nGracias a la sencillez de su sabor, representan una delicia para los peques de la casa por eso en esta ocasión os vamos a enseñar cómo hacer unas albóndigas de pollo para niños. Además de un excelente aporte de proteínas y nutrientes necesarios para su crecimiento. ¡Una delicia para compartir en familia!', 30, '2017-06-16 00:44:29', '2017-06-16 00:44:29', 'img-recipe-4.jpg', 1),
  (5, 'Batido de fresas y jengibre para adelgaz', 716165383, 'batido-de-fresas-y-jengibre-para-adelgazar', 'Este smoothie de fresa y jengibre que comparto con RecetasGratis es un batido adelgazante para compensar los kilos que hemos ganado y conseguir un peso ideal. Puedes tomarlo por la mañana en ayunas o después de cualquier esfuerzo físico. Prepáratelo antes de que se termine la temporada de fresas y verás lo delicioso que está.<br />\r\n<br />\r\nLas fresas son una fruta con bajo contenido calórico, además de proporcionarnos abundante fibra, lo que las hace ideales para perder peso a la vez que podemos disfrutar de su excelente sabor.', 10, '2017-06-16 00:48:21', '2017-06-16 00:48:21', 'img-recipe-5.jpg', 1),
  (6, 'Bacalao con patatas y pimientos', 716165383, 'bacalao-con-patatas-y-pimientos', 'Una buena forma de comer pescado blanco si es que no te gusta mucho su sabor es acompañándolo de una guarnición que sí te guste y te sea apetecible, como este bacalao con patatas y pimientos que esta vez te vamos a enseñar en RecetasGratis.<br />\r\nSi quieres saber cómo preparar esta receta de bacalao con pimientos y patatas sigue leyendo y entérate de cómo hacerlo paso a paso.', 25, '2017-06-16 00:51:36', '2017-06-16 00:51:36', NULL, 0);

--
-- Volcado de datos para la tabla `rec_cat`
--

INSERT INTO `rec_cat` (`category`, `recipe`) VALUES
  (4, 1),
  (6, 6),
  (8, 2),
  (10, 3),
  (10, 4),
  (12, 5),
  (14, 1),
  (15, 5),
  (16, 2),
  (16, 3),
  (16, 4),
  (17, 6);

--
-- Volcado de datos para la tabla `rec_ingr`
--

INSERT INTO `rec_ingr` (`recipe`, `ingredient`, `quantity`) VALUES
  (1, 3, 'Al gusto'),
  (1, 36, 'Medio'),
  (2, 19, '4 piezas'),
  (2, 40, '150 gramos'),
  (3, 19, '1 unidad'),
  (3, 27, '1 unidad (grande)'),
  (3, 31, '1 unidad'),
  (4, 9, 'Al gusto'),
  (4, 24, '2 unidades'),
  (4, 27, '1/2'),
  (4, 47, '1'),
  (5, 6, '2 unidades'),
  (5, 7, '200 mililitros'),
  (6, 19, '1/2 kg'),
  (6, 49, '1 kg');

--
-- Volcado de datos para la tabla `steps`
--

INSERT INTO `steps` (`id_recipe`, `numStep`, `description`) VALUES
  (1, 1, 'Para preparar nuestro famoso pan tumaca catalán, lo primero que haremos será limpiar muy bien los tomates y pelar el ajo.<br />\r\nPara evitar que el ajo repita, se recomienda picar por la mitad y retirar la parte central del diente.'),
  (1, 2, 'Raya los tomates y el ajo y luego, sazona la mezcla con una pizca de sal y remueve.<br />\r\nLa tradición indica que tanto el tomate como el ajo, simplemente se frotan contra el pan, en todo caso, lo que se debe hacer nunca a la hora de preparar pan con tomate es triturar los ingredientes, porque de esta forma se pierde la textura característica del tomate y queda una especie de zumo que empapa el pan.'),
  (1, 3, 'Para terminar nuestra \"salsa de tomate\" añade un buen chorro de aceite de oliva y mezcla todo. Para que la receta tenga mejor sabor es imprescindible usar una aceite de oliva de calidad.<br />\r\nLo ideal es preparar este tomate justo antes de consumirlo, pero si quieres guardarlo para usarlo en otro momento, bastará con que lo dejes en la nevera en un envase tapado. Antes de servirlo recuerda que debe estar a temperatura ambiente.'),
  (1, 4, 'Ahora toca montar las tostas de jamón serrano y tomate, así que simplemente tuesta un poco las rebanadas de pan, unta una buena capa de tomate y remata colocando por encima las lonchas de jamón.<br />\r\nPuedes usar pan del día anterior o el típico pan de pueblo.'),
  (1, 5, 'El pan con tomate y jamón serrano puede servirse como desayuno, cena o para tapear como es costumbre en España.<br />\r\nEl secreto de esta receta es preparar el tomate con ajo, sal y aceite siguiendo la tradición, usando ingredientes de calidad. Si quieres seguir probando tapas españolas te recomendamos probar las patatas bravas o unos deliciosos pinchos morunos.'),
  (2, 1, 'Para esta receta de sopa de papa con espinaca serán necesarios los siguientes ingredientes. Como ves, todos los productos son fáciles de conseguir y nutritivos. A modo de resumen, podemos decir de los ingredientes principales que la espinaca es rica en fibra, de manera que favorece el tránsito intestinal y mejora la digestión, es una excelente fuente de vitaminas y minerales como el calcio, mientras que la patata también contiene vitamina C y B, y minerales como el hierro y el potasio.'),
  (2, 2, 'Lavamos perfectamente la verdura, pelamos y picamos la papa en cuadros pequeños al igual que la espinaca y reservamos estos alimentos hasta su uso.'),
  (2, 3, 'En una cacerola ponemos un poco de aceite y cuando se encuentre caliente agregamos los cubos de papa y un poco de cebolla picada. Salpimentamos y esperamos a que las papas se cocinen.'),
  (2, 4, 'Para continuar con la elaboración de la sopa de papa y espinaca, licuamos el jitomate, la cebolla restante y el ajo con un poco de agua, sal y pimienta. Luego, agregamos esta mezcla y el consomé de pollo a las papas cuando observemos que se encuentran ligeramente doradas.<br />\r\n<br />\r\nTruco: Retira el consomé de pollo de la receta y tendrás una sopa de papa y espinaca apta para vegetarianos y veganos.'),
  (2, 5, 'Cuando la preparación esté a punto de hervir, añadimos las espinacas y revolvemos. Si es necesario agregamos un poco más de agua y dejamos hervir la sopa de papa con espinacas a fuego bajo unos 20 minutos aproximadamente.'),
  (2, 6, 'Cuando la preparación esté lista, retiramos la olla del fuego y servimos la sopa de espinaca y papa bien caliente, acompañada de unas deliciosas tortillas de maíz recién hechas. ¡Buen provecho!'),
  (3, 1, 'Aunque haremos la carne al horno, primero debemos sellar el secreto en la sartén. Entonces, calienta la sartén a fuego fuerte para marcar el secreto de cerdo por todos sus lados.<br />\r\nReservar la carne y encender el horno para pre-calentar a 180ºC.'),
  (3, 2, 'Por otro lado, para hacer el puré de calabacín, calentamos aceite en una sartén y sofreímos la cebolla cortada junto con una pizca de sal.<br />\r\nCuando empiece a ponerse transparente, añadimos el calabacín en trozos grandes y rehogamos el conjunto durante unos minutos.'),
  (3, 3, 'Cuando ambos ingredientes estén hechos, incorporamos la leche a la preparación junto con la patata troceada y mantenemos la cocción durante unos 20 minutos, hasta que la patata esté bien blanda.<br />\r\nEn ese momento ya podemos pasar nuestra preparación por un pasapurés o aplastar con un tenedor hasta conseguir la textura deseada. Sazonamos al gusto.'),
  (3, 4, 'Ya para terminar, coloca la carne en el horno y cocina unos 5-8 minutos, en función del gusto de cada uno y el punto de la carne deseado, aunque no debes olvidar que el cerdo siempre debe estar bien hecho.'),
  (3, 5, 'Corta la carne en medallones y sirve junto con el puré de calabacín, haciendo una elegante decoración.'),
  (4, 1, 'Empieza esta receta de albóndigas de pollo con tomate picando la cebolla a la juliana. Pre-calienta una sartén con 6 cucharadas de aceite de oliva, espera a que caliente. Deposita las cebolla y 1/3 de una cucharadita de sal. Deja cocer por 20-30 minutos, a fuego medio y removiendo de vez en vez. Espera hasta que la cebolla se caramelice. Si ves que se empieza a quemar, baja el fuego.'),
  (4, 2, 'También lava muy bien todos los ingredientes. Trocea los tomates y los pimientos en cuatro, si son grandes. Trocea en dos sin son pequeños. Agrega a la sartén el ajo, los tomates y los pimientos. Cocina a fuego alto. Remueve hasta que se integren bien todos los ingredientes de las albóndigas de pollo caseras.'),
  (4, 3, 'Cuando comience a burbujear la mezcla, agrega una hoja de laurel. Deja cocinar por 30 minutos, a fuego medio.'),
  (4, 4, 'Retira la mezcla del fuego y vacíala en un bol. Tritúrala con un pisa papas. Obtendrás una salsa de tomate semi-líquida. Añade el azúcar y la sal al gusto.'),
  (4, 5, 'Regresa de nuevo la salsa de tomate al sartén, a fuego entre bajo y medio. Deja que la salsa se reduzca un poco. Espera entre 1 o 1 hora y media. Al finalizar la cocción resérvala.<br />\r\nTruco: Cada 15 minutos revisa la salsa.'),
  (4, 6, 'Mientras tanto, vierte todos los ingredientes para hacer las albóndigas de pollo con tomate en un bol. En otro recipiente moja el pan en la leche y luego lo agregas a la mezcla.'),
  (4, 7, 'Integra muy bien todos los ingredientes de las albóndigas de pollo para niños hasta lograr una masa pareja. Crea bolas con la mezcla.'),
  (4, 8, 'Prepara un recipiente con la harina. Mete las albóndigas de pollo caseras dentro, hasta que se impregnen de harina.'),
  (4, 9, 'Pre-calienta una sartén con aceite. Fríe las albóndigas de pollo hasta que queden doradas.'),
  (4, 10, 'Cocínalas dentro de un cazo las albóndigas en salsa, junto al tomate frito. Remueve durante 5 minutos. Luego, déjalas cocer por 3 minutos más y... ¡listo!'),
  (5, 1, 'Lo primero que tenemos que hacer para preparar este batido de fresas y jengibre para perder peso es limpiar las fresas en el momento que vayas a utilizarlas. Después ralla un poquito de jengibre (una cucharadita es suficiente).<br />\r\nA continuación, trocea las fresas y ponlas en el vaso de una batidora, añade el jengibre y la leche de avena, y bate hasta que se forme una crema lisa y homogénea. Añade más leche si ves que le hace falta, aunque este smoothie de fresa y jengibre suele quedar bastante cremoso y espeso.'),
  (5, 2, 'Si te apetece más dulce puedes añadirle algún edulcorante o un poquito de miel a este batido de fresas y jengibre para adelgazar. Espero que te guste.'),
  (6, 1, 'El primer paso para elaborar esta receta de bacalao con patatas y pimientos es limpiar bien los pimientos verdes italianos y freírlos enteros en una sartén con abundante aceite a fuego lento. Una vez bien hechos, los reservamos para más tarde.'),
  (6, 2, 'Al mismo tiempo, pelamos y cortamos las patatas en rodajas finas, y lavamos y cortamos los pimientos rojos en tiras.'),
  (6, 3, 'Una vez que los pimientos verdes estén hechos, en el mismo aceite aprovechamos y freímos los pimientos rojos y las patatas.'),
  (6, 4, 'Mientras se cocinan estos ingredientes, preparamos los trozos de bacalao que tienen que estar desalados. Si no tendrás que desalarlos poniéndolos en un recipiente con agua durante unas 36 horas y cambiándoles el agua cada 12. Una vez que el bacalao tenga su punto de sal, ponemos un chorro de aceite de oliva nueva en la sartén, lo rebozamos en harina de trigo y lo cocinamos a fuego fuerte.'),
  (6, 5, 'Una vez que tengamos el bacalao frito lo colocamos en una bandeja de horno junto con los pimeintos verdes y rojos y las patatas por al lado. Entonces salpimentamos las verduras, añadimos el vino de Jerez y horneamos el bacalao con pimientos y patatas unos 5 minutos a 250º C aproximadamente (horno fuerte).'),
  (6, 6, 'Pasado este tiempo ya podremos disfrutar de un delicioso plato de bacalao con patatas y pimientos al horno para sorprender a toda la familia.');



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;