SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `survey` ;
CREATE SCHEMA IF NOT EXISTS `survey` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `survey` ;

-- -----------------------------------------------------
-- Table `survey`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `survey`.`user` ;

CREATE TABLE IF NOT EXISTS `survey`.`user` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `phone` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `survey`.`questionCategory`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `survey`.`questionCategory` ;

CREATE TABLE IF NOT EXISTS `survey`.`questionCategory` (
  `catid` INT NOT NULL,
  `category` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`catid`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `survey`.`questiontype`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `survey`.`questiontype` ;

CREATE TABLE IF NOT EXISTS `survey`.`questiontype` (
  `typeid` INT NOT NULL,
  `type` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`typeid`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `survey`.`questions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `survey`.`questions` ;

CREATE TABLE IF NOT EXISTS `survey`.`questions` (
  `qid` INT NOT NULL,
  `question` VARCHAR(150) NOT NULL,
  `typeid` VARCHAR(45) NOT NULL,
  `questionCategory_catid` INT NOT NULL,
  `questiontype_typeid` INT NOT NULL,
  PRIMARY KEY (`qid`),
  CONSTRAINT `fk_questions_questionCategory1`
    FOREIGN KEY (`questionCategory_catid`)
    REFERENCES `survey`.`questionCategory` (`catid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_questions_questiontype1`
    FOREIGN KEY (`questiontype_typeid`)
    REFERENCES `survey`.`questiontype` (`typeid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_questions_questionCategory1_idx` ON `survey`.`questions` (`questionCategory_catid` ASC);

CREATE INDEX `fk_questions_questiontype1_idx` ON `survey`.`questions` (`questiontype_typeid` ASC);


-- -----------------------------------------------------
-- Table `survey`.`questionsAns`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `survey`.`questionsAns` ;

CREATE TABLE IF NOT EXISTS `survey`.`questionsAns` (
  `id` INT NOT NULL,
  `opt1` VARCHAR(45) NULL,
  `opt2` VARCHAR(45) NULL,
  `opt3` VARCHAR(45) NULL,
  `opt4` VARCHAR(45) NULL,
  `answer` VARCHAR(150) NULL,
  `questions_qid` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_questionsAns_questions1`
    FOREIGN KEY (`questions_qid`)
    REFERENCES `survey`.`questions` (`qid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_questionsAns_questions1_idx` ON `survey`.`questionsAns` (`questions_qid` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
