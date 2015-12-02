CREATE DATABASE  IF NOT EXISTS `rideshareapp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `rideshareapp`;

DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `PickUps`;
DROP TABLE IF EXISTS `User`;
DROP TABLE IF EXISTS `Log_in`;
DROP TABLE IF EXISTS `Locations`;
DROP TABLE IF EXISTS `LocationTypes`;
		
CREATE TABLE `Log_in` (
  `UserName` VARCHAR(255) NOT NULL,
  `Password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`UserName`)
);

CREATE TABLE `User` (
  `UserName` VARCHAR(255) NOT NULL,
  `FirstName` VARCHAR(255) NOT NULL,
  `LastName` VARCHAR(255) NOT NULL,
  `PickedUp` bool NULL,
  PRIMARY KEY (`UserName`)
);
		
CREATE TABLE `LocationTypes` (
  `LocationType` VARCHAR(255) NOT NULL,
  `LocationColor` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`LocationType`)
);
		
CREATE TABLE `Locations` (
  `LocationName` VARCHAR(255) NOT NULL,
  `LocationType` VARCHAR(255) NOT NULL,
  `Address` VARCHAR(255) NOT NULL,
  `Latitude` VARCHAR(255) NOT NULL,
  `Longitude` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`LocationName`)
);
		
CREATE TABLE `PickUps` (
  `UserName` VARCHAR(255) NOT NULL,
  `LocationName` VARCHAR(255) NOT NULL,
  `Date` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`UserName`, `LocationName`)
);

ALTER TABLE `Locations` ADD FOREIGN KEY (LocationType) REFERENCES `LocationTypes` (`LocationType`);
ALTER TABLE `User` ADD FOREIGN KEY (UserName) REFERENCES `Log_in` (`UserName`);
ALTER TABLE `PickUps` ADD FOREIGN KEY (UserName) REFERENCES `User` (`UserName`);
ALTER TABLE `PickUps` ADD FOREIGN KEY (LocationName) REFERENCES `Locations` (`LocationName`);

INSERT INTO `Log_in` (`UserName`,`Password`) VALUES
('atrushb','herpderp');

INSERT INTO `User` (`UserName`,`FirstName`,`LastName`) VALUES
('atrushb','michael','ball');

INSERT INTO `Log_in` (`UserName`,`Password`) VALUES
('bubblebuddy','waffles');

INSERT INTO `User` (`UserName`,`FirstName`,`LastName`) VALUES
('bubblebuddy','sponge','bob');

INSERT INTO LocationTypes (LocationType, LocationColor) VALUES ("OnCampusHousing", "99ff99");
INSERT INTO LocationTypes (LocationType, LocationColor) VALUES ("OnCampusNonHousing", "009933");
INSERT INTO LocationTypes (LocationType, LocationColor) VALUES ("OffCampusHousing", "ff9999");

INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Centennial Place", "OnCampusHousing", "30458, 98 Georgia Ave, Statesboro, GA 30460, United States", "32.42321", "-81.78048");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Eagle Village", "OnCampusHousing", "Eagle Village, Statesboro, GA 30458, United States", "32.42037", "-81.7781");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Freedom's Landing", "OnCampusHousing", "211 Lanier Dr, Statesboro, GA 30458, United States", "32.40948", "-81.78382");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Kennedy Hall", "OnCampusHousing", "191 Knight Dr, Statesboro, GA 30458, United States", "32.41887", "-81.77858");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Russell Union", "OnCampusNonHousing", "Russell Union, 85 Georgia Ave, Statesboro, GA 30458, United States", "32.42495", "-81.77973");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Southern Courtyard", "OnCampusHousing", "Southern Courtyard, Statesboro, GA 30458, United States", "32.4168", "-81.78069");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Southern Pines", "OnCampusHousing", "Southern Pines, Statesboro, GA 30458, United States", "32.41726", "-81.78451");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("University Villas", "OnCampusHousing", "University Villas, Statesboro, GA 30458, United States", "32.41892", "-81.78173");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Watson Hall", "OnCampusHousing", "Watson Hall Commons, Statesboro, GA 30458, United States", "32.42181", "-81.78233");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("IT Building", "OnCampusNonHousing", "Information Technology Building, Statesboro, GA 30458, United States", "32.42327", "-81.78647");


INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("111 South Apartments", "OffCampusHousing", "111 Rucker Ln, Statesboro, GA 30458, United States", "32.4259818", "-81.7935383");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Aspen Heights Statesboro", "OffCampusHousing", "17358 GA-67 #100, Statesboro, GA 30458, United States", "32.401364", "-81.7579530");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Cambridge at Southern", "OffCampusHousing", "130 Lanier Dr, Statesboro, GA 30458, United States", "32.4141068", "-81.7789642");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Campus Club Apartments", "OffCampusHousing", "211 Lanier Dr, Statesboro, GA 30458, United States", "32.4134953", "-81.7818281");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Campus Crossings at Statesboro", "OffCampusHousing", "133 Lanier Dr, Statesboro, GA 30458, United States", "32.414945", "-81.7814230");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Campus Evolution Villages - Statesboro", "OffCampusHousing", "1699 Statesboro Pl Cir, Statesboro, GA 30458, United States", "32.4101841", "-81.7762072");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Caribe Court Condos", "OffCampusHousing", "210 Caribe Ct, Statesboro, GA 30458, United States", "32.424891", "-81.795186");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("College Walk Apartments", "OffCampusHousing", "210 Lanier Dr, Statesboro, GA 30458, United States", "32.4098133", "-81.7806015");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Copper Beech Townhomes", "OffCampusHousing", "1400 Statesboro Pl Cir, Statesboro, GA 30458, United States", "32.4078744", "-81.7740085");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Eagle Villa Suites", "OffCampusHousing", "202 Lanier Dr, Statesboro, GA 30458, United States", "32.41219", "-81.78107");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Eaglecreek Townhouses", "OffCampusHousing", "220 Lanier Dr # 1, Statesboro, GA 30458, United States", "32.4084231", "-81.7801617");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Eastview Apartments", "OffCampusHousing", "Eastview Apartments, Statesboro, 30458, United States", "32.4246000", "-81.7916000");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Forum at Statesboro Student Apartments", "OffCampusHousing", "831 S Main St, Statesboro, GA 30458, United States", "32.420392", "-81.797303");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Garden District Apartments", "OffCampusHousing", "17931 GA-67, Statesboro, GA 30458, United States", "32.4051561", "-81.7654424");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Legacy", "OffCampusHousing", "100 Woodland Dr, Statesboro, GA 30458, United States", "32.426715", "-81.7893420");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Monarch 301", "OffCampusHousing", "816 S Main St, Statesboro, GA 30458, United States", "32.4206794", "-81.7932385");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Seasons Apartments", "OffCampusHousing", "819 Robin Hood Trail, Statesboro, GA 30458, United States", "32.4126130", "-81.7760840");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Southern Downs Apartments", "OffCampusHousing", "710 Georgia Ave, Statesboro, GA 30458, United States", "32.4173163", "-81.7741763");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Stadium View Apartments", "OffCampusHousing", "1822 Chandler Rd, Statesboro, GA 30458, United States", "32.4143277", "-81.7840105");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("The Connection at Statesboro", "OffCampusHousing", "2000 Stambuk Ln, Statesboro, GA 30458, United States", "32.4021709", "-81.7687900");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("The Grove Apartments Statesboro", "OffCampusHousing", "1150 Brampton Ave, Statesboro, GA 30458, United States", "32.4102354", "-81.7728094");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("The Hamptons Statesboro", "OffCampusHousing", "815 S Main St, Statesboro, GA 30458, United States", "32.423031", "-81.7925511");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("The Islands", "OffCampusHousing", "The Islands, 104, Statesboro, GA 30458, United States", "32.40064", "-81.77767");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("The Renaissance Apartment Homes", "OffCampusHousing", "1818 Chandler Rd, Statesboro, GA 30458, United States", "32.414935", "-81.7867770");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Tillman Park", "OffCampusHousing", "121 Tillman Rd, Statesboro, GA 30461, United States", "32.43181", "-81.78662");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Trace Villas", "OffCampusHousing", "Trace Villas, Statesboro, GA 30461, United States", "32.42149", "-81.79452");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("University Pointe Apartments", "OffCampusHousing", "109 Harvey Dr, Statesboro, GA 30458, United States", "32.419813", "-81.780417");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("University Village at Southern", "OffCampusHousing", "100 Bermuda Run, Statesboro, GA 30458, United States", "32.4156670", "-81.7735630");
INSERT INTO Locations (LocationName, LocationType, Address, Latitude, Longitude) VALUES ("Varsity Apartments", "OffCampusHousing", "111 Rucker Ln # 40, Statesboro, GA 30458, United States", "32.4249085", "-81.7918944");