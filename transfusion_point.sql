-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 25 2021 г., 19:13
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `transfusion_point`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blood_bank`
--

CREATE TABLE `blood_bank` (
  `id_b` int NOT NULL,
  `id_donation` int NOT NULL,
  `amount` double NOT NULL DEFAULT '0.5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `blood_bank`
--

INSERT INTO `blood_bank` (`id_b`, `id_donation`, `amount`) VALUES
(17, 38, 0.5),
(18, 39, 0.5),
(19, 40, 0.5),
(21, 42, 0.5),
(22, 43, 0.5);

-- --------------------------------------------------------

--
-- Структура таблицы `donations`
--

CREATE TABLE `donations` (
  `id_donation` int NOT NULL,
  `id_d` int DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `donations`
--

INSERT INTO `donations` (`id_donation`, `id_d`, `date`) VALUES
(38, 1, '2021-05-21 00:00:00'),
(39, 16, '2021-05-13 00:00:00'),
(40, 12, '2021-05-18 00:00:00'),
(41, 14, '2021-05-01 00:00:00'),
(42, 18, '2021-05-16 00:00:00'),
(43, 14, '2021-05-25 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `donors`
--

CREATE TABLE `donors` (
  `id_d` int NOT NULL,
  `middle_name` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `age` int NOT NULL,
  `blood_type` int DEFAULT NULL,
  `rh` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `donors`
--

INSERT INTO `donors` (`id_d`, `middle_name`, `first_name`, `last_name`, `age`, `blood_type`, `rh`, `tel`) VALUES
(1, 'Новиков', 'Николай', 'Алексеевич', 18, 1, '-', 89994720910),
(12, 'Фандорин', 'Сергей', 'Отчество', 97, 2, '+', 89993334444),
(14, 'aaaa', 'bbbb', 'cccc', 18, 4, '+', 88888888888),
(16, 'Валерия', 'Матвеева', 'Валерьевна', 19, 3, '-', 87818165918),
(18, 'Александр', 'Белов', 'Олегович', 20, 2, '-', 89604428829);

-- --------------------------------------------------------

--
-- Структура таблицы `patient`
--

CREATE TABLE `patient` (
  `id_p` int NOT NULL,
  `middle_name` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `age` int NOT NULL,
  `blood_type` int DEFAULT NULL,
  `rh` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `patient`
--

INSERT INTO `patient` (`id_p`, `middle_name`, `first_name`, `last_name`, `age`, `blood_type`, `rh`, `tel`) VALUES
(1, 'Николай', 'Новиков', 'Алексеевич', 19, 1, '-', 89994720910),
(2, 'Петров', 'Иван', 'Артемович', 56, 1, '+', 84565484233),
(3, 'Петров', 'Виталий', 'Витальевич', 19, 3, '-', 89798798546),
(4, 'Капитан', 'Прайс', 'Дверчик', 17, 4, '-', 89994165461),
(5, 'Владимира', 'Матвеева', 'Валерьевна', 17, 4, '+', 89464646871),
(6, 'Головченко', 'Василий', 'Ахмедович', 19, 3, '+', 89456513215);

-- --------------------------------------------------------

--
-- Структура таблицы `transfusion`
--

CREATE TABLE `transfusion` (
  `id_tr` int NOT NULL,
  `id_p` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `transfusion`
--

INSERT INTO `transfusion` (`id_tr`, `id_p`) VALUES
(17, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blood_bank`
--
ALTER TABLE `blood_bank`
  ADD PRIMARY KEY (`id_b`),
  ADD UNIQUE KEY `id_b` (`id_b`),
  ADD KEY `id_donation` (`id_donation`);

--
-- Индексы таблицы `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id_donation`),
  ADD KEY `id_d` (`id_d`);

--
-- Индексы таблицы `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`id_d`),
  ADD UNIQUE KEY `id_d` (`id_d`);

--
-- Индексы таблицы `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id_p`),
  ADD UNIQUE KEY `id_p` (`id_p`);

--
-- Индексы таблицы `transfusion`
--
ALTER TABLE `transfusion`
  ADD PRIMARY KEY (`id_tr`),
  ADD UNIQUE KEY `id_tr` (`id_tr`),
  ADD KEY `id_p` (`id_p`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blood_bank`
--
ALTER TABLE `blood_bank`
  MODIFY `id_b` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `donations`
--
ALTER TABLE `donations`
  MODIFY `id_donation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `donors`
--
ALTER TABLE `donors`
  MODIFY `id_d` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `patient`
--
ALTER TABLE `patient`
  MODIFY `id_p` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `transfusion`
--
ALTER TABLE `transfusion`
  MODIFY `id_tr` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `blood_bank`
--
ALTER TABLE `blood_bank`
  ADD CONSTRAINT `blood_bank_ibfk_1` FOREIGN KEY (`id_donation`) REFERENCES `donations` (`id_donation`);

--
-- Ограничения внешнего ключа таблицы `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_ibfk_1` FOREIGN KEY (`id_d`) REFERENCES `donors` (`id_d`);

--
-- Ограничения внешнего ключа таблицы `transfusion`
--
ALTER TABLE `transfusion`
  ADD CONSTRAINT `transfusion_ibfk_1` FOREIGN KEY (`id_p`) REFERENCES `patient` (`id_p`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
