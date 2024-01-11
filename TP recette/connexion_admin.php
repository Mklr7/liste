<?php
session_start();
if(isset($_POST['valider'])){
   if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
       $pseudo_par_defaut = 'admin';
       $mdp_par_defaut = '12345';

       $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
       $mdp_saisi = htmlspecialchars($_POST['mdp']);

       if($pseudo_saisi == $pseudo_par_defaut AND $mdp_saisi == $mdp_par_defaut){
           $_SESSION['mdp'] = $mdp_saisi;
           header('Location: index_admin.php');
       } else{
        echo"Votre mot de passe ou pseudo est incorrect...";
        }
       } else{
        echo"Veuillez compléter tous les champs...";

}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Espace de connexion admin</title>
</head>
<body>
 
    <div id="main-wrapper" class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="mb-5">
                                    <h3 class="h4 font-weight-bold text-theme">Login</h3>
                                </div>

                                <h6 class="h5 mb-0">Welcome back!</h6>
                                <p class="text-muted mt-2 mb-5">Enter your email address and password to access admin panel.</p>

                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">User</label>
                                        <input type="text" name="pseudo" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="mdp" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <button type="submit" name="valider" class="btn btn-primary">Login</button>
                                    <br><br>
                                    <a href="disconnect.php" class="btn btn-primary">LogOut </a>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-6 d-none d-lg-inline-block">
                            <div class="account-block rounded-right">
                                <div class="overlay rounded-right"></div>
                                <div class="account-testimonial">
                                    <h4 class="text-white mb-4">This  beautiful theme yours!</h4>
                                    <p class="lead text-white">"Best investment i made for a long time. Can only recommend it for other users."</p>
                                    <p>- Admin User</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->

         

            <!-- end row -->

        </div>
        <!-- end col -->
    </div>
    <!-- Row -->
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>