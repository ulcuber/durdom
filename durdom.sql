-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 31 2018 г., 10:18
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
  `author` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `head`, `imghead`, `post`, `post2`, `img`, `img2`, `author`, `video`) VALUES
(1, 'На самой мощной видеокарте в мире Nvidia TITAN V запустили самые популярные игры и сравнили', 'images/post1/h.jpg', 'На видеокарте Nvidia TITAN V, являющейся самой мощной в мире, запустили 15 самых известных игр в 4К и провели несколько тестов производительности.\r\n\r\nВ сети были проведены и опубликовали несколько тестов для самой мощной видеокарты TITAN V. Как сообщает Gamebomb.ru, их провели два крупных сайта GamersNexus и HardwareLUXX, которые протестировали игры ААА-класса. GamersNexus тестировал игры DOOM, Destiny 2, Ghost Recon: Wildlands, Sniper Elite 4, For Honor и Hellblade: Senua\'s Sacrifice. Согласно результатам, в большинстве случаев TITAN V работает быстрее, чем GTX1080Ti и Titan XP. Кроме того, новейший видеоадаптер заметно быстрее в играх DX12, но в более традиционных играх с DX11, таких как Ghost Recon: Wildlands или For Honor он почти соответствовал Titan XP.', 'HardwareLUXX проверил The Witcher 3: Wild Hunt, Far Cry: Primal, Tom Clancy\'s The Division, Star Wars: Battlefront 2, Hitman, Call of Duty: WWII, Project CARS 2, Playerunknown\'s Battlegroundsи Wolfenstein 2: The New Colossus. «Ведьмак 3» в 4К, например, работает на TITAN V почти на 10fps быстрее, чем на GeForce GTX1080Ti. Hitman также увеличил свою производительность. В версии 4К игра ускорилась на 12 кадров в секунду быстрее, чем, опять же на GeForce GTX1080Ti. Tom Clancy\'s The Division продемонстрировал увеличение производительности на 11 кадров, а Star Wars: Battlefront 2 показал впечатляющие результаты увеличения кадров аж на 24 на видеокарте TITAN V.\r\n\r\nCall of Duty: WWII в 4К увеличила производительность на 11 кадров в секунду. Project CARS 2 продемонстрировал результат выше на 10 кадров, а игры Playerunknown\'s Battlegroundsи Wolfenstein 2: The New Colossus увеличили свои количества кадров на 10 и 27. Все это говорит о том, что разрыв между Nvidia TITAN V и GeForce GTX1080Ti очень большой.\r\nDurdom.pw напоминает, что компания NVIDIA все же позиционирует свою карту для выполнения высокопроизводительных вычислений и для решения задач, связанных с работой искусственного интеллекта, а не для игры.', 'images/post1/p1.jpg\r\n', 'images/post1/p9.jpg', 'NecroS', ''),
(2, 'Crytek подала в суд на авторов Star Citizen из-за нарушения прав на движок', 'images/post2/h.jpg', 'Компания Crytek подала в суд на разработчиков из Cloud Imperium за нарушение контракта, согласно которому вторые должны были делать только одну игру на движке CryEngine — Star Citizen.\r\n\r\nВ иске говорится, что разработчики должны были делать только одну игру на движке компании Crytek, а не две. Как сообщает Gamebomb.ru, целью судебных разбирательств является проект Squadron 42, который представляет из себя однопользовательский режим игры Star Citizen и продается, как отдельна игра. Кроме того, по контракту разработчики  Cloud Imperium должны были везде использовать логотипы Crytek. Однако, после смены движка на Lumberyard было принято решение всех их удалить. Неизвестно, решали ли эти компании все вопросы, связанные с переходом. Однако, если же этого не произошло, то у Cloud Imperium появятся большие проблемы.', 'Кроме того, известно, что компания Crytek вкладывала значительные средства для первых демонстраций игры. Это делалось для того, чтобы убедить общественность в правильности концепции игры и, чтобы в последствии игру поддерживали с помощью краудфандинга. Зная всю эту информацию, становится интересно, смогут ли две компании разрешить все свои вопросы во внесудебном порядке или нет. Хотя Cloud Imperium уже успели ответить на все обвинения в свой адрес: «Нам известно о жалобе Crytek, поданной в окружной суд США. CIG не использует движок CryEngine уже довольно давно, с тех пор, как мы перешли на Amazon Lumberyard. Это недостойный иск, от которого мы будем защищаться, в том числе и восстанавливать все расходы, понесенные в этом вопросе.»\r\n\r\nПо информации Durdom.pw, не менее интересно, как поступит компания Amazon, в чьей собственности находится Amazon Lumberyard. Вступится ли она за разработчиков Cloud Imperium, которые делают одну из самых масштабных игр по разработанному Amazon движку.', 'images/post2/p1.jpg', '', 'NecroS', 'https://www.youtube.com/embed/Ia8ZPfAlfOw');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(99) NOT NULL,
  `head` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Заголовок',
  `imghead` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Картинка в начале статьи, используется на превью',
  `date` date NOT NULL,
  `post` mediumtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'Первая половина поста',
  `post2` mediumtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'Вторая половина поста',
  `img` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Картинка между Post и Post2',
  `img2` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Картинка в конце',
  `author` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `head`, `imghead`, `date`, `post`, `post2`, `img`, `img2`, `author`, `video`) VALUES
