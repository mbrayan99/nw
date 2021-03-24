CREATE TABLE `panaderia`.`productos` (
  `codprd` BIGINT(18) NOT NULL AUTO_INCREMENT,
  `dscprd` VARCHAR(70) NOT NULL, /*Desp*/
  `sdscprd` VARCHAR(255) NOT NULL, /*Desp small*/
  `ldscprd` TEXT NULL, /*Desp larg*/
  `skuprd` VARCHAR(128) NOT NULL, /*Codigo interno*/
  `catprd` CHAR(3) NOT NULL, /*Cate*/
  `prcprd` DECIMAL(12,2) NOT NULL, /*Precio*/
  `urlprd` VARCHAR(255) NULL, /*URL*/
  `urlthbprd` VARCHAR(255) NULL, /* URL 2*/
  `estprd` CHAR(3) NOT NULL, /*Estado*/
  PRIMARY KEY (`codprd`),
  UNIQUE INDEX `skuprd_UNIQUE`(`skuprd` ASC)); 

CREATE TABLE `panaderia`.`carretilla` (
  `usercod` BIGINT(10) NOT NULL,
  `codprd` BIGINT(18) NOT NULL,
  `crrctd` INT(5) NOT NULL,
  `crrprc` DECIMAL(12,2) NOT NULL,
  `crrfching` DATETIME NOT NULL,
  PRIMARY KEY (`usercod`, `codprd`),
  INDEX `codprd_idx` (`codprd` ASC),
  CONSTRAINT `carretilla_user_key`
    FOREIGN KEY (`usercod`)
    REFERENCES `panaderia`.`usuario` (`usercod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `carretilla_prd_key`
    FOREIGN KEY (`codprd`)
    REFERENCES `panaderia`.`productos` (`codprd`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE `panaderia`.`carretillaanon` (
  `anoncod` varchar(128) NOT NULL,
  `codprd` bigint(18) NOT NULL,
  `crrctd` int(5) NOT NULL,
  `crrprc` decimal(12,2) NOT NULL,
  `crrfching` datetime NOT NULL,
  PRIMARY KEY (`anoncod`,`codprd`),
  KEY `codprd_idx` (`codprd`),
  CONSTRAINT `carretillaanon_prd_key` FOREIGN KEY (`codprd`) REFERENCES `productos` (`codprd`) ON DELETE NO ACTION ON UPDATE NO ACTION
);
