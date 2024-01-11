<?php
include("mysql.php");
$mot=$_POST["mot"];
$req=$pdo->prepare("SELECT * FROM user WHERE nom LIKE ?");
$req->setFetchMode(PDO::FETCH_ASSOC);
$req->execute(array(trim($mot). "%"));
$tab=$req->fetchAll();
for ($i=0; $i <count($tab); $i++) { 
    echo "<div>".$tab[$i]["nom"]. " " .$tab[$i]["prenom"]. " " .$tab[$i]["stands"]. " " .$tab[$i]["sexe"]. " " .$tab[$i]["age"]."</div>";
}
?>

