-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 23 2021 г., 13:06
-- Версия сервера: 5.7.24
-- Версия PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kursach-store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) COLLATE utf8_bin NOT NULL,
  `password` varchar(222) COLLATE utf8_bin NOT NULL,
  `email` varchar(222) COLLATE utf8_bin NOT NULL,
  `code` varchar(222) COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(6, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin@gmail.com', '', '2018-04-09 07:36:18'),
(8, 'abc888', '6d0361d5777656072438f6e314a852bc', 'abc@gmail.com', 'QX5ZMN', '2018-04-13 18:12:30');

-- --------------------------------------------------------

--
-- Структура таблицы `admin_codes`
--

CREATE TABLE `admin_codes` (
  `id` int(222) NOT NULL,
  `codes` varchar(6) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `admin_codes`
--

INSERT INTO `admin_codes` (`id`, `codes`) VALUES
(1, 'QX5ZMN'),
(2, 'QFE6ZM'),
(3, 'QMZR92'),
(4, 'QPGIOV'),
(5, 'QSTE52'),
(6, 'QMTZ2J');

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) COLLATE utf8_bin NOT NULL,
  `image` mediumtext COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`rs_id`, `title`, `image`, `date`) VALUES
(70, 'hgfjhgkjghkgh', '602404a6c898f.jpg', '2021-02-10 16:07:02'),
(71, 'gdfgdfjgfjhgfjhg', '602401dff149c.png', '2021-02-10 15:55:11'),
(72, 'hreherhre', '60258060ba50a.png', '2021-02-11 19:07:12'),
(73, 'hrehrehre', '602580667275e.jpg', '2021-02-11 19:07:18'),
(74, 'gfdgfdhdhdf', '6033b44969093.jpg', '2021-02-22 13:40:25'),
(75, 'gfdgfdgdf', '6033b455dd678.jpg', '2021-02-22 13:40:37');

-- --------------------------------------------------------

--
-- Структура таблицы `details`
--

CREATE TABLE `details` (
  `d_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) COLLATE utf8_bin NOT NULL,
  `slogan` varchar(222) COLLATE utf8_bin NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `amount` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `img` varchar(222) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `details`
--

INSERT INTO `details` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `amount`, `img`) VALUES
(31, 70, 'jhgjhgjhgjgh', 'gfdgfdgfdgdf', '123.00', '123', '60240a7e7fc58.jpg'),
(32, 70, 'hgfhjgfhgfhgf', 'hgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgfhgf', '5.00', '7', '60257f7fc8af0.png'),
(33, 70, 'kuykyulyulyu', 'hgfnfngfngfngf', '465546.00', '435435', '60258039511aa.jpg'),
(34, 70, 'gfdhdfhfdhdf', 'hfdhfdhdf', '45.00', '5435', '602580497ed0d.png');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `mail`, `name`, `message`) VALUES
(2, 'mazaevroma@gmail.com', 'Роман', 'gdhrthrthrthtrhtrmkjhmjjjjjjjjjjjjjjjjjjjjjj'),
(3, 'mazaevroma@gmail.com', 'Роман', 'gdhrthrthrthtrhtrmkjhmjjjjjjjjjjjjjjjjjjjjjj');

-- --------------------------------------------------------

--
-- Структура таблицы `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_bin NOT NULL,
  `remark` longtext COLLATE utf8_bin NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(62, 32, 'in process', 'hi', '2018-04-18 17:35:52'),
(63, 32, 'closed', 'cc', '2018-04-18 17:36:46'),
(64, 32, 'in process', 'fff', '2018-04-18 18:01:37'),
(65, 32, 'closed', 'its delv', '2018-04-18 18:08:55'),
(66, 34, 'in process', 'on a way', '2018-04-18 18:56:32'),
(67, 35, 'closed', 'ok', '2018-04-18 18:59:08'),
(68, 37, 'in process', 'on the way!', '2018-04-18 19:50:06'),
(69, 37, 'rejected', 'if admin cancel for any reason this box is for remark only for buter perposes', '2018-04-18 19:51:19'),
(70, 37, 'closed', 'delivered success', '2018-04-18 19:51:50'),
(71, 40, 'in process', 'ew3rfer', '2020-07-01 11:47:00'),
(72, 1, 'отменен', 'dwsfer', '2020-07-08 21:22:32'),
(73, 1, 'В процессе', 'bgfbgf', '2020-07-08 21:23:56'),
(74, 1, 'В процессе', 'й1', '2020-07-08 21:25:09'),
(75, 1, 'В процессе', 'fafdfsd', '2020-07-08 21:28:21'),
(76, 1, 'Dispatch', 'fdsfgd', '2020-07-08 21:28:41'),
(77, 1, 'in process', 'bgfbgf', '2020-07-08 21:30:48'),
(78, 1, 'rejected', 'амвпира', '2020-07-08 21:32:21'),
(79, 8, 'in process', 'tfrr', '2020-07-09 12:12:31'),
(80, 9, 'rejected', 't54rhbythyrt', '2020-09-03 15:14:01');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) COLLATE utf8_bin NOT NULL,
  `f_name` varchar(222) COLLATE utf8_bin NOT NULL,
  `l_name` varchar(222) COLLATE utf8_bin NOT NULL,
  `email` varchar(222) COLLATE utf8_bin NOT NULL,
  `phone` varchar(222) COLLATE utf8_bin NOT NULL,
  `password` varchar(222) COLLATE utf8_bin NOT NULL,
  `address` mediumtext COLLATE utf8_bin NOT NULL,
  `status` int(222) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(33, 'travisru1ez', 'roma', 'roma', 'qw@qw.com', '89036145077', 'fcea920f7412b5da7be0cf42b8c93759', 'derg h th yukjhku,j', 1, '2020-06-30 13:08:06'),
