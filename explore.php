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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<header class="main-header">
  <div class="logo">🌿 Green World</div>
  <nav class="main-nav">
    <a href="html.html">Home</a>
    <a href="about.php">About</a>
    <a href="#">Contact Us</a>
  </nav>
  <div class="header-actions">
    <input type="text" placeholder="Search..." />
    <i class="fas fa-search"></i>
    <i class="fas fa-user"></i>
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

<footer class="site-footer">
  <div class="footer-container">
    <div class="footer-column">
      <h3>Green World</h3>
      <p>Bringing nature to your home.</p>
    </div>
    <div class="footer-column">
      <h4>Follow Us</h4>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
      </div>
    </div>
    <div class="footer-column">
      <h4>About Us</h4>
      <ul>
        <li><a href="#">Our Story</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; 2025 Green World. All rights reserved.</p>
  </div>
</footer>

</body>
</html>
