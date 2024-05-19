<?php

include_once 'db_connect.php';

$table="

CREATE TABLE IF NOT EXISTS chauffeur(
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(255),
  prenom VARCHAR(255),
  numero_telephone INT,
  sexe VARCHAR(255),
  disponibilite BOOLEAN
);
CREATE TABLE IF NOT EXISTS course (
 id INT AUTO_INCREMENT PRIMARY KEY,
 point_depart VARCHAR(255),
 point_arrivee VARCHAR(255),
 date_heure DATETIME,
 chauffeur_id INT,
 FOREIGN KEY (chauffeur_id) REFERENCES chauffeur (id),
 statut varchar(255)
);

";
try {
  $connexion->exec($table);
  echo "Table crée avec succès";
} catch (PDOException $e) {
  echo "Erreur de la creation de la table: ".$e->getMessage();
}
?>