-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_rent_car
CREATE DATABASE IF NOT EXISTS `db_rent_car` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_rent_car`;

-- Dumping structure for table db_rent_car.tb_cars
CREATE TABLE IF NOT EXISTS `tb_cars` (
  `PlatNumber` varchar(12) NOT NULL,
  `Year` smallint(6) NOT NULL,
  `Brand` int(11) NOT NULL,
  `Color` int(11) NOT NULL,
  `Status` enum('Ready','Out') NOT NULL DEFAULT 'Ready',
  `Condition` enum('Good','Bad') NOT NULL DEFAULT 'Good',
  PRIMARY KEY (`PlatNumber`),
  KEY `FK_db_cars_tb_cars_brand` (`Brand`),
  CONSTRAINT `FK_db_cars_tb_cars_brand` FOREIGN KEY (`Brand`) REFERENCES `tb_cars_brand` (`_ID`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_rent_car.tb_cars: ~10 rows (approximately)
DELETE FROM `tb_cars`;
/*!40000 ALTER TABLE `tb_cars` DISABLE KEYS */;
INSERT INTO `tb_cars` (`PlatNumber`, `Year`, `Brand`, `Color`, `Status`, `Condition`) VALUES
	('B-205-JKT', 2017, 2, 2, 'Ready', 'Good'),
	('B-501-AUX', 2006, 2, 3, 'Ready', 'Good'),
	('DK-1-KT', 2016, 2, 1, 'Out', 'Good'),
	('DK-2-KT', 2017, 2, 1, 'Out', 'Bad'),
	('DK-6743-KLX', 2016, 3, 2, 'Out', 'Good'),
	('DK-6845-KQ', 2008, 1, 3, 'Ready', 'Good'),
	('DK-83-ALX', 2017, 3, 2, 'Out', 'Good'),
	('DK-87-LX', 2016, 1, 4, 'Ready', 'Good'),
	('DK-9345-KQ', 2015, 1, 2, 'Out', 'Good'),
	('DK-9389-KY', 2010, 1, 1, 'Ready', 'Good');
/*!40000 ALTER TABLE `tb_cars` ENABLE KEYS */;

-- Dumping structure for table db_rent_car.tb_cars_brand
CREATE TABLE IF NOT EXISTS `tb_cars_brand` (
  `_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BrandName` varchar(100) NOT NULL,
  `Cost` int(11) NOT NULL,
  PRIMARY KEY (`_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table db_rent_car.tb_cars_brand: ~6 rows (approximately)
DELETE FROM `tb_cars_brand`;
/*!40000 ALTER TABLE `tb_cars_brand` DISABLE KEYS */;
INSERT INTO `tb_cars_brand` (`_ID`, `BrandName`, `Cost`) VALUES
	(1, 'Avanza', 200000),
	(2, 'Xenia', 180000),
	(3, 'Rush', 300000),
	(4, 'Kijang Inova', 210000),
	(5, 'Juke', 220000),
	(6, 'Ranger', 300000);
/*!40000 ALTER TABLE `tb_cars_brand` ENABLE KEYS */;

