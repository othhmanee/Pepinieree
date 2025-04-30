<?php
session_start();
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "greenworld");

// Vérifie la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Récupérer tous les produits
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Explore | Green World</title>
  <link rel="stylesheet" href="css.css">
  <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>

  <!-- Réutilisation du header -->
  <header class="main-header">
    <div class="logo" style="color: white;" >🌿 Green World</div>
    <!-- 🌿  logo-->
    <nav class="main-nav">
      <a href="html.html">Home</a>
      <a href="about.php">About</a>
      <a href="#">Contact Us</a>
    </nav>
    <div class="header-actions">
      <input type="text" placeholder="Search..." />
      <i class="fas fa-search"></i>
      <i class="fas fa-user"></i>
      <i class="fas fa-shopping-cart"></i>
    </div>
  </header>

  <!-- Section produits -->
  <main>
    <section class="collection">
      <h2>🌿 Nos Produits 🌿</h2>
      <div class="plant-cards">

        <?php while ($row = $result->fetch_assoc()) { ?>
          <div class="card">
            <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
            <h3><?php echo $row['name']; ?></h3>
            <p><?php echo $row['description']; ?></p>
            <p><strong><?php echo number_format($row['price'], 2); ?> MAD</strong></p>
              <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
              <a href="plant.php?id=<?php echo $row['id']; ?>" class="add-cart">Voir produit</a>
              </button>
          </div>
        <?php } ?>

      </div>
    </section>
  </main>

  <!-- Réutilisation du footer -->
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