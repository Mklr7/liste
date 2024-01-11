<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include ('connexion_bdd.php');

class Recipes{
  public $title;
  public $categorie;
  public $ingredients;
  public $timing;
  public $description;
}

if (!empty($_POST['title']) && !empty($_POST['categorie']) && !empty($_POST['ingredients']) && !empty($_POST['timing'])) {
  $recipe = new Recipes();
  $recipe->title = $_POST['title'];
  $recipe->categorie = $_POST['categorie'];
  $recipe->ingredients = nl2br($_POST['ingredients']);
  $recipe->timing = $_POST['timing'];
  $recipe->description = nl2br($_POST['description']);

  // var_dump($recipe);

  $sql = "INSERT INTO `recipes` (`id_user`, `recipe`,`categorie`,`ingredient`,`timing`, `description`, `status`)
  VALUES (:id_user, :recipe, :categorie, :ingredients, :timing, :description, :status)";
  $query = $db->prepare($sql);
  $query->bindValue(":id_user", $_SESSION['id'], PDO::PARAM_INT);
  $query->bindValue(":recipe", $recipe->title, PDO::PARAM_STR);
  $query->bindValue(":categorie", $recipe->categorie, PDO::PARAM_STR);
  $query->bindValue(":ingredients", $recipe->ingredients, PDO::PARAM_STR);
  $query->bindValue(":timing", $recipe->timing, PDO::PARAM_STR);
  $query->bindValue(":description", $recipe->description, PDO::PARAM_STR);
  $query->bindValue(":status", 0, PDO::PARAM_STR);
  

  $query->execute();
  header('Location: add_recipes.php');
} else {

  echo 'Complete your recipe please.';

}
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
  <title>Add Your Recipe</title>
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
          <a class="nav-link" href="add_recipes.php">Create your Recipes</a>
        </li>
        
      </ul>
      <button class="btn btn-outline-success" name="search" id ="search" type="submit" value="search"><a href="search.php">Search</a></button>
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
<section class="gradient-custom">
    <h1>Personalize your recipes</h1>
  <section class="container mt-3 mb-3 d-flex justify-content-center">
    <div class="card px-4 py-4">
        <div class="card-bod">
            <h6 class="card-title mb-3">Create your recipes </h6>
            <form action="" method="post">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                       <input class="form-control" name="title" type="text" placeholder="Title" id="title">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                    <div class="input-group">
                      <select name="categorie" id="Catégorie" class="form-control" type="select">
                        <option value="">Category</option>
                        <option value="entrée">Starter</option>
                        <option value="plat">Main</option>
                        <option value="dessert">Dessert</option>
                        <option value="garniture">Garnish</option>
                      </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group"> <textarea class="form-control" name="ingredients" type="text" placeholder="Ingredient for 4 peoples" id="ingredient"></textarea> </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group"> <input class="form-control" name="timing" type="number" placeholder="Cooking time in minute" id="timecook"> </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group"> <textarea class="form-control" name="description" type="text" placeholder="Description" id="ingredient"></textarea> </div>
                    
                  
        </div>
                </div>
            </div>
            <div class=" d-flex flex-column text-center px-5 mt-3 mb-3">  
                <button class="btn btn-primary btn-block confirm-button" id="confirm">Confirm your recipe</button>
            </form>
        </div>
    </div>
</div>
</section>
<footer>
        <div id="footer">
            <p>All Rights Reserved to Mesut Kircil & Justin Cornu.</p>
        </div>
    </footer>
</body>
</html>