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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `eval_category` */

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
  `class_name` varchar(50) NOT NULL,
  `cyid` int(11) NOT NULL,
  UNIQUE KEY `clid` (`clid`),
  KEY `FK_eval_class` (`cyid`),
  CONSTRAINT `FK_eval_class` FOREIGN KEY (`cyid`) REFERENCES `eval_cycle` (`cyid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `eval_class` */

insert  into `eval_class`(`clid`,`code`,`class_name`,`cyid`) values (1,'PS','Petite section de maternelle',1),(2,'MS','Moyenne section de maternelle',1),(3,'GS','Grande section de maternelle',1),(4,'CP','Cours préparatoire',2),(5,'CE1','Cours élémentaire 1re année',2),(6,'CE2','Cours élémentaire 2e année',3),(7,'CM1','Cours moyen niveau 1',3),(8,'CM2','Cours moyen niveau 2',3);

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
  CONSTRAINT `FK_eval_coef` FOREIGN KEY (`qid`) REFERENCES `eval_qbank` (`qid`),
  CONSTRAINT `FK_eval_coef_quiz` FOREIGN KEY (`quid`) REFERENCES `eval_quiz` (`quid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `eval_coef` */

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

insert  into `eval_group`(`gid`,`group_name`,`validate_for_days`) values (1,'Gestionnaire',0),(2,'Elèves',0);

/*Table structure for table `eval_level` */

DROP TABLE IF EXISTS `eval_level`;

CREATE TABLE `eval_level` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(1000) NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `eval_level` */

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `eval_options` */

/*Table structure for table `eval_qbank` */

DROP TABLE IF EXISTS `eval_qbank`;

CREATE TABLE `eval_qbank` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `question_type` varchar(100) NOT NULL DEFAULT 'Multiple Choice Single Answer',
  `question` text NOT NULL,
  `description` text NOT NULL,
  `is_default_txt` tinyint(4) NOT NULL,
  `default_txt` mediumtext NOT NULL,
  `lid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `no_time_served` int(11) NOT NULL DEFAULT '0',
  `no_time_corrected` int(11) NOT NULL DEFAULT '0',
  `no_time_incorrected` int(11) NOT NULL DEFAULT '0',
  `no_time_unattempted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`qid`),
  KEY `FK_eval_qbank_categ` (`cid`),
  KEY `FK_eval_qbank_level` (`lid`),
  CONSTRAINT `FK_eval_qbank_categ` FOREIGN KEY (`cid`) REFERENCES `eval_category` (`cid`),
  CONSTRAINT `FK_eval_qbank_level` FOREIGN KEY (`lid`) REFERENCES `eval_level` (`lid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `eval_qbank` */

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

/*Data for the table `eval_quiz` */

insert  into `eval_quiz`(`quid`,`quiz_name`,`description`,`start_date`,`end_date`,`qids`,`noq`,`correct_score`,`incorrect_score`,`ip_address`,`duration`,`maximum_attempts`,`pass_percentage`,`view_answer`,`camera_req`,`question_selection`,`gen_certificate`,`certificate_text`) values (1,'sequence N°01 FRANCAIS','TEXTE DESCRIPTION',1463718457,1525937257,'1,2',2,1,0,'',10,1,50,1,1,1,0,NULL);

/*Table structure for table `eval_result` */

DROP TABLE IF EXISTS `eval_result`;

CREATE TABLE `eval_result` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `quid` int(11) NOT NULL,
  `comid` int(11) NOT NULL,
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
  KEY `FK_eval_result_competences` (`comid`),
  CONSTRAINT `FK_eval_result` FOREIGN KEY (`ssid`) REFERENCES `eval_student_sch` (`ssid`),
  CONSTRAINT `FK_eval_result_competences` FOREIGN KEY (`comid`) REFERENCES `eval_competency` (`comid`)
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

/*Table structure for table `eval_student_sch` */

DROP TABLE IF EXISTS `eval_student_sch`;

CREATE TABLE `eval_student_sch` (
  `ssid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `add_uid` int(11) NOT NULL,
  `edit_uid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `clid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `date_add` datetime DEFAULT NULL,
  `date_upd` datetime DEFAULT NULL,
  UNIQUE KEY `ssid` (`ssid`),
  KEY `FK_eval_student_sch_cl` (`clid`),
  KEY `FK_eval_student_sch_user` (`uid`),
  KEY `FK_eval_student_sch_user_add` (`add_uid`),
  KEY `FK_eval_student_sch_edit_user` (`edit_uid`),
  KEY `FK_eval_student_sch_etab` (`eid`),
  KEY `FK_eval_student_sch_school_year` (`sid`),
  CONSTRAINT `FK_eval_student_sch_cl` FOREIGN KEY (`clid`) REFERENCES `eval_class` (`clid`),
  CONSTRAINT `FK_eval_student_sch_edit_user` FOREIGN KEY (`edit_uid`) REFERENCES `eval_users` (`uid`),
  CONSTRAINT `FK_eval_student_sch_etab` FOREIGN KEY (`eid`) REFERENCES `eval_etab` (`eid`),
  CONSTRAINT `FK_eval_student_sch_school_year` FOREIGN KEY (`sid`) REFERENCES `eval_school_year` (`sid`),
  CONSTRAINT `FK_eval_student_sch_user` FOREIGN KEY (`uid`) REFERENCES `eval_users` (`uid`),
  CONSTRAINT `FK_eval_student_sch_user_add` FOREIGN KEY (`add_uid`) REFERENCES `eval_users` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `eval_student_sch` */

/*Table structure for table `eval_users` */

DROP TABLE IF EXISTS `eval_users`;

CREATE TABLE `eval_users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `birth` date NOT NULL,
  `contact_no` varchar(1000) NOT NULL,
  `gid` int(11) DEFAULT NULL,
  `su` int(11) NOT NULL DEFAULT '0',
  `subscription_expired` int(11) NOT NULL DEFAULT '0',
  `verify_code` int(11) NOT NULL DEFAULT '0',
  `qrcode` varchar(255) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `etab_org` int(11) NOT NULL,
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  PRIMARY KEY (`uid`),
  KEY `FK_eval_users_etab_origine` (`etab_org`),
  CONSTRAINT `FK_eval_users_etab_origine` FOREIGN KEY (`etab_org`) REFERENCES `eval_etab` (`eid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `eval_users` */

insert  into `eval_users`(`uid`,`login`,`password`,`email`,`first_name`,`last_name`,`birth`,`contact_no`,`gid`,`su`,`subscription_expired`,`verify_code`,`qrcode`,`admin_id`,`etab_org`,`date_add`,`date_upd`) values (1,'admin','0cb7d8734ea65086bb4a65489eeb1d89','','Nathalie','HARITINIAINA','1992-08-08','0269618838',1,0,1111,0,NULL,1,1,'2016-07-22 00:00:00','2016-07-22 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
