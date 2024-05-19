<?php

include_once 'db_connect.php';

try{

  // Récupération des données du formulaire
  $id_course = $_POST['id_course'];
  $id_chauffeur = $_POST['id_chauffeur'];
  
  // Mise à jour du statut et affectation du chauffeur
   $sql = "UPDATE course SET id_chauffeur = ?, statut = 'en cours' WHERE id = ?";
   $stmt = $connexion->prepare($sql);
   $stmt->execute([$id_chauffeur, $id_course]);
   echo "Le chauffeur a été affecté à la course avec succès!";

}

catch(PDOException $e){
  echo "Une erreur est survenue lors de l'affectation du chauffeur.";
  echo $e -> getMessage();

}

?>
