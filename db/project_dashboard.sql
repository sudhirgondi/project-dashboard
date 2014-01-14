SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `project_dashboard` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `project_dashboard` ;

-- -----------------------------------------------------
-- Table `project_dashboard`.`project_statuses`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `project_dashboard`.`project_statuses` (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `created_at` DATETIME NULL ,
  `updated_at` BLOB NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project_dashboard`.`projects`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `project_dashboard`.`projects` (
  `id` INT NOT NULL ,
  `project_status_id` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `start_date` DATETIME NULL ,
  `end_date` DATETIME NULL ,
  `created_at` DATETIME NULL ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_projects_project_statuses1_idx` (`project_status_id` ASC) ,
  CONSTRAINT `fk_projects_project_statuses1`
    FOREIGN KEY (`project_status_id` )
    REFERENCES `project_dashboard`.`project_statuses` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project_dashboard`.`deliverables`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `project_dashboard`.`deliverables` (
  `id` INT NOT NULL ,
  `project_id` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `start_date` DATETIME NULL ,
  `end_date` DATETIME NULL ,
  `loe` INT NULL ,
  `progress` INT NULL ,
  `created_at` DATETIME NULL ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_deliverables_projects1_idx` (`project_id` ASC) ,
  CONSTRAINT `fk_deliverables_projects1`
    FOREIGN KEY (`project_id` )
    REFERENCES `project_dashboard`.`projects` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project_dashboard`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `project_dashboard`.`users` (
  `id` INT NOT NULL ,
  `first_name` VARCHAR(45) NULL ,
  `last_name` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NULL ,
  `password` VARCHAR(45) NULL ,
  `description` VARCHAR(45) NULL ,
  `user_level` VARCHAR(45) NULL ,
  `created_at` DATETIME NULL ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project_dashboard`.`resources`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `project_dashboard`.`resources` (
  `id` INT NOT NULL ,
  `deliverable_id` INT NOT NULL ,
  `user_id` INT NOT NULL ,
  `created_at` DATETIME NULL ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_resources_deliverables1_idx` (`deliverable_id` ASC) ,
  INDEX `fk_resources_users1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_resources_deliverables1`
    FOREIGN KEY (`deliverable_id` )
    REFERENCES `project_dashboard`.`deliverables` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_resources_users1`
    FOREIGN KEY (`user_id` )
    REFERENCES `project_dashboard`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project_dashboard`.`test_case_types`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `project_dashboard`.`test_case_types` (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `created_at` DATETIME NULL ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project_dashboard`.`test_case_statuses`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `project_dashboard`.`test_case_statuses` (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `created_at` DATETIME NULL ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project_dashboard`.`test_cases`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `project_dashboard`.`test_cases` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `test_case_type_id` INT NOT NULL ,
  `deliverable_id` INT NOT NULL ,
  `test_case_status_id` INT NOT NULL ,
  `count` INT NULL ,
  `progress` INT NULL ,
  `created_at` DATETIME NULL ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_test_cases_test_case_type1_idx` (`test_case_type_id` ASC) ,
  INDEX `fk_test_cases_deliverables1_idx` (`deliverable_id` ASC) ,
  INDEX `fk_test_cases_test_case_status1_idx` (`test_case_status_id` ASC) ,
  CONSTRAINT `fk_test_cases_test_case_type1`
    FOREIGN KEY (`test_case_type_id` )
    REFERENCES `project_dashboard`.`test_case_types` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_test_cases_deliverables1`
    FOREIGN KEY (`deliverable_id` )
    REFERENCES `project_dashboard`.`deliverables` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_test_cases_test_case_status1`
    FOREIGN KEY (`test_case_status_id` )
    REFERENCES `project_dashboard`.`test_case_statuses` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project_dashboard`.`defect_types`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `project_dashboard`.`defect_types` (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `created_at` DATETIME NULL ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project_dashboard`.`defect_statuses`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `project_dashboard`.`defect_statuses` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `created_at` VARCHAR(45) NULL ,
  `updated_at` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project_dashboard`.`defects`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `project_dashboard`.`defects` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `defect_type_id` INT NOT NULL ,
  `test_cases_id` INT NOT NULL ,
  `defect_status_id` INT NOT NULL ,
  `status` TINYINT NULL ,
  `count` INT NULL ,
  `created_at` DATETIME NULL ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_defects_defect_type_idx` (`defect_type_id` ASC) ,
  INDEX `fk_defects_test_cases1_idx` (`test_cases_id` ASC) ,
  INDEX `fk_defects_defect_statuses1_idx` (`defect_status_id` ASC) ,
  CONSTRAINT `fk_defects_defect_type`
    FOREIGN KEY (`defect_type_id` )
    REFERENCES `project_dashboard`.`defect_types` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_defects_test_cases1`
    FOREIGN KEY (`test_cases_id` )
    REFERENCES `project_dashboard`.`test_cases` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_defects_defect_statuses1`
    FOREIGN KEY (`defect_status_id` )
    REFERENCES `project_dashboard`.`defect_statuses` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `project_dashboard` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
