<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include ('connexion_bdd.php');
//Récupération des desserts dans la base de données par ordre du plus récent au plus ancien.
$sql = "SELECT * FROM `recipes` WHERE `categorie` = 'dessert' ORDER BY `id` DESC";
  $query = $db->query($sql);
  $recipe = $query->fetchAll();
  // var_dump($recipe);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Our desserts</title>
</head>

<nav class="navbar  navbar-expand-lg bg-white">
    <div class="container-fluid ">
        <a class="navbar-brand" href="index.php"><img src="image/Grouplogo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Recipes
                    </a>
                    <!--  faire un deroulant avec js via bootstrap -->
                    <ul class="dropdown-menu">
                        Category :
                        <br>
                        <li><a class="dropdown-item" href="starters.php">Starters</a></li>
                        <li><a class="dropdown-item" href="mains.php">Mains</a></li>
                        <li><a class="dropdown-item" href="desserts.php">Desserts</a></li>
                        <li><a class="dropdown-item" href="accompaniement.php">Accompaniement</a></li>
                    </ul>
                </li>
                <li class="nav-item">
        <?php
            if (!isset($_SESSION['id'])) {
              echo '<a class="nav-link" href="login.php">Create your Recipes</a>';
            } else {
              echo '<a class="nav-link" href="add_recipes.php">Create your Recipes</a>';
            };
          ?>
        </li>

            </ul>
            <button class="btn btn-outline-success" name="search" id ="search" type="submit" value="search"><a href="search.php">Search</a></button>
        <?php
          if (!isset($_SESSION['id'])) {
            echo '<button class="btn"><a href="register.php">Register</a></button><button class="btn"><a href="login.php">Login</a></button>';
          } else {
            echo 'Hello, ' . $_SESSION['prenom'] . '<button class="btn"><a href="disconnect.php">Logout</a></button>';
          };
        ?>
        
        </div>
    </div>
</nav>

<body>
  <h1>Dessert</h1>
  <div id="container" align="center">
    <?php
   for($i=0 ; $i < count($recipe) ; $i++) {
    echo '<div class="card d-inline-block mx-auto " style="width: 25rem; height: 70rem;">
    <img class="card-img-top" src="image/salade.jpg" alt="Card image cap">
  <div class="card-bod"><h2 class="card-title">' . $recipe[$i]['recipe'] . '</h2>' .   
    '<h5>Ingredients for 4 peoples :</h5>' . $recipe[$i]['ingredient'] . '<br>' .
    '<h5>Cooking time :</h5>' . $recipe[$i]['timing'] . 'minutes<br>' .
    '<h5>Procedure :</h5>' . $recipe[$i]['description'] . 

  
  '</div>
</div>';
}
?>
</div>
    <footer>
        <div id="footer">
            <p>All Rights Reserved to Mesut Kircil & Justin Cornu.</p>
        </div>
    </footer>
</body>
</html>