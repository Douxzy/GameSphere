<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GameSphere - Découvrez les Meilleurs Jeux Vidéo, Classiques et Indépendants</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <meta name="keywords" content="GameSphere - Découvrez les Meilleurs Jeux Vidéo, Classiques et Indépendants">
  <meta name="description" content="GameSphere est votre portail dédié aux jeux vidéo. Découvrez les meilleures sorties, classiques intemporels et jeux indépendants avec des descriptions détaillées, images et liens vers les sites officiels. Explorez notre large sélection par genre, plateforme, et date de sortie.">
  <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
</head>
<?php
include 'db.php';
$conn->set_charset('utf8mb4');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "SELECT nom, description, lien_site_officiel, lien_image, genre, plateforme, date_sortie FROM jeux WHERE id = $id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $date_sortie = !empty($row['date_sortie']) ? (new DateTime($row['date_sortie']))->format('d/m/Y') : 'N/A';
  } else {
    echo "Jeu non trouvé.";
    exit;
  }
} else {
  echo "Aucun ID de jeu fourni.";
  exit;
}
?>

<body>
  <header>
    <nav class="bg-gray-800">
      <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
          <!-- Logo and navigation links -->
          <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex flex-shrink-0 items-center">
              <img class="h-8 w-auto" src="../assets/favicon.ico" alt="logo">
            </div>
            <div class="hidden sm:ml-6 sm:block">
              <div class="flex space-x-4">
                <a href="../index.php" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Accueil</a>
              </div>
            </div>
          </div>

          <!-- Search bar (form) -->
          <div class="relative flex items-center">
            <form action="php/recherche.php" method="GET">
              <input type="text" name="query" class="rounded-md bg-gray-100 px-3 py-2 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Rechercher..." aria-label="Search">
              <button type="submit" class="ml-2 rounded-md bg-indigo-500 px-3 py-2 text-sm text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Rechercher
              </button>
            </form>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <section class="py-20 section flex flex-col justify-center">
    <div class="container mx-auto">
      <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <img src="<?= htmlspecialchars($row['lien_image']) ?>" alt="<?= htmlspecialchars($row['nom']) ?>" class="w-full h-64 object-cover">
        <div class="p-8">
          <h1 class="text-4xl font-bold mb-4"><?= htmlspecialchars($row['nom']) ?></h1>
          <p class="text-gray-700 mb-6"><?= htmlspecialchars($row['description']) ?></p>
          <p class="text-gray-600"><strong>Genre :</strong> <?= htmlspecialchars($row['genre']) ?></p>
          <p class="text-gray-600"><strong>Plateforme :</strong> <?= htmlspecialchars($row['plateforme']) ?></p>
          <p class="text-gray-600"><strong>Date de sortie :</strong> <?= htmlspecialchars($date_sortie) ?></p>
          <a href="<?= htmlspecialchars($row['lien_site_officiel']) ?>" class="mt-4 inline-block text-indigo-600 hover:underline">Visitez le site officiel</a>
        </div>
      </div>
    </div>
  </section>

  <footer class="bg-gray-800 text-white py-4">
    <div class="container mx-auto text-center">
      <p class="text-sm">&copy; 2024 Romain Deschaseaux. Tous droits réservés.</p>
    </div>
  </footer>
</body>

</html>