CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(26) NOT NULL,
  `profile_picture` blob,
  `last_login_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
);

INSERT INTO `users` (`id`, `username`, `password`, `profile_picture`, `last_login_time`, `is_deleted`) VALUES
	(1, 'pesho_peshev', '$2y$12$dNpkPGvAZDVYeACH89B', NULL, '2019-05-22 13:54:16', 0),
	(2, 'chushki_mushki', '$2a$10$mExlq3fgKdbdCAC9jSz', NULL, NULL, 0),
	(3, 'bau_mial', '$2a$10$/KjxoY8an2RaEQ6aOIe', NULL, NULL, 0),
	(4, 'robot_ninja', '$2a$10$AoXaflWa9V8/9At.sdt', NULL, NULL, 1),
	(5, 'nakov_pinderas', '$2a$10$LSGelFWzwB6p6g8/Ghb', NULL, NULL, 0);