<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include ('connexion_bdd.php');

if(!$_SESSION['mdp']){
    header('Location: connexion_admin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recettes à approuver</title>
</head>
<body>
    <button type="submit"><a href="index_admin.php">Retour</a></button>
    <?php
    $sql = "SELECT * FROM `recipes` WHERE `status` = '0'";
    $query = $db->prepare($sql);
    $query->execute();
    $article = $query->fetchAll();
    // var_dump($article);
    for ($i=0; $i < count($article); $i++) { 
        
        ?>
        <div class="article" style="border: 1px solid black;">
            <h1><?= $article[$i]['recipe']; ?></h1>
            <br>
            <p><?= $article[$i]['categorie'];?></p>
            <p><?= $article[$i]['ingredient'];?></p>
            <p><?= $article[$i]['timing'];?></p>
            <p><?= $article[$i]['description']?></p>
            <?php
            if (isset($_POST['envoi'.$i])) {

                $sql = "UPDATE `recipes` SET `status` = '1' WHERE `id` = :id";
                $query = $db->prepare($sql);
                $query->bindValue(':id', $article[$i]['id'], PDO::PARAM_STR);
                $query->execute();
                
                    
                    echo "La recette a bien été ajoutée à la base de donnée.";
            
                }
            if (isset($_POST['delete'.$i])) {

                $sql = "DELETE FROM `recipes` WHERE `id` = :id";
                $query = $db->prepare($sql);
                $query->bindValue(':id', $article[$i]['id'], PDO::PARAM_STR);
                $query->execute();
                
                    
                    echo "La recette a bien été supprimée à la base de donnée.";
            
                }
            ?>
            <form action="" method="post">
        <?php
        echo "<button name='envoi$i' type='submit'>Ajouter la recette</button>";
        echo "<button name='delete$i' type='submit'>Supprimer la recette</button>";
        ?>
        
    </form>
            
            
        </div>
        <br>
        <?php
    }

    ?>
</body>
</html>