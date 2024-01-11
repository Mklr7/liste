<?php 
error_reporting(E_ALL);
ini_set('display_error', 1);
include 'connexion.php';
if ($_POST) {
    $date=new DateTime();
    $date->format("Y-m-d H-i-s");
    $hash=password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO `user`(`nom`, `prenom`, `email`, `mdp`, `date_inscription`) VALUES (':nom',':prenom',':email',':mdp',':dates')"
    $query=$bdd->prepare($sql);
    $query->bindValue (':nom',$_POST['nom'], PDO::PARAM_STR);
    $query->bindValue (':prenom',$_POST['prenom'], PDO::PARAM_STR);
    $query->bindValue (':email',$_POST['email'], PDO::PARAM_STR);
    $query->bindValue (':mdp',$hash['mdp'], PDO::PARAM_STR);
    $query->bindValue (':dates',$date, PDO::PARAM_STR);
    $query->execute();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="nom" placeholder="nom">

        <input type="text" name="prenom" placeholder="prenom">

        <input type="email" name="email" placeholder="email">

        <input type="mdp" name="mdp" placeholder="mdp">
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>