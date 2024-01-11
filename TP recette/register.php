<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Sign Up</title>
</head>
<body>  
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('connexion_bdd.php');

class User{
    //propriétés
    public $name;
    public $surname;
    public $email;
    public $password;
    public $password2;
    }

    $emailFalse = "L'adresse mail est déjà utilisée chez nous.";
    $pswdFalse = "Les mots de passe sont différents.<br>Veuillez ressaisir vos mots de passe.";


    if(!empty($_POST['name']) && !empty ($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['pswd']) && !empty($_POST['pswd2'])) {
        $user = new User();
        $user->name = $_POST['name'];
        $user->surname = $_POST['surname'];
        $user->email = $_POST['email'];
        $user->password = $_POST['pswd'];
        $user->password2 = $_POST['pswd2'];
        // var_dump($user);
        // var_dump affiche les valeurs de $user
        
        $sql = "SELECT * FROM `user` WHERE `email` = :email";
            $query = $db->prepare($sql);
            $query->bindValue(":email", $user->email, PDO::PARAM_STR);
            $query->execute();
            $verifEmail = $query->fetch();
            
            // verification pour savoir si l'adresse mail est déjà utilisée
            // var_dump($verifEmail);
        if ($_POST['pswd'] !== $_POST['pswd2']) {

            echo $pswdFalse;

        } else if ($verifEmail === false) {

            $sql = "INSERT INTO `user` (`nom`, `prenom`, `email`, `mdp`)
            VALUES (:nom, :prenom, :email, :mdp)";
            $query = $db->prepare($sql);
            $query->bindValue(":nom", $user->name, PDO::PARAM_STR);
            $query->bindValue(":prenom", $user->surname, PDO::PARAM_STR);
            $query->bindValue(":email", $user->email, PDO::PARAM_STR);
            $hash = password_hash($user->password, PASSWORD_DEFAULT);
            $query->bindValue(":mdp", $hash, PDO::PARAM_STR);
            
            
            $query->execute(); 
            header('Location: login.php');
            } else {
                
                echo $emailFalse;

            }        
    };
?>
<section class="vh-100 gradient-custom">
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <form action="" method="post">
              <div class="mb-md-5 mt-md-4 pb-5">
                <h2 class="fw-bold mb-2 text-uppercase">Sign Up</h2>
              </div>
              <div>
                <input type="text" id="typeTextX" class=" form-control form-control-lg" name="name" placeholder="Name">
                <label for="name"></label>    
              </div>
              <div>
                <input type="text" id="typeTextX" class=" form-control form-control-lg" name="surname" placeholder="Surname">
                <label for="surname"></label>  
              </div>
              <div class="form-outline form-white mb-4">
                <input type="email" id="typeEmailX" class="form-control form-control-lg" name="email" placeholder="email"/>
                <label for="email"></label>
              </div>
              <div>
                <input type="password" id="TypePasswordX" class="form-control form-control-lg" name="pswd" placeholder="Password">
                <label for="pswd"></label>    
              </div>
              <div>
                <input type="password" id="TypePasswordX" class="form-control form-control-lg" name="pswd2" placeholder="Confirm Password">
                <label for="pswd2"></label>    
              </div>
                <button type="submit" class="btn btn-outline-light btn-lg px-5">Send</button>
                <p class="mb-0">You have an account? <a href="login.php" class="text-white-50 fw-bold">To connect</a></p>
              <div id="erreur">
                <?php
                  $pswdFalse
                ?>
              </div>
              <div id="erreur">
                <?php
                  $userFalse
                ?>  
              </div>  
            </form> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  
</section>
</body>
</html>

