<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Ateliers</title>
</head>
<style>
  
</style>
<body>
  <header class="main-header">
    <div class="logo" style="color: white;">🌿 Green World</div>
    <nav class="main-nav">
            <a href="index.php" style="color: white;">Accueil</a>
            <a href="explore.php" style="color: white;">Produits</a>
            <a href="about.html" style="color: white;">À propos</a>
            <a href="contact.html" style="color: white;">Contact</a>
        </nav>
    <div class="header-actions">
      <input type="text" placeholder="Rechercher..." />
      <a href="G_Pepiniere/login.php">
        <i class="fas fa-user"  style="color: white;"></i>
        </a>
        <div class="cart-icon">
  <a href="payment.php" >
    <i class="fas fa-shopping-cart" style="color: white;"></i>
    <?php if (isset($cart_count) && $cart_count > 0): ?>
      <span class="cart-count"><?php echo $cart_count; ?></span>
    <?php endif; ?>
  </a>
</div>

    </div>
  </header>

  <section class="hero">
    <div class="hero-content">
      <h1>ATELIERS</h1>
      <p>Apprenez à créer des<br>sculptures suspendues magiques</p>
      <button class="mt-8 bg-white text-green-800 hover:bg-gray-100 px-8 py-3 rounded-full font-medium transition shadow-lg">
        Découvrir nos ateliers
      </button>
    </div>
  </section>

  <section class="workshops">
    <div class="work-container">
      <h1>Ateliers DIY dans notre studio<br>ou dans votre espace de travail</h1>
      <div class="work-content">
        <img class="work-image" src="images/plant2.jpg" alt="Image de l'atelier">
        <p class="work-text">
          Les Planteplaneter sont aussi une excellente manière de passer du temps et de faire un travail manuel avec un beau résultat.
          J'organise des ateliers pour les groupes comme pour les particuliers.
        </p>
      </div>
      <p class="group-note">
        Si vous êtes un groupe de 10 personnes ou plus,<br>merci de remplir le formulaire ci-dessous ou de me contacter directement
      </p>
    </div>
  </section>

  <section class="cart">
    <div class="cart-content">
      <div class="intro-text">
        <p>Si vous souhaitez participer à des ateliers en individuel, jetez un œil ci-dessous pour voir ce qui est prévu</p>
        <img src="images/planet5.jpeg" alt="Femme travaillant avec des plantes" class="intro-image">
      </div>
  
    
  </section>

  <section class="py-16 px-6 bg-white">
    <div class="container mx-auto max-w-4xl">
      <h2 class="text-3xl font-bold text-center mb-12">Ce que disent nos participants</h2>
      
      <div class="grid md:grid-cols-2 gap-8">
        <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
          <div class="flex items-center mb-4">
            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Participante" class="w-12 h-12 rounded-full mr-4">
            <div>
              <h4 class="font-semibold">Sophie L.</h4>
              <div class="flex text-yellow-400">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
            </div>
          </div>
          <p class="text-gray-700 italic">
            "L'atelier terrarium était fantastique ! L'ambiance était détendue, les explications claires, et je suis repartie avec un magnifique terrarium qui fait l'admiration de tous mes amis."
          </p>
        </div>
        
        <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
          <div class="flex items-center mb-4">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Participant" class="w-12 h-12 rounded-full mr-4">
            <div>
              <h4 class="font-semibold">Thomas R.</h4>
              <div class="flex text-yellow-400">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
            </div>
          </div>
          <p class="text-gray-700 italic">
            "Je n'avais jamais touché à une plante de ma vie avant cet atelier. Maintenant, j'ai une collection de 15 plantes chez moi ! Les conseils d'entretien sont vraiment précieux."
          </p>
        </div>
      </div>
    </div>
  </section>
  <footer class="bg-gray-900 text-white py-12 px-6">
    <div class="container mx-auto max-w-6xl">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
          <h3 class="text-xl font-bold mb-4 flex items-center">
            <span class="mr-2 plant-icon">🌿</span> Green World
          </h3>
          <p class="text-gray-400 mb-4">
            Cultivons ensemble votre passion pour les plantes.
          </p>
          <div class="flex space-x-4">
            <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-green-700 transition">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-green-700 transition">
              <i class="fab fa-pinterest"></i>
            </a>
          </div>
        </div>
        
        <div>
          <h4 class="text-lg font-semibold mb-4">Nos ateliers</h4>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-400 hover:text-white transition">Plantes suspendues</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition">Terrariums</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition">Kokedama</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition">Ateliers enfants</a></li>
          </ul>
        </div>
        
        <div>
          <h4 class="text-lg font-semibold mb-4">Informations</h4>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-400 hover:text-white transition">FAQ</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition">Livraison</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition">Retours</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition">CGV</a></li>
          </ul>
        </div>
        
        <div>
          <h4 class="text-lg font-semibold mb-4">Contact</h4>
          <ul class="space-y-2">
            <li class="flex items-start">
              <i class="fas fa-map-marker-alt mt-1 mr-2 text-gray-400"></i>
              <span class="text-gray-400">12 Rue des Jardins, 75005 Paris</span>
            </li>
            <li class="flex items-start">
              <i class="fas fa-phone-alt mt-1 mr-2 text-gray-400"></i>
              <span class="text-gray-400">01 23 45 67 89</span>
            </li>
            <li class="flex items-start">
              <i class="fas fa-envelope mt-1 mr-2 text-gray-400"></i>
              <span class="text-gray-400">contact@greenworld.com</span>
            </li>
          </ul>
        </div>
      </div>
      
      <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-500">
        <p>&copy; 2023 Green World. Tous droits réservés.</p>
      </div>
    </div>
  </footer>
  </html>
  