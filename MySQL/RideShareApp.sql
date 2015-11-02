CREATE DATABASE  IF NOT EXISTS `rideshareapp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `rideshareapp`;

DROP TABLE IF EXISTS locations;
CREATE TABLE locations (
ComplexName varchar(255) NOT NULL,
Username varchar(255) NOT NULL
);

DROP TABLE IF EXISTS users;
CREATE TABLE Users (
  Username varchar(255) NOT NULL,
  Password varchar(255) NOT NULL,
  FirstName varchar(255) NOT NULL,
  LastName varchar(255) NOT NULL
);
