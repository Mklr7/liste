<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=cuisine;', 'mesut', 'kircilm');
if(!$_SESSION['mdp']){
    header('Location: connexion_admin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher les membres</title>
</head>
<body>

   <!--  Afficher tous les membres -->
   <?php
     $recupUsers = $bdd->query('SELECT * FROM user');
     while($user = $recupUsers->fetch()) {
        ?>  
        <p><?= $user['nom']; ?> <a href="bannir.php?id=<?= $user['id']; ?>" style="color: red; text-decoration: none;">Bannir le membre </a></p>
        <?php
     }
   ?>

    <!-- Fin afficher tous les membres -->
</body>
</html>