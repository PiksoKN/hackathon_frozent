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
  `user_id` INT NOT NULL,
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
  `note_id` INT NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `date` DATE NOT NULL,
  `tags` VARCHAR(255) NULL,
  `user_user_id` INT NOT NULL,
  PRIMARY KEY (`note_id`),
  INDEX `fk_note_user_idx` (`user_user_id` ASC),
  CONSTRAINT `fk_note_user`
    FOREIGN KEY (`user_user_id`)
    REFERENCES `edu_db`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
