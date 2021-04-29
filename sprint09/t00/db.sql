CREATE DATABASE IF NOT EXISTS sword;

CREATE USER IF NOT EXISTS 'vkharchenk'@'localhost' IDENTIFIED WITH mysql_native_password BY 'securepass';
-- ALTER USER 'vkharchenk'@'localhost' IDENTIFIED WITH mysql_native_password BY 'securepass';

GRANT ALL PRIVILEGES ON *.* TO 'vkharchenk'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;

USE sword;

DROP TABLE IF EXISTS users;

CREATE TABLE IF NOT EXISTS users (
    login varchar(255) PRIMARY KEY NOT NULL UNIQUE,
    email varchar(255) NOT NULL UNIQUE,
    name varchar(255) NOT NULL,
    status ENUM('user', 'admin') NOT NULL,
    password varchar(255) NOT NULL
);
