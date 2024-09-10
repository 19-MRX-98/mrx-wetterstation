-- --------------------------------------------------------
-- Host:                         dev-srv01.riedel.lan
-- Server-Version:               11.3.2-MariaDB-1:11.3.2+maria~ubu2204 - mariadb.org binary distribution
-- Server-Betriebssystem:        debian-linux-gnu
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Exportiere Datenbank-Struktur für wetterstation
CREATE DATABASE IF NOT EXISTS `wetterstation` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `wetterstation`;

-- Exportiere Struktur von Tabelle wetterstation.airpressure
CREATE TABLE IF NOT EXISTS `airpressure` (
  `datetime` datetime(6) NOT NULL,
  `airpressure` decimal(64,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci
 PARTITION BY RANGE (extract(month from `datetime`))
(PARTITION `p_airpressure_2023_01` VALUES LESS THAN (2) ENGINE = InnoDB,
 PARTITION `p_airpressure_2023_02` VALUES LESS THAN (3) ENGINE = InnoDB,
 PARTITION `p_airpressure_2023_03` VALUES LESS THAN (4) ENGINE = InnoDB,
 PARTITION `p_airpressure_2023_04` VALUES LESS THAN (5) ENGINE = InnoDB,
 PARTITION `p_airpressure_2023_05` VALUES LESS THAN (6) ENGINE = InnoDB,
 PARTITION `p_airpressure_2023_06` VALUES LESS THAN (7) ENGINE = InnoDB,
 PARTITION `p_airpressure_2023_07` VALUES LESS THAN (8) ENGINE = InnoDB,
 PARTITION `p_airpressure_2023_08` VALUES LESS THAN (9) ENGINE = InnoDB,
 PARTITION `p_airpressure_2023_09` VALUES LESS THAN (10) ENGINE = InnoDB,
 PARTITION `p_airpressure_2023_10` VALUES LESS THAN (11) ENGINE = InnoDB,
 PARTITION `p_airpressure_2023_11` VALUES LESS THAN MAXVALUE ENGINE = InnoDB);

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.airpressure2022
CREATE TABLE IF NOT EXISTS `airpressure2022` (
  `datetime` datetime DEFAULT NULL,
  `airpressure` decimal(64,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.airpressure2023
CREATE TABLE IF NOT EXISTS `airpressure2023` (
  `datetime` datetime DEFAULT NULL,
  `airpressure` decimal(64,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci
 PARTITION BY RANGE (extract(month from `datetime`))
(PARTITION `p_airpressure_23_01` VALUES LESS THAN (2) ENGINE = InnoDB,
 PARTITION `p_airpressure_23_02` VALUES LESS THAN (3) ENGINE = InnoDB,
 PARTITION `p_airpressure_23_03` VALUES LESS THAN (4) ENGINE = InnoDB,
 PARTITION `p_airpressure_23_04` VALUES LESS THAN (5) ENGINE = InnoDB,
 PARTITION `p_airpressure_23_05` VALUES LESS THAN (6) ENGINE = InnoDB,
 PARTITION `p_airpressure_23_06` VALUES LESS THAN (7) ENGINE = InnoDB,
 PARTITION `p_airpressure_23_07` VALUES LESS THAN (8) ENGINE = InnoDB,
 PARTITION `p_airpressure_23_08` VALUES LESS THAN (9) ENGINE = InnoDB,
 PARTITION `p_airpressure_23_09` VALUES LESS THAN (10) ENGINE = InnoDB,
 PARTITION `p_airpressure_23_10` VALUES LESS THAN (11) ENGINE = InnoDB,
 PARTITION `p_airpressure_23_11` VALUES LESS THAN MAXVALUE ENGINE = InnoDB);

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.heissetage2022
CREATE TABLE IF NOT EXISTS `heissetage2022` (
  `Datum` date DEFAULT NULL,
  `MaxTemp` decimal(65,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.jahresmittel_1991_2020
CREATE TABLE IF NOT EXISTS `jahresmittel_1991_2020` (
  `Name_Station` text DEFAULT NULL,
  `Stations_ID` int(11) DEFAULT NULL,
  `HoeheNN` double DEFAULT NULL,
  `Breite` text DEFAULT NULL,
  `Laenge` text DEFAULT NULL,
  `Bundesland` text DEFAULT NULL,
  `January` double DEFAULT NULL,
  `February` double DEFAULT NULL,
  `March` double DEFAULT NULL,
  `April` double DEFAULT NULL,
  `May` double DEFAULT NULL,
  `June` double DEFAULT NULL,
  `July` double DEFAULT NULL,
  `August` double DEFAULT NULL,
  `September` double DEFAULT NULL,
  `October` double DEFAULT NULL,
  `November` double DEFAULT NULL,
  `December` double DEFAULT NULL,
  `Jahr` double DEFAULT NULL,
  `selected` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.jahresmittel_1991_2020_niederschlag
CREATE TABLE IF NOT EXISTS `jahresmittel_1991_2020_niederschlag` (
  `Name der Station` text DEFAULT NULL,
  `Stations_ID` int(11) DEFAULT NULL,
  `Höhe ü. NN` int(11) DEFAULT NULL,
  `Breite` text DEFAULT NULL,
  `Länge` text DEFAULT NULL,
  `Bundesland` text DEFAULT NULL,
  `Jan` text DEFAULT NULL,
  `Feb` text DEFAULT NULL,
  `Mrz` text DEFAULT NULL,
  `Apr` text DEFAULT NULL,
  `Mai` text DEFAULT NULL,
  `Jun` text DEFAULT NULL,
  `Jul` text DEFAULT NULL,
  `Aug` text DEFAULT NULL,
  `Sep` text DEFAULT NULL,
  `Okt` text DEFAULT NULL,
  `Nov` text DEFAULT NULL,
  `Dez` text DEFAULT NULL,
  `Jahr` text DEFAULT NULL,
  `selected` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.pma__bookmark
CREATE TABLE IF NOT EXISTS `pma__bookmark` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) NOT NULL DEFAULT '',
  `query` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci COMMENT='Bookmarks';

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.pma__central_columns
CREATE TABLE IF NOT EXISTS `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL,
  PRIMARY KEY (`db_name`,`col_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci COMMENT='Central list of columns';

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.pma__column_info
CREATE TABLE IF NOT EXISTS `pma__column_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) NOT NULL DEFAULT '',
  `mimetype` varchar(255) NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci COMMENT='Column information for phpMyAdmin';

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.pma__designer_settings
CREATE TABLE IF NOT EXISTS `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci COMMENT='Settings related to Designer';

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.pma__export_templates
CREATE TABLE IF NOT EXISTS `pma__export_templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci COMMENT='Saved export templates';

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.pma__favorite
CREATE TABLE IF NOT EXISTS `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci COMMENT='Favorite tables';

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.pma__history
CREATE TABLE IF NOT EXISTS `pma__history` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`db`,`table`,`timevalue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci COMMENT='SQL history for phpMyAdmin';

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.pma__navigationhiding
CREATE TABLE IF NOT EXISTS `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci COMMENT='Hidden items of navigation tree';

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.pma__pdf_pages
CREATE TABLE IF NOT EXISTS `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_descr` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`page_nr`),
  KEY `db_name` (`db_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci COMMENT='PDF relation pages for phpMyAdmin';

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.pma__recent
CREATE TABLE IF NOT EXISTS `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci COMMENT='Recently accessed tables';

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.pma__relation
CREATE TABLE IF NOT EXISTS `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  KEY `foreign_field` (`foreign_db`,`foreign_table`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci COMMENT='Relation table';

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.pma__savedsearches
CREATE TABLE IF NOT EXISTS `pma__savedsearches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci COMMENT='Saved searches';

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.pma__table_coords
CREATE TABLE IF NOT EXISTS `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float unsigned NOT NULL DEFAULT 0,
  `y` float unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci COMMENT='Table coordinates for phpMyAdmin PDF output';

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.pma__table_info
CREATE TABLE IF NOT EXISTS `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci COMMENT='Table information for phpMyAdmin';

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.pma__table_uiprefs
CREATE TABLE IF NOT EXISTS `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`username`,`db_name`,`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci COMMENT='Tables'' UI preferences';

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.pma__tracking
CREATE TABLE IF NOT EXISTS `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(10) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`db_name`,`table_name`,`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci COMMENT='Database changes tracking for phpMyAdmin';

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.pma__userconfig
CREATE TABLE IF NOT EXISTS `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci COMMENT='User preferences storage for phpMyAdmin';

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.pma__usergroups
CREATE TABLE IF NOT EXISTS `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`usergroup`,`tab`,`allowed`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci COMMENT='User groups with configured menu items';

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.pma__users
CREATE TABLE IF NOT EXISTS `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL,
  PRIMARY KEY (`username`,`usergroup`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci COMMENT='Users and their assignments to user groups';

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.regensummen_22
CREATE TABLE IF NOT EXISTS `regensummen_22` (
  `DB_ID` int(11) NOT NULL AUTO_INCREMENT,
  `monthnr` int(11) DEFAULT NULL,
  `max_regen` int(11) DEFAULT NULL,
  `min_regen` int(11) DEFAULT NULL,
  `updatetime` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`DB_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.regensummen_23
CREATE TABLE IF NOT EXISTS `regensummen_23` (
  `DB_ID` int(11) NOT NULL AUTO_INCREMENT,
  `monthnr` int(11) DEFAULT NULL,
  `max_regen` int(11) DEFAULT NULL,
  `min_regen` int(11) DEFAULT NULL,
  `updatetime` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`DB_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.seasonreport_texts
CREATE TABLE IF NOT EXISTS `seasonreport_texts` (
  `TextID` int(11) NOT NULL,
  `Text` text DEFAULT NULL,
  `Version` int(11) DEFAULT NULL,
  `Text_identifier` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`TextID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.server
CREATE TABLE IF NOT EXISTS `server` (
  `serverid` int(11) NOT NULL,
  `serverjob` varchar(45) DEFAULT NULL,
  `ipaddr` varchar(45) DEFAULT NULL,
  `db_srv` varchar(45) DEFAULT NULL,
  `srv_http_prt` int(11) DEFAULT NULL,
  `srv_https_prt` int(11) DEFAULT NULL,
  `srv_maint_prt` varchar(45) DEFAULT NULL,
  `srv_ftp_prt` varchar(45) DEFAULT NULL,
  `srv_fqdn` varchar(45) DEFAULT NULL,
  `is_comsrv` tinyint(4) DEFAULT NULL,
  `is_dbsrv` tinyint(4) DEFAULT NULL,
  `is_websrv` tinyint(4) DEFAULT NULL,
  `is_ftpsrv` varchar(45) DEFAULT NULL,
  `srv_os` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`serverid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.tageshöchstwerte
CREATE TABLE IF NOT EXISTS `tageshöchstwerte` (
  `Datum` date DEFAULT NULL,
  `Höchstwert` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci
 PARTITION BY RANGE (extract(month from `Datum`))
(PARTITION `p_tageshöchstwerte_01` VALUES LESS THAN (2) ENGINE = InnoDB,
 PARTITION `p_tageshöchstwerte_02` VALUES LESS THAN (3) ENGINE = InnoDB,
 PARTITION `p_tageshöchstwerte_03` VALUES LESS THAN (4) ENGINE = InnoDB,
 PARTITION `p_tageshöchstwerte_04` VALUES LESS THAN (5) ENGINE = InnoDB,
 PARTITION `p_tageshöchstwerte_05` VALUES LESS THAN (6) ENGINE = InnoDB,
 PARTITION `p_tageshöchstwerte_06` VALUES LESS THAN (7) ENGINE = InnoDB,
 PARTITION `p_tageshöchstwerte_07` VALUES LESS THAN (8) ENGINE = InnoDB,
 PARTITION `p_tageshöchstwerte_08` VALUES LESS THAN (9) ENGINE = InnoDB,
 PARTITION `p_tageshöchstwerte_09` VALUES LESS THAN (10) ENGINE = InnoDB,
 PARTITION `p_tageshöchstwerte_10` VALUES LESS THAN (11) ENGINE = InnoDB,
 PARTITION `p_tageshöchstwerte_11` VALUES LESS THAN MAXVALUE ENGINE = InnoDB);

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.tageshöchstwerte23
CREATE TABLE IF NOT EXISTS `tageshöchstwerte23` (
  `Datum` date DEFAULT NULL,
  `Höchstwert` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci
 PARTITION BY RANGE (extract(month from `Datum`))
(PARTITION `p_tageshöchstwerte23_01` VALUES LESS THAN (2) ENGINE = InnoDB,
 PARTITION `p_tageshöchstwerte23_02` VALUES LESS THAN (3) ENGINE = InnoDB,
 PARTITION `p_tageshöchstwerte23_03` VALUES LESS THAN (4) ENGINE = InnoDB,
 PARTITION `p_tageshöchstwerte23_04` VALUES LESS THAN (5) ENGINE = InnoDB,
 PARTITION `p_tageshöchstwerte23_05` VALUES LESS THAN (6) ENGINE = InnoDB,
 PARTITION `p_tageshöchstwerte23_06` VALUES LESS THAN (7) ENGINE = InnoDB,
 PARTITION `p_tageshöchstwerte23_07` VALUES LESS THAN (8) ENGINE = InnoDB,
 PARTITION `p_tageshöchstwerte23_08` VALUES LESS THAN (9) ENGINE = InnoDB,
 PARTITION `p_tageshöchstwerte23_09` VALUES LESS THAN (10) ENGINE = InnoDB,
 PARTITION `p_tageshöchstwerte23_10` VALUES LESS THAN (11) ENGINE = InnoDB,
 PARTITION `p_tageshöchstwerte23_11` VALUES LESS THAN MAXVALUE ENGINE = InnoDB);

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Ereignis wetterstation.update_monatsmittel
DELIMITER //
CREATE EVENT `update_monatsmittel` ON SCHEDULE EVERY 1 DAY STARTS '2024-01-24 20:43:46' ON COMPLETION NOT PRESERVE ENABLE DO CALL update_monatsmittel()//
DELIMITER ;

-- Exportiere Struktur von Prozedur wetterstation.update_monatsmitteltemperatur
DELIMITER //
CREATE PROCEDURE `update_monatsmitteltemperatur`()
BEGIN
    
    DROP VIEW IF EXISTS view_update_monatsmittel;

    
	CREATE VIEW view_update_monatsmittel AS
	SELECT MONTHNAME(datetime) AS monat, AVG(temperatur)/10 AS monatsmitteltemperatur
	FROM wetterdaten01
	GROUP BY MONTH(datetime);
END//
DELIMITER ;

-- Exportiere Struktur von Tabelle wetterstation.uvstrahlung
CREATE TABLE IF NOT EXISTS `uvstrahlung` (
  `ID` int(11) NOT NULL,
  `UVA` int(11) NOT NULL,
  `UVB` int(11) NOT NULL,
  `UVI` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von View wetterstation.view_gruenlandtemp_FEB
-- Erstelle temporäre Tabelle, um View-Abhängigkeiten zuvorzukommen
CREATE TABLE `view_gruenlandtemp_FEB` (
	`gruenlandtemperatursumme` DECIMAL(65,10) NULL
) ENGINE=MyISAM;

-- Exportiere Struktur von View wetterstation.view_gruenlandtemp_JAN
-- Erstelle temporäre Tabelle, um View-Abhängigkeiten zuvorzukommen
CREATE TABLE `view_gruenlandtemp_JAN` (
	`gruenlandtemperatursumme` DECIMAL(65,9) NULL
) ENGINE=MyISAM;

-- Exportiere Struktur von View wetterstation.view_gruenlandtemp_MRZ
-- Erstelle temporäre Tabelle, um View-Abhängigkeiten zuvorzukommen
CREATE TABLE `view_gruenlandtemp_MRZ` (
	`gruenlandtemperatursumme` DECIMAL(65,8) NULL
) ENGINE=MyISAM;

-- Exportiere Struktur von View wetterstation.view_update_monatsmittel
-- Erstelle temporäre Tabelle, um View-Abhängigkeiten zuvorzukommen
CREATE TABLE `view_update_monatsmittel` (
	`monat` VARCHAR(9) NULL COLLATE 'utf8mb4_general_ci',
	`monatsmitteltemperatur` DECIMAL(65,8) NULL
) ENGINE=MyISAM;

-- Exportiere Struktur von Tabelle wetterstation.warmetage2022
CREATE TABLE IF NOT EXISTS `warmetage2022` (
  `Datum` date DEFAULT NULL,
  `MaxTemp` decimal(65,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.wetterdaten01
CREATE TABLE IF NOT EXISTS `wetterdaten01` (
  `datetime` datetime(6) NOT NULL,
  `Temperatur` decimal(65,0) NOT NULL,
  `Feuchte` varchar(255) NOT NULL,
  `Windgesch` decimal(65,0) NOT NULL,
  `Windboen` decimal(65,0) NOT NULL,
  `Regen` decimal(65,0) NOT NULL,
  `Wind` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci
 PARTITION BY RANGE (extract(month from `datetime`))
(PARTITION `p_wetterdaten_act_01` VALUES LESS THAN (2) ENGINE = MyISAM,
 PARTITION `p_wetterdaten_act_02` VALUES LESS THAN (3) ENGINE = MyISAM,
 PARTITION `p_wetterdaten_act_03` VALUES LESS THAN (4) ENGINE = MyISAM,
 PARTITION `p_wetterdaten_act_04` VALUES LESS THAN (5) ENGINE = MyISAM,
 PARTITION `p_wetterdaten_act_05` VALUES LESS THAN (6) ENGINE = MyISAM,
 PARTITION `p_wetterdaten_act_06` VALUES LESS THAN (7) ENGINE = MyISAM,
 PARTITION `p_wetterdaten_act_07` VALUES LESS THAN (8) ENGINE = MyISAM,
 PARTITION `p_wetterdaten_act_08` VALUES LESS THAN (9) ENGINE = MyISAM,
 PARTITION `p_wetterdaten_act_09` VALUES LESS THAN (10) ENGINE = MyISAM,
 PARTITION `p_wetterdaten_act_10` VALUES LESS THAN (11) ENGINE = MyISAM,
 PARTITION `p_wetterdaten_act_11` VALUES LESS THAN (12) ENGINE = MyISAM,
 PARTITION `p_wetterdaten_act_12` VALUES LESS THAN MAXVALUE ENGINE = MyISAM);

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.wetterdaten2022
CREATE TABLE IF NOT EXISTS `wetterdaten2022` (
  `datetime` datetime DEFAULT NULL,
  `Temperatur` decimal(10,0) DEFAULT NULL,
  `Feuchte` varchar(255) DEFAULT NULL,
  `Windgesch` decimal(65,0) DEFAULT NULL,
  `Windboen` decimal(65,0) DEFAULT NULL,
  `Regen` decimal(65,0) DEFAULT NULL,
  `Wind` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.wetterdaten2023
CREATE TABLE IF NOT EXISTS `wetterdaten2023` (
  `datetime` datetime DEFAULT NULL,
  `Temperatur` decimal(10,0) DEFAULT NULL,
  `Feuchte` varchar(255) DEFAULT NULL,
  `Windgesch` decimal(65,0) DEFAULT NULL,
  `Windboen` decimal(65,0) DEFAULT NULL,
  `Regen` decimal(65,0) DEFAULT NULL,
  `Wind` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci
 PARTITION BY RANGE (extract(month from `datetime`))
(PARTITION `p_wetterdaten_23_1` VALUES LESS THAN (2) ENGINE = InnoDB,
 PARTITION `p_wetterdaten_23_2` VALUES LESS THAN (3) ENGINE = InnoDB,
 PARTITION `p_wetterdaten_23_3` VALUES LESS THAN (4) ENGINE = InnoDB,
 PARTITION `p_wetterdaten_23_4` VALUES LESS THAN (5) ENGINE = InnoDB,
 PARTITION `p_wetterdaten_23_5` VALUES LESS THAN (6) ENGINE = InnoDB,
 PARTITION `p_wetterdaten_23_6` VALUES LESS THAN (7) ENGINE = InnoDB,
 PARTITION `p_wetterdaten_23_7` VALUES LESS THAN (8) ENGINE = InnoDB,
 PARTITION `p_wetterdaten_23_8` VALUES LESS THAN (9) ENGINE = InnoDB,
 PARTITION `p_wetterdaten_23_9` VALUES LESS THAN (10) ENGINE = InnoDB,
 PARTITION `p_wetterdaten_23_10` VALUES LESS THAN (11) ENGINE = InnoDB,
 PARTITION `p_wetterdaten_23_11` VALUES LESS THAN MAXVALUE ENGINE = InnoDB);

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle wetterstation.wuestentage2022
CREATE TABLE IF NOT EXISTS `wuestentage2022` (
  `Datum` date DEFAULT NULL,
  `MaxTemp` decimal(65,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Daten-Export vom Benutzer nicht ausgewählt

-- Entferne temporäre Tabelle und erstelle die eigentliche View
DROP TABLE IF EXISTS `view_gruenlandtemp_FEB`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_gruenlandtemp_FEB` AS select avg(`wetterdaten01`.`Temperatur`) / 10 * 0.75 AS `gruenlandtemperatursumme` from `wetterdaten01` where monthname(`wetterdaten01`.`datetime`) = 'february' and `wetterdaten01`.`Temperatur` > 0 group by cast(`wetterdaten01`.`datetime` as date);

-- Entferne temporäre Tabelle und erstelle die eigentliche View
DROP TABLE IF EXISTS `view_gruenlandtemp_JAN`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_gruenlandtemp_JAN` AS select avg(`wetterdaten01`.`Temperatur`) / 10 * 0.5 AS `gruenlandtemperatursumme` from `wetterdaten01` where monthname(`wetterdaten01`.`datetime`) = 'january' and `wetterdaten01`.`Temperatur` > 0 group by cast(`wetterdaten01`.`datetime` as date);

-- Entferne temporäre Tabelle und erstelle die eigentliche View
DROP TABLE IF EXISTS `view_gruenlandtemp_MRZ`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_gruenlandtemp_MRZ` AS select avg(`wetterdaten01`.`Temperatur`) / 10 * 1 AS `gruenlandtemperatursumme` from `wetterdaten01` where monthname(`wetterdaten01`.`datetime`) = 'march' and `wetterdaten01`.`Temperatur` > 0 group by cast(`wetterdaten01`.`datetime` as date);

-- Entferne temporäre Tabelle und erstelle die eigentliche View
DROP TABLE IF EXISTS `view_update_monatsmittel`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_update_monatsmittel` AS select monthname(`wetterdaten01`.`datetime`) AS `monat`,avg(`wetterdaten01`.`Temperatur`) / 10 AS `monatsmitteltemperatur` from `wetterdaten01` group by month(`wetterdaten01`.`datetime`);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
