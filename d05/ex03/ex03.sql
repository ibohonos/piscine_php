INSERT INTO ft_table (login, `group`, creation_date)
SELECT last_name, 'other', birthdate
FROM user_card WHERE LENGTH(login) < 9
AND login LIKE '%a%'ORDER BY login ASC LIMIT 10;