(34, 'admin', 'Роман', 'Roman', 'mazaevroma@gmail.com', '89036145077', 'e807f1fcf82d132f9bb018ca6738a19f', 'dfreref', 1, '2020-07-08 14:38:22'),
(37, 'пывпвыпвы', 'пвыпывпыв', 'пывпвыпыв', 'qwe@mail.ru', '89999999999', 'e10adc3949ba59abbe56e057f20f883e', 'gdfgfdgdf', 1, '2021-02-08 14:40:16');

-- --------------------------------------------------------

--
-- Структура таблицы `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) COLLATE utf8_bin NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `date`) VALUES
(28, 34, 'Пицца оригинальная', 3, '10.00', '2020-07-08 21:36:46'),
(29, 34, 'Суп с фрикадельками ', 1, '3.00', '2020-07-08 21:36:46'),
(30, 34, 'Шаурма', 2, '2.00', '2020-07-08 21:36:46'),
(31, 34, 'Пицца оригинальная', 3, '10.00', '2020-07-08 21:36:47'),
(32, 34, 'Суп с фрикадельками ', 1, '3.00', '2020-07-08 21:36:47'),
(33, 34, 'Шаурма', 2, '2.00', '2020-07-08 21:36:47'),
(34, 34, 'Пицца оригинальная', 3, '10.00', '2020-07-08 21:36:49'),
(35, 34, 'Суп с фрикадельками ', 1, '3.00', '2020-07-08 21:36:49'),
(36, 34, 'Шаурма', 2, '2.00', '2020-07-08 21:36:49'),
(37, 34, 'Пицца оригинальная', 3, '10.00', '2020-07-08 21:44:01'),
(38, 34, 'Суп с фрикадельками ', 1, '3.00', '2020-07-08 21:44:01'),
(39, 34, 'Шаурма', 2, '2.00', '2020-07-08 21:44:01'),
(40, 34, 'БигМак', 1, '4.00', '2020-07-08 21:44:01'),
(41, 36, 'БигМак', 2, '4.00', '2020-09-03 15:11:34'),
(42, 33, 'Чикен бургер', 1, '2.00', '2021-02-10 15:12:17'),
(43, 33, 'jhgjhgjhgjgh', 1, '123.00', '2021-02-11 18:09:49'),
(46, 37, 'jhgjhgjhgjgh', 2, '123.00', '2021-02-11 18:39:30');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Индексы таблицы `admin_codes`
--
ALTER TABLE `admin_codes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`rs_id`);

--
-- Индексы таблицы `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`d_id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Индексы таблицы `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `admin_codes`
--
ALTER TABLE `admin_codes`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `rs_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT для таблицы `details`
--
ALTER TABLE `details`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
