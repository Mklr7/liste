<?php
    session_start();
    mysqli_report(MYSQLI_REPORT_OFF);

    //**********Paramètres utilisés par la bdd *******************
    $user = 'mesut';
    $pass = 'kircilm';
    $host = 'localhost';
    $bdd = 'exo';
    //************************************************************

    //***********Connexion à la base de données*******************
    $bdd = new mysqli($host,$user,$pass,$bdd);
    //************************************************************;

    // Vérifier la connexion
    if ($bdd->connect_error) 
    {
        die('Impossible de se connecter à MySQL: '. $bdd->connect_error);
    }
    
    echo 'Connexion à la bdd reussie !!!<br>';
?>