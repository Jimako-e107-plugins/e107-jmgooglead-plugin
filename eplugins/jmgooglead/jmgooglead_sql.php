CREATE TABLE jmgooglead (
  `googlead_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `googlead_name` VARCHAR(255) NOT NULL DEFAULT '',
  `googlead_gaid` VARCHAR(64) NOT NULL DEFAULT '',
  `googlead_code` TEXT NOT NULL,
  `googlead_note` VARCHAR(255) NOT NULL DEFAULT '',
  `googlead_active` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
  `googlead_class` VARCHAR(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`googlead_id`)
) ENGINE=InnoDB;
