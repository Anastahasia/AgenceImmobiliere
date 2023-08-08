use immo;

CREATE TABLE `bien` (
	`id_bien` INT NOT NULL AUTO_INCREMENT,
	`nom` varchar(100) NOT NULL,
	`type` varchar(30) NOT NULL,
	`superficie` DECIMAL NOT NULL,
	`pieces` INT NOT NULL,
	`adresse` varchar(500) NOT NULL,
	`code_postale` INT NOT NULL,
	`ville` varchar(50) NOT NULL,
	`description` varchar(500) NOT NULL,
	`contrat` varchar(50) NOT NULL,
	`prix` varchar(50) NOT NULL,
	`statut` varchar(50) NOT NULL,
	`photo1` varchar(500) NOT NULL,
	`photo2` varchar(500) NOT NULL,
	`photo3` varchar(500) NOT NULL,
	`proprietaire` INT NOT NULL,
	PRIMARY KEY (`id_bien`),
  KEY `bien_fk0` (`proprietaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `utilisateur` (
	`id_utilisateur` INT NOT NULL AUTO_INCREMENT,
	`nom` varchar(50) NOT NULL,
	`prenom` varchar(50) NOT NULL,
	`tel` varchar(10) NOT NULL,
	`email` varchar(200) NOT NULL,
	`mot_de_passe` varchar(500) NOT NULL,
	`role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

ALTER TABLE `bien` ADD CONSTRAINT `bien_fk0` FOREIGN KEY (`proprietaire`) REFERENCES `utilisateur`(`id_utilisateur`);



