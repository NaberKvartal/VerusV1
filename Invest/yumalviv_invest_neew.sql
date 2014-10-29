-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Час створення: Жов 02 2014 р., 12:59
-- Версія сервера: 5.5.30
-- Версія PHP: 5.3.24

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База даних: `yumalviv_invest`
--

-- --------------------------------------------------------

--
-- Структура таблиці `concepts`
--

CREATE TABLE IF NOT EXISTS `concepts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_idea` bigint(20) NOT NULL,
  `id_author` text NOT NULL,
  `build` text NOT NULL,
  `square` text NOT NULL,
  `count_1` text NOT NULL,
  `count_2` text NOT NULL,
  `count_3` text NOT NULL,
  `count_4` text NOT NULL,
  `count_5` text NOT NULL,
  `count_6` text NOT NULL,
  `count_7` text NOT NULL,
  `count_8` text NOT NULL,
  `count_9` text NOT NULL,
  `count_10` text NOT NULL,
  `main_cost` text NOT NULL,
  `cost_per_m` text NOT NULL,
  `income` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=25 ;

--
-- Дамп даних таблиці `concepts`
--

INSERT INTO `concepts` (`id`, `id_idea`, `id_author`, `build`, `square`, `count_1`, `count_2`, `count_3`, `count_4`, `count_5`, `count_6`, `count_7`, `count_8`, `count_9`, `count_10`, `main_cost`, `cost_per_m`, `income`) VALUES
(24, 16, '100', '', '42', '6', '6', '66', '6', '6', '6', '6', '6', '6', '6', '6', '66', '6');

-- --------------------------------------------------------

--
-- Структура таблиці `ideas`
--

CREATE TABLE IF NOT EXISTS `ideas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_author` text NOT NULL,
  `city` text NOT NULL,
  `address` text NOT NULL,
  `square` text NOT NULL,
  `type` text NOT NULL,
  `to_kad` text NOT NULL,
  `to_plan` text NOT NULL,
  `to_dpt` text NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=19 ;

--
-- Дамп даних таблиці `ideas`
--

INSERT INTO `ideas` (`id`, `id_author`, `city`, `address`, `square`, `type`, `to_kad`, `to_plan`, `to_dpt`, `desc`) VALUES
(16, '33', 'Р›СЊРІСЃС‚РІРёРѕ', 'СЂС–', 'СЂС–Рѕ', 'Р–РёС‚Р»Рѕ', '5765', '567', '75', 'РІРёС„СЂС–РѕС–Р»Рё'),
(17, '21', 'РІР°РѕС€', 'РѕС€РіС‰Рѕ', '324', 'Р–РёС‚Р»Рѕ', 'С€С‰РѕРѕС‰', 'РѕС‰С€', 'С€РѕС‰', 'Р°РІРјС–'),
(18, '21', 'fv', 'ds', 'dss', 'Р–РёС‚Р»Рѕ', 'sdv', 'hj', 'bh', 'С–РІСЃРІС–СЃС–СЃС–СЃ');

-- --------------------------------------------------------

--
-- Структура таблиці `investment`
--

