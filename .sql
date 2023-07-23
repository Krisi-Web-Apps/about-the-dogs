CREATE TABLE `capybara`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(75) NOT NULL,
  `password` INT NOT NULL,
  `city` INT NOT NULL,
  `fullname` VARCHAR(75) NOT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE (`email`)
) ENGINE = InnoDB;