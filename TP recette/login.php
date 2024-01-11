<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

include ('connexion_bdd.php');

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>
<body>
<section class="vh-100 gradient-custom">  
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <form action="" method="post">
              <div class="mb-md-5 mt-md-4 pb-5">            
                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                <p class="text-white-50 mb-5">Please enter your email and password!</p>            
              <div class="form-outline form-white mb-4">
                <input type="email" name="email" id="typeEmailX" class="form-control form-control-lg" placeholder="Email" />
                <label class="form-label" for="typeEmailX"></label>
              </div>
              <div class="form-outline form-white mb-4">
                <input type="password" name="pswd" id="typePasswordX" class="form-control form-control-lg" placeholder="Password" />
                <label class="form-label" for="typePasswordX"></label>
              </div>
              <button type="submit" class="btn btn-outline-light btn-lg px-5">Login</button>
              
            </div>
            <?php

  class User{
  //propriétés
  public $name;
  public $surname;
  public $email;
  public $password;
  }

$dbname = "cuisine";
$dbhost = "localhost";
$dbpass = "kircilm";
$dbuser = "mesut";


if(!empty($_POST['email']) && !empty($_POST['pswd'])) {

  $sql = "SELECT * FROM `user` WHERE `email` = :email";
  $query = $db->prepare($sql);
  $query->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
  $query->execute();
  $verifUser = $query->fetch();
  // verification pour savoir si l'adresse mail est déjà utilisée
  // var_dump($verifUser);

  if ($_POST['email'] === $verifUser['email'] && password_verify($_POST['pswd'], $verifUser['mdp'])){

session_start();
$id_session = session_id();
$_SESSION['email'] = $verifUser['email'];
$_SESSION['id'] = $verifUser['id'];
$_SESSION['prenom'] = $verifUser['prenom'];
$_SESSION['admin'] = $veriUser['admin'];
$_SESSION['recipe'] = $verifRecip['recipe'];

    header('location: index.php');

  } else if ($_POST['email'] !== $verifUser['email']) {

// vérification de la présence du mail dans la base de donnée
    echo "<div>Your email is unknow</div>";

  } else if ($_POST['pswd'] !== password_verify($_POST['pswd'], $verifUser['mdp'])) {

// verification pour savoir si le mot de passe est enregistré dans la bdd (fonction password_verify pour déhasher le mot de passe)
    echo "<div>Your password is false</div>"; 

  } 
};
?>
            <div>
              <p class="mb-0">Don't have an account? <a href="register.php" class="text-white-50 fw-bold">Sign Up</a>
              </p>
            </div>
            
            </form> 
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>