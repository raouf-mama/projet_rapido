<?php  

include_once 'db_connect.php';

try{

    $table=[
        array('SABI DENI', 'Idrissou', '95879063', 'Masculin', '1'),
        array('BANDIRI', 'Mohamed', '96910022', 'Masculin', '1')
    
    ];

    $inserer_chauffeur ="INSERT INTO chauffeur (
        nom,
        prenom, 
        numero_telephone, 
        sexe, 
        disponibilite) 

        VALUES(?, ?, ?, ?, ?)
        
    ";
    $req = $connexion->prepare($inserer_chauffeur);
    
    foreach($table as $chauffeur){
        $req->execute($chauffeur);
    }
    echo "L'insertion des chauffeur est un succes";


} 
catch(PDOException $e){
    echo " L'insertion a echoué ";
    echo $e -> getMessage();

}

?>