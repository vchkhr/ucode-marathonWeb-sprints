SELECT heroes.name as 'Name', teams.name as 'Team'
FROM heroes
LEFT OUTER JOIN teams ON heroes.id = teams.hero_id
ORDER BY heroes.name;

SELECT powers.name as 'Power', heroes.name as 'Hero'
FROM powers
LEFT OUTER JOIN heroes ON powers.hero_id = heroes.id
ORDER BY powers.name;

SELECT heroes.name as 'Name', powers.name as 'Power', teams.name as 'Team'
FROM heroes
JOIN teams ON heroes.id = teams.hero_id
JOIN powers ON heroes.id = powers.hero_id
ORDER BY heroes.name;
