-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 12 2018 г., 20:36
-- Версия сервера: 10.1.29-MariaDB
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `durdom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `category_news`
--

CREATE TABLE `category_news` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(99) NOT NULL,
  `head` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Заголовок',
  `imghead` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Картинка в начале статьи, используется на превью',
  `post` mediumtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'Первая половина поста',
  `post2` mediumtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'Вторая половина поста',
  `img` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Картинка между Post и Post2',
  `img2` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Картинка в конце',
  `author` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `head`, `imghead`, `post`, `post2`, `img`, `img2`, `author`) VALUES
(1, 'На самой мощной видеокарте в мире Nvidia TITAN V запустили самые популярные игры и сравнили', 'images/post1/h.jpg', 'На видеокарте Nvidia TITAN V, являющейся самой мощной в мире, запустили 15 самых известных игр в 4К и провели несколько тестов производительности.\r\n\r\nВ сети были проведены и опубликовали несколько тестов для самой мощной видеокарты TITAN V. Как сообщает Gamebomb.ru, их провели два крупных сайта GamersNexus и HardwareLUXX, которые протестировали игры ААА-класса. GamersNexus тестировал игры DOOM, Destiny 2, Ghost Recon: Wildlands, Sniper Elite 4, For Honor и Hellblade: Senua\'s Sacrifice. Согласно результатам, в большинстве случаев TITAN V работает быстрее, чем GTX1080Ti и Titan XP. Кроме того, новейший видеоадаптер заметно быстрее в играх DX12, но в более традиционных играх с DX11, таких как Ghost Recon: Wildlands или For Honor он почти соответствовал Titan XP.', 'HardwareLUXX проверил The Witcher 3: Wild Hunt, Far Cry: Primal, Tom Clancy\'s The Division, Star Wars: Battlefront 2, Hitman, Call of Duty: WWII, Project CARS 2, Playerunknown\'s Battlegroundsи Wolfenstein 2: The New Colossus. «Ведьмак 3» в 4К, например, работает на TITAN V почти на 10fps быстрее, чем на GeForce GTX1080Ti. Hitman также увеличил свою производительность. В версии 4К игра ускорилась на 12 кадров в секунду быстрее, чем, опять же на GeForce GTX1080Ti. Tom Clancy\'s The Division продемонстрировал увеличение производительности на 11 кадров, а Star Wars: Battlefront 2 показал впечатляющие результаты увеличения кадров аж на 24 на видеокарте TITAN V.\r\n\r\nCall of Duty: WWII в 4К увеличила производительность на 11 кадров в секунду. Project CARS 2 продемонстрировал результат выше на 10 кадров, а игры Playerunknown\'s Battlegroundsи Wolfenstein 2: The New Colossus увеличили свои количества кадров на 10 и 27. Все это говорит о том, что разрыв между Nvidia TITAN V и GeForce GTX1080Ti очень большой.\r\nDurdom.pw напоминает, что компания NVIDIA все же позиционирует свою карту для выполнения высокопроизводительных вычислений и для решения задач, связанных с работой искусственного интеллекта, а не для игры.', 'images/post1/p1.jpg\r\n', 'images/post1/p9.jpg', 'NecroS'),
(2, 'Crytek подала в суд на авторов Star Citizen из-за нарушения прав на движок', 'images/post2/h.jpg', 'Компания Crytek подала в суд на разработчиков из Cloud Imperium за нарушение контракта, согласно которому вторые должны были делать только одну игру на движке CryEngine — Star Citizen.\r\n\r\nВ иске говорится, что разработчики должны были делать только одну игру на движке компании Crytek, а не две. Как сообщает Gamebomb.ru, целью судебных разбирательств является проект Squadron 42, который представляет из себя однопользовательский режим игры Star Citizen и продается, как отдельна игра. Кроме того, по контракту разработчики  Cloud Imperium должны были везде использовать логотипы Crytek. Однако, после смены движка на Lumberyard было принято решение всех их удалить. Неизвестно, решали ли эти компании все вопросы, связанные с переходом. Однако, если же этого не произошло, то у Cloud Imperium появятся большие проблемы.', 'Кроме того, известно, что компания Crytek вкладывала значительные средства для первых демонстраций игры. Это делалось для того, чтобы убедить общественность в правильности концепции игры и, чтобы в последствии игру поддерживали с помощью краудфандинга. Зная всю эту информацию, становится интересно, смогут ли две компании разрешить все свои вопросы во внесудебном порядке или нет. Хотя Cloud Imperium уже успели ответить на все обвинения в свой адрес: «Нам известно о жалобе Crytek, поданной в окружной суд США. CIG не использует движок CryEngine уже довольно давно, с тех пор, как мы перешли на Amazon Lumberyard. Это недостойный иск, от которого мы будем защищаться, в том числе и восстанавливать все расходы, понесенные в этом вопросе.»\r\n\r\nПо информации Durdom.pw, не менее интересно, как поступит компания Amazon, в чьей собственности находится Amazon Lumberyard. Вступится ли она за разработчиков Cloud Imperium, которые делают одну из самых масштабных игр по разработанному Amazon движку.', 'images/post2/p1.jpg', '<iframe width=\"500\" height=\"315\" src=\"https://www.youtube.com/embed/Ia8ZPfAlfOw\" frameborder=\"0\" gesture=\"media\" allow=\"encrypted-media\" allowfullscreen></iframe>', 'NecroS');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `ID` int(99) NOT NULL,
  `Head` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Заголовок',
  `imghead` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Картинка в начале статьи, используется на превью',
  `Post` mediumtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'Первая половина поста',
  `Post2` mediumtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'Вторая половина поста',
  `Img` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Картинка между Post и Post2',
  `img2` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Картинка в конце',
  `Author` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`ID`, `Head`, `imghead`, `Post`, `Post2`, `Img`, `img2`, `Author`) VALUES
(1, 'На самой мощной видеокарте в мире Nvidia TITAN V запустили самые популярные игры и сравнили', 'images/post1/h.jpg', 'На видеокарте Nvidia TITAN V, являющейся самой мощной в мире, запустили 15 самых известных игр в 4К и провели несколько тестов производительности.\r\n\r\nВ сети были проведены и опубликовали несколько тестов для самой мощной видеокарты TITAN V. Как сообщает Gamebomb.ru, их провели два крупных сайта GamersNexus и HardwareLUXX, которые протестировали игры ААА-класса. GamersNexus тестировал игры DOOM, Destiny 2, Ghost Recon: Wildlands, Sniper Elite 4, For Honor и Hellblade: Senua\'s Sacrifice. Согласно результатам, в большинстве случаев TITAN V работает быстрее, чем GTX1080Ti и Titan XP. Кроме того, новейший видеоадаптер заметно быстрее в играх DX12, но в более традиционных играх с DX11, таких как Ghost Recon: Wildlands или For Honor он почти соответствовал Titan XP.', 'HardwareLUXX проверил The Witcher 3: Wild Hunt, Far Cry: Primal, Tom Clancy\'s The Division, Star Wars: Battlefront 2, Hitman, Call of Duty: WWII, Project CARS 2, Playerunknown\'s Battlegroundsи Wolfenstein 2: The New Colossus. «Ведьмак 3» в 4К, например, работает на TITAN V почти на 10fps быстрее, чем на GeForce GTX1080Ti. Hitman также увеличил свою производительность. В версии 4К игра ускорилась на 12 кадров в секунду быстрее, чем, опять же на GeForce GTX1080Ti. Tom Clancy\'s The Division продемонстрировал увеличение производительности на 11 кадров, а Star Wars: Battlefront 2 показал впечатляющие результаты увеличения кадров аж на 24 на видеокарте TITAN V.\r\n\r\nCall of Duty: WWII в 4К увеличила производительность на 11 кадров в секунду. Project CARS 2 продемонстрировал результат выше на 10 кадров, а игры Playerunknown\'s Battlegroundsи Wolfenstein 2: The New Colossus увеличили свои количества кадров на 10 и 27. Все это говорит о том, что разрыв между Nvidia TITAN V и GeForce GTX1080Ti очень большой.\r\nDurdom.pw напоминает, что компания NVIDIA все же позиционирует свою карту для выполнения высокопроизводительных вычислений и для решения задач, связанных с работой искусственного интеллекта, а не для игры.', '<img src=\"images/post1/p1.jpg\" alt=\"\" width=\"500\">\r\n<img src=\"images/post1/p2.jpg\" alt=\"\" width=\"500\">\r\n<img src=\"images/post1/p3.jpg\" alt=\"\" width=\"500\">\r\n<img src=\"images/post1/p4.jpg\" alt=\"\" width=\"500\">\r\n<img src=\"images/post1/p5.jpg\" alt=\"\" width=\"500\">\r\n<img src=\"images/post1/p6.jpg\" alt=\"\" width=\"500\">\r\n<img src=\"images/post1/p7.jpg\" alt=\"\" width=\"500\">\r\n<img src=\"images/post1/p8.jpg\" alt=\"\" width=\"500\">\r\n<img src=\"img/p9.jpg\" alt=\"\" width=\"500\">', '', 'NecroS'),
(2, 'Crytek подала в суд на авторов Star Citizen из-за нарушения прав на движок', 'images/post2/h.jpg', 'Компания Crytek подала в суд на разработчиков из Cloud Imperium за нарушение контракта, согласно которому вторые должны были делать только одну игру на движке CryEngine — Star Citizen.\r\n\r\nВ иске говорится, что разработчики должны были делать только одну игру на движке компании Crytek, а не две. Как сообщает Gamebomb.ru, целью судебных разбирательств является проект Squadron 42, который представляет из себя однопользовательский режим игры Star Citizen и продается, как отдельна игра. Кроме того, по контракту разработчики  Cloud Imperium должны были везде использовать логотипы Crytek. Однако, после смены движка на Lumberyard было принято решение всех их удалить. Неизвестно, решали ли эти компании все вопросы, связанные с переходом. Однако, если же этого не произошло, то у Cloud Imperium появятся большие проблемы.', 'Кроме того, известно, что компания Crytek вкладывала значительные средства для первых демонстраций игры. Это делалось для того, чтобы убедить общественность в правильности концепции игры и, чтобы в последствии игру поддерживали с помощью краудфандинга. Зная всю эту информацию, становится интересно, смогут ли две компании разрешить все свои вопросы во внесудебном порядке или нет. Хотя Cloud Imperium уже успели ответить на все обвинения в свой адрес: «Нам известно о жалобе Crytek, поданной в окружной суд США. CIG не использует движок CryEngine уже довольно давно, с тех пор, как мы перешли на Amazon Lumberyard. Это недостойный иск, от которого мы будем защищаться, в том числе и восстанавливать все расходы, понесенные в этом вопросе.»\r\n\r\nПо информации Durdom.pw, не менее интересно, как поступит компания Amazon, в чьей собственности находится Amazon Lumberyard. Вступится ли она за разработчиков Cloud Imperium, которые делают одну из самых масштабных игр по разработанному Amazon движку.', '<img src=\"images/post2/p1.jpg\" alt=\"\" width=\"500\">\r\n<img src=\"images/post2/p2.jpg\" alt=\"\" width=\"500\">\r\n<img src=\"images/post2/p3.jpg\" alt=\"\" width=\"500\">\r\n<img src=\"images/post2/p4.jpg\" alt=\"\" width=\"500\">\r\n<img src=\"images/post2/p5.jpg\" alt=\"\" width=\"500\">\r\n<img src=\"images/post2/p6.jpg\" alt=\"\" width=\"500\">\r\n<img src=\"images/post2/p7.jpg\" alt=\"\" width=\"500\">\r\n', '<iframe width=\"500\" height=\"315\" src=\"https://www.youtube.com/embed/Ia8ZPfAlfOw\" frameborder=\"0\" gesture=\"media\" allow=\"encrypted-media\" allowfullscreen></iframe>', 'NecroS');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `status`) VALUES
(1, 'NecroS', '1dcaf5d65dbb5dbb7f60f65f06d0e94b', 1),
(2, '', '', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category_news`
--
ALTER TABLE `category_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `news_id` (`news_id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category_news`
--
ALTER TABLE `category_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ID` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `category_news`
--
ALTER TABLE `category_news`
  ADD CONSTRAINT `category_news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_news_ibfk_2` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
