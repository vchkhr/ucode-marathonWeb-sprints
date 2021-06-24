SELECT heroes.name AS 'Hero', SUM(powers.points) AS 'Power'
FROM powers
LEFT OUTER JOIN heroes ON heroes.id = powers.hero_id
GROUP BY heroes.id
ORDER BY Power DESC, heroes.id
LIMIT 1;

SELECT heroes.name AS 'Hero', SUM(powers.points) AS 'Defense'
FROM powers
LEFT OUTER JOIN heroes ON heroes.id = powers.hero_id
WHERE powers.type = 'defense'
GROUP BY heroes.id
ORDER BY Defense, heroes.id
LIMIT 1;

SELECT b.hero_id AS 'ID', b.team_name AS 'Team', SUM(powers.points) AS 'Power'
FROM (
    SELECT a.hero_id, teams.name AS team_name
    FROM (
        SELECT teams.hero_id
        FROM teams
        GROUP BY teams.hero_id HAVING COUNT(*) = 1
    ) AS a
    JOIN teams ON a.hero_id = teams.hero_id
    WHERE teams.name = 'Avengers'
) AS b
JOIN powers ON powers.hero_id = b.hero_id
GROUP BY b.hero_id
ORDER BY Power DESC;

SELECT teams.name AS 'Team', SUM(powers.points) AS 'Power'
FROM teams
JOIN powers ON teams.hero_id = powers.hero_id
WHERE teams.name IN ('Avengers', 'Hydra')
GROUP BY teams.name
ORDER BY Power;