-- Dumping structure for table db_rent_car.tb_color
CREATE TABLE IF NOT EXISTS `tb_color` (
  `_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL,
  `MaintCost` int(11) NOT NULL,
  PRIMARY KEY (`_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table db_rent_car.tb_color: ~5 rows (approximately)
DELETE FROM `tb_color`;
/*!40000 ALTER TABLE `tb_color` DISABLE KEYS */;
INSERT INTO `tb_color` (`_ID`, `Name`, `MaintCost`) VALUES
	(1, 'Red', 1200000),
	(2, 'Black', 500000),
	(3, 'Silver', 800000),
	(4, 'White', 600000),
	(5, 'Yellow', 750000),
	(6, 'Blue', 1200000);
/*!40000 ALTER TABLE `tb_color` ENABLE KEYS */;

-- Dumping structure for table db_rent_car.tb_customers
CREATE TABLE IF NOT EXISTS `tb_customers` (
  `IDCardNumber` varchar(30) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(140) NOT NULL,
  `Gender` enum('Male','Female') NOT NULL,
  `ContactInfo` varchar(120) NOT NULL,
  PRIMARY KEY (`IDCardNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_rent_car.tb_customers: ~4 rows (approximately)
DELETE FROM `tb_customers`;
/*!40000 ALTER TABLE `tb_customers` DISABLE KEYS */;
INSERT INTO `tb_customers` (`IDCardNumber`, `Name`, `Address`, `Gender`, `ContactInfo`) VALUES
	('298347829298', 'Pak Wayan', 'Sukawati, Gianyar, Bali ', 'Male', 'Hp: 8234789273428\r\nWA : 928347927477'),
	('928379823747', 'Buk Wayan', 'Ketewel, Sukawati, Gianyar, Bali', 'Female', 'Hp : 837498273, \r\nWA : 32847272834'),
	('98234792749', 'Pak Ketut', 'Gianyar', 'Male', 'Hp : 298379827349\r\nline : sdkjhfkshdfui sdfisbduif '),
	('982349823749287', 'Pak Made ', 'Blahbatuh, Ginayar, Bali', 'Male', 'Hp : 98237498237\r\nTelp : (0361) 878976'),
	('9837478263786838', 'Buk Made ', 'Br. Manikan, Guwang Sukawati ', 'Female', 'Hp:0838273826 \r\n');
/*!40000 ALTER TABLE `tb_customers` ENABLE KEYS */;

-- Dumping structure for table db_rent_car.tb_employes
CREATE TABLE IF NOT EXISTS `tb_employes` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(120) NOT NULL,
  `PhoneNumber` varchar(16) NOT NULL,
  `DeletedAt` varchar(10) DEFAULT NULL,
  `RegBy` varchar(50) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_rent_car.tb_employes: ~1 rows (approximately)
DELETE FROM `tb_employes`;
/*!40000 ALTER TABLE `tb_employes` DISABLE KEYS */;
INSERT INTO `tb_employes` (`Username`, `Password`, `Name`, `Address`, `PhoneNumber`, `DeletedAt`, `RegBy`) VALUES
	('yanmastra', 'bali2018', 'I Wayan Mastra', 'Br. Rangkan, Ketewel, Sukawati, Gianyar, Bali, Kode Pos 80582', '+6283119304230', '', 'yanmastra'),
	('yogadharma', '1234567890', 'Yoga Dharma Pranata', 'Ungasan, Kuta Selatan, Badung, Bali', '93845789375', NULL, 'yanmastra');
/*!40000 ALTER TABLE `tb_employes` ENABLE KEYS */;

-- Dumping structure for table db_rent_car.tb_expenses
CREATE TABLE IF NOT EXISTS `tb_expenses` (
  `_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ExpensesType` int(11) NOT NULL,
  `Item` int(11) NOT NULL,
  `Cost` int(11) NOT NULL,
  `Date` int(11) NOT NULL,
  PRIMARY KEY (`_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_rent_car.tb_expenses: ~0 rows (approximately)
DELETE FROM `tb_expenses`;
/*!40000 ALTER TABLE `tb_expenses` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_expenses` ENABLE KEYS */;

-- Dumping structure for table db_rent_car.tb_expenses_type
CREATE TABLE IF NOT EXISTS `tb_expenses_type` (
  `_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  PRIMARY KEY (`_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_rent_car.tb_expenses_type: ~0 rows (approximately)
DELETE FROM `tb_expenses_type`;
/*!40000 ALTER TABLE `tb_expenses_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_expenses_type` ENABLE KEYS */;

-- Dumping structure for table db_rent_car.tb_rent_schedule
CREATE TABLE IF NOT EXISTS `tb_rent_schedule` (
  `Date` date NOT NULL,
  `Car` varchar(12) NOT NULL,
  PRIMARY KEY (`Date`,`Car`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_rent_car.tb_rent_schedule: ~0 rows (approximately)
DELETE FROM `tb_rent_schedule`;
/*!40000 ALTER TABLE `tb_rent_schedule` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_rent_schedule` ENABLE KEYS */;

-- Dumping structure for table db_rent_car.tb_transaction
CREATE TABLE IF NOT EXISTS `tb_transaction` (
  `_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CarNumber` varchar(12) NOT NULL,
  `PayedCost` int(11) NOT NULL,
  `DateLease` varchar(10) DEFAULT NULL,
  `RentRange` int(11) NOT NULL,
  `DateReturn` varchar(10) DEFAULT NULL,
  `Renter` varchar(50) NOT NULL,
  `Excess` int(11) DEFAULT NULL,
  `Fine` int(11) DEFAULT NULL,
  PRIMARY KEY (`_ID`),
  KEY `FK_tb_transaction_tb_customers` (`Renter`),
  CONSTRAINT `FK_tb_transaction_tb_customers` FOREIGN KEY (`Renter`) REFERENCES `tb_customers` (`IDCardNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- Dumping data for table db_rent_car.tb_transaction: ~22 rows (approximately)
DELETE FROM `tb_transaction`;
/*!40000 ALTER TABLE `tb_transaction` DISABLE KEYS */;
INSERT INTO `tb_transaction` (`_ID`, `CarNumber`, `PayedCost`, `DateLease`, `RentRange`, `DateReturn`, `Renter`, `Excess`, `Fine`) VALUES
	(1, 'DK-6845-KQ', 0, '0000-00-00', 0, NULL, '298347829298', 0, 0),
	(2, 'DK-8235-XYZ', 0, '0001-01-01', 0, NULL, '982349823749287', 0, 0),
	(3, 'DK-6845-KQ', 0, '0000-00-00', 7, NULL, '298347829298', 0, 0),
	(4, 'DK-87-LX', 0, '0000-00-00', 2, NULL, '982349823749287', 0, 0),
	(5, 'DK-9345-KQ', 0, '0000-00-00', 6, NULL, '982349823749287', 0, 0),
	(6, 'DK-6845-KQ', 0, '0000-00-00', 3, NULL, '982349823749287', 0, 0),
	(7, 'DK-6845-KQ', 0, '0000-00-00', 3, NULL, '982349823749287', 0, 0),
	(8, 'DK-9345-KQ', 0, '0000-00-00', 9, NULL, '298347829298', 0, 0),
	(9, 'DK-8235-XYZ', 0, '0000-00-00', 7, NULL, '982349823749287', 0, 0),
	(10, 'DK-9345-KQ', 0, '0000-00-00', 3, NULL, '982349823749287', 0, 0),
	(11, 'DK-8235-XYZ', 0, '0000-00-00', 2, NULL, '298347829298', 0, 0),
	(12, 'DK-1-KT', 0, '0000-00-00', 7, NULL, '298347829298', 0, 0),
	(13, 'DK-87-LX', 0, '0000-00-00', 4, NULL, '98234792749', 0, 0),
	(14, 'DK-6743-KLX', 0, '5/20/2018 ', 3, NULL, '98234792749', 0, 0),
	(15, 'B-205-JKT', 190000, '5/21/2018 ', 6, '5/22/2018 ', '928379823747', 1, 230000),
	(16, 'B-205-JKT', 0, '5/21/2018 ', 5, NULL, '982349823749287', 0, 0),
	(17, 'DK-2-KT', 240000, '5/20/2018 ', 3, '5/26/2018 ', '98234792749', 6, 1380000),
	(18, 'DK-9345-KQ', 0, '5/20/2018 ', 3, NULL, '928379823747', NULL, NULL),
	(19, 'DK-6743-KLX', 0, '5/25/2018 ', 10, NULL, '298347829298', NULL, NULL),
	(20, 'DK-1-KT', 630000, '5/20/2018 ', 3, '5/24/2018 ', '928379823747', 1, 230000),
	(21, 'B-205-JKT', 1180000, '5/25/2018 ', 4, '5/31/2018 ', '298347829298', 2, 460000),
	(22, 'DK-83-ALX', 900000, '5/20/2018 ', 3, NULL, '9837478263786838', NULL, NULL),
	(27, 'DK-87-LX', 800000, '2018-06-03', 4, '2018-06-07', '982349823749287', NULL, NULL),
	(28, 'DK-6743-KLX', 600000, '2018-06-03', 2, '2018-06-05', '9837478263786838', NULL, NULL),
	(37, 'DK-9345-KQ', 600000, '2018-06-03', 3, '2018-06-06', '298347829298', NULL, NULL);
/*!40000 ALTER TABLE `tb_transaction` ENABLE KEYS */;

-- Dumping structure for view db_rent_car.vw_cars
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_cars` (
	`Plat Number` VARCHAR(12) NOT NULL COLLATE 'latin1_swedish_ci',
	`Brand` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`Color` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`Year` SMALLINT(6) NOT NULL,
	`Cost per Day` INT(11) NOT NULL,
	`Status` ENUM('Ready','Out') NOT NULL COLLATE 'latin1_swedish_ci',
	`Condition` ENUM('Good','Bad') NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view db_rent_car.vw_transaction
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_transaction` (
	`ID` INT(11) NOT NULL,
	`Plat Number` VARCHAR(12) NOT NULL COLLATE 'latin1_swedish_ci',
	`Brand Name` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`Color` VARCHAR(20) NOT NULL COLLATE 'latin1_swedish_ci',
	`Date Lease` VARCHAR(10) NULL COLLATE 'latin1_swedish_ci',
	`Rent Range` INT(11) NOT NULL,
	`Renter` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`Cost per Day` INT(11) NOT NULL,
	`Payed Cost` INT(11) NOT NULL,
	`Date Return` VARCHAR(10) NULL COLLATE 'latin1_swedish_ci',
	`Excess` INT(11) NULL,
	`Fine` INT(11) NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_rent_car.vw_cars
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_cars`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_cars` AS SELECT 
tb_cars.PlatNumber AS 'Plat Number', 
tb_cars_brand.BrandName AS 'Brand', 
tb_color.Name AS 'Color',
tb_cars.Year,
tb_cars_brand.Cost AS 'Cost per Day',
tb_cars.`Status`,
tb_cars.`Condition`
FROM 
tb_color RIGHT JOIN tb_cars ON tb_cars.Color = tb_color._ID 
INNER JOIN tb_cars_brand ON tb_cars.Brand = tb_cars_brand._ID 
ORDER BY Year ;

-- Dumping structure for view db_rent_car.vw_transaction
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_transaction`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_transaction` AS SELECT 
tb_transaction._ID AS 'ID', 
tb_cars.PlatNumber AS 'Plat Number', 
tb_cars_brand.BrandName As 'Brand Name', 
tb_color.Name As 'Color', 
tb_transaction.DateLease As 'Date Lease', 
tb_transaction.RentRange As 'Rent Range', 
tb_customers.Name As 'Renter', 
tb_cars_brand.Cost As 'Cost per Day', 
tb_transaction.PayedCost As 'Payed Cost', 
tb_transaction.DateReturn As 'Date Return',
tb_transaction.Excess As 'Excess',
tb_transaction.Fine As 'Fine'
FROM tb_cars_brand INNER JOIN tb_cars ON tb_cars.Brand = tb_cars_brand._ID 
INNER JOIN tb_transaction ON tb_transaction.CarNumber = tb_cars.PlatNumber 
INNER JOIN tb_customers ON tb_transaction.Renter = tb_customers.IDCardNumber 
INNER JOIN tb_color ON tb_cars.Color = tb_color._ID
WHERE 1 ORDER BY tb_transaction._ID DESC ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
