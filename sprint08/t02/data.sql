INSERT INTO powers(hero_id, name, points, type)
VALUES
    (1, 'bloody fist', 110, 'attack'),
    (2, 'shield', 200, 'defense'),
    (2, 'universal eye', 80, 'defense'),
    (3, 'iron shield', 175, 'defense'),
    (4, 'shield', 160, 'defense'),
    (5, 'sttrength', 150, 'defense'),
    (7, 'durability', 30, 'defense'),
    (8, 'iron shield', 195, 'attack'),
    (9, 'durability', 30, 'defense');

INSERT INTO races(hero_id, name)
VALUES
    (1, 'human'),
    (2, 'human'),
    (3, 'human'),
    (4, 'human'),
    (5, 'abilisks'),
    (6, 'chronicoms'),
    (7, 'flerken'),
    (8, 'hurctarians'),
    (9, 'leviathans'),
    (10, 'chronicoms');

INSERT INTO teams(hero_id, name)
VALUES
    (1, 'Avengers'),
    (1, 'Hydra'),
    (3, 'Avengers'),
    (4, 'Avengers'),
    (5, 'Elementals'),
    (7, 'Guardians of the Galaxy'),
    (8, 'Hydra'),
    (10, 'Elementals'),
    (10, 'Guardians of the Galaxy');
