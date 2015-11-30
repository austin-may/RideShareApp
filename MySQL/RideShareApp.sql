CREATE DATABASE  IF NOT EXISTS `rideshareapp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `rideshareapp`;

DROP TABLE IF EXISTS locations;
CREATE TABLE locations (
ComplexName varchar(255) NOT NULL,
Username varchar(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Users (
  Username varchar(255) NOT NULL,
  Password varchar(255) NOT NULL,
  FirstName varchar(255) NOT NULL,
  LastName varchar(255) NOT NULL,
  PickedUp bool NULL
);

DROP TABLE IF EXISTS pickups;
CREATE TABLE Pickups (
  Title varchar(255) NOT NULL,
  Address varchar(255) NOT NULL,
  Latitude varchar(255) PRIMARY KEY,
  Longitude varchar(255) PRIMARY KEY,
  OnCampus bool NULL
);

INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Centennial Place", "30458, 98 Georgia Ave, Statesboro, GA 30460, United States", "32.42321", "-81.78048", true);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Eagle Village", "Eagle Village, Statesboro, GA 30458, United States", "32.42037", "-81.7781", true);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Freedom's Landing", "211 Lanier Dr, Statesboro, GA 30458, United States", "32.40948", "-81.78382", true);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Kennedy Hall", "191 Knight Dr, Statesboro, GA 30458, United States", "32.41887", "-81.77858", true);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Russell Union", "Russell Union, 85 Georgia Ave, Statesboro, GA 30458, United States", "32.42495", "-81.77973", true);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Southern Courtyard", "Southern Courtyard, Statesboro, GA 30458, United States", "32.4168", "-81.78069", true);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Southern Pines", "Southern Pines, Statesboro, GA 30458, United States", "32.41726", "-81.78451", true);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("University Villas", "University Villas, Statesboro, GA 30458, United States", "32.41892", "-81.78173", true);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Watson Hall", "Watson Hall Commons, Statesboro, GA 30458, United States", "32.42181", "-81.78233", true);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("IT Building", "Information Technology Building, Statesboro, GA 30458, United States", "32.42327", "-81.78647", true);


INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("111 South Apartments", "111 Rucker Ln, Statesboro, GA 30458, United States", "32.4259818", "-81.7935383", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Aspen Heights Statesboro", "17358 GA-67 #100, Statesboro, GA 30458, United States", "32.401364", "-81.7579530", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Cambridge at Southern", "130 Lanier Dr, Statesboro, GA 30458, United States", "32.4141068", "-81.7789642", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Campus Club Apartments", "211 Lanier Dr, Statesboro, GA 30458, United States", "32.4134953", "-81.7818281", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Campus Crossings at Statesboro", "133 Lanier Dr, Statesboro, GA 30458, United States", "32.414945", "-81.7814230", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Campus Evolution Villages - Statesboro", "1699 Statesboro Pl Cir, Statesboro, GA 30458, United States", "32.4101841", "-81.7762072", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Caribe Court Condos", "210 Caribe Ct, Statesboro, GA 30458, United States", "32.424891", "-81.795186", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("College Walk Apartments", "210 Lanier Dr, Statesboro, GA 30458, United States", "32.4098133", "-81.7806015", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Copper Beech Townhomes", "1400 Statesboro Pl Cir, Statesboro, GA 30458, United States", "32.4078744", "-81.7740085", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Eagle Villa Suites", "202 Lanier Dr, Statesboro, GA 30458, United States", "32.41219", "-81.78107", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Eaglecreek Townhouses", "220 Lanier Dr # 1, Statesboro, GA 30458, United States", "32.4084231", "-81.7801617", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Eastview Apartments", "Eastview Apartments, Statesboro, 30458, United States", "32.4246000", "-81.7916000", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Forum at Statesboro Student Apartments", "831 S Main St, Statesboro, GA 30458, United States", "32.420392", "-81.797303", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Garden District Apartments", "17931 GA-67, Statesboro, GA 30458, United States", "32.4051561", "-81.7654424", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Legacy", "100 Woodland Dr, Statesboro, GA 30458, United States", "32.426715", "-81.7893420", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Monarch 301", "816 S Main St, Statesboro, GA 30458, United States", "32.4206794", "-81.7932385", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Seasons Apartments", "819 Robin Hood Trail, Statesboro, GA 30458, United States", "32.4126130", "-81.7760840", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Southern Downs Apartments", "710 Georgia Ave, Statesboro, GA 30458, United States", "32.4173163", "-81.7741763", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Stadium View Apartments", "1822 Chandler Rd, Statesboro, GA 30458, United States", "32.4143277", "-81.7840105", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("The Connection at Statesboro", "2000 Stambuk Ln, Statesboro, GA 30458, United States", "32.4021709", "-81.7687900", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("The Grove Apartments Statesboro", "1150 Brampton Ave, Statesboro, GA 30458, United States", "32.4102354", "-81.7728094", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("The Hamptons Statesboro", "815 S Main St, Statesboro, GA 30458, United States", "32.423031", "-81.7925511", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("The Islands", "The Islands, 104, Statesboro, GA 30458, United States", "32.40064", "-81.77767", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("The Renaissance Apartment Homes", "1818 Chandler Rd, Statesboro, GA 30458, United States", "32.414935", "-81.7867770", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Tillman Park", "121 Tillman Rd, Statesboro, GA 30461, United States", "32.43181", "-81.78662", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Trace Villas", "Trace Villas, Statesboro, GA 30461, United States", "32.42149", "-81.79452", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("University Pointe Apartments", "109 Harvey Dr, Statesboro, GA 30458, United States", "32.419813", "-81.780417", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("University Village at Southern", "100 Bermuda Run, Statesboro, GA 30458, United States", "32.4156670", "-81.7735630", false);
INSERT INTO Pickups (Title, Address, Latitude, Longitude, OnCampus) VALUES ("Varsity Apartments", "111 Rucker Ln # 40, Statesboro, GA 30458, United States", "32.4249085", "-81.7918944", false);