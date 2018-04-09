CREATE TABLE ft_table (
	`id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`login` VARCHAR(8) NOT NULL DEFAULT "toto",
	`group` ENUM('staff', 'student', 'other') NOT NULL,
	`creation_date` DATE NOT NULL
);
