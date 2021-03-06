-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 26 Septembre 2016 à 13:52
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `evaluation`
--

-- --------------------------------------------------------

--
-- Structure de la table `eval_answers`
--

DROP TABLE IF EXISTS `eval_answers`;
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
) ENGINE=InnoDB AUTO_INCREMENT=829 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `eval_answers`
--

INSERT INTO `eval_answers` (`aid`, `qid`, `q_option`, `uid`, `ssid`, `score_u`, `rid`) VALUES
(818, 6, '64', 1, 0, 0.5, 4),
(819, 6, '65', 1, 0, 0, 4),
(820, 14, 'courgettefourchettebrouett<span class="tt">edouchettefourchettecouettefourche</span>ttefiurch', 1, 0, 0, 4),
(821, 14, 'courgettefourchettebrouett<span class="tt">edouchettefourchettecouettefourche</span>ttefiurch', 1, 0, 0, 4),
(822, 8, '<table style="width: 508px;">\r\n<tbody>\r\n<tr style="height: 15px;">\r\n<th style="width: 155px; height: 15px;">JUSTE AVANT</th>\r\n<th style="width: 202px; height: 15px;">LE NOMBRE</th>\r\n<th style="width: 129px; height: 15px;">JUSTE APRES</th>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true"> 5</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"> <strong>315</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true"> ghg445</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true"> </td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>860</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true"> </td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true"> </td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>1235</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true"> </td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true"> </td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>2001</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true"> </td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true"> </td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>5400</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true"> </td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true"> </td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>1000</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true"> </td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 0, 0, 4),
(823, 12, '{"search":"","response":""}', 1, 0, 0, 4),
(824, 1, '2', 1, 0, 1, 4),
(825, 2, '12', 1, 0, 0, 4),
(826, 3, 'hghghg', 1, 0, 0, 4),
(827, 7, '121', 1, 0, 0, 4),
(828, 9, '<table style="width: 508px;">\r\n<tbody>\r\n<tr style="height: 26px;">\r\n<td style="width: 80px;" contenteditable="true"> </td>\r\n<td style="width: 72.7167px; height: 26px; text-align: center;">4237</td>\r\n<td style="width: 124.283px; height: 26px; text-align: center;" contenteditable="true"> </td>\r\n<td style="width: 138px; height: 26px; text-align: center;">4584</td>\r\n<td style="width: 138px; height: 26px; text-align: center;" contenteditable="true"> </td>\r\n<td style="width: 193px; height: 26px; text-align: center;">5183</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 0, 0, 4);

-- --------------------------------------------------------

--
-- Structure de la table `eval_category`
--

DROP TABLE IF EXISTS `eval_category`;
CREATE TABLE IF NOT EXISTS `eval_category` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(1000) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `eval_circo`;
CREATE TABLE IF NOT EXISTS `eval_circo` (
  `ciid` int(11) NOT NULL AUTO_INCREMENT,
  `rne` char(8) NOT NULL,
  `label` varchar(225) DEFAULT NULL,
  UNIQUE KEY `rnid` (`ciid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `eval_class`;
CREATE TABLE IF NOT EXISTS `eval_class` (
  `clid` int(11) NOT NULL AUTO_INCREMENT,
  `code` char(3) NOT NULL,
  `cyid` int(11) NOT NULL,
  UNIQUE KEY `clid` (`clid`),
  KEY `FK_eval_class` (`cyid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `eval_coef`;
CREATE TABLE IF NOT EXISTS `eval_coef` (
  `coid` int(11) NOT NULL AUTO_INCREMENT,
  `quid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `coef` float NOT NULL,
  PRIMARY KEY (`coid`),
  KEY `FK_eval_coef` (`qid`),
  KEY `FK_eval_coef_quiz` (`quid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

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
(20, 1, 1, 1),
(24, 1, 14, 1),
(25, 1, 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `eval_competency`
--

DROP TABLE IF EXISTS `eval_competency`;
CREATE TABLE IF NOT EXISTS `eval_competency` (
  `comid` int(11) NOT NULL AUTO_INCREMENT,
  `compet_name` varchar(250) NOT NULL,
  `description` text,
  `clids` text,
  `quids` text,
  UNIQUE KEY `comid` (`comid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `eval_conf`
--

DROP TABLE IF EXISTS `eval_conf`;
CREATE TABLE IF NOT EXISTS `eval_conf` (
  `conf_id` int(11) NOT NULL AUTO_INCREMENT,
  `const` varchar(25) NOT NULL,
  `value` varchar(25) NOT NULL,
  PRIMARY KEY (`conf_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `eval_conf`
--

INSERT INTO `eval_conf` (`conf_id`, `const`, `value`) VALUES
(1, 'CONF_MAIL_QUIZ', '1');

-- --------------------------------------------------------

--
-- Structure de la table `eval_cycle`
--

DROP TABLE IF EXISTS `eval_cycle`;
CREATE TABLE IF NOT EXISTS `eval_cycle` (
  `cyid` int(11) NOT NULL AUTO_INCREMENT,
  `cycle_name` varchar(50) NOT NULL,
  UNIQUE KEY `cyid` (`cyid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `eval_etab`;
CREATE TABLE IF NOT EXISTS `eval_etab` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `rne` char(8) NOT NULL,
  `label` varchar(225) NOT NULL,
  `ciid` int(11) DEFAULT NULL,
  UNIQUE KEY `eid` (`eid`),
  KEY `FK_eval_etab` (`label`),
  KEY `FK_eval_etab_school` (`rne`),
  KEY `FK_eval_etab_circo` (`ciid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `eval_group`;
CREATE TABLE IF NOT EXISTS `eval_group` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(250) NOT NULL,
  `validate_for_days` int(11) NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `eval_level`;
CREATE TABLE IF NOT EXISTS `eval_level` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(1000) NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `eval_options`;
CREATE TABLE IF NOT EXISTS `eval_options` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `qid` int(11) NOT NULL,
  `q_option` text NOT NULL,
  `q_option_match` varchar(1000) DEFAULT NULL,
  `score` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`oid`),
  KEY `FK_eval_options` (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

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
(33, 7, '120', NULL, 1),
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
(64, 6, '', NULL, 0.5),
(65, 6, '', NULL, 0),
(66, 6, '', NULL, 0.5);

-- --------------------------------------------------------

--
-- Structure de la table `eval_qbank`
--

DROP TABLE IF EXISTS `eval_qbank`;
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `eval_qbank`
--

INSERT INTO `eval_qbank` (`qid`, `question_type`, `question`, `description`, `is_default_txt`, `default_txt`, `lid`, `cid`, `scid`, `pqid`, `no_time_served`, `no_time_corrected`, `no_time_incorrected`, `no_time_unattempted`) VALUES
(1, 1, '<p>Le petit gar&ccedil;on a &eacute;t&eacute; content jusqu''&agrave; l''&acirc;ge de 3 ans?</p>', '<p>coche la bonne r&eacute;ponse</p>', 0, '', 3, 2, 2, 1, 1, 0, 1, 0),
(2, 1, '<p>Qui est Grodoudou</p>', '<p>coche la bonne r&eacute;ponse</p>', 0, '', 3, 2, 2, 1, 1, 0, 1, 0),
(3, 5, '<p>Le petit gar&ccedil;on hait l''&eacute;cole. Explique avec tes propres mots.</p>', '<p>Dissertation</p>', 0, '', 3, 2, 2, 1, 1, 0, 0, 0),
(5, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; (</em><em>les mots sont dict&eacute;s.)</em></p>\r\n<p><em>[a]</em></p>\r\n<p><em><img src="../../../ressources/upload/media/p20ananas.jpg?1474290681067" alt="" width="80" height="82" /></em></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(6, 8, '<p><em>Coche les cases des syllabes qui contiennent le son indiqu&eacute; (</em><em>les mots sont dict&eacute;s.)</em></p>\r\n<p><em>[a]</em></p>\r\n<p><em><img src="../../../ressources/upload/media/p20ananas.jpg?1474616090266" alt="" width="80" height="82" /><br /></em></p>', '<p>Je suis capable de rep&eacute;rer la place d&rsquo;un phon&egrave;me dans un mot</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(7, 4, '<p><img src="../../../ressources/upload/media/p5trombone.jpg?1474291611513" alt="" width="501" height="191" /></p>\r\n<p><span style="text-decoration: underline;">Calcule le nombre total de trombones re&ccedil;us.</span></p>', '<p>L''&eacute;cole du far&eacute; a re&ccedil;u 12 bo&icirc;tes de trombones. Voici le nombre qu''il y a dans chaque boite.</p>', 0, '', 3, 3, 3, NULL, 1, 0, 1, 0),
(8, 7, '<p>Compl&egrave;te le tableau</p>', '<p>REMPLIR LES CASES VIDE</p>', 1, '<table style="width: 508px;">\r\n<tbody>\r\n<tr style="height: 15px;">\r\n<th style="width: 155px; height: 15px;">JUSTE AVANT</th>\r\n<th style="width: 202px; height: 15px;">LE NOMBRE</th>\r\n<th style="width: 129px; height: 15px;">JUSTE APRES</th>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;">&nbsp;<strong>315</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>860</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>1235</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>2001</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>5400</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 26px;">\r\n<td style="width: 155px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 202px; height: 26px; text-align: center;"><strong>1000</strong></td>\r\n<td style="width: 129px; height: 26px;" contenteditable="true">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', 3, 3, 3, 0, 1, 0, 0, 0),
(9, 7, '<p>Compl&egrave;te la s&eacute;rie avec les nombres suivants :</p>\r\n<p><strong>4725 - 4173 - 4576</strong></p>', '<p>REMPLIR LES CASES VIDE</p>', 1, '<table style="width: 508px;">\r\n<tbody>\r\n<tr style="height: 26px;">\r\n<td style="width: 80px;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 72.7167px; height: 26px; text-align: center;">4237</td>\r\n<td style="width: 124.283px; height: 26px; text-align: center;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 138px; height: 26px; text-align: center;">4584</td>\r\n<td style="width: 138px; height: 26px; text-align: center;" contenteditable="true">&nbsp;</td>\r\n<td style="width: 193px; height: 26px; text-align: center;">5183</td>\r\n</tr>\r\n</tbody>\r\n</table>', 3, 3, 3, 0, 1, 0, 0, 0),
(10, 3, '<p>Relie</p>', '<p>relie</p>', 0, '', 3, 3, 4, NULL, 1, 0, 1, 0),
(11, 4, '<p>Ecris les nombres dict&eacute;s en chiffres</p>\r\n<p><strong>(2743 -578 - 1296 -708 -3017)</strong></p>', '', 0, '', 3, 3, 4, NULL, 1, 0, 1, 0),
(12, 6, '<p>1. Les &eacute;l&egrave;ves jouent aux billes. Ce matin, ils ont d&eacute;cid&eacute; de les mettre ensemble et en ont compt&eacute; 76.</p>\r\n<p>A la fin de la r&eacute;cr&eacute;ation, apr&egrave;s avoir jou&eacute;, ils en comptent 124.</p>\r\n<p>Combien de billes ont-ils gagn&eacute; pendant la r&eacute;cr&eacute;ation?</p>\r\n<p>Ecris tes calculs dans le premier cadre et ta r&eacute;ponse dans le deuxi&egrave;me cadre.</p>', '', 0, '', 3, 3, 5, 0, 1, 0, 0, 0),
(13, 1, '<p>regarde mieux</p>', '<p>regarde</p>', 0, '', 1, 2, 2, 0, 0, 0, 0, 0),
(14, 9, '<p><strong>fourchette </strong>&agrave; souligner</p>', '<p>ss</p>', 1, 'courgettefourchettebrouettedouchettefourchettecouettefourchettefiurch', 4, 2, 2, NULL, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `eval_qbank_parent`
--

DROP TABLE IF EXISTS `eval_qbank_parent`;
CREATE TABLE IF NOT EXISTS `eval_qbank_parent` (
  `pqid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  UNIQUE KEY `pqid` (`pqid`),
  KEY `FK_eval_qbank_parent_catg` (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Contenu de la table `eval_qbank_parent`
--

INSERT INTO `eval_qbank_parent` (`pqid`, `cid`, `title`, `description`) VALUES
(1, 2, '35 kilos d''espoir de Anna GAVALDA chez Bayard Jeunesse', '<p>Je hais l&rsquo;&eacute;cole. Je la hais plus que tout au monde. Et m&ecirc;me plus que &ccedil;a encore&hellip; Elle me pourrit la vie.</p>\r\n<p>Jusqu&rsquo;&agrave; l&rsquo;&acirc;ge de trois ans, je peux dire que j&rsquo;ai &eacute;t&eacute; heureux. Je ne m&rsquo;en souviens plus vraiment, mais, &agrave; mon avis, &ccedil;a allait. Je jouais, je regardais ma cassette de <em>Petit Ours Brun</em> dix fois de suite, je dessinais et j&rsquo;inventais des milliards d&rsquo;aventures &agrave; Grodoudou, mon chien en peluche que j&rsquo;adorais. Ma m&egrave;re m&rsquo;a racont&eacute; que je restais des heures enti&egrave;res dans ma chambre &agrave; jacasser et &agrave; parler tout seul. J&rsquo;en conclus donc que j&rsquo;&eacute;tais heureux.</p>\r\n<p>A cette &eacute;poque de ma vie, j&rsquo;aimais tout le monde, et je croyais que tout le monde s&rsquo;aimait. Et puis, quand j&rsquo;ai eu trois ans et cinq mois, patatras&nbsp;! L&rsquo;&eacute;cole.</p>\r\n<p>Il para&icirc;t que, le matin, j&rsquo;y suis all&eacute; tr&egrave;s content. Mes parents avaient d&ucirc; me bassiner avec &ccedil;a pendant toutes les vacances&nbsp;: &laquo;&nbsp;Tu as de la chance mon ch&eacute;ri, tu vas aller &agrave; l&rsquo;&eacute;cole&hellip;&nbsp;&raquo; &laquo;&nbsp;Regarde ce beau cartable tout neuf&nbsp;! C&rsquo;est pour aller dans ta belle &eacute;cole&nbsp;!&nbsp;&raquo; Et gnagnagna&hellip; Il para&icirc;t que je n&rsquo;ai pas pleur&eacute;. (Je suis curieux, je pense que j&rsquo;avais envie de voir ce qu&rsquo;ils avaient comme jouets et comme Lego) il para&icirc;t que je suis revenu enchant&eacute; &agrave; l&rsquo;heure du d&eacute;jeuner, que j&rsquo;ai bien mang&eacute; et que je suis retourn&eacute; dans ma chambre raconter ma merveilleuse matin&eacute;e &agrave; Grodoudou.</p>\r\n<p>Eh bien, si j&rsquo;avais su, je les aurais savour&eacute;es, ces derni&egrave;res minutes de bonheur, parce que c&rsquo;est tout de suite apr&egrave;s que ma vie a d&eacute;raill&eacute;.</p>\r\n<ul>\r\n<li>On y retourne, a dit ma m&egrave;re.</li>\r\n<li>O&ugrave; &ccedil;a&nbsp;?</li>\r\n<li>Eh bien&hellip; A l&rsquo;&eacute;cole&nbsp;!</li>\r\n<li></li>\r\n<li>Non quoi&nbsp;?</li>\r\n<li>Je n&rsquo;irai plus.</li>\r\n<li>Ah bon&hellip; Et pourquoi&nbsp;?</li>\r\n<li>Parce que &ccedil;a y est, j&rsquo;ai vu comment c&rsquo;&eacute;tait, et &ccedil;a ne m&rsquo;int&eacute;resse pas. J&rsquo;ai plein de trucs &agrave; faire dans ma chambre. J&rsquo;ai dit &agrave; Grodoudou que j&rsquo;allais lui construire une machine sp&eacute;ciale pour l&rsquo;aider &agrave; retrouver tous les os qu&rsquo;il a enterr&eacute;s sous mon lit, alors je n&rsquo;ai plus le temps d&rsquo;y aller.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Ma m&egrave;re s&rsquo;est agenouill&eacute;e, et j&rsquo;ai secou&eacute; la t&ecirc;te. Elle a insist&eacute;, et je me suis mis &agrave; pleurer. Elle m&rsquo;a soulev&eacute;, et je me suis mis &agrave; hurler. Et elle m&rsquo;a donn&eacute; une claque.</p>\r\n<p>C&rsquo;&eacute;tait la premi&egrave;re de ma vie. Voil&agrave;. C&rsquo;&eacute;tait &ccedil;a, l&rsquo;&eacute;cole. C&rsquo;&eacute;tait le d&eacute;but du cauchemar.</p>'),
(2, 3, 'test', '<p>test</p>');

-- --------------------------------------------------------

--
-- Structure de la table `eval_qcl`
--

DROP TABLE IF EXISTS `eval_qcl`;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `eval_quiz`
--

DROP TABLE IF EXISTS `eval_quiz`;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `eval_quiz`
--

INSERT INTO `eval_quiz` (`quid`, `quiz_name`, `description`, `start_date`, `end_date`, `gids`, `clids`, `qids`, `noq`, `correct_score`, `incorrect_score`, `ip_address`, `duration`, `maximum_attempts`, `pass_percentage`, `view_answer`, `camera_req`, `question_selection`, `gen_certificate`, `certificate_text`) VALUES
(1, '1ère évaluation niveau 3', '', 1474293388, 1505829388, '2,1', '5', '6,14,10,8,12,1,2,3,7,9,11', 11, 1, 0, '', 10000000, 10, 50, 1, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `eval_result`
--

DROP TABLE IF EXISTS `eval_result`;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `eval_result`
--

INSERT INTO `eval_result` (`rid`, `quid`, `ssid`, `uid`, `result_status`, `start_time`, `end_time`, `categories`, `category_range`, `r_qids`, `individual_time`, `total_time`, `score_obtained`, `percentage_obtained`, `attempted_ip`, `score_individual`, `photo`, `manual_valuation`) VALUES
(1, 1, 0, 1, 'En attente', 1474377121, 1474544083, 'FRANCAIS,MATHS', '9,9', '8,12,1,2,3,7,9,10,11', '0,688,42,65,59,111,91,31,55', 1142, 0, 0, '127.0.0.1', '3,3,2,2,3,2,3,2,2', '', 1),
(4, 1, 0, 1, 'Open', 1474615206, 0, 'FRANCAIS,MATHS', '11,11', '6,14,10,8,12,1,2,3,7,9,11', '0,297,26,10,8,4,3,4,7,2,0', 0, 0, 0, '127.0.0.1', '2,3,0,3,3,1,2,3,2,3,0', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `eval_school_year`
--

DROP TABLE IF EXISTS `eval_school_year`;
CREATE TABLE IF NOT EXISTS `eval_school_year` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `start_year` date NOT NULL,
  `end_year` date NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  UNIQUE KEY `sid` (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `eval_school_year`
--

INSERT INTO `eval_school_year` (`sid`, `start_year`, `end_year`, `active`) VALUES
(1, '2016-08-24', '2017-07-07', 1);

-- --------------------------------------------------------

--
-- Structure de la table `eval_student`
--

DROP TABLE IF EXISTS `eval_student`;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `eval_student`
--

INSERT INTO `eval_student` (`stid`, `login`, `password`, `first_name`, `last_name`, `birth`, `contact_no`, `su`, `gid`, `subscription_expired`, `verify_code`, `qrcode`, `admin_id`, `etab_org`) VALUES
(1, 'cjean-marie-022v', '9dae835fe02c6dc5b5470a0ca2e7f7b0', 'CORVA', 'JEAN MARIE', '2009-12-01', '0639000000', 0, 2, 1632033560, 0, 'cjean-marie-022v28a21c4ee50cdcdd3acbae8f6ec8fd01.png', 1, 1),
(2, 'fgustavo-022v', '9dae835fe02c6dc5b5470a0ca2e7f7b0', 'FLEINK', 'GUSTAVO', '2006-05-23', '0639000000', 0, 2, 1600497560, 0, 'fgustavo-022v8be9fc6b8853b1a463d3d55ea73d4771.png', 1, 1),
(3, 'snew-024x', '9dae835fe02c6dc5b5470a0ca2e7f7b0', 'student', 'new', '2010-03-02', NULL, 0, 2, 1568875249, 0, 'snew-024xe6bdca5c17dbb4854e3683b2ea3a1a80.png', 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `eval_student_sch`
--

DROP TABLE IF EXISTS `eval_student_sch`;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `eval_student_sch`
--

INSERT INTO `eval_student_sch` (`ssid`, `stid`, `add_uid`, `edit_uid`, `eid`, `clid`, `sid`, `date_add`, `date_upd`) VALUES
(1, 1, 1, 1, 1, 4, 1, '2016-09-19 06:39:21', '2016-09-19 06:39:21'),
(2, 2, 1, 1, 1, 5, 1, '2016-09-19 06:39:21', '2016-09-19 06:39:21'),
(3, 3, 1, 1, 4, 6, 1, '2016-09-19 12:10:49', '2016-09-19 12:10:49');

-- --------------------------------------------------------

--
-- Structure de la table `eval_sub_category`
--

DROP TABLE IF EXISTS `eval_sub_category`;
CREATE TABLE IF NOT EXISTS `eval_sub_category` (
  `scid` int(11) NOT NULL AUTO_INCREMENT,
  `sub_catg_name` varchar(255) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  PRIMARY KEY (`scid`),
  KEY `FK_eval_sub_category_sub` (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

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
(9, 'OL1 : Comprendre le fonctionnement de la langue', 2);

-- --------------------------------------------------------

--
-- Structure de la table `eval_users`
--

DROP TABLE IF EXISTS `eval_users`;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `eval_users`
--

INSERT INTO `eval_users` (`uid`, `login`, `password`, `email`, `first_name`, `last_name`, `contact_no`, `gid`, `verify_code`, `su`, `admin_id`, `eid`, `date_add`, `date_upd`) VALUES
(1, 'admin', '0cb7d8734ea65086bb4a65489eeb1d89', '', 'Nathalie', 'HARITINIAINA', '0269618838', 1, 0, 1, 1, 1, '2016-07-22 00:00:00', '2016-07-22 00:00:00');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `eval_answers`
--
ALTER TABLE `eval_answers`
  ADD CONSTRAINT `FK_eval_answers_qbank` FOREIGN KEY (`qid`) REFERENCES `eval_qbank` (`qid`);

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
