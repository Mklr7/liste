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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>About us</title>
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
    <div id="main-img">
        <img src="image/imagebanner.png" alt="image" height="275px" width="100%">
    </div>
    <h1>Notre Histoire</h1>
    <div id="description">
        <p>Olá! Somos Amanda e Pedro, e estamos empolgados em apresentar nosso trabalho sobre o "Delícias à Mesa".<br>
            Ao
            explorar esse site incrível, descobrimos um universo gastronômico repleto de receitas deliciosas, dicas
            úteis e inspiração culinária. O "Delícias à Mesa"é um lugar onde chefs experientes e cozinheiros
            iniciantes
            podem se unir em sua paixão pela comida.
            Uma das coisas que nos encantou foi a variedade de receitas disponíveis. Desde pratos tradicionais e
            reconfortantes até criações mais inovadoras, há opções para todos os gostos e ocasiões. Cada receita é
            cuidadosamente selecionada e testada, garantindo que os resultados sejam sempre saborosos e dignos de serem
            compartilhados.

            Além das receitas, o "Delícias à Mesa" também oferece dicas úteis para aprimorar as habilidades culinárias.
            Desde técnicas de preparo até sugestões de combinação de sabores, o site nos convida a explorar e
            experimentar na cozinha. É um ambiente acolhedor e inclusivo, onde todos são incentivados a mergulhar na
            arte da culinária e descobrir novas possibilidades.

            Em suma, o "Delícias à Mesa" é um espaço gastronômico inspirador que nos convida a explorar, criar e
            compartilhar nossa paixão pela culinária. Esperamos que nossa apresentação tenha despertado seu interesse em
            se juntar a nós nessa jornada deliciosa com o "Delícias à Mesa"!</p>
    </div>
    <footer>
        <div id="footer">
            <p>All Rights Reserved to Mesut Kircil & Justin Cornu.</p>
        </div>
    </footer>
</body>

</html>