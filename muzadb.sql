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
-- База данных: `muzadb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paragraph` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `paragraph`, `image`, `user`) VALUES
(1, 'Тесткейс для курсовой 2', 'Тесткейс для курсовой', 'uploads/1740072576image-700x400.gif', 38),
(2, 'Тест 2', 'АААААААААААА', 'uploads/1719939515sliderpic2.jpg', NULL),
(3, 'Запись', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'uploads/sliderpic3.jpg', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` int NOT NULL,
  `permission` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `permission`) VALUES
(1, 'user'),
(2, 'administrator');

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

CREATE TABLE `requests` (
  `id` int NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `requests`
--

INSERT INTO `requests` (`id`, `title`, `text`, `timestamp`, `user`) VALUES
(4, 'тест1', 'тесттекст1', '2024-07-03 19:43:10', 38),
(5, 'тест1', 'тесттекст1', '2024-07-03 19:43:53', 38),
(6, 'Еще один тест', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper et erat ac hendrerit. In a bibendum tellus. Sed venenatis turpis quis venenatis scelerisque. Integer at libero ex. Sed ullamcorper placerat facilisis. Aenean tempus gravida ultrices. Donec pharetra ex eu ipsum cursus bibendum. Nunc condimentum, felis eu hendrerit lobortis, justo tellus auctor leo.', '2024-07-03 20:20:22', 38),
(7, 'для отчета', 'текст текст текст текст текст текст текст теккст тектст ткетст тексчт', '2024-07-04 00:24:50', 38),
(8, 'тесткейс2', 'тесткейс2 тесткейс2 тесткейс2 тесткейс2 тесткейс2 тесткейс2 тесткейс2 тесткейс2 тесткейс2 тесткейс2 тесткейс2 тесткейс2 тесткейс2 тесткейс2', '2024-07-04 02:08:14', 39),
(9, 'Еще один тест кей', 'ОЧЕРЕДНОЙ', '2024-07-04 03:38:14', 38),
(10, '12313', '12`33123`1', '2024-07-04 03:43:25', 40),
(11, 'аупцпап', 'пукцупцуцуп', '2025-02-20 04:33:36', 38),
(12, 'Курсовая', 'Тесткейс', '2025-02-20 06:31:36', 38),
(13, '12312', '132412', '2025-04-16 02:36:36', 38);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telnum` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` int NOT NULL DEFAULT '1',
  `reg_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `telnum`, `password`, `permission`, `reg_timestamp`) VALUES
(37, 'test', 'test', 'test@test.ru', '89671728412', '$2y$10$FPIrcKyJsirkzpAwiuaite4ItnoFH5zZn6JjWwcVflNTS5.PyvL1.', 1, '2024-06-28 01:42:08'),
(38, 'Артем', 'Temb14', 'isip_a.l.kravcov@mpt.ru', '89671728411', '$2y$10$3W6SYvO36uSY1uLzFx8m0elC0L.JUa1iF6VF/wbxC.O5.WovtH.l2', 2, '2024-07-02 10:07:00'),
(39, 'тесткейс1', 'тесткейс1', 'test@test.com', '89671728417', '$2y$10$Vo3kM7CEnUD9up6riQ9JyOW2bNlFSWE15RIXv.biPZpNagcASGdwK', 1, '2024-07-04 02:01:57'),
(40, 'test', 'test2222', 'test2222@test.com', '89671728423', '$2y$10$jrsMfkoannQiov7BVlt1POPtObBSn6/8LaGFRPvyIEJF8MQxylgSy', 1, '2024-07-04 03:42:36'),
(41, '123123', '123123', 'artem.kravt@gmail.com', '89671728413', '$2y$10$v.PvKwelUcLj2kp4Fnqjv.cqIdRnSEOTveE1QkawcFb7GoFa8..SW', 1, '2025-04-16 02:37:04');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission` (`permission`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`permission`) REFERENCES `permissions` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
