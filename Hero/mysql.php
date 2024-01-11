<?php

// Configurations de la base de données
$servername = "localhost";
$username = "mesut";
$password = "kircilm";
$dbname = "hero";

// Créez une connexion à la base de données
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
?>
