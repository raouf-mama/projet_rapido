<?php

include_once 'db_connect.php';

// Récupération des données du formulaire
$id_course = $_POST['id_course'];

// Mise à jour du statut
$sql = "UPDATE course SET statut = 'terminee' WHERE id = ?";
$stmt = $connexion->prepare($sql);



if ($stmt->execute($id_course)) {
  echo "Le statut de la course a été mis à jour avec succès!";
} else {
  echo "Une erreur est survenue lors de la mise à jour du statut.";

}
?>