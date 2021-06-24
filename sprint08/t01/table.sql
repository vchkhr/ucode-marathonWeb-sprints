USE ucode_web;

CREATE TABLE IF NOT EXISTS heroes
(
    id INT(6) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(30) UNIQUE NOT NULL,
    description TEXT NOT NULL,
    race VARCHAR(20) DEFAULT 'human' NOT NULL,
    class_role ENUM('tankman', 'healer', 'dps') NOT NULL
);
