<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include ('connexion_bdd.php');


    $search = $_POST['search'];

    if(isset($_POST['search'])) {
      $search = $_POST['search'];
    
      $sql = "SELECT * from `recipes` WHERE 'recipe' LIKE '%$search%' OR 'categorie' LIKE '%$search%' OR 'ingredient' LIKE '%$search%'";
    
      $result = $db->query($sql);
    
      if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
    echo '<h2 class="card-title">' . $row['recipe'] . '</h2><br>' .   
        '<h5>Ingredients for 4 peoples :</h5><br>' . $row['ingredient'] . '<br>' .
        '<h5>Cooking time :</h5>' . $row['timing'] . 'minutes<br>' .
        '<h5>Procedure :</h5><br>' . $row['description'];
        }
      }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>
<body>
<form action="search.php" method="POST" role="search">
        <input name="search" type="search" placeholder="Search">
        <button id ="search" type="submit" value="search">Search</button>
      </form>

    
</body>
</html>