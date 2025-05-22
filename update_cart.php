<?php
session_start();

if (isset($_POST['index'], $_POST['action'])) {
    $i = (int) $_POST['index'];
    $action = $_POST['action'];

    if (isset($_SESSION['cart'][$i])) {
        if ($action === 'increase') {
            $_SESSION['cart'][$i]['quantity']++;
        } elseif ($action === 'decrease') {
            $_SESSION['cart'][$i]['quantity']--;
            if ($_SESSION['cart'][$i]['quantity'] < 1) {
                unset($_SESSION['cart'][$i]);
            }
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }
}

header("Location: payment.php");
exit;
