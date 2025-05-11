<?php
session_start();
$cart_count = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        if (isset($item['quantity'])) {
            $cart_count += $item['quantity'];
        }
    }
}

$conn = new mysqli("localhost", "root", "", "greenworld");
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

$sql = "SELECT * FROM products LIMIT 9"; // LIMIT TO 9 PRODUCTS
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Explore | Green World</title>
  <link rel="stylesheet" href="style/style4.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<header class="main-header">

<div class="logo"  style="color: white;">🌿 Green World</div>
<nav class="main-nav">
            <a href="index.php" style="color: white;">Accueil</a>
            <a href="explore.php" style="color: white;">Produits</a>
            <a href="about.html" style="color: white;">À propos</a>
            <a href="contact.html" style="color: white;">Contact</a>
        </nav>
<div class="header-actions" style="color: white;">
<input type="text" placeholder="Search..." />
<i class="fas fa-search"  style="color: white;"></i>
<a href="G_Pepiniere/insc.php">
<i class="fas fa-user"  style="color: white;"></i>
</a>
    <div class="cart-icon">
  <a href="payment.php" style="color: inherit;">
    <i class="fas fa-shopping-cart"></i>
    <?php if ($cart_count > 0) : ?>
      <span class="cart-count"><?php echo $cart_count; ?></span>
    <?php endif; ?>
  </a>
</div>



  </div>
</header>

<main>
  <section class="collection">
    <h2>🌿 Nos Produits 🌿</h2>
    <div class="plant-cards">
      <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="card">
  <div class="image-wrapper">
    <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
    <a href="planet.php?id=<?php echo $row['id']; ?>" class="view-icon">
      <i class="fas fa-eye"></i>
    </a>
  </div>
  <h3><?php echo $row['name']; ?></h3>
  <p><?php echo $row['description']; ?></p>
  <p><strong><?php echo number_format($row['price'], 2); ?> MAD</strong></p>
  <form method="post" action="cart.php">
    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
    <button type="submit" class="add-cart">Ajouter au panier</button>
  </form>
</div>

      <?php } ?>
    </div>
  </section>
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
