-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июл 18 2017 г., 01:44
-- Версия сервера: 10.1.13-MariaDB
-- Версия PHP: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `books_library_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `name` varchar(200) NOT NULL,
  `books` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`name`, `books`, `id`) VALUES
('Aurhor1', 'Book 1/Book New/For Aurhor1/Book Y/buubuib/ehjvebyih/Reedmy', 6),
('author 2', 'Book 1/Title 333/qwerty/zxc/asd/mnb/ert', 7),
('author 3', 'Book New/Book New', 8),
('author 4', 'Book New/Title 333', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `book_title` varchar(200) NOT NULL,
  `book_authors` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`book_title`, `book_authors`, `id`) VALUES
('Book 1', 'Aurhor1', 13),
('Book 1', 'author 2', 14),
('Book New', 'Aurhor1', 15),
('Book New', 'author 3', 16),
('Book New', 'Author 3', 17),
('Book New', 'author 4', 18),
('For Aurhor1', 'Aurhor1', 20),
('Book Y', 'Aurhor1', 21),
('buubuib', 'Aurhor1', 22),
('ehjvebyih', 'Aurhor1', 23),
('Reedmy', 'Aurhor1', 24),
('Title 333', 'author 2', 25),
('Title 333', 'author 4', 26),
('qwerty', 'author 2', 27),
('zxc', 'author 2', 28),
('asd', 'author 2', 29),
('mnb', 'author 2', 30),
('ert', 'author 2', 31);

--
-- Триггеры `books`
--
DELIMITER $$
CREATE TRIGGER ```before_Insert_books` BEFORE INSERT ON `books` FOR EACH ROW BEGIN
DECLARE count INT DEFAULT 0;
SELECT COUNT(*) INTO count FROM `authors` WHERE `name`= NEW.book_authors;
IF count = 0 THEN
INSERT INTO `authors` (name , `books`) VALUE (NEW.book_authors,NEW.book_title);
ELSE 
SET @oldbookstr=(SELECT `books` FROM `authors` WHERE `name`= NEW.book_authors);
UPDATE `authors` SET `books` =CONCAT_WS("/",@oldbookstr,NEW.book_title)  WHERE `authors`.`name`= NEW.book_authors;
END IF;
END
$$
DELIMITER ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
