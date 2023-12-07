-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 06 2023 г., 20:39
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cinimakg`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cinima`
--

CREATE TABLE `cinima` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `cinima`
--

INSERT INTO `cinima` (`id`, `name`, `adress`, `image`) VALUES
(1, 'Фауна', 'Москва М алтуфьево', 'https://s1.kinoteatr.ru/upload/c1/00/00/00/00/_DSC0294.jpg'),
(2, 'Big', 'Москва Войсковсая', 'https://s1.kinoteatr.ru/upload/c1/00/00/00/00/_DSC0344.JPG'),
(3, 'Litleboy', 'Москва Ул Зои', 'https://www.waypark.ru/upload/iblock/383/3835a64b2ba2407fd0ff9d47174d3fb0.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `film`
--

CREATE TABLE `film` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `colposition` int NOT NULL,
  `rating` int NOT NULL,
  `info` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `actors` text NOT NULL,
  `genre` text NOT NULL,
  `img` text NOT NULL,
  `price` int NOT NULL,
  `formD` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `film`
--

INSERT INTO `film` (`id`, `name`, `date`, `time`, `colposition`, `rating`, `info`, `author`, `actors`, `genre`, `img`, `price`, `formD`) VALUES
(1, 'Шан-чи и легенда десяти колец', '2027-10-23', '10:10:00', 26, 14, 'Мастеру боевых искусств Шан-Чи предстоит противостоять призракам из собственного прошлого, по мере того как его втягивают в паутину интриг таинственной организации «Десять колец».', 'Дестин Креттон1', 'Мишель Йео, Нора Лам (Аквафина), Симу Лю, Флориан Мунтяну, Тони Люн', 'Боевик, Приключения, Фантастика, Фэнтези', ' https://upload.wikimedia.org/wikipedia/ru/5/5c/%D0%A8%D0%B0%D0%BD-%D0%A7%D0%B8_%D0%BE%D1%84%D0%B8%D1%86%D0%B8%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B9_%D0%BF%D0%BE%D1%81%D1%82%D0%B5%D1%80.jpg', 400, '3D'),
(2, 'Дюна', '2023-10-18', '00:00:00', 30, 8, 'Наследник знаменитого дома Атрейдесов Пол отправляется вместе с семьей на одну из самых опасных планет во Вселенной – Арракис. Здесь нет ничего, кроме песка, палящего солнца, гигантских чудовищ…и основной причины межгалактических конфликтов – невероятно ценного ресурса, который называется меланж. В результате захвата власти Пол вынужден бежать и скрываться, и это становится началом его эпического путешествия. Враждебный мир Арракиса приготовил для него множество тяжелых испытаний, но только тот, кто готов взглянуть в глаза своему страху, достоин стать избранным.', 'Дени Вильнёв', 'Джейсон Момоа, Тимоти Шаламе, Ребекка Фергюсон, Джош Бролин, Зендея Коулман', 'Драма, Приключения, Фантастика ', ' https://upload.wikimedia.org/wikipedia/ru/f/f1/%D0%94%D1%8E%D0%BD%D0%B0_%D0%BE%D1%84%D0%B8%D1%86%D0%B8%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B9_%D0%BF%D0%BE%D1%81%D1%82%D0%B5%D1%80.jpg', 400, '2D'),
(3, 'Гладиатор', '2023-10-19', '39:00:00', 30, 9, 'Генерал, ставший рабом. Раб, ставший гладиатором. Гладиатор, бросивший вызов империи. Культовая историческая драма Ридли Скотта, удостоенная 5 «Оскаров», выходит в повторный прокат в кинотеатры на языке оригинала с русскими субтитрами. Картина о чести, доблести, любви и свободе, которая сделала исполнителя главной роли Рассела Кроу знаменитым на весь мир и принесла главную награду американской киноакадемии. Лучший генерал Римской империи Максимус призван исполнить волю императора и передать власть Сенату, положив конец деспотии. Но в результате придворных интриг, отважный полководец, способный сокрушить в бою любого врага, оказывается предан и приговорен к смерти, а его семья жестоко убита. Чудом избежав смерти, Максимум становится гладиатором. Снискав славу в кровавых поединках, он оказывается в знаменитом римском Колизее, на арене которого он встретится в смертельной схватке со своим заклятым врагом, новым императором Коммодом, захватившим власть в Риме...', 'Ридли Скотт', 'Рассел Кроу, Хоакин Феникс, Конни Нильсен, Оливер Рид, Ричард Харрис', 'Историческая Драма', 'https://thumbs.dfs.ivi.ru/storage5/contents/f/f/a25d79e863f02b100cf0b6a2cbd1f3.jpg', 350, '3D'),
(6, 'Не время умирать', '2023-10-26', '15:00:00', 25, 7, 'Бонд оставил оперативную службу и наслаждается спокойной жизнью на Ямайке. Все меняется, когда на островепоявляется его старый друг Феликс Лейтер из ЦРУ с просьбой о помощи. Миссия по спасению похищенного ученого оказывается опаснее, чем предполагалось изначально. Бонд попадает в ловушку к таинственному злодею, который владеет уникальным технологическим оружием.', 'Кэри Фукунага', 'Дэниэл Крэйг, Рами Малек, Леа Сейду, Лашана Линч, Бен Уишоу, Наоми Харрис, Джеффри Райт, Кристоф Вальц, Рэйф Файнс, Рори Киннер, Ана де Армас, Дали Бенссалах, Дэвид Денсик, Билли Магнуссен', 'Боевик, Приключения, Триллер', 'https://upload.wikimedia.org/wikipedia/ru/f/fe/No_Time_to_Die_poster.jpg', 300, '2D'),
(7, 'Веном 2', '2023-10-28', '08:00:00', 30, 6, 'Том Харди возвращается на большие экраны в роли Венома - одного из величайших и самых противоречивых героев вселенной MARVEL. Режиссером продолжения стал Энди Серкис, главные роли также сыграли Мишель Уильямс, Наоми Харрис и Вуди Харрельсон - суперзлодей Клетус Кэседи/Карнаж.', 'Энди Серкис', 'Том Харди, Мишель Уильямс, Вуди Харрельсон, Наоми Харрис, Стивен Грэм', 'Триллер, Ужасы, Фантастика, Экшн', 'https://upload.wikimedia.org/wikipedia/ru/8/8e/Venom_-_Let_There_Be_Carnage.jpg', 400, '4D');

-- --------------------------------------------------------

--
-- Структура таблицы `slider`
--

CREATE TABLE `slider` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `ticket`
--

CREATE TABLE `ticket` (
  `id` int NOT NULL,
  `idUser` int NOT NULL,
  `film` varchar(50) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `cinima` varchar(50) NOT NULL,
  `selectedpos` int NOT NULL,
  `colhuman` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `ticket`
--

INSERT INTO `ticket` (`id`, `idUser`, `film`, `time`, `date`, `cinima`, `selectedpos`, `colhuman`) VALUES
(1, 1, '', '15:00:00', '2023-10-25', ' Фауна', 5, 1),
(2, 1, '6', '15:00:00', '2023-10-26', ' Фауна', 5, 1),
(3, 2, '3', '19:30:00', '2023-10-25', ' Фауна', 30, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `role`) VALUES
(1, 'admin', 'b59c67bf196a4758191e42f76670ceba', 'Nikea ', 'admin'),
(2, 'Dani', 'b59c67bf196a4758191e42f76670ceba', 'Nike', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cinima`
--
ALTER TABLE `cinima`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ticket`
--
ALTER TABLE `ticket`
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
-- AUTO_INCREMENT для таблицы `cinima`
--
ALTER TABLE `cinima`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `film`
--
ALTER TABLE `film`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
