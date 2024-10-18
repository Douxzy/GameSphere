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
include 'php/db.php';
$conn->set_charset('utf8mb4');

$sql = "SELECT id, nom, description, lien_image FROM jeux"; // Sélectionne l'ID pour chaque jeu
$result = $conn->query($sql);
?>

<body>
  <header>
    <nav class="bg-gray-800">
      <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
          <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex flex-shrink-0 items-center">
              <img class="h-8 w-auto" src="assets/favicon.ico" alt="Your Company">
            </div>
            <div class="hidden sm:ml-6 sm:block">
              <div class="flex space-x-4">
                <a href="../index.php" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Accueil</a>
              </div>
            </div>
          </div>

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


      <div class="sm:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2">
          <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white"
            aria-current="page">Accueil</a>
          <a href="#"
            class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white"></a>
          <a href="#"
            class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white"></a>
          <a href="#"
            class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white"></a>
        </div>
      </div>
    </nav>
    <section class="py-12 bg-gray-100">
      <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-6 text-gray-800">Bienvenue sur GameSphere</h2>
        <p class="text-lg text-gray-700 leading-relaxed mb-6">
          Que vous soyez un passionné de longue date ou un joueur occasionnel à la recherche de nouveaux titres,
          <span class="font-bold text-indigo-600">GameSphere</span> est l'endroit idéal pour explorer les meilleures sorties,
          les classiques intemporels et les jeux indépendants qui font vibrer la communauté.
          Notre mission est de vous offrir un espace où vous pouvez découvrir des informations détaillées sur une large gamme de jeux,
          allant des titres AAA aux pépites moins connues.
        </p>
        <p class="text-lg text-gray-700 leading-relaxed">
          Explorez dès maintenant notre bibliothèque de jeux et plongez dans des aventures incroyables !
        </p>
      </div>
    </section>
  </header>

  <section id="projects" class="py-20 section flex flex-col justify-center">
    <div class="container mx-auto text-center">
      <h2 class="text-4xl font-bold mb-10 section-item">Liste des jeux les plus connus</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 section-item">
        <?php
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo '<a href="php/description.php?id=' . $row["id"] . '">';
            echo '  <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl">';
            echo '      <img src="' . $row["lien_image"] . '" alt="' . $row["nom"] . '" class="w-full h-48 object-cover">';
            echo '      <div class="p-4">';
            echo '          <h3 class="text-xl font-bold mb-2">' . $row["nom"] . '</h3>';
            echo '          <p class="text-gray-700">' . $row["description"] . '</p>';
            echo '      </div>';
            echo '  </div>';
            echo '</a>';
          }
        } else {
          echo '<p>Aucun jeu trouvé.</p>';
        }

        $conn->close();
        ?>
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