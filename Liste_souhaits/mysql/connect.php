<?php
error_reporting(E_ALL); ini_set("display_errors", 1); 
mysqli_report(MYSQLI_REPORT_OFF);
//**********Paramètres utilisés par la bdd ******************* 
$user = 'mesut';
$pass = 'kircilm';
$host = 'localhost';
$bdd = 'exam'; //************************************************************
//***********Connexion à la base de données******************* 
$db = new mysqli($host,$user,$pass,$bdd); //************************************************************;
// Vérifier la connexion 
if ($db->connect_error) {
die('Impossible de se connecter à MySQL: ' . $db->connect_error);
}
echo 'Connexion reussie !!!<br>';

?>