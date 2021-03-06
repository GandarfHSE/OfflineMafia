-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июл 09 2020 г., 18:50
-- Версия сервера: 5.7.30-cll-lve
-- Версия PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `l59511_db`
--
CREATE DATABASE IF NOT EXISTS `l59511_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `l59511_db`;

-- --------------------------------------------------------

--
-- Структура таблицы `gamers`
--

CREATE TABLE `gamers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mmr` int(11) DEFAULT NULL,
  `games_played` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `gamers`
--

INSERT INTO `gamers` (`id`, `name`, `mmr`, `games_played`) VALUES
(2, 'Илюшин Валентин', 116, 22),
(3, 'Аджима Никита', 60, 16),
(4, 'Василенко Егор', 65, 16),
(5, 'Кислинский Данила', 78, 23),
(6, 'Воротилин Богдан', 20, 6),
(7, 'Баранчикова Дарья', 78, 18),
(8, 'Аларак Владыка Талдаримов', 83, 5),
(9, 'Афанасьев Денис', 75, 20),
(10, 'Жабицкий Никита', 70, 18),
(11, 'Косенков Никита', 3, 17),
(12, 'Колосов Григорий', 83, 18),
(13, 'Нестеренко Алиса', 8, 16),
(14, 'Черняк Дмитрий', 0, 0),
(15, 'Якунин Максим', -25, 12),
(16, 'Цветков Илья', -10, 1),
(17, 'Михаил Конобеев', 35, 6),
(18, 'Олег Волков', 0, 5),
(19, 'Артём Масленников', -10, 5),
(20, 'Ростислав Якубив', 0, 2),
(21, 'Камиль Шарипов', -5, 3),
(22, 'Алиса Шаламкова', -20, 2),
(23, 'Осетров Фёдор', -5, 3),
(24, 'Рубцов Александр', 25, 3),
(25, 'Бочаров Егор', 10, 2),
(26, 'Семён Федоровский', -10, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `win` tinyint(1) NOT NULL,
  `best` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `log`
--

INSERT INTO `log` (`id`, `game_id`, `name`, `role`, `win`, `best`) VALUES
(105, 0, 'Василенко Егор', 'town', 1, 1),
(106, 0, 'Кислинский Данила', 'sheriff', 1, 1),
(107, 0, 'Илюшин Валентин', 'town', 1, 1),
(108, 0, 'Воротилин Богдан', 'town', 1, 1),
(109, 0, 'Баранчикова Дарья', 'town', 1, 1),
(110, 0, 'Аджима Никита', 'mafia', 0, 1),
(111, 0, 'Афанасьев Денис', 'town', 1, 1),
(112, 0, 'Жабицкий Никита', 'don', 0, 1),
(113, 0, 'Косенков Никита', 'town', 1, 1),
(114, 0, 'Якунин Максим', 'mafia', 0, 1),
(115, 1, 'Василенко Егор', 'town', 0, 1),
(116, 1, 'Воротилин Богдан', 'town', 0, 1),
(117, 1, 'Аларак Владыка Талдаримов', 'mafia', 1, 1),
(118, 1, 'Афанасьев Денис', 'town', 0, 1),
(119, 1, 'Жабицкий Никита', 'town', 0, 1),
(120, 1, 'Колосов Григорий', 'don', 1, 1),
(121, 1, 'Нестеренко Алиса', 'sheriff', 0, 1),
(122, 1, 'Якунин Максим', 'town', 0, 1),
(123, 1, 'Цветков Илья', 'town', 0, 1),
(124, 1, 'Михаил Конобеев', 'mafia', 1, 1),
(125, 2, 'Василенко Егор', 'town', 1, 1),
(126, 2, 'Кислинский Данила', 'town', 1, 1),
(127, 2, 'Илюшин Валентин', 'mafia', 0, 1),
(128, 2, 'Воротилин Богдан', 'sheriff', 1, 1),
(129, 2, 'Баранчикова Дарья', 'town', 1, 1),
(130, 2, 'Афанасьев Денис', 'don', 0, 1),
(131, 2, 'Жабицкий Никита', 'town', 1, 1),
(132, 2, 'Косенков Никита', 'town', 1, 1),
(133, 2, 'Колосов Григорий', 'town', 1, 2),
(134, 2, 'Нестеренко Алиса', 'mafia', 0, 1),
(135, 3, 'Василенко Егор', 'town', 1, 1),
(136, 3, 'Кислинский Данила', 'town', 1, 1),
(137, 3, 'Илюшин Валентин', 'town', 1, 1),
(138, 3, 'Воротилин Богдан', 'mafia', 0, 1),
(139, 3, 'Аджима Никита', 'town', 1, 1),
(140, 3, 'Баранчикова Дарья', 'town', 1, 1),
(141, 3, 'Косенков Никита', 'sheriff', 1, 1),
(142, 3, 'Нестеренко Алиса', 'don', 0, 1),
(143, 3, 'Якунин Максим', 'mafia', 0, 1),
(144, 3, 'Олег Волков', 'town', 1, 1),
(145, 4, 'Василенко Егор', 'town', 0, 1),
(146, 4, 'Кислинский Данила', 'sheriff', 0, 2),
(147, 4, 'Илюшин Валентин', 'town', 0, 1),
(148, 4, 'Афанасьев Денис', 'town', 0, 1),
(149, 4, 'Жабицкий Никита', 'don', 1, 1),
(150, 4, 'Колосов Григорий', 'mafia', 1, 1),
(151, 4, 'Нестеренко Алиса', 'mafia', 1, 1),
(152, 4, 'Якунин Максим', 'town', 0, 1),
(153, 4, 'Олег Волков', 'town', 0, 1),
(154, 4, 'Артём Масленников', 'town', 0, 1),
(155, 5, 'Василенко Егор', 'town', 1, 1),
(156, 5, 'Кислинский Данила', 'town', 1, 1),
(157, 5, 'Илюшин Валентин', 'sheriff', 1, 1),
(158, 5, 'Воротилин Богдан', 'mafia', 0, 1),
(159, 5, 'Аджима Никита', 'town', 1, 1),
(160, 5, 'Аларак Владыка Талдаримов', 'town', 1, 2),
(161, 5, 'Афанасьев Денис', 'town', 1, 1),
(162, 5, 'Колосов Григорий', 'town', 1, 1),
(163, 5, 'Нестеренко Алиса', 'mafia', 0, 1),
(164, 5, 'Ростислав Якубив', 'don', 0, 1),
(165, 6, 'Василенко Егор', 'town', 0, 1),
(166, 6, 'Аджима Никита', 'town', 0, 1),
(167, 6, 'Кислинский Данила', 'town', 0, 1),
(168, 6, 'Афанасьев Денис', 'mafia', 1, 1),
(169, 6, 'Воротилин Богдан', 'mafia', 1, 1),
(170, 6, 'Косенков Никита', 'town', 0, 1),
(171, 6, 'Жабицкий Никита', 'town', 0, 1),
(172, 6, 'Баранчикова Дарья', 'sheriff', 0, 1),
(173, 6, 'Илюшин Валентин', 'don', 1, 1),
(174, 6, 'Якунин Максим', 'town', 0, 1),
(175, 7, 'Василенко Егор', 'town', 1, 1),
(176, 7, 'Кислинский Данила', 'mafia', 0, 1),
(177, 7, 'Аджима Никита', 'don', 0, 1),
(178, 7, 'Олег Волков', 'town', 1, 1),
(179, 7, 'Илюшин Валентин', 'town', 1, 1),
(180, 7, 'Косенков Никита', 'town', 1, 1),
(181, 7, 'Колосов Григорий', 'mafia', 0, 1),
(182, 7, 'Якунин Максим', 'town', 1, 1),
(183, 7, 'Жабицкий Никита', 'sheriff', 1, 1),
(184, 7, 'Аларак Владыка Талдаримов', 'town', 1, 1),
(185, 8, 'Афанасьев Денис', 'sheriff', 1, 1),
(186, 8, 'Колосов Григорий', 'town', 1, 1),
(187, 8, 'Косенков Никита', 'mafia', 0, 1),
(188, 8, 'Жабицкий Никита', 'town', 1, 1),
(189, 8, 'Баранчикова Дарья', 'mafia', 0, 1),
(190, 8, 'Илюшин Валентин', 'town', 1, 2),
(191, 8, 'Михаил Конобеев', 'town', 1, 1),
(192, 8, 'Нестеренко Алиса', 'town', 1, 1),
(193, 8, 'Аджима Никита', 'don', 0, 1),
(194, 8, 'Кислинский Данила', 'town', 1, 1),
(195, 9, 'Колосов Григорий', 'town', 1, 1),
(196, 9, 'Афанасьев Денис', 'town', 1, 1),
(197, 9, 'Нестеренко Алиса', 'town', 1, 1),
(198, 9, 'Аджима Никита', 'mafia', 0, 1),
(199, 9, 'Баранчикова Дарья', 'town', 1, 1),
(200, 9, 'Косенков Никита', 'town', 1, 1),
(201, 9, 'Кислинский Данила', 'mafia', 0, 1),
(202, 9, 'Илюшин Валентин', 'don', 0, 1),
(203, 9, 'Михаил Конобеев', 'town', 1, 1),
(204, 9, 'Жабицкий Никита', 'sheriff', 1, 1),
(205, 10, 'Камиль Шарипов', 'town', 0, 1),
(206, 10, 'Якунин Максим', 'town', 0, 1),
(207, 10, 'Илюшин Валентин', 'town', 0, 1),
(208, 10, 'Олег Волков', 'town', 0, 1),
(209, 10, 'Кислинский Данила', 'mafia', 1, 1),
(210, 10, 'Артём Масленников', 'sheriff', 0, 1),
(211, 10, 'Колосов Григорий', 'mafia', 1, 1),
(212, 10, 'Косенков Никита', 'town', 0, 2),
(213, 10, 'Нестеренко Алиса', 'don', 1, 1),
(214, 10, 'Баранчикова Дарья', 'town', 0, 1),
(215, 11, 'Кислинский Данила', 'mafia', 0, 1),
(216, 11, 'Василенко Егор', 'town', 1, 1),
(217, 11, 'Олег Волков', 'mafia', 0, 1),
(218, 11, 'Камиль Шарипов', 'town', 1, 1),
(219, 11, 'Баранчикова Дарья', 'sheriff', 1, 1),
(220, 11, 'Колосов Григорий', 'town', 1, 1),
(221, 11, 'Афанасьев Денис', 'don', 0, 1),
(222, 11, 'Аджима Никита', 'town', 1, 1),
(223, 11, 'Илюшин Валентин', 'town', 1, 1),
(224, 11, 'Жабицкий Никита', 'town', 1, 1),
(225, 12, 'Илюшин Валентин', 'town', 1, 1),
(226, 12, 'Жабицкий Никита', 'don', 0, 1),
(227, 12, 'Афанасьев Денис', 'town', 1, 1),
(228, 12, 'Якунин Максим', 'town', 1, 1),
(229, 12, 'Нестеренко Алиса', 'town', 1, 1),
(230, 12, 'Баранчикова Дарья', 'mafia', 0, 1),
(231, 12, 'Косенков Никита', 'town', 1, 1),
(232, 12, 'Колосов Григорий', 'sheriff', 1, 1),
(233, 12, 'Кислинский Данила', 'mafia', 0, 1),
(234, 12, 'Ростислав Якубив', 'town', 1, 1),
(235, 13, 'Алиса Шаламкова', 'town', 0, 1),
(236, 13, 'Артём Масленников', 'mafia', 1, 1),
(237, 13, 'Баранчикова Дарья', 'don', 1, 1),
(238, 13, 'Афанасьев Денис', 'town', 0, 1),
(239, 13, 'Колосов Григорий', 'town', 0, 1),
(240, 13, 'Кислинский Данила', 'town', 0, 1),
(241, 13, 'Жабицкий Никита', 'sheriff', 0, 1),
(242, 13, 'Нестеренко Алиса', 'mafia', 1, 1),
(243, 13, 'Аджима Никита', 'town', 0, 1),
(244, 13, 'Илюшин Валентин', 'town', 0, 1),
(245, 14, 'Баранчикова Дарья', 'town', 0, 1),
(246, 14, 'Косенков Никита', 'sheriff', 0, 1),
(247, 14, 'Афанасьев Денис', 'town', 0, 1),
(248, 14, 'Кислинский Данила', 'don', 1, 1),
(249, 14, 'Колосов Григорий', 'town', 0, 1),
(250, 14, 'Аджима Никита', 'mafia', 1, 1),
(251, 14, 'Нестеренко Алиса', 'town', 0, 2),
(252, 14, 'Михаил Конобеев', 'town', 0, 1),
(253, 14, 'Жабицкий Никита', 'mafia', 1, 1),
(254, 14, 'Илюшин Валентин', 'town', 0, 1),
(255, 15, 'Баранчикова Дарья', 'mafia', 1, 1),
(256, 15, 'Артём Масленников', 'mafia', 1, 1),
(257, 15, 'Нестеренко Алиса', 'town', 0, 1),
(258, 15, 'Илюшин Валентин', 'town', 0, 1),
(259, 15, 'Кислинский Данила', 'sheriff', 0, 1),
(260, 15, 'Аларак Владыка Талдаримов', 'don', 1, 1),
(261, 15, 'Жабицкий Никита', 'town', 0, 1),
(262, 15, 'Якунин Максим', 'town', 0, 1),
(263, 15, 'Колосов Григорий', 'town', 0, 1),
(264, 15, 'Афанасьев Денис', 'town', 0, 1),
(265, 16, 'Осетров Фёдор', 'town', 0, 1),
(266, 16, 'Михаил Конобеев', 'mafia', 1, 1),
(267, 16, 'Косенков Никита', 'sheriff', 0, 1),
(268, 16, 'Илюшин Валентин', 'don', 1, 1),
(269, 16, 'Аджима Никита', 'mafia', 1, 1),
(270, 16, 'Баранчикова Дарья', 'town', 0, 1),
(271, 16, 'Алиса Шаламкова', 'town', 0, 1),
(272, 16, 'Нестеренко Алиса', 'town', 0, 1),
(273, 16, 'Василенко Егор', 'town', 0, 1),
(274, 16, 'Кислинский Данила', 'town', 0, 1),
(275, 17, 'Кислинский Данила', 'town', 0, 1),
(276, 17, 'Афанасьев Денис', 'mafia', 1, 1),
(277, 17, 'Жабицкий Никита', 'town', 0, 1),
(278, 17, 'Якунин Максим', 'sheriff', 0, 1),
(279, 17, 'Колосов Григорий', 'town', 0, 1),
(280, 17, 'Косенков Никита', 'town', 0, 1),
(281, 17, 'Василенко Егор', 'town', 0, 1),
(282, 17, 'Рубцов Александр', 'don', 1, 1),
(283, 17, 'Илюшин Валентин', 'mafia', 1, 1),
(284, 17, 'Аджима Никита', 'town', 0, 1),
(285, 18, 'Кислинский Данила', 'town', 1, 1),
(286, 18, 'Якунин Максим', 'town', 1, 1),
(287, 18, 'Семён Федоровский', 'mafia', 0, 1),
(288, 18, 'Василенко Егор', 'town', 1, 1),
(289, 18, 'Афанасьев Денис', 'don', 0, 1),
(290, 18, 'Бочаров Егор', 'sheriff', 1, 1),
(291, 18, 'Осетров Фёдор', 'mafia', 0, 1),
(292, 18, 'Рубцов Александр', 'town', 1, 1),
(293, 18, 'Баранчикова Дарья', 'town', 1, 1),
(294, 18, 'Аджима Никита', 'town', 1, 1),
(295, 19, 'Бочаров Егор', 'town', 0, 1),
(296, 19, 'Рубцов Александр', 'town', 0, 1),
(297, 19, 'Якунин Максим', 'mafia', 1, 1),
(298, 19, 'Афанасьев Денис', 'town', 0, 1),
(299, 19, 'Кислинский Данила', 'don', 1, 1),
(300, 19, 'Жабицкий Никита', 'town', 0, 1),
(301, 19, 'Баранчикова Дарья', 'town', 0, 1),
(302, 19, 'Косенков Никита', 'town', 0, 1),
(303, 19, 'Илюшин Валентин', 'sheriff', 0, 1),
(304, 19, 'Осетров Фёдор', 'mafia', 1, 1),
(305, 20, 'Афанасьев Денис', 'mafia', 1, 1),
(306, 20, 'Нестеренко Алиса', 'sheriff', 0, 1),
(307, 20, 'Илюшин Валентин', 'town', 0, 1),
(308, 20, 'Баранчикова Дарья', 'town', 0, 1),
(309, 20, 'Камиль Шарипов', 'town', 0, 1),
(310, 20, 'Колосов Григорий', 'town', 0, 1),
(311, 20, 'Кислинский Данила', 'mafia', 1, 1),
(312, 20, 'Аджима Никита', 'don', 1, 1),
(313, 20, 'Косенков Никита', 'town', 0, 1),
(314, 20, 'Василенко Егор', 'town', 0, 1),
(315, 21, 'Михаил Конобеев', 'don', 0, 1),
(316, 21, 'Косенков Никита', 'town', 1, 1),
(317, 21, 'Кислинский Данила', 'town', 1, 1),
(318, 21, 'Аларак Владыка Талдаримов', 'town', 1, 1),
(319, 21, 'Илюшин Валентин', 'town', 1, 1),
(320, 21, 'Колосов Григорий', 'mafia', 0, 1),
(321, 21, 'Жабицкий Никита', 'town', 1, 1),
(322, 21, 'Афанасьев Денис', 'sheriff', 1, 1),
(323, 21, 'Василенко Егор', 'town', 1, 1),
(324, 21, 'Нестеренко Алиса', 'mafia', 0, 1),
(325, 22, 'Кислинский Данила', 'sheriff', 1, 1),
(326, 22, 'Косенков Никита', 'mafia', 0, 1),
(327, 22, 'Баранчикова Дарья', 'town', 1, 2),
(328, 22, 'Василенко Егор', 'mafia', 0, 1),
(329, 22, 'Афанасьев Денис', 'town', 1, 1),
(330, 22, 'Жабицкий Никита', 'town', 1, 1),
(331, 22, 'Колосов Григорий', 'town', 1, 1),
(332, 22, 'Артём Масленников', 'don', 0, 1),
(333, 22, 'Илюшин Валентин', 'town', 1, 1),
(334, 22, 'Аджима Никита', 'town', 1, 1),
(335, 23, 'Василенко Егор', 'town', 1, 1),
(336, 23, 'Баранчикова Дарья', 'town', 1, 1),
(337, 23, 'Аджима Никита', 'town', 1, 1),
(338, 23, 'Колосов Григорий', 'mafia', 0, 1),
(339, 23, 'Илюшин Валентин', 'town', 1, 2),
(340, 23, 'Жабицкий Никита', 'town', 1, 1),
(341, 23, 'Нестеренко Алиса', 'town', 1, 1),
(342, 23, 'Кислинский Данила', 'don', 0, 1),
(343, 23, 'Косенков Никита', 'mafia', 0, 1),
(344, 23, 'Афанасьев Денис', 'sheriff', 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `gamers`
--
ALTER TABLE `gamers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `gamers`
--
ALTER TABLE `gamers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
