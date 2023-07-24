-- create table users.
CREATE TABLE IF NOT EXISTS `capybara`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(75) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `city` VARCHAR(75) NULL,
  `fullname` VARCHAR(75) NOT NULL,
  `role_as` VARCHAR(20) NOT NULL DEFAULT 'user',
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE (`email`)
) ENGINE = InnoDB;

-- create table sessions
CREATE TABLE IF NOT EXISTS `capybara`.`sessions` (
  `user_id` INT NOT NULL,
  `token` VARCHAR(1000) NOT NULL,
  `token_expiry` INT(11) NOT NULL,
  UNIQUE (`user_id`)
) ENGINE = InnoDB;

CREATE TABLE `capybara`.`pages` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(75) NOT NULL,
  `meta_title` VARCHAR(120) NOT NULL,
  `meta_description` VARCHAR(200) NOT NULL,
  `meta_keywords` VARCHAR(1000) NOT NULL,
  `slug` VARCHAR(75) NOT NULL,
  `lang` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE (`slug`)
) ENGINE = InnoDB;