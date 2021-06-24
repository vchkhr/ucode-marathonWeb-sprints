USE ucode_web;

CREATE TABLE IF NOT EXISTS powers
(
    id INT(6) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    hero_id INT(6) NOT NULL,
    name TEXT NOT NULL,
    points int(6) NOT NULL,
    type ENUM('attack', 'defense') NOT NULL,
    FOREIGN KEY (hero_id) REFERENCES heroes(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS races
(
    id INT(6) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    hero_id INT(6) NOT NULL,
    name TEXT NOT NULL,
    FOREIGN KEY (hero_id) REFERENCES heroes(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS teams
(
    id INT(6) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    hero_id INT(6) NOT NULL,
    name TEXT NOT NULL,
    FOREIGN KEY (hero_id) REFERENCES heroes(id) ON DELETE CASCADE
);
