-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 25 2016 г., 01:38
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
CREATE DATABASE IF NOT EXISTS `site` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `site`;

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
(9, 'Ректор', 'Вы охуели тут , петушня или как ?', '2016-05-21'),
(10, 'Евгений', 'хай', '2016-05-21'),
(11, 'Девочка', 'Привет&quot;', '2016-05-23'),
(12, 'Даша', 'привет\'', '2016-05-23');

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
  `image` blob NOT NULL,
  `isAdmin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `faq`
--
ALTER TABLE `faq`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `stories`
--
ALTER TABLE `stories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
