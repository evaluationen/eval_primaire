-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 16 Octobre 2016 à 15:05
-- Version du serveur: 5.5.44-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `eval`
--

-- --------------------------------------------------------

--
-- Structure de la table `eval_answers`
--

CREATE TABLE IF NOT EXISTS `eval_answers` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `qid` int(11) NOT NULL,
  `q_option` text NOT NULL,
  `uid` int(11) NOT NULL,
  `ssid` int(11) DEFAULT NULL,
  `score_u` float NOT NULL DEFAULT '0',
  `rid` int(11) NOT NULL,
  PRIMARY KEY (`aid`),
  KEY `FK_eval_answers` (`ssid`),
  KEY `FK_eval_answers_qbank` (`qid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1520 ;

--
-- Contenu de la table `eval_answers`
--

INSERT INTO `eval_answers` (`aid`, `qid`, `q_option`, `uid`, `ssid`, `score_u`, `rid`) VALUES
(137, 8, '<table style="width: 508px;">\r\n<tbody>\r\n<tr style="height: 15px;">\r\n<th style="width: 155px; height: 15px;">JUSTE AVANT</th>\r\n<th style="width: 202px; height: 15px;">LE NOMBRE</th>\r\n<th style="width: 129px; height: 15px;">JUSTE APRES</th>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>&nbsp;315</strong></td>\r\n<td style="width: 129px; height: 26px;">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>860</strong></td>\r\n<td style="width: 129px; height: 26px;">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>1235</strong></td>\r\n<td style="width: 129px; height: 26px;">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>2001</strong></td>\r\n<td style="width: 129px; height: 26px;">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>5400</strong></td>\r\n<td style="width: 129px; height: 26px;">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>1000</strong></td>\r\n<td style="width: 129px; height: 26px;">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 0, 0, 1),
(138, 9, '<table style="width: 508px;">\r\n<tbody>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;">&nbsp;</td>\r\n<td style="width: 138px; height: 26px; text-align: center;">4237</td>\r\n<td style="width: 138px; height: 26px; text-align: center;">&nbsp;</td>\r\n<td style="width: 138px; height: 26px; text-align: center;">4584</td>\r\n<td style="width: 138px; height: 26px; text-align: center;">&nbsp;</td>\r\n<td style="width: 193px; height: 26px; text-align: center;">5183</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>', 1, 0, 0, 1),
(139, 10, '6600___Six mille soixante', 1, 0, 0, 1),
(140, 10, '606___Six cent soixante', 1, 0, 0, 1),
(141, 10, '6006___Six mille six', 1, 0, 0, 1),
(142, 10, '660___Sil mille six cents', 1, 0, 0, 1),
(143, 10, '6060___Six cent six', 1, 0, 0, 1),
(144, 12, '{"search":"","response":""}', 1, 0, 0, 1),
(255, 1, '1', 1, 0, 0, 2),
(256, 2, '11', 1, 0, 1, 2),
(257, 3, 'jhkljkjmjlmjllklmjmnbbn vxfgsjre', 1, 0, 0, 2),
(258, 7, '120', 1, 0, 1, 2),
(259, 8, '<table style="width: 508px;">\r\n<tbody>\r\n<tr style="height: 15px;">\r\n<th style="width: 155px; height: 15px;">JUSTE AVANT</th>\r\n<th style="width: 202px; height: 15px;">LE NOMBRE</th>\r\n<th style="width: 129px; height: 15px;">JUSTE APRES</th>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;314</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>&nbsp;315</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;316</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;859</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>860</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;861</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;1234</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>1235</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;1236</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;2000</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>2001</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;2002</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;5399</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>5400</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;999</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>1000</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;1001</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 0, 0, 2),
(260, 9, '<table style="width: 508px;">\r\n<tbody>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;4173</td>\r\n<td style="width: 138px; height: 26px; text-align: center;">4237</td>\r\n<td style="width: 138px; height: 26px; text-align: center;" contenteditable="true">&nbsp;4576</td>\r\n<td style="width: 138px; height: 26px; text-align: center;">4584</td>\r\n<td style="width: 138px; height: 26px; text-align: center;" contenteditable="true">&nbsp;4725</td>\r\n<td style="width: 193px; height: 26px; text-align: center;">5183</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 0, 0, 2),
(261, 10, '6600___Sil mille six cents', 1, 0, 0, 2),
(262, 10, '606___Six cent soixante', 1, 0, 0, 2),
(263, 10, '6006___Six cent six', 1, 0, 0, 2),
(264, 10, '660___Six mille six', 1, 0, 0, 2),
(265, 10, '6060___Six mille soixante', 1, 0, 0, 2),
(266, 12, '{"search":"","response":""}', 1, 0, 0, 2),
(551, 106, '353', 1, 0, 1, 3),
(552, 108, '358', 1, 0, 1, 3),
(553, 109, '365', 1, 0, 1, 3),
(554, 110, '375', 1, 0, 1, 3),
(555, 111, '381', 1, 0, 1, 3),
(556, 113, '388', 1, 0, 1, 3),
(557, 114, '390', 1, 0, 1, 3),
(558, 115, '393', 1, 0, 1, 3),
(559, 1, '2', 1, 0, 1, 3),
(560, 2, '12', 1, 0, 0, 3),
(561, 7, '120', 1, 0, 1, 3),
(562, 8, '<table style="width: 508px;">\r\n<tbody>\r\n<tr style="height: 15px;">\r\n<th style="width: 155px; height: 15px;">JUSTE AVANT</th>\r\n<th style="width: 202px; height: 15px;">LE NOMBRE</th>\r\n<th style="width: 129px; height: 15px;">JUSTE APRES</th>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;314</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>&nbsp;315</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;316</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>860</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;861</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>1235</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>2001</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;2002</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>5400</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;999</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>1000</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 0, 0, 3),
(563, 9, '<table style="width: 508px;">\r\n<tbody>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;4173</td>\r\n<td style="width: 138px; height: 26px; text-align: center;">4237</td>\r\n<td style="width: 138px; height: 26px; text-align: center;" contenteditable="true">&nbsp;4576</td>\r\n<td style="width: 138px; height: 26px; text-align: center;">4584</td>\r\n<td style="width: 138px; height: 26px; text-align: center;" contenteditable="true">&nbsp;4725</td>\r\n<td style="width: 193px; height: 26px; text-align: center;">5183</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 0, 0, 3),
(564, 10, '6600___Sil mille six cents', 1, 0, 0, 3),
(565, 10, '606___Six cent six', 1, 0, 0, 3),
(566, 10, '6006___Six mille six', 1, 0, 0, 3),
(567, 10, '660___Six cent soixante', 1, 0, 0, 3),
(568, 10, '6060___Six mille soixante', 1, 0, 0, 3),
(569, 12, '{"search":"","response":""}', 1, 0, 0, 3),
(578, 8, '<table style="width: 508px;">\r\n<tbody>\r\n<tr style="height: 15px;">\r\n<th style="width: 155px; height: 15px;">JUSTE AVANT</th>\r\n<th style="width: 202px; height: 15px;">LE NOMBRE</th>\r\n<th style="width: 129px; height: 15px;">JUSTE APRES</th>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true"> </td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong> 315</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true"> </td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true"> </td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>860</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true"> </td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true"> </td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>1235</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true"> </td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true"> </td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>2001</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true"> </td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true"> </td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>5400</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true"> </td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true"> </td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>1000</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true"> </td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 0, 0, 4),
(579, 9, '<table style="width: 508px;">\r\n<tbody>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true"> </td>\r\n<td style="width: 138px; height: 26px; text-align: center;">4237</td>\r\n<td style="width: 138px; height: 26px; text-align: center;" contenteditable="true"> </td>\r\n<td style="width: 138px; height: 26px; text-align: center;">4584</td>\r\n<td style="width: 138px; height: 26px; text-align: center;" contenteditable="true"> </td>\r\n<td style="width: 193px; height: 26px; text-align: center;">5183</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 0, 0, 4),
(580, 10, '6600___Six mille soixante', 1, 0, 0, 4),
(581, 10, '606___Six mille six', 1, 0, 0, 4),
(582, 10, '6006___Six cent six', 1, 0, 0, 4),
(583, 10, '660___Six cent soixante', 1, 0, 0, 4),
(584, 10, '6060___Sil mille six cents', 1, 0, 0, 4),
(585, 12, '{"search":"","response":""}', 1, 0, 0, 4),
(586, 44, 'Parlement', 4, 4, 0, 5),
(763, 8, '<table style="width: 508px;">\r\n<tbody>\r\n<tr style="height: 15px;">\r\n<th style="width: 155px; height: 15px;">JUSTE AVANT</th>\r\n<th style="width: 202px; height: 15px;">LE NOMBRE</th>\r\n<th style="width: 129px; height: 15px;">JUSTE APRES</th>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>&nbsp;315</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>860</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>1235</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>2001</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>5400</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>1000</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 0, 0, 6),
(764, 9, '<table style="width: 508px;">\r\n<tbody>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 138px; height: 26px; text-align: center;">4237</td>\r\n<td style="width: 138px; height: 26px; text-align: center;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 138px; height: 26px; text-align: center;">4584</td>\r\n<td style="width: 138px; height: 26px; text-align: center;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 193px; height: 26px; text-align: center;">5183</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 0, 0, 6),
(765, 10, '6600___Six cent six', 1, 0, 0, 6),
(766, 10, '606___Six mille soixante', 1, 0, 0, 6),
(767, 10, '6006___Sil mille six cents', 1, 0, 0, 6),
(768, 10, '660___Six mille six', 1, 0, 0, 6),
(769, 10, '6060___Six cent soixante', 1, 0, 0, 6),
(770, 12, '{"search":"","response":""}', 1, 0, 0, 6),
(1083, 106, '352', 1, 0, 0, 7),
(1084, 107, 'rgszhzbey"u"''ujr,g', 1, 0, 0, 7),
(1085, 108, '358', 1, 0, 1, 7),
(1086, 109, '366', 1, 0, 0, 7),
(1087, 110, '375', 1, 0, 1, 7),
(1088, 111, '381', 1, 0, 1, 7),
(1089, 113, '388', 1, 0, 1, 7),
(1090, 114, '390', 1, 0, 1, 7),
(1091, 115, '393', 1, 0, 1, 7),
(1092, 8, '<table style="width: 508px;">\r\n<tbody>\r\n<tr style="height: 15px;">\r\n<th style="width: 155px; height: 15px;">JUSTE AVANT</th>\r\n<th style="width: 202px; height: 15px;">LE NOMBRE</th>\r\n<th style="width: 129px; height: 15px;">JUSTE APRES</th>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>&nbsp;315</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>860</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>1235</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>2001</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>5400</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>1000</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 0, 0, 7),
(1093, 9, '<table style="width: 508px;">\r\n<tbody>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 138px; height: 26px; text-align: center;">4237</td>\r\n<td style="width: 138px; height: 26px; text-align: center;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 138px; height: 26px; text-align: center;">4584</td>\r\n<td style="width: 138px; height: 26px; text-align: center;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 193px; height: 26px; text-align: center;">5183</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 0, 0, 7),
(1094, 10, '6600___Six cent soixante', 1, 0, 0, 7),
(1095, 10, '606___Six cent six', 1, 0, 0, 7),
(1096, 10, '6006___Six mille soixante', 1, 0, 0, 7),
(1097, 10, '660___Six mille six', 1, 0, 0, 7),
(1098, 10, '6060___Sil mille six cents', 1, 0, 0, 7),
(1099, 12, '{"search":"","response":""}', 1, 0, 0, 7),
(1250, 7, '120', 1, 0, 1, 8),
(1251, 8, '<table style="width: 508px;">\r\n<tbody>\r\n<tr style="height: 15px;">\r\n<th style="width: 155px; height: 15px;">JUSTE AVANT</th>\r\n<th style="width: 202px; height: 15px;">LE NOMBRE</th>\r\n<th style="width: 129px; height: 15px;">JUSTE APRES</th>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;314</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>&nbsp;315</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;316</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;859</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>860</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;861</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>1235</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>2001</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>5400</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>1000</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 0, 0, 8),
(1252, 9, '<table style="width: 508px;">\r\n<tbody>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;4173</td>\r\n<td style="width: 138px; height: 26px; text-align: center;">4237</td>\r\n<td style="width: 138px; height: 26px; text-align: center;" contenteditable="true">4576&nbsp;</td>\r\n<td style="width: 138px; height: 26px; text-align: center;">4584</td>\r\n<td style="width: 138px; height: 26px; text-align: center;" contenteditable="true">4725&nbsp;</td>\r\n<td style="width: 193px; height: 26px; text-align: center;">5183</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 0, 0, 8),
(1253, 10, '6600___Six mille soixante', 1, 0, 0, 8),
(1254, 10, '606___Sil mille six cents', 1, 0, 0, 8),
(1255, 10, '6006___Six cent soixante', 1, 0, 0, 8),
(1256, 10, '660___Six mille six', 1, 0, 0, 8),
(1257, 10, '6060___Six cent six', 1, 0, 0, 8),
(1258, 12, '{"search":"","response":""}', 1, 0, 0, 8),
(1359, 52, '<table style="height: 182px;" width="652">\r\n<tbody>\r\n<tr style="height: 37px;">\r\n<td style="width: 121px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 121px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 123px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 124px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 129px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 37px;">\r\n<td style="width: 121px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 121px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 123px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 124px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 129px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table style="height: 182px;" width="652">\r\n<tbody>\r\n<tr style="height: 37px;">\r\n<td style="width: 121px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 121px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 123px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 124px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 129px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 37px;">\r\n<td style="width: 121px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 121px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 123px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 124px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 129px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 0, 0, 10),
(1360, 57, '<table style="height: 218px; width: 649px;">\r\n<tbody>\r\n<tr>\r\n<th style="width: 125px;">\r\n<h3>pois</h3>\r\n</th>\r\n<th style="width: 120px;">\r\n<h3>peau</h3>\r\n</th>\r\n<th style="width: 112px;">\r\n<h3>point</h3>\r\n</th>\r\n<th style="width: 138px;">\r\n<h3>poids</h3>\r\n</th>\r\n<th style="width: 134px;">\r\n<h3>pont</h3>\r\n</th>\r\n</tr>\r\n<tr>\r\n<td style="width: 125px; text-align: center;">\r\n<h3><strong>maire</strong></h3>\r\n</td>\r\n<td style="width: 120px; text-align: center;">\r\n<h3><strong>&nbsp;mer</strong></h3>\r\n</td>\r\n<td style="width: 112px; text-align: center;">\r\n<h3><strong>mare</strong></h3>\r\n</td>\r\n<td style="width: 138px; text-align: center;">\r\n<h3><strong>mire</strong></h3>\r\n</td>\r\n<td style="width: 134px; text-align: center;">\r\n<h3><strong>mère</strong></h3>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style="width: 125px; text-align: center;">\r\n<h3><strong>pire</strong></h3>\r\n</td>\r\n<td style="width: 120px; text-align: center;">\r\n<h3><strong>paire</strong></h3>\r\n</td>\r\n<td style="width: 112px; text-align: center;">\r\n<h3><strong>par</strong></h3>\r\n</td>\r\n<td style="width: 138px; text-align: center;">\r\n<h3><strong>père</strong></h3>\r\n</td>\r\n<td style="width: 134px; text-align: center;">\r\n<h3><strong>perd</strong></h3>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style="width: 125px; text-align: center;">\r\n<h3><strong>verre</strong></h3>\r\n</td>\r\n<td style="width: 120px; text-align: center;">\r\n<h3><strong>vent</strong></h3>\r\n</td>\r\n<td style="width: 112px; text-align: center;">\r\n<h3><strong>ver</strong></h3>\r\n</td>\r\n<td style="width: 138px; text-align: center;">\r\n<h3><strong>vert</strong></h3>\r\n</td>\r\n<td style="width: 134px; text-align: center;">\r\n<h3><strong>vers</strong></h3>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 0, 0, 10),
(1517, 8, '<table style="width: 508px;">\r\n<tbody>\r\n<tr style="height: 15px;">\r\n<th style="width: 155px; height: 15px;">JUSTE AVANT</th>\r\n<th style="width: 202px; height: 15px;">LE NOMBRE</th>\r\n<th style="width: 129px; height: 15px;">JUSTE APRES</th>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>&nbsp;315</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>860</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>1235</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>2001</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>5400</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>1000</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 0, 0, 11),
(1518, 9, '<table style="width: 508px;">\r\n<tbody>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 138px; height: 26px; text-align: center;">4237</td>\r\n<td style="width: 138px; height: 26px; text-align: center;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 138px; height: 26px; text-align: center;">4584</td>\r\n<td style="width: 138px; height: 26px; text-align: center;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 193px; height: 26px; text-align: center;">5183</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 0, 0, 11),
(1519, 12, '{"search":"","response":""}', 1, 0, 0, 11);

-- --------------------------------------------------------

--
-- Structure de la table `eval_category`
--

CREATE TABLE IF NOT EXISTS `eval_category` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(1000) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `eval_category`
--

INSERT INTO `eval_category` (`cid`, `category_name`) VALUES
(2, 'FRANCAIS'),
(3, 'MATHS');

-- --------------------------------------------------------

--
-- Structure de la table `eval_circo`
--

CREATE TABLE IF NOT EXISTS `eval_circo` (
  `ciid` int(11) NOT NULL AUTO_INCREMENT,
  `rne` char(8) NOT NULL,
  `label` varchar(225) DEFAULT NULL,
  UNIQUE KEY `rnid` (`ciid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `eval_circo`
--

INSERT INTO `eval_circo` (`ciid`, `rne`, `label`) VALUES
(1, '9760304B', 'CIRCONSCRIPTION 1ER DEGRE IEN ASH 1ER-2ND DEGRE+PPF+FORMATION\r'),
(2, '9760297U', 'CIRCONSCRIPTION 1ER DEGRE IEN BANDRABOUA (MAYOTTE NORD)\r'),
(3, '9760233Z', 'CIRCONSCRIPTION 1ER DEGRE IEN DEMBENI (MAYOTTE SUD)\r'),
(4, '9760232Y', 'CIRCONSCRIPTION 1ER DEGRE IEN IENA KOUNGOU\r'),
(5, '9760352D', 'CIRCONSCRIPTION 1ER DEGRE IEN MAMOUDZOU CENTRE\r'),
(6, '9760263G', 'CIRCONSCRIPTION 1ER DEGRE IEN MAMOUDZOU NORD\r'),
(7, '9760299W', 'CIRCONSCRIPTION 1ER DEGRE IEN MAMOUDZOU SUD\r'),
(8, '9760285F', 'CIRCONSCRIPTION 1ER DEGRE IEN PETITE-TERRE\r'),
(9, '9760234A', 'CIRCONSCRIPTION 1ER DEGRE IEN SADA (MAYOTTE OUEST)\r'),
(10, '9760309G', 'CIRCONSCRIPTION 1ER DEGRE IEN TSINGONI');

-- --------------------------------------------------------

--
-- Structure de la table `eval_class`
--

CREATE TABLE IF NOT EXISTS `eval_class` (
  `clid` int(11) NOT NULL AUTO_INCREMENT,
  `code` char(3) NOT NULL,
  `cyid` int(11) NOT NULL,
  UNIQUE KEY `clid` (`clid`),
  KEY `FK_eval_class` (`cyid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `eval_class`
--

INSERT INTO `eval_class` (`clid`, `code`, `cyid`) VALUES
(1, 'PS', 1),
(2, 'MS', 1),
(3, 'GS', 1),
(4, 'CP', 2),
(5, 'CE1', 2),
(6, 'CE2', 3),
(7, 'CM1', 3),
(8, 'CM2', 3);

-- --------------------------------------------------------

--
-- Structure de la table `eval_coef`
--

CREATE TABLE IF NOT EXISTS `eval_coef` (
  `coid` int(11) NOT NULL AUTO_INCREMENT,
  `quid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `coef` float NOT NULL,
  PRIMARY KEY (`coid`),
  KEY `FK_eval_coef` (`qid`),
  KEY `FK_eval_coef_quiz` (`quid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

--
-- Contenu de la table `eval_coef`
--

INSERT INTO `eval_coef` (`coid`, `quid`, `qid`, `coef`) VALUES
(11, 1, 0, 1),
(12, 1, 12, 1),
(13, 1, 11, 1),
(14, 1, 10, 1),
(15, 1, 9, 1),
(16, 1, 8, 1),
(17, 1, 7, 1),
(18, 1, 3, 1),
(19, 1, 2, 1),
(20, 1, 1, 2),
(21, 2, 0, 1),
(22, 2, 13, 1),
(23, 2, 5, 1),
(24, 2, 2, 1),
(25, 2, 1, 1),
(26, 2, 44, 1),
(27, 1, 115, 1),
(28, 1, 114, 1),
(29, 1, 113, 1),
(30, 1, 111, 1),
(31, 1, 110, 1),
(32, 1, 109, 1),
(33, 1, 108, 1),
(34, 1, 107, 1),
(35, 1, 106, 1),
(36, 3, 0, 1),
(37, 3, 115, 1),
(38, 3, 114, 1),
(39, 3, 113, 1),
(40, 3, 111, 1),
(41, 3, 110, 1),
(42, 3, 109, 1),
(43, 3, 108, 1),
(44, 3, 107, 1),
(45, 3, 106, 1),
(46, 3, 92, 1),
(47, 3, 67, 1),
(48, 3, 66, 1),
(49, 3, 65, 1),
(50, 3, 64, 1),
(51, 3, 63, 1),
(52, 3, 62, 1),
(53, 3, 61, 1),
(54, 3, 60, 1),
(55, 3, 59, 1),
(56, 3, 58, 1),
(57, 3, 57, 1),
(58, 3, 56, 1),
(59, 3, 55, 1),
(60, 3, 54, 1),
(61, 3, 53, 1),
(62, 3, 52, 1),
(63, 3, 3, 1),
(64, 3, 2, 1),
(65, 3, 1, 1),
(66, 4, 0, 1),
(67, 4, 51, 1),
(68, 4, 50, 1),
(69, 4, 49, 1),
(70, 4, 48, 1),
(71, 4, 47, 1),
(72, 4, 39, 1),
(73, 4, 38, 1),
(74, 4, 37, 1),
(75, 4, 36, 1),
(76, 4, 34, 1),
(77, 4, 32, 1),
(78, 4, 31, 1),
(79, 4, 30, 1),
(80, 4, 29, 1),
(81, 4, 28, 1),
(82, 4, 27, 1),
(83, 4, 26, 1),
(84, 4, 25, 1),
(85, 4, 24, 1),
(86, 4, 22, 1),
(87, 4, 19, 1),
(88, 4, 18, 1),
(89, 4, 17, 1),
(90, 4, 16, 1),
(91, 4, 15, 1),
(92, 4, 14, 1),
(93, 4, 12, 1),
(94, 4, 11, 1),
(95, 4, 10, 1),
(96, 4, 8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `eval_competency`
--

CREATE TABLE IF NOT EXISTS `eval_competency` (
  `comid` int(11) NOT NULL AUTO_INCREMENT,
  `compet_name` varchar(250) NOT NULL,
  `description` text,
  `clids` text,
  `quids` text,
  UNIQUE KEY `comid` (`comid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `eval_conf`
--

CREATE TABLE IF NOT EXISTS `eval_conf` (
  `conf_id` int(11) NOT NULL AUTO_INCREMENT,
  `const` varchar(25) NOT NULL,
  `value` varchar(25) NOT NULL,
  PRIMARY KEY (`conf_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `eval_conf`
--

INSERT INTO `eval_conf` (`conf_id`, `const`, `value`) VALUES
(1, 'CONF_MAIL_QUIZ', '1');

-- --------------------------------------------------------

--
-- Structure de la table `eval_cycle`
--

CREATE TABLE IF NOT EXISTS `eval_cycle` (
  `cyid` int(11) NOT NULL AUTO_INCREMENT,
  `cycle_name` varchar(50) NOT NULL,
  UNIQUE KEY `cyid` (`cyid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `eval_cycle`
--

INSERT INTO `eval_cycle` (`cyid`, `cycle_name`) VALUES
(1, 'Cycle 1'),
(2, 'Cycle 2'),
(3, 'Cycle 3');

-- --------------------------------------------------------

--
-- Structure de la table `eval_etab`
--

CREATE TABLE IF NOT EXISTS `eval_etab` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `rne` char(8) NOT NULL,
  `label` varchar(225) NOT NULL,
  `ciid` int(11) DEFAULT NULL,
  UNIQUE KEY `eid` (`eid`),
  KEY `FK_eval_etab` (`label`),
  KEY `FK_eval_etab_school` (`rne`),
  KEY `FK_eval_etab_circo` (`ciid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `eval_etab`
--

INSERT INTO `eval_etab` (`eid`, `rne`, `label`, `ciid`) VALUES
(1, '9760022V', 'ECOLE ELEMENTAIRE DE LABATTOIR 1 LA FERME', 8),
(2, '9760056G', 'ECOLE ELEMENTAIRE DE LABATTOIR 2 POTELEA', 8),
(3, '9760093X', 'ECOLE ELEMENTAIRE DE LABATTOIR 3 BADAMIERS', 8),
(4, '9760024X', 'ECOLE ELEMENTAIRE DE LABATTOIR 4 MORIOMBENI', 8),
(5, '9760139X', 'ECOLE ELEMENTAIRE DE LABATTOIR 5 MOYA', 8),
(6, '9760186Y', 'ECOLE ELEMENTAIRE DE LABATTOIR 6 FOUR A CHAUX', 8),
(7, '9760260D', 'ECOLE ELEMENTAIRE DE LABATTOIR 7 TOUTOUROUCHA', 8);

-- --------------------------------------------------------

--
-- Structure de la table `eval_group`
--

CREATE TABLE IF NOT EXISTS `eval_group` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(250) NOT NULL,
  `validate_for_days` int(11) NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `eval_group`
--

INSERT INTO `eval_group` (`gid`, `group_name`, `validate_for_days`) VALUES
(1, 'Super Admin', 0),
(2, 'Elèves', 0);

-- --------------------------------------------------------

--
-- Structure de la table `eval_level`
--

CREATE TABLE IF NOT EXISTS `eval_level` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(1000) NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `eval_level`
--

INSERT INTO `eval_level` (`lid`, `level_name`) VALUES
(1, 'Niveau 1'),
(2, 'Niveau 2'),
(3, 'Niveau 3'),
(4, 'Niveau 4'),
(5, 'Niveau 5');

-- --------------------------------------------------------

--
-- Structure de la table `eval_options`
--

CREATE TABLE IF NOT EXISTS `eval_options` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `qid` int(11) NOT NULL,
  `q_option` text NOT NULL,
  `q_option_match` varchar(1000) DEFAULT NULL,
  `score` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`oid`),
  KEY `FK_eval_options` (`qid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=601 ;

--
-- Contenu de la table `eval_options`
--

INSERT INTO `eval_options` (`oid`, `qid`, `q_option`, `q_option_match`, `score`) VALUES
(1, 1, '<p>Parce que sa m&egrave;re &eacute;tait gentille avec lui.</p>', NULL, 0),
(2, 1, '<p>Parce qu''il jouait, dessinait et inventait des histoire &agrave; Grodoudou.</p>', NULL, 1),
(3, 1, '<p>Parce qu''il parlait tout seul.</p>', NULL, 0),
(10, 2, '<p>Le petit gar&ccedil;on</p>', NULL, 0),
(11, 2, '<p>Un chien en peluche</p>', NULL, 1),
(12, 2, '<p>Un ours brun</p>', NULL, 0),
(22, 5, '', NULL, 0.333333),
(23, 5, '', NULL, 0.333333),
(24, 5, '', NULL, 0.333333),
(34, 10, '6600', 'Sil mille six cents', 0.2),
(35, 10, '606', 'Six cent six', 0.2),
(36, 10, '6006', 'Six mille six', 0.2),
(37, 10, '660', 'Six cent soixante', 0.2),
(38, 10, '6060', 'Six mille soixante', 0.2),
(39, 11, '2743', NULL, 0.2),
(40, 11, '578', NULL, 0.2),
(41, 11, '1296', NULL, 0.2),
(42, 11, '708', NULL, 0.2),
(43, 11, '3017', NULL, 0.2),
(48, 13, '<p>ff</p>', NULL, 0),
(49, 13, '<p>ee</p>', NULL, 0),
(50, 13, '<p>ee</p>', NULL, 0),
(51, 13, '<p>yy</p>', NULL, 1),
(68, 15, '<p>4999</p>', NULL, 1),
(69, 15, '', NULL, 0),
(70, 15, '', NULL, 0),
(71, 15, '', NULL, 0),
(72, 16, '<p>VRAI</p>', NULL, 1),
(73, 16, '', NULL, 0),
(74, 17, '<p><strong>27 - 67 - 267 - 627 - 672</strong></p>', NULL, 1),
(75, 17, '', NULL, 0),
(76, 17, '', NULL, 0),
(77, 17, '', NULL, 0),
(94, 18, '<p>quatre mille six cent vingt-trois</p>', NULL, 1),
(95, 14, '159250', NULL, 1),
(96, 14, '6370', NULL, 1),
(97, 14, '0', NULL, 1),
(98, 14, '0', NULL, 1),
(99, 7, '120', NULL, 1),
(105, 19, '6600', 'Six mille six cents', 0.2),
(106, 19, '606', 'Six cent six', 0.2),
(107, 19, '6006', 'Six mille six', 0.2),
(108, 19, '660', 'Six cent soixante', 0.2),
(109, 19, '6060', 'Six mille soixante', 0.2),
(110, 22, '<p>2743</p>', NULL, 0.2),
(111, 22, '<p>578</p>', NULL, 0.2),
(112, 22, '<p>1296</p>', NULL, 0.2),
(113, 22, '<p>708</p>', NULL, 0.2),
(114, 22, '<p>3017</p>', NULL, 0.2),
(115, 6, '', NULL, 0),
(116, 6, '', NULL, 0),
(117, 6, '', NULL, 1),
(118, 24, '<p>50 - 100 - 150 - 200 - 250</p>', NULL, 0),
(119, 24, '<p>125 - 175 - 225 - 275 - 325</p>', NULL, 0),
(120, 24, '<p>50 - 150 - 250 - 350 - 450</p>', NULL, 1),
(121, 24, '<p>255 - 305 - 355 - 405 - 455</p>', NULL, 0),
(122, 25, '<p>2900</p>', NULL, 0.333333),
(123, 25, '<p>3600</p>', NULL, 0.333333),
(124, 25, '<p>4100</p>', NULL, 0.333333),
(125, 26, '50', NULL, 0.25),
(126, 26, '80', NULL, 0.25),
(127, 26, '130', NULL, 0.25),
(128, 26, '200', NULL, 0.25),
(129, 28, '5 283', NULL, 0.166667),
(130, 28, '659', NULL, 0.166667),
(131, 28, '4 - 3', NULL, 0.166667),
(132, 28, '250', NULL, 0.166667),
(133, 28, '338', NULL, 0.166667),
(134, 28, '520', NULL, 0.166667),
(139, 34, '64', NULL, 0.166667),
(140, 34, '42', NULL, 0.166667),
(141, 34, '72', NULL, 0.166667),
(142, 34, '40', NULL, 0.166667),
(143, 34, '28', NULL, 0.166667),
(144, 34, '36', NULL, 0.166667),
(149, 40, '<p>6</p>', NULL, 0),
(150, 40, '<p>9</p>', NULL, 0),
(151, 40, '<p>7</p>', NULL, 1),
(152, 40, '<p>14</p>', NULL, 0),
(157, 41, '<p>6</p>', NULL, 0),
(158, 41, '<p>9</p>', NULL, 0),
(159, 41, '<p>7</p>', NULL, 1),
(160, 41, '<p>14</p>', NULL, 0),
(169, 43, '<p>6</p>', NULL, 0),
(170, 43, '<p>9</p>', NULL, 0),
(171, 43, '<p>7</p>', NULL, 1),
(172, 43, '<p>14</p>', NULL, 0),
(173, 45, '<p>6</p>', NULL, 0),
(174, 45, '<p>9</p>', NULL, 0),
(175, 45, '<p>7</p>', NULL, 1),
(176, 45, '<p>14</p>', NULL, 0),
(177, 46, '<p>6</p>', NULL, 0),
(178, 46, '<p>9</p>', NULL, 0),
(179, 46, '<p>7</p>', NULL, 1),
(180, 46, '<p>14</p>', NULL, 0),
(185, 47, '50', NULL, 1),
(186, 47, '80', NULL, 1),
(187, 47, '130', NULL, 1),
(188, 47, '200', NULL, 1),
(189, 48, '50', NULL, 1),
(190, 48, '80', NULL, 1),
(191, 48, '130', NULL, 1),
(192, 48, '200', NULL, 1),
(193, 49, '50', NULL, 1),
(194, 49, '80', NULL, 1),
(195, 49, '130', NULL, 1),
(196, 49, '200', NULL, 1),
(197, 39, '<p>60</p>\r\n<p>&nbsp;</p>', NULL, 0),
(198, 39, '<p>30</p>', NULL, 1),
(199, 39, '<p>45</p>', NULL, 0),
(200, 39, '<p>120</p>', NULL, 0),
(213, 51, '<p>6</p>\r\n<p>&nbsp;</p>', NULL, 0),
(214, 51, '<p>9</p>', NULL, 0),
(215, 51, '<p>7</p>', NULL, 1),
(216, 51, '<p>14</p>', NULL, 0),
(217, 50, '<p>10</p>', NULL, 0),
(218, 50, '<p>12</p>', NULL, 1),
(219, 50, '<p>11</p>', NULL, 0),
(220, 50, '<p>15</p>', NULL, 0),
(221, 53, '<p>manteau</p>', NULL, 1),
(222, 53, '<p>manto</p>', NULL, 0),
(223, 53, '<p>menteau</p>', NULL, 0),
(224, 53, '<p>mintau</p>', NULL, 0),
(225, 54, '<p>grend</p>', NULL, 0),
(226, 54, '<p>gran</p>', NULL, 0),
(227, 54, '<p>grand</p>', NULL, 1),
(228, 54, '<p>crand</p>', NULL, 0),
(229, 55, '<p>pouss</p>', NULL, 0),
(230, 55, '<p>puse</p>', NULL, 0),
(231, 55, '<p>puche</p>', NULL, 0),
(232, 55, '<p>puce</p>', NULL, 1),
(233, 56, '<p>sarote</p>', NULL, 0),
(234, 56, '<p>karot</p>', NULL, 0),
(235, 56, '<p>carotte</p>', NULL, 1),
(236, 56, '<p>charote</p>', NULL, 0),
(237, 61, '<p>dessinent</p>', NULL, 0),
(238, 61, '<p>dessine</p>', NULL, 1),
(239, 61, '<p>dessines</p>', NULL, 0),
(240, 61, '<p>dessinez</p>', NULL, 0),
(241, 62, '<p>nage</p>', NULL, 0),
(242, 62, '<p>nages</p>', NULL, 0),
(243, 62, '<p>nageons</p>', NULL, 0),
(244, 62, '<p>nagent</p>', NULL, 1),
(251, 70, '<p>forme &eacute;tranges.</p>', NULL, 0),
(252, 70, '<p>forme &eacute;trange.</p>', NULL, 1),
(253, 70, '<p>formes &eacute;tranges.</p>', NULL, 0),
(254, 70, '<p>formes &eacute;trange</p>', NULL, 0),
(255, 73, 'La belle voiture des voisins', 'roule.', 0.25),
(256, 73, 'Les petites filles de mon ami', 'chantent.', 0.25),
(257, 73, 'Un maki', 'saute.', 0.25),
(258, 73, 'Notre grand frère ', 'nage.', 0.25),
(259, 74, '<p>petits.</p>', NULL, 1),
(260, 74, '<p>petite.</p>', NULL, 0),
(261, 74, '<p>petit.</p>', NULL, 0),
(262, 74, '<p>petites.</p>', NULL, 0),
(263, 75, '<p>p&ecirc;che</p>', NULL, 1),
(264, 75, '<p>p&ecirc;ches</p>', NULL, 0),
(265, 75, '<p>p&ecirc;chent</p>', NULL, 0),
(266, 76, '<p>les balles</p>', NULL, 0),
(267, 76, '<p>notre balle</p>', NULL, 1),
(268, 76, '<p>ses balles</p>', NULL, 0),
(269, 78, 'Je', 'joue', 0.0909091),
(270, 78, 'Mohamed', 'joue', 0.0909091),
(271, 78, 'Leurs garçons', 'jouent', 0.0909091),
(272, 78, 'Elle', 'joue', 0.0909091),
(273, 78, 'Des filles jouent', 'jouent', 0.0909091),
(274, 78, 'Ils', 'jouent', 0.0909091),
(275, 78, 'Cette fille', 'joue', 0.0909091),
(276, 78, 'Votre garçon', 'joue', 0.0909091),
(277, 78, 'Azad et Laura', 'jouent', 0.0909091),
(278, 78, 'Le garçon', 'joue', 0.0909091),
(279, 78, 'Tu', 'joues', 0.0909091),
(280, 79, '<p>mange</p>', NULL, 0.5),
(281, 79, '<p>chassent</p>', NULL, 0),
(282, 79, '<p>dort</p>', NULL, 0.5),
(283, 79, '<p>chantent</p>', NULL, 0),
(284, 79, '<p>sont</p>', NULL, 0),
(290, 80, '<p>mange</p>', NULL, 0),
(291, 80, '<p>chassent</p>', NULL, 0.5),
(292, 80, '<p>dort</p>', NULL, 0),
(293, 80, '<p>chantent</p>', NULL, 0.5),
(294, 80, '<p>sont</p>', NULL, 0),
(295, 83, 'est', NULL, 0.166667),
(296, 83, 'plient', NULL, 0.166667),
(297, 83, 'habites', NULL, 0.166667),
(298, 83, 'chante', NULL, 0.166667),
(299, 83, 'a', NULL, 0.166667),
(300, 83, 'parle', NULL, 0.166667),
(301, 84, 'ALLER', 'va', 0.0833333),
(302, 84, 'ETRE', 'sont', 0.0833333),
(303, 84, 'POUVOIR', 'peut', 0.0833333),
(304, 84, 'AVOIR', 'a', 0.0833333),
(305, 84, 'ETRE', 'serez', 0.0833333),
(306, 84, 'POUVOIR', 'pourront', 0.0833333),
(307, 84, 'ALLER', 'irons', 0.0833333),
(308, 84, 'AVOIR', 'aurai', 0.0833333),
(309, 84, 'AVOIR', 'aviez', 0.0833333),
(310, 84, 'POUVOIR', 'pouvait', 0.0833333),
(311, 84, 'ALLER', 'allais', 0.0833333),
(312, 84, 'ETRE', 'étaient', 0.0833333),
(315, 96, 'homme', NULL, 1),
(321, 99, '<p>Elles voient une chaise au plafond</p>\r\n<p>&nbsp;</p>', NULL, 0),
(322, 99, '<p>Elles trouvent que M.Labon a fait quelque chose de ridicule</p>', NULL, 1),
(323, 99, '<p>Elles ont peur de ce qu''elles voient</p>', NULL, 0),
(324, 98, '<p>Dans un panier</p>', NULL, 0),
(325, 98, '<p>Sous les chaises</p>', NULL, 0),
(326, 98, '<p>Au plafond</p>', NULL, 1),
(327, 97, '<p>Il d&eacute;teste les souris</p>', NULL, 0),
(328, 97, '<p>Elles sont trop nombreuses.</p>', NULL, 1),
(331, 95, '<p>VRAI</p>', NULL, 0),
(332, 95, '<p>FAUX</p>', NULL, 1),
(336, 102, '<p>Il d&eacute;teste les souris</p>', NULL, 0),
(337, 102, '<p>Elles sont trop nombreuses.</p>\r\n<p>&nbsp;</p>', NULL, 1),
(338, 102, '<p>Elles rient trop fort.</p>', NULL, 0),
(339, 102, '<p>Elles mangent tout son fromage.</p>', NULL, 0),
(340, 101, '<p>Une souris</p>', NULL, 0),
(341, 101, '<p>Un homme</p>', NULL, 1),
(342, 101, '<p>Un fromage</p>', NULL, 0),
(343, 103, '<p>Dans un panier</p>', NULL, 0),
(344, 103, '<p>Pr&egrave;s du trou des souris</p>', NULL, 0),
(345, 103, '<p>Sous les chaises</p>', NULL, 0),
(346, 103, '<p>Au plafond</p>', NULL, 1),
(347, 104, '<p>Elles voient une chaise au plafond</p>', NULL, 0),
(348, 104, '<p>Elles trouvent que M.Labon a fait quelque chose de ridicule</p>', NULL, 1),
(349, 104, '<p>elles veulent le fromagequi se trouve dans les pi&egrave;ges</p>', NULL, 0),
(350, 104, '<p>Elles ont peur de ce qu''elles voient</p>', NULL, 0),
(351, 106, '<p>Il sourit sans rien dire</p>', NULL, 0),
(352, 106, '<p>Il ach&egrave;te des sourici&egrave;res</p>', NULL, 0),
(353, 106, '<p>Il colle tout au plafond</p>', NULL, 1),
(357, 108, '<p>Une souris</p>', NULL, 0),
(358, 108, '<p>Un homme</p>', NULL, 1),
(359, 108, '<p>Un fromage</p>', NULL, 0),
(364, 109, '<p>Il d&eacute;teste les souris</p>', NULL, 0),
(365, 109, '<p>Elles sont trop nombreuses.</p>\r\n<p>&nbsp;</p>', NULL, 1),
(366, 109, '<p>Elles rient trop fort.</p>', NULL, 0),
(367, 109, '<p>Elles mangent tout son fromage.</p>', NULL, 0),
(372, 110, '<p>Dans un panier</p>', NULL, 0),
(373, 110, '<p>Pr&egrave;s du trou des souris</p>', NULL, 0),
(374, 110, '<p>Sous les chaises</p>', NULL, 0),
(375, 110, '<p>Au plafond</p>', NULL, 1),
(380, 111, '<p>Elles voient une chaise au plafond</p>', NULL, 0),
(381, 111, '<p>Elles trouvent que M.Labon a fait quelque chose de ridicule</p>', NULL, 1),
(382, 111, '<p>elles veulent le fromagequi se trouve dans les pi&egrave;ges</p>', NULL, 0),
(383, 111, '<p>Elles ont peur de ce qu''elles voient</p>', NULL, 0),
(387, 113, '<p>Elles se mettent &agrave; rire</p>', NULL, 0),
(388, 113, '<p>Elles sont totalement effray&eacute;es</p>', NULL, 1),
(389, 113, '<p>Elles se remettent dans le bon sens</p>', NULL, 0),
(390, 114, '<p>Qu&rsquo;il faut se tenir &agrave; l&rsquo;envers en se tenant sur la t&ecirc;te.</p>', NULL, 1),
(391, 114, '<p>Qu&rsquo;il faut se sauver.</p>', NULL, 0),
(392, 114, '<p>Qu&rsquo;il faut attendre le lendemain.</p>', NULL, 0),
(393, 115, '<p>Les souris s&rsquo;&eacute;taient tenues sur la t&ecirc;te trop longtemps.</p>', NULL, 1),
(394, 115, '<p>Labon avait donn&eacute; trop de fromage aux souris.</p>', NULL, 0),
(395, 115, '<p>Les souris &eacute;taient tomb&eacute;es du plafond.</p>', NULL, 0),
(396, 116, '<p>VRAI</p>', NULL, 1),
(397, 116, '<p>FAUX</p>', NULL, 0),
(398, 117, '<p>Il est vieux et stupide</p>', NULL, 0),
(399, 117, '<p>Il est rus&eacute; et g&eacute;n&eacute;reux</p>', NULL, 1),
(400, 117, '<p>Il est m&eacute;chant et stupide</p>', NULL, 0),
(401, 120, '<p>En disant ce que M. Labon pense des souris.</p>', NULL, 0),
(402, 120, '<p>En d&eacute;crivant o&ugrave; vivent les souris.</p>', NULL, 0),
(403, 120, '<p>En disant ce que les souris se disent entre elles.</p>', NULL, 1),
(404, 120, '<p>En d&eacute;crivant de quoi ont l&rsquo;air les souris.</p>', NULL, 0),
(405, 121, '<p>Les souris s&rsquo;&eacute;taient tenues sur la t&ecirc;te trop longtemps.</p>', NULL, 1),
(406, 121, '<p>Labon avait donn&eacute; trop de fromage aux souris.</p>', NULL, 0),
(407, 121, '<p>Les souris &eacute;taient tomb&eacute;es du plafond.</p>', NULL, 0),
(408, 121, '<p>Labon avait mis de la colle sur le plancher.</p>', NULL, 0),
(409, 122, '<p>Elle est s&eacute;rieuse et triste.</p>', NULL, 0),
(410, 122, '<p>Elle est effrayante et excitante.</p>', NULL, 0),
(411, 122, '<p>Elle est amusante et ing&eacute;nieuse.</p>', NULL, 1),
(412, 122, '<p>Elle est palpitante et myst&eacute;rieuse.</p>', NULL, 0),
(413, 124, '', NULL, 1),
(414, 124, '', NULL, 0),
(415, 125, '', NULL, 0),
(416, 125, '', NULL, 0),
(417, 125, '', NULL, 1),
(418, 126, '', NULL, 0),
(419, 126, '', NULL, 1),
(420, 127, '', NULL, 0),
(421, 127, '', NULL, 1),
(422, 127, '', NULL, 0),
(423, 128, '', NULL, 1),
(424, 128, '', NULL, 0),
(425, 129, '', NULL, 0),
(426, 129, '', NULL, 1),
(427, 130, '', NULL, 1),
(428, 130, '', NULL, 0),
(429, 131, '', NULL, 0),
(430, 131, '', NULL, 1),
(431, 131, '', NULL, 0),
(432, 132, '', NULL, 0),
(433, 132, '', NULL, 0.5),
(434, 132, '', NULL, 0),
(435, 132, '', NULL, 0.5),
(436, 133, '', NULL, 0),
(437, 133, '', NULL, 1),
(438, 134, '', NULL, 0.5),
(439, 134, '', NULL, 0.5),
(440, 134, '', NULL, 0),
(441, 135, '', NULL, 1),
(442, 135, '', NULL, 0),
(446, 136, '', NULL, 0),
(447, 136, '', NULL, 1),
(448, 136, '', NULL, 0),
(481, 137, '', NULL, 1),
(482, 137, '', NULL, 0),
(483, 140, '', NULL, 0),
(484, 140, '', NULL, 0),
(485, 140, '', NULL, 1),
(486, 140, '', NULL, 0),
(487, 141, '', NULL, 0),
(488, 141, '', NULL, 0),
(489, 141, '', NULL, 1),
(523, 142, '', NULL, 0),
(524, 142, '', NULL, 1),
(525, 142, '', NULL, 0),
(529, 143, '', NULL, 0),
(530, 143, '', NULL, 0),
(531, 143, '', NULL, 1),
(535, 144, '', NULL, 0),
(536, 144, '', NULL, 1),
(537, 144, '', NULL, 0),
(541, 145, '', NULL, 0),
(542, 145, '', NULL, 0),
(543, 145, '', NULL, 1),
(547, 146, '', NULL, 1),
(548, 146, '', NULL, 0),
(549, 146, '', NULL, 0),
(553, 147, '', NULL, 0),
(554, 147, '', NULL, 1),
(555, 147, '', NULL, 0),
(559, 148, '', NULL, 1),
(560, 148, '', NULL, 0),
(561, 148, '', NULL, 0),
(565, 149, '', NULL, 0),
(566, 149, '', NULL, 1),
(567, 149, '', NULL, 0),
(571, 150, '', NULL, 0),
(572, 150, '', NULL, 0),
(573, 150, '', NULL, 1),
(574, 151, '', NULL, 0),
(575, 151, '', NULL, 0),
(576, 151, '', NULL, 1),
(580, 152, '', NULL, 0),
(581, 152, '', NULL, 0),
(582, 152, '', NULL, 1),
(586, 153, '', NULL, 0),
(587, 153, '', NULL, 1),
(588, 153, '', NULL, 0),
(592, 154, '', NULL, 1),
(593, 154, '', NULL, 0),
(594, 154, '', NULL, 0),
(598, 155, '', NULL, 0),
(599, 155, '', NULL, 0),
(600, 155, '', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `eval_qbank`
--

CREATE TABLE IF NOT EXISTS `eval_qbank` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `question_type` int(11) NOT NULL DEFAULT '1',
  `question` text NOT NULL,
  `description` text NOT NULL,
  `is_default_txt` tinyint(4) NOT NULL,
  `default_txt` mediumtext NOT NULL,
  `lid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `scid` int(11) NOT NULL,
  `pqid` int(11) DEFAULT NULL,
  `no_time_served` int(11) NOT NULL DEFAULT '0',
  `no_time_corrected` int(11) NOT NULL DEFAULT '0',
  `no_time_incorrected` int(11) NOT NULL DEFAULT '0',
  `no_time_unattempted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`qid`),
  KEY `FK_eval_qbank_categ` (`cid`),
  KEY `FK_eval_qbank_level` (`lid`),
  KEY `FK_eval_qbank_parent` (`pqid`),
  KEY `FK_eval_qbank_subcat` (`scid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=156 ;

--
-- Contenu de la table `eval_qbank`
--

INSERT INTO `eval_qbank` (`qid`, `question_type`, `question`, `description`, `is_default_txt`, `default_txt`, `lid`, `cid`, `scid`, `pqid`, `no_time_served`, `no_time_corrected`, `no_time_incorrected`, `no_time_unattempted`) VALUES
(1, 1, '<p>Le petit gar&ccedil;on a &eacute;t&eacute; content jusqu''&agrave; l''&acirc;ge de 3 ans?</p>', '<p>coche la bonne r&eacute;ponse</p>', 0, '', 3, 2, 2, 1, 7, 1, 1, 5),
(2, 1, '<p>Qui est Grodoudou</p>', '<p>coche la bonne r&eacute;ponse</p>', 0, '', 3, 2, 2, 1, 7, 1, 1, 5),
(3, 5, '<p>Le petit gar&ccedil;on hait l''&eacute;cole. Explique avec tes propres mots.</p>', '<p>Dissertation</p>', 0, '', 3, 2, 2, 1, 7, 0, 0, 6),
(5, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; (</em><em>les mots sont dict&eacute;s.)</em></p>\r\n<p><em>[a]</em></p>\r\n<p><em><img src="../../../ressources/upload/media/p20ananas.jpg?1474290681067" alt="" width="80" height="82" /></em></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(6, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; (</em><em>les mots sont dict&eacute;s.)</em></p>\r\n<p><em>[a]</em></p>\r\n<p><em><img src="../../../ressources/upload/media/p13choco.jpg?1474291071155" alt="" width="123" height="79" /><br /></em></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(7, 4, '<p><img src="../../../ressources/upload/media/p5trombone.jpg?1474291611513" alt="" width="501" height="191" /></p>\r\n<p><span style="text-decoration: underline;">compte le nombre de trombones</span></p>', '<p>Compte le nombre de trombones</p>', 0, '', 1, 3, 3, NULL, 7, 3, 0, 4),
(8, 7, '<p>Compl&egrave;te le tableau</p>', '<p>REMPLIR LES CASES VIDES</p>', 1, '<table style="width: 508px;">\r\n<tbody>\r\n<tr style="height: 15px;">\r\n<th style="width: 155px; height: 15px;">JUSTE AVANT</th>\r\n<th style="width: 202px; height: 15px;">LE NOMBRE</th>\r\n<th style="width: 129px; height: 15px;">JUSTE APRES</th>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>&nbsp;315</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>860</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>1235</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>2001</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>5400</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>1000</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', 3, 3, 3, 0, 7, 0, 0, 0),
(9, 7, '<p>Compl&egrave;te la s&eacute;rie avec les nombres suivants :</p>\r\n<p><strong>4725 - 4173 - 4576</strong></p>', '<p>REMPLIR LES CASES VIDES</p>', 1, '<table style="width: 508px;">\r\n<tbody>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 138px; height: 26px; text-align: center;">4237</td>\r\n<td style="width: 138px; height: 26px; text-align: center;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 138px; height: 26px; text-align: center;">4584</td>\r\n<td style="width: 138px; height: 26px; text-align: center;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 193px; height: 26px; text-align: center;">5183</td>\r\n</tr>\r\n</tbody>\r\n</table>', 3, 3, 3, 0, 7, 0, 0, 0),
(10, 3, '<p>Relie</p>', '<p>relie</p>', 0, '', 3, 3, 4, NULL, 7, 0, 7, 0),
(11, 4, '<p>Ecris les nombres dict&eacute;s en chiffres</p>\r\n<p><strong>(2743 -578 - 1296 -708 -3017)</strong></p>', '', 0, '', 3, 3, 4, NULL, 7, 0, 0, 7),
(12, 6, '<p>1. Les &eacute;l&egrave;ves jouent aux billes. Ce matin, ils ont d&eacute;cid&eacute; de les mettre ensemble et en ont compt&eacute; 76.</p>\r\n<p>A la fin de la r&eacute;cr&eacute;ation, apr&egrave;s avoir jou&eacute;, ils en comptent 124.</p>\r\n<p>Combien de billes ont-ils gagn&eacute; pendant la r&eacute;cr&eacute;ation?</p>\r\n<p>Ecris tes calculs dans le premier cadre et ta r&eacute;ponse dans le deuxi&egrave;me cadre.</p>', '', 0, '', 3, 3, 5, 0, 7, 0, 0, 0),
(13, 1, '<p>regarde mieux</p>', '<p>regarde</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(14, 4, '<p><img src="../../../ressources/upload/media/p18btrombones.jpg?1474380393155" alt="" width="647" height="231" />Calcule le nombre total de trombones re&ccedil;us.</p>\r\n<p>&nbsp;</p>', '<p>L''&eacute;cole du far&eacute; a re&ccedil;u 25 bo&icirc;tes de trombones. Voici le nombre qu''il y a dans chaque bo&icirc;te.</p>', 0, '', 3, 3, 3, NULL, 0, 0, 0, 0),
(15, 1, '<p>5001</p>\r\n<p>5010</p>\r\n<p>4999</p>\r\n<p>6001</p>', '<p>Coche le nombre plus petit que le nombre soulign&eacute; :</p>\r\n<p><strong><span style="text-decoration: underline;">5000</span></strong></p>', 0, '', 3, 3, 3, 0, 0, 0, 0, 0),
(16, 1, '<p>1798&lt;2110</p>\r\n<p>Vrai</p>\r\n<p>Faux</p>', '<p>Coche VRAI ou FAUX</p>', 0, '', 3, 3, 3, 0, 0, 0, 0, 0),
(17, 1, '<p>Range les nombres du plus petit au plus grand :</p>\r\n<p><strong>67 - 267 - 627 - 27 - 672&nbsp;</strong></p>\r\n<p><strong>Coche la bonne suite :</strong></p>\r\n<p><strong>672 - 627 - 267 -67 - 27&nbsp;</strong></p>\r\n<p><strong>672 - 627 - 67 - 267 - 27</strong></p>\r\n<p><strong>27 - 67 - 267 - 627 - 672&nbsp;</strong></p>\r\n<p><strong>27 - 267 - 67 - 627 - 672&nbsp;</strong></p>\r\n<p>&nbsp;</p>', '<p>Range les nombres</p>', 0, '', 3, 3, 3, 0, 0, 0, 0, 0),
(18, 1, '<p>Coche le nombre dict&eacute; &nbsp; &nbsp; &nbsp; &nbsp;<strong>4623</strong></p>\r\n<p>&nbsp;</p>\r\n<p><strong>quarante-six cent vingt-trois</strong></p>\r\n<p><strong>quatre mille six cent vingt-trois</strong></p>\r\n<p><strong>quatre cent vingt-trois</strong></p>\r\n<p><strong>huit cent soixante et onze</strong></p>', '<p>Coche le nombre dict&eacute; &nbsp; &nbsp; &nbsp;</p>', 0, '', 3, 3, 4, 0, 0, 0, 0, 0),
(19, 3, '<p>Relie</p>', '<p>relie</p>', 0, '', 3, 3, 4, NULL, 0, 0, 0, 0),
(22, 2, '<p>Ecris les nombres dict&eacute;s en chiffres</p>\r\n<p>A :</p>\r\n<p>B :</p>\r\n<p>C :</p>\r\n<p>D :</p>\r\n<p>E :</p>', '<p>Ecris&nbsp;</p>', 0, '', 3, 3, 4, 0, 0, 0, 0, 0),
(24, 1, '<p>Coche la suite o&ugrave; les nombres ne sont pas rang&eacute;s de 50 en 50</p>', '<p>Coche</p>', 0, '', 3, 3, 4, 0, 0, 0, 0, 0),
(25, 2, '<p>Ecris le nombre entier qui correspond &agrave; chaque fl&egrave;che</p>\r\n<p><img src="../../../ressources/upload/media/p21ecris.jpg?1474601053257" alt="" width="650" height="157" /></p>', '<p>ECRIS</p>', 0, '', 3, 3, 4, 0, 0, 0, 0, 0),
(26, 4, '<p>Compl&egrave;te les cases avec les nombres qui conviennent :</p>\r\n<p>50 - 130 - 80 - 200 - 160</p>\r\n<p><img src="../../../ressources/upload/media/p21complete.jpg?1474601303499" alt="" width="663" height="136" /></p>', '<p>Compl&egrave;te</p>', 0, '', 3, 3, 4, NULL, 0, 0, 0, 0),
(27, 7, '<p>Compl&egrave;te la suite de nombres</p>', '<p>Compl&egrave;te</p>', 1, '<p>&nbsp;</p>\r\n<table style="width: 658px; height: 69px;">\r\n<tbody>\r\n<tr style="height: 13px;">\r\n<td style="width: 84px; height: 13px; text-align: center;">\r\n<h2>6 307</h2>\r\n</td>\r\n<td style="width: 84px; height: 13px; text-align: center;">\r\n<h2>&nbsp;6 417</h2>\r\n</td>\r\n<td style="width: 84px; height: 13px; text-align: center;">\r\n<h2>6 527</h2>\r\n</td>\r\n<td style="width: 70px; height: 13px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 70px; height: 13px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 70px; height: 13px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 71px; height: 13px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 73px; height: 13px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', 3, 3, 4, 0, 0, 0, 0, 0),
(28, 4, '<p>Compl&egrave;te les &eacute;galit&eacute;s :</p>\r\n<p>A : 5 milliers, 2 centaines, 8 dizaines et 3 unit&eacute;s =</p>\r\n<p>B : 6 centaines, 5 dizaines et 9 unit&eacute;s =</p>\r\n<p>C : 430 = ........ centaines et ......... dizaines</p>\r\n<p>D : 2 centaines et 5 dizaines =</p>\r\n<p>E : 100 + 100 + 100 +10 + 10 + 10 + 8 =</p>\r\n<p>F : 200 + 200 + 100 + 10 + 10 =&nbsp;</p>', '<p>Compl&egrave;te</p>', 0, '', 3, 3, 4, NULL, 0, 0, 0, 0),
(29, 6, '<p>Les &eacute;l&egrave;ves jouent aux billes. Ce matin, ils ont d&eacute;cid&eacute; de les mettre ensemble et en ont compt&eacute; 76.</p>\r\n<p>A la fin de la r&eacute;cr&eacute;ation, apr&egrave;s avoir jou&eacute;, ils en comptent 124.</p>\r\n<p>Combien de billes ont-ils gagn&eacute; pendant la r&eacute;cr&eacute;ation ?</p>\r\n<p><img src="../../../ressources/upload/media/billes.jpg?1474607635677" alt="" width="117" height="101" /></p>', '<p>R&eacute;soudre un probl&egrave;me</p>', 0, '', 3, 3, 5, NULL, 0, 0, 0, 0),
(30, 6, '<p>Dans le porte-monnaie de Rastami, il y a 20 pi&egrave;ces de 10 centimes.</p>\r\n<p>Dans le porte-monnaie d''Actoibi, il y a 5 pi&egrave;ces de 50 centimes.</p>\r\n<p>Qui a le plus d''argent?</p>\r\n<p>Indique la somme qu''il poss&egrave;de</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;.<img src="../../../ressources/upload/media/pices.jpg?1474607880957" alt="" width="206" height="86" /></p>', '<p>R&eacute;soudre des probl&egrave;mes</p>', 0, '', 3, 3, 5, NULL, 0, 0, 0, 0),
(31, 6, '<p>Un jeu de dames est compos&eacute; de 40 pions. Jawad a m&eacute;lang&eacute; cinq jeux.</p>\r\n<p>Combien de pions a-t-il ?</p>\r\n<p><img src="../../../ressources/upload/media/jeu%20dame.jpg?1474608156302" alt="" width="269" height="187" /></p>', '<p>R&eacute;soudre des probl&egrave;mes</p>', 0, '', 3, 3, 5, NULL, 0, 0, 0, 0),
(32, 6, '<p>Dans une usine, Latifa fabrique des savons. Elle range 64 savons dans des bo&icirc;tes qui peuvent contenir 8 savons chacune.</p>\r\n<p>Combien de bo&icirc;tes va-t-elle remplir ?</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img src="../../../ressources/upload/media/savon_1.jpg?1474608476117" alt="" width="176" height="187" /></p>', '<p>R&eacute;soudre des probl&egrave;mes</p>', 0, '', 3, 3, 5, 0, 0, 0, 0, 0),
(34, 4, '<p>Ecris les r&eacute;sultats des multiplications dict&eacute;es :&nbsp;</p>\r\n<p>A :&nbsp;</p>\r\n<p>B :</p>\r\n<p>C :</p>\r\n<p>D :</p>\r\n<p>E :</p>\r\n<p>F :</p>\r\n<p>&nbsp;</p>', '<p>Ecris</p>', 0, '', 3, 3, 6, NULL, 0, 0, 0, 0),
(35, 5, '<p>4 703 + 938 =</p>', '<p>Pose et effectue</p>', 0, '', 1, 3, 6, 0, 0, 0, 0, 0),
(36, 5, '<p>7 367 - 4 256 =</p>', '<p>Pose et effectue</p>', 0, '', 3, 3, 6, 0, 0, 0, 0, 0),
(37, 5, '<p>9 803 - 7 622 =</p>', '<p>Pose et effectue</p>', 0, '', 3, 3, 6, 0, 0, 0, 0, 0),
(38, 5, '<p>64 x 23</p>', '<p>Pose et effectue</p>', 0, '', 3, 3, 6, 0, 0, 0, 0, 0),
(39, 1, '<p>Coche le bon r&eacute;sultat &nbsp;&nbsp;<strong>90 : 3</strong></p>\r\n<p>&nbsp;</p>', '<p>Coche</p>', 0, '', 3, 3, 6, 0, 0, 0, 0, 0),
(40, 1, '<p>Coche le bon r&eacute;sultat</p>\r\n<p><strong>28 : 4</strong></p>', '<p>coche</p>', 0, '', 4, 3, 6, 0, 0, 0, 0, 0),
(41, 1, '<p>Coche le bon r&eacute;sultat</p>\r\n<p><strong>28 : 4</strong></p>', '<p>coche</p>', 0, '', 4, 3, 6, 0, 0, 0, 0, 0),
(43, 1, '<p>Coche le bon r&eacute;sultat</p>\r\n<p><strong>28 : 4</strong></p>', '<p>coche la case correcte</p>', 0, '', 1, 2, 9, 1, 0, 0, 0, 0),
(44, 9, '<p>Les enfants du parlement prennent la parole bruyamment.</p>', '<p>Surligne les mots compliqu&eacute;s</p>', 1, 'Parlement', 2, 2, 8, 0, 0, 0, 0, 0),
(45, 1, '<p>Coche le bon r&eacute;sultat</p>\r\n<p><strong>28 : 4</strong></p>', '<p>coche la case correcte</p>', 0, '', 1, 2, 9, 1, 0, 0, 0, 0),
(46, 1, '<p>Coche le bon r&eacute;sultat</p>\r\n<p><strong>28 : 4</strong></p>', '<p>coche la case correcte</p>', 0, '', 1, 2, 9, 1, 0, 0, 0, 0),
(47, 4, '<p>Compl&egrave;te les cases avec les nombres qui conviennent :</p>\r\n<p>50 - 130 - 80 - 200 - 160</p>\r\n<p><img src="../../../ressources/upload/media/p21complete.jpg?1474601303499" alt="" width="663" height="136" /></p>', '<p>Compl&egrave;te</p>', 0, '', 3, 3, 4, NULL, 0, 0, 0, 0),
(48, 4, '<p>Compl&egrave;te les cases avec les nombres qui conviennent :</p>\r\n<p>50 - 130 - 80 - 200 - 160</p>\r\n<p><img src="../../../ressources/upload/media/p21complete.jpg?1474601303499" alt="" width="663" height="136" /></p>', '<p>Compl&egrave;te</p>', 0, '', 3, 3, 4, NULL, 0, 0, 0, 0),
(49, 4, '<p>Compl&egrave;te les cases avec les nombres qui conviennent :</p>\r\n<p>50 - 130 - 80 - 200 - 160</p>\r\n<p><img src="../../../ressources/upload/media/p21complete.jpg?1474601303499" alt="" width="663" height="136" /></p>', '<p>Compl&egrave;te</p>', 0, '', 3, 3, 4, NULL, 0, 0, 0, 0),
(50, 1, '<p>Coche le bon r&eacute;sultat <strong>60:5</strong></p>', '<p>Coche</p>', 0, '', 3, 3, 6, 0, 0, 0, 0, 0),
(51, 1, '<p>Coche le bon r&eacute;sultat <strong>28:4</strong></p>', '<p>Coche</p>', 0, '', 3, 3, 6, 0, 0, 0, 0, 0),
(52, 7, '<p>Ecris les mots dict&eacute;s</p>', '<p>Je suis capable d''&eacute;crire les mots dict&eacute;s</p>', 1, '<table style="height: 182px;" width="652">\r\n<tbody>\r\n<tr style="height: 37px;">\r\n<td style="width: 121px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 121px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 123px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 124px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 129px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 37px;">\r\n<td style="width: 121px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 121px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 123px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 124px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 129px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table style="height: 182px;" width="652">\r\n<tbody>\r\n<tr style="height: 37px;">\r\n<td style="width: 121px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 121px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 123px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 124px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 129px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 37px;">\r\n<td style="width: 121px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 121px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 123px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 124px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 129px; height: 37px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', 3, 2, 9, 0, 0, 0, 0, 0),
(53, 1, '<p>Coche le mot correctement orthographi&eacute;</p>', '<p>Je suis capable de retrouver la bonne orthographe d''un mot</p>', 0, '', 3, 2, 1, 0, 0, 0, 0, 0),
(54, 1, '<p>Coche le mot correctement orthographi&eacute;</p>', '<p>Je suis capable de retrouver la bonne orthographe d''un mot</p>', 0, '', 3, 2, 9, 0, 0, 0, 0, 0),
(55, 1, '<p>Coche le mot correctement orthographi&eacute;</p>', '<p>Je suis capable de retrouver la bonne orthographe d''un mot</p>', 0, '', 3, 2, 9, 0, 0, 0, 0, 0),
(56, 1, '<p>Coche le mot correctement orthographi&eacute;</p>', '<p>Je suis capable de retrouver la bonne orthographe d''un mot</p>', 0, '', 3, 2, 9, 0, 0, 0, 0, 0),
(57, 7, '<p>Entoure les mots qui font le m&ecirc;me son : les homonymes</p>', '<p>Je suis capable de reconna&icirc;tre des homonymes</p>', 1, '<table style="height: 218px; width: 649px;">\r\n<tbody>\r\n<tr>\r\n<th style="width: 125px;">\r\n<h3>pois</h3>\r\n</th>\r\n<th style="width: 120px;">\r\n<h3>peau</h3>\r\n</th>\r\n<th style="width: 112px;">\r\n<h3>point</h3>\r\n</th>\r\n<th style="width: 138px;">\r\n<h3>poids</h3>\r\n</th>\r\n<th style="width: 134px;">\r\n<h3>pont</h3>\r\n</th>\r\n</tr>\r\n<tr>\r\n<td style="width: 125px; text-align: center;">\r\n<h3><strong>maire</strong></h3>\r\n</td>\r\n<td style="width: 120px; text-align: center;">\r\n<h3><strong>&nbsp;mer</strong></h3>\r\n</td>\r\n<td style="width: 112px; text-align: center;">\r\n<h3><strong>mare</strong></h3>\r\n</td>\r\n<td style="width: 138px; text-align: center;">\r\n<h3><strong>mire</strong></h3>\r\n</td>\r\n<td style="width: 134px; text-align: center;">\r\n<h3><strong>m&egrave;re</strong></h3>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style="width: 125px; text-align: center;">\r\n<h3><strong>pire</strong></h3>\r\n</td>\r\n<td style="width: 120px; text-align: center;">\r\n<h3><strong>paire</strong></h3>\r\n</td>\r\n<td style="width: 112px; text-align: center;">\r\n<h3><strong>par</strong></h3>\r\n</td>\r\n<td style="width: 138px; text-align: center;">\r\n<h3><strong>p&egrave;re</strong></h3>\r\n</td>\r\n<td style="width: 134px; text-align: center;">\r\n<h3><strong>perd</strong></h3>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style="width: 125px; text-align: center;">\r\n<h3><strong>verre</strong></h3>\r\n</td>\r\n<td style="width: 120px; text-align: center;">\r\n<h3><strong>vent</strong></h3>\r\n</td>\r\n<td style="width: 112px; text-align: center;">\r\n<h3><strong>ver</strong></h3>\r\n</td>\r\n<td style="width: 138px; text-align: center;">\r\n<h3><strong>vert</strong></h3>\r\n</td>\r\n<td style="width: 134px; text-align: center;">\r\n<h3><strong>vers</strong></h3>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 3, 2, 9, NULL, 0, 0, 0, 0),
(58, 5, '<p>Ecris les phrases dict&eacute;es</p>', '<p>Ma&icirc;triser la forme des mots en lien avec la syntaxe.</p>', 0, '', 3, 2, 9, 0, 0, 0, 0, 0),
(59, 5, '<p>Ecris les phrases dict&eacute;es</p>', '<p>Ma&icirc;triser la forme des mots en lien avec la syntaxe.</p>', 0, '', 3, 2, 9, 0, 0, 0, 0, 0),
(60, 5, '<p>Ecris les phrases dict&eacute;es</p>', '<p>Ma&icirc;triser la forme des mots en lien avec la syntaxe.</p>', 0, '', 3, 2, 9, 0, 0, 0, 0, 0),
(61, 1, '<p>Coche la bonne r&eacute;ponse</p>\r\n<p>Il ----------------- (dessiner) un bonhomme</p>', '<p>Je suis capable de respecter l&rsquo;accord entre le sujet et le verbe.</p>', 0, '', 3, 2, 10, 0, 0, 0, 0, 0),
(62, 1, '<p>Coche la bonne r&eacute;ponse</p>\r\n<p>Les poissons ------------------- (nager) dans le lagon.</p>', '<p>Je suis capable de respecter l&rsquo;accord entre le sujet et le verbe.</p>', 0, '', 3, 2, 10, 0, 0, 0, 0, 0),
(63, 5, '<p><em>Je remplace le <strong>pronom personnel</strong> par un nom ou un groupe nominal.</em></p>\r\n<h3><strong>Il lave sa voiture</strong></h3>', '<p>Remplace</p>', 0, '', 3, 2, 10, 0, 0, 0, 0, 0),
(64, 5, '<p><em>Je remplace le <strong>pronom personnel</strong> par un nom ou un groupe nominal.</em></p>\r\n<h3><strong>Elles jouent &agrave; la poup&eacute;e.</strong></h3>', '<p>Remplace</p>', 0, '', 3, 2, 10, 0, 0, 0, 0, 0),
(65, 5, '<p><em>Je remplace le <strong>pronom personnel</strong> par un nom ou un groupe nominal.</em></p>\r\n<h3><strong>Ils sont dans la mer .</strong></h3>', '<p>Remplace</p>', 0, '', 3, 2, 10, 0, 0, 0, 0, 0),
(66, 5, '<p><em>Je remplace le <strong>pronom personnel</strong> par un nom ou un groupe nominal.</em></p>\r\n<h3><strong>Elle est tomb&eacute;e en panne.</strong></h3>', '<p>Remplace</p>', 0, '', 3, 2, 10, 0, 0, 0, 0, 0),
(67, 5, '<p>Ecris les phrases dict&eacute;es.</p>', '<p>Ecris</p>', 0, '', 3, 2, 10, 0, 0, 0, 0, 0),
(70, 1, '<p>Coche lafin de phrase correctement orthographi&eacute;e.</p>\r\n<h3><strong>Ce monstre a une .......</strong></h3>', '<p>Je suis capable de respecter l''accord au sein du Groupe Nominal.</p>', 0, '', 4, 2, 10, 0, 0, 0, 0, 0),
(71, 7, '<p><em>Je compl&egrave;te la phrase avec le bon mot.</em></p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td style="text-align: center;" width="201">\r\n<h3>vers</h3>\r\n</td>\r\n<td style="text-align: center;" width="201">\r\n<h3>verre</h3>\r\n</td>\r\n<td style="text-align: center;" width="201">\r\n<h3>vert</h3>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', '<p>Je suis capable d&rsquo;utiliser des homonymes en fonction du sens de la phrase.</p>', 1, '<table style="height: 153px;" width="659">\r\n<tbody>\r\n<tr>\r\n<th style="width: 212px;">\r\n<h3>Le bananier est &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;.</h3>\r\n</th>\r\n</tr>\r\n<tr>\r\n<th style="width: 212px;">\r\n<h3>Je bois dans un&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;.</h3>\r\n</th>\r\n</tr>\r\n<tr>\r\n<td style="width: 212px;">\r\n<h3 style="text-align: center;">&nbsp;Ali vient &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;toi.</h3>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 4, 2, 10, NULL, 0, 0, 0, 0),
(72, 7, '<p><em>Je compl&egrave;te la phrase avec le bon mot.</em></p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td style="text-align: center;" width="201">\r\n<h3>m&egrave;re</h3>\r\n</td>\r\n<td style="text-align: center;" width="201">\r\n<h3>maire</h3>\r\n</td>\r\n<td style="text-align: center;" width="201">\r\n<h3>mer</h3>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', '<p>Je suis capable d&rsquo;utiliser des homonymes en fonction du sens de la phrase.</p>', 1, '<table style="height: 153px;" width="659">\r\n<tbody>\r\n<tr>\r\n<th style="width: 212px;">\r\n<h3>Le &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; est le chef du village.</h3>\r\n</th>\r\n</tr>\r\n<tr>\r\n<th style="width: 212px;">\r\n<h3>Ma &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; est belle &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; .</h3>\r\n</th>\r\n</tr>\r\n<tr>\r\n<td style="width: 212px;">\r\n<h3 style="text-align: center;">La mer&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;est bleue.</h3>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 4, 2, 10, 0, 0, 0, 0, 0),
(73, 3, '<p>J''associe le sujet au verbe qui lui correspond</p>', '<p>Je suis capable d''accorder le verbe avec son sujet.</p>', 0, '', 4, 2, 10, NULL, 0, 0, 0, 0),
(74, 1, '<p>J''accorde l''adjectif qualificatif attribut avec le sujet.</p>\r\n<h3><strong>Les b&eacute;b&eacute;s tortues sont</strong> ________________</h3>', '<p>Je suis capable d''accorder l''attribut du sujet.</p>', 0, '', 4, 2, 10, 0, 0, 0, 0, 0),
(75, 1, '<p>Coche le verbe qui correspond.</p>\r\n<p><strong>Mon p&egrave;re ___________ .</strong></p>', '<p>Je suis capable d''accorder le verbe avec son sujet.</p>', 0, '', 4, 2, 10, 0, 0, 0, 0, 0),
(76, 1, '<p>Coche le sujet qui correspond.</p>\r\n<p><strong>________________________ roule.</strong></p>', '<p>Je suis capable d&rsquo;accorder le verbe avec un sujet.</p>', 0, '', 4, 2, 10, 0, 0, 0, 0, 0),
(78, 3, '<p>Trouve le ou les sujets que tu peux accorder aux verbes propos&eacute;s.</p>', '<p>Je suis capable d&rsquo;accorder le verbe avec un sujet.</p>', 0, '', 4, 2, 10, NULL, 0, 0, 0, 0),
(79, 2, '<p>Choisis les verbes qui peuvent correspondre au sujet propos&eacute;.</p>\r\n<p><strong>Le chat _______________ .</strong></p>', '<p>Je suis capable d&rsquo;accorder le verbe avec un sujet.</p>', 0, '', 4, 2, 10, 0, 0, 0, 0, 0),
(80, 2, '<p>Choisis les verbes qui peuvent correspondre au sujet propos&eacute;.</p>\r\n<p><strong>Les chats _______________ .</strong></p>', '<p>Je suis capable d&rsquo;accorder le verbe avec un sujet.</p>', 0, '', 4, 2, 10, 0, 0, 0, 0, 0),
(81, 5, '<p><span style="text-decoration: underline;"><em><strong>Transforme ce texte</strong></em></span> :</p>\r\n<p>Le <strong>kangourou </strong>est un grand animal poilu qui peut sauter tr&egrave;s haut.</p>\r\n<p>Il habite en Australie.</p>\r\n<p>Le jeune <strong>kangourou </strong>se repose et t&egrave;te jusqu&rsquo;&agrave; six mois.</p>\r\n<p>&nbsp;</p>\r\n<p>Les kangourous......</p>', '<p>Je suis capable de g&eacute;rer les accords en genre et en nombre.</p>', 0, '', 5, 2, 10, 0, 0, 0, 0, 0),
(82, 7, '<p>J''&eacute;cris la bonne proposition.</p>', '<p>Je suis capable d&rsquo;accorder l&rsquo;adjectif qualificatif attribut du sujet.</p>\r\n<p>&nbsp;</p>', 1, '<table style="height: 219px; width: 655px;">\r\n<tbody>\r\n<tr>\r\n<th style="width: 249px; text-align: left;">Les oiseaux sont (multicolore - multicolores).</th>\r\n<th style="width: 174px;">&nbsp;</th>\r\n</tr>\r\n<tr>\r\n<td style="width: 249px; text-align: left;"><strong>Ma poup&eacute;e est (vieille - vieux - vieilles).</strong></td>\r\n<td style="width: 174px;">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style="width: 249px; text-align: left;"><strong>Notre ma&icirc;tresse est (gentilles - gentil- gentille- gentils).</strong></td>\r\n<td style="width: 174px;">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style="width: 249px; text-align: left;"><strong>Cette boisson est (bon - bonnes - bons - bonne).</strong></td>\r\n<td style="width: 174px;">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', 5, 2, 10, NULL, 0, 0, 0, 0),
(83, 4, '<p>J''&eacute;cris le verbe de la phrase.</p>\r\n<p>1 : Elle est une fille.</p>\r\n<p>2 : Les grands cocotiers plient sous le vent.</p>\r\n<p>3 : O&ugrave; habites-tu ?</p>\r\n<p>4 : Ce gar&ccedil;on chante bien.</p>\r\n<p>5: Hedja a des billes.</p>\r\n<p>6 : Qui parle ?</p>', '<p>Je suis capable de rep&eacute;rer un verbe.</p>\r\n<p>&nbsp;</p>', 0, '', 5, 2, 10, NULL, 0, 0, 0, 0),
(84, 3, '<p>Je relie l''infinitif &agrave; ses formes conjugu&eacute;es.</p>', '<p>Je suis capable d&rsquo;associer un infinitif &agrave; une forme conjugu&eacute;e.</p>', 0, '', 5, 2, 10, NULL, 0, 0, 0, 0),
(85, 9, '<p><em>surligne&nbsp;tous les &eacute;l&eacute;ments non &ndash; essentiels sans changer le sens g&eacute;n&eacute;ral de la phrase.</em></p>', '<p>Je suis capable de r&eacute;duire une phrase.</p>', 1, 'Réduire une phrase', 5, 2, 10, NULL, 0, 0, 0, 0),
(88, 7, '<p>Ajoute les &eacute;l&eacute;ments demand&eacute;s pour amplifier la phrase.</p>', '<p>Je suis capable d&rsquo;amplifier une phrase.</p>', 1, '<table style="height: 261px;" width="660">\r\n<tbody>\r\n<tr>\r\n<th style="width: 213px; text-align: left;">\r\n<p><em>Ajoute un compl&eacute;ment du verbe (COD)</em></p>\r\n<p>Je mange.</p>\r\n</th>\r\n<th style="width: 213px; text-align: left;">&nbsp;</th>\r\n</tr>\r\n<tr>\r\n<td style="width: 213px;">\r\n<p><em><strong>Ajoute un compl&eacute;ment de phrase (complement circonstanciel de lieu)</strong></em></p>\r\n<p><strong>Les poissons nagent.</strong></p>\r\n</td>\r\n<td style="width: 213px;">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style="width: 213px;">\r\n<p><em><strong>Ajoute deux adjectifs qualificatifs :</strong></em></p>\r\n<p><strong>Le gar&ccedil;on joue avec une voiture.</strong></p>\r\n</td>\r\n<td style="width: 213px;">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style="width: 213px;">\r\n<p><em><strong>Ajoute un compl&eacute;ment du nom :</strong></em></p>\r\n<p><strong>La tour Eiffel est un monument.</strong></p>\r\n</td>\r\n<td style="width: 213px;">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style="width: 213px;">\r\n<p><em><strong>Ajoute une proposition relative :</strong></em></p>\r\n<p><strong>Le chat miaule.</strong></p>\r\n</td>\r\n<td style="width: 213px;">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', 5, 2, 10, NULL, 0, 0, 0, 0),
(89, 5, '<p><em>Construit deux phrases selon la structure demand&eacute;e.</em></p>\r\n<p><strong>1) Compl&eacute;ment de phrase (C.C.) + Sujet + Verbe + &nbsp;Compl&eacute;ment du Verbe (COD ou COI)</strong></p>\r\n<p><strong>2) Sujet (P.P) + Verbe(1er groupe-futur) + Compl&eacute;ment de phrase (GN masculin- pluriel ou NP)</strong></p>\r\n<p>&nbsp;</p>', '<p>Je suis capable d&rsquo;identifier les constituants d&rsquo;une phrase simple.</p>', 0, '', 5, 2, 10, 0, 0, 0, 0, 0),
(90, 5, '<p><em>J&rsquo;observe l&rsquo;image et je dicte ma phrase &agrave; mon ma&icirc;tre ou ma ma&icirc;tress</em></p>\r\n<p style="text-align: center;"><em>e.</em><img src="../../../ressources/upload/media/p43histoire.jpg?1474802459941" alt="" width="159" height="288" /></p>', '<p>Je suis capable de produire une phrase pour l&eacute;gender une image. L&rsquo;enseignant l&rsquo;&eacute;crira pour moi.</p>', 0, '', 1, 2, 8, 0, 0, 0, 0, 0),
(91, 5, '<p><em>J&rsquo;utilise des mots pour &eacute;crire les phrases de mon histoire.</em></p>\r\n<p><em><img src="../../../ressources/upload/media/p45histoire.jpg?1474802666545" alt="" width="550" height="133" /></em></p>\r\n<p><em><img src="../../../ressources/upload/media/p45tableauaide.jpg?1474802817660" alt="" width="635" height="328" /></em></p>', '<p>Je suis capable de produire des phrases pour raconter une histoire.</p>', 0, '', 2, 2, 8, 0, 0, 0, 0, 0),
(92, 5, '<p><em>Lis bien la lettre puis r&eacute;dige la r&eacute;ponse d&rsquo;Amar. N&rsquo;oublie pas de faire des phrases (mets des majuscules et des points o&ugrave; il faut), de v&eacute;rifier l&rsquo;orthographe, de soigner ton &eacute;criture et la pr&eacute;sentation.</em></p>\r\n<p><em><img src="../../../ressources/upload/media/p46lettre.jpg?1474802934806" alt="" width="643" height="278" /></em></p>', '<p>Je suis capable de r&eacute;diger un texte court, ponctu&eacute;.</p>', 0, '', 3, 2, 8, 0, 0, 0, 0, 0),
(93, 5, '<p><em>Imagine la r&eacute;ponse que pourrait faire un des deux parents de F&eacute;licien. </em></p>\r\n<p><em><img src="../../../ressources/upload/media/p47lemartien.jpg?1474803120959" alt="" width="637" height="305" /></em></p>', '<p>Je suis capable de produire un texte (pour le niveau 4, la lecture pourra &ecirc;tre propos&eacute;e aux &eacute;l&egrave;ves lors d&rsquo;un temps pr&eacute;c&eacute;dent avec un travail sp&eacute;cifique de compr&eacute;hension).</p>', 0, '', 4, 2, 8, 0, 0, 0, 0, 0),
(94, 5, '<p><em>Imagine la r&eacute;ponse que pourrait faire un des deux parents de F&eacute;licien. </em></p>\r\n<p style="text-align: center;">UN MARTIEN</p>\r\n<p style="text-align: right;">&nbsp;Plan&egrave;te Mars. Neuf heures du soir.</p>\r\n<p style="text-align: center;">&nbsp;Cher papa, ch&egrave;re maman</p>\r\n<p>&nbsp;</p>\r\n<p>Eh oui. Me voici sur la plan&egrave;te Mars. J''esp&egrave;re que vous vous &ecirc;tes bien inqui&eacute;t&eacute;s depuis ce matin et que vous m''avez cherch&eacute; partout. D''ailleurs, je vous ai observ&eacute;s gr&acirc;ce &agrave; mes satellites espions et J''ai bien vu que vous faisiez une dr&ocirc;le de t&ecirc;te cet apr&egrave;s-midi.</p>\r\n<p>M&ecirc;me que papa a dit : "Ce n''est pas possible, il a d&ucirc; lui&nbsp;arriver quelque chose!" (Comme vous le voyez, mes micros longue distance sont ultra puissants). Eh bien. J&rsquo;ai un peu honte de le dire. Mais je le dis quand m&ecirc;me, parce que c''est la v&eacute;rit&eacute; : je suis rudement content que vous vous fassiez du souci. C''est de votre faute, apr&egrave;s tout. Si vous ne m''aviez pas interdit d''aller au cin&eacute;ma avec Fran&ccedil;ois, je ne serais pas parti. J''en ai marre d''&ecirc;tre trait&eacute; comme un gamin. D''accord, je n''aurais pas d&ucirc; vous traiter de vieux sadiques. Mais maman m''a bien trait&eacute; de gros mollasson, alors on est quitte.</p>\r\n<p>Ne me demandez pas comment je suis arriv&eacute; ici. C&rsquo;est un secret et j''ai jur&eacute; de ne pas te dire. En tout cas. Je me plais bien sur Mars. Les gens ne sont peut-&ecirc;tre pas tr&egrave;s agr&eacute;ables &agrave; regarder, mais ils sont super sympas. Personne ne fait de r&eacute;flexion quand vous avez le malheur d''avoir un 9 en g&eacute;ographie. Vous voyez &agrave; qui je fais allusion...</p>\r\n<p>Il y a quand m&ecirc;me des choses un peu bizarres. Je ne parle pas des scarab&eacute;es que les Martiens grignotent &agrave; l''ap&eacute;ritif. Sur Terre aussi, il y a des trucs impossibles &agrave; manger. Les choux de Bruxelles, par exemple ou le gras de jambon. Non, le plus tordu, c''est la fa&ccedil;on dont on fait les b&eacute;b&eacute;s. Il suffit qu''un gar&ccedil;on ou une fille se regardent dans les yeux, et hop ils deviennent papa-maman. J''ai d&eacute;j&agrave; une demi-douzaine d''enfants.</p>\r\n<p>Je crois que je vais mettre des lunettes de soleil. C''est plus prudent. J''ai encore des tas de choses &agrave; vous raconter, mais je pr&eacute;f&egrave;re m''arr&ecirc;ter l&agrave;. Portez-vous bien et &agrave; bient&ocirc;t, j''esp&egrave;re.</p>\r\n<p>&nbsp;</p>\r\n<p>PS : Vous seriez gentils de m''envoyer deux sandwiches au saucisson, un yaourt &agrave; la fraise et une bouteille de jus de raisin. Et dites-moi si vous &ecirc;tes encore f&acirc;ch&eacute;s.</p>\r\n<p>PPS : Vous n''avez qu''&agrave; laisser le colis et la lettre devant la porte du grenier. Ne vous inqui&eacute;tez pas, &ccedil;a arrivera.</p>\r\n<p>&nbsp;</p>\r\n<p style="text-align: center;">F&eacute;licien</p>\r\n<p>&nbsp;</p>', '<p>Je suis capable de produire un texte.</p>', 0, '', 5, 2, 8, 0, 0, 0, 0, 0),
(95, 1, '<p>Labon est une souris.</p>', '<p>Passation individuelle</p>', 0, '', 1, 2, 1, 4, 0, 0, 0, 0),
(96, 4, '<p>C''est un .............................</p>', '<p>Passation individuelle</p>', 0, '', 1, 2, 1, NULL, 0, 0, 0, 0),
(97, 1, '<p>Pourquoi M. Labon veut-il se d&eacute;barrasser des souris ?</p>\r\n<p>&nbsp;</p>', '<p>Passation individuelle</p>', 0, '', 1, 2, 1, 4, 0, 0, 0, 0),
(98, 1, '<p>O&ugrave; M.Labon pose-t-il des sourici&egrave;res ?</p>', '<p>Passation individuelle</p>', 0, '', 1, 2, 1, 4, 0, 0, 0, 0),
(99, 1, '<p>Quand les souris sortent de leur trou, pourquoi pointent-elles leurs pattes avant vers le plafond ?</p>', '<p>Passation individuelle</p>', 0, '', 1, 2, 1, 4, 0, 0, 0, 0),
(100, 5, '<p>Pourquoi M.Labon sourit-il en voyant les sourici&egrave;res vides ?</p>', '<p>Passation individuelle</p>', 0, '', 1, 2, 1, 4, 0, 0, 0, 0),
(101, 1, '<p>Qui est Labon ?</p>', '<p>Passation guid&eacute;e</p>', 0, '', 2, 2, 1, 4, 0, 0, 0, 0),
(102, 1, '<p>Pourquoi M.Labon veut-il se d&eacute;barrasser des souris ?</p>', '<p>Passation guid&eacute;e</p>', 0, '', 2, 2, 1, 4, 0, 0, 0, 0),
(103, 1, '<p>O&ugrave; M.Labon pose-t-il les sourici&egrave;res ?</p>', '<p>Passation guid&eacute;e</p>', 0, '', 2, 2, 1, 4, 0, 0, 0, 0),
(104, 1, '<p>Quand les souris sortent de leur trou, pourquoi se poussent &ndash; elles du coude et pointent &ndash; elles leurs pattes avant vers le plafond&nbsp;?</p>', '<p>Passation guid&eacute;e</p>', 0, '', 2, 2, 1, 4, 0, 0, 0, 0),
(105, 5, '<p>Pourquoi M.Labon sourit-il en voyant les sourici&egrave;res vides?</p>', '<p>Passation guid&eacute;e</p>', 0, '', 2, 2, 1, 4, 0, 0, 0, 0),
(106, 1, '<p>Que fait M.Labon apr&egrave;s avoir coll&eacute; la chaise au plafond ?</p>', '<p>coche la bonne r&eacute;ponse</p>', 0, '', 3, 2, 1, 5, 5, 1, 1, 3),
(107, 5, '<p>Pourquoi M.Labon sourit-il en voyant les sourici&egrave;res vides?</p>', '<p>Ecris</p>', 0, '', 3, 2, 1, 0, 5, 0, 0, 4),
(108, 1, '<p>Qui est Labon ?</p>', '<p>Coche la bonne r&eacute;ponse</p>', 0, '', 3, 2, 1, 5, 5, 2, 0, 3),
(109, 1, '<p>Pourquoi M.Labon veut-il se d&eacute;barrasser des souris ?</p>', '<p>Coche la bonne r&eacute;ponse</p>', 0, '', 3, 2, 1, 5, 5, 1, 1, 3),
(110, 1, '<p>O&ugrave; M.Labon pose-t-il les sourici&egrave;res ?</p>', '<p>Coche la bonne r&eacute;ponse</p>', 0, '', 3, 2, 1, 5, 5, 2, 0, 3),
(111, 1, '<p>Quand les souris sortent de leur trou, pourquoi se poussent &ndash; elles du coude et pointent &ndash; elles leurs pattes avant vers le plafond&nbsp;?</p>', '<p>Coche la bonne r&eacute;ponse</p>', 0, '', 3, 2, 1, 5, 5, 2, 0, 3),
(113, 1, '<p>Quand les souris pensent qu''elles sont au plafond</p>', '<p>Coche la bonne r&eacute;ponse</p>', 0, '', 3, 2, 1, 5, 5, 2, 0, 3),
(114, 1, '<p>La plus vieille des souris annonce aux autres souris&nbsp;:</p>', '<p>Coche la bonne r&eacute;ponse</p>', 0, '', 3, 2, 1, 5, 5, 2, 0, 3),
(115, 1, '<p>Pourquoi le plancher est - il couvert de souris quand M. Labon est descendu le dernier matin&nbsp;?</p>', '<p>Coche la bonne r&eacute;ponse</p>', 0, '', 3, 2, 1, 5, 5, 2, 0, 3),
(116, 1, '<p>M.Labon ne tue pas les souris</p>', '<p>Coche la bonne r&eacute;ponse</p>', 0, '', 4, 2, 1, 5, 0, 0, 0, 0),
(117, 1, '<p>Que penses-tu de M.Labon ?</p>', '<p>Coche la bonne r&eacute;ponse</p>', 0, '', 4, 2, 1, 0, 0, 0, 0, 0),
(118, 5, '<p>La deuxi&egrave;me nuit, o&ugrave; les souris pensent-elles se trouver&nbsp;?</p>\r\n<p>Que d&eacute;cident-elles de faire&nbsp;?</p>\r\n<p>Qu&rsquo;arrive-t-il aux souris qui sont rest&eacute;es trop longtemps la t&ecirc;te &agrave; l&rsquo;envers&nbsp;?</p>\r\n<p>&nbsp;</p>', '<p>R&eacute;ponds aux questions.</p>', 0, '', 4, 2, 1, 5, 0, 0, 0, 0),
(119, 5, '<p>Pourquoi M. Labon veut-il se d&eacute;barrasser des souris&nbsp;?</p>\r\n<p>O&ugrave; M. Labon pose-t-il les sourici&egrave;res&nbsp;?</p>\r\n<p>Quand les souris sortent de leur trou, pourquoi se poussent-elles du coude et pointent-elles leurs pattes avant vers le plafond&nbsp;?</p>\r\n<p>Rel&egrave;ve la courte phrase qui t&rsquo;informe que M. LABON est en train de tendre un pi&egrave;ge aux souris.</p>\r\n<p>La deuxi&egrave;me nuit, o&ugrave; les souris pensent-elles se trouver&nbsp;?</p>\r\n<p>Que d&eacute;cident-elles de faire&nbsp;?</p>', '<p>R&eacute;ponds aux questions</p>', 0, '', 5, 2, 1, 5, 0, 0, 0, 0),
(120, 1, '<p>Comment l&rsquo;histoire t&rsquo;apprend-elle ce que les souris pensent de la situation&nbsp;?</p>', '<p>Coche la bonne r&eacute;ponse</p>', 0, '', 5, 2, 1, 5, 0, 0, 0, 0),
(121, 1, '<p>Pourquoi le plancher est-il couvert de souris quand M. Labon est descendu le dernier matin&nbsp;?</p>', '<p>Coche la bonne r&eacute;ponse</p>', 0, '', 5, 2, 1, 5, 0, 0, 0, 0),
(122, 1, '<p>Quels adjectifs d&eacute;crivent le mieux l''histoire ?</p>', '<p>Coche la bonne r&eacute;ponse</p>', 0, '', 5, 2, 1, 5, 0, 0, 0, 0),
(123, 5, '<p>Penses-tu que les souris ont &eacute;t&eacute; faciles &agrave; tromper&nbsp;? Oui ou non&nbsp;?</p>\r\n<p>Donne une raison.</p>\r\n<p>Tu apprends quel genre de personne est Labon &agrave; partir de ce qu&rsquo;il fait. Utilise deux adjectifs pour d&eacute;crire quel genre de personne il est. Donne deux exemples qui le montrent.</p>\r\n<p>&nbsp;</p>\r\n<p>Rappelle-toi l&rsquo;histoire de M. Labon et des souris. Explique ce qui rend l&rsquo;histoire incroyable.</p>', '<p>R&eacute;ponds aux questions</p>', 0, '', 5, 2, 1, 5, 0, 0, 0, 0),
(124, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[a]</em></p>\r\n<p><em><img src="../../../ressources/upload/media/p13maki.jpg?1474811454001" alt="" width="87" height="108" /></em></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(125, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute;</em></p>\r\n<p><em>[a]</em></p>\r\n<p><em><img src="../../../ressources/upload/media/p13choco.jpg?1474811558763" alt="" width="123" height="79" /></em></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(126, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute;</em></p>\r\n<p><em>[i]</em></p>\r\n<p><em><img src="../../../ressources/upload/media/p13maki.jpg?1474811638631" alt="" width="87" height="108" /></em></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(127, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[i]</em></p>\r\n<p><em><img src="../../../ressources/upload/media/p13domino.jpg?1474811706040" alt="" width="101" height="66" /></em></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(128, 8, '<p>Coche les cases des syllabes qui contiennent le son indiqu&eacute;</p>\r\n<p>[i]</p>\r\n<p><img src="../../../ressources/upload/media/p13sifflet.jpg?1474811807017" alt="" width="98" height="82" /></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(129, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[u]</em></p>\r\n<p><em><img src="../../../ressources/upload/media/p13tortue.jpg?1474811889041" alt="" width="117" height="70" /></em></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(130, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[u]</em></p>\r\n<p><em><img src="../../../ressources/upload/media/p13lunettes.jpg?1474811957452" alt="" width="88" height="78" /></em></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(131, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[u]</em></p>\r\n<p><em><img src="../../../ressources/upload/media/p13ballumettes.jpg?1474812028326" alt="" width="104" height="88" /></em></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(132, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[o]</em></p>\r\n<p><em><img src="../../../ressources/upload/media/p13rhino.jpg?1474812116108" alt="" width="115" height="95" /></em></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(133, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[o]</em></p>\r\n<p><em><img src="../../../ressources/upload/media/p13bateau.jpg?1474812199934" alt="" width="129" height="87" /></em></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(134, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[o]</em></p>\r\n<p><em><img src="../../../ressources/upload/media/p13choco.jpg?1474812256033" alt="" width="123" height="79" /></em></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(135, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[r]</em></p>\r\n<p><em><img src="../../../ressources/upload/media/p14radeau.jpg?1474812383381" alt="" width="133" height="106" /></em></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(136, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[r]</em></p>\r\n<p><em><img src="../../../ressources/upload/media/p14vanille.jpg?1474812501017" alt="" width="73" height="111" /></em></p>', '<p>Je suis capable de rep&eacute;rer la place d''un phon&egrave;me dans un mot</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(137, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[H]</em></p>\r\n<p><img src="../../../ressources/upload/media/p16chat.jpg?1474813552311" alt="" width="101" height="125" /></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(140, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[l]</em></p>\r\n<p><em><img src="../../../ressources/upload/media/p14ventilateur.jpg?1474813680537" alt="" width="130" height="112" /></em></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(141, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[s]</em></p>\r\n<p><em><img src="../../../ressources/upload/media/p13ananas.jpg?1474813834824" alt="" width="77" height="83" /></em></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(142, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[k]</em></p>\r\n<p><img src="../../../ressources/upload/media/p16escalier.jpg?1474814347608" alt="" width="127" height="105" /></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(143, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[k]</em></p>\r\n<p><img src="../../../ressources/upload/media/p14vanille.jpg?1474814494476" alt="" width="73" height="111" /></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(144, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[B]</em></p>\r\n<p><img src="../../../ressources/upload/media/p15tobogan.jpg?1474814563524" alt="" width="97" height="88" /></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(145, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[g]</em></p>\r\n<p><img src="../../../ressources/upload/media/p15tobogan.jpg?1474814563524" alt="" width="97" height="88" /></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(146, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[d]</em></p>\r\n<p><img src="../../../ressources/upload/media/p13domino.jpg?1474814645548" alt="" width="101" height="66" /></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(147, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[d]</em></p>\r\n<p><img src="../../../ressources/upload/media/p14cadenas.jpg?1474814697076" alt="" width="82" height="92" /></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(148, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[B]</em></p>\r\n<p><img src="../../../ressources/upload/media/p15balancaoire.jpg?1474814752885" alt="" width="114" height="99" /></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(149, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[f]</em></p>\r\n<p><img src="../../../ressources/upload/media/p15confiture.jpg?1474814796175" alt="" width="107" height="122" /></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(150, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[wa]</em></p>\r\n<p><img src="../../../ressources/upload/media/p15balancaoire.jpg?1474814853768" alt="" width="114" height="99" /></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(151, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[wa]</em></p>\r\n<p><img src="../../../ressources/upload/media/p15balancaoire.jpg?1474814853768" alt="" width="114" height="99" /></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(152, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[g]</em></p>\r\n<p><img src="../../../ressources/upload/media/p15tobogan.jpg?1474814933192" alt="" width="97" height="88" /></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(153, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[I]</em></p>\r\n<p><img src="../../../ressources/upload/media/p15confiture.jpg?1474814979304" alt="" width="107" height="122" /></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0);
INSERT INTO `eval_qbank` (`qid`, `question_type`, `question`, `description`, `is_default_txt`, `default_txt`, `lid`, `cid`, `scid`, `pqid`, `no_time_served`, `no_time_corrected`, `no_time_incorrected`, `no_time_unattempted`) VALUES
(154, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[k]</em></p>\r\n<p><img src="../../../ressources/upload/media/p15confiture.jpg?1474814979304" alt="" width="107" height="122" /></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(155, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; </em></p>\r\n<p><em>[k]</em></p>\r\n<p><img src="../../../ressources/upload/media/p14vanille.jpg?1474815046639" alt="" width="73" height="111" /></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot.</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `eval_qbank_parent`
--

CREATE TABLE IF NOT EXISTS `eval_qbank_parent` (
  `pqid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  UNIQUE KEY `pqid` (`pqid`),
  KEY `FK_eval_qbank_parent_catg` (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=6 ;

--
-- Contenu de la table `eval_qbank_parent`
--

INSERT INTO `eval_qbank_parent` (`pqid`, `cid`, `title`, `description`) VALUES
(1, 2, '35 kilos d''espoir de Anna GAVALDA chez Bayard Jeunesse', '<p>Je hais l&rsquo;&eacute;cole. Je la hais plus que tout au monde. Et m&ecirc;me plus que &ccedil;a encore&hellip; Elle me pourrit la vie.</p>\r\n<p>Jusqu&rsquo;&agrave; l&rsquo;&acirc;ge de trois ans, je peux dire que j&rsquo;ai &eacute;t&eacute; heureux. Je ne m&rsquo;en souviens plus vraiment, mais, &agrave; mon avis, &ccedil;a allait. Je jouais, je regardais ma cassette de <em>Petit Ours Brun</em> dix fois de suite, je dessinais et j&rsquo;inventais des milliards d&rsquo;aventures &agrave; Grodoudou, mon chien en peluche que j&rsquo;adorais. Ma m&egrave;re m&rsquo;a racont&eacute; que je restais des heures enti&egrave;res dans ma chambre &agrave; jacasser et &agrave; parler tout seul. J&rsquo;en conclus donc que j&rsquo;&eacute;tais heureux.</p>\r\n<p>A cette &eacute;poque de ma vie, j&rsquo;aimais tout le monde, et je croyais que tout le monde s&rsquo;aimait. Et puis, quand j&rsquo;ai eu trois ans et cinq mois, patatras&nbsp;! L&rsquo;&eacute;cole.</p>\r\n<p>Il para&icirc;t que, le matin, j&rsquo;y suis all&eacute; tr&egrave;s content. Mes parents avaient d&ucirc; me bassiner avec &ccedil;a pendant toutes les vacances&nbsp;: &laquo;&nbsp;Tu as de la chance mon ch&eacute;ri, tu vas aller &agrave; l&rsquo;&eacute;cole&hellip;&nbsp;&raquo; &laquo;&nbsp;Regarde ce beau cartable tout neuf&nbsp;! C&rsquo;est pour aller dans ta belle &eacute;cole&nbsp;!&nbsp;&raquo; Et gnagnagna&hellip; Il para&icirc;t que je n&rsquo;ai pas pleur&eacute;. (Je suis curieux, je pense que j&rsquo;avais envie de voir ce qu&rsquo;ils avaient comme jouets et comme Lego) il para&icirc;t que je suis revenu enchant&eacute; &agrave; l&rsquo;heure du d&eacute;jeuner, que j&rsquo;ai bien mang&eacute; et que je suis retourn&eacute; dans ma chambre raconter ma merveilleuse matin&eacute;e &agrave; Grodoudou.</p>\r\n<p>Eh bien, si j&rsquo;avais su, je les aurais savour&eacute;es, ces derni&egrave;res minutes de bonheur, parce que c&rsquo;est tout de suite apr&egrave;s que ma vie a d&eacute;raill&eacute;.</p>\r\n<ul>\r\n<li>On y retourne, a dit ma m&egrave;re.</li>\r\n<li>O&ugrave; &ccedil;a&nbsp;?</li>\r\n<li>Eh bien&hellip; A l&rsquo;&eacute;cole&nbsp;!</li>\r\n<li></li>\r\n<li>Non quoi&nbsp;?</li>\r\n<li>Je n&rsquo;irai plus.</li>\r\n<li>Ah bon&hellip; Et pourquoi&nbsp;?</li>\r\n<li>Parce que &ccedil;a y est, j&rsquo;ai vu comment c&rsquo;&eacute;tait, et &ccedil;a ne m&rsquo;int&eacute;resse pas. J&rsquo;ai plein de trucs &agrave; faire dans ma chambre. J&rsquo;ai dit &agrave; Grodoudou que j&rsquo;allais lui construire une machine sp&eacute;ciale pour l&rsquo;aider &agrave; retrouver tous les os qu&rsquo;il a enterr&eacute;s sous mon lit, alors je n&rsquo;ai plus le temps d&rsquo;y aller.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Ma m&egrave;re s&rsquo;est agenouill&eacute;e, et j&rsquo;ai secou&eacute; la t&ecirc;te. Elle a insist&eacute;, et je me suis mis &agrave; pleurer. Elle m&rsquo;a soulev&eacute;, et je me suis mis &agrave; hurler. Et elle m&rsquo;a donn&eacute; une claque.</p>\r\n<p>C&rsquo;&eacute;tait la premi&egrave;re de ma vie. Voil&agrave;. C&rsquo;&eacute;tait &ccedil;a, l&rsquo;&eacute;cole. C&rsquo;&eacute;tait le d&eacute;but du cauchemar.</p>'),
(2, 3, 'test', '<p>test</p>'),
(3, 2, 'Réduire une phrase', '<ul>\r\n<li>Les vieux baobabs sont tombés sur la plage.</li>\r\n</ul>\r\n<ul>\r\n<li>Elles jouent calmement avec leurs jolies poupées.</li>\r\n</ul>\r\n<ul>\r\n<li>Sous les lumières de la lune, les poissons qui nagent dans les vagues, semblent argentés.</li>\r\n</ul>\r\n<ul>\r\n<li>L’autre jour, le maître a puni les élèves turbulents.</li>\r\n</ul>'),
(4, 2, 'Les souris à l''envers', '<p style="padding-left: 30px;">&nbsp;</p>\r\n<p><img src="../../ressources/upload/media/p1souris-a-envers.jpg?1474805667343" alt="" width="1150" height="573" /></p>\r\n<p><em>Paisible =&gt; paix</em></p>\r\n<p><em>Ne s&rsquo;inqui&egrave;te pas trop =&gt; au d&eacute;but, cela ne le d&eacute;range pas&nbsp;!</em></p>\r\n<p><em>Tracasser =&gt; &agrave; l&rsquo;ennuyer, &agrave; le d&eacute;ranger&hellip;</em></p>\r\n<p><em>Multiplier =&gt; il y en a de plus en plus.</em></p>\r\n<p><em>Supporter =&gt; il en a assez des souris.</em></p>\r\n<p><em>Clopinant =&gt; en boitillant (&agrave; mimer).</em></p>\r\n<p><em>Sourici&egrave;res =&gt; pi&egrave;ges &agrave; souris.</em></p>\r\n<p><em>Plafond =&gt; montrer celui de la salle de classe.</em></p>\r\n<p><em>Soigneusement =&gt; il s&rsquo;applique, il fait tr&egrave;s attention.</em></p>\r\n<p><em>Se pousser du coude =&gt; mimer l&rsquo;action.</em></p>\r\n<p><em>Pointer du doigt =&gt; montrer du doigt.</em></p>\r\n<p><em>Se tordre de rire =&gt; rire beaucoup et tellement que cela fait mal au ventre.</em></p>'),
(5, 2, 'Les souris à l''envers 3 et 4', '<p><img src="../ressources/upload/media/p7les%20souris.jpg?1474807401969" alt="" width="679" height="786" /></p>');

-- --------------------------------------------------------

--
-- Structure de la table `eval_qcl`
--

CREATE TABLE IF NOT EXISTS `eval_qcl` (
  `qcl_id` int(11) NOT NULL AUTO_INCREMENT,
  `quid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `noq` int(11) NOT NULL,
  PRIMARY KEY (`qcl_id`),
  KEY `FK_eval_qcl` (`quid`),
  KEY `FK_eval_qcl_categ` (`cid`),
  KEY `FK_eval_qcl_level` (`lid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `eval_quiz`
--

CREATE TABLE IF NOT EXISTS `eval_quiz` (
  `quid` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_name` varchar(1000) NOT NULL,
  `description` text NOT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) NOT NULL,
  `gids` text,
  `clids` text,
  `qids` text NOT NULL,
  `noq` int(11) NOT NULL,
  `correct_score` float NOT NULL,
  `incorrect_score` float NOT NULL,
  `ip_address` text NOT NULL,
  `duration` int(11) NOT NULL DEFAULT '10',
  `maximum_attempts` int(11) NOT NULL DEFAULT '1',
  `pass_percentage` float NOT NULL DEFAULT '50',
  `view_answer` int(11) NOT NULL DEFAULT '1',
  `camera_req` int(11) NOT NULL DEFAULT '1',
  `question_selection` int(11) NOT NULL DEFAULT '1',
  `gen_certificate` int(11) NOT NULL DEFAULT '0',
  `certificate_text` text,
  PRIMARY KEY (`quid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `eval_quiz`
--

INSERT INTO `eval_quiz` (`quid`, `quiz_name`, `description`, `start_date`, `end_date`, `gids`, `clids`, `qids`, `noq`, `correct_score`, `incorrect_score`, `ip_address`, `duration`, `maximum_attempts`, `pass_percentage`, `view_answer`, `camera_req`, `question_selection`, `gen_certificate`, `certificate_text`) VALUES
(1, '1ère évaluation niveau 3', '', 1474293388, 1505829388, '2,1', '7', '106,107,108,109,110,111,113,114,115,1,2,3,7,8,9,10,11,12', 18, 1, 0, '', 10, 100, 50, 1, 0, 0, 0, NULL),
(2, 'Liste eval 1', '<p>Pour test liste eval1</p>', 1474725292, 1506261292, '2', '1', '44,1,2,5,13', 5, 1, 0, '', 10, 3, 50, 1, 0, 0, 0, NULL),
(3, 'Évaluation français Niveau 3', '', 1476274483, 1507810483, '2,1', '8', '1,2,3,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,92,106,107,108,109,110,111,113,114,115', 29, 1, 0, '', 45, 100, 50, 1, 0, 0, 0, NULL),
(4, 'Évaluation Maths niveau 3', '', 1476275566, 1507811566, '2', '7', '8,10,11,12,14,15,16,17,18,19,22,24,25,26,27,28,29,30,31,32,34,36,37,38,39,47,48,49,50,51', 30, 1, 0, '', 45, 100, 50, 1, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `eval_result`
--

CREATE TABLE IF NOT EXISTS `eval_result` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `quid` int(11) NOT NULL,
  `ssid` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `result_status` varchar(100) NOT NULL DEFAULT 'Open',
  `start_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `categories` text NOT NULL,
  `category_range` text NOT NULL,
  `r_qids` text NOT NULL,
  `individual_time` text NOT NULL,
  `total_time` int(11) NOT NULL DEFAULT '0',
  `score_obtained` float NOT NULL DEFAULT '0',
  `percentage_obtained` float NOT NULL DEFAULT '0',
  `attempted_ip` varchar(100) NOT NULL,
  `score_individual` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  `manual_valuation` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rid`),
  KEY `FK_eval_result` (`ssid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `eval_result`
--

INSERT INTO `eval_result` (`rid`, `quid`, `ssid`, `uid`, `result_status`, `start_time`, `end_time`, `categories`, `category_range`, `r_qids`, `individual_time`, `total_time`, `score_obtained`, `percentage_obtained`, `attempted_ip`, `score_individual`, `photo`, `manual_valuation`) VALUES
(1, 1, 0, 1, 'En attente', 1474983814, 1474991587, 'FRANCAIS,MATHS', '9,9', '1,2,3,7,8,9,10,11,12', '0,4,2,4,13,8,11,3,3', 48, 0, 0, '192.168.215.31', '0,0,0,0,3,3,2,0,3', '', 1),
(2, 1, 0, 1, 'En attente', 1474991596, 1474992583, 'FRANCAIS,MATHS', '9,9', '1,2,3,7,8,9,10,11,12', '0,29,13,14,26,12,28,5,19', 127, 2, 22.2222, '193.55.5.37', '2,1,3,1,3,3,2,0,3', '', 1),
(3, 1, 0, 1, 'En attente', 1475117244, 1475117608, 'FRANCAIS,MATHS', '18,18', '106,107,108,109,110,111,113,114,115,1,2,3,7,8,9,10,11,12', '0,25,3,11,7,14,7,8,13,13,9,1,11,20,19,2,6,0', 169, 10, 55.5556, '193.55.5.37', '1,0,1,1,1,1,1,1,1,1,2,0,1,3,3,2,0,3', '', 1),
(4, 1, 0, 1, 'En attente', 1475232743, 1475827153, 'FRANCAIS,MATHS', '18,18', '106,107,108,109,110,111,113,114,115,1,2,3,7,8,9,10,11,12', '0,4,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0', 4, 0, 0, '192.168.215.31', '0,0,0,0,0,0,0,0,0,0,0,0,0,3,3,2,0,3', '', 1),
(5, 2, 4, 4, 'Open', 1475484424, 0, 'FRANCAIS', '5', '44,1,2,5,13', '0,0,0,0,0', 0, 0, 0, '193.55.5.37', '3,0,0,0,0', '', 0),
(6, 1, 0, 1, 'En attente', 1475827223, 1476197189, 'FRANCAIS,MATHS', '18,18', '106,107,108,109,110,111,113,114,115,1,2,3,7,8,9,10,11,12', '0,3,1,1,1,1,0,1,0,2,1,1,1,1,1,6,0,0', 21, 0, 0, '192.168.215.31', '0,0,0,0,0,0,0,0,0,0,0,0,0,3,3,2,0,3', '', 1),
(7, 1, 0, 1, 'En attente', 1476197201, 1476204472, 'FRANCAIS,MATHS', '18,18', '106,107,108,109,110,111,113,114,115,1,2,3,7,8,9,10,11,12', '0,12,8,21,5,27,16,9,3,18,2,1,5,4,4,18,21,10', 176, 6, 33.3333, '193.55.5.37', '2,3,1,2,1,1,1,1,1,0,0,0,0,3,3,2,0,3', '', 1),
(8, 1, 0, 1, 'En attente', 1476276203, 1476276374, 'FRANCAIS,MATHS', '18,18', '106,107,108,109,110,111,113,114,115,1,2,3,7,8,9,10,11,12', '0,13,1,1,1,3,1,2,1,1,3,1,23,19,17,1,8,9', 96, 1, 5.55556, '193.55.5.37', '0,0,0,0,0,0,0,0,0,0,0,0,1,3,3,2,0,3', '', 1),
(10, 3, 0, 1, 'Open', 1476343570, 0, 'FRANCAIS', '29', '1,2,3,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,92,106,107,108,109,110,111,113,114,115', '0,4,1,3,1,1,1,1,5,1,1,1,4,2,1,1,1,4,1,4,1,1,2,2,1,1,1,1,0', 0, 0, 0, '193.55.5.37', '0,0,0,3,0,0,0,0,3,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0', '', 0),
(11, 1, 0, 1, 'Open', 1476343658, 0, 'FRANCAIS,MATHS', '18,18', '106,107,108,109,110,111,113,114,115,1,2,3,7,8,9,10,11,12', '0,4,1,3,1,1,1,1,5,1,1,1,4,2,1,1,1,4,1,4,1,1,2,2,1,1,1,1,0', 0, 0, 0, '193.55.5.37', '0,0,0,0,0,0,0,0,0,0,0,0,0,3,3,0,0,3', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `eval_school_year`
--

CREATE TABLE IF NOT EXISTS `eval_school_year` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `start_year` date NOT NULL,
  `end_year` date NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  UNIQUE KEY `sid` (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `eval_school_year`
--

INSERT INTO `eval_school_year` (`sid`, `start_year`, `end_year`, `active`) VALUES
(1, '2016-08-24', '2017-07-07', 1);

-- --------------------------------------------------------

--
-- Structure de la table `eval_student`
--

CREATE TABLE IF NOT EXISTS `eval_student` (
  `stid` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `birth` date NOT NULL,
  `contact_no` varchar(1000) DEFAULT NULL,
  `su` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `subscription_expired` int(11) NOT NULL DEFAULT '0',
  `verify_code` int(11) NOT NULL DEFAULT '0',
  `qrcode` varchar(255) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `etab_org` int(11) NOT NULL,
  PRIMARY KEY (`stid`),
  KEY `FK_eval_users_etab_origine` (`etab_org`),
  KEY `FK_eval_users_group` (`gid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `eval_student`
--

INSERT INTO `eval_student` (`stid`, `login`, `password`, `first_name`, `last_name`, `birth`, `contact_no`, `su`, `gid`, `subscription_expired`, `verify_code`, `qrcode`, `admin_id`, `etab_org`) VALUES
(1, 'cjean-marie-022v', '9dae835fe02c6dc5b5470a0ca2e7f7b0', 'CORVA', 'JEAN MARIE', '2009-12-01', '0639000000', 0, 2, 1632033560, 0, 'cjean-marie-022v28a21c4ee50cdcdd3acbae8f6ec8fd01.png', 1, 1),
(2, 'fgustavo-022v', '9dae835fe02c6dc5b5470a0ca2e7f7b0', 'FLEINK', 'GUSTAVO', '2006-05-23', '0639000000', 0, 2, 1600497560, 0, 'fgustavo-022v8be9fc6b8853b1a463d3d55ea73d4771.png', 1, 1),
(3, 'snew-024x', '9dae835fe02c6dc5b5470a0ca2e7f7b0', 'student', 'new', '2010-03-02', NULL, 0, 2, 1568875249, 0, 'snew-024xe6bdca5c17dbb4854e3683b2ea3a1a80.png', 1, 4),
(4, 'peleve1-022v', '9dae835fe02c6dc5b5470a0ca2e7f7b0', 'Prenom1', 'Eleve1', '2012-02-01', NULL, 0, 2, 1664024007, 0, 'peleve1-022vc608c35e126a5c27707851de9797d68b.png', 1, 1),
(10, 'fagnes-022v', '9dae835fe02c6dc5b5470a0ca2e7f7b0', 'Fleürk', 'Ägnes', '2009-12-01', '639000002', 0, 2, 1602053995, 0, 'fagnes-022v8e3a58257b3a61601bd8e11f4b097047.png', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `eval_student_sch`
--

CREATE TABLE IF NOT EXISTS `eval_student_sch` (
  `ssid` int(11) NOT NULL AUTO_INCREMENT,
  `stid` int(11) NOT NULL,
  `add_uid` int(11) NOT NULL,
  `edit_uid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `clid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `date_add` datetime DEFAULT NULL,
  `date_upd` datetime DEFAULT NULL,
  UNIQUE KEY `ssid` (`ssid`),
  KEY `FK_eval_student_sch_cl` (`clid`),
  KEY `FK_eval_student_sch_user` (`stid`),
  KEY `FK_eval_student_sch_user_add` (`add_uid`),
  KEY `FK_eval_student_sch_edit_user` (`edit_uid`),
  KEY `FK_eval_student_sch_etab` (`eid`),
  KEY `FK_eval_student_sch_school_year` (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `eval_student_sch`
--

INSERT INTO `eval_student_sch` (`ssid`, `stid`, `add_uid`, `edit_uid`, `eid`, `clid`, `sid`, `date_add`, `date_upd`) VALUES
(1, 1, 1, 1, 1, 4, 1, '2016-09-19 06:39:21', '2016-09-19 06:39:21'),
(2, 2, 1, 1, 1, 5, 1, '2016-09-19 06:39:21', '2016-09-19 06:39:21'),
(3, 3, 1, 1, 4, 6, 1, '2016-09-19 12:10:49', '2016-09-19 12:10:49'),
(4, 4, 1, 1, 1, 1, 1, '2016-09-24 18:23:27', '2016-09-24 18:23:27'),
(10, 10, 1, 1, 1, 5, 1, '2016-10-07 06:59:56', '2016-10-07 06:59:56');

-- --------------------------------------------------------

--
-- Structure de la table `eval_sub_category`
--

CREATE TABLE IF NOT EXISTS `eval_sub_category` (
  `scid` int(11) NOT NULL AUTO_INCREMENT,
  `sub_catg_name` varchar(255) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  PRIMARY KEY (`scid`),
  KEY `FK_eval_sub_category_sub` (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=11 ;

--
-- Contenu de la table `eval_sub_category`
--

INSERT INTO `eval_sub_category` (`scid`, `sub_catg_name`, `cid`) VALUES
(1, 'LO1 : Ecouter pour comprendre un message oral, un propos, un discours, un texte lu', 2),
(2, 'LEC1 : Comprendre un texte littéraire et l''interpréter', 2),
(3, 'N1 : Comprendre et utiliser des nombre entiers pour dénombrer, ordonner, repérer, comparer.', 3),
(4, 'N2 : Nommer, lire, écrire, représenter des nombres entiers', 3),
(5, 'N3 : Résoudre des problèmes en utilisant des nombres entiers et le calcul', 3),
(6, 'N4 : Calculer avec des nombres entiers', 3),
(7, 'EC1 : Ecrire à la main de manière fluide', 2),
(8, 'EC2 : Produire des écrits variés', 2),
(9, 'OL1 : Comprendre le fonctionnement de la langue', 2),
(10, 'OG : Maîtriser la forme des mots en lien avec la syntaxe', 2);

-- --------------------------------------------------------

--
-- Structure de la table `eval_users`
--

CREATE TABLE IF NOT EXISTS `eval_users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `contact_no` varchar(1000) NOT NULL,
  `gid` int(11) DEFAULT NULL,
  `verify_code` int(11) DEFAULT NULL,
  `su` int(11) NOT NULL DEFAULT '0',
  `admin_id` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  PRIMARY KEY (`uid`),
  KEY `FK_eval_users_etab_origine` (`eid`),
  KEY `FK_eval_users_group` (`gid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `eval_users`
--

INSERT INTO `eval_users` (`uid`, `login`, `password`, `email`, `first_name`, `last_name`, `contact_no`, `gid`, `verify_code`, `su`, `admin_id`, `eid`, `date_add`, `date_upd`) VALUES
(1, 'admin', '0cb7d8734ea65086bb4a65489eeb1d89', '', 'Nathalie', 'HARITINIAINA', '0269618838', 1, 0, 1, 1, 1, '2016-07-22 00:00:00', '2016-07-22 00:00:00');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `eval_class`
--
ALTER TABLE `eval_class`
  ADD CONSTRAINT `FK_eval_class` FOREIGN KEY (`cyid`) REFERENCES `eval_cycle` (`cyid`);

--
-- Contraintes pour la table `eval_coef`
--
ALTER TABLE `eval_coef`
  ADD CONSTRAINT `FK_eval_coef_quiz` FOREIGN KEY (`quid`) REFERENCES `eval_quiz` (`quid`);

--
-- Contraintes pour la table `eval_etab`
--
ALTER TABLE `eval_etab`
  ADD CONSTRAINT `FK_eval_etab_circo` FOREIGN KEY (`ciid`) REFERENCES `eval_circo` (`ciid`);

--
-- Contraintes pour la table `eval_options`
--
ALTER TABLE `eval_options`
  ADD CONSTRAINT `FK_eval_options` FOREIGN KEY (`qid`) REFERENCES `eval_qbank` (`qid`);

--
-- Contraintes pour la table `eval_qbank`
--
ALTER TABLE `eval_qbank`
  ADD CONSTRAINT `FK_eval_qbank_categ` FOREIGN KEY (`cid`) REFERENCES `eval_category` (`cid`),
  ADD CONSTRAINT `FK_eval_qbank_level` FOREIGN KEY (`lid`) REFERENCES `eval_level` (`lid`),
  ADD CONSTRAINT `FK_eval_qbank_subcat` FOREIGN KEY (`scid`) REFERENCES `eval_sub_category` (`scid`);

--
-- Contraintes pour la table `eval_qbank_parent`
--
ALTER TABLE `eval_qbank_parent`
  ADD CONSTRAINT `FK_eval_qbank_parent_catg` FOREIGN KEY (`cid`) REFERENCES `eval_category` (`cid`);

--
-- Contraintes pour la table `eval_qcl`
--
ALTER TABLE `eval_qcl`
  ADD CONSTRAINT `FK_eval_qcl` FOREIGN KEY (`quid`) REFERENCES `eval_quiz` (`quid`),
  ADD CONSTRAINT `FK_eval_qcl_categ` FOREIGN KEY (`cid`) REFERENCES `eval_category` (`cid`),
  ADD CONSTRAINT `FK_eval_qcl_level` FOREIGN KEY (`lid`) REFERENCES `eval_level` (`lid`);

--
-- Contraintes pour la table `eval_student`
--
ALTER TABLE `eval_student`
  ADD CONSTRAINT `FK_eval_student_groupe` FOREIGN KEY (`gid`) REFERENCES `eval_group` (`gid`);

--
-- Contraintes pour la table `eval_student_sch`
--
ALTER TABLE `eval_student_sch`
  ADD CONSTRAINT `FK_eval_student_sch` FOREIGN KEY (`stid`) REFERENCES `eval_student` (`stid`),
  ADD CONSTRAINT `FK_eval_student_sch_add` FOREIGN KEY (`add_uid`) REFERENCES `eval_users` (`uid`),
  ADD CONSTRAINT `FK_eval_student_sch_cl` FOREIGN KEY (`clid`) REFERENCES `eval_class` (`clid`),
  ADD CONSTRAINT `FK_eval_student_sch_edit` FOREIGN KEY (`edit_uid`) REFERENCES `eval_users` (`uid`),
  ADD CONSTRAINT `FK_eval_student_sch_etab` FOREIGN KEY (`eid`) REFERENCES `eval_etab` (`eid`),
  ADD CONSTRAINT `FK_eval_student_sch_school_year` FOREIGN KEY (`sid`) REFERENCES `eval_school_year` (`sid`);

--
-- Contraintes pour la table `eval_sub_category`
--
ALTER TABLE `eval_sub_category`
  ADD CONSTRAINT `FK_eval_sub_category_sub` FOREIGN KEY (`cid`) REFERENCES `eval_category` (`cid`);

--
-- Contraintes pour la table `eval_users`
--
ALTER TABLE `eval_users`
  ADD CONSTRAINT `FK_eval_users_etab_origine` FOREIGN KEY (`eid`) REFERENCES `eval_etab` (`eid`),
  ADD CONSTRAINT `FK_eval_users_group` FOREIGN KEY (`gid`) REFERENCES `eval_group` (`gid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
