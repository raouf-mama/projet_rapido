<?php

include_once 'db_connect.php';

// Récupération des données du formulaire
$point_depart = $_POST['point_depart'];
$point_arrivee = $_POST['point_arrivee'];
$date_heure = $_POST['date_heure'];
$chauffeur = $_POST['id_chauffeur'];

// Insertion de la nouvelle course dans la base de données
$sql = "INSERT INTO course (point_depart, point_arrivee, date_heure, chauffeur_id, statut) VALUES (?, ?, ?, ?, 'en cours')";
$stmt = $connexion->prepare($sql);

if ($stmt->execute([$point_depart, $point_arrivee, $date_heure, $chauffeur])) {
  echo "La course a été ajoutée avec succès!";
} else {
  echo "Une erreur est survenue lors de l'ajout de la course.";
}

try{
$req = $connexion->prepare("UPDATE chauffeur SET disponibilite= 0 WHERE id=$chauffeur");
$req->execute();
}catch(PDOException $e){
  echo $e->getMessage();
}

header("location:courses.php");