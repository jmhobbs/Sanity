CREATE TABLE `projects` (
	`id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`user_id` INT(11) UNSIGNED NOT NULL,
	`name` VARCHAR(255) NOT NULL,
	`slug` VARCHAR(255) NOT NULL,
	`created` INT(10) UNSIGNED NOT NULL,
	PRIMARY KEY ( `id` )
);
