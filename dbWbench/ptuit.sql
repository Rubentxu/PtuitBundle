SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `ptuit2` ;
CREATE SCHEMA IF NOT EXISTS `ptuit2` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `ptuit2` ;

-- -----------------------------------------------------
-- Table `ptuit2`.`CATEGORY`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ptuit2`.`CATEGORY` ;

CREATE  TABLE IF NOT EXISTS `ptuit2`.`CATEGORY` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(30) NOT NULL ,
  `category` INT(10) UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`, `category`) ,
  INDEX `fk_CATEGORY_CATEGORY1` (`category` ASC) ,
  CONSTRAINT `fk_CATEGORY_CATEGORY1`
    FOREIGN KEY (`category` )
    REFERENCES `ptuit2`.`CATEGORY` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


DROP TABLE IF EXISTS `ptuit2`.`SMS` ;

CREATE  TABLE IF NOT EXISTS `ptuit2`.`SMS` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `texto` TEXT NOT NULL ,
  `mod` TIMESTAMP NOT NULL ,
  `category` INT(10) UNSIGNED NOT NULL ,
  `user` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`, `category`, `user`) ,
  INDEX `fk_SMS_CATEGORY` USING BTREE (`category` ASC) ,
  INDEX `fk_SMS_USER1` (`user` ASC) ,
  CONSTRAINT `fk_SMS_CATEGORY`
    FOREIGN KEY (`category` )
    REFERENCES `ptuit2`.`CATEGORY` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SMS_USER1`
    FOREIGN KEY (`user` )
    REFERENCES `ptuit2`.`USER` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `ptuit2`.`USER`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ptuit2`.`USER` ;

CREATE  TABLE IF NOT EXISTS `ptuit2`.`USER` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nick` VARCHAR(16) NOT NULL ,
  `hashPass` CHAR(160) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;





-- -----------------------------------------------------
-- Table `ptuit2`.`TAGS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ptuit2`.`TAGS` ;

CREATE  TABLE IF NOT EXISTS `ptuit2`.`TAGS` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` CHAR(10) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `ptuit2`.`SMS_TAGS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ptuit2`.`SMS_TAGS` ;

CREATE  TABLE IF NOT EXISTS `ptuit2`.`SMS_TAGS` (
  `SMS_id` INT UNSIGNED NOT NULL ,
  `TAGS_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`SMS_id`, `TAGS_id`) ,
  INDEX `fk_SMS_has_TAGS_TAGS1` (`TAGS_id` ASC) ,
  INDEX `fk_SMS_has_TAGS_SMS` (`SMS_id` ASC) ,
  CONSTRAINT `fk_SMS_has_TAGS_SMS`
    FOREIGN KEY (`SMS_id` )
    REFERENCES `ptuit2`.`SMS` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SMS_has_TAGS_TAGS1`
    FOREIGN KEY (`TAGS_id` )
    REFERENCES `ptuit2`.`TAGS` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;




SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

