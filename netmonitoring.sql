-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 21 2025 г., 11:51
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `netmonitoring`
--

-- --------------------------------------------------------

--
-- Структура таблицы `devices`
--

CREATE TABLE `devices` (
  `id` int NOT NULL,
  `ip` varchar(15) NOT NULL,
  `x` int NOT NULL,
  `y` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `switch_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `devices`
--

INSERT INTO `devices` (`id`, `ip`, `x`, `y`, `status`, `switch_id`) VALUES
(1, '194.85.202.141', 1362, 454, 0, 11),
(2, '192.168.1.1', 464, 98, 1, NULL),
(3, '192.168.1.1', 603, 422, 1, NULL),
(4, '148.881.1.1', 1122, 190, 0, 11),
(5, '192.168.1.1', 306, 580, 1, NULL),
(6, '148.881.1.1', 1093, 502, 0, NULL),
(7, '192.168.1.1', 1446, 393, 1, NULL),
(8, '192.168.1.1', 842, 233, 1, NULL),
(9, '192.168.1.1', 1096, 652, 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `switches`
--

CREATE TABLE `switches` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `x` int NOT NULL,
  `y` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `switches`
--

INSERT INTO `switches` (`id`, `name`, `x`, `y`, `status`) VALUES
(11, 'Тестовый', 193, 88, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telnum` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `telnum`, `password`, `isAdmin`) VALUES
(1, 'admin', 'admin', 'isip_a.l.kravcov@mpt.ru', '89671728411', '$2y$10$QeWRmf6pM6YwQ29.GtbV5.4DowMlIKlkhb/VJnFtljnofgPjASmjy', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `switch_id` (`switch_id`);

--
-- Индексы таблицы `switches`
--
ALTER TABLE `switches`
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
-- AUTO_INCREMENT для таблицы `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `switches`
--
ALTER TABLE `switches`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `devices_ibfk_1` FOREIGN KEY (`switch_id`) REFERENCES `switches` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
