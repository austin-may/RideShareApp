CREATE DATABASE  IF NOT EXISTS `rideshareapp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `rideshareapp`;

DROP TABLE IF EXISTS locations;
CREATE TABLE locations (
ComplexName varchar(255) NOT NULL);

CREATE TABLE Users (
  Username varchar(255) NOT NULL,
  Password varchar(255) NOT NULL
);
INSERT INTO `locations` VALUES ('111 South'),('Southern Pines');