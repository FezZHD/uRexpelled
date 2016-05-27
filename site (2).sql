-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 27 2016 г., 18:26
-- Версия сервера: 5.6.30
-- Версия PHP: 5.5.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comment_db`
--

CREATE TABLE `comment_db` (
  `comment_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `comment_text` text NOT NULL,
  `date_add` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment_db`
--

INSERT INTO `comment_db` (`comment_id`, `user_name`, `comment_text`, `date_add`) VALUES
(2, 'FezZ', 'Привет', '2016-05-21'),
(4, 'Женя', 'Привет', '2016-05-21'),
(5, 'Лёшка', 'ты питух', '2016-05-21'),
(6, 'лол', 'кек', '2016-05-21'),
(7, 'кек', 'азазаз', '2016-05-21'),
(8, 'петух', 'кокококок, качалочка', '2016-05-21'),
(10, 'Евгений', 'хай', '2016-05-21');

-- --------------------------------------------------------

--
-- Структура таблицы `faq`
--

CREATE TABLE `faq` (
  `ID` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `faq`
--

INSERT INTO `faq` (`ID`, `question`, `answer`) VALUES
(1, 'Почему меня исключают?', 'Я что, знаю, почему тебя исключает, наверно , потомучто ты нихрена не делал весь семестр , дебил.'),
(2, 'Зачем этот сайт?', 'Чтобы побыстрее от тебя избавиться');

-- --------------------------------------------------------

--
-- Структура таблицы `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `login` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `counter` int(11) NOT NULL,
  `image` text,
  `isAdmin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `login`
--

INSERT INTO `login` (`ID`, `login`, `email`, `password`, `name`, `counter`, `image`, `isAdmin`) VALUES
(8, 'tolya', 'zhenya5353@gmail.ru', 'c5e67d6d7bdd305452a9322ac519b337', 'Толя', 2, '../media/----189479-350x331.jpeg.jpg', 0),
(10, 'fezz', 'zhenya535@gmail.com', 'c5e67d6d7bdd305452a9322ac519b337', 'Евгений', 0, '../media/2.jpg.jpg', 0),
(11, 'kek', 'kek@kek.com', '29b5e495d0d5b588b9d8223888d01ab6', 'Саша', 0, '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `restore_table`
--

CREATE TABLE `restore_table` (
  `ID` int(11) NOT NULL,
  `email` text CHARACTER SET utf8 NOT NULL,
  `restore_id` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `stories`
--

CREATE TABLE `stories` (
  `story_title` text NOT NULL,
  `story_text` text NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stories`
--

INSERT INTO `stories` (`story_title`, `story_text`, `ID`) VALUES
('Дорога приключений.', 'Когда-то и меня вела дорога приключений. А потом мне прострелили колено)', 1),
('Мечта', 'Написать сайт за ночь.', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comment_db`
--
ALTER TABLE `comment_db`
  ADD PRIMARY KEY (`comment_id`);

--
-- Индексы таблицы `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `restore_table`
--
ALTER TABLE `restore_table`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comment_db`
--
ALTER TABLE `comment_db`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `faq`
--
ALTER TABLE `faq`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `restore_table`
--
ALTER TABLE `restore_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `stories`
--
ALTER TABLE `stories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
