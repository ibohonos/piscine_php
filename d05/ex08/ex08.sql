SELECT last_name, first_name, DATE_FORMAT(birthday, '%Y-%m-%d') FROM user_card
WHERE EXTRACT(YEAR FROM birthday) = 1982
ORDER BY last_name ASC;