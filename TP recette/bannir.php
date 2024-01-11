<?php

session_start();
$bdd = new PDO('mysql:host=localhost;dbname=cuisine;', 'mesut', 'kircilm');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recupUsers = $bdd->prepare('SELECT * FROM user WHERE id = ?');
    $recupUsers->execute(array($getid));
    if($recupUsers->rowCount() > 0){

        $bannirUser = $bdd->prepare('DELETE FROM user WHERE id = ?');
        $bannirUser->execute(array($getid));

        header('Location: membres.php');

    }else{
     echo "Aucun membre n'a été trouver..."; 
    }

    }else{
    echo "L'indentifiant n'a pas été récupérer";
}
?>