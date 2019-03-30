-- Skrypt bazy danych do aplikacji edukacyjnej hakathon
-- autor: Tomasz Waberski 29-03-2019

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- ------------------------------------------------------
-- Baza edu_db
-- -----------------------------------------------------

-- CREATE SCHEMA IF NOT EXISTS crm_db DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci ;
DROP DATABASE IF EXISTS edu_db;
CREATE DATABASE edu_db DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE edu_db ;

-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `edu_db`.`user` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `surname` VARCHAR(50) NOT NULL,
  `login` VARCHAR(50) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `pasecode` VARCHAR(255) NOT NULL,
  `avatar` VARCHAR(200) NOT NULL,
  `type` INT NULL COMMENT '0-student, 1-teacher',
  PRIMARY KEY (`user_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `note`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `edu_db`.`note` (
  `note_id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NULL,
  `time` TIMESTAMP(6) NULL,
  `tags` VARCHAR(255) NULL,
  `user_user_id` INT NOT NULL,
  `ref` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`note_id`, `user_user_id`),
  INDEX `fk_note_user_idx` (`user_user_id` ASC),
  CONSTRAINT `fk_note_user`
    FOREIGN KEY (`user_user_id`)
    REFERENCES `edu_db`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- ------------------------------------------------------
-- Add new 'user`
-- ------------------------------------------------------

INSERT INTO `user` (`user_id`, `name`, `surname`, `login`, `password`, `pasecode`, `avatar`, `type`) VALUES (1, 'Kamil', 'Nowak', 'kamil', 'kamil', 'szyfr', 'url', '0');
INSERT INTO `user` (`user_id`, `name`, `surname`, `login`, `password`, `pasecode`, `avatar`, `type`) VALUES (2, 'Jacek', 'Nowak', 'jacek', 'jacek', 'szyfr', 'url', '1');
INSERT INTO `user` (`user_id`, `name`, `surname`, `login`, `password`, `pasecode`, `avatar`, `type`) VALUES (3, 'Tomek', 'Nowak', 'tomek', 'tomek', 'szyfr', 'url', '0');

-- ------------------------------------------------------
-- Add new 'note`
-- ------------------------------------------------------

INSERT INTO `edu_db`.`note` (`note_id`, `title`, `time`, `tags`, `user_user_id`, `ref`) VALUES (1, 'Matematyka', '2019-03-30 05:10:24.086000', 'matematyka, macierze', 1, 'QWER');
INSERT INTO `edu_db`.`note` (`note_id`, `title`, `time`, `tags`, `user_user_id`, `ref`) VALUES (2, 'Historia', '2019-03-29 05:26:19.086000', 'historia, kraj', 2, 'WERT');
INSERT INTO `edu_db`.`note` (`note_id`, `title`, `time`, `tags`, `user_user_id`, `ref`) VALUES (3, 'Wzory z fizyki', '2019-03-29 05:35:19.826000', 'fizyka, fale elektromagnetyczne', 1, 'ASDF');
INSERT INTO `edu_db`.`note` (`note_id`, `title`, `time`, `tags`, `user_user_id`, `ref`) VALUES (1, 'Biologia', '2019-03-30 05:10:24.086000', 'matematyka, macierze', 1, '6789');
INSERT INTO `edu_db`.`note` (`note_id`, `title`, `time`, `tags`, `user_user_id`, `ref`) VALUES (2, 'Chemia', '2019-03-29 05:26:19.086000', 'historia, kraj', 2, '5678');
INSERT INTO `edu_db`.`note` (`note_id`, `title`, `time`, `tags`, `user_user_id`, `ref`) VALUES (3, 'Wzory z Chemii ', '2019-03-29 05:35:19.826000', 'fizyka, fale elektromagnetyczne', 1, '4567');
INSERT INTO `edu_db`.`note` (`note_id`, `title`, `time`, `tags`, `user_user_id`, `ref`) VALUES (1, 'Plastyka', '2019-03-30 05:10:24.086000', 'matematyka, macierze', 1, '3456');
INSERT INTO `edu_db`.`note` (`note_id`, `title`, `time`, `tags`, `user_user_id`, `ref`) VALUES (2, 'Informatyka', '2019-03-29 05:26:19.086000', 'historia, kraj', 2, '2345');
INSERT INTO `edu_db`.`note` (`note_id`, `title`, `time`, `tags`, `user_user_id`, `ref`) VALUES (3, 'Wzory z Chemii', '2019-03-29 05:35:19.826000', 'fizyka, fale elektromagnetyczne', 1, '1234');
