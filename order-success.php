<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: G_Pepiniere/login.php");
    exit;
}

$userName = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Success</title>
    <style>
        .container {
            background: #d9fdd3;
            padding: 40px;
            margin: 100px auto;
            max-width: 400px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
            font-family: Arial, sans-serif;
        }

        .logout-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #2e7d32;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .logout-btn:hover {
            background-color: #256b28;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Order successful</h1>
    <p>Thank you, for your order</p>
    <a href="logout.php" class="logout-btn">Logout</a>
    <a href="generate_invoice.php" class="logout-btn">Télecharger reçue</a>

</div>
</body>
</html>
