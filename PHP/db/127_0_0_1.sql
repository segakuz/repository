-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 27 2018 г., 16:03
-- Версия сервера: 5.6.34
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `itmo_db`
--
CREATE DATABASE IF NOT EXISTS `itmo_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `itmo_db`;

-- --------------------------------------------------------

--
-- Структура таблицы `authorization`
--

CREATE TABLE `authorization` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authorization`
--

INSERT INTO `authorization` (`id`, `name`, `login`, `password`) VALUES
(2, 'Sergei Kuznetsov', 'segakuz', '202cb962ac59075b964b07152d234b70'),
(3, 'guest', 'guest', '5f4dcc3b5aa765d61d8327deb882cf99'),
(4, 'user', 'user', 'ee11cbb19052e40b07aac0ca060c23ee');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_users`, `name`, `login`, `age`, `email`) VALUES
(1, 'Sergei', 'segakuz', 30, 'segakuz@mail.ru'),
(2, 'Oxana', 'makoks', 30, 'makoks@mail.ru'),
(20, 'Motya', 'motya', 7, 'moty@mail.ru'),
(33, 'Huyuser', 'usver', 88, 'user@user.u'),
(34, '5', '5', 5, '5'),
(35, '6', '6', 6, '6'),
(36, '7', '7', 7, '7'),
(37, '8', '8', 8, '8'),
(38, '9', '9', 9, '9'),
(40, '10', '10', 10, '10'),
(41, '11', '11', 11, '11'),
(42, '12', '12', 12, '12'),
(43, '13', '13', 13, '13'),
(44, '14', '14', 14, '14'),
(52, '15', '15', 15, '15'),
(53, '16', '16', 16, '16'),
(54, '17', '17', 17, '17'),
(57, '18', '18', 18, '18'),
(58, '19', '19', 19, '19'),
(59, '20', '20', 20, '20'),
(61, '21', '21', 21, '21'),
(62, '22', '22', 22, '22'),
(63, '23', '23', 23, '23'),
(65, '24', '24', 24, '24'),
(66, '25', '25', 25, '25'),
(67, '26', '26', 26, '26'),
(68, '27', '27', 27, '27'),
(69, '28', '28', 28, '28'),
(70, '29', '29', 29, '29'),
(71, '30', '30', 30, '30'),
(73, '31', '31', 31, '31');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authorization`
--
ALTER TABLE `authorization`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authorization`
--
ALTER TABLE `authorization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;--
-- База данных: `library`
--
CREATE DATABASE IF NOT EXISTS `library` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `library`;

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE `author` (
  `id_author` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`id_author`, `name`) VALUES
(1, 'Эрик Фримен'),
(2, 'Элизабет Робсон'),
(3, 'Дэвид Макфарланд'),
(4, 'Беэр Бибо'),
(5, 'Иегуда Кац'),
(6, 'Аурелио де Роза'),
(7, 'Линн Бейли'),
(8, 'Майкл Моррисон'),
(9, 'Мэтт Зандстра'),
(10, 'Дмитрий Котеров'),
(11, 'Игорь Симдянов'),
(12, 'Дэвид Скляр');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id_books` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id_books`, `title`) VALUES
(1, 'Изучаем программирование на html5'),
(2, 'Изучаем html, xhtml и css'),
(3, 'Большая книга css3'),
(4, 'Jquery в действии'),
(5, 'Javascript и jquery исчерпывающее руководство'),
(6, 'Изучаем php и mysql'),
(7, 'Изучаем sql'),
(8, 'PHP объекты, шаблоны и методики программирования'),
(9, 'PHP7 в подлиннике'),
(10, 'Изучаем PHP7');

-- --------------------------------------------------------

--
-- Структура таблицы `books_has_author`
--

