/*
Created: 4/14/2020
Modified: 6/1/2020
Model: Logical model
Database: MySQL 8.0
*/

-- Create tables section -------------------------------------------------

-- Table Users

CREATE TABLE `Users`
(
  `idUser` Int NOT NULL AUTO_INCREMENT,
  `Email` Varchar(200) NOT NULL,
  `Password` Varchar(30) NOT NULL,
  `Name` Varchar(20) NOT NULL,
  `Type` Tinyint NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE `Attribute1` (`idUser`)
)
;

ALTER TABLE `Users` ADD UNIQUE `Email` (`Email`)
;

-- Table Client

CREATE TABLE `Client`
(
  `idAcc` Int NOT NULL,
  `idLoc` Int
)
;

CREATE INDEX `IX_Relationship21` ON `Client` (`idLoc`)
;

ALTER TABLE `Client` ADD PRIMARY KEY (`idAcc`)
;

-- Table Administrative

CREATE TABLE `Administrative`
(
  `idAcc` Int NOT NULL,
  `isAdmin` Tinyint(1) NOT NULL,
  `active` Char(20)
)
;

ALTER TABLE `Administrative` ADD PRIMARY KEY (`idAcc`)
;

-- Table ParkingLocation

CREATE TABLE `ParkingLocation`
(
  `idPar` Int NOT NULL AUTO_INCREMENT,
  `Type` Tinyint NOT NULL,
  `idLoc` Int NOT NULL,
  PRIMARY KEY (`idPar`),
  UNIQUE `idLoc` (`idPar`)
)
;

CREATE INDEX `IX_Relationship20` ON `ParkingLocation` (`idLoc`)
;

-- Table Sensor

CREATE TABLE `Sensor`
(
  `idLoc` Int NOT NULL,
  `Free` Tinyint(1) NOT NULL,
  `Zone` Varchar(20) NOT NULL,
  `Disabled` Tinyint(1) NOT NULL
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

ALTER TABLE `ParkingLocation` ADD CONSTRAINT `R4` FOREIGN KEY (`idLoc`) REFERENCES `Location` (`idLoc`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `Client` ADD CONSTRAINT `R6` FOREIGN KEY (`idLoc`) REFERENCES `Location` (`idLoc`) ON DELETE SET NULL ON UPDATE CASCADE
;


