/*
Created: 4/14/2020
Modified: 4/14/2020
Model: Logical model
Database: MySQL 8.0
*/

-- Create tables section -------------------------------------------------

-- Table Account

CREATE TABLE `Account`
(
  `idAcc` Int NOT NULL AUTO_INCREMENT,
  `Email` Varchar(255) NOT NULL,
  `Password` Varchar(30) NOT NULL,
  `Name` Varchar(20) NOT NULL,
  `Type` Tinyint NOT NULL,
  PRIMARY KEY (`idAcc`),
  UNIQUE `Attribute1` (`idAcc`)
)
;

ALTER TABLE `Account` ADD UNIQUE `Email` (`Email`)
;

-- Table User

CREATE TABLE `User`
(
  `Attribute1` Int NOT NULL,
  `idLoc` Int
)
;

CREATE INDEX `IX_Relationship21` ON `User` (`idLoc`)
;

ALTER TABLE `User` ADD PRIMARY KEY (`Attribute1`)
;

-- Table Administrative

CREATE TABLE `Administrative`
(
  `Attribute1` Int NOT NULL,
  `isAdmin` Bool NOT NULL
)
;

ALTER TABLE `Administrative` ADD PRIMARY KEY (`Attribute1`)
;

-- Table ParkingLocation

CREATE TABLE `ParkingLocation`
(
  `idPar` Int NOT NULL AUTO_INCREMENT,
  `Type` Tinyint NOT NULL,
  `Attribute1` Int NOT NULL,
  `idLoc` Int NOT NULL,
  PRIMARY KEY (`idPar`),
  UNIQUE `idLoc` (`idPar`)
)
;

CREATE INDEX `IX_Relationship17` ON `ParkingLocation` (`Attribute1`)
;

CREATE INDEX `IX_Relationship20` ON `ParkingLocation` (`idLoc`)
;

-- Table Sensor

CREATE TABLE `Sensor`
(
  `idLoc` Int NOT NULL,
  `Free` Bool NOT NULL,
  `Zone` Varchar(20) NOT NULL,
  `Disabled` Bool NOT NULL
)
;

ALTER TABLE `Sensor` ADD PRIMARY KEY (`idLoc`)
;

-- Table Garage

CREATE TABLE `Garage`
(
  `idLoc` Int NOT NULL,
  `Free` Int NOT NULL
)
;

ALTER TABLE `Garage` ADD PRIMARY KEY (`idLoc`)
;

-- Table going_to

CREATE TABLE `going_to`
(
  `Attribute1` Int NOT NULL,
  `idLoc` Int NOT NULL
)
;

CREATE INDEX `IX_Relationship24` ON `going_to` (`idLoc`)
;

ALTER TABLE `going_to` ADD PRIMARY KEY (`Attribute1`)
;

-- Table Location

CREATE TABLE `Location`
(
  `x` Double NOT NULL,
  `y` Double NOT NULL,
  `idLoc` Int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idLoc`),
  UNIQUE `idLoc` (`idLoc`)
)
;

-- Create foreign keys (relationships) section -------------------------------------------------

ALTER TABLE `Sensor` ADD CONSTRAINT `R1` FOREIGN KEY (`idLoc`) REFERENCES `ParkingLocation` (`idPar`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `Garage` ADD CONSTRAINT `R2` FOREIGN KEY (`idLoc`) REFERENCES `ParkingLocation` (`idPar`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `ParkingLocation` ADD CONSTRAINT `R3` FOREIGN KEY (`Attribute1`) REFERENCES `Administrative` (`Attribute1`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `ParkingLocation` ADD CONSTRAINT `R4` FOREIGN KEY (`idLoc`) REFERENCES `Location` (`idLoc`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `User` ADD CONSTRAINT `R6` FOREIGN KEY (`idLoc`) REFERENCES `Location` (`idLoc`) ON DELETE SET NULL ON UPDATE CASCADE
;

ALTER TABLE `going_to` ADD CONSTRAINT `R5` FOREIGN KEY (`Attribute1`) REFERENCES `User` (`Attribute1`) ON DELETE CASCADE ON UPDATE CASCADE
;

ALTER TABLE `going_to` ADD CONSTRAINT `R7` FOREIGN KEY (`idLoc`) REFERENCES `Sensor` (`idLoc`) ON DELETE CASCADE ON UPDATE CASCADE
;