CREATE TABLE `books_has_author` (
  `id_books` int(11) NOT NULL,
  `id_author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books_has_author`
--

INSERT INTO `books_has_author` (`id_books`, `id_author`) VALUES
(1, 1),
(2, 1),
(1, 2),
(2, 2),
(3, 3),
(5, 3),
(4, 4),
(4, 5),
(4, 6),
(6, 7),
(7, 7),
(6, 8),
(8, 9),
(9, 10),
(9, 11),
(10, 12);

-- --------------------------------------------------------

--
-- Структура таблицы `books_has_category`
--

CREATE TABLE `books_has_category` (
  `id_books` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books_has_category`
--

INSERT INTO `books_has_category` (`id_books`, `id_category`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 2),
(4, 3),
(5, 3),
(6, 4),
(8, 4),
(9, 4),
(10, 4),
(6, 5),
(7, 5),
(9, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `books_has_publisher`
--

CREATE TABLE `books_has_publisher` (
  `id_books` int(11) NOT NULL,
  `id_publisher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books_has_publisher`
--

INSERT INTO `books_has_publisher` (`id_books`, `id_publisher`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(7, 2),
(5, 3),
(6, 3),
(8, 4),
(9, 5),
(10, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `books_has_shelves`
--

CREATE TABLE `books_has_shelves` (
  `id_books` int(11) NOT NULL,
  `id_shelves` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books_has_shelves`
--

INSERT INTO `books_has_shelves` (`id_books`, `id_shelves`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 3),
(5, 3),
(6, 4),
(8, 4),
(9, 4),
(10, 4),
(7, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `name`) VALUES
(1, 'html'),
(2, 'css'),
(3, 'javascript'),
(4, 'php'),
(5, 'mysql');

-- --------------------------------------------------------

--
-- Структура таблицы `publisher`
--

CREATE TABLE `publisher` (
  `id_publisher` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `publisher`
--

INSERT INTO `publisher` (`id_publisher`, `name`) VALUES
(1, 'O\'Reilly'),
(2, 'Питер'),
(3, 'Эксмо'),
(4, 'Вильямс'),
(5, 'БХВ'),
(6, 'Диалектика');

-- --------------------------------------------------------

--
-- Структура таблицы `shelves`
--

CREATE TABLE `shelves` (
  `id_shelves` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shelves`
--

INSERT INTO `shelves` (`id_shelves`, `name`) VALUES
(1, 'Полка 1'),
(2, 'Полка 2'),
(3, 'Полка 3'),
(4, 'Полка 4'),
(5, 'Полка 5');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id_author`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_books`);

--
-- Индексы таблицы `books_has_author`
--
ALTER TABLE `books_has_author`
  ADD PRIMARY KEY (`id_books`,`id_author`),
  ADD KEY `fk_books_has_author_author1_idx` (`id_author`),
  ADD KEY `fk_books_has_author_books_idx` (`id_books`);

--
-- Индексы таблицы `books_has_category`
--
ALTER TABLE `books_has_category`
  ADD PRIMARY KEY (`id_books`,`id_category`),
  ADD KEY `fk_books_has_genre_genre1_idx` (`id_category`),
  ADD KEY `fk_books_has_genre_books1_idx` (`id_books`);

--
-- Индексы таблицы `books_has_publisher`
--
ALTER TABLE `books_has_publisher`
  ADD PRIMARY KEY (`id_books`,`id_publisher`),
  ADD KEY `fk_books_has_publisher_publisher1_idx` (`id_publisher`),
  ADD KEY `fk_books_has_publisher_books1_idx` (`id_books`);

--
-- Индексы таблицы `books_has_shelves`
--
ALTER TABLE `books_has_shelves`
  ADD PRIMARY KEY (`id_books`,`id_shelves`),
  ADD KEY `fk_books_has_shelves_shelves1_idx` (`id_shelves`),
  ADD KEY `fk_books_has_shelves_books1_idx` (`id_books`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id_publisher`);

--
-- Индексы таблицы `shelves`
--
ALTER TABLE `shelves`
  ADD PRIMARY KEY (`id_shelves`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `id_author` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id_books` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id_publisher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `shelves`
--
ALTER TABLE `shelves`
  MODIFY `id_shelves` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `books_has_author`
--
ALTER TABLE `books_has_author`
  ADD CONSTRAINT `fk_books_has_author_author1` FOREIGN KEY (`id_author`) REFERENCES `author` (`id_author`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_books_has_author_books` FOREIGN KEY (`id_books`) REFERENCES `books` (`id_books`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `books_has_category`
--
ALTER TABLE `books_has_category`
  ADD CONSTRAINT `fk_books_has_genre_books1` FOREIGN KEY (`id_books`) REFERENCES `books` (`id_books`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_books_has_genre_genre1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `books_has_publisher`
--
ALTER TABLE `books_has_publisher`
  ADD CONSTRAINT `fk_books_has_publisher_books1` FOREIGN KEY (`id_books`) REFERENCES `books` (`id_books`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_books_has_publisher_publisher1` FOREIGN KEY (`id_publisher`) REFERENCES `publisher` (`id_publisher`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `books_has_shelves`
--
ALTER TABLE `books_has_shelves`
  ADD CONSTRAINT `fk_books_has_shelves_books1` FOREIGN KEY (`id_books`) REFERENCES `books` (`id_books`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_books_has_shelves_shelves1` FOREIGN KEY (`id_shelves`) REFERENCES `shelves` (`id_shelves`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
