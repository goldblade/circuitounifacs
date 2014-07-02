SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `circuito` ;
CREATE SCHEMA IF NOT EXISTS `circuito` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `circuito` ;

-- -----------------------------------------------------
-- Table `circuito`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `circuito`.`usuario` ;

CREATE  TABLE IF NOT EXISTS `circuito`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(45) NOT NULL ,
  `senha` VARCHAR(45) NOT NULL ,
  `nome` VARCHAR(45) NOT NULL ,
  `matricula` VARCHAR(45) NULL ,
  `perfil` SET('admin', 'palestrante', 'participante') NULL ,
  `telefone` VARCHAR(15) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `circuito`.`edicaoCircuito`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `circuito`.`edicaoCircuito` ;

CREATE  TABLE IF NOT EXISTS `circuito`.`edicaoCircuito` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `data_inicio` DATE NOT NULL ,
  `data_final` DATE NULL ,
  `status` SET('ativo', 'finalizado', 'cancelado') NOT NULL DEFAULT 'ativo' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `circuito`.`tipoEvento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `circuito`.`tipoEvento` ;

CREATE  TABLE IF NOT EXISTS `circuito`.`tipoEvento` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `circuito`.`evento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `circuito`.`evento` ;

CREATE  TABLE IF NOT EXISTS `circuito`.`evento` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `edicaoCircuito_id` INT NOT NULL ,
  `nome` VARCHAR(45) NOT NULL ,
  `tipoEvento_id` INT NOT NULL ,
  `cargahoraria` INT NOT NULL ,
  `detalhes` TEXT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_atividade_evento1` (`edicaoCircuito_id` ASC) ,
  INDEX `fk_atividade_tipo_atividade1` (`tipoEvento_id` ASC) ,
  CONSTRAINT `fk_atividade_evento1`
    FOREIGN KEY (`edicaoCircuito_id` )
    REFERENCES `circuito`.`edicaoCircuito` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_atividade_tipo_atividade1`
    FOREIGN KEY (`tipoEvento_id` )
    REFERENCES `circuito`.`tipoEvento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `circuito`.`Campi`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `circuito`.`Campi` ;

CREATE  TABLE IF NOT EXISTS `circuito`.`Campi` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `endereco` VARCHAR(45) NULL ,
  `telefone` VARCHAR(45) NULL ,
  `maps` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `circuito`.`tipoSala`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `circuito`.`tipoSala` ;

CREATE  TABLE IF NOT EXISTS `circuito`.`tipoSala` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `detalhes` TEXT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `circuito`.`sala`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `circuito`.`sala` ;

CREATE  TABLE IF NOT EXISTS `circuito`.`sala` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `campi_id` INT NOT NULL ,
  `capacidade_maxima` INT NOT NULL ,
  `descricao` VARCHAR(45) NOT NULL ,
  `tipoSala_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_espaco_Campi` (`campi_id` ASC) ,
  INDEX `fk_sala_tipoSala1` (`tipoSala_id` ASC) ,
  CONSTRAINT `fk_espaco_Campi`
    FOREIGN KEY (`campi_id` )
    REFERENCES `circuito`.`Campi` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sala_tipoSala1`
    FOREIGN KEY (`tipoSala_id` )
    REFERENCES `circuito`.`tipoSala` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `circuito`.`eventoPorSala`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `circuito`.`eventoPorSala` ;

CREATE  TABLE IF NOT EXISTS `circuito`.`eventoPorSala` (
  `id` INT NOT NULL ,
  `data_inicio` DATETIME NOT NULL ,
  `data_fim` DATETIME NOT NULL ,
  `sala_id` INT NOT NULL ,
  `evento_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_agenda_espaco1` (`sala_id` ASC) ,
  INDEX `fk_agenda_atividade1` (`evento_id` ASC) ,
  CONSTRAINT `fk_agenda_espaco1`
    FOREIGN KEY (`sala_id` )
    REFERENCES `circuito`.`sala` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_agenda_atividade1`
    FOREIGN KEY (`evento_id` )
    REFERENCES `circuito`.`evento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `circuito`.`inscricao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `circuito`.`inscricao` ;

CREATE  TABLE IF NOT EXISTS `circuito`.`inscricao` (
  `usuario_id` INT NOT NULL ,
  `eventoPorSala_id` INT NOT NULL ,
  `filaEspera` TINYINT(1) NOT NULL ,
  `data_hora_cadastro` DATETIME NOT NULL ,
  PRIMARY KEY (`usuario_id`, `eventoPorSala_id`) ,
  INDEX `fk_usuario_has_inscricao_eventoPorSala1` (`eventoPorSala_id` ASC) ,
  INDEX `fk_usuario_has_inscricao_usuario1` (`usuario_id` ASC) ,
  CONSTRAINT `fk_usuario_has_inscricao_usuario1`
    FOREIGN KEY (`usuario_id` )
    REFERENCES `circuito`.`usuario` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_inscricao_eventoPorSala1`
    FOREIGN KEY (`eventoPorSala_id` )
    REFERENCES `circuito`.`eventoPorSala` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `circuito`.`palestrante`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `circuito`.`palestrante` ;

CREATE  TABLE IF NOT EXISTS `circuito`.`palestrante` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `telefone` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `circuito`.`palestrante_eventoPorSala`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `circuito`.`palestrante_eventoPorSala` ;

CREATE  TABLE IF NOT EXISTS `circuito`.`palestrante_eventoPorSala` (
  `palestrante_id` INT NOT NULL ,
  `eventoPorSala_id` INT NOT NULL ,
  PRIMARY KEY (`palestrante_id`, `eventoPorSala_id`) ,
  INDEX `fk_palestrante_has_eventoPorSala_eventoPorSala1` (`eventoPorSala_id` ASC) ,
  INDEX `fk_palestrante_has_eventoPorSala_palestrante1` (`palestrante_id` ASC) ,
  CONSTRAINT `fk_palestrante_has_eventoPorSala_palestrante1`
    FOREIGN KEY (`palestrante_id` )
    REFERENCES `circuito`.`palestrante` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_palestrante_has_eventoPorSala_eventoPorSala1`
    FOREIGN KEY (`eventoPorSala_id` )
    REFERENCES `circuito`.`eventoPorSala` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
