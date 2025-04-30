<?php
/*connexion a la base de donnes*/
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'greenworld';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}
?>
