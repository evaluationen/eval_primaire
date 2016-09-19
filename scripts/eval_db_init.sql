/*
SQLyog Enterprise - MySQL GUI v6.56
MySQL - 5.7.9 : Database - evaluation
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`evaluation` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `evaluation`;

/*Table structure for table `eval_answers` */

DROP TABLE IF EXISTS `eval_answers`;

CREATE TABLE `eval_answers` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `qid` int(11) NOT NULL,
  `q_option` text NOT NULL,
  `ssid` int(11) NOT NULL,
  `score_u` float NOT NULL DEFAULT '0',
  `rid` int(11) NOT NULL,
  PRIMARY KEY (`aid`),
  KEY `FK_eval_answers` (`ssid`),
  KEY `FK_eval_answers_qbank` (`qid`),
  CONSTRAINT `FK_eval_answers` FOREIGN KEY (`ssid`) REFERENCES `eval_student_sch` (`ssid`),
  CONSTRAINT `FK_eval_answers_qbank` FOREIGN KEY (`qid`) REFERENCES `eval_qbank` (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `eval_answers` */

/*Table structure for table `eval_category` */

DROP TABLE IF EXISTS `eval_category`;

CREATE TABLE `eval_category` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(1000) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `eval_category` */

insert  into `eval_category`(`cid`,`category_name`) values (2,'FRANCAIS'),(3,'MATHS');

/*Table structure for table `eval_circo` */

DROP TABLE IF EXISTS `eval_circo`;

CREATE TABLE `eval_circo` (
  `ciid` int(11) NOT NULL AUTO_INCREMENT,
  `rne` char(8) NOT NULL,
  `label` varchar(225) DEFAULT NULL,
  UNIQUE KEY `rnid` (`ciid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `eval_circo` */

insert  into `eval_circo`(`ciid`,`rne`,`label`) values (1,'9760304B','CIRCONSCRIPTION 1ER DEGRE IEN ASH 1ER-2ND DEGRE+PPF+FORMATION\r'),(2,'9760297U','CIRCONSCRIPTION 1ER DEGRE IEN BANDRABOUA (MAYOTTE NORD)\r'),(3,'9760233Z','CIRCONSCRIPTION 1ER DEGRE IEN DEMBENI (MAYOTTE SUD)\r'),(4,'9760232Y','CIRCONSCRIPTION 1ER DEGRE IEN IENA KOUNGOU\r'),(5,'9760352D','CIRCONSCRIPTION 1ER DEGRE IEN MAMOUDZOU CENTRE\r'),(6,'9760263G','CIRCONSCRIPTION 1ER DEGRE IEN MAMOUDZOU NORD\r'),(7,'9760299W','CIRCONSCRIPTION 1ER DEGRE IEN MAMOUDZOU SUD\r'),(8,'9760285F','CIRCONSCRIPTION 1ER DEGRE IEN PETITE-TERRE\r'),(9,'9760234A','CIRCONSCRIPTION 1ER DEGRE IEN SADA (MAYOTTE OUEST)\r'),(10,'9760309G','CIRCONSCRIPTION 1ER DEGRE IEN TSINGONI');

/*Table structure for table `eval_class` */

DROP TABLE IF EXISTS `eval_class`;

CREATE TABLE `eval_class` (
  `clid` int(11) NOT NULL AUTO_INCREMENT,
  `code` char(3) NOT NULL,
  `cyid` int(11) NOT NULL,
  UNIQUE KEY `clid` (`clid`),
  KEY `FK_eval_class` (`cyid`),
  CONSTRAINT `FK_eval_class` FOREIGN KEY (`cyid`) REFERENCES `eval_cycle` (`cyid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `eval_class` */

insert  into `eval_class`(`clid`,`code`,`cyid`) values (1,'PS',1),(2,'MS',1),(3,'GS',1),(4,'CP',2),(5,'CE1',2),(6,'CE2',3),(7,'CM1',3),(8,'CM2',3);

/*Table structure for table `eval_coef` */

DROP TABLE IF EXISTS `eval_coef`;

CREATE TABLE `eval_coef` (
  `coid` int(11) NOT NULL AUTO_INCREMENT,
  `quid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `coef` float NOT NULL,
  PRIMARY KEY (`coid`),
  KEY `FK_eval_coef` (`qid`),
  KEY `FK_eval_coef_quiz` (`quid`),
  CONSTRAINT `FK_eval_coef_quiz` FOREIGN KEY (`quid`) REFERENCES `eval_quiz` (`quid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `eval_coef` */

insert  into `eval_coef`(`coid`,`quid`,`qid`,`coef`) values (7,4,0,1),(8,4,33,1),(9,4,28,1),(10,4,25,1);

/*Table structure for table `eval_competency` */

DROP TABLE IF EXISTS `eval_competency`;

CREATE TABLE `eval_competency` (
  `comid` int(11) NOT NULL AUTO_INCREMENT,
  `compet_name` varchar(250) NOT NULL,
  `description` text,
  `clids` text,
  `quids` text,
  UNIQUE KEY `comid` (`comid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `eval_competency` */

/*Table structure for table `eval_conf` */

DROP TABLE IF EXISTS `eval_conf`;

CREATE TABLE `eval_conf` (
  `conf_id` int(11) NOT NULL AUTO_INCREMENT,
  `const` varchar(25) NOT NULL,
  `value` varchar(25) NOT NULL,
  PRIMARY KEY (`conf_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `eval_conf` */

insert  into `eval_conf`(`conf_id`,`const`,`value`) values (1,'CONF_MAIL_QUIZ','1');

/*Table structure for table `eval_cycle` */

DROP TABLE IF EXISTS `eval_cycle`;

CREATE TABLE `eval_cycle` (
  `cyid` int(11) NOT NULL AUTO_INCREMENT,
  `cycle_name` varchar(50) NOT NULL,
  UNIQUE KEY `cyid` (`cyid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `eval_cycle` */

insert  into `eval_cycle`(`cyid`,`cycle_name`) values (1,'Cycle 1'),(2,'Cycle 2'),(3,'Cycle 3');

/*Table structure for table `eval_etab` */

DROP TABLE IF EXISTS `eval_etab`;

CREATE TABLE `eval_etab` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `rne` char(8) NOT NULL,
  `label` varchar(225) NOT NULL,
  `ciid` int(11) DEFAULT NULL,
  UNIQUE KEY `eid` (`eid`),
  KEY `FK_eval_etab` (`label`),
  KEY `FK_eval_etab_school` (`rne`),
  KEY `FK_eval_etab_circo` (`ciid`),
  CONSTRAINT `FK_eval_etab_circo` FOREIGN KEY (`ciid`) REFERENCES `eval_circo` (`ciid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `eval_etab` */

insert  into `eval_etab`(`eid`,`rne`,`label`,`ciid`) values (1,'9760022V','ECOLE ELEMENTAIRE DE LABATTOIR 1 LA FERME',8),(2,'9760056G','ECOLE ELEMENTAIRE DE LABATTOIR 2 POTELEA',8),(3,'9760093X','ECOLE ELEMENTAIRE DE LABATTOIR 3 BADAMIERS',8),(4,'9760024X','ECOLE ELEMENTAIRE DE LABATTOIR 4 MORIOMBENI',8),(5,'9760139X','ECOLE ELEMENTAIRE DE LABATTOIR 5 MOYA',8),(6,'9760186Y','ECOLE ELEMENTAIRE DE LABATTOIR 6 FOUR A CHAUX',8),(7,'9760260D','ECOLE ELEMENTAIRE DE LABATTOIR 7 TOUTOUROUCHA',8);

/*Table structure for table `eval_group` */

DROP TABLE IF EXISTS `eval_group`;

CREATE TABLE `eval_group` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(250) NOT NULL,
  `validate_for_days` int(11) NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `eval_group` */

insert  into `eval_group`(`gid`,`group_name`,`validate_for_days`) values (1,'Super Admin',0),(2,'Elèves',0);

/*Table structure for table `eval_level` */

DROP TABLE IF EXISTS `eval_level`;

CREATE TABLE `eval_level` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(1000) NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `eval_level` */

insert  into `eval_level`(`lid`,`level_name`) values (1,'Niveau 1'),(2,'Niveau 2'),(3,'Niveau 3'),(4,'Niveau 4'),(5,'Niveau 5');

/*Table structure for table `eval_options` */

DROP TABLE IF EXISTS `eval_options`;

CREATE TABLE `eval_options` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `qid` int(11) NOT NULL,
  `q_option` text NOT NULL,
  `q_option_match` varchar(1000) DEFAULT NULL,
  `score` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`oid`),
  KEY `FK_eval_options` (`qid`),
  CONSTRAINT `FK_eval_options` FOREIGN KEY (`qid`) REFERENCES `eval_qbank` (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

/*Data for the table `eval_options` */

insert  into `eval_options`(`oid`,`qid`,`q_option`,`q_option_match`,`score`) values (37,24,'<p>aaa</p>',NULL,1),(38,24,'<p>ggg</p>',NULL,0),(39,25,'<p>s</p>',NULL,0.5),(40,25,'<p>s</p>',NULL,0),(41,25,'<p>s</p>',NULL,0.5),(42,25,'<p>s</p>',NULL,0),(43,26,'A','B',0.25),(44,26,'C','D',0.25),(45,26,'E','F',0.25),(46,26,'G','H',0.25),(51,28,'C',NULL,0.5),(52,28,'12',NULL,0.5),(53,33,'',NULL,0.5),(54,33,'',NULL,0.5);

/*Table structure for table `eval_qbank` */

DROP TABLE IF EXISTS `eval_qbank`;

CREATE TABLE `eval_qbank` (
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
  KEY `FK_eval_qbank_subcat` (`scid`),
  CONSTRAINT `FK_eval_qbank_categ` FOREIGN KEY (`cid`) REFERENCES `eval_category` (`cid`),
  CONSTRAINT `FK_eval_qbank_level` FOREIGN KEY (`lid`) REFERENCES `eval_level` (`lid`),
  CONSTRAINT `FK_eval_qbank_subcat` FOREIGN KEY (`scid`) REFERENCES `eval_sub_category` (`scid`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

/*Data for the table `eval_qbank` */

insert  into `eval_qbank`(`qid`,`question_type`,`question`,`description`,`is_default_txt`,`default_txt`,`lid`,`cid`,`scid`,`pqid`,`no_time_served`,`no_time_corrected`,`no_time_incorrected`,`no_time_unattempted`) values (24,1,'<p>question</p>','<p>consigne</p>',0,'',2,2,5,1,0,0,0,0),(25,2,'<p>ssssss</p>','<p>sssss</p>',0,'',1,2,5,1,0,0,0,0),(26,3,'<p>s</p>','<p>s</p>',0,'',3,3,6,NULL,0,0,0,0),(28,4,'<p>kestion</p>','<p>tyty</p>',0,'',1,2,5,NULL,0,0,0,0),(29,5,'<p>TEXTE QUESTION</p>','<p>RESPONSE LIBRE</p>',0,'',3,3,6,NULL,0,0,0,0),(30,5,'<p>GGGGGGGGGGGG</p>','<p>GG</p>',1,'<p>TEXTE PAR DEFAUT DANS LE CHAMP REPONSE</p>',3,2,5,NULL,0,0,0,0),(31,6,'<p>PROBLEMES</p>','<p>EFFECTUEZ LES OPERATIONS</p>',0,'',2,3,6,NULL,0,0,0,0),(32,7,'<p>COMPLETER LE TABLEAU</p>','<p>TABLEAU A COMPLETER</p>',1,'<table style=\"width: 491px; height: 194px;\">\r\n<tbody>\r\n<tr style=\"height: 15px;\">\r\n<th style=\"height: 15px; width: 122.517px;\">JUSTE AVANT</th>\r\n<th style=\"height: 15px; width: 218.7px;\">LE NOMBRE</th>\r\n<th style=\"height: 15px; width: 127.783px;\">JUSTE APRES</th>\r\n</tr>\r\n<tr style=\"height: 21px;\">\r\n<td style=\"height: 21px; width: 122.517px;\">&nbsp;</td>\r\n<td style=\"height: 21px; width: 218.7px; text-align: center;\">&nbsp;315</td>\r\n<td style=\"height: 21px; width: 127.783px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 21px;\">\r\n<td style=\"height: 21px; width: 122.517px;\">&nbsp;</td>\r\n<td style=\"height: 21px; width: 218.7px; text-align: center;\">860</td>\r\n<td style=\"height: 21px; width: 127.783px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 21px;\">\r\n<td style=\"height: 21px; width: 122.517px;\">&nbsp;</td>\r\n<td style=\"height: 21px; width: 218.7px; text-align: center;\">1235</td>\r\n<td style=\"height: 21px; width: 127.783px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 21px;\">\r\n<td style=\"height: 21px; width: 122.517px;\">&nbsp;</td>\r\n<td style=\"height: 21px; width: 218.7px; text-align: center;\">2001</td>\r\n<td style=\"height: 21px; width: 127.783px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 21px;\">\r\n<td style=\"height: 21px; width: 122.517px;\">&nbsp;</td>\r\n<td style=\"height: 21px; width: 218.7px; text-align: center;\">5400</td>\r\n<td style=\"height: 21px; width: 127.783px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 21px;\">\r\n<td style=\"height: 21px; width: 122.517px;\">&nbsp;</td>\r\n<td style=\"height: 21px; width: 218.7px; text-align: center;\">1000</td>\r\n<td style=\"height: 21px; width: 127.783px;\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>',4,3,6,NULL,0,0,0,0),(33,8,'<p>question</p>\r\n<p>[a]</p>','<p>consigne</p>',0,'',1,2,5,2,0,0,0,0);

/*Table structure for table `eval_qbank_parent` */

DROP TABLE IF EXISTS `eval_qbank_parent`;

CREATE TABLE `eval_qbank_parent` (
  `pqid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  UNIQUE KEY `pqid` (`pqid`),
  KEY `FK_eval_qbank_parent_catg` (`cid`),
  CONSTRAINT `FK_eval_qbank_parent_catg` FOREIGN KEY (`cid`) REFERENCES `eval_category` (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `eval_qbank_parent` */

insert  into `eval_qbank_parent`(`pqid`,`cid`,`title`,`description`) values (1,2,'35 kilos d’espoir de Anna GAVALDA chez Bayard Jeunesse','<p>Je hais l&rsquo;&eacute;cole. Je la hais plus que tout au monde. Et m&ecirc;me plus que &ccedil;a encore&hellip; Elle me pourrit la vie.</p>\r\n<p>Jusqu&rsquo;&agrave; l&rsquo;&acirc;ge de trois ans, je peux dire que j&rsquo;ai &eacute;t&eacute; heureux. Je ne m&rsquo;en souviens plus vraiment, mais, &agrave; mon avis, &ccedil;a allait. Je jouais, je regardais ma cassette de <em>Petit Ours Brun</em> dix fois de suite, je dessinais et j&rsquo;inventais des milliards d&rsquo;aventures &agrave; Grodoudou, mon chien en peluche que j&rsquo;adorais. Ma m&egrave;re m&rsquo;a racont&eacute; que je restais des heures enti&egrave;res dans ma chambre &agrave; jacasser et &agrave; parler tout seul. J&rsquo;en conclus donc que j&rsquo;&eacute;tais heureux.</p>\r\n<p>A cette &eacute;poque de ma vie, j&rsquo;aimais tout le monde, et je croyais que tout le monde s&rsquo;aimait. Et puis, quand j&rsquo;ai eu trois ans et cinq mois, patatras&nbsp;! L&rsquo;&eacute;cole.</p>\r\n<p>Il para&icirc;t que, le matin, j&rsquo;y suis all&eacute; tr&egrave;s content. Mes parents avaient d&ucirc; me bassiner avec &ccedil;a pendant toutes les vacances&nbsp;: &laquo;&nbsp;Tu as de la chance mon ch&eacute;ri, tu vas aller &agrave; l&rsquo;&eacute;cole&hellip;&nbsp;&raquo; &laquo;&nbsp;Regarde ce beau cartable tout neuf&nbsp;! C&rsquo;est pour aller dans ta belle &eacute;cole&nbsp;!&nbsp;&raquo; Et gnagnagna&hellip; Il para&icirc;t que je n&rsquo;ai pas pleur&eacute;. (Je suis curieux, je pense que j&rsquo;avais envie de voir ce qu&rsquo;ils avaient comme jouets et comme Lego) il para&icirc;t que je suis revenu enchant&eacute; &agrave; l&rsquo;heure du d&eacute;jeuner, que j&rsquo;ai bien mang&eacute; et que je suis retourn&eacute; dans ma chambre raconter ma merveilleuse matin&eacute;e &agrave; Grodoudou.</p>\r\n<p>Eh bien, si j&rsquo;avais su, je les aurais savour&eacute;es, ces derni&egrave;res minutes de bonheur, parce que c&rsquo;est tout de suite apr&egrave;s que ma vie a d&eacute;raill&eacute;.</p>\r\n<ul>\r\n<li>On y retourne, a dit ma m&egrave;re.</li>\r\n<li>O&ugrave; &ccedil;a&nbsp;?</li>\r\n<li>Eh bien&hellip; A l&rsquo;&eacute;cole&nbsp;!</li>\r\n<li></li>\r\n<li>Non quoi&nbsp;?</li>\r\n<li>Je n&rsquo;irai plus.</li>\r\n<li>Ah bon&hellip; Et pourquoi&nbsp;?</li>\r\n<li>Parce que &ccedil;a y est, j&rsquo;ai vu comment c&rsquo;&eacute;tait, et &ccedil;a ne m&rsquo;int&eacute;resse pas. J&rsquo;ai plein de trucs &agrave; faire dans ma chambre. J&rsquo;ai dit &agrave; Grodoudou que j&rsquo;allais lui construire une machine sp&eacute;ciale pour l&rsquo;aider &agrave; retrouver tous les os qu&rsquo;il a enterr&eacute;s sous mon lit, alors je n&rsquo;ai plus le temps d&rsquo;y aller.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Ma m&egrave;re s&rsquo;est agenouill&eacute;e, et j&rsquo;ai secou&eacute; la t&ecirc;te. Elle a insist&eacute;, et je me suis mis &agrave; pleurer. Elle m&rsquo;a soulev&eacute;, et je me suis mis &agrave; hurler. Et elle m&rsquo;a donn&eacute; une claque.</p>\r\n<p>C&rsquo;&eacute;tait la premi&egrave;re de ma vie. Voil&agrave;. C&rsquo;&eacute;tait &ccedil;a, l&rsquo;&eacute;cole. C&rsquo;&eacute;tait le d&eacute;but du cauchemar.</p>'),(2,2,'test','<p>Je hais l’école. Je la hais plus que tout au monde. Et même plus que ça encore… Elle me pourrit la vie.</p>\r\n<p>Jusqu’à l’âge de trois ans, je peux dire que j’ai été heureux. Je ne m’en souviens plus vraiment, mais, à mon avis, ça allait. Je jouais, je regardais ma cassette de <em>Petit Ours Brun</em> dix fois de suite, je dessinais et j’inventais des milliards d’aventures à Grodoudou, mon chien en peluche que j’adorais. Ma mère m’a raconté que je restais des heures entières dans ma chambre à jacasser et à parler tout seul. J’en conclus donc que j’étais heureux.</p>\r\n<p>A cette époque de ma vie, j’aimais tout le monde, et je croyais que tout le monde s’aimait. Et puis, quand j’ai eu trois ans et cinq mois, patatras ! L’école.</p>\r\n<p>Il paraît que, le matin, j’y suis allé très content. Mes parents avaient dû me bassiner avec ça pendant toutes les vacances : « Tu as de la chance mon chéri, tu vas aller à l’école… » « Regarde ce beau cartable tout neuf ! C’est pour aller dans ta belle école ! » Et gnagnagna… Il paraît que je n’ai pas pleuré. (Je suis curieux, je pense que j’avais envie de voir ce qu’ils avaient comme jouets et comme Lego) il paraît que je suis revenu enchanté à l’heure du déjeuner, que j’ai bien mangé et que je suis retourné dans ma chambre raconter ma merveilleuse matinée à Grodoudou.</p>\r\n<p>Eh bien, si j’avais su, je les aurais savourées, ces dernières minutes de bonheur, parce que c’est tout de suite après que ma vie a déraillé.</p>\r\n<ul>\r\n<li>On y retourne, a dit ma mère.</li>\r\n<li>Où ça ?</li>\r\n<li>Eh bien… A l’école !</li>\r\n<li></li>\r\n<li>Non quoi ?</li>\r\n<li>Je n’irai plus.</li>\r\n<li>Ah bon… Et pourquoi ?</li>\r\n<li>Parce que ça y est, j’ai vu comment c’était, et ça ne m’intéresse pas. J’ai plein de trucs à faire dans ma chambre. J’ai dit à Grodoudou que j’allais lui construire une machine spéciale pour l’aider à retrouver tous les os qu’il a enterrés sous mon lit, alors je n’ai plus le temps d’y aller.</li>\r\n</ul>\r\n<p> </p>\r\n<p>Ma mère s’est agenouillée, et j’ai secoué la tête. Elle a insisté, et je me suis mis à pleurer. Elle m’a soulevé, et je me suis mis à hurler. Et elle m’a donné une claque.</p>\r\n<p>C’était la première de ma vie. Voilà. C’était ça, l’école. C’était le début du cauchemar.</p>');

/*Table structure for table `eval_qcl` */

DROP TABLE IF EXISTS `eval_qcl`;

CREATE TABLE `eval_qcl` (
  `qcl_id` int(11) NOT NULL AUTO_INCREMENT,
  `quid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `noq` int(11) NOT NULL,
  PRIMARY KEY (`qcl_id`),
  KEY `FK_eval_qcl` (`quid`),
  KEY `FK_eval_qcl_categ` (`cid`),
  KEY `FK_eval_qcl_level` (`lid`),
  CONSTRAINT `FK_eval_qcl` FOREIGN KEY (`quid`) REFERENCES `eval_quiz` (`quid`),
  CONSTRAINT `FK_eval_qcl_categ` FOREIGN KEY (`cid`) REFERENCES `eval_category` (`cid`),
  CONSTRAINT `FK_eval_qcl_level` FOREIGN KEY (`lid`) REFERENCES `eval_level` (`lid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `eval_qcl` */

/*Table structure for table `eval_quiz` */

DROP TABLE IF EXISTS `eval_quiz`;

CREATE TABLE `eval_quiz` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `eval_quiz` */

insert  into `eval_quiz`(`quid`,`quiz_name`,`description`,`start_date`,`end_date`,`gids`,`clids`,`qids`,`noq`,`correct_score`,`incorrect_score`,`ip_address`,`duration`,`maximum_attempts`,`pass_percentage`,`view_answer`,`camera_req`,`question_selection`,`gen_certificate`,`certificate_text`) values (4,'Evaluation niveau 1','<p>evaluation test</p>',1474029208,1505565208,'2','4,5','28,25,33',3,1,0,'',15,10,50,1,0,0,0,NULL);

/*Table structure for table `eval_result` */

DROP TABLE IF EXISTS `eval_result`;

CREATE TABLE `eval_result` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `quid` int(11) NOT NULL,
  `ssid` int(11) NOT NULL,
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
  KEY `FK_eval_result` (`ssid`),
  CONSTRAINT `FK_eval_result` FOREIGN KEY (`ssid`) REFERENCES `eval_student_sch` (`ssid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `eval_result` */

/*Table structure for table `eval_school_year` */

DROP TABLE IF EXISTS `eval_school_year`;

CREATE TABLE `eval_school_year` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `start_year` date NOT NULL,
  `end_year` date NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  UNIQUE KEY `sid` (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `eval_school_year` */

insert  into `eval_school_year`(`sid`,`start_year`,`end_year`,`active`) values (1,'2016-08-24','2017-07-07',1);

/*Table structure for table `eval_student` */

DROP TABLE IF EXISTS `eval_student`;

CREATE TABLE `eval_student` (
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
  KEY `FK_eval_users_group` (`gid`),
  CONSTRAINT `FK_eval_student_groupe` FOREIGN KEY (`gid`) REFERENCES `eval_group` (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `eval_student` */

insert  into `eval_student`(`stid`,`login`,`password`,`first_name`,`last_name`,`birth`,`contact_no`,`su`,`gid`,`subscription_expired`,`verify_code`,`qrcode`,`admin_id`,`etab_org`) values (7,'fgustavo1-022v','9dae835fe02c6dc5b5470a0ca2e7f7b0','FLEINK','GUSTAVO','2006-05-23','0639000000',0,2,1591660800,0,'fgustavo1-022v3d3af89ecd8ec827c0fac894364d5a93.png',1,1),(10,'nharitiniaina-186y','9dae835fe02c6dc5b5470a0ca2e7f7b0','nathalie','haritiniaina','2011-01-09',NULL,0,2,1568633608,0,'nharitiniaina-186yb612bef12f58d3e94a4f25ab0c69da19.png',1,6);

/*Table structure for table `eval_student_sch` */

DROP TABLE IF EXISTS `eval_student_sch`;

CREATE TABLE `eval_student_sch` (
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
  KEY `FK_eval_student_sch_school_year` (`sid`),
  CONSTRAINT `FK_eval_student_sch` FOREIGN KEY (`stid`) REFERENCES `eval_student` (`stid`),
  CONSTRAINT `FK_eval_student_sch_add` FOREIGN KEY (`add_uid`) REFERENCES `eval_users` (`uid`),
  CONSTRAINT `FK_eval_student_sch_cl` FOREIGN KEY (`clid`) REFERENCES `eval_class` (`clid`),
  CONSTRAINT `FK_eval_student_sch_edit` FOREIGN KEY (`edit_uid`) REFERENCES `eval_users` (`uid`),
  CONSTRAINT `FK_eval_student_sch_etab` FOREIGN KEY (`eid`) REFERENCES `eval_etab` (`eid`),
  CONSTRAINT `FK_eval_student_sch_school_year` FOREIGN KEY (`sid`) REFERENCES `eval_school_year` (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `eval_student_sch` */

insert  into `eval_student_sch`(`ssid`,`stid`,`add_uid`,`edit_uid`,`eid`,`clid`,`sid`,`date_add`,`date_upd`) values (4,7,1,1,1,5,1,'2016-09-06 13:53:55','2016-09-06 13:53:55'),(7,10,1,1,6,6,1,'2016-09-16 17:03:31','2016-09-16 17:03:31');

/*Table structure for table `eval_sub_category` */

DROP TABLE IF EXISTS `eval_sub_category`;

CREATE TABLE `eval_sub_category` (
  `scid` int(11) NOT NULL AUTO_INCREMENT,
  `sub_catg_name` varchar(255) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  PRIMARY KEY (`scid`),
  KEY `FK_eval_sub_category_sub` (`cid`),
  CONSTRAINT `FK_eval_sub_category_sub` FOREIGN KEY (`cid`) REFERENCES `eval_category` (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `eval_sub_category` */

insert  into `eval_sub_category`(`scid`,`sub_catg_name`,`cid`) values (5,'LECTURE',2),(6,'NOMBRES ET CALCULS',3);

/*Table structure for table `eval_users` */

DROP TABLE IF EXISTS `eval_users`;

CREATE TABLE `eval_users` (
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
  KEY `FK_eval_users_group` (`gid`),
  CONSTRAINT `FK_eval_users_etab_origine` FOREIGN KEY (`eid`) REFERENCES `eval_etab` (`eid`),
  CONSTRAINT `FK_eval_users_group` FOREIGN KEY (`gid`) REFERENCES `eval_group` (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `eval_users` */

insert  into `eval_users`(`uid`,`login`,`password`,`email`,`first_name`,`last_name`,`contact_no`,`gid`,`verify_code`,`su`,`admin_id`,`eid`,`date_add`,`date_upd`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','','Nathalie','HARITINIAINA','0269618838',1,0,1,1,1,'2016-07-22 00:00:00','2016-07-22 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
