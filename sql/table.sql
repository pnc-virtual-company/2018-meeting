-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.31-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table skeleton.skeleton_roles
CREATE TABLE IF NOT EXISTS `skeleton_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table skeleton.skeleton_roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `skeleton_roles` DISABLE KEYS */;
INSERT INTO `skeleton_roles` (`id`, `name`) VALUES
	(1, 'admin'),
	(2, 'user'),
	(8, 'Super admin');
/*!40000 ALTER TABLE `skeleton_roles` ENABLE KEYS */;

-- Dumping structure for table skeleton.skeleton_users
CREATE TABLE IF NOT EXISTS `skeleton_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Internal unique identifier',
  `firstname` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'User Firstname',
  `lastname` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'User Lastname',
  `login` varchar(32) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Login used for connecting tothe application',
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Email',
  `password` varchar(512) CHARACTER SET utf8 DEFAULT NULL COMMENT 'SHA1 encoded password',
  `role` int(11) DEFAULT NULL COMMENT 'Binary mask for role',
  `active` tinyint(1) DEFAULT '1' COMMENT 'Is user active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table skeleton.skeleton_users: ~4 rows (approximately)
/*!40000 ALTER TABLE `skeleton_users` DISABLE KEYS */;
INSERT INTO `skeleton_users` (`id`, `firstname`, `lastname`, `login`, `email`, `password`, `role`, `active`) VALUES
	(1, 'Benjamin', 'BALET', 'bbalet', 'benjamin.balet@gmail.com', '$2a$08$LeUbaGFqJjLSAN7to9URsuHB41zcmsMBgBhpZuFp2y2OTxtVcMQ.C', 1, 1),
	(2, 'john', 'DOE', 'jdoe', 'jdoe@test.org', '$2a$08$Gk9WE1duEcKhEhxUKFmZteUU0sCZTgZIKkiPxhCe7yi0Jw0pBbDNW', 2, 1),
	(3, 'Bob', 'DENARD', 'bdenard', 'bdenard@test.org', '$2a$08$14jdHTPUZe5.zXxQ1NqhhO83xUt2Zkr.csGw10BH75B3VrJiNU8Bq', 2, 1),
	(5, 'Admin', 'ADMINISTRATOR', 'admin', 'admin@skeleton.org', '$2a$08$cnX6al6aTkoyh/N/tKZ11e8ec9J/sldA6R4NdP.2qhhDi0OD3ek1G', 1, 1);
/*!40000 ALTER TABLE `skeleton_users` ENABLE KEYS */;

