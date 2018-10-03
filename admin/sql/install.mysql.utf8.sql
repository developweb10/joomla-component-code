DROP TABLE IF EXISTS `#__kwrecyclingSOT`;
DROP TABLE IF EXISTS `#__kwrecyclingWOT`;
DROP TABLE IF EXISTS `#__kwrecyclingcenter`;

CREATE TABLE `#__kwrecyclingcenter` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	`federal_state` VARCHAR(40) NOT NULL,
	`town` VARCHAR(25) NOT NULL,
	`companies` VARCHAR(80) NOT NULL,
	`road` VARCHAR(40) NOT NULL,
	`postal_code` VARCHAR(5) NOT NULL,
	`place` VARCHAR(40) NOT NULL,
	`internet` VARCHAR(150) NOT NULL,
	`email` VARCHAR(35) NOT NULL,
	`remarks` VARCHAR(180) NOT NULL,
	`longitute` VARCHAR(20) ,
	`latitude` VARCHAR(20) ,
	`published` tinyint(4) DEFAULT 1,
	PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8; 

CREATE TABLE `#__kwrecyclingSOT` (
`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`SOTfromtime` VARCHAR(25),
	`SOTtotime`  VARCHAR(25),
	`SOTduration`  VARCHAR(25),
	`SOTweekday` INT(11) NOT NULL,
	`SOTrecycling_id` INT(11) NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`SOTrecycling_id`) REFERENCES `#__kwrecyclingcenter` (`id`) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8; 

CREATE TABLE `#__kwrecyclingWOT` (
`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`WOTfromtime` VARCHAR(25),
	`WOTtotime`  VARCHAR(25),
	`WOTduration`  VARCHAR(25),
	`WOTweekday` INT(11) NOT NULL,
	`WOTrecycling_id` INT(11) NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`WOTrecycling_id`) REFERENCES `#__kwrecyclingcenter` (`id`) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8; 