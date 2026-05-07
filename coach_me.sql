-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 11 2017 г., 18:35
-- Версия сервера: 5.5.34-0ubuntu0.13.04.1
-- Версия PHP: 5.4.9-4ubuntu2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `coach_me`
--

-- --------------------------------------------------------

--
-- Структура таблицы `eats`
--

CREATE TABLE IF NOT EXISTS `eats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` time NOT NULL,
  `routineId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=106 ;

--
-- Дамп данных таблицы `eats`
--

INSERT INTO `eats` (`id`, `time`, `routineId`) VALUES
(94, '09:13:00', 2),
(95, '07:15:00', 4),
(96, '10:10:00', 4),
(103, '04:00:00', 6),
(104, '07:00:00', 6),
(105, '14:00:00', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `sex` enum('male','female','','') DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `growth` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `aimTrain` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT '0',
  `somatotype` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Дамп данных таблицы `profiles`
--

INSERT INTO `profiles` (`id`, `userId`, `name`, `sex`, `age`, `growth`, `weight`, `aimTrain`, `active`, `somatotype`) VALUES
(1, 1, 'Роман', 'male', 36, 180, 90, 1, 0, 2),
(2, 1, 'тест', NULL, NULL, NULL, NULL, NULL, 0, 0),
(3, 1, 'Profile Max телефон', 'male', 21, 180, 60, 2, 0, 2),
(4, 1, 'Проверка 4', 'female', 25, 200, 70, 2, 0, 2),
(5, 1, 'newRoman', 'male', 18, 180, 90, 2, 0, 2),
(6, 1, 'ww', 'male', 36, 178, 87, 1, 0, 2),
(8, 7, 'Настя', 'female', 22, 164, 58, 1, 0, 2),
(9, 7, 'Гриша', 'male', 36, 185, 88, 1, 0, 0),
(11, 7, 'профиль', 'male', 21, 180, 81, 0, 0, 2),
(13, 10, 'Test Profile', 'male', 18, 174, 55, 2, 0, 1),
(19, 7, 'вася', 'male', 25, 1600, 78, 2, 0, 1),
(27, 14, 'Мужицкий профиль', 'male', 25, 192, 84, 1, 0, 1),
(28, 4, 'new', NULL, NULL, NULL, NULL, NULL, 0, NULL),
(29, 3, 'Роман', 'male', 36, 178, 86, 1, 0, 2),
(34, 7, 'лели', 'female', 22, 180, 58, 1, 0, 2),
(35, 10, 'profile 1', 'male', 20, 170, 55, 2, 0, 1),
(36, 14, 'test', 'male', 25, 192, 84, 2, 0, 2),
(37, 14, 'ololo', NULL, 25, 192, 84, 2, 0, 2),
(38, 14, 'Новый тестовый профиль', 'male', 25, 192, 84, 1, 0, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `routine`
--

CREATE TABLE IF NOT EXISTS `routine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `wakeupTime` time NOT NULL,
  `trainTime` time NOT NULL,
  `eatCount` int(11) NOT NULL,
  `sleepTime` time NOT NULL,
  `active` tinyint(1) NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `routine`
--

INSERT INTO `routine` (`id`, `name`, `wakeupTime`, `trainTime`, `eatCount`, `sleepTime`, `active`, `userId`) VALUES
(2, 'Первый', '07:09:00', '03:16:00', 3, '11:43:00', 0, 7),
(4, 'Второй', '08:59:00', '13:54:00', 2, '23:54:00', 1, 7),
(6, 'test', '06:00:00', '02:00:00', 3, '01:00:00', 0, 14);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `apiKey` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

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
(22, 'ns6630', '$2y$10$bwuynr./gVJ9mvVREaK0ce4f5TW3sLSCIPhzmmV4EsTc.pJZLNNIG', NULL, NULL, NULL, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
