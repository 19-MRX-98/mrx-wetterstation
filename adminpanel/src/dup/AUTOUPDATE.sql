USE `wetterstation`;

-- Create logging table
CREATE TABLE IF NOT EXISTS `maintenance_log` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `operation` VARCHAR(255),
  `table_name` VARCHAR(255),
  `result` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Procedure for logging
DELIMITER //
CREATE PROCEDURE IF NOT EXISTS LogMaintenance(IN operation VARCHAR(255), IN table_name VARCHAR(255), IN result TEXT)
BEGIN
    INSERT INTO maintenance_log (operation, table_name, result) VALUES (operation, table_name, result);
END //
DELIMITER ;

-- Log the start of the maintenance process
CALL LogMaintenance('START DATABASE-UPDATE', 'ALL', 'Update process started');

-- Create tables for temperature deviations
CREATE TABLE IF NOT EXISTS `abweichungen_2022` (
  `monat` varchar(50) NOT NULL,
  `monatsmitteltemperatur` varchar(45) DEFAULT NULL,
  `abweichung` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`monat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
CALL LogMaintenance('CREATE TABLE', 'abweichungen_2022', 'Table created or already exists');

CREATE TABLE IF NOT EXISTS `abweichungen_2023` (
  `monat` varchar(50) NOT NULL,
  `monatsmitteltemperatur` varchar(45) DEFAULT NULL,
  `abweichung` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`monat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
CALL LogMaintenance('CREATE TABLE', 'abweichungen_2023', 'Table created or already exists');

CREATE TABLE IF NOT EXISTS `abweichungen_2024` (
  `monat` varchar(50) NOT NULL,
  `monatsmitteltemperatur` varchar(45) DEFAULT NULL,
  `abweichung` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`monat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
CALL LogMaintenance('CREATE TABLE', 'abweichungen_2024', 'Table created or already exists');

CREATE TABLE IF NOT EXISTS `abweichungen_act_year` (
  `monat` varchar(50) NOT NULL,
  `monatsmitteltemperatur` varchar(45) DEFAULT NULL,
  `abweichung` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`monat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
CALL LogMaintenance('CREATE TABLE', 'abweichungen_act_year', 'Table created or already exists');

-- Create table for air pressure with partitions
CREATE TABLE IF NOT EXISTS `airpressure2024` (
  `datetime` datetime DEFAULT NULL,
  `airpressure` decimal(64,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci
PARTITION BY RANGE (EXTRACT(MONTH FROM `datetime`)) (
    PARTITION p_airpressure_24_01 VALUES LESS THAN (2),
    PARTITION p_airpressure_24_02 VALUES LESS THAN (3),
    PARTITION p_airpressure_24_03 VALUES LESS THAN (4),
    PARTITION p_airpressure_24_04 VALUES LESS THAN (5),
    PARTITION p_airpressure_24_05 VALUES LESS THAN (6),
    PARTITION p_airpressure_24_06 VALUES LESS THAN (7),
    PARTITION p_airpressure_24_07 VALUES LESS THAN (8),
    PARTITION p_airpressure_24_08 VALUES LESS THAN (9),
    PARTITION p_airpressure_24_09 VALUES LESS THAN (10),
    PARTITION p_airpressure_24_10 VALUES LESS THAN (11),
    PARTITION p_airpressure_24_11 VALUES LESS THAN MAXVALUE
);
CALL LogMaintenance('CREATE TABLE', 'airpressure2024', 'Table created or already exists with partitions');

-- Create table for daily maximum values with partitions
CREATE TABLE IF NOT EXISTS `tageshöchstwerte24` (
  `Datum` date DEFAULT NULL,
  `Höchstwert` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci
PARTITION BY RANGE (EXTRACT(MONTH FROM `Datum`)) (
    PARTITION p_tageshöchstwerte24_01 VALUES LESS THAN (2),
    PARTITION p_tageshöchstwerte24_02 VALUES LESS THAN (3),
    PARTITION p_tageshöchstwerte24_03 VALUES LESS THAN (4),
    PARTITION p_tageshöchstwerte24_04 VALUES LESS THAN (5),
    PARTITION p_tageshöchstwerte24_05 VALUES LESS THAN (6),
    PARTITION p_tageshöchstwerte24_06 VALUES LESS THAN (7),
    PARTITION p_tageshöchstwerte24_07 VALUES LESS THAN (8),
    PARTITION p_tageshöchstwerte24_08 VALUES LESS THAN (9),
    PARTITION p_tageshöchstwerte24_09 VALUES LESS THAN (10),
    PARTITION p_tageshöchstwerte24_10 VALUES LESS THAN (11),
    PARTITION p_tageshöchstwerte24_11 VALUES LESS THAN MAXVALUE
);
CALL LogMaintenance('CREATE TABLE', 'tageshöchstwerte24', 'Table created or already exists with partitions');

-- Create tables for statistics
CREATE TABLE IF NOT EXISTS `stats_2024` (
  `parameter` varchar(50) DEFAULT NULL,
  `wert` int(11) DEFAULT NULL,
  `datum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CALL LogMaintenance('CREATE TABLE', 'stats_2024', 'Table created or already exists');

CREATE TABLE IF NOT EXISTS `stats_act_year` (
  `parameter` varchar(50) DEFAULT NULL,
  `wert` int(11) DEFAULT NULL,
  `datum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CALL LogMaintenance('CREATE TABLE', 'stats_act_year', 'Table created or already exists');

-- Create wetterdaten2024 table (assuming it's not created yet)
CREATE TABLE IF NOT EXISTS `wetterdaten2024` LIKE `wetterdaten01`;
CALL LogMaintenance('CREATE TABLE', 'wetterdaten2024', 'Table created or already exists');

-- Insert data into tables
INSERT INTO wetterdaten2024 SELECT * FROM wetterdaten01;
CALL LogMaintenance('INSERT DATA', 'wetterdaten2024', 'Data inserted from wetterdaten01');

INSERT INTO tageshöchstwerte24 SELECT * FROM tageshöchstwerte;
CALL LogMaintenance('INSERT DATA', 'tageshöchstwerte24', 'Data inserted from tageshöchstwerte');

INSERT INTO airpressure2024 SELECT * FROM airpressure;
CALL LogMaintenance('INSERT DATA', 'airpressure2024', 'Data inserted from airpressure');

INSERT INTO abweichungen_2024 SELECT * FROM abweichungen_act_year;
CALL LogMaintenance('INSERT DATA', 'abweichungen_2024', 'Data inserted from abweichungen_act_year');

-- Perform maintenance operations and log results
SET @tables = 'wetterdaten2024,tageshöchstwerte24,airpressure2024,abweichungen_2024';

-- CHECK TABLE
SET @query = CONCAT('CHECK TABLE ', @tables);
PREPARE stmt FROM @query;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
CALL LogMaintenance('CHECK TABLE', @tables, 'Completed');

-- REPAIR TABLE
SET @query = CONCAT('REPAIR TABLE ', @tables);
PREPARE stmt FROM @query;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
CALL LogMaintenance('REPAIR TABLE', @tables, 'Completed');

-- ANALYZE TABLE
SET @query = CONCAT('ANALYZE TABLE ', @tables);
PREPARE stmt FROM @query;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
CALL LogMaintenance('ANALYZE TABLE', @tables, 'Completed');

-- OPTIMIZE TABLE
SET @query = CONCAT('OPTIMIZE TABLE ', @tables);
PREPARE stmt FROM @query;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
CALL LogMaintenance('OPTIMIZE TABLE', @tables, 'Completed');

-- Count records in each table
SET @tables_list = 'wetterdaten2024,tageshöchstwerte24,airpressure2024,abweichungen_2024';
SET @sql = CONCAT('SELECT CONCAT(table_name, \': \', table_rows) AS result ',
                  'FROM information_schema.tables ',
                  'WHERE table_schema = DATABASE() ',
                  'AND table_name IN (\'', REPLACE(@tables_list, ',', '\',\''), '\')');

PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

CALL LogMaintenance('COUNT RECORDS', @tables_list, 'See separate results');

-- Log the end of the maintenance process
CALL LogMaintenance('END Database Update', 'ALL', 'Database Update process completed');

-- Display the log
SELECT * FROM maintenance_log ORDER BY timestamp DESC LIMIT 20;