<?php
// db.php - Fichier pour la connexion à la base de données

$host = '';
$dbname = '';
$username = '';
$password = '';

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}
?>
