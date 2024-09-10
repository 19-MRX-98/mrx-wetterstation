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

-- Exportiere Struktur von Tabelle wetterstation.wetterdaten2024
CREATE TABLE IF NOT EXISTS `wetterdaten2024` (
  `datetime` datetime DEFAULT NULL,
  `Temperatur` decimal(10,0) DEFAULT NULL,
  `Feuchte` varchar(255) DEFAULT NULL,
  `Windgesch` decimal(65,0) DEFAULT NULL,
  `Windboen` decimal(65,0) DEFAULT NULL,
  `Regen` decimal(65,0) DEFAULT NULL,
  `Wind` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci
 PARTITION BY RANGE (extract(month from `datetime`))
(PARTITION `p_wetterdaten_24_1` VALUES LESS THAN (2) ENGINE = InnoDB,
 PARTITION `p_wetterdaten_24_2` VALUES LESS THAN (3) ENGINE = InnoDB,
 PARTITION `p_wetterdaten_24_3` VALUES LESS THAN (4) ENGINE = InnoDB,
 PARTITION `p_wetterdaten_24_4` VALUES LESS THAN (5) ENGINE = InnoDB,
 PARTITION `p_wetterdaten_24_5` VALUES LESS THAN (6) ENGINE = InnoDB,
 PARTITION `p_wetterdaten_24_6` VALUES LESS THAN (7) ENGINE = InnoDB,
 PARTITION `p_wetterdaten_24_7` VALUES LESS THAN (8) ENGINE = InnoDB,
 PARTITION `p_wetterdaten_24_8` VALUES LESS THAN (9) ENGINE = InnoDB,
 PARTITION `p_wetterdaten_24_9` VALUES LESS THAN (10) ENGINE = InnoDB,
 PARTITION `p_wetterdaten_24_10` VALUES LESS THAN (11) ENGINE = InnoDB,
 PARTITION `p_wetterdaten_24_11` VALUES LESS THAN MAXVALUE ENGINE = InnoDB);

-- Daten-Export vom Benutzer nicht ausgewählt

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
