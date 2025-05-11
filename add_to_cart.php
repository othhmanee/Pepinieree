<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = (int)$_POST['product_id'];
    $name = $_POST['name'];
    $price = (float)$_POST['price'];
    $quantity = (int)$_POST['quantity'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if the product is already in the cart
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $product_id) {
            $item['quantity'] += $quantity;
            $found = true;
            break;
        }
    }
    unset($item); // break reference

    if (!$found) {
        $_SESSION['cart'][] = [
            'id' => $product_id,
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity
        ];
    }

    header('Location: payment.php');
    exit;
}