(1, 'Wolfenstein II: The New Colossus — Немного о нытье', 'images/wf.jpg', '2017-12-11', 'Приветствую всех любителей пострелять от первого лица! Не так давно на всех нас вывалилась очередная повесть о нелегкой судьбе знаменитого борца с фашистами. К сожалению, в этот раз она была омрачена не совсем уместными стараниями авторов сделать из своей игры серьезное произведение. Но обо всем как обычно по-порядку.', '', '', '', 'NecroS', 'https://www.youtube.com/embed/liuDFAifV2Y'),
(2, 'Battle Chasers:Nightwar—Простенько, но симпатично', 'images/rev2.jpg', '2017-12-25', 'Если вам нравятся простые и непритязательные RPG игры, то у меня для вас сюрприз. Ибо не так давно свет увидела новая JRPG американского разлива Battle Chasers: Nightwar, которая может предложить благовродным донам и доньям недельку не самого плохого развлекалова.', '', '', '', 'NecroS', 'https://www.youtube.com/embed/M4yy6QdTMnQ'),
(3, 'Пять причин, почему надо играть в Divinity: Original Sin 2', 'images/rev3.jpg', '2018-01-10', 'Не знаю как вы, а я (несмотря на то, что на дворе только октябрь) с игрой года уже определился. Divinity: Original Sin 2 победила за явным преимуществом, отправив в глубокий нокаут мои страхи по поводу того, что создатели могут схалтурить после очень крутой демки.\r\n\r\nПоэтому я хочу как-то выразить художественно свои восторги и предлагаю вам свою версию — почему играть надо обязательно. Комментарии и альтернативные мнения строго приветствуются.', '', '', '', '', 'https://www.youtube.com/embed/NixYa0eWZn8\" '),
(4, 'То чувство, когда это лучше, чем Alan Wake\r\n', 'images/rev4.jpg', '0000-00-00', 'Вступление\r\n\r\nПожалуй, все ждали от Remedy шедевра после их безусловно успешной игры Alan Wake и дополнения к ней. Игра, вышедшая в далёком 2010 году, до сих пор находится в тёплом местечко в сердце любого уважающего себя геймера. Игроки по всему миру до сих пор ждут продолжение истории писателя Алана Уэйка, но вот незадачка – студия Remedy выпускает совсем новый продукт, никак не связанный с серией Alan Wake, но который, по словам самих создателей, задумывался именно как продолжение Alan Wake. Игра, которую мы сегодня затронем в нашем обзоре называется Quantum Break.\r\n\r\nСюжет\r\n\r\nИгра рассказывает нам историю главного героя по имени Джек Джойс. Он обычный юноша с некоторым криминальным прошлым, который несколько лет назад покинул родной Риверпорт из-за ссоры с братом Уильямом, работающем в крупной фирме, возглавляемой другом детства Джека – Полом Сайрином. Многие годы они почти не общались, но вот однажды некий проект Пол оказывается под угрозой и ему срочно нужно провести его испытание. Для этого он вызывает Джека, которому он по-прежнему доверяет, но эксперимент выходит из под контроля и создаёт огромные проблемы, исходом которых может стать самый настоящий Конец Света. И только Джек способен остановить всё это, ведь при неудачном эксперименте он получил сверхъестественные способности и теперь он может управлять временем. Однако, даже в этом случае время против него и у него с его командой остаётся чуть больше суток, чтобы спасти Вселенную.\r\n\r\nГеймплей\r\n\r\nQuantum Break - это приключенческий шутер с видом от третьего лица, чем схожий с прошлыми проектами студии Remedy. В арсенале главного героя всё также есть несколько видов различного оружия, начиная с пистолетика и заканчивая пулемётами. Однако, в отличии от Alan Wake, здесь у главного героя также имеются и суперспособности, которые будут открываться игроку по мере прохождения сюжета. Все эти способности нам также дадут прокачивать за местные очки опыта – хрононы, которые будет можно собрать по мере прохождения каждой локации, собирая при этом и другие интересные и не очень интересные предметы (например, куча записок, сложив которые выйдет сиквел «Войны и мира»). Одной из способностей главного героя, с которой мы познакомимся будет заморозка. Как мы знаем, Шон Эшмор баловался заморозкой до того, как это стало Quantum Break, но здесь суть заморозки в том, что замораживать мы сможем само время внутри определённой области. Например, мы можем окружить противника неким полем, внутри которого время не идёт, пострелять туда из автомата и как только время заморозки пройдёт, все пульки попадут в глупую головушку врага, сделав ему смертельное бо-бо. Вот.\r\n\r\nДругие способности позволяют нам контролировать время ещё сильнее. В списке всего прочего, у нас будет возможность быстрого перемещения по локациям, оставляя за собой молнии аля Барри Аллен и даже полная остановки времени, в ходе которой мы сможем оглушать врагов в рукопашном бою, пока они стоят без движений (не мы подлые, игра такая) или просто перемещаться по локации, заставляя врагов вас потерять. Таким образом можно зайти противнику за спину и когда часики снова затикают всадить в него автоматную очередь (не мы подлые, игра такая x2).\r\n\r\nХронозрение - это местный аналог орлиного зрения из серии Assassin’s Creed, который позволяет видеть нам противников сквозь стены. Хроновзрывы способны уничтожить почти всех врагов спустя всего несколько секунд удержания кнопки для запаса заряда взрыва. Хронозащита позволяет создать вокруг вас некое поле, которое способно выдержать натиск выстрелов даже из снайперских винтовок и повышает ваше здоровье, в случае если вы были ранены до этого. Все эти навыки можно улучшить и прокачать, однако, чтобы прокачаться полностью вам потребуется собрать все хрононы до единого, поэтому пробегать игру не стоит. Но порой так хочется, если честно. Особенно, когда читаешь тоны разных документов, собранных на локации. Да, порой записи очень даже интересные и раскрывают нам историю всего мира игры и некоторых из персонажей по отдельности, но порой это просто ужасно нудные документации, которые придают игре не так уж много смысла. И, признаться честно, в итоге сбор предметов может вам немного надоесть, но случится это лишь в самом конце, поэтому дерзайте.\r\n\r\nПорой по сюжету мы несколько раз будем перемещаться во времени вперёд и назад, поэтому некоторые локации будет видеть второй раз очень приятно. Скажем, стоит незнакомая машина, мы не знаем, что это за тачка, но в итоге выясняется, что мы на ней и приехали спустя уже несколько часов игры. Поэтому сюжет тут прописан до мельчайших деталей. Но, честно, пару моментов мне всё равно остались необъяснёнными до конца и, скорее всего, это просто завязка на сиквел игры. В самой Quantum Break есть множество отсылок на серию Alan Wake некую загадочную дату – 2021 года, так что, кто знает…\r\n\r\nГрафика и оптимизация\r\n\r\nНесмотря на множественные отзывы касательные плохой оптимизации на PC, на данный момент игра уже успела обзавестись парой десятков патчей и на среднем компе она пойдёт без особых проблем. Да, порой будут просадочки, но они возникают крайне редко и особых проблем не создают (кроме финального боя, где FPS проседает заметнее всего). Пожалуй, оптимизация – главная проблема игры, потому что чего-то нового в графическом плане в игровую индустрию она не вносит. Помимо фильма, разве что. Но и плохой графику назвать тоже никак нельзя. Она отлично подходит для 2016 года и даже дальше.\r\n\r\n', 'Cериал\r\n\r\n\r\nКроме игры, иногда нам также придётся наблюдать самый настоящий сериал, где роли отыгрывают реальные актёры. Очень приятно видеть какого-то персонажа в игре, а затем смотреть на него же уже в сериале. К слову, он тут выполнен отлично и порой даже сериалы, транслирующиеся на федеральных каналах, не могут показать такого результата. Сериал «Квантовый Разлом» спокойно может идти и без самой игры, но для полноты картины оценить его всё же стоит. Да и в паре моментов с игрой он всё же пересекается. Если вы фанаты таких актёров как Шон Эшмор, Кортни Хоуп, Доминик Монаган и Эйдан Гиллен, то сериал смотреть однозначно стоит, хоть и персонажи этих актёров появляются тут не так часто, ведь сериал повествует немного другую историю.\r\n\r\nОбщие впечатления и итог\r\n\r\nЗнаете, я с удовольствием играл в Quantum Break и ни разу за игру я не захотел её бросить. Сражаясь с финальным боссом я играл в полсилы, чтобы растянуть игру ещё хотя бы на часик (из-за чего постоянно сливался), я понимал, что пройдя её, я не увижу сиквела ближайшие несколько лет. Великолепный геймплей, отличная постановка сюжета в игре и сериале (то чувство, когда актёров и главного героя изменили в лучшую сторону), настоящее переживание за персонажей и сочувствие их историям – всё это есть в Quantum Break. Пожалуй, лично для меня это лучшая игра последних лет и та игра, которая стала лучше, чем Alan Wake. Её однозначно стоит брать.\r\n\r\n10/10\r\n', 'images/rev4-1.jpg\r\n', 'images/rev4-2.jpg', 'NecroS', 'https://www.youtube.com/embed/gomsFmNjz70'),
(5, 'Лысый, пьяный и с пистолетом!\r\n', 'images/rev5.jpg', '2018-01-31', 'Долгожданный ... (Вступление)\r\n\r\n Всем доброго времени суток. Сегодня я решился написать обзор на долгожданную игру Max Payne 3. В самом начале обзора можно сразу сказать тем кто еще думает играть в \"максима\" или нет - срочно бежать в магазин и покупать игру. Пожалеть о покупке вы попросту не сможете, так как третья часть получилась просто феноменальной. В данном обзоре я попытаюсь не столько сильно уделять внимание сюжету, геймплею и мультиплееру (о которых конечно будет упомянуто), сколько о некоторых моментах, заслуживающих пристального внимания. В путь!\r\n\r\nНемножко о судьбе Макса (сюжет)\r\n\r\n Начать обзор хотелось бы с нескольких слов о сюжете.\r\n\r\n В какой - то статье, точно не помню в какой, была такая фраза, что сюжет в Max Payne 3 придуман просто \"для галочки\". Уверяю вас, это не так.\r\n\r\n С времён третье части игры прошло 10 лет. Макс, желая найти спокойную, тихую работёнку устроился охранником в богатую семью города Сан - Паулу. Казалось бы, что может быть проще: шататься по вечеринкам, следя за разгулом членов семьи. Однако не всё так легко, как кажется на первый взгляд. Сначала похищяют жену босса, позже и убивают его самого. Главный герой не знает сколько сможет прожить: может день, а может и 5 минут. И только геймеры способны вывести Макса из этой западни... \r\nВидео - переходы\r\n\r\n Сам игровой процесс связан между собой некими видео - переходами. Это не какие - то отдельные фрагменты видео. Нет. Буквально сразу анимация перетекает в игровой процесс, так что вы даже не успеваете понять что это был ролик. Внутренние чувства Макса также показаны в видео. Вы просто не успеете устать от игры: настолько качетсвенно видео - переходы вписываются в игру.\r\n\r\nНе заскучаете\r\n\r\n Скучать действительно не придётся. Судьба раскидывается \"максима\" по различным углам мира. То, играешь в офисе, отстреливаясь от каких - то террористов, то ты уже оказываешься на яхте и занимаешься разборками там, то на кладбище, то на футбольном стадионе!', 'Детально!\r\n\r\n Божественно смотреть на детали, проделанные разработчиками в полной мере! Например, главный герой может почесать затылок, двигаясь по солнечному городу. В одной из глав, можно наблюдать автобус после перестрелки. Дак, этот автобус, уделан пулями и повреждениями порой лучше чем в американском фильме. Что уже говорить о крови и выстрелах. Пожалуй, Max Payne 3 на сегодняшний день является лучшей игрой в отношении травм. Если вы подстрелите кого  - нибудь, например, в голову, то увидете рану в полной красе. И это еще только поверхность всех прелестей графики и физике в игре!\r\n\r\nПротивники (ИИ)\r\n\r\n Враги также не дадут покоя. Искусственный интеллект в игре выше всяких похвал. Противники не ататкую по одиночке, а стараются держаться группой. Даже один враг теперь сможет причинить вам вред, а если уж совсем зазеваться, то и убить.\r\n\r\nОружие\r\n\r\n Неотъемлемая часть всех перестрелок - оружие. Сколько мы уже видели игр, в которых главные герои порой достают пушки из - за пояса, находясь при этом порой и без одежды вовсе (далеко ходить не надо, тот же Kane & Lynch: Dog Days). Макс же не далает таких утех - если уж собрались нести 2-3 оружия, то обе руки будут заняты, да и идти будет немного сложновато.\r\n\r\n Стреляя, мы наблюдаем великолепную отдачу оружия.\r\n\r\nBullet - time\r\n\r\n Визитная карточка игры - режим Bullet - time! Без него пожалуй и игры бы не было. Моменты замедленного падения выглядят улётно! Можно сделать выбор - сделать прыжок, чтобы убить врагов, или же просто замедлить ход времени на бегу, снеся головы нехороших дядям.\r\n\r\nМультиплеер\r\n\r\n Впервые в игре появился мультиплеер. Теперь игроки могут опробовать свои силы и на просторах интетнета! В \"мультике\" представлено несколько режимов, таких как командный или же каждый сам за себя.\r\n\r\nФантастика (Вывод, итог)\r\n\r\n Как раньше говорили про GTA 4, так теперь я скажу и про Макса: \"Зачем вообще существуют другие игры, если есть Max Payne 3?\"', 'imagies/rev5-1.jpg', 'imagies/rev5-2.jpg', 'LoveSleep', 'https://www.youtube.com/embed/WUZ5ATSrfWs'),
(6, 'Spec Ops : The Line – Уокер он и в Дубае Уокер.', 'images/rev6.jpg', '2018-01-31', 'Вступление\r\n\r\nПривет, читатели, гости и пользователи ресурса gamebomb.ru, вас приветствует Okokok-man. Сегодня я повествую вам о игре под названием  Spec Ops : The Line. Это первая игра из серии в которую я играл. Да, я знаю, что делая обзор на эту игру, я занимаюсь как вы все любите говорить мейнстримом и прочей фигней. Некоторые говорят, что это еще один плот, который прошел мимо огромного корабля на борту которого многие современные и не очень шедевры игровой индустрии. Итак, давайте начнем. И вновь все, что написано ниже является сугубо индивидуальным и субъективным мнением. Поехали.\r\n\r\nНебольшое превью \\ Сюжет \\ Предыстория\r\n\r\nВы – капитан Мартин Уокер из отряда «Дельта» войск спецназа США. У вас есть два товарища, это Луга и Адамс. Все вы вместе отправляетесь в Дубай для того, чтобы выяснить что случилось. А случилось вот что. Некий полковник Конрад и его отряд были посланы в этот город для срочной эвакуации местных жителей. А почему они это делают?  Да потому, что необходимо спасти гражданских от смертельных песчаных бурь, которые подвергли город страшному разрушению. После чего о полковнике и его отряде ничего не было слышно. И через некоторое время из недр разрушенного города вырывается радио сигнал. Странно, не так ли? Вот теперь и Delta Force вступают в дело. В их задачи входит прибытие на место и разведка. Ничего больше. Но кто бы мог подумать, что все так обернется.\r\n\r\nИгровой процесс \\ Геймплей\r\n\r\nЭта игра представляет из себя классический шутер от третьего лица без какой-либо прокачки оружия, персонажей и возможностей. Таким образом, что нам остается?\r\n\r\nВо-первых это дикая мясорубка с элементами фильма «Страх и ненависть в Лас-Вегасе». То есть по ходу игры у главного героя, Рауля Дюка Уокера то и дело сносит крышу под действием давления со стороны психики, разладов в отряде да и вообще по ходу операции. Подробней рассказывать не буду, многие знают, а кто не знает – поиграйте.\r\n\r\nВо-вторых это возможность управления отрядом. Вы можете сосредоточить своих бойцов на враге, приказать им его убить или, например, выкурить его из берлоги с пулеметом. Таким образом можно почувствовать всю сласть старшего воинского чина. Честно сказать, вплоть до самого конца игры так и не смог им приказать что-либо сделать. Просто не получалось. Поэтому игру проходил нагло и в лоб. Хотя, все-таки оглушать гранатой я смог.\r\n\r\nСледующей новизной этого стандартного военного шутера является возможность использования ресурсов природы. А точнее песка, которого в городе целая уйма. Чем он ценен? Ну, к примеру, если враг стоит на балконе, а за ним окно заполнено песком, то есть прекрасная возможность не целиться в удаленную крохотную цель, а просто расстрелять окно, песок за которым покроет врага с головой. Таким образом можно также уничтожать несколько целей. Еще песок придет вам на помощь посредством бури, из-за которой видимость становится ужасной, а приказы своим солдатам отдавать не получится, но зато скрыться от очередной армии врага вполне удастся.\r\n\r\nМеня в этой игре держала прежде всего атмосфера. И абсолютно непонятный сюжет в купе с достаточно продолжительный игровым временем.\r\n\r\nВ атмосферу входит как сам Дубай, то есть город погребенный в собственных песках, как альтернативное будущее, кучи вражеских солдат и конечно же огромное количество оксида кремния песка, который дает некоторые тактические преимущества.\r\n\r\nСюжет сам, то есть его, скажем так, скелет мне не очень понравился. Это простой такой знаете шаблон. Но завуалирован он классно. Мне понравилось как эта история была подана. Со всей простотой и бородатостью ситуации помогла справиться неплохая составляющая самого процесса. Смысл ее в том, что весь процесс выживания построен на том, что необходимо передвигаться перебежками от одного укрытия к другому, валить пачками обычных и бронированных врагов и отдавать приказы своим товарищам. Вроде бы тоже ничего нового, но мне понравилось.', 'Видеоряд \\ Видосики\r\n\r\nЭта часть игры представлена исключительно внутриигровыми кат-сценами. Сделано все достаточно хорошо (ну не могу я сказать ничего плохого про свой любимый Unreal Engine 3). Картинка на уровне графики самого геймплея, так что перехода от процесса игры к видео вы не заметите.\r\n\r\nАудиоряд \\ Звуки \\ Голоса\r\n\r\nИгра полностью локализована, спасибо 1С. Голоса в игре подобраны просто изумительно. Не, серьезно. Тут и интонации и профессиональная подача текста, с выражением и выделением знаков препинания. Классно. А вот со стороны звуков оружия разработчики допустили ошибку, которую вообще не  очень заметно по ходу игры, но она все-таки есть. Это звуки огня оружия. Они практически идентичны друг другу будь то пистолет или винтовка. Вот здесь действительно промашка.\r\n\r\nГрафическая начинка \\ Графика\r\n\r\nГрафика понравилась. Это же Unreal Engine 3 все-таки. По качеству картинки могу сказать одно – отлично. Никаких проблем, как обычно у этого движка я не увидел. С текстурами проблем не было, с отображением игрового мира и анизотропной фильтрацией тоже. Спасибо, создатели этого классного игрового движка.\r\n\r\nИскусственный интеллект \\ Мозговая начинка\r\n\r\nВраги в игре многих видов и действуют они все по разному. Кто-то прет лоб в лоб, кто-то прячется также как и вы за укрытиями. Следовательно и мозги у всех построены по-разному. Но, тем не менее, никаких оплошностей враг себе не позволит. Ну  или вы ему что-то не позволите. В общем, все в порядке. Хотя, честно говоря, под таким напором врагов как в парочке мест на карте, я погибал так много раз ,что мне  не один раз предлагали сменить сложность игры.\r\n\r\nЗаключение\r\n\r\nНу что ж, пожалуй это все. Игра мне понравилась, ставлю ей четверку, поскольку понравилось бегать сквозь пески и расстреливать врагов, но изъяны в игре все же есть. Опять же каждый найдет в игре что-то свое. Хотя и без этого многие кто в нее играли и прошли или хотя бы начали играть скажут что-то типа «графа не очень», «сюжет не очень», «геймплей не очень» и т.п. Я не из таких, я ищу в каждой игре что-то такое, что держит у экрана все время и мне абсолютно плевать на такие глобальные вещи, как например графика. Поэтому я и ставлю высокие оценки играм.\r\n\r\nСпасибо, что были со мной эти пару-тройку минут, надеюсь вам понравилось.\r\n\r\nДобавляйтесь в друзья, читайте обзоры, ставьте лайки, спрашивайте если есть что по поводу игры. Всем спасибо что дочитали до конца. И помните – играйте честно и по-джентельменски, ведь и вы когда-то были нубом. С вами был я, Okokok-man, увидимся в реальной и виртуальной. Всем пока!', 'images/rev6-1.jpg', 'images/rev6-2.jpg', '', 'https://www.youtube.com/embed/_WKZr712xoI');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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