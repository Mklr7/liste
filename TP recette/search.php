<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include ('connexion_bdd.php');


  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
    <title>Your research</title>
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
                        <li><a class="dropdown-item" href="accompaniement.php">Garnishes</a></li>
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
            <form action="search.php" method="GET" class="d-flex" role="search">
        <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" name="s" id ="search" type="submit" value="search">Search</button>
      </form>
        <?php
          if (!isset($_SESSION['id'])) {
            echo '<button class="btn"><a href="register.php">Register</a></button><button class="btn"><a href="login.php">Login</a></button>';
          } else {
            echo 'Hello, ' . $_SESSION['prenom'] . '<button class="btn"><a href="disconnect.php">Logout</a></button>';
          };
        ?>
        </form>
        </div>
    </div>
</nav>
<body>
 
<h1>What do you want to cook ?</h1>
  <div id="container" align="center">
  
  <div class="card d-inline-block mx-auto " style="width: 70rem; height: 70rem;">
  
  <div class="card-bod"> 
    <?php
    
    if (isset($_GET['s']) && !empty($_GET['search'])) {
 
    $recherche = ($_GET['search']);
    $sql = "SELECT * FROM recipes WHERE recipe LIKE :search OR ingredient LIKE :search OR categorie AND `status` = 1 LIKE :search";
    $query = $db->prepare($sql);
    $query->bindValue(':search', '%' . $recherche . '%', PDO::PARAM_STR);
    $query->execute();
 
    $resultats = $query->fetchAll(PDO::FETCH_ASSOC);
 
    foreach ($resultats as $resultat) {
      echo '<h2 class="card-title">' . $resultat['recipe'] . '</h2>' .   
      '<h5>Ingredients for 4 peoples :</h5>' . $resultat['ingredient'] . '<br>' .
      '<h5>Cooking time :</h5>' . $resultat['timing'] . 'minutes<br>' .
      '<h5>Procedure :</h5>' . $resultat['description'];
     }
 
 }
    ?>   

  </div>
</div>


</div>
<footer>
  <div>
    <p>All Rights Reserved to Mesut Kircil & Justin Cornu.</p>
  </div>
</footer>


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>