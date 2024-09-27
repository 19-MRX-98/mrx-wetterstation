CREATE TABLE `abweichungen_2024` (
  `monat` varchar(50) NOT NULL,
  `monatsmitteltemperatur` varchar(45) DEFAULT NULL,
  `abweichung` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`monat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;