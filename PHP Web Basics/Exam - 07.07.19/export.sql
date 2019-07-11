CREATE DATABASE IF NOT EXISTS `softuni_booking`;
USE `softuni_booking`;

CREATE TABLE `users` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`email` VARCHAR(255) NOT NULL,
	`password` VARCHAR(255) NOT NULL,
	`name` VARCHAR(255) NOT NULL,
	`phone` VARCHAR(255) NOT NULL,
	`money_spent` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
	PRIMARY KEY (`id`),
	UNIQUE INDEX `email` (`email`)
);

CREATE TABLE `towns` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `rooms` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`type` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `offers` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`price` DECIMAL(10,2) NOT NULL,
	`days` INT(11) NOT NULL,
	`description` TEXT NOT NULL,
	`picture_url` TEXT NOT NULL,
	`room_id` INT(11) NOT NULL,
	`town_id` INT(11) NOT NULL,
	`user_id` INT(11) NOT NULL,
	`is_occupied` BIT(1) NOT NULL DEFAULT b'0',
	`added_on` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`),
	INDEX `FK__rooms` (`room_id`),
	INDEX `FK__towns` (`town_id`),
	INDEX `FK__users` (`user_id`),
	CONSTRAINT `FK__rooms` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
	CONSTRAINT `FK__towns` FOREIGN KEY (`town_id`) REFERENCES `towns` (`id`),
	CONSTRAINT `FK__users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);

INSERT INTO `towns` (`id`, `name`) VALUES
	(1, 'Sofia'),
	(2, 'Varna'),
	(3, 'Plovdiv'),
	(4, 'Burgas'),
	(5, 'Pleven'),
	(6, 'Other');

INSERT INTO `rooms` (`id`, `type`) VALUES
	(1, 'Single Room'),
	(2, 'Double Room'),
	(3, 'Maisonette');