<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = $_POST['name_on_card'] ?? '';
    $cardNumber = $_POST['card_number'] ?? '';
    $expiration = $_POST['expiration'] ?? '';
    $cvv = $_POST['cvv'] ?? '';

    $cart_items = $_SESSION['cart'] ?? [];
    $subtotal = 0;
    foreach ($cart_items as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }

    $shipping = 55;
    $total = $subtotal + $shipping;

    $_SESSION['last_order'] = [
        'items' => $cart_items,
        'total' => $total,
        'date' => date("Y-m-d H:i:s")
    ];

    unset($_SESSION['cart']);

    header("Location: order-success.php");
    exit();
} else {
    header("Location: payment.php");
    exit();
}
