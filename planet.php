<?php
$pdo = new PDO('mysql:host=localhost;dbname=greenworld;charset=utf8mb4', 'root', '');


if (isset($_GET['id']) ) {
  $id = (int)$_GET['id'];
} else {
  $id = 0;
}

$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
  header('Location: explore.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($product['name']) ?> - Green World</title>
  <link rel="stylesheet" href="style/style2.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
  <header class="main-header">
  <div class="logo">🌿 Green World</div>

  <nav class="main-nav">
            <a href="index.php" style="color: white;">Accueil</a>
            <a href="explore.php" style="color: white;">Produits</a>
            <a href="about.html" style="color: white;">À propos</a>
            <a href="contact.html" style="color: white;">Contact</a>
        </nav>
</div>
<div class="header-actions">
      <input type="text" placeholder="Search...">
        <a href="payment.php" >
    <i class="fas fa-shopping-cart" style="color: white;"></i>
    <?php if (isset($cart_count) && $cart_count > 0): ?>
      <span class="cart-count"><?php echo $cart_count; ?></span>
    <?php endif; ?>
  </a>
    </div>
  </header>

  <main class="container">
    <div class="product-image">
      <img src="images/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name'])?>">
    </div>

    <div class="product-details">
      <h1><?= htmlspecialchars($product['name']) ?></h1>
      <p><?= htmlspecialchars($product['description']) ?></p>
      <h2><?= number_format($product['price'], 2) ?> MAD</h2>

      <form method="post" action="add_to_cart.php">
  <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
  <input type="hidden" name="name" value="<?= htmlspecialchars($product['name']) ?>">
  <input type="hidden" name="price" value="<?= $product['price'] ?>">
  <input type="hidden" name="quantity" value="1">
  <button type="submit" class="order-btn">Commander maintenant</button>
</form>

    </div>
  </main>

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

</body>
</html>
