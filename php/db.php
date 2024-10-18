<?php
// db.php - Fichier pour la connexion à la base de données

$host = 'localhost:3306';
$dbname = 'dero7598_gamesphere';
$username = 'dero7598_admin';
$password = 'HRhE4aztM&$r3g?s';

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}
?>