CREATE TABLE IF NOT EXISTS `investment` (
  `id_project` bigint(20) NOT NULL,
  `id_person` bigint(20) NOT NULL,
  `id_broker` text NOT NULL,
  `sum` bigint(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп даних таблиці `investment`
--

INSERT INTO `investment` (`id_project`, `id_person`, `id_broker`, `sum`) VALUES
(3, 21, '', 1750000),
(3, 22, '', 1750000),
(3, 23, '', 1500000),
(4, 22, '', 3191778),
(4, 21, '', 3191778),
(4, 24, '', 191196),
(4, 25, '', 400000),
(4, 26, '', 150000),
(4, 27, '', 35912),
(4, 28, '', 32921),
(4, 29, '', 806416),
(5, 21, '', 500000),
(5, 22, '', 500000),
(5, 29, '', 1000000),
(6, 30, '', 805510),
(7, 30, '', 2363573),
(8, 30, '', 991719),
(9, 30, '', 2500000),
(10, 30, '', 1262815),
(11, 30, '', 4204297),
(12, 30, '', 2082800),
(12, 29, '', 298700),
(12, 31, '', 118500),
(13, 30, '', 1760200),
(14, 30, '', 1000000),
(15, 21, '', 3500000),
(15, 22, '', 3500000),
(15, 29, '', 1000000),
(16, 22, '', 750000),
(16, 32, '', 500000),
(16, 21, '', 750000),
(17, 22, '', 1000000),
(17, 32, '', 400000),
(17, 21, '', 1000000),
(18, 21, '', 2107500),
(18, 22, '', 2107500),
(18, 25, '', 785000),
(19, 21, '', 2000000),
(19, 22, '', 2000000),
(20, 21, '', 4000000),
(20, 22, '', 4000000),
(21, 21, '', 0),
(21, 22, '', 0),
(22, 21, '', 1550165),
(22, 22, '', 1550165),
(22, 24, '', 44398),
(22, 25, '', 785000),
(22, 33, '', 25000),
(22, 34, '', 45271),
(23, 21, '', 1000000),
(23, 22, '', 1000000),
(23, 35, '', 1000000),
(24, 30, '', 700000),
(25, 30, '', 700000),
(26, 36, '', 10000),
(26, 37, '', 10000),
(26, 38, '', 200000),
(26, 28, '', 100000),
(26, 27, '', 100000),
(26, 21, '', 1225381),
(26, 26, '', 85000),
(26, 39, '', 7000),
(26, 24, '', 150000),
(27, 21, '', 0),
(27, 22, '', 0),
(28, 21, '', 2000000),
(28, 22, '', 2000000),
(29, 21, '', 930000),
(29, 22, '', 930000),
(29, 40, '', 20000),
(29, 34, '', 85000),
(29, 41, '', 10000),
(29, 42, '', 10000),
(29, 43, '', 15000),
(29, 44, '', 165707),
(30, 21, '', 1775000),
(30, 22, '', 1775000),
(30, 45, '', 450000),
(31, 21, '', 1138794),
(31, 22, '', 1138795),
(31, 41, '', 10000),
(31, 42, '', 15000),
(31, 46, '', 3000),
(31, 47, '', 15000),
(31, 26, '', 48000),
(31, 39, '', 8107),
(31, 48, '', 100000),
(31, 36, '', 11581),
(31, 30, '', 511723),
(32, 21, '', 2355850),
(32, 22, '', 2355850),
(32, 28, '', 100000),
(32, 27, '', 100000),
(32, 26, '', 83300),
(32, 49, '', 5000),
(32, 30, '', 1326803),
(33, 21, '', 4258749),
(33, 22, '', 4258749),
(33, 24, '', 173719),
(33, 25, '', 292099),
(33, 50, '', 150000),
(33, 51, '', 50000),
(33, 38, '', 200000),
(33, 52, '', 10000),
(33, 26, '', 96684),
(33, 47, '', 10000),
(33, 29, '', 500000);

-- --------------------------------------------------------

--
-- Структура таблиці `people`
--

CREATE TABLE IF NOT EXISTS `people` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `status` text NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=102 ;

--
-- Дамп даних таблиці `people`
--

INSERT INTO `people` (`id`, `user`, `pass`, `status`, `name`, `surname`, `email`, `phone`) VALUES
(21, 'Julia', 'captain', 'Р†РЅРІРµСЃС‚РѕСЂ', 'Р®Р»С–СЏ', 'РўСЂРѕС„С–РјС‡РµРЅРєРѕ', '', ''),
(22, 'Popov', 'captain', 'Р†РЅРІРµСЃС‚РѕСЂ', 'РђРЅР°С‚РѕР»С–Р№', 'РџРѕРїРѕРІ', '', ''),
(23, '', '', '', 'Р“СЂСѓРї', 'Р†Р” ', '', ''),
(24, '', '', '', '', 'Р“РµСЂРѕР±С–РЅС‡СѓРє', '', ''),
(25, '', '', '', 'Р¤РѕРЅРґ', 'Р†РЅРІРµСЃС‚', '', ''),
(26, '', '', '', 'Р„.', 'РњСѓРґСЂРµРЅРєРѕ', '', ''),
(27, '', '', '', 'РњР°РєСЃРёРј', 'Р С–РІРЅРёР№', '', ''),
(28, '', '', '', 'Р’Р°РґРёРј', 'РЎРµР»РµС†СЊРєРёР№', '', ''),
(29, '', '', '', 'РђСЂС‚РµРј', 'РЁРµРІС‡РµРЅРєРѕ', '', ''),
(30, '', '', '', 'Р†Р¤', 'РџРµСЂС€РёР№', '', ''),
(31, '', '', '', 'Р РѕРјР°РЅ', 'Р—С–РЅСЊРєРѕРІ', '', ''),
(32, '', '', '', 'Р†РіРѕСЂ', 'РџР»РµР№Р·РѕСЂ', '', ''),
(33, '', '', '', 'Р‘РѕРіРґР°РЅ', 'РљРѕР»РµСЃРЅРёРє', '', ''),
(34, '', '', '', 'РњР°РєСЃРёРј', 'РЁРµРІС‡РµРЅРєРѕ', '', ''),
(35, '', '', '', 'РџРѕР»СЊРЅРёР№', 'Р—Р»РѕС‡РµРІСЃСЊРєРёР№', '', ''),
(36, '', '', '', 'РћР»РµРєСЃР°РЅРґСЂ', 'РњСѓРґСЂРµРЅРєРѕ', '', ''),
(37, '', '', '', 'Рђ.', 'РЎС‚Р°РґРЅРёРє', '', ''),
(38, '', '', '', 'Рђ.', 'РџР°РІР»РёРє', '', ''),
(39, 'OLysiuk', 'captain', '', 'РћР»РµРєСЃС–Р№', 'Р›РёСЃСЋРє', '', ''),
(40, '', '', '', 'Р’.', 'Р®РґС–РЅР°', '', ''),
(41, '', '', '', 'РњР°СЂС–СЏ', 'Р§РѕСЂРЅР°', '', ''),
(42, '', '', '', 'РўРµС‚СЏРЅР°', 'Р§РѕСЂРЅР°', '', ''),
(43, '', '', '', 'Р®СЂС–Р№', 'РћСЃС‚Р°РїС–РІ', '', ''),
(44, '', '', '', '', 'РЎРµСЂРµРґР°', '', ''),
(45, '', '', '', 'Рњ.', 'РњР°С‚СЏС‰СѓРє', '', ''),
(46, '', '', '', 'РњР°СЂРёРЅР°', 'РҐРј.', '', ''),
(47, '', '', '', 'Р†.', 'Р§РµРєС–СЂРґР°', '', ''),
(48, '', '', '', 'РЎ.', 'РЎР°Р¶РёС”РЅРєРѕ', '', ''),
(49, '', '', '', 'РЎ.', 'РҐРѕСЂРѕРІРёРЅС‡СѓРє', '', ''),
(50, '', '', '', 'Р’.', 'РЎРµРјРµРЅСЋРє', '', ''),
(51, '', '', '', 'Рђ.', 'РЎРїС–СЂРёРґРѕРЅРµРЅРєРѕ', '', ''),
(52, '', '', '', 'Рќ.', 'Р›СѓРєС–СЏРЅС‡СѓРє', '', ''),
(54, '', '', '', 'РђСЂС‚РµРј', 'РџР°РІР»РёРє', '', ''),
(56, '', '', '', 'РђР»С–СЃР°', 'РљСѓР»Р°РєРѕРІСЃСЊРєР°', '', ''),
(57, '', '', '', 'РЎС‚Р°СЃ', 'Р РёР¶РµРЅРєРѕ', '', ''),
(60, '', '', '', 'РђСЂРєР°РґС–Р№', 'Р—Р°С‚РёР»РєС–РЅ', '', ''),
(61, '', '', '', 'РђРЅС‚РѕРЅ', 'Р—РѕР»РѕС‚Р°СЂСЊРѕРІ', '', ''),
(62, '', '', '', 'РћР»РµРєСЃР°РЅРґСЂ', 'РљР°СЏС„Р°', '', ''),
(63, '', '', '', 'РћР»РµРі', 'РЁРµРІС‡РµРЅРєРѕ', '', ''),
(65, '', '', '', 'Р—РёРЅРѕРІС–Р№', 'Р‘Р°Р·СЋС‚Р°', '', ''),
(66, '', '', '', 'РђРќРљРћР ', '', '', ''),
(70, '', '', '', 'Р’С–РєС‚РѕСЂС–СЏ', 'Р“Р°Р»РёС†СЊРєР°', '', ''),
(71, '', '', '', 'Р—РёРЅРѕРІС–Р№', 'Р‘Р°Р·СЋС‚Р°', '', ''),
(72, '', '', '', 'РћР»РµРЅР°', 'РњСѓРґСЂРµРЅРєРѕ', '', ''),
(73, 'Yuriy', 'captain', 'РЈС‡Р°СЃРЅРёРє', 'Р®СЂС–Р№', 'РЎСѓСЃР»СЏРє', '', ''),
(74, '', '', '', 'Р СѓСЃР»Р°РЅ', 'Р‘РµР»СЏРє', '', ''),
(75, '', '', '', 'Р’С–С‚Р°Р»С–Р№', 'РњР°Р·СѓСЂ', '', ''),
(77, '', '', '', 'Р”РµРЅРёСЃ', 'Р”РЅС–РїСЂРѕРїРµС‚СЂРѕРІСЃСЊРє', '', ''),
(80, '', '', '', 'Р’С–С‚Р°Р»С–Р№', 'РњР°СЂС‡РµРЅРєРѕ', '', ''),
(81, '', '', '', 'РћР»РµРєСЃР°РЅРґСЂ', 'Townhouse', '', ''),
(82, '', '', '', 'Р’РѕР»РѕРґРёРјРёСЂ', 'Р›СѓС†СЊРє', '', ''),
(83, '', '', '', 'РЎРµСЂРіС–Р№', 'РљСѓР·СЊРјРёРє', '', ''),
(84, '', '', '', 'Р’РѕР»РѕРґРёРјРёСЂ', 'Р”СЂСѓРіРѕСЂСѓР±', '', ''),
(85, '', '', '', 'РЎРµСЂРіС–Р№', 'Р‘Р°Р·Р°Р»СЊС‚', '', ''),
(86, '', '', '', 'Р’Р°Р»РµРЅС‚РёРЅР°', 'Р®РґС–РЅР°', '', ''),
(87, '', '', '', 'Р”РјРёС‚СЂРѕ', 'Р§РµСЂРЅС–РІС†С–', '', ''),
(88, '', '', '', 'Р”РјРёС‚СЂРѕ', 'РџРѕР»СЊРЅРёР№', '', ''),
(89, '', '', '', 'РћР»РµРєСЃР°РЅРґСЂ', 'Р—Р»РѕС‡РµРІСЃСЊРєРёР№', '', ''),
(90, '', '', '', 'РњРёС…Р°Р№Р»Рѕ', 'РњР°С‚СЏС‰СѓРє', '', ''),
(97, 'Hnatkovskyy', 'captain', '', 'Р‘РѕРіРґР°РЅ', 'Р“РЅР°С‚РєРѕРІСЃСЊРєРёР№', 'bh@preenster.com', '+380938442626'),
(98, '', '', '', 'Р’РѕР»РѕРґРёРјРёСЂ', 'РЎС‚СЊРѕР±РѕР»', '', ''),
(99, '', '', '', 'РЎРµСЂРіС–Р№', 'РљР°РїС†РµРІРёС‡', '', ''),
(100, '', '', '', 'Р”РµРЅРёСЃ', 'РўСЂРѕС‡РёРЅСЃСЊРєРёР№', '', ''),
(101, 'MIryna', 'captain', 'РЈС‡Р°СЃРЅРёРє', 'Р†СЂРёРЅР°', 'РњР°Р»РёРЅРѕРІСЃСЊРєР°', '', '');

-- --------------------------------------------------------

--
-- Структура таблиці `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_concept` text NOT NULL,
  `status` text NOT NULL,
  `name` text NOT NULL,
  `zhbk` text NOT NULL,
  `site` text NOT NULL,
  `city` text NOT NULL,
  `type` text NOT NULL,
  `pay` text NOT NULL,
  `time_start` text NOT NULL,
  `time_realize` text NOT NULL,
  `cost_one_sec` text NOT NULL,
  `sec_count` text NOT NULL,
  `cost_all_sec` text NOT NULL,
  `full_cost_sec` text NOT NULL,
  `middle_cost_life` text NOT NULL,
  `square_life` text NOT NULL,
  `sum_cost_life` text NOT NULL,
  `middle_cost_bus` text NOT NULL,
  `square_bus` text NOT NULL,
  `sum_cost_bus` text NOT NULL,
  `full_cost` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=47 ;

--
-- Дамп даних таблиці `projects`
--

INSERT INTO `projects` (`id`, `id_concept`, `status`, `name`, `zhbk`, `site`, `city`, `type`, `pay`, `time_start`, `time_realize`, `cost_one_sec`, `sec_count`, `cost_all_sec`, `full_cost_sec`, `middle_cost_life`, `square_life`, `sum_cost_life`, `middle_cost_bus`, `square_bus`, `sum_cost_bus`, `full_cost`) VALUES
(3, '', 'РЎС‚Р°СЂС‚', 'Р’С–РЅРЅРёС†СЏ_Р РµР·РёРґРµРЅС†С–СЏ_РЎРІС”СЂРґР»РѕРІР°', '', 'http://rezidenciya.vn.ua/', 'Р’С–РЅРЅРёС†СЏ', 'Р РµР·РёРґРµРЅС†С–СЏ', '26000101261001', '', '14', '11383520', '6', '68301120', '97807200', '6750', '17705', '119510235', '8000', '2137', '17092000', '136602235'),
(4, '', 'Р‘СѓРґСѓС”С‚СЊСЃСЏ', 'Р”РЅС–РїСЂРѕРїРµС‚СЂРѕРІСЃСЊРє_РќР°Р±РµСЂРµР¶РЅРёР№ РљРІР°СЂС‚Р°Р» 2_РџРµСЂРµРјРѕРіРё', '', '0', 'Р”РЅС–РїСЂРѕРїРµС‚СЂРѕРІСЃСЊРє', 'РќР°Р±РµСЂРµР¶РЅРёР№ РљРІР°СЂС‚Р°Р»', '26002099746001', '', '12', '17496117', '6', '104976702', '158724773', '6200', '29123', '180559500', '7068', '4159', '29393904', '209953404'),
(5, '', 'РЎС‚Р°СЂС‚', 'Р–РёС‚РѕРјРёСЂ_РќР°Р±РµСЂРµР¶РЅРёР№ РљРІР°СЂС‚Р°Р»_Р‘РѕСЂРѕРґС–СЏ', '', '0', 'Р–РёС‚РѕРјРёСЂ', 'РќР°Р±РµСЂРµР¶РЅРёР№ РљРІР°СЂС‚Р°Р»', '', '', '12', '15612462', '5', '93674772', '104256552', '6100', '26066', '159002600', '6100', '2372', '14469200', '173471800'),
(6, '', 'Р—Р°РІРµСЂС€РµРЅРёР№', 'РљРёС—РІ_Р‘Р°СЂРІРё 2Р‘_РњС–СЃС‚Рѕ РЎР°Рґ', '', 'http://mistosad.com.ua/', 'РљРёС—РІ', 'Р‘Р°СЂРІРё', '26007086698015', '', '4', '?', '?', '0', '12699515', '5190', '3665', '19019222', '5190', '414', '2146636', '21165858'),
(7, '', 'Р—Р°РІРµСЂС€РµРЅРёР№', 'РљРёС—РІ_Р‘Р°СЂРІРё 4Рђ_РњС–СЃС‚Рѕ РЎР°Рґ', '', 'http://mistosad.com.ua/', 'РљРёС—РІ', 'Р‘Р°СЂРІРё', '26003086698019', '', '4', '-', '-', '0', '21343867', '4590', '5025', '23065117', '4590', '414', '1898470', '24963587'),
(8, '', 'Р—Р°РІРµСЂС€РµРЅРёР№', 'РљРёС—РІ_Р‘Р°СЂРІРё 4Р‘_РњС–СЃС‚Рѕ РЎР°Рґ', '', 'http://mistosad.com.ua/', 'РљРёС—РІ', 'Р‘Р°СЂРІРё', '26000086698023', '', '4', '-', '-', '0', '20434833', '4390', '5031', '22084641', '4390', '414', '1815748', '23900389'),
(9, '', 'РџС–РґРіРѕС‚РѕРІРєР°', 'РљРёС—РІ_Р‘Р°СЂРІРё 6Рђ_РњС–СЃС‚Рѕ РЎР°Рґ', '', 'http://mistosad.com.ua/', '', '', '-', '', '-', '-', '-', '0', '-', '-', '-', '-', '-', '-', '-', '-'),
(10, '', 'Р‘СѓРґСѓС”С‚СЊСЃСЏ', 'РљРёС—РІ_РљР°РїСѓС‡С–РЅРѕ 1Рђ_РњС–СЃС‚Рѕ РЎР°Рґ', '', 'http://mistosad.com.ua/', 'РљРёС—РІ', 'РљР°РїСѓС‡С–РЅРѕ', '26006086698027', '', '6', '-', '-', '0', '21998233', '4500', '5199', '23394050', '4500', '414', '1861245', '25256295'),
(11, '', 'Р‘СѓРґСѓС”С‚СЊСЃСЏ', 'РљРёС—РІ_РљР°РїСѓС‡С–РЅРѕ 1Р‘_РњС–СЃС‚Рѕ РЎР°Рґ', '', 'http://mistosad.com.ua/', '', '', '26001086698022', '', '4', '-', '-', '0', '21563678', '4500', '5088', '22896135', '4500', '414', '1861245', '24757380'),
(12, '', 'Р‘СѓРґСѓС”С‚СЊСЃСЏ', 'РљРёС—РІ_РњРЎ_РџР°СЂРєРѕРІРёР№ 8Рђ', '', '0', 'РљРёС—РІ', '', '26002097436001', '', '36', '18895500', '10', '188955000', '302328000', '6000', '42500', '255000000', '11000', '10500', '115500000', '370500000'),
(13, '', 'Р—Р°РІРµСЂС€РµРЅРёР№', 'РљРёС—РІ_РўР°СѓРЅ РҐР°СѓСЃРё_Р›С–РЅС–С— Р‘1, Р‘2, Р‘4', '', '0', 'РљРёС—РІ', 'РўР°СѓРЅ РҐР°СѓСЃРё', '26004086698007', '', '5', '-', '-', '0', '22510049', '4500', '6843', '30793500', '-', '-', '-', '30793500'),
(14, '', 'Р‘СѓРґСѓС”С‚СЊСЃСЏ', 'РљРёС—РІ_РўР°СѓРЅ РҐР°СѓСЃРё_Р›С–РЅС–С— Р‘3', '', '0', 'РљРёС—РІ', 'РўР°СѓРЅ РҐР°СѓСЃРё', '26001086698044', '', '2', '-', '-', '0', '3715646', '4500', '959', '4315500', '-', '-', '-', '4315500'),
(15, '', '', 'РћРґРµСЃР°_РќР°Р±РµСЂРµР¶РЅРёР№ РљРІР°СЂС‚Р°Р»_РљСЂРёР¶Р°РЅС–РІРєР°', '', '0', '', '', '26009100285001', '', '14', '-', '-', '0', '-', '7800', '-', '-', '-', '-', '-', '-'),
(16, '', 'Р‘СѓРґСѓС”С‚СЊСЃСЏ', 'Р С–РІРЅРµ_РљР°РїСѓС‡С–РЅРѕ', '', '0', 'Р С–РІРЅРµ', 'РљР°РїСѓС‡С–РЅРѕ', '-', '', '18', '17041860', '8', '136334880', '175871995', '5700', '43488', '-', '-', '-', '-', '247881600'),
(17, '', '', 'Р С–РІРЅРµ_Р С–РІРµСЂСЃР°Р№Рґ_РљС–РєРІС–РґР·Рµ 66', '', '0', '', '', '26007097505001', '', '12', '15073575', '5', '75367875', '102911408', '5500', '24915', '137032500', '-', '-', '-', '137032500'),
(18, '', '', 'РўРµСЂРЅРѕРїС–Р»СЊ_РќР°Р±РµСЂРµР¶РЅРёР№ РљРІР°СЂС‚Р°Р»', '', '0', 'РўРµСЂРЅРѕРїС–Р»СЊ', 'РќР°Р±РµСЂРµР¶РЅРёР№ РљРІР°СЂС‚Р°Р»', '26006099270001', '', '12', '12693450', '5', '63467250', '83776770', '4900', '21400', '104860000', '4900', '2150', '10535000', '115395000'),
(19, '', 'Р—Р°РІРµСЂС€РµРЅРёР№', 'РҐР°СЂРєС–РІ_РќР°Р±РµСЂРµР¶РЅРёР№ РљРІР°СЂС‚Р°Р»_РЎРјРѕР»СЊРЅР°', '', '0', 'РҐР°СЂРєС–РІ', 'РќР°Р±РµСЂРµР¶РЅРёР№ РљРІР°СЂС‚Р°Р»', '-', '', '24', '10260000', '13', '133380000', '187621200', '6500', '40000', '260000000', '6500', '5600', '36400000', '296400000'),
(20, '', '', 'РҐР°СЂРєС–РІ_РќР°Р±РµСЂРµР¶РЅРёР№ РљРІР°СЂС‚Р°Р»_РќРѕРІРіРѕСЂРѕРґСЃСЊРєР°', '', '0', '', '', '-', '', '-', '-', '-', '0', '-', '-', '-', '-', '-', '-', '-', '-'),
(21, '', 'РЎС‚Р°СЂС‚', 'РҐР°СЂРєС–РІ_РќР°Р±РµСЂРµР¶РЅРёР№ РљРІР°СЂС‚Р°Р»_Р’РµСЃРµР»Р°', '', '0', 'РҐР°СЂРєС–РІ', 'РќР°Р±РµСЂРµР¶РЅРёР№ РљРІР°СЂС‚Р°Р»', '-', '', '-', '-', '-', '0', '-', '-', '-', '-', '-', '-', '-', '-'),
(22, '', 'Р‘СѓРґСѓС”С‚СЊСЃСЏ', 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№_РњРµРґРІРµРґСЏ 3', '', '0', 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№', '', '26009099233001', '', '24', '-', '-', '0', '165463102', '4900', '43960', '215404000', '4900', '3870', '18963000', '234367000'),
(23, '', 'РЎС‚Р°СЂС‚', 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№_Р•Р»С–С‚РєР° (РђС‚Р»Р°РЅС‚)_РџСЂРёР±СѓР¶СЃСЊРєР°', '', '0', 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№', 'РђС‚Р»Р°РЅС‚', '26007100102001', '', '7', '13916213', '2', '27832426', '38387741', '6000', '7506', '45038160', '9250', '808', '7475850', '52514010'),
(24, '', 'Р‘СѓРґСѓС”С‚СЊСЃСЏ', 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№_Р‘Р°СЂРІРё_3 СЃРµРєС†С–СЏ', '', '0', 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№', 'Р‘Р°СЂРІРё', '-', '', '6', '-', '-', '0', '18464897', '4300', '4843', '20824900', '4050', '59', '238950', '22712050'),
(25, '', 'Р‘СѓРґСѓС”С‚СЊСЃСЏ', 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№_Р‘Р°СЂРІРё_5 СЃРµРєС†С–СЏ', '', '0', 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№', 'Р‘Р°СЂРІРё', '-', '', '6', '-', '-', '0', '18445843', '4300', '4546', '19547800', '4100', '377', '1545700', '21300050'),
(26, '', 'Р—Р°РІРµСЂС€РµРЅРёР№', 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№_РљРѕРІРїР°РєР°', '', '0', 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№', '', '-', '', '4', '-', '-', '0', '15840000', '4800', '3800', '18240000', '-', '-', '-', '20500000'),
(27, '', '', 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№_РќР°Р±РµСЂРµР¶РЅРёР№ РљРІР°СЂС‚Р°Р»_Р‘С–Р»СЏ РЎС–Р»СЊРїРѕ', '', '0', '', '', '-', '', '-', '-', '-', '', '-', '-', '-', '-', '-', '-', '-', '-'),
(28, '', 'Р‘СѓРґСѓС”С‚СЊСЃСЏ', 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№_РќР°Р±РµСЂРµР¶РЅРёР№ РљРІР°СЂС‚Р°Р»_РЎРІС–С‚СЏР·СЊ 2014_РњРёСЂСѓ_Dream House', '', '0', 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№', 'РќР°Р±РµСЂРµР¶РЅРёР№ РєРІР°СЂС‚Р°Р»', '-', '', '12', '11781900', '3', '35345700', '65000520', '5200', '17100', '88920000', '-', '-', '-', '88920000'),
(29, '', 'Р‘СѓРґСѓС”С‚СЊСЃСЏ', 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№_Р РµР·РёРґРµРЅС†С–СЏ', '', '0', 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№', 'Р РµР·РёРґРµРЅС†С–СЏ', '26002082775001', '', '5', '-', '-', '0', '27331703', '5200', '4993', '25963080', '9068', '786', '7126148', '33089228'),
(30, '', 'Р‘СѓРґСѓС”С‚СЊСЃСЏ', 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№_РљРѕСЂРѕРЅР°_Р¤СЂР°РЅРєР°', '', '0', 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№', 'РљРѕСЂРѕРЅР°', '26001099220001', '', '36', '-', '-', '0', '142370390', '5000', '38162', '190812000', '-', '-', '-', '197462400'),
(31, '', 'Р—Р°РІРµСЂС€РµРЅРёР№', 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№_Р§Р°Р№РєР°', '', '0', 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№', '', '26008083187001', '', '5', '-', '-', '0', '18169635', '4900', '4074', '19962110', '5000', '276', '928500', '21477110'),
(32, '', 'Р—Р°РІРµСЂС€РµРЅРёР№', 'Р§РµСЂРєР°СЃРё_РќР°Р±РµСЂРµР¶РЅРёР№ РљРІР°СЂС‚Р°Р»', '', '0', 'Р§РµСЂРєР°СЃРё', 'РќР°Р±РµСЂРµР¶РЅРёР№ РљРІР°СЂС‚Р°Р»', '26003086024003', '', '4', '-', '-', '0', '228441634', '4990', '4330', '21606700', '8000', '846', '6768000', '28374700'),
(33, '', 'Р‘СѓРґСѓС”С‚СЊСЃСЏ', 'Р›СЊРІС–РІ_РќР°Р±РµСЂРµР¶РЅРёР№ РљРІР°СЂС‚Р°Р»_РџСѓР»СЋСЏ', '', 'http://lviv-kvartal.com.ua/', 'Р›СЊРІС–РІ', 'РќР°Р±РµСЂРµР¶РЅРёР№ РљРІР°СЂС‚Р°Р»', '-', '', '16', '19587058', '13', '254631754', '360419672', '-', '-', '431320684', '-', '-', '9117150', '462966824'),
(44, '', 'РџС–РґРіРѕС‚РѕРІРєР°', 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№ РџР°СЂРєРѕРІРёР№ РўРҐ Townhouse', '', '', 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№', 'Townhouse', '', '', '', '', '', '0', '', '', '', '', '', '', '', ''),
(45, '', 'РџС–РґРіРѕС‚РѕРІРєР°', 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№ РћР·РµСЂРЅР°-2 РџР°РЅР°СЃР° РњРёСЂРЅРѕРіРѕ', '', '', 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№', '', '', '', '', '', '', '0', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблиці `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id_project` bigint(20) NOT NULL,
  `start_man` text NOT NULL,
  `start_man_pr` text NOT NULL,
  `rek` text NOT NULL,
  `rek_pr` text NOT NULL,
  `kur` text NOT NULL,
  `kur_pr` text NOT NULL,
  `of_gen` text NOT NULL,
  `of_gen_pr` text NOT NULL,
  `project` text NOT NULL,
  `project_pr` text NOT NULL,
  `tech` text NOT NULL,
  `tech_pr` text NOT NULL,
  `auditor` text NOT NULL,
  `auditor_pr` text NOT NULL,
  `nets` text NOT NULL,
  `nets_pr` text NOT NULL,
  `infra` text NOT NULL,
  `infra_pr` text NOT NULL,
  `earth` text NOT NULL,
  `earth_pr` text NOT NULL,
  `pred` text NOT NULL,
  `pred_pr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп даних таблиці `roles`
--

INSERT INTO `roles` (`id_project`, `start_man`, `start_man_pr`, `rek`, `rek_pr`, `kur`, `kur_pr`, `of_gen`, `of_gen_pr`, `project`, `project_pr`, `tech`, `tech_pr`, `auditor`, `auditor_pr`, `nets`, `nets_pr`, `infra`, `infra_pr`, `earth`, `earth_pr`, `pred`, `pred_pr`) VALUES
(4, '54', '', '54', '3', '72', '50', '56', '1', '57', '1', '', '', '', '', '77', '2', '', '', '54', '12', '', ''),
(5, '29', '', '29', '3', '27', '45', '60', '1', '61', '1', '', '', '', '', '29', '2,5', '', '', '63', '7', '', '0'),
(25, '', '', '39', '1,5', '85', '61,7', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0'),
(15, '', '', '73', '3', '74', '45', '60', '1', '61', '1', '', '', '', '', '29', '4', '', '', '', '', '', '0'),
(3, '', '', '', '', '70', '50', '65', '1', '66', '1', '', '', '', '', '', '', '', '', '', '', '', '0'),
(33, '62', '', '39', '2', '28', '55', '', '', '', '', '', '', '', '', '62', '3', '', '', '', '', '', '0'),
(22, '75', '', '39', '2', '75', '53', '', '', '', '', '', '', '', '', '75', '1', '', '', '', '', '', '0'),
(21, '80', '', '39', '', '32', '', '', '', '61', '', '', '', '', '', '54', '', '', '', '', '', '', '0'),
(10, '81', '', '', '', '27', '60', '', '', '', '', '', '', '', '', '81', '21', '', '', '', '', '', '0'),
(11, '81', '', '', '', '27', '60', '', '', '', '', '', '', '', '', '81', '21', '', '', '', '', '', '0'),
(12, '31', '', '82', '5', '83', '51', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0'),
(16, '', '', '39', '', '', '', '', '', '', '', '', '', '', '', '62', '', '', '', '', '', '', '0'),
(17, '', '', '39', '2', '32', '55', '', '', '', '', '', '', '', '', '62', '3', '', '', '', '', '', '0'),
(18, '75', '', '39', '2', '75', '55', '', '', '', '', '', '', '', '', '62', '3', '', '', '', '', '', '0'),
(28, '71', '', '39', '2,5', '84', '53', '', '', '71', '1', '', '', '42', '0,3', '71', '2,50', '84', '2,5', '84', '7', '', '0'),
(24, '', '', '39', '1,5', '85', '61,7', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0'),
(29, '', '', '86', '', '36', '', '', '', '', '', '', '', '', '', '62', '', '', '', '', '', '', '0'),
(32, '', '', '39', '3', '72', '60', '', '', '', '', '', '', '', '', '60', '3', '', '2,5', '', '7', '', '0'),
(23, '89', '', '88', '2', '88', '53', '', '', '', '', '', '', '', '', '88', '2', '', '', '', '', '', '0'),
(30, '', '', '39', '2', '90', '53', '', '', '', '', '', '', '', '', '62', '2', '', '', '', '', '', '0'),
(31, '', '', '39', '2,5', '98', '64', '', '', '', '', '', '', '', '', '98', '3', '', '', '', '', '', '0'),
(44, '', '', '', '', '99', '', '', '', '', '', '', '', '', '', '99', '', '', '', '', '', '', '0'),
(45, '100', '', '39', '3', '100', '60', '', '', '', '', '', '', '', '', '62', '3', '', '', '', '', '', '0');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `role` text NOT NULL,
  `id_person` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `role`, `id_person`) VALUES
(1, 'admin', 'captain', 'admin', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
