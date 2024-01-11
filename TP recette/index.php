<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include ('connexion_bdd.php');

$sql = "SELECT * FROM `recipes` WHERE `categorie` = 'plat' AND `status` = 1 ORDER BY `id` DESC";
  $query = $db->query($sql);
  $recipeP = $query->fetchAll(PDO::FETCH_ASSOC);
  
    for($i=0 ; $i < count($recipeP) ; $i++);

$sql = "SELECT * FROM `recipes` WHERE `categorie` = 'entrée' AND `status` = 1 ORDER BY `id` DESC";
  $query = $db->query($sql);
  $recipeE = $query->fetchAll(PDO::FETCH_ASSOC);
  
    for($i=0 ; $i < count($recipeE) ; $i++);

$sql = "SELECT * FROM `recipes` WHERE `categorie` = 'dessert' AND `status` = 1 ORDER BY `id` DESC";
  $query = $db->query($sql);
  $recipeD = $query->fetchAll(PDO::FETCH_ASSOC);
  
    for($i=0 ; $i < count($recipeD) ; $i++);

$sql = "SELECT * FROM `recipes` WHERE `categorie` = 'garniture' AND `status` = 1 ORDER BY `id` DESC";
  $query = $db->query($sql);
  $recipeG = $query->fetchAll(PDO::FETCH_ASSOC);
  
    for($i=0 ; $i < count($recipeG) ; $i++);
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
    <title>Home</title>
</head>

<nav class="navbar  navbar-expand-lg bg-white">
  <div class="container-fluid ">
    <a class="navbar-brand" href="index.php"><img src="image/Grouplogo.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
      
    
      
  
          <button class="btn"><a href="connexion_admin.php">Administrator</a></button>
        </li>
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
 
<h1>Our Recommandations</h1>
  <div id="container">
  
  <div class="card d-inline-block mx-auto " style="width: 25rem; height: 53rem;"  >
  <img class="card-img-top" src="image/salade.jpg" alt="Card image cap">
  <div class="card-body">
  <section>
     
     <h2 class="card-title"><?=$recipeE[0]['recipe'];?></h2>  
    <h5>Ingredients for 4 peoples :</h5><?=$recipeE[0]['ingredient'];?>
    <h5>Cooking time :</h5><?=$recipeE[0]['timing'];?> minutes
    <h5>Procedure :</h5><?=$recipeE[0]['description'];?>
    
    </section><br>
<a href="starters.php" class="btn btn-primary">more starters</a>
  </div>
</div>

<div class="card d-inline-block mx-auto " style="width: 25rem; height:53rem;"  >
  <img class="card-img-top" src="image/lasagne.jpg" alt="Card image cap">
  <div class="card-body">
  <section>
     
     <h2 class="card-title"><?=$recipeP[0]['recipe'];?></h2>  
    <h5>Ingredients for 4 peoples :</h5><?=$recipeP[0]['ingredient'];?>
    <h5>Cooking time :</h5><?=$recipeP[0]['timing'];?> minutes
    <h5>Procedure :</h5><?=$recipeP[0]['description'];?>
    
    </section><br>
<a href="mains.php" class="btn btn-primary">more mains</a>
  </div>
</div>

<div class="card d-inline-block mx-auto " style="width: 25rem; height:53rem;"  >
  <img class="card-img-top" src="image/waffles.jpg" alt="Card image cap">
  <div class="card-body">
  <section>
     
     <h2 class="card-title"><?=$recipeD[0]['recipe'];?></h2>  
    <h5>Ingredients for 4 peoples :</h5><?=$recipeD[0]['ingredient'];?>
    <h5>Cooking time :</h5><?=$recipeD[0]['timing'];?> minutes
    <h5>Procedure :</h5><?=$recipeD[0]['description'];?>
    
    </section><br>
<a href="desserts.php" class="btn btn-primary">more desserts</a>
  </div>
</div>

<div class="card d-inline-block mx-auto " style="width: 25rem; height:53rem;"  >
  <img class="card-img-top" src="image/waffles.jpg" alt="Card image cap">
  <div class="card-body">
  <section>
     
     <h2 class="card-title"><?=$recipeG[0]['recipe'];?></h2>  
    <h5>Ingredients for 4 peoples :</h5><?=$recipeG[0]['ingredient'];?>
    <h5>Cooking time :</h5><?=$recipeG[0]['timing'];?> minutes
    <h5>Procedure :</h5><?=$recipeG[0]['description'];?>
    
    </section><br>
<a href="desserts.php" class="btn btn-primary">more garnishes</a>
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