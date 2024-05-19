<?php

// Creation des variables nous permettant d'instancier la classe pdo
$server = "localhost";
$user = "root";
$password = "";
$bdd = "transport";


// Creation des variables nous permettant de se connecter a la base
try{
    $connexion = new PDO("mysql:host=$server;dbname=$bdd",$user,$password);
}

catch(PDOException $e){
    echo"Echec de connexion : ".$e->getMessage();
}
