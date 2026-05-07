-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 28 2017 г., 15:26
-- Версия сервера: 5.5.53
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `coachme_new`
--

-- --------------------------------------------------------

--
-- Структура таблицы `eating`
--

CREATE TABLE `eating` (
  `id` int(11) NOT NULL,
  `time` time NOT NULL,
  `routineId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `eating`
--

INSERT INTO `eating` (`id`, `time`, `routineId`) VALUES
(1, '10:30:00', 0),
(94, '09:13:00', 2),
(95, '07:15:00', 4),
(96, '10:10:00', 4),
(103, '04:00:00', 6),
(104, '07:00:00', 6),
(105, '14:00:00', 6),
(106, '10:00:00', 7),
(107, '13:00:00', 7),
(108, '19:00:00', 7),
(109, '21:00:00', 7),
(114, '10:30:00', 9),
(115, '14:00:00', 9),
(116, '18:00:00', 9),
(117, '21:00:00', 9),
(118, '10:30:00', 10),
(119, '14:00:00', 10),
(120, '17:00:00', 10),
(121, '21:00:00', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `eatingprogram`
--

CREATE TABLE `eatingprogram` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `routine_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `eatingprogram`
--

INSERT INTO `eatingprogram` (`id`, `name`, `routine_id`) VALUES
(1, 'Тестовая программа питания', 1),
(2, 'Питание для моего распорядка', 1),
(3, 'Питание для моего распорядка', 1),
(4, 'Питание для моего распорядка', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `exercise`
--

CREATE TABLE `exercise` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `img` varchar(45) DEFAULT NULL,
  `video` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `exercise`
--

INSERT INTO `exercise` (`id`, `name`, `description`, `img`, `video`) VALUES
(1, 'Сгибание шеи лёжа на скамье', '<p>Одно из базовых упражнений для тренировки шеи. Выполняя упражнение необходимо разгибать и сгибать шею с полной амплитудой, плавно, без резких движений. Диск берите такой, чтобы вы могли выполнить хотя бы 10 повторений.</p>\r\n<br>\r\n<ol>\r\n<li>Лягте на скамью на спину так, чтобы плечи немного выступали за край скамьи.</li>\r\n<li>Диск положите на лоб, и во время выполнения упражнения придерживайте его руками.</li>\r\n<li>На вдохе - на полную амплитуда опустите голову вниз.</li>\r\n<li>На выдохе – за счет напряжения мышц шеи поднимите голову вверх, немного выше горизонтального положения.</li>\r\n<li>Повторите упражнение необходимое количество раз. </li>\r\n</ol>', '1.webp', NULL),
(2, 'Разгибание шеи лёжа на скамье', '', '2.webp', NULL),
(3, 'Тестовое упражнение без картинки', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `exercise_musculgroup`
--

CREATE TABLE `exercise_musculgroup` (
  `musculgroup_id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `exercise_musculgroup`
--

INSERT INTO `exercise_musculgroup` (`musculgroup_id`, `exercise_id`) VALUES
(1, 1),
(1, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `colories` int(11) DEFAULT NULL,
  `hidrocarbonats` int(11) DEFAULT NULL,
  `fats` int(11) DEFAULT NULL,
  `proteins` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `food`
--

INSERT INTO `food` (`id`, `name`, `colories`, `hidrocarbonats`, `fats`, `proteins`) VALUES
(1, 'Овсяная каша', 102, 10, 20, 20),
(2, 'Манная каша', 98, 34, 27, 47);

-- --------------------------------------------------------

--
-- Структура таблицы `musculgroup`
--

CREATE TABLE `musculgroup` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `musculgroup`
--

INSERT INTO `musculgroup` (`id`, `name`) VALUES
(1, 'Шея'),
(2, 'Трапеция'),
(3, 'Плечи'),
(4, 'Бицепс'),
(5, 'Грудь'),
(6, 'Предплечья'),
(7, 'Пресс'),
(8, 'Квадрицепсы'),
(9, 'Трицепс'),
(10, 'Широчайшие'),
(11, 'Ср. спина'),
(12, 'Ниж. спина'),
(13, 'Ягодицы'),
(14, 'Бедра'),
(15, 'Икры');

-- --------------------------------------------------------

--
-- Структура таблицы `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20170414183344, 'Initial', '2017-04-14 18:33:44', '2017-04-14 18:33:44', 0),
(20170424142124, 'SecondMigration', '2017-04-24 14:21:28', '2017-04-24 14:21:28', 0),
(20170609133010, 'NewMigration', '2017-06-09 13:30:13', '2017-06-09 13:30:13', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) NOT NULL,
  `sex` enum('male','female','') DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `growth` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `aimTrain` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT '0',
  `somatotype` int(11) DEFAULT NULL,
  `userId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `sex`, `age`, `growth`, `weight`, `aimTrain`, `active`, `somatotype`, `userId`) VALUES
(1, 'gtryjghfghjfgkhjfhgjj', 'male', 16, 160, 160, 1, 0, 1, 23),
(8, 'Настя', 'female', 22, 164, 58, 1, 0, 2, 7),
(9, 'Гриша', 'male', 36, 185, 88, 1, 0, 0, 7),
(11, 'профиль', 'male', 21, 180, 81, 0, 0, 2, 7),
(13, 'Test Profile', 'male', 18, 174, 55, 2, 0, 1, 10),
(19, 'вася', 'male', 25, 1600, 78, 2, 0, 1, 7),
(27, 'Мужицкий профиль', 'male', 25, 192, 84, 1, 0, 1, 14),
(28, 'new', NULL, NULL, NULL, NULL, NULL, 0, NULL, 4),
(29, 'Роман', 'male', 36, 178, 86, 1, 0, 2, 3),
(34, 'лели', 'female', 22, 180, 58, 1, 0, 2, 7),
(35, 'profile 1', 'male', 20, 170, 55, 2, 0, 1, 10),
(36, 'test', 'male', 25, 192, 84, 2, 0, 2, 14),
(37, 'ololo', NULL, 25, 192, 84, 2, 0, 2, 14),
(38, 'Новый тестовый профиль', 'male', 25, 192, 84, 1, 0, 2, 14),
(39, 'testprofile', 'male', 26, 189, 80, 2, 0, 2, 23),
(40, 'ggjhfyjgjkhujgkuyffgh', 'male', 34, 34, 34, 1, 0, 1, 23),
(41, 'тестовый профиль', NULL, NULL, NULL, NULL, NULL, 0, NULL, 23);

-- --------------------------------------------------------

--
-- Структура таблицы `routine`
--

CREATE TABLE `routine` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `wakeupTime` time NOT NULL,
  `trainTime` time NOT NULL,
  `eatCount` int(11) NOT NULL,
  `sleepTime` time NOT NULL,
  `active` tinyint(1) NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `routine`
--

INSERT INTO `routine` (`id`, `name`, `wakeupTime`, `trainTime`, `eatCount`, `sleepTime`, `active`, `userId`) VALUES
(1, 'тест', '10:00:00', '19:00:00', 4, '23:00:00', 0, 23),
(2, 'Первый', '07:09:00', '03:16:00', 3, '11:43:00', 0, 7),
(4, 'Второй', '08:59:00', '13:54:00', 2, '23:54:00', 1, 7),
(6, 'test', '06:00:00', '02:00:00', 3, '01:00:00', 0, 14),
(7, 'Test', '10:00:00', '18:00:00', 4, '23:00:00', 0, 23),
(8, 'тест', '10:00:00', '19:00:00', 4, '23:00:00', 0, 23),
(9, 'тест', '10:00:00', '19:00:00', 4, '23:00:00', 1, 23),
(10, 'Мой распорядок', '10:00:00', '19:00:00', 4, '23:00:00', 0, 23);

-- --------------------------------------------------------

--
-- Структура таблицы `routineeatingmenu`
--

CREATE TABLE `routineeatingmenu` (
  `eating_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `eatingprogram_id` int(11) NOT NULL,
  `day_number` int(11) NOT NULL,
  `cnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `routineeatingmenu`
--

INSERT INTO `routineeatingmenu` (`eating_id`, `food_id`, `eatingprogram_id`, `day_number`, `cnt`) VALUES
(114, 1, 0, 0, 200),
(118, 1, 0, 0, 1),
(118, 1, 4, 0, 117),
(118, 2, 0, 0, 200),
(118, 2, 4, 0, 100),
(119, 1, 0, 0, 1),
(119, 1, 4, 0, 100),
(119, 2, 0, 0, 107),
(119, 2, 4, 0, 100),
(120, 1, 0, 0, 1),
(120, 1, 4, 0, 100),
(120, 2, 0, 0, 1),
(120, 2, 4, 0, 100),
(121, 1, 0, 0, 1),
(121, 1, 4, 0, 100),
(121, 2, 0, 0, 1),
(121, 2, 4, 0, 100);

-- --------------------------------------------------------

--
-- Структура таблицы `trainingprogram`
--

CREATE TABLE `trainingprogram` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `trainingprogram`
--

INSERT INTO `trainingprogram` (`id`, `name`, `users_id`, `active`) VALUES
(18, 'Тренировочная программа', 23, 1),
(19, 'Тестовая проргамма', 23, 0),
(20, 'тест 2', 23, 0),
(21, 'test2', 23, 0),
(22, 'test3', 23, 0),
(23, 'тест 333', 23, 0),
(24, 'апрапрр', 23, 0),
(25, 'fdnsgbdfskjgsdfjlkgnkjkn', 23, 0),
(26, 'fewfsfdsaf rasfdsaf', 23, 0),
(27, 'fewfsfdsaf rasfdsaf', 23, 0),
(28, 'fewfsfdsaf rasfdsaf', 23, 0),
(31, 'Last test', 23, 0),
(32, 'testprog', 23, 0),
(33, 'Тренировочная программа 34', 23, 0),
(34, 'Тренировочная программа', 23, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `trainingprogramday`
--

CREATE TABLE `trainingprogramday` (
  `id` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `trainingprogram_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `trainingprogramday`
--

INSERT INTO `trainingprogramday` (`id`, `number`, `trainingprogram_id`) VALUES
(29, 1, 19),
(30, 2, 19),
(31, 3, 19),
(32, 1, 20),
(33, 2, 20),
(34, 1, 21),
(35, 1, 22),
(36, 1, 23),
(37, 1, 24),
(38, 2, 24),
(39, 1, 26),
(40, 2, 26),
(41, 1, 27),
(71, 1, 28),
(72, 2, 28),
(83, 1, 31),
(84, 2, 31),
(88, 1, 32),
(89, 2, 32),
(90, 3, 32),
(91, 4, 32),
(92, 5, 32),
(95, 1, 33),
(96, 2, 33),
(101, 1, 34),
(102, 2, 34),
(103, 1, 18),
(104, 2, 18);

-- --------------------------------------------------------

--
-- Структура таблицы `trainingprogramday_exercise`
--

CREATE TABLE `trainingprogramday_exercise` (
  `id` int(11) NOT NULL,
  `trainingprogramday_id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL,
  `podhod` int(11) DEFAULT NULL,
  `repeats` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `trainingprogramday_exercise`
--

INSERT INTO `trainingprogramday_exercise` (`id`, `trainingprogramday_id`, `exercise_id`, `podhod`, `repeats`, `weight`, `position`) VALUES
(73, 83, 1, 2, 4, 2, 0),
(74, 84, 2, 3, 5, 3, 0),
(78, 88, 3, 1, 1, 1, 0),
(79, 89, 2, 1, 1, 1, 0),
(80, 90, 3, 1, 1, 1, 0),
(81, 91, 2, 1, 1, 1, 0),
(82, 92, 1, 1, 1, 1, 0),
(85, 95, 1, 7, 3, 6, 0),
(86, 96, 2, 4, 5, 4, 0),
(92, 101, 1, 5, 1, 1, 0),
(93, 101, 3, 1, 1, 1, 0),
(94, 102, 2, 3, 2, 2, 0),
(95, 103, 1, 7, 10, 6, 1),
(96, 103, 3, 1, 1, 1, 2),
(97, 104, 2, 3, 2, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `apiKey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`, `apiKey`) VALUES
(3, 'rolu@yandex.ru', '$2y$10$LG/mnaAGvFIsRfmx1qFs/.K9kmRBwn03HtBD/CHASUnhTC84bieiy', NULL, NULL, NULL, '01fc6c2b37ca49808750931fbdd818d1fcbfcee5'),
(4, 'dmitrii', '$2y$10$I1EaV0ZXQyVttzpjSpX0UOKYnLDxlFkpDS.cMhA/jNJ2tDVyd8sR2', NULL, NULL, NULL, ''),
(5, 'dmitrii@ya.ru', '$2y$10$pbjH355Pz41tbnLvqKUQ.ev0y.FgE0sKcnzOiiSKzgv.Zkrfg/bhm', NULL, NULL, NULL, ''),
(6, 'Dmitrii', '$2y$10$H8aUqMgA5XuVeXbN9rIPRuGT.dqni124vF4KB31SZNu3kTLju4n7C', NULL, NULL, NULL, ''),
(7, 'nasty', '$2y$10$jvZasMVqvQ0B7JwGJOvI4.r81nf1sw2cVL0vWPj/sJO4uZNkJalF2', NULL, NULL, NULL, ''),
(8, 'romanlunyov@skb-it.ru', '$2y$10$DwY29OcNRi1sKQthl9gGtulBH2ZYS02yqzMVv50m69St/ggGxSUcy', NULL, NULL, NULL, ''),
(9, 'test', '$2y$10$QNahybihZP/Ufb3N6yeLvu6EVqrg3B5ceo2y9gl0qLXu.jSuJZeSS', NULL, NULL, NULL, ''),
(10, 'admin', '$2y$10$CmH3pV09aJSe0DEl/zNwaultOVwamfc9pTiTAuB9kjk63BYejPjDu', NULL, NULL, NULL, 'dd94709528bb1c83d08f3088d4043f4742891f4f'),
(11, 'nasty', '$2y$10$FNgq41jjt4h2PyqVkwn.oO2AW.WFaItixfm686NnpWl/9N.srmuB.', NULL, NULL, NULL, ''),
(12, 'dmitrii', '$2y$10$yF8JVAA/QfeeixgUR9qZMeH7vBZ82RyILuKUYmXdFMnWx1y1xbYXe', NULL, NULL, NULL, ''),
(13, 'dmitrii@ya.ru', '$2y$10$3Mi8SV6RrTuJc2wWv9.FHeplTrDf4LfP6geS0JP4nEkYrFgOJK1CG', NULL, NULL, NULL, ''),
(14, 'ns6630', '$2y$10$riUvRwBEG6L92JJ3X6H87.HosrgD4lsZom/9AEBJvauX2c/yRP3aK', NULL, NULL, NULL, ''),
(15, 'dmintrii@ya.ru', '$2y$10$cEv7IKM4xhgKJfXZ9cCeBO.WSXl.rnDeIeBqsj165uyIn1mxVv752', NULL, NULL, NULL, ''),
(16, 'dmitrii@ya.ru', '$2y$10$4wJ3USvO5obF1G9cTD3bDu5d26lY/WzDWjA.WIKw69dYrWjhsSQz.', NULL, NULL, NULL, ''),
(17, 'dmitrii@ya.ru', '$2y$10$q5oxRSoHsFmzFte4nC4ko.eRYMNuTZTqk19TD4eDc7ifIaoQmwceS', NULL, NULL, NULL, ''),
(18, 'dmitrii@aa', '$2y$10$WVhaVdhSeNUwBqfj5YvuUet27mgmZAL4dGnDY3dUAr1s4ac9mBkcO', NULL, NULL, NULL, ''),
(19, 'Ddddd', '$2y$10$IFrsrh.oVMcKkEfK4i94dO8ss94j2MDiNOzPYQjmVitksuKW7wINq', NULL, NULL, NULL, ''),
(20, 'romanlunyov@skb-it.ru', '$2y$10$oJwf6ieRKGMLKqrup7Gd/..hpkAdc5PqFQ9OWY3ru78lM8qQEida2', NULL, NULL, NULL, ''),
(22, 'ns6630', '$2y$10$bwuynr./gVJ9mvVREaK0ce4f5TW3sLSCIPhzmmV4EsTc.pJZLNNIG', NULL, NULL, NULL, ''),
(23, 'udjal', '$2y$10$KIakTHIhZDpnF6A1dG9GMOXzwJgxK9g06JyDfwdFGAYLMFPayHxJG', NULL, NULL, NULL, 'ea056bed37ac03c66239fcd0ebc85768d8bbee9a');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `eating`
--
ALTER TABLE `eating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_eats_routine1_idx` (`routineId`);

--
-- Индексы таблицы `eatingprogram`
--
ALTER TABLE `eatingprogram`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_eatingprogram_routine1_idx` (`routine_id`);

--
-- Индексы таблицы `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `exercise_musculgroup`
--
ALTER TABLE `exercise_musculgroup`
  ADD PRIMARY KEY (`exercise_id`,`musculgroup_id`),
  ADD UNIQUE KEY `fk_excersice_musculgroup_exercise1_idx` (`exercise_id`),
  ADD KEY `fk_excersice_musculgroup_musculgroup1_idx` (`musculgroup_id`);

--
-- Индексы таблицы `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `musculgroup`
--
ALTER TABLE `musculgroup`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_profiles_users_idx` (`userId`);

--
-- Индексы таблицы `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Индексы таблицы `routineeatingmenu`
--
ALTER TABLE `routineeatingmenu`
  ADD PRIMARY KEY (`eating_id`,`food_id`,`eatingprogram_id`,`day_number`) USING BTREE,
  ADD KEY `fk_routineatingmenu_food1_idx` (`food_id`),
  ADD KEY `fk_routineatingmenu_eatingprogram1_idx` (`eatingprogram_id`);

--
-- Индексы таблицы `trainingprogram`
--
ALTER TABLE `trainingprogram`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_trainingprogram_users1_idx` (`users_id`);

--
-- Индексы таблицы `trainingprogramday`
--
ALTER TABLE `trainingprogramday`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_trainingprogramday_trainingprogram1_idx` (`trainingprogram_id`);

--
-- Индексы таблицы `trainingprogramday_exercise`
--
ALTER TABLE `trainingprogramday_exercise`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `trainingprogramday_id` (`trainingprogramday_id`),
  ADD KEY `exercise_id` (`exercise_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `eating`
--
ALTER TABLE `eating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT для таблицы `eatingprogram`
--
ALTER TABLE `eatingprogram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `exercise`
--
ALTER TABLE `exercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `musculgroup`
--
ALTER TABLE `musculgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT для таблицы `routine`
--
ALTER TABLE `routine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `trainingprogram`
--
ALTER TABLE `trainingprogram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT для таблицы `trainingprogramday`
--
ALTER TABLE `trainingprogramday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT для таблицы `trainingprogramday_exercise`
--
ALTER TABLE `trainingprogramday_exercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `eating`
--
ALTER TABLE `eating`
  ADD CONSTRAINT `fk_eats_routine1` FOREIGN KEY (`routineId`) REFERENCES `routine` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `eatingprogram`
--
ALTER TABLE `eatingprogram`
  ADD CONSTRAINT `fk_eatingprogram_routine1` FOREIGN KEY (`routine_id`) REFERENCES `routine` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `exercise_musculgroup`
--
ALTER TABLE `exercise_musculgroup`
  ADD CONSTRAINT `fk_excersice_musculgroup_exercise1` FOREIGN KEY (`exercise_id`) REFERENCES `exercise` (`id`),
  ADD CONSTRAINT `fk_excersice_musculgroup_musculgroup1` FOREIGN KEY (`musculgroup_id`) REFERENCES `musculgroup` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `fk_profiles_users` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `routine`
--
ALTER TABLE `routine`
  ADD CONSTRAINT `routine_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `routineeatingmenu`
--
ALTER TABLE `routineeatingmenu`
  ADD CONSTRAINT `fk_routineatingmenu_eating1` FOREIGN KEY (`eating_id`) REFERENCES `eating` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_routineatingmenu_eatingprogram1_idx` FOREIGN KEY (`eatingprogram_id`) REFERENCES `eatingprogram` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_routineatingmenu_food1` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `trainingprogram`
--
ALTER TABLE `trainingprogram`
  ADD CONSTRAINT `fk_trainingprogram_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `trainingprogramday`
--
ALTER TABLE `trainingprogramday`
  ADD CONSTRAINT `fk_trainingprogramday_trainingprogram1` FOREIGN KEY (`trainingprogram_id`) REFERENCES `trainingprogram` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `trainingprogramday_exercise`
--
ALTER TABLE `trainingprogramday_exercise`
  ADD CONSTRAINT `trainingprogramday_exercise_ibfk_1` FOREIGN KEY (`exercise_id`) REFERENCES `exercise` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trainingprogramday_exercise_ibfk_2` FOREIGN KEY (`trainingprogramday_id`) REFERENCES `trainingprogramday` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
