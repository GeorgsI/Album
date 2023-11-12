-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 12 2023 г., 13:03
-- Версия сервера: 8.0.29
-- Версия PHP: 8.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `photolists`
--

-- --------------------------------------------------------

--
-- Структура таблицы `album`
--

CREATE TABLE `album` (
  `id_album` int NOT NULL,
  `title_album` varchar(150) NOT NULL,
  `description_album` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `album`
--

INSERT INTO `album` (`id_album`, `title_album`, `description_album`) VALUES
(1, 'Природа.', 'Альбом посвящён природе.'),
(2, 'Автомобили', 'Альбом посвящён автомобилям.'),
(26, 'Цветы', '3443'),
(27, 'Горы', 'апапа'),
(28, 'Небо', 'ке');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id_comments` int NOT NULL,
  `id_user` int NOT NULL,
  `id_material` int NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id_comments`, `id_user`, `id_material`, `comment`) VALUES
(38, 4, 23, ' Лес'),
(39, 4, 21, 'Дорога в поле.'),
(40, 4, 24, ' BMW'),
(41, 4, 28, 'Рассвет в лесу............'),
(42, 4, 22, ' nevfy');

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

CREATE TABLE `photo` (
  `id_photo` int NOT NULL,
  `title_photo` varchar(150) NOT NULL,
  `linck_photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `albumID` int NOT NULL,
  `likes` int NOT NULL,
  `dislike` int NOT NULL,
  `viwe` int NOT NULL,
  `comments` int NOT NULL,
  `description` varchar(255) NOT NULL,
  `Min_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `photo`
--

INSERT INTO `photo` (`id_photo`, `title_photo`, `linck_photo`, `albumID`, `likes`, `dislike`, `viwe`, `comments`, `description`, `Min_img`) VALUES
(21, 'Дорога', '\\PhotoLists\\Photo\\Природа.\\653f6c1dd988a1679522133_bogatyr-club-p-belarus-priroda-foni-instagram-5.jpg', 1, 0, 0, 58, 1, 'Пейзаж с дорогой в поле.', '\\PhotoLists\\Photo\\Природа.\\Min653f6c1dd988a1679522133_bogatyr-club-p-belarus-priroda-foni-instagram-5.jpg'),
(22, 'Туман', '\\PhotoLists\\Photo\\Природа.\\653f6c4f0fa23l66gow8nhlnenr43bas8x57ng424579b.jpg', 1, 1, 0, 48, 1, 'Завораживающий пейзаж с туманом и рассветом.', '\\PhotoLists\\Photo\\Природа.\\Min653f6c4f0fa23l66gow8nhlnenr43bas8x57ng424579b.jpg'),
(23, 'Лес', '\\PhotoLists\\Photo\\Природа.\\653f6c9d1fb853pNEW.jpg', 1, 0, 0, 68, 1, 'Пейзаж леса.', '\\PhotoLists\\Photo\\Природа.\\Min653f6c9d1fb853pNEW.jpg'),
(24, 'BMW', '\\PhotoLists\\Photo\\Автомобили\\653f6cf11998etmb_347971_445690.jpg', 2, 1, 0, 142, 1, 'Фотография BMW', '\\PhotoLists\\Photo\\Автомобили\\Min653f6cf11998etmb_347971_445690.jpg'),
(25, 'BMW', '\\PhotoLists\\Photo\\Автомобили\\653f6d04e6e9435243-2015_bmw_i8-2019_bmw_i8-sportkar-lichnyj_roskoshnyj_avtomobil-bmw_i-500x.jpg', 2, 1, 0, 133, 0, 'Фотография BMW2', '\\PhotoLists\\Photo\\Автомобили\\Min653f6d04e6e9435243-2015_bmw_i8-2019_bmw_i8-sportkar-lichnyj_roskoshnyj_avtomobil-bmw_i-500x.jpg'),
(27, 'Небо', '\\PhotoLists\\Photo\\Небо\\654bf563e1153sky.jpg', 28, 0, 0, 0, 0, 'Чистое небо.', '\\PhotoLists\\Photo\\Небо\\Min654bf563e1153sky.jpg'),
(28, 'Рассвет', '\\PhotoLists\\Photo\\Природа.\\6550876e9c285рассвет.jpg', 1, 0, 0, 13, 1, 'Рассвет в лесу', '\\PhotoLists\\Photo\\Природа.\\Min6550876e9c285рассвет.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `rating`
--

CREATE TABLE `rating` (
  `id_rating` int NOT NULL,
  `id_user` int NOT NULL,
  `id_material` int NOT NULL,
  `grade` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `rating`
--

INSERT INTO `rating` (`id_rating`, `id_user`, `id_material`, `grade`) VALUES
(103, 1, 22, 1),
(104, 1, 24, 1),
(113, 1, 25, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `user`, `password`, `login`) VALUES
(1, 'Yra', 'Yra12345', 'Yra12'),
(2, 'Masha', 'Masha123', 'Masha12'),
(3, 'Егор', '$2y$10$Hcoi3D0Ntd.Jq.o6C13KPe30jPlyMrZdgyuxgg5pCOn5CSF2iKtvu', '11111111'),
(4, 'Yra123', '$2y$10$f2smZEfixPYg.QdV2Aybs.t5maK6Cpdd3mellJmOkBd1qTOImILu6', 'Yra123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comments`),
  ADD KEY `id_material` (`id_material`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id_photo`),
  ADD KEY `albumID` (`albumID`);

--
-- Индексы таблицы `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_material` (`id_material`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comments` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `photo`
--
ALTER TABLE `photo`
  MODIFY `id_photo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_material`) REFERENCES `photo` (`id_photo`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`albumID`) REFERENCES `album` (`id_album`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`id_material`) REFERENCES `photo` (`id_photo`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
