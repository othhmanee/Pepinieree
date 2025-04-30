<?php
// Connect to database
$pdo = new PDO('mysql:host=localhost;dbname=greenworld;charset=utf8mb4', 'root', '');


$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch the product
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

// If no product found, redirect to products page
if (!$product) {
  header('Location: products.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($product['name']) ?> - Green World</title>
  <link rel="stylesheet" href="style2.css">
</head>

<body>
  <header class="main-header">
  <div class="logo">🌿 Green World</div>

    <nav class="main-nav">
      <a href="html.html">Home</a>
      <a href="explore.php">Produits</a>
      <a href="about.php">À propos</a>
      <a href="#">Contact</a>
    </nav>
  </header>

  <main class="container">
    <div class="product-image">
      <img src="images/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
    </div>

    <div class="product-details">
      <h1><?= htmlspecialchars($product['name']) ?></h1>
      <p><?= htmlspecialchars($product['description']) ?></p>
      <h2><?= number_format($product['price'], 2) ?> MAD</h2>

      <button class="order-btn" onclick="window.location.href='planet.php';">Commander maintenant</button>
    </div>
  </main>

  <footer class="site-footer">
    <div class="footer-container">
      <div class="footer-column">
        <h3>Green World</h3>
        <p>Apportez la nature chez vous.</p>
      </div>
  
      <div class="footer-column">
        <h4>Suivez-nous</h4>
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
  
      <div class="footer-column">
        <h4>À propos</h4>
        <ul>
          <li><a href="#">Notre histoire</a></li>
          <li><a href="#">Nous contacter</a></li>
        </ul>
      </div>
    </div>
  
    <div class="footer-bottom">
      <p>&copy; 2025 Monde Vert. Tous droits réservés.</p>
    </div>
  </footer>

</body>
</html>
