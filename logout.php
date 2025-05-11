<?php
session_start();
session_destroy();
header("Location: G_Pepiniere/login.php");
exit;
?>