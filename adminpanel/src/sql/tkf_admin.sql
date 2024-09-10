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


-- Exportiere Datenbank-Struktur für tkf_admin
CREATE DATABASE IF NOT EXISTS `tkf_admin` /*!40100 DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci */;
USE `tkf_admin`;

-- Exportiere Struktur von Ereignis tkf_admin.delete_old_logs
DELIMITER //
CREATE EVENT `delete_old_logs` ON SCHEDULE EVERY 5 DAY STARTS '2024-03-12 18:56:49' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    DELETE FROM tkf_admin.tkf_logs WHERE date < NOW() - INTERVAL 5 DAY;
END//
DELIMITER ;

-- Exportiere Struktur von Tabelle tkf_admin.tkf.constants
CREATE TABLE IF NOT EXISTS `tkf.constants` (
  `idtkf.constants` int(11) NOT NULL AUTO_INCREMENT,
  `tkf.const_name` varchar(45) NOT NULL,
  `tkf.const_sys_path` varchar(64) NOT NULL,
  PRIMARY KEY (`idtkf.constants`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle tkf_admin.tkf.infrastructure
CREATE TABLE IF NOT EXISTS `tkf.infrastructure` (
  `id_infrastructure` int(11) NOT NULL AUTO_INCREMENT,
  `ws_name` varchar(45) NOT NULL,
  `db_name` varchar(45) NOT NULL,
  `dbuser` varchar(45) NOT NULL,
  `dbport` int(11) NOT NULL,
  `dbpasswd` varchar(45) NOT NULL,
  `db_srv` varchar(45) NOT NULL,
  `webcache_on` tinyint(4) DEFAULT NULL,
  `webcache_server` varchar(45) DEFAULT NULL,
  `webcache_port` int(11) DEFAULT NULL,
  `import_gw_host` varchar(45) NOT NULL,
  `import_gw_port` int(11) NOT NULL,
  `import_gw_uid` varchar(45) NOT NULL,
  `module_airpressure_on` tinyint(4) NOT NULL,
  `module_uvmodule_on` tinyint(4) NOT NULL,
  `module_astronomical_data` tinyint(4) NOT NULL,
  `lat` varchar(45) DEFAULT NULL,
  `long` varchar(45) DEFAULT NULL,
  `msl` varchar(45) DEFAULT NULL,
  `date_default_timezone_set` varchar(45) NOT NULL,
  `current_year` varchar(45) NOT NULL,
  PRIMARY KEY (`id_infrastructure`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle tkf_admin.tkf_constants
CREATE TABLE IF NOT EXISTS `tkf_constants` (
  `idtkf.constants` int(11) NOT NULL AUTO_INCREMENT,
  `tkf.const_name` varchar(45) NOT NULL,
  `tkf.const_sys_path` varchar(64) NOT NULL,
  PRIMARY KEY (`idtkf.constants`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=DYNAMIC;

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle tkf_admin.tkf_containers
CREATE TABLE IF NOT EXISTS `tkf_containers` (
  `idtkf_containers` int(11) NOT NULL AUTO_INCREMENT,
  `tkf_containers_name` varchar(45) DEFAULT NULL,
  `tkf_containers_build` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtkf_containers`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle tkf_admin.tkf_dbc
CREATE TABLE IF NOT EXISTS `tkf_dbc` (
  `ID_dbc` int(11) NOT NULL,
  `idtkf_containers` int(11) NOT NULL,
  `tkf_containers_name` varchar(50) NOT NULL,
  `tkf_dbc_port` varchar(50) NOT NULL DEFAULT '',
  `tkf_dbc_host` varchar(50) NOT NULL,
  `tkf_dbc_user` varchar(50) DEFAULT NULL,
  `tkf_dbc_passwd` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_dbc`),
  KEY `idtkf_containers` (`idtkf_containers`),
  CONSTRAINT `idtkf_containers` FOREIGN KEY (`idtkf_containers`) REFERENCES `tkf_containers` (`idtkf_containers`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle tkf_admin.tkf_external
CREATE TABLE IF NOT EXISTS `tkf_external` (
  `idtkf.external` int(11) NOT NULL AUTO_INCREMENT,
  `tkf.external_updatesrv` varchar(45) NOT NULL,
  `tkf.external_update_path` varchar(45) NOT NULL,
  `tkf.external_update_auth_pw` varchar(45) DEFAULT NULL,
  `tkf.external_update_auth_usr` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtkf.external`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle tkf_admin.tkf_logs
CREATE TABLE IF NOT EXISTS `tkf_logs` (
  `machine` varchar(48) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Daten-Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle tkf_admin.tkf_release
CREATE TABLE IF NOT EXISTS `tkf_release` (
  `idtkf.release` int(11) NOT NULL,
  `tkf.release_date` varchar(45) NOT NULL,
  `tkf.release_version` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Daten-Export vom Benutzer nicht ausgewählt

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
