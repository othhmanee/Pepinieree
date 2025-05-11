<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Simulated payment details
    $name = $_POST['name_on_card'] ?? '';
    $cardNumber = $_POST['card_number'] ?? '';
    $expiration = $_POST['expiration'] ?? '';
    $cvv = $_POST['cvv'] ?? '';

    // Simulate storing order
    $cart_items = $_SESSION['cart'] ?? [];
    $subtotal = 0;
    foreach ($cart_items as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }

    $shipping = 55;
    $total = $subtotal + $shipping;

    // Store order in session for invoice generation
    $_SESSION['last_order'] = [
        'items' => $cart_items,
        'total' => $total,
        'date' => date("Y-m-d H:i:s")
    ];

    // Clear cart
    unset($_SESSION['cart']);

    // Redirect to success page
    header("Location: order-success.php");
    exit();
} else {
    header("Location: payment.php");
    exit();
}
