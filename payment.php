<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=greenworld", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$cart_items = $_SESSION['cart'] ?? [];
$subtotal = 0;

// Bulk fetch all product images
$product_ids = array_column($cart_items, 'id');
$images = [];
if (!empty($product_ids)) {
    $placeholders = implode(',', array_fill(0, count($product_ids), '?'));
    $stmt = $pdo->prepare("SELECT id, image FROM products WHERE id IN ($placeholders)");
    $stmt->execute($product_ids);
    $images = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <title>Payment | Green World</title>
    <link rel="stylesheet" href="style/payment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* CSS omitted for brevity (use existing styles) */
    </style>
</head>
<body>
<style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
        }
        a {
            text-decoration: none;
            color: inherit;
        }
        .container {
            display: flex;
            padding: 30px;
            gap: 30px;
            max-width: 1200px;
            margin: auto;
        }
        .cart-section {
            flex: 2;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
        }
        .cart-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #ddd;
        }
        .cart-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            margin-right: 15px;
            border-radius: 8px;
        }
        .cart-item-info {
            flex: 1;
        }
        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .cart-item-price {
            font-weight: bold;
            margin-left: 10px;
        }
        .remove-btn {
            background: none;
            border: none;
            color: red;
            font-size: 18px;
            cursor: pointer;
        }
        .checkout-section {
            flex: 1;
            background: #d3f2d3;
            padding: 20px;
            border-radius: 12px;
        }
        .checkout-section h3 {
            margin-top: 0;
        }
        .summary-item {
            display: flex;
            justify-content: space-between;
            margin: 15px 0;
        }
        .checkout-btn {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #2e7d32;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
        }
        .payment-icons i {
            font-size: 28px;
            margin-right: 10px;
            color: #333;
        }
        .continue-shopping-top {
            margin: 20px 30px;
            display: inline-block;
            color: #2e7d32;
            font-weight: bold;
        }
    </style>
<a href="explore.php" class="continue-shopping-top">
    <i class="fas fa-arrow-left"></i> Continue Shopping
</a>

<div class="container">
    <div class="cart-section">
        <h2>Your Shopping Cart</h2>
        <?php if (count($cart_items) > 0): ?>
            <?php foreach ($cart_items as $index => $item):
                $product_image = isset($images[$item['id']]) ? $images[$item['id']] : null;
                $item_total = $item['price'] * $item['quantity'];
                $subtotal += $item_total;
            ?>
                <div class="cart-item">
                    <img src="images/<?php echo htmlspecialchars($product_image); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
                    <div class="cart-item-info">
                        <strong><?php echo htmlspecialchars($item['name']); ?></strong>
                        <div class="quantity-controls">
                            <form method="post" action="update_cart.php">
                                <input type="hidden" name="index" value="<?php echo $index; ?>">
                                <button type="submit" name="action" value="decrease">-</button>
                            </form>
                            <?php echo $item['quantity']; ?>
                            <form method="post" action="update_cart.php">
                                <input type="hidden" name="index" value="<?php echo $index; ?>">
                                <button type="submit" name="action" value="increase">+</button>
                            </form>
                            <span class="cart-item-price"><?php echo $item_total; ?> MAD</span>
                        </div>
                    </div>
                    <form method="post" action="remove_from_cart.php">
                        <input type="hidden" name="index" value="<?php echo $index; ?>">
                        <button class="remove-btn" type="submit"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>

    <div class="checkout-section">
        <h3>Card Details</h3>
        <p>Card Type:</p>
        <div class="payment-icons">
            <i class="fab fa-cc-mastercard"></i>
            <i class="fab fa-cc-visa"></i>
            <i class="fab fa-cc-paypal"></i>
        </div>

        <form action="checkout.php" method="post">
            <input type="text" name="name_on_card" placeholder="Name on card" required>
            <input type="text" name="card_number" placeholder="Card Number" required>
            <div>
                <input type="text" name="expiration" placeholder="MM/YY" required>
                <input type="text" name="cvv" placeholder="CVV" required>
            </div>

            <div class="summary-item">
                <span>Subtotal</span>
                <span><?php echo $subtotal; ?> MAD</span>
            </div>
            <div class="summary-item">
                <span>Shipping</span>
                <span>55 MAD</span>
            </div>
            <div class="summary-item summary-total">
                <span>Total</span>
                <span><?php echo $subtotal + 55; ?> MAD</span>
            </div>

            <button type="submit" class="checkout-btn">Checkout</button>
        </form>
    </div>
</div>

</body>
</html>
