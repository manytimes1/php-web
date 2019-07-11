SELECT e.first_name, e.last_name, t.name AS town, a.address_text
FROM employees AS e
JOIN addresses a on e.address_id = a.address_id
JOIN towns t on a.town_id = t.town_id
ORDER BY first_name, last_name ASC
LIMIT 5;