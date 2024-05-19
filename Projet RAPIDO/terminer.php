<?php
include_once("db_connect.php");

$chauffeurId = $_POST['id'];
$courseId = $_POST['course_id'];

$req = $connexion->prepare("UPDATE course SET statut='Terminée' WHERE id=$courseId");
$req->execute();

try{
$req2 = $connexion->prepare("UPDATE chauffeur SET disponibilite=1 WHERE id=$chauffeurId");
$req2->execute();
}catch(PDOException $e){
    echo $e->getMessage();
}