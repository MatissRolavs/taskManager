create database USER;

use USER;
CREATE TABLE `user` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) NOT NULL,
  `gmail` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `reset_token` VARCHAR(255),
  `reset_token_expiry` DATETIME
);



/*
CREATE TABLE taskManager {
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
description VARCHAR(255) NOT NULL,
due DATETIME NOT NULL,
completed INT NOT NULL
}

*/
