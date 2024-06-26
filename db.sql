CREATE DATABASE taskManager

USE taskManager

CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE tasks (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(255) NOT NULL,
	description VARCHAR(255) NOT NULL,
	due DATETIME NOT NULL,
	completed INT NOT NULL,
	user_id INT NOT NULL,
	priority INT NOT NULL,
	FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE task_sharing (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    task_id INT NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (task_id) REFERENCES tasks(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);
