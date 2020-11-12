-- MySQL Script generated by MySQL Workbench
-- Sat Nov  7 10:33:51 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema id15018040_cargapp
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema id15018040_cargapp
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `id15018040_cargapp` DEFAULT CHARACTER SET utf8 ;
USE `id15018040_cargapp` ;

-- -----------------------------------------------------
-- Table `id15018040_cargapp`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id15018040_cargapp`.`cliente` (
  `cedula` int(20) NOT NULL,
  `nit` VARCHAR(50) NOT NULL,
  `razonsocial` VARCHAR(255) NOT NULL,
  `nombres` VARCHAR(255) NOT NULL,
  `apellidos` VARCHAR(255) NOT NULL,
  `tpdocumento` VARCHAR(50) NOT NULL,
  `direccion` VARCHAR(255) NOT NULL,
  `departamento` VARCHAR(255) NOT NULL,
  `municipio` VARCHAR(255) NOT NULL,
  `telefono` VARCHAR(255) NOT NULL,
  `correo` VARCHAR(255) NULL,
  `rol` int(10) NOT NULL,
  PRIMARY KEY (`cedula`))
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `id15018040_cargapp`.`conductor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id15018040_cargapp`.`conductor` (
  `cedula` INT(255) NOT NULL,
  `nombres` VARCHAR(255) NOT NULL,
  `apellidos` VARCHAR(255) NOT NULL,
  `telefono` VARCHAR(255) NOT NULL,
  `departamento` VARCHAR(255) NOT NULL,
  `municipio` VARCHAR(255) NOT NULL,
  `direccion` VARCHAR(255) NOT NULL,
  `correo` VARCHAR(255) NULL,
  `tpvehiculo` VARCHAR(255) NOT NULL,
  `licencia` VARCHAR(255) NOT NULL,
  `soat` VARCHAR(255) NULL,
  `tecmeca` VARCHAR(255) NOT NULL,
  `rol` int(10) NOT NULL,
  PRIMARY KEY (`cedula`))
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `id15018040_cargapp`.`departamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id15018040_cargapp`.`departamento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `id15018040_cargapp`.`municipio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id15018040_cargapp`.`municipio` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `id15018040_cargapp`.`oferta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id15018040_cargapp`.`oferta` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(255) NOT NULL,
  `dtosalidaid` INT(11) NOT NULL,
  `dtodestinoid` INT(11) NOT NULL,
  `mpiosalidaid` INT(11) NOT NULL,
  `mpiodestinoid` INT(11) NOT NULL,
  `barrio` VARCHAR(255) NOT NULL,
  `direccionsalida` VARCHAR(255) NOT NULL,
  `direcciondestino` VARCHAR(255) NOT NULL,
  `pesocarga` VARCHAR(255) NOT NULL,
  `tipovehiculo` VARCHAR(255) NOT NULL,
  `valorflete` VARCHAR(255) NOT NULL,
  `fechasalida` DATE NOT NULL,
  `fechaentrega` DATE NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fkmunicipio_salida`
    FOREIGN KEY (`mpiosalidaid`)
    REFERENCES `id15018040_cargapp`.`municipio` (`id`),
  CONSTRAINT `oferta_ibfk_1`
    FOREIGN KEY (`dtosalidaid`)
    REFERENCES `id15018040_cargapp`.`departamento` (`id`))
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `id15018040_cargapp`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id15018040_cargapp`.`usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(255) NOT NULL,
  `contraseña` VARCHAR(255) NOT NULL,
  `clienteid` INT(20) NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fkusuario_cliente`
    FOREIGN KEY (`clienteid`)
    REFERENCES `id15018040_cargapp`.`cliente` (`cedula`))
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `id15018040_cargapp`.`usuariocond`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id15018040_cargapp`.`usuariocond` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(255) NOT NULL,
  `contraseña` VARCHAR(255) NOT NULL,
  `conductorid` INT(20) NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fkusuario_conductor`
    FOREIGN KEY (`conductorid`)
    REFERENCES `id15018040_cargapp`.`conductor` (`cedula`))
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `id15018040_cargapp`.`vehiculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id15018040_cargapp`.`vehiculo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nroplaca` VARCHAR(255) NOT NULL,
  `conductorid` INT(11) NOT NULL,
  `marca` VARCHAR(255) NOT NULL,
  `modelo` VARCHAR(255) NOT NULL,
  `color` VARCHAR(255) NOT NULL,
  `capacidadmax` VARCHAR(255) NOT NULL,
  `tipovehiculo` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fkcoductor_vehiculo`
    FOREIGN KEY (`conductorid`)
    REFERENCES `id15018040_cargapp`.`conductor` (`cedula`))
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
