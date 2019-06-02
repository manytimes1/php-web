CREATE TABLE IF NOT EXISTS `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `picture` blob,
  `height` decimal(10,2) DEFAULT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `gender` enum('m','f') NOT NULL,
  `birthdate` date NOT NULL,
  `biography` text,
  PRIMARY KEY (`id`)
);

INSERT INTO `people` (`id`, `name`, `picture`, `height`, `weight`, `gender`, `birthdate`, `biography`) VALUES
	(1, 'Pesho Peshev', NULL, 182.40, 73.50, 'm', '1994-04-14', NULL),
	(2, 'Svetlin Garbakov', NULL, 164.30, 75.57, 'm', '1996-05-22', NULL),
	(3, 'Ani Petrova', NULL, 155.50, 54.67, 'f', '1989-10-21', NULL),
	(4, 'Vera Malcheva', NULL, 165.75, 65.00, 'f', '1982-09-25', NULL),
	(5, 'Viktor Ivanov', NULL, 185.50, 90.00, 'm', '1998-09-19', NULL);