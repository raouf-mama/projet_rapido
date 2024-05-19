<?php include_once("db_connect.php");?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des courses de taxis</title>
     <link rel="stylesheet" href="courses.css"> 
     <link href="bootstrap.min.css" rel="stylesheet">
</head>

<body class="morel">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">RAPIDO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="exampt.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="propos.php">À propos</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="courses.php">Gestion des courses</a>
          </li>
       
        </ul>
      </div>
    </div>
  </nav>
    <div class="container">
    <div class="formulaire">
        <h1>Gestion des taxis</h1>
        </div>
        <div id="ajouter-course">
        <div class="formulaire">
            <h1>NOUVELLE COURSE</h1>
            <form action="ajouter-course.php" method="post" class="form-group">
                <label for="point_depart">DÉPART:</label>
                <input type="text" class="form-control" id="point_depart" name="point_depart" required><br><br>

                <label for="point_arrivee">ARRIVÉE:</label>
                <input type="text" class="form-control" id="point_arrivee" name="point_arrivee" required><br><br>

                <label for="date_heure">Date et heure:</label>
                <input type="datetime-local" class="form-control" id="date_heure" name="date_heure" required><br><br>

                
                 <label for="id_chauffeur">CHAUFFEUR:</label>
                    <select class="form-control" id="id_chauffeur" name="id_chauffeur">
                        <?php 
                            $req = $connexion->prepare("SELECT * FROM chauffeur WHERE disponibilite='1'");
                            $req->execute();
                            $chauffeurs = $req->fetchAll();
                            
                            foreach($chauffeurs as $chauffeur){
                                echo '<option value="'.$chauffeur['id'].'">'.$chauffeur['nom'].' '.$chauffeur['prenomm'].'</option>';
                            }
                        
                        ?>
                    </select>
                    
<br>
             <button type="submit" class="btn btn-primary">ENREGISTRER</button>
            </form>
        
        </div>

        <div id="liste-courses">
            <h2>Liste des courses</h2>
            <table class="ma table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>DÉPART</th>
                        <th>ARRIVÉE</th>
                        <th>Date et heure</th>
                        <th>CHAUFFEUR</th>
                        <th>MENTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $req = $connexion->prepare("SELECT * FROM course WHERE statut='en cours' XOR statut='Terminée'");
                        $req->execute();
                        $courses = $req->fetchAll();

                        

                        foreach($courses as $course){
                            echo '
                            <tr>
                                <td>'.$course['id'].'</td>
                                <td>'.$course['point_depart'].'</td>
                                <td>'.$course['point_arrivee'].'</td>
                                <td>'.$course['date_heure'].'</td>
                                <td>';
                                try{
                                    $chauff = $course['chauffeur_id'];
                                    $req2 = $connexion->prepare("SELECT * FROM chauffeur WHERE id=$chauff");
                                    $req2->execute();
                                    $unchauff = $req2->fetch();
                                    
                                    echo $unchauff['nom'].' '.$unchauff['prenom'].' 
                                    </td>
                                    <td>'.$course['statut'].' </td>
                                    <td><input type="submit" value="'.$course['chauffeur_id'].'" class="termine"></td>
                                </tr>';
                                }catch(PDOException $e){
                                    echo $e->getMessage();
                                }
                        }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

    <script src="./jquery-3.7.1.js"> </script>
    <script src="./scri.js"></script>
</body>

</html>
          
