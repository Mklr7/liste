<?php
$servername = "localhost";
$username = "mesut";
$password = "kircilm";
$dbname = "exam";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Récupération des données du formulaire
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Vérification si les mots de passe correspondent
if ($password == $confirm_password) {
    // Hashage du mot de passe avant de le stocker dans la base de données
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insertion des données dans la base de données (utilisez une requête préparée pour plus de sécurité)
    $sql = "INSERT INTO user (username, password) VALUES ('$username', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully.";
        header('Location: login.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Passwords do not match.";
}

// Fermeture de la connexion à la base de données
$conn->close();
?>