-- Dumping structure for table skeleton.tbl_locations
CREATE TABLE IF NOT EXISTS `tbl_locations` (
  `loc_id` int(11) NOT NULL AUTO_INCREMENT,
  `loc_name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `lat` int(255) NOT NULL,
  `long` int(255) NOT NULL,
  PRIMARY KEY (`loc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table skeleton.tbl_locations: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_locations` DISABLE KEYS */;
INSERT INTO `tbl_locations` (`loc_id`, `loc_name`, `description`, `address`, `lat`, `long`) VALUES
	(2, 'PNV', 'PNV Vietnam', '99 Tô Hiến Thành, Phước Mỹ, Sơn Trà, Đà Nẵng,', 0, 0),
	(6, 'PNC', 'PN Cambodia', 'Street 371, Phnom Penh, Cambodia', 12, 105);
/*!40000 ALTER TABLE `tbl_locations` ENABLE KEYS */;

-- Dumping structure for table skeleton.tbl_positions
CREATE TABLE IF NOT EXISTS `tbl_positions` (
  `pos_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`pos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table skeleton.tbl_positions: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_positions` DISABLE KEYS */;
INSERT INTO `tbl_positions` (`pos_id`, `name`) VALUES
	(1, 'Manager'),
	(2, 'training');
/*!40000 ALTER TABLE `tbl_positions` ENABLE KEYS */;

-- Dumping structure for table skeleton.tbl_roles
CREATE TABLE IF NOT EXISTS `tbl_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(45) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table skeleton.tbl_roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_roles` DISABLE KEYS */;
INSERT INTO `tbl_roles` (`role_id`, `role_name`) VALUES
	(1, 'Admin'),
	(2, 'Manager'),
	(3, 'Normal');
/*!40000 ALTER TABLE `tbl_roles` ENABLE KEYS */;

-- Dumping structure for table skeleton.tbl_rooms
CREATE TABLE IF NOT EXISTS `tbl_rooms` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(45) NOT NULL,
  `floor` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `sta_id` varchar(45) NOT NULL,
  `loc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_image` varchar(500) NOT NULL,
  PRIMARY KEY (`room_id`),
  KEY `fk_tbl_rooms_tbl_locations1_idx` (`loc_id`),
  KEY `fk_tbl_rooms_tbl_users1_idx` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- Dumping data for table skeleton.tbl_rooms: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_rooms` DISABLE KEYS */;
INSERT INTO `tbl_rooms` (`room_id`, `room_name`, `floor`, `description`, `sta_id`, `loc_id`, `user_id`, `room_image`) VALUES
	(46, 'B23', 3, 'rerrereer', '1', 2, 5, 'Secound_Floor14.png'),
	(48, 'B23', 1, 'gggg', '1', 4, 5, '1st_Floor4.png');
/*!40000 ALTER TABLE `tbl_rooms` ENABLE KEYS */;

-- Dumping structure for table skeleton.tbl_room_request
CREATE TABLE IF NOT EXISTS `tbl_room_request` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_description` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `sta_id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Start` time(6) NOT NULL,
  `End` time(6) NOT NULL,
  PRIMARY KEY (`book_id`),
  KEY `fk_tbl_room_request_tbl_users1_idx` (`user_id`),
  KEY `fk_tbl_room_request_tbl_rooms1_idx` (`room_id`),
  KEY `fk_tbl_room_request_tbl_status1_idx` (`sta_id`),
  CONSTRAINT `fk_tbl_room_request_tbl_rooms1` FOREIGN KEY (`room_id`) REFERENCES `tbl_rooms` (`room_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_room_request_tbl_status1` FOREIGN KEY (`sta_id`) REFERENCES `tbl_status` (`sta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_room_request_tbl_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

-- Dumping data for table skeleton.tbl_room_request: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_room_request` DISABLE KEYS */;
INSERT INTO `tbl_room_request` (`book_id`, `book_description`, `user_id`, `room_id`, `sta_id`, `Date`, `Start`, `End`) VALUES
	(56, 'Meet you', 8, 48, 1, '2018-05-11', '10:15:00.000000', '11:45:00.000000'),
	(61, 'fsd', 8, 46, 1, '2018-05-11', '07:00:00.000000', '07:00:00.000000'),
	(63, 'ASDAFHGJK', 8, 46, 1, '2018-05-11', '07:30:00.000000', '22:30:00.000000');
/*!40000 ALTER TABLE `tbl_room_request` ENABLE KEYS */;

-- Dumping structure for table skeleton.tbl_status
CREATE TABLE IF NOT EXISTS `tbl_status` (
  `sta_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`sta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table skeleton.tbl_status: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_status` DISABLE KEYS */;
INSERT INTO `tbl_status` (`sta_id`, `status`) VALUES
	(1, 'Accepted'),
	(2, 'Accepted');
/*!40000 ALTER TABLE `tbl_status` ENABLE KEYS */;

-- Dumping structure for table skeleton.tbl_userpositions
CREATE TABLE IF NOT EXISTS `tbl_userpositions` (
  `user_pos_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `pos_id` int(11) NOT NULL,
  PRIMARY KEY (`user_pos_id`),
  KEY `fk_tbl_users_has_tbl_positions_tbl_positions1_idx` (`pos_id`),
  KEY `fk_tbl_users_has_tbl_positions_tbl_users1_idx` (`user_id`),
  CONSTRAINT `fk_tbl_users_has_tbl_positions_tbl_positions1` FOREIGN KEY (`pos_id`) REFERENCES `tbl_positions` (`pos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_users_has_tbl_positions_tbl_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table skeleton.tbl_userpositions: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_userpositions` DISABLE KEYS */;
INSERT INTO `tbl_userpositions` (`user_pos_id`, `user_id`, `pos_id`) VALUES
	(1, 5, 1),
	(2, 8, 2);
/*!40000 ALTER TABLE `tbl_userpositions` ENABLE KEYS */;

-- Dumping structure for table skeleton.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `login` varchar(32) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(512) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `role` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_users_tbl_roles1_idx` (`role`),
  CONSTRAINT `fk_tbl_users_tbl_roles1` FOREIGN KEY (`role`) REFERENCES `tbl_roles` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table skeleton.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `firstname`, `lastname`, `login`, `email`, `password`, `gender`, `role`, `active`) VALUES
	(5, 'Benjamin', 'BALET', 'normal', 'benjamin.balet@gmail.com', '$2a$08$cnX6al6aTkoyh/N/tKZ11e8ec9J/sldA6R4NdP.2qhhDi0OD3ek1G', 'male', 3, 1),
	(6, 'john', 'DOE', 'manager', 'jdoe@test.org', '$2a$08$cnX6al6aTkoyh/N/tKZ11e8ec9J/sldA6R4NdP.2qhhDi0OD3ek1G', 'male', 2, 1),
	(7, 'Bob', 'DENARD', 'bdenard', 'bdenard@test.org', '$2a$08$14jdHTPUZe5.zXxQ1NqhhO83xUt2Zkr.csGw10BH75B3VrJiNU8Bq', 'female', 1, 1),
	(8, 'Admin', 'ADMINISTRATOR', 'admin', 'admin@skeleton.org', '$2a$08$cnX6al6aTkoyh/N/tKZ11e8ec9J/sldA6R4NdP.2qhhDi0OD3ek1G', 'female', 1, 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
