<?php
// Connexion à la base de données (à adapter selon votre configuration)
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

// Requête pour récupérer le mot de passe de l'utilisateur
$sql = "SELECT id, password FROM user WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Vérification du mot de passe
    if (password_verify($password, $row['password'])) {
        echo "Login successful. Welcome, " . $username . "!";
        header('Location: index.php');
        // Vous pouvez stocker des informations de session ici
    } else {
        echo "Incorrect password.";
    }
} else {
    echo "User not found.";
}

// Fermeture de la connexion à la base de données
$conn->close();
?>