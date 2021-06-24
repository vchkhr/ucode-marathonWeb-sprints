SELECT heroes.id AS 'ID' FROM heroes
JOIN (
    SELECT heroes.id FROM heroes
    JOIN (
        SELECT races.hero_id FROM races
        JOIN (
            SELECT teams.hero_id, COUNT(*) FROM teams
            GROUP BY teams.hero_id HAVING COUNT(*) > 1
        ) AS a
        ON a.hero_id = races.hero_id
        WHERE races.name != 'human'
    ) AS b
    ON b.hero_id = heroes.id
    WHERE heroes.name LIKE BINARY '%a%'
) AS c
ON c.id = heroes.id
WHERE heroes.class_role IN ('tankman', 'healer')
ORDER BY id